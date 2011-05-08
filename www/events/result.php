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

			$this->btnSave = new QButton($this->dlgEdit);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->CausesValidation = QCausesValidation::SiblingsAndChildren;
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));

			$this->btnCancel = new QLinkButton($this->dlgEdit);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

			$this->btnDelete = new QLinkButton($this->dlgEdit);
			$this->btnDelete->Text = 'Delete';
			$this->btnDelete->CssClass = 'delete';
		}

		protected function dtgFormQuestions_Bind() {
			$this->dtgFormQuestions->DataSource = $this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber));
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

			$this->dlgEdit->ShowDialogBox();
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEditResult_FormAnswer.tpl.php';
			$this->intEditTag = $objFormQuestion->Id;
			$this->objAnswer = FormAnswer::LoadBySignupEntryIdFormQuestionId($this->mctSignupEntry->SignupEntry->Id, $objFormQuestion->Id);
			if (!$this->objAnswer) {
				$this->objAnswer = new FormAnswer();
				$this->objAnswer->SignupEntryId = $this->mctSignupEntry->SignupEntry->Id;
				$this->objAnswer->FormQuestionId = $objFormQuestion->Id;
			}
			
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
					foreach ($this->mctSignupEntry->SignupEntry->Person->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
						foreach ($objHouseholdParticipation->Household->GetAddressArray() as $objAddress)
							if ($objAddress->CurrentFlag) $objAddresses[$objAddress->Id] = $objAddress;
					}
					foreach (Address::LoadArrayByPersonId($this->mctSignupEntry->SignupEntry->Person->Id) as $objAddress) {
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
					break;

				case FormQuestionType::Gender:
					$this->lstListbox->RemoveAllItems();
					$this->lstListbox->AddItem('Male', true, $this->mctSignupEntry->SignupEntry->Person->Gender == 'M');
					$this->lstListbox->AddItem('Female', false, $this->mctSignupEntry->SignupEntry->Person->Gender == 'F');
					$this->lstListbox->Name = 'Gender';
					break;

				case FormQuestionType::Phone:
					break;

				case FormQuestionType::Email:
					break;

				case FormQuestionType::ShortText:
				case FormQuestionType::LongText:
				case FormQuestionType::SingleSelect:
				case FormQuestionType::MultipleSelect:
					break;

				case FormQuestionType::Number:
				case FormQuestionType::Age:
					break;

				case FormQuestionType::DateofBirth:
					break;
			}
		}

		protected function btnEditNote_Click() {
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