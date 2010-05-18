<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AttributeOption class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AttributeOption object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AttributeOptionMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read AttributeOption $AttributeOption the actual AttributeOption data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $AttributeIdControl
	 * property-read QLabel $AttributeIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $AttributeValueAsMultipleControl
	 * property-read QLabel $AttributeValueAsMultipleLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AttributeOptionMetaControlGen extends QBaseClass {
		// General Variables
		protected $objAttributeOption;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of AttributeOption's individual data fields
		protected $lblId;
		protected $lstAttribute;
		protected $txtName;

		// Controls that allow the viewing of AttributeOption's individual data fields
		protected $lblAttributeId;
		protected $lblName;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstAttributeValuesAsMultiple;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblAttributeValuesAsMultiple;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AttributeOptionMetaControl to edit a single AttributeOption object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AttributeOption object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttributeOptionMetaControl
		 * @param AttributeOption $objAttributeOption new or existing AttributeOption object
		 */
		 public function __construct($objParentObject, AttributeOption $objAttributeOption) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AttributeOptionMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AttributeOption object
			$this->objAttributeOption = $objAttributeOption;

			// Figure out if we're Editing or Creating New
			if ($this->objAttributeOption->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttributeOptionMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AttributeOption object creation - defaults to CreateOrEdit
 		 * @return AttributeOptionMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objAttributeOption = AttributeOption::Load($intId);

				// AttributeOption was found -- return it!
				if ($objAttributeOption)
					return new AttributeOptionMetaControl($objParentObject, $objAttributeOption);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AttributeOption object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AttributeOptionMetaControl($objParentObject, new AttributeOption());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttributeOptionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AttributeOption object creation - defaults to CreateOrEdit
		 * @return AttributeOptionMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return AttributeOptionMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttributeOptionMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AttributeOption object creation - defaults to CreateOrEdit
		 * @return AttributeOptionMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return AttributeOptionMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objAttributeOption->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstAttribute
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAttribute_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAttribute = new QListBox($this->objParentObject, $strControlId);
			$this->lstAttribute->Name = QApplication::Translate('Attribute');
			$this->lstAttribute->Required = true;
			if (!$this->blnEditMode)
				$this->lstAttribute->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAttributeCursor = Attribute::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAttribute = Attribute::InstantiateCursor($objAttributeCursor)) {
				$objListItem = new QListItem($objAttribute->__toString(), $objAttribute->Id);
				if (($this->objAttributeOption->Attribute) && ($this->objAttributeOption->Attribute->Id == $objAttribute->Id))
					$objListItem->Selected = true;
				$this->lstAttribute->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAttribute;
		}

		/**
		 * Create and setup QLabel lblAttributeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAttributeId_Create($strControlId = null) {
			$this->lblAttributeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAttributeId->Name = QApplication::Translate('Attribute');
			$this->lblAttributeId->Text = ($this->objAttributeOption->Attribute) ? $this->objAttributeOption->Attribute->__toString() : null;
			$this->lblAttributeId->Required = true;
			return $this->lblAttributeId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objAttributeOption->Name;
			$this->txtName->MaxLength = AttributeOption::NameMaxLength;
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
			$this->lblName->Text = $this->objAttributeOption->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstAttributeValuesAsMultiple
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAttributeValuesAsMultiple_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAttributeValuesAsMultiple = new QListBox($this->objParentObject, $strControlId);
			$this->lstAttributeValuesAsMultiple->Name = QApplication::Translate('Attribute Values As Multiple');
			$this->lstAttributeValuesAsMultiple->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objAttributeOption->GetAttributeValueAsMultipleArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAttributeValueCursor = AttributeValue::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAttributeValue = AttributeValue::InstantiateCursor($objAttributeValueCursor)) {
				$objListItem = new QListItem($objAttributeValue->__toString(), $objAttributeValue->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objAttributeValue->Id)
						$objListItem->Selected = true;
				}
				$this->lstAttributeValuesAsMultiple->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstAttributeValuesAsMultiple;
		}

		/**
		 * Create and setup QLabel lblAttributeValuesAsMultiple
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblAttributeValuesAsMultiple_Create($strControlId = null, $strGlue = ', ') {
			$this->lblAttributeValuesAsMultiple = new QLabel($this->objParentObject, $strControlId);
			$this->lstAttributeValuesAsMultiple->Name = QApplication::Translate('Attribute Values As Multiple');
			
			$objAssociatedArray = $this->objAttributeOption->GetAttributeValueAsMultipleArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblAttributeValuesAsMultiple->Text = implode($strGlue, $strItems);
			return $this->lblAttributeValuesAsMultiple;
		}



		/**
		 * Refresh this MetaControl with Data from the local AttributeOption object.
		 * @param boolean $blnReload reload AttributeOption from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAttributeOption->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objAttributeOption->Id;

			if ($this->lstAttribute) {
					$this->lstAttribute->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAttribute->AddItem(QApplication::Translate('- Select One -'), null);
				$objAttributeArray = Attribute::LoadAll();
				if ($objAttributeArray) foreach ($objAttributeArray as $objAttribute) {
					$objListItem = new QListItem($objAttribute->__toString(), $objAttribute->Id);
					if (($this->objAttributeOption->Attribute) && ($this->objAttributeOption->Attribute->Id == $objAttribute->Id))
						$objListItem->Selected = true;
					$this->lstAttribute->AddItem($objListItem);
				}
			}
			if ($this->lblAttributeId) $this->lblAttributeId->Text = ($this->objAttributeOption->Attribute) ? $this->objAttributeOption->Attribute->__toString() : null;

			if ($this->txtName) $this->txtName->Text = $this->objAttributeOption->Name;
			if ($this->lblName) $this->lblName->Text = $this->objAttributeOption->Name;

			if ($this->lstAttributeValuesAsMultiple) {
				$this->lstAttributeValuesAsMultiple->RemoveAllItems();
				$objAssociatedArray = $this->objAttributeOption->GetAttributeValueAsMultipleArray();
				$objAttributeValueArray = AttributeValue::LoadAll();
				if ($objAttributeValueArray) foreach ($objAttributeValueArray as $objAttributeValue) {
					$objListItem = new QListItem($objAttributeValue->__toString(), $objAttributeValue->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objAttributeValue->Id)
							$objListItem->Selected = true;
					}
					$this->lstAttributeValuesAsMultiple->AddItem($objListItem);
				}
			}
			if ($this->lblAttributeValuesAsMultiple) {
				$objAssociatedArray = $this->objAttributeOption->GetAttributeValueAsMultipleArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblAttributeValuesAsMultiple->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstAttributeValuesAsMultiple_Update() {
			if ($this->lstAttributeValuesAsMultiple) {
				$this->objAttributeOption->UnassociateAllAttributeValuesAsMultiple();
				$objSelectedListItems = $this->lstAttributeValuesAsMultiple->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objAttributeOption->AssociateAttributeValueAsMultiple(AttributeValue::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC ATTRIBUTEOPTION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AttributeOption instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAttributeOption() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAttribute) $this->objAttributeOption->AttributeId = $this->lstAttribute->SelectedValue;
				if ($this->txtName) $this->objAttributeOption->Name = $this->txtName->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the AttributeOption object
				$this->objAttributeOption->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstAttributeValuesAsMultiple_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AttributeOption instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAttributeOption() {
			$this->objAttributeOption->UnassociateAllAttributeValuesAsMultiple();
			$this->objAttributeOption->Delete();
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
				case 'AttributeOption': return $this->objAttributeOption;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AttributeOption fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'AttributeIdControl':
					if (!$this->lstAttribute) return $this->lstAttribute_Create();
					return $this->lstAttribute;
				case 'AttributeIdLabel':
					if (!$this->lblAttributeId) return $this->lblAttributeId_Create();
					return $this->lblAttributeId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'AttributeValueAsMultipleControl':
					if (!$this->lstAttributeValuesAsMultiple) return $this->lstAttributeValuesAsMultiple_Create();
					return $this->lstAttributeValuesAsMultiple;
				case 'AttributeValueAsMultipleLabel':
					if (!$this->lblAttributeValuesAsMultiple) return $this->lblAttributeValuesAsMultiple_Create();
					return $this->lblAttributeValuesAsMultiple;
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
					// Controls that point to AttributeOption fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'AttributeIdControl':
						return ($this->lstAttribute = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'AttributeValueAsMultipleControl':
						return ($this->lstAttributeValuesAsMultiple = QType::Cast($mixValue, 'QControl'));
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