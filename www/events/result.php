<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewSignupForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		/**
		 * @var SignupForm
		 */
		protected $objSignupForm;
		protected $mctSignupEntry;
		
		protected $lblPerson;
		protected $lblSignupByPerson;
		protected $lblSignupEntryStatusType;
		protected $lblDateCreated;
		protected $lblDateSubmitted;

		protected $lblInternalNotes;
		protected $btnEditNote;

		protected $dtgFormQuestions;
		protected $pxyEditFormQuestion;

		protected $dtgSignupProducts;

		protected $dlgEdit;
		/**
		 * Tag should be -1 if we are editing the "note"
		 * Should be -2 if we are entering a payment
		 * Otherwise it's the ID# of the SignupForm's FormQuestion Id being edited/created
		 * @var integer
		 */
		protected $intEditTag;
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		// Dialog Box for Internal Note
		protected $txtTextArea;

		// Dialog Box for FormAnswer
		protected $objAnswer;
		protected $txtTextbox;
		protected $lstListbox;
		protected $txtInteger;
		protected $chkBoolean;
		protected $dtxDateValue;
		protected $lblInstructions;
		

		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			if (!$this->objSignupForm) QApplication::Redirect('/events/');

			// Check for view *and* admin permissions on this ministry
			if (!$this->objSignupForm->IsLoginCanView(QApplication::$Login)) QApplication::Redirect('/events/');
			if (!$this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/events/');

			$this->strPageTitle .= $this->objSignupForm->Name;

			// Check for the SignupEntry
			if (QApplication::PathInfo(1)) {
				$objSignupEntry = SignupEntry::Load(QApplication::PathInfo(1));
				if (!$objSignupEntry) QApplication::Redirect('/events/');
				if ($objSignupEntry->SignupFormId != $this->objSignupForm->Id) QApplication::Redirect('/events/');
			} else {
				$objSignupEntry = new SignupEntry();
				$objSignupEntry->SignupForm = $this->objSignupForm;
			}

			$this->mctSignupEntry = new SignupEntryMetaControl($this, $objSignupEntry);
			$this->lblPerson = new QLabel($this);
			$this->lblPerson->Name = 'Person';
			$this->lblPerson->Text = $this->mctSignupEntry->SignupEntry->Person->Name;
			
			$this->lblSignupEntryStatusType = $this->mctSignupEntry->lblSignupEntryStatusTypeId_Create();
			$this->lblDateCreated = $this->mctSignupEntry->lblDateCreated_Create();
			$this->lblDateSubmitted = $this->mctSignupEntry->lblDateSubmitted_Create();
			
			if (($this->mctSignupEntry->SignupEntry->PersonId != $this->mctSignupEntry->SignupEntry->SignupByPersonId) &&
				($this->mctSignupEntry->SignupEntry->SignupByPersonId)) {
				$this->lblSignupByPerson = new QLabel($this);
				$this->lblSignupByPerson->Text = $this->mctSignupEntry->SignupEntry->SignupByPerson->Name;
			}

			$this->lblInternalNotes = $this->mctSignupEntry->lblInternalNotes_Create();

			$this->btnEditNote = new QButton($this);
			$this->btnEditNote->Text = 'Edit Internal Note';
			$this->btnEditNote->AddAction(new QClickEvent(), new QAjaxAction('btnEditNote_Click'));
			$this->btnEditNote->CssClass = 'primary';

			$this->dtgFormQuestions = new QDataGrid($this);
			$this->dtgFormQuestions->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->ShortDescription; ?>', 'Width=200px'));
			$this->dtgFormQuestions->AddColumn(new QDataGridColumn('Response', '<?= $_FORM->RenderResponse($_ITEM); ?>', 'Width=600px', 'HtmlEntities=false'));
			$this->dtgFormQuestions->SetDataBinder('dtgFormQuestions_Bind');

			$this->pxyEditFormQuestion = new QControlProxy($this);
			$this->pxyEditFormQuestion->AddAction(new QClickEvent(), new QAjaxAction('pxyEditFormQuestion_Click'));
			$this->pxyEditFormQuestion->AddAction(new QClickEvent(), new QTerminateAction());
		
			$this->dlgEdit_Create();
		}
		
		protected function dlgEdit_Create() {
			// DIalog box stuff
			$this->dlgEdit = new QDialogBox($this);
			$this->dlgEdit->HideDialogBox();
			$this->dlgEdit->MatteClickable = false;
			
			$this->txtTextArea = new QTextBox($this->dlgEdit);
			$this->txtTextArea->TextMode = QTextMode::MultiLine;

			$this->txtTextbox = new QTextBox($this->dlgEdit);
			$this->lstListbox = new QListBox($this->dlgEdit);
			$this->txtInteger = new QIntegerTextBox($this->dlgEdit);
			$this->chkBoolean = new QCheckBox($this->dlgEdit);
			$this->dtxDateValue = new QDateTimeTextBox($this->dlgEdit);
			$this->lblInstructions = new QLabel($this->dlgEdit);
			$this->lblInstructions->HtmlEntities = false;

			$this->btnSave = new QButton($this->dlgEdit);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->CausesValidation = QCausesValidation::SiblingsAndChildren;
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));

			$this->btnCancel = new QLinkButton($this->dlgEdit);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->btnDelete = new QLinkButton($this->dlgEdit);
			$this->btnDelete->Text = 'Delete';
			$this->btnDelete->CssClass = 'delete';
		}

		protected function dtgFormQuestions_Bind() {
			$this->dtgFormQuestions->DataSource = $this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber));
		}
		
		public function ResetDialogControls() {
			$this->txtTextArea->Required = false;
			$this->txtTextbox->Required = false;
			$this->lstListbox->Required = false;
			$this->txtInteger->Required = false;
			$this->chkBoolean->Required = false;
			$this->dtxDateValue->Required = false;

			$this->lstListbox->SelectionMode = QSelectionMode::Single;
			$this->lstListbox->Height = null;
			$this->lstListbox->Width = null;
			$this->lstListbox->RemoveAllActions(QChangeEvent::EventName);

			$this->txtTextbox->RemoveAllActions(QEnterKeyEvent::EventName);
			$this->txtTextbox->Instructions = null;		
		}

		public function RenderResponse(FormQuestion $objFormQuestion) {
			$objFormAnswer = FormAnswer::LoadBySignupEntryIdFormQuestionId($this->mctSignupEntry->SignupEntry->Id, $objFormQuestion->Id);
			$strToReturn = null;

			if ($objFormAnswer) {
				switch ($objFormQuestion->FormQuestionTypeId) {
					case FormQuestionType::YesNo:
						if ($objFormAnswer->BooleanValue === true) $strToReturn = 'Yes';
						if ($objFormAnswer->BooleanValue === false) $strToReturn = 'No';
						break;

					case FormQuestionType::SpouseName:
					case FormQuestionType::Address:
					case FormQuestionType::Gender:
					case FormQuestionType::Phone:
					case FormQuestionType::Email:
					case FormQuestionType::ShortText:
					case FormQuestionType::LongText:
					case FormQuestionType::SingleSelect:
					case FormQuestionType::MultipleSelect:
						$strToReturn = QApplication::HtmlEntities(trim($objFormAnswer->TextValue));
						break;

					case FormQuestionType::Number:
					case FormQuestionType::Age:
						$strToReturn = $objFormAnswer->IntegerValue;
						break;

					case FormQuestionType::DateofBirth:
						if ($objFormAnswer->DateValue) $strToReturn = $objFormAnswer->DateValue->ToString('MMM D YYYY');
						break;
				}
			}

			if (strlen($strToReturn)) {
				// If we are here, nothing was answered!
				return (sprintf('<a href="#" style="font-weight: bold;" %s>%s</a>', $this->pxyEditFormQuestion->RenderAsEvents($objFormQuestion->Id, false), $strToReturn));
			} else {
				// If we are here, nothing was answered!
				return (sprintf('<a href="#" style="color: #999; font-size: 10px;" %s>Not Answered</a>', $this->pxyEditFormQuestion->RenderAsEvents($objFormQuestion->Id, false)));
			}
		}

		protected function pxyEditFormQuestion_Click($strFormId, $strControlId, $strParameter) {
			$objFormQuestion = FormQuestion::Load($strParameter);
			if ($objFormQuestion->SignupFormId != $this->objSignupForm->Id) return;

			/**
			 * @var SignupEntry
			 */
			$objSignupEntry = $this->mctSignupEntry->SignupEntry;
			/**
			 * @var Person
			 */
			$objPerson = $this->mctSignupEntry->SignupEntry->Person;
			
			$this->dlgEdit->ShowDialogBox();
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEditResult_FormAnswer.tpl.php';
			$this->intEditTag = $objFormQuestion->Id;
			$this->objAnswer = FormAnswer::LoadBySignupEntryIdFormQuestionId($objSignupEntry->Id, $objFormQuestion->Id);
			if (!$this->objAnswer) {
				$this->objAnswer = new FormAnswer();
				$this->objAnswer->SignupEntryId = $objSignupEntry->Id;
				$this->objAnswer->FormQuestionId = $objFormQuestion->Id;
			}

			// Reset
			$this->ResetDialogControls();

			// Setup the appropriate control
			switch ($objFormQuestion->FormQuestionTypeId) {
				case FormQuestionType::YesNo:
					$this->chkBoolean->Name = 'Response';
					$this->chkBoolean->Checked = $this->objAnswer->BooleanValue;
					$this->chkBoolean->Text = $objFormQuestion->ShortDescription;
					break;

				case FormQuestionType::SpouseName:
					$this->txtTextbox->Name = 'Spouse\'s Name';
					$this->txtTextbox->Text = $this->objAnswer->TextValue;
					$this->txtTextbox->Focus();
					break;

				case FormQuestionType::Address:
					$objAddresses = array();
					foreach ($objPerson->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
						foreach ($objHouseholdParticipation->Household->GetAddressArray() as $objAddress)
							if ($objAddress->CurrentFlag) $objAddresses[$objAddress->Id] = $objAddress;
					}
					foreach (Address::LoadArrayByPersonId($objPerson->Id) as $objAddress) {
						if ($objAddress->CurrentFlag) $objAddresses[$objAddress->Id] = $objAddress;
					}
					$this->lstListbox->RemoveAllItems();
					foreach ($objAddresses as $objAddress) {
						$this->lstListbox->AddItem(
							sprintf('%s (%s)', $objAddress->Label, $objAddress->AddressShortLine),
								$objAddress->Id,
								$objAddress->Id == $this->objAnswer->AddressId);
					}
					$this->lstListbox->Name = $objFormQuestion->ShortDescription;
					
					$this->lblInstructions->Text = sprintf(
						'If you need to specify an address that is not listed, you will need to <a href="%s">Update this person\'s Contact Info</a>.',
						$objPerson->ContactInfoLinkUrl);
					break;

				case FormQuestionType::Gender:
					$this->lstListbox->RemoveAllItems();
					$this->lstListbox->AddItem('Male', true, $objPerson->Gender == 'M');
					$this->lstListbox->AddItem('Female', false, $objPerson->Gender == 'F');
					$this->lstListbox->Name = 'Gender';
					
					$this->lblInstructions->Text = 'Please note that updating the Gender value here will also update this person\'s record in NOAH.';
					break;

				case FormQuestionType::Phone:
					$objPhones = array();
					foreach ($objPerson->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
						foreach ($objHouseholdParticipation->Household->GetAddressArray() as $objAddress) {
							foreach ($objAddress->GetPhoneArray() as $objPhone) {
								$objPhones[] = $objPhone;
							}
						}
					}
					foreach ($objPerson->GetPhoneArray() as $objPhone) $objPhones[] = $objPhone;

					$this->lstListbox->RemoveAllItems();
					foreach ($objPhones as $objPhone) {
						$this->lstListbox->AddItem(
							sprintf('%s (%s)', $objPhone->Number, $objPhone->Label),
							$objPhone->Id,
							$objPhone->Id == $this->objAnswer->PhoneId);
					}
					$this->lstListbox->Name = $objFormQuestion->ShortDescription;
					$this->lblInstructions->Text = sprintf(
						'If you need to specify a phone number that is not listed, you will need to <a href="%s">Update this person\'s Contact Info</a>.',
						$objPerson->ContactInfoLinkUrl);
					break;

				case FormQuestionType::Email:
					$this->lstListbox->RemoveAllItems();
					foreach ($objPerson->GetEmailArray() as $objEmail) {
						$this->lstListbox->AddItem(
							$objEmail->Label,
							$objEmail->Id,
							$objEmail->Id == $this->objAnswer->EmailId);
					}
					$this->lstListbox->Name = $objFormQuestion->ShortDescription;
					$this->lblInstructions->Text = sprintf(
						'If you need to specify an email address that is not listed, you will need to <a href="%s">Update this person\'s Contact Info</a>.',
						$objPerson->ContactInfoLinkUrl);
					break;

				case FormQuestionType::ShortText:
					$this->txtTextbox->Text = $this->objAnswer->TextValue;
					$this->txtTextbox->Name = $objFormQuestion->ShortDescription;
					break;

				case FormQuestionType::LongText:
					$this->txtTextArea->Text = $this->objAnswer->TextValue;
					$this->txtTextArea->Name = $objFormQuestion->ShortDescription;
					break;

				case FormQuestionType::SingleSelect:
					$this->lstListbox->RemoveAllItems();
					$this->lstListbox->Name = $objFormQuestion->ShortDescription;
					foreach (explode("\n", $objFormQuestion->Options) as $strOption) {
						$strOption = trim($strOption);
						$this->lstListbox->AddItem($strOption, $strOption, trim($this->objAnswer->TextValue) == $strOption);
					}
					if ($objFormQuestion->AllowOtherFlag) {
						$this->txtTextbox->Name = 'Other...';
						if (!$this->lstListbox->SelectedValue && strlen(trim($this->objAnswer->TextValue))) {
							$blnOtherSelected = true;
							$this->txtTextbox->Text = trim($this->objAnswer->TextValue);
						} else {
							$blnOtherSelected = false;
						}
						
						$this->txtTextbox->Enabled = $blnOtherSelected;
						$this->lstListbox->AddItem('- Other... -', false, $blnOtherSelected);
						$this->lstListbox->AddAction(new QChangeEvent(), new QAjaxAction('lstListbox_Change'));
						$this->lstListbox_Change();
					}
					break;

				case FormQuestionType::MultipleSelect:
					$this->lstListbox->SelectionMode = QSelectionMode::Multiple;
					$this->lstListbox->Height = '100px';
					$this->lstListbox->Width = '200px';
					$this->lstListbox->RemoveAllItems();
					$this->lstListbox->Name = $objFormQuestion->ShortDescription;
					
					// Get the answers
					$strAnswerArray = $this->objAnswer->GetSelectedMultipleChoiceArray();
					foreach ($objFormQuestion->GetOptionsAsArray() as $strOption) {
						if (array_key_exists($strOption, $strAnswerArray)) {
							$blnSelected = true;
							unset($strAnswerArray[$strOption]);
						} else
							$blnSelected = false;
						$this->lstListbox->AddItem($strOption, $strOption, $blnSelected);
					}
					
					// Add "others" for any remaining answers
					foreach ($strAnswerArray as $strAnswer)
						$this->lstListbox->AddItem($strAnswer, $strAnswer, true);
						
					// Are we allowing "others"?
					if ($objFormQuestion->AllowOtherFlag) {
						$this->txtTextbox->Name = 'Other...';
						$this->txtTextbox->Text = null;
						$this->txtTextbox->AddAction(new QEnterKeyEvent(), new QAjaxAction('txtTextbox_EnterKey'));
						$this->txtTextbox->AddAction(new QEnterKeyEvent(), new QTerminateAction());
						$this->txtTextbox->Instructions = 'Type in a value and hit <strong>return</strong> to add it to the list';
					}
					break;

				case FormQuestionType::Number:
					$this->txtInteger->Text = $this->objAnswer->IntegerValue;
					$this->txtInteger->Name = $objFormQuestion->ShortDescription;
					break;

				case FormQuestionType::Age:
					$this->txtTextbox->Name = $objFormQuestion->ShortDescription;
					$this->txtTextbox->Text = $objPerson->Age;
					$this->txtTextbox->Enabled = false;
					$this->lblInstructions->Text = sprintf(
						'If you need modify the person\'s age, you will need to <a href="%s">update this person\'s NOAH information</a>.',
						$objPerson->LinkUrl);
					break;

				case FormQuestionType::DateofBirth:
					$this->txtTextbox->Name = $objFormQuestion->ShortDescription;
					$this->txtTextbox->Text = ($objPerson->DateOfBirth ? $objPerson->DateOfBirth->ToString('MMM D YYYY') : null);
					$this->txtTextbox->Enabled = false;
					$this->lblInstructions->Text = sprintf(
						'If you need modify the person\'s date of birth, you will need to <a href="%s">update this person\'s NOAH information</a>.',
						$objPerson->LinkUrl);
					break;
			}
		}

		protected function txtTextbox_EnterKey() {
			$strText = trim($this->txtTextbox->Text);
			if (strlen($strText))
				$this->lstListbox->AddItem($strText, $strText, true);
			$this->txtTextbox->Text = null;
		}

		protected function lstListbox_Change() {
			if ($this->lstListbox->SelectedValue === false) {
				$this->txtTextbox->Enabled = true;
				$this->txtTextbox->Required = true;
				$this->txtTextbox->Focus();
			} else {
				$this->txtTextbox->Enabled = false;
				$this->txtTextbox->Required = false;
				$this->txtTextbox->Text = null;
			}
		}

		protected function btnEditNote_Click() {
			$this->ResetDialogControls();

			$this->dlgEdit->ShowDialogBox();
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEditResult_InternalNote.tpl.php';
			$this->txtTextArea->Text = trim($this->mctSignupEntry->SignupEntry->InternalNotes);
			$this->txtTextArea->Focus();
			$this->intEditTag = -1;
		}

		protected function btnSave_Click() {
			if (!$this->intEditTag) $this->btnCancel_Click();
			
			switch ($this->intEditTag) {
				case -2:
					break;
				case -1:
					$this->mctSignupEntry->SignupEntry->InternalNotes = trim($this->txtTextArea->Text);
					$this->mctSignupEntry->SaveSignupEntry();
					$this->mctSignupEntry->lblInternalNotes_Refresh();
					break;
				default:
					break;
			}
			
			$this->btnCancel_Click();
		}
		
		protected function btnCancel_Click() {
			$this->intEditTag = null;
			$this->dlgEdit->HideDialogBox();
		}
	}

	ViewSignupForm::Run('ViewSignupForm');
?>