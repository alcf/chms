<?php
	/**
	 * The abstract ParentPagerAddressGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ParentPagerAddress subclass which
	 * extends this ParentPagerAddressGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ParentPagerAddress class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $ServerIdentifier the value for intServerIdentifier (Unique)
	 * @property integer $ParentPagerPersonId the value for intParentPagerPersonId 
	 * @property integer $ParentPagerHouseholdId the value for intParentPagerHouseholdId 
	 * @property string $Address1 the value for strAddress1 
	 * @property string $Address2 the value for strAddress2 
	 * @property string $Address3 the value for strAddress3 
	 * @property string $City the value for strCity 
	 * @property string $State the value for strState 
	 * @property string $ZipCode the value for strZipCode 
	 * @property ParentPagerIndividual $ParentPagerPerson the value for the ParentPagerIndividual object referenced by intParentPagerPersonId 
	 * @property ParentPagerHousehold $ParentPagerHousehold the value for the ParentPagerHousehold object referenced by intParentPagerHouseholdId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ParentPagerAddressGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column parent_pager_address.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_address.server_identifier
		 * @var integer intServerIdentifier
		 */
		protected $intServerIdentifier;
		const ServerIdentifierDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_address.parent_pager_person_id
		 * @var integer intParentPagerPersonId
		 */
		protected $intParentPagerPersonId;
		const ParentPagerPersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_address.parent_pager_household_id
		 * @var integer intParentPagerHouseholdId
		 */
		protected $intParentPagerHouseholdId;
		const ParentPagerHouseholdIdDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_address.address_1
		 * @var string strAddress1
		 */
		protected $strAddress1;
		const Address1MaxLength = 100;
		const Address1Default = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_address.address_2
		 * @var string strAddress2
		 */
		protected $strAddress2;
		const Address2MaxLength = 100;
		const Address2Default = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_address.address_3
		 * @var string strAddress3
		 */
		protected $strAddress3;
		const Address3MaxLength = 100;
		const Address3Default = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_address.city
		 * @var string strCity
		 */
		protected $strCity;
		const CityMaxLength = 50;
		const CityDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_address.state
		 * @var string strState
		 */
		protected $strState;
		const StateMaxLength = 2;
		const StateDefault = null;


		/**
		 * Protected member variable that maps to the database column parent_pager_address.zip_code
		 * @var string strZipCode
		 */
		protected $strZipCode;
		const ZipCodeMaxLength = 10;
		const ZipCodeDefault = null;


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
		 * in the database column parent_pager_address.parent_pager_person_id.
		 *
		 * NOTE: Always use the ParentPagerPerson property getter to correctly retrieve this ParentPagerIndividual object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ParentPagerIndividual objParentPagerPerson
		 */
		protected $objParentPagerPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column parent_pager_address.parent_pager_household_id.
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
		 * Load a ParentPagerAddress from PK Info
		 * @param integer $intId
		 * @return ParentPagerAddress
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return ParentPagerAddress::QuerySingle(
				QQ::Equal(QQN::ParentPagerAddress()->Id, $intId)
			);
		}

		/**
		 * Load all ParentPagerAddresses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAddress[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ParentPagerAddress::QueryArray to perform the LoadAll query
			try {
				return ParentPagerAddress::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ParentPagerAddresses
		 * @return int
		 */
		public static function CountAll() {
			// Call ParentPagerAddress::QueryCount to perform the CountAll query
			return ParentPagerAddress::QueryCount(QQ::All());
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
			$objDatabase = ParentPagerAddress::GetDatabase();

			// Create/Build out the QueryBuilder object with ParentPagerAddress-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'parent_pager_address');
			ParentPagerAddress::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('parent_pager_address');

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
		 * Static Qcodo Query method to query for a single ParentPagerAddress object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerAddress the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerAddress::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ParentPagerAddress object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ParentPagerAddress::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ParentPagerAddress::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ParentPagerAddress objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ParentPagerAddress[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerAddress::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ParentPagerAddress::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ParentPagerAddress::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ParentPagerAddress objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ParentPagerAddress::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ParentPagerAddress::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'parent_pager_address_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ParentPagerAddress-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ParentPagerAddress::GetSelectFields($objQueryBuilder);
				ParentPagerAddress::GetFromFields($objQueryBuilder);

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
			return ParentPagerAddress::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ParentPagerAddress
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'parent_pager_address';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'server_identifier', $strAliasPrefix . 'server_identifier');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_person_id', $strAliasPrefix . 'parent_pager_person_id');
			$objBuilder->AddSelectItem($strTableName, 'parent_pager_household_id', $strAliasPrefix . 'parent_pager_household_id');
			$objBuilder->AddSelectItem($strTableName, 'address_1', $strAliasPrefix . 'address_1');
			$objBuilder->AddSelectItem($strTableName, 'address_2', $strAliasPrefix . 'address_2');
			$objBuilder->AddSelectItem($strTableName, 'address_3', $strAliasPrefix . 'address_3');
			$objBuilder->AddSelectItem($strTableName, 'city', $strAliasPrefix . 'city');
			$objBuilder->AddSelectItem($strTableName, 'state', $strAliasPrefix . 'state');
			$objBuilder->AddSelectItem($strTableName, 'zip_code', $strAliasPrefix . 'zip_code');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ParentPagerAddress from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ParentPagerAddress::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerAddress
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the ParentPagerAddress object
			$objToReturn = new ParentPagerAddress();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'server_identifier', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'server_identifier'] : $strAliasPrefix . 'server_identifier';
			$objToReturn->intServerIdentifier = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_pager_person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_pager_person_id'] : $strAliasPrefix . 'parent_pager_person_id';
			$objToReturn->intParentPagerPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'parent_pager_household_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'parent_pager_household_id'] : $strAliasPrefix . 'parent_pager_household_id';
			$objToReturn->intParentPagerHouseholdId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_1', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_1'] : $strAliasPrefix . 'address_1';
			$objToReturn->strAddress1 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_2', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_2'] : $strAliasPrefix . 'address_2';
			$objToReturn->strAddress2 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_3', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_3'] : $strAliasPrefix . 'address_3';
			$objToReturn->strAddress3 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'city', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'city'] : $strAliasPrefix . 'city';
			$objToReturn->strCity = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'state', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'state'] : $strAliasPrefix . 'state';
			$objToReturn->strState = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'zip_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'zip_code'] : $strAliasPrefix . 'zip_code';
			$objToReturn->strZipCode = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'parent_pager_address__';

			// Check for ParentPagerPerson Early Binding
			$strAlias = $strAliasPrefix . 'parent_pager_person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentPagerPerson = ParentPagerIndividual::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_pager_person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ParentPagerHousehold Early Binding
			$strAlias = $strAliasPrefix . 'parent_pager_household_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objParentPagerHousehold = ParentPagerHousehold::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parent_pager_household_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of ParentPagerAddresses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ParentPagerAddress[]
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
					$objItem = ParentPagerAddress::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ParentPagerAddress::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ParentPagerAddress object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ParentPagerAddress next row resulting from the query
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
			return ParentPagerAddress::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ParentPagerAddress object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return ParentPagerAddress
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ParentPagerAddress::QuerySingle(
				QQ::Equal(QQN::ParentPagerAddress()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single ParentPagerAddress object,
		 * by ServerIdentifier Index(es)
		 * @param integer $intServerIdentifier
		 * @return ParentPagerAddress
		*/
		public static function LoadByServerIdentifier($intServerIdentifier, $objOptionalClauses = null) {
			return ParentPagerAddress::QuerySingle(
				QQ::Equal(QQN::ParentPagerAddress()->ServerIdentifier, $intServerIdentifier)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerAddress objects,
		 * by ParentPagerPersonId Index(es)
		 * @param integer $intParentPagerPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAddress[]
		*/
		public static function LoadArrayByParentPagerPersonId($intParentPagerPersonId, $objOptionalClauses = null) {
			// Call ParentPagerAddress::QueryArray to perform the LoadArrayByParentPagerPersonId query
			try {
				return ParentPagerAddress::QueryArray(
					QQ::Equal(QQN::ParentPagerAddress()->ParentPagerPersonId, $intParentPagerPersonId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerAddresses
		 * by ParentPagerPersonId Index(es)
		 * @param integer $intParentPagerPersonId
		 * @return int
		*/
		public static function CountByParentPagerPersonId($intParentPagerPersonId, $objOptionalClauses = null) {
			// Call ParentPagerAddress::QueryCount to perform the CountByParentPagerPersonId query
			return ParentPagerAddress::QueryCount(
				QQ::Equal(QQN::ParentPagerAddress()->ParentPagerPersonId, $intParentPagerPersonId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ParentPagerAddress objects,
		 * by ParentPagerHouseholdId Index(es)
		 * @param integer $intParentPagerHouseholdId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ParentPagerAddress[]
		*/
		public static function LoadArrayByParentPagerHouseholdId($intParentPagerHouseholdId, $objOptionalClauses = null) {
			// Call ParentPagerAddress::QueryArray to perform the LoadArrayByParentPagerHouseholdId query
			try {
				return ParentPagerAddress::QueryArray(
					QQ::Equal(QQN::ParentPagerAddress()->ParentPagerHouseholdId, $intParentPagerHouseholdId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ParentPagerAddresses
		 * by ParentPagerHouseholdId Index(es)
		 * @param integer $intParentPagerHouseholdId
		 * @return int
		*/
		public static function CountByParentPagerHouseholdId($intParentPagerHouseholdId, $objOptionalClauses = null) {
			// Call ParentPagerAddress::QueryCount to perform the CountByParentPagerHouseholdId query
			return ParentPagerAddress::QueryCount(
				QQ::Equal(QQN::ParentPagerAddress()->ParentPagerHouseholdId, $intParentPagerHouseholdId)
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
		 * Save this ParentPagerAddress
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerAddress::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `parent_pager_address` (
							`server_identifier`,
							`parent_pager_person_id`,
							`parent_pager_household_id`,
							`address_1`,
							`address_2`,
							`address_3`,
							`city`,
							`state`,
							`zip_code`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerPersonId) . ',
							' . $objDatabase->SqlVariable($this->intParentPagerHouseholdId) . ',
							' . $objDatabase->SqlVariable($this->strAddress1) . ',
							' . $objDatabase->SqlVariable($this->strAddress2) . ',
							' . $objDatabase->SqlVariable($this->strAddress3) . ',
							' . $objDatabase->SqlVariable($this->strCity) . ',
							' . $objDatabase->SqlVariable($this->strState) . ',
							' . $objDatabase->SqlVariable($this->strZipCode) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('parent_pager_address', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`parent_pager_address`
						SET
							`server_identifier` = ' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
							`parent_pager_person_id` = ' . $objDatabase->SqlVariable($this->intParentPagerPersonId) . ',
							`parent_pager_household_id` = ' . $objDatabase->SqlVariable($this->intParentPagerHouseholdId) . ',
							`address_1` = ' . $objDatabase->SqlVariable($this->strAddress1) . ',
							`address_2` = ' . $objDatabase->SqlVariable($this->strAddress2) . ',
							`address_3` = ' . $objDatabase->SqlVariable($this->strAddress3) . ',
							`city` = ' . $objDatabase->SqlVariable($this->strCity) . ',
							`state` = ' . $objDatabase->SqlVariable($this->strState) . ',
							`zip_code` = ' . $objDatabase->SqlVariable($this->strZipCode) . '
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
		 * Delete this ParentPagerAddress
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ParentPagerAddress with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ParentPagerAddress::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_address`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ParentPagerAddresses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerAddress::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parent_pager_address`');
		}

		/**
		 * Truncate parent_pager_address table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ParentPagerAddress::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `parent_pager_address`');
		}

		/**
		 * Reload this ParentPagerAddress from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ParentPagerAddress object.');

			// Reload the Object
			$objReloaded = ParentPagerAddress::Load($this->intId);

			// Update $this's local variables to match
			$this->intServerIdentifier = $objReloaded->intServerIdentifier;
			$this->ParentPagerPersonId = $objReloaded->ParentPagerPersonId;
			$this->ParentPagerHouseholdId = $objReloaded->ParentPagerHouseholdId;
			$this->strAddress1 = $objReloaded->strAddress1;
			$this->strAddress2 = $objReloaded->strAddress2;
			$this->strAddress3 = $objReloaded->strAddress3;
			$this->strCity = $objReloaded->strCity;
			$this->strState = $objReloaded->strState;
			$this->strZipCode = $objReloaded->strZipCode;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ParentPagerAddress::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `parent_pager_address` (
					`id`,
					`server_identifier`,
					`parent_pager_person_id`,
					`parent_pager_household_id`,
					`address_1`,
					`address_2`,
					`address_3`,
					`city`,
					`state`,
					`zip_code`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intServerIdentifier) . ',
					' . $objDatabase->SqlVariable($this->intParentPagerPersonId) . ',
					' . $objDatabase->SqlVariable($this->intParentPagerHouseholdId) . ',
					' . $objDatabase->SqlVariable($this->strAddress1) . ',
					' . $objDatabase->SqlVariable($this->strAddress2) . ',
					' . $objDatabase->SqlVariable($this->strAddress3) . ',
					' . $objDatabase->SqlVariable($this->strCity) . ',
					' . $objDatabase->SqlVariable($this->strState) . ',
					' . $objDatabase->SqlVariable($this->strZipCode) . ',
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
		 * @return ParentPagerAddress[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = ParentPagerAddress::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM parent_pager_address WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return ParentPagerAddress::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ParentPagerAddress[]
		 */
		public function GetJournal() {
			return ParentPagerAddress::GetJournalForId($this->intId);
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

				case 'ParentPagerPersonId':
					// Gets the value for intParentPagerPersonId 
					// @return integer
					return $this->intParentPagerPersonId;

				case 'ParentPagerHouseholdId':
					// Gets the value for intParentPagerHouseholdId 
					// @return integer
					return $this->intParentPagerHouseholdId;

				case 'Address1':
					// Gets the value for strAddress1 
					// @return string
					return $this->strAddress1;

				case 'Address2':
					// Gets the value for strAddress2 
					// @return string
					return $this->strAddress2;

				case 'Address3':
					// Gets the value for strAddress3 
					// @return string
					return $this->strAddress3;

				case 'City':
					// Gets the value for strCity 
					// @return string
					return $this->strCity;

				case 'State':
					// Gets the value for strState 
					// @return string
					return $this->strState;

				case 'ZipCode':
					// Gets the value for strZipCode 
					// @return string
					return $this->strZipCode;


				///////////////////
				// Member Objects
				///////////////////
				case 'ParentPagerPerson':
					// Gets the value for the ParentPagerIndividual object referenced by intParentPagerPersonId 
					// @return ParentPagerIndividual
					try {
						if ((!$this->objParentPagerPerson) && (!is_null($this->intParentPagerPersonId)))
							$this->objParentPagerPerson = ParentPagerIndividual::Load($this->intParentPagerPersonId);
						return $this->objParentPagerPerson;
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

				case 'ParentPagerPersonId':
					// Sets the value for intParentPagerPersonId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objParentPagerPerson = null;
						return ($this->intParentPagerPersonId = QType::Cast($mixValue, QType::Integer));
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

				case 'Address1':
					// Sets the value for strAddress1 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAddress1 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Address2':
					// Sets the value for strAddress2 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAddress2 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Address3':
					// Sets the value for strAddress3 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAddress3 = QType::Cast($mixValue, QType::String));
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

				case 'State':
					// Sets the value for strState 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strState = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ZipCode':
					// Sets the value for strZipCode 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strZipCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ParentPagerPerson':
					// Sets the value for the ParentPagerIndividual object referenced by intParentPagerPersonId 
					// @param ParentPagerIndividual $mixValue
					// @return ParentPagerIndividual
					if (is_null($mixValue)) {
						$this->intParentPagerPersonId = null;
						$this->objParentPagerPerson = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ParentPagerIndividual object
						try {
							$mixValue = QType::Cast($mixValue, 'ParentPagerIndividual');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ParentPagerIndividual object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ParentPagerPerson for this ParentPagerAddress');

						// Update Local Member Variables
						$this->objParentPagerPerson = $mixValue;
						$this->intParentPagerPersonId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved ParentPagerHousehold for this ParentPagerAddress');

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





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ParentPagerAddress"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ServerIdentifier" type="xsd:int"/>';
			$strToReturn .= '<element name="ParentPagerPerson" type="xsd1:ParentPagerIndividual"/>';
			$strToReturn .= '<element name="ParentPagerHousehold" type="xsd1:ParentPagerHousehold"/>';
			$strToReturn .= '<element name="Address1" type="xsd:string"/>';
			$strToReturn .= '<element name="Address2" type="xsd:string"/>';
			$strToReturn .= '<element name="Address3" type="xsd:string"/>';
			$strToReturn .= '<element name="City" type="xsd:string"/>';
			$strToReturn .= '<element name="State" type="xsd:string"/>';
			$strToReturn .= '<element name="ZipCode" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ParentPagerAddress', $strComplexTypeArray)) {
				$strComplexTypeArray['ParentPagerAddress'] = ParentPagerAddress::GetSoapComplexTypeXml();
				ParentPagerIndividual::AlterSoapComplexTypeArray($strComplexTypeArray);
				ParentPagerHousehold::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ParentPagerAddress::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ParentPagerAddress();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'ServerIdentifier'))
				$objToReturn->intServerIdentifier = $objSoapObject->ServerIdentifier;
			if ((property_exists($objSoapObject, 'ParentPagerPerson')) &&
				($objSoapObject->ParentPagerPerson))
				$objToReturn->ParentPagerPerson = ParentPagerIndividual::GetObjectFromSoapObject($objSoapObject->ParentPagerPerson);
			if ((property_exists($objSoapObject, 'ParentPagerHousehold')) &&
				($objSoapObject->ParentPagerHousehold))
				$objToReturn->ParentPagerHousehold = ParentPagerHousehold::GetObjectFromSoapObject($objSoapObject->ParentPagerHousehold);
			if (property_exists($objSoapObject, 'Address1'))
				$objToReturn->strAddress1 = $objSoapObject->Address1;
			if (property_exists($objSoapObject, 'Address2'))
				$objToReturn->strAddress2 = $objSoapObject->Address2;
			if (property_exists($objSoapObject, 'Address3'))
				$objToReturn->strAddress3 = $objSoapObject->Address3;
			if (property_exists($objSoapObject, 'City'))
				$objToReturn->strCity = $objSoapObject->City;
			if (property_exists($objSoapObject, 'State'))
				$objToReturn->strState = $objSoapObject->State;
			if (property_exists($objSoapObject, 'ZipCode'))
				$objToReturn->strZipCode = $objSoapObject->ZipCode;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ParentPagerAddress::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objParentPagerPerson)
				$objObject->objParentPagerPerson = ParentPagerIndividual::GetSoapObjectFromObject($objObject->objParentPagerPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentPagerPersonId = null;
			if ($objObject->objParentPagerHousehold)
				$objObject->objParentPagerHousehold = ParentPagerHousehold::GetSoapObjectFromObject($objObject->objParentPagerHousehold, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intParentPagerHouseholdId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $ServerIdentifier
	 * @property-read QQNode $ParentPagerPersonId
	 * @property-read QQNodeParentPagerIndividual $ParentPagerPerson
	 * @property-read QQNode $ParentPagerHouseholdId
	 * @property-read QQNodeParentPagerHousehold $ParentPagerHousehold
	 * @property-read QQNode $Address1
	 * @property-read QQNode $Address2
	 * @property-read QQNode $Address3
	 * @property-read QQNode $City
	 * @property-read QQNode $State
	 * @property-read QQNode $ZipCode
	 */
	class QQNodeParentPagerAddress extends QQNode {
		protected $strTableName = 'parent_pager_address';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerAddress';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ServerIdentifier':
					return new QQNode('server_identifier', 'ServerIdentifier', 'integer', $this);
				case 'ParentPagerPersonId':
					return new QQNode('parent_pager_person_id', 'ParentPagerPersonId', 'integer', $this);
				case 'ParentPagerPerson':
					return new QQNodeParentPagerIndividual('parent_pager_person_id', 'ParentPagerPerson', 'integer', $this);
				case 'ParentPagerHouseholdId':
					return new QQNode('parent_pager_household_id', 'ParentPagerHouseholdId', 'integer', $this);
				case 'ParentPagerHousehold':
					return new QQNodeParentPagerHousehold('parent_pager_household_id', 'ParentPagerHousehold', 'integer', $this);
				case 'Address1':
					return new QQNode('address_1', 'Address1', 'string', $this);
				case 'Address2':
					return new QQNode('address_2', 'Address2', 'string', $this);
				case 'Address3':
					return new QQNode('address_3', 'Address3', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'State':
					return new QQNode('state', 'State', 'string', $this);
				case 'ZipCode':
					return new QQNode('zip_code', 'ZipCode', 'string', $this);

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
	 * @property-read QQNode $ParentPagerPersonId
	 * @property-read QQNodeParentPagerIndividual $ParentPagerPerson
	 * @property-read QQNode $ParentPagerHouseholdId
	 * @property-read QQNodeParentPagerHousehold $ParentPagerHousehold
	 * @property-read QQNode $Address1
	 * @property-read QQNode $Address2
	 * @property-read QQNode $Address3
	 * @property-read QQNode $City
	 * @property-read QQNode $State
	 * @property-read QQNode $ZipCode
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeParentPagerAddress extends QQReverseReferenceNode {
		protected $strTableName = 'parent_pager_address';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ParentPagerAddress';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ServerIdentifier':
					return new QQNode('server_identifier', 'ServerIdentifier', 'integer', $this);
				case 'ParentPagerPersonId':
					return new QQNode('parent_pager_person_id', 'ParentPagerPersonId', 'integer', $this);
				case 'ParentPagerPerson':
					return new QQNodeParentPagerIndividual('parent_pager_person_id', 'ParentPagerPerson', 'integer', $this);
				case 'ParentPagerHouseholdId':
					return new QQNode('parent_pager_household_id', 'ParentPagerHouseholdId', 'integer', $this);
				case 'ParentPagerHousehold':
					return new QQNodeParentPagerHousehold('parent_pager_household_id', 'ParentPagerHousehold', 'integer', $this);
				case 'Address1':
					return new QQNode('address_1', 'Address1', 'string', $this);
				case 'Address2':
					return new QQNode('address_2', 'Address2', 'string', $this);
				case 'Address3':
					return new QQNode('address_3', 'Address3', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'State':
					return new QQNode('state', 'State', 'string', $this);
				case 'ZipCode':
					return new QQNode('zip_code', 'ZipCode', 'string', $this);

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