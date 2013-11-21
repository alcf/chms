<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	class PublicLoginForm extends ChmsForm {
		protected $lblMessage;
		protected $txtUsername;
		protected $txtPassword;
		protected $chkRemember;
		protected $btnLogin;
		protected $strPageTitle = 'Log In';

		protected function Form_Run() {
			if (QApplication::$PublicLogin && QApplication::$PublicLogin->Person) {
				QApplication::Redirect('/main/');
			}
			QApplication::PublicLogout(false);
		}

		protected function Form_Create() {
			$this->lblMessage = new QLabel($this);

			switch (QApplication::PathInfo(0)) {
				case 1:
					$this->lblMessage->Text = 'You have successfully logged out.';
					break;
				case 2:
					$this->lblMessage->Text = 'You have requested a page that requires a login.  Please log in.';
					break;
				default:
					$this->lblMessage->Text = 'Please Log In';
					break;
			}

			$this->txtUsername = new QTextBox($this);
			$this->txtUsername->Name = 'Username';

			$this->txtPassword = new QTextBox($this);
			$this->txtPassword->Name = 'Password';
			$this->txtPassword->TextMode = QTextMode::Password;
			$this->txtPassword->Required = true;
			$this->txtPassword->CausesValidation = true;
			
			$this->chkRemember = new QCheckBox($this);
			$this->chkRemember->Name = 'Remember Login';
			$this->chkRemember->Text = 'Check this box to remember your username for two weeks';

			$this->btnLogin = new QButton($this);
			$this->btnLogin->Text = 'Login';
			$this->btnLogin->CausesValidation = true;

			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtPassword));
			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtPassword->AddAction(new QEnterKeyEvent(), new QServerAction('btnLogin_Click'));
			$this->txtPassword->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnLogin->AddAction(new QClickEvent(), new QServerAction('btnLogin_Click'));

			// Final Setup based on whether or not we are "remembering" the username
			if (array_key_exists('username', $_COOKIE)) {
				$this->txtUsername->Text = $_COOKIE['username'];
				$this->txtPassword->Focus();
				$this->chkRemember->Checked = true;
			} else {
				$this->txtUsername->Focus();
			}
			
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
		
		protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {
			$objLogin = PublicLogin::LoadByUsernamePassword(trim(strtolower($this->txtUsername->Text)), $this->txtPassword->Text);

			if (!$objLogin || !$objLogin->IsAllowedToUseChms()) {
				$this->lblMessage->Text = 'Invalid username or password.';
				$this->txtUsername->Blink();
				$this->txtPassword->Blink();
				$this->txtUsername->Focus();
				return;
			}

			if ($this->chkRemember->Checked) {
				setcookie('username', $objLogin->Username, time() + 60*60*24*14, '/', null);
			} else {
				setcookie('username', null, 1, '/', null);
			}

			QApplication::PublicLogin($objLogin);
			
			if ($objLogin->TemporaryPasswordFlag) {
				QApplication::Redirect('/update_password.php');
			} else {
				if(array_key_exists("r",$_REQUEST) && $_REQUEST['r']=="/give") {
					$_SESSION['redirect'] = "/give";
					QApplication::RedirectOnPublicLogin("/give");
				} else {
					QApplication::RedirectOnPublicLogin();
				}
			}
		}
	}

	PublicLoginForm::Run('PublicLoginForm');
?>