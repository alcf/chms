<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ClassifiedCategory class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ClassifiedCategory object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ClassifiedCategoryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ClassifiedCategory $ClassifiedCategory the actual ClassifiedCategory data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $TokenControl
	 * property-read QLabel $TokenLabel
	 * property QIntegerTextBox $OrderNumberControl
	 * property-read QLabel $OrderNumberLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QTextBox $InstructionsControl
	 * property-read QLabel $InstructionsLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ClassifiedCategoryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ClassifiedCategory objClassifiedCategory
		 * @access protected
		 */
		protected $objClassifiedCategory;

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

		// Controls that allow the editing of ClassifiedCategory's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QTextBox txtToken;
         * @access protected
         */
		protected $txtToken;

        /**
         * @var QIntegerTextBox txtOrderNumber;
         * @access protected
         */
		protected $txtOrderNumber;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

        /**
         * @var QTextBox txtInstructions;
         * @access protected
         */
		protected $txtInstructions;


		// Controls that allow the viewing of ClassifiedCategory's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblToken
         * @access protected
         */
		protected $lblToken;

        /**
         * @var QLabel lblOrderNumber
         * @access protected
         */
		protected $lblOrderNumber;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

        /**
         * @var QLabel lblInstructions
         * @access protected
         */
		protected $lblInstructions;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ClassifiedCategoryMetaControl to edit a single ClassifiedCategory object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ClassifiedCategory object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassifiedCategoryMetaControl
		 * @param ClassifiedCategory $objClassifiedCategory new or existing ClassifiedCategory object
		 */
		 public function __construct($objParentObject, ClassifiedCategory $objClassifiedCategory) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ClassifiedCategoryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ClassifiedCategory object
			$this->objClassifiedCategory = $objClassifiedCategory;

			// Figure out if we're Editing or Creating New
			if ($this->objClassifiedCategory->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassifiedCategoryMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ClassifiedCategory object creation - defaults to CreateOrEdit
 		 * @return ClassifiedCategoryMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objClassifiedCategory = ClassifiedCategory::Load($intId);

				// ClassifiedCategory was found -- return it!
				if ($objClassifiedCategory)
					return new ClassifiedCategoryMetaControl($objParentObject, $objClassifiedCategory);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ClassifiedCategory object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ClassifiedCategoryMetaControl($objParentObject, new ClassifiedCategory());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassifiedCategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassifiedCategory object creation - defaults to CreateOrEdit
		 * @return ClassifiedCategoryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ClassifiedCategoryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassifiedCategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassifiedCategory object creation - defaults to CreateOrEdit
		 * @return ClassifiedCategoryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ClassifiedCategoryMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objClassifiedCategory->Id;
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
			$this->txtName->Text = $this->objClassifiedCategory->Name;
			$this->txtName->MaxLength = ClassifiedCategory::NameMaxLength;
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
			$this->lblName->Text = $this->objClassifiedCategory->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtToken
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToken_Create($strControlId = null) {
			$this->txtToken = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToken->Name = QApplication::Translate('Token');
			$this->txtToken->Text = $this->objClassifiedCategory->Token;
			$this->txtToken->MaxLength = ClassifiedCategory::TokenMaxLength;
			return $this->txtToken;
		}

		/**
		 * Create and setup QLabel lblToken
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToken_Create($strControlId = null) {
			$this->lblToken = new QLabel($this->objParentObject, $strControlId);
			$this->lblToken->Name = QApplication::Translate('Token');
			$this->lblToken->Text = $this->objClassifiedCategory->Token;
			return $this->lblToken;
		}

		/**
		 * Create and setup QIntegerTextBox txtOrderNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtOrderNumber_Create($strControlId = null) {
			$this->txtOrderNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtOrderNumber->Name = QApplication::Translate('Order Number');
			$this->txtOrderNumber->Text = $this->objClassifiedCategory->OrderNumber;
			return $this->txtOrderNumber;
		}

		/**
		 * Create and setup QLabel lblOrderNumber
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblOrderNumber_Create($strControlId = null, $strFormat = null) {
			$this->lblOrderNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblOrderNumber->Name = QApplication::Translate('Order Number');
			$this->lblOrderNumber->Text = $this->objClassifiedCategory->OrderNumber;
			$this->lblOrderNumber->Format = $strFormat;
			return $this->lblOrderNumber;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objClassifiedCategory->Description;
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
			$this->lblDescription->Text = $this->objClassifiedCategory->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QTextBox txtInstructions
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtInstructions_Create($strControlId = null) {
			$this->txtInstructions = new QTextBox($this->objParentObject, $strControlId);
			$this->txtInstructions->Name = QApplication::Translate('Instructions');
			$this->txtInstructions->Text = $this->objClassifiedCategory->Instructions;
			$this->txtInstructions->TextMode = QTextMode::MultiLine;
			return $this->txtInstructions;
		}

		/**
		 * Create and setup QLabel lblInstructions
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInstructions_Create($strControlId = null) {
			$this->lblInstructions = new QLabel($this->objParentObject, $strControlId);
			$this->lblInstructions->Name = QApplication::Translate('Instructions');
			$this->lblInstructions->Text = $this->objClassifiedCategory->Instructions;
			return $this->lblInstructions;
		}



		/**
		 * Refresh this MetaControl with Data from the local ClassifiedCategory object.
		 * @param boolean $blnReload reload ClassifiedCategory from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objClassifiedCategory->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objClassifiedCategory->Id;

			if ($this->txtName) $this->txtName->Text = $this->objClassifiedCategory->Name;
			if ($this->lblName) $this->lblName->Text = $this->objClassifiedCategory->Name;

			if ($this->txtToken) $this->txtToken->Text = $this->objClassifiedCategory->Token;
			if ($this->lblToken) $this->lblToken->Text = $this->objClassifiedCategory->Token;

			if ($this->txtOrderNumber) $this->txtOrderNumber->Text = $this->objClassifiedCategory->OrderNumber;
			if ($this->lblOrderNumber) $this->lblOrderNumber->Text = $this->objClassifiedCategory->OrderNumber;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objClassifiedCategory->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objClassifiedCategory->Description;

			if ($this->txtInstructions) $this->txtInstructions->Text = $this->objClassifiedCategory->Instructions;
			if ($this->lblInstructions) $this->lblInstructions->Text = $this->objClassifiedCategory->Instructions;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CLASSIFIEDCATEGORY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ClassifiedCategory instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveClassifiedCategory() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objClassifiedCategory->Name = $this->txtName->Text;
				if ($this->txtToken) $this->objClassifiedCategory->Token = $this->txtToken->Text;
				if ($this->txtOrderNumber) $this->objClassifiedCategory->OrderNumber = $this->txtOrderNumber->Text;
				if ($this->txtDescription) $this->objClassifiedCategory->Description = $this->txtDescription->Text;
				if ($this->txtInstructions) $this->objClassifiedCategory->Instructions = $this->txtInstructions->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ClassifiedCategory object
				$this->objClassifiedCategory->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ClassifiedCategory instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteClassifiedCategory() {
			$this->objClassifiedCategory->Delete();
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
				case 'ClassifiedCategory': return $this->objClassifiedCategory;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ClassifiedCategory fields -- will be created dynamically if not yet created
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
				case 'TokenControl':
					if (!$this->txtToken) return $this->txtToken_Create();
					return $this->txtToken;
				case 'TokenLabel':
					if (!$this->lblToken) return $this->lblToken_Create();
					return $this->lblToken;
				case 'OrderNumberControl':
					if (!$this->txtOrderNumber) return $this->txtOrderNumber_Create();
					return $this->txtOrderNumber;
				case 'OrderNumberLabel':
					if (!$this->lblOrderNumber) return $this->lblOrderNumber_Create();
					return $this->lblOrderNumber;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'InstructionsControl':
					if (!$this->txtInstructions) return $this->txtInstructions_Create();
					return $this->txtInstructions;
				case 'InstructionsLabel':
					if (!$this->lblInstructions) return $this->lblInstructions_Create();
					return $this->lblInstructions;
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
					// Controls that point to ClassifiedCategory fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'TokenControl':
						return ($this->txtToken = QType::Cast($mixValue, 'QControl'));
					case 'OrderNumberControl':
						return ($this->txtOrderNumber = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'InstructionsControl':
						return ($this->txtInstructions = QType::Cast($mixValue, 'QControl'));
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