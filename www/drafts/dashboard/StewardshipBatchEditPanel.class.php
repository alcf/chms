<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the StewardshipBatch class.  It uses the code-generated
	 * StewardshipBatchMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a StewardshipBatch columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_batch_edit.php AND
	 * stewardship_batch_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipBatchEditPanel extends QPanel {
		// Local instance of the StewardshipBatchMetaControl
		protected $mctStewardshipBatch;

		// Controls for StewardshipBatch's Data Fields
		public $lblId;
		public $lstStewardshipBatchStatusType;
		public $calDateEntered;
		public $txtBatchLabel;
		public $txtDescription;
		public $txtReportedTotalAmount;
		public $txtActualTotalAmount;
		public $txtPostedTotalAmount;

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
			$this->strTemplate = 'StewardshipBatchEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the StewardshipBatchMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctStewardshipBatch = StewardshipBatchMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on StewardshipBatch's data fields
			$this->lblId = $this->mctStewardshipBatch->lblId_Create();
			$this->lstStewardshipBatchStatusType = $this->mctStewardshipBatch->lstStewardshipBatchStatusType_Create();
			$this->calDateEntered = $this->mctStewardshipBatch->calDateEntered_Create();
			$this->txtBatchLabel = $this->mctStewardshipBatch->txtBatchLabel_Create();
			$this->txtDescription = $this->mctStewardshipBatch->txtDescription_Create();
			$this->txtReportedTotalAmount = $this->mctStewardshipBatch->txtReportedTotalAmount_Create();
			$this->txtActualTotalAmount = $this->mctStewardshipBatch->txtActualTotalAmount_Create();
			$this->txtPostedTotalAmount = $this->mctStewardshipBatch->txtPostedTotalAmount_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('StewardshipBatch') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctStewardshipBatch->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the StewardshipBatchMetaControl
			$this->mctStewardshipBatch->SaveStewardshipBatch();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the StewardshipBatchMetaControl
			$this->mctStewardshipBatch->DeleteStewardshipBatch();
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