<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the GroupCategory class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single GroupCategory object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a GroupCategoryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read GroupCategory $GroupCategory the actual GroupCategory data class being edited
	 * property QListBox $GroupIdControl
	 * property-read QLabel $GroupIdLabel
	 * property QDateTimePicker $DateRefreshedControl
	 * property-read QLabel $DateRefreshedLabel
	 * property QIntegerTextBox $ProcessTimeMsControl
	 * property-read QLabel $ProcessTimeMsLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class GroupCategoryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var GroupCategory objGroupCategory
		 * @access protected
		 */
		protected $objGroupCategory;

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

		// Controls that allow the editing of GroupCategory's individual data fields
        /**
         * @var QListBox lstGroup;
         * @access protected
         */
		protected $lstGroup;

        /**
         * @var QDateTimePicker calDateRefreshed;
         * @access protected
         */
		protected $calDateRefreshed;

        /**
         * @var QIntegerTextBox txtProcessTimeMs;
         * @access protected
         */
		protected $txtProcessTimeMs;


		// Controls that allow the viewing of GroupCategory's individual data fields
        /**
         * @var QLabel lblGroupId
         * @access protected
         */
		protected $lblGroupId;

        /**
         * @var QLabel lblDateRefreshed
         * @access protected
         */
		protected $lblDateRefreshed;

        /**
         * @var QLabel lblProcessTimeMs
         * @access protected
         */
		protected $lblProcessTimeMs;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * GroupCategoryMetaControl to edit a single GroupCategory object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single GroupCategory object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupCategoryMetaControl
		 * @param GroupCategory $objGroupCategory new or existing GroupCategory object
		 */
		 public function __construct($objParentObject, GroupCategory $objGroupCategory) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this GroupCategoryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked GroupCategory object
			$this->objGroupCategory = $objGroupCategory;

			// Figure out if we're Editing or Creating New
			if ($this->objGroupCategory->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupCategoryMetaControl
		 * @param integer $intGroupId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing GroupCategory object creation - defaults to CreateOrEdit
 		 * @return GroupCategoryMetaControl
		 */
		public static function Create($objParentObject, $intGroupId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intGroupId)) {
				$objGroupCategory = GroupCategory::Load($intGroupId);

				// GroupCategory was found -- return it!
				if ($objGroupCategory)
					return new GroupCategoryMetaControl($objParentObject, $objGroupCategory);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a GroupCategory object with PK arguments: ' . $intGroupId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new GroupCategoryMetaControl($objParentObject, new GroupCategory());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupCategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GroupCategory object creation - defaults to CreateOrEdit
		 * @return GroupCategoryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intGroupId = QApplication::PathInfo(0);
			return GroupCategoryMetaControl::Create($objParentObject, $intGroupId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupCategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GroupCategory object creation - defaults to CreateOrEdit
		 * @return GroupCategoryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intGroupId = QApplication::QueryString('intGroupId');
			return GroupCategoryMetaControl::Create($objParentObject, $intGroupId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstGroup
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGroup_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGroup = new QListBox($this->objParentObject, $strControlId);
			$this->lstGroup->Name = QApplication::Translate('Group');
			$this->lstGroup->Required = true;
			if (!$this->blnEditMode)
				$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGroupCursor = Group::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGroup = Group::InstantiateCursor($objGroupCursor)) {
				$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
				if (($this->objGroupCategory->Group) && ($this->objGroupCategory->Group->Id == $objGroup->Id))
					$objListItem->Selected = true;
				$this->lstGroup->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstGroup;
		}

		/**
		 * Create and setup QLabel lblGroupId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupId_Create($strControlId = null) {
			$this->lblGroupId = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupId->Name = QApplication::Translate('Group');
			$this->lblGroupId->Text = ($this->objGroupCategory->Group) ? $this->objGroupCategory->Group->__toString() : null;
			$this->lblGroupId->Required = true;
			return $this->lblGroupId;
		}

		/**
		 * Create and setup QDateTimePicker calDateRefreshed
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateRefreshed_Create($strControlId = null) {
			$this->calDateRefreshed = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateRefreshed->Name = QApplication::Translate('Date Refreshed');
			$this->calDateRefreshed->DateTime = $this->objGroupCategory->DateRefreshed;
			$this->calDateRefreshed->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateRefreshed;
		}

		/**
		 * Create and setup QLabel lblDateRefreshed
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateRefreshed_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateRefreshed = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateRefreshed->Name = QApplication::Translate('Date Refreshed');
			$this->strDateRefreshedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateRefreshed->Text = sprintf($this->objGroupCategory->DateRefreshed) ? $this->objGroupCategory->DateRefreshed->__toString($this->strDateRefreshedDateTimeFormat) : null;
			return $this->lblDateRefreshed;
		}

		protected $strDateRefreshedDateTimeFormat;

		/**
		 * Create and setup QIntegerTextBox txtProcessTimeMs
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtProcessTimeMs_Create($strControlId = null) {
			$this->txtProcessTimeMs = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtProcessTimeMs->Name = QApplication::Translate('Process Time Ms');
			$this->txtProcessTimeMs->Text = $this->objGroupCategory->ProcessTimeMs;
			return $this->txtProcessTimeMs;
		}

		/**
		 * Create and setup QLabel lblProcessTimeMs
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblProcessTimeMs_Create($strControlId = null, $strFormat = null) {
			$this->lblProcessTimeMs = new QLabel($this->objParentObject, $strControlId);
			$this->lblProcessTimeMs->Name = QApplication::Translate('Process Time Ms');
			$this->lblProcessTimeMs->Text = $this->objGroupCategory->ProcessTimeMs;
			$this->lblProcessTimeMs->Format = $strFormat;
			return $this->lblProcessTimeMs;
		}



		/**
		 * Refresh this MetaControl with Data from the local GroupCategory object.
		 * @param boolean $blnReload reload GroupCategory from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objGroupCategory->Reload();

			if ($this->lstGroup) {
					$this->lstGroup->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupArray = Group::LoadAll();
				if ($objGroupArray) foreach ($objGroupArray as $objGroup) {
					$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
					if (($this->objGroupCategory->Group) && ($this->objGroupCategory->Group->Id == $objGroup->Id))
						$objListItem->Selected = true;
					$this->lstGroup->AddItem($objListItem);
				}
			}
			if ($this->lblGroupId) $this->lblGroupId->Text = ($this->objGroupCategory->Group) ? $this->objGroupCategory->Group->__toString() : null;

			if ($this->calDateRefreshed) $this->calDateRefreshed->DateTime = $this->objGroupCategory->DateRefreshed;
			if ($this->lblDateRefreshed) $this->lblDateRefreshed->Text = sprintf($this->objGroupCategory->DateRefreshed) ? $this->objGroupCategory->__toString($this->strDateRefreshedDateTimeFormat) : null;

			if ($this->txtProcessTimeMs) $this->txtProcessTimeMs->Text = $this->objGroupCategory->ProcessTimeMs;
			if ($this->lblProcessTimeMs) $this->lblProcessTimeMs->Text = $this->objGroupCategory->ProcessTimeMs;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC GROUPCATEGORY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's GroupCategory instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveGroupCategory() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstGroup) $this->objGroupCategory->GroupId = $this->lstGroup->SelectedValue;
				if ($this->calDateRefreshed) $this->objGroupCategory->DateRefreshed = $this->calDateRefreshed->DateTime;
				if ($this->txtProcessTimeMs) $this->objGroupCategory->ProcessTimeMs = $this->txtProcessTimeMs->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the GroupCategory object
				$this->objGroupCategory->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's GroupCategory instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteGroupCategory() {
			$this->objGroupCategory->Delete();
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
				case 'GroupCategory': return $this->objGroupCategory;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to GroupCategory fields -- will be created dynamically if not yet created
				case 'GroupIdControl':
					if (!$this->lstGroup) return $this->lstGroup_Create();
					return $this->lstGroup;
				case 'GroupIdLabel':
					if (!$this->lblGroupId) return $this->lblGroupId_Create();
					return $this->lblGroupId;
				case 'DateRefreshedControl':
					if (!$this->calDateRefreshed) return $this->calDateRefreshed_Create();
					return $this->calDateRefreshed;
				case 'DateRefreshedLabel':
					if (!$this->lblDateRefreshed) return $this->lblDateRefreshed_Create();
					return $this->lblDateRefreshed;
				case 'ProcessTimeMsControl':
					if (!$this->txtProcessTimeMs) return $this->txtProcessTimeMs_Create();
					return $this->txtProcessTimeMs;
				case 'ProcessTimeMsLabel':
					if (!$this->lblProcessTimeMs) return $this->lblProcessTimeMs_Create();
					return $this->lblProcessTimeMs;
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
					// Controls that point to GroupCategory fields
					case 'GroupIdControl':
						return ($this->lstGroup = QType::Cast($mixValue, 'QControl'));
					case 'DateRefreshedControl':
						return ($this->calDateRefreshed = QType::Cast($mixValue, 'QControl'));
					case 'ProcessTimeMsControl':
						return ($this->txtProcessTimeMs = QType::Cast($mixValue, 'QControl'));
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