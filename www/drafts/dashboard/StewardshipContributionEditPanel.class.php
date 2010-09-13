<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the StewardshipContribution class.  It uses the code-generated
	 * StewardshipContributionMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a StewardshipContribution columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_contribution_edit.php AND
	 * stewardship_contribution_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipContributionEditPanel extends QPanel {
		// Local instance of the StewardshipContributionMetaControl
		protected $mctStewardshipContribution;

		// Controls for StewardshipContribution's Data Fields
		public $lblId;
		public $lstPerson;
		public $lstStewardshipContributionType;
		public $lstStewardshipBatch;
		public $lstStewardshipStack;
		public $lstCheckingAccountLookup;
		public $txtTotalAmount;
		public $calDateEntered;
		public $calDateCleared;
		public $calDateCredited;
		public $txtCheckNumber;
		public $txtAuthorizationNumber;
		public $txtAlternateSource;
		public $chkNonDeductibleFlag;
		public $txtNote;
		public $lstCreatedByLogin;

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
			$this->strTemplate = 'StewardshipContributionEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the StewardshipContributionMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctStewardshipContribution = StewardshipContributionMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on StewardshipContribution's data fields
			$this->lblId = $this->mctStewardshipContribution->lblId_Create();
			$this->lstPerson = $this->mctStewardshipContribution->lstPerson_Create();
			$this->lstStewardshipContributionType = $this->mctStewardshipContribution->lstStewardshipContributionType_Create();
			$this->lstStewardshipBatch = $this->mctStewardshipContribution->lstStewardshipBatch_Create();
			$this->lstStewardshipStack = $this->mctStewardshipContribution->lstStewardshipStack_Create();
			$this->lstCheckingAccountLookup = $this->mctStewardshipContribution->lstCheckingAccountLookup_Create();
			$this->txtTotalAmount = $this->mctStewardshipContribution->txtTotalAmount_Create();
			$this->calDateEntered = $this->mctStewardshipContribution->calDateEntered_Create();
			$this->calDateCleared = $this->mctStewardshipContribution->calDateCleared_Create();
			$this->calDateCredited = $this->mctStewardshipContribution->calDateCredited_Create();
			$this->txtCheckNumber = $this->mctStewardshipContribution->txtCheckNumber_Create();
			$this->txtAuthorizationNumber = $this->mctStewardshipContribution->txtAuthorizationNumber_Create();
			$this->txtAlternateSource = $this->mctStewardshipContribution->txtAlternateSource_Create();
			$this->chkNonDeductibleFlag = $this->mctStewardshipContribution->chkNonDeductibleFlag_Create();
			$this->txtNote = $this->mctStewardshipContribution->txtNote_Create();
			$this->lstCreatedByLogin = $this->mctStewardshipContribution->lstCreatedByLogin_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('StewardshipContribution') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctStewardshipContribution->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the StewardshipContributionMetaControl
			$this->mctStewardshipContribution->SaveStewardshipContribution();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the StewardshipContributionMetaControl
			$this->mctStewardshipContribution->DeleteStewardshipContribution();
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