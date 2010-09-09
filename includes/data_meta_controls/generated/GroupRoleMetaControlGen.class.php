<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the GroupRole class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single GroupRole object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a GroupRoleMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read GroupRole $GroupRole the actual GroupRole data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $MinistryIdControl
	 * property-read QLabel $MinistryIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $GroupRoleTypeIdControl
	 * property-read QLabel $GroupRoleTypeIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class GroupRoleMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var GroupRole objGroupRole
		 * @access protected
		 */
		protected $objGroupRole;

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

		// Controls that allow the editing of GroupRole's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstMinistry;
         * @access protected
         */
		protected $lstMinistry;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QListBox lstGroupRoleType;
         * @access protected
         */
		protected $lstGroupRoleType;


		// Controls that allow the viewing of GroupRole's individual data fields
        /**
         * @var QLabel lblMinistryId
         * @access protected
         */
		protected $lblMinistryId;

        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblGroupRoleTypeId
         * @access protected
         */
		protected $lblGroupRoleTypeId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * GroupRoleMetaControl to edit a single GroupRole object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single GroupRole object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupRoleMetaControl
		 * @param GroupRole $objGroupRole new or existing GroupRole object
		 */
		 public function __construct($objParentObject, GroupRole $objGroupRole) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this GroupRoleMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked GroupRole object
			$this->objGroupRole = $objGroupRole;

			// Figure out if we're Editing or Creating New
			if ($this->objGroupRole->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupRoleMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing GroupRole object creation - defaults to CreateOrEdit
 		 * @return GroupRoleMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objGroupRole = GroupRole::Load($intId);

				// GroupRole was found -- return it!
				if ($objGroupRole)
					return new GroupRoleMetaControl($objParentObject, $objGroupRole);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a GroupRole object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new GroupRoleMetaControl($objParentObject, new GroupRole());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupRoleMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GroupRole object creation - defaults to CreateOrEdit
		 * @return GroupRoleMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return GroupRoleMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupRoleMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GroupRole object creation - defaults to CreateOrEdit
		 * @return GroupRoleMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return GroupRoleMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objGroupRole->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstMinistry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstMinistry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstMinistry = new QListBox($this->objParentObject, $strControlId);
			$this->lstMinistry->Name = QApplication::Translate('Ministry');
			$this->lstMinistry->Required = true;
			if (!$this->blnEditMode)
				$this->lstMinistry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objMinistryCursor = Ministry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objMinistry = Ministry::InstantiateCursor($objMinistryCursor)) {
				$objListItem = new QListItem($objMinistry->__toString(), $objMinistry->Id);
				if (($this->objGroupRole->Ministry) && ($this->objGroupRole->Ministry->Id == $objMinistry->Id))
					$objListItem->Selected = true;
				$this->lstMinistry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstMinistry;
		}

		/**
		 * Create and setup QLabel lblMinistryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMinistryId_Create($strControlId = null) {
			$this->lblMinistryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblMinistryId->Name = QApplication::Translate('Ministry');
			$this->lblMinistryId->Text = ($this->objGroupRole->Ministry) ? $this->objGroupRole->Ministry->__toString() : null;
			$this->lblMinistryId->Required = true;
			return $this->lblMinistryId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objGroupRole->Name;
			$this->txtName->MaxLength = GroupRole::NameMaxLength;
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
			$this->lblName->Text = $this->objGroupRole->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstGroupRoleType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstGroupRoleType_Create($strControlId = null) {
			$this->lstGroupRoleType = new QListBox($this->objParentObject, $strControlId);
			$this->lstGroupRoleType->Name = QApplication::Translate('Group Role Type');
			$this->lstGroupRoleType->Required = true;
			foreach (GroupRoleType::$NameArray as $intId => $strValue)
				$this->lstGroupRoleType->AddItem(new QListItem($strValue, $intId, $this->objGroupRole->GroupRoleTypeId == $intId));
			return $this->lstGroupRoleType;
		}

		/**
		 * Create and setup QLabel lblGroupRoleTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupRoleTypeId_Create($strControlId = null) {
			$this->lblGroupRoleTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupRoleTypeId->Name = QApplication::Translate('Group Role Type');
			$this->lblGroupRoleTypeId->Text = ($this->objGroupRole->GroupRoleTypeId) ? GroupRoleType::$NameArray[$this->objGroupRole->GroupRoleTypeId] : null;
			$this->lblGroupRoleTypeId->Required = true;
			return $this->lblGroupRoleTypeId;
		}



		/**
		 * Refresh this MetaControl with Data from the local GroupRole object.
		 * @param boolean $blnReload reload GroupRole from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objGroupRole->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objGroupRole->Id;

			if ($this->lstMinistry) {
					$this->lstMinistry->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstMinistry->AddItem(QApplication::Translate('- Select One -'), null);
				$objMinistryArray = Ministry::LoadAll();
				if ($objMinistryArray) foreach ($objMinistryArray as $objMinistry) {
					$objListItem = new QListItem($objMinistry->__toString(), $objMinistry->Id);
					if (($this->objGroupRole->Ministry) && ($this->objGroupRole->Ministry->Id == $objMinistry->Id))
						$objListItem->Selected = true;
					$this->lstMinistry->AddItem($objListItem);
				}
			}
			if ($this->lblMinistryId) $this->lblMinistryId->Text = ($this->objGroupRole->Ministry) ? $this->objGroupRole->Ministry->__toString() : null;

			if ($this->txtName) $this->txtName->Text = $this->objGroupRole->Name;
			if ($this->lblName) $this->lblName->Text = $this->objGroupRole->Name;

			if ($this->lstGroupRoleType) $this->lstGroupRoleType->SelectedValue = $this->objGroupRole->GroupRoleTypeId;
			if ($this->lblGroupRoleTypeId) $this->lblGroupRoleTypeId->Text = ($this->objGroupRole->GroupRoleTypeId) ? GroupRoleType::$NameArray[$this->objGroupRole->GroupRoleTypeId] : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC GROUPROLE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's GroupRole instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveGroupRole() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstMinistry) $this->objGroupRole->MinistryId = $this->lstMinistry->SelectedValue;
				if ($this->txtName) $this->objGroupRole->Name = $this->txtName->Text;
				if ($this->lstGroupRoleType) $this->objGroupRole->GroupRoleTypeId = $this->lstGroupRoleType->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the GroupRole object
				$this->objGroupRole->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's GroupRole instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteGroupRole() {
			$this->objGroupRole->Delete();
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
				case 'GroupRole': return $this->objGroupRole;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to GroupRole fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'MinistryIdControl':
					if (!$this->lstMinistry) return $this->lstMinistry_Create();
					return $this->lstMinistry;
				case 'MinistryIdLabel':
					if (!$this->lblMinistryId) return $this->lblMinistryId_Create();
					return $this->lblMinistryId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'GroupRoleTypeIdControl':
					if (!$this->lstGroupRoleType) return $this->lstGroupRoleType_Create();
					return $this->lstGroupRoleType;
				case 'GroupRoleTypeIdLabel':
					if (!$this->lblGroupRoleTypeId) return $this->lblGroupRoleTypeId_Create();
					return $this->lblGroupRoleTypeId;
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
					// Controls that point to GroupRole fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'MinistryIdControl':
						return ($this->lstMinistry = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'GroupRoleTypeIdControl':
						return ($this->lstGroupRoleType = QType::Cast($mixValue, 'QControl'));
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