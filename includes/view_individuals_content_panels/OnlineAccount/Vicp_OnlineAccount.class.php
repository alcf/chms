<?php
	class Vicp_OnlineAccount extends Vicp_Base {
		public $btnToggle;
		public $btnRemove;

		protected function SetupPanel() {
			$this->btnToggle = new QLinkButton($this);
			$this->btnToggle->Text = 'Toggle';
			$this->btnToggle->CssClass = 'cancel';
			
			$this->btnToggle->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to toggle this person\'s login status?'));
			$this->btnToggle->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnToggle_Click'));
			$this->btnToggle->AddAction(new QClickEvent(), new QTerminateAction());

			if ($this->objPerson->PublicLogin && (QApplication::$Login->RoleTypeId == RoleType::ChMSAdministrator)) {
				$this->btnRemove = new QButton($this);
				$this->btnRemove->CssClass = 'primary';
				$this->btnRemove->Text = 'Remove Account';
				$this->btnRemove->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to PERMAMENTLY REMOVE THIS PERSON\'S ACCOUNT?!?!  Only do this if you ABSOULTELY KNOW what you are doing.'));
				$this->btnRemove->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnRemove_Click'));
				$this->btnRemove->AddAction(new QClickEvent(), new QTerminateAction());
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
	}
?>