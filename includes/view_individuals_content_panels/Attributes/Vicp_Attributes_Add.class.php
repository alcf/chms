<?php
	class Vicp_Attributes_Add extends Vicp_Base {
		public $lstAttributes;
		public $dtgAttributes;
		public $strAttributeHeight;
		public $iAttributeCount;
		public $pnlRight;
		
		public $objAttributeValue;
		public $lblTitle;
		public $dtxValue;
		public $calValue;
		public $txtValue;
		public $chkValue;
		public $lstValue;
		public $txtAddItem;
		public $btnSaveEdit;
		
		protected function SetupPanel() {
			$objExisting = array();
			foreach ($this->objPerson->GetAttributeValueArray() as $objAttributeValue)
				$objExisting[$objAttributeValue->AttributeId] = true;

			$this->dtgAttributes = new QDataGrid($this);
			$this->dtgAttributes->Name= 'Attribute Category';
			$this->dtgAttributes->AddColumn(new QDataGridColumn('Attribute Name', '<?= $_ITEM->Name; ?>', 'Width=270px'));
			$this->dtgAttributes->AddColumn(new QDataGridColumn('Add', '<?= $_CONTROL->ParentControl->EditColumn_Render($_ITEM) ?>', 'HtmlEntities=false'));
			$this->dtgAttributes->SetDataBinder('dtgAttributes_Bind',$this);
			
			$this->pnlRight = new QPanel($this);
			$this->pnlRight->Position = QPosition::Relative;
			$this->pnlRight->Left = "350px";
			$this->pnlRight->Width = "400px";
			$this->pnlRight->BorderColor = "#E2E2E2";
			$this->pnlRight->BorderStyle = "solid";
			$this->pnlRight->BorderWidth = "1px";
			$this->pnlRight->Padding = "10px";
			$this->pnlRight->CssClass = "attributePanel";
			$this->pnlRight->Display = "none";
			$this->pnlRight->DisplayStyle = "block";
			$this->pnlRight->AutoRenderChildren = true;	

			$this->btnSave->Text = 'Add';
			$this->btnCancel->Text = 'Return';
		}
				
		// DataGrid Render Handlers Below
		public function EditColumn_Render(Attribute $objAttribute) {
			// Let's specify a specific Control ID for our button, using the datagrid's CurrentRowIndex
			$strControlId = 'btnEditAttribute' . $this->dtgAttributes->CurrentRowIndex;
		
			$btnEdit = $this->objForm->GetControl($strControlId);
			if (!$btnEdit) {
				// Only create/instantiate a new Edit button for this Row if it doesn't yet exist
				$btnEdit = new QButton($this->dtgAttributes, $strControlId);
				$btnEdit->Text = 'Add';
				$btnEdit->CssClass = 'primary';
		
				// Define an Event Handler on the Button
				// Because the event handler, itself, is defined in the control, we use QAjaxControlAction instead of QAjaxAction
				$btnEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnEditAttribute_Click'));
			}
		
			// Finally, update the Actionparameter for our button to store the $objAttribute's ID.
			$btnEdit->ActionParameter = $objAttribute->Id."_". $objAttribute->AttributeDataTypeId ."_". $objAttribute->Name."_".$this->dtgAttributes->CurrentRowIndex;
		
			// Return the Rendered Button Control
			return $btnEdit->Render(false);
		}
		
		public function btnEditAttribute_Click($strFormId, $strControlId, $strParameter) {
			$paramArray = explode("_",$strParameter);
			// First, remove all children panels from pnlRight
			$this->pnlRight->Display = "block";
			$this->pnlRight->DisplayStyle = "block";
			$this->pnlRight->RemoveChildControls(true);
			
			// Determine where to display the panel
			$range = 1;
			if ($paramArray[3] < 5)
				$range = 1;
			elseif ($paramArray[3] < 15)
				$range = 2;
			else
				$range = 3;
			
			$height = ($this->iAttributeCount/$range)* 35;
			$this->strAttributeHeight = sprintf("-%dpx",$height);
			$this->pnlRight->Top = $this->strAttributeHeight;		
		
			// Now create a new AttributeEditPanel, setting pnlRight as its parent
			// and specifying parent form's "CloseRightPanel" as the method callback
			// See the note in _constructor, above, for more information
			/*new Vicp_Attributes_Edit($this->pnlRight, null, $this->objPerson,$this->strUrlHashArgument);*/
			// Test to see if it works
			// Special case for Co-Primary. If co-primary, then ensure there is a date of birth
			if($paramArray[2] == 'Co-Primary'&& !$this->objPerson->DateOfBirth) {
				$this->lblTitle = new QLabel($this->pnlRight);
				$this->lblTitle->HtmlEntities = false;
				$this->lblTitle->Text = "You cannot specify a Co-primary email unless the person has a Date Of Birth specified. <br>Please ensure that this is the case before setting this attribute.";
			} else {			
				$this->objAttributeValue = AttributeValue::LoadByAttributeIdPersonId($strParameter, $this->objPerson->Id);
				if (!$this->objAttributeValue) {
					$this->objAttributeValue = new AttributeValue();
					$this->objAttributeValue->AttributeId = $paramArray[0];
					$this->objAttributeValue->Person = $this->objPerson;
					$this->objAttributeValue->Attribute = Attribute::Load($paramArray[0]);
				}
				
				// Determine what to display
				$this->lblTitle = new QLabel($this->pnlRight);
				$this->lblTitle->Text = $paramArray[2];
				if($paramArray[2] == 'Co-Primary') {
					$this->lblTitle->HtmlEntities = false;
					$this->lblTitle->Text .= '<br>Please not that the Co-Primary email entered MUST be an existing person in noah.';
				}
				$this->lblTitle->CssClass = 'attributeLbl';
				
				switch ($paramArray[1]) {
					case AttributeDataType::Checkbox:
						$this->chkValue = new QRadioButtonList($this->pnlRight);
						$this->chkValue->Name = $paramArray[2];
						$this->chkValue->Required = true;
						$this->chkValue->AddItem('Yes', true, $this->objAttributeValue->BooleanValue === true);
						$this->chkValue->AddItem('No', false, $this->objAttributeValue->BooleanValue === false);
						break;
				
					case AttributeDataType::Date:
					case AttributeDataType::DateTime:
						$this->dtxValue = new QDateTimeTextBox($this->pnlRight);
						$this->dtxValue->Name = $paramArray[2];
						$this->dtxValue->Required = true;
						$this->calValue = new QCalendar($this->pnlRight, $this->dtxValue);			
						$this->dtxValue->RemoveAllActions(QClickEvent::EventName);
						if ($this->objAttributeValue->Attribute->AttributeDataTypeId == AttributeDataType::Date) {
							$this->dtxValue->Text = ($this->objAttributeValue->DateValue) ? $this->objAttributeValue->DateValue->ToString() : null;
						} else {
							$this->dtxValue->Text = ($this->objAttributeValue->DatetimeValue) ? $this->objAttributeValue->DatetimeValue->ToString() : null;
						}
						break;
				
					case AttributeDataType::Text:
						$this->txtValue = new QTextBox($this->pnlRight);
						$this->txtValue->Name = $paramArray[2];
						$this->txtValue->Required = true;
						$this->txtValue->TextMode = QTextMode::MultiLine;
						$this->txtValue->Text = trim($this->objAttributeValue->TextValue);
						$this->txtValue->FontNames = QFontFamily::Arial;
						$this->txtValue->FontSize = '11px';
						$this->txtValue->Width = '380px';
						$this->txtValue->Height = '200px';
						break;
				
					case AttributeDataType::ImmutableSingleDropdown:
						$this->lstValue = new QListBox($this->pnlRight);
						$this->lstValue->Name = $paramArray[2];
						$this->lstValue->Required = true;
						if (!$this->objAttributeValue->SingleAttributeOptionId)
							$this->lstValue->AddItem('- Select One -');
						foreach ($this->objAttributeValue->Attribute->GetAttributeOptionArray(QQ::OrderBy(QQN::AttributeOption()->Name)) as $objOption)
							$this->lstValue->AddItem($objOption->Name, $objOption->Id, $objOption->Id == $this->objAttributeValue->SingleAttributeOptionId);
						break;
				
					case AttributeDataType::ImmutableMultipleDropdown:
						$this->lstValue = new QListBox($this->pnlRight);
						$this->lstValue->Name = $paramArray[2];
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
						$this->lstValue = new QListBox($this->pnlRight);
						$this->lstValue->Name = $paramArray[2];
						$this->lstValue->Required = true;
						
						foreach ($this->objAttributeValue->Attribute->GetAttributeOptionArray(QQ::OrderBy(QQN::AttributeOption()->Name)) as $objOption)
						$this->lstValue->AddItem($objOption->Name, $objOption->Id, $objOption->Id == $this->objAttributeValue->SingleAttributeOptionId);
						$this->lstValue->AddItem('- Other... -', -1);
				
						$this->txtAddItem = new QTextBox($this->pnlRight);
						$this->txtAddItem->Name = 'Add a Value';
						$this->txtAddItem->Visible = false;
				
						$this->lstValue->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstValue_Change'));
						$this->txtAddItem->AddAction(new QEnterKeyEvent(), new QTerminateAction());
						break;
				
					case AttributeDataType::MutableMultipleDropdown:
						$this->lstValue = new QListBox($this->pnlRight);
						$this->lstValue->Name = $paramArray[2];
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
				
						$this->txtAddItem = new QTextBox($this->pnlRight);
						$this->txtAddItem->Name = 'Add a Value';
						$this->txtAddItem->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'txtAddItem_Enter'));
						$this->txtAddItem->AddAction(new QEnterKeyEvent(), new QTerminateAction());
						break;
				
					default:
						throw new Exception('Unhandled AttributeDataTypeId: ' . $this->objAttributeValue->Attribute->AttributeDataTypeId);
				}
				// Add a save button
				$this->btnSaveEdit = new QButton($this->pnlRight);
				$this->btnSaveEdit->Text = 'Save';
				$this->btnSaveEdit->CssClass = 'attributeBtn';
				$this->btnSaveEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSaveEdit_Click'));
				$this->btnSaveEdit->CausesValidation = $this;
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
		
		public function btnSaveEdit_Click($strFormId, $strControlId, $strParameter) {
		
			switch ($this->objAttributeValue->Attribute->AttributeDataTypeId) {
				case AttributeDataType::Checkbox:
					$this->objAttributeValue->BooleanValue = $this->chkValue->SelectedValue;
					$this->objAttributeValue->Save();
					break;
		
				case AttributeDataType::Date:
					$this->objAttributeValue->DateValue = $this->dtxValue->DateTime;
					$this->objAttributeValue->Save();
					break;
		
				case AttributeDataType::DateTime:
					$this->objAttributeValue->DatetimeValue = $this->dtxValue->DateTime;
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
			$this->pnlRight->RemoveChildControls(true);
			$this->pnlRight->Display = "none";
		}
		
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#attributes/edit/' . $this->lstAttributes->SelectedValue . '";');
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#attributes";');
		}
		
		public function dtgAttributes_Bind() {
			$objExisting = array();
			foreach ($this->objPerson->GetAttributeValueArray() as $objAttributeValue)
			$objExisting[$objAttributeValue->AttributeId] = true;
		
			$objAttributeArray = array();
			foreach (Attribute::LoadAll(QQ::OrderBy(QQN::Attribute()->Name)) as $objAttribute) {
				if (!array_key_exists($objAttribute->Id, $objExisting))
					$objAttributeArray[] = $objAttribute;
			}
			$this->iAttributeCount = count($objAttributeArray);
			$this->dtgAttributes->DataSource = $objAttributeArray;
		}
	}
?>