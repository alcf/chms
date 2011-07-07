<?php
	/**
	 * The abstract PublicLoginGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the PublicLogin subclass which
	 * extends this PublicLoginGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PublicLogin class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $PersonId the value for intPersonId (Unique)
	 * @property boolean $ActiveFlag the value for blnActiveFlag 
	 * @property boolean $NewPersonFlag the value for blnNewPersonFlag 
	 * @property string $Username the value for strUsername (Unique)
	 * @property string $Password the value for strPassword 
	 * @property string $LostPasswordQuestion the value for strLostPasswordQuestion 
	 * @property string $LostPasswordAnswer the value for strLostPasswordAnswer 
	 * @property boolean $TemporaryPasswordFlag the value for blnTemporaryPasswordFlag 
	 * @property QDateTime $DateRegistered the value for dttDateRegistered (Not Null)
	 * @property QDateTime $DateLastLogin the value for dttDateLastLogin (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Unique)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PublicLoginGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column public_login.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column public_login.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column public_login.active_flag
		 * @var boolean blnActiveFlag
		 */
		protected $blnActiveFlag;
		const ActiveFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column public_login.new_person_flag
		 * @var boolean blnNewPersonFlag
		 */
		protected $blnNewPersonFlag;
		const NewPersonFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column public_login.username
		 * @var string strUsername
		 */
		protected $strUsername;
		const UsernameMaxLength = 20;
		const UsernameDefault = null;


		/**
		 * Protected member variable that maps to the database column public_login.password
		 * @var string strPassword
		 */
		protected $strPassword;
		const PasswordMaxLength = 32;
		const PasswordDefault = null;


		/**
		 * Protected member variable that maps to the database column public_login.lost_password_question
		 * @var string strLostPasswordQuestion
		 */
		protected $strLostPasswordQuestion;
		const LostPasswordQuestionMaxLength = 255;
		const LostPasswordQuestionDefault = null;


		/**
		 * Protected member variable that maps to the database column public_login.lost_password_answer
		 * @var string strLostPasswordAnswer
		 */
		protected $strLostPasswordAnswer;
		const LostPasswordAnswerMaxLength = 255;
		const LostPasswordAnswerDefault = null;


		/**
		 * Protected member variable that maps to the database column public_login.temporary_password_flag
		 * @var boolean blnTemporaryPasswordFlag
		 */
		protected $blnTemporaryPasswordFlag;
		const TemporaryPasswordFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column public_login.date_registered
		 * @var QDateTime dttDateRegistered
		 */
		protected $dttDateRegistered;
		const DateRegisteredDefault = null;


		/**
		 * Protected member variable that maps to the database column public_login.date_last_login
		 * @var QDateTime dttDateLastLogin
		 */
		protected $dttDateLastLogin;
		const DateLastLoginDefault = null;


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
		 * in the database column public_login.person_id.
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
		 * Load a PublicLogin from PK Info
		 * @param integer $intId
		 * @return PublicLogin
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return PublicLogin::QuerySingle(
				QQ::Equal(QQN::PublicLogin()->Id, $intId)
			);
		}

		/**
		 * Load all PublicLogins
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PublicLogin[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call PublicLogin::QueryArray to perform the LoadAll query
			try {
				return PublicLogin::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all PublicLogins
		 * @return int
		 */
		public static function CountAll() {
			// Call PublicLogin::QueryCount to perform the CountAll query
			return PublicLogin::QueryCount(QQ::All());
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
			$objDatabase = PublicLogin::GetDatabase();

			// Create/Build out the QueryBuilder object with PublicLogin-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'public_login');
			PublicLogin::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('public_login');

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
		 * Static Qcodo Query method to query for a single PublicLogin object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PublicLogin the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PublicLogin::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new PublicLogin object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = PublicLogin::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return PublicLogin::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of PublicLogin objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PublicLogin[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PublicLogin::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PublicLogin::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = PublicLogin::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of PublicLogin objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PublicLogin::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = PublicLogin::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'public_login_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with PublicLogin-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				PublicLogin::GetSelectFields($objQueryBuilder);
				PublicLogin::GetFromFields($objQueryBuilder);

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
			return PublicLogin::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this PublicLogin
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'public_login';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'active_flag', $strAliasPrefix . 'active_flag');
			$objBuilder->AddSelectItem($strTableName, 'new_person_flag', $strAliasPrefix . 'new_person_flag');
			$objBuilder->AddSelectItem($strTableName, 'username', $strAliasPrefix . 'username');
			$objBuilder->AddSelectItem($strTableName, 'password', $strAliasPrefix . 'password');
			$objBuilder->AddSelectItem($strTableName, 'lost_password_question', $strAliasPrefix . 'lost_password_question');
			$objBuilder->AddSelectItem($strTableName, 'lost_password_answer', $strAliasPrefix . 'lost_password_answer');
			$objBuilder->AddSelectItem($strTableName, 'temporary_password_flag', $strAliasPrefix . 'temporary_password_flag');
			$objBuilder->AddSelectItem($strTableName, 'date_registered', $strAliasPrefix . 'date_registered');
			$objBuilder->AddSelectItem($strTableName, 'date_last_login', $strAliasPrefix . 'date_last_login');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a PublicLogin from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this PublicLogin::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return PublicLogin
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the PublicLogin object
			$objToReturn = new PublicLogin();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'active_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'active_flag'] : $strAliasPrefix . 'active_flag';
			$objToReturn->blnActiveFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'new_person_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'new_person_flag'] : $strAliasPrefix . 'new_person_flag';
			$objToReturn->blnNewPersonFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'username', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'username'] : $strAliasPrefix . 'username';
			$objToReturn->strUsername = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'password', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'password'] : $strAliasPrefix . 'password';
			$objToReturn->strPassword = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'lost_password_question', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'lost_password_question'] : $strAliasPrefix . 'lost_password_question';
			$objToReturn->strLostPasswordQuestion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'lost_password_answer', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'lost_password_answer'] : $strAliasPrefix . 'lost_password_answer';
			$objToReturn->strLostPasswordAnswer = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'temporary_password_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'temporary_password_flag'] : $strAliasPrefix . 'temporary_password_flag';
			$objToReturn->blnTemporaryPasswordFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_registered', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_registered'] : $strAliasPrefix . 'date_registered';
			$objToReturn->dttDateRegistered = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_last_login', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_last_login'] : $strAliasPrefix . 'date_last_login';
			$objToReturn->dttDateLastLogin = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'public_login__';

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of PublicLogins from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return PublicLogin[]
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
					$objItem = PublicLogin::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = PublicLogin::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single PublicLogin object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return PublicLogin next row resulting from the query
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
			return PublicLogin::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single PublicLogin object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return PublicLogin
		*/
		public static function LoadById($intId) {
			return PublicLogin::QuerySingle(
				QQ::Equal(QQN::PublicLogin()->Id, $intId)
			);
		}
			
		/**
		 * Load a single PublicLogin object,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return PublicLogin
		*/
		public static function LoadByPersonId($intPersonId) {
			return PublicLogin::QuerySingle(
				QQ::Equal(QQN::PublicLogin()->PersonId, $intPersonId)
			);
		}
			
		/**
		 * Load a single PublicLogin object,
		 * by Username Index(es)
		 * @param string $strUsername
		 * @return PublicLogin
		*/
		public static function LoadByUsername($strUsername) {
			return PublicLogin::QuerySingle(
				QQ::Equal(QQN::PublicLogin()->Username, $strUsername)
			);
		}
			
		/**
		 * Load an array of PublicLogin objects,
		 * by NewPersonFlag Index(es)
		 * @param boolean $blnNewPersonFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PublicLogin[]
		*/
		public static function LoadArrayByNewPersonFlag($blnNewPersonFlag, $objOptionalClauses = null) {
			// Call PublicLogin::QueryArray to perform the LoadArrayByNewPersonFlag query
			try {
				return PublicLogin::QueryArray(
					QQ::Equal(QQN::PublicLogin()->NewPersonFlag, $blnNewPersonFlag),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PublicLogins
		 * by NewPersonFlag Index(es)
		 * @param boolean $blnNewPersonFlag
		 * @return int
		*/
		public static function CountByNewPersonFlag($blnNewPersonFlag) {
			// Call PublicLogin::QueryCount to perform the CountByNewPersonFlag query
			return PublicLogin::QueryCount(
				QQ::Equal(QQN::PublicLogin()->NewPersonFlag, $blnNewPersonFlag)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this PublicLogin
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = PublicLogin::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `public_login` (
							`person_id`,
							`active_flag`,
							`new_person_flag`,
							`username`,
							`password`,
							`lost_password_question`,
							`lost_password_answer`,
							`temporary_password_flag`,
							`date_registered`,
							`date_last_login`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
							' . $objDatabase->SqlVariable($this->blnNewPersonFlag) . ',
							' . $objDatabase->SqlVariable($this->strUsername) . ',
							' . $objDatabase->SqlVariable($this->strPassword) . ',
							' . $objDatabase->SqlVariable($this->strLostPasswordQuestion) . ',
							' . $objDatabase->SqlVariable($this->strLostPasswordAnswer) . ',
							' . $objDatabase->SqlVariable($this->blnTemporaryPasswordFlag) . ',
							' . $objDatabase->SqlVariable($this->dttDateRegistered) . ',
							' . $objDatabase->SqlVariable($this->dttDateLastLogin) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('public_login', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`public_login`
						SET
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`active_flag` = ' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
							`new_person_flag` = ' . $objDatabase->SqlVariable($this->blnNewPersonFlag) . ',
							`username` = ' . $objDatabase->SqlVariable($this->strUsername) . ',
							`password` = ' . $objDatabase->SqlVariable($this->strPassword) . ',
							`lost_password_question` = ' . $objDatabase->SqlVariable($this->strLostPasswordQuestion) . ',
							`lost_password_answer` = ' . $objDatabase->SqlVariable($this->strLostPasswordAnswer) . ',
							`temporary_password_flag` = ' . $objDatabase->SqlVariable($this->blnTemporaryPasswordFlag) . ',
							`date_registered` = ' . $objDatabase->SqlVariable($this->dttDateRegistered) . ',
							`date_last_login` = ' . $objDatabase->SqlVariable($this->dttDateLastLogin) . '
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
		 * Delete this PublicLogin
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this PublicLogin with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = PublicLogin::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`public_login`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all PublicLogins
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = PublicLogin::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`public_login`');
		}

		/**
		 * Truncate public_login table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = PublicLogin::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `public_login`');
		}

		/**
		 * Reload this PublicLogin from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved PublicLogin object.');

			// Reload the Object
			$objReloaded = PublicLogin::Load($this->intId);

			// Update $this's local variables to match
			$this->PersonId = $objReloaded->PersonId;
			$this->blnActiveFlag = $objReloaded->blnActiveFlag;
			$this->blnNewPersonFlag = $objReloaded->blnNewPersonFlag;
			$this->strUsername = $objReloaded->strUsername;
			$this->strPassword = $objReloaded->strPassword;
			$this->strLostPasswordQuestion = $objReloaded->strLostPasswordQuestion;
			$this->strLostPasswordAnswer = $objReloaded->strLostPasswordAnswer;
			$this->blnTemporaryPasswordFlag = $objReloaded->blnTemporaryPasswordFlag;
			$this->dttDateRegistered = $objReloaded->dttDateRegistered;
			$this->dttDateLastLogin = $objReloaded->dttDateLastLogin;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = PublicLogin::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `public_login` (
					`id`,
					`person_id`,
					`active_flag`,
					`new_person_flag`,
					`username`,
					`password`,
					`lost_password_question`,
					`lost_password_answer`,
					`temporary_password_flag`,
					`date_registered`,
					`date_last_login`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
					' . $objDatabase->SqlVariable($this->blnNewPersonFlag) . ',
					' . $objDatabase->SqlVariable($this->strUsername) . ',
					' . $objDatabase->SqlVariable($this->strPassword) . ',
					' . $objDatabase->SqlVariable($this->strLostPasswordQuestion) . ',
					' . $objDatabase->SqlVariable($this->strLostPasswordAnswer) . ',
					' . $objDatabase->SqlVariable($this->blnTemporaryPasswordFlag) . ',
					' . $objDatabase->SqlVariable($this->dttDateRegistered) . ',
					' . $objDatabase->SqlVariable($this->dttDateLastLogin) . ',
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
		 * @return PublicLogin[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = PublicLogin::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM public_login WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return PublicLogin::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return PublicLogin[]
		 */
		public function GetJournal() {
			return PublicLogin::GetJournalForId($this->intId);
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

				case 'PersonId':
					// Gets the value for intPersonId (Unique)
					// @return integer
					return $this->intPersonId;

				case 'ActiveFlag':
					// Gets the value for blnActiveFlag 
					// @return boolean
					return $this->blnActiveFlag;

				case 'NewPersonFlag':
					// Gets the value for blnNewPersonFlag 
					// @return boolean
					return $this->blnNewPersonFlag;

				case 'Username':
					// Gets the value for strUsername (Unique)
					// @return string
					return $this->strUsername;

				case 'Password':
					// Gets the value for strPassword 
					// @return string
					return $this->strPassword;

				case 'LostPasswordQuestion':
					// Gets the value for strLostPasswordQuestion 
					// @return string
					return $this->strLostPasswordQuestion;

				case 'LostPasswordAnswer':
					// Gets the value for strLostPasswordAnswer 
					// @return string
					return $this->strLostPasswordAnswer;

				case 'TemporaryPasswordFlag':
					// Gets the value for blnTemporaryPasswordFlag 
					// @return boolean
					return $this->blnTemporaryPasswordFlag;

				case 'DateRegistered':
					// Gets the value for dttDateRegistered (Not Null)
					// @return QDateTime
					return $this->dttDateRegistered;

				case 'DateLastLogin':
					// Gets the value for dttDateLastLogin (Not Null)
					// @return QDateTime
					return $this->dttDateLastLogin;


				///////////////////
				// Member Objects
				///////////////////
				case 'Person':
					// Gets the value for the Person object referenced by intPersonId (Unique)
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
				case 'PersonId':
					// Sets the value for intPersonId (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPerson = null;
						return ($this->intPersonId = QType::Cast($mixValue, QType::Integer));
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

				case 'NewPersonFlag':
					// Sets the value for blnNewPersonFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnNewPersonFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Username':
					// Sets the value for strUsername (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strUsername = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Password':
					// Sets the value for strPassword 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPassword = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LostPasswordQuestion':
					// Sets the value for strLostPasswordQuestion 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLostPasswordQuestion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LostPasswordAnswer':
					// Sets the value for strLostPasswordAnswer 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLostPasswordAnswer = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TemporaryPasswordFlag':
					// Sets the value for blnTemporaryPasswordFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnTemporaryPasswordFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateRegistered':
					// Sets the value for dttDateRegistered (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateRegistered = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateLastLogin':
					// Sets the value for dttDateLastLogin (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateLastLogin = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Person':
					// Sets the value for the Person object referenced by intPersonId (Unique)
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
							throw new QCallerException('Unable to set an unsaved Person for this PublicLogin');

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
			$strToReturn = '<complexType name="PublicLogin"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="ActiveFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="NewPersonFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Username" type="xsd:string"/>';
			$strToReturn .= '<element name="Password" type="xsd:string"/>';
			$strToReturn .= '<element name="LostPasswordQuestion" type="xsd:string"/>';
			$strToReturn .= '<element name="LostPasswordAnswer" type="xsd:string"/>';
			$strToReturn .= '<element name="TemporaryPasswordFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="DateRegistered" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateLastLogin" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('PublicLogin', $strComplexTypeArray)) {
				$strComplexTypeArray['PublicLogin'] = PublicLogin::GetSoapComplexTypeXml();
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, PublicLogin::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new PublicLogin();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if (property_exists($objSoapObject, 'ActiveFlag'))
				$objToReturn->blnActiveFlag = $objSoapObject->ActiveFlag;
			if (property_exists($objSoapObject, 'NewPersonFlag'))
				$objToReturn->blnNewPersonFlag = $objSoapObject->NewPersonFlag;
			if (property_exists($objSoapObject, 'Username'))
				$objToReturn->strUsername = $objSoapObject->Username;
			if (property_exists($objSoapObject, 'Password'))
				$objToReturn->strPassword = $objSoapObject->Password;
			if (property_exists($objSoapObject, 'LostPasswordQuestion'))
				$objToReturn->strLostPasswordQuestion = $objSoapObject->LostPasswordQuestion;
			if (property_exists($objSoapObject, 'LostPasswordAnswer'))
				$objToReturn->strLostPasswordAnswer = $objSoapObject->LostPasswordAnswer;
			if (property_exists($objSoapObject, 'TemporaryPasswordFlag'))
				$objToReturn->blnTemporaryPasswordFlag = $objSoapObject->TemporaryPasswordFlag;
			if (property_exists($objSoapObject, 'DateRegistered'))
				$objToReturn->dttDateRegistered = new QDateTime($objSoapObject->DateRegistered);
			if (property_exists($objSoapObject, 'DateLastLogin'))
				$objToReturn->dttDateLastLogin = new QDateTime($objSoapObject->DateLastLogin);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, PublicLogin::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->dttDateRegistered)
				$objObject->dttDateRegistered = $objObject->dttDateRegistered->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateLastLogin)
				$objObject->dttDateLastLogin = $objObject->dttDateLastLogin->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $ActiveFlag
	 * @property-read QQNode $NewPersonFlag
	 * @property-read QQNode $Username
	 * @property-read QQNode $Password
	 * @property-read QQNode $LostPasswordQuestion
	 * @property-read QQNode $LostPasswordAnswer
	 * @property-read QQNode $TemporaryPasswordFlag
	 * @property-read QQNode $DateRegistered
	 * @property-read QQNode $DateLastLogin
	 */
	class QQNodePublicLogin extends QQNode {
		protected $strTableName = 'public_login';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PublicLogin';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'NewPersonFlag':
					return new QQNode('new_person_flag', 'NewPersonFlag', 'boolean', $this);
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'LostPasswordQuestion':
					return new QQNode('lost_password_question', 'LostPasswordQuestion', 'string', $this);
				case 'LostPasswordAnswer':
					return new QQNode('lost_password_answer', 'LostPasswordAnswer', 'string', $this);
				case 'TemporaryPasswordFlag':
					return new QQNode('temporary_password_flag', 'TemporaryPasswordFlag', 'boolean', $this);
				case 'DateRegistered':
					return new QQNode('date_registered', 'DateRegistered', 'QDateTime', $this);
				case 'DateLastLogin':
					return new QQNode('date_last_login', 'DateLastLogin', 'QDateTime', $this);

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
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $ActiveFlag
	 * @property-read QQNode $NewPersonFlag
	 * @property-read QQNode $Username
	 * @property-read QQNode $Password
	 * @property-read QQNode $LostPasswordQuestion
	 * @property-read QQNode $LostPasswordAnswer
	 * @property-read QQNode $TemporaryPasswordFlag
	 * @property-read QQNode $DateRegistered
	 * @property-read QQNode $DateLastLogin
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodePublicLogin extends QQReverseReferenceNode {
		protected $strTableName = 'public_login';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PublicLogin';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'NewPersonFlag':
					return new QQNode('new_person_flag', 'NewPersonFlag', 'boolean', $this);
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'LostPasswordQuestion':
					return new QQNode('lost_password_question', 'LostPasswordQuestion', 'string', $this);
				case 'LostPasswordAnswer':
					return new QQNode('lost_password_answer', 'LostPasswordAnswer', 'string', $this);
				case 'TemporaryPasswordFlag':
					return new QQNode('temporary_password_flag', 'TemporaryPasswordFlag', 'boolean', $this);
				case 'DateRegistered':
					return new QQNode('date_registered', 'DateRegistered', 'QDateTime', $this);
				case 'DateLastLogin':
					return new QQNode('date_last_login', 'DateLastLogin', 'QDateTime', $this);

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