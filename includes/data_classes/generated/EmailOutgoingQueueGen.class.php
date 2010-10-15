<?php
	/**
	 * The abstract EmailOutgoingQueueGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the EmailOutgoingQueue subclass which
	 * extends this EmailOutgoingQueueGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the EmailOutgoingQueue class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $EmailMessageId the value for intEmailMessageId (Not Null)
	 * @property string $ToAddress the value for strToAddress (Not Null)
	 * @property boolean $ErrorFlag the value for blnErrorFlag 
	 * @property string $Token the value for strToken 
	 * @property EmailMessage $EmailMessage the value for the EmailMessage object referenced by intEmailMessageId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class EmailOutgoingQueueGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column email_outgoing_queue.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_outgoing_queue.email_message_id
		 * @var integer intEmailMessageId
		 */
		protected $intEmailMessageId;
		const EmailMessageIdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_outgoing_queue.to_address
		 * @var string strToAddress
		 */
		protected $strToAddress;
		const ToAddressMaxLength = 255;
		const ToAddressDefault = null;


		/**
		 * Protected member variable that maps to the database column email_outgoing_queue.error_flag
		 * @var boolean blnErrorFlag
		 */
		protected $blnErrorFlag;
		const ErrorFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column email_outgoing_queue.token
		 * @var string strToken
		 */
		protected $strToken;
		const TokenMaxLength = 40;
		const TokenDefault = null;


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
		 * in the database column email_outgoing_queue.email_message_id.
		 *
		 * NOTE: Always use the EmailMessage property getter to correctly retrieve this EmailMessage object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var EmailMessage objEmailMessage
		 */
		protected $objEmailMessage;





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
		 * Load a EmailOutgoingQueue from PK Info
		 * @param integer $intId
		 * @return EmailOutgoingQueue
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return EmailOutgoingQueue::QuerySingle(
				QQ::Equal(QQN::EmailOutgoingQueue()->Id, $intId)
			);
		}

		/**
		 * Load all EmailOutgoingQueues
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailOutgoingQueue[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call EmailOutgoingQueue::QueryArray to perform the LoadAll query
			try {
				return EmailOutgoingQueue::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all EmailOutgoingQueues
		 * @return int
		 */
		public static function CountAll() {
			// Call EmailOutgoingQueue::QueryCount to perform the CountAll query
			return EmailOutgoingQueue::QueryCount(QQ::All());
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
			$objDatabase = EmailOutgoingQueue::GetDatabase();

			// Create/Build out the QueryBuilder object with EmailOutgoingQueue-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'email_outgoing_queue');
			EmailOutgoingQueue::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('email_outgoing_queue');

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
		 * Static Qcodo Query method to query for a single EmailOutgoingQueue object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EmailOutgoingQueue the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailOutgoingQueue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new EmailOutgoingQueue object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = EmailOutgoingQueue::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return EmailOutgoingQueue::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of EmailOutgoingQueue objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EmailOutgoingQueue[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailOutgoingQueue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return EmailOutgoingQueue::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = EmailOutgoingQueue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of EmailOutgoingQueue objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailOutgoingQueue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = EmailOutgoingQueue::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'email_outgoing_queue_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with EmailOutgoingQueue-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				EmailOutgoingQueue::GetSelectFields($objQueryBuilder);
				EmailOutgoingQueue::GetFromFields($objQueryBuilder);

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
			return EmailOutgoingQueue::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this EmailOutgoingQueue
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'email_outgoing_queue';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'email_message_id', $strAliasPrefix . 'email_message_id');
			$objBuilder->AddSelectItem($strTableName, 'to_address', $strAliasPrefix . 'to_address');
			$objBuilder->AddSelectItem($strTableName, 'error_flag', $strAliasPrefix . 'error_flag');
			$objBuilder->AddSelectItem($strTableName, 'token', $strAliasPrefix . 'token');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a EmailOutgoingQueue from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this EmailOutgoingQueue::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return EmailOutgoingQueue
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the EmailOutgoingQueue object
			$objToReturn = new EmailOutgoingQueue();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'email_message_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email_message_id'] : $strAliasPrefix . 'email_message_id';
			$objToReturn->intEmailMessageId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'to_address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'to_address'] : $strAliasPrefix . 'to_address';
			$objToReturn->strToAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'error_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'error_flag'] : $strAliasPrefix . 'error_flag';
			$objToReturn->blnErrorFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'token', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'token'] : $strAliasPrefix . 'token';
			$objToReturn->strToken = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'email_outgoing_queue__';

			// Check for EmailMessage Early Binding
			$strAlias = $strAliasPrefix . 'email_message_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objEmailMessage = EmailMessage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'email_message_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of EmailOutgoingQueues from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return EmailOutgoingQueue[]
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
					$objItem = EmailOutgoingQueue::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = EmailOutgoingQueue::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single EmailOutgoingQueue object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return EmailOutgoingQueue next row resulting from the query
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
			return EmailOutgoingQueue::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single EmailOutgoingQueue object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return EmailOutgoingQueue
		*/
		public static function LoadById($intId) {
			return EmailOutgoingQueue::QuerySingle(
				QQ::Equal(QQN::EmailOutgoingQueue()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of EmailOutgoingQueue objects,
		 * by EmailMessageId, Token Index(es)
		 * @param integer $intEmailMessageId
		 * @param string $strToken
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailOutgoingQueue[]
		*/
		public static function LoadArrayByEmailMessageIdToken($intEmailMessageId, $strToken, $objOptionalClauses = null) {
			// Call EmailOutgoingQueue::QueryArray to perform the LoadArrayByEmailMessageIdToken query
			try {
				return EmailOutgoingQueue::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::EmailOutgoingQueue()->EmailMessageId, $intEmailMessageId),
					QQ::Equal(QQN::EmailOutgoingQueue()->Token, $strToken)
					),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailOutgoingQueues
		 * by EmailMessageId, Token Index(es)
		 * @param integer $intEmailMessageId
		 * @param string $strToken
		 * @return int
		*/
		public static function CountByEmailMessageIdToken($intEmailMessageId, $strToken) {
			// Call EmailOutgoingQueue::QueryCount to perform the CountByEmailMessageIdToken query
			return EmailOutgoingQueue::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::EmailOutgoingQueue()->EmailMessageId, $intEmailMessageId),
				QQ::Equal(QQN::EmailOutgoingQueue()->Token, $strToken)
				)
			);
		}
			
		/**
		 * Load an array of EmailOutgoingQueue objects,
		 * by EmailMessageId, ErrorFlag Index(es)
		 * @param integer $intEmailMessageId
		 * @param boolean $blnErrorFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailOutgoingQueue[]
		*/
		public static function LoadArrayByEmailMessageIdErrorFlag($intEmailMessageId, $blnErrorFlag, $objOptionalClauses = null) {
			// Call EmailOutgoingQueue::QueryArray to perform the LoadArrayByEmailMessageIdErrorFlag query
			try {
				return EmailOutgoingQueue::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::EmailOutgoingQueue()->EmailMessageId, $intEmailMessageId),
					QQ::Equal(QQN::EmailOutgoingQueue()->ErrorFlag, $blnErrorFlag)
					),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailOutgoingQueues
		 * by EmailMessageId, ErrorFlag Index(es)
		 * @param integer $intEmailMessageId
		 * @param boolean $blnErrorFlag
		 * @return int
		*/
		public static function CountByEmailMessageIdErrorFlag($intEmailMessageId, $blnErrorFlag) {
			// Call EmailOutgoingQueue::QueryCount to perform the CountByEmailMessageIdErrorFlag query
			return EmailOutgoingQueue::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::EmailOutgoingQueue()->EmailMessageId, $intEmailMessageId),
				QQ::Equal(QQN::EmailOutgoingQueue()->ErrorFlag, $blnErrorFlag)
				)
			);
		}
			
		/**
		 * Load an array of EmailOutgoingQueue objects,
		 * by EmailMessageId Index(es)
		 * @param integer $intEmailMessageId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailOutgoingQueue[]
		*/
		public static function LoadArrayByEmailMessageId($intEmailMessageId, $objOptionalClauses = null) {
			// Call EmailOutgoingQueue::QueryArray to perform the LoadArrayByEmailMessageId query
			try {
				return EmailOutgoingQueue::QueryArray(
					QQ::Equal(QQN::EmailOutgoingQueue()->EmailMessageId, $intEmailMessageId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailOutgoingQueues
		 * by EmailMessageId Index(es)
		 * @param integer $intEmailMessageId
		 * @return int
		*/
		public static function CountByEmailMessageId($intEmailMessageId) {
			// Call EmailOutgoingQueue::QueryCount to perform the CountByEmailMessageId query
			return EmailOutgoingQueue::QueryCount(
				QQ::Equal(QQN::EmailOutgoingQueue()->EmailMessageId, $intEmailMessageId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




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
				INSERT INTO `email_outgoing_queue` (
					`id`,
					`email_message_id`,
					`to_address`,
					`error_flag`,
					`token`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intEmailMessageId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strToAddress) . ',
					' . QApplication::$Database[2]->SqlVariable($this->blnErrorFlag) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strToken) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intId
		 * @return EmailOutgoingQueue[]
		 */
		public static function GetJournalForId($intId) {
			$objResult = QApplication::$Database[2]->Query('SELECT * FROM email_outgoing_queue WHERE id = ' .
				QApplication::$Database[2]->SqlVariable($intId) . ' ORDER BY __sys_date');

			return EmailOutgoingQueue::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return EmailOutgoingQueue[]
		 */
		public function GetJournal() {
			return EmailOutgoingQueue::GetJournalForId($this->intId);
		}

		/**
		 * Save this EmailOutgoingQueue
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = EmailOutgoingQueue::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `email_outgoing_queue` (
							`email_message_id`,
							`to_address`,
							`error_flag`,
							`token`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intEmailMessageId) . ',
							' . $objDatabase->SqlVariable($this->strToAddress) . ',
							' . $objDatabase->SqlVariable($this->blnErrorFlag) . ',
							' . $objDatabase->SqlVariable($this->strToken) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('email_outgoing_queue', 'id');

					// Journaling
					$this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`email_outgoing_queue`
						SET
							`email_message_id` = ' . $objDatabase->SqlVariable($this->intEmailMessageId) . ',
							`to_address` = ' . $objDatabase->SqlVariable($this->strToAddress) . ',
							`error_flag` = ' . $objDatabase->SqlVariable($this->blnErrorFlag) . ',
							`token` = ' . $objDatabase->SqlVariable($this->strToken) . '
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
		 * Delete this EmailOutgoingQueue
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this EmailOutgoingQueue with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = EmailOutgoingQueue::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_outgoing_queue`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			$this->Journal('DELETE');
		}

		/**
		 * Delete all EmailOutgoingQueues
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = EmailOutgoingQueue::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_outgoing_queue`');
		}

		/**
		 * Truncate email_outgoing_queue table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = EmailOutgoingQueue::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `email_outgoing_queue`');
		}

		/**
		 * Reload this EmailOutgoingQueue from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved EmailOutgoingQueue object.');

			// Reload the Object
			$objReloaded = EmailOutgoingQueue::Load($this->intId);

			// Update $this's local variables to match
			$this->EmailMessageId = $objReloaded->EmailMessageId;
			$this->strToAddress = $objReloaded->strToAddress;
			$this->blnErrorFlag = $objReloaded->blnErrorFlag;
			$this->strToken = $objReloaded->strToken;
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

				case 'EmailMessageId':
					// Gets the value for intEmailMessageId (Not Null)
					// @return integer
					return $this->intEmailMessageId;

				case 'ToAddress':
					// Gets the value for strToAddress (Not Null)
					// @return string
					return $this->strToAddress;

				case 'ErrorFlag':
					// Gets the value for blnErrorFlag 
					// @return boolean
					return $this->blnErrorFlag;

				case 'Token':
					// Gets the value for strToken 
					// @return string
					return $this->strToken;


				///////////////////
				// Member Objects
				///////////////////
				case 'EmailMessage':
					// Gets the value for the EmailMessage object referenced by intEmailMessageId (Not Null)
					// @return EmailMessage
					try {
						if ((!$this->objEmailMessage) && (!is_null($this->intEmailMessageId)))
							$this->objEmailMessage = EmailMessage::Load($this->intEmailMessageId);
						return $this->objEmailMessage;
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
				case 'EmailMessageId':
					// Sets the value for intEmailMessageId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objEmailMessage = null;
						return ($this->intEmailMessageId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ToAddress':
					// Sets the value for strToAddress (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strToAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ErrorFlag':
					// Sets the value for blnErrorFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnErrorFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Token':
					// Sets the value for strToken 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strToken = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'EmailMessage':
					// Sets the value for the EmailMessage object referenced by intEmailMessageId (Not Null)
					// @param EmailMessage $mixValue
					// @return EmailMessage
					if (is_null($mixValue)) {
						$this->intEmailMessageId = null;
						$this->objEmailMessage = null;
						return null;
					} else {
						// Make sure $mixValue actually is a EmailMessage object
						try {
							$mixValue = QType::Cast($mixValue, 'EmailMessage');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED EmailMessage object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved EmailMessage for this EmailOutgoingQueue');

						// Update Local Member Variables
						$this->objEmailMessage = $mixValue;
						$this->intEmailMessageId = $mixValue->Id;

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
			$strToReturn = '<complexType name="EmailOutgoingQueue"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="EmailMessage" type="xsd1:EmailMessage"/>';
			$strToReturn .= '<element name="ToAddress" type="xsd:string"/>';
			$strToReturn .= '<element name="ErrorFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Token" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('EmailOutgoingQueue', $strComplexTypeArray)) {
				$strComplexTypeArray['EmailOutgoingQueue'] = EmailOutgoingQueue::GetSoapComplexTypeXml();
				EmailMessage::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, EmailOutgoingQueue::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new EmailOutgoingQueue();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'EmailMessage')) &&
				($objSoapObject->EmailMessage))
				$objToReturn->EmailMessage = EmailMessage::GetObjectFromSoapObject($objSoapObject->EmailMessage);
			if (property_exists($objSoapObject, 'ToAddress'))
				$objToReturn->strToAddress = $objSoapObject->ToAddress;
			if (property_exists($objSoapObject, 'ErrorFlag'))
				$objToReturn->blnErrorFlag = $objSoapObject->ErrorFlag;
			if (property_exists($objSoapObject, 'Token'))
				$objToReturn->strToken = $objSoapObject->Token;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, EmailOutgoingQueue::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objEmailMessage)
				$objObject->objEmailMessage = EmailMessage::GetSoapObjectFromObject($objObject->objEmailMessage, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEmailMessageId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeEmailOutgoingQueue extends QQNode {
		protected $strTableName = 'email_outgoing_queue';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EmailOutgoingQueue';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'EmailMessageId':
					return new QQNode('email_message_id', 'EmailMessageId', 'integer', $this);
				case 'EmailMessage':
					return new QQNodeEmailMessage('email_message_id', 'EmailMessage', 'integer', $this);
				case 'ToAddress':
					return new QQNode('to_address', 'ToAddress', 'string', $this);
				case 'ErrorFlag':
					return new QQNode('error_flag', 'ErrorFlag', 'boolean', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);

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

	class QQReverseReferenceNodeEmailOutgoingQueue extends QQReverseReferenceNode {
		protected $strTableName = 'email_outgoing_queue';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EmailOutgoingQueue';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'EmailMessageId':
					return new QQNode('email_message_id', 'EmailMessageId', 'integer', $this);
				case 'EmailMessage':
					return new QQNodeEmailMessage('email_message_id', 'EmailMessage', 'integer', $this);
				case 'ToAddress':
					return new QQNode('to_address', 'ToAddress', 'string', $this);
				case 'ErrorFlag':
					return new QQNode('error_flag', 'ErrorFlag', 'boolean', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);

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