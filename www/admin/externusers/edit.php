<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminUsersForm extends ChmsForm {
		protected $strPageTitle = 'Administration - Manage External Users - ';
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $objLogin;

		protected $lblUsername;
		protected $btnChangePassword;
		protected $pnlPassword;
		protected $strPassword;
		protected $strConfirmPassword;
		protected $lblMessage;
		protected $btnSetPassword;
		protected $lblEmail;
		protected $lblMinistries;

		protected $lblRoleType;
		protected $lblDomainActive;
		protected $rblLoginActive;
		protected $lblDateLastLogin;

		protected $rblMinistryArray = array();
		protected $rblPermissionArray = array();
		
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
			
			foreach (PermissionType::$NameArray as $intId => $strName) {
				$rblPermission = new QRadioButtonList($this);
				$rblPermission->Name = 'Can ' . $strName;
				$rblPermission->AddItem('Yes', $intId, ($this->objLogin->IsPermissionAllowed($intId)));
				$rblPermission->AddItem('No', 0, (!$this->objLogin->IsPermissionAllowed($intId)));
				$rblPermission->RepeatColumns = 2;
				$this->rblPermissionArray[] = $rblPermission;
			}
			
			$this->lblRoleType = new QLabel($this);
			$this->lblRoleType->Name = 'Role';
			$this->lblRoleType->Text = "Volunteer"; //not going to let this change to anything different
			
			$this->lblDomainActive = new QLabel($this);
			$this->lblDomainActive->Name = 'Domain Account Active';
			$this->lblDomainActive->Text = ($this->objLogin->DomainActiveFlag) ? 'Yes' : 'No';
				
			$this->rblLoginActive = new QRadioButtonList($this);
			$this->rblLoginActive->Name = 'ChMS Login Enabled';
			$this->rblLoginActive->AddItem('Yes', true, ($this->objLogin->LoginActiveFlag));
			$this->rblLoginActive->AddItem('No', false, (!$this->objLogin->LoginActiveFlag));
			$this->rblLoginActive->RepeatColumns = 2;

			$this->lblDateLastLogin = new QLabel($this);
			$this->lblDateLastLogin->Name = 'Date of Last ChMS Access';
			if ($this->objLogin->DateLastLogin) {
				$this->lblDateLastLogin->Text = $this->objLogin->DateLastLogin->ToString('MMMM D YYYY') . ' at ' . $this->objLogin->DateLastLogin->ToString('h:mmz');
			} else {
				$this->lblDateLastLogin->Text = 'None';
				$this->lblDateLastLogin->CssClass = 'na';
			}

			// Add controls and stuff for Editable pages
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Update';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CssClass = 'primary';

			$this->strPassword = new QTextBox($this);
			$this->strPassword->Name = "Reset Password";
			$this->strConfirmPassword = new QTextBox($this);
			$this->strConfirmPassword->Name = "Confirm Password";
			$this->lblMessage = new QLabel($this);
						
			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			$this->btnCancel->CssClass = 'cancel';
		}
		
		public function btnSave_Click() {
			if ($this->strPassword->Text == $this->strConfirmPassword->Text) {
				if (strlen(trim($this->strPassword->Text)) != 0) {
					$this->objLogin->SetPasswordCache($this->strPassword->Text);
				}
				$this->objLogin->LoginActiveFlag = $this->rblLoginActive->SelectedValue;
				
				$intBitmap = 0;
				foreach ($this->rblPermissionArray as $rblPermission) {
					$intBitmap = $intBitmap | $rblPermission->SelectedValue;
				}
				$this->objLogin->PermissionBitmap = $intBitmap;
				$this->objLogin->Save();
					
				// Update ministries associated
				$this->objLogin->UnassociateAllMinistries();
				foreach ($this->rblMinistryArray as $rblMinistry) {
					$objMinistry = Ministry::LoadById($rblMinistry->SelectedValue);
					if ($objMinistry) $objMinistry->AssociateLogin($this->objLogin);
				}
				QApplication::Redirect('/admin/externusers/');
			} else {
				$this->lblMessage->Text = 'Password and Confirm Password do not match';
				$this->lblMessage->FontBold = true;
				$this->strPassword->Blink();
				$this->strConfirmPassword->Blink();
				$this->strPassword->Focus();
			}
		}

		public function btnCancel_Click() {
			QApplication::Redirect('/admin/externusers/');
		}
	}

	AdminUsersForm::Run('AdminUsersForm');
?>