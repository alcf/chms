<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Phone class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Phone object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PhoneMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Phone $Phone the actual Phone data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PhoneTypeIdControl
	 * property-read QLabel $PhoneTypeIdLabel
	 * property QListBox $AddressIdControl
	 * property-read QLabel $AddressIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QTextBox $NumberControl
	 * property-read QLabel $NumberLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PhoneMetaControlGen extends QBaseClass {
		// General Variables
		protected $objPhone;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Phone's individual data fields
		protected $lblId;
		protected $lstPhoneType;
		protected $lstAddress;
		protected $lstPerson;
		protected $txtNumber;

		// Controls that allow the viewing of Phone's individual data fields
		protected $lblPhoneTypeId;
		protected $lblAddressId;
		protected $lblPersonId;
		protected $lblNumber;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PhoneMetaControl to edit a single Phone object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Phone object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PhoneMetaControl
		 * @param Phone $objPhone new or existing Phone object
		 */
		 public function __construct($objParentObject, Phone $objPhone) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PhoneMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Phone object
			$this->objPhone = $objPhone;

			// Figure out if we're Editing or Creating New
			if ($this->objPhone->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PhoneMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Phone object creation - defaults to CreateOrEdit
 		 * @return PhoneMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objPhone = Phone::Load($intId);

				// Phone was found -- return it!
				if ($objPhone)
					return new PhoneMetaControl($objParentObject, $objPhone);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Phone object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PhoneMetaControl($objParentObject, new Phone());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PhoneMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Phone object creation - defaults to CreateOrEdit
		 * @return PhoneMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return PhoneMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PhoneMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Phone object creation - defaults to CreateOrEdit
		 * @return PhoneMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return PhoneMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objPhone->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstPhoneType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPhoneType_Create($strControlId = null) {
			$this->lstPhoneType = new QListBox($this->objParentObject, $strControlId);
			$this->lstPhoneType->Name = QApplication::Translate('Phone Type');
			$this->lstPhoneType->Required = true;
			foreach (PhoneType::$NameArray as $intId => $strValue)
				$this->lstPhoneType->AddItem(new QListItem($strValue, $intId, $this->objPhone->PhoneTypeId == $intId));
			return $this->lstPhoneType;
		}

		/**
		 * Create and setup QLabel lblPhoneTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPhoneTypeId_Create($strControlId = null) {
			$this->lblPhoneTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPhoneTypeId->Name = QApplication::Translate('Phone Type');
			$this->lblPhoneTypeId->Text = ($this->objPhone->PhoneTypeId) ? PhoneType::$NameArray[$this->objPhone->PhoneTypeId] : null;
			$this->lblPhoneTypeId->Required = true;
			return $this->lblPhoneTypeId;
		}

		/**
		 * Create and setup QListBox lstAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstAddress_Create($strControlId = null) {
			$this->lstAddress = new QListBox($this->objParentObject, $strControlId);
			$this->lstAddress->Name = QApplication::Translate('Address');
			$this->lstAddress->AddItem(QApplication::Translate('- Select One -'), null);
			$objAddressArray = Address::LoadAll();
			if ($objAddressArray) foreach ($objAddressArray as $objAddress) {
				$objListItem = new QListItem($objAddress->__toString(), $objAddress->Id);
				if (($this->objPhone->Address) && ($this->objPhone->Address->Id == $objAddress->Id))
					$objListItem->Selected = true;
				$this->lstAddress->AddItem($objListItem);
			}
			return $this->lstAddress;
		}

		/**
		 * Create and setup QLabel lblAddressId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddressId_Create($strControlId = null) {
			$this->lblAddressId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddressId->Name = QApplication::Translate('Address');
			$this->lblAddressId->Text = ($this->objPhone->Address) ? $this->objPhone->Address->__toString() : null;
			return $this->lblAddressId;
		}

		/**
		 * Create and setup QListBox lstPerson
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstPerson_Create($strControlId = null) {
			$this->lstPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPerson->Name = QApplication::Translate('Person');
			$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
			$objPersonArray = Person::LoadAll();
			if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objPhone->Person) && ($this->objPhone->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objPhone->Person) ? $this->objPhone->Person->__toString() : null;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QTextBox txtNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNumber_Create($strControlId = null) {
			$this->txtNumber = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNumber->Name = QApplication::Translate('Number');
			$this->txtNumber->Text = $this->objPhone->Number;
			$this->txtNumber->MaxLength = Phone::NumberMaxLength;
			return $this->txtNumber;
		}

		/**
		 * Create and setup QLabel lblNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNumber_Create($strControlId = null) {
			$this->lblNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblNumber->Name = QApplication::Translate('Number');
			$this->lblNumber->Text = $this->objPhone->Number;
			return $this->lblNumber;
		}



		/**
		 * Refresh this MetaControl with Data from the local Phone object.
		 * @param boolean $blnReload reload Phone from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPhone->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objPhone->Id;

			if ($this->lstPhoneType) $this->lstPhoneType->SelectedValue = $this->objPhone->PhoneTypeId;
			if ($this->lblPhoneTypeId) $this->lblPhoneTypeId->Text = ($this->objPhone->PhoneTypeId) ? PhoneType::$NameArray[$this->objPhone->PhoneTypeId] : null;

			if ($this->lstAddress) {
					$this->lstAddress->RemoveAllItems();
				$this->lstAddress->AddItem(QApplication::Translate('- Select One -'), null);
				$objAddressArray = Address::LoadAll();
				if ($objAddressArray) foreach ($objAddressArray as $objAddress) {
					$objListItem = new QListItem($objAddress->__toString(), $objAddress->Id);
					if (($this->objPhone->Address) && ($this->objPhone->Address->Id == $objAddress->Id))
						$objListItem->Selected = true;
					$this->lstAddress->AddItem($objListItem);
				}
			}
			if ($this->lblAddressId) $this->lblAddressId->Text = ($this->objPhone->Address) ? $this->objPhone->Address->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objPhone->Person) && ($this->objPhone->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objPhone->Person) ? $this->objPhone->Person->__toString() : null;

			if ($this->txtNumber) $this->txtNumber->Text = $this->objPhone->Number;
			if ($this->lblNumber) $this->lblNumber->Text = $this->objPhone->Number;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PHONE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Phone instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePhone() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPhoneType) $this->objPhone->PhoneTypeId = $this->lstPhoneType->SelectedValue;
				if ($this->lstAddress) $this->objPhone->AddressId = $this->lstAddress->SelectedValue;
				if ($this->lstPerson) $this->objPhone->PersonId = $this->lstPerson->SelectedValue;
				if ($this->txtNumber) $this->objPhone->Number = $this->txtNumber->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Phone object
				$this->objPhone->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Phone instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePhone() {
			$this->objPhone->Delete();
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
				case 'Phone': return $this->objPhone;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Phone fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PhoneTypeIdControl':
					if (!$this->lstPhoneType) return $this->lstPhoneType_Create();
					return $this->lstPhoneType;
				case 'PhoneTypeIdLabel':
					if (!$this->lblPhoneTypeId) return $this->lblPhoneTypeId_Create();
					return $this->lblPhoneTypeId;
				case 'AddressIdControl':
					if (!$this->lstAddress) return $this->lstAddress_Create();
					return $this->lstAddress;
				case 'AddressIdLabel':
					if (!$this->lblAddressId) return $this->lblAddressId_Create();
					return $this->lblAddressId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'NumberControl':
					if (!$this->txtNumber) return $this->txtNumber_Create();
					return $this->txtNumber;
				case 'NumberLabel':
					if (!$this->lblNumber) return $this->lblNumber_Create();
					return $this->lblNumber;
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
					// Controls that point to Phone fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PhoneTypeIdControl':
						return ($this->lstPhoneType = QType::Cast($mixValue, 'QControl'));
					case 'AddressIdControl':
						return ($this->lstAddress = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'NumberControl':
						return ($this->txtNumber = QType::Cast($mixValue, 'QControl'));
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