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
	 * @property string $RawMessage the value for strRawMessage 
	 * @property QDateTime $DateReceived the value for dttDateReceived (Not Null)
	 * @property integer $ReceivedFromPersonId the value for intReceivedFromPersonId 
	 * @property integer $ReceivedFromEntryId the value for intReceivedFromEntryId 
	 * @property integer $GroupId the value for intGroupId 
	 * @property integer $CommunicationListId the value for intCommunicationListId 
	 * @property string $Subject the value for strSubject 
	 * @property string $ResponseMessage the value for strResponseMessage 
	 * @property Person $ReceivedFromPerson the value for the Person object referenced by intReceivedFromPersonId 
	 * @property CommunicationListEntry $ReceivedFromEntry the value for the CommunicationListEntry object referenced by intReceivedFromEntryId 
	 * @property Group $Group the value for the Group object referenced by intGroupId 
	 * @property CommunicationList $CommunicationList the value for the CommunicationList object referenced by intCommunicationListId 
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
		 * Protected member variable that maps to the database column email_message.raw_message
		 * @var string strRawMessage
		 */
		protected $strRawMessage;
		const RawMessageDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.date_received
		 * @var QDateTime dttDateReceived
		 */
		protected $dttDateReceived;
		const DateReceivedDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.received_from_person_id
		 * @var integer intReceivedFromPersonId
		 */
		protected $intReceivedFromPersonId;
		const ReceivedFromPersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.received_from_entry_id
		 * @var integer intReceivedFromEntryId
		 */
		protected $intReceivedFromEntryId;
		const ReceivedFromEntryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.group_id
		 * @var integer intGroupId
		 */
		protected $intGroupId;
		const GroupIdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.communication_list_id
		 * @var integer intCommunicationListId
		 */
		protected $intCommunicationListId;
		const CommunicationListIdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.subject
		 * @var string strSubject
		 */
		protected $strSubject;
		const SubjectMaxLength = 255;
		const SubjectDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message.response_message
		 * @var string strResponseMessage
		 */
		protected $strResponseMessage;
		const ResponseMessageDefault = null;


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

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column email_message.received_from_person_id.
		 *
		 * NOTE: Always use the ReceivedFromPerson property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objReceivedFromPerson
		 */
		protected $objReceivedFromPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column email_message.received_from_entry_id.
		 *
		 * NOTE: Always use the ReceivedFromEntry property getter to correctly retrieve this CommunicationListEntry object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CommunicationListEntry objReceivedFromEntry
		 */
		protected $objReceivedFromEntry;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column email_message.group_id.
		 *
		 * NOTE: Always use the Group property getter to correctly retrieve this Group object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Group objGroup
		 */
		protected $objGroup;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column email_message.communication_list_id.
		 *
		 * NOTE: Always use the CommunicationList property getter to correctly retrieve this CommunicationList object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CommunicationList objCommunicationList
		 */
		protected $objCommunicationList;





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

			// Perform the Query, Get the First Row, and Instantiate a new EmailMessage object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return EmailMessage::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
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
			$objBuilder->AddSelectItem($strTableName, 'raw_message', $strAliasPrefix . 'raw_message');
			$objBuilder->AddSelectItem($strTableName, 'date_received', $strAliasPrefix . 'date_received');
			$objBuilder->AddSelectItem($strTableName, 'received_from_person_id', $strAliasPrefix . 'received_from_person_id');
			$objBuilder->AddSelectItem($strTableName, 'received_from_entry_id', $strAliasPrefix . 'received_from_entry_id');
			$objBuilder->AddSelectItem($strTableName, 'group_id', $strAliasPrefix . 'group_id');
			$objBuilder->AddSelectItem($strTableName, 'communication_list_id', $strAliasPrefix . 'communication_list_id');
			$objBuilder->AddSelectItem($strTableName, 'subject', $strAliasPrefix . 'subject');
			$objBuilder->AddSelectItem($strTableName, 'response_message', $strAliasPrefix . 'response_message');
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
			$strAliasName = array_key_exists($strAliasPrefix . 'raw_message', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'raw_message'] : $strAliasPrefix . 'raw_message';
			$objToReturn->strRawMessage = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_received', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_received'] : $strAliasPrefix . 'date_received';
			$objToReturn->dttDateReceived = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'received_from_person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'received_from_person_id'] : $strAliasPrefix . 'received_from_person_id';
			$objToReturn->intReceivedFromPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'received_from_entry_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'received_from_entry_id'] : $strAliasPrefix . 'received_from_entry_id';
			$objToReturn->intReceivedFromEntryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'group_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'group_id'] : $strAliasPrefix . 'group_id';
			$objToReturn->intGroupId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'communication_list_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'communication_list_id'] : $strAliasPrefix . 'communication_list_id';
			$objToReturn->intCommunicationListId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'subject', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'subject'] : $strAliasPrefix . 'subject';
			$objToReturn->strSubject = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'response_message', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'response_message'] : $strAliasPrefix . 'response_message';
			$objToReturn->strResponseMessage = $objDbRow->GetColumn($strAliasName, 'Blob');

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

			// Check for ReceivedFromPerson Early Binding
			$strAlias = $strAliasPrefix . 'received_from_person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objReceivedFromPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'received_from_person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ReceivedFromEntry Early Binding
			$strAlias = $strAliasPrefix . 'received_from_entry_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objReceivedFromEntry = CommunicationListEntry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'received_from_entry_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Group Early Binding
			$strAlias = $strAliasPrefix . 'group_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objGroup = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'group_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CommunicationList Early Binding
			$strAlias = $strAliasPrefix . 'communication_list_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCommunicationList = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communication_list_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




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
		public static function LoadById($intId) {
			return EmailMessage::QuerySingle(
				QQ::Equal(QQN::EmailMessage()->Id, $intId)
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
					$objOptionalClauses);
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
		public static function CountByEmailMessageStatusTypeId($intEmailMessageStatusTypeId) {
			// Call EmailMessage::QueryCount to perform the CountByEmailMessageStatusTypeId query
			return EmailMessage::QueryCount(
				QQ::Equal(QQN::EmailMessage()->EmailMessageStatusTypeId, $intEmailMessageStatusTypeId)
			);
		}
			
		/**
		 * Load an array of EmailMessage objects,
		 * by ReceivedFromPersonId Index(es)
		 * @param integer $intReceivedFromPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessage[]
		*/
		public static function LoadArrayByReceivedFromPersonId($intReceivedFromPersonId, $objOptionalClauses = null) {
			// Call EmailMessage::QueryArray to perform the LoadArrayByReceivedFromPersonId query
			try {
				return EmailMessage::QueryArray(
					QQ::Equal(QQN::EmailMessage()->ReceivedFromPersonId, $intReceivedFromPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailMessages
		 * by ReceivedFromPersonId Index(es)
		 * @param integer $intReceivedFromPersonId
		 * @return int
		*/
		public static function CountByReceivedFromPersonId($intReceivedFromPersonId) {
			// Call EmailMessage::QueryCount to perform the CountByReceivedFromPersonId query
			return EmailMessage::QueryCount(
				QQ::Equal(QQN::EmailMessage()->ReceivedFromPersonId, $intReceivedFromPersonId)
			);
		}
			
		/**
		 * Load an array of EmailMessage objects,
		 * by ReceivedFromEntryId Index(es)
		 * @param integer $intReceivedFromEntryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessage[]
		*/
		public static function LoadArrayByReceivedFromEntryId($intReceivedFromEntryId, $objOptionalClauses = null) {
			// Call EmailMessage::QueryArray to perform the LoadArrayByReceivedFromEntryId query
			try {
				return EmailMessage::QueryArray(
					QQ::Equal(QQN::EmailMessage()->ReceivedFromEntryId, $intReceivedFromEntryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailMessages
		 * by ReceivedFromEntryId Index(es)
		 * @param integer $intReceivedFromEntryId
		 * @return int
		*/
		public static function CountByReceivedFromEntryId($intReceivedFromEntryId) {
			// Call EmailMessage::QueryCount to perform the CountByReceivedFromEntryId query
			return EmailMessage::QueryCount(
				QQ::Equal(QQN::EmailMessage()->ReceivedFromEntryId, $intReceivedFromEntryId)
			);
		}
			
		/**
		 * Load an array of EmailMessage objects,
		 * by GroupId Index(es)
		 * @param integer $intGroupId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessage[]
		*/
		public static function LoadArrayByGroupId($intGroupId, $objOptionalClauses = null) {
			// Call EmailMessage::QueryArray to perform the LoadArrayByGroupId query
			try {
				return EmailMessage::QueryArray(
					QQ::Equal(QQN::EmailMessage()->GroupId, $intGroupId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailMessages
		 * by GroupId Index(es)
		 * @param integer $intGroupId
		 * @return int
		*/
		public static function CountByGroupId($intGroupId) {
			// Call EmailMessage::QueryCount to perform the CountByGroupId query
			return EmailMessage::QueryCount(
				QQ::Equal(QQN::EmailMessage()->GroupId, $intGroupId)
			);
		}
			
		/**
		 * Load an array of EmailMessage objects,
		 * by CommunicationListId Index(es)
		 * @param integer $intCommunicationListId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessage[]
		*/
		public static function LoadArrayByCommunicationListId($intCommunicationListId, $objOptionalClauses = null) {
			// Call EmailMessage::QueryArray to perform the LoadArrayByCommunicationListId query
			try {
				return EmailMessage::QueryArray(
					QQ::Equal(QQN::EmailMessage()->CommunicationListId, $intCommunicationListId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailMessages
		 * by CommunicationListId Index(es)
		 * @param integer $intCommunicationListId
		 * @return int
		*/
		public static function CountByCommunicationListId($intCommunicationListId) {
			// Call EmailMessage::QueryCount to perform the CountByCommunicationListId query
			return EmailMessage::QueryCount(
				QQ::Equal(QQN::EmailMessage()->CommunicationListId, $intCommunicationListId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

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
							`raw_message`,
							`date_received`,
							`received_from_person_id`,
							`received_from_entry_id`,
							`group_id`,
							`communication_list_id`,
							`subject`,
							`response_message`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intEmailMessageStatusTypeId) . ',
							' . $objDatabase->SqlVariable($this->strRawMessage) . ',
							' . $objDatabase->SqlVariable($this->dttDateReceived) . ',
							' . $objDatabase->SqlVariable($this->intReceivedFromPersonId) . ',
							' . $objDatabase->SqlVariable($this->intReceivedFromEntryId) . ',
							' . $objDatabase->SqlVariable($this->intGroupId) . ',
							' . $objDatabase->SqlVariable($this->intCommunicationListId) . ',
							' . $objDatabase->SqlVariable($this->strSubject) . ',
							' . $objDatabase->SqlVariable($this->strResponseMessage) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('email_message', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`email_message`
						SET
							`email_message_status_type_id` = ' . $objDatabase->SqlVariable($this->intEmailMessageStatusTypeId) . ',
							`raw_message` = ' . $objDatabase->SqlVariable($this->strRawMessage) . ',
							`date_received` = ' . $objDatabase->SqlVariable($this->dttDateReceived) . ',
							`received_from_person_id` = ' . $objDatabase->SqlVariable($this->intReceivedFromPersonId) . ',
							`received_from_entry_id` = ' . $objDatabase->SqlVariable($this->intReceivedFromEntryId) . ',
							`group_id` = ' . $objDatabase->SqlVariable($this->intGroupId) . ',
							`communication_list_id` = ' . $objDatabase->SqlVariable($this->intCommunicationListId) . ',
							`subject` = ' . $objDatabase->SqlVariable($this->strSubject) . ',
							`response_message` = ' . $objDatabase->SqlVariable($this->strResponseMessage) . '
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
			$this->strRawMessage = $objReloaded->strRawMessage;
			$this->dttDateReceived = $objReloaded->dttDateReceived;
			$this->ReceivedFromPersonId = $objReloaded->ReceivedFromPersonId;
			$this->ReceivedFromEntryId = $objReloaded->ReceivedFromEntryId;
			$this->GroupId = $objReloaded->GroupId;
			$this->CommunicationListId = $objReloaded->CommunicationListId;
			$this->strSubject = $objReloaded->strSubject;
			$this->strResponseMessage = $objReloaded->strResponseMessage;
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

				case 'RawMessage':
					// Gets the value for strRawMessage 
					// @return string
					return $this->strRawMessage;

				case 'DateReceived':
					// Gets the value for dttDateReceived (Not Null)
					// @return QDateTime
					return $this->dttDateReceived;

				case 'ReceivedFromPersonId':
					// Gets the value for intReceivedFromPersonId 
					// @return integer
					return $this->intReceivedFromPersonId;

				case 'ReceivedFromEntryId':
					// Gets the value for intReceivedFromEntryId 
					// @return integer
					return $this->intReceivedFromEntryId;

				case 'GroupId':
					// Gets the value for intGroupId 
					// @return integer
					return $this->intGroupId;

				case 'CommunicationListId':
					// Gets the value for intCommunicationListId 
					// @return integer
					return $this->intCommunicationListId;

				case 'Subject':
					// Gets the value for strSubject 
					// @return string
					return $this->strSubject;

				case 'ResponseMessage':
					// Gets the value for strResponseMessage 
					// @return string
					return $this->strResponseMessage;


				///////////////////
				// Member Objects
				///////////////////
				case 'ReceivedFromPerson':
					// Gets the value for the Person object referenced by intReceivedFromPersonId 
					// @return Person
					try {
						if ((!$this->objReceivedFromPerson) && (!is_null($this->intReceivedFromPersonId)))
							$this->objReceivedFromPerson = Person::Load($this->intReceivedFromPersonId);
						return $this->objReceivedFromPerson;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceivedFromEntry':
					// Gets the value for the CommunicationListEntry object referenced by intReceivedFromEntryId 
					// @return CommunicationListEntry
					try {
						if ((!$this->objReceivedFromEntry) && (!is_null($this->intReceivedFromEntryId)))
							$this->objReceivedFromEntry = CommunicationListEntry::Load($this->intReceivedFromEntryId);
						return $this->objReceivedFromEntry;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Group':
					// Gets the value for the Group object referenced by intGroupId 
					// @return Group
					try {
						if ((!$this->objGroup) && (!is_null($this->intGroupId)))
							$this->objGroup = Group::Load($this->intGroupId);
						return $this->objGroup;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CommunicationList':
					// Gets the value for the CommunicationList object referenced by intCommunicationListId 
					// @return CommunicationList
					try {
						if ((!$this->objCommunicationList) && (!is_null($this->intCommunicationListId)))
							$this->objCommunicationList = CommunicationList::Load($this->intCommunicationListId);
						return $this->objCommunicationList;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

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

				case 'RawMessage':
					// Sets the value for strRawMessage 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strRawMessage = QType::Cast($mixValue, QType::String));
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

				case 'ReceivedFromPersonId':
					// Sets the value for intReceivedFromPersonId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objReceivedFromPerson = null;
						return ($this->intReceivedFromPersonId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceivedFromEntryId':
					// Sets the value for intReceivedFromEntryId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objReceivedFromEntry = null;
						return ($this->intReceivedFromEntryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GroupId':
					// Sets the value for intGroupId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objGroup = null;
						return ($this->intGroupId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CommunicationListId':
					// Sets the value for intCommunicationListId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCommunicationList = null;
						return ($this->intCommunicationListId = QType::Cast($mixValue, QType::Integer));
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

				case 'ResponseMessage':
					// Sets the value for strResponseMessage 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strResponseMessage = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ReceivedFromPerson':
					// Sets the value for the Person object referenced by intReceivedFromPersonId 
					// @param Person $mixValue
					// @return Person
					if (is_null($mixValue)) {
						$this->intReceivedFromPersonId = null;
						$this->objReceivedFromPerson = null;
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
							throw new QCallerException('Unable to set an unsaved ReceivedFromPerson for this EmailMessage');

						// Update Local Member Variables
						$this->objReceivedFromPerson = $mixValue;
						$this->intReceivedFromPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ReceivedFromEntry':
					// Sets the value for the CommunicationListEntry object referenced by intReceivedFromEntryId 
					// @param CommunicationListEntry $mixValue
					// @return CommunicationListEntry
					if (is_null($mixValue)) {
						$this->intReceivedFromEntryId = null;
						$this->objReceivedFromEntry = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CommunicationListEntry object
						try {
							$mixValue = QType::Cast($mixValue, 'CommunicationListEntry');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED CommunicationListEntry object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ReceivedFromEntry for this EmailMessage');

						// Update Local Member Variables
						$this->objReceivedFromEntry = $mixValue;
						$this->intReceivedFromEntryId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Group':
					// Sets the value for the Group object referenced by intGroupId 
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
							throw new QCallerException('Unable to set an unsaved Group for this EmailMessage');

						// Update Local Member Variables
						$this->objGroup = $mixValue;
						$this->intGroupId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CommunicationList':
					// Sets the value for the CommunicationList object referenced by intCommunicationListId 
					// @param CommunicationList $mixValue
					// @return CommunicationList
					if (is_null($mixValue)) {
						$this->intCommunicationListId = null;
						$this->objCommunicationList = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CommunicationList object
						try {
							$mixValue = QType::Cast($mixValue, 'CommunicationList');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED CommunicationList object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved CommunicationList for this EmailMessage');

						// Update Local Member Variables
						$this->objCommunicationList = $mixValue;
						$this->intCommunicationListId = $mixValue->Id;

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
			$strToReturn .= '<element name="RawMessage" type="xsd:string"/>';
			$strToReturn .= '<element name="DateReceived" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ReceivedFromPerson" type="xsd1:Person"/>';
			$strToReturn .= '<element name="ReceivedFromEntry" type="xsd1:CommunicationListEntry"/>';
			$strToReturn .= '<element name="Group" type="xsd1:Group"/>';
			$strToReturn .= '<element name="CommunicationList" type="xsd1:CommunicationList"/>';
			$strToReturn .= '<element name="Subject" type="xsd:string"/>';
			$strToReturn .= '<element name="ResponseMessage" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('EmailMessage', $strComplexTypeArray)) {
				$strComplexTypeArray['EmailMessage'] = EmailMessage::GetSoapComplexTypeXml();
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				CommunicationListEntry::AlterSoapComplexTypeArray($strComplexTypeArray);
				Group::AlterSoapComplexTypeArray($strComplexTypeArray);
				CommunicationList::AlterSoapComplexTypeArray($strComplexTypeArray);
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
			if (property_exists($objSoapObject, 'RawMessage'))
				$objToReturn->strRawMessage = $objSoapObject->RawMessage;
			if (property_exists($objSoapObject, 'DateReceived'))
				$objToReturn->dttDateReceived = new QDateTime($objSoapObject->DateReceived);
			if ((property_exists($objSoapObject, 'ReceivedFromPerson')) &&
				($objSoapObject->ReceivedFromPerson))
				$objToReturn->ReceivedFromPerson = Person::GetObjectFromSoapObject($objSoapObject->ReceivedFromPerson);
			if ((property_exists($objSoapObject, 'ReceivedFromEntry')) &&
				($objSoapObject->ReceivedFromEntry))
				$objToReturn->ReceivedFromEntry = CommunicationListEntry::GetObjectFromSoapObject($objSoapObject->ReceivedFromEntry);
			if ((property_exists($objSoapObject, 'Group')) &&
				($objSoapObject->Group))
				$objToReturn->Group = Group::GetObjectFromSoapObject($objSoapObject->Group);
			if ((property_exists($objSoapObject, 'CommunicationList')) &&
				($objSoapObject->CommunicationList))
				$objToReturn->CommunicationList = CommunicationList::GetObjectFromSoapObject($objSoapObject->CommunicationList);
			if (property_exists($objSoapObject, 'Subject'))
				$objToReturn->strSubject = $objSoapObject->Subject;
			if (property_exists($objSoapObject, 'ResponseMessage'))
				$objToReturn->strResponseMessage = $objSoapObject->ResponseMessage;
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
			if ($objObject->objReceivedFromPerson)
				$objObject->objReceivedFromPerson = Person::GetSoapObjectFromObject($objObject->objReceivedFromPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intReceivedFromPersonId = null;
			if ($objObject->objReceivedFromEntry)
				$objObject->objReceivedFromEntry = CommunicationListEntry::GetSoapObjectFromObject($objObject->objReceivedFromEntry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intReceivedFromEntryId = null;
			if ($objObject->objGroup)
				$objObject->objGroup = Group::GetSoapObjectFromObject($objObject->objGroup, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGroupId = null;
			if ($objObject->objCommunicationList)
				$objObject->objCommunicationList = CommunicationList::GetSoapObjectFromObject($objObject->objCommunicationList, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCommunicationListId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

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
				case 'RawMessage':
					return new QQNode('raw_message', 'RawMessage', 'string', $this);
				case 'DateReceived':
					return new QQNode('date_received', 'DateReceived', 'QDateTime', $this);
				case 'ReceivedFromPersonId':
					return new QQNode('received_from_person_id', 'ReceivedFromPersonId', 'integer', $this);
				case 'ReceivedFromPerson':
					return new QQNodePerson('received_from_person_id', 'ReceivedFromPerson', 'integer', $this);
				case 'ReceivedFromEntryId':
					return new QQNode('received_from_entry_id', 'ReceivedFromEntryId', 'integer', $this);
				case 'ReceivedFromEntry':
					return new QQNodeCommunicationListEntry('received_from_entry_id', 'ReceivedFromEntry', 'integer', $this);
				case 'GroupId':
					return new QQNode('group_id', 'GroupId', 'integer', $this);
				case 'Group':
					return new QQNodeGroup('group_id', 'Group', 'integer', $this);
				case 'CommunicationListId':
					return new QQNode('communication_list_id', 'CommunicationListId', 'integer', $this);
				case 'CommunicationList':
					return new QQNodeCommunicationList('communication_list_id', 'CommunicationList', 'integer', $this);
				case 'Subject':
					return new QQNode('subject', 'Subject', 'string', $this);
				case 'ResponseMessage':
					return new QQNode('response_message', 'ResponseMessage', 'string', $this);
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
				case 'RawMessage':
					return new QQNode('raw_message', 'RawMessage', 'string', $this);
				case 'DateReceived':
					return new QQNode('date_received', 'DateReceived', 'QDateTime', $this);
				case 'ReceivedFromPersonId':
					return new QQNode('received_from_person_id', 'ReceivedFromPersonId', 'integer', $this);
				case 'ReceivedFromPerson':
					return new QQNodePerson('received_from_person_id', 'ReceivedFromPerson', 'integer', $this);
				case 'ReceivedFromEntryId':
					return new QQNode('received_from_entry_id', 'ReceivedFromEntryId', 'integer', $this);
				case 'ReceivedFromEntry':
					return new QQNodeCommunicationListEntry('received_from_entry_id', 'ReceivedFromEntry', 'integer', $this);
				case 'GroupId':
					return new QQNode('group_id', 'GroupId', 'integer', $this);
				case 'Group':
					return new QQNodeGroup('group_id', 'Group', 'integer', $this);
				case 'CommunicationListId':
					return new QQNode('communication_list_id', 'CommunicationListId', 'integer', $this);
				case 'CommunicationList':
					return new QQNodeCommunicationList('communication_list_id', 'CommunicationList', 'integer', $this);
				case 'Subject':
					return new QQNode('subject', 'Subject', 'string', $this);
				case 'ResponseMessage':
					return new QQNode('response_message', 'ResponseMessage', 'string', $this);
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