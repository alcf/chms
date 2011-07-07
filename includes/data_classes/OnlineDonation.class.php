<?php
	require(__DATAGEN_CLASSES__ . '/OnlineDonationGen.class.php');

	/**
	 * The OnlineDonation class defined here contains any
	 * customized code for the OnlineDonation class in the
	 * Object Relational Model.  It represents the "online_donation" table 
	 * in the database, and extends from the code generated abstract OnlineDonationGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class OnlineDonation extends OnlineDonationGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objOnlineDonation->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('OnlineDonation Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Hash': return md5(PUBLIC_LOGIN_SALT . $this->intId);
				case 'ConfirmationUrl': return MY_ALCF_URL . '/give/confirmation.php/' . $this->intId . '/' . $this->Hash;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function SendConfirmationEmail() {
			
		}

		public function RefreshDetailsWithCreditCardPayment($blnSave = true) {
			$this->Amount = $this->CreditCardPayment->AmountCharged;
			if ($blnSave) $this->Save();
		}

		/**
		 * This will return an indexed array of amounts, indexed by the stewardship fund id
		 * @return mix[][] an array of arrays, where each item has the 0th index item being the StewardshipFundId and the 1st index being the amount
		 */
		public function GetAmountArray() {
			$mixArrayToReturn = array();
			foreach ($this->GetOnlineDonationLineItemArray() as $objLineItem) {
				$mixArrayToReturn[] = array($objLineItem->StewardshipFundId, $objLineItem->Amount);
			}
			
			return $mixArrayToReturn;
		}
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of OnlineDonation objects
			return OnlineDonation::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::OnlineDonation()->Param1, $strParam1),
					QQ::GreaterThan(QQN::OnlineDonation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single OnlineDonation object
			return OnlineDonation::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OnlineDonation()->Param1, $strParam1),
					QQ::GreaterThan(QQN::OnlineDonation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of OnlineDonation objects
			return OnlineDonation::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::OnlineDonation()->Param1, $strParam1),
					QQ::Equal(QQN::OnlineDonation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = OnlineDonation::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`online_donation`.*
				FROM
					`online_donation` AS `online_donation`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return OnlineDonation::InstantiateDbResult($objDbResult);
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