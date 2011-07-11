<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic(true);

	class PublicLoginForm extends ChmsForm {
		protected $strPageTitle = 'Registration Details';
		protected $lblUsername;
		protected $lblName;
		protected $lblEmail;

		protected $txtPassword;
		protected $txtConfirmPassword;
		protected $lstQuestion;
		protected $txtQuestion;
		protected $txtAnswer;

		protected $txtHomeAddress1;
		protected $txtHomeAddress2;
		protected $txtHomeCity;
		protected $lstHomeState;
		protected $txtHomeZipCode;
		
		protected $rblMailingAddress;

		protected $txtMailingAddress1;
		protected $txtMailingAddress2;
		protected $txtMailingCity;
		protected $lstMailingState;
		protected $txtMailingZipCode;

		protected $txtHomePhone;
		protected $txtMobilePhone;

		protected $dtxDateOfBirth;
		protected $calDateOfBirth;

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

			$this->txtPassword = new QTextBox($this);
			$this->txtPassword->Name = 'Select a Password';
			$this->txtPassword->Required = true;
			$this->txtPassword->TextMode = QTextMode::Password;
			
			$this->txtConfirmPassword = new QTextBox($this);
			$this->txtConfirmPassword->Name = 'Confirm Password';
			$this->txtConfirmPassword->Required = true;
			$this->txtConfirmPassword->TextMode = QTextMode::Password;

			$this->lstQuestion = new QListBox($this);
			$this->lstQuestion->Name = '"Forgot Password" Question';
			$this->lstQuestion->AddItem('- Select One -', null);
			$this->lstQuestion->AddItem('What city were you born in?');
			$this->lstQuestion->AddItem('What is the name of your elementary school?');
			$this->lstQuestion->AddItem('What street did you grow up on?');
			$this->lstQuestion->AddItem('What is the name of your pet?');
			$this->lstQuestion->AddItem('What was the make and model of your first car?');
			$this->lstQuestion->AddItem('- Other... -', false);
			$this->lstQuestion->Required = true;
			$this->lstQuestion->AddAction(new QChangeEvent(), new QAjaxAction('lstQuestion_Refresh'));

			$this->txtQuestion = new QTextBox($this);
			$this->txtAnswer = new QTextBox($this);
			$this->txtAnswer->Name = 'Your Answer';
			$this->txtAnswer->Required = true;
			$this->lstQuestion_Refresh();

			$this->txtHomeAddress1 = new QTextBox($this);
			$this->txtHomeAddress1->Name = 'Home Address 1';
			$this->txtHomeAddress1->Required = true;

			$this->txtHomeAddress2 = new QTextBox($this);
			$this->txtHomeAddress2->Name = 'Home Address 2';

			$this->txtHomeCity = new QTextBox($this);
			$this->txtHomeCity->Name = 'Home City, State, Zip';
			$this->txtHomeCity->Required = true;

			$this->lstHomeState = new QListBox($this);
			$this->lstHomeState->AddItem(QApplication::Translate('- Select One -'), null);
			$this->lstHomeState->Required = true;
			foreach (UsState::LoadAll(QQ::OrderBy(QQN::UsState()->Name)) as $objUsState) {
				$this->lstHomeState->AddItem($objUsState->Name, $objUsState->Abbreviation);
			}

			$this->txtHomeZipCode = new QTextBox($this);
			$this->txtHomeZipCode->Required = true;
			
			$this->rblMailingAddress = new QRadioButtonList($this);
			$this->rblMailingAddress->Name = 'Separate Mailing Address?';
			$this->rblMailingAddress->AddItem('Yes, we have a separate mailing address', true);
			$this->rblMailingAddress->AddItem('No, we do not have a separate mailing address', false, true);
			$this->rblMailingAddress->AddAction(new QClickEvent(), new QAjaxAction('rblMailingAddress_Refresh'));

			$this->txtMailingAddress1 = new QTextBox($this);
			$this->txtMailingAddress1->Name = 'Mailing Address 1';
			$this->txtMailingAddress1->Required = true;

			$this->txtMailingAddress2 = new QTextBox($this);
			$this->txtMailingAddress2->Name = 'Mailing Address 2';

			$this->txtMailingCity = new QTextBox($this);
			$this->txtMailingCity->Name = 'Mailing City, State, Zip';
			$this->txtMailingCity->Required = true;

			$this->lstMailingState = new QListBox($this);
			$this->lstMailingState->AddItem(QApplication::Translate('- Select One -'), null);
			$this->lstMailingState->Required = true;
			foreach (UsState::LoadAll(QQ::OrderBy(QQN::UsState()->Name)) as $objUsState) {
				$this->lstMailingState->AddItem($objUsState->Name, $objUsState->Abbreviation);
			}

			$this->txtMailingZipCode = new QTextBox($this);
			$this->txtMailingZipCode->Required = true;

			$this->rblMailingAddress_Refresh();

			$this->dtxDateOfBirth = new QDateTimeTextBox($this);
			$this->dtxDateOfBirth->Name = 'Date of Birth';
			$this->calDateOfBirth = new QCalendar($this, $this->dtxDateOfBirth);
			$this->dtxDateOfBirth->RemoveAllActions(QClickEvent::EventName);
			
			$this->txtHomePhone = new PhoneTextBox($this);
			$this->txtHomePhone->Name = 'Home Phone';

			$this->txtMobilePhone = new PhoneTextBox($this);
			$this->txtMobilePhone->Name = 'Mobile Phone';

			$this->btnConfirm = new QButton($this);
			$this->btnConfirm->Text = 'Confirm Registration';
			$this->btnConfirm->CausesValidation = true;
			$this->btnConfirm->AddAction(new QClickEvent(), new QAjaxAction('btnConfirm_Click'));

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function lstQuestion_Refresh() {
			if ($this->lstQuestion->SelectedValue === false) {
				$this->txtQuestion->Visible = true;
				$this->txtQuestion->Required = true;
			} else {
				$this->txtQuestion->Visible = false;
				$this->txtQuestion->Required = false;
				$this->txtQuestion->Text = null;
			}
		}

		public function rblMailingAddress_Refresh() {
			if ($this->rblMailingAddress->SelectedValue) {
				$this->txtMailingAddress1->Visible = true;
				$this->txtMailingAddress2->Visible = true;
				$this->txtMailingCity->Visible = true;
				$this->lstMailingState->Visible = true;
				$this->txtMailingZipCode->Visible = true;
				$this->txtMailingAddress1->Required = true;
				$this->txtMailingCity->Required = true;
				$this->lstMailingState->Required = true;
				$this->txtMailingZipCode->Required = true;
			} else {
				$this->txtMailingAddress1->Visible = false;
				$this->txtMailingAddress2->Visible = false;
				$this->txtMailingCity->Visible = false;
				$this->lstMailingState->Visible = false;
				$this->txtMailingZipCode->Visible = false;
				$this->txtMailingAddress1->Required = false;
				$this->txtMailingCity->Required = false;
				$this->lstMailingState->Required = false;
				$this->txtMailingZipCode->Required = false;
				$this->txtMailingAddress1->Text = '';
				$this->txtMailingAddress2->Text = '';
				$this->txtMailingCity->Text = '';
				$this->lstMailingState->SelectedValue = null;
				$this->txtMailingZipCode->Text = '';
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

		protected function btnConfirm_Click($strFormId, $strControlId, $strParameter) {
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::PublicLogout(false);
			QApplication::Redirect('/register/');
		}
	}

	PublicLoginForm::Run('PublicLoginForm');
?>