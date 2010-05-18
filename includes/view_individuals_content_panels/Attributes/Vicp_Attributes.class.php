<?php
	class Vicp_Attributes extends Vicp_Base {
		public $dtgAttributes;
		protected function SetupPanel() {
			$this->dtgAttributes = new QDataGrid($this);
			$this->dtgAttributes->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgAttributes->AddColumn(new QDataGridColumn('Attribute', '<?= $_ITEM->Attribute->Name; ?>'));
			$this->dtgAttributes->AddColumn(new QDataGridColumn('Value', '<?= $_CONTROL->ParentControl->RenderValue($_ITEM); ?>', 'HtmlEntities=false'));
			
			$this->dtgAttributes->DataSource = $this->objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
		}
		
		public function RenderValue(AttributeValue $objValue) {
			switch ($objValue->Attribute->AttributeDataTypeId) {
				case AttributeDataType::Text:
					return QApplication::HtmlEntities($objValue->TextValue);

				case AttributeDataType::Checkbox:
					return $objValue->BooleanValue ? 'Yes' : 'No';

				case AttributeDataType::Date:
					return $objValue->DateValue->__toString('MMMM D, YYYY');

				case AttributeDataType::ImmutableSingleDropdown:
				case AttributeDataType::MutableSingleDropdown:
					return QApplication::HtmlEntities($objValue->SingleAttributeOption->Name);

				case AttributeDataType::ImmutableMultipleDropdown:
				case AttributeDataType::MutableMultipleDropdown:
					$strArray = array();
					foreach ($objValue->GetAttributeOptionAsMultipleArray(QQ::OrderBy(QQN::AttributeOption()->Name)) as $objOption)
						$strArray[] = '&bull; ' . QApplication::HtmlEntities($objOption->Name);
					return implode('<br/>', $strArray);

				default:
					throw new Exception('Unhandled Attribute Data Type');
			}
		}
	}
?>