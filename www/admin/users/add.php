<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminAddUsersForm extends ChmsForm {
		protected $strPageTitle = 'Administration - Manage Users - Add New ChMS User';
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $objLogin;

		protected $txtUsername;
		protected $txtEmail;

		protected $lstRoleType;
		protected $rblDomainActive;
		protected $rblLoginActive;

		protected $rblPermissionArray = array();
		protected $rblMinistryArray = array();

		protected $txtNewPassword;
		protected $txtConfirmPassword;
		protected $btnSave;
		protected $btnCancel;

		protected function Form_Create() {		
			// Display: Username
			$this->txtUsername = new QTextBox($this);
			$this->txtUsername->Name = 'Username';

			// Display: Email
			$this->txtEmail = new QTextBox($this);
			$this->txtEmail->Name = 'Email';
									
			foreach (Ministry::LoadAll(QQ::OrderBy(QQN::Ministry()->Name)) as $objMinistry) {
				$rblMinistry = new QRadioButtonList($this);
				$rblMinistry->Name = $objMinistry->Name;				
				$rblMinistry->AddItem('Yes', $objMinistry->Id, false);
				$rblMinistry->AddItem('No', 0, true);
				$rblMinistry->RepeatColumns = 2;
				$this->rblMinistryArray[] = $rblMinistry;
			}
			
			$this->lstRoleType = new QListBox($this);
			$this->lstRoleType->Name = 'Role';
			foreach (RoleType::$NameArray as $intKey=>$strName)
				$this->lstRoleType->AddItem($strName, $intKey, false);
				
			$this->rblLoginActive = new QRadioButtonList($this);
			$this->rblLoginActive->Name = 'ChMS Login Enabled';
			$this->rblLoginActive->AddItem('Yes', true, true);
			$this->rblLoginActive->AddItem('No', false, false);
			$this->rblLoginActive->RepeatColumns = 2;

			foreach (PermissionType::$NameArray as $intId => $strName) {
				$rblPermission = new QRadioButtonList($this);
				$rblPermission->Name = 'Can ' . $strName;
				$rblPermission->AddItem('Yes', $intId, false);
				$rblPermission->AddItem('No', 0, true);
				$rblPermission->RepeatColumns = 2;
				$this->rblPermissionArray[] = $rblPermission;
			}

			$this->txtNewPassword = new QTextBox($this);
			$this->txtNewPassword->Name = 'Set Password: ';
			$this->txtNewPassword->TextMode = QTextMode::Password;
			
			$this->txtConfirmPassword = new QTextBox($this);
			$this->txtConfirmPassword->Name = "Confirm Password";
			$this->txtConfirmPassword->TextMode = QTextMode::Password;

			// Add controls and stuff for Editable pages
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Update';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CssClass = 'primary';

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnCancel->CssClass = 'cancel';
		}

		public function btnSave_Click() {
			$this->objLogin = new Login();
			$this->objLogin->Username = $this->txtUsername->Text;
			
			$this->objLogin->LoginActiveFlag = $this->rblLoginActive->SelectedValue;
			$this->objLogin->DomainActiveFlag = true;
			$this->objLogin->RoleTypeId = $this->lstRoleType->SelectedValue;
			$this->objLogin->Save();
			
			$this->objLogin->Email = $this->txtEmail->Text;
			$intBitmap = 0;
			foreach ($this->rblPermissionArray as $rblPermission) {
				$intBitmap = $intBitmap | $rblPermission->SelectedValue;
			}
			// Update ministries associated
			foreach ($this->rblMinistryArray as $rblMinistry) {
				$objMinistry = Ministry::LoadById($rblMinistry->SelectedValue);
				if ($objMinistry) $objMinistry->AssociateLogin($this->objLogin);
			}
			
			$this->objLogin->PermissionBitmap = $intBitmap;
			
			if ($this->txtNewPassword->Text == $this->txtConfirmPassword->Text) {
				if (strlen(trim($this->txtNewPassword->Text)) != 0) {
					$this->objLogin->SetPasswordCache($this->txtNewPassword->Text);
				}
			}
			$this->objLogin->Save();
			QApplication::Redirect('/admin/users/');
		}

		public function btnCancel_Click() {
			QApplication::Redirect('/admin/users/');
		}
	}

	AdminAddUsersForm::Run('AdminAddUsersForm');
?>