<?php
	class Vicp_Attributes_Add extends Vicp_Base {
		public $lstAttributes;

		protected function SetupPanel() {
			$objExisting = array();
			foreach ($this->objPerson->GetAttributeValueArray() as $objAttributeValue)
				$objExisting[$objAttributeValue->AttributeId] = true;

			$this->lstAttributes = new QListBox($this);
			$this->lstAttributes->Name = 'Attribute Category';
			$this->lstAttributes->AddItem('- Select One -');
			$this->lstAttributes->Required = true;
			foreach (Attribute::LoadAll(QQ::OrderBy(QQN::Attribute()->Name)) as $objAttribute) {
				if (!array_key_exists($objAttribute->Id, $objExisting))
					$this->lstAttributes->AddItem($objAttribute->Name, $objAttribute->Id);
			}

			$this->btnSave->Text = 'Add';
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#attributes/edit/' . $this->lstAttributes->SelectedValue . '";');
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#attributes";');
		}
	}
?>