<?php
	require(__DATAGEN_CLASSES__ . '/StewardshipContributionGen.class.php');

	/**
	 * The StewardshipContribution class defined here contains any
	 * customized code for the StewardshipContribution class in the
	 * Object Relational Model.  It represents the "stewardship_contribution" table 
	 * in the database, and extends from the code generated abstract StewardshipContributionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class StewardshipContribution extends StewardshipContributionGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objStewardshipContribution->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('StewardshipContribution Object %s',  $this->intId);
		}

		/**
		 * Creates a new Contribution record.  The $mixAmountArray shouuld be an array of array items, where each array item is
		 * indexed with
		 * 	0 - the amount (as a float)
		 * 	1 - the StewardshipFundId that shoudl be credited
		 * 
		 * @param Login $objLogin
		 * @param Person $objPerson
		 * @param StewardshipStack $objStack
		 * @param integer $intStewardshipContributionTypeId
		 * @param string $strSource the "source" of the contribution (e.g. for checks, it's the check number, for CC, it's the authorization number)
		 * @param mixed[][] $mixAmountArray the array of arrays containing amounts and fund ids
		 * @param QDateTime $dttEntered optional (will use Now() if null)
		 * @param QDateTime $dttCleared optional (will remain as null if null)
		 * @param CheckingAccountLookup $objCheckingAccountLookup optional
		 * @param string $strNote optional
		 * @param boolean $blnRefreshOtherTotalAmounts whether or not to refresh the Stack's and Batch's ActualTotalAmount (defaults to true)
		 * @return StewardshipContribution
		 */
		public static function Create(Login $objLogin, Person $objPerson, StewardshipStack $objStack, $intStewardshipContributionTypeId, $strSource, $mixAmountArray, 
			QDateTime $dttEntered = null, QDateTime $dttCleared = null, CheckingAccountLookup $objCheckingAccountLookup = null, $strNote = null,
			$blnRefreshOtherTotalAmounts = true) {
			$objContribution = new StewardshipContribution();
			$objContribution->Person = $objPerson;
			$objContribution->StewardshipContributionTypeId = $intStewardshipContributionTypeId;
			$objContribution->StewardshipBatchId = $objStack->StewardshipBatchId;
			$objContribution->StewardshipStack = $objStack;
			$objContribution->CheckingAccountLookup = $objCheckingAccountLookup;
			if ($dttEntered)
				$objContribution->DateEntered = $dttEntered;
			else
				$objContribution->DateEntered = QDateTime::Now();
			$objContribution->DateCleared = $dttCleared;
			$objContribution->Note = $strNote;

			switch ($objContribution->StewardshipContributionTypeId) {
				case StewardshipContributionType::Check:
				case StewardshipContributionType::ReturnedCheck:
					$objContribution->CheckNumber = $strSource;
					break;

				case StewardshipContributionType::CreditCard:
				case StewardshipContributionType::CreditCardRecurring:
					$objContribution->AuthorizationNumber = $strSource;
					break;

				case StewardshipContributionType::Cash:
				case StewardshipContributionType::CorporateMatch:
				case StewardshipContributionType::CorporateMatchNonDeductible:
				case StewardshipContributionType::StockDonation:
				case StewardshipContributionType::Automobile:
				case StewardshipContributionType::Other:
					$objContribution->AlternateSource = $strSource;
					break;

				default:
					throw new Exception('Unhandled ContributionTypeId');				
			}

			$objContribution->Save();

			foreach ($mixAmountArray as $mixAmount) {
				$objContribution->CreateAmount($mixAmount[0], $mixAmount[1], false);
			}

			$objContribution->RefreshTotalAmount();
			if ($blnRefreshOtherTotalAmounts) {
				$objContribution->StewardshipStack->RefreshActualTotalAmount();
				$objContribution->StewardshipBatch->RefreshActualTotalAmount();
			}
			return $objContribution;
		}

		/**
		 * Creates a new StewardshipContributionAmount record for a given amount and fund ID.
		 * @param float $fltAmount
		 * @param integer $intStewardshipFundId
		 * @param boolean $blnRefreshTotalAmount whether or not to make the call to Refresh();
		 * @return StewardshipContributionAmount
		 */
		public function CreateAmount($fltAmount, $intStewardshipFundId, $blnRefreshTotalAmount = true) {
			$objAmount = new StewardshipContributionAmount();
			$objAmount->StewardshipContribution = $this;
			$objAmount->StewardshipFundId = $intStewardshipFundId;
			$objAmount->Amount = $fltAmount;
			$objAmount->Save();

			if ($blnRefreshTotalAmount) $this->RefreshTotalAmount();
			return $objAmount;
		}

		/**
		 * Recalculates TotalAmount based on all linked StewradshipContributionAmount records in the database.
		 * @param boolean $blnSave whether or not to make the call to Save() after TotalAmount has been updated.
		 */
		public function RefreshTotalAmount($blnSave = true) {
			$fltTotalAmount = 0;

			foreach ($this->GetStewardshipContributionAmountArray() as $objAmount)
				$fltTotalAmount += $objAmount->Amount;

			$this->TotalAmount = $fltTotalAmount;
			if ($blnSave) $this->Save();
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of StewardshipContribution objects
			return StewardshipContribution::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::StewardshipContribution()->Param1, $strParam1),
					QQ::GreaterThan(QQN::StewardshipContribution()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single StewardshipContribution object
			return StewardshipContribution::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::StewardshipContribution()->Param1, $strParam1),
					QQ::GreaterThan(QQN::StewardshipContribution()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of StewardshipContribution objects
			return StewardshipContribution::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::StewardshipContribution()->Param1, $strParam1),
					QQ::Equal(QQN::StewardshipContribution()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`stewardship_contribution`.*
				FROM
					`stewardship_contribution` AS `stewardship_contribution`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return StewardshipContribution::InstantiateDbResult($objDbResult);
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