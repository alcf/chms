<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	class PublicMainForm extends ChmsForm {
		protected $strPageTitle = 'Account Profile';

		protected $lblHomeAddress;
		protected $lblMailingAddress;

		protected $lblEmailAddress;
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
			$this->$strUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnUpdate_' . $strType . '_Click'));

			$this->$strCancel = new QLinkButton($this->$strDialog);
			$this->$strCancel->CssClass = 'cancel';
			$this->$strCancel->Text = 'Cancel';
			$this->$strCancel->AddAction(new QClickEvent(), new QHideDialogBox($this->$strDialog));
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

		protected function Refresh() {
			$objHouseholdArray = array();
			foreach (QApplication::$PublicLogin->Person->GetHouseholdParticipationArray() as $objHouseholdParticipation)
				$objHouseholdArray[] = $objHouseholdParticipation->Household;

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
			} else {
				$this->lblEmailAddress->CssClass = 'gray';
				$this->lblEmailAddress->Text = 'Not Specified';
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
			$this->dlgAddress->ShowDialogBox();
			$this->dlgAddress->Template = dirname(__FILE__) . '/dlgAddress.inc.php';
		}
		
		protected function btnContact_Click($strFormId, $strControlId, $strParameter) {
			$this->dlgContact->ShowDialogBox();
			$this->dlgContact->Template = dirname(__FILE__) . '/dlgContact.inc.php';
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

		protected function btnUpdate_Address_Click() {
			$this->btnCancel_Address_Click();
		}
		
		protected function btnUpdate_Contact_Click() {
			$this->btnCancel_Contact_Click();
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

		protected function btnCancel_Address_Click() {
			$this->dlgAddress->Template = null;
			$this->dlgAddress->HideDialogBox();
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