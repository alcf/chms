<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ClassInstructor class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ClassInstructor object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ClassInstructorMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ClassInstructor $ClassInstructor the actual ClassInstructor data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $DisplayNameControl
	 * property-read QLabel $DisplayNameLabel
	 * property QListBox $LoginIdControl
	 * property-read QLabel $LoginIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ClassInstructorMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ClassInstructor objClassInstructor
		 * @access protected
		 */
		protected $objClassInstructor;

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

		// Controls that allow the editing of ClassInstructor's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtDisplayName;
         * @access protected
         */
		protected $txtDisplayName;

        /**
         * @var QListBox lstLogin;
         * @access protected
         */
		protected $lstLogin;


		// Controls that allow the viewing of ClassInstructor's individual data fields
        /**
         * @var QLabel lblDisplayName
         * @access protected
         */
		protected $lblDisplayName;

        /**
         * @var QLabel lblLoginId
         * @access protected
         */
		protected $lblLoginId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ClassInstructorMetaControl to edit a single ClassInstructor object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ClassInstructor object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassInstructorMetaControl
		 * @param ClassInstructor $objClassInstructor new or existing ClassInstructor object
		 */
		 public function __construct($objParentObject, ClassInstructor $objClassInstructor) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ClassInstructorMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ClassInstructor object
			$this->objClassInstructor = $objClassInstructor;

			// Figure out if we're Editing or Creating New
			if ($this->objClassInstructor->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassInstructorMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ClassInstructor object creation - defaults to CreateOrEdit
 		 * @return ClassInstructorMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objClassInstructor = ClassInstructor::Load($intId);

				// ClassInstructor was found -- return it!
				if ($objClassInstructor)
					return new ClassInstructorMetaControl($objParentObject, $objClassInstructor);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ClassInstructor object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ClassInstructorMetaControl($objParentObject, new ClassInstructor());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassInstructorMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassInstructor object creation - defaults to CreateOrEdit
		 * @return ClassInstructorMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ClassInstructorMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassInstructorMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassInstructor object creation - defaults to CreateOrEdit
		 * @return ClassInstructorMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ClassInstructorMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objClassInstructor->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtDisplayName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDisplayName_Create($strControlId = null) {
			$this->txtDisplayName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDisplayName->Name = QApplication::Translate('Display Name');
			$this->txtDisplayName->Text = $this->objClassInstructor->DisplayName;
			$this->txtDisplayName->MaxLength = ClassInstructor::DisplayNameMaxLength;
			return $this->txtDisplayName;
		}

		/**
		 * Create and setup QLabel lblDisplayName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDisplayName_Create($strControlId = null) {
			$this->lblDisplayName = new QLabel($this->objParentObject, $strControlId);
			$this->lblDisplayName->Name = QApplication::Translate('Display Name');
			$this->lblDisplayName->Text = $this->objClassInstructor->DisplayName;
			return $this->lblDisplayName;
		}

		/**
		 * Create and setup QListBox lstLogin
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstLogin_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstLogin = new QListBox($this->objParentObject, $strControlId);
			$this->lstLogin->Name = QApplication::Translate('Login');
			$this->lstLogin->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objLoginCursor = Login::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objLogin = Login::InstantiateCursor($objLoginCursor)) {
				$objListItem = new QListItem($objLogin->__toString(), $objLogin->Id);
				if (($this->objClassInstructor->Login) && ($this->objClassInstructor->Login->Id == $objLogin->Id))
					$objListItem->Selected = true;
				$this->lstLogin->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstLogin;
		}

		/**
		 * Create and setup QLabel lblLoginId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLoginId_Create($strControlId = null) {
			$this->lblLoginId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLoginId->Name = QApplication::Translate('Login');
			$this->lblLoginId->Text = ($this->objClassInstructor->Login) ? $this->objClassInstructor->Login->__toString() : null;
			return $this->lblLoginId;
		}



		/**
		 * Refresh this MetaControl with Data from the local ClassInstructor object.
		 * @param boolean $blnReload reload ClassInstructor from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objClassInstructor->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objClassInstructor->Id;

			if ($this->txtDisplayName) $this->txtDisplayName->Text = $this->objClassInstructor->DisplayName;
			if ($this->lblDisplayName) $this->lblDisplayName->Text = $this->objClassInstructor->DisplayName;

			if ($this->lstLogin) {
					$this->lstLogin->RemoveAllItems();
				$this->lstLogin->AddItem(QApplication::Translate('- Select One -'), null);
				$objLoginArray = Login::LoadAll();
				if ($objLoginArray) foreach ($objLoginArray as $objLogin) {
					$objListItem = new QListItem($objLogin->__toString(), $objLogin->Id);
					if (($this->objClassInstructor->Login) && ($this->objClassInstructor->Login->Id == $objLogin->Id))
						$objListItem->Selected = true;
					$this->lstLogin->AddItem($objListItem);
				}
			}
			if ($this->lblLoginId) $this->lblLoginId->Text = ($this->objClassInstructor->Login) ? $this->objClassInstructor->Login->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CLASSINSTRUCTOR OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ClassInstructor instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveClassInstructor() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtDisplayName) $this->objClassInstructor->DisplayName = $this->txtDisplayName->Text;
				if ($this->lstLogin) $this->objClassInstructor->LoginId = $this->lstLogin->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ClassInstructor object
				$this->objClassInstructor->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ClassInstructor instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteClassInstructor() {
			$this->objClassInstructor->Delete();
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
				case 'ClassInstructor': return $this->objClassInstructor;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ClassInstructor fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'DisplayNameControl':
					if (!$this->txtDisplayName) return $this->txtDisplayName_Create();
					return $this->txtDisplayName;
				case 'DisplayNameLabel':
					if (!$this->lblDisplayName) return $this->lblDisplayName_Create();
					return $this->lblDisplayName;
				case 'LoginIdControl':
					if (!$this->lstLogin) return $this->lstLogin_Create();
					return $this->lstLogin;
				case 'LoginIdLabel':
					if (!$this->lblLoginId) return $this->lblLoginId_Create();
					return $this->lblLoginId;
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
					// Controls that point to ClassInstructor fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'DisplayNameControl':
						return ($this->txtDisplayName = QType::Cast($mixValue, 'QControl'));
					case 'LoginIdControl':
						return ($this->lstLogin = QType::Cast($mixValue, 'QControl'));
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