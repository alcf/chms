<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class StewardshipFundEditForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - ';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $mctFund;
		protected $txtName;
		protected $txtExternalName;
		protected $txtAccountNumber;
		protected $txtFundNumber;
		protected $chkActiveFlag;
		protected $chkExternalFlag;
		
		protected $btnSave;
		protected $btnCancel;

		protected function Form_Create() {
			$this->mctFund = StewardshipFundMetaControl::CreateFromPathInfo($this);

			$this->txtName = $this->mctFund->txtName_Create();
			$this->txtName->Required = true;
			$this->txtExternalName = $this->mctFund->txtExternalName_Create();
			$this->txtAccountNumber = $this->mctFund->txtAccountNumber_Create();
			$this->txtFundNumber = $this->mctFund->txtFundNumber_Create();
			$this->chkActiveFlag = $this->mctFund->chkActiveFlag_Create();
			$this->chkExternalFlag = $this->mctFund->chkExternalFlag_Create();
			
			$this->btnSave = new QButton($this);
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->Text = ($this->mctFund->EditMode ? 'Update' : 'Create');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}
		
		public function Form_Validate() {
			if ($this->chkExternalFlag->Checked && !strlen(trim($this->txtExternalName->Text))) {
				$this->txtExternalName->Warning = 'Required';
				$this->txtExternalName->Blink();
				return false;
			}
			return true;
		}

		public function btnSave_Click() {
			$this->mctFund->SaveStewardshipFund();
			QApplication::Redirect('/stewardship/funds');
		}

		public function btnCancel_Click() {
			QApplication::Redirect('/stewardship/funds');
		}
	}

	StewardshipFundEditForm::Run('StewardshipFundEditForm');
?>