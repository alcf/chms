<?php
	class SearchQueryPanel extends QPanel {
		public $dtgConditions;
		/**
		 * @var SearchQuery
		 */
		public $objSearchQuery;

		public $objQueryConditionArray;
		public $objNodeArray;
		public $objOperationArray;

		public $btnAddCondition;

		public function __construct(SearchQuery $objSearchQuery, $objParentObject, $strControlId = null) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			$this->objSearchQuery = $objSearchQuery;
			$this->strTemplate = dirname(__FILE__) . '/SearchQueryPanel.tpl.php';

			$this->dtgConditions = new QDataGrid($this);
			$this->dtgConditions->AddColumn(new QDataGridColumn('Item', '<?= $_CONTROL->ParentControl->RenderItem($_ITEM); ?>', 'HtmlEntities=false', 'Width=160px'));
			$this->dtgConditions->AddColumn(new QDataGridColumn('Operation', '<?= $_CONTROL->ParentControl->RenderOperation($_ITEM); ?>', 'HtmlEntities=false', 'Width=180px'));
			$this->dtgConditions->AddColumn(new QDataGridColumn('Value', '<?= $_CONTROL->ParentControl->RenderValue($_ITEM); ?>', 'HtmlEntities=false', 'Width=390px'));
			$this->dtgConditions->SetDataBinder('dtgConditions_Bind', $this);
			
			$this->btnAddCondition = new QButton($this);
			$this->btnAddCondition->CssClass = 'primary';
			$this->btnAddCondition->Text = 'Add a Condition';
			$this->btnAddCondition->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAddCondition_Click'));
			
			if ($this->objSearchQuery->Id) {
				$this->objQueryConditionArray = QueryCondition::LoadArrayBySearchQueryId($this->objSearchQuery->Id, QQ::OrderBy(QQN::QueryCondition()->Id));
				$this->objQueryConditionArray[] = new QueryCondition();
			} else {
				$this->objQueryConditionArray = array(new QueryCondition());
			}

			// Single Lookup of Node and Operations
			$this->objNodeArray = array();
			foreach (QueryNode::LoadAll(QQ::OrderBy(QQN::QueryNode()->Name)) as $objNode) $this->objNodeArray[$objNode->Id] = $objNode;
			$this->objOperationArray = array();
			foreach (QueryOperation::LoadAll(QQ::OrderBy(QQN::QueryOperation()->Name)) as $objOperation) $this->objOperationArray[$objOperation->Id] = $objOperation;
		}

		public function dtgConditions_Bind() {
			$this->dtgConditions->DataSource = $this->objQueryConditionArray;
		}

		public function btnAddCondition_Click() {
			$this->objQueryConditionArray[] = new QueryCondition();
			$this->dtgConditions->Refresh();
		}

		public function RenderItem(QueryCondition $objCondition) {
			$intIndex = $this->dtgConditions->CurrentRowIndex;
			$strControlId = 'lstNode' . $intIndex;
			if (!($lstNode = $this->objForm->GetControl($strControlId))) {
				$lstNode = new QListBox($this->dtgConditions, $strControlId);
				$lstNode->ActionParameter = $intIndex;
				$lstNode->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstNode_Change'));
				$lstNode->AddItem('- None -');
				foreach ($this->objNodeArray as $objQueryNode) {
					$lstNode->AddItem($objQueryNode->Name, $objQueryNode->Id, $objCondition->QueryNodeId == $objQueryNode->Id);
				}
			}

			return $lstNode->Render(false);
		}
	
		public function RenderOperation(QueryCondition $objCondition) {
			$intIndex = $this->dtgConditions->CurrentRowIndex;
			$strControlId = 'lstOperation' . $intIndex;
			if (!($lstOperation = $this->objForm->GetControl($strControlId))) {
				$lstOperation = new QListBox($this->dtgConditions, $strControlId);
				$lstOperation->ActionParameter = $intIndex;
				$lstOperation->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstOperation_Change'));
				$this->lstOperation_Refresh($intIndex, true);
			}

			return $lstOperation->Render(false);
		}

		public function lstNode_Change($strFormId, $strControlId, $strParameter) {
			$intIndex = $strParameter;
			$this->lstOperation_Refresh($intIndex, false);
			$this->pnlValue_Refresh($intIndex);
			$this->objForm->GetControl('lstOperation' . $intIndex)->Focus();
		}

		public function lstOperation_Refresh($intIndex, $blnCreating) {
			$lstNode = $this->objForm->GetControl('lstNode' . $intIndex);
			$lstOperation = $this->objForm->GetControl('lstOperation' . $intIndex);

			$lstOperation->RemoveAllItems();

			if (!$lstNode->SelectedValue) {
				$lstOperation->AddItem('--');
				$lstOperation->SelectedIndex = 0;
				$lstOperation->Enabled = false;
				$lstOperation->Required = false;
			} else {
				$objNode = QueryNode::Load($lstNode->SelectedValue);
				$lstOperation->Enabled = true;
				$lstOperation->Required = true;
				$lstOperation->AddItem('- None -');
				foreach ($this->objOperationArray as $objQueryOperation) {
					if ($objQueryOperation->QueryDataTypeBitmap & $objNode->QueryDataTypeId)
						$lstOperation->AddItem($objQueryOperation->Name, $objQueryOperation->Id,
							$blnCreating && (array_key_exists($intIndex, $this->objQueryConditionArray)) && ($this->objQueryConditionArray[$intIndex]->QueryOperationId == $objQueryOperation->Id));
				}
			}
		}

		public function lstOperation_Change($strFormId, $strControlId, $strParameter) {
			$intIndex = $strParameter;
			$this->pnlValue_Refresh($intIndex);
			if ($objChildControl = $this->objForm->GetControl('ctlValue' . $intIndex)) {
				if ($objChildControl->Visible) $objChildControl->Focus();
			}
		}

		public function RenderValue(QueryCondition $objCondition) {
			$intIndex = $this->dtgConditions->CurrentRowIndex;
			$strControlId = 'pnlValue' . $intIndex;
			if (!($pnlValue = $this->objForm->GetControl($strControlId))) {
				$pnlValue = new QPanel($this->dtgConditions, $strControlId);
				$pnlValue->AutoRenderChildren = true;
			}
			
			$this->pnlValue_Refresh($intIndex);
			return $pnlValue->Render(false);
		}

		public function Save() {
			$this->objSearchQuery->DeleteAllQueryConditions();
			foreach ($this->objQueryConditionArray as $intIndex => $objQueryCondition) {
				$lstNode = $this->objForm->GetControl('lstNode' . $intIndex);
				$lstOperation = $this->objForm->GetControl('lstOperation' . $intIndex);
				$pnlValue = $this->objForm->GetControl('pnlValue' . $intIndex);
				$ctlValue = $this->objForm->GetControl('ctlValue' . $intIndex);

				if ($lstNode->SelectedValue) {
					$objQueryCondition = new QueryCondition();
					$objQueryCondition->SearchQuery = $this->objSearchQuery;
					$objQueryCondition->QueryOperationId = $lstOperation->SelectedValue;
					$objQueryCondition->QueryNodeId = $lstNode->SelectedValue;
					if ($ctlValue->Visible) switch ($this->objNodeArray[$lstNode->SelectedValue]->QueryDataTypeId) {
						case QueryDataType::StringValue:
							$objQueryCondition->Value = trim($ctlValue->Text);
							break;
						case QueryDataType::DateValue:
							$objQueryCondition->Value = $ctlValue->DateTime->ToString('YYYY-MM-DD');
							break;
						case QueryDataType::IntegerValue:
							$objQueryCondition->Value = trim($ctlValue->Text);
							break;
						case QueryDataType::BooleanValue:
							$objQueryCondition->Value = trim($ctlValue->SelectedValue);
							break;
						case QueryDataType::TypeValue:
							$objQueryCondition->Value = trim($ctlValue->SelectedValue);
							break;
						case QueryDataType::CustomValue:
							$objQueryCondition->Value = trim($ctlValue->SelectedValue);
							break;
						default:
							throw new Exception('Unhandled QueryDataTypeId');
					}
					$objQueryCondition->Save();
				}
			}
		}

		public function pnlValue_Refresh($intIndex) {
			$lstNode = $this->objForm->GetControl('lstNode' . $intIndex);
			$lstOperation = $this->objForm->GetControl('lstOperation' . $intIndex);
			$pnlValue = $this->objForm->GetControl('pnlValue' . $intIndex);

			$strControlId = 'ctlValue' . $intIndex;
			$objQueryCondition = $this->objQueryConditionArray[$intIndex];

			if (!$lstNode->SelectedValue) {
				$pnlValue->RemoveChildControls(true);
				$pnlValue->ActionParameter = null;
				return;
			}

			if ($pnlValue->ActionParameter != $lstNode->SelectedValue) {
				$pnlValue->RemoveChildControls(true);
				$pnlValue->ActionParameter = $lstNode->SelectedValue;

				$objQueryNode = $this->objNodeArray[$lstNode->SelectedValue];
				
				switch ($objQueryNode->QueryDataTypeId) {
					case QueryDataType::StringValue:
						$ctlValue = new QTextBox($pnlValue, $strControlId);
						if ($objQueryCondition->QueryNodeId == $objQueryNode->Id) $ctlValue->Text = $objQueryCondition->Value;
						break;

					case QueryDataType::DateValue:
						$ctlValue = new QDateTimePicker($pnlValue, $strControlId);
						if ($objQueryCondition->QueryNodeId == $objQueryNode->Id) $ctlValue->DateTime = new QDateTime($objQueryCondition->Value);
						break;

					case QueryDataType::IntegerValue:
						$ctlValue = new QIntegerTextBox($pnlValue, $strControlId);
						if ($objQueryCondition->QueryNodeId == $objQueryNode->Id) $ctlValue->Text = $objQueryCondition->Value;
						break;
						
					case QueryDataType::BooleanValue:
						$ctlValue = new QListBox($pnlValue, $strControlId);
						$ctlValue->AddItem('True', true, ($objQueryCondition->QueryNodeId == $objQueryNode->Id) && $objQueryCondition->Value);
						$ctlValue->AddItem('False', false, ($objQueryCondition->QueryNodeId == $objQueryNode->Id) && !$objQueryCondition->Value);
						break;
						
					case QueryDataType::TypeValue:
						$ctlValue = new QListBox($pnlValue, $strControlId);
						$strTypeName = $objQueryNode->NodeDetail;
						$ctlValue->AddItem('- Select One -');
						foreach ($strTypeName::$NameArray as $intKey => $strValue) {
							$ctlValue->AddItem($strValue, $intKey, (($objQueryCondition->QueryNodeId == $objQueryNode->Id) && ($intKey == $objQueryCondition->Value)));
						}
						break;

					case QueryDataType::CustomValue:
						$strCurrentValue = ($objQueryCondition->QueryNodeId == $objQueryNode->Id) ? $objQueryCondition->Value : null;
						$ctlValue = $objQueryNode->GetCustomControl($pnlValue, $strControlId, $strCurrentValue);
						break;

					default:
						throw new Exception('Invalid QueryDataType: ' . $objQueryNode->QueryDataTypeId);
				}
			} else {
				$ctlValue = $this->objForm->GetControl($strControlId);
			}

			
			if (!$lstOperation->SelectedValue) {
				$ctlValue->Visible = false;
				$ctlValue->Required = false;
			} else {
				$objQueryOperation = $this->objOperationArray[$lstOperation->SelectedValue];
				$ctlValue->Visible = $objQueryOperation->ArgumentFlag;
				$ctlValue->Required = $objQueryOperation->ArgumentFlag;
			}
		}
	}
?>