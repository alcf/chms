<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the GrowthGroupStructure class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single GrowthGroupStructure object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a GrowthGroupStructureMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read GrowthGroupStructure $GrowthGroupStructure the actual GrowthGroupStructure data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $GrowthGroupControl
	 * property-read QLabel $GrowthGroupLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class GrowthGroupStructureMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var GrowthGroupStructure objGrowthGroupStructure
		 * @access protected
		 */
		protected $objGrowthGroupStructure;

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

		// Controls that allow the editing of GrowthGroupStructure's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;


		// Controls that allow the viewing of GrowthGroupStructure's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstGrowthGroups;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblGrowthGroups;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * GrowthGroupStructureMetaControl to edit a single GrowthGroupStructure object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single GrowthGroupStructure object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupStructureMetaControl
		 * @param GrowthGroupStructure $objGrowthGroupStructure new or existing GrowthGroupStructure object
		 */
		 public function __construct($objParentObject, GrowthGroupStructure $objGrowthGroupStructure) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this GrowthGroupStructureMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked GrowthGroupStructure object
			$this->objGrowthGroupStructure = $objGrowthGroupStructure;

			// Figure out if we're Editing or Creating New
			if ($this->objGrowthGroupStructure->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupStructureMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing GrowthGroupStructure object creation - defaults to CreateOrEdit
 		 * @return GrowthGroupStructureMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objGrowthGroupStructure = GrowthGroupStructure::Load($intId);

				// GrowthGroupStructure was found -- return it!
				if ($objGrowthGroupStructure)
					return new GrowthGroupStructureMetaControl($objParentObject, $objGrowthGroupStructure);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a GrowthGroupStructure object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new GrowthGroupStructureMetaControl($objParentObject, new GrowthGroupStructure());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupStructureMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GrowthGroupStructure object creation - defaults to CreateOrEdit
		 * @return GrowthGroupStructureMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return GrowthGroupStructureMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GrowthGroupStructureMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GrowthGroupStructure object creation - defaults to CreateOrEdit
		 * @return GrowthGroupStructureMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return GrowthGroupStructureMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objGrowthGroupStructure->Id;
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
			$this->txtName->Text = $this->objGrowthGroupStructure->Name;
			$this->txtName->MaxLength = GrowthGroupStructure::NameMaxLength;
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
			$this->lblName->Text = $this->objGrowthGroupStructure->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstGrowthGroups
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGrowthGroups_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGrowthGroups = new QListBox($this->objParentObject, $strControlId);
			$this->lstGrowthGroups->Name = QApplication::Translate('Growth Groups');
			$this->lstGrowthGroups->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objGrowthGroupStructure->GetGrowthGroupArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGrowthGroupCursor = GrowthGroup::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGrowthGroup = GrowthGroup::InstantiateCursor($objGrowthGroupCursor)) {
				$objListItem = new QListItem($objGrowthGroup->__toString(), $objGrowthGroup->GroupId);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->GroupId == $objGrowthGroup->GroupId)
						$objListItem->Selected = true;
				}
				$this->lstGrowthGroups->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstGrowthGroups;
		}

		/**
		 * Create and setup QLabel lblGrowthGroups
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblGrowthGroups_Create($strControlId = null, $strGlue = ', ') {
			$this->lblGrowthGroups = new QLabel($this->objParentObject, $strControlId);
			$this->lstGrowthGroups->Name = QApplication::Translate('Growth Groups');
			
			$objAssociatedArray = $this->objGrowthGroupStructure->GetGrowthGroupArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblGrowthGroups->Text = implode($strGlue, $strItems);
			return $this->lblGrowthGroups;
		}



		/**
		 * Refresh this MetaControl with Data from the local GrowthGroupStructure object.
		 * @param boolean $blnReload reload GrowthGroupStructure from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objGrowthGroupStructure->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objGrowthGroupStructure->Id;

			if ($this->txtName) $this->txtName->Text = $this->objGrowthGroupStructure->Name;
			if ($this->lblName) $this->lblName->Text = $this->objGrowthGroupStructure->Name;

			if ($this->lstGrowthGroups) {
				$this->lstGrowthGroups->RemoveAllItems();
				$objAssociatedArray = $this->objGrowthGroupStructure->GetGrowthGroupArray();
				$objGrowthGroupArray = GrowthGroup::LoadAll();
				if ($objGrowthGroupArray) foreach ($objGrowthGroupArray as $objGrowthGroup) {
					$objListItem = new QListItem($objGrowthGroup->__toString(), $objGrowthGroup->GroupId);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->GroupId == $objGrowthGroup->GroupId)
							$objListItem->Selected = true;
					}
					$this->lstGrowthGroups->AddItem($objListItem);
				}
			}
			if ($this->lblGrowthGroups) {
				$objAssociatedArray = $this->objGrowthGroupStructure->GetGrowthGroupArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblGrowthGroups->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstGrowthGroups_Update() {
			if ($this->lstGrowthGroups) {
				$this->objGrowthGroupStructure->UnassociateAllGrowthGroups();
				$objSelectedListItems = $this->lstGrowthGroups->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objGrowthGroupStructure->AssociateGrowthGroup(GrowthGroup::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC GROWTHGROUPSTRUCTURE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's GrowthGroupStructure instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveGrowthGroupStructure() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objGrowthGroupStructure->Name = $this->txtName->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the GrowthGroupStructure object
				$this->objGrowthGroupStructure->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstGrowthGroups_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's GrowthGroupStructure instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteGrowthGroupStructure() {
			$this->objGrowthGroupStructure->UnassociateAllGrowthGroups();
			$this->objGrowthGroupStructure->Delete();
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
				case 'GrowthGroupStructure': return $this->objGrowthGroupStructure;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to GrowthGroupStructure fields -- will be created dynamically if not yet created
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
				case 'GrowthGroupControl':
					if (!$this->lstGrowthGroups) return $this->lstGrowthGroups_Create();
					return $this->lstGrowthGroups;
				case 'GrowthGroupLabel':
					if (!$this->lblGrowthGroups) return $this->lblGrowthGroups_Create();
					return $this->lblGrowthGroups;
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
					// Controls that point to GrowthGroupStructure fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'GrowthGroupControl':
						return ($this->lstGrowthGroups = QType::Cast($mixValue, 'QControl'));
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