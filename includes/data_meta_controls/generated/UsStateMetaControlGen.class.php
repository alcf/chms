<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the UsState class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single UsState object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a UsStateMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read UsState $UsState the actual UsState data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $AbbreviationControl
	 * property-read QLabel $AbbreviationLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class UsStateMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var UsState objUsState
		 * @access protected
		 */
		protected $objUsState;

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

		// Controls that allow the editing of UsState's individual data fields
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
         * @var QTextBox txtAbbreviation;
         * @access protected
         */
		protected $txtAbbreviation;


		// Controls that allow the viewing of UsState's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblAbbreviation
         * @access protected
         */
		protected $lblAbbreviation;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * UsStateMetaControl to edit a single UsState object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single UsState object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UsStateMetaControl
		 * @param UsState $objUsState new or existing UsState object
		 */
		 public function __construct($objParentObject, UsState $objUsState) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this UsStateMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked UsState object
			$this->objUsState = $objUsState;

			// Figure out if we're Editing or Creating New
			if ($this->objUsState->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this UsStateMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing UsState object creation - defaults to CreateOrEdit
 		 * @return UsStateMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objUsState = UsState::Load($intId);

				// UsState was found -- return it!
				if ($objUsState)
					return new UsStateMetaControl($objParentObject, $objUsState);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a UsState object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new UsStateMetaControl($objParentObject, new UsState());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UsStateMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing UsState object creation - defaults to CreateOrEdit
		 * @return UsStateMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return UsStateMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UsStateMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing UsState object creation - defaults to CreateOrEdit
		 * @return UsStateMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return UsStateMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objUsState->Id;
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
			$this->txtName->Text = $this->objUsState->Name;
			$this->txtName->MaxLength = UsState::NameMaxLength;
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
			$this->lblName->Text = $this->objUsState->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtAbbreviation
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAbbreviation_Create($strControlId = null) {
			$this->txtAbbreviation = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAbbreviation->Name = QApplication::Translate('Abbreviation');
			$this->txtAbbreviation->Text = $this->objUsState->Abbreviation;
			$this->txtAbbreviation->Required = true;
			$this->txtAbbreviation->MaxLength = UsState::AbbreviationMaxLength;
			return $this->txtAbbreviation;
		}

		/**
		 * Create and setup QLabel lblAbbreviation
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAbbreviation_Create($strControlId = null) {
			$this->lblAbbreviation = new QLabel($this->objParentObject, $strControlId);
			$this->lblAbbreviation->Name = QApplication::Translate('Abbreviation');
			$this->lblAbbreviation->Text = $this->objUsState->Abbreviation;
			$this->lblAbbreviation->Required = true;
			return $this->lblAbbreviation;
		}



		/**
		 * Refresh this MetaControl with Data from the local UsState object.
		 * @param boolean $blnReload reload UsState from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objUsState->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objUsState->Id;

			if ($this->txtName) $this->txtName->Text = $this->objUsState->Name;
			if ($this->lblName) $this->lblName->Text = $this->objUsState->Name;

			if ($this->txtAbbreviation) $this->txtAbbreviation->Text = $this->objUsState->Abbreviation;
			if ($this->lblAbbreviation) $this->lblAbbreviation->Text = $this->objUsState->Abbreviation;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC USSTATE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's UsState instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveUsState() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objUsState->Name = $this->txtName->Text;
				if ($this->txtAbbreviation) $this->objUsState->Abbreviation = $this->txtAbbreviation->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the UsState object
				$this->objUsState->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's UsState instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteUsState() {
			$this->objUsState->Delete();
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
				case 'UsState': return $this->objUsState;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to UsState fields -- will be created dynamically if not yet created
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
				case 'AbbreviationControl':
					if (!$this->txtAbbreviation) return $this->txtAbbreviation_Create();
					return $this->txtAbbreviation;
				case 'AbbreviationLabel':
					if (!$this->lblAbbreviation) return $this->lblAbbreviation_Create();
					return $this->lblAbbreviation;
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
					// Controls that point to UsState fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'AbbreviationControl':
						return ($this->txtAbbreviation = QType::Cast($mixValue, 'QControl'));
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