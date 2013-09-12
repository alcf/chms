<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the RecurringPayments class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single RecurringPayments object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RecurringPaymentsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read RecurringPayments $RecurringPayments the actual RecurringPayments data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $PaymentPeriodIdControl
	 * property-read QLabel $PaymentPeriodIdLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property QDateTimePicker $StartDateControl
	 * property-read QLabel $StartDateLabel
	 * property QDateTimePicker $EndDateControl
	 * property-read QLabel $EndDateLabel
	 * property QCheckBox $AuthorizeFlagControl
	 * property-read QLabel $AuthorizeFlagLabel
	 * property QTextBox $CardHolderNameControl
	 * property-read QLabel $CardHolderNameLabel
	 * property QTextBox $Address1Control
	 * property-read QLabel $Address1Label
	 * property QTextBox $Address2Control
	 * property-read QLabel $Address2Label
	 * property QTextBox $CityControl
	 * property-read QLabel $CityLabel
	 * property QTextBox $StateControl
	 * property-read QLabel $StateLabel
	 * property QTextBox $ZipControl
	 * property-read QLabel $ZipLabel
	 * property QListBox $CreditCardTypeIdControl
	 * property-read QLabel $CreditCardTypeIdLabel
	 * property QTextBox $AccountNumberControl
	 * property-read QLabel $AccountNumberLabel
	 * property QTextBox $ExpirationDateControl
	 * property-read QLabel $ExpirationDateLabel
	 * property QTextBox $SecurityCodeControl
	 * property-read QLabel $SecurityCodeLabel
	 * property QListBox $RecurringDonationAsRecurringPaymentControl
	 * property-read QLabel $RecurringDonationAsRecurringPaymentLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class RecurringPaymentsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var RecurringPayments objRecurringPayments
		 * @access protected
		 */
		protected $objRecurringPayments;

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

		// Controls that allow the editing of RecurringPayments's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QListBox lstPaymentPeriod;
         * @access protected
         */
		protected $lstPaymentPeriod;

        /**
         * @var QFloatTextBox txtAmount;
         * @access protected
         */
		protected $txtAmount;

        /**
         * @var QDateTimePicker calStartDate;
         * @access protected
         */
		protected $calStartDate;

        /**
         * @var QDateTimePicker calEndDate;
         * @access protected
         */
		protected $calEndDate;

        /**
         * @var QCheckBox chkAuthorizeFlag;
         * @access protected
         */
		protected $chkAuthorizeFlag;

        /**
         * @var QTextBox txtCardHolderName;
         * @access protected
         */
		protected $txtCardHolderName;

        /**
         * @var QTextBox txtAddress1;
         * @access protected
         */
		protected $txtAddress1;

        /**
         * @var QTextBox txtAddress2;
         * @access protected
         */
		protected $txtAddress2;

        /**
         * @var QTextBox txtCity;
         * @access protected
         */
		protected $txtCity;

        /**
         * @var QTextBox txtState;
         * @access protected
         */
		protected $txtState;

        /**
         * @var QTextBox txtZip;
         * @access protected
         */
		protected $txtZip;

        /**
         * @var QListBox lstCreditCardType;
         * @access protected
         */
		protected $lstCreditCardType;

        /**
         * @var QTextBox txtAccountNumber;
         * @access protected
         */
		protected $txtAccountNumber;

        /**
         * @var QTextBox txtExpirationDate;
         * @access protected
         */
		protected $txtExpirationDate;

        /**
         * @var QTextBox txtSecurityCode;
         * @access protected
         */
		protected $txtSecurityCode;


		// Controls that allow the viewing of RecurringPayments's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblPaymentPeriodId
         * @access protected
         */
		protected $lblPaymentPeriodId;

        /**
         * @var QLabel lblAmount
         * @access protected
         */
		protected $lblAmount;

        /**
         * @var QLabel lblStartDate
         * @access protected
         */
		protected $lblStartDate;

        /**
         * @var QLabel lblEndDate
         * @access protected
         */
		protected $lblEndDate;

        /**
         * @var QLabel lblAuthorizeFlag
         * @access protected
         */
		protected $lblAuthorizeFlag;

        /**
         * @var QLabel lblCardHolderName
         * @access protected
         */
		protected $lblCardHolderName;

        /**
         * @var QLabel lblAddress1
         * @access protected
         */
		protected $lblAddress1;

        /**
         * @var QLabel lblAddress2
         * @access protected
         */
		protected $lblAddress2;

        /**
         * @var QLabel lblCity
         * @access protected
         */
		protected $lblCity;

        /**
         * @var QLabel lblState
         * @access protected
         */
		protected $lblState;

        /**
         * @var QLabel lblZip
         * @access protected
         */
		protected $lblZip;

        /**
         * @var QLabel lblCreditCardTypeId
         * @access protected
         */
		protected $lblCreditCardTypeId;

        /**
         * @var QLabel lblAccountNumber
         * @access protected
         */
		protected $lblAccountNumber;

        /**
         * @var QLabel lblExpirationDate
         * @access protected
         */
		protected $lblExpirationDate;

        /**
         * @var QLabel lblSecurityCode
         * @access protected
         */
		protected $lblSecurityCode;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
        /**
         * @var QListBox lstRecurringDonationAsRecurringPayment
         * @access protected
         */
		protected $lstRecurringDonationAsRecurringPayment;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
        /**
         * @var QLabel lblRecurringDonationAsRecurringPayment
         * @access protected
         */
		protected $lblRecurringDonationAsRecurringPayment;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * RecurringPaymentsMetaControl to edit a single RecurringPayments object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single RecurringPayments object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecurringPaymentsMetaControl
		 * @param RecurringPayments $objRecurringPayments new or existing RecurringPayments object
		 */
		 public function __construct($objParentObject, RecurringPayments $objRecurringPayments) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RecurringPaymentsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked RecurringPayments object
			$this->objRecurringPayments = $objRecurringPayments;

			// Figure out if we're Editing or Creating New
			if ($this->objRecurringPayments->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecurringPaymentsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing RecurringPayments object creation - defaults to CreateOrEdit
 		 * @return RecurringPaymentsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objRecurringPayments = RecurringPayments::Load($intId);

				// RecurringPayments was found -- return it!
				if ($objRecurringPayments)
					return new RecurringPaymentsMetaControl($objParentObject, $objRecurringPayments);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a RecurringPayments object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RecurringPaymentsMetaControl($objParentObject, new RecurringPayments());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecurringPaymentsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RecurringPayments object creation - defaults to CreateOrEdit
		 * @return RecurringPaymentsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return RecurringPaymentsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecurringPaymentsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing RecurringPayments object creation - defaults to CreateOrEdit
		 * @return RecurringPaymentsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return RecurringPaymentsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objRecurringPayments->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objRecurringPayments->Name;
			$this->txtName->MaxLength = RecurringPayments::NameMaxLength;
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
			$this->lblName->Text = $this->objRecurringPayments->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstPaymentPeriod
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPaymentPeriod_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPaymentPeriod = new QListBox($this->objParentObject, $strControlId);
			$this->lstPaymentPeriod->Name = QApplication::Translate('Payment Period');
			$this->lstPaymentPeriod->Required = true;
			if (!$this->blnEditMode)
				$this->lstPaymentPeriod->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPaymentPeriodCursor = PaymentPeriod::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPaymentPeriod = PaymentPeriod::InstantiateCursor($objPaymentPeriodCursor)) {
				$objListItem = new QListItem($objPaymentPeriod->__toString(), $objPaymentPeriod->Id);
				if (($this->objRecurringPayments->PaymentPeriod) && ($this->objRecurringPayments->PaymentPeriod->Id == $objPaymentPeriod->Id))
					$objListItem->Selected = true;
				$this->lstPaymentPeriod->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPaymentPeriod;
		}

		/**
		 * Create and setup QLabel lblPaymentPeriodId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPaymentPeriodId_Create($strControlId = null) {
			$this->lblPaymentPeriodId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPaymentPeriodId->Name = QApplication::Translate('Payment Period');
			$this->lblPaymentPeriodId->Text = ($this->objRecurringPayments->PaymentPeriod) ? $this->objRecurringPayments->PaymentPeriod->__toString() : null;
			$this->lblPaymentPeriodId->Required = true;
			return $this->lblPaymentPeriodId;
		}

		/**
		 * Create and setup QFloatTextBox txtAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmount_Create($strControlId = null) {
			$this->txtAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmount->Name = QApplication::Translate('Amount');
			$this->txtAmount->Text = $this->objRecurringPayments->Amount;
			return $this->txtAmount;
		}

		/**
		 * Create and setup QLabel lblAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmount->Name = QApplication::Translate('Amount');
			$this->lblAmount->Text = $this->objRecurringPayments->Amount;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
		}

		/**
		 * Create and setup QDateTimePicker calStartDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calStartDate_Create($strControlId = null) {
			$this->calStartDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calStartDate->Name = QApplication::Translate('Start Date');
			$this->calStartDate->DateTime = $this->objRecurringPayments->StartDate;
			$this->calStartDate->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calStartDate;
		}

		/**
		 * Create and setup QLabel lblStartDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblStartDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblStartDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblStartDate->Name = QApplication::Translate('Start Date');
			$this->strStartDateDateTimeFormat = $strDateTimeFormat;
			$this->lblStartDate->Text = sprintf($this->objRecurringPayments->StartDate) ? $this->objRecurringPayments->StartDate->__toString($this->strStartDateDateTimeFormat) : null;
			return $this->lblStartDate;
		}

		protected $strStartDateDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calEndDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calEndDate_Create($strControlId = null) {
			$this->calEndDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calEndDate->Name = QApplication::Translate('End Date');
			$this->calEndDate->DateTime = $this->objRecurringPayments->EndDate;
			$this->calEndDate->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calEndDate;
		}

		/**
		 * Create and setup QLabel lblEndDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblEndDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblEndDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblEndDate->Name = QApplication::Translate('End Date');
			$this->strEndDateDateTimeFormat = $strDateTimeFormat;
			$this->lblEndDate->Text = sprintf($this->objRecurringPayments->EndDate) ? $this->objRecurringPayments->EndDate->__toString($this->strEndDateDateTimeFormat) : null;
			return $this->lblEndDate;
		}

		protected $strEndDateDateTimeFormat;

		/**
		 * Create and setup QCheckBox chkAuthorizeFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkAuthorizeFlag_Create($strControlId = null) {
			$this->chkAuthorizeFlag = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkAuthorizeFlag->Name = QApplication::Translate('Authorize Flag');
			$this->chkAuthorizeFlag->Checked = $this->objRecurringPayments->AuthorizeFlag;
			return $this->chkAuthorizeFlag;
		}

		/**
		 * Create and setup QLabel lblAuthorizeFlag
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAuthorizeFlag_Create($strControlId = null) {
			$this->lblAuthorizeFlag = new QLabel($this->objParentObject, $strControlId);
			$this->lblAuthorizeFlag->Name = QApplication::Translate('Authorize Flag');
			$this->lblAuthorizeFlag->Text = ($this->objRecurringPayments->AuthorizeFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblAuthorizeFlag;
		}

		/**
		 * Create and setup QTextBox txtCardHolderName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCardHolderName_Create($strControlId = null) {
			$this->txtCardHolderName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCardHolderName->Name = QApplication::Translate('Card Holder Name');
			$this->txtCardHolderName->Text = $this->objRecurringPayments->CardHolderName;
			$this->txtCardHolderName->MaxLength = RecurringPayments::CardHolderNameMaxLength;
			return $this->txtCardHolderName;
		}

		/**
		 * Create and setup QLabel lblCardHolderName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCardHolderName_Create($strControlId = null) {
			$this->lblCardHolderName = new QLabel($this->objParentObject, $strControlId);
			$this->lblCardHolderName->Name = QApplication::Translate('Card Holder Name');
			$this->lblCardHolderName->Text = $this->objRecurringPayments->CardHolderName;
			return $this->lblCardHolderName;
		}

		/**
		 * Create and setup QTextBox txtAddress1
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress1_Create($strControlId = null) {
			$this->txtAddress1 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress1->Name = QApplication::Translate('Address 1');
			$this->txtAddress1->Text = $this->objRecurringPayments->Address1;
			$this->txtAddress1->MaxLength = RecurringPayments::Address1MaxLength;
			return $this->txtAddress1;
		}

		/**
		 * Create and setup QLabel lblAddress1
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress1_Create($strControlId = null) {
			$this->lblAddress1 = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress1->Name = QApplication::Translate('Address 1');
			$this->lblAddress1->Text = $this->objRecurringPayments->Address1;
			return $this->lblAddress1;
		}

		/**
		 * Create and setup QTextBox txtAddress2
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress2_Create($strControlId = null) {
			$this->txtAddress2 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress2->Name = QApplication::Translate('Address 2');
			$this->txtAddress2->Text = $this->objRecurringPayments->Address2;
			$this->txtAddress2->MaxLength = RecurringPayments::Address2MaxLength;
			return $this->txtAddress2;
		}

		/**
		 * Create and setup QLabel lblAddress2
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress2_Create($strControlId = null) {
			$this->lblAddress2 = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress2->Name = QApplication::Translate('Address 2');
			$this->lblAddress2->Text = $this->objRecurringPayments->Address2;
			return $this->lblAddress2;
		}

		/**
		 * Create and setup QTextBox txtCity
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCity_Create($strControlId = null) {
			$this->txtCity = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCity->Name = QApplication::Translate('City');
			$this->txtCity->Text = $this->objRecurringPayments->City;
			$this->txtCity->MaxLength = RecurringPayments::CityMaxLength;
			return $this->txtCity;
		}

		/**
		 * Create and setup QLabel lblCity
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCity_Create($strControlId = null) {
			$this->lblCity = new QLabel($this->objParentObject, $strControlId);
			$this->lblCity->Name = QApplication::Translate('City');
			$this->lblCity->Text = $this->objRecurringPayments->City;
			return $this->lblCity;
		}

		/**
		 * Create and setup QTextBox txtState
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtState_Create($strControlId = null) {
			$this->txtState = new QTextBox($this->objParentObject, $strControlId);
			$this->txtState->Name = QApplication::Translate('State');
			$this->txtState->Text = $this->objRecurringPayments->State;
			$this->txtState->MaxLength = RecurringPayments::StateMaxLength;
			return $this->txtState;
		}

		/**
		 * Create and setup QLabel lblState
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblState_Create($strControlId = null) {
			$this->lblState = new QLabel($this->objParentObject, $strControlId);
			$this->lblState->Name = QApplication::Translate('State');
			$this->lblState->Text = $this->objRecurringPayments->State;
			return $this->lblState;
		}

		/**
		 * Create and setup QTextBox txtZip
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtZip_Create($strControlId = null) {
			$this->txtZip = new QTextBox($this->objParentObject, $strControlId);
			$this->txtZip->Name = QApplication::Translate('Zip');
			$this->txtZip->Text = $this->objRecurringPayments->Zip;
			$this->txtZip->MaxLength = RecurringPayments::ZipMaxLength;
			return $this->txtZip;
		}

		/**
		 * Create and setup QLabel lblZip
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblZip_Create($strControlId = null) {
			$this->lblZip = new QLabel($this->objParentObject, $strControlId);
			$this->lblZip->Name = QApplication::Translate('Zip');
			$this->lblZip->Text = $this->objRecurringPayments->Zip;
			return $this->lblZip;
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

			$this->lstCreditCardType->AddItems(CreditCardType::$NameArray, $this->objRecurringPayments->CreditCardTypeId);
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
			$this->lblCreditCardTypeId->Text = ($this->objRecurringPayments->CreditCardTypeId) ? CreditCardType::$NameArray[$this->objRecurringPayments->CreditCardTypeId] : null;
			$this->lblCreditCardTypeId->Required = true;
			return $this->lblCreditCardTypeId;
		}

		/**
		 * Create and setup QTextBox txtAccountNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAccountNumber_Create($strControlId = null) {
			$this->txtAccountNumber = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAccountNumber->Name = QApplication::Translate('Account Number');
			$this->txtAccountNumber->Text = $this->objRecurringPayments->AccountNumber;
			$this->txtAccountNumber->MaxLength = RecurringPayments::AccountNumberMaxLength;
			return $this->txtAccountNumber;
		}

		/**
		 * Create and setup QLabel lblAccountNumber
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAccountNumber_Create($strControlId = null) {
			$this->lblAccountNumber = new QLabel($this->objParentObject, $strControlId);
			$this->lblAccountNumber->Name = QApplication::Translate('Account Number');
			$this->lblAccountNumber->Text = $this->objRecurringPayments->AccountNumber;
			return $this->lblAccountNumber;
		}

		/**
		 * Create and setup QTextBox txtExpirationDate
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtExpirationDate_Create($strControlId = null) {
			$this->txtExpirationDate = new QTextBox($this->objParentObject, $strControlId);
			$this->txtExpirationDate->Name = QApplication::Translate('Expiration Date');
			$this->txtExpirationDate->Text = $this->objRecurringPayments->ExpirationDate;
			$this->txtExpirationDate->MaxLength = RecurringPayments::ExpirationDateMaxLength;
			return $this->txtExpirationDate;
		}

		/**
		 * Create and setup QLabel lblExpirationDate
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblExpirationDate_Create($strControlId = null) {
			$this->lblExpirationDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblExpirationDate->Name = QApplication::Translate('Expiration Date');
			$this->lblExpirationDate->Text = $this->objRecurringPayments->ExpirationDate;
			return $this->lblExpirationDate;
		}

		/**
		 * Create and setup QTextBox txtSecurityCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSecurityCode_Create($strControlId = null) {
			$this->txtSecurityCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSecurityCode->Name = QApplication::Translate('Security Code');
			$this->txtSecurityCode->Text = $this->objRecurringPayments->SecurityCode;
			$this->txtSecurityCode->MaxLength = RecurringPayments::SecurityCodeMaxLength;
			return $this->txtSecurityCode;
		}

		/**
		 * Create and setup QLabel lblSecurityCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSecurityCode_Create($strControlId = null) {
			$this->lblSecurityCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblSecurityCode->Name = QApplication::Translate('Security Code');
			$this->lblSecurityCode->Text = $this->objRecurringPayments->SecurityCode;
			return $this->lblSecurityCode;
		}

		/**
		 * Create and setup QListBox lstRecurringDonationAsRecurringPayment
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstRecurringDonationAsRecurringPayment_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstRecurringDonationAsRecurringPayment = new QListBox($this->objParentObject, $strControlId);
			$this->lstRecurringDonationAsRecurringPayment->Name = QApplication::Translate('Recurring Donation As Recurring Payment');
			$this->lstRecurringDonationAsRecurringPayment->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objRecurringDonationCursor = RecurringDonation::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objRecurringDonation = RecurringDonation::InstantiateCursor($objRecurringDonationCursor)) {
				$objListItem = new QListItem($objRecurringDonation->__toString(), $objRecurringDonation->Id);
				if ($objRecurringDonation->RecurringPaymentId == $this->objRecurringPayments->Id)
					$objListItem->Selected = true;
				$this->lstRecurringDonationAsRecurringPayment->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstRecurringDonationAsRecurringPayment;
		}

		/**
		 * Create and setup QLabel lblRecurringDonationAsRecurringPayment
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRecurringDonationAsRecurringPayment_Create($strControlId = null) {
			$this->lblRecurringDonationAsRecurringPayment = new QLabel($this->objParentObject, $strControlId);
			$this->lblRecurringDonationAsRecurringPayment->Name = QApplication::Translate('Recurring Donation As Recurring Payment');
			$this->lblRecurringDonationAsRecurringPayment->Text = ($this->objRecurringPayments->RecurringDonationAsRecurringPayment) ? $this->objRecurringPayments->RecurringDonationAsRecurringPayment->__toString() : null;
			return $this->lblRecurringDonationAsRecurringPayment;
		}



		/**
		 * Refresh this MetaControl with Data from the local RecurringPayments object.
		 * @param boolean $blnReload reload RecurringPayments from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRecurringPayments->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objRecurringPayments->Id;

			if ($this->txtName) $this->txtName->Text = $this->objRecurringPayments->Name;
			if ($this->lblName) $this->lblName->Text = $this->objRecurringPayments->Name;

			if ($this->lstPaymentPeriod) {
					$this->lstPaymentPeriod->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPaymentPeriod->AddItem(QApplication::Translate('- Select One -'), null);
				$objPaymentPeriodArray = PaymentPeriod::LoadAll();
				if ($objPaymentPeriodArray) foreach ($objPaymentPeriodArray as $objPaymentPeriod) {
					$objListItem = new QListItem($objPaymentPeriod->__toString(), $objPaymentPeriod->Id);
					if (($this->objRecurringPayments->PaymentPeriod) && ($this->objRecurringPayments->PaymentPeriod->Id == $objPaymentPeriod->Id))
						$objListItem->Selected = true;
					$this->lstPaymentPeriod->AddItem($objListItem);
				}
			}
			if ($this->lblPaymentPeriodId) $this->lblPaymentPeriodId->Text = ($this->objRecurringPayments->PaymentPeriod) ? $this->objRecurringPayments->PaymentPeriod->__toString() : null;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objRecurringPayments->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objRecurringPayments->Amount;

			if ($this->calStartDate) $this->calStartDate->DateTime = $this->objRecurringPayments->StartDate;
			if ($this->lblStartDate) $this->lblStartDate->Text = sprintf($this->objRecurringPayments->StartDate) ? $this->objRecurringPayments->__toString($this->strStartDateDateTimeFormat) : null;

			if ($this->calEndDate) $this->calEndDate->DateTime = $this->objRecurringPayments->EndDate;
			if ($this->lblEndDate) $this->lblEndDate->Text = sprintf($this->objRecurringPayments->EndDate) ? $this->objRecurringPayments->__toString($this->strEndDateDateTimeFormat) : null;

			if ($this->chkAuthorizeFlag) $this->chkAuthorizeFlag->Checked = $this->objRecurringPayments->AuthorizeFlag;
			if ($this->lblAuthorizeFlag) $this->lblAuthorizeFlag->Text = ($this->objRecurringPayments->AuthorizeFlag) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->txtCardHolderName) $this->txtCardHolderName->Text = $this->objRecurringPayments->CardHolderName;
			if ($this->lblCardHolderName) $this->lblCardHolderName->Text = $this->objRecurringPayments->CardHolderName;

			if ($this->txtAddress1) $this->txtAddress1->Text = $this->objRecurringPayments->Address1;
			if ($this->lblAddress1) $this->lblAddress1->Text = $this->objRecurringPayments->Address1;

			if ($this->txtAddress2) $this->txtAddress2->Text = $this->objRecurringPayments->Address2;
			if ($this->lblAddress2) $this->lblAddress2->Text = $this->objRecurringPayments->Address2;

			if ($this->txtCity) $this->txtCity->Text = $this->objRecurringPayments->City;
			if ($this->lblCity) $this->lblCity->Text = $this->objRecurringPayments->City;

			if ($this->txtState) $this->txtState->Text = $this->objRecurringPayments->State;
			if ($this->lblState) $this->lblState->Text = $this->objRecurringPayments->State;

			if ($this->txtZip) $this->txtZip->Text = $this->objRecurringPayments->Zip;
			if ($this->lblZip) $this->lblZip->Text = $this->objRecurringPayments->Zip;

			if ($this->lstCreditCardType) $this->lstCreditCardType->SelectedValue = $this->objRecurringPayments->CreditCardTypeId;
			if ($this->lblCreditCardTypeId) $this->lblCreditCardTypeId->Text = ($this->objRecurringPayments->CreditCardTypeId) ? CreditCardType::$NameArray[$this->objRecurringPayments->CreditCardTypeId] : null;

			if ($this->txtAccountNumber) $this->txtAccountNumber->Text = $this->objRecurringPayments->AccountNumber;
			if ($this->lblAccountNumber) $this->lblAccountNumber->Text = $this->objRecurringPayments->AccountNumber;

			if ($this->txtExpirationDate) $this->txtExpirationDate->Text = $this->objRecurringPayments->ExpirationDate;
			if ($this->lblExpirationDate) $this->lblExpirationDate->Text = $this->objRecurringPayments->ExpirationDate;

			if ($this->txtSecurityCode) $this->txtSecurityCode->Text = $this->objRecurringPayments->SecurityCode;
			if ($this->lblSecurityCode) $this->lblSecurityCode->Text = $this->objRecurringPayments->SecurityCode;

			if ($this->lstRecurringDonationAsRecurringPayment) {
				$this->lstRecurringDonationAsRecurringPayment->RemoveAllItems();
				$this->lstRecurringDonationAsRecurringPayment->AddItem(QApplication::Translate('- Select One -'), null);
				$objRecurringDonationArray = RecurringDonation::LoadAll();
				if ($objRecurringDonationArray) foreach ($objRecurringDonationArray as $objRecurringDonation) {
					$objListItem = new QListItem($objRecurringDonation->__toString(), $objRecurringDonation->Id);
					if ($objRecurringDonation->RecurringPaymentId == $this->objRecurringPayments->Id)
						$objListItem->Selected = true;
					$this->lstRecurringDonationAsRecurringPayment->AddItem($objListItem);
				}
			}
			if ($this->lblRecurringDonationAsRecurringPayment) $this->lblRecurringDonationAsRecurringPayment->Text = ($this->objRecurringPayments->RecurringDonationAsRecurringPayment) ? $this->objRecurringPayments->RecurringDonationAsRecurringPayment->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC RECURRINGPAYMENTS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's RecurringPayments instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRecurringPayments() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objRecurringPayments->Name = $this->txtName->Text;
				if ($this->lstPaymentPeriod) $this->objRecurringPayments->PaymentPeriodId = $this->lstPaymentPeriod->SelectedValue;
				if ($this->txtAmount) $this->objRecurringPayments->Amount = $this->txtAmount->Text;
				if ($this->calStartDate) $this->objRecurringPayments->StartDate = $this->calStartDate->DateTime;
				if ($this->calEndDate) $this->objRecurringPayments->EndDate = $this->calEndDate->DateTime;
				if ($this->chkAuthorizeFlag) $this->objRecurringPayments->AuthorizeFlag = $this->chkAuthorizeFlag->Checked;
				if ($this->txtCardHolderName) $this->objRecurringPayments->CardHolderName = $this->txtCardHolderName->Text;
				if ($this->txtAddress1) $this->objRecurringPayments->Address1 = $this->txtAddress1->Text;
				if ($this->txtAddress2) $this->objRecurringPayments->Address2 = $this->txtAddress2->Text;
				if ($this->txtCity) $this->objRecurringPayments->City = $this->txtCity->Text;
				if ($this->txtState) $this->objRecurringPayments->State = $this->txtState->Text;
				if ($this->txtZip) $this->objRecurringPayments->Zip = $this->txtZip->Text;
				if ($this->lstCreditCardType) $this->objRecurringPayments->CreditCardTypeId = $this->lstCreditCardType->SelectedValue;
				if ($this->txtAccountNumber) $this->objRecurringPayments->AccountNumber = $this->txtAccountNumber->Text;
				if ($this->txtExpirationDate) $this->objRecurringPayments->ExpirationDate = $this->txtExpirationDate->Text;
				if ($this->txtSecurityCode) $this->objRecurringPayments->SecurityCode = $this->txtSecurityCode->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it
				if ($this->lstRecurringDonationAsRecurringPayment) $this->objRecurringPayments->RecurringDonationAsRecurringPayment = RecurringDonation::Load($this->lstRecurringDonationAsRecurringPayment->SelectedValue);

				// Save the RecurringPayments object
				$this->objRecurringPayments->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's RecurringPayments instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRecurringPayments() {
			$this->objRecurringPayments->Delete();
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
				case 'RecurringPayments': return $this->objRecurringPayments;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to RecurringPayments fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'PaymentPeriodIdControl':
					if (!$this->lstPaymentPeriod) return $this->lstPaymentPeriod_Create();
					return $this->lstPaymentPeriod;
				case 'PaymentPeriodIdLabel':
					if (!$this->lblPaymentPeriodId) return $this->lblPaymentPeriodId_Create();
					return $this->lblPaymentPeriodId;
				case 'AmountControl':
					if (!$this->txtAmount) return $this->txtAmount_Create();
					return $this->txtAmount;
				case 'AmountLabel':
					if (!$this->lblAmount) return $this->lblAmount_Create();
					return $this->lblAmount;
				case 'StartDateControl':
					if (!$this->calStartDate) return $this->calStartDate_Create();
					return $this->calStartDate;
				case 'StartDateLabel':
					if (!$this->lblStartDate) return $this->lblStartDate_Create();
					return $this->lblStartDate;
				case 'EndDateControl':
					if (!$this->calEndDate) return $this->calEndDate_Create();
					return $this->calEndDate;
				case 'EndDateLabel':
					if (!$this->lblEndDate) return $this->lblEndDate_Create();
					return $this->lblEndDate;
				case 'AuthorizeFlagControl':
					if (!$this->chkAuthorizeFlag) return $this->chkAuthorizeFlag_Create();
					return $this->chkAuthorizeFlag;
				case 'AuthorizeFlagLabel':
					if (!$this->lblAuthorizeFlag) return $this->lblAuthorizeFlag_Create();
					return $this->lblAuthorizeFlag;
				case 'CardHolderNameControl':
					if (!$this->txtCardHolderName) return $this->txtCardHolderName_Create();
					return $this->txtCardHolderName;
				case 'CardHolderNameLabel':
					if (!$this->lblCardHolderName) return $this->lblCardHolderName_Create();
					return $this->lblCardHolderName;
				case 'Address1Control':
					if (!$this->txtAddress1) return $this->txtAddress1_Create();
					return $this->txtAddress1;
				case 'Address1Label':
					if (!$this->lblAddress1) return $this->lblAddress1_Create();
					return $this->lblAddress1;
				case 'Address2Control':
					if (!$this->txtAddress2) return $this->txtAddress2_Create();
					return $this->txtAddress2;
				case 'Address2Label':
					if (!$this->lblAddress2) return $this->lblAddress2_Create();
					return $this->lblAddress2;
				case 'CityControl':
					if (!$this->txtCity) return $this->txtCity_Create();
					return $this->txtCity;
				case 'CityLabel':
					if (!$this->lblCity) return $this->lblCity_Create();
					return $this->lblCity;
				case 'StateControl':
					if (!$this->txtState) return $this->txtState_Create();
					return $this->txtState;
				case 'StateLabel':
					if (!$this->lblState) return $this->lblState_Create();
					return $this->lblState;
				case 'ZipControl':
					if (!$this->txtZip) return $this->txtZip_Create();
					return $this->txtZip;
				case 'ZipLabel':
					if (!$this->lblZip) return $this->lblZip_Create();
					return $this->lblZip;
				case 'CreditCardTypeIdControl':
					if (!$this->lstCreditCardType) return $this->lstCreditCardType_Create();
					return $this->lstCreditCardType;
				case 'CreditCardTypeIdLabel':
					if (!$this->lblCreditCardTypeId) return $this->lblCreditCardTypeId_Create();
					return $this->lblCreditCardTypeId;
				case 'AccountNumberControl':
					if (!$this->txtAccountNumber) return $this->txtAccountNumber_Create();
					return $this->txtAccountNumber;
				case 'AccountNumberLabel':
					if (!$this->lblAccountNumber) return $this->lblAccountNumber_Create();
					return $this->lblAccountNumber;
				case 'ExpirationDateControl':
					if (!$this->txtExpirationDate) return $this->txtExpirationDate_Create();
					return $this->txtExpirationDate;
				case 'ExpirationDateLabel':
					if (!$this->lblExpirationDate) return $this->lblExpirationDate_Create();
					return $this->lblExpirationDate;
				case 'SecurityCodeControl':
					if (!$this->txtSecurityCode) return $this->txtSecurityCode_Create();
					return $this->txtSecurityCode;
				case 'SecurityCodeLabel':
					if (!$this->lblSecurityCode) return $this->lblSecurityCode_Create();
					return $this->lblSecurityCode;
				case 'RecurringDonationAsRecurringPaymentControl':
					if (!$this->lstRecurringDonationAsRecurringPayment) return $this->lstRecurringDonationAsRecurringPayment_Create();
					return $this->lstRecurringDonationAsRecurringPayment;
				case 'RecurringDonationAsRecurringPaymentLabel':
					if (!$this->lblRecurringDonationAsRecurringPayment) return $this->lblRecurringDonationAsRecurringPayment_Create();
					return $this->lblRecurringDonationAsRecurringPayment;
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
					// Controls that point to RecurringPayments fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'PaymentPeriodIdControl':
						return ($this->lstPaymentPeriod = QType::Cast($mixValue, 'QControl'));
					case 'AmountControl':
						return ($this->txtAmount = QType::Cast($mixValue, 'QControl'));
					case 'StartDateControl':
						return ($this->calStartDate = QType::Cast($mixValue, 'QControl'));
					case 'EndDateControl':
						return ($this->calEndDate = QType::Cast($mixValue, 'QControl'));
					case 'AuthorizeFlagControl':
						return ($this->chkAuthorizeFlag = QType::Cast($mixValue, 'QControl'));
					case 'CardHolderNameControl':
						return ($this->txtCardHolderName = QType::Cast($mixValue, 'QControl'));
					case 'Address1Control':
						return ($this->txtAddress1 = QType::Cast($mixValue, 'QControl'));
					case 'Address2Control':
						return ($this->txtAddress2 = QType::Cast($mixValue, 'QControl'));
					case 'CityControl':
						return ($this->txtCity = QType::Cast($mixValue, 'QControl'));
					case 'StateControl':
						return ($this->txtState = QType::Cast($mixValue, 'QControl'));
					case 'ZipControl':
						return ($this->txtZip = QType::Cast($mixValue, 'QControl'));
					case 'CreditCardTypeIdControl':
						return ($this->lstCreditCardType = QType::Cast($mixValue, 'QControl'));
					case 'AccountNumberControl':
						return ($this->txtAccountNumber = QType::Cast($mixValue, 'QControl'));
					case 'ExpirationDateControl':
						return ($this->txtExpirationDate = QType::Cast($mixValue, 'QControl'));
					case 'SecurityCodeControl':
						return ($this->txtSecurityCode = QType::Cast($mixValue, 'QControl'));
					case 'RecurringDonationAsRecurringPaymentControl':
						return ($this->lstRecurringDonationAsRecurringPayment = QType::Cast($mixValue, 'QControl'));
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