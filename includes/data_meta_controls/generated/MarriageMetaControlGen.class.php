<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Marriage class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Marriage object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a MarriageMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Marriage $Marriage the actual Marriage data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $LinkedMarriageIdControl
	 * property-read QLabel $LinkedMarriageIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $MarriedToPersonIdControl
	 * property-read QLabel $MarriedToPersonIdLabel
	 * property QListBox $MarriageStatusTypeIdControl
	 * property-read QLabel $MarriageStatusTypeIdLabel
	 * property QDateTimePicker $DateStartControl
	 * property-read QLabel $DateStartLabel
	 * property QDateTimePicker $DateEndControl
	 * property-read QLabel $DateEndLabel
	 * property QListBox $MarriageAsLinkedControl
	 * property-read QLabel $MarriageAsLinkedLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class MarriageMetaControlGen extends QBaseClass {
		// General Variables
		protected $objMarriage;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Marriage's individual data fields
		protected $lblId;
		protected $lstLinkedMarriage;
		protected $lstPerson;
		protected $lstMarriedToPerson;
		protected $lstMarriageStatusType;
		protected $calDateStart;
		protected $calDateEnd;

		// Controls that allow the viewing of Marriage's individual data fields
		protected $lblLinkedMarriageId;
		protected $lblPersonId;
		protected $lblMarriedToPersonId;
		protected $lblMarriageStatusTypeId;
		protected $lblDateStart;
		protected $lblDateEnd;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstMarriageAsLinked;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblMarriageAsLinked;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * MarriageMetaControl to edit a single Marriage object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Marriage object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MarriageMetaControl
		 * @param Marriage $objMarriage new or existing Marriage object
		 */
		 public function __construct($objParentObject, Marriage $objMarriage) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this MarriageMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Marriage object
			$this->objMarriage = $objMarriage;

			// Figure out if we're Editing or Creating New
			if ($this->objMarriage->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this MarriageMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Marriage object creation - defaults to CreateOrEdit
 		 * @return MarriageMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objMarriage = Marriage::Load($intId);

				// Marriage was found -- return it!
				if ($objMarriage)
					return new MarriageMetaControl($objParentObject, $objMarriage);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Marriage object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new MarriageMetaControl($objParentObject, new Marriage());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MarriageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Marriage object creation - defaults to CreateOrEdit
		 * @return MarriageMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return MarriageMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MarriageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Marriage object creation - defaults to CreateOrEdit
		 * @return MarriageMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return MarriageMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objMarriage->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstLinkedMarriage
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstLinkedMarriage_Create($strControlId = null) {
			$this->lstLinkedMarriage = new QListBox($this->objParentObject, $strControlId);
			$this->lstLinkedMarriage->Name = QApplication::Translate('Linked Marriage');
			$this->lstLinkedMarriage->AddItem(QApplication::Translate('- Select One -'), null);
			$objLinkedMarriageArray = Marriage::LoadAll();
			if ($objLinkedMarriageArray) foreach ($objLinkedMarriageArray as $objLinkedMarriage) {
				$objListItem = new QListItem($objLinkedMarriage->__toString(), $objLinkedMarriage->Id);
				if (($this->objMarriage->LinkedMarriage) && ($this->objMarriage->LinkedMarriage->Id == $objLinkedMarriage->Id))
					$objListItem->Selected = true;
				$this->lstLinkedMarriage->AddItem($objListItem);
			}
			return $this->lstLinkedMarriage;
		}

		/**
		 * Create and setup QLabel lblLinkedMarriageId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLinkedMarriageId_Create($strControlId = null) {
			$this->lblLinkedMarriageId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLinkedMarriageId->Name = QApplication::Translate('Linked Marriage');
			$this->lblLinkedMarriageId->Text = ($this->objMarriage->LinkedMarriage) ? $this->objMarriage->LinkedMarriage->__toString() : null;
			return $this->lblLinkedMarriageId;
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
				if (($this->objMarriage->Person) && ($this->objMarriage->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objMarriage->Person) ? $this->objMarriage->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstMarriedToPerson
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstMarriedToPerson_Create($strControlId = null) {
			$this->lstMarriedToPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstMarriedToPerson->Name = QApplication::Translate('Married To Person');
			$this->lstMarriedToPerson->AddItem(QApplication::Translate('- Select One -'), null);
			$objMarriedToPersonArray = Person::LoadAll();
			if ($objMarriedToPersonArray) foreach ($objMarriedToPersonArray as $objMarriedToPerson) {
				$objListItem = new QListItem($objMarriedToPerson->__toString(), $objMarriedToPerson->Id);
				if (($this->objMarriage->MarriedToPerson) && ($this->objMarriage->MarriedToPerson->Id == $objMarriedToPerson->Id))
					$objListItem->Selected = true;
				$this->lstMarriedToPerson->AddItem($objListItem);
			}
			return $this->lstMarriedToPerson;
		}

		/**
		 * Create and setup QLabel lblMarriedToPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMarriedToPersonId_Create($strControlId = null) {
			$this->lblMarriedToPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblMarriedToPersonId->Name = QApplication::Translate('Married To Person');
			$this->lblMarriedToPersonId->Text = ($this->objMarriage->MarriedToPerson) ? $this->objMarriage->MarriedToPerson->__toString() : null;
			return $this->lblMarriedToPersonId;
		}

		/**
		 * Create and setup QListBox lstMarriageStatusType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstMarriageStatusType_Create($strControlId = null) {
			$this->lstMarriageStatusType = new QListBox($this->objParentObject, $strControlId);
			$this->lstMarriageStatusType->Name = QApplication::Translate('Marriage Status Type');
			$this->lstMarriageStatusType->Required = true;
			foreach (MarriageStatusType::$NameArray as $intId => $strValue)
				$this->lstMarriageStatusType->AddItem(new QListItem($strValue, $intId, $this->objMarriage->MarriageStatusTypeId == $intId));
			return $this->lstMarriageStatusType;
		}

		/**
		 * Create and setup QLabel lblMarriageStatusTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMarriageStatusTypeId_Create($strControlId = null) {
			$this->lblMarriageStatusTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblMarriageStatusTypeId->Name = QApplication::Translate('Marriage Status Type');
			$this->lblMarriageStatusTypeId->Text = ($this->objMarriage->MarriageStatusTypeId) ? MarriageStatusType::$NameArray[$this->objMarriage->MarriageStatusTypeId] : null;
			$this->lblMarriageStatusTypeId->Required = true;
			return $this->lblMarriageStatusTypeId;
		}

		/**
		 * Create and setup QDateTimePicker calDateStart
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateStart_Create($strControlId = null) {
			$this->calDateStart = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateStart->Name = QApplication::Translate('Date Start');
			$this->calDateStart->DateTime = $this->objMarriage->DateStart;
			$this->calDateStart->DateTimePickerType = QDateTimePickerType::Date;
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
			$this->lblDateStart->Text = sprintf($this->objMarriage->DateStart) ? $this->objMarriage->DateStart->__toString($this->strDateStartDateTimeFormat) : null;
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
			$this->calDateEnd->DateTime = $this->objMarriage->DateEnd;
			$this->calDateEnd->DateTimePickerType = QDateTimePickerType::Date;
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
			$this->lblDateEnd->Text = sprintf($this->objMarriage->DateEnd) ? $this->objMarriage->DateEnd->__toString($this->strDateEndDateTimeFormat) : null;
			return $this->lblDateEnd;
		}

		protected $strDateEndDateTimeFormat;

		/**
		 * Create and setup QListBox lstMarriageAsLinked
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstMarriageAsLinked_Create($strControlId = null) {
			$this->lstMarriageAsLinked = new QListBox($this->objParentObject, $strControlId);
			$this->lstMarriageAsLinked->Name = QApplication::Translate('Marriage As Linked');
			$this->lstMarriageAsLinked->AddItem(QApplication::Translate('- Select One -'), null);
			$objMarriageArray = Marriage::LoadAll();
			if ($objMarriageArray) foreach ($objMarriageArray as $objMarriage) {
				$objListItem = new QListItem($objMarriage->__toString(), $objMarriage->Id);
				if ($objMarriage->LinkedMarriageId == $this->objMarriage->Id)
					$objListItem->Selected = true;
				$this->lstMarriageAsLinked->AddItem($objListItem);
			}
			return $this->lstMarriageAsLinked;
		}

		/**
		 * Create and setup QLabel lblMarriageAsLinked
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMarriageAsLinked_Create($strControlId = null) {
			$this->lblMarriageAsLinked = new QLabel($this->objParentObject, $strControlId);
			$this->lblMarriageAsLinked->Name = QApplication::Translate('Marriage As Linked');
			$this->lblMarriageAsLinked->Text = ($this->objMarriage->MarriageAsLinked) ? $this->objMarriage->MarriageAsLinked->__toString() : null;
			return $this->lblMarriageAsLinked;
		}



		/**
		 * Refresh this MetaControl with Data from the local Marriage object.
		 * @param boolean $blnReload reload Marriage from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objMarriage->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objMarriage->Id;

			if ($this->lstLinkedMarriage) {
					$this->lstLinkedMarriage->RemoveAllItems();
				$this->lstLinkedMarriage->AddItem(QApplication::Translate('- Select One -'), null);
				$objLinkedMarriageArray = Marriage::LoadAll();
				if ($objLinkedMarriageArray) foreach ($objLinkedMarriageArray as $objLinkedMarriage) {
					$objListItem = new QListItem($objLinkedMarriage->__toString(), $objLinkedMarriage->Id);
					if (($this->objMarriage->LinkedMarriage) && ($this->objMarriage->LinkedMarriage->Id == $objLinkedMarriage->Id))
						$objListItem->Selected = true;
					$this->lstLinkedMarriage->AddItem($objListItem);
				}
			}
			if ($this->lblLinkedMarriageId) $this->lblLinkedMarriageId->Text = ($this->objMarriage->LinkedMarriage) ? $this->objMarriage->LinkedMarriage->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objMarriage->Person) && ($this->objMarriage->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objMarriage->Person) ? $this->objMarriage->Person->__toString() : null;

			if ($this->lstMarriedToPerson) {
					$this->lstMarriedToPerson->RemoveAllItems();
				$this->lstMarriedToPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objMarriedToPersonArray = Person::LoadAll();
				if ($objMarriedToPersonArray) foreach ($objMarriedToPersonArray as $objMarriedToPerson) {
					$objListItem = new QListItem($objMarriedToPerson->__toString(), $objMarriedToPerson->Id);
					if (($this->objMarriage->MarriedToPerson) && ($this->objMarriage->MarriedToPerson->Id == $objMarriedToPerson->Id))
						$objListItem->Selected = true;
					$this->lstMarriedToPerson->AddItem($objListItem);
				}
			}
			if ($this->lblMarriedToPersonId) $this->lblMarriedToPersonId->Text = ($this->objMarriage->MarriedToPerson) ? $this->objMarriage->MarriedToPerson->__toString() : null;

			if ($this->lstMarriageStatusType) $this->lstMarriageStatusType->SelectedValue = $this->objMarriage->MarriageStatusTypeId;
			if ($this->lblMarriageStatusTypeId) $this->lblMarriageStatusTypeId->Text = ($this->objMarriage->MarriageStatusTypeId) ? MarriageStatusType::$NameArray[$this->objMarriage->MarriageStatusTypeId] : null;

			if ($this->calDateStart) $this->calDateStart->DateTime = $this->objMarriage->DateStart;
			if ($this->lblDateStart) $this->lblDateStart->Text = sprintf($this->objMarriage->DateStart) ? $this->objMarriage->__toString($this->strDateStartDateTimeFormat) : null;

			if ($this->calDateEnd) $this->calDateEnd->DateTime = $this->objMarriage->DateEnd;
			if ($this->lblDateEnd) $this->lblDateEnd->Text = sprintf($this->objMarriage->DateEnd) ? $this->objMarriage->__toString($this->strDateEndDateTimeFormat) : null;

			if ($this->lstMarriageAsLinked) {
				$this->lstMarriageAsLinked->RemoveAllItems();
				$this->lstMarriageAsLinked->AddItem(QApplication::Translate('- Select One -'), null);
				$objMarriageArray = Marriage::LoadAll();
				if ($objMarriageArray) foreach ($objMarriageArray as $objMarriage) {
					$objListItem = new QListItem($objMarriage->__toString(), $objMarriage->Id);
					if ($objMarriage->LinkedMarriageId == $this->objMarriage->Id)
						$objListItem->Selected = true;
					$this->lstMarriageAsLinked->AddItem($objListItem);
				}
			}
			if ($this->lblMarriageAsLinked) $this->lblMarriageAsLinked->Text = ($this->objMarriage->MarriageAsLinked) ? $this->objMarriage->MarriageAsLinked->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC MARRIAGE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Marriage instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveMarriage() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstLinkedMarriage) $this->objMarriage->LinkedMarriageId = $this->lstLinkedMarriage->SelectedValue;
				if ($this->lstPerson) $this->objMarriage->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstMarriedToPerson) $this->objMarriage->MarriedToPersonId = $this->lstMarriedToPerson->SelectedValue;
				if ($this->lstMarriageStatusType) $this->objMarriage->MarriageStatusTypeId = $this->lstMarriageStatusType->SelectedValue;
				if ($this->calDateStart) $this->objMarriage->DateStart = $this->calDateStart->DateTime;
				if ($this->calDateEnd) $this->objMarriage->DateEnd = $this->calDateEnd->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstMarriageAsLinked) $this->objMarriage->MarriageAsLinked = Marriage::Load($this->lstMarriageAsLinked->SelectedValue);

				// Save the Marriage object
				$this->objMarriage->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Marriage instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteMarriage() {
			$this->objMarriage->Delete();
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
				case 'Marriage': return $this->objMarriage;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Marriage fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'LinkedMarriageIdControl':
					if (!$this->lstLinkedMarriage) return $this->lstLinkedMarriage_Create();
					return $this->lstLinkedMarriage;
				case 'LinkedMarriageIdLabel':
					if (!$this->lblLinkedMarriageId) return $this->lblLinkedMarriageId_Create();
					return $this->lblLinkedMarriageId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'MarriedToPersonIdControl':
					if (!$this->lstMarriedToPerson) return $this->lstMarriedToPerson_Create();
					return $this->lstMarriedToPerson;
				case 'MarriedToPersonIdLabel':
					if (!$this->lblMarriedToPersonId) return $this->lblMarriedToPersonId_Create();
					return $this->lblMarriedToPersonId;
				case 'MarriageStatusTypeIdControl':
					if (!$this->lstMarriageStatusType) return $this->lstMarriageStatusType_Create();
					return $this->lstMarriageStatusType;
				case 'MarriageStatusTypeIdLabel':
					if (!$this->lblMarriageStatusTypeId) return $this->lblMarriageStatusTypeId_Create();
					return $this->lblMarriageStatusTypeId;
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
				case 'MarriageAsLinkedControl':
					if (!$this->lstMarriageAsLinked) return $this->lstMarriageAsLinked_Create();
					return $this->lstMarriageAsLinked;
				case 'MarriageAsLinkedLabel':
					if (!$this->lblMarriageAsLinked) return $this->lblMarriageAsLinked_Create();
					return $this->lblMarriageAsLinked;
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
					// Controls that point to Marriage fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'LinkedMarriageIdControl':
						return ($this->lstLinkedMarriage = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'MarriedToPersonIdControl':
						return ($this->lstMarriedToPerson = QType::Cast($mixValue, 'QControl'));
					case 'MarriageStatusTypeIdControl':
						return ($this->lstMarriageStatusType = QType::Cast($mixValue, 'QControl'));
					case 'DateStartControl':
						return ($this->calDateStart = QType::Cast($mixValue, 'QControl'));
					case 'DateEndControl':
						return ($this->calDateEnd = QType::Cast($mixValue, 'QControl'));
					case 'MarriageAsLinkedControl':
						return ($this->lstMarriageAsLinked = QType::Cast($mixValue, 'QControl'));
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