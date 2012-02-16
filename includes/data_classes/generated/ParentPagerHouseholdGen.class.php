<?php
	/**
	 * The abstract ParentPagerHouseholdGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ParentPagerHousehold subclass which
	 * extends this ParentPagerHouseholdGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ParentPagerHousehold class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $ServerIdentifier the value for intServerIdentifier (Unique)
	 * @property integer $HouseholdId the value for intHouseholdId 
	 * @property boolean $HiddenFlag the value for blnHiddenFlag (Not Null)
	 * @property integer $ParentPagerSyncStatusTypeId the value for intParentPagerSyncStatusTypeId (Not Null)
	 * @property string $Name the value for strName 
	 * @property Household $Household the value for the Household object referenced by intHouseholdId 
	 * @property ParentPagerAddress $_ParentPagerAddress the value for the private _objParentPagerAddress (Read-Only) if set due to an expansion on the parent_pager_address.parent_pager_household_id reverse relationship
	 * @property ParentPagerAddress[] $_ParentPagerAddressArray the value for the private _objParentPagerAddressArray (Read-Only) if set due to an ExpandAsArray on the parent_pager_address.parent_pager_household_id reverse relationship
	 * @property ParentPagerIndividual $_ParentPagerIndividual the value for the private _objParentPagerIndividual (Read-Only) if set due to an expansion on the parent_pager_individual.parent_pager_household_id reverse relationship
	 * @property ParentPagerIndividual[] $_ParentPagerIndividualArray the value for the private _objParentPagerIndividualArray (Read-Only) if set due to an ExpandAsArray on the parent_pager_individual.parent_pager_household_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ParentPagerHouseholdGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column parent_pager_household.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_household.server_identifier
		 * @var integer intServerIdentifier
		 */
		protected $intServerIdentifier;
		const ServerIdentifierDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_household.household_id
		 * @var integer intHouseholdId
		 */
		protected $intHouseholdId;
		const HouseholdIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_household.hidden_flag
		 * @var boolean blnHiddenFlag
		 */
		protected $blnHiddenFlag;
		const HiddenFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_household.parent_pager_sync_status_type_id
		 * @var integer intParentPagerSyncStatusTypeId
		 */
		protected $intParentPagerSyncStatusTypeId;
		const ParentPagerSyncStatusTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_household.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 75;
		const NameDefault = null;


		/**
		 * Private member variable that stores a reference to a single ParentPagerAddress object
		 * (of type ParentPagerAddress), if this ParentPagerHousehold object was restored with
		 * an expansion on the parent_pager_address association table.
		 * @var ParentPagerAddress _objParentPagerAddress;
		 */
		private $_objParentPagerAddress;

		/**
		 * Private member variable that stores a reference to an array of ParentPagerAddress objects
		 * (of type ParentPagerAddress[]), if this ParentPagerHousehold object was restored with
		 * an ExpandAsArray on the parent_pager_address association table.
		 * @var ParentPagerAddress[] _objParentPagerAddressArray;
		 */
		private $_objParentPagerAddressArray = array();

		/**
		 * Private member variable that stores a reference to a single ParentPagerIndividual object
		 * (of type ParentPagerIndividual), if this ParentPagerHousehold object was restored with
		 * an expansion on the parent_pager_individual association table.
		 * @var ParentPagerIndividual _objParentPagerIndividual;
		 */
		private $_objParentPagerIndividual;

		/**
		 * Private member variable that stores a reference to an array of ParentPagerIndividual objects
		 * (of type ParentPagerIndividual[]), if this ParentPagerHousehold object was restored with
		 * an ExpandAsArray on the parent_pager_individual association table.
		 * @var ParentPagerIndividual[] _objParentPagerIndividualArray;
		 */
		private $_objParentPagerIndividualArray = array();

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
		 * in the database column parent_pager_household.household_id.
		 *
		 * NOTE: Always use the Household property getter to correctly retrieve this Household object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Household objHousehold
		 */
		protected $objHousehold;





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
		 * Load a ParentPagerHousehold from PK Info
		 * @param integer $intId
		 * @return ParentPagerHousehold
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return ParentPagerHousehold::QuerySingle(
				QQ::Equal(QQN::ParentPagerHousehold()->Id, $intId)
			);
		}

		/**
		 * Load all ParentPagerHouseholds
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerHousehold[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ParentPagerHousehold::QueryArray to perform the LoadAll query
			try {
				return ParentPagerHousehold::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ParentPagerHouseholds
		 * @return int
		 */
		public static function CountAll() {
			// Call ParentPagerHousehold::QueryCount to perform the CountAll query
			return ParentPagerHousehold::QueryCount(QQ::All());
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
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Create/Build out the QueryBuilder object with ParentPagerHousehold-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'parent_pager_household');
			ParentPagerHousehold::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('parent_pager_household');

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
		 * Static Qcodo Query method to query for a single ParentPagerHousehold object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerHousehold the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerHousehold::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ParentPagerHousehold object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ParentPagerHousehold::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ParentPagerHousehold::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ParentPagerHousehold objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerHousehold[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerHousehold::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ParentPagerHousehold::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ParentPagerHousehold::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ParentPagerHousehold objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerHousehold::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'parent_pager_household_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ParentPagerHousehold-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ParentPagerHousehold::GetSelectFields($objQueryBuilder);
				ParentPagerHousehold::GetFromFields($objQueryBuilder);

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
			return ParentPagerHousehold::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ParentPagerHousehold
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'parent_pager_household';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'server_identifier', $strAliasPrefix . 'server_identifier');
			$objBuilder->AddSelectItem($strTableName, 'household_id', $strAliasPrefix . 'household_id');
			$objBuilder->AddSelectItem($strTableName, 'hidden_flag', $strAliasPrefix . 'hidden_flag');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_sync_status_type_id', $strAliasPrefix . 'parent_pager_sync_status_type_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ParentPagerHousehold from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ParentPagerHousehold::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerHousehold
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
					$strAliasPrefix = 'parent_pager_household__';


				$strAlias = $strAliasPrefix . 'parentpageraddress__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objParentPagerAddressArray)) {
						$objPreviousChildItem = $objPreviousItem->_objParentPagerAddressArray[$intPreviousChildItemCount - 1];
						$objChildItem = ParentPagerAddress::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpageraddress__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objParentPagerAddressArray[] = $objChildItem;
					} else
						$objPreviousItem->_objParentPagerAddressArray[] = ParentPagerAddress::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpageraddress__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'parentpagerindividual__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objParentPagerIndividualArray)) {
						$objPreviousChildItem = $objPreviousItem->_objParentPagerIndividualArray[$intPreviousChildItemCount - 1];
						$objChildItem = ParentPagerIndividual::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerindividual__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objParentPagerIndividualArray[] = $objChildItem;
					} else
						$objPreviousItem->_objParentPagerIndividualArray[] = ParentPagerIndividual::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerindividual__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'parent_pager_household__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the ParentPagerHousehold object
			$objToReturn = new ParentPagerHousehold();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'server_identifier', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'server_identifier'] : $strAliasPrefix . 'server_identifier';
			$objToReturn->intServerIdentifier = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'household_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'household_id'] : $strAliasPrefix . 'household_id';
			$objToReturn->intHouseholdId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'hidden_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'hidden_flag'] : $strAliasPrefix . 'hidden_flag';
			$objToReturn->blnHiddenFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_pager_sync_status_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_pager_sync_status_type_id'] : $strAliasPrefix . 'parent_pager_sync_status_type_id';
			$objToReturn->intParentPagerSyncStatusTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'parent_pager_household__';

			// Check for Household Early Binding
			$strAlias = $strAliasPrefix . 'household_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objHousehold = Household::InstantiateDbRow($objDbRow, $strAliasPrefix . 'household_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for ParentPagerAddress Virtual Binding
			$strAlias = $strAliasPrefix . 'parentpageraddress__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objParentPagerAddressArray[] = ParentPagerAddress::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpageraddress__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objParentPagerAddress = ParentPagerAddress::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpageraddress__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ParentPagerIndividual Virtual Binding
			$strAlias = $strAliasPrefix . 'parentpagerindividual__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objParentPagerIndividualArray[] = ParentPagerIndividual::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerindividual__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objParentPagerIndividual = ParentPagerIndividual::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerindividual__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of ParentPagerHouseholds from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerHousehold[]
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
					$objItem = ParentPagerHousehold::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ParentPagerHousehold::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ParentPagerHousehold object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ParentPagerHousehold next row resulting from the query
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
			return ParentPagerHousehold::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ParentPagerHousehold object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return ParentPagerHousehold
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ParentPagerHousehold::QuerySingle(
				QQ::Equal(QQN::ParentPagerHousehold()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single ParentPagerHousehold object,
		 * by ServerIdentifier Index(es)
		 * @param integer $intServerIdentifier
		 * @return ParentPagerHousehold
		*/
		public static function LoadByServerIdentifier($intServerIdentifier, $objOptionalClauses = null) {
			return ParentPagerHousehold::QuerySingle(
				QQ::Equal(QQN::ParentPagerHousehold()->ServerIdentifier, $intServerIdentifier)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerHousehold objects,
		 * by HouseholdId Index(es)
		 * @param integer $intHouseholdId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerHousehold[]
		*/
		public static function LoadArrayByHouseholdId($intHouseholdId, $objOptionalClauses = null) {
			// Call ParentPagerHousehold::QueryArray to perform the LoadArrayByHouseholdId query
			try {
				return ParentPagerHousehold::QueryArray(
					QQ::Equal(QQN::ParentPagerHousehold()->HouseholdId, $intHouseholdId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerHouseholds
		 * by HouseholdId Index(es)
		 * @param integer $intHouseholdId
		 * @return int
		*/
		public static function CountByHouseholdId($intHouseholdId, $objOptionalClauses = null) {
			// Call ParentPagerHousehold::QueryCount to perform the CountByHouseholdId query
			return ParentPagerHousehold::QueryCount(
				QQ::Equal(QQN::ParentPagerHousehold()->HouseholdId, $intHouseholdId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerHousehold objects,
		 * by HiddenFlag Index(es)
		 * @param boolean $blnHiddenFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerHousehold[]
		*/
		public static function LoadArrayByHiddenFlag($blnHiddenFlag, $objOptionalClauses = null) {
			// Call ParentPagerHousehold::QueryArray to perform the LoadArrayByHiddenFlag query
			try {
				return ParentPagerHousehold::QueryArray(
					QQ::Equal(QQN::ParentPagerHousehold()->HiddenFlag, $blnHiddenFlag),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerHouseholds
		 * by HiddenFlag Index(es)
		 * @param boolean $blnHiddenFlag
		 * @return int
		*/
		public static function CountByHiddenFlag($blnHiddenFlag, $objOptionalClauses = null) {
			// Call ParentPagerHousehold::QueryCount to perform the CountByHiddenFlag query
			return ParentPagerHousehold::QueryCount(
				QQ::Equal(QQN::ParentPagerHousehold()->HiddenFlag, $blnHiddenFlag)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerHousehold objects,
		 * by ParentPagerSyncStatusTypeId Index(es)
		 * @param integer $intParentPagerSyncStatusTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerHousehold[]
		*/
		public static function LoadArrayByParentPagerSyncStatusTypeId($intParentPagerSyncStatusTypeId, $objOptionalClauses = null) {
			// Call ParentPagerHousehold::QueryArray to perform the LoadArrayByParentPagerSyncStatusTypeId query
			try {
				return ParentPagerHousehold::QueryArray(
					QQ::Equal(QQN::ParentPagerHousehold()->ParentPagerSyncStatusTypeId, $intParentPagerSyncStatusTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerHouseholds
		 * by ParentPagerSyncStatusTypeId Index(es)
		 * @param integer $intParentPagerSyncStatusTypeId
		 * @return int
		*/
		public static function CountByParentPagerSyncStatusTypeId($intParentPagerSyncStatusTypeId, $objOptionalClauses = null) {
			// Call ParentPagerHousehold::QueryCount to perform the CountByParentPagerSyncStatusTypeId query
			return ParentPagerHousehold::QueryCount(
				QQ::Equal(QQN::ParentPagerHousehold()->ParentPagerSyncStatusTypeId, $intParentPagerSyncStatusTypeId)
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
		 * Save this ParentPagerHousehold
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `parent_pager_household` (
							`server_identifier`,
							`household_id`,
							`hidden_flag`,
							`parent_pager_sync_status_type_id`,
							`name`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							' . $objDatabase->SqlVariable($this->intHouseholdId) . ',
							' . $objDatabase->SqlVariable($this->blnHiddenFlag) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerSyncStatusTypeId) . ',
							' . $objDatabase->SqlVariable($this->strName) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('parent_pager_household', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`parent_pager_household`
						SET
							`server_identifier` = ' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							`household_id` = ' . $objDatabase->SqlVariable($this->intHouseholdId) . ',
							`hidden_flag` = ' . $objDatabase->SqlVariable($this->blnHiddenFlag) . ',
							`parent_pager_sync_status_type_id` = ' . $objDatabase->SqlVariable($this->intParentPagerSyncStatusTypeId) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . '
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
		 * Delete this ParentPagerHousehold
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ParentPagerHousehold with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_household`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ParentPagerHouseholds
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_household`');
		}

		/**
		 * Truncate parent_pager_household table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `parent_pager_household`');
		}

		/**
		 * Reload this ParentPagerHousehold from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ParentPagerHousehold object.');

			// Reload the Object
			$objReloaded = ParentPagerHousehold::Load($this->intId);

			// Update $this's local variables to match
			$this->intServerIdentifier = $objReloaded->intServerIdentifier;
			$this->HouseholdId = $objReloaded->HouseholdId;
			$this->blnHiddenFlag = $objReloaded->blnHiddenFlag;
			$this->ParentPagerSyncStatusTypeId = $objReloaded->ParentPagerSyncStatusTypeId;
			$this->strName = $objReloaded->strName;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ParentPagerHousehold::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `parent_pager_household` (
					`id`,
					`server_identifier`,
					`household_id`,
					`hidden_flag`,
					`parent_pager_sync_status_type_id`,
					`name`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
					' . $objDatabase->SqlVariable($this->intHouseholdId) . ',
					' . $objDatabase->SqlVariable($this->blnHiddenFlag) . ',
					' . $objDatabase->SqlVariable($this->intParentPagerSyncStatusTypeId) . ',
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
		 * @return ParentPagerHousehold[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = ParentPagerHousehold::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM parent_pager_household WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return ParentPagerHousehold::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ParentPagerHousehold[]
		 */
		public function GetJournal() {
			return ParentPagerHousehold::GetJournalForId($this->intId);
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

				case 'ServerIdentifier':
					// Gets the value for intServerIdentifier (Unique)
					// @return integer
					return $this->intServerIdentifier;

				case 'HouseholdId':
					// Gets the value for intHouseholdId 
					// @return integer
					return $this->intHouseholdId;

				case 'HiddenFlag':
					// Gets the value for blnHiddenFlag (Not Null)
					// @return boolean
					return $this->blnHiddenFlag;

				case 'ParentPagerSyncStatusTypeId':
					// Gets the value for intParentPagerSyncStatusTypeId (Not Null)
					// @return integer
					return $this->intParentPagerSyncStatusTypeId;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;


				///////////////////
				// Member Objects
				///////////////////
				case 'Household':
					// Gets the value for the Household object referenced by intHouseholdId 
					// @return Household
					try {
						if ((!$this->objHousehold) && (!is_null($this->intHouseholdId)))
							$this->objHousehold = Household::Load($this->intHouseholdId);
						return $this->objHousehold;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ParentPagerAddress':
					// Gets the value for the private _objParentPagerAddress (Read-Only)
					// if set due to an expansion on the parent_pager_address.parent_pager_household_id reverse relationship
					// @return ParentPagerAddress
					return $this->_objParentPagerAddress;

				case '_ParentPagerAddressArray':
					// Gets the value for the private _objParentPagerAddressArray (Read-Only)
					// if set due to an ExpandAsArray on the parent_pager_address.parent_pager_household_id reverse relationship
					// @return ParentPagerAddress[]
					return (array) $this->_objParentPagerAddressArray;

				case '_ParentPagerIndividual':
					// Gets the value for the private _objParentPagerIndividual (Read-Only)
					// if set due to an expansion on the parent_pager_individual.parent_pager_household_id reverse relationship
					// @return ParentPagerIndividual
					return $this->_objParentPagerIndividual;

				case '_ParentPagerIndividualArray':
					// Gets the value for the private _objParentPagerIndividualArray (Read-Only)
					// if set due to an ExpandAsArray on the parent_pager_individual.parent_pager_household_id reverse relationship
					// @return ParentPagerIndividual[]
					return (array) $this->_objParentPagerIndividualArray;


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

				case 'HouseholdId':
					// Sets the value for intHouseholdId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objHousehold = null;
						return ($this->intHouseholdId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HiddenFlag':
					// Sets the value for blnHiddenFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnHiddenFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParentPagerSyncStatusTypeId':
					// Sets the value for intParentPagerSyncStatusTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intParentPagerSyncStatusTypeId = QType::Cast($mixValue, QType::Integer));
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
				case 'Household':
					// Sets the value for the Household object referenced by intHouseholdId 
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
							throw new QCallerException('Unable to set an unsaved Household for this ParentPagerHousehold');

						// Update Local Member Variables
						$this->objHousehold = $mixValue;
						$this->intHouseholdId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for ParentPagerAddress
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ParentPagerAddresses as an array of ParentPagerAddress objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAddress[]
		*/ 
		public function GetParentPagerAddressArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ParentPagerAddress::LoadArrayByParentPagerHouseholdId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ParentPagerAddresses
		 * @return int
		*/ 
		public function CountParentPagerAddresses() {
			if ((is_null($this->intId)))
				return 0;

			return ParentPagerAddress::CountByParentPagerHouseholdId($this->intId);
		}

		/**
		 * Associates a ParentPagerAddress
		 * @param ParentPagerAddress $objParentPagerAddress
		 * @return void
		*/ 
		public function AssociateParentPagerAddress(ParentPagerAddress $objParentPagerAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerAddress on this unsaved ParentPagerHousehold.');
			if ((is_null($objParentPagerAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerAddress on this ParentPagerHousehold with an unsaved ParentPagerAddress.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_address`
				SET
					`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAddress->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAddress->ParentPagerHouseholdId = $this->intId;
				$objParentPagerAddress->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ParentPagerAddress
		 * @param ParentPagerAddress $objParentPagerAddress
		 * @return void
		*/ 
		public function UnassociateParentPagerAddress(ParentPagerAddress $objParentPagerAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this unsaved ParentPagerHousehold.');
			if ((is_null($objParentPagerAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this ParentPagerHousehold with an unsaved ParentPagerAddress.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_address`
				SET
					`parent_pager_household_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAddress->Id) . ' AND
					`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAddress->ParentPagerHouseholdId = null;
				$objParentPagerAddress->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ParentPagerAddresses
		 * @return void
		*/ 
		public function UnassociateAllParentPagerAddresses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this unsaved ParentPagerHousehold.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerAddress::LoadArrayByParentPagerHouseholdId($this->intId) as $objParentPagerAddress) {
					$objParentPagerAddress->ParentPagerHouseholdId = null;
					$objParentPagerAddress->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_address`
				SET
					`parent_pager_household_id` = null
				WHERE
					`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ParentPagerAddress
		 * @param ParentPagerAddress $objParentPagerAddress
		 * @return void
		*/ 
		public function DeleteAssociatedParentPagerAddress(ParentPagerAddress $objParentPagerAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this unsaved ParentPagerHousehold.');
			if ((is_null($objParentPagerAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this ParentPagerHousehold with an unsaved ParentPagerAddress.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_address`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAddress->Id) . ' AND
					`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAddress->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ParentPagerAddresses
		 * @return void
		*/ 
		public function DeleteAllParentPagerAddresses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this unsaved ParentPagerHousehold.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerAddress::LoadArrayByParentPagerHouseholdId($this->intId) as $objParentPagerAddress) {
					$objParentPagerAddress->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_address`
				WHERE
					`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for ParentPagerIndividual
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ParentPagerIndividuals as an array of ParentPagerIndividual objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerIndividual[]
		*/ 
		public function GetParentPagerIndividualArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ParentPagerIndividual::LoadArrayByParentPagerHouseholdId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ParentPagerIndividuals
		 * @return int
		*/ 
		public function CountParentPagerIndividuals() {
			if ((is_null($this->intId)))
				return 0;

			return ParentPagerIndividual::CountByParentPagerHouseholdId($this->intId);
		}

		/**
		 * Associates a ParentPagerIndividual
		 * @param ParentPagerIndividual $objParentPagerIndividual
		 * @return void
		*/ 
		public function AssociateParentPagerIndividual(ParentPagerIndividual $objParentPagerIndividual) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerIndividual on this unsaved ParentPagerHousehold.');
			if ((is_null($objParentPagerIndividual->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerIndividual on this ParentPagerHousehold with an unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_individual`
				SET
					`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerIndividual->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerIndividual->ParentPagerHouseholdId = $this->intId;
				$objParentPagerIndividual->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ParentPagerIndividual
		 * @param ParentPagerIndividual $objParentPagerIndividual
		 * @return void
		*/ 
		public function UnassociateParentPagerIndividual(ParentPagerIndividual $objParentPagerIndividual) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerIndividual on this unsaved ParentPagerHousehold.');
			if ((is_null($objParentPagerIndividual->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerIndividual on this ParentPagerHousehold with an unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_individual`
				SET
					`parent_pager_household_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerIndividual->Id) . ' AND
					`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerIndividual->ParentPagerHouseholdId = null;
				$objParentPagerIndividual->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ParentPagerIndividuals
		 * @return void
		*/ 
		public function UnassociateAllParentPagerIndividuals() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerIndividual on this unsaved ParentPagerHousehold.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerIndividual::LoadArrayByParentPagerHouseholdId($this->intId) as $objParentPagerIndividual) {
					$objParentPagerIndividual->ParentPagerHouseholdId = null;
					$objParentPagerIndividual->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_individual`
				SET
					`parent_pager_household_id` = null
				WHERE
					`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ParentPagerIndividual
		 * @param ParentPagerIndividual $objParentPagerIndividual
		 * @return void
		*/ 
		public function DeleteAssociatedParentPagerIndividual(ParentPagerIndividual $objParentPagerIndividual) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerIndividual on this unsaved ParentPagerHousehold.');
			if ((is_null($objParentPagerIndividual->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerIndividual on this ParentPagerHousehold with an unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_individual`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerIndividual->Id) . ' AND
					`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerIndividual->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ParentPagerIndividuals
		 * @return void
		*/ 
		public function DeleteAllParentPagerIndividuals() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerIndividual on this unsaved ParentPagerHousehold.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerHousehold::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerIndividual::LoadArrayByParentPagerHouseholdId($this->intId) as $objParentPagerIndividual) {
					$objParentPagerIndividual->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_individual`
				WHERE
					`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ParentPagerHousehold"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ServerIdentifier" type="xsd:int"/>';
			$strToReturn .= '<element name="Household" type="xsd1:Household"/>';
			$strToReturn .= '<element name="HiddenFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ParentPagerSyncStatusTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ParentPagerHousehold', $strComplexTypeArray)) {
				$strComplexTypeArray['ParentPagerHousehold'] = ParentPagerHousehold::GetSoapComplexTypeXml();
				Household::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ParentPagerHousehold::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ParentPagerHousehold();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'ServerIdentifier'))
				$objToReturn->intServerIdentifier = $objSoapObject->ServerIdentifier;
			if ((property_exists($objSoapObject, 'Household')) &&
				($objSoapObject->Household))
				$objToReturn->Household = Household::GetObjectFromSoapObject($objSoapObject->Household);
			if (property_exists($objSoapObject, 'HiddenFlag'))
				$objToReturn->blnHiddenFlag = $objSoapObject->HiddenFlag;
			if (property_exists($objSoapObject, 'ParentPagerSyncStatusTypeId'))
				$objToReturn->intParentPagerSyncStatusTypeId = $objSoapObject->ParentPagerSyncStatusTypeId;
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
				array_push($objArrayToReturn, ParentPagerHousehold::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objHousehold)
				$objObject->objHousehold = Household::GetSoapObjectFromObject($objObject->objHousehold, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intHouseholdId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $ServerIdentifier
	 * @property-read QQNode $HouseholdId
	 * @property-read QQNodeHousehold $Household
	 * @property-read QQNode $HiddenFlag
	 * @property-read QQNode $ParentPagerSyncStatusTypeId
	 * @property-read QQNode $Name
	 * @property-read QQReverseReferenceNodeParentPagerAddress $ParentPagerAddress
	 * @property-read QQReverseReferenceNodeParentPagerIndividual $ParentPagerIndividual
	 */
	class QQNodeParentPagerHousehold extends QQNode {
		protected $strTableName = 'parent_pager_household';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerHousehold';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ServerIdentifier':
					return new QQNode('server_identifier', 'ServerIdentifier', 'integer', $this);
				case 'HouseholdId':
					return new QQNode('household_id', 'HouseholdId', 'integer', $this);
				case 'Household':
					return new QQNodeHousehold('household_id', 'Household', 'integer', $this);
				case 'HiddenFlag':
					return new QQNode('hidden_flag', 'HiddenFlag', 'boolean', $this);
				case 'ParentPagerSyncStatusTypeId':
					return new QQNode('parent_pager_sync_status_type_id', 'ParentPagerSyncStatusTypeId', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'ParentPagerAddress':
					return new QQReverseReferenceNodeParentPagerAddress($this, 'parentpageraddress', 'reverse_reference', 'parent_pager_household_id');
				case 'ParentPagerIndividual':
					return new QQReverseReferenceNodeParentPagerIndividual($this, 'parentpagerindividual', 'reverse_reference', 'parent_pager_household_id');

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
	 * @property-read QQNode $HouseholdId
	 * @property-read QQNodeHousehold $Household
	 * @property-read QQNode $HiddenFlag
	 * @property-read QQNode $ParentPagerSyncStatusTypeId
	 * @property-read QQNode $Name
	 * @property-read QQReverseReferenceNodeParentPagerAddress $ParentPagerAddress
	 * @property-read QQReverseReferenceNodeParentPagerIndividual $ParentPagerIndividual
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeParentPagerHousehold extends QQReverseReferenceNode {
		protected $strTableName = 'parent_pager_household';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerHousehold';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ServerIdentifier':
					return new QQNode('server_identifier', 'ServerIdentifier', 'integer', $this);
				case 'HouseholdId':
					return new QQNode('household_id', 'HouseholdId', 'integer', $this);
				case 'Household':
					return new QQNodeHousehold('household_id', 'Household', 'integer', $this);
				case 'HiddenFlag':
					return new QQNode('hidden_flag', 'HiddenFlag', 'boolean', $this);
				case 'ParentPagerSyncStatusTypeId':
					return new QQNode('parent_pager_sync_status_type_id', 'ParentPagerSyncStatusTypeId', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'ParentPagerAddress':
					return new QQReverseReferenceNodeParentPagerAddress($this, 'parentpageraddress', 'reverse_reference', 'parent_pager_household_id');
				case 'ParentPagerIndividual':
					return new QQReverseReferenceNodeParentPagerIndividual($this, 'parentpagerindividual', 'reverse_reference', 'parent_pager_household_id');

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