<?php
	/**
	 * The abstract PaypalBatchGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the PaypalBatch subclass which
	 * extends this PaypalBatchGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PaypalBatch class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Number the value for strNumber (Unique)
	 * @property QDateTime $DateReceived the value for dttDateReceived 
	 * @property QDateTime $DateReconciled the value for dttDateReconciled 
	 * @property boolean $ReconciledFlag the value for blnReconciledFlag (Not Null)
	 * @property integer $StewardshipBatchId the value for intStewardshipBatchId (Unique)
	 * @property StewardshipBatch $StewardshipBatch the value for the StewardshipBatch object referenced by intStewardshipBatchId (Unique)
	 * @property CreditCardPayment $_CreditCardPayment the value for the private _objCreditCardPayment (Read-Only) if set due to an expansion on the credit_card_payment.paypal_batch_id reverse relationship
	 * @property CreditCardPayment[] $_CreditCardPaymentArray the value for the private _objCreditCardPaymentArray (Read-Only) if set due to an ExpandAsArray on the credit_card_payment.paypal_batch_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PaypalBatchGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column paypal_batch.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column paypal_batch.number
		 * @var string strNumber
		 */
		protected $strNumber;
		const NumberMaxLength = 20;
		const NumberDefault = null;


		/**
		 * Protected member variable that maps to the database column paypal_batch.date_received
		 * @var QDateTime dttDateReceived
		 */
		protected $dttDateReceived;
		const DateReceivedDefault = null;


		/**
		 * Protected member variable that maps to the database column paypal_batch.date_reconciled
		 * @var QDateTime dttDateReconciled
		 */
		protected $dttDateReconciled;
		const DateReconciledDefault = null;


		/**
		 * Protected member variable that maps to the database column paypal_batch.reconciled_flag
		 * @var boolean blnReconciledFlag
		 */
		protected $blnReconciledFlag;
		const ReconciledFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column paypal_batch.stewardship_batch_id
		 * @var integer intStewardshipBatchId
		 */
		protected $intStewardshipBatchId;
		const StewardshipBatchIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single CreditCardPayment object
		 * (of type CreditCardPayment), if this PaypalBatch object was restored with
		 * an expansion on the credit_card_payment association table.
		 * @var CreditCardPayment _objCreditCardPayment;
		 */
		private $_objCreditCardPayment;

		/**
		 * Private member variable that stores a reference to an array of CreditCardPayment objects
		 * (of type CreditCardPayment[]), if this PaypalBatch object was restored with
		 * an ExpandAsArray on the credit_card_payment association table.
		 * @var CreditCardPayment[] _objCreditCardPaymentArray;
		 */
		private $_objCreditCardPaymentArray = array();

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
		 * in the database column paypal_batch.stewardship_batch_id.
		 *
		 * NOTE: Always use the StewardshipBatch property getter to correctly retrieve this StewardshipBatch object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipBatch objStewardshipBatch
		 */
		protected $objStewardshipBatch;





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
		 * Load a PaypalBatch from PK Info
		 * @param integer $intId
		 * @return PaypalBatch
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return PaypalBatch::QuerySingle(
				QQ::Equal(QQN::PaypalBatch()->Id, $intId)
			);
		}

		/**
		 * Load all PaypalBatches
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PaypalBatch[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call PaypalBatch::QueryArray to perform the LoadAll query
			try {
				return PaypalBatch::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all PaypalBatches
		 * @return int
		 */
		public static function CountAll() {
			// Call PaypalBatch::QueryCount to perform the CountAll query
			return PaypalBatch::QueryCount(QQ::All());
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
			$objDatabase = PaypalBatch::GetDatabase();

			// Create/Build out the QueryBuilder object with PaypalBatch-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'paypal_batch');
			PaypalBatch::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('paypal_batch');

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
		 * Static Qcodo Query method to query for a single PaypalBatch object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PaypalBatch the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PaypalBatch::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new PaypalBatch object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = PaypalBatch::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return PaypalBatch::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of PaypalBatch objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PaypalBatch[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PaypalBatch::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PaypalBatch::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = PaypalBatch::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of PaypalBatch objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PaypalBatch::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = PaypalBatch::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'paypal_batch_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with PaypalBatch-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				PaypalBatch::GetSelectFields($objQueryBuilder);
				PaypalBatch::GetFromFields($objQueryBuilder);

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
			return PaypalBatch::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this PaypalBatch
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'paypal_batch';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'number', $strAliasPrefix . 'number');
			$objBuilder->AddSelectItem($strTableName, 'date_received', $strAliasPrefix . 'date_received');
			$objBuilder->AddSelectItem($strTableName, 'date_reconciled', $strAliasPrefix . 'date_reconciled');
			$objBuilder->AddSelectItem($strTableName, 'reconciled_flag', $strAliasPrefix . 'reconciled_flag');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_batch_id', $strAliasPrefix . 'stewardship_batch_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a PaypalBatch from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this PaypalBatch::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return PaypalBatch
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
					$strAliasPrefix = 'paypal_batch__';


				$strAlias = $strAliasPrefix . 'creditcardpayment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCreditCardPaymentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCreditCardPaymentArray[$intPreviousChildItemCount - 1];
						$objChildItem = CreditCardPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'creditcardpayment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCreditCardPaymentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCreditCardPaymentArray[] = CreditCardPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'creditcardpayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'paypal_batch__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the PaypalBatch object
			$objToReturn = new PaypalBatch();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'number'] : $strAliasPrefix . 'number';
			$objToReturn->strNumber = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_received', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_received'] : $strAliasPrefix . 'date_received';
			$objToReturn->dttDateReceived = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_reconciled', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_reconciled'] : $strAliasPrefix . 'date_reconciled';
			$objToReturn->dttDateReconciled = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'reconciled_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'reconciled_flag'] : $strAliasPrefix . 'reconciled_flag';
			$objToReturn->blnReconciledFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_batch_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_batch_id'] : $strAliasPrefix . 'stewardship_batch_id';
			$objToReturn->intStewardshipBatchId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'paypal_batch__';

			// Check for StewardshipBatch Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_batch_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipBatch = StewardshipBatch::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_batch_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for CreditCardPayment Virtual Binding
			$strAlias = $strAliasPrefix . 'creditcardpayment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCreditCardPaymentArray[] = CreditCardPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'creditcardpayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCreditCardPayment = CreditCardPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'creditcardpayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of PaypalBatches from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return PaypalBatch[]
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
					$objItem = PaypalBatch::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = PaypalBatch::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single PaypalBatch object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return PaypalBatch next row resulting from the query
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
			return PaypalBatch::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single PaypalBatch object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return PaypalBatch
		*/
		public static function LoadById($intId) {
			return PaypalBatch::QuerySingle(
				QQ::Equal(QQN::PaypalBatch()->Id, $intId)
			);
		}
			
		/**
		 * Load a single PaypalBatch object,
		 * by Number Index(es)
		 * @param string $strNumber
		 * @return PaypalBatch
		*/
		public static function LoadByNumber($strNumber) {
			return PaypalBatch::QuerySingle(
				QQ::Equal(QQN::PaypalBatch()->Number, $strNumber)
			);
		}
			
		/**
		 * Load a single PaypalBatch object,
		 * by StewardshipBatchId Index(es)
		 * @param integer $intStewardshipBatchId
		 * @return PaypalBatch
		*/
		public static function LoadByStewardshipBatchId($intStewardshipBatchId) {
			return PaypalBatch::QuerySingle(
				QQ::Equal(QQN::PaypalBatch()->StewardshipBatchId, $intStewardshipBatchId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this PaypalBatch
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = PaypalBatch::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `paypal_batch` (
							`number`,
							`date_received`,
							`date_reconciled`,
							`reconciled_flag`,
							`stewardship_batch_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNumber) . ',
							' . $objDatabase->SqlVariable($this->dttDateReceived) . ',
							' . $objDatabase->SqlVariable($this->dttDateReconciled) . ',
							' . $objDatabase->SqlVariable($this->blnReconciledFlag) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('paypal_batch', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`paypal_batch`
						SET
							`number` = ' . $objDatabase->SqlVariable($this->strNumber) . ',
							`date_received` = ' . $objDatabase->SqlVariable($this->dttDateReceived) . ',
							`date_reconciled` = ' . $objDatabase->SqlVariable($this->dttDateReconciled) . ',
							`reconciled_flag` = ' . $objDatabase->SqlVariable($this->blnReconciledFlag) . ',
							`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . '
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
		 * Delete this PaypalBatch
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this PaypalBatch with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = PaypalBatch::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`paypal_batch`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all PaypalBatches
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = PaypalBatch::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`paypal_batch`');
		}

		/**
		 * Truncate paypal_batch table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = PaypalBatch::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `paypal_batch`');
		}

		/**
		 * Reload this PaypalBatch from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved PaypalBatch object.');

			// Reload the Object
			$objReloaded = PaypalBatch::Load($this->intId);

			// Update $this's local variables to match
			$this->strNumber = $objReloaded->strNumber;
			$this->dttDateReceived = $objReloaded->dttDateReceived;
			$this->dttDateReconciled = $objReloaded->dttDateReconciled;
			$this->blnReconciledFlag = $objReloaded->blnReconciledFlag;
			$this->StewardshipBatchId = $objReloaded->StewardshipBatchId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = PaypalBatch::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `paypal_batch` (
					`id`,
					`number`,
					`date_received`,
					`date_reconciled`,
					`reconciled_flag`,
					`stewardship_batch_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strNumber) . ',
					' . $objDatabase->SqlVariable($this->dttDateReceived) . ',
					' . $objDatabase->SqlVariable($this->dttDateReconciled) . ',
					' . $objDatabase->SqlVariable($this->blnReconciledFlag) . ',
					' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . ',
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
		 * @return PaypalBatch[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = PaypalBatch::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM paypal_batch WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return PaypalBatch::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return PaypalBatch[]
		 */
		public function GetJournal() {
			return PaypalBatch::GetJournalForId($this->intId);
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

				case 'Number':
					// Gets the value for strNumber (Unique)
					// @return string
					return $this->strNumber;

				case 'DateReceived':
					// Gets the value for dttDateReceived 
					// @return QDateTime
					return $this->dttDateReceived;

				case 'DateReconciled':
					// Gets the value for dttDateReconciled 
					// @return QDateTime
					return $this->dttDateReconciled;

				case 'ReconciledFlag':
					// Gets the value for blnReconciledFlag (Not Null)
					// @return boolean
					return $this->blnReconciledFlag;

				case 'StewardshipBatchId':
					// Gets the value for intStewardshipBatchId (Unique)
					// @return integer
					return $this->intStewardshipBatchId;


				///////////////////
				// Member Objects
				///////////////////
				case 'StewardshipBatch':
					// Gets the value for the StewardshipBatch object referenced by intStewardshipBatchId (Unique)
					// @return StewardshipBatch
					try {
						if ((!$this->objStewardshipBatch) && (!is_null($this->intStewardshipBatchId)))
							$this->objStewardshipBatch = StewardshipBatch::Load($this->intStewardshipBatchId);
						return $this->objStewardshipBatch;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_CreditCardPayment':
					// Gets the value for the private _objCreditCardPayment (Read-Only)
					// if set due to an expansion on the credit_card_payment.paypal_batch_id reverse relationship
					// @return CreditCardPayment
					return $this->_objCreditCardPayment;

				case '_CreditCardPaymentArray':
					// Gets the value for the private _objCreditCardPaymentArray (Read-Only)
					// if set due to an ExpandAsArray on the credit_card_payment.paypal_batch_id reverse relationship
					// @return CreditCardPayment[]
					return (array) $this->_objCreditCardPaymentArray;


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
				case 'Number':
					// Sets the value for strNumber (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strNumber = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateReceived':
					// Sets the value for dttDateReceived 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateReceived = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateReconciled':
					// Sets the value for dttDateReconciled 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateReconciled = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReconciledFlag':
					// Sets the value for blnReconciledFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnReconciledFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipBatchId':
					// Sets the value for intStewardshipBatchId (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipBatch = null;
						return ($this->intStewardshipBatchId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'StewardshipBatch':
					// Sets the value for the StewardshipBatch object referenced by intStewardshipBatchId (Unique)
					// @param StewardshipBatch $mixValue
					// @return StewardshipBatch
					if (is_null($mixValue)) {
						$this->intStewardshipBatchId = null;
						$this->objStewardshipBatch = null;
						return null;
					} else {
						// Make sure $mixValue actually is a StewardshipBatch object
						try {
							$mixValue = QType::Cast($mixValue, 'StewardshipBatch');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED StewardshipBatch object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved StewardshipBatch for this PaypalBatch');

						// Update Local Member Variables
						$this->objStewardshipBatch = $mixValue;
						$this->intStewardshipBatchId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for CreditCardPayment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CreditCardPayments as an array of CreditCardPayment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CreditCardPayment[]
		*/ 
		public function GetCreditCardPaymentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CreditCardPayment::LoadArrayByPaypalBatchId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CreditCardPayments
		 * @return int
		*/ 
		public function CountCreditCardPayments() {
			if ((is_null($this->intId)))
				return 0;

			return CreditCardPayment::CountByPaypalBatchId($this->intId);
		}

		/**
		 * Associates a CreditCardPayment
		 * @param CreditCardPayment $objCreditCardPayment
		 * @return void
		*/ 
		public function AssociateCreditCardPayment(CreditCardPayment $objCreditCardPayment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCreditCardPayment on this unsaved PaypalBatch.');
			if ((is_null($objCreditCardPayment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCreditCardPayment on this PaypalBatch with an unsaved CreditCardPayment.');

			// Get the Database Object for this Class
			$objDatabase = PaypalBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`credit_card_payment`
				SET
					`paypal_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCreditCardPayment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCreditCardPayment->PaypalBatchId = $this->intId;
				$objCreditCardPayment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CreditCardPayment
		 * @param CreditCardPayment $objCreditCardPayment
		 * @return void
		*/ 
		public function UnassociateCreditCardPayment(CreditCardPayment $objCreditCardPayment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCreditCardPayment on this unsaved PaypalBatch.');
			if ((is_null($objCreditCardPayment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCreditCardPayment on this PaypalBatch with an unsaved CreditCardPayment.');

			// Get the Database Object for this Class
			$objDatabase = PaypalBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`credit_card_payment`
				SET
					`paypal_batch_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCreditCardPayment->Id) . ' AND
					`paypal_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCreditCardPayment->PaypalBatchId = null;
				$objCreditCardPayment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CreditCardPayments
		 * @return void
		*/ 
		public function UnassociateAllCreditCardPayments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCreditCardPayment on this unsaved PaypalBatch.');

			// Get the Database Object for this Class
			$objDatabase = PaypalBatch::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CreditCardPayment::LoadArrayByPaypalBatchId($this->intId) as $objCreditCardPayment) {
					$objCreditCardPayment->PaypalBatchId = null;
					$objCreditCardPayment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`credit_card_payment`
				SET
					`paypal_batch_id` = null
				WHERE
					`paypal_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CreditCardPayment
		 * @param CreditCardPayment $objCreditCardPayment
		 * @return void
		*/ 
		public function DeleteAssociatedCreditCardPayment(CreditCardPayment $objCreditCardPayment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCreditCardPayment on this unsaved PaypalBatch.');
			if ((is_null($objCreditCardPayment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCreditCardPayment on this PaypalBatch with an unsaved CreditCardPayment.');

			// Get the Database Object for this Class
			$objDatabase = PaypalBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`credit_card_payment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCreditCardPayment->Id) . ' AND
					`paypal_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCreditCardPayment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CreditCardPayments
		 * @return void
		*/ 
		public function DeleteAllCreditCardPayments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCreditCardPayment on this unsaved PaypalBatch.');

			// Get the Database Object for this Class
			$objDatabase = PaypalBatch::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CreditCardPayment::LoadArrayByPaypalBatchId($this->intId) as $objCreditCardPayment) {
					$objCreditCardPayment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`credit_card_payment`
				WHERE
					`paypal_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="PaypalBatch"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Number" type="xsd:string"/>';
			$strToReturn .= '<element name="DateReceived" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateReconciled" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ReconciledFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="StewardshipBatch" type="xsd1:StewardshipBatch"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('PaypalBatch', $strComplexTypeArray)) {
				$strComplexTypeArray['PaypalBatch'] = PaypalBatch::GetSoapComplexTypeXml();
				StewardshipBatch::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, PaypalBatch::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new PaypalBatch();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Number'))
				$objToReturn->strNumber = $objSoapObject->Number;
			if (property_exists($objSoapObject, 'DateReceived'))
				$objToReturn->dttDateReceived = new QDateTime($objSoapObject->DateReceived);
			if (property_exists($objSoapObject, 'DateReconciled'))
				$objToReturn->dttDateReconciled = new QDateTime($objSoapObject->DateReconciled);
			if (property_exists($objSoapObject, 'ReconciledFlag'))
				$objToReturn->blnReconciledFlag = $objSoapObject->ReconciledFlag;
			if ((property_exists($objSoapObject, 'StewardshipBatch')) &&
				($objSoapObject->StewardshipBatch))
				$objToReturn->StewardshipBatch = StewardshipBatch::GetObjectFromSoapObject($objSoapObject->StewardshipBatch);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, PaypalBatch::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttDateReceived)
				$objObject->dttDateReceived = $objObject->dttDateReceived->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateReconciled)
				$objObject->dttDateReconciled = $objObject->dttDateReconciled->__toString(QDateTime::FormatSoap);
			if ($objObject->objStewardshipBatch)
				$objObject->objStewardshipBatch = StewardshipBatch::GetSoapObjectFromObject($objObject->objStewardshipBatch, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipBatchId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Number
	 * @property-read QQNode $DateReceived
	 * @property-read QQNode $DateReconciled
	 * @property-read QQNode $ReconciledFlag
	 * @property-read QQNode $StewardshipBatchId
	 * @property-read QQNodeStewardshipBatch $StewardshipBatch
	 * @property-read QQReverseReferenceNodeCreditCardPayment $CreditCardPayment
	 */
	class QQNodePaypalBatch extends QQNode {
		protected $strTableName = 'paypal_batch';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PaypalBatch';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Number':
					return new QQNode('number', 'Number', 'string', $this);
				case 'DateReceived':
					return new QQNode('date_received', 'DateReceived', 'QDateTime', $this);
				case 'DateReconciled':
					return new QQNode('date_reconciled', 'DateReconciled', 'QDateTime', $this);
				case 'ReconciledFlag':
					return new QQNode('reconciled_flag', 'ReconciledFlag', 'boolean', $this);
				case 'StewardshipBatchId':
					return new QQNode('stewardship_batch_id', 'StewardshipBatchId', 'integer', $this);
				case 'StewardshipBatch':
					return new QQNodeStewardshipBatch('stewardship_batch_id', 'StewardshipBatch', 'integer', $this);
				case 'CreditCardPayment':
					return new QQReverseReferenceNodeCreditCardPayment($this, 'creditcardpayment', 'reverse_reference', 'paypal_batch_id');

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
	 * @property-read QQNode $Number
	 * @property-read QQNode $DateReceived
	 * @property-read QQNode $DateReconciled
	 * @property-read QQNode $ReconciledFlag
	 * @property-read QQNode $StewardshipBatchId
	 * @property-read QQNodeStewardshipBatch $StewardshipBatch
	 * @property-read QQReverseReferenceNodeCreditCardPayment $CreditCardPayment
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodePaypalBatch extends QQReverseReferenceNode {
		protected $strTableName = 'paypal_batch';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PaypalBatch';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Number':
					return new QQNode('number', 'Number', 'string', $this);
				case 'DateReceived':
					return new QQNode('date_received', 'DateReceived', 'QDateTime', $this);
				case 'DateReconciled':
					return new QQNode('date_reconciled', 'DateReconciled', 'QDateTime', $this);
				case 'ReconciledFlag':
					return new QQNode('reconciled_flag', 'ReconciledFlag', 'boolean', $this);
				case 'StewardshipBatchId':
					return new QQNode('stewardship_batch_id', 'StewardshipBatchId', 'integer', $this);
				case 'StewardshipBatch':
					return new QQNodeStewardshipBatch('stewardship_batch_id', 'StewardshipBatch', 'integer', $this);
				case 'CreditCardPayment':
					return new QQReverseReferenceNodeCreditCardPayment($this, 'creditcardpayment', 'reverse_reference', 'paypal_batch_id');

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