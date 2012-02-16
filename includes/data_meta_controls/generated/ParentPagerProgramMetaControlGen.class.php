<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ParentPagerProgram class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ParentPagerProgram object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ParentPagerProgramMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ParentPagerProgram $ParentPagerProgram the actual ParentPagerProgram data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $ServerIdentifierControl
	 * property-read QLabel $ServerIdentifierLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ParentPagerProgramMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ParentPagerProgram objParentPagerProgram
		 * @access protected
		 */
		protected $objParentPagerProgram;

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

		// Controls that allow the editing of ParentPagerProgram's individual data fields
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
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;


		// Controls that allow the viewing of ParentPagerProgram's individual data fields
        /**
         * @var QLabel lblServerIdentifier
         * @access protected
         */
		protected $lblServerIdentifier;

        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ParentPagerProgramMetaControl to edit a single ParentPagerProgram object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ParentPagerProgram object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerProgramMetaControl
		 * @param ParentPagerProgram $objParentPagerProgram new or existing ParentPagerProgram object
		 */
		 public function __construct($objParentObject, ParentPagerProgram $objParentPagerProgram) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ParentPagerProgramMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ParentPagerProgram object
			$this->objParentPagerProgram = $objParentPagerProgram;

			// Figure out if we're Editing or Creating New
			if ($this->objParentPagerProgram->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerProgramMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerProgram object creation - defaults to CreateOrEdit
 		 * @return ParentPagerProgramMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objParentPagerProgram = ParentPagerProgram::Load($intId);

				// ParentPagerProgram was found -- return it!
				if ($objParentPagerProgram)
					return new ParentPagerProgramMetaControl($objParentObject, $objParentPagerProgram);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ParentPagerProgram object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ParentPagerProgramMetaControl($objParentObject, new ParentPagerProgram());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerProgramMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerProgram object creation - defaults to CreateOrEdit
		 * @return ParentPagerProgramMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ParentPagerProgramMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerProgramMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerProgram object creation - defaults to CreateOrEdit
		 * @return ParentPagerProgramMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ParentPagerProgramMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objParentPagerProgram->Id;
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
			$this->txtServerIdentifier->Text = $this->objParentPagerProgram->ServerIdentifier;
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
			$this->lblServerIdentifier->Text = $this->objParentPagerProgram->ServerIdentifier;
			$this->lblServerIdentifier->Required = true;
			$this->lblServerIdentifier->Format = $strFormat;
			return $this->lblServerIdentifier;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objParentPagerProgram->Name;
			$this->txtName->MaxLength = ParentPagerProgram::NameMaxLength;
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
			$this->lblName->Text = $this->objParentPagerProgram->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objParentPagerProgram->Description;
			$this->txtDescription->MaxLength = ParentPagerProgram::DescriptionMaxLength;
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
			$this->lblDescription->Text = $this->objParentPagerProgram->Description;
			return $this->lblDescription;
		}



		/**
		 * Refresh this MetaControl with Data from the local ParentPagerProgram object.
		 * @param boolean $blnReload reload ParentPagerProgram from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objParentPagerProgram->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objParentPagerProgram->Id;

			if ($this->txtServerIdentifier) $this->txtServerIdentifier->Text = $this->objParentPagerProgram->ServerIdentifier;
			if ($this->lblServerIdentifier) $this->lblServerIdentifier->Text = $this->objParentPagerProgram->ServerIdentifier;

			if ($this->txtName) $this->txtName->Text = $this->objParentPagerProgram->Name;
			if ($this->lblName) $this->lblName->Text = $this->objParentPagerProgram->Name;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objParentPagerProgram->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objParentPagerProgram->Description;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PARENTPAGERPROGRAM OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ParentPagerProgram instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveParentPagerProgram() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtServerIdentifier) $this->objParentPagerProgram->ServerIdentifier = $this->txtServerIdentifier->Text;
				if ($this->txtName) $this->objParentPagerProgram->Name = $this->txtName->Text;
				if ($this->txtDescription) $this->objParentPagerProgram->Description = $this->txtDescription->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ParentPagerProgram object
				$this->objParentPagerProgram->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ParentPagerProgram instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteParentPagerProgram() {
			$this->objParentPagerProgram->Delete();
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
				case 'ParentPagerProgram': return $this->objParentPagerProgram;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ParentPagerProgram fields -- will be created dynamically if not yet created
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
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
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
					// Controls that point to ParentPagerProgram fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ServerIdentifierControl':
						return ($this->txtServerIdentifier = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
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