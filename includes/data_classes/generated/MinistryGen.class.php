<?php
	/**
	 * The abstract MinistryGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Ministry subclass which
	 * extends this MinistryGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Ministry class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Token the value for strToken (Unique)
	 * @property string $Name the value for strName 
	 * @property integer $ParentMinistryId the value for intParentMinistryId 
	 * @property boolean $ActiveFlag the value for blnActiveFlag (Not Null)
	 * @property Ministry $ParentMinistry the value for the Ministry object referenced by intParentMinistryId 
	 * @property Login $_Login the value for the private _objLogin (Read-Only) if set due to an expansion on the ministry_login_assn association table
	 * @property Login[] $_LoginArray the value for the private _objLoginArray (Read-Only) if set due to an ExpandAsArray on the ministry_login_assn association table
	 * @property CommunicationList $_CommunicationList the value for the private _objCommunicationList (Read-Only) if set due to an expansion on the communication_list.ministry_id reverse relationship
	 * @property CommunicationList[] $_CommunicationListArray the value for the private _objCommunicationListArray (Read-Only) if set due to an ExpandAsArray on the communication_list.ministry_id reverse relationship
	 * @property Group $_Group the value for the private _objGroup (Read-Only) if set due to an expansion on the group.ministry_id reverse relationship
	 * @property Group[] $_GroupArray the value for the private _objGroupArray (Read-Only) if set due to an ExpandAsArray on the group.ministry_id reverse relationship
	 * @property GroupRole $_GroupRole the value for the private _objGroupRole (Read-Only) if set due to an expansion on the group_role.ministry_id reverse relationship
	 * @property GroupRole[] $_GroupRoleArray the value for the private _objGroupRoleArray (Read-Only) if set due to an ExpandAsArray on the group_role.ministry_id reverse relationship
	 * @property Ministry $_ChildMinistry the value for the private _objChildMinistry (Read-Only) if set due to an expansion on the ministry.parent_ministry_id reverse relationship
	 * @property Ministry[] $_ChildMinistryArray the value for the private _objChildMinistryArray (Read-Only) if set due to an ExpandAsArray on the ministry.parent_ministry_id reverse relationship
	 * @property StewardshipFund $_StewardshipFund the value for the private _objStewardshipFund (Read-Only) if set due to an expansion on the stewardship_fund.ministry_id reverse relationship
	 * @property StewardshipFund[] $_StewardshipFundArray the value for the private _objStewardshipFundArray (Read-Only) if set due to an ExpandAsArray on the stewardship_fund.ministry_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class MinistryGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column ministry.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column ministry.token
		 * @var string strToken
		 */
		protected $strToken;
		const TokenMaxLength = 20;
		const TokenDefault = null;


		/**
		 * Protected member variable that maps to the database column ministry.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 100;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column ministry.parent_ministry_id
		 * @var integer intParentMinistryId
		 */
		protected $intParentMinistryId;
		const ParentMinistryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column ministry.active_flag
		 * @var boolean blnActiveFlag
		 */
		protected $blnActiveFlag;
		const ActiveFlagDefault = null;


		/**
		 * Private member variable that stores a reference to a single Login object
		 * (of type Login), if this Ministry object was restored with
		 * an expansion on the ministry_login_assn association table.
		 * @var Login _objLogin;
		 */
		private $_objLogin;

		/**
		 * Private member variable that stores a reference to an array of Login objects
		 * (of type Login[]), if this Ministry object was restored with
		 * an ExpandAsArray on the ministry_login_assn association table.
		 * @var Login[] _objLoginArray;
		 */
		private $_objLoginArray = array();

		/**
		 * Private member variable that stores a reference to a single CommunicationList object
		 * (of type CommunicationList), if this Ministry object was restored with
		 * an expansion on the communication_list association table.
		 * @var CommunicationList _objCommunicationList;
		 */
		private $_objCommunicationList;

		/**
		 * Private member variable that stores a reference to an array of CommunicationList objects
		 * (of type CommunicationList[]), if this Ministry object was restored with
		 * an ExpandAsArray on the communication_list association table.
		 * @var CommunicationList[] _objCommunicationListArray;
		 */
		private $_objCommunicationListArray = array();

		/**
		 * Private member variable that stores a reference to a single Group object
		 * (of type Group), if this Ministry object was restored with
		 * an expansion on the group association table.
		 * @var Group _objGroup;
		 */
		private $_objGroup;

		/**
		 * Private member variable that stores a reference to an array of Group objects
		 * (of type Group[]), if this Ministry object was restored with
		 * an ExpandAsArray on the group association table.
		 * @var Group[] _objGroupArray;
		 */
		private $_objGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single GroupRole object
		 * (of type GroupRole), if this Ministry object was restored with
		 * an expansion on the group_role association table.
		 * @var GroupRole _objGroupRole;
		 */
		private $_objGroupRole;

		/**
		 * Private member variable that stores a reference to an array of GroupRole objects
		 * (of type GroupRole[]), if this Ministry object was restored with
		 * an ExpandAsArray on the group_role association table.
		 * @var GroupRole[] _objGroupRoleArray;
		 */
		private $_objGroupRoleArray = array();

		/**
		 * Private member variable that stores a reference to a single ChildMinistry object
		 * (of type Ministry), if this Ministry object was restored with
		 * an expansion on the ministry association table.
		 * @var Ministry _objChildMinistry;
		 */
		private $_objChildMinistry;

		/**
		 * Private member variable that stores a reference to an array of ChildMinistry objects
		 * (of type Ministry[]), if this Ministry object was restored with
		 * an ExpandAsArray on the ministry association table.
		 * @var Ministry[] _objChildMinistryArray;
		 */
		private $_objChildMinistryArray = array();

		/**
		 * Private member variable that stores a reference to a single StewardshipFund object
		 * (of type StewardshipFund), if this Ministry object was restored with
		 * an expansion on the stewardship_fund association table.
		 * @var StewardshipFund _objStewardshipFund;
		 */
		private $_objStewardshipFund;

		/**
		 * Private member variable that stores a reference to an array of StewardshipFund objects
		 * (of type StewardshipFund[]), if this Ministry object was restored with
		 * an ExpandAsArray on the stewardship_fund association table.
		 * @var StewardshipFund[] _objStewardshipFundArray;
		 */
		private $_objStewardshipFundArray = array();

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
		 * in the database column ministry.parent_ministry_id.
		 *
		 * NOTE: Always use the ParentMinistry property getter to correctly retrieve this Ministry object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Ministry objParentMinistry
		 */
		protected $objParentMinistry;





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
		 * Load a Ministry from PK Info
		 * @param integer $intId
		 * @return Ministry
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Ministry::QuerySingle(
				QQ::Equal(QQN::Ministry()->Id, $intId)
			);
		}

		/**
		 * Load all Ministries
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ministry[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Ministry::QueryArray to perform the LoadAll query
			try {
				return Ministry::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Ministries
		 * @return int
		 */
		public static function CountAll() {
			// Call Ministry::QueryCount to perform the CountAll query
			return Ministry::QueryCount(QQ::All());
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
			$objDatabase = Ministry::GetDatabase();

			// Create/Build out the QueryBuilder object with Ministry-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'ministry');
			Ministry::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('ministry');

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
		 * Static Qcodo Query method to query for a single Ministry object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Ministry the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ministry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Ministry object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Ministry::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Ministry::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Ministry objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Ministry[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ministry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Ministry::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Ministry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Ministry objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ministry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Ministry::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'ministry_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Ministry-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Ministry::GetSelectFields($objQueryBuilder);
				Ministry::GetFromFields($objQueryBuilder);

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
			return Ministry::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Ministry
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'ministry';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'token', $strAliasPrefix . 'token');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'parent_ministry_id', $strAliasPrefix . 'parent_ministry_id');
			$objBuilder->AddSelectItem($strTableName, 'active_flag', $strAliasPrefix . 'active_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Ministry from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Ministry::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Ministry
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
					$strAliasPrefix = 'ministry__';

				$strAlias = $strAliasPrefix . 'login__login_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLoginArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLoginArray[$intPreviousChildItemCount - 1];
						$objChildItem = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'login__login_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLoginArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLoginArray[] = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'login__login_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				$strAlias = $strAliasPrefix . 'communicationlist__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCommunicationListArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCommunicationListArray[$intPreviousChildItemCount - 1];
						$objChildItem = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCommunicationListArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCommunicationListArray[] = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'group__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'group__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objGroupArray[] = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'group__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'grouprole__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objGroupRoleArray)) {
						$objPreviousChildItem = $objPreviousItem->_objGroupRoleArray[$intPreviousChildItemCount - 1];
						$objChildItem = GroupRole::InstantiateDbRow($objDbRow, $strAliasPrefix . 'grouprole__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objGroupRoleArray[] = $objChildItem;
					} else
						$objPreviousItem->_objGroupRoleArray[] = GroupRole::InstantiateDbRow($objDbRow, $strAliasPrefix . 'grouprole__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'childministry__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objChildMinistryArray)) {
						$objPreviousChildItem = $objPreviousItem->_objChildMinistryArray[$intPreviousChildItemCount - 1];
						$objChildItem = Ministry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childministry__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objChildMinistryArray[] = $objChildItem;
					} else
						$objPreviousItem->_objChildMinistryArray[] = Ministry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childministry__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'stewardshipfund__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStewardshipFundArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStewardshipFundArray[$intPreviousChildItemCount - 1];
						$objChildItem = StewardshipFund::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipfund__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStewardshipFundArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStewardshipFundArray[] = StewardshipFund::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipfund__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'ministry__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Ministry object
			$objToReturn = new Ministry();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'token', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'token'] : $strAliasPrefix . 'token';
			$objToReturn->strToken = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_ministry_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_ministry_id'] : $strAliasPrefix . 'parent_ministry_id';
			$objToReturn->intParentMinistryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'active_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'active_flag'] : $strAliasPrefix . 'active_flag';
			$objToReturn->blnActiveFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'ministry__';

			// Check for ParentMinistry Early Binding
			$strAlias = $strAliasPrefix . 'parent_ministry_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentMinistry = Ministry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_ministry_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for Login Virtual Binding
			$strAlias = $strAliasPrefix . 'login__login_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLoginArray[] = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'login__login_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLogin = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'login__login_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for CommunicationList Virtual Binding
			$strAlias = $strAliasPrefix . 'communicationlist__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCommunicationListArray[] = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCommunicationList = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Group Virtual Binding
			$strAlias = $strAliasPrefix . 'group__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objGroupArray[] = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'group__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objGroup = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'group__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for GroupRole Virtual Binding
			$strAlias = $strAliasPrefix . 'grouprole__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objGroupRoleArray[] = GroupRole::InstantiateDbRow($objDbRow, $strAliasPrefix . 'grouprole__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objGroupRole = GroupRole::InstantiateDbRow($objDbRow, $strAliasPrefix . 'grouprole__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ChildMinistry Virtual Binding
			$strAlias = $strAliasPrefix . 'childministry__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objChildMinistryArray[] = Ministry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childministry__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objChildMinistry = Ministry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childministry__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StewardshipFund Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshipfund__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipFundArray[] = StewardshipFund::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipfund__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipFund = StewardshipFund::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipfund__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Ministries from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Ministry[]
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
					$objItem = Ministry::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Ministry::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Ministry object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Ministry next row resulting from the query
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
			return Ministry::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Ministry object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Ministry
		*/
		public static function LoadById($intId) {
			return Ministry::QuerySingle(
				QQ::Equal(QQN::Ministry()->Id, $intId)
			);
		}
			
		/**
		 * Load a single Ministry object,
		 * by Token Index(es)
		 * @param string $strToken
		 * @return Ministry
		*/
		public static function LoadByToken($strToken) {
			return Ministry::QuerySingle(
				QQ::Equal(QQN::Ministry()->Token, $strToken)
			);
		}
			
		/**
		 * Load an array of Ministry objects,
		 * by ParentMinistryId Index(es)
		 * @param integer $intParentMinistryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ministry[]
		*/
		public static function LoadArrayByParentMinistryId($intParentMinistryId, $objOptionalClauses = null) {
			// Call Ministry::QueryArray to perform the LoadArrayByParentMinistryId query
			try {
				return Ministry::QueryArray(
					QQ::Equal(QQN::Ministry()->ParentMinistryId, $intParentMinistryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Ministries
		 * by ParentMinistryId Index(es)
		 * @param integer $intParentMinistryId
		 * @return int
		*/
		public static function CountByParentMinistryId($intParentMinistryId) {
			// Call Ministry::QueryCount to perform the CountByParentMinistryId query
			return Ministry::QueryCount(
				QQ::Equal(QQN::Ministry()->ParentMinistryId, $intParentMinistryId)
			);
		}
			
		/**
		 * Load an array of Ministry objects,
		 * by ActiveFlag Index(es)
		 * @param boolean $blnActiveFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ministry[]
		*/
		public static function LoadArrayByActiveFlag($blnActiveFlag, $objOptionalClauses = null) {
			// Call Ministry::QueryArray to perform the LoadArrayByActiveFlag query
			try {
				return Ministry::QueryArray(
					QQ::Equal(QQN::Ministry()->ActiveFlag, $blnActiveFlag),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Ministries
		 * by ActiveFlag Index(es)
		 * @param boolean $blnActiveFlag
		 * @return int
		*/
		public static function CountByActiveFlag($blnActiveFlag) {
			// Call Ministry::QueryCount to perform the CountByActiveFlag query
			return Ministry::QueryCount(
				QQ::Equal(QQN::Ministry()->ActiveFlag, $blnActiveFlag)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Login objects for a given Login
		 * via the ministry_login_assn table
		 * @param integer $intLoginId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ministry[]
		*/
		public static function LoadArrayByLogin($intLoginId, $objOptionalClauses = null) {
			// Call Ministry::QueryArray to perform the LoadArrayByLogin query
			try {
				return Ministry::QueryArray(
					QQ::Equal(QQN::Ministry()->Login->LoginId, $intLoginId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Ministries for a given Login
		 * via the ministry_login_assn table
		 * @param integer $intLoginId
		 * @return int
		*/
		public static function CountByLogin($intLoginId) {
			return Ministry::QueryCount(
				QQ::Equal(QQN::Ministry()->Login->LoginId, $intLoginId)
			);
		}




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
				INSERT INTO `ministry` (
					`id`,
					`token`,
					`name`,
					`parent_ministry_id`,
					`active_flag`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strToken) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strName) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intParentMinistryId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->blnActiveFlag) . ',
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
		 * @return Ministry[]
		 */
		public static function GetJournalObjectsForId($intId) {
			$objResult = QApplication::$Database[2]->Query('SELECT * FROM ministry WHERE id = ' .
				QApplication::$Database[2]->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Ministry::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Ministry[]
		 */
		public function GetJournalObjects() {
			return Ministry::GetJournalObjectsForId($this->intId);
		}

		/**
		 * Save this Ministry
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `ministry` (
							`token`,
							`name`,
							`parent_ministry_id`,
							`active_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strToken) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->intParentMinistryId) . ',
							' . $objDatabase->SqlVariable($this->blnActiveFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('ministry', 'id');

					// Journaling
					$this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`ministry`
						SET
							`token` = ' . $objDatabase->SqlVariable($this->strToken) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`parent_ministry_id` = ' . $objDatabase->SqlVariable($this->intParentMinistryId) . ',
							`active_flag` = ' . $objDatabase->SqlVariable($this->blnActiveFlag) . '
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
		 * Delete this Ministry
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Ministry with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ministry`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			$this->Journal('DELETE');
		}

		/**
		 * Delete all Ministries
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ministry`');
		}

		/**
		 * Truncate ministry table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `ministry`');
		}

		/**
		 * Reload this Ministry from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Ministry object.');

			// Reload the Object
			$objReloaded = Ministry::Load($this->intId);

			// Update $this's local variables to match
			$this->strToken = $objReloaded->strToken;
			$this->strName = $objReloaded->strName;
			$this->ParentMinistryId = $objReloaded->ParentMinistryId;
			$this->blnActiveFlag = $objReloaded->blnActiveFlag;
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

				case 'Token':
					// Gets the value for strToken (Unique)
					// @return string
					return $this->strToken;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'ParentMinistryId':
					// Gets the value for intParentMinistryId 
					// @return integer
					return $this->intParentMinistryId;

				case 'ActiveFlag':
					// Gets the value for blnActiveFlag (Not Null)
					// @return boolean
					return $this->blnActiveFlag;


				///////////////////
				// Member Objects
				///////////////////
				case 'ParentMinistry':
					// Gets the value for the Ministry object referenced by intParentMinistryId 
					// @return Ministry
					try {
						if ((!$this->objParentMinistry) && (!is_null($this->intParentMinistryId)))
							$this->objParentMinistry = Ministry::Load($this->intParentMinistryId);
						return $this->objParentMinistry;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Login':
					// Gets the value for the private _objLogin (Read-Only)
					// if set due to an expansion on the ministry_login_assn association table
					// @return Login
					return $this->_objLogin;

				case '_LoginArray':
					// Gets the value for the private _objLoginArray (Read-Only)
					// if set due to an ExpandAsArray on the ministry_login_assn association table
					// @return Login[]
					return (array) $this->_objLoginArray;

				case '_CommunicationList':
					// Gets the value for the private _objCommunicationList (Read-Only)
					// if set due to an expansion on the communication_list.ministry_id reverse relationship
					// @return CommunicationList
					return $this->_objCommunicationList;

				case '_CommunicationListArray':
					// Gets the value for the private _objCommunicationListArray (Read-Only)
					// if set due to an ExpandAsArray on the communication_list.ministry_id reverse relationship
					// @return CommunicationList[]
					return (array) $this->_objCommunicationListArray;

				case '_Group':
					// Gets the value for the private _objGroup (Read-Only)
					// if set due to an expansion on the group.ministry_id reverse relationship
					// @return Group
					return $this->_objGroup;

				case '_GroupArray':
					// Gets the value for the private _objGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the group.ministry_id reverse relationship
					// @return Group[]
					return (array) $this->_objGroupArray;

				case '_GroupRole':
					// Gets the value for the private _objGroupRole (Read-Only)
					// if set due to an expansion on the group_role.ministry_id reverse relationship
					// @return GroupRole
					return $this->_objGroupRole;

				case '_GroupRoleArray':
					// Gets the value for the private _objGroupRoleArray (Read-Only)
					// if set due to an ExpandAsArray on the group_role.ministry_id reverse relationship
					// @return GroupRole[]
					return (array) $this->_objGroupRoleArray;

				case '_ChildMinistry':
					// Gets the value for the private _objChildMinistry (Read-Only)
					// if set due to an expansion on the ministry.parent_ministry_id reverse relationship
					// @return Ministry
					return $this->_objChildMinistry;

				case '_ChildMinistryArray':
					// Gets the value for the private _objChildMinistryArray (Read-Only)
					// if set due to an ExpandAsArray on the ministry.parent_ministry_id reverse relationship
					// @return Ministry[]
					return (array) $this->_objChildMinistryArray;

				case '_StewardshipFund':
					// Gets the value for the private _objStewardshipFund (Read-Only)
					// if set due to an expansion on the stewardship_fund.ministry_id reverse relationship
					// @return StewardshipFund
					return $this->_objStewardshipFund;

				case '_StewardshipFundArray':
					// Gets the value for the private _objStewardshipFundArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_fund.ministry_id reverse relationship
					// @return StewardshipFund[]
					return (array) $this->_objStewardshipFundArray;


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
				case 'Token':
					// Sets the value for strToken (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strToken = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'ParentMinistryId':
					// Sets the value for intParentMinistryId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objParentMinistry = null;
						return ($this->intParentMinistryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ActiveFlag':
					// Sets the value for blnActiveFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnActiveFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ParentMinistry':
					// Sets the value for the Ministry object referenced by intParentMinistryId 
					// @param Ministry $mixValue
					// @return Ministry
					if (is_null($mixValue)) {
						$this->intParentMinistryId = null;
						$this->objParentMinistry = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Ministry object
						try {
							$mixValue = QType::Cast($mixValue, 'Ministry');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Ministry object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ParentMinistry for this Ministry');

						// Update Local Member Variables
						$this->objParentMinistry = $mixValue;
						$this->intParentMinistryId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for CommunicationList
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CommunicationLists as an array of CommunicationList objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CommunicationList[]
		*/ 
		public function GetCommunicationListArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CommunicationList::LoadArrayByMinistryId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CommunicationLists
		 * @return int
		*/ 
		public function CountCommunicationLists() {
			if ((is_null($this->intId)))
				return 0;

			return CommunicationList::CountByMinistryId($this->intId);
		}

		/**
		 * Associates a CommunicationList
		 * @param CommunicationList $objCommunicationList
		 * @return void
		*/ 
		public function AssociateCommunicationList(CommunicationList $objCommunicationList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCommunicationList on this unsaved Ministry.');
			if ((is_null($objCommunicationList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCommunicationList on this Ministry with an unsaved CommunicationList.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`communication_list`
				SET
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCommunicationList->Id) . '
			');

			// Journaling
			$objCommunicationList->MinistryId = $this->intId;
			$objCommunicationList->Journal('UPDATE');
		}

		/**
		 * Unassociates a CommunicationList
		 * @param CommunicationList $objCommunicationList
		 * @return void
		*/ 
		public function UnassociateCommunicationList(CommunicationList $objCommunicationList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCommunicationList on this unsaved Ministry.');
			if ((is_null($objCommunicationList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCommunicationList on this Ministry with an unsaved CommunicationList.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`communication_list`
				SET
					`ministry_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCommunicationList->Id) . ' AND
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objCommunicationList->MinistryId = null;
			$objCommunicationList->Journal('UPDATE');
		}

		/**
		 * Unassociates all CommunicationLists
		 * @return void
		*/ 
		public function UnassociateAllCommunicationLists() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCommunicationList on this unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Journaling
			foreach (CommunicationList::LoadArrayByMinistryId($this->intId) as $objCommunicationList) {
				$objCommunicationList->MinistryId = null;
				$objCommunicationList->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`communication_list`
				SET
					`ministry_id` = null
				WHERE
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CommunicationList
		 * @param CommunicationList $objCommunicationList
		 * @return void
		*/ 
		public function DeleteAssociatedCommunicationList(CommunicationList $objCommunicationList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCommunicationList on this unsaved Ministry.');
			if ((is_null($objCommunicationList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCommunicationList on this Ministry with an unsaved CommunicationList.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`communication_list`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCommunicationList->Id) . ' AND
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objCommunicationList->Journal('DELETE');
		}

		/**
		 * Deletes all associated CommunicationLists
		 * @return void
		*/ 
		public function DeleteAllCommunicationLists() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCommunicationList on this unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Journaling
			foreach (CommunicationList::LoadArrayByMinistryId($this->intId) as $objCommunicationList) {
				$objCommunicationList->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`communication_list`
				WHERE
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Group
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Groups as an array of Group objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Group[]
		*/ 
		public function GetGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Group::LoadArrayByMinistryId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Groups
		 * @return int
		*/ 
		public function CountGroups() {
			if ((is_null($this->intId)))
				return 0;

			return Group::CountByMinistryId($this->intId);
		}

		/**
		 * Associates a Group
		 * @param Group $objGroup
		 * @return void
		*/ 
		public function AssociateGroup(Group $objGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGroup on this unsaved Ministry.');
			if ((is_null($objGroup->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGroup on this Ministry with an unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group`
				SET
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroup->Id) . '
			');

			// Journaling
			$objGroup->MinistryId = $this->intId;
			$objGroup->Journal('UPDATE');
		}

		/**
		 * Unassociates a Group
		 * @param Group $objGroup
		 * @return void
		*/ 
		public function UnassociateGroup(Group $objGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroup on this unsaved Ministry.');
			if ((is_null($objGroup->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroup on this Ministry with an unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group`
				SET
					`ministry_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroup->Id) . ' AND
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objGroup->MinistryId = null;
			$objGroup->Journal('UPDATE');
		}

		/**
		 * Unassociates all Groups
		 * @return void
		*/ 
		public function UnassociateAllGroups() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroup on this unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Journaling
			foreach (Group::LoadArrayByMinistryId($this->intId) as $objGroup) {
				$objGroup->MinistryId = null;
				$objGroup->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group`
				SET
					`ministry_id` = null
				WHERE
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Group
		 * @param Group $objGroup
		 * @return void
		*/ 
		public function DeleteAssociatedGroup(Group $objGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroup on this unsaved Ministry.');
			if ((is_null($objGroup->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroup on this Ministry with an unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroup->Id) . ' AND
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objGroup->Journal('DELETE');
		}

		/**
		 * Deletes all associated Groups
		 * @return void
		*/ 
		public function DeleteAllGroups() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroup on this unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Journaling
			foreach (Group::LoadArrayByMinistryId($this->intId) as $objGroup) {
				$objGroup->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group`
				WHERE
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for GroupRole
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GroupRoles as an array of GroupRole objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GroupRole[]
		*/ 
		public function GetGroupRoleArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GroupRole::LoadArrayByMinistryId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GroupRoles
		 * @return int
		*/ 
		public function CountGroupRoles() {
			if ((is_null($this->intId)))
				return 0;

			return GroupRole::CountByMinistryId($this->intId);
		}

		/**
		 * Associates a GroupRole
		 * @param GroupRole $objGroupRole
		 * @return void
		*/ 
		public function AssociateGroupRole(GroupRole $objGroupRole) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGroupRole on this unsaved Ministry.');
			if ((is_null($objGroupRole->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGroupRole on this Ministry with an unsaved GroupRole.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group_role`
				SET
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroupRole->Id) . '
			');

			// Journaling
			$objGroupRole->MinistryId = $this->intId;
			$objGroupRole->Journal('UPDATE');
		}

		/**
		 * Unassociates a GroupRole
		 * @param GroupRole $objGroupRole
		 * @return void
		*/ 
		public function UnassociateGroupRole(GroupRole $objGroupRole) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupRole on this unsaved Ministry.');
			if ((is_null($objGroupRole->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupRole on this Ministry with an unsaved GroupRole.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group_role`
				SET
					`ministry_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroupRole->Id) . ' AND
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objGroupRole->MinistryId = null;
			$objGroupRole->Journal('UPDATE');
		}

		/**
		 * Unassociates all GroupRoles
		 * @return void
		*/ 
		public function UnassociateAllGroupRoles() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupRole on this unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Journaling
			foreach (GroupRole::LoadArrayByMinistryId($this->intId) as $objGroupRole) {
				$objGroupRole->MinistryId = null;
				$objGroupRole->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group_role`
				SET
					`ministry_id` = null
				WHERE
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GroupRole
		 * @param GroupRole $objGroupRole
		 * @return void
		*/ 
		public function DeleteAssociatedGroupRole(GroupRole $objGroupRole) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupRole on this unsaved Ministry.');
			if ((is_null($objGroupRole->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupRole on this Ministry with an unsaved GroupRole.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group_role`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroupRole->Id) . ' AND
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objGroupRole->Journal('DELETE');
		}

		/**
		 * Deletes all associated GroupRoles
		 * @return void
		*/ 
		public function DeleteAllGroupRoles() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupRole on this unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Journaling
			foreach (GroupRole::LoadArrayByMinistryId($this->intId) as $objGroupRole) {
				$objGroupRole->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group_role`
				WHERE
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for ChildMinistry
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ChildMinistries as an array of Ministry objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ministry[]
		*/ 
		public function GetChildMinistryArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Ministry::LoadArrayByParentMinistryId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ChildMinistries
		 * @return int
		*/ 
		public function CountChildMinistries() {
			if ((is_null($this->intId)))
				return 0;

			return Ministry::CountByParentMinistryId($this->intId);
		}

		/**
		 * Associates a ChildMinistry
		 * @param Ministry $objMinistry
		 * @return void
		*/ 
		public function AssociateChildMinistry(Ministry $objMinistry) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildMinistry on this unsaved Ministry.');
			if ((is_null($objMinistry->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildMinistry on this Ministry with an unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ministry`
				SET
					`parent_ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMinistry->Id) . '
			');

			// Journaling
			$objMinistry->ParentMinistryId = $this->intId;
			$objMinistry->Journal('UPDATE');
		}

		/**
		 * Unassociates a ChildMinistry
		 * @param Ministry $objMinistry
		 * @return void
		*/ 
		public function UnassociateChildMinistry(Ministry $objMinistry) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildMinistry on this unsaved Ministry.');
			if ((is_null($objMinistry->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildMinistry on this Ministry with an unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ministry`
				SET
					`parent_ministry_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMinistry->Id) . ' AND
					`parent_ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objMinistry->ParentMinistryId = null;
			$objMinistry->Journal('UPDATE');
		}

		/**
		 * Unassociates all ChildMinistries
		 * @return void
		*/ 
		public function UnassociateAllChildMinistries() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildMinistry on this unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Journaling
			foreach (Ministry::LoadArrayByParentMinistryId($this->intId) as $objMinistry) {
				$objMinistry->ParentMinistryId = null;
				$objMinistry->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ministry`
				SET
					`parent_ministry_id` = null
				WHERE
					`parent_ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ChildMinistry
		 * @param Ministry $objMinistry
		 * @return void
		*/ 
		public function DeleteAssociatedChildMinistry(Ministry $objMinistry) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildMinistry on this unsaved Ministry.');
			if ((is_null($objMinistry->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildMinistry on this Ministry with an unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ministry`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMinistry->Id) . ' AND
					`parent_ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objMinistry->Journal('DELETE');
		}

		/**
		 * Deletes all associated ChildMinistries
		 * @return void
		*/ 
		public function DeleteAllChildMinistries() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildMinistry on this unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Journaling
			foreach (Ministry::LoadArrayByParentMinistryId($this->intId) as $objMinistry) {
				$objMinistry->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ministry`
				WHERE
					`parent_ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StewardshipFund
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StewardshipFunds as an array of StewardshipFund objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipFund[]
		*/ 
		public function GetStewardshipFundArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StewardshipFund::LoadArrayByMinistryId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StewardshipFunds
		 * @return int
		*/ 
		public function CountStewardshipFunds() {
			if ((is_null($this->intId)))
				return 0;

			return StewardshipFund::CountByMinistryId($this->intId);
		}

		/**
		 * Associates a StewardshipFund
		 * @param StewardshipFund $objStewardshipFund
		 * @return void
		*/ 
		public function AssociateStewardshipFund(StewardshipFund $objStewardshipFund) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipFund on this unsaved Ministry.');
			if ((is_null($objStewardshipFund->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipFund on this Ministry with an unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_fund`
				SET
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipFund->Id) . '
			');

			// Journaling
			$objStewardshipFund->MinistryId = $this->intId;
			$objStewardshipFund->Journal('UPDATE');
		}

		/**
		 * Unassociates a StewardshipFund
		 * @param StewardshipFund $objStewardshipFund
		 * @return void
		*/ 
		public function UnassociateStewardshipFund(StewardshipFund $objStewardshipFund) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipFund on this unsaved Ministry.');
			if ((is_null($objStewardshipFund->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipFund on this Ministry with an unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_fund`
				SET
					`ministry_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipFund->Id) . ' AND
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objStewardshipFund->MinistryId = null;
			$objStewardshipFund->Journal('UPDATE');
		}

		/**
		 * Unassociates all StewardshipFunds
		 * @return void
		*/ 
		public function UnassociateAllStewardshipFunds() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipFund on this unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Journaling
			foreach (StewardshipFund::LoadArrayByMinistryId($this->intId) as $objStewardshipFund) {
				$objStewardshipFund->MinistryId = null;
				$objStewardshipFund->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_fund`
				SET
					`ministry_id` = null
				WHERE
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipFund
		 * @param StewardshipFund $objStewardshipFund
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipFund(StewardshipFund $objStewardshipFund) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipFund on this unsaved Ministry.');
			if ((is_null($objStewardshipFund->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipFund on this Ministry with an unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_fund`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipFund->Id) . ' AND
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objStewardshipFund->Journal('DELETE');
		}

		/**
		 * Deletes all associated StewardshipFunds
		 * @return void
		*/ 
		public function DeleteAllStewardshipFunds() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipFund on this unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Journaling
			foreach (StewardshipFund::LoadArrayByMinistryId($this->intId) as $objStewardshipFund) {
				$objStewardshipFund->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_fund`
				WHERE
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for Login
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated Logins as an array of Login objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Login[]
		*/ 
		public function GetLoginArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Login::LoadArrayByMinistry($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated Logins
		 * @return int
		*/ 
		public function CountLogins() {
			if ((is_null($this->intId)))
				return 0;

			return Login::CountByMinistry($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific Login
		 * @param Login $objLogin
		 * @return bool
		*/
		public function IsLoginAssociated(Login $objLogin) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsLoginAssociated on this unsaved Ministry.');
			if ((is_null($objLogin->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsLoginAssociated on this Ministry with an unsaved Login.');

			$intRowCount = Ministry::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Ministry()->Id, $this->intId),
					QQ::Equal(QQN::Ministry()->Login->LoginId, $objLogin->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the Login relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalLoginAssociation($intAssociatedId, $strJournalCommand) {
			QApplication::$Database[2]->NonQuery('
				INSERT INTO `ministry_login_assn` (
					`ministry_id`,
					`login_id`
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($intAssociatedId) . '
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Associates a Login
		 * @param Login $objLogin
		 * @return void
		*/ 
		public function AssociateLogin(Login $objLogin) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLogin on this unsaved Ministry.');
			if ((is_null($objLogin->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLogin on this Ministry with an unsaved Login.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `ministry_login_assn` (
					`ministry_id`,
					`login_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objLogin->Id) . '
				)
			');

			// Journaling
			$this->JournalLoginAssociation($objLogin->Id, 'INSERT');
		}

		/**
		 * Unassociates a Login
		 * @param Login $objLogin
		 * @return void
		*/ 
		public function UnassociateLogin(Login $objLogin) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLogin on this unsaved Ministry.');
			if ((is_null($objLogin->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLogin on this Ministry with an unsaved Login.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ministry_login_assn`
				WHERE
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`login_id` = ' . $objDatabase->SqlVariable($objLogin->Id) . '
			');

			// Journaling
			$this->JournalLoginAssociation($objLogin->Id, 'DELETE');
		}

		/**
		 * Unassociates all Logins
		 * @return void
		*/ 
		public function UnassociateAllLogins() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllLoginArray on this unsaved Ministry.');

			// Get the Database Object for this Class
			$objDatabase = Ministry::GetDatabase();


			// Journaling
			$objResult = $objDatabase->Query('SELECT `login_id` AS associated_id FROM `ministry_login_assn` WHERE `ministry_id` = ' . $objDatabase->SqlVariable($this->intId));
			while ($objRow = $objResult->GetNextRow()) {
				$this->JournalLoginAssociation($objRow->GetColumn('associated_id'), 'DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ministry_login_assn`
				WHERE
					`ministry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Ministry"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Token" type="xsd:string"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="ParentMinistry" type="xsd1:Ministry"/>';
			$strToReturn .= '<element name="ActiveFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Ministry', $strComplexTypeArray)) {
				$strComplexTypeArray['Ministry'] = Ministry::GetSoapComplexTypeXml();
				Ministry::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Ministry::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Ministry();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Token'))
				$objToReturn->strToken = $objSoapObject->Token;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if ((property_exists($objSoapObject, 'ParentMinistry')) &&
				($objSoapObject->ParentMinistry))
				$objToReturn->ParentMinistry = Ministry::GetObjectFromSoapObject($objSoapObject->ParentMinistry);
			if (property_exists($objSoapObject, 'ActiveFlag'))
				$objToReturn->blnActiveFlag = $objSoapObject->ActiveFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Ministry::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objParentMinistry)
				$objObject->objParentMinistry = Ministry::GetSoapObjectFromObject($objObject->objParentMinistry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentMinistryId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeMinistryLogin extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'login';

		protected $strTableName = 'ministry_login_assn';
		protected $strPrimaryKey = 'ministry_id';
		protected $strClassName = 'Login';

		public function __get($strName) {
			switch ($strName) {
				case 'LoginId':
					return new QQNode('login_id', 'LoginId', 'integer', $this);
				case 'Login':
					return new QQNodeLogin('login_id', 'LoginId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeLogin('login_id', 'LoginId', 'integer', $this);
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

	class QQNodeMinistry extends QQNode {
		protected $strTableName = 'ministry';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Ministry';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'ParentMinistryId':
					return new QQNode('parent_ministry_id', 'ParentMinistryId', 'integer', $this);
				case 'ParentMinistry':
					return new QQNodeMinistry('parent_ministry_id', 'ParentMinistry', 'integer', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'Login':
					return new QQNodeMinistryLogin($this);
				case 'CommunicationList':
					return new QQReverseReferenceNodeCommunicationList($this, 'communicationlist', 'reverse_reference', 'ministry_id');
				case 'Group':
					return new QQReverseReferenceNodeGroup($this, 'group', 'reverse_reference', 'ministry_id');
				case 'GroupRole':
					return new QQReverseReferenceNodeGroupRole($this, 'grouprole', 'reverse_reference', 'ministry_id');
				case 'ChildMinistry':
					return new QQReverseReferenceNodeMinistry($this, 'childministry', 'reverse_reference', 'parent_ministry_id');
				case 'StewardshipFund':
					return new QQReverseReferenceNodeStewardshipFund($this, 'stewardshipfund', 'reverse_reference', 'ministry_id');

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

	class QQReverseReferenceNodeMinistry extends QQReverseReferenceNode {
		protected $strTableName = 'ministry';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Ministry';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'ParentMinistryId':
					return new QQNode('parent_ministry_id', 'ParentMinistryId', 'integer', $this);
				case 'ParentMinistry':
					return new QQNodeMinistry('parent_ministry_id', 'ParentMinistry', 'integer', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'Login':
					return new QQNodeMinistryLogin($this);
				case 'CommunicationList':
					return new QQReverseReferenceNodeCommunicationList($this, 'communicationlist', 'reverse_reference', 'ministry_id');
				case 'Group':
					return new QQReverseReferenceNodeGroup($this, 'group', 'reverse_reference', 'ministry_id');
				case 'GroupRole':
					return new QQReverseReferenceNodeGroupRole($this, 'grouprole', 'reverse_reference', 'ministry_id');
				case 'ChildMinistry':
					return new QQReverseReferenceNodeMinistry($this, 'childministry', 'reverse_reference', 'parent_ministry_id');
				case 'StewardshipFund':
					return new QQReverseReferenceNodeStewardshipFund($this, 'stewardshipfund', 'reverse_reference', 'ministry_id');

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