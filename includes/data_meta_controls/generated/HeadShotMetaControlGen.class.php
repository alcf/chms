<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the HeadShot class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single HeadShot object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a HeadShotMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read HeadShot $HeadShot the actual HeadShot data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QDateTimePicker $DateUploadedControl
	 * property-read QLabel $DateUploadedLabel
	 * property QListBox $ImageTypeIdControl
	 * property-read QLabel $ImageTypeIdLabel
	 * property QListBox $PersonAsCurrentControl
	 * property-read QLabel $PersonAsCurrentLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class HeadShotMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var HeadShot objHeadShot
		 * @access protected
		 */
		protected $objHeadShot;

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

		// Controls that allow the editing of HeadShot's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

        /**
         * @var QDateTimePicker calDateUploaded;
         * @access protected
         */
		protected $calDateUploaded;

        /**
         * @var QListBox lstImageType;
         * @access protected
         */
		protected $lstImageType;


		// Controls that allow the viewing of HeadShot's individual data fields
        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblDateUploaded
         * @access protected
         */
		protected $lblDateUploaded;

        /**
         * @var QLabel lblImageTypeId
         * @access protected
         */
		protected $lblImageTypeId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstPersonAsCurrent
         * @access protected
         */
		protected $lstPersonAsCurrent;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblPersonAsCurrent
         * @access protected
         */
		protected $lblPersonAsCurrent;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * HeadShotMetaControl to edit a single HeadShot object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single HeadShot object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HeadShotMetaControl
		 * @param HeadShot $objHeadShot new or existing HeadShot object
		 */
		 public function __construct($objParentObject, HeadShot $objHeadShot) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this HeadShotMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked HeadShot object
			$this->objHeadShot = $objHeadShot;

			// Figure out if we're Editing or Creating New
			if ($this->objHeadShot->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this HeadShotMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing HeadShot object creation - defaults to CreateOrEdit
 		 * @return HeadShotMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objHeadShot = HeadShot::Load($intId);

				// HeadShot was found -- return it!
				if ($objHeadShot)
					return new HeadShotMetaControl($objParentObject, $objHeadShot);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a HeadShot object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new HeadShotMetaControl($objParentObject, new HeadShot());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HeadShotMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing HeadShot object creation - defaults to CreateOrEdit
		 * @return HeadShotMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return HeadShotMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HeadShotMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing HeadShot object creation - defaults to CreateOrEdit
		 * @return HeadShotMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return HeadShotMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objHeadShot->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
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
				if (($this->objHeadShot->Person) && ($this->objHeadShot->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objHeadShot->Person) ? $this->objHeadShot->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QDateTimePicker calDateUploaded
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateUploaded_Create($strControlId = null) {
			$this->calDateUploaded = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateUploaded->Name = QApplication::Translate('Date Uploaded');
			$this->calDateUploaded->DateTime = $this->objHeadShot->DateUploaded;
			$this->calDateUploaded->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDateUploaded->Required = true;
			return $this->calDateUploaded;
		}

		/**
		 * Create and setup QLabel lblDateUploaded
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateUploaded_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateUploaded = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateUploaded->Name = QApplication::Translate('Date Uploaded');
			$this->strDateUploadedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateUploaded->Text = sprintf($this->objHeadShot->DateUploaded) ? $this->objHeadShot->DateUploaded->__toString($this->strDateUploadedDateTimeFormat) : null;
			$this->lblDateUploaded->Required = true;
			return $this->lblDateUploaded;
		}

		protected $strDateUploadedDateTimeFormat;

		/**
		 * Create and setup QListBox lstImageType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstImageType_Create($strControlId = null) {
			$this->lstImageType = new QListBox($this->objParentObject, $strControlId);
			$this->lstImageType->Name = QApplication::Translate('Image Type');
			$this->lstImageType->Required = true;
			foreach (ImageType::$NameArray as $intId => $strValue)
				$this->lstImageType->AddItem(new QListItem($strValue, $intId, $this->objHeadShot->ImageTypeId == $intId));
			return $this->lstImageType;
		}

		/**
		 * Create and setup QLabel lblImageTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblImageTypeId_Create($strControlId = null) {
			$this->lblImageTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblImageTypeId->Name = QApplication::Translate('Image Type');
			$this->lblImageTypeId->Text = ($this->objHeadShot->ImageTypeId) ? ImageType::$NameArray[$this->objHeadShot->ImageTypeId] : null;
			$this->lblImageTypeId->Required = true;
			return $this->lblImageTypeId;
		}

		/**
		 * Create and setup QListBox lstPersonAsCurrent
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPersonAsCurrent_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPersonAsCurrent = new QListBox($this->objParentObject, $strControlId);
			$this->lstPersonAsCurrent->Name = QApplication::Translate('Person As Current');
			$this->lstPersonAsCurrent->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if ($objPerson->CurrentHeadShotId == $this->objHeadShot->Id)
					$objListItem->Selected = true;
				$this->lstPersonAsCurrent->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPersonAsCurrent;
		}

		/**
		 * Create and setup QLabel lblPersonAsCurrent
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPersonAsCurrent_Create($strControlId = null) {
			$this->lblPersonAsCurrent = new QLabel($this->objParentObject, $strControlId);
			$this->lblPersonAsCurrent->Name = QApplication::Translate('Person As Current');
			$this->lblPersonAsCurrent->Text = ($this->objHeadShot->PersonAsCurrent) ? $this->objHeadShot->PersonAsCurrent->__toString() : null;
			return $this->lblPersonAsCurrent;
		}



		/**
		 * Refresh this MetaControl with Data from the local HeadShot object.
		 * @param boolean $blnReload reload HeadShot from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objHeadShot->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objHeadShot->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objHeadShot->Person) && ($this->objHeadShot->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objHeadShot->Person) ? $this->objHeadShot->Person->__toString() : null;

			if ($this->calDateUploaded) $this->calDateUploaded->DateTime = $this->objHeadShot->DateUploaded;
			if ($this->lblDateUploaded) $this->lblDateUploaded->Text = sprintf($this->objHeadShot->DateUploaded) ? $this->objHeadShot->__toString($this->strDateUploadedDateTimeFormat) : null;

			if ($this->lstImageType) $this->lstImageType->SelectedValue = $this->objHeadShot->ImageTypeId;
			if ($this->lblImageTypeId) $this->lblImageTypeId->Text = ($this->objHeadShot->ImageTypeId) ? ImageType::$NameArray[$this->objHeadShot->ImageTypeId] : null;

			if ($this->lstPersonAsCurrent) {
				$this->lstPersonAsCurrent->RemoveAllItems();
				$this->lstPersonAsCurrent->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if ($objPerson->CurrentHeadShotId == $this->objHeadShot->Id)
						$objListItem->Selected = true;
					$this->lstPersonAsCurrent->AddItem($objListItem);
				}
			}
			if ($this->lblPersonAsCurrent) $this->lblPersonAsCurrent->Text = ($this->objHeadShot->PersonAsCurrent) ? $this->objHeadShot->PersonAsCurrent->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC HEADSHOT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's HeadShot instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveHeadShot() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objHeadShot->PersonId = $this->lstPerson->SelectedValue;
				if ($this->calDateUploaded) $this->objHeadShot->DateUploaded = $this->calDateUploaded->DateTime;
				if ($this->lstImageType) $this->objHeadShot->ImageTypeId = $this->lstImageType->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstPersonAsCurrent) $this->objHeadShot->PersonAsCurrent = Person::Load($this->lstPersonAsCurrent->SelectedValue);

				// Save the HeadShot object
				$this->objHeadShot->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's HeadShot instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteHeadShot() {
			$this->objHeadShot->Delete();
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
				case 'HeadShot': return $this->objHeadShot;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to HeadShot fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'DateUploadedControl':
					if (!$this->calDateUploaded) return $this->calDateUploaded_Create();
					return $this->calDateUploaded;
				case 'DateUploadedLabel':
					if (!$this->lblDateUploaded) return $this->lblDateUploaded_Create();
					return $this->lblDateUploaded;
				case 'ImageTypeIdControl':
					if (!$this->lstImageType) return $this->lstImageType_Create();
					return $this->lstImageType;
				case 'ImageTypeIdLabel':
					if (!$this->lblImageTypeId) return $this->lblImageTypeId_Create();
					return $this->lblImageTypeId;
				case 'PersonAsCurrentControl':
					if (!$this->lstPersonAsCurrent) return $this->lstPersonAsCurrent_Create();
					return $this->lstPersonAsCurrent;
				case 'PersonAsCurrentLabel':
					if (!$this->lblPersonAsCurrent) return $this->lblPersonAsCurrent_Create();
					return $this->lblPersonAsCurrent;
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
					// Controls that point to HeadShot fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'DateUploadedControl':
						return ($this->calDateUploaded = QType::Cast($mixValue, 'QControl'));
					case 'ImageTypeIdControl':
						return ($this->lstImageType = QType::Cast($mixValue, 'QControl'));
					case 'PersonAsCurrentControl':
						return ($this->lstPersonAsCurrent = QType::Cast($mixValue, 'QControl'));
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