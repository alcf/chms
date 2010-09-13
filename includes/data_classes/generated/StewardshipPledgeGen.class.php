<?php
	/**
	 * The abstract StewardshipPledgeGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the StewardshipPledge subclass which
	 * extends this StewardshipPledgeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StewardshipPledge class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property integer $StewardshipFundId the value for intStewardshipFundId (Not Null)
	 * @property QDateTime $DateStarted the value for dttDateStarted 
	 * @property QDateTime $DateEnded the value for dttDateEnded 
	 * @property double $PledgeAmount the value for fltPledgeAmount 
	 * @property double $ContributedAmount the value for fltContributedAmount 
	 * @property double $RemainingAmount the value for fltRemainingAmount 
	 * @property boolean $FulfilledFlag the value for blnFulfilledFlag (Not Null)
	 * @property boolean $ActiveFlag the value for blnActiveFlag (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property StewardshipFund $StewardshipFund the value for the StewardshipFund object referenced by intStewardshipFundId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class StewardshipPledgeGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column stewardship_pledge.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_pledge.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_pledge.stewardship_fund_id
		 * @var integer intStewardshipFundId
		 */
		protected $intStewardshipFundId;
		const StewardshipFundIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_pledge.date_started
		 * @var QDateTime dttDateStarted
		 */
		protected $dttDateStarted;
		const DateStartedDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_pledge.date_ended
		 * @var QDateTime dttDateEnded
		 */
		protected $dttDateEnded;
		const DateEndedDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_pledge.pledge_amount
		 * @var double fltPledgeAmount
		 */
		protected $fltPledgeAmount;
		const PledgeAmountDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_pledge.contributed_amount
		 * @var double fltContributedAmount
		 */
		protected $fltContributedAmount;
		const ContributedAmountDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_pledge.remaining_amount
		 * @var double fltRemainingAmount
		 */
		protected $fltRemainingAmount;
		const RemainingAmountDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_pledge.fulfilled_flag
		 * @var boolean blnFulfilledFlag
		 */
		protected $blnFulfilledFlag;
		const FulfilledFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_pledge.active_flag
		 * @var boolean blnActiveFlag
		 */
		protected $blnActiveFlag;
		const ActiveFlagDefault = null;


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
		 * in the database column stewardship_pledge.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column stewardship_pledge.stewardship_fund_id.
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
		 * Load a StewardshipPledge from PK Info
		 * @param integer $intId
		 * @return StewardshipPledge
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return StewardshipPledge::QuerySingle(
				QQ::Equal(QQN::StewardshipPledge()->Id, $intId)
			);
		}

		/**
		 * Load all StewardshipPledges
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPledge[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call StewardshipPledge::QueryArray to perform the LoadAll query
			try {
				return StewardshipPledge::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all StewardshipPledges
		 * @return int
		 */
		public static function CountAll() {
			// Call StewardshipPledge::QueryCount to perform the CountAll query
			return StewardshipPledge::QueryCount(QQ::All());
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
			$objDatabase = StewardshipPledge::GetDatabase();

			// Create/Build out the QueryBuilder object with StewardshipPledge-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'stewardship_pledge');
			StewardshipPledge::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('stewardship_pledge');

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
		 * Static Qcodo Query method to query for a single StewardshipPledge object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipPledge the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPledge::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new StewardshipPledge object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = StewardshipPledge::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return StewardshipPledge::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of StewardshipPledge objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipPledge[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPledge::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return StewardshipPledge::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = StewardshipPledge::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of StewardshipPledge objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPledge::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = StewardshipPledge::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'stewardship_pledge_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with StewardshipPledge-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				StewardshipPledge::GetSelectFields($objQueryBuilder);
				StewardshipPledge::GetFromFields($objQueryBuilder);

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
			return StewardshipPledge::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this StewardshipPledge
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'stewardship_pledge';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_fund_id', $strAliasPrefix . 'stewardship_fund_id');
			$objBuilder->AddSelectItem($strTableName, 'date_started', $strAliasPrefix . 'date_started');
			$objBuilder->AddSelectItem($strTableName, 'date_ended', $strAliasPrefix . 'date_ended');
			$objBuilder->AddSelectItem($strTableName, 'pledge_amount', $strAliasPrefix . 'pledge_amount');
			$objBuilder->AddSelectItem($strTableName, 'contributed_amount', $strAliasPrefix . 'contributed_amount');
			$objBuilder->AddSelectItem($strTableName, 'remaining_amount', $strAliasPrefix . 'remaining_amount');
			$objBuilder->AddSelectItem($strTableName, 'fulfilled_flag', $strAliasPrefix . 'fulfilled_flag');
			$objBuilder->AddSelectItem($strTableName, 'active_flag', $strAliasPrefix . 'active_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a StewardshipPledge from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this StewardshipPledge::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipPledge
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the StewardshipPledge object
			$objToReturn = new StewardshipPledge();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_fund_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_fund_id'] : $strAliasPrefix . 'stewardship_fund_id';
			$objToReturn->intStewardshipFundId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_started', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_started'] : $strAliasPrefix . 'date_started';
			$objToReturn->dttDateStarted = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_ended', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_ended'] : $strAliasPrefix . 'date_ended';
			$objToReturn->dttDateEnded = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'pledge_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'pledge_amount'] : $strAliasPrefix . 'pledge_amount';
			$objToReturn->fltPledgeAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'contributed_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'contributed_amount'] : $strAliasPrefix . 'contributed_amount';
			$objToReturn->fltContributedAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'remaining_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'remaining_amount'] : $strAliasPrefix . 'remaining_amount';
			$objToReturn->fltRemainingAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'fulfilled_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fulfilled_flag'] : $strAliasPrefix . 'fulfilled_flag';
			$objToReturn->blnFulfilledFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'active_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'active_flag'] : $strAliasPrefix . 'active_flag';
			$objToReturn->blnActiveFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'stewardship_pledge__';

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StewardshipFund Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_fund_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipFund = StewardshipFund::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_fund_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of StewardshipPledges from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipPledge[]
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
					$objItem = StewardshipPledge::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = StewardshipPledge::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single StewardshipPledge object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return StewardshipPledge next row resulting from the query
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
			return StewardshipPledge::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single StewardshipPledge object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return StewardshipPledge
		*/
		public static function LoadById($intId) {
			return StewardshipPledge::QuerySingle(
				QQ::Equal(QQN::StewardshipPledge()->Id, $intId)
			);
		}
			
		/**
		 * Load a single StewardshipPledge object,
		 * by PersonId, StewardshipFundId Index(es)
		 * @param integer $intPersonId
		 * @param integer $intStewardshipFundId
		 * @return StewardshipPledge
		*/
		public static function LoadByPersonIdStewardshipFundId($intPersonId, $intStewardshipFundId) {
			return StewardshipPledge::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::StewardshipPledge()->PersonId, $intPersonId),
				QQ::Equal(QQN::StewardshipPledge()->StewardshipFundId, $intStewardshipFundId)
				)
			);
		}
			
		/**
		 * Load an array of StewardshipPledge objects,
		 * by FulfilledFlag, ActiveFlag Index(es)
		 * @param boolean $blnFulfilledFlag
		 * @param boolean $blnActiveFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPledge[]
		*/
		public static function LoadArrayByFulfilledFlagActiveFlag($blnFulfilledFlag, $blnActiveFlag, $objOptionalClauses = null) {
			// Call StewardshipPledge::QueryArray to perform the LoadArrayByFulfilledFlagActiveFlag query
			try {
				return StewardshipPledge::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::StewardshipPledge()->FulfilledFlag, $blnFulfilledFlag),
					QQ::Equal(QQN::StewardshipPledge()->ActiveFlag, $blnActiveFlag)
					),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipPledges
		 * by FulfilledFlag, ActiveFlag Index(es)
		 * @param boolean $blnFulfilledFlag
		 * @param boolean $blnActiveFlag
		 * @return int
		*/
		public static function CountByFulfilledFlagActiveFlag($blnFulfilledFlag, $blnActiveFlag) {
			// Call StewardshipPledge::QueryCount to perform the CountByFulfilledFlagActiveFlag query
			return StewardshipPledge::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::StewardshipPledge()->FulfilledFlag, $blnFulfilledFlag),
				QQ::Equal(QQN::StewardshipPledge()->ActiveFlag, $blnActiveFlag)
				)
			);
		}
			
		/**
		 * Load an array of StewardshipPledge objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPledge[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call StewardshipPledge::QueryArray to perform the LoadArrayByPersonId query
			try {
				return StewardshipPledge::QueryArray(
					QQ::Equal(QQN::StewardshipPledge()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipPledges
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call StewardshipPledge::QueryCount to perform the CountByPersonId query
			return StewardshipPledge::QueryCount(
				QQ::Equal(QQN::StewardshipPledge()->PersonId, $intPersonId)
			);
		}
			
		/**
		 * Load an array of StewardshipPledge objects,
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPledge[]
		*/
		public static function LoadArrayByStewardshipFundId($intStewardshipFundId, $objOptionalClauses = null) {
			// Call StewardshipPledge::QueryArray to perform the LoadArrayByStewardshipFundId query
			try {
				return StewardshipPledge::QueryArray(
					QQ::Equal(QQN::StewardshipPledge()->StewardshipFundId, $intStewardshipFundId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipPledges
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @return int
		*/
		public static function CountByStewardshipFundId($intStewardshipFundId) {
			// Call StewardshipPledge::QueryCount to perform the CountByStewardshipFundId query
			return StewardshipPledge::QueryCount(
				QQ::Equal(QQN::StewardshipPledge()->StewardshipFundId, $intStewardshipFundId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this StewardshipPledge
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPledge::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `stewardship_pledge` (
							`person_id`,
							`stewardship_fund_id`,
							`date_started`,
							`date_ended`,
							`pledge_amount`,
							`contributed_amount`,
							`remaining_amount`,
							`fulfilled_flag`,
							`active_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							' . $objDatabase->SqlVariable($this->dttDateStarted) . ',
							' . $objDatabase->SqlVariable($this->dttDateEnded) . ',
							' . $objDatabase->SqlVariable($this->fltPledgeAmount) . ',
							' . $objDatabase->SqlVariable($this->fltContributedAmount) . ',
							' . $objDatabase->SqlVariable($this->fltRemainingAmount) . ',
							' . $objDatabase->SqlVariable($this->blnFulfilledFlag) . ',
							' . $objDatabase->SqlVariable($this->blnActiveFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('stewardship_pledge', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`stewardship_pledge`
						SET
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							`date_started` = ' . $objDatabase->SqlVariable($this->dttDateStarted) . ',
							`date_ended` = ' . $objDatabase->SqlVariable($this->dttDateEnded) . ',
							`pledge_amount` = ' . $objDatabase->SqlVariable($this->fltPledgeAmount) . ',
							`contributed_amount` = ' . $objDatabase->SqlVariable($this->fltContributedAmount) . ',
							`remaining_amount` = ' . $objDatabase->SqlVariable($this->fltRemainingAmount) . ',
							`fulfilled_flag` = ' . $objDatabase->SqlVariable($this->blnFulfilledFlag) . ',
							`active_flag` = ' . $objDatabase->SqlVariable($this->blnActiveFlag) . '
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
		 * Delete this StewardshipPledge
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this StewardshipPledge with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipPledge::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_pledge`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all StewardshipPledges
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPledge::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_pledge`');
		}

		/**
		 * Truncate stewardship_pledge table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPledge::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `stewardship_pledge`');
		}

		/**
		 * Reload this StewardshipPledge from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved StewardshipPledge object.');

			// Reload the Object
			$objReloaded = StewardshipPledge::Load($this->intId);

			// Update $this's local variables to match
			$this->PersonId = $objReloaded->PersonId;
			$this->StewardshipFundId = $objReloaded->StewardshipFundId;
			$this->dttDateStarted = $objReloaded->dttDateStarted;
			$this->dttDateEnded = $objReloaded->dttDateEnded;
			$this->fltPledgeAmount = $objReloaded->fltPledgeAmount;
			$this->fltContributedAmount = $objReloaded->fltContributedAmount;
			$this->fltRemainingAmount = $objReloaded->fltRemainingAmount;
			$this->blnFulfilledFlag = $objReloaded->blnFulfilledFlag;
			$this->blnActiveFlag = $objReloaded->blnActiveFlag;
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

				case 'PersonId':
					// Gets the value for intPersonId (Not Null)
					// @return integer
					return $this->intPersonId;

				case 'StewardshipFundId':
					// Gets the value for intStewardshipFundId (Not Null)
					// @return integer
					return $this->intStewardshipFundId;

				case 'DateStarted':
					// Gets the value for dttDateStarted 
					// @return QDateTime
					return $this->dttDateStarted;

				case 'DateEnded':
					// Gets the value for dttDateEnded 
					// @return QDateTime
					return $this->dttDateEnded;

				case 'PledgeAmount':
					// Gets the value for fltPledgeAmount 
					// @return double
					return $this->fltPledgeAmount;

				case 'ContributedAmount':
					// Gets the value for fltContributedAmount 
					// @return double
					return $this->fltContributedAmount;

				case 'RemainingAmount':
					// Gets the value for fltRemainingAmount 
					// @return double
					return $this->fltRemainingAmount;

				case 'FulfilledFlag':
					// Gets the value for blnFulfilledFlag (Not Null)
					// @return boolean
					return $this->blnFulfilledFlag;

				case 'ActiveFlag':
					// Gets the value for blnActiveFlag (Not Null)
					// @return boolean
					return $this->blnActiveFlag;


				///////////////////
				// Member Objects
				///////////////////
				case 'Person':
					// Gets the value for the Person object referenced by intPersonId (Not Null)
					// @return Person
					try {
						if ((!$this->objPerson) && (!is_null($this->intPersonId)))
							$this->objPerson = Person::Load($this->intPersonId);
						return $this->objPerson;
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
				case 'PersonId':
					// Sets the value for intPersonId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPerson = null;
						return ($this->intPersonId = QType::Cast($mixValue, QType::Integer));
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

				case 'DateStarted':
					// Sets the value for dttDateStarted 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateStarted = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateEnded':
					// Sets the value for dttDateEnded 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateEnded = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PledgeAmount':
					// Sets the value for fltPledgeAmount 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltPledgeAmount = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ContributedAmount':
					// Sets the value for fltContributedAmount 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltContributedAmount = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RemainingAmount':
					// Sets the value for fltRemainingAmount 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltRemainingAmount = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FulfilledFlag':
					// Sets the value for blnFulfilledFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnFulfilledFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ActiveFlag':
					// Sets the value for blnActiveFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnActiveFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Person':
					// Sets the value for the Person object referenced by intPersonId (Not Null)
					// @param Person $mixValue
					// @return Person
					if (is_null($mixValue)) {
						$this->intPersonId = null;
						$this->objPerson = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Person object
						try {
							$mixValue = QType::Cast($mixValue, 'Person');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Person object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Person for this StewardshipPledge');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved StewardshipFund for this StewardshipPledge');

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
			$strToReturn = '<complexType name="StewardshipPledge"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="StewardshipFund" type="xsd1:StewardshipFund"/>';
			$strToReturn .= '<element name="DateStarted" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateEnded" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="PledgeAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="ContributedAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="RemainingAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="FulfilledFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ActiveFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('StewardshipPledge', $strComplexTypeArray)) {
				$strComplexTypeArray['StewardshipPledge'] = StewardshipPledge::GetSoapComplexTypeXml();
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				StewardshipFund::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, StewardshipPledge::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new StewardshipPledge();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if ((property_exists($objSoapObject, 'StewardshipFund')) &&
				($objSoapObject->StewardshipFund))
				$objToReturn->StewardshipFund = StewardshipFund::GetObjectFromSoapObject($objSoapObject->StewardshipFund);
			if (property_exists($objSoapObject, 'DateStarted'))
				$objToReturn->dttDateStarted = new QDateTime($objSoapObject->DateStarted);
			if (property_exists($objSoapObject, 'DateEnded'))
				$objToReturn->dttDateEnded = new QDateTime($objSoapObject->DateEnded);
			if (property_exists($objSoapObject, 'PledgeAmount'))
				$objToReturn->fltPledgeAmount = $objSoapObject->PledgeAmount;
			if (property_exists($objSoapObject, 'ContributedAmount'))
				$objToReturn->fltContributedAmount = $objSoapObject->ContributedAmount;
			if (property_exists($objSoapObject, 'RemainingAmount'))
				$objToReturn->fltRemainingAmount = $objSoapObject->RemainingAmount;
			if (property_exists($objSoapObject, 'FulfilledFlag'))
				$objToReturn->blnFulfilledFlag = $objSoapObject->FulfilledFlag;
			if (property_exists($objSoapObject, 'ActiveFlag'))
				$objToReturn->blnActiveFlag = $objSoapObject->ActiveFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, StewardshipPledge::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->objStewardshipFund)
				$objObject->objStewardshipFund = StewardshipFund::GetSoapObjectFromObject($objObject->objStewardshipFund, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipFundId = null;
			if ($objObject->dttDateStarted)
				$objObject->dttDateStarted = $objObject->dttDateStarted->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateEnded)
				$objObject->dttDateEnded = $objObject->dttDateEnded->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeStewardshipPledge extends QQNode {
		protected $strTableName = 'stewardship_pledge';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipPledge';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'DateStarted':
					return new QQNode('date_started', 'DateStarted', 'QDateTime', $this);
				case 'DateEnded':
					return new QQNode('date_ended', 'DateEnded', 'QDateTime', $this);
				case 'PledgeAmount':
					return new QQNode('pledge_amount', 'PledgeAmount', 'double', $this);
				case 'ContributedAmount':
					return new QQNode('contributed_amount', 'ContributedAmount', 'double', $this);
				case 'RemainingAmount':
					return new QQNode('remaining_amount', 'RemainingAmount', 'double', $this);
				case 'FulfilledFlag':
					return new QQNode('fulfilled_flag', 'FulfilledFlag', 'boolean', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);

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

	class QQReverseReferenceNodeStewardshipPledge extends QQReverseReferenceNode {
		protected $strTableName = 'stewardship_pledge';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipPledge';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'DateStarted':
					return new QQNode('date_started', 'DateStarted', 'QDateTime', $this);
				case 'DateEnded':
					return new QQNode('date_ended', 'DateEnded', 'QDateTime', $this);
				case 'PledgeAmount':
					return new QQNode('pledge_amount', 'PledgeAmount', 'double', $this);
				case 'ContributedAmount':
					return new QQNode('contributed_amount', 'ContributedAmount', 'double', $this);
				case 'RemainingAmount':
					return new QQNode('remaining_amount', 'RemainingAmount', 'double', $this);
				case 'FulfilledFlag':
					return new QQNode('fulfilled_flag', 'FulfilledFlag', 'boolean', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);

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