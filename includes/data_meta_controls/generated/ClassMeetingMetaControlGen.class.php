<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ClassMeeting class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ClassMeeting object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ClassMeetingMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ClassMeeting $ClassMeeting the actual ClassMeeting data class being edited
	 * property QListBox $SignupFormIdControl
	 * property-read QLabel $SignupFormIdLabel
	 * property QListBox $ClassTermIdControl
	 * property-read QLabel $ClassTermIdLabel
	 * property QListBox $ClassCourseIdControl
	 * property-read QLabel $ClassCourseIdLabel
	 * property QListBox $ClassInstructorIdControl
	 * property-read QLabel $ClassInstructorIdLabel
	 * property QDateTimePicker $DateStartControl
	 * property-read QLabel $DateStartLabel
	 * property QDateTimePicker $DateEndControl
	 * property-read QLabel $DateEndLabel
	 * property QTextBox $LocationControl
	 * property-read QLabel $LocationLabel
	 * property QIntegerTextBox $MeetingDayControl
	 * property-read QLabel $MeetingDayLabel
	 * property QIntegerTextBox $MeetingStartTimeControl
	 * property-read QLabel $MeetingStartTimeLabel
	 * property QIntegerTextBox $MeetingEndTimeControl
	 * property-read QLabel $MeetingEndTimeLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ClassMeetingMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ClassMeeting objClassMeeting
		 * @access protected
		 */
		protected $objClassMeeting;

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

		// Controls that allow the editing of ClassMeeting's individual data fields
        /**
         * @var QListBox lstSignupForm;
         * @access protected
         */
		protected $lstSignupForm;

        /**
         * @var QListBox lstClassTerm;
         * @access protected
         */
		protected $lstClassTerm;

        /**
         * @var QListBox lstClassCourse;
         * @access protected
         */
		protected $lstClassCourse;

        /**
         * @var QListBox lstClassInstructor;
         * @access protected
         */
		protected $lstClassInstructor;

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

        /**
         * @var QIntegerTextBox txtMeetingDay;
         * @access protected
         */
		protected $txtMeetingDay;

        /**
         * @var QIntegerTextBox txtMeetingStartTime;
         * @access protected
         */
		protected $txtMeetingStartTime;

        /**
         * @var QIntegerTextBox txtMeetingEndTime;
         * @access protected
         */
		protected $txtMeetingEndTime;


		// Controls that allow the viewing of ClassMeeting's individual data fields
        /**
         * @var QLabel lblSignupFormId
         * @access protected
         */
		protected $lblSignupFormId;

        /**
         * @var QLabel lblClassTermId
         * @access protected
         */
		protected $lblClassTermId;

        /**
         * @var QLabel lblClassCourseId
         * @access protected
         */
		protected $lblClassCourseId;

        /**
         * @var QLabel lblClassInstructorId
         * @access protected
         */
		protected $lblClassInstructorId;

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

        /**
         * @var QLabel lblMeetingDay
         * @access protected
         */
		protected $lblMeetingDay;

        /**
         * @var QLabel lblMeetingStartTime
         * @access protected
         */
		protected $lblMeetingStartTime;

        /**
         * @var QLabel lblMeetingEndTime
         * @access protected
         */
		protected $lblMeetingEndTime;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ClassMeetingMetaControl to edit a single ClassMeeting object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ClassMeeting object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassMeetingMetaControl
		 * @param ClassMeeting $objClassMeeting new or existing ClassMeeting object
		 */
		 public function __construct($objParentObject, ClassMeeting $objClassMeeting) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ClassMeetingMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ClassMeeting object
			$this->objClassMeeting = $objClassMeeting;

			// Figure out if we're Editing or Creating New
			if ($this->objClassMeeting->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassMeetingMetaControl
		 * @param integer $intSignupFormId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ClassMeeting object creation - defaults to CreateOrEdit
 		 * @return ClassMeetingMetaControl
		 */
		public static function Create($objParentObject, $intSignupFormId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intSignupFormId)) {
				$objClassMeeting = ClassMeeting::Load($intSignupFormId);

				// ClassMeeting was found -- return it!
				if ($objClassMeeting)
					return new ClassMeetingMetaControl($objParentObject, $objClassMeeting);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ClassMeeting object with PK arguments: ' . $intSignupFormId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ClassMeetingMetaControl($objParentObject, new ClassMeeting());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassMeetingMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassMeeting object creation - defaults to CreateOrEdit
		 * @return ClassMeetingMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intSignupFormId = QApplication::PathInfo(0);
			return ClassMeetingMetaControl::Create($objParentObject, $intSignupFormId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassMeetingMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassMeeting object creation - defaults to CreateOrEdit
		 * @return ClassMeetingMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intSignupFormId = QApplication::QueryString('intSignupFormId');
			return ClassMeetingMetaControl::Create($objParentObject, $intSignupFormId, $intCreateType);
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
				if (($this->objClassMeeting->SignupForm) && ($this->objClassMeeting->SignupForm->Id == $objSignupForm->Id))
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
			$this->lblSignupFormId->Text = ($this->objClassMeeting->SignupForm) ? $this->objClassMeeting->SignupForm->__toString() : null;
			$this->lblSignupFormId->Required = true;
			return $this->lblSignupFormId;
		}

		/**
		 * Create and setup QListBox lstClassTerm
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstClassTerm_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstClassTerm = new QListBox($this->objParentObject, $strControlId);
			$this->lstClassTerm->Name = QApplication::Translate('Class Term');
			$this->lstClassTerm->Required = true;
			if (!$this->blnEditMode)
				$this->lstClassTerm->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objClassTermCursor = ClassTerm::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objClassTerm = ClassTerm::InstantiateCursor($objClassTermCursor)) {
				$objListItem = new QListItem($objClassTerm->__toString(), $objClassTerm->Id);
				if (($this->objClassMeeting->ClassTerm) && ($this->objClassMeeting->ClassTerm->Id == $objClassTerm->Id))
					$objListItem->Selected = true;
				$this->lstClassTerm->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstClassTerm;
		}

		/**
		 * Create and setup QLabel lblClassTermId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblClassTermId_Create($strControlId = null) {
			$this->lblClassTermId = new QLabel($this->objParentObject, $strControlId);
			$this->lblClassTermId->Name = QApplication::Translate('Class Term');
			$this->lblClassTermId->Text = ($this->objClassMeeting->ClassTerm) ? $this->objClassMeeting->ClassTerm->__toString() : null;
			$this->lblClassTermId->Required = true;
			return $this->lblClassTermId;
		}

		/**
		 * Create and setup QListBox lstClassCourse
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstClassCourse_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstClassCourse = new QListBox($this->objParentObject, $strControlId);
			$this->lstClassCourse->Name = QApplication::Translate('Class Course');
			$this->lstClassCourse->Required = true;
			if (!$this->blnEditMode)
				$this->lstClassCourse->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objClassCourseCursor = ClassCourse::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objClassCourse = ClassCourse::InstantiateCursor($objClassCourseCursor)) {
				$objListItem = new QListItem($objClassCourse->__toString(), $objClassCourse->Id);
				if (($this->objClassMeeting->ClassCourse) && ($this->objClassMeeting->ClassCourse->Id == $objClassCourse->Id))
					$objListItem->Selected = true;
				$this->lstClassCourse->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstClassCourse;
		}

		/**
		 * Create and setup QLabel lblClassCourseId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblClassCourseId_Create($strControlId = null) {
			$this->lblClassCourseId = new QLabel($this->objParentObject, $strControlId);
			$this->lblClassCourseId->Name = QApplication::Translate('Class Course');
			$this->lblClassCourseId->Text = ($this->objClassMeeting->ClassCourse) ? $this->objClassMeeting->ClassCourse->__toString() : null;
			$this->lblClassCourseId->Required = true;
			return $this->lblClassCourseId;
		}

		/**
		 * Create and setup QListBox lstClassInstructor
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstClassInstructor_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstClassInstructor = new QListBox($this->objParentObject, $strControlId);
			$this->lstClassInstructor->Name = QApplication::Translate('Class Instructor');
			$this->lstClassInstructor->Required = true;
			if (!$this->blnEditMode)
				$this->lstClassInstructor->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objClassInstructorCursor = ClassInstructor::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objClassInstructor = ClassInstructor::InstantiateCursor($objClassInstructorCursor)) {
				$objListItem = new QListItem($objClassInstructor->__toString(), $objClassInstructor->Id);
				if (($this->objClassMeeting->ClassInstructor) && ($this->objClassMeeting->ClassInstructor->Id == $objClassInstructor->Id))
					$objListItem->Selected = true;
				$this->lstClassInstructor->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstClassInstructor;
		}

		/**
		 * Create and setup QLabel lblClassInstructorId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblClassInstructorId_Create($strControlId = null) {
			$this->lblClassInstructorId = new QLabel($this->objParentObject, $strControlId);
			$this->lblClassInstructorId->Name = QApplication::Translate('Class Instructor');
			$this->lblClassInstructorId->Text = ($this->objClassMeeting->ClassInstructor) ? $this->objClassMeeting->ClassInstructor->__toString() : null;
			$this->lblClassInstructorId->Required = true;
			return $this->lblClassInstructorId;
		}

		/**
		 * Create and setup QDateTimePicker calDateStart
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateStart_Create($strControlId = null) {
			$this->calDateStart = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateStart->Name = QApplication::Translate('Date Start');
			$this->calDateStart->DateTime = $this->objClassMeeting->DateStart;
			$this->calDateStart->DateTimePickerType = QDateTimePickerType::Date;
			$this->calDateStart->Required = true;
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
			$this->lblDateStart->Text = sprintf($this->objClassMeeting->DateStart) ? $this->objClassMeeting->DateStart->__toString($this->strDateStartDateTimeFormat) : null;
			$this->lblDateStart->Required = true;
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
			$this->calDateEnd->DateTime = $this->objClassMeeting->DateEnd;
			$this->calDateEnd->DateTimePickerType = QDateTimePickerType::Date;
			$this->calDateEnd->Required = true;
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
			$this->lblDateEnd->Text = sprintf($this->objClassMeeting->DateEnd) ? $this->objClassMeeting->DateEnd->__toString($this->strDateEndDateTimeFormat) : null;
			$this->lblDateEnd->Required = true;
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
			$this->txtLocation->Text = $this->objClassMeeting->Location;
			$this->txtLocation->MaxLength = ClassMeeting::LocationMaxLength;
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
			$this->lblLocation->Text = $this->objClassMeeting->Location;
			return $this->lblLocation;
		}

		/**
		 * Create and setup QIntegerTextBox txtMeetingDay
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtMeetingDay_Create($strControlId = null) {
			$this->txtMeetingDay = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtMeetingDay->Name = QApplication::Translate('Meeting Day');
			$this->txtMeetingDay->Text = $this->objClassMeeting->MeetingDay;
			return $this->txtMeetingDay;
		}

		/**
		 * Create and setup QLabel lblMeetingDay
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblMeetingDay_Create($strControlId = null, $strFormat = null) {
			$this->lblMeetingDay = new QLabel($this->objParentObject, $strControlId);
			$this->lblMeetingDay->Name = QApplication::Translate('Meeting Day');
			$this->lblMeetingDay->Text = $this->objClassMeeting->MeetingDay;
			$this->lblMeetingDay->Format = $strFormat;
			return $this->lblMeetingDay;
		}

		/**
		 * Create and setup QIntegerTextBox txtMeetingStartTime
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtMeetingStartTime_Create($strControlId = null) {
			$this->txtMeetingStartTime = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtMeetingStartTime->Name = QApplication::Translate('Meeting Start Time');
			$this->txtMeetingStartTime->Text = $this->objClassMeeting->MeetingStartTime;
			return $this->txtMeetingStartTime;
		}

		/**
		 * Create and setup QLabel lblMeetingStartTime
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblMeetingStartTime_Create($strControlId = null, $strFormat = null) {
			$this->lblMeetingStartTime = new QLabel($this->objParentObject, $strControlId);
			$this->lblMeetingStartTime->Name = QApplication::Translate('Meeting Start Time');
			$this->lblMeetingStartTime->Text = $this->objClassMeeting->MeetingStartTime;
			$this->lblMeetingStartTime->Format = $strFormat;
			return $this->lblMeetingStartTime;
		}

		/**
		 * Create and setup QIntegerTextBox txtMeetingEndTime
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtMeetingEndTime_Create($strControlId = null) {
			$this->txtMeetingEndTime = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtMeetingEndTime->Name = QApplication::Translate('Meeting End Time');
			$this->txtMeetingEndTime->Text = $this->objClassMeeting->MeetingEndTime;
			return $this->txtMeetingEndTime;
		}

		/**
		 * Create and setup QLabel lblMeetingEndTime
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblMeetingEndTime_Create($strControlId = null, $strFormat = null) {
			$this->lblMeetingEndTime = new QLabel($this->objParentObject, $strControlId);
			$this->lblMeetingEndTime->Name = QApplication::Translate('Meeting End Time');
			$this->lblMeetingEndTime->Text = $this->objClassMeeting->MeetingEndTime;
			$this->lblMeetingEndTime->Format = $strFormat;
			return $this->lblMeetingEndTime;
		}



		/**
		 * Refresh this MetaControl with Data from the local ClassMeeting object.
		 * @param boolean $blnReload reload ClassMeeting from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objClassMeeting->Reload();

			if ($this->lstSignupForm) {
					$this->lstSignupForm->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstSignupForm->AddItem(QApplication::Translate('- Select One -'), null);
				$objSignupFormArray = SignupForm::LoadAll();
				if ($objSignupFormArray) foreach ($objSignupFormArray as $objSignupForm) {
					$objListItem = new QListItem($objSignupForm->__toString(), $objSignupForm->Id);
					if (($this->objClassMeeting->SignupForm) && ($this->objClassMeeting->SignupForm->Id == $objSignupForm->Id))
						$objListItem->Selected = true;
					$this->lstSignupForm->AddItem($objListItem);
				}
			}
			if ($this->lblSignupFormId) $this->lblSignupFormId->Text = ($this->objClassMeeting->SignupForm) ? $this->objClassMeeting->SignupForm->__toString() : null;

			if ($this->lstClassTerm) {
					$this->lstClassTerm->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstClassTerm->AddItem(QApplication::Translate('- Select One -'), null);
				$objClassTermArray = ClassTerm::LoadAll();
				if ($objClassTermArray) foreach ($objClassTermArray as $objClassTerm) {
					$objListItem = new QListItem($objClassTerm->__toString(), $objClassTerm->Id);
					if (($this->objClassMeeting->ClassTerm) && ($this->objClassMeeting->ClassTerm->Id == $objClassTerm->Id))
						$objListItem->Selected = true;
					$this->lstClassTerm->AddItem($objListItem);
				}
			}
			if ($this->lblClassTermId) $this->lblClassTermId->Text = ($this->objClassMeeting->ClassTerm) ? $this->objClassMeeting->ClassTerm->__toString() : null;

			if ($this->lstClassCourse) {
					$this->lstClassCourse->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstClassCourse->AddItem(QApplication::Translate('- Select One -'), null);
				$objClassCourseArray = ClassCourse::LoadAll();
				if ($objClassCourseArray) foreach ($objClassCourseArray as $objClassCourse) {
					$objListItem = new QListItem($objClassCourse->__toString(), $objClassCourse->Id);
					if (($this->objClassMeeting->ClassCourse) && ($this->objClassMeeting->ClassCourse->Id == $objClassCourse->Id))
						$objListItem->Selected = true;
					$this->lstClassCourse->AddItem($objListItem);
				}
			}
			if ($this->lblClassCourseId) $this->lblClassCourseId->Text = ($this->objClassMeeting->ClassCourse) ? $this->objClassMeeting->ClassCourse->__toString() : null;

			if ($this->lstClassInstructor) {
					$this->lstClassInstructor->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstClassInstructor->AddItem(QApplication::Translate('- Select One -'), null);
				$objClassInstructorArray = ClassInstructor::LoadAll();
				if ($objClassInstructorArray) foreach ($objClassInstructorArray as $objClassInstructor) {
					$objListItem = new QListItem($objClassInstructor->__toString(), $objClassInstructor->Id);
					if (($this->objClassMeeting->ClassInstructor) && ($this->objClassMeeting->ClassInstructor->Id == $objClassInstructor->Id))
						$objListItem->Selected = true;
					$this->lstClassInstructor->AddItem($objListItem);
				}
			}
			if ($this->lblClassInstructorId) $this->lblClassInstructorId->Text = ($this->objClassMeeting->ClassInstructor) ? $this->objClassMeeting->ClassInstructor->__toString() : null;

			if ($this->calDateStart) $this->calDateStart->DateTime = $this->objClassMeeting->DateStart;
			if ($this->lblDateStart) $this->lblDateStart->Text = sprintf($this->objClassMeeting->DateStart) ? $this->objClassMeeting->__toString($this->strDateStartDateTimeFormat) : null;

			if ($this->calDateEnd) $this->calDateEnd->DateTime = $this->objClassMeeting->DateEnd;
			if ($this->lblDateEnd) $this->lblDateEnd->Text = sprintf($this->objClassMeeting->DateEnd) ? $this->objClassMeeting->__toString($this->strDateEndDateTimeFormat) : null;

			if ($this->txtLocation) $this->txtLocation->Text = $this->objClassMeeting->Location;
			if ($this->lblLocation) $this->lblLocation->Text = $this->objClassMeeting->Location;

			if ($this->txtMeetingDay) $this->txtMeetingDay->Text = $this->objClassMeeting->MeetingDay;
			if ($this->lblMeetingDay) $this->lblMeetingDay->Text = $this->objClassMeeting->MeetingDay;

			if ($this->txtMeetingStartTime) $this->txtMeetingStartTime->Text = $this->objClassMeeting->MeetingStartTime;
			if ($this->lblMeetingStartTime) $this->lblMeetingStartTime->Text = $this->objClassMeeting->MeetingStartTime;

			if ($this->txtMeetingEndTime) $this->txtMeetingEndTime->Text = $this->objClassMeeting->MeetingEndTime;
			if ($this->lblMeetingEndTime) $this->lblMeetingEndTime->Text = $this->objClassMeeting->MeetingEndTime;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CLASSMEETING OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ClassMeeting instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveClassMeeting() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstSignupForm) $this->objClassMeeting->SignupFormId = $this->lstSignupForm->SelectedValue;
				if ($this->lstClassTerm) $this->objClassMeeting->ClassTermId = $this->lstClassTerm->SelectedValue;
				if ($this->lstClassCourse) $this->objClassMeeting->ClassCourseId = $this->lstClassCourse->SelectedValue;
				if ($this->lstClassInstructor) $this->objClassMeeting->ClassInstructorId = $this->lstClassInstructor->SelectedValue;
				if ($this->calDateStart) $this->objClassMeeting->DateStart = $this->calDateStart->DateTime;
				if ($this->calDateEnd) $this->objClassMeeting->DateEnd = $this->calDateEnd->DateTime;
				if ($this->txtLocation) $this->objClassMeeting->Location = $this->txtLocation->Text;
				if ($this->txtMeetingDay) $this->objClassMeeting->MeetingDay = $this->txtMeetingDay->Text;
				if ($this->txtMeetingStartTime) $this->objClassMeeting->MeetingStartTime = $this->txtMeetingStartTime->Text;
				if ($this->txtMeetingEndTime) $this->objClassMeeting->MeetingEndTime = $this->txtMeetingEndTime->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ClassMeeting object
				$this->objClassMeeting->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ClassMeeting instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteClassMeeting() {
			$this->objClassMeeting->Delete();
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
				case 'ClassMeeting': return $this->objClassMeeting;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ClassMeeting fields -- will be created dynamically if not yet created
				case 'SignupFormIdControl':
					if (!$this->lstSignupForm) return $this->lstSignupForm_Create();
					return $this->lstSignupForm;
				case 'SignupFormIdLabel':
					if (!$this->lblSignupFormId) return $this->lblSignupFormId_Create();
					return $this->lblSignupFormId;
				case 'ClassTermIdControl':
					if (!$this->lstClassTerm) return $this->lstClassTerm_Create();
					return $this->lstClassTerm;
				case 'ClassTermIdLabel':
					if (!$this->lblClassTermId) return $this->lblClassTermId_Create();
					return $this->lblClassTermId;
				case 'ClassCourseIdControl':
					if (!$this->lstClassCourse) return $this->lstClassCourse_Create();
					return $this->lstClassCourse;
				case 'ClassCourseIdLabel':
					if (!$this->lblClassCourseId) return $this->lblClassCourseId_Create();
					return $this->lblClassCourseId;
				case 'ClassInstructorIdControl':
					if (!$this->lstClassInstructor) return $this->lstClassInstructor_Create();
					return $this->lstClassInstructor;
				case 'ClassInstructorIdLabel':
					if (!$this->lblClassInstructorId) return $this->lblClassInstructorId_Create();
					return $this->lblClassInstructorId;
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
				case 'MeetingDayControl':
					if (!$this->txtMeetingDay) return $this->txtMeetingDay_Create();
					return $this->txtMeetingDay;
				case 'MeetingDayLabel':
					if (!$this->lblMeetingDay) return $this->lblMeetingDay_Create();
					return $this->lblMeetingDay;
				case 'MeetingStartTimeControl':
					if (!$this->txtMeetingStartTime) return $this->txtMeetingStartTime_Create();
					return $this->txtMeetingStartTime;
				case 'MeetingStartTimeLabel':
					if (!$this->lblMeetingStartTime) return $this->lblMeetingStartTime_Create();
					return $this->lblMeetingStartTime;
				case 'MeetingEndTimeControl':
					if (!$this->txtMeetingEndTime) return $this->txtMeetingEndTime_Create();
					return $this->txtMeetingEndTime;
				case 'MeetingEndTimeLabel':
					if (!$this->lblMeetingEndTime) return $this->lblMeetingEndTime_Create();
					return $this->lblMeetingEndTime;
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
					// Controls that point to ClassMeeting fields
					case 'SignupFormIdControl':
						return ($this->lstSignupForm = QType::Cast($mixValue, 'QControl'));
					case 'ClassTermIdControl':
						return ($this->lstClassTerm = QType::Cast($mixValue, 'QControl'));
					case 'ClassCourseIdControl':
						return ($this->lstClassCourse = QType::Cast($mixValue, 'QControl'));
					case 'ClassInstructorIdControl':
						return ($this->lstClassInstructor = QType::Cast($mixValue, 'QControl'));
					case 'DateStartControl':
						return ($this->calDateStart = QType::Cast($mixValue, 'QControl'));
					case 'DateEndControl':
						return ($this->calDateEnd = QType::Cast($mixValue, 'QControl'));
					case 'LocationControl':
						return ($this->txtLocation = QType::Cast($mixValue, 'QControl'));
					case 'MeetingDayControl':
						return ($this->txtMeetingDay = QType::Cast($mixValue, 'QControl'));
					case 'MeetingStartTimeControl':
						return ($this->txtMeetingStartTime = QType::Cast($mixValue, 'QControl'));
					case 'MeetingEndTimeControl':
						return ($this->txtMeetingEndTime = QType::Cast($mixValue, 'QControl'));
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