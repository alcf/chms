<?php
	/**
	 * The abstract QueryConditionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the QueryCondition subclass which
	 * extends this QueryConditionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the QueryCondition class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $SearchQueryId the value for intSearchQueryId (Not Null)
	 * @property integer $QueryOperationId the value for intQueryOperationId (Not Null)
	 * @property integer $QueryNodeId the value for intQueryNodeId (Not Null)
	 * @property string $Value the value for strValue 
	 * @property SearchQuery $SearchQuery the value for the SearchQuery object referenced by intSearchQueryId (Not Null)
	 * @property QueryOperation $QueryOperation the value for the QueryOperation object referenced by intQueryOperationId (Not Null)
	 * @property QueryNode $QueryNode the value for the QueryNode object referenced by intQueryNodeId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class QueryConditionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column query_condition.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column query_condition.search_query_id
		 * @var integer intSearchQueryId
		 */
		protected $intSearchQueryId;
		const SearchQueryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column query_condition.query_operation_id
		 * @var integer intQueryOperationId
		 */
		protected $intQueryOperationId;
		const QueryOperationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column query_condition.query_node_id
		 * @var integer intQueryNodeId
		 */
		protected $intQueryNodeId;
		const QueryNodeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column query_condition.value
		 * @var string strValue
		 */
		protected $strValue;
		const ValueMaxLength = 255;
		const ValueDefault = null;


		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column query_condition.search_query_id.
		 *
		 * NOTE: Always use the SearchQuery property getter to correctly retrieve this SearchQuery object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SearchQuery objSearchQuery
		 */
		protected $objSearchQuery;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column query_condition.query_operation_id.
		 *
		 * NOTE: Always use the QueryOperation property getter to correctly retrieve this QueryOperation object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var QueryOperation objQueryOperation
		 */
		protected $objQueryOperation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column query_condition.query_node_id.
		 *
		 * NOTE: Always use the QueryNode property getter to correctly retrieve this QueryNode object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var QueryNode objQueryNode
		 */
		protected $objQueryNode;





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a QueryCondition from PK Info
		 * @param integer $intId
		 * @return QueryCondition
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return QueryCondition::QuerySingle(
				QQ::Equal(QQN::QueryCondition()->Id, $intId)
			);
		}

		/**
		 * Load all QueryConditions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return QueryCondition[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call QueryCondition::QueryArray to perform the LoadAll query
			try {
				return QueryCondition::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all QueryConditions
		 * @return int
		 */
		public static function CountAll() {
			// Call QueryCondition::QueryCount to perform the CountAll query
			return QueryCondition::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = QueryCondition::GetDatabase();

			// Create/Build out the QueryBuilder object with QueryCondition-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'query_condition');
			QueryCondition::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('query_condition');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single QueryCondition object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QueryCondition the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = QueryCondition::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new QueryCondition object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = QueryCondition::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return QueryCondition::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of QueryCondition objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QueryCondition[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = QueryCondition::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return QueryCondition::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = QueryCondition::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of QueryCondition objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = QueryCondition::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = QueryCondition::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'query_condition_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with QueryCondition-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				QueryCondition::GetSelectFields($objQueryBuilder);
				QueryCondition::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return QueryCondition::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this QueryCondition
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'query_condition';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'search_query_id', $strAliasPrefix . 'search_query_id');
			$objBuilder->AddSelectItem($strTableName, 'query_operation_id', $strAliasPrefix . 'query_operation_id');
			$objBuilder->AddSelectItem($strTableName, 'query_node_id', $strAliasPrefix . 'query_node_id');
			$objBuilder->AddSelectItem($strTableName, 'value', $strAliasPrefix . 'value');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a QueryCondition from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this QueryCondition::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return QueryCondition
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the QueryCondition object
			$objToReturn = new QueryCondition();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'search_query_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'search_query_id'] : $strAliasPrefix . 'search_query_id';
			$objToReturn->intSearchQueryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'query_operation_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'query_operation_id'] : $strAliasPrefix . 'query_operation_id';
			$objToReturn->intQueryOperationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'query_node_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'query_node_id'] : $strAliasPrefix . 'query_node_id';
			$objToReturn->intQueryNodeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'value', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'value'] : $strAliasPrefix . 'value';
			$objToReturn->strValue = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'query_condition__';

			// Check for SearchQuery Early Binding
			$strAlias = $strAliasPrefix . 'search_query_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSearchQuery = SearchQuery::InstantiateDbRow($objDbRow, $strAliasPrefix . 'search_query_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for QueryOperation Early Binding
			$strAlias = $strAliasPrefix . 'query_operation_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objQueryOperation = QueryOperation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'query_operation_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for QueryNode Early Binding
			$strAlias = $strAliasPrefix . 'query_node_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objQueryNode = QueryNode::InstantiateDbRow($objDbRow, $strAliasPrefix . 'query_node_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of QueryConditions from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return QueryCondition[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = QueryCondition::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = QueryCondition::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single QueryCondition object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return QueryCondition next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return QueryCondition::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single QueryCondition object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return QueryCondition
		*/
		public static function LoadById($intId) {
			return QueryCondition::QuerySingle(
				QQ::Equal(QQN::QueryCondition()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of QueryCondition objects,
		 * by SearchQueryId Index(es)
		 * @param integer $intSearchQueryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return QueryCondition[]
		*/
		public static function LoadArrayBySearchQueryId($intSearchQueryId, $objOptionalClauses = null) {
			// Call QueryCondition::QueryArray to perform the LoadArrayBySearchQueryId query
			try {
				return QueryCondition::QueryArray(
					QQ::Equal(QQN::QueryCondition()->SearchQueryId, $intSearchQueryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count QueryConditions
		 * by SearchQueryId Index(es)
		 * @param integer $intSearchQueryId
		 * @return int
		*/
		public static function CountBySearchQueryId($intSearchQueryId) {
			// Call QueryCondition::QueryCount to perform the CountBySearchQueryId query
			return QueryCondition::QueryCount(
				QQ::Equal(QQN::QueryCondition()->SearchQueryId, $intSearchQueryId)
			);
		}
			
		/**
		 * Load an array of QueryCondition objects,
		 * by QueryOperationId Index(es)
		 * @param integer $intQueryOperationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return QueryCondition[]
		*/
		public static function LoadArrayByQueryOperationId($intQueryOperationId, $objOptionalClauses = null) {
			// Call QueryCondition::QueryArray to perform the LoadArrayByQueryOperationId query
			try {
				return QueryCondition::QueryArray(
					QQ::Equal(QQN::QueryCondition()->QueryOperationId, $intQueryOperationId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count QueryConditions
		 * by QueryOperationId Index(es)
		 * @param integer $intQueryOperationId
		 * @return int
		*/
		public static function CountByQueryOperationId($intQueryOperationId) {
			// Call QueryCondition::QueryCount to perform the CountByQueryOperationId query
			return QueryCondition::QueryCount(
				QQ::Equal(QQN::QueryCondition()->QueryOperationId, $intQueryOperationId)
			);
		}
			
		/**
		 * Load an array of QueryCondition objects,
		 * by QueryNodeId Index(es)
		 * @param integer $intQueryNodeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return QueryCondition[]
		*/
		public static function LoadArrayByQueryNodeId($intQueryNodeId, $objOptionalClauses = null) {
			// Call QueryCondition::QueryArray to perform the LoadArrayByQueryNodeId query
			try {
				return QueryCondition::QueryArray(
					QQ::Equal(QQN::QueryCondition()->QueryNodeId, $intQueryNodeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count QueryConditions
		 * by QueryNodeId Index(es)
		 * @param integer $intQueryNodeId
		 * @return int
		*/
		public static function CountByQueryNodeId($intQueryNodeId) {
			// Call QueryCondition::QueryCount to perform the CountByQueryNodeId query
			return QueryCondition::QueryCount(
				QQ::Equal(QQN::QueryCondition()->QueryNodeId, $intQueryNodeId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this QueryCondition
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = QueryCondition::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `query_condition` (
							`search_query_id`,
							`query_operation_id`,
							`query_node_id`,
							`value`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intSearchQueryId) . ',
							' . $objDatabase->SqlVariable($this->intQueryOperationId) . ',
							' . $objDatabase->SqlVariable($this->intQueryNodeId) . ',
							' . $objDatabase->SqlVariable($this->strValue) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('query_condition', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`query_condition`
						SET
							`search_query_id` = ' . $objDatabase->SqlVariable($this->intSearchQueryId) . ',
							`query_operation_id` = ' . $objDatabase->SqlVariable($this->intQueryOperationId) . ',
							`query_node_id` = ' . $objDatabase->SqlVariable($this->intQueryNodeId) . ',
							`value` = ' . $objDatabase->SqlVariable($this->strValue) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this QueryCondition
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this QueryCondition with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = QueryCondition::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`query_condition`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all QueryConditions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = QueryCondition::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`query_condition`');
		}

		/**
		 * Truncate query_condition table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = QueryCondition::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `query_condition`');
		}

		/**
		 * Reload this QueryCondition from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved QueryCondition object.');

			// Reload the Object
			$objReloaded = QueryCondition::Load($this->intId);

			// Update $this's local variables to match
			$this->SearchQueryId = $objReloaded->SearchQueryId;
			$this->QueryOperationId = $objReloaded->QueryOperationId;
			$this->QueryNodeId = $objReloaded->QueryNodeId;
			$this->strValue = $objReloaded->strValue;
		}



		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Id':
					// Gets the value for intId (Read-Only PK)
					// @return integer
					return $this->intId;

				case 'SearchQueryId':
					// Gets the value for intSearchQueryId (Not Null)
					// @return integer
					return $this->intSearchQueryId;

				case 'QueryOperationId':
					// Gets the value for intQueryOperationId (Not Null)
					// @return integer
					return $this->intQueryOperationId;

				case 'QueryNodeId':
					// Gets the value for intQueryNodeId (Not Null)
					// @return integer
					return $this->intQueryNodeId;

				case 'Value':
					// Gets the value for strValue 
					// @return string
					return $this->strValue;


				///////////////////
				// Member Objects
				///////////////////
				case 'SearchQuery':
					// Gets the value for the SearchQuery object referenced by intSearchQueryId (Not Null)
					// @return SearchQuery
					try {
						if ((!$this->objSearchQuery) && (!is_null($this->intSearchQueryId)))
							$this->objSearchQuery = SearchQuery::Load($this->intSearchQueryId);
						return $this->objSearchQuery;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'QueryOperation':
					// Gets the value for the QueryOperation object referenced by intQueryOperationId (Not Null)
					// @return QueryOperation
					try {
						if ((!$this->objQueryOperation) && (!is_null($this->intQueryOperationId)))
							$this->objQueryOperation = QueryOperation::Load($this->intQueryOperationId);
						return $this->objQueryOperation;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'QueryNode':
					// Gets the value for the QueryNode object referenced by intQueryNodeId (Not Null)
					// @return QueryNode
					try {
						if ((!$this->objQueryNode) && (!is_null($this->intQueryNodeId)))
							$this->objQueryNode = QueryNode::Load($this->intQueryNodeId);
						return $this->objQueryNode;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


				case '__Restored':
					return $this->__blnRestored;

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
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'SearchQueryId':
					// Sets the value for intSearchQueryId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSearchQuery = null;
						return ($this->intSearchQueryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'QueryOperationId':
					// Sets the value for intQueryOperationId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objQueryOperation = null;
						return ($this->intQueryOperationId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'QueryNodeId':
					// Sets the value for intQueryNodeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objQueryNode = null;
						return ($this->intQueryNodeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Value':
					// Sets the value for strValue 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strValue = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'SearchQuery':
					// Sets the value for the SearchQuery object referenced by intSearchQueryId (Not Null)
					// @param SearchQuery $mixValue
					// @return SearchQuery
					if (is_null($mixValue)) {
						$this->intSearchQueryId = null;
						$this->objSearchQuery = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SearchQuery object
						try {
							$mixValue = QType::Cast($mixValue, 'SearchQuery');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED SearchQuery object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved SearchQuery for this QueryCondition');

						// Update Local Member Variables
						$this->objSearchQuery = $mixValue;
						$this->intSearchQueryId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'QueryOperation':
					// Sets the value for the QueryOperation object referenced by intQueryOperationId (Not Null)
					// @param QueryOperation $mixValue
					// @return QueryOperation
					if (is_null($mixValue)) {
						$this->intQueryOperationId = null;
						$this->objQueryOperation = null;
						return null;
					} else {
						// Make sure $mixValue actually is a QueryOperation object
						try {
							$mixValue = QType::Cast($mixValue, 'QueryOperation');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED QueryOperation object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved QueryOperation for this QueryCondition');

						// Update Local Member Variables
						$this->objQueryOperation = $mixValue;
						$this->intQueryOperationId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'QueryNode':
					// Sets the value for the QueryNode object referenced by intQueryNodeId (Not Null)
					// @param QueryNode $mixValue
					// @return QueryNode
					if (is_null($mixValue)) {
						$this->intQueryNodeId = null;
						$this->objQueryNode = null;
						return null;
					} else {
						// Make sure $mixValue actually is a QueryNode object
						try {
							$mixValue = QType::Cast($mixValue, 'QueryNode');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED QueryNode object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved QueryNode for this QueryCondition');

						// Update Local Member Variables
						$this->objQueryNode = $mixValue;
						$this->intQueryNodeId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="QueryCondition"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="SearchQuery" type="xsd1:SearchQuery"/>';
			$strToReturn .= '<element name="QueryOperation" type="xsd1:QueryOperation"/>';
			$strToReturn .= '<element name="QueryNode" type="xsd1:QueryNode"/>';
			$strToReturn .= '<element name="Value" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('QueryCondition', $strComplexTypeArray)) {
				$strComplexTypeArray['QueryCondition'] = QueryCondition::GetSoapComplexTypeXml();
				SearchQuery::AlterSoapComplexTypeArray($strComplexTypeArray);
				QueryOperation::AlterSoapComplexTypeArray($strComplexTypeArray);
				QueryNode::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, QueryCondition::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new QueryCondition();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'SearchQuery')) &&
				($objSoapObject->SearchQuery))
				$objToReturn->SearchQuery = SearchQuery::GetObjectFromSoapObject($objSoapObject->SearchQuery);
			if ((property_exists($objSoapObject, 'QueryOperation')) &&
				($objSoapObject->QueryOperation))
				$objToReturn->QueryOperation = QueryOperation::GetObjectFromSoapObject($objSoapObject->QueryOperation);
			if ((property_exists($objSoapObject, 'QueryNode')) &&
				($objSoapObject->QueryNode))
				$objToReturn->QueryNode = QueryNode::GetObjectFromSoapObject($objSoapObject->QueryNode);
			if (property_exists($objSoapObject, 'Value'))
				$objToReturn->strValue = $objSoapObject->Value;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, QueryCondition::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSearchQuery)
				$objObject->objSearchQuery = SearchQuery::GetSoapObjectFromObject($objObject->objSearchQuery, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSearchQueryId = null;
			if ($objObject->objQueryOperation)
				$objObject->objQueryOperation = QueryOperation::GetSoapObjectFromObject($objObject->objQueryOperation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intQueryOperationId = null;
			if ($objObject->objQueryNode)
				$objObject->objQueryNode = QueryNode::GetSoapObjectFromObject($objObject->objQueryNode, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intQueryNodeId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeQueryCondition extends QQNode {
		protected $strTableName = 'query_condition';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'QueryCondition';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SearchQueryId':
					return new QQNode('search_query_id', 'SearchQueryId', 'integer', $this);
				case 'SearchQuery':
					return new QQNodeSearchQuery('search_query_id', 'SearchQuery', 'integer', $this);
				case 'QueryOperationId':
					return new QQNode('query_operation_id', 'QueryOperationId', 'integer', $this);
				case 'QueryOperation':
					return new QQNodeQueryOperation('query_operation_id', 'QueryOperation', 'integer', $this);
				case 'QueryNodeId':
					return new QQNode('query_node_id', 'QueryNodeId', 'integer', $this);
				case 'QueryNode':
					return new QQNodeQueryNode('query_node_id', 'QueryNode', 'integer', $this);
				case 'Value':
					return new QQNode('value', 'Value', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

	class QQReverseReferenceNodeQueryCondition extends QQReverseReferenceNode {
		protected $strTableName = 'query_condition';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'QueryCondition';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SearchQueryId':
					return new QQNode('search_query_id', 'SearchQueryId', 'integer', $this);
				case 'SearchQuery':
					return new QQNodeSearchQuery('search_query_id', 'SearchQuery', 'integer', $this);
				case 'QueryOperationId':
					return new QQNode('query_operation_id', 'QueryOperationId', 'integer', $this);
				case 'QueryOperation':
					return new QQNodeQueryOperation('query_operation_id', 'QueryOperation', 'integer', $this);
				case 'QueryNodeId':
					return new QQNode('query_node_id', 'QueryNodeId', 'integer', $this);
				case 'QueryNode':
					return new QQNodeQueryNode('query_node_id', 'QueryNode', 'integer', $this);
				case 'Value':
					return new QQNode('value', 'Value', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>