<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the OtherContactInfo class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single OtherContactInfo object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a OtherContactInfoMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read OtherContactInfo $OtherContactInfo the actual OtherContactInfo data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $OtherContactMethodIdControl
	 * property-read QLabel $OtherContactMethodIdLabel
	 * property QTextBox $ValueControl
	 * property-read QLabel $ValueLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class OtherContactInfoMetaControlGen extends QBaseClass {
		// General Variables
		protected $objOtherContactInfo;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of OtherContactInfo's individual data fields
		protected $lblId;
		protected $lstPerson;
		protected $lstOtherContactMethod;
		protected $txtValue;

		// Controls that allow the viewing of OtherContactInfo's individual data fields
		protected $lblPersonId;
		protected $lblOtherContactMethodId;
		protected $lblValue;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * OtherContactInfoMetaControl to edit a single OtherContactInfo object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single OtherContactInfo object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OtherContactInfoMetaControl
		 * @param OtherContactInfo $objOtherContactInfo new or existing OtherContactInfo object
		 */
		 public function __construct($objParentObject, OtherContactInfo $objOtherContactInfo) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this OtherContactInfoMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked OtherContactInfo object
			$this->objOtherContactInfo = $objOtherContactInfo;

			// Figure out if we're Editing or Creating New
			if ($this->objOtherContactInfo->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this OtherContactInfoMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing OtherContactInfo object creation - defaults to CreateOrEdit
 		 * @return OtherContactInfoMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objOtherContactInfo = OtherContactInfo::Load($intId);

				// OtherContactInfo was found -- return it!
				if ($objOtherContactInfo)
					return new OtherContactInfoMetaControl($objParentObject, $objOtherContactInfo);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a OtherContactInfo object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new OtherContactInfoMetaControl($objParentObject, new OtherContactInfo());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OtherContactInfoMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing OtherContactInfo object creation - defaults to CreateOrEdit
		 * @return OtherContactInfoMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return OtherContactInfoMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OtherContactInfoMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing OtherContactInfo object creation - defaults to CreateOrEdit
		 * @return OtherContactInfoMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return OtherContactInfoMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objOtherContactInfo->Id;
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
				if (($this->objOtherContactInfo->Person) && ($this->objOtherContactInfo->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objOtherContactInfo->Person) ? $this->objOtherContactInfo->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstOtherContactMethod
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstOtherContactMethod_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstOtherContactMethod = new QListBox($this->objParentObject, $strControlId);
			$this->lstOtherContactMethod->Name = QApplication::Translate('Other Contact Method');
			$this->lstOtherContactMethod->Required = true;
			if (!$this->blnEditMode)
				$this->lstOtherContactMethod->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objOtherContactMethodCursor = OtherContactMethod::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objOtherContactMethod = OtherContactMethod::InstantiateCursor($objOtherContactMethodCursor)) {
				$objListItem = new QListItem($objOtherContactMethod->__toString(), $objOtherContactMethod->Id);
				if (($this->objOtherContactInfo->OtherContactMethod) && ($this->objOtherContactInfo->OtherContactMethod->Id == $objOtherContactMethod->Id))
					$objListItem->Selected = true;
				$this->lstOtherContactMethod->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstOtherContactMethod;
		}

		/**
		 * Create and setup QLabel lblOtherContactMethodId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOtherContactMethodId_Create($strControlId = null) {
			$this->lblOtherContactMethodId = new QLabel($this->objParentObject, $strControlId);
			$this->lblOtherContactMethodId->Name = QApplication::Translate('Other Contact Method');
			$this->lblOtherContactMethodId->Text = ($this->objOtherContactInfo->OtherContactMethod) ? $this->objOtherContactInfo->OtherContactMethod->__toString() : null;
			$this->lblOtherContactMethodId->Required = true;
			return $this->lblOtherContactMethodId;
		}

		/**
		 * Create and setup QTextBox txtValue
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtValue_Create($strControlId = null) {
			$this->txtValue = new QTextBox($this->objParentObject, $strControlId);
			$this->txtValue->Name = QApplication::Translate('Value');
			$this->txtValue->Text = $this->objOtherContactInfo->Value;
			$this->txtValue->MaxLength = OtherContactInfo::ValueMaxLength;
			return $this->txtValue;
		}

		/**
		 * Create and setup QLabel lblValue
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblValue_Create($strControlId = null) {
			$this->lblValue = new QLabel($this->objParentObject, $strControlId);
			$this->lblValue->Name = QApplication::Translate('Value');
			$this->lblValue->Text = $this->objOtherContactInfo->Value;
			return $this->lblValue;
		}



		/**
		 * Refresh this MetaControl with Data from the local OtherContactInfo object.
		 * @param boolean $blnReload reload OtherContactInfo from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objOtherContactInfo->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objOtherContactInfo->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objOtherContactInfo->Person) && ($this->objOtherContactInfo->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objOtherContactInfo->Person) ? $this->objOtherContactInfo->Person->__toString() : null;

			if ($this->lstOtherContactMethod) {
					$this->lstOtherContactMethod->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstOtherContactMethod->AddItem(QApplication::Translate('- Select One -'), null);
				$objOtherContactMethodArray = OtherContactMethod::LoadAll();
				if ($objOtherContactMethodArray) foreach ($objOtherContactMethodArray as $objOtherContactMethod) {
					$objListItem = new QListItem($objOtherContactMethod->__toString(), $objOtherContactMethod->Id);
					if (($this->objOtherContactInfo->OtherContactMethod) && ($this->objOtherContactInfo->OtherContactMethod->Id == $objOtherContactMethod->Id))
						$objListItem->Selected = true;
					$this->lstOtherContactMethod->AddItem($objListItem);
				}
			}
			if ($this->lblOtherContactMethodId) $this->lblOtherContactMethodId->Text = ($this->objOtherContactInfo->OtherContactMethod) ? $this->objOtherContactInfo->OtherContactMethod->__toString() : null;

			if ($this->txtValue) $this->txtValue->Text = $this->objOtherContactInfo->Value;
			if ($this->lblValue) $this->lblValue->Text = $this->objOtherContactInfo->Value;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC OTHERCONTACTINFO OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's OtherContactInfo instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveOtherContactInfo() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objOtherContactInfo->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstOtherContactMethod) $this->objOtherContactInfo->OtherContactMethodId = $this->lstOtherContactMethod->SelectedValue;
				if ($this->txtValue) $this->objOtherContactInfo->Value = $this->txtValue->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the OtherContactInfo object
				$this->objOtherContactInfo->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's OtherContactInfo instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteOtherContactInfo() {
			$this->objOtherContactInfo->Delete();
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
				case 'OtherContactInfo': return $this->objOtherContactInfo;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to OtherContactInfo fields -- will be created dynamically if not yet created
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
				case 'OtherContactMethodIdControl':
					if (!$this->lstOtherContactMethod) return $this->lstOtherContactMethod_Create();
					return $this->lstOtherContactMethod;
				case 'OtherContactMethodIdLabel':
					if (!$this->lblOtherContactMethodId) return $this->lblOtherContactMethodId_Create();
					return $this->lblOtherContactMethodId;
				case 'ValueControl':
					if (!$this->txtValue) return $this->txtValue_Create();
					return $this->txtValue;
				case 'ValueLabel':
					if (!$this->lblValue) return $this->lblValue_Create();
					return $this->lblValue;
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
					// Controls that point to OtherContactInfo fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'OtherContactMethodIdControl':
						return ($this->lstOtherContactMethod = QType::Cast($mixValue, 'QControl'));
					case 'ValueControl':
						return ($this->txtValue = QType::Cast($mixValue, 'QControl'));
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