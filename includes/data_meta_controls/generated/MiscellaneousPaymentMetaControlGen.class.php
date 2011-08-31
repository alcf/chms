<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the MiscellaneousPayment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single MiscellaneousPayment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a MiscellaneousPaymentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage MetaControls
	 * property-read MiscellaneousPayment $MiscellaneousPayment the actual MiscellaneousPayment data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $CreditCardPaymentIdControl
	 * property-read QLabel $CreditCardPaymentIdLabel
	 * property QDateTimePicker $TransactionDateControl
	 * property-read QLabel $TransactionDateLabel
	 * property QTextBox $TransactionDescriptionControl
	 * property-read QLabel $TransactionDescriptionLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property QTextBox $FundingAccountControl
	 * property-read QLabel $FundingAccountLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class MiscellaneousPaymentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var MiscellaneousPayment objMiscellaneousPayment
		 * @access protected
		 */
		protected $objMiscellaneousPayment;

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

		// Controls that allow the editing of MiscellaneousPayment's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

        /**
         * @var QListBox lstCreditCardPayment;
         * @access protected
         */
		protected $lstCreditCardPayment;

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
         * @var QTextBox txtFundingAccount;
         * @access protected
         */
		protected $txtFundingAccount;


		// Controls that allow the viewing of MiscellaneousPayment's individual data fields
        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblCreditCardPaymentId
         * @access protected
         */
		protected $lblCreditCardPaymentId;

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
         * @var QLabel lblFundingAccount
         * @access protected
         */
		protected $lblFundingAccount;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * MiscellaneousPaymentMetaControl to edit a single MiscellaneousPayment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single MiscellaneousPayment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MiscellaneousPaymentMetaControl
		 * @param MiscellaneousPayment $objMiscellaneousPayment new or existing MiscellaneousPayment object
		 */
		 public function __construct($objParentObject, MiscellaneousPayment $objMiscellaneousPayment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this MiscellaneousPaymentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked MiscellaneousPayment object
			$this->objMiscellaneousPayment = $objMiscellaneousPayment;

			// Figure out if we're Editing or Creating New
			if ($this->objMiscellaneousPayment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this MiscellaneousPaymentMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing MiscellaneousPayment object creation - defaults to CreateOrEdit
 		 * @return MiscellaneousPaymentMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objMiscellaneousPayment = MiscellaneousPayment::Load($intId);

				// MiscellaneousPayment was found -- return it!
				if ($objMiscellaneousPayment)
					return new MiscellaneousPaymentMetaControl($objParentObject, $objMiscellaneousPayment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a MiscellaneousPayment object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new MiscellaneousPaymentMetaControl($objParentObject, new MiscellaneousPayment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MiscellaneousPaymentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing MiscellaneousPayment object creation - defaults to CreateOrEdit
		 * @return MiscellaneousPaymentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return MiscellaneousPaymentMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MiscellaneousPaymentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing MiscellaneousPayment object creation - defaults to CreateOrEdit
		 * @return MiscellaneousPaymentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return MiscellaneousPaymentMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objMiscellaneousPayment->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
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
			$this->lstPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
				if (($this->objMiscellaneousPayment->Person) && ($this->objMiscellaneousPayment->Person->Id == $objPerson->Id))
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
			$this->lblPersonId->Text = ($this->objMiscellaneousPayment->Person) ? $this->objMiscellaneousPayment->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
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
			$this->lstCreditCardPayment->Required = true;
			if (!$this->blnEditMode)
				$this->lstCreditCardPayment->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCreditCardPaymentCursor = CreditCardPayment::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCreditCardPayment = CreditCardPayment::InstantiateCursor($objCreditCardPaymentCursor)) {
				$objListItem = new QListItem($objCreditCardPayment->__toString(), $objCreditCardPayment->Id);
				if (($this->objMiscellaneousPayment->CreditCardPayment) && ($this->objMiscellaneousPayment->CreditCardPayment->Id == $objCreditCardPayment->Id))
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
			$this->lblCreditCardPaymentId->Text = ($this->objMiscellaneousPayment->CreditCardPayment) ? $this->objMiscellaneousPayment->CreditCardPayment->__toString() : null;
			$this->lblCreditCardPaymentId->Required = true;
			return $this->lblCreditCardPaymentId;
		}

		/**
		 * Create and setup QDateTimePicker calTransactionDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calTransactionDate_Create($strControlId = null) {
			$this->calTransactionDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calTransactionDate->Name = QApplication::Translate('Transaction Date');
			$this->calTransactionDate->DateTime = $this->objMiscellaneousPayment->TransactionDate;
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
			$this->lblTransactionDate->Text = sprintf($this->objMiscellaneousPayment->TransactionDate) ? $this->objMiscellaneousPayment->TransactionDate->__toString($this->strTransactionDateDateTimeFormat) : null;
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
			$this->txtTransactionDescription->Text = $this->objMiscellaneousPayment->TransactionDescription;
			$this->txtTransactionDescription->MaxLength = MiscellaneousPayment::TransactionDescriptionMaxLength;
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
			$this->lblTransactionDescription->Text = $this->objMiscellaneousPayment->TransactionDescription;
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
			$this->txtAmount->Text = $this->objMiscellaneousPayment->Amount;
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
			$this->lblAmount->Text = $this->objMiscellaneousPayment->Amount;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
		}

		/**
		 * Create and setup QTextBox txtFundingAccount
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFundingAccount_Create($strControlId = null) {
			$this->txtFundingAccount = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFundingAccount->Name = QApplication::Translate('Funding Account');
			$this->txtFundingAccount->Text = $this->objMiscellaneousPayment->FundingAccount;
			$this->txtFundingAccount->MaxLength = MiscellaneousPayment::FundingAccountMaxLength;
			return $this->txtFundingAccount;
		}

		/**
		 * Create and setup QLabel lblFundingAccount
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFundingAccount_Create($strControlId = null) {
			$this->lblFundingAccount = new QLabel($this->objParentObject, $strControlId);
			$this->lblFundingAccount->Name = QApplication::Translate('Funding Account');
			$this->lblFundingAccount->Text = $this->objMiscellaneousPayment->FundingAccount;
			return $this->lblFundingAccount;
		}



		/**
		 * Refresh this MetaControl with Data from the local MiscellaneousPayment object.
		 * @param boolean $blnReload reload MiscellaneousPayment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objMiscellaneousPayment->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objMiscellaneousPayment->Id;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->Id);
					if (($this->objMiscellaneousPayment->Person) && ($this->objMiscellaneousPayment->Person->Id == $objPerson->Id))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objMiscellaneousPayment->Person) ? $this->objMiscellaneousPayment->Person->__toString() : null;

			if ($this->lstCreditCardPayment) {
					$this->lstCreditCardPayment->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCreditCardPayment->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreditCardPaymentArray = CreditCardPayment::LoadAll();
				if ($objCreditCardPaymentArray) foreach ($objCreditCardPaymentArray as $objCreditCardPayment) {
					$objListItem = new QListItem($objCreditCardPayment->__toString(), $objCreditCardPayment->Id);
					if (($this->objMiscellaneousPayment->CreditCardPayment) && ($this->objMiscellaneousPayment->CreditCardPayment->Id == $objCreditCardPayment->Id))
						$objListItem->Selected = true;
					$this->lstCreditCardPayment->AddItem($objListItem);
				}
			}
			if ($this->lblCreditCardPaymentId) $this->lblCreditCardPaymentId->Text = ($this->objMiscellaneousPayment->CreditCardPayment) ? $this->objMiscellaneousPayment->CreditCardPayment->__toString() : null;

			if ($this->calTransactionDate) $this->calTransactionDate->DateTime = $this->objMiscellaneousPayment->TransactionDate;
			if ($this->lblTransactionDate) $this->lblTransactionDate->Text = sprintf($this->objMiscellaneousPayment->TransactionDate) ? $this->objMiscellaneousPayment->__toString($this->strTransactionDateDateTimeFormat) : null;

			if ($this->txtTransactionDescription) $this->txtTransactionDescription->Text = $this->objMiscellaneousPayment->TransactionDescription;
			if ($this->lblTransactionDescription) $this->lblTransactionDescription->Text = $this->objMiscellaneousPayment->TransactionDescription;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objMiscellaneousPayment->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objMiscellaneousPayment->Amount;

			if ($this->txtFundingAccount) $this->txtFundingAccount->Text = $this->objMiscellaneousPayment->FundingAccount;
			if ($this->lblFundingAccount) $this->lblFundingAccount->Text = $this->objMiscellaneousPayment->FundingAccount;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC MISCELLANEOUSPAYMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's MiscellaneousPayment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveMiscellaneousPayment() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objMiscellaneousPayment->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstCreditCardPayment) $this->objMiscellaneousPayment->CreditCardPaymentId = $this->lstCreditCardPayment->SelectedValue;
				if ($this->calTransactionDate) $this->objMiscellaneousPayment->TransactionDate = $this->calTransactionDate->DateTime;
				if ($this->txtTransactionDescription) $this->objMiscellaneousPayment->TransactionDescription = $this->txtTransactionDescription->Text;
				if ($this->txtAmount) $this->objMiscellaneousPayment->Amount = $this->txtAmount->Text;
				if ($this->txtFundingAccount) $this->objMiscellaneousPayment->FundingAccount = $this->txtFundingAccount->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the MiscellaneousPayment object
				$this->objMiscellaneousPayment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's MiscellaneousPayment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteMiscellaneousPayment() {
			$this->objMiscellaneousPayment->Delete();
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
				case 'MiscellaneousPayment': return $this->objMiscellaneousPayment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to MiscellaneousPayment fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'CreditCardPaymentIdControl':
					if (!$this->lstCreditCardPayment) return $this->lstCreditCardPayment_Create();
					return $this->lstCreditCardPayment;
				case 'CreditCardPaymentIdLabel':
					if (!$this->lblCreditCardPaymentId) return $this->lblCreditCardPaymentId_Create();
					return $this->lblCreditCardPaymentId;
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
				case 'FundingAccountControl':
					if (!$this->txtFundingAccount) return $this->txtFundingAccount_Create();
					return $this->txtFundingAccount;
				case 'FundingAccountLabel':
					if (!$this->lblFundingAccount) return $this->lblFundingAccount_Create();
					return $this->lblFundingAccount;
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
					// Controls that point to MiscellaneousPayment fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'CreditCardPaymentIdControl':
						return ($this->lstCreditCardPayment = QType::Cast($mixValue, 'QControl'));
					case 'TransactionDateControl':
						return ($this->calTransactionDate = QType::Cast($mixValue, 'QControl'));
					case 'TransactionDescriptionControl':
						return ($this->txtTransactionDescription = QType::Cast($mixValue, 'QControl'));
					case 'AmountControl':
						return ($this->txtAmount = QType::Cast($mixValue, 'QControl'));
					case 'FundingAccountControl':
						return ($this->txtFundingAccount = QType::Cast($mixValue, 'QControl'));
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