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
		protected $intCustomTableJoinCount = 0;

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
		
		public function Delete() {
			foreach ($this->GetQueryConditionArray() as $objQueryCondition) $objQueryCondition->Delete();
			parent::Delete();
		}

		public function RefreshDescription($blnSave = true) {
			$strDescriptionArray = array();
			foreach ($this->GetQueryConditionArray(QQ::OrderBy(QQN::QueryCondition()->Id)) as $objQueryCondition) {
				switch ($objQueryCondition->QueryNode->QueryDataTypeId) {
					case QueryDataType::BooleanValue:
						$strValue = ($objQueryCondition->Value) ? 'true' : 'false';
						break;
					
					case QueryDataType::TypeValue:
						$strTypeName = $objQueryCondition->QueryNode->NodeDetail;
						if (array_key_exists($objQueryCondition->Value, $strTypeName::$NameArray))
							$strValue = $strTypeName::$NameArray[$objQueryCondition->Value];
						else
							$strValue = null;
						break;

					case QueryDataType::ObjectValue:
						$strTokens = explode(' ', $objQueryCondition->QueryNode->NodeDetail);
						$strClassName = $strTokens[0];
						$strMethodName = $strTokens[1];
						$strParameter = $strTokens[2];
						$strProperty = $strTokens[3];
						
						if ($objQueryCondition->Value) {
							$strValue = $strClassName::Load($objQueryCondition->Value)->__get($strProperty);
						} else {
							$strValue = null;
						}
						break;

					case QueryDataType::CustomValue:
						$strValue = $objQueryCondition->QueryNode->GetValueDescriptionForCustomValue($objQueryCondition->Value);
						break;

					default:
						$strValue = $objQueryCondition->Value;
						break;
				}

				if (strlen($strValue)) {
					$strDescriptionArray[] = sprintf('%s %s "%s"', $objQueryCondition->QueryNode->Name, strtolower($objQueryCondition->QueryOperation->Name), $strValue);
				} else {
					$strDescriptionArray[] = sprintf('%s %s', $objQueryCondition->QueryNode->Name, strtolower($objQueryCondition->QueryOperation->Name));
				}
			}

			if (count($strDescriptionArray))
				$this->strDescription = implode("\r\n", $strDescriptionArray);
			else
				$this->strDescription = 'None';
			if ($blnSave) $this->Save();
		}

		/**
		 * This will execute the search query object and should in theory
		 * return a Database Cursor that can be used by Person
		 * @param QQClause $objOptionalClauses
		 * @return QDatabaseResultBase Person cursor
		 */
		public function Execute($objOptionalClauses = null) {
			if (!$this->CountQueryConditions()) return array();

			// Setup the Clauses array
			if (!$objOptionalClauses)
				$objOptionalClauses = array(QQ::Distinct());
			else
				$objOptionalClauses[] = QQ::Distinct();

			// Go through all the Conditions assigned to this SearchQuery
			$objQqConditionToUse = QQ::All();

			foreach ($this->GetQueryConditionArray() as $objQueryCondition) {
				$objQqConditionToAdd = null;

				// First, calculate the QqNode to use.  Be sure to capture any conditions/clauses required during the QqNode calculation process
				$objQqNode = $objQueryCondition->QueryNode->GetQqNode($objQqConditionToAdd, $objOptionalClauses, $objQueryCondition->Value);

				// Go Ahead and Calculate the QqCondition to Add into our overall QqCondition to use
				$objQqConditionToAdd = $this->CalculateQqCondition($objQueryCondition, $objQqNode, $objQqConditionToAdd);
				$objQqConditionToUse = QQ::AndCondition($objQqConditionToUse, $objQqConditionToAdd);
			}

			// Return an array of Person objects
			return Person::QueryCursor($objQqConditionToUse, $objOptionalClauses);
		}

		protected function CalculateQqCondition(QueryCondition $objQueryCondition, QQNode $objQqNode, QQCondition $objQqConditionToAdd = null) {
			// Get the comparison Query Operation we are using 
			$objOperation = $objQueryCondition->QueryOperation;				

			// Get the QQ Factory Name we are using -- this becomes the Qq Method Name we run to construct
			// the QcodoQueryCondition
			$strMethodName = $objOperation->QqFactoryName;

			// Generate the QcodoQueryCondition
			switch ($objQueryCondition->QueryNode->QueryDataTypeId) {
				case QueryDataType::BooleanValue:
					if ($objQueryCondition->Value) {
						$objQqCondition = QQ::Equal($objQqNode, true);
					} else {
						$objQqCondition = QQ::OrCondition(
							QQ::Equal($objQqNode, false),
							QQ::IsNull($objQqNode)
						);
					}
					break;

				default:
					if ($objOperation->ArgumentFlag) {
						$strArgument = $objOperation->ArgumentPrepend . $objQueryCondition->Value . $objOperation->ArgumentPostpend;
						$objQqCondition = QQ::$strMethodName($objQqNode, $strArgument);
					} else {
						$objQqCondition = QQ::$strMethodName($objQqNode);
					}
					break;
			}

			if ($objQqConditionToAdd)
				$objQqCondition = QQ::AndCondition($objQqConditionToAdd, $objQqCondition);

			return $objQqCondition;
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