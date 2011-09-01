<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::ManageClasses));

	class ClassesForm extends ChmsForm {
		protected $strPageTitle = 'Classes@ALCF - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		protected $mctObject;
		protected $lstLogin;
		protected $txtDisplayName;

		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function Form_Create() {
			$this->mctObject = ClassInstructorMetaControl::CreateFromPathInfo($this, QMetaControlCreateType::CreateOnRecordNotFound);
			if ($this->mctObject->EditMode) {
				$this->strPageTitle .= 'Edit Instructor';
			} else {
				$this->strPageTitle .= 'Create New Instructor';
			}

			$this->lstLogin = $this->mctObject->lstLogin_Create(
				null,
				QQ::OrCondition(
					QQ::AndCondition(
						QQ::IsNull(QQN::Login()->ClassInstructor->Id),
						QQ::Equal(QQN::Login()->LoginActiveFlag, true),
						QQ::Equal(QQN::Login()->DomainActiveFlag, true)),
					QQ::Equal(QQN::Login()->Id, $this->mctObject->ClassInstructor->LoginId)),
				QQ::OrderBy(QQN::Login()->FirstName, QQN::Login()->LastName)
			);

			$this->txtDisplayName = $this->mctObject->txtDisplayName_Create();
			$this->txtDisplayName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			
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
			$this->mctObject->SaveClassInstructor();
			QApplication::Redirect('/classes/');
		}

		protected function btnCancel_Click() {
			QApplication::Redirect('/classes/');
		}
	
		protected function btnDelete_Click() {
			if ($this->mctObject->ClassInstructor->CountClassMeetings()) {
				QApplication::DisplayAlert('Cannot delete a Instructor that has classes assigned to it.');
				return;
			} else {
				$this->mctObject->DeleteClassInstructor();
				QApplication::Redirect('/classes/');
			}
		}
	}

	ClassesForm::Run('ClassesForm');
?>