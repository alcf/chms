<?php
	require(__DATAGEN_CLASSES__ . '/MarriageGen.class.php');

	/**
	 * The Marriage class defined here contains any
	 * customized code for the Marriage class in the
	 * Object Relational Model.  It represents the "marriage" table 
	 * in the database, and extends from the code generated abstract MarriageGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class Marriage extends MarriageGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objMarriage->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Marriage Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'MarriageStatus': return MarriageStatusType::$NameArray[$this->intMarriageStatusTypeId];

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
		 * This should be the method called to DELETE a marriage record from the application.
		 * This will ensure any linked records are deleted, AND it will ensure to refresh marital statuses
		 */
		public function DeleteThisAndLinked() {
			$objPerson = $this->Person;
			$objSpouse = $this->MarriedToPerson;

			// Unlink and delete linked (if applicable)
			if ($objLinkedMarriage = $this->LinkedMarriage) {
				$this->intLinkedMarriageId = null;
				$this->Save();
				$objLinkedMarriage->Delete();
			}

			// Delete THIS
			$this->Delete();

			// Update Statuses
			$objPerson->RefreshMaritalStatusTypeId();
			if ($objSpouse) $objSpouse->RefreshMaritalStatusTypeId();
		}

		/**
		 * Given this marriage record, this will update the "linked" marriage record with the same stats and details.
		 * Only does anything if this marriage record has a MarriedToPerson object (otherwise, this does nothing).
		 * 
		 * This will CREATE the Linked Marriage record if none yet exists.
		 * 
		 */
		public function UpdateLinkedMarriage() {
			if (!$this->MarriedToPersonId) return;

			$objLinkedMarriage = $this->LinkedMarriage;

			if (!$objLinkedMarriage) {
				$objLinkedMarriage = new Marriage();
				$objLinkedMarriage->LinkedMarriage = $this;
				$objLinkedMarriage->Person = $this->MarriedToPerson;
				$objLinkedMarriage->MarriedToPerson = $this->Person;
			}

			$objLinkedMarriage->DateStart = $this->DateStart;
			$objLinkedMarriage->DateEnd = $this->DateEnd;
			$objLinkedMarriage->MarriageStatusTypeId = $this->intMarriageStatusTypeId;
			$objLinkedMarriage->Save();

			if (!$this->intLinkedMarriageId) {
				$this->intLinkedMarriageId = $objLinkedMarriage->Id;
				$this->Save();
			}
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Marriage objects
			return Marriage::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Marriage()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Marriage()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Marriage object
			return Marriage::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Marriage()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Marriage()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Marriage objects
			return Marriage::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Marriage()->Param1, $strParam1),
					QQ::Equal(QQN::Marriage()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Marriage::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`marriage`.*
				FROM
					`marriage` AS `marriage`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Marriage::InstantiateDbResult($objDbResult);
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