<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the CreditCardPayment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single CreditCardPayment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CreditCardPaymentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read CreditCardPayment $CreditCardPayment the actual CreditCardPayment data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $CreditCardStatusTypeIdControl
	 * property-read QLabel $CreditCardStatusTypeIdLabel
	 * property QListBox $CreditCardTypeIdControl
	 * property-read QLabel $CreditCardTypeIdLabel
	 * property QTextBox $CreditCardLastFourControl
	 * property-read QLabel $CreditCardLastFourLabel
	 * property QTextBox $TransactionCodeControl
	 * property-read QLabel $TransactionCodeLabel
	 * property QTextBox $AuthorizationCodeControl
	 * property-read QLabel $AuthorizationCodeLabel
	 * property QTextBox $AddressMatchCodeControl
	 * property-read QLabel $AddressMatchCodeLabel
	 * property QDateTimePicker $DateAuthorizedControl
	 * property-read QLabel $DateAuthorizedLabel
	 * property QDateTimePicker $DateCapturedControl
	 * property-read QLabel $DateCapturedLabel
	 * property QFloatTextBox $AmountChargedControl
	 * property-read QLabel $AmountChargedLabel
	 * property QFloatTextBox $AmountFeeControl
	 * property-read QLabel $AmountFeeLabel
	 * property QFloatTextBox $AmountClearedControl
	 * property-read QLabel $AmountClearedLabel
	 * property QListBox $PaypalBatchIdControl
	 * property-read QLabel $PaypalBatchIdLabel
	 * property QCheckBox $UnlinkedFlagControl
	 * property-read QLabel $UnlinkedFlagLabel
	 * property QListBox $OnlineDonationControl
	 * property-read QLabel $OnlineDonationLabel
	 * property QListBox $SignupPaymentControl
	 * property-read QLabel $SignupPaymentLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CreditCardPaymentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var CreditCardPayment objCreditCardPayment
		 * @access protected
		 */
		protected $objCreditCardPayment;

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

		// Controls that allow the editing of CreditCardPayment's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstCreditCardStatusType;
         * @access protected
         */
		protected $lstCreditCardStatusType;

        /**
         * @var QListBox lstCreditCardType;
         * @access protected
         */
		protected $lstCreditCardType;

        /**
         * @var QTextBox txtCreditCardLastFour;
         * @access protected
         */
		protected $txtCreditCardLastFour;

        /**
         * @var QTextBox txtTransactionCode;
         * @access protected
         */
		protected $txtTransactionCode;

        /**
         * @var QTextBox txtAuthorizationCode;
         * @access protected
         */
		protected $txtAuthorizationCode;

        /**
         * @var QTextBox txtAddressMatchCode;
         * @access protected
         */
		protected $txtAddressMatchCode;

        /**
         * @var QDateTimePicker calDateAuthorized;
         * @access protected
         */
		protected $calDateAuthorized;

        /**
         * @var QDateTimePicker calDateCaptured;
         * @access protected
         */
		protected $calDateCaptured;

        /**
         * @var QFloatTextBox txtAmountCharged;
         * @access protected
         */
		protected $txtAmountCharged;

        /**
         * @var QFloatTextBox txtAmountFee;
         * @access protected
         */
		protected $txtAmountFee;

        /**
         * @var QFloatTextBox txtAmountCleared;
         * @access protected
         */
		protected $txtAmountCleared;

        /**
         * @var QListBox lstPaypalBatch;
         * @access protected
         */
		protected $lstPaypalBatch;

        /**
         * @var QCheckBox chkUnlinkedFlag;
         * @access protected
         */
		protected $chkUnlinkedFlag;


		// Controls that allow the viewing of CreditCardPayment's individual data fields
        /**
         * @var QLabel lblCreditCardStatusTypeId
         * @access protected
         */
		protected $lblCreditCardStatusTypeId;

        /**
         * @var QLabel lblCreditCardTypeId
         * @access protected
         */
		protected $lblCreditCardTypeId;

        /**
         * @var QLabel lblCreditCardLastFour
         * @access protected
         */
		protected $lblCreditCardLastFour;

        /**
         * @var QLabel lblTransactionCode
         * @access protected
         */
		protected $lblTransactionCode;

        /**
         * @var QLabel lblAuthorizationCode
         * @access protected
         */
		protected $lblAuthorizationCode;

        /**
         * @var QLabel lblAddressMatchCode
         * @access protected
         */
		protected $lblAddressMatchCode;

        /**
         * @var QLabel lblDateAuthorized
         * @access protected
         */
		protected $lblDateAuthorized;

        /**
         * @var QLabel lblDateCaptured
         * @access protected
         */
		protected $lblDateCaptured;

        /**
         * @var QLabel lblAmountCharged
         * @access protected
         */
		protected $lblAmountCharged;

        /**
         * @var QLabel lblAmountFee
         * @access protected
         */
		protected $lblAmountFee;

        /**
         * @var QLabel lblAmountCleared
         * @access protected
         */
		protected $lblAmountCleared;

        /**
         * @var QLabel lblPaypalBatchId
         * @access protected
         */
		protected $lblPaypalBatchId;

        /**
         * @var QLabel lblUnlinkedFlag
         * @access protected
         */
		protected $lblUnlinkedFlag;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstOnlineDonation
         * @access protected
         */
		protected $lstOnlineDonation;

        /**
         * @var QListBox lstSignupPayment
         * @access protected
         */
		protected $lstSignupPayment;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblOnlineDonation
         * @access protected
         */
		protected $lblOnlineDonation;

        /**
         * @var QLabel lblSignupPayment
         * @access protected
         */
		protected $lblSignupPayment;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CreditCardPaymentMetaControl to edit a single CreditCardPayment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single CreditCardPayment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CreditCardPaymentMetaControl
		 * @param CreditCardPayment $objCreditCardPayment new or existing CreditCardPayment object
		 */
		 public function __construct($objParentObject, CreditCardPayment $objCreditCardPayment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CreditCardPaymentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked CreditCardPayment object
			$this->objCreditCardPayment = $objCreditCardPayment;

			// Figure out if we're Editing or Creating New
			if ($this->objCreditCardPayment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CreditCardPaymentMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing CreditCardPayment object creation - defaults to CreateOrEdit
 		 * @return CreditCardPaymentMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objCreditCardPayment = CreditCardPayment::Load($intId);

				// CreditCardPayment was found -- return it!
				if ($objCreditCardPayment)
					return new CreditCardPaymentMetaControl($objParentObject, $objCreditCardPayment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a CreditCardPayment object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CreditCardPaymentMetaControl($objParentObject, new CreditCardPayment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CreditCardPaymentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CreditCardPayment object creation - defaults to CreateOrEdit
		 * @return CreditCardPaymentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return CreditCardPaymentMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CreditCardPaymentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CreditCardPayment object creation - defaults to CreateOrEdit
		 * @return CreditCardPaymentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return CreditCardPaymentMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objCreditCardPayment->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstCreditCardStatusType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCreditCardStatusType_Create($strControlId = null) {
			$this->lstCreditCardStatusType = new QListBox($this->objParentObject, $strControlId);
			$this->lstCreditCardStatusType->Name = QApplication::Translate('Credit Card Status Type');
			$this->lstCreditCardStatusType->Required = true;
			foreach (CreditCardStatusType::$NameArray as $intId => $strValue)
				$this->lstCreditCardStatusType->AddItem(new QListItem($strValue, $intId, $this->objCreditCardPayment->CreditCardStatusTypeId == $intId));
			return $this->lstCreditCardStatusType;
		}

		/**
		 * Create and setup QLabel lblCreditCardStatusTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreditCardStatusTypeId_Create($strControlId = null) {
			$this->lblCreditCardStatusTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreditCardStatusTypeId->Name = QApplication::Translate('Credit Card Status Type');
			$this->lblCreditCardStatusTypeId->Text = ($this->objCreditCardPayment->CreditCardStatusTypeId) ? CreditCardStatusType::$NameArray[$this->objCreditCardPayment->CreditCardStatusTypeId] : null;
			$this->lblCreditCardStatusTypeId->Required = true;
			return $this->lblCreditCardStatusTypeId;
		}

		/**
		 * Create and setup QListBox lstCreditCardType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCreditCardType_Create($strControlId = null) {
			$this->lstCreditCardType = new QListBox($this->objParentObject, $strControlId);
			$this->lstCreditCardType->Name = QApplication::Translate('Credit Card Type');
			$this->lstCreditCardType->Required = true;
			foreach (CreditCardType::$NameArray as $intId => $strValue)
				$this->lstCreditCardType->AddItem(new QListItem($strValue, $intId, $this->objCreditCardPayment->CreditCardTypeId == $intId));
			return $this->lstCreditCardType;
		}

		/**
		 * Create and setup QLabel lblCreditCardTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreditCardTypeId_Create($strControlId = null) {
			$this->lblCreditCardTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreditCardTypeId->Name = QApplication::Translate('Credit Card Type');
			$this->lblCreditCardTypeId->Text = ($this->objCreditCardPayment->CreditCardTypeId) ? CreditCardType::$NameArray[$this->objCreditCardPayment->CreditCardTypeId] : null;
			$this->lblCreditCardTypeId->Required = true;
			return $this->lblCreditCardTypeId;
		}

		/**
		 * Create and setup QTextBox txtCreditCardLastFour
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCreditCardLastFour_Create($strControlId = null) {
			$this->txtCreditCardLastFour = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCreditCardLastFour->Name = QApplication::Translate('Credit Card Last Four');
			$this->txtCreditCardLastFour->Text = $this->objCreditCardPayment->CreditCardLastFour;
			$this->txtCreditCardLastFour->Required = true;
			$this->txtCreditCardLastFour->MaxLength = CreditCardPayment::CreditCardLastFourMaxLength;
			return $this->txtCreditCardLastFour;
		}

		/**
		 * Create and setup QLabel lblCreditCardLastFour
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreditCardLastFour_Create($strControlId = null) {
			$this->lblCreditCardLastFour = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreditCardLastFour->Name = QApplication::Translate('Credit Card Last Four');
			$this->lblCreditCardLastFour->Text = $this->objCreditCardPayment->CreditCardLastFour;
			$this->lblCreditCardLastFour->Required = true;
			return $this->lblCreditCardLastFour;
		}

		/**
		 * Create and setup QTextBox txtTransactionCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTransactionCode_Create($strControlId = null) {
			$this->txtTransactionCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTransactionCode->Name = QApplication::Translate('Transaction Code');
			$this->txtTransactionCode->Text = $this->objCreditCardPayment->TransactionCode;
			$this->txtTransactionCode->Required = true;
			$this->txtTransactionCode->MaxLength = CreditCardPayment::TransactionCodeMaxLength;
			return $this->txtTransactionCode;
		}

		/**
		 * Create and setup QLabel lblTransactionCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTransactionCode_Create($strControlId = null) {
			$this->lblTransactionCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblTransactionCode->Name = QApplication::Translate('Transaction Code');
			$this->lblTransactionCode->Text = $this->objCreditCardPayment->TransactionCode;
			$this->lblTransactionCode->Required = true;
			return $this->lblTransactionCode;
		}

		/**
		 * Create and setup QTextBox txtAuthorizationCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAuthorizationCode_Create($strControlId = null) {
			$this->txtAuthorizationCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAuthorizationCode->Name = QApplication::Translate('Authorization Code');
			$this->txtAuthorizationCode->Text = $this->objCreditCardPayment->AuthorizationCode;
			$this->txtAuthorizationCode->MaxLength = CreditCardPayment::AuthorizationCodeMaxLength;
			return $this->txtAuthorizationCode;
		}

		/**
		 * Create and setup QLabel lblAuthorizationCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAuthorizationCode_Create($strControlId = null) {
			$this->lblAuthorizationCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblAuthorizationCode->Name = QApplication::Translate('Authorization Code');
			$this->lblAuthorizationCode->Text = $this->objCreditCardPayment->AuthorizationCode;
			return $this->lblAuthorizationCode;
		}

		/**
		 * Create and setup QTextBox txtAddressMatchCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddressMatchCode_Create($strControlId = null) {
			$this->txtAddressMatchCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddressMatchCode->Name = QApplication::Translate('Address Match Code');
			$this->txtAddressMatchCode->Text = $this->objCreditCardPayment->AddressMatchCode;
			$this->txtAddressMatchCode->MaxLength = CreditCardPayment::AddressMatchCodeMaxLength;
			return $this->txtAddressMatchCode;
		}

		/**
		 * Create and setup QLabel lblAddressMatchCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddressMatchCode_Create($strControlId = null) {
			$this->lblAddressMatchCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddressMatchCode->Name = QApplication::Translate('Address Match Code');
			$this->lblAddressMatchCode->Text = $this->objCreditCardPayment->AddressMatchCode;
			return $this->lblAddressMatchCode;
		}

		/**
		 * Create and setup QDateTimePicker calDateAuthorized
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateAuthorized_Create($strControlId = null) {
			$this->calDateAuthorized = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateAuthorized->Name = QApplication::Translate('Date Authorized');
			$this->calDateAuthorized->DateTime = $this->objCreditCardPayment->DateAuthorized;
			$this->calDateAuthorized->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateAuthorized;
		}

		/**
		 * Create and setup QLabel lblDateAuthorized
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateAuthorized_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateAuthorized = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateAuthorized->Name = QApplication::Translate('Date Authorized');
			$this->strDateAuthorizedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateAuthorized->Text = sprintf($this->objCreditCardPayment->DateAuthorized) ? $this->objCreditCardPayment->DateAuthorized->__toString($this->strDateAuthorizedDateTimeFormat) : null;
			return $this->lblDateAuthorized;
		}

		protected $strDateAuthorizedDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateCaptured
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateCaptured_Create($strControlId = null) {
			$this->calDateCaptured = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateCaptured->Name = QApplication::Translate('Date Captured');
			$this->calDateCaptured->DateTime = $this->objCreditCardPayment->DateCaptured;
			$this->calDateCaptured->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calDateCaptured;
		}

		/**
		 * Create and setup QLabel lblDateCaptured
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateCaptured_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateCaptured = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateCaptured->Name = QApplication::Translate('Date Captured');
			$this->strDateCapturedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateCaptured->Text = sprintf($this->objCreditCardPayment->DateCaptured) ? $this->objCreditCardPayment->DateCaptured->__toString($this->strDateCapturedDateTimeFormat) : null;
			return $this->lblDateCaptured;
		}

		protected $strDateCapturedDateTimeFormat;

		/**
		 * Create and setup QFloatTextBox txtAmountCharged
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmountCharged_Create($strControlId = null) {
			$this->txtAmountCharged = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmountCharged->Name = QApplication::Translate('Amount Charged');
			$this->txtAmountCharged->Text = $this->objCreditCardPayment->AmountCharged;
			return $this->txtAmountCharged;
		}

		/**
		 * Create and setup QLabel lblAmountCharged
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmountCharged_Create($strControlId = null, $strFormat = null) {
			$this->lblAmountCharged = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmountCharged->Name = QApplication::Translate('Amount Charged');
			$this->lblAmountCharged->Text = $this->objCreditCardPayment->AmountCharged;
			$this->lblAmountCharged->Format = $strFormat;
			return $this->lblAmountCharged;
		}

		/**
		 * Create and setup QFloatTextBox txtAmountFee
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmountFee_Create($strControlId = null) {
			$this->txtAmountFee = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmountFee->Name = QApplication::Translate('Amount Fee');
			$this->txtAmountFee->Text = $this->objCreditCardPayment->AmountFee;
			return $this->txtAmountFee;
		}

		/**
		 * Create and setup QLabel lblAmountFee
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmountFee_Create($strControlId = null, $strFormat = null) {
			$this->lblAmountFee = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmountFee->Name = QApplication::Translate('Amount Fee');
			$this->lblAmountFee->Text = $this->objCreditCardPayment->AmountFee;
			$this->lblAmountFee->Format = $strFormat;
			return $this->lblAmountFee;
		}

		/**
		 * Create and setup QFloatTextBox txtAmountCleared
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmountCleared_Create($strControlId = null) {
			$this->txtAmountCleared = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmountCleared->Name = QApplication::Translate('Amount Cleared');
			$this->txtAmountCleared->Text = $this->objCreditCardPayment->AmountCleared;
			return $this->txtAmountCleared;
		}

		/**
		 * Create and setup QLabel lblAmountCleared
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmountCleared_Create($strControlId = null, $strFormat = null) {
			$this->lblAmountCleared = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmountCleared->Name = QApplication::Translate('Amount Cleared');
			$this->lblAmountCleared->Text = $this->objCreditCardPayment->AmountCleared;
			$this->lblAmountCleared->Format = $strFormat;
			return $this->lblAmountCleared;
		}

		/**
		 * Create and setup QListBox lstPaypalBatch
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPaypalBatch_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPaypalBatch = new QListBox($this->objParentObject, $strControlId);
			$this->lstPaypalBatch->Name = QApplication::Translate('Paypal Batch');
			$this->lstPaypalBatch->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPaypalBatchCursor = PaypalBatch::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPaypalBatch = PaypalBatch::InstantiateCursor($objPaypalBatchCursor)) {
				$objListItem = new QListItem($objPaypalBatch->__toString(), $objPaypalBatch->Id);
				if (($this->objCreditCardPayment->PaypalBatch) && ($this->objCreditCardPayment->PaypalBatch->Id == $objPaypalBatch->Id))
					$objListItem->Selected = true;
				$this->lstPaypalBatch->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPaypalBatch;
		}

		/**
		 * Create and setup QLabel lblPaypalBatchId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPaypalBatchId_Create($strControlId = null) {
			$this->lblPaypalBatchId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPaypalBatchId->Name = QApplication::Translate('Paypal Batch');
			$this->lblPaypalBatchId->Text = ($this->objCreditCardPayment->PaypalBatch) ? $this->objCreditCardPayment->PaypalBatch->__toString() : null;
			return $this->lblPaypalBatchId;
		}

		/**
		 * Create and setup QCheckBox chkUnlinkedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkUnlinkedFlag_Create($strControlId = null) {
			$this->chkUnlinkedFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkUnlinkedFlag->Name = QApplication::Translate('Unlinked Flag');
			$this->chkUnlinkedFlag->Checked = $this->objCreditCardPayment->UnlinkedFlag;
			return $this->chkUnlinkedFlag;
		}

		/**
		 * Create and setup QLabel lblUnlinkedFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUnlinkedFlag_Create($strControlId = null) {
			$this->lblUnlinkedFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblUnlinkedFlag->Name = QApplication::Translate('Unlinked Flag');
			$this->lblUnlinkedFlag->Text = ($this->objCreditCardPayment->UnlinkedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblUnlinkedFlag;
		}

		/**
		 * Create and setup QListBox lstOnlineDonation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstOnlineDonation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstOnlineDonation = new QListBox($this->objParentObject, $strControlId);
			$this->lstOnlineDonation->Name = QApplication::Translate('Online Donation');
			$this->lstOnlineDonation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objOnlineDonationCursor = OnlineDonation::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objOnlineDonation = OnlineDonation::InstantiateCursor($objOnlineDonationCursor)) {
				$objListItem = new QListItem($objOnlineDonation->__toString(), $objOnlineDonation->Id);
				if ($objOnlineDonation->CreditCardPaymentId == $this->objCreditCardPayment->Id)
					$objListItem->Selected = true;
				$this->lstOnlineDonation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstOnlineDonation;
		}

		/**
		 * Create and setup QLabel lblOnlineDonation
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOnlineDonation_Create($strControlId = null) {
			$this->lblOnlineDonation = new QLabel($this->objParentObject, $strControlId);
			$this->lblOnlineDonation->Name = QApplication::Translate('Online Donation');
			$this->lblOnlineDonation->Text = ($this->objCreditCardPayment->OnlineDonation) ? $this->objCreditCardPayment->OnlineDonation->__toString() : null;
			return $this->lblOnlineDonation;
		}

		/**
		 * Create and setup QListBox lstSignupPayment
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSignupPayment_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSignupPayment = new QListBox($this->objParentObject, $strControlId);
			$this->lstSignupPayment->Name = QApplication::Translate('Signup Payment');
			$this->lstSignupPayment->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSignupPaymentCursor = SignupPayment::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSignupPayment = SignupPayment::InstantiateCursor($objSignupPaymentCursor)) {
				$objListItem = new QListItem($objSignupPayment->__toString(), $objSignupPayment->Id);
				if ($objSignupPayment->CreditCardPaymentId == $this->objCreditCardPayment->Id)
					$objListItem->Selected = true;
				$this->lstSignupPayment->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSignupPayment;
		}

		/**
		 * Create and setup QLabel lblSignupPayment
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSignupPayment_Create($strControlId = null) {
			$this->lblSignupPayment = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupPayment->Name = QApplication::Translate('Signup Payment');
			$this->lblSignupPayment->Text = ($this->objCreditCardPayment->SignupPayment) ? $this->objCreditCardPayment->SignupPayment->__toString() : null;
			return $this->lblSignupPayment;
		}



		/**
		 * Refresh this MetaControl with Data from the local CreditCardPayment object.
		 * @param boolean $blnReload reload CreditCardPayment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCreditCardPayment->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objCreditCardPayment->Id;

			if ($this->lstCreditCardStatusType) $this->lstCreditCardStatusType->SelectedValue = $this->objCreditCardPayment->CreditCardStatusTypeId;
			if ($this->lblCreditCardStatusTypeId) $this->lblCreditCardStatusTypeId->Text = ($this->objCreditCardPayment->CreditCardStatusTypeId) ? CreditCardStatusType::$NameArray[$this->objCreditCardPayment->CreditCardStatusTypeId] : null;

			if ($this->lstCreditCardType) $this->lstCreditCardType->SelectedValue = $this->objCreditCardPayment->CreditCardTypeId;
			if ($this->lblCreditCardTypeId) $this->lblCreditCardTypeId->Text = ($this->objCreditCardPayment->CreditCardTypeId) ? CreditCardType::$NameArray[$this->objCreditCardPayment->CreditCardTypeId] : null;

			if ($this->txtCreditCardLastFour) $this->txtCreditCardLastFour->Text = $this->objCreditCardPayment->CreditCardLastFour;
			if ($this->lblCreditCardLastFour) $this->lblCreditCardLastFour->Text = $this->objCreditCardPayment->CreditCardLastFour;

			if ($this->txtTransactionCode) $this->txtTransactionCode->Text = $this->objCreditCardPayment->TransactionCode;
			if ($this->lblTransactionCode) $this->lblTransactionCode->Text = $this->objCreditCardPayment->TransactionCode;

			if ($this->txtAuthorizationCode) $this->txtAuthorizationCode->Text = $this->objCreditCardPayment->AuthorizationCode;
			if ($this->lblAuthorizationCode) $this->lblAuthorizationCode->Text = $this->objCreditCardPayment->AuthorizationCode;

			if ($this->txtAddressMatchCode) $this->txtAddressMatchCode->Text = $this->objCreditCardPayment->AddressMatchCode;
			if ($this->lblAddressMatchCode) $this->lblAddressMatchCode->Text = $this->objCreditCardPayment->AddressMatchCode;

			if ($this->calDateAuthorized) $this->calDateAuthorized->DateTime = $this->objCreditCardPayment->DateAuthorized;
			if ($this->lblDateAuthorized) $this->lblDateAuthorized->Text = sprintf($this->objCreditCardPayment->DateAuthorized) ? $this->objCreditCardPayment->__toString($this->strDateAuthorizedDateTimeFormat) : null;

			if ($this->calDateCaptured) $this->calDateCaptured->DateTime = $this->objCreditCardPayment->DateCaptured;
			if ($this->lblDateCaptured) $this->lblDateCaptured->Text = sprintf($this->objCreditCardPayment->DateCaptured) ? $this->objCreditCardPayment->__toString($this->strDateCapturedDateTimeFormat) : null;

			if ($this->txtAmountCharged) $this->txtAmountCharged->Text = $this->objCreditCardPayment->AmountCharged;
			if ($this->lblAmountCharged) $this->lblAmountCharged->Text = $this->objCreditCardPayment->AmountCharged;

			if ($this->txtAmountFee) $this->txtAmountFee->Text = $this->objCreditCardPayment->AmountFee;
			if ($this->lblAmountFee) $this->lblAmountFee->Text = $this->objCreditCardPayment->AmountFee;

			if ($this->txtAmountCleared) $this->txtAmountCleared->Text = $this->objCreditCardPayment->AmountCleared;
			if ($this->lblAmountCleared) $this->lblAmountCleared->Text = $this->objCreditCardPayment->AmountCleared;

			if ($this->lstPaypalBatch) {
					$this->lstPaypalBatch->RemoveAllItems();
				$this->lstPaypalBatch->AddItem(QApplication::Translate('- Select One -'), null);
				$objPaypalBatchArray = PaypalBatch::LoadAll();
				if ($objPaypalBatchArray) foreach ($objPaypalBatchArray as $objPaypalBatch) {
					$objListItem = new QListItem($objPaypalBatch->__toString(), $objPaypalBatch->Id);
					if (($this->objCreditCardPayment->PaypalBatch) && ($this->objCreditCardPayment->PaypalBatch->Id == $objPaypalBatch->Id))
						$objListItem->Selected = true;
					$this->lstPaypalBatch->AddItem($objListItem);
				}
			}
			if ($this->lblPaypalBatchId) $this->lblPaypalBatchId->Text = ($this->objCreditCardPayment->PaypalBatch) ? $this->objCreditCardPayment->PaypalBatch->__toString() : null;

			if ($this->chkUnlinkedFlag) $this->chkUnlinkedFlag->Checked = $this->objCreditCardPayment->UnlinkedFlag;
			if ($this->lblUnlinkedFlag) $this->lblUnlinkedFlag->Text = ($this->objCreditCardPayment->UnlinkedFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstOnlineDonation) {
				$this->lstOnlineDonation->RemoveAllItems();
				$this->lstOnlineDonation->AddItem(QApplication::Translate('- Select One -'), null);
				$objOnlineDonationArray = OnlineDonation::LoadAll();
				if ($objOnlineDonationArray) foreach ($objOnlineDonationArray as $objOnlineDonation) {
					$objListItem = new QListItem($objOnlineDonation->__toString(), $objOnlineDonation->Id);
					if ($objOnlineDonation->CreditCardPaymentId == $this->objCreditCardPayment->Id)
						$objListItem->Selected = true;
					$this->lstOnlineDonation->AddItem($objListItem);
				}
			}
			if ($this->lblOnlineDonation) $this->lblOnlineDonation->Text = ($this->objCreditCardPayment->OnlineDonation) ? $this->objCreditCardPayment->OnlineDonation->__toString() : null;

			if ($this->lstSignupPayment) {
				$this->lstSignupPayment->RemoveAllItems();
				$this->lstSignupPayment->AddItem(QApplication::Translate('- Select One -'), null);
				$objSignupPaymentArray = SignupPayment::LoadAll();
				if ($objSignupPaymentArray) foreach ($objSignupPaymentArray as $objSignupPayment) {
					$objListItem = new QListItem($objSignupPayment->__toString(), $objSignupPayment->Id);
					if ($objSignupPayment->CreditCardPaymentId == $this->objCreditCardPayment->Id)
						$objListItem->Selected = true;
					$this->lstSignupPayment->AddItem($objListItem);
				}
			}
			if ($this->lblSignupPayment) $this->lblSignupPayment->Text = ($this->objCreditCardPayment->SignupPayment) ? $this->objCreditCardPayment->SignupPayment->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CREDITCARDPAYMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's CreditCardPayment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCreditCardPayment() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstCreditCardStatusType) $this->objCreditCardPayment->CreditCardStatusTypeId = $this->lstCreditCardStatusType->SelectedValue;
				if ($this->lstCreditCardType) $this->objCreditCardPayment->CreditCardTypeId = $this->lstCreditCardType->SelectedValue;
				if ($this->txtCreditCardLastFour) $this->objCreditCardPayment->CreditCardLastFour = $this->txtCreditCardLastFour->Text;
				if ($this->txtTransactionCode) $this->objCreditCardPayment->TransactionCode = $this->txtTransactionCode->Text;
				if ($this->txtAuthorizationCode) $this->objCreditCardPayment->AuthorizationCode = $this->txtAuthorizationCode->Text;
				if ($this->txtAddressMatchCode) $this->objCreditCardPayment->AddressMatchCode = $this->txtAddressMatchCode->Text;
				if ($this->calDateAuthorized) $this->objCreditCardPayment->DateAuthorized = $this->calDateAuthorized->DateTime;
				if ($this->calDateCaptured) $this->objCreditCardPayment->DateCaptured = $this->calDateCaptured->DateTime;
				if ($this->txtAmountCharged) $this->objCreditCardPayment->AmountCharged = $this->txtAmountCharged->Text;
				if ($this->txtAmountFee) $this->objCreditCardPayment->AmountFee = $this->txtAmountFee->Text;
				if ($this->txtAmountCleared) $this->objCreditCardPayment->AmountCleared = $this->txtAmountCleared->Text;
				if ($this->lstPaypalBatch) $this->objCreditCardPayment->PaypalBatchId = $this->lstPaypalBatch->SelectedValue;
				if ($this->chkUnlinkedFlag) $this->objCreditCardPayment->UnlinkedFlag = $this->chkUnlinkedFlag->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstOnlineDonation) $this->objCreditCardPayment->OnlineDonation = OnlineDonation::Load($this->lstOnlineDonation->SelectedValue);
				if ($this->lstSignupPayment) $this->objCreditCardPayment->SignupPayment = SignupPayment::Load($this->lstSignupPayment->SelectedValue);

				// Save the CreditCardPayment object
				$this->objCreditCardPayment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's CreditCardPayment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCreditCardPayment() {
			$this->objCreditCardPayment->Delete();
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
				case 'CreditCardPayment': return $this->objCreditCardPayment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to CreditCardPayment fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'CreditCardStatusTypeIdControl':
					if (!$this->lstCreditCardStatusType) return $this->lstCreditCardStatusType_Create();
					return $this->lstCreditCardStatusType;
				case 'CreditCardStatusTypeIdLabel':
					if (!$this->lblCreditCardStatusTypeId) return $this->lblCreditCardStatusTypeId_Create();
					return $this->lblCreditCardStatusTypeId;
				case 'CreditCardTypeIdControl':
					if (!$this->lstCreditCardType) return $this->lstCreditCardType_Create();
					return $this->lstCreditCardType;
				case 'CreditCardTypeIdLabel':
					if (!$this->lblCreditCardTypeId) return $this->lblCreditCardTypeId_Create();
					return $this->lblCreditCardTypeId;
				case 'CreditCardLastFourControl':
					if (!$this->txtCreditCardLastFour) return $this->txtCreditCardLastFour_Create();
					return $this->txtCreditCardLastFour;
				case 'CreditCardLastFourLabel':
					if (!$this->lblCreditCardLastFour) return $this->lblCreditCardLastFour_Create();
					return $this->lblCreditCardLastFour;
				case 'TransactionCodeControl':
					if (!$this->txtTransactionCode) return $this->txtTransactionCode_Create();
					return $this->txtTransactionCode;
				case 'TransactionCodeLabel':
					if (!$this->lblTransactionCode) return $this->lblTransactionCode_Create();
					return $this->lblTransactionCode;
				case 'AuthorizationCodeControl':
					if (!$this->txtAuthorizationCode) return $this->txtAuthorizationCode_Create();
					return $this->txtAuthorizationCode;
				case 'AuthorizationCodeLabel':
					if (!$this->lblAuthorizationCode) return $this->lblAuthorizationCode_Create();
					return $this->lblAuthorizationCode;
				case 'AddressMatchCodeControl':
					if (!$this->txtAddressMatchCode) return $this->txtAddressMatchCode_Create();
					return $this->txtAddressMatchCode;
				case 'AddressMatchCodeLabel':
					if (!$this->lblAddressMatchCode) return $this->lblAddressMatchCode_Create();
					return $this->lblAddressMatchCode;
				case 'DateAuthorizedControl':
					if (!$this->calDateAuthorized) return $this->calDateAuthorized_Create();
					return $this->calDateAuthorized;
				case 'DateAuthorizedLabel':
					if (!$this->lblDateAuthorized) return $this->lblDateAuthorized_Create();
					return $this->lblDateAuthorized;
				case 'DateCapturedControl':
					if (!$this->calDateCaptured) return $this->calDateCaptured_Create();
					return $this->calDateCaptured;
				case 'DateCapturedLabel':
					if (!$this->lblDateCaptured) return $this->lblDateCaptured_Create();
					return $this->lblDateCaptured;
				case 'AmountChargedControl':
					if (!$this->txtAmountCharged) return $this->txtAmountCharged_Create();
					return $this->txtAmountCharged;
				case 'AmountChargedLabel':
					if (!$this->lblAmountCharged) return $this->lblAmountCharged_Create();
					return $this->lblAmountCharged;
				case 'AmountFeeControl':
					if (!$this->txtAmountFee) return $this->txtAmountFee_Create();
					return $this->txtAmountFee;
				case 'AmountFeeLabel':
					if (!$this->lblAmountFee) return $this->lblAmountFee_Create();
					return $this->lblAmountFee;
				case 'AmountClearedControl':
					if (!$this->txtAmountCleared) return $this->txtAmountCleared_Create();
					return $this->txtAmountCleared;
				case 'AmountClearedLabel':
					if (!$this->lblAmountCleared) return $this->lblAmountCleared_Create();
					return $this->lblAmountCleared;
				case 'PaypalBatchIdControl':
					if (!$this->lstPaypalBatch) return $this->lstPaypalBatch_Create();
					return $this->lstPaypalBatch;
				case 'PaypalBatchIdLabel':
					if (!$this->lblPaypalBatchId) return $this->lblPaypalBatchId_Create();
					return $this->lblPaypalBatchId;
				case 'UnlinkedFlagControl':
					if (!$this->chkUnlinkedFlag) return $this->chkUnlinkedFlag_Create();
					return $this->chkUnlinkedFlag;
				case 'UnlinkedFlagLabel':
					if (!$this->lblUnlinkedFlag) return $this->lblUnlinkedFlag_Create();
					return $this->lblUnlinkedFlag;
				case 'OnlineDonationControl':
					if (!$this->lstOnlineDonation) return $this->lstOnlineDonation_Create();
					return $this->lstOnlineDonation;
				case 'OnlineDonationLabel':
					if (!$this->lblOnlineDonation) return $this->lblOnlineDonation_Create();
					return $this->lblOnlineDonation;
				case 'SignupPaymentControl':
					if (!$this->lstSignupPayment) return $this->lstSignupPayment_Create();
					return $this->lstSignupPayment;
				case 'SignupPaymentLabel':
					if (!$this->lblSignupPayment) return $this->lblSignupPayment_Create();
					return $this->lblSignupPayment;
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
					// Controls that point to CreditCardPayment fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'CreditCardStatusTypeIdControl':
						return ($this->lstCreditCardStatusType = QType::Cast($mixValue, 'QControl'));
					case 'CreditCardTypeIdControl':
						return ($this->lstCreditCardType = QType::Cast($mixValue, 'QControl'));
					case 'CreditCardLastFourControl':
						return ($this->txtCreditCardLastFour = QType::Cast($mixValue, 'QControl'));
					case 'TransactionCodeControl':
						return ($this->txtTransactionCode = QType::Cast($mixValue, 'QControl'));
					case 'AuthorizationCodeControl':
						return ($this->txtAuthorizationCode = QType::Cast($mixValue, 'QControl'));
					case 'AddressMatchCodeControl':
						return ($this->txtAddressMatchCode = QType::Cast($mixValue, 'QControl'));
					case 'DateAuthorizedControl':
						return ($this->calDateAuthorized = QType::Cast($mixValue, 'QControl'));
					case 'DateCapturedControl':
						return ($this->calDateCaptured = QType::Cast($mixValue, 'QControl'));
					case 'AmountChargedControl':
						return ($this->txtAmountCharged = QType::Cast($mixValue, 'QControl'));
					case 'AmountFeeControl':
						return ($this->txtAmountFee = QType::Cast($mixValue, 'QControl'));
					case 'AmountClearedControl':
						return ($this->txtAmountCleared = QType::Cast($mixValue, 'QControl'));
					case 'PaypalBatchIdControl':
						return ($this->lstPaypalBatch = QType::Cast($mixValue, 'QControl'));
					case 'UnlinkedFlagControl':
						return ($this->chkUnlinkedFlag = QType::Cast($mixValue, 'QControl'));
					case 'OnlineDonationControl':
						return ($this->lstOnlineDonation = QType::Cast($mixValue, 'QControl'));
					case 'SignupPaymentControl':
						return ($this->lstSignupPayment = QType::Cast($mixValue, 'QControl'));
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