<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class CompleteSubmitPraiseForm extends ChmsForm {
		protected $strPageTitle = 'Submit a praise and thanks';
		protected $btnReturn;
		protected $lblStatus;

		protected function Form_Create() {	
			$this->lblStatus = new QLabel($this);
			$this->lblStatus->HtmlEntities = false;
			$this->lblStatus->Text  = "Your praise and thanks testimony was successfully uploaded. You will be able to view it on the <a href='/prayer/view_praises.php'>Praises and Thanks'</a> page.";
			
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

	CompleteSubmitPraiseForm::Run('CompleteSubmitPraiseForm');
?>