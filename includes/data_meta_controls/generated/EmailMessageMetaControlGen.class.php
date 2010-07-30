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
	 * property QDateTimePicker $DateReceivedControl
	 * property-read QLabel $DateReceivedLabel
	 * property QTextBox $RawMessageControl
	 * property-read QLabel $RawMessageLabel
	 * property QTextBox $MessageIdentifierControl
	 * property-read QLabel $MessageIdentifierLabel
	 * property QTextBox $SubjectControl
	 * property-read QLabel $SubjectLabel
	 * property QTextBox $FromAddressControl
	 * property-read QLabel $FromAddressLabel
	 * property QTextBox $ResponseHeaderControl
	 * property-read QLabel $ResponseHeaderLabel
	 * property QTextBox $ResponseBodyControl
	 * property-read QLabel $ResponseBodyLabel
	 * property QTextBox $ErrorMessageControl
	 * property-read QLabel $ErrorMessageLabel
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
		protected $calDateReceived;
		protected $txtRawMessage;
		protected $txtMessageIdentifier;
		protected $txtSubject;
		protected $txtFromAddress;
		protected $txtResponseHeader;
		protected $txtResponseBody;
		protected $txtErrorMessage;

		// Controls that allow the viewing of EmailMessage's individual data fields
		protected $lblEmailMessageStatusTypeId;
		protected $lblDateReceived;
		protected $lblRawMessage;
		protected $lblMessageIdentifier;
		protected $lblSubject;
		protected $lblFromAddress;
		protected $lblResponseHeader;
		protected $lblResponseBody;
		protected $lblErrorMessage;

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
		 * Create and setup QTextBox txtRawMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtRawMessage_Create($strControlId = null) {
			$this->txtRawMessage = new QTextBox($this->objParentObject, $strControlId);
			$this->txtRawMessage->Name = QApplication::Translate('Raw Message');
			$this->txtRawMessage->Text = $this->objEmailMessage->RawMessage;
			$this->txtRawMessage->Required = true;
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
			$this->lblRawMessage->Required = true;
			return $this->lblRawMessage;
		}

		/**
		 * Create and setup QTextBox txtMessageIdentifier
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMessageIdentifier_Create($strControlId = null) {
			$this->txtMessageIdentifier = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMessageIdentifier->Name = QApplication::Translate('Message Identifier');
			$this->txtMessageIdentifier->Text = $this->objEmailMessage->MessageIdentifier;
			$this->txtMessageIdentifier->MaxLength = EmailMessage::MessageIdentifierMaxLength;
			return $this->txtMessageIdentifier;
		}

		/**
		 * Create and setup QLabel lblMessageIdentifier
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMessageIdentifier_Create($strControlId = null) {
			$this->lblMessageIdentifier = new QLabel($this->objParentObject, $strControlId);
			$this->lblMessageIdentifier->Name = QApplication::Translate('Message Identifier');
			$this->lblMessageIdentifier->Text = $this->objEmailMessage->MessageIdentifier;
			return $this->lblMessageIdentifier;
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
		 * Create and setup QTextBox txtFromAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFromAddress_Create($strControlId = null) {
			$this->txtFromAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFromAddress->Name = QApplication::Translate('From Address');
			$this->txtFromAddress->Text = $this->objEmailMessage->FromAddress;
			$this->txtFromAddress->MaxLength = EmailMessage::FromAddressMaxLength;
			return $this->txtFromAddress;
		}

		/**
		 * Create and setup QLabel lblFromAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFromAddress_Create($strControlId = null) {
			$this->lblFromAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblFromAddress->Name = QApplication::Translate('From Address');
			$this->lblFromAddress->Text = $this->objEmailMessage->FromAddress;
			return $this->lblFromAddress;
		}

		/**
		 * Create and setup QTextBox txtResponseHeader
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtResponseHeader_Create($strControlId = null) {
			$this->txtResponseHeader = new QTextBox($this->objParentObject, $strControlId);
			$this->txtResponseHeader->Name = QApplication::Translate('Response Header');
			$this->txtResponseHeader->Text = $this->objEmailMessage->ResponseHeader;
			$this->txtResponseHeader->TextMode = QTextMode::MultiLine;
			return $this->txtResponseHeader;
		}

		/**
		 * Create and setup QLabel lblResponseHeader
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblResponseHeader_Create($strControlId = null) {
			$this->lblResponseHeader = new QLabel($this->objParentObject, $strControlId);
			$this->lblResponseHeader->Name = QApplication::Translate('Response Header');
			$this->lblResponseHeader->Text = $this->objEmailMessage->ResponseHeader;
			return $this->lblResponseHeader;
		}

		/**
		 * Create and setup QTextBox txtResponseBody
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtResponseBody_Create($strControlId = null) {
			$this->txtResponseBody = new QTextBox($this->objParentObject, $strControlId);
			$this->txtResponseBody->Name = QApplication::Translate('Response Body');
			$this->txtResponseBody->Text = $this->objEmailMessage->ResponseBody;
			$this->txtResponseBody->TextMode = QTextMode::MultiLine;
			return $this->txtResponseBody;
		}

		/**
		 * Create and setup QLabel lblResponseBody
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblResponseBody_Create($strControlId = null) {
			$this->lblResponseBody = new QLabel($this->objParentObject, $strControlId);
			$this->lblResponseBody->Name = QApplication::Translate('Response Body');
			$this->lblResponseBody->Text = $this->objEmailMessage->ResponseBody;
			return $this->lblResponseBody;
		}

		/**
		 * Create and setup QTextBox txtErrorMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtErrorMessage_Create($strControlId = null) {
			$this->txtErrorMessage = new QTextBox($this->objParentObject, $strControlId);
			$this->txtErrorMessage->Name = QApplication::Translate('Error Message');
			$this->txtErrorMessage->Text = $this->objEmailMessage->ErrorMessage;
			$this->txtErrorMessage->TextMode = QTextMode::MultiLine;
			return $this->txtErrorMessage;
		}

		/**
		 * Create and setup QLabel lblErrorMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblErrorMessage_Create($strControlId = null) {
			$this->lblErrorMessage = new QLabel($this->objParentObject, $strControlId);
			$this->lblErrorMessage->Name = QApplication::Translate('Error Message');
			$this->lblErrorMessage->Text = $this->objEmailMessage->ErrorMessage;
			return $this->lblErrorMessage;
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

			if ($this->calDateReceived) $this->calDateReceived->DateTime = $this->objEmailMessage->DateReceived;
			if ($this->lblDateReceived) $this->lblDateReceived->Text = sprintf($this->objEmailMessage->DateReceived) ? $this->objEmailMessage->__toString($this->strDateReceivedDateTimeFormat) : null;

			if ($this->txtRawMessage) $this->txtRawMessage->Text = $this->objEmailMessage->RawMessage;
			if ($this->lblRawMessage) $this->lblRawMessage->Text = $this->objEmailMessage->RawMessage;

			if ($this->txtMessageIdentifier) $this->txtMessageIdentifier->Text = $this->objEmailMessage->MessageIdentifier;
			if ($this->lblMessageIdentifier) $this->lblMessageIdentifier->Text = $this->objEmailMessage->MessageIdentifier;

			if ($this->txtSubject) $this->txtSubject->Text = $this->objEmailMessage->Subject;
			if ($this->lblSubject) $this->lblSubject->Text = $this->objEmailMessage->Subject;

			if ($this->txtFromAddress) $this->txtFromAddress->Text = $this->objEmailMessage->FromAddress;
			if ($this->lblFromAddress) $this->lblFromAddress->Text = $this->objEmailMessage->FromAddress;

			if ($this->txtResponseHeader) $this->txtResponseHeader->Text = $this->objEmailMessage->ResponseHeader;
			if ($this->lblResponseHeader) $this->lblResponseHeader->Text = $this->objEmailMessage->ResponseHeader;

			if ($this->txtResponseBody) $this->txtResponseBody->Text = $this->objEmailMessage->ResponseBody;
			if ($this->lblResponseBody) $this->lblResponseBody->Text = $this->objEmailMessage->ResponseBody;

			if ($this->txtErrorMessage) $this->txtErrorMessage->Text = $this->objEmailMessage->ErrorMessage;
			if ($this->lblErrorMessage) $this->lblErrorMessage->Text = $this->objEmailMessage->ErrorMessage;

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
				if ($this->calDateReceived) $this->objEmailMessage->DateReceived = $this->calDateReceived->DateTime;
				if ($this->txtRawMessage) $this->objEmailMessage->RawMessage = $this->txtRawMessage->Text;
				if ($this->txtMessageIdentifier) $this->objEmailMessage->MessageIdentifier = $this->txtMessageIdentifier->Text;
				if ($this->txtSubject) $this->objEmailMessage->Subject = $this->txtSubject->Text;
				if ($this->txtFromAddress) $this->objEmailMessage->FromAddress = $this->txtFromAddress->Text;
				if ($this->txtResponseHeader) $this->objEmailMessage->ResponseHeader = $this->txtResponseHeader->Text;
				if ($this->txtResponseBody) $this->objEmailMessage->ResponseBody = $this->txtResponseBody->Text;
				if ($this->txtErrorMessage) $this->objEmailMessage->ErrorMessage = $this->txtErrorMessage->Text;

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
				case 'DateReceivedControl':
					if (!$this->calDateReceived) return $this->calDateReceived_Create();
					return $this->calDateReceived;
				case 'DateReceivedLabel':
					if (!$this->lblDateReceived) return $this->lblDateReceived_Create();
					return $this->lblDateReceived;
				case 'RawMessageControl':
					if (!$this->txtRawMessage) return $this->txtRawMessage_Create();
					return $this->txtRawMessage;
				case 'RawMessageLabel':
					if (!$this->lblRawMessage) return $this->lblRawMessage_Create();
					return $this->lblRawMessage;
				case 'MessageIdentifierControl':
					if (!$this->txtMessageIdentifier) return $this->txtMessageIdentifier_Create();
					return $this->txtMessageIdentifier;
				case 'MessageIdentifierLabel':
					if (!$this->lblMessageIdentifier) return $this->lblMessageIdentifier_Create();
					return $this->lblMessageIdentifier;
				case 'SubjectControl':
					if (!$this->txtSubject) return $this->txtSubject_Create();
					return $this->txtSubject;
				case 'SubjectLabel':
					if (!$this->lblSubject) return $this->lblSubject_Create();
					return $this->lblSubject;
				case 'FromAddressControl':
					if (!$this->txtFromAddress) return $this->txtFromAddress_Create();
					return $this->txtFromAddress;
				case 'FromAddressLabel':
					if (!$this->lblFromAddress) return $this->lblFromAddress_Create();
					return $this->lblFromAddress;
				case 'ResponseHeaderControl':
					if (!$this->txtResponseHeader) return $this->txtResponseHeader_Create();
					return $this->txtResponseHeader;
				case 'ResponseHeaderLabel':
					if (!$this->lblResponseHeader) return $this->lblResponseHeader_Create();
					return $this->lblResponseHeader;
				case 'ResponseBodyControl':
					if (!$this->txtResponseBody) return $this->txtResponseBody_Create();
					return $this->txtResponseBody;
				case 'ResponseBodyLabel':
					if (!$this->lblResponseBody) return $this->lblResponseBody_Create();
					return $this->lblResponseBody;
				case 'ErrorMessageControl':
					if (!$this->txtErrorMessage) return $this->txtErrorMessage_Create();
					return $this->txtErrorMessage;
				case 'ErrorMessageLabel':
					if (!$this->lblErrorMessage) return $this->lblErrorMessage_Create();
					return $this->lblErrorMessage;
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
					case 'DateReceivedControl':
						return ($this->calDateReceived = QType::Cast($mixValue, 'QControl'));
					case 'RawMessageControl':
						return ($this->txtRawMessage = QType::Cast($mixValue, 'QControl'));
					case 'MessageIdentifierControl':
						return ($this->txtMessageIdentifier = QType::Cast($mixValue, 'QControl'));
					case 'SubjectControl':
						return ($this->txtSubject = QType::Cast($mixValue, 'QControl'));
					case 'FromAddressControl':
						return ($this->txtFromAddress = QType::Cast($mixValue, 'QControl'));
					case 'ResponseHeaderControl':
						return ($this->txtResponseHeader = QType::Cast($mixValue, 'QControl'));
					case 'ResponseBodyControl':
						return ($this->txtResponseBody = QType::Cast($mixValue, 'QControl'));
					case 'ErrorMessageControl':
						return ($this->txtErrorMessage = QType::Cast($mixValue, 'QControl'));
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