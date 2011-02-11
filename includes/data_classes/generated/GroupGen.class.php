<?php
	/**
	 * The abstract GroupGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Group subclass which
	 * extends this GroupGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Group class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $GroupTypeId the value for intGroupTypeId (Not Null)
	 * @property integer $MinistryId the value for intMinistryId (Not Null)
	 * @property string $Name the value for strName 
	 * @property string $Description the value for strDescription 
	 * @property integer $ParentGroupId the value for intParentGroupId 
	 * @property integer $HierarchyLevel the value for intHierarchyLevel 
	 * @property integer $HierarchyOrderNumber the value for intHierarchyOrderNumber 
	 * @property boolean $ConfidentialFlag the value for blnConfidentialFlag 
	 * @property integer $EmailBroadcastTypeId the value for intEmailBroadcastTypeId 
	 * @property string $Token the value for strToken (Unique)
	 * @property boolean $ActiveFlag the value for blnActiveFlag 
	 * @property Ministry $Ministry the value for the Ministry object referenced by intMinistryId (Not Null)
	 * @property Group $ParentGroup the value for the Group object referenced by intParentGroupId 
	 * @property GroupCategory $GroupCategory the value for the GroupCategory object that uniquely references this Group
	 * @property GrowthGroup $GrowthGroup the value for the GrowthGroup object that uniquely references this Group
	 * @property SmartGroup $SmartGroup the value for the SmartGroup object that uniquely references this Group
	 * @property EmailMessageRoute $_EmailMessageRoute the value for the private _objEmailMessageRoute (Read-Only) if set due to an expansion on the email_message_route.group_id reverse relationship
	 * @property EmailMessageRoute[] $_EmailMessageRouteArray the value for the private _objEmailMessageRouteArray (Read-Only) if set due to an ExpandAsArray on the email_message_route.group_id reverse relationship
	 * @property Group $_ChildGroup the value for the private _objChildGroup (Read-Only) if set due to an expansion on the group.parent_group_id reverse relationship
	 * @property Group[] $_ChildGroupArray the value for the private _objChildGroupArray (Read-Only) if set due to an ExpandAsArray on the group.parent_group_id reverse relationship
	 * @property GroupParticipation $_GroupParticipation the value for the private _objGroupParticipation (Read-Only) if set due to an expansion on the group_participation.group_id reverse relationship
	 * @property GroupParticipation[] $_GroupParticipationArray the value for the private _objGroupParticipationArray (Read-Only) if set due to an ExpandAsArray on the group_participation.group_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GroupGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column group.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column group.group_type_id
		 * @var integer intGroupTypeId
		 */
		protected $intGroupTypeId;
		const GroupTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column group.ministry_id
		 * @var integer intMinistryId
		 */
		protected $intMinistryId;
		const MinistryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column group.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 200;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column group.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column group.parent_group_id
		 * @var integer intParentGroupId
		 */
		protected $intParentGroupId;
		const ParentGroupIdDefault = null;


		/**
		 * Protected member variable that maps to the database column group.hierarchy_level
		 * @var integer intHierarchyLevel
		 */
		protected $intHierarchyLevel;
		const HierarchyLevelDefault = null;


		/**
		 * Protected member variable that maps to the database column group.hierarchy_order_number
		 * @var integer intHierarchyOrderNumber
		 */
		protected $intHierarchyOrderNumber;
		const HierarchyOrderNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column group.confidential_flag
		 * @var boolean blnConfidentialFlag
		 */
		protected $blnConfidentialFlag;
		const ConfidentialFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column group.email_broadcast_type_id
		 * @var integer intEmailBroadcastTypeId
		 */
		protected $intEmailBroadcastTypeId;
		const EmailBroadcastTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column group.token
		 * @var string strToken
		 */
		protected $strToken;
		const TokenMaxLength = 100;
		const TokenDefault = null;


		/**
		 * Protected member variable that maps to the database column group.active_flag
		 * @var boolean blnActiveFlag
		 */
		protected $blnActiveFlag;
		const ActiveFlagDefault = null;


		/**
		 * Private member variable that stores a reference to a single EmailMessageRoute object
		 * (of type EmailMessageRoute), if this Group object was restored with
		 * an expansion on the email_message_route association table.
		 * @var EmailMessageRoute _objEmailMessageRoute;
		 */
		private $_objEmailMessageRoute;

		/**
		 * Private member variable that stores a reference to an array of EmailMessageRoute objects
		 * (of type EmailMessageRoute[]), if this Group object was restored with
		 * an ExpandAsArray on the email_message_route association table.
		 * @var EmailMessageRoute[] _objEmailMessageRouteArray;
		 */
		private $_objEmailMessageRouteArray = array();

		/**
		 * Private member variable that stores a reference to a single ChildGroup object
		 * (of type Group), if this Group object was restored with
		 * an expansion on the group association table.
		 * @var Group _objChildGroup;
		 */
		private $_objChildGroup;

		/**
		 * Private member variable that stores a reference to an array of ChildGroup objects
		 * (of type Group[]), if this Group object was restored with
		 * an ExpandAsArray on the group association table.
		 * @var Group[] _objChildGroupArray;
		 */
		private $_objChildGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single GroupParticipation object
		 * (of type GroupParticipation), if this Group object was restored with
		 * an expansion on the group_participation association table.
		 * @var GroupParticipation _objGroupParticipation;
		 */
		private $_objGroupParticipation;

		/**
		 * Private member variable that stores a reference to an array of GroupParticipation objects
		 * (of type GroupParticipation[]), if this Group object was restored with
		 * an ExpandAsArray on the group_participation association table.
		 * @var GroupParticipation[] _objGroupParticipationArray;
		 */
		private $_objGroupParticipationArray = array();

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
		 * in the database column group.ministry_id.
		 *
		 * NOTE: Always use the Ministry property getter to correctly retrieve this Ministry object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Ministry objMinistry
		 */
		protected $objMinistry;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column group.parent_group_id.
		 *
		 * NOTE: Always use the ParentGroup property getter to correctly retrieve this Group object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Group objParentGroup
		 */
		protected $objParentGroup;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column group_category.group_id.
		 *
		 * NOTE: Always use the GroupCategory property getter to correctly retrieve this GroupCategory object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GroupCategory objGroupCategory
		 */
		protected $objGroupCategory;
		
		/**
		 * Used internally to manage whether the adjoined GroupCategory object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyGroupCategory;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column growth_group.group_id.
		 *
		 * NOTE: Always use the GrowthGroup property getter to correctly retrieve this GrowthGroup object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GrowthGroup objGrowthGroup
		 */
		protected $objGrowthGroup;
		
		/**
		 * Used internally to manage whether the adjoined GrowthGroup object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyGrowthGroup;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column smart_group.group_id.
		 *
		 * NOTE: Always use the SmartGroup property getter to correctly retrieve this SmartGroup object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SmartGroup objSmartGroup
		 */
		protected $objSmartGroup;
		
		/**
		 * Used internally to manage whether the adjoined SmartGroup object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtySmartGroup;





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
		 * Load a Group from PK Info
		 * @param integer $intId
		 * @return Group
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Group::QuerySingle(
				QQ::Equal(QQN::Group()->Id, $intId)
			);
		}

		/**
		 * Load all Groups
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Group[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Group::QueryArray to perform the LoadAll query
			try {
				return Group::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Groups
		 * @return int
		 */
		public static function CountAll() {
			// Call Group::QueryCount to perform the CountAll query
			return Group::QueryCount(QQ::All());
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
			$objDatabase = Group::GetDatabase();

			// Create/Build out the QueryBuilder object with Group-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'group');
			Group::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('group');

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
		 * Static Qcodo Query method to query for a single Group object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Group the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Group::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Group object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Group::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Group::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Group objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Group[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Group::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Group::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Group::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Group objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Group::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Group::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'group_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Group-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Group::GetSelectFields($objQueryBuilder);
				Group::GetFromFields($objQueryBuilder);

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
			return Group::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Group
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'group';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'group_type_id', $strAliasPrefix . 'group_type_id');
			$objBuilder->AddSelectItem($strTableName, 'ministry_id', $strAliasPrefix . 'ministry_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'parent_group_id', $strAliasPrefix . 'parent_group_id');
			$objBuilder->AddSelectItem($strTableName, 'hierarchy_level', $strAliasPrefix . 'hierarchy_level');
			$objBuilder->AddSelectItem($strTableName, 'hierarchy_order_number', $strAliasPrefix . 'hierarchy_order_number');
			$objBuilder->AddSelectItem($strTableName, 'confidential_flag', $strAliasPrefix . 'confidential_flag');
			$objBuilder->AddSelectItem($strTableName, 'email_broadcast_type_id', $strAliasPrefix . 'email_broadcast_type_id');
			$objBuilder->AddSelectItem($strTableName, 'token', $strAliasPrefix . 'token');
			$objBuilder->AddSelectItem($strTableName, 'active_flag', $strAliasPrefix . 'active_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Group from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Group::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Group
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
					$strAliasPrefix = 'group__';


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

				$strAlias = $strAliasPrefix . 'childgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objChildGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objChildGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objChildGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objChildGroupArray[] = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'groupparticipation__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objGroupParticipationArray)) {
						$objPreviousChildItem = $objPreviousItem->_objGroupParticipationArray[$intPreviousChildItemCount - 1];
						$objChildItem = GroupParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupparticipation__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objGroupParticipationArray[] = $objChildItem;
					} else
						$objPreviousItem->_objGroupParticipationArray[] = GroupParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'group__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Group object
			$objToReturn = new Group();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'group_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'group_type_id'] : $strAliasPrefix . 'group_type_id';
			$objToReturn->intGroupTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'ministry_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ministry_id'] : $strAliasPrefix . 'ministry_id';
			$objToReturn->intMinistryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_group_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_group_id'] : $strAliasPrefix . 'parent_group_id';
			$objToReturn->intParentGroupId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'hierarchy_level', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'hierarchy_level'] : $strAliasPrefix . 'hierarchy_level';
			$objToReturn->intHierarchyLevel = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'hierarchy_order_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'hierarchy_order_number'] : $strAliasPrefix . 'hierarchy_order_number';
			$objToReturn->intHierarchyOrderNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'confidential_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'confidential_flag'] : $strAliasPrefix . 'confidential_flag';
			$objToReturn->blnConfidentialFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'email_broadcast_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email_broadcast_type_id'] : $strAliasPrefix . 'email_broadcast_type_id';
			$objToReturn->intEmailBroadcastTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'token', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'token'] : $strAliasPrefix . 'token';
			$objToReturn->strToken = $objDbRow->GetColumn($strAliasName, 'VarChar');
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
				$strAliasPrefix = 'group__';

			// Check for Ministry Early Binding
			$strAlias = $strAliasPrefix . 'ministry_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objMinistry = Ministry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ministry_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ParentGroup Early Binding
			$strAlias = $strAliasPrefix . 'parent_group_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentGroup = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_group_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for GroupCategory Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'groupcategory__group_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objGroupCategory = GroupCategory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupcategory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objGroupCategory = false;
			}

			// Check for GrowthGroup Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'growthgroup__group_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objGrowthGroup = GrowthGroup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objGrowthGroup = false;
			}

			// Check for SmartGroup Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'smartgroup__group_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objSmartGroup = SmartGroup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'smartgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objSmartGroup = false;
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

			// Check for ChildGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'childgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objChildGroupArray[] = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objChildGroup = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'childgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for GroupParticipation Virtual Binding
			$strAlias = $strAliasPrefix . 'groupparticipation__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objGroupParticipationArray[] = GroupParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objGroupParticipation = GroupParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Groups from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Group[]
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
					$objItem = Group::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Group::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Group object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Group next row resulting from the query
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
			return Group::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Group object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Group
		*/
		public static function LoadById($intId) {
			return Group::QuerySingle(
				QQ::Equal(QQN::Group()->Id, $intId)
			);
		}
			
		/**
		 * Load a single Group object,
		 * by Token Index(es)
		 * @param string $strToken
		 * @return Group
		*/
		public static function LoadByToken($strToken) {
			return Group::QuerySingle(
				QQ::Equal(QQN::Group()->Token, $strToken)
			);
		}
			
		/**
		 * Load an array of Group objects,
		 * by GroupTypeId Index(es)
		 * @param integer $intGroupTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Group[]
		*/
		public static function LoadArrayByGroupTypeId($intGroupTypeId, $objOptionalClauses = null) {
			// Call Group::QueryArray to perform the LoadArrayByGroupTypeId query
			try {
				return Group::QueryArray(
					QQ::Equal(QQN::Group()->GroupTypeId, $intGroupTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Groups
		 * by GroupTypeId Index(es)
		 * @param integer $intGroupTypeId
		 * @return int
		*/
		public static function CountByGroupTypeId($intGroupTypeId) {
			// Call Group::QueryCount to perform the CountByGroupTypeId query
			return Group::QueryCount(
				QQ::Equal(QQN::Group()->GroupTypeId, $intGroupTypeId)
			);
		}
			
		/**
		 * Load an array of Group objects,
		 * by MinistryId Index(es)
		 * @param integer $intMinistryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Group[]
		*/
		public static function LoadArrayByMinistryId($intMinistryId, $objOptionalClauses = null) {
			// Call Group::QueryArray to perform the LoadArrayByMinistryId query
			try {
				return Group::QueryArray(
					QQ::Equal(QQN::Group()->MinistryId, $intMinistryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Groups
		 * by MinistryId Index(es)
		 * @param integer $intMinistryId
		 * @return int
		*/
		public static function CountByMinistryId($intMinistryId) {
			// Call Group::QueryCount to perform the CountByMinistryId query
			return Group::QueryCount(
				QQ::Equal(QQN::Group()->MinistryId, $intMinistryId)
			);
		}
			
		/**
		 * Load an array of Group objects,
		 * by ParentGroupId Index(es)
		 * @param integer $intParentGroupId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Group[]
		*/
		public static function LoadArrayByParentGroupId($intParentGroupId, $objOptionalClauses = null) {
			// Call Group::QueryArray to perform the LoadArrayByParentGroupId query
			try {
				return Group::QueryArray(
					QQ::Equal(QQN::Group()->ParentGroupId, $intParentGroupId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Groups
		 * by ParentGroupId Index(es)
		 * @param integer $intParentGroupId
		 * @return int
		*/
		public static function CountByParentGroupId($intParentGroupId) {
			// Call Group::QueryCount to perform the CountByParentGroupId query
			return Group::QueryCount(
				QQ::Equal(QQN::Group()->ParentGroupId, $intParentGroupId)
			);
		}
			
		/**
		 * Load an array of Group objects,
		 * by EmailBroadcastTypeId Index(es)
		 * @param integer $intEmailBroadcastTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Group[]
		*/
		public static function LoadArrayByEmailBroadcastTypeId($intEmailBroadcastTypeId, $objOptionalClauses = null) {
			// Call Group::QueryArray to perform the LoadArrayByEmailBroadcastTypeId query
			try {
				return Group::QueryArray(
					QQ::Equal(QQN::Group()->EmailBroadcastTypeId, $intEmailBroadcastTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Groups
		 * by EmailBroadcastTypeId Index(es)
		 * @param integer $intEmailBroadcastTypeId
		 * @return int
		*/
		public static function CountByEmailBroadcastTypeId($intEmailBroadcastTypeId) {
			// Call Group::QueryCount to perform the CountByEmailBroadcastTypeId query
			return Group::QueryCount(
				QQ::Equal(QQN::Group()->EmailBroadcastTypeId, $intEmailBroadcastTypeId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Group
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `group` (
							`group_type_id`,
							`ministry_id`,
							`name`,
							`description`,
							`parent_group_id`,
							`hierarchy_level`,
							`hierarchy_order_number`,
							`confidential_flag`,
							`email_broadcast_type_id`,
							`token`,
							`active_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intGroupTypeId) . ',
							' . $objDatabase->SqlVariable($this->intMinistryId) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->intParentGroupId) . ',
							' . $objDatabase->SqlVariable($this->intHierarchyLevel) . ',
							' . $objDatabase->SqlVariable($this->intHierarchyOrderNumber) . ',
							' . $objDatabase->SqlVariable($this->blnConfidentialFlag) . ',
							' . $objDatabase->SqlVariable($this->intEmailBroadcastTypeId) . ',
							' . $objDatabase->SqlVariable($this->strToken) . ',
							' . $objDatabase->SqlVariable($this->blnActiveFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('group', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`group`
						SET
							`group_type_id` = ' . $objDatabase->SqlVariable($this->intGroupTypeId) . ',
							`ministry_id` = ' . $objDatabase->SqlVariable($this->intMinistryId) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`parent_group_id` = ' . $objDatabase->SqlVariable($this->intParentGroupId) . ',
							`hierarchy_level` = ' . $objDatabase->SqlVariable($this->intHierarchyLevel) . ',
							`hierarchy_order_number` = ' . $objDatabase->SqlVariable($this->intHierarchyOrderNumber) . ',
							`confidential_flag` = ' . $objDatabase->SqlVariable($this->blnConfidentialFlag) . ',
							`email_broadcast_type_id` = ' . $objDatabase->SqlVariable($this->intEmailBroadcastTypeId) . ',
							`token` = ' . $objDatabase->SqlVariable($this->strToken) . ',
							`active_flag` = ' . $objDatabase->SqlVariable($this->blnActiveFlag) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined GroupCategory object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyGroupCategory) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = GroupCategory::LoadByGroupId($this->intId)) {
						$objAssociated->GroupId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objGroupCategory) {
						$this->objGroupCategory->GroupId = $this->intId;
						$this->objGroupCategory->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyGroupCategory = false;
				}
		
		
				// Update the adjoined GrowthGroup object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyGrowthGroup) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = GrowthGroup::LoadByGroupId($this->intId)) {
						$objAssociated->GroupId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objGrowthGroup) {
						$this->objGrowthGroup->GroupId = $this->intId;
						$this->objGrowthGroup->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyGrowthGroup = false;
				}
		
		
				// Update the adjoined SmartGroup object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtySmartGroup) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = SmartGroup::LoadByGroupId($this->intId)) {
						$objAssociated->GroupId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objSmartGroup) {
						$this->objSmartGroup->GroupId = $this->intId;
						$this->objSmartGroup->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtySmartGroup = false;
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
		 * Delete this Group
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Group with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			
			
			// Update the adjoined GroupCategory object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = GroupCategory::LoadByGroupId($this->intId)) {
				$objAssociated->Delete();
			}
			
			
			// Update the adjoined GrowthGroup object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = GrowthGroup::LoadByGroupId($this->intId)) {
				$objAssociated->Delete();
			}
			
			
			// Update the adjoined SmartGroup object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = SmartGroup::LoadByGroupId($this->intId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Groups
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group`');
		}

		/**
		 * Truncate group table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `group`');
		}

		/**
		 * Reload this Group from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Group object.');

			// Reload the Object
			$objReloaded = Group::Load($this->intId);

			// Update $this's local variables to match
			$this->GroupTypeId = $objReloaded->GroupTypeId;
			$this->MinistryId = $objReloaded->MinistryId;
			$this->strName = $objReloaded->strName;
			$this->strDescription = $objReloaded->strDescription;
			$this->ParentGroupId = $objReloaded->ParentGroupId;
			$this->intHierarchyLevel = $objReloaded->intHierarchyLevel;
			$this->intHierarchyOrderNumber = $objReloaded->intHierarchyOrderNumber;
			$this->blnConfidentialFlag = $objReloaded->blnConfidentialFlag;
			$this->EmailBroadcastTypeId = $objReloaded->EmailBroadcastTypeId;
			$this->strToken = $objReloaded->strToken;
			$this->blnActiveFlag = $objReloaded->blnActiveFlag;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Group::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `group` (
					`id`,
					`group_type_id`,
					`ministry_id`,
					`name`,
					`description`,
					`parent_group_id`,
					`hierarchy_level`,
					`hierarchy_order_number`,
					`confidential_flag`,
					`email_broadcast_type_id`,
					`token`,
					`active_flag`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intGroupTypeId) . ',
					' . $objDatabase->SqlVariable($this->intMinistryId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
					' . $objDatabase->SqlVariable($this->intParentGroupId) . ',
					' . $objDatabase->SqlVariable($this->intHierarchyLevel) . ',
					' . $objDatabase->SqlVariable($this->intHierarchyOrderNumber) . ',
					' . $objDatabase->SqlVariable($this->blnConfidentialFlag) . ',
					' . $objDatabase->SqlVariable($this->intEmailBroadcastTypeId) . ',
					' . $objDatabase->SqlVariable($this->strToken) . ',
					' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
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
		 * @return Group[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Group::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM group WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Group::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Group[]
		 */
		public function GetJournal() {
			return Group::GetJournalForId($this->intId);
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

				case 'GroupTypeId':
					// Gets the value for intGroupTypeId (Not Null)
					// @return integer
					return $this->intGroupTypeId;

				case 'MinistryId':
					// Gets the value for intMinistryId (Not Null)
					// @return integer
					return $this->intMinistryId;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;

				case 'ParentGroupId':
					// Gets the value for intParentGroupId 
					// @return integer
					return $this->intParentGroupId;

				case 'HierarchyLevel':
					// Gets the value for intHierarchyLevel 
					// @return integer
					return $this->intHierarchyLevel;

				case 'HierarchyOrderNumber':
					// Gets the value for intHierarchyOrderNumber 
					// @return integer
					return $this->intHierarchyOrderNumber;

				case 'ConfidentialFlag':
					// Gets the value for blnConfidentialFlag 
					// @return boolean
					return $this->blnConfidentialFlag;

				case 'EmailBroadcastTypeId':
					// Gets the value for intEmailBroadcastTypeId 
					// @return integer
					return $this->intEmailBroadcastTypeId;

				case 'Token':
					// Gets the value for strToken (Unique)
					// @return string
					return $this->strToken;

				case 'ActiveFlag':
					// Gets the value for blnActiveFlag 
					// @return boolean
					return $this->blnActiveFlag;


				///////////////////
				// Member Objects
				///////////////////
				case 'Ministry':
					// Gets the value for the Ministry object referenced by intMinistryId (Not Null)
					// @return Ministry
					try {
						if ((!$this->objMinistry) && (!is_null($this->intMinistryId)))
							$this->objMinistry = Ministry::Load($this->intMinistryId);
						return $this->objMinistry;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParentGroup':
					// Gets the value for the Group object referenced by intParentGroupId 
					// @return Group
					try {
						if ((!$this->objParentGroup) && (!is_null($this->intParentGroupId)))
							$this->objParentGroup = Group::Load($this->intParentGroupId);
						return $this->objParentGroup;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'GroupCategory':
					// Gets the value for the GroupCategory object that uniquely references this Group
					// by objGroupCategory (Unique)
					// @return GroupCategory
					try {
						if ($this->objGroupCategory === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objGroupCategory)
							$this->objGroupCategory = GroupCategory::LoadByGroupId($this->intId);
						return $this->objGroupCategory;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'GrowthGroup':
					// Gets the value for the GrowthGroup object that uniquely references this Group
					// by objGrowthGroup (Unique)
					// @return GrowthGroup
					try {
						if ($this->objGrowthGroup === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objGrowthGroup)
							$this->objGrowthGroup = GrowthGroup::LoadByGroupId($this->intId);
						return $this->objGrowthGroup;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'SmartGroup':
					// Gets the value for the SmartGroup object that uniquely references this Group
					// by objSmartGroup (Unique)
					// @return SmartGroup
					try {
						if ($this->objSmartGroup === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objSmartGroup)
							$this->objSmartGroup = SmartGroup::LoadByGroupId($this->intId);
						return $this->objSmartGroup;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_EmailMessageRoute':
					// Gets the value for the private _objEmailMessageRoute (Read-Only)
					// if set due to an expansion on the email_message_route.group_id reverse relationship
					// @return EmailMessageRoute
					return $this->_objEmailMessageRoute;

				case '_EmailMessageRouteArray':
					// Gets the value for the private _objEmailMessageRouteArray (Read-Only)
					// if set due to an ExpandAsArray on the email_message_route.group_id reverse relationship
					// @return EmailMessageRoute[]
					return (array) $this->_objEmailMessageRouteArray;

				case '_ChildGroup':
					// Gets the value for the private _objChildGroup (Read-Only)
					// if set due to an expansion on the group.parent_group_id reverse relationship
					// @return Group
					return $this->_objChildGroup;

				case '_ChildGroupArray':
					// Gets the value for the private _objChildGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the group.parent_group_id reverse relationship
					// @return Group[]
					return (array) $this->_objChildGroupArray;

				case '_GroupParticipation':
					// Gets the value for the private _objGroupParticipation (Read-Only)
					// if set due to an expansion on the group_participation.group_id reverse relationship
					// @return GroupParticipation
					return $this->_objGroupParticipation;

				case '_GroupParticipationArray':
					// Gets the value for the private _objGroupParticipationArray (Read-Only)
					// if set due to an ExpandAsArray on the group_participation.group_id reverse relationship
					// @return GroupParticipation[]
					return (array) $this->_objGroupParticipationArray;


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
				case 'GroupTypeId':
					// Sets the value for intGroupTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intGroupTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MinistryId':
					// Sets the value for intMinistryId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objMinistry = null;
						return ($this->intMinistryId = QType::Cast($mixValue, QType::Integer));
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

				case 'Description':
					// Sets the value for strDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParentGroupId':
					// Sets the value for intParentGroupId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objParentGroup = null;
						return ($this->intParentGroupId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HierarchyLevel':
					// Sets the value for intHierarchyLevel 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intHierarchyLevel = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HierarchyOrderNumber':
					// Sets the value for intHierarchyOrderNumber 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intHierarchyOrderNumber = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ConfidentialFlag':
					// Sets the value for blnConfidentialFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnConfidentialFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmailBroadcastTypeId':
					// Sets the value for intEmailBroadcastTypeId 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intEmailBroadcastTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'ActiveFlag':
					// Sets the value for blnActiveFlag 
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
				case 'Ministry':
					// Sets the value for the Ministry object referenced by intMinistryId (Not Null)
					// @param Ministry $mixValue
					// @return Ministry
					if (is_null($mixValue)) {
						$this->intMinistryId = null;
						$this->objMinistry = null;
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
							throw new QCallerException('Unable to set an unsaved Ministry for this Group');

						// Update Local Member Variables
						$this->objMinistry = $mixValue;
						$this->intMinistryId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ParentGroup':
					// Sets the value for the Group object referenced by intParentGroupId 
					// @param Group $mixValue
					// @return Group
					if (is_null($mixValue)) {
						$this->intParentGroupId = null;
						$this->objParentGroup = null;
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
							throw new QCallerException('Unable to set an unsaved ParentGroup for this Group');

						// Update Local Member Variables
						$this->objParentGroup = $mixValue;
						$this->intParentGroupId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GroupCategory':
					// Sets the value for the GroupCategory object referenced by objGroupCategory (Unique)
					// @param GroupCategory $mixValue
					// @return GroupCategory
					if (is_null($mixValue)) {
						$this->objGroupCategory = null;

						// Make sure we update the adjoined GroupCategory object the next time we call Save()
						$this->blnDirtyGroupCategory = true;

						return null;
					} else {
						// Make sure $mixValue actually is a GroupCategory object
						try {
							$mixValue = QType::Cast($mixValue, 'GroupCategory');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objGroupCategory to a DIFFERENT $mixValue?
						if ((!$this->GroupCategory) || ($this->GroupCategory->GroupId != $mixValue->GroupId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined GroupCategory object the next time we call Save()
							$this->blnDirtyGroupCategory = true;

							// Update Local Member Variable
							$this->objGroupCategory = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GrowthGroup':
					// Sets the value for the GrowthGroup object referenced by objGrowthGroup (Unique)
					// @param GrowthGroup $mixValue
					// @return GrowthGroup
					if (is_null($mixValue)) {
						$this->objGrowthGroup = null;

						// Make sure we update the adjoined GrowthGroup object the next time we call Save()
						$this->blnDirtyGrowthGroup = true;

						return null;
					} else {
						// Make sure $mixValue actually is a GrowthGroup object
						try {
							$mixValue = QType::Cast($mixValue, 'GrowthGroup');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objGrowthGroup to a DIFFERENT $mixValue?
						if ((!$this->GrowthGroup) || ($this->GrowthGroup->GroupId != $mixValue->GroupId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined GrowthGroup object the next time we call Save()
							$this->blnDirtyGrowthGroup = true;

							// Update Local Member Variable
							$this->objGrowthGroup = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'SmartGroup':
					// Sets the value for the SmartGroup object referenced by objSmartGroup (Unique)
					// @param SmartGroup $mixValue
					// @return SmartGroup
					if (is_null($mixValue)) {
						$this->objSmartGroup = null;

						// Make sure we update the adjoined SmartGroup object the next time we call Save()
						$this->blnDirtySmartGroup = true;

						return null;
					} else {
						// Make sure $mixValue actually is a SmartGroup object
						try {
							$mixValue = QType::Cast($mixValue, 'SmartGroup');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objSmartGroup to a DIFFERENT $mixValue?
						if ((!$this->SmartGroup) || ($this->SmartGroup->GroupId != $mixValue->GroupId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined SmartGroup object the next time we call Save()
							$this->blnDirtySmartGroup = true;

							// Update Local Member Variable
							$this->objSmartGroup = $mixValue;
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
				return EmailMessageRoute::LoadArrayByGroupId($this->intId, $objOptionalClauses);
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

			return EmailMessageRoute::CountByGroupId($this->intId);
		}

		/**
		 * Associates a EmailMessageRoute
		 * @param EmailMessageRoute $objEmailMessageRoute
		 * @return void
		*/ 
		public function AssociateEmailMessageRoute(EmailMessageRoute $objEmailMessageRoute) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmailMessageRoute on this unsaved Group.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmailMessageRoute on this Group with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objEmailMessageRoute->GroupId = $this->intId;
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved Group.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this Group with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objEmailMessageRoute->GroupId = null;
				$objEmailMessageRoute->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all EmailMessageRoutes
		 * @return void
		*/ 
		public function UnassociateAllEmailMessageRoutes() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (EmailMessageRoute::LoadArrayByGroupId($this->intId) as $objEmailMessageRoute) {
					$objEmailMessageRoute->GroupId = null;
					$objEmailMessageRoute->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EmailMessageRoute
		 * @param EmailMessageRoute $objEmailMessageRoute
		 * @return void
		*/ 
		public function DeleteAssociatedEmailMessageRoute(EmailMessageRoute $objEmailMessageRoute) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved Group.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this Group with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message_route`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (EmailMessageRoute::LoadArrayByGroupId($this->intId) as $objEmailMessageRoute) {
					$objEmailMessageRoute->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message_route`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for ChildGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ChildGroups as an array of Group objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Group[]
		*/ 
		public function GetChildGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Group::LoadArrayByParentGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ChildGroups
		 * @return int
		*/ 
		public function CountChildGroups() {
			if ((is_null($this->intId)))
				return 0;

			return Group::CountByParentGroupId($this->intId);
		}

		/**
		 * Associates a ChildGroup
		 * @param Group $objGroup
		 * @return void
		*/ 
		public function AssociateChildGroup(Group $objGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildGroup on this unsaved Group.');
			if ((is_null($objGroup->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChildGroup on this Group with an unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group`
				SET
					`parent_group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroup->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objGroup->ParentGroupId = $this->intId;
				$objGroup->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ChildGroup
		 * @param Group $objGroup
		 * @return void
		*/ 
		public function UnassociateChildGroup(Group $objGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildGroup on this unsaved Group.');
			if ((is_null($objGroup->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildGroup on this Group with an unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group`
				SET
					`parent_group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroup->Id) . ' AND
					`parent_group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objGroup->ParentGroupId = null;
				$objGroup->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ChildGroups
		 * @return void
		*/ 
		public function UnassociateAllChildGroups() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildGroup on this unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Group::LoadArrayByParentGroupId($this->intId) as $objGroup) {
					$objGroup->ParentGroupId = null;
					$objGroup->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group`
				SET
					`parent_group_id` = null
				WHERE
					`parent_group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ChildGroup
		 * @param Group $objGroup
		 * @return void
		*/ 
		public function DeleteAssociatedChildGroup(Group $objGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildGroup on this unsaved Group.');
			if ((is_null($objGroup->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildGroup on this Group with an unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroup->Id) . ' AND
					`parent_group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objGroup->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ChildGroups
		 * @return void
		*/ 
		public function DeleteAllChildGroups() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChildGroup on this unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Group::LoadArrayByParentGroupId($this->intId) as $objGroup) {
					$objGroup->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group`
				WHERE
					`parent_group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for GroupParticipation
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GroupParticipations as an array of GroupParticipation objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GroupParticipation[]
		*/ 
		public function GetGroupParticipationArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GroupParticipation::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GroupParticipations
		 * @return int
		*/ 
		public function CountGroupParticipations() {
			if ((is_null($this->intId)))
				return 0;

			return GroupParticipation::CountByGroupId($this->intId);
		}

		/**
		 * Associates a GroupParticipation
		 * @param GroupParticipation $objGroupParticipation
		 * @return void
		*/ 
		public function AssociateGroupParticipation(GroupParticipation $objGroupParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGroupParticipation on this unsaved Group.');
			if ((is_null($objGroupParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGroupParticipation on this Group with an unsaved GroupParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group_participation`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroupParticipation->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objGroupParticipation->GroupId = $this->intId;
				$objGroupParticipation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a GroupParticipation
		 * @param GroupParticipation $objGroupParticipation
		 * @return void
		*/ 
		public function UnassociateGroupParticipation(GroupParticipation $objGroupParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this unsaved Group.');
			if ((is_null($objGroupParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this Group with an unsaved GroupParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group_participation`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroupParticipation->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objGroupParticipation->GroupId = null;
				$objGroupParticipation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all GroupParticipations
		 * @return void
		*/ 
		public function UnassociateAllGroupParticipations() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (GroupParticipation::LoadArrayByGroupId($this->intId) as $objGroupParticipation) {
					$objGroupParticipation->GroupId = null;
					$objGroupParticipation->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group_participation`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GroupParticipation
		 * @param GroupParticipation $objGroupParticipation
		 * @return void
		*/ 
		public function DeleteAssociatedGroupParticipation(GroupParticipation $objGroupParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this unsaved Group.');
			if ((is_null($objGroupParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this Group with an unsaved GroupParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group_participation`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroupParticipation->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objGroupParticipation->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated GroupParticipations
		 * @return void
		*/ 
		public function DeleteAllGroupParticipations() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this unsaved Group.');

			// Get the Database Object for this Class
			$objDatabase = Group::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (GroupParticipation::LoadArrayByGroupId($this->intId) as $objGroupParticipation) {
					$objGroupParticipation->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group_participation`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Group"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="GroupTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Ministry" type="xsd1:Ministry"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="ParentGroup" type="xsd1:Group"/>';
			$strToReturn .= '<element name="HierarchyLevel" type="xsd:int"/>';
			$strToReturn .= '<element name="HierarchyOrderNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="ConfidentialFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="EmailBroadcastTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Token" type="xsd:string"/>';
			$strToReturn .= '<element name="ActiveFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Group', $strComplexTypeArray)) {
				$strComplexTypeArray['Group'] = Group::GetSoapComplexTypeXml();
				Ministry::AlterSoapComplexTypeArray($strComplexTypeArray);
				Group::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Group::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Group();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'GroupTypeId'))
				$objToReturn->intGroupTypeId = $objSoapObject->GroupTypeId;
			if ((property_exists($objSoapObject, 'Ministry')) &&
				($objSoapObject->Ministry))
				$objToReturn->Ministry = Ministry::GetObjectFromSoapObject($objSoapObject->Ministry);
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if ((property_exists($objSoapObject, 'ParentGroup')) &&
				($objSoapObject->ParentGroup))
				$objToReturn->ParentGroup = Group::GetObjectFromSoapObject($objSoapObject->ParentGroup);
			if (property_exists($objSoapObject, 'HierarchyLevel'))
				$objToReturn->intHierarchyLevel = $objSoapObject->HierarchyLevel;
			if (property_exists($objSoapObject, 'HierarchyOrderNumber'))
				$objToReturn->intHierarchyOrderNumber = $objSoapObject->HierarchyOrderNumber;
			if (property_exists($objSoapObject, 'ConfidentialFlag'))
				$objToReturn->blnConfidentialFlag = $objSoapObject->ConfidentialFlag;
			if (property_exists($objSoapObject, 'EmailBroadcastTypeId'))
				$objToReturn->intEmailBroadcastTypeId = $objSoapObject->EmailBroadcastTypeId;
			if (property_exists($objSoapObject, 'Token'))
				$objToReturn->strToken = $objSoapObject->Token;
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
				array_push($objArrayToReturn, Group::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objMinistry)
				$objObject->objMinistry = Ministry::GetSoapObjectFromObject($objObject->objMinistry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intMinistryId = null;
			if ($objObject->objParentGroup)
				$objObject->objParentGroup = Group::GetSoapObjectFromObject($objObject->objParentGroup, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentGroupId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $GroupTypeId
	 * @property-read QQNode $MinistryId
	 * @property-read QQNodeMinistry $Ministry
	 * @property-read QQNode $Name
	 * @property-read QQNode $Description
	 * @property-read QQNode $ParentGroupId
	 * @property-read QQNodeGroup $ParentGroup
	 * @property-read QQNode $HierarchyLevel
	 * @property-read QQNode $HierarchyOrderNumber
	 * @property-read QQNode $ConfidentialFlag
	 * @property-read QQNode $EmailBroadcastTypeId
	 * @property-read QQNode $Token
	 * @property-read QQNode $ActiveFlag
	 * @property-read QQReverseReferenceNodeEmailMessageRoute $EmailMessageRoute
	 * @property-read QQReverseReferenceNodeGroup $ChildGroup
	 * @property-read QQReverseReferenceNodeGroupCategory $GroupCategory
	 * @property-read QQReverseReferenceNodeGroupParticipation $GroupParticipation
	 * @property-read QQReverseReferenceNodeGrowthGroup $GrowthGroup
	 * @property-read QQReverseReferenceNodeSmartGroup $SmartGroup
	 */
	class QQNodeGroup extends QQNode {
		protected $strTableName = 'group';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Group';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'GroupTypeId':
					return new QQNode('group_type_id', 'GroupTypeId', 'integer', $this);
				case 'MinistryId':
					return new QQNode('ministry_id', 'MinistryId', 'integer', $this);
				case 'Ministry':
					return new QQNodeMinistry('ministry_id', 'Ministry', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'ParentGroupId':
					return new QQNode('parent_group_id', 'ParentGroupId', 'integer', $this);
				case 'ParentGroup':
					return new QQNodeGroup('parent_group_id', 'ParentGroup', 'integer', $this);
				case 'HierarchyLevel':
					return new QQNode('hierarchy_level', 'HierarchyLevel', 'integer', $this);
				case 'HierarchyOrderNumber':
					return new QQNode('hierarchy_order_number', 'HierarchyOrderNumber', 'integer', $this);
				case 'ConfidentialFlag':
					return new QQNode('confidential_flag', 'ConfidentialFlag', 'boolean', $this);
				case 'EmailBroadcastTypeId':
					return new QQNode('email_broadcast_type_id', 'EmailBroadcastTypeId', 'integer', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'EmailMessageRoute':
					return new QQReverseReferenceNodeEmailMessageRoute($this, 'emailmessageroute', 'reverse_reference', 'group_id');
				case 'ChildGroup':
					return new QQReverseReferenceNodeGroup($this, 'childgroup', 'reverse_reference', 'parent_group_id');
				case 'GroupCategory':
					return new QQReverseReferenceNodeGroupCategory($this, 'groupcategory', 'reverse_reference', 'group_id', 'GroupCategory');
				case 'GroupParticipation':
					return new QQReverseReferenceNodeGroupParticipation($this, 'groupparticipation', 'reverse_reference', 'group_id');
				case 'GrowthGroup':
					return new QQReverseReferenceNodeGrowthGroup($this, 'growthgroup', 'reverse_reference', 'group_id', 'GrowthGroup');
				case 'SmartGroup':
					return new QQReverseReferenceNodeSmartGroup($this, 'smartgroup', 'reverse_reference', 'group_id', 'SmartGroup');

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
	 * @property-read QQNode $GroupTypeId
	 * @property-read QQNode $MinistryId
	 * @property-read QQNodeMinistry $Ministry
	 * @property-read QQNode $Name
	 * @property-read QQNode $Description
	 * @property-read QQNode $ParentGroupId
	 * @property-read QQNodeGroup $ParentGroup
	 * @property-read QQNode $HierarchyLevel
	 * @property-read QQNode $HierarchyOrderNumber
	 * @property-read QQNode $ConfidentialFlag
	 * @property-read QQNode $EmailBroadcastTypeId
	 * @property-read QQNode $Token
	 * @property-read QQNode $ActiveFlag
	 * @property-read QQReverseReferenceNodeEmailMessageRoute $EmailMessageRoute
	 * @property-read QQReverseReferenceNodeGroup $ChildGroup
	 * @property-read QQReverseReferenceNodeGroupCategory $GroupCategory
	 * @property-read QQReverseReferenceNodeGroupParticipation $GroupParticipation
	 * @property-read QQReverseReferenceNodeGrowthGroup $GrowthGroup
	 * @property-read QQReverseReferenceNodeSmartGroup $SmartGroup
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeGroup extends QQReverseReferenceNode {
		protected $strTableName = 'group';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Group';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'GroupTypeId':
					return new QQNode('group_type_id', 'GroupTypeId', 'integer', $this);
				case 'MinistryId':
					return new QQNode('ministry_id', 'MinistryId', 'integer', $this);
				case 'Ministry':
					return new QQNodeMinistry('ministry_id', 'Ministry', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'ParentGroupId':
					return new QQNode('parent_group_id', 'ParentGroupId', 'integer', $this);
				case 'ParentGroup':
					return new QQNodeGroup('parent_group_id', 'ParentGroup', 'integer', $this);
				case 'HierarchyLevel':
					return new QQNode('hierarchy_level', 'HierarchyLevel', 'integer', $this);
				case 'HierarchyOrderNumber':
					return new QQNode('hierarchy_order_number', 'HierarchyOrderNumber', 'integer', $this);
				case 'ConfidentialFlag':
					return new QQNode('confidential_flag', 'ConfidentialFlag', 'boolean', $this);
				case 'EmailBroadcastTypeId':
					return new QQNode('email_broadcast_type_id', 'EmailBroadcastTypeId', 'integer', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'EmailMessageRoute':
					return new QQReverseReferenceNodeEmailMessageRoute($this, 'emailmessageroute', 'reverse_reference', 'group_id');
				case 'ChildGroup':
					return new QQReverseReferenceNodeGroup($this, 'childgroup', 'reverse_reference', 'parent_group_id');
				case 'GroupCategory':
					return new QQReverseReferenceNodeGroupCategory($this, 'groupcategory', 'reverse_reference', 'group_id', 'GroupCategory');
				case 'GroupParticipation':
					return new QQReverseReferenceNodeGroupParticipation($this, 'groupparticipation', 'reverse_reference', 'group_id');
				case 'GrowthGroup':
					return new QQReverseReferenceNodeGrowthGroup($this, 'growthgroup', 'reverse_reference', 'group_id', 'GrowthGroup');
				case 'SmartGroup':
					return new QQReverseReferenceNodeSmartGroup($this, 'smartgroup', 'reverse_reference', 'group_id', 'SmartGroup');

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