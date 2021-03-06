<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class subscriptionSuccessForm extends ChmsForm  {
		protected $lblMessage;
		protected $btnReturnToSubscribe;
		
		protected function Form_Create() {
			$this->lblMessage = new QLabel($this);
			$this->lblMessage->Text = 'You have successfully ' . QApplication::PathInfo(0)
				.' to the '. strtoupper( urldecode(QApplication::PathInfo(1))) . ' email list/s';
			$this->btnReturnToSubscribe = new QButton($this);
			$this->btnReturnToSubscribe->Text = 'Subscribe to additional Mailing Lists';
			$this->btnReturnToSubscribe->CssClass = 'primary';
			$this->btnReturnToSubscribe->CausesValidation = false;
			$this->btnReturnToSubscribe->AddAction(new QClickEvent(), new QAjaxAction('btnReturnToSubscribe_Click', null, true));
						
		}
		
		protected function btnReturnToSubscribe_Click() {
			QApplication::Redirect('/subscribe/index.php');
		}
	}
	
	subscriptionSuccessForm::Run('subscriptionSuccessForm');
?>
