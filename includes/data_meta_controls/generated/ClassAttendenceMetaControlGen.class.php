<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ClassAttendence class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ClassAttendence object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ClassAttendenceMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ClassAttendence $ClassAttendence the actual ClassAttendence data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $ClassRegistrationIdControl
	 * property-read QLabel $ClassRegistrationIdLabel
	 * property QIntegerTextBox $MeetingNumberControl
	 * property-read QLabel $MeetingNumberLabel
	 * property QCheckBox $PresentFlagControl
	 * property-read QLabel $PresentFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ClassAttendenceMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ClassAttendence objClassAttendence
		 * @access protected
		 */
		protected $objClassAttendence;

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

		// Controls that allow the editing of ClassAttendence's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstClassRegistration;
         * @access protected
         */
		protected $lstClassRegistration;

        /**
         * @var QIntegerTextBox txtMeetingNumber;
         * @access protected
         */
		protected $txtMeetingNumber;

        /**
         * @var QCheckBox chkPresentFlag;
         * @access protected
         */
		protected $chkPresentFlag;


		// Controls that allow the viewing of ClassAttendence's individual data fields
        /**
         * @var QLabel lblClassRegistrationId
         * @access protected
         */
		protected $lblClassRegistrationId;

        /**
         * @var QLabel lblMeetingNumber
         * @access protected
         */
		protected $lblMeetingNumber;

        /**
         * @var QLabel lblPresentFlag
         * @access protected
         */
		protected $lblPresentFlag;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ClassAttendenceMetaControl to edit a single ClassAttendence object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ClassAttendence object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassAttendenceMetaControl
		 * @param ClassAttendence $objClassAttendence new or existing ClassAttendence object
		 */
		 public function __construct($objParentObject, ClassAttendence $objClassAttendence) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ClassAttendenceMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ClassAttendence object
			$this->objClassAttendence = $objClassAttendence;

			// Figure out if we're Editing or Creating New
			if ($this->objClassAttendence->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassAttendenceMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ClassAttendence object creation - defaults to CreateOrEdit
 		 * @return ClassAttendenceMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objClassAttendence = ClassAttendence::Load($intId);

				// ClassAttendence was found -- return it!
				if ($objClassAttendence)
					return new ClassAttendenceMetaControl($objParentObject, $objClassAttendence);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ClassAttendence object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ClassAttendenceMetaControl($objParentObject, new ClassAttendence());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassAttendenceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassAttendence object creation - defaults to CreateOrEdit
		 * @return ClassAttendenceMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ClassAttendenceMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassAttendenceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassAttendence object creation - defaults to CreateOrEdit
		 * @return ClassAttendenceMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ClassAttendenceMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objClassAttendence->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstClassRegistration
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstClassRegistration_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstClassRegistration = new QListBox($this->objParentObject, $strControlId);
			$this->lstClassRegistration->Name = QApplication::Translate('Class Registration');
			$this->lstClassRegistration->Required = true;
			if (!$this->blnEditMode)
				$this->lstClassRegistration->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objClassRegistrationCursor = ClassRegistration::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objClassRegistration = ClassRegistration::InstantiateCursor($objClassRegistrationCursor)) {
				$objListItem = new QListItem($objClassRegistration->__toString(), $objClassRegistration->SignupEntryId);
				if (($this->objClassAttendence->ClassRegistration) && ($this->objClassAttendence->ClassRegistration->SignupEntryId == $objClassRegistration->SignupEntryId))
					$objListItem->Selected = true;
				$this->lstClassRegistration->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstClassRegistration;
		}

		/**
		 * Create and setup QLabel lblClassRegistrationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblClassRegistrationId_Create($strControlId = null) {
			$this->lblClassRegistrationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblClassRegistrationId->Name = QApplication::Translate('Class Registration');
			$this->lblClassRegistrationId->Text = ($this->objClassAttendence->ClassRegistration) ? $this->objClassAttendence->ClassRegistration->__toString() : null;
			$this->lblClassRegistrationId->Required = true;
			return $this->lblClassRegistrationId;
		}

		/**
		 * Create and setup QIntegerTextBox txtMeetingNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtMeetingNumber_Create($strControlId = null) {
			$this->txtMeetingNumber = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtMeetingNumber->Name = QApplication::Translate('Meeting Number');
			$this->txtMeetingNumber->Text = $this->objClassAttendence->MeetingNumber;
			$this->txtMeetingNumber->Required = true;
			return $this->txtMeetingNumber;
		}

		/**
		 * Create and setup QLabel lblMeetingNumber
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblMeetingNumber_Create($strControlId = null, $strFormat = null) {
			$this->lblMeetingNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblMeetingNumber->Name = QApplication::Translate('Meeting Number');
			$this->lblMeetingNumber->Text = $this->objClassAttendence->MeetingNumber;
			$this->lblMeetingNumber->Required = true;
			$this->lblMeetingNumber->Format = $strFormat;
			return $this->lblMeetingNumber;
		}

		/**
		 * Create and setup QCheckBox chkPresentFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkPresentFlag_Create($strControlId = null) {
			$this->chkPresentFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkPresentFlag->Name = QApplication::Translate('Present Flag');
			$this->chkPresentFlag->Checked = $this->objClassAttendence->PresentFlag;
			return $this->chkPresentFlag;
		}

		/**
		 * Create and setup QLabel lblPresentFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPresentFlag_Create($strControlId = null) {
			$this->lblPresentFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblPresentFlag->Name = QApplication::Translate('Present Flag');
			$this->lblPresentFlag->Text = ($this->objClassAttendence->PresentFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblPresentFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local ClassAttendence object.
		 * @param boolean $blnReload reload ClassAttendence from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objClassAttendence->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objClassAttendence->Id;

			if ($this->lstClassRegistration) {
					$this->lstClassRegistration->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstClassRegistration->AddItem(QApplication::Translate('- Select One -'), null);
				$objClassRegistrationArray = ClassRegistration::LoadAll();
				if ($objClassRegistrationArray) foreach ($objClassRegistrationArray as $objClassRegistration) {
					$objListItem = new QListItem($objClassRegistration->__toString(), $objClassRegistration->SignupEntryId);
					if (($this->objClassAttendence->ClassRegistration) && ($this->objClassAttendence->ClassRegistration->SignupEntryId == $objClassRegistration->SignupEntryId))
						$objListItem->Selected = true;
					$this->lstClassRegistration->AddItem($objListItem);
				}
			}
			if ($this->lblClassRegistrationId) $this->lblClassRegistrationId->Text = ($this->objClassAttendence->ClassRegistration) ? $this->objClassAttendence->ClassRegistration->__toString() : null;

			if ($this->txtMeetingNumber) $this->txtMeetingNumber->Text = $this->objClassAttendence->MeetingNumber;
			if ($this->lblMeetingNumber) $this->lblMeetingNumber->Text = $this->objClassAttendence->MeetingNumber;

			if ($this->chkPresentFlag) $this->chkPresentFlag->Checked = $this->objClassAttendence->PresentFlag;
			if ($this->lblPresentFlag) $this->lblPresentFlag->Text = ($this->objClassAttendence->PresentFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CLASSATTENDENCE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ClassAttendence instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveClassAttendence() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstClassRegistration) $this->objClassAttendence->ClassRegistrationId = $this->lstClassRegistration->SelectedValue;
				if ($this->txtMeetingNumber) $this->objClassAttendence->MeetingNumber = $this->txtMeetingNumber->Text;
				if ($this->chkPresentFlag) $this->objClassAttendence->PresentFlag = $this->chkPresentFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ClassAttendence object
				$this->objClassAttendence->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ClassAttendence instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteClassAttendence() {
			$this->objClassAttendence->Delete();
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
				case 'ClassAttendence': return $this->objClassAttendence;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ClassAttendence fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ClassRegistrationIdControl':
					if (!$this->lstClassRegistration) return $this->lstClassRegistration_Create();
					return $this->lstClassRegistration;
				case 'ClassRegistrationIdLabel':
					if (!$this->lblClassRegistrationId) return $this->lblClassRegistrationId_Create();
					return $this->lblClassRegistrationId;
				case 'MeetingNumberControl':
					if (!$this->txtMeetingNumber) return $this->txtMeetingNumber_Create();
					return $this->txtMeetingNumber;
				case 'MeetingNumberLabel':
					if (!$this->lblMeetingNumber) return $this->lblMeetingNumber_Create();
					return $this->lblMeetingNumber;
				case 'PresentFlagControl':
					if (!$this->chkPresentFlag) return $this->chkPresentFlag_Create();
					return $this->chkPresentFlag;
				case 'PresentFlagLabel':
					if (!$this->lblPresentFlag) return $this->lblPresentFlag_Create();
					return $this->lblPresentFlag;
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
					// Controls that point to ClassAttendence fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ClassRegistrationIdControl':
						return ($this->lstClassRegistration = QType::Cast($mixValue, 'QControl'));
					case 'MeetingNumberControl':
						return ($this->txtMeetingNumber = QType::Cast($mixValue, 'QControl'));
					case 'PresentFlagControl':
						return ($this->chkPresentFlag = QType::Cast($mixValue, 'QControl'));
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