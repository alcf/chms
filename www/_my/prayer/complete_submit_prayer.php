<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class CompleteSubmitPrayerForm extends ChmsForm {
		protected $strPageTitle = 'Submit a prayer request';
		protected $btnReturn;
		protected $lblStatus;

		protected function Form_Create() {	
			$this->lblStatus = new QLabel($this);
			$this->lblStatus->HtmlEntities = false;
			$this->lblStatus->Text  = "Your prayer request was successfully uploaded. You will be able to view it on the <a href='/prayer/view_prayer.php'>View non-confidential prayer requests'</a> page.";
			
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

	CompleteSubmitPrayerForm::Run('CompleteSubmitPrayerForm');
?>