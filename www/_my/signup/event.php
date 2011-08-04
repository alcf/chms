<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	class EventSignupQForm extends ChmsForm {
		protected $strPageTitle = 'Main Menu';
		/**
		 * @var EventSignupForm
		 */
		protected $objEvent;
		/**
		 * @var SignupForm
		 */
		protected $objSignupForm;

		/**
		 * @var SignupEntry
		 */
		protected $objSignupEntry;
		
		protected $objFormQuestionControlArray = array();
		
		protected $btnSubmit;

		protected function Form_Create() {
			// Attempt to load by Token and then by ID
			$this->objSignupForm = SignupForm::LoadByToken(QApplication::PathInfo(0));
			if (!$this->objSignupForm) $this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));

			// Ensure it is the correct type and it exists
			if (!$this->objSignupForm || !$this->objSignupForm->EventSignupForm) {
				$this->strHtmlIncludeFilePath = '_notfound.tpl.php';
				return;
			}

			$this->strPageTitle = $this->objSignupForm->Name . ' - Signup';

			// Ensure it is Active
			if (!$this->objSignupForm->ActiveFlag) {
				$this->strHtmlIncludeFilePath = '_notactive.tpl.php';
				return;
			}

			// Ensure that the funding stuff is a-okay
			if ($this->objSignupForm->IsStewardshipFundMissing()) {
				$this->strHtmlIncludeFilePath = '_notactive.tpl.php';
				return;
			}

			// Ensure we are not double registering where not allowed
			if (!$this->objSignupForm->AllowMultipleFlag &&
				count(SignupEntry::LoadArrayBySignupFormIdPersonIdSignupEntryStatusTypeId($this->objSignupForm->Id, QApplication::$PublicLogin->PersonId, SignupEntryStatusType::Complete))) {
				$this->strHtmlIncludeFilePath = '_registered.tpl.php';
				return;
			}
			
			// Ensure capacity limits
			if (!$this->objSignupForm->IsWithinCapacity()) {
				$this->strHtmlIncludeFilePath = '_capacity.tpl.php';
				return;
			}

			$this->objEvent = $this->objSignupForm->EventSignupForm;
			$objSignupEntryArray = SignupEntry::LoadArrayBySignupFormIdPersonIdSignupEntryStatusTypeId($this->objSignupForm->Id, QApplication::$PublicLogin->PersonId, SignupEntryStatusType::Incomplete);
			if (count($objSignupEntryArray)) $this->objSignupEntry = $objSignupEntryArray[0];
			
			// Create the Entry object if doesn't yet exists
			if (!$this->objSignupEntry) {
				$this->objSignupEntry = new SignupEntry();
				$this->objSignupEntry->SignupForm = $this->objSignupForm;
				$this->objSignupEntry->Person = QApplication::$PublicLogin->Person;
				$this->objSignupEntry->SignupByPerson = QApplication::$PublicLogin->Person;
				$this->objSignupEntry->SignupEntryStatusTypeId = SignupEntryStatusType::Incomplete;
				$this->objSignupEntry->DateCreated = QDateTime::Now();
			}
			
			$this->CreateFormItemControls();
			
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->CausesValidation = true;
			$this->btnSubmit->CssClass = 'primary';
			if ($this->objSignupForm->CountFormProducts())
				$this->btnSubmit->Text = 'Next';
			else
				$this->btnSubmit->Text = 'Submit Registration';
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
		}
		
		public function Form_Validate() {
			$blnToReturn = parent::Form_Validate();
			$blnFirst = true;
			foreach ($this->GetErrorControls() as $objControl) {
				$objControl->Blink();
				if ($blnFirst) {
					$objControl->Focus();
					$blnFirst = false;
				}
			}
			
			return $blnToReturn;
		}
		
		/**
		 * Creates all the controls for each "question" in the form.
		 * Note: For any fields that are looked up from the user's profile (e.g. address, phone, etc.) -- a drop down is available for quick access.
		 * However, if they select "other", we save the data and do NOT link it to any records!
		 * (e.g. if an "other" phone is used, that data is not stored anywhere else)
		 */
		protected function CreateFormItemControls() {
			/**
			 * @var Person
			 */
			$objPerson = $this->objSignupEntry->Person;
			
			// First, set up for the Person Name label
			$lblPersonName = new QLabel($this, 'lblPersonName');
			$lblPersonName->Name = 'Name';
			$lblPersonName->Required = true;
			$lblPersonName->Text = $objPerson->Name;
			$lblPersonName->RenderMethod = 'RenderWithName';
			$this->objFormQuestionControlArray[] = $lblPersonName;

			// Go through all the other fields
			foreach ($this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber)) as $objFormQuestion) {
				$strControlId = 'fq' . $objFormQuestion->Id;
				$objFormAnswer = FormAnswer::LoadBySignupEntryIdFormQuestionId($this->objSignupEntry->Id, $objFormQuestion->Id);

				switch ($objFormQuestion->FormQuestionTypeId) {
					case FormQuestionType::SpouseName:
						if (($objMarriage = $objPerson->GetMostRecentMarriage()) &&
							($objMarriage->MarriedToPerson)) {
							$lstSpouse = new QListBox($this, $strControlId . 'id');
							$lstSpouse->ActionParameter = $strControlId . 'nm';
							if (!$objFormQuestion->RequiredFlag) $lstSpouse->AddItem('- Select One -', null);
							$lstSpouse->AddItem($objMarriage->MarriedToPerson->Name, $objMarriage->MarriedToPerson->Id, true);
							$lstSpouse->AddItem('- Other... -', false);
							$lstSpouse->AddAction(new QChangeEvent(), new QAjaxAction('lst_ToggleOther'));

							$lstSpouse->Name = $objFormQuestion->Question;
							if ($objFormQuestion->RequiredFlag) $lstSpouse->Required = true;
							$lstSpouse->RenderMethod = 'RenderWithName';
							$this->objFormQuestionControlArray[] = $lstSpouse;

							$txtName = new QTextBox($this, $strControlId . 'nm');
							$txtName->RenderMethod = 'RenderWithName';
							$this->objFormQuestionControlArray[] = $txtName;
							$txtName->Visible = false;
							$txtName->Required = false;

							if ($objFormAnswer && strlen($objFormAnswer->TextValue)) {
								if ($lstSpouse->SelectedName != $objFormAnswer->TextValue) {
									$lstSpouse->SelectedIndex = count($lstSpouse->GetAllItems()) - 1;
									$txtName->Text = $objFormAnswer->TextValue;
									$this->lst_ToggleOther(null, $lstSpouse->ControlId, $lstSpouse->ActionParameter);
								}
							}
						} else {
							$lstSpouse = new QListBox($this, $strControlId . 'id');
							$lstSpouse->Visible = false;
							if ($objFormQuestion->RequiredFlag) $lstSpouse->Required = true;
							$lstSpouse->RenderMethod = 'RenderWithName';
							$this->objFormQuestionControlArray[] = $lstSpouse;

							$txtName = new QTextBox($this, $strControlId . 'nm');
							$txtName->Name = $objFormQuestion->Question;
							$txtName->RenderMethod = 'RenderWithName';
							$this->objFormQuestionControlArray[] = $txtName;
							$txtName->Visible = true;
							$txtName->Required = $objFormQuestion->RequiredFlag;

							if ($objFormAnswer && strlen($objFormAnswer->TextValue)) {
								$txtName->Text = $objFormAnswer->TextValue;
							}
						}
						break;

					case FormQuestionType::Address:
						$objHouseholdArray = Household::LoadArrayBySharedHouseholds($objPerson, $this->objSignupEntry->SignupByPerson);
						if (count($objHouseholdArray) > 1) {
							// TODO: Implement!
							throw new Exception('TODO: Not Implemented');
						} else if (count($objHouseholdArray) == 1) {
							$objAddress = $objHouseholdArray[0]->GetCurrentAddress();

							$rblAddress = new QRadioButtonList($this, $strControlId . 'switch');
							$rblAddress->Name = $objFormQuestion->Question;
							$rblAddress->RenderMethod = 'RenderWithName';
							$rblAddress->AddItem('Use Home Address Below', $objAddress->Id, true);
							$rblAddress->AddItem('Edit Home Address', false, false);
							$rblAddress->RepeatColumns = 2;
							$rblAddress->AddAction(new QClickEvent(), new QAjaxAction('rblAddress_Change'));

							$this->objFormQuestionControlArray[] = $rblAddress;
						} else {
							$objAddress = new Address();
							$rblAddress = null;
						}

						$txtAddress1 = new QTextBox($this, $strControlId . 'address1');
						$txtAddress1->Name = 'Address 1';
						$txtAddress1->RenderMethod = 'RenderWithName';
						$txtAddress1->Text = $objAddress->Address1;
						
						$txtAddress2 = new QTextBox($this, $strControlId . 'address2');
						$txtAddress2->Name = 'Address 2';
						$txtAddress2->RenderMethod = 'RenderWithName';
						$txtAddress2->Text = $objAddress->Address2;
						
						$txtCity = new QTextBox($this, $strControlId . 'city');
						$txtCity->Name = 'City, State and Zip';
						$txtCity->RenderMethod = 'RenderWithName';
						$txtCity->Text = $objAddress->City;

						$lstState = new QListBox($this, $strControlId . 'state');
						$lstState->ActionParameter = '_' . $strControlId . 'city';
						$lstState->Name = QApplication::Translate('State');
						$lstState->RenderMethod = 'RenderWithError';
						$lstState->AddItem(QApplication::Translate('- Select One -'), null);
						foreach (UsState::LoadAll(QQ::OrderBy(QQN::UsState()->Name)) as $objUsState) {
							$lstState->AddItem($objUsState->Name, $objUsState->Abbreviation, $objAddress->State == $objUsState->Abbreviation);
						}
						
						$txtZipCode = new QTextBox($this, $strControlId . 'zipcode');
						$txtZipCode->ActionParameter = '_' . $strControlId . 'city';
						$txtZipCode->Name = 'Zip Code';
						$txtZipCode->RenderMethod = 'RenderWithError';
						$txtZipCode->Text = $objAddress->ZipCode;
						$txtZipCode->Width = '80px';

						if ($objFormQuestion->RequiredFlag) {
							$txtAddress1->Required = true;
							$txtCity->Required = true;
							$lstState->Required = true;
							$txtZipCode->Required = true;
						}

						$this->objFormQuestionControlArray[] = $txtAddress1;
						$this->objFormQuestionControlArray[] = $txtAddress2;
						$this->objFormQuestionControlArray[] = $txtCity;
						$this->objFormQuestionControlArray[] = $lstState;
						$this->objFormQuestionControlArray[] = $txtZipCode;
						
						// Final configuration based on whether or not we've got a household record for this person
						// (in which case we have defined a rblAddress)
						if ($rblAddress) {
							// Check to see if the question has been answered before
							if ($objFormAnswer && strlen($objFormAnswer->TextValue)) {
								// If it 
								$objAddress = Address::DeduceAddressFromFullLine($objFormAnswer->TextValue);
								if (($objFormAnswer->AddressId == $rblAddress->SelectedValue) || !$objAddress) {
									$txtAddress1->Enabled = false;
									$txtAddress2->Enabled = false;
									$txtCity->Enabled = false;
									$lstState->Enabled = false;
									$txtZipCode->Enabled = false;
								} else {
									$txtAddress1->Text = $objAddress->Address1;
									$txtAddress2->Text = $objAddress->Address2;
									$txtCity->Text = $objAddress->City;
									$txtZipCode->Text = $objAddress->ZipCode;
									$lstState->SelectedValue = $objAddress->State;
									$rblAddress->SelectedIndex = 1;
								}
							// It has not -- let's default to having the address be presumed correct
							} else {
								$txtAddress1->Enabled = false;
								$txtAddress2->Enabled = false;
								$txtCity->Enabled = false;
								$lstState->Enabled = false;
								$txtZipCode->Enabled = false;
							}
						// No rblAddress - so let's update the address1 label to match the form question's question text
						} else {
							$txtAddress1->Name = $objFormQuestion->Question;
						}
						break;

					case FormQuestionType::Age:
						$txtAge = new QIntegerTextBox($this, $strControlId . 'age');
						$txtAge->Name = $objFormQuestion->Question;
						$txtAge->Minimum = 0;
						$txtAge->Maximum = 130;
						$txtAge->MaxLength = 3;
						if ($objFormAnswer && !is_null($objFormAnswer->IntegerValue))
							$txtAge->Text = $objFormAnswer->IntegerValue;
						else if ((!$objPerson->DobYearApproximateFlag) && $objPerson->Age)
							$txtAge->Text = $objPerson->Age;
						if ($objFormQuestion->RequiredFlag) $txtAge->Required = true;
						$txtAge->RenderMethod = 'RenderWithName';
						$this->objFormQuestionControlArray[] = $txtAge;
						$txtAge->Width = '50px';
						break;

					case FormQuestionType::DateofBirth:
						$dtxDateOfBirth = new QDateTimeTextBox($this, $strControlId . 'dob');
						$dtxDateOfBirth->LabelForInvalid = 'For example, "Mar 20 1977"';
						$dtxDateOfBirth->Name = $objFormQuestion->Question;
						if ($objFormAnswer && !is_null($objFormAnswer->DateValue))
							$dtxDateOfBirth->Text = $objFormAnswer->DateValue->ToString('MMM D YYYY');
						else if ((!$objPerson->DobYearApproximateFlag) && (!$objPerson->DobGuessedFlag) && $objPerson->DateOfBirth)
							$dtxDateOfBirth->Text = $objPerson->DateOfBirth->ToString('MMM D YYYY');
						if ($objFormQuestion->RequiredFlag) $dtxDateOfBirth->Required = true;
						$dtxDateOfBirth->RenderMethod = 'RenderWithName';
						$this->objFormQuestionControlArray[] = $dtxDateOfBirth;
						$dtxDateOfBirth->Width = '150px';
						break;

					case FormQuestionType::Gender:
						$lstGender = new QListBox($this, $strControlId . 'gender');
						$lstGender->Name = $objFormQuestion->Question;
						$lstGender->AddItem('- Select One -', null);
						if ($objFormAnswer && $objFormAnswer->TextValue) {
							$lstGender->AddItem('Male', true, $objFormAnswer->BooleanValue);
							$lstGender->AddItem('Female', false, !$objFormAnswer->BooleanValue);
						} else {
							$lstGender->AddItem('Male', true, $objPerson->Gender == 'M');
							$lstGender->AddItem('Female', false, $objPerson->Gender == 'F');
						}
						if ($objFormQuestion->RequiredFlag) $lstGender->Required = true;
						$lstGender->RenderMethod = 'RenderWithName';
						$this->objFormQuestionControlArray[] = $lstGender;
						break;

					case FormQuestionType::Phone:
						$objPhoneArray = array();
						
						// Add Household Numbers (if applicable)
						foreach ($objPerson->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
							foreach ($objHouseholdParticipation->Household->GetCurrentAddress()->GetPhoneArray() as $objPhone) {
								$objPhoneArray[] = $objPhone;
							}
						}

						// Add Personal Numbers
						foreach ($objPerson->GetPhoneArray() as $objPhone) $objPhoneArray[] = $objPhone;
						
						if (count($objPhoneArray)) {
							$lstPhone = new QListBox($this, $strControlId . 'id');
							$lstPhone->ActionParameter = $strControlId . 'phone';
							$lstPhone->Name = $objFormQuestion->Question;
							$lstPhone->AddItem('- Select One -', null);
							rsort($objPhoneArray);
							foreach ($objPhoneArray as $objPhone)
								$lstPhone->AddItem($objPhone->Number, $objPhone->Id, $objFormAnswer && $objFormAnswer->PhoneId == $objPhone->Id);
							$lstPhone->AddItem('- Other... -', false);

							if ($objFormQuestion->RequiredFlag) $lstPhone->Required = true;
							$lstPhone->RenderMethod = 'RenderWithName';
							$this->objFormQuestionControlArray[] = $lstPhone;
							
							$lstPhone->AddAction(new QChangeEvent(), new QAjaxAction('lst_ToggleOther'));
						}

						$txtPhone = new PhoneTextBox($this, $strControlId . 'phone');
						$this->objFormQuestionControlArray[] = $txtPhone;
						$txtPhone->RenderMethod = 'RenderWithName';

						// We need to deduce whether or not we should show an explicit text-valued phone number from before
						$blnExplicitlyTextValueOnly = ($objFormAnswer && $objFormAnswer->TextValue && (!$lstPhone || !$lstPhone->SelectedValue));

						if (count($objPhoneArray)) {
							if ($blnExplicitlyTextValueOnly) {
								$lstPhone->SelectedIndex = count($lstPhone->GetAllItems()) - 1;
								$txtPhone->Visible = true;
								$txtPhone->Required = $objFormQuestion->RequiredFlag;
								$txtPhone->Text = $objFormAnswer->TextValue;
							} else {
								$txtPhone->Visible = false;
								$txtPhone->Required = false;
							}
						} else {
							$txtPhone->Visible = true;
							$txtPhone->Required = $objFormQuestion->RequiredFlag;
							$txtPhone->Name = $objFormQuestion->Question;

							if ($blnExplicitlyTextValueOnly) {
								$txtPhone->Text = $objFormAnswer->TextValue;
							}
						}

						break;

					case FormQuestionType::Email:
						$objEmailArray = array();
						
						// Add Personal Emails
						foreach ($objPerson->GetEmailArray() as $objEmail) $objEmailArray[] = $objEmail;
						
						if (count($objEmailArray)) {
							$lstEmail = new QListBox($this, $strControlId . 'id');
							$lstEmail->ActionParameter = $strControlId . 'email';
							$lstEmail->Name = $objFormQuestion->Question;
							$lstEmail->AddItem('- Select One -', null);
							rsort($objEmailArray);
							foreach ($objEmailArray as $objEmail)
								$lstEmail->AddItem($objEmail->Address, $objEmail->Id, $objFormAnswer && $objFormAnswer->EmailId == $objEmail->Id);
							$lstEmail->AddItem('- Other... -', false);

							if ($objFormQuestion->RequiredFlag) $lstEmail->Required = true;
							$lstEmail->RenderMethod = 'RenderWithName';
							$this->objFormQuestionControlArray[] = $lstEmail;
							
							$lstEmail->AddAction(new QChangeEvent(), new QAjaxAction('lst_ToggleOther'));
						}

						$txtEmail = new QEmailTextBox($this, $strControlId . 'email');
						$this->objFormQuestionControlArray[] = $txtEmail;
						$txtEmail->RenderMethod = 'RenderWithName';

						// We need to deduce whether or not we should show an explicit text-valued email address from before
						$blnExplicitlyTextValueOnly = ($objFormAnswer && $objFormAnswer->TextValue && (!$lstEmail || !$lstEmail->SelectedValue));

						if (count($objEmailArray)) {
							if ($blnExplicitlyTextValueOnly) {
								$lstEmail->SelectedIndex = count($lstEmail->GetAllItems()) - 1;
								$txtEmail->Visible = true;
								$txtEmail->Required = $objFormQuestion->RequiredFlag;
								$txtEmail->Text = $objFormAnswer->TextValue;
							} else {
								$txtEmail->Visible = false;
								$txtEmail->Required = false;
							}
						} else {
							$txtEmail->Visible = true;
							$txtEmail->Required = $objFormQuestion->RequiredFlag;
							$txtEmail->Name = $objFormQuestion->Question;
							if ($blnExplicitlyTextValueOnly) {
								$txtEmail->Text = $objFormAnswer->TextValue;
							}
						}
						break;

					case FormQuestionType::ShortText:
						$txtAnswer = new QTextBox($this, $strControlId);
						$txtAnswer->Name = $objFormQuestion->Question;
						$txtAnswer->Required = $objFormQuestion->RequiredFlag;
						$txtAnswer->RenderMethod = 'RenderWithName';
						$this->objFormQuestionControlArray[] = $txtAnswer;
						if ($objFormAnswer) $txtAnswer->Text = $objFormAnswer->TextValue;
						break;

					case FormQuestionType::LongText:
						$txtAnswer = new QTextBox($this, $strControlId);
						$txtAnswer->Name = $objFormQuestion->Question;
						$txtAnswer->Required = $objFormQuestion->RequiredFlag;
						$txtAnswer->RenderMethod = 'RenderWithName';
						$txtAnswer->TextMode = QTextMode::MultiLine;
						$this->objFormQuestionControlArray[] = $txtAnswer;
						if ($objFormAnswer) $txtAnswer->Text = $objFormAnswer->TextValue;
						break;

					case FormQuestionType::Number:
						$txtAnswer = new QIntegerTextBox($this, $strControlId);
						$txtAnswer->Name = $objFormQuestion->Question;
						$txtAnswer->Required = $objFormQuestion->RequiredFlag;
						$txtAnswer->RenderMethod = 'RenderWithName';
						$this->objFormQuestionControlArray[] = $txtAnswer;
						$txtAnswer->Width = '50px';
						$txtAnswer->MaxLength = 6;
						if ($objFormAnswer) $txtAnswer->Text = $objFormAnswer->IntegerValue;
						break;

					case FormQuestionType::YesNo:
						$chkAnswer = new QCheckBox($this, $strControlId);
						$chkAnswer->Name = $objFormQuestion->Question;
						$chkAnswer->Text = trim($objFormQuestion->Options);
						$chkAnswer->Required = $objFormQuestion->RequiredFlag;
						$chkAnswer->RenderMethod = 'RenderWithName';
						$this->objFormQuestionControlArray[] = $chkAnswer;
						if ($objFormAnswer) $chkAnswer->Checked = $objFormAnswer->BooleanValue;
						break;

					case FormQuestionType::SingleSelect:
						$lstAnswer = new QListBox($this, $strControlId);
						$lstAnswer->Name = $objFormQuestion->Question;
						$lstAnswer->Required = $objFormQuestion->RequiredFlag;
						$lstAnswer->RenderMethod = 'RenderWithName';
						$this->objFormQuestionControlArray[] = $lstAnswer;
						$lstAnswer->AddItem('- Select One -', null);
						foreach (explode("\n", trim($objFormQuestion->Options)) as $strItem) {
							if (strlen($strItem = trim($strItem)))
								$lstAnswer->AddItem($strItem, $strItem, $objFormAnswer && $objFormAnswer->TextValue == $strItem);
						}
						if ($objFormQuestion->AllowOtherFlag) {
							$lstAnswer->ActionParameter = $strControlId . 'other';
							$lstAnswer->AddAction(new QChangeEvent(), new QAjaxAction('lst_ToggleOther'));
							$lstAnswer->AddItem('- Other... -', false);

							$txtAnswer = new QTextBox($this, $strControlId . 'other');
							$txtAnswer->RenderMethod = 'RenderWithName';
							$txtAnswer->Required = false;
							$txtAnswer->Visible = false;
							$this->objFormQuestionControlArray[] = $txtAnswer;
						}

						if ($objFormAnswer && strlen($objFormAnswer->TextValue) && !$lstAnswer->SelectedValue) {
							if ($objFormQuestion->AllowOtherFlag) {
								$lstAnswer->SelectedIndex = count($lstAnswer->GetAllItems()) - 1;
								$txtAnswer->Text = $objFormAnswer->TextValue;
								$txtAnswer->Visible = true;
							} else {
								$lstAnswer->AddItem($objFormAnswer->TextValue, $objFormAnswer->TextValue, true);
							}
						}
						break;

					case FormQuestionType::MultipleSelect:
						$strAnswerArray = array();
						if ($objFormAnswer) {
							foreach (explode("\n", trim($objFormAnswer->TextValue)) as $strAnswer) if (strlen($strAnswer = trim($strAnswer))) {
								$strAnswerArray[$strAnswer] = $strAnswer;
							}
						}
						$lstAnswer = new QListBox($this, $strControlId);
						$lstAnswer->Name = $objFormQuestion->Question;
						$lstAnswer->SelectionMode = QSelectionMode::Multiple;
						$lstAnswer->Rows = 10;
						$lstAnswer->Required = $objFormQuestion->RequiredFlag;
						$lstAnswer->RenderMethod = 'RenderWithName';
						$this->objFormQuestionControlArray[] = $lstAnswer;
						foreach (explode("\n", trim($objFormQuestion->Options)) as $strItem) {
							if (strlen($strItem = trim($strItem))) {
								$lstAnswer->AddItem($strItem, $strItem, array_key_exists($strItem, $strAnswerArray));
								$strAnswerArray[$strItem] = null;
								unset($strAnswerArray[$strItem]);
							}
						}

						foreach ($strAnswerArray as $strAnswer)
							$lstAnswer->AddItem($strAnswer, $strAnswer, true);
						
						if ($objFormQuestion->AllowOtherFlag) {
							$txtAnswer = new QTextBox($this, $strControlId . 'other');
							$txtAnswer->RenderMethod = 'RenderWithName';
							$txtAnswer->HtmlBefore = 'Add another option and hit <strong>Enter</strong>:<br/>';
							$txtAnswer->Visible = true;
							$txtAnswer->ActionParameter = $strControlId;
							$txtAnswer->AddAction(new QEnterKeyEvent(), new QAjaxAction('txtMultipleSelectOther_Enter'));
							$this->objFormQuestionControlArray[] = $txtAnswer;
						}
						break;

					case FormQuestionType::Instructions:
						$lblAnswer = new QLabel($this, $strControlId);
						$lblAnswer->HtmlEntities = false;
						$lblAnswer->Text = nl2br(QApplication::HtmlEntities(trim($objFormQuestion->Options)), true);

						if (strlen($strLabel = trim($objFormQuestion->Question))) {
							$lblAnswer->Name = $strLabel;
							$lblAnswer->RenderMethod = 'RenderWithName';
						} else {
							$lblAnswer->RenderMethod = 'Render';
						}
						
						$this->objFormQuestionControlArray[] = $lblAnswer;
						break;

					default:
						throw new Exception('Invalid FormQuestionTypeId: ' . $objFormQuestion->FormQuestionTypeId);
				}
			}
		}

		/**
		 * This will toggle the controlId for ActionParameter.  It will set the visible property and required property (if applicable)
		 * @param string $strFormId
		 * @param string $strControlId
		 * @param string $strParameter
		 */
		public function lst_ToggleOther($strFormId, $strControlId, $strParameter) {
			$lstControl = $this->GetControl($strControlId);
			$objControlToToggle = $this->GetControl($strParameter);
			
			if ($lstControl->SelectedValue === false) {
				$objControlToToggle->Visible = true;
				$objControlToToggle->Required = $lstControl->Required;
				$objControlToToggle->Focus();
			} else {
				$objControlToToggle->Visible = false;
				$objControlToToggle->Required = false;
			}
		}
		
		public function txtMultipleSelectOther_Enter($strFormId, $strControlId, $strParameter) {
			$txtOther = $this->GetControl($strControlId);
			$lstOther = $this->GetControl($strParameter);
			
			if (strlen($strText = trim($txtOther->Text)) > 0) {
				$lstOther->AddItem($strText, $strText, true);
			}
			
			$txtOther->Text = null;
		}
		
		public function rblAddress_Change($strFormId, $strControlId, $strParameter) {
			$strControlIdRoot = str_replace('switch', '', $strControlId);
			$rblAddress = $this->GetControl($strControlId);
			$txtAddress1 = $this->GetControl($strControlIdRoot . 'address1');
			$txtAddress2 = $this->GetControl($strControlIdRoot . 'address2');
			$txtCity = $this->GetControl($strControlIdRoot . 'city');
			$lstState = $this->GetControl($strControlIdRoot . 'state');
			$txtZipCode = $this->GetControl($strControlIdRoot . 'zipcode');


			if ($rblAddress->SelectedValue) {
				$objAddress = Address::Load($rblAddress->SelectedValue);
				$txtAddress1->Text = $objAddress->Address1;
				$txtAddress2->Text = $objAddress->Address2;
				$txtCity->Text = $objAddress->City;
				$lstState->SelectedValue = $objAddress->State;
				$txtZipCode->Text = $objAddress->ZipCode;
				
				$txtAddress1->Enabled = false;
				$txtAddress2->Enabled = false;
				$txtCity->Enabled = false;
				$lstState->Enabled = false;
				$txtZipCode->Enabled = false;
			} else {
				$txtAddress1->Enabled = true;
				$txtAddress2->Enabled = true;
				$txtCity->Enabled = true;
				$lstState->Enabled = true;
				$txtZipCode->Enabled = true;
				
				$txtAddress1->Focus();
			}
		}

		protected function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
			$this->objSignupEntry->Save();

			foreach ($this->objSignupForm->GetFormQuestionArray() as $objFormQuestion) {
				$strControlId = 'fq' . $objFormQuestion->Id;
				$objFormAnswer = FormAnswer::LoadBySignupEntryIdFormQuestionId($this->objSignupEntry->Id, $objFormQuestion->Id);
				if (!$objFormAnswer) {
					$objFormAnswer = new FormAnswer();
					$objFormAnswer->SignupEntry = $this->objSignupEntry;
					$objFormAnswer->FormQuestion = $objFormQuestion;
				}

				switch ($objFormQuestion->FormQuestionTypeId) {
					case FormQuestionType::SpouseName:
						$lstSpouse = $this->GetControl($strControlId . 'id');
						$txtSpouse = $this->GetControl($strControlId . 'nm');
						if ($lstSpouse->SelectedValue) {
							$objFormAnswer->TextValue = Person::Load($lstSpouse->SelectedValue)->Name;
						} else {
							$objFormAnswer->TextValue = trim($txtSpouse->Text);
						}
						break;

					case FormQuestionType::Address:
						$rblAddress = $this->GetControl($strControlId . 'switch');
						$txtAddress1 = $this->GetControl($strControlId . 'address1');
						$txtAddress2 = $this->GetControl($strControlId . 'address2');
						$txtCity = $this->GetControl($strControlId . 'city');
						$lstState = $this->GetControl($strControlId . 'state');
						$txtZipCode = $this->GetControl($strControlId . 'zipcode');
						if ($rblAddress && $rblAddress->SelectedValue) {
							$objFormAnswer->AddressId = $rblAddress->SelectedValue;
							$objFormAnswer->TextValue = $objFormAnswer->Address->AddressFullLine;
						} else {
							$objFormAnswer->AddressId = null;
							$objAddress = new Address();
							$objAddress->Address1 = trim($txtAddress1->Text);
							$objAddress->Address2 = trim($txtAddress2->Text);
							$objAddress->City = trim($txtCity->Text);
							$objAddress->State = $lstState->SelectedValue;
							$objAddress->ZipCode = trim($txtZipCode->Text);
							$objFormAnswer->TextValue = $objAddress->AddressFullLine;
						}
						break;

					case FormQuestionType::Age:
						$txtAge = $this->GetControl($strControlId . 'age');
						if (strlen(trim($txtAge->Text)))
							$objFormAnswer->IntegerValue = $txtAge->Text;
						else
							$objFormAnswer->IntegerValue = null;
						break;

					case FormQuestionType::DateofBirth:
						$dtxDateOfBirth = $this->GetControl($strControlId . 'dob');
						if ($dtxDateOfBirth->DateTime) {
							$objFormAnswer->DateValue = $dtxDateOfBirth->DateTime;

							// Update the Person Information
							$this->objSignupEntry->Person->DateOfBirth = $objFormAnswer->DateValue;
							$this->objSignupEntry->Person->DobGuessedFlag = false;
							$this->objSignupEntry->Person->DobYearApproximateFlag = false;
							$this->objSignupEntry->Person->Save();
						} else {
							$objFormAnswer->DateValue = null;
						}
						break;

					case FormQuestionType::Gender:
						$lstGender = $this->GetControl($strControlId . 'gender');
						if ($lstGender->SelectedValue === true) {
							$objFormAnswer->TextValue = 'Male';
							$objFormAnswer->BooleanValue = true;
							$this->objSignupEntry->Person->Gender = 'M';
							$this->objSignupEntry->Person->Save();
						} else if ($lstGender->SelectedValue === false) {
							$objFormAnswer->TextValue = 'Female';
							$objFormAnswer->BooleanValue = false;
							$this->objSignupEntry->Person->Gender = 'F';
							$this->objSignupEntry->Person->Save();
						} else {
							$objFormAnswer->TextValue = null;
							$objFormAnswer->BooleanValue = null;
						}
						break;

					case FormQuestionType::Phone:
						$lstPhone = $this->GetControl($strControlId . 'id');
						$txtPhone = $this->GetControl($strControlId . 'phone');
						if ($lstPhone && $lstPhone->SelectedValue) {
							$objFormAnswer->PhoneId = $lstPhone->SelectedValue;
							$objFormAnswer->TextValue = $objFormAnswer->Phone->Number;
						} else if ($strNumber = trim($txtPhone->Text)) {
							$objFormAnswer->PhoneId = null;
							$objFormAnswer->TextValue = $strNumber;
						} else {
							$objFormAnswer->PhoneId = null;
							$objFormAnswer->TextValue = null;
						}
						break;

					case FormQuestionType::Email:
						$lstEmail = $this->GetControl($strControlId . 'id');
						$txtEmail = $this->GetControl($strControlId . 'email');
						if ($lstEmail && $lstEmail->SelectedValue) {
							$objFormAnswer->EmailId = $lstEmail->SelectedValue;
							$objFormAnswer->TextValue = $objFormAnswer->Email->Address;
						} else if ($strNumber = trim($txtEmail->Text)) {
							$objFormAnswer->EmailId = null;
							$objFormAnswer->TextValue = $strNumber;
						} else {
							$objFormAnswer->EmailId = null;
							$objFormAnswer->TextValue = null;
						}
						break;

					case FormQuestionType::ShortText:
					case FormQuestionType::LongText:
						$txtAnswer = $this->GetControl($strControlId);
						if (strlen($strText = trim($txtAnswer->Text))) {
							$objFormAnswer->TextValue = $strText;
						} else {
							$objFormAnswer->TextValue = null;
						}
						break;

					case FormQuestionType::Number:
						$txtAnswer = $this->GetControl($strControlId);
						if (strlen($strText = trim($txtAnswer->Text))) {
							$objFormAnswer->IntegerValue = $strText;
						} else {
							$objFormAnswer->IntegerValue = null;
						}
						break;

					case FormQuestionType::YesNo:
						$chkAnswer = $this->GetControl($strControlId);
						$objFormAnswer->BooleanValue = $chkAnswer->Checked;
						break;

					case FormQuestionType::SingleSelect:
						$lstAnswer = $this->GetControl($strControlId);
						$txtAnswer = $this->GetControl($strControlId . 'other');
						// No item selected ("-select one-" still selected)
						if (is_null($lstAnswer->SelectedValue)) {
							$objFormAnswer->TextValue = null;

						// "Other" option
						} else if ($lstAnswer->SelectedValue === false) {
							if (strlen($strText = trim($txtAnswer->Text)))
								$objFormAnswer->TextValue = $strText;
							else
								$objFormAnswer->TextValue = null;

						// Regular List Selection
						} else {
							$objFormAnswer->TextValue = trim($lstAnswer->SelectedValue);
						}
						break;

					case FormQuestionType::MultipleSelect:
						$lstAnswer = $this->GetControl($strControlId);
						$strSelectedArray = $lstAnswer->SelectedValues;
						if (count($strSelectedArray)) {
							$objFormAnswer->TextValue = implode("\r\n", $strSelectedArray);
						} else {
							$objFormAnswer->TextValue = null;
						}
						break;

					case FormQuestionType::Instructions:
						// Don't need to do anything here!
						break;

					default:
						throw new Exception('Invalid FormQuestionTypeId: ' . $objFormQuestion->FormQuestionTypeId);
				}
				
				$objFormAnswer->Save();
			}

			if ($this->objSignupForm->CountFormProducts()) {
				QApplication::Redirect($this->objSignupEntry->PaymentUrl);
			} else {
				$this->objSignupEntry->Complete();
				QApplication::Redirect($this->objSignupEntry->ConfirmationUrl);
			}
		}
	}

	EventSignupQForm::Run('EventSignupQForm');
?>