<?php
	require(__DATAGEN_CLASSES__ . '/SearchQueryGen.class.php');

	/**
	 * The SearchQuery class defined here contains any
	 * customized code for the SearchQuery class in the
	 * Object Relational Model.  It represents the "search_query" table 
	 * in the database, and extends from the code generated abstract SearchQueryGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class SearchQuery extends SearchQueryGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objSearchQuery->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('SearchQuery Object %s',  $this->intId);
		}

		public function RefreshDescription($blnSave = true) {
			$strDescriptionArray = array();
			foreach ($this->GetQueryConditionArray(QQ::OrderBy(QQN::QueryCondition()->Id)) as $objQueryCondition) {
				if (strlen($objQueryCondition->Value)) {
					$strDescriptionArray[] = sprintf('%s %s "%s"', $objQueryCondition->QueryNode->Name, strtolower($objQueryCondition->QueryOperation->Name), $objQueryCondition->Value);
				} else {
					$strDescriptionArray[] = sprintf('%s %s', $objQueryCondition->QueryNode->Name, strtolower($objQueryCondition->QueryOperation->Name));
				}
			}
			$this->strDescription = implode("\r\n", $strDescriptionArray);
			if ($blnSave) $this->Save();
		}

		/**
		 * This will execute the search query object and should in theory
		 * return an array of Person objects
		 * @param QQClause $objOptionalClauses
		 * @return Person[]
		 */
		public function Execute($objOptionalClauses = null) {
			// Setup the Clauses array
			if (!$objOptionalClauses)
				$objOptionalClauses = array(QQ::Distinct());
			else
				$objOptionalClauses[] = QQ::Distinct();

			// Go through all the Conditions assigned to this SearchQuery
			$objQqConditionToUse = QQ::All();

			foreach ($this->GetQueryConditionArray() as $objQueryCondition) {
				// Get the QcodoQuery Node we are operating on for this condition
				$objQqNode = QQN::Person();
				foreach (explode('->', $objQueryCondition->QueryNode->QcodoQueryNode) as $strPropertyName)
					$objQqNode = $objQqNode->__get($strPropertyName);

				// Get the comparison Query Operation we are using 
				$objOperation = $objQueryCondition->QueryOperation;

				// Get the QQ Factory Name we are using -- this becomes the Qq Method Name we run to construct
				// the QcodoQueryCondition
				$strMethodName = $objOperation->QqFactoryName;

				// Generate the QcodoQueryCondition
				if ($objOperation->ArgumentFlag) {
					$strArgument = $objOperation->ArgumentPrepend . $objQueryCondition->Value . $objOperation->ArgumentPostpend;
					$objQqConditionToAdd = QQ::$strMethodName($objQqNode, $strArgument);
				} else {
					$objQqConditionToAdd = QQ::$strMethodName($objQqNode);
				}

				// Add any Node Conditions (if applicable)
				$objQqConditionToAddForNode = null;
				if ($objQueryCondition->QueryNode->QcodoQueryCondition) {
					foreach (explode(',', $objQueryCondition->QueryNode->QcodoQueryCondition) as $strNodeCondition) {
						// Index 0 - The QqNode that the NodeCondition operates on
						// Index 1 - The QQ:: Factory Name for the condition
						// Index 2 (if applicable) - the value to compare with
						$strTokens = explode(' ', $strNodeCondition);

						// Figure out the NodeCondition QqNode
						$objQqNode = QQN::Person();
						foreach (explode('->', $strTokens[0]) as $strPropertyName)
							$objQqNode = $objQqNode->__get($strPropertyName);

						// Get the Method Name
						$strMethodName = $strTokens[1];

						// Add the Condition with argument
						if (array_key_exists(2, $strTokens)) {
							$objQqConditionToAddForNode = QQ::$strMethodName($objQqNode, $strTokens[2]);

						// Add the Condition WITHOUT argument
						} else {
							$objQqConditionToAddForNode = QQ::$strMethodName($objQqNode);
						}
					}
				}

				if ($objQqConditionToAddForNode)
					$objQqConditionToUse = QQ::AndCondition($objQqConditionToUse, $objQqConditionToAdd, $objQqConditionToAddForNode);
				else
					$objQqConditionToUse = QQ::AndCondition($objQqConditionToUse, $objQqConditionToAdd);
			}

			// Return an array of Person objects
			return Person::QueryArray($objQqConditionToUse, $objOptionalClauses);
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of SearchQuery objects
			return SearchQuery::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::SearchQuery()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SearchQuery()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single SearchQuery object
			return SearchQuery::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SearchQuery()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SearchQuery()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of SearchQuery objects
			return SearchQuery::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::SearchQuery()->Param1, $strParam1),
					QQ::Equal(QQN::SearchQuery()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = SearchQuery::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`search_query`.*
				FROM
					`search_query` AS `search_query`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return SearchQuery::InstantiateDbResult($objDbResult);
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