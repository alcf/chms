<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Email class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Email object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a EmailMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read Email $Email the actual Email data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QTextBox $AddressControl
	 * property-read QLabel $AddressLabel
	 * property QCheckBox $PrimaryFlagControl
	 * property-read QLabel $PrimaryFlagLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class EmailMetaControlGen extends QBaseClass {
		// General Variables
		protected $objEmail;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of Email's individual data fields
		protected $lblId;
		protected $lstPerson;
		protected $txtAddress;
		protected $chkPrimaryFlag;

		// Controls that allow the viewing of Email's individual data fields
		protected $lblPersonId;
		protected $lblAddress;
		protected $lblPrimaryFlag;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * EmailMetaControl to edit a single Email object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Email object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMetaControl
		 * @param Email $objEmail new or existing Email object
		 */
		 public function __construct($objParentObject, Email $objEmail) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this EmailMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Email object
			$this->objEmail = $objEmail;

			// Figure out if we're Editing or Creating New
			if ($this->objEmail->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Email object creation - defaults to CreateOrEdit
 		 * @return EmailMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objEmail = Email::Load($intId);

				// Email was found -- return it!
				if ($objEmail)
					return new EmailMetaControl($objParentObject, $objEmail);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Email object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new EmailMetaControl($objParentObject, new Email());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Email object creation - defaults to CreateOrEdit
		 * @return EmailMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return EmailMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Email object creation - defaults to CreateOrEdit
		 * @return EmailMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return EmailMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objEmail->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
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
				if (($this->objEmail->Person) && ($this->objEmail->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objEmail->Person) ? $this->objEmail->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QTextBox txtAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress_Create($strControlId = null) {
			$this->txtAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress->Name = QApplication::Translate('Address');
			$this->txtAddress->Text = $this->objEmail->Address;
			$this->txtAddress->MaxLength = Email::AddressMaxLength;
			return $this->txtAddress;
		}

		/**
		 * Create and setup QLabel lblAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress_Create($strControlId = null) {
			$this->lblAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress->Name = QApplication::Translate('Address');
			$this->lblAddress->Text = $this->objEmail->Address;
			return $this->lblAddress;
		}

		/**
		 * Create and setup QCheckBox chkPrimaryFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkPrimaryFlag_Create($strControlId = null) {
			$this->chkPrimaryFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkPrimaryFlag->Name = QApplication::Translate('Primary Flag');
			$this->chkPrimaryFlag->Checked = $this->objEmail->PrimaryFlag;
			return $this->chkPrimaryFlag;
		}

		/**
		 * Create and setup QLabel lblPrimaryFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPrimaryFlag_Create($strControlId = null) {
			$this->lblPrimaryFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblPrimaryFlag->Name = QApplication::Translate('Primary Flag');
			$this->lblPrimaryFlag->Text = ($this->objEmail->PrimaryFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblPrimaryFlag;
		}



		/**
		 * Refresh this MetaControl with Data from the local Email object.
		 * @param boolean $blnReload reload Email from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objEmail->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objEmail->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objEmail->Person) && ($this->objEmail->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objEmail->Person) ? $this->objEmail->Person->__toString() : null;

			if ($this->txtAddress) $this->txtAddress->Text = $this->objEmail->Address;
			if ($this->lblAddress) $this->lblAddress->Text = $this->objEmail->Address;

			if ($this->chkPrimaryFlag) $this->chkPrimaryFlag->Checked = $this->objEmail->PrimaryFlag;
			if ($this->lblPrimaryFlag) $this->lblPrimaryFlag->Text = ($this->objEmail->PrimaryFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC EMAIL OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Email instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveEmail() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objEmail->PersonId = $this->lstPerson->SelectedValue;
				if ($this->txtAddress) $this->objEmail->Address = $this->txtAddress->Text;
				if ($this->chkPrimaryFlag) $this->objEmail->PrimaryFlag = $this->chkPrimaryFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Email object
				$this->objEmail->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Email instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteEmail() {
			$this->objEmail->Delete();
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
				case 'Email': return $this->objEmail;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Email fields -- will be created dynamically if not yet created
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
				case 'AddressControl':
					if (!$this->txtAddress) return $this->txtAddress_Create();
					return $this->txtAddress;
				case 'AddressLabel':
					if (!$this->lblAddress) return $this->lblAddress_Create();
					return $this->lblAddress;
				case 'PrimaryFlagControl':
					if (!$this->chkPrimaryFlag) return $this->chkPrimaryFlag_Create();
					return $this->chkPrimaryFlag;
				case 'PrimaryFlagLabel':
					if (!$this->lblPrimaryFlag) return $this->lblPrimaryFlag_Create();
					return $this->lblPrimaryFlag;
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
					// Controls that point to Email fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'AddressControl':
						return ($this->txtAddress = QType::Cast($mixValue, 'QControl'));
					case 'PrimaryFlagControl':
						return ($this->chkPrimaryFlag = QType::Cast($mixValue, 'QControl'));
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