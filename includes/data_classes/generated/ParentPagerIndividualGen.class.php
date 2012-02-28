<?php
	/**
	 * The abstract ParentPagerIndividualGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ParentPagerIndividual subclass which
	 * extends this ParentPagerIndividualGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ParentPagerIndividual class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $ServerIdentifier the value for intServerIdentifier (Unique)
	 * @property integer $PersonId the value for intPersonId 
	 * @property boolean $HiddenFlag the value for blnHiddenFlag (Not Null)
	 * @property integer $ParentPagerSyncStatusTypeId the value for intParentPagerSyncStatusTypeId (Not Null)
	 * @property integer $ParentPagerHouseholdId the value for intParentPagerHouseholdId 
	 * @property string $FirstName the value for strFirstName 
	 * @property string $MiddleName the value for strMiddleName 
	 * @property string $LastName the value for strLastName 
	 * @property string $Prefix the value for strPrefix 
	 * @property string $Suffix the value for strSuffix 
	 * @property string $Nickname the value for strNickname 
	 * @property integer $GraduationYear the value for intGraduationYear 
	 * @property string $Gender the value for strGender 
	 * @property QDateTime $DateOfBirth the value for dttDateOfBirth 
	 * @property Person $Person the value for the Person object referenced by intPersonId 
	 * @property ParentPagerHousehold $ParentPagerHousehold the value for the ParentPagerHousehold object referenced by intParentPagerHouseholdId 
	 * @property ParentPagerAddress $_ParentPagerAddress the value for the private _objParentPagerAddress (Read-Only) if set due to an expansion on the parent_pager_address.parent_pager_individual_id reverse relationship
	 * @property ParentPagerAddress[] $_ParentPagerAddressArray the value for the private _objParentPagerAddressArray (Read-Only) if set due to an ExpandAsArray on the parent_pager_address.parent_pager_individual_id reverse relationship
	 * @property ParentPagerAttendantHistory $_ParentPagerAttendantHistory the value for the private _objParentPagerAttendantHistory (Read-Only) if set due to an expansion on the parent_pager_attendant_history.parent_pager_individual_id reverse relationship
	 * @property ParentPagerAttendantHistory[] $_ParentPagerAttendantHistoryArray the value for the private _objParentPagerAttendantHistoryArray (Read-Only) if set due to an ExpandAsArray on the parent_pager_attendant_history.parent_pager_individual_id reverse relationship
	 * @property ParentPagerChildHistory $_ParentPagerChildHistoryAsPickupBy the value for the private _objParentPagerChildHistoryAsPickupBy (Read-Only) if set due to an expansion on the parent_pager_child_history.pickup_by_parent_pager_individual_id reverse relationship
	 * @property ParentPagerChildHistory[] $_ParentPagerChildHistoryAsPickupByArray the value for the private _objParentPagerChildHistoryAsPickupByArray (Read-Only) if set due to an ExpandAsArray on the parent_pager_child_history.pickup_by_parent_pager_individual_id reverse relationship
	 * @property ParentPagerChildHistory $_ParentPagerChildHistory the value for the private _objParentPagerChildHistory (Read-Only) if set due to an expansion on the parent_pager_child_history.parent_pager_individual_id reverse relationship
	 * @property ParentPagerChildHistory[] $_ParentPagerChildHistoryArray the value for the private _objParentPagerChildHistoryArray (Read-Only) if set due to an ExpandAsArray on the parent_pager_child_history.parent_pager_individual_id reverse relationship
	 * @property ParentPagerChildHistory $_ParentPagerChildHistoryAsDropoffBy the value for the private _objParentPagerChildHistoryAsDropoffBy (Read-Only) if set due to an expansion on the parent_pager_child_history.dropoff_by_parent_pager_individual_id reverse relationship
	 * @property ParentPagerChildHistory[] $_ParentPagerChildHistoryAsDropoffByArray the value for the private _objParentPagerChildHistoryAsDropoffByArray (Read-Only) if set due to an ExpandAsArray on the parent_pager_child_history.dropoff_by_parent_pager_individual_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ParentPagerIndividualGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column parent_pager_individual.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.server_identifier
		 * @var integer intServerIdentifier
		 */
		protected $intServerIdentifier;
		const ServerIdentifierDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.hidden_flag
		 * @var boolean blnHiddenFlag
		 */
		protected $blnHiddenFlag;
		const HiddenFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.parent_pager_sync_status_type_id
		 * @var integer intParentPagerSyncStatusTypeId
		 */
		protected $intParentPagerSyncStatusTypeId;
		const ParentPagerSyncStatusTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.parent_pager_household_id
		 * @var integer intParentPagerHouseholdId
		 */
		protected $intParentPagerHouseholdId;
		const ParentPagerHouseholdIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 50;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.middle_name
		 * @var string strMiddleName
		 */
		protected $strMiddleName;
		const MiddleNameMaxLength = 50;
		const MiddleNameDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 50;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.prefix
		 * @var string strPrefix
		 */
		protected $strPrefix;
		const PrefixMaxLength = 20;
		const PrefixDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.suffix
		 * @var string strSuffix
		 */
		protected $strSuffix;
		const SuffixMaxLength = 20;
		const SuffixDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.nickname
		 * @var string strNickname
		 */
		protected $strNickname;
		const NicknameMaxLength = 50;
		const NicknameDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.graduation_year
		 * @var integer intGraduationYear
		 */
		protected $intGraduationYear;
		const GraduationYearDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.gender
		 * @var string strGender
		 */
		protected $strGender;
		const GenderMaxLength = 1;
		const GenderDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_individual.date_of_birth
		 * @var QDateTime dttDateOfBirth
		 */
		protected $dttDateOfBirth;
		const DateOfBirthDefault = null;


		/**
		 * Private member variable that stores a reference to a single ParentPagerAddress object
		 * (of type ParentPagerAddress), if this ParentPagerIndividual object was restored with
		 * an expansion on the parent_pager_address association table.
		 * @var ParentPagerAddress _objParentPagerAddress;
		 */
		private $_objParentPagerAddress;

		/**
		 * Private member variable that stores a reference to an array of ParentPagerAddress objects
		 * (of type ParentPagerAddress[]), if this ParentPagerIndividual object was restored with
		 * an ExpandAsArray on the parent_pager_address association table.
		 * @var ParentPagerAddress[] _objParentPagerAddressArray;
		 */
		private $_objParentPagerAddressArray = array();

		/**
		 * Private member variable that stores a reference to a single ParentPagerAttendantHistory object
		 * (of type ParentPagerAttendantHistory), if this ParentPagerIndividual object was restored with
		 * an expansion on the parent_pager_attendant_history association table.
		 * @var ParentPagerAttendantHistory _objParentPagerAttendantHistory;
		 */
		private $_objParentPagerAttendantHistory;

		/**
		 * Private member variable that stores a reference to an array of ParentPagerAttendantHistory objects
		 * (of type ParentPagerAttendantHistory[]), if this ParentPagerIndividual object was restored with
		 * an ExpandAsArray on the parent_pager_attendant_history association table.
		 * @var ParentPagerAttendantHistory[] _objParentPagerAttendantHistoryArray;
		 */
		private $_objParentPagerAttendantHistoryArray = array();

		/**
		 * Private member variable that stores a reference to a single ParentPagerChildHistoryAsPickupBy object
		 * (of type ParentPagerChildHistory), if this ParentPagerIndividual object was restored with
		 * an expansion on the parent_pager_child_history association table.
		 * @var ParentPagerChildHistory _objParentPagerChildHistoryAsPickupBy;
		 */
		private $_objParentPagerChildHistoryAsPickupBy;

		/**
		 * Private member variable that stores a reference to an array of ParentPagerChildHistoryAsPickupBy objects
		 * (of type ParentPagerChildHistory[]), if this ParentPagerIndividual object was restored with
		 * an ExpandAsArray on the parent_pager_child_history association table.
		 * @var ParentPagerChildHistory[] _objParentPagerChildHistoryAsPickupByArray;
		 */
		private $_objParentPagerChildHistoryAsPickupByArray = array();

		/**
		 * Private member variable that stores a reference to a single ParentPagerChildHistory object
		 * (of type ParentPagerChildHistory), if this ParentPagerIndividual object was restored with
		 * an expansion on the parent_pager_child_history association table.
		 * @var ParentPagerChildHistory _objParentPagerChildHistory;
		 */
		private $_objParentPagerChildHistory;

		/**
		 * Private member variable that stores a reference to an array of ParentPagerChildHistory objects
		 * (of type ParentPagerChildHistory[]), if this ParentPagerIndividual object was restored with
		 * an ExpandAsArray on the parent_pager_child_history association table.
		 * @var ParentPagerChildHistory[] _objParentPagerChildHistoryArray;
		 */
		private $_objParentPagerChildHistoryArray = array();

		/**
		 * Private member variable that stores a reference to a single ParentPagerChildHistoryAsDropoffBy object
		 * (of type ParentPagerChildHistory), if this ParentPagerIndividual object was restored with
		 * an expansion on the parent_pager_child_history association table.
		 * @var ParentPagerChildHistory _objParentPagerChildHistoryAsDropoffBy;
		 */
		private $_objParentPagerChildHistoryAsDropoffBy;

		/**
		 * Private member variable that stores a reference to an array of ParentPagerChildHistoryAsDropoffBy objects
		 * (of type ParentPagerChildHistory[]), if this ParentPagerIndividual object was restored with
		 * an ExpandAsArray on the parent_pager_child_history association table.
		 * @var ParentPagerChildHistory[] _objParentPagerChildHistoryAsDropoffByArray;
		 */
		private $_objParentPagerChildHistoryAsDropoffByArray = array();

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
		 * in the database column parent_pager_individual.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column parent_pager_individual.parent_pager_household_id.
		 *
		 * NOTE: Always use the ParentPagerHousehold property getter to correctly retrieve this ParentPagerHousehold object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ParentPagerHousehold objParentPagerHousehold
		 */
		protected $objParentPagerHousehold;





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
		 * Load a ParentPagerIndividual from PK Info
		 * @param integer $intId
		 * @return ParentPagerIndividual
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return ParentPagerIndividual::QuerySingle(
				QQ::Equal(QQN::ParentPagerIndividual()->Id, $intId)
			);
		}

		/**
		 * Load all ParentPagerIndividuals
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerIndividual[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ParentPagerIndividual::QueryArray to perform the LoadAll query
			try {
				return ParentPagerIndividual::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ParentPagerIndividuals
		 * @return int
		 */
		public static function CountAll() {
			// Call ParentPagerIndividual::QueryCount to perform the CountAll query
			return ParentPagerIndividual::QueryCount(QQ::All());
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
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Create/Build out the QueryBuilder object with ParentPagerIndividual-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'parent_pager_individual');
			ParentPagerIndividual::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('parent_pager_individual');

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
		 * Static Qcodo Query method to query for a single ParentPagerIndividual object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerIndividual the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerIndividual::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ParentPagerIndividual object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ParentPagerIndividual::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ParentPagerIndividual::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ParentPagerIndividual objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerIndividual[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerIndividual::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ParentPagerIndividual::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ParentPagerIndividual::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ParentPagerIndividual objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerIndividual::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'parent_pager_individual_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ParentPagerIndividual-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ParentPagerIndividual::GetSelectFields($objQueryBuilder);
				ParentPagerIndividual::GetFromFields($objQueryBuilder);

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
			return ParentPagerIndividual::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ParentPagerIndividual
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'parent_pager_individual';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'server_identifier', $strAliasPrefix . 'server_identifier');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'hidden_flag', $strAliasPrefix . 'hidden_flag');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_sync_status_type_id', $strAliasPrefix . 'parent_pager_sync_status_type_id');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_household_id', $strAliasPrefix . 'parent_pager_household_id');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'middle_name', $strAliasPrefix . 'middle_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'prefix', $strAliasPrefix . 'prefix');
			$objBuilder->AddSelectItem($strTableName, 'suffix', $strAliasPrefix . 'suffix');
			$objBuilder->AddSelectItem($strTableName, 'nickname', $strAliasPrefix . 'nickname');
			$objBuilder->AddSelectItem($strTableName, 'graduation_year', $strAliasPrefix . 'graduation_year');
			$objBuilder->AddSelectItem($strTableName, 'gender', $strAliasPrefix . 'gender');
			$objBuilder->AddSelectItem($strTableName, 'date_of_birth', $strAliasPrefix . 'date_of_birth');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ParentPagerIndividual from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ParentPagerIndividual::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerIndividual
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
					$strAliasPrefix = 'parent_pager_individual__';


				$strAlias = $strAliasPrefix . 'parentpageraddress__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objParentPagerAddressArray)) {
						$objPreviousChildItem = $objPreviousItem->_objParentPagerAddressArray[$intPreviousChildItemCount - 1];
						$objChildItem = ParentPagerAddress::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpageraddress__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objParentPagerAddressArray[] = $objChildItem;
					} else
						$objPreviousItem->_objParentPagerAddressArray[] = ParentPagerAddress::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpageraddress__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'parentpagerattendanthistory__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objParentPagerAttendantHistoryArray)) {
						$objPreviousChildItem = $objPreviousItem->_objParentPagerAttendantHistoryArray[$intPreviousChildItemCount - 1];
						$objChildItem = ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerattendanthistory__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objParentPagerAttendantHistoryArray[] = $objChildItem;
					} else
						$objPreviousItem->_objParentPagerAttendantHistoryArray[] = ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerattendanthistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'parentpagerchildhistoryaspickupby__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objParentPagerChildHistoryAsPickupByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objParentPagerChildHistoryAsPickupByArray[$intPreviousChildItemCount - 1];
						$objChildItem = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistoryaspickupby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objParentPagerChildHistoryAsPickupByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objParentPagerChildHistoryAsPickupByArray[] = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistoryaspickupby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'parentpagerchildhistory__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objParentPagerChildHistoryArray)) {
						$objPreviousChildItem = $objPreviousItem->_objParentPagerChildHistoryArray[$intPreviousChildItemCount - 1];
						$objChildItem = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistory__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objParentPagerChildHistoryArray[] = $objChildItem;
					} else
						$objPreviousItem->_objParentPagerChildHistoryArray[] = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'parentpagerchildhistoryasdropoffby__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objParentPagerChildHistoryAsDropoffByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objParentPagerChildHistoryAsDropoffByArray[$intPreviousChildItemCount - 1];
						$objChildItem = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistoryasdropoffby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objParentPagerChildHistoryAsDropoffByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objParentPagerChildHistoryAsDropoffByArray[] = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistoryasdropoffby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'parent_pager_individual__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the ParentPagerIndividual object
			$objToReturn = new ParentPagerIndividual();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'server_identifier', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'server_identifier'] : $strAliasPrefix . 'server_identifier';
			$objToReturn->intServerIdentifier = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'hidden_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'hidden_flag'] : $strAliasPrefix . 'hidden_flag';
			$objToReturn->blnHiddenFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_pager_sync_status_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_pager_sync_status_type_id'] : $strAliasPrefix . 'parent_pager_sync_status_type_id';
			$objToReturn->intParentPagerSyncStatusTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_pager_household_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_pager_household_id'] : $strAliasPrefix . 'parent_pager_household_id';
			$objToReturn->intParentPagerHouseholdId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'middle_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'middle_name'] : $strAliasPrefix . 'middle_name';
			$objToReturn->strMiddleName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'prefix', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'prefix'] : $strAliasPrefix . 'prefix';
			$objToReturn->strPrefix = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'suffix', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'suffix'] : $strAliasPrefix . 'suffix';
			$objToReturn->strSuffix = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'nickname', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nickname'] : $strAliasPrefix . 'nickname';
			$objToReturn->strNickname = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'graduation_year', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'graduation_year'] : $strAliasPrefix . 'graduation_year';
			$objToReturn->intGraduationYear = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'gender', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'gender'] : $strAliasPrefix . 'gender';
			$objToReturn->strGender = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_of_birth', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_of_birth'] : $strAliasPrefix . 'date_of_birth';
			$objToReturn->dttDateOfBirth = $objDbRow->GetColumn($strAliasName, 'Date');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'parent_pager_individual__';

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ParentPagerHousehold Early Binding
			$strAlias = $strAliasPrefix . 'parent_pager_household_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentPagerHousehold = ParentPagerHousehold::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_pager_household_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for ParentPagerAddress Virtual Binding
			$strAlias = $strAliasPrefix . 'parentpageraddress__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objParentPagerAddressArray[] = ParentPagerAddress::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpageraddress__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objParentPagerAddress = ParentPagerAddress::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpageraddress__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ParentPagerAttendantHistory Virtual Binding
			$strAlias = $strAliasPrefix . 'parentpagerattendanthistory__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objParentPagerAttendantHistoryArray[] = ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerattendanthistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objParentPagerAttendantHistory = ParentPagerAttendantHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerattendanthistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ParentPagerChildHistoryAsPickupBy Virtual Binding
			$strAlias = $strAliasPrefix . 'parentpagerchildhistoryaspickupby__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objParentPagerChildHistoryAsPickupByArray[] = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistoryaspickupby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objParentPagerChildHistoryAsPickupBy = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistoryaspickupby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ParentPagerChildHistory Virtual Binding
			$strAlias = $strAliasPrefix . 'parentpagerchildhistory__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objParentPagerChildHistoryArray[] = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objParentPagerChildHistory = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ParentPagerChildHistoryAsDropoffBy Virtual Binding
			$strAlias = $strAliasPrefix . 'parentpagerchildhistoryasdropoffby__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objParentPagerChildHistoryAsDropoffByArray[] = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistoryasdropoffby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objParentPagerChildHistoryAsDropoffBy = ParentPagerChildHistory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentpagerchildhistoryasdropoffby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of ParentPagerIndividuals from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerIndividual[]
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
					$objItem = ParentPagerIndividual::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ParentPagerIndividual::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ParentPagerIndividual object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ParentPagerIndividual next row resulting from the query
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
			return ParentPagerIndividual::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ParentPagerIndividual object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return ParentPagerIndividual
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ParentPagerIndividual::QuerySingle(
				QQ::Equal(QQN::ParentPagerIndividual()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single ParentPagerIndividual object,
		 * by ServerIdentifier Index(es)
		 * @param integer $intServerIdentifier
		 * @return ParentPagerIndividual
		*/
		public static function LoadByServerIdentifier($intServerIdentifier, $objOptionalClauses = null) {
			return ParentPagerIndividual::QuerySingle(
				QQ::Equal(QQN::ParentPagerIndividual()->ServerIdentifier, $intServerIdentifier)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerIndividual objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerIndividual[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call ParentPagerIndividual::QueryArray to perform the LoadArrayByPersonId query
			try {
				return ParentPagerIndividual::QueryArray(
					QQ::Equal(QQN::ParentPagerIndividual()->PersonId, $intPersonId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerIndividuals
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call ParentPagerIndividual::QueryCount to perform the CountByPersonId query
			return ParentPagerIndividual::QueryCount(
				QQ::Equal(QQN::ParentPagerIndividual()->PersonId, $intPersonId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerIndividual objects,
		 * by HiddenFlag Index(es)
		 * @param boolean $blnHiddenFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerIndividual[]
		*/
		public static function LoadArrayByHiddenFlag($blnHiddenFlag, $objOptionalClauses = null) {
			// Call ParentPagerIndividual::QueryArray to perform the LoadArrayByHiddenFlag query
			try {
				return ParentPagerIndividual::QueryArray(
					QQ::Equal(QQN::ParentPagerIndividual()->HiddenFlag, $blnHiddenFlag),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerIndividuals
		 * by HiddenFlag Index(es)
		 * @param boolean $blnHiddenFlag
		 * @return int
		*/
		public static function CountByHiddenFlag($blnHiddenFlag, $objOptionalClauses = null) {
			// Call ParentPagerIndividual::QueryCount to perform the CountByHiddenFlag query
			return ParentPagerIndividual::QueryCount(
				QQ::Equal(QQN::ParentPagerIndividual()->HiddenFlag, $blnHiddenFlag)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerIndividual objects,
		 * by ParentPagerSyncStatusTypeId Index(es)
		 * @param integer $intParentPagerSyncStatusTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerIndividual[]
		*/
		public static function LoadArrayByParentPagerSyncStatusTypeId($intParentPagerSyncStatusTypeId, $objOptionalClauses = null) {
			// Call ParentPagerIndividual::QueryArray to perform the LoadArrayByParentPagerSyncStatusTypeId query
			try {
				return ParentPagerIndividual::QueryArray(
					QQ::Equal(QQN::ParentPagerIndividual()->ParentPagerSyncStatusTypeId, $intParentPagerSyncStatusTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerIndividuals
		 * by ParentPagerSyncStatusTypeId Index(es)
		 * @param integer $intParentPagerSyncStatusTypeId
		 * @return int
		*/
		public static function CountByParentPagerSyncStatusTypeId($intParentPagerSyncStatusTypeId, $objOptionalClauses = null) {
			// Call ParentPagerIndividual::QueryCount to perform the CountByParentPagerSyncStatusTypeId query
			return ParentPagerIndividual::QueryCount(
				QQ::Equal(QQN::ParentPagerIndividual()->ParentPagerSyncStatusTypeId, $intParentPagerSyncStatusTypeId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerIndividual objects,
		 * by ParentPagerHouseholdId Index(es)
		 * @param integer $intParentPagerHouseholdId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerIndividual[]
		*/
		public static function LoadArrayByParentPagerHouseholdId($intParentPagerHouseholdId, $objOptionalClauses = null) {
			// Call ParentPagerIndividual::QueryArray to perform the LoadArrayByParentPagerHouseholdId query
			try {
				return ParentPagerIndividual::QueryArray(
					QQ::Equal(QQN::ParentPagerIndividual()->ParentPagerHouseholdId, $intParentPagerHouseholdId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerIndividuals
		 * by ParentPagerHouseholdId Index(es)
		 * @param integer $intParentPagerHouseholdId
		 * @return int
		*/
		public static function CountByParentPagerHouseholdId($intParentPagerHouseholdId, $objOptionalClauses = null) {
			// Call ParentPagerIndividual::QueryCount to perform the CountByParentPagerHouseholdId query
			return ParentPagerIndividual::QueryCount(
				QQ::Equal(QQN::ParentPagerIndividual()->ParentPagerHouseholdId, $intParentPagerHouseholdId)
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
		 * Save this ParentPagerIndividual
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `parent_pager_individual` (
							`server_identifier`,
							`person_id`,
							`hidden_flag`,
							`parent_pager_sync_status_type_id`,
							`parent_pager_household_id`,
							`first_name`,
							`middle_name`,
							`last_name`,
							`prefix`,
							`suffix`,
							`nickname`,
							`graduation_year`,
							`gender`,
							`date_of_birth`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->blnHiddenFlag) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerSyncStatusTypeId) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerHouseholdId) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strMiddleName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strPrefix) . ',
							' . $objDatabase->SqlVariable($this->strSuffix) . ',
							' . $objDatabase->SqlVariable($this->strNickname) . ',
							' . $objDatabase->SqlVariable($this->intGraduationYear) . ',
							' . $objDatabase->SqlVariable($this->strGender) . ',
							' . $objDatabase->SqlVariable($this->dttDateOfBirth) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('parent_pager_individual', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`parent_pager_individual`
						SET
							`server_identifier` = ' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`hidden_flag` = ' . $objDatabase->SqlVariable($this->blnHiddenFlag) . ',
							`parent_pager_sync_status_type_id` = ' . $objDatabase->SqlVariable($this->intParentPagerSyncStatusTypeId) . ',
							`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intParentPagerHouseholdId) . ',
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`middle_name` = ' . $objDatabase->SqlVariable($this->strMiddleName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`prefix` = ' . $objDatabase->SqlVariable($this->strPrefix) . ',
							`suffix` = ' . $objDatabase->SqlVariable($this->strSuffix) . ',
							`nickname` = ' . $objDatabase->SqlVariable($this->strNickname) . ',
							`graduation_year` = ' . $objDatabase->SqlVariable($this->intGraduationYear) . ',
							`gender` = ' . $objDatabase->SqlVariable($this->strGender) . ',
							`date_of_birth` = ' . $objDatabase->SqlVariable($this->dttDateOfBirth) . '
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
		 * Delete this ParentPagerIndividual
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ParentPagerIndividual with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_individual`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ParentPagerIndividuals
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_individual`');
		}

		/**
		 * Truncate parent_pager_individual table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `parent_pager_individual`');
		}

		/**
		 * Reload this ParentPagerIndividual from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ParentPagerIndividual object.');

			// Reload the Object
			$objReloaded = ParentPagerIndividual::Load($this->intId);

			// Update $this's local variables to match
			$this->intServerIdentifier = $objReloaded->intServerIdentifier;
			$this->PersonId = $objReloaded->PersonId;
			$this->blnHiddenFlag = $objReloaded->blnHiddenFlag;
			$this->ParentPagerSyncStatusTypeId = $objReloaded->ParentPagerSyncStatusTypeId;
			$this->ParentPagerHouseholdId = $objReloaded->ParentPagerHouseholdId;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strMiddleName = $objReloaded->strMiddleName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strPrefix = $objReloaded->strPrefix;
			$this->strSuffix = $objReloaded->strSuffix;
			$this->strNickname = $objReloaded->strNickname;
			$this->intGraduationYear = $objReloaded->intGraduationYear;
			$this->strGender = $objReloaded->strGender;
			$this->dttDateOfBirth = $objReloaded->dttDateOfBirth;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ParentPagerIndividual::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `parent_pager_individual` (
					`id`,
					`server_identifier`,
					`person_id`,
					`hidden_flag`,
					`parent_pager_sync_status_type_id`,
					`parent_pager_household_id`,
					`first_name`,
					`middle_name`,
					`last_name`,
					`prefix`,
					`suffix`,
					`nickname`,
					`graduation_year`,
					`gender`,
					`date_of_birth`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->blnHiddenFlag) . ',
					' . $objDatabase->SqlVariable($this->intParentPagerSyncStatusTypeId) . ',
					' . $objDatabase->SqlVariable($this->intParentPagerHouseholdId) . ',
					' . $objDatabase->SqlVariable($this->strFirstName) . ',
					' . $objDatabase->SqlVariable($this->strMiddleName) . ',
					' . $objDatabase->SqlVariable($this->strLastName) . ',
					' . $objDatabase->SqlVariable($this->strPrefix) . ',
					' . $objDatabase->SqlVariable($this->strSuffix) . ',
					' . $objDatabase->SqlVariable($this->strNickname) . ',
					' . $objDatabase->SqlVariable($this->intGraduationYear) . ',
					' . $objDatabase->SqlVariable($this->strGender) . ',
					' . $objDatabase->SqlVariable($this->dttDateOfBirth) . ',
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
		 * @return ParentPagerIndividual[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = ParentPagerIndividual::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM parent_pager_individual WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return ParentPagerIndividual::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ParentPagerIndividual[]
		 */
		public function GetJournal() {
			return ParentPagerIndividual::GetJournalForId($this->intId);
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

				case 'ServerIdentifier':
					// Gets the value for intServerIdentifier (Unique)
					// @return integer
					return $this->intServerIdentifier;

				case 'PersonId':
					// Gets the value for intPersonId 
					// @return integer
					return $this->intPersonId;

				case 'HiddenFlag':
					// Gets the value for blnHiddenFlag (Not Null)
					// @return boolean
					return $this->blnHiddenFlag;

				case 'ParentPagerSyncStatusTypeId':
					// Gets the value for intParentPagerSyncStatusTypeId (Not Null)
					// @return integer
					return $this->intParentPagerSyncStatusTypeId;

				case 'ParentPagerHouseholdId':
					// Gets the value for intParentPagerHouseholdId 
					// @return integer
					return $this->intParentPagerHouseholdId;

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

				case 'Prefix':
					// Gets the value for strPrefix 
					// @return string
					return $this->strPrefix;

				case 'Suffix':
					// Gets the value for strSuffix 
					// @return string
					return $this->strSuffix;

				case 'Nickname':
					// Gets the value for strNickname 
					// @return string
					return $this->strNickname;

				case 'GraduationYear':
					// Gets the value for intGraduationYear 
					// @return integer
					return $this->intGraduationYear;

				case 'Gender':
					// Gets the value for strGender 
					// @return string
					return $this->strGender;

				case 'DateOfBirth':
					// Gets the value for dttDateOfBirth 
					// @return QDateTime
					return $this->dttDateOfBirth;


				///////////////////
				// Member Objects
				///////////////////
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

				case 'ParentPagerHousehold':
					// Gets the value for the ParentPagerHousehold object referenced by intParentPagerHouseholdId 
					// @return ParentPagerHousehold
					try {
						if ((!$this->objParentPagerHousehold) && (!is_null($this->intParentPagerHouseholdId)))
							$this->objParentPagerHousehold = ParentPagerHousehold::Load($this->intParentPagerHouseholdId);
						return $this->objParentPagerHousehold;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ParentPagerAddress':
					// Gets the value for the private _objParentPagerAddress (Read-Only)
					// if set due to an expansion on the parent_pager_address.parent_pager_individual_id reverse relationship
					// @return ParentPagerAddress
					return $this->_objParentPagerAddress;

				case '_ParentPagerAddressArray':
					// Gets the value for the private _objParentPagerAddressArray (Read-Only)
					// if set due to an ExpandAsArray on the parent_pager_address.parent_pager_individual_id reverse relationship
					// @return ParentPagerAddress[]
					return (array) $this->_objParentPagerAddressArray;

				case '_ParentPagerAttendantHistory':
					// Gets the value for the private _objParentPagerAttendantHistory (Read-Only)
					// if set due to an expansion on the parent_pager_attendant_history.parent_pager_individual_id reverse relationship
					// @return ParentPagerAttendantHistory
					return $this->_objParentPagerAttendantHistory;

				case '_ParentPagerAttendantHistoryArray':
					// Gets the value for the private _objParentPagerAttendantHistoryArray (Read-Only)
					// if set due to an ExpandAsArray on the parent_pager_attendant_history.parent_pager_individual_id reverse relationship
					// @return ParentPagerAttendantHistory[]
					return (array) $this->_objParentPagerAttendantHistoryArray;

				case '_ParentPagerChildHistoryAsPickupBy':
					// Gets the value for the private _objParentPagerChildHistoryAsPickupBy (Read-Only)
					// if set due to an expansion on the parent_pager_child_history.pickup_by_parent_pager_individual_id reverse relationship
					// @return ParentPagerChildHistory
					return $this->_objParentPagerChildHistoryAsPickupBy;

				case '_ParentPagerChildHistoryAsPickupByArray':
					// Gets the value for the private _objParentPagerChildHistoryAsPickupByArray (Read-Only)
					// if set due to an ExpandAsArray on the parent_pager_child_history.pickup_by_parent_pager_individual_id reverse relationship
					// @return ParentPagerChildHistory[]
					return (array) $this->_objParentPagerChildHistoryAsPickupByArray;

				case '_ParentPagerChildHistory':
					// Gets the value for the private _objParentPagerChildHistory (Read-Only)
					// if set due to an expansion on the parent_pager_child_history.parent_pager_individual_id reverse relationship
					// @return ParentPagerChildHistory
					return $this->_objParentPagerChildHistory;

				case '_ParentPagerChildHistoryArray':
					// Gets the value for the private _objParentPagerChildHistoryArray (Read-Only)
					// if set due to an ExpandAsArray on the parent_pager_child_history.parent_pager_individual_id reverse relationship
					// @return ParentPagerChildHistory[]
					return (array) $this->_objParentPagerChildHistoryArray;

				case '_ParentPagerChildHistoryAsDropoffBy':
					// Gets the value for the private _objParentPagerChildHistoryAsDropoffBy (Read-Only)
					// if set due to an expansion on the parent_pager_child_history.dropoff_by_parent_pager_individual_id reverse relationship
					// @return ParentPagerChildHistory
					return $this->_objParentPagerChildHistoryAsDropoffBy;

				case '_ParentPagerChildHistoryAsDropoffByArray':
					// Gets the value for the private _objParentPagerChildHistoryAsDropoffByArray (Read-Only)
					// if set due to an ExpandAsArray on the parent_pager_child_history.dropoff_by_parent_pager_individual_id reverse relationship
					// @return ParentPagerChildHistory[]
					return (array) $this->_objParentPagerChildHistoryAsDropoffByArray;


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
				case 'ServerIdentifier':
					// Sets the value for intServerIdentifier (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intServerIdentifier = QType::Cast($mixValue, QType::Integer));
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

				case 'HiddenFlag':
					// Sets the value for blnHiddenFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnHiddenFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParentPagerSyncStatusTypeId':
					// Sets the value for intParentPagerSyncStatusTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intParentPagerSyncStatusTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParentPagerHouseholdId':
					// Sets the value for intParentPagerHouseholdId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objParentPagerHousehold = null;
						return ($this->intParentPagerHouseholdId = QType::Cast($mixValue, QType::Integer));
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

				case 'Prefix':
					// Sets the value for strPrefix 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPrefix = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Suffix':
					// Sets the value for strSuffix 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strSuffix = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Nickname':
					// Sets the value for strNickname 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strNickname = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GraduationYear':
					// Sets the value for intGraduationYear 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intGraduationYear = QType::Cast($mixValue, QType::Integer));
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

				case 'DateOfBirth':
					// Sets the value for dttDateOfBirth 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateOfBirth = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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
							throw new QCallerException('Unable to set an unsaved Person for this ParentPagerIndividual');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ParentPagerHousehold':
					// Sets the value for the ParentPagerHousehold object referenced by intParentPagerHouseholdId 
					// @param ParentPagerHousehold $mixValue
					// @return ParentPagerHousehold
					if (is_null($mixValue)) {
						$this->intParentPagerHouseholdId = null;
						$this->objParentPagerHousehold = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ParentPagerHousehold object
						try {
							$mixValue = QType::Cast($mixValue, 'ParentPagerHousehold');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ParentPagerHousehold object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ParentPagerHousehold for this ParentPagerIndividual');

						// Update Local Member Variables
						$this->objParentPagerHousehold = $mixValue;
						$this->intParentPagerHouseholdId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for ParentPagerAddress
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ParentPagerAddresses as an array of ParentPagerAddress objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAddress[]
		*/ 
		public function GetParentPagerAddressArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ParentPagerAddress::LoadArrayByParentPagerIndividualId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ParentPagerAddresses
		 * @return int
		*/ 
		public function CountParentPagerAddresses() {
			if ((is_null($this->intId)))
				return 0;

			return ParentPagerAddress::CountByParentPagerIndividualId($this->intId);
		}

		/**
		 * Associates a ParentPagerAddress
		 * @param ParentPagerAddress $objParentPagerAddress
		 * @return void
		*/ 
		public function AssociateParentPagerAddress(ParentPagerAddress $objParentPagerAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerAddress on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerAddress on this ParentPagerIndividual with an unsaved ParentPagerAddress.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_address`
				SET
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAddress->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAddress->ParentPagerIndividualId = $this->intId;
				$objParentPagerAddress->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ParentPagerAddress
		 * @param ParentPagerAddress $objParentPagerAddress
		 * @return void
		*/ 
		public function UnassociateParentPagerAddress(ParentPagerAddress $objParentPagerAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this ParentPagerIndividual with an unsaved ParentPagerAddress.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_address`
				SET
					`parent_pager_individual_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAddress->Id) . ' AND
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAddress->ParentPagerIndividualId = null;
				$objParentPagerAddress->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ParentPagerAddresses
		 * @return void
		*/ 
		public function UnassociateAllParentPagerAddresses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerAddress::LoadArrayByParentPagerIndividualId($this->intId) as $objParentPagerAddress) {
					$objParentPagerAddress->ParentPagerIndividualId = null;
					$objParentPagerAddress->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_address`
				SET
					`parent_pager_individual_id` = null
				WHERE
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ParentPagerAddress
		 * @param ParentPagerAddress $objParentPagerAddress
		 * @return void
		*/ 
		public function DeleteAssociatedParentPagerAddress(ParentPagerAddress $objParentPagerAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this ParentPagerIndividual with an unsaved ParentPagerAddress.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_address`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAddress->Id) . ' AND
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAddress->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ParentPagerAddresses
		 * @return void
		*/ 
		public function DeleteAllParentPagerAddresses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAddress on this unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerAddress::LoadArrayByParentPagerIndividualId($this->intId) as $objParentPagerAddress) {
					$objParentPagerAddress->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_address`
				WHERE
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for ParentPagerAttendantHistory
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ParentPagerAttendantHistories as an array of ParentPagerAttendantHistory objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAttendantHistory[]
		*/ 
		public function GetParentPagerAttendantHistoryArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ParentPagerAttendantHistory::LoadArrayByParentPagerIndividualId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ParentPagerAttendantHistories
		 * @return int
		*/ 
		public function CountParentPagerAttendantHistories() {
			if ((is_null($this->intId)))
				return 0;

			return ParentPagerAttendantHistory::CountByParentPagerIndividualId($this->intId);
		}

		/**
		 * Associates a ParentPagerAttendantHistory
		 * @param ParentPagerAttendantHistory $objParentPagerAttendantHistory
		 * @return void
		*/ 
		public function AssociateParentPagerAttendantHistory(ParentPagerAttendantHistory $objParentPagerAttendantHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerAttendantHistory on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerAttendantHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerAttendantHistory on this ParentPagerIndividual with an unsaved ParentPagerAttendantHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_attendant_history`
				SET
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAttendantHistory->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAttendantHistory->ParentPagerIndividualId = $this->intId;
				$objParentPagerAttendantHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ParentPagerAttendantHistory
		 * @param ParentPagerAttendantHistory $objParentPagerAttendantHistory
		 * @return void
		*/ 
		public function UnassociateParentPagerAttendantHistory(ParentPagerAttendantHistory $objParentPagerAttendantHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerAttendantHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this ParentPagerIndividual with an unsaved ParentPagerAttendantHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_attendant_history`
				SET
					`parent_pager_individual_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAttendantHistory->Id) . ' AND
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAttendantHistory->ParentPagerIndividualId = null;
				$objParentPagerAttendantHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ParentPagerAttendantHistories
		 * @return void
		*/ 
		public function UnassociateAllParentPagerAttendantHistories() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerAttendantHistory::LoadArrayByParentPagerIndividualId($this->intId) as $objParentPagerAttendantHistory) {
					$objParentPagerAttendantHistory->ParentPagerIndividualId = null;
					$objParentPagerAttendantHistory->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_attendant_history`
				SET
					`parent_pager_individual_id` = null
				WHERE
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ParentPagerAttendantHistory
		 * @param ParentPagerAttendantHistory $objParentPagerAttendantHistory
		 * @return void
		*/ 
		public function DeleteAssociatedParentPagerAttendantHistory(ParentPagerAttendantHistory $objParentPagerAttendantHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerAttendantHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this ParentPagerIndividual with an unsaved ParentPagerAttendantHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_attendant_history`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerAttendantHistory->Id) . ' AND
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerAttendantHistory->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ParentPagerAttendantHistories
		 * @return void
		*/ 
		public function DeleteAllParentPagerAttendantHistories() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerAttendantHistory on this unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerAttendantHistory::LoadArrayByParentPagerIndividualId($this->intId) as $objParentPagerAttendantHistory) {
					$objParentPagerAttendantHistory->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_attendant_history`
				WHERE
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for ParentPagerChildHistoryAsPickupBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ParentPagerChildHistoriesAsPickupBy as an array of ParentPagerChildHistory objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerChildHistory[]
		*/ 
		public function GetParentPagerChildHistoryAsPickupByArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ParentPagerChildHistory::LoadArrayByPickupByParentPagerIndividualId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ParentPagerChildHistoriesAsPickupBy
		 * @return int
		*/ 
		public function CountParentPagerChildHistoriesAsPickupBy() {
			if ((is_null($this->intId)))
				return 0;

			return ParentPagerChildHistory::CountByPickupByParentPagerIndividualId($this->intId);
		}

		/**
		 * Associates a ParentPagerChildHistoryAsPickupBy
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function AssociateParentPagerChildHistoryAsPickupBy(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerChildHistoryAsPickupBy on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerChildHistoryAsPickupBy on this ParentPagerIndividual with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`pickup_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->PickupByParentPagerIndividualId = $this->intId;
				$objParentPagerChildHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ParentPagerChildHistoryAsPickupBy
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function UnassociateParentPagerChildHistoryAsPickupBy(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsPickupBy on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsPickupBy on this ParentPagerIndividual with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`pickup_by_parent_pager_individual_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . ' AND
					`pickup_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->PickupByParentPagerIndividualId = null;
				$objParentPagerChildHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ParentPagerChildHistoriesAsPickupBy
		 * @return void
		*/ 
		public function UnassociateAllParentPagerChildHistoriesAsPickupBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsPickupBy on this unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerChildHistory::LoadArrayByPickupByParentPagerIndividualId($this->intId) as $objParentPagerChildHistory) {
					$objParentPagerChildHistory->PickupByParentPagerIndividualId = null;
					$objParentPagerChildHistory->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`pickup_by_parent_pager_individual_id` = null
				WHERE
					`pickup_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ParentPagerChildHistoryAsPickupBy
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function DeleteAssociatedParentPagerChildHistoryAsPickupBy(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsPickupBy on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsPickupBy on this ParentPagerIndividual with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_child_history`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . ' AND
					`pickup_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ParentPagerChildHistoriesAsPickupBy
		 * @return void
		*/ 
		public function DeleteAllParentPagerChildHistoriesAsPickupBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsPickupBy on this unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerChildHistory::LoadArrayByPickupByParentPagerIndividualId($this->intId) as $objParentPagerChildHistory) {
					$objParentPagerChildHistory->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_child_history`
				WHERE
					`pickup_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for ParentPagerChildHistory
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ParentPagerChildHistories as an array of ParentPagerChildHistory objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerChildHistory[]
		*/ 
		public function GetParentPagerChildHistoryArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ParentPagerChildHistory::LoadArrayByParentPagerIndividualId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ParentPagerChildHistories
		 * @return int
		*/ 
		public function CountParentPagerChildHistories() {
			if ((is_null($this->intId)))
				return 0;

			return ParentPagerChildHistory::CountByParentPagerIndividualId($this->intId);
		}

		/**
		 * Associates a ParentPagerChildHistory
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function AssociateParentPagerChildHistory(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerChildHistory on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerChildHistory on this ParentPagerIndividual with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->ParentPagerIndividualId = $this->intId;
				$objParentPagerChildHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ParentPagerChildHistory
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function UnassociateParentPagerChildHistory(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this ParentPagerIndividual with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`parent_pager_individual_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . ' AND
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->ParentPagerIndividualId = null;
				$objParentPagerChildHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ParentPagerChildHistories
		 * @return void
		*/ 
		public function UnassociateAllParentPagerChildHistories() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerChildHistory::LoadArrayByParentPagerIndividualId($this->intId) as $objParentPagerChildHistory) {
					$objParentPagerChildHistory->ParentPagerIndividualId = null;
					$objParentPagerChildHistory->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`parent_pager_individual_id` = null
				WHERE
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ParentPagerChildHistory
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function DeleteAssociatedParentPagerChildHistory(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this ParentPagerIndividual with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_child_history`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . ' AND
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ParentPagerChildHistories
		 * @return void
		*/ 
		public function DeleteAllParentPagerChildHistories() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistory on this unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerChildHistory::LoadArrayByParentPagerIndividualId($this->intId) as $objParentPagerChildHistory) {
					$objParentPagerChildHistory->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_child_history`
				WHERE
					`parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for ParentPagerChildHistoryAsDropoffBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ParentPagerChildHistoriesAsDropoffBy as an array of ParentPagerChildHistory objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerChildHistory[]
		*/ 
		public function GetParentPagerChildHistoryAsDropoffByArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ParentPagerChildHistory::LoadArrayByDropoffByParentPagerIndividualId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ParentPagerChildHistoriesAsDropoffBy
		 * @return int
		*/ 
		public function CountParentPagerChildHistoriesAsDropoffBy() {
			if ((is_null($this->intId)))
				return 0;

			return ParentPagerChildHistory::CountByDropoffByParentPagerIndividualId($this->intId);
		}

		/**
		 * Associates a ParentPagerChildHistoryAsDropoffBy
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function AssociateParentPagerChildHistoryAsDropoffBy(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerChildHistoryAsDropoffBy on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentPagerChildHistoryAsDropoffBy on this ParentPagerIndividual with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`dropoff_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->DropoffByParentPagerIndividualId = $this->intId;
				$objParentPagerChildHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ParentPagerChildHistoryAsDropoffBy
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function UnassociateParentPagerChildHistoryAsDropoffBy(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsDropoffBy on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsDropoffBy on this ParentPagerIndividual with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`dropoff_by_parent_pager_individual_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . ' AND
					`dropoff_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->DropoffByParentPagerIndividualId = null;
				$objParentPagerChildHistory->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ParentPagerChildHistoriesAsDropoffBy
		 * @return void
		*/ 
		public function UnassociateAllParentPagerChildHistoriesAsDropoffBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsDropoffBy on this unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerChildHistory::LoadArrayByDropoffByParentPagerIndividualId($this->intId) as $objParentPagerChildHistory) {
					$objParentPagerChildHistory->DropoffByParentPagerIndividualId = null;
					$objParentPagerChildHistory->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`parent_pager_child_history`
				SET
					`dropoff_by_parent_pager_individual_id` = null
				WHERE
					`dropoff_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ParentPagerChildHistoryAsDropoffBy
		 * @param ParentPagerChildHistory $objParentPagerChildHistory
		 * @return void
		*/ 
		public function DeleteAssociatedParentPagerChildHistoryAsDropoffBy(ParentPagerChildHistory $objParentPagerChildHistory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsDropoffBy on this unsaved ParentPagerIndividual.');
			if ((is_null($objParentPagerChildHistory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsDropoffBy on this ParentPagerIndividual with an unsaved ParentPagerChildHistory.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_child_history`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objParentPagerChildHistory->Id) . ' AND
					`dropoff_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objParentPagerChildHistory->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ParentPagerChildHistoriesAsDropoffBy
		 * @return void
		*/ 
		public function DeleteAllParentPagerChildHistoriesAsDropoffBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentPagerChildHistoryAsDropoffBy on this unsaved ParentPagerIndividual.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ParentPagerChildHistory::LoadArrayByDropoffByParentPagerIndividualId($this->intId) as $objParentPagerChildHistory) {
					$objParentPagerChildHistory->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_child_history`
				WHERE
					`dropoff_by_parent_pager_individual_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ParentPagerIndividual"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ServerIdentifier" type="xsd:int"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="HiddenFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ParentPagerSyncStatusTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="ParentPagerHousehold" type="xsd1:ParentPagerHousehold"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="MiddleName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="Prefix" type="xsd:string"/>';
			$strToReturn .= '<element name="Suffix" type="xsd:string"/>';
			$strToReturn .= '<element name="Nickname" type="xsd:string"/>';
			$strToReturn .= '<element name="GraduationYear" type="xsd:int"/>';
			$strToReturn .= '<element name="Gender" type="xsd:string"/>';
			$strToReturn .= '<element name="DateOfBirth" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ParentPagerIndividual', $strComplexTypeArray)) {
				$strComplexTypeArray['ParentPagerIndividual'] = ParentPagerIndividual::GetSoapComplexTypeXml();
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				ParentPagerHousehold::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ParentPagerIndividual::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ParentPagerIndividual();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'ServerIdentifier'))
				$objToReturn->intServerIdentifier = $objSoapObject->ServerIdentifier;
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if (property_exists($objSoapObject, 'HiddenFlag'))
				$objToReturn->blnHiddenFlag = $objSoapObject->HiddenFlag;
			if (property_exists($objSoapObject, 'ParentPagerSyncStatusTypeId'))
				$objToReturn->intParentPagerSyncStatusTypeId = $objSoapObject->ParentPagerSyncStatusTypeId;
			if ((property_exists($objSoapObject, 'ParentPagerHousehold')) &&
				($objSoapObject->ParentPagerHousehold))
				$objToReturn->ParentPagerHousehold = ParentPagerHousehold::GetObjectFromSoapObject($objSoapObject->ParentPagerHousehold);
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'MiddleName'))
				$objToReturn->strMiddleName = $objSoapObject->MiddleName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'Prefix'))
				$objToReturn->strPrefix = $objSoapObject->Prefix;
			if (property_exists($objSoapObject, 'Suffix'))
				$objToReturn->strSuffix = $objSoapObject->Suffix;
			if (property_exists($objSoapObject, 'Nickname'))
				$objToReturn->strNickname = $objSoapObject->Nickname;
			if (property_exists($objSoapObject, 'GraduationYear'))
				$objToReturn->intGraduationYear = $objSoapObject->GraduationYear;
			if (property_exists($objSoapObject, 'Gender'))
				$objToReturn->strGender = $objSoapObject->Gender;
			if (property_exists($objSoapObject, 'DateOfBirth'))
				$objToReturn->dttDateOfBirth = new QDateTime($objSoapObject->DateOfBirth);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ParentPagerIndividual::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->objParentPagerHousehold)
				$objObject->objParentPagerHousehold = ParentPagerHousehold::GetSoapObjectFromObject($objObject->objParentPagerHousehold, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentPagerHouseholdId = null;
			if ($objObject->dttDateOfBirth)
				$objObject->dttDateOfBirth = $objObject->dttDateOfBirth->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $ServerIdentifier
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $HiddenFlag
	 * @property-read QQNode $ParentPagerSyncStatusTypeId
	 * @property-read QQNode $ParentPagerHouseholdId
	 * @property-read QQNodeParentPagerHousehold $ParentPagerHousehold
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $MiddleName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Prefix
	 * @property-read QQNode $Suffix
	 * @property-read QQNode $Nickname
	 * @property-read QQNode $GraduationYear
	 * @property-read QQNode $Gender
	 * @property-read QQNode $DateOfBirth
	 * @property-read QQReverseReferenceNodeParentPagerAddress $ParentPagerAddress
	 * @property-read QQReverseReferenceNodeParentPagerAttendantHistory $ParentPagerAttendantHistory
	 * @property-read QQReverseReferenceNodeParentPagerChildHistory $ParentPagerChildHistoryAsPickupBy
	 * @property-read QQReverseReferenceNodeParentPagerChildHistory $ParentPagerChildHistory
	 * @property-read QQReverseReferenceNodeParentPagerChildHistory $ParentPagerChildHistoryAsDropoffBy
	 */
	class QQNodeParentPagerIndividual extends QQNode {
		protected $strTableName = 'parent_pager_individual';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerIndividual';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ServerIdentifier':
					return new QQNode('server_identifier', 'ServerIdentifier', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'HiddenFlag':
					return new QQNode('hidden_flag', 'HiddenFlag', 'boolean', $this);
				case 'ParentPagerSyncStatusTypeId':
					return new QQNode('parent_pager_sync_status_type_id', 'ParentPagerSyncStatusTypeId', 'integer', $this);
				case 'ParentPagerHouseholdId':
					return new QQNode('parent_pager_household_id', 'ParentPagerHouseholdId', 'integer', $this);
				case 'ParentPagerHousehold':
					return new QQNodeParentPagerHousehold('parent_pager_household_id', 'ParentPagerHousehold', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'MiddleName':
					return new QQNode('middle_name', 'MiddleName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Prefix':
					return new QQNode('prefix', 'Prefix', 'string', $this);
				case 'Suffix':
					return new QQNode('suffix', 'Suffix', 'string', $this);
				case 'Nickname':
					return new QQNode('nickname', 'Nickname', 'string', $this);
				case 'GraduationYear':
					return new QQNode('graduation_year', 'GraduationYear', 'integer', $this);
				case 'Gender':
					return new QQNode('gender', 'Gender', 'string', $this);
				case 'DateOfBirth':
					return new QQNode('date_of_birth', 'DateOfBirth', 'QDateTime', $this);
				case 'ParentPagerAddress':
					return new QQReverseReferenceNodeParentPagerAddress($this, 'parentpageraddress', 'reverse_reference', 'parent_pager_individual_id');
				case 'ParentPagerAttendantHistory':
					return new QQReverseReferenceNodeParentPagerAttendantHistory($this, 'parentpagerattendanthistory', 'reverse_reference', 'parent_pager_individual_id');
				case 'ParentPagerChildHistoryAsPickupBy':
					return new QQReverseReferenceNodeParentPagerChildHistory($this, 'parentpagerchildhistoryaspickupby', 'reverse_reference', 'pickup_by_parent_pager_individual_id');
				case 'ParentPagerChildHistory':
					return new QQReverseReferenceNodeParentPagerChildHistory($this, 'parentpagerchildhistory', 'reverse_reference', 'parent_pager_individual_id');
				case 'ParentPagerChildHistoryAsDropoffBy':
					return new QQReverseReferenceNodeParentPagerChildHistory($this, 'parentpagerchildhistoryasdropoffby', 'reverse_reference', 'dropoff_by_parent_pager_individual_id');

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
	 * @property-read QQNode $ServerIdentifier
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $HiddenFlag
	 * @property-read QQNode $ParentPagerSyncStatusTypeId
	 * @property-read QQNode $ParentPagerHouseholdId
	 * @property-read QQNodeParentPagerHousehold $ParentPagerHousehold
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $MiddleName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Prefix
	 * @property-read QQNode $Suffix
	 * @property-read QQNode $Nickname
	 * @property-read QQNode $GraduationYear
	 * @property-read QQNode $Gender
	 * @property-read QQNode $DateOfBirth
	 * @property-read QQReverseReferenceNodeParentPagerAddress $ParentPagerAddress
	 * @property-read QQReverseReferenceNodeParentPagerAttendantHistory $ParentPagerAttendantHistory
	 * @property-read QQReverseReferenceNodeParentPagerChildHistory $ParentPagerChildHistoryAsPickupBy
	 * @property-read QQReverseReferenceNodeParentPagerChildHistory $ParentPagerChildHistory
	 * @property-read QQReverseReferenceNodeParentPagerChildHistory $ParentPagerChildHistoryAsDropoffBy
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeParentPagerIndividual extends QQReverseReferenceNode {
		protected $strTableName = 'parent_pager_individual';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerIndividual';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ServerIdentifier':
					return new QQNode('server_identifier', 'ServerIdentifier', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'HiddenFlag':
					return new QQNode('hidden_flag', 'HiddenFlag', 'boolean', $this);
				case 'ParentPagerSyncStatusTypeId':
					return new QQNode('parent_pager_sync_status_type_id', 'ParentPagerSyncStatusTypeId', 'integer', $this);
				case 'ParentPagerHouseholdId':
					return new QQNode('parent_pager_household_id', 'ParentPagerHouseholdId', 'integer', $this);
				case 'ParentPagerHousehold':
					return new QQNodeParentPagerHousehold('parent_pager_household_id', 'ParentPagerHousehold', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'MiddleName':
					return new QQNode('middle_name', 'MiddleName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Prefix':
					return new QQNode('prefix', 'Prefix', 'string', $this);
				case 'Suffix':
					return new QQNode('suffix', 'Suffix', 'string', $this);
				case 'Nickname':
					return new QQNode('nickname', 'Nickname', 'string', $this);
				case 'GraduationYear':
					return new QQNode('graduation_year', 'GraduationYear', 'integer', $this);
				case 'Gender':
					return new QQNode('gender', 'Gender', 'string', $this);
				case 'DateOfBirth':
					return new QQNode('date_of_birth', 'DateOfBirth', 'QDateTime', $this);
				case 'ParentPagerAddress':
					return new QQReverseReferenceNodeParentPagerAddress($this, 'parentpageraddress', 'reverse_reference', 'parent_pager_individual_id');
				case 'ParentPagerAttendantHistory':
					return new QQReverseReferenceNodeParentPagerAttendantHistory($this, 'parentpagerattendanthistory', 'reverse_reference', 'parent_pager_individual_id');
				case 'ParentPagerChildHistoryAsPickupBy':
					return new QQReverseReferenceNodeParentPagerChildHistory($this, 'parentpagerchildhistoryaspickupby', 'reverse_reference', 'pickup_by_parent_pager_individual_id');
				case 'ParentPagerChildHistory':
					return new QQReverseReferenceNodeParentPagerChildHistory($this, 'parentpagerchildhistory', 'reverse_reference', 'parent_pager_individual_id');
				case 'ParentPagerChildHistoryAsDropoffBy':
					return new QQReverseReferenceNodeParentPagerChildHistory($this, 'parentpagerchildhistoryasdropoffby', 'reverse_reference', 'dropoff_by_parent_pager_individual_id');

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