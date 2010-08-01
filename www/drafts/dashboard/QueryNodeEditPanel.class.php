<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the QueryNode class.  It uses the code-generated
	 * QueryNodeMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a QueryNode columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both query_node_edit.php AND
	 * query_node_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class QueryNodeEditPanel extends QPanel {
		// Local instance of the QueryNodeMetaControl
		protected $mctQueryNode;

		// Controls for QueryNode's Data Fields
		public $lblId;
		public $txtName;
		public $txtQcodoQueryNode;
		public $txtDataType;
		public $txtQcodoQueryCondition;
		public $chkRequiresDistinctFlag;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Other Controls
		public $btnSave;
		public $btnDelete;
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod, $intId = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = 'QueryNodeEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the QueryNodeMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctQueryNode = QueryNodeMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on QueryNode's data fields
			$this->lblId = $this->mctQueryNode->lblId_Create();
			$this->txtName = $this->mctQueryNode->txtName_Create();
			$this->txtQcodoQueryNode = $this->mctQueryNode->txtQcodoQueryNode_Create();
			$this->txtDataType = $this->mctQueryNode->txtDataType_Create();
			$this->txtQcodoQueryCondition = $this->mctQueryNode->txtQcodoQueryCondition_Create();
			$this->chkRequiresDistinctFlag = $this->mctQueryNode->chkRequiresDistinctFlag_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('QueryNode') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctQueryNode->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the QueryNodeMetaControl
			$this->mctQueryNode->SaveQueryNode();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the QueryNodeMetaControl
			$this->mctQueryNode->DeleteQueryNode();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			$strMethod = $this->strClosePanelMethod;
			$this->objForm->$strMethod($blnChangesMade);
		}
	}
?>