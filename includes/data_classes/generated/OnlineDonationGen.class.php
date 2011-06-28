<?php
	/**
	 * The abstract OnlineDonationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the OnlineDonation subclass which
	 * extends this OnlineDonationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the OnlineDonation class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property integer $CreditCardPaymentId the value for intCreditCardPaymentId (Unique)
	 * @property double $TotalAmount the value for fltTotalAmount 
	 * @property CreditCardPayment $CreditCardPayment the value for the CreditCardPayment object referenced by intCreditCardPaymentId (Unique)
	 * @property OnlineDonationLineItem $_OnlineDonationLineItem the value for the private _objOnlineDonationLineItem (Read-Only) if set due to an expansion on the online_donation_line_item.online_donation_id reverse relationship
	 * @property OnlineDonationLineItem[] $_OnlineDonationLineItemArray the value for the private _objOnlineDonationLineItemArray (Read-Only) if set due to an ExpandAsArray on the online_donation_line_item.online_donation_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class OnlineDonationGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column online_donation.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column online_donation.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column online_donation.credit_card_payment_id
		 * @var integer intCreditCardPaymentId
		 */
		protected $intCreditCardPaymentId;
		const CreditCardPaymentIdDefault = null;


		/**
		 * Protected member variable that maps to the database column online_donation.total_amount
		 * @var double fltTotalAmount
		 */
		protected $fltTotalAmount;
		const TotalAmountDefault = null;


		/**
		 * Private member variable that stores a reference to a single OnlineDonationLineItem object
		 * (of type OnlineDonationLineItem), if this OnlineDonation object was restored with
		 * an expansion on the online_donation_line_item association table.
		 * @var OnlineDonationLineItem _objOnlineDonationLineItem;
		 */
		private $_objOnlineDonationLineItem;

		/**
		 * Private member variable that stores a reference to an array of OnlineDonationLineItem objects
		 * (of type OnlineDonationLineItem[]), if this OnlineDonation object was restored with
		 * an ExpandAsArray on the online_donation_line_item association table.
		 * @var OnlineDonationLineItem[] _objOnlineDonationLineItemArray;
		 */
		private $_objOnlineDonationLineItemArray = array();

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
		 * in the database column online_donation.credit_card_payment_id.
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
		 * Load a OnlineDonation from PK Info
		 * @param integer $intId
		 * @return OnlineDonation
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return OnlineDonation::QuerySingle(
				QQ::Equal(QQN::OnlineDonation()->Id, $intId)
			);
		}

		/**
		 * Load all OnlineDonations
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OnlineDonation[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call OnlineDonation::QueryArray to perform the LoadAll query
			try {
				return OnlineDonation::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all OnlineDonations
		 * @return int
		 */
		public static function CountAll() {
			// Call OnlineDonation::QueryCount to perform the CountAll query
			return OnlineDonation::QueryCount(QQ::All());
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
			$objDatabase = OnlineDonation::GetDatabase();

			// Create/Build out the QueryBuilder object with OnlineDonation-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'online_donation');
			OnlineDonation::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('online_donation');

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
		 * Static Qcodo Query method to query for a single OnlineDonation object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OnlineDonation the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OnlineDonation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new OnlineDonation object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = OnlineDonation::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return OnlineDonation::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of OnlineDonation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OnlineDonation[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OnlineDonation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return OnlineDonation::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = OnlineDonation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of OnlineDonation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OnlineDonation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = OnlineDonation::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'online_donation_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with OnlineDonation-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				OnlineDonation::GetSelectFields($objQueryBuilder);
				OnlineDonation::GetFromFields($objQueryBuilder);

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
			return OnlineDonation::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this OnlineDonation
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'online_donation';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'credit_card_payment_id', $strAliasPrefix . 'credit_card_payment_id');
			$objBuilder->AddSelectItem($strTableName, 'total_amount', $strAliasPrefix . 'total_amount');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a OnlineDonation from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this OnlineDonation::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return OnlineDonation
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
					$strAliasPrefix = 'online_donation__';


				$strAlias = $strAliasPrefix . 'onlinedonationlineitem__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objOnlineDonationLineItemArray)) {
						$objPreviousChildItem = $objPreviousItem->_objOnlineDonationLineItemArray[$intPreviousChildItemCount - 1];
						$objChildItem = OnlineDonationLineItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'onlinedonationlineitem__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objOnlineDonationLineItemArray[] = $objChildItem;
					} else
						$objPreviousItem->_objOnlineDonationLineItemArray[] = OnlineDonationLineItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'onlinedonationlineitem__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'online_donation__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the OnlineDonation object
			$objToReturn = new OnlineDonation();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'credit_card_payment_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'credit_card_payment_id'] : $strAliasPrefix . 'credit_card_payment_id';
			$objToReturn->intCreditCardPaymentId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'total_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'total_amount'] : $strAliasPrefix . 'total_amount';
			$objToReturn->fltTotalAmount = $objDbRow->GetColumn($strAliasName, 'Float');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'online_donation__';

			// Check for CreditCardPayment Early Binding
			$strAlias = $strAliasPrefix . 'credit_card_payment_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCreditCardPayment = CreditCardPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'credit_card_payment_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for OnlineDonationLineItem Virtual Binding
			$strAlias = $strAliasPrefix . 'onlinedonationlineitem__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objOnlineDonationLineItemArray[] = OnlineDonationLineItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'onlinedonationlineitem__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objOnlineDonationLineItem = OnlineDonationLineItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'onlinedonationlineitem__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of OnlineDonations from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return OnlineDonation[]
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
					$objItem = OnlineDonation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = OnlineDonation::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single OnlineDonation object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return OnlineDonation next row resulting from the query
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
			return OnlineDonation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single OnlineDonation object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return OnlineDonation
		*/
		public static function LoadById($intId) {
			return OnlineDonation::QuerySingle(
				QQ::Equal(QQN::OnlineDonation()->Id, $intId)
			);
		}
			
		/**
		 * Load a single OnlineDonation object,
		 * by CreditCardPaymentId Index(es)
		 * @param integer $intCreditCardPaymentId
		 * @return OnlineDonation
		*/
		public static function LoadByCreditCardPaymentId($intCreditCardPaymentId) {
			return OnlineDonation::QuerySingle(
				QQ::Equal(QQN::OnlineDonation()->CreditCardPaymentId, $intCreditCardPaymentId)
			);
		}
			
		/**
		 * Load an array of OnlineDonation objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OnlineDonation[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call OnlineDonation::QueryArray to perform the LoadArrayByPersonId query
			try {
				return OnlineDonation::QueryArray(
					QQ::Equal(QQN::OnlineDonation()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count OnlineDonations
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call OnlineDonation::QueryCount to perform the CountByPersonId query
			return OnlineDonation::QueryCount(
				QQ::Equal(QQN::OnlineDonation()->PersonId, $intPersonId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this OnlineDonation
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = OnlineDonation::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `online_donation` (
							`person_id`,
							`credit_card_payment_id`,
							`total_amount`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intCreditCardPaymentId) . ',
							' . $objDatabase->SqlVariable($this->fltTotalAmount) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('online_donation', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`online_donation`
						SET
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`credit_card_payment_id` = ' . $objDatabase->SqlVariable($this->intCreditCardPaymentId) . ',
							`total_amount` = ' . $objDatabase->SqlVariable($this->fltTotalAmount) . '
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
		 * Delete this OnlineDonation
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this OnlineDonation with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = OnlineDonation::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`online_donation`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all OnlineDonations
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = OnlineDonation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`online_donation`');
		}

		/**
		 * Truncate online_donation table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = OnlineDonation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `online_donation`');
		}

		/**
		 * Reload this OnlineDonation from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved OnlineDonation object.');

			// Reload the Object
			$objReloaded = OnlineDonation::Load($this->intId);

			// Update $this's local variables to match
			$this->intPersonId = $objReloaded->intPersonId;
			$this->CreditCardPaymentId = $objReloaded->CreditCardPaymentId;
			$this->fltTotalAmount = $objReloaded->fltTotalAmount;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = OnlineDonation::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `online_donation` (
					`id`,
					`person_id`,
					`credit_card_payment_id`,
					`total_amount`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->intCreditCardPaymentId) . ',
					' . $objDatabase->SqlVariable($this->fltTotalAmount) . ',
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
		 * @return OnlineDonation[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = OnlineDonation::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM online_donation WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return OnlineDonation::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return OnlineDonation[]
		 */
		public function GetJournal() {
			return OnlineDonation::GetJournalForId($this->intId);
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
					// Gets the value for intCreditCardPaymentId (Unique)
					// @return integer
					return $this->intCreditCardPaymentId;

				case 'TotalAmount':
					// Gets the value for fltTotalAmount 
					// @return double
					return $this->fltTotalAmount;


				///////////////////
				// Member Objects
				///////////////////
				case 'CreditCardPayment':
					// Gets the value for the CreditCardPayment object referenced by intCreditCardPaymentId (Unique)
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

				case '_OnlineDonationLineItem':
					// Gets the value for the private _objOnlineDonationLineItem (Read-Only)
					// if set due to an expansion on the online_donation_line_item.online_donation_id reverse relationship
					// @return OnlineDonationLineItem
					return $this->_objOnlineDonationLineItem;

				case '_OnlineDonationLineItemArray':
					// Gets the value for the private _objOnlineDonationLineItemArray (Read-Only)
					// if set due to an ExpandAsArray on the online_donation_line_item.online_donation_id reverse relationship
					// @return OnlineDonationLineItem[]
					return (array) $this->_objOnlineDonationLineItemArray;


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
						return ($this->intPersonId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreditCardPaymentId':
					// Sets the value for intCreditCardPaymentId (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCreditCardPayment = null;
						return ($this->intCreditCardPaymentId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TotalAmount':
					// Sets the value for fltTotalAmount 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltTotalAmount = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CreditCardPayment':
					// Sets the value for the CreditCardPayment object referenced by intCreditCardPaymentId (Unique)
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
							throw new QCallerException('Unable to set an unsaved CreditCardPayment for this OnlineDonation');

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

			
		
		// Related Objects' Methods for OnlineDonationLineItem
		//-------------------------------------------------------------------

		/**
		 * Gets all associated OnlineDonationLineItems as an array of OnlineDonationLineItem objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OnlineDonationLineItem[]
		*/ 
		public function GetOnlineDonationLineItemArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return OnlineDonationLineItem::LoadArrayByOnlineDonationId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OnlineDonationLineItems
		 * @return int
		*/ 
		public function CountOnlineDonationLineItems() {
			if ((is_null($this->intId)))
				return 0;

			return OnlineDonationLineItem::CountByOnlineDonationId($this->intId);
		}

		/**
		 * Associates a OnlineDonationLineItem
		 * @param OnlineDonationLineItem $objOnlineDonationLineItem
		 * @return void
		*/ 
		public function AssociateOnlineDonationLineItem(OnlineDonationLineItem $objOnlineDonationLineItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOnlineDonationLineItem on this unsaved OnlineDonation.');
			if ((is_null($objOnlineDonationLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOnlineDonationLineItem on this OnlineDonation with an unsaved OnlineDonationLineItem.');

			// Get the Database Object for this Class
			$objDatabase = OnlineDonation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`online_donation_line_item`
				SET
					`online_donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOnlineDonationLineItem->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objOnlineDonationLineItem->OnlineDonationId = $this->intId;
				$objOnlineDonationLineItem->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a OnlineDonationLineItem
		 * @param OnlineDonationLineItem $objOnlineDonationLineItem
		 * @return void
		*/ 
		public function UnassociateOnlineDonationLineItem(OnlineDonationLineItem $objOnlineDonationLineItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this unsaved OnlineDonation.');
			if ((is_null($objOnlineDonationLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this OnlineDonation with an unsaved OnlineDonationLineItem.');

			// Get the Database Object for this Class
			$objDatabase = OnlineDonation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`online_donation_line_item`
				SET
					`online_donation_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOnlineDonationLineItem->Id) . ' AND
					`online_donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objOnlineDonationLineItem->OnlineDonationId = null;
				$objOnlineDonationLineItem->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all OnlineDonationLineItems
		 * @return void
		*/ 
		public function UnassociateAllOnlineDonationLineItems() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this unsaved OnlineDonation.');

			// Get the Database Object for this Class
			$objDatabase = OnlineDonation::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (OnlineDonationLineItem::LoadArrayByOnlineDonationId($this->intId) as $objOnlineDonationLineItem) {
					$objOnlineDonationLineItem->OnlineDonationId = null;
					$objOnlineDonationLineItem->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`online_donation_line_item`
				SET
					`online_donation_id` = null
				WHERE
					`online_donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated OnlineDonationLineItem
		 * @param OnlineDonationLineItem $objOnlineDonationLineItem
		 * @return void
		*/ 
		public function DeleteAssociatedOnlineDonationLineItem(OnlineDonationLineItem $objOnlineDonationLineItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this unsaved OnlineDonation.');
			if ((is_null($objOnlineDonationLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this OnlineDonation with an unsaved OnlineDonationLineItem.');

			// Get the Database Object for this Class
			$objDatabase = OnlineDonation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`online_donation_line_item`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOnlineDonationLineItem->Id) . ' AND
					`online_donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objOnlineDonationLineItem->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated OnlineDonationLineItems
		 * @return void
		*/ 
		public function DeleteAllOnlineDonationLineItems() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this unsaved OnlineDonation.');

			// Get the Database Object for this Class
			$objDatabase = OnlineDonation::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (OnlineDonationLineItem::LoadArrayByOnlineDonationId($this->intId) as $objOnlineDonationLineItem) {
					$objOnlineDonationLineItem->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`online_donation_line_item`
				WHERE
					`online_donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="OnlineDonation"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="PersonId" type="xsd:int"/>';
			$strToReturn .= '<element name="CreditCardPayment" type="xsd1:CreditCardPayment"/>';
			$strToReturn .= '<element name="TotalAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('OnlineDonation', $strComplexTypeArray)) {
				$strComplexTypeArray['OnlineDonation'] = OnlineDonation::GetSoapComplexTypeXml();
				CreditCardPayment::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, OnlineDonation::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new OnlineDonation();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'PersonId'))
				$objToReturn->intPersonId = $objSoapObject->PersonId;
			if ((property_exists($objSoapObject, 'CreditCardPayment')) &&
				($objSoapObject->CreditCardPayment))
				$objToReturn->CreditCardPayment = CreditCardPayment::GetObjectFromSoapObject($objSoapObject->CreditCardPayment);
			if (property_exists($objSoapObject, 'TotalAmount'))
				$objToReturn->fltTotalAmount = $objSoapObject->TotalAmount;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, OnlineDonation::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCreditCardPayment)
				$objObject->objCreditCardPayment = CreditCardPayment::GetSoapObjectFromObject($objObject->objCreditCardPayment, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreditCardPaymentId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $PersonId
	 * @property-read QQNode $CreditCardPaymentId
	 * @property-read QQNodeCreditCardPayment $CreditCardPayment
	 * @property-read QQNode $TotalAmount
	 * @property-read QQReverseReferenceNodeOnlineDonationLineItem $OnlineDonationLineItem
	 */
	class QQNodeOnlineDonation extends QQNode {
		protected $strTableName = 'online_donation';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'OnlineDonation';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'CreditCardPaymentId':
					return new QQNode('credit_card_payment_id', 'CreditCardPaymentId', 'integer', $this);
				case 'CreditCardPayment':
					return new QQNodeCreditCardPayment('credit_card_payment_id', 'CreditCardPayment', 'integer', $this);
				case 'TotalAmount':
					return new QQNode('total_amount', 'TotalAmount', 'double', $this);
				case 'OnlineDonationLineItem':
					return new QQReverseReferenceNodeOnlineDonationLineItem($this, 'onlinedonationlineitem', 'reverse_reference', 'online_donation_id');

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
	 * @property-read QQNode $CreditCardPaymentId
	 * @property-read QQNodeCreditCardPayment $CreditCardPayment
	 * @property-read QQNode $TotalAmount
	 * @property-read QQReverseReferenceNodeOnlineDonationLineItem $OnlineDonationLineItem
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeOnlineDonation extends QQReverseReferenceNode {
		protected $strTableName = 'online_donation';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'OnlineDonation';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'CreditCardPaymentId':
					return new QQNode('credit_card_payment_id', 'CreditCardPaymentId', 'integer', $this);
				case 'CreditCardPayment':
					return new QQNodeCreditCardPayment('credit_card_payment_id', 'CreditCardPayment', 'integer', $this);
				case 'TotalAmount':
					return new QQNode('total_amount', 'TotalAmount', 'double', $this);
				case 'OnlineDonationLineItem':
					return new QQReverseReferenceNodeOnlineDonationLineItem($this, 'onlinedonationlineitem', 'reverse_reference', 'online_donation_id');

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