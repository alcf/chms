<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class CompleteConfidentialPrayerForm extends ChmsForm {
		protected $strPageTitle = 'Submit a confidential prayer request';
		protected $btnReturn;
		protected $lblStatus;

		protected function Form_Create() {	
			$this->lblStatus = new QLabel($this);
			$this->lblStatus->HtmlEntities = false;
			$this->lblStatus->Text  = "Your confidential prayer request was successfully uploaded and the PRayer Team notified.";
			
			$this->btnReturn = new QButton($this);
			$this->btnReturn->Text = 'Return to Prayer Room';
			$this->btnReturn->CausesValidation = true;
			$this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnReturn_Click'));

		}
		
		protected function btnReturn_Click($strFormId, $strControlId, $strParameter) {			
			// return to prayer page
			QApplication::Redirect('/prayer/');
		}
		
	}

	CompleteConfidentialPrayerForm::Run('CompleteConfidentialPrayerForm');
?>