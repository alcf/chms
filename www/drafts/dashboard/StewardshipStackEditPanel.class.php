<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the StewardshipStack class.  It uses the code-generated
	 * StewardshipStackMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a StewardshipStack columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_stack_edit.php AND
	 * stewardship_stack_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipStackEditPanel extends QPanel {
		// Local instance of the StewardshipStackMetaControl
		protected $mctStewardshipStack;

		// Controls for StewardshipStack's Data Fields
		public $lblId;
		public $lstStewardshipBatch;
		public $txtStackNumber;
		public $txtReportedTotalAmount;
		public $txtActualTotalAmount;

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
			$this->strTemplate = 'StewardshipStackEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the StewardshipStackMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctStewardshipStack = StewardshipStackMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on StewardshipStack's data fields
			$this->lblId = $this->mctStewardshipStack->lblId_Create();
			$this->lstStewardshipBatch = $this->mctStewardshipStack->lstStewardshipBatch_Create();
			$this->txtStackNumber = $this->mctStewardshipStack->txtStackNumber_Create();
			$this->txtReportedTotalAmount = $this->mctStewardshipStack->txtReportedTotalAmount_Create();
			$this->txtActualTotalAmount = $this->mctStewardshipStack->txtActualTotalAmount_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('StewardshipStack') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctStewardshipStack->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the StewardshipStackMetaControl
			$this->mctStewardshipStack->SaveStewardshipStack();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the StewardshipStackMetaControl
			$this->mctStewardshipStack->DeleteStewardshipStack();
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