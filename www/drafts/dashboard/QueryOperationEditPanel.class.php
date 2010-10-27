<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the QueryOperation class.  It uses the code-generated
	 * QueryOperationMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a QueryOperation columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both query_operation_edit.php AND
	 * query_operation_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class QueryOperationEditPanel extends QPanel {
		// Local instance of the QueryOperationMetaControl
		protected $mctQueryOperation;

		// Controls for QueryOperation's Data Fields
		public $lblId;
		public $txtQueryDataTypeBitmap;
		public $txtName;
		public $txtQqFactoryName;
		public $chkArgumentFlag;
		public $txtArgumentPrepend;
		public $txtArgumentPostpend;

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
			$this->strTemplate = 'QueryOperationEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the QueryOperationMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctQueryOperation = QueryOperationMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on QueryOperation's data fields
			$this->lblId = $this->mctQueryOperation->lblId_Create();
			$this->txtQueryDataTypeBitmap = $this->mctQueryOperation->txtQueryDataTypeBitmap_Create();
			$this->txtName = $this->mctQueryOperation->txtName_Create();
			$this->txtQqFactoryName = $this->mctQueryOperation->txtQqFactoryName_Create();
			$this->chkArgumentFlag = $this->mctQueryOperation->chkArgumentFlag_Create();
			$this->txtArgumentPrepend = $this->mctQueryOperation->txtArgumentPrepend_Create();
			$this->txtArgumentPostpend = $this->mctQueryOperation->txtArgumentPostpend_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('QueryOperation') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctQueryOperation->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the QueryOperationMetaControl
			$this->mctQueryOperation->SaveQueryOperation();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the QueryOperationMetaControl
			$this->mctQueryOperation->DeleteQueryOperation();
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