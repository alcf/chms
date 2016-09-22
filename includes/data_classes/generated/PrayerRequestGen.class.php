<?php
	/**
	 * The abstract PrayerRequestGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the PrayerRequest subclass which
	 * extends this PrayerRequestGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PrayerRequest class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Name the value for strName 
	 * @property string $Email the value for strEmail 
	 * @property string $Subject the value for strSubject 
	 * @property string $Content the value for strContent 
	 * @property boolean $IsConfidential the value for blnIsConfidential 
	 * @property boolean $IsInappropriate the value for blnIsInappropriate 
	 * @property boolean $IsAllowNotes the value for blnIsAllowNotes 
	 * @property boolean $IsPrayerIndicator the value for blnIsPrayerIndicator 
	 * @property integer $PrayerCount the value for intPrayerCount 
	 * @property QDateTime $Date the value for dttDate 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PrayerRequestGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column prayer_request.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column prayer_request.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 40;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column prayer_request.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 255;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column prayer_request.subject
		 * @var string strSubject
		 */
		protected $strSubject;
		const SubjectMaxLength = 255;
		const SubjectDefault = null;


		/**
		 * Protected member variable that maps to the database column prayer_request.content
		 * @var string strContent
		 */
		protected $strContent;
		const ContentDefault = null;


		/**
		 * Protected member variable that maps to the database column prayer_request.is_confidential
		 * @var boolean blnIsConfidential
		 */
		protected $blnIsConfidential;
		const IsConfidentialDefault = null;


		/**
		 * Protected member variable that maps to the database column prayer_request.is_inappropriate
		 * @var boolean blnIsInappropriate
		 */
		protected $blnIsInappropriate;
		const IsInappropriateDefault = null;


		/**
		 * Protected member variable that maps to the database column prayer_request.is_allow_notes
		 * @var boolean blnIsAllowNotes
		 */
		protected $blnIsAllowNotes;
		const IsAllowNotesDefault = null;


		/**
		 * Protected member variable that maps to the database column prayer_request.is_prayer_indicator
		 * @var boolean blnIsPrayerIndicator
		 */
		protected $blnIsPrayerIndicator;
		const IsPrayerIndicatorDefault = null;


		/**
		 * Protected member variable that maps to the database column prayer_request.prayer_count
		 * @var integer intPrayerCount
		 */
		protected $intPrayerCount;
		const PrayerCountDefault = null;


		/**
		 * Protected member variable that maps to the database column prayer_request.date
		 * @var QDateTime dttDate
		 */
		protected $dttDate;
		const DateDefault = null;


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
		 * Load a PrayerRequest from PK Info
		 * @param integer $intId
		 * @return PrayerRequest
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return PrayerRequest::QuerySingle(
				QQ::Equal(QQN::PrayerRequest()->Id, $intId)
			);
		}

		/**
		 * Load all PrayerRequests
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PrayerRequest[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call PrayerRequest::QueryArray to perform the LoadAll query
			try {
				return PrayerRequest::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all PrayerRequests
		 * @return int
		 */
		public static function CountAll() {
			// Call PrayerRequest::QueryCount to perform the CountAll query
			return PrayerRequest::QueryCount(QQ::All());
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
			$objDatabase = PrayerRequest::GetDatabase();

			// Create/Build out the QueryBuilder object with PrayerRequest-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'prayer_request');
			PrayerRequest::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('prayer_request');

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
		 * Static Qcodo Query method to query for a single PrayerRequest object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PrayerRequest the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PrayerRequest::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new PrayerRequest object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = PrayerRequest::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return PrayerRequest::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of PrayerRequest objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PrayerRequest[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PrayerRequest::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PrayerRequest::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = PrayerRequest::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of PrayerRequest objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PrayerRequest::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = PrayerRequest::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'prayer_request_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with PrayerRequest-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				PrayerRequest::GetSelectFields($objQueryBuilder);
				PrayerRequest::GetFromFields($objQueryBuilder);

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
			return PrayerRequest::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this PrayerRequest
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'prayer_request';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			$objBuilder->AddSelectItem($strTableName, 'subject', $strAliasPrefix . 'subject');
			$objBuilder->AddSelectItem($strTableName, 'content', $strAliasPrefix . 'content');
			$objBuilder->AddSelectItem($strTableName, 'is_confidential', $strAliasPrefix . 'is_confidential');
			$objBuilder->AddSelectItem($strTableName, 'is_inappropriate', $strAliasPrefix . 'is_inappropriate');
			$objBuilder->AddSelectItem($strTableName, 'is_allow_notes', $strAliasPrefix . 'is_allow_notes');
			$objBuilder->AddSelectItem($strTableName, 'is_prayer_indicator', $strAliasPrefix . 'is_prayer_indicator');
			$objBuilder->AddSelectItem($strTableName, 'prayer_count', $strAliasPrefix . 'prayer_count');
			$objBuilder->AddSelectItem($strTableName, 'date', $strAliasPrefix . 'date');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a PrayerRequest from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this PrayerRequest::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return PrayerRequest
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the PrayerRequest object
			$objToReturn = new PrayerRequest();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'subject', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'subject'] : $strAliasPrefix . 'subject';
			$objToReturn->strSubject = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'content', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'content'] : $strAliasPrefix . 'content';
			$objToReturn->strContent = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'is_confidential', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'is_confidential'] : $strAliasPrefix . 'is_confidential';
			$objToReturn->blnIsConfidential = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'is_inappropriate', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'is_inappropriate'] : $strAliasPrefix . 'is_inappropriate';
			$objToReturn->blnIsInappropriate = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'is_allow_notes', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'is_allow_notes'] : $strAliasPrefix . 'is_allow_notes';
			$objToReturn->blnIsAllowNotes = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'is_prayer_indicator', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'is_prayer_indicator'] : $strAliasPrefix . 'is_prayer_indicator';
			$objToReturn->blnIsPrayerIndicator = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'prayer_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'prayer_count'] : $strAliasPrefix . 'prayer_count';
			$objToReturn->intPrayerCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date'] : $strAliasPrefix . 'date';
			$objToReturn->dttDate = $objDbRow->GetColumn($strAliasName, 'Date');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'prayer_request__';




			return $objToReturn;
		}

		/**
		 * Instantiate an array of PrayerRequests from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return PrayerRequest[]
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
					$objItem = PrayerRequest::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = PrayerRequest::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single PrayerRequest object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return PrayerRequest next row resulting from the query
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
			return PrayerRequest::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single PrayerRequest object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return PrayerRequest
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return PrayerRequest::QuerySingle(
				QQ::Equal(QQN::PrayerRequest()->Id, $intId)
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
		 * Save this PrayerRequest
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = PrayerRequest::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `prayer_request` (
							`name`,
							`email`,
							`subject`,
							`content`,
							`is_confidential`,
							`is_inappropriate`,
							`is_allow_notes`,
							`is_prayer_indicator`,
							`prayer_count`,
							`date`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strSubject) . ',
							' . $objDatabase->SqlVariable($this->strContent) . ',
							' . $objDatabase->SqlVariable($this->blnIsConfidential) . ',
							' . $objDatabase->SqlVariable($this->blnIsInappropriate) . ',
							' . $objDatabase->SqlVariable($this->blnIsAllowNotes) . ',
							' . $objDatabase->SqlVariable($this->blnIsPrayerIndicator) . ',
							' . $objDatabase->SqlVariable($this->intPrayerCount) . ',
							' . $objDatabase->SqlVariable($this->dttDate) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('prayer_request', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`prayer_request`
						SET
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`subject` = ' . $objDatabase->SqlVariable($this->strSubject) . ',
							`content` = ' . $objDatabase->SqlVariable($this->strContent) . ',
							`is_confidential` = ' . $objDatabase->SqlVariable($this->blnIsConfidential) . ',
							`is_inappropriate` = ' . $objDatabase->SqlVariable($this->blnIsInappropriate) . ',
							`is_allow_notes` = ' . $objDatabase->SqlVariable($this->blnIsAllowNotes) . ',
							`is_prayer_indicator` = ' . $objDatabase->SqlVariable($this->blnIsPrayerIndicator) . ',
							`prayer_count` = ' . $objDatabase->SqlVariable($this->intPrayerCount) . ',
							`date` = ' . $objDatabase->SqlVariable($this->dttDate) . '
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
		 * Delete this PrayerRequest
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this PrayerRequest with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = PrayerRequest::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`prayer_request`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all PrayerRequests
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = PrayerRequest::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`prayer_request`');
		}

		/**
		 * Truncate prayer_request table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = PrayerRequest::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `prayer_request`');
		}

		/**
		 * Reload this PrayerRequest from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved PrayerRequest object.');

			// Reload the Object
			$objReloaded = PrayerRequest::Load($this->intId);

			// Update $this's local variables to match
			$this->strName = $objReloaded->strName;
			$this->strEmail = $objReloaded->strEmail;
			$this->strSubject = $objReloaded->strSubject;
			$this->strContent = $objReloaded->strContent;
			$this->blnIsConfidential = $objReloaded->blnIsConfidential;
			$this->blnIsInappropriate = $objReloaded->blnIsInappropriate;
			$this->blnIsAllowNotes = $objReloaded->blnIsAllowNotes;
			$this->blnIsPrayerIndicator = $objReloaded->blnIsPrayerIndicator;
			$this->intPrayerCount = $objReloaded->intPrayerCount;
			$this->dttDate = $objReloaded->dttDate;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = PrayerRequest::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `prayer_request` (
					`id`,
					`name`,
					`email`,
					`subject`,
					`content`,
					`is_confidential`,
					`is_inappropriate`,
					`is_allow_notes`,
					`is_prayer_indicator`,
					`prayer_count`,
					`date`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->strEmail) . ',
					' . $objDatabase->SqlVariable($this->strSubject) . ',
					' . $objDatabase->SqlVariable($this->strContent) . ',
					' . $objDatabase->SqlVariable($this->blnIsConfidential) . ',
					' . $objDatabase->SqlVariable($this->blnIsInappropriate) . ',
					' . $objDatabase->SqlVariable($this->blnIsAllowNotes) . ',
					' . $objDatabase->SqlVariable($this->blnIsPrayerIndicator) . ',
					' . $objDatabase->SqlVariable($this->intPrayerCount) . ',
					' . $objDatabase->SqlVariable($this->dttDate) . ',
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
		 * @return PrayerRequest[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = PrayerRequest::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM prayer_request WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return PrayerRequest::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return PrayerRequest[]
		 */
		public function GetJournal() {
			return PrayerRequest::GetJournalForId($this->intId);
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

				case 'Email':
					// Gets the value for strEmail 
					// @return string
					return $this->strEmail;

				case 'Subject':
					// Gets the value for strSubject 
					// @return string
					return $this->strSubject;

				case 'Content':
					// Gets the value for strContent 
					// @return string
					return $this->strContent;

				case 'IsConfidential':
					// Gets the value for blnIsConfidential 
					// @return boolean
					return $this->blnIsConfidential;

				case 'IsInappropriate':
					// Gets the value for blnIsInappropriate 
					// @return boolean
					return $this->blnIsInappropriate;

				case 'IsAllowNotes':
					// Gets the value for blnIsAllowNotes 
					// @return boolean
					return $this->blnIsAllowNotes;

				case 'IsPrayerIndicator':
					// Gets the value for blnIsPrayerIndicator 
					// @return boolean
					return $this->blnIsPrayerIndicator;

				case 'PrayerCount':
					// Gets the value for intPrayerCount 
					// @return integer
					return $this->intPrayerCount;

				case 'Date':
					// Gets the value for dttDate 
					// @return QDateTime
					return $this->dttDate;


				///////////////////
				// Member Objects
				///////////////////

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

				case 'Email':
					// Sets the value for strEmail 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Subject':
					// Sets the value for strSubject 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strSubject = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Content':
					// Sets the value for strContent 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strContent = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IsConfidential':
					// Sets the value for blnIsConfidential 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnIsConfidential = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IsInappropriate':
					// Sets the value for blnIsInappropriate 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnIsInappropriate = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IsAllowNotes':
					// Sets the value for blnIsAllowNotes 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnIsAllowNotes = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IsPrayerIndicator':
					// Sets the value for blnIsPrayerIndicator 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnIsPrayerIndicator = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrayerCount':
					// Sets the value for intPrayerCount 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intPrayerCount = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Date':
					// Sets the value for dttDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDate = QType::Cast($mixValue, QType::DateTime));
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





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="PrayerRequest"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="Subject" type="xsd:string"/>';
			$strToReturn .= '<element name="Content" type="xsd:string"/>';
			$strToReturn .= '<element name="IsConfidential" type="xsd:boolean"/>';
			$strToReturn .= '<element name="IsInappropriate" type="xsd:boolean"/>';
			$strToReturn .= '<element name="IsAllowNotes" type="xsd:boolean"/>';
			$strToReturn .= '<element name="IsPrayerIndicator" type="xsd:boolean"/>';
			$strToReturn .= '<element name="PrayerCount" type="xsd:int"/>';
			$strToReturn .= '<element name="Date" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('PrayerRequest', $strComplexTypeArray)) {
				$strComplexTypeArray['PrayerRequest'] = PrayerRequest::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, PrayerRequest::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new PrayerRequest();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'Subject'))
				$objToReturn->strSubject = $objSoapObject->Subject;
			if (property_exists($objSoapObject, 'Content'))
				$objToReturn->strContent = $objSoapObject->Content;
			if (property_exists($objSoapObject, 'IsConfidential'))
				$objToReturn->blnIsConfidential = $objSoapObject->IsConfidential;
			if (property_exists($objSoapObject, 'IsInappropriate'))
				$objToReturn->blnIsInappropriate = $objSoapObject->IsInappropriate;
			if (property_exists($objSoapObject, 'IsAllowNotes'))
				$objToReturn->blnIsAllowNotes = $objSoapObject->IsAllowNotes;
			if (property_exists($objSoapObject, 'IsPrayerIndicator'))
				$objToReturn->blnIsPrayerIndicator = $objSoapObject->IsPrayerIndicator;
			if (property_exists($objSoapObject, 'PrayerCount'))
				$objToReturn->intPrayerCount = $objSoapObject->PrayerCount;
			if (property_exists($objSoapObject, 'Date'))
				$objToReturn->dttDate = new QDateTime($objSoapObject->Date);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, PrayerRequest::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttDate)
				$objObject->dttDate = $objObject->dttDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Name
	 * @property-read QQNode $Email
	 * @property-read QQNode $Subject
	 * @property-read QQNode $Content
	 * @property-read QQNode $IsConfidential
	 * @property-read QQNode $IsInappropriate
	 * @property-read QQNode $IsAllowNotes
	 * @property-read QQNode $IsPrayerIndicator
	 * @property-read QQNode $PrayerCount
	 * @property-read QQNode $Date
	 */
	class QQNodePrayerRequest extends QQNode {
		protected $strTableName = 'prayer_request';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PrayerRequest';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'Subject':
					return new QQNode('subject', 'Subject', 'string', $this);
				case 'Content':
					return new QQNode('content', 'Content', 'string', $this);
				case 'IsConfidential':
					return new QQNode('is_confidential', 'IsConfidential', 'boolean', $this);
				case 'IsInappropriate':
					return new QQNode('is_inappropriate', 'IsInappropriate', 'boolean', $this);
				case 'IsAllowNotes':
					return new QQNode('is_allow_notes', 'IsAllowNotes', 'boolean', $this);
				case 'IsPrayerIndicator':
					return new QQNode('is_prayer_indicator', 'IsPrayerIndicator', 'boolean', $this);
				case 'PrayerCount':
					return new QQNode('prayer_count', 'PrayerCount', 'integer', $this);
				case 'Date':
					return new QQNode('date', 'Date', 'QDateTime', $this);

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
	 * @property-read QQNode $Name
	 * @property-read QQNode $Email
	 * @property-read QQNode $Subject
	 * @property-read QQNode $Content
	 * @property-read QQNode $IsConfidential
	 * @property-read QQNode $IsInappropriate
	 * @property-read QQNode $IsAllowNotes
	 * @property-read QQNode $IsPrayerIndicator
	 * @property-read QQNode $PrayerCount
	 * @property-read QQNode $Date
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodePrayerRequest extends QQReverseReferenceNode {
		protected $strTableName = 'prayer_request';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PrayerRequest';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'Subject':
					return new QQNode('subject', 'Subject', 'string', $this);
				case 'Content':
					return new QQNode('content', 'Content', 'string', $this);
				case 'IsConfidential':
					return new QQNode('is_confidential', 'IsConfidential', 'boolean', $this);
				case 'IsInappropriate':
					return new QQNode('is_inappropriate', 'IsInappropriate', 'boolean', $this);
				case 'IsAllowNotes':
					return new QQNode('is_allow_notes', 'IsAllowNotes', 'boolean', $this);
				case 'IsPrayerIndicator':
					return new QQNode('is_prayer_indicator', 'IsPrayerIndicator', 'boolean', $this);
				case 'PrayerCount':
					return new QQNode('prayer_count', 'PrayerCount', 'integer', $this);
				case 'Date':
					return new QQNode('date', 'Date', 'QDateTime', $this);

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