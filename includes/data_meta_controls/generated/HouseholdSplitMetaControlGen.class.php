<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the HouseholdSplit class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single HouseholdSplit object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a HouseholdSplitMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read HouseholdSplit $HouseholdSplit the actual HouseholdSplit data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $HouseholdIdControl
	 * property-read QLabel $HouseholdIdLabel
	 * property QListBox $SplitHouseholdIdControl
	 * property-read QLabel $SplitHouseholdIdLabel
	 * property QDateTimePicker $DateSplitControl
	 * property-read QLabel $DateSplitLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class HouseholdSplitMetaControlGen extends QBaseClass {
		// General Variables
		protected $objHouseholdSplit;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of HouseholdSplit's individual data fields
		protected $lblId;
		protected $lstHousehold;
		protected $lstSplitHousehold;
		protected $calDateSplit;

		// Controls that allow the viewing of HouseholdSplit's individual data fields
		protected $lblHouseholdId;
		protected $lblSplitHouseholdId;
		protected $lblDateSplit;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * HouseholdSplitMetaControl to edit a single HouseholdSplit object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single HouseholdSplit object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdSplitMetaControl
		 * @param HouseholdSplit $objHouseholdSplit new or existing HouseholdSplit object
		 */
		 public function __construct($objParentObject, HouseholdSplit $objHouseholdSplit) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this HouseholdSplitMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked HouseholdSplit object
			$this->objHouseholdSplit = $objHouseholdSplit;

			// Figure out if we're Editing or Creating New
			if ($this->objHouseholdSplit->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdSplitMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing HouseholdSplit object creation - defaults to CreateOrEdit
 		 * @return HouseholdSplitMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objHouseholdSplit = HouseholdSplit::Load($intId);

				// HouseholdSplit was found -- return it!
				if ($objHouseholdSplit)
					return new HouseholdSplitMetaControl($objParentObject, $objHouseholdSplit);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a HouseholdSplit object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new HouseholdSplitMetaControl($objParentObject, new HouseholdSplit());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdSplitMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing HouseholdSplit object creation - defaults to CreateOrEdit
		 * @return HouseholdSplitMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return HouseholdSplitMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this HouseholdSplitMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing HouseholdSplit object creation - defaults to CreateOrEdit
		 * @return HouseholdSplitMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return HouseholdSplitMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objHouseholdSplit->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
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
				if (($this->objHouseholdSplit->Household) && ($this->objHouseholdSplit->Household->Id == $objHousehold->Id))
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
			$this->lblHouseholdId->Text = ($this->objHouseholdSplit->Household) ? $this->objHouseholdSplit->Household->__toString() : null;
			$this->lblHouseholdId->Required = true;
			return $this->lblHouseholdId;
		}

		/**
		 * Create and setup QListBox lstSplitHousehold
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSplitHousehold_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSplitHousehold = new QListBox($this->objParentObject, $strControlId);
			$this->lstSplitHousehold->Name = QApplication::Translate('Split Household');
			$this->lstSplitHousehold->Required = true;
			if (!$this->blnEditMode)
				$this->lstSplitHousehold->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSplitHouseholdCursor = Household::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSplitHousehold = Household::InstantiateCursor($objSplitHouseholdCursor)) {
				$objListItem = new QListItem($objSplitHousehold->__toString(), $objSplitHousehold->Id);
				if (($this->objHouseholdSplit->SplitHousehold) && ($this->objHouseholdSplit->SplitHousehold->Id == $objSplitHousehold->Id))
					$objListItem->Selected = true;
				$this->lstSplitHousehold->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSplitHousehold;
		}

		/**
		 * Create and setup QLabel lblSplitHouseholdId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSplitHouseholdId_Create($strControlId = null) {
			$this->lblSplitHouseholdId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSplitHouseholdId->Name = QApplication::Translate('Split Household');
			$this->lblSplitHouseholdId->Text = ($this->objHouseholdSplit->SplitHousehold) ? $this->objHouseholdSplit->SplitHousehold->__toString() : null;
			$this->lblSplitHouseholdId->Required = true;
			return $this->lblSplitHouseholdId;
		}

		/**
		 * Create and setup QDateTimePicker calDateSplit
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateSplit_Create($strControlId = null) {
			$this->calDateSplit = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateSplit->Name = QApplication::Translate('Date Split');
			$this->calDateSplit->DateTime = $this->objHouseholdSplit->DateSplit;
			$this->calDateSplit->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateSplit;
		}

		/**
		 * Create and setup QLabel lblDateSplit
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateSplit_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateSplit = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateSplit->Name = QApplication::Translate('Date Split');
			$this->strDateSplitDateTimeFormat = $strDateTimeFormat;
			$this->lblDateSplit->Text = sprintf($this->objHouseholdSplit->DateSplit) ? $this->objHouseholdSplit->DateSplit->__toString($this->strDateSplitDateTimeFormat) : null;
			return $this->lblDateSplit;
		}

		protected $strDateSplitDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local HouseholdSplit object.
		 * @param boolean $blnReload reload HouseholdSplit from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objHouseholdSplit->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objHouseholdSplit->Id;

			if ($this->lstHousehold) {
					$this->lstHousehold->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstHousehold->AddItem(QApplication::Translate('- Select One -'), null);
				$objHouseholdArray = Household::LoadAll();
				if ($objHouseholdArray) foreach ($objHouseholdArray as $objHousehold) {
					$objListItem = new QListItem($objHousehold->__toString(), $objHousehold->Id);
					if (($this->objHouseholdSplit->Household) && ($this->objHouseholdSplit->Household->Id == $objHousehold->Id))
						$objListItem->Selected = true;
					$this->lstHousehold->AddItem($objListItem);
				}
			}
			if ($this->lblHouseholdId) $this->lblHouseholdId->Text = ($this->objHouseholdSplit->Household) ? $this->objHouseholdSplit->Household->__toString() : null;

			if ($this->lstSplitHousehold) {
					$this->lstSplitHousehold->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstSplitHousehold->AddItem(QApplication::Translate('- Select One -'), null);
				$objSplitHouseholdArray = Household::LoadAll();
				if ($objSplitHouseholdArray) foreach ($objSplitHouseholdArray as $objSplitHousehold) {
					$objListItem = new QListItem($objSplitHousehold->__toString(), $objSplitHousehold->Id);
					if (($this->objHouseholdSplit->SplitHousehold) && ($this->objHouseholdSplit->SplitHousehold->Id == $objSplitHousehold->Id))
						$objListItem->Selected = true;
					$this->lstSplitHousehold->AddItem($objListItem);
				}
			}
			if ($this->lblSplitHouseholdId) $this->lblSplitHouseholdId->Text = ($this->objHouseholdSplit->SplitHousehold) ? $this->objHouseholdSplit->SplitHousehold->__toString() : null;

			if ($this->calDateSplit) $this->calDateSplit->DateTime = $this->objHouseholdSplit->DateSplit;
			if ($this->lblDateSplit) $this->lblDateSplit->Text = sprintf($this->objHouseholdSplit->DateSplit) ? $this->objHouseholdSplit->__toString($this->strDateSplitDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC HOUSEHOLDSPLIT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's HouseholdSplit instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveHouseholdSplit() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstHousehold) $this->objHouseholdSplit->HouseholdId = $this->lstHousehold->SelectedValue;
				if ($this->lstSplitHousehold) $this->objHouseholdSplit->SplitHouseholdId = $this->lstSplitHousehold->SelectedValue;
				if ($this->calDateSplit) $this->objHouseholdSplit->DateSplit = $this->calDateSplit->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the HouseholdSplit object
				$this->objHouseholdSplit->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's HouseholdSplit instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteHouseholdSplit() {
			$this->objHouseholdSplit->Delete();
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
				case 'HouseholdSplit': return $this->objHouseholdSplit;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to HouseholdSplit fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'HouseholdIdControl':
					if (!$this->lstHousehold) return $this->lstHousehold_Create();
					return $this->lstHousehold;
				case 'HouseholdIdLabel':
					if (!$this->lblHouseholdId) return $this->lblHouseholdId_Create();
					return $this->lblHouseholdId;
				case 'SplitHouseholdIdControl':
					if (!$this->lstSplitHousehold) return $this->lstSplitHousehold_Create();
					return $this->lstSplitHousehold;
				case 'SplitHouseholdIdLabel':
					if (!$this->lblSplitHouseholdId) return $this->lblSplitHouseholdId_Create();
					return $this->lblSplitHouseholdId;
				case 'DateSplitControl':
					if (!$this->calDateSplit) return $this->calDateSplit_Create();
					return $this->calDateSplit;
				case 'DateSplitLabel':
					if (!$this->lblDateSplit) return $this->lblDateSplit_Create();
					return $this->lblDateSplit;
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
					// Controls that point to HouseholdSplit fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'HouseholdIdControl':
						return ($this->lstHousehold = QType::Cast($mixValue, 'QControl'));
					case 'SplitHouseholdIdControl':
						return ($this->lstSplitHousehold = QType::Cast($mixValue, 'QControl'));
					case 'DateSplitControl':
						return ($this->calDateSplit = QType::Cast($mixValue, 'QControl'));
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