<?php
	class Vicp_Attributes_Edit extends Vicp_Base {
		public $objAttributeValue;
		public $btnDelete;

		public $dtxValue;
		public $calValue;
		public $txtValue;
		public $chkValue;
		public $lstValue;

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
					$this->chkValue = new QRadioButtonList($this);
					$this->chkValue->Name = $this->objAttributeValue->Attribute->Name;
					$this->chkValue->Required = true;
					$this->chkValue->AddItem('Yes', true, $this->objAttributeValue->BooleanValue === true);
					$this->chkValue->AddItem('No', false, $this->objAttributeValue->BooleanValue === false);
					break;

				case AttributeDataType::Date:
					$this->dtxValue = new QDateTimeTextBox($this);
					$this->dtxValue->Name = $this->objAttributeValue->Attribute->Name;
					$this->dtxValue->Required = true;
					$this->dtxValue->Text = ($this->objAttributeValue->DateValue) ? $this->objAttributeValue->DateValue->__toString() : null;
					$this->calValue = new QCalendar($this, $this->dtxValue);

					$this->dtxValue->RemoveAllActions(QClickEvent::EventName);
					break;

				case AttributeDataType::Text:
					$this->txtValue = new QTextBox($this);
					$this->txtValue->Name = $this->objAttributeValue->Attribute->Name;
					$this->txtValue->Required = true;
					$this->txtValue->TextMode = QTextMode::MultiLine;
					$this->txtValue->Text = trim($this->objAttributeValue->TextValue);
					$this->txtValue->FontNames = QFontFamily::Arial;
					$this->txtValue->FontSize = '11px';
					$this->txtValue->Width = '400px';
					$this->txtValue->Height = '200px';
					break;

				case AttributeDataType::ImmutableSingleDropdown:
					$this->lstValue = new QListBox($this);
					$this->lstValue->Name = $this->objAttributeValue->Attribute->Name;
					$this->lstValue->Required = true;
					if (!$this->objAttributeValue->SingleAttributeOptionId)
						$this->lstValue->AddItem('- Select One -');
					foreach ($this->objAttributeValue->Attribute->GetAttributeOptionArray(QQ::OrderBy(QQN::AttributeOption()->Name)) as $objOption)
						$this->lstValue->AddItem($objOption->Name, $objOption->Id, $objOption->Id == $this->objAttributeValue->SingleAttributeOptionId);
					break;

				case AttributeDataType::ImmutableMultipleDropdown:
					$this->lstValue = new QListBox($this);
					$this->lstValue->Name = $this->objAttributeValue->Attribute->Name;
					$this->lstValue->Required = true;
					$this->lstValue->SelectionMode = QSelectionMode::Multiple;
					$this->lstValue->Width = '200px';
					$this->lstValue->Height = '200px';

					$intSelectedIdArray = array();
					if ($this->objAttributeValue->Id) {
						foreach ($this->objAttributeValue->GetAttributeOptionAsMultipleArray() as $objOption)
							$intSelectedIdArray[$objOption->Id] = $objOption->Id;
					}

					foreach ($this->objAttributeValue->Attribute->GetAttributeOptionArray(QQ::OrderBy(QQN::AttributeOption()->Name)) as $objOption)
						$this->lstValue->AddItem($objOption->Name, $objOption->Id, array_key_exists($objOption->Id, $intSelectedIdArray));
					break;

				case AttributeDataType::MutableSingleDropdown:
					$this->lstValue = new QListBox($this);
					$this->lstValue->Name = $this->objAttributeValue->Attribute->Name;
					$this->lstValue->Required = true;
					if (!$this->objAttributeValue->SingleAttributeOptionId)
						$this->lstValue->AddItem('- Select One -');
					foreach ($this->objAttributeValue->Attribute->GetAttributeOptionArray(QQ::OrderBy(QQN::AttributeOption()->Name)) as $objOption)
						$this->lstValue->AddItem($objOption->Name, $objOption->Id, $objOption->Id == $this->objAttributeValue->SingleAttributeOptionId);
					$this->lstValue->AddItem('- Other... -', -1);

					$this->txtAddItem = new QTextBox($this);
					$this->txtAddItem->Name = 'Add a Value';
					$this->txtAddItem->Visible = false;

					$this->lstValue->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstValue_Change'));
					$this->txtAddItem->AddAction(new QEnterKeyEvent(), new QTerminateAction());
					break;

				case AttributeDataType::MutableMultipleDropdown:
					$this->lstValue = new QListBox($this);
					$this->lstValue->Name = $this->objAttributeValue->Attribute->Name;
					$this->lstValue->Required = true;
					$this->lstValue->SelectionMode = QSelectionMode::Multiple;
					$this->lstValue->Width = '200px';
					$this->lstValue->Height = '200px';

					$intSelectedIdArray = array();
					if ($this->objAttributeValue->Id) {
						foreach ($this->objAttributeValue->GetAttributeOptionAsMultipleArray() as $objOption)
							$intSelectedIdArray[$objOption->Id] = $objOption->Id;
					}

					foreach ($this->objAttributeValue->Attribute->GetAttributeOptionArray(QQ::OrderBy(QQN::AttributeOption()->Name)) as $objOption)
						$this->lstValue->AddItem($objOption->Name, $objOption->Id, array_key_exists($objOption->Id, $intSelectedIdArray));

					$this->txtAddItem = new QTextBox($this);
					$this->txtAddItem->Name = 'Add a Value';
					$this->txtAddItem->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'txtAddItem_Enter'));
					$this->txtAddItem->AddAction(new QEnterKeyEvent(), new QTerminateAction());
					break;

				default:
					throw new Exception('Unhandled AttributeDataTypeId: ' . $this->objAttributeValue->Attribute->AttributeDataTypeId);
			}
		}

		public function lstValue_Change($strFormId, $strControlId, $strParameter) {
			$this->txtAddItem->Text = null;

			if ($this->lstValue->SelectedValue == -1) {
				$this->txtAddItem->Required = true;
				$this->txtAddItem->Visible = true;
				$this->txtAddItem->Focus();
			} else {
				$this->txtAddItem->Required = false;
				$this->txtAddItem->Visible = false;
			}
		}

		public function txtAddItem_Enter($strFormId, $strControlId, $strParameter) {
			if ($strName = trim($this->txtAddItem->Text)) {
				$this->lstValue->AddItem($strName, -1 * count($this->lstValue->GetAllItems()), true);
			}

			$this->txtAddItem->Text = null;
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
					$this->objAttributeValue->BooleanValue = $this->chkValue->SelectedValue;
					$this->objAttributeValue->Save();
					break;

				case AttributeDataType::Date:
					$this->objAttributeValue->DateValue = $this->dtxValue->DateTime;
					$this->objAttributeValue->Save();
					break;

				case AttributeDataType::Text:
					$this->objAttributeValue->TextValue = trim($this->txtValue->Text);
					$this->objAttributeValue->Save();
					break;

				case AttributeDataType::ImmutableSingleDropdown:
					$this->objAttributeValue->SingleAttributeOptionId = $this->lstValue->SelectedValue;
					$this->objAttributeValue->Save();
					break;

				case AttributeDataType::ImmutableMultipleDropdown:
					$this->objAttributeValue->Save();
					$this->objAttributeValue->UnassociateAllAttributeOptionsAsMultiple();
					foreach ($this->lstValue->SelectedValues as $intOptionId) {
						$this->objAttributeValue->AssociateAttributeOptionAsMultiple(AttributeOption::Load($intOptionId));
					}
					break;

				case AttributeDataType::MutableSingleDropdown:
					if ($this->lstValue->SelectedValue == -1) {
						$objAttributeOption = new AttributeOption();
						$objAttributeOption->AttributeId = $this->objAttributeValue->AttributeId;
						$objAttributeOption->Name = trim($this->txtAddItem->Text);
						$objAttributeOption->Save();
						$this->objAttributeValue->SingleAttributeOption = $objAttributeOption;
						$this->objAttributeValue->Save();
					} else {
						$this->objAttributeValue->SingleAttributeOptionId = $this->lstValue->SelectedValue;
						$this->objAttributeValue->Save();
					}
					break;

				case AttributeDataType::MutableMultipleDropdown:
					$this->objAttributeValue->Save();
					$this->objAttributeValue->UnassociateAllAttributeOptionsAsMultiple();
					foreach ($this->lstValue->SelectedItems as $objListItem) {
						$intOptionId = $objListItem->Value;
						if ($intOptionId > 0)
							$this->objAttributeValue->AssociateAttributeOptionAsMultiple(AttributeOption::Load($intOptionId));
						else if ($objListItem->Selected) {
							$objAttributeOption = new AttributeOption();
							$objAttributeOption->AttributeId = $this->objAttributeValue->AttributeId;
							$objAttributeOption->Name = $objListItem->Name;
							$objAttributeOption->Save();
							$this->objAttributeValue->AssociateAttributeOptionAsMultiple($objAttributeOption);
						}
					}
					break;

				default:
					throw new Exception('Unhandled AttributeDataTypeId: ' . $this->objAttributeValue->Attribute->AttributeDataTypeId);
			}

			return $this->ReturnTo('#attributes');
		}
	}
?>