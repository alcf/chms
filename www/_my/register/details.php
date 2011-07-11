<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic(true);

	class PublicLoginForm extends ChmsForm {
		protected $strPageTitle = 'Registration Details';
		protected $lblUsername;
		protected $lblName;
		protected $lblEmail;

		protected $btnConfirm;
		protected $btnCancel;
		
		protected function Form_Run() {
			if (QApplication::$PublicLogin->Person) QApplication::Redirect('/main/');
		}

		protected function Form_Create() {
			$this->lblUsername = new QLabel($this);
			$this->lblUsername->Name = 'Username';
			$this->lblUsername->Text = QApplication::$PublicLogin->Username;

			$this->lblName = new QLabel($this);
			$this->lblName->Name = 'Name';
			$this->lblName->Text = QApplication::$PublicLogin->ProvisionalPublicLogin->FirstName . ' ' . QApplication::$PublicLogin->ProvisionalPublicLogin->LastName;

			$this->lblEmail = new QLabel($this);
			$this->lblEmail->Name = 'Email Address';
			$this->lblEmail->Text = QApplication::$PublicLogin->ProvisionalPublicLogin->EmailAddress;

			$this->btnConfirm = new QButton($this);
			$this->btnConfirm->Text = 'Confirm Registration';
			$this->btnConfirm->CausesValidation = true;
			$this->btnConfirm->AddAction(new QClickEvent(), new QAjaxAction('btnConfirm_Click'));

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function Form_Validate() {
			$blnToReturn = true;

			$blnFirst = true;
			foreach ($this->GetErrorControls() as $objControl) {
				if ($blnFirst) {
					$blnFirst = false;
					$objControl->Focus();
				}
				$objControl->Blink();
			}

			return $blnToReturn;
		}

		protected function btnConfirm_Click($strFormId, $strControlId, $strParameter) {
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::PublicLogout(false);
			QApplication::Redirect('/register/');
		}
	}

	PublicLoginForm::Run('PublicLoginForm');
?>