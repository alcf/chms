<?php
	/**
	 * The abstract CommunicationListEntryGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the CommunicationListEntry subclass which
	 * extends this CommunicationListEntryGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CommunicationListEntry class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $FirstName the value for strFirstName 
	 * @property string $MiddleName the value for strMiddleName 
	 * @property string $LastName the value for strLastName 
	 * @property string $Email the value for strEmail (Unique)
	 * @property CommunicationList $_CommunicationList the value for the private _objCommunicationList (Read-Only) if set due to an expansion on the communicationlist_communicationlistentry_assn association table
	 * @property CommunicationList[] $_CommunicationListArray the value for the private _objCommunicationListArray (Read-Only) if set due to an ExpandAsArray on the communicationlist_communicationlistentry_assn association table
	 * @property EmailMessageRoute $_EmailMessageRoute the value for the private _objEmailMessageRoute (Read-Only) if set due to an expansion on the email_message_route.communication_list_entry_id reverse relationship
	 * @property EmailMessageRoute[] $_EmailMessageRouteArray the value for the private _objEmailMessageRouteArray (Read-Only) if set due to an ExpandAsArray on the email_message_route.communication_list_entry_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CommunicationListEntryGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column communication_list_entry.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column communication_list_entry.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 100;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column communication_list_entry.middle_name
		 * @var string strMiddleName
		 */
		protected $strMiddleName;
		const MiddleNameMaxLength = 100;
		const MiddleNameDefault = null;


		/**
		 * Protected member variable that maps to the database column communication_list_entry.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 100;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column communication_list_entry.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 200;
		const EmailDefault = null;


		/**
		 * Private member variable that stores a reference to a single CommunicationList object
		 * (of type CommunicationList), if this CommunicationListEntry object was restored with
		 * an expansion on the communicationlist_communicationlistentry_assn association table.
		 * @var CommunicationList _objCommunicationList;
		 */
		private $_objCommunicationList;

		/**
		 * Private member variable that stores a reference to an array of CommunicationList objects
		 * (of type CommunicationList[]), if this CommunicationListEntry object was restored with
		 * an ExpandAsArray on the communicationlist_communicationlistentry_assn association table.
		 * @var CommunicationList[] _objCommunicationListArray;
		 */
		private $_objCommunicationListArray = array();

		/**
		 * Private member variable that stores a reference to a single EmailMessageRoute object
		 * (of type EmailMessageRoute), if this CommunicationListEntry object was restored with
		 * an expansion on the email_message_route association table.
		 * @var EmailMessageRoute _objEmailMessageRoute;
		 */
		private $_objEmailMessageRoute;

		/**
		 * Private member variable that stores a reference to an array of EmailMessageRoute objects
		 * (of type EmailMessageRoute[]), if this CommunicationListEntry object was restored with
		 * an ExpandAsArray on the email_message_route association table.
		 * @var EmailMessageRoute[] _objEmailMessageRouteArray;
		 */
		private $_objEmailMessageRouteArray = array();

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
		 * Load a CommunicationListEntry from PK Info
		 * @param integer $intId
		 * @return CommunicationListEntry
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return CommunicationListEntry::QuerySingle(
				QQ::Equal(QQN::CommunicationListEntry()->Id, $intId)
			);
		}

		/**
		 * Load all CommunicationListEntries
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CommunicationListEntry[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call CommunicationListEntry::QueryArray to perform the LoadAll query
			try {
				return CommunicationListEntry::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all CommunicationListEntries
		 * @return int
		 */
		public static function CountAll() {
			// Call CommunicationListEntry::QueryCount to perform the CountAll query
			return CommunicationListEntry::QueryCount(QQ::All());
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
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Create/Build out the QueryBuilder object with CommunicationListEntry-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'communication_list_entry');
			CommunicationListEntry::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('communication_list_entry');

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
		 * Static Qcodo Query method to query for a single CommunicationListEntry object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CommunicationListEntry the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CommunicationListEntry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new CommunicationListEntry object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = CommunicationListEntry::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return CommunicationListEntry::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of CommunicationListEntry objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CommunicationListEntry[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CommunicationListEntry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return CommunicationListEntry::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = CommunicationListEntry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of CommunicationListEntry objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CommunicationListEntry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'communication_list_entry_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with CommunicationListEntry-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				CommunicationListEntry::GetSelectFields($objQueryBuilder);
				CommunicationListEntry::GetFromFields($objQueryBuilder);

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
			return CommunicationListEntry::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this CommunicationListEntry
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'communication_list_entry';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'middle_name', $strAliasPrefix . 'middle_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a CommunicationListEntry from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this CommunicationListEntry::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return CommunicationListEntry
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
					$strAliasPrefix = 'communication_list_entry__';

				$strAlias = $strAliasPrefix . 'communicationlist__communication_list_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCommunicationListArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCommunicationListArray[$intPreviousChildItemCount - 1];
						$objChildItem = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__communication_list_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCommunicationListArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCommunicationListArray[] = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__communication_list_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


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

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'communication_list_entry__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the CommunicationListEntry object
			$objToReturn = new CommunicationListEntry();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'middle_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'middle_name'] : $strAliasPrefix . 'middle_name';
			$objToReturn->strMiddleName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'communication_list_entry__';



			// Check for CommunicationList Virtual Binding
			$strAlias = $strAliasPrefix . 'communicationlist__communication_list_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCommunicationListArray[] = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__communication_list_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCommunicationList = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__communication_list_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for EmailMessageRoute Virtual Binding
			$strAlias = $strAliasPrefix . 'emailmessageroute__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objEmailMessageRouteArray[] = EmailMessageRoute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailmessageroute__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objEmailMessageRoute = EmailMessageRoute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailmessageroute__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of CommunicationListEntries from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return CommunicationListEntry[]
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
					$objItem = CommunicationListEntry::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = CommunicationListEntry::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single CommunicationListEntry object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return CommunicationListEntry next row resulting from the query
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
			return CommunicationListEntry::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single CommunicationListEntry object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return CommunicationListEntry
		*/
		public static function LoadById($intId) {
			return CommunicationListEntry::QuerySingle(
				QQ::Equal(QQN::CommunicationListEntry()->Id, $intId)
			);
		}
			
		/**
		 * Load a single CommunicationListEntry object,
		 * by Email Index(es)
		 * @param string $strEmail
		 * @return CommunicationListEntry
		*/
		public static function LoadByEmail($strEmail) {
			return CommunicationListEntry::QuerySingle(
				QQ::Equal(QQN::CommunicationListEntry()->Email, $strEmail)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of CommunicationList objects for a given CommunicationList
		 * via the communicationlist_communicationlistentry_assn table
		 * @param integer $intCommunicationListId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CommunicationListEntry[]
		*/
		public static function LoadArrayByCommunicationList($intCommunicationListId, $objOptionalClauses = null) {
			// Call CommunicationListEntry::QueryArray to perform the LoadArrayByCommunicationList query
			try {
				return CommunicationListEntry::QueryArray(
					QQ::Equal(QQN::CommunicationListEntry()->CommunicationList->CommunicationListId, $intCommunicationListId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CommunicationListEntries for a given CommunicationList
		 * via the communicationlist_communicationlistentry_assn table
		 * @param integer $intCommunicationListId
		 * @return int
		*/
		public static function CountByCommunicationList($intCommunicationListId) {
			return CommunicationListEntry::QueryCount(
				QQ::Equal(QQN::CommunicationListEntry()->CommunicationList->CommunicationListId, $intCommunicationListId)
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this CommunicationListEntry
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `communication_list_entry` (
							`first_name`,
							`middle_name`,
							`last_name`,
							`email`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strMiddleName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('communication_list_entry', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`communication_list_entry`
						SET
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`middle_name` = ' . $objDatabase->SqlVariable($this->strMiddleName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . '
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
		 * Delete this CommunicationListEntry
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this CommunicationListEntry with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`communication_list_entry`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all CommunicationListEntries
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`communication_list_entry`');
		}

		/**
		 * Truncate communication_list_entry table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `communication_list_entry`');
		}

		/**
		 * Reload this CommunicationListEntry from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved CommunicationListEntry object.');

			// Reload the Object
			$objReloaded = CommunicationListEntry::Load($this->intId);

			// Update $this's local variables to match
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strMiddleName = $objReloaded->strMiddleName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strEmail = $objReloaded->strEmail;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = CommunicationListEntry::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `communication_list_entry` (
					`id`,
					`first_name`,
					`middle_name`,
					`last_name`,
					`email`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strFirstName) . ',
					' . $objDatabase->SqlVariable($this->strMiddleName) . ',
					' . $objDatabase->SqlVariable($this->strLastName) . ',
					' . $objDatabase->SqlVariable($this->strEmail) . ',
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
		 * @return CommunicationListEntry[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = CommunicationListEntry::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM communication_list_entry WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return CommunicationListEntry::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return CommunicationListEntry[]
		 */
		public function GetJournal() {
			return CommunicationListEntry::GetJournalForId($this->intId);
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

				case 'FirstName':
					// Gets the value for strFirstName 
					// @return string
					return $this->strFirstName;

				case 'MiddleName':
					// Gets the value for strMiddleName 
					// @return string
					return $this->strMiddleName;

				case 'LastName':
					// Gets the value for strLastName 
					// @return string
					return $this->strLastName;

				case 'Email':
					// Gets the value for strEmail (Unique)
					// @return string
					return $this->strEmail;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_CommunicationList':
					// Gets the value for the private _objCommunicationList (Read-Only)
					// if set due to an expansion on the communicationlist_communicationlistentry_assn association table
					// @return CommunicationList
					return $this->_objCommunicationList;

				case '_CommunicationListArray':
					// Gets the value for the private _objCommunicationListArray (Read-Only)
					// if set due to an ExpandAsArray on the communicationlist_communicationlistentry_assn association table
					// @return CommunicationList[]
					return (array) $this->_objCommunicationListArray;

				case '_EmailMessageRoute':
					// Gets the value for the private _objEmailMessageRoute (Read-Only)
					// if set due to an expansion on the email_message_route.communication_list_entry_id reverse relationship
					// @return EmailMessageRoute
					return $this->_objEmailMessageRoute;

				case '_EmailMessageRouteArray':
					// Gets the value for the private _objEmailMessageRouteArray (Read-Only)
					// if set due to an ExpandAsArray on the email_message_route.communication_list_entry_id reverse relationship
					// @return EmailMessageRoute[]
					return (array) $this->_objEmailMessageRouteArray;


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
				case 'FirstName':
					// Sets the value for strFirstName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFirstName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MiddleName':
					// Sets the value for strMiddleName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strMiddleName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastName':
					// Sets the value for strLastName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLastName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					// Sets the value for strEmail (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
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
				return EmailMessageRoute::LoadArrayByCommunicationListEntryId($this->intId, $objOptionalClauses);
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

			return EmailMessageRoute::CountByCommunicationListEntryId($this->intId);
		}

		/**
		 * Associates a EmailMessageRoute
		 * @param EmailMessageRoute $objEmailMessageRoute
		 * @return void
		*/ 
		public function AssociateEmailMessageRoute(EmailMessageRoute $objEmailMessageRoute) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmailMessageRoute on this unsaved CommunicationListEntry.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmailMessageRoute on this CommunicationListEntry with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`communication_list_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objEmailMessageRoute->CommunicationListEntryId = $this->intId;
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved CommunicationListEntry.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this CommunicationListEntry with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`communication_list_entry_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . ' AND
					`communication_list_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objEmailMessageRoute->CommunicationListEntryId = null;
				$objEmailMessageRoute->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all EmailMessageRoutes
		 * @return void
		*/ 
		public function UnassociateAllEmailMessageRoutes() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved CommunicationListEntry.');

			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (EmailMessageRoute::LoadArrayByCommunicationListEntryId($this->intId) as $objEmailMessageRoute) {
					$objEmailMessageRoute->CommunicationListEntryId = null;
					$objEmailMessageRoute->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`communication_list_entry_id` = null
				WHERE
					`communication_list_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EmailMessageRoute
		 * @param EmailMessageRoute $objEmailMessageRoute
		 * @return void
		*/ 
		public function DeleteAssociatedEmailMessageRoute(EmailMessageRoute $objEmailMessageRoute) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved CommunicationListEntry.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this CommunicationListEntry with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message_route`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . ' AND
					`communication_list_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved CommunicationListEntry.');

			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (EmailMessageRoute::LoadArrayByCommunicationListEntryId($this->intId) as $objEmailMessageRoute) {
					$objEmailMessageRoute->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message_route`
				WHERE
					`communication_list_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for CommunicationList
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated CommunicationLists as an array of CommunicationList objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CommunicationList[]
		*/ 
		public function GetCommunicationListArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CommunicationList::LoadArrayByCommunicationListEntry($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated CommunicationLists
		 * @return int
		*/ 
		public function CountCommunicationLists() {
			if ((is_null($this->intId)))
				return 0;

			return CommunicationList::CountByCommunicationListEntry($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific CommunicationList
		 * @param CommunicationList $objCommunicationList
		 * @return bool
		*/
		public function IsCommunicationListAssociated(CommunicationList $objCommunicationList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCommunicationListAssociated on this unsaved CommunicationListEntry.');
			if ((is_null($objCommunicationList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCommunicationListAssociated on this CommunicationListEntry with an unsaved CommunicationList.');

			$intRowCount = CommunicationListEntry::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::CommunicationListEntry()->Id, $this->intId),
					QQ::Equal(QQN::CommunicationListEntry()->CommunicationList->CommunicationListId, $objCommunicationList->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the CommunicationList relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalCommunicationListAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = CommunicationListEntry::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `communicationlist_communicationlistentry_assn` (
					`communication_list_entry_id`,
					`communication_list_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($intAssociatedId) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object's CommunicationList relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalCommunicationListAssociationForId($intId) {
			$objDatabase = CommunicationListEntry::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM communicationlist_communicationlistentry_assn WHERE communication_list_entry_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's CommunicationList relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalCommunicationListAssociation() {
			return CommunicationListEntry::GetJournalCommunicationListAssociationForId($this->intId);
		}

		/**
		 * Associates a CommunicationList
		 * @param CommunicationList $objCommunicationList
		 * @return void
		*/ 
		public function AssociateCommunicationList(CommunicationList $objCommunicationList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCommunicationList on this unsaved CommunicationListEntry.');
			if ((is_null($objCommunicationList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCommunicationList on this CommunicationListEntry with an unsaved CommunicationList.');

			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `communicationlist_communicationlistentry_assn` (
					`communication_list_entry_id`,
					`communication_list_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objCommunicationList->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalCommunicationListAssociation($objCommunicationList->Id, 'INSERT');
		}

		/**
		 * Unassociates a CommunicationList
		 * @param CommunicationList $objCommunicationList
		 * @return void
		*/ 
		public function UnassociateCommunicationList(CommunicationList $objCommunicationList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCommunicationList on this unsaved CommunicationListEntry.');
			if ((is_null($objCommunicationList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCommunicationList on this CommunicationListEntry with an unsaved CommunicationList.');

			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`communicationlist_communicationlistentry_assn`
				WHERE
					`communication_list_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`communication_list_id` = ' . $objDatabase->SqlVariable($objCommunicationList->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalCommunicationListAssociation($objCommunicationList->Id, 'DELETE');
		}

		/**
		 * Unassociates all CommunicationLists
		 * @return void
		*/ 
		public function UnassociateAllCommunicationLists() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllCommunicationListArray on this unsaved CommunicationListEntry.');

			// Get the Database Object for this Class
			$objDatabase = CommunicationListEntry::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `communication_list_id` AS associated_id FROM `communicationlist_communicationlistentry_assn` WHERE `communication_list_entry_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalCommunicationListAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`communicationlist_communicationlistentry_assn`
				WHERE
					`communication_list_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="CommunicationListEntry"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="MiddleName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('CommunicationListEntry', $strComplexTypeArray)) {
				$strComplexTypeArray['CommunicationListEntry'] = CommunicationListEntry::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, CommunicationListEntry::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new CommunicationListEntry();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'MiddleName'))
				$objToReturn->strMiddleName = $objSoapObject->MiddleName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, CommunicationListEntry::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $CommunicationListId
	 * @property-read QQNodeCommunicationList $CommunicationList
	 * @property-read QQNodeCommunicationList $_ChildTableNode
	 */
	class QQNodeCommunicationListEntryCommunicationList extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'communicationlist';

		protected $strTableName = 'communicationlist_communicationlistentry_assn';
		protected $strPrimaryKey = 'communication_list_entry_id';
		protected $strClassName = 'CommunicationList';

		public function __get($strName) {
			switch ($strName) {
				case 'CommunicationListId':
					return new QQNode('communication_list_id', 'CommunicationListId', 'integer', $this);
				case 'CommunicationList':
					return new QQNodeCommunicationList('communication_list_id', 'CommunicationListId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeCommunicationList('communication_list_id', 'CommunicationListId', 'integer', $this);
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
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $MiddleName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Email
	 * @property-read QQNodeCommunicationListEntryCommunicationList $CommunicationList
	 * @property-read QQReverseReferenceNodeEmailMessageRoute $EmailMessageRoute
	 */
	class QQNodeCommunicationListEntry extends QQNode {
		protected $strTableName = 'communication_list_entry';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'CommunicationListEntry';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'MiddleName':
					return new QQNode('middle_name', 'MiddleName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'CommunicationList':
					return new QQNodeCommunicationListEntryCommunicationList($this);
				case 'EmailMessageRoute':
					return new QQReverseReferenceNodeEmailMessageRoute($this, 'emailmessageroute', 'reverse_reference', 'communication_list_entry_id');

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
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $MiddleName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Email
	 * @property-read QQNodeCommunicationListEntryCommunicationList $CommunicationList
	 * @property-read QQReverseReferenceNodeEmailMessageRoute $EmailMessageRoute
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeCommunicationListEntry extends QQReverseReferenceNode {
		protected $strTableName = 'communication_list_entry';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'CommunicationListEntry';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'MiddleName':
					return new QQNode('middle_name', 'MiddleName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'CommunicationList':
					return new QQNodeCommunicationListEntryCommunicationList($this);
				case 'EmailMessageRoute':
					return new QQReverseReferenceNodeEmailMessageRoute($this, 'emailmessageroute', 'reverse_reference', 'communication_list_entry_id');

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