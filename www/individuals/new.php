<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AddNewIndividual));

	class CreateIndividualForm extends ChmsForm {
		protected $strPageTitle = 'Add New Individual';
		protected $intNavSectionId = ChmsForm::NavSectionPeople;

		protected $txtPersonFirstName;
		protected $txtPersonMiddleName;
		protected $txtPersonLastName;
		protected $txtPersonSuffix;
		protected $txtPersonNickname;
		protected $txtPersonPriorLastNames;
		protected $dtxPersonDateOfBirth;
		protected $calPersonDateOfBirth;
		protected $lstPersonGender;
		protected $txtPersonHomePhone;
		protected $txtPersonCellPhone;
		protected $lstPersonMobileProvider;
		protected $txtPersonWorkPhone;
		protected $txtPersonEmail;
		
		protected $lstCanMail;
		protected $lstCanEmail;
		protected $lstCanPhone;
		protected $chkAddToNewsletter;

		protected $txtSpouseFirstName;
		protected $txtSpouseMiddleName;
		protected $txtSpouseLastName;
		protected $txtSpouseSuffix;
		protected $txtSpouseNickname;
		protected $txtSpousePriorLastNames;
		protected $dtxSpouseDateOfBirth;
		protected $calSpouseDateOfBirth;
		protected $lstSpouseGender;
		protected $txtSpouseHomePhone;
		protected $txtSpouseCellPhone;
		protected $lstSpouseMobileProvider;
		protected $txtSpouseWorkPhone;
		protected $txtSpouseEmail;

		protected $lstAttributeMethodJoin;
		protected $txtAttributePreviousChurch;
		protected $txtAttributeOccupation;
		protected $lstAttributeEthnicity;
		protected $dtxAttributeDateAcceptedChrist;
		protected $calAttributeDateAcceptedChrist;
		protected $chkAcceptedChristAtALCF;
		
		protected $lstMarriageStatusType;
		protected $dtxDateOfMarriage;
		protected $calDateOfMarriage;
		protected $rblSpouseMembership;

		protected $chkInvalidFlag;
		protected $txtAddress1;
		protected $txtAddress2;
		protected $txtAddress3;
		protected $txtCity;
		protected $lstState;
		protected $txtZipCode;

		protected $chkMembershipFlag;
		protected $dtxDateOfMembership;
		protected $calDateOfMembership;

		protected $mctPerson;
		protected $mctSpouse;
		protected $mctAddress;
		protected $mctMarriage;
		protected $mctMembership;

		protected $btnSave;
		protected $btnCancel;

		protected $dlgMessage;

		protected $objHomePhone;
		
		protected function CreateControlsForAttributes() {			
			$this->txtAttributePreviousChurch = new QTextBox($this);
			$this->txtAttributePreviousChurch->Name = 'Previous Church';
			$this->txtAttributeOccupation = new QTextBox($this);
			$this->txtAttributeOccupation->Name = 'Occupation';
			
			$this->lstAttributeMethodJoin = new QListBox($this);
			$this->lstAttributeMethodJoin->Name = 'Method of Joining ALCF';
			$this->lstAttributeMethodJoin->AddItem('- Select One -', null);
			
			$objAttribute = Attribute::QuerySingle(QQ::Equal(QQN::Attribute()->Name, "Method of Joining ALCF"));	
			$attributeOptionArray =AttributeOption::LoadArrayByAttributeId($objAttribute->Id);
			foreach ($attributeOptionArray as $objAttributeOption){
				$this->lstAttributeMethodJoin->AddItem($objAttributeOption->Name, $objAttributeOption->Id);
			}
			$this->lstAttributeEthnicity = new QListBox($this);
			$this->lstAttributeEthnicity->Name = 'Ethnicity';
			$this->lstAttributeEthnicity->AddItem('- Select One -', null);
				
			$objAttribute = Attribute::QuerySingle(QQ::Equal(QQN::Attribute()->Name, "Ethnicity"));
			$attributeOptionArray =AttributeOption::LoadArrayByAttributeId($objAttribute->Id);
			foreach ($attributeOptionArray as $objAttributeOption){
				$this->lstAttributeEthnicity->AddItem($objAttributeOption->Name, $objAttributeOption->Id);
			}
			
			$this->dtxAttributeDateAcceptedChrist = new QDateTimeTextBox($this);
			$this->dtxAttributeDateAcceptedChrist->Name = 'Date Accepted Christ';
			$this->calAttributeDateAcceptedChrist = new QCalendar($this, $this->dtxAttributeDateAcceptedChrist);
			
			$this->chkAcceptedChristAtALCF = new QCheckBox($this);
			$this->chkAcceptedChristAtALCF->Name = 'Accepted Christ at ALCF?';
			$this->chkAcceptedChristAtALCF->Text = 'Click if this person accepted Christ at ALCF';				
		}
		
		protected function CreateControlsForPerson() {
			// Fields for "Person"
			$this->txtPersonFirstName = $this->mctPerson->txtFirstName_Create();
			$this->txtPersonFirstName->Required = true;
			$this->txtPersonMiddleName = $this->mctPerson->txtMiddleName_Create();
			$this->txtPersonLastName = $this->mctPerson->txtLastName_Create();
			$this->txtPersonLastName->Required = true;
			$this->txtPersonSuffix = $this->mctPerson->txtSuffix_Create();

			$this->txtPersonNickname = $this->mctPerson->txtNickname_Create();
			$this->txtPersonPriorLastNames = $this->mctPerson->txtPriorLastNames_Create();

			$this->lstPersonGender = $this->mctPerson->lstGender_Create();

			$this->dtxPersonDateOfBirth = $this->mctPerson->dtxDateOfBirth_Create();
			$this->calPersonDateOfBirth = $this->mctPerson->calDateOfBirth_Create();

			$this->txtPersonHomePhone = new PhoneTextBox($this);
			$this->txtPersonHomePhone->Name = 'Home Phone';
			$this->txtPersonCellPhone = new PhoneTextBox($this);
			$this->txtPersonCellPhone->Name = 'Mobile Phone';
			$this->txtPersonWorkPhone = new PhoneTextBox($this);
			$this->txtPersonWorkPhone->Name = 'Work Phone';

			$this->lstPersonMobileProvider = new QListBox($this);
			$this->lstPersonMobileProvider->Name = 'Mobile Provider';
			$this->lstPersonMobileProvider->AddItem('- Select One -', null);
			foreach (MobileProvider::LoadAll(QQ::OrderBy(QQN::MobileProvider()->Name)) as $objMobileProvider)
				$this->lstPersonMobileProvider->AddItem($objMobileProvider->Name, $objMobileProvider->Id);

			$this->txtPersonEmail = new QEmailTextBox($this);
			$this->txtPersonEmail->Name = 'Email Address';
			
			$this->lstCanMail = new QListBox($this);
			$this->lstCanMail->Name = 'Okay to Mail';
			$this->lstCanMail->AddItem('Yes', true, $this->mctPerson->Person->CanMailFlag);
			$this->lstCanMail->AddItem('No', false, !$this->mctPerson->Person->CanMailFlag);
			
			$this->lstCanEmail = new QListBox($this);
			$this->lstCanEmail->Name = 'Okay to Email';
			$this->lstCanEmail->AddItem('Yes', true, $this->mctPerson->Person->CanEmailFlag);
			$this->lstCanEmail->AddItem('No', false, !$this->mctPerson->Person->CanEmailFlag);
			
			$this->lstCanPhone = new QListBox($this);
			$this->lstCanPhone->Name = 'Okay to Phone';
			$this->lstCanPhone->AddItem('Yes', true, $this->mctPerson->Person->CanPhoneFlag);
			$this->lstCanPhone->AddItem('No', false, !$this->mctPerson->Person->CanPhoneFlag);
			
			$this->chkAddToNewsletter = new QCheckBox($this);
			$this->chkAddToNewsletter->Name = 'Add to Church Newsletter Email';
			$this->chkAddToNewsletter->Checked = true;
		}

		protected function CreateControlsForSpouse() {
			// Fields for "Spouse"
			$this->txtSpouseFirstName = $this->mctSpouse->txtFirstName_Create();
			$this->txtSpouseMiddleName = $this->mctSpouse->txtMiddleName_Create();
			$this->txtSpouseLastName = $this->mctSpouse->txtLastName_Create();
			$this->txtSpouseSuffix = $this->mctSpouse->txtSuffix_Create();
			
			$this->txtSpouseNickname = $this->mctSpouse->txtNickname_Create();
			$this->txtSpousePriorLastNames = $this->mctSpouse->txtPriorLastNames_Create();

			$this->lstSpouseGender = $this->mctSpouse->lstGender_Create();

			$this->dtxSpouseDateOfBirth = $this->mctSpouse->dtxDateOfBirth_Create();
			$this->calSpouseDateOfBirth = $this->mctSpouse->calDateOfBirth_Create();

			$this->txtSpouseHomePhone = new PhoneTextBox($this);
			$this->txtSpouseHomePhone->Name = 'Home Phone';
			$this->txtSpouseCellPhone = new PhoneTextBox($this);
			$this->txtSpouseCellPhone->Name = 'Mobile Phone';
			$this->txtSpouseWorkPhone = new PhoneTextBox($this);
			$this->txtSpouseWorkPhone->Name = 'Work Phone';
			
			$this->lstSpouseMobileProvider = new QListBox($this);
			$this->lstSpouseMobileProvider->Name = 'Mobile Provider';
			$this->lstSpouseMobileProvider->AddItem('- Select One -', null);
			foreach (MobileProvider::LoadAll(QQ::OrderBy(QQN::MobileProvider()->Name)) as $objMobileProvider)
				$this->lstSpouseMobileProvider->AddItem($objMobileProvider->Name, $objMobileProvider->Id);

			$this->txtSpouseEmail = new QEmailTextBox($this);
			$this->txtSpouseEmail->Name = 'Email Address';
		}

		protected function CreateControlsForAddress() {
			// Fields for "Address"
			$this->chkInvalidFlag = $this->mctAddress->chkInvalidFlag_Create();
			$this->txtAddress1 = $this->mctAddress->txtAddress1_Create();
			$this->txtAddress1->Required = true;
			$this->txtAddress2 = $this->mctAddress->txtAddress2_Create();
			$this->txtAddress3 = $this->mctAddress->txtAddress3_Create();
			$this->txtCity = $this->mctAddress->txtCity_Create();
			$this->txtCity->Required = true;
			$this->lstState = $this->mctAddress->lstState_Create();
			$this->lstState->Required = true;
			$this->lstState->AddItem('International (Non US)', 'International');
			$this->txtZipCode = $this->mctAddress->txtZipCode_Create();
			$this->txtZipCode->Required = true;
		}

		protected function CreateControlsForMarriage() {
			$this->dtxDateOfMarriage = $this->mctMarriage->dtxDateStart_Create();
			$this->calDateOfMarriage = $this->mctMarriage->calDateStart_Create();

			$this->lstMarriageStatusType = $this->mctMarriage->lstMarriageStatusType_Create();
			$this->lstMarriageStatusType->Required = false;
			$this->lstMarriageStatusType->AddAction(new QChangeEvent(), new QAjaxAction('lstMarriageStatusType_Change'));
			$this->lstMarriageStatusType->RemoveAllItems();

			$this->lstMarriageStatusType->Name = 'Marital Status';
			$this->lstMarriageStatusType->AddItem('Not Specified', null, true);
			$this->lstMarriageStatusType->AddItem('Single', 0);
			foreach (MarriageStatusType::$NameArray as $intId => $strName)
				$this->lstMarriageStatusType->AddItem($strName, $intId);

			$this->rblSpouseMembership = new QRadioButtonList($this);
			$this->rblSpouseMembership->AddAction(new QClickEvent(), new QAjaxAction('lstMarriageStatusType_Change'));
			$this->rblSpouseMembership->Name = 'Spouse\'s Membership';
			$this->rblSpouseMembership->AddItem('Spouse is joining as well', 1, true);
			$this->rblSpouseMembership->AddItem('Spouse\'s information only', 2);
			$this->rblSpouseMembership->AddItem('Spouse\'s information unavailable', 3);
			
			$this->lstMarriageStatusType_Change();
		}

		protected function lstMarriageStatusType_Change() {
			if (!$this->lstMarriageStatusType->SelectedValue) {
				QApplication::ExecuteJavaScript('document.getElementById("spouse").style.display="none";');
				$this->txtSpouseFirstName->Required = false;
				$this->txtSpouseLastName->Required = false;
				$this->dtxDateOfMarriage->Visible = false;
				$this->rblSpouseMembership->Visible = false;
			} else {
				$this->dtxDateOfMarriage->Visible = true;
				$this->rblSpouseMembership->Visible = true;
				switch ($this->rblSpouseMembership->SelectedValue) {
					case 1:
					case 2:
						QApplication::ExecuteJavaScript('document.getElementById("spouse").style.display="block";');
						$this->txtSpouseFirstName->Required = true;
						$this->txtSpouseLastName->Required = true;
						break;
					default:
						QApplication::ExecuteJavaScript('document.getElementById("spouse").style.display="none";');
						$this->txtSpouseFirstName->Required = false;
						$this->txtSpouseLastName->Required = false;
						break;
				}
			}
		}

		protected function CreateControlsForMembership() {
			$this->chkMembershipFlag = new QCheckBox($this);
			$this->chkMembershipFlag->Name = 'Member of ALCF?';
			$this->chkMembershipFlag->Text = 'Click if this person is a member of ALCF';
			$this->chkMembershipFlag->AddAction(new QClickEvent(), new QAjaxAction('chkMembershipFlag_Click'));

			$this->dtxDateOfMembership = $this->mctMembership->dtxDateStart_Create();
			$this->calDateOfMembership = $this->mctMembership->calDateStart_Create();
			$this->dtxDateOfMembership->Visible = false;
		}

		protected function chkMembershipFlag_Click() {
			if ($this->chkMembershipFlag->Checked) {
				$this->dtxDateOfMembership->Visible = true;
				$this->dtxDateOfMembership->Required = true;
			} else {
				$this->dtxDateOfMembership->Visible = false;
				$this->dtxDateOfMembership->Required = false;
			}
		}

		protected function Form_Create() {
			$this->mctPerson = new PersonMetaControl($this, new Person());
			$this->mctSpouse = new PersonMetaControl($this, new Person());
			$this->mctAddress = new AddressMetaControl($this, new Address());
			$this->mctMarriage = new MarriageMetaControl($this, new Marriage());
			$this->mctMembership = new MembershipMetaControl($this, new Membership());

			$this->mctPerson->Person->CanEmailFlag = true;
			$this->mctPerson->Person->CanPhoneFlag = true;
			$this->mctPerson->Person->CanMailFlag = true;
			$this->mctSpouse->Person->CanEmailFlag = true;
			$this->mctSpouse->Person->CanPhoneFlag = true;
			$this->mctSpouse->Person->CanMailFlag = true;

			$this->CreateControlsForPerson();
			$this->CreateControlsForAddress();
			$this->CreateControlsForSpouse();
			$this->CreateControlsForMembership();
			$this->CreateControlsForMarriage();
			$this->CreateControlsForAttributes();

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
			
			$this->txtPersonFirstName->Focus();
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

			$this->SavePerson();
			$this->SaveMembership();
			$this->SaveMarriage();
			$this->SaveAttribute();
			$this->AddToChurchEmailList();
			$this->mctPerson->Person->RefreshPrimaryContactInfo(true);
			if ($this->mctSpouse->Person->Id) $this->mctSpouse->Person->RefreshPrimaryContactInfo(true);
			if ($objHousehold = Household::LoadByHeadPersonId($this->mctPerson->Person->Id)) $objHousehold->RefreshMembers();
			$this->RedirectBack(true);
		}

		protected function SaveAttribute() {		
			if(($this->txtAttributePreviousChurch != null) && ($this->txtAttributeOccupation->Text != "")) {
				$objAttributeValue = new AttributeValue();
				$objAttribute = Attribute::QuerySingle(QQ::Equal(QQN::Attribute()->Name, "Previous Church"));
				$objAttributeValue->AttributeId = $objAttribute->Id;
				$objAttributeValue->PersonId = $this->mctPerson->Person->Id;
				$objAttributeValue->TextValue = $this->txtAttributePreviousChurch->Text;
				$objAttributeValue->DatetimeValue = QDateTime::Now();
				$objAttributeValue->Save();
			}
			if(($this->txtAttributeOccupation != null) && ($this->txtAttributeOccupation->Text!= "")) {
				$objAttributeValue = new AttributeValue();
				$objAttribute = Attribute::QuerySingle(QQ::Equal(QQN::Attribute()->Name, "Occupation"));
				$objAttributeValue->AttributeId = $objAttribute->Id;
				$objAttributeValue->PersonId = $this->mctPerson->Person->Id;
				$objAttributeValue->TextValue = $this->txtAttributeOccupation->Text;
				$objAttributeValue->DatetimeValue = QDateTime::Now();
				$objAttributeValue->Save();
			}
			
			if (($this->lstAttributeMethodJoin != null)&& ($this->lstAttributeMethodJoin->SelectedName != '- Select One -')) {
				$objAttributeValue = new AttributeValue();
				$objAttribute = Attribute::QuerySingle(QQ::Equal(QQN::Attribute()->Name, "Method of Joining ALCF"));
				$objAttributeValue->AttributeId = $objAttribute->Id;
				$objAttributeValue->PersonId = $this->mctPerson->Person->Id;
				$objAttributeValue->TextValue = $this->lstAttributeMethodJoin->SelectedName;
				$objAttributeValue->DatetimeValue = QDateTime::Now();
				$objAttributeValue->SingleAttributeOptionId = $this->lstAttributeMethodJoin->SelectedValue;
				$objAttributeValue->SingleAttributeOption->Name = $this->lstAttributeMethodJoin->SelectedName;
				$objAttributeValue->Save();
			}

			if (($this->lstAttributeEthnicity != null)&& ($this->lstAttributeEthnicity->SelectedName != '- Select One -')) {
				$objAttributeValue = new AttributeValue();
				$objAttribute = Attribute::QuerySingle(QQ::Equal(QQN::Attribute()->Name, "Ethnicity"));
				$objAttributeValue->AttributeId = $objAttribute->Id;
				$objAttributeValue->PersonId = $this->mctPerson->Person->Id;
				$objAttributeValue->TextValue = $this->lstAttributeEthnicity->SelectedName;
				$objAttributeValue->DatetimeValue = QDateTime::Now();
				$objAttributeValue->SingleAttributeOptionId = $this->lstAttributeEthnicity->SelectedValue;
				$objAttributeValue->SingleAttributeOption->Name = $this->lstAttributeEthnicity->SelectedName;
				$objAttributeValue->Save();
			}
			
			if (($this->dtxAttributeDateAcceptedChrist != null) && ($this->dtxAttributeDateAcceptedChrist->DateTime != null)) {
				$objAttributeValue = new AttributeValue();
				$objAttribute = Attribute::QuerySingle(QQ::Equal(QQN::Attribute()->Name, "Date Accepted Christ"));
				$objAttributeValue->AttributeId = $objAttribute->Id;
				$objAttributeValue->PersonId = $this->mctPerson->Person->Id;
				$objAttributeValue->DatetimeValue = $this->dtxAttributeDateAcceptedChrist->DateTime;
				$objAttributeValue->DateValue = $this->dtxAttributeDateAcceptedChrist->DateTime;
				$objAttributeValue->Save();
			}
			if ($this->chkAcceptedChristAtALCF->Checked) {
				$objAttributeValue = new AttributeValue();
				$objAttribute = Attribute::QuerySingle(QQ::Equal(QQN::Attribute()->Name, "Accepted Christ At ALCF"));
				$objAttributeValue->AttributeId = $objAttribute->Id;
				$objAttributeValue->PersonId = $this->mctPerson->Person->Id;
				$objAttributeValue->BooleanValue = true;
				$objAttributeValue->Save();
			}
		}
		
		protected function SaveMembership() {
			if ($this->chkMembershipFlag->Checked) {
				$this->mctMembership->Membership->Person = $this->mctPerson->Person;
				$this->mctMembership->SaveMembership();
				$this->mctPerson->Person->RefreshMembershipStatusTypeId(false);
			}
		}

		protected function SaveMarriage() {
			// Marriage remains "Not Specified"
			if (is_null($this->lstMarriageStatusType->SelectedValue)) return;

			// Person is explicitly Single
			if (!$this->lstMarriageStatusType->SelectedValue) {
				$this->mctPerson->Person->MaritalStatusTypeId = MaritalStatusType::Single;
				return;
			}

			// Person is married -- but no spouse information provided
			if ($this->rblSpouseMembership->SelectedValue == 3) {
				$this->mctMarriage->Marriage->Person = $this->mctPerson->Person;
				$this->mctMarriage->SaveMarriage();
				$this->mctPerson->Person->RefreshMaritalStatusTypeId(false);
				return;
			}

			// Person is married -- and spouse information is provided
			$this->SaveSpouse();
			$this->mctPerson->Person->CreateMarriageWith($this->mctSpouse->Person, $this->dtxDateOfMarriage->DateTime, null, $this->lstMarriageStatusType->SelectedValue);

			// Add Spouse as Member?
			if (($this->rblSpouseMembership->SelectedValue == 1) && $this->chkMembershipFlag->Checked) {
				$objMembership = new Membership();
				$objMembership->Person = $this->mctSpouse->Person;
				$objMembership->DateStart = $this->dtxDateOfMembership->DateTime;
				$objMembership->Save();
				$this->mctSpouse->Person->RefreshMembershipStatusTypeId(false);
			}
		}

		protected function SavePerson() {
			// Fixup Middle
			$this->txtPersonMiddleName->Text = trim($this->txtPersonMiddleName->Text);
			if (strlen($this->txtPersonMiddleName->Text) == 1)
				$this->txtPersonMiddleName->Text = strtoupper($this->txtPersonMiddleName->Text);
			else if ((strlen($this->txtPersonMiddleName->Text) == 2) && ($this->txtPersonMiddleName->Text[1] == '.'))
				$this->txtPersonMiddleName->Text = strtoupper($this->txtPersonMiddleName->Text[0]);

			// Update Gender and Types and Save
			$this->mctPerson->Person->Gender = $this->lstPersonGender->SelectedValue;
			$this->mctPerson->Person->MembershipStatusTypeId = MembershipStatusType::NonMember;
			$this->mctPerson->Person->MaritalStatusTypeId = MaritalStatusType::NotSpecified;
			$this->mctPerson->Person->DeceasedFlag = false;
			
			$this->mctPerson->Person->CanEmailFlag = $this->lstCanEmail->SelectedValue;
			$this->mctPerson->Person->CanPhoneFlag = $this->lstCanPhone->SelectedValue;
			$this->mctPerson->Person->CanMailFlag = $this->lstCanMail->SelectedValue;
						
			$this->mctPerson->SavePerson();
			$this->mctPerson->Person->RefreshNameItemAssociations();

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

			// Email
			if (trim($this->txtPersonEmail->Text)) {
				$objEmail = new Email();
				$objEmail->Person = $this->mctPerson->Person;
				$objEmail->Address = trim($this->txtPersonEmail->Text);
				$objEmail->Save();
				
				$this->mctPerson->Person->PrimaryEmail = $objEmail;
			}
			
			// Phones
			if (trim($this->txtPersonCellPhone->Text)) {
				$objPhone = new Phone();
				$objPhone->PhoneTypeId = PhoneType::Mobile;
				$objPhone->Person = $this->mctPerson->Person;
				$objPhone->Number = trim($this->txtPersonCellPhone->Text);
				$objPhone->MobileProviderId = $this->lstPersonMobileProvider->SelectedValue;
				$objPhone->Save();

				$this->mctPerson->Person->PrimaryPhone = $objPhone;
			}

			if (trim($this->txtPersonHomePhone->Text)) {
				$objPhone = new Phone();
				$objPhone->PhoneTypeId = PhoneType::Home;
				$objPhone->Number = trim($this->txtPersonHomePhone->Text);
				if ($objHousehold)
					$objPhone->Address = $this->mctAddress->Address;
				else
					$objPhone->Person = $this->mctPerson->Person;
				$objPhone->Save();

				if (!$this->mctPerson->Person->PrimaryPhone) $this->mctPerson->Person->PrimaryPhone = $objPhone;
				if ($this->mctAddress->Address->Id) {
					$this->mctAddress->Address->PrimaryPhone = $objPhone;
					$this->mctAddress->Address->Save();
				}

				$this->objHomePhone = $objPhone;
			}

			if (trim($this->txtPersonWorkPhone->Text)) {
				$objPhone = new Phone();
				$objPhone->PhoneTypeId = PhoneType::Work;
				$objPhone->Person = $this->mctPerson->Person;
				$objPhone->Number = trim($this->txtPersonWorkPhone->Text);
				$objPhone->Save();

				if (!$this->mctPerson->Person->PrimaryPhone) $this->mctPerson->Person->PrimaryPhone = $objPhone;
			}
		}


		protected function SaveSpouse() {
			// Fixup Middle
			$this->txtSpouseMiddleName->Text = trim($this->txtSpouseMiddleName->Text);
			if (strlen($this->txtSpouseMiddleName->Text) == 1)
				$this->txtSpouseMiddleName->Text = strtoupper($this->txtSpouseMiddleName->Text);
			else if ((strlen($this->txtSpouseMiddleName->Text) == 2) && ($this->txtSpouseMiddleName->Text[1] == '.'))
				$this->txtSpouseMiddleName->Text = strtoupper($this->txtSpouseMiddleName->Text[0]);

			// Update Gender and Types and Save
			$this->mctSpouse->Person->Gender = $this->lstSpouseGender->SelectedValue;
			$this->mctSpouse->Person->MembershipStatusTypeId = MembershipStatusType::NonMember;
			$this->mctSpouse->Person->MaritalStatusTypeId = MaritalStatusType::NotSpecified;
			$this->mctSpouse->Person->DeceasedFlag = false;
			$this->mctSpouse->SavePerson();
			$this->mctSpouse->Person->RefreshNameItemAssociations();

			// Is there a home address?
			if ($objHousehold = Household::LoadByHeadPersonId($this->mctPerson->Person->Id))
				$objHousehold->AssociatePerson($this->mctSpouse->Person);

			// Email
			if (trim($this->txtSpouseEmail->Text)) {
				$objEmail = new Email();
				$objEmail->Person = $this->mctSpouse->Person;
				$objEmail->Address = trim($this->txtSpouseEmail->Text);
				$objEmail->Save();

				$this->mctSpouse->Person->PrimaryEmail = $objEmail;
			}

			// Phones
			if (trim($this->txtSpouseCellPhone->Text)) {
				$objPhone = new Phone();
				$objPhone->PhoneTypeId = PhoneType::Mobile;
				$objPhone->Person = $this->mctSpouse->Person;
				$objPhone->Number = trim($this->txtSpouseCellPhone->Text);
				$objPhone->MobileProviderId = $this->lstSpouseMobileProvider->SelectedValue;
				$objPhone->Save();

				$this->mctSpouse->Person->PrimaryPhone = $objPhone;
			}

			if (trim($this->txtSpouseHomePhone->Text)) {
				if ($this->txtSpouseHomePhone->Text != $this->txtPersonHomePhone->Text) {
					$objPhone = new Phone();
					$objPhone->PhoneTypeId = PhoneType::Home;
					$objPhone->Number = trim($this->txtSpouseHomePhone->Text);
					if ($objHousehold)
						$objPhone->Address = $this->mctAddress->Address;
					else
						$objPhone->Person = $this->mctSpouse->Person;
					$objPhone->Save();
				} else {
					$objPhone = $this->objHomePhone;
				}

				if (!$this->mctSpouse->Person->PrimaryPhone) $this->mctSpouse->Person->PrimaryPhone = $objPhone;
				if ($this->mctAddress->Address->Id && !$this->mctAddress->Address->PrimaryPhone) {
					$this->mctAddress->Address->PrimaryPhone = $objPhone;
					$this->mctAddress->Address->Save();
				}
			}

			if (trim($this->txtSpouseWorkPhone->Text)) {
				$objPhone = new Phone();
				$objPhone->PhoneTypeId = PhoneType::Work;
				$objPhone->Person = $this->mctSpouse->Person;
				$objPhone->Number = trim($this->txtSpouseWorkPhone->Text);
				$objPhone->Save();

				if (!$this->mctSpouse->Person->PrimaryPhone) $this->mctSpouse->Person->PrimaryPhone = $objPhone;
			}
		}

		protected function AddToChurchEmailList() {
			if($this->chkAddToNewsletter->Checked) {
				// First create a CommunicationListEntry for the person
				$objCommunicationListEntry = CommunicationListEntry::LoadByEmail($this->txtPersonEmail->Text);

				// Then add person to the church newsletter list
				$objList = CommunicationList::LoadByToken('allchurch_nl'); // NOTE: this is the hard coded token of the congregational newsletter.
				if ($objList){
					if(!$objList->IsPersonAssociated($this->mctPerson->Person)) {
						if ($objCommunicationListEntry) {
							if(!$objList->IsCommunicationListEntryAssociated($objCommunicationListEntry)) {
								// unassociate the communications entry if it exists because we'll associate the person directly instead.
								$objList->UnassociateCommunicationListEntry($objCommunicationListEntry); 
							}
						}
						$objList->AssociatePerson($this->mctPerson->Person);
					}
				}
			}
		}
		
		protected function btnCancel_Click() {
			$this->RedirectBack(false);
		}

		/**
		* Create and setup QDateTimePicker $calAttributeDateAcceptedChrist
		* @return QDateTimePicker
		*/
		protected function calDateAcceptedChrist_Create() {
				$this->calAttributeDateAcceptedChrist = new QCalendar($this->calAttributeDateAcceptedChrist, $this->calAttributeDateAcceptedChrist);
				$this->calAttributeDateAcceptedChrist->RemoveAllActions(QClickEvent::EventName);
				return $this->calAttributeDateAcceptedChrist;
			
		}
		
		protected function RedirectBack($blnSave = false) {
			// From StewradshipSelectPersonDialogBox.class.php:
			//
			// New.php should take the StackId as the first PathInfo
			// PathInfo(1) should be either "new", "check", or the Id of the Contribution
			// PathInfo(2) should be the check hash (if applicable)
			if ((null != QApplication::PathInfo(0))&& (null != QApplication::PathInfo(1))) {
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