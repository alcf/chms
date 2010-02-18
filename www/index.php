<?php
	require(dirname(__FILE__) . '/../includes/prepend.inc.php');

	class LoginForm extends ChmsForm {
		protected $lblMessage;
		protected $txtUsername;
		protected $txtPassword;
		protected $btnLogin;

		protected function Form_Run() {
			if (QApplication::$Login) QApplication::Redirect('/main/');
		}

		protected function Form_Create() {
			$this->lblMessage = new QLabel($this);

			switch (QApplication::PathInfo(0)) {
				case 1:
					$this->lblMessage->Text = 'You have successfully logged out.';
					break;
				case 2:
					$this->lblMessage->Text = 'You have requested a resource that requires a login.  Please log in.';
					break;
				default:
					$this->lblMessage->Text = 'Please Log In';
					break;
			}

			$this->txtUsername = new QTextBox($this);
			$this->txtUsername->Name = 'Email or Username';
			
			$this->txtPassword = new QTextBox($this);
			$this->txtPassword->Name = 'Password';
			$this->txtPassword->TextMode = QTextMode::Password;

			$this->btnLogin = new QButton($this);
			$this->btnLogin->Text = 'Login';

			$this->txtUsername->Focus();
			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtPassword));
			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtPassword->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnLogin_Click'));
			$this->txtPassword->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnLogin->AddAction(new QClickEvent(), new QAjaxAction('btnLogin_Click'));
		}

		protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {
			$objLogin = Login::LoadByEmail(trim(strtolower($this->txtUsername->Text)));
			
			if (!$objLogin)
				$objLogin = Login::LoadByUsername(trim(strtolower($this->txtUsername->Text)));

			if (!$objLogin ||
				!$objLogin->IsPasswordValidAgainstCache($this->txtPassword->Text)) {
				$this->lblMessage->Text = 'Invalid email, username or password.';
				$this->txtUsername->Blink();
				$this->txtPassword->Blink();
				$this->txtUsername->Focus();
				return;
			}

			QApplication::Login($objLogin);
			QApplication::Redirect('/main/');
		}
	}

	LoginForm::Run('LoginForm');
?>