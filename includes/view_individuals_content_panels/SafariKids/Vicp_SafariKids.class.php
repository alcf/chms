<?php
	class Vicp_SafariKids extends Vicp_Base {
		public $btnToggle;
		public $btnRemove;
		public $btnResetPassword;

		protected function SetupPanel() {
			$this->btnToggle = new QLinkButton($this);
			$this->btnToggle->Text = 'Toggle';
			$this->btnToggle->CssClass = 'cancel';
			
			$this->btnToggle->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to toggle this person\'s login status?'));
			$this->btnToggle->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnToggle_Click'));
			$this->btnToggle->AddAction(new QClickEvent(), new QTerminateAction());

			if ($this->objPerson->PublicLogin && (QApplication::IsLoginHasPermission(PermissionType::ManageOnlineAccounts))) {
				$this->btnRemove = new QLinkButton($this);
				$this->btnRemove->CssClass = 'delete';
				$this->btnRemove->Text = 'Remove Account';
				$this->btnRemove->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to PERMAMENTLY REMOVE THIS PERSON\'S ACCOUNT?!?!  Only do this if you ABSOULTELY KNOW what you are doing.'));
				$this->btnRemove->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnRemove_Click'));
				$this->btnRemove->AddAction(new QClickEvent(), new QTerminateAction());
				
				$this->btnResetPassword = new QLinkButton($this);
				$this->btnResetPassword->CssClass = 'cancel';
				$this->btnResetPassword->Text = 'Reset Password';
				$this->btnResetPassword->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to RESET this user\'s password?  Only do this if the person has specifically requested you to do so.'));
				$this->btnResetPassword->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnResetPassword_Click'));
				$this->btnResetPassword->AddAction(new QClickEvent(), new QTerminateAction());
			}
		}
		
		public function btnToggle_Click() {
			$this->objPerson->PublicLogin->ActiveFlag = !$this->objPerson->PublicLogin->ActiveFlag;
			$this->objPerson->PublicLogin->Save();
			$this->Refresh();
		}

		public function btnRemove_Click() {
			$this->objPerson->PublicLogin->Delete();
			$this->objPerson->PublicLogin = null;
			$this->Refresh();
			$this->RemoveChildControl($this->btnRemove->ControlId, true);
			$this->btnRemove = null;
		}

		public function btnResetPassword_Click() {
			$strPassword = $this->objPerson->PublicLogin->ResetPassword();
			QApplication::DisplayAlert('The password has been reset.  This user now has a temporary password of: ' . $strPassword);
		}
	}
?>