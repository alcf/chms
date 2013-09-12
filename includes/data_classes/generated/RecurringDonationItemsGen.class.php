<?php
	/**
	 * The abstract RecurringDonationItemsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the RecurringDonationItems subclass which
	 * extends this RecurringDonationItemsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the RecurringDonationItems class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $RecurringDonationId the value for intRecurringDonationId (Not Null)
	 * @property double $Amount the value for fltAmount 
	 * @property boolean $DonationFlag the value for blnDonationFlag 
	 * @property integer $StewardshipFundId the value for intStewardshipFundId 
	 * @property string $Other the value for strOther 
	 * @property RecurringDonation $RecurringDonation the value for the RecurringDonation object referenced by intRecurringDonationId (Not Null)
	 * @property StewardshipFund $StewardshipFund the value for the StewardshipFund object referenced by intStewardshipFundId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class RecurringDonationItemsGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column recurring_donation_items.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_donation_items.recurring_donation_id
		 * @var integer intRecurringDonationId
		 */
		protected $intRecurringDonationId;
		const RecurringDonationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_donation_items.amount
		 * @var double fltAmount
		 */
		protected $fltAmount;
		const AmountDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_donation_items.donation_flag
		 * @var boolean blnDonationFlag
		 */
		protected $blnDonationFlag;
		const DonationFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_donation_items.stewardship_fund_id
		 * @var integer intStewardshipFundId
		 */
		protected $intStewardshipFundId;
		const StewardshipFundIdDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_donation_items.other
		 * @var string strOther
		 */
		protected $strOther;
		const OtherMaxLength = 255;
		const OtherDefault = null;


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
		 * in the database column recurring_donation_items.recurring_donation_id.
		 *
		 * NOTE: Always use the RecurringDonation property getter to correctly retrieve this RecurringDonation object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var RecurringDonation objRecurringDonation
		 */
		protected $objRecurringDonation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column recurring_donation_items.stewardship_fund_id.
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
		 * Load a RecurringDonationItems from PK Info
		 * @param integer $intId
		 * @return RecurringDonationItems
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return RecurringDonationItems::QuerySingle(
				QQ::Equal(QQN::RecurringDonationItems()->Id, $intId)
			);
		}

		/**
		 * Load all RecurringDonationItemses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RecurringDonationItems[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call RecurringDonationItems::QueryArray to perform the LoadAll query
			try {
				return RecurringDonationItems::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all RecurringDonationItemses
		 * @return int
		 */
		public static function CountAll() {
			// Call RecurringDonationItems::QueryCount to perform the CountAll query
			return RecurringDonationItems::QueryCount(QQ::All());
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
			$objDatabase = RecurringDonationItems::GetDatabase();

			// Create/Build out the QueryBuilder object with RecurringDonationItems-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'recurring_donation_items');
			RecurringDonationItems::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('recurring_donation_items');

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
		 * Static Qcodo Query method to query for a single RecurringDonationItems object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RecurringDonationItems the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RecurringDonationItems::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new RecurringDonationItems object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = RecurringDonationItems::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return RecurringDonationItems::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of RecurringDonationItems objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RecurringDonationItems[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RecurringDonationItems::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return RecurringDonationItems::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = RecurringDonationItems::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of RecurringDonationItems objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RecurringDonationItems::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = RecurringDonationItems::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'recurring_donation_items_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with RecurringDonationItems-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				RecurringDonationItems::GetSelectFields($objQueryBuilder);
				RecurringDonationItems::GetFromFields($objQueryBuilder);

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
			return RecurringDonationItems::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this RecurringDonationItems
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'recurring_donation_items';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'recurring_donation_id', $strAliasPrefix . 'recurring_donation_id');
			$objBuilder->AddSelectItem($strTableName, 'amount', $strAliasPrefix . 'amount');
			$objBuilder->AddSelectItem($strTableName, 'donation_flag', $strAliasPrefix . 'donation_flag');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_fund_id', $strAliasPrefix . 'stewardship_fund_id');
			$objBuilder->AddSelectItem($strTableName, 'other', $strAliasPrefix . 'other');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a RecurringDonationItems from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this RecurringDonationItems::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return RecurringDonationItems
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the RecurringDonationItems object
			$objToReturn = new RecurringDonationItems();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'recurring_donation_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'recurring_donation_id'] : $strAliasPrefix . 'recurring_donation_id';
			$objToReturn->intRecurringDonationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount'] : $strAliasPrefix . 'amount';
			$objToReturn->fltAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'donation_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'donation_flag'] : $strAliasPrefix . 'donation_flag';
			$objToReturn->blnDonationFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_fund_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_fund_id'] : $strAliasPrefix . 'stewardship_fund_id';
			$objToReturn->intStewardshipFundId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'other', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'other'] : $strAliasPrefix . 'other';
			$objToReturn->strOther = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'recurring_donation_items__';

			// Check for RecurringDonation Early Binding
			$strAlias = $strAliasPrefix . 'recurring_donation_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objRecurringDonation = RecurringDonation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recurring_donation_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StewardshipFund Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_fund_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipFund = StewardshipFund::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_fund_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of RecurringDonationItemses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return RecurringDonationItems[]
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
					$objItem = RecurringDonationItems::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = RecurringDonationItems::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single RecurringDonationItems object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return RecurringDonationItems next row resulting from the query
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
			return RecurringDonationItems::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single RecurringDonationItems object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return RecurringDonationItems
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return RecurringDonationItems::QuerySingle(
				QQ::Equal(QQN::RecurringDonationItems()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of RecurringDonationItems objects,
		 * by RecurringDonationId Index(es)
		 * @param integer $intRecurringDonationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RecurringDonationItems[]
		*/
		public static function LoadArrayByRecurringDonationId($intRecurringDonationId, $objOptionalClauses = null) {
			// Call RecurringDonationItems::QueryArray to perform the LoadArrayByRecurringDonationId query
			try {
				return RecurringDonationItems::QueryArray(
					QQ::Equal(QQN::RecurringDonationItems()->RecurringDonationId, $intRecurringDonationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RecurringDonationItemses
		 * by RecurringDonationId Index(es)
		 * @param integer $intRecurringDonationId
		 * @return int
		*/
		public static function CountByRecurringDonationId($intRecurringDonationId, $objOptionalClauses = null) {
			// Call RecurringDonationItems::QueryCount to perform the CountByRecurringDonationId query
			return RecurringDonationItems::QueryCount(
				QQ::Equal(QQN::RecurringDonationItems()->RecurringDonationId, $intRecurringDonationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of RecurringDonationItems objects,
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RecurringDonationItems[]
		*/
		public static function LoadArrayByStewardshipFundId($intStewardshipFundId, $objOptionalClauses = null) {
			// Call RecurringDonationItems::QueryArray to perform the LoadArrayByStewardshipFundId query
			try {
				return RecurringDonationItems::QueryArray(
					QQ::Equal(QQN::RecurringDonationItems()->StewardshipFundId, $intStewardshipFundId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RecurringDonationItemses
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @return int
		*/
		public static function CountByStewardshipFundId($intStewardshipFundId, $objOptionalClauses = null) {
			// Call RecurringDonationItems::QueryCount to perform the CountByStewardshipFundId query
			return RecurringDonationItems::QueryCount(
				QQ::Equal(QQN::RecurringDonationItems()->StewardshipFundId, $intStewardshipFundId)
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
		 * Save this RecurringDonationItems
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = RecurringDonationItems::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `recurring_donation_items` (
							`recurring_donation_id`,
							`amount`,
							`donation_flag`,
							`stewardship_fund_id`,
							`other`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intRecurringDonationId) . ',
							' . $objDatabase->SqlVariable($this->fltAmount) . ',
							' . $objDatabase->SqlVariable($this->blnDonationFlag) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							' . $objDatabase->SqlVariable($this->strOther) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('recurring_donation_items', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`recurring_donation_items`
						SET
							`recurring_donation_id` = ' . $objDatabase->SqlVariable($this->intRecurringDonationId) . ',
							`amount` = ' . $objDatabase->SqlVariable($this->fltAmount) . ',
							`donation_flag` = ' . $objDatabase->SqlVariable($this->blnDonationFlag) . ',
							`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							`other` = ' . $objDatabase->SqlVariable($this->strOther) . '
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
		 * Delete this RecurringDonationItems
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this RecurringDonationItems with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = RecurringDonationItems::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recurring_donation_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all RecurringDonationItemses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = RecurringDonationItems::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recurring_donation_items`');
		}

		/**
		 * Truncate recurring_donation_items table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = RecurringDonationItems::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `recurring_donation_items`');
		}

		/**
		 * Reload this RecurringDonationItems from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved RecurringDonationItems object.');

			// Reload the Object
			$objReloaded = RecurringDonationItems::Load($this->intId);

			// Update $this's local variables to match
			$this->RecurringDonationId = $objReloaded->RecurringDonationId;
			$this->fltAmount = $objReloaded->fltAmount;
			$this->blnDonationFlag = $objReloaded->blnDonationFlag;
			$this->StewardshipFundId = $objReloaded->StewardshipFundId;
			$this->strOther = $objReloaded->strOther;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = RecurringDonationItems::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `recurring_donation_items` (
					`id`,
					`recurring_donation_id`,
					`amount`,
					`donation_flag`,
					`stewardship_fund_id`,
					`other`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intRecurringDonationId) . ',
					' . $objDatabase->SqlVariable($this->fltAmount) . ',
					' . $objDatabase->SqlVariable($this->blnDonationFlag) . ',
					' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
					' . $objDatabase->SqlVariable($this->strOther) . ',
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
		 * @return RecurringDonationItems[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = RecurringDonationItems::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM recurring_donation_items WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return RecurringDonationItems::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return RecurringDonationItems[]
		 */
		public function GetJournal() {
			return RecurringDonationItems::GetJournalForId($this->intId);
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

				case 'RecurringDonationId':
					// Gets the value for intRecurringDonationId (Not Null)
					// @return integer
					return $this->intRecurringDonationId;

				case 'Amount':
					// Gets the value for fltAmount 
					// @return double
					return $this->fltAmount;

				case 'DonationFlag':
					// Gets the value for blnDonationFlag 
					// @return boolean
					return $this->blnDonationFlag;

				case 'StewardshipFundId':
					// Gets the value for intStewardshipFundId 
					// @return integer
					return $this->intStewardshipFundId;

				case 'Other':
					// Gets the value for strOther 
					// @return string
					return $this->strOther;


				///////////////////
				// Member Objects
				///////////////////
				case 'RecurringDonation':
					// Gets the value for the RecurringDonation object referenced by intRecurringDonationId (Not Null)
					// @return RecurringDonation
					try {
						if ((!$this->objRecurringDonation) && (!is_null($this->intRecurringDonationId)))
							$this->objRecurringDonation = RecurringDonation::Load($this->intRecurringDonationId);
						return $this->objRecurringDonation;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipFund':
					// Gets the value for the StewardshipFund object referenced by intStewardshipFundId 
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
				case 'RecurringDonationId':
					// Sets the value for intRecurringDonationId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objRecurringDonation = null;
						return ($this->intRecurringDonationId = QType::Cast($mixValue, QType::Integer));
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

				case 'DonationFlag':
					// Sets the value for blnDonationFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnDonationFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipFundId':
					// Sets the value for intStewardshipFundId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipFund = null;
						return ($this->intStewardshipFundId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Other':
					// Sets the value for strOther 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strOther = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'RecurringDonation':
					// Sets the value for the RecurringDonation object referenced by intRecurringDonationId (Not Null)
					// @param RecurringDonation $mixValue
					// @return RecurringDonation
					if (is_null($mixValue)) {
						$this->intRecurringDonationId = null;
						$this->objRecurringDonation = null;
						return null;
					} else {
						// Make sure $mixValue actually is a RecurringDonation object
						try {
							$mixValue = QType::Cast($mixValue, 'RecurringDonation');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED RecurringDonation object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved RecurringDonation for this RecurringDonationItems');

						// Update Local Member Variables
						$this->objRecurringDonation = $mixValue;
						$this->intRecurringDonationId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'StewardshipFund':
					// Sets the value for the StewardshipFund object referenced by intStewardshipFundId 
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
							throw new QCallerException('Unable to set an unsaved StewardshipFund for this RecurringDonationItems');

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
			$strToReturn = '<complexType name="RecurringDonationItems"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="RecurringDonation" type="xsd1:RecurringDonation"/>';
			$strToReturn .= '<element name="Amount" type="xsd:float"/>';
			$strToReturn .= '<element name="DonationFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="StewardshipFund" type="xsd1:StewardshipFund"/>';
			$strToReturn .= '<element name="Other" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('RecurringDonationItems', $strComplexTypeArray)) {
				$strComplexTypeArray['RecurringDonationItems'] = RecurringDonationItems::GetSoapComplexTypeXml();
				RecurringDonation::AlterSoapComplexTypeArray($strComplexTypeArray);
				StewardshipFund::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, RecurringDonationItems::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new RecurringDonationItems();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'RecurringDonation')) &&
				($objSoapObject->RecurringDonation))
				$objToReturn->RecurringDonation = RecurringDonation::GetObjectFromSoapObject($objSoapObject->RecurringDonation);
			if (property_exists($objSoapObject, 'Amount'))
				$objToReturn->fltAmount = $objSoapObject->Amount;
			if (property_exists($objSoapObject, 'DonationFlag'))
				$objToReturn->blnDonationFlag = $objSoapObject->DonationFlag;
			if ((property_exists($objSoapObject, 'StewardshipFund')) &&
				($objSoapObject->StewardshipFund))
				$objToReturn->StewardshipFund = StewardshipFund::GetObjectFromSoapObject($objSoapObject->StewardshipFund);
			if (property_exists($objSoapObject, 'Other'))
				$objToReturn->strOther = $objSoapObject->Other;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, RecurringDonationItems::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objRecurringDonation)
				$objObject->objRecurringDonation = RecurringDonation::GetSoapObjectFromObject($objObject->objRecurringDonation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRecurringDonationId = null;
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

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $RecurringDonationId
	 * @property-read QQNodeRecurringDonation $RecurringDonation
	 * @property-read QQNode $Amount
	 * @property-read QQNode $DonationFlag
	 * @property-read QQNode $StewardshipFundId
	 * @property-read QQNodeStewardshipFund $StewardshipFund
	 * @property-read QQNode $Other
	 */
	class QQNodeRecurringDonationItems extends QQNode {
		protected $strTableName = 'recurring_donation_items';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'RecurringDonationItems';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'RecurringDonationId':
					return new QQNode('recurring_donation_id', 'RecurringDonationId', 'integer', $this);
				case 'RecurringDonation':
					return new QQNodeRecurringDonation('recurring_donation_id', 'RecurringDonation', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'DonationFlag':
					return new QQNode('donation_flag', 'DonationFlag', 'boolean', $this);
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'Other':
					return new QQNode('other', 'Other', 'string', $this);

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
	 * @property-read QQNode $RecurringDonationId
	 * @property-read QQNodeRecurringDonation $RecurringDonation
	 * @property-read QQNode $Amount
	 * @property-read QQNode $DonationFlag
	 * @property-read QQNode $StewardshipFundId
	 * @property-read QQNodeStewardshipFund $StewardshipFund
	 * @property-read QQNode $Other
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeRecurringDonationItems extends QQReverseReferenceNode {
		protected $strTableName = 'recurring_donation_items';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'RecurringDonationItems';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'RecurringDonationId':
					return new QQNode('recurring_donation_id', 'RecurringDonationId', 'integer', $this);
				case 'RecurringDonation':
					return new QQNodeRecurringDonation('recurring_donation_id', 'RecurringDonation', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'DonationFlag':
					return new QQNode('donation_flag', 'DonationFlag', 'boolean', $this);
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'Other':
					return new QQNode('other', 'Other', 'string', $this);

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