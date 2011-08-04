<?php
	/**
	 * The abstract EmailMessageGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the EmailMessage subclass which
	 * extends this EmailMessageGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the EmailMessage class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $EmailMessageStatusTypeId the value for intEmailMessageStatusTypeId (Not Null)
	 * @property QDateTime $DateReceived the value for dttDateReceived (Not Null)
	 * @property string $RawMessage the value for strRawMessage (Not Null)
	 * @property string $MessageIdentifier the value for strMessageIdentifier (Unique)
	 * @property string $Subject the value for strSubject 
	 * @property string $FromAddress the value for strFromAddress 
	 * @property string $ResponseHeader the value for strResponseHeader 
	 * @property string $ResponseBody the value for strResponseBody 
	 * @property string $ErrorMessage the value for strErrorMessage 
	 * @property EmailMessageRoute $_EmailMessageRoute the value for the private _objEmailMessageRoute (Read-Only) if set due to an expansion on the email_message_route.email_message_id reverse relationship
	 * @property EmailMessageRoute[] $_EmailMessageRouteArray the value for the private _objEmailMessageRouteArray (Read-Only) if set due to an ExpandAsArray on the email_message_route.email_message_id reverse relationship
	 * @property EmailOutgoingQueue $_EmailOutgoingQueue the value for the private _objEmailOutgoingQueue (Read-Only) if set due to an expansion on the email_outgoing_queue.email_message_id reverse relationship
	 * @property EmailOutgoingQueue[] $_EmailOutgoingQueueArray the value for the private _objEmailOutgoingQueueArray (Read-Only) if set due to an ExpandAsArray on the email_outgoing_queue.email_message_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class EmailMessageGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column email_message.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.email_message_status_type_id
		 * @var integer intEmailMessageStatusTypeId
		 */
		protected $intEmailMessageStatusTypeId;
		const EmailMessageStatusTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.date_received
		 * @var QDateTime dttDateReceived
		 */
		protected $dttDateReceived;
		const DateReceivedDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.raw_message
		 * @var string strRawMessage
		 */
		protected $strRawMessage;
		const RawMessageDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.message_identifier
		 * @var string strMessageIdentifier
		 */
		protected $strMessageIdentifier;
		const MessageIdentifierMaxLength = 255;
		const MessageIdentifierDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.subject
		 * @var string strSubject
		 */
		protected $strSubject;
		const SubjectMaxLength = 255;
		const SubjectDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.from_address
		 * @var string strFromAddress
		 */
		protected $strFromAddress;
		const FromAddressMaxLength = 255;
		const FromAddressDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.response_header
		 * @var string strResponseHeader
		 */
		protected $strResponseHeader;
		const ResponseHeaderDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.response_body
		 * @var string strResponseBody
		 */
		protected $strResponseBody;
		const ResponseBodyDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.error_message
		 * @var string strErrorMessage
		 */
		protected $strErrorMessage;
		const ErrorMessageDefault = null;


		/**
		 * Private member variable that stores a reference to a single EmailMessageRoute object
		 * (of type EmailMessageRoute), if this EmailMessage object was restored with
		 * an expansion on the email_message_route association table.
		 * @var EmailMessageRoute _objEmailMessageRoute;
		 */
		private $_objEmailMessageRoute;

		/**
		 * Private member variable that stores a reference to an array of EmailMessageRoute objects
		 * (of type EmailMessageRoute[]), if this EmailMessage object was restored with
		 * an ExpandAsArray on the email_message_route association table.
		 * @var EmailMessageRoute[] _objEmailMessageRouteArray;
		 */
		private $_objEmailMessageRouteArray = array();

		/**
		 * Private member variable that stores a reference to a single EmailOutgoingQueue object
		 * (of type EmailOutgoingQueue), if this EmailMessage object was restored with
		 * an expansion on the email_outgoing_queue association table.
		 * @var EmailOutgoingQueue _objEmailOutgoingQueue;
		 */
		private $_objEmailOutgoingQueue;

		/**
		 * Private member variable that stores a reference to an array of EmailOutgoingQueue objects
		 * (of type EmailOutgoingQueue[]), if this EmailMessage object was restored with
		 * an ExpandAsArray on the email_outgoing_queue association table.
		 * @var EmailOutgoingQueue[] _objEmailOutgoingQueueArray;
		 */
		private $_objEmailOutgoingQueueArray = array();

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
		 * Load a EmailMessage from PK Info
		 * @param integer $intId
		 * @return EmailMessage
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return EmailMessage::QuerySingle(
				QQ::Equal(QQN::EmailMessage()->Id, $intId)
			);
		}

		/**
		 * Load all EmailMessages
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessage[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call EmailMessage::QueryArray to perform the LoadAll query
			try {
				return EmailMessage::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all EmailMessages
		 * @return int
		 */
		public static function CountAll() {
			// Call EmailMessage::QueryCount to perform the CountAll query
			return EmailMessage::QueryCount(QQ::All());
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
			$objDatabase = EmailMessage::GetDatabase();

			// Create/Build out the QueryBuilder object with EmailMessage-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'email_message');
			EmailMessage::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('email_message');

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
		 * Static Qcodo Query method to query for a single EmailMessage object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EmailMessage the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailMessage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new EmailMessage object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = EmailMessage::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return EmailMessage::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of EmailMessage objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EmailMessage[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailMessage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return EmailMessage::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = EmailMessage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of EmailMessage objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailMessage::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = EmailMessage::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'email_message_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with EmailMessage-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				EmailMessage::GetSelectFields($objQueryBuilder);
				EmailMessage::GetFromFields($objQueryBuilder);

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
			return EmailMessage::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this EmailMessage
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'email_message';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'email_message_status_type_id', $strAliasPrefix . 'email_message_status_type_id');
			$objBuilder->AddSelectItem($strTableName, 'date_received', $strAliasPrefix . 'date_received');
			$objBuilder->AddSelectItem($strTableName, 'raw_message', $strAliasPrefix . 'raw_message');
			$objBuilder->AddSelectItem($strTableName, 'message_identifier', $strAliasPrefix . 'message_identifier');
			$objBuilder->AddSelectItem($strTableName, 'subject', $strAliasPrefix . 'subject');
			$objBuilder->AddSelectItem($strTableName, 'from_address', $strAliasPrefix . 'from_address');
			$objBuilder->AddSelectItem($strTableName, 'response_header', $strAliasPrefix . 'response_header');
			$objBuilder->AddSelectItem($strTableName, 'response_body', $strAliasPrefix . 'response_body');
			$objBuilder->AddSelectItem($strTableName, 'error_message', $strAliasPrefix . 'error_message');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a EmailMessage from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this EmailMessage::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return EmailMessage
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
					$strAliasPrefix = 'email_message__';


				$strAlias = $strAliasPrefix . 'emailmessageroute__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objEmailMessageRouteArray)) {
						$objPreviousChildItem = $objPreviousItem->_objEmailMessageRouteArray[$intPreviousChildItemCount - 1];
						$objChildItem = EmailMessageRoute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailmessageroute__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objEmailMessageRouteArray[] = $objChildItem;
					} else
						$objPreviousItem->_objEmailMessageRouteArray[] = EmailMessageRoute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailmessageroute__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'emailoutgoingqueue__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objEmailOutgoingQueueArray)) {
						$objPreviousChildItem = $objPreviousItem->_objEmailOutgoingQueueArray[$intPreviousChildItemCount - 1];
						$objChildItem = EmailOutgoingQueue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailoutgoingqueue__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objEmailOutgoingQueueArray[] = $objChildItem;
					} else
						$objPreviousItem->_objEmailOutgoingQueueArray[] = EmailOutgoingQueue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailoutgoingqueue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'email_message__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the EmailMessage object
			$objToReturn = new EmailMessage();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'email_message_status_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email_message_status_type_id'] : $strAliasPrefix . 'email_message_status_type_id';
			$objToReturn->intEmailMessageStatusTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_received', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_received'] : $strAliasPrefix . 'date_received';
			$objToReturn->dttDateReceived = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'raw_message', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'raw_message'] : $strAliasPrefix . 'raw_message';
			$objToReturn->strRawMessage = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'message_identifier', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'message_identifier'] : $strAliasPrefix . 'message_identifier';
			$objToReturn->strMessageIdentifier = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'subject', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'subject'] : $strAliasPrefix . 'subject';
			$objToReturn->strSubject = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'from_address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'from_address'] : $strAliasPrefix . 'from_address';
			$objToReturn->strFromAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'response_header', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'response_header'] : $strAliasPrefix . 'response_header';
			$objToReturn->strResponseHeader = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'response_body', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'response_body'] : $strAliasPrefix . 'response_body';
			$objToReturn->strResponseBody = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'error_message', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'error_message'] : $strAliasPrefix . 'error_message';
			$objToReturn->strErrorMessage = $objDbRow->GetColumn($strAliasName, 'Blob');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'email_message__';




			// Check for EmailMessageRoute Virtual Binding
			$strAlias = $strAliasPrefix . 'emailmessageroute__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objEmailMessageRouteArray[] = EmailMessageRoute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailmessageroute__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objEmailMessageRoute = EmailMessageRoute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailmessageroute__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for EmailOutgoingQueue Virtual Binding
			$strAlias = $strAliasPrefix . 'emailoutgoingqueue__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objEmailOutgoingQueueArray[] = EmailOutgoingQueue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailoutgoingqueue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objEmailOutgoingQueue = EmailOutgoingQueue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailoutgoingqueue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of EmailMessages from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return EmailMessage[]
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
					$objItem = EmailMessage::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = EmailMessage::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single EmailMessage object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return EmailMessage next row resulting from the query
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
			return EmailMessage::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single EmailMessage object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return EmailMessage
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return EmailMessage::QuerySingle(
				QQ::Equal(QQN::EmailMessage()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single EmailMessage object,
		 * by MessageIdentifier Index(es)
		 * @param string $strMessageIdentifier
		 * @return EmailMessage
		*/
		public static function LoadByMessageIdentifier($strMessageIdentifier, $objOptionalClauses = null) {
			return EmailMessage::QuerySingle(
				QQ::Equal(QQN::EmailMessage()->MessageIdentifier, $strMessageIdentifier)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of EmailMessage objects,
		 * by EmailMessageStatusTypeId Index(es)
		 * @param integer $intEmailMessageStatusTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessage[]
		*/
		public static function LoadArrayByEmailMessageStatusTypeId($intEmailMessageStatusTypeId, $objOptionalClauses = null) {
			// Call EmailMessage::QueryArray to perform the LoadArrayByEmailMessageStatusTypeId query
			try {
				return EmailMessage::QueryArray(
					QQ::Equal(QQN::EmailMessage()->EmailMessageStatusTypeId, $intEmailMessageStatusTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailMessages
		 * by EmailMessageStatusTypeId Index(es)
		 * @param integer $intEmailMessageStatusTypeId
		 * @return int
		*/
		public static function CountByEmailMessageStatusTypeId($intEmailMessageStatusTypeId, $objOptionalClauses = null) {
			// Call EmailMessage::QueryCount to perform the CountByEmailMessageStatusTypeId query
			return EmailMessage::QueryCount(
				QQ::Equal(QQN::EmailMessage()->EmailMessageStatusTypeId, $intEmailMessageStatusTypeId)
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
		 * Save this EmailMessage
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `email_message` (
							`email_message_status_type_id`,
							`date_received`,
							`raw_message`,
							`message_identifier`,
							`subject`,
							`from_address`,
							`response_header`,
							`response_body`,
							`error_message`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intEmailMessageStatusTypeId) . ',
							' . $objDatabase->SqlVariable($this->dttDateReceived) . ',
							' . $objDatabase->SqlVariable($this->strRawMessage) . ',
							' . $objDatabase->SqlVariable($this->strMessageIdentifier) . ',
							' . $objDatabase->SqlVariable($this->strSubject) . ',
							' . $objDatabase->SqlVariable($this->strFromAddress) . ',
							' . $objDatabase->SqlVariable($this->strResponseHeader) . ',
							' . $objDatabase->SqlVariable($this->strResponseBody) . ',
							' . $objDatabase->SqlVariable($this->strErrorMessage) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('email_message', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`email_message`
						SET
							`email_message_status_type_id` = ' . $objDatabase->SqlVariable($this->intEmailMessageStatusTypeId) . ',
							`date_received` = ' . $objDatabase->SqlVariable($this->dttDateReceived) . ',
							`raw_message` = ' . $objDatabase->SqlVariable($this->strRawMessage) . ',
							`message_identifier` = ' . $objDatabase->SqlVariable($this->strMessageIdentifier) . ',
							`subject` = ' . $objDatabase->SqlVariable($this->strSubject) . ',
							`from_address` = ' . $objDatabase->SqlVariable($this->strFromAddress) . ',
							`response_header` = ' . $objDatabase->SqlVariable($this->strResponseHeader) . ',
							`response_body` = ' . $objDatabase->SqlVariable($this->strResponseBody) . ',
							`error_message` = ' . $objDatabase->SqlVariable($this->strErrorMessage) . '
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
		 * Delete this EmailMessage
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this EmailMessage with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all EmailMessages
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message`');
		}

		/**
		 * Truncate email_message table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `email_message`');
		}

		/**
		 * Reload this EmailMessage from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved EmailMessage object.');

			// Reload the Object
			$objReloaded = EmailMessage::Load($this->intId);

			// Update $this's local variables to match
			$this->EmailMessageStatusTypeId = $objReloaded->EmailMessageStatusTypeId;
			$this->dttDateReceived = $objReloaded->dttDateReceived;
			$this->strRawMessage = $objReloaded->strRawMessage;
			$this->strMessageIdentifier = $objReloaded->strMessageIdentifier;
			$this->strSubject = $objReloaded->strSubject;
			$this->strFromAddress = $objReloaded->strFromAddress;
			$this->strResponseHeader = $objReloaded->strResponseHeader;
			$this->strResponseBody = $objReloaded->strResponseBody;
			$this->strErrorMessage = $objReloaded->strErrorMessage;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = EmailMessage::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `email_message` (
					`id`,
					`email_message_status_type_id`,
					`date_received`,
					`raw_message`,
					`message_identifier`,
					`subject`,
					`from_address`,
					`response_header`,
					`response_body`,
					`error_message`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intEmailMessageStatusTypeId) . ',
					' . $objDatabase->SqlVariable($this->dttDateReceived) . ',
					' . $objDatabase->SqlVariable($this->strRawMessage) . ',
					' . $objDatabase->SqlVariable($this->strMessageIdentifier) . ',
					' . $objDatabase->SqlVariable($this->strSubject) . ',
					' . $objDatabase->SqlVariable($this->strFromAddress) . ',
					' . $objDatabase->SqlVariable($this->strResponseHeader) . ',
					' . $objDatabase->SqlVariable($this->strResponseBody) . ',
					' . $objDatabase->SqlVariable($this->strErrorMessage) . ',
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
		 * @return EmailMessage[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = EmailMessage::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM email_message WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return EmailMessage::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return EmailMessage[]
		 */
		public function GetJournal() {
			return EmailMessage::GetJournalForId($this->intId);
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

				case 'EmailMessageStatusTypeId':
					// Gets the value for intEmailMessageStatusTypeId (Not Null)
					// @return integer
					return $this->intEmailMessageStatusTypeId;

				case 'DateReceived':
					// Gets the value for dttDateReceived (Not Null)
					// @return QDateTime
					return $this->dttDateReceived;

				case 'RawMessage':
					// Gets the value for strRawMessage (Not Null)
					// @return string
					return $this->strRawMessage;

				case 'MessageIdentifier':
					// Gets the value for strMessageIdentifier (Unique)
					// @return string
					return $this->strMessageIdentifier;

				case 'Subject':
					// Gets the value for strSubject 
					// @return string
					return $this->strSubject;

				case 'FromAddress':
					// Gets the value for strFromAddress 
					// @return string
					return $this->strFromAddress;

				case 'ResponseHeader':
					// Gets the value for strResponseHeader 
					// @return string
					return $this->strResponseHeader;

				case 'ResponseBody':
					// Gets the value for strResponseBody 
					// @return string
					return $this->strResponseBody;

				case 'ErrorMessage':
					// Gets the value for strErrorMessage 
					// @return string
					return $this->strErrorMessage;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_EmailMessageRoute':
					// Gets the value for the private _objEmailMessageRoute (Read-Only)
					// if set due to an expansion on the email_message_route.email_message_id reverse relationship
					// @return EmailMessageRoute
					return $this->_objEmailMessageRoute;

				case '_EmailMessageRouteArray':
					// Gets the value for the private _objEmailMessageRouteArray (Read-Only)
					// if set due to an ExpandAsArray on the email_message_route.email_message_id reverse relationship
					// @return EmailMessageRoute[]
					return (array) $this->_objEmailMessageRouteArray;

				case '_EmailOutgoingQueue':
					// Gets the value for the private _objEmailOutgoingQueue (Read-Only)
					// if set due to an expansion on the email_outgoing_queue.email_message_id reverse relationship
					// @return EmailOutgoingQueue
					return $this->_objEmailOutgoingQueue;

				case '_EmailOutgoingQueueArray':
					// Gets the value for the private _objEmailOutgoingQueueArray (Read-Only)
					// if set due to an ExpandAsArray on the email_outgoing_queue.email_message_id reverse relationship
					// @return EmailOutgoingQueue[]
					return (array) $this->_objEmailOutgoingQueueArray;


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
				case 'EmailMessageStatusTypeId':
					// Sets the value for intEmailMessageStatusTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intEmailMessageStatusTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateReceived':
					// Sets the value for dttDateReceived (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateReceived = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RawMessage':
					// Sets the value for strRawMessage (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strRawMessage = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MessageIdentifier':
					// Sets the value for strMessageIdentifier (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strMessageIdentifier = QType::Cast($mixValue, QType::String));
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

				case 'FromAddress':
					// Sets the value for strFromAddress 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFromAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ResponseHeader':
					// Sets the value for strResponseHeader 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strResponseHeader = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ResponseBody':
					// Sets the value for strResponseBody 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strResponseBody = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ErrorMessage':
					// Sets the value for strErrorMessage 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strErrorMessage = QType::Cast($mixValue, QType::String));
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

			
		
		// Related Objects' Methods for EmailMessageRoute
		//-------------------------------------------------------------------

		/**
		 * Gets all associated EmailMessageRoutes as an array of EmailMessageRoute objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessageRoute[]
		*/ 
		public function GetEmailMessageRouteArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return EmailMessageRoute::LoadArrayByEmailMessageId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EmailMessageRoutes
		 * @return int
		*/ 
		public function CountEmailMessageRoutes() {
			if ((is_null($this->intId)))
				return 0;

			return EmailMessageRoute::CountByEmailMessageId($this->intId);
		}

		/**
		 * Associates a EmailMessageRoute
		 * @param EmailMessageRoute $objEmailMessageRoute
		 * @return void
		*/ 
		public function AssociateEmailMessageRoute(EmailMessageRoute $objEmailMessageRoute) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmailMessageRoute on this unsaved EmailMessage.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmailMessageRoute on this EmailMessage with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`email_message_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objEmailMessageRoute->EmailMessageId = $this->intId;
				$objEmailMessageRoute->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a EmailMessageRoute
		 * @param EmailMessageRoute $objEmailMessageRoute
		 * @return void
		*/ 
		public function UnassociateEmailMessageRoute(EmailMessageRoute $objEmailMessageRoute) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved EmailMessage.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this EmailMessage with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`email_message_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . ' AND
					`email_message_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objEmailMessageRoute->EmailMessageId = null;
				$objEmailMessageRoute->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all EmailMessageRoutes
		 * @return void
		*/ 
		public function UnassociateAllEmailMessageRoutes() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved EmailMessage.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (EmailMessageRoute::LoadArrayByEmailMessageId($this->intId) as $objEmailMessageRoute) {
					$objEmailMessageRoute->EmailMessageId = null;
					$objEmailMessageRoute->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`email_message_id` = null
				WHERE
					`email_message_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EmailMessageRoute
		 * @param EmailMessageRoute $objEmailMessageRoute
		 * @return void
		*/ 
		public function DeleteAssociatedEmailMessageRoute(EmailMessageRoute $objEmailMessageRoute) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved EmailMessage.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this EmailMessage with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message_route`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . ' AND
					`email_message_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objEmailMessageRoute->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated EmailMessageRoutes
		 * @return void
		*/ 
		public function DeleteAllEmailMessageRoutes() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved EmailMessage.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (EmailMessageRoute::LoadArrayByEmailMessageId($this->intId) as $objEmailMessageRoute) {
					$objEmailMessageRoute->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message_route`
				WHERE
					`email_message_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for EmailOutgoingQueue
		//-------------------------------------------------------------------

		/**
		 * Gets all associated EmailOutgoingQueues as an array of EmailOutgoingQueue objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailOutgoingQueue[]
		*/ 
		public function GetEmailOutgoingQueueArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return EmailOutgoingQueue::LoadArrayByEmailMessageId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EmailOutgoingQueues
		 * @return int
		*/ 
		public function CountEmailOutgoingQueues() {
			if ((is_null($this->intId)))
				return 0;

			return EmailOutgoingQueue::CountByEmailMessageId($this->intId);
		}

		/**
		 * Associates a EmailOutgoingQueue
		 * @param EmailOutgoingQueue $objEmailOutgoingQueue
		 * @return void
		*/ 
		public function AssociateEmailOutgoingQueue(EmailOutgoingQueue $objEmailOutgoingQueue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmailOutgoingQueue on this unsaved EmailMessage.');
			if ((is_null($objEmailOutgoingQueue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmailOutgoingQueue on this EmailMessage with an unsaved EmailOutgoingQueue.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_outgoing_queue`
				SET
					`email_message_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailOutgoingQueue->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objEmailOutgoingQueue->EmailMessageId = $this->intId;
				$objEmailOutgoingQueue->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a EmailOutgoingQueue
		 * @param EmailOutgoingQueue $objEmailOutgoingQueue
		 * @return void
		*/ 
		public function UnassociateEmailOutgoingQueue(EmailOutgoingQueue $objEmailOutgoingQueue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailOutgoingQueue on this unsaved EmailMessage.');
			if ((is_null($objEmailOutgoingQueue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailOutgoingQueue on this EmailMessage with an unsaved EmailOutgoingQueue.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_outgoing_queue`
				SET
					`email_message_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailOutgoingQueue->Id) . ' AND
					`email_message_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objEmailOutgoingQueue->EmailMessageId = null;
				$objEmailOutgoingQueue->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all EmailOutgoingQueues
		 * @return void
		*/ 
		public function UnassociateAllEmailOutgoingQueues() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailOutgoingQueue on this unsaved EmailMessage.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (EmailOutgoingQueue::LoadArrayByEmailMessageId($this->intId) as $objEmailOutgoingQueue) {
					$objEmailOutgoingQueue->EmailMessageId = null;
					$objEmailOutgoingQueue->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_outgoing_queue`
				SET
					`email_message_id` = null
				WHERE
					`email_message_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EmailOutgoingQueue
		 * @param EmailOutgoingQueue $objEmailOutgoingQueue
		 * @return void
		*/ 
		public function DeleteAssociatedEmailOutgoingQueue(EmailOutgoingQueue $objEmailOutgoingQueue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailOutgoingQueue on this unsaved EmailMessage.');
			if ((is_null($objEmailOutgoingQueue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailOutgoingQueue on this EmailMessage with an unsaved EmailOutgoingQueue.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_outgoing_queue`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailOutgoingQueue->Id) . ' AND
					`email_message_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objEmailOutgoingQueue->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated EmailOutgoingQueues
		 * @return void
		*/ 
		public function DeleteAllEmailOutgoingQueues() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailOutgoingQueue on this unsaved EmailMessage.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessage::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (EmailOutgoingQueue::LoadArrayByEmailMessageId($this->intId) as $objEmailOutgoingQueue) {
					$objEmailOutgoingQueue->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_outgoing_queue`
				WHERE
					`email_message_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="EmailMessage"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="EmailMessageStatusTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="DateReceived" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="RawMessage" type="xsd:string"/>';
			$strToReturn .= '<element name="MessageIdentifier" type="xsd:string"/>';
			$strToReturn .= '<element name="Subject" type="xsd:string"/>';
			$strToReturn .= '<element name="FromAddress" type="xsd:string"/>';
			$strToReturn .= '<element name="ResponseHeader" type="xsd:string"/>';
			$strToReturn .= '<element name="ResponseBody" type="xsd:string"/>';
			$strToReturn .= '<element name="ErrorMessage" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('EmailMessage', $strComplexTypeArray)) {
				$strComplexTypeArray['EmailMessage'] = EmailMessage::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, EmailMessage::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new EmailMessage();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'EmailMessageStatusTypeId'))
				$objToReturn->intEmailMessageStatusTypeId = $objSoapObject->EmailMessageStatusTypeId;
			if (property_exists($objSoapObject, 'DateReceived'))
				$objToReturn->dttDateReceived = new QDateTime($objSoapObject->DateReceived);
			if (property_exists($objSoapObject, 'RawMessage'))
				$objToReturn->strRawMessage = $objSoapObject->RawMessage;
			if (property_exists($objSoapObject, 'MessageIdentifier'))
				$objToReturn->strMessageIdentifier = $objSoapObject->MessageIdentifier;
			if (property_exists($objSoapObject, 'Subject'))
				$objToReturn->strSubject = $objSoapObject->Subject;
			if (property_exists($objSoapObject, 'FromAddress'))
				$objToReturn->strFromAddress = $objSoapObject->FromAddress;
			if (property_exists($objSoapObject, 'ResponseHeader'))
				$objToReturn->strResponseHeader = $objSoapObject->ResponseHeader;
			if (property_exists($objSoapObject, 'ResponseBody'))
				$objToReturn->strResponseBody = $objSoapObject->ResponseBody;
			if (property_exists($objSoapObject, 'ErrorMessage'))
				$objToReturn->strErrorMessage = $objSoapObject->ErrorMessage;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, EmailMessage::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttDateReceived)
				$objObject->dttDateReceived = $objObject->dttDateReceived->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $EmailMessageStatusTypeId
	 * @property-read QQNode $DateReceived
	 * @property-read QQNode $RawMessage
	 * @property-read QQNode $MessageIdentifier
	 * @property-read QQNode $Subject
	 * @property-read QQNode $FromAddress
	 * @property-read QQNode $ResponseHeader
	 * @property-read QQNode $ResponseBody
	 * @property-read QQNode $ErrorMessage
	 * @property-read QQReverseReferenceNodeEmailMessageRoute $EmailMessageRoute
	 * @property-read QQReverseReferenceNodeEmailOutgoingQueue $EmailOutgoingQueue
	 */
	class QQNodeEmailMessage extends QQNode {
		protected $strTableName = 'email_message';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EmailMessage';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'EmailMessageStatusTypeId':
					return new QQNode('email_message_status_type_id', 'EmailMessageStatusTypeId', 'integer', $this);
				case 'DateReceived':
					return new QQNode('date_received', 'DateReceived', 'QDateTime', $this);
				case 'RawMessage':
					return new QQNode('raw_message', 'RawMessage', 'string', $this);
				case 'MessageIdentifier':
					return new QQNode('message_identifier', 'MessageIdentifier', 'string', $this);
				case 'Subject':
					return new QQNode('subject', 'Subject', 'string', $this);
				case 'FromAddress':
					return new QQNode('from_address', 'FromAddress', 'string', $this);
				case 'ResponseHeader':
					return new QQNode('response_header', 'ResponseHeader', 'string', $this);
				case 'ResponseBody':
					return new QQNode('response_body', 'ResponseBody', 'string', $this);
				case 'ErrorMessage':
					return new QQNode('error_message', 'ErrorMessage', 'string', $this);
				case 'EmailMessageRoute':
					return new QQReverseReferenceNodeEmailMessageRoute($this, 'emailmessageroute', 'reverse_reference', 'email_message_id');
				case 'EmailOutgoingQueue':
					return new QQReverseReferenceNodeEmailOutgoingQueue($this, 'emailoutgoingqueue', 'reverse_reference', 'email_message_id');

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
	 * @property-read QQNode $EmailMessageStatusTypeId
	 * @property-read QQNode $DateReceived
	 * @property-read QQNode $RawMessage
	 * @property-read QQNode $MessageIdentifier
	 * @property-read QQNode $Subject
	 * @property-read QQNode $FromAddress
	 * @property-read QQNode $ResponseHeader
	 * @property-read QQNode $ResponseBody
	 * @property-read QQNode $ErrorMessage
	 * @property-read QQReverseReferenceNodeEmailMessageRoute $EmailMessageRoute
	 * @property-read QQReverseReferenceNodeEmailOutgoingQueue $EmailOutgoingQueue
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeEmailMessage extends QQReverseReferenceNode {
		protected $strTableName = 'email_message';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EmailMessage';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'EmailMessageStatusTypeId':
					return new QQNode('email_message_status_type_id', 'EmailMessageStatusTypeId', 'integer', $this);
				case 'DateReceived':
					return new QQNode('date_received', 'DateReceived', 'QDateTime', $this);
				case 'RawMessage':
					return new QQNode('raw_message', 'RawMessage', 'string', $this);
				case 'MessageIdentifier':
					return new QQNode('message_identifier', 'MessageIdentifier', 'string', $this);
				case 'Subject':
					return new QQNode('subject', 'Subject', 'string', $this);
				case 'FromAddress':
					return new QQNode('from_address', 'FromAddress', 'string', $this);
				case 'ResponseHeader':
					return new QQNode('response_header', 'ResponseHeader', 'string', $this);
				case 'ResponseBody':
					return new QQNode('response_body', 'ResponseBody', 'string', $this);
				case 'ErrorMessage':
					return new QQNode('error_message', 'ErrorMessage', 'string', $this);
				case 'EmailMessageRoute':
					return new QQReverseReferenceNodeEmailMessageRoute($this, 'emailmessageroute', 'reverse_reference', 'email_message_id');
				case 'EmailOutgoingQueue':
					return new QQReverseReferenceNodeEmailOutgoingQueue($this, 'emailoutgoingqueue', 'reverse_reference', 'email_message_id');

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