<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	class PublicLoginForm extends ChmsForm {
		protected $txtUsername;

		protected $lblFirstMessage;
		protected $lblQuestion;
		protected $txtAnswer;

		protected $lblFinalMessage;

		protected $btnFirstSubmit;
		protected $btnFinalSubmit;
		protected $btnBack;

		protected $strPageTitle = 'Account Support - Reset My Password';
		protected $objPublicLogin;
		
		protected function Form_Run() {
			if (QApplication::$PublicLogin && QApplication::$PublicLogin->Person) {
				QApplication::Redirect('/main/');
			}
			QApplication::PublicLogout(false);
		}

		protected function Form_Create() {
			$this->txtUsername = new QTextBox($this);
			$this->txtUsername->Name = 'Your Username';
			$this->txtUsername->CausesValidation = $this->txtUsername;
			$this->txtUsername->Required = true;

			$this->btnFirstSubmit = new QButton($this);
			$this->btnFirstSubmit->Text = 'Next';
			$this->btnFirstSubmit->CausesValidation = $this->txtUsername;

			$this->txtUsername->Focus();
			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnFirstSubmit_Click'));
			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnFirstSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnFirstSubmit_Click'));

			// These controls are for after a Username is entered
			$this->lblFirstMessage = new QLabel($this);
			$this->lblFirstMessage->Visible = false;
			$this->lblQuestion = new QLabel($this);
			$this->lblQuestion->Visible = false;
			$this->txtAnswer = new QTextBox($this);
			$this->txtAnswer->Visible = false;
			$this->btnFinalSubmit = new QButton($this);
			$this->btnFinalSubmit->Visible = false;

			// These controls are for after the answer is answered correctly
			$this->lblFinalMessage = new QLabel($this);
			$this->lblFinalMessage->Visible = false;
			$this->btnBack = new QButton($this);
			$this->btnBack->Visible = false;
			$this->btnBack->Text = 'Back to Login Screen';
			$this->btnBack->AddAction(new QClickEvent(), new QAjaxAction('btnBack_Click'));
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

		protected function btnFirstSubmit_Click($strFormId, $strControlId, $strParameter) {
			if ($objPublicLogin = PublicLogin::LoadByUsername(trim(strtolower($this->txtUsername->Text)))) {
			} else {
				$this->txtUsername->Warning = 'Username does not exist';
				$this->txtUsername->Blink();
				$this->txtUsername->Focus();
				return;
			}

			$this->txtUsername->Visible = false;
			$this->btnFirstSubmit->Visible = false;

			$this->lblFirstMessage->Visible = true;
			$this->lblFirstMessage->HtmlEntities = false;
			$this->lblFirstMessage->Text =
				'<p>Before we can proceed, please answer the following security question that you specified when you registered for <strong>my.alcf</strong>.</p>';
			
			$this->lblQuestion->Visible = true;
			$this->lblQuestion->Name = 'Security Question';
			$this->lblQuestion->Text = $objPublicLogin->LostPasswordQuestion;
			if (QString::LastCharacter($objPublicLogin->LostPasswordQuestion) != '?') $this->lblQuestion->Text .= '?';

			$this->txtAnswer->Visible = true;
			$this->txtAnswer->Name = 'Your Answer';
			$this->txtAnswer->Required = true;
			$this->txtAnswer->CausesValidation = $this->txtAnswer;
			$this->txtAnswer->Focus();
			
			$this->btnFinalSubmit->Visible = true;
			$this->btnFinalSubmit->Text = 'Reset My Password';
			$this->btnFinalSubmit->CausesValidation = $this->txtAnswer;

			$this->txtAnswer->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnFinalSubmit_Click'));
			$this->txtAnswer->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnFinalSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnFinalSubmit_Click'));
			
			$this->objPublicLogin = $objPublicLogin;
		}

		protected function btnFinalSubmit_Click() {
			if ($this->objPublicLogin->LostPasswordAnswer != trim(strtolower($this->txtAnswer->Text))) {
				$this->txtAnswer->Warning = 'Your answer is not correct';
				$this->txtAnswer->Blink();
				$this->txtAnswer->Focus();
				return;
			}

			$this->objPublicLogin->ResetPassword();

			$this->lblFirstMessage->Visible = false;
			$this->lblQuestion->Visible = false;
			$this->txtAnswer->Visible = false;
			$this->btnFinalSubmit->Visible = false;
			
			$this->lblFinalMessage->Visible = true;
			$this->lblFinalMessage->HtmlEntities = false;
			$this->lblFinalMessage->Text =
				'<p>We have reset your <strong>my.alcf</strong> account with a temporary password that we have emailed to the email address we have on file for your account.  ' . 
				'Please wait up to a few minnutes for delivery.</p>' .
				'<p>On the off-chance that the email gets caught by SPAM filters, you may also want to check your SPAM or Junk Mail folder.</p>' .
				'<p>If you encounter any issues, please feel free and contact Melissa Look at melissa.look@alcf.net or at 650-625-1500.</p>';

			$this->btnBack->Visible = true;
		}

		protected function btnBack_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/');
		}
	}

	PublicLoginForm::Run('PublicLoginForm');
?>