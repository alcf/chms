<?php
	class Vicp_Attributes_Edit extends Vicp_Base {
		public $objAttributeValue;
		public $btnDelete;

		public $dtxValue;
		public $calValue;
		public $txtValue;
		public $chkValue;
		public $lstSingleValue;
		public $lstMultipleValue;

		public $txtAddItem;

		protected function SetupPanel() {
			$this->objAttributeValue = AttributeValue::LoadByAttributeIdPersonId($this->strUrlHashArgument, $this->objPerson->Id);

			if (!$this->objAttributeValue) {
				$this->objAttributeValue = new AttributeValue();
				$this->objAttributeValue->AttributeId = $this->strUrlHashArgument;
				$this->objAttributeValue->Person = $this->objPerson;
			} else {
				$this->btnDelete = new QButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to DELETE this attribute?'));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			}

			switch ($this->objAttributeValue->Attribute->AttributeDataTypeId) {
				case AttributeDataType::Checkbox:
					break;
				case AttributeDataType::Date:
					break;
				case AttributeDataType::Text:
					break;
				case AttributeDataType::ImmutableSingleDropdown:
					$this->lstSingleValue = new QListBox($this);
					$this->lstSingleValue->Name = $this->objAttributeValue->Attribute->Name;
					$this->lstSingleValue->Required = true;
					if (!$this->objAttributeValue->SingleAttributeOptionId)
						$this->lstSingleValue->AddItem('- Select One -');
					foreach ($this->objAttributeValue->Attribute->GetAttributeOptionArray(QQ::OrderBy(QQN::AttributeOption()->Name)) as $objOption)
						$this->lstSingleValue->AddItem($objOption->Name, $objOption->Id, $objOption->Id == $this->objAttributeValue->SingleAttributeOptionId);
					break;
				case AttributeDataType::ImmutableMultipleDropdown:
					break;
				case AttributeDataType::MutableSingleDropdown:
					break;
				case AttributeDataType::MutableMultipleDropdown:
					break;
				default:
					throw new Exception('Unhandled AttributeDataTypeId: ' . $this->objAttributeValue->Attribute->AttributeDataTypeId);
			}
		}
	
		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			return $this->ReturnTo('#attributes');
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			$this->objAttributeValue->Delete();
			return $this->ReturnTo('#attributes');
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {

			switch ($this->objAttributeValue->Attribute->AttributeDataTypeId) {
				case AttributeDataType::Checkbox:
					break;

				case AttributeDataType::Date:
					break;

				case AttributeDataType::Text:
					break;

				case AttributeDataType::ImmutableSingleDropdown:
					$this->objAttributeValue->SingleAttributeOptionId = $this->lstSingleValue->SelectedValue;
					$this->objAttributeValue->Save();
					break;

				case AttributeDataType::ImmutableMultipleDropdown:
					break;

				case AttributeDataType::MutableSingleDropdown:
					break;

				case AttributeDataType::MutableMultipleDropdown:
					break;

				default:
					throw new Exception('Unhandled AttributeDataTypeId: ' . $this->objAttributeValue->Attribute->AttributeDataTypeId);
			}

			return $this->ReturnTo('#attributes');
		}
	}
?>