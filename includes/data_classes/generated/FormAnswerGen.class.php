<?php
	/**
	 * The abstract FormAnswerGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FormAnswer subclass which
	 * extends this FormAnswerGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FormAnswer class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $SignupEntryId the value for intSignupEntryId (Not Null)
	 * @property integer $FormQuestionId the value for intFormQuestionId (Not Null)
	 * @property string $TextValue the value for strTextValue 
	 * @property integer $AddressId the value for intAddressId 
	 * @property integer $IntegerValue the value for intIntegerValue 
	 * @property boolean $BooleanValue the value for blnBooleanValue 
	 * @property QDateTime $DateValue the value for dttDateValue 
	 * @property SignupEntry $SignupEntry the value for the SignupEntry object referenced by intSignupEntryId (Not Null)
	 * @property FormQuestion $FormQuestion the value for the FormQuestion object referenced by intFormQuestionId (Not Null)
	 * @property Address $Address the value for the Address object referenced by intAddressId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FormAnswerGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column form_answer.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_answer.signup_entry_id
		 * @var integer intSignupEntryId
		 */
		protected $intSignupEntryId;
		const SignupEntryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_answer.form_question_id
		 * @var integer intFormQuestionId
		 */
		protected $intFormQuestionId;
		const FormQuestionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_answer.text_value
		 * @var string strTextValue
		 */
		protected $strTextValue;
		const TextValueDefault = null;


		/**
		 * Protected member variable that maps to the database column form_answer.address_id
		 * @var integer intAddressId
		 */
		protected $intAddressId;
		const AddressIdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_answer.integer_value
		 * @var integer intIntegerValue
		 */
		protected $intIntegerValue;
		const IntegerValueDefault = null;


		/**
		 * Protected member variable that maps to the database column form_answer.boolean_value
		 * @var boolean blnBooleanValue
		 */
		protected $blnBooleanValue;
		const BooleanValueDefault = null;


		/**
		 * Protected member variable that maps to the database column form_answer.date_value
		 * @var QDateTime dttDateValue
		 */
		protected $dttDateValue;
		const DateValueDefault = null;


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
		 * in the database column form_answer.signup_entry_id.
		 *
		 * NOTE: Always use the SignupEntry property getter to correctly retrieve this SignupEntry object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SignupEntry objSignupEntry
		 */
		protected $objSignupEntry;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column form_answer.form_question_id.
		 *
		 * NOTE: Always use the FormQuestion property getter to correctly retrieve this FormQuestion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FormQuestion objFormQuestion
		 */
		protected $objFormQuestion;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column form_answer.address_id.
		 *
		 * NOTE: Always use the Address property getter to correctly retrieve this Address object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Address objAddress
		 */
		protected $objAddress;





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
		 * Load a FormAnswer from PK Info
		 * @param integer $intId
		 * @return FormAnswer
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return FormAnswer::QuerySingle(
				QQ::Equal(QQN::FormAnswer()->Id, $intId)
			);
		}

		/**
		 * Load all FormAnswers
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormAnswer[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call FormAnswer::QueryArray to perform the LoadAll query
			try {
				return FormAnswer::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FormAnswers
		 * @return int
		 */
		public static function CountAll() {
			// Call FormAnswer::QueryCount to perform the CountAll query
			return FormAnswer::QueryCount(QQ::All());
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
			$objDatabase = FormAnswer::GetDatabase();

			// Create/Build out the QueryBuilder object with FormAnswer-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'form_answer');
			FormAnswer::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('form_answer');

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
		 * Static Qcodo Query method to query for a single FormAnswer object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FormAnswer the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormAnswer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new FormAnswer object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FormAnswer::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return FormAnswer::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of FormAnswer objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FormAnswer[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormAnswer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FormAnswer::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FormAnswer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of FormAnswer objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormAnswer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FormAnswer::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'form_answer_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with FormAnswer-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				FormAnswer::GetSelectFields($objQueryBuilder);
				FormAnswer::GetFromFields($objQueryBuilder);

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
			return FormAnswer::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FormAnswer
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'form_answer';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'signup_entry_id', $strAliasPrefix . 'signup_entry_id');
			$objBuilder->AddSelectItem($strTableName, 'form_question_id', $strAliasPrefix . 'form_question_id');
			$objBuilder->AddSelectItem($strTableName, 'text_value', $strAliasPrefix . 'text_value');
			$objBuilder->AddSelectItem($strTableName, 'address_id', $strAliasPrefix . 'address_id');
			$objBuilder->AddSelectItem($strTableName, 'integer_value', $strAliasPrefix . 'integer_value');
			$objBuilder->AddSelectItem($strTableName, 'boolean_value', $strAliasPrefix . 'boolean_value');
			$objBuilder->AddSelectItem($strTableName, 'date_value', $strAliasPrefix . 'date_value');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a FormAnswer from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FormAnswer::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return FormAnswer
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the FormAnswer object
			$objToReturn = new FormAnswer();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'signup_entry_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_entry_id'] : $strAliasPrefix . 'signup_entry_id';
			$objToReturn->intSignupEntryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'form_question_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'form_question_id'] : $strAliasPrefix . 'form_question_id';
			$objToReturn->intFormQuestionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'text_value', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'text_value'] : $strAliasPrefix . 'text_value';
			$objToReturn->strTextValue = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_id'] : $strAliasPrefix . 'address_id';
			$objToReturn->intAddressId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'integer_value', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'integer_value'] : $strAliasPrefix . 'integer_value';
			$objToReturn->intIntegerValue = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'boolean_value', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'boolean_value'] : $strAliasPrefix . 'boolean_value';
			$objToReturn->blnBooleanValue = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_value', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_value'] : $strAliasPrefix . 'date_value';
			$objToReturn->dttDateValue = $objDbRow->GetColumn($strAliasName, 'Date');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'form_answer__';

			// Check for SignupEntry Early Binding
			$strAlias = $strAliasPrefix . 'signup_entry_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSignupEntry = SignupEntry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signup_entry_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for FormQuestion Early Binding
			$strAlias = $strAliasPrefix . 'form_question_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objFormQuestion = FormQuestion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'form_question_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Address Early Binding
			$strAlias = $strAliasPrefix . 'address_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAddress = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of FormAnswers from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return FormAnswer[]
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
					$objItem = FormAnswer::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FormAnswer::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single FormAnswer object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FormAnswer next row resulting from the query
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
			return FormAnswer::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single FormAnswer object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return FormAnswer
		*/
		public static function LoadById($intId) {
			return FormAnswer::QuerySingle(
				QQ::Equal(QQN::FormAnswer()->Id, $intId)
			);
		}
			
		/**
		 * Load a single FormAnswer object,
		 * by SignupEntryId, FormQuestionId Index(es)
		 * @param integer $intSignupEntryId
		 * @param integer $intFormQuestionId
		 * @return FormAnswer
		*/
		public static function LoadBySignupEntryIdFormQuestionId($intSignupEntryId, $intFormQuestionId) {
			return FormAnswer::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::FormAnswer()->SignupEntryId, $intSignupEntryId),
				QQ::Equal(QQN::FormAnswer()->FormQuestionId, $intFormQuestionId)
				)
			);
		}
			
		/**
		 * Load an array of FormAnswer objects,
		 * by SignupEntryId Index(es)
		 * @param integer $intSignupEntryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormAnswer[]
		*/
		public static function LoadArrayBySignupEntryId($intSignupEntryId, $objOptionalClauses = null) {
			// Call FormAnswer::QueryArray to perform the LoadArrayBySignupEntryId query
			try {
				return FormAnswer::QueryArray(
					QQ::Equal(QQN::FormAnswer()->SignupEntryId, $intSignupEntryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormAnswers
		 * by SignupEntryId Index(es)
		 * @param integer $intSignupEntryId
		 * @return int
		*/
		public static function CountBySignupEntryId($intSignupEntryId) {
			// Call FormAnswer::QueryCount to perform the CountBySignupEntryId query
			return FormAnswer::QueryCount(
				QQ::Equal(QQN::FormAnswer()->SignupEntryId, $intSignupEntryId)
			);
		}
			
		/**
		 * Load an array of FormAnswer objects,
		 * by FormQuestionId Index(es)
		 * @param integer $intFormQuestionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormAnswer[]
		*/
		public static function LoadArrayByFormQuestionId($intFormQuestionId, $objOptionalClauses = null) {
			// Call FormAnswer::QueryArray to perform the LoadArrayByFormQuestionId query
			try {
				return FormAnswer::QueryArray(
					QQ::Equal(QQN::FormAnswer()->FormQuestionId, $intFormQuestionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormAnswers
		 * by FormQuestionId Index(es)
		 * @param integer $intFormQuestionId
		 * @return int
		*/
		public static function CountByFormQuestionId($intFormQuestionId) {
			// Call FormAnswer::QueryCount to perform the CountByFormQuestionId query
			return FormAnswer::QueryCount(
				QQ::Equal(QQN::FormAnswer()->FormQuestionId, $intFormQuestionId)
			);
		}
			
		/**
		 * Load an array of FormAnswer objects,
		 * by AddressId Index(es)
		 * @param integer $intAddressId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormAnswer[]
		*/
		public static function LoadArrayByAddressId($intAddressId, $objOptionalClauses = null) {
			// Call FormAnswer::QueryArray to perform the LoadArrayByAddressId query
			try {
				return FormAnswer::QueryArray(
					QQ::Equal(QQN::FormAnswer()->AddressId, $intAddressId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormAnswers
		 * by AddressId Index(es)
		 * @param integer $intAddressId
		 * @return int
		*/
		public static function CountByAddressId($intAddressId) {
			// Call FormAnswer::QueryCount to perform the CountByAddressId query
			return FormAnswer::QueryCount(
				QQ::Equal(QQN::FormAnswer()->AddressId, $intAddressId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this FormAnswer
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FormAnswer::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `form_answer` (
							`signup_entry_id`,
							`form_question_id`,
							`text_value`,
							`address_id`,
							`integer_value`,
							`boolean_value`,
							`date_value`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intSignupEntryId) . ',
							' . $objDatabase->SqlVariable($this->intFormQuestionId) . ',
							' . $objDatabase->SqlVariable($this->strTextValue) . ',
							' . $objDatabase->SqlVariable($this->intAddressId) . ',
							' . $objDatabase->SqlVariable($this->intIntegerValue) . ',
							' . $objDatabase->SqlVariable($this->blnBooleanValue) . ',
							' . $objDatabase->SqlVariable($this->dttDateValue) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('form_answer', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`form_answer`
						SET
							`signup_entry_id` = ' . $objDatabase->SqlVariable($this->intSignupEntryId) . ',
							`form_question_id` = ' . $objDatabase->SqlVariable($this->intFormQuestionId) . ',
							`text_value` = ' . $objDatabase->SqlVariable($this->strTextValue) . ',
							`address_id` = ' . $objDatabase->SqlVariable($this->intAddressId) . ',
							`integer_value` = ' . $objDatabase->SqlVariable($this->intIntegerValue) . ',
							`boolean_value` = ' . $objDatabase->SqlVariable($this->blnBooleanValue) . ',
							`date_value` = ' . $objDatabase->SqlVariable($this->dttDateValue) . '
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
		 * Delete this FormAnswer
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FormAnswer with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FormAnswer::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_answer`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all FormAnswers
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FormAnswer::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_answer`');
		}

		/**
		 * Truncate form_answer table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FormAnswer::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `form_answer`');
		}

		/**
		 * Reload this FormAnswer from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FormAnswer object.');

			// Reload the Object
			$objReloaded = FormAnswer::Load($this->intId);

			// Update $this's local variables to match
			$this->SignupEntryId = $objReloaded->SignupEntryId;
			$this->FormQuestionId = $objReloaded->FormQuestionId;
			$this->strTextValue = $objReloaded->strTextValue;
			$this->AddressId = $objReloaded->AddressId;
			$this->intIntegerValue = $objReloaded->intIntegerValue;
			$this->blnBooleanValue = $objReloaded->blnBooleanValue;
			$this->dttDateValue = $objReloaded->dttDateValue;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = FormAnswer::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `form_answer` (
					`id`,
					`signup_entry_id`,
					`form_question_id`,
					`text_value`,
					`address_id`,
					`integer_value`,
					`boolean_value`,
					`date_value`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intSignupEntryId) . ',
					' . $objDatabase->SqlVariable($this->intFormQuestionId) . ',
					' . $objDatabase->SqlVariable($this->strTextValue) . ',
					' . $objDatabase->SqlVariable($this->intAddressId) . ',
					' . $objDatabase->SqlVariable($this->intIntegerValue) . ',
					' . $objDatabase->SqlVariable($this->blnBooleanValue) . ',
					' . $objDatabase->SqlVariable($this->dttDateValue) . ',
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
		 * @return FormAnswer[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = FormAnswer::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM form_answer WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return FormAnswer::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return FormAnswer[]
		 */
		public function GetJournal() {
			return FormAnswer::GetJournalForId($this->intId);
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

				case 'SignupEntryId':
					// Gets the value for intSignupEntryId (Not Null)
					// @return integer
					return $this->intSignupEntryId;

				case 'FormQuestionId':
					// Gets the value for intFormQuestionId (Not Null)
					// @return integer
					return $this->intFormQuestionId;

				case 'TextValue':
					// Gets the value for strTextValue 
					// @return string
					return $this->strTextValue;

				case 'AddressId':
					// Gets the value for intAddressId 
					// @return integer
					return $this->intAddressId;

				case 'IntegerValue':
					// Gets the value for intIntegerValue 
					// @return integer
					return $this->intIntegerValue;

				case 'BooleanValue':
					// Gets the value for blnBooleanValue 
					// @return boolean
					return $this->blnBooleanValue;

				case 'DateValue':
					// Gets the value for dttDateValue 
					// @return QDateTime
					return $this->dttDateValue;


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupEntry':
					// Gets the value for the SignupEntry object referenced by intSignupEntryId (Not Null)
					// @return SignupEntry
					try {
						if ((!$this->objSignupEntry) && (!is_null($this->intSignupEntryId)))
							$this->objSignupEntry = SignupEntry::Load($this->intSignupEntryId);
						return $this->objSignupEntry;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormQuestion':
					// Gets the value for the FormQuestion object referenced by intFormQuestionId (Not Null)
					// @return FormQuestion
					try {
						if ((!$this->objFormQuestion) && (!is_null($this->intFormQuestionId)))
							$this->objFormQuestion = FormQuestion::Load($this->intFormQuestionId);
						return $this->objFormQuestion;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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
				case 'SignupEntryId':
					// Sets the value for intSignupEntryId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSignupEntry = null;
						return ($this->intSignupEntryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormQuestionId':
					// Sets the value for intFormQuestionId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objFormQuestion = null;
						return ($this->intFormQuestionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TextValue':
					// Sets the value for strTextValue 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTextValue = QType::Cast($mixValue, QType::String));
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

				case 'IntegerValue':
					// Sets the value for intIntegerValue 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intIntegerValue = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'BooleanValue':
					// Sets the value for blnBooleanValue 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnBooleanValue = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateValue':
					// Sets the value for dttDateValue 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateValue = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupEntry':
					// Sets the value for the SignupEntry object referenced by intSignupEntryId (Not Null)
					// @param SignupEntry $mixValue
					// @return SignupEntry
					if (is_null($mixValue)) {
						$this->intSignupEntryId = null;
						$this->objSignupEntry = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SignupEntry object
						try {
							$mixValue = QType::Cast($mixValue, 'SignupEntry');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED SignupEntry object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved SignupEntry for this FormAnswer');

						// Update Local Member Variables
						$this->objSignupEntry = $mixValue;
						$this->intSignupEntryId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'FormQuestion':
					// Sets the value for the FormQuestion object referenced by intFormQuestionId (Not Null)
					// @param FormQuestion $mixValue
					// @return FormQuestion
					if (is_null($mixValue)) {
						$this->intFormQuestionId = null;
						$this->objFormQuestion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FormQuestion object
						try {
							$mixValue = QType::Cast($mixValue, 'FormQuestion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED FormQuestion object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved FormQuestion for this FormAnswer');

						// Update Local Member Variables
						$this->objFormQuestion = $mixValue;
						$this->intFormQuestionId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
							throw new QCallerException('Unable to set an unsaved Address for this FormAnswer');

						// Update Local Member Variables
						$this->objAddress = $mixValue;
						$this->intAddressId = $mixValue->Id;

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
			$strToReturn = '<complexType name="FormAnswer"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="SignupEntry" type="xsd1:SignupEntry"/>';
			$strToReturn .= '<element name="FormQuestion" type="xsd1:FormQuestion"/>';
			$strToReturn .= '<element name="TextValue" type="xsd:string"/>';
			$strToReturn .= '<element name="Address" type="xsd1:Address"/>';
			$strToReturn .= '<element name="IntegerValue" type="xsd:int"/>';
			$strToReturn .= '<element name="BooleanValue" type="xsd:boolean"/>';
			$strToReturn .= '<element name="DateValue" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FormAnswer', $strComplexTypeArray)) {
				$strComplexTypeArray['FormAnswer'] = FormAnswer::GetSoapComplexTypeXml();
				SignupEntry::AlterSoapComplexTypeArray($strComplexTypeArray);
				FormQuestion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Address::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FormAnswer::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FormAnswer();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'SignupEntry')) &&
				($objSoapObject->SignupEntry))
				$objToReturn->SignupEntry = SignupEntry::GetObjectFromSoapObject($objSoapObject->SignupEntry);
			if ((property_exists($objSoapObject, 'FormQuestion')) &&
				($objSoapObject->FormQuestion))
				$objToReturn->FormQuestion = FormQuestion::GetObjectFromSoapObject($objSoapObject->FormQuestion);
			if (property_exists($objSoapObject, 'TextValue'))
				$objToReturn->strTextValue = $objSoapObject->TextValue;
			if ((property_exists($objSoapObject, 'Address')) &&
				($objSoapObject->Address))
				$objToReturn->Address = Address::GetObjectFromSoapObject($objSoapObject->Address);
			if (property_exists($objSoapObject, 'IntegerValue'))
				$objToReturn->intIntegerValue = $objSoapObject->IntegerValue;
			if (property_exists($objSoapObject, 'BooleanValue'))
				$objToReturn->blnBooleanValue = $objSoapObject->BooleanValue;
			if (property_exists($objSoapObject, 'DateValue'))
				$objToReturn->dttDateValue = new QDateTime($objSoapObject->DateValue);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FormAnswer::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSignupEntry)
				$objObject->objSignupEntry = SignupEntry::GetSoapObjectFromObject($objObject->objSignupEntry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSignupEntryId = null;
			if ($objObject->objFormQuestion)
				$objObject->objFormQuestion = FormQuestion::GetSoapObjectFromObject($objObject->objFormQuestion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFormQuestionId = null;
			if ($objObject->objAddress)
				$objObject->objAddress = Address::GetSoapObjectFromObject($objObject->objAddress, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAddressId = null;
			if ($objObject->dttDateValue)
				$objObject->dttDateValue = $objObject->dttDateValue->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $SignupEntryId
	 * @property-read QQNodeSignupEntry $SignupEntry
	 * @property-read QQNode $FormQuestionId
	 * @property-read QQNodeFormQuestion $FormQuestion
	 * @property-read QQNode $TextValue
	 * @property-read QQNode $AddressId
	 * @property-read QQNodeAddress $Address
	 * @property-read QQNode $IntegerValue
	 * @property-read QQNode $BooleanValue
	 * @property-read QQNode $DateValue
	 */
	class QQNodeFormAnswer extends QQNode {
		protected $strTableName = 'form_answer';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FormAnswer';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupEntryId':
					return new QQNode('signup_entry_id', 'SignupEntryId', 'integer', $this);
				case 'SignupEntry':
					return new QQNodeSignupEntry('signup_entry_id', 'SignupEntry', 'integer', $this);
				case 'FormQuestionId':
					return new QQNode('form_question_id', 'FormQuestionId', 'integer', $this);
				case 'FormQuestion':
					return new QQNodeFormQuestion('form_question_id', 'FormQuestion', 'integer', $this);
				case 'TextValue':
					return new QQNode('text_value', 'TextValue', 'string', $this);
				case 'AddressId':
					return new QQNode('address_id', 'AddressId', 'integer', $this);
				case 'Address':
					return new QQNodeAddress('address_id', 'Address', 'integer', $this);
				case 'IntegerValue':
					return new QQNode('integer_value', 'IntegerValue', 'integer', $this);
				case 'BooleanValue':
					return new QQNode('boolean_value', 'BooleanValue', 'boolean', $this);
				case 'DateValue':
					return new QQNode('date_value', 'DateValue', 'QDateTime', $this);

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
	 * @property-read QQNode $SignupEntryId
	 * @property-read QQNodeSignupEntry $SignupEntry
	 * @property-read QQNode $FormQuestionId
	 * @property-read QQNodeFormQuestion $FormQuestion
	 * @property-read QQNode $TextValue
	 * @property-read QQNode $AddressId
	 * @property-read QQNodeAddress $Address
	 * @property-read QQNode $IntegerValue
	 * @property-read QQNode $BooleanValue
	 * @property-read QQNode $DateValue
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeFormAnswer extends QQReverseReferenceNode {
		protected $strTableName = 'form_answer';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FormAnswer';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupEntryId':
					return new QQNode('signup_entry_id', 'SignupEntryId', 'integer', $this);
				case 'SignupEntry':
					return new QQNodeSignupEntry('signup_entry_id', 'SignupEntry', 'integer', $this);
				case 'FormQuestionId':
					return new QQNode('form_question_id', 'FormQuestionId', 'integer', $this);
				case 'FormQuestion':
					return new QQNodeFormQuestion('form_question_id', 'FormQuestion', 'integer', $this);
				case 'TextValue':
					return new QQNode('text_value', 'TextValue', 'string', $this);
				case 'AddressId':
					return new QQNode('address_id', 'AddressId', 'integer', $this);
				case 'Address':
					return new QQNodeAddress('address_id', 'Address', 'integer', $this);
				case 'IntegerValue':
					return new QQNode('integer_value', 'IntegerValue', 'integer', $this);
				case 'BooleanValue':
					return new QQNode('boolean_value', 'BooleanValue', 'boolean', $this);
				case 'DateValue':
					return new QQNode('date_value', 'DateValue', 'QDateTime', $this);

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