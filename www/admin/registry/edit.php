<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminEditAttributeForm extends ChmsForm {
		protected $strPageTitle = 'Administration - Edit System Preference';
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $mctRegistry;
		protected $lblName;
		protected $txtValue;

		protected $btnSave;
		protected $btnCancel;

		protected function Form_Create() {
			$this->mctRegistry = RegistryMetaControl::Create($this, QApplication::PathInfo(0), QMetaControlCreateType::EditOnly);
			
			$this->lblName = $this->mctRegistry->lblName_Create();
			$this->txtValue = $this->mctRegistry->txtValue_Create();

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Update';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->txtValue->Text = trim($this->txtValue->Text);
			$this->mctRegistry->SaveRegistry();
			$this->ReturnToList();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->ReturnToList();
		}
	
		protected function ReturnToList() {
			QApplication::Redirect('/admin/registry/');
		}
	}

	AdminEditAttributeForm::Run('AdminEditAttributeForm');
?>