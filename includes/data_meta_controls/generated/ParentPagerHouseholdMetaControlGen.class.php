<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ParentPagerHousehold class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ParentPagerHousehold object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ParentPagerHouseholdMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ParentPagerHousehold $ParentPagerHousehold the actual ParentPagerHousehold data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $ServerIdentifierControl
	 * property-read QLabel $ServerIdentifierLabel
	 * property QListBox $HouseholdIdControl
	 * property-read QLabel $HouseholdIdLabel
	 * property QCheckBox $HiddenFlagControl
	 * property-read QLabel $HiddenFlagLabel
	 * property QListBox $ParentPagerSyncStatusTypeIdControl
	 * property-read QLabel $ParentPagerSyncStatusTypeIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ParentPagerHouseholdMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ParentPagerHousehold objParentPagerHousehold
		 * @access protected
		 */
		protected $objParentPagerHousehold;

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

		// Controls that allow the editing of ParentPagerHousehold's individual data fields
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
         * @var QListBox lstHousehold;
         * @access protected
         */
		protected $lstHousehold;

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
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;


		// Controls that allow the viewing of ParentPagerHousehold's individual data fields
        /**
         * @var QLabel lblServerIdentifier
         * @access protected
         */
		protected $lblServerIdentifier;

        /**
         * @var QLabel lblHouseholdId
         * @access protected
         */
		protected $lblHouseholdId;

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
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ParentPagerHouseholdMetaControl to edit a single ParentPagerHousehold object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ParentPagerHousehold object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerHouseholdMetaControl
		 * @param ParentPagerHousehold $objParentPagerHousehold new or existing ParentPagerHousehold object
		 */
		 public function __construct($objParentObject, ParentPagerHousehold $objParentPagerHousehold) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ParentPagerHouseholdMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ParentPagerHousehold object
			$this->objParentPagerHousehold = $objParentPagerHousehold;

			// Figure out if we're Editing or Creating New
			if ($this->objParentPagerHousehold->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerHouseholdMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerHousehold object creation - defaults to CreateOrEdit
 		 * @return ParentPagerHouseholdMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objParentPagerHousehold = ParentPagerHousehold::Load($intId);

				// ParentPagerHousehold was found -- return it!
				if ($objParentPagerHousehold)
					return new ParentPagerHouseholdMetaControl($objParentObject, $objParentPagerHousehold);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ParentPagerHousehold object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ParentPagerHouseholdMetaControl($objParentObject, new ParentPagerHousehold());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerHouseholdMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerHousehold object creation - defaults to CreateOrEdit
		 * @return ParentPagerHouseholdMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ParentPagerHouseholdMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerHouseholdMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerHousehold object creation - defaults to CreateOrEdit
		 * @return ParentPagerHouseholdMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ParentPagerHouseholdMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objParentPagerHousehold->Id;
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
			$this->txtServerIdentifier->Text = $this->objParentPagerHousehold->ServerIdentifier;
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
			$this->lblServerIdentifier->Text = $this->objParentPagerHousehold->ServerIdentifier;
			$this->lblServerIdentifier->Required = true;
			$this->lblServerIdentifier->Format = $strFormat;
			return $this->lblServerIdentifier;
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
				if (($this->objParentPagerHousehold->Household) && ($this->objParentPagerHousehold->Household->Id == $objHousehold->Id))
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
			$this->lblHouseholdId->Text = ($this->objParentPagerHousehold->Household) ? $this->objParentPagerHousehold->Household->__toString() : null;
			return $this->lblHouseholdId;
		}

		/**
		 * Create and setup QCheckBox chkHiddenFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkHiddenFlag_Create($strControlId = null) {
			$this->chkHiddenFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkHiddenFlag->Name = QApplication::Translate('Hidden Flag');
			$this->chkHiddenFlag->Checked = $this->objParentPagerHousehold->HiddenFlag;
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
			$this->lblHiddenFlag->Text = ($this->objParentPagerHousehold->HiddenFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
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

			$this->lstParentPagerSyncStatusType->AddItems(ParentPagerSyncStatusType::$NameArray, $this->objParentPagerHousehold->ParentPagerSyncStatusTypeId);
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
			$this->lblParentPagerSyncStatusTypeId->Text = ($this->objParentPagerHousehold->ParentPagerSyncStatusTypeId) ? ParentPagerSyncStatusType::$NameArray[$this->objParentPagerHousehold->ParentPagerSyncStatusTypeId] : null;
			$this->lblParentPagerSyncStatusTypeId->Required = true;
			return $this->lblParentPagerSyncStatusTypeId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objParentPagerHousehold->Name;
			$this->txtName->MaxLength = ParentPagerHousehold::NameMaxLength;
			return $this->txtName;
		}

		/**
		 * Create and setup QLabel lblName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblName_Create($strControlId = null) {
			$this->lblName = new QLabel($this->objParentObject, $strControlId);
			$this->lblName->Name = QApplication::Translate('Name');
			$this->lblName->Text = $this->objParentPagerHousehold->Name;
			return $this->lblName;
		}



		/**
		 * Refresh this MetaControl with Data from the local ParentPagerHousehold object.
		 * @param boolean $blnReload reload ParentPagerHousehold from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objParentPagerHousehold->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objParentPagerHousehold->Id;

			if ($this->txtServerIdentifier) $this->txtServerIdentifier->Text = $this->objParentPagerHousehold->ServerIdentifier;
			if ($this->lblServerIdentifier) $this->lblServerIdentifier->Text = $this->objParentPagerHousehold->ServerIdentifier;

			if ($this->lstHousehold) {
					$this->lstHousehold->RemoveAllItems();
				$this->lstHousehold->AddItem(QApplication::Translate('- Select One -'), null);
				$objHouseholdArray = Household::LoadAll();
				if ($objHouseholdArray) foreach ($objHouseholdArray as $objHousehold) {
					$objListItem = new QListItem($objHousehold->__toString(), $objHousehold->Id);
					if (($this->objParentPagerHousehold->Household) && ($this->objParentPagerHousehold->Household->Id == $objHousehold->Id))
						$objListItem->Selected = true;
					$this->lstHousehold->AddItem($objListItem);
				}
			}
			if ($this->lblHouseholdId) $this->lblHouseholdId->Text = ($this->objParentPagerHousehold->Household) ? $this->objParentPagerHousehold->Household->__toString() : null;

			if ($this->chkHiddenFlag) $this->chkHiddenFlag->Checked = $this->objParentPagerHousehold->HiddenFlag;
			if ($this->lblHiddenFlag) $this->lblHiddenFlag->Text = ($this->objParentPagerHousehold->HiddenFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstParentPagerSyncStatusType) $this->lstParentPagerSyncStatusType->SelectedValue = $this->objParentPagerHousehold->ParentPagerSyncStatusTypeId;
			if ($this->lblParentPagerSyncStatusTypeId) $this->lblParentPagerSyncStatusTypeId->Text = ($this->objParentPagerHousehold->ParentPagerSyncStatusTypeId) ? ParentPagerSyncStatusType::$NameArray[$this->objParentPagerHousehold->ParentPagerSyncStatusTypeId] : null;

			if ($this->txtName) $this->txtName->Text = $this->objParentPagerHousehold->Name;
			if ($this->lblName) $this->lblName->Text = $this->objParentPagerHousehold->Name;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PARENTPAGERHOUSEHOLD OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ParentPagerHousehold instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveParentPagerHousehold() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtServerIdentifier) $this->objParentPagerHousehold->ServerIdentifier = $this->txtServerIdentifier->Text;
				if ($this->lstHousehold) $this->objParentPagerHousehold->HouseholdId = $this->lstHousehold->SelectedValue;
				if ($this->chkHiddenFlag) $this->objParentPagerHousehold->HiddenFlag = $this->chkHiddenFlag->Checked;
				if ($this->lstParentPagerSyncStatusType) $this->objParentPagerHousehold->ParentPagerSyncStatusTypeId = $this->lstParentPagerSyncStatusType->SelectedValue;
				if ($this->txtName) $this->objParentPagerHousehold->Name = $this->txtName->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ParentPagerHousehold object
				$this->objParentPagerHousehold->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ParentPagerHousehold instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteParentPagerHousehold() {
			$this->objParentPagerHousehold->Delete();
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
				case 'ParentPagerHousehold': return $this->objParentPagerHousehold;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ParentPagerHousehold fields -- will be created dynamically if not yet created
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
				case 'HouseholdIdControl':
					if (!$this->lstHousehold) return $this->lstHousehold_Create();
					return $this->lstHousehold;
				case 'HouseholdIdLabel':
					if (!$this->lblHouseholdId) return $this->lblHouseholdId_Create();
					return $this->lblHouseholdId;
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
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
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
					// Controls that point to ParentPagerHousehold fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ServerIdentifierControl':
						return ($this->txtServerIdentifier = QType::Cast($mixValue, 'QControl'));
					case 'HouseholdIdControl':
						return ($this->lstHousehold = QType::Cast($mixValue, 'QControl'));
					case 'HiddenFlagControl':
						return ($this->chkHiddenFlag = QType::Cast($mixValue, 'QControl'));
					case 'ParentPagerSyncStatusTypeIdControl':
						return ($this->lstParentPagerSyncStatusType = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
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