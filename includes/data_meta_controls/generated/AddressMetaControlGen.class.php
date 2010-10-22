<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Address class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Address object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AddressMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Address $Address the actual Address data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $AddressTypeIdControl
	 * property-read QLabel $AddressTypeIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $HouseholdIdControl
	 * property-read QLabel $HouseholdIdLabel
	 * property QListBox $PrimaryPhoneIdControl
	 * property-read QLabel $PrimaryPhoneIdLabel
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
	 * property QTextBox $CountryControl
	 * property-read QLabel $CountryLabel
	 * property QCheckBox $CurrentFlagControl
	 * property-read QLabel $CurrentFlagLabel
	 * property QCheckBox $InvalidFlagControl
	 * property-read QLabel $InvalidFlagLabel
	 * property QCheckBox $VerificationCheckedFlagControl
	 * property-read QLabel $VerificationCheckedFlagLabel
	 * property QDateTimePicker $DateUntilWhenControl
	 * property-read QLabel $DateUntilWhenLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AddressMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Address objAddress
		 * @access protected
		 */
		protected $objAddress;

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

		// Controls that allow the editing of Address's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstAddressType;
         * @access protected
         */
		protected $lstAddressType;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

        /**
         * @var QListBox lstHousehold;
         * @access protected
         */
		protected $lstHousehold;

        /**
         * @var QListBox lstPrimaryPhone;
         * @access protected
         */
		protected $lstPrimaryPhone;

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

        /**
         * @var QTextBox txtCountry;
         * @access protected
         */
		protected $txtCountry;

        /**
         * @var QCheckBox chkCurrentFlag;
         * @access protected
         */
		protected $chkCurrentFlag;

        /**
         * @var QCheckBox chkInvalidFlag;
         * @access protected
         */
		protected $chkInvalidFlag;

        /**
         * @var QCheckBox chkVerificationCheckedFlag;
         * @access protected
         */
		protected $chkVerificationCheckedFlag;

        /**
         * @var QDateTimePicker calDateUntilWhen;
         * @access protected
         */
		protected $calDateUntilWhen;


		// Controls that allow the viewing of Address's individual data fields
        /**
         * @var QLabel lblAddressTypeId
         * @access protected
         */
		protected $lblAddressTypeId;

        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblHouseholdId
         * @access protected
         */
		protected $lblHouseholdId;

        /**
         * @var QLabel lblPrimaryPhoneId
         * @access protected
         */
		protected $lblPrimaryPhoneId;

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

        /**
         * @var QLabel lblCountry
         * @access protected
         */
		protected $lblCountry;

        /**
         * @var QLabel lblCurrentFlag
         * @access protected
         */
		protected $lblCurrentFlag;

        /**
         * @var QLabel lblInvalidFlag
         * @access protected
         */
		protected $lblInvalidFlag;

        /**
         * @var QLabel lblVerificationCheckedFlag
         * @access protected
         */
		protected $lblVerificationCheckedFlag;

        /**
         * @var QLabel lblDateUntilWhen
         * @access protected
         */
		protected $lblDateUntilWhen;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AddressMetaControl to edit a single Address object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Address object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param Address $objAddress new or existing Address object
		 */
		 public function __construct($objParentObject, Address $objAddress) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AddressMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Address object
			$this->objAddress = $objAddress;

			// Figure out if we're Editing or Creating New
			if ($this->objAddress->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Address object creation - defaults to CreateOrEdit
 		 * @return AddressMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objAddress = Address::Load($intId);

				// Address was found -- return it!
				if ($objAddress)
					return new AddressMetaControl($objParentObject, $objAddress);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Address object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AddressMetaControl($objParentObject, new Address());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Address object creation - defaults to CreateOrEdit
		 * @return AddressMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return AddressMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Address object creation - defaults to CreateOrEdit
		 * @return AddressMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return AddressMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objAddress->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstAddressType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstAddressType_Create($strControlId = null) {
			$this->lstAddressType = new QListBox($this->objParentObject, $strControlId);
			$this->lstAddressType->Name = QApplication::Translate('Address Type');
			$this->lstAddressType->Required = true;
			foreach (AddressType::$NameArray as $intId => $strValue)
				$this->lstAddressType->AddItem(new QListItem($strValue, $intId, $this->objAddress->AddressTypeId == $intId));
			return $this->lstAddressType;
		}

		/**
		 * Create and setup QLabel lblAddressTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddressTypeId_Create($strControlId = null) {
			$this->lblAddressTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddressTypeId->Name = QApplication::Translate('Address Type');
			$this->lblAddressTypeId->Text = ($this->objAddress->AddressTypeId) ? AddressType::$NameArray[$this->objAddress->AddressTypeId] : null;
			$this->lblAddressTypeId->Required = true;
			return $this->lblAddressTypeId;
		}

		/**
		 * Create and setup QListBox lstPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPerson->Name = QApplication::Translate('Person');
			$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objAddress->Person) && ($this->objAddress->Person->Id == $objPerson->Id))
					$objListItem->Selected = true;
				$this->lstPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPerson;
		}

		/**
		 * Create and setup QLabel lblPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPersonId_Create($strControlId = null) {
			$this->lblPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPersonId->Name = QApplication::Translate('Person');
			$this->lblPersonId->Text = ($this->objAddress->Person) ? $this->objAddress->Person->__toString() : null;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstHousehold
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstHousehold_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstHousehold = new QListBox($this->objParentObject, $strControlId);
			$this->lstHousehold->Name = QApplication::Translate('Household');
			$this->lstHousehold->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objHouseholdCursor = Household::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objHousehold = Household::InstantiateCursor($objHouseholdCursor)) {
				$objListItem = new QListItem($objHousehold->__toString(), $objHousehold->Id);
				if (($this->objAddress->Household) && ($this->objAddress->Household->Id == $objHousehold->Id))
					$objListItem->Selected = true;
				$this->lstHousehold->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstHousehold;
		}

		/**
		 * Create and setup QLabel lblHouseholdId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblHouseholdId_Create($strControlId = null) {
			$this->lblHouseholdId = new QLabel($this->objParentObject, $strControlId);
			$this->lblHouseholdId->Name = QApplication::Translate('Household');
			$this->lblHouseholdId->Text = ($this->objAddress->Household) ? $this->objAddress->Household->__toString() : null;
			return $this->lblHouseholdId;
		}

		/**
		 * Create and setup QListBox lstPrimaryPhone
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPrimaryPhone_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPrimaryPhone = new QListBox($this->objParentObject, $strControlId);
			$this->lstPrimaryPhone->Name = QApplication::Translate('Primary Phone');
			$this->lstPrimaryPhone->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPrimaryPhoneCursor = Phone::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPrimaryPhone = Phone::InstantiateCursor($objPrimaryPhoneCursor)) {
				$objListItem = new QListItem($objPrimaryPhone->__toString(), $objPrimaryPhone->Id);
				if (($this->objAddress->PrimaryPhone) && ($this->objAddress->PrimaryPhone->Id == $objPrimaryPhone->Id))
					$objListItem->Selected = true;
				$this->lstPrimaryPhone->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPrimaryPhone;
		}

		/**
		 * Create and setup QLabel lblPrimaryPhoneId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPrimaryPhoneId_Create($strControlId = null) {
			$this->lblPrimaryPhoneId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrimaryPhoneId->Name = QApplication::Translate('Primary Phone');
			$this->lblPrimaryPhoneId->Text = ($this->objAddress->PrimaryPhone) ? $this->objAddress->PrimaryPhone->__toString() : null;
			return $this->lblPrimaryPhoneId;
		}

		/**
		 * Create and setup QTextBox txtAddress1
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress1_Create($strControlId = null) {
			$this->txtAddress1 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress1->Name = QApplication::Translate('Address 1');
			$this->txtAddress1->Text = $this->objAddress->Address1;
			$this->txtAddress1->MaxLength = Address::Address1MaxLength;
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
			$this->lblAddress1->Text = $this->objAddress->Address1;
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
			$this->txtAddress2->Text = $this->objAddress->Address2;
			$this->txtAddress2->MaxLength = Address::Address2MaxLength;
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
			$this->lblAddress2->Text = $this->objAddress->Address2;
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
			$this->txtAddress3->Text = $this->objAddress->Address3;
			$this->txtAddress3->MaxLength = Address::Address3MaxLength;
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
			$this->lblAddress3->Text = $this->objAddress->Address3;
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
			$this->txtCity->Text = $this->objAddress->City;
			$this->txtCity->MaxLength = Address::CityMaxLength;
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
			$this->lblCity->Text = $this->objAddress->City;
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
			$this->txtState->Text = $this->objAddress->State;
			$this->txtState->MaxLength = Address::StateMaxLength;
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
			$this->lblState->Text = $this->objAddress->State;
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
			$this->txtZipCode->Text = $this->objAddress->ZipCode;
			$this->txtZipCode->MaxLength = Address::ZipCodeMaxLength;
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
			$this->lblZipCode->Text = $this->objAddress->ZipCode;
			return $this->lblZipCode;
		}

		/**
		 * Create and setup QTextBox txtCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCountry_Create($strControlId = null) {
			$this->txtCountry = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCountry->Name = QApplication::Translate('Country');
			$this->txtCountry->Text = $this->objAddress->Country;
			$this->txtCountry->MaxLength = Address::CountryMaxLength;
			return $this->txtCountry;
		}

		/**
		 * Create and setup QLabel lblCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCountry_Create($strControlId = null) {
			$this->lblCountry = new QLabel($this->objParentObject, $strControlId);
			$this->lblCountry->Name = QApplication::Translate('Country');
			$this->lblCountry->Text = $this->objAddress->Country;
			return $this->lblCountry;
		}

		/**
		 * Create and setup QCheckBox chkCurrentFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkCurrentFlag_Create($strControlId = null) {
			$this->chkCurrentFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkCurrentFlag->Name = QApplication::Translate('Current Flag');
			$this->chkCurrentFlag->Checked = $this->objAddress->CurrentFlag;
			return $this->chkCurrentFlag;
		}

		/**
		 * Create and setup QLabel lblCurrentFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCurrentFlag_Create($strControlId = null) {
			$this->lblCurrentFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblCurrentFlag->Name = QApplication::Translate('Current Flag');
			$this->lblCurrentFlag->Text = ($this->objAddress->CurrentFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblCurrentFlag;
		}

		/**
		 * Create and setup QCheckBox chkInvalidFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkInvalidFlag_Create($strControlId = null) {
			$this->chkInvalidFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkInvalidFlag->Name = QApplication::Translate('Invalid Flag');
			$this->chkInvalidFlag->Checked = $this->objAddress->InvalidFlag;
			return $this->chkInvalidFlag;
		}

		/**
		 * Create and setup QLabel lblInvalidFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInvalidFlag_Create($strControlId = null) {
			$this->lblInvalidFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblInvalidFlag->Name = QApplication::Translate('Invalid Flag');
			$this->lblInvalidFlag->Text = ($this->objAddress->InvalidFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblInvalidFlag;
		}

		/**
		 * Create and setup QCheckBox chkVerificationCheckedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkVerificationCheckedFlag_Create($strControlId = null) {
			$this->chkVerificationCheckedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkVerificationCheckedFlag->Name = QApplication::Translate('Verification Checked Flag');
			$this->chkVerificationCheckedFlag->Checked = $this->objAddress->VerificationCheckedFlag;
			return $this->chkVerificationCheckedFlag;
		}

		/**
		 * Create and setup QLabel lblVerificationCheckedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblVerificationCheckedFlag_Create($strControlId = null) {
			$this->lblVerificationCheckedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblVerificationCheckedFlag->Name = QApplication::Translate('Verification Checked Flag');
			$this->lblVerificationCheckedFlag->Text = ($this->objAddress->VerificationCheckedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblVerificationCheckedFlag;
		}

		/**
		 * Create and setup QDateTimePicker calDateUntilWhen
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateUntilWhen_Create($strControlId = null) {
			$this->calDateUntilWhen = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateUntilWhen->Name = QApplication::Translate('Date Until When');
			$this->calDateUntilWhen->DateTime = $this->objAddress->DateUntilWhen;
			$this->calDateUntilWhen->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateUntilWhen;
		}

		/**
		 * Create and setup QLabel lblDateUntilWhen
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateUntilWhen_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateUntilWhen = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateUntilWhen->Name = QApplication::Translate('Date Until When');
			$this->strDateUntilWhenDateTimeFormat = $strDateTimeFormat;
			$this->lblDateUntilWhen->Text = sprintf($this->objAddress->DateUntilWhen) ? $this->objAddress->DateUntilWhen->__toString($this->strDateUntilWhenDateTimeFormat) : null;
			return $this->lblDateUntilWhen;
		}

		protected $strDateUntilWhenDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local Address object.
		 * @param boolean $blnReload reload Address from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAddress->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objAddress->Id;

			if ($this->lstAddressType) $this->lstAddressType->SelectedValue = $this->objAddress->AddressTypeId;
			if ($this->lblAddressTypeId) $this->lblAddressTypeId->Text = ($this->objAddress->AddressTypeId) ? AddressType::$NameArray[$this->objAddress->AddressTypeId] : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objAddress->Person) && ($this->objAddress->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objAddress->Person) ? $this->objAddress->Person->__toString() : null;

			if ($this->lstHousehold) {
					$this->lstHousehold->RemoveAllItems();
				$this->lstHousehold->AddItem(QApplication::Translate('- Select One -'), null);
				$objHouseholdArray = Household::LoadAll();
				if ($objHouseholdArray) foreach ($objHouseholdArray as $objHousehold) {
					$objListItem = new QListItem($objHousehold->__toString(), $objHousehold->Id);
					if (($this->objAddress->Household) && ($this->objAddress->Household->Id == $objHousehold->Id))
						$objListItem->Selected = true;
					$this->lstHousehold->AddItem($objListItem);
				}
			}
			if ($this->lblHouseholdId) $this->lblHouseholdId->Text = ($this->objAddress->Household) ? $this->objAddress->Household->__toString() : null;

			if ($this->lstPrimaryPhone) {
					$this->lstPrimaryPhone->RemoveAllItems();
				$this->lstPrimaryPhone->AddItem(QApplication::Translate('- Select One -'), null);
				$objPrimaryPhoneArray = Phone::LoadAll();
				if ($objPrimaryPhoneArray) foreach ($objPrimaryPhoneArray as $objPrimaryPhone) {
					$objListItem = new QListItem($objPrimaryPhone->__toString(), $objPrimaryPhone->Id);
					if (($this->objAddress->PrimaryPhone) && ($this->objAddress->PrimaryPhone->Id == $objPrimaryPhone->Id))
						$objListItem->Selected = true;
					$this->lstPrimaryPhone->AddItem($objListItem);
				}
			}
			if ($this->lblPrimaryPhoneId) $this->lblPrimaryPhoneId->Text = ($this->objAddress->PrimaryPhone) ? $this->objAddress->PrimaryPhone->__toString() : null;

			if ($this->txtAddress1) $this->txtAddress1->Text = $this->objAddress->Address1;
			if ($this->lblAddress1) $this->lblAddress1->Text = $this->objAddress->Address1;

			if ($this->txtAddress2) $this->txtAddress2->Text = $this->objAddress->Address2;
			if ($this->lblAddress2) $this->lblAddress2->Text = $this->objAddress->Address2;

			if ($this->txtAddress3) $this->txtAddress3->Text = $this->objAddress->Address3;
			if ($this->lblAddress3) $this->lblAddress3->Text = $this->objAddress->Address3;

			if ($this->txtCity) $this->txtCity->Text = $this->objAddress->City;
			if ($this->lblCity) $this->lblCity->Text = $this->objAddress->City;

			if ($this->txtState) $this->txtState->Text = $this->objAddress->State;
			if ($this->lblState) $this->lblState->Text = $this->objAddress->State;

			if ($this->txtZipCode) $this->txtZipCode->Text = $this->objAddress->ZipCode;
			if ($this->lblZipCode) $this->lblZipCode->Text = $this->objAddress->ZipCode;

			if ($this->txtCountry) $this->txtCountry->Text = $this->objAddress->Country;
			if ($this->lblCountry) $this->lblCountry->Text = $this->objAddress->Country;

			if ($this->chkCurrentFlag) $this->chkCurrentFlag->Checked = $this->objAddress->CurrentFlag;
			if ($this->lblCurrentFlag) $this->lblCurrentFlag->Text = ($this->objAddress->CurrentFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkInvalidFlag) $this->chkInvalidFlag->Checked = $this->objAddress->InvalidFlag;
			if ($this->lblInvalidFlag) $this->lblInvalidFlag->Text = ($this->objAddress->InvalidFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkVerificationCheckedFlag) $this->chkVerificationCheckedFlag->Checked = $this->objAddress->VerificationCheckedFlag;
			if ($this->lblVerificationCheckedFlag) $this->lblVerificationCheckedFlag->Text = ($this->objAddress->VerificationCheckedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->calDateUntilWhen) $this->calDateUntilWhen->DateTime = $this->objAddress->DateUntilWhen;
			if ($this->lblDateUntilWhen) $this->lblDateUntilWhen->Text = sprintf($this->objAddress->DateUntilWhen) ? $this->objAddress->__toString($this->strDateUntilWhenDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ADDRESS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Address instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAddress() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAddressType) $this->objAddress->AddressTypeId = $this->lstAddressType->SelectedValue;
				if ($this->lstPerson) $this->objAddress->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstHousehold) $this->objAddress->HouseholdId = $this->lstHousehold->SelectedValue;
				if ($this->lstPrimaryPhone) $this->objAddress->PrimaryPhoneId = $this->lstPrimaryPhone->SelectedValue;
				if ($this->txtAddress1) $this->objAddress->Address1 = $this->txtAddress1->Text;
				if ($this->txtAddress2) $this->objAddress->Address2 = $this->txtAddress2->Text;
				if ($this->txtAddress3) $this->objAddress->Address3 = $this->txtAddress3->Text;
				if ($this->txtCity) $this->objAddress->City = $this->txtCity->Text;
				if ($this->txtState) $this->objAddress->State = $this->txtState->Text;
				if ($this->txtZipCode) $this->objAddress->ZipCode = $this->txtZipCode->Text;
				if ($this->txtCountry) $this->objAddress->Country = $this->txtCountry->Text;
				if ($this->chkCurrentFlag) $this->objAddress->CurrentFlag = $this->chkCurrentFlag->Checked;
				if ($this->chkInvalidFlag) $this->objAddress->InvalidFlag = $this->chkInvalidFlag->Checked;
				if ($this->chkVerificationCheckedFlag) $this->objAddress->VerificationCheckedFlag = $this->chkVerificationCheckedFlag->Checked;
				if ($this->calDateUntilWhen) $this->objAddress->DateUntilWhen = $this->calDateUntilWhen->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Address object
				$this->objAddress->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Address instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAddress() {
			$this->objAddress->Delete();
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
				case 'Address': return $this->objAddress;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Address fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'AddressTypeIdControl':
					if (!$this->lstAddressType) return $this->lstAddressType_Create();
					return $this->lstAddressType;
				case 'AddressTypeIdLabel':
					if (!$this->lblAddressTypeId) return $this->lblAddressTypeId_Create();
					return $this->lblAddressTypeId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'HouseholdIdControl':
					if (!$this->lstHousehold) return $this->lstHousehold_Create();
					return $this->lstHousehold;
				case 'HouseholdIdLabel':
					if (!$this->lblHouseholdId) return $this->lblHouseholdId_Create();
					return $this->lblHouseholdId;
				case 'PrimaryPhoneIdControl':
					if (!$this->lstPrimaryPhone) return $this->lstPrimaryPhone_Create();
					return $this->lstPrimaryPhone;
				case 'PrimaryPhoneIdLabel':
					if (!$this->lblPrimaryPhoneId) return $this->lblPrimaryPhoneId_Create();
					return $this->lblPrimaryPhoneId;
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
				case 'CountryControl':
					if (!$this->txtCountry) return $this->txtCountry_Create();
					return $this->txtCountry;
				case 'CountryLabel':
					if (!$this->lblCountry) return $this->lblCountry_Create();
					return $this->lblCountry;
				case 'CurrentFlagControl':
					if (!$this->chkCurrentFlag) return $this->chkCurrentFlag_Create();
					return $this->chkCurrentFlag;
				case 'CurrentFlagLabel':
					if (!$this->lblCurrentFlag) return $this->lblCurrentFlag_Create();
					return $this->lblCurrentFlag;
				case 'InvalidFlagControl':
					if (!$this->chkInvalidFlag) return $this->chkInvalidFlag_Create();
					return $this->chkInvalidFlag;
				case 'InvalidFlagLabel':
					if (!$this->lblInvalidFlag) return $this->lblInvalidFlag_Create();
					return $this->lblInvalidFlag;
				case 'VerificationCheckedFlagControl':
					if (!$this->chkVerificationCheckedFlag) return $this->chkVerificationCheckedFlag_Create();
					return $this->chkVerificationCheckedFlag;
				case 'VerificationCheckedFlagLabel':
					if (!$this->lblVerificationCheckedFlag) return $this->lblVerificationCheckedFlag_Create();
					return $this->lblVerificationCheckedFlag;
				case 'DateUntilWhenControl':
					if (!$this->calDateUntilWhen) return $this->calDateUntilWhen_Create();
					return $this->calDateUntilWhen;
				case 'DateUntilWhenLabel':
					if (!$this->lblDateUntilWhen) return $this->lblDateUntilWhen_Create();
					return $this->lblDateUntilWhen;
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
					// Controls that point to Address fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'AddressTypeIdControl':
						return ($this->lstAddressType = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'HouseholdIdControl':
						return ($this->lstHousehold = QType::Cast($mixValue, 'QControl'));
					case 'PrimaryPhoneIdControl':
						return ($this->lstPrimaryPhone = QType::Cast($mixValue, 'QControl'));
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
					case 'CountryControl':
						return ($this->txtCountry = QType::Cast($mixValue, 'QControl'));
					case 'CurrentFlagControl':
						return ($this->chkCurrentFlag = QType::Cast($mixValue, 'QControl'));
					case 'InvalidFlagControl':
						return ($this->chkInvalidFlag = QType::Cast($mixValue, 'QControl'));
					case 'VerificationCheckedFlagControl':
						return ($this->chkVerificationCheckedFlag = QType::Cast($mixValue, 'QControl'));
					case 'DateUntilWhenControl':
						return ($this->calDateUntilWhen = QType::Cast($mixValue, 'QControl'));
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