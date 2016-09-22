<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class CompleteSendNoteForm extends ChmsForm {
		protected $strPageTitle = 'Send a note of encouragement';
		protected $btnReturn;
		protected $lblStatus;

		protected function Form_Create() {	
			$status = QApplication::PathInfo(0);			
			
			$this->lblStatus = new QLabel($this);
			if(($status != null) &&($status == 1)){
				$this->lblStatus->Text  = "Your note was successfully sent.";
			} else {
				$this->lblStatus->Text  = "Unfortunately we encountered an error and your note was not sent.";
			}
			$this->btnReturn = new QButton($this);
			$this->btnReturn->Text = 'Return to Prayer View';
			$this->btnReturn->CausesValidation = true;
			$this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnReturn_Click'));

		}
		
		protected function btnReturn_Click($strFormId, $strControlId, $strParameter) {			
			// return to prayer page
			QApplication::Redirect('/prayer/view_prayer.php');
		}
		
	}

	CompleteSendNoteForm::Run('CompleteSendNoteForm');
?>