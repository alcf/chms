<?php
	require(__DATAGEN_CLASSES__ . '/SignupFormGen.class.php');

	/**
	 * The SignupForm class defined here contains any
	 * customized code for the SignupForm class in the
	 * Object Relational Model.  It represents the "signup_form" table 
	 * in the database, and extends from the code generated abstract SignupFormGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class SignupForm extends SignupFormGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objSignupForm->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('SignupForm Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Type': return SignupFormType::$NameArray[$this->intSignupFormTypeId];

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
		 * Returns a boolean on whether or not the person has been registered on this form
		 * @param Person $objPerson
		 * @return boolean
		 */
		public function IsPersonRegistered(Person $objPerson) {
			if (SignupEntry::CountBySignupFormIdPersonId($this->Id, $objPerson->Id))
				return true;
			else
				return false;
		}

		/**
		 * This will return an array of SignupForm items
		 * correctly ordered for a given ministry
		 * @param integer $intMinistryId
		 * @param boolean $blnIncludeConfidential
		 * @param boolean $blnActiveOnly (optional) will only return the "active" ones
		 * @return SignupForm[]
		 */
		public static function LoadOrderedArrayByMinistryIdAndConfidentiality($intMinistryId, $blnIncludeConfidential, $blnActiveOnly = false) {
			$objCondition = QQ::Equal(QQN::SignupForm()->MinistryId, $intMinistryId);

			if (!$blnIncludeConfidential)
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::SignupForm()->ConfidentialFlag, false));

			if ($blnActiveOnly)
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::SignupForm()->ActiveFlag, true));

			return SignupForm::QueryArray($objCondition, QQ::OrderBy(QQN::SignupForm()->DateCreated, false));
		}
		
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of SignupForm objects
			return SignupForm::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::SignupForm()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SignupForm()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single SignupForm object
			return SignupForm::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SignupForm()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SignupForm()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of SignupForm objects
			return SignupForm::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::SignupForm()->Param1, $strParam1),
					QQ::Equal(QQN::SignupForm()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`signup_form`.*
				FROM
					`signup_form` AS `signup_form`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return SignupForm::InstantiateDbResult($objDbResult);
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