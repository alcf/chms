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
	 * property QTextBox $TransactionCodeControl
	 * property-read QLabel $TransactionCodeLabel
	 * property QFloatTextBox $AmountControl
	 * property-read QLabel $AmountLabel
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
         * @var QTextBox txtTransactionCode;
         * @access protected
         */
		protected $txtTransactionCode;

        /**
         * @var QFloatTextBox txtAmount;
         * @access protected
         */
		protected $txtAmount;


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
         * @var QLabel lblTransactionCode
         * @access protected
         */
		protected $lblTransactionCode;

        /**
         * @var QLabel lblAmount
         * @access protected
         */
		protected $lblAmount;


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
		 * Create and setup QTextBox txtTransactionCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTransactionCode_Create($strControlId = null) {
			$this->txtTransactionCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTransactionCode->Name = QApplication::Translate('Transaction Code');
			$this->txtTransactionCode->Text = $this->objSignupPayment->TransactionCode;
			$this->txtTransactionCode->MaxLength = SignupPayment::TransactionCodeMaxLength;
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
			$this->lblTransactionCode->Text = $this->objSignupPayment->TransactionCode;
			return $this->lblTransactionCode;
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

			if ($this->txtTransactionCode) $this->txtTransactionCode->Text = $this->objSignupPayment->TransactionCode;
			if ($this->lblTransactionCode) $this->lblTransactionCode->Text = $this->objSignupPayment->TransactionCode;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objSignupPayment->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objSignupPayment->Amount;

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
				if ($this->txtTransactionCode) $this->objSignupPayment->TransactionCode = $this->txtTransactionCode->Text;
				if ($this->txtAmount) $this->objSignupPayment->Amount = $this->txtAmount->Text;

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
				case 'TransactionCodeControl':
					if (!$this->txtTransactionCode) return $this->txtTransactionCode_Create();
					return $this->txtTransactionCode;
				case 'TransactionCodeLabel':
					if (!$this->lblTransactionCode) return $this->lblTransactionCode_Create();
					return $this->lblTransactionCode;
				case 'AmountControl':
					if (!$this->txtAmount) return $this->txtAmount_Create();
					return $this->txtAmount;
				case 'AmountLabel':
					if (!$this->lblAmount) return $this->lblAmount_Create();
					return $this->lblAmount;
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
					case 'TransactionCodeControl':
						return ($this->txtTransactionCode = QType::Cast($mixValue, 'QControl'));
					case 'AmountControl':
						return ($this->txtAmount = QType::Cast($mixValue, 'QControl'));
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