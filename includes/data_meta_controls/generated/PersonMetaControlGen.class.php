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
	 * property QTextBox $MiddleNaeControl
	 * property-read QLabel $MiddleNaeLabel
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
	 * property QCheckBox $MaleFlagControl
	 * property-read QLabel $MaleFlagLabel
	 * property QDateTimePicker $DateOfBirthControl
	 * property-read QLabel $DateOfBirthLabel
	 * property QIntegerTextBox $DobApproximateFlagControl
	 * property-read QLabel $DobApproximateFlagLabel
	 * property QCheckBox $DeceasedFlagControl
	 * property-read QLabel $DeceasedFlagLabel
	 * property QDateTimePicker $DateDeceasedControl
	 * property-read QLabel $DateDeceasedLabel
	 * property QListBox $CurrentMugShotIdControl
	 * property-read QLabel $CurrentMugShotIdLabel
	 * property QListBox $MailingAddressIdControl
	 * property-read QLabel $MailingAddressIdLabel
	 * property QListBox $StewardshipAddressIdControl
	 * property-read QLabel $StewardshipAddressIdLabel
	 * property QCheckBox $CanMailFlagControl
	 * property-read QLabel $CanMailFlagLabel
	 * property QCheckBox $CanEmailFlagControl
	 * property-read QLabel $CanEmailFlagLabel
	 * property QCheckBox $CanPhoneFlagControl
	 * property-read QLabel $CanPhoneFlagLabel
	 * property QListBox $HouseholdAsHeadControl
	 * property-read QLabel $HouseholdAsHeadLabel
	 * property QListBox $CommunicationListControl
	 * property-read QLabel $CommunicationListLabel
	 * property QListBox $NameItemControl
	 * property-read QLabel $NameItemLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PersonMetaControlGen extends QBaseClass {
		// General Variables
		protected $objPerson;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Person's individual data fields
		protected $lblId;
		protected $lstMembershipStatusType;
		protected $lstMaritalStatusType;
		protected $txtFirstName;
		protected $txtMiddleNae;
		protected $txtLastName;
		protected $txtMailingLabel;
		protected $txtPriorLastNames;
		protected $txtNickname;
		protected $txtTitle;
		protected $txtSuffix;
		protected $chkMaleFlag;
		protected $calDateOfBirth;
		protected $txtDobApproximateFlag;
		protected $chkDeceasedFlag;
		protected $calDateDeceased;
		protected $lstCurrentMugShot;
		protected $lstMailingAddress;
		protected $lstStewardshipAddress;
		protected $chkCanMailFlag;
		protected $chkCanEmailFlag;
		protected $chkCanPhoneFlag;

		// Controls that allow the viewing of Person's individual data fields
		protected $lblMembershipStatusTypeId;
		protected $lblMaritalStatusTypeId;
		protected $lblFirstName;
		protected $lblMiddleNae;
		protected $lblLastName;
		protected $lblMailingLabel;
		protected $lblPriorLastNames;
		protected $lblNickname;
		protected $lblTitle;
		protected $lblSuffix;
		protected $lblMaleFlag;
		protected $lblDateOfBirth;
		protected $lblDobApproximateFlag;
		protected $lblDeceasedFlag;
		protected $lblDateDeceased;
		protected $lblCurrentMugShotId;
		protected $lblMailingAddressId;
		protected $lblStewardshipAddressId;
		protected $lblCanMailFlag;
		protected $lblCanEmailFlag;
		protected $lblCanPhoneFlag;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstHouseholdAsHead;
		protected $lstCommunicationLists;
		protected $lstNameItems;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblHouseholdAsHead;
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
			$this->lstMaritalStatusType->AddItem(QApplication::Translate('- Select One -'), null);
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
		 * Create and setup QTextBox txtMiddleNae
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMiddleNae_Create($strControlId = null) {
			$this->txtMiddleNae = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMiddleNae->Name = QApplication::Translate('Middle Nae');
			$this->txtMiddleNae->Text = $this->objPerson->MiddleNae;
			$this->txtMiddleNae->MaxLength = Person::MiddleNaeMaxLength;
			return $this->txtMiddleNae;
		}

		/**
		 * Create and setup QLabel lblMiddleNae
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMiddleNae_Create($strControlId = null) {
			$this->lblMiddleNae = new QLabel($this->objParentObject, $strControlId);
			$this->lblMiddleNae->Name = QApplication::Translate('Middle Nae');
			$this->lblMiddleNae->Text = $this->objPerson->MiddleNae;
			return $this->lblMiddleNae;
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
		 * Create and setup QCheckBox chkMaleFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkMaleFlag_Create($strControlId = null) {
			$this->chkMaleFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkMaleFlag->Name = QApplication::Translate('Male Flag');
			$this->chkMaleFlag->Checked = $this->objPerson->MaleFlag;
			return $this->chkMaleFlag;
		}

		/**
		 * Create and setup QLabel lblMaleFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMaleFlag_Create($strControlId = null) {
			$this->lblMaleFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblMaleFlag->Name = QApplication::Translate('Male Flag');
			$this->lblMaleFlag->Text = ($this->objPerson->MaleFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblMaleFlag;
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
		 * Create and setup QIntegerTextBox txtDobApproximateFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtDobApproximateFlag_Create($strControlId = null) {
			$this->txtDobApproximateFlag = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtDobApproximateFlag->Name = QApplication::Translate('Dob Approximate Flag');
			$this->txtDobApproximateFlag->Text = $this->objPerson->DobApproximateFlag;
			return $this->txtDobApproximateFlag;
		}

		/**
		 * Create and setup QLabel lblDobApproximateFlag
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblDobApproximateFlag_Create($strControlId = null, $strFormat = null) {
			$this->lblDobApproximateFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblDobApproximateFlag->Name = QApplication::Translate('Dob Approximate Flag');
			$this->lblDobApproximateFlag->Text = $this->objPerson->DobApproximateFlag;
			$this->lblDobApproximateFlag->Format = $strFormat;
			return $this->lblDobApproximateFlag;
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
		 * Create and setup QListBox lstCurrentMugShot
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCurrentMugShot_Create($strControlId = null) {
			$this->lstCurrentMugShot = new QListBox($this->objParentObject, $strControlId);
			$this->lstCurrentMugShot->Name = QApplication::Translate('Current Mug Shot');
			$this->lstCurrentMugShot->AddItem(QApplication::Translate('- Select One -'), null);
			$objCurrentMugShotArray = MugShot::LoadAll();
			if ($objCurrentMugShotArray) foreach ($objCurrentMugShotArray as $objCurrentMugShot) {
				$objListItem = new QListItem($objCurrentMugShot->__toString(), $objCurrentMugShot->Id);
				if (($this->objPerson->CurrentMugShot) && ($this->objPerson->CurrentMugShot->Id == $objCurrentMugShot->Id))
					$objListItem->Selected = true;
				$this->lstCurrentMugShot->AddItem($objListItem);
			}
			return $this->lstCurrentMugShot;
		}

		/**
		 * Create and setup QLabel lblCurrentMugShotId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCurrentMugShotId_Create($strControlId = null) {
			$this->lblCurrentMugShotId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCurrentMugShotId->Name = QApplication::Translate('Current Mug Shot');
			$this->lblCurrentMugShotId->Text = ($this->objPerson->CurrentMugShot) ? $this->objPerson->CurrentMugShot->__toString() : null;
			return $this->lblCurrentMugShotId;
		}

		/**
		 * Create and setup QListBox lstMailingAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstMailingAddress_Create($strControlId = null) {
			$this->lstMailingAddress = new QListBox($this->objParentObject, $strControlId);
			$this->lstMailingAddress->Name = QApplication::Translate('Mailing Address');
			$this->lstMailingAddress->AddItem(QApplication::Translate('- Select One -'), null);
			$objMailingAddressArray = Address::LoadAll();
			if ($objMailingAddressArray) foreach ($objMailingAddressArray as $objMailingAddress) {
				$objListItem = new QListItem($objMailingAddress->__toString(), $objMailingAddress->Id);
				if (($this->objPerson->MailingAddress) && ($this->objPerson->MailingAddress->Id == $objMailingAddress->Id))
					$objListItem->Selected = true;
				$this->lstMailingAddress->AddItem($objListItem);
			}
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
		 * @return QListBox
		 */
		public function lstStewardshipAddress_Create($strControlId = null) {
			$this->lstStewardshipAddress = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipAddress->Name = QApplication::Translate('Stewardship Address');
			$this->lstStewardshipAddress->AddItem(QApplication::Translate('- Select One -'), null);
			$objStewardshipAddressArray = Address::LoadAll();
			if ($objStewardshipAddressArray) foreach ($objStewardshipAddressArray as $objStewardshipAddress) {
				$objListItem = new QListItem($objStewardshipAddress->__toString(), $objStewardshipAddress->Id);
				if (($this->objPerson->StewardshipAddress) && ($this->objPerson->StewardshipAddress->Id == $objStewardshipAddress->Id))
					$objListItem->Selected = true;
				$this->lstStewardshipAddress->AddItem($objListItem);
			}
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
		 * Create and setup QListBox lstHouseholdAsHead
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstHouseholdAsHead_Create($strControlId = null) {
			$this->lstHouseholdAsHead = new QListBox($this->objParentObject, $strControlId);
			$this->lstHouseholdAsHead->Name = QApplication::Translate('Household As Head');
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
		 * Create and setup QListBox lstCommunicationLists
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCommunicationLists_Create($strControlId = null) {
			$this->lstCommunicationLists = new QListBox($this->objParentObject, $strControlId);
			$this->lstCommunicationLists->Name = QApplication::Translate('Communication Lists');
			$this->lstCommunicationLists->SelectionMode = QSelectionMode::Multiple;
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
		 * @return QListBox
		 */
		public function lstNameItems_Create($strControlId = null) {
			$this->lstNameItems = new QListBox($this->objParentObject, $strControlId);
			$this->lstNameItems->Name = QApplication::Translate('Name Items');
			$this->lstNameItems->SelectionMode = QSelectionMode::Multiple;
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

			if ($this->txtMiddleNae) $this->txtMiddleNae->Text = $this->objPerson->MiddleNae;
			if ($this->lblMiddleNae) $this->lblMiddleNae->Text = $this->objPerson->MiddleNae;

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

			if ($this->chkMaleFlag) $this->chkMaleFlag->Checked = $this->objPerson->MaleFlag;
			if ($this->lblMaleFlag) $this->lblMaleFlag->Text = ($this->objPerson->MaleFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->calDateOfBirth) $this->calDateOfBirth->DateTime = $this->objPerson->DateOfBirth;
			if ($this->lblDateOfBirth) $this->lblDateOfBirth->Text = sprintf($this->objPerson->DateOfBirth) ? $this->objPerson->__toString($this->strDateOfBirthDateTimeFormat) : null;

			if ($this->txtDobApproximateFlag) $this->txtDobApproximateFlag->Text = $this->objPerson->DobApproximateFlag;
			if ($this->lblDobApproximateFlag) $this->lblDobApproximateFlag->Text = $this->objPerson->DobApproximateFlag;

			if ($this->chkDeceasedFlag) $this->chkDeceasedFlag->Checked = $this->objPerson->DeceasedFlag;
			if ($this->lblDeceasedFlag) $this->lblDeceasedFlag->Text = ($this->objPerson->DeceasedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->calDateDeceased) $this->calDateDeceased->DateTime = $this->objPerson->DateDeceased;
			if ($this->lblDateDeceased) $this->lblDateDeceased->Text = sprintf($this->objPerson->DateDeceased) ? $this->objPerson->__toString($this->strDateDeceasedDateTimeFormat) : null;

			if ($this->lstCurrentMugShot) {
					$this->lstCurrentMugShot->RemoveAllItems();
				$this->lstCurrentMugShot->AddItem(QApplication::Translate('- Select One -'), null);
				$objCurrentMugShotArray = MugShot::LoadAll();
				if ($objCurrentMugShotArray) foreach ($objCurrentMugShotArray as $objCurrentMugShot) {
					$objListItem = new QListItem($objCurrentMugShot->__toString(), $objCurrentMugShot->Id);
					if (($this->objPerson->CurrentMugShot) && ($this->objPerson->CurrentMugShot->Id == $objCurrentMugShot->Id))
						$objListItem->Selected = true;
					$this->lstCurrentMugShot->AddItem($objListItem);
				}
			}
			if ($this->lblCurrentMugShotId) $this->lblCurrentMugShotId->Text = ($this->objPerson->CurrentMugShot) ? $this->objPerson->CurrentMugShot->__toString() : null;

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

			if ($this->chkCanMailFlag) $this->chkCanMailFlag->Checked = $this->objPerson->CanMailFlag;
			if ($this->lblCanMailFlag) $this->lblCanMailFlag->Text = ($this->objPerson->CanMailFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkCanEmailFlag) $this->chkCanEmailFlag->Checked = $this->objPerson->CanEmailFlag;
			if ($this->lblCanEmailFlag) $this->lblCanEmailFlag->Text = ($this->objPerson->CanEmailFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkCanPhoneFlag) $this->chkCanPhoneFlag->Checked = $this->objPerson->CanPhoneFlag;
			if ($this->lblCanPhoneFlag) $this->lblCanPhoneFlag->Text = ($this->objPerson->CanPhoneFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

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
				if ($this->txtMiddleNae) $this->objPerson->MiddleNae = $this->txtMiddleNae->Text;
				if ($this->txtLastName) $this->objPerson->LastName = $this->txtLastName->Text;
				if ($this->txtMailingLabel) $this->objPerson->MailingLabel = $this->txtMailingLabel->Text;
				if ($this->txtPriorLastNames) $this->objPerson->PriorLastNames = $this->txtPriorLastNames->Text;
				if ($this->txtNickname) $this->objPerson->Nickname = $this->txtNickname->Text;
				if ($this->txtTitle) $this->objPerson->Title = $this->txtTitle->Text;
				if ($this->txtSuffix) $this->objPerson->Suffix = $this->txtSuffix->Text;
				if ($this->chkMaleFlag) $this->objPerson->MaleFlag = $this->chkMaleFlag->Checked;
				if ($this->calDateOfBirth) $this->objPerson->DateOfBirth = $this->calDateOfBirth->DateTime;
				if ($this->txtDobApproximateFlag) $this->objPerson->DobApproximateFlag = $this->txtDobApproximateFlag->Text;
				if ($this->chkDeceasedFlag) $this->objPerson->DeceasedFlag = $this->chkDeceasedFlag->Checked;
				if ($this->calDateDeceased) $this->objPerson->DateDeceased = $this->calDateDeceased->DateTime;
				if ($this->lstCurrentMugShot) $this->objPerson->CurrentMugShotId = $this->lstCurrentMugShot->SelectedValue;
				if ($this->lstMailingAddress) $this->objPerson->MailingAddressId = $this->lstMailingAddress->SelectedValue;
				if ($this->lstStewardshipAddress) $this->objPerson->StewardshipAddressId = $this->lstStewardshipAddress->SelectedValue;
				if ($this->chkCanMailFlag) $this->objPerson->CanMailFlag = $this->chkCanMailFlag->Checked;
				if ($this->chkCanEmailFlag) $this->objPerson->CanEmailFlag = $this->chkCanEmailFlag->Checked;
				if ($this->chkCanPhoneFlag) $this->objPerson->CanPhoneFlag = $this->chkCanPhoneFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstHouseholdAsHead) $this->objPerson->HouseholdAsHead = Household::Load($this->lstHouseholdAsHead->SelectedValue);

				// Save the Person object
				$this->objPerson->Save();

				// Finally, update any ManyToManyReferences (if any)
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
				case 'MiddleNaeControl':
					if (!$this->txtMiddleNae) return $this->txtMiddleNae_Create();
					return $this->txtMiddleNae;
				case 'MiddleNaeLabel':
					if (!$this->lblMiddleNae) return $this->lblMiddleNae_Create();
					return $this->lblMiddleNae;
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
				case 'MaleFlagControl':
					if (!$this->chkMaleFlag) return $this->chkMaleFlag_Create();
					return $this->chkMaleFlag;
				case 'MaleFlagLabel':
					if (!$this->lblMaleFlag) return $this->lblMaleFlag_Create();
					return $this->lblMaleFlag;
				case 'DateOfBirthControl':
					if (!$this->calDateOfBirth) return $this->calDateOfBirth_Create();
					return $this->calDateOfBirth;
				case 'DateOfBirthLabel':
					if (!$this->lblDateOfBirth) return $this->lblDateOfBirth_Create();
					return $this->lblDateOfBirth;
				case 'DobApproximateFlagControl':
					if (!$this->txtDobApproximateFlag) return $this->txtDobApproximateFlag_Create();
					return $this->txtDobApproximateFlag;
				case 'DobApproximateFlagLabel':
					if (!$this->lblDobApproximateFlag) return $this->lblDobApproximateFlag_Create();
					return $this->lblDobApproximateFlag;
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
				case 'CurrentMugShotIdControl':
					if (!$this->lstCurrentMugShot) return $this->lstCurrentMugShot_Create();
					return $this->lstCurrentMugShot;
				case 'CurrentMugShotIdLabel':
					if (!$this->lblCurrentMugShotId) return $this->lblCurrentMugShotId_Create();
					return $this->lblCurrentMugShotId;
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
				case 'CanMailFlagControl':
					if (!$this->chkCanMailFlag) return $this->chkCanMailFlag_Create();
					return $this->chkCanMailFlag;
				case 'CanMailFlagLabel':
					if (!$this->lblCanMailFlag) return $this->lblCanMailFlag_Create();
					return $this->lblCanMailFlag;
				case 'CanEmailFlagControl':
					if (!$this->chkCanEmailFlag) return $this->chkCanEmailFlag_Create();
					return $this->chkCanEmailFlag;
				case 'CanEmailFlagLabel':
					if (!$this->lblCanEmailFlag) return $this->lblCanEmailFlag_Create();
					return $this->lblCanEmailFlag;
				case 'CanPhoneFlagControl':
					if (!$this->chkCanPhoneFlag) return $this->chkCanPhoneFlag_Create();
					return $this->chkCanPhoneFlag;
				case 'CanPhoneFlagLabel':
					if (!$this->lblCanPhoneFlag) return $this->lblCanPhoneFlag_Create();
					return $this->lblCanPhoneFlag;
				case 'HouseholdAsHeadControl':
					if (!$this->lstHouseholdAsHead) return $this->lstHouseholdAsHead_Create();
					return $this->lstHouseholdAsHead;
				case 'HouseholdAsHeadLabel':
					if (!$this->lblHouseholdAsHead) return $this->lblHouseholdAsHead_Create();
					return $this->lblHouseholdAsHead;
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
					case 'MiddleNaeControl':
						return ($this->txtMiddleNae = QType::Cast($mixValue, 'QControl'));
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
					case 'MaleFlagControl':
						return ($this->chkMaleFlag = QType::Cast($mixValue, 'QControl'));
					case 'DateOfBirthControl':
						return ($this->calDateOfBirth = QType::Cast($mixValue, 'QControl'));
					case 'DobApproximateFlagControl':
						return ($this->txtDobApproximateFlag = QType::Cast($mixValue, 'QControl'));
					case 'DeceasedFlagControl':
						return ($this->chkDeceasedFlag = QType::Cast($mixValue, 'QControl'));
					case 'DateDeceasedControl':
						return ($this->calDateDeceased = QType::Cast($mixValue, 'QControl'));
					case 'CurrentMugShotIdControl':
						return ($this->lstCurrentMugShot = QType::Cast($mixValue, 'QControl'));
					case 'MailingAddressIdControl':
						return ($this->lstMailingAddress = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipAddressIdControl':
						return ($this->lstStewardshipAddress = QType::Cast($mixValue, 'QControl'));
					case 'CanMailFlagControl':
						return ($this->chkCanMailFlag = QType::Cast($mixValue, 'QControl'));
					case 'CanEmailFlagControl':
						return ($this->chkCanEmailFlag = QType::Cast($mixValue, 'QControl'));
					case 'CanPhoneFlagControl':
						return ($this->chkCanPhoneFlag = QType::Cast($mixValue, 'QControl'));
					case 'HouseholdAsHeadControl':
						return ($this->lstHouseholdAsHead = QType::Cast($mixValue, 'QControl'));
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