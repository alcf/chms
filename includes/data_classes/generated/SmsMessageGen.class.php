<?php
	/**
	 * The abstract SmsMessageGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SmsMessage subclass which
	 * extends this SmsMessageGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SmsMessage class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $GroupId the value for intGroupId (Not Null)
	 * @property integer $LoginId the value for intLoginId (Not Null)
	 * @property string $Subject the value for strSubject 
	 * @property string $Body the value for strBody 
	 * @property QDateTime $DateQueued the value for dttDateQueued (Not Null)
	 * @property QDateTime $DateSent the value for dttDateSent 
	 * @property Group $Group the value for the Group object referenced by intGroupId (Not Null)
	 * @property Login $Login the value for the Login object referenced by intLoginId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SmsMessageGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column sms_message.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column sms_message.group_id
		 * @var integer intGroupId
		 */
		protected $intGroupId;
		const GroupIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sms_message.login_id
		 * @var integer intLoginId
		 */
		protected $intLoginId;
		const LoginIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sms_message.subject
		 * @var string strSubject
		 */
		protected $strSubject;
		const SubjectMaxLength = 100;
		const SubjectDefault = null;


		/**
		 * Protected member variable that maps to the database column sms_message.body
		 * @var string strBody
		 */
		protected $strBody;
		const BodyMaxLength = 200;
		const BodyDefault = null;


		/**
		 * Protected member variable that maps to the database column sms_message.date_queued
		 * @var QDateTime dttDateQueued
		 */
		protected $dttDateQueued;
		const DateQueuedDefault = null;


		/**
		 * Protected member variable that maps to the database column sms_message.date_sent
		 * @var QDateTime dttDateSent
		 */
		protected $dttDateSent;
		const DateSentDefault = null;


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
		 * in the database column sms_message.group_id.
		 *
		 * NOTE: Always use the Group property getter to correctly retrieve this Group object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Group objGroup
		 */
		protected $objGroup;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sms_message.login_id.
		 *
		 * NOTE: Always use the Login property getter to correctly retrieve this Login object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Login objLogin
		 */
		protected $objLogin;





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
		 * Load a SmsMessage from PK Info
		 * @param integer $intId
		 * @return SmsMessage
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return SmsMessage::QuerySingle(
				QQ::Equal(QQN::SmsMessage()->Id, $intId)
			);
		}

		/**
		 * Load all SmsMessages
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SmsMessage[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call SmsMessage::QueryArray to perform the LoadAll query
			try {
				return SmsMessage::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SmsMessages
		 * @return int
		 */
		public static function CountAll() {
			// Call SmsMessage::QueryCount to perform the CountAll query
			return SmsMessage::QueryCount(QQ::All());
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
			$objDatabase = SmsMessage::GetDatabase();

			// Create/Build out the QueryBuilder object with SmsMessage-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'sms_message');
			SmsMessage::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('sms_message');

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
		 * Static Qcodo Query method to query for a single SmsMessage object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SmsMessage the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SmsMessage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new SmsMessage object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SmsMessage::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return SmsMessage::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of SmsMessage objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SmsMessage[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SmsMessage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SmsMessage::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = SmsMessage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of SmsMessage objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SmsMessage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = SmsMessage::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'sms_message_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with SmsMessage-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				SmsMessage::GetSelectFields($objQueryBuilder);
				SmsMessage::GetFromFields($objQueryBuilder);

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
			return SmsMessage::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SmsMessage
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'sms_message';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'group_id', $strAliasPrefix . 'group_id');
			$objBuilder->AddSelectItem($strTableName, 'login_id', $strAliasPrefix . 'login_id');
			$objBuilder->AddSelectItem($strTableName, 'subject', $strAliasPrefix . 'subject');
			$objBuilder->AddSelectItem($strTableName, 'body', $strAliasPrefix . 'body');
			$objBuilder->AddSelectItem($strTableName, 'date_queued', $strAliasPrefix . 'date_queued');
			$objBuilder->AddSelectItem($strTableName, 'date_sent', $strAliasPrefix . 'date_sent');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a SmsMessage from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SmsMessage::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return SmsMessage
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the SmsMessage object
			$objToReturn = new SmsMessage();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'group_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'group_id'] : $strAliasPrefix . 'group_id';
			$objToReturn->intGroupId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'login_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'login_id'] : $strAliasPrefix . 'login_id';
			$objToReturn->intLoginId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'subject', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'subject'] : $strAliasPrefix . 'subject';
			$objToReturn->strSubject = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'body', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'body'] : $strAliasPrefix . 'body';
			$objToReturn->strBody = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_queued', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_queued'] : $strAliasPrefix . 'date_queued';
			$objToReturn->dttDateQueued = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_sent', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_sent'] : $strAliasPrefix . 'date_sent';
			$objToReturn->dttDateSent = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'sms_message__';

			// Check for Group Early Binding
			$strAlias = $strAliasPrefix . 'group_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objGroup = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'group_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Login Early Binding
			$strAlias = $strAliasPrefix . 'login_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objLogin = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'login_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of SmsMessages from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return SmsMessage[]
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
					$objItem = SmsMessage::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SmsMessage::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single SmsMessage object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return SmsMessage next row resulting from the query
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
			return SmsMessage::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single SmsMessage object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return SmsMessage
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return SmsMessage::QuerySingle(
				QQ::Equal(QQN::SmsMessage()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SmsMessage objects,
		 * by GroupId Index(es)
		 * @param integer $intGroupId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SmsMessage[]
		*/
		public static function LoadArrayByGroupId($intGroupId, $objOptionalClauses = null) {
			// Call SmsMessage::QueryArray to perform the LoadArrayByGroupId query
			try {
				return SmsMessage::QueryArray(
					QQ::Equal(QQN::SmsMessage()->GroupId, $intGroupId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SmsMessages
		 * by GroupId Index(es)
		 * @param integer $intGroupId
		 * @return int
		*/
		public static function CountByGroupId($intGroupId, $objOptionalClauses = null) {
			// Call SmsMessage::QueryCount to perform the CountByGroupId query
			return SmsMessage::QueryCount(
				QQ::Equal(QQN::SmsMessage()->GroupId, $intGroupId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SmsMessage objects,
		 * by LoginId Index(es)
		 * @param integer $intLoginId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SmsMessage[]
		*/
		public static function LoadArrayByLoginId($intLoginId, $objOptionalClauses = null) {
			// Call SmsMessage::QueryArray to perform the LoadArrayByLoginId query
			try {
				return SmsMessage::QueryArray(
					QQ::Equal(QQN::SmsMessage()->LoginId, $intLoginId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SmsMessages
		 * by LoginId Index(es)
		 * @param integer $intLoginId
		 * @return int
		*/
		public static function CountByLoginId($intLoginId, $objOptionalClauses = null) {
			// Call SmsMessage::QueryCount to perform the CountByLoginId query
			return SmsMessage::QueryCount(
				QQ::Equal(QQN::SmsMessage()->LoginId, $intLoginId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SmsMessage objects,
		 * by DateSent Index(es)
		 * @param QDateTime $dttDateSent
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SmsMessage[]
		*/
		public static function LoadArrayByDateSent($dttDateSent, $objOptionalClauses = null) {
			// Call SmsMessage::QueryArray to perform the LoadArrayByDateSent query
			try {
				return SmsMessage::QueryArray(
					QQ::Equal(QQN::SmsMessage()->DateSent, $dttDateSent),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SmsMessages
		 * by DateSent Index(es)
		 * @param QDateTime $dttDateSent
		 * @return int
		*/
		public static function CountByDateSent($dttDateSent, $objOptionalClauses = null) {
			// Call SmsMessage::QueryCount to perform the CountByDateSent query
			return SmsMessage::QueryCount(
				QQ::Equal(QQN::SmsMessage()->DateSent, $dttDateSent)
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
		 * Save this SmsMessage
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SmsMessage::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `sms_message` (
							`group_id`,
							`login_id`,
							`subject`,
							`body`,
							`date_queued`,
							`date_sent`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intGroupId) . ',
							' . $objDatabase->SqlVariable($this->intLoginId) . ',
							' . $objDatabase->SqlVariable($this->strSubject) . ',
							' . $objDatabase->SqlVariable($this->strBody) . ',
							' . $objDatabase->SqlVariable($this->dttDateQueued) . ',
							' . $objDatabase->SqlVariable($this->dttDateSent) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('sms_message', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`sms_message`
						SET
							`group_id` = ' . $objDatabase->SqlVariable($this->intGroupId) . ',
							`login_id` = ' . $objDatabase->SqlVariable($this->intLoginId) . ',
							`subject` = ' . $objDatabase->SqlVariable($this->strSubject) . ',
							`body` = ' . $objDatabase->SqlVariable($this->strBody) . ',
							`date_queued` = ' . $objDatabase->SqlVariable($this->dttDateQueued) . ',
							`date_sent` = ' . $objDatabase->SqlVariable($this->dttDateSent) . '
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
		 * Delete this SmsMessage
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SmsMessage with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SmsMessage::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sms_message`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all SmsMessages
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SmsMessage::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sms_message`');
		}

		/**
		 * Truncate sms_message table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SmsMessage::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `sms_message`');
		}

		/**
		 * Reload this SmsMessage from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SmsMessage object.');

			// Reload the Object
			$objReloaded = SmsMessage::Load($this->intId);

			// Update $this's local variables to match
			$this->GroupId = $objReloaded->GroupId;
			$this->LoginId = $objReloaded->LoginId;
			$this->strSubject = $objReloaded->strSubject;
			$this->strBody = $objReloaded->strBody;
			$this->dttDateQueued = $objReloaded->dttDateQueued;
			$this->dttDateSent = $objReloaded->dttDateSent;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = SmsMessage::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `sms_message` (
					`id`,
					`group_id`,
					`login_id`,
					`subject`,
					`body`,
					`date_queued`,
					`date_sent`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intGroupId) . ',
					' . $objDatabase->SqlVariable($this->intLoginId) . ',
					' . $objDatabase->SqlVariable($this->strSubject) . ',
					' . $objDatabase->SqlVariable($this->strBody) . ',
					' . $objDatabase->SqlVariable($this->dttDateQueued) . ',
					' . $objDatabase->SqlVariable($this->dttDateSent) . ',
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
		 * @return SmsMessage[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = SmsMessage::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM sms_message WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return SmsMessage::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return SmsMessage[]
		 */
		public function GetJournal() {
			return SmsMessage::GetJournalForId($this->intId);
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

				case 'GroupId':
					// Gets the value for intGroupId (Not Null)
					// @return integer
					return $this->intGroupId;

				case 'LoginId':
					// Gets the value for intLoginId (Not Null)
					// @return integer
					return $this->intLoginId;

				case 'Subject':
					// Gets the value for strSubject 
					// @return string
					return $this->strSubject;

				case 'Body':
					// Gets the value for strBody 
					// @return string
					return $this->strBody;

				case 'DateQueued':
					// Gets the value for dttDateQueued (Not Null)
					// @return QDateTime
					return $this->dttDateQueued;

				case 'DateSent':
					// Gets the value for dttDateSent 
					// @return QDateTime
					return $this->dttDateSent;


				///////////////////
				// Member Objects
				///////////////////
				case 'Group':
					// Gets the value for the Group object referenced by intGroupId (Not Null)
					// @return Group
					try {
						if ((!$this->objGroup) && (!is_null($this->intGroupId)))
							$this->objGroup = Group::Load($this->intGroupId);
						return $this->objGroup;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Login':
					// Gets the value for the Login object referenced by intLoginId (Not Null)
					// @return Login
					try {
						if ((!$this->objLogin) && (!is_null($this->intLoginId)))
							$this->objLogin = Login::Load($this->intLoginId);
						return $this->objLogin;
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
				case 'GroupId':
					// Sets the value for intGroupId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objGroup = null;
						return ($this->intGroupId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LoginId':
					// Sets the value for intLoginId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objLogin = null;
						return ($this->intLoginId = QType::Cast($mixValue, QType::Integer));
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

				case 'Body':
					// Sets the value for strBody 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strBody = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateQueued':
					// Sets the value for dttDateQueued (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateQueued = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateSent':
					// Sets the value for dttDateSent 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateSent = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Group':
					// Sets the value for the Group object referenced by intGroupId (Not Null)
					// @param Group $mixValue
					// @return Group
					if (is_null($mixValue)) {
						$this->intGroupId = null;
						$this->objGroup = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Group object
						try {
							$mixValue = QType::Cast($mixValue, 'Group');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Group object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Group for this SmsMessage');

						// Update Local Member Variables
						$this->objGroup = $mixValue;
						$this->intGroupId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Login':
					// Sets the value for the Login object referenced by intLoginId (Not Null)
					// @param Login $mixValue
					// @return Login
					if (is_null($mixValue)) {
						$this->intLoginId = null;
						$this->objLogin = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Login object
						try {
							$mixValue = QType::Cast($mixValue, 'Login');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Login object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Login for this SmsMessage');

						// Update Local Member Variables
						$this->objLogin = $mixValue;
						$this->intLoginId = $mixValue->Id;

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
			$strToReturn = '<complexType name="SmsMessage"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Group" type="xsd1:Group"/>';
			$strToReturn .= '<element name="Login" type="xsd1:Login"/>';
			$strToReturn .= '<element name="Subject" type="xsd:string"/>';
			$strToReturn .= '<element name="Body" type="xsd:string"/>';
			$strToReturn .= '<element name="DateQueued" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateSent" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SmsMessage', $strComplexTypeArray)) {
				$strComplexTypeArray['SmsMessage'] = SmsMessage::GetSoapComplexTypeXml();
				Group::AlterSoapComplexTypeArray($strComplexTypeArray);
				Login::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SmsMessage::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SmsMessage();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Group')) &&
				($objSoapObject->Group))
				$objToReturn->Group = Group::GetObjectFromSoapObject($objSoapObject->Group);
			if ((property_exists($objSoapObject, 'Login')) &&
				($objSoapObject->Login))
				$objToReturn->Login = Login::GetObjectFromSoapObject($objSoapObject->Login);
			if (property_exists($objSoapObject, 'Subject'))
				$objToReturn->strSubject = $objSoapObject->Subject;
			if (property_exists($objSoapObject, 'Body'))
				$objToReturn->strBody = $objSoapObject->Body;
			if (property_exists($objSoapObject, 'DateQueued'))
				$objToReturn->dttDateQueued = new QDateTime($objSoapObject->DateQueued);
			if (property_exists($objSoapObject, 'DateSent'))
				$objToReturn->dttDateSent = new QDateTime($objSoapObject->DateSent);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SmsMessage::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objGroup)
				$objObject->objGroup = Group::GetSoapObjectFromObject($objObject->objGroup, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGroupId = null;
			if ($objObject->objLogin)
				$objObject->objLogin = Login::GetSoapObjectFromObject($objObject->objLogin, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intLoginId = null;
			if ($objObject->dttDateQueued)
				$objObject->dttDateQueued = $objObject->dttDateQueued->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateSent)
				$objObject->dttDateSent = $objObject->dttDateSent->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $GroupId
	 * @property-read QQNodeGroup $Group
	 * @property-read QQNode $LoginId
	 * @property-read QQNodeLogin $Login
	 * @property-read QQNode $Subject
	 * @property-read QQNode $Body
	 * @property-read QQNode $DateQueued
	 * @property-read QQNode $DateSent
	 */
	class QQNodeSmsMessage extends QQNode {
		protected $strTableName = 'sms_message';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'SmsMessage';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'GroupId':
					return new QQNode('group_id', 'GroupId', 'integer', $this);
				case 'Group':
					return new QQNodeGroup('group_id', 'Group', 'integer', $this);
				case 'LoginId':
					return new QQNode('login_id', 'LoginId', 'integer', $this);
				case 'Login':
					return new QQNodeLogin('login_id', 'Login', 'integer', $this);
				case 'Subject':
					return new QQNode('subject', 'Subject', 'string', $this);
				case 'Body':
					return new QQNode('body', 'Body', 'string', $this);
				case 'DateQueued':
					return new QQNode('date_queued', 'DateQueued', 'QDateTime', $this);
				case 'DateSent':
					return new QQNode('date_sent', 'DateSent', 'QDateTime', $this);

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
	 * @property-read QQNode $GroupId
	 * @property-read QQNodeGroup $Group
	 * @property-read QQNode $LoginId
	 * @property-read QQNodeLogin $Login
	 * @property-read QQNode $Subject
	 * @property-read QQNode $Body
	 * @property-read QQNode $DateQueued
	 * @property-read QQNode $DateSent
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeSmsMessage extends QQReverseReferenceNode {
		protected $strTableName = 'sms_message';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'SmsMessage';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'GroupId':
					return new QQNode('group_id', 'GroupId', 'integer', $this);
				case 'Group':
					return new QQNodeGroup('group_id', 'Group', 'integer', $this);
				case 'LoginId':
					return new QQNode('login_id', 'LoginId', 'integer', $this);
				case 'Login':
					return new QQNodeLogin('login_id', 'Login', 'integer', $this);
				case 'Subject':
					return new QQNode('subject', 'Subject', 'string', $this);
				case 'Body':
					return new QQNode('body', 'Body', 'string', $this);
				case 'DateQueued':
					return new QQNode('date_queued', 'DateQueued', 'QDateTime', $this);
				case 'DateSent':
					return new QQNode('date_sent', 'DateSent', 'QDateTime', $this);

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