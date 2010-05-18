<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the AttributeValue class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single AttributeValue object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AttributeValueMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read AttributeValue $AttributeValue the actual AttributeValue data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $AttributeIdControl
	 * property-read QLabel $AttributeIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QDateTimePicker $DateValueControl
	 * property-read QLabel $DateValueLabel
	 * property QTextBox $TextValueControl
	 * property-read QLabel $TextValueLabel
	 * property QCheckBox $BooleanValueControl
	 * property-read QLabel $BooleanValueLabel
	 * property QListBox $SingleAttributeOptionIdControl
	 * property-read QLabel $SingleAttributeOptionIdLabel
	 * property QListBox $AttributeOptionAsMultipleControl
	 * property-read QLabel $AttributeOptionAsMultipleLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AttributeValueMetaControlGen extends QBaseClass {
		// General Variables
		protected $objAttributeValue;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of AttributeValue's individual data fields
		protected $lblId;
		protected $lstAttribute;
		protected $lstPerson;
		protected $calDateValue;
		protected $txtTextValue;
		protected $chkBooleanValue;
		protected $lstSingleAttributeOption;

		// Controls that allow the viewing of AttributeValue's individual data fields
		protected $lblAttributeId;
		protected $lblPersonId;
		protected $lblDateValue;
		protected $lblTextValue;
		protected $lblBooleanValue;
		protected $lblSingleAttributeOptionId;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstAttributeOptionsAsMultiple;

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblAttributeOptionsAsMultiple;


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AttributeValueMetaControl to edit a single AttributeValue object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single AttributeValue object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttributeValueMetaControl
		 * @param AttributeValue $objAttributeValue new or existing AttributeValue object
		 */
		 public function __construct($objParentObject, AttributeValue $objAttributeValue) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AttributeValueMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked AttributeValue object
			$this->objAttributeValue = $objAttributeValue;

			// Figure out if we're Editing or Creating New
			if ($this->objAttributeValue->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttributeValueMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing AttributeValue object creation - defaults to CreateOrEdit
 		 * @return AttributeValueMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objAttributeValue = AttributeValue::Load($intId);

				// AttributeValue was found -- return it!
				if ($objAttributeValue)
					return new AttributeValueMetaControl($objParentObject, $objAttributeValue);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a AttributeValue object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AttributeValueMetaControl($objParentObject, new AttributeValue());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttributeValueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AttributeValue object creation - defaults to CreateOrEdit
		 * @return AttributeValueMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return AttributeValueMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AttributeValueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing AttributeValue object creation - defaults to CreateOrEdit
		 * @return AttributeValueMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return AttributeValueMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objAttributeValue->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstAttribute
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstAttribute_Create($strControlId = null) {
			$this->lstAttribute = new QListBox($this->objParentObject, $strControlId);
			$this->lstAttribute->Name = QApplication::Translate('Attribute');
			$this->lstAttribute->Required = true;
			if (!$this->blnEditMode)
				$this->lstAttribute->AddItem(QApplication::Translate('- Select One -'), null);
			$objAttributeArray = Attribute::LoadAll();
			if ($objAttributeArray) foreach ($objAttributeArray as $objAttribute) {
				$objListItem = new QListItem($objAttribute->__toString(), $objAttribute->Id);
				if (($this->objAttributeValue->Attribute) && ($this->objAttributeValue->Attribute->Id == $objAttribute->Id))
					$objListItem->Selected = true;
				$this->lstAttribute->AddItem($objListItem);
			}
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
			$this->lblAttributeId->Text = ($this->objAttributeValue->Attribute) ? $this->objAttributeValue->Attribute->__toString() : null;
			$this->lblAttributeId->Required = true;
			return $this->lblAttributeId;
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
				if (($this->objAttributeValue->Person) && ($this->objAttributeValue->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objAttributeValue->Person) ? $this->objAttributeValue->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QDateTimePicker calDateValue
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateValue_Create($strControlId = null) {
			$this->calDateValue = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateValue->Name = QApplication::Translate('Date Value');
			$this->calDateValue->DateTime = $this->objAttributeValue->DateValue;
			$this->calDateValue->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateValue;
		}

		/**
		 * Create and setup QLabel lblDateValue
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateValue_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateValue = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateValue->Name = QApplication::Translate('Date Value');
			$this->strDateValueDateTimeFormat = $strDateTimeFormat;
			$this->lblDateValue->Text = sprintf($this->objAttributeValue->DateValue) ? $this->objAttributeValue->DateValue->__toString($this->strDateValueDateTimeFormat) : null;
			return $this->lblDateValue;
		}

		protected $strDateValueDateTimeFormat;

		/**
		 * Create and setup QTextBox txtTextValue
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTextValue_Create($strControlId = null) {
			$this->txtTextValue = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTextValue->Name = QApplication::Translate('Text Value');
			$this->txtTextValue->Text = $this->objAttributeValue->TextValue;
			$this->txtTextValue->TextMode = QTextMode::MultiLine;
			return $this->txtTextValue;
		}

		/**
		 * Create and setup QLabel lblTextValue
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTextValue_Create($strControlId = null) {
			$this->lblTextValue = new QLabel($this->objParentObject, $strControlId);
			$this->lblTextValue->Name = QApplication::Translate('Text Value');
			$this->lblTextValue->Text = $this->objAttributeValue->TextValue;
			return $this->lblTextValue;
		}

		/**
		 * Create and setup QCheckBox chkBooleanValue
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkBooleanValue_Create($strControlId = null) {
			$this->chkBooleanValue = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkBooleanValue->Name = QApplication::Translate('Boolean Value');
			$this->chkBooleanValue->Checked = $this->objAttributeValue->BooleanValue;
			return $this->chkBooleanValue;
		}

		/**
		 * Create and setup QLabel lblBooleanValue
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblBooleanValue_Create($strControlId = null) {
			$this->lblBooleanValue = new QLabel($this->objParentObject, $strControlId);
			$this->lblBooleanValue->Name = QApplication::Translate('Boolean Value');
			$this->lblBooleanValue->Text = ($this->objAttributeValue->BooleanValue) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblBooleanValue;
		}

		/**
		 * Create and setup QListBox lstSingleAttributeOption
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstSingleAttributeOption_Create($strControlId = null) {
			$this->lstSingleAttributeOption = new QListBox($this->objParentObject, $strControlId);
			$this->lstSingleAttributeOption->Name = QApplication::Translate('Single Attribute Option');
			$this->lstSingleAttributeOption->AddItem(QApplication::Translate('- Select One -'), null);
			$objSingleAttributeOptionArray = AttributeOption::LoadAll();
			if ($objSingleAttributeOptionArray) foreach ($objSingleAttributeOptionArray as $objSingleAttributeOption) {
				$objListItem = new QListItem($objSingleAttributeOption->__toString(), $objSingleAttributeOption->Id);
				if (($this->objAttributeValue->SingleAttributeOption) && ($this->objAttributeValue->SingleAttributeOption->Id == $objSingleAttributeOption->Id))
					$objListItem->Selected = true;
				$this->lstSingleAttributeOption->AddItem($objListItem);
			}
			return $this->lstSingleAttributeOption;
		}

		/**
		 * Create and setup QLabel lblSingleAttributeOptionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSingleAttributeOptionId_Create($strControlId = null) {
			$this->lblSingleAttributeOptionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSingleAttributeOptionId->Name = QApplication::Translate('Single Attribute Option');
			$this->lblSingleAttributeOptionId->Text = ($this->objAttributeValue->SingleAttributeOption) ? $this->objAttributeValue->SingleAttributeOption->__toString() : null;
			return $this->lblSingleAttributeOptionId;
		}

		/**
		 * Create and setup QListBox lstAttributeOptionsAsMultiple
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstAttributeOptionsAsMultiple_Create($strControlId = null) {
			$this->lstAttributeOptionsAsMultiple = new QListBox($this->objParentObject, $strControlId);
			$this->lstAttributeOptionsAsMultiple->Name = QApplication::Translate('Attribute Options As Multiple');
			$this->lstAttributeOptionsAsMultiple->SelectionMode = QSelectionMode::Multiple;
			$objAssociatedArray = $this->objAttributeValue->GetAttributeOptionAsMultipleArray();
			$objAttributeOptionArray = AttributeOption::LoadAll();
			if ($objAttributeOptionArray) foreach ($objAttributeOptionArray as $objAttributeOption) {
				$objListItem = new QListItem($objAttributeOption->__toString(), $objAttributeOption->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objAttributeOption->Id)
						$objListItem->Selected = true;
				}
				$this->lstAttributeOptionsAsMultiple->AddItem($objListItem);
			}
			return $this->lstAttributeOptionsAsMultiple;
		}

		/**
		 * Create and setup QLabel lblAttributeOptionsAsMultiple
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblAttributeOptionsAsMultiple_Create($strControlId = null, $strGlue = ', ') {
			$this->lblAttributeOptionsAsMultiple = new QLabel($this->objParentObject, $strControlId);
			$this->lstAttributeOptionsAsMultiple->Name = QApplication::Translate('Attribute Options As Multiple');
			
			$objAssociatedArray = $this->objAttributeValue->GetAttributeOptionAsMultipleArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblAttributeOptionsAsMultiple->Text = implode($strGlue, $strItems);
			return $this->lblAttributeOptionsAsMultiple;
		}



		/**
		 * Refresh this MetaControl with Data from the local AttributeValue object.
		 * @param boolean $blnReload reload AttributeValue from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAttributeValue->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objAttributeValue->Id;

			if ($this->lstAttribute) {
					$this->lstAttribute->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAttribute->AddItem(QApplication::Translate('- Select One -'), null);
				$objAttributeArray = Attribute::LoadAll();
				if ($objAttributeArray) foreach ($objAttributeArray as $objAttribute) {
					$objListItem = new QListItem($objAttribute->__toString(), $objAttribute->Id);
					if (($this->objAttributeValue->Attribute) && ($this->objAttributeValue->Attribute->Id == $objAttribute->Id))
						$objListItem->Selected = true;
					$this->lstAttribute->AddItem($objListItem);
				}
			}
			if ($this->lblAttributeId) $this->lblAttributeId->Text = ($this->objAttributeValue->Attribute) ? $this->objAttributeValue->Attribute->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objAttributeValue->Person) && ($this->objAttributeValue->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objAttributeValue->Person) ? $this->objAttributeValue->Person->__toString() : null;

			if ($this->calDateValue) $this->calDateValue->DateTime = $this->objAttributeValue->DateValue;
			if ($this->lblDateValue) $this->lblDateValue->Text = sprintf($this->objAttributeValue->DateValue) ? $this->objAttributeValue->__toString($this->strDateValueDateTimeFormat) : null;

			if ($this->txtTextValue) $this->txtTextValue->Text = $this->objAttributeValue->TextValue;
			if ($this->lblTextValue) $this->lblTextValue->Text = $this->objAttributeValue->TextValue;

			if ($this->chkBooleanValue) $this->chkBooleanValue->Checked = $this->objAttributeValue->BooleanValue;
			if ($this->lblBooleanValue) $this->lblBooleanValue->Text = ($this->objAttributeValue->BooleanValue) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstSingleAttributeOption) {
					$this->lstSingleAttributeOption->RemoveAllItems();
				$this->lstSingleAttributeOption->AddItem(QApplication::Translate('- Select One -'), null);
				$objSingleAttributeOptionArray = AttributeOption::LoadAll();
				if ($objSingleAttributeOptionArray) foreach ($objSingleAttributeOptionArray as $objSingleAttributeOption) {
					$objListItem = new QListItem($objSingleAttributeOption->__toString(), $objSingleAttributeOption->Id);
					if (($this->objAttributeValue->SingleAttributeOption) && ($this->objAttributeValue->SingleAttributeOption->Id == $objSingleAttributeOption->Id))
						$objListItem->Selected = true;
					$this->lstSingleAttributeOption->AddItem($objListItem);
				}
			}
			if ($this->lblSingleAttributeOptionId) $this->lblSingleAttributeOptionId->Text = ($this->objAttributeValue->SingleAttributeOption) ? $this->objAttributeValue->SingleAttributeOption->__toString() : null;

			if ($this->lstAttributeOptionsAsMultiple) {
				$this->lstAttributeOptionsAsMultiple->RemoveAllItems();
				$objAssociatedArray = $this->objAttributeValue->GetAttributeOptionAsMultipleArray();
				$objAttributeOptionArray = AttributeOption::LoadAll();
				if ($objAttributeOptionArray) foreach ($objAttributeOptionArray as $objAttributeOption) {
					$objListItem = new QListItem($objAttributeOption->__toString(), $objAttributeOption->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objAttributeOption->Id)
							$objListItem->Selected = true;
					}
					$this->lstAttributeOptionsAsMultiple->AddItem($objListItem);
				}
			}
			if ($this->lblAttributeOptionsAsMultiple) {
				$objAssociatedArray = $this->objAttributeValue->GetAttributeOptionAsMultipleArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblAttributeOptionsAsMultiple->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstAttributeOptionsAsMultiple_Update() {
			if ($this->lstAttributeOptionsAsMultiple) {
				$this->objAttributeValue->UnassociateAllAttributeOptionsAsMultiple();
				$objSelectedListItems = $this->lstAttributeOptionsAsMultiple->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objAttributeValue->AssociateAttributeOptionAsMultiple(AttributeOption::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC ATTRIBUTEVALUE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's AttributeValue instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAttributeValue() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAttribute) $this->objAttributeValue->AttributeId = $this->lstAttribute->SelectedValue;
				if ($this->lstPerson) $this->objAttributeValue->PersonId = $this->lstPerson->SelectedValue;
				if ($this->calDateValue) $this->objAttributeValue->DateValue = $this->calDateValue->DateTime;
				if ($this->txtTextValue) $this->objAttributeValue->TextValue = $this->txtTextValue->Text;
				if ($this->chkBooleanValue) $this->objAttributeValue->BooleanValue = $this->chkBooleanValue->Checked;
				if ($this->lstSingleAttributeOption) $this->objAttributeValue->SingleAttributeOptionId = $this->lstSingleAttributeOption->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the AttributeValue object
				$this->objAttributeValue->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstAttributeOptionsAsMultiple_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's AttributeValue instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAttributeValue() {
			$this->objAttributeValue->UnassociateAllAttributeOptionsAsMultiple();
			$this->objAttributeValue->Delete();
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
				case 'AttributeValue': return $this->objAttributeValue;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to AttributeValue fields -- will be created dynamically if not yet created
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
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'DateValueControl':
					if (!$this->calDateValue) return $this->calDateValue_Create();
					return $this->calDateValue;
				case 'DateValueLabel':
					if (!$this->lblDateValue) return $this->lblDateValue_Create();
					return $this->lblDateValue;
				case 'TextValueControl':
					if (!$this->txtTextValue) return $this->txtTextValue_Create();
					return $this->txtTextValue;
				case 'TextValueLabel':
					if (!$this->lblTextValue) return $this->lblTextValue_Create();
					return $this->lblTextValue;
				case 'BooleanValueControl':
					if (!$this->chkBooleanValue) return $this->chkBooleanValue_Create();
					return $this->chkBooleanValue;
				case 'BooleanValueLabel':
					if (!$this->lblBooleanValue) return $this->lblBooleanValue_Create();
					return $this->lblBooleanValue;
				case 'SingleAttributeOptionIdControl':
					if (!$this->lstSingleAttributeOption) return $this->lstSingleAttributeOption_Create();
					return $this->lstSingleAttributeOption;
				case 'SingleAttributeOptionIdLabel':
					if (!$this->lblSingleAttributeOptionId) return $this->lblSingleAttributeOptionId_Create();
					return $this->lblSingleAttributeOptionId;
				case 'AttributeOptionAsMultipleControl':
					if (!$this->lstAttributeOptionsAsMultiple) return $this->lstAttributeOptionsAsMultiple_Create();
					return $this->lstAttributeOptionsAsMultiple;
				case 'AttributeOptionAsMultipleLabel':
					if (!$this->lblAttributeOptionsAsMultiple) return $this->lblAttributeOptionsAsMultiple_Create();
					return $this->lblAttributeOptionsAsMultiple;
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
					// Controls that point to AttributeValue fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'AttributeIdControl':
						return ($this->lstAttribute = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'DateValueControl':
						return ($this->calDateValue = QType::Cast($mixValue, 'QControl'));
					case 'TextValueControl':
						return ($this->txtTextValue = QType::Cast($mixValue, 'QControl'));
					case 'BooleanValueControl':
						return ($this->chkBooleanValue = QType::Cast($mixValue, 'QControl'));
					case 'SingleAttributeOptionIdControl':
						return ($this->lstSingleAttributeOption = QType::Cast($mixValue, 'QControl'));
					case 'AttributeOptionAsMultipleControl':
						return ($this->lstAttributeOptionsAsMultiple = QType::Cast($mixValue, 'QControl'));
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