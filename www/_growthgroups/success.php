<?php
	require('../../includes/prepend.inc.php');

	class RegisterGGSuccessForm extends QForm {
		protected $btnReturn;
		
		protected function Form_Create() {
			$this->btnReturn = new QButton($this);
			$this->btnReturn->CssClass = 'primary';
			$this->btnReturn->Text = 'Return To Registration Page';
			$this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnReturn_Click'));
		}	
		
		public function btnReturn_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/register.php');
		}
	}
	
	RegisterGGSuccessForm::Run('RegisterGGSuccessForm');
?>