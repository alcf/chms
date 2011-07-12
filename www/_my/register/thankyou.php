<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	class PublicRegistrationForm extends ChmsForm {
		protected $strPageTitle = 'Registration Confirmed';

		protected function Form_Create() {
		}
	}

	PublicRegistrationForm::Run('PublicRegistrationForm');
?>