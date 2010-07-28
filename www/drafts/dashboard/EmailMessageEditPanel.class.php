<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the EmailMessage class.  It uses the code-generated
	 * EmailMessageMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a EmailMessage columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both email_message_edit.php AND
	 * email_message_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class EmailMessageEditPanel extends QPanel {
		// Local instance of the EmailMessageMetaControl
		protected $mctEmailMessage;

		// Controls for EmailMessage's Data Fields
		public $lblId;
		public $lstEmailMessageStatusType;
		public $calDateReceived;
		public $txtRawMessage;
		public $txtMessageIdentifier;
		public $lstReceivedFromPerson;
		public $lstReceivedFromEntry;
		public $lstGroup;
		public $lstCommunicationList;
		public $txtSubject;
		public $txtResponseMessage;

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
			$this->strTemplate = 'EmailMessageEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the EmailMessageMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctEmailMessage = EmailMessageMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on EmailMessage's data fields
			$this->lblId = $this->mctEmailMessage->lblId_Create();
			$this->lstEmailMessageStatusType = $this->mctEmailMessage->lstEmailMessageStatusType_Create();
			$this->calDateReceived = $this->mctEmailMessage->calDateReceived_Create();
			$this->txtRawMessage = $this->mctEmailMessage->txtRawMessage_Create();
			$this->txtMessageIdentifier = $this->mctEmailMessage->txtMessageIdentifier_Create();
			$this->lstReceivedFromPerson = $this->mctEmailMessage->lstReceivedFromPerson_Create();
			$this->lstReceivedFromEntry = $this->mctEmailMessage->lstReceivedFromEntry_Create();
			$this->lstGroup = $this->mctEmailMessage->lstGroup_Create();
			$this->lstCommunicationList = $this->mctEmailMessage->lstCommunicationList_Create();
			$this->txtSubject = $this->mctEmailMessage->txtSubject_Create();
			$this->txtResponseMessage = $this->mctEmailMessage->txtResponseMessage_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('EmailMessage') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctEmailMessage->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the EmailMessageMetaControl
			$this->mctEmailMessage->SaveEmailMessage();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the EmailMessageMetaControl
			$this->mctEmailMessage->DeleteEmailMessage();
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