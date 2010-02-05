<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the CommunicationList class.  It uses the code-generated
	 * CommunicationListMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a CommunicationList columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both communication_list_edit.php AND
	 * communication_list_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class CommunicationListEditPanel extends QPanel {
		// Local instance of the CommunicationListMetaControl
		protected $mctCommunicationList;

		// Controls for CommunicationList's Data Fields
		public $lblId;
		public $lstEmailBroadcastType;
		public $lstMinistry;
		public $txtName;
		public $txtToken;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstCommunicationListEntriesAsEntry;
		public $lstPeople;

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
			$this->strTemplate = 'CommunicationListEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the CommunicationListMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctCommunicationList = CommunicationListMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on CommunicationList's data fields
			$this->lblId = $this->mctCommunicationList->lblId_Create();
			$this->lstEmailBroadcastType = $this->mctCommunicationList->lstEmailBroadcastType_Create();
			$this->lstMinistry = $this->mctCommunicationList->lstMinistry_Create();
			$this->txtName = $this->mctCommunicationList->txtName_Create();
			$this->txtToken = $this->mctCommunicationList->txtToken_Create();
			$this->lstCommunicationListEntriesAsEntry = $this->mctCommunicationList->lstCommunicationListEntriesAsEntry_Create();
			$this->lstPeople = $this->mctCommunicationList->lstPeople_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('CommunicationList') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctCommunicationList->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the CommunicationListMetaControl
			$this->mctCommunicationList->SaveCommunicationList();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the CommunicationListMetaControl
			$this->mctCommunicationList->DeleteCommunicationList();
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