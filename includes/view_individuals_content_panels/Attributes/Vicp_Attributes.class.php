<?php
	class Vicp_Attributes extends Vicp_Base {
		public $dtgAttributes;
		protected function SetupPanel() {
			$this->dtgAttributes = new QDataGrid($this);
			$this->dtgAttributes->AddColumn(new QDataGridColumn('Attribute', '<a href="#attributes/edit/<?= $_ITEM->AttributeId; ?>"><?= QApplication::HtmlEntities($_ITEM->Attribute->Name); ?></a>', 'HtmlEntities=false', 'Width=180px;'));
			$this->dtgAttributes->AddColumn(new QDataGridColumn('Value', '<?= $_CONTROL->ParentControl->RenderValue($_ITEM); ?>', 'HtmlEntities=false', 'Width=570px'));
			
			$this->dtgAttributes->DataSource = $this->objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
		}
		
		public function RenderValue(AttributeValue $objValue) {
			switch ($objValue->Attribute->AttributeDataTypeId) {
				case AttributeDataType::Text:
					return QApplication::HtmlEntities($objValue->TextValue);

				case AttributeDataType::Checkbox:
					return $objValue->BooleanValue ? 'Yes' : 'No';

				case AttributeDataType::Date:
					return $objValue->DateValue->ToString('MMMM D, YYYY');

				case AttributeDataType::DateTime:
					return $objValue->DatetimeValue->ToString('MMMM D, YYYY') . ' at ' . $objValue->DatetimeValue->ToString('h:mmz');

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