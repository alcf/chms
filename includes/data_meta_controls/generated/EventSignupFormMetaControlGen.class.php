<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the EventSignupForm class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single EventSignupForm object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a EventSignupFormMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read EventSignupForm $EventSignupForm the actual EventSignupForm data class being edited
	 * property QListBox $SignupFormIdControl
	 * property-read QLabel $SignupFormIdLabel
	 * property QDateTimePicker $DateStartControl
	 * property-read QLabel $DateStartLabel
	 * property QDateTimePicker $DateEndControl
	 * property-read QLabel $DateEndLabel
	 * property QTextBox $LocationControl
	 * property-read QLabel $LocationLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class EventSignupFormMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var EventSignupForm objEventSignupForm
		 * @access protected
		 */
		protected $objEventSignupForm;

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

		// Controls that allow the editing of EventSignupForm's individual data fields
        /**
         * @var QListBox lstSignupForm;
         * @access protected
         */
		protected $lstSignupForm;

        /**
         * @var QDateTimePicker calDateStart;
         * @access protected
         */
		protected $calDateStart;

        /**
         * @var QDateTimePicker calDateEnd;
         * @access protected
         */
		protected $calDateEnd;

        /**
         * @var QTextBox txtLocation;
         * @access protected
         */
		protected $txtLocation;


		// Controls that allow the viewing of EventSignupForm's individual data fields
        /**
         * @var QLabel lblSignupFormId
         * @access protected
         */
		protected $lblSignupFormId;

        /**
         * @var QLabel lblDateStart
         * @access protected
         */
		protected $lblDateStart;

        /**
         * @var QLabel lblDateEnd
         * @access protected
         */
		protected $lblDateEnd;

        /**
         * @var QLabel lblLocation
         * @access protected
         */
		protected $lblLocation;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * EventSignupFormMetaControl to edit a single EventSignupForm object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single EventSignupForm object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EventSignupFormMetaControl
		 * @param EventSignupForm $objEventSignupForm new or existing EventSignupForm object
		 */
		 public function __construct($objParentObject, EventSignupForm $objEventSignupForm) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this EventSignupFormMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked EventSignupForm object
			$this->objEventSignupForm = $objEventSignupForm;

			// Figure out if we're Editing or Creating New
			if ($this->objEventSignupForm->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this EventSignupFormMetaControl
		 * @param integer $intSignupFormId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing EventSignupForm object creation - defaults to CreateOrEdit
 		 * @return EventSignupFormMetaControl
		 */
		public static function Create($objParentObject, $intSignupFormId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intSignupFormId)) {
				$objEventSignupForm = EventSignupForm::Load($intSignupFormId);

				// EventSignupForm was found -- return it!
				if ($objEventSignupForm)
					return new EventSignupFormMetaControl($objParentObject, $objEventSignupForm);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a EventSignupForm object with PK arguments: ' . $intSignupFormId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new EventSignupFormMetaControl($objParentObject, new EventSignupForm());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EventSignupFormMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EventSignupForm object creation - defaults to CreateOrEdit
		 * @return EventSignupFormMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intSignupFormId = QApplication::PathInfo(0);
			return EventSignupFormMetaControl::Create($objParentObject, $intSignupFormId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EventSignupFormMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EventSignupForm object creation - defaults to CreateOrEdit
		 * @return EventSignupFormMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intSignupFormId = QApplication::QueryString('intSignupFormId');
			return EventSignupFormMetaControl::Create($objParentObject, $intSignupFormId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstSignupForm
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSignupForm_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSignupForm = new QListBox($this->objParentObject, $strControlId);
			$this->lstSignupForm->Name = QApplication::Translate('Signup Form');
			$this->lstSignupForm->Required = true;
			if (!$this->blnEditMode)
				$this->lstSignupForm->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSignupFormCursor = SignupForm::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSignupForm = SignupForm::InstantiateCursor($objSignupFormCursor)) {
				$objListItem = new QListItem($objSignupForm->__toString(), $objSignupForm->Id);
				if (($this->objEventSignupForm->SignupForm) && ($this->objEventSignupForm->SignupForm->Id == $objSignupForm->Id))
					$objListItem->Selected = true;
				$this->lstSignupForm->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSignupForm;
		}

		/**
		 * Create and setup QLabel lblSignupFormId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSignupFormId_Create($strControlId = null) {
			$this->lblSignupFormId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupFormId->Name = QApplication::Translate('Signup Form');
			$this->lblSignupFormId->Text = ($this->objEventSignupForm->SignupForm) ? $this->objEventSignupForm->SignupForm->__toString() : null;
			$this->lblSignupFormId->Required = true;
			return $this->lblSignupFormId;
		}

		/**
		 * Create and setup QDateTimePicker calDateStart
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateStart_Create($strControlId = null) {
			$this->calDateStart = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateStart->Name = QApplication::Translate('Date Start');
			$this->calDateStart->DateTime = $this->objEventSignupForm->DateStart;
			$this->calDateStart->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateStart;
		}

		/**
		 * Create and setup QLabel lblDateStart
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateStart_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateStart = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateStart->Name = QApplication::Translate('Date Start');
			$this->strDateStartDateTimeFormat = $strDateTimeFormat;
			$this->lblDateStart->Text = sprintf($this->objEventSignupForm->DateStart) ? $this->objEventSignupForm->DateStart->__toString($this->strDateStartDateTimeFormat) : null;
			return $this->lblDateStart;
		}

		protected $strDateStartDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateEnd
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateEnd_Create($strControlId = null) {
			$this->calDateEnd = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateEnd->Name = QApplication::Translate('Date End');
			$this->calDateEnd->DateTime = $this->objEventSignupForm->DateEnd;
			$this->calDateEnd->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateEnd;
		}

		/**
		 * Create and setup QLabel lblDateEnd
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateEnd_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateEnd = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateEnd->Name = QApplication::Translate('Date End');
			$this->strDateEndDateTimeFormat = $strDateTimeFormat;
			$this->lblDateEnd->Text = sprintf($this->objEventSignupForm->DateEnd) ? $this->objEventSignupForm->DateEnd->__toString($this->strDateEndDateTimeFormat) : null;
			return $this->lblDateEnd;
		}

		protected $strDateEndDateTimeFormat;

		/**
		 * Create and setup QTextBox txtLocation
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLocation_Create($strControlId = null) {
			$this->txtLocation = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLocation->Name = QApplication::Translate('Location');
			$this->txtLocation->Text = $this->objEventSignupForm->Location;
			$this->txtLocation->MaxLength = EventSignupForm::LocationMaxLength;
			return $this->txtLocation;
		}

		/**
		 * Create and setup QLabel lblLocation
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLocation_Create($strControlId = null) {
			$this->lblLocation = new QLabel($this->objParentObject, $strControlId);
			$this->lblLocation->Name = QApplication::Translate('Location');
			$this->lblLocation->Text = $this->objEventSignupForm->Location;
			return $this->lblLocation;
		}



		/**
		 * Refresh this MetaControl with Data from the local EventSignupForm object.
		 * @param boolean $blnReload reload EventSignupForm from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objEventSignupForm->Reload();

			if ($this->lstSignupForm) {
					$this->lstSignupForm->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstSignupForm->AddItem(QApplication::Translate('- Select One -'), null);
				$objSignupFormArray = SignupForm::LoadAll();
				if ($objSignupFormArray) foreach ($objSignupFormArray as $objSignupForm) {
					$objListItem = new QListItem($objSignupForm->__toString(), $objSignupForm->Id);
					if (($this->objEventSignupForm->SignupForm) && ($this->objEventSignupForm->SignupForm->Id == $objSignupForm->Id))
						$objListItem->Selected = true;
					$this->lstSignupForm->AddItem($objListItem);
				}
			}
			if ($this->lblSignupFormId) $this->lblSignupFormId->Text = ($this->objEventSignupForm->SignupForm) ? $this->objEventSignupForm->SignupForm->__toString() : null;

			if ($this->calDateStart) $this->calDateStart->DateTime = $this->objEventSignupForm->DateStart;
			if ($this->lblDateStart) $this->lblDateStart->Text = sprintf($this->objEventSignupForm->DateStart) ? $this->objEventSignupForm->__toString($this->strDateStartDateTimeFormat) : null;

			if ($this->calDateEnd) $this->calDateEnd->DateTime = $this->objEventSignupForm->DateEnd;
			if ($this->lblDateEnd) $this->lblDateEnd->Text = sprintf($this->objEventSignupForm->DateEnd) ? $this->objEventSignupForm->__toString($this->strDateEndDateTimeFormat) : null;

			if ($this->txtLocation) $this->txtLocation->Text = $this->objEventSignupForm->Location;
			if ($this->lblLocation) $this->lblLocation->Text = $this->objEventSignupForm->Location;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC EVENTSIGNUPFORM OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's EventSignupForm instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveEventSignupForm() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstSignupForm) $this->objEventSignupForm->SignupFormId = $this->lstSignupForm->SelectedValue;
				if ($this->calDateStart) $this->objEventSignupForm->DateStart = $this->calDateStart->DateTime;
				if ($this->calDateEnd) $this->objEventSignupForm->DateEnd = $this->calDateEnd->DateTime;
				if ($this->txtLocation) $this->objEventSignupForm->Location = $this->txtLocation->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the EventSignupForm object
				$this->objEventSignupForm->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's EventSignupForm instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteEventSignupForm() {
			$this->objEventSignupForm->Delete();
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
				case 'EventSignupForm': return $this->objEventSignupForm;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to EventSignupForm fields -- will be created dynamically if not yet created
				case 'SignupFormIdControl':
					if (!$this->lstSignupForm) return $this->lstSignupForm_Create();
					return $this->lstSignupForm;
				case 'SignupFormIdLabel':
					if (!$this->lblSignupFormId) return $this->lblSignupFormId_Create();
					return $this->lblSignupFormId;
				case 'DateStartControl':
					if (!$this->calDateStart) return $this->calDateStart_Create();
					return $this->calDateStart;
				case 'DateStartLabel':
					if (!$this->lblDateStart) return $this->lblDateStart_Create();
					return $this->lblDateStart;
				case 'DateEndControl':
					if (!$this->calDateEnd) return $this->calDateEnd_Create();
					return $this->calDateEnd;
				case 'DateEndLabel':
					if (!$this->lblDateEnd) return $this->lblDateEnd_Create();
					return $this->lblDateEnd;
				case 'LocationControl':
					if (!$this->txtLocation) return $this->txtLocation_Create();
					return $this->txtLocation;
				case 'LocationLabel':
					if (!$this->lblLocation) return $this->lblLocation_Create();
					return $this->lblLocation;
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
					// Controls that point to EventSignupForm fields
					case 'SignupFormIdControl':
						return ($this->lstSignupForm = QType::Cast($mixValue, 'QControl'));
					case 'DateStartControl':
						return ($this->calDateStart = QType::Cast($mixValue, 'QControl'));
					case 'DateEndControl':
						return ($this->calDateEnd = QType::Cast($mixValue, 'QControl'));
					case 'LocationControl':
						return ($this->txtLocation = QType::Cast($mixValue, 'QControl'));
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