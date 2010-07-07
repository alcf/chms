<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class MainForm extends ChmsForm {
		protected $strPageTitle = 'Main Menu';
		protected $intNavSectionId = null;

		protected function Form_Create() {
		}
	}

	MainForm::Run('MainForm');
?>