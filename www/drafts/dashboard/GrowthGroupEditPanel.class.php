<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the GrowthGroup class.  It uses the code-generated
	 * GrowthGroupMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a GrowthGroup columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both growth_group_edit.php AND
	 * growth_group_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class GrowthGroupEditPanel extends QPanel {
		// Local instance of the GrowthGroupMetaControl
		protected $mctGrowthGroup;

		// Controls for GrowthGroup's Data Fields
		public $lstGroup;
		public $lstGrowthGroupLocation;
		public $lstGrowthGroupDayType;
		public $txtMeetingBitmap;
		public $txtStartTime;
		public $txtEndTime;
		public $txtAddress1;
		public $txtAddress2;
		public $txtCrossStreet1;
		public $txtCrossStreet2;
		public $txtZipCode;
		public $txtLongitude;
		public $txtLatitude;
		public $txtAccuracy;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstGrowthGroupStructures;

		// Other Controls
		public $btnSave;
		public $btnDelete;
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod, $intGroupId = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = 'GrowthGroupEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the GrowthGroupMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctGrowthGroup = GrowthGroupMetaControl::Create($this, $intGroupId);

			// Call MetaControl's methods to create qcontrols based on GrowthGroup's data fields
			$this->lstGroup = $this->mctGrowthGroup->lstGroup_Create();
			$this->lstGrowthGroupLocation = $this->mctGrowthGroup->lstGrowthGroupLocation_Create();
			$this->lstGrowthGroupDayType = $this->mctGrowthGroup->lstGrowthGroupDayType_Create();
			$this->txtMeetingBitmap = $this->mctGrowthGroup->txtMeetingBitmap_Create();
			$this->txtStartTime = $this->mctGrowthGroup->txtStartTime_Create();
			$this->txtEndTime = $this->mctGrowthGroup->txtEndTime_Create();
			$this->txtAddress1 = $this->mctGrowthGroup->txtAddress1_Create();
			$this->txtAddress2 = $this->mctGrowthGroup->txtAddress2_Create();
			$this->txtCrossStreet1 = $this->mctGrowthGroup->txtCrossStreet1_Create();
			$this->txtCrossStreet2 = $this->mctGrowthGroup->txtCrossStreet2_Create();
			$this->txtZipCode = $this->mctGrowthGroup->txtZipCode_Create();
			$this->txtLongitude = $this->mctGrowthGroup->txtLongitude_Create();
			$this->txtLatitude = $this->mctGrowthGroup->txtLatitude_Create();
			$this->txtAccuracy = $this->mctGrowthGroup->txtAccuracy_Create();
			$this->lstGrowthGroupStructures = $this->mctGrowthGroup->lstGrowthGroupStructures_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('GrowthGroup') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctGrowthGroup->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the GrowthGroupMetaControl
			$this->mctGrowthGroup->SaveGrowthGroup();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the GrowthGroupMetaControl
			$this->mctGrowthGroup->DeleteGrowthGroup();
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