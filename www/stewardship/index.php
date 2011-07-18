<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Main Menu';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected function Form_Create() {
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>