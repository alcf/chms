<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the CommunicationList class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single CommunicationList object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CommunicationListMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read CommunicationList $CommunicationList the actual CommunicationList data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $EmailBroadcastTypeIdControl
	 * property-read QLabel $EmailBroadcastTypeIdLabel
	 * property QListBox $MinistryIdControl
	 * property-read QLabel $MinistryIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $TokenControl
	 * property-read QLabel $TokenLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QCheckBox $SubscribableControl
	 * property-read QLabel $SubscribableLabel
	 * property QListBox $CommunicationListEntryControl
	 * property-read QLabel $CommunicationListEntryLabel
	 * property QListBox $PersonControl
	 * property-read QLabel $PersonLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CommunicationListMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var CommunicationList objCommunicationList
		 * @access protected
		 */
		protected $objCommunicationList;

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

		// Controls that allow the editing of CommunicationList's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstEmailBroadcastType;
         * @access protected
         */
		protected $lstEmailBroadcastType;

        /**
         * @var QListBox lstMinistry;
         * @access protected
         */
		protected $lstMinistry;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QTextBox txtToken;
         * @access protected
         */
		protected $txtToken;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

        /**
         * @var QCheckBox chkSubscribable;
         * @access protected
         */
		protected $chkSubscribable;


		// Controls that allow the viewing of CommunicationList's individual data fields
        /**
         * @var QLabel lblEmailBroadcastTypeId
         * @access protected
         */
		protected $lblEmailBroadcastTypeId;

        /**
         * @var QLabel lblMinistryId
         * @access protected
         */
		protected $lblMinistryId;

        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblToken
         * @access protected
         */
		protected $lblToken;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

        /**
         * @var QLabel lblSubscribable
         * @access protected
         */
		protected $lblSubscribable;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstCommunicationListEntries;

		protected $lstPeople;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblCommunicationListEntries;

		protected $lblPeople;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CommunicationListMetaControl to edit a single CommunicationList object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single CommunicationList object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommunicationListMetaControl
		 * @param CommunicationList $objCommunicationList new or existing CommunicationList object
		 */
		 public function __construct($objParentObject, CommunicationList $objCommunicationList) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CommunicationListMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked CommunicationList object
			$this->objCommunicationList = $objCommunicationList;

			// Figure out if we're Editing or Creating New
			if ($this->objCommunicationList->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommunicationListMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing CommunicationList object creation - defaults to CreateOrEdit
 		 * @return CommunicationListMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objCommunicationList = CommunicationList::Load($intId);

				// CommunicationList was found -- return it!
				if ($objCommunicationList)
					return new CommunicationListMetaControl($objParentObject, $objCommunicationList);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a CommunicationList object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CommunicationListMetaControl($objParentObject, new CommunicationList());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommunicationListMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CommunicationList object creation - defaults to CreateOrEdit
		 * @return CommunicationListMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return CommunicationListMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CommunicationListMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CommunicationList object creation - defaults to CreateOrEdit
		 * @return CommunicationListMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return CommunicationListMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objCommunicationList->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstEmailBroadcastType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstEmailBroadcastType_Create($strControlId = null) {
			$this->lstEmailBroadcastType = new QListBox($this->objParentObject, $strControlId);
			$this->lstEmailBroadcastType->Name = QApplication::Translate('Email Broadcast Type');
			$this->lstEmailBroadcastType->Required = true;

			$this->lstEmailBroadcastType->AddItems(EmailBroadcastType::$NameArray, $this->objCommunicationList->EmailBroadcastTypeId);
			return $this->lstEmailBroadcastType;
		}

		/**
		 * Create and setup QLabel lblEmailBroadcastTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmailBroadcastTypeId_Create($strControlId = null) {
			$this->lblEmailBroadcastTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmailBroadcastTypeId->Name = QApplication::Translate('Email Broadcast Type');
			$this->lblEmailBroadcastTypeId->Text = ($this->objCommunicationList->EmailBroadcastTypeId) ? EmailBroadcastType::$NameArray[$this->objCommunicationList->EmailBroadcastTypeId] : null;
			$this->lblEmailBroadcastTypeId->Required = true;
			return $this->lblEmailBroadcastTypeId;
		}

		/**
		 * Create and setup QListBox lstMinistry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstMinistry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstMinistry = new QListBox($this->objParentObject, $strControlId);
			$this->lstMinistry->Name = QApplication::Translate('Ministry');
			$this->lstMinistry->Required = true;
			if (!$this->blnEditMode)
				$this->lstMinistry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objMinistryCursor = Ministry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objMinistry = Ministry::InstantiateCursor($objMinistryCursor)) {
				$objListItem = new QListItem($objMinistry->__toString(), $objMinistry->Id);
				if (($this->objCommunicationList->Ministry) && ($this->objCommunicationList->Ministry->Id == $objMinistry->Id))
					$objListItem->Selected = true;
				$this->lstMinistry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstMinistry;
		}

		/**
		 * Create and setup QLabel lblMinistryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMinistryId_Create($strControlId = null) {
			$this->lblMinistryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblMinistryId->Name = QApplication::Translate('Ministry');
			$this->lblMinistryId->Text = ($this->objCommunicationList->Ministry) ? $this->objCommunicationList->Ministry->__toString() : null;
			$this->lblMinistryId->Required = true;
			return $this->lblMinistryId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objCommunicationList->Name;
			$this->txtName->MaxLength = CommunicationList::NameMaxLength;
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
			$this->lblName->Text = $this->objCommunicationList->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtToken
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToken_Create($strControlId = null) {
			$this->txtToken = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToken->Name = QApplication::Translate('Token');
			$this->txtToken->Text = $this->objCommunicationList->Token;
			$this->txtToken->Required = true;
			$this->txtToken->MaxLength = CommunicationList::TokenMaxLength;
			return $this->txtToken;
		}

		/**
		 * Create and setup QLabel lblToken
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToken_Create($strControlId = null) {
			$this->lblToken = new QLabel($this->objParentObject, $strControlId);
			$this->lblToken->Name = QApplication::Translate('Token');
			$this->lblToken->Text = $this->objCommunicationList->Token;
			$this->lblToken->Required = true;
			return $this->lblToken;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objCommunicationList->Description;
			$this->txtDescription->MaxLength = CommunicationList::DescriptionMaxLength;
			return $this->txtDescription;
		}

		/**
		 * Create and setup QLabel lblDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescription_Create($strControlId = null) {
			$this->lblDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescription->Name = QApplication::Translate('Description');
			$this->lblDescription->Text = $this->objCommunicationList->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QCheckBox chkSubscribable
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkSubscribable_Create($strControlId = null) {
			$this->chkSubscribable = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkSubscribable->Name = QApplication::Translate('Subscribable');
			$this->chkSubscribable->Checked = $this->objCommunicationList->Subscribable;
			return $this->chkSubscribable;
		}

		/**
		 * Create and setup QLabel lblSubscribable
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSubscribable_Create($strControlId = null) {
			$this->lblSubscribable = new QLabel($this->objParentObject, $strControlId);
			$this->lblSubscribable->Name = QApplication::Translate('Subscribable');
			$this->lblSubscribable->Text = ($this->objCommunicationList->Subscribable) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblSubscribable;
		}

		/**
		 * Create and setup QListBox lstCommunicationListEntries
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCommunicationListEntries_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCommunicationListEntries = new QListBox($this->objParentObject, $strControlId);
			$this->lstCommunicationListEntries->Name = QApplication::Translate('Communication List Entries');
			$this->lstCommunicationListEntries->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objCommunicationList->GetCommunicationListEntryArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCommunicationListEntryCursor = CommunicationListEntry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCommunicationListEntry = CommunicationListEntry::InstantiateCursor($objCommunicationListEntryCursor)) {
				$objListItem = new QListItem($objCommunicationListEntry->__toString(), $objCommunicationListEntry->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objCommunicationListEntry->Id)
						$objListItem->Selected = true;
				}
				$this->lstCommunicationListEntries->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstCommunicationListEntries;
		}

		/**
		 * Create and setup QLabel lblCommunicationListEntries
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblCommunicationListEntries_Create($strControlId = null, $strGlue = ', ') {
			$this->lblCommunicationListEntries = new QLabel($this->objParentObject, $strControlId);
			$this->lstCommunicationListEntries->Name = QApplication::Translate('Communication List Entries');
			
			$objAssociatedArray = $this->objCommunicationList->GetCommunicationListEntryArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblCommunicationListEntries->Text = implode($strGlue, $strItems);
			return $this->lblCommunicationListEntries;
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
			$objAssociatedArray = $this->objCommunicationList->GetPersonArray();

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
			
			$objAssociatedArray = $this->objCommunicationList->GetPersonArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblPeople->Text = implode($strGlue, $strItems);
			return $this->lblPeople;
		}



		/**
		 * Refresh this MetaControl with Data from the local CommunicationList object.
		 * @param boolean $blnReload reload CommunicationList from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCommunicationList->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objCommunicationList->Id;

			if ($this->lstEmailBroadcastType) $this->lstEmailBroadcastType->SelectedValue = $this->objCommunicationList->EmailBroadcastTypeId;
			if ($this->lblEmailBroadcastTypeId) $this->lblEmailBroadcastTypeId->Text = ($this->objCommunicationList->EmailBroadcastTypeId) ? EmailBroadcastType::$NameArray[$this->objCommunicationList->EmailBroadcastTypeId] : null;

			if ($this->lstMinistry) {
					$this->lstMinistry->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstMinistry->AddItem(QApplication::Translate('- Select One -'), null);
				$objMinistryArray = Ministry::LoadAll();
				if ($objMinistryArray) foreach ($objMinistryArray as $objMinistry) {
					$objListItem = new QListItem($objMinistry->__toString(), $objMinistry->Id);
					if (($this->objCommunicationList->Ministry) && ($this->objCommunicationList->Ministry->Id == $objMinistry->Id))
						$objListItem->Selected = true;
					$this->lstMinistry->AddItem($objListItem);
				}
			}
			if ($this->lblMinistryId) $this->lblMinistryId->Text = ($this->objCommunicationList->Ministry) ? $this->objCommunicationList->Ministry->__toString() : null;

			if ($this->txtName) $this->txtName->Text = $this->objCommunicationList->Name;
			if ($this->lblName) $this->lblName->Text = $this->objCommunicationList->Name;

			if ($this->txtToken) $this->txtToken->Text = $this->objCommunicationList->Token;
			if ($this->lblToken) $this->lblToken->Text = $this->objCommunicationList->Token;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objCommunicationList->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objCommunicationList->Description;

			if ($this->chkSubscribable) $this->chkSubscribable->Checked = $this->objCommunicationList->Subscribable;
			if ($this->lblSubscribable) $this->lblSubscribable->Text = ($this->objCommunicationList->Subscribable) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCommunicationListEntries) {
				$this->lstCommunicationListEntries->RemoveAllItems();
				$objAssociatedArray = $this->objCommunicationList->GetCommunicationListEntryArray();
				$objCommunicationListEntryArray = CommunicationListEntry::LoadAll();
				if ($objCommunicationListEntryArray) foreach ($objCommunicationListEntryArray as $objCommunicationListEntry) {
					$objListItem = new QListItem($objCommunicationListEntry->__toString(), $objCommunicationListEntry->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objCommunicationListEntry->Id)
							$objListItem->Selected = true;
					}
					$this->lstCommunicationListEntries->AddItem($objListItem);
				}
			}
			if ($this->lblCommunicationListEntries) {
				$objAssociatedArray = $this->objCommunicationList->GetCommunicationListEntryArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblCommunicationListEntries->Text = implode($strGlue, $strItems);
			}

			if ($this->lstPeople) {
				$this->lstPeople->RemoveAllItems();
				$objAssociatedArray = $this->objCommunicationList->GetPersonArray();
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
				$objAssociatedArray = $this->objCommunicationList->GetPersonArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblPeople->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstCommunicationListEntries_Update() {
			if ($this->lstCommunicationListEntries) {
				$this->objCommunicationList->UnassociateAllCommunicationListEntries();
				$objSelectedListItems = $this->lstCommunicationListEntries->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objCommunicationList->AssociateCommunicationListEntry(CommunicationListEntry::Load($objListItem->Value));
				}
			}
		}

		protected function lstPeople_Update() {
			if ($this->lstPeople) {
				$this->objCommunicationList->UnassociateAllPeople();
				$objSelectedListItems = $this->lstPeople->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objCommunicationList->AssociatePerson(Person::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC COMMUNICATIONLIST OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's CommunicationList instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCommunicationList() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstEmailBroadcastType) $this->objCommunicationList->EmailBroadcastTypeId = $this->lstEmailBroadcastType->SelectedValue;
				if ($this->lstMinistry) $this->objCommunicationList->MinistryId = $this->lstMinistry->SelectedValue;
				if ($this->txtName) $this->objCommunicationList->Name = $this->txtName->Text;
				if ($this->txtToken) $this->objCommunicationList->Token = $this->txtToken->Text;
				if ($this->txtDescription) $this->objCommunicationList->Description = $this->txtDescription->Text;
				if ($this->chkSubscribable) $this->objCommunicationList->Subscribable = $this->chkSubscribable->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the CommunicationList object
				$this->objCommunicationList->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstCommunicationListEntries_Update();
				$this->lstPeople_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's CommunicationList instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCommunicationList() {
			$this->objCommunicationList->UnassociateAllCommunicationListEntries();
			$this->objCommunicationList->UnassociateAllPeople();
			$this->objCommunicationList->Delete();
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
				case 'CommunicationList': return $this->objCommunicationList;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to CommunicationList fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'EmailBroadcastTypeIdControl':
					if (!$this->lstEmailBroadcastType) return $this->lstEmailBroadcastType_Create();
					return $this->lstEmailBroadcastType;
				case 'EmailBroadcastTypeIdLabel':
					if (!$this->lblEmailBroadcastTypeId) return $this->lblEmailBroadcastTypeId_Create();
					return $this->lblEmailBroadcastTypeId;
				case 'MinistryIdControl':
					if (!$this->lstMinistry) return $this->lstMinistry_Create();
					return $this->lstMinistry;
				case 'MinistryIdLabel':
					if (!$this->lblMinistryId) return $this->lblMinistryId_Create();
					return $this->lblMinistryId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'TokenControl':
					if (!$this->txtToken) return $this->txtToken_Create();
					return $this->txtToken;
				case 'TokenLabel':
					if (!$this->lblToken) return $this->lblToken_Create();
					return $this->lblToken;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'SubscribableControl':
					if (!$this->chkSubscribable) return $this->chkSubscribable_Create();
					return $this->chkSubscribable;
				case 'SubscribableLabel':
					if (!$this->lblSubscribable) return $this->lblSubscribable_Create();
					return $this->lblSubscribable;
				case 'CommunicationListEntryControl':
					if (!$this->lstCommunicationListEntries) return $this->lstCommunicationListEntries_Create();
					return $this->lstCommunicationListEntries;
				case 'CommunicationListEntryLabel':
					if (!$this->lblCommunicationListEntries) return $this->lblCommunicationListEntries_Create();
					return $this->lblCommunicationListEntries;
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
					// Controls that point to CommunicationList fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'EmailBroadcastTypeIdControl':
						return ($this->lstEmailBroadcastType = QType::Cast($mixValue, 'QControl'));
					case 'MinistryIdControl':
						return ($this->lstMinistry = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'TokenControl':
						return ($this->txtToken = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'SubscribableControl':
						return ($this->chkSubscribable = QType::Cast($mixValue, 'QControl'));
					case 'CommunicationListEntryControl':
						return ($this->lstCommunicationListEntries = QType::Cast($mixValue, 'QControl'));
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