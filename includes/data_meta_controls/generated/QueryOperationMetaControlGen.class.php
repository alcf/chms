<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the QueryOperation class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single QueryOperation object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a QueryOperationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read QueryOperation $QueryOperation the actual QueryOperation data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $QueryDataTypeBitmapControl
	 * property-read QLabel $QueryDataTypeBitmapLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $QqFactoryNameControl
	 * property-read QLabel $QqFactoryNameLabel
	 * property QCheckBox $ArgumentFlagControl
	 * property-read QLabel $ArgumentFlagLabel
	 * property QTextBox $ArgumentPrependControl
	 * property-read QLabel $ArgumentPrependLabel
	 * property QTextBox $ArgumentPostpendControl
	 * property-read QLabel $ArgumentPostpendLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class QueryOperationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var QueryOperation objQueryOperation
		 * @access protected
		 */
		protected $objQueryOperation;

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

		// Controls that allow the editing of QueryOperation's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QIntegerTextBox txtQueryDataTypeBitmap;
         * @access protected
         */
		protected $txtQueryDataTypeBitmap;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QTextBox txtQqFactoryName;
         * @access protected
         */
		protected $txtQqFactoryName;

        /**
         * @var QCheckBox chkArgumentFlag;
         * @access protected
         */
		protected $chkArgumentFlag;

        /**
         * @var QTextBox txtArgumentPrepend;
         * @access protected
         */
		protected $txtArgumentPrepend;

        /**
         * @var QTextBox txtArgumentPostpend;
         * @access protected
         */
		protected $txtArgumentPostpend;


		// Controls that allow the viewing of QueryOperation's individual data fields
        /**
         * @var QLabel lblQueryDataTypeBitmap
         * @access protected
         */
		protected $lblQueryDataTypeBitmap;

        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblQqFactoryName
         * @access protected
         */
		protected $lblQqFactoryName;

        /**
         * @var QLabel lblArgumentFlag
         * @access protected
         */
		protected $lblArgumentFlag;

        /**
         * @var QLabel lblArgumentPrepend
         * @access protected
         */
		protected $lblArgumentPrepend;

        /**
         * @var QLabel lblArgumentPostpend
         * @access protected
         */
		protected $lblArgumentPostpend;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * QueryOperationMetaControl to edit a single QueryOperation object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single QueryOperation object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryOperationMetaControl
		 * @param QueryOperation $objQueryOperation new or existing QueryOperation object
		 */
		 public function __construct($objParentObject, QueryOperation $objQueryOperation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this QueryOperationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked QueryOperation object
			$this->objQueryOperation = $objQueryOperation;

			// Figure out if we're Editing or Creating New
			if ($this->objQueryOperation->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryOperationMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing QueryOperation object creation - defaults to CreateOrEdit
 		 * @return QueryOperationMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objQueryOperation = QueryOperation::Load($intId);

				// QueryOperation was found -- return it!
				if ($objQueryOperation)
					return new QueryOperationMetaControl($objParentObject, $objQueryOperation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a QueryOperation object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new QueryOperationMetaControl($objParentObject, new QueryOperation());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryOperationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing QueryOperation object creation - defaults to CreateOrEdit
		 * @return QueryOperationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return QueryOperationMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QueryOperationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing QueryOperation object creation - defaults to CreateOrEdit
		 * @return QueryOperationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return QueryOperationMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objQueryOperation->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtQueryDataTypeBitmap
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtQueryDataTypeBitmap_Create($strControlId = null) {
			$this->txtQueryDataTypeBitmap = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtQueryDataTypeBitmap->Name = QApplication::Translate('Query Data Type Bitmap');
			$this->txtQueryDataTypeBitmap->Text = $this->objQueryOperation->QueryDataTypeBitmap;
			$this->txtQueryDataTypeBitmap->Required = true;
			return $this->txtQueryDataTypeBitmap;
		}

		/**
		 * Create and setup QLabel lblQueryDataTypeBitmap
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblQueryDataTypeBitmap_Create($strControlId = null, $strFormat = null) {
			$this->lblQueryDataTypeBitmap = new QLabel($this->objParentObject, $strControlId);
			$this->lblQueryDataTypeBitmap->Name = QApplication::Translate('Query Data Type Bitmap');
			$this->lblQueryDataTypeBitmap->Text = $this->objQueryOperation->QueryDataTypeBitmap;
			$this->lblQueryDataTypeBitmap->Required = true;
			$this->lblQueryDataTypeBitmap->Format = $strFormat;
			return $this->lblQueryDataTypeBitmap;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objQueryOperation->Name;
			$this->txtName->Required = true;
			$this->txtName->MaxLength = QueryOperation::NameMaxLength;
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
			$this->lblName->Text = $this->objQueryOperation->Name;
			$this->lblName->Required = true;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtQqFactoryName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtQqFactoryName_Create($strControlId = null) {
			$this->txtQqFactoryName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtQqFactoryName->Name = QApplication::Translate('Qq Factory Name');
			$this->txtQqFactoryName->Text = $this->objQueryOperation->QqFactoryName;
			$this->txtQqFactoryName->Required = true;
			$this->txtQqFactoryName->MaxLength = QueryOperation::QqFactoryNameMaxLength;
			return $this->txtQqFactoryName;
		}

		/**
		 * Create and setup QLabel lblQqFactoryName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQqFactoryName_Create($strControlId = null) {
			$this->lblQqFactoryName = new QLabel($this->objParentObject, $strControlId);
			$this->lblQqFactoryName->Name = QApplication::Translate('Qq Factory Name');
			$this->lblQqFactoryName->Text = $this->objQueryOperation->QqFactoryName;
			$this->lblQqFactoryName->Required = true;
			return $this->lblQqFactoryName;
		}

		/**
		 * Create and setup QCheckBox chkArgumentFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkArgumentFlag_Create($strControlId = null) {
			$this->chkArgumentFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkArgumentFlag->Name = QApplication::Translate('Argument Flag');
			$this->chkArgumentFlag->Checked = $this->objQueryOperation->ArgumentFlag;
			return $this->chkArgumentFlag;
		}

		/**
		 * Create and setup QLabel lblArgumentFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblArgumentFlag_Create($strControlId = null) {
			$this->lblArgumentFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblArgumentFlag->Name = QApplication::Translate('Argument Flag');
			$this->lblArgumentFlag->Text = ($this->objQueryOperation->ArgumentFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblArgumentFlag;
		}

		/**
		 * Create and setup QTextBox txtArgumentPrepend
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtArgumentPrepend_Create($strControlId = null) {
			$this->txtArgumentPrepend = new QTextBox($this->objParentObject, $strControlId);
			$this->txtArgumentPrepend->Name = QApplication::Translate('Argument Prepend');
			$this->txtArgumentPrepend->Text = $this->objQueryOperation->ArgumentPrepend;
			$this->txtArgumentPrepend->MaxLength = QueryOperation::ArgumentPrependMaxLength;
			return $this->txtArgumentPrepend;
		}

		/**
		 * Create and setup QLabel lblArgumentPrepend
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblArgumentPrepend_Create($strControlId = null) {
			$this->lblArgumentPrepend = new QLabel($this->objParentObject, $strControlId);
			$this->lblArgumentPrepend->Name = QApplication::Translate('Argument Prepend');
			$this->lblArgumentPrepend->Text = $this->objQueryOperation->ArgumentPrepend;
			return $this->lblArgumentPrepend;
		}

		/**
		 * Create and setup QTextBox txtArgumentPostpend
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtArgumentPostpend_Create($strControlId = null) {
			$this->txtArgumentPostpend = new QTextBox($this->objParentObject, $strControlId);
			$this->txtArgumentPostpend->Name = QApplication::Translate('Argument Postpend');
			$this->txtArgumentPostpend->Text = $this->objQueryOperation->ArgumentPostpend;
			$this->txtArgumentPostpend->MaxLength = QueryOperation::ArgumentPostpendMaxLength;
			return $this->txtArgumentPostpend;
		}

		/**
		 * Create and setup QLabel lblArgumentPostpend
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblArgumentPostpend_Create($strControlId = null) {
			$this->lblArgumentPostpend = new QLabel($this->objParentObject, $strControlId);
			$this->lblArgumentPostpend->Name = QApplication::Translate('Argument Postpend');
			$this->lblArgumentPostpend->Text = $this->objQueryOperation->ArgumentPostpend;
			return $this->lblArgumentPostpend;
		}



		/**
		 * Refresh this MetaControl with Data from the local QueryOperation object.
		 * @param boolean $blnReload reload QueryOperation from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objQueryOperation->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objQueryOperation->Id;

			if ($this->txtQueryDataTypeBitmap) $this->txtQueryDataTypeBitmap->Text = $this->objQueryOperation->QueryDataTypeBitmap;
			if ($this->lblQueryDataTypeBitmap) $this->lblQueryDataTypeBitmap->Text = $this->objQueryOperation->QueryDataTypeBitmap;

			if ($this->txtName) $this->txtName->Text = $this->objQueryOperation->Name;
			if ($this->lblName) $this->lblName->Text = $this->objQueryOperation->Name;

			if ($this->txtQqFactoryName) $this->txtQqFactoryName->Text = $this->objQueryOperation->QqFactoryName;
			if ($this->lblQqFactoryName) $this->lblQqFactoryName->Text = $this->objQueryOperation->QqFactoryName;

			if ($this->chkArgumentFlag) $this->chkArgumentFlag->Checked = $this->objQueryOperation->ArgumentFlag;
			if ($this->lblArgumentFlag) $this->lblArgumentFlag->Text = ($this->objQueryOperation->ArgumentFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtArgumentPrepend) $this->txtArgumentPrepend->Text = $this->objQueryOperation->ArgumentPrepend;
			if ($this->lblArgumentPrepend) $this->lblArgumentPrepend->Text = $this->objQueryOperation->ArgumentPrepend;

			if ($this->txtArgumentPostpend) $this->txtArgumentPostpend->Text = $this->objQueryOperation->ArgumentPostpend;
			if ($this->lblArgumentPostpend) $this->lblArgumentPostpend->Text = $this->objQueryOperation->ArgumentPostpend;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC QUERYOPERATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's QueryOperation instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveQueryOperation() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtQueryDataTypeBitmap) $this->objQueryOperation->QueryDataTypeBitmap = $this->txtQueryDataTypeBitmap->Text;
				if ($this->txtName) $this->objQueryOperation->Name = $this->txtName->Text;
				if ($this->txtQqFactoryName) $this->objQueryOperation->QqFactoryName = $this->txtQqFactoryName->Text;
				if ($this->chkArgumentFlag) $this->objQueryOperation->ArgumentFlag = $this->chkArgumentFlag->Checked;
				if ($this->txtArgumentPrepend) $this->objQueryOperation->ArgumentPrepend = $this->txtArgumentPrepend->Text;
				if ($this->txtArgumentPostpend) $this->objQueryOperation->ArgumentPostpend = $this->txtArgumentPostpend->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the QueryOperation object
				$this->objQueryOperation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's QueryOperation instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteQueryOperation() {
			$this->objQueryOperation->Delete();
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
				case 'QueryOperation': return $this->objQueryOperation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to QueryOperation fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'QueryDataTypeBitmapControl':
					if (!$this->txtQueryDataTypeBitmap) return $this->txtQueryDataTypeBitmap_Create();
					return $this->txtQueryDataTypeBitmap;
				case 'QueryDataTypeBitmapLabel':
					if (!$this->lblQueryDataTypeBitmap) return $this->lblQueryDataTypeBitmap_Create();
					return $this->lblQueryDataTypeBitmap;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'QqFactoryNameControl':
					if (!$this->txtQqFactoryName) return $this->txtQqFactoryName_Create();
					return $this->txtQqFactoryName;
				case 'QqFactoryNameLabel':
					if (!$this->lblQqFactoryName) return $this->lblQqFactoryName_Create();
					return $this->lblQqFactoryName;
				case 'ArgumentFlagControl':
					if (!$this->chkArgumentFlag) return $this->chkArgumentFlag_Create();
					return $this->chkArgumentFlag;
				case 'ArgumentFlagLabel':
					if (!$this->lblArgumentFlag) return $this->lblArgumentFlag_Create();
					return $this->lblArgumentFlag;
				case 'ArgumentPrependControl':
					if (!$this->txtArgumentPrepend) return $this->txtArgumentPrepend_Create();
					return $this->txtArgumentPrepend;
				case 'ArgumentPrependLabel':
					if (!$this->lblArgumentPrepend) return $this->lblArgumentPrepend_Create();
					return $this->lblArgumentPrepend;
				case 'ArgumentPostpendControl':
					if (!$this->txtArgumentPostpend) return $this->txtArgumentPostpend_Create();
					return $this->txtArgumentPostpend;
				case 'ArgumentPostpendLabel':
					if (!$this->lblArgumentPostpend) return $this->lblArgumentPostpend_Create();
					return $this->lblArgumentPostpend;
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
					// Controls that point to QueryOperation fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'QueryDataTypeBitmapControl':
						return ($this->txtQueryDataTypeBitmap = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'QqFactoryNameControl':
						return ($this->txtQqFactoryName = QType::Cast($mixValue, 'QControl'));
					case 'ArgumentFlagControl':
						return ($this->chkArgumentFlag = QType::Cast($mixValue, 'QControl'));
					case 'ArgumentPrependControl':
						return ($this->txtArgumentPrepend = QType::Cast($mixValue, 'QControl'));
					case 'ArgumentPostpendControl':
						return ($this->txtArgumentPostpend = QType::Cast($mixValue, 'QControl'));
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