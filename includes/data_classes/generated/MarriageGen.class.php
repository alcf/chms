<?php
	/**
	 * The abstract MarriageGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Marriage subclass which
	 * extends this MarriageGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Marriage class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $LinkedMarriageId the value for intLinkedMarriageId (Unique)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property integer $MarriedToPersonId the value for intMarriedToPersonId 
	 * @property integer $MarriageStatusTypeId the value for intMarriageStatusTypeId (Not Null)
	 * @property QDateTime $DateStart the value for dttDateStart 
	 * @property QDateTime $DateEnd the value for dttDateEnd 
	 * @property Marriage $LinkedMarriage the value for the Marriage object referenced by intLinkedMarriageId (Unique)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property Person $MarriedToPerson the value for the Person object referenced by intMarriedToPersonId 
	 * @property Marriage $MarriageAsLinked the value for the Marriage object that uniquely references this Marriage
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class MarriageGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column marriage.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column marriage.linked_marriage_id
		 * @var integer intLinkedMarriageId
		 */
		protected $intLinkedMarriageId;
		const LinkedMarriageIdDefault = null;


		/**
		 * Protected member variable that maps to the database column marriage.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column marriage.married_to_person_id
		 * @var integer intMarriedToPersonId
		 */
		protected $intMarriedToPersonId;
		const MarriedToPersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column marriage.marriage_status_type_id
		 * @var integer intMarriageStatusTypeId
		 */
		protected $intMarriageStatusTypeId;
		const MarriageStatusTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column marriage.date_start
		 * @var QDateTime dttDateStart
		 */
		protected $dttDateStart;
		const DateStartDefault = null;


		/**
		 * Protected member variable that maps to the database column marriage.date_end
		 * @var QDateTime dttDateEnd
		 */
		protected $dttDateEnd;
		const DateEndDefault = null;


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
		 * in the database column marriage.linked_marriage_id.
		 *
		 * NOTE: Always use the LinkedMarriage property getter to correctly retrieve this Marriage object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Marriage objLinkedMarriage
		 */
		protected $objLinkedMarriage;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column marriage.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column marriage.married_to_person_id.
		 *
		 * NOTE: Always use the MarriedToPerson property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objMarriedToPerson
		 */
		protected $objMarriedToPerson;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column marriage.linked_marriage_id.
		 *
		 * NOTE: Always use the MarriageAsLinked property getter to correctly retrieve this Marriage object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Marriage objMarriageAsLinked
		 */
		protected $objMarriageAsLinked;
		
		/**
		 * Used internally to manage whether the adjoined MarriageAsLinked object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyMarriageAsLinked;





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
		 * Load a Marriage from PK Info
		 * @param integer $intId
		 * @return Marriage
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Marriage::QuerySingle(
				QQ::Equal(QQN::Marriage()->Id, $intId)
			);
		}

		/**
		 * Load all Marriages
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Marriage[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Marriage::QueryArray to perform the LoadAll query
			try {
				return Marriage::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Marriages
		 * @return int
		 */
		public static function CountAll() {
			// Call Marriage::QueryCount to perform the CountAll query
			return Marriage::QueryCount(QQ::All());
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
			$objDatabase = Marriage::GetDatabase();

			// Create/Build out the QueryBuilder object with Marriage-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'marriage');
			Marriage::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('marriage');

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
		 * Static Qcodo Query method to query for a single Marriage object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Marriage the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Marriage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Marriage object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Marriage::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Marriage::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Marriage objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Marriage[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Marriage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Marriage::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Marriage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Marriage objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Marriage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Marriage::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'marriage_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Marriage-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Marriage::GetSelectFields($objQueryBuilder);
				Marriage::GetFromFields($objQueryBuilder);

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
			return Marriage::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Marriage
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'marriage';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'linked_marriage_id', $strAliasPrefix . 'linked_marriage_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'married_to_person_id', $strAliasPrefix . 'married_to_person_id');
			$objBuilder->AddSelectItem($strTableName, 'marriage_status_type_id', $strAliasPrefix . 'marriage_status_type_id');
			$objBuilder->AddSelectItem($strTableName, 'date_start', $strAliasPrefix . 'date_start');
			$objBuilder->AddSelectItem($strTableName, 'date_end', $strAliasPrefix . 'date_end');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Marriage from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Marriage::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Marriage
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the Marriage object
			$objToReturn = new Marriage();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'linked_marriage_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'linked_marriage_id'] : $strAliasPrefix . 'linked_marriage_id';
			$objToReturn->intLinkedMarriageId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'married_to_person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'married_to_person_id'] : $strAliasPrefix . 'married_to_person_id';
			$objToReturn->intMarriedToPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'marriage_status_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'marriage_status_type_id'] : $strAliasPrefix . 'marriage_status_type_id';
			$objToReturn->intMarriageStatusTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_start', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_start'] : $strAliasPrefix . 'date_start';
			$objToReturn->dttDateStart = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_end', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_end'] : $strAliasPrefix . 'date_end';
			$objToReturn->dttDateEnd = $objDbRow->GetColumn($strAliasName, 'Date');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'marriage__';

			// Check for LinkedMarriage Early Binding
			$strAlias = $strAliasPrefix . 'linked_marriage_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objLinkedMarriage = Marriage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'linked_marriage_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for MarriedToPerson Early Binding
			$strAlias = $strAliasPrefix . 'married_to_person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objMarriedToPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'married_to_person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for MarriageAsLinked Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'marriageaslinked__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objMarriageAsLinked = Marriage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'marriageaslinked__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objMarriageAsLinked = false;
			}



			return $objToReturn;
		}

		/**
		 * Instantiate an array of Marriages from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Marriage[]
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
					$objItem = Marriage::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Marriage::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Marriage object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Marriage next row resulting from the query
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
			return Marriage::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Marriage object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Marriage
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Marriage::QuerySingle(
				QQ::Equal(QQN::Marriage()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single Marriage object,
		 * by LinkedMarriageId Index(es)
		 * @param integer $intLinkedMarriageId
		 * @return Marriage
		*/
		public static function LoadByLinkedMarriageId($intLinkedMarriageId, $objOptionalClauses = null) {
			return Marriage::QuerySingle(
				QQ::Equal(QQN::Marriage()->LinkedMarriageId, $intLinkedMarriageId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Marriage objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Marriage[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call Marriage::QueryArray to perform the LoadArrayByPersonId query
			try {
				return Marriage::QueryArray(
					QQ::Equal(QQN::Marriage()->PersonId, $intPersonId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Marriages
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call Marriage::QueryCount to perform the CountByPersonId query
			return Marriage::QueryCount(
				QQ::Equal(QQN::Marriage()->PersonId, $intPersonId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Marriage objects,
		 * by MarriedToPersonId Index(es)
		 * @param integer $intMarriedToPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Marriage[]
		*/
		public static function LoadArrayByMarriedToPersonId($intMarriedToPersonId, $objOptionalClauses = null) {
			// Call Marriage::QueryArray to perform the LoadArrayByMarriedToPersonId query
			try {
				return Marriage::QueryArray(
					QQ::Equal(QQN::Marriage()->MarriedToPersonId, $intMarriedToPersonId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Marriages
		 * by MarriedToPersonId Index(es)
		 * @param integer $intMarriedToPersonId
		 * @return int
		*/
		public static function CountByMarriedToPersonId($intMarriedToPersonId, $objOptionalClauses = null) {
			// Call Marriage::QueryCount to perform the CountByMarriedToPersonId query
			return Marriage::QueryCount(
				QQ::Equal(QQN::Marriage()->MarriedToPersonId, $intMarriedToPersonId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Marriage objects,
		 * by MarriageStatusTypeId Index(es)
		 * @param integer $intMarriageStatusTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Marriage[]
		*/
		public static function LoadArrayByMarriageStatusTypeId($intMarriageStatusTypeId, $objOptionalClauses = null) {
			// Call Marriage::QueryArray to perform the LoadArrayByMarriageStatusTypeId query
			try {
				return Marriage::QueryArray(
					QQ::Equal(QQN::Marriage()->MarriageStatusTypeId, $intMarriageStatusTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Marriages
		 * by MarriageStatusTypeId Index(es)
		 * @param integer $intMarriageStatusTypeId
		 * @return int
		*/
		public static function CountByMarriageStatusTypeId($intMarriageStatusTypeId, $objOptionalClauses = null) {
			// Call Marriage::QueryCount to perform the CountByMarriageStatusTypeId query
			return Marriage::QueryCount(
				QQ::Equal(QQN::Marriage()->MarriageStatusTypeId, $intMarriageStatusTypeId)
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
		 * Save this Marriage
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Marriage::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `marriage` (
							`linked_marriage_id`,
							`person_id`,
							`married_to_person_id`,
							`marriage_status_type_id`,
							`date_start`,
							`date_end`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intLinkedMarriageId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intMarriedToPersonId) . ',
							' . $objDatabase->SqlVariable($this->intMarriageStatusTypeId) . ',
							' . $objDatabase->SqlVariable($this->dttDateStart) . ',
							' . $objDatabase->SqlVariable($this->dttDateEnd) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('marriage', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`marriage`
						SET
							`linked_marriage_id` = ' . $objDatabase->SqlVariable($this->intLinkedMarriageId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`married_to_person_id` = ' . $objDatabase->SqlVariable($this->intMarriedToPersonId) . ',
							`marriage_status_type_id` = ' . $objDatabase->SqlVariable($this->intMarriageStatusTypeId) . ',
							`date_start` = ' . $objDatabase->SqlVariable($this->dttDateStart) . ',
							`date_end` = ' . $objDatabase->SqlVariable($this->dttDateEnd) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined MarriageAsLinked object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyMarriageAsLinked) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = Marriage::LoadByLinkedMarriageId($this->intId)) {
						$objAssociated->LinkedMarriageId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objMarriageAsLinked) {
						$this->objMarriageAsLinked->LinkedMarriageId = $this->intId;
						$this->objMarriageAsLinked->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyMarriageAsLinked = false;
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
		 * Delete this Marriage
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Marriage with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Marriage::GetDatabase();

			
			
			// Update the adjoined MarriageAsLinked object (if applicable) and perform the unassociation

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = Marriage::LoadByLinkedMarriageId($this->intId)) {
				$objAssociated->LinkedMarriageId = null;
				$objAssociated->Save();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`marriage`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Marriages
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Marriage::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`marriage`');
		}

		/**
		 * Truncate marriage table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Marriage::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `marriage`');
		}

		/**
		 * Reload this Marriage from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Marriage object.');

			// Reload the Object
			$objReloaded = Marriage::Load($this->intId);

			// Update $this's local variables to match
			$this->LinkedMarriageId = $objReloaded->LinkedMarriageId;
			$this->PersonId = $objReloaded->PersonId;
			$this->MarriedToPersonId = $objReloaded->MarriedToPersonId;
			$this->MarriageStatusTypeId = $objReloaded->MarriageStatusTypeId;
			$this->dttDateStart = $objReloaded->dttDateStart;
			$this->dttDateEnd = $objReloaded->dttDateEnd;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Marriage::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `marriage` (
					`id`,
					`linked_marriage_id`,
					`person_id`,
					`married_to_person_id`,
					`marriage_status_type_id`,
					`date_start`,
					`date_end`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intLinkedMarriageId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->intMarriedToPersonId) . ',
					' . $objDatabase->SqlVariable($this->intMarriageStatusTypeId) . ',
					' . $objDatabase->SqlVariable($this->dttDateStart) . ',
					' . $objDatabase->SqlVariable($this->dttDateEnd) . ',
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
		 * @return Marriage[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Marriage::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM marriage WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Marriage::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Marriage[]
		 */
		public function GetJournal() {
			return Marriage::GetJournalForId($this->intId);
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

				case 'LinkedMarriageId':
					// Gets the value for intLinkedMarriageId (Unique)
					// @return integer
					return $this->intLinkedMarriageId;

				case 'PersonId':
					// Gets the value for intPersonId (Not Null)
					// @return integer
					return $this->intPersonId;

				case 'MarriedToPersonId':
					// Gets the value for intMarriedToPersonId 
					// @return integer
					return $this->intMarriedToPersonId;

				case 'MarriageStatusTypeId':
					// Gets the value for intMarriageStatusTypeId (Not Null)
					// @return integer
					return $this->intMarriageStatusTypeId;

				case 'DateStart':
					// Gets the value for dttDateStart 
					// @return QDateTime
					return $this->dttDateStart;

				case 'DateEnd':
					// Gets the value for dttDateEnd 
					// @return QDateTime
					return $this->dttDateEnd;


				///////////////////
				// Member Objects
				///////////////////
				case 'LinkedMarriage':
					// Gets the value for the Marriage object referenced by intLinkedMarriageId (Unique)
					// @return Marriage
					try {
						if ((!$this->objLinkedMarriage) && (!is_null($this->intLinkedMarriageId)))
							$this->objLinkedMarriage = Marriage::Load($this->intLinkedMarriageId);
						return $this->objLinkedMarriage;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'MarriedToPerson':
					// Gets the value for the Person object referenced by intMarriedToPersonId 
					// @return Person
					try {
						if ((!$this->objMarriedToPerson) && (!is_null($this->intMarriedToPersonId)))
							$this->objMarriedToPerson = Person::Load($this->intMarriedToPersonId);
						return $this->objMarriedToPerson;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'MarriageAsLinked':
					// Gets the value for the Marriage object that uniquely references this Marriage
					// by objMarriageAsLinked (Unique)
					// @return Marriage
					try {
						if ($this->objMarriageAsLinked === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objMarriageAsLinked)
							$this->objMarriageAsLinked = Marriage::LoadByLinkedMarriageId($this->intId);
						return $this->objMarriageAsLinked;
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
				case 'LinkedMarriageId':
					// Sets the value for intLinkedMarriageId (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objLinkedMarriage = null;
						return ($this->intLinkedMarriageId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'MarriedToPersonId':
					// Sets the value for intMarriedToPersonId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objMarriedToPerson = null;
						return ($this->intMarriedToPersonId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MarriageStatusTypeId':
					// Sets the value for intMarriageStatusTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intMarriageStatusTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateStart':
					// Sets the value for dttDateStart 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateStart = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateEnd':
					// Sets the value for dttDateEnd 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateEnd = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'LinkedMarriage':
					// Sets the value for the Marriage object referenced by intLinkedMarriageId (Unique)
					// @param Marriage $mixValue
					// @return Marriage
					if (is_null($mixValue)) {
						$this->intLinkedMarriageId = null;
						$this->objLinkedMarriage = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Marriage object
						try {
							$mixValue = QType::Cast($mixValue, 'Marriage');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Marriage object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved LinkedMarriage for this Marriage');

						// Update Local Member Variables
						$this->objLinkedMarriage = $mixValue;
						$this->intLinkedMarriageId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
							throw new QCallerException('Unable to set an unsaved Person for this Marriage');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'MarriedToPerson':
					// Sets the value for the Person object referenced by intMarriedToPersonId 
					// @param Person $mixValue
					// @return Person
					if (is_null($mixValue)) {
						$this->intMarriedToPersonId = null;
						$this->objMarriedToPerson = null;
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
							throw new QCallerException('Unable to set an unsaved MarriedToPerson for this Marriage');

						// Update Local Member Variables
						$this->objMarriedToPerson = $mixValue;
						$this->intMarriedToPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'MarriageAsLinked':
					// Sets the value for the Marriage object referenced by objMarriageAsLinked (Unique)
					// @param Marriage $mixValue
					// @return Marriage
					if (is_null($mixValue)) {
						$this->objMarriageAsLinked = null;

						// Make sure we update the adjoined Marriage object the next time we call Save()
						$this->blnDirtyMarriageAsLinked = true;

						return null;
					} else {
						// Make sure $mixValue actually is a Marriage object
						try {
							$mixValue = QType::Cast($mixValue, 'Marriage');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objMarriageAsLinked to a DIFFERENT $mixValue?
						if ((!$this->MarriageAsLinked) || ($this->MarriageAsLinked->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined Marriage object the next time we call Save()
							$this->blnDirtyMarriageAsLinked = true;

							// Update Local Member Variable
							$this->objMarriageAsLinked = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

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
			$strToReturn = '<complexType name="Marriage"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="LinkedMarriage" type="xsd1:Marriage"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="MarriedToPerson" type="xsd1:Person"/>';
			$strToReturn .= '<element name="MarriageStatusTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="DateStart" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateEnd" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Marriage', $strComplexTypeArray)) {
				$strComplexTypeArray['Marriage'] = Marriage::GetSoapComplexTypeXml();
				Marriage::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Marriage::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Marriage();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'LinkedMarriage')) &&
				($objSoapObject->LinkedMarriage))
				$objToReturn->LinkedMarriage = Marriage::GetObjectFromSoapObject($objSoapObject->LinkedMarriage);
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if ((property_exists($objSoapObject, 'MarriedToPerson')) &&
				($objSoapObject->MarriedToPerson))
				$objToReturn->MarriedToPerson = Person::GetObjectFromSoapObject($objSoapObject->MarriedToPerson);
			if (property_exists($objSoapObject, 'MarriageStatusTypeId'))
				$objToReturn->intMarriageStatusTypeId = $objSoapObject->MarriageStatusTypeId;
			if (property_exists($objSoapObject, 'DateStart'))
				$objToReturn->dttDateStart = new QDateTime($objSoapObject->DateStart);
			if (property_exists($objSoapObject, 'DateEnd'))
				$objToReturn->dttDateEnd = new QDateTime($objSoapObject->DateEnd);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Marriage::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objLinkedMarriage)
				$objObject->objLinkedMarriage = Marriage::GetSoapObjectFromObject($objObject->objLinkedMarriage, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intLinkedMarriageId = null;
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->objMarriedToPerson)
				$objObject->objMarriedToPerson = Person::GetSoapObjectFromObject($objObject->objMarriedToPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intMarriedToPersonId = null;
			if ($objObject->dttDateStart)
				$objObject->dttDateStart = $objObject->dttDateStart->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateEnd)
				$objObject->dttDateEnd = $objObject->dttDateEnd->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $LinkedMarriageId
	 * @property-read QQNodeMarriage $LinkedMarriage
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $MarriedToPersonId
	 * @property-read QQNodePerson $MarriedToPerson
	 * @property-read QQNode $MarriageStatusTypeId
	 * @property-read QQNode $DateStart
	 * @property-read QQNode $DateEnd
	 * @property-read QQReverseReferenceNodeMarriage $MarriageAsLinked
	 */
	class QQNodeMarriage extends QQNode {
		protected $strTableName = 'marriage';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Marriage';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'LinkedMarriageId':
					return new QQNode('linked_marriage_id', 'LinkedMarriageId', 'integer', $this);
				case 'LinkedMarriage':
					return new QQNodeMarriage('linked_marriage_id', 'LinkedMarriage', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'MarriedToPersonId':
					return new QQNode('married_to_person_id', 'MarriedToPersonId', 'integer', $this);
				case 'MarriedToPerson':
					return new QQNodePerson('married_to_person_id', 'MarriedToPerson', 'integer', $this);
				case 'MarriageStatusTypeId':
					return new QQNode('marriage_status_type_id', 'MarriageStatusTypeId', 'integer', $this);
				case 'DateStart':
					return new QQNode('date_start', 'DateStart', 'QDateTime', $this);
				case 'DateEnd':
					return new QQNode('date_end', 'DateEnd', 'QDateTime', $this);
				case 'MarriageAsLinked':
					return new QQReverseReferenceNodeMarriage($this, 'marriageaslinked', 'reverse_reference', 'linked_marriage_id', 'MarriageAsLinked');

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
	 * @property-read QQNode $LinkedMarriageId
	 * @property-read QQNodeMarriage $LinkedMarriage
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $MarriedToPersonId
	 * @property-read QQNodePerson $MarriedToPerson
	 * @property-read QQNode $MarriageStatusTypeId
	 * @property-read QQNode $DateStart
	 * @property-read QQNode $DateEnd
	 * @property-read QQReverseReferenceNodeMarriage $MarriageAsLinked
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeMarriage extends QQReverseReferenceNode {
		protected $strTableName = 'marriage';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Marriage';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'LinkedMarriageId':
					return new QQNode('linked_marriage_id', 'LinkedMarriageId', 'integer', $this);
				case 'LinkedMarriage':
					return new QQNodeMarriage('linked_marriage_id', 'LinkedMarriage', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'MarriedToPersonId':
					return new QQNode('married_to_person_id', 'MarriedToPersonId', 'integer', $this);
				case 'MarriedToPerson':
					return new QQNodePerson('married_to_person_id', 'MarriedToPerson', 'integer', $this);
				case 'MarriageStatusTypeId':
					return new QQNode('marriage_status_type_id', 'MarriageStatusTypeId', 'integer', $this);
				case 'DateStart':
					return new QQNode('date_start', 'DateStart', 'QDateTime', $this);
				case 'DateEnd':
					return new QQNode('date_end', 'DateEnd', 'QDateTime', $this);
				case 'MarriageAsLinked':
					return new QQReverseReferenceNodeMarriage($this, 'marriageaslinked', 'reverse_reference', 'linked_marriage_id', 'MarriageAsLinked');

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