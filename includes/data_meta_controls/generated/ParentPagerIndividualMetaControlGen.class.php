<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ParentPagerIndividual class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ParentPagerIndividual object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ParentPagerIndividualMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ParentPagerIndividual $ParentPagerIndividual the actual ParentPagerIndividual data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $ServerIdentifierControl
	 * property-read QLabel $ServerIdentifierLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QCheckBox $HiddenFlagControl
	 * property-read QLabel $HiddenFlagLabel
	 * property QListBox $ParentPagerSyncStatusTypeIdControl
	 * property-read QLabel $ParentPagerSyncStatusTypeIdLabel
	 * property QListBox $ParentPagerHouseholdIdControl
	 * property-read QLabel $ParentPagerHouseholdIdLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $MiddleNameControl
	 * property-read QLabel $MiddleNameLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QTextBox $PrefixControl
	 * property-read QLabel $PrefixLabel
	 * property QTextBox $SuffixControl
	 * property-read QLabel $SuffixLabel
	 * property QTextBox $NicknameControl
	 * property-read QLabel $NicknameLabel
	 * property QIntegerTextBox $GraduationYearControl
	 * property-read QLabel $GraduationYearLabel
	 * property QTextBox $GenderControl
	 * property-read QLabel $GenderLabel
	 * property QDateTimePicker $DateOfBirthControl
	 * property-read QLabel $DateOfBirthLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ParentPagerIndividualMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ParentPagerIndividual objParentPagerIndividual
		 * @access protected
		 */
		protected $objParentPagerIndividual;

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

		// Controls that allow the editing of ParentPagerIndividual's individual data fields
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
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

        /**
         * @var QCheckBox chkHiddenFlag;
         * @access protected
         */
		protected $chkHiddenFlag;

        /**
         * @var QListBox lstParentPagerSyncStatusType;
         * @access protected
         */
		protected $lstParentPagerSyncStatusType;

        /**
         * @var QListBox lstParentPagerHousehold;
         * @access protected
         */
		protected $lstParentPagerHousehold;

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
         * @var QTextBox txtPrefix;
         * @access protected
         */
		protected $txtPrefix;

        /**
         * @var QTextBox txtSuffix;
         * @access protected
         */
		protected $txtSuffix;

        /**
         * @var QTextBox txtNickname;
         * @access protected
         */
		protected $txtNickname;

        /**
         * @var QIntegerTextBox txtGraduationYear;
         * @access protected
         */
		protected $txtGraduationYear;

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


		// Controls that allow the viewing of ParentPagerIndividual's individual data fields
        /**
         * @var QLabel lblServerIdentifier
         * @access protected
         */
		protected $lblServerIdentifier;

        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblHiddenFlag
         * @access protected
         */
		protected $lblHiddenFlag;

        /**
         * @var QLabel lblParentPagerSyncStatusTypeId
         * @access protected
         */
		protected $lblParentPagerSyncStatusTypeId;

        /**
         * @var QLabel lblParentPagerHouseholdId
         * @access protected
         */
		protected $lblParentPagerHouseholdId;

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
         * @var QLabel lblPrefix
         * @access protected
         */
		protected $lblPrefix;

        /**
         * @var QLabel lblSuffix
         * @access protected
         */
		protected $lblSuffix;

        /**
         * @var QLabel lblNickname
         * @access protected
         */
		protected $lblNickname;

        /**
         * @var QLabel lblGraduationYear
         * @access protected
         */
		protected $lblGraduationYear;

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


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ParentPagerIndividualMetaControl to edit a single ParentPagerIndividual object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ParentPagerIndividual object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerIndividualMetaControl
		 * @param ParentPagerIndividual $objParentPagerIndividual new or existing ParentPagerIndividual object
		 */
		 public function __construct($objParentObject, ParentPagerIndividual $objParentPagerIndividual) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ParentPagerIndividualMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ParentPagerIndividual object
			$this->objParentPagerIndividual = $objParentPagerIndividual;

			// Figure out if we're Editing or Creating New
			if ($this->objParentPagerIndividual->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerIndividualMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerIndividual object creation - defaults to CreateOrEdit
 		 * @return ParentPagerIndividualMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objParentPagerIndividual = ParentPagerIndividual::Load($intId);

				// ParentPagerIndividual was found -- return it!
				if ($objParentPagerIndividual)
					return new ParentPagerIndividualMetaControl($objParentObject, $objParentPagerIndividual);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ParentPagerIndividual object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ParentPagerIndividualMetaControl($objParentObject, new ParentPagerIndividual());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerIndividualMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerIndividual object creation - defaults to CreateOrEdit
		 * @return ParentPagerIndividualMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ParentPagerIndividualMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerIndividualMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerIndividual object creation - defaults to CreateOrEdit
		 * @return ParentPagerIndividualMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ParentPagerIndividualMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objParentPagerIndividual->Id;
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
			$this->txtServerIdentifier->Text = $this->objParentPagerIndividual->ServerIdentifier;
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
			$this->lblServerIdentifier->Text = $this->objParentPagerIndividual->ServerIdentifier;
			$this->lblServerIdentifier->Required = true;
			$this->lblServerIdentifier->Format = $strFormat;
			return $this->lblServerIdentifier;
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
				if (($this->objParentPagerIndividual->Person) && ($this->objParentPagerIndividual->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objParentPagerIndividual->Person) ? $this->objParentPagerIndividual->Person->__toString() : null;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QCheckBox chkHiddenFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkHiddenFlag_Create($strControlId = null) {
			$this->chkHiddenFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkHiddenFlag->Name = QApplication::Translate('Hidden Flag');
			$this->chkHiddenFlag->Checked = $this->objParentPagerIndividual->HiddenFlag;
			return $this->chkHiddenFlag;
		}

		/**
		 * Create and setup QLabel lblHiddenFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblHiddenFlag_Create($strControlId = null) {
			$this->lblHiddenFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblHiddenFlag->Name = QApplication::Translate('Hidden Flag');
			$this->lblHiddenFlag->Text = ($this->objParentPagerIndividual->HiddenFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblHiddenFlag;
		}

		/**
		 * Create and setup QListBox lstParentPagerSyncStatusType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstParentPagerSyncStatusType_Create($strControlId = null) {
			$this->lstParentPagerSyncStatusType = new QListBox($this->objParentObject, $strControlId);
			$this->lstParentPagerSyncStatusType->Name = QApplication::Translate('Parent Pager Sync Status Type');
			$this->lstParentPagerSyncStatusType->Required = true;

			$this->lstParentPagerSyncStatusType->AddItems(ParentPagerSyncStatusType::$NameArray, $this->objParentPagerIndividual->ParentPagerSyncStatusTypeId);
			return $this->lstParentPagerSyncStatusType;
		}

		/**
		 * Create and setup QLabel lblParentPagerSyncStatusTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblParentPagerSyncStatusTypeId_Create($strControlId = null) {
			$this->lblParentPagerSyncStatusTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblParentPagerSyncStatusTypeId->Name = QApplication::Translate('Parent Pager Sync Status Type');
			$this->lblParentPagerSyncStatusTypeId->Text = ($this->objParentPagerIndividual->ParentPagerSyncStatusTypeId) ? ParentPagerSyncStatusType::$NameArray[$this->objParentPagerIndividual->ParentPagerSyncStatusTypeId] : null;
			$this->lblParentPagerSyncStatusTypeId->Required = true;
			return $this->lblParentPagerSyncStatusTypeId;
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
				if (($this->objParentPagerIndividual->ParentPagerHousehold) && ($this->objParentPagerIndividual->ParentPagerHousehold->Id == $objParentPagerHousehold->Id))
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
			$this->lblParentPagerHouseholdId->Text = ($this->objParentPagerIndividual->ParentPagerHousehold) ? $this->objParentPagerIndividual->ParentPagerHousehold->__toString() : null;
			return $this->lblParentPagerHouseholdId;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objParentPagerIndividual->FirstName;
			$this->txtFirstName->MaxLength = ParentPagerIndividual::FirstNameMaxLength;
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
			$this->lblFirstName->Text = $this->objParentPagerIndividual->FirstName;
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
			$this->txtMiddleName->Text = $this->objParentPagerIndividual->MiddleName;
			$this->txtMiddleName->MaxLength = ParentPagerIndividual::MiddleNameMaxLength;
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
			$this->lblMiddleName->Text = $this->objParentPagerIndividual->MiddleName;
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
			$this->txtLastName->Text = $this->objParentPagerIndividual->LastName;
			$this->txtLastName->MaxLength = ParentPagerIndividual::LastNameMaxLength;
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
			$this->lblLastName->Text = $this->objParentPagerIndividual->LastName;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QTextBox txtPrefix
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPrefix_Create($strControlId = null) {
			$this->txtPrefix = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPrefix->Name = QApplication::Translate('Prefix');
			$this->txtPrefix->Text = $this->objParentPagerIndividual->Prefix;
			$this->txtPrefix->MaxLength = ParentPagerIndividual::PrefixMaxLength;
			return $this->txtPrefix;
		}

		/**
		 * Create and setup QLabel lblPrefix
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPrefix_Create($strControlId = null) {
			$this->lblPrefix = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrefix->Name = QApplication::Translate('Prefix');
			$this->lblPrefix->Text = $this->objParentPagerIndividual->Prefix;
			return $this->lblPrefix;
		}

		/**
		 * Create and setup QTextBox txtSuffix
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSuffix_Create($strControlId = null) {
			$this->txtSuffix = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSuffix->Name = QApplication::Translate('Suffix');
			$this->txtSuffix->Text = $this->objParentPagerIndividual->Suffix;
			$this->txtSuffix->MaxLength = ParentPagerIndividual::SuffixMaxLength;
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
			$this->lblSuffix->Text = $this->objParentPagerIndividual->Suffix;
			return $this->lblSuffix;
		}

		/**
		 * Create and setup QTextBox txtNickname
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNickname_Create($strControlId = null) {
			$this->txtNickname = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNickname->Name = QApplication::Translate('Nickname');
			$this->txtNickname->Text = $this->objParentPagerIndividual->Nickname;
			$this->txtNickname->MaxLength = ParentPagerIndividual::NicknameMaxLength;
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
			$this->lblNickname->Text = $this->objParentPagerIndividual->Nickname;
			return $this->lblNickname;
		}

		/**
		 * Create and setup QIntegerTextBox txtGraduationYear
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtGraduationYear_Create($strControlId = null) {
			$this->txtGraduationYear = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtGraduationYear->Name = QApplication::Translate('Graduation Year');
			$this->txtGraduationYear->Text = $this->objParentPagerIndividual->GraduationYear;
			return $this->txtGraduationYear;
		}

		/**
		 * Create and setup QLabel lblGraduationYear
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblGraduationYear_Create($strControlId = null, $strFormat = null) {
			$this->lblGraduationYear = new QLabel($this->objParentObject, $strControlId);
			$this->lblGraduationYear->Name = QApplication::Translate('Graduation Year');
			$this->lblGraduationYear->Text = $this->objParentPagerIndividual->GraduationYear;
			$this->lblGraduationYear->Format = $strFormat;
			return $this->lblGraduationYear;
		}

		/**
		 * Create and setup QTextBox txtGender
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtGender_Create($strControlId = null) {
			$this->txtGender = new QTextBox($this->objParentObject, $strControlId);
			$this->txtGender->Name = QApplication::Translate('Gender');
			$this->txtGender->Text = $this->objParentPagerIndividual->Gender;
			$this->txtGender->MaxLength = ParentPagerIndividual::GenderMaxLength;
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
			$this->lblGender->Text = $this->objParentPagerIndividual->Gender;
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
			$this->calDateOfBirth->DateTime = $this->objParentPagerIndividual->DateOfBirth;
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
			$this->lblDateOfBirth->Text = sprintf($this->objParentPagerIndividual->DateOfBirth) ? $this->objParentPagerIndividual->DateOfBirth->__toString($this->strDateOfBirthDateTimeFormat) : null;
			return $this->lblDateOfBirth;
		}

		protected $strDateOfBirthDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local ParentPagerIndividual object.
		 * @param boolean $blnReload reload ParentPagerIndividual from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objParentPagerIndividual->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objParentPagerIndividual->Id;

			if ($this->txtServerIdentifier) $this->txtServerIdentifier->Text = $this->objParentPagerIndividual->ServerIdentifier;
			if ($this->lblServerIdentifier) $this->lblServerIdentifier->Text = $this->objParentPagerIndividual->ServerIdentifier;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objParentPagerIndividual->Person) && ($this->objParentPagerIndividual->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objParentPagerIndividual->Person) ? $this->objParentPagerIndividual->Person->__toString() : null;

			if ($this->chkHiddenFlag) $this->chkHiddenFlag->Checked = $this->objParentPagerIndividual->HiddenFlag;
			if ($this->lblHiddenFlag) $this->lblHiddenFlag->Text = ($this->objParentPagerIndividual->HiddenFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstParentPagerSyncStatusType) $this->lstParentPagerSyncStatusType->SelectedValue = $this->objParentPagerIndividual->ParentPagerSyncStatusTypeId;
			if ($this->lblParentPagerSyncStatusTypeId) $this->lblParentPagerSyncStatusTypeId->Text = ($this->objParentPagerIndividual->ParentPagerSyncStatusTypeId) ? ParentPagerSyncStatusType::$NameArray[$this->objParentPagerIndividual->ParentPagerSyncStatusTypeId] : null;

			if ($this->lstParentPagerHousehold) {
					$this->lstParentPagerHousehold->RemoveAllItems();
				$this->lstParentPagerHousehold->AddItem(QApplication::Translate('- Select One -'), null);
				$objParentPagerHouseholdArray = ParentPagerHousehold::LoadAll();
				if ($objParentPagerHouseholdArray) foreach ($objParentPagerHouseholdArray as $objParentPagerHousehold) {
					$objListItem = new QListItem($objParentPagerHousehold->__toString(), $objParentPagerHousehold->Id);
					if (($this->objParentPagerIndividual->ParentPagerHousehold) && ($this->objParentPagerIndividual->ParentPagerHousehold->Id == $objParentPagerHousehold->Id))
						$objListItem->Selected = true;
					$this->lstParentPagerHousehold->AddItem($objListItem);
				}
			}
			if ($this->lblParentPagerHouseholdId) $this->lblParentPagerHouseholdId->Text = ($this->objParentPagerIndividual->ParentPagerHousehold) ? $this->objParentPagerIndividual->ParentPagerHousehold->__toString() : null;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objParentPagerIndividual->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objParentPagerIndividual->FirstName;

			if ($this->txtMiddleName) $this->txtMiddleName->Text = $this->objParentPagerIndividual->MiddleName;
			if ($this->lblMiddleName) $this->lblMiddleName->Text = $this->objParentPagerIndividual->MiddleName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objParentPagerIndividual->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objParentPagerIndividual->LastName;

			if ($this->txtPrefix) $this->txtPrefix->Text = $this->objParentPagerIndividual->Prefix;
			if ($this->lblPrefix) $this->lblPrefix->Text = $this->objParentPagerIndividual->Prefix;

			if ($this->txtSuffix) $this->txtSuffix->Text = $this->objParentPagerIndividual->Suffix;
			if ($this->lblSuffix) $this->lblSuffix->Text = $this->objParentPagerIndividual->Suffix;

			if ($this->txtNickname) $this->txtNickname->Text = $this->objParentPagerIndividual->Nickname;
			if ($this->lblNickname) $this->lblNickname->Text = $this->objParentPagerIndividual->Nickname;

			if ($this->txtGraduationYear) $this->txtGraduationYear->Text = $this->objParentPagerIndividual->GraduationYear;
			if ($this->lblGraduationYear) $this->lblGraduationYear->Text = $this->objParentPagerIndividual->GraduationYear;

			if ($this->txtGender) $this->txtGender->Text = $this->objParentPagerIndividual->Gender;
			if ($this->lblGender) $this->lblGender->Text = $this->objParentPagerIndividual->Gender;

			if ($this->calDateOfBirth) $this->calDateOfBirth->DateTime = $this->objParentPagerIndividual->DateOfBirth;
			if ($this->lblDateOfBirth) $this->lblDateOfBirth->Text = sprintf($this->objParentPagerIndividual->DateOfBirth) ? $this->objParentPagerIndividual->__toString($this->strDateOfBirthDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PARENTPAGERINDIVIDUAL OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ParentPagerIndividual instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveParentPagerIndividual() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtServerIdentifier) $this->objParentPagerIndividual->ServerIdentifier = $this->txtServerIdentifier->Text;
				if ($this->lstPerson) $this->objParentPagerIndividual->PersonId = $this->lstPerson->SelectedValue;
				if ($this->chkHiddenFlag) $this->objParentPagerIndividual->HiddenFlag = $this->chkHiddenFlag->Checked;
				if ($this->lstParentPagerSyncStatusType) $this->objParentPagerIndividual->ParentPagerSyncStatusTypeId = $this->lstParentPagerSyncStatusType->SelectedValue;
				if ($this->lstParentPagerHousehold) $this->objParentPagerIndividual->ParentPagerHouseholdId = $this->lstParentPagerHousehold->SelectedValue;
				if ($this->txtFirstName) $this->objParentPagerIndividual->FirstName = $this->txtFirstName->Text;
				if ($this->txtMiddleName) $this->objParentPagerIndividual->MiddleName = $this->txtMiddleName->Text;
				if ($this->txtLastName) $this->objParentPagerIndividual->LastName = $this->txtLastName->Text;
				if ($this->txtPrefix) $this->objParentPagerIndividual->Prefix = $this->txtPrefix->Text;
				if ($this->txtSuffix) $this->objParentPagerIndividual->Suffix = $this->txtSuffix->Text;
				if ($this->txtNickname) $this->objParentPagerIndividual->Nickname = $this->txtNickname->Text;
				if ($this->txtGraduationYear) $this->objParentPagerIndividual->GraduationYear = $this->txtGraduationYear->Text;
				if ($this->txtGender) $this->objParentPagerIndividual->Gender = $this->txtGender->Text;
				if ($this->calDateOfBirth) $this->objParentPagerIndividual->DateOfBirth = $this->calDateOfBirth->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ParentPagerIndividual object
				$this->objParentPagerIndividual->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ParentPagerIndividual instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteParentPagerIndividual() {
			$this->objParentPagerIndividual->Delete();
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
				case 'ParentPagerIndividual': return $this->objParentPagerIndividual;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ParentPagerIndividual fields -- will be created dynamically if not yet created
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
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'HiddenFlagControl':
					if (!$this->chkHiddenFlag) return $this->chkHiddenFlag_Create();
					return $this->chkHiddenFlag;
				case 'HiddenFlagLabel':
					if (!$this->lblHiddenFlag) return $this->lblHiddenFlag_Create();
					return $this->lblHiddenFlag;
				case 'ParentPagerSyncStatusTypeIdControl':
					if (!$this->lstParentPagerSyncStatusType) return $this->lstParentPagerSyncStatusType_Create();
					return $this->lstParentPagerSyncStatusType;
				case 'ParentPagerSyncStatusTypeIdLabel':
					if (!$this->lblParentPagerSyncStatusTypeId) return $this->lblParentPagerSyncStatusTypeId_Create();
					return $this->lblParentPagerSyncStatusTypeId;
				case 'ParentPagerHouseholdIdControl':
					if (!$this->lstParentPagerHousehold) return $this->lstParentPagerHousehold_Create();
					return $this->lstParentPagerHousehold;
				case 'ParentPagerHouseholdIdLabel':
					if (!$this->lblParentPagerHouseholdId) return $this->lblParentPagerHouseholdId_Create();
					return $this->lblParentPagerHouseholdId;
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
				case 'PrefixControl':
					if (!$this->txtPrefix) return $this->txtPrefix_Create();
					return $this->txtPrefix;
				case 'PrefixLabel':
					if (!$this->lblPrefix) return $this->lblPrefix_Create();
					return $this->lblPrefix;
				case 'SuffixControl':
					if (!$this->txtSuffix) return $this->txtSuffix_Create();
					return $this->txtSuffix;
				case 'SuffixLabel':
					if (!$this->lblSuffix) return $this->lblSuffix_Create();
					return $this->lblSuffix;
				case 'NicknameControl':
					if (!$this->txtNickname) return $this->txtNickname_Create();
					return $this->txtNickname;
				case 'NicknameLabel':
					if (!$this->lblNickname) return $this->lblNickname_Create();
					return $this->lblNickname;
				case 'GraduationYearControl':
					if (!$this->txtGraduationYear) return $this->txtGraduationYear_Create();
					return $this->txtGraduationYear;
				case 'GraduationYearLabel':
					if (!$this->lblGraduationYear) return $this->lblGraduationYear_Create();
					return $this->lblGraduationYear;
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
					// Controls that point to ParentPagerIndividual fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ServerIdentifierControl':
						return ($this->txtServerIdentifier = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'HiddenFlagControl':
						return ($this->chkHiddenFlag = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerSyncStatusTypeIdControl':
						return ($this->lstParentPagerSyncStatusType = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerHouseholdIdControl':
						return ($this->lstParentPagerHousehold = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'MiddleNameControl':
						return ($this->txtMiddleName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'PrefixControl':
						return ($this->txtPrefix = QType::Cast($mixValue, 'QControl'));
					case 'SuffixControl':
						return ($this->txtSuffix = QType::Cast($mixValue, 'QControl'));
					case 'NicknameControl':
						return ($this->txtNickname = QType::Cast($mixValue, 'QControl'));
					case 'GraduationYearControl':
						return ($this->txtGraduationYear = QType::Cast($mixValue, 'QControl'));
					case 'GenderControl':
						return ($this->txtGender = QType::Cast($mixValue, 'QControl'));
					case 'DateOfBirthControl':
						return ($this->calDateOfBirth = QType::Cast($mixValue, 'QControl'));
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