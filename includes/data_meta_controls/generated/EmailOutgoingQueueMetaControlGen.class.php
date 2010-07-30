<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the EmailOutgoingQueue class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single EmailOutgoingQueue object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a EmailOutgoingQueueMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read EmailOutgoingQueue $EmailOutgoingQueue the actual EmailOutgoingQueue data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $EmailMessageIdControl
	 * property-read QLabel $EmailMessageIdLabel
	 * property QTextBox $SendToEmailAddressControl
	 * property-read QLabel $SendToEmailAddressLabel
	 * property QTextBox $TokenControl
	 * property-read QLabel $TokenLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class EmailOutgoingQueueMetaControlGen extends QBaseClass {
		// General Variables
		protected $objEmailOutgoingQueue;
		protected $objParentObject;
		protected $strTitleVerb;
		protected $blnEditMode;

		// Controls that allow the editing of EmailOutgoingQueue's individual data fields
		protected $lblId;
		protected $lstEmailMessage;
		protected $txtSendToEmailAddress;
		protected $txtToken;

		// Controls that allow the viewing of EmailOutgoingQueue's individual data fields
		protected $lblEmailMessageId;
		protected $lblSendToEmailAddress;
		protected $lblToken;

		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * EmailOutgoingQueueMetaControl to edit a single EmailOutgoingQueue object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single EmailOutgoingQueue object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailOutgoingQueueMetaControl
		 * @param EmailOutgoingQueue $objEmailOutgoingQueue new or existing EmailOutgoingQueue object
		 */
		 public function __construct($objParentObject, EmailOutgoingQueue $objEmailOutgoingQueue) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this EmailOutgoingQueueMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked EmailOutgoingQueue object
			$this->objEmailOutgoingQueue = $objEmailOutgoingQueue;

			// Figure out if we're Editing or Creating New
			if ($this->objEmailOutgoingQueue->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailOutgoingQueueMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing EmailOutgoingQueue object creation - defaults to CreateOrEdit
 		 * @return EmailOutgoingQueueMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objEmailOutgoingQueue = EmailOutgoingQueue::Load($intId);

				// EmailOutgoingQueue was found -- return it!
				if ($objEmailOutgoingQueue)
					return new EmailOutgoingQueueMetaControl($objParentObject, $objEmailOutgoingQueue);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a EmailOutgoingQueue object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new EmailOutgoingQueueMetaControl($objParentObject, new EmailOutgoingQueue());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailOutgoingQueueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EmailOutgoingQueue object creation - defaults to CreateOrEdit
		 * @return EmailOutgoingQueueMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return EmailOutgoingQueueMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this EmailOutgoingQueueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing EmailOutgoingQueue object creation - defaults to CreateOrEdit
		 * @return EmailOutgoingQueueMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return EmailOutgoingQueueMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objEmailOutgoingQueue->Id;
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
				if (($this->objEmailOutgoingQueue->EmailMessage) && ($this->objEmailOutgoingQueue->EmailMessage->Id == $objEmailMessage->Id))
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
			$this->lblEmailMessageId->Text = ($this->objEmailOutgoingQueue->EmailMessage) ? $this->objEmailOutgoingQueue->EmailMessage->__toString() : null;
			$this->lblEmailMessageId->Required = true;
			return $this->lblEmailMessageId;
		}

		/**
		 * Create and setup QTextBox txtSendToEmailAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSendToEmailAddress_Create($strControlId = null) {
			$this->txtSendToEmailAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSendToEmailAddress->Name = QApplication::Translate('Send To Email Address');
			$this->txtSendToEmailAddress->Text = $this->objEmailOutgoingQueue->SendToEmailAddress;
			$this->txtSendToEmailAddress->MaxLength = EmailOutgoingQueue::SendToEmailAddressMaxLength;
			return $this->txtSendToEmailAddress;
		}

		/**
		 * Create and setup QLabel lblSendToEmailAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSendToEmailAddress_Create($strControlId = null) {
			$this->lblSendToEmailAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblSendToEmailAddress->Name = QApplication::Translate('Send To Email Address');
			$this->lblSendToEmailAddress->Text = $this->objEmailOutgoingQueue->SendToEmailAddress;
			return $this->lblSendToEmailAddress;
		}

		/**
		 * Create and setup QTextBox txtToken
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToken_Create($strControlId = null) {
			$this->txtToken = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToken->Name = QApplication::Translate('Token');
			$this->txtToken->Text = $this->objEmailOutgoingQueue->Token;
			$this->txtToken->MaxLength = EmailOutgoingQueue::TokenMaxLength;
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
			$this->lblToken->Text = $this->objEmailOutgoingQueue->Token;
			return $this->lblToken;
		}



		/**
		 * Refresh this MetaControl with Data from the local EmailOutgoingQueue object.
		 * @param boolean $blnReload reload EmailOutgoingQueue from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objEmailOutgoingQueue->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objEmailOutgoingQueue->Id;

			if ($this->lstEmailMessage) {
					$this->lstEmailMessage->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstEmailMessage->AddItem(QApplication::Translate('- Select One -'), null);
				$objEmailMessageArray = EmailMessage::LoadAll();
				if ($objEmailMessageArray) foreach ($objEmailMessageArray as $objEmailMessage) {
					$objListItem = new QListItem($objEmailMessage->__toString(), $objEmailMessage->Id);
					if (($this->objEmailOutgoingQueue->EmailMessage) && ($this->objEmailOutgoingQueue->EmailMessage->Id == $objEmailMessage->Id))
						$objListItem->Selected = true;
					$this->lstEmailMessage->AddItem($objListItem);
				}
			}
			if ($this->lblEmailMessageId) $this->lblEmailMessageId->Text = ($this->objEmailOutgoingQueue->EmailMessage) ? $this->objEmailOutgoingQueue->EmailMessage->__toString() : null;

			if ($this->txtSendToEmailAddress) $this->txtSendToEmailAddress->Text = $this->objEmailOutgoingQueue->SendToEmailAddress;
			if ($this->lblSendToEmailAddress) $this->lblSendToEmailAddress->Text = $this->objEmailOutgoingQueue->SendToEmailAddress;

			if ($this->txtToken) $this->txtToken->Text = $this->objEmailOutgoingQueue->Token;
			if ($this->lblToken) $this->lblToken->Text = $this->objEmailOutgoingQueue->Token;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC EMAILOUTGOINGQUEUE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's EmailOutgoingQueue instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveEmailOutgoingQueue() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstEmailMessage) $this->objEmailOutgoingQueue->EmailMessageId = $this->lstEmailMessage->SelectedValue;
				if ($this->txtSendToEmailAddress) $this->objEmailOutgoingQueue->SendToEmailAddress = $this->txtSendToEmailAddress->Text;
				if ($this->txtToken) $this->objEmailOutgoingQueue->Token = $this->txtToken->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the EmailOutgoingQueue object
				$this->objEmailOutgoingQueue->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's EmailOutgoingQueue instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteEmailOutgoingQueue() {
			$this->objEmailOutgoingQueue->Delete();
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
				case 'EmailOutgoingQueue': return $this->objEmailOutgoingQueue;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to EmailOutgoingQueue fields -- will be created dynamically if not yet created
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
				case 'SendToEmailAddressControl':
					if (!$this->txtSendToEmailAddress) return $this->txtSendToEmailAddress_Create();
					return $this->txtSendToEmailAddress;
				case 'SendToEmailAddressLabel':
					if (!$this->lblSendToEmailAddress) return $this->lblSendToEmailAddress_Create();
					return $this->lblSendToEmailAddress;
				case 'TokenControl':
					if (!$this->txtToken) return $this->txtToken_Create();
					return $this->txtToken;
				case 'TokenLabel':
					if (!$this->lblToken) return $this->lblToken_Create();
					return $this->lblToken;
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
					// Controls that point to EmailOutgoingQueue fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'EmailMessageIdControl':
						return ($this->lstEmailMessage = QType::Cast($mixValue, 'QControl'));
					case 'SendToEmailAddressControl':
						return ($this->txtSendToEmailAddress = QType::Cast($mixValue, 'QControl'));
					case 'TokenControl':
						return ($this->txtToken = QType::Cast($mixValue, 'QControl'));
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