<?php
	require('../../includes/prepend.inc.php');

	class RegisterGGForm extends QForm {
		protected $mcGroupRegistration;
		protected $objGroupRegistration;
		protected $txtFirstName;
		protected $txtLastName;
		protected $lstGender;
		protected $txtAddress;
		protected $txtCity;
		protected $txtZipCode;
		protected $txtComments;
		protected $txtPhoneNumber;
		protected $txtEmail;
		protected $lstSource;
		protected $chkDaysAvailable;
		protected $chkGroupType;
		protected $lstParticipationType;
		protected $lblMessage;
		protected $lstLocationFirst;
		protected $lstLocationSecond;
		protected $btnSubmit;
		protected $btnCancel;
		
		protected function Form_Create() {
			$this->objGroupRegistration = new GroupRegistrations();
			$this->mcGroupRegistration = new GroupRegistrationsMetaControl($this,$this->objGroupRegistration);
			
			$this->txtFirstName = $this->mcGroupRegistration->txtFirstName_Create();
			$this->txtFirstName->Select();
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtFirstName->Required = true;
			
			$this->txtLastName = $this->mcGroupRegistration->txtLastName_Create();
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtLastName->Required = true;
			
			$this->lstGender = new QListBox($this);
			$this->lstGender->Name = 'Gender';
			$this->lstGender->AddItem('- Select One -', null);
			$this->lstGender->AddItem('Female', 'F');
			$this->lstGender->AddItem('Male', 'M');
			
			$this->txtAddress = $this->mcGroupRegistration->txtAddress_Create();
			$this->txtAddress->Name = 'Address';
			$this->txtAddress->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtAddress->Required = true;
			
			$this->txtCity = $this->mcGroupRegistration->txtCity_Create();
			$this->txtCity->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtCity->Required = true;
			
			$this->txtZipCode = $this->mcGroupRegistration->txtZipcode_Create();
			$this->txtZipCode->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtZipCode->Required = true;
			
			$this->txtPhoneNumber = $this->mcGroupRegistration->txtPhone_Create();
			$this->txtPhoneNumber->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtPhoneNumber->Required = true;
			
			$this->txtEmail = $this->mcGroupRegistration->txtEmail_Create();
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtEmail->Required = true;
			
			$this->txtComments = $this->mcGroupRegistration->txtComments_Create();
			$this->txtComments->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			
			$this->lstSource = new QListBox($this);
			$this->lstSource->Name = 'How did you hear about us? ';	
			$this->lstSource->Width = 250;
			$this->lstSource->AddItem('Choose...',0);
			foreach(SourceList::LoadAll() as $objSourceList){
				$this->lstSource->AddItem($objSourceList->Name, $objSourceList->Id);
			}
			
			$this->lstParticipationType = new QListBox($this);	
			$this->lstParticipationType->Name = 'What would you like to be?';
			$objRoleArray = Ministry::Load(17)->GetGroupRoleArray(QQ::OrderBy(QQN::GroupRole()->Name));
			$this->lstParticipationType->AddItem('-Select One-');
			foreach($objRoleArray as $objRole) {
				if($objRole->Name != 'Visitor')
					$this->lstParticipationType->AddItem($objRole->Name, $objRole->Id);
			}
			$this->lstParticipationType->AddAction(new QChangeEvent(), new QAjaxAction('lstParticipationType_Change'));
			$this->lblMessage = new QLabel($this);
			$this->lblMessage->Text = '';
			$this->lblMessage->ForeColor = 'red';
			$this->lblMessage->HtmlEntities = false;
			
			$this->chkDaysAvailable = array();
			foreach(GrowthGroupDayType::$NameArray as $key=>$value) {
				$objChkDay = new QCheckBox($this);
				$objChkDay->Text = $value;
				$objChkDay->Name = $key;
				$this->chkDaysAvailable[] = $objChkDay;
			}
			
			$this->chkGroupType = array();
			$objCondition = QQ::All();
			$objGrowthGroupStructureCursor = GrowthGroupStructure::QueryCursor($objCondition);		
			while ($objGrowthGroupStructure = GrowthGroupStructure::InstantiateCursor($objGrowthGroupStructureCursor)) {
				$objListItem = new QCheckBox($this);
				$objListItem->Text = $objGrowthGroupStructure->__toString();
				$objListItem->Name = $objGrowthGroupStructure->Id;
				$this->chkGroupType[] = $objListItem;
			}
			
			$this->lstLocationFirst = new QListBox($this);
			$this->lstLocationFirst->Name = 'First Preference';
			$this->lstLocationFirst->AddItem('Campbell');
			$this->lstLocationFirst->AddItem('Clayton');
			$this->lstLocationFirst->AddItem('Cupertino');
			$this->lstLocationFirst->AddItem('East Palo Alto');
			$this->lstLocationFirst->AddItem('Foster City');
			$this->lstLocationFirst->AddItem('Fremont');
			$this->lstLocationFirst->AddItem('Los Altos');
			$this->lstLocationFirst->AddItem('Menlo Park');
			$this->lstLocationFirst->AddItem('Milpitas');
			$this->lstLocationFirst->AddItem('Mountain View');
			$this->lstLocationFirst->AddItem('Newark ');
			$this->lstLocationFirst->AddItem('Oakland');
			$this->lstLocationFirst->AddItem('Palo Alto');
			$this->lstLocationFirst->AddItem('Pleasanton');
			$this->lstLocationFirst->AddItem('Redwood City');
			$this->lstLocationFirst->AddItem('San Bruno');
			$this->lstLocationFirst->AddItem('San Carlos');
			$this->lstLocationFirst->AddItem('San Francisco');
			$this->lstLocationFirst->AddItem('San Jose');
			$this->lstLocationFirst->AddItem('San Mateo');
			$this->lstLocationFirst->AddItem('Santa Clara');
			$this->lstLocationFirst->AddItem('South San Francisco');
			$this->lstLocationFirst->AddItem('South San Jose');
			$this->lstLocationFirst->AddItem('Sunnyvale');			
			$this->lstLocationFirst->AddItem('Tracy');
			
			
			$this->lstLocationSecond = new QListBox($this);
			$this->lstLocationSecond->Name = 'Second Preference';
			$this->lstLocationSecond->AddItem('Campbell');
			$this->lstLocationSecond->AddItem('Clayton');
			$this->lstLocationSecond->AddItem('Cupertino');
			$this->lstLocationSecond->AddItem('East Palo Alto');
			$this->lstLocationSecond->AddItem('Foster City');
			$this->lstLocationSecond->AddItem('Fremont');
			$this->lstLocationSecond->AddItem('Los Altos');
			$this->lstLocationSecond->AddItem('Menlo Park');
			$this->lstLocationSecond->AddItem('Milpitas');
			$this->lstLocationSecond->AddItem('Mountain View');
			$this->lstLocationSecond->AddItem('Newark ');
			$this->lstLocationSecond->AddItem('Oakland');
			$this->lstLocationSecond->AddItem('Palo Alto');
			$this->lstLocationSecond->AddItem('Pleasanton');
			$this->lstLocationSecond->AddItem('Redwood City');
			$this->lstLocationSecond->AddItem('San Bruno');
			$this->lstLocationSecond->AddItem('San Carlos');
			$this->lstLocationSecond->AddItem('San Francisco');
			$this->lstLocationSecond->AddItem('San Jose');
			$this->lstLocationSecond->AddItem('San Mateo');
			$this->lstLocationSecond->AddItem('Santa Clara');
			$this->lstLocationSecond->AddItem('South San Francisco');
			$this->lstLocationSecond->AddItem('South San Jose');
			$this->lstLocationSecond->AddItem('Sunnyvale');
			$this->lstLocationSecond->AddItem('Tracy');
			
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Name = 'Submit';
			$this->btnSubmit->Text = 'Submit';
			$this->btnSubmit->CssClass = 'primary';
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Name = 'Cancel';
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'primary';
		}	
		
		public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
			$this->objGroupRegistration->DateReceived = new QDateTime(QDateTime::Now);
			$this->objGroupRegistration->FirstName = $this->txtFirstName->Text;
			$this->objGroupRegistration->LastName = $this->txtLastName->Text;
			$this->objGroupRegistration->Address = $this->txtAddress->Text;
			$this->objGroupRegistration->City = $this->txtCity->Text;
			$this->objGroupRegistration->Zipcode = $this->txtZipCode->Text;
			$this->objGroupRegistration->Email = $this->txtEmail->Text;
			$this->objGroupRegistration->Phone = $this->txtPhoneNumber->Text;	
			$this->objGroupRegistration->Comments = $this->txtComments->Text;	
				
			foreach(SourceList::LoadAll() as $objSourceList) {
				if ($objSourceList->Name == $this->lstSource->SelectedName) {
					$this->objGroupRegistration->SourceListId = $objSourceList->Id;
					break;
				}
			}
			$this->objGroupRegistration->Gender = $this->lstGender->SelectedName;
			
			$this->objGroupRegistration->GroupRoleId = $this->lstParticipationType->SelectedValue;
			$strDays = '';
			foreach($this->chkDaysAvailable as $chkDays) {
				if($chkDays->Checked) {
					$strDays .= $chkDays->Text . ', ';
				}
			}
			$strDays = substr($strDays, 0,strlen($strDays)-1);
			$this->objGroupRegistration->GroupDay = $strDays;
			$this->objGroupRegistration->PreferredLocation1 = $this->lstLocationFirst->SelectedName;
			$this->objGroupRegistration->PreferredLocation2 = $this->lstLocationSecond->SelectedName;
			$this->objGroupRegistration->Save();
			foreach($this->chkGroupType as $chkGroup) {
				if($chkGroup->Checked) {
					$this->objGroupRegistration->AssociateGrowthGroupStructureAsGroupstructure(GrowthGroupStructure::Load($chkGroup->Name));
				}
			}
			// Send Facilitator Application if user selected to be a Facilitator
			if($this->lstParticipationType->SelectedName == 'Facilitator') {
				$this->SendMessage();
			}
			QApplication::Redirect('/success.php');
		}
		
		public function lstParticipationType_Change($strFormId, $strControlId, $strParameter) {
			if($this->lstParticipationType->SelectedName == 'Host') {
				$this->lblMessage->Text = 'Note: You must be an ALCF Member to host a Growth Group.';
			}
			if($this->lstParticipationType->SelectedName == 'Facilitator') {
				$this->lblMessage->Text = 'Note: You must be an ALCF Member to facilitate a Growth Group.';
				$this->lblMessage->Text .= '<br>You must also fill out a Growth Groups Ministry Facilitation Application which will be sent to you shortly after submitting this Registration Form.';
			}
			if(($this->lstParticipationType->SelectedName == 'Participant') ||
			   ($this->lstParticipationType->SelectedName == 'Visitor')) {
				$this->lblMessage->Text = '';
			}
		}
		
		public function SendMessage() {			
			// Set debug mode
			//QEmailServer::$TestMode = true;
			//QEmailServer::$TestModeDirectory = __DOCROOT__ . '/../file_assets/emails';
		
			QEmailServer::$SmtpServer = SMTP_SERVER;
		
			// Create a new message
			// Note that you can list multiple addresses and that Qcodo supports Bcc and Cc
			$objMessage = new QEmailMessage();
			$objMessage->From = 'Andrea Alo <andrea.alo@alcf.net>';
			$objMessage->To = $this->objGroupRegistration->Email;
			$objMessage->Bcc = 'andrea.alo@alcf.net';
			$objMessage->Subject = 'Invitation to Growth Groups';
		
			// Setup Plaintext Message
			$strBody = "Hello ".$this->objGroupRegistration->FirstName ."!\r\n\r\n";
			$strBody .= 'We are very excited that you are interested in facilitating a Growth Group! \r\nAttached is a '.
			'facilitator application we ask all potential facilitators (for either curriculum) to complete. \r\n'.
			'Please fill it out and send it back to me via email (andrea.alo@alcf.net). \r\nYou may also fax '.
			'it to the church office at 650-625-1501 or drop it off in the All Forms Box at the worship '.
			'center. \r\nOnce we receive your application, Pastor John will follow up with you for a short '.
			'interview.\r\n';			
			$strBody .= 'If you have any questions or concerns please feel free to contact me.\r\n\r\n';			
			$strBody .= 'Blessings,\r\n Andrea';		
			$objMessage->Body = $strBody;
		
			// Also setup HTML message (optional)
			$strBody = "Hello ".$this->objGroupRegistration->FirstName ."!<br><br>";
			$strBody .= 'We are very excited that you are interested in facilitating a Growth Group! <br>Attached is a '.
			'facilitator application we ask all potential facilitators (for either curriculum) to complete. <br>'.
			'Please fill it out and send it back to me via email (andrea.alo@alcf.net). <br>You may also fax '.
			'it to the church office at 650-625-1501 or drop it off in the All Forms Box at the worship '.
			'center. <br>Once we receive your application, Pastor John will follow up with you for a short '.
			'interview.<br><br>';			
			$strBody .= 'If you have any questions or concerns please feel free to contact me.<br><br>';			
			$strBody .= 'Blessings,<br> Andrea';	
			$objMessage->HtmlBody = $strBody;
		
			// Add the attachment
			$objFile = new QEmailAttachment( __DOCROOT__ . '/../file_assets/FacilitatorApplication.doc');
			$objMessage->AddAttachment($objFile);
			
			// Add random/custom email headers
			$objMessage->SetHeader('x-application', 'Growth Groups Ministry');
			QEmailServer::Send($objMessage);
		}
	}
	
	RegisterGGForm::Run('RegisterGGForm');
?>