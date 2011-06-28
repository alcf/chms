<?php
	require(__DATAGEN_CLASSES__ . '/SignupEntryGen.class.php');

	/**
	 * The SignupEntry class defined here contains any
	 * customized code for the SignupEntry class in the
	 * Object Relational Model.  It represents the "signup_entry" table 
	 * in the database, and extends from the code generated abstract SignupEntryGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class SignupEntry extends SignupEntryGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objSignupEntry->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('SignupEntry Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'ConfirmationUrl': 
					if ($this->SignupForm->Token) {
						return MY_ALCF_URL . '/signup/confirmation.php/' . $this->SignupForm->Token . '/' . $this->intId;
					} else {
						return MY_ALCF_URL . '/signup/confirmation.php/' . $this->SignupFormId . '/' . $this->intId;
					}

				case 'PaymentUrl': 
					if ($this->SignupForm->Token) {
						return MY_ALCF_URL . '/signup/payment.php/' . $this->SignupForm->Token . '/' . $this->intId;
					} else {
						return MY_ALCF_URL . '/signup/payment.php/' . $this->SignupFormId . '/' . $this->intId;
					}

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
		 * Queues a "confirmation email" to be sent out to the person signing up
		 */
		public function SendConfirmationEmail() {
			// TODO
		}
		
		/**
		 * Given various properties of the signup itself, the person who is registered, and the one who is registering "on behalf of",
		 * this will calculate the correct email address to send out to
		 * @return string a string containing the email address to send out to
		 */
		public function CalculateConfirmationEmailAddress() {
			// TODO
			return 'todo@email.com';
		}

		/**
		 * If the form has an "address" field, it will return the address data as an address record
		 * NOT linked with the database.  This is primarily used for pre-filling credit card data/forms.
		 * 
		 * This will return NULL if no address can be retrieved.
		 * @return Address
		 */
		public function RetrieveAnyValidAddressObject() {
			foreach ($this->SignupForm->GetFormQuestionArray() as $objFormQuestion) {
				if ($objFormQuestion->FormQuestionTypeId == FormQuestionType::Address) {
					if ($objFormAnswer = FormAnswer::LoadBySignupEntryIdFormQuestionId($this->intId, $objFormQuestion->Id)) {
						$objAddress = Address::DeduceAddressFromFullLine($objFormAnswer->TextValue);
						if ($objAddress) return $objAddress;
					}
				}
			}

			return null;
		}

		/**
		 * Update the Amounts-related calculated fields and returns the current balance
		 * @param boolean $blnSaveFlag whether or not to save the record after updating
		 * @return float
		 */
		public function RefreshAmounts($blnSaveFlag = true) {
			$fltAmountTotal = 0;
			foreach ($this->GetSignupProductArray() as $objSignupProduct) $fltAmountTotal += ($objSignupProduct->Quantity * $objSignupProduct->Amount);
			
			$fltAmountPaid = 0;
			foreach ($this->GetSignupPaymentArray() as $objSignupPayment) $fltAmountPaid += $objSignupPayment->Amount;

			$this->AmountTotal = $fltAmountTotal;
			$this->AmountPaid = $fltAmountPaid;
			$this->AmountBalance = -1 * ($fltAmountTotal - $fltAmountPaid);
			if ($blnSaveFlag) $this->Save();

			return $this->AmountBalance;
		}
		
		/**
		 * This will calulate the minimum amount required to register (e.g. it uses "deposit" if applicable, otherwise it uses the full amount, for each
		 * signup product.
		 * @return float
		 */
		public function CalculateMinimumDeposit() {
			$fltDeposit = 0;
			foreach ($this->GetSignupProductArray() as $objSignupProduct) {
				switch ($objSignupProduct->FormProduct->FormPaymentTypeId) {
					case FormPaymentType::DepositRequired:
						$fltDeposit += ($objSignupProduct->Quantity * $objSignupProduct->Deposit);
						break;
					default:
						$fltDeposit += ($objSignupProduct->Quantity * $objSignupProduct->Amount);
						break;
				}
			}

			return $fltDeposit;
		}

		/**
		 * Adds a payment records for this Entry
		 * @param integer $intSignupPaymentTypeId
		 * @param float $fltAmount
		 * @param string $strTransactionCode
		 * @param QDateTime $dttTransactionDate optional, uses Now() if nothing is passed in
		 * @return SignupPayment
		 */
		public function AddPayment($intSignupPaymentTypeId, $fltAmount, $strTransactionCode, QDateTime $dttTransactionDate = null) {
			$objSignupPayment = new SignupPayment();
			$objSignupPayment->SignupEntry = $this;
			$objSignupPayment->SignupPaymentTypeId = $intSignupPaymentTypeId;
			$objSignupPayment->TransactionDate = ($dttTransactionDate ? $dttTransactionDate : QDateTime::Now());
			$objSignupPayment->TransactionCode = $strTransactionCode;
			$objSignupPayment->Amount = $fltAmount;
			$objSignupPayment->Save();
			
			$this->RefreshAmounts();
			
			return $objSignupPayment;
		}
		
		/**
		 * Adds a product selection to this signup entry
		 * @param FormProduct $objFormProduct
		 * @param integer $intQuantity only specify if we are dealing with an "optional" product, otherwise we assume 1
		 * @param float $fltAmount only specify if we are allowed a variable amount to specify (e.g. for a donation), otherwise leave blank
		 * @return SignupProduct
		 */
		public function AddProduct(FormProduct $objFormProduct, $intQuantity = 1, $fltAmount = 0) {
			$objSignupProduct = new SignupProduct();
			$objSignupProduct->SignupEntry = $this;
			$objSignupProduct->FormProduct = $objFormProduct;

			switch ($objFormProduct->FormProductTypeId) {
				case FormProductType::Required:
					$objSignupProduct->Quantity = 1;
					break;
				case FormProductType::RequiredWithChoice:
					$objSignupProduct->Quantity = 1;
					break;
				case FormProductType::Optional:
					if (($intQuantity < $objFormProduct->MinimumQuantity) || ($intQuantity > $objFormProduct->MaximumQuantity))
						$intQuantity = $objFormProduct->MinimumQuantity;
					$objSignupProduct->Quantity = $intQuantity;
					break;
				default:
					throw new Exception('Unhandled FormProductTypeId: ' . $objFormProduct->FormProductTypeId);
			}

			switch ($objFormProduct->FormPaymentTypeId) {
				case FormPaymentType::PayInFull:
					$objSignupProduct->Amount = $objFormProduct->Cost;
					break;
				case FormPaymentType::DepositRequired:
					$objSignupProduct->Amount = $objFormProduct->Cost;
					$objSignupProduct->Deposit = $objFormProduct->Deposit;
					break;
				case FormPaymentType::Donation:
					if ($fltAmount < 0) throw new QCallerException('Invalid Amount entered for Donation');
					$objSignupProduct->Amount = $fltAmount;
					break;
				default:
					throw new Exception('Unhandled FormPaymentTypeId: ' . $objFormProduct->FormPaymentTypeId);
			}

			$objSignupProduct->Save();
			$this->RefreshAmounts();
			return $objSignupProduct;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of SignupEntry objects
			return SignupEntry::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::SignupEntry()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SignupEntry()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single SignupEntry object
			return SignupEntry::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SignupEntry()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SignupEntry()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of SignupEntry objects
			return SignupEntry::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::SignupEntry()->Param1, $strParam1),
					QQ::Equal(QQN::SignupEntry()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = SignupEntry::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`signup_entry`.*
				FROM
					`signup_entry` AS `signup_entry`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return SignupEntry::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;


		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>