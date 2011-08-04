<?php
	/**
	 * The abstract HouseholdSplitGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the HouseholdSplit subclass which
	 * extends this HouseholdSplitGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the HouseholdSplit class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $HouseholdId the value for intHouseholdId (Not Null)
	 * @property integer $SplitHouseholdId the value for intSplitHouseholdId (Not Null)
	 * @property QDateTime $DateSplit the value for dttDateSplit 
	 * @property Household $Household the value for the Household object referenced by intHouseholdId (Not Null)
	 * @property Household $SplitHousehold the value for the Household object referenced by intSplitHouseholdId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class HouseholdSplitGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column household_split.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column household_split.household_id
		 * @var integer intHouseholdId
		 */
		protected $intHouseholdId;
		const HouseholdIdDefault = null;


		/**
		 * Protected member variable that maps to the database column household_split.split_household_id
		 * @var integer intSplitHouseholdId
		 */
		protected $intSplitHouseholdId;
		const SplitHouseholdIdDefault = null;


		/**
		 * Protected member variable that maps to the database column household_split.date_split
		 * @var QDateTime dttDateSplit
		 */
		protected $dttDateSplit;
		const DateSplitDefault = null;


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
		 * in the database column household_split.household_id.
		 *
		 * NOTE: Always use the Household property getter to correctly retrieve this Household object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Household objHousehold
		 */
		protected $objHousehold;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column household_split.split_household_id.
		 *
		 * NOTE: Always use the SplitHousehold property getter to correctly retrieve this Household object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Household objSplitHousehold
		 */
		protected $objSplitHousehold;





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
		 * Load a HouseholdSplit from PK Info
		 * @param integer $intId
		 * @return HouseholdSplit
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return HouseholdSplit::QuerySingle(
				QQ::Equal(QQN::HouseholdSplit()->Id, $intId)
			);
		}

		/**
		 * Load all HouseholdSplits
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HouseholdSplit[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call HouseholdSplit::QueryArray to perform the LoadAll query
			try {
				return HouseholdSplit::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all HouseholdSplits
		 * @return int
		 */
		public static function CountAll() {
			// Call HouseholdSplit::QueryCount to perform the CountAll query
			return HouseholdSplit::QueryCount(QQ::All());
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
			$objDatabase = HouseholdSplit::GetDatabase();

			// Create/Build out the QueryBuilder object with HouseholdSplit-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'household_split');
			HouseholdSplit::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('household_split');

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
		 * Static Qcodo Query method to query for a single HouseholdSplit object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return HouseholdSplit the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = HouseholdSplit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new HouseholdSplit object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = HouseholdSplit::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return HouseholdSplit::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of HouseholdSplit objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return HouseholdSplit[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = HouseholdSplit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return HouseholdSplit::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = HouseholdSplit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of HouseholdSplit objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = HouseholdSplit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = HouseholdSplit::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'household_split_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with HouseholdSplit-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				HouseholdSplit::GetSelectFields($objQueryBuilder);
				HouseholdSplit::GetFromFields($objQueryBuilder);

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
			return HouseholdSplit::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this HouseholdSplit
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'household_split';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'household_id', $strAliasPrefix . 'household_id');
			$objBuilder->AddSelectItem($strTableName, 'split_household_id', $strAliasPrefix . 'split_household_id');
			$objBuilder->AddSelectItem($strTableName, 'date_split', $strAliasPrefix . 'date_split');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a HouseholdSplit from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this HouseholdSplit::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return HouseholdSplit
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the HouseholdSplit object
			$objToReturn = new HouseholdSplit();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'household_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'household_id'] : $strAliasPrefix . 'household_id';
			$objToReturn->intHouseholdId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'split_household_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'split_household_id'] : $strAliasPrefix . 'split_household_id';
			$objToReturn->intSplitHouseholdId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_split', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_split'] : $strAliasPrefix . 'date_split';
			$objToReturn->dttDateSplit = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'household_split__';

			// Check for Household Early Binding
			$strAlias = $strAliasPrefix . 'household_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objHousehold = Household::InstantiateDbRow($objDbRow, $strAliasPrefix . 'household_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for SplitHousehold Early Binding
			$strAlias = $strAliasPrefix . 'split_household_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSplitHousehold = Household::InstantiateDbRow($objDbRow, $strAliasPrefix . 'split_household_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of HouseholdSplits from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return HouseholdSplit[]
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
					$objItem = HouseholdSplit::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = HouseholdSplit::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single HouseholdSplit object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return HouseholdSplit next row resulting from the query
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
			return HouseholdSplit::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single HouseholdSplit object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return HouseholdSplit
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return HouseholdSplit::QuerySingle(
				QQ::Equal(QQN::HouseholdSplit()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of HouseholdSplit objects,
		 * by HouseholdId Index(es)
		 * @param integer $intHouseholdId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HouseholdSplit[]
		*/
		public static function LoadArrayByHouseholdId($intHouseholdId, $objOptionalClauses = null) {
			// Call HouseholdSplit::QueryArray to perform the LoadArrayByHouseholdId query
			try {
				return HouseholdSplit::QueryArray(
					QQ::Equal(QQN::HouseholdSplit()->HouseholdId, $intHouseholdId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count HouseholdSplits
		 * by HouseholdId Index(es)
		 * @param integer $intHouseholdId
		 * @return int
		*/
		public static function CountByHouseholdId($intHouseholdId, $objOptionalClauses = null) {
			// Call HouseholdSplit::QueryCount to perform the CountByHouseholdId query
			return HouseholdSplit::QueryCount(
				QQ::Equal(QQN::HouseholdSplit()->HouseholdId, $intHouseholdId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of HouseholdSplit objects,
		 * by SplitHouseholdId Index(es)
		 * @param integer $intSplitHouseholdId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HouseholdSplit[]
		*/
		public static function LoadArrayBySplitHouseholdId($intSplitHouseholdId, $objOptionalClauses = null) {
			// Call HouseholdSplit::QueryArray to perform the LoadArrayBySplitHouseholdId query
			try {
				return HouseholdSplit::QueryArray(
					QQ::Equal(QQN::HouseholdSplit()->SplitHouseholdId, $intSplitHouseholdId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count HouseholdSplits
		 * by SplitHouseholdId Index(es)
		 * @param integer $intSplitHouseholdId
		 * @return int
		*/
		public static function CountBySplitHouseholdId($intSplitHouseholdId, $objOptionalClauses = null) {
			// Call HouseholdSplit::QueryCount to perform the CountBySplitHouseholdId query
			return HouseholdSplit::QueryCount(
				QQ::Equal(QQN::HouseholdSplit()->SplitHouseholdId, $intSplitHouseholdId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this HouseholdSplit
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = HouseholdSplit::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `household_split` (
							`household_id`,
							`split_household_id`,
							`date_split`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intHouseholdId) . ',
							' . $objDatabase->SqlVariable($this->intSplitHouseholdId) . ',
							' . $objDatabase->SqlVariable($this->dttDateSplit) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('household_split', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`household_split`
						SET
							`household_id` = ' . $objDatabase->SqlVariable($this->intHouseholdId) . ',
							`split_household_id` = ' . $objDatabase->SqlVariable($this->intSplitHouseholdId) . ',
							`date_split` = ' . $objDatabase->SqlVariable($this->dttDateSplit) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
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
		 * Delete this HouseholdSplit
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this HouseholdSplit with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = HouseholdSplit::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household_split`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all HouseholdSplits
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = HouseholdSplit::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household_split`');
		}

		/**
		 * Truncate household_split table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = HouseholdSplit::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `household_split`');
		}

		/**
		 * Reload this HouseholdSplit from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved HouseholdSplit object.');

			// Reload the Object
			$objReloaded = HouseholdSplit::Load($this->intId);

			// Update $this's local variables to match
			$this->HouseholdId = $objReloaded->HouseholdId;
			$this->SplitHouseholdId = $objReloaded->SplitHouseholdId;
			$this->dttDateSplit = $objReloaded->dttDateSplit;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = HouseholdSplit::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `household_split` (
					`id`,
					`household_id`,
					`split_household_id`,
					`date_split`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intHouseholdId) . ',
					' . $objDatabase->SqlVariable($this->intSplitHouseholdId) . ',
					' . $objDatabase->SqlVariable($this->dttDateSplit) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intId
		 * @return HouseholdSplit[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = HouseholdSplit::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM household_split WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return HouseholdSplit::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return HouseholdSplit[]
		 */
		public function GetJournal() {
			return HouseholdSplit::GetJournalForId($this->intId);
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

				case 'HouseholdId':
					// Gets the value for intHouseholdId (Not Null)
					// @return integer
					return $this->intHouseholdId;

				case 'SplitHouseholdId':
					// Gets the value for intSplitHouseholdId (Not Null)
					// @return integer
					return $this->intSplitHouseholdId;

				case 'DateSplit':
					// Gets the value for dttDateSplit 
					// @return QDateTime
					return $this->dttDateSplit;


				///////////////////
				// Member Objects
				///////////////////
				case 'Household':
					// Gets the value for the Household object referenced by intHouseholdId (Not Null)
					// @return Household
					try {
						if ((!$this->objHousehold) && (!is_null($this->intHouseholdId)))
							$this->objHousehold = Household::Load($this->intHouseholdId);
						return $this->objHousehold;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SplitHousehold':
					// Gets the value for the Household object referenced by intSplitHouseholdId (Not Null)
					// @return Household
					try {
						if ((!$this->objSplitHousehold) && (!is_null($this->intSplitHouseholdId)))
							$this->objSplitHousehold = Household::Load($this->intSplitHouseholdId);
						return $this->objSplitHousehold;
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
				case 'HouseholdId':
					// Sets the value for intHouseholdId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objHousehold = null;
						return ($this->intHouseholdId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SplitHouseholdId':
					// Sets the value for intSplitHouseholdId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSplitHousehold = null;
						return ($this->intSplitHouseholdId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateSplit':
					// Sets the value for dttDateSplit 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateSplit = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Household':
					// Sets the value for the Household object referenced by intHouseholdId (Not Null)
					// @param Household $mixValue
					// @return Household
					if (is_null($mixValue)) {
						$this->intHouseholdId = null;
						$this->objHousehold = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Household object
						try {
							$mixValue = QType::Cast($mixValue, 'Household');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Household object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Household for this HouseholdSplit');

						// Update Local Member Variables
						$this->objHousehold = $mixValue;
						$this->intHouseholdId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'SplitHousehold':
					// Sets the value for the Household object referenced by intSplitHouseholdId (Not Null)
					// @param Household $mixValue
					// @return Household
					if (is_null($mixValue)) {
						$this->intSplitHouseholdId = null;
						$this->objSplitHousehold = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Household object
						try {
							$mixValue = QType::Cast($mixValue, 'Household');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Household object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved SplitHousehold for this HouseholdSplit');

						// Update Local Member Variables
						$this->objSplitHousehold = $mixValue;
						$this->intSplitHouseholdId = $mixValue->Id;

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
			$strToReturn = '<complexType name="HouseholdSplit"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Household" type="xsd1:Household"/>';
			$strToReturn .= '<element name="SplitHousehold" type="xsd1:Household"/>';
			$strToReturn .= '<element name="DateSplit" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('HouseholdSplit', $strComplexTypeArray)) {
				$strComplexTypeArray['HouseholdSplit'] = HouseholdSplit::GetSoapComplexTypeXml();
				Household::AlterSoapComplexTypeArray($strComplexTypeArray);
				Household::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, HouseholdSplit::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new HouseholdSplit();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Household')) &&
				($objSoapObject->Household))
				$objToReturn->Household = Household::GetObjectFromSoapObject($objSoapObject->Household);
			if ((property_exists($objSoapObject, 'SplitHousehold')) &&
				($objSoapObject->SplitHousehold))
				$objToReturn->SplitHousehold = Household::GetObjectFromSoapObject($objSoapObject->SplitHousehold);
			if (property_exists($objSoapObject, 'DateSplit'))
				$objToReturn->dttDateSplit = new QDateTime($objSoapObject->DateSplit);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, HouseholdSplit::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objHousehold)
				$objObject->objHousehold = Household::GetSoapObjectFromObject($objObject->objHousehold, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intHouseholdId = null;
			if ($objObject->objSplitHousehold)
				$objObject->objSplitHousehold = Household::GetSoapObjectFromObject($objObject->objSplitHousehold, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSplitHouseholdId = null;
			if ($objObject->dttDateSplit)
				$objObject->dttDateSplit = $objObject->dttDateSplit->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $HouseholdId
	 * @property-read QQNodeHousehold $Household
	 * @property-read QQNode $SplitHouseholdId
	 * @property-read QQNodeHousehold $SplitHousehold
	 * @property-read QQNode $DateSplit
	 */
	class QQNodeHouseholdSplit extends QQNode {
		protected $strTableName = 'household_split';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'HouseholdSplit';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'HouseholdId':
					return new QQNode('household_id', 'HouseholdId', 'integer', $this);
				case 'Household':
					return new QQNodeHousehold('household_id', 'Household', 'integer', $this);
				case 'SplitHouseholdId':
					return new QQNode('split_household_id', 'SplitHouseholdId', 'integer', $this);
				case 'SplitHousehold':
					return new QQNodeHousehold('split_household_id', 'SplitHousehold', 'integer', $this);
				case 'DateSplit':
					return new QQNode('date_split', 'DateSplit', 'QDateTime', $this);

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
	
	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $HouseholdId
	 * @property-read QQNodeHousehold $Household
	 * @property-read QQNode $SplitHouseholdId
	 * @property-read QQNodeHousehold $SplitHousehold
	 * @property-read QQNode $DateSplit
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeHouseholdSplit extends QQReverseReferenceNode {
		protected $strTableName = 'household_split';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'HouseholdSplit';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'HouseholdId':
					return new QQNode('household_id', 'HouseholdId', 'integer', $this);
				case 'Household':
					return new QQNodeHousehold('household_id', 'Household', 'integer', $this);
				case 'SplitHouseholdId':
					return new QQNode('split_household_id', 'SplitHouseholdId', 'integer', $this);
				case 'SplitHousehold':
					return new QQNodeHousehold('split_household_id', 'SplitHousehold', 'integer', $this);
				case 'DateSplit':
					return new QQNode('date_split', 'DateSplit', 'QDateTime', $this);

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