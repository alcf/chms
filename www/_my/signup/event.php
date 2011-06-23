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

		protected function Form_Create() {
			// Attempt to load by Token and then by ID
			$this->objSignupForm = SignupForm::LoadByToken(QApplication::PathInfo(0));
			if (!$this->objSignupForm) $this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));

			// Ensure it is the correct type and it exists
			if (!$this->objSignupForm || !$this->objSignupForm->EventSignupForm) {
				$this->strHtmlIncludeFilePath = '_notfound.tpl.php';
				return;
			}

			// Ensure it is Active
			if (!$this->objSignupForm->ActiveFlag) {
				$this->strHtmlIncludeFilePath = '_notactive.tpl.php';
				return;
			}
			
			// Finally, ensure we are not double registering where not allowed
			if (!$this->objSignupForm->AllowMultipleFlag &&
				count(SignupEntry::LoadArrayBySignupFormIdPersonIdSignupEntryStatusTypeId($this->objSignupForm->Id, QApplication::$PublicLogin->PersonId, SignupEntryStatusType::Complete))) {
				$this->strHtmlIncludeFilePath = '_registered.tpl.php';
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
						
						if ($objAddress->Id) {
							$txtAddress1->Enabled = false;
							$txtAddress2->Enabled = false;
							$txtCity->Enabled = false;
							$lstState->Enabled = false;
							$txtZipCode->Enabled = false;
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
						if ((!$objPerson->DobYearApproximateFlag) && $objPerson->Age)
							$txtAge->Text = $objPerson->Age;
						if ($objFormQuestion->RequiredFlag) $txtAge->Required = true;
						$txtAge->RenderMethod = 'RenderWithName';
						$this->objFormQuestionControlArray[] = $txtAge;
						$txtAge->Width = '50px';
						break;

					case FormQuestionType::DateofBirth:
						$dtxDateOfBirth = new QDateTimeTextBox($this, $strControlId . 'dob');
						$dtxDateOfBirth->Name = $objFormQuestion->Question;
						if ((!$objPerson->DobYearApproximateFlag) && (!$objPerson->DobGuessedFlag) && $objPerson->DateOfBirth)
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
						$lstGender->AddItem('Male', true, $objPerson->Gender == 'M');
						$lstGender->AddItem('Female', true, $objPerson->Gender == 'F');
						if ($objFormQuestion->RequiredFlag) $lstGender->Required = true;
						$lstGender->RenderMethod = 'RenderWithName';
						$this->objFormQuestionControlArray[] = $lstGender;
						break;

					case FormQuestionType::Phone:
						break;
					case FormQuestionType::Email:
						break;
					case FormQuestionType::ShortText:
						break;
					case FormQuestionType::LongText:
						break;
					case FormQuestionType::Number:
						break;
					case FormQuestionType::YesNo:
						break;
					case FormQuestionType::SingleSelect:
						break;
					case FormQuestionType::MultipleSelect:
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
			} else {
				$objControlToToggle->Visible = false;
				$objControlToToggle->Required = false;
			}
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
			}
		}

		protected function SaveData() {
			switch ($objFormQuestion->FormQuestionTypeId) {
				case FormQuestionType::SpouseName:
					break;
				case FormQuestionType::Address:
					break;
				case FormQuestionType::Age:
					break;
				case FormQuestionType::DateofBirth:
					break;
				case FormQuestionType::Gender:
					break;
				case FormQuestionType::Phone:
					break;
				case FormQuestionType::Email:
					break;
				case FormQuestionType::ShortText:
					break;
				case FormQuestionType::LongText:
					break;
				case FormQuestionType::Number:
					break;
				case FormQuestionType::YesNo:
					break;
				case FormQuestionType::SingleSelect:
					break;
				case FormQuestionType::MultipleSelect:
					break;
			}
		}

		protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {
			
		}
	}

	EventSignupQForm::Run('EventSignupQForm');
?>