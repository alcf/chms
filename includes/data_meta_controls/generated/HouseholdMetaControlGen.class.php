<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Household class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Household object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a HouseholdMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Household $Household the actual Household data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $HeadPersonIdControl
	 * property-read QLabel $HeadPersonIdLabel
	 * property QTextBox $MembersControl
	 * property-read QLabel $MembersLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class HouseholdMetaControlGen extends QBaseClass {
		// General Variables
		protected $objHousehold;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Household's individual data fields
		protected $lblId;
		protected $txtName;
		protected $lstHeadPerson;
		protected $txtMembers;

		// Controls that allow the viewing of Household's individual data fields
		protected $lblName;
		protected $lblHeadPersonId;
		protected $lblMembers;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * HouseholdMetaControl to edit a single Household object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Household object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdMetaControl
		 * @param Household $objHousehold new or existing Household object
		 */
		 public function __construct($objParentObject, Household $objHousehold) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this HouseholdMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Household object
			$this->objHousehold = $objHousehold;

			// Figure out if we're Editing or Creating New
			if ($this->objHousehold->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Household object creation - defaults to CreateOrEdit
 		 * @return HouseholdMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objHousehold = Household::Load($intId);

				// Household was found -- return it!
				if ($objHousehold)
					return new HouseholdMetaControl($objParentObject, $objHousehold);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Household object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new HouseholdMetaControl($objParentObject, new Household());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Household object creation - defaults to CreateOrEdit
		 * @return HouseholdMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return HouseholdMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Household object creation - defaults to CreateOrEdit
		 * @return HouseholdMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return HouseholdMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objHousehold->Id;
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
			$this->txtName->Text = $this->objHousehold->Name;
			$this->txtName->MaxLength = Household::NameMaxLength;
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
			$this->lblName->Text = $this->objHousehold->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstHeadPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstHeadPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstHeadPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstHeadPerson->Name = QApplication::Translate('Head Person');
			$this->lstHeadPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstHeadPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objHeadPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objHeadPerson = Person::InstantiateCursor($objHeadPersonCursor)) {
				$objListItem = new QListItem($objHeadPerson->__toString(), $objHeadPerson->Id);
				if (($this->objHousehold->HeadPerson) && ($this->objHousehold->HeadPerson->Id == $objHeadPerson->Id))
					$objListItem->Selected = true;
				$this->lstHeadPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstHeadPerson;
		}

		/**
		 * Create and setup QLabel lblHeadPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblHeadPersonId_Create($strControlId = null) {
			$this->lblHeadPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblHeadPersonId->Name = QApplication::Translate('Head Person');
			$this->lblHeadPersonId->Text = ($this->objHousehold->HeadPerson) ? $this->objHousehold->HeadPerson->__toString() : null;
			$this->lblHeadPersonId->Required = true;
			return $this->lblHeadPersonId;
		}

		/**
		 * Create and setup QTextBox txtMembers
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMembers_Create($strControlId = null) {
			$this->txtMembers = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMembers->Name = QApplication::Translate('Members');
			$this->txtMembers->Text = $this->objHousehold->Members;
			$this->txtMembers->MaxLength = Household::MembersMaxLength;
			return $this->txtMembers;
		}

		/**
		 * Create and setup QLabel lblMembers
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMembers_Create($strControlId = null) {
			$this->lblMembers = new QLabel($this->objParentObject, $strControlId);
			$this->lblMembers->Name = QApplication::Translate('Members');
			$this->lblMembers->Text = $this->objHousehold->Members;
			return $this->lblMembers;
		}



		/**
		 * Refresh this MetaControl with Data from the local Household object.
		 * @param boolean $blnReload reload Household from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objHousehold->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objHousehold->Id;

			if ($this->txtName) $this->txtName->Text = $this->objHousehold->Name;
			if ($this->lblName) $this->lblName->Text = $this->objHousehold->Name;

			if ($this->lstHeadPerson) {
					$this->lstHeadPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstHeadPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objHeadPersonArray = Person::LoadAll();
				if ($objHeadPersonArray) foreach ($objHeadPersonArray as $objHeadPerson) {
					$objListItem = new QListItem($objHeadPerson->__toString(), $objHeadPerson->Id);
					if (($this->objHousehold->HeadPerson) && ($this->objHousehold->HeadPerson->Id == $objHeadPerson->Id))
						$objListItem->Selected = true;
					$this->lstHeadPerson->AddItem($objListItem);
				}
			}
			if ($this->lblHeadPersonId) $this->lblHeadPersonId->Text = ($this->objHousehold->HeadPerson) ? $this->objHousehold->HeadPerson->__toString() : null;

			if ($this->txtMembers) $this->txtMembers->Text = $this->objHousehold->Members;
			if ($this->lblMembers) $this->lblMembers->Text = $this->objHousehold->Members;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC HOUSEHOLD OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Household instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveHousehold() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objHousehold->Name = $this->txtName->Text;
				if ($this->lstHeadPerson) $this->objHousehold->HeadPersonId = $this->lstHeadPerson->SelectedValue;
				if ($this->txtMembers) $this->objHousehold->Members = $this->txtMembers->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Household object
				$this->objHousehold->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Household instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteHousehold() {
			$this->objHousehold->Delete();
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
				case 'Household': return $this->objHousehold;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Household fields -- will be created dynamically if not yet created
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
				case 'HeadPersonIdControl':
					if (!$this->lstHeadPerson) return $this->lstHeadPerson_Create();
					return $this->lstHeadPerson;
				case 'HeadPersonIdLabel':
					if (!$this->lblHeadPersonId) return $this->lblHeadPersonId_Create();
					return $this->lblHeadPersonId;
				case 'MembersControl':
					if (!$this->txtMembers) return $this->txtMembers_Create();
					return $this->txtMembers;
				case 'MembersLabel':
					if (!$this->lblMembers) return $this->lblMembers_Create();
					return $this->lblMembers;
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
					// Controls that point to Household fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'HeadPersonIdControl':
						return ($this->lstHeadPerson = QType::Cast($mixValue, 'QControl'));
					case 'MembersControl':
						return ($this->txtMembers = QType::Cast($mixValue, 'QControl'));
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