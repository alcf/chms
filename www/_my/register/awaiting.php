<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class PublicRegistrationForm extends ChmsForm {
		protected $strPageTitle = 'Awaiting Email Confirmation';

		protected $objProvisionalPublicLogin;

		protected function Form_Run() {
			if (QApplication::$PublicLogin) QApplication::Redirect('/main/');
		}

		protected function Form_Create() {
			$this->objProvisionalPublicLogin = ProvisionalPublicLogin::Load(QApplication::PathInfo(0));
			if (!$this->objProvisionalPublicLogin ||
				($this->objProvisionalPublicLogin->UrlHash != QApplication::PathInfo(1))) {
				QApplication::Redirect('/register/');
			}
		}
	}

	PublicRegistrationForm::Run('PublicRegistrationForm');
?>