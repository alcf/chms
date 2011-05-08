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

		protected $txtTextArea;

		protected $btnEditNote;

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

			$this->dlgEdit = new QDialogBox($this);
			$this->dlgEdit->HideDialogBox();
			$this->dlgEdit->MatteClickable = false;
			
			$this->txtTextArea = new QTextBox($this->dlgEdit);
			$this->txtTextArea->TextMode = QTextMode::MultiLine;
			
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