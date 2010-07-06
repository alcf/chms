<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminEditAttributeForm extends ChmsForm {
		protected $strPageTitle;
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $mctAttribute;
		protected $txtName;
		protected $lstAttributeDataType;
		protected $pnlAttributeOptions;

		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected $btnAddMore;

		protected function Form_Create() {
			$this->mctAttribute = AttributeMetaControl::Create($this, QApplication::PathInfo(0));
			$this->strPageTitle = 'Administration - ' . (($this->mctAttribute->EditMode) ? 'Edit' : 'Create New') . ' Attribute';
			
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

			switch ($this->mctAttribute->Attribute->AttributeDataTypeId) {
				case AttributeDataType::ImmutableMultipleDropdown:
				case AttributeDataType::ImmutableSingleDropdown:
				case AttributeDataType::MutableMultipleDropdown:
				case AttributeDataType::MutableSingleDropdown:
					$this->pnlAttributeOptions = new QPanel($this);
					$this->pnlAttributeOptions->AutoRenderChildren = true;
					
					$this->btnAddMore = new QLinkButton($this);
					$this->btnAddMore->Name = '&nbsp;';
					$this->btnAddMore->Text = 'Add More Dropbox Values';
					$this->btnAddMore->ForeColor = '#999';
					$this->btnAddMore->AddAction(New QClickEvent(), new QAjaxAction('btnAddMore_Click'));
					$this->btnAddMore->AddAction(New QClickEvent(), new QTerminateAction());
					break;
			}

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

				if ($this->pnlAttributeOptions) {
					foreach ($this->mctAttribute->Attribute->GetAttributeOptionArray(QQ::OrderBy(QQN::AttributeOption()->Name)) as $objAttributeOption) {
						$this->pnlAttributeOptions_AddOption($objAttributeOption);
					}
				}
			}

			if ($this->pnlAttributeOptions) {
				$this->pnlAttributeOptions_AddOption(null);
				$this->pnlAttributeOptions_AddOption(null);
			}
		}
		
		protected function btnAddMore_Click() {
			$this->pnlAttributeOptions_AddOption(null);
			$this->pnlAttributeOptions_AddOption(null);
			$this->pnlAttributeOptions->Refresh();
		}

		protected function pnlAttributeOptions_AddOption(AttributeOption $objAttributeOption = null) {
			$txtAttributeOption = new QTextBox($this->pnlAttributeOptions);
			$txtAttributeOption->RenderMethod = 'RenderWithName';
			if ($objAttributeOption) {
				$txtAttributeOption->Name = 'Dropbox Value';
				$txtAttributeOption->Required = true;
				$txtAttributeOption->ActionParameter = $objAttributeOption->Id;
				$txtAttributeOption->Text = trim($objAttributeOption->Name);
			} else {
				$txtAttributeOption->Name = 'Add New Dropbox Value';
			}
		}

		protected function Form_Validate() {
			$blnToReturn = parent::Form_Validate();
			
			if ($this->pnlAttributeOptions) {
				$strOptionNameArray = array();
				foreach ($this->pnlAttributeOptions->GetChildControls() as $txtAttributeOption) {
					if (strlen(trim($txtAttributeOption->Text))) {
						$strKey = strtolower(trim($txtAttributeOption->Text));
						if (array_key_exists($strKey, $strOptionNameArray)) {
							$txtAttributeOption->Warning = 'This is a duplicate';
							$blnToReturn = false;
						} else {
							$strOptionNameArray[$strKey] = true;
						}
					}
				}

				if ($this->mctAttribute->EditMode) {
					foreach ($this->pnlAttributeOptions->GetChildControls() as $txtAttributeOption) {
						if (strlen(trim($txtAttributeOption->Text))) {
							$strName = trim($txtAttributeOption->Text);
							if (($objAttributeOption = AttributeOption::LoadByAttributeIdName($this->mctAttribute->Attribute->Id, $strName)) &&
								($objAttributeOption->Id != $txtAttributeOption->ActionParameter)) {
								$txtAttributeOption->Warning = 'This is a duplicate';
								$blnToReturn = false;
							}
						}
					}
				}
			}

			return $blnToReturn;
		}
		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->mctAttribute->SaveAttribute();

			if ($this->pnlAttributeOptions) {
				foreach ($this->pnlAttributeOptions->GetChildControls() as $txtAttributeOption) {
					if ($txtAttributeOption->ActionParameter) {
						$objAttributeOption = AttributeOption::Load($txtAttributeOption->ActionParameter);
						if ($objAttributeOption->AttributeId != $this->mctAttribute->Attribute->Id) throw new Exception('Unlinked Attribute Option Found');
						if ($objAttributeOption->Name != trim($txtAttributeOption->Text)) {
							$objAttributeOption->Name = trim($txtAttributeOption->Text);
							$objAttributeOption->Save();
						}
					} else {
						if ($strOptionName = trim($txtAttributeOption->Text)) {
							$objAttributeOption = new AttributeOption();
							$objAttributeOption->Attribute = $this->mctAttribute->Attribute;
							$objAttributeOption->Name = $strOptionName;
							$objAttributeOption->Save();
						}
					}
				}
			}
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