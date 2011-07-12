<?php
	class Vicp_OnlineAccount extends Vicp_Base {
		public $btnToggle;
		protected function SetupPanel() {
			$this->btnToggle = new QLinkButton($this);
			$this->btnToggle->Text = 'Toggle';
			$this->btnToggle->CssClass = 'cancel';
			
			$this->btnToggle->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to toggle this person\'s login status?'));
			$this->btnToggle->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnToggle_Click'));
			$this->btnToggle->AddAction(new QClickEvent(), new QTerminateAction());
		}
		
		public function btnToggle_Click() {
			$this->objPerson->PublicLogin->ActiveFlag = !$this->objPerson->PublicLogin->ActiveFlag;
			$this->objPerson->PublicLogin->Save();
			$this->Refresh();
		}
	}
?>