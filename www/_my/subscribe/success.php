<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class subscriptionSuccessForm extends ChmsForm  {
		protected $lblMessage;
		protected function Form_Create() {
			$this->lblMessage = new QLabel($this);
			$this->lblMessage->Text = 'You have successfully ' . QApplication::PathInfo(0)
				.' to the '. urldecode(QApplication::PathInfo(1)) . ' Email List';
		}
	}
	
	subscriptionSuccessForm::Run('subscriptionSuccessForm');
?>
