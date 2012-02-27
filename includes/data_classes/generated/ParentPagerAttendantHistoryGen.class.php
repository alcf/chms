<?php
	/**
	 * The abstract ParentPagerAttendantHistoryGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ParentPagerAttendantHistory subclass which
	 * extends this ParentPagerAttendantHistoryGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ParentPagerAttendantHistory class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $ServerIdentifier the value for intServerIdentifier (Unique)
	 * @property integer $ParentPagerIndividualId the value for intParentPagerIndividualId (Not Null)
	 * @property integer $ParentPagerStationId the value for intParentPagerStationId 
	 * @property integer $ParentPagerPeriodId the value for intParentPagerPeriodId 
	 * @property integer $ParentPagerProgramId the value for intParentPagerProgramId 
	 * @property QDateTime $DateIn the value for dttDateIn (Not Null)
	 * @property QDateTime $DateOut the value for dttDateOut (Not Null)
	 * @property ParentPagerIndividual $ParentPagerIndividual the value for the ParentPagerIndividual object referenced by intParentPagerIndividualId (Not Null)
	 * @property ParentPagerStation $ParentPagerStation the value for the ParentPagerStation object referenced by intParentPagerStationId 
	 * @property ParentPagerPeriod $ParentPagerPeriod the value for the ParentPagerPeriod object referenced by intParentPagerPeriodId 
	 * @property ParentPagerProgram $ParentPagerProgram the value for the ParentPagerProgram object referenced by intParentPagerProgramId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ParentPagerAttendantHistoryGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column parent_pager_attendant_history.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_attendant_history.server_identifier
		 * @var integer intServerIdentifier
		 */
		protected $intServerIdentifier;
		const ServerIdentifierDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_attendant_history.parent_pager_individual_id
		 * @var integer intParentPagerIndividualId
		 */
		protected $intParentPagerIndividualId;
		const ParentPagerIndividualIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_attendant_history.parent_pager_station_id
		 * @var integer intParentPagerStationId
		 */
		protected $intParentPagerStationId;
		const ParentPagerStationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_attendant_history.parent_pager_period_id
		 * @var integer intParentPagerPeriodId
		 */
		protected $intParentPagerPeriodId;
		const ParentPagerPeriodIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_attendant_history.parent_pager_program_id
		 * @var integer intParentPagerProgramId
		 */
		protected $intParentPagerProgramId;
		const ParentPagerProgramIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_attendant_history.date_in
		 * @var QDateTime dttDateIn
		 */
		protected $dttDateIn;
		const DateInDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_attendant_history.date_out
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
		 * in the database column parent_pager_attendant_history.parent_pager_individual_id.
		 *
		 * NOTE: Always use the ParentPagerIndividual property getter to correctly retrieve this ParentPagerIndividual object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ParentPagerIndividual objParentPagerIndividual
		 */
		protected $objParentPagerIndividual;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column parent_pager_attendant_history.parent_pager_station_id.
		 *
		 * NOTE: Always use the ParentPagerStation property getter to correctly retrieve this ParentPagerStation object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ParentPagerStation objParentPagerStation
		 */
		protected $objParentPagerStation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column parent_pager_attendant_history.parent_pager_period_id.
		 *
		 * NOTE: Always use the ParentPagerPeriod property getter to correctly retrieve this ParentPagerPeriod object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ParentPagerPeriod objParentPagerPeriod
		 */
		protected $objParentPagerPeriod;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column parent_pager_attendant_history.parent_pager_program_id.
		 *
		 * NOTE: Always use the ParentPagerProgram property getter to correctly retrieve this ParentPagerProgram object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ParentPagerProgram objParentPagerProgram
		 */
		protected $objParentPagerProgram;





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
		 * Load a ParentPagerAttendantHistory from PK Info
		 * @param integer $intId
		 * @return ParentPagerAttendantHistory
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return ParentPagerAttendantHistory::QuerySingle(
				QQ::Equal(QQN::ParentPagerAttendantHistory()->Id, $intId)
			);
		}

		/**
		 * Load all ParentPagerAttendantHistories
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAttendantHistory[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ParentPagerAttendantHistory::QueryArray to perform the LoadAll query
			try {
				return ParentPagerAttendantHistory::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ParentPagerAttendantHistories
		 * @return int
		 */
		public static function CountAll() {
			// Call ParentPagerAttendantHistory::QueryCount to perform the CountAll query
			return ParentPagerAttendantHistory::QueryCount(QQ::All());
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
			$objDatabase = ParentPagerAttendantHistory::GetDatabase();

			// Create/Build out the QueryBuilder object with ParentPagerAttendantHistory-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'parent_pager_attendant_history');
			ParentPagerAttendantHistory::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('parent_pager_attendant_history');

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
		 * Static Qcodo Query method to query for a single ParentPagerAttendantHistory object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerAttendantHistory the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerAttendantHistory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ParentPagerAttendantHistory object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ParentPagerAttendantHistory objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerAttendantHistory[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerAttendantHistory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ParentPagerAttendantHistory::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ParentPagerAttendantHistory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ParentPagerAttendantHistory objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerAttendantHistory::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ParentPagerAttendantHistory::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'parent_pager_attendant_history_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ParentPagerAttendantHistory-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ParentPagerAttendantHistory::GetSelectFields($objQueryBuilder);
				ParentPagerAttendantHistory::GetFromFields($objQueryBuilder);

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
			return ParentPagerAttendantHistory::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ParentPagerAttendantHistory
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'parent_pager_attendant_history';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'server_identifier', $strAliasPrefix . 'server_identifier');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_individual_id', $strAliasPrefix . 'parent_pager_individual_id');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_station_id', $strAliasPrefix . 'parent_pager_station_id');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_period_id', $strAliasPrefix . 'parent_pager_period_id');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_program_id', $strAliasPrefix . 'parent_pager_program_id');
			$objBuilder->AddSelectItem($strTableName, 'date_in', $strAliasPrefix . 'date_in');
			$objBuilder->AddSelectItem($strTableName, 'date_out', $strAliasPrefix . 'date_out');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ParentPagerAttendantHistory from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ParentPagerAttendantHistory::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerAttendantHistory
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the ParentPagerAttendantHistory object
			$objToReturn = new ParentPagerAttendantHistory();
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
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_pager_program_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_pager_program_id'] : $strAliasPrefix . 'parent_pager_program_id';
			$objToReturn->intParentPagerProgramId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'parent_pager_attendant_history__';

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

			// Check for ParentPagerProgram Early Binding
			$strAlias = $strAliasPrefix . 'parent_pager_program_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentPagerProgram = ParentPagerProgram::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_pager_program_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of ParentPagerAttendantHistories from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerAttendantHistory[]
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
					$objItem = ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ParentPagerAttendantHistory object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ParentPagerAttendantHistory next row resulting from the query
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
			return ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ParentPagerAttendantHistory object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return ParentPagerAttendantHistory
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ParentPagerAttendantHistory::QuerySingle(
				QQ::Equal(QQN::ParentPagerAttendantHistory()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single ParentPagerAttendantHistory object,
		 * by ServerIdentifier Index(es)
		 * @param integer $intServerIdentifier
		 * @return ParentPagerAttendantHistory
		*/
		public static function LoadByServerIdentifier($intServerIdentifier, $objOptionalClauses = null) {
			return ParentPagerAttendantHistory::QuerySingle(
				QQ::Equal(QQN::ParentPagerAttendantHistory()->ServerIdentifier, $intServerIdentifier)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerAttendantHistory objects,
		 * by ParentPagerIndividualId Index(es)
		 * @param integer $intParentPagerIndividualId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAttendantHistory[]
		*/
		public static function LoadArrayByParentPagerIndividualId($intParentPagerIndividualId, $objOptionalClauses = null) {
			// Call ParentPagerAttendantHistory::QueryArray to perform the LoadArrayByParentPagerIndividualId query
			try {
				return ParentPagerAttendantHistory::QueryArray(
					QQ::Equal(QQN::ParentPagerAttendantHistory()->ParentPagerIndividualId, $intParentPagerIndividualId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerAttendantHistories
		 * by ParentPagerIndividualId Index(es)
		 * @param integer $intParentPagerIndividualId
		 * @return int
		*/
		public static function CountByParentPagerIndividualId($intParentPagerIndividualId, $objOptionalClauses = null) {
			// Call ParentPagerAttendantHistory::QueryCount to perform the CountByParentPagerIndividualId query
			return ParentPagerAttendantHistory::QueryCount(
				QQ::Equal(QQN::ParentPagerAttendantHistory()->ParentPagerIndividualId, $intParentPagerIndividualId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerAttendantHistory objects,
		 * by ParentPagerStationId Index(es)
		 * @param integer $intParentPagerStationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAttendantHistory[]
		*/
		public static function LoadArrayByParentPagerStationId($intParentPagerStationId, $objOptionalClauses = null) {
			// Call ParentPagerAttendantHistory::QueryArray to perform the LoadArrayByParentPagerStationId query
			try {
				return ParentPagerAttendantHistory::QueryArray(
					QQ::Equal(QQN::ParentPagerAttendantHistory()->ParentPagerStationId, $intParentPagerStationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerAttendantHistories
		 * by ParentPagerStationId Index(es)
		 * @param integer $intParentPagerStationId
		 * @return int
		*/
		public static function CountByParentPagerStationId($intParentPagerStationId, $objOptionalClauses = null) {
			// Call ParentPagerAttendantHistory::QueryCount to perform the CountByParentPagerStationId query
			return ParentPagerAttendantHistory::QueryCount(
				QQ::Equal(QQN::ParentPagerAttendantHistory()->ParentPagerStationId, $intParentPagerStationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerAttendantHistory objects,
		 * by ParentPagerPeriodId Index(es)
		 * @param integer $intParentPagerPeriodId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAttendantHistory[]
		*/
		public static function LoadArrayByParentPagerPeriodId($intParentPagerPeriodId, $objOptionalClauses = null) {
			// Call ParentPagerAttendantHistory::QueryArray to perform the LoadArrayByParentPagerPeriodId query
			try {
				return ParentPagerAttendantHistory::QueryArray(
					QQ::Equal(QQN::ParentPagerAttendantHistory()->ParentPagerPeriodId, $intParentPagerPeriodId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerAttendantHistories
		 * by ParentPagerPeriodId Index(es)
		 * @param integer $intParentPagerPeriodId
		 * @return int
		*/
		public static function CountByParentPagerPeriodId($intParentPagerPeriodId, $objOptionalClauses = null) {
			// Call ParentPagerAttendantHistory::QueryCount to perform the CountByParentPagerPeriodId query
			return ParentPagerAttendantHistory::QueryCount(
				QQ::Equal(QQN::ParentPagerAttendantHistory()->ParentPagerPeriodId, $intParentPagerPeriodId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerAttendantHistory objects,
		 * by ParentPagerProgramId Index(es)
		 * @param integer $intParentPagerProgramId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAttendantHistory[]
		*/
		public static function LoadArrayByParentPagerProgramId($intParentPagerProgramId, $objOptionalClauses = null) {
			// Call ParentPagerAttendantHistory::QueryArray to perform the LoadArrayByParentPagerProgramId query
			try {
				return ParentPagerAttendantHistory::QueryArray(
					QQ::Equal(QQN::ParentPagerAttendantHistory()->ParentPagerProgramId, $intParentPagerProgramId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerAttendantHistories
		 * by ParentPagerProgramId Index(es)
		 * @param integer $intParentPagerProgramId
		 * @return int
		*/
		public static function CountByParentPagerProgramId($intParentPagerProgramId, $objOptionalClauses = null) {
			// Call ParentPagerAttendantHistory::QueryCount to perform the CountByParentPagerProgramId query
			return ParentPagerAttendantHistory::QueryCount(
				QQ::Equal(QQN::ParentPagerAttendantHistory()->ParentPagerProgramId, $intParentPagerProgramId)
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
		 * Save this ParentPagerAttendantHistory
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerAttendantHistory::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `parent_pager_attendant_history` (
							`server_identifier`,
							`parent_pager_individual_id`,
							`parent_pager_station_id`,
							`parent_pager_period_id`,
							`parent_pager_program_id`,
							`date_in`,
							`date_out`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerIndividualId) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerStationId) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerPeriodId) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerProgramId) . ',
							' . $objDatabase->SqlVariable($this->dttDateIn) . ',
							' . $objDatabase->SqlVariable($this->dttDateOut) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('parent_pager_attendant_history', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`parent_pager_attendant_history`
						SET
							`server_identifier` = ' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intParentPagerIndividualId) . ',
							`parent_pager_station_id` = ' . $objDatabase->SqlVariable($this->intParentPagerStationId) . ',
							`parent_pager_period_id` = ' . $objDatabase->SqlVariable($this->intParentPagerPeriodId) . ',
							`parent_pager_program_id` = ' . $objDatabase->SqlVariable($this->intParentPagerProgramId) . ',
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
		 * Delete this ParentPagerAttendantHistory
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ParentPagerAttendantHistory with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerAttendantHistory::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_attendant_history`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ParentPagerAttendantHistories
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerAttendantHistory::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_attendant_history`');
		}

		/**
		 * Truncate parent_pager_attendant_history table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerAttendantHistory::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `parent_pager_attendant_history`');
		}

		/**
		 * Reload this ParentPagerAttendantHistory from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ParentPagerAttendantHistory object.');

			// Reload the Object
			$objReloaded = ParentPagerAttendantHistory::Load($this->intId);

			// Update $this's local variables to match
			$this->intServerIdentifier = $objReloaded->intServerIdentifier;
			$this->ParentPagerIndividualId = $objReloaded->ParentPagerIndividualId;
			$this->ParentPagerStationId = $objReloaded->ParentPagerStationId;
			$this->ParentPagerPeriodId = $objReloaded->ParentPagerPeriodId;
			$this->ParentPagerProgramId = $objReloaded->ParentPagerProgramId;
			$this->dttDateIn = $objReloaded->dttDateIn;
			$this->dttDateOut = $objReloaded->dttDateOut;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ParentPagerAttendantHistory::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `parent_pager_attendant_history` (
					`id`,
					`server_identifier`,
					`parent_pager_individual_id`,
					`parent_pager_station_id`,
					`parent_pager_period_id`,
					`parent_pager_program_id`,
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
					' . $objDatabase->SqlVariable($this->intParentPagerProgramId) . ',
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
		 * @return ParentPagerAttendantHistory[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = ParentPagerAttendantHistory::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM parent_pager_attendant_history WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return ParentPagerAttendantHistory::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ParentPagerAttendantHistory[]
		 */
		public function GetJournal() {
			return ParentPagerAttendantHistory::GetJournalForId($this->intId);
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

				case 'ParentPagerProgramId':
					// Gets the value for intParentPagerProgramId 
					// @return integer
					return $this->intParentPagerProgramId;

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

				case 'ParentPagerProgram':
					// Gets the value for the ParentPagerProgram object referenced by intParentPagerProgramId 
					// @return ParentPagerProgram
					try {
						if ((!$this->objParentPagerProgram) && (!is_null($this->intParentPagerProgramId)))
							$this->objParentPagerProgram = ParentPagerProgram::Load($this->intParentPagerProgramId);
						return $this->objParentPagerProgram;
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

				case 'ParentPagerProgramId':
					// Sets the value for intParentPagerProgramId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objParentPagerProgram = null;
						return ($this->intParentPagerProgramId = QType::Cast($mixValue, QType::Integer));
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
							throw new QCallerException('Unable to set an unsaved ParentPagerIndividual for this ParentPagerAttendantHistory');

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
							throw new QCallerException('Unable to set an unsaved ParentPagerStation for this ParentPagerAttendantHistory');

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
							throw new QCallerException('Unable to set an unsaved ParentPagerPeriod for this ParentPagerAttendantHistory');

						// Update Local Member Variables
						$this->objParentPagerPeriod = $mixValue;
						$this->intParentPagerPeriodId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ParentPagerProgram':
					// Sets the value for the ParentPagerProgram object referenced by intParentPagerProgramId 
					// @param ParentPagerProgram $mixValue
					// @return ParentPagerProgram
					if (is_null($mixValue)) {
						$this->intParentPagerProgramId = null;
						$this->objParentPagerProgram = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ParentPagerProgram object
						try {
							$mixValue = QType::Cast($mixValue, 'ParentPagerProgram');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ParentPagerProgram object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ParentPagerProgram for this ParentPagerAttendantHistory');

						// Update Local Member Variables
						$this->objParentPagerProgram = $mixValue;
						$this->intParentPagerProgramId = $mixValue->Id;

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
			$strToReturn = '<complexType name="ParentPagerAttendantHistory"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ServerIdentifier" type="xsd:int"/>';
			$strToReturn .= '<element name="ParentPagerIndividual" type="xsd1:ParentPagerIndividual"/>';
			$strToReturn .= '<element name="ParentPagerStation" type="xsd1:ParentPagerStation"/>';
			$strToReturn .= '<element name="ParentPagerPeriod" type="xsd1:ParentPagerPeriod"/>';
			$strToReturn .= '<element name="ParentPagerProgram" type="xsd1:ParentPagerProgram"/>';
			$strToReturn .= '<element name="DateIn" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateOut" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ParentPagerAttendantHistory', $strComplexTypeArray)) {
				$strComplexTypeArray['ParentPagerAttendantHistory'] = ParentPagerAttendantHistory::GetSoapComplexTypeXml();
				ParentPagerIndividual::AlterSoapComplexTypeArray($strComplexTypeArray);
				ParentPagerStation::AlterSoapComplexTypeArray($strComplexTypeArray);
				ParentPagerPeriod::AlterSoapComplexTypeArray($strComplexTypeArray);
				ParentPagerProgram::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ParentPagerAttendantHistory::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ParentPagerAttendantHistory();
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
			if ((property_exists($objSoapObject, 'ParentPagerProgram')) &&
				($objSoapObject->ParentPagerProgram))
				$objToReturn->ParentPagerProgram = ParentPagerProgram::GetObjectFromSoapObject($objSoapObject->ParentPagerProgram);
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
				array_push($objArrayToReturn, ParentPagerAttendantHistory::GetSoapObjectFromObject($objObject, true));

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
			if ($objObject->objParentPagerProgram)
				$objObject->objParentPagerProgram = ParentPagerProgram::GetSoapObjectFromObject($objObject->objParentPagerProgram, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentPagerProgramId = null;
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
	 * @property-read QQNode $ParentPagerProgramId
	 * @property-read QQNodeParentPagerProgram $ParentPagerProgram
	 * @property-read QQNode $DateIn
	 * @property-read QQNode $DateOut
	 */
	class QQNodeParentPagerAttendantHistory extends QQNode {
		protected $strTableName = 'parent_pager_attendant_history';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerAttendantHistory';
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
				case 'ParentPagerProgramId':
					return new QQNode('parent_pager_program_id', 'ParentPagerProgramId', 'integer', $this);
				case 'ParentPagerProgram':
					return new QQNodeParentPagerProgram('parent_pager_program_id', 'ParentPagerProgram', 'integer', $this);
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
	 * @property-read QQNode $ParentPagerProgramId
	 * @property-read QQNodeParentPagerProgram $ParentPagerProgram
	 * @property-read QQNode $DateIn
	 * @property-read QQNode $DateOut
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeParentPagerAttendantHistory extends QQReverseReferenceNode {
		protected $strTableName = 'parent_pager_attendant_history';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerAttendantHistory';
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
				case 'ParentPagerProgramId':
					return new QQNode('parent_pager_program_id', 'ParentPagerProgramId', 'integer', $this);
				case 'ParentPagerProgram':
					return new QQNodeParentPagerProgram('parent_pager_program_id', 'ParentPagerProgram', 'integer', $this);
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