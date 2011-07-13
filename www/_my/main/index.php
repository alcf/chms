<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	class PublicMainForm extends ChmsForm {
		protected $strPageTitle = 'Account Profile';

		protected $lblHomeAddress;
		protected $lblMailingAddress;

		protected $lblEmailAddress;
		protected $lblBulkEmail;
		protected $lblMobilePhone;
		protected $lblDateOfBirth;
		protected $lblGender;

		protected $lblUsername;
		protected $lblQuestion;
		protected $lblAnswer;
		protected $lblPassword;

		// Dialog Box Stuff

		protected $btnAddress;
		protected $btnContact;
		protected $btnPersonal;
		protected $btnSecurity;

		protected $dlgAddress;
		protected $dlgContact;
		protected $dlgPersonal;
		protected $dlgSecurity;

		protected $btnAddressUpdate;
		protected $btnAddressCancel;
		protected $btnContactUpdate;
		protected $btnContactCancel;
		protected $btnPersonalUpdate;
		protected $btnPersonalCancel;
		protected $btnSecurityUpdate;
		protected $btnSecurityCancel;

		// Address Information
		protected $txtHomeAddress1;
		protected $txtHomeAddress2;
		protected $txtHomeCity;
		protected $lstHomeState;
		protected $txtHomeZipCode;
		protected $txtHomePhone;

		protected $rblMailingAddress;

		protected $txtMailingAddress1;
		protected $txtMailingAddress2;
		protected $txtMailingCity;
		protected $lstMailingState;
		protected $txtMailingZipCode;

		protected $objHomeAddressValidator;
		protected $objMailingAddressValidator;
		
		// Contact Information
		protected $txtEmail;
		protected $chkBulkEmail;
		protected $txtMobilePhone;

		// Personal Information
		protected $mctPerson;
		protected $calDateOfBirth;
		protected $dtxDateOfBirth;
		protected $lstGender;

		// Security / Login Information
		protected $txtUsername;
		protected $txtOldPassword;
		protected $txtNewPassword;
		protected $txtConfirmPassword;
		protected $txtQuestion;
		protected $txtAnswer;

		protected function Form_Create() {
			$this->lblHomeAddress = new QLabel($this);
			$this->lblHomeAddress->HtmlEntities = false;

			$this->lblMailingAddress = new QLabel($this);
			$this->lblMailingAddress->Name = 'Mailing Address';
			$this->lblMailingAddress->HtmlEntities = false;
			
			$this->lblEmailAddress = new QLabel($this);
			$this->lblEmailAddress->Name = 'Email Address';
			$this->lblBulkEmail = new QLabel($this);
			$this->lblBulkEmail->Name = 'ALCF Email Announcements';
			$this->lblMobilePhone = new QLabel($this);
			$this->lblMobilePhone->Name = 'Mobile Phone';
			
			$this->lblDateOfBirth = new QLabel($this);
			$this->lblDateOfBirth->Name = 'Date of Birth';
			$this->lblGender = new QLabel($this);
			$this->lblGender->Name = 'Gender';
	
			$this->lblUsername = new QLabel($this);
			$this->lblUsername->Name = 'my.alcf Login Username';
			$this->lblQuestion = new QLabel($this);
			$this->lblQuestion->Name = 'Security Question';

			$this->lblAnswer = new QLabel($this);
			$this->lblAnswer->Name = 'Your Answer';
			$this->lblAnswer->Text = '&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;';
			$this->lblAnswer->HtmlEntities = false;

			$this->lblPassword = new QLabel($this);
			$this->lblPassword->Name = 'Password';
			$this->lblPassword->Text = '&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;';
			$this->lblPassword->HtmlEntities = false;

			$this->btnAddress = new QButton($this);
			$this->btnAddress->CssClass = 'primary';
			$this->btnAddress->Text = 'Edit Address Information';
			$this->btnAddress->AddAction(new QClickEvent(), new QAjaxAction('btnAddress_Click'));

			$this->btnContact = new QButton($this);
			$this->btnContact->CssClass = 'primary';
			$this->btnContact->Text = 'Edit Contact Information';
			$this->btnContact->AddAction(new QClickEvent(), new QAjaxAction('btnContact_Click'));

			$this->btnPersonal = new QButton($this);
			$this->btnPersonal->CssClass = 'primary';
			$this->btnPersonal->Text = 'Edit Personal Information';
			$this->btnPersonal->AddAction(new QClickEvent(), new QAjaxAction('btnPersonal_Click'));

			$this->btnSecurity = new QButton($this);
			$this->btnSecurity->CssClass = 'primary';
			$this->btnSecurity->Text = 'Edit Login Information';
			$this->btnSecurity->AddAction(new QClickEvent(), new QAjaxAction('btnSecurity_Click'));

			$this->dlgEdit_Setup('Address');
			$this->dlgEdit_Setup('Contact');
			$this->dlgEdit_Setup('Personal');
			$this->dlgEdit_Setup('Security');

			$this->mctPerson = new PersonMetaControl($this->dlgPersonal, QApplication::$PublicLogin->Person);
			$this->dtxDateOfBirth = $this->mctPerson->dtxDateOfBirth_Create();
			$this->calDateOfBirth = $this->mctPerson->calDateOfBirth_Create();
			$this->lstGender = $this->mctPerson->lstGender_Create();
			$this->lstGender->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->dtxDateOfBirth->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->Refresh();
		}

		protected function dlgEdit_Setup($strType) {
			$strDialog = 'dlg' . $strType;
			$strUpdate = 'btn' . $strType . 'Update';
			$strCancel = 'btn' . $strType . 'Cancel';

			$this->$strDialog = new QDialogBox($this);
			$this->$strDialog->MatteClickable = false;
			$this->$strDialog->HideDialogBox();

			$this->$strUpdate = new QButton($this->$strDialog);
			$this->$strUpdate->CssClass = 'primary';
			$this->$strUpdate->Text = 'Update';
			$this->$strUpdate->CausesValidation = QCausesValidation::SiblingsAndChildren;

			$this->$strCancel = new QLinkButton($this->$strDialog);
			$this->$strCancel->CssClass = 'cancel';
			$this->$strCancel->Text = 'Cancel';

			$this->$strUpdate->AddAction(new QClickEvent(), new QToggleEnableAction($this->$strUpdate));
			$this->$strUpdate->AddAction(new QClickEvent(), new QToggleEnableAction($this->$strCancel));
			$this->$strUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnUpdate_' . $strType . '_Click'));

			$this->$strCancel->AddAction(new QClickEvent(), new QToggleEnableAction($this->$strUpdate));
			$this->$strCancel->AddAction(new QClickEvent(), new QToggleEnableAction($this->$strCancel));
			$this->$strCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_' . $strType . '_Click'));
			$this->$strCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function Form_Validate() {
			$blnToReturn = true;

			$blnFirst = true;
			foreach ($this->GetErrorControls() as $objErrorControl) {
				$objErrorControl->Blink();
				if ($blnFirst) {
					$blnFirst = false;
					$objErrorControl->Focus();
				}
			}

			return $blnToReturn;
		}
		
		protected function Form_PreRender() {
			$this->btnAddressUpdate->Enabled = true;
			$this->btnAddressCancel->Enabled = false;

			$this->btnContactUpdate->Enabled = true;
			$this->btnContactCancel->Enabled = true;

			$this->btnPersonalUpdate->Enabled = true;
			$this->btnPersonalCancel->Enabled = true;

			$this->btnSecurityUpdate->Enabled = true;
			$this->btnSecurityCancel->Enabled = true;
		}

		protected function Refresh() {
			$objHouseholdArray = array();
			foreach (QApplication::$PublicLogin->Person->GetHouseholdParticipationArray() as $objHouseholdParticipation)
				$objHouseholdArray[] = $objHouseholdParticipation->Household;

			// Editing of Address Info
			$this->btnAddress->Visible = (count($objHouseholdArray) < 2);

			// Address Info
			if (count($objHouseholdArray) > 1) {
				$this->lblHomeAddress->Name = 'Home Addresses';
				$this->lblHomeAddress->Visible = true;
				$strAddressHtmlArray = array();
				foreach ($objHouseholdArray as $objHousehold) {
					if ($objAddress = $objHousehold->GetCurrentAddress()) $strAddressHtmlArray[] = $objAddress->DisplayHtml; 
				}
				$this->lblHomeAddress->Text = implode('<br/><br/>', $strAddressHtmlArray);
			} else if (count($objHouseholdArray) == 1) {
				$this->lblHomeAddress->Name = 'Home Address';
				$this->lblHomeAddress->Visible = true;
				$this->lblHomeAddress->Text = $objHouseholdArray[0]->GetCurrentAddress()->DisplayHtml;
			} else {
				$this->lblHomeAddress->Visible = false;
			}

			// Mailing Address
			if (QApplication::$PublicLogin->Person->MailingAddress &&
				!QApplication::$PublicLogin->Person->MailingAddress->Household) {
				$this->lblMailingAddress->Visible = true;
				$this->lblMailingAddress->Text = QApplication::$PublicLogin->Person->MailingAddress->DisplayHtml;
			} else {
				$this->lblMailingAddress->Visible = true;
				$this->lblMailingAddress->Text = '<span class="gray">Same as Above</span>';
			}

			// Email
			if (QApplication::$PublicLogin->Person->PrimaryEmail) {
				$this->lblEmailAddress->Text = QApplication::$PublicLogin->Person->PrimaryEmail->Address;
				$this->lblEmailAddress->CssClass = null;
				$this->lblBulkEmail->Visible = true;
				$this->lblBulkEmail->Text = QApplication::$PublicLogin->Person->CanEmailFlag ? 'Feel free to email me any general ALCF or church-wide announcements' :
					'Please do NOT email me any general ALCF or church-wide announcements';
			} else {
				$this->lblEmailAddress->CssClass = 'gray';
				$this->lblEmailAddress->Text = 'Not Specified';
				$this->lblBulkEmail->Visible = false;
			}
			
			// Phone
			if ($objPhone = QApplication::$PublicLogin->Person->DeduceMobilePhone()) {
				$this->lblMobilePhone->Text = $objPhone->Number;
				$this->lblMobilePhone->CssClass = null;
			} else {
				$this->lblMobilePhone->CssClass = 'gray';
				$this->lblMobilePhone->Text = 'Not Specified';
			}

			// DOB
			if (QApplication::$PublicLogin->Person->DateOfBirth && !QApplication::$PublicLogin->Person->DobGuessedFlag && !QApplication::$PublicLogin->Person->DobYearApproximateFlag) {
				$this->lblDateOfBirth->Text = QApplication::$PublicLogin->Person->DateOfBirth->ToString('MMMM D, YYYY');
				$this->lblDateOfBirth->CssClass = null;
			} else {
				$this->lblDateOfBirth->CssClass = 'gray';
				$this->lblDateOfBirth->Text = 'Not Specified';
			}

			// Gender
			if (QApplication::$PublicLogin->Person->Gender) {
				$this->lblGender->Text = QApplication::$PublicLogin->Person->GenderLabel;
				$this->lblGender->CssClass = null;
			} else {
				$this->lblGender->CssClass = 'gray';
				$this->lblGender->Text = 'Not Specified';
			}

			$this->lblUsername->Text = QApplication::$PublicLogin->Username;
			$this->lblQuestion->Text = QApplication::$PublicLogin->LostPasswordQuestion;
		}

		protected function btnAddress_Click($strFormId, $strControlId, $strParameter) {
			if (!$this->txtHomeAddress1) {
				$this->txtHomeAddress1 = new QTextBox($this->dlgAddress);
				$this->txtHomeAddress1->Name = 'Home Address 1';
				$this->txtHomeAddress1->Required = true;
	
				$this->txtHomeAddress2 = new QTextBox($this->dlgAddress);
				$this->txtHomeAddress2->Name = 'Home Address 2';
	
				$this->txtHomeCity = new QTextBox($this->dlgAddress);
				$this->txtHomeCity->Name = 'Home City, State, Zip';
				$this->txtHomeCity->Required = true;
	
				$this->lstHomeState = new QListBox($this->dlgAddress);
				$this->lstHomeState->AddItem(QApplication::Translate('- Select One -'), null);
				$this->lstHomeState->Required = true;
				foreach (UsState::LoadAll(QQ::OrderBy(QQN::UsState()->Name)) as $objUsState) {
					$this->lstHomeState->AddItem($objUsState->Name, $objUsState->Abbreviation);
				}
	
				$this->txtHomeZipCode = new QTextBox($this->dlgAddress);
				$this->txtHomeZipCode->Required = true;

				$this->txtHomePhone = new PhoneTextBox($this->dlgAddress);
				$this->txtHomePhone->Name = 'Home Phone';

				$this->rblMailingAddress = new QRadioButtonList($this->dlgAddress);
				$this->rblMailingAddress->Name = 'Separate Mailing Address?';
				$this->rblMailingAddress->AddItem('Yes, please use my separate mailing address', true);
				$this->rblMailingAddress->AddItem('No, I do not use a separate mailing address', false);
				$this->rblMailingAddress->AddAction(new QClickEvent(), new QAjaxAction('rblMailingAddress_Refresh'));

				$this->txtMailingAddress1 = new QTextBox($this->dlgAddress);
				$this->txtMailingAddress1->Name = 'Mailing Address 1';
				$this->txtMailingAddress1->Required = true;
	
				$this->txtMailingAddress2 = new QTextBox($this->dlgAddress);
				$this->txtMailingAddress2->Name = 'Mailing Address 2';
	
				$this->txtMailingCity = new QTextBox($this->dlgAddress);
				$this->txtMailingCity->Name = 'Mailing City, State, Zip';
				$this->txtMailingCity->Required = true;
	
				$this->lstMailingState = new QListBox($this->dlgAddress);
				$this->lstMailingState->AddItem(QApplication::Translate('- Select One -'), null);
				$this->lstMailingState->Required = true;
				foreach (UsState::LoadAll(QQ::OrderBy(QQN::UsState()->Name)) as $objUsState) {
					$this->lstMailingState->AddItem($objUsState->Name, $objUsState->Abbreviation);
				}
	
				$this->txtMailingZipCode = new QTextBox($this->dlgAddress);
				$this->txtMailingZipCode->Required = true;
			}

			$objHouseholdArray = array();
			foreach (QApplication::$PublicLogin->Person->GetHouseholdParticipationArray() as $objParticipation) {
				$objHouseholdArray[] = $objParticipation->Household;
			}

			if (count($objHouseholdArray) > 1) return;
			if (count($objHouseholdArray) == 1) {
				$objAddress = $objHouseholdArray[0]->GetCurrentAddress();
				if (!$objAddress) $objAddress = new Address();
				$this->txtHomeAddress1->Text = $objAddress->Address1;
				$this->txtHomeAddress2->Text = $objAddress->Address2;
				$this->txtHomeCity->Text = $objAddress->City;
				$this->lstHomeState->SelectedValue = $objAddress->State;
				$this->txtHomeZipCode->Text = $objAddress->ZipCode;
				
				if (count($objPhoneArray = $objAddress->GetPhoneArray()))
					$this->txtHomePhone->Text = $objPhoneArray[0]->Number;
			}

			if (QApplication::$PublicLogin->Person->MailingAddress && !QApplication::$PublicLogin->Person->MailingAddress->Household) {
				$this->rblMailingAddress->SelectedValue = true;
				$objAddress = QApplication::$PublicLogin->Person->MailingAddress;
				$this->txtMailingAddress1->Text = $objAddress->Address1;
				$this->txtMailingAddress2->Text = $objAddress->Address2;
				$this->txtMailingCity->Text = $objAddress->City;
				$this->lstMailingState->SelectedValue = $objAddress->State;
				$this->txtMailingZipCode->Text = $objAddress->ZipCode;
			} else {
				$this->rblMailingAddress->SelectedValue = false;
			}

			$this->btnAddressUpdate->ActionParameter = 1;
			$this->btnAddressCancel->ActionParameter = 1;
			
			$this->dlgAddress->ShowDialogBox();
			$this->dlgAddress->Template = dirname(__FILE__) . '/dlgAddress.inc.php';
			$this->rblMailingAddress_Refresh();
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

		protected function btnContact_Click($strFormId, $strControlId, $strParameter) {
			$this->dlgContact->ShowDialogBox();
			$this->dlgContact->Template = dirname(__FILE__) . '/dlgContact.inc.php';

			if (!$this->txtEmail) {
				$this->txtEmail = new QEmailTextBox($this->dlgContact);
				$this->txtEmail->Name = 'Email Address';
				$this->txtEmail->Required = true;

				$this->chkBulkEmail = new QCheckBox($this->dlgContact);
				$this->chkBulkEmail->Name = 'ALCF Email Announcements';
				$this->chkBulkEmail->Text = 'Check to be included on any general<br/>ALCF or church-wide email announcements';
				$this->chkBulkEmail->HtmlEntities = false;

				$this->txtMobilePhone = new PhoneTextBox($this->dlgContact);
				$this->txtMobilePhone->Name = 'Mobile Phone';
			}
			
			$this->txtEmail->Text = QApplication::$PublicLogin->Person->PrimaryEmail->Address;
			$this->chkBulkEmail->Checked = QApplication::$PublicLogin->Person->CanEmailFlag;
			if ($objPhone = QApplication::$PublicLogin->Person->DeduceMobilePhone())
				$this->txtMobilePhone->Text = $objPhone->Number;
			else
				$this->txtMobilePhone->Text = null;
		}
		
		protected function btnPersonal_Click($strFormId, $strControlId, $strParameter) {
			$this->dlgPersonal->ShowDialogBox();
			$this->dlgPersonal->Template = dirname(__FILE__) . '/dlgPersonal.inc.php';
		}

		protected function btnSecurity_Click($strFormId, $strControlId, $strParameter) {
			$this->dlgSecurity->ShowDialogBox();
			$this->dlgSecurity->Template = dirname(__FILE__) . '/dlgSecurity.inc.php';

			if (!$this->txtUsername) {
				$this->txtUsername = new QTextBox($this->dlgSecurity);
				$this->txtUsername->Name = 'Username';
				$this->txtUsername->MaxLength = PublicLogin::UsernameMaxLength;
				$this->txtUsername->Required = true;
				$this->txtUsername->Text = QApplication::$PublicLogin->Username;

				$this->txtOldPassword = new QTextBox($this->dlgSecurity);
				$this->txtOldPassword->Name = 'Current Password';
				$this->txtOldPassword->TextMode = QTextMode::Password;

				$this->txtNewPassword = new QTextBox($this->dlgSecurity);
				$this->txtNewPassword->Name = 'New Password';
				$this->txtNewPassword->TextMode = QTextMode::Password;

				$this->txtConfirmPassword = new QTextBox($this->dlgSecurity);
				$this->txtConfirmPassword->Name = 'Confirm Password';
				$this->txtConfirmPassword->TextMode = QTextMode::Password;

				$this->txtQuestion = new QTextBox($this->dlgSecurity);
				$this->txtQuestion->Name = '"Lost Password" Question';
				$this->txtQuestion->Required = true;
				$this->txtQuestion->Text = QApplication::$PublicLogin->LostPasswordQuestion;
				
				$this->txtAnswer = new QTextBox($this->dlgSecurity);
				$this->txtAnswer->Name = 'Your Answer';
				$this->txtAnswer->Required = true;
				$this->txtAnswer->Text = QApplication::$PublicLogin->LostPasswordAnswer;
			}

			$this->txtUsername->Text = QApplication::$PublicLogin->Username;
			$this->txtQuestion->Text = QApplication::$PublicLogin->LostPasswordQuestion;
			$this->txtAnswer->Text = QApplication::$PublicLogin->LostPasswordAnswer;
			$this->txtOldPassword->Text = null;
			$this->txtNewPassword->Text = null;
			$this->txtConfirmPassword->Text = null;
		}

		protected function btnUpdate_Address_Click($strFormId, $strControlId, $strParameter) {
			switch ($strParameter) {
				case 1:
					$this->objHomeAddressValidator = new AddressValidator($this->txtHomeAddress1->Text, $this->txtHomeAddress2->Text, $this->txtHomeCity->Text, $this->lstHomeState->SelectedValue, $this->txtHomeZipCode->Text);
					$this->objHomeAddressValidator->ValidateAddress();

					if ($this->rblMailingAddress->SelectedValue) {
						$this->objMailingAddressValidator = new AddressValidator($this->txtMailingAddress1->Text, $this->txtMailingAddress2->Text, $this->txtMailingCity->Text, $this->lstMailingState->SelectedValue, $this->txtMailingZipCode->Text);
						$this->objMailingAddressValidator->ValidateAddress();
						$this->btnAddressUpdate->Text = 'Confirm Addresses';
					} else {
						$this->objMailingAddressValidator = null;
						$this->btnAddressUpdate->Text = 'Confirm Address';
					}
					$this->btnAddressUpdate->ActionParameter = 2;
					$this->btnAddressCancel->ActionParameter = 2;
					$this->btnAddressCancel->Text = 'Go Back and Edit';
					$this->dlgAddress->Template = 'dlgAddress_Confirm.inc.php';
					break;

				case 2:
					QApplication::$PublicLogin->Person->UpdateAddressInformation($this->objHomeAddressValidator, $this->objMailingAddressValidator, trim($this->txtHomePhone->Text));
					$this->Refresh();
					$this->btnCancel_Address_Click(null, null, 1);
					break;
			}
		}

		protected function btnUpdate_Contact_Click() {
			$this->btnCancel_Contact_Click();

			QApplication::$PublicLogin->Person->ChangePrimaryEmailTo($this->txtEmail->Text);
			QApplication::$PublicLogin->Person->CanEmailFlag = $this->chkBulkEmail->Checked;
			QApplication::$PublicLogin->Person->Save();
			
			$strMobilePhone = trim($this->txtMobilePhone->Text);
			if (strlen($strMobilePhone)) {
				QApplication::$PublicLogin->Person->CreateOrUpdateMobilePhone($strMobilePhone);
			} else if ($objPhone = QApplication::$PublicLogin->Person->DeduceMobilePhone()) {
				$objPhone->Delete();
			}
			QApplication::$PublicLogin->Save();

			QApplication::PublicLoginRefresh();
			$this->Refresh();
		}

		protected function btnUpdate_Personal_Click() {
			$this->btnCancel_Personal_Click();

			$this->mctPerson->SavePerson();
			QApplication::PublicLoginRefresh();
			$this->Refresh();
		}
			
		protected function btnUpdate_Security_Click() {
			// Validate Security Stuff
			$blnProceed = true;

			$strUsernameCandidate = null;
			if ($this->txtUsername->Text != QApplication::$PublicLogin->Username) {
				$strUsernameCandidate = QApplication::Tokenize($this->txtUsername->Text, false);

				if ($strUsernameCandidate != trim(strtolower($this->txtUsername->Text))) {
					$this->txtUsername->Warning = 'Must only contain letters and numbers';
					$blnProceed = false;
				}

				if (strlen($strUsernameCandidate) < 4) {
					$this->txtUsername->Warning = 'Must have at least 4 characters';
					$blnProceed = false;
				}

				if (PublicLogin::LoadByUsername($strUsernameCandidate)) {
					$this->txtUsername->Warning = 'Username is taken';
					$blnProceed = false;
				}
			}

			if ($this->txtOldPassword->Text || $this->txtNewPassword->Text || $this->txtConfirmPassword->Text) {
				if (!QApplication::$PublicLogin->IsPasswordValid($this->txtOldPassword->Text)) {
					$this->txtOldPassword->Warning = 'Password is incorrect';
					$blnProceed = false;
				}

				if (strlen(trim($this->txtNewPassword->Text)) < 6) {
					$blnProceed = false;
					$this->txtNewPassword->Warning = 'Must have at least 6 characters';
				}

				if ($this->txtNewPassword->Text != $this->txtConfirmPassword->Text) {
					$this->txtConfirmPassword->Warning = 'Does not match above';
					$blnProceed = false;
				}
			}

			if (!$blnProceed) {
				$blnFirst = true;
				foreach ($this->GetErrorControls() as $objErrorControl) {
					$objErrorControl->Blink();
					if ($blnFirst) {
						$blnFirst = false;
						$objErrorControl->Focus();
					}
				}
				return;
			}

			// Update Stuff
			if ($strUsernameCandidate) QApplication::$PublicLogin->Username = $strUsernameCandidate;
			QApplication::$PublicLogin->LostPasswordQuestion = trim($this->txtQuestion->Text);
			QApplication::$PublicLogin->LostPasswordAnswer = strtolower(trim($this->txtAnswer->Text));
			if ($this->txtNewPassword->Text) QApplication::$PublicLogin->SetPassword($this->txtNewPassword->Text);
			QApplication::$PublicLogin->Save();

			// Refresh Stuff
			$this->Refresh();

			// Cleanup Stuff
			$this->btnCancel_Security_Click();
		}

		protected function btnCancel_Address_Click($strFormId, $strControlId, $strParameter) {
			switch ($strParameter) {
				case 1:
					$this->dlgAddress->Template = null;
					$this->dlgAddress->HideDialogBox();
					break;
				case 2:
					$this->dlgAddress->Template = dirname(__FILE__) . '/dlgAddress.inc.php';
					break;
			}

			$this->btnAddressCancel->ActionParameter = 1;
			$this->btnAddressUpdate->ActionParameter = 1;
			$this->btnAddressUpdate->Text = 'Update';
			$this->btnAddressCancel->Text = 'Cancel';
		}

		protected function btnCancel_Contact_Click() {
			$this->dlgContact->Template = null;
			$this->dlgContact->HideDialogBox();
		}
			
		protected function btnCancel_Personal_Click() {
			$this->dlgPersonal->Template = null;
			$this->dlgPersonal->HideDialogBox();
		}
			
		protected function btnCancel_Security_Click() {
			$this->dlgSecurity->Template = null;
			$this->dlgSecurity->HideDialogBox();
		}
	}

	PublicMainForm::Run('PublicMainForm');
?>