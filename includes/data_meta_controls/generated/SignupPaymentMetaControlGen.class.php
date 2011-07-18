<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the SignupPayment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single SignupPayment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SignupPaymentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read SignupPayment $SignupPayment the actual SignupPayment data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $SignupEntryIdControl
	 * property-read QLabel $SignupEntryIdLabel
	 * property QListBox $SignupPaymentTypeIdControl
	 * property-read QLabel $SignupPaymentTypeIdLabel
	 * property QDateTimePicker $TransactionDateControl
	 * property-read QLabel $TransactionDateLabel
	 * property QTextBox $TransactionDescriptionControl
	 * property-read QLabel $TransactionDescriptionLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property QListBox $StewardshipFundIdControl
	 * property-read QLabel $StewardshipFundIdLabel
	 * property QListBox $DonationStewardshipFundIdControl
	 * property-read QLabel $DonationStewardshipFundIdLabel
	 * property QFloatTextBox $AmountDonationControl
	 * property-read QLabel $AmountDonationLabel
	 * property QFloatTextBox $AmountNonDonationControl
	 * property-read QLabel $AmountNonDonationLabel
	 * property QListBox $CreditCardPaymentIdControl
	 * property-read QLabel $CreditCardPaymentIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class SignupPaymentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var SignupPayment objSignupPayment
		 * @access protected
		 */
		protected $objSignupPayment;

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

		// Controls that allow the editing of SignupPayment's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstSignupEntry;
         * @access protected
         */
		protected $lstSignupEntry;

        /**
         * @var QListBox lstSignupPaymentType;
         * @access protected
         */
		protected $lstSignupPaymentType;

        /**
         * @var QDateTimePicker calTransactionDate;
         * @access protected
         */
		protected $calTransactionDate;

        /**
         * @var QTextBox txtTransactionDescription;
         * @access protected
         */
		protected $txtTransactionDescription;

        /**
         * @var QFloatTextBox txtAmount;
         * @access protected
         */
		protected $txtAmount;

        /**
         * @var QListBox lstStewardshipFund;
         * @access protected
         */
		protected $lstStewardshipFund;

        /**
         * @var QListBox lstDonationStewardshipFund;
         * @access protected
         */
		protected $lstDonationStewardshipFund;

        /**
         * @var QFloatTextBox txtAmountDonation;
         * @access protected
         */
		protected $txtAmountDonation;

        /**
         * @var QFloatTextBox txtAmountNonDonation;
         * @access protected
         */
		protected $txtAmountNonDonation;

        /**
         * @var QListBox lstCreditCardPayment;
         * @access protected
         */
		protected $lstCreditCardPayment;


		// Controls that allow the viewing of SignupPayment's individual data fields
        /**
         * @var QLabel lblSignupEntryId
         * @access protected
         */
		protected $lblSignupEntryId;

        /**
         * @var QLabel lblSignupPaymentTypeId
         * @access protected
         */
		protected $lblSignupPaymentTypeId;

        /**
         * @var QLabel lblTransactionDate
         * @access protected
         */
		protected $lblTransactionDate;

        /**
         * @var QLabel lblTransactionDescription
         * @access protected
         */
		protected $lblTransactionDescription;

        /**
         * @var QLabel lblAmount
         * @access protected
         */
		protected $lblAmount;

        /**
         * @var QLabel lblStewardshipFundId
         * @access protected
         */
		protected $lblStewardshipFundId;

        /**
         * @var QLabel lblDonationStewardshipFundId
         * @access protected
         */
		protected $lblDonationStewardshipFundId;

        /**
         * @var QLabel lblAmountDonation
         * @access protected
         */
		protected $lblAmountDonation;

        /**
         * @var QLabel lblAmountNonDonation
         * @access protected
         */
		protected $lblAmountNonDonation;

        /**
         * @var QLabel lblCreditCardPaymentId
         * @access protected
         */
		protected $lblCreditCardPaymentId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * SignupPaymentMetaControl to edit a single SignupPayment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single SignupPayment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupPaymentMetaControl
		 * @param SignupPayment $objSignupPayment new or existing SignupPayment object
		 */
		 public function __construct($objParentObject, SignupPayment $objSignupPayment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this SignupPaymentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked SignupPayment object
			$this->objSignupPayment = $objSignupPayment;

			// Figure out if we're Editing or Creating New
			if ($this->objSignupPayment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupPaymentMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing SignupPayment object creation - defaults to CreateOrEdit
 		 * @return SignupPaymentMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objSignupPayment = SignupPayment::Load($intId);

				// SignupPayment was found -- return it!
				if ($objSignupPayment)
					return new SignupPaymentMetaControl($objParentObject, $objSignupPayment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a SignupPayment object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new SignupPaymentMetaControl($objParentObject, new SignupPayment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupPaymentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SignupPayment object creation - defaults to CreateOrEdit
		 * @return SignupPaymentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return SignupPaymentMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SignupPaymentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SignupPayment object creation - defaults to CreateOrEdit
		 * @return SignupPaymentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return SignupPaymentMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objSignupPayment->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstSignupEntry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSignupEntry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSignupEntry = new QListBox($this->objParentObject, $strControlId);
			$this->lstSignupEntry->Name = QApplication::Translate('Signup Entry');
			$this->lstSignupEntry->Required = true;
			if (!$this->blnEditMode)
				$this->lstSignupEntry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSignupEntryCursor = SignupEntry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSignupEntry = SignupEntry::InstantiateCursor($objSignupEntryCursor)) {
				$objListItem = new QListItem($objSignupEntry->__toString(), $objSignupEntry->Id);
				if (($this->objSignupPayment->SignupEntry) && ($this->objSignupPayment->SignupEntry->Id == $objSignupEntry->Id))
					$objListItem->Selected = true;
				$this->lstSignupEntry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstSignupEntry;
		}

		/**
		 * Create and setup QLabel lblSignupEntryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSignupEntryId_Create($strControlId = null) {
			$this->lblSignupEntryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupEntryId->Name = QApplication::Translate('Signup Entry');
			$this->lblSignupEntryId->Text = ($this->objSignupPayment->SignupEntry) ? $this->objSignupPayment->SignupEntry->__toString() : null;
			$this->lblSignupEntryId->Required = true;
			return $this->lblSignupEntryId;
		}

		/**
		 * Create and setup QListBox lstSignupPaymentType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstSignupPaymentType_Create($strControlId = null) {
			$this->lstSignupPaymentType = new QListBox($this->objParentObject, $strControlId);
			$this->lstSignupPaymentType->Name = QApplication::Translate('Signup Payment Type');
			$this->lstSignupPaymentType->Required = true;
			foreach (SignupPaymentType::$NameArray as $intId => $strValue)
				$this->lstSignupPaymentType->AddItem(new QListItem($strValue, $intId, $this->objSignupPayment->SignupPaymentTypeId == $intId));
			return $this->lstSignupPaymentType;
		}

		/**
		 * Create and setup QLabel lblSignupPaymentTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSignupPaymentTypeId_Create($strControlId = null) {
			$this->lblSignupPaymentTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblSignupPaymentTypeId->Name = QApplication::Translate('Signup Payment Type');
			$this->lblSignupPaymentTypeId->Text = ($this->objSignupPayment->SignupPaymentTypeId) ? SignupPaymentType::$NameArray[$this->objSignupPayment->SignupPaymentTypeId] : null;
			$this->lblSignupPaymentTypeId->Required = true;
			return $this->lblSignupPaymentTypeId;
		}

		/**
		 * Create and setup QDateTimePicker calTransactionDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calTransactionDate_Create($strControlId = null) {
			$this->calTransactionDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calTransactionDate->Name = QApplication::Translate('Transaction Date');
			$this->calTransactionDate->DateTime = $this->objSignupPayment->TransactionDate;
			$this->calTransactionDate->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calTransactionDate;
		}

		/**
		 * Create and setup QLabel lblTransactionDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblTransactionDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblTransactionDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblTransactionDate->Name = QApplication::Translate('Transaction Date');
			$this->strTransactionDateDateTimeFormat = $strDateTimeFormat;
			$this->lblTransactionDate->Text = sprintf($this->objSignupPayment->TransactionDate) ? $this->objSignupPayment->TransactionDate->__toString($this->strTransactionDateDateTimeFormat) : null;
			return $this->lblTransactionDate;
		}

		protected $strTransactionDateDateTimeFormat;

		/**
		 * Create and setup QTextBox txtTransactionDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTransactionDescription_Create($strControlId = null) {
			$this->txtTransactionDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTransactionDescription->Name = QApplication::Translate('Transaction Description');
			$this->txtTransactionDescription->Text = $this->objSignupPayment->TransactionDescription;
			$this->txtTransactionDescription->MaxLength = SignupPayment::TransactionDescriptionMaxLength;
			return $this->txtTransactionDescription;
		}

		/**
		 * Create and setup QLabel lblTransactionDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTransactionDescription_Create($strControlId = null) {
			$this->lblTransactionDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblTransactionDescription->Name = QApplication::Translate('Transaction Description');
			$this->lblTransactionDescription->Text = $this->objSignupPayment->TransactionDescription;
			return $this->lblTransactionDescription;
		}

		/**
		 * Create and setup QFloatTextBox txtAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmount_Create($strControlId = null) {
			$this->txtAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmount->Name = QApplication::Translate('Amount');
			$this->txtAmount->Text = $this->objSignupPayment->Amount;
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
			$this->lblAmount->Text = $this->objSignupPayment->Amount;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
		}

		/**
		 * Create and setup QListBox lstStewardshipFund
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStewardshipFund_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStewardshipFund = new QListBox($this->objParentObject, $strControlId);
			$this->lstStewardshipFund->Name = QApplication::Translate('Stewardship Fund');
			$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStewardshipFundCursor = StewardshipFund::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStewardshipFund = StewardshipFund::InstantiateCursor($objStewardshipFundCursor)) {
				$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
				if (($this->objSignupPayment->StewardshipFund) && ($this->objSignupPayment->StewardshipFund->Id == $objStewardshipFund->Id))
					$objListItem->Selected = true;
				$this->lstStewardshipFund->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstStewardshipFund;
		}

		/**
		 * Create and setup QLabel lblStewardshipFundId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStewardshipFundId_Create($strControlId = null) {
			$this->lblStewardshipFundId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStewardshipFundId->Name = QApplication::Translate('Stewardship Fund');
			$this->lblStewardshipFundId->Text = ($this->objSignupPayment->StewardshipFund) ? $this->objSignupPayment->StewardshipFund->__toString() : null;
			return $this->lblStewardshipFundId;
		}

		/**
		 * Create and setup QListBox lstDonationStewardshipFund
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstDonationStewardshipFund_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstDonationStewardshipFund = new QListBox($this->objParentObject, $strControlId);
			$this->lstDonationStewardshipFund->Name = QApplication::Translate('Donation Stewardship Fund');
			$this->lstDonationStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objDonationStewardshipFundCursor = StewardshipFund::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objDonationStewardshipFund = StewardshipFund::InstantiateCursor($objDonationStewardshipFundCursor)) {
				$objListItem = new QListItem($objDonationStewardshipFund->__toString(), $objDonationStewardshipFund->Id);
				if (($this->objSignupPayment->DonationStewardshipFund) && ($this->objSignupPayment->DonationStewardshipFund->Id == $objDonationStewardshipFund->Id))
					$objListItem->Selected = true;
				$this->lstDonationStewardshipFund->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstDonationStewardshipFund;
		}

		/**
		 * Create and setup QLabel lblDonationStewardshipFundId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDonationStewardshipFundId_Create($strControlId = null) {
			$this->lblDonationStewardshipFundId = new QLabel($this->objParentObject, $strControlId);
			$this->lblDonationStewardshipFundId->Name = QApplication::Translate('Donation Stewardship Fund');
			$this->lblDonationStewardshipFundId->Text = ($this->objSignupPayment->DonationStewardshipFund) ? $this->objSignupPayment->DonationStewardshipFund->__toString() : null;
			return $this->lblDonationStewardshipFundId;
		}

		/**
		 * Create and setup QFloatTextBox txtAmountDonation
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmountDonation_Create($strControlId = null) {
			$this->txtAmountDonation = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmountDonation->Name = QApplication::Translate('Amount Donation');
			$this->txtAmountDonation->Text = $this->objSignupPayment->AmountDonation;
			return $this->txtAmountDonation;
		}

		/**
		 * Create and setup QLabel lblAmountDonation
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmountDonation_Create($strControlId = null, $strFormat = null) {
			$this->lblAmountDonation = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmountDonation->Name = QApplication::Translate('Amount Donation');
			$this->lblAmountDonation->Text = $this->objSignupPayment->AmountDonation;
			$this->lblAmountDonation->Format = $strFormat;
			return $this->lblAmountDonation;
		}

		/**
		 * Create and setup QFloatTextBox txtAmountNonDonation
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtAmountNonDonation_Create($strControlId = null) {
			$this->txtAmountNonDonation = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtAmountNonDonation->Name = QApplication::Translate('Amount Non Donation');
			$this->txtAmountNonDonation->Text = $this->objSignupPayment->AmountNonDonation;
			return $this->txtAmountNonDonation;
		}

		/**
		 * Create and setup QLabel lblAmountNonDonation
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmountNonDonation_Create($strControlId = null, $strFormat = null) {
			$this->lblAmountNonDonation = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmountNonDonation->Name = QApplication::Translate('Amount Non Donation');
			$this->lblAmountNonDonation->Text = $this->objSignupPayment->AmountNonDonation;
			$this->lblAmountNonDonation->Format = $strFormat;
			return $this->lblAmountNonDonation;
		}

		/**
		 * Create and setup QListBox lstCreditCardPayment
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCreditCardPayment_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCreditCardPayment = new QListBox($this->objParentObject, $strControlId);
			$this->lstCreditCardPayment->Name = QApplication::Translate('Credit Card Payment');
			$this->lstCreditCardPayment->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCreditCardPaymentCursor = CreditCardPayment::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCreditCardPayment = CreditCardPayment::InstantiateCursor($objCreditCardPaymentCursor)) {
				$objListItem = new QListItem($objCreditCardPayment->__toString(), $objCreditCardPayment->Id);
				if (($this->objSignupPayment->CreditCardPayment) && ($this->objSignupPayment->CreditCardPayment->Id == $objCreditCardPayment->Id))
					$objListItem->Selected = true;
				$this->lstCreditCardPayment->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCreditCardPayment;
		}

		/**
		 * Create and setup QLabel lblCreditCardPaymentId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreditCardPaymentId_Create($strControlId = null) {
			$this->lblCreditCardPaymentId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreditCardPaymentId->Name = QApplication::Translate('Credit Card Payment');
			$this->lblCreditCardPaymentId->Text = ($this->objSignupPayment->CreditCardPayment) ? $this->objSignupPayment->CreditCardPayment->__toString() : null;
			return $this->lblCreditCardPaymentId;
		}



		/**
		 * Refresh this MetaControl with Data from the local SignupPayment object.
		 * @param boolean $blnReload reload SignupPayment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objSignupPayment->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objSignupPayment->Id;

			if ($this->lstSignupEntry) {
					$this->lstSignupEntry->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstSignupEntry->AddItem(QApplication::Translate('- Select One -'), null);
				$objSignupEntryArray = SignupEntry::LoadAll();
				if ($objSignupEntryArray) foreach ($objSignupEntryArray as $objSignupEntry) {
					$objListItem = new QListItem($objSignupEntry->__toString(), $objSignupEntry->Id);
					if (($this->objSignupPayment->SignupEntry) && ($this->objSignupPayment->SignupEntry->Id == $objSignupEntry->Id))
						$objListItem->Selected = true;
					$this->lstSignupEntry->AddItem($objListItem);
				}
			}
			if ($this->lblSignupEntryId) $this->lblSignupEntryId->Text = ($this->objSignupPayment->SignupEntry) ? $this->objSignupPayment->SignupEntry->__toString() : null;

			if ($this->lstSignupPaymentType) $this->lstSignupPaymentType->SelectedValue = $this->objSignupPayment->SignupPaymentTypeId;
			if ($this->lblSignupPaymentTypeId) $this->lblSignupPaymentTypeId->Text = ($this->objSignupPayment->SignupPaymentTypeId) ? SignupPaymentType::$NameArray[$this->objSignupPayment->SignupPaymentTypeId] : null;

			if ($this->calTransactionDate) $this->calTransactionDate->DateTime = $this->objSignupPayment->TransactionDate;
			if ($this->lblTransactionDate) $this->lblTransactionDate->Text = sprintf($this->objSignupPayment->TransactionDate) ? $this->objSignupPayment->__toString($this->strTransactionDateDateTimeFormat) : null;

			if ($this->txtTransactionDescription) $this->txtTransactionDescription->Text = $this->objSignupPayment->TransactionDescription;
			if ($this->lblTransactionDescription) $this->lblTransactionDescription->Text = $this->objSignupPayment->TransactionDescription;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objSignupPayment->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objSignupPayment->Amount;

			if ($this->lstStewardshipFund) {
					$this->lstStewardshipFund->RemoveAllItems();
				$this->lstStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);
				$objStewardshipFundArray = StewardshipFund::LoadAll();
				if ($objStewardshipFundArray) foreach ($objStewardshipFundArray as $objStewardshipFund) {
					$objListItem = new QListItem($objStewardshipFund->__toString(), $objStewardshipFund->Id);
					if (($this->objSignupPayment->StewardshipFund) && ($this->objSignupPayment->StewardshipFund->Id == $objStewardshipFund->Id))
						$objListItem->Selected = true;
					$this->lstStewardshipFund->AddItem($objListItem);
				}
			}
			if ($this->lblStewardshipFundId) $this->lblStewardshipFundId->Text = ($this->objSignupPayment->StewardshipFund) ? $this->objSignupPayment->StewardshipFund->__toString() : null;

			if ($this->lstDonationStewardshipFund) {
					$this->lstDonationStewardshipFund->RemoveAllItems();
				$this->lstDonationStewardshipFund->AddItem(QApplication::Translate('- Select One -'), null);
				$objDonationStewardshipFundArray = StewardshipFund::LoadAll();
				if ($objDonationStewardshipFundArray) foreach ($objDonationStewardshipFundArray as $objDonationStewardshipFund) {
					$objListItem = new QListItem($objDonationStewardshipFund->__toString(), $objDonationStewardshipFund->Id);
					if (($this->objSignupPayment->DonationStewardshipFund) && ($this->objSignupPayment->DonationStewardshipFund->Id == $objDonationStewardshipFund->Id))
						$objListItem->Selected = true;
					$this->lstDonationStewardshipFund->AddItem($objListItem);
				}
			}
			if ($this->lblDonationStewardshipFundId) $this->lblDonationStewardshipFundId->Text = ($this->objSignupPayment->DonationStewardshipFund) ? $this->objSignupPayment->DonationStewardshipFund->__toString() : null;

			if ($this->txtAmountDonation) $this->txtAmountDonation->Text = $this->objSignupPayment->AmountDonation;
			if ($this->lblAmountDonation) $this->lblAmountDonation->Text = $this->objSignupPayment->AmountDonation;

			if ($this->txtAmountNonDonation) $this->txtAmountNonDonation->Text = $this->objSignupPayment->AmountNonDonation;
			if ($this->lblAmountNonDonation) $this->lblAmountNonDonation->Text = $this->objSignupPayment->AmountNonDonation;

			if ($this->lstCreditCardPayment) {
					$this->lstCreditCardPayment->RemoveAllItems();
				$this->lstCreditCardPayment->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreditCardPaymentArray = CreditCardPayment::LoadAll();
				if ($objCreditCardPaymentArray) foreach ($objCreditCardPaymentArray as $objCreditCardPayment) {
					$objListItem = new QListItem($objCreditCardPayment->__toString(), $objCreditCardPayment->Id);
					if (($this->objSignupPayment->CreditCardPayment) && ($this->objSignupPayment->CreditCardPayment->Id == $objCreditCardPayment->Id))
						$objListItem->Selected = true;
					$this->lstCreditCardPayment->AddItem($objListItem);
				}
			}
			if ($this->lblCreditCardPaymentId) $this->lblCreditCardPaymentId->Text = ($this->objSignupPayment->CreditCardPayment) ? $this->objSignupPayment->CreditCardPayment->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SIGNUPPAYMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's SignupPayment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveSignupPayment() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstSignupEntry) $this->objSignupPayment->SignupEntryId = $this->lstSignupEntry->SelectedValue;
				if ($this->lstSignupPaymentType) $this->objSignupPayment->SignupPaymentTypeId = $this->lstSignupPaymentType->SelectedValue;
				if ($this->calTransactionDate) $this->objSignupPayment->TransactionDate = $this->calTransactionDate->DateTime;
				if ($this->txtTransactionDescription) $this->objSignupPayment->TransactionDescription = $this->txtTransactionDescription->Text;
				if ($this->txtAmount) $this->objSignupPayment->Amount = $this->txtAmount->Text;
				if ($this->lstStewardshipFund) $this->objSignupPayment->StewardshipFundId = $this->lstStewardshipFund->SelectedValue;
				if ($this->lstDonationStewardshipFund) $this->objSignupPayment->DonationStewardshipFundId = $this->lstDonationStewardshipFund->SelectedValue;
				if ($this->txtAmountDonation) $this->objSignupPayment->AmountDonation = $this->txtAmountDonation->Text;
				if ($this->txtAmountNonDonation) $this->objSignupPayment->AmountNonDonation = $this->txtAmountNonDonation->Text;
				if ($this->lstCreditCardPayment) $this->objSignupPayment->CreditCardPaymentId = $this->lstCreditCardPayment->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the SignupPayment object
				$this->objSignupPayment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's SignupPayment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteSignupPayment() {
			$this->objSignupPayment->Delete();
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
				case 'SignupPayment': return $this->objSignupPayment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to SignupPayment fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'SignupEntryIdControl':
					if (!$this->lstSignupEntry) return $this->lstSignupEntry_Create();
					return $this->lstSignupEntry;
				case 'SignupEntryIdLabel':
					if (!$this->lblSignupEntryId) return $this->lblSignupEntryId_Create();
					return $this->lblSignupEntryId;
				case 'SignupPaymentTypeIdControl':
					if (!$this->lstSignupPaymentType) return $this->lstSignupPaymentType_Create();
					return $this->lstSignupPaymentType;
				case 'SignupPaymentTypeIdLabel':
					if (!$this->lblSignupPaymentTypeId) return $this->lblSignupPaymentTypeId_Create();
					return $this->lblSignupPaymentTypeId;
				case 'TransactionDateControl':
					if (!$this->calTransactionDate) return $this->calTransactionDate_Create();
					return $this->calTransactionDate;
				case 'TransactionDateLabel':
					if (!$this->lblTransactionDate) return $this->lblTransactionDate_Create();
					return $this->lblTransactionDate;
				case 'TransactionDescriptionControl':
					if (!$this->txtTransactionDescription) return $this->txtTransactionDescription_Create();
					return $this->txtTransactionDescription;
				case 'TransactionDescriptionLabel':
					if (!$this->lblTransactionDescription) return $this->lblTransactionDescription_Create();
					return $this->lblTransactionDescription;
				case 'AmountControl':
					if (!$this->txtAmount) return $this->txtAmount_Create();
					return $this->txtAmount;
				case 'AmountLabel':
					if (!$this->lblAmount) return $this->lblAmount_Create();
					return $this->lblAmount;
				case 'StewardshipFundIdControl':
					if (!$this->lstStewardshipFund) return $this->lstStewardshipFund_Create();
					return $this->lstStewardshipFund;
				case 'StewardshipFundIdLabel':
					if (!$this->lblStewardshipFundId) return $this->lblStewardshipFundId_Create();
					return $this->lblStewardshipFundId;
				case 'DonationStewardshipFundIdControl':
					if (!$this->lstDonationStewardshipFund) return $this->lstDonationStewardshipFund_Create();
					return $this->lstDonationStewardshipFund;
				case 'DonationStewardshipFundIdLabel':
					if (!$this->lblDonationStewardshipFundId) return $this->lblDonationStewardshipFundId_Create();
					return $this->lblDonationStewardshipFundId;
				case 'AmountDonationControl':
					if (!$this->txtAmountDonation) return $this->txtAmountDonation_Create();
					return $this->txtAmountDonation;
				case 'AmountDonationLabel':
					if (!$this->lblAmountDonation) return $this->lblAmountDonation_Create();
					return $this->lblAmountDonation;
				case 'AmountNonDonationControl':
					if (!$this->txtAmountNonDonation) return $this->txtAmountNonDonation_Create();
					return $this->txtAmountNonDonation;
				case 'AmountNonDonationLabel':
					if (!$this->lblAmountNonDonation) return $this->lblAmountNonDonation_Create();
					return $this->lblAmountNonDonation;
				case 'CreditCardPaymentIdControl':
					if (!$this->lstCreditCardPayment) return $this->lstCreditCardPayment_Create();
					return $this->lstCreditCardPayment;
				case 'CreditCardPaymentIdLabel':
					if (!$this->lblCreditCardPaymentId) return $this->lblCreditCardPaymentId_Create();
					return $this->lblCreditCardPaymentId;
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
					// Controls that point to SignupPayment fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'SignupEntryIdControl':
						return ($this->lstSignupEntry = QType::Cast($mixValue, 'QControl'));
					case 'SignupPaymentTypeIdControl':
						return ($this->lstSignupPaymentType = QType::Cast($mixValue, 'QControl'));
					case 'TransactionDateControl':
						return ($this->calTransactionDate = QType::Cast($mixValue, 'QControl'));
					case 'TransactionDescriptionControl':
						return ($this->txtTransactionDescription = QType::Cast($mixValue, 'QControl'));
					case 'AmountControl':
						return ($this->txtAmount = QType::Cast($mixValue, 'QControl'));
					case 'StewardshipFundIdControl':
						return ($this->lstStewardshipFund = QType::Cast($mixValue, 'QControl'));
					case 'DonationStewardshipFundIdControl':
						return ($this->lstDonationStewardshipFund = QType::Cast($mixValue, 'QControl'));
					case 'AmountDonationControl':
						return ($this->txtAmountDonation = QType::Cast($mixValue, 'QControl'));
					case 'AmountNonDonationControl':
						return ($this->txtAmountNonDonation = QType::Cast($mixValue, 'QControl'));
					case 'CreditCardPaymentIdControl':
						return ($this->lstCreditCardPayment = QType::Cast($mixValue, 'QControl'));
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