<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Person class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Person object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PersonMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Person $Person the actual Person data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $MembershipStatusTypeIdControl
	 * property-read QLabel $MembershipStatusTypeIdLabel
	 * property QListBox $MaritalStatusTypeIdControl
	 * property-read QLabel $MaritalStatusTypeIdLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $MiddleNameControl
	 * property-read QLabel $MiddleNameLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QTextBox $MailingLabelControl
	 * property-read QLabel $MailingLabelLabel
	 * property QTextBox $PriorLastNamesControl
	 * property-read QLabel $PriorLastNamesLabel
	 * property QTextBox $NicknameControl
	 * property-read QLabel $NicknameLabel
	 * property QTextBox $TitleControl
	 * property-read QLabel $TitleLabel
	 * property QTextBox $SuffixControl
	 * property-read QLabel $SuffixLabel
	 * property QTextBox $GenderControl
	 * property-read QLabel $GenderLabel
	 * property QDateTimePicker $DateOfBirthControl
	 * property-read QLabel $DateOfBirthLabel
	 * property QCheckBox $DobYearApproximateFlagControl
	 * property-read QLabel $DobYearApproximateFlagLabel
	 * property QCheckBox $DobGuessedFlagControl
	 * property-read QLabel $DobGuessedFlagLabel
	 * property QIntegerTextBox $AgeControl
	 * property-read QLabel $AgeLabel
	 * property QCheckBox $DeceasedFlagControl
	 * property-read QLabel $DeceasedFlagLabel
	 * property QDateTimePicker $DateDeceasedControl
	 * property-read QLabel $DateDeceasedLabel
	 * property QListBox $CurrentHeadShotIdControl
	 * property-read QLabel $CurrentHeadShotIdLabel
	 * property QListBox $MailingAddressIdControl
	 * property-read QLabel $MailingAddressIdLabel
	 * property QListBox $StewardshipAddressIdControl
	 * property-read QLabel $StewardshipAddressIdLabel
	 * property QListBox $PrimaryPhoneIdControl
	 * property-read QLabel $PrimaryPhoneIdLabel
	 * property QListBox $PrimaryEmailIdControl
	 * property-read QLabel $PrimaryEmailIdLabel
	 * property QCheckBox $CanMailFlagControl
	 * property-read QLabel $CanMailFlagLabel
	 * property QCheckBox $CanPhoneFlagControl
	 * property-read QLabel $CanPhoneFlagLabel
	 * property QCheckBox $CanEmailFlagControl
	 * property-read QLabel $CanEmailFlagLabel
	 * property QTextBox $PrimaryAddressTextControl
	 * property-read QLabel $PrimaryAddressTextLabel
	 * property QTextBox $PrimaryCityTextControl
	 * property-read QLabel $PrimaryCityTextLabel
	 * property QTextBox $PrimaryStateTextControl
	 * property-read QLabel $PrimaryStateTextLabel
	 * property QTextBox $PrimaryZipCodeTextControl
	 * property-read QLabel $PrimaryZipCodeTextLabel
	 * property QTextBox $PrimaryPhoneTextControl
	 * property-read QLabel $PrimaryPhoneTextLabel
	 * property QListBox $HouseholdAsHeadControl
	 * property-read QLabel $HouseholdAsHeadLabel
	 * property QListBox $PublicLoginControl
	 * property-read QLabel $PublicLoginLabel
	 * property QListBox $CheckingAccountLookupControl
	 * property-read QLabel $CheckingAccountLookupLabel
	 * property QListBox $CommunicationListControl
	 * property-read QLabel $CommunicationListLabel
	 * property QListBox $NameItemControl
	 * property-read QLabel $NameItemLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PersonMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Person objPerson
		 * @access protected
		 */
		protected $objPerson;

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

		// Controls that allow the editing of Person's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstMembershipStatusType;
         * @access protected
         */
		protected $lstMembershipStatusType;

        /**
         * @var QListBox lstMaritalStatusType;
         * @access protected
         */
		protected $lstMaritalStatusType;

        /**
         * @var QTextBox txtFirstName;
         * @access protected
         */
		protected $txtFirstName;

        /**
         * @var QTextBox txtMiddleName;
         * @access protected
         */
		protected $txtMiddleName;

        /**
         * @var QTextBox txtLastName;
         * @access protected
         */
		protected $txtLastName;

        /**
         * @var QTextBox txtMailingLabel;
         * @access protected
         */
		protected $txtMailingLabel;

        /**
         * @var QTextBox txtPriorLastNames;
         * @access protected
         */
		protected $txtPriorLastNames;

        /**
         * @var QTextBox txtNickname;
         * @access protected
         */
		protected $txtNickname;

        /**
         * @var QTextBox txtTitle;
         * @access protected
         */
		protected $txtTitle;

        /**
         * @var QTextBox txtSuffix;
         * @access protected
         */
		protected $txtSuffix;

        /**
         * @var QTextBox txtGender;
         * @access protected
         */
		protected $txtGender;

        /**
         * @var QDateTimePicker calDateOfBirth;
         * @access protected
         */
		protected $calDateOfBirth;

        /**
         * @var QCheckBox chkDobYearApproximateFlag;
         * @access protected
         */
		protected $chkDobYearApproximateFlag;

        /**
         * @var QCheckBox chkDobGuessedFlag;
         * @access protected
         */
		protected $chkDobGuessedFlag;

        /**
         * @var QIntegerTextBox txtAge;
         * @access protected
         */
		protected $txtAge;

        /**
         * @var QCheckBox chkDeceasedFlag;
         * @access protected
         */
		protected $chkDeceasedFlag;

        /**
         * @var QDateTimePicker calDateDeceased;
         * @access protected
         */
		protected $calDateDeceased;

        /**
         * @var QListBox lstCurrentHeadShot;
         * @access protected
         */
		protected $lstCurrentHeadShot;

        /**
         * @var QListBox lstMailingAddress;
         * @access protected
         */
		protected $lstMailingAddress;

        /**
         * @var QListBox lstStewardshipAddress;
         * @access protected
         */
		protected $lstStewardshipAddress;

        /**
         * @var QListBox lstPrimaryPhone;
         * @access protected
         */
		protected $lstPrimaryPhone;

        /**
         * @var QListBox lstPrimaryEmail;
         * @access protected
         */
		protected $lstPrimaryEmail;

        /**
         * @var QCheckBox chkCanMailFlag;
         * @access protected
         */
		protected $chkCanMailFlag;

        /**
         * @var QCheckBox chkCanPhoneFlag;
         * @access protected
         */
		protected $chkCanPhoneFlag;

        /**
         * @var QCheckBox chkCanEmailFlag;
         * @access protected
         */
		protected $chkCanEmailFlag;

        /**
         * @var QTextBox txtPrimaryAddressText;
         * @access protected
         */
		protected $txtPrimaryAddressText;

        /**
         * @var QTextBox txtPrimaryCityText;
         * @access protected
         */
		protected $txtPrimaryCityText;

        /**
         * @var QTextBox txtPrimaryStateText;
         * @access protected
         */
		protected $txtPrimaryStateText;

        /**
         * @var QTextBox txtPrimaryZipCodeText;
         * @access protected
         */
		protected $txtPrimaryZipCodeText;

        /**
         * @var QTextBox txtPrimaryPhoneText;
         * @access protected
         */
		protected $txtPrimaryPhoneText;


		// Controls that allow the viewing of Person's individual data fields
        /**
         * @var QLabel lblMembershipStatusTypeId
         * @access protected
         */
		protected $lblMembershipStatusTypeId;

        /**
         * @var QLabel lblMaritalStatusTypeId
         * @access protected
         */
		protected $lblMaritalStatusTypeId;

        /**
         * @var QLabel lblFirstName
         * @access protected
         */
		protected $lblFirstName;

        /**
         * @var QLabel lblMiddleName
         * @access protected
         */
		protected $lblMiddleName;

        /**
         * @var QLabel lblLastName
         * @access protected
         */
		protected $lblLastName;

        /**
         * @var QLabel lblMailingLabel
         * @access protected
         */
		protected $lblMailingLabel;

        /**
         * @var QLabel lblPriorLastNames
         * @access protected
         */
		protected $lblPriorLastNames;

        /**
         * @var QLabel lblNickname
         * @access protected
         */
		protected $lblNickname;

        /**
         * @var QLabel lblTitle
         * @access protected
         */
		protected $lblTitle;

        /**
         * @var QLabel lblSuffix
         * @access protected
         */
		protected $lblSuffix;

        /**
         * @var QLabel lblGender
         * @access protected
         */
		protected $lblGender;

        /**
         * @var QLabel lblDateOfBirth
         * @access protected
         */
		protected $lblDateOfBirth;

        /**
         * @var QLabel lblDobYearApproximateFlag
         * @access protected
         */
		protected $lblDobYearApproximateFlag;

        /**
         * @var QLabel lblDobGuessedFlag
         * @access protected
         */
		protected $lblDobGuessedFlag;

        /**
         * @var QLabel lblAge
         * @access protected
         */
		protected $lblAge;

        /**
         * @var QLabel lblDeceasedFlag
         * @access protected
         */
		protected $lblDeceasedFlag;

        /**
         * @var QLabel lblDateDeceased
         * @access protected
         */
		protected $lblDateDeceased;

        /**
         * @var QLabel lblCurrentHeadShotId
         * @access protected
         */
		protected $lblCurrentHeadShotId;

        /**
         * @var QLabel lblMailingAddressId
         * @access protected
         */
		protected $lblMailingAddressId;

        /**
         * @var QLabel lblStewardshipAddressId
         * @access protected
         */
		protected $lblStewardshipAddressId;

        /**
         * @var QLabel lblPrimaryPhoneId
         * @access protected
         */
		protected $lblPrimaryPhoneId;

        /**
         * @var QLabel lblPrimaryEmailId
         * @access protected
         */
		protected $lblPrimaryEmailId;

        /**
         * @var QLabel lblCanMailFlag
         * @access protected
         */
		protected $lblCanMailFlag;

        /**
         * @var QLabel lblCanPhoneFlag
         * @access protected
         */
		protected $lblCanPhoneFlag;

        /**
         * @var QLabel lblCanEmailFlag
         * @access protected
         */
		protected $lblCanEmailFlag;

        /**
         * @var QLabel lblPrimaryAddressText
         * @access protected
         */
		protected $lblPrimaryAddressText;

        /**
         * @var QLabel lblPrimaryCityText
         * @access protected
         */
		protected $lblPrimaryCityText;

        /**
         * @var QLabel lblPrimaryStateText
         * @access protected
         */
		protected $lblPrimaryStateText;

        /**
         * @var QLabel lblPrimaryZipCodeText
         * @access protected
         */
		protected $lblPrimaryZipCodeText;

        /**
         * @var QLabel lblPrimaryPhoneText
         * @access protected
         */
		protected $lblPrimaryPhoneText;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstHouseholdAsHead
         * @access protected
         */
		protected $lstHouseholdAsHead;

        /**
         * @var QListBox lstPublicLogin
         * @access protected
         */
		protected $lstPublicLogin;

		protected $lstCheckingAccountLookups;

		protected $lstCommunicationLists;

		protected $lstNameItems;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblHouseholdAsHead
         * @access protected
         */
		protected $lblHouseholdAsHead;

        /**
         * @var QLabel lblPublicLogin
         * @access protected
         */
		protected $lblPublicLogin;

		protected $lblCheckingAccountLookups;

		protected $lblCommunicationLists;

		protected $lblNameItems;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PersonMetaControl to edit a single Person object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Person object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param Person $objPerson new or existing Person object
		 */
		 public function __construct($objParentObject, Person $objPerson) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PersonMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Person object
			$this->objPerson = $objPerson;

			// Figure out if we're Editing or Creating New
			if ($this->objPerson->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Person object creation - defaults to CreateOrEdit
 		 * @return PersonMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objPerson = Person::Load($intId);

				// Person was found -- return it!
				if ($objPerson)
					return new PersonMetaControl($objParentObject, $objPerson);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Person object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PersonMetaControl($objParentObject, new Person());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Person object creation - defaults to CreateOrEdit
		 * @return PersonMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return PersonMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Person object creation - defaults to CreateOrEdit
		 * @return PersonMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return PersonMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objPerson->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstMembershipStatusType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstMembershipStatusType_Create($strControlId = null) {
			$this->lstMembershipStatusType = new QListBox($this->objParentObject, $strControlId);
			$this->lstMembershipStatusType->Name = QApplication::Translate('Membership Status Type');
			$this->lstMembershipStatusType->Required = true;
			foreach (MembershipStatusType::$NameArray as $intId => $strValue)
				$this->lstMembershipStatusType->AddItem(new QListItem($strValue, $intId, $this->objPerson->MembershipStatusTypeId == $intId));
			return $this->lstMembershipStatusType;
		}

		/**
		 * Create and setup QLabel lblMembershipStatusTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMembershipStatusTypeId_Create($strControlId = null) {
			$this->lblMembershipStatusTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblMembershipStatusTypeId->Name = QApplication::Translate('Membership Status Type');
			$this->lblMembershipStatusTypeId->Text = ($this->objPerson->MembershipStatusTypeId) ? MembershipStatusType::$NameArray[$this->objPerson->MembershipStatusTypeId] : null;
			$this->lblMembershipStatusTypeId->Required = true;
			return $this->lblMembershipStatusTypeId;
		}

		/**
		 * Create and setup QListBox lstMaritalStatusType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstMaritalStatusType_Create($strControlId = null) {
			$this->lstMaritalStatusType = new QListBox($this->objParentObject, $strControlId);
			$this->lstMaritalStatusType->Name = QApplication::Translate('Marital Status Type');
			$this->lstMaritalStatusType->Required = true;
			foreach (MaritalStatusType::$NameArray as $intId => $strValue)
				$this->lstMaritalStatusType->AddItem(new QListItem($strValue, $intId, $this->objPerson->MaritalStatusTypeId == $intId));
			return $this->lstMaritalStatusType;
		}

		/**
		 * Create and setup QLabel lblMaritalStatusTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMaritalStatusTypeId_Create($strControlId = null) {
			$this->lblMaritalStatusTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblMaritalStatusTypeId->Name = QApplication::Translate('Marital Status Type');
			$this->lblMaritalStatusTypeId->Text = ($this->objPerson->MaritalStatusTypeId) ? MaritalStatusType::$NameArray[$this->objPerson->MaritalStatusTypeId] : null;
			$this->lblMaritalStatusTypeId->Required = true;
			return $this->lblMaritalStatusTypeId;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objPerson->FirstName;
			$this->txtFirstName->MaxLength = Person::FirstNameMaxLength;
			return $this->txtFirstName;
		}

		/**
		 * Create and setup QLabel lblFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFirstName_Create($strControlId = null) {
			$this->lblFirstName = new QLabel($this->objParentObject, $strControlId);
			$this->lblFirstName->Name = QApplication::Translate('First Name');
			$this->lblFirstName->Text = $this->objPerson->FirstName;
			return $this->lblFirstName;
		}

		/**
		 * Create and setup QTextBox txtMiddleName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMiddleName_Create($strControlId = null) {
			$this->txtMiddleName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMiddleName->Name = QApplication::Translate('Middle Name');
			$this->txtMiddleName->Text = $this->objPerson->MiddleName;
			$this->txtMiddleName->MaxLength = Person::MiddleNameMaxLength;
			return $this->txtMiddleName;
		}

		/**
		 * Create and setup QLabel lblMiddleName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMiddleName_Create($strControlId = null) {
			$this->lblMiddleName = new QLabel($this->objParentObject, $strControlId);
			$this->lblMiddleName->Name = QApplication::Translate('Middle Name');
			$this->lblMiddleName->Text = $this->objPerson->MiddleName;
			return $this->lblMiddleName;
		}

		/**
		 * Create and setup QTextBox txtLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLastName_Create($strControlId = null) {
			$this->txtLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objPerson->LastName;
			$this->txtLastName->MaxLength = Person::LastNameMaxLength;
			return $this->txtLastName;
		}

		/**
		 * Create and setup QLabel lblLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLastName_Create($strControlId = null) {
			$this->lblLastName = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastName->Name = QApplication::Translate('Last Name');
			$this->lblLastName->Text = $this->objPerson->LastName;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QTextBox txtMailingLabel
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMailingLabel_Create($strControlId = null) {
			$this->txtMailingLabel = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMailingLabel->Name = QApplication::Translate('Mailing Label');
			$this->txtMailingLabel->Text = $this->objPerson->MailingLabel;
			$this->txtMailingLabel->MaxLength = Person::MailingLabelMaxLength;
			return $this->txtMailingLabel;
		}

		/**
		 * Create and setup QLabel lblMailingLabel
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMailingLabel_Create($strControlId = null) {
			$this->lblMailingLabel = new QLabel($this->objParentObject, $strControlId);
			$this->lblMailingLabel->Name = QApplication::Translate('Mailing Label');
			$this->lblMailingLabel->Text = $this->objPerson->MailingLabel;
			return $this->lblMailingLabel;
		}

		/**
		 * Create and setup QTextBox txtPriorLastNames
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPriorLastNames_Create($strControlId = null) {
			$this->txtPriorLastNames = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPriorLastNames->Name = QApplication::Translate('Prior Last Names');
			$this->txtPriorLastNames->Text = $this->objPerson->PriorLastNames;
			$this->txtPriorLastNames->MaxLength = Person::PriorLastNamesMaxLength;
			return $this->txtPriorLastNames;
		}

		/**
		 * Create and setup QLabel lblPriorLastNames
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPriorLastNames_Create($strControlId = null) {
			$this->lblPriorLastNames = new QLabel($this->objParentObject, $strControlId);
			$this->lblPriorLastNames->Name = QApplication::Translate('Prior Last Names');
			$this->lblPriorLastNames->Text = $this->objPerson->PriorLastNames;
			return $this->lblPriorLastNames;
		}

		/**
		 * Create and setup QTextBox txtNickname
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNickname_Create($strControlId = null) {
			$this->txtNickname = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNickname->Name = QApplication::Translate('Nickname');
			$this->txtNickname->Text = $this->objPerson->Nickname;
			$this->txtNickname->MaxLength = Person::NicknameMaxLength;
			return $this->txtNickname;
		}

		/**
		 * Create and setup QLabel lblNickname
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNickname_Create($strControlId = null) {
			$this->lblNickname = new QLabel($this->objParentObject, $strControlId);
			$this->lblNickname->Name = QApplication::Translate('Nickname');
			$this->lblNickname->Text = $this->objPerson->Nickname;
			return $this->lblNickname;
		}

		/**
		 * Create and setup QTextBox txtTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTitle_Create($strControlId = null) {
			$this->txtTitle = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTitle->Name = QApplication::Translate('Title');
			$this->txtTitle->Text = $this->objPerson->Title;
			$this->txtTitle->MaxLength = Person::TitleMaxLength;
			return $this->txtTitle;
		}

		/**
		 * Create and setup QLabel lblTitle
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTitle_Create($strControlId = null) {
			$this->lblTitle = new QLabel($this->objParentObject, $strControlId);
			$this->lblTitle->Name = QApplication::Translate('Title');
			$this->lblTitle->Text = $this->objPerson->Title;
			return $this->lblTitle;
		}

		/**
		 * Create and setup QTextBox txtSuffix
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSuffix_Create($strControlId = null) {
			$this->txtSuffix = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSuffix->Name = QApplication::Translate('Suffix');
			$this->txtSuffix->Text = $this->objPerson->Suffix;
			$this->txtSuffix->MaxLength = Person::SuffixMaxLength;
			return $this->txtSuffix;
		}

		/**
		 * Create and setup QLabel lblSuffix
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSuffix_Create($strControlId = null) {
			$this->lblSuffix = new QLabel($this->objParentObject, $strControlId);
			$this->lblSuffix->Name = QApplication::Translate('Suffix');
			$this->lblSuffix->Text = $this->objPerson->Suffix;
			return $this->lblSuffix;
		}

		/**
		 * Create and setup QTextBox txtGender
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtGender_Create($strControlId = null) {
			$this->txtGender = new QTextBox($this->objParentObject, $strControlId);
			$this->txtGender->Name = QApplication::Translate('Gender');
			$this->txtGender->Text = $this->objPerson->Gender;
			$this->txtGender->MaxLength = Person::GenderMaxLength;
			return $this->txtGender;
		}

		/**
		 * Create and setup QLabel lblGender
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGender_Create($strControlId = null) {
			$this->lblGender = new QLabel($this->objParentObject, $strControlId);
			$this->lblGender->Name = QApplication::Translate('Gender');
			$this->lblGender->Text = $this->objPerson->Gender;
			return $this->lblGender;
		}

		/**
		 * Create and setup QDateTimePicker calDateOfBirth
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateOfBirth_Create($strControlId = null) {
			$this->calDateOfBirth = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateOfBirth->Name = QApplication::Translate('Date Of Birth');
			$this->calDateOfBirth->DateTime = $this->objPerson->DateOfBirth;
			$this->calDateOfBirth->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateOfBirth;
		}

		/**
		 * Create and setup QLabel lblDateOfBirth
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateOfBirth_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateOfBirth = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateOfBirth->Name = QApplication::Translate('Date Of Birth');
			$this->strDateOfBirthDateTimeFormat = $strDateTimeFormat;
			$this->lblDateOfBirth->Text = sprintf($this->objPerson->DateOfBirth) ? $this->objPerson->DateOfBirth->__toString($this->strDateOfBirthDateTimeFormat) : null;
			return $this->lblDateOfBirth;
		}

		protected $strDateOfBirthDateTimeFormat;

		/**
		 * Create and setup QCheckBox chkDobYearApproximateFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkDobYearApproximateFlag_Create($strControlId = null) {
			$this->chkDobYearApproximateFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkDobYearApproximateFlag->Name = QApplication::Translate('Dob Year Approximate Flag');
			$this->chkDobYearApproximateFlag->Checked = $this->objPerson->DobYearApproximateFlag;
			return $this->chkDobYearApproximateFlag;
		}

		/**
		 * Create and setup QLabel lblDobYearApproximateFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDobYearApproximateFlag_Create($strControlId = null) {
			$this->lblDobYearApproximateFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblDobYearApproximateFlag->Name = QApplication::Translate('Dob Year Approximate Flag');
			$this->lblDobYearApproximateFlag->Text = ($this->objPerson->DobYearApproximateFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblDobYearApproximateFlag;
		}

		/**
		 * Create and setup QCheckBox chkDobGuessedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkDobGuessedFlag_Create($strControlId = null) {
			$this->chkDobGuessedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkDobGuessedFlag->Name = QApplication::Translate('Dob Guessed Flag');
			$this->chkDobGuessedFlag->Checked = $this->objPerson->DobGuessedFlag;
			return $this->chkDobGuessedFlag;
		}

		/**
		 * Create and setup QLabel lblDobGuessedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDobGuessedFlag_Create($strControlId = null) {
			$this->lblDobGuessedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblDobGuessedFlag->Name = QApplication::Translate('Dob Guessed Flag');
			$this->lblDobGuessedFlag->Text = ($this->objPerson->DobGuessedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblDobGuessedFlag;
		}

		/**
		 * Create and setup QIntegerTextBox txtAge
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtAge_Create($strControlId = null) {
			$this->txtAge = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtAge->Name = QApplication::Translate('Age');
			$this->txtAge->Text = $this->objPerson->Age;
			return $this->txtAge;
		}

		/**
		 * Create and setup QLabel lblAge
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAge_Create($strControlId = null, $strFormat = null) {
			$this->lblAge = new QLabel($this->objParentObject, $strControlId);
			$this->lblAge->Name = QApplication::Translate('Age');
			$this->lblAge->Text = $this->objPerson->Age;
			$this->lblAge->Format = $strFormat;
			return $this->lblAge;
		}

		/**
		 * Create and setup QCheckBox chkDeceasedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkDeceasedFlag_Create($strControlId = null) {
			$this->chkDeceasedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkDeceasedFlag->Name = QApplication::Translate('Deceased Flag');
			$this->chkDeceasedFlag->Checked = $this->objPerson->DeceasedFlag;
			return $this->chkDeceasedFlag;
		}

		/**
		 * Create and setup QLabel lblDeceasedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDeceasedFlag_Create($strControlId = null) {
			$this->lblDeceasedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblDeceasedFlag->Name = QApplication::Translate('Deceased Flag');
			$this->lblDeceasedFlag->Text = ($this->objPerson->DeceasedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblDeceasedFlag;
		}

		/**
		 * Create and setup QDateTimePicker calDateDeceased
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateDeceased_Create($strControlId = null) {
			$this->calDateDeceased = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateDeceased->Name = QApplication::Translate('Date Deceased');
			$this->calDateDeceased->DateTime = $this->objPerson->DateDeceased;
			$this->calDateDeceased->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateDeceased;
		}

		/**
		 * Create and setup QLabel lblDateDeceased
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateDeceased_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateDeceased = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateDeceased->Name = QApplication::Translate('Date Deceased');
			$this->strDateDeceasedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateDeceased->Text = sprintf($this->objPerson->DateDeceased) ? $this->objPerson->DateDeceased->__toString($this->strDateDeceasedDateTimeFormat) : null;
			return $this->lblDateDeceased;
		}

		protected $strDateDeceasedDateTimeFormat;

		/**
		 * Create and setup QListBox lstCurrentHeadShot
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCurrentHeadShot_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCurrentHeadShot = new QListBox($this->objParentObject, $strControlId);
			$this->lstCurrentHeadShot->Name = QApplication::Translate('Current Head Shot');
			$this->lstCurrentHeadShot->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCurrentHeadShotCursor = HeadShot::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCurrentHeadShot = HeadShot::InstantiateCursor($objCurrentHeadShotCursor)) {
				$objListItem = new QListItem($objCurrentHeadShot->__toString(), $objCurrentHeadShot->Id);
				if (($this->objPerson->CurrentHeadShot) && ($this->objPerson->CurrentHeadShot->Id == $objCurrentHeadShot->Id))
					$objListItem->Selected = true;
				$this->lstCurrentHeadShot->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCurrentHeadShot;
		}

		/**
		 * Create and setup QLabel lblCurrentHeadShotId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCurrentHeadShotId_Create($strControlId = null) {
			$this->lblCurrentHeadShotId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCurrentHeadShotId->Name = QApplication::Translate('Current Head Shot');
			$this->lblCurrentHeadShotId->Text = ($this->objPerson->CurrentHeadShot) ? $this->objPerson->CurrentHeadShot->__toString() : null;
			return $this->lblCurrentHeadShotId;
		}

		/**
		 * Create and setup QListBox lstMailingAddress
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstMailingAddress_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstMailingAddress = new QListBox($this->objParentObject, $strControlId);
			$this->lstMailingAddress->Name = QApplication::Translate('Mailing Address');
			$this->lstMailingAddress->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objMailingAddressCursor = Address::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objMailingAddress = Address::InstantiateCursor($objMailingAddressCursor)) {
				$objListItem = new QListItem($objMailingAddress->__toString(), $objMailingAddress->Id);
				if (($this->objPerson->MailingAddress) && ($this->objPerson->MailingAddress->Id == $objMailingAddress->Id))
					$objListItem->Selected = true;
				$this->lstMailingAddress->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstMailingAddress;
		}

		/**
		 * Create and setup QLabel lblMailingAddressId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMailingAddressId_Create($strControlId = null) {
			$this->lblMailingAddressId = new QLabel($this->objParentObject, $strControlId);
			$this->lblMailingAddressId->Name = QApplication::Translate('Mailing Address');
			$this->lblMailingAddressId->Text = ($this->objPerson->MailingAddress) ? $this->objPerson->MailingAddress->__toString() : null;
			return $this->lblMailingAddressId;
		}

		/**
		 * Create and setup QListBox lstStewardshipAddress
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStewardshipAddress_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStewardshipAddress = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipAddress->Name = QApplication::Translate('Stewardship Address');
			$this->lstStewardshipAddress->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStewardshipAddressCursor = Address::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStewardshipAddress = Address::InstantiateCursor($objStewardshipAddressCursor)) {
				$objListItem = new QListItem($objStewardshipAddress->__toString(), $objStewardshipAddress->Id);
				if (($this->objPerson->StewardshipAddress) && ($this->objPerson->StewardshipAddress->Id == $objStewardshipAddress->Id))
					$objListItem->Selected = true;
				$this->lstStewardshipAddress->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstStewardshipAddress;
		}

		/**
		 * Create and setup QLabel lblStewardshipAddressId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStewardshipAddressId_Create($strControlId = null) {
			$this->lblStewardshipAddressId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStewardshipAddressId->Name = QApplication::Translate('Stewardship Address');
			$this->lblStewardshipAddressId->Text = ($this->objPerson->StewardshipAddress) ? $this->objPerson->StewardshipAddress->__toString() : null;
			return $this->lblStewardshipAddressId;
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
				if (($this->objPerson->PrimaryPhone) && ($this->objPerson->PrimaryPhone->Id == $objPrimaryPhone->Id))
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
			$this->lblPrimaryPhoneId->Text = ($this->objPerson->PrimaryPhone) ? $this->objPerson->PrimaryPhone->__toString() : null;
			return $this->lblPrimaryPhoneId;
		}

		/**
		 * Create and setup QListBox lstPrimaryEmail
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPrimaryEmail_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPrimaryEmail = new QListBox($this->objParentObject, $strControlId);
			$this->lstPrimaryEmail->Name = QApplication::Translate('Primary Email');
			$this->lstPrimaryEmail->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPrimaryEmailCursor = Email::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPrimaryEmail = Email::InstantiateCursor($objPrimaryEmailCursor)) {
				$objListItem = new QListItem($objPrimaryEmail->__toString(), $objPrimaryEmail->Id);
				if (($this->objPerson->PrimaryEmail) && ($this->objPerson->PrimaryEmail->Id == $objPrimaryEmail->Id))
					$objListItem->Selected = true;
				$this->lstPrimaryEmail->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPrimaryEmail;
		}

		/**
		 * Create and setup QLabel lblPrimaryEmailId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPrimaryEmailId_Create($strControlId = null) {
			$this->lblPrimaryEmailId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrimaryEmailId->Name = QApplication::Translate('Primary Email');
			$this->lblPrimaryEmailId->Text = ($this->objPerson->PrimaryEmail) ? $this->objPerson->PrimaryEmail->__toString() : null;
			return $this->lblPrimaryEmailId;
		}

		/**
		 * Create and setup QCheckBox chkCanMailFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkCanMailFlag_Create($strControlId = null) {
			$this->chkCanMailFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkCanMailFlag->Name = QApplication::Translate('Can Mail Flag');
			$this->chkCanMailFlag->Checked = $this->objPerson->CanMailFlag;
			return $this->chkCanMailFlag;
		}

		/**
		 * Create and setup QLabel lblCanMailFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCanMailFlag_Create($strControlId = null) {
			$this->lblCanMailFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblCanMailFlag->Name = QApplication::Translate('Can Mail Flag');
			$this->lblCanMailFlag->Text = ($this->objPerson->CanMailFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblCanMailFlag;
		}

		/**
		 * Create and setup QCheckBox chkCanPhoneFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkCanPhoneFlag_Create($strControlId = null) {
			$this->chkCanPhoneFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkCanPhoneFlag->Name = QApplication::Translate('Can Phone Flag');
			$this->chkCanPhoneFlag->Checked = $this->objPerson->CanPhoneFlag;
			return $this->chkCanPhoneFlag;
		}

		/**
		 * Create and setup QLabel lblCanPhoneFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCanPhoneFlag_Create($strControlId = null) {
			$this->lblCanPhoneFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblCanPhoneFlag->Name = QApplication::Translate('Can Phone Flag');
			$this->lblCanPhoneFlag->Text = ($this->objPerson->CanPhoneFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblCanPhoneFlag;
		}

		/**
		 * Create and setup QCheckBox chkCanEmailFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkCanEmailFlag_Create($strControlId = null) {
			$this->chkCanEmailFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkCanEmailFlag->Name = QApplication::Translate('Can Email Flag');
			$this->chkCanEmailFlag->Checked = $this->objPerson->CanEmailFlag;
			return $this->chkCanEmailFlag;
		}

		/**
		 * Create and setup QLabel lblCanEmailFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCanEmailFlag_Create($strControlId = null) {
			$this->lblCanEmailFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblCanEmailFlag->Name = QApplication::Translate('Can Email Flag');
			$this->lblCanEmailFlag->Text = ($this->objPerson->CanEmailFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblCanEmailFlag;
		}

		/**
		 * Create and setup QTextBox txtPrimaryAddressText
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPrimaryAddressText_Create($strControlId = null) {
			$this->txtPrimaryAddressText = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPrimaryAddressText->Name = QApplication::Translate('Primary Address Text');
			$this->txtPrimaryAddressText->Text = $this->objPerson->PrimaryAddressText;
			$this->txtPrimaryAddressText->MaxLength = Person::PrimaryAddressTextMaxLength;
			return $this->txtPrimaryAddressText;
		}

		/**
		 * Create and setup QLabel lblPrimaryAddressText
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPrimaryAddressText_Create($strControlId = null) {
			$this->lblPrimaryAddressText = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrimaryAddressText->Name = QApplication::Translate('Primary Address Text');
			$this->lblPrimaryAddressText->Text = $this->objPerson->PrimaryAddressText;
			return $this->lblPrimaryAddressText;
		}

		/**
		 * Create and setup QTextBox txtPrimaryCityText
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPrimaryCityText_Create($strControlId = null) {
			$this->txtPrimaryCityText = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPrimaryCityText->Name = QApplication::Translate('Primary City Text');
			$this->txtPrimaryCityText->Text = $this->objPerson->PrimaryCityText;
			$this->txtPrimaryCityText->MaxLength = Person::PrimaryCityTextMaxLength;
			return $this->txtPrimaryCityText;
		}

		/**
		 * Create and setup QLabel lblPrimaryCityText
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPrimaryCityText_Create($strControlId = null) {
			$this->lblPrimaryCityText = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrimaryCityText->Name = QApplication::Translate('Primary City Text');
			$this->lblPrimaryCityText->Text = $this->objPerson->PrimaryCityText;
			return $this->lblPrimaryCityText;
		}

		/**
		 * Create and setup QTextBox txtPrimaryStateText
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPrimaryStateText_Create($strControlId = null) {
			$this->txtPrimaryStateText = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPrimaryStateText->Name = QApplication::Translate('Primary State Text');
			$this->txtPrimaryStateText->Text = $this->objPerson->PrimaryStateText;
			$this->txtPrimaryStateText->MaxLength = Person::PrimaryStateTextMaxLength;
			return $this->txtPrimaryStateText;
		}

		/**
		 * Create and setup QLabel lblPrimaryStateText
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPrimaryStateText_Create($strControlId = null) {
			$this->lblPrimaryStateText = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrimaryStateText->Name = QApplication::Translate('Primary State Text');
			$this->lblPrimaryStateText->Text = $this->objPerson->PrimaryStateText;
			return $this->lblPrimaryStateText;
		}

		/**
		 * Create and setup QTextBox txtPrimaryZipCodeText
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPrimaryZipCodeText_Create($strControlId = null) {
			$this->txtPrimaryZipCodeText = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPrimaryZipCodeText->Name = QApplication::Translate('Primary Zip Code Text');
			$this->txtPrimaryZipCodeText->Text = $this->objPerson->PrimaryZipCodeText;
			$this->txtPrimaryZipCodeText->MaxLength = Person::PrimaryZipCodeTextMaxLength;
			return $this->txtPrimaryZipCodeText;
		}

		/**
		 * Create and setup QLabel lblPrimaryZipCodeText
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPrimaryZipCodeText_Create($strControlId = null) {
			$this->lblPrimaryZipCodeText = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrimaryZipCodeText->Name = QApplication::Translate('Primary Zip Code Text');
			$this->lblPrimaryZipCodeText->Text = $this->objPerson->PrimaryZipCodeText;
			return $this->lblPrimaryZipCodeText;
		}

		/**
		 * Create and setup QTextBox txtPrimaryPhoneText
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPrimaryPhoneText_Create($strControlId = null) {
			$this->txtPrimaryPhoneText = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPrimaryPhoneText->Name = QApplication::Translate('Primary Phone Text');
			$this->txtPrimaryPhoneText->Text = $this->objPerson->PrimaryPhoneText;
			$this->txtPrimaryPhoneText->MaxLength = Person::PrimaryPhoneTextMaxLength;
			return $this->txtPrimaryPhoneText;
		}

		/**
		 * Create and setup QLabel lblPrimaryPhoneText
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPrimaryPhoneText_Create($strControlId = null) {
			$this->lblPrimaryPhoneText = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrimaryPhoneText->Name = QApplication::Translate('Primary Phone Text');
			$this->lblPrimaryPhoneText->Text = $this->objPerson->PrimaryPhoneText;
			return $this->lblPrimaryPhoneText;
		}

		/**
		 * Create and setup QListBox lstHouseholdAsHead
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstHouseholdAsHead_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstHouseholdAsHead = new QListBox($this->objParentObject, $strControlId);
			$this->lstHouseholdAsHead->Name = QApplication::Translate('Household As Head');
			$this->lstHouseholdAsHead->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objHouseholdCursor = Household::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objHousehold = Household::InstantiateCursor($objHouseholdCursor)) {
				$objListItem = new QListItem($objHousehold->__toString(), $objHousehold->Id);
				if ($objHousehold->HeadPersonId == $this->objPerson->Id)
					$objListItem->Selected = true;
				$this->lstHouseholdAsHead->AddItem($objListItem);
			}

			// Because Household's HouseholdAsHead is not null, if a value is already selected, it cannot be changed.
			if ($this->lstHouseholdAsHead->SelectedValue)
				$this->lstHouseholdAsHead->Enabled = false;

			// Return the QListBox
			return $this->lstHouseholdAsHead;
		}

		/**
		 * Create and setup QLabel lblHouseholdAsHead
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblHouseholdAsHead_Create($strControlId = null) {
			$this->lblHouseholdAsHead = new QLabel($this->objParentObject, $strControlId);
			$this->lblHouseholdAsHead->Name = QApplication::Translate('Household As Head');
			$this->lblHouseholdAsHead->Text = ($this->objPerson->HouseholdAsHead) ? $this->objPerson->HouseholdAsHead->__toString() : null;
			return $this->lblHouseholdAsHead;
		}

		/**
		 * Create and setup QListBox lstPublicLogin
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPublicLogin_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPublicLogin = new QListBox($this->objParentObject, $strControlId);
			$this->lstPublicLogin->Name = QApplication::Translate('Public Login');
			$this->lstPublicLogin->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPublicLoginCursor = PublicLogin::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPublicLogin = PublicLogin::InstantiateCursor($objPublicLoginCursor)) {
				$objListItem = new QListItem($objPublicLogin->__toString(), $objPublicLogin->Id);
				if ($objPublicLogin->PersonId == $this->objPerson->Id)
					$objListItem->Selected = true;
				$this->lstPublicLogin->AddItem($objListItem);
			}

			// Because PublicLogin's PublicLogin is not null, if a value is already selected, it cannot be changed.
			if ($this->lstPublicLogin->SelectedValue)
				$this->lstPublicLogin->Enabled = false;

			// Return the QListBox
			return $this->lstPublicLogin;
		}

		/**
		 * Create and setup QLabel lblPublicLogin
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPublicLogin_Create($strControlId = null) {
			$this->lblPublicLogin = new QLabel($this->objParentObject, $strControlId);
			$this->lblPublicLogin->Name = QApplication::Translate('Public Login');
			$this->lblPublicLogin->Text = ($this->objPerson->PublicLogin) ? $this->objPerson->PublicLogin->__toString() : null;
			return $this->lblPublicLogin;
		}

		/**
		 * Create and setup QListBox lstCheckingAccountLookups
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCheckingAccountLookups_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCheckingAccountLookups = new QListBox($this->objParentObject, $strControlId);
			$this->lstCheckingAccountLookups->Name = QApplication::Translate('Checking Account Lookups');
			$this->lstCheckingAccountLookups->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objPerson->GetCheckingAccountLookupArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCheckingAccountLookupCursor = CheckingAccountLookup::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCheckingAccountLookup = CheckingAccountLookup::InstantiateCursor($objCheckingAccountLookupCursor)) {
				$objListItem = new QListItem($objCheckingAccountLookup->__toString(), $objCheckingAccountLookup->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objCheckingAccountLookup->Id)
						$objListItem->Selected = true;
				}
				$this->lstCheckingAccountLookups->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstCheckingAccountLookups;
		}

		/**
		 * Create and setup QLabel lblCheckingAccountLookups
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblCheckingAccountLookups_Create($strControlId = null, $strGlue = ', ') {
			$this->lblCheckingAccountLookups = new QLabel($this->objParentObject, $strControlId);
			$this->lstCheckingAccountLookups->Name = QApplication::Translate('Checking Account Lookups');
			
			$objAssociatedArray = $this->objPerson->GetCheckingAccountLookupArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblCheckingAccountLookups->Text = implode($strGlue, $strItems);
			return $this->lblCheckingAccountLookups;
		}

		/**
		 * Create and setup QListBox lstCommunicationLists
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCommunicationLists_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCommunicationLists = new QListBox($this->objParentObject, $strControlId);
			$this->lstCommunicationLists->Name = QApplication::Translate('Communication Lists');
			$this->lstCommunicationLists->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objPerson->GetCommunicationListArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCommunicationListCursor = CommunicationList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCommunicationList = CommunicationList::InstantiateCursor($objCommunicationListCursor)) {
				$objListItem = new QListItem($objCommunicationList->__toString(), $objCommunicationList->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objCommunicationList->Id)
						$objListItem->Selected = true;
				}
				$this->lstCommunicationLists->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstCommunicationLists;
		}

		/**
		 * Create and setup QLabel lblCommunicationLists
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblCommunicationLists_Create($strControlId = null, $strGlue = ', ') {
			$this->lblCommunicationLists = new QLabel($this->objParentObject, $strControlId);
			$this->lstCommunicationLists->Name = QApplication::Translate('Communication Lists');
			
			$objAssociatedArray = $this->objPerson->GetCommunicationListArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblCommunicationLists->Text = implode($strGlue, $strItems);
			return $this->lblCommunicationLists;
		}

		/**
		 * Create and setup QListBox lstNameItems
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstNameItems_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstNameItems = new QListBox($this->objParentObject, $strControlId);
			$this->lstNameItems->Name = QApplication::Translate('Name Items');
			$this->lstNameItems->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objPerson->GetNameItemArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objNameItemCursor = NameItem::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objNameItem = NameItem::InstantiateCursor($objNameItemCursor)) {
				$objListItem = new QListItem($objNameItem->__toString(), $objNameItem->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objNameItem->Id)
						$objListItem->Selected = true;
				}
				$this->lstNameItems->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstNameItems;
		}

		/**
		 * Create and setup QLabel lblNameItems
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblNameItems_Create($strControlId = null, $strGlue = ', ') {
			$this->lblNameItems = new QLabel($this->objParentObject, $strControlId);
			$this->lstNameItems->Name = QApplication::Translate('Name Items');
			
			$objAssociatedArray = $this->objPerson->GetNameItemArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblNameItems->Text = implode($strGlue, $strItems);
			return $this->lblNameItems;
		}



		/**
		 * Refresh this MetaControl with Data from the local Person object.
		 * @param boolean $blnReload reload Person from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPerson->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPerson->Id;

			if ($this->lstMembershipStatusType) $this->lstMembershipStatusType->SelectedValue = $this->objPerson->MembershipStatusTypeId;
			if ($this->lblMembershipStatusTypeId) $this->lblMembershipStatusTypeId->Text = ($this->objPerson->MembershipStatusTypeId) ? MembershipStatusType::$NameArray[$this->objPerson->MembershipStatusTypeId] : null;

			if ($this->lstMaritalStatusType) $this->lstMaritalStatusType->SelectedValue = $this->objPerson->MaritalStatusTypeId;
			if ($this->lblMaritalStatusTypeId) $this->lblMaritalStatusTypeId->Text = ($this->objPerson->MaritalStatusTypeId) ? MaritalStatusType::$NameArray[$this->objPerson->MaritalStatusTypeId] : null;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objPerson->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objPerson->FirstName;

			if ($this->txtMiddleName) $this->txtMiddleName->Text = $this->objPerson->MiddleName;
			if ($this->lblMiddleName) $this->lblMiddleName->Text = $this->objPerson->MiddleName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objPerson->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objPerson->LastName;

			if ($this->txtMailingLabel) $this->txtMailingLabel->Text = $this->objPerson->MailingLabel;
			if ($this->lblMailingLabel) $this->lblMailingLabel->Text = $this->objPerson->MailingLabel;

			if ($this->txtPriorLastNames) $this->txtPriorLastNames->Text = $this->objPerson->PriorLastNames;
			if ($this->lblPriorLastNames) $this->lblPriorLastNames->Text = $this->objPerson->PriorLastNames;

			if ($this->txtNickname) $this->txtNickname->Text = $this->objPerson->Nickname;
			if ($this->lblNickname) $this->lblNickname->Text = $this->objPerson->Nickname;

			if ($this->txtTitle) $this->txtTitle->Text = $this->objPerson->Title;
			if ($this->lblTitle) $this->lblTitle->Text = $this->objPerson->Title;

			if ($this->txtSuffix) $this->txtSuffix->Text = $this->objPerson->Suffix;
			if ($this->lblSuffix) $this->lblSuffix->Text = $this->objPerson->Suffix;

			if ($this->txtGender) $this->txtGender->Text = $this->objPerson->Gender;
			if ($this->lblGender) $this->lblGender->Text = $this->objPerson->Gender;

			if ($this->calDateOfBirth) $this->calDateOfBirth->DateTime = $this->objPerson->DateOfBirth;
			if ($this->lblDateOfBirth) $this->lblDateOfBirth->Text = sprintf($this->objPerson->DateOfBirth) ? $this->objPerson->__toString($this->strDateOfBirthDateTimeFormat) : null;

			if ($this->chkDobYearApproximateFlag) $this->chkDobYearApproximateFlag->Checked = $this->objPerson->DobYearApproximateFlag;
			if ($this->lblDobYearApproximateFlag) $this->lblDobYearApproximateFlag->Text = ($this->objPerson->DobYearApproximateFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkDobGuessedFlag) $this->chkDobGuessedFlag->Checked = $this->objPerson->DobGuessedFlag;
			if ($this->lblDobGuessedFlag) $this->lblDobGuessedFlag->Text = ($this->objPerson->DobGuessedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtAge) $this->txtAge->Text = $this->objPerson->Age;
			if ($this->lblAge) $this->lblAge->Text = $this->objPerson->Age;

			if ($this->chkDeceasedFlag) $this->chkDeceasedFlag->Checked = $this->objPerson->DeceasedFlag;
			if ($this->lblDeceasedFlag) $this->lblDeceasedFlag->Text = ($this->objPerson->DeceasedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->calDateDeceased) $this->calDateDeceased->DateTime = $this->objPerson->DateDeceased;
			if ($this->lblDateDeceased) $this->lblDateDeceased->Text = sprintf($this->objPerson->DateDeceased) ? $this->objPerson->__toString($this->strDateDeceasedDateTimeFormat) : null;

			if ($this->lstCurrentHeadShot) {
					$this->lstCurrentHeadShot->RemoveAllItems();
				$this->lstCurrentHeadShot->AddItem(QApplication::Translate('- Select One -'), null);
				$objCurrentHeadShotArray = HeadShot::LoadAll();
				if ($objCurrentHeadShotArray) foreach ($objCurrentHeadShotArray as $objCurrentHeadShot) {
					$objListItem = new QListItem($objCurrentHeadShot->__toString(), $objCurrentHeadShot->Id);
					if (($this->objPerson->CurrentHeadShot) && ($this->objPerson->CurrentHeadShot->Id == $objCurrentHeadShot->Id))
						$objListItem->Selected = true;
					$this->lstCurrentHeadShot->AddItem($objListItem);
				}
			}
			if ($this->lblCurrentHeadShotId) $this->lblCurrentHeadShotId->Text = ($this->objPerson->CurrentHeadShot) ? $this->objPerson->CurrentHeadShot->__toString() : null;

			if ($this->lstMailingAddress) {
					$this->lstMailingAddress->RemoveAllItems();
				$this->lstMailingAddress->AddItem(QApplication::Translate('- Select One -'), null);
				$objMailingAddressArray = Address::LoadAll();
				if ($objMailingAddressArray) foreach ($objMailingAddressArray as $objMailingAddress) {
					$objListItem = new QListItem($objMailingAddress->__toString(), $objMailingAddress->Id);
					if (($this->objPerson->MailingAddress) && ($this->objPerson->MailingAddress->Id == $objMailingAddress->Id))
						$objListItem->Selected = true;
					$this->lstMailingAddress->AddItem($objListItem);
				}
			}
			if ($this->lblMailingAddressId) $this->lblMailingAddressId->Text = ($this->objPerson->MailingAddress) ? $this->objPerson->MailingAddress->__toString() : null;

			if ($this->lstStewardshipAddress) {
					$this->lstStewardshipAddress->RemoveAllItems();
				$this->lstStewardshipAddress->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipAddressArray = Address::LoadAll();
				if ($objStewardshipAddressArray) foreach ($objStewardshipAddressArray as $objStewardshipAddress) {
					$objListItem = new QListItem($objStewardshipAddress->__toString(), $objStewardshipAddress->Id);
					if (($this->objPerson->StewardshipAddress) && ($this->objPerson->StewardshipAddress->Id == $objStewardshipAddress->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipAddress->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipAddressId) $this->lblStewardshipAddressId->Text = ($this->objPerson->StewardshipAddress) ? $this->objPerson->StewardshipAddress->__toString() : null;

			if ($this->lstPrimaryPhone) {
					$this->lstPrimaryPhone->RemoveAllItems();
				$this->lstPrimaryPhone->AddItem(QApplication::Translate('- Select One -'), null);
				$objPrimaryPhoneArray = Phone::LoadAll();
				if ($objPrimaryPhoneArray) foreach ($objPrimaryPhoneArray as $objPrimaryPhone) {
					$objListItem = new QListItem($objPrimaryPhone->__toString(), $objPrimaryPhone->Id);
					if (($this->objPerson->PrimaryPhone) && ($this->objPerson->PrimaryPhone->Id == $objPrimaryPhone->Id))
						$objListItem->Selected = true;
					$this->lstPrimaryPhone->AddItem($objListItem);
				}
			}
			if ($this->lblPrimaryPhoneId) $this->lblPrimaryPhoneId->Text = ($this->objPerson->PrimaryPhone) ? $this->objPerson->PrimaryPhone->__toString() : null;

			if ($this->lstPrimaryEmail) {
					$this->lstPrimaryEmail->RemoveAllItems();
				$this->lstPrimaryEmail->AddItem(QApplication::Translate('- Select One -'), null);
				$objPrimaryEmailArray = Email::LoadAll();
				if ($objPrimaryEmailArray) foreach ($objPrimaryEmailArray as $objPrimaryEmail) {
					$objListItem = new QListItem($objPrimaryEmail->__toString(), $objPrimaryEmail->Id);
					if (($this->objPerson->PrimaryEmail) && ($this->objPerson->PrimaryEmail->Id == $objPrimaryEmail->Id))
						$objListItem->Selected = true;
					$this->lstPrimaryEmail->AddItem($objListItem);
				}
			}
			if ($this->lblPrimaryEmailId) $this->lblPrimaryEmailId->Text = ($this->objPerson->PrimaryEmail) ? $this->objPerson->PrimaryEmail->__toString() : null;

			if ($this->chkCanMailFlag) $this->chkCanMailFlag->Checked = $this->objPerson->CanMailFlag;
			if ($this->lblCanMailFlag) $this->lblCanMailFlag->Text = ($this->objPerson->CanMailFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkCanPhoneFlag) $this->chkCanPhoneFlag->Checked = $this->objPerson->CanPhoneFlag;
			if ($this->lblCanPhoneFlag) $this->lblCanPhoneFlag->Text = ($this->objPerson->CanPhoneFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkCanEmailFlag) $this->chkCanEmailFlag->Checked = $this->objPerson->CanEmailFlag;
			if ($this->lblCanEmailFlag) $this->lblCanEmailFlag->Text = ($this->objPerson->CanEmailFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtPrimaryAddressText) $this->txtPrimaryAddressText->Text = $this->objPerson->PrimaryAddressText;
			if ($this->lblPrimaryAddressText) $this->lblPrimaryAddressText->Text = $this->objPerson->PrimaryAddressText;

			if ($this->txtPrimaryCityText) $this->txtPrimaryCityText->Text = $this->objPerson->PrimaryCityText;
			if ($this->lblPrimaryCityText) $this->lblPrimaryCityText->Text = $this->objPerson->PrimaryCityText;

			if ($this->txtPrimaryStateText) $this->txtPrimaryStateText->Text = $this->objPerson->PrimaryStateText;
			if ($this->lblPrimaryStateText) $this->lblPrimaryStateText->Text = $this->objPerson->PrimaryStateText;

			if ($this->txtPrimaryZipCodeText) $this->txtPrimaryZipCodeText->Text = $this->objPerson->PrimaryZipCodeText;
			if ($this->lblPrimaryZipCodeText) $this->lblPrimaryZipCodeText->Text = $this->objPerson->PrimaryZipCodeText;

			if ($this->txtPrimaryPhoneText) $this->txtPrimaryPhoneText->Text = $this->objPerson->PrimaryPhoneText;
			if ($this->lblPrimaryPhoneText) $this->lblPrimaryPhoneText->Text = $this->objPerson->PrimaryPhoneText;

			if ($this->lstHouseholdAsHead) {
				$this->lstHouseholdAsHead->RemoveAllItems();
				$this->lstHouseholdAsHead->AddItem(QApplication::Translate('- Select One -'), null);
				$objHouseholdArray = Household::LoadAll();
				if ($objHouseholdArray) foreach ($objHouseholdArray as $objHousehold) {
					$objListItem = new QListItem($objHousehold->__toString(), $objHousehold->Id);
					if ($objHousehold->HeadPersonId == $this->objPerson->Id)
						$objListItem->Selected = true;
					$this->lstHouseholdAsHead->AddItem($objListItem);
				}
				// Because Household's HouseholdAsHead is not null, if a value is already selected, it cannot be changed.
				if ($this->lstHouseholdAsHead->SelectedValue)
					$this->lstHouseholdAsHead->Enabled = false;
				else
					$this->lstHouseholdAsHead->Enabled = true;
			}
			if ($this->lblHouseholdAsHead) $this->lblHouseholdAsHead->Text = ($this->objPerson->HouseholdAsHead) ? $this->objPerson->HouseholdAsHead->__toString() : null;

			if ($this->lstPublicLogin) {
				$this->lstPublicLogin->RemoveAllItems();
				$this->lstPublicLogin->AddItem(QApplication::Translate('- Select One -'), null);
				$objPublicLoginArray = PublicLogin::LoadAll();
				if ($objPublicLoginArray) foreach ($objPublicLoginArray as $objPublicLogin) {
					$objListItem = new QListItem($objPublicLogin->__toString(), $objPublicLogin->Id);
					if ($objPublicLogin->PersonId == $this->objPerson->Id)
						$objListItem->Selected = true;
					$this->lstPublicLogin->AddItem($objListItem);
				}
				// Because PublicLogin's PublicLogin is not null, if a value is already selected, it cannot be changed.
				if ($this->lstPublicLogin->SelectedValue)
					$this->lstPublicLogin->Enabled = false;
				else
					$this->lstPublicLogin->Enabled = true;
			}
			if ($this->lblPublicLogin) $this->lblPublicLogin->Text = ($this->objPerson->PublicLogin) ? $this->objPerson->PublicLogin->__toString() : null;

			if ($this->lstCheckingAccountLookups) {
				$this->lstCheckingAccountLookups->RemoveAllItems();
				$objAssociatedArray = $this->objPerson->GetCheckingAccountLookupArray();
				$objCheckingAccountLookupArray = CheckingAccountLookup::LoadAll();
				if ($objCheckingAccountLookupArray) foreach ($objCheckingAccountLookupArray as $objCheckingAccountLookup) {
					$objListItem = new QListItem($objCheckingAccountLookup->__toString(), $objCheckingAccountLookup->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objCheckingAccountLookup->Id)
							$objListItem->Selected = true;
					}
					$this->lstCheckingAccountLookups->AddItem($objListItem);
				}
			}
			if ($this->lblCheckingAccountLookups) {
				$objAssociatedArray = $this->objPerson->GetCheckingAccountLookupArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblCheckingAccountLookups->Text = implode($strGlue, $strItems);
			}

			if ($this->lstCommunicationLists) {
				$this->lstCommunicationLists->RemoveAllItems();
				$objAssociatedArray = $this->objPerson->GetCommunicationListArray();
				$objCommunicationListArray = CommunicationList::LoadAll();
				if ($objCommunicationListArray) foreach ($objCommunicationListArray as $objCommunicationList) {
					$objListItem = new QListItem($objCommunicationList->__toString(), $objCommunicationList->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objCommunicationList->Id)
							$objListItem->Selected = true;
					}
					$this->lstCommunicationLists->AddItem($objListItem);
				}
			}
			if ($this->lblCommunicationLists) {
				$objAssociatedArray = $this->objPerson->GetCommunicationListArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblCommunicationLists->Text = implode($strGlue, $strItems);
			}

			if ($this->lstNameItems) {
				$this->lstNameItems->RemoveAllItems();
				$objAssociatedArray = $this->objPerson->GetNameItemArray();
				$objNameItemArray = NameItem::LoadAll();
				if ($objNameItemArray) foreach ($objNameItemArray as $objNameItem) {
					$objListItem = new QListItem($objNameItem->__toString(), $objNameItem->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objNameItem->Id)
							$objListItem->Selected = true;
					}
					$this->lstNameItems->AddItem($objListItem);
				}
			}
			if ($this->lblNameItems) {
				$objAssociatedArray = $this->objPerson->GetNameItemArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblNameItems->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstCheckingAccountLookups_Update() {
			if ($this->lstCheckingAccountLookups) {
				$this->objPerson->UnassociateAllCheckingAccountLookups();
				$objSelectedListItems = $this->lstCheckingAccountLookups->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objPerson->AssociateCheckingAccountLookup(CheckingAccountLookup::Load($objListItem->Value));
				}
			}
		}

		protected function lstCommunicationLists_Update() {
			if ($this->lstCommunicationLists) {
				$this->objPerson->UnassociateAllCommunicationLists();
				$objSelectedListItems = $this->lstCommunicationLists->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objPerson->AssociateCommunicationList(CommunicationList::Load($objListItem->Value));
				}
			}
		}

		protected function lstNameItems_Update() {
			if ($this->lstNameItems) {
				$this->objPerson->UnassociateAllNameItems();
				$objSelectedListItems = $this->lstNameItems->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objPerson->AssociateNameItem(NameItem::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC PERSON OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Person instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePerson() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstMembershipStatusType) $this->objPerson->MembershipStatusTypeId = $this->lstMembershipStatusType->SelectedValue;
				if ($this->lstMaritalStatusType) $this->objPerson->MaritalStatusTypeId = $this->lstMaritalStatusType->SelectedValue;
				if ($this->txtFirstName) $this->objPerson->FirstName = $this->txtFirstName->Text;
				if ($this->txtMiddleName) $this->objPerson->MiddleName = $this->txtMiddleName->Text;
				if ($this->txtLastName) $this->objPerson->LastName = $this->txtLastName->Text;
				if ($this->txtMailingLabel) $this->objPerson->MailingLabel = $this->txtMailingLabel->Text;
				if ($this->txtPriorLastNames) $this->objPerson->PriorLastNames = $this->txtPriorLastNames->Text;
				if ($this->txtNickname) $this->objPerson->Nickname = $this->txtNickname->Text;
				if ($this->txtTitle) $this->objPerson->Title = $this->txtTitle->Text;
				if ($this->txtSuffix) $this->objPerson->Suffix = $this->txtSuffix->Text;
				if ($this->txtGender) $this->objPerson->Gender = $this->txtGender->Text;
				if ($this->calDateOfBirth) $this->objPerson->DateOfBirth = $this->calDateOfBirth->DateTime;
				if ($this->chkDobYearApproximateFlag) $this->objPerson->DobYearApproximateFlag = $this->chkDobYearApproximateFlag->Checked;
				if ($this->chkDobGuessedFlag) $this->objPerson->DobGuessedFlag = $this->chkDobGuessedFlag->Checked;
				if ($this->txtAge) $this->objPerson->Age = $this->txtAge->Text;
				if ($this->chkDeceasedFlag) $this->objPerson->DeceasedFlag = $this->chkDeceasedFlag->Checked;
				if ($this->calDateDeceased) $this->objPerson->DateDeceased = $this->calDateDeceased->DateTime;
				if ($this->lstCurrentHeadShot) $this->objPerson->CurrentHeadShotId = $this->lstCurrentHeadShot->SelectedValue;
				if ($this->lstMailingAddress) $this->objPerson->MailingAddressId = $this->lstMailingAddress->SelectedValue;
				if ($this->lstStewardshipAddress) $this->objPerson->StewardshipAddressId = $this->lstStewardshipAddress->SelectedValue;
				if ($this->lstPrimaryPhone) $this->objPerson->PrimaryPhoneId = $this->lstPrimaryPhone->SelectedValue;
				if ($this->lstPrimaryEmail) $this->objPerson->PrimaryEmailId = $this->lstPrimaryEmail->SelectedValue;
				if ($this->chkCanMailFlag) $this->objPerson->CanMailFlag = $this->chkCanMailFlag->Checked;
				if ($this->chkCanPhoneFlag) $this->objPerson->CanPhoneFlag = $this->chkCanPhoneFlag->Checked;
				if ($this->chkCanEmailFlag) $this->objPerson->CanEmailFlag = $this->chkCanEmailFlag->Checked;
				if ($this->txtPrimaryAddressText) $this->objPerson->PrimaryAddressText = $this->txtPrimaryAddressText->Text;
				if ($this->txtPrimaryCityText) $this->objPerson->PrimaryCityText = $this->txtPrimaryCityText->Text;
				if ($this->txtPrimaryStateText) $this->objPerson->PrimaryStateText = $this->txtPrimaryStateText->Text;
				if ($this->txtPrimaryZipCodeText) $this->objPerson->PrimaryZipCodeText = $this->txtPrimaryZipCodeText->Text;
				if ($this->txtPrimaryPhoneText) $this->objPerson->PrimaryPhoneText = $this->txtPrimaryPhoneText->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstHouseholdAsHead) $this->objPerson->HouseholdAsHead = Household::Load($this->lstHouseholdAsHead->SelectedValue);
				if ($this->lstPublicLogin) $this->objPerson->PublicLogin = PublicLogin::Load($this->lstPublicLogin->SelectedValue);

				// Save the Person object
				$this->objPerson->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstCheckingAccountLookups_Update();
				$this->lstCommunicationLists_Update();
				$this->lstNameItems_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Person instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePerson() {
			$this->objPerson->UnassociateAllCheckingAccountLookups();
			$this->objPerson->UnassociateAllCommunicationLists();
			$this->objPerson->UnassociateAllNameItems();
			$this->objPerson->Delete();
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
				case 'Person': return $this->objPerson;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Person fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'MembershipStatusTypeIdControl':
					if (!$this->lstMembershipStatusType) return $this->lstMembershipStatusType_Create();
					return $this->lstMembershipStatusType;
				case 'MembershipStatusTypeIdLabel':
					if (!$this->lblMembershipStatusTypeId) return $this->lblMembershipStatusTypeId_Create();
					return $this->lblMembershipStatusTypeId;
				case 'MaritalStatusTypeIdControl':
					if (!$this->lstMaritalStatusType) return $this->lstMaritalStatusType_Create();
					return $this->lstMaritalStatusType;
				case 'MaritalStatusTypeIdLabel':
					if (!$this->lblMaritalStatusTypeId) return $this->lblMaritalStatusTypeId_Create();
					return $this->lblMaritalStatusTypeId;
				case 'FirstNameControl':
					if (!$this->txtFirstName) return $this->txtFirstName_Create();
					return $this->txtFirstName;
				case 'FirstNameLabel':
					if (!$this->lblFirstName) return $this->lblFirstName_Create();
					return $this->lblFirstName;
				case 'MiddleNameControl':
					if (!$this->txtMiddleName) return $this->txtMiddleName_Create();
					return $this->txtMiddleName;
				case 'MiddleNameLabel':
					if (!$this->lblMiddleName) return $this->lblMiddleName_Create();
					return $this->lblMiddleName;
				case 'LastNameControl':
					if (!$this->txtLastName) return $this->txtLastName_Create();
					return $this->txtLastName;
				case 'LastNameLabel':
					if (!$this->lblLastName) return $this->lblLastName_Create();
					return $this->lblLastName;
				case 'MailingLabelControl':
					if (!$this->txtMailingLabel) return $this->txtMailingLabel_Create();
					return $this->txtMailingLabel;
				case 'MailingLabelLabel':
					if (!$this->lblMailingLabel) return $this->lblMailingLabel_Create();
					return $this->lblMailingLabel;
				case 'PriorLastNamesControl':
					if (!$this->txtPriorLastNames) return $this->txtPriorLastNames_Create();
					return $this->txtPriorLastNames;
				case 'PriorLastNamesLabel':
					if (!$this->lblPriorLastNames) return $this->lblPriorLastNames_Create();
					return $this->lblPriorLastNames;
				case 'NicknameControl':
					if (!$this->txtNickname) return $this->txtNickname_Create();
					return $this->txtNickname;
				case 'NicknameLabel':
					if (!$this->lblNickname) return $this->lblNickname_Create();
					return $this->lblNickname;
				case 'TitleControl':
					if (!$this->txtTitle) return $this->txtTitle_Create();
					return $this->txtTitle;
				case 'TitleLabel':
					if (!$this->lblTitle) return $this->lblTitle_Create();
					return $this->lblTitle;
				case 'SuffixControl':
					if (!$this->txtSuffix) return $this->txtSuffix_Create();
					return $this->txtSuffix;
				case 'SuffixLabel':
					if (!$this->lblSuffix) return $this->lblSuffix_Create();
					return $this->lblSuffix;
				case 'GenderControl':
					if (!$this->txtGender) return $this->txtGender_Create();
					return $this->txtGender;
				case 'GenderLabel':
					if (!$this->lblGender) return $this->lblGender_Create();
					return $this->lblGender;
				case 'DateOfBirthControl':
					if (!$this->calDateOfBirth) return $this->calDateOfBirth_Create();
					return $this->calDateOfBirth;
				case 'DateOfBirthLabel':
					if (!$this->lblDateOfBirth) return $this->lblDateOfBirth_Create();
					return $this->lblDateOfBirth;
				case 'DobYearApproximateFlagControl':
					if (!$this->chkDobYearApproximateFlag) return $this->chkDobYearApproximateFlag_Create();
					return $this->chkDobYearApproximateFlag;
				case 'DobYearApproximateFlagLabel':
					if (!$this->lblDobYearApproximateFlag) return $this->lblDobYearApproximateFlag_Create();
					return $this->lblDobYearApproximateFlag;
				case 'DobGuessedFlagControl':
					if (!$this->chkDobGuessedFlag) return $this->chkDobGuessedFlag_Create();
					return $this->chkDobGuessedFlag;
				case 'DobGuessedFlagLabel':
					if (!$this->lblDobGuessedFlag) return $this->lblDobGuessedFlag_Create();
					return $this->lblDobGuessedFlag;
				case 'AgeControl':
					if (!$this->txtAge) return $this->txtAge_Create();
					return $this->txtAge;
				case 'AgeLabel':
					if (!$this->lblAge) return $this->lblAge_Create();
					return $this->lblAge;
				case 'DeceasedFlagControl':
					if (!$this->chkDeceasedFlag) return $this->chkDeceasedFlag_Create();
					return $this->chkDeceasedFlag;
				case 'DeceasedFlagLabel':
					if (!$this->lblDeceasedFlag) return $this->lblDeceasedFlag_Create();
					return $this->lblDeceasedFlag;
				case 'DateDeceasedControl':
					if (!$this->calDateDeceased) return $this->calDateDeceased_Create();
					return $this->calDateDeceased;
				case 'DateDeceasedLabel':
					if (!$this->lblDateDeceased) return $this->lblDateDeceased_Create();
					return $this->lblDateDeceased;
				case 'CurrentHeadShotIdControl':
					if (!$this->lstCurrentHeadShot) return $this->lstCurrentHeadShot_Create();
					return $this->lstCurrentHeadShot;
				case 'CurrentHeadShotIdLabel':
					if (!$this->lblCurrentHeadShotId) return $this->lblCurrentHeadShotId_Create();
					return $this->lblCurrentHeadShotId;
				case 'MailingAddressIdControl':
					if (!$this->lstMailingAddress) return $this->lstMailingAddress_Create();
					return $this->lstMailingAddress;
				case 'MailingAddressIdLabel':
					if (!$this->lblMailingAddressId) return $this->lblMailingAddressId_Create();
					return $this->lblMailingAddressId;
				case 'StewardshipAddressIdControl':
					if (!$this->lstStewardshipAddress) return $this->lstStewardshipAddress_Create();
					return $this->lstStewardshipAddress;
				case 'StewardshipAddressIdLabel':
					if (!$this->lblStewardshipAddressId) return $this->lblStewardshipAddressId_Create();
					return $this->lblStewardshipAddressId;
				case 'PrimaryPhoneIdControl':
					if (!$this->lstPrimaryPhone) return $this->lstPrimaryPhone_Create();
					return $this->lstPrimaryPhone;
				case 'PrimaryPhoneIdLabel':
					if (!$this->lblPrimaryPhoneId) return $this->lblPrimaryPhoneId_Create();
					return $this->lblPrimaryPhoneId;
				case 'PrimaryEmailIdControl':
					if (!$this->lstPrimaryEmail) return $this->lstPrimaryEmail_Create();
					return $this->lstPrimaryEmail;
				case 'PrimaryEmailIdLabel':
					if (!$this->lblPrimaryEmailId) return $this->lblPrimaryEmailId_Create();
					return $this->lblPrimaryEmailId;
				case 'CanMailFlagControl':
					if (!$this->chkCanMailFlag) return $this->chkCanMailFlag_Create();
					return $this->chkCanMailFlag;
				case 'CanMailFlagLabel':
					if (!$this->lblCanMailFlag) return $this->lblCanMailFlag_Create();
					return $this->lblCanMailFlag;
				case 'CanPhoneFlagControl':
					if (!$this->chkCanPhoneFlag) return $this->chkCanPhoneFlag_Create();
					return $this->chkCanPhoneFlag;
				case 'CanPhoneFlagLabel':
					if (!$this->lblCanPhoneFlag) return $this->lblCanPhoneFlag_Create();
					return $this->lblCanPhoneFlag;
				case 'CanEmailFlagControl':
					if (!$this->chkCanEmailFlag) return $this->chkCanEmailFlag_Create();
					return $this->chkCanEmailFlag;
				case 'CanEmailFlagLabel':
					if (!$this->lblCanEmailFlag) return $this->lblCanEmailFlag_Create();
					return $this->lblCanEmailFlag;
				case 'PrimaryAddressTextControl':
					if (!$this->txtPrimaryAddressText) return $this->txtPrimaryAddressText_Create();
					return $this->txtPrimaryAddressText;
				case 'PrimaryAddressTextLabel':
					if (!$this->lblPrimaryAddressText) return $this->lblPrimaryAddressText_Create();
					return $this->lblPrimaryAddressText;
				case 'PrimaryCityTextControl':
					if (!$this->txtPrimaryCityText) return $this->txtPrimaryCityText_Create();
					return $this->txtPrimaryCityText;
				case 'PrimaryCityTextLabel':
					if (!$this->lblPrimaryCityText) return $this->lblPrimaryCityText_Create();
					return $this->lblPrimaryCityText;
				case 'PrimaryStateTextControl':
					if (!$this->txtPrimaryStateText) return $this->txtPrimaryStateText_Create();
					return $this->txtPrimaryStateText;
				case 'PrimaryStateTextLabel':
					if (!$this->lblPrimaryStateText) return $this->lblPrimaryStateText_Create();
					return $this->lblPrimaryStateText;
				case 'PrimaryZipCodeTextControl':
					if (!$this->txtPrimaryZipCodeText) return $this->txtPrimaryZipCodeText_Create();
					return $this->txtPrimaryZipCodeText;
				case 'PrimaryZipCodeTextLabel':
					if (!$this->lblPrimaryZipCodeText) return $this->lblPrimaryZipCodeText_Create();
					return $this->lblPrimaryZipCodeText;
				case 'PrimaryPhoneTextControl':
					if (!$this->txtPrimaryPhoneText) return $this->txtPrimaryPhoneText_Create();
					return $this->txtPrimaryPhoneText;
				case 'PrimaryPhoneTextLabel':
					if (!$this->lblPrimaryPhoneText) return $this->lblPrimaryPhoneText_Create();
					return $this->lblPrimaryPhoneText;
				case 'HouseholdAsHeadControl':
					if (!$this->lstHouseholdAsHead) return $this->lstHouseholdAsHead_Create();
					return $this->lstHouseholdAsHead;
				case 'HouseholdAsHeadLabel':
					if (!$this->lblHouseholdAsHead) return $this->lblHouseholdAsHead_Create();
					return $this->lblHouseholdAsHead;
				case 'PublicLoginControl':
					if (!$this->lstPublicLogin) return $this->lstPublicLogin_Create();
					return $this->lstPublicLogin;
				case 'PublicLoginLabel':
					if (!$this->lblPublicLogin) return $this->lblPublicLogin_Create();
					return $this->lblPublicLogin;
				case 'CheckingAccountLookupControl':
					if (!$this->lstCheckingAccountLookups) return $this->lstCheckingAccountLookups_Create();
					return $this->lstCheckingAccountLookups;
				case 'CheckingAccountLookupLabel':
					if (!$this->lblCheckingAccountLookups) return $this->lblCheckingAccountLookups_Create();
					return $this->lblCheckingAccountLookups;
				case 'CommunicationListControl':
					if (!$this->lstCommunicationLists) return $this->lstCommunicationLists_Create();
					return $this->lstCommunicationLists;
				case 'CommunicationListLabel':
					if (!$this->lblCommunicationLists) return $this->lblCommunicationLists_Create();
					return $this->lblCommunicationLists;
				case 'NameItemControl':
					if (!$this->lstNameItems) return $this->lstNameItems_Create();
					return $this->lstNameItems;
				case 'NameItemLabel':
					if (!$this->lblNameItems) return $this->lblNameItems_Create();
					return $this->lblNameItems;
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
					// Controls that point to Person fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'MembershipStatusTypeIdControl':
						return ($this->lstMembershipStatusType = QType::Cast($mixValue, 'QControl'));
					case 'MaritalStatusTypeIdControl':
						return ($this->lstMaritalStatusType = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'MiddleNameControl':
						return ($this->txtMiddleName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'MailingLabelControl':
						return ($this->txtMailingLabel = QType::Cast($mixValue, 'QControl'));
					case 'PriorLastNamesControl':
						return ($this->txtPriorLastNames = QType::Cast($mixValue, 'QControl'));
					case 'NicknameControl':
						return ($this->txtNickname = QType::Cast($mixValue, 'QControl'));
					case 'TitleControl':
						return ($this->txtTitle = QType::Cast($mixValue, 'QControl'));
					case 'SuffixControl':
						return ($this->txtSuffix = QType::Cast($mixValue, 'QControl'));
					case 'GenderControl':
						return ($this->txtGender = QType::Cast($mixValue, 'QControl'));
					case 'DateOfBirthControl':
						return ($this->calDateOfBirth = QType::Cast($mixValue, 'QControl'));
					case 'DobYearApproximateFlagControl':
						return ($this->chkDobYearApproximateFlag = QType::Cast($mixValue, 'QControl'));
					case 'DobGuessedFlagControl':
						return ($this->chkDobGuessedFlag = QType::Cast($mixValue, 'QControl'));
					case 'AgeControl':
						return ($this->txtAge = QType::Cast($mixValue, 'QControl'));
					case 'DeceasedFlagControl':
						return ($this->chkDeceasedFlag = QType::Cast($mixValue, 'QControl'));
					case 'DateDeceasedControl':
						return ($this->calDateDeceased = QType::Cast($mixValue, 'QControl'));
					case 'CurrentHeadShotIdControl':
						return ($this->lstCurrentHeadShot = QType::Cast($mixValue, 'QControl'));
					case 'MailingAddressIdControl':
						return ($this->lstMailingAddress = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipAddressIdControl':
						return ($this->lstStewardshipAddress = QType::Cast($mixValue, 'QControl'));
					case 'PrimaryPhoneIdControl':
						return ($this->lstPrimaryPhone = QType::Cast($mixValue, 'QControl'));
					case 'PrimaryEmailIdControl':
						return ($this->lstPrimaryEmail = QType::Cast($mixValue, 'QControl'));
					case 'CanMailFlagControl':
						return ($this->chkCanMailFlag = QType::Cast($mixValue, 'QControl'));
					case 'CanPhoneFlagControl':
						return ($this->chkCanPhoneFlag = QType::Cast($mixValue, 'QControl'));
					case 'CanEmailFlagControl':
						return ($this->chkCanEmailFlag = QType::Cast($mixValue, 'QControl'));
					case 'PrimaryAddressTextControl':
						return ($this->txtPrimaryAddressText = QType::Cast($mixValue, 'QControl'));
					case 'PrimaryCityTextControl':
						return ($this->txtPrimaryCityText = QType::Cast($mixValue, 'QControl'));
					case 'PrimaryStateTextControl':
						return ($this->txtPrimaryStateText = QType::Cast($mixValue, 'QControl'));
					case 'PrimaryZipCodeTextControl':
						return ($this->txtPrimaryZipCodeText = QType::Cast($mixValue, 'QControl'));
					case 'PrimaryPhoneTextControl':
						return ($this->txtPrimaryPhoneText = QType::Cast($mixValue, 'QControl'));
					case 'HouseholdAsHeadControl':
						return ($this->lstHouseholdAsHead = QType::Cast($mixValue, 'QControl'));
					case 'PublicLoginControl':
						return ($this->lstPublicLogin = QType::Cast($mixValue, 'QControl'));
					case 'CheckingAccountLookupControl':
						return ($this->lstCheckingAccountLookups = QType::Cast($mixValue, 'QControl'));
					case 'CommunicationListControl':
						return ($this->lstCommunicationLists = QType::Cast($mixValue, 'QControl'));
					case 'NameItemControl':
						return ($this->lstNameItems = QType::Cast($mixValue, 'QControl'));
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