<?php
	/**
	 * The abstract ParentPagerPeriodGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ParentPagerPeriod subclass which
	 * extends this ParentPagerPeriodGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ParentPagerPeriod class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (PK)
	 * @property integer $ServerIdentifier the value for intServerIdentifier (Unique)
	 * @property string $Name the value for strName 
	 * @property ParentPagerAttendantHistory $_ParentPagerAttendantHistory the value for the private _objParentPagerAttendantHistory (Read-Only) if set due to an expansion on the parent_pager_attendant_history.parent_pager_period_id reverse relationship
	 * @property ParentPagerAttendantHistory[] $_ParentPagerAttendantHistoryArray the value for the private _objParentPagerAttendantHistoryArray (Read-Only) if set due to an ExpandAsArray on the parent_pager_attendant_history.parent_pager_period_id reverse relationship
	 * @property ParentPagerChildHistory $_ParentPagerChildHistory the value for the private _objParentPagerChildHistory (Read-Only) if set due to an expansion on the parent_pager_child_history.parent_pager_period_id reverse relationship
	 * @property ParentPagerChildHistory[] $_ParentPagerChildHistoryArray the value for the private _objParentPagerChildHistoryArray (Read-Only) if set due to an ExpandAsArray on the parent_pager_child_history.parent_pager_period_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ParentPagerPeriodGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column parent_pager_period.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intId;
		 */
		protected $__intId;

		/**
		 * Protected member variable that maps to the database column parent_pager_period.server_identifier
		 * @var integer intServerIdentifier
		 */
		protected $intServerIdentifier;
		const ServerIdentifierDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_period.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 50;
		const NameDefault = null;


		/**
		 * Private member variable that stores a reference to a single ParentPagerAttendantHistory object
		 * (of type ParentPagerAttendantHistory), if this ParentPagerPeriod object was restored with
		 * an expansion on the parent_pager_attendant_history association table.
		 * @var ParentPagerAttendantHistory _objParentPagerAttendantHistory;
		 */
		private $_objParentPagerAttendantHistory;

		/**
		 * Private member variable that stores a reference to an array of ParentPagerAttendantHistory objects
		 * (of type ParentPagerAttendantHistory[]), if this ParentPagerPeriod object was restored with
		 * an ExpandAsArray on the parent_pager_attendant_history association table.
		 * @var ParentPagerAttendantHistory[] _objParentPagerAttendantHistoryArray;
		 */
		private $_objParentPagerAttendantHistoryArray = array();

		/**
		 * Private member variable that stores a reference to a single ParentPagerChildHistory object
		 * (of type ParentPagerChildHistory), if this ParentPagerPeriod object was restored with
		 * an expansion on the parent_pager_child_history association table.
		 * @var ParentPagerChildHistory _objParentPagerChildHistory;
		 */
		private $_objParentPagerChildHistory;

		/**
		 * Private member variable that stores a reference to an array of ParentPagerChildHistory objects
		 * (of type ParentPagerChildHistory[]), if this ParentPagerPeriod object was restored with
		 * an ExpandAsArray on the parent_pager_child_history association table.
		 * @var ParentPagerChildHistory[] _objParentPagerChildHistoryArray;
		 */
		private $_objParentPagerChildHistoryArray = array();

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
		 * Load a ParentPagerPeriod from PK Info
		 * @param integer $intId
		 * @return ParentPagerPeriod
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return ParentPagerPeriod::QuerySingle(
				QQ::Equal(QQN::ParentPagerPeriod()->Id, $intId)
			);
		}

		/**
		 * Load all ParentPagerPeriods
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerPeriod[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ParentPagerPeriod::QueryArray to perform the LoadAll query
			try {
				return ParentPagerPeriod::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ParentPagerPeriods
		 * @return int
		 */
		public static function CountAll() {
			// Call ParentPagerPeriod::QueryCount to perform the CountAll query
			return ParentPagerPeriod::QueryCount(QQ::All());
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
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Create/Build out the QueryBuilder object with ParentPagerPeriod-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'parent_pager_period');
			ParentPagerPeriod::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('parent_pager_period');

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
		 * Static Qcodo Query method to query for a single ParentPagerPeriod object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerPeriod the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerPeriod::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ParentPagerPeriod object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ParentPagerPeriod::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ParentPagerPeriod::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ParentPagerPeriod objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerPeriod[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerPeriod::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ParentPagerPeriod::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ParentPagerPeriod::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ParentPagerPeriod objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerPeriod::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'parent_pager_period_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ParentPagerPeriod-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ParentPagerPeriod::GetSelectFields($objQueryBuilder);
				ParentPagerPeriod::GetFromFields($objQueryBuilder);

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
			return ParentPagerPeriod::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ParentPagerPeriod
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'parent_pager_period';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'server_identifier', $strAliasPrefix . 'server_identifier');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ParentPagerPeriod from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ParentPagerPeriod::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerPeriod
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
					$strAliasPrefix = 'parent_pager_period__';


				$strAlias = $strAliasPrefix . 'parentpagerattendanthistory__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objParentPagerAttendantHistoryArray)) {
						$objPreviousChildItem = $objPreviousItem->_objParentPagerAttendantHistoryArray[$intPreviousChildItemCount - 1];
						$objChildItem = ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerattendanthistory__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objParentPagerAttendantHistoryArray[] = $objChildItem;
					} else
						$objPreviousItem->_objParentPagerAttendantHistoryArray[] = ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerattendanthistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'parentpagerchildhistory__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objParentPagerChildHistoryArray)) {
						$objPreviousChildItem = $objPreviousItem->_objParentPagerChildHistoryArray[$intPreviousChildItemCount - 1];
						$objChildItem = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistory__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objParentPagerChildHistoryArray[] = $objChildItem;
					} else
						$objPreviousItem->_objParentPagerChildHistoryArray[] = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'parent_pager_period__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the ParentPagerPeriod object
			$objToReturn = new ParentPagerPeriod();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'server_identifier', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'server_identifier'] : $strAliasPrefix . 'server_identifier';
			$objToReturn->intServerIdentifier = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'parent_pager_period__';




			// Check for ParentPagerAttendantHistory Virtual Binding
			$strAlias = $strAliasPrefix . 'parentpagerattendanthistory__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objParentPagerAttendantHistoryArray[] = ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerattendanthistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objParentPagerAttendantHistory = ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerattendanthistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ParentPagerChildHistory Virtual Binding
			$strAlias = $strAliasPrefix . 'parentpagerchildhistory__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objParentPagerChildHistoryArray[] = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objParentPagerChildHistory = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of ParentPagerPeriods from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerPeriod[]
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
					$objItem = ParentPagerPeriod::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ParentPagerPeriod::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ParentPagerPeriod object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ParentPagerPeriod next row resulting from the query
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
			return ParentPagerPeriod::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ParentPagerPeriod object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return ParentPagerPeriod
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ParentPagerPeriod::QuerySingle(
				QQ::Equal(QQN::ParentPagerPeriod()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single ParentPagerPeriod object,
		 * by ServerIdentifier Index(es)
		 * @param integer $intServerIdentifier
		 * @return ParentPagerPeriod
		*/
		public static function LoadByServerIdentifier($intServerIdentifier, $objOptionalClauses = null) {
			return ParentPagerPeriod::QuerySingle(
				QQ::Equal(QQN::ParentPagerPeriod()->ServerIdentifier, $intServerIdentifier)
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
		 * Save this ParentPagerPeriod
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `parent_pager_period` (
							`id`,
							`server_identifier`,
							`name`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intId) . ',
							' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							' . $objDatabase->SqlVariable($this->strName) . '
						)
					');



					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`parent_pager_period`
						SET
							`id` = ' . $objDatabase->SqlVariable($this->intId) . ',
							`server_identifier` = ' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->__intId) . '
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
			$this->__intId = $this->intId;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this ParentPagerPeriod
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ParentPagerPeriod with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_period`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ParentPagerPeriods
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_period`');
		}

		/**
		 * Truncate parent_pager_period table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `parent_pager_period`');
		}

		/**
		 * Reload this ParentPagerPeriod from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ParentPagerPeriod object.');

			// Reload the Object
			$objReloaded = ParentPagerPeriod::Load($this->intId);

			// Update $this's local variables to match
			$this->intId = $objReloaded->intId;
			$this->__intId = $this->intId;
			$this->intServerIdentifier = $objReloaded->intServerIdentifier;
			$this->strName = $objReloaded->strName;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ParentPagerPeriod::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `parent_pager_period` (
					`id`,
					`server_identifier`,
					`name`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
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
		 * @return ParentPagerPeriod[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = ParentPagerPeriod::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM parent_pager_period WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return ParentPagerPeriod::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ParentPagerPeriod[]
		 */
		public function GetJournal() {
			return ParentPagerPeriod::GetJournalForId($this->intId);
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
					// Gets the value for intId (PK)
					// @return integer
					return $this->intId;

				case 'ServerIdentifier':
					// Gets the value for intServerIdentifier (Unique)
					// @return integer
					return $this->intServerIdentifier;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ParentPagerAttendantHistory':
					// Gets the value for the private _objParentPagerAttendantHistory (Read-Only)
					// if set due to an expansion on the parent_pager_attendant_history.parent_pager_period_id reverse relationship
					// @return ParentPagerAttendantHistory
					return $this->_objParentPagerAttendantHistory;

				case '_ParentPagerAttendantHistoryArray':
					// Gets the value for the private _objParentPagerAttendantHistoryArray (Read-Only)
					// if set due to an ExpandAsArray on the parent_pager_attendant_history.parent_pager_period_id reverse relationship
					// @return ParentPagerAttendantHistory[]
					return (array) $this->_objParentPagerAttendantHistoryArray;

				case '_ParentPagerChildHistory':
					// Gets the value for the private _objParentPagerChildHistory (Read-Only)
					// if set due to an expansion on the parent_pager_child_history.parent_pager_period_id reverse relationship
					// @return ParentPagerChildHistory
					return $this->_objParentPagerChildHistory;

				case '_ParentPagerChildHistoryArray':
					// Gets the value for the private _objParentPagerChildHistoryArray (Read-Only)
					// if set due to an ExpandAsArray on the parent_pager_child_history.parent_pager_period_id reverse relationship
					// @return ParentPagerChildHistory[]
					return (array) $this->_objParentPagerChildHistoryArray;


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
				case 'Id':
					// Sets the value for intId (PK)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ServerIdentifier':
					// Sets the value for intServerIdentifier (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intServerIdentifier = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

			
		
		// Related Objects' Methods for ParentPagerAttendantHistory
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ParentPagerAttendantHistories as an array of ParentPagerAttendantHistory objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAttendantHistory[]
		*/ 
		public function GetParentPagerAttendantHistoryArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ParentPagerAttendantHistory::LoadArrayByParentPagerPeriodId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ParentPagerAttendantHistories
		 * @return int
		*/ 
		public function CountParentPagerAttendantHistories() {
			if ((is_null($this->intId)))
				return 0;

			return ParentPagerAttendantHistory::CountByParentPagerPeriodId($this->intId);
		}

		/**
		 * Associates a ParentPagerAttendantHistory
		 * @param ParentPagerAttendantHistory $objParentPagerAttendantHistory
		 * @return void
		*/ 
		public function AssociateParentPagerAttendantHistory(ParentPagerAttendantHistory $objParentPagerAttendantHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerAttendantHistory on this unsaved ParentPagerPeriod.');
			if ((is_null($objParentPagerAttendantHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerAttendantHistory on this ParentPagerPeriod with an unsaved ParentPagerAttendantHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_attendant_history`
				SET
					`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAttendantHistory->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAttendantHistory->ParentPagerPeriodId = $this->intId;
				$objParentPagerAttendantHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ParentPagerAttendantHistory
		 * @param ParentPagerAttendantHistory $objParentPagerAttendantHistory
		 * @return void
		*/ 
		public function UnassociateParentPagerAttendantHistory(ParentPagerAttendantHistory $objParentPagerAttendantHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this unsaved ParentPagerPeriod.');
			if ((is_null($objParentPagerAttendantHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this ParentPagerPeriod with an unsaved ParentPagerAttendantHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_attendant_history`
				SET
					`parent_pager_period_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAttendantHistory->Id) . ' AND
					`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAttendantHistory->ParentPagerPeriodId = null;
				$objParentPagerAttendantHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ParentPagerAttendantHistories
		 * @return void
		*/ 
		public function UnassociateAllParentPagerAttendantHistories() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this unsaved ParentPagerPeriod.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerAttendantHistory::LoadArrayByParentPagerPeriodId($this->intId) as $objParentPagerAttendantHistory) {
					$objParentPagerAttendantHistory->ParentPagerPeriodId = null;
					$objParentPagerAttendantHistory->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_attendant_history`
				SET
					`parent_pager_period_id` = null
				WHERE
					`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ParentPagerAttendantHistory
		 * @param ParentPagerAttendantHistory $objParentPagerAttendantHistory
		 * @return void
		*/ 
		public function DeleteAssociatedParentPagerAttendantHistory(ParentPagerAttendantHistory $objParentPagerAttendantHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this unsaved ParentPagerPeriod.');
			if ((is_null($objParentPagerAttendantHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this ParentPagerPeriod with an unsaved ParentPagerAttendantHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_attendant_history`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAttendantHistory->Id) . ' AND
					`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAttendantHistory->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ParentPagerAttendantHistories
		 * @return void
		*/ 
		public function DeleteAllParentPagerAttendantHistories() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this unsaved ParentPagerPeriod.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerAttendantHistory::LoadArrayByParentPagerPeriodId($this->intId) as $objParentPagerAttendantHistory) {
					$objParentPagerAttendantHistory->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_attendant_history`
				WHERE
					`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for ParentPagerChildHistory
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ParentPagerChildHistories as an array of ParentPagerChildHistory objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerChildHistory[]
		*/ 
		public function GetParentPagerChildHistoryArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ParentPagerChildHistory::LoadArrayByParentPagerPeriodId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ParentPagerChildHistories
		 * @return int
		*/ 
		public function CountParentPagerChildHistories() {
			if ((is_null($this->intId)))
				return 0;

			return ParentPagerChildHistory::CountByParentPagerPeriodId($this->intId);
		}

		/**
		 * Associates a ParentPagerChildHistory
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function AssociateParentPagerChildHistory(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerChildHistory on this unsaved ParentPagerPeriod.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerChildHistory on this ParentPagerPeriod with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->ParentPagerPeriodId = $this->intId;
				$objParentPagerChildHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ParentPagerChildHistory
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function UnassociateParentPagerChildHistory(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this unsaved ParentPagerPeriod.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this ParentPagerPeriod with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`parent_pager_period_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . ' AND
					`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->ParentPagerPeriodId = null;
				$objParentPagerChildHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ParentPagerChildHistories
		 * @return void
		*/ 
		public function UnassociateAllParentPagerChildHistories() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this unsaved ParentPagerPeriod.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerChildHistory::LoadArrayByParentPagerPeriodId($this->intId) as $objParentPagerChildHistory) {
					$objParentPagerChildHistory->ParentPagerPeriodId = null;
					$objParentPagerChildHistory->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`parent_pager_period_id` = null
				WHERE
					`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ParentPagerChildHistory
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function DeleteAssociatedParentPagerChildHistory(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this unsaved ParentPagerPeriod.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this ParentPagerPeriod with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_child_history`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . ' AND
					`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ParentPagerChildHistories
		 * @return void
		*/ 
		public function DeleteAllParentPagerChildHistories() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this unsaved ParentPagerPeriod.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerPeriod::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerChildHistory::LoadArrayByParentPagerPeriodId($this->intId) as $objParentPagerChildHistory) {
					$objParentPagerChildHistory->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_child_history`
				WHERE
					`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ParentPagerPeriod"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ServerIdentifier" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ParentPagerPeriod', $strComplexTypeArray)) {
				$strComplexTypeArray['ParentPagerPeriod'] = ParentPagerPeriod::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ParentPagerPeriod::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ParentPagerPeriod();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'ServerIdentifier'))
				$objToReturn->intServerIdentifier = $objSoapObject->ServerIdentifier;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ParentPagerPeriod::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $ServerIdentifier
	 * @property-read QQNode $Name
	 * @property-read QQReverseReferenceNodeParentPagerAttendantHistory $ParentPagerAttendantHistory
	 * @property-read QQReverseReferenceNodeParentPagerChildHistory $ParentPagerChildHistory
	 */
	class QQNodeParentPagerPeriod extends QQNode {
		protected $strTableName = 'parent_pager_period';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerPeriod';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ServerIdentifier':
					return new QQNode('server_identifier', 'ServerIdentifier', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'ParentPagerAttendantHistory':
					return new QQReverseReferenceNodeParentPagerAttendantHistory($this, 'parentpagerattendanthistory', 'reverse_reference', 'parent_pager_period_id');
				case 'ParentPagerChildHistory':
					return new QQReverseReferenceNodeParentPagerChildHistory($this, 'parentpagerchildhistory', 'reverse_reference', 'parent_pager_period_id');

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
	 * @property-read QQNode $ServerIdentifier
	 * @property-read QQNode $Name
	 * @property-read QQReverseReferenceNodeParentPagerAttendantHistory $ParentPagerAttendantHistory
	 * @property-read QQReverseReferenceNodeParentPagerChildHistory $ParentPagerChildHistory
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeParentPagerPeriod extends QQReverseReferenceNode {
		protected $strTableName = 'parent_pager_period';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerPeriod';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ServerIdentifier':
					return new QQNode('server_identifier', 'ServerIdentifier', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'ParentPagerAttendantHistory':
					return new QQReverseReferenceNodeParentPagerAttendantHistory($this, 'parentpagerattendanthistory', 'reverse_reference', 'parent_pager_period_id');
				case 'ParentPagerChildHistory':
					return new QQReverseReferenceNodeParentPagerChildHistory($this, 'parentpagerchildhistory', 'reverse_reference', 'parent_pager_period_id');

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