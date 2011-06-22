<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	class PublicMainForm extends ChmsForm {
		protected $strPageTitle = 'Main Menu';

		protected function Form_Create() {
		}

		protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {
		}
	}

	PublicMainForm::Run('PublicMainForm');
?>