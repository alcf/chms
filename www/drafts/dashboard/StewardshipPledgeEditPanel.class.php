<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the StewardshipPledge class.  It uses the code-generated
	 * StewardshipPledgeMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a StewardshipPledge columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_pledge_edit.php AND
	 * stewardship_pledge_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipPledgeEditPanel extends QPanel {
		// Local instance of the StewardshipPledgeMetaControl
		protected $mctStewardshipPledge;

		// Controls for StewardshipPledge's Data Fields
		public $lblId;
		public $lstPerson;
		public $lstStewardshipFund;
		public $calDateStarted;
		public $calDateEnded;
		public $txtPledgeAmount;
		public $txtContributedAmount;
		public $txtRemainingAmount;
		public $chkFulfilledFlag;
		public $chkActiveFlag;

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
			$this->strTemplate = 'StewardshipPledgeEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the StewardshipPledgeMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctStewardshipPledge = StewardshipPledgeMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on StewardshipPledge's data fields
			$this->lblId = $this->mctStewardshipPledge->lblId_Create();
			$this->lstPerson = $this->mctStewardshipPledge->lstPerson_Create();
			$this->lstStewardshipFund = $this->mctStewardshipPledge->lstStewardshipFund_Create();
			$this->calDateStarted = $this->mctStewardshipPledge->calDateStarted_Create();
			$this->calDateEnded = $this->mctStewardshipPledge->calDateEnded_Create();
			$this->txtPledgeAmount = $this->mctStewardshipPledge->txtPledgeAmount_Create();
			$this->txtContributedAmount = $this->mctStewardshipPledge->txtContributedAmount_Create();
			$this->txtRemainingAmount = $this->mctStewardshipPledge->txtRemainingAmount_Create();
			$this->chkFulfilledFlag = $this->mctStewardshipPledge->chkFulfilledFlag_Create();
			$this->chkActiveFlag = $this->mctStewardshipPledge->chkActiveFlag_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('StewardshipPledge') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctStewardshipPledge->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the StewardshipPledgeMetaControl
			$this->mctStewardshipPledge->SaveStewardshipPledge();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the StewardshipPledgeMetaControl
			$this->mctStewardshipPledge->DeleteStewardshipPledge();
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