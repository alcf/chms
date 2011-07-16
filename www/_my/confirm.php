<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	class PublicLoginForm extends ChmsForm {
		protected $strPageTitle = 'Registration Confirmation';
		protected $txtUsername;
		protected $txtCode;
		protected $btnConfirm;

		protected function Form_Run() {
			if (QApplication::$PublicLogin) {
				if (QApplication::$PublicLogin->Person)
					QApplication::Redirect('/main/');
				else
					QApplication::Redirect('/register/details.php');
			}
		}

		protected function Form_Create() {
			$this->txtUsername = new QTextBox($this);
			$this->txtUsername->Name = 'Username';
			$this->txtUsername->Required = true;
			$this->txtUsername->Text = QApplication::PathInfo(0);

			$this->txtCode = new QTextBox($this);
			$this->txtCode->Name = 'Confirmation Code';
			$this->txtCode->Required = true;
			$this->txtCode->CausesValidation = true;
			$this->txtCode->Text = QApplication::PathInfo(1);
			
			$this->btnConfirm = new QButton($this);
			$this->btnConfirm->Text = 'Confirm My Email';
			$this->btnConfirm->CausesValidation = true;

			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtCode));
			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtCode->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnConfirm_Click'));
			$this->txtCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnConfirm->AddAction(new QClickEvent(), new QAjaxAction('btnConfirm_Click'));
			
			if (!$this->txtUsername->Text)
				$this->txtUsername->Focus();
			else
				$this->txtCode->Focus();
		}

		protected function Form_Validate() {
			$blnToReturn = true;

			$objPublicLogin = PublicLogin::LoadByUsername($this->txtUsername->Text);
			if (!$objPublicLogin ||
				(!$objPublicLogin->ActiveFlag) ||
				($objPublicLogin->Person) ||
				(!$objPublicLogin->ProvisionalPublicLogin)) {
				$blnToReturn = false;
				$this->txtUsername->Warning = 'Username and/or code is invalid';
			} else if ($objPublicLogin->ProvisionalPublicLogin->ConfirmationCode != strtolower(trim($this->txtCode->Text))) {
				$blnToReturn = false;
				$this->txtUsername->Warning = 'Username and/or code is invalid';
			}

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
			$objPublicLogin = PublicLogin::LoadByUsername($this->txtUsername->Text);
			QApplication::PublicLogin($objPublicLogin);
			QApplication::Redirect('/register/details.php');
		}
	}

	PublicLoginForm::Run('PublicLoginForm');
?>