<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class GiveOnlineBase extends ChmsForm {
		protected $strPageTitle = 'Give Online';

		protected $btnSingleDonation;
		protected $btnRecurring;
		
		protected function Form_Run() {
			if (QApplication::$PublicLogin && !QApplication::$PublicLogin->Person) QApplication::PublicLogout(false);
		}

		protected function Form_Create() {
			$this->btnSingleDonation = new QButton($this);
			$this->btnSingleDonation->Name = 'Give a single donation online';
			$this->btnSingleDonation->Text= 'Give a single donation online';
			$this->btnSingleDonation->CssClass = 'primary';
			$this->btnSingleDonation->AddAction(new QClickEvent(), new QAjaxAction('btnSingleDonation_Click'));
			
			$this->btnRecurring = new QButton($this);
			$this->btnRecurring->Name = 'Edit/Create Recurring Payment';
			$this->btnRecurring->Text = 'Edit/Create Recurring Payment';
			$this->btnRecurring->CssClass = 'primary';
			$this->btnRecurring->AddAction(new QClickEvent(), new QAjaxAction('btnRecurring_Click'));				
		}
		
		public function btnSingleDonation_Click() {
			QApplication::Redirect('/give');
		}
		public function btnRecurring_Click() {
			QApplication::Redirect('/give/recurring.php');
		}
	}

	GiveOnlineBase::Run('GiveOnlineBase');
?>