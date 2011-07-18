<?php
	require(__DATAGEN_CLASSES__ . '/PaypalBatchGen.class.php');

	/**
	 * The PaypalBatch class defined here contains any
	 * customized code for the PaypalBatch class in the
	 * Object Relational Model.  It represents the "paypal_batch" table 
	 * in the database, and extends from the code generated abstract PaypalBatchGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class PaypalBatch extends PaypalBatchGen {
		const PayPalTransactionId			= 'Transaction ID';
		const PayPalOriginalTransactionId	= 'Original Transaction ID';
		const PayPalBatchId					= 'Batch ID';
		const PayPalAmount					= 'Amount';
		const PayPalAuthCode				= 'Authcode';
		const PayPalAccountNumber			= 'Account Number';
		const PayPalType					= 'Type';
		const PayPalTenderType				= 'Tender Type';
		const PayPalTime					= 'Time';

		public static $RequiredFields = array(
			self::PayPalTransactionId,
			self::PayPalOriginalTransactionId,
			self::PayPalBatchId,
			self::PayPalAmount,
			self::PayPalAuthCode,
			self::PayPalAccountNumber,
			self::PayPalType,
			self::PayPalTenderType,
			self::PayPalTime
		);

		public function PostBatch(Login $objLogin, QDateTime $dttDateCredited) {
			if ($this->blnReconciledFlag) throw new QCallerException('Cannot post a PayPal Batch that has already been reconciled!');
			
			// First, create the stewardship stacks into arrays of 100
			$objToBecomeStacksArray = array();
			$fltStackTotalsArray = array();
			$fltRunningTotal = 0;
			$objCurrentStack = array();
			foreach ($this->GetCreditCardPaymentArray(QQ::OrderBy(QQN::CreditCardPayment()->DateCaptured)) as $objCreditCardPayment) {
				if ($objCreditCardPayment->OnlineDonation || ($objCreditCardPayment->SignupPayment && $objCreditCardPayment->SignupPayment->AmountDonation)) {
					if (count($objCurrentStack) >= 100) {
						$objToBecomeStacksArray[] = $objCurrentStack;
						$fltStackTotalsArray[] = $fltRunningTotal;
						$objCurrentStack = array();
						$fltRunningTotal = 0;
					}
					$objCurrentStack[] = $objCreditCardPayment;
					if ($objCreditCardPayment->OnlineDonation)
						$fltRunningTotal += $objCreditCardPayment->OnlineDonation->Amount;
					else
						$fltRunningTotal += $objCreditCardPayment->SignupPayment->AmountDonation;
				}
			}
			if (count($objCurrentStack)) {
				$objToBecomeStacksArray[] = $objCurrentStack;
				$fltStackTotalsArray[] = $fltRunningTotal;
			}

			// Start a Transaction
			PaypalBatch::GetDatabase()->TransactionBegin();

			try {
				// Create the Batch
				$objBatch = StewardshipBatch::Create($objLogin, $fltStackTotalsArray, 'Stewardship Entries for PayPal Batch #' . $this->Number, QDateTime::Now(), $dttDateCredited);

				$objStackArray = $objBatch->GetStewardshipStackArray(QQ::OrderBy(QQN::StewardshipStack()->StackNumber));
				if (count($objStackArray) != count($objToBecomeStacksArray)) throw new Exception('Mismatch of Created Stacks vs. Calculated Stacks');

				// Create Each Stack
				for ($intStackIndex = 0; $intStackIndex < count($objStackArray); $intStackIndex++) {
					$objStack = $objStackArray[$intStackIndex];
					$objPaymentArray = $objToBecomeStacksArray[$intStackIndex];

					foreach ($objPaymentArray as $objPayment) {
						// Create a StewardshipContribution for each OnlineDonation entry
						if ($objPayment->OnlineDonation) {
							$objContribution = StewardshipContribution::Create(
								$objLogin,
								$objPayment->OnlineDonation->Person,
								$objStack,
								StewardshipContributionType::CreditCard,
								$objPayment->TransactionCode,
								$objPayment->OnlineDonation->GetAmountArray(),
								null,
								null,
								null,
								null,
								true
							);

						// Create a StewardshipContribution for the donation in a SignupPayment
						} else {
							$objContribution = StewardshipContribution::Create(
								$objLogin,
								$objPayment->SignupPayment->SignupEntry->SignupByPerson,
								$objStack,
								StewardshipContributionType::CreditCard,
								$objPayment->TransactionCode,
								array(array($objPayment->SignupPayment->DonationStewardshipFundId, $objPayment->SignupPayment->AmountDonation)),
								null,
								null,
								null,
								null,
								true
							);
						}

						// Fixup on the Contribution Object
						$objContribution->AlternateSource = $objPayment->CreditCardDescription;
						$objContribution->DateCredited = $dttDateCredited;
						$objContribution->Save();

						// Fixup on the CCPayment Object to link back to the contribution object
						$objPayment->StewardshipContribution = $objContribution;
						$objPayment->Save();
					}
					
				}

				// Cleanup each Payment object
				foreach ($this->GetCreditCardPaymentArray() as $objCreditCardPayment) {
					$objCreditCardPayment->CreditCardStatusTypeId = CreditCardStatusType::Reconciled;
					$objCreditCardPayment->Save();
				}

				// Cleanup this object
				$this->blnReconciledFlag = true;
				$this->dttDateReconciled = QDateTime::Now();
				$this->StewardshipBatch = $objBatch;
				$this->Save();

				// Finally, Post the StewardshipBatch
				$objBatch->PostBalance($objLogin);

				// If we are here, then it was a success!  Commit the Transaction!
				PaypalBatch::GetDatabase()->TransactionCommit();
			} catch (Exception $objExc) {
				PaypalBatch::GetDatabase()->TransactionRollBack();
				throw $objExc;
			}
		}

		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPaypalBatch->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('PaypalBatch Object %s',  $this->intId);
		}

		/**
		 * This will process a report text file as taken from PayPal.  This will create any applicable PaypalBatch entries
		 * and correlate with existing CreditCardPayment records.  This will *only* process "Delayed Capture" transactions,
		 * since that's all we actually care about.  This will create "as unlinked" any CreditCardPayment records that had
		 * to be created because it didn't exist (which means that this is a bad thing -- we should not have any of those).
		 * 
		 * If there are any issues with importing, this will throw an error
		 * 
		 * @param string $strReportText the text of the report itself from paypal
		 * @param integer $intEntriesModified return value of the number of entries that were modified
		 * @param integer $intEntriesAdded return value of the number of entries that were created (hopefully shouuld be zero)
		 * @throws QCallerException
		 */
		public static function ProcessReport($strReportText, &$intEntriesModified, &$intEntriesAdded) {
			$intEntriesModified = 0;
			$intEntriesAdded = 0;

			// Cleanup Linebreaks
			$strReportText = str_replace("\r", "\n", $strReportText);
			while (strpos($strReportText, "\n\n") !== false) $strReportText = str_replace("\n\n", "\n", $strReportText);
			$strReportText = trim($strReportText);

			// Pull out the First Line (column headers) from the rest of the report
			$intPosition = strpos($strReportText, "\n");
			$strFirstLine = substr($strReportText, 0, $intPosition);
			$strReportText = substr($strReportText, $intPosition + 1);

			// Calculate the tokens
			$strTokenArray = array();
			$intColumnIndex = 0;
			foreach (explode("\t", $strFirstLine) as $strToken) {
				if (array_key_exists($strToken, $strTokenArray)) throw new QCallerException('Report has a duplicate column: ' . $strToken);
				$strTokenArray[$strToken] = $intColumnIndex;
				$intColumnIndex++;
			}

			// Ensure that the required fields exist
			foreach (self::$RequiredFields as $strRequiredToken)
				if (!array_key_exists($strRequiredToken, $strTokenArray)) throw new QCallerException('Report is missing required column: ' . $strRequiredToken);

			// Go through each line of the report
			foreach (explode("\n", $strReportText) as $strLine) {
				// Break out all cells, and then create a specific Values array that contain only the cells we care about, indexed by name
				$strCellArray = explode("\t", $strLine);
				$strValuesArray = array();
				foreach (self::$RequiredFields as $strRequiredToken) {
					$strValuesArray[$strRequiredToken] = $strCellArray[$strTokenArray[$strRequiredToken]];
				}

				// Only process "Delayed Capture"
				if ($strValuesArray['Type'] == 'Delayed Capture') {
					if (strlen(trim($strValuesArray[self::PayPalOriginalTransactionId])) == 0) {
						throw new QCallerException('Transaction ' . $strValuesArray[self::PayPalTransactionId] . ' does not have an Original Transaction Id');
					}

					// Can we find the linked CCPayment Record?
					$objCreditCardPayment = CreditCardPayment::LoadByTransactionCode($strValuesArray[self::PayPalOriginalTransactionId]);

					if (!$objCreditCardPayment) {
						// No -- let's create this as an UNLINKED one
						$intEntriesAdded++;
						$objCreditCardPayment = new CreditCardPayment();
						$objCreditCardPayment->TransactionCode = $strValuesArray[self::PayPalOriginalTransactionId];
						$objCreditCardPayment->CreditCardStatusTypeId = CreditCardStatusType::Captured;
						$objCreditCardPayment->CreditCardLastFour = substr($strValuesArray[self::PayPalAccountNumber], strlen($strValuesArray[self::PayPalAccountNumber]) - 4);
						foreach (CreditCardType::$NameArray as $intId => $strName) {
							if (strtolower($strName) == strtolower($strValuesArray[self::PayPalTenderType]))
								$objCreditCardPayment->CreditCardTypeId = $intId;
						}
						if (!$objCreditCardPayment->CreditCardTypeId) throw new QCallerException('Unlinked transaction contains an unknown credit card type: ' . $strValuesArray[self::PayPalTenderType]);
						$objCreditCardPayment->UnlinkedFlag = true;

						// Setup Fields
						$objCreditCardPayment->AuthorizationCode = $strValuesArray[self::PayPalAuthCode];
						$objCreditCardPayment->AmountCharged = $strValuesArray[self::PayPalAmount];
					}

					// Link in the Pay Pal Batch Info (if applicable)
					if (SERVER_INSTANCE == 'dev') $strValuesArray[self::PayPalBatchId] = 789;
					if ($intBatchNumber = trim($strValuesArray[self::PayPalBatchId])) {
						$objPayPalBatch = PaypalBatch::LoadByNumber($intBatchNumber);
						if (!$objPayPalBatch) {
							$objPayPalBatch = new PaypalBatch();
							$objPayPalBatch->Number = $intBatchNumber;
							$objPayPalBatch->DateReceived = QDateTime::Now();
							$objPayPalBatch->ReconciledFlag = false;
							$objPayPalBatch->Save();
						}

						if ($objCreditCardPayment->PaypalBatchId != $objPayPalBatch->Id) {
							$objCreditCardPayment->PaypalBatch = $objPayPalBatch;
							if ($objCreditCardPayment->Id) $intEntriesModified++;
						}
					} else {
						if (!is_null($objCreditCardPayment->PaypalBatchId)) {
							$objCreditCardPayment->PaypalBatch = null;
							if ($objCreditCardPayment->Id) $intEntriesModified++;
						}
					}


					// TODO: How do we account fo a "reconciled" PayPal batch that unexpectatly received another transaction not previously accounted for?

					// Check Fields to ensure match
					if ($objCreditCardPayment->AuthorizationCode != $strValuesArray[self::PayPalAuthCode])
						throw new QCallerException(sprintf('Mismatch AuthCode for Transaction %s: %s vs. %s',
							$strValuesArray[self::PayPalOriginalTransactionId],
							$strValuesArray[self::PayPalAuthCode],
							$objCreditCardPayment->AuthorizationCode));

					if ($objCreditCardPayment->AmountCharged != $strValuesArray[self::PayPalAmount])
						throw new QCallerException(sprintf('Mismatch Amount for Transaction %s: %s vs. %s',
							$strValuesArray[self::PayPalOriginalTransactionId],
							$strValuesArray[self::PayPalAmount],
							$objCreditCardPayment->AmountCharged));

					// Update Fields
					$objCreditCardPayment->DateCaptured = new QDateTime($strValuesArray[self::PayPalTime]);

					$objCreditCardPayment->Save();
				}
			}
		}


		/**
		 * Returns whether or not Unspecified / Uncategorized Payment transactions still exist
		 * @return boolean
		 */
		public function IsUncategorizedPaymentsExist() {
			// Go through all the donations
			foreach ($this->GetCreditCardPaymentArray() as $objPayment) {
				if ($objPayment->OnlineDonation) {
					foreach ($objPayment->OnlineDonation->GetOnlineDonationLineItemArray() as $objLineItem) {
						if (!$objLineItem->StewardshipFundId) return true;
					}
				}
			}
			
			return false;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of PaypalBatch objects
			return PaypalBatch::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::PaypalBatch()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PaypalBatch()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single PaypalBatch object
			return PaypalBatch::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PaypalBatch()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PaypalBatch()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of PaypalBatch objects
			return PaypalBatch::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::PaypalBatch()->Param1, $strParam1),
					QQ::Equal(QQN::PaypalBatch()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = PaypalBatch::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`paypal_batch`.*
				FROM
					`paypal_batch` AS `paypal_batch`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return PaypalBatch::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

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