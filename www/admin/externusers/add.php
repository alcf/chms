<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminAddExternUserForm extends ChmsForm {
		protected $strPageTitle = 'Administration - Add External User';
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $strFirstName;
		protected $strLastName;
		protected $strEmail;
		protected $strUserName;
		protected $strPassword;
		protected $lstActiveFlag;
		protected $btnSubmit;
		protected $btnCancel;
		
		protected $rblMinistryArray = array();

		protected function Form_Create() {
			$this->strFirstName = new QTextBox($this);
			$this->strFirstName->Name = "First Name: ";
			
			$this->strLastName = new QTextBox($this);
			$this->strLastName->Name = "Last Name: ";
			
			$this->strEmail = new QEmailTextBox($this);
			$this->strEmail->Name = "Email: ";
			
			$this->strUserName = new QTextBox($this);
			$this->strUserName->Name = "User Name: ";
			$this->strUserName->Required = true;
			
			$this->strPassword = new QTextBox($this);
			$this->strPassword->Name = 'Password';
			$this->strPassword->TextMode = QTextMode::Password;
			$this->strPassword->Required = true;
			$this->strPassword->CausesValidation = true;
			
			$this->lstActiveFlag = new QListBox($this);
			$this->lstActiveFlag->Name = 'Active';
			$this->lstActiveFlag->AddItem('Active', true, true);
			$this->lstActiveFlag->AddItem('Inactive', false);

			foreach (Ministry::LoadAll(QQ::OrderBy(QQN::Ministry()->Name)) as $objMinistry) {
				$rblMinistry = new QRadioButtonList($this);
				$rblMinistry->Name = $objMinistry->Name;
				$rblMinistry->AddItem('Yes', $objMinistry->Id, false);
				$rblMinistry->AddItem('No', 0, true);
				$rblMinistry->RepeatColumns = 2;
				$this->rblMinistryArray[] = $rblMinistry;
			}
			
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = "Submit";
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = "Cancel";
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
		}

		public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
			// Create a login object with the information
			$objLogin = new Login();
			
			$objLogin->FirstName = $this->strFirstName->Text;
			$objLogin->LastName = $this->strLastName->Text;
			
			$objLogin->Username = $this->strUserName->Text;
			$objLogin->RoleTypeId = RoleType::Volunteer;
			$objLogin->Email = $this->strEmail->Text;
			$objLogin->SetPasswordCache($this->strPassword->Text);
			$objLogin->LoginActiveFlag = $this->lstActiveFlag->SelectedValue;
			$objLogin->DomainActiveFlag = false;
					
			$objLogin->Save();
			
			// Update ministries associated
			$objLogin->UnassociateAllMinistries();
			foreach ($this->rblMinistryArray as $rblMinistry) {
				$objMinistry = Ministry::LoadById($rblMinistry->SelectedValue);
				if ($objMinistry) $objMinistry->AssociateLogin($objLogin);
			}
			QApplication::Redirect('/admin/externusers/');
		}
		
		public function btnCancel_Click() {
			QApplication::Redirect('/admin/externusers/');
		}
		
	}

	AdminAddExternUserForm::Run('AdminAddExternUserForm');
?>