<?php
	/**
	 * The abstract SignupEntryGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SignupEntry subclass which
	 * extends this SignupEntryGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SignupEntry class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $SignupFormId the value for intSignupFormId (Not Null)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property integer $SignupByPersonId the value for intSignupByPersonId 
	 * @property QDateTime $DateSubmitted the value for dttDateSubmitted (Not Null)
	 * @property double $AmountPaid the value for fltAmountPaid 
	 * @property double $AmountBalance the value for fltAmountBalance 
	 * @property SignupForm $SignupForm the value for the SignupForm object referenced by intSignupFormId (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property Person $SignupByPerson the value for the Person object referenced by intSignupByPersonId 
	 * @property FormAnswer $_FormAnswer the value for the private _objFormAnswer (Read-Only) if set due to an expansion on the form_answer.signup_entry_id reverse relationship
	 * @property FormAnswer[] $_FormAnswerArray the value for the private _objFormAnswerArray (Read-Only) if set due to an ExpandAsArray on the form_answer.signup_entry_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SignupEntryGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column signup_entry.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_entry.signup_form_id
		 * @var integer intSignupFormId
		 */
		protected $intSignupFormId;
		const SignupFormIdDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_entry.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_entry.signup_by_person_id
		 * @var integer intSignupByPersonId
		 */
		protected $intSignupByPersonId;
		const SignupByPersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_entry.date_submitted
		 * @var QDateTime dttDateSubmitted
		 */
		protected $dttDateSubmitted;
		const DateSubmittedDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_entry.amount_paid
		 * @var double fltAmountPaid
		 */
		protected $fltAmountPaid;
		const AmountPaidDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_entry.amount_balance
		 * @var double fltAmountBalance
		 */
		protected $fltAmountBalance;
		const AmountBalanceDefault = null;


		/**
		 * Private member variable that stores a reference to a single FormAnswer object
		 * (of type FormAnswer), if this SignupEntry object was restored with
		 * an expansion on the form_answer association table.
		 * @var FormAnswer _objFormAnswer;
		 */
		private $_objFormAnswer;

		/**
		 * Private member variable that stores a reference to an array of FormAnswer objects
		 * (of type FormAnswer[]), if this SignupEntry object was restored with
		 * an ExpandAsArray on the form_answer association table.
		 * @var FormAnswer[] _objFormAnswerArray;
		 */
		private $_objFormAnswerArray = array();

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
		 * in the database column signup_entry.signup_form_id.
		 *
		 * NOTE: Always use the SignupForm property getter to correctly retrieve this SignupForm object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SignupForm objSignupForm
		 */
		protected $objSignupForm;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column signup_entry.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column signup_entry.signup_by_person_id.
		 *
		 * NOTE: Always use the SignupByPerson property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objSignupByPerson
		 */
		protected $objSignupByPerson;





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
		 * Load a SignupEntry from PK Info
		 * @param integer $intId
		 * @return SignupEntry
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return SignupEntry::QuerySingle(
				QQ::Equal(QQN::SignupEntry()->Id, $intId)
			);
		}

		/**
		 * Load all SignupEntries
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupEntry[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call SignupEntry::QueryArray to perform the LoadAll query
			try {
				return SignupEntry::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SignupEntries
		 * @return int
		 */
		public static function CountAll() {
			// Call SignupEntry::QueryCount to perform the CountAll query
			return SignupEntry::QueryCount(QQ::All());
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
			$objDatabase = SignupEntry::GetDatabase();

			// Create/Build out the QueryBuilder object with SignupEntry-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'signup_entry');
			SignupEntry::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('signup_entry');

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
		 * Static Qcodo Query method to query for a single SignupEntry object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SignupEntry the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SignupEntry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new SignupEntry object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SignupEntry::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return SignupEntry::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of SignupEntry objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SignupEntry[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SignupEntry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SignupEntry::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = SignupEntry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of SignupEntry objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SignupEntry::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = SignupEntry::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'signup_entry_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with SignupEntry-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				SignupEntry::GetSelectFields($objQueryBuilder);
				SignupEntry::GetFromFields($objQueryBuilder);

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
			return SignupEntry::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SignupEntry
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'signup_entry';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'signup_form_id', $strAliasPrefix . 'signup_form_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'signup_by_person_id', $strAliasPrefix . 'signup_by_person_id');
			$objBuilder->AddSelectItem($strTableName, 'date_submitted', $strAliasPrefix . 'date_submitted');
			$objBuilder->AddSelectItem($strTableName, 'amount_paid', $strAliasPrefix . 'amount_paid');
			$objBuilder->AddSelectItem($strTableName, 'amount_balance', $strAliasPrefix . 'amount_balance');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a SignupEntry from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SignupEntry::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return SignupEntry
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
					$strAliasPrefix = 'signup_entry__';


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

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'signup_entry__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the SignupEntry object
			$objToReturn = new SignupEntry();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'signup_form_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_form_id'] : $strAliasPrefix . 'signup_form_id';
			$objToReturn->intSignupFormId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'signup_by_person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_by_person_id'] : $strAliasPrefix . 'signup_by_person_id';
			$objToReturn->intSignupByPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_submitted', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_submitted'] : $strAliasPrefix . 'date_submitted';
			$objToReturn->dttDateSubmitted = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount_paid', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount_paid'] : $strAliasPrefix . 'amount_paid';
			$objToReturn->fltAmountPaid = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount_balance', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount_balance'] : $strAliasPrefix . 'amount_balance';
			$objToReturn->fltAmountBalance = $objDbRow->GetColumn($strAliasName, 'Float');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'signup_entry__';

			// Check for SignupForm Early Binding
			$strAlias = $strAliasPrefix . 'signup_form_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSignupForm = SignupForm::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signup_form_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for SignupByPerson Early Binding
			$strAlias = $strAliasPrefix . 'signup_by_person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSignupByPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signup_by_person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for FormAnswer Virtual Binding
			$strAlias = $strAliasPrefix . 'formanswer__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objFormAnswerArray[] = FormAnswer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formanswer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objFormAnswer = FormAnswer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formanswer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of SignupEntries from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return SignupEntry[]
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
					$objItem = SignupEntry::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SignupEntry::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single SignupEntry object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return SignupEntry next row resulting from the query
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
			return SignupEntry::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single SignupEntry object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return SignupEntry
		*/
		public static function LoadById($intId) {
			return SignupEntry::QuerySingle(
				QQ::Equal(QQN::SignupEntry()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of SignupEntry objects,
		 * by SignupFormId Index(es)
		 * @param integer $intSignupFormId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupEntry[]
		*/
		public static function LoadArrayBySignupFormId($intSignupFormId, $objOptionalClauses = null) {
			// Call SignupEntry::QueryArray to perform the LoadArrayBySignupFormId query
			try {
				return SignupEntry::QueryArray(
					QQ::Equal(QQN::SignupEntry()->SignupFormId, $intSignupFormId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SignupEntries
		 * by SignupFormId Index(es)
		 * @param integer $intSignupFormId
		 * @return int
		*/
		public static function CountBySignupFormId($intSignupFormId) {
			// Call SignupEntry::QueryCount to perform the CountBySignupFormId query
			return SignupEntry::QueryCount(
				QQ::Equal(QQN::SignupEntry()->SignupFormId, $intSignupFormId)
			);
		}
			
		/**
		 * Load an array of SignupEntry objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupEntry[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call SignupEntry::QueryArray to perform the LoadArrayByPersonId query
			try {
				return SignupEntry::QueryArray(
					QQ::Equal(QQN::SignupEntry()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SignupEntries
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call SignupEntry::QueryCount to perform the CountByPersonId query
			return SignupEntry::QueryCount(
				QQ::Equal(QQN::SignupEntry()->PersonId, $intPersonId)
			);
		}
			
		/**
		 * Load an array of SignupEntry objects,
		 * by SignupByPersonId Index(es)
		 * @param integer $intSignupByPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupEntry[]
		*/
		public static function LoadArrayBySignupByPersonId($intSignupByPersonId, $objOptionalClauses = null) {
			// Call SignupEntry::QueryArray to perform the LoadArrayBySignupByPersonId query
			try {
				return SignupEntry::QueryArray(
					QQ::Equal(QQN::SignupEntry()->SignupByPersonId, $intSignupByPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SignupEntries
		 * by SignupByPersonId Index(es)
		 * @param integer $intSignupByPersonId
		 * @return int
		*/
		public static function CountBySignupByPersonId($intSignupByPersonId) {
			// Call SignupEntry::QueryCount to perform the CountBySignupByPersonId query
			return SignupEntry::QueryCount(
				QQ::Equal(QQN::SignupEntry()->SignupByPersonId, $intSignupByPersonId)
			);
		}
			
		/**
		 * Load an array of SignupEntry objects,
		 * by AmountBalance Index(es)
		 * @param double $fltAmountBalance
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupEntry[]
		*/
		public static function LoadArrayByAmountBalance($fltAmountBalance, $objOptionalClauses = null) {
			// Call SignupEntry::QueryArray to perform the LoadArrayByAmountBalance query
			try {
				return SignupEntry::QueryArray(
					QQ::Equal(QQN::SignupEntry()->AmountBalance, $fltAmountBalance),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SignupEntries
		 * by AmountBalance Index(es)
		 * @param double $fltAmountBalance
		 * @return int
		*/
		public static function CountByAmountBalance($fltAmountBalance) {
			// Call SignupEntry::QueryCount to perform the CountByAmountBalance query
			return SignupEntry::QueryCount(
				QQ::Equal(QQN::SignupEntry()->AmountBalance, $fltAmountBalance)
			);
		}
			
		/**
		 * Load an array of SignupEntry objects,
		 * by SignupFormId, PersonId Index(es)
		 * @param integer $intSignupFormId
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupEntry[]
		*/
		public static function LoadArrayBySignupFormIdPersonId($intSignupFormId, $intPersonId, $objOptionalClauses = null) {
			// Call SignupEntry::QueryArray to perform the LoadArrayBySignupFormIdPersonId query
			try {
				return SignupEntry::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::SignupEntry()->SignupFormId, $intSignupFormId),
					QQ::Equal(QQN::SignupEntry()->PersonId, $intPersonId)
					),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SignupEntries
		 * by SignupFormId, PersonId Index(es)
		 * @param integer $intSignupFormId
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountBySignupFormIdPersonId($intSignupFormId, $intPersonId) {
			// Call SignupEntry::QueryCount to perform the CountBySignupFormIdPersonId query
			return SignupEntry::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::SignupEntry()->SignupFormId, $intSignupFormId),
				QQ::Equal(QQN::SignupEntry()->PersonId, $intPersonId)
				)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this SignupEntry
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SignupEntry::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `signup_entry` (
							`signup_form_id`,
							`person_id`,
							`signup_by_person_id`,
							`date_submitted`,
							`amount_paid`,
							`amount_balance`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intSignupByPersonId) . ',
							' . $objDatabase->SqlVariable($this->dttDateSubmitted) . ',
							' . $objDatabase->SqlVariable($this->fltAmountPaid) . ',
							' . $objDatabase->SqlVariable($this->fltAmountBalance) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('signup_entry', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`signup_entry`
						SET
							`signup_form_id` = ' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`signup_by_person_id` = ' . $objDatabase->SqlVariable($this->intSignupByPersonId) . ',
							`date_submitted` = ' . $objDatabase->SqlVariable($this->dttDateSubmitted) . ',
							`amount_paid` = ' . $objDatabase->SqlVariable($this->fltAmountPaid) . ',
							`amount_balance` = ' . $objDatabase->SqlVariable($this->fltAmountBalance) . '
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
		 * Delete this SignupEntry
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SignupEntry with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SignupEntry::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_entry`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all SignupEntries
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SignupEntry::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_entry`');
		}

		/**
		 * Truncate signup_entry table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SignupEntry::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `signup_entry`');
		}

		/**
		 * Reload this SignupEntry from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SignupEntry object.');

			// Reload the Object
			$objReloaded = SignupEntry::Load($this->intId);

			// Update $this's local variables to match
			$this->SignupFormId = $objReloaded->SignupFormId;
			$this->PersonId = $objReloaded->PersonId;
			$this->SignupByPersonId = $objReloaded->SignupByPersonId;
			$this->dttDateSubmitted = $objReloaded->dttDateSubmitted;
			$this->fltAmountPaid = $objReloaded->fltAmountPaid;
			$this->fltAmountBalance = $objReloaded->fltAmountBalance;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = SignupEntry::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `signup_entry` (
					`id`,
					`signup_form_id`,
					`person_id`,
					`signup_by_person_id`,
					`date_submitted`,
					`amount_paid`,
					`amount_balance`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->intSignupByPersonId) . ',
					' . $objDatabase->SqlVariable($this->dttDateSubmitted) . ',
					' . $objDatabase->SqlVariable($this->fltAmountPaid) . ',
					' . $objDatabase->SqlVariable($this->fltAmountBalance) . ',
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
		 * @return SignupEntry[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = SignupEntry::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM signup_entry WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return SignupEntry::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return SignupEntry[]
		 */
		public function GetJournal() {
			return SignupEntry::GetJournalForId($this->intId);
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

				case 'SignupFormId':
					// Gets the value for intSignupFormId (Not Null)
					// @return integer
					return $this->intSignupFormId;

				case 'PersonId':
					// Gets the value for intPersonId (Not Null)
					// @return integer
					return $this->intPersonId;

				case 'SignupByPersonId':
					// Gets the value for intSignupByPersonId 
					// @return integer
					return $this->intSignupByPersonId;

				case 'DateSubmitted':
					// Gets the value for dttDateSubmitted (Not Null)
					// @return QDateTime
					return $this->dttDateSubmitted;

				case 'AmountPaid':
					// Gets the value for fltAmountPaid 
					// @return double
					return $this->fltAmountPaid;

				case 'AmountBalance':
					// Gets the value for fltAmountBalance 
					// @return double
					return $this->fltAmountBalance;


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupForm':
					// Gets the value for the SignupForm object referenced by intSignupFormId (Not Null)
					// @return SignupForm
					try {
						if ((!$this->objSignupForm) && (!is_null($this->intSignupFormId)))
							$this->objSignupForm = SignupForm::Load($this->intSignupFormId);
						return $this->objSignupForm;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Person':
					// Gets the value for the Person object referenced by intPersonId (Not Null)
					// @return Person
					try {
						if ((!$this->objPerson) && (!is_null($this->intPersonId)))
							$this->objPerson = Person::Load($this->intPersonId);
						return $this->objPerson;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SignupByPerson':
					// Gets the value for the Person object referenced by intSignupByPersonId 
					// @return Person
					try {
						if ((!$this->objSignupByPerson) && (!is_null($this->intSignupByPersonId)))
							$this->objSignupByPerson = Person::Load($this->intSignupByPersonId);
						return $this->objSignupByPerson;
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
					// if set due to an expansion on the form_answer.signup_entry_id reverse relationship
					// @return FormAnswer
					return $this->_objFormAnswer;

				case '_FormAnswerArray':
					// Gets the value for the private _objFormAnswerArray (Read-Only)
					// if set due to an ExpandAsArray on the form_answer.signup_entry_id reverse relationship
					// @return FormAnswer[]
					return (array) $this->_objFormAnswerArray;


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
				case 'SignupFormId':
					// Sets the value for intSignupFormId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSignupForm = null;
						return ($this->intSignupFormId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PersonId':
					// Sets the value for intPersonId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPerson = null;
						return ($this->intPersonId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SignupByPersonId':
					// Sets the value for intSignupByPersonId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSignupByPerson = null;
						return ($this->intSignupByPersonId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateSubmitted':
					// Sets the value for dttDateSubmitted (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateSubmitted = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AmountPaid':
					// Sets the value for fltAmountPaid 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltAmountPaid = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AmountBalance':
					// Sets the value for fltAmountBalance 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltAmountBalance = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupForm':
					// Sets the value for the SignupForm object referenced by intSignupFormId (Not Null)
					// @param SignupForm $mixValue
					// @return SignupForm
					if (is_null($mixValue)) {
						$this->intSignupFormId = null;
						$this->objSignupForm = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SignupForm object
						try {
							$mixValue = QType::Cast($mixValue, 'SignupForm');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED SignupForm object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved SignupForm for this SignupEntry');

						// Update Local Member Variables
						$this->objSignupForm = $mixValue;
						$this->intSignupFormId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Person':
					// Sets the value for the Person object referenced by intPersonId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved Person for this SignupEntry');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'SignupByPerson':
					// Sets the value for the Person object referenced by intSignupByPersonId 
					// @param Person $mixValue
					// @return Person
					if (is_null($mixValue)) {
						$this->intSignupByPersonId = null;
						$this->objSignupByPerson = null;
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
							throw new QCallerException('Unable to set an unsaved SignupByPerson for this SignupEntry');

						// Update Local Member Variables
						$this->objSignupByPerson = $mixValue;
						$this->intSignupByPersonId = $mixValue->Id;

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
				return FormAnswer::LoadArrayBySignupEntryId($this->intId, $objOptionalClauses);
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

			return FormAnswer::CountBySignupEntryId($this->intId);
		}

		/**
		 * Associates a FormAnswer
		 * @param FormAnswer $objFormAnswer
		 * @return void
		*/ 
		public function AssociateFormAnswer(FormAnswer $objFormAnswer) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFormAnswer on this unsaved SignupEntry.');
			if ((is_null($objFormAnswer->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFormAnswer on this SignupEntry with an unsaved FormAnswer.');

			// Get the Database Object for this Class
			$objDatabase = SignupEntry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_answer`
				SET
					`signup_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormAnswer->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objFormAnswer->SignupEntryId = $this->intId;
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved SignupEntry.');
			if ((is_null($objFormAnswer->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this SignupEntry with an unsaved FormAnswer.');

			// Get the Database Object for this Class
			$objDatabase = SignupEntry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_answer`
				SET
					`signup_entry_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormAnswer->Id) . ' AND
					`signup_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objFormAnswer->SignupEntryId = null;
				$objFormAnswer->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all FormAnswers
		 * @return void
		*/ 
		public function UnassociateAllFormAnswers() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved SignupEntry.');

			// Get the Database Object for this Class
			$objDatabase = SignupEntry::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (FormAnswer::LoadArrayBySignupEntryId($this->intId) as $objFormAnswer) {
					$objFormAnswer->SignupEntryId = null;
					$objFormAnswer->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_answer`
				SET
					`signup_entry_id` = null
				WHERE
					`signup_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FormAnswer
		 * @param FormAnswer $objFormAnswer
		 * @return void
		*/ 
		public function DeleteAssociatedFormAnswer(FormAnswer $objFormAnswer) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved SignupEntry.');
			if ((is_null($objFormAnswer->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this SignupEntry with an unsaved FormAnswer.');

			// Get the Database Object for this Class
			$objDatabase = SignupEntry::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_answer`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormAnswer->Id) . ' AND
					`signup_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved SignupEntry.');

			// Get the Database Object for this Class
			$objDatabase = SignupEntry::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (FormAnswer::LoadArrayBySignupEntryId($this->intId) as $objFormAnswer) {
					$objFormAnswer->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_answer`
				WHERE
					`signup_entry_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="SignupEntry"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="SignupForm" type="xsd1:SignupForm"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="SignupByPerson" type="xsd1:Person"/>';
			$strToReturn .= '<element name="DateSubmitted" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="AmountPaid" type="xsd:float"/>';
			$strToReturn .= '<element name="AmountBalance" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SignupEntry', $strComplexTypeArray)) {
				$strComplexTypeArray['SignupEntry'] = SignupEntry::GetSoapComplexTypeXml();
				SignupForm::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SignupEntry::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SignupEntry();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'SignupForm')) &&
				($objSoapObject->SignupForm))
				$objToReturn->SignupForm = SignupForm::GetObjectFromSoapObject($objSoapObject->SignupForm);
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if ((property_exists($objSoapObject, 'SignupByPerson')) &&
				($objSoapObject->SignupByPerson))
				$objToReturn->SignupByPerson = Person::GetObjectFromSoapObject($objSoapObject->SignupByPerson);
			if (property_exists($objSoapObject, 'DateSubmitted'))
				$objToReturn->dttDateSubmitted = new QDateTime($objSoapObject->DateSubmitted);
			if (property_exists($objSoapObject, 'AmountPaid'))
				$objToReturn->fltAmountPaid = $objSoapObject->AmountPaid;
			if (property_exists($objSoapObject, 'AmountBalance'))
				$objToReturn->fltAmountBalance = $objSoapObject->AmountBalance;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SignupEntry::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSignupForm)
				$objObject->objSignupForm = SignupForm::GetSoapObjectFromObject($objObject->objSignupForm, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSignupFormId = null;
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->objSignupByPerson)
				$objObject->objSignupByPerson = Person::GetSoapObjectFromObject($objObject->objSignupByPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSignupByPersonId = null;
			if ($objObject->dttDateSubmitted)
				$objObject->dttDateSubmitted = $objObject->dttDateSubmitted->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $SignupFormId
	 * @property-read QQNodeSignupForm $SignupForm
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $SignupByPersonId
	 * @property-read QQNodePerson $SignupByPerson
	 * @property-read QQNode $DateSubmitted
	 * @property-read QQNode $AmountPaid
	 * @property-read QQNode $AmountBalance
	 * @property-read QQReverseReferenceNodeFormAnswer $FormAnswer
	 */
	class QQNodeSignupEntry extends QQNode {
		protected $strTableName = 'signup_entry';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'SignupEntry';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupFormId':
					return new QQNode('signup_form_id', 'SignupFormId', 'integer', $this);
				case 'SignupForm':
					return new QQNodeSignupForm('signup_form_id', 'SignupForm', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'SignupByPersonId':
					return new QQNode('signup_by_person_id', 'SignupByPersonId', 'integer', $this);
				case 'SignupByPerson':
					return new QQNodePerson('signup_by_person_id', 'SignupByPerson', 'integer', $this);
				case 'DateSubmitted':
					return new QQNode('date_submitted', 'DateSubmitted', 'QDateTime', $this);
				case 'AmountPaid':
					return new QQNode('amount_paid', 'AmountPaid', 'double', $this);
				case 'AmountBalance':
					return new QQNode('amount_balance', 'AmountBalance', 'double', $this);
				case 'FormAnswer':
					return new QQReverseReferenceNodeFormAnswer($this, 'formanswer', 'reverse_reference', 'signup_entry_id');

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
	 * @property-read QQNode $SignupFormId
	 * @property-read QQNodeSignupForm $SignupForm
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $SignupByPersonId
	 * @property-read QQNodePerson $SignupByPerson
	 * @property-read QQNode $DateSubmitted
	 * @property-read QQNode $AmountPaid
	 * @property-read QQNode $AmountBalance
	 * @property-read QQReverseReferenceNodeFormAnswer $FormAnswer
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeSignupEntry extends QQReverseReferenceNode {
		protected $strTableName = 'signup_entry';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'SignupEntry';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupFormId':
					return new QQNode('signup_form_id', 'SignupFormId', 'integer', $this);
				case 'SignupForm':
					return new QQNodeSignupForm('signup_form_id', 'SignupForm', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'SignupByPersonId':
					return new QQNode('signup_by_person_id', 'SignupByPersonId', 'integer', $this);
				case 'SignupByPerson':
					return new QQNodePerson('signup_by_person_id', 'SignupByPerson', 'integer', $this);
				case 'DateSubmitted':
					return new QQNode('date_submitted', 'DateSubmitted', 'QDateTime', $this);
				case 'AmountPaid':
					return new QQNode('amount_paid', 'AmountPaid', 'double', $this);
				case 'AmountBalance':
					return new QQNode('amount_balance', 'AmountBalance', 'double', $this);
				case 'FormAnswer':
					return new QQReverseReferenceNodeFormAnswer($this, 'formanswer', 'reverse_reference', 'signup_entry_id');

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