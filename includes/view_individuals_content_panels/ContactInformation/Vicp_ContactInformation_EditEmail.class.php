<?php
	class Vicp_ContactInformation_EditEmail extends Vicp_Base {
		public $mctEmail;
		public $btnDelete;

		public $txtAddress;

		protected function SetupPanel() {
			// Ensure Permission
			if (!$this->objPerson->IsLoginCanEditEmailAddress(QApplication::$Login)) {
				return $this->ReturnTo('#contact');
			}

			// Get and Validate the Email Object
			$this->mctEmail = EmailMetaControl::Create($this, $this->strUrlHashArgument, QMetaControlCreateType::CreateOnRecordNotFound);

			if (!$this->mctEmail->EditMode) {
				// Trying to create a NEW Email
				$this->mctEmail->Email->Person = $this->objPerson;
				$this->btnSave->Text = 'Create';
			} else {
				// Ensure the Email object belongs to the person
				if ($this->mctEmail->Email->PersonId != $this->objPerson->Id) {
					return $this->ReturnTo('#contact');
				}
				$this->btnSave->Text = 'Update';

				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->CssClass = 'delete';
				if ($this->objPerson->PrimaryEmailId == $this->mctEmail->Email->Id) {
					$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('You are about to delete the PRIMARY email address.  Are you SURE you want to permenantly DELETE this record?'));
				} else {
					$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to permenantly DELETE this record?'));
				}
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}

			$this->txtAddress = $this->mctEmail->txtAddress_Create();
			$this->txtAddress->Required = true;

			$this->txtAddress->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->txtAddress->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtAddress->CausesValidation = $this->btnSave->CausesValidation;
		}

		public function btnSave_Click() {
			$this->mctEmail->SaveEmail();
			$this->objPerson->RefreshPrimaryContactInfo();
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}

		public function btnCancel_Click() {
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}
	
		public function btnDelete_Click() {
			$this->mctEmail->Email->Delete();
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}
	}
?>