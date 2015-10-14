<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminUsersForm extends ChmsForm {
		protected $strPageTitle = 'Administration - Manage Users - ';
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $objLogin;

		protected $lblUsername;
		protected $lblEmail;
		protected $lblMinistries;

		protected $lstRoleType;
		protected $lblDomainActive;
		protected $rblLoginActive;
		protected $lblDateLastLogin;

		protected $rblPermissionArray = array();
		protected $rblMinistryArray = array();

		protected $txtNewPassword;
		protected $txtConfirmPassword;
		protected $btnSave;
		protected $btnCancel;

		protected function Form_Create() {
			// Load and validate the Staff Person we're trying to view
			$this->objLogin = Login::Load(QApplication::PathInfo(0));
			if (!$this->objLogin) QApplication::Redirect('/admin/users');
			$this->strPageTitle .= $this->objLogin->Name;

			// Display: Username
			$this->lblUsername = new QLabel($this);
			$this->lblUsername->Name = 'Username';
			$this->lblUsername->Text = $this->objLogin->Username;

			// Display: Email
			$this->lblEmail = new QLabel($this);
			$this->lblEmail->Name = 'Email';
			if ($this->objLogin->Email)
				$this->lblEmail->Text = $this->objLogin->Email;
			else {
				$this->lblEmail->Text = 'none';
				$this->lblEmail->CssClass = 'na';
			}
									
			// Display Ministry Involvement Information
			$this->lblMinistries = new QLabel($this);
			$this->lblMinistries->Name = 'Ministry Involvement';
			$strArray = array();
			foreach ($this->objLogin->GetMinistryArray() as $objMinistry) $strArray[] = QApplication::HtmlEntities($objMinistry->Name);
			$this->lblMinistries->Text = implode(' &nbsp;&bull;&nbsp; ', $strArray);
			if (!$this->lblMinistries->Text) {
				$this->lblMinistries->CssClass = 'na';
				$this->lblMinistries->Text = 'n/a';
			}
			$this->lblMinistries->HtmlEntities = false;

			foreach (Ministry::LoadAll(QQ::OrderBy(QQN::Ministry()->Name)) as $objMinistry) {
				$rblMinistry = new QRadioButtonList($this);
				$rblMinistry->Name = $objMinistry->Name;
				if (in_array($objMinistry->Name,$strArray)) {
					$rblMinistry->AddItem('Yes',$objMinistry->Id,true);
					$rblMinistry->AddItem('No', 0, false);
				} else {
					$rblMinistry->AddItem('Yes', $objMinistry->Id, false);
					$rblMinistry->AddItem('No', 0, true);
				}
				$rblMinistry->RepeatColumns = 2;
				$this->rblMinistryArray[] = $rblMinistry;
			}
			
			$this->lstRoleType = new QListBox($this);
			$this->lstRoleType->Name = 'Role';
			foreach (RoleType::$NameArray as $intKey=>$strName)
				$this->lstRoleType->AddItem($strName, $intKey, $this->objLogin->RoleTypeId == $intKey);

			$this->lblDomainActive = new QLabel($this);
			$this->lblDomainActive->Name = 'Domain Account Active';
			$this->lblDomainActive->Text = ($this->objLogin->DomainActiveFlag) ? 'Yes' : 'No';
				
			$this->rblLoginActive = new QRadioButtonList($this);
			$this->rblLoginActive->Name = 'ChMS Login Enabled';
			$this->rblLoginActive->AddItem('Yes', true, ($this->objLogin->LoginActiveFlag));
			$this->rblLoginActive->AddItem('No', false, (!$this->objLogin->LoginActiveFlag));
			$this->rblLoginActive->RepeatColumns = 2;

			foreach (PermissionType::$NameArray as $intId => $strName) {
				$rblPermission = new QRadioButtonList($this);
				$rblPermission->Name = 'Can ' . $strName;
				$rblPermission->AddItem('Yes', $intId, ($this->objLogin->IsPermissionAllowed($intId)));
				$rblPermission->AddItem('No', 0, (!$this->objLogin->IsPermissionAllowed($intId)));
				$rblPermission->RepeatColumns = 2;
				$this->rblPermissionArray[] = $rblPermission;
			}

			$this->lblDateLastLogin = new QLabel($this);
			$this->lblDateLastLogin->Name = 'Date of Last ChMS Access';
			if ($this->objLogin->DateLastLogin) {
				$this->lblDateLastLogin->Text = $this->objLogin->DateLastLogin->ToString('MMMM D YYYY') . ' at ' . $this->objLogin->DateLastLogin->ToString('h:mmz');
			} else {
				$this->lblDateLastLogin->Text = 'None';
				$this->lblDateLastLogin->CssClass = 'na';
			}

			$this->txtNewPassword = new QTextBox($this);
			$this->txtNewPassword->Name = 'Reset Password to: ';
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
			$this->objLogin->LoginActiveFlag = $this->rblLoginActive->SelectedValue;
			$this->objLogin->RoleTypeId = $this->lstRoleType->SelectedValue;
			$intBitmap = 0;
			foreach ($this->rblPermissionArray as $rblPermission) {
				$intBitmap = $intBitmap | $rblPermission->SelectedValue;
			}
			// Update ministries associated
			$this->objLogin->UnassociateAllMinistries();
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

	AdminUsersForm::Run('AdminUsersForm');
?>