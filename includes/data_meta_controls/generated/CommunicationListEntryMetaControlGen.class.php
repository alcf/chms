<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the CommunicationListEntry class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single CommunicationListEntry object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CommunicationListEntryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read CommunicationListEntry $CommunicationListEntry the actual CommunicationListEntry data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $MiddleNameControl
	 * property-read QLabel $MiddleNameLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property QListBox $CommunicationListControl
	 * property-read QLabel $CommunicationListLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CommunicationListEntryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var CommunicationListEntry objCommunicationListEntry
		 * @access protected
		 */
		protected $objCommunicationListEntry;

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

		// Controls that allow the editing of CommunicationListEntry's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtFirstName;
         * @access protected
         */
		protected $txtFirstName;

        /**
         * @var QTextBox txtMiddleName;
         * @access protected
         */
		protected $txtMiddleName;

        /**
         * @var QTextBox txtLastName;
         * @access protected
         */
		protected $txtLastName;

        /**
         * @var QTextBox txtEmail;
         * @access protected
         */
		protected $txtEmail;


		// Controls that allow the viewing of CommunicationListEntry's individual data fields
        /**
         * @var QLabel lblFirstName
         * @access protected
         */
		protected $lblFirstName;

        /**
         * @var QLabel lblMiddleName
         * @access protected
         */
		protected $lblMiddleName;

        /**
         * @var QLabel lblLastName
         * @access protected
         */
		protected $lblLastName;

        /**
         * @var QLabel lblEmail
         * @access protected
         */
		protected $lblEmail;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstCommunicationLists;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblCommunicationLists;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CommunicationListEntryMetaControl to edit a single CommunicationListEntry object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single CommunicationListEntry object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommunicationListEntryMetaControl
		 * @param CommunicationListEntry $objCommunicationListEntry new or existing CommunicationListEntry object
		 */
		 public function __construct($objParentObject, CommunicationListEntry $objCommunicationListEntry) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CommunicationListEntryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked CommunicationListEntry object
			$this->objCommunicationListEntry = $objCommunicationListEntry;

			// Figure out if we're Editing or Creating New
			if ($this->objCommunicationListEntry->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommunicationListEntryMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing CommunicationListEntry object creation - defaults to CreateOrEdit
 		 * @return CommunicationListEntryMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objCommunicationListEntry = CommunicationListEntry::Load($intId);

				// CommunicationListEntry was found -- return it!
				if ($objCommunicationListEntry)
					return new CommunicationListEntryMetaControl($objParentObject, $objCommunicationListEntry);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a CommunicationListEntry object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CommunicationListEntryMetaControl($objParentObject, new CommunicationListEntry());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommunicationListEntryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CommunicationListEntry object creation - defaults to CreateOrEdit
		 * @return CommunicationListEntryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return CommunicationListEntryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommunicationListEntryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CommunicationListEntry object creation - defaults to CreateOrEdit
		 * @return CommunicationListEntryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return CommunicationListEntryMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objCommunicationListEntry->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objCommunicationListEntry->FirstName;
			$this->txtFirstName->MaxLength = CommunicationListEntry::FirstNameMaxLength;
			return $this->txtFirstName;
		}

		/**
		 * Create and setup QLabel lblFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFirstName_Create($strControlId = null) {
			$this->lblFirstName = new QLabel($this->objParentObject, $strControlId);
			$this->lblFirstName->Name = QApplication::Translate('First Name');
			$this->lblFirstName->Text = $this->objCommunicationListEntry->FirstName;
			return $this->lblFirstName;
		}

		/**
		 * Create and setup QTextBox txtMiddleName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMiddleName_Create($strControlId = null) {
			$this->txtMiddleName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMiddleName->Name = QApplication::Translate('Middle Name');
			$this->txtMiddleName->Text = $this->objCommunicationListEntry->MiddleName;
			$this->txtMiddleName->MaxLength = CommunicationListEntry::MiddleNameMaxLength;
			return $this->txtMiddleName;
		}

		/**
		 * Create and setup QLabel lblMiddleName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMiddleName_Create($strControlId = null) {
			$this->lblMiddleName = new QLabel($this->objParentObject, $strControlId);
			$this->lblMiddleName->Name = QApplication::Translate('Middle Name');
			$this->lblMiddleName->Text = $this->objCommunicationListEntry->MiddleName;
			return $this->lblMiddleName;
		}

		/**
		 * Create and setup QTextBox txtLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLastName_Create($strControlId = null) {
			$this->txtLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objCommunicationListEntry->LastName;
			$this->txtLastName->MaxLength = CommunicationListEntry::LastNameMaxLength;
			return $this->txtLastName;
		}

		/**
		 * Create and setup QLabel lblLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLastName_Create($strControlId = null) {
			$this->lblLastName = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastName->Name = QApplication::Translate('Last Name');
			$this->lblLastName->Text = $this->objCommunicationListEntry->LastName;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objCommunicationListEntry->Email;
			$this->txtEmail->Required = true;
			$this->txtEmail->MaxLength = CommunicationListEntry::EmailMaxLength;
			return $this->txtEmail;
		}

		/**
		 * Create and setup QLabel lblEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmail_Create($strControlId = null) {
			$this->lblEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmail->Name = QApplication::Translate('Email');
			$this->lblEmail->Text = $this->objCommunicationListEntry->Email;
			$this->lblEmail->Required = true;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QListBox lstCommunicationLists
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCommunicationLists_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCommunicationLists = new QListBox($this->objParentObject, $strControlId);
			$this->lstCommunicationLists->Name = QApplication::Translate('Communication Lists');
			$this->lstCommunicationLists->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objCommunicationListEntry->GetCommunicationListArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCommunicationListCursor = CommunicationList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCommunicationList = CommunicationList::InstantiateCursor($objCommunicationListCursor)) {
				$objListItem = new QListItem($objCommunicationList->__toString(), $objCommunicationList->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objCommunicationList->Id)
						$objListItem->Selected = true;
				}
				$this->lstCommunicationLists->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstCommunicationLists;
		}

		/**
		 * Create and setup QLabel lblCommunicationLists
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblCommunicationLists_Create($strControlId = null, $strGlue = ', ') {
			$this->lblCommunicationLists = new QLabel($this->objParentObject, $strControlId);
			$this->lstCommunicationLists->Name = QApplication::Translate('Communication Lists');
			
			$objAssociatedArray = $this->objCommunicationListEntry->GetCommunicationListArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblCommunicationLists->Text = implode($strGlue, $strItems);
			return $this->lblCommunicationLists;
		}



		/**
		 * Refresh this MetaControl with Data from the local CommunicationListEntry object.
		 * @param boolean $blnReload reload CommunicationListEntry from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCommunicationListEntry->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objCommunicationListEntry->Id;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objCommunicationListEntry->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objCommunicationListEntry->FirstName;

			if ($this->txtMiddleName) $this->txtMiddleName->Text = $this->objCommunicationListEntry->MiddleName;
			if ($this->lblMiddleName) $this->lblMiddleName->Text = $this->objCommunicationListEntry->MiddleName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objCommunicationListEntry->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objCommunicationListEntry->LastName;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objCommunicationListEntry->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objCommunicationListEntry->Email;

			if ($this->lstCommunicationLists) {
				$this->lstCommunicationLists->RemoveAllItems();
				$objAssociatedArray = $this->objCommunicationListEntry->GetCommunicationListArray();
				$objCommunicationListArray = CommunicationList::LoadAll();
				if ($objCommunicationListArray) foreach ($objCommunicationListArray as $objCommunicationList) {
					$objListItem = new QListItem($objCommunicationList->__toString(), $objCommunicationList->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objCommunicationList->Id)
							$objListItem->Selected = true;
					}
					$this->lstCommunicationLists->AddItem($objListItem);
				}
			}
			if ($this->lblCommunicationLists) {
				$objAssociatedArray = $this->objCommunicationListEntry->GetCommunicationListArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblCommunicationLists->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstCommunicationLists_Update() {
			if ($this->lstCommunicationLists) {
				$this->objCommunicationListEntry->UnassociateAllCommunicationLists();
				$objSelectedListItems = $this->lstCommunicationLists->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objCommunicationListEntry->AssociateCommunicationList(CommunicationList::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC COMMUNICATIONLISTENTRY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's CommunicationListEntry instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCommunicationListEntry() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtFirstName) $this->objCommunicationListEntry->FirstName = $this->txtFirstName->Text;
				if ($this->txtMiddleName) $this->objCommunicationListEntry->MiddleName = $this->txtMiddleName->Text;
				if ($this->txtLastName) $this->objCommunicationListEntry->LastName = $this->txtLastName->Text;
				if ($this->txtEmail) $this->objCommunicationListEntry->Email = $this->txtEmail->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the CommunicationListEntry object
				$this->objCommunicationListEntry->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstCommunicationLists_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's CommunicationListEntry instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCommunicationListEntry() {
			$this->objCommunicationListEntry->UnassociateAllCommunicationLists();
			$this->objCommunicationListEntry->Delete();
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
				case 'CommunicationListEntry': return $this->objCommunicationListEntry;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to CommunicationListEntry fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'FirstNameControl':
					if (!$this->txtFirstName) return $this->txtFirstName_Create();
					return $this->txtFirstName;
				case 'FirstNameLabel':
					if (!$this->lblFirstName) return $this->lblFirstName_Create();
					return $this->lblFirstName;
				case 'MiddleNameControl':
					if (!$this->txtMiddleName) return $this->txtMiddleName_Create();
					return $this->txtMiddleName;
				case 'MiddleNameLabel':
					if (!$this->lblMiddleName) return $this->lblMiddleName_Create();
					return $this->lblMiddleName;
				case 'LastNameControl':
					if (!$this->txtLastName) return $this->txtLastName_Create();
					return $this->txtLastName;
				case 'LastNameLabel':
					if (!$this->lblLastName) return $this->lblLastName_Create();
					return $this->lblLastName;
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'CommunicationListControl':
					if (!$this->lstCommunicationLists) return $this->lstCommunicationLists_Create();
					return $this->lstCommunicationLists;
				case 'CommunicationListLabel':
					if (!$this->lblCommunicationLists) return $this->lblCommunicationLists_Create();
					return $this->lblCommunicationLists;
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
					// Controls that point to CommunicationListEntry fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'MiddleNameControl':
						return ($this->txtMiddleName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'CommunicationListControl':
						return ($this->lstCommunicationLists = QType::Cast($mixValue, 'QControl'));
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