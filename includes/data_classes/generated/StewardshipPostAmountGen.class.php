<?php
	/**
	 * The abstract StewardshipPostAmountGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the StewardshipPostAmount subclass which
	 * extends this StewardshipPostAmountGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StewardshipPostAmount class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $StewardshipPostId the value for intStewardshipPostId (Not Null)
	 * @property integer $StewardshipFundId the value for intStewardshipFundId (Not Null)
	 * @property double $Amount the value for fltAmount 
	 * @property StewardshipPost $StewardshipPost the value for the StewardshipPost object referenced by intStewardshipPostId (Not Null)
	 * @property StewardshipFund $StewardshipFund the value for the StewardshipFund object referenced by intStewardshipFundId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class StewardshipPostAmountGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column stewardship_post_amount.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post_amount.stewardship_post_id
		 * @var integer intStewardshipPostId
		 */
		protected $intStewardshipPostId;
		const StewardshipPostIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post_amount.stewardship_fund_id
		 * @var integer intStewardshipFundId
		 */
		protected $intStewardshipFundId;
		const StewardshipFundIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post_amount.amount
		 * @var double fltAmount
		 */
		protected $fltAmount;
		const AmountDefault = null;


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
		 * in the database column stewardship_post_amount.stewardship_post_id.
		 *
		 * NOTE: Always use the StewardshipPost property getter to correctly retrieve this StewardshipPost object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipPost objStewardshipPost
		 */
		protected $objStewardshipPost;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column stewardship_post_amount.stewardship_fund_id.
		 *
		 * NOTE: Always use the StewardshipFund property getter to correctly retrieve this StewardshipFund object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipFund objStewardshipFund
		 */
		protected $objStewardshipFund;





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
		 * Load a StewardshipPostAmount from PK Info
		 * @param integer $intId
		 * @return StewardshipPostAmount
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return StewardshipPostAmount::QuerySingle(
				QQ::Equal(QQN::StewardshipPostAmount()->Id, $intId)
			);
		}

		/**
		 * Load all StewardshipPostAmounts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPostAmount[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call StewardshipPostAmount::QueryArray to perform the LoadAll query
			try {
				return StewardshipPostAmount::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all StewardshipPostAmounts
		 * @return int
		 */
		public static function CountAll() {
			// Call StewardshipPostAmount::QueryCount to perform the CountAll query
			return StewardshipPostAmount::QueryCount(QQ::All());
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
			$objDatabase = StewardshipPostAmount::GetDatabase();

			// Create/Build out the QueryBuilder object with StewardshipPostAmount-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'stewardship_post_amount');
			StewardshipPostAmount::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('stewardship_post_amount');

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
		 * Static Qcodo Query method to query for a single StewardshipPostAmount object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipPostAmount the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPostAmount::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new StewardshipPostAmount object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = StewardshipPostAmount::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return StewardshipPostAmount::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of StewardshipPostAmount objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipPostAmount[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPostAmount::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return StewardshipPostAmount::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = StewardshipPostAmount::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of StewardshipPostAmount objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPostAmount::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = StewardshipPostAmount::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'stewardship_post_amount_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with StewardshipPostAmount-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				StewardshipPostAmount::GetSelectFields($objQueryBuilder);
				StewardshipPostAmount::GetFromFields($objQueryBuilder);

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
			return StewardshipPostAmount::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this StewardshipPostAmount
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'stewardship_post_amount';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_post_id', $strAliasPrefix . 'stewardship_post_id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_fund_id', $strAliasPrefix . 'stewardship_fund_id');
			$objBuilder->AddSelectItem($strTableName, 'amount', $strAliasPrefix . 'amount');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a StewardshipPostAmount from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this StewardshipPostAmount::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipPostAmount
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the StewardshipPostAmount object
			$objToReturn = new StewardshipPostAmount();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_post_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_post_id'] : $strAliasPrefix . 'stewardship_post_id';
			$objToReturn->intStewardshipPostId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_fund_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_fund_id'] : $strAliasPrefix . 'stewardship_fund_id';
			$objToReturn->intStewardshipFundId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount'] : $strAliasPrefix . 'amount';
			$objToReturn->fltAmount = $objDbRow->GetColumn($strAliasName, 'Float');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'stewardship_post_amount__';

			// Check for StewardshipPost Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_post_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipPost = StewardshipPost::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_post_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StewardshipFund Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_fund_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipFund = StewardshipFund::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_fund_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of StewardshipPostAmounts from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipPostAmount[]
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
					$objItem = StewardshipPostAmount::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = StewardshipPostAmount::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single StewardshipPostAmount object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return StewardshipPostAmount next row resulting from the query
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
			return StewardshipPostAmount::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single StewardshipPostAmount object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return StewardshipPostAmount
		*/
		public static function LoadById($intId) {
			return StewardshipPostAmount::QuerySingle(
				QQ::Equal(QQN::StewardshipPostAmount()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of StewardshipPostAmount objects,
		 * by StewardshipPostId Index(es)
		 * @param integer $intStewardshipPostId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPostAmount[]
		*/
		public static function LoadArrayByStewardshipPostId($intStewardshipPostId, $objOptionalClauses = null) {
			// Call StewardshipPostAmount::QueryArray to perform the LoadArrayByStewardshipPostId query
			try {
				return StewardshipPostAmount::QueryArray(
					QQ::Equal(QQN::StewardshipPostAmount()->StewardshipPostId, $intStewardshipPostId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipPostAmounts
		 * by StewardshipPostId Index(es)
		 * @param integer $intStewardshipPostId
		 * @return int
		*/
		public static function CountByStewardshipPostId($intStewardshipPostId) {
			// Call StewardshipPostAmount::QueryCount to perform the CountByStewardshipPostId query
			return StewardshipPostAmount::QueryCount(
				QQ::Equal(QQN::StewardshipPostAmount()->StewardshipPostId, $intStewardshipPostId)
			);
		}
			
		/**
		 * Load an array of StewardshipPostAmount objects,
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPostAmount[]
		*/
		public static function LoadArrayByStewardshipFundId($intStewardshipFundId, $objOptionalClauses = null) {
			// Call StewardshipPostAmount::QueryArray to perform the LoadArrayByStewardshipFundId query
			try {
				return StewardshipPostAmount::QueryArray(
					QQ::Equal(QQN::StewardshipPostAmount()->StewardshipFundId, $intStewardshipFundId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipPostAmounts
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @return int
		*/
		public static function CountByStewardshipFundId($intStewardshipFundId) {
			// Call StewardshipPostAmount::QueryCount to perform the CountByStewardshipFundId query
			return StewardshipPostAmount::QueryCount(
				QQ::Equal(QQN::StewardshipPostAmount()->StewardshipFundId, $intStewardshipFundId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			QApplication::$Database[2]->NonQuery('
				INSERT INTO `stewardship_post_amount` (
					`id`,
					`stewardship_post_id`,
					`stewardship_fund_id`,
					`amount`,
					sys_login_id,
					sys_action,
					sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intStewardshipPostId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intStewardshipFundId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->fltAmount) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Save this StewardshipPostAmount
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPostAmount::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `stewardship_post_amount` (
							`stewardship_post_id`,
							`stewardship_fund_id`,
							`amount`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intStewardshipPostId) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							' . $objDatabase->SqlVariable($this->fltAmount) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('stewardship_post_amount', 'id');

					// Journaling
					$this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`stewardship_post_amount`
						SET
							`stewardship_post_id` = ' . $objDatabase->SqlVariable($this->intStewardshipPostId) . ',
							`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							`amount` = ' . $objDatabase->SqlVariable($this->fltAmount) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					$this->Journal('UPDATE');
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
		 * Delete this StewardshipPostAmount
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this StewardshipPostAmount with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipPostAmount::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_amount`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			$this->Journal('DELETE');
		}

		/**
		 * Delete all StewardshipPostAmounts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPostAmount::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_amount`');
		}

		/**
		 * Truncate stewardship_post_amount table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPostAmount::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `stewardship_post_amount`');
		}

		/**
		 * Reload this StewardshipPostAmount from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved StewardshipPostAmount object.');

			// Reload the Object
			$objReloaded = StewardshipPostAmount::Load($this->intId);

			// Update $this's local variables to match
			$this->StewardshipPostId = $objReloaded->StewardshipPostId;
			$this->StewardshipFundId = $objReloaded->StewardshipFundId;
			$this->fltAmount = $objReloaded->fltAmount;
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

				case 'StewardshipPostId':
					// Gets the value for intStewardshipPostId (Not Null)
					// @return integer
					return $this->intStewardshipPostId;

				case 'StewardshipFundId':
					// Gets the value for intStewardshipFundId (Not Null)
					// @return integer
					return $this->intStewardshipFundId;

				case 'Amount':
					// Gets the value for fltAmount 
					// @return double
					return $this->fltAmount;


				///////////////////
				// Member Objects
				///////////////////
				case 'StewardshipPost':
					// Gets the value for the StewardshipPost object referenced by intStewardshipPostId (Not Null)
					// @return StewardshipPost
					try {
						if ((!$this->objStewardshipPost) && (!is_null($this->intStewardshipPostId)))
							$this->objStewardshipPost = StewardshipPost::Load($this->intStewardshipPostId);
						return $this->objStewardshipPost;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipFund':
					// Gets the value for the StewardshipFund object referenced by intStewardshipFundId (Not Null)
					// @return StewardshipFund
					try {
						if ((!$this->objStewardshipFund) && (!is_null($this->intStewardshipFundId)))
							$this->objStewardshipFund = StewardshipFund::Load($this->intStewardshipFundId);
						return $this->objStewardshipFund;
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
				case 'StewardshipPostId':
					// Sets the value for intStewardshipPostId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipPost = null;
						return ($this->intStewardshipPostId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipFundId':
					// Sets the value for intStewardshipFundId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipFund = null;
						return ($this->intStewardshipFundId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Amount':
					// Sets the value for fltAmount 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltAmount = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'StewardshipPost':
					// Sets the value for the StewardshipPost object referenced by intStewardshipPostId (Not Null)
					// @param StewardshipPost $mixValue
					// @return StewardshipPost
					if (is_null($mixValue)) {
						$this->intStewardshipPostId = null;
						$this->objStewardshipPost = null;
						return null;
					} else {
						// Make sure $mixValue actually is a StewardshipPost object
						try {
							$mixValue = QType::Cast($mixValue, 'StewardshipPost');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED StewardshipPost object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved StewardshipPost for this StewardshipPostAmount');

						// Update Local Member Variables
						$this->objStewardshipPost = $mixValue;
						$this->intStewardshipPostId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'StewardshipFund':
					// Sets the value for the StewardshipFund object referenced by intStewardshipFundId (Not Null)
					// @param StewardshipFund $mixValue
					// @return StewardshipFund
					if (is_null($mixValue)) {
						$this->intStewardshipFundId = null;
						$this->objStewardshipFund = null;
						return null;
					} else {
						// Make sure $mixValue actually is a StewardshipFund object
						try {
							$mixValue = QType::Cast($mixValue, 'StewardshipFund');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED StewardshipFund object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved StewardshipFund for this StewardshipPostAmount');

						// Update Local Member Variables
						$this->objStewardshipFund = $mixValue;
						$this->intStewardshipFundId = $mixValue->Id;

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
			$strToReturn = '<complexType name="StewardshipPostAmount"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="StewardshipPost" type="xsd1:StewardshipPost"/>';
			$strToReturn .= '<element name="StewardshipFund" type="xsd1:StewardshipFund"/>';
			$strToReturn .= '<element name="Amount" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('StewardshipPostAmount', $strComplexTypeArray)) {
				$strComplexTypeArray['StewardshipPostAmount'] = StewardshipPostAmount::GetSoapComplexTypeXml();
				StewardshipPost::AlterSoapComplexTypeArray($strComplexTypeArray);
				StewardshipFund::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, StewardshipPostAmount::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new StewardshipPostAmount();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'StewardshipPost')) &&
				($objSoapObject->StewardshipPost))
				$objToReturn->StewardshipPost = StewardshipPost::GetObjectFromSoapObject($objSoapObject->StewardshipPost);
			if ((property_exists($objSoapObject, 'StewardshipFund')) &&
				($objSoapObject->StewardshipFund))
				$objToReturn->StewardshipFund = StewardshipFund::GetObjectFromSoapObject($objSoapObject->StewardshipFund);
			if (property_exists($objSoapObject, 'Amount'))
				$objToReturn->fltAmount = $objSoapObject->Amount;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, StewardshipPostAmount::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objStewardshipPost)
				$objObject->objStewardshipPost = StewardshipPost::GetSoapObjectFromObject($objObject->objStewardshipPost, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipPostId = null;
			if ($objObject->objStewardshipFund)
				$objObject->objStewardshipFund = StewardshipFund::GetSoapObjectFromObject($objObject->objStewardshipFund, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipFundId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeStewardshipPostAmount extends QQNode {
		protected $strTableName = 'stewardship_post_amount';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipPostAmount';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'StewardshipPostId':
					return new QQNode('stewardship_post_id', 'StewardshipPostId', 'integer', $this);
				case 'StewardshipPost':
					return new QQNodeStewardshipPost('stewardship_post_id', 'StewardshipPost', 'integer', $this);
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);

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

	class QQReverseReferenceNodeStewardshipPostAmount extends QQReverseReferenceNode {
		protected $strTableName = 'stewardship_post_amount';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipPostAmount';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'StewardshipPostId':
					return new QQNode('stewardship_post_id', 'StewardshipPostId', 'integer', $this);
				case 'StewardshipPost':
					return new QQNodeStewardshipPost('stewardship_post_id', 'StewardshipPost', 'integer', $this);
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);

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