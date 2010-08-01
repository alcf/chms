<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the QueryCondition class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single QueryCondition object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a QueryConditionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read QueryCondition $QueryCondition the actual QueryCondition data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $SearchQueryControl
	 * property-read QLabel $SearchQueryLabel
	 * property QListBox $QueryConditionTypeIdControl
	 * property-read QLabel $QueryConditionTypeIdLabel
	 * property QListBox $QueryNodeControl
	 * property-read QLabel $QueryNodeLabel
	 * property QTextBox $ValueControl
	 * property-read QLabel $ValueLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class QueryConditionMetaControlGen extends QBaseClass {
		// General Variables
		protected $objQueryCondition;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of QueryCondition's individual data fields
		protected $lblId;
		protected $lstSearchQueryObject;
		protected $lstQueryConditionType;
		protected $lstQueryNodeObject;
		protected $txtValue;

		// Controls that allow the viewing of QueryCondition's individual data fields
		protected $lblSearchQuery;
		protected $lblQueryConditionTypeId;
		protected $lblQueryNode;
		protected $lblValue;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * QueryConditionMetaControl to edit a single QueryCondition object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single QueryCondition object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryConditionMetaControl
		 * @param QueryCondition $objQueryCondition new or existing QueryCondition object
		 */
		 public function __construct($objParentObject, QueryCondition $objQueryCondition) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this QueryConditionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked QueryCondition object
			$this->objQueryCondition = $objQueryCondition;

			// Figure out if we're Editing or Creating New
			if ($this->objQueryCondition->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryConditionMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing QueryCondition object creation - defaults to CreateOrEdit
 		 * @return QueryConditionMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objQueryCondition = QueryCondition::Load($intId);

				// QueryCondition was found -- return it!
				if ($objQueryCondition)
					return new QueryConditionMetaControl($objParentObject, $objQueryCondition);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a QueryCondition object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new QueryConditionMetaControl($objParentObject, new QueryCondition());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryConditionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing QueryCondition object creation - defaults to CreateOrEdit
		 * @return QueryConditionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return QueryConditionMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryConditionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing QueryCondition object creation - defaults to CreateOrEdit
		 * @return QueryConditionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return QueryConditionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objQueryCondition->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstSearchQueryObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSearchQueryObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSearchQueryObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstSearchQueryObject->Name = QApplication::Translate('Search Query Object');
			$this->lstSearchQueryObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstSearchQueryObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSearchQueryObjectCursor = SearchQuery::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSearchQueryObject = SearchQuery::InstantiateCursor($objSearchQueryObjectCursor)) {
				$objListItem = new QListItem($objSearchQueryObject->__toString(), $objSearchQueryObject->Id);
				if (($this->objQueryCondition->SearchQueryObject) && ($this->objQueryCondition->SearchQueryObject->Id == $objSearchQueryObject->Id))
					$objListItem->Selected = true;
				$this->lstSearchQueryObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSearchQueryObject;
		}

		/**
		 * Create and setup QLabel lblSearchQuery
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSearchQuery_Create($strControlId = null) {
			$this->lblSearchQuery = new QLabel($this->objParentObject, $strControlId);
			$this->lblSearchQuery->Name = QApplication::Translate('Search Query Object');
			$this->lblSearchQuery->Text = ($this->objQueryCondition->SearchQueryObject) ? $this->objQueryCondition->SearchQueryObject->__toString() : null;
			$this->lblSearchQuery->Required = true;
			return $this->lblSearchQuery;
		}

		/**
		 * Create and setup QListBox lstQueryConditionType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstQueryConditionType_Create($strControlId = null) {
			$this->lstQueryConditionType = new QListBox($this->objParentObject, $strControlId);
			$this->lstQueryConditionType->Name = QApplication::Translate('Query Condition Type');
			$this->lstQueryConditionType->Required = true;
			foreach (QueryConditionType::$NameArray as $intId => $strValue)
				$this->lstQueryConditionType->AddItem(new QListItem($strValue, $intId, $this->objQueryCondition->QueryConditionTypeId == $intId));
			return $this->lstQueryConditionType;
		}

		/**
		 * Create and setup QLabel lblQueryConditionTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQueryConditionTypeId_Create($strControlId = null) {
			$this->lblQueryConditionTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblQueryConditionTypeId->Name = QApplication::Translate('Query Condition Type');
			$this->lblQueryConditionTypeId->Text = ($this->objQueryCondition->QueryConditionTypeId) ? QueryConditionType::$NameArray[$this->objQueryCondition->QueryConditionTypeId] : null;
			$this->lblQueryConditionTypeId->Required = true;
			return $this->lblQueryConditionTypeId;
		}

		/**
		 * Create and setup QListBox lstQueryNodeObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstQueryNodeObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstQueryNodeObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstQueryNodeObject->Name = QApplication::Translate('Query Node Object');
			$this->lstQueryNodeObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstQueryNodeObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objQueryNodeObjectCursor = QueryNode::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objQueryNodeObject = QueryNode::InstantiateCursor($objQueryNodeObjectCursor)) {
				$objListItem = new QListItem($objQueryNodeObject->__toString(), $objQueryNodeObject->Id);
				if (($this->objQueryCondition->QueryNodeObject) && ($this->objQueryCondition->QueryNodeObject->Id == $objQueryNodeObject->Id))
					$objListItem->Selected = true;
				$this->lstQueryNodeObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstQueryNodeObject;
		}

		/**
		 * Create and setup QLabel lblQueryNode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQueryNode_Create($strControlId = null) {
			$this->lblQueryNode = new QLabel($this->objParentObject, $strControlId);
			$this->lblQueryNode->Name = QApplication::Translate('Query Node Object');
			$this->lblQueryNode->Text = ($this->objQueryCondition->QueryNodeObject) ? $this->objQueryCondition->QueryNodeObject->__toString() : null;
			$this->lblQueryNode->Required = true;
			return $this->lblQueryNode;
		}

		/**
		 * Create and setup QTextBox txtValue
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtValue_Create($strControlId = null) {
			$this->txtValue = new QTextBox($this->objParentObject, $strControlId);
			$this->txtValue->Name = QApplication::Translate('Value');
			$this->txtValue->Text = $this->objQueryCondition->Value;
			$this->txtValue->MaxLength = QueryCondition::ValueMaxLength;
			return $this->txtValue;
		}

		/**
		 * Create and setup QLabel lblValue
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblValue_Create($strControlId = null) {
			$this->lblValue = new QLabel($this->objParentObject, $strControlId);
			$this->lblValue->Name = QApplication::Translate('Value');
			$this->lblValue->Text = $this->objQueryCondition->Value;
			return $this->lblValue;
		}



		/**
		 * Refresh this MetaControl with Data from the local QueryCondition object.
		 * @param boolean $blnReload reload QueryCondition from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objQueryCondition->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objQueryCondition->Id;

			if ($this->lstSearchQueryObject) {
					$this->lstSearchQueryObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstSearchQueryObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objSearchQueryObjectArray = SearchQuery::LoadAll();
				if ($objSearchQueryObjectArray) foreach ($objSearchQueryObjectArray as $objSearchQueryObject) {
					$objListItem = new QListItem($objSearchQueryObject->__toString(), $objSearchQueryObject->Id);
					if (($this->objQueryCondition->SearchQueryObject) && ($this->objQueryCondition->SearchQueryObject->Id == $objSearchQueryObject->Id))
						$objListItem->Selected = true;
					$this->lstSearchQueryObject->AddItem($objListItem);
				}
			}
			if ($this->lblSearchQuery) $this->lblSearchQuery->Text = ($this->objQueryCondition->SearchQueryObject) ? $this->objQueryCondition->SearchQueryObject->__toString() : null;

			if ($this->lstQueryConditionType) $this->lstQueryConditionType->SelectedValue = $this->objQueryCondition->QueryConditionTypeId;
			if ($this->lblQueryConditionTypeId) $this->lblQueryConditionTypeId->Text = ($this->objQueryCondition->QueryConditionTypeId) ? QueryConditionType::$NameArray[$this->objQueryCondition->QueryConditionTypeId] : null;

			if ($this->lstQueryNodeObject) {
					$this->lstQueryNodeObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstQueryNodeObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objQueryNodeObjectArray = QueryNode::LoadAll();
				if ($objQueryNodeObjectArray) foreach ($objQueryNodeObjectArray as $objQueryNodeObject) {
					$objListItem = new QListItem($objQueryNodeObject->__toString(), $objQueryNodeObject->Id);
					if (($this->objQueryCondition->QueryNodeObject) && ($this->objQueryCondition->QueryNodeObject->Id == $objQueryNodeObject->Id))
						$objListItem->Selected = true;
					$this->lstQueryNodeObject->AddItem($objListItem);
				}
			}
			if ($this->lblQueryNode) $this->lblQueryNode->Text = ($this->objQueryCondition->QueryNodeObject) ? $this->objQueryCondition->QueryNodeObject->__toString() : null;

			if ($this->txtValue) $this->txtValue->Text = $this->objQueryCondition->Value;
			if ($this->lblValue) $this->lblValue->Text = $this->objQueryCondition->Value;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC QUERYCONDITION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's QueryCondition instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveQueryCondition() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstSearchQueryObject) $this->objQueryCondition->SearchQuery = $this->lstSearchQueryObject->SelectedValue;
				if ($this->lstQueryConditionType) $this->objQueryCondition->QueryConditionTypeId = $this->lstQueryConditionType->SelectedValue;
				if ($this->lstQueryNodeObject) $this->objQueryCondition->QueryNode = $this->lstQueryNodeObject->SelectedValue;
				if ($this->txtValue) $this->objQueryCondition->Value = $this->txtValue->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the QueryCondition object
				$this->objQueryCondition->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's QueryCondition instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteQueryCondition() {
			$this->objQueryCondition->Delete();
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
				case 'QueryCondition': return $this->objQueryCondition;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to QueryCondition fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'SearchQueryControl':
					if (!$this->lstSearchQueryObject) return $this->lstSearchQueryObject_Create();
					return $this->lstSearchQueryObject;
				case 'SearchQueryLabel':
					if (!$this->lblSearchQuery) return $this->lblSearchQuery_Create();
					return $this->lblSearchQuery;
				case 'QueryConditionTypeIdControl':
					if (!$this->lstQueryConditionType) return $this->lstQueryConditionType_Create();
					return $this->lstQueryConditionType;
				case 'QueryConditionTypeIdLabel':
					if (!$this->lblQueryConditionTypeId) return $this->lblQueryConditionTypeId_Create();
					return $this->lblQueryConditionTypeId;
				case 'QueryNodeControl':
					if (!$this->lstQueryNodeObject) return $this->lstQueryNodeObject_Create();
					return $this->lstQueryNodeObject;
				case 'QueryNodeLabel':
					if (!$this->lblQueryNode) return $this->lblQueryNode_Create();
					return $this->lblQueryNode;
				case 'ValueControl':
					if (!$this->txtValue) return $this->txtValue_Create();
					return $this->txtValue;
				case 'ValueLabel':
					if (!$this->lblValue) return $this->lblValue_Create();
					return $this->lblValue;
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
					// Controls that point to QueryCondition fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'SearchQueryControl':
						return ($this->lstSearchQueryObject = QType::Cast($mixValue, 'QControl'));
					case 'QueryConditionTypeIdControl':
						return ($this->lstQueryConditionType = QType::Cast($mixValue, 'QControl'));
					case 'QueryNodeControl':
						return ($this->lstQueryNodeObject = QType::Cast($mixValue, 'QControl'));
					case 'ValueControl':
						return ($this->txtValue = QType::Cast($mixValue, 'QControl'));
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