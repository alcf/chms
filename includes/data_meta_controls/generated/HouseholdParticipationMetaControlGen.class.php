<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the HouseholdParticipation class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single HouseholdParticipation object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a HouseholdParticipationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read HouseholdParticipation $HouseholdParticipation the actual HouseholdParticipation data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $HouseholdIdControl
	 * property-read QLabel $HouseholdIdLabel
	 * property QTextBox $RoleControl
	 * property-read QLabel $RoleLabel
	 * property QTextBox $RoleOverrideControl
	 * property-read QLabel $RoleOverrideLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class HouseholdParticipationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var HouseholdParticipation objHouseholdParticipation
		 * @access protected
		 */
		protected $objHouseholdParticipation;

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

		// Controls that allow the editing of HouseholdParticipation's individual data fields
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
         * @var QListBox lstHousehold;
         * @access protected
         */
		protected $lstHousehold;

        /**
         * @var QTextBox txtRole;
         * @access protected
         */
		protected $txtRole;

        /**
         * @var QTextBox txtRoleOverride;
         * @access protected
         */
		protected $txtRoleOverride;


		// Controls that allow the viewing of HouseholdParticipation's individual data fields
        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblHouseholdId
         * @access protected
         */
		protected $lblHouseholdId;

        /**
         * @var QLabel lblRole
         * @access protected
         */
		protected $lblRole;

        /**
         * @var QLabel lblRoleOverride
         * @access protected
         */
		protected $lblRoleOverride;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * HouseholdParticipationMetaControl to edit a single HouseholdParticipation object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single HouseholdParticipation object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdParticipationMetaControl
		 * @param HouseholdParticipation $objHouseholdParticipation new or existing HouseholdParticipation object
		 */
		 public function __construct($objParentObject, HouseholdParticipation $objHouseholdParticipation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this HouseholdParticipationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked HouseholdParticipation object
			$this->objHouseholdParticipation = $objHouseholdParticipation;

			// Figure out if we're Editing or Creating New
			if ($this->objHouseholdParticipation->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdParticipationMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing HouseholdParticipation object creation - defaults to CreateOrEdit
 		 * @return HouseholdParticipationMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objHouseholdParticipation = HouseholdParticipation::Load($intId);

				// HouseholdParticipation was found -- return it!
				if ($objHouseholdParticipation)
					return new HouseholdParticipationMetaControl($objParentObject, $objHouseholdParticipation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a HouseholdParticipation object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new HouseholdParticipationMetaControl($objParentObject, new HouseholdParticipation());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdParticipationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing HouseholdParticipation object creation - defaults to CreateOrEdit
		 * @return HouseholdParticipationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return HouseholdParticipationMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdParticipationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing HouseholdParticipation object creation - defaults to CreateOrEdit
		 * @return HouseholdParticipationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return HouseholdParticipationMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objHouseholdParticipation->Id;
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
				if (($this->objHouseholdParticipation->Person) && ($this->objHouseholdParticipation->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objHouseholdParticipation->Person) ? $this->objHouseholdParticipation->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstHousehold
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstHousehold_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstHousehold = new QListBox($this->objParentObject, $strControlId);
			$this->lstHousehold->Name = QApplication::Translate('Household');
			$this->lstHousehold->Required = true;
			if (!$this->blnEditMode)
				$this->lstHousehold->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objHouseholdCursor = Household::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objHousehold = Household::InstantiateCursor($objHouseholdCursor)) {
				$objListItem = new QListItem($objHousehold->__toString(), $objHousehold->Id);
				if (($this->objHouseholdParticipation->Household) && ($this->objHouseholdParticipation->Household->Id == $objHousehold->Id))
					$objListItem->Selected = true;
				$this->lstHousehold->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstHousehold;
		}

		/**
		 * Create and setup QLabel lblHouseholdId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblHouseholdId_Create($strControlId = null) {
			$this->lblHouseholdId = new QLabel($this->objParentObject, $strControlId);
			$this->lblHouseholdId->Name = QApplication::Translate('Household');
			$this->lblHouseholdId->Text = ($this->objHouseholdParticipation->Household) ? $this->objHouseholdParticipation->Household->__toString() : null;
			$this->lblHouseholdId->Required = true;
			return $this->lblHouseholdId;
		}

		/**
		 * Create and setup QTextBox txtRole
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtRole_Create($strControlId = null) {
			$this->txtRole = new QTextBox($this->objParentObject, $strControlId);
			$this->txtRole->Name = QApplication::Translate('Role');
			$this->txtRole->Text = $this->objHouseholdParticipation->Role;
			$this->txtRole->MaxLength = HouseholdParticipation::RoleMaxLength;
			return $this->txtRole;
		}

		/**
		 * Create and setup QLabel lblRole
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRole_Create($strControlId = null) {
			$this->lblRole = new QLabel($this->objParentObject, $strControlId);
			$this->lblRole->Name = QApplication::Translate('Role');
			$this->lblRole->Text = $this->objHouseholdParticipation->Role;
			return $this->lblRole;
		}

		/**
		 * Create and setup QTextBox txtRoleOverride
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtRoleOverride_Create($strControlId = null) {
			$this->txtRoleOverride = new QTextBox($this->objParentObject, $strControlId);
			$this->txtRoleOverride->Name = QApplication::Translate('Role Override');
			$this->txtRoleOverride->Text = $this->objHouseholdParticipation->RoleOverride;
			$this->txtRoleOverride->MaxLength = HouseholdParticipation::RoleOverrideMaxLength;
			return $this->txtRoleOverride;
		}

		/**
		 * Create and setup QLabel lblRoleOverride
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRoleOverride_Create($strControlId = null) {
			$this->lblRoleOverride = new QLabel($this->objParentObject, $strControlId);
			$this->lblRoleOverride->Name = QApplication::Translate('Role Override');
			$this->lblRoleOverride->Text = $this->objHouseholdParticipation->RoleOverride;
			return $this->lblRoleOverride;
		}



		/**
		 * Refresh this MetaControl with Data from the local HouseholdParticipation object.
		 * @param boolean $blnReload reload HouseholdParticipation from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objHouseholdParticipation->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objHouseholdParticipation->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objHouseholdParticipation->Person) && ($this->objHouseholdParticipation->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objHouseholdParticipation->Person) ? $this->objHouseholdParticipation->Person->__toString() : null;

			if ($this->lstHousehold) {
					$this->lstHousehold->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstHousehold->AddItem(QApplication::Translate('- Select One -'), null);
				$objHouseholdArray = Household::LoadAll();
				if ($objHouseholdArray) foreach ($objHouseholdArray as $objHousehold) {
					$objListItem = new QListItem($objHousehold->__toString(), $objHousehold->Id);
					if (($this->objHouseholdParticipation->Household) && ($this->objHouseholdParticipation->Household->Id == $objHousehold->Id))
						$objListItem->Selected = true;
					$this->lstHousehold->AddItem($objListItem);
				}
			}
			if ($this->lblHouseholdId) $this->lblHouseholdId->Text = ($this->objHouseholdParticipation->Household) ? $this->objHouseholdParticipation->Household->__toString() : null;

			if ($this->txtRole) $this->txtRole->Text = $this->objHouseholdParticipation->Role;
			if ($this->lblRole) $this->lblRole->Text = $this->objHouseholdParticipation->Role;

			if ($this->txtRoleOverride) $this->txtRoleOverride->Text = $this->objHouseholdParticipation->RoleOverride;
			if ($this->lblRoleOverride) $this->lblRoleOverride->Text = $this->objHouseholdParticipation->RoleOverride;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC HOUSEHOLDPARTICIPATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's HouseholdParticipation instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveHouseholdParticipation() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objHouseholdParticipation->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstHousehold) $this->objHouseholdParticipation->HouseholdId = $this->lstHousehold->SelectedValue;
				if ($this->txtRole) $this->objHouseholdParticipation->Role = $this->txtRole->Text;
				if ($this->txtRoleOverride) $this->objHouseholdParticipation->RoleOverride = $this->txtRoleOverride->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the HouseholdParticipation object
				$this->objHouseholdParticipation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's HouseholdParticipation instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteHouseholdParticipation() {
			$this->objHouseholdParticipation->Delete();
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
				case 'HouseholdParticipation': return $this->objHouseholdParticipation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to HouseholdParticipation fields -- will be created dynamically if not yet created
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
				case 'HouseholdIdControl':
					if (!$this->lstHousehold) return $this->lstHousehold_Create();
					return $this->lstHousehold;
				case 'HouseholdIdLabel':
					if (!$this->lblHouseholdId) return $this->lblHouseholdId_Create();
					return $this->lblHouseholdId;
				case 'RoleControl':
					if (!$this->txtRole) return $this->txtRole_Create();
					return $this->txtRole;
				case 'RoleLabel':
					if (!$this->lblRole) return $this->lblRole_Create();
					return $this->lblRole;
				case 'RoleOverrideControl':
					if (!$this->txtRoleOverride) return $this->txtRoleOverride_Create();
					return $this->txtRoleOverride;
				case 'RoleOverrideLabel':
					if (!$this->lblRoleOverride) return $this->lblRoleOverride_Create();
					return $this->lblRoleOverride;
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
					// Controls that point to HouseholdParticipation fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'HouseholdIdControl':
						return ($this->lstHousehold = QType::Cast($mixValue, 'QControl'));
					case 'RoleControl':
						return ($this->txtRole = QType::Cast($mixValue, 'QControl'));
					case 'RoleOverrideControl':
						return ($this->txtRoleOverride = QType::Cast($mixValue, 'QControl'));
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