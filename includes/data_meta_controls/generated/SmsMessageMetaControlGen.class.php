<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the SmsMessage class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single SmsMessage object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SmsMessageMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read SmsMessage $SmsMessage the actual SmsMessage data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $GroupIdControl
	 * property-read QLabel $GroupIdLabel
	 * property QListBox $LoginIdControl
	 * property-read QLabel $LoginIdLabel
	 * property QTextBox $SubjectControl
	 * property-read QLabel $SubjectLabel
	 * property QTextBox $BodyControl
	 * property-read QLabel $BodyLabel
	 * property QDateTimePicker $DateQueuedControl
	 * property-read QLabel $DateQueuedLabel
	 * property QDateTimePicker $DateSentControl
	 * property-read QLabel $DateSentLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class SmsMessageMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var SmsMessage objSmsMessage
		 * @access protected
		 */
		protected $objSmsMessage;

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

		// Controls that allow the editing of SmsMessage's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstGroup;
         * @access protected
         */
		protected $lstGroup;

        /**
         * @var QListBox lstLogin;
         * @access protected
         */
		protected $lstLogin;

        /**
         * @var QTextBox txtSubject;
         * @access protected
         */
		protected $txtSubject;

        /**
         * @var QTextBox txtBody;
         * @access protected
         */
		protected $txtBody;

        /**
         * @var QDateTimePicker calDateQueued;
         * @access protected
         */
		protected $calDateQueued;

        /**
         * @var QDateTimePicker calDateSent;
         * @access protected
         */
		protected $calDateSent;


		// Controls that allow the viewing of SmsMessage's individual data fields
        /**
         * @var QLabel lblGroupId
         * @access protected
         */
		protected $lblGroupId;

        /**
         * @var QLabel lblLoginId
         * @access protected
         */
		protected $lblLoginId;

        /**
         * @var QLabel lblSubject
         * @access protected
         */
		protected $lblSubject;

        /**
         * @var QLabel lblBody
         * @access protected
         */
		protected $lblBody;

        /**
         * @var QLabel lblDateQueued
         * @access protected
         */
		protected $lblDateQueued;

        /**
         * @var QLabel lblDateSent
         * @access protected
         */
		protected $lblDateSent;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * SmsMessageMetaControl to edit a single SmsMessage object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single SmsMessage object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SmsMessageMetaControl
		 * @param SmsMessage $objSmsMessage new or existing SmsMessage object
		 */
		 public function __construct($objParentObject, SmsMessage $objSmsMessage) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this SmsMessageMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked SmsMessage object
			$this->objSmsMessage = $objSmsMessage;

			// Figure out if we're Editing or Creating New
			if ($this->objSmsMessage->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this SmsMessageMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing SmsMessage object creation - defaults to CreateOrEdit
 		 * @return SmsMessageMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objSmsMessage = SmsMessage::Load($intId);

				// SmsMessage was found -- return it!
				if ($objSmsMessage)
					return new SmsMessageMetaControl($objParentObject, $objSmsMessage);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a SmsMessage object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new SmsMessageMetaControl($objParentObject, new SmsMessage());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SmsMessageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SmsMessage object creation - defaults to CreateOrEdit
		 * @return SmsMessageMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return SmsMessageMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SmsMessageMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SmsMessage object creation - defaults to CreateOrEdit
		 * @return SmsMessageMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return SmsMessageMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objSmsMessage->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
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
			$this->lstGroup->Required = true;
			if (!$this->blnEditMode)
				$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGroupCursor = Group::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGroup = Group::InstantiateCursor($objGroupCursor)) {
				$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
				if (($this->objSmsMessage->Group) && ($this->objSmsMessage->Group->Id == $objGroup->Id))
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
			$this->lblGroupId->Text = ($this->objSmsMessage->Group) ? $this->objSmsMessage->Group->__toString() : null;
			$this->lblGroupId->Required = true;
			return $this->lblGroupId;
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
			$this->lstLogin->Required = true;
			if (!$this->blnEditMode)
				$this->lstLogin->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objLoginCursor = Login::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objLogin = Login::InstantiateCursor($objLoginCursor)) {
				$objListItem = new QListItem($objLogin->__toString(), $objLogin->Id);
				if (($this->objSmsMessage->Login) && ($this->objSmsMessage->Login->Id == $objLogin->Id))
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
			$this->lblLoginId->Text = ($this->objSmsMessage->Login) ? $this->objSmsMessage->Login->__toString() : null;
			$this->lblLoginId->Required = true;
			return $this->lblLoginId;
		}

		/**
		 * Create and setup QTextBox txtSubject
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSubject_Create($strControlId = null) {
			$this->txtSubject = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSubject->Name = QApplication::Translate('Subject');
			$this->txtSubject->Text = $this->objSmsMessage->Subject;
			$this->txtSubject->MaxLength = SmsMessage::SubjectMaxLength;
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
			$this->lblSubject->Text = $this->objSmsMessage->Subject;
			return $this->lblSubject;
		}

		/**
		 * Create and setup QTextBox txtBody
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtBody_Create($strControlId = null) {
			$this->txtBody = new QTextBox($this->objParentObject, $strControlId);
			$this->txtBody->Name = QApplication::Translate('Body');
			$this->txtBody->Text = $this->objSmsMessage->Body;
			$this->txtBody->MaxLength = SmsMessage::BodyMaxLength;
			return $this->txtBody;
		}

		/**
		 * Create and setup QLabel lblBody
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblBody_Create($strControlId = null) {
			$this->lblBody = new QLabel($this->objParentObject, $strControlId);
			$this->lblBody->Name = QApplication::Translate('Body');
			$this->lblBody->Text = $this->objSmsMessage->Body;
			return $this->lblBody;
		}

		/**
		 * Create and setup QDateTimePicker calDateQueued
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateQueued_Create($strControlId = null) {
			$this->calDateQueued = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateQueued->Name = QApplication::Translate('Date Queued');
			$this->calDateQueued->DateTime = $this->objSmsMessage->DateQueued;
			$this->calDateQueued->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calDateQueued->Required = true;
			return $this->calDateQueued;
		}

		/**
		 * Create and setup QLabel lblDateQueued
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateQueued_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateQueued = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateQueued->Name = QApplication::Translate('Date Queued');
			$this->strDateQueuedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateQueued->Text = sprintf($this->objSmsMessage->DateQueued) ? $this->objSmsMessage->DateQueued->__toString($this->strDateQueuedDateTimeFormat) : null;
			$this->lblDateQueued->Required = true;
			return $this->lblDateQueued;
		}

		protected $strDateQueuedDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateSent
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateSent_Create($strControlId = null) {
			$this->calDateSent = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateSent->Name = QApplication::Translate('Date Sent');
			$this->calDateSent->DateTime = $this->objSmsMessage->DateSent;
			$this->calDateSent->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateSent;
		}

		/**
		 * Create and setup QLabel lblDateSent
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateSent_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateSent = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateSent->Name = QApplication::Translate('Date Sent');
			$this->strDateSentDateTimeFormat = $strDateTimeFormat;
			$this->lblDateSent->Text = sprintf($this->objSmsMessage->DateSent) ? $this->objSmsMessage->DateSent->__toString($this->strDateSentDateTimeFormat) : null;
			return $this->lblDateSent;
		}

		protected $strDateSentDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local SmsMessage object.
		 * @param boolean $blnReload reload SmsMessage from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objSmsMessage->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objSmsMessage->Id;

			if ($this->lstGroup) {
					$this->lstGroup->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupArray = Group::LoadAll();
				if ($objGroupArray) foreach ($objGroupArray as $objGroup) {
					$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
					if (($this->objSmsMessage->Group) && ($this->objSmsMessage->Group->Id == $objGroup->Id))
						$objListItem->Selected = true;
					$this->lstGroup->AddItem($objListItem);
				}
			}
			if ($this->lblGroupId) $this->lblGroupId->Text = ($this->objSmsMessage->Group) ? $this->objSmsMessage->Group->__toString() : null;

			if ($this->lstLogin) {
					$this->lstLogin->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstLogin->AddItem(QApplication::Translate('- Select One -'), null);
				$objLoginArray = Login::LoadAll();
				if ($objLoginArray) foreach ($objLoginArray as $objLogin) {
					$objListItem = new QListItem($objLogin->__toString(), $objLogin->Id);
					if (($this->objSmsMessage->Login) && ($this->objSmsMessage->Login->Id == $objLogin->Id))
						$objListItem->Selected = true;
					$this->lstLogin->AddItem($objListItem);
				}
			}
			if ($this->lblLoginId) $this->lblLoginId->Text = ($this->objSmsMessage->Login) ? $this->objSmsMessage->Login->__toString() : null;

			if ($this->txtSubject) $this->txtSubject->Text = $this->objSmsMessage->Subject;
			if ($this->lblSubject) $this->lblSubject->Text = $this->objSmsMessage->Subject;

			if ($this->txtBody) $this->txtBody->Text = $this->objSmsMessage->Body;
			if ($this->lblBody) $this->lblBody->Text = $this->objSmsMessage->Body;

			if ($this->calDateQueued) $this->calDateQueued->DateTime = $this->objSmsMessage->DateQueued;
			if ($this->lblDateQueued) $this->lblDateQueued->Text = sprintf($this->objSmsMessage->DateQueued) ? $this->objSmsMessage->__toString($this->strDateQueuedDateTimeFormat) : null;

			if ($this->calDateSent) $this->calDateSent->DateTime = $this->objSmsMessage->DateSent;
			if ($this->lblDateSent) $this->lblDateSent->Text = sprintf($this->objSmsMessage->DateSent) ? $this->objSmsMessage->__toString($this->strDateSentDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SMSMESSAGE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's SmsMessage instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveSmsMessage() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstGroup) $this->objSmsMessage->GroupId = $this->lstGroup->SelectedValue;
				if ($this->lstLogin) $this->objSmsMessage->LoginId = $this->lstLogin->SelectedValue;
				if ($this->txtSubject) $this->objSmsMessage->Subject = $this->txtSubject->Text;
				if ($this->txtBody) $this->objSmsMessage->Body = $this->txtBody->Text;
				if ($this->calDateQueued) $this->objSmsMessage->DateQueued = $this->calDateQueued->DateTime;
				if ($this->calDateSent) $this->objSmsMessage->DateSent = $this->calDateSent->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the SmsMessage object
				$this->objSmsMessage->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's SmsMessage instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteSmsMessage() {
			$this->objSmsMessage->Delete();
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
				case 'SmsMessage': return $this->objSmsMessage;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to SmsMessage fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'GroupIdControl':
					if (!$this->lstGroup) return $this->lstGroup_Create();
					return $this->lstGroup;
				case 'GroupIdLabel':
					if (!$this->lblGroupId) return $this->lblGroupId_Create();
					return $this->lblGroupId;
				case 'LoginIdControl':
					if (!$this->lstLogin) return $this->lstLogin_Create();
					return $this->lstLogin;
				case 'LoginIdLabel':
					if (!$this->lblLoginId) return $this->lblLoginId_Create();
					return $this->lblLoginId;
				case 'SubjectControl':
					if (!$this->txtSubject) return $this->txtSubject_Create();
					return $this->txtSubject;
				case 'SubjectLabel':
					if (!$this->lblSubject) return $this->lblSubject_Create();
					return $this->lblSubject;
				case 'BodyControl':
					if (!$this->txtBody) return $this->txtBody_Create();
					return $this->txtBody;
				case 'BodyLabel':
					if (!$this->lblBody) return $this->lblBody_Create();
					return $this->lblBody;
				case 'DateQueuedControl':
					if (!$this->calDateQueued) return $this->calDateQueued_Create();
					return $this->calDateQueued;
				case 'DateQueuedLabel':
					if (!$this->lblDateQueued) return $this->lblDateQueued_Create();
					return $this->lblDateQueued;
				case 'DateSentControl':
					if (!$this->calDateSent) return $this->calDateSent_Create();
					return $this->calDateSent;
				case 'DateSentLabel':
					if (!$this->lblDateSent) return $this->lblDateSent_Create();
					return $this->lblDateSent;
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
					// Controls that point to SmsMessage fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'GroupIdControl':
						return ($this->lstGroup = QType::Cast($mixValue, 'QControl'));
					case 'LoginIdControl':
						return ($this->lstLogin = QType::Cast($mixValue, 'QControl'));
					case 'SubjectControl':
						return ($this->txtSubject = QType::Cast($mixValue, 'QControl'));
					case 'BodyControl':
						return ($this->txtBody = QType::Cast($mixValue, 'QControl'));
					case 'DateQueuedControl':
						return ($this->calDateQueued = QType::Cast($mixValue, 'QControl'));
					case 'DateSentControl':
						return ($this->calDateSent = QType::Cast($mixValue, 'QControl'));
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