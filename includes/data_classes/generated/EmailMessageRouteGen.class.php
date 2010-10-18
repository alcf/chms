<?php
	/**
	 * The abstract EmailMessageRouteGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the EmailMessageRoute subclass which
	 * extends this EmailMessageRouteGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the EmailMessageRoute class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $EmailMessageId the value for intEmailMessageId (Not Null)
	 * @property integer $GroupId the value for intGroupId 
	 * @property integer $CommunicationListId the value for intCommunicationListId 
	 * @property integer $LoginId the value for intLoginId 
	 * @property integer $CommunicationListEntryId the value for intCommunicationListEntryId 
	 * @property integer $PersonId the value for intPersonId 
	 * @property EmailMessage $EmailMessage the value for the EmailMessage object referenced by intEmailMessageId (Not Null)
	 * @property Group $Group the value for the Group object referenced by intGroupId 
	 * @property CommunicationList $CommunicationList the value for the CommunicationList object referenced by intCommunicationListId 
	 * @property Login $Login the value for the Login object referenced by intLoginId 
	 * @property CommunicationListEntry $CommunicationListEntry the value for the CommunicationListEntry object referenced by intCommunicationListEntryId 
	 * @property Person $Person the value for the Person object referenced by intPersonId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class EmailMessageRouteGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column email_message_route.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message_route.email_message_id
		 * @var integer intEmailMessageId
		 */
		protected $intEmailMessageId;
		const EmailMessageIdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message_route.group_id
		 * @var integer intGroupId
		 */
		protected $intGroupId;
		const GroupIdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message_route.communication_list_id
		 * @var integer intCommunicationListId
		 */
		protected $intCommunicationListId;
		const CommunicationListIdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message_route.login_id
		 * @var integer intLoginId
		 */
		protected $intLoginId;
		const LoginIdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message_route.communication_list_entry_id
		 * @var integer intCommunicationListEntryId
		 */
		protected $intCommunicationListEntryId;
		const CommunicationListEntryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column email_message_route.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


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
		 * in the database column email_message_route.email_message_id.
		 *
		 * NOTE: Always use the EmailMessage property getter to correctly retrieve this EmailMessage object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var EmailMessage objEmailMessage
		 */
		protected $objEmailMessage;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column email_message_route.group_id.
		 *
		 * NOTE: Always use the Group property getter to correctly retrieve this Group object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Group objGroup
		 */
		protected $objGroup;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column email_message_route.communication_list_id.
		 *
		 * NOTE: Always use the CommunicationList property getter to correctly retrieve this CommunicationList object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CommunicationList objCommunicationList
		 */
		protected $objCommunicationList;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column email_message_route.login_id.
		 *
		 * NOTE: Always use the Login property getter to correctly retrieve this Login object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Login objLogin
		 */
		protected $objLogin;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column email_message_route.communication_list_entry_id.
		 *
		 * NOTE: Always use the CommunicationListEntry property getter to correctly retrieve this CommunicationListEntry object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CommunicationListEntry objCommunicationListEntry
		 */
		protected $objCommunicationListEntry;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column email_message_route.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;





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
		 * Load a EmailMessageRoute from PK Info
		 * @param integer $intId
		 * @return EmailMessageRoute
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return EmailMessageRoute::QuerySingle(
				QQ::Equal(QQN::EmailMessageRoute()->Id, $intId)
			);
		}

		/**
		 * Load all EmailMessageRoutes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessageRoute[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call EmailMessageRoute::QueryArray to perform the LoadAll query
			try {
				return EmailMessageRoute::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all EmailMessageRoutes
		 * @return int
		 */
		public static function CountAll() {
			// Call EmailMessageRoute::QueryCount to perform the CountAll query
			return EmailMessageRoute::QueryCount(QQ::All());
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
			$objDatabase = EmailMessageRoute::GetDatabase();

			// Create/Build out the QueryBuilder object with EmailMessageRoute-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'email_message_route');
			EmailMessageRoute::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('email_message_route');

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
		 * Static Qcodo Query method to query for a single EmailMessageRoute object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EmailMessageRoute the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailMessageRoute::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new EmailMessageRoute object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = EmailMessageRoute::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return EmailMessageRoute::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of EmailMessageRoute objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EmailMessageRoute[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailMessageRoute::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return EmailMessageRoute::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = EmailMessageRoute::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of EmailMessageRoute objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmailMessageRoute::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = EmailMessageRoute::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'email_message_route_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with EmailMessageRoute-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				EmailMessageRoute::GetSelectFields($objQueryBuilder);
				EmailMessageRoute::GetFromFields($objQueryBuilder);

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
			return EmailMessageRoute::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this EmailMessageRoute
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'email_message_route';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'email_message_id', $strAliasPrefix . 'email_message_id');
			$objBuilder->AddSelectItem($strTableName, 'group_id', $strAliasPrefix . 'group_id');
			$objBuilder->AddSelectItem($strTableName, 'communication_list_id', $strAliasPrefix . 'communication_list_id');
			$objBuilder->AddSelectItem($strTableName, 'login_id', $strAliasPrefix . 'login_id');
			$objBuilder->AddSelectItem($strTableName, 'communication_list_entry_id', $strAliasPrefix . 'communication_list_entry_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a EmailMessageRoute from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this EmailMessageRoute::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return EmailMessageRoute
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the EmailMessageRoute object
			$objToReturn = new EmailMessageRoute();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'email_message_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email_message_id'] : $strAliasPrefix . 'email_message_id';
			$objToReturn->intEmailMessageId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'group_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'group_id'] : $strAliasPrefix . 'group_id';
			$objToReturn->intGroupId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'communication_list_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'communication_list_id'] : $strAliasPrefix . 'communication_list_id';
			$objToReturn->intCommunicationListId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'login_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'login_id'] : $strAliasPrefix . 'login_id';
			$objToReturn->intLoginId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'communication_list_entry_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'communication_list_entry_id'] : $strAliasPrefix . 'communication_list_entry_id';
			$objToReturn->intCommunicationListEntryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'email_message_route__';

			// Check for EmailMessage Early Binding
			$strAlias = $strAliasPrefix . 'email_message_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objEmailMessage = EmailMessage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'email_message_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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

			// Check for Login Early Binding
			$strAlias = $strAliasPrefix . 'login_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objLogin = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'login_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CommunicationListEntry Early Binding
			$strAlias = $strAliasPrefix . 'communication_list_entry_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCommunicationListEntry = CommunicationListEntry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communication_list_entry_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of EmailMessageRoutes from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return EmailMessageRoute[]
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
					$objItem = EmailMessageRoute::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = EmailMessageRoute::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single EmailMessageRoute object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return EmailMessageRoute next row resulting from the query
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
			return EmailMessageRoute::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single EmailMessageRoute object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return EmailMessageRoute
		*/
		public static function LoadById($intId) {
			return EmailMessageRoute::QuerySingle(
				QQ::Equal(QQN::EmailMessageRoute()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of EmailMessageRoute objects,
		 * by EmailMessageId Index(es)
		 * @param integer $intEmailMessageId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessageRoute[]
		*/
		public static function LoadArrayByEmailMessageId($intEmailMessageId, $objOptionalClauses = null) {
			// Call EmailMessageRoute::QueryArray to perform the LoadArrayByEmailMessageId query
			try {
				return EmailMessageRoute::QueryArray(
					QQ::Equal(QQN::EmailMessageRoute()->EmailMessageId, $intEmailMessageId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailMessageRoutes
		 * by EmailMessageId Index(es)
		 * @param integer $intEmailMessageId
		 * @return int
		*/
		public static function CountByEmailMessageId($intEmailMessageId) {
			// Call EmailMessageRoute::QueryCount to perform the CountByEmailMessageId query
			return EmailMessageRoute::QueryCount(
				QQ::Equal(QQN::EmailMessageRoute()->EmailMessageId, $intEmailMessageId)
			);
		}
			
		/**
		 * Load an array of EmailMessageRoute objects,
		 * by GroupId Index(es)
		 * @param integer $intGroupId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessageRoute[]
		*/
		public static function LoadArrayByGroupId($intGroupId, $objOptionalClauses = null) {
			// Call EmailMessageRoute::QueryArray to perform the LoadArrayByGroupId query
			try {
				return EmailMessageRoute::QueryArray(
					QQ::Equal(QQN::EmailMessageRoute()->GroupId, $intGroupId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailMessageRoutes
		 * by GroupId Index(es)
		 * @param integer $intGroupId
		 * @return int
		*/
		public static function CountByGroupId($intGroupId) {
			// Call EmailMessageRoute::QueryCount to perform the CountByGroupId query
			return EmailMessageRoute::QueryCount(
				QQ::Equal(QQN::EmailMessageRoute()->GroupId, $intGroupId)
			);
		}
			
		/**
		 * Load an array of EmailMessageRoute objects,
		 * by CommunicationListId Index(es)
		 * @param integer $intCommunicationListId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessageRoute[]
		*/
		public static function LoadArrayByCommunicationListId($intCommunicationListId, $objOptionalClauses = null) {
			// Call EmailMessageRoute::QueryArray to perform the LoadArrayByCommunicationListId query
			try {
				return EmailMessageRoute::QueryArray(
					QQ::Equal(QQN::EmailMessageRoute()->CommunicationListId, $intCommunicationListId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailMessageRoutes
		 * by CommunicationListId Index(es)
		 * @param integer $intCommunicationListId
		 * @return int
		*/
		public static function CountByCommunicationListId($intCommunicationListId) {
			// Call EmailMessageRoute::QueryCount to perform the CountByCommunicationListId query
			return EmailMessageRoute::QueryCount(
				QQ::Equal(QQN::EmailMessageRoute()->CommunicationListId, $intCommunicationListId)
			);
		}
			
		/**
		 * Load an array of EmailMessageRoute objects,
		 * by LoginId Index(es)
		 * @param integer $intLoginId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessageRoute[]
		*/
		public static function LoadArrayByLoginId($intLoginId, $objOptionalClauses = null) {
			// Call EmailMessageRoute::QueryArray to perform the LoadArrayByLoginId query
			try {
				return EmailMessageRoute::QueryArray(
					QQ::Equal(QQN::EmailMessageRoute()->LoginId, $intLoginId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailMessageRoutes
		 * by LoginId Index(es)
		 * @param integer $intLoginId
		 * @return int
		*/
		public static function CountByLoginId($intLoginId) {
			// Call EmailMessageRoute::QueryCount to perform the CountByLoginId query
			return EmailMessageRoute::QueryCount(
				QQ::Equal(QQN::EmailMessageRoute()->LoginId, $intLoginId)
			);
		}
			
		/**
		 * Load an array of EmailMessageRoute objects,
		 * by CommunicationListEntryId Index(es)
		 * @param integer $intCommunicationListEntryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessageRoute[]
		*/
		public static function LoadArrayByCommunicationListEntryId($intCommunicationListEntryId, $objOptionalClauses = null) {
			// Call EmailMessageRoute::QueryArray to perform the LoadArrayByCommunicationListEntryId query
			try {
				return EmailMessageRoute::QueryArray(
					QQ::Equal(QQN::EmailMessageRoute()->CommunicationListEntryId, $intCommunicationListEntryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailMessageRoutes
		 * by CommunicationListEntryId Index(es)
		 * @param integer $intCommunicationListEntryId
		 * @return int
		*/
		public static function CountByCommunicationListEntryId($intCommunicationListEntryId) {
			// Call EmailMessageRoute::QueryCount to perform the CountByCommunicationListEntryId query
			return EmailMessageRoute::QueryCount(
				QQ::Equal(QQN::EmailMessageRoute()->CommunicationListEntryId, $intCommunicationListEntryId)
			);
		}
			
		/**
		 * Load an array of EmailMessageRoute objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessageRoute[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call EmailMessageRoute::QueryArray to perform the LoadArrayByPersonId query
			try {
				return EmailMessageRoute::QueryArray(
					QQ::Equal(QQN::EmailMessageRoute()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count EmailMessageRoutes
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call EmailMessageRoute::QueryCount to perform the CountByPersonId query
			return EmailMessageRoute::QueryCount(
				QQ::Equal(QQN::EmailMessageRoute()->PersonId, $intPersonId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this EmailMessageRoute
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = EmailMessageRoute::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `email_message_route` (
							`email_message_id`,
							`group_id`,
							`communication_list_id`,
							`login_id`,
							`communication_list_entry_id`,
							`person_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intEmailMessageId) . ',
							' . $objDatabase->SqlVariable($this->intGroupId) . ',
							' . $objDatabase->SqlVariable($this->intCommunicationListId) . ',
							' . $objDatabase->SqlVariable($this->intLoginId) . ',
							' . $objDatabase->SqlVariable($this->intCommunicationListEntryId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('email_message_route', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`email_message_route`
						SET
							`email_message_id` = ' . $objDatabase->SqlVariable($this->intEmailMessageId) . ',
							`group_id` = ' . $objDatabase->SqlVariable($this->intGroupId) . ',
							`communication_list_id` = ' . $objDatabase->SqlVariable($this->intCommunicationListId) . ',
							`login_id` = ' . $objDatabase->SqlVariable($this->intLoginId) . ',
							`communication_list_entry_id` = ' . $objDatabase->SqlVariable($this->intCommunicationListEntryId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
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
		 * Delete this EmailMessageRoute
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this EmailMessageRoute with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = EmailMessageRoute::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message_route`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all EmailMessageRoutes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = EmailMessageRoute::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message_route`');
		}

		/**
		 * Truncate email_message_route table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = EmailMessageRoute::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `email_message_route`');
		}

		/**
		 * Reload this EmailMessageRoute from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved EmailMessageRoute object.');

			// Reload the Object
			$objReloaded = EmailMessageRoute::Load($this->intId);

			// Update $this's local variables to match
			$this->EmailMessageId = $objReloaded->EmailMessageId;
			$this->GroupId = $objReloaded->GroupId;
			$this->CommunicationListId = $objReloaded->CommunicationListId;
			$this->LoginId = $objReloaded->LoginId;
			$this->CommunicationListEntryId = $objReloaded->CommunicationListEntryId;
			$this->PersonId = $objReloaded->PersonId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = EmailMessageRoute::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `email_message_route` (
					`id`,
					`email_message_id`,
					`group_id`,
					`communication_list_id`,
					`login_id`,
					`communication_list_entry_id`,
					`person_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intEmailMessageId) . ',
					' . $objDatabase->SqlVariable($this->intGroupId) . ',
					' . $objDatabase->SqlVariable($this->intCommunicationListId) . ',
					' . $objDatabase->SqlVariable($this->intLoginId) . ',
					' . $objDatabase->SqlVariable($this->intCommunicationListEntryId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
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
		 * @return EmailMessageRoute[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = EmailMessageRoute::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM email_message_route WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return EmailMessageRoute::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return EmailMessageRoute[]
		 */
		public function GetJournal() {
			return EmailMessageRoute::GetJournalForId($this->intId);
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

				case 'GroupId':
					// Gets the value for intGroupId 
					// @return integer
					return $this->intGroupId;

				case 'CommunicationListId':
					// Gets the value for intCommunicationListId 
					// @return integer
					return $this->intCommunicationListId;

				case 'LoginId':
					// Gets the value for intLoginId 
					// @return integer
					return $this->intLoginId;

				case 'CommunicationListEntryId':
					// Gets the value for intCommunicationListEntryId 
					// @return integer
					return $this->intCommunicationListEntryId;

				case 'PersonId':
					// Gets the value for intPersonId 
					// @return integer
					return $this->intPersonId;


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

				case 'Login':
					// Gets the value for the Login object referenced by intLoginId 
					// @return Login
					try {
						if ((!$this->objLogin) && (!is_null($this->intLoginId)))
							$this->objLogin = Login::Load($this->intLoginId);
						return $this->objLogin;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CommunicationListEntry':
					// Gets the value for the CommunicationListEntry object referenced by intCommunicationListEntryId 
					// @return CommunicationListEntry
					try {
						if ((!$this->objCommunicationListEntry) && (!is_null($this->intCommunicationListEntryId)))
							$this->objCommunicationListEntry = CommunicationListEntry::Load($this->intCommunicationListEntryId);
						return $this->objCommunicationListEntry;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Person':
					// Gets the value for the Person object referenced by intPersonId 
					// @return Person
					try {
						if ((!$this->objPerson) && (!is_null($this->intPersonId)))
							$this->objPerson = Person::Load($this->intPersonId);
						return $this->objPerson;
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

				case 'LoginId':
					// Sets the value for intLoginId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objLogin = null;
						return ($this->intLoginId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CommunicationListEntryId':
					// Sets the value for intCommunicationListEntryId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCommunicationListEntry = null;
						return ($this->intCommunicationListEntryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PersonId':
					// Sets the value for intPersonId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPerson = null;
						return ($this->intPersonId = QType::Cast($mixValue, QType::Integer));
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
							throw new QCallerException('Unable to set an unsaved EmailMessage for this EmailMessageRoute');

						// Update Local Member Variables
						$this->objEmailMessage = $mixValue;
						$this->intEmailMessageId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Group for this EmailMessageRoute');

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
							throw new QCallerException('Unable to set an unsaved CommunicationList for this EmailMessageRoute');

						// Update Local Member Variables
						$this->objCommunicationList = $mixValue;
						$this->intCommunicationListId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Login':
					// Sets the value for the Login object referenced by intLoginId 
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
							throw new QCallerException('Unable to set an unsaved Login for this EmailMessageRoute');

						// Update Local Member Variables
						$this->objLogin = $mixValue;
						$this->intLoginId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CommunicationListEntry':
					// Sets the value for the CommunicationListEntry object referenced by intCommunicationListEntryId 
					// @param CommunicationListEntry $mixValue
					// @return CommunicationListEntry
					if (is_null($mixValue)) {
						$this->intCommunicationListEntryId = null;
						$this->objCommunicationListEntry = null;
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
							throw new QCallerException('Unable to set an unsaved CommunicationListEntry for this EmailMessageRoute');

						// Update Local Member Variables
						$this->objCommunicationListEntry = $mixValue;
						$this->intCommunicationListEntryId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Person':
					// Sets the value for the Person object referenced by intPersonId 
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
							throw new QCallerException('Unable to set an unsaved Person for this EmailMessageRoute');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

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
			$strToReturn = '<complexType name="EmailMessageRoute"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="EmailMessage" type="xsd1:EmailMessage"/>';
			$strToReturn .= '<element name="Group" type="xsd1:Group"/>';
			$strToReturn .= '<element name="CommunicationList" type="xsd1:CommunicationList"/>';
			$strToReturn .= '<element name="Login" type="xsd1:Login"/>';
			$strToReturn .= '<element name="CommunicationListEntry" type="xsd1:CommunicationListEntry"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('EmailMessageRoute', $strComplexTypeArray)) {
				$strComplexTypeArray['EmailMessageRoute'] = EmailMessageRoute::GetSoapComplexTypeXml();
				EmailMessage::AlterSoapComplexTypeArray($strComplexTypeArray);
				Group::AlterSoapComplexTypeArray($strComplexTypeArray);
				CommunicationList::AlterSoapComplexTypeArray($strComplexTypeArray);
				Login::AlterSoapComplexTypeArray($strComplexTypeArray);
				CommunicationListEntry::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, EmailMessageRoute::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new EmailMessageRoute();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'EmailMessage')) &&
				($objSoapObject->EmailMessage))
				$objToReturn->EmailMessage = EmailMessage::GetObjectFromSoapObject($objSoapObject->EmailMessage);
			if ((property_exists($objSoapObject, 'Group')) &&
				($objSoapObject->Group))
				$objToReturn->Group = Group::GetObjectFromSoapObject($objSoapObject->Group);
			if ((property_exists($objSoapObject, 'CommunicationList')) &&
				($objSoapObject->CommunicationList))
				$objToReturn->CommunicationList = CommunicationList::GetObjectFromSoapObject($objSoapObject->CommunicationList);
			if ((property_exists($objSoapObject, 'Login')) &&
				($objSoapObject->Login))
				$objToReturn->Login = Login::GetObjectFromSoapObject($objSoapObject->Login);
			if ((property_exists($objSoapObject, 'CommunicationListEntry')) &&
				($objSoapObject->CommunicationListEntry))
				$objToReturn->CommunicationListEntry = CommunicationListEntry::GetObjectFromSoapObject($objSoapObject->CommunicationListEntry);
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, EmailMessageRoute::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objEmailMessage)
				$objObject->objEmailMessage = EmailMessage::GetSoapObjectFromObject($objObject->objEmailMessage, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEmailMessageId = null;
			if ($objObject->objGroup)
				$objObject->objGroup = Group::GetSoapObjectFromObject($objObject->objGroup, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGroupId = null;
			if ($objObject->objCommunicationList)
				$objObject->objCommunicationList = CommunicationList::GetSoapObjectFromObject($objObject->objCommunicationList, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCommunicationListId = null;
			if ($objObject->objLogin)
				$objObject->objLogin = Login::GetSoapObjectFromObject($objObject->objLogin, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intLoginId = null;
			if ($objObject->objCommunicationListEntry)
				$objObject->objCommunicationListEntry = CommunicationListEntry::GetSoapObjectFromObject($objObject->objCommunicationListEntry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCommunicationListEntryId = null;
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $EmailMessageId
	 * @property-read QQNodeEmailMessage $EmailMessage
	 * @property-read QQNode $GroupId
	 * @property-read QQNodeGroup $Group
	 * @property-read QQNode $CommunicationListId
	 * @property-read QQNodeCommunicationList $CommunicationList
	 * @property-read QQNode $LoginId
	 * @property-read QQNodeLogin $Login
	 * @property-read QQNode $CommunicationListEntryId
	 * @property-read QQNodeCommunicationListEntry $CommunicationListEntry
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 */
	class QQNodeEmailMessageRoute extends QQNode {
		protected $strTableName = 'email_message_route';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EmailMessageRoute';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'EmailMessageId':
					return new QQNode('email_message_id', 'EmailMessageId', 'integer', $this);
				case 'EmailMessage':
					return new QQNodeEmailMessage('email_message_id', 'EmailMessage', 'integer', $this);
				case 'GroupId':
					return new QQNode('group_id', 'GroupId', 'integer', $this);
				case 'Group':
					return new QQNodeGroup('group_id', 'Group', 'integer', $this);
				case 'CommunicationListId':
					return new QQNode('communication_list_id', 'CommunicationListId', 'integer', $this);
				case 'CommunicationList':
					return new QQNodeCommunicationList('communication_list_id', 'CommunicationList', 'integer', $this);
				case 'LoginId':
					return new QQNode('login_id', 'LoginId', 'integer', $this);
				case 'Login':
					return new QQNodeLogin('login_id', 'Login', 'integer', $this);
				case 'CommunicationListEntryId':
					return new QQNode('communication_list_entry_id', 'CommunicationListEntryId', 'integer', $this);
				case 'CommunicationListEntry':
					return new QQNodeCommunicationListEntry('communication_list_entry_id', 'CommunicationListEntry', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);

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
	 * @property-read QQNode $EmailMessageId
	 * @property-read QQNodeEmailMessage $EmailMessage
	 * @property-read QQNode $GroupId
	 * @property-read QQNodeGroup $Group
	 * @property-read QQNode $CommunicationListId
	 * @property-read QQNodeCommunicationList $CommunicationList
	 * @property-read QQNode $LoginId
	 * @property-read QQNodeLogin $Login
	 * @property-read QQNode $CommunicationListEntryId
	 * @property-read QQNodeCommunicationListEntry $CommunicationListEntry
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeEmailMessageRoute extends QQReverseReferenceNode {
		protected $strTableName = 'email_message_route';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EmailMessageRoute';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'EmailMessageId':
					return new QQNode('email_message_id', 'EmailMessageId', 'integer', $this);
				case 'EmailMessage':
					return new QQNodeEmailMessage('email_message_id', 'EmailMessage', 'integer', $this);
				case 'GroupId':
					return new QQNode('group_id', 'GroupId', 'integer', $this);
				case 'Group':
					return new QQNodeGroup('group_id', 'Group', 'integer', $this);
				case 'CommunicationListId':
					return new QQNode('communication_list_id', 'CommunicationListId', 'integer', $this);
				case 'CommunicationList':
					return new QQNodeCommunicationList('communication_list_id', 'CommunicationList', 'integer', $this);
				case 'LoginId':
					return new QQNode('login_id', 'LoginId', 'integer', $this);
				case 'Login':
					return new QQNodeLogin('login_id', 'Login', 'integer', $this);
				case 'CommunicationListEntryId':
					return new QQNode('communication_list_entry_id', 'CommunicationListEntryId', 'integer', $this);
				case 'CommunicationListEntry':
					return new QQNodeCommunicationListEntry('communication_list_entry_id', 'CommunicationListEntry', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);

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