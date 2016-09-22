<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Praises class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Praises object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PraisesMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Praises $Praises the actual Praises data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property QTextBox $SubjectControl
	 * property-read QLabel $SubjectLabel
	 * property QTextBox $ContentControl
	 * property-read QLabel $ContentLabel
	 * property QDateTimePicker $DateControl
	 * property-read QLabel $DateLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PraisesMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Praises objPraises
		 * @access protected
		 */
		protected $objPraises;

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

		// Controls that allow the editing of Praises's individual data fields
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
         * @var QTextBox txtEmail;
         * @access protected
         */
		protected $txtEmail;

        /**
         * @var QTextBox txtSubject;
         * @access protected
         */
		protected $txtSubject;

        /**
         * @var QTextBox txtContent;
         * @access protected
         */
		protected $txtContent;

        /**
         * @var QDateTimePicker calDate;
         * @access protected
         */
		protected $calDate;


		// Controls that allow the viewing of Praises's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblEmail
         * @access protected
         */
		protected $lblEmail;

        /**
         * @var QLabel lblSubject
         * @access protected
         */
		protected $lblSubject;

        /**
         * @var QLabel lblContent
         * @access protected
         */
		protected $lblContent;

        /**
         * @var QLabel lblDate
         * @access protected
         */
		protected $lblDate;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PraisesMetaControl to edit a single Praises object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Praises object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PraisesMetaControl
		 * @param Praises $objPraises new or existing Praises object
		 */
		 public function __construct($objParentObject, Praises $objPraises) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PraisesMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Praises object
			$this->objPraises = $objPraises;

			// Figure out if we're Editing or Creating New
			if ($this->objPraises->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PraisesMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Praises object creation - defaults to CreateOrEdit
 		 * @return PraisesMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objPraises = Praises::Load($intId);

				// Praises was found -- return it!
				if ($objPraises)
					return new PraisesMetaControl($objParentObject, $objPraises);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Praises object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PraisesMetaControl($objParentObject, new Praises());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PraisesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Praises object creation - defaults to CreateOrEdit
		 * @return PraisesMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return PraisesMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PraisesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Praises object creation - defaults to CreateOrEdit
		 * @return PraisesMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return PraisesMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objPraises->Id;
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
			$this->txtName->Text = $this->objPraises->Name;
			$this->txtName->MaxLength = Praises::NameMaxLength;
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
			$this->lblName->Text = $this->objPraises->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objPraises->Email;
			$this->txtEmail->MaxLength = Praises::EmailMaxLength;
			return $this->txtEmail;
		}

		/**
		 * Create and setup QLabel lblEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmail_Create($strControlId = null) {
			$this->lblEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmail->Name = QApplication::Translate('Email');
			$this->lblEmail->Text = $this->objPraises->Email;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QTextBox txtSubject
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSubject_Create($strControlId = null) {
			$this->txtSubject = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSubject->Name = QApplication::Translate('Subject');
			$this->txtSubject->Text = $this->objPraises->Subject;
			$this->txtSubject->MaxLength = Praises::SubjectMaxLength;
			return $this->txtSubject;
		}

		/**
		 * Create and setup QLabel lblSubject
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSubject_Create($strControlId = null) {
			$this->lblSubject = new QLabel($this->objParentObject, $strControlId);
			$this->lblSubject->Name = QApplication::Translate('Subject');
			$this->lblSubject->Text = $this->objPraises->Subject;
			return $this->lblSubject;
		}

		/**
		 * Create and setup QTextBox txtContent
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtContent_Create($strControlId = null) {
			$this->txtContent = new QTextBox($this->objParentObject, $strControlId);
			$this->txtContent->Name = QApplication::Translate('Content');
			$this->txtContent->Text = $this->objPraises->Content;
			$this->txtContent->TextMode = QTextMode::MultiLine;
			return $this->txtContent;
		}

		/**
		 * Create and setup QLabel lblContent
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblContent_Create($strControlId = null) {
			$this->lblContent = new QLabel($this->objParentObject, $strControlId);
			$this->lblContent->Name = QApplication::Translate('Content');
			$this->lblContent->Text = $this->objPraises->Content;
			return $this->lblContent;
		}

		/**
		 * Create and setup QDateTimePicker calDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDate_Create($strControlId = null) {
			$this->calDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDate->Name = QApplication::Translate('Date');
			$this->calDate->DateTime = $this->objPraises->Date;
			$this->calDate->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDate;
		}

		/**
		 * Create and setup QLabel lblDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblDate->Name = QApplication::Translate('Date');
			$this->strDateDateTimeFormat = $strDateTimeFormat;
			$this->lblDate->Text = sprintf($this->objPraises->Date) ? $this->objPraises->Date->__toString($this->strDateDateTimeFormat) : null;
			return $this->lblDate;
		}

		protected $strDateDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local Praises object.
		 * @param boolean $blnReload reload Praises from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPraises->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPraises->Id;

			if ($this->txtName) $this->txtName->Text = $this->objPraises->Name;
			if ($this->lblName) $this->lblName->Text = $this->objPraises->Name;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objPraises->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objPraises->Email;

			if ($this->txtSubject) $this->txtSubject->Text = $this->objPraises->Subject;
			if ($this->lblSubject) $this->lblSubject->Text = $this->objPraises->Subject;

			if ($this->txtContent) $this->txtContent->Text = $this->objPraises->Content;
			if ($this->lblContent) $this->lblContent->Text = $this->objPraises->Content;

			if ($this->calDate) $this->calDate->DateTime = $this->objPraises->Date;
			if ($this->lblDate) $this->lblDate->Text = sprintf($this->objPraises->Date) ? $this->objPraises->__toString($this->strDateDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PRAISES OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Praises instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePraises() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objPraises->Name = $this->txtName->Text;
				if ($this->txtEmail) $this->objPraises->Email = $this->txtEmail->Text;
				if ($this->txtSubject) $this->objPraises->Subject = $this->txtSubject->Text;
				if ($this->txtContent) $this->objPraises->Content = $this->txtContent->Text;
				if ($this->calDate) $this->objPraises->Date = $this->calDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Praises object
				$this->objPraises->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Praises instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePraises() {
			$this->objPraises->Delete();
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
				case 'Praises': return $this->objPraises;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Praises fields -- will be created dynamically if not yet created
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
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'SubjectControl':
					if (!$this->txtSubject) return $this->txtSubject_Create();
					return $this->txtSubject;
				case 'SubjectLabel':
					if (!$this->lblSubject) return $this->lblSubject_Create();
					return $this->lblSubject;
				case 'ContentControl':
					if (!$this->txtContent) return $this->txtContent_Create();
					return $this->txtContent;
				case 'ContentLabel':
					if (!$this->lblContent) return $this->lblContent_Create();
					return $this->lblContent;
				case 'DateControl':
					if (!$this->calDate) return $this->calDate_Create();
					return $this->calDate;
				case 'DateLabel':
					if (!$this->lblDate) return $this->lblDate_Create();
					return $this->lblDate;
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
					// Controls that point to Praises fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'SubjectControl':
						return ($this->txtSubject = QType::Cast($mixValue, 'QControl'));
					case 'ContentControl':
						return ($this->txtContent = QType::Cast($mixValue, 'QControl'));
					case 'DateControl':
						return ($this->calDate = QType::Cast($mixValue, 'QControl'));
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