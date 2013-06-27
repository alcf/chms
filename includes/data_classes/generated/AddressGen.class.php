<?php
	/**
	 * The abstract AddressGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Address subclass which
	 * extends this AddressGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Address class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $AddressTypeId the value for intAddressTypeId (Not Null)
	 * @property integer $PersonId the value for intPersonId 
	 * @property integer $HouseholdId the value for intHouseholdId 
	 * @property integer $PrimaryPhoneId the value for intPrimaryPhoneId 
	 * @property string $Address1 the value for strAddress1 
	 * @property string $Address2 the value for strAddress2 
	 * @property string $Address3 the value for strAddress3 
	 * @property string $City the value for strCity 
	 * @property string $State the value for strState 
	 * @property string $ZipCode the value for strZipCode 
	 * @property string $Country the value for strCountry 
	 * @property boolean $CurrentFlag the value for blnCurrentFlag 
	 * @property boolean $InvalidFlag the value for blnInvalidFlag 
	 * @property boolean $VerificationCheckedFlag the value for blnVerificationCheckedFlag 
	 * @property QDateTime $DateUntilWhen the value for dttDateUntilWhen 
	 * @property boolean $InternationalFlag the value for blnInternationalFlag 
	 * @property Person $Person the value for the Person object referenced by intPersonId 
	 * @property Household $Household the value for the Household object referenced by intHouseholdId 
	 * @property Phone $PrimaryPhone the value for the Phone object referenced by intPrimaryPhoneId 
	 * @property FormAnswer $_FormAnswer the value for the private _objFormAnswer (Read-Only) if set due to an expansion on the form_answer.address_id reverse relationship
	 * @property FormAnswer[] $_FormAnswerArray the value for the private _objFormAnswerArray (Read-Only) if set due to an ExpandAsArray on the form_answer.address_id reverse relationship
	 * @property Person $_PersonAsMailing the value for the private _objPersonAsMailing (Read-Only) if set due to an expansion on the person.mailing_address_id reverse relationship
	 * @property Person[] $_PersonAsMailingArray the value for the private _objPersonAsMailingArray (Read-Only) if set due to an ExpandAsArray on the person.mailing_address_id reverse relationship
	 * @property Person $_PersonAsStewardship the value for the private _objPersonAsStewardship (Read-Only) if set due to an expansion on the person.stewardship_address_id reverse relationship
	 * @property Person[] $_PersonAsStewardshipArray the value for the private _objPersonAsStewardshipArray (Read-Only) if set due to an ExpandAsArray on the person.stewardship_address_id reverse relationship
	 * @property Phone $_Phone the value for the private _objPhone (Read-Only) if set due to an expansion on the phone.address_id reverse relationship
	 * @property Phone[] $_PhoneArray the value for the private _objPhoneArray (Read-Only) if set due to an ExpandAsArray on the phone.address_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AddressGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column address.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column address.address_type_id
		 * @var integer intAddressTypeId
		 */
		protected $intAddressTypeId;
		const AddressTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column address.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column address.household_id
		 * @var integer intHouseholdId
		 */
		protected $intHouseholdId;
		const HouseholdIdDefault = null;


		/**
		 * Protected member variable that maps to the database column address.primary_phone_id
		 * @var integer intPrimaryPhoneId
		 */
		protected $intPrimaryPhoneId;
		const PrimaryPhoneIdDefault = null;


		/**
		 * Protected member variable that maps to the database column address.address_1
		 * @var string strAddress1
		 */
		protected $strAddress1;
		const Address1MaxLength = 200;
		const Address1Default = null;


		/**
		 * Protected member variable that maps to the database column address.address_2
		 * @var string strAddress2
		 */
		protected $strAddress2;
		const Address2MaxLength = 200;
		const Address2Default = null;


		/**
		 * Protected member variable that maps to the database column address.address_3
		 * @var string strAddress3
		 */
		protected $strAddress3;
		const Address3MaxLength = 200;
		const Address3Default = null;


		/**
		 * Protected member variable that maps to the database column address.city
		 * @var string strCity
		 */
		protected $strCity;
		const CityMaxLength = 100;
		const CityDefault = null;


		/**
		 * Protected member variable that maps to the database column address.state
		 * @var string strState
		 */
		protected $strState;
		const StateMaxLength = 100;
		const StateDefault = null;


		/**
		 * Protected member variable that maps to the database column address.zip_code
		 * @var string strZipCode
		 */
		protected $strZipCode;
		const ZipCodeMaxLength = 10;
		const ZipCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column address.country
		 * @var string strCountry
		 */
		protected $strCountry;
		const CountryMaxLength = 2;
		const CountryDefault = null;


		/**
		 * Protected member variable that maps to the database column address.current_flag
		 * @var boolean blnCurrentFlag
		 */
		protected $blnCurrentFlag;
		const CurrentFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column address.invalid_flag
		 * @var boolean blnInvalidFlag
		 */
		protected $blnInvalidFlag;
		const InvalidFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column address.verification_checked_flag
		 * @var boolean blnVerificationCheckedFlag
		 */
		protected $blnVerificationCheckedFlag;
		const VerificationCheckedFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column address.date_until_when
		 * @var QDateTime dttDateUntilWhen
		 */
		protected $dttDateUntilWhen;
		const DateUntilWhenDefault = null;


		/**
		 * Protected member variable that maps to the database column address.international_flag
		 * @var boolean blnInternationalFlag
		 */
		protected $blnInternationalFlag;
		const InternationalFlagDefault = null;


		/**
		 * Private member variable that stores a reference to a single FormAnswer object
		 * (of type FormAnswer), if this Address object was restored with
		 * an expansion on the form_answer association table.
		 * @var FormAnswer _objFormAnswer;
		 */
		private $_objFormAnswer;

		/**
		 * Private member variable that stores a reference to an array of FormAnswer objects
		 * (of type FormAnswer[]), if this Address object was restored with
		 * an ExpandAsArray on the form_answer association table.
		 * @var FormAnswer[] _objFormAnswerArray;
		 */
		private $_objFormAnswerArray = array();

		/**
		 * Private member variable that stores a reference to a single PersonAsMailing object
		 * (of type Person), if this Address object was restored with
		 * an expansion on the person association table.
		 * @var Person _objPersonAsMailing;
		 */
		private $_objPersonAsMailing;

		/**
		 * Private member variable that stores a reference to an array of PersonAsMailing objects
		 * (of type Person[]), if this Address object was restored with
		 * an ExpandAsArray on the person association table.
		 * @var Person[] _objPersonAsMailingArray;
		 */
		private $_objPersonAsMailingArray = array();

		/**
		 * Private member variable that stores a reference to a single PersonAsStewardship object
		 * (of type Person), if this Address object was restored with
		 * an expansion on the person association table.
		 * @var Person _objPersonAsStewardship;
		 */
		private $_objPersonAsStewardship;

		/**
		 * Private member variable that stores a reference to an array of PersonAsStewardship objects
		 * (of type Person[]), if this Address object was restored with
		 * an ExpandAsArray on the person association table.
		 * @var Person[] _objPersonAsStewardshipArray;
		 */
		private $_objPersonAsStewardshipArray = array();

		/**
		 * Private member variable that stores a reference to a single Phone object
		 * (of type Phone), if this Address object was restored with
		 * an expansion on the phone association table.
		 * @var Phone _objPhone;
		 */
		private $_objPhone;

		/**
		 * Private member variable that stores a reference to an array of Phone objects
		 * (of type Phone[]), if this Address object was restored with
		 * an ExpandAsArray on the phone association table.
		 * @var Phone[] _objPhoneArray;
		 */
		private $_objPhoneArray = array();

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
		 * in the database column address.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column address.household_id.
		 *
		 * NOTE: Always use the Household property getter to correctly retrieve this Household object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Household objHousehold
		 */
		protected $objHousehold;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column address.primary_phone_id.
		 *
		 * NOTE: Always use the PrimaryPhone property getter to correctly retrieve this Phone object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Phone objPrimaryPhone
		 */
		protected $objPrimaryPhone;





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
		 * Load a Address from PK Info
		 * @param integer $intId
		 * @return Address
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Address::QuerySingle(
				QQ::Equal(QQN::Address()->Id, $intId)
			);
		}

		/**
		 * Load all Addresses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadAll query
			try {
				return Address::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Addresses
		 * @return int
		 */
		public static function CountAll() {
			// Call Address::QueryCount to perform the CountAll query
			return Address::QueryCount(QQ::All());
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
			$objDatabase = Address::GetDatabase();

			// Create/Build out the QueryBuilder object with Address-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'address');
			Address::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('address');

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
		 * Static Qcodo Query method to query for a single Address object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Address the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Address object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Address::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Address::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Address objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Address[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Address::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Address objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Address::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'address_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Address-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Address::GetSelectFields($objQueryBuilder);
				Address::GetFromFields($objQueryBuilder);

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
			return Address::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Address
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'address';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'address_type_id', $strAliasPrefix . 'address_type_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'household_id', $strAliasPrefix . 'household_id');
			$objBuilder->AddSelectItem($strTableName, 'primary_phone_id', $strAliasPrefix . 'primary_phone_id');
			$objBuilder->AddSelectItem($strTableName, 'address_1', $strAliasPrefix . 'address_1');
			$objBuilder->AddSelectItem($strTableName, 'address_2', $strAliasPrefix . 'address_2');
			$objBuilder->AddSelectItem($strTableName, 'address_3', $strAliasPrefix . 'address_3');
			$objBuilder->AddSelectItem($strTableName, 'city', $strAliasPrefix . 'city');
			$objBuilder->AddSelectItem($strTableName, 'state', $strAliasPrefix . 'state');
			$objBuilder->AddSelectItem($strTableName, 'zip_code', $strAliasPrefix . 'zip_code');
			$objBuilder->AddSelectItem($strTableName, 'country', $strAliasPrefix . 'country');
			$objBuilder->AddSelectItem($strTableName, 'current_flag', $strAliasPrefix . 'current_flag');
			$objBuilder->AddSelectItem($strTableName, 'invalid_flag', $strAliasPrefix . 'invalid_flag');
			$objBuilder->AddSelectItem($strTableName, 'verification_checked_flag', $strAliasPrefix . 'verification_checked_flag');
			$objBuilder->AddSelectItem($strTableName, 'date_until_when', $strAliasPrefix . 'date_until_when');
			$objBuilder->AddSelectItem($strTableName, 'international_flag', $strAliasPrefix . 'international_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Address from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Address::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Address
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
					$strAliasPrefix = 'address__';


				$strAlias = $strAliasPrefix . 'formanswer__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objFormAnswerArray)) {
						$objPreviousChildItem = $objPreviousItem->_objFormAnswerArray[$intPreviousChildItemCount - 1];
						$objChildItem = FormAnswer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formanswer__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objFormAnswerArray[] = $objChildItem;
					} else
						$objPreviousItem->_objFormAnswerArray[] = FormAnswer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formanswer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'personasmailing__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPersonAsMailingArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPersonAsMailingArray[$intPreviousChildItemCount - 1];
						$objChildItem = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasmailing__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPersonAsMailingArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPersonAsMailingArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasmailing__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'personasstewardship__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPersonAsStewardshipArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPersonAsStewardshipArray[$intPreviousChildItemCount - 1];
						$objChildItem = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasstewardship__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPersonAsStewardshipArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPersonAsStewardshipArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasstewardship__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'phone__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPhoneArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPhoneArray[$intPreviousChildItemCount - 1];
						$objChildItem = Phone::InstantiateDbRow($objDbRow, $strAliasPrefix . 'phone__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPhoneArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPhoneArray[] = Phone::InstantiateDbRow($objDbRow, $strAliasPrefix . 'phone__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'address__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Address object
			$objToReturn = new Address();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_type_id'] : $strAliasPrefix . 'address_type_id';
			$objToReturn->intAddressTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'household_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'household_id'] : $strAliasPrefix . 'household_id';
			$objToReturn->intHouseholdId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'primary_phone_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'primary_phone_id'] : $strAliasPrefix . 'primary_phone_id';
			$objToReturn->intPrimaryPhoneId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
			$strAliasName = array_key_exists($strAliasPrefix . 'country', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'country'] : $strAliasPrefix . 'country';
			$objToReturn->strCountry = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'current_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'current_flag'] : $strAliasPrefix . 'current_flag';
			$objToReturn->blnCurrentFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'invalid_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'invalid_flag'] : $strAliasPrefix . 'invalid_flag';
			$objToReturn->blnInvalidFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'verification_checked_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'verification_checked_flag'] : $strAliasPrefix . 'verification_checked_flag';
			$objToReturn->blnVerificationCheckedFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_until_when', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_until_when'] : $strAliasPrefix . 'date_until_when';
			$objToReturn->dttDateUntilWhen = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'international_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'international_flag'] : $strAliasPrefix . 'international_flag';
			$objToReturn->blnInternationalFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'address__';

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Household Early Binding
			$strAlias = $strAliasPrefix . 'household_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objHousehold = Household::InstantiateDbRow($objDbRow, $strAliasPrefix . 'household_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for PrimaryPhone Early Binding
			$strAlias = $strAliasPrefix . 'primary_phone_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPrimaryPhone = Phone::InstantiateDbRow($objDbRow, $strAliasPrefix . 'primary_phone_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for FormAnswer Virtual Binding
			$strAlias = $strAliasPrefix . 'formanswer__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objFormAnswerArray[] = FormAnswer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formanswer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objFormAnswer = FormAnswer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formanswer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PersonAsMailing Virtual Binding
			$strAlias = $strAliasPrefix . 'personasmailing__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPersonAsMailingArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasmailing__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPersonAsMailing = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasmailing__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PersonAsStewardship Virtual Binding
			$strAlias = $strAliasPrefix . 'personasstewardship__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPersonAsStewardshipArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasstewardship__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPersonAsStewardship = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personasstewardship__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Phone Virtual Binding
			$strAlias = $strAliasPrefix . 'phone__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPhoneArray[] = Phone::InstantiateDbRow($objDbRow, $strAliasPrefix . 'phone__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPhone = Phone::InstantiateDbRow($objDbRow, $strAliasPrefix . 'phone__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Addresses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Address[]
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
					$objItem = Address::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Address::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Address object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Address next row resulting from the query
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
			return Address::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Address object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Address
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Address::QuerySingle(
				QQ::Equal(QQN::Address()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Address objects,
		 * by HouseholdId, CurrentFlag Index(es)
		 * @param integer $intHouseholdId
		 * @param boolean $blnCurrentFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/
		public static function LoadArrayByHouseholdIdCurrentFlag($intHouseholdId, $blnCurrentFlag, $objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadArrayByHouseholdIdCurrentFlag query
			try {
				return Address::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::Address()->HouseholdId, $intHouseholdId),
					QQ::Equal(QQN::Address()->CurrentFlag, $blnCurrentFlag)
					),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Addresses
		 * by HouseholdId, CurrentFlag Index(es)
		 * @param integer $intHouseholdId
		 * @param boolean $blnCurrentFlag
		 * @return int
		*/
		public static function CountByHouseholdIdCurrentFlag($intHouseholdId, $blnCurrentFlag, $objOptionalClauses = null) {
			// Call Address::QueryCount to perform the CountByHouseholdIdCurrentFlag query
			return Address::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::Address()->HouseholdId, $intHouseholdId),
				QQ::Equal(QQN::Address()->CurrentFlag, $blnCurrentFlag)
				)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Address objects,
		 * by AddressTypeId Index(es)
		 * @param integer $intAddressTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/
		public static function LoadArrayByAddressTypeId($intAddressTypeId, $objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadArrayByAddressTypeId query
			try {
				return Address::QueryArray(
					QQ::Equal(QQN::Address()->AddressTypeId, $intAddressTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Addresses
		 * by AddressTypeId Index(es)
		 * @param integer $intAddressTypeId
		 * @return int
		*/
		public static function CountByAddressTypeId($intAddressTypeId, $objOptionalClauses = null) {
			// Call Address::QueryCount to perform the CountByAddressTypeId query
			return Address::QueryCount(
				QQ::Equal(QQN::Address()->AddressTypeId, $intAddressTypeId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Address objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadArrayByPersonId query
			try {
				return Address::QueryArray(
					QQ::Equal(QQN::Address()->PersonId, $intPersonId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Addresses
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call Address::QueryCount to perform the CountByPersonId query
			return Address::QueryCount(
				QQ::Equal(QQN::Address()->PersonId, $intPersonId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Address objects,
		 * by HouseholdId Index(es)
		 * @param integer $intHouseholdId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/
		public static function LoadArrayByHouseholdId($intHouseholdId, $objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadArrayByHouseholdId query
			try {
				return Address::QueryArray(
					QQ::Equal(QQN::Address()->HouseholdId, $intHouseholdId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Addresses
		 * by HouseholdId Index(es)
		 * @param integer $intHouseholdId
		 * @return int
		*/
		public static function CountByHouseholdId($intHouseholdId, $objOptionalClauses = null) {
			// Call Address::QueryCount to perform the CountByHouseholdId query
			return Address::QueryCount(
				QQ::Equal(QQN::Address()->HouseholdId, $intHouseholdId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Address objects,
		 * by PrimaryPhoneId Index(es)
		 * @param integer $intPrimaryPhoneId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/
		public static function LoadArrayByPrimaryPhoneId($intPrimaryPhoneId, $objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadArrayByPrimaryPhoneId query
			try {
				return Address::QueryArray(
					QQ::Equal(QQN::Address()->PrimaryPhoneId, $intPrimaryPhoneId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Addresses
		 * by PrimaryPhoneId Index(es)
		 * @param integer $intPrimaryPhoneId
		 * @return int
		*/
		public static function CountByPrimaryPhoneId($intPrimaryPhoneId, $objOptionalClauses = null) {
			// Call Address::QueryCount to perform the CountByPrimaryPhoneId query
			return Address::QueryCount(
				QQ::Equal(QQN::Address()->PrimaryPhoneId, $intPrimaryPhoneId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Address objects,
		 * by VerificationCheckedFlag Index(es)
		 * @param boolean $blnVerificationCheckedFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/
		public static function LoadArrayByVerificationCheckedFlag($blnVerificationCheckedFlag, $objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadArrayByVerificationCheckedFlag query
			try {
				return Address::QueryArray(
					QQ::Equal(QQN::Address()->VerificationCheckedFlag, $blnVerificationCheckedFlag),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Addresses
		 * by VerificationCheckedFlag Index(es)
		 * @param boolean $blnVerificationCheckedFlag
		 * @return int
		*/
		public static function CountByVerificationCheckedFlag($blnVerificationCheckedFlag, $objOptionalClauses = null) {
			// Call Address::QueryCount to perform the CountByVerificationCheckedFlag query
			return Address::QueryCount(
				QQ::Equal(QQN::Address()->VerificationCheckedFlag, $blnVerificationCheckedFlag)
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
		 * Save this Address
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `address` (
							`address_type_id`,
							`person_id`,
							`household_id`,
							`primary_phone_id`,
							`address_1`,
							`address_2`,
							`address_3`,
							`city`,
							`state`,
							`zip_code`,
							`country`,
							`current_flag`,
							`invalid_flag`,
							`verification_checked_flag`,
							`date_until_when`,
							`international_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intAddressTypeId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intHouseholdId) . ',
							' . $objDatabase->SqlVariable($this->intPrimaryPhoneId) . ',
							' . $objDatabase->SqlVariable($this->strAddress1) . ',
							' . $objDatabase->SqlVariable($this->strAddress2) . ',
							' . $objDatabase->SqlVariable($this->strAddress3) . ',
							' . $objDatabase->SqlVariable($this->strCity) . ',
							' . $objDatabase->SqlVariable($this->strState) . ',
							' . $objDatabase->SqlVariable($this->strZipCode) . ',
							' . $objDatabase->SqlVariable($this->strCountry) . ',
							' . $objDatabase->SqlVariable($this->blnCurrentFlag) . ',
							' . $objDatabase->SqlVariable($this->blnInvalidFlag) . ',
							' . $objDatabase->SqlVariable($this->blnVerificationCheckedFlag) . ',
							' . $objDatabase->SqlVariable($this->dttDateUntilWhen) . ',
							' . $objDatabase->SqlVariable($this->blnInternationalFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('address', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`address`
						SET
							`address_type_id` = ' . $objDatabase->SqlVariable($this->intAddressTypeId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`household_id` = ' . $objDatabase->SqlVariable($this->intHouseholdId) . ',
							`primary_phone_id` = ' . $objDatabase->SqlVariable($this->intPrimaryPhoneId) . ',
							`address_1` = ' . $objDatabase->SqlVariable($this->strAddress1) . ',
							`address_2` = ' . $objDatabase->SqlVariable($this->strAddress2) . ',
							`address_3` = ' . $objDatabase->SqlVariable($this->strAddress3) . ',
							`city` = ' . $objDatabase->SqlVariable($this->strCity) . ',
							`state` = ' . $objDatabase->SqlVariable($this->strState) . ',
							`zip_code` = ' . $objDatabase->SqlVariable($this->strZipCode) . ',
							`country` = ' . $objDatabase->SqlVariable($this->strCountry) . ',
							`current_flag` = ' . $objDatabase->SqlVariable($this->blnCurrentFlag) . ',
							`invalid_flag` = ' . $objDatabase->SqlVariable($this->blnInvalidFlag) . ',
							`verification_checked_flag` = ' . $objDatabase->SqlVariable($this->blnVerificationCheckedFlag) . ',
							`date_until_when` = ' . $objDatabase->SqlVariable($this->dttDateUntilWhen) . ',
							`international_flag` = ' . $objDatabase->SqlVariable($this->blnInternationalFlag) . '
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
		 * Delete this Address
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Address with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Addresses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`');
		}

		/**
		 * Truncate address table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `address`');
		}

		/**
		 * Reload this Address from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Address object.');

			// Reload the Object
			$objReloaded = Address::Load($this->intId);

			// Update $this's local variables to match
			$this->AddressTypeId = $objReloaded->AddressTypeId;
			$this->PersonId = $objReloaded->PersonId;
			$this->HouseholdId = $objReloaded->HouseholdId;
			$this->PrimaryPhoneId = $objReloaded->PrimaryPhoneId;
			$this->strAddress1 = $objReloaded->strAddress1;
			$this->strAddress2 = $objReloaded->strAddress2;
			$this->strAddress3 = $objReloaded->strAddress3;
			$this->strCity = $objReloaded->strCity;
			$this->strState = $objReloaded->strState;
			$this->strZipCode = $objReloaded->strZipCode;
			$this->strCountry = $objReloaded->strCountry;
			$this->blnCurrentFlag = $objReloaded->blnCurrentFlag;
			$this->blnInvalidFlag = $objReloaded->blnInvalidFlag;
			$this->blnVerificationCheckedFlag = $objReloaded->blnVerificationCheckedFlag;
			$this->dttDateUntilWhen = $objReloaded->dttDateUntilWhen;
			$this->blnInternationalFlag = $objReloaded->blnInternationalFlag;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Address::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `address` (
					`id`,
					`address_type_id`,
					`person_id`,
					`household_id`,
					`primary_phone_id`,
					`address_1`,
					`address_2`,
					`address_3`,
					`city`,
					`state`,
					`zip_code`,
					`country`,
					`current_flag`,
					`invalid_flag`,
					`verification_checked_flag`,
					`date_until_when`,
					`international_flag`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intAddressTypeId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->intHouseholdId) . ',
					' . $objDatabase->SqlVariable($this->intPrimaryPhoneId) . ',
					' . $objDatabase->SqlVariable($this->strAddress1) . ',
					' . $objDatabase->SqlVariable($this->strAddress2) . ',
					' . $objDatabase->SqlVariable($this->strAddress3) . ',
					' . $objDatabase->SqlVariable($this->strCity) . ',
					' . $objDatabase->SqlVariable($this->strState) . ',
					' . $objDatabase->SqlVariable($this->strZipCode) . ',
					' . $objDatabase->SqlVariable($this->strCountry) . ',
					' . $objDatabase->SqlVariable($this->blnCurrentFlag) . ',
					' . $objDatabase->SqlVariable($this->blnInvalidFlag) . ',
					' . $objDatabase->SqlVariable($this->blnVerificationCheckedFlag) . ',
					' . $objDatabase->SqlVariable($this->dttDateUntilWhen) . ',
					' . $objDatabase->SqlVariable($this->blnInternationalFlag) . ',
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
		 * @return Address[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Address::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM address WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Address::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Address[]
		 */
		public function GetJournal() {
			return Address::GetJournalForId($this->intId);
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

				case 'AddressTypeId':
					// Gets the value for intAddressTypeId (Not Null)
					// @return integer
					return $this->intAddressTypeId;

				case 'PersonId':
					// Gets the value for intPersonId 
					// @return integer
					return $this->intPersonId;

				case 'HouseholdId':
					// Gets the value for intHouseholdId 
					// @return integer
					return $this->intHouseholdId;

				case 'PrimaryPhoneId':
					// Gets the value for intPrimaryPhoneId 
					// @return integer
					return $this->intPrimaryPhoneId;

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

				case 'Country':
					// Gets the value for strCountry 
					// @return string
					return $this->strCountry;

				case 'CurrentFlag':
					// Gets the value for blnCurrentFlag 
					// @return boolean
					return $this->blnCurrentFlag;

				case 'InvalidFlag':
					// Gets the value for blnInvalidFlag 
					// @return boolean
					return $this->blnInvalidFlag;

				case 'VerificationCheckedFlag':
					// Gets the value for blnVerificationCheckedFlag 
					// @return boolean
					return $this->blnVerificationCheckedFlag;

				case 'DateUntilWhen':
					// Gets the value for dttDateUntilWhen 
					// @return QDateTime
					return $this->dttDateUntilWhen;

				case 'InternationalFlag':
					// Gets the value for blnInternationalFlag 
					// @return boolean
					return $this->blnInternationalFlag;


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

				case 'Household':
					// Gets the value for the Household object referenced by intHouseholdId 
					// @return Household
					try {
						if ((!$this->objHousehold) && (!is_null($this->intHouseholdId)))
							$this->objHousehold = Household::Load($this->intHouseholdId);
						return $this->objHousehold;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimaryPhone':
					// Gets the value for the Phone object referenced by intPrimaryPhoneId 
					// @return Phone
					try {
						if ((!$this->objPrimaryPhone) && (!is_null($this->intPrimaryPhoneId)))
							$this->objPrimaryPhone = Phone::Load($this->intPrimaryPhoneId);
						return $this->objPrimaryPhone;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_FormAnswer':
					// Gets the value for the private _objFormAnswer (Read-Only)
					// if set due to an expansion on the form_answer.address_id reverse relationship
					// @return FormAnswer
					return $this->_objFormAnswer;

				case '_FormAnswerArray':
					// Gets the value for the private _objFormAnswerArray (Read-Only)
					// if set due to an ExpandAsArray on the form_answer.address_id reverse relationship
					// @return FormAnswer[]
					return (array) $this->_objFormAnswerArray;

				case '_PersonAsMailing':
					// Gets the value for the private _objPersonAsMailing (Read-Only)
					// if set due to an expansion on the person.mailing_address_id reverse relationship
					// @return Person
					return $this->_objPersonAsMailing;

				case '_PersonAsMailingArray':
					// Gets the value for the private _objPersonAsMailingArray (Read-Only)
					// if set due to an ExpandAsArray on the person.mailing_address_id reverse relationship
					// @return Person[]
					return (array) $this->_objPersonAsMailingArray;

				case '_PersonAsStewardship':
					// Gets the value for the private _objPersonAsStewardship (Read-Only)
					// if set due to an expansion on the person.stewardship_address_id reverse relationship
					// @return Person
					return $this->_objPersonAsStewardship;

				case '_PersonAsStewardshipArray':
					// Gets the value for the private _objPersonAsStewardshipArray (Read-Only)
					// if set due to an ExpandAsArray on the person.stewardship_address_id reverse relationship
					// @return Person[]
					return (array) $this->_objPersonAsStewardshipArray;

				case '_Phone':
					// Gets the value for the private _objPhone (Read-Only)
					// if set due to an expansion on the phone.address_id reverse relationship
					// @return Phone
					return $this->_objPhone;

				case '_PhoneArray':
					// Gets the value for the private _objPhoneArray (Read-Only)
					// if set due to an ExpandAsArray on the phone.address_id reverse relationship
					// @return Phone[]
					return (array) $this->_objPhoneArray;


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
				case 'AddressTypeId':
					// Sets the value for intAddressTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intAddressTypeId = QType::Cast($mixValue, QType::Integer));
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

				case 'HouseholdId':
					// Sets the value for intHouseholdId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objHousehold = null;
						return ($this->intHouseholdId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimaryPhoneId':
					// Sets the value for intPrimaryPhoneId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPrimaryPhone = null;
						return ($this->intPrimaryPhoneId = QType::Cast($mixValue, QType::Integer));
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

				case 'Country':
					// Sets the value for strCountry 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCountry = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CurrentFlag':
					// Sets the value for blnCurrentFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnCurrentFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'InvalidFlag':
					// Sets the value for blnInvalidFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnInvalidFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VerificationCheckedFlag':
					// Sets the value for blnVerificationCheckedFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnVerificationCheckedFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateUntilWhen':
					// Sets the value for dttDateUntilWhen 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateUntilWhen = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'InternationalFlag':
					// Sets the value for blnInternationalFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnInternationalFlag = QType::Cast($mixValue, QType::Boolean));
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
							throw new QCallerException('Unable to set an unsaved Person for this Address');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Household':
					// Sets the value for the Household object referenced by intHouseholdId 
					// @param Household $mixValue
					// @return Household
					if (is_null($mixValue)) {
						$this->intHouseholdId = null;
						$this->objHousehold = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Household object
						try {
							$mixValue = QType::Cast($mixValue, 'Household');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Household object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Household for this Address');

						// Update Local Member Variables
						$this->objHousehold = $mixValue;
						$this->intHouseholdId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'PrimaryPhone':
					// Sets the value for the Phone object referenced by intPrimaryPhoneId 
					// @param Phone $mixValue
					// @return Phone
					if (is_null($mixValue)) {
						$this->intPrimaryPhoneId = null;
						$this->objPrimaryPhone = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Phone object
						try {
							$mixValue = QType::Cast($mixValue, 'Phone');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Phone object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved PrimaryPhone for this Address');

						// Update Local Member Variables
						$this->objPrimaryPhone = $mixValue;
						$this->intPrimaryPhoneId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for FormAnswer
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FormAnswers as an array of FormAnswer objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormAnswer[]
		*/ 
		public function GetFormAnswerArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FormAnswer::LoadArrayByAddressId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FormAnswers
		 * @return int
		*/ 
		public function CountFormAnswers() {
			if ((is_null($this->intId)))
				return 0;

			return FormAnswer::CountByAddressId($this->intId);
		}

		/**
		 * Associates a FormAnswer
		 * @param FormAnswer $objFormAnswer
		 * @return void
		*/ 
		public function AssociateFormAnswer(FormAnswer $objFormAnswer) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFormAnswer on this unsaved Address.');
			if ((is_null($objFormAnswer->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFormAnswer on this Address with an unsaved FormAnswer.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_answer`
				SET
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormAnswer->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objFormAnswer->AddressId = $this->intId;
				$objFormAnswer->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a FormAnswer
		 * @param FormAnswer $objFormAnswer
		 * @return void
		*/ 
		public function UnassociateFormAnswer(FormAnswer $objFormAnswer) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved Address.');
			if ((is_null($objFormAnswer->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this Address with an unsaved FormAnswer.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_answer`
				SET
					`address_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormAnswer->Id) . ' AND
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objFormAnswer->AddressId = null;
				$objFormAnswer->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all FormAnswers
		 * @return void
		*/ 
		public function UnassociateAllFormAnswers() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (FormAnswer::LoadArrayByAddressId($this->intId) as $objFormAnswer) {
					$objFormAnswer->AddressId = null;
					$objFormAnswer->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_answer`
				SET
					`address_id` = null
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FormAnswer
		 * @param FormAnswer $objFormAnswer
		 * @return void
		*/ 
		public function DeleteAssociatedFormAnswer(FormAnswer $objFormAnswer) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved Address.');
			if ((is_null($objFormAnswer->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this Address with an unsaved FormAnswer.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_answer`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormAnswer->Id) . ' AND
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objFormAnswer->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated FormAnswers
		 * @return void
		*/ 
		public function DeleteAllFormAnswers() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (FormAnswer::LoadArrayByAddressId($this->intId) as $objFormAnswer) {
					$objFormAnswer->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_answer`
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for PersonAsMailing
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PeopleAsMailing as an array of Person objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/ 
		public function GetPersonAsMailingArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Person::LoadArrayByMailingAddressId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PeopleAsMailing
		 * @return int
		*/ 
		public function CountPeopleAsMailing() {
			if ((is_null($this->intId)))
				return 0;

			return Person::CountByMailingAddressId($this->intId);
		}

		/**
		 * Associates a PersonAsMailing
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function AssociatePersonAsMailing(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonAsMailing on this unsaved Address.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonAsMailing on this Address with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person`
				SET
					`mailing_address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPerson->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPerson->MailingAddressId = $this->intId;
				$objPerson->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PersonAsMailing
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function UnassociatePersonAsMailing(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsMailing on this unsaved Address.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsMailing on this Address with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person`
				SET
					`mailing_address_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPerson->Id) . ' AND
					`mailing_address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPerson->MailingAddressId = null;
				$objPerson->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PeopleAsMailing
		 * @return void
		*/ 
		public function UnassociateAllPeopleAsMailing() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsMailing on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Person::LoadArrayByMailingAddressId($this->intId) as $objPerson) {
					$objPerson->MailingAddressId = null;
					$objPerson->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person`
				SET
					`mailing_address_id` = null
				WHERE
					`mailing_address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PersonAsMailing
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function DeleteAssociatedPersonAsMailing(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsMailing on this unsaved Address.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsMailing on this Address with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPerson->Id) . ' AND
					`mailing_address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPerson->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated PeopleAsMailing
		 * @return void
		*/ 
		public function DeleteAllPeopleAsMailing() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsMailing on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Person::LoadArrayByMailingAddressId($this->intId) as $objPerson) {
					$objPerson->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`
				WHERE
					`mailing_address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for PersonAsStewardship
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PeopleAsStewardship as an array of Person objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/ 
		public function GetPersonAsStewardshipArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Person::LoadArrayByStewardshipAddressId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PeopleAsStewardship
		 * @return int
		*/ 
		public function CountPeopleAsStewardship() {
			if ((is_null($this->intId)))
				return 0;

			return Person::CountByStewardshipAddressId($this->intId);
		}

		/**
		 * Associates a PersonAsStewardship
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function AssociatePersonAsStewardship(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonAsStewardship on this unsaved Address.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonAsStewardship on this Address with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person`
				SET
					`stewardship_address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPerson->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPerson->StewardshipAddressId = $this->intId;
				$objPerson->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PersonAsStewardship
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function UnassociatePersonAsStewardship(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsStewardship on this unsaved Address.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsStewardship on this Address with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person`
				SET
					`stewardship_address_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPerson->Id) . ' AND
					`stewardship_address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPerson->StewardshipAddressId = null;
				$objPerson->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PeopleAsStewardship
		 * @return void
		*/ 
		public function UnassociateAllPeopleAsStewardship() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsStewardship on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Person::LoadArrayByStewardshipAddressId($this->intId) as $objPerson) {
					$objPerson->StewardshipAddressId = null;
					$objPerson->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person`
				SET
					`stewardship_address_id` = null
				WHERE
					`stewardship_address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PersonAsStewardship
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function DeleteAssociatedPersonAsStewardship(Person $objPerson) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsStewardship on this unsaved Address.');
			if ((is_null($objPerson->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsStewardship on this Address with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPerson->Id) . ' AND
					`stewardship_address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPerson->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated PeopleAsStewardship
		 * @return void
		*/ 
		public function DeleteAllPeopleAsStewardship() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonAsStewardship on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Person::LoadArrayByStewardshipAddressId($this->intId) as $objPerson) {
					$objPerson->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`
				WHERE
					`stewardship_address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Phone
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Phones as an array of Phone objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Phone[]
		*/ 
		public function GetPhoneArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Phone::LoadArrayByAddressId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Phones
		 * @return int
		*/ 
		public function CountPhones() {
			if ((is_null($this->intId)))
				return 0;

			return Phone::CountByAddressId($this->intId);
		}

		/**
		 * Associates a Phone
		 * @param Phone $objPhone
		 * @return void
		*/ 
		public function AssociatePhone(Phone $objPhone) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePhone on this unsaved Address.');
			if ((is_null($objPhone->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePhone on this Address with an unsaved Phone.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`phone`
				SET
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPhone->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPhone->AddressId = $this->intId;
				$objPhone->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Phone
		 * @param Phone $objPhone
		 * @return void
		*/ 
		public function UnassociatePhone(Phone $objPhone) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this unsaved Address.');
			if ((is_null($objPhone->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this Address with an unsaved Phone.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`phone`
				SET
					`address_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPhone->Id) . ' AND
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPhone->AddressId = null;
				$objPhone->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Phones
		 * @return void
		*/ 
		public function UnassociateAllPhones() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Phone::LoadArrayByAddressId($this->intId) as $objPhone) {
					$objPhone->AddressId = null;
					$objPhone->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`phone`
				SET
					`address_id` = null
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Phone
		 * @param Phone $objPhone
		 * @return void
		*/ 
		public function DeleteAssociatedPhone(Phone $objPhone) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this unsaved Address.');
			if ((is_null($objPhone->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this Address with an unsaved Phone.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`phone`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPhone->Id) . ' AND
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPhone->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Phones
		 * @return void
		*/ 
		public function DeleteAllPhones() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Phone::LoadArrayByAddressId($this->intId) as $objPhone) {
					$objPhone->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`phone`
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Address"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="AddressTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="Household" type="xsd1:Household"/>';
			$strToReturn .= '<element name="PrimaryPhone" type="xsd1:Phone"/>';
			$strToReturn .= '<element name="Address1" type="xsd:string"/>';
			$strToReturn .= '<element name="Address2" type="xsd:string"/>';
			$strToReturn .= '<element name="Address3" type="xsd:string"/>';
			$strToReturn .= '<element name="City" type="xsd:string"/>';
			$strToReturn .= '<element name="State" type="xsd:string"/>';
			$strToReturn .= '<element name="ZipCode" type="xsd:string"/>';
			$strToReturn .= '<element name="Country" type="xsd:string"/>';
			$strToReturn .= '<element name="CurrentFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="InvalidFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="VerificationCheckedFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="DateUntilWhen" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="InternationalFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Address', $strComplexTypeArray)) {
				$strComplexTypeArray['Address'] = Address::GetSoapComplexTypeXml();
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				Household::AlterSoapComplexTypeArray($strComplexTypeArray);
				Phone::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Address::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Address();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'AddressTypeId'))
				$objToReturn->intAddressTypeId = $objSoapObject->AddressTypeId;
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if ((property_exists($objSoapObject, 'Household')) &&
				($objSoapObject->Household))
				$objToReturn->Household = Household::GetObjectFromSoapObject($objSoapObject->Household);
			if ((property_exists($objSoapObject, 'PrimaryPhone')) &&
				($objSoapObject->PrimaryPhone))
				$objToReturn->PrimaryPhone = Phone::GetObjectFromSoapObject($objSoapObject->PrimaryPhone);
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
			if (property_exists($objSoapObject, 'Country'))
				$objToReturn->strCountry = $objSoapObject->Country;
			if (property_exists($objSoapObject, 'CurrentFlag'))
				$objToReturn->blnCurrentFlag = $objSoapObject->CurrentFlag;
			if (property_exists($objSoapObject, 'InvalidFlag'))
				$objToReturn->blnInvalidFlag = $objSoapObject->InvalidFlag;
			if (property_exists($objSoapObject, 'VerificationCheckedFlag'))
				$objToReturn->blnVerificationCheckedFlag = $objSoapObject->VerificationCheckedFlag;
			if (property_exists($objSoapObject, 'DateUntilWhen'))
				$objToReturn->dttDateUntilWhen = new QDateTime($objSoapObject->DateUntilWhen);
			if (property_exists($objSoapObject, 'InternationalFlag'))
				$objToReturn->blnInternationalFlag = $objSoapObject->InternationalFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Address::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->objHousehold)
				$objObject->objHousehold = Household::GetSoapObjectFromObject($objObject->objHousehold, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intHouseholdId = null;
			if ($objObject->objPrimaryPhone)
				$objObject->objPrimaryPhone = Phone::GetSoapObjectFromObject($objObject->objPrimaryPhone, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPrimaryPhoneId = null;
			if ($objObject->dttDateUntilWhen)
				$objObject->dttDateUntilWhen = $objObject->dttDateUntilWhen->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $AddressTypeId
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $HouseholdId
	 * @property-read QQNodeHousehold $Household
	 * @property-read QQNode $PrimaryPhoneId
	 * @property-read QQNodePhone $PrimaryPhone
	 * @property-read QQNode $Address1
	 * @property-read QQNode $Address2
	 * @property-read QQNode $Address3
	 * @property-read QQNode $City
	 * @property-read QQNode $State
	 * @property-read QQNode $ZipCode
	 * @property-read QQNode $Country
	 * @property-read QQNode $CurrentFlag
	 * @property-read QQNode $InvalidFlag
	 * @property-read QQNode $VerificationCheckedFlag
	 * @property-read QQNode $DateUntilWhen
	 * @property-read QQNode $InternationalFlag
	 * @property-read QQReverseReferenceNodeFormAnswer $FormAnswer
	 * @property-read QQReverseReferenceNodePerson $PersonAsMailing
	 * @property-read QQReverseReferenceNodePerson $PersonAsStewardship
	 * @property-read QQReverseReferenceNodePhone $Phone
	 */
	class QQNodeAddress extends QQNode {
		protected $strTableName = 'address';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Address';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'AddressTypeId':
					return new QQNode('address_type_id', 'AddressTypeId', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'HouseholdId':
					return new QQNode('household_id', 'HouseholdId', 'integer', $this);
				case 'Household':
					return new QQNodeHousehold('household_id', 'Household', 'integer', $this);
				case 'PrimaryPhoneId':
					return new QQNode('primary_phone_id', 'PrimaryPhoneId', 'integer', $this);
				case 'PrimaryPhone':
					return new QQNodePhone('primary_phone_id', 'PrimaryPhone', 'integer', $this);
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
				case 'Country':
					return new QQNode('country', 'Country', 'string', $this);
				case 'CurrentFlag':
					return new QQNode('current_flag', 'CurrentFlag', 'boolean', $this);
				case 'InvalidFlag':
					return new QQNode('invalid_flag', 'InvalidFlag', 'boolean', $this);
				case 'VerificationCheckedFlag':
					return new QQNode('verification_checked_flag', 'VerificationCheckedFlag', 'boolean', $this);
				case 'DateUntilWhen':
					return new QQNode('date_until_when', 'DateUntilWhen', 'QDateTime', $this);
				case 'InternationalFlag':
					return new QQNode('international_flag', 'InternationalFlag', 'boolean', $this);
				case 'FormAnswer':
					return new QQReverseReferenceNodeFormAnswer($this, 'formanswer', 'reverse_reference', 'address_id');
				case 'PersonAsMailing':
					return new QQReverseReferenceNodePerson($this, 'personasmailing', 'reverse_reference', 'mailing_address_id');
				case 'PersonAsStewardship':
					return new QQReverseReferenceNodePerson($this, 'personasstewardship', 'reverse_reference', 'stewardship_address_id');
				case 'Phone':
					return new QQReverseReferenceNodePhone($this, 'phone', 'reverse_reference', 'address_id');

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
	 * @property-read QQNode $AddressTypeId
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $HouseholdId
	 * @property-read QQNodeHousehold $Household
	 * @property-read QQNode $PrimaryPhoneId
	 * @property-read QQNodePhone $PrimaryPhone
	 * @property-read QQNode $Address1
	 * @property-read QQNode $Address2
	 * @property-read QQNode $Address3
	 * @property-read QQNode $City
	 * @property-read QQNode $State
	 * @property-read QQNode $ZipCode
	 * @property-read QQNode $Country
	 * @property-read QQNode $CurrentFlag
	 * @property-read QQNode $InvalidFlag
	 * @property-read QQNode $VerificationCheckedFlag
	 * @property-read QQNode $DateUntilWhen
	 * @property-read QQNode $InternationalFlag
	 * @property-read QQReverseReferenceNodeFormAnswer $FormAnswer
	 * @property-read QQReverseReferenceNodePerson $PersonAsMailing
	 * @property-read QQReverseReferenceNodePerson $PersonAsStewardship
	 * @property-read QQReverseReferenceNodePhone $Phone
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAddress extends QQReverseReferenceNode {
		protected $strTableName = 'address';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Address';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'AddressTypeId':
					return new QQNode('address_type_id', 'AddressTypeId', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'HouseholdId':
					return new QQNode('household_id', 'HouseholdId', 'integer', $this);
				case 'Household':
					return new QQNodeHousehold('household_id', 'Household', 'integer', $this);
				case 'PrimaryPhoneId':
					return new QQNode('primary_phone_id', 'PrimaryPhoneId', 'integer', $this);
				case 'PrimaryPhone':
					return new QQNodePhone('primary_phone_id', 'PrimaryPhone', 'integer', $this);
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
				case 'Country':
					return new QQNode('country', 'Country', 'string', $this);
				case 'CurrentFlag':
					return new QQNode('current_flag', 'CurrentFlag', 'boolean', $this);
				case 'InvalidFlag':
					return new QQNode('invalid_flag', 'InvalidFlag', 'boolean', $this);
				case 'VerificationCheckedFlag':
					return new QQNode('verification_checked_flag', 'VerificationCheckedFlag', 'boolean', $this);
				case 'DateUntilWhen':
					return new QQNode('date_until_when', 'DateUntilWhen', 'QDateTime', $this);
				case 'InternationalFlag':
					return new QQNode('international_flag', 'InternationalFlag', 'boolean', $this);
				case 'FormAnswer':
					return new QQReverseReferenceNodeFormAnswer($this, 'formanswer', 'reverse_reference', 'address_id');
				case 'PersonAsMailing':
					return new QQReverseReferenceNodePerson($this, 'personasmailing', 'reverse_reference', 'mailing_address_id');
				case 'PersonAsStewardship':
					return new QQReverseReferenceNodePerson($this, 'personasstewardship', 'reverse_reference', 'stewardship_address_id');
				case 'Phone':
					return new QQReverseReferenceNodePhone($this, 'phone', 'reverse_reference', 'address_id');

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