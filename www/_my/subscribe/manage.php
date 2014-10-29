<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class manageSubscriptionForm extends ChmsForm  {
		protected $btnSubscribe;
		protected $btnUnsubscribe;
		
		protected function Form_Create() {
			$this->btnSubscribe = new QButton($this);
			$this->btnSubscribe->Name = 'Subscribe to Email Lists';
			$this->btnSubscribe->Text = 'Subscribe to Email Lists';
			$this->btnSubscribe->CssClass = 'primary';
			$this->btnSubscribe->Visible = true;
			$this->btnSubscribe->AddAction(new QClickEvent(), new QAjaxAction('btnSubscribe_Click'));
			
			$this->btnUnsubscribe = new QButton($this);
			$this->btnUnsubscribe->Name = 'Unsubscribe from Email Lists';
			$this->btnUnsubscribe->Text = 'Unsubscribe from Email Lists';
			$this->btnUnsubscribe->CssClass = 'primary';
			$this->btnUnsubscribe->Visible = true;
			$this->btnUnsubscribe->AddAction(new QClickEvent(), new QAjaxAction('btnUnsubscribe_Click'));
				
		}		
		
		protected function btnSubscribe_Click() {
			QApplication::Redirect('/subscribe/');
		}
		
		protected function btnunSubscribe_Click() {
			QApplication::Redirect('/unsubscribe/');
		}
	}
	
	manageSubscriptionForm::Run('manageSubscriptionForm');