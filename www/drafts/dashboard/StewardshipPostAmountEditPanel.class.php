<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the StewardshipPostAmount class.  It uses the code-generated
	 * StewardshipPostAmountMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a StewardshipPostAmount columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_post_amount_edit.php AND
	 * stewardship_post_amount_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipPostAmountEditPanel extends QPanel {
		// Local instance of the StewardshipPostAmountMetaControl
		protected $mctStewardshipPostAmount;

		// Controls for StewardshipPostAmount's Data Fields
		public $lblId;
		public $lstStewardshipPost;
		public $lstStewardshipFund;
		public $txtAmount;

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
			$this->strTemplate = 'StewardshipPostAmountEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the StewardshipPostAmountMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctStewardshipPostAmount = StewardshipPostAmountMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on StewardshipPostAmount's data fields
			$this->lblId = $this->mctStewardshipPostAmount->lblId_Create();
			$this->lstStewardshipPost = $this->mctStewardshipPostAmount->lstStewardshipPost_Create();
			$this->lstStewardshipFund = $this->mctStewardshipPostAmount->lstStewardshipFund_Create();
			$this->txtAmount = $this->mctStewardshipPostAmount->txtAmount_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('StewardshipPostAmount') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctStewardshipPostAmount->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the StewardshipPostAmountMetaControl
			$this->mctStewardshipPostAmount->SaveStewardshipPostAmount();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the StewardshipPostAmountMetaControl
			$this->mctStewardshipPostAmount->DeleteStewardshipPostAmount();
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