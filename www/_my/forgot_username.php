<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	class PublicLoginForm extends ChmsForm {
		protected $txtEmail;
		protected $lblMessage;
		protected $btnSubmit;
		protected $btnBack;
		protected $strPageTitle = 'Account Support - Retreive My Username';

		protected function Form_Run() {
			if (QApplication::$PublicLogin && QApplication::$PublicLogin->Person) {
				QApplication::Redirect('/main/');
			}
			QApplication::PublicLogout(false);
		}

		protected function Form_Create() {
			$this->txtEmail = new QEmailTextBox($this);
			$this->txtEmail->Name = 'Email';
			$this->txtEmail->CausesValidation = true;
			$this->txtEmail->Required = true;

			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = 'Retrieve My Username';
			$this->btnSubmit->CausesValidation = true;

			$this->txtEmail->Focus();
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnSubmit_Click'));
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));

			// These controls are for after an email is entered
			$this->lblMessage = new QLabel($this);
			$this->lblMessage->Visible = false;
			$this->lblMessage->HtmlEntities = false;

			$this->btnBack = new QButton($this);
			$this->btnBack->Text = 'Back to Login Screen';
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
			$this->txtEmail->Visible = false;
			$this->btnSubmit->Visible = false;
			$this->lblMessage->Visible = true;
			$this->btnBack->Visible = true;

			$strEmail = trim(strtolower($this->txtEmail->Text));
			PublicLogin::RetrieveUsernameForEmail($strEmail);

			$this->lblMessage->Text =
				'<p>We are looking to see if <strong>' . QApplication::HtmlEntities($strEmail) . '</strong> exists in the system, and if so ' .
				'we will send you an email that contains your username.  This should only take a moment, but please wait up to a few minnutes for delivery.</p>' .
				'<p>On the off-chance that the email gets caught by SPAM filters, you may also want to check your SPAM or Junk Mail folder.</p>' .
				'<p>If you encounter any issues, please feel free and contact Melissa Look at melissa.look@alcf.net or at 650-625-1500.</p>';
		}

		protected function btnBack_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/');
		}
	}

	PublicLoginForm::Run('PublicLoginForm');
?>