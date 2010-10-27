<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Ministry class.  It uses the code-generated
	 * MinistryMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Ministry columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both ministry_edit.php AND
	 * ministry_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class MinistryEditPanel extends QPanel {
		// Local instance of the MinistryMetaControl
		protected $mctMinistry;

		// Controls for Ministry's Data Fields
		public $lblId;
		public $txtToken;
		public $txtName;
		public $lstParentMinistry;
		public $txtGroupTypeBitmap;
		public $chkActiveFlag;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstLogins;

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
			$this->strTemplate = 'MinistryEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the MinistryMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctMinistry = MinistryMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on Ministry's data fields
			$this->lblId = $this->mctMinistry->lblId_Create();
			$this->txtToken = $this->mctMinistry->txtToken_Create();
			$this->txtName = $this->mctMinistry->txtName_Create();
			$this->lstParentMinistry = $this->mctMinistry->lstParentMinistry_Create();
			$this->txtGroupTypeBitmap = $this->mctMinistry->txtGroupTypeBitmap_Create();
			$this->chkActiveFlag = $this->mctMinistry->chkActiveFlag_Create();
			$this->lstLogins = $this->mctMinistry->lstLogins_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('Ministry') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctMinistry->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the MinistryMetaControl
			$this->mctMinistry->SaveMinistry();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the MinistryMetaControl
			$this->mctMinistry->DeleteMinistry();
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