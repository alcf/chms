<?php
	/**
	 * The abstract ParentPagerChildHistoryGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ParentPagerChildHistory subclass which
	 * extends this ParentPagerChildHistoryGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ParentPagerChildHistory class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $ServerIdentifier the value for intServerIdentifier (Unique)
	 * @property integer $ParentPagerIndividualId the value for intParentPagerIndividualId (Not Null)
	 * @property integer $ParentPagerStationId the value for intParentPagerStationId 
	 * @property integer $ParentPagerPeriodId the value for intParentPagerPeriodId 
	 * @property integer $DropoffByParentPagerIndividualId the value for intDropoffByParentPagerIndividualId 
	 * @property integer $PickupByParentPagerIndividualId the value for intPickupByParentPagerIndividualId 
	 * @property QDateTime $DateIn the value for dttDateIn (Not Null)
	 * @property QDateTime $DateOut the value for dttDateOut (Not Null)
	 * @property ParentPagerIndividual $ParentPagerIndividual the value for the ParentPagerIndividual object referenced by intParentPagerIndividualId (Not Null)
	 * @property ParentPagerStation $ParentPagerStation the value for the ParentPagerStation object referenced by intParentPagerStationId 
	 * @property ParentPagerPeriod $ParentPagerPeriod the value for the ParentPagerPeriod object referenced by intParentPagerPeriodId 
	 * @property ParentPagerIndividual $DropoffByParentPagerIndividual the value for the ParentPagerIndividual object referenced by intDropoffByParentPagerIndividualId 
	 * @property ParentPagerIndividual $PickupByParentPagerIndividual the value for the ParentPagerIndividual object referenced by intPickupByParentPagerIndividualId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ParentPagerChildHistoryGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column parent_pager_child_history.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_child_history.server_identifier
		 * @var integer intServerIdentifier
		 */
		protected $intServerIdentifier;
		const ServerIdentifierDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_child_history.parent_pager_individual_id
		 * @var integer intParentPagerIndividualId
		 */
		protected $intParentPagerIndividualId;
		const ParentPagerIndividualIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_child_history.parent_pager_station_id
		 * @var integer intParentPagerStationId
		 */
		protected $intParentPagerStationId;
		const ParentPagerStationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_child_history.parent_pager_period_id
		 * @var integer intParentPagerPeriodId
		 */
		protected $intParentPagerPeriodId;
		const ParentPagerPeriodIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_child_history.dropoff_by_parent_pager_individual_id
		 * @var integer intDropoffByParentPagerIndividualId
		 */
		protected $intDropoffByParentPagerIndividualId;
		const DropoffByParentPagerIndividualIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_child_history.pickup_by_parent_pager_individual_id
		 * @var integer intPickupByParentPagerIndividualId
		 */
		protected $intPickupByParentPagerIndividualId;
		const PickupByParentPagerIndividualIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_child_history.date_in
		 * @var QDateTime dttDateIn
		 */
		protected $dttDateIn;
		const DateInDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_child_history.date_out
		 * @var QDateTime dttDateOut
		 */
		protected $dttDateOut;
		const DateOutDefault = null;


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
		 * in the database column parent_pager_child_history.parent_pager_individual_id.
		 *
		 * NOTE: Always use the ParentPagerIndividual property getter to correctly retrieve this ParentPagerIndividual object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ParentPagerIndividual objParentPagerIndividual
		 */
		protected $objParentPagerIndividual;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column parent_pager_child_history.parent_pager_station_id.
		 *
		 * NOTE: Always use the ParentPagerStation property getter to correctly retrieve this ParentPagerStation object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ParentPagerStation objParentPagerStation
		 */
		protected $objParentPagerStation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column parent_pager_child_history.parent_pager_period_id.
		 *
		 * NOTE: Always use the ParentPagerPeriod property getter to correctly retrieve this ParentPagerPeriod object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ParentPagerPeriod objParentPagerPeriod
		 */
		protected $objParentPagerPeriod;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column parent_pager_child_history.dropoff_by_parent_pager_individual_id.
		 *
		 * NOTE: Always use the DropoffByParentPagerIndividual property getter to correctly retrieve this ParentPagerIndividual object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ParentPagerIndividual objDropoffByParentPagerIndividual
		 */
		protected $objDropoffByParentPagerIndividual;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column parent_pager_child_history.pickup_by_parent_pager_individual_id.
		 *
		 * NOTE: Always use the PickupByParentPagerIndividual property getter to correctly retrieve this ParentPagerIndividual object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ParentPagerIndividual objPickupByParentPagerIndividual
		 */
		protected $objPickupByParentPagerIndividual;





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
		 * Load a ParentPagerChildHistory from PK Info
		 * @param integer $intId
		 * @return ParentPagerChildHistory
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return ParentPagerChildHistory::QuerySingle(
				QQ::Equal(QQN::ParentPagerChildHistory()->Id, $intId)
			);
		}

		/**
		 * Load all ParentPagerChildHistories
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerChildHistory[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ParentPagerChildHistory::QueryArray to perform the LoadAll query
			try {
				return ParentPagerChildHistory::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ParentPagerChildHistories
		 * @return int
		 */
		public static function CountAll() {
			// Call ParentPagerChildHistory::QueryCount to perform the CountAll query
			return ParentPagerChildHistory::QueryCount(QQ::All());
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
			$objDatabase = ParentPagerChildHistory::GetDatabase();

			// Create/Build out the QueryBuilder object with ParentPagerChildHistory-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'parent_pager_child_history');
			ParentPagerChildHistory::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('parent_pager_child_history');

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
		 * Static Qcodo Query method to query for a single ParentPagerChildHistory object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerChildHistory the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerChildHistory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ParentPagerChildHistory object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ParentPagerChildHistory::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ParentPagerChildHistory::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ParentPagerChildHistory objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerChildHistory[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerChildHistory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ParentPagerChildHistory::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ParentPagerChildHistory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ParentPagerChildHistory objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerChildHistory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ParentPagerChildHistory::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'parent_pager_child_history_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ParentPagerChildHistory-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ParentPagerChildHistory::GetSelectFields($objQueryBuilder);
				ParentPagerChildHistory::GetFromFields($objQueryBuilder);

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
			return ParentPagerChildHistory::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ParentPagerChildHistory
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'parent_pager_child_history';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'server_identifier', $strAliasPrefix . 'server_identifier');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_individual_id', $strAliasPrefix . 'parent_pager_individual_id');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_station_id', $strAliasPrefix . 'parent_pager_station_id');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_period_id', $strAliasPrefix . 'parent_pager_period_id');
			$objBuilder->AddSelectItem($strTableName, 'dropoff_by_parent_pager_individual_id', $strAliasPrefix . 'dropoff_by_parent_pager_individual_id');
			$objBuilder->AddSelectItem($strTableName, 'pickup_by_parent_pager_individual_id', $strAliasPrefix . 'pickup_by_parent_pager_individual_id');
			$objBuilder->AddSelectItem($strTableName, 'date_in', $strAliasPrefix . 'date_in');
			$objBuilder->AddSelectItem($strTableName, 'date_out', $strAliasPrefix . 'date_out');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ParentPagerChildHistory from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ParentPagerChildHistory::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerChildHistory
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the ParentPagerChildHistory object
			$objToReturn = new ParentPagerChildHistory();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'server_identifier', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'server_identifier'] : $strAliasPrefix . 'server_identifier';
			$objToReturn->intServerIdentifier = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_pager_individual_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_pager_individual_id'] : $strAliasPrefix . 'parent_pager_individual_id';
			$objToReturn->intParentPagerIndividualId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_pager_station_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_pager_station_id'] : $strAliasPrefix . 'parent_pager_station_id';
			$objToReturn->intParentPagerStationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_pager_period_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_pager_period_id'] : $strAliasPrefix . 'parent_pager_period_id';
			$objToReturn->intParentPagerPeriodId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'dropoff_by_parent_pager_individual_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'dropoff_by_parent_pager_individual_id'] : $strAliasPrefix . 'dropoff_by_parent_pager_individual_id';
			$objToReturn->intDropoffByParentPagerIndividualId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'pickup_by_parent_pager_individual_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'pickup_by_parent_pager_individual_id'] : $strAliasPrefix . 'pickup_by_parent_pager_individual_id';
			$objToReturn->intPickupByParentPagerIndividualId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_in', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_in'] : $strAliasPrefix . 'date_in';
			$objToReturn->dttDateIn = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_out', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_out'] : $strAliasPrefix . 'date_out';
			$objToReturn->dttDateOut = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'parent_pager_child_history__';

			// Check for ParentPagerIndividual Early Binding
			$strAlias = $strAliasPrefix . 'parent_pager_individual_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentPagerIndividual = ParentPagerIndividual::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_pager_individual_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ParentPagerStation Early Binding
			$strAlias = $strAliasPrefix . 'parent_pager_station_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentPagerStation = ParentPagerStation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_pager_station_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ParentPagerPeriod Early Binding
			$strAlias = $strAliasPrefix . 'parent_pager_period_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentPagerPeriod = ParentPagerPeriod::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_pager_period_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for DropoffByParentPagerIndividual Early Binding
			$strAlias = $strAliasPrefix . 'dropoff_by_parent_pager_individual_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objDropoffByParentPagerIndividual = ParentPagerIndividual::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dropoff_by_parent_pager_individual_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for PickupByParentPagerIndividual Early Binding
			$strAlias = $strAliasPrefix . 'pickup_by_parent_pager_individual_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPickupByParentPagerIndividual = ParentPagerIndividual::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pickup_by_parent_pager_individual_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of ParentPagerChildHistories from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerChildHistory[]
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
					$objItem = ParentPagerChildHistory::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ParentPagerChildHistory::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ParentPagerChildHistory object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ParentPagerChildHistory next row resulting from the query
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
			return ParentPagerChildHistory::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ParentPagerChildHistory object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return ParentPagerChildHistory
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ParentPagerChildHistory::QuerySingle(
				QQ::Equal(QQN::ParentPagerChildHistory()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single ParentPagerChildHistory object,
		 * by ServerIdentifier Index(es)
		 * @param integer $intServerIdentifier
		 * @return ParentPagerChildHistory
		*/
		public static function LoadByServerIdentifier($intServerIdentifier, $objOptionalClauses = null) {
			return ParentPagerChildHistory::QuerySingle(
				QQ::Equal(QQN::ParentPagerChildHistory()->ServerIdentifier, $intServerIdentifier)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerChildHistory objects,
		 * by ParentPagerIndividualId Index(es)
		 * @param integer $intParentPagerIndividualId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerChildHistory[]
		*/
		public static function LoadArrayByParentPagerIndividualId($intParentPagerIndividualId, $objOptionalClauses = null) {
			// Call ParentPagerChildHistory::QueryArray to perform the LoadArrayByParentPagerIndividualId query
			try {
				return ParentPagerChildHistory::QueryArray(
					QQ::Equal(QQN::ParentPagerChildHistory()->ParentPagerIndividualId, $intParentPagerIndividualId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerChildHistories
		 * by ParentPagerIndividualId Index(es)
		 * @param integer $intParentPagerIndividualId
		 * @return int
		*/
		public static function CountByParentPagerIndividualId($intParentPagerIndividualId, $objOptionalClauses = null) {
			// Call ParentPagerChildHistory::QueryCount to perform the CountByParentPagerIndividualId query
			return ParentPagerChildHistory::QueryCount(
				QQ::Equal(QQN::ParentPagerChildHistory()->ParentPagerIndividualId, $intParentPagerIndividualId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerChildHistory objects,
		 * by ParentPagerStationId Index(es)
		 * @param integer $intParentPagerStationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerChildHistory[]
		*/
		public static function LoadArrayByParentPagerStationId($intParentPagerStationId, $objOptionalClauses = null) {
			// Call ParentPagerChildHistory::QueryArray to perform the LoadArrayByParentPagerStationId query
			try {
				return ParentPagerChildHistory::QueryArray(
					QQ::Equal(QQN::ParentPagerChildHistory()->ParentPagerStationId, $intParentPagerStationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerChildHistories
		 * by ParentPagerStationId Index(es)
		 * @param integer $intParentPagerStationId
		 * @return int
		*/
		public static function CountByParentPagerStationId($intParentPagerStationId, $objOptionalClauses = null) {
			// Call ParentPagerChildHistory::QueryCount to perform the CountByParentPagerStationId query
			return ParentPagerChildHistory::QueryCount(
				QQ::Equal(QQN::ParentPagerChildHistory()->ParentPagerStationId, $intParentPagerStationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerChildHistory objects,
		 * by ParentPagerPeriodId Index(es)
		 * @param integer $intParentPagerPeriodId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerChildHistory[]
		*/
		public static function LoadArrayByParentPagerPeriodId($intParentPagerPeriodId, $objOptionalClauses = null) {
			// Call ParentPagerChildHistory::QueryArray to perform the LoadArrayByParentPagerPeriodId query
			try {
				return ParentPagerChildHistory::QueryArray(
					QQ::Equal(QQN::ParentPagerChildHistory()->ParentPagerPeriodId, $intParentPagerPeriodId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerChildHistories
		 * by ParentPagerPeriodId Index(es)
		 * @param integer $intParentPagerPeriodId
		 * @return int
		*/
		public static function CountByParentPagerPeriodId($intParentPagerPeriodId, $objOptionalClauses = null) {
			// Call ParentPagerChildHistory::QueryCount to perform the CountByParentPagerPeriodId query
			return ParentPagerChildHistory::QueryCount(
				QQ::Equal(QQN::ParentPagerChildHistory()->ParentPagerPeriodId, $intParentPagerPeriodId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerChildHistory objects,
		 * by DropoffByParentPagerIndividualId Index(es)
		 * @param integer $intDropoffByParentPagerIndividualId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerChildHistory[]
		*/
		public static function LoadArrayByDropoffByParentPagerIndividualId($intDropoffByParentPagerIndividualId, $objOptionalClauses = null) {
			// Call ParentPagerChildHistory::QueryArray to perform the LoadArrayByDropoffByParentPagerIndividualId query
			try {
				return ParentPagerChildHistory::QueryArray(
					QQ::Equal(QQN::ParentPagerChildHistory()->DropoffByParentPagerIndividualId, $intDropoffByParentPagerIndividualId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerChildHistories
		 * by DropoffByParentPagerIndividualId Index(es)
		 * @param integer $intDropoffByParentPagerIndividualId
		 * @return int
		*/
		public static function CountByDropoffByParentPagerIndividualId($intDropoffByParentPagerIndividualId, $objOptionalClauses = null) {
			// Call ParentPagerChildHistory::QueryCount to perform the CountByDropoffByParentPagerIndividualId query
			return ParentPagerChildHistory::QueryCount(
				QQ::Equal(QQN::ParentPagerChildHistory()->DropoffByParentPagerIndividualId, $intDropoffByParentPagerIndividualId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerChildHistory objects,
		 * by PickupByParentPagerIndividualId Index(es)
		 * @param integer $intPickupByParentPagerIndividualId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerChildHistory[]
		*/
		public static function LoadArrayByPickupByParentPagerIndividualId($intPickupByParentPagerIndividualId, $objOptionalClauses = null) {
			// Call ParentPagerChildHistory::QueryArray to perform the LoadArrayByPickupByParentPagerIndividualId query
			try {
				return ParentPagerChildHistory::QueryArray(
					QQ::Equal(QQN::ParentPagerChildHistory()->PickupByParentPagerIndividualId, $intPickupByParentPagerIndividualId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerChildHistories
		 * by PickupByParentPagerIndividualId Index(es)
		 * @param integer $intPickupByParentPagerIndividualId
		 * @return int
		*/
		public static function CountByPickupByParentPagerIndividualId($intPickupByParentPagerIndividualId, $objOptionalClauses = null) {
			// Call ParentPagerChildHistory::QueryCount to perform the CountByPickupByParentPagerIndividualId query
			return ParentPagerChildHistory::QueryCount(
				QQ::Equal(QQN::ParentPagerChildHistory()->PickupByParentPagerIndividualId, $intPickupByParentPagerIndividualId)
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
		 * Save this ParentPagerChildHistory
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerChildHistory::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `parent_pager_child_history` (
							`server_identifier`,
							`parent_pager_individual_id`,
							`parent_pager_station_id`,
							`parent_pager_period_id`,
							`dropoff_by_parent_pager_individual_id`,
							`pickup_by_parent_pager_individual_id`,
							`date_in`,
							`date_out`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerIndividualId) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerStationId) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerPeriodId) . ',
							' . $objDatabase->SqlVariable($this->intDropoffByParentPagerIndividualId) . ',
							' . $objDatabase->SqlVariable($this->intPickupByParentPagerIndividualId) . ',
							' . $objDatabase->SqlVariable($this->dttDateIn) . ',
							' . $objDatabase->SqlVariable($this->dttDateOut) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('parent_pager_child_history', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`parent_pager_child_history`
						SET
							`server_identifier` = ' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intParentPagerIndividualId) . ',
							`parent_pager_station_id` = ' . $objDatabase->SqlVariable($this->intParentPagerStationId) . ',
							`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intParentPagerPeriodId) . ',
							`dropoff_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intDropoffByParentPagerIndividualId) . ',
							`pickup_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intPickupByParentPagerIndividualId) . ',
							`date_in` = ' . $objDatabase->SqlVariable($this->dttDateIn) . ',
							`date_out` = ' . $objDatabase->SqlVariable($this->dttDateOut) . '
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
		 * Delete this ParentPagerChildHistory
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ParentPagerChildHistory with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerChildHistory::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_child_history`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ParentPagerChildHistories
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerChildHistory::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_child_history`');
		}

		/**
		 * Truncate parent_pager_child_history table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerChildHistory::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `parent_pager_child_history`');
		}

		/**
		 * Reload this ParentPagerChildHistory from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ParentPagerChildHistory object.');

			// Reload the Object
			$objReloaded = ParentPagerChildHistory::Load($this->intId);

			// Update $this's local variables to match
			$this->intServerIdentifier = $objReloaded->intServerIdentifier;
			$this->ParentPagerIndividualId = $objReloaded->ParentPagerIndividualId;
			$this->ParentPagerStationId = $objReloaded->ParentPagerStationId;
			$this->ParentPagerPeriodId = $objReloaded->ParentPagerPeriodId;
			$this->DropoffByParentPagerIndividualId = $objReloaded->DropoffByParentPagerIndividualId;
			$this->PickupByParentPagerIndividualId = $objReloaded->PickupByParentPagerIndividualId;
			$this->dttDateIn = $objReloaded->dttDateIn;
			$this->dttDateOut = $objReloaded->dttDateOut;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ParentPagerChildHistory::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `parent_pager_child_history` (
					`id`,
					`server_identifier`,
					`parent_pager_individual_id`,
					`parent_pager_station_id`,
					`parent_pager_period_id`,
					`dropoff_by_parent_pager_individual_id`,
					`pickup_by_parent_pager_individual_id`,
					`date_in`,
					`date_out`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
					' . $objDatabase->SqlVariable($this->intParentPagerIndividualId) . ',
					' . $objDatabase->SqlVariable($this->intParentPagerStationId) . ',
					' . $objDatabase->SqlVariable($this->intParentPagerPeriodId) . ',
					' . $objDatabase->SqlVariable($this->intDropoffByParentPagerIndividualId) . ',
					' . $objDatabase->SqlVariable($this->intPickupByParentPagerIndividualId) . ',
					' . $objDatabase->SqlVariable($this->dttDateIn) . ',
					' . $objDatabase->SqlVariable($this->dttDateOut) . ',
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
		 * @return ParentPagerChildHistory[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = ParentPagerChildHistory::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM parent_pager_child_history WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return ParentPagerChildHistory::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ParentPagerChildHistory[]
		 */
		public function GetJournal() {
			return ParentPagerChildHistory::GetJournalForId($this->intId);
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

				case 'ParentPagerIndividualId':
					// Gets the value for intParentPagerIndividualId (Not Null)
					// @return integer
					return $this->intParentPagerIndividualId;

				case 'ParentPagerStationId':
					// Gets the value for intParentPagerStationId 
					// @return integer
					return $this->intParentPagerStationId;

				case 'ParentPagerPeriodId':
					// Gets the value for intParentPagerPeriodId 
					// @return integer
					return $this->intParentPagerPeriodId;

				case 'DropoffByParentPagerIndividualId':
					// Gets the value for intDropoffByParentPagerIndividualId 
					// @return integer
					return $this->intDropoffByParentPagerIndividualId;

				case 'PickupByParentPagerIndividualId':
					// Gets the value for intPickupByParentPagerIndividualId 
					// @return integer
					return $this->intPickupByParentPagerIndividualId;

				case 'DateIn':
					// Gets the value for dttDateIn (Not Null)
					// @return QDateTime
					return $this->dttDateIn;

				case 'DateOut':
					// Gets the value for dttDateOut (Not Null)
					// @return QDateTime
					return $this->dttDateOut;


				///////////////////
				// Member Objects
				///////////////////
				case 'ParentPagerIndividual':
					// Gets the value for the ParentPagerIndividual object referenced by intParentPagerIndividualId (Not Null)
					// @return ParentPagerIndividual
					try {
						if ((!$this->objParentPagerIndividual) && (!is_null($this->intParentPagerIndividualId)))
							$this->objParentPagerIndividual = ParentPagerIndividual::Load($this->intParentPagerIndividualId);
						return $this->objParentPagerIndividual;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParentPagerStation':
					// Gets the value for the ParentPagerStation object referenced by intParentPagerStationId 
					// @return ParentPagerStation
					try {
						if ((!$this->objParentPagerStation) && (!is_null($this->intParentPagerStationId)))
							$this->objParentPagerStation = ParentPagerStation::Load($this->intParentPagerStationId);
						return $this->objParentPagerStation;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParentPagerPeriod':
					// Gets the value for the ParentPagerPeriod object referenced by intParentPagerPeriodId 
					// @return ParentPagerPeriod
					try {
						if ((!$this->objParentPagerPeriod) && (!is_null($this->intParentPagerPeriodId)))
							$this->objParentPagerPeriod = ParentPagerPeriod::Load($this->intParentPagerPeriodId);
						return $this->objParentPagerPeriod;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DropoffByParentPagerIndividual':
					// Gets the value for the ParentPagerIndividual object referenced by intDropoffByParentPagerIndividualId 
					// @return ParentPagerIndividual
					try {
						if ((!$this->objDropoffByParentPagerIndividual) && (!is_null($this->intDropoffByParentPagerIndividualId)))
							$this->objDropoffByParentPagerIndividual = ParentPagerIndividual::Load($this->intDropoffByParentPagerIndividualId);
						return $this->objDropoffByParentPagerIndividual;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PickupByParentPagerIndividual':
					// Gets the value for the ParentPagerIndividual object referenced by intPickupByParentPagerIndividualId 
					// @return ParentPagerIndividual
					try {
						if ((!$this->objPickupByParentPagerIndividual) && (!is_null($this->intPickupByParentPagerIndividualId)))
							$this->objPickupByParentPagerIndividual = ParentPagerIndividual::Load($this->intPickupByParentPagerIndividualId);
						return $this->objPickupByParentPagerIndividual;
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

				case 'ParentPagerIndividualId':
					// Sets the value for intParentPagerIndividualId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objParentPagerIndividual = null;
						return ($this->intParentPagerIndividualId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParentPagerStationId':
					// Sets the value for intParentPagerStationId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objParentPagerStation = null;
						return ($this->intParentPagerStationId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParentPagerPeriodId':
					// Sets the value for intParentPagerPeriodId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objParentPagerPeriod = null;
						return ($this->intParentPagerPeriodId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DropoffByParentPagerIndividualId':
					// Sets the value for intDropoffByParentPagerIndividualId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objDropoffByParentPagerIndividual = null;
						return ($this->intDropoffByParentPagerIndividualId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PickupByParentPagerIndividualId':
					// Sets the value for intPickupByParentPagerIndividualId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPickupByParentPagerIndividual = null;
						return ($this->intPickupByParentPagerIndividualId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateIn':
					// Sets the value for dttDateIn (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateIn = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateOut':
					// Sets the value for dttDateOut (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateOut = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ParentPagerIndividual':
					// Sets the value for the ParentPagerIndividual object referenced by intParentPagerIndividualId (Not Null)
					// @param ParentPagerIndividual $mixValue
					// @return ParentPagerIndividual
					if (is_null($mixValue)) {
						$this->intParentPagerIndividualId = null;
						$this->objParentPagerIndividual = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ParentPagerIndividual object
						try {
							$mixValue = QType::Cast($mixValue, 'ParentPagerIndividual');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ParentPagerIndividual object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ParentPagerIndividual for this ParentPagerChildHistory');

						// Update Local Member Variables
						$this->objParentPagerIndividual = $mixValue;
						$this->intParentPagerIndividualId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ParentPagerStation':
					// Sets the value for the ParentPagerStation object referenced by intParentPagerStationId 
					// @param ParentPagerStation $mixValue
					// @return ParentPagerStation
					if (is_null($mixValue)) {
						$this->intParentPagerStationId = null;
						$this->objParentPagerStation = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ParentPagerStation object
						try {
							$mixValue = QType::Cast($mixValue, 'ParentPagerStation');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ParentPagerStation object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ParentPagerStation for this ParentPagerChildHistory');

						// Update Local Member Variables
						$this->objParentPagerStation = $mixValue;
						$this->intParentPagerStationId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ParentPagerPeriod':
					// Sets the value for the ParentPagerPeriod object referenced by intParentPagerPeriodId 
					// @param ParentPagerPeriod $mixValue
					// @return ParentPagerPeriod
					if (is_null($mixValue)) {
						$this->intParentPagerPeriodId = null;
						$this->objParentPagerPeriod = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ParentPagerPeriod object
						try {
							$mixValue = QType::Cast($mixValue, 'ParentPagerPeriod');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ParentPagerPeriod object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ParentPagerPeriod for this ParentPagerChildHistory');

						// Update Local Member Variables
						$this->objParentPagerPeriod = $mixValue;
						$this->intParentPagerPeriodId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'DropoffByParentPagerIndividual':
					// Sets the value for the ParentPagerIndividual object referenced by intDropoffByParentPagerIndividualId 
					// @param ParentPagerIndividual $mixValue
					// @return ParentPagerIndividual
					if (is_null($mixValue)) {
						$this->intDropoffByParentPagerIndividualId = null;
						$this->objDropoffByParentPagerIndividual = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ParentPagerIndividual object
						try {
							$mixValue = QType::Cast($mixValue, 'ParentPagerIndividual');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ParentPagerIndividual object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved DropoffByParentPagerIndividual for this ParentPagerChildHistory');

						// Update Local Member Variables
						$this->objDropoffByParentPagerIndividual = $mixValue;
						$this->intDropoffByParentPagerIndividualId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'PickupByParentPagerIndividual':
					// Sets the value for the ParentPagerIndividual object referenced by intPickupByParentPagerIndividualId 
					// @param ParentPagerIndividual $mixValue
					// @return ParentPagerIndividual
					if (is_null($mixValue)) {
						$this->intPickupByParentPagerIndividualId = null;
						$this->objPickupByParentPagerIndividual = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ParentPagerIndividual object
						try {
							$mixValue = QType::Cast($mixValue, 'ParentPagerIndividual');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ParentPagerIndividual object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved PickupByParentPagerIndividual for this ParentPagerChildHistory');

						// Update Local Member Variables
						$this->objPickupByParentPagerIndividual = $mixValue;
						$this->intPickupByParentPagerIndividualId = $mixValue->Id;

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
			$strToReturn = '<complexType name="ParentPagerChildHistory"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ServerIdentifier" type="xsd:int"/>';
			$strToReturn .= '<element name="ParentPagerIndividual" type="xsd1:ParentPagerIndividual"/>';
			$strToReturn .= '<element name="ParentPagerStation" type="xsd1:ParentPagerStation"/>';
			$strToReturn .= '<element name="ParentPagerPeriod" type="xsd1:ParentPagerPeriod"/>';
			$strToReturn .= '<element name="DropoffByParentPagerIndividual" type="xsd1:ParentPagerIndividual"/>';
			$strToReturn .= '<element name="PickupByParentPagerIndividual" type="xsd1:ParentPagerIndividual"/>';
			$strToReturn .= '<element name="DateIn" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateOut" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ParentPagerChildHistory', $strComplexTypeArray)) {
				$strComplexTypeArray['ParentPagerChildHistory'] = ParentPagerChildHistory::GetSoapComplexTypeXml();
				ParentPagerIndividual::AlterSoapComplexTypeArray($strComplexTypeArray);
				ParentPagerStation::AlterSoapComplexTypeArray($strComplexTypeArray);
				ParentPagerPeriod::AlterSoapComplexTypeArray($strComplexTypeArray);
				ParentPagerIndividual::AlterSoapComplexTypeArray($strComplexTypeArray);
				ParentPagerIndividual::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ParentPagerChildHistory::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ParentPagerChildHistory();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'ServerIdentifier'))
				$objToReturn->intServerIdentifier = $objSoapObject->ServerIdentifier;
			if ((property_exists($objSoapObject, 'ParentPagerIndividual')) &&
				($objSoapObject->ParentPagerIndividual))
				$objToReturn->ParentPagerIndividual = ParentPagerIndividual::GetObjectFromSoapObject($objSoapObject->ParentPagerIndividual);
			if ((property_exists($objSoapObject, 'ParentPagerStation')) &&
				($objSoapObject->ParentPagerStation))
				$objToReturn->ParentPagerStation = ParentPagerStation::GetObjectFromSoapObject($objSoapObject->ParentPagerStation);
			if ((property_exists($objSoapObject, 'ParentPagerPeriod')) &&
				($objSoapObject->ParentPagerPeriod))
				$objToReturn->ParentPagerPeriod = ParentPagerPeriod::GetObjectFromSoapObject($objSoapObject->ParentPagerPeriod);
			if ((property_exists($objSoapObject, 'DropoffByParentPagerIndividual')) &&
				($objSoapObject->DropoffByParentPagerIndividual))
				$objToReturn->DropoffByParentPagerIndividual = ParentPagerIndividual::GetObjectFromSoapObject($objSoapObject->DropoffByParentPagerIndividual);
			if ((property_exists($objSoapObject, 'PickupByParentPagerIndividual')) &&
				($objSoapObject->PickupByParentPagerIndividual))
				$objToReturn->PickupByParentPagerIndividual = ParentPagerIndividual::GetObjectFromSoapObject($objSoapObject->PickupByParentPagerIndividual);
			if (property_exists($objSoapObject, 'DateIn'))
				$objToReturn->dttDateIn = new QDateTime($objSoapObject->DateIn);
			if (property_exists($objSoapObject, 'DateOut'))
				$objToReturn->dttDateOut = new QDateTime($objSoapObject->DateOut);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ParentPagerChildHistory::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objParentPagerIndividual)
				$objObject->objParentPagerIndividual = ParentPagerIndividual::GetSoapObjectFromObject($objObject->objParentPagerIndividual, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentPagerIndividualId = null;
			if ($objObject->objParentPagerStation)
				$objObject->objParentPagerStation = ParentPagerStation::GetSoapObjectFromObject($objObject->objParentPagerStation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentPagerStationId = null;
			if ($objObject->objParentPagerPeriod)
				$objObject->objParentPagerPeriod = ParentPagerPeriod::GetSoapObjectFromObject($objObject->objParentPagerPeriod, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentPagerPeriodId = null;
			if ($objObject->objDropoffByParentPagerIndividual)
				$objObject->objDropoffByParentPagerIndividual = ParentPagerIndividual::GetSoapObjectFromObject($objObject->objDropoffByParentPagerIndividual, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDropoffByParentPagerIndividualId = null;
			if ($objObject->objPickupByParentPagerIndividual)
				$objObject->objPickupByParentPagerIndividual = ParentPagerIndividual::GetSoapObjectFromObject($objObject->objPickupByParentPagerIndividual, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPickupByParentPagerIndividualId = null;
			if ($objObject->dttDateIn)
				$objObject->dttDateIn = $objObject->dttDateIn->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateOut)
				$objObject->dttDateOut = $objObject->dttDateOut->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $ServerIdentifier
	 * @property-read QQNode $ParentPagerIndividualId
	 * @property-read QQNodeParentPagerIndividual $ParentPagerIndividual
	 * @property-read QQNode $ParentPagerStationId
	 * @property-read QQNodeParentPagerStation $ParentPagerStation
	 * @property-read QQNode $ParentPagerPeriodId
	 * @property-read QQNodeParentPagerPeriod $ParentPagerPeriod
	 * @property-read QQNode $DropoffByParentPagerIndividualId
	 * @property-read QQNodeParentPagerIndividual $DropoffByParentPagerIndividual
	 * @property-read QQNode $PickupByParentPagerIndividualId
	 * @property-read QQNodeParentPagerIndividual $PickupByParentPagerIndividual
	 * @property-read QQNode $DateIn
	 * @property-read QQNode $DateOut
	 */
	class QQNodeParentPagerChildHistory extends QQNode {
		protected $strTableName = 'parent_pager_child_history';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerChildHistory';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ServerIdentifier':
					return new QQNode('server_identifier', 'ServerIdentifier', 'integer', $this);
				case 'ParentPagerIndividualId':
					return new QQNode('parent_pager_individual_id', 'ParentPagerIndividualId', 'integer', $this);
				case 'ParentPagerIndividual':
					return new QQNodeParentPagerIndividual('parent_pager_individual_id', 'ParentPagerIndividual', 'integer', $this);
				case 'ParentPagerStationId':
					return new QQNode('parent_pager_station_id', 'ParentPagerStationId', 'integer', $this);
				case 'ParentPagerStation':
					return new QQNodeParentPagerStation('parent_pager_station_id', 'ParentPagerStation', 'integer', $this);
				case 'ParentPagerPeriodId':
					return new QQNode('parent_pager_period_id', 'ParentPagerPeriodId', 'integer', $this);
				case 'ParentPagerPeriod':
					return new QQNodeParentPagerPeriod('parent_pager_period_id', 'ParentPagerPeriod', 'integer', $this);
				case 'DropoffByParentPagerIndividualId':
					return new QQNode('dropoff_by_parent_pager_individual_id', 'DropoffByParentPagerIndividualId', 'integer', $this);
				case 'DropoffByParentPagerIndividual':
					return new QQNodeParentPagerIndividual('dropoff_by_parent_pager_individual_id', 'DropoffByParentPagerIndividual', 'integer', $this);
				case 'PickupByParentPagerIndividualId':
					return new QQNode('pickup_by_parent_pager_individual_id', 'PickupByParentPagerIndividualId', 'integer', $this);
				case 'PickupByParentPagerIndividual':
					return new QQNodeParentPagerIndividual('pickup_by_parent_pager_individual_id', 'PickupByParentPagerIndividual', 'integer', $this);
				case 'DateIn':
					return new QQNode('date_in', 'DateIn', 'QDateTime', $this);
				case 'DateOut':
					return new QQNode('date_out', 'DateOut', 'QDateTime', $this);

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
	 * @property-read QQNode $ParentPagerIndividualId
	 * @property-read QQNodeParentPagerIndividual $ParentPagerIndividual
	 * @property-read QQNode $ParentPagerStationId
	 * @property-read QQNodeParentPagerStation $ParentPagerStation
	 * @property-read QQNode $ParentPagerPeriodId
	 * @property-read QQNodeParentPagerPeriod $ParentPagerPeriod
	 * @property-read QQNode $DropoffByParentPagerIndividualId
	 * @property-read QQNodeParentPagerIndividual $DropoffByParentPagerIndividual
	 * @property-read QQNode $PickupByParentPagerIndividualId
	 * @property-read QQNodeParentPagerIndividual $PickupByParentPagerIndividual
	 * @property-read QQNode $DateIn
	 * @property-read QQNode $DateOut
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeParentPagerChildHistory extends QQReverseReferenceNode {
		protected $strTableName = 'parent_pager_child_history';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerChildHistory';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ServerIdentifier':
					return new QQNode('server_identifier', 'ServerIdentifier', 'integer', $this);
				case 'ParentPagerIndividualId':
					return new QQNode('parent_pager_individual_id', 'ParentPagerIndividualId', 'integer', $this);
				case 'ParentPagerIndividual':
					return new QQNodeParentPagerIndividual('parent_pager_individual_id', 'ParentPagerIndividual', 'integer', $this);
				case 'ParentPagerStationId':
					return new QQNode('parent_pager_station_id', 'ParentPagerStationId', 'integer', $this);
				case 'ParentPagerStation':
					return new QQNodeParentPagerStation('parent_pager_station_id', 'ParentPagerStation', 'integer', $this);
				case 'ParentPagerPeriodId':
					return new QQNode('parent_pager_period_id', 'ParentPagerPeriodId', 'integer', $this);
				case 'ParentPagerPeriod':
					return new QQNodeParentPagerPeriod('parent_pager_period_id', 'ParentPagerPeriod', 'integer', $this);
				case 'DropoffByParentPagerIndividualId':
					return new QQNode('dropoff_by_parent_pager_individual_id', 'DropoffByParentPagerIndividualId', 'integer', $this);
				case 'DropoffByParentPagerIndividual':
					return new QQNodeParentPagerIndividual('dropoff_by_parent_pager_individual_id', 'DropoffByParentPagerIndividual', 'integer', $this);
				case 'PickupByParentPagerIndividualId':
					return new QQNode('pickup_by_parent_pager_individual_id', 'PickupByParentPagerIndividualId', 'integer', $this);
				case 'PickupByParentPagerIndividual':
					return new QQNodeParentPagerIndividual('pickup_by_parent_pager_individual_id', 'PickupByParentPagerIndividual', 'integer', $this);
				case 'DateIn':
					return new QQNode('date_in', 'DateIn', 'QDateTime', $this);
				case 'DateOut':
					return new QQNode('date_out', 'DateOut', 'QDateTime', $this);

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