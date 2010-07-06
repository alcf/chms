<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the AttributeValue class.  It uses the code-generated
	 * AttributeValueMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a AttributeValue columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both attribute_value_edit.php AND
	 * attribute_value_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class AttributeValueEditPanel extends QPanel {
		// Local instance of the AttributeValueMetaControl
		protected $mctAttributeValue;

		// Controls for AttributeValue's Data Fields
		public $lblId;
		public $lstAttribute;
		public $lstPerson;
		public $calDateValue;
		public $calDatetimeValue;
		public $txtTextValue;
		public $chkBooleanValue;
		public $lstSingleAttributeOption;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstAttributeOptionsAsMultiple;

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
			$this->strTemplate = 'AttributeValueEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the AttributeValueMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctAttributeValue = AttributeValueMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on AttributeValue's data fields
			$this->lblId = $this->mctAttributeValue->lblId_Create();
			$this->lstAttribute = $this->mctAttributeValue->lstAttribute_Create();
			$this->lstPerson = $this->mctAttributeValue->lstPerson_Create();
			$this->calDateValue = $this->mctAttributeValue->calDateValue_Create();
			$this->calDatetimeValue = $this->mctAttributeValue->calDatetimeValue_Create();
			$this->txtTextValue = $this->mctAttributeValue->txtTextValue_Create();
			$this->chkBooleanValue = $this->mctAttributeValue->chkBooleanValue_Create();
			$this->lstSingleAttributeOption = $this->mctAttributeValue->lstSingleAttributeOption_Create();
			$this->lstAttributeOptionsAsMultiple = $this->mctAttributeValue->lstAttributeOptionsAsMultiple_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('AttributeValue') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctAttributeValue->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the AttributeValueMetaControl
			$this->mctAttributeValue->SaveAttributeValue();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the AttributeValueMetaControl
			$this->mctAttributeValue->DeleteAttributeValue();
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