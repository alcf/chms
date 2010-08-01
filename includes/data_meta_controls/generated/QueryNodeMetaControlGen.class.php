<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the QueryNode class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single QueryNode object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a QueryNodeMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read QueryNode $QueryNode the actual QueryNode data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $QcodoQueryNodeControl
	 * property-read QLabel $QcodoQueryNodeLabel
	 * property QTextBox $DataTypeControl
	 * property-read QLabel $DataTypeLabel
	 * property QTextBox $QcodoQueryConditionControl
	 * property-read QLabel $QcodoQueryConditionLabel
	 * property QCheckBox $RequiresDistinctFlagControl
	 * property-read QLabel $RequiresDistinctFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class QueryNodeMetaControlGen extends QBaseClass {
		// General Variables
		protected $objQueryNode;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of QueryNode's individual data fields
		protected $lblId;
		protected $txtName;
		protected $txtQcodoQueryNode;
		protected $txtDataType;
		protected $txtQcodoQueryCondition;
		protected $chkRequiresDistinctFlag;

		// Controls that allow the viewing of QueryNode's individual data fields
		protected $lblName;
		protected $lblQcodoQueryNode;
		protected $lblDataType;
		protected $lblQcodoQueryCondition;
		protected $lblRequiresDistinctFlag;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * QueryNodeMetaControl to edit a single QueryNode object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single QueryNode object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryNodeMetaControl
		 * @param QueryNode $objQueryNode new or existing QueryNode object
		 */
		 public function __construct($objParentObject, QueryNode $objQueryNode) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this QueryNodeMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked QueryNode object
			$this->objQueryNode = $objQueryNode;

			// Figure out if we're Editing or Creating New
			if ($this->objQueryNode->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryNodeMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing QueryNode object creation - defaults to CreateOrEdit
 		 * @return QueryNodeMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objQueryNode = QueryNode::Load($intId);

				// QueryNode was found -- return it!
				if ($objQueryNode)
					return new QueryNodeMetaControl($objParentObject, $objQueryNode);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a QueryNode object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new QueryNodeMetaControl($objParentObject, new QueryNode());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryNodeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing QueryNode object creation - defaults to CreateOrEdit
		 * @return QueryNodeMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return QueryNodeMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryNodeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing QueryNode object creation - defaults to CreateOrEdit
		 * @return QueryNodeMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return QueryNodeMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objQueryNode->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objQueryNode->Name;
			$this->txtName->MaxLength = QueryNode::NameMaxLength;
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
			$this->lblName->Text = $this->objQueryNode->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtQcodoQueryNode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtQcodoQueryNode_Create($strControlId = null) {
			$this->txtQcodoQueryNode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtQcodoQueryNode->Name = QApplication::Translate('Qcodo Query Node');
			$this->txtQcodoQueryNode->Text = $this->objQueryNode->QcodoQueryNode;
			$this->txtQcodoQueryNode->TextMode = QTextMode::MultiLine;
			return $this->txtQcodoQueryNode;
		}

		/**
		 * Create and setup QLabel lblQcodoQueryNode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQcodoQueryNode_Create($strControlId = null) {
			$this->lblQcodoQueryNode = new QLabel($this->objParentObject, $strControlId);
			$this->lblQcodoQueryNode->Name = QApplication::Translate('Qcodo Query Node');
			$this->lblQcodoQueryNode->Text = $this->objQueryNode->QcodoQueryNode;
			return $this->lblQcodoQueryNode;
		}

		/**
		 * Create and setup QTextBox txtDataType
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDataType_Create($strControlId = null) {
			$this->txtDataType = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDataType->Name = QApplication::Translate('Data Type');
			$this->txtDataType->Text = $this->objQueryNode->DataType;
			$this->txtDataType->MaxLength = QueryNode::DataTypeMaxLength;
			return $this->txtDataType;
		}

		/**
		 * Create and setup QLabel lblDataType
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDataType_Create($strControlId = null) {
			$this->lblDataType = new QLabel($this->objParentObject, $strControlId);
			$this->lblDataType->Name = QApplication::Translate('Data Type');
			$this->lblDataType->Text = $this->objQueryNode->DataType;
			return $this->lblDataType;
		}

		/**
		 * Create and setup QTextBox txtQcodoQueryCondition
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtQcodoQueryCondition_Create($strControlId = null) {
			$this->txtQcodoQueryCondition = new QTextBox($this->objParentObject, $strControlId);
			$this->txtQcodoQueryCondition->Name = QApplication::Translate('Qcodo Query Condition');
			$this->txtQcodoQueryCondition->Text = $this->objQueryNode->QcodoQueryCondition;
			$this->txtQcodoQueryCondition->TextMode = QTextMode::MultiLine;
			return $this->txtQcodoQueryCondition;
		}

		/**
		 * Create and setup QLabel lblQcodoQueryCondition
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQcodoQueryCondition_Create($strControlId = null) {
			$this->lblQcodoQueryCondition = new QLabel($this->objParentObject, $strControlId);
			$this->lblQcodoQueryCondition->Name = QApplication::Translate('Qcodo Query Condition');
			$this->lblQcodoQueryCondition->Text = $this->objQueryNode->QcodoQueryCondition;
			return $this->lblQcodoQueryCondition;
		}

		/**
		 * Create and setup QCheckBox chkRequiresDistinctFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkRequiresDistinctFlag_Create($strControlId = null) {
			$this->chkRequiresDistinctFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkRequiresDistinctFlag->Name = QApplication::Translate('Requires Distinct Flag');
			$this->chkRequiresDistinctFlag->Checked = $this->objQueryNode->RequiresDistinctFlag;
			return $this->chkRequiresDistinctFlag;
		}

		/**
		 * Create and setup QLabel lblRequiresDistinctFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRequiresDistinctFlag_Create($strControlId = null) {
			$this->lblRequiresDistinctFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblRequiresDistinctFlag->Name = QApplication::Translate('Requires Distinct Flag');
			$this->lblRequiresDistinctFlag->Text = ($this->objQueryNode->RequiresDistinctFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblRequiresDistinctFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local QueryNode object.
		 * @param boolean $blnReload reload QueryNode from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objQueryNode->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objQueryNode->Id;

			if ($this->txtName) $this->txtName->Text = $this->objQueryNode->Name;
			if ($this->lblName) $this->lblName->Text = $this->objQueryNode->Name;

			if ($this->txtQcodoQueryNode) $this->txtQcodoQueryNode->Text = $this->objQueryNode->QcodoQueryNode;
			if ($this->lblQcodoQueryNode) $this->lblQcodoQueryNode->Text = $this->objQueryNode->QcodoQueryNode;

			if ($this->txtDataType) $this->txtDataType->Text = $this->objQueryNode->DataType;
			if ($this->lblDataType) $this->lblDataType->Text = $this->objQueryNode->DataType;

			if ($this->txtQcodoQueryCondition) $this->txtQcodoQueryCondition->Text = $this->objQueryNode->QcodoQueryCondition;
			if ($this->lblQcodoQueryCondition) $this->lblQcodoQueryCondition->Text = $this->objQueryNode->QcodoQueryCondition;

			if ($this->chkRequiresDistinctFlag) $this->chkRequiresDistinctFlag->Checked = $this->objQueryNode->RequiresDistinctFlag;
			if ($this->lblRequiresDistinctFlag) $this->lblRequiresDistinctFlag->Text = ($this->objQueryNode->RequiresDistinctFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC QUERYNODE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's QueryNode instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveQueryNode() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objQueryNode->Name = $this->txtName->Text;
				if ($this->txtQcodoQueryNode) $this->objQueryNode->QcodoQueryNode = $this->txtQcodoQueryNode->Text;
				if ($this->txtDataType) $this->objQueryNode->DataType = $this->txtDataType->Text;
				if ($this->txtQcodoQueryCondition) $this->objQueryNode->QcodoQueryCondition = $this->txtQcodoQueryCondition->Text;
				if ($this->chkRequiresDistinctFlag) $this->objQueryNode->RequiresDistinctFlag = $this->chkRequiresDistinctFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the QueryNode object
				$this->objQueryNode->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's QueryNode instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteQueryNode() {
			$this->objQueryNode->Delete();
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
				case 'QueryNode': return $this->objQueryNode;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to QueryNode fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'QcodoQueryNodeControl':
					if (!$this->txtQcodoQueryNode) return $this->txtQcodoQueryNode_Create();
					return $this->txtQcodoQueryNode;
				case 'QcodoQueryNodeLabel':
					if (!$this->lblQcodoQueryNode) return $this->lblQcodoQueryNode_Create();
					return $this->lblQcodoQueryNode;
				case 'DataTypeControl':
					if (!$this->txtDataType) return $this->txtDataType_Create();
					return $this->txtDataType;
				case 'DataTypeLabel':
					if (!$this->lblDataType) return $this->lblDataType_Create();
					return $this->lblDataType;
				case 'QcodoQueryConditionControl':
					if (!$this->txtQcodoQueryCondition) return $this->txtQcodoQueryCondition_Create();
					return $this->txtQcodoQueryCondition;
				case 'QcodoQueryConditionLabel':
					if (!$this->lblQcodoQueryCondition) return $this->lblQcodoQueryCondition_Create();
					return $this->lblQcodoQueryCondition;
				case 'RequiresDistinctFlagControl':
					if (!$this->chkRequiresDistinctFlag) return $this->chkRequiresDistinctFlag_Create();
					return $this->chkRequiresDistinctFlag;
				case 'RequiresDistinctFlagLabel':
					if (!$this->lblRequiresDistinctFlag) return $this->lblRequiresDistinctFlag_Create();
					return $this->lblRequiresDistinctFlag;
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
					// Controls that point to QueryNode fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'QcodoQueryNodeControl':
						return ($this->txtQcodoQueryNode = QType::Cast($mixValue, 'QControl'));
					case 'DataTypeControl':
						return ($this->txtDataType = QType::Cast($mixValue, 'QControl'));
					case 'QcodoQueryConditionControl':
						return ($this->txtQcodoQueryCondition = QType::Cast($mixValue, 'QControl'));
					case 'RequiresDistinctFlagControl':
						return ($this->chkRequiresDistinctFlag = QType::Cast($mixValue, 'QControl'));
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