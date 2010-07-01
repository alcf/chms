<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminEditAttributeForm extends ChmsForm {
		protected $strPageTitle;
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $mctAttribute;
		protected $txtName;
		protected $lstAttributeDataType;

		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function Form_Create() {
			$this->mctAttribute = AttributeMetaControl::Create($this, QApplication::PathInfo(0));
			$this->strPageTitle = 'Administration - ' . (($this->mctAttribute->EditMode) ? 'Edit' : 'Create New' . ' Attribute');
			
			$this->txtName = $this->mctAttribute->txtName_Create();
			$this->txtName->Required = true;
			$this->lstAttributeDataType = $this->mctAttribute->lstAttributeDataType_Create();
			
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = ($this->mctAttribute->EditMode ? 'Update' : 'Create');
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());

			if ($this->mctAttribute->EditMode) {
				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->CssClass = 'delete';
				$intCount = $this->mctAttribute->Attribute->CountAttributeValues();
				$strConfirmText = sprintf('Are you SURE you want to permanently DELETE this Attribute?  There are %s individual%s that have a value for this attribute which would be removed.',
					$intCount, ($intCount == 1) ? '' : 's');
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction($strConfirmText));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}
		}

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->mctAttribute->SaveAttribute();
			$this->ReturnToList();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->ReturnToList();
		}
	
		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			$this->mctAttribute->Attribute->Delete();
			$this->ReturnToList();
		}

		protected function ReturnToList() {
			QApplication::Redirect('/admin/attributes/');
		}
	}

	AdminEditAttributeForm::Run('AdminEditAttributeForm');
?>