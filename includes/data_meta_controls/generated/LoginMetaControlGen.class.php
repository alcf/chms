<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Login class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Login object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LoginMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Login $Login the actual Login data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $RoleTypeIdControl
	 * property-read QLabel $RoleTypeIdLabel
	 * property QIntegerTextBox $PermissionBitmapControl
	 * property-read QLabel $PermissionBitmapLabel
	 * property QTextBox $UsernameControl
	 * property-read QLabel $UsernameLabel
	 * property QTextBox $PasswordCacheControl
	 * property-read QLabel $PasswordCacheLabel
	 * property QTextBox $PasswordLastSetControl
	 * property-read QLabel $PasswordLastSetLabel
	 * property QDateTimePicker $DateLastLoginControl
	 * property-read QLabel $DateLastLoginLabel
	 * property QCheckBox $DomainActiveFlagControl
	 * property-read QLabel $DomainActiveFlagLabel
	 * property QCheckBox $LoginActiveFlagControl
	 * property-read QLabel $LoginActiveFlagLabel
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $MiddleInitialControl
	 * property-read QLabel $MiddleInitialLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QListBox $MinistryControl
	 * property-read QLabel $MinistryLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class LoginMetaControlGen extends QBaseClass {
		// General Variables
		protected $objLogin;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Login's individual data fields
		protected $lblId;
		protected $lstRoleType;
		protected $txtPermissionBitmap;
		protected $txtUsername;
		protected $txtPasswordCache;
		protected $txtPasswordLastSet;
		protected $calDateLastLogin;
		protected $chkDomainActiveFlag;
		protected $chkLoginActiveFlag;
		protected $txtEmail;
		protected $txtFirstName;
		protected $txtMiddleInitial;
		protected $txtLastName;

		// Controls that allow the viewing of Login's individual data fields
		protected $lblRoleTypeId;
		protected $lblPermissionBitmap;
		protected $lblUsername;
		protected $lblPasswordCache;
		protected $lblPasswordLastSet;
		protected $lblDateLastLogin;
		protected $lblDomainActiveFlag;
		protected $lblLoginActiveFlag;
		protected $lblEmail;
		protected $lblFirstName;
		protected $lblMiddleInitial;
		protected $lblLastName;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstMinistries;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblMinistries;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * LoginMetaControl to edit a single Login object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Login object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LoginMetaControl
		 * @param Login $objLogin new or existing Login object
		 */
		 public function __construct($objParentObject, Login $objLogin) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this LoginMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Login object
			$this->objLogin = $objLogin;

			// Figure out if we're Editing or Creating New
			if ($this->objLogin->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this LoginMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Login object creation - defaults to CreateOrEdit
 		 * @return LoginMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objLogin = Login::Load($intId);

				// Login was found -- return it!
				if ($objLogin)
					return new LoginMetaControl($objParentObject, $objLogin);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Login object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new LoginMetaControl($objParentObject, new Login());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LoginMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Login object creation - defaults to CreateOrEdit
		 * @return LoginMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return LoginMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LoginMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Login object creation - defaults to CreateOrEdit
		 * @return LoginMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return LoginMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objLogin->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstRoleType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstRoleType_Create($strControlId = null) {
			$this->lstRoleType = new QListBox($this->objParentObject, $strControlId);
			$this->lstRoleType->Name = QApplication::Translate('Role Type');
			$this->lstRoleType->Required = true;
			foreach (RoleType::$NameArray as $intId => $strValue)
				$this->lstRoleType->AddItem(new QListItem($strValue, $intId, $this->objLogin->RoleTypeId == $intId));
			return $this->lstRoleType;
		}

		/**
		 * Create and setup QLabel lblRoleTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRoleTypeId_Create($strControlId = null) {
			$this->lblRoleTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRoleTypeId->Name = QApplication::Translate('Role Type');
			$this->lblRoleTypeId->Text = ($this->objLogin->RoleTypeId) ? RoleType::$NameArray[$this->objLogin->RoleTypeId] : null;
			$this->lblRoleTypeId->Required = true;
			return $this->lblRoleTypeId;
		}

		/**
		 * Create and setup QIntegerTextBox txtPermissionBitmap
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtPermissionBitmap_Create($strControlId = null) {
			$this->txtPermissionBitmap = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtPermissionBitmap->Name = QApplication::Translate('Permission Bitmap');
			$this->txtPermissionBitmap->Text = $this->objLogin->PermissionBitmap;
			return $this->txtPermissionBitmap;
		}

		/**
		 * Create and setup QLabel lblPermissionBitmap
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPermissionBitmap_Create($strControlId = null, $strFormat = null) {
			$this->lblPermissionBitmap = new QLabel($this->objParentObject, $strControlId);
			$this->lblPermissionBitmap->Name = QApplication::Translate('Permission Bitmap');
			$this->lblPermissionBitmap->Text = $this->objLogin->PermissionBitmap;
			$this->lblPermissionBitmap->Format = $strFormat;
			return $this->lblPermissionBitmap;
		}

		/**
		 * Create and setup QTextBox txtUsername
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtUsername_Create($strControlId = null) {
			$this->txtUsername = new QTextBox($this->objParentObject, $strControlId);
			$this->txtUsername->Name = QApplication::Translate('Username');
			$this->txtUsername->Text = $this->objLogin->Username;
			$this->txtUsername->MaxLength = Login::UsernameMaxLength;
			return $this->txtUsername;
		}

		/**
		 * Create and setup QLabel lblUsername
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUsername_Create($strControlId = null) {
			$this->lblUsername = new QLabel($this->objParentObject, $strControlId);
			$this->lblUsername->Name = QApplication::Translate('Username');
			$this->lblUsername->Text = $this->objLogin->Username;
			return $this->lblUsername;
		}

		/**
		 * Create and setup QTextBox txtPasswordCache
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPasswordCache_Create($strControlId = null) {
			$this->txtPasswordCache = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPasswordCache->Name = QApplication::Translate('Password Cache');
			$this->txtPasswordCache->Text = $this->objLogin->PasswordCache;
			$this->txtPasswordCache->MaxLength = Login::PasswordCacheMaxLength;
			return $this->txtPasswordCache;
		}

		/**
		 * Create and setup QLabel lblPasswordCache
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPasswordCache_Create($strControlId = null) {
			$this->lblPasswordCache = new QLabel($this->objParentObject, $strControlId);
			$this->lblPasswordCache->Name = QApplication::Translate('Password Cache');
			$this->lblPasswordCache->Text = $this->objLogin->PasswordCache;
			return $this->lblPasswordCache;
		}

		/**
		 * Create and setup QTextBox txtPasswordLastSet
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPasswordLastSet_Create($strControlId = null) {
			$this->txtPasswordLastSet = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPasswordLastSet->Name = QApplication::Translate('Password Last Set');
			$this->txtPasswordLastSet->Text = $this->objLogin->PasswordLastSet;
			$this->txtPasswordLastSet->MaxLength = Login::PasswordLastSetMaxLength;
			return $this->txtPasswordLastSet;
		}

		/**
		 * Create and setup QLabel lblPasswordLastSet
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPasswordLastSet_Create($strControlId = null) {
			$this->lblPasswordLastSet = new QLabel($this->objParentObject, $strControlId);
			$this->lblPasswordLastSet->Name = QApplication::Translate('Password Last Set');
			$this->lblPasswordLastSet->Text = $this->objLogin->PasswordLastSet;
			return $this->lblPasswordLastSet;
		}

		/**
		 * Create and setup QDateTimePicker calDateLastLogin
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateLastLogin_Create($strControlId = null) {
			$this->calDateLastLogin = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateLastLogin->Name = QApplication::Translate('Date Last Login');
			$this->calDateLastLogin->DateTime = $this->objLogin->DateLastLogin;
			$this->calDateLastLogin->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateLastLogin;
		}

		/**
		 * Create and setup QLabel lblDateLastLogin
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateLastLogin_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateLastLogin = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateLastLogin->Name = QApplication::Translate('Date Last Login');
			$this->strDateLastLoginDateTimeFormat = $strDateTimeFormat;
			$this->lblDateLastLogin->Text = sprintf($this->objLogin->DateLastLogin) ? $this->objLogin->DateLastLogin->__toString($this->strDateLastLoginDateTimeFormat) : null;
			return $this->lblDateLastLogin;
		}

		protected $strDateLastLoginDateTimeFormat;

		/**
		 * Create and setup QCheckBox chkDomainActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkDomainActiveFlag_Create($strControlId = null) {
			$this->chkDomainActiveFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkDomainActiveFlag->Name = QApplication::Translate('Domain Active Flag');
			$this->chkDomainActiveFlag->Checked = $this->objLogin->DomainActiveFlag;
			return $this->chkDomainActiveFlag;
		}

		/**
		 * Create and setup QLabel lblDomainActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDomainActiveFlag_Create($strControlId = null) {
			$this->lblDomainActiveFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblDomainActiveFlag->Name = QApplication::Translate('Domain Active Flag');
			$this->lblDomainActiveFlag->Text = ($this->objLogin->DomainActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblDomainActiveFlag;
		}

		/**
		 * Create and setup QCheckBox chkLoginActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkLoginActiveFlag_Create($strControlId = null) {
			$this->chkLoginActiveFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkLoginActiveFlag->Name = QApplication::Translate('Login Active Flag');
			$this->chkLoginActiveFlag->Checked = $this->objLogin->LoginActiveFlag;
			return $this->chkLoginActiveFlag;
		}

		/**
		 * Create and setup QLabel lblLoginActiveFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLoginActiveFlag_Create($strControlId = null) {
			$this->lblLoginActiveFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblLoginActiveFlag->Name = QApplication::Translate('Login Active Flag');
			$this->lblLoginActiveFlag->Text = ($this->objLogin->LoginActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblLoginActiveFlag;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objLogin->Email;
			$this->txtEmail->MaxLength = Login::EmailMaxLength;
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
			$this->lblEmail->Text = $this->objLogin->Email;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objLogin->FirstName;
			$this->txtFirstName->MaxLength = Login::FirstNameMaxLength;
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
			$this->lblFirstName->Text = $this->objLogin->FirstName;
			return $this->lblFirstName;
		}

		/**
		 * Create and setup QTextBox txtMiddleInitial
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMiddleInitial_Create($strControlId = null) {
			$this->txtMiddleInitial = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMiddleInitial->Name = QApplication::Translate('Middle Initial');
			$this->txtMiddleInitial->Text = $this->objLogin->MiddleInitial;
			$this->txtMiddleInitial->MaxLength = Login::MiddleInitialMaxLength;
			return $this->txtMiddleInitial;
		}

		/**
		 * Create and setup QLabel lblMiddleInitial
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMiddleInitial_Create($strControlId = null) {
			$this->lblMiddleInitial = new QLabel($this->objParentObject, $strControlId);
			$this->lblMiddleInitial->Name = QApplication::Translate('Middle Initial');
			$this->lblMiddleInitial->Text = $this->objLogin->MiddleInitial;
			return $this->lblMiddleInitial;
		}

		/**
		 * Create and setup QTextBox txtLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLastName_Create($strControlId = null) {
			$this->txtLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objLogin->LastName;
			$this->txtLastName->MaxLength = Login::LastNameMaxLength;
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
			$this->lblLastName->Text = $this->objLogin->LastName;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QListBox lstMinistries
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstMinistries_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstMinistries = new QListBox($this->objParentObject, $strControlId);
			$this->lstMinistries->Name = QApplication::Translate('Ministries');
			$this->lstMinistries->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objLogin->GetMinistryArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objMinistryCursor = Ministry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objMinistry = Ministry::InstantiateCursor($objMinistryCursor)) {
				$objListItem = new QListItem($objMinistry->__toString(), $objMinistry->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objMinistry->Id)
						$objListItem->Selected = true;
				}
				$this->lstMinistries->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstMinistries;
		}

		/**
		 * Create and setup QLabel lblMinistries
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblMinistries_Create($strControlId = null, $strGlue = ', ') {
			$this->lblMinistries = new QLabel($this->objParentObject, $strControlId);
			$this->lstMinistries->Name = QApplication::Translate('Ministries');
			
			$objAssociatedArray = $this->objLogin->GetMinistryArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblMinistries->Text = implode($strGlue, $strItems);
			return $this->lblMinistries;
		}



		/**
		 * Refresh this MetaControl with Data from the local Login object.
		 * @param boolean $blnReload reload Login from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objLogin->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objLogin->Id;

			if ($this->lstRoleType) $this->lstRoleType->SelectedValue = $this->objLogin->RoleTypeId;
			if ($this->lblRoleTypeId) $this->lblRoleTypeId->Text = ($this->objLogin->RoleTypeId) ? RoleType::$NameArray[$this->objLogin->RoleTypeId] : null;

			if ($this->txtPermissionBitmap) $this->txtPermissionBitmap->Text = $this->objLogin->PermissionBitmap;
			if ($this->lblPermissionBitmap) $this->lblPermissionBitmap->Text = $this->objLogin->PermissionBitmap;

			if ($this->txtUsername) $this->txtUsername->Text = $this->objLogin->Username;
			if ($this->lblUsername) $this->lblUsername->Text = $this->objLogin->Username;

			if ($this->txtPasswordCache) $this->txtPasswordCache->Text = $this->objLogin->PasswordCache;
			if ($this->lblPasswordCache) $this->lblPasswordCache->Text = $this->objLogin->PasswordCache;

			if ($this->txtPasswordLastSet) $this->txtPasswordLastSet->Text = $this->objLogin->PasswordLastSet;
			if ($this->lblPasswordLastSet) $this->lblPasswordLastSet->Text = $this->objLogin->PasswordLastSet;

			if ($this->calDateLastLogin) $this->calDateLastLogin->DateTime = $this->objLogin->DateLastLogin;
			if ($this->lblDateLastLogin) $this->lblDateLastLogin->Text = sprintf($this->objLogin->DateLastLogin) ? $this->objLogin->__toString($this->strDateLastLoginDateTimeFormat) : null;

			if ($this->chkDomainActiveFlag) $this->chkDomainActiveFlag->Checked = $this->objLogin->DomainActiveFlag;
			if ($this->lblDomainActiveFlag) $this->lblDomainActiveFlag->Text = ($this->objLogin->DomainActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkLoginActiveFlag) $this->chkLoginActiveFlag->Checked = $this->objLogin->LoginActiveFlag;
			if ($this->lblLoginActiveFlag) $this->lblLoginActiveFlag->Text = ($this->objLogin->LoginActiveFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtEmail) $this->txtEmail->Text = $this->objLogin->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objLogin->Email;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objLogin->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objLogin->FirstName;

			if ($this->txtMiddleInitial) $this->txtMiddleInitial->Text = $this->objLogin->MiddleInitial;
			if ($this->lblMiddleInitial) $this->lblMiddleInitial->Text = $this->objLogin->MiddleInitial;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objLogin->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objLogin->LastName;

			if ($this->lstMinistries) {
				$this->lstMinistries->RemoveAllItems();
				$objAssociatedArray = $this->objLogin->GetMinistryArray();
				$objMinistryArray = Ministry::LoadAll();
				if ($objMinistryArray) foreach ($objMinistryArray as $objMinistry) {
					$objListItem = new QListItem($objMinistry->__toString(), $objMinistry->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objMinistry->Id)
							$objListItem->Selected = true;
					}
					$this->lstMinistries->AddItem($objListItem);
				}
			}
			if ($this->lblMinistries) {
				$objAssociatedArray = $this->objLogin->GetMinistryArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblMinistries->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstMinistries_Update() {
			if ($this->lstMinistries) {
				$this->objLogin->UnassociateAllMinistries();
				$objSelectedListItems = $this->lstMinistries->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objLogin->AssociateMinistry(Ministry::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC LOGIN OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Login instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveLogin() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstRoleType) $this->objLogin->RoleTypeId = $this->lstRoleType->SelectedValue;
				if ($this->txtPermissionBitmap) $this->objLogin->PermissionBitmap = $this->txtPermissionBitmap->Text;
				if ($this->txtUsername) $this->objLogin->Username = $this->txtUsername->Text;
				if ($this->txtPasswordCache) $this->objLogin->PasswordCache = $this->txtPasswordCache->Text;
				if ($this->txtPasswordLastSet) $this->objLogin->PasswordLastSet = $this->txtPasswordLastSet->Text;
				if ($this->calDateLastLogin) $this->objLogin->DateLastLogin = $this->calDateLastLogin->DateTime;
				if ($this->chkDomainActiveFlag) $this->objLogin->DomainActiveFlag = $this->chkDomainActiveFlag->Checked;
				if ($this->chkLoginActiveFlag) $this->objLogin->LoginActiveFlag = $this->chkLoginActiveFlag->Checked;
				if ($this->txtEmail) $this->objLogin->Email = $this->txtEmail->Text;
				if ($this->txtFirstName) $this->objLogin->FirstName = $this->txtFirstName->Text;
				if ($this->txtMiddleInitial) $this->objLogin->MiddleInitial = $this->txtMiddleInitial->Text;
				if ($this->txtLastName) $this->objLogin->LastName = $this->txtLastName->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Login object
				$this->objLogin->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstMinistries_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Login instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteLogin() {
			$this->objLogin->UnassociateAllMinistries();
			$this->objLogin->Delete();
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
				case 'Login': return $this->objLogin;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Login fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'RoleTypeIdControl':
					if (!$this->lstRoleType) return $this->lstRoleType_Create();
					return $this->lstRoleType;
				case 'RoleTypeIdLabel':
					if (!$this->lblRoleTypeId) return $this->lblRoleTypeId_Create();
					return $this->lblRoleTypeId;
				case 'PermissionBitmapControl':
					if (!$this->txtPermissionBitmap) return $this->txtPermissionBitmap_Create();
					return $this->txtPermissionBitmap;
				case 'PermissionBitmapLabel':
					if (!$this->lblPermissionBitmap) return $this->lblPermissionBitmap_Create();
					return $this->lblPermissionBitmap;
				case 'UsernameControl':
					if (!$this->txtUsername) return $this->txtUsername_Create();
					return $this->txtUsername;
				case 'UsernameLabel':
					if (!$this->lblUsername) return $this->lblUsername_Create();
					return $this->lblUsername;
				case 'PasswordCacheControl':
					if (!$this->txtPasswordCache) return $this->txtPasswordCache_Create();
					return $this->txtPasswordCache;
				case 'PasswordCacheLabel':
					if (!$this->lblPasswordCache) return $this->lblPasswordCache_Create();
					return $this->lblPasswordCache;
				case 'PasswordLastSetControl':
					if (!$this->txtPasswordLastSet) return $this->txtPasswordLastSet_Create();
					return $this->txtPasswordLastSet;
				case 'PasswordLastSetLabel':
					if (!$this->lblPasswordLastSet) return $this->lblPasswordLastSet_Create();
					return $this->lblPasswordLastSet;
				case 'DateLastLoginControl':
					if (!$this->calDateLastLogin) return $this->calDateLastLogin_Create();
					return $this->calDateLastLogin;
				case 'DateLastLoginLabel':
					if (!$this->lblDateLastLogin) return $this->lblDateLastLogin_Create();
					return $this->lblDateLastLogin;
				case 'DomainActiveFlagControl':
					if (!$this->chkDomainActiveFlag) return $this->chkDomainActiveFlag_Create();
					return $this->chkDomainActiveFlag;
				case 'DomainActiveFlagLabel':
					if (!$this->lblDomainActiveFlag) return $this->lblDomainActiveFlag_Create();
					return $this->lblDomainActiveFlag;
				case 'LoginActiveFlagControl':
					if (!$this->chkLoginActiveFlag) return $this->chkLoginActiveFlag_Create();
					return $this->chkLoginActiveFlag;
				case 'LoginActiveFlagLabel':
					if (!$this->lblLoginActiveFlag) return $this->lblLoginActiveFlag_Create();
					return $this->lblLoginActiveFlag;
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'FirstNameControl':
					if (!$this->txtFirstName) return $this->txtFirstName_Create();
					return $this->txtFirstName;
				case 'FirstNameLabel':
					if (!$this->lblFirstName) return $this->lblFirstName_Create();
					return $this->lblFirstName;
				case 'MiddleInitialControl':
					if (!$this->txtMiddleInitial) return $this->txtMiddleInitial_Create();
					return $this->txtMiddleInitial;
				case 'MiddleInitialLabel':
					if (!$this->lblMiddleInitial) return $this->lblMiddleInitial_Create();
					return $this->lblMiddleInitial;
				case 'LastNameControl':
					if (!$this->txtLastName) return $this->txtLastName_Create();
					return $this->txtLastName;
				case 'LastNameLabel':
					if (!$this->lblLastName) return $this->lblLastName_Create();
					return $this->lblLastName;
				case 'MinistryControl':
					if (!$this->lstMinistries) return $this->lstMinistries_Create();
					return $this->lstMinistries;
				case 'MinistryLabel':
					if (!$this->lblMinistries) return $this->lblMinistries_Create();
					return $this->lblMinistries;
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
					// Controls that point to Login fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'RoleTypeIdControl':
						return ($this->lstRoleType = QType::Cast($mixValue, 'QControl'));
					case 'PermissionBitmapControl':
						return ($this->txtPermissionBitmap = QType::Cast($mixValue, 'QControl'));
					case 'UsernameControl':
						return ($this->txtUsername = QType::Cast($mixValue, 'QControl'));
					case 'PasswordCacheControl':
						return ($this->txtPasswordCache = QType::Cast($mixValue, 'QControl'));
					case 'PasswordLastSetControl':
						return ($this->txtPasswordLastSet = QType::Cast($mixValue, 'QControl'));
					case 'DateLastLoginControl':
						return ($this->calDateLastLogin = QType::Cast($mixValue, 'QControl'));
					case 'DomainActiveFlagControl':
						return ($this->chkDomainActiveFlag = QType::Cast($mixValue, 'QControl'));
					case 'LoginActiveFlagControl':
						return ($this->chkLoginActiveFlag = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'MiddleInitialControl':
						return ($this->txtMiddleInitial = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'MinistryControl':
						return ($this->lstMinistries = QType::Cast($mixValue, 'QControl'));
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