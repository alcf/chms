<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the EmailMessage class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single EmailMessage object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a EmailMessageMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read EmailMessage $EmailMessage the actual EmailMessage data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $EmailMessageStatusTypeIdControl
	 * property-read QLabel $EmailMessageStatusTypeIdLabel
	 * property QTextBox $RawMessageControl
	 * property-read QLabel $RawMessageLabel
	 * property QDateTimePicker $DateReceivedControl
	 * property-read QLabel $DateReceivedLabel
	 * property QListBox $ReceivedFromPersonIdControl
	 * property-read QLabel $ReceivedFromPersonIdLabel
	 * property QListBox $ReceivedFromEntryIdControl
	 * property-read QLabel $ReceivedFromEntryIdLabel
	 * property QListBox $GroupIdControl
	 * property-read QLabel $GroupIdLabel
	 * property QListBox $CommunicationListIdControl
	 * property-read QLabel $CommunicationListIdLabel
	 * property QTextBox $SubjectControl
	 * property-read QLabel $SubjectLabel
	 * property QTextBox $ResponseMessageControl
	 * property-read QLabel $ResponseMessageLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class EmailMessageMetaControlGen extends QBaseClass {
		// General Variables
		protected $objEmailMessage;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of EmailMessage's individual data fields
		protected $lblId;
		protected $lstEmailMessageStatusType;
		protected $txtRawMessage;
		protected $calDateReceived;
		protected $lstReceivedFromPerson;
		protected $lstReceivedFromEntry;
		protected $lstGroup;
		protected $lstCommunicationList;
		protected $txtSubject;
		protected $txtResponseMessage;

		// Controls that allow the viewing of EmailMessage's individual data fields
		protected $lblEmailMessageStatusTypeId;
		protected $lblRawMessage;
		protected $lblDateReceived;
		protected $lblReceivedFromPersonId;
		protected $lblReceivedFromEntryId;
		protected $lblGroupId;
		protected $lblCommunicationListId;
		protected $lblSubject;
		protected $lblResponseMessage;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * EmailMessageMetaControl to edit a single EmailMessage object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single EmailMessage object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMessageMetaControl
		 * @param EmailMessage $objEmailMessage new or existing EmailMessage object
		 */
		 public function __construct($objParentObject, EmailMessage $objEmailMessage) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this EmailMessageMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked EmailMessage object
			$this->objEmailMessage = $objEmailMessage;

			// Figure out if we're Editing or Creating New
			if ($this->objEmailMessage->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMessageMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing EmailMessage object creation - defaults to CreateOrEdit
 		 * @return EmailMessageMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objEmailMessage = EmailMessage::Load($intId);

				// EmailMessage was found -- return it!
				if ($objEmailMessage)
					return new EmailMessageMetaControl($objParentObject, $objEmailMessage);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a EmailMessage object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new EmailMessageMetaControl($objParentObject, new EmailMessage());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMessageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EmailMessage object creation - defaults to CreateOrEdit
		 * @return EmailMessageMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return EmailMessageMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailMessageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EmailMessage object creation - defaults to CreateOrEdit
		 * @return EmailMessageMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return EmailMessageMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objEmailMessage->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstEmailMessageStatusType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstEmailMessageStatusType_Create($strControlId = null) {
			$this->lstEmailMessageStatusType = new QListBox($this->objParentObject, $strControlId);
			$this->lstEmailMessageStatusType->Name = QApplication::Translate('Email Message Status Type');
			$this->lstEmailMessageStatusType->Required = true;
			foreach (EmailMessageStatusType::$NameArray as $intId => $strValue)
				$this->lstEmailMessageStatusType->AddItem(new QListItem($strValue, $intId, $this->objEmailMessage->EmailMessageStatusTypeId == $intId));
			return $this->lstEmailMessageStatusType;
		}

		/**
		 * Create and setup QLabel lblEmailMessageStatusTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmailMessageStatusTypeId_Create($strControlId = null) {
			$this->lblEmailMessageStatusTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmailMessageStatusTypeId->Name = QApplication::Translate('Email Message Status Type');
			$this->lblEmailMessageStatusTypeId->Text = ($this->objEmailMessage->EmailMessageStatusTypeId) ? EmailMessageStatusType::$NameArray[$this->objEmailMessage->EmailMessageStatusTypeId] : null;
			$this->lblEmailMessageStatusTypeId->Required = true;
			return $this->lblEmailMessageStatusTypeId;
		}

		/**
		 * Create and setup QTextBox txtRawMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtRawMessage_Create($strControlId = null) {
			$this->txtRawMessage = new QTextBox($this->objParentObject, $strControlId);
			$this->txtRawMessage->Name = QApplication::Translate('Raw Message');
			$this->txtRawMessage->Text = $this->objEmailMessage->RawMessage;
			$this->txtRawMessage->TextMode = QTextMode::MultiLine;
			return $this->txtRawMessage;
		}

		/**
		 * Create and setup QLabel lblRawMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRawMessage_Create($strControlId = null) {
			$this->lblRawMessage = new QLabel($this->objParentObject, $strControlId);
			$this->lblRawMessage->Name = QApplication::Translate('Raw Message');
			$this->lblRawMessage->Text = $this->objEmailMessage->RawMessage;
			return $this->lblRawMessage;
		}

		/**
		 * Create and setup QDateTimePicker calDateReceived
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateReceived_Create($strControlId = null) {
			$this->calDateReceived = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateReceived->Name = QApplication::Translate('Date Received');
			$this->calDateReceived->DateTime = $this->objEmailMessage->DateReceived;
			$this->calDateReceived->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDateReceived->Required = true;
			return $this->calDateReceived;
		}

		/**
		 * Create and setup QLabel lblDateReceived
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateReceived_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateReceived = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateReceived->Name = QApplication::Translate('Date Received');
			$this->strDateReceivedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateReceived->Text = sprintf($this->objEmailMessage->DateReceived) ? $this->objEmailMessage->DateReceived->__toString($this->strDateReceivedDateTimeFormat) : null;
			$this->lblDateReceived->Required = true;
			return $this->lblDateReceived;
		}

		protected $strDateReceivedDateTimeFormat;

		/**
		 * Create and setup QListBox lstReceivedFromPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstReceivedFromPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstReceivedFromPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstReceivedFromPerson->Name = QApplication::Translate('Received From Person');
			$this->lstReceivedFromPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objReceivedFromPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objReceivedFromPerson = Person::InstantiateCursor($objReceivedFromPersonCursor)) {
				$objListItem = new QListItem($objReceivedFromPerson->__toString(), $objReceivedFromPerson->Id);
				if (($this->objEmailMessage->ReceivedFromPerson) && ($this->objEmailMessage->ReceivedFromPerson->Id == $objReceivedFromPerson->Id))
					$objListItem->Selected = true;
				$this->lstReceivedFromPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstReceivedFromPerson;
		}

		/**
		 * Create and setup QLabel lblReceivedFromPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblReceivedFromPersonId_Create($strControlId = null) {
			$this->lblReceivedFromPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblReceivedFromPersonId->Name = QApplication::Translate('Received From Person');
			$this->lblReceivedFromPersonId->Text = ($this->objEmailMessage->ReceivedFromPerson) ? $this->objEmailMessage->ReceivedFromPerson->__toString() : null;
			return $this->lblReceivedFromPersonId;
		}

		/**
		 * Create and setup QListBox lstReceivedFromEntry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstReceivedFromEntry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstReceivedFromEntry = new QListBox($this->objParentObject, $strControlId);
			$this->lstReceivedFromEntry->Name = QApplication::Translate('Received From Entry');
			$this->lstReceivedFromEntry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objReceivedFromEntryCursor = CommunicationListEntry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objReceivedFromEntry = CommunicationListEntry::InstantiateCursor($objReceivedFromEntryCursor)) {
				$objListItem = new QListItem($objReceivedFromEntry->__toString(), $objReceivedFromEntry->Id);
				if (($this->objEmailMessage->ReceivedFromEntry) && ($this->objEmailMessage->ReceivedFromEntry->Id == $objReceivedFromEntry->Id))
					$objListItem->Selected = true;
				$this->lstReceivedFromEntry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstReceivedFromEntry;
		}

		/**
		 * Create and setup QLabel lblReceivedFromEntryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblReceivedFromEntryId_Create($strControlId = null) {
			$this->lblReceivedFromEntryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblReceivedFromEntryId->Name = QApplication::Translate('Received From Entry');
			$this->lblReceivedFromEntryId->Text = ($this->objEmailMessage->ReceivedFromEntry) ? $this->objEmailMessage->ReceivedFromEntry->__toString() : null;
			return $this->lblReceivedFromEntryId;
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
				if (($this->objEmailMessage->Group) && ($this->objEmailMessage->Group->Id == $objGroup->Id))
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
			$this->lblGroupId->Text = ($this->objEmailMessage->Group) ? $this->objEmailMessage->Group->__toString() : null;
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
				if (($this->objEmailMessage->CommunicationList) && ($this->objEmailMessage->CommunicationList->Id == $objCommunicationList->Id))
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
			$this->lblCommunicationListId->Text = ($this->objEmailMessage->CommunicationList) ? $this->objEmailMessage->CommunicationList->__toString() : null;
			return $this->lblCommunicationListId;
		}

		/**
		 * Create and setup QTextBox txtSubject
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSubject_Create($strControlId = null) {
			$this->txtSubject = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSubject->Name = QApplication::Translate('Subject');
			$this->txtSubject->Text = $this->objEmailMessage->Subject;
			$this->txtSubject->MaxLength = EmailMessage::SubjectMaxLength;
			return $this->txtSubject;
		}

		/**
		 * Create and setup QLabel lblSubject
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSubject_Create($strControlId = null) {
			$this->lblSubject = new QLabel($this->objParentObject, $strControlId);
			$this->lblSubject->Name = QApplication::Translate('Subject');
			$this->lblSubject->Text = $this->objEmailMessage->Subject;
			return $this->lblSubject;
		}

		/**
		 * Create and setup QTextBox txtResponseMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtResponseMessage_Create($strControlId = null) {
			$this->txtResponseMessage = new QTextBox($this->objParentObject, $strControlId);
			$this->txtResponseMessage->Name = QApplication::Translate('Response Message');
			$this->txtResponseMessage->Text = $this->objEmailMessage->ResponseMessage;
			$this->txtResponseMessage->TextMode = QTextMode::MultiLine;
			return $this->txtResponseMessage;
		}

		/**
		 * Create and setup QLabel lblResponseMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblResponseMessage_Create($strControlId = null) {
			$this->lblResponseMessage = new QLabel($this->objParentObject, $strControlId);
			$this->lblResponseMessage->Name = QApplication::Translate('Response Message');
			$this->lblResponseMessage->Text = $this->objEmailMessage->ResponseMessage;
			return $this->lblResponseMessage;
		}



		/**
		 * Refresh this MetaControl with Data from the local EmailMessage object.
		 * @param boolean $blnReload reload EmailMessage from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objEmailMessage->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objEmailMessage->Id;

			if ($this->lstEmailMessageStatusType) $this->lstEmailMessageStatusType->SelectedValue = $this->objEmailMessage->EmailMessageStatusTypeId;
			if ($this->lblEmailMessageStatusTypeId) $this->lblEmailMessageStatusTypeId->Text = ($this->objEmailMessage->EmailMessageStatusTypeId) ? EmailMessageStatusType::$NameArray[$this->objEmailMessage->EmailMessageStatusTypeId] : null;

			if ($this->txtRawMessage) $this->txtRawMessage->Text = $this->objEmailMessage->RawMessage;
			if ($this->lblRawMessage) $this->lblRawMessage->Text = $this->objEmailMessage->RawMessage;

			if ($this->calDateReceived) $this->calDateReceived->DateTime = $this->objEmailMessage->DateReceived;
			if ($this->lblDateReceived) $this->lblDateReceived->Text = sprintf($this->objEmailMessage->DateReceived) ? $this->objEmailMessage->__toString($this->strDateReceivedDateTimeFormat) : null;

			if ($this->lstReceivedFromPerson) {
					$this->lstReceivedFromPerson->RemoveAllItems();
				$this->lstReceivedFromPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objReceivedFromPersonArray = Person::LoadAll();
				if ($objReceivedFromPersonArray) foreach ($objReceivedFromPersonArray as $objReceivedFromPerson) {
					$objListItem = new QListItem($objReceivedFromPerson->__toString(), $objReceivedFromPerson->Id);
					if (($this->objEmailMessage->ReceivedFromPerson) && ($this->objEmailMessage->ReceivedFromPerson->Id == $objReceivedFromPerson->Id))
						$objListItem->Selected = true;
					$this->lstReceivedFromPerson->AddItem($objListItem);
				}
			}
			if ($this->lblReceivedFromPersonId) $this->lblReceivedFromPersonId->Text = ($this->objEmailMessage->ReceivedFromPerson) ? $this->objEmailMessage->ReceivedFromPerson->__toString() : null;

			if ($this->lstReceivedFromEntry) {
					$this->lstReceivedFromEntry->RemoveAllItems();
				$this->lstReceivedFromEntry->AddItem(QApplication::Translate('- Select One -'), null);
				$objReceivedFromEntryArray = CommunicationListEntry::LoadAll();
				if ($objReceivedFromEntryArray) foreach ($objReceivedFromEntryArray as $objReceivedFromEntry) {
					$objListItem = new QListItem($objReceivedFromEntry->__toString(), $objReceivedFromEntry->Id);
					if (($this->objEmailMessage->ReceivedFromEntry) && ($this->objEmailMessage->ReceivedFromEntry->Id == $objReceivedFromEntry->Id))
						$objListItem->Selected = true;
					$this->lstReceivedFromEntry->AddItem($objListItem);
				}
			}
			if ($this->lblReceivedFromEntryId) $this->lblReceivedFromEntryId->Text = ($this->objEmailMessage->ReceivedFromEntry) ? $this->objEmailMessage->ReceivedFromEntry->__toString() : null;

			if ($this->lstGroup) {
					$this->lstGroup->RemoveAllItems();
				$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupArray = Group::LoadAll();
				if ($objGroupArray) foreach ($objGroupArray as $objGroup) {
					$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
					if (($this->objEmailMessage->Group) && ($this->objEmailMessage->Group->Id == $objGroup->Id))
						$objListItem->Selected = true;
					$this->lstGroup->AddItem($objListItem);
				}
			}
			if ($this->lblGroupId) $this->lblGroupId->Text = ($this->objEmailMessage->Group) ? $this->objEmailMessage->Group->__toString() : null;

			if ($this->lstCommunicationList) {
					$this->lstCommunicationList->RemoveAllItems();
				$this->lstCommunicationList->AddItem(QApplication::Translate('- Select One -'), null);
				$objCommunicationListArray = CommunicationList::LoadAll();
				if ($objCommunicationListArray) foreach ($objCommunicationListArray as $objCommunicationList) {
					$objListItem = new QListItem($objCommunicationList->__toString(), $objCommunicationList->Id);
					if (($this->objEmailMessage->CommunicationList) && ($this->objEmailMessage->CommunicationList->Id == $objCommunicationList->Id))
						$objListItem->Selected = true;
					$this->lstCommunicationList->AddItem($objListItem);
				}
			}
			if ($this->lblCommunicationListId) $this->lblCommunicationListId->Text = ($this->objEmailMessage->CommunicationList) ? $this->objEmailMessage->CommunicationList->__toString() : null;

			if ($this->txtSubject) $this->txtSubject->Text = $this->objEmailMessage->Subject;
			if ($this->lblSubject) $this->lblSubject->Text = $this->objEmailMessage->Subject;

			if ($this->txtResponseMessage) $this->txtResponseMessage->Text = $this->objEmailMessage->ResponseMessage;
			if ($this->lblResponseMessage) $this->lblResponseMessage->Text = $this->objEmailMessage->ResponseMessage;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC EMAILMESSAGE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's EmailMessage instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveEmailMessage() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstEmailMessageStatusType) $this->objEmailMessage->EmailMessageStatusTypeId = $this->lstEmailMessageStatusType->SelectedValue;
				if ($this->txtRawMessage) $this->objEmailMessage->RawMessage = $this->txtRawMessage->Text;
				if ($this->calDateReceived) $this->objEmailMessage->DateReceived = $this->calDateReceived->DateTime;
				if ($this->lstReceivedFromPerson) $this->objEmailMessage->ReceivedFromPersonId = $this->lstReceivedFromPerson->SelectedValue;
				if ($this->lstReceivedFromEntry) $this->objEmailMessage->ReceivedFromEntryId = $this->lstReceivedFromEntry->SelectedValue;
				if ($this->lstGroup) $this->objEmailMessage->GroupId = $this->lstGroup->SelectedValue;
				if ($this->lstCommunicationList) $this->objEmailMessage->CommunicationListId = $this->lstCommunicationList->SelectedValue;
				if ($this->txtSubject) $this->objEmailMessage->Subject = $this->txtSubject->Text;
				if ($this->txtResponseMessage) $this->objEmailMessage->ResponseMessage = $this->txtResponseMessage->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the EmailMessage object
				$this->objEmailMessage->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's EmailMessage instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteEmailMessage() {
			$this->objEmailMessage->Delete();
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
				case 'EmailMessage': return $this->objEmailMessage;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to EmailMessage fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'EmailMessageStatusTypeIdControl':
					if (!$this->lstEmailMessageStatusType) return $this->lstEmailMessageStatusType_Create();
					return $this->lstEmailMessageStatusType;
				case 'EmailMessageStatusTypeIdLabel':
					if (!$this->lblEmailMessageStatusTypeId) return $this->lblEmailMessageStatusTypeId_Create();
					return $this->lblEmailMessageStatusTypeId;
				case 'RawMessageControl':
					if (!$this->txtRawMessage) return $this->txtRawMessage_Create();
					return $this->txtRawMessage;
				case 'RawMessageLabel':
					if (!$this->lblRawMessage) return $this->lblRawMessage_Create();
					return $this->lblRawMessage;
				case 'DateReceivedControl':
					if (!$this->calDateReceived) return $this->calDateReceived_Create();
					return $this->calDateReceived;
				case 'DateReceivedLabel':
					if (!$this->lblDateReceived) return $this->lblDateReceived_Create();
					return $this->lblDateReceived;
				case 'ReceivedFromPersonIdControl':
					if (!$this->lstReceivedFromPerson) return $this->lstReceivedFromPerson_Create();
					return $this->lstReceivedFromPerson;
				case 'ReceivedFromPersonIdLabel':
					if (!$this->lblReceivedFromPersonId) return $this->lblReceivedFromPersonId_Create();
					return $this->lblReceivedFromPersonId;
				case 'ReceivedFromEntryIdControl':
					if (!$this->lstReceivedFromEntry) return $this->lstReceivedFromEntry_Create();
					return $this->lstReceivedFromEntry;
				case 'ReceivedFromEntryIdLabel':
					if (!$this->lblReceivedFromEntryId) return $this->lblReceivedFromEntryId_Create();
					return $this->lblReceivedFromEntryId;
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
				case 'SubjectControl':
					if (!$this->txtSubject) return $this->txtSubject_Create();
					return $this->txtSubject;
				case 'SubjectLabel':
					if (!$this->lblSubject) return $this->lblSubject_Create();
					return $this->lblSubject;
				case 'ResponseMessageControl':
					if (!$this->txtResponseMessage) return $this->txtResponseMessage_Create();
					return $this->txtResponseMessage;
				case 'ResponseMessageLabel':
					if (!$this->lblResponseMessage) return $this->lblResponseMessage_Create();
					return $this->lblResponseMessage;
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
					// Controls that point to EmailMessage fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'EmailMessageStatusTypeIdControl':
						return ($this->lstEmailMessageStatusType = QType::Cast($mixValue, 'QControl'));
					case 'RawMessageControl':
						return ($this->txtRawMessage = QType::Cast($mixValue, 'QControl'));
					case 'DateReceivedControl':
						return ($this->calDateReceived = QType::Cast($mixValue, 'QControl'));
					case 'ReceivedFromPersonIdControl':
						return ($this->lstReceivedFromPerson = QType::Cast($mixValue, 'QControl'));
					case 'ReceivedFromEntryIdControl':
						return ($this->lstReceivedFromEntry = QType::Cast($mixValue, 'QControl'));
					case 'GroupIdControl':
						return ($this->lstGroup = QType::Cast($mixValue, 'QControl'));
					case 'CommunicationListIdControl':
						return ($this->lstCommunicationList = QType::Cast($mixValue, 'QControl'));
					case 'SubjectControl':
						return ($this->txtSubject = QType::Cast($mixValue, 'QControl'));
					case 'ResponseMessageControl':
						return ($this->txtResponseMessage = QType::Cast($mixValue, 'QControl'));
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