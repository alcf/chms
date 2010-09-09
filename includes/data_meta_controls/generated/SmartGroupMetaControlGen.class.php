<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the SmartGroup class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single SmartGroup object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SmartGroupMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read SmartGroup $SmartGroup the actual SmartGroup data class being edited
	 * property QListBox $GroupIdControl
	 * property-read QLabel $GroupIdLabel
	 * property QListBox $SearchQueryIdControl
	 * property-read QLabel $SearchQueryIdLabel
	 * property QTextBox $QueryControl
	 * property-read QLabel $QueryLabel
	 * property QDateTimePicker $DateRefreshedControl
	 * property-read QLabel $DateRefreshedLabel
	 * property QIntegerTextBox $ProcessTimeMsControl
	 * property-read QLabel $ProcessTimeMsLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class SmartGroupMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var SmartGroup objSmartGroup
		 * @access protected
		 */
		protected $objSmartGroup;

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

		// Controls that allow the editing of SmartGroup's individual data fields
        /**
         * @var QListBox lstGroup;
         * @access protected
         */
		protected $lstGroup;

        /**
         * @var QListBox lstSearchQuery;
         * @access protected
         */
		protected $lstSearchQuery;

        /**
         * @var QTextBox txtQuery;
         * @access protected
         */
		protected $txtQuery;

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


		// Controls that allow the viewing of SmartGroup's individual data fields
        /**
         * @var QLabel lblGroupId
         * @access protected
         */
		protected $lblGroupId;

        /**
         * @var QLabel lblSearchQueryId
         * @access protected
         */
		protected $lblSearchQueryId;

        /**
         * @var QLabel lblQuery
         * @access protected
         */
		protected $lblQuery;

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
		 * SmartGroupMetaControl to edit a single SmartGroup object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single SmartGroup object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SmartGroupMetaControl
		 * @param SmartGroup $objSmartGroup new or existing SmartGroup object
		 */
		 public function __construct($objParentObject, SmartGroup $objSmartGroup) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this SmartGroupMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked SmartGroup object
			$this->objSmartGroup = $objSmartGroup;

			// Figure out if we're Editing or Creating New
			if ($this->objSmartGroup->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this SmartGroupMetaControl
		 * @param integer $intGroupId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing SmartGroup object creation - defaults to CreateOrEdit
 		 * @return SmartGroupMetaControl
		 */
		public static function Create($objParentObject, $intGroupId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intGroupId)) {
				$objSmartGroup = SmartGroup::Load($intGroupId);

				// SmartGroup was found -- return it!
				if ($objSmartGroup)
					return new SmartGroupMetaControl($objParentObject, $objSmartGroup);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a SmartGroup object with PK arguments: ' . $intGroupId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new SmartGroupMetaControl($objParentObject, new SmartGroup());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SmartGroupMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SmartGroup object creation - defaults to CreateOrEdit
		 * @return SmartGroupMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intGroupId = QApplication::PathInfo(0);
			return SmartGroupMetaControl::Create($objParentObject, $intGroupId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SmartGroupMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SmartGroup object creation - defaults to CreateOrEdit
		 * @return SmartGroupMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intGroupId = QApplication::QueryString('intGroupId');
			return SmartGroupMetaControl::Create($objParentObject, $intGroupId, $intCreateType);
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
				if (($this->objSmartGroup->Group) && ($this->objSmartGroup->Group->Id == $objGroup->Id))
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
			$this->lblGroupId->Text = ($this->objSmartGroup->Group) ? $this->objSmartGroup->Group->__toString() : null;
			$this->lblGroupId->Required = true;
			return $this->lblGroupId;
		}

		/**
		 * Create and setup QListBox lstSearchQuery
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSearchQuery_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSearchQuery = new QListBox($this->objParentObject, $strControlId);
			$this->lstSearchQuery->Name = QApplication::Translate('Search Query');
			$this->lstSearchQuery->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSearchQueryCursor = SearchQuery::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSearchQuery = SearchQuery::InstantiateCursor($objSearchQueryCursor)) {
				$objListItem = new QListItem($objSearchQuery->__toString(), $objSearchQuery->Id);
				if (($this->objSmartGroup->SearchQuery) && ($this->objSmartGroup->SearchQuery->Id == $objSearchQuery->Id))
					$objListItem->Selected = true;
				$this->lstSearchQuery->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSearchQuery;
		}

		/**
		 * Create and setup QLabel lblSearchQueryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSearchQueryId_Create($strControlId = null) {
			$this->lblSearchQueryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSearchQueryId->Name = QApplication::Translate('Search Query');
			$this->lblSearchQueryId->Text = ($this->objSmartGroup->SearchQuery) ? $this->objSmartGroup->SearchQuery->__toString() : null;
			return $this->lblSearchQueryId;
		}

		/**
		 * Create and setup QTextBox txtQuery
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtQuery_Create($strControlId = null) {
			$this->txtQuery = new QTextBox($this->objParentObject, $strControlId);
			$this->txtQuery->Name = QApplication::Translate('Query');
			$this->txtQuery->Text = $this->objSmartGroup->Query;
			$this->txtQuery->TextMode = QTextMode::MultiLine;
			return $this->txtQuery;
		}

		/**
		 * Create and setup QLabel lblQuery
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQuery_Create($strControlId = null) {
			$this->lblQuery = new QLabel($this->objParentObject, $strControlId);
			$this->lblQuery->Name = QApplication::Translate('Query');
			$this->lblQuery->Text = $this->objSmartGroup->Query;
			return $this->lblQuery;
		}

		/**
		 * Create and setup QDateTimePicker calDateRefreshed
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateRefreshed_Create($strControlId = null) {
			$this->calDateRefreshed = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateRefreshed->Name = QApplication::Translate('Date Refreshed');
			$this->calDateRefreshed->DateTime = $this->objSmartGroup->DateRefreshed;
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
			$this->lblDateRefreshed->Text = sprintf($this->objSmartGroup->DateRefreshed) ? $this->objSmartGroup->DateRefreshed->__toString($this->strDateRefreshedDateTimeFormat) : null;
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
			$this->txtProcessTimeMs->Text = $this->objSmartGroup->ProcessTimeMs;
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
			$this->lblProcessTimeMs->Text = $this->objSmartGroup->ProcessTimeMs;
			$this->lblProcessTimeMs->Format = $strFormat;
			return $this->lblProcessTimeMs;
		}



		/**
		 * Refresh this MetaControl with Data from the local SmartGroup object.
		 * @param boolean $blnReload reload SmartGroup from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objSmartGroup->Reload();

			if ($this->lstGroup) {
					$this->lstGroup->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupArray = Group::LoadAll();
				if ($objGroupArray) foreach ($objGroupArray as $objGroup) {
					$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
					if (($this->objSmartGroup->Group) && ($this->objSmartGroup->Group->Id == $objGroup->Id))
						$objListItem->Selected = true;
					$this->lstGroup->AddItem($objListItem);
				}
			}
			if ($this->lblGroupId) $this->lblGroupId->Text = ($this->objSmartGroup->Group) ? $this->objSmartGroup->Group->__toString() : null;

			if ($this->lstSearchQuery) {
					$this->lstSearchQuery->RemoveAllItems();
				$this->lstSearchQuery->AddItem(QApplication::Translate('- Select One -'), null);
				$objSearchQueryArray = SearchQuery::LoadAll();
				if ($objSearchQueryArray) foreach ($objSearchQueryArray as $objSearchQuery) {
					$objListItem = new QListItem($objSearchQuery->__toString(), $objSearchQuery->Id);
					if (($this->objSmartGroup->SearchQuery) && ($this->objSmartGroup->SearchQuery->Id == $objSearchQuery->Id))
						$objListItem->Selected = true;
					$this->lstSearchQuery->AddItem($objListItem);
				}
			}
			if ($this->lblSearchQueryId) $this->lblSearchQueryId->Text = ($this->objSmartGroup->SearchQuery) ? $this->objSmartGroup->SearchQuery->__toString() : null;

			if ($this->txtQuery) $this->txtQuery->Text = $this->objSmartGroup->Query;
			if ($this->lblQuery) $this->lblQuery->Text = $this->objSmartGroup->Query;

			if ($this->calDateRefreshed) $this->calDateRefreshed->DateTime = $this->objSmartGroup->DateRefreshed;
			if ($this->lblDateRefreshed) $this->lblDateRefreshed->Text = sprintf($this->objSmartGroup->DateRefreshed) ? $this->objSmartGroup->__toString($this->strDateRefreshedDateTimeFormat) : null;

			if ($this->txtProcessTimeMs) $this->txtProcessTimeMs->Text = $this->objSmartGroup->ProcessTimeMs;
			if ($this->lblProcessTimeMs) $this->lblProcessTimeMs->Text = $this->objSmartGroup->ProcessTimeMs;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SMARTGROUP OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's SmartGroup instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveSmartGroup() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstGroup) $this->objSmartGroup->GroupId = $this->lstGroup->SelectedValue;
				if ($this->lstSearchQuery) $this->objSmartGroup->SearchQueryId = $this->lstSearchQuery->SelectedValue;
				if ($this->txtQuery) $this->objSmartGroup->Query = $this->txtQuery->Text;
				if ($this->calDateRefreshed) $this->objSmartGroup->DateRefreshed = $this->calDateRefreshed->DateTime;
				if ($this->txtProcessTimeMs) $this->objSmartGroup->ProcessTimeMs = $this->txtProcessTimeMs->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the SmartGroup object
				$this->objSmartGroup->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's SmartGroup instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteSmartGroup() {
			$this->objSmartGroup->Delete();
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
				case 'SmartGroup': return $this->objSmartGroup;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to SmartGroup fields -- will be created dynamically if not yet created
				case 'GroupIdControl':
					if (!$this->lstGroup) return $this->lstGroup_Create();
					return $this->lstGroup;
				case 'GroupIdLabel':
					if (!$this->lblGroupId) return $this->lblGroupId_Create();
					return $this->lblGroupId;
				case 'SearchQueryIdControl':
					if (!$this->lstSearchQuery) return $this->lstSearchQuery_Create();
					return $this->lstSearchQuery;
				case 'SearchQueryIdLabel':
					if (!$this->lblSearchQueryId) return $this->lblSearchQueryId_Create();
					return $this->lblSearchQueryId;
				case 'QueryControl':
					if (!$this->txtQuery) return $this->txtQuery_Create();
					return $this->txtQuery;
				case 'QueryLabel':
					if (!$this->lblQuery) return $this->lblQuery_Create();
					return $this->lblQuery;
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
					// Controls that point to SmartGroup fields
					case 'GroupIdControl':
						return ($this->lstGroup = QType::Cast($mixValue, 'QControl'));
					case 'SearchQueryIdControl':
						return ($this->lstSearchQuery = QType::Cast($mixValue, 'QControl'));
					case 'QueryControl':
						return ($this->txtQuery = QType::Cast($mixValue, 'QControl'));
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