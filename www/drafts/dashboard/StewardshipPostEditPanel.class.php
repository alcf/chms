<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the StewardshipPost class.  It uses the code-generated
	 * StewardshipPostMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a StewardshipPost columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_post_edit.php AND
	 * stewardship_post_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipPostEditPanel extends QPanel {
		// Local instance of the StewardshipPostMetaControl
		protected $mctStewardshipPost;

		// Controls for StewardshipPost's Data Fields
		public $lblId;
		public $lstStewardshipBatch;
		public $txtPostNumber;
		public $calDatePosted;
		public $txtTotalAmount;
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
			$this->strTemplate = 'StewardshipPostEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the StewardshipPostMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctStewardshipPost = StewardshipPostMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on StewardshipPost's data fields
			$this->lblId = $this->mctStewardshipPost->lblId_Create();
			$this->lstStewardshipBatch = $this->mctStewardshipPost->lstStewardshipBatch_Create();
			$this->txtPostNumber = $this->mctStewardshipPost->txtPostNumber_Create();
			$this->calDatePosted = $this->mctStewardshipPost->calDatePosted_Create();
			$this->txtTotalAmount = $this->mctStewardshipPost->txtTotalAmount_Create();
			$this->lstCreatedByLogin = $this->mctStewardshipPost->lstCreatedByLogin_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('StewardshipPost') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctStewardshipPost->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the StewardshipPostMetaControl
			$this->mctStewardshipPost->SaveStewardshipPost();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the StewardshipPostMetaControl
			$this->mctStewardshipPost->DeleteStewardshipPost();
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