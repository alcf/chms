<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	class PublicLoginForm extends ChmsForm {
		protected $txtPassword;
		protected $txtConfirmPassword;
		protected $lblMessage;
		protected $btnSubmit;
		protected $btnBack;
		protected $strPageTitle = 'Account Support - Update Your Password';

		protected function Form_Create() {
			$this->txtPassword = new QTextBox($this);
			$this->txtPassword->Name = 'New Password';
			$this->txtPassword->Required = true;
			$this->txtPassword->TextMode = QTextMode::Password;
			$this->txtPassword->Instructions = 'At least 6 characters long';
			
			$this->txtConfirmPassword = new QTextBox($this);
			$this->txtConfirmPassword->Name = 'Confirm Password';
			$this->txtConfirmPassword->Instructions = 'Must match above';
			$this->txtConfirmPassword->Required = true;
			$this->txtConfirmPassword->TextMode = QTextMode::Password;
			$this->txtConfirmPassword->CausesValidation = true;

			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = 'Update My Password';
			$this->btnSubmit->CausesValidation = true;

			$this->txtPassword->Focus();
			$this->txtPassword->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtConfirmPassword));
			$this->txtPassword->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtConfirmPassword->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSubmit_Click'));
			$this->txtConfirmPassword->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));

			// These controls are for after an email is entered
			$this->lblMessage = new QLabel($this);
			$this->lblMessage->Visible = false;
			$this->lblMessage->HtmlEntities = false;

			$this->btnBack = new QButton($this);
			$this->btnBack->Text = 'Okay';
			$this->btnBack->AddAction(new QClickEvent(), new QAjaxAction('btnBack_Click'));
			$this->btnBack->Visible = false;
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

		protected function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
			if (strlen(trim($this->txtPassword->Text)) < 6) {
				$this->txtPassword->Warning = 'Must be at least 6 characters';
				$this->txtPassword->Blink();
				$this->txtPassword->Focus();
				return;
			}

			if ($this->txtPassword->Text != $this->txtConfirmPassword->Text) {
				$this->txtConfirmPassword->Warning = 'Does not match above';
				$this->txtConfirmPassword->Blink();
				$this->txtConfirmPassword->Focus();
				return;
			}

			QApplication::$PublicLogin->SetPassword($this->txtPassword->Text);
			QApplication::$PublicLogin->TemporaryPasswordFlag = false;
			QApplication::$PublicLogin->Save();

			$this->txtPassword->Visible = false;
			$this->txtConfirmPassword->Visible = false;
			$this->btnSubmit->Visible = false;
			$this->lblMessage->Visible = true;
			$this->btnBack->Visible = true;
			$this->lblMessage->Text = '<p>Thank you for updating your password.  Your changes have been saved.</p>';
		}

		protected function btnBack_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/main/');
		}
	}

	PublicLoginForm::Run('PublicLoginForm');
?>