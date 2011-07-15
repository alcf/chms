<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ClassCourse class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ClassCourse object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ClassCourseMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ClassCourse $ClassCourse the actual ClassCourse data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $CodeControl
	 * property-read QLabel $CodeLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ClassCourseMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ClassCourse objClassCourse
		 * @access protected
		 */
		protected $objClassCourse;

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

		// Controls that allow the editing of ClassCourse's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtCode;
         * @access protected
         */
		protected $txtCode;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;


		// Controls that allow the viewing of ClassCourse's individual data fields
        /**
         * @var QLabel lblCode
         * @access protected
         */
		protected $lblCode;

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
		 * ClassCourseMetaControl to edit a single ClassCourse object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ClassCourse object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassCourseMetaControl
		 * @param ClassCourse $objClassCourse new or existing ClassCourse object
		 */
		 public function __construct($objParentObject, ClassCourse $objClassCourse) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ClassCourseMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ClassCourse object
			$this->objClassCourse = $objClassCourse;

			// Figure out if we're Editing or Creating New
			if ($this->objClassCourse->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassCourseMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ClassCourse object creation - defaults to CreateOrEdit
 		 * @return ClassCourseMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objClassCourse = ClassCourse::Load($intId);

				// ClassCourse was found -- return it!
				if ($objClassCourse)
					return new ClassCourseMetaControl($objParentObject, $objClassCourse);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ClassCourse object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ClassCourseMetaControl($objParentObject, new ClassCourse());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassCourseMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassCourse object creation - defaults to CreateOrEdit
		 * @return ClassCourseMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ClassCourseMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassCourseMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassCourse object creation - defaults to CreateOrEdit
		 * @return ClassCourseMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ClassCourseMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objClassCourse->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCode_Create($strControlId = null) {
			$this->txtCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCode->Name = QApplication::Translate('Code');
			$this->txtCode->Text = $this->objClassCourse->Code;
			$this->txtCode->MaxLength = ClassCourse::CodeMaxLength;
			return $this->txtCode;
		}

		/**
		 * Create and setup QLabel lblCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCode_Create($strControlId = null) {
			$this->lblCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblCode->Name = QApplication::Translate('Code');
			$this->lblCode->Text = $this->objClassCourse->Code;
			return $this->lblCode;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objClassCourse->Name;
			$this->txtName->MaxLength = ClassCourse::NameMaxLength;
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
			$this->lblName->Text = $this->objClassCourse->Name;
			return $this->lblName;
		}



		/**
		 * Refresh this MetaControl with Data from the local ClassCourse object.
		 * @param boolean $blnReload reload ClassCourse from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objClassCourse->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objClassCourse->Id;

			if ($this->txtCode) $this->txtCode->Text = $this->objClassCourse->Code;
			if ($this->lblCode) $this->lblCode->Text = $this->objClassCourse->Code;

			if ($this->txtName) $this->txtName->Text = $this->objClassCourse->Name;
			if ($this->lblName) $this->lblName->Text = $this->objClassCourse->Name;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CLASSCOURSE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ClassCourse instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveClassCourse() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtCode) $this->objClassCourse->Code = $this->txtCode->Text;
				if ($this->txtName) $this->objClassCourse->Name = $this->txtName->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ClassCourse object
				$this->objClassCourse->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ClassCourse instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteClassCourse() {
			$this->objClassCourse->Delete();
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
				case 'ClassCourse': return $this->objClassCourse;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ClassCourse fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'CodeControl':
					if (!$this->txtCode) return $this->txtCode_Create();
					return $this->txtCode;
				case 'CodeLabel':
					if (!$this->lblCode) return $this->lblCode_Create();
					return $this->lblCode;
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
					// Controls that point to ClassCourse fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'CodeControl':
						return ($this->txtCode = QType::Cast($mixValue, 'QControl'));
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