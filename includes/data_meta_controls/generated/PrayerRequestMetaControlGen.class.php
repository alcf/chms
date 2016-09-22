<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the PrayerRequest class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single PrayerRequest object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PrayerRequestMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read PrayerRequest $PrayerRequest the actual PrayerRequest data class being edited
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
	 * property QCheckBox $IsConfidentialControl
	 * property-read QLabel $IsConfidentialLabel
	 * property QCheckBox $IsInappropriateControl
	 * property-read QLabel $IsInappropriateLabel
	 * property QCheckBox $IsAllowNotesControl
	 * property-read QLabel $IsAllowNotesLabel
	 * property QCheckBox $IsPrayerIndicatorControl
	 * property-read QLabel $IsPrayerIndicatorLabel
	 * property QIntegerTextBox $PrayerCountControl
	 * property-read QLabel $PrayerCountLabel
	 * property QDateTimePicker $DateControl
	 * property-read QLabel $DateLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PrayerRequestMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var PrayerRequest objPrayerRequest
		 * @access protected
		 */
		protected $objPrayerRequest;

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

		// Controls that allow the editing of PrayerRequest's individual data fields
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
         * @var QCheckBox chkIsConfidential;
         * @access protected
         */
		protected $chkIsConfidential;

        /**
         * @var QCheckBox chkIsInappropriate;
         * @access protected
         */
		protected $chkIsInappropriate;

        /**
         * @var QCheckBox chkIsAllowNotes;
         * @access protected
         */
		protected $chkIsAllowNotes;

        /**
         * @var QCheckBox chkIsPrayerIndicator;
         * @access protected
         */
		protected $chkIsPrayerIndicator;

        /**
         * @var QIntegerTextBox txtPrayerCount;
         * @access protected
         */
		protected $txtPrayerCount;

        /**
         * @var QDateTimePicker calDate;
         * @access protected
         */
		protected $calDate;


		// Controls that allow the viewing of PrayerRequest's individual data fields
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
         * @var QLabel lblIsConfidential
         * @access protected
         */
		protected $lblIsConfidential;

        /**
         * @var QLabel lblIsInappropriate
         * @access protected
         */
		protected $lblIsInappropriate;

        /**
         * @var QLabel lblIsAllowNotes
         * @access protected
         */
		protected $lblIsAllowNotes;

        /**
         * @var QLabel lblIsPrayerIndicator
         * @access protected
         */
		protected $lblIsPrayerIndicator;

        /**
         * @var QLabel lblPrayerCount
         * @access protected
         */
		protected $lblPrayerCount;

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
		 * PrayerRequestMetaControl to edit a single PrayerRequest object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single PrayerRequest object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PrayerRequestMetaControl
		 * @param PrayerRequest $objPrayerRequest new or existing PrayerRequest object
		 */
		 public function __construct($objParentObject, PrayerRequest $objPrayerRequest) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PrayerRequestMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked PrayerRequest object
			$this->objPrayerRequest = $objPrayerRequest;

			// Figure out if we're Editing or Creating New
			if ($this->objPrayerRequest->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PrayerRequestMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing PrayerRequest object creation - defaults to CreateOrEdit
 		 * @return PrayerRequestMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objPrayerRequest = PrayerRequest::Load($intId);

				// PrayerRequest was found -- return it!
				if ($objPrayerRequest)
					return new PrayerRequestMetaControl($objParentObject, $objPrayerRequest);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a PrayerRequest object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PrayerRequestMetaControl($objParentObject, new PrayerRequest());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PrayerRequestMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PrayerRequest object creation - defaults to CreateOrEdit
		 * @return PrayerRequestMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return PrayerRequestMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PrayerRequestMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PrayerRequest object creation - defaults to CreateOrEdit
		 * @return PrayerRequestMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return PrayerRequestMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objPrayerRequest->Id;
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
			$this->txtName->Text = $this->objPrayerRequest->Name;
			$this->txtName->MaxLength = PrayerRequest::NameMaxLength;
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
			$this->lblName->Text = $this->objPrayerRequest->Name;
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
			$this->txtEmail->Text = $this->objPrayerRequest->Email;
			$this->txtEmail->MaxLength = PrayerRequest::EmailMaxLength;
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
			$this->lblEmail->Text = $this->objPrayerRequest->Email;
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
			$this->txtSubject->Text = $this->objPrayerRequest->Subject;
			$this->txtSubject->MaxLength = PrayerRequest::SubjectMaxLength;
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
			$this->lblSubject->Text = $this->objPrayerRequest->Subject;
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
			$this->txtContent->Text = $this->objPrayerRequest->Content;
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
			$this->lblContent->Text = $this->objPrayerRequest->Content;
			return $this->lblContent;
		}

		/**
		 * Create and setup QCheckBox chkIsConfidential
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkIsConfidential_Create($strControlId = null) {
			$this->chkIsConfidential = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkIsConfidential->Name = QApplication::Translate('Is Confidential');
			$this->chkIsConfidential->Checked = $this->objPrayerRequest->IsConfidential;
			return $this->chkIsConfidential;
		}

		/**
		 * Create and setup QLabel lblIsConfidential
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIsConfidential_Create($strControlId = null) {
			$this->lblIsConfidential = new QLabel($this->objParentObject, $strControlId);
			$this->lblIsConfidential->Name = QApplication::Translate('Is Confidential');
			$this->lblIsConfidential->Text = ($this->objPrayerRequest->IsConfidential) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblIsConfidential;
		}

		/**
		 * Create and setup QCheckBox chkIsInappropriate
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkIsInappropriate_Create($strControlId = null) {
			$this->chkIsInappropriate = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkIsInappropriate->Name = QApplication::Translate('Is Inappropriate');
			$this->chkIsInappropriate->Checked = $this->objPrayerRequest->IsInappropriate;
			return $this->chkIsInappropriate;
		}

		/**
		 * Create and setup QLabel lblIsInappropriate
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIsInappropriate_Create($strControlId = null) {
			$this->lblIsInappropriate = new QLabel($this->objParentObject, $strControlId);
			$this->lblIsInappropriate->Name = QApplication::Translate('Is Inappropriate');
			$this->lblIsInappropriate->Text = ($this->objPrayerRequest->IsInappropriate) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblIsInappropriate;
		}

		/**
		 * Create and setup QCheckBox chkIsAllowNotes
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkIsAllowNotes_Create($strControlId = null) {
			$this->chkIsAllowNotes = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkIsAllowNotes->Name = QApplication::Translate('Is Allow Notes');
			$this->chkIsAllowNotes->Checked = $this->objPrayerRequest->IsAllowNotes;
			return $this->chkIsAllowNotes;
		}

		/**
		 * Create and setup QLabel lblIsAllowNotes
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIsAllowNotes_Create($strControlId = null) {
			$this->lblIsAllowNotes = new QLabel($this->objParentObject, $strControlId);
			$this->lblIsAllowNotes->Name = QApplication::Translate('Is Allow Notes');
			$this->lblIsAllowNotes->Text = ($this->objPrayerRequest->IsAllowNotes) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblIsAllowNotes;
		}

		/**
		 * Create and setup QCheckBox chkIsPrayerIndicator
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkIsPrayerIndicator_Create($strControlId = null) {
			$this->chkIsPrayerIndicator = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkIsPrayerIndicator->Name = QApplication::Translate('Is Prayer Indicator');
			$this->chkIsPrayerIndicator->Checked = $this->objPrayerRequest->IsPrayerIndicator;
			return $this->chkIsPrayerIndicator;
		}

		/**
		 * Create and setup QLabel lblIsPrayerIndicator
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIsPrayerIndicator_Create($strControlId = null) {
			$this->lblIsPrayerIndicator = new QLabel($this->objParentObject, $strControlId);
			$this->lblIsPrayerIndicator->Name = QApplication::Translate('Is Prayer Indicator');
			$this->lblIsPrayerIndicator->Text = ($this->objPrayerRequest->IsPrayerIndicator) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblIsPrayerIndicator;
		}

		/**
		 * Create and setup QIntegerTextBox txtPrayerCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtPrayerCount_Create($strControlId = null) {
			$this->txtPrayerCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtPrayerCount->Name = QApplication::Translate('Prayer Count');
			$this->txtPrayerCount->Text = $this->objPrayerRequest->PrayerCount;
			return $this->txtPrayerCount;
		}

		/**
		 * Create and setup QLabel lblPrayerCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPrayerCount_Create($strControlId = null, $strFormat = null) {
			$this->lblPrayerCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrayerCount->Name = QApplication::Translate('Prayer Count');
			$this->lblPrayerCount->Text = $this->objPrayerRequest->PrayerCount;
			$this->lblPrayerCount->Format = $strFormat;
			return $this->lblPrayerCount;
		}

		/**
		 * Create and setup QDateTimePicker calDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDate_Create($strControlId = null) {
			$this->calDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDate->Name = QApplication::Translate('Date');
			$this->calDate->DateTime = $this->objPrayerRequest->Date;
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
			$this->lblDate->Text = sprintf($this->objPrayerRequest->Date) ? $this->objPrayerRequest->Date->__toString($this->strDateDateTimeFormat) : null;
			return $this->lblDate;
		}

		protected $strDateDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local PrayerRequest object.
		 * @param boolean $blnReload reload PrayerRequest from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPrayerRequest->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPrayerRequest->Id;

			if ($this->txtName) $this->txtName->Text = $this->objPrayerRequest->Name;
			if ($this->lblName) $this->lblName->Text = $this->objPrayerRequest->Name;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objPrayerRequest->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objPrayerRequest->Email;

			if ($this->txtSubject) $this->txtSubject->Text = $this->objPrayerRequest->Subject;
			if ($this->lblSubject) $this->lblSubject->Text = $this->objPrayerRequest->Subject;

			if ($this->txtContent) $this->txtContent->Text = $this->objPrayerRequest->Content;
			if ($this->lblContent) $this->lblContent->Text = $this->objPrayerRequest->Content;

			if ($this->chkIsConfidential) $this->chkIsConfidential->Checked = $this->objPrayerRequest->IsConfidential;
			if ($this->lblIsConfidential) $this->lblIsConfidential->Text = ($this->objPrayerRequest->IsConfidential) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkIsInappropriate) $this->chkIsInappropriate->Checked = $this->objPrayerRequest->IsInappropriate;
			if ($this->lblIsInappropriate) $this->lblIsInappropriate->Text = ($this->objPrayerRequest->IsInappropriate) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkIsAllowNotes) $this->chkIsAllowNotes->Checked = $this->objPrayerRequest->IsAllowNotes;
			if ($this->lblIsAllowNotes) $this->lblIsAllowNotes->Text = ($this->objPrayerRequest->IsAllowNotes) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkIsPrayerIndicator) $this->chkIsPrayerIndicator->Checked = $this->objPrayerRequest->IsPrayerIndicator;
			if ($this->lblIsPrayerIndicator) $this->lblIsPrayerIndicator->Text = ($this->objPrayerRequest->IsPrayerIndicator) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtPrayerCount) $this->txtPrayerCount->Text = $this->objPrayerRequest->PrayerCount;
			if ($this->lblPrayerCount) $this->lblPrayerCount->Text = $this->objPrayerRequest->PrayerCount;

			if ($this->calDate) $this->calDate->DateTime = $this->objPrayerRequest->Date;
			if ($this->lblDate) $this->lblDate->Text = sprintf($this->objPrayerRequest->Date) ? $this->objPrayerRequest->__toString($this->strDateDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PRAYERREQUEST OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's PrayerRequest instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePrayerRequest() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objPrayerRequest->Name = $this->txtName->Text;
				if ($this->txtEmail) $this->objPrayerRequest->Email = $this->txtEmail->Text;
				if ($this->txtSubject) $this->objPrayerRequest->Subject = $this->txtSubject->Text;
				if ($this->txtContent) $this->objPrayerRequest->Content = $this->txtContent->Text;
				if ($this->chkIsConfidential) $this->objPrayerRequest->IsConfidential = $this->chkIsConfidential->Checked;
				if ($this->chkIsInappropriate) $this->objPrayerRequest->IsInappropriate = $this->chkIsInappropriate->Checked;
				if ($this->chkIsAllowNotes) $this->objPrayerRequest->IsAllowNotes = $this->chkIsAllowNotes->Checked;
				if ($this->chkIsPrayerIndicator) $this->objPrayerRequest->IsPrayerIndicator = $this->chkIsPrayerIndicator->Checked;
				if ($this->txtPrayerCount) $this->objPrayerRequest->PrayerCount = $this->txtPrayerCount->Text;
				if ($this->calDate) $this->objPrayerRequest->Date = $this->calDate->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the PrayerRequest object
				$this->objPrayerRequest->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's PrayerRequest instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePrayerRequest() {
			$this->objPrayerRequest->Delete();
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
				case 'PrayerRequest': return $this->objPrayerRequest;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to PrayerRequest fields -- will be created dynamically if not yet created
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
				case 'IsConfidentialControl':
					if (!$this->chkIsConfidential) return $this->chkIsConfidential_Create();
					return $this->chkIsConfidential;
				case 'IsConfidentialLabel':
					if (!$this->lblIsConfidential) return $this->lblIsConfidential_Create();
					return $this->lblIsConfidential;
				case 'IsInappropriateControl':
					if (!$this->chkIsInappropriate) return $this->chkIsInappropriate_Create();
					return $this->chkIsInappropriate;
				case 'IsInappropriateLabel':
					if (!$this->lblIsInappropriate) return $this->lblIsInappropriate_Create();
					return $this->lblIsInappropriate;
				case 'IsAllowNotesControl':
					if (!$this->chkIsAllowNotes) return $this->chkIsAllowNotes_Create();
					return $this->chkIsAllowNotes;
				case 'IsAllowNotesLabel':
					if (!$this->lblIsAllowNotes) return $this->lblIsAllowNotes_Create();
					return $this->lblIsAllowNotes;
				case 'IsPrayerIndicatorControl':
					if (!$this->chkIsPrayerIndicator) return $this->chkIsPrayerIndicator_Create();
					return $this->chkIsPrayerIndicator;
				case 'IsPrayerIndicatorLabel':
					if (!$this->lblIsPrayerIndicator) return $this->lblIsPrayerIndicator_Create();
					return $this->lblIsPrayerIndicator;
				case 'PrayerCountControl':
					if (!$this->txtPrayerCount) return $this->txtPrayerCount_Create();
					return $this->txtPrayerCount;
				case 'PrayerCountLabel':
					if (!$this->lblPrayerCount) return $this->lblPrayerCount_Create();
					return $this->lblPrayerCount;
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
					// Controls that point to PrayerRequest fields
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
					case 'IsConfidentialControl':
						return ($this->chkIsConfidential = QType::Cast($mixValue, 'QControl'));
					case 'IsInappropriateControl':
						return ($this->chkIsInappropriate = QType::Cast($mixValue, 'QControl'));
					case 'IsAllowNotesControl':
						return ($this->chkIsAllowNotes = QType::Cast($mixValue, 'QControl'));
					case 'IsPrayerIndicatorControl':
						return ($this->chkIsPrayerIndicator = QType::Cast($mixValue, 'QControl'));
					case 'PrayerCountControl':
						return ($this->txtPrayerCount = QType::Cast($mixValue, 'QControl'));
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