<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the SearchQuery class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single SearchQuery object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SearchQueryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read SearchQuery $SearchQuery the actual SearchQuery data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QListBox $SmartGroupControl
	 * property-read QLabel $SmartGroupLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class SearchQueryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var SearchQuery objSearchQuery
		 * @access protected
		 */
		protected $objSearchQuery;

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

		// Controls that allow the editing of SearchQuery's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;


		// Controls that allow the viewing of SearchQuery's individual data fields
        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstSmartGroup
         * @access protected
         */
		protected $lstSmartGroup;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblSmartGroup
         * @access protected
         */
		protected $lblSmartGroup;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * SearchQueryMetaControl to edit a single SearchQuery object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single SearchQuery object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SearchQueryMetaControl
		 * @param SearchQuery $objSearchQuery new or existing SearchQuery object
		 */
		 public function __construct($objParentObject, SearchQuery $objSearchQuery) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this SearchQueryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked SearchQuery object
			$this->objSearchQuery = $objSearchQuery;

			// Figure out if we're Editing or Creating New
			if ($this->objSearchQuery->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this SearchQueryMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing SearchQuery object creation - defaults to CreateOrEdit
 		 * @return SearchQueryMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objSearchQuery = SearchQuery::Load($intId);

				// SearchQuery was found -- return it!
				if ($objSearchQuery)
					return new SearchQueryMetaControl($objParentObject, $objSearchQuery);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a SearchQuery object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new SearchQueryMetaControl($objParentObject, new SearchQuery());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SearchQueryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SearchQuery object creation - defaults to CreateOrEdit
		 * @return SearchQueryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return SearchQueryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SearchQueryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SearchQuery object creation - defaults to CreateOrEdit
		 * @return SearchQueryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return SearchQueryMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objSearchQuery->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objSearchQuery->Description;
			$this->txtDescription->TextMode = QTextMode::MultiLine;
			return $this->txtDescription;
		}

		/**
		 * Create and setup QLabel lblDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescription_Create($strControlId = null) {
			$this->lblDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescription->Name = QApplication::Translate('Description');
			$this->lblDescription->Text = $this->objSearchQuery->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QListBox lstSmartGroup
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSmartGroup_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSmartGroup = new QListBox($this->objParentObject, $strControlId);
			$this->lstSmartGroup->Name = QApplication::Translate('Smart Group');
			$this->lstSmartGroup->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSmartGroupCursor = SmartGroup::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSmartGroup = SmartGroup::InstantiateCursor($objSmartGroupCursor)) {
				$objListItem = new QListItem($objSmartGroup->__toString(), $objSmartGroup->GroupId);
				if ($objSmartGroup->SearchQueryId == $this->objSearchQuery->Id)
					$objListItem->Selected = true;
				$this->lstSmartGroup->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSmartGroup;
		}

		/**
		 * Create and setup QLabel lblSmartGroup
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSmartGroup_Create($strControlId = null) {
			$this->lblSmartGroup = new QLabel($this->objParentObject, $strControlId);
			$this->lblSmartGroup->Name = QApplication::Translate('Smart Group');
			$this->lblSmartGroup->Text = ($this->objSearchQuery->SmartGroup) ? $this->objSearchQuery->SmartGroup->__toString() : null;
			return $this->lblSmartGroup;
		}



		/**
		 * Refresh this MetaControl with Data from the local SearchQuery object.
		 * @param boolean $blnReload reload SearchQuery from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objSearchQuery->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objSearchQuery->Id;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objSearchQuery->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objSearchQuery->Description;

			if ($this->lstSmartGroup) {
				$this->lstSmartGroup->RemoveAllItems();
				$this->lstSmartGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objSmartGroupArray = SmartGroup::LoadAll();
				if ($objSmartGroupArray) foreach ($objSmartGroupArray as $objSmartGroup) {
					$objListItem = new QListItem($objSmartGroup->__toString(), $objSmartGroup->GroupId);
					if ($objSmartGroup->SearchQueryId == $this->objSearchQuery->Id)
						$objListItem->Selected = true;
					$this->lstSmartGroup->AddItem($objListItem);
				}
			}
			if ($this->lblSmartGroup) $this->lblSmartGroup->Text = ($this->objSearchQuery->SmartGroup) ? $this->objSearchQuery->SmartGroup->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SEARCHQUERY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's SearchQuery instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveSearchQuery() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtDescription) $this->objSearchQuery->Description = $this->txtDescription->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstSmartGroup) $this->objSearchQuery->SmartGroup = SmartGroup::Load($this->lstSmartGroup->SelectedValue);

				// Save the SearchQuery object
				$this->objSearchQuery->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's SearchQuery instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteSearchQuery() {
			$this->objSearchQuery->Delete();
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
				case 'SearchQuery': return $this->objSearchQuery;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to SearchQuery fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'SmartGroupControl':
					if (!$this->lstSmartGroup) return $this->lstSmartGroup_Create();
					return $this->lstSmartGroup;
				case 'SmartGroupLabel':
					if (!$this->lblSmartGroup) return $this->lblSmartGroup_Create();
					return $this->lblSmartGroup;
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
					// Controls that point to SearchQuery fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'SmartGroupControl':
						return ($this->lstSmartGroup = QType::Cast($mixValue, 'QControl'));
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