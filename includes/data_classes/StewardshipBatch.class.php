<?php
	require(__DATAGEN_CLASSES__ . '/StewardshipBatchGen.class.php');

	/**
	 * The StewardshipBatch class defined here contains any
	 * customized code for the StewardshipBatch class in the
	 * Object Relational Model.  It represents the "stewardship_batch" table 
	 * in the database, and extends from the code generated abstract StewardshipBatchGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class StewardshipBatch extends StewardshipBatchGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objStewardshipBatch->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('StewardshipBatch Object %s',  $this->intId);
		}

		/**
		 * Creates a new StewardshipBatch with a given description and Batch Date.  Will use Now() if no date is specified.
		 * @param Login $objLogin the login responsible for creating this
		 * @param float $fltReportedTotalAmountArray[] optional
		 * @param string $strDescription optional
		 * @param QDateTime $dttBatchDate optional, or will use Now() if null
		 * @return StewardshipBatch
		 */
		public static function Create(Login $objLogin, $fltReportedTotalAmountArray = null, $strDescription = null, QDateTime $dttBatchDate = null) {
			if (!$dttBatchDate)
				$dttBatchDate = QDateTime::Now();
			else
				$dttBatchDate = new QDateTime($dttBatchDate);
			$dttBatchDate->SetTime(null, null, null);

			$objBatch = new StewardshipBatch();
			$objBatch->CreatedByLogin = $objLogin;
			$objBatch->StewardshipBatchStatusTypeId = StewardshipBatchStatusType::NewBatch;
			$objBatch->DateEntered = $dttBatchDate;

			$objCurrentLastLetter = StewardshipBatch::QuerySingle(QQ::Equal(QQN::StewardshipBatch()->DateEntered, $dttBatchDate), QQ::OrderBy(QQN::StewardshipBatch()->BatchLabel, false));
			if ($objCurrentLastLetter) {
				$objBatch->BatchLabel = chr(ord($objCurrentLastLetter->BatchLabel) + 1);
			} else {
				$objBatch->BatchLabel = 'A';
			}

			if ($fltReportedTotalAmountArray) {
				$objBatch->ReportedTotalAmount = null;
				foreach ($fltReportedTotalAmountArray as $fltReportedTotalAmount)
					$objBatch->ReportedTotalAmount += $fltReportedTotalAmount;
			}
			$objBatch->ActualTotalAmount = 0;
			$objBatch->PostedTotalAmount = 0;
			$objBatch->Description = $strDescription;
			$objBatch->Save();

			// Create Stacks
			if ($fltReportedTotalAmountArray) {
				foreach ($fltReportedTotalAmountArray as $fltReportedTotalAmount) {
					$objBatch->CreateStack($fltReportedTotalAmount);
				}
			}

			return $objBatch;
		}

		/**
		 * Creates a new stack for this batch
		 * @param float $fltReportedTotalAmount optional
		 * @return StewardshipStack
		 */
		public function CreateStack($fltReportedTotalAmount = null) {
			$objStack = new StewardshipStack();
			$objStack->StewardshipBatch = $this;
			$objStack->StackNumber = $this->CountStewardshipStacks() + 1;
			$objStack->ReportedTotalAmount = $fltReportedTotalAmount;
			$objStack->ActualTotalAmount = 9;
			$objStack->Save();
			return $objStack;
		}


		/**
		 * Recalculates ActualTotalAmount based on all linked StewradshipContribution records in the database.
		 * @param boolean $blnSave whether or not to make the call to Save() after ActualTotalAmount has been updated.
		 */
		public function RefreshActualTotalAmount($blnSave = true) {
			$fltTotalAmount = 0;

			$objContributionArray = $this->GetStewardshipContributionArray();
			foreach ($objContributionArray as $objContribution)
				$fltTotalAmount += $objContribution->TotalAmount;

			$this->ItemCount = count($objArray);
			$this->ActualTotalAmount = $fltTotalAmount;
			if ($blnSave) $this->Save();
		}
		
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of StewardshipBatch objects
			return StewardshipBatch::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::StewardshipBatch()->Param1, $strParam1),
					QQ::GreaterThan(QQN::StewardshipBatch()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single StewardshipBatch object
			return StewardshipBatch::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::StewardshipBatch()->Param1, $strParam1),
					QQ::GreaterThan(QQN::StewardshipBatch()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of StewardshipBatch objects
			return StewardshipBatch::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::StewardshipBatch()->Param1, $strParam1),
					QQ::Equal(QQN::StewardshipBatch()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`stewardship_batch`.*
				FROM
					`stewardship_batch` AS `stewardship_batch`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return StewardshipBatch::InstantiateDbResult($objDbResult);
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