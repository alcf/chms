<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AddNewIndividual));

	class CreateIndividualForm extends ChmsForm {
		protected $strPageTitle = 'Add New Individual';
		protected $intNavSectionId = ChmsForm::NavSectionPeople;

		protected $txtFirstName;
		protected $txtMiddleName;
		protected $txtLastName;
		protected $txtNickname;
		protected $dtxDateOfBirth;
		protected $calDateOfBirth;
		protected $lstMarriageStatusType;
		protected $dtxDateOfMarriage;
		protected $calDateOfMarriage;
		protected $lstGender;
		protected $txtHomePhone;
		protected $txtCellPhone;
		protected $txtWorkPhone;
		protected $txtEmail;

		protected $chkInvalidFlag;
		protected $txtAddress1;
		protected $txtAddress2;
		protected $txtAddress3;
		protected $txtCity;
		protected $lstState;
		protected $txtZipCode;

		protected $lstMembershipStatusType;
		protected $dtxDateOfMembership;
		protected $calDateOfMembership;

		protected $mctPerson;
		protected $mctSpouse;
		protected $mctAddress;

		protected $btnSave;
		protected $btnCancel;

		protected $dlgMessage;

		protected function Form_Create() {
			$this->mctPerson = new PersonMetaControl($this, new Person());
			$this->mctSpouse = new PersonMetaControl($this, new Person());
			$this->mctAddress = new AddressMetaControl($this, new Address());

			$this->txtFirstName = $this->mctPerson->txtFirstName_Create();
			$this->txtMiddleName = $this->mctPerson->txtMiddleName_Create();
			$this->txtLastName = $this->mctPerson->txtLastName_Create();
			$this->txtLastName->Required = true;

			$this->lstGender = new QListBox($this);
			$this->lstGender->Name = 'Gender';
			$this->lstGender->AddItem('- Select One -', null);
			$this->lstGender->AddItem('Male', 'M');
			$this->lstGender->AddItem('Female', 'F');

			$this->txtHomePhone = new PhoneTextBox($this);
			$this->txtHomePhone->Name = 'Home Phone';
			$this->txtCellPhone = new PhoneTextBox($this);
			$this->txtCellPhone->Name = 'Cell Phone';
			$this->txtWorkPhone = new PhoneTextBox($this);
			$this->txtWorkPhone->Name = 'Work Phone';

			$this->chkInvalidFlag = $this->mctAddress->chkInvalidFlag_Create();
			$this->txtAddress1 = $this->mctAddress->txtAddress1_Create();
			$this->txtAddress2 = $this->mctAddress->txtAddress2_Create();
			$this->txtAddress3 = $this->mctAddress->txtAddress3_Create();
			$this->txtCity = $this->mctAddress->txtCity_Create();
			$this->lstState = $this->mctAddress->lstState_Create();
			$this->txtZipCode = $this->mctAddress->txtZipCode_Create();

			$this->dlgMessage = new MessageDialog($this);
			$this->dlgMessage_Reset();

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Create';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QShowDialogBox($this->dlgMessage));
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->txtFirstName->Focus();
		}

		public function dlgMessage_Reset() {
			$this->dlgMessage->RemoveAllButtons(false);
			$this->dlgMessage->HorizontalAlign = QHorizontalAlign::Center;
			$this->dlgMessage->MatteClickable = false;
			$this->dlgMessage->MessageHtml = '<p style="font-weight: bold;">Validating Address with USPS<br/><span style="font-weight: normal; font-size: 13px; color: #999;">Please wait...</span></p><p><img src="/assets/images/spinner_20.gif"/></p>';
			$this->dlgMessage->HideDialogBox();
		}

		public function Form_Validate() {
			$this->dlgMessage->HideDialogBox();
			return true;
		}

		protected function btnSave_Click() {
			// Perform USPS Validation (if applicable)
			if (trim($this->txtCity->Text) && !($this->chkInvalidFlag->Checked)) {
				$objAddressValidator = new AddressValidator($this->txtAddress1->Text, $this->txtAddress2->Text, $this->txtCity->Text, $this->lstState->SelectedValue, $this->txtZipCode->Text);
				$objAddressValidator->ValidateAddress();

				if ($objAddressValidator->AddressValidFlag) {
					$this->txtAddress1->Text = $objAddressValidator->PrimaryAddressLine;
					$this->txtAddress2->Text = $objAddressValidator->SecondaryAddressLine;
					$this->txtCity->Text = $objAddressValidator->City;
					$this->lstState->SelectedValue = $objAddressValidator->State;
					$this->txtZipCode->Text = $objAddressValidator->ZipCode;
					$this->dlgMessage->HideDialogBox();
				} else {
					$this->dlgMessage->MessageHtml = '<p style="font-weight: bold;">This address is considered invalid with the USPS.</p><p style="font-size: 13px; color: #999;">Please make corrections or select <strong>"this is an INVALID address"</strong>.</p>';
					$this->dlgMessage->AddButton('Okay', MessageDialog::ButtonPrimary, 'dlgMessage_Reset');
					$this->dlgMessage->ShowDialogBox();
					return;
				}
			}

			// Fixup Middle
			$this->txtMiddleName->Text = trim($this->txtMiddleName->Text);
			if (strlen($this->txtMiddleName->Text) == 1)
				$this->txtMiddleName->Text = strtoupper($this->txtMiddleName->Text);
			else if ((strlen($this->txtMiddleName->Text) == 2) && ($this->txtMiddleName->Text[1] == '.'))
				$this->txtMiddleName->Text = strtoupper($this->txtMiddleName->Text[0]);

			// Update Gender and Types and Save
			$this->mctPerson->Person->Gender = $this->lstGender->SelectedValue;
			$this->mctPerson->Person->MembershipStatusTypeId = MembershipStatusType::NonMember;
			$this->mctPerson->Person->MaritalStatusTypeId = MaritalStatusType::NotSpecified;
			$this->mctPerson->Person->DeceasedFlag = false;
			$this->mctPerson->SavePerson();

			// Is there a home address?
			if (trim($this->txtCity->Text)) {
				$objHousehold = Household::CreateHousehold($this->mctPerson->Person);
				$this->mctAddress->Address->AddressTypeId = AddressType::Home;
				$this->mctAddress->Address->Household = $objHousehold;
				$this->mctAddress->Address->CurrentFlag = true;
				$this->mctAddress->Address->InvalidFlag = false;
				$this->mctAddress->SaveAddress();
			} else {
				$objHousehold = null;
			}

			// Phones
			if (trim($this->txtCellPhone->Text)) {
				$objPhone = new Phone();
				$objPhone->PhoneTypeId = PhoneType::Mobile;
				$objPhone->Person = $this->mctPerson->Person;
				$objPhone->Number = trim($this->txtCellPhone->Text);
				$objPhone->Save();

				$this->mctPerson->Person->PrimaryPhone = $objPhone;
			}

			if (trim($this->txtHomePhone->Text)) {
				$objPhone = new Phone();
				$objPhone->PhoneTypeId = PhoneType::Home;
				$objPhone->Number = trim($this->txtHomePhone->Text);
				if ($objHousehold)
					$objPhone->Address = $this->mctAddress->Address;
				else
					$objPhone->Person = $this->mctPerson->Person;
				$objPhone->Save();

				if (!$this->mctPerson->Person->PrimaryPhone) $this->mctPerson->Person->PrimaryPhone = $objPhone;
			}

			if (trim($this->txtWorkPhone->Text)) {
				$objPhone = new Phone();
				$objPhone->PhoneTypeId = PhoneType::Work;
				$objPhone->Person = $this->mctPerson->Person;
				$objPhone->Number = trim($this->txtWorkPhone->Text);
				$objPhone->Save();

				if (!$this->mctPerson->Person->PrimaryPhone) $this->mctPerson->Person->PrimaryPhone = $objPhone;
			}

			$this->mctPerson->Person->RefreshPrimaryContactInfo(true);
			$this->RedirectBack(true);
		}

		protected function btnCancel_Click() {
			$this->RedirectBack(false);
		}

		protected function RedirectBack($blnSave = false) {
			// From StewradshipSelectPersonDialogBox.class.php:
			//
			// New.php should take the StackId as the first PathInfo
			// PathInfo(1) should be either "new", "check", or the Id of the Contribution
			// PathInfo(2) should be the check hash (if applicable)
			
			if ($objStack = StewardshipStack::Load(QApplication::PathInfo(0))) {
				switch (strtolower(trim(QApplication::PathInfo(1)))) {
					case 'new':
						QApplication::Redirect(sprintf('/stewardship/batch.php/%s#%s/edit_contribution/new/0/%s',
							$objStack->StewardshipBatchId, $objStack->StackNumber, ($blnSave ? $this->mctPerson->Person->Id : null)));
						break;
					case 'check':
						QApplication::Redirect(sprintf('/stewardship/batch.php/%s#%s/edit_contribution/0/%s/%s',
							$objStack->StewardshipBatchId, $objStack->StackNumber, QApplication::PathInfo(2), ($blnSave ? $this->mctPerson->Person->Id : null)));
						break;
					default:
						QApplication::Redirect(sprintf('/stewardship/batch.php/%s#%s/edit_contribution/%s/0/%s',
							$objStack->StewardshipBatchId, $objStack->StackNumber, QApplication::PathInfo(1), ($blnSave ? $this->mctPerson->Person->Id : null)));
						break;
				}
			} else if ($blnSave) {
				QApplication::Redirect($this->mctPerson->Person->LinkUrl);
			} else {
				QApplication::Redirect('/individuals/');
			}
		}
	}

	CreateIndividualForm::Run('CreateIndividualForm');
?>