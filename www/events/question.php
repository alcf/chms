<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class FormQuestionEditForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		protected $objSignupForm;
		protected $mctQuestion;
		
		protected $lblHeading;
		
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;
		
		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			$this->lblHeading = new QLabel($this);

			if (!$this->objSignupForm) QApplication::Redirect('/events/');
			if (!$this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);

			if (QApplication::PathInfo(1)) {
				$objQuestion = FormQuestion::Load(QApplication::PathInfo(1));
				if (!$objQuestion) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
				if ($objQuestion->SignupFormId != $this->objSignupForm->Id) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
				$this->strPageTitle .= 'Edit Question';
				$this->lblHeading->Text = 'Edit ' . $objQuestion->Type . ' Question';
			} else {
				if (!QApplication::PathInfo(2)) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
				$objQuestion = new FormQuestion();
				$objQuestion->SignupForm = $this->objSignupForm;
				$objQuestion->FormQuestionTypeId = QApplication::PathInfo(2);
				$objQuestion->OrderNumber = 100000;
				$this->strPageTitle .= 'Create New Question';
				$this->lblHeading->Text = 'Create New ' . $objQuestion->Type . ' Question';
			}
			
			$this->mctQuestion = new FormQuestionMetaControl($this, $objQuestion);

			// Buttons
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->CausesValidation = true;
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			
			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			
			// Delete?
			if ($this->mctQuestion->EditMode) {
				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->CssClass = 'delete';
				
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to DELETE this Signup Form?  Any responsese from existing registrations will be deleted as well, and this cannot be undone.'));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}			
		}
	}
	
	FormQuestionEditForm::Run('FormQuestionEditForm');
?>