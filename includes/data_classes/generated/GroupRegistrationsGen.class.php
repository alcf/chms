<?php
	/**
	 * The abstract GroupRegistrationsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GroupRegistrations subclass which
	 * extends this GroupRegistrationsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GroupRegistrations class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $SourceListId the value for intSourceListId (Not Null)
	 * @property QDateTime $DateReceived the value for dttDateReceived 
	 * @property string $FirstName the value for strFirstName 
	 * @property string $LastName the value for strLastName 
	 * @property string $Gender the value for strGender 
	 * @property string $Address the value for strAddress 
	 * @property string $Phone the value for strPhone 
	 * @property string $Email the value for strEmail 
	 * @property string $Comments the value for strComments 
	 * @property integer $GroupRoleId the value for intGroupRoleId 
	 * @property string $PreferredLocation1 the value for strPreferredLocation1 
	 * @property string $PreferredLocation2 the value for strPreferredLocation2 
	 * @property string $City the value for strCity 
	 * @property string $Zipcode the value for strZipcode 
	 * @property string $GroupDay the value for strGroupDay 
	 * @property boolean $ProcessedFlag the value for blnProcessedFlag 
	 * @property string $GroupsPlaced the value for strGroupsPlaced 
	 * @property QDateTime $DateProcessed the value for dttDateProcessed 
	 * @property SourceList $SourceList the value for the SourceList object referenced by intSourceListId (Not Null)
	 * @property GroupRole $GroupRole the value for the GroupRole object referenced by intGroupRoleId 
	 * @property GrowthGroupStructure $_GrowthGroupStructureAsGroupstructure the value for the private _objGrowthGroupStructureAsGroupstructure (Read-Only) if set due to an expansion on the groupregistrations_groupstructure_assn association table
	 * @property GrowthGroupStructure[] $_GrowthGroupStructureAsGroupstructureArray the value for the private _objGrowthGroupStructureAsGroupstructureArray (Read-Only) if set due to an ExpandAsArray on the groupregistrations_groupstructure_assn association table
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GroupRegistrationsGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column group_registrations.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.source_list_id
		 * @var integer intSourceListId
		 */
		protected $intSourceListId;
		const SourceListIdDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.date_received
		 * @var QDateTime dttDateReceived
		 */
		protected $dttDateReceived;
		const DateReceivedDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 100;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 100;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.gender
		 * @var string strGender
		 */
		protected $strGender;
		const GenderMaxLength = 1;
		const GenderDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.address
		 * @var string strAddress
		 */
		protected $strAddress;
		const AddressMaxLength = 255;
		const AddressDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.phone
		 * @var string strPhone
		 */
		protected $strPhone;
		const PhoneMaxLength = 20;
		const PhoneDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 255;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.comments
		 * @var string strComments
		 */
		protected $strComments;
		const CommentsMaxLength = 255;
		const CommentsDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.group_role_id
		 * @var integer intGroupRoleId
		 */
		protected $intGroupRoleId;
		const GroupRoleIdDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.preferred_location1
		 * @var string strPreferredLocation1
		 */
		protected $strPreferredLocation1;
		const PreferredLocation1MaxLength = 255;
		const PreferredLocation1Default = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.preferred_location2
		 * @var string strPreferredLocation2
		 */
		protected $strPreferredLocation2;
		const PreferredLocation2MaxLength = 255;
		const PreferredLocation2Default = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.city
		 * @var string strCity
		 */
		protected $strCity;
		const CityMaxLength = 255;
		const CityDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.zipcode
		 * @var string strZipcode
		 */
		protected $strZipcode;
		const ZipcodeMaxLength = 10;
		const ZipcodeDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.group_day
		 * @var string strGroupDay
		 */
		protected $strGroupDay;
		const GroupDayMaxLength = 255;
		const GroupDayDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.processed_flag
		 * @var boolean blnProcessedFlag
		 */
		protected $blnProcessedFlag;
		const ProcessedFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.groups_placed
		 * @var string strGroupsPlaced
		 */
		protected $strGroupsPlaced;
		const GroupsPlacedDefault = null;


		/**
		 * Protected member variable that maps to the database column group_registrations.date_processed
		 * @var QDateTime dttDateProcessed
		 */
		protected $dttDateProcessed;
		const DateProcessedDefault = null;


		/**
		 * Private member variable that stores a reference to a single GrowthGroupStructureAsGroupstructure object
		 * (of type GrowthGroupStructure), if this GroupRegistrations object was restored with
		 * an expansion on the groupregistrations_groupstructure_assn association table.
		 * @var GrowthGroupStructure _objGrowthGroupStructureAsGroupstructure;
		 */
		private $_objGrowthGroupStructureAsGroupstructure;

		/**
		 * Private member variable that stores a reference to an array of GrowthGroupStructureAsGroupstructure objects
		 * (of type GrowthGroupStructure[]), if this GroupRegistrations object was restored with
		 * an ExpandAsArray on the groupregistrations_groupstructure_assn association table.
		 * @var GrowthGroupStructure[] _objGrowthGroupStructureAsGroupstructureArray;
		 */
		private $_objGrowthGroupStructureAsGroupstructureArray = array();

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
		 * in the database column group_registrations.source_list_id.
		 *
		 * NOTE: Always use the SourceList property getter to correctly retrieve this SourceList object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SourceList objSourceList
		 */
		protected $objSourceList;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column group_registrations.group_role_id.
		 *
		 * NOTE: Always use the GroupRole property getter to correctly retrieve this GroupRole object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GroupRole objGroupRole
		 */
		protected $objGroupRole;





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
		 * Load a GroupRegistrations from PK Info
		 * @param integer $intId
		 * @return GroupRegistrations
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return GroupRegistrations::QuerySingle(
				QQ::Equal(QQN::GroupRegistrations()->Id, $intId)
			);
		}

		/**
		 * Load all GroupRegistrationses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GroupRegistrations[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call GroupRegistrations::QueryArray to perform the LoadAll query
			try {
				return GroupRegistrations::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GroupRegistrationses
		 * @return int
		 */
		public static function CountAll() {
			// Call GroupRegistrations::QueryCount to perform the CountAll query
			return GroupRegistrations::QueryCount(QQ::All());
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
			$objDatabase = GroupRegistrations::GetDatabase();

			// Create/Build out the QueryBuilder object with GroupRegistrations-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'group_registrations');
			GroupRegistrations::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('group_registrations');

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
		 * Static Qcodo Query method to query for a single GroupRegistrations object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GroupRegistrations the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GroupRegistrations::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new GroupRegistrations object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GroupRegistrations::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return GroupRegistrations::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of GroupRegistrations objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GroupRegistrations[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GroupRegistrations::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GroupRegistrations::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GroupRegistrations::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of GroupRegistrations objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GroupRegistrations::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GroupRegistrations::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'group_registrations_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with GroupRegistrations-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				GroupRegistrations::GetSelectFields($objQueryBuilder);
				GroupRegistrations::GetFromFields($objQueryBuilder);

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
			return GroupRegistrations::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GroupRegistrations
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'group_registrations';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'source_list_id', $strAliasPrefix . 'source_list_id');
			$objBuilder->AddSelectItem($strTableName, 'date_received', $strAliasPrefix . 'date_received');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'gender', $strAliasPrefix . 'gender');
			$objBuilder->AddSelectItem($strTableName, 'address', $strAliasPrefix . 'address');
			$objBuilder->AddSelectItem($strTableName, 'phone', $strAliasPrefix . 'phone');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			$objBuilder->AddSelectItem($strTableName, 'comments', $strAliasPrefix . 'comments');
			$objBuilder->AddSelectItem($strTableName, 'group_role_id', $strAliasPrefix . 'group_role_id');
			$objBuilder->AddSelectItem($strTableName, 'preferred_location1', $strAliasPrefix . 'preferred_location1');
			$objBuilder->AddSelectItem($strTableName, 'preferred_location2', $strAliasPrefix . 'preferred_location2');
			$objBuilder->AddSelectItem($strTableName, 'city', $strAliasPrefix . 'city');
			$objBuilder->AddSelectItem($strTableName, 'zipcode', $strAliasPrefix . 'zipcode');
			$objBuilder->AddSelectItem($strTableName, 'group_day', $strAliasPrefix . 'group_day');
			$objBuilder->AddSelectItem($strTableName, 'processed_flag', $strAliasPrefix . 'processed_flag');
			$objBuilder->AddSelectItem($strTableName, 'groups_placed', $strAliasPrefix . 'groups_placed');
			$objBuilder->AddSelectItem($strTableName, 'date_processed', $strAliasPrefix . 'date_processed');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a GroupRegistrations from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GroupRegistrations::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return GroupRegistrations
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
					$strAliasPrefix = 'group_registrations__';

				$strAlias = $strAliasPrefix . 'growthgroupstructureasgroupstructure__group_structure_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objGrowthGroupStructureAsGroupstructureArray)) {
						$objPreviousChildItem = $objPreviousItem->_objGrowthGroupStructureAsGroupstructureArray[$intPreviousChildItemCount - 1];
						$objChildItem = GrowthGroupStructure::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroupstructureasgroupstructure__group_structure_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objGrowthGroupStructureAsGroupstructureArray[] = $objChildItem;
					} else
						$objPreviousItem->_objGrowthGroupStructureAsGroupstructureArray[] = GrowthGroupStructure::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroupstructureasgroupstructure__group_structure_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'group_registrations__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the GroupRegistrations object
			$objToReturn = new GroupRegistrations();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'source_list_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'source_list_id'] : $strAliasPrefix . 'source_list_id';
			$objToReturn->intSourceListId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_received', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_received'] : $strAliasPrefix . 'date_received';
			$objToReturn->dttDateReceived = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'gender', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'gender'] : $strAliasPrefix . 'gender';
			$objToReturn->strGender = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address'] : $strAliasPrefix . 'address';
			$objToReturn->strAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'phone', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'phone'] : $strAliasPrefix . 'phone';
			$objToReturn->strPhone = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'comments', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'comments'] : $strAliasPrefix . 'comments';
			$objToReturn->strComments = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'group_role_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'group_role_id'] : $strAliasPrefix . 'group_role_id';
			$objToReturn->intGroupRoleId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'preferred_location1', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'preferred_location1'] : $strAliasPrefix . 'preferred_location1';
			$objToReturn->strPreferredLocation1 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'preferred_location2', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'preferred_location2'] : $strAliasPrefix . 'preferred_location2';
			$objToReturn->strPreferredLocation2 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'city', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'city'] : $strAliasPrefix . 'city';
			$objToReturn->strCity = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'zipcode', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'zipcode'] : $strAliasPrefix . 'zipcode';
			$objToReturn->strZipcode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'group_day', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'group_day'] : $strAliasPrefix . 'group_day';
			$objToReturn->strGroupDay = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'processed_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'processed_flag'] : $strAliasPrefix . 'processed_flag';
			$objToReturn->blnProcessedFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'groups_placed', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'groups_placed'] : $strAliasPrefix . 'groups_placed';
			$objToReturn->strGroupsPlaced = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_processed', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_processed'] : $strAliasPrefix . 'date_processed';
			$objToReturn->dttDateProcessed = $objDbRow->GetColumn($strAliasName, 'Date');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'group_registrations__';

			// Check for SourceList Early Binding
			$strAlias = $strAliasPrefix . 'source_list_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSourceList = SourceList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'source_list_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for GroupRole Early Binding
			$strAlias = $strAliasPrefix . 'group_role_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objGroupRole = GroupRole::InstantiateDbRow($objDbRow, $strAliasPrefix . 'group_role_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for GrowthGroupStructureAsGroupstructure Virtual Binding
			$strAlias = $strAliasPrefix . 'growthgroupstructureasgroupstructure__group_structure_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objGrowthGroupStructureAsGroupstructureArray[] = GrowthGroupStructure::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroupstructureasgroupstructure__group_structure_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objGrowthGroupStructureAsGroupstructure = GrowthGroupStructure::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroupstructureasgroupstructure__group_structure_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			return $objToReturn;
		}

		/**
		 * Instantiate an array of GroupRegistrationses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return GroupRegistrations[]
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
					$objItem = GroupRegistrations::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GroupRegistrations::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single GroupRegistrations object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GroupRegistrations next row resulting from the query
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
			return GroupRegistrations::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single GroupRegistrations object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return GroupRegistrations
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return GroupRegistrations::QuerySingle(
				QQ::Equal(QQN::GroupRegistrations()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of GroupRegistrations objects,
		 * by SourceListId Index(es)
		 * @param integer $intSourceListId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GroupRegistrations[]
		*/
		public static function LoadArrayBySourceListId($intSourceListId, $objOptionalClauses = null) {
			// Call GroupRegistrations::QueryArray to perform the LoadArrayBySourceListId query
			try {
				return GroupRegistrations::QueryArray(
					QQ::Equal(QQN::GroupRegistrations()->SourceListId, $intSourceListId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GroupRegistrationses
		 * by SourceListId Index(es)
		 * @param integer $intSourceListId
		 * @return int
		*/
		public static function CountBySourceListId($intSourceListId, $objOptionalClauses = null) {
			// Call GroupRegistrations::QueryCount to perform the CountBySourceListId query
			return GroupRegistrations::QueryCount(
				QQ::Equal(QQN::GroupRegistrations()->SourceListId, $intSourceListId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of GroupRegistrations objects,
		 * by GroupRoleId Index(es)
		 * @param integer $intGroupRoleId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GroupRegistrations[]
		*/
		public static function LoadArrayByGroupRoleId($intGroupRoleId, $objOptionalClauses = null) {
			// Call GroupRegistrations::QueryArray to perform the LoadArrayByGroupRoleId query
			try {
				return GroupRegistrations::QueryArray(
					QQ::Equal(QQN::GroupRegistrations()->GroupRoleId, $intGroupRoleId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GroupRegistrationses
		 * by GroupRoleId Index(es)
		 * @param integer $intGroupRoleId
		 * @return int
		*/
		public static function CountByGroupRoleId($intGroupRoleId, $objOptionalClauses = null) {
			// Call GroupRegistrations::QueryCount to perform the CountByGroupRoleId query
			return GroupRegistrations::QueryCount(
				QQ::Equal(QQN::GroupRegistrations()->GroupRoleId, $intGroupRoleId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of GrowthGroupStructure objects for a given GrowthGroupStructureAsGroupstructure
		 * via the groupregistrations_groupstructure_assn table
		 * @param integer $intGroupStructureId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GroupRegistrations[]
		*/
		public static function LoadArrayByGrowthGroupStructureAsGroupstructure($intGroupStructureId, $objOptionalClauses = null) {
			// Call GroupRegistrations::QueryArray to perform the LoadArrayByGrowthGroupStructureAsGroupstructure query
			try {
				return GroupRegistrations::QueryArray(
					QQ::Equal(QQN::GroupRegistrations()->GrowthGroupStructureAsGroupstructure->GroupStructureId, $intGroupStructureId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GroupRegistrationses for a given GrowthGroupStructureAsGroupstructure
		 * via the groupregistrations_groupstructure_assn table
		 * @param integer $intGroupStructureId
		 * @return int
		*/
		public static function CountByGrowthGroupStructureAsGroupstructure($intGroupStructureId, $objOptionalClauses = null) {
			return GroupRegistrations::QueryCount(
				QQ::Equal(QQN::GroupRegistrations()->GrowthGroupStructureAsGroupstructure->GroupStructureId, $intGroupStructureId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this GroupRegistrations
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GroupRegistrations::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `group_registrations` (
							`source_list_id`,
							`date_received`,
							`first_name`,
							`last_name`,
							`gender`,
							`address`,
							`phone`,
							`email`,
							`comments`,
							`group_role_id`,
							`preferred_location1`,
							`preferred_location2`,
							`city`,
							`zipcode`,
							`group_day`,
							`processed_flag`,
							`groups_placed`,
							`date_processed`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intSourceListId) . ',
							' . $objDatabase->SqlVariable($this->dttDateReceived) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strGender) . ',
							' . $objDatabase->SqlVariable($this->strAddress) . ',
							' . $objDatabase->SqlVariable($this->strPhone) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strComments) . ',
							' . $objDatabase->SqlVariable($this->intGroupRoleId) . ',
							' . $objDatabase->SqlVariable($this->strPreferredLocation1) . ',
							' . $objDatabase->SqlVariable($this->strPreferredLocation2) . ',
							' . $objDatabase->SqlVariable($this->strCity) . ',
							' . $objDatabase->SqlVariable($this->strZipcode) . ',
							' . $objDatabase->SqlVariable($this->strGroupDay) . ',
							' . $objDatabase->SqlVariable($this->blnProcessedFlag) . ',
							' . $objDatabase->SqlVariable($this->strGroupsPlaced) . ',
							' . $objDatabase->SqlVariable($this->dttDateProcessed) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('group_registrations', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`group_registrations`
						SET
							`source_list_id` = ' . $objDatabase->SqlVariable($this->intSourceListId) . ',
							`date_received` = ' . $objDatabase->SqlVariable($this->dttDateReceived) . ',
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`gender` = ' . $objDatabase->SqlVariable($this->strGender) . ',
							`address` = ' . $objDatabase->SqlVariable($this->strAddress) . ',
							`phone` = ' . $objDatabase->SqlVariable($this->strPhone) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`comments` = ' . $objDatabase->SqlVariable($this->strComments) . ',
							`group_role_id` = ' . $objDatabase->SqlVariable($this->intGroupRoleId) . ',
							`preferred_location1` = ' . $objDatabase->SqlVariable($this->strPreferredLocation1) . ',
							`preferred_location2` = ' . $objDatabase->SqlVariable($this->strPreferredLocation2) . ',
							`city` = ' . $objDatabase->SqlVariable($this->strCity) . ',
							`zipcode` = ' . $objDatabase->SqlVariable($this->strZipcode) . ',
							`group_day` = ' . $objDatabase->SqlVariable($this->strGroupDay) . ',
							`processed_flag` = ' . $objDatabase->SqlVariable($this->blnProcessedFlag) . ',
							`groups_placed` = ' . $objDatabase->SqlVariable($this->strGroupsPlaced) . ',
							`date_processed` = ' . $objDatabase->SqlVariable($this->dttDateProcessed) . '
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
		 * Delete this GroupRegistrations
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GroupRegistrations with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GroupRegistrations::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group_registrations`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all GroupRegistrationses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GroupRegistrations::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group_registrations`');
		}

		/**
		 * Truncate group_registrations table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GroupRegistrations::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `group_registrations`');
		}

		/**
		 * Reload this GroupRegistrations from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GroupRegistrations object.');

			// Reload the Object
			$objReloaded = GroupRegistrations::Load($this->intId);

			// Update $this's local variables to match
			$this->SourceListId = $objReloaded->SourceListId;
			$this->dttDateReceived = $objReloaded->dttDateReceived;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strGender = $objReloaded->strGender;
			$this->strAddress = $objReloaded->strAddress;
			$this->strPhone = $objReloaded->strPhone;
			$this->strEmail = $objReloaded->strEmail;
			$this->strComments = $objReloaded->strComments;
			$this->GroupRoleId = $objReloaded->GroupRoleId;
			$this->strPreferredLocation1 = $objReloaded->strPreferredLocation1;
			$this->strPreferredLocation2 = $objReloaded->strPreferredLocation2;
			$this->strCity = $objReloaded->strCity;
			$this->strZipcode = $objReloaded->strZipcode;
			$this->strGroupDay = $objReloaded->strGroupDay;
			$this->blnProcessedFlag = $objReloaded->blnProcessedFlag;
			$this->strGroupsPlaced = $objReloaded->strGroupsPlaced;
			$this->dttDateProcessed = $objReloaded->dttDateProcessed;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = GroupRegistrations::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `group_registrations` (
					`id`,
					`source_list_id`,
					`date_received`,
					`first_name`,
					`last_name`,
					`gender`,
					`address`,
					`phone`,
					`email`,
					`comments`,
					`group_role_id`,
					`preferred_location1`,
					`preferred_location2`,
					`city`,
					`zipcode`,
					`group_day`,
					`processed_flag`,
					`groups_placed`,
					`date_processed`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intSourceListId) . ',
					' . $objDatabase->SqlVariable($this->dttDateReceived) . ',
					' . $objDatabase->SqlVariable($this->strFirstName) . ',
					' . $objDatabase->SqlVariable($this->strLastName) . ',
					' . $objDatabase->SqlVariable($this->strGender) . ',
					' . $objDatabase->SqlVariable($this->strAddress) . ',
					' . $objDatabase->SqlVariable($this->strPhone) . ',
					' . $objDatabase->SqlVariable($this->strEmail) . ',
					' . $objDatabase->SqlVariable($this->strComments) . ',
					' . $objDatabase->SqlVariable($this->intGroupRoleId) . ',
					' . $objDatabase->SqlVariable($this->strPreferredLocation1) . ',
					' . $objDatabase->SqlVariable($this->strPreferredLocation2) . ',
					' . $objDatabase->SqlVariable($this->strCity) . ',
					' . $objDatabase->SqlVariable($this->strZipcode) . ',
					' . $objDatabase->SqlVariable($this->strGroupDay) . ',
					' . $objDatabase->SqlVariable($this->blnProcessedFlag) . ',
					' . $objDatabase->SqlVariable($this->strGroupsPlaced) . ',
					' . $objDatabase->SqlVariable($this->dttDateProcessed) . ',
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
		 * @return GroupRegistrations[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = GroupRegistrations::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM group_registrations WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return GroupRegistrations::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return GroupRegistrations[]
		 */
		public function GetJournal() {
			return GroupRegistrations::GetJournalForId($this->intId);
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

				case 'SourceListId':
					// Gets the value for intSourceListId (Not Null)
					// @return integer
					return $this->intSourceListId;

				case 'DateReceived':
					// Gets the value for dttDateReceived 
					// @return QDateTime
					return $this->dttDateReceived;

				case 'FirstName':
					// Gets the value for strFirstName 
					// @return string
					return $this->strFirstName;

				case 'LastName':
					// Gets the value for strLastName 
					// @return string
					return $this->strLastName;

				case 'Gender':
					// Gets the value for strGender 
					// @return string
					return $this->strGender;

				case 'Address':
					// Gets the value for strAddress 
					// @return string
					return $this->strAddress;

				case 'Phone':
					// Gets the value for strPhone 
					// @return string
					return $this->strPhone;

				case 'Email':
					// Gets the value for strEmail 
					// @return string
					return $this->strEmail;

				case 'Comments':
					// Gets the value for strComments 
					// @return string
					return $this->strComments;

				case 'GroupRoleId':
					// Gets the value for intGroupRoleId 
					// @return integer
					return $this->intGroupRoleId;

				case 'PreferredLocation1':
					// Gets the value for strPreferredLocation1 
					// @return string
					return $this->strPreferredLocation1;

				case 'PreferredLocation2':
					// Gets the value for strPreferredLocation2 
					// @return string
					return $this->strPreferredLocation2;

				case 'City':
					// Gets the value for strCity 
					// @return string
					return $this->strCity;

				case 'Zipcode':
					// Gets the value for strZipcode 
					// @return string
					return $this->strZipcode;

				case 'GroupDay':
					// Gets the value for strGroupDay 
					// @return string
					return $this->strGroupDay;

				case 'ProcessedFlag':
					// Gets the value for blnProcessedFlag 
					// @return boolean
					return $this->blnProcessedFlag;

				case 'GroupsPlaced':
					// Gets the value for strGroupsPlaced 
					// @return string
					return $this->strGroupsPlaced;

				case 'DateProcessed':
					// Gets the value for dttDateProcessed 
					// @return QDateTime
					return $this->dttDateProcessed;


				///////////////////
				// Member Objects
				///////////////////
				case 'SourceList':
					// Gets the value for the SourceList object referenced by intSourceListId (Not Null)
					// @return SourceList
					try {
						if ((!$this->objSourceList) && (!is_null($this->intSourceListId)))
							$this->objSourceList = SourceList::Load($this->intSourceListId);
						return $this->objSourceList;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GroupRole':
					// Gets the value for the GroupRole object referenced by intGroupRoleId 
					// @return GroupRole
					try {
						if ((!$this->objGroupRole) && (!is_null($this->intGroupRoleId)))
							$this->objGroupRole = GroupRole::Load($this->intGroupRoleId);
						return $this->objGroupRole;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_GrowthGroupStructureAsGroupstructure':
					// Gets the value for the private _objGrowthGroupStructureAsGroupstructure (Read-Only)
					// if set due to an expansion on the groupregistrations_groupstructure_assn association table
					// @return GrowthGroupStructure
					return $this->_objGrowthGroupStructureAsGroupstructure;

				case '_GrowthGroupStructureAsGroupstructureArray':
					// Gets the value for the private _objGrowthGroupStructureAsGroupstructureArray (Read-Only)
					// if set due to an ExpandAsArray on the groupregistrations_groupstructure_assn association table
					// @return GrowthGroupStructure[]
					return (array) $this->_objGrowthGroupStructureAsGroupstructureArray;


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
				case 'SourceListId':
					// Sets the value for intSourceListId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSourceList = null;
						return ($this->intSourceListId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateReceived':
					// Sets the value for dttDateReceived 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateReceived = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'Gender':
					// Sets the value for strGender 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strGender = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Address':
					// Sets the value for strAddress 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Phone':
					// Sets the value for strPhone 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPhone = QType::Cast($mixValue, QType::String));
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

				case 'Comments':
					// Sets the value for strComments 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strComments = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GroupRoleId':
					// Sets the value for intGroupRoleId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objGroupRole = null;
						return ($this->intGroupRoleId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PreferredLocation1':
					// Sets the value for strPreferredLocation1 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPreferredLocation1 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PreferredLocation2':
					// Sets the value for strPreferredLocation2 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPreferredLocation2 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'City':
					// Sets the value for strCity 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCity = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Zipcode':
					// Sets the value for strZipcode 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strZipcode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GroupDay':
					// Sets the value for strGroupDay 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strGroupDay = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ProcessedFlag':
					// Sets the value for blnProcessedFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnProcessedFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GroupsPlaced':
					// Sets the value for strGroupsPlaced 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strGroupsPlaced = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateProcessed':
					// Sets the value for dttDateProcessed 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateProcessed = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'SourceList':
					// Sets the value for the SourceList object referenced by intSourceListId (Not Null)
					// @param SourceList $mixValue
					// @return SourceList
					if (is_null($mixValue)) {
						$this->intSourceListId = null;
						$this->objSourceList = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SourceList object
						try {
							$mixValue = QType::Cast($mixValue, 'SourceList');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED SourceList object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved SourceList for this GroupRegistrations');

						// Update Local Member Variables
						$this->objSourceList = $mixValue;
						$this->intSourceListId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GroupRole':
					// Sets the value for the GroupRole object referenced by intGroupRoleId 
					// @param GroupRole $mixValue
					// @return GroupRole
					if (is_null($mixValue)) {
						$this->intGroupRoleId = null;
						$this->objGroupRole = null;
						return null;
					} else {
						// Make sure $mixValue actually is a GroupRole object
						try {
							$mixValue = QType::Cast($mixValue, 'GroupRole');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED GroupRole object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved GroupRole for this GroupRegistrations');

						// Update Local Member Variables
						$this->objGroupRole = $mixValue;
						$this->intGroupRoleId = $mixValue->Id;

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

			
		// Related Many-to-Many Objects' Methods for GrowthGroupStructureAsGroupstructure
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated GrowthGroupStructuresAsGroupstructure as an array of GrowthGroupStructure objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GrowthGroupStructure[]
		*/ 
		public function GetGrowthGroupStructureAsGroupstructureArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GrowthGroupStructure::LoadArrayByGroupRegistrationsAsGroupstructure($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated GrowthGroupStructuresAsGroupstructure
		 * @return int
		*/ 
		public function CountGrowthGroupStructuresAsGroupstructure() {
			if ((is_null($this->intId)))
				return 0;

			return GrowthGroupStructure::CountByGroupRegistrationsAsGroupstructure($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific GrowthGroupStructureAsGroupstructure
		 * @param GrowthGroupStructure $objGrowthGroupStructure
		 * @return bool
		*/
		public function IsGrowthGroupStructureAsGroupstructureAssociated(GrowthGroupStructure $objGrowthGroupStructure) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGrowthGroupStructureAsGroupstructureAssociated on this unsaved GroupRegistrations.');
			if ((is_null($objGrowthGroupStructure->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGrowthGroupStructureAsGroupstructureAssociated on this GroupRegistrations with an unsaved GrowthGroupStructure.');

			$intRowCount = GroupRegistrations::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GroupRegistrations()->Id, $this->intId),
					QQ::Equal(QQN::GroupRegistrations()->GrowthGroupStructureAsGroupstructure->GroupStructureId, $objGrowthGroupStructure->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the GrowthGroupStructureAsGroupstructure relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalGrowthGroupStructureAsGroupstructureAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = GroupRegistrations::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `groupregistrations_groupstructure_assn` (
					`group_registrations_id`,
					`group_structure_id`,
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
		 * Gets the historical journal for an object's GrowthGroupStructureAsGroupstructure relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalGrowthGroupStructureAsGroupstructureAssociationForId($intId) {
			$objDatabase = GroupRegistrations::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM groupregistrations_groupstructure_assn WHERE group_registrations_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's GrowthGroupStructureAsGroupstructure relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalGrowthGroupStructureAsGroupstructureAssociation() {
			return GroupRegistrations::GetJournalGrowthGroupStructureAsGroupstructureAssociationForId($this->intId);
		}

		/**
		 * Associates a GrowthGroupStructureAsGroupstructure
		 * @param GrowthGroupStructure $objGrowthGroupStructure
		 * @return void
		*/ 
		public function AssociateGrowthGroupStructureAsGroupstructure(GrowthGroupStructure $objGrowthGroupStructure) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGrowthGroupStructureAsGroupstructure on this unsaved GroupRegistrations.');
			if ((is_null($objGrowthGroupStructure->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGrowthGroupStructureAsGroupstructure on this GroupRegistrations with an unsaved GrowthGroupStructure.');

			// Get the Database Object for this Class
			$objDatabase = GroupRegistrations::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `groupregistrations_groupstructure_assn` (
					`group_registrations_id`,
					`group_structure_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objGrowthGroupStructure->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalGrowthGroupStructureAsGroupstructureAssociation($objGrowthGroupStructure->Id, 'INSERT');
		}

		/**
		 * Unassociates a GrowthGroupStructureAsGroupstructure
		 * @param GrowthGroupStructure $objGrowthGroupStructure
		 * @return void
		*/ 
		public function UnassociateGrowthGroupStructureAsGroupstructure(GrowthGroupStructure $objGrowthGroupStructure) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroupStructureAsGroupstructure on this unsaved GroupRegistrations.');
			if ((is_null($objGrowthGroupStructure->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroupStructureAsGroupstructure on this GroupRegistrations with an unsaved GrowthGroupStructure.');

			// Get the Database Object for this Class
			$objDatabase = GroupRegistrations::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`groupregistrations_groupstructure_assn`
				WHERE
					`group_registrations_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`group_structure_id` = ' . $objDatabase->SqlVariable($objGrowthGroupStructure->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalGrowthGroupStructureAsGroupstructureAssociation($objGrowthGroupStructure->Id, 'DELETE');
		}

		/**
		 * Unassociates all GrowthGroupStructuresAsGroupstructure
		 * @return void
		*/ 
		public function UnassociateAllGrowthGroupStructuresAsGroupstructure() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllGrowthGroupStructureAsGroupstructureArray on this unsaved GroupRegistrations.');

			// Get the Database Object for this Class
			$objDatabase = GroupRegistrations::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `group_structure_id` AS associated_id FROM `groupregistrations_groupstructure_assn` WHERE `group_registrations_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalGrowthGroupStructureAsGroupstructureAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`groupregistrations_groupstructure_assn`
				WHERE
					`group_registrations_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="GroupRegistrations"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="SourceList" type="xsd1:SourceList"/>';
			$strToReturn .= '<element name="DateReceived" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="Gender" type="xsd:string"/>';
			$strToReturn .= '<element name="Address" type="xsd:string"/>';
			$strToReturn .= '<element name="Phone" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="Comments" type="xsd:string"/>';
			$strToReturn .= '<element name="GroupRole" type="xsd1:GroupRole"/>';
			$strToReturn .= '<element name="PreferredLocation1" type="xsd:string"/>';
			$strToReturn .= '<element name="PreferredLocation2" type="xsd:string"/>';
			$strToReturn .= '<element name="City" type="xsd:string"/>';
			$strToReturn .= '<element name="Zipcode" type="xsd:string"/>';
			$strToReturn .= '<element name="GroupDay" type="xsd:string"/>';
			$strToReturn .= '<element name="ProcessedFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="GroupsPlaced" type="xsd:string"/>';
			$strToReturn .= '<element name="DateProcessed" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GroupRegistrations', $strComplexTypeArray)) {
				$strComplexTypeArray['GroupRegistrations'] = GroupRegistrations::GetSoapComplexTypeXml();
				SourceList::AlterSoapComplexTypeArray($strComplexTypeArray);
				GroupRole::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GroupRegistrations::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GroupRegistrations();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'SourceList')) &&
				($objSoapObject->SourceList))
				$objToReturn->SourceList = SourceList::GetObjectFromSoapObject($objSoapObject->SourceList);
			if (property_exists($objSoapObject, 'DateReceived'))
				$objToReturn->dttDateReceived = new QDateTime($objSoapObject->DateReceived);
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'Gender'))
				$objToReturn->strGender = $objSoapObject->Gender;
			if (property_exists($objSoapObject, 'Address'))
				$objToReturn->strAddress = $objSoapObject->Address;
			if (property_exists($objSoapObject, 'Phone'))
				$objToReturn->strPhone = $objSoapObject->Phone;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'Comments'))
				$objToReturn->strComments = $objSoapObject->Comments;
			if ((property_exists($objSoapObject, 'GroupRole')) &&
				($objSoapObject->GroupRole))
				$objToReturn->GroupRole = GroupRole::GetObjectFromSoapObject($objSoapObject->GroupRole);
			if (property_exists($objSoapObject, 'PreferredLocation1'))
				$objToReturn->strPreferredLocation1 = $objSoapObject->PreferredLocation1;
			if (property_exists($objSoapObject, 'PreferredLocation2'))
				$objToReturn->strPreferredLocation2 = $objSoapObject->PreferredLocation2;
			if (property_exists($objSoapObject, 'City'))
				$objToReturn->strCity = $objSoapObject->City;
			if (property_exists($objSoapObject, 'Zipcode'))
				$objToReturn->strZipcode = $objSoapObject->Zipcode;
			if (property_exists($objSoapObject, 'GroupDay'))
				$objToReturn->strGroupDay = $objSoapObject->GroupDay;
			if (property_exists($objSoapObject, 'ProcessedFlag'))
				$objToReturn->blnProcessedFlag = $objSoapObject->ProcessedFlag;
			if (property_exists($objSoapObject, 'GroupsPlaced'))
				$objToReturn->strGroupsPlaced = $objSoapObject->GroupsPlaced;
			if (property_exists($objSoapObject, 'DateProcessed'))
				$objToReturn->dttDateProcessed = new QDateTime($objSoapObject->DateProcessed);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, GroupRegistrations::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSourceList)
				$objObject->objSourceList = SourceList::GetSoapObjectFromObject($objObject->objSourceList, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSourceListId = null;
			if ($objObject->dttDateReceived)
				$objObject->dttDateReceived = $objObject->dttDateReceived->__toString(QDateTime::FormatSoap);
			if ($objObject->objGroupRole)
				$objObject->objGroupRole = GroupRole::GetSoapObjectFromObject($objObject->objGroupRole, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGroupRoleId = null;
			if ($objObject->dttDateProcessed)
				$objObject->dttDateProcessed = $objObject->dttDateProcessed->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $GroupStructureId
	 * @property-read QQNodeGrowthGroupStructure $GrowthGroupStructure
	 * @property-read QQNodeGrowthGroupStructure $_ChildTableNode
	 */
	class QQNodeGroupRegistrationsGrowthGroupStructureAsGroupstructure extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'growthgroupstructureasgroupstructure';

		protected $strTableName = 'groupregistrations_groupstructure_assn';
		protected $strPrimaryKey = 'group_registrations_id';
		protected $strClassName = 'GrowthGroupStructure';

		public function __get($strName) {
			switch ($strName) {
				case 'GroupStructureId':
					return new QQNode('group_structure_id', 'GroupStructureId', 'integer', $this);
				case 'GrowthGroupStructure':
					return new QQNodeGrowthGroupStructure('group_structure_id', 'GroupStructureId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeGrowthGroupStructure('group_structure_id', 'GroupStructureId', 'integer', $this);
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
	 * @property-read QQNode $SourceListId
	 * @property-read QQNodeSourceList $SourceList
	 * @property-read QQNode $DateReceived
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Gender
	 * @property-read QQNode $Address
	 * @property-read QQNode $Phone
	 * @property-read QQNode $Email
	 * @property-read QQNode $Comments
	 * @property-read QQNode $GroupRoleId
	 * @property-read QQNodeGroupRole $GroupRole
	 * @property-read QQNode $PreferredLocation1
	 * @property-read QQNode $PreferredLocation2
	 * @property-read QQNode $City
	 * @property-read QQNode $Zipcode
	 * @property-read QQNode $GroupDay
	 * @property-read QQNode $ProcessedFlag
	 * @property-read QQNode $GroupsPlaced
	 * @property-read QQNode $DateProcessed
	 * @property-read QQNodeGroupRegistrationsGrowthGroupStructureAsGroupstructure $GrowthGroupStructureAsGroupstructure
	 */
	class QQNodeGroupRegistrations extends QQNode {
		protected $strTableName = 'group_registrations';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GroupRegistrations';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SourceListId':
					return new QQNode('source_list_id', 'SourceListId', 'integer', $this);
				case 'SourceList':
					return new QQNodeSourceList('source_list_id', 'SourceList', 'integer', $this);
				case 'DateReceived':
					return new QQNode('date_received', 'DateReceived', 'QDateTime', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Gender':
					return new QQNode('gender', 'Gender', 'string', $this);
				case 'Address':
					return new QQNode('address', 'Address', 'string', $this);
				case 'Phone':
					return new QQNode('phone', 'Phone', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'Comments':
					return new QQNode('comments', 'Comments', 'string', $this);
				case 'GroupRoleId':
					return new QQNode('group_role_id', 'GroupRoleId', 'integer', $this);
				case 'GroupRole':
					return new QQNodeGroupRole('group_role_id', 'GroupRole', 'integer', $this);
				case 'PreferredLocation1':
					return new QQNode('preferred_location1', 'PreferredLocation1', 'string', $this);
				case 'PreferredLocation2':
					return new QQNode('preferred_location2', 'PreferredLocation2', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'Zipcode':
					return new QQNode('zipcode', 'Zipcode', 'string', $this);
				case 'GroupDay':
					return new QQNode('group_day', 'GroupDay', 'string', $this);
				case 'ProcessedFlag':
					return new QQNode('processed_flag', 'ProcessedFlag', 'boolean', $this);
				case 'GroupsPlaced':
					return new QQNode('groups_placed', 'GroupsPlaced', 'string', $this);
				case 'DateProcessed':
					return new QQNode('date_processed', 'DateProcessed', 'QDateTime', $this);
				case 'GrowthGroupStructureAsGroupstructure':
					return new QQNodeGroupRegistrationsGrowthGroupStructureAsGroupstructure($this);

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
	 * @property-read QQNode $SourceListId
	 * @property-read QQNodeSourceList $SourceList
	 * @property-read QQNode $DateReceived
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Gender
	 * @property-read QQNode $Address
	 * @property-read QQNode $Phone
	 * @property-read QQNode $Email
	 * @property-read QQNode $Comments
	 * @property-read QQNode $GroupRoleId
	 * @property-read QQNodeGroupRole $GroupRole
	 * @property-read QQNode $PreferredLocation1
	 * @property-read QQNode $PreferredLocation2
	 * @property-read QQNode $City
	 * @property-read QQNode $Zipcode
	 * @property-read QQNode $GroupDay
	 * @property-read QQNode $ProcessedFlag
	 * @property-read QQNode $GroupsPlaced
	 * @property-read QQNode $DateProcessed
	 * @property-read QQNodeGroupRegistrationsGrowthGroupStructureAsGroupstructure $GrowthGroupStructureAsGroupstructure
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeGroupRegistrations extends QQReverseReferenceNode {
		protected $strTableName = 'group_registrations';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GroupRegistrations';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SourceListId':
					return new QQNode('source_list_id', 'SourceListId', 'integer', $this);
				case 'SourceList':
					return new QQNodeSourceList('source_list_id', 'SourceList', 'integer', $this);
				case 'DateReceived':
					return new QQNode('date_received', 'DateReceived', 'QDateTime', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Gender':
					return new QQNode('gender', 'Gender', 'string', $this);
				case 'Address':
					return new QQNode('address', 'Address', 'string', $this);
				case 'Phone':
					return new QQNode('phone', 'Phone', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'Comments':
					return new QQNode('comments', 'Comments', 'string', $this);
				case 'GroupRoleId':
					return new QQNode('group_role_id', 'GroupRoleId', 'integer', $this);
				case 'GroupRole':
					return new QQNodeGroupRole('group_role_id', 'GroupRole', 'integer', $this);
				case 'PreferredLocation1':
					return new QQNode('preferred_location1', 'PreferredLocation1', 'string', $this);
				case 'PreferredLocation2':
					return new QQNode('preferred_location2', 'PreferredLocation2', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'Zipcode':
					return new QQNode('zipcode', 'Zipcode', 'string', $this);
				case 'GroupDay':
					return new QQNode('group_day', 'GroupDay', 'string', $this);
				case 'ProcessedFlag':
					return new QQNode('processed_flag', 'ProcessedFlag', 'boolean', $this);
				case 'GroupsPlaced':
					return new QQNode('groups_placed', 'GroupsPlaced', 'string', $this);
				case 'DateProcessed':
					return new QQNode('date_processed', 'DateProcessed', 'QDateTime', $this);
				case 'GrowthGroupStructureAsGroupstructure':
					return new QQNodeGroupRegistrationsGrowthGroupStructureAsGroupstructure($this);

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