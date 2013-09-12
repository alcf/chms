<?php
	/**
	 * The abstract RecurringPaymentsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the RecurringPayments subclass which
	 * extends this RecurringPaymentsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the RecurringPayments class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Name the value for strName 
	 * @property integer $PaymentPeriodId the value for intPaymentPeriodId (Not Null)
	 * @property double $Amount the value for fltAmount 
	 * @property QDateTime $StartDate the value for dttStartDate 
	 * @property QDateTime $EndDate the value for dttEndDate 
	 * @property boolean $AuthorizeFlag the value for blnAuthorizeFlag 
	 * @property string $CardHolderName the value for strCardHolderName 
	 * @property string $Address1 the value for strAddress1 
	 * @property string $Address2 the value for strAddress2 
	 * @property string $City the value for strCity 
	 * @property string $State the value for strState 
	 * @property string $Zip the value for strZip 
	 * @property integer $CreditCardTypeId the value for intCreditCardTypeId (Not Null)
	 * @property string $AccountNumber the value for strAccountNumber 
	 * @property string $ExpirationDate the value for strExpirationDate 
	 * @property string $SecurityCode the value for strSecurityCode 
	 * @property PaymentPeriod $PaymentPeriod the value for the PaymentPeriod object referenced by intPaymentPeriodId (Not Null)
	 * @property RecurringDonation $RecurringDonationAsRecurringPayment the value for the RecurringDonation object that uniquely references this RecurringPayments
	 * @property OnlineDonation $_OnlineDonationAsRecurringPayment the value for the private _objOnlineDonationAsRecurringPayment (Read-Only) if set due to an expansion on the online_donation.recurring_payment_id reverse relationship
	 * @property OnlineDonation[] $_OnlineDonationAsRecurringPaymentArray the value for the private _objOnlineDonationAsRecurringPaymentArray (Read-Only) if set due to an ExpandAsArray on the online_donation.recurring_payment_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class RecurringPaymentsGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column recurring_payments.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.payment_period_id
		 * @var integer intPaymentPeriodId
		 */
		protected $intPaymentPeriodId;
		const PaymentPeriodIdDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.amount
		 * @var double fltAmount
		 */
		protected $fltAmount;
		const AmountDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.start_date
		 * @var QDateTime dttStartDate
		 */
		protected $dttStartDate;
		const StartDateDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.end_date
		 * @var QDateTime dttEndDate
		 */
		protected $dttEndDate;
		const EndDateDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.authorize_flag
		 * @var boolean blnAuthorizeFlag
		 */
		protected $blnAuthorizeFlag;
		const AuthorizeFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.card_holder_name
		 * @var string strCardHolderName
		 */
		protected $strCardHolderName;
		const CardHolderNameMaxLength = 255;
		const CardHolderNameDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.address1
		 * @var string strAddress1
		 */
		protected $strAddress1;
		const Address1MaxLength = 200;
		const Address1Default = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.address2
		 * @var string strAddress2
		 */
		protected $strAddress2;
		const Address2MaxLength = 200;
		const Address2Default = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.city
		 * @var string strCity
		 */
		protected $strCity;
		const CityMaxLength = 200;
		const CityDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.state
		 * @var string strState
		 */
		protected $strState;
		const StateMaxLength = 100;
		const StateDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.zip
		 * @var string strZip
		 */
		protected $strZip;
		const ZipMaxLength = 10;
		const ZipDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.credit_card_type_id
		 * @var integer intCreditCardTypeId
		 */
		protected $intCreditCardTypeId;
		const CreditCardTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.account_number
		 * @var string strAccountNumber
		 */
		protected $strAccountNumber;
		const AccountNumberMaxLength = 30;
		const AccountNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.expiration_date
		 * @var string strExpirationDate
		 */
		protected $strExpirationDate;
		const ExpirationDateMaxLength = 6;
		const ExpirationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_payments.security_code
		 * @var string strSecurityCode
		 */
		protected $strSecurityCode;
		const SecurityCodeMaxLength = 255;
		const SecurityCodeDefault = null;


		/**
		 * Private member variable that stores a reference to a single OnlineDonationAsRecurringPayment object
		 * (of type OnlineDonation), if this RecurringPayments object was restored with
		 * an expansion on the online_donation association table.
		 * @var OnlineDonation _objOnlineDonationAsRecurringPayment;
		 */
		private $_objOnlineDonationAsRecurringPayment;

		/**
		 * Private member variable that stores a reference to an array of OnlineDonationAsRecurringPayment objects
		 * (of type OnlineDonation[]), if this RecurringPayments object was restored with
		 * an ExpandAsArray on the online_donation association table.
		 * @var OnlineDonation[] _objOnlineDonationAsRecurringPaymentArray;
		 */
		private $_objOnlineDonationAsRecurringPaymentArray = array();

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
		 * in the database column recurring_payments.payment_period_id.
		 *
		 * NOTE: Always use the PaymentPeriod property getter to correctly retrieve this PaymentPeriod object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var PaymentPeriod objPaymentPeriod
		 */
		protected $objPaymentPeriod;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column recurring_donation.recurring_payment_id.
		 *
		 * NOTE: Always use the RecurringDonationAsRecurringPayment property getter to correctly retrieve this RecurringDonation object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var RecurringDonation objRecurringDonationAsRecurringPayment
		 */
		protected $objRecurringDonationAsRecurringPayment;
		
		/**
		 * Used internally to manage whether the adjoined RecurringDonationAsRecurringPayment object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyRecurringDonationAsRecurringPayment;





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
		 * Load a RecurringPayments from PK Info
		 * @param integer $intId
		 * @return RecurringPayments
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return RecurringPayments::QuerySingle(
				QQ::Equal(QQN::RecurringPayments()->Id, $intId)
			);
		}

		/**
		 * Load all RecurringPaymentses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RecurringPayments[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call RecurringPayments::QueryArray to perform the LoadAll query
			try {
				return RecurringPayments::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all RecurringPaymentses
		 * @return int
		 */
		public static function CountAll() {
			// Call RecurringPayments::QueryCount to perform the CountAll query
			return RecurringPayments::QueryCount(QQ::All());
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
			$objDatabase = RecurringPayments::GetDatabase();

			// Create/Build out the QueryBuilder object with RecurringPayments-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'recurring_payments');
			RecurringPayments::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('recurring_payments');

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
		 * Static Qcodo Query method to query for a single RecurringPayments object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RecurringPayments the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RecurringPayments::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new RecurringPayments object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = RecurringPayments::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return RecurringPayments::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of RecurringPayments objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RecurringPayments[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RecurringPayments::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return RecurringPayments::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = RecurringPayments::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of RecurringPayments objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RecurringPayments::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = RecurringPayments::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'recurring_payments_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with RecurringPayments-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				RecurringPayments::GetSelectFields($objQueryBuilder);
				RecurringPayments::GetFromFields($objQueryBuilder);

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
			return RecurringPayments::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this RecurringPayments
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'recurring_payments';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'payment_period_id', $strAliasPrefix . 'payment_period_id');
			$objBuilder->AddSelectItem($strTableName, 'amount', $strAliasPrefix . 'amount');
			$objBuilder->AddSelectItem($strTableName, 'start_date', $strAliasPrefix . 'start_date');
			$objBuilder->AddSelectItem($strTableName, 'end_date', $strAliasPrefix . 'end_date');
			$objBuilder->AddSelectItem($strTableName, 'authorize_flag', $strAliasPrefix . 'authorize_flag');
			$objBuilder->AddSelectItem($strTableName, 'card_holder_name', $strAliasPrefix . 'card_holder_name');
			$objBuilder->AddSelectItem($strTableName, 'address1', $strAliasPrefix . 'address1');
			$objBuilder->AddSelectItem($strTableName, 'address2', $strAliasPrefix . 'address2');
			$objBuilder->AddSelectItem($strTableName, 'city', $strAliasPrefix . 'city');
			$objBuilder->AddSelectItem($strTableName, 'state', $strAliasPrefix . 'state');
			$objBuilder->AddSelectItem($strTableName, 'zip', $strAliasPrefix . 'zip');
			$objBuilder->AddSelectItem($strTableName, 'credit_card_type_id', $strAliasPrefix . 'credit_card_type_id');
			$objBuilder->AddSelectItem($strTableName, 'account_number', $strAliasPrefix . 'account_number');
			$objBuilder->AddSelectItem($strTableName, 'expiration_date', $strAliasPrefix . 'expiration_date');
			$objBuilder->AddSelectItem($strTableName, 'security_code', $strAliasPrefix . 'security_code');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a RecurringPayments from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this RecurringPayments::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return RecurringPayments
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
					$strAliasPrefix = 'recurring_payments__';


				$strAlias = $strAliasPrefix . 'onlinedonationasrecurringpayment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objOnlineDonationAsRecurringPaymentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objOnlineDonationAsRecurringPaymentArray[$intPreviousChildItemCount - 1];
						$objChildItem = OnlineDonation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'onlinedonationasrecurringpayment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objOnlineDonationAsRecurringPaymentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objOnlineDonationAsRecurringPaymentArray[] = OnlineDonation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'onlinedonationasrecurringpayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'recurring_payments__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the RecurringPayments object
			$objToReturn = new RecurringPayments();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'payment_period_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'payment_period_id'] : $strAliasPrefix . 'payment_period_id';
			$objToReturn->intPaymentPeriodId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount'] : $strAliasPrefix . 'amount';
			$objToReturn->fltAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'start_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'start_date'] : $strAliasPrefix . 'start_date';
			$objToReturn->dttStartDate = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'end_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'end_date'] : $strAliasPrefix . 'end_date';
			$objToReturn->dttEndDate = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'authorize_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'authorize_flag'] : $strAliasPrefix . 'authorize_flag';
			$objToReturn->blnAuthorizeFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'card_holder_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'card_holder_name'] : $strAliasPrefix . 'card_holder_name';
			$objToReturn->strCardHolderName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'address1', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address1'] : $strAliasPrefix . 'address1';
			$objToReturn->strAddress1 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'address2', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address2'] : $strAliasPrefix . 'address2';
			$objToReturn->strAddress2 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'city', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'city'] : $strAliasPrefix . 'city';
			$objToReturn->strCity = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'state', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'state'] : $strAliasPrefix . 'state';
			$objToReturn->strState = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'zip', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'zip'] : $strAliasPrefix . 'zip';
			$objToReturn->strZip = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'credit_card_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'credit_card_type_id'] : $strAliasPrefix . 'credit_card_type_id';
			$objToReturn->intCreditCardTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'account_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'account_number'] : $strAliasPrefix . 'account_number';
			$objToReturn->strAccountNumber = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'expiration_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'expiration_date'] : $strAliasPrefix . 'expiration_date';
			$objToReturn->strExpirationDate = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'security_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'security_code'] : $strAliasPrefix . 'security_code';
			$objToReturn->strSecurityCode = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'recurring_payments__';

			// Check for PaymentPeriod Early Binding
			$strAlias = $strAliasPrefix . 'payment_period_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPaymentPeriod = PaymentPeriod::InstantiateDbRow($objDbRow, $strAliasPrefix . 'payment_period_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for RecurringDonationAsRecurringPayment Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'recurringdonationasrecurringpayment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objRecurringDonationAsRecurringPayment = RecurringDonation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recurringdonationasrecurringpayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objRecurringDonationAsRecurringPayment = false;
			}



			// Check for OnlineDonationAsRecurringPayment Virtual Binding
			$strAlias = $strAliasPrefix . 'onlinedonationasrecurringpayment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objOnlineDonationAsRecurringPaymentArray[] = OnlineDonation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'onlinedonationasrecurringpayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objOnlineDonationAsRecurringPayment = OnlineDonation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'onlinedonationasrecurringpayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of RecurringPaymentses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return RecurringPayments[]
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
					$objItem = RecurringPayments::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = RecurringPayments::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single RecurringPayments object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return RecurringPayments next row resulting from the query
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
			return RecurringPayments::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single RecurringPayments object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return RecurringPayments
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return RecurringPayments::QuerySingle(
				QQ::Equal(QQN::RecurringPayments()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of RecurringPayments objects,
		 * by PaymentPeriodId Index(es)
		 * @param integer $intPaymentPeriodId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RecurringPayments[]
		*/
		public static function LoadArrayByPaymentPeriodId($intPaymentPeriodId, $objOptionalClauses = null) {
			// Call RecurringPayments::QueryArray to perform the LoadArrayByPaymentPeriodId query
			try {
				return RecurringPayments::QueryArray(
					QQ::Equal(QQN::RecurringPayments()->PaymentPeriodId, $intPaymentPeriodId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RecurringPaymentses
		 * by PaymentPeriodId Index(es)
		 * @param integer $intPaymentPeriodId
		 * @return int
		*/
		public static function CountByPaymentPeriodId($intPaymentPeriodId, $objOptionalClauses = null) {
			// Call RecurringPayments::QueryCount to perform the CountByPaymentPeriodId query
			return RecurringPayments::QueryCount(
				QQ::Equal(QQN::RecurringPayments()->PaymentPeriodId, $intPaymentPeriodId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of RecurringPayments objects,
		 * by CreditCardTypeId Index(es)
		 * @param integer $intCreditCardTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RecurringPayments[]
		*/
		public static function LoadArrayByCreditCardTypeId($intCreditCardTypeId, $objOptionalClauses = null) {
			// Call RecurringPayments::QueryArray to perform the LoadArrayByCreditCardTypeId query
			try {
				return RecurringPayments::QueryArray(
					QQ::Equal(QQN::RecurringPayments()->CreditCardTypeId, $intCreditCardTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RecurringPaymentses
		 * by CreditCardTypeId Index(es)
		 * @param integer $intCreditCardTypeId
		 * @return int
		*/
		public static function CountByCreditCardTypeId($intCreditCardTypeId, $objOptionalClauses = null) {
			// Call RecurringPayments::QueryCount to perform the CountByCreditCardTypeId query
			return RecurringPayments::QueryCount(
				QQ::Equal(QQN::RecurringPayments()->CreditCardTypeId, $intCreditCardTypeId)
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
		 * Save this RecurringPayments
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = RecurringPayments::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `recurring_payments` (
							`name`,
							`payment_period_id`,
							`amount`,
							`start_date`,
							`end_date`,
							`authorize_flag`,
							`card_holder_name`,
							`address1`,
							`address2`,
							`city`,
							`state`,
							`zip`,
							`credit_card_type_id`,
							`account_number`,
							`expiration_date`,
							`security_code`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->intPaymentPeriodId) . ',
							' . $objDatabase->SqlVariable($this->fltAmount) . ',
							' . $objDatabase->SqlVariable($this->dttStartDate) . ',
							' . $objDatabase->SqlVariable($this->dttEndDate) . ',
							' . $objDatabase->SqlVariable($this->blnAuthorizeFlag) . ',
							' . $objDatabase->SqlVariable($this->strCardHolderName) . ',
							' . $objDatabase->SqlVariable($this->strAddress1) . ',
							' . $objDatabase->SqlVariable($this->strAddress2) . ',
							' . $objDatabase->SqlVariable($this->strCity) . ',
							' . $objDatabase->SqlVariable($this->strState) . ',
							' . $objDatabase->SqlVariable($this->strZip) . ',
							' . $objDatabase->SqlVariable($this->intCreditCardTypeId) . ',
							' . $objDatabase->SqlVariable($this->strAccountNumber) . ',
							' . $objDatabase->SqlVariable($this->strExpirationDate) . ',
							' . $objDatabase->SqlVariable($this->strSecurityCode) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('recurring_payments', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`recurring_payments`
						SET
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`payment_period_id` = ' . $objDatabase->SqlVariable($this->intPaymentPeriodId) . ',
							`amount` = ' . $objDatabase->SqlVariable($this->fltAmount) . ',
							`start_date` = ' . $objDatabase->SqlVariable($this->dttStartDate) . ',
							`end_date` = ' . $objDatabase->SqlVariable($this->dttEndDate) . ',
							`authorize_flag` = ' . $objDatabase->SqlVariable($this->blnAuthorizeFlag) . ',
							`card_holder_name` = ' . $objDatabase->SqlVariable($this->strCardHolderName) . ',
							`address1` = ' . $objDatabase->SqlVariable($this->strAddress1) . ',
							`address2` = ' . $objDatabase->SqlVariable($this->strAddress2) . ',
							`city` = ' . $objDatabase->SqlVariable($this->strCity) . ',
							`state` = ' . $objDatabase->SqlVariable($this->strState) . ',
							`zip` = ' . $objDatabase->SqlVariable($this->strZip) . ',
							`credit_card_type_id` = ' . $objDatabase->SqlVariable($this->intCreditCardTypeId) . ',
							`account_number` = ' . $objDatabase->SqlVariable($this->strAccountNumber) . ',
							`expiration_date` = ' . $objDatabase->SqlVariable($this->strExpirationDate) . ',
							`security_code` = ' . $objDatabase->SqlVariable($this->strSecurityCode) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined RecurringDonationAsRecurringPayment object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyRecurringDonationAsRecurringPayment) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = RecurringDonation::LoadByRecurringPaymentId($this->intId)) {
						$objAssociated->RecurringPaymentId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objRecurringDonationAsRecurringPayment) {
						$this->objRecurringDonationAsRecurringPayment->RecurringPaymentId = $this->intId;
						$this->objRecurringDonationAsRecurringPayment->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyRecurringDonationAsRecurringPayment = false;
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
		 * Delete this RecurringPayments
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this RecurringPayments with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = RecurringPayments::GetDatabase();

			
			
			// Update the adjoined RecurringDonationAsRecurringPayment object (if applicable) and perform the unassociation

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = RecurringDonation::LoadByRecurringPaymentId($this->intId)) {
				$objAssociated->RecurringPaymentId = null;
				$objAssociated->Save();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recurring_payments`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all RecurringPaymentses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = RecurringPayments::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recurring_payments`');
		}

		/**
		 * Truncate recurring_payments table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = RecurringPayments::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `recurring_payments`');
		}

		/**
		 * Reload this RecurringPayments from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved RecurringPayments object.');

			// Reload the Object
			$objReloaded = RecurringPayments::Load($this->intId);

			// Update $this's local variables to match
			$this->strName = $objReloaded->strName;
			$this->PaymentPeriodId = $objReloaded->PaymentPeriodId;
			$this->fltAmount = $objReloaded->fltAmount;
			$this->dttStartDate = $objReloaded->dttStartDate;
			$this->dttEndDate = $objReloaded->dttEndDate;
			$this->blnAuthorizeFlag = $objReloaded->blnAuthorizeFlag;
			$this->strCardHolderName = $objReloaded->strCardHolderName;
			$this->strAddress1 = $objReloaded->strAddress1;
			$this->strAddress2 = $objReloaded->strAddress2;
			$this->strCity = $objReloaded->strCity;
			$this->strState = $objReloaded->strState;
			$this->strZip = $objReloaded->strZip;
			$this->CreditCardTypeId = $objReloaded->CreditCardTypeId;
			$this->strAccountNumber = $objReloaded->strAccountNumber;
			$this->strExpirationDate = $objReloaded->strExpirationDate;
			$this->strSecurityCode = $objReloaded->strSecurityCode;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = RecurringPayments::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `recurring_payments` (
					`id`,
					`name`,
					`payment_period_id`,
					`amount`,
					`start_date`,
					`end_date`,
					`authorize_flag`,
					`card_holder_name`,
					`address1`,
					`address2`,
					`city`,
					`state`,
					`zip`,
					`credit_card_type_id`,
					`account_number`,
					`expiration_date`,
					`security_code`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->intPaymentPeriodId) . ',
					' . $objDatabase->SqlVariable($this->fltAmount) . ',
					' . $objDatabase->SqlVariable($this->dttStartDate) . ',
					' . $objDatabase->SqlVariable($this->dttEndDate) . ',
					' . $objDatabase->SqlVariable($this->blnAuthorizeFlag) . ',
					' . $objDatabase->SqlVariable($this->strCardHolderName) . ',
					' . $objDatabase->SqlVariable($this->strAddress1) . ',
					' . $objDatabase->SqlVariable($this->strAddress2) . ',
					' . $objDatabase->SqlVariable($this->strCity) . ',
					' . $objDatabase->SqlVariable($this->strState) . ',
					' . $objDatabase->SqlVariable($this->strZip) . ',
					' . $objDatabase->SqlVariable($this->intCreditCardTypeId) . ',
					' . $objDatabase->SqlVariable($this->strAccountNumber) . ',
					' . $objDatabase->SqlVariable($this->strExpirationDate) . ',
					' . $objDatabase->SqlVariable($this->strSecurityCode) . ',
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
		 * @return RecurringPayments[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = RecurringPayments::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM recurring_payments WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return RecurringPayments::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return RecurringPayments[]
		 */
		public function GetJournal() {
			return RecurringPayments::GetJournalForId($this->intId);
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

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'PaymentPeriodId':
					// Gets the value for intPaymentPeriodId (Not Null)
					// @return integer
					return $this->intPaymentPeriodId;

				case 'Amount':
					// Gets the value for fltAmount 
					// @return double
					return $this->fltAmount;

				case 'StartDate':
					// Gets the value for dttStartDate 
					// @return QDateTime
					return $this->dttStartDate;

				case 'EndDate':
					// Gets the value for dttEndDate 
					// @return QDateTime
					return $this->dttEndDate;

				case 'AuthorizeFlag':
					// Gets the value for blnAuthorizeFlag 
					// @return boolean
					return $this->blnAuthorizeFlag;

				case 'CardHolderName':
					// Gets the value for strCardHolderName 
					// @return string
					return $this->strCardHolderName;

				case 'Address1':
					// Gets the value for strAddress1 
					// @return string
					return $this->strAddress1;

				case 'Address2':
					// Gets the value for strAddress2 
					// @return string
					return $this->strAddress2;

				case 'City':
					// Gets the value for strCity 
					// @return string
					return $this->strCity;

				case 'State':
					// Gets the value for strState 
					// @return string
					return $this->strState;

				case 'Zip':
					// Gets the value for strZip 
					// @return string
					return $this->strZip;

				case 'CreditCardTypeId':
					// Gets the value for intCreditCardTypeId (Not Null)
					// @return integer
					return $this->intCreditCardTypeId;

				case 'AccountNumber':
					// Gets the value for strAccountNumber 
					// @return string
					return $this->strAccountNumber;

				case 'ExpirationDate':
					// Gets the value for strExpirationDate 
					// @return string
					return $this->strExpirationDate;

				case 'SecurityCode':
					// Gets the value for strSecurityCode 
					// @return string
					return $this->strSecurityCode;


				///////////////////
				// Member Objects
				///////////////////
				case 'PaymentPeriod':
					// Gets the value for the PaymentPeriod object referenced by intPaymentPeriodId (Not Null)
					// @return PaymentPeriod
					try {
						if ((!$this->objPaymentPeriod) && (!is_null($this->intPaymentPeriodId)))
							$this->objPaymentPeriod = PaymentPeriod::Load($this->intPaymentPeriodId);
						return $this->objPaymentPeriod;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'RecurringDonationAsRecurringPayment':
					// Gets the value for the RecurringDonation object that uniquely references this RecurringPayments
					// by objRecurringDonationAsRecurringPayment (Unique)
					// @return RecurringDonation
					try {
						if ($this->objRecurringDonationAsRecurringPayment === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objRecurringDonationAsRecurringPayment)
							$this->objRecurringDonationAsRecurringPayment = RecurringDonation::LoadByRecurringPaymentId($this->intId);
						return $this->objRecurringDonationAsRecurringPayment;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_OnlineDonationAsRecurringPayment':
					// Gets the value for the private _objOnlineDonationAsRecurringPayment (Read-Only)
					// if set due to an expansion on the online_donation.recurring_payment_id reverse relationship
					// @return OnlineDonation
					return $this->_objOnlineDonationAsRecurringPayment;

				case '_OnlineDonationAsRecurringPaymentArray':
					// Gets the value for the private _objOnlineDonationAsRecurringPaymentArray (Read-Only)
					// if set due to an ExpandAsArray on the online_donation.recurring_payment_id reverse relationship
					// @return OnlineDonation[]
					return (array) $this->_objOnlineDonationAsRecurringPaymentArray;


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
				case 'Name':
					// Sets the value for strName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PaymentPeriodId':
					// Sets the value for intPaymentPeriodId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPaymentPeriod = null;
						return ($this->intPaymentPeriodId = QType::Cast($mixValue, QType::Integer));
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

				case 'StartDate':
					// Sets the value for dttStartDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttStartDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EndDate':
					// Sets the value for dttEndDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttEndDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AuthorizeFlag':
					// Sets the value for blnAuthorizeFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnAuthorizeFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CardHolderName':
					// Sets the value for strCardHolderName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCardHolderName = QType::Cast($mixValue, QType::String));
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

				case 'Zip':
					// Sets the value for strZip 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strZip = QType::Cast($mixValue, QType::String));
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

				case 'AccountNumber':
					// Sets the value for strAccountNumber 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAccountNumber = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ExpirationDate':
					// Sets the value for strExpirationDate 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strExpirationDate = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SecurityCode':
					// Sets the value for strSecurityCode 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strSecurityCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'PaymentPeriod':
					// Sets the value for the PaymentPeriod object referenced by intPaymentPeriodId (Not Null)
					// @param PaymentPeriod $mixValue
					// @return PaymentPeriod
					if (is_null($mixValue)) {
						$this->intPaymentPeriodId = null;
						$this->objPaymentPeriod = null;
						return null;
					} else {
						// Make sure $mixValue actually is a PaymentPeriod object
						try {
							$mixValue = QType::Cast($mixValue, 'PaymentPeriod');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED PaymentPeriod object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved PaymentPeriod for this RecurringPayments');

						// Update Local Member Variables
						$this->objPaymentPeriod = $mixValue;
						$this->intPaymentPeriodId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'RecurringDonationAsRecurringPayment':
					// Sets the value for the RecurringDonation object referenced by objRecurringDonationAsRecurringPayment (Unique)
					// @param RecurringDonation $mixValue
					// @return RecurringDonation
					if (is_null($mixValue)) {
						$this->objRecurringDonationAsRecurringPayment = null;

						// Make sure we update the adjoined RecurringDonation object the next time we call Save()
						$this->blnDirtyRecurringDonationAsRecurringPayment = true;

						return null;
					} else {
						// Make sure $mixValue actually is a RecurringDonation object
						try {
							$mixValue = QType::Cast($mixValue, 'RecurringDonation');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objRecurringDonationAsRecurringPayment to a DIFFERENT $mixValue?
						if ((!$this->RecurringDonationAsRecurringPayment) || ($this->RecurringDonationAsRecurringPayment->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined RecurringDonation object the next time we call Save()
							$this->blnDirtyRecurringDonationAsRecurringPayment = true;

							// Update Local Member Variable
							$this->objRecurringDonationAsRecurringPayment = $mixValue;
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

			
		
		// Related Objects' Methods for OnlineDonationAsRecurringPayment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated OnlineDonationsAsRecurringPayment as an array of OnlineDonation objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OnlineDonation[]
		*/ 
		public function GetOnlineDonationAsRecurringPaymentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return OnlineDonation::LoadArrayByRecurringPaymentId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OnlineDonationsAsRecurringPayment
		 * @return int
		*/ 
		public function CountOnlineDonationsAsRecurringPayment() {
			if ((is_null($this->intId)))
				return 0;

			return OnlineDonation::CountByRecurringPaymentId($this->intId);
		}

		/**
		 * Associates a OnlineDonationAsRecurringPayment
		 * @param OnlineDonation $objOnlineDonation
		 * @return void
		*/ 
		public function AssociateOnlineDonationAsRecurringPayment(OnlineDonation $objOnlineDonation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOnlineDonationAsRecurringPayment on this unsaved RecurringPayments.');
			if ((is_null($objOnlineDonation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOnlineDonationAsRecurringPayment on this RecurringPayments with an unsaved OnlineDonation.');

			// Get the Database Object for this Class
			$objDatabase = RecurringPayments::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`online_donation`
				SET
					`recurring_payment_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOnlineDonation->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objOnlineDonation->RecurringPaymentId = $this->intId;
				$objOnlineDonation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a OnlineDonationAsRecurringPayment
		 * @param OnlineDonation $objOnlineDonation
		 * @return void
		*/ 
		public function UnassociateOnlineDonationAsRecurringPayment(OnlineDonation $objOnlineDonation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationAsRecurringPayment on this unsaved RecurringPayments.');
			if ((is_null($objOnlineDonation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationAsRecurringPayment on this RecurringPayments with an unsaved OnlineDonation.');

			// Get the Database Object for this Class
			$objDatabase = RecurringPayments::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`online_donation`
				SET
					`recurring_payment_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOnlineDonation->Id) . ' AND
					`recurring_payment_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objOnlineDonation->RecurringPaymentId = null;
				$objOnlineDonation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all OnlineDonationsAsRecurringPayment
		 * @return void
		*/ 
		public function UnassociateAllOnlineDonationsAsRecurringPayment() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationAsRecurringPayment on this unsaved RecurringPayments.');

			// Get the Database Object for this Class
			$objDatabase = RecurringPayments::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (OnlineDonation::LoadArrayByRecurringPaymentId($this->intId) as $objOnlineDonation) {
					$objOnlineDonation->RecurringPaymentId = null;
					$objOnlineDonation->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`online_donation`
				SET
					`recurring_payment_id` = null
				WHERE
					`recurring_payment_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated OnlineDonationAsRecurringPayment
		 * @param OnlineDonation $objOnlineDonation
		 * @return void
		*/ 
		public function DeleteAssociatedOnlineDonationAsRecurringPayment(OnlineDonation $objOnlineDonation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationAsRecurringPayment on this unsaved RecurringPayments.');
			if ((is_null($objOnlineDonation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationAsRecurringPayment on this RecurringPayments with an unsaved OnlineDonation.');

			// Get the Database Object for this Class
			$objDatabase = RecurringPayments::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`online_donation`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOnlineDonation->Id) . ' AND
					`recurring_payment_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objOnlineDonation->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated OnlineDonationsAsRecurringPayment
		 * @return void
		*/ 
		public function DeleteAllOnlineDonationsAsRecurringPayment() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationAsRecurringPayment on this unsaved RecurringPayments.');

			// Get the Database Object for this Class
			$objDatabase = RecurringPayments::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (OnlineDonation::LoadArrayByRecurringPaymentId($this->intId) as $objOnlineDonation) {
					$objOnlineDonation->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`online_donation`
				WHERE
					`recurring_payment_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="RecurringPayments"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="PaymentPeriod" type="xsd1:PaymentPeriod"/>';
			$strToReturn .= '<element name="Amount" type="xsd:float"/>';
			$strToReturn .= '<element name="StartDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="EndDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="AuthorizeFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="CardHolderName" type="xsd:string"/>';
			$strToReturn .= '<element name="Address1" type="xsd:string"/>';
			$strToReturn .= '<element name="Address2" type="xsd:string"/>';
			$strToReturn .= '<element name="City" type="xsd:string"/>';
			$strToReturn .= '<element name="State" type="xsd:string"/>';
			$strToReturn .= '<element name="Zip" type="xsd:string"/>';
			$strToReturn .= '<element name="CreditCardTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="AccountNumber" type="xsd:string"/>';
			$strToReturn .= '<element name="ExpirationDate" type="xsd:string"/>';
			$strToReturn .= '<element name="SecurityCode" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('RecurringPayments', $strComplexTypeArray)) {
				$strComplexTypeArray['RecurringPayments'] = RecurringPayments::GetSoapComplexTypeXml();
				PaymentPeriod::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, RecurringPayments::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new RecurringPayments();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if ((property_exists($objSoapObject, 'PaymentPeriod')) &&
				($objSoapObject->PaymentPeriod))
				$objToReturn->PaymentPeriod = PaymentPeriod::GetObjectFromSoapObject($objSoapObject->PaymentPeriod);
			if (property_exists($objSoapObject, 'Amount'))
				$objToReturn->fltAmount = $objSoapObject->Amount;
			if (property_exists($objSoapObject, 'StartDate'))
				$objToReturn->dttStartDate = new QDateTime($objSoapObject->StartDate);
			if (property_exists($objSoapObject, 'EndDate'))
				$objToReturn->dttEndDate = new QDateTime($objSoapObject->EndDate);
			if (property_exists($objSoapObject, 'AuthorizeFlag'))
				$objToReturn->blnAuthorizeFlag = $objSoapObject->AuthorizeFlag;
			if (property_exists($objSoapObject, 'CardHolderName'))
				$objToReturn->strCardHolderName = $objSoapObject->CardHolderName;
			if (property_exists($objSoapObject, 'Address1'))
				$objToReturn->strAddress1 = $objSoapObject->Address1;
			if (property_exists($objSoapObject, 'Address2'))
				$objToReturn->strAddress2 = $objSoapObject->Address2;
			if (property_exists($objSoapObject, 'City'))
				$objToReturn->strCity = $objSoapObject->City;
			if (property_exists($objSoapObject, 'State'))
				$objToReturn->strState = $objSoapObject->State;
			if (property_exists($objSoapObject, 'Zip'))
				$objToReturn->strZip = $objSoapObject->Zip;
			if (property_exists($objSoapObject, 'CreditCardTypeId'))
				$objToReturn->intCreditCardTypeId = $objSoapObject->CreditCardTypeId;
			if (property_exists($objSoapObject, 'AccountNumber'))
				$objToReturn->strAccountNumber = $objSoapObject->AccountNumber;
			if (property_exists($objSoapObject, 'ExpirationDate'))
				$objToReturn->strExpirationDate = $objSoapObject->ExpirationDate;
			if (property_exists($objSoapObject, 'SecurityCode'))
				$objToReturn->strSecurityCode = $objSoapObject->SecurityCode;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, RecurringPayments::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPaymentPeriod)
				$objObject->objPaymentPeriod = PaymentPeriod::GetSoapObjectFromObject($objObject->objPaymentPeriod, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPaymentPeriodId = null;
			if ($objObject->dttStartDate)
				$objObject->dttStartDate = $objObject->dttStartDate->__toString(QDateTime::FormatSoap);
			if ($objObject->dttEndDate)
				$objObject->dttEndDate = $objObject->dttEndDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Name
	 * @property-read QQNode $PaymentPeriodId
	 * @property-read QQNodePaymentPeriod $PaymentPeriod
	 * @property-read QQNode $Amount
	 * @property-read QQNode $StartDate
	 * @property-read QQNode $EndDate
	 * @property-read QQNode $AuthorizeFlag
	 * @property-read QQNode $CardHolderName
	 * @property-read QQNode $Address1
	 * @property-read QQNode $Address2
	 * @property-read QQNode $City
	 * @property-read QQNode $State
	 * @property-read QQNode $Zip
	 * @property-read QQNode $CreditCardTypeId
	 * @property-read QQNode $AccountNumber
	 * @property-read QQNode $ExpirationDate
	 * @property-read QQNode $SecurityCode
	 * @property-read QQReverseReferenceNodeOnlineDonation $OnlineDonationAsRecurringPayment
	 * @property-read QQReverseReferenceNodeRecurringDonation $RecurringDonationAsRecurringPayment
	 */
	class QQNodeRecurringPayments extends QQNode {
		protected $strTableName = 'recurring_payments';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'RecurringPayments';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'PaymentPeriodId':
					return new QQNode('payment_period_id', 'PaymentPeriodId', 'integer', $this);
				case 'PaymentPeriod':
					return new QQNodePaymentPeriod('payment_period_id', 'PaymentPeriod', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'StartDate':
					return new QQNode('start_date', 'StartDate', 'QDateTime', $this);
				case 'EndDate':
					return new QQNode('end_date', 'EndDate', 'QDateTime', $this);
				case 'AuthorizeFlag':
					return new QQNode('authorize_flag', 'AuthorizeFlag', 'boolean', $this);
				case 'CardHolderName':
					return new QQNode('card_holder_name', 'CardHolderName', 'string', $this);
				case 'Address1':
					return new QQNode('address1', 'Address1', 'string', $this);
				case 'Address2':
					return new QQNode('address2', 'Address2', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'State':
					return new QQNode('state', 'State', 'string', $this);
				case 'Zip':
					return new QQNode('zip', 'Zip', 'string', $this);
				case 'CreditCardTypeId':
					return new QQNode('credit_card_type_id', 'CreditCardTypeId', 'integer', $this);
				case 'AccountNumber':
					return new QQNode('account_number', 'AccountNumber', 'string', $this);
				case 'ExpirationDate':
					return new QQNode('expiration_date', 'ExpirationDate', 'string', $this);
				case 'SecurityCode':
					return new QQNode('security_code', 'SecurityCode', 'string', $this);
				case 'OnlineDonationAsRecurringPayment':
					return new QQReverseReferenceNodeOnlineDonation($this, 'onlinedonationasrecurringpayment', 'reverse_reference', 'recurring_payment_id');
				case 'RecurringDonationAsRecurringPayment':
					return new QQReverseReferenceNodeRecurringDonation($this, 'recurringdonationasrecurringpayment', 'reverse_reference', 'recurring_payment_id', 'RecurringDonationAsRecurringPayment');

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
	 * @property-read QQNode $Name
	 * @property-read QQNode $PaymentPeriodId
	 * @property-read QQNodePaymentPeriod $PaymentPeriod
	 * @property-read QQNode $Amount
	 * @property-read QQNode $StartDate
	 * @property-read QQNode $EndDate
	 * @property-read QQNode $AuthorizeFlag
	 * @property-read QQNode $CardHolderName
	 * @property-read QQNode $Address1
	 * @property-read QQNode $Address2
	 * @property-read QQNode $City
	 * @property-read QQNode $State
	 * @property-read QQNode $Zip
	 * @property-read QQNode $CreditCardTypeId
	 * @property-read QQNode $AccountNumber
	 * @property-read QQNode $ExpirationDate
	 * @property-read QQNode $SecurityCode
	 * @property-read QQReverseReferenceNodeOnlineDonation $OnlineDonationAsRecurringPayment
	 * @property-read QQReverseReferenceNodeRecurringDonation $RecurringDonationAsRecurringPayment
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeRecurringPayments extends QQReverseReferenceNode {
		protected $strTableName = 'recurring_payments';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'RecurringPayments';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'PaymentPeriodId':
					return new QQNode('payment_period_id', 'PaymentPeriodId', 'integer', $this);
				case 'PaymentPeriod':
					return new QQNodePaymentPeriod('payment_period_id', 'PaymentPeriod', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'StartDate':
					return new QQNode('start_date', 'StartDate', 'QDateTime', $this);
				case 'EndDate':
					return new QQNode('end_date', 'EndDate', 'QDateTime', $this);
				case 'AuthorizeFlag':
					return new QQNode('authorize_flag', 'AuthorizeFlag', 'boolean', $this);
				case 'CardHolderName':
					return new QQNode('card_holder_name', 'CardHolderName', 'string', $this);
				case 'Address1':
					return new QQNode('address1', 'Address1', 'string', $this);
				case 'Address2':
					return new QQNode('address2', 'Address2', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'State':
					return new QQNode('state', 'State', 'string', $this);
				case 'Zip':
					return new QQNode('zip', 'Zip', 'string', $this);
				case 'CreditCardTypeId':
					return new QQNode('credit_card_type_id', 'CreditCardTypeId', 'integer', $this);
				case 'AccountNumber':
					return new QQNode('account_number', 'AccountNumber', 'string', $this);
				case 'ExpirationDate':
					return new QQNode('expiration_date', 'ExpirationDate', 'string', $this);
				case 'SecurityCode':
					return new QQNode('security_code', 'SecurityCode', 'string', $this);
				case 'OnlineDonationAsRecurringPayment':
					return new QQReverseReferenceNodeOnlineDonation($this, 'onlinedonationasrecurringpayment', 'reverse_reference', 'recurring_payment_id');
				case 'RecurringDonationAsRecurringPayment':
					return new QQReverseReferenceNodeRecurringDonation($this, 'recurringdonationasrecurringpayment', 'reverse_reference', 'recurring_payment_id', 'RecurringDonationAsRecurringPayment');

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