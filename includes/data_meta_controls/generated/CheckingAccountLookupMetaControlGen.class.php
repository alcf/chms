<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the CheckingAccountLookup class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single CheckingAccountLookup object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CheckingAccountLookupMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read CheckingAccountLookup $CheckingAccountLookup the actual CheckingAccountLookup data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $TransitHashControl
	 * property-read QLabel $TransitHashLabel
	 * property QTextBox $AccountHashControl
	 * property-read QLabel $AccountHashLabel
	 * property QListBox $PersonControl
	 * property-read QLabel $PersonLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CheckingAccountLookupMetaControlGen extends QBaseClass {
		// General Variables
		protected $objCheckingAccountLookup;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of CheckingAccountLookup's individual data fields
		protected $lblId;
		protected $txtTransitHash;
		protected $txtAccountHash;

		// Controls that allow the viewing of CheckingAccountLookup's individual data fields
		protected $lblTransitHash;
		protected $lblAccountHash;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstPeople;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblPeople;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CheckingAccountLookupMetaControl to edit a single CheckingAccountLookup object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single CheckingAccountLookup object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CheckingAccountLookupMetaControl
		 * @param CheckingAccountLookup $objCheckingAccountLookup new or existing CheckingAccountLookup object
		 */
		 public function __construct($objParentObject, CheckingAccountLookup $objCheckingAccountLookup) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CheckingAccountLookupMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked CheckingAccountLookup object
			$this->objCheckingAccountLookup = $objCheckingAccountLookup;

			// Figure out if we're Editing or Creating New
			if ($this->objCheckingAccountLookup->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CheckingAccountLookupMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing CheckingAccountLookup object creation - defaults to CreateOrEdit
 		 * @return CheckingAccountLookupMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objCheckingAccountLookup = CheckingAccountLookup::Load($intId);

				// CheckingAccountLookup was found -- return it!
				if ($objCheckingAccountLookup)
					return new CheckingAccountLookupMetaControl($objParentObject, $objCheckingAccountLookup);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a CheckingAccountLookup object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CheckingAccountLookupMetaControl($objParentObject, new CheckingAccountLookup());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CheckingAccountLookupMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CheckingAccountLookup object creation - defaults to CreateOrEdit
		 * @return CheckingAccountLookupMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return CheckingAccountLookupMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CheckingAccountLookupMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CheckingAccountLookup object creation - defaults to CreateOrEdit
		 * @return CheckingAccountLookupMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return CheckingAccountLookupMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objCheckingAccountLookup->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtTransitHash
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTransitHash_Create($strControlId = null) {
			$this->txtTransitHash = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTransitHash->Name = QApplication::Translate('Transit Hash');
			$this->txtTransitHash->Text = $this->objCheckingAccountLookup->TransitHash;
			$this->txtTransitHash->MaxLength = CheckingAccountLookup::TransitHashMaxLength;
			return $this->txtTransitHash;
		}

		/**
		 * Create and setup QLabel lblTransitHash
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTransitHash_Create($strControlId = null) {
			$this->lblTransitHash = new QLabel($this->objParentObject, $strControlId);
			$this->lblTransitHash->Name = QApplication::Translate('Transit Hash');
			$this->lblTransitHash->Text = $this->objCheckingAccountLookup->TransitHash;
			return $this->lblTransitHash;
		}

		/**
		 * Create and setup QTextBox txtAccountHash
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAccountHash_Create($strControlId = null) {
			$this->txtAccountHash = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAccountHash->Name = QApplication::Translate('Account Hash');
			$this->txtAccountHash->Text = $this->objCheckingAccountLookup->AccountHash;
			$this->txtAccountHash->MaxLength = CheckingAccountLookup::AccountHashMaxLength;
			return $this->txtAccountHash;
		}

		/**
		 * Create and setup QLabel lblAccountHash
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAccountHash_Create($strControlId = null) {
			$this->lblAccountHash = new QLabel($this->objParentObject, $strControlId);
			$this->lblAccountHash->Name = QApplication::Translate('Account Hash');
			$this->lblAccountHash->Text = $this->objCheckingAccountLookup->AccountHash;
			return $this->lblAccountHash;
		}

		/**
		 * Create and setup QListBox lstPeople
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPeople_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPeople = new QListBox($this->objParentObject, $strControlId);
			$this->lstPeople->Name = QApplication::Translate('People');
			$this->lstPeople->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objCheckingAccountLookup->GetPersonArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objPerson->Id)
						$objListItem->Selected = true;
				}
				$this->lstPeople->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstPeople;
		}

		/**
		 * Create and setup QLabel lblPeople
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblPeople_Create($strControlId = null, $strGlue = ', ') {
			$this->lblPeople = new QLabel($this->objParentObject, $strControlId);
			$this->lstPeople->Name = QApplication::Translate('People');
			
			$objAssociatedArray = $this->objCheckingAccountLookup->GetPersonArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblPeople->Text = implode($strGlue, $strItems);
			return $this->lblPeople;
		}



		/**
		 * Refresh this MetaControl with Data from the local CheckingAccountLookup object.
		 * @param boolean $blnReload reload CheckingAccountLookup from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCheckingAccountLookup->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objCheckingAccountLookup->Id;

			if ($this->txtTransitHash) $this->txtTransitHash->Text = $this->objCheckingAccountLookup->TransitHash;
			if ($this->lblTransitHash) $this->lblTransitHash->Text = $this->objCheckingAccountLookup->TransitHash;

			if ($this->txtAccountHash) $this->txtAccountHash->Text = $this->objCheckingAccountLookup->AccountHash;
			if ($this->lblAccountHash) $this->lblAccountHash->Text = $this->objCheckingAccountLookup->AccountHash;

			if ($this->lstPeople) {
				$this->lstPeople->RemoveAllItems();
				$objAssociatedArray = $this->objCheckingAccountLookup->GetPersonArray();
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objPerson->Id)
							$objListItem->Selected = true;
					}
					$this->lstPeople->AddItem($objListItem);
				}
			}
			if ($this->lblPeople) {
				$objAssociatedArray = $this->objCheckingAccountLookup->GetPersonArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblPeople->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstPeople_Update() {
			if ($this->lstPeople) {
				$this->objCheckingAccountLookup->UnassociateAllPeople();
				$objSelectedListItems = $this->lstPeople->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objCheckingAccountLookup->AssociatePerson(Person::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC CHECKINGACCOUNTLOOKUP OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's CheckingAccountLookup instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCheckingAccountLookup() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtTransitHash) $this->objCheckingAccountLookup->TransitHash = $this->txtTransitHash->Text;
				if ($this->txtAccountHash) $this->objCheckingAccountLookup->AccountHash = $this->txtAccountHash->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the CheckingAccountLookup object
				$this->objCheckingAccountLookup->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstPeople_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's CheckingAccountLookup instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCheckingAccountLookup() {
			$this->objCheckingAccountLookup->UnassociateAllPeople();
			$this->objCheckingAccountLookup->Delete();
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
				case 'CheckingAccountLookup': return $this->objCheckingAccountLookup;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to CheckingAccountLookup fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'TransitHashControl':
					if (!$this->txtTransitHash) return $this->txtTransitHash_Create();
					return $this->txtTransitHash;
				case 'TransitHashLabel':
					if (!$this->lblTransitHash) return $this->lblTransitHash_Create();
					return $this->lblTransitHash;
				case 'AccountHashControl':
					if (!$this->txtAccountHash) return $this->txtAccountHash_Create();
					return $this->txtAccountHash;
				case 'AccountHashLabel':
					if (!$this->lblAccountHash) return $this->lblAccountHash_Create();
					return $this->lblAccountHash;
				case 'PersonControl':
					if (!$this->lstPeople) return $this->lstPeople_Create();
					return $this->lstPeople;
				case 'PersonLabel':
					if (!$this->lblPeople) return $this->lblPeople_Create();
					return $this->lblPeople;
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
					// Controls that point to CheckingAccountLookup fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'TransitHashControl':
						return ($this->txtTransitHash = QType::Cast($mixValue, 'QControl'));
					case 'AccountHashControl':
						return ($this->txtAccountHash = QType::Cast($mixValue, 'QControl'));
					case 'PersonControl':
						return ($this->lstPeople = QType::Cast($mixValue, 'QControl'));
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