<?php
	/**
	 * The abstract QueryNodeGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the QueryNode subclass which
	 * extends this QueryNodeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the QueryNode class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Name the value for strName 
	 * @property string $QcodoQueryNode the value for strQcodoQueryNode 
	 * @property string $DataType the value for strDataType 
	 * @property string $QcodoQueryCondition the value for strQcodoQueryCondition 
	 * @property boolean $RequiresDistinctFlag the value for blnRequiresDistinctFlag 
	 * @property QueryCondition $_QueryCondition the value for the private _objQueryCondition (Read-Only) if set due to an expansion on the query_condition.query_node reverse relationship
	 * @property QueryCondition[] $_QueryConditionArray the value for the private _objQueryConditionArray (Read-Only) if set due to an ExpandAsArray on the query_condition.query_node reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class QueryNodeGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column query_node.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column query_node.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 100;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column query_node.qcodo_query_node
		 * @var string strQcodoQueryNode
		 */
		protected $strQcodoQueryNode;
		const QcodoQueryNodeDefault = null;


		/**
		 * Protected member variable that maps to the database column query_node.data_type
		 * @var string strDataType
		 */
		protected $strDataType;
		const DataTypeMaxLength = 100;
		const DataTypeDefault = null;


		/**
		 * Protected member variable that maps to the database column query_node.qcodo_query_condition
		 * @var string strQcodoQueryCondition
		 */
		protected $strQcodoQueryCondition;
		const QcodoQueryConditionDefault = null;


		/**
		 * Protected member variable that maps to the database column query_node.requires_distinct_flag
		 * @var boolean blnRequiresDistinctFlag
		 */
		protected $blnRequiresDistinctFlag;
		const RequiresDistinctFlagDefault = null;


		/**
		 * Private member variable that stores a reference to a single QueryCondition object
		 * (of type QueryCondition), if this QueryNode object was restored with
		 * an expansion on the query_condition association table.
		 * @var QueryCondition _objQueryCondition;
		 */
		private $_objQueryCondition;

		/**
		 * Private member variable that stores a reference to an array of QueryCondition objects
		 * (of type QueryCondition[]), if this QueryNode object was restored with
		 * an ExpandAsArray on the query_condition association table.
		 * @var QueryCondition[] _objQueryConditionArray;
		 */
		private $_objQueryConditionArray = array();

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
		 * Load a QueryNode from PK Info
		 * @param integer $intId
		 * @return QueryNode
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return QueryNode::QuerySingle(
				QQ::Equal(QQN::QueryNode()->Id, $intId)
			);
		}

		/**
		 * Load all QueryNodes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return QueryNode[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call QueryNode::QueryArray to perform the LoadAll query
			try {
				return QueryNode::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all QueryNodes
		 * @return int
		 */
		public static function CountAll() {
			// Call QueryNode::QueryCount to perform the CountAll query
			return QueryNode::QueryCount(QQ::All());
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
			$objDatabase = QueryNode::GetDatabase();

			// Create/Build out the QueryBuilder object with QueryNode-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'query_node');
			QueryNode::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('query_node');

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
		 * Static Qcodo Query method to query for a single QueryNode object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QueryNode the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = QueryNode::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new QueryNode object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return QueryNode::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of QueryNode objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QueryNode[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = QueryNode::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return QueryNode::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = QueryNode::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of QueryNode objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = QueryNode::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = QueryNode::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'query_node_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with QueryNode-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				QueryNode::GetSelectFields($objQueryBuilder);
				QueryNode::GetFromFields($objQueryBuilder);

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
			return QueryNode::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this QueryNode
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'query_node';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'qcodo_query_node', $strAliasPrefix . 'qcodo_query_node');
			$objBuilder->AddSelectItem($strTableName, 'data_type', $strAliasPrefix . 'data_type');
			$objBuilder->AddSelectItem($strTableName, 'qcodo_query_condition', $strAliasPrefix . 'qcodo_query_condition');
			$objBuilder->AddSelectItem($strTableName, 'requires_distinct_flag', $strAliasPrefix . 'requires_distinct_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a QueryNode from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this QueryNode::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return QueryNode
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'query_node__';


				$strAlias = $strAliasPrefix . 'querycondition__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objQueryConditionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objQueryConditionArray[$intPreviousChildItemCount - 1];
						$objChildItem = QueryCondition::InstantiateDbRow($objDbRow, $strAliasPrefix . 'querycondition__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objQueryConditionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objQueryConditionArray[] = QueryCondition::InstantiateDbRow($objDbRow, $strAliasPrefix . 'querycondition__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'query_node__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the QueryNode object
			$objToReturn = new QueryNode();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'qcodo_query_node', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'qcodo_query_node'] : $strAliasPrefix . 'qcodo_query_node';
			$objToReturn->strQcodoQueryNode = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'data_type', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'data_type'] : $strAliasPrefix . 'data_type';
			$objToReturn->strDataType = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'qcodo_query_condition', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'qcodo_query_condition'] : $strAliasPrefix . 'qcodo_query_condition';
			$objToReturn->strQcodoQueryCondition = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'requires_distinct_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'requires_distinct_flag'] : $strAliasPrefix . 'requires_distinct_flag';
			$objToReturn->blnRequiresDistinctFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'query_node__';




			// Check for QueryCondition Virtual Binding
			$strAlias = $strAliasPrefix . 'querycondition__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objQueryConditionArray[] = QueryCondition::InstantiateDbRow($objDbRow, $strAliasPrefix . 'querycondition__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objQueryCondition = QueryCondition::InstantiateDbRow($objDbRow, $strAliasPrefix . 'querycondition__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of QueryNodes from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return QueryNode[]
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
					$objItem = QueryNode::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = QueryNode::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single QueryNode object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return QueryNode next row resulting from the query
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
			return QueryNode::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single QueryNode object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return QueryNode
		*/
		public static function LoadById($intId) {
			return QueryNode::QuerySingle(
				QQ::Equal(QQN::QueryNode()->Id, $intId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this QueryNode
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = QueryNode::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `query_node` (
							`name`,
							`qcodo_query_node`,
							`data_type`,
							`qcodo_query_condition`,
							`requires_distinct_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strQcodoQueryNode) . ',
							' . $objDatabase->SqlVariable($this->strDataType) . ',
							' . $objDatabase->SqlVariable($this->strQcodoQueryCondition) . ',
							' . $objDatabase->SqlVariable($this->blnRequiresDistinctFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('query_node', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`query_node`
						SET
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`qcodo_query_node` = ' . $objDatabase->SqlVariable($this->strQcodoQueryNode) . ',
							`data_type` = ' . $objDatabase->SqlVariable($this->strDataType) . ',
							`qcodo_query_condition` = ' . $objDatabase->SqlVariable($this->strQcodoQueryCondition) . ',
							`requires_distinct_flag` = ' . $objDatabase->SqlVariable($this->blnRequiresDistinctFlag) . '
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
		 * Delete this QueryNode
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this QueryNode with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = QueryNode::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`query_node`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all QueryNodes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = QueryNode::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`query_node`');
		}

		/**
		 * Truncate query_node table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = QueryNode::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `query_node`');
		}

		/**
		 * Reload this QueryNode from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved QueryNode object.');

			// Reload the Object
			$objReloaded = QueryNode::Load($this->intId);

			// Update $this's local variables to match
			$this->strName = $objReloaded->strName;
			$this->strQcodoQueryNode = $objReloaded->strQcodoQueryNode;
			$this->strDataType = $objReloaded->strDataType;
			$this->strQcodoQueryCondition = $objReloaded->strQcodoQueryCondition;
			$this->blnRequiresDistinctFlag = $objReloaded->blnRequiresDistinctFlag;
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

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'QcodoQueryNode':
					// Gets the value for strQcodoQueryNode 
					// @return string
					return $this->strQcodoQueryNode;

				case 'DataType':
					// Gets the value for strDataType 
					// @return string
					return $this->strDataType;

				case 'QcodoQueryCondition':
					// Gets the value for strQcodoQueryCondition 
					// @return string
					return $this->strQcodoQueryCondition;

				case 'RequiresDistinctFlag':
					// Gets the value for blnRequiresDistinctFlag 
					// @return boolean
					return $this->blnRequiresDistinctFlag;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_QueryCondition':
					// Gets the value for the private _objQueryCondition (Read-Only)
					// if set due to an expansion on the query_condition.query_node reverse relationship
					// @return QueryCondition
					return $this->_objQueryCondition;

				case '_QueryConditionArray':
					// Gets the value for the private _objQueryConditionArray (Read-Only)
					// if set due to an ExpandAsArray on the query_condition.query_node reverse relationship
					// @return QueryCondition[]
					return (array) $this->_objQueryConditionArray;


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
				case 'Name':
					// Sets the value for strName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'QcodoQueryNode':
					// Sets the value for strQcodoQueryNode 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strQcodoQueryNode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DataType':
					// Sets the value for strDataType 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDataType = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'QcodoQueryCondition':
					// Sets the value for strQcodoQueryCondition 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strQcodoQueryCondition = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RequiresDistinctFlag':
					// Sets the value for blnRequiresDistinctFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnRequiresDistinctFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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

			
		
		// Related Objects' Methods for QueryCondition
		//-------------------------------------------------------------------

		/**
		 * Gets all associated QueryConditions as an array of QueryCondition objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return QueryCondition[]
		*/ 
		public function GetQueryConditionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return QueryCondition::LoadArrayByQueryNode($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated QueryConditions
		 * @return int
		*/ 
		public function CountQueryConditions() {
			if ((is_null($this->intId)))
				return 0;

			return QueryCondition::CountByQueryNode($this->intId);
		}

		/**
		 * Associates a QueryCondition
		 * @param QueryCondition $objQueryCondition
		 * @return void
		*/ 
		public function AssociateQueryCondition(QueryCondition $objQueryCondition) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateQueryCondition on this unsaved QueryNode.');
			if ((is_null($objQueryCondition->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateQueryCondition on this QueryNode with an unsaved QueryCondition.');

			// Get the Database Object for this Class
			$objDatabase = QueryNode::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`query_condition`
				SET
					`query_node` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objQueryCondition->Id) . '
			');
		}

		/**
		 * Unassociates a QueryCondition
		 * @param QueryCondition $objQueryCondition
		 * @return void
		*/ 
		public function UnassociateQueryCondition(QueryCondition $objQueryCondition) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateQueryCondition on this unsaved QueryNode.');
			if ((is_null($objQueryCondition->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateQueryCondition on this QueryNode with an unsaved QueryCondition.');

			// Get the Database Object for this Class
			$objDatabase = QueryNode::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`query_condition`
				SET
					`query_node` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objQueryCondition->Id) . ' AND
					`query_node` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all QueryConditions
		 * @return void
		*/ 
		public function UnassociateAllQueryConditions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateQueryCondition on this unsaved QueryNode.');

			// Get the Database Object for this Class
			$objDatabase = QueryNode::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`query_condition`
				SET
					`query_node` = null
				WHERE
					`query_node` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated QueryCondition
		 * @param QueryCondition $objQueryCondition
		 * @return void
		*/ 
		public function DeleteAssociatedQueryCondition(QueryCondition $objQueryCondition) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateQueryCondition on this unsaved QueryNode.');
			if ((is_null($objQueryCondition->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateQueryCondition on this QueryNode with an unsaved QueryCondition.');

			// Get the Database Object for this Class
			$objDatabase = QueryNode::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`query_condition`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objQueryCondition->Id) . ' AND
					`query_node` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated QueryConditions
		 * @return void
		*/ 
		public function DeleteAllQueryConditions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateQueryCondition on this unsaved QueryNode.');

			// Get the Database Object for this Class
			$objDatabase = QueryNode::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`query_condition`
				WHERE
					`query_node` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="QueryNode"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="QcodoQueryNode" type="xsd:string"/>';
			$strToReturn .= '<element name="DataType" type="xsd:string"/>';
			$strToReturn .= '<element name="QcodoQueryCondition" type="xsd:string"/>';
			$strToReturn .= '<element name="RequiresDistinctFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('QueryNode', $strComplexTypeArray)) {
				$strComplexTypeArray['QueryNode'] = QueryNode::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, QueryNode::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new QueryNode();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'QcodoQueryNode'))
				$objToReturn->strQcodoQueryNode = $objSoapObject->QcodoQueryNode;
			if (property_exists($objSoapObject, 'DataType'))
				$objToReturn->strDataType = $objSoapObject->DataType;
			if (property_exists($objSoapObject, 'QcodoQueryCondition'))
				$objToReturn->strQcodoQueryCondition = $objSoapObject->QcodoQueryCondition;
			if (property_exists($objSoapObject, 'RequiresDistinctFlag'))
				$objToReturn->blnRequiresDistinctFlag = $objSoapObject->RequiresDistinctFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, QueryNode::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeQueryNode extends QQNode {
		protected $strTableName = 'query_node';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'QueryNode';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'QcodoQueryNode':
					return new QQNode('qcodo_query_node', 'QcodoQueryNode', 'string', $this);
				case 'DataType':
					return new QQNode('data_type', 'DataType', 'string', $this);
				case 'QcodoQueryCondition':
					return new QQNode('qcodo_query_condition', 'QcodoQueryCondition', 'string', $this);
				case 'RequiresDistinctFlag':
					return new QQNode('requires_distinct_flag', 'RequiresDistinctFlag', 'boolean', $this);
				case 'QueryCondition':
					return new QQReverseReferenceNodeQueryCondition($this, 'querycondition', 'reverse_reference', 'query_node');

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

	class QQReverseReferenceNodeQueryNode extends QQReverseReferenceNode {
		protected $strTableName = 'query_node';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'QueryNode';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'QcodoQueryNode':
					return new QQNode('qcodo_query_node', 'QcodoQueryNode', 'string', $this);
				case 'DataType':
					return new QQNode('data_type', 'DataType', 'string', $this);
				case 'QcodoQueryCondition':
					return new QQNode('qcodo_query_condition', 'QcodoQueryCondition', 'string', $this);
				case 'RequiresDistinctFlag':
					return new QQNode('requires_distinct_flag', 'RequiresDistinctFlag', 'boolean', $this);
				case 'QueryCondition':
					return new QQReverseReferenceNodeQueryCondition($this, 'querycondition', 'reverse_reference', 'query_node');

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