<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the EmailMessageRoute class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single EmailMessageRoute object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a EmailMessageRouteMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read EmailMessageRoute $EmailMessageRoute the actual EmailMessageRoute data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $EmailMessageIdControl
	 * property-read QLabel $EmailMessageIdLabel
	 * property QListBox $GroupIdControl
	 * property-read QLabel $GroupIdLabel
	 * property QListBox $CommunicationListIdControl
	 * property-read QLabel $CommunicationListIdLabel
	 * property QListBox $LoginIdControl
	 * property-read QLabel $LoginIdLabel
	 * property QListBox $CommunicationListEntryIdControl
	 * property-read QLabel $CommunicationListEntryIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class EmailMessageRouteMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var EmailMessageRoute objEmailMessageRoute
		 * @access protected
		 */
		protected $objEmailMessageRoute;

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

		// Controls that allow the editing of EmailMessageRoute's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstEmailMessage;
         * @access protected
         */
		protected $lstEmailMessage;

        /**
         * @var QListBox lstGroup;
         * @access protected
         */
		protected $lstGroup;

        /**
         * @var QListBox lstCommunicationList;
         * @access protected
         */
		protected $lstCommunicationList;

        /**
         * @var QListBox lstLogin;
         * @access protected
         */
		protected $lstLogin;

        /**
         * @var QListBox lstCommunicationListEntry;
         * @access protected
         */
		protected $lstCommunicationListEntry;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;


		// Controls that allow the viewing of EmailMessageRoute's individual data fields
        /**
         * @var QLabel lblEmailMessageId
         * @access protected
         */
		protected $lblEmailMessageId;

        /**
         * @var QLabel lblGroupId
         * @access protected
         */
		protected $lblGroupId;

        /**
         * @var QLabel lblCommunicationListId
         * @access protected
         */
		protected $lblCommunicationListId;

        /**
         * @var QLabel lblLoginId
         * @access protected
         */
		protected $lblLoginId;

        /**
         * @var QLabel lblCommunicationListEntryId
         * @access protected
         */
		protected $lblCommunicationListEntryId;

        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * EmailMessageRouteMetaControl to edit a single EmailMessageRoute object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single EmailMessageRoute object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMessageRouteMetaControl
		 * @param EmailMessageRoute $objEmailMessageRoute new or existing EmailMessageRoute object
		 */
		 public function __construct($objParentObject, EmailMessageRoute $objEmailMessageRoute) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this EmailMessageRouteMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked EmailMessageRoute object
			$this->objEmailMessageRoute = $objEmailMessageRoute;

			// Figure out if we're Editing or Creating New
			if ($this->objEmailMessageRoute->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMessageRouteMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing EmailMessageRoute object creation - defaults to CreateOrEdit
 		 * @return EmailMessageRouteMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objEmailMessageRoute = EmailMessageRoute::Load($intId);

				// EmailMessageRoute was found -- return it!
				if ($objEmailMessageRoute)
					return new EmailMessageRouteMetaControl($objParentObject, $objEmailMessageRoute);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a EmailMessageRoute object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new EmailMessageRouteMetaControl($objParentObject, new EmailMessageRoute());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMessageRouteMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EmailMessageRoute object creation - defaults to CreateOrEdit
		 * @return EmailMessageRouteMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return EmailMessageRouteMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMessageRouteMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EmailMessageRoute object creation - defaults to CreateOrEdit
		 * @return EmailMessageRouteMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return EmailMessageRouteMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objEmailMessageRoute->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstEmailMessage
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstEmailMessage_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstEmailMessage = new QListBox($this->objParentObject, $strControlId);
			$this->lstEmailMessage->Name = QApplication::Translate('Email Message');
			$this->lstEmailMessage->Required = true;
			if (!$this->blnEditMode)
				$this->lstEmailMessage->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objEmailMessageCursor = EmailMessage::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objEmailMessage = EmailMessage::InstantiateCursor($objEmailMessageCursor)) {
				$objListItem = new QListItem($objEmailMessage->__toString(), $objEmailMessage->Id);
				if (($this->objEmailMessageRoute->EmailMessage) && ($this->objEmailMessageRoute->EmailMessage->Id == $objEmailMessage->Id))
					$objListItem->Selected = true;
				$this->lstEmailMessage->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstEmailMessage;
		}

		/**
		 * Create and setup QLabel lblEmailMessageId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmailMessageId_Create($strControlId = null) {
			$this->lblEmailMessageId = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmailMessageId->Name = QApplication::Translate('Email Message');
			$this->lblEmailMessageId->Text = ($this->objEmailMessageRoute->EmailMessage) ? $this->objEmailMessageRoute->EmailMessage->__toString() : null;
			$this->lblEmailMessageId->Required = true;
			return $this->lblEmailMessageId;
		}

		/**
		 * Create and setup QListBox lstGroup
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGroup_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGroup = new QListBox($this->objParentObject, $strControlId);
			$this->lstGroup->Name = QApplication::Translate('Group');
			$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGroupCursor = Group::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGroup = Group::InstantiateCursor($objGroupCursor)) {
				$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
				if (($this->objEmailMessageRoute->Group) && ($this->objEmailMessageRoute->Group->Id == $objGroup->Id))
					$objListItem->Selected = true;
				$this->lstGroup->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstGroup;
		}

		/**
		 * Create and setup QLabel lblGroupId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupId_Create($strControlId = null) {
			$this->lblGroupId = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupId->Name = QApplication::Translate('Group');
			$this->lblGroupId->Text = ($this->objEmailMessageRoute->Group) ? $this->objEmailMessageRoute->Group->__toString() : null;
			return $this->lblGroupId;
		}

		/**
		 * Create and setup QListBox lstCommunicationList
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCommunicationList_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCommunicationList = new QListBox($this->objParentObject, $strControlId);
			$this->lstCommunicationList->Name = QApplication::Translate('Communication List');
			$this->lstCommunicationList->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCommunicationListCursor = CommunicationList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCommunicationList = CommunicationList::InstantiateCursor($objCommunicationListCursor)) {
				$objListItem = new QListItem($objCommunicationList->__toString(), $objCommunicationList->Id);
				if (($this->objEmailMessageRoute->CommunicationList) && ($this->objEmailMessageRoute->CommunicationList->Id == $objCommunicationList->Id))
					$objListItem->Selected = true;
				$this->lstCommunicationList->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCommunicationList;
		}

		/**
		 * Create and setup QLabel lblCommunicationListId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCommunicationListId_Create($strControlId = null) {
			$this->lblCommunicationListId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCommunicationListId->Name = QApplication::Translate('Communication List');
			$this->lblCommunicationListId->Text = ($this->objEmailMessageRoute->CommunicationList) ? $this->objEmailMessageRoute->CommunicationList->__toString() : null;
			return $this->lblCommunicationListId;
		}

		/**
		 * Create and setup QListBox lstLogin
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstLogin_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstLogin = new QListBox($this->objParentObject, $strControlId);
			$this->lstLogin->Name = QApplication::Translate('Login');
			$this->lstLogin->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objLoginCursor = Login::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objLogin = Login::InstantiateCursor($objLoginCursor)) {
				$objListItem = new QListItem($objLogin->__toString(), $objLogin->Id);
				if (($this->objEmailMessageRoute->Login) && ($this->objEmailMessageRoute->Login->Id == $objLogin->Id))
					$objListItem->Selected = true;
				$this->lstLogin->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstLogin;
		}

		/**
		 * Create and setup QLabel lblLoginId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLoginId_Create($strControlId = null) {
			$this->lblLoginId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLoginId->Name = QApplication::Translate('Login');
			$this->lblLoginId->Text = ($this->objEmailMessageRoute->Login) ? $this->objEmailMessageRoute->Login->__toString() : null;
			return $this->lblLoginId;
		}

		/**
		 * Create and setup QListBox lstCommunicationListEntry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCommunicationListEntry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCommunicationListEntry = new QListBox($this->objParentObject, $strControlId);
			$this->lstCommunicationListEntry->Name = QApplication::Translate('Communication List Entry');
			$this->lstCommunicationListEntry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCommunicationListEntryCursor = CommunicationListEntry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCommunicationListEntry = CommunicationListEntry::InstantiateCursor($objCommunicationListEntryCursor)) {
				$objListItem = new QListItem($objCommunicationListEntry->__toString(), $objCommunicationListEntry->Id);
				if (($this->objEmailMessageRoute->CommunicationListEntry) && ($this->objEmailMessageRoute->CommunicationListEntry->Id == $objCommunicationListEntry->Id))
					$objListItem->Selected = true;
				$this->lstCommunicationListEntry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCommunicationListEntry;
		}

		/**
		 * Create and setup QLabel lblCommunicationListEntryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCommunicationListEntryId_Create($strControlId = null) {
			$this->lblCommunicationListEntryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCommunicationListEntryId->Name = QApplication::Translate('Communication List Entry');
			$this->lblCommunicationListEntryId->Text = ($this->objEmailMessageRoute->CommunicationListEntry) ? $this->objEmailMessageRoute->CommunicationListEntry->__toString() : null;
			return $this->lblCommunicationListEntryId;
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
			$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objEmailMessageRoute->Person) && ($this->objEmailMessageRoute->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objEmailMessageRoute->Person) ? $this->objEmailMessageRoute->Person->__toString() : null;
			return $this->lblPersonId;
		}



		/**
		 * Refresh this MetaControl with Data from the local EmailMessageRoute object.
		 * @param boolean $blnReload reload EmailMessageRoute from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objEmailMessageRoute->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objEmailMessageRoute->Id;

			if ($this->lstEmailMessage) {
					$this->lstEmailMessage->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstEmailMessage->AddItem(QApplication::Translate('- Select One -'), null);
				$objEmailMessageArray = EmailMessage::LoadAll();
				if ($objEmailMessageArray) foreach ($objEmailMessageArray as $objEmailMessage) {
					$objListItem = new QListItem($objEmailMessage->__toString(), $objEmailMessage->Id);
					if (($this->objEmailMessageRoute->EmailMessage) && ($this->objEmailMessageRoute->EmailMessage->Id == $objEmailMessage->Id))
						$objListItem->Selected = true;
					$this->lstEmailMessage->AddItem($objListItem);
				}
			}
			if ($this->lblEmailMessageId) $this->lblEmailMessageId->Text = ($this->objEmailMessageRoute->EmailMessage) ? $this->objEmailMessageRoute->EmailMessage->__toString() : null;

			if ($this->lstGroup) {
					$this->lstGroup->RemoveAllItems();
				$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupArray = Group::LoadAll();
				if ($objGroupArray) foreach ($objGroupArray as $objGroup) {
					$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
					if (($this->objEmailMessageRoute->Group) && ($this->objEmailMessageRoute->Group->Id == $objGroup->Id))
						$objListItem->Selected = true;
					$this->lstGroup->AddItem($objListItem);
				}
			}
			if ($this->lblGroupId) $this->lblGroupId->Text = ($this->objEmailMessageRoute->Group) ? $this->objEmailMessageRoute->Group->__toString() : null;

			if ($this->lstCommunicationList) {
					$this->lstCommunicationList->RemoveAllItems();
				$this->lstCommunicationList->AddItem(QApplication::Translate('- Select One -'), null);
				$objCommunicationListArray = CommunicationList::LoadAll();
				if ($objCommunicationListArray) foreach ($objCommunicationListArray as $objCommunicationList) {
					$objListItem = new QListItem($objCommunicationList->__toString(), $objCommunicationList->Id);
					if (($this->objEmailMessageRoute->CommunicationList) && ($this->objEmailMessageRoute->CommunicationList->Id == $objCommunicationList->Id))
						$objListItem->Selected = true;
					$this->lstCommunicationList->AddItem($objListItem);
				}
			}
			if ($this->lblCommunicationListId) $this->lblCommunicationListId->Text = ($this->objEmailMessageRoute->CommunicationList) ? $this->objEmailMessageRoute->CommunicationList->__toString() : null;

			if ($this->lstLogin) {
					$this->lstLogin->RemoveAllItems();
				$this->lstLogin->AddItem(QApplication::Translate('- Select One -'), null);
				$objLoginArray = Login::LoadAll();
				if ($objLoginArray) foreach ($objLoginArray as $objLogin) {
					$objListItem = new QListItem($objLogin->__toString(), $objLogin->Id);
					if (($this->objEmailMessageRoute->Login) && ($this->objEmailMessageRoute->Login->Id == $objLogin->Id))
						$objListItem->Selected = true;
					$this->lstLogin->AddItem($objListItem);
				}
			}
			if ($this->lblLoginId) $this->lblLoginId->Text = ($this->objEmailMessageRoute->Login) ? $this->objEmailMessageRoute->Login->__toString() : null;

			if ($this->lstCommunicationListEntry) {
					$this->lstCommunicationListEntry->RemoveAllItems();
				$this->lstCommunicationListEntry->AddItem(QApplication::Translate('- Select One -'), null);
				$objCommunicationListEntryArray = CommunicationListEntry::LoadAll();
				if ($objCommunicationListEntryArray) foreach ($objCommunicationListEntryArray as $objCommunicationListEntry) {
					$objListItem = new QListItem($objCommunicationListEntry->__toString(), $objCommunicationListEntry->Id);
					if (($this->objEmailMessageRoute->CommunicationListEntry) && ($this->objEmailMessageRoute->CommunicationListEntry->Id == $objCommunicationListEntry->Id))
						$objListItem->Selected = true;
					$this->lstCommunicationListEntry->AddItem($objListItem);
				}
			}
			if ($this->lblCommunicationListEntryId) $this->lblCommunicationListEntryId->Text = ($this->objEmailMessageRoute->CommunicationListEntry) ? $this->objEmailMessageRoute->CommunicationListEntry->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objEmailMessageRoute->Person) && ($this->objEmailMessageRoute->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objEmailMessageRoute->Person) ? $this->objEmailMessageRoute->Person->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC EMAILMESSAGEROUTE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's EmailMessageRoute instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveEmailMessageRoute() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstEmailMessage) $this->objEmailMessageRoute->EmailMessageId = $this->lstEmailMessage->SelectedValue;
				if ($this->lstGroup) $this->objEmailMessageRoute->GroupId = $this->lstGroup->SelectedValue;
				if ($this->lstCommunicationList) $this->objEmailMessageRoute->CommunicationListId = $this->lstCommunicationList->SelectedValue;
				if ($this->lstLogin) $this->objEmailMessageRoute->LoginId = $this->lstLogin->SelectedValue;
				if ($this->lstCommunicationListEntry) $this->objEmailMessageRoute->CommunicationListEntryId = $this->lstCommunicationListEntry->SelectedValue;
				if ($this->lstPerson) $this->objEmailMessageRoute->PersonId = $this->lstPerson->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the EmailMessageRoute object
				$this->objEmailMessageRoute->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's EmailMessageRoute instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteEmailMessageRoute() {
			$this->objEmailMessageRoute->Delete();
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
				case 'EmailMessageRoute': return $this->objEmailMessageRoute;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to EmailMessageRoute fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'EmailMessageIdControl':
					if (!$this->lstEmailMessage) return $this->lstEmailMessage_Create();
					return $this->lstEmailMessage;
				case 'EmailMessageIdLabel':
					if (!$this->lblEmailMessageId) return $this->lblEmailMessageId_Create();
					return $this->lblEmailMessageId;
				case 'GroupIdControl':
					if (!$this->lstGroup) return $this->lstGroup_Create();
					return $this->lstGroup;
				case 'GroupIdLabel':
					if (!$this->lblGroupId) return $this->lblGroupId_Create();
					return $this->lblGroupId;
				case 'CommunicationListIdControl':
					if (!$this->lstCommunicationList) return $this->lstCommunicationList_Create();
					return $this->lstCommunicationList;
				case 'CommunicationListIdLabel':
					if (!$this->lblCommunicationListId) return $this->lblCommunicationListId_Create();
					return $this->lblCommunicationListId;
				case 'LoginIdControl':
					if (!$this->lstLogin) return $this->lstLogin_Create();
					return $this->lstLogin;
				case 'LoginIdLabel':
					if (!$this->lblLoginId) return $this->lblLoginId_Create();
					return $this->lblLoginId;
				case 'CommunicationListEntryIdControl':
					if (!$this->lstCommunicationListEntry) return $this->lstCommunicationListEntry_Create();
					return $this->lstCommunicationListEntry;
				case 'CommunicationListEntryIdLabel':
					if (!$this->lblCommunicationListEntryId) return $this->lblCommunicationListEntryId_Create();
					return $this->lblCommunicationListEntryId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
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
					// Controls that point to EmailMessageRoute fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'EmailMessageIdControl':
						return ($this->lstEmailMessage = QType::Cast($mixValue, 'QControl'));
					case 'GroupIdControl':
						return ($this->lstGroup = QType::Cast($mixValue, 'QControl'));
					case 'CommunicationListIdControl':
						return ($this->lstCommunicationList = QType::Cast($mixValue, 'QControl'));
					case 'LoginIdControl':
						return ($this->lstLogin = QType::Cast($mixValue, 'QControl'));
					case 'CommunicationListEntryIdControl':
						return ($this->lstCommunicationListEntry = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
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