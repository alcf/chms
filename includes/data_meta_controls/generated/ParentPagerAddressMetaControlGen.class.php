<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ParentPagerAddress class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ParentPagerAddress object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ParentPagerAddressMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ParentPagerAddress $ParentPagerAddress the actual ParentPagerAddress data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $ServerIdentifierControl
	 * property-read QLabel $ServerIdentifierLabel
	 * property QListBox $ParentPagerIndividualIdControl
	 * property-read QLabel $ParentPagerIndividualIdLabel
	 * property QListBox $ParentPagerHouseholdIdControl
	 * property-read QLabel $ParentPagerHouseholdIdLabel
	 * property QTextBox $Address1Control
	 * property-read QLabel $Address1Label
	 * property QTextBox $Address2Control
	 * property-read QLabel $Address2Label
	 * property QTextBox $Address3Control
	 * property-read QLabel $Address3Label
	 * property QTextBox $CityControl
	 * property-read QLabel $CityLabel
	 * property QTextBox $StateControl
	 * property-read QLabel $StateLabel
	 * property QTextBox $ZipCodeControl
	 * property-read QLabel $ZipCodeLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ParentPagerAddressMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ParentPagerAddress objParentPagerAddress
		 * @access protected
		 */
		protected $objParentPagerAddress;

		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;

		/**
		 * @var string  strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;

		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of ParentPagerAddress's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QIntegerTextBox txtServerIdentifier;
         * @access protected
         */
		protected $txtServerIdentifier;

        /**
         * @var QListBox lstParentPagerIndividual;
         * @access protected
         */
		protected $lstParentPagerIndividual;

        /**
         * @var QListBox lstParentPagerHousehold;
         * @access protected
         */
		protected $lstParentPagerHousehold;

        /**
         * @var QTextBox txtAddress1;
         * @access protected
         */
		protected $txtAddress1;

        /**
         * @var QTextBox txtAddress2;
         * @access protected
         */
		protected $txtAddress2;

        /**
         * @var QTextBox txtAddress3;
         * @access protected
         */
		protected $txtAddress3;

        /**
         * @var QTextBox txtCity;
         * @access protected
         */
		protected $txtCity;

        /**
         * @var QTextBox txtState;
         * @access protected
         */
		protected $txtState;

        /**
         * @var QTextBox txtZipCode;
         * @access protected
         */
		protected $txtZipCode;


		// Controls that allow the viewing of ParentPagerAddress's individual data fields
        /**
         * @var QLabel lblServerIdentifier
         * @access protected
         */
		protected $lblServerIdentifier;

        /**
         * @var QLabel lblParentPagerIndividualId
         * @access protected
         */
		protected $lblParentPagerIndividualId;

        /**
         * @var QLabel lblParentPagerHouseholdId
         * @access protected
         */
		protected $lblParentPagerHouseholdId;

        /**
         * @var QLabel lblAddress1
         * @access protected
         */
		protected $lblAddress1;

        /**
         * @var QLabel lblAddress2
         * @access protected
         */
		protected $lblAddress2;

        /**
         * @var QLabel lblAddress3
         * @access protected
         */
		protected $lblAddress3;

        /**
         * @var QLabel lblCity
         * @access protected
         */
		protected $lblCity;

        /**
         * @var QLabel lblState
         * @access protected
         */
		protected $lblState;

        /**
         * @var QLabel lblZipCode
         * @access protected
         */
		protected $lblZipCode;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ParentPagerAddressMetaControl to edit a single ParentPagerAddress object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ParentPagerAddress object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerAddressMetaControl
		 * @param ParentPagerAddress $objParentPagerAddress new or existing ParentPagerAddress object
		 */
		 public function __construct($objParentObject, ParentPagerAddress $objParentPagerAddress) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ParentPagerAddressMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ParentPagerAddress object
			$this->objParentPagerAddress = $objParentPagerAddress;

			// Figure out if we're Editing or Creating New
			if ($this->objParentPagerAddress->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerAddressMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerAddress object creation - defaults to CreateOrEdit
 		 * @return ParentPagerAddressMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objParentPagerAddress = ParentPagerAddress::Load($intId);

				// ParentPagerAddress was found -- return it!
				if ($objParentPagerAddress)
					return new ParentPagerAddressMetaControl($objParentObject, $objParentPagerAddress);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ParentPagerAddress object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ParentPagerAddressMetaControl($objParentObject, new ParentPagerAddress());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerAddressMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerAddress object creation - defaults to CreateOrEdit
		 * @return ParentPagerAddressMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ParentPagerAddressMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerAddressMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerAddress object creation - defaults to CreateOrEdit
		 * @return ParentPagerAddressMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ParentPagerAddressMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objParentPagerAddress->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtServerIdentifier
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtServerIdentifier_Create($strControlId = null) {
			$this->txtServerIdentifier = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtServerIdentifier->Name = QApplication::Translate('Server Identifier');
			$this->txtServerIdentifier->Text = $this->objParentPagerAddress->ServerIdentifier;
			$this->txtServerIdentifier->Required = true;
			return $this->txtServerIdentifier;
		}

		/**
		 * Create and setup QLabel lblServerIdentifier
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblServerIdentifier_Create($strControlId = null, $strFormat = null) {
			$this->lblServerIdentifier = new QLabel($this->objParentObject, $strControlId);
			$this->lblServerIdentifier->Name = QApplication::Translate('Server Identifier');
			$this->lblServerIdentifier->Text = $this->objParentPagerAddress->ServerIdentifier;
			$this->lblServerIdentifier->Required = true;
			$this->lblServerIdentifier->Format = $strFormat;
			return $this->lblServerIdentifier;
		}

		/**
		 * Create and setup QListBox lstParentPagerIndividual
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstParentPagerIndividual_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentPagerIndividual = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentPagerIndividual->Name = QApplication::Translate('Parent Pager Individual');
			$this->lstParentPagerIndividual->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentPagerIndividualCursor = ParentPagerIndividual::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objParentPagerIndividual = ParentPagerIndividual::InstantiateCursor($objParentPagerIndividualCursor)) {
				$objListItem = new QListItem($objParentPagerIndividual->__toString(), $objParentPagerIndividual->Id);
				if (($this->objParentPagerAddress->ParentPagerIndividual) && ($this->objParentPagerAddress->ParentPagerIndividual->Id == $objParentPagerIndividual->Id))
					$objListItem->Selected = true;
				$this->lstParentPagerIndividual->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentPagerIndividual;
		}

		/**
		 * Create and setup QLabel lblParentPagerIndividualId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentPagerIndividualId_Create($strControlId = null) {
			$this->lblParentPagerIndividualId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentPagerIndividualId->Name = QApplication::Translate('Parent Pager Individual');
			$this->lblParentPagerIndividualId->Text = ($this->objParentPagerAddress->ParentPagerIndividual) ? $this->objParentPagerAddress->ParentPagerIndividual->__toString() : null;
			return $this->lblParentPagerIndividualId;
		}

		/**
		 * Create and setup QListBox lstParentPagerHousehold
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstParentPagerHousehold_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstParentPagerHousehold = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentPagerHousehold->Name = QApplication::Translate('Parent Pager Household');
			$this->lstParentPagerHousehold->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objParentPagerHouseholdCursor = ParentPagerHousehold::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objParentPagerHousehold = ParentPagerHousehold::InstantiateCursor($objParentPagerHouseholdCursor)) {
				$objListItem = new QListItem($objParentPagerHousehold->__toString(), $objParentPagerHousehold->Id);
				if (($this->objParentPagerAddress->ParentPagerHousehold) && ($this->objParentPagerAddress->ParentPagerHousehold->Id == $objParentPagerHousehold->Id))
					$objListItem->Selected = true;
				$this->lstParentPagerHousehold->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstParentPagerHousehold;
		}

		/**
		 * Create and setup QLabel lblParentPagerHouseholdId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentPagerHouseholdId_Create($strControlId = null) {
			$this->lblParentPagerHouseholdId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentPagerHouseholdId->Name = QApplication::Translate('Parent Pager Household');
			$this->lblParentPagerHouseholdId->Text = ($this->objParentPagerAddress->ParentPagerHousehold) ? $this->objParentPagerAddress->ParentPagerHousehold->__toString() : null;
			return $this->lblParentPagerHouseholdId;
		}

		/**
		 * Create and setup QTextBox txtAddress1
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress1_Create($strControlId = null) {
			$this->txtAddress1 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress1->Name = QApplication::Translate('Address 1');
			$this->txtAddress1->Text = $this->objParentPagerAddress->Address1;
			$this->txtAddress1->MaxLength = ParentPagerAddress::Address1MaxLength;
			return $this->txtAddress1;
		}

		/**
		 * Create and setup QLabel lblAddress1
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress1_Create($strControlId = null) {
			$this->lblAddress1 = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress1->Name = QApplication::Translate('Address 1');
			$this->lblAddress1->Text = $this->objParentPagerAddress->Address1;
			return $this->lblAddress1;
		}

		/**
		 * Create and setup QTextBox txtAddress2
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress2_Create($strControlId = null) {
			$this->txtAddress2 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress2->Name = QApplication::Translate('Address 2');
			$this->txtAddress2->Text = $this->objParentPagerAddress->Address2;
			$this->txtAddress2->MaxLength = ParentPagerAddress::Address2MaxLength;
			return $this->txtAddress2;
		}

		/**
		 * Create and setup QLabel lblAddress2
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress2_Create($strControlId = null) {
			$this->lblAddress2 = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress2->Name = QApplication::Translate('Address 2');
			$this->lblAddress2->Text = $this->objParentPagerAddress->Address2;
			return $this->lblAddress2;
		}

		/**
		 * Create and setup QTextBox txtAddress3
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress3_Create($strControlId = null) {
			$this->txtAddress3 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress3->Name = QApplication::Translate('Address 3');
			$this->txtAddress3->Text = $this->objParentPagerAddress->Address3;
			$this->txtAddress3->MaxLength = ParentPagerAddress::Address3MaxLength;
			return $this->txtAddress3;
		}

		/**
		 * Create and setup QLabel lblAddress3
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress3_Create($strControlId = null) {
			$this->lblAddress3 = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress3->Name = QApplication::Translate('Address 3');
			$this->lblAddress3->Text = $this->objParentPagerAddress->Address3;
			return $this->lblAddress3;
		}

		/**
		 * Create and setup QTextBox txtCity
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCity_Create($strControlId = null) {
			$this->txtCity = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCity->Name = QApplication::Translate('City');
			$this->txtCity->Text = $this->objParentPagerAddress->City;
			$this->txtCity->MaxLength = ParentPagerAddress::CityMaxLength;
			return $this->txtCity;
		}

		/**
		 * Create and setup QLabel lblCity
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCity_Create($strControlId = null) {
			$this->lblCity = new QLabel($this->objParentObject, $strControlId);
			$this->lblCity->Name = QApplication::Translate('City');
			$this->lblCity->Text = $this->objParentPagerAddress->City;
			return $this->lblCity;
		}

		/**
		 * Create and setup QTextBox txtState
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtState_Create($strControlId = null) {
			$this->txtState = new QTextBox($this->objParentObject, $strControlId);
			$this->txtState->Name = QApplication::Translate('State');
			$this->txtState->Text = $this->objParentPagerAddress->State;
			$this->txtState->MaxLength = ParentPagerAddress::StateMaxLength;
			return $this->txtState;
		}

		/**
		 * Create and setup QLabel lblState
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblState_Create($strControlId = null) {
			$this->lblState = new QLabel($this->objParentObject, $strControlId);
			$this->lblState->Name = QApplication::Translate('State');
			$this->lblState->Text = $this->objParentPagerAddress->State;
			return $this->lblState;
		}

		/**
		 * Create and setup QTextBox txtZipCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtZipCode_Create($strControlId = null) {
			$this->txtZipCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtZipCode->Name = QApplication::Translate('Zip Code');
			$this->txtZipCode->Text = $this->objParentPagerAddress->ZipCode;
			$this->txtZipCode->MaxLength = ParentPagerAddress::ZipCodeMaxLength;
			return $this->txtZipCode;
		}

		/**
		 * Create and setup QLabel lblZipCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblZipCode_Create($strControlId = null) {
			$this->lblZipCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblZipCode->Name = QApplication::Translate('Zip Code');
			$this->lblZipCode->Text = $this->objParentPagerAddress->ZipCode;
			return $this->lblZipCode;
		}



		/**
		 * Refresh this MetaControl with Data from the local ParentPagerAddress object.
		 * @param boolean $blnReload reload ParentPagerAddress from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objParentPagerAddress->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objParentPagerAddress->Id;

			if ($this->txtServerIdentifier) $this->txtServerIdentifier->Text = $this->objParentPagerAddress->ServerIdentifier;
			if ($this->lblServerIdentifier) $this->lblServerIdentifier->Text = $this->objParentPagerAddress->ServerIdentifier;

			if ($this->lstParentPagerIndividual) {
					$this->lstParentPagerIndividual->RemoveAllItems();
				$this->lstParentPagerIndividual->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentPagerIndividualArray = ParentPagerIndividual::LoadAll();
				if ($objParentPagerIndividualArray) foreach ($objParentPagerIndividualArray as $objParentPagerIndividual) {
					$objListItem = new QListItem($objParentPagerIndividual->__toString(), $objParentPagerIndividual->Id);
					if (($this->objParentPagerAddress->ParentPagerIndividual) && ($this->objParentPagerAddress->ParentPagerIndividual->Id == $objParentPagerIndividual->Id))
						$objListItem->Selected = true;
					$this->lstParentPagerIndividual->AddItem($objListItem);
				}
			}
			if ($this->lblParentPagerIndividualId) $this->lblParentPagerIndividualId->Text = ($this->objParentPagerAddress->ParentPagerIndividual) ? $this->objParentPagerAddress->ParentPagerIndividual->__toString() : null;

			if ($this->lstParentPagerHousehold) {
					$this->lstParentPagerHousehold->RemoveAllItems();
				$this->lstParentPagerHousehold->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentPagerHouseholdArray = ParentPagerHousehold::LoadAll();
				if ($objParentPagerHouseholdArray) foreach ($objParentPagerHouseholdArray as $objParentPagerHousehold) {
					$objListItem = new QListItem($objParentPagerHousehold->__toString(), $objParentPagerHousehold->Id);
					if (($this->objParentPagerAddress->ParentPagerHousehold) && ($this->objParentPagerAddress->ParentPagerHousehold->Id == $objParentPagerHousehold->Id))
						$objListItem->Selected = true;
					$this->lstParentPagerHousehold->AddItem($objListItem);
				}
			}
			if ($this->lblParentPagerHouseholdId) $this->lblParentPagerHouseholdId->Text = ($this->objParentPagerAddress->ParentPagerHousehold) ? $this->objParentPagerAddress->ParentPagerHousehold->__toString() : null;

			if ($this->txtAddress1) $this->txtAddress1->Text = $this->objParentPagerAddress->Address1;
			if ($this->lblAddress1) $this->lblAddress1->Text = $this->objParentPagerAddress->Address1;

			if ($this->txtAddress2) $this->txtAddress2->Text = $this->objParentPagerAddress->Address2;
			if ($this->lblAddress2) $this->lblAddress2->Text = $this->objParentPagerAddress->Address2;

			if ($this->txtAddress3) $this->txtAddress3->Text = $this->objParentPagerAddress->Address3;
			if ($this->lblAddress3) $this->lblAddress3->Text = $this->objParentPagerAddress->Address3;

			if ($this->txtCity) $this->txtCity->Text = $this->objParentPagerAddress->City;
			if ($this->lblCity) $this->lblCity->Text = $this->objParentPagerAddress->City;

			if ($this->txtState) $this->txtState->Text = $this->objParentPagerAddress->State;
			if ($this->lblState) $this->lblState->Text = $this->objParentPagerAddress->State;

			if ($this->txtZipCode) $this->txtZipCode->Text = $this->objParentPagerAddress->ZipCode;
			if ($this->lblZipCode) $this->lblZipCode->Text = $this->objParentPagerAddress->ZipCode;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PARENTPAGERADDRESS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ParentPagerAddress instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveParentPagerAddress() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtServerIdentifier) $this->objParentPagerAddress->ServerIdentifier = $this->txtServerIdentifier->Text;
				if ($this->lstParentPagerIndividual) $this->objParentPagerAddress->ParentPagerIndividualId = $this->lstParentPagerIndividual->SelectedValue;
				if ($this->lstParentPagerHousehold) $this->objParentPagerAddress->ParentPagerHouseholdId = $this->lstParentPagerHousehold->SelectedValue;
				if ($this->txtAddress1) $this->objParentPagerAddress->Address1 = $this->txtAddress1->Text;
				if ($this->txtAddress2) $this->objParentPagerAddress->Address2 = $this->txtAddress2->Text;
				if ($this->txtAddress3) $this->objParentPagerAddress->Address3 = $this->txtAddress3->Text;
				if ($this->txtCity) $this->objParentPagerAddress->City = $this->txtCity->Text;
				if ($this->txtState) $this->objParentPagerAddress->State = $this->txtState->Text;
				if ($this->txtZipCode) $this->objParentPagerAddress->ZipCode = $this->txtZipCode->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ParentPagerAddress object
				$this->objParentPagerAddress->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ParentPagerAddress instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteParentPagerAddress() {
			$this->objParentPagerAddress->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'ParentPagerAddress': return $this->objParentPagerAddress;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ParentPagerAddress fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ServerIdentifierControl':
					if (!$this->txtServerIdentifier) return $this->txtServerIdentifier_Create();
					return $this->txtServerIdentifier;
				case 'ServerIdentifierLabel':
					if (!$this->lblServerIdentifier) return $this->lblServerIdentifier_Create();
					return $this->lblServerIdentifier;
				case 'ParentPagerIndividualIdControl':
					if (!$this->lstParentPagerIndividual) return $this->lstParentPagerIndividual_Create();
					return $this->lstParentPagerIndividual;
				case 'ParentPagerIndividualIdLabel':
					if (!$this->lblParentPagerIndividualId) return $this->lblParentPagerIndividualId_Create();
					return $this->lblParentPagerIndividualId;
				case 'ParentPagerHouseholdIdControl':
					if (!$this->lstParentPagerHousehold) return $this->lstParentPagerHousehold_Create();
					return $this->lstParentPagerHousehold;
				case 'ParentPagerHouseholdIdLabel':
					if (!$this->lblParentPagerHouseholdId) return $this->lblParentPagerHouseholdId_Create();
					return $this->lblParentPagerHouseholdId;
				case 'Address1Control':
					if (!$this->txtAddress1) return $this->txtAddress1_Create();
					return $this->txtAddress1;
				case 'Address1Label':
					if (!$this->lblAddress1) return $this->lblAddress1_Create();
					return $this->lblAddress1;
				case 'Address2Control':
					if (!$this->txtAddress2) return $this->txtAddress2_Create();
					return $this->txtAddress2;
				case 'Address2Label':
					if (!$this->lblAddress2) return $this->lblAddress2_Create();
					return $this->lblAddress2;
				case 'Address3Control':
					if (!$this->txtAddress3) return $this->txtAddress3_Create();
					return $this->txtAddress3;
				case 'Address3Label':
					if (!$this->lblAddress3) return $this->lblAddress3_Create();
					return $this->lblAddress3;
				case 'CityControl':
					if (!$this->txtCity) return $this->txtCity_Create();
					return $this->txtCity;
				case 'CityLabel':
					if (!$this->lblCity) return $this->lblCity_Create();
					return $this->lblCity;
				case 'StateControl':
					if (!$this->txtState) return $this->txtState_Create();
					return $this->txtState;
				case 'StateLabel':
					if (!$this->lblState) return $this->lblState_Create();
					return $this->lblState;
				case 'ZipCodeControl':
					if (!$this->txtZipCode) return $this->txtZipCode_Create();
					return $this->txtZipCode;
				case 'ZipCodeLabel':
					if (!$this->lblZipCode) return $this->lblZipCode_Create();
					return $this->lblZipCode;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			try {
				switch ($strName) {
					// Controls that point to ParentPagerAddress fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ServerIdentifierControl':
						return ($this->txtServerIdentifier = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerIndividualIdControl':
						return ($this->lstParentPagerIndividual = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerHouseholdIdControl':
						return ($this->lstParentPagerHousehold = QType::Cast($mixValue, 'QControl'));
					case 'Address1Control':
						return ($this->txtAddress1 = QType::Cast($mixValue, 'QControl'));
					case 'Address2Control':
						return ($this->txtAddress2 = QType::Cast($mixValue, 'QControl'));
					case 'Address3Control':
						return ($this->txtAddress3 = QType::Cast($mixValue, 'QControl'));
					case 'CityControl':
						return ($this->txtCity = QType::Cast($mixValue, 'QControl'));
					case 'StateControl':
						return ($this->txtState = QType::Cast($mixValue, 'QControl'));
					case 'ZipCodeControl':
						return ($this->txtZipCode = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>