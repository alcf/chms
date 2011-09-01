<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::ManageClasses));

	class ClassesForm extends ChmsForm {
		protected $strPageTitle = 'Classes@ALCF - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		protected $mctObject;
		protected $txtName;
		protected $txtCode;

		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function Form_Create() {
			$this->mctObject = ClassCourseMetaControl::CreateFromPathInfo($this, QMetaControlCreateType::CreateOnRecordNotFound);
			if ($this->mctObject->EditMode) {
				$this->strPageTitle .= 'Edit Course';
			} else {
				$this->strPageTitle .= 'Create New Course';
			}

			$this->txtName = $this->mctObject->txtName_Create();
			$this->txtName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtCode = $this->mctObject->txtCode_Create();
			$this->txtCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			
			$this->btnSave = new QButton($this);
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->Text = ($this->mctObject->EditMode) ? 'Update' : 'Create';
			$this->btnSave->CausesValidation = true;
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->AddAction(new QClickEvent(), new QTerminateAction());

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());

			if ($this->mctObject->EditMode) {
				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->CssClass = 'delete';
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to PERMANENTLY DELETE this?'));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}
		}

		protected function btnSave_Click() {
			$this->mctObject->SaveClassCourse();
			QApplication::Redirect('/classes/');
		}

		protected function btnCancel_Click() {
			QApplication::Redirect('/classes/');
		}
	
		protected function btnDelete_Click() {
			if ($this->mctObject->ClassCourse->CountClassMeetings()) {
				QApplication::DisplayAlert('Cannot delete a Course that has classes assigned to it.');
				return;
			} else {
				$this->mctObject->DeleteClassCourse();
				QApplication::Redirect('/classes/');
			}
		}
	}

	ClassesForm::Run('ClassesForm');
?>