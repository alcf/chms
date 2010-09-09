<?php
	/**
	 * The abstract HouseholdGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Household subclass which
	 * extends this HouseholdGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Household class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Name the value for strName 
	 * @property integer $HeadPersonId the value for intHeadPersonId (Unique)
	 * @property boolean $CombinedStewardshipFlag the value for blnCombinedStewardshipFlag 
	 * @property string $Members the value for strMembers 
	 * @property Person $HeadPerson the value for the Person object referenced by intHeadPersonId (Unique)
	 * @property Address $_Address the value for the private _objAddress (Read-Only) if set due to an expansion on the address.household_id reverse relationship
	 * @property Address[] $_AddressArray the value for the private _objAddressArray (Read-Only) if set due to an ExpandAsArray on the address.household_id reverse relationship
	 * @property HouseholdParticipation $_HouseholdParticipation the value for the private _objHouseholdParticipation (Read-Only) if set due to an expansion on the household_participation.household_id reverse relationship
	 * @property HouseholdParticipation[] $_HouseholdParticipationArray the value for the private _objHouseholdParticipationArray (Read-Only) if set due to an ExpandAsArray on the household_participation.household_id reverse relationship
	 * @property HouseholdSplit $_HouseholdSplitAsSplit the value for the private _objHouseholdSplitAsSplit (Read-Only) if set due to an expansion on the household_split.split_household_id reverse relationship
	 * @property HouseholdSplit[] $_HouseholdSplitAsSplitArray the value for the private _objHouseholdSplitAsSplitArray (Read-Only) if set due to an ExpandAsArray on the household_split.split_household_id reverse relationship
	 * @property HouseholdSplit $_HouseholdSplit the value for the private _objHouseholdSplit (Read-Only) if set due to an expansion on the household_split.household_id reverse relationship
	 * @property HouseholdSplit[] $_HouseholdSplitArray the value for the private _objHouseholdSplitArray (Read-Only) if set due to an ExpandAsArray on the household_split.household_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class HouseholdGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column household.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column household.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 200;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column household.head_person_id
		 * @var integer intHeadPersonId
		 */
		protected $intHeadPersonId;
		const HeadPersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column household.combined_stewardship_flag
		 * @var boolean blnCombinedStewardshipFlag
		 */
		protected $blnCombinedStewardshipFlag;
		const CombinedStewardshipFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column household.members
		 * @var string strMembers
		 */
		protected $strMembers;
		const MembersMaxLength = 255;
		const MembersDefault = null;


		/**
		 * Private member variable that stores a reference to a single Address object
		 * (of type Address), if this Household object was restored with
		 * an expansion on the address association table.
		 * @var Address _objAddress;
		 */
		private $_objAddress;

		/**
		 * Private member variable that stores a reference to an array of Address objects
		 * (of type Address[]), if this Household object was restored with
		 * an ExpandAsArray on the address association table.
		 * @var Address[] _objAddressArray;
		 */
		private $_objAddressArray = array();

		/**
		 * Private member variable that stores a reference to a single HouseholdParticipation object
		 * (of type HouseholdParticipation), if this Household object was restored with
		 * an expansion on the household_participation association table.
		 * @var HouseholdParticipation _objHouseholdParticipation;
		 */
		private $_objHouseholdParticipation;

		/**
		 * Private member variable that stores a reference to an array of HouseholdParticipation objects
		 * (of type HouseholdParticipation[]), if this Household object was restored with
		 * an ExpandAsArray on the household_participation association table.
		 * @var HouseholdParticipation[] _objHouseholdParticipationArray;
		 */
		private $_objHouseholdParticipationArray = array();

		/**
		 * Private member variable that stores a reference to a single HouseholdSplitAsSplit object
		 * (of type HouseholdSplit), if this Household object was restored with
		 * an expansion on the household_split association table.
		 * @var HouseholdSplit _objHouseholdSplitAsSplit;
		 */
		private $_objHouseholdSplitAsSplit;

		/**
		 * Private member variable that stores a reference to an array of HouseholdSplitAsSplit objects
		 * (of type HouseholdSplit[]), if this Household object was restored with
		 * an ExpandAsArray on the household_split association table.
		 * @var HouseholdSplit[] _objHouseholdSplitAsSplitArray;
		 */
		private $_objHouseholdSplitAsSplitArray = array();

		/**
		 * Private member variable that stores a reference to a single HouseholdSplit object
		 * (of type HouseholdSplit), if this Household object was restored with
		 * an expansion on the household_split association table.
		 * @var HouseholdSplit _objHouseholdSplit;
		 */
		private $_objHouseholdSplit;

		/**
		 * Private member variable that stores a reference to an array of HouseholdSplit objects
		 * (of type HouseholdSplit[]), if this Household object was restored with
		 * an ExpandAsArray on the household_split association table.
		 * @var HouseholdSplit[] _objHouseholdSplitArray;
		 */
		private $_objHouseholdSplitArray = array();

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
		 * in the database column household.head_person_id.
		 *
		 * NOTE: Always use the HeadPerson property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objHeadPerson
		 */
		protected $objHeadPerson;





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
		 * Load a Household from PK Info
		 * @param integer $intId
		 * @return Household
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Household::QuerySingle(
				QQ::Equal(QQN::Household()->Id, $intId)
			);
		}

		/**
		 * Load all Households
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Household[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Household::QueryArray to perform the LoadAll query
			try {
				return Household::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Households
		 * @return int
		 */
		public static function CountAll() {
			// Call Household::QueryCount to perform the CountAll query
			return Household::QueryCount(QQ::All());
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
			$objDatabase = Household::GetDatabase();

			// Create/Build out the QueryBuilder object with Household-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'household');
			Household::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('household');

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
		 * Static Qcodo Query method to query for a single Household object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Household the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Household::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Household object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Household::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Household::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Household objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Household[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Household::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Household::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Household::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Household objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Household::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Household::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'household_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Household-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Household::GetSelectFields($objQueryBuilder);
				Household::GetFromFields($objQueryBuilder);

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
			return Household::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Household
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'household';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'head_person_id', $strAliasPrefix . 'head_person_id');
			$objBuilder->AddSelectItem($strTableName, 'combined_stewardship_flag', $strAliasPrefix . 'combined_stewardship_flag');
			$objBuilder->AddSelectItem($strTableName, 'members', $strAliasPrefix . 'members');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Household from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Household::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Household
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
					$strAliasPrefix = 'household__';


				$strAlias = $strAliasPrefix . 'address__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAddressArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAddressArray[$intPreviousChildItemCount - 1];
						$objChildItem = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAddressArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAddressArray[] = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'householdparticipation__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objHouseholdParticipationArray)) {
						$objPreviousChildItem = $objPreviousItem->_objHouseholdParticipationArray[$intPreviousChildItemCount - 1];
						$objChildItem = HouseholdParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdparticipation__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objHouseholdParticipationArray[] = $objChildItem;
					} else
						$objPreviousItem->_objHouseholdParticipationArray[] = HouseholdParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'householdsplitassplit__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objHouseholdSplitAsSplitArray)) {
						$objPreviousChildItem = $objPreviousItem->_objHouseholdSplitAsSplitArray[$intPreviousChildItemCount - 1];
						$objChildItem = HouseholdSplit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdsplitassplit__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objHouseholdSplitAsSplitArray[] = $objChildItem;
					} else
						$objPreviousItem->_objHouseholdSplitAsSplitArray[] = HouseholdSplit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdsplitassplit__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'householdsplit__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objHouseholdSplitArray)) {
						$objPreviousChildItem = $objPreviousItem->_objHouseholdSplitArray[$intPreviousChildItemCount - 1];
						$objChildItem = HouseholdSplit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdsplit__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objHouseholdSplitArray[] = $objChildItem;
					} else
						$objPreviousItem->_objHouseholdSplitArray[] = HouseholdSplit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdsplit__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'household__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Household object
			$objToReturn = new Household();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'head_person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'head_person_id'] : $strAliasPrefix . 'head_person_id';
			$objToReturn->intHeadPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'combined_stewardship_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'combined_stewardship_flag'] : $strAliasPrefix . 'combined_stewardship_flag';
			$objToReturn->blnCombinedStewardshipFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'members', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'members'] : $strAliasPrefix . 'members';
			$objToReturn->strMembers = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'household__';

			// Check for HeadPerson Early Binding
			$strAlias = $strAliasPrefix . 'head_person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objHeadPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'head_person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for Address Virtual Binding
			$strAlias = $strAliasPrefix . 'address__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAddressArray[] = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAddress = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for HouseholdParticipation Virtual Binding
			$strAlias = $strAliasPrefix . 'householdparticipation__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objHouseholdParticipationArray[] = HouseholdParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objHouseholdParticipation = HouseholdParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for HouseholdSplitAsSplit Virtual Binding
			$strAlias = $strAliasPrefix . 'householdsplitassplit__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objHouseholdSplitAsSplitArray[] = HouseholdSplit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdsplitassplit__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objHouseholdSplitAsSplit = HouseholdSplit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdsplitassplit__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for HouseholdSplit Virtual Binding
			$strAlias = $strAliasPrefix . 'householdsplit__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objHouseholdSplitArray[] = HouseholdSplit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdsplit__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objHouseholdSplit = HouseholdSplit::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdsplit__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Households from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Household[]
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
					$objItem = Household::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Household::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Household object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Household next row resulting from the query
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
			return Household::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Household object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Household
		*/
		public static function LoadById($intId) {
			return Household::QuerySingle(
				QQ::Equal(QQN::Household()->Id, $intId)
			);
		}
			
		/**
		 * Load a single Household object,
		 * by HeadPersonId Index(es)
		 * @param integer $intHeadPersonId
		 * @return Household
		*/
		public static function LoadByHeadPersonId($intHeadPersonId) {
			return Household::QuerySingle(
				QQ::Equal(QQN::Household()->HeadPersonId, $intHeadPersonId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Household
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `household` (
							`name`,
							`head_person_id`,
							`combined_stewardship_flag`,
							`members`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->intHeadPersonId) . ',
							' . $objDatabase->SqlVariable($this->blnCombinedStewardshipFlag) . ',
							' . $objDatabase->SqlVariable($this->strMembers) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('household', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`household`
						SET
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`head_person_id` = ' . $objDatabase->SqlVariable($this->intHeadPersonId) . ',
							`combined_stewardship_flag` = ' . $objDatabase->SqlVariable($this->blnCombinedStewardshipFlag) . ',
							`members` = ' . $objDatabase->SqlVariable($this->strMembers) . '
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
		 * Delete this Household
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Household with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Households
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household`');
		}

		/**
		 * Truncate household table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `household`');
		}

		/**
		 * Reload this Household from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Household object.');

			// Reload the Object
			$objReloaded = Household::Load($this->intId);

			// Update $this's local variables to match
			$this->strName = $objReloaded->strName;
			$this->HeadPersonId = $objReloaded->HeadPersonId;
			$this->blnCombinedStewardshipFlag = $objReloaded->blnCombinedStewardshipFlag;
			$this->strMembers = $objReloaded->strMembers;
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

				case 'HeadPersonId':
					// Gets the value for intHeadPersonId (Unique)
					// @return integer
					return $this->intHeadPersonId;

				case 'CombinedStewardshipFlag':
					// Gets the value for blnCombinedStewardshipFlag 
					// @return boolean
					return $this->blnCombinedStewardshipFlag;

				case 'Members':
					// Gets the value for strMembers 
					// @return string
					return $this->strMembers;


				///////////////////
				// Member Objects
				///////////////////
				case 'HeadPerson':
					// Gets the value for the Person object referenced by intHeadPersonId (Unique)
					// @return Person
					try {
						if ((!$this->objHeadPerson) && (!is_null($this->intHeadPersonId)))
							$this->objHeadPerson = Person::Load($this->intHeadPersonId);
						return $this->objHeadPerson;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Address':
					// Gets the value for the private _objAddress (Read-Only)
					// if set due to an expansion on the address.household_id reverse relationship
					// @return Address
					return $this->_objAddress;

				case '_AddressArray':
					// Gets the value for the private _objAddressArray (Read-Only)
					// if set due to an ExpandAsArray on the address.household_id reverse relationship
					// @return Address[]
					return (array) $this->_objAddressArray;

				case '_HouseholdParticipation':
					// Gets the value for the private _objHouseholdParticipation (Read-Only)
					// if set due to an expansion on the household_participation.household_id reverse relationship
					// @return HouseholdParticipation
					return $this->_objHouseholdParticipation;

				case '_HouseholdParticipationArray':
					// Gets the value for the private _objHouseholdParticipationArray (Read-Only)
					// if set due to an ExpandAsArray on the household_participation.household_id reverse relationship
					// @return HouseholdParticipation[]
					return (array) $this->_objHouseholdParticipationArray;

				case '_HouseholdSplitAsSplit':
					// Gets the value for the private _objHouseholdSplitAsSplit (Read-Only)
					// if set due to an expansion on the household_split.split_household_id reverse relationship
					// @return HouseholdSplit
					return $this->_objHouseholdSplitAsSplit;

				case '_HouseholdSplitAsSplitArray':
					// Gets the value for the private _objHouseholdSplitAsSplitArray (Read-Only)
					// if set due to an ExpandAsArray on the household_split.split_household_id reverse relationship
					// @return HouseholdSplit[]
					return (array) $this->_objHouseholdSplitAsSplitArray;

				case '_HouseholdSplit':
					// Gets the value for the private _objHouseholdSplit (Read-Only)
					// if set due to an expansion on the household_split.household_id reverse relationship
					// @return HouseholdSplit
					return $this->_objHouseholdSplit;

				case '_HouseholdSplitArray':
					// Gets the value for the private _objHouseholdSplitArray (Read-Only)
					// if set due to an ExpandAsArray on the household_split.household_id reverse relationship
					// @return HouseholdSplit[]
					return (array) $this->_objHouseholdSplitArray;


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

				case 'HeadPersonId':
					// Sets the value for intHeadPersonId (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objHeadPerson = null;
						return ($this->intHeadPersonId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CombinedStewardshipFlag':
					// Sets the value for blnCombinedStewardshipFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnCombinedStewardshipFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Members':
					// Sets the value for strMembers 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strMembers = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'HeadPerson':
					// Sets the value for the Person object referenced by intHeadPersonId (Unique)
					// @param Person $mixValue
					// @return Person
					if (is_null($mixValue)) {
						$this->intHeadPersonId = null;
						$this->objHeadPerson = null;
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
							throw new QCallerException('Unable to set an unsaved HeadPerson for this Household');

						// Update Local Member Variables
						$this->objHeadPerson = $mixValue;
						$this->intHeadPersonId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for Address
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Addresses as an array of Address objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/ 
		public function GetAddressArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Address::LoadArrayByHouseholdId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Addresses
		 * @return int
		*/ 
		public function CountAddresses() {
			if ((is_null($this->intId)))
				return 0;

			return Address::CountByHouseholdId($this->intId);
		}

		/**
		 * Associates a Address
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function AssociateAddress(Address $objAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAddress on this unsaved Household.');
			if ((is_null($objAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAddress on this Household with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAddress->Id) . '
			');
		}

		/**
		 * Unassociates a Address
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function UnassociateAddress(Address $objAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Household.');
			if ((is_null($objAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this Household with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`household_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAddress->Id) . ' AND
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Addresses
		 * @return void
		*/ 
		public function UnassociateAllAddresses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Household.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`household_id` = null
				WHERE
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Address
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function DeleteAssociatedAddress(Address $objAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Household.');
			if ((is_null($objAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this Household with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAddress->Id) . ' AND
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Addresses
		 * @return void
		*/ 
		public function DeleteAllAddresses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Household.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for HouseholdParticipation
		//-------------------------------------------------------------------

		/**
		 * Gets all associated HouseholdParticipations as an array of HouseholdParticipation objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HouseholdParticipation[]
		*/ 
		public function GetHouseholdParticipationArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return HouseholdParticipation::LoadArrayByHouseholdId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated HouseholdParticipations
		 * @return int
		*/ 
		public function CountHouseholdParticipations() {
			if ((is_null($this->intId)))
				return 0;

			return HouseholdParticipation::CountByHouseholdId($this->intId);
		}

		/**
		 * Associates a HouseholdParticipation
		 * @param HouseholdParticipation $objHouseholdParticipation
		 * @return void
		*/ 
		public function AssociateHouseholdParticipation(HouseholdParticipation $objHouseholdParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHouseholdParticipation on this unsaved Household.');
			if ((is_null($objHouseholdParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHouseholdParticipation on this Household with an unsaved HouseholdParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_participation`
				SET
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdParticipation->Id) . '
			');
		}

		/**
		 * Unassociates a HouseholdParticipation
		 * @param HouseholdParticipation $objHouseholdParticipation
		 * @return void
		*/ 
		public function UnassociateHouseholdParticipation(HouseholdParticipation $objHouseholdParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this unsaved Household.');
			if ((is_null($objHouseholdParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this Household with an unsaved HouseholdParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_participation`
				SET
					`household_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdParticipation->Id) . ' AND
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all HouseholdParticipations
		 * @return void
		*/ 
		public function UnassociateAllHouseholdParticipations() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this unsaved Household.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_participation`
				SET
					`household_id` = null
				WHERE
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated HouseholdParticipation
		 * @param HouseholdParticipation $objHouseholdParticipation
		 * @return void
		*/ 
		public function DeleteAssociatedHouseholdParticipation(HouseholdParticipation $objHouseholdParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this unsaved Household.');
			if ((is_null($objHouseholdParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this Household with an unsaved HouseholdParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household_participation`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdParticipation->Id) . ' AND
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated HouseholdParticipations
		 * @return void
		*/ 
		public function DeleteAllHouseholdParticipations() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this unsaved Household.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household_participation`
				WHERE
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for HouseholdSplitAsSplit
		//-------------------------------------------------------------------

		/**
		 * Gets all associated HouseholdSplitsAsSplit as an array of HouseholdSplit objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HouseholdSplit[]
		*/ 
		public function GetHouseholdSplitAsSplitArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return HouseholdSplit::LoadArrayBySplitHouseholdId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated HouseholdSplitsAsSplit
		 * @return int
		*/ 
		public function CountHouseholdSplitsAsSplit() {
			if ((is_null($this->intId)))
				return 0;

			return HouseholdSplit::CountBySplitHouseholdId($this->intId);
		}

		/**
		 * Associates a HouseholdSplitAsSplit
		 * @param HouseholdSplit $objHouseholdSplit
		 * @return void
		*/ 
		public function AssociateHouseholdSplitAsSplit(HouseholdSplit $objHouseholdSplit) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHouseholdSplitAsSplit on this unsaved Household.');
			if ((is_null($objHouseholdSplit->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHouseholdSplitAsSplit on this Household with an unsaved HouseholdSplit.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_split`
				SET
					`split_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdSplit->Id) . '
			');
		}

		/**
		 * Unassociates a HouseholdSplitAsSplit
		 * @param HouseholdSplit $objHouseholdSplit
		 * @return void
		*/ 
		public function UnassociateHouseholdSplitAsSplit(HouseholdSplit $objHouseholdSplit) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplitAsSplit on this unsaved Household.');
			if ((is_null($objHouseholdSplit->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplitAsSplit on this Household with an unsaved HouseholdSplit.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_split`
				SET
					`split_household_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdSplit->Id) . ' AND
					`split_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all HouseholdSplitsAsSplit
		 * @return void
		*/ 
		public function UnassociateAllHouseholdSplitsAsSplit() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplitAsSplit on this unsaved Household.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_split`
				SET
					`split_household_id` = null
				WHERE
					`split_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated HouseholdSplitAsSplit
		 * @param HouseholdSplit $objHouseholdSplit
		 * @return void
		*/ 
		public function DeleteAssociatedHouseholdSplitAsSplit(HouseholdSplit $objHouseholdSplit) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplitAsSplit on this unsaved Household.');
			if ((is_null($objHouseholdSplit->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplitAsSplit on this Household with an unsaved HouseholdSplit.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household_split`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdSplit->Id) . ' AND
					`split_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated HouseholdSplitsAsSplit
		 * @return void
		*/ 
		public function DeleteAllHouseholdSplitsAsSplit() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplitAsSplit on this unsaved Household.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household_split`
				WHERE
					`split_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for HouseholdSplit
		//-------------------------------------------------------------------

		/**
		 * Gets all associated HouseholdSplits as an array of HouseholdSplit objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HouseholdSplit[]
		*/ 
		public function GetHouseholdSplitArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return HouseholdSplit::LoadArrayByHouseholdId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated HouseholdSplits
		 * @return int
		*/ 
		public function CountHouseholdSplits() {
			if ((is_null($this->intId)))
				return 0;

			return HouseholdSplit::CountByHouseholdId($this->intId);
		}

		/**
		 * Associates a HouseholdSplit
		 * @param HouseholdSplit $objHouseholdSplit
		 * @return void
		*/ 
		public function AssociateHouseholdSplit(HouseholdSplit $objHouseholdSplit) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHouseholdSplit on this unsaved Household.');
			if ((is_null($objHouseholdSplit->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHouseholdSplit on this Household with an unsaved HouseholdSplit.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_split`
				SET
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdSplit->Id) . '
			');
		}

		/**
		 * Unassociates a HouseholdSplit
		 * @param HouseholdSplit $objHouseholdSplit
		 * @return void
		*/ 
		public function UnassociateHouseholdSplit(HouseholdSplit $objHouseholdSplit) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplit on this unsaved Household.');
			if ((is_null($objHouseholdSplit->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplit on this Household with an unsaved HouseholdSplit.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_split`
				SET
					`household_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdSplit->Id) . ' AND
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all HouseholdSplits
		 * @return void
		*/ 
		public function UnassociateAllHouseholdSplits() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplit on this unsaved Household.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_split`
				SET
					`household_id` = null
				WHERE
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated HouseholdSplit
		 * @param HouseholdSplit $objHouseholdSplit
		 * @return void
		*/ 
		public function DeleteAssociatedHouseholdSplit(HouseholdSplit $objHouseholdSplit) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplit on this unsaved Household.');
			if ((is_null($objHouseholdSplit->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplit on this Household with an unsaved HouseholdSplit.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household_split`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdSplit->Id) . ' AND
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated HouseholdSplits
		 * @return void
		*/ 
		public function DeleteAllHouseholdSplits() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdSplit on this unsaved Household.');

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household_split`
				WHERE
					`household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Household"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="HeadPerson" type="xsd1:Person"/>';
			$strToReturn .= '<element name="CombinedStewardshipFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Members" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Household', $strComplexTypeArray)) {
				$strComplexTypeArray['Household'] = Household::GetSoapComplexTypeXml();
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Household::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Household();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if ((property_exists($objSoapObject, 'HeadPerson')) &&
				($objSoapObject->HeadPerson))
				$objToReturn->HeadPerson = Person::GetObjectFromSoapObject($objSoapObject->HeadPerson);
			if (property_exists($objSoapObject, 'CombinedStewardshipFlag'))
				$objToReturn->blnCombinedStewardshipFlag = $objSoapObject->CombinedStewardshipFlag;
			if (property_exists($objSoapObject, 'Members'))
				$objToReturn->strMembers = $objSoapObject->Members;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Household::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objHeadPerson)
				$objObject->objHeadPerson = Person::GetSoapObjectFromObject($objObject->objHeadPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intHeadPersonId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeHousehold extends QQNode {
		protected $strTableName = 'household';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Household';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'HeadPersonId':
					return new QQNode('head_person_id', 'HeadPersonId', 'integer', $this);
				case 'HeadPerson':
					return new QQNodePerson('head_person_id', 'HeadPerson', 'integer', $this);
				case 'CombinedStewardshipFlag':
					return new QQNode('combined_stewardship_flag', 'CombinedStewardshipFlag', 'boolean', $this);
				case 'Members':
					return new QQNode('members', 'Members', 'string', $this);
				case 'Address':
					return new QQReverseReferenceNodeAddress($this, 'address', 'reverse_reference', 'household_id');
				case 'HouseholdParticipation':
					return new QQReverseReferenceNodeHouseholdParticipation($this, 'householdparticipation', 'reverse_reference', 'household_id');
				case 'HouseholdSplitAsSplit':
					return new QQReverseReferenceNodeHouseholdSplit($this, 'householdsplitassplit', 'reverse_reference', 'split_household_id');
				case 'HouseholdSplit':
					return new QQReverseReferenceNodeHouseholdSplit($this, 'householdsplit', 'reverse_reference', 'household_id');

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

	class QQReverseReferenceNodeHousehold extends QQReverseReferenceNode {
		protected $strTableName = 'household';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Household';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'HeadPersonId':
					return new QQNode('head_person_id', 'HeadPersonId', 'integer', $this);
				case 'HeadPerson':
					return new QQNodePerson('head_person_id', 'HeadPerson', 'integer', $this);
				case 'CombinedStewardshipFlag':
					return new QQNode('combined_stewardship_flag', 'CombinedStewardshipFlag', 'boolean', $this);
				case 'Members':
					return new QQNode('members', 'Members', 'string', $this);
				case 'Address':
					return new QQReverseReferenceNodeAddress($this, 'address', 'reverse_reference', 'household_id');
				case 'HouseholdParticipation':
					return new QQReverseReferenceNodeHouseholdParticipation($this, 'householdparticipation', 'reverse_reference', 'household_id');
				case 'HouseholdSplitAsSplit':
					return new QQReverseReferenceNodeHouseholdSplit($this, 'householdsplitassplit', 'reverse_reference', 'split_household_id');
				case 'HouseholdSplit':
					return new QQReverseReferenceNodeHouseholdSplit($this, 'householdsplit', 'reverse_reference', 'household_id');

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