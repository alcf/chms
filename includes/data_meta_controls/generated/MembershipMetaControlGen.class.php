<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Membership class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Membership object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a MembershipMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Membership $Membership the actual Membership data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QDateTimePicker $DateStartControl
	 * property-read QLabel $DateStartLabel
	 * property QDateTimePicker $DateEndControl
	 * property-read QLabel $DateEndLabel
	 * property QTextBox $TerminationReasonControl
	 * property-read QLabel $TerminationReasonLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class MembershipMetaControlGen extends QBaseClass {
		// General Variables
		protected $objMembership;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Membership's individual data fields
		protected $lblId;
		protected $lstPerson;
		protected $calDateStart;
		protected $calDateEnd;
		protected $txtTerminationReason;

		// Controls that allow the viewing of Membership's individual data fields
		protected $lblPersonId;
		protected $lblDateStart;
		protected $lblDateEnd;
		protected $lblTerminationReason;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * MembershipMetaControl to edit a single Membership object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Membership object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MembershipMetaControl
		 * @param Membership $objMembership new or existing Membership object
		 */
		 public function __construct($objParentObject, Membership $objMembership) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this MembershipMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Membership object
			$this->objMembership = $objMembership;

			// Figure out if we're Editing or Creating New
			if ($this->objMembership->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this MembershipMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Membership object creation - defaults to CreateOrEdit
 		 * @return MembershipMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objMembership = Membership::Load($intId);

				// Membership was found -- return it!
				if ($objMembership)
					return new MembershipMetaControl($objParentObject, $objMembership);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Membership object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new MembershipMetaControl($objParentObject, new Membership());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MembershipMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Membership object creation - defaults to CreateOrEdit
		 * @return MembershipMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return MembershipMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MembershipMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Membership object creation - defaults to CreateOrEdit
		 * @return MembershipMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return MembershipMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objMembership->Id;
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
				if (($this->objMembership->Person) && ($this->objMembership->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objMembership->Person) ? $this->objMembership->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QDateTimePicker calDateStart
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateStart_Create($strControlId = null) {
			$this->calDateStart = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateStart->Name = QApplication::Translate('Date Start');
			$this->calDateStart->DateTime = $this->objMembership->DateStart;
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
			$this->lblDateStart->Text = sprintf($this->objMembership->DateStart) ? $this->objMembership->DateStart->__toString($this->strDateStartDateTimeFormat) : null;
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
			$this->calDateEnd->DateTime = $this->objMembership->DateEnd;
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
			$this->lblDateEnd->Text = sprintf($this->objMembership->DateEnd) ? $this->objMembership->DateEnd->__toString($this->strDateEndDateTimeFormat) : null;
			return $this->lblDateEnd;
		}

		protected $strDateEndDateTimeFormat;

		/**
		 * Create and setup QTextBox txtTerminationReason
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTerminationReason_Create($strControlId = null) {
			$this->txtTerminationReason = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTerminationReason->Name = QApplication::Translate('Termination Reason');
			$this->txtTerminationReason->Text = $this->objMembership->TerminationReason;
			$this->txtTerminationReason->TextMode = QTextMode::MultiLine;
			return $this->txtTerminationReason;
		}

		/**
		 * Create and setup QLabel lblTerminationReason
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTerminationReason_Create($strControlId = null) {
			$this->lblTerminationReason = new QLabel($this->objParentObject, $strControlId);
			$this->lblTerminationReason->Name = QApplication::Translate('Termination Reason');
			$this->lblTerminationReason->Text = $this->objMembership->TerminationReason;
			return $this->lblTerminationReason;
		}



		/**
		 * Refresh this MetaControl with Data from the local Membership object.
		 * @param boolean $blnReload reload Membership from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objMembership->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objMembership->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objMembership->Person) && ($this->objMembership->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objMembership->Person) ? $this->objMembership->Person->__toString() : null;

			if ($this->calDateStart) $this->calDateStart->DateTime = $this->objMembership->DateStart;
			if ($this->lblDateStart) $this->lblDateStart->Text = sprintf($this->objMembership->DateStart) ? $this->objMembership->__toString($this->strDateStartDateTimeFormat) : null;

			if ($this->calDateEnd) $this->calDateEnd->DateTime = $this->objMembership->DateEnd;
			if ($this->lblDateEnd) $this->lblDateEnd->Text = sprintf($this->objMembership->DateEnd) ? $this->objMembership->__toString($this->strDateEndDateTimeFormat) : null;

			if ($this->txtTerminationReason) $this->txtTerminationReason->Text = $this->objMembership->TerminationReason;
			if ($this->lblTerminationReason) $this->lblTerminationReason->Text = $this->objMembership->TerminationReason;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC MEMBERSHIP OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Membership instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveMembership() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objMembership->PersonId = $this->lstPerson->SelectedValue;
				if ($this->calDateStart) $this->objMembership->DateStart = $this->calDateStart->DateTime;
				if ($this->calDateEnd) $this->objMembership->DateEnd = $this->calDateEnd->DateTime;
				if ($this->txtTerminationReason) $this->objMembership->TerminationReason = $this->txtTerminationReason->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Membership object
				$this->objMembership->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Membership instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteMembership() {
			$this->objMembership->Delete();
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
				case 'Membership': return $this->objMembership;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Membership fields -- will be created dynamically if not yet created
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
				case 'TerminationReasonControl':
					if (!$this->txtTerminationReason) return $this->txtTerminationReason_Create();
					return $this->txtTerminationReason;
				case 'TerminationReasonLabel':
					if (!$this->lblTerminationReason) return $this->lblTerminationReason_Create();
					return $this->lblTerminationReason;
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
					// Controls that point to Membership fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'DateStartControl':
						return ($this->calDateStart = QType::Cast($mixValue, 'QControl'));
					case 'DateEndControl':
						return ($this->calDateEnd = QType::Cast($mixValue, 'QControl'));
					case 'TerminationReasonControl':
						return ($this->txtTerminationReason = QType::Cast($mixValue, 'QControl'));
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