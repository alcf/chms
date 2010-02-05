<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the MugShot class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single MugShot object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a MugShotMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read MugShot $MugShot the actual MugShot data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QDateTimePicker $DateUploadedControl
	 * property-read QLabel $DateUploadedLabel
	 * property QListBox $PersonAsCurrentControl
	 * property-read QLabel $PersonAsCurrentLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class MugShotMetaControlGen extends QBaseClass {
		// General Variables
		protected $objMugShot;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of MugShot's individual data fields
		protected $lblId;
		protected $lstPerson;
		protected $calDateUploaded;

		// Controls that allow the viewing of MugShot's individual data fields
		protected $lblPersonId;
		protected $lblDateUploaded;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstPersonAsCurrent;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblPersonAsCurrent;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * MugShotMetaControl to edit a single MugShot object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single MugShot object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MugShotMetaControl
		 * @param MugShot $objMugShot new or existing MugShot object
		 */
		 public function __construct($objParentObject, MugShot $objMugShot) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this MugShotMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked MugShot object
			$this->objMugShot = $objMugShot;

			// Figure out if we're Editing or Creating New
			if ($this->objMugShot->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this MugShotMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing MugShot object creation - defaults to CreateOrEdit
 		 * @return MugShotMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objMugShot = MugShot::Load($intId);

				// MugShot was found -- return it!
				if ($objMugShot)
					return new MugShotMetaControl($objParentObject, $objMugShot);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a MugShot object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new MugShotMetaControl($objParentObject, new MugShot());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MugShotMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing MugShot object creation - defaults to CreateOrEdit
		 * @return MugShotMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return MugShotMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MugShotMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing MugShot object creation - defaults to CreateOrEdit
		 * @return MugShotMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return MugShotMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objMugShot->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstPerson
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPerson_Create($strControlId = null) {
			$this->lstPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPerson->Name = QApplication::Translate('Person');
			$this->lstPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
			$objPersonArray = Person::LoadAll();
			if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objMugShot->Person) && ($this->objMugShot->Person->Id == $objPerson->Id))
					$objListItem->Selected = true;
				$this->lstPerson->AddItem($objListItem);
			}
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
			$this->lblPersonId->Text = ($this->objMugShot->Person) ? $this->objMugShot->Person->__toString() : null;
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
			$this->calDateUploaded->DateTime = $this->objMugShot->DateUploaded;
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
			$this->lblDateUploaded->Text = sprintf($this->objMugShot->DateUploaded) ? $this->objMugShot->DateUploaded->__toString($this->strDateUploadedDateTimeFormat) : null;
			$this->lblDateUploaded->Required = true;
			return $this->lblDateUploaded;
		}

		protected $strDateUploadedDateTimeFormat;

		/**
		 * Create and setup QListBox lstPersonAsCurrent
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPersonAsCurrent_Create($strControlId = null) {
			$this->lstPersonAsCurrent = new QListBox($this->objParentObject, $strControlId);
			$this->lstPersonAsCurrent->Name = QApplication::Translate('Person As Current');
			$this->lstPersonAsCurrent->AddItem(QApplication::Translate('- Select One -'), null);
			$objPersonArray = Person::LoadAll();
			if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if ($objPerson->CurrentMugShotId == $this->objMugShot->Id)
					$objListItem->Selected = true;
				$this->lstPersonAsCurrent->AddItem($objListItem);
			}
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
			$this->lblPersonAsCurrent->Text = ($this->objMugShot->PersonAsCurrent) ? $this->objMugShot->PersonAsCurrent->__toString() : null;
			return $this->lblPersonAsCurrent;
		}



		/**
		 * Refresh this MetaControl with Data from the local MugShot object.
		 * @param boolean $blnReload reload MugShot from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objMugShot->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objMugShot->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objMugShot->Person) && ($this->objMugShot->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objMugShot->Person) ? $this->objMugShot->Person->__toString() : null;

			if ($this->calDateUploaded) $this->calDateUploaded->DateTime = $this->objMugShot->DateUploaded;
			if ($this->lblDateUploaded) $this->lblDateUploaded->Text = sprintf($this->objMugShot->DateUploaded) ? $this->objMugShot->__toString($this->strDateUploadedDateTimeFormat) : null;

			if ($this->lstPersonAsCurrent) {
				$this->lstPersonAsCurrent->RemoveAllItems();
				$this->lstPersonAsCurrent->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if ($objPerson->CurrentMugShotId == $this->objMugShot->Id)
						$objListItem->Selected = true;
					$this->lstPersonAsCurrent->AddItem($objListItem);
				}
			}
			if ($this->lblPersonAsCurrent) $this->lblPersonAsCurrent->Text = ($this->objMugShot->PersonAsCurrent) ? $this->objMugShot->PersonAsCurrent->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC MUGSHOT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's MugShot instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveMugShot() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objMugShot->PersonId = $this->lstPerson->SelectedValue;
				if ($this->calDateUploaded) $this->objMugShot->DateUploaded = $this->calDateUploaded->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstPersonAsCurrent) $this->objMugShot->PersonAsCurrent = Person::Load($this->lstPersonAsCurrent->SelectedValue);

				// Save the MugShot object
				$this->objMugShot->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's MugShot instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteMugShot() {
			$this->objMugShot->Delete();
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
				case 'MugShot': return $this->objMugShot;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to MugShot fields -- will be created dynamically if not yet created
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
					// Controls that point to MugShot fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'DateUploadedControl':
						return ($this->calDateUploaded = QType::Cast($mixValue, 'QControl'));
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