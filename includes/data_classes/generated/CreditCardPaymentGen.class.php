<?php
	/**
	 * The abstract CreditCardPaymentGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the CreditCardPayment subclass which
	 * extends this CreditCardPaymentGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CreditCardPayment class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $CreditCardStatusTypeId the value for intCreditCardStatusTypeId (Not Null)
	 * @property integer $CreditCardTypeId the value for intCreditCardTypeId (Not Null)
	 * @property string $CreditCardLastFour the value for strCreditCardLastFour (Not Null)
	 * @property string $TransactionCode the value for strTransactionCode (Unique)
	 * @property string $AuthorizationCode the value for strAuthorizationCode 
	 * @property string $AddressMatchCode the value for strAddressMatchCode 
	 * @property QDateTime $DateAuthorized the value for dttDateAuthorized 
	 * @property QDateTime $DateCaptured the value for dttDateCaptured 
	 * @property double $AmountCharged the value for fltAmountCharged 
	 * @property double $AmountFee the value for fltAmountFee 
	 * @property double $AmountCleared the value for fltAmountCleared 
	 * @property integer $PaypalBatchId the value for intPaypalBatchId 
	 * @property PaypalBatch $PaypalBatch the value for the PaypalBatch object referenced by intPaypalBatchId 
	 * @property OnlineDonation $OnlineDonation the value for the OnlineDonation object that uniquely references this CreditCardPayment
	 * @property SignupPayment $SignupPayment the value for the SignupPayment object that uniquely references this CreditCardPayment
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CreditCardPaymentGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column credit_card_payment.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.credit_card_status_type_id
		 * @var integer intCreditCardStatusTypeId
		 */
		protected $intCreditCardStatusTypeId;
		const CreditCardStatusTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.credit_card_type_id
		 * @var integer intCreditCardTypeId
		 */
		protected $intCreditCardTypeId;
		const CreditCardTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.credit_card_last_four
		 * @var string strCreditCardLastFour
		 */
		protected $strCreditCardLastFour;
		const CreditCardLastFourMaxLength = 4;
		const CreditCardLastFourDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.transaction_code
		 * @var string strTransactionCode
		 */
		protected $strTransactionCode;
		const TransactionCodeMaxLength = 40;
		const TransactionCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.authorization_code
		 * @var string strAuthorizationCode
		 */
		protected $strAuthorizationCode;
		const AuthorizationCodeMaxLength = 40;
		const AuthorizationCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.address_match_code
		 * @var string strAddressMatchCode
		 */
		protected $strAddressMatchCode;
		const AddressMatchCodeMaxLength = 1;
		const AddressMatchCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.date_authorized
		 * @var QDateTime dttDateAuthorized
		 */
		protected $dttDateAuthorized;
		const DateAuthorizedDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.date_captured
		 * @var QDateTime dttDateCaptured
		 */
		protected $dttDateCaptured;
		const DateCapturedDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.amount_charged
		 * @var double fltAmountCharged
		 */
		protected $fltAmountCharged;
		const AmountChargedDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.amount_fee
		 * @var double fltAmountFee
		 */
		protected $fltAmountFee;
		const AmountFeeDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.amount_cleared
		 * @var double fltAmountCleared
		 */
		protected $fltAmountCleared;
		const AmountClearedDefault = null;


		/**
		 * Protected member variable that maps to the database column credit_card_payment.paypal_batch_id
		 * @var integer intPaypalBatchId
		 */
		protected $intPaypalBatchId;
		const PaypalBatchIdDefault = null;


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
		 * in the database column credit_card_payment.paypal_batch_id.
		 *
		 * NOTE: Always use the PaypalBatch property getter to correctly retrieve this PaypalBatch object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var PaypalBatch objPaypalBatch
		 */
		protected $objPaypalBatch;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column online_donation.credit_card_payment_id.
		 *
		 * NOTE: Always use the OnlineDonation property getter to correctly retrieve this OnlineDonation object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var OnlineDonation objOnlineDonation
		 */
		protected $objOnlineDonation;
		
		/**
		 * Used internally to manage whether the adjoined OnlineDonation object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyOnlineDonation;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column signup_payment.credit_card_payment_id.
		 *
		 * NOTE: Always use the SignupPayment property getter to correctly retrieve this SignupPayment object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SignupPayment objSignupPayment
		 */
		protected $objSignupPayment;
		
		/**
		 * Used internally to manage whether the adjoined SignupPayment object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtySignupPayment;





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
		 * Load a CreditCardPayment from PK Info
		 * @param integer $intId
		 * @return CreditCardPayment
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return CreditCardPayment::QuerySingle(
				QQ::Equal(QQN::CreditCardPayment()->Id, $intId)
			);
		}

		/**
		 * Load all CreditCardPayments
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CreditCardPayment[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call CreditCardPayment::QueryArray to perform the LoadAll query
			try {
				return CreditCardPayment::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all CreditCardPayments
		 * @return int
		 */
		public static function CountAll() {
			// Call CreditCardPayment::QueryCount to perform the CountAll query
			return CreditCardPayment::QueryCount(QQ::All());
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
			$objDatabase = CreditCardPayment::GetDatabase();

			// Create/Build out the QueryBuilder object with CreditCardPayment-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'credit_card_payment');
			CreditCardPayment::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('credit_card_payment');

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
		 * Static Qcodo Query method to query for a single CreditCardPayment object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CreditCardPayment the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CreditCardPayment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new CreditCardPayment object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = CreditCardPayment::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return CreditCardPayment::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of CreditCardPayment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CreditCardPayment[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CreditCardPayment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return CreditCardPayment::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = CreditCardPayment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of CreditCardPayment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CreditCardPayment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = CreditCardPayment::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'credit_card_payment_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with CreditCardPayment-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				CreditCardPayment::GetSelectFields($objQueryBuilder);
				CreditCardPayment::GetFromFields($objQueryBuilder);

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
			return CreditCardPayment::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this CreditCardPayment
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'credit_card_payment';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'credit_card_status_type_id', $strAliasPrefix . 'credit_card_status_type_id');
			$objBuilder->AddSelectItem($strTableName, 'credit_card_type_id', $strAliasPrefix . 'credit_card_type_id');
			$objBuilder->AddSelectItem($strTableName, 'credit_card_last_four', $strAliasPrefix . 'credit_card_last_four');
			$objBuilder->AddSelectItem($strTableName, 'transaction_code', $strAliasPrefix . 'transaction_code');
			$objBuilder->AddSelectItem($strTableName, 'authorization_code', $strAliasPrefix . 'authorization_code');
			$objBuilder->AddSelectItem($strTableName, 'address_match_code', $strAliasPrefix . 'address_match_code');
			$objBuilder->AddSelectItem($strTableName, 'date_authorized', $strAliasPrefix . 'date_authorized');
			$objBuilder->AddSelectItem($strTableName, 'date_captured', $strAliasPrefix . 'date_captured');
			$objBuilder->AddSelectItem($strTableName, 'amount_charged', $strAliasPrefix . 'amount_charged');
			$objBuilder->AddSelectItem($strTableName, 'amount_fee', $strAliasPrefix . 'amount_fee');
			$objBuilder->AddSelectItem($strTableName, 'amount_cleared', $strAliasPrefix . 'amount_cleared');
			$objBuilder->AddSelectItem($strTableName, 'paypal_batch_id', $strAliasPrefix . 'paypal_batch_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a CreditCardPayment from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this CreditCardPayment::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return CreditCardPayment
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the CreditCardPayment object
			$objToReturn = new CreditCardPayment();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'credit_card_status_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'credit_card_status_type_id'] : $strAliasPrefix . 'credit_card_status_type_id';
			$objToReturn->intCreditCardStatusTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'credit_card_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'credit_card_type_id'] : $strAliasPrefix . 'credit_card_type_id';
			$objToReturn->intCreditCardTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'credit_card_last_four', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'credit_card_last_four'] : $strAliasPrefix . 'credit_card_last_four';
			$objToReturn->strCreditCardLastFour = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'transaction_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'transaction_code'] : $strAliasPrefix . 'transaction_code';
			$objToReturn->strTransactionCode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'authorization_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'authorization_code'] : $strAliasPrefix . 'authorization_code';
			$objToReturn->strAuthorizationCode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_match_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_match_code'] : $strAliasPrefix . 'address_match_code';
			$objToReturn->strAddressMatchCode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_authorized', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_authorized'] : $strAliasPrefix . 'date_authorized';
			$objToReturn->dttDateAuthorized = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_captured', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_captured'] : $strAliasPrefix . 'date_captured';
			$objToReturn->dttDateCaptured = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount_charged', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount_charged'] : $strAliasPrefix . 'amount_charged';
			$objToReturn->fltAmountCharged = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount_fee', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount_fee'] : $strAliasPrefix . 'amount_fee';
			$objToReturn->fltAmountFee = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount_cleared', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount_cleared'] : $strAliasPrefix . 'amount_cleared';
			$objToReturn->fltAmountCleared = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'paypal_batch_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'paypal_batch_id'] : $strAliasPrefix . 'paypal_batch_id';
			$objToReturn->intPaypalBatchId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'credit_card_payment__';

			// Check for PaypalBatch Early Binding
			$strAlias = $strAliasPrefix . 'paypal_batch_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPaypalBatch = PaypalBatch::InstantiateDbRow($objDbRow, $strAliasPrefix . 'paypal_batch_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for OnlineDonation Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'onlinedonation__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objOnlineDonation = OnlineDonation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'onlinedonation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objOnlineDonation = false;
			}

			// Check for SignupPayment Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'signuppayment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objSignupPayment = SignupPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signuppayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objSignupPayment = false;
			}



			return $objToReturn;
		}

		/**
		 * Instantiate an array of CreditCardPayments from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return CreditCardPayment[]
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
					$objItem = CreditCardPayment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = CreditCardPayment::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single CreditCardPayment object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return CreditCardPayment next row resulting from the query
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
			return CreditCardPayment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single CreditCardPayment object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return CreditCardPayment
		*/
		public static function LoadById($intId) {
			return CreditCardPayment::QuerySingle(
				QQ::Equal(QQN::CreditCardPayment()->Id, $intId)
			);
		}
			
		/**
		 * Load a single CreditCardPayment object,
		 * by TransactionCode Index(es)
		 * @param string $strTransactionCode
		 * @return CreditCardPayment
		*/
		public static function LoadByTransactionCode($strTransactionCode) {
			return CreditCardPayment::QuerySingle(
				QQ::Equal(QQN::CreditCardPayment()->TransactionCode, $strTransactionCode)
			);
		}
			
		/**
		 * Load an array of CreditCardPayment objects,
		 * by CreditCardStatusTypeId Index(es)
		 * @param integer $intCreditCardStatusTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CreditCardPayment[]
		*/
		public static function LoadArrayByCreditCardStatusTypeId($intCreditCardStatusTypeId, $objOptionalClauses = null) {
			// Call CreditCardPayment::QueryArray to perform the LoadArrayByCreditCardStatusTypeId query
			try {
				return CreditCardPayment::QueryArray(
					QQ::Equal(QQN::CreditCardPayment()->CreditCardStatusTypeId, $intCreditCardStatusTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CreditCardPayments
		 * by CreditCardStatusTypeId Index(es)
		 * @param integer $intCreditCardStatusTypeId
		 * @return int
		*/
		public static function CountByCreditCardStatusTypeId($intCreditCardStatusTypeId) {
			// Call CreditCardPayment::QueryCount to perform the CountByCreditCardStatusTypeId query
			return CreditCardPayment::QueryCount(
				QQ::Equal(QQN::CreditCardPayment()->CreditCardStatusTypeId, $intCreditCardStatusTypeId)
			);
		}
			
		/**
		 * Load an array of CreditCardPayment objects,
		 * by CreditCardTypeId Index(es)
		 * @param integer $intCreditCardTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CreditCardPayment[]
		*/
		public static function LoadArrayByCreditCardTypeId($intCreditCardTypeId, $objOptionalClauses = null) {
			// Call CreditCardPayment::QueryArray to perform the LoadArrayByCreditCardTypeId query
			try {
				return CreditCardPayment::QueryArray(
					QQ::Equal(QQN::CreditCardPayment()->CreditCardTypeId, $intCreditCardTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CreditCardPayments
		 * by CreditCardTypeId Index(es)
		 * @param integer $intCreditCardTypeId
		 * @return int
		*/
		public static function CountByCreditCardTypeId($intCreditCardTypeId) {
			// Call CreditCardPayment::QueryCount to perform the CountByCreditCardTypeId query
			return CreditCardPayment::QueryCount(
				QQ::Equal(QQN::CreditCardPayment()->CreditCardTypeId, $intCreditCardTypeId)
			);
		}
			
		/**
		 * Load an array of CreditCardPayment objects,
		 * by PaypalBatchId Index(es)
		 * @param integer $intPaypalBatchId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CreditCardPayment[]
		*/
		public static function LoadArrayByPaypalBatchId($intPaypalBatchId, $objOptionalClauses = null) {
			// Call CreditCardPayment::QueryArray to perform the LoadArrayByPaypalBatchId query
			try {
				return CreditCardPayment::QueryArray(
					QQ::Equal(QQN::CreditCardPayment()->PaypalBatchId, $intPaypalBatchId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CreditCardPayments
		 * by PaypalBatchId Index(es)
		 * @param integer $intPaypalBatchId
		 * @return int
		*/
		public static function CountByPaypalBatchId($intPaypalBatchId) {
			// Call CreditCardPayment::QueryCount to perform the CountByPaypalBatchId query
			return CreditCardPayment::QueryCount(
				QQ::Equal(QQN::CreditCardPayment()->PaypalBatchId, $intPaypalBatchId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this CreditCardPayment
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = CreditCardPayment::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `credit_card_payment` (
							`credit_card_status_type_id`,
							`credit_card_type_id`,
							`credit_card_last_four`,
							`transaction_code`,
							`authorization_code`,
							`address_match_code`,
							`date_authorized`,
							`date_captured`,
							`amount_charged`,
							`amount_fee`,
							`amount_cleared`,
							`paypal_batch_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCreditCardStatusTypeId) . ',
							' . $objDatabase->SqlVariable($this->intCreditCardTypeId) . ',
							' . $objDatabase->SqlVariable($this->strCreditCardLastFour) . ',
							' . $objDatabase->SqlVariable($this->strTransactionCode) . ',
							' . $objDatabase->SqlVariable($this->strAuthorizationCode) . ',
							' . $objDatabase->SqlVariable($this->strAddressMatchCode) . ',
							' . $objDatabase->SqlVariable($this->dttDateAuthorized) . ',
							' . $objDatabase->SqlVariable($this->dttDateCaptured) . ',
							' . $objDatabase->SqlVariable($this->fltAmountCharged) . ',
							' . $objDatabase->SqlVariable($this->fltAmountFee) . ',
							' . $objDatabase->SqlVariable($this->fltAmountCleared) . ',
							' . $objDatabase->SqlVariable($this->intPaypalBatchId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('credit_card_payment', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`credit_card_payment`
						SET
							`credit_card_status_type_id` = ' . $objDatabase->SqlVariable($this->intCreditCardStatusTypeId) . ',
							`credit_card_type_id` = ' . $objDatabase->SqlVariable($this->intCreditCardTypeId) . ',
							`credit_card_last_four` = ' . $objDatabase->SqlVariable($this->strCreditCardLastFour) . ',
							`transaction_code` = ' . $objDatabase->SqlVariable($this->strTransactionCode) . ',
							`authorization_code` = ' . $objDatabase->SqlVariable($this->strAuthorizationCode) . ',
							`address_match_code` = ' . $objDatabase->SqlVariable($this->strAddressMatchCode) . ',
							`date_authorized` = ' . $objDatabase->SqlVariable($this->dttDateAuthorized) . ',
							`date_captured` = ' . $objDatabase->SqlVariable($this->dttDateCaptured) . ',
							`amount_charged` = ' . $objDatabase->SqlVariable($this->fltAmountCharged) . ',
							`amount_fee` = ' . $objDatabase->SqlVariable($this->fltAmountFee) . ',
							`amount_cleared` = ' . $objDatabase->SqlVariable($this->fltAmountCleared) . ',
							`paypal_batch_id` = ' . $objDatabase->SqlVariable($this->intPaypalBatchId) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined OnlineDonation object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyOnlineDonation) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = OnlineDonation::LoadByCreditCardPaymentId($this->intId)) {
						$objAssociated->CreditCardPaymentId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objOnlineDonation) {
						$this->objOnlineDonation->CreditCardPaymentId = $this->intId;
						$this->objOnlineDonation->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyOnlineDonation = false;
				}
		
		
				// Update the adjoined SignupPayment object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtySignupPayment) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = SignupPayment::LoadByCreditCardPaymentId($this->intId)) {
						$objAssociated->CreditCardPaymentId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objSignupPayment) {
						$this->objSignupPayment->CreditCardPaymentId = $this->intId;
						$this->objSignupPayment->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtySignupPayment = false;
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
		 * Delete this CreditCardPayment
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this CreditCardPayment with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = CreditCardPayment::GetDatabase();

			
			
			// Update the adjoined OnlineDonation object (if applicable) and perform the unassociation

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = OnlineDonation::LoadByCreditCardPaymentId($this->intId)) {
				$objAssociated->CreditCardPaymentId = null;
				$objAssociated->Save();
			}
			
			
			// Update the adjoined SignupPayment object (if applicable) and perform the unassociation

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = SignupPayment::LoadByCreditCardPaymentId($this->intId)) {
				$objAssociated->CreditCardPaymentId = null;
				$objAssociated->Save();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`credit_card_payment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all CreditCardPayments
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = CreditCardPayment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`credit_card_payment`');
		}

		/**
		 * Truncate credit_card_payment table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = CreditCardPayment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `credit_card_payment`');
		}

		/**
		 * Reload this CreditCardPayment from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved CreditCardPayment object.');

			// Reload the Object
			$objReloaded = CreditCardPayment::Load($this->intId);

			// Update $this's local variables to match
			$this->CreditCardStatusTypeId = $objReloaded->CreditCardStatusTypeId;
			$this->CreditCardTypeId = $objReloaded->CreditCardTypeId;
			$this->strCreditCardLastFour = $objReloaded->strCreditCardLastFour;
			$this->strTransactionCode = $objReloaded->strTransactionCode;
			$this->strAuthorizationCode = $objReloaded->strAuthorizationCode;
			$this->strAddressMatchCode = $objReloaded->strAddressMatchCode;
			$this->dttDateAuthorized = $objReloaded->dttDateAuthorized;
			$this->dttDateCaptured = $objReloaded->dttDateCaptured;
			$this->fltAmountCharged = $objReloaded->fltAmountCharged;
			$this->fltAmountFee = $objReloaded->fltAmountFee;
			$this->fltAmountCleared = $objReloaded->fltAmountCleared;
			$this->PaypalBatchId = $objReloaded->PaypalBatchId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = CreditCardPayment::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `credit_card_payment` (
					`id`,
					`credit_card_status_type_id`,
					`credit_card_type_id`,
					`credit_card_last_four`,
					`transaction_code`,
					`authorization_code`,
					`address_match_code`,
					`date_authorized`,
					`date_captured`,
					`amount_charged`,
					`amount_fee`,
					`amount_cleared`,
					`paypal_batch_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intCreditCardStatusTypeId) . ',
					' . $objDatabase->SqlVariable($this->intCreditCardTypeId) . ',
					' . $objDatabase->SqlVariable($this->strCreditCardLastFour) . ',
					' . $objDatabase->SqlVariable($this->strTransactionCode) . ',
					' . $objDatabase->SqlVariable($this->strAuthorizationCode) . ',
					' . $objDatabase->SqlVariable($this->strAddressMatchCode) . ',
					' . $objDatabase->SqlVariable($this->dttDateAuthorized) . ',
					' . $objDatabase->SqlVariable($this->dttDateCaptured) . ',
					' . $objDatabase->SqlVariable($this->fltAmountCharged) . ',
					' . $objDatabase->SqlVariable($this->fltAmountFee) . ',
					' . $objDatabase->SqlVariable($this->fltAmountCleared) . ',
					' . $objDatabase->SqlVariable($this->intPaypalBatchId) . ',
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
		 * @return CreditCardPayment[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = CreditCardPayment::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM credit_card_payment WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return CreditCardPayment::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return CreditCardPayment[]
		 */
		public function GetJournal() {
			return CreditCardPayment::GetJournalForId($this->intId);
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

				case 'CreditCardStatusTypeId':
					// Gets the value for intCreditCardStatusTypeId (Not Null)
					// @return integer
					return $this->intCreditCardStatusTypeId;

				case 'CreditCardTypeId':
					// Gets the value for intCreditCardTypeId (Not Null)
					// @return integer
					return $this->intCreditCardTypeId;

				case 'CreditCardLastFour':
					// Gets the value for strCreditCardLastFour (Not Null)
					// @return string
					return $this->strCreditCardLastFour;

				case 'TransactionCode':
					// Gets the value for strTransactionCode (Unique)
					// @return string
					return $this->strTransactionCode;

				case 'AuthorizationCode':
					// Gets the value for strAuthorizationCode 
					// @return string
					return $this->strAuthorizationCode;

				case 'AddressMatchCode':
					// Gets the value for strAddressMatchCode 
					// @return string
					return $this->strAddressMatchCode;

				case 'DateAuthorized':
					// Gets the value for dttDateAuthorized 
					// @return QDateTime
					return $this->dttDateAuthorized;

				case 'DateCaptured':
					// Gets the value for dttDateCaptured 
					// @return QDateTime
					return $this->dttDateCaptured;

				case 'AmountCharged':
					// Gets the value for fltAmountCharged 
					// @return double
					return $this->fltAmountCharged;

				case 'AmountFee':
					// Gets the value for fltAmountFee 
					// @return double
					return $this->fltAmountFee;

				case 'AmountCleared':
					// Gets the value for fltAmountCleared 
					// @return double
					return $this->fltAmountCleared;

				case 'PaypalBatchId':
					// Gets the value for intPaypalBatchId 
					// @return integer
					return $this->intPaypalBatchId;


				///////////////////
				// Member Objects
				///////////////////
				case 'PaypalBatch':
					// Gets the value for the PaypalBatch object referenced by intPaypalBatchId 
					// @return PaypalBatch
					try {
						if ((!$this->objPaypalBatch) && (!is_null($this->intPaypalBatchId)))
							$this->objPaypalBatch = PaypalBatch::Load($this->intPaypalBatchId);
						return $this->objPaypalBatch;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'OnlineDonation':
					// Gets the value for the OnlineDonation object that uniquely references this CreditCardPayment
					// by objOnlineDonation (Unique)
					// @return OnlineDonation
					try {
						if ($this->objOnlineDonation === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objOnlineDonation)
							$this->objOnlineDonation = OnlineDonation::LoadByCreditCardPaymentId($this->intId);
						return $this->objOnlineDonation;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'SignupPayment':
					// Gets the value for the SignupPayment object that uniquely references this CreditCardPayment
					// by objSignupPayment (Unique)
					// @return SignupPayment
					try {
						if ($this->objSignupPayment === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objSignupPayment)
							$this->objSignupPayment = SignupPayment::LoadByCreditCardPaymentId($this->intId);
						return $this->objSignupPayment;
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
				case 'CreditCardStatusTypeId':
					// Sets the value for intCreditCardStatusTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intCreditCardStatusTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreditCardTypeId':
					// Sets the value for intCreditCardTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intCreditCardTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreditCardLastFour':
					// Sets the value for strCreditCardLastFour (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCreditCardLastFour = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TransactionCode':
					// Sets the value for strTransactionCode (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTransactionCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AuthorizationCode':
					// Sets the value for strAuthorizationCode 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAuthorizationCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AddressMatchCode':
					// Sets the value for strAddressMatchCode 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAddressMatchCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateAuthorized':
					// Sets the value for dttDateAuthorized 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateAuthorized = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateCaptured':
					// Sets the value for dttDateCaptured 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateCaptured = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AmountCharged':
					// Sets the value for fltAmountCharged 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltAmountCharged = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AmountFee':
					// Sets the value for fltAmountFee 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltAmountFee = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AmountCleared':
					// Sets the value for fltAmountCleared 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltAmountCleared = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PaypalBatchId':
					// Sets the value for intPaypalBatchId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPaypalBatch = null;
						return ($this->intPaypalBatchId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'PaypalBatch':
					// Sets the value for the PaypalBatch object referenced by intPaypalBatchId 
					// @param PaypalBatch $mixValue
					// @return PaypalBatch
					if (is_null($mixValue)) {
						$this->intPaypalBatchId = null;
						$this->objPaypalBatch = null;
						return null;
					} else {
						// Make sure $mixValue actually is a PaypalBatch object
						try {
							$mixValue = QType::Cast($mixValue, 'PaypalBatch');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED PaypalBatch object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved PaypalBatch for this CreditCardPayment');

						// Update Local Member Variables
						$this->objPaypalBatch = $mixValue;
						$this->intPaypalBatchId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'OnlineDonation':
					// Sets the value for the OnlineDonation object referenced by objOnlineDonation (Unique)
					// @param OnlineDonation $mixValue
					// @return OnlineDonation
					if (is_null($mixValue)) {
						$this->objOnlineDonation = null;

						// Make sure we update the adjoined OnlineDonation object the next time we call Save()
						$this->blnDirtyOnlineDonation = true;

						return null;
					} else {
						// Make sure $mixValue actually is a OnlineDonation object
						try {
							$mixValue = QType::Cast($mixValue, 'OnlineDonation');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objOnlineDonation to a DIFFERENT $mixValue?
						if ((!$this->OnlineDonation) || ($this->OnlineDonation->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined OnlineDonation object the next time we call Save()
							$this->blnDirtyOnlineDonation = true;

							// Update Local Member Variable
							$this->objOnlineDonation = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'SignupPayment':
					// Sets the value for the SignupPayment object referenced by objSignupPayment (Unique)
					// @param SignupPayment $mixValue
					// @return SignupPayment
					if (is_null($mixValue)) {
						$this->objSignupPayment = null;

						// Make sure we update the adjoined SignupPayment object the next time we call Save()
						$this->blnDirtySignupPayment = true;

						return null;
					} else {
						// Make sure $mixValue actually is a SignupPayment object
						try {
							$mixValue = QType::Cast($mixValue, 'SignupPayment');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objSignupPayment to a DIFFERENT $mixValue?
						if ((!$this->SignupPayment) || ($this->SignupPayment->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined SignupPayment object the next time we call Save()
							$this->blnDirtySignupPayment = true;

							// Update Local Member Variable
							$this->objSignupPayment = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

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
			$strToReturn = '<complexType name="CreditCardPayment"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="CreditCardStatusTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="CreditCardTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="CreditCardLastFour" type="xsd:string"/>';
			$strToReturn .= '<element name="TransactionCode" type="xsd:string"/>';
			$strToReturn .= '<element name="AuthorizationCode" type="xsd:string"/>';
			$strToReturn .= '<element name="AddressMatchCode" type="xsd:string"/>';
			$strToReturn .= '<element name="DateAuthorized" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateCaptured" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="AmountCharged" type="xsd:float"/>';
			$strToReturn .= '<element name="AmountFee" type="xsd:float"/>';
			$strToReturn .= '<element name="AmountCleared" type="xsd:float"/>';
			$strToReturn .= '<element name="PaypalBatch" type="xsd1:PaypalBatch"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('CreditCardPayment', $strComplexTypeArray)) {
				$strComplexTypeArray['CreditCardPayment'] = CreditCardPayment::GetSoapComplexTypeXml();
				PaypalBatch::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, CreditCardPayment::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new CreditCardPayment();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'CreditCardStatusTypeId'))
				$objToReturn->intCreditCardStatusTypeId = $objSoapObject->CreditCardStatusTypeId;
			if (property_exists($objSoapObject, 'CreditCardTypeId'))
				$objToReturn->intCreditCardTypeId = $objSoapObject->CreditCardTypeId;
			if (property_exists($objSoapObject, 'CreditCardLastFour'))
				$objToReturn->strCreditCardLastFour = $objSoapObject->CreditCardLastFour;
			if (property_exists($objSoapObject, 'TransactionCode'))
				$objToReturn->strTransactionCode = $objSoapObject->TransactionCode;
			if (property_exists($objSoapObject, 'AuthorizationCode'))
				$objToReturn->strAuthorizationCode = $objSoapObject->AuthorizationCode;
			if (property_exists($objSoapObject, 'AddressMatchCode'))
				$objToReturn->strAddressMatchCode = $objSoapObject->AddressMatchCode;
			if (property_exists($objSoapObject, 'DateAuthorized'))
				$objToReturn->dttDateAuthorized = new QDateTime($objSoapObject->DateAuthorized);
			if (property_exists($objSoapObject, 'DateCaptured'))
				$objToReturn->dttDateCaptured = new QDateTime($objSoapObject->DateCaptured);
			if (property_exists($objSoapObject, 'AmountCharged'))
				$objToReturn->fltAmountCharged = $objSoapObject->AmountCharged;
			if (property_exists($objSoapObject, 'AmountFee'))
				$objToReturn->fltAmountFee = $objSoapObject->AmountFee;
			if (property_exists($objSoapObject, 'AmountCleared'))
				$objToReturn->fltAmountCleared = $objSoapObject->AmountCleared;
			if ((property_exists($objSoapObject, 'PaypalBatch')) &&
				($objSoapObject->PaypalBatch))
				$objToReturn->PaypalBatch = PaypalBatch::GetObjectFromSoapObject($objSoapObject->PaypalBatch);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, CreditCardPayment::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttDateAuthorized)
				$objObject->dttDateAuthorized = $objObject->dttDateAuthorized->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateCaptured)
				$objObject->dttDateCaptured = $objObject->dttDateCaptured->__toString(QDateTime::FormatSoap);
			if ($objObject->objPaypalBatch)
				$objObject->objPaypalBatch = PaypalBatch::GetSoapObjectFromObject($objObject->objPaypalBatch, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPaypalBatchId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $CreditCardStatusTypeId
	 * @property-read QQNode $CreditCardTypeId
	 * @property-read QQNode $CreditCardLastFour
	 * @property-read QQNode $TransactionCode
	 * @property-read QQNode $AuthorizationCode
	 * @property-read QQNode $AddressMatchCode
	 * @property-read QQNode $DateAuthorized
	 * @property-read QQNode $DateCaptured
	 * @property-read QQNode $AmountCharged
	 * @property-read QQNode $AmountFee
	 * @property-read QQNode $AmountCleared
	 * @property-read QQNode $PaypalBatchId
	 * @property-read QQNodePaypalBatch $PaypalBatch
	 * @property-read QQReverseReferenceNodeOnlineDonation $OnlineDonation
	 * @property-read QQReverseReferenceNodeSignupPayment $SignupPayment
	 */
	class QQNodeCreditCardPayment extends QQNode {
		protected $strTableName = 'credit_card_payment';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'CreditCardPayment';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CreditCardStatusTypeId':
					return new QQNode('credit_card_status_type_id', 'CreditCardStatusTypeId', 'integer', $this);
				case 'CreditCardTypeId':
					return new QQNode('credit_card_type_id', 'CreditCardTypeId', 'integer', $this);
				case 'CreditCardLastFour':
					return new QQNode('credit_card_last_four', 'CreditCardLastFour', 'string', $this);
				case 'TransactionCode':
					return new QQNode('transaction_code', 'TransactionCode', 'string', $this);
				case 'AuthorizationCode':
					return new QQNode('authorization_code', 'AuthorizationCode', 'string', $this);
				case 'AddressMatchCode':
					return new QQNode('address_match_code', 'AddressMatchCode', 'string', $this);
				case 'DateAuthorized':
					return new QQNode('date_authorized', 'DateAuthorized', 'QDateTime', $this);
				case 'DateCaptured':
					return new QQNode('date_captured', 'DateCaptured', 'QDateTime', $this);
				case 'AmountCharged':
					return new QQNode('amount_charged', 'AmountCharged', 'double', $this);
				case 'AmountFee':
					return new QQNode('amount_fee', 'AmountFee', 'double', $this);
				case 'AmountCleared':
					return new QQNode('amount_cleared', 'AmountCleared', 'double', $this);
				case 'PaypalBatchId':
					return new QQNode('paypal_batch_id', 'PaypalBatchId', 'integer', $this);
				case 'PaypalBatch':
					return new QQNodePaypalBatch('paypal_batch_id', 'PaypalBatch', 'integer', $this);
				case 'OnlineDonation':
					return new QQReverseReferenceNodeOnlineDonation($this, 'onlinedonation', 'reverse_reference', 'credit_card_payment_id', 'OnlineDonation');
				case 'SignupPayment':
					return new QQReverseReferenceNodeSignupPayment($this, 'signuppayment', 'reverse_reference', 'credit_card_payment_id', 'SignupPayment');

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
	 * @property-read QQNode $CreditCardStatusTypeId
	 * @property-read QQNode $CreditCardTypeId
	 * @property-read QQNode $CreditCardLastFour
	 * @property-read QQNode $TransactionCode
	 * @property-read QQNode $AuthorizationCode
	 * @property-read QQNode $AddressMatchCode
	 * @property-read QQNode $DateAuthorized
	 * @property-read QQNode $DateCaptured
	 * @property-read QQNode $AmountCharged
	 * @property-read QQNode $AmountFee
	 * @property-read QQNode $AmountCleared
	 * @property-read QQNode $PaypalBatchId
	 * @property-read QQNodePaypalBatch $PaypalBatch
	 * @property-read QQReverseReferenceNodeOnlineDonation $OnlineDonation
	 * @property-read QQReverseReferenceNodeSignupPayment $SignupPayment
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeCreditCardPayment extends QQReverseReferenceNode {
		protected $strTableName = 'credit_card_payment';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'CreditCardPayment';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CreditCardStatusTypeId':
					return new QQNode('credit_card_status_type_id', 'CreditCardStatusTypeId', 'integer', $this);
				case 'CreditCardTypeId':
					return new QQNode('credit_card_type_id', 'CreditCardTypeId', 'integer', $this);
				case 'CreditCardLastFour':
					return new QQNode('credit_card_last_four', 'CreditCardLastFour', 'string', $this);
				case 'TransactionCode':
					return new QQNode('transaction_code', 'TransactionCode', 'string', $this);
				case 'AuthorizationCode':
					return new QQNode('authorization_code', 'AuthorizationCode', 'string', $this);
				case 'AddressMatchCode':
					return new QQNode('address_match_code', 'AddressMatchCode', 'string', $this);
				case 'DateAuthorized':
					return new QQNode('date_authorized', 'DateAuthorized', 'QDateTime', $this);
				case 'DateCaptured':
					return new QQNode('date_captured', 'DateCaptured', 'QDateTime', $this);
				case 'AmountCharged':
					return new QQNode('amount_charged', 'AmountCharged', 'double', $this);
				case 'AmountFee':
					return new QQNode('amount_fee', 'AmountFee', 'double', $this);
				case 'AmountCleared':
					return new QQNode('amount_cleared', 'AmountCleared', 'double', $this);
				case 'PaypalBatchId':
					return new QQNode('paypal_batch_id', 'PaypalBatchId', 'integer', $this);
				case 'PaypalBatch':
					return new QQNodePaypalBatch('paypal_batch_id', 'PaypalBatch', 'integer', $this);
				case 'OnlineDonation':
					return new QQReverseReferenceNodeOnlineDonation($this, 'onlinedonation', 'reverse_reference', 'credit_card_payment_id', 'OnlineDonation');
				case 'SignupPayment':
					return new QQReverseReferenceNodeSignupPayment($this, 'signuppayment', 'reverse_reference', 'credit_card_payment_id', 'SignupPayment');

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