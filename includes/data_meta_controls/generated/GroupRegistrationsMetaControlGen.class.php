<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the GroupRegistrations class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single GroupRegistrations object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a GroupRegistrationsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read GroupRegistrations $GroupRegistrations the actual GroupRegistrations data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $SourceListIdControl
	 * property-read QLabel $SourceListIdLabel
	 * property QDateTimePicker $DateReceivedControl
	 * property-read QLabel $DateReceivedLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QTextBox $GenderControl
	 * property-read QLabel $GenderLabel
	 * property QTextBox $AddressControl
	 * property-read QLabel $AddressLabel
	 * property QTextBox $PhoneControl
	 * property-read QLabel $PhoneLabel
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property QTextBox $CommentsControl
	 * property-read QLabel $CommentsLabel
	 * property QListBox $GroupRoleIdControl
	 * property-read QLabel $GroupRoleIdLabel
	 * property QTextBox $PreferredLocation1Control
	 * property-read QLabel $PreferredLocation1Label
	 * property QTextBox $PreferredLocation2Control
	 * property-read QLabel $PreferredLocation2Label
	 * property QTextBox $CityControl
	 * property-read QLabel $CityLabel
	 * property QTextBox $ZipcodeControl
	 * property-read QLabel $ZipcodeLabel
	 * property QTextBox $GroupDayControl
	 * property-read QLabel $GroupDayLabel
	 * property QCheckBox $ProcessedFlagControl
	 * property-read QLabel $ProcessedFlagLabel
	 * property QTextBox $GroupsPlacedControl
	 * property-read QLabel $GroupsPlacedLabel
	 * property QDateTimePicker $DateProcessedControl
	 * property-read QLabel $DateProcessedLabel
	 * property QListBox $GrowthGroupStructureAsGroupstructureControl
	 * property-read QLabel $GrowthGroupStructureAsGroupstructureLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class GroupRegistrationsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var GroupRegistrations objGroupRegistrations
		 * @access protected
		 */
		protected $objGroupRegistrations;

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

		// Controls that allow the editing of GroupRegistrations's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstSourceList;
         * @access protected
         */
		protected $lstSourceList;

        /**
         * @var QDateTimePicker calDateReceived;
         * @access protected
         */
		protected $calDateReceived;

        /**
         * @var QTextBox txtFirstName;
         * @access protected
         */
		protected $txtFirstName;

        /**
         * @var QTextBox txtLastName;
         * @access protected
         */
		protected $txtLastName;

        /**
         * @var QTextBox txtGender;
         * @access protected
         */
		protected $txtGender;

        /**
         * @var QTextBox txtAddress;
         * @access protected
         */
		protected $txtAddress;

        /**
         * @var QTextBox txtPhone;
         * @access protected
         */
		protected $txtPhone;

        /**
         * @var QTextBox txtEmail;
         * @access protected
         */
		protected $txtEmail;

        /**
         * @var QTextBox txtComments;
         * @access protected
         */
		protected $txtComments;

        /**
         * @var QListBox lstGroupRole;
         * @access protected
         */
		protected $lstGroupRole;

        /**
         * @var QTextBox txtPreferredLocation1;
         * @access protected
         */
		protected $txtPreferredLocation1;

        /**
         * @var QTextBox txtPreferredLocation2;
         * @access protected
         */
		protected $txtPreferredLocation2;

        /**
         * @var QTextBox txtCity;
         * @access protected
         */
		protected $txtCity;

        /**
         * @var QTextBox txtZipcode;
         * @access protected
         */
		protected $txtZipcode;

        /**
         * @var QTextBox txtGroupDay;
         * @access protected
         */
		protected $txtGroupDay;

        /**
         * @var QCheckBox chkProcessedFlag;
         * @access protected
         */
		protected $chkProcessedFlag;

        /**
         * @var QTextBox txtGroupsPlaced;
         * @access protected
         */
		protected $txtGroupsPlaced;

        /**
         * @var QDateTimePicker calDateProcessed;
         * @access protected
         */
		protected $calDateProcessed;


		// Controls that allow the viewing of GroupRegistrations's individual data fields
        /**
         * @var QLabel lblSourceListId
         * @access protected
         */
		protected $lblSourceListId;

        /**
         * @var QLabel lblDateReceived
         * @access protected
         */
		protected $lblDateReceived;

        /**
         * @var QLabel lblFirstName
         * @access protected
         */
		protected $lblFirstName;

        /**
         * @var QLabel lblLastName
         * @access protected
         */
		protected $lblLastName;

        /**
         * @var QLabel lblGender
         * @access protected
         */
		protected $lblGender;

        /**
         * @var QLabel lblAddress
         * @access protected
         */
		protected $lblAddress;

        /**
         * @var QLabel lblPhone
         * @access protected
         */
		protected $lblPhone;

        /**
         * @var QLabel lblEmail
         * @access protected
         */
		protected $lblEmail;

        /**
         * @var QLabel lblComments
         * @access protected
         */
		protected $lblComments;

        /**
         * @var QLabel lblGroupRoleId
         * @access protected
         */
		protected $lblGroupRoleId;

        /**
         * @var QLabel lblPreferredLocation1
         * @access protected
         */
		protected $lblPreferredLocation1;

        /**
         * @var QLabel lblPreferredLocation2
         * @access protected
         */
		protected $lblPreferredLocation2;

        /**
         * @var QLabel lblCity
         * @access protected
         */
		protected $lblCity;

        /**
         * @var QLabel lblZipcode
         * @access protected
         */
		protected $lblZipcode;

        /**
         * @var QLabel lblGroupDay
         * @access protected
         */
		protected $lblGroupDay;

        /**
         * @var QLabel lblProcessedFlag
         * @access protected
         */
		protected $lblProcessedFlag;

        /**
         * @var QLabel lblGroupsPlaced
         * @access protected
         */
		protected $lblGroupsPlaced;

        /**
         * @var QLabel lblDateProcessed
         * @access protected
         */
		protected $lblDateProcessed;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstGrowthGroupStructuresAsGroupstructure;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblGrowthGroupStructuresAsGroupstructure;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * GroupRegistrationsMetaControl to edit a single GroupRegistrations object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single GroupRegistrations object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupRegistrationsMetaControl
		 * @param GroupRegistrations $objGroupRegistrations new or existing GroupRegistrations object
		 */
		 public function __construct($objParentObject, GroupRegistrations $objGroupRegistrations) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this GroupRegistrationsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked GroupRegistrations object
			$this->objGroupRegistrations = $objGroupRegistrations;

			// Figure out if we're Editing or Creating New
			if ($this->objGroupRegistrations->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupRegistrationsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing GroupRegistrations object creation - defaults to CreateOrEdit
 		 * @return GroupRegistrationsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objGroupRegistrations = GroupRegistrations::Load($intId);

				// GroupRegistrations was found -- return it!
				if ($objGroupRegistrations)
					return new GroupRegistrationsMetaControl($objParentObject, $objGroupRegistrations);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a GroupRegistrations object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new GroupRegistrationsMetaControl($objParentObject, new GroupRegistrations());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupRegistrationsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GroupRegistrations object creation - defaults to CreateOrEdit
		 * @return GroupRegistrationsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return GroupRegistrationsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupRegistrationsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GroupRegistrations object creation - defaults to CreateOrEdit
		 * @return GroupRegistrationsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return GroupRegistrationsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objGroupRegistrations->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstSourceList
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSourceList_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSourceList = new QListBox($this->objParentObject, $strControlId);
			$this->lstSourceList->Name = QApplication::Translate('Source List');
			$this->lstSourceList->Required = true;
			if (!$this->blnEditMode)
				$this->lstSourceList->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSourceListCursor = SourceList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSourceList = SourceList::InstantiateCursor($objSourceListCursor)) {
				$objListItem = new QListItem($objSourceList->__toString(), $objSourceList->Id);
				if (($this->objGroupRegistrations->SourceList) && ($this->objGroupRegistrations->SourceList->Id == $objSourceList->Id))
					$objListItem->Selected = true;
				$this->lstSourceList->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSourceList;
		}

		/**
		 * Create and setup QLabel lblSourceListId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSourceListId_Create($strControlId = null) {
			$this->lblSourceListId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSourceListId->Name = QApplication::Translate('Source List');
			$this->lblSourceListId->Text = ($this->objGroupRegistrations->SourceList) ? $this->objGroupRegistrations->SourceList->__toString() : null;
			$this->lblSourceListId->Required = true;
			return $this->lblSourceListId;
		}

		/**
		 * Create and setup QDateTimePicker calDateReceived
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateReceived_Create($strControlId = null) {
			$this->calDateReceived = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateReceived->Name = QApplication::Translate('Date Received');
			$this->calDateReceived->DateTime = $this->objGroupRegistrations->DateReceived;
			$this->calDateReceived->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateReceived;
		}

		/**
		 * Create and setup QLabel lblDateReceived
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateReceived_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateReceived = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateReceived->Name = QApplication::Translate('Date Received');
			$this->strDateReceivedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateReceived->Text = sprintf($this->objGroupRegistrations->DateReceived) ? $this->objGroupRegistrations->DateReceived->__toString($this->strDateReceivedDateTimeFormat) : null;
			return $this->lblDateReceived;
		}

		protected $strDateReceivedDateTimeFormat;

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objGroupRegistrations->FirstName;
			$this->txtFirstName->MaxLength = GroupRegistrations::FirstNameMaxLength;
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
			$this->lblFirstName->Text = $this->objGroupRegistrations->FirstName;
			return $this->lblFirstName;
		}

		/**
		 * Create and setup QTextBox txtLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLastName_Create($strControlId = null) {
			$this->txtLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objGroupRegistrations->LastName;
			$this->txtLastName->MaxLength = GroupRegistrations::LastNameMaxLength;
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
			$this->lblLastName->Text = $this->objGroupRegistrations->LastName;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QTextBox txtGender
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtGender_Create($strControlId = null) {
			$this->txtGender = new QTextBox($this->objParentObject, $strControlId);
			$this->txtGender->Name = QApplication::Translate('Gender');
			$this->txtGender->Text = $this->objGroupRegistrations->Gender;
			$this->txtGender->MaxLength = GroupRegistrations::GenderMaxLength;
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
			$this->lblGender->Text = $this->objGroupRegistrations->Gender;
			return $this->lblGender;
		}

		/**
		 * Create and setup QTextBox txtAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress_Create($strControlId = null) {
			$this->txtAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress->Name = QApplication::Translate('Address');
			$this->txtAddress->Text = $this->objGroupRegistrations->Address;
			$this->txtAddress->MaxLength = GroupRegistrations::AddressMaxLength;
			return $this->txtAddress;
		}

		/**
		 * Create and setup QLabel lblAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress_Create($strControlId = null) {
			$this->lblAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress->Name = QApplication::Translate('Address');
			$this->lblAddress->Text = $this->objGroupRegistrations->Address;
			return $this->lblAddress;
		}

		/**
		 * Create and setup QTextBox txtPhone
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPhone_Create($strControlId = null) {
			$this->txtPhone = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPhone->Name = QApplication::Translate('Phone');
			$this->txtPhone->Text = $this->objGroupRegistrations->Phone;
			$this->txtPhone->MaxLength = GroupRegistrations::PhoneMaxLength;
			return $this->txtPhone;
		}

		/**
		 * Create and setup QLabel lblPhone
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPhone_Create($strControlId = null) {
			$this->lblPhone = new QLabel($this->objParentObject, $strControlId);
			$this->lblPhone->Name = QApplication::Translate('Phone');
			$this->lblPhone->Text = $this->objGroupRegistrations->Phone;
			return $this->lblPhone;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objGroupRegistrations->Email;
			$this->txtEmail->MaxLength = GroupRegistrations::EmailMaxLength;
			return $this->txtEmail;
		}

		/**
		 * Create and setup QLabel lblEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmail_Create($strControlId = null) {
			$this->lblEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmail->Name = QApplication::Translate('Email');
			$this->lblEmail->Text = $this->objGroupRegistrations->Email;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QTextBox txtComments
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtComments_Create($strControlId = null) {
			$this->txtComments = new QTextBox($this->objParentObject, $strControlId);
			$this->txtComments->Name = QApplication::Translate('Comments');
			$this->txtComments->Text = $this->objGroupRegistrations->Comments;
			$this->txtComments->MaxLength = GroupRegistrations::CommentsMaxLength;
			return $this->txtComments;
		}

		/**
		 * Create and setup QLabel lblComments
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblComments_Create($strControlId = null) {
			$this->lblComments = new QLabel($this->objParentObject, $strControlId);
			$this->lblComments->Name = QApplication::Translate('Comments');
			$this->lblComments->Text = $this->objGroupRegistrations->Comments;
			return $this->lblComments;
		}

		/**
		 * Create and setup QListBox lstGroupRole
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGroupRole_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGroupRole = new QListBox($this->objParentObject, $strControlId);
			$this->lstGroupRole->Name = QApplication::Translate('Group Role');
			$this->lstGroupRole->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGroupRoleCursor = GroupRole::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGroupRole = GroupRole::InstantiateCursor($objGroupRoleCursor)) {
				$objListItem = new QListItem($objGroupRole->__toString(), $objGroupRole->Id);
				if (($this->objGroupRegistrations->GroupRole) && ($this->objGroupRegistrations->GroupRole->Id == $objGroupRole->Id))
					$objListItem->Selected = true;
				$this->lstGroupRole->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstGroupRole;
		}

		/**
		 * Create and setup QLabel lblGroupRoleId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupRoleId_Create($strControlId = null) {
			$this->lblGroupRoleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupRoleId->Name = QApplication::Translate('Group Role');
			$this->lblGroupRoleId->Text = ($this->objGroupRegistrations->GroupRole) ? $this->objGroupRegistrations->GroupRole->__toString() : null;
			return $this->lblGroupRoleId;
		}

		/**
		 * Create and setup QTextBox txtPreferredLocation1
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPreferredLocation1_Create($strControlId = null) {
			$this->txtPreferredLocation1 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPreferredLocation1->Name = QApplication::Translate('Preferred Location 1');
			$this->txtPreferredLocation1->Text = $this->objGroupRegistrations->PreferredLocation1;
			$this->txtPreferredLocation1->MaxLength = GroupRegistrations::PreferredLocation1MaxLength;
			return $this->txtPreferredLocation1;
		}

		/**
		 * Create and setup QLabel lblPreferredLocation1
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPreferredLocation1_Create($strControlId = null) {
			$this->lblPreferredLocation1 = new QLabel($this->objParentObject, $strControlId);
			$this->lblPreferredLocation1->Name = QApplication::Translate('Preferred Location 1');
			$this->lblPreferredLocation1->Text = $this->objGroupRegistrations->PreferredLocation1;
			return $this->lblPreferredLocation1;
		}

		/**
		 * Create and setup QTextBox txtPreferredLocation2
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPreferredLocation2_Create($strControlId = null) {
			$this->txtPreferredLocation2 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPreferredLocation2->Name = QApplication::Translate('Preferred Location 2');
			$this->txtPreferredLocation2->Text = $this->objGroupRegistrations->PreferredLocation2;
			$this->txtPreferredLocation2->MaxLength = GroupRegistrations::PreferredLocation2MaxLength;
			return $this->txtPreferredLocation2;
		}

		/**
		 * Create and setup QLabel lblPreferredLocation2
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPreferredLocation2_Create($strControlId = null) {
			$this->lblPreferredLocation2 = new QLabel($this->objParentObject, $strControlId);
			$this->lblPreferredLocation2->Name = QApplication::Translate('Preferred Location 2');
			$this->lblPreferredLocation2->Text = $this->objGroupRegistrations->PreferredLocation2;
			return $this->lblPreferredLocation2;
		}

		/**
		 * Create and setup QTextBox txtCity
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCity_Create($strControlId = null) {
			$this->txtCity = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCity->Name = QApplication::Translate('City');
			$this->txtCity->Text = $this->objGroupRegistrations->City;
			$this->txtCity->MaxLength = GroupRegistrations::CityMaxLength;
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
			$this->lblCity->Text = $this->objGroupRegistrations->City;
			return $this->lblCity;
		}

		/**
		 * Create and setup QTextBox txtZipcode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtZipcode_Create($strControlId = null) {
			$this->txtZipcode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtZipcode->Name = QApplication::Translate('Zipcode');
			$this->txtZipcode->Text = $this->objGroupRegistrations->Zipcode;
			$this->txtZipcode->MaxLength = GroupRegistrations::ZipcodeMaxLength;
			return $this->txtZipcode;
		}

		/**
		 * Create and setup QLabel lblZipcode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblZipcode_Create($strControlId = null) {
			$this->lblZipcode = new QLabel($this->objParentObject, $strControlId);
			$this->lblZipcode->Name = QApplication::Translate('Zipcode');
			$this->lblZipcode->Text = $this->objGroupRegistrations->Zipcode;
			return $this->lblZipcode;
		}

		/**
		 * Create and setup QTextBox txtGroupDay
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtGroupDay_Create($strControlId = null) {
			$this->txtGroupDay = new QTextBox($this->objParentObject, $strControlId);
			$this->txtGroupDay->Name = QApplication::Translate('Group Day');
			$this->txtGroupDay->Text = $this->objGroupRegistrations->GroupDay;
			$this->txtGroupDay->MaxLength = GroupRegistrations::GroupDayMaxLength;
			return $this->txtGroupDay;
		}

		/**
		 * Create and setup QLabel lblGroupDay
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupDay_Create($strControlId = null) {
			$this->lblGroupDay = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupDay->Name = QApplication::Translate('Group Day');
			$this->lblGroupDay->Text = $this->objGroupRegistrations->GroupDay;
			return $this->lblGroupDay;
		}

		/**
		 * Create and setup QCheckBox chkProcessedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkProcessedFlag_Create($strControlId = null) {
			$this->chkProcessedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkProcessedFlag->Name = QApplication::Translate('Processed Flag');
			$this->chkProcessedFlag->Checked = $this->objGroupRegistrations->ProcessedFlag;
			return $this->chkProcessedFlag;
		}

		/**
		 * Create and setup QLabel lblProcessedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblProcessedFlag_Create($strControlId = null) {
			$this->lblProcessedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblProcessedFlag->Name = QApplication::Translate('Processed Flag');
			$this->lblProcessedFlag->Text = ($this->objGroupRegistrations->ProcessedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblProcessedFlag;
		}

		/**
		 * Create and setup QTextBox txtGroupsPlaced
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtGroupsPlaced_Create($strControlId = null) {
			$this->txtGroupsPlaced = new QTextBox($this->objParentObject, $strControlId);
			$this->txtGroupsPlaced->Name = QApplication::Translate('Groups Placed');
			$this->txtGroupsPlaced->Text = $this->objGroupRegistrations->GroupsPlaced;
			$this->txtGroupsPlaced->TextMode = QTextMode::MultiLine;
			return $this->txtGroupsPlaced;
		}

		/**
		 * Create and setup QLabel lblGroupsPlaced
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupsPlaced_Create($strControlId = null) {
			$this->lblGroupsPlaced = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupsPlaced->Name = QApplication::Translate('Groups Placed');
			$this->lblGroupsPlaced->Text = $this->objGroupRegistrations->GroupsPlaced;
			return $this->lblGroupsPlaced;
		}

		/**
		 * Create and setup QDateTimePicker calDateProcessed
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateProcessed_Create($strControlId = null) {
			$this->calDateProcessed = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateProcessed->Name = QApplication::Translate('Date Processed');
			$this->calDateProcessed->DateTime = $this->objGroupRegistrations->DateProcessed;
			$this->calDateProcessed->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateProcessed;
		}

		/**
		 * Create and setup QLabel lblDateProcessed
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateProcessed_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateProcessed = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateProcessed->Name = QApplication::Translate('Date Processed');
			$this->strDateProcessedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateProcessed->Text = sprintf($this->objGroupRegistrations->DateProcessed) ? $this->objGroupRegistrations->DateProcessed->__toString($this->strDateProcessedDateTimeFormat) : null;
			return $this->lblDateProcessed;
		}

		protected $strDateProcessedDateTimeFormat;

		/**
		 * Create and setup QListBox lstGrowthGroupStructuresAsGroupstructure
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGrowthGroupStructuresAsGroupstructure_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGrowthGroupStructuresAsGroupstructure = new QListBox($this->objParentObject, $strControlId);
			$this->lstGrowthGroupStructuresAsGroupstructure->Name = QApplication::Translate('Growth Group Structures As Groupstructure');
			$this->lstGrowthGroupStructuresAsGroupstructure->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objGroupRegistrations->GetGrowthGroupStructureAsGroupstructureArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGrowthGroupStructureCursor = GrowthGroupStructure::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGrowthGroupStructure = GrowthGroupStructure::InstantiateCursor($objGrowthGroupStructureCursor)) {
				$objListItem = new QListItem($objGrowthGroupStructure->__toString(), $objGrowthGroupStructure->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objGrowthGroupStructure->Id)
						$objListItem->Selected = true;
				}
				$this->lstGrowthGroupStructuresAsGroupstructure->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstGrowthGroupStructuresAsGroupstructure;
		}

		/**
		 * Create and setup QLabel lblGrowthGroupStructuresAsGroupstructure
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblGrowthGroupStructuresAsGroupstructure_Create($strControlId = null, $strGlue = ', ') {
			$this->lblGrowthGroupStructuresAsGroupstructure = new QLabel($this->objParentObject, $strControlId);
			$this->lstGrowthGroupStructuresAsGroupstructure->Name = QApplication::Translate('Growth Group Structures As Groupstructure');
			
			$objAssociatedArray = $this->objGroupRegistrations->GetGrowthGroupStructureAsGroupstructureArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblGrowthGroupStructuresAsGroupstructure->Text = implode($strGlue, $strItems);
			return $this->lblGrowthGroupStructuresAsGroupstructure;
		}



		/**
		 * Refresh this MetaControl with Data from the local GroupRegistrations object.
		 * @param boolean $blnReload reload GroupRegistrations from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objGroupRegistrations->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objGroupRegistrations->Id;

			if ($this->lstSourceList) {
					$this->lstSourceList->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstSourceList->AddItem(QApplication::Translate('- Select One -'), null);
				$objSourceListArray = SourceList::LoadAll();
				if ($objSourceListArray) foreach ($objSourceListArray as $objSourceList) {
					$objListItem = new QListItem($objSourceList->__toString(), $objSourceList->Id);
					if (($this->objGroupRegistrations->SourceList) && ($this->objGroupRegistrations->SourceList->Id == $objSourceList->Id))
						$objListItem->Selected = true;
					$this->lstSourceList->AddItem($objListItem);
				}
			}
			if ($this->lblSourceListId) $this->lblSourceListId->Text = ($this->objGroupRegistrations->SourceList) ? $this->objGroupRegistrations->SourceList->__toString() : null;

			if ($this->calDateReceived) $this->calDateReceived->DateTime = $this->objGroupRegistrations->DateReceived;
			if ($this->lblDateReceived) $this->lblDateReceived->Text = sprintf($this->objGroupRegistrations->DateReceived) ? $this->objGroupRegistrations->__toString($this->strDateReceivedDateTimeFormat) : null;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objGroupRegistrations->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objGroupRegistrations->FirstName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objGroupRegistrations->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objGroupRegistrations->LastName;

			if ($this->txtGender) $this->txtGender->Text = $this->objGroupRegistrations->Gender;
			if ($this->lblGender) $this->lblGender->Text = $this->objGroupRegistrations->Gender;

			if ($this->txtAddress) $this->txtAddress->Text = $this->objGroupRegistrations->Address;
			if ($this->lblAddress) $this->lblAddress->Text = $this->objGroupRegistrations->Address;

			if ($this->txtPhone) $this->txtPhone->Text = $this->objGroupRegistrations->Phone;
			if ($this->lblPhone) $this->lblPhone->Text = $this->objGroupRegistrations->Phone;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objGroupRegistrations->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objGroupRegistrations->Email;

			if ($this->txtComments) $this->txtComments->Text = $this->objGroupRegistrations->Comments;
			if ($this->lblComments) $this->lblComments->Text = $this->objGroupRegistrations->Comments;

			if ($this->lstGroupRole) {
					$this->lstGroupRole->RemoveAllItems();
				$this->lstGroupRole->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupRoleArray = GroupRole::LoadAll();
				if ($objGroupRoleArray) foreach ($objGroupRoleArray as $objGroupRole) {
					$objListItem = new QListItem($objGroupRole->__toString(), $objGroupRole->Id);
					if (($this->objGroupRegistrations->GroupRole) && ($this->objGroupRegistrations->GroupRole->Id == $objGroupRole->Id))
						$objListItem->Selected = true;
					$this->lstGroupRole->AddItem($objListItem);
				}
			}
			if ($this->lblGroupRoleId) $this->lblGroupRoleId->Text = ($this->objGroupRegistrations->GroupRole) ? $this->objGroupRegistrations->GroupRole->__toString() : null;

			if ($this->txtPreferredLocation1) $this->txtPreferredLocation1->Text = $this->objGroupRegistrations->PreferredLocation1;
			if ($this->lblPreferredLocation1) $this->lblPreferredLocation1->Text = $this->objGroupRegistrations->PreferredLocation1;

			if ($this->txtPreferredLocation2) $this->txtPreferredLocation2->Text = $this->objGroupRegistrations->PreferredLocation2;
			if ($this->lblPreferredLocation2) $this->lblPreferredLocation2->Text = $this->objGroupRegistrations->PreferredLocation2;

			if ($this->txtCity) $this->txtCity->Text = $this->objGroupRegistrations->City;
			if ($this->lblCity) $this->lblCity->Text = $this->objGroupRegistrations->City;

			if ($this->txtZipcode) $this->txtZipcode->Text = $this->objGroupRegistrations->Zipcode;
			if ($this->lblZipcode) $this->lblZipcode->Text = $this->objGroupRegistrations->Zipcode;

			if ($this->txtGroupDay) $this->txtGroupDay->Text = $this->objGroupRegistrations->GroupDay;
			if ($this->lblGroupDay) $this->lblGroupDay->Text = $this->objGroupRegistrations->GroupDay;

			if ($this->chkProcessedFlag) $this->chkProcessedFlag->Checked = $this->objGroupRegistrations->ProcessedFlag;
			if ($this->lblProcessedFlag) $this->lblProcessedFlag->Text = ($this->objGroupRegistrations->ProcessedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtGroupsPlaced) $this->txtGroupsPlaced->Text = $this->objGroupRegistrations->GroupsPlaced;
			if ($this->lblGroupsPlaced) $this->lblGroupsPlaced->Text = $this->objGroupRegistrations->GroupsPlaced;

			if ($this->calDateProcessed) $this->calDateProcessed->DateTime = $this->objGroupRegistrations->DateProcessed;
			if ($this->lblDateProcessed) $this->lblDateProcessed->Text = sprintf($this->objGroupRegistrations->DateProcessed) ? $this->objGroupRegistrations->__toString($this->strDateProcessedDateTimeFormat) : null;

			if ($this->lstGrowthGroupStructuresAsGroupstructure) {
				$this->lstGrowthGroupStructuresAsGroupstructure->RemoveAllItems();
				$objAssociatedArray = $this->objGroupRegistrations->GetGrowthGroupStructureAsGroupstructureArray();
				$objGrowthGroupStructureArray = GrowthGroupStructure::LoadAll();
				if ($objGrowthGroupStructureArray) foreach ($objGrowthGroupStructureArray as $objGrowthGroupStructure) {
					$objListItem = new QListItem($objGrowthGroupStructure->__toString(), $objGrowthGroupStructure->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objGrowthGroupStructure->Id)
							$objListItem->Selected = true;
					}
					$this->lstGrowthGroupStructuresAsGroupstructure->AddItem($objListItem);
				}
			}
			if ($this->lblGrowthGroupStructuresAsGroupstructure) {
				$objAssociatedArray = $this->objGroupRegistrations->GetGrowthGroupStructureAsGroupstructureArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblGrowthGroupStructuresAsGroupstructure->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstGrowthGroupStructuresAsGroupstructure_Update() {
			if ($this->lstGrowthGroupStructuresAsGroupstructure) {
				$this->objGroupRegistrations->UnassociateAllGrowthGroupStructuresAsGroupstructure();
				$objSelectedListItems = $this->lstGrowthGroupStructuresAsGroupstructure->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objGroupRegistrations->AssociateGrowthGroupStructureAsGroupstructure(GrowthGroupStructure::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC GROUPREGISTRATIONS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's GroupRegistrations instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveGroupRegistrations() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstSourceList) $this->objGroupRegistrations->SourceListId = $this->lstSourceList->SelectedValue;
				if ($this->calDateReceived) $this->objGroupRegistrations->DateReceived = $this->calDateReceived->DateTime;
				if ($this->txtFirstName) $this->objGroupRegistrations->FirstName = $this->txtFirstName->Text;
				if ($this->txtLastName) $this->objGroupRegistrations->LastName = $this->txtLastName->Text;
				if ($this->txtGender) $this->objGroupRegistrations->Gender = $this->txtGender->Text;
				if ($this->txtAddress) $this->objGroupRegistrations->Address = $this->txtAddress->Text;
				if ($this->txtPhone) $this->objGroupRegistrations->Phone = $this->txtPhone->Text;
				if ($this->txtEmail) $this->objGroupRegistrations->Email = $this->txtEmail->Text;
				if ($this->txtComments) $this->objGroupRegistrations->Comments = $this->txtComments->Text;
				if ($this->lstGroupRole) $this->objGroupRegistrations->GroupRoleId = $this->lstGroupRole->SelectedValue;
				if ($this->txtPreferredLocation1) $this->objGroupRegistrations->PreferredLocation1 = $this->txtPreferredLocation1->Text;
				if ($this->txtPreferredLocation2) $this->objGroupRegistrations->PreferredLocation2 = $this->txtPreferredLocation2->Text;
				if ($this->txtCity) $this->objGroupRegistrations->City = $this->txtCity->Text;
				if ($this->txtZipcode) $this->objGroupRegistrations->Zipcode = $this->txtZipcode->Text;
				if ($this->txtGroupDay) $this->objGroupRegistrations->GroupDay = $this->txtGroupDay->Text;
				if ($this->chkProcessedFlag) $this->objGroupRegistrations->ProcessedFlag = $this->chkProcessedFlag->Checked;
				if ($this->txtGroupsPlaced) $this->objGroupRegistrations->GroupsPlaced = $this->txtGroupsPlaced->Text;
				if ($this->calDateProcessed) $this->objGroupRegistrations->DateProcessed = $this->calDateProcessed->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the GroupRegistrations object
				$this->objGroupRegistrations->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstGrowthGroupStructuresAsGroupstructure_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's GroupRegistrations instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteGroupRegistrations() {
			$this->objGroupRegistrations->UnassociateAllGrowthGroupStructuresAsGroupstructure();
			$this->objGroupRegistrations->Delete();
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
				case 'GroupRegistrations': return $this->objGroupRegistrations;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to GroupRegistrations fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'SourceListIdControl':
					if (!$this->lstSourceList) return $this->lstSourceList_Create();
					return $this->lstSourceList;
				case 'SourceListIdLabel':
					if (!$this->lblSourceListId) return $this->lblSourceListId_Create();
					return $this->lblSourceListId;
				case 'DateReceivedControl':
					if (!$this->calDateReceived) return $this->calDateReceived_Create();
					return $this->calDateReceived;
				case 'DateReceivedLabel':
					if (!$this->lblDateReceived) return $this->lblDateReceived_Create();
					return $this->lblDateReceived;
				case 'FirstNameControl':
					if (!$this->txtFirstName) return $this->txtFirstName_Create();
					return $this->txtFirstName;
				case 'FirstNameLabel':
					if (!$this->lblFirstName) return $this->lblFirstName_Create();
					return $this->lblFirstName;
				case 'LastNameControl':
					if (!$this->txtLastName) return $this->txtLastName_Create();
					return $this->txtLastName;
				case 'LastNameLabel':
					if (!$this->lblLastName) return $this->lblLastName_Create();
					return $this->lblLastName;
				case 'GenderControl':
					if (!$this->txtGender) return $this->txtGender_Create();
					return $this->txtGender;
				case 'GenderLabel':
					if (!$this->lblGender) return $this->lblGender_Create();
					return $this->lblGender;
				case 'AddressControl':
					if (!$this->txtAddress) return $this->txtAddress_Create();
					return $this->txtAddress;
				case 'AddressLabel':
					if (!$this->lblAddress) return $this->lblAddress_Create();
					return $this->lblAddress;
				case 'PhoneControl':
					if (!$this->txtPhone) return $this->txtPhone_Create();
					return $this->txtPhone;
				case 'PhoneLabel':
					if (!$this->lblPhone) return $this->lblPhone_Create();
					return $this->lblPhone;
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'CommentsControl':
					if (!$this->txtComments) return $this->txtComments_Create();
					return $this->txtComments;
				case 'CommentsLabel':
					if (!$this->lblComments) return $this->lblComments_Create();
					return $this->lblComments;
				case 'GroupRoleIdControl':
					if (!$this->lstGroupRole) return $this->lstGroupRole_Create();
					return $this->lstGroupRole;
				case 'GroupRoleIdLabel':
					if (!$this->lblGroupRoleId) return $this->lblGroupRoleId_Create();
					return $this->lblGroupRoleId;
				case 'PreferredLocation1Control':
					if (!$this->txtPreferredLocation1) return $this->txtPreferredLocation1_Create();
					return $this->txtPreferredLocation1;
				case 'PreferredLocation1Label':
					if (!$this->lblPreferredLocation1) return $this->lblPreferredLocation1_Create();
					return $this->lblPreferredLocation1;
				case 'PreferredLocation2Control':
					if (!$this->txtPreferredLocation2) return $this->txtPreferredLocation2_Create();
					return $this->txtPreferredLocation2;
				case 'PreferredLocation2Label':
					if (!$this->lblPreferredLocation2) return $this->lblPreferredLocation2_Create();
					return $this->lblPreferredLocation2;
				case 'CityControl':
					if (!$this->txtCity) return $this->txtCity_Create();
					return $this->txtCity;
				case 'CityLabel':
					if (!$this->lblCity) return $this->lblCity_Create();
					return $this->lblCity;
				case 'ZipcodeControl':
					if (!$this->txtZipcode) return $this->txtZipcode_Create();
					return $this->txtZipcode;
				case 'ZipcodeLabel':
					if (!$this->lblZipcode) return $this->lblZipcode_Create();
					return $this->lblZipcode;
				case 'GroupDayControl':
					if (!$this->txtGroupDay) return $this->txtGroupDay_Create();
					return $this->txtGroupDay;
				case 'GroupDayLabel':
					if (!$this->lblGroupDay) return $this->lblGroupDay_Create();
					return $this->lblGroupDay;
				case 'ProcessedFlagControl':
					if (!$this->chkProcessedFlag) return $this->chkProcessedFlag_Create();
					return $this->chkProcessedFlag;
				case 'ProcessedFlagLabel':
					if (!$this->lblProcessedFlag) return $this->lblProcessedFlag_Create();
					return $this->lblProcessedFlag;
				case 'GroupsPlacedControl':
					if (!$this->txtGroupsPlaced) return $this->txtGroupsPlaced_Create();
					return $this->txtGroupsPlaced;
				case 'GroupsPlacedLabel':
					if (!$this->lblGroupsPlaced) return $this->lblGroupsPlaced_Create();
					return $this->lblGroupsPlaced;
				case 'DateProcessedControl':
					if (!$this->calDateProcessed) return $this->calDateProcessed_Create();
					return $this->calDateProcessed;
				case 'DateProcessedLabel':
					if (!$this->lblDateProcessed) return $this->lblDateProcessed_Create();
					return $this->lblDateProcessed;
				case 'GrowthGroupStructureAsGroupstructureControl':
					if (!$this->lstGrowthGroupStructuresAsGroupstructure) return $this->lstGrowthGroupStructuresAsGroupstructure_Create();
					return $this->lstGrowthGroupStructuresAsGroupstructure;
				case 'GrowthGroupStructureAsGroupstructureLabel':
					if (!$this->lblGrowthGroupStructuresAsGroupstructure) return $this->lblGrowthGroupStructuresAsGroupstructure_Create();
					return $this->lblGrowthGroupStructuresAsGroupstructure;
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
					// Controls that point to GroupRegistrations fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'SourceListIdControl':
						return ($this->lstSourceList = QType::Cast($mixValue, 'QControl'));
					case 'DateReceivedControl':
						return ($this->calDateReceived = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'GenderControl':
						return ($this->txtGender = QType::Cast($mixValue, 'QControl'));
					case 'AddressControl':
						return ($this->txtAddress = QType::Cast($mixValue, 'QControl'));
					case 'PhoneControl':
						return ($this->txtPhone = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'CommentsControl':
						return ($this->txtComments = QType::Cast($mixValue, 'QControl'));
					case 'GroupRoleIdControl':
						return ($this->lstGroupRole = QType::Cast($mixValue, 'QControl'));
					case 'PreferredLocation1Control':
						return ($this->txtPreferredLocation1 = QType::Cast($mixValue, 'QControl'));
					case 'PreferredLocation2Control':
						return ($this->txtPreferredLocation2 = QType::Cast($mixValue, 'QControl'));
					case 'CityControl':
						return ($this->txtCity = QType::Cast($mixValue, 'QControl'));
					case 'ZipcodeControl':
						return ($this->txtZipcode = QType::Cast($mixValue, 'QControl'));
					case 'GroupDayControl':
						return ($this->txtGroupDay = QType::Cast($mixValue, 'QControl'));
					case 'ProcessedFlagControl':
						return ($this->chkProcessedFlag = QType::Cast($mixValue, 'QControl'));
					case 'GroupsPlacedControl':
						return ($this->txtGroupsPlaced = QType::Cast($mixValue, 'QControl'));
					case 'DateProcessedControl':
						return ($this->calDateProcessed = QType::Cast($mixValue, 'QControl'));
					case 'GrowthGroupStructureAsGroupstructureControl':
						return ($this->lstGrowthGroupStructuresAsGroupstructure = QType::Cast($mixValue, 'QControl'));
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