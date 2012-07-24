<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ReportsListForm extends ChmsForm {
		protected $strPageTitle = 'Generate Reports';
		protected $intNavSectionId = ChmsForm::NavSectionPeople;
		
		
		protected function Form_Create() {	
		}
		
	}
	
	ReportsListForm::Run('ReportsListForm');
	?>