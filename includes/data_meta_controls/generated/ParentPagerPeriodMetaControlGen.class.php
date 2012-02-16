<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ParentPagerPeriod class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ParentPagerPeriod object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ParentPagerPeriodMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ParentPagerPeriod $ParentPagerPeriod the actual ParentPagerPeriod data class being edited
	 * property QIntegerTextBox $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $ServerIdentifierControl
	 * property-read QLabel $ServerIdentifierLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ParentPagerPeriodMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ParentPagerPeriod objParentPagerPeriod
		 * @access protected
		 */
		protected $objParentPagerPeriod;

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

		// Controls that allow the editing of ParentPagerPeriod's individual data fields
        /**
         * @var QIntegerTextBox txtId;
         * @access protected
         */
		protected $txtId;

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


		// Controls that allow the viewing of ParentPagerPeriod's individual data fields
        /**
         * @var QLabel lblId
         * @access protected
         */
		protected $lblId;

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


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ParentPagerPeriodMetaControl to edit a single ParentPagerPeriod object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ParentPagerPeriod object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerPeriodMetaControl
		 * @param ParentPagerPeriod $objParentPagerPeriod new or existing ParentPagerPeriod object
		 */
		 public function __construct($objParentObject, ParentPagerPeriod $objParentPagerPeriod) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ParentPagerPeriodMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ParentPagerPeriod object
			$this->objParentPagerPeriod = $objParentPagerPeriod;

			// Figure out if we're Editing or Creating New
			if ($this->objParentPagerPeriod->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerPeriodMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerPeriod object creation - defaults to CreateOrEdit
 		 * @return ParentPagerPeriodMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objParentPagerPeriod = ParentPagerPeriod::Load($intId);

				// ParentPagerPeriod was found -- return it!
				if ($objParentPagerPeriod)
					return new ParentPagerPeriodMetaControl($objParentObject, $objParentPagerPeriod);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ParentPagerPeriod object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ParentPagerPeriodMetaControl($objParentObject, new ParentPagerPeriod());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerPeriodMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerPeriod object creation - defaults to CreateOrEdit
		 * @return ParentPagerPeriodMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ParentPagerPeriodMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ParentPagerPeriodMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ParentPagerPeriod object creation - defaults to CreateOrEdit
		 * @return ParentPagerPeriodMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ParentPagerPeriodMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QIntegerTextBox txtId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtId_Create($strControlId = null) {
			$this->txtId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtId->Name = QApplication::Translate('Id');
			$this->txtId->Text = $this->objParentPagerPeriod->Id;
			$this->txtId->Required = true;
			return $this->txtId;
		}

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null, $strFormat = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			$this->lblId->Text = $this->objParentPagerPeriod->Id;
			$this->lblId->Required = true;
			$this->lblId->Format = $strFormat;
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
			$this->txtServerIdentifier->Text = $this->objParentPagerPeriod->ServerIdentifier;
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
			$this->lblServerIdentifier->Text = $this->objParentPagerPeriod->ServerIdentifier;
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
			$this->txtName->Text = $this->objParentPagerPeriod->Name;
			$this->txtName->MaxLength = ParentPagerPeriod::NameMaxLength;
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
			$this->lblName->Text = $this->objParentPagerPeriod->Name;
			return $this->lblName;
		}



		/**
		 * Refresh this MetaControl with Data from the local ParentPagerPeriod object.
		 * @param boolean $blnReload reload ParentPagerPeriod from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objParentPagerPeriod->Reload();

			if ($this->txtId) $this->txtId->Text = $this->objParentPagerPeriod->Id;
			if ($this->lblId) $this->lblId->Text = $this->objParentPagerPeriod->Id;

			if ($this->txtServerIdentifier) $this->txtServerIdentifier->Text = $this->objParentPagerPeriod->ServerIdentifier;
			if ($this->lblServerIdentifier) $this->lblServerIdentifier->Text = $this->objParentPagerPeriod->ServerIdentifier;

			if ($this->txtName) $this->txtName->Text = $this->objParentPagerPeriod->Name;
			if ($this->lblName) $this->lblName->Text = $this->objParentPagerPeriod->Name;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PARENTPAGERPERIOD OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ParentPagerPeriod instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveParentPagerPeriod() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtId) $this->objParentPagerPeriod->Id = $this->txtId->Text;
				if ($this->txtServerIdentifier) $this->objParentPagerPeriod->ServerIdentifier = $this->txtServerIdentifier->Text;
				if ($this->txtName) $this->objParentPagerPeriod->Name = $this->txtName->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ParentPagerPeriod object
				$this->objParentPagerPeriod->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ParentPagerPeriod instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteParentPagerPeriod() {
			$this->objParentPagerPeriod->Delete();
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
				case 'ParentPagerPeriod': return $this->objParentPagerPeriod;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ParentPagerPeriod fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->txtId) return $this->txtId_Create();
					return $this->txtId;
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
					// Controls that point to ParentPagerPeriod fields
					case 'IdControl':
						return ($this->txtId = QType::Cast($mixValue, 'QControl'));
					case 'ServerIdentifierControl':
						return ($this->txtServerIdentifier = QType::Cast($mixValue, 'QControl'));
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