<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Administration - Main Menu';
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected function Form_Create() {
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>