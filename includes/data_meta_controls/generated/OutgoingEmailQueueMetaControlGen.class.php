<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the OutgoingEmailQueue class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single OutgoingEmailQueue object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a OutgoingEmailQueueMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read OutgoingEmailQueue $OutgoingEmailQueue the actual OutgoingEmailQueue data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $ToAddressControl
	 * property-read QLabel $ToAddressLabel
	 * property QTextBox $FromAddressControl
	 * property-read QLabel $FromAddressLabel
	 * property QTextBox $CcAddressControl
	 * property-read QLabel $CcAddressLabel
	 * property QTextBox $BccAddressControl
	 * property-read QLabel $BccAddressLabel
	 * property QTextBox $SubjectControl
	 * property-read QLabel $SubjectLabel
	 * property QTextBox $BodyControl
	 * property-read QLabel $BodyLabel
	 * property QDateTimePicker $DateQueuedControl
	 * property-read QLabel $DateQueuedLabel
	 * property QCheckBox $ErrorFlagControl
	 * property-read QLabel $ErrorFlagLabel
	 * property QTextBox $ErrorMessageControl
	 * property-read QLabel $ErrorMessageLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class OutgoingEmailQueueMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var OutgoingEmailQueue objOutgoingEmailQueue
		 * @access protected
		 */
		protected $objOutgoingEmailQueue;

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

		// Controls that allow the editing of OutgoingEmailQueue's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtToAddress;
         * @access protected
         */
		protected $txtToAddress;

        /**
         * @var QTextBox txtFromAddress;
         * @access protected
         */
		protected $txtFromAddress;

        /**
         * @var QTextBox txtCcAddress;
         * @access protected
         */
		protected $txtCcAddress;

        /**
         * @var QTextBox txtBccAddress;
         * @access protected
         */
		protected $txtBccAddress;

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
         * @var QCheckBox chkErrorFlag;
         * @access protected
         */
		protected $chkErrorFlag;

        /**
         * @var QTextBox txtErrorMessage;
         * @access protected
         */
		protected $txtErrorMessage;


		// Controls that allow the viewing of OutgoingEmailQueue's individual data fields
        /**
         * @var QLabel lblToAddress
         * @access protected
         */
		protected $lblToAddress;

        /**
         * @var QLabel lblFromAddress
         * @access protected
         */
		protected $lblFromAddress;

        /**
         * @var QLabel lblCcAddress
         * @access protected
         */
		protected $lblCcAddress;

        /**
         * @var QLabel lblBccAddress
         * @access protected
         */
		protected $lblBccAddress;

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
         * @var QLabel lblErrorFlag
         * @access protected
         */
		protected $lblErrorFlag;

        /**
         * @var QLabel lblErrorMessage
         * @access protected
         */
		protected $lblErrorMessage;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * OutgoingEmailQueueMetaControl to edit a single OutgoingEmailQueue object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single OutgoingEmailQueue object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OutgoingEmailQueueMetaControl
		 * @param OutgoingEmailQueue $objOutgoingEmailQueue new or existing OutgoingEmailQueue object
		 */
		 public function __construct($objParentObject, OutgoingEmailQueue $objOutgoingEmailQueue) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this OutgoingEmailQueueMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked OutgoingEmailQueue object
			$this->objOutgoingEmailQueue = $objOutgoingEmailQueue;

			// Figure out if we're Editing or Creating New
			if ($this->objOutgoingEmailQueue->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this OutgoingEmailQueueMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing OutgoingEmailQueue object creation - defaults to CreateOrEdit
 		 * @return OutgoingEmailQueueMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objOutgoingEmailQueue = OutgoingEmailQueue::Load($intId);

				// OutgoingEmailQueue was found -- return it!
				if ($objOutgoingEmailQueue)
					return new OutgoingEmailQueueMetaControl($objParentObject, $objOutgoingEmailQueue);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a OutgoingEmailQueue object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new OutgoingEmailQueueMetaControl($objParentObject, new OutgoingEmailQueue());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OutgoingEmailQueueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing OutgoingEmailQueue object creation - defaults to CreateOrEdit
		 * @return OutgoingEmailQueueMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return OutgoingEmailQueueMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OutgoingEmailQueueMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing OutgoingEmailQueue object creation - defaults to CreateOrEdit
		 * @return OutgoingEmailQueueMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return OutgoingEmailQueueMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objOutgoingEmailQueue->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtToAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtToAddress_Create($strControlId = null) {
			$this->txtToAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtToAddress->Name = QApplication::Translate('To Address');
			$this->txtToAddress->Text = $this->objOutgoingEmailQueue->ToAddress;
			$this->txtToAddress->TextMode = QTextMode::MultiLine;
			return $this->txtToAddress;
		}

		/**
		 * Create and setup QLabel lblToAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblToAddress_Create($strControlId = null) {
			$this->lblToAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblToAddress->Name = QApplication::Translate('To Address');
			$this->lblToAddress->Text = $this->objOutgoingEmailQueue->ToAddress;
			return $this->lblToAddress;
		}

		/**
		 * Create and setup QTextBox txtFromAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFromAddress_Create($strControlId = null) {
			$this->txtFromAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFromAddress->Name = QApplication::Translate('From Address');
			$this->txtFromAddress->Text = $this->objOutgoingEmailQueue->FromAddress;
			$this->txtFromAddress->TextMode = QTextMode::MultiLine;
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
			$this->lblFromAddress->Text = $this->objOutgoingEmailQueue->FromAddress;
			return $this->lblFromAddress;
		}

		/**
		 * Create and setup QTextBox txtCcAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCcAddress_Create($strControlId = null) {
			$this->txtCcAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCcAddress->Name = QApplication::Translate('Cc Address');
			$this->txtCcAddress->Text = $this->objOutgoingEmailQueue->CcAddress;
			$this->txtCcAddress->TextMode = QTextMode::MultiLine;
			return $this->txtCcAddress;
		}

		/**
		 * Create and setup QLabel lblCcAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCcAddress_Create($strControlId = null) {
			$this->lblCcAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblCcAddress->Name = QApplication::Translate('Cc Address');
			$this->lblCcAddress->Text = $this->objOutgoingEmailQueue->CcAddress;
			return $this->lblCcAddress;
		}

		/**
		 * Create and setup QTextBox txtBccAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtBccAddress_Create($strControlId = null) {
			$this->txtBccAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtBccAddress->Name = QApplication::Translate('Bcc Address');
			$this->txtBccAddress->Text = $this->objOutgoingEmailQueue->BccAddress;
			$this->txtBccAddress->TextMode = QTextMode::MultiLine;
			return $this->txtBccAddress;
		}

		/**
		 * Create and setup QLabel lblBccAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblBccAddress_Create($strControlId = null) {
			$this->lblBccAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblBccAddress->Name = QApplication::Translate('Bcc Address');
			$this->lblBccAddress->Text = $this->objOutgoingEmailQueue->BccAddress;
			return $this->lblBccAddress;
		}

		/**
		 * Create and setup QTextBox txtSubject
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSubject_Create($strControlId = null) {
			$this->txtSubject = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSubject->Name = QApplication::Translate('Subject');
			$this->txtSubject->Text = $this->objOutgoingEmailQueue->Subject;
			$this->txtSubject->MaxLength = OutgoingEmailQueue::SubjectMaxLength;
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
			$this->lblSubject->Text = $this->objOutgoingEmailQueue->Subject;
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
			$this->txtBody->Text = $this->objOutgoingEmailQueue->Body;
			$this->txtBody->TextMode = QTextMode::MultiLine;
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
			$this->lblBody->Text = $this->objOutgoingEmailQueue->Body;
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
			$this->calDateQueued->DateTime = $this->objOutgoingEmailQueue->DateQueued;
			$this->calDateQueued->DateTimePickerType = QDateTimePickerType::DateTime;
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
			$this->lblDateQueued->Text = sprintf($this->objOutgoingEmailQueue->DateQueued) ? $this->objOutgoingEmailQueue->DateQueued->__toString($this->strDateQueuedDateTimeFormat) : null;
			return $this->lblDateQueued;
		}

		protected $strDateQueuedDateTimeFormat;

		/**
		 * Create and setup QCheckBox chkErrorFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkErrorFlag_Create($strControlId = null) {
			$this->chkErrorFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkErrorFlag->Name = QApplication::Translate('Error Flag');
			$this->chkErrorFlag->Checked = $this->objOutgoingEmailQueue->ErrorFlag;
			return $this->chkErrorFlag;
		}

		/**
		 * Create and setup QLabel lblErrorFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblErrorFlag_Create($strControlId = null) {
			$this->lblErrorFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblErrorFlag->Name = QApplication::Translate('Error Flag');
			$this->lblErrorFlag->Text = ($this->objOutgoingEmailQueue->ErrorFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblErrorFlag;
		}

		/**
		 * Create and setup QTextBox txtErrorMessage
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtErrorMessage_Create($strControlId = null) {
			$this->txtErrorMessage = new QTextBox($this->objParentObject, $strControlId);
			$this->txtErrorMessage->Name = QApplication::Translate('Error Message');
			$this->txtErrorMessage->Text = $this->objOutgoingEmailQueue->ErrorMessage;
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
			$this->lblErrorMessage->Text = $this->objOutgoingEmailQueue->ErrorMessage;
			return $this->lblErrorMessage;
		}



		/**
		 * Refresh this MetaControl with Data from the local OutgoingEmailQueue object.
		 * @param boolean $blnReload reload OutgoingEmailQueue from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objOutgoingEmailQueue->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objOutgoingEmailQueue->Id;

			if ($this->txtToAddress) $this->txtToAddress->Text = $this->objOutgoingEmailQueue->ToAddress;
			if ($this->lblToAddress) $this->lblToAddress->Text = $this->objOutgoingEmailQueue->ToAddress;

			if ($this->txtFromAddress) $this->txtFromAddress->Text = $this->objOutgoingEmailQueue->FromAddress;
			if ($this->lblFromAddress) $this->lblFromAddress->Text = $this->objOutgoingEmailQueue->FromAddress;

			if ($this->txtCcAddress) $this->txtCcAddress->Text = $this->objOutgoingEmailQueue->CcAddress;
			if ($this->lblCcAddress) $this->lblCcAddress->Text = $this->objOutgoingEmailQueue->CcAddress;

			if ($this->txtBccAddress) $this->txtBccAddress->Text = $this->objOutgoingEmailQueue->BccAddress;
			if ($this->lblBccAddress) $this->lblBccAddress->Text = $this->objOutgoingEmailQueue->BccAddress;

			if ($this->txtSubject) $this->txtSubject->Text = $this->objOutgoingEmailQueue->Subject;
			if ($this->lblSubject) $this->lblSubject->Text = $this->objOutgoingEmailQueue->Subject;

			if ($this->txtBody) $this->txtBody->Text = $this->objOutgoingEmailQueue->Body;
			if ($this->lblBody) $this->lblBody->Text = $this->objOutgoingEmailQueue->Body;

			if ($this->calDateQueued) $this->calDateQueued->DateTime = $this->objOutgoingEmailQueue->DateQueued;
			if ($this->lblDateQueued) $this->lblDateQueued->Text = sprintf($this->objOutgoingEmailQueue->DateQueued) ? $this->objOutgoingEmailQueue->__toString($this->strDateQueuedDateTimeFormat) : null;

			if ($this->chkErrorFlag) $this->chkErrorFlag->Checked = $this->objOutgoingEmailQueue->ErrorFlag;
			if ($this->lblErrorFlag) $this->lblErrorFlag->Text = ($this->objOutgoingEmailQueue->ErrorFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtErrorMessage) $this->txtErrorMessage->Text = $this->objOutgoingEmailQueue->ErrorMessage;
			if ($this->lblErrorMessage) $this->lblErrorMessage->Text = $this->objOutgoingEmailQueue->ErrorMessage;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC OUTGOINGEMAILQUEUE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's OutgoingEmailQueue instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveOutgoingEmailQueue() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtToAddress) $this->objOutgoingEmailQueue->ToAddress = $this->txtToAddress->Text;
				if ($this->txtFromAddress) $this->objOutgoingEmailQueue->FromAddress = $this->txtFromAddress->Text;
				if ($this->txtCcAddress) $this->objOutgoingEmailQueue->CcAddress = $this->txtCcAddress->Text;
				if ($this->txtBccAddress) $this->objOutgoingEmailQueue->BccAddress = $this->txtBccAddress->Text;
				if ($this->txtSubject) $this->objOutgoingEmailQueue->Subject = $this->txtSubject->Text;
				if ($this->txtBody) $this->objOutgoingEmailQueue->Body = $this->txtBody->Text;
				if ($this->calDateQueued) $this->objOutgoingEmailQueue->DateQueued = $this->calDateQueued->DateTime;
				if ($this->chkErrorFlag) $this->objOutgoingEmailQueue->ErrorFlag = $this->chkErrorFlag->Checked;
				if ($this->txtErrorMessage) $this->objOutgoingEmailQueue->ErrorMessage = $this->txtErrorMessage->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the OutgoingEmailQueue object
				$this->objOutgoingEmailQueue->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's OutgoingEmailQueue instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteOutgoingEmailQueue() {
			$this->objOutgoingEmailQueue->Delete();
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
				case 'OutgoingEmailQueue': return $this->objOutgoingEmailQueue;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to OutgoingEmailQueue fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ToAddressControl':
					if (!$this->txtToAddress) return $this->txtToAddress_Create();
					return $this->txtToAddress;
				case 'ToAddressLabel':
					if (!$this->lblToAddress) return $this->lblToAddress_Create();
					return $this->lblToAddress;
				case 'FromAddressControl':
					if (!$this->txtFromAddress) return $this->txtFromAddress_Create();
					return $this->txtFromAddress;
				case 'FromAddressLabel':
					if (!$this->lblFromAddress) return $this->lblFromAddress_Create();
					return $this->lblFromAddress;
				case 'CcAddressControl':
					if (!$this->txtCcAddress) return $this->txtCcAddress_Create();
					return $this->txtCcAddress;
				case 'CcAddressLabel':
					if (!$this->lblCcAddress) return $this->lblCcAddress_Create();
					return $this->lblCcAddress;
				case 'BccAddressControl':
					if (!$this->txtBccAddress) return $this->txtBccAddress_Create();
					return $this->txtBccAddress;
				case 'BccAddressLabel':
					if (!$this->lblBccAddress) return $this->lblBccAddress_Create();
					return $this->lblBccAddress;
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
				case 'ErrorFlagControl':
					if (!$this->chkErrorFlag) return $this->chkErrorFlag_Create();
					return $this->chkErrorFlag;
				case 'ErrorFlagLabel':
					if (!$this->lblErrorFlag) return $this->lblErrorFlag_Create();
					return $this->lblErrorFlag;
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
					// Controls that point to OutgoingEmailQueue fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ToAddressControl':
						return ($this->txtToAddress = QType::Cast($mixValue, 'QControl'));
					case 'FromAddressControl':
						return ($this->txtFromAddress = QType::Cast($mixValue, 'QControl'));
					case 'CcAddressControl':
						return ($this->txtCcAddress = QType::Cast($mixValue, 'QControl'));
					case 'BccAddressControl':
						return ($this->txtBccAddress = QType::Cast($mixValue, 'QControl'));
					case 'SubjectControl':
						return ($this->txtSubject = QType::Cast($mixValue, 'QControl'));
					case 'BodyControl':
						return ($this->txtBody = QType::Cast($mixValue, 'QControl'));
					case 'DateQueuedControl':
						return ($this->calDateQueued = QType::Cast($mixValue, 'QControl'));
					case 'ErrorFlagControl':
						return ($this->chkErrorFlag = QType::Cast($mixValue, 'QControl'));
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