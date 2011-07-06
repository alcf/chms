<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Pay Pal Reconciliation - Upload Batch Report';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $flcUpload;
		protected $btnSave;
		protected $btnCancel;
		
		protected function Form_Create() {
			$this->flcUpload = new QFileUploader($this);
			$this->flcUpload->Required = true;
			$this->flcUpload->Name = 'PayPal Text Report';

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Process';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function btnSave_Click() {
			
		}

		protected function btnCancel_Click() {
			QApplication::Redirect('/stewardship/paypal');
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>