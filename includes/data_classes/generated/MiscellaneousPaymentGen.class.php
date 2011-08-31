<?php
	/**
	 * The abstract MiscellaneousPaymentGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the MiscellaneousPayment subclass which
	 * extends this MiscellaneousPaymentGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MiscellaneousPayment class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property integer $CreditCardPaymentId the value for intCreditCardPaymentId (Not Null)
	 * @property QDateTime $TransactionDate the value for dttTransactionDate 
	 * @property string $TransactionDescription the value for strTransactionDescription 
	 * @property double $Amount the value for fltAmount 
	 * @property string $FundingAccount the value for strFundingAccount 
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property CreditCardPayment $CreditCardPayment the value for the CreditCardPayment object referenced by intCreditCardPaymentId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class MiscellaneousPaymentGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column miscellaneous_payment.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column miscellaneous_payment.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column miscellaneous_payment.credit_card_payment_id
		 * @var integer intCreditCardPaymentId
		 */
		protected $intCreditCardPaymentId;
		const CreditCardPaymentIdDefault = null;


		/**
		 * Protected member variable that maps to the database column miscellaneous_payment.transaction_date
		 * @var QDateTime dttTransactionDate
		 */
		protected $dttTransactionDate;
		const TransactionDateDefault = null;


		/**
		 * Protected member variable that maps to the database column miscellaneous_payment.transaction_description
		 * @var string strTransactionDescription
		 */
		protected $strTransactionDescription;
		const TransactionDescriptionMaxLength = 255;
		const TransactionDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column miscellaneous_payment.amount
		 * @var double fltAmount
		 */
		protected $fltAmount;
		const AmountDefault = null;


		/**
		 * Protected member variable that maps to the database column miscellaneous_payment.funding_account
		 * @var string strFundingAccount
		 */
		protected $strFundingAccount;
		const FundingAccountMaxLength = 10;
		const FundingAccountDefault = null;


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
		 * in the database column miscellaneous_payment.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column miscellaneous_payment.credit_card_payment_id.
		 *
		 * NOTE: Always use the CreditCardPayment property getter to correctly retrieve this CreditCardPayment object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CreditCardPayment objCreditCardPayment
		 */
		protected $objCreditCardPayment;





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
		 * Load a MiscellaneousPayment from PK Info
		 * @param integer $intId
		 * @return MiscellaneousPayment
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return MiscellaneousPayment::QuerySingle(
				QQ::Equal(QQN::MiscellaneousPayment()->Id, $intId)
			);
		}

		/**
		 * Load all MiscellaneousPayments
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MiscellaneousPayment[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call MiscellaneousPayment::QueryArray to perform the LoadAll query
			try {
				return MiscellaneousPayment::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all MiscellaneousPayments
		 * @return int
		 */
		public static function CountAll() {
			// Call MiscellaneousPayment::QueryCount to perform the CountAll query
			return MiscellaneousPayment::QueryCount(QQ::All());
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
			$objDatabase = MiscellaneousPayment::GetDatabase();

			// Create/Build out the QueryBuilder object with MiscellaneousPayment-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'miscellaneous_payment');
			MiscellaneousPayment::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('miscellaneous_payment');

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
		 * Static Qcodo Query method to query for a single MiscellaneousPayment object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return MiscellaneousPayment the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MiscellaneousPayment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new MiscellaneousPayment object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = MiscellaneousPayment::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return MiscellaneousPayment::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of MiscellaneousPayment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return MiscellaneousPayment[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MiscellaneousPayment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return MiscellaneousPayment::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = MiscellaneousPayment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of MiscellaneousPayment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MiscellaneousPayment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = MiscellaneousPayment::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'miscellaneous_payment_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with MiscellaneousPayment-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				MiscellaneousPayment::GetSelectFields($objQueryBuilder);
				MiscellaneousPayment::GetFromFields($objQueryBuilder);

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
			return MiscellaneousPayment::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this MiscellaneousPayment
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'miscellaneous_payment';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'credit_card_payment_id', $strAliasPrefix . 'credit_card_payment_id');
			$objBuilder->AddSelectItem($strTableName, 'transaction_date', $strAliasPrefix . 'transaction_date');
			$objBuilder->AddSelectItem($strTableName, 'transaction_description', $strAliasPrefix . 'transaction_description');
			$objBuilder->AddSelectItem($strTableName, 'amount', $strAliasPrefix . 'amount');
			$objBuilder->AddSelectItem($strTableName, 'funding_account', $strAliasPrefix . 'funding_account');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a MiscellaneousPayment from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this MiscellaneousPayment::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return MiscellaneousPayment
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the MiscellaneousPayment object
			$objToReturn = new MiscellaneousPayment();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'credit_card_payment_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'credit_card_payment_id'] : $strAliasPrefix . 'credit_card_payment_id';
			$objToReturn->intCreditCardPaymentId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'transaction_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'transaction_date'] : $strAliasPrefix . 'transaction_date';
			$objToReturn->dttTransactionDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'transaction_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'transaction_description'] : $strAliasPrefix . 'transaction_description';
			$objToReturn->strTransactionDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount'] : $strAliasPrefix . 'amount';
			$objToReturn->fltAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'funding_account', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'funding_account'] : $strAliasPrefix . 'funding_account';
			$objToReturn->strFundingAccount = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'miscellaneous_payment__';

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CreditCardPayment Early Binding
			$strAlias = $strAliasPrefix . 'credit_card_payment_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCreditCardPayment = CreditCardPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'credit_card_payment_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of MiscellaneousPayments from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return MiscellaneousPayment[]
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
					$objItem = MiscellaneousPayment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = MiscellaneousPayment::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single MiscellaneousPayment object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return MiscellaneousPayment next row resulting from the query
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
			return MiscellaneousPayment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single MiscellaneousPayment object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return MiscellaneousPayment
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return MiscellaneousPayment::QuerySingle(
				QQ::Equal(QQN::MiscellaneousPayment()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of MiscellaneousPayment objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MiscellaneousPayment[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call MiscellaneousPayment::QueryArray to perform the LoadArrayByPersonId query
			try {
				return MiscellaneousPayment::QueryArray(
					QQ::Equal(QQN::MiscellaneousPayment()->PersonId, $intPersonId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MiscellaneousPayments
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call MiscellaneousPayment::QueryCount to perform the CountByPersonId query
			return MiscellaneousPayment::QueryCount(
				QQ::Equal(QQN::MiscellaneousPayment()->PersonId, $intPersonId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of MiscellaneousPayment objects,
		 * by CreditCardPaymentId Index(es)
		 * @param integer $intCreditCardPaymentId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MiscellaneousPayment[]
		*/
		public static function LoadArrayByCreditCardPaymentId($intCreditCardPaymentId, $objOptionalClauses = null) {
			// Call MiscellaneousPayment::QueryArray to perform the LoadArrayByCreditCardPaymentId query
			try {
				return MiscellaneousPayment::QueryArray(
					QQ::Equal(QQN::MiscellaneousPayment()->CreditCardPaymentId, $intCreditCardPaymentId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MiscellaneousPayments
		 * by CreditCardPaymentId Index(es)
		 * @param integer $intCreditCardPaymentId
		 * @return int
		*/
		public static function CountByCreditCardPaymentId($intCreditCardPaymentId, $objOptionalClauses = null) {
			// Call MiscellaneousPayment::QueryCount to perform the CountByCreditCardPaymentId query
			return MiscellaneousPayment::QueryCount(
				QQ::Equal(QQN::MiscellaneousPayment()->CreditCardPaymentId, $intCreditCardPaymentId)
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
		 * Save this MiscellaneousPayment
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = MiscellaneousPayment::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `miscellaneous_payment` (
							`person_id`,
							`credit_card_payment_id`,
							`transaction_date`,
							`transaction_description`,
							`amount`,
							`funding_account`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intCreditCardPaymentId) . ',
							' . $objDatabase->SqlVariable($this->dttTransactionDate) . ',
							' . $objDatabase->SqlVariable($this->strTransactionDescription) . ',
							' . $objDatabase->SqlVariable($this->fltAmount) . ',
							' . $objDatabase->SqlVariable($this->strFundingAccount) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('miscellaneous_payment', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`miscellaneous_payment`
						SET
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`credit_card_payment_id` = ' . $objDatabase->SqlVariable($this->intCreditCardPaymentId) . ',
							`transaction_date` = ' . $objDatabase->SqlVariable($this->dttTransactionDate) . ',
							`transaction_description` = ' . $objDatabase->SqlVariable($this->strTransactionDescription) . ',
							`amount` = ' . $objDatabase->SqlVariable($this->fltAmount) . ',
							`funding_account` = ' . $objDatabase->SqlVariable($this->strFundingAccount) . '
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
		 * Delete this MiscellaneousPayment
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this MiscellaneousPayment with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = MiscellaneousPayment::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`miscellaneous_payment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all MiscellaneousPayments
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = MiscellaneousPayment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`miscellaneous_payment`');
		}

		/**
		 * Truncate miscellaneous_payment table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = MiscellaneousPayment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `miscellaneous_payment`');
		}

		/**
		 * Reload this MiscellaneousPayment from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved MiscellaneousPayment object.');

			// Reload the Object
			$objReloaded = MiscellaneousPayment::Load($this->intId);

			// Update $this's local variables to match
			$this->PersonId = $objReloaded->PersonId;
			$this->CreditCardPaymentId = $objReloaded->CreditCardPaymentId;
			$this->dttTransactionDate = $objReloaded->dttTransactionDate;
			$this->strTransactionDescription = $objReloaded->strTransactionDescription;
			$this->fltAmount = $objReloaded->fltAmount;
			$this->strFundingAccount = $objReloaded->strFundingAccount;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = MiscellaneousPayment::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `miscellaneous_payment` (
					`id`,
					`person_id`,
					`credit_card_payment_id`,
					`transaction_date`,
					`transaction_description`,
					`amount`,
					`funding_account`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->intCreditCardPaymentId) . ',
					' . $objDatabase->SqlVariable($this->dttTransactionDate) . ',
					' . $objDatabase->SqlVariable($this->strTransactionDescription) . ',
					' . $objDatabase->SqlVariable($this->fltAmount) . ',
					' . $objDatabase->SqlVariable($this->strFundingAccount) . ',
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
		 * @return MiscellaneousPayment[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = MiscellaneousPayment::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM miscellaneous_payment WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return MiscellaneousPayment::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return MiscellaneousPayment[]
		 */
		public function GetJournal() {
			return MiscellaneousPayment::GetJournalForId($this->intId);
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
					// Gets the value for intPersonId (Not Null)
					// @return integer
					return $this->intPersonId;

				case 'CreditCardPaymentId':
					// Gets the value for intCreditCardPaymentId (Not Null)
					// @return integer
					return $this->intCreditCardPaymentId;

				case 'TransactionDate':
					// Gets the value for dttTransactionDate 
					// @return QDateTime
					return $this->dttTransactionDate;

				case 'TransactionDescription':
					// Gets the value for strTransactionDescription 
					// @return string
					return $this->strTransactionDescription;

				case 'Amount':
					// Gets the value for fltAmount 
					// @return double
					return $this->fltAmount;

				case 'FundingAccount':
					// Gets the value for strFundingAccount 
					// @return string
					return $this->strFundingAccount;


				///////////////////
				// Member Objects
				///////////////////
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

				case 'CreditCardPayment':
					// Gets the value for the CreditCardPayment object referenced by intCreditCardPaymentId (Not Null)
					// @return CreditCardPayment
					try {
						if ((!$this->objCreditCardPayment) && (!is_null($this->intCreditCardPaymentId)))
							$this->objCreditCardPayment = CreditCardPayment::Load($this->intCreditCardPaymentId);
						return $this->objCreditCardPayment;
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

				case 'CreditCardPaymentId':
					// Sets the value for intCreditCardPaymentId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCreditCardPayment = null;
						return ($this->intCreditCardPaymentId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TransactionDate':
					// Sets the value for dttTransactionDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttTransactionDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TransactionDescription':
					// Sets the value for strTransactionDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTransactionDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Amount':
					// Sets the value for fltAmount 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltAmount = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FundingAccount':
					// Sets the value for strFundingAccount 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFundingAccount = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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
							throw new QCallerException('Unable to set an unsaved Person for this MiscellaneousPayment');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreditCardPayment':
					// Sets the value for the CreditCardPayment object referenced by intCreditCardPaymentId (Not Null)
					// @param CreditCardPayment $mixValue
					// @return CreditCardPayment
					if (is_null($mixValue)) {
						$this->intCreditCardPaymentId = null;
						$this->objCreditCardPayment = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CreditCardPayment object
						try {
							$mixValue = QType::Cast($mixValue, 'CreditCardPayment');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED CreditCardPayment object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved CreditCardPayment for this MiscellaneousPayment');

						// Update Local Member Variables
						$this->objCreditCardPayment = $mixValue;
						$this->intCreditCardPaymentId = $mixValue->Id;

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
			$strToReturn = '<complexType name="MiscellaneousPayment"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="CreditCardPayment" type="xsd1:CreditCardPayment"/>';
			$strToReturn .= '<element name="TransactionDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="TransactionDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="Amount" type="xsd:float"/>';
			$strToReturn .= '<element name="FundingAccount" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('MiscellaneousPayment', $strComplexTypeArray)) {
				$strComplexTypeArray['MiscellaneousPayment'] = MiscellaneousPayment::GetSoapComplexTypeXml();
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				CreditCardPayment::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, MiscellaneousPayment::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new MiscellaneousPayment();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if ((property_exists($objSoapObject, 'CreditCardPayment')) &&
				($objSoapObject->CreditCardPayment))
				$objToReturn->CreditCardPayment = CreditCardPayment::GetObjectFromSoapObject($objSoapObject->CreditCardPayment);
			if (property_exists($objSoapObject, 'TransactionDate'))
				$objToReturn->dttTransactionDate = new QDateTime($objSoapObject->TransactionDate);
			if (property_exists($objSoapObject, 'TransactionDescription'))
				$objToReturn->strTransactionDescription = $objSoapObject->TransactionDescription;
			if (property_exists($objSoapObject, 'Amount'))
				$objToReturn->fltAmount = $objSoapObject->Amount;
			if (property_exists($objSoapObject, 'FundingAccount'))
				$objToReturn->strFundingAccount = $objSoapObject->FundingAccount;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, MiscellaneousPayment::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->objCreditCardPayment)
				$objObject->objCreditCardPayment = CreditCardPayment::GetSoapObjectFromObject($objObject->objCreditCardPayment, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreditCardPaymentId = null;
			if ($objObject->dttTransactionDate)
				$objObject->dttTransactionDate = $objObject->dttTransactionDate->__toString(QDateTime::FormatSoap);
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
	 * @property-read QQNode $CreditCardPaymentId
	 * @property-read QQNodeCreditCardPayment $CreditCardPayment
	 * @property-read QQNode $TransactionDate
	 * @property-read QQNode $TransactionDescription
	 * @property-read QQNode $Amount
	 * @property-read QQNode $FundingAccount
	 */
	class QQNodeMiscellaneousPayment extends QQNode {
		protected $strTableName = 'miscellaneous_payment';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'MiscellaneousPayment';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'CreditCardPaymentId':
					return new QQNode('credit_card_payment_id', 'CreditCardPaymentId', 'integer', $this);
				case 'CreditCardPayment':
					return new QQNodeCreditCardPayment('credit_card_payment_id', 'CreditCardPayment', 'integer', $this);
				case 'TransactionDate':
					return new QQNode('transaction_date', 'TransactionDate', 'QDateTime', $this);
				case 'TransactionDescription':
					return new QQNode('transaction_description', 'TransactionDescription', 'string', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'FundingAccount':
					return new QQNode('funding_account', 'FundingAccount', 'string', $this);

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
	 * @property-read QQNode $CreditCardPaymentId
	 * @property-read QQNodeCreditCardPayment $CreditCardPayment
	 * @property-read QQNode $TransactionDate
	 * @property-read QQNode $TransactionDescription
	 * @property-read QQNode $Amount
	 * @property-read QQNode $FundingAccount
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeMiscellaneousPayment extends QQReverseReferenceNode {
		protected $strTableName = 'miscellaneous_payment';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'MiscellaneousPayment';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'CreditCardPaymentId':
					return new QQNode('credit_card_payment_id', 'CreditCardPaymentId', 'integer', $this);
				case 'CreditCardPayment':
					return new QQNodeCreditCardPayment('credit_card_payment_id', 'CreditCardPayment', 'integer', $this);
				case 'TransactionDate':
					return new QQNode('transaction_date', 'TransactionDate', 'QDateTime', $this);
				case 'TransactionDescription':
					return new QQNode('transaction_description', 'TransactionDescription', 'string', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'FundingAccount':
					return new QQNode('funding_account', 'FundingAccount', 'string', $this);

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