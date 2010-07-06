<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Person class.  It uses the code-generated
	 * PersonMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Person columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both person_edit.php AND
	 * person_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class PersonEditPanel extends QPanel {
		// Local instance of the PersonMetaControl
		protected $mctPerson;

		// Controls for Person's Data Fields
		public $lblId;
		public $lstMembershipStatusType;
		public $lstMaritalStatusType;
		public $txtFirstName;
		public $txtMiddleName;
		public $txtLastName;
		public $txtMailingLabel;
		public $txtPriorLastNames;
		public $txtNickname;
		public $txtTitle;
		public $txtSuffix;
		public $txtGender;
		public $calDateOfBirth;
		public $chkDobApproximateFlag;
		public $chkDeceasedFlag;
		public $calDateDeceased;
		public $lstCurrentHeadShot;
		public $lstMailingAddress;
		public $lstStewardshipAddress;
		public $lstPrimaryPhone;
		public $lstPrimaryEmail;
		public $chkCanMailFlag;
		public $chkCanPhoneFlag;
		public $chkCanEmailFlag;
		public $txtPrimaryAddressText;
		public $txtPrimaryCityText;
		public $txtPrimaryPhoneText;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstHouseholdAsHead;
		public $lstCommunicationLists;
		public $lstNameItems;

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
			$this->strTemplate = 'PersonEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the PersonMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctPerson = PersonMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on Person's data fields
			$this->lblId = $this->mctPerson->lblId_Create();
			$this->lstMembershipStatusType = $this->mctPerson->lstMembershipStatusType_Create();
			$this->lstMaritalStatusType = $this->mctPerson->lstMaritalStatusType_Create();
			$this->txtFirstName = $this->mctPerson->txtFirstName_Create();
			$this->txtMiddleName = $this->mctPerson->txtMiddleName_Create();
			$this->txtLastName = $this->mctPerson->txtLastName_Create();
			$this->txtMailingLabel = $this->mctPerson->txtMailingLabel_Create();
			$this->txtPriorLastNames = $this->mctPerson->txtPriorLastNames_Create();
			$this->txtNickname = $this->mctPerson->txtNickname_Create();
			$this->txtTitle = $this->mctPerson->txtTitle_Create();
			$this->txtSuffix = $this->mctPerson->txtSuffix_Create();
			$this->txtGender = $this->mctPerson->txtGender_Create();
			$this->calDateOfBirth = $this->mctPerson->calDateOfBirth_Create();
			$this->chkDobApproximateFlag = $this->mctPerson->chkDobApproximateFlag_Create();
			$this->chkDeceasedFlag = $this->mctPerson->chkDeceasedFlag_Create();
			$this->calDateDeceased = $this->mctPerson->calDateDeceased_Create();
			$this->lstCurrentHeadShot = $this->mctPerson->lstCurrentHeadShot_Create();
			$this->lstMailingAddress = $this->mctPerson->lstMailingAddress_Create();
			$this->lstStewardshipAddress = $this->mctPerson->lstStewardshipAddress_Create();
			$this->lstPrimaryPhone = $this->mctPerson->lstPrimaryPhone_Create();
			$this->lstPrimaryEmail = $this->mctPerson->lstPrimaryEmail_Create();
			$this->chkCanMailFlag = $this->mctPerson->chkCanMailFlag_Create();
			$this->chkCanPhoneFlag = $this->mctPerson->chkCanPhoneFlag_Create();
			$this->chkCanEmailFlag = $this->mctPerson->chkCanEmailFlag_Create();
			$this->txtPrimaryAddressText = $this->mctPerson->txtPrimaryAddressText_Create();
			$this->txtPrimaryCityText = $this->mctPerson->txtPrimaryCityText_Create();
			$this->txtPrimaryPhoneText = $this->mctPerson->txtPrimaryPhoneText_Create();
			$this->lstHouseholdAsHead = $this->mctPerson->lstHouseholdAsHead_Create();
			$this->lstCommunicationLists = $this->mctPerson->lstCommunicationLists_Create();
			$this->lstNameItems = $this->mctPerson->lstNameItems_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('Person') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctPerson->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the PersonMetaControl
			$this->mctPerson->SavePerson();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the PersonMetaControl
			$this->mctPerson->DeletePerson();
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