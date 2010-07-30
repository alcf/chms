<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the EmailOutgoingQueue class.  It uses the code-generated
	 * EmailOutgoingQueueMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a EmailOutgoingQueue columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both email_outgoing_queue_edit.php AND
	 * email_outgoing_queue_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class EmailOutgoingQueueEditPanel extends QPanel {
		// Local instance of the EmailOutgoingQueueMetaControl
		protected $mctEmailOutgoingQueue;

		// Controls for EmailOutgoingQueue's Data Fields
		public $lblId;
		public $lstEmailMessage;
		public $txtSendToEmailAddress;
		public $txtToken;

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
			$this->strTemplate = 'EmailOutgoingQueueEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the EmailOutgoingQueueMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctEmailOutgoingQueue = EmailOutgoingQueueMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on EmailOutgoingQueue's data fields
			$this->lblId = $this->mctEmailOutgoingQueue->lblId_Create();
			$this->lstEmailMessage = $this->mctEmailOutgoingQueue->lstEmailMessage_Create();
			$this->txtSendToEmailAddress = $this->mctEmailOutgoingQueue->txtSendToEmailAddress_Create();
			$this->txtToken = $this->mctEmailOutgoingQueue->txtToken_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('EmailOutgoingQueue') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctEmailOutgoingQueue->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the EmailOutgoingQueueMetaControl
			$this->mctEmailOutgoingQueue->SaveEmailOutgoingQueue();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the EmailOutgoingQueueMetaControl
			$this->mctEmailOutgoingQueue->DeleteEmailOutgoingQueue();
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