<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ClassRegistration class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ClassRegistration object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ClassRegistrationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read ClassRegistration $ClassRegistration the actual ClassRegistration data class being edited
	 * property QListBox $SignupEntryIdControl
	 * property-read QLabel $SignupEntryIdLabel
	 * property QListBox $ClassMeetingIdControl
	 * property-read QLabel $ClassMeetingIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $ClassGradeIdControl
	 * property-read QLabel $ClassGradeIdLabel
	 * property QTextBox $ChildcareNotesControl
	 * property-read QLabel $ChildcareNotesLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ClassRegistrationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ClassRegistration objClassRegistration
		 * @access protected
		 */
		protected $objClassRegistration;

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

		// Controls that allow the editing of ClassRegistration's individual data fields
        /**
         * @var QListBox lstSignupEntry;
         * @access protected
         */
		protected $lstSignupEntry;

        /**
         * @var QListBox lstClassMeeting;
         * @access protected
         */
		protected $lstClassMeeting;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

        /**
         * @var QListBox lstClassGrade;
         * @access protected
         */
		protected $lstClassGrade;

        /**
         * @var QTextBox txtChildcareNotes;
         * @access protected
         */
		protected $txtChildcareNotes;


		// Controls that allow the viewing of ClassRegistration's individual data fields
        /**
         * @var QLabel lblSignupEntryId
         * @access protected
         */
		protected $lblSignupEntryId;

        /**
         * @var QLabel lblClassMeetingId
         * @access protected
         */
		protected $lblClassMeetingId;

        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblClassGradeId
         * @access protected
         */
		protected $lblClassGradeId;

        /**
         * @var QLabel lblChildcareNotes
         * @access protected
         */
		protected $lblChildcareNotes;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ClassRegistrationMetaControl to edit a single ClassRegistration object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ClassRegistration object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassRegistrationMetaControl
		 * @param ClassRegistration $objClassRegistration new or existing ClassRegistration object
		 */
		 public function __construct($objParentObject, ClassRegistration $objClassRegistration) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ClassRegistrationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ClassRegistration object
			$this->objClassRegistration = $objClassRegistration;

			// Figure out if we're Editing or Creating New
			if ($this->objClassRegistration->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassRegistrationMetaControl
		 * @param integer $intSignupEntryId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ClassRegistration object creation - defaults to CreateOrEdit
 		 * @return ClassRegistrationMetaControl
		 */
		public static function Create($objParentObject, $intSignupEntryId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intSignupEntryId)) {
				$objClassRegistration = ClassRegistration::Load($intSignupEntryId);

				// ClassRegistration was found -- return it!
				if ($objClassRegistration)
					return new ClassRegistrationMetaControl($objParentObject, $objClassRegistration);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ClassRegistration object with PK arguments: ' . $intSignupEntryId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ClassRegistrationMetaControl($objParentObject, new ClassRegistration());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassRegistrationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassRegistration object creation - defaults to CreateOrEdit
		 * @return ClassRegistrationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intSignupEntryId = QApplication::PathInfo(0);
			return ClassRegistrationMetaControl::Create($objParentObject, $intSignupEntryId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ClassRegistrationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ClassRegistration object creation - defaults to CreateOrEdit
		 * @return ClassRegistrationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intSignupEntryId = QApplication::QueryString('intSignupEntryId');
			return ClassRegistrationMetaControl::Create($objParentObject, $intSignupEntryId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstSignupEntry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSignupEntry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSignupEntry = new QListBox($this->objParentObject, $strControlId);
			$this->lstSignupEntry->Name = QApplication::Translate('Signup Entry');
			$this->lstSignupEntry->Required = true;
			if (!$this->blnEditMode)
				$this->lstSignupEntry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSignupEntryCursor = SignupEntry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSignupEntry = SignupEntry::InstantiateCursor($objSignupEntryCursor)) {
				$objListItem = new QListItem($objSignupEntry->__toString(), $objSignupEntry->Id);
				if (($this->objClassRegistration->SignupEntry) && ($this->objClassRegistration->SignupEntry->Id == $objSignupEntry->Id))
					$objListItem->Selected = true;
				$this->lstSignupEntry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSignupEntry;
		}

		/**
		 * Create and setup QLabel lblSignupEntryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSignupEntryId_Create($strControlId = null) {
			$this->lblSignupEntryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupEntryId->Name = QApplication::Translate('Signup Entry');
			$this->lblSignupEntryId->Text = ($this->objClassRegistration->SignupEntry) ? $this->objClassRegistration->SignupEntry->__toString() : null;
			$this->lblSignupEntryId->Required = true;
			return $this->lblSignupEntryId;
		}

		/**
		 * Create and setup QListBox lstClassMeeting
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstClassMeeting_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstClassMeeting = new QListBox($this->objParentObject, $strControlId);
			$this->lstClassMeeting->Name = QApplication::Translate('Class Meeting');
			$this->lstClassMeeting->Required = true;
			if (!$this->blnEditMode)
				$this->lstClassMeeting->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objClassMeetingCursor = ClassMeeting::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objClassMeeting = ClassMeeting::InstantiateCursor($objClassMeetingCursor)) {
				$objListItem = new QListItem($objClassMeeting->__toString(), $objClassMeeting->SignupFormId);
				if (($this->objClassRegistration->ClassMeeting) && ($this->objClassRegistration->ClassMeeting->SignupFormId == $objClassMeeting->SignupFormId))
					$objListItem->Selected = true;
				$this->lstClassMeeting->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstClassMeeting;
		}

		/**
		 * Create and setup QLabel lblClassMeetingId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblClassMeetingId_Create($strControlId = null) {
			$this->lblClassMeetingId = new QLabel($this->objParentObject, $strControlId);
			$this->lblClassMeetingId->Name = QApplication::Translate('Class Meeting');
			$this->lblClassMeetingId->Text = ($this->objClassRegistration->ClassMeeting) ? $this->objClassRegistration->ClassMeeting->__toString() : null;
			$this->lblClassMeetingId->Required = true;
			return $this->lblClassMeetingId;
		}

		/**
		 * Create and setup QListBox lstPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPerson->Name = QApplication::Translate('Person');
			$this->lstPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objClassRegistration->Person) && ($this->objClassRegistration->Person->Id == $objPerson->Id))
					$objListItem->Selected = true;
				$this->lstPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPerson;
		}

		/**
		 * Create and setup QLabel lblPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPersonId_Create($strControlId = null) {
			$this->lblPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPersonId->Name = QApplication::Translate('Person');
			$this->lblPersonId->Text = ($this->objClassRegistration->Person) ? $this->objClassRegistration->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstClassGrade
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstClassGrade_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstClassGrade = new QListBox($this->objParentObject, $strControlId);
			$this->lstClassGrade->Name = QApplication::Translate('Class Grade');
			$this->lstClassGrade->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objClassGradeCursor = ClassGrade::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objClassGrade = ClassGrade::InstantiateCursor($objClassGradeCursor)) {
				$objListItem = new QListItem($objClassGrade->__toString(), $objClassGrade->Id);
				if (($this->objClassRegistration->ClassGrade) && ($this->objClassRegistration->ClassGrade->Id == $objClassGrade->Id))
					$objListItem->Selected = true;
				$this->lstClassGrade->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstClassGrade;
		}

		/**
		 * Create and setup QLabel lblClassGradeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblClassGradeId_Create($strControlId = null) {
			$this->lblClassGradeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblClassGradeId->Name = QApplication::Translate('Class Grade');
			$this->lblClassGradeId->Text = ($this->objClassRegistration->ClassGrade) ? $this->objClassRegistration->ClassGrade->__toString() : null;
			return $this->lblClassGradeId;
		}

		/**
		 * Create and setup QTextBox txtChildcareNotes
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtChildcareNotes_Create($strControlId = null) {
			$this->txtChildcareNotes = new QTextBox($this->objParentObject, $strControlId);
			$this->txtChildcareNotes->Name = QApplication::Translate('Childcare Notes');
			$this->txtChildcareNotes->Text = $this->objClassRegistration->ChildcareNotes;
			$this->txtChildcareNotes->TextMode = QTextMode::MultiLine;
			return $this->txtChildcareNotes;
		}

		/**
		 * Create and setup QLabel lblChildcareNotes
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblChildcareNotes_Create($strControlId = null) {
			$this->lblChildcareNotes = new QLabel($this->objParentObject, $strControlId);
			$this->lblChildcareNotes->Name = QApplication::Translate('Childcare Notes');
			$this->lblChildcareNotes->Text = $this->objClassRegistration->ChildcareNotes;
			return $this->lblChildcareNotes;
		}



		/**
		 * Refresh this MetaControl with Data from the local ClassRegistration object.
		 * @param boolean $blnReload reload ClassRegistration from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objClassRegistration->Reload();

			if ($this->lstSignupEntry) {
					$this->lstSignupEntry->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstSignupEntry->AddItem(QApplication::Translate('- Select One -'), null);
				$objSignupEntryArray = SignupEntry::LoadAll();
				if ($objSignupEntryArray) foreach ($objSignupEntryArray as $objSignupEntry) {
					$objListItem = new QListItem($objSignupEntry->__toString(), $objSignupEntry->Id);
					if (($this->objClassRegistration->SignupEntry) && ($this->objClassRegistration->SignupEntry->Id == $objSignupEntry->Id))
						$objListItem->Selected = true;
					$this->lstSignupEntry->AddItem($objListItem);
				}
			}
			if ($this->lblSignupEntryId) $this->lblSignupEntryId->Text = ($this->objClassRegistration->SignupEntry) ? $this->objClassRegistration->SignupEntry->__toString() : null;

			if ($this->lstClassMeeting) {
					$this->lstClassMeeting->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstClassMeeting->AddItem(QApplication::Translate('- Select One -'), null);
				$objClassMeetingArray = ClassMeeting::LoadAll();
				if ($objClassMeetingArray) foreach ($objClassMeetingArray as $objClassMeeting) {
					$objListItem = new QListItem($objClassMeeting->__toString(), $objClassMeeting->SignupFormId);
					if (($this->objClassRegistration->ClassMeeting) && ($this->objClassRegistration->ClassMeeting->SignupFormId == $objClassMeeting->SignupFormId))
						$objListItem->Selected = true;
					$this->lstClassMeeting->AddItem($objListItem);
				}
			}
			if ($this->lblClassMeetingId) $this->lblClassMeetingId->Text = ($this->objClassRegistration->ClassMeeting) ? $this->objClassRegistration->ClassMeeting->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objClassRegistration->Person) && ($this->objClassRegistration->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objClassRegistration->Person) ? $this->objClassRegistration->Person->__toString() : null;

			if ($this->lstClassGrade) {
					$this->lstClassGrade->RemoveAllItems();
				$this->lstClassGrade->AddItem(QApplication::Translate('- Select One -'), null);
				$objClassGradeArray = ClassGrade::LoadAll();
				if ($objClassGradeArray) foreach ($objClassGradeArray as $objClassGrade) {
					$objListItem = new QListItem($objClassGrade->__toString(), $objClassGrade->Id);
					if (($this->objClassRegistration->ClassGrade) && ($this->objClassRegistration->ClassGrade->Id == $objClassGrade->Id))
						$objListItem->Selected = true;
					$this->lstClassGrade->AddItem($objListItem);
				}
			}
			if ($this->lblClassGradeId) $this->lblClassGradeId->Text = ($this->objClassRegistration->ClassGrade) ? $this->objClassRegistration->ClassGrade->__toString() : null;

			if ($this->txtChildcareNotes) $this->txtChildcareNotes->Text = $this->objClassRegistration->ChildcareNotes;
			if ($this->lblChildcareNotes) $this->lblChildcareNotes->Text = $this->objClassRegistration->ChildcareNotes;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CLASSREGISTRATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ClassRegistration instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveClassRegistration() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstSignupEntry) $this->objClassRegistration->SignupEntryId = $this->lstSignupEntry->SelectedValue;
				if ($this->lstClassMeeting) $this->objClassRegistration->ClassMeetingId = $this->lstClassMeeting->SelectedValue;
				if ($this->lstPerson) $this->objClassRegistration->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstClassGrade) $this->objClassRegistration->ClassGradeId = $this->lstClassGrade->SelectedValue;
				if ($this->txtChildcareNotes) $this->objClassRegistration->ChildcareNotes = $this->txtChildcareNotes->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ClassRegistration object
				$this->objClassRegistration->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ClassRegistration instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteClassRegistration() {
			$this->objClassRegistration->Delete();
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
				case 'ClassRegistration': return $this->objClassRegistration;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ClassRegistration fields -- will be created dynamically if not yet created
				case 'SignupEntryIdControl':
					if (!$this->lstSignupEntry) return $this->lstSignupEntry_Create();
					return $this->lstSignupEntry;
				case 'SignupEntryIdLabel':
					if (!$this->lblSignupEntryId) return $this->lblSignupEntryId_Create();
					return $this->lblSignupEntryId;
				case 'ClassMeetingIdControl':
					if (!$this->lstClassMeeting) return $this->lstClassMeeting_Create();
					return $this->lstClassMeeting;
				case 'ClassMeetingIdLabel':
					if (!$this->lblClassMeetingId) return $this->lblClassMeetingId_Create();
					return $this->lblClassMeetingId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'ClassGradeIdControl':
					if (!$this->lstClassGrade) return $this->lstClassGrade_Create();
					return $this->lstClassGrade;
				case 'ClassGradeIdLabel':
					if (!$this->lblClassGradeId) return $this->lblClassGradeId_Create();
					return $this->lblClassGradeId;
				case 'ChildcareNotesControl':
					if (!$this->txtChildcareNotes) return $this->txtChildcareNotes_Create();
					return $this->txtChildcareNotes;
				case 'ChildcareNotesLabel':
					if (!$this->lblChildcareNotes) return $this->lblChildcareNotes_Create();
					return $this->lblChildcareNotes;
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
					// Controls that point to ClassRegistration fields
					case 'SignupEntryIdControl':
						return ($this->lstSignupEntry = QType::Cast($mixValue, 'QControl'));
					case 'ClassMeetingIdControl':
						return ($this->lstClassMeeting = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'ClassGradeIdControl':
						return ($this->lstClassGrade = QType::Cast($mixValue, 'QControl'));
					case 'ChildcareNotesControl':
						return ($this->txtChildcareNotes = QType::Cast($mixValue, 'QControl'));
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