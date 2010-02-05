<?php
	/**
	 * The abstract PhoneGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Phone subclass which
	 * extends this PhoneGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Phone class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $PhoneTypeId the value for intPhoneTypeId (Not Null)
	 * @property integer $AddressId the value for intAddressId 
	 * @property integer $PersonId the value for intPersonId 
	 * @property string $Number the value for strNumber 
	 * @property boolean $PrimaryFlag the value for blnPrimaryFlag 
	 * @property Address $Address the value for the Address object referenced by intAddressId 
	 * @property Person $Person the value for the Person object referenced by intPersonId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PhoneGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column phone.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column phone.phone_type_id
		 * @var integer intPhoneTypeId
		 */
		protected $intPhoneTypeId;
		const PhoneTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column phone.address_id
		 * @var integer intAddressId
		 */
		protected $intAddressId;
		const AddressIdDefault = null;


		/**
		 * Protected member variable that maps to the database column phone.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column phone.number
		 * @var string strNumber
		 */
		protected $strNumber;
		const NumberMaxLength = 20;
		const NumberDefault = null;


		/**
		 * Protected member variable that maps to the database column phone.primary_flag
		 * @var boolean blnPrimaryFlag
		 */
		protected $blnPrimaryFlag;
		const PrimaryFlagDefault = null;


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
		 * in the database column phone.address_id.
		 *
		 * NOTE: Always use the Address property getter to correctly retrieve this Address object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Address objAddress
		 */
		protected $objAddress;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column phone.person_id.
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
		 * Load a Phone from PK Info
		 * @param integer $intId
		 * @return Phone
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Phone::QuerySingle(
				QQ::Equal(QQN::Phone()->Id, $intId)
			);
		}

		/**
		 * Load all Phones
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Phone[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Phone::QueryArray to perform the LoadAll query
			try {
				return Phone::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Phones
		 * @return int
		 */
		public static function CountAll() {
			// Call Phone::QueryCount to perform the CountAll query
			return Phone::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = Phone::GetDatabase();

			// Create/Build out the QueryBuilder object with Phone-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'phone');
			Phone::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('phone');

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
		 * Static Qcodo Query method to query for a single Phone object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Phone the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Phone::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Phone object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Phone::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of Phone objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Phone[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Phone::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Phone::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for a count of Phone objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Phone::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Phone::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'phone_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Phone-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Phone::GetSelectFields($objQueryBuilder);
				Phone::GetFromFields($objQueryBuilder);

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
			return Phone::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Phone
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'phone';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'phone_type_id', $strAliasPrefix . 'phone_type_id');
			$objBuilder->AddSelectItem($strTableName, 'address_id', $strAliasPrefix . 'address_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'number', $strAliasPrefix . 'number');
			$objBuilder->AddSelectItem($strTableName, 'primary_flag', $strAliasPrefix . 'primary_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Phone from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Phone::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Phone
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the Phone object
			$objToReturn = new Phone();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'phone_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'phone_type_id'] : $strAliasPrefix . 'phone_type_id';
			$objToReturn->intPhoneTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_id'] : $strAliasPrefix . 'address_id';
			$objToReturn->intAddressId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'number'] : $strAliasPrefix . 'number';
			$objToReturn->strNumber = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'primary_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'primary_flag'] : $strAliasPrefix . 'primary_flag';
			$objToReturn->blnPrimaryFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'phone__';

			// Check for Address Early Binding
			$strAlias = $strAliasPrefix . 'address_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAddress = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Phones from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Phone[]
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
					$objItem = Phone::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Phone::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Phone object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Phone
		*/
		public static function LoadById($intId) {
			return Phone::QuerySingle(
				QQ::Equal(QQN::Phone()->Id, $intId)
			);
		}
			
		/**
		 * Load a single Phone object,
		 * by AddressId, PrimaryFlag Index(es)
		 * @param integer $intAddressId
		 * @param boolean $blnPrimaryFlag
		 * @return Phone
		*/
		public static function LoadByAddressIdPrimaryFlag($intAddressId, $blnPrimaryFlag) {
			return Phone::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::Phone()->AddressId, $intAddressId),
				QQ::Equal(QQN::Phone()->PrimaryFlag, $blnPrimaryFlag)
				)
			);
		}
			
		/**
		 * Load a single Phone object,
		 * by PersonId, PrimaryFlag Index(es)
		 * @param integer $intPersonId
		 * @param boolean $blnPrimaryFlag
		 * @return Phone
		*/
		public static function LoadByPersonIdPrimaryFlag($intPersonId, $blnPrimaryFlag) {
			return Phone::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::Phone()->PersonId, $intPersonId),
				QQ::Equal(QQN::Phone()->PrimaryFlag, $blnPrimaryFlag)
				)
			);
		}
			
		/**
		 * Load an array of Phone objects,
		 * by PhoneTypeId Index(es)
		 * @param integer $intPhoneTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Phone[]
		*/
		public static function LoadArrayByPhoneTypeId($intPhoneTypeId, $objOptionalClauses = null) {
			// Call Phone::QueryArray to perform the LoadArrayByPhoneTypeId query
			try {
				return Phone::QueryArray(
					QQ::Equal(QQN::Phone()->PhoneTypeId, $intPhoneTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Phones
		 * by PhoneTypeId Index(es)
		 * @param integer $intPhoneTypeId
		 * @return int
		*/
		public static function CountByPhoneTypeId($intPhoneTypeId) {
			// Call Phone::QueryCount to perform the CountByPhoneTypeId query
			return Phone::QueryCount(
				QQ::Equal(QQN::Phone()->PhoneTypeId, $intPhoneTypeId)
			);
		}
			
		/**
		 * Load an array of Phone objects,
		 * by AddressId Index(es)
		 * @param integer $intAddressId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Phone[]
		*/
		public static function LoadArrayByAddressId($intAddressId, $objOptionalClauses = null) {
			// Call Phone::QueryArray to perform the LoadArrayByAddressId query
			try {
				return Phone::QueryArray(
					QQ::Equal(QQN::Phone()->AddressId, $intAddressId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Phones
		 * by AddressId Index(es)
		 * @param integer $intAddressId
		 * @return int
		*/
		public static function CountByAddressId($intAddressId) {
			// Call Phone::QueryCount to perform the CountByAddressId query
			return Phone::QueryCount(
				QQ::Equal(QQN::Phone()->AddressId, $intAddressId)
			);
		}
			
		/**
		 * Load an array of Phone objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Phone[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call Phone::QueryArray to perform the LoadArrayByPersonId query
			try {
				return Phone::QueryArray(
					QQ::Equal(QQN::Phone()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Phones
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call Phone::QueryCount to perform the CountByPersonId query
			return Phone::QueryCount(
				QQ::Equal(QQN::Phone()->PersonId, $intPersonId)
			);
		}
			
		/**
		 * Load an array of Phone objects,
		 * by Number Index(es)
		 * @param string $strNumber
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Phone[]
		*/
		public static function LoadArrayByNumber($strNumber, $objOptionalClauses = null) {
			// Call Phone::QueryArray to perform the LoadArrayByNumber query
			try {
				return Phone::QueryArray(
					QQ::Equal(QQN::Phone()->Number, $strNumber),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Phones
		 * by Number Index(es)
		 * @param string $strNumber
		 * @return int
		*/
		public static function CountByNumber($strNumber) {
			// Call Phone::QueryCount to perform the CountByNumber query
			return Phone::QueryCount(
				QQ::Equal(QQN::Phone()->Number, $strNumber)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Phone
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Phone::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `phone` (
							`phone_type_id`,
							`address_id`,
							`person_id`,
							`number`,
							`primary_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPhoneTypeId) . ',
							' . $objDatabase->SqlVariable($this->intAddressId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->strNumber) . ',
							' . $objDatabase->SqlVariable($this->blnPrimaryFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('phone', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`phone`
						SET
							`phone_type_id` = ' . $objDatabase->SqlVariable($this->intPhoneTypeId) . ',
							`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`number` = ' . $objDatabase->SqlVariable($this->strNumber) . ',
							`primary_flag` = ' . $objDatabase->SqlVariable($this->blnPrimaryFlag) . '
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
		 * Delete this Phone
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Phone with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Phone::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`phone`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all Phones
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Phone::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`phone`');
		}

		/**
		 * Truncate phone table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Phone::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `phone`');
		}

		/**
		 * Reload this Phone from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Phone object.');

			// Reload the Object
			$objReloaded = Phone::Load($this->intId);

			// Update $this's local variables to match
			$this->PhoneTypeId = $objReloaded->PhoneTypeId;
			$this->AddressId = $objReloaded->AddressId;
			$this->PersonId = $objReloaded->PersonId;
			$this->strNumber = $objReloaded->strNumber;
			$this->blnPrimaryFlag = $objReloaded->blnPrimaryFlag;
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

				case 'PhoneTypeId':
					// Gets the value for intPhoneTypeId (Not Null)
					// @return integer
					return $this->intPhoneTypeId;

				case 'AddressId':
					// Gets the value for intAddressId 
					// @return integer
					return $this->intAddressId;

				case 'PersonId':
					// Gets the value for intPersonId 
					// @return integer
					return $this->intPersonId;

				case 'Number':
					// Gets the value for strNumber 
					// @return string
					return $this->strNumber;

				case 'PrimaryFlag':
					// Gets the value for blnPrimaryFlag 
					// @return boolean
					return $this->blnPrimaryFlag;


				///////////////////
				// Member Objects
				///////////////////
				case 'Address':
					// Gets the value for the Address object referenced by intAddressId 
					// @return Address
					try {
						if ((!$this->objAddress) && (!is_null($this->intAddressId)))
							$this->objAddress = Address::Load($this->intAddressId);
						return $this->objAddress;
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
				case 'PhoneTypeId':
					// Sets the value for intPhoneTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intPhoneTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AddressId':
					// Sets the value for intAddressId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAddress = null;
						return ($this->intAddressId = QType::Cast($mixValue, QType::Integer));
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

				case 'Number':
					// Sets the value for strNumber 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strNumber = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimaryFlag':
					// Sets the value for blnPrimaryFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnPrimaryFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Address':
					// Sets the value for the Address object referenced by intAddressId 
					// @param Address $mixValue
					// @return Address
					if (is_null($mixValue)) {
						$this->intAddressId = null;
						$this->objAddress = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Address object
						try {
							$mixValue = QType::Cast($mixValue, 'Address');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Address object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Address for this Phone');

						// Update Local Member Variables
						$this->objAddress = $mixValue;
						$this->intAddressId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Person for this Phone');

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
			$strToReturn = '<complexType name="Phone"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="PhoneTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Address" type="xsd1:Address"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="Number" type="xsd:string"/>';
			$strToReturn .= '<element name="PrimaryFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Phone', $strComplexTypeArray)) {
				$strComplexTypeArray['Phone'] = Phone::GetSoapComplexTypeXml();
				Address::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Phone::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Phone();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'PhoneTypeId'))
				$objToReturn->intPhoneTypeId = $objSoapObject->PhoneTypeId;
			if ((property_exists($objSoapObject, 'Address')) &&
				($objSoapObject->Address))
				$objToReturn->Address = Address::GetObjectFromSoapObject($objSoapObject->Address);
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if (property_exists($objSoapObject, 'Number'))
				$objToReturn->strNumber = $objSoapObject->Number;
			if (property_exists($objSoapObject, 'PrimaryFlag'))
				$objToReturn->blnPrimaryFlag = $objSoapObject->PrimaryFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Phone::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objAddress)
				$objObject->objAddress = Address::GetSoapObjectFromObject($objObject->objAddress, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAddressId = null;
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

	class QQNodePhone extends QQNode {
		protected $strTableName = 'phone';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Phone';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PhoneTypeId':
					return new QQNode('phone_type_id', 'PhoneTypeId', 'integer', $this);
				case 'AddressId':
					return new QQNode('address_id', 'AddressId', 'integer', $this);
				case 'Address':
					return new QQNodeAddress('address_id', 'Address', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'Number':
					return new QQNode('number', 'Number', 'string', $this);
				case 'PrimaryFlag':
					return new QQNode('primary_flag', 'PrimaryFlag', 'boolean', $this);

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

	class QQReverseReferenceNodePhone extends QQReverseReferenceNode {
		protected $strTableName = 'phone';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Phone';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PhoneTypeId':
					return new QQNode('phone_type_id', 'PhoneTypeId', 'integer', $this);
				case 'AddressId':
					return new QQNode('address_id', 'AddressId', 'integer', $this);
				case 'Address':
					return new QQNodeAddress('address_id', 'Address', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'Number':
					return new QQNode('number', 'Number', 'string', $this);
				case 'PrimaryFlag':
					return new QQNode('primary_flag', 'PrimaryFlag', 'boolean', $this);

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