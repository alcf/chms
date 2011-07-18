<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	class PaymentSignupQForm extends ChmsForm {
		protected $strPageTitle = 'Giving Receipt';

		protected function Form_Create() {
		}
	}

	PaymentSignupQForm::Run('PaymentSignupQForm');
?>