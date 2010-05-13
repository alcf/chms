<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Group class.  It uses the code-generated
	 * GroupMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Group columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both group_edit.php AND
	 * group_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class GroupEditPanel extends QPanel {
		// Local instance of the GroupMetaControl
		protected $mctGroup;

		// Controls for Group's Data Fields
		public $lblId;
		public $lstGroupType;
		public $lstMinistry;
		public $txtName;
		public $txtDescription;
		public $lstParentGroup;
		public $chkConfidentialFlag;
		public $lstEmailBroadcastType;
		public $txtToken;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstGrowthGroup;
		public $lstSmartGroup;

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
			$this->strTemplate = 'GroupEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the GroupMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctGroup = GroupMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on Group's data fields
			$this->lblId = $this->mctGroup->lblId_Create();
			$this->lstGroupType = $this->mctGroup->lstGroupType_Create();
			$this->lstMinistry = $this->mctGroup->lstMinistry_Create();
			$this->txtName = $this->mctGroup->txtName_Create();
			$this->txtDescription = $this->mctGroup->txtDescription_Create();
			$this->lstParentGroup = $this->mctGroup->lstParentGroup_Create();
			$this->chkConfidentialFlag = $this->mctGroup->chkConfidentialFlag_Create();
			$this->lstEmailBroadcastType = $this->mctGroup->lstEmailBroadcastType_Create();
			$this->txtToken = $this->mctGroup->txtToken_Create();
			$this->lstGrowthGroup = $this->mctGroup->lstGrowthGroup_Create();
			$this->lstSmartGroup = $this->mctGroup->lstSmartGroup_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('Group') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctGroup->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the GroupMetaControl
			$this->mctGroup->SaveGroup();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the GroupMetaControl
			$this->mctGroup->DeleteGroup();
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