<?php
	/**
	 * The abstract ProvisionalPublicLoginGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ProvisionalPublicLogin subclass which
	 * extends this ProvisionalPublicLoginGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ProvisionalPublicLogin class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $PublicLoginId the value for intPublicLoginId (PK)
	 * @property string $FirstName the value for strFirstName 
	 * @property string $LastName the value for strLastName 
	 * @property string $EmailAddress the value for strEmailAddress 
	 * @property string $UrlHash the value for strUrlHash 
	 * @property string $ConfirmationCode the value for strConfirmationCode 
	 * @property PublicLogin $PublicLogin the value for the PublicLogin object referenced by intPublicLoginId (PK)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ProvisionalPublicLoginGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column provisional_public_login.public_login_id
		 * @var integer intPublicLoginId
		 */
		protected $intPublicLoginId;
		const PublicLoginIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intPublicLoginId;
		 */
		protected $__intPublicLoginId;

		/**
		 * Protected member variable that maps to the database column provisional_public_login.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 100;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column provisional_public_login.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 100;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column provisional_public_login.email_address
		 * @var string strEmailAddress
		 */
		protected $strEmailAddress;
		const EmailAddressMaxLength = 100;
		const EmailAddressDefault = null;


		/**
		 * Protected member variable that maps to the database column provisional_public_login.url_hash
		 * @var string strUrlHash
		 */
		protected $strUrlHash;
		const UrlHashMaxLength = 32;
		const UrlHashDefault = null;


		/**
		 * Protected member variable that maps to the database column provisional_public_login.confirmation_code
		 * @var string strConfirmationCode
		 */
		protected $strConfirmationCode;
		const ConfirmationCodeMaxLength = 8;
		const ConfirmationCodeDefault = null;


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
		 * in the database column provisional_public_login.public_login_id.
		 *
		 * NOTE: Always use the PublicLogin property getter to correctly retrieve this PublicLogin object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var PublicLogin objPublicLogin
		 */
		protected $objPublicLogin;





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
		 * Load a ProvisionalPublicLogin from PK Info
		 * @param integer $intPublicLoginId
		 * @return ProvisionalPublicLogin
		 */
		public static function Load($intPublicLoginId) {
			// Use QuerySingle to Perform the Query
			return ProvisionalPublicLogin::QuerySingle(
				QQ::Equal(QQN::ProvisionalPublicLogin()->PublicLoginId, $intPublicLoginId)
			);
		}

		/**
		 * Load all ProvisionalPublicLogins
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProvisionalPublicLogin[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ProvisionalPublicLogin::QueryArray to perform the LoadAll query
			try {
				return ProvisionalPublicLogin::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ProvisionalPublicLogins
		 * @return int
		 */
		public static function CountAll() {
			// Call ProvisionalPublicLogin::QueryCount to perform the CountAll query
			return ProvisionalPublicLogin::QueryCount(QQ::All());
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
			$objDatabase = ProvisionalPublicLogin::GetDatabase();

			// Create/Build out the QueryBuilder object with ProvisionalPublicLogin-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'provisional_public_login');
			ProvisionalPublicLogin::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('provisional_public_login');

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
		 * Static Qcodo Query method to query for a single ProvisionalPublicLogin object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ProvisionalPublicLogin the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProvisionalPublicLogin::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ProvisionalPublicLogin object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ProvisionalPublicLogin::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ProvisionalPublicLogin::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ProvisionalPublicLogin objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ProvisionalPublicLogin[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProvisionalPublicLogin::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ProvisionalPublicLogin::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ProvisionalPublicLogin::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ProvisionalPublicLogin objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProvisionalPublicLogin::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ProvisionalPublicLogin::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'provisional_public_login_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ProvisionalPublicLogin-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ProvisionalPublicLogin::GetSelectFields($objQueryBuilder);
				ProvisionalPublicLogin::GetFromFields($objQueryBuilder);

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
			return ProvisionalPublicLogin::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ProvisionalPublicLogin
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'provisional_public_login';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'public_login_id', $strAliasPrefix . 'public_login_id');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'email_address', $strAliasPrefix . 'email_address');
			$objBuilder->AddSelectItem($strTableName, 'url_hash', $strAliasPrefix . 'url_hash');
			$objBuilder->AddSelectItem($strTableName, 'confirmation_code', $strAliasPrefix . 'confirmation_code');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ProvisionalPublicLogin from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ProvisionalPublicLogin::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ProvisionalPublicLogin
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the ProvisionalPublicLogin object
			$objToReturn = new ProvisionalPublicLogin();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'public_login_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'public_login_id'] : $strAliasPrefix . 'public_login_id';
			$objToReturn->intPublicLoginId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intPublicLoginId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email_address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email_address'] : $strAliasPrefix . 'email_address';
			$objToReturn->strEmailAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'url_hash', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'url_hash'] : $strAliasPrefix . 'url_hash';
			$objToReturn->strUrlHash = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'confirmation_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'confirmation_code'] : $strAliasPrefix . 'confirmation_code';
			$objToReturn->strConfirmationCode = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'provisional_public_login__';

			// Check for PublicLogin Early Binding
			$strAlias = $strAliasPrefix . 'public_login_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPublicLogin = PublicLogin::InstantiateDbRow($objDbRow, $strAliasPrefix . 'public_login_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of ProvisionalPublicLogins from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ProvisionalPublicLogin[]
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
					$objItem = ProvisionalPublicLogin::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ProvisionalPublicLogin::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ProvisionalPublicLogin object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ProvisionalPublicLogin next row resulting from the query
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
			return ProvisionalPublicLogin::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ProvisionalPublicLogin object,
		 * by PublicLoginId Index(es)
		 * @param integer $intPublicLoginId
		 * @return ProvisionalPublicLogin
		*/
		public static function LoadByPublicLoginId($intPublicLoginId, $objOptionalClauses = null) {
			return ProvisionalPublicLogin::QuerySingle(
				QQ::Equal(QQN::ProvisionalPublicLogin()->PublicLoginId, $intPublicLoginId)
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
		 * Save this ProvisionalPublicLogin
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ProvisionalPublicLogin::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `provisional_public_login` (
							`public_login_id`,
							`first_name`,
							`last_name`,
							`email_address`,
							`url_hash`,
							`confirmation_code`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPublicLoginId) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strEmailAddress) . ',
							' . $objDatabase->SqlVariable($this->strUrlHash) . ',
							' . $objDatabase->SqlVariable($this->strConfirmationCode) . '
						)
					');



					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`provisional_public_login`
						SET
							`public_login_id` = ' . $objDatabase->SqlVariable($this->intPublicLoginId) . ',
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`email_address` = ' . $objDatabase->SqlVariable($this->strEmailAddress) . ',
							`url_hash` = ' . $objDatabase->SqlVariable($this->strUrlHash) . ',
							`confirmation_code` = ' . $objDatabase->SqlVariable($this->strConfirmationCode) . '
						WHERE
							`public_login_id` = ' . $objDatabase->SqlVariable($this->__intPublicLoginId) . '
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
			$this->__intPublicLoginId = $this->intPublicLoginId;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this ProvisionalPublicLogin
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intPublicLoginId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ProvisionalPublicLogin with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ProvisionalPublicLogin::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`provisional_public_login`
				WHERE
					`public_login_id` = ' . $objDatabase->SqlVariable($this->intPublicLoginId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ProvisionalPublicLogins
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ProvisionalPublicLogin::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`provisional_public_login`');
		}

		/**
		 * Truncate provisional_public_login table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ProvisionalPublicLogin::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `provisional_public_login`');
		}

		/**
		 * Reload this ProvisionalPublicLogin from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ProvisionalPublicLogin object.');

			// Reload the Object
			$objReloaded = ProvisionalPublicLogin::Load($this->intPublicLoginId);

			// Update $this's local variables to match
			$this->PublicLoginId = $objReloaded->PublicLoginId;
			$this->__intPublicLoginId = $this->intPublicLoginId;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strEmailAddress = $objReloaded->strEmailAddress;
			$this->strUrlHash = $objReloaded->strUrlHash;
			$this->strConfirmationCode = $objReloaded->strConfirmationCode;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ProvisionalPublicLogin::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `provisional_public_login` (
					`public_login_id`,
					`first_name`,
					`last_name`,
					`email_address`,
					`url_hash`,
					`confirmation_code`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intPublicLoginId) . ',
					' . $objDatabase->SqlVariable($this->strFirstName) . ',
					' . $objDatabase->SqlVariable($this->strLastName) . ',
					' . $objDatabase->SqlVariable($this->strEmailAddress) . ',
					' . $objDatabase->SqlVariable($this->strUrlHash) . ',
					' . $objDatabase->SqlVariable($this->strConfirmationCode) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intPublicLoginId
		 * @return ProvisionalPublicLogin[]
		 */
		public static function GetJournalForId($intPublicLoginId) {
			$objDatabase = ProvisionalPublicLogin::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM provisional_public_login WHERE public_login_id = ' .
				$objDatabase->SqlVariable($intPublicLoginId) . ' ORDER BY __sys_date');

			return ProvisionalPublicLogin::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ProvisionalPublicLogin[]
		 */
		public function GetJournal() {
			return ProvisionalPublicLogin::GetJournalForId($this->intPublicLoginId);
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
				case 'PublicLoginId':
					// Gets the value for intPublicLoginId (PK)
					// @return integer
					return $this->intPublicLoginId;

				case 'FirstName':
					// Gets the value for strFirstName 
					// @return string
					return $this->strFirstName;

				case 'LastName':
					// Gets the value for strLastName 
					// @return string
					return $this->strLastName;

				case 'EmailAddress':
					// Gets the value for strEmailAddress 
					// @return string
					return $this->strEmailAddress;

				case 'UrlHash':
					// Gets the value for strUrlHash 
					// @return string
					return $this->strUrlHash;

				case 'ConfirmationCode':
					// Gets the value for strConfirmationCode 
					// @return string
					return $this->strConfirmationCode;


				///////////////////
				// Member Objects
				///////////////////
				case 'PublicLogin':
					// Gets the value for the PublicLogin object referenced by intPublicLoginId (PK)
					// @return PublicLogin
					try {
						if ((!$this->objPublicLogin) && (!is_null($this->intPublicLoginId)))
							$this->objPublicLogin = PublicLogin::Load($this->intPublicLoginId);
						return $this->objPublicLogin;
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
				case 'PublicLoginId':
					// Sets the value for intPublicLoginId (PK)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPublicLogin = null;
						return ($this->intPublicLoginId = QType::Cast($mixValue, QType::Integer));
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

				case 'EmailAddress':
					// Sets the value for strEmailAddress 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEmailAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UrlHash':
					// Sets the value for strUrlHash 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strUrlHash = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ConfirmationCode':
					// Sets the value for strConfirmationCode 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strConfirmationCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'PublicLogin':
					// Sets the value for the PublicLogin object referenced by intPublicLoginId (PK)
					// @param PublicLogin $mixValue
					// @return PublicLogin
					if (is_null($mixValue)) {
						$this->intPublicLoginId = null;
						$this->objPublicLogin = null;
						return null;
					} else {
						// Make sure $mixValue actually is a PublicLogin object
						try {
							$mixValue = QType::Cast($mixValue, 'PublicLogin');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED PublicLogin object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved PublicLogin for this ProvisionalPublicLogin');

						// Update Local Member Variables
						$this->objPublicLogin = $mixValue;
						$this->intPublicLoginId = $mixValue->Id;

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
			$strToReturn = '<complexType name="ProvisionalPublicLogin"><sequence>';
			$strToReturn .= '<element name="PublicLogin" type="xsd1:PublicLogin"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="EmailAddress" type="xsd:string"/>';
			$strToReturn .= '<element name="UrlHash" type="xsd:string"/>';
			$strToReturn .= '<element name="ConfirmationCode" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ProvisionalPublicLogin', $strComplexTypeArray)) {
				$strComplexTypeArray['ProvisionalPublicLogin'] = ProvisionalPublicLogin::GetSoapComplexTypeXml();
				PublicLogin::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ProvisionalPublicLogin::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ProvisionalPublicLogin();
			if ((property_exists($objSoapObject, 'PublicLogin')) &&
				($objSoapObject->PublicLogin))
				$objToReturn->PublicLogin = PublicLogin::GetObjectFromSoapObject($objSoapObject->PublicLogin);
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'EmailAddress'))
				$objToReturn->strEmailAddress = $objSoapObject->EmailAddress;
			if (property_exists($objSoapObject, 'UrlHash'))
				$objToReturn->strUrlHash = $objSoapObject->UrlHash;
			if (property_exists($objSoapObject, 'ConfirmationCode'))
				$objToReturn->strConfirmationCode = $objSoapObject->ConfirmationCode;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ProvisionalPublicLogin::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPublicLogin)
				$objObject->objPublicLogin = PublicLogin::GetSoapObjectFromObject($objObject->objPublicLogin, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPublicLoginId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $PublicLoginId
	 * @property-read QQNodePublicLogin $PublicLogin
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $EmailAddress
	 * @property-read QQNode $UrlHash
	 * @property-read QQNode $ConfirmationCode
	 */
	class QQNodeProvisionalPublicLogin extends QQNode {
		protected $strTableName = 'provisional_public_login';
		protected $strPrimaryKey = 'public_login_id';
		protected $strClassName = 'ProvisionalPublicLogin';
		public function __get($strName) {
			switch ($strName) {
				case 'PublicLoginId':
					return new QQNode('public_login_id', 'PublicLoginId', 'integer', $this);
				case 'PublicLogin':
					return new QQNodePublicLogin('public_login_id', 'PublicLogin', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'EmailAddress':
					return new QQNode('email_address', 'EmailAddress', 'string', $this);
				case 'UrlHash':
					return new QQNode('url_hash', 'UrlHash', 'string', $this);
				case 'ConfirmationCode':
					return new QQNode('confirmation_code', 'ConfirmationCode', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNodePublicLogin('public_login_id', 'PublicLoginId', 'integer', $this);
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
	 * @property-read QQNode $PublicLoginId
	 * @property-read QQNodePublicLogin $PublicLogin
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $EmailAddress
	 * @property-read QQNode $UrlHash
	 * @property-read QQNode $ConfirmationCode
	 * @property-read QQNodePublicLogin $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeProvisionalPublicLogin extends QQReverseReferenceNode {
		protected $strTableName = 'provisional_public_login';
		protected $strPrimaryKey = 'public_login_id';
		protected $strClassName = 'ProvisionalPublicLogin';
		public function __get($strName) {
			switch ($strName) {
				case 'PublicLoginId':
					return new QQNode('public_login_id', 'PublicLoginId', 'integer', $this);
				case 'PublicLogin':
					return new QQNodePublicLogin('public_login_id', 'PublicLogin', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'EmailAddress':
					return new QQNode('email_address', 'EmailAddress', 'string', $this);
				case 'UrlHash':
					return new QQNode('url_hash', 'UrlHash', 'string', $this);
				case 'ConfirmationCode':
					return new QQNode('confirmation_code', 'ConfirmationCode', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNodePublicLogin('public_login_id', 'PublicLoginId', 'integer', $this);
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