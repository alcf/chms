<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Address class.  It uses the code-generated
	 * AddressMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Address columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both address_edit.php AND
	 * address_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class AddressEditPanel extends QPanel {
		// Local instance of the AddressMetaControl
		protected $mctAddress;

		// Controls for Address's Data Fields
		public $lblId;
		public $lstAddressType;
		public $lstPerson;
		public $lstHousehold;
		public $lstPrimaryPhone;
		public $txtAddress1;
		public $txtAddress2;
		public $txtAddress3;
		public $txtCity;
		public $txtState;
		public $txtZipCode;
		public $txtCountry;
		public $chkCurrentFlag;
		public $chkInvalidFlag;
		public $chkVerificationCheckedFlag;
		public $calDateUntilWhen;

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
			$this->strTemplate = 'AddressEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the AddressMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctAddress = AddressMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on Address's data fields
			$this->lblId = $this->mctAddress->lblId_Create();
			$this->lstAddressType = $this->mctAddress->lstAddressType_Create();
			$this->lstPerson = $this->mctAddress->lstPerson_Create();
			$this->lstHousehold = $this->mctAddress->lstHousehold_Create();
			$this->lstPrimaryPhone = $this->mctAddress->lstPrimaryPhone_Create();
			$this->txtAddress1 = $this->mctAddress->txtAddress1_Create();
			$this->txtAddress2 = $this->mctAddress->txtAddress2_Create();
			$this->txtAddress3 = $this->mctAddress->txtAddress3_Create();
			$this->txtCity = $this->mctAddress->txtCity_Create();
			$this->txtState = $this->mctAddress->txtState_Create();
			$this->txtZipCode = $this->mctAddress->txtZipCode_Create();
			$this->txtCountry = $this->mctAddress->txtCountry_Create();
			$this->chkCurrentFlag = $this->mctAddress->chkCurrentFlag_Create();
			$this->chkInvalidFlag = $this->mctAddress->chkInvalidFlag_Create();
			$this->chkVerificationCheckedFlag = $this->mctAddress->chkVerificationCheckedFlag_Create();
			$this->calDateUntilWhen = $this->mctAddress->calDateUntilWhen_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('Address') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctAddress->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the AddressMetaControl
			$this->mctAddress->SaveAddress();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the AddressMetaControl
			$this->mctAddress->DeleteAddress();
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