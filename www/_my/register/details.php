<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic(true);

	class PublicLoginForm extends ChmsForm {
		protected $strPageTitle = 'Registration Details';
		
		protected $pnlDetailsMain;
		protected $pnlDetailsAddress;

		public $objHomeAddressValidator;
		public $objMailingAddressValidator;
		public $btnSave;
		public $btnGoBack;
	
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
			$this->pnlDetailsMain = new QPanel($this);
			$this->pnlDetailsMain->Template = dirname(__FILE__) . '/pnlDetailsMain.tpl.php';
			$this->pnlDetailsMain_Setup();
			
			$this->pnlDetailsAddress = new QPanel($this);
			$this->pnlDetailsAddress->Template = dirname(__FILE__) . '/pnlDetailsAddress.tpl.php';
			$this->pnlDetailsAddress_Setup();
			$this->pnlDetailsAddress->Visible = false;
		}
		
		protected function pnlDetailsAddress_Setup() {
			$this->btnSave = new QButton($this->pnlDetailsAddress);
			$this->btnSave->Text = 'Confirm Address';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));

			$this->btnGoBack = new QLinkButton($this->pnlDetailsAddress);
			$this->btnGoBack->Text = 'Go Back and Edit';
			$this->btnGoBack->AddAction(new QClickEvent(), new QAjaxAction('btnGoBack_Click'));
			$this->btnGoBack->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function pnlDetailsMain_Setup() {
			$this->lblUsername = new QLabel($this->pnlDetailsMain);
			$this->lblUsername->Name = 'Username';
			$this->lblUsername->Text = QApplication::$PublicLogin->Username;

			$this->lblName = new QLabel($this->pnlDetailsMain);
			$this->lblName->Name = 'Name';
			$this->lblName->Text = QApplication::$PublicLogin->ProvisionalPublicLogin->FirstName . ' ' . QApplication::$PublicLogin->ProvisionalPublicLogin->LastName;

			$this->lblEmail = new QLabel($this->pnlDetailsMain);
			$this->lblEmail->Name = 'Email Address';
			$this->lblEmail->Text = QApplication::$PublicLogin->ProvisionalPublicLogin->EmailAddress;

			$this->txtPassword = new QTextBox($this->pnlDetailsMain);
			$this->txtPassword->Name = 'Select a Password';
			$this->txtPassword->Required = true;
			$this->txtPassword->TextMode = QTextMode::Password;
			$this->txtPassword->Instructions = 'At least 6 characters long';
			
			$this->txtConfirmPassword = new QTextBox($this->pnlDetailsMain);
			$this->txtConfirmPassword->Name = 'Confirm Password';
			$this->txtConfirmPassword->Instructions = 'Must match above';
			$this->txtConfirmPassword->Required = true;
			$this->txtConfirmPassword->TextMode = QTextMode::Password;

			$this->lstQuestion = new QListBox($this->pnlDetailsMain);
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

			$this->txtQuestion = new QTextBox($this->pnlDetailsMain);
			$this->txtAnswer = new QTextBox($this->pnlDetailsMain);
			$this->txtAnswer->Name = 'Your Answer';
			$this->txtAnswer->Required = true;
			$this->lstQuestion_Refresh();

			$this->txtHomeAddress1 = new QTextBox($this->pnlDetailsMain);
			$this->txtHomeAddress1->Name = 'Home Address 1';
			$this->txtHomeAddress1->Required = true;

			$this->txtHomeAddress2 = new QTextBox($this->pnlDetailsMain);
			$this->txtHomeAddress2->Name = 'Home Address 2';

			$this->txtHomeCity = new QTextBox($this->pnlDetailsMain);
			$this->txtHomeCity->Name = 'Home City, State, Zip';
			$this->txtHomeCity->Required = true;

			$this->lstHomeState = new QListBox($this->pnlDetailsMain);
			$this->lstHomeState->AddItem(QApplication::Translate('- Select One -'), null);
			$this->lstHomeState->Required = true;
			foreach (UsState::LoadAll(QQ::OrderBy(QQN::UsState()->Name)) as $objUsState) {
				$this->lstHomeState->AddItem($objUsState->Name, $objUsState->Abbreviation);
			}

			$this->txtHomeZipCode = new QTextBox($this->pnlDetailsMain);
			$this->txtHomeZipCode->Required = true;
			
			$this->rblMailingAddress = new QRadioButtonList($this->pnlDetailsMain);
			$this->rblMailingAddress->Name = 'Separate Mailing Address?';
			$this->rblMailingAddress->AddItem('Yes, please use my separate mailing address', true);
			$this->rblMailingAddress->AddItem('No, I do not use a separate mailing address', false, true);
			$this->rblMailingAddress->AddAction(new QClickEvent(), new QAjaxAction('rblMailingAddress_Refresh'));

			$this->txtMailingAddress1 = new QTextBox($this->pnlDetailsMain);
			$this->txtMailingAddress1->Name = 'Mailing Address 1';
			$this->txtMailingAddress1->Required = true;

			$this->txtMailingAddress2 = new QTextBox($this->pnlDetailsMain);
			$this->txtMailingAddress2->Name = 'Mailing Address 2';

			$this->txtMailingCity = new QTextBox($this->pnlDetailsMain);
			$this->txtMailingCity->Name = 'Mailing City, State, Zip';
			$this->txtMailingCity->Required = true;

			$this->lstMailingState = new QListBox($this->pnlDetailsMain);
			$this->lstMailingState->AddItem(QApplication::Translate('- Select One -'), null);
			$this->lstMailingState->Required = true;
			foreach (UsState::LoadAll(QQ::OrderBy(QQN::UsState()->Name)) as $objUsState) {
				$this->lstMailingState->AddItem($objUsState->Name, $objUsState->Abbreviation);
			}

			$this->txtMailingZipCode = new QTextBox($this->pnlDetailsMain);
			$this->txtMailingZipCode->Required = true;

			$this->rblMailingAddress_Refresh();

			$this->dtxDateOfBirth = new QDateTimeTextBox($this->pnlDetailsMain);
			$this->dtxDateOfBirth->Name = 'Date of Birth';
			$this->calDateOfBirth = new QCalendar($this->dtxDateOfBirth, $this->dtxDateOfBirth);
			$this->dtxDateOfBirth->RemoveAllActions(QClickEvent::EventName);
			
			$this->txtHomePhone = new PhoneTextBox($this->pnlDetailsMain);
			$this->txtHomePhone->Name = 'Home Phone';

			$this->txtMobilePhone = new PhoneTextBox($this->pnlDetailsMain);
			$this->txtMobilePhone->Name = 'Mobile Phone';

			$this->btnConfirm = new QButton($this->pnlDetailsMain);
			$this->btnConfirm->Text = 'Confirm Registration';
			$this->btnConfirm->CausesValidation = true;
			$this->btnConfirm->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnConfirm));
			$this->btnConfirm->AddAction(new QClickEvent(), new QAjaxAction('btnConfirm_Click'));
			
			$this->btnCancel = new QLinkButton($this->pnlDetailsMain);
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

			// Test Password
			if (strlen(trim($this->txtPassword->Text)) < 6) {
				$blnToReturn = false;
				$this->txtPassword->Warning = 'Your password is too short';
			}
			
			if ($this->txtPassword->Text != $this->txtConfirmPassword->Text) {
				$this->txtConfirmPassword->Warning = 'Does not match above';
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

			$this->btnConfirm->Enabled = true;
			return $blnToReturn;
		}

		protected function btnConfirm_Click($strFormId, $strControlId, $strParameter) {
			$this->pnlDetailsMain->Visible = false;
			$this->pnlDetailsAddress->Visible = true;

			$this->objHomeAddressValidator = new AddressValidator($this->txtHomeAddress1->Text, $this->txtHomeAddress2->Text, $this->txtHomeCity->Text, $this->lstHomeState->SelectedValue, $this->txtHomeZipCode->Text);
			$this->objHomeAddressValidator->ValidateAddress();

			if ($this->rblMailingAddress->SelectedValue) {
				$this->objMailingAddressValidator = new AddressValidator($this->txtMailingAddress1->Text, $this->txtMailingAddress2->Text, $this->txtMailingCity->Text, $this->lstMailingState->SelectedValue, $this->txtMailingZipCode->Text);
				$this->objMailingAddressValidator->ValidateAddress();
				$this->btnSave->Text = 'Confirm Addresses';
			} else {
				$this->objMailingAddressValidator = null;
				$this->btnSave->Text = 'Confirm Address';
			}
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::PublicLogout(false);
			QApplication::Redirect('/register/');
		}

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Create address record(s)
			$objHomeAddress = $this->objHomeAddressValidator->CreateAddressRecord();
			if ($this->objMailingAddressValidator) {
				$objMailingAddress = $this->objMailingAddressValidator->CreateAddressRecord();
			} else {
				$objMailingAddress = null;
			}

			if (trim($this->dtxDateOfBirth->Text)) {
				$dttDateOfBirth = $this->dtxDateOfBirth->DateTime;
			} else {
				$dttDateOfBirth = null;
			}
			
			QApplication::$PublicLogin->ProvisionalPublicLogin->Reconcile(
				trim(strtolower($this->txtPassword->Text)),
				($this->lstQuestion->SelectedValue) ? $this->lstQuestion->SelectedValue : trim($this->txtQuestion->Text),
				trim(strtolower($this->txtAnswer->Text)),
				trim($this->txtHomePhone->Text),
				trim($this->txtMobilePhone->Text),
				$objHomeAddress,
				$objMailingAddress,
				$dttDateOfBirth);
//			QApplication::Redirect('/register/thankyou.php');
		}

		protected function btnGoBack_Click($strFormId, $strControlId, $strParameter) {
			$this->pnlDetailsMain->Visible = true;
			$this->pnlDetailsAddress->Visible = false;
		}
	}

	PublicLoginForm::Run('PublicLoginForm');
?>