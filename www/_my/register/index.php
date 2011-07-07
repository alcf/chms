<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class PublicRegistrationForm extends ChmsForm {
		protected $strPageTitle = 'Register';

		protected $lblMessage;
		protected $txtUsername;
		protected $txtFirstName;
		protected $txtLastName;
		protected $txtEmail;
		protected $btnRegister;

		protected function Form_Run() {
			if (QApplication::$PublicLogin) QApplication::Redirect('/main/');
		}

		protected function Form_Create() {
			$this->lblMessage = new QLabel($this);

			$this->txtUsername = new QTextBox($this);
			$this->txtUsername->Name = 'Username';
			$this->txtUsername->Required = true;
			$this->txtUsername->MaxLength = PublicLogin::UsernameMaxLength;
			
			$this->txtEmail = new QEmailTextBox($this);
			$this->txtEmail->Name = 'Your Email Address';
			$this->txtEmail->Required = true;
			$this->txtEmail->MaxLength = Email::AddressMaxLength;

			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'First Name';
			$this->txtFirstName->Required = true;
			$this->txtFirstName->MaxLength = Person::FirstNameMaxLength;
			
			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Last Name';
			$this->txtLastName->Required = true;
			$this->txtLastName->MaxLength = Person::LastNameMaxLength;
			$this->txtLastName->CausesValidation = true;

			$this->btnRegister = new QButton($this);
			$this->btnRegister->Text = 'Register';
			$this->btnRegister->CausesValidation = true;

			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtEmail));
			$this->txtUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtFirstName));
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QFocusControlAction($this->txtLastName));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxAction('btnRegister_Click'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->btnRegister->AddAction(new QClickEvent(), new QAjaxAction('btnRegister_Click'));

			$this->txtUsername->Focus();
		}

		protected function Form_Validate() {
			$blnToReturn = true;

			$strUsernameCandidate = QApplication::Tokenize($this->txtUsername->Text, false);
			if ($strUsernameCandidate != trim(strtolower($this->txtUsername->Text))) {
				$this->txtUsername->Warning = 'Must only contain letters and numbers';
				$blnToReturn = false;
			}

			if (strlen($strUsernameCandidate) < 4) {
				$this->txtUsername->Warning = 'Must have be at least 4 characters';
				$blnToReturn = false;
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

		protected function btnRegister_Click($strFormId, $strControlId, $strParameter) {
			$strUsernameCandidate = QApplication::Tokenize($this->txtUsername->Text, false);
			if (!PublicLogin::IsProvisionalCreatableForUsername($strUsernameCandidate)) {
				QApplication::DisplayAlert('Username already taken!');
				return;
			}

			$objProvisionalPublicLogin = PublicLogin::CreateProvisional($strUsernameCandidate, $this->txtEmail->Text, $this->txtFirstName->Text, $this->txtLastName->Text);
			QApplication::Redirect($objProvisionalPublicLogin->AwaitingConfirmationUrl);
		}
	}

	PublicRegistrationForm::Run('PublicRegistrationForm');
?>