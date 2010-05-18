<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the GroupParticipation class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single GroupParticipation object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a GroupParticipationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read GroupParticipation $GroupParticipation the actual GroupParticipation data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $GroupIdControl
	 * property-read QLabel $GroupIdLabel
	 * property QListBox $GroupRoleIdControl
	 * property-read QLabel $GroupRoleIdLabel
	 * property QDateTimePicker $DateStartControl
	 * property-read QLabel $DateStartLabel
	 * property QDateTimePicker $DateEndControl
	 * property-read QLabel $DateEndLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class GroupParticipationMetaControlGen extends QBaseClass {
		// General Variables
		protected $objGroupParticipation;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of GroupParticipation's individual data fields
		protected $lblId;
		protected $lstPerson;
		protected $lstGroup;
		protected $lstGroupRole;
		protected $calDateStart;
		protected $calDateEnd;

		// Controls that allow the viewing of GroupParticipation's individual data fields
		protected $lblPersonId;
		protected $lblGroupId;
		protected $lblGroupRoleId;
		protected $lblDateStart;
		protected $lblDateEnd;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * GroupParticipationMetaControl to edit a single GroupParticipation object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single GroupParticipation object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupParticipationMetaControl
		 * @param GroupParticipation $objGroupParticipation new or existing GroupParticipation object
		 */
		 public function __construct($objParentObject, GroupParticipation $objGroupParticipation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this GroupParticipationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked GroupParticipation object
			$this->objGroupParticipation = $objGroupParticipation;

			// Figure out if we're Editing or Creating New
			if ($this->objGroupParticipation->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupParticipationMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing GroupParticipation object creation - defaults to CreateOrEdit
 		 * @return GroupParticipationMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objGroupParticipation = GroupParticipation::Load($intId);

				// GroupParticipation was found -- return it!
				if ($objGroupParticipation)
					return new GroupParticipationMetaControl($objParentObject, $objGroupParticipation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a GroupParticipation object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new GroupParticipationMetaControl($objParentObject, new GroupParticipation());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupParticipationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GroupParticipation object creation - defaults to CreateOrEdit
		 * @return GroupParticipationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return GroupParticipationMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupParticipationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GroupParticipation object creation - defaults to CreateOrEdit
		 * @return GroupParticipationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return GroupParticipationMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objGroupParticipation->Id;
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
				if (($this->objGroupParticipation->Person) && ($this->objGroupParticipation->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objGroupParticipation->Person) ? $this->objGroupParticipation->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstGroup
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGroup_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGroup = new QListBox($this->objParentObject, $strControlId);
			$this->lstGroup->Name = QApplication::Translate('Group');
			$this->lstGroup->Required = true;
			if (!$this->blnEditMode)
				$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGroupCursor = Group::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGroup = Group::InstantiateCursor($objGroupCursor)) {
				$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
				if (($this->objGroupParticipation->Group) && ($this->objGroupParticipation->Group->Id == $objGroup->Id))
					$objListItem->Selected = true;
				$this->lstGroup->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstGroup;
		}

		/**
		 * Create and setup QLabel lblGroupId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupId_Create($strControlId = null) {
			$this->lblGroupId = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupId->Name = QApplication::Translate('Group');
			$this->lblGroupId->Text = ($this->objGroupParticipation->Group) ? $this->objGroupParticipation->Group->__toString() : null;
			$this->lblGroupId->Required = true;
			return $this->lblGroupId;
		}

		/**
		 * Create and setup QListBox lstGroupRole
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGroupRole_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGroupRole = new QListBox($this->objParentObject, $strControlId);
			$this->lstGroupRole->Name = QApplication::Translate('Group Role');
			$this->lstGroupRole->Required = true;
			if (!$this->blnEditMode)
				$this->lstGroupRole->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGroupRoleCursor = GroupRole::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGroupRole = GroupRole::InstantiateCursor($objGroupRoleCursor)) {
				$objListItem = new QListItem($objGroupRole->__toString(), $objGroupRole->Id);
				if (($this->objGroupParticipation->GroupRole) && ($this->objGroupParticipation->GroupRole->Id == $objGroupRole->Id))
					$objListItem->Selected = true;
				$this->lstGroupRole->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstGroupRole;
		}

		/**
		 * Create and setup QLabel lblGroupRoleId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupRoleId_Create($strControlId = null) {
			$this->lblGroupRoleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupRoleId->Name = QApplication::Translate('Group Role');
			$this->lblGroupRoleId->Text = ($this->objGroupParticipation->GroupRole) ? $this->objGroupParticipation->GroupRole->__toString() : null;
			$this->lblGroupRoleId->Required = true;
			return $this->lblGroupRoleId;
		}

		/**
		 * Create and setup QDateTimePicker calDateStart
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateStart_Create($strControlId = null) {
			$this->calDateStart = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateStart->Name = QApplication::Translate('Date Start');
			$this->calDateStart->DateTime = $this->objGroupParticipation->DateStart;
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
			$this->lblDateStart->Text = sprintf($this->objGroupParticipation->DateStart) ? $this->objGroupParticipation->DateStart->__toString($this->strDateStartDateTimeFormat) : null;
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
			$this->calDateEnd->DateTime = $this->objGroupParticipation->DateEnd;
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
			$this->lblDateEnd->Text = sprintf($this->objGroupParticipation->DateEnd) ? $this->objGroupParticipation->DateEnd->__toString($this->strDateEndDateTimeFormat) : null;
			return $this->lblDateEnd;
		}

		protected $strDateEndDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local GroupParticipation object.
		 * @param boolean $blnReload reload GroupParticipation from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objGroupParticipation->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objGroupParticipation->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objGroupParticipation->Person) && ($this->objGroupParticipation->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objGroupParticipation->Person) ? $this->objGroupParticipation->Person->__toString() : null;

			if ($this->lstGroup) {
					$this->lstGroup->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupArray = Group::LoadAll();
				if ($objGroupArray) foreach ($objGroupArray as $objGroup) {
					$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
					if (($this->objGroupParticipation->Group) && ($this->objGroupParticipation->Group->Id == $objGroup->Id))
						$objListItem->Selected = true;
					$this->lstGroup->AddItem($objListItem);
				}
			}
			if ($this->lblGroupId) $this->lblGroupId->Text = ($this->objGroupParticipation->Group) ? $this->objGroupParticipation->Group->__toString() : null;

			if ($this->lstGroupRole) {
					$this->lstGroupRole->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstGroupRole->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupRoleArray = GroupRole::LoadAll();
				if ($objGroupRoleArray) foreach ($objGroupRoleArray as $objGroupRole) {
					$objListItem = new QListItem($objGroupRole->__toString(), $objGroupRole->Id);
					if (($this->objGroupParticipation->GroupRole) && ($this->objGroupParticipation->GroupRole->Id == $objGroupRole->Id))
						$objListItem->Selected = true;
					$this->lstGroupRole->AddItem($objListItem);
				}
			}
			if ($this->lblGroupRoleId) $this->lblGroupRoleId->Text = ($this->objGroupParticipation->GroupRole) ? $this->objGroupParticipation->GroupRole->__toString() : null;

			if ($this->calDateStart) $this->calDateStart->DateTime = $this->objGroupParticipation->DateStart;
			if ($this->lblDateStart) $this->lblDateStart->Text = sprintf($this->objGroupParticipation->DateStart) ? $this->objGroupParticipation->__toString($this->strDateStartDateTimeFormat) : null;

			if ($this->calDateEnd) $this->calDateEnd->DateTime = $this->objGroupParticipation->DateEnd;
			if ($this->lblDateEnd) $this->lblDateEnd->Text = sprintf($this->objGroupParticipation->DateEnd) ? $this->objGroupParticipation->__toString($this->strDateEndDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC GROUPPARTICIPATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's GroupParticipation instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveGroupParticipation() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objGroupParticipation->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstGroup) $this->objGroupParticipation->GroupId = $this->lstGroup->SelectedValue;
				if ($this->lstGroupRole) $this->objGroupParticipation->GroupRoleId = $this->lstGroupRole->SelectedValue;
				if ($this->calDateStart) $this->objGroupParticipation->DateStart = $this->calDateStart->DateTime;
				if ($this->calDateEnd) $this->objGroupParticipation->DateEnd = $this->calDateEnd->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the GroupParticipation object
				$this->objGroupParticipation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's GroupParticipation instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteGroupParticipation() {
			$this->objGroupParticipation->Delete();
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
				case 'GroupParticipation': return $this->objGroupParticipation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to GroupParticipation fields -- will be created dynamically if not yet created
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
				case 'GroupIdControl':
					if (!$this->lstGroup) return $this->lstGroup_Create();
					return $this->lstGroup;
				case 'GroupIdLabel':
					if (!$this->lblGroupId) return $this->lblGroupId_Create();
					return $this->lblGroupId;
				case 'GroupRoleIdControl':
					if (!$this->lstGroupRole) return $this->lstGroupRole_Create();
					return $this->lstGroupRole;
				case 'GroupRoleIdLabel':
					if (!$this->lblGroupRoleId) return $this->lblGroupRoleId_Create();
					return $this->lblGroupRoleId;
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
					// Controls that point to GroupParticipation fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'GroupIdControl':
						return ($this->lstGroup = QType::Cast($mixValue, 'QControl'));
					case 'GroupRoleIdControl':
						return ($this->lstGroupRole = QType::Cast($mixValue, 'QControl'));
					case 'DateStartControl':
						return ($this->calDateStart = QType::Cast($mixValue, 'QControl'));
					case 'DateEndControl':
						return ($this->calDateEnd = QType::Cast($mixValue, 'QControl'));
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