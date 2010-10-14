<?php
	/**
	 * The abstract CheckingAccountLookupGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the CheckingAccountLookup subclass which
	 * extends this CheckingAccountLookupGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CheckingAccountLookup class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $TransitHash the value for strTransitHash 
	 * @property string $AccountHash the value for strAccountHash 
	 * @property Person $_Person the value for the private _objPerson (Read-Only) if set due to an expansion on the checkingaccountlookup_person_assn association table
	 * @property Person[] $_PersonArray the value for the private _objPersonArray (Read-Only) if set due to an ExpandAsArray on the checkingaccountlookup_person_assn association table
	 * @property StewardshipContribution $_StewardshipContribution the value for the private _objStewardshipContribution (Read-Only) if set due to an expansion on the stewardship_contribution.checking_account_lookup_id reverse relationship
	 * @property StewardshipContribution[] $_StewardshipContributionArray the value for the private _objStewardshipContributionArray (Read-Only) if set due to an ExpandAsArray on the stewardship_contribution.checking_account_lookup_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CheckingAccountLookupGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column checking_account_lookup.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column checking_account_lookup.transit_hash
		 * @var string strTransitHash
		 */
		protected $strTransitHash;
		const TransitHashMaxLength = 32;
		const TransitHashDefault = null;


		/**
		 * Protected member variable that maps to the database column checking_account_lookup.account_hash
		 * @var string strAccountHash
		 */
		protected $strAccountHash;
		const AccountHashMaxLength = 32;
		const AccountHashDefault = null;


		/**
		 * Private member variable that stores a reference to a single Person object
		 * (of type Person), if this CheckingAccountLookup object was restored with
		 * an expansion on the checkingaccountlookup_person_assn association table.
		 * @var Person _objPerson;
		 */
		private $_objPerson;

		/**
		 * Private member variable that stores a reference to an array of Person objects
		 * (of type Person[]), if this CheckingAccountLookup object was restored with
		 * an ExpandAsArray on the checkingaccountlookup_person_assn association table.
		 * @var Person[] _objPersonArray;
		 */
		private $_objPersonArray = array();

		/**
		 * Private member variable that stores a reference to a single StewardshipContribution object
		 * (of type StewardshipContribution), if this CheckingAccountLookup object was restored with
		 * an expansion on the stewardship_contribution association table.
		 * @var StewardshipContribution _objStewardshipContribution;
		 */
		private $_objStewardshipContribution;

		/**
		 * Private member variable that stores a reference to an array of StewardshipContribution objects
		 * (of type StewardshipContribution[]), if this CheckingAccountLookup object was restored with
		 * an ExpandAsArray on the stewardship_contribution association table.
		 * @var StewardshipContribution[] _objStewardshipContributionArray;
		 */
		private $_objStewardshipContributionArray = array();

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
		 * Load a CheckingAccountLookup from PK Info
		 * @param integer $intId
		 * @return CheckingAccountLookup
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return CheckingAccountLookup::QuerySingle(
				QQ::Equal(QQN::CheckingAccountLookup()->Id, $intId)
			);
		}

		/**
		 * Load all CheckingAccountLookups
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CheckingAccountLookup[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call CheckingAccountLookup::QueryArray to perform the LoadAll query
			try {
				return CheckingAccountLookup::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all CheckingAccountLookups
		 * @return int
		 */
		public static function CountAll() {
			// Call CheckingAccountLookup::QueryCount to perform the CountAll query
			return CheckingAccountLookup::QueryCount(QQ::All());
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
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Create/Build out the QueryBuilder object with CheckingAccountLookup-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'checking_account_lookup');
			CheckingAccountLookup::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('checking_account_lookup');

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
		 * Static Qcodo Query method to query for a single CheckingAccountLookup object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CheckingAccountLookup the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CheckingAccountLookup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new CheckingAccountLookup object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = CheckingAccountLookup::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return CheckingAccountLookup::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of CheckingAccountLookup objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CheckingAccountLookup[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CheckingAccountLookup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return CheckingAccountLookup::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = CheckingAccountLookup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of CheckingAccountLookup objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CheckingAccountLookup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'checking_account_lookup_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with CheckingAccountLookup-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				CheckingAccountLookup::GetSelectFields($objQueryBuilder);
				CheckingAccountLookup::GetFromFields($objQueryBuilder);

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
			return CheckingAccountLookup::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this CheckingAccountLookup
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'checking_account_lookup';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'transit_hash', $strAliasPrefix . 'transit_hash');
			$objBuilder->AddSelectItem($strTableName, 'account_hash', $strAliasPrefix . 'account_hash');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a CheckingAccountLookup from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this CheckingAccountLookup::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return CheckingAccountLookup
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
					$strAliasPrefix = 'checking_account_lookup__';

				$strAlias = $strAliasPrefix . 'person__person_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPersonArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPersonArray[$intPreviousChildItemCount - 1];
						$objChildItem = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person__person_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPersonArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPersonArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				$strAlias = $strAliasPrefix . 'stewardshipcontribution__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStewardshipContributionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStewardshipContributionArray[$intPreviousChildItemCount - 1];
						$objChildItem = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStewardshipContributionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStewardshipContributionArray[] = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'checking_account_lookup__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the CheckingAccountLookup object
			$objToReturn = new CheckingAccountLookup();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'transit_hash', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'transit_hash'] : $strAliasPrefix . 'transit_hash';
			$objToReturn->strTransitHash = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'account_hash', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'account_hash'] : $strAliasPrefix . 'account_hash';
			$objToReturn->strAccountHash = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'checking_account_lookup__';



			// Check for Person Virtual Binding
			$strAlias = $strAliasPrefix . 'person__person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPersonArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person__person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for StewardshipContribution Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshipcontribution__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipContributionArray[] = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipContribution = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of CheckingAccountLookups from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return CheckingAccountLookup[]
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
					$objItem = CheckingAccountLookup::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = CheckingAccountLookup::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single CheckingAccountLookup object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return CheckingAccountLookup next row resulting from the query
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
			return CheckingAccountLookup::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single CheckingAccountLookup object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return CheckingAccountLookup
		*/
		public static function LoadById($intId) {
			return CheckingAccountLookup::QuerySingle(
				QQ::Equal(QQN::CheckingAccountLookup()->Id, $intId)
			);
		}
			
		/**
		 * Load a single CheckingAccountLookup object,
		 * by TransitHash, AccountHash Index(es)
		 * @param string $strTransitHash
		 * @param string $strAccountHash
		 * @return CheckingAccountLookup
		*/
		public static function LoadByTransitHashAccountHash($strTransitHash, $strAccountHash) {
			return CheckingAccountLookup::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::CheckingAccountLookup()->TransitHash, $strTransitHash),
				QQ::Equal(QQN::CheckingAccountLookup()->AccountHash, $strAccountHash)
				)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Person objects for a given Person
		 * via the checkingaccountlookup_person_assn table
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CheckingAccountLookup[]
		*/
		public static function LoadArrayByPerson($intPersonId, $objOptionalClauses = null) {
			// Call CheckingAccountLookup::QueryArray to perform the LoadArrayByPerson query
			try {
				return CheckingAccountLookup::QueryArray(
					QQ::Equal(QQN::CheckingAccountLookup()->Person->PersonId, $intPersonId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CheckingAccountLookups for a given Person
		 * via the checkingaccountlookup_person_assn table
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPerson($intPersonId) {
			return CheckingAccountLookup::QueryCount(
				QQ::Equal(QQN::CheckingAccountLookup()->Person->PersonId, $intPersonId)
			);
		}




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
				INSERT INTO `checking_account_lookup` (
					`id`,
					`transit_hash`,
					`account_hash`,
					sys_login_id,
					sys_action,
					sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strTransitHash) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strAccountHash) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Save this CheckingAccountLookup
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `checking_account_lookup` (
							`transit_hash`,
							`account_hash`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strTransitHash) . ',
							' . $objDatabase->SqlVariable($this->strAccountHash) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('checking_account_lookup', 'id');

					// Journaling
					$this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`checking_account_lookup`
						SET
							`transit_hash` = ' . $objDatabase->SqlVariable($this->strTransitHash) . ',
							`account_hash` = ' . $objDatabase->SqlVariable($this->strAccountHash) . '
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
		 * Delete this CheckingAccountLookup
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this CheckingAccountLookup with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`checking_account_lookup`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			$this->Journal('DELETE');
		}

		/**
		 * Delete all CheckingAccountLookups
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`checking_account_lookup`');
		}

		/**
		 * Truncate checking_account_lookup table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `checking_account_lookup`');
		}

		/**
		 * Reload this CheckingAccountLookup from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved CheckingAccountLookup object.');

			// Reload the Object
			$objReloaded = CheckingAccountLookup::Load($this->intId);

			// Update $this's local variables to match
			$this->strTransitHash = $objReloaded->strTransitHash;
			$this->strAccountHash = $objReloaded->strAccountHash;
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

				case 'TransitHash':
					// Gets the value for strTransitHash 
					// @return string
					return $this->strTransitHash;

				case 'AccountHash':
					// Gets the value for strAccountHash 
					// @return string
					return $this->strAccountHash;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Person':
					// Gets the value for the private _objPerson (Read-Only)
					// if set due to an expansion on the checkingaccountlookup_person_assn association table
					// @return Person
					return $this->_objPerson;

				case '_PersonArray':
					// Gets the value for the private _objPersonArray (Read-Only)
					// if set due to an ExpandAsArray on the checkingaccountlookup_person_assn association table
					// @return Person[]
					return (array) $this->_objPersonArray;

				case '_StewardshipContribution':
					// Gets the value for the private _objStewardshipContribution (Read-Only)
					// if set due to an expansion on the stewardship_contribution.checking_account_lookup_id reverse relationship
					// @return StewardshipContribution
					return $this->_objStewardshipContribution;

				case '_StewardshipContributionArray':
					// Gets the value for the private _objStewardshipContributionArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_contribution.checking_account_lookup_id reverse relationship
					// @return StewardshipContribution[]
					return (array) $this->_objStewardshipContributionArray;


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
				case 'TransitHash':
					// Sets the value for strTransitHash 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTransitHash = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AccountHash':
					// Sets the value for strAccountHash 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAccountHash = QType::Cast($mixValue, QType::String));
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

			
		
		// Related Objects' Methods for StewardshipContribution
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StewardshipContributions as an array of StewardshipContribution objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/ 
		public function GetStewardshipContributionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StewardshipContribution::LoadArrayByCheckingAccountLookupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StewardshipContributions
		 * @return int
		*/ 
		public function CountStewardshipContributions() {
			if ((is_null($this->intId)))
				return 0;

			return StewardshipContribution::CountByCheckingAccountLookupId($this->intId);
		}

		/**
		 * Associates a StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function AssociateStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContribution on this unsaved CheckingAccountLookup.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContribution on this CheckingAccountLookup with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`checking_account_lookup_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . '
			');
		}

		/**
		 * Unassociates a StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function UnassociateStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved CheckingAccountLookup.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this CheckingAccountLookup with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`checking_account_lookup_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . ' AND
					`checking_account_lookup_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all StewardshipContributions
		 * @return void
		*/ 
		public function UnassociateAllStewardshipContributions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved CheckingAccountLookup.');

			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`checking_account_lookup_id` = null
				WHERE
					`checking_account_lookup_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved CheckingAccountLookup.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this CheckingAccountLookup with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . ' AND
					`checking_account_lookup_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated StewardshipContributions
		 * @return void
		*/ 
		public function DeleteAllStewardshipContributions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved CheckingAccountLookup.');

			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution`
				WHERE
					`checking_account_lookup_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for Person
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated People as an array of Person objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/ 
		public function GetPersonArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Person::LoadArrayByCheckingAccountLookup($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated People
		 * @return int
		*/ 
		public function CountPeople() {
			if ((is_null($this->intId)))
				return 0;

			return Person::CountByCheckingAccountLookup($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific Person
		 * @param Person $objPerson
		 * @return bool
		*/
		public function IsPersonAssociated(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsPersonAssociated on this unsaved CheckingAccountLookup.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsPersonAssociated on this CheckingAccountLookup with an unsaved Person.');

			$intRowCount = CheckingAccountLookup::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::CheckingAccountLookup()->Id, $this->intId),
					QQ::Equal(QQN::CheckingAccountLookup()->Person->PersonId, $objPerson->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a Person
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function AssociatePerson(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePerson on this unsaved CheckingAccountLookup.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePerson on this CheckingAccountLookup with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `checkingaccountlookup_person_assn` (
					`checking_account_lookup_id`,
					`person_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objPerson->Id) . '
				)
			');
		}

		/**
		 * Unassociates a Person
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function UnassociatePerson(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePerson on this unsaved CheckingAccountLookup.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePerson on this CheckingAccountLookup with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`checkingaccountlookup_person_assn`
				WHERE
					`checking_account_lookup_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objPerson->Id) . '
			');
		}

		/**
		 * Unassociates all People
		 * @return void
		*/ 
		public function UnassociateAllPeople() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllPersonArray on this unsaved CheckingAccountLookup.');

			// Get the Database Object for this Class
			$objDatabase = CheckingAccountLookup::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`checkingaccountlookup_person_assn`
				WHERE
					`checking_account_lookup_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="CheckingAccountLookup"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="TransitHash" type="xsd:string"/>';
			$strToReturn .= '<element name="AccountHash" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('CheckingAccountLookup', $strComplexTypeArray)) {
				$strComplexTypeArray['CheckingAccountLookup'] = CheckingAccountLookup::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, CheckingAccountLookup::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new CheckingAccountLookup();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'TransitHash'))
				$objToReturn->strTransitHash = $objSoapObject->TransitHash;
			if (property_exists($objSoapObject, 'AccountHash'))
				$objToReturn->strAccountHash = $objSoapObject->AccountHash;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, CheckingAccountLookup::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeCheckingAccountLookupPerson extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'person';

		protected $strTableName = 'checkingaccountlookup_person_assn';
		protected $strPrimaryKey = 'checking_account_lookup_id';
		protected $strClassName = 'Person';

		public function __get($strName) {
			switch ($strName) {
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'PersonId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodePerson('person_id', 'PersonId', 'integer', $this);
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

	class QQNodeCheckingAccountLookup extends QQNode {
		protected $strTableName = 'checking_account_lookup';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'CheckingAccountLookup';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'TransitHash':
					return new QQNode('transit_hash', 'TransitHash', 'string', $this);
				case 'AccountHash':
					return new QQNode('account_hash', 'AccountHash', 'string', $this);
				case 'Person':
					return new QQNodeCheckingAccountLookupPerson($this);
				case 'StewardshipContribution':
					return new QQReverseReferenceNodeStewardshipContribution($this, 'stewardshipcontribution', 'reverse_reference', 'checking_account_lookup_id');

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

	class QQReverseReferenceNodeCheckingAccountLookup extends QQReverseReferenceNode {
		protected $strTableName = 'checking_account_lookup';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'CheckingAccountLookup';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'TransitHash':
					return new QQNode('transit_hash', 'TransitHash', 'string', $this);
				case 'AccountHash':
					return new QQNode('account_hash', 'AccountHash', 'string', $this);
				case 'Person':
					return new QQNodeCheckingAccountLookupPerson($this);
				case 'StewardshipContribution':
					return new QQReverseReferenceNodeStewardshipContribution($this, 'stewardshipcontribution', 'reverse_reference', 'checking_account_lookup_id');

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