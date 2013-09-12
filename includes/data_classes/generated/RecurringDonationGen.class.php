<?php
	/**
	 * The abstract RecurringDonationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the RecurringDonation subclass which
	 * extends this RecurringDonationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the RecurringDonation class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property integer $RecurringPaymentId the value for intRecurringPaymentId (Unique)
	 * @property double $Amount the value for fltAmount 
	 * @property string $ConfirmationEmail the value for strConfirmationEmail 
	 * @property RecurringPayments $RecurringPayment the value for the RecurringPayments object referenced by intRecurringPaymentId (Unique)
	 * @property RecurringDonationItems $_RecurringDonationItems the value for the private _objRecurringDonationItems (Read-Only) if set due to an expansion on the recurring_donation_items.recurring_donation_id reverse relationship
	 * @property RecurringDonationItems[] $_RecurringDonationItemsArray the value for the private _objRecurringDonationItemsArray (Read-Only) if set due to an ExpandAsArray on the recurring_donation_items.recurring_donation_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class RecurringDonationGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column recurring_donation.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_donation.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_donation.recurring_payment_id
		 * @var integer intRecurringPaymentId
		 */
		protected $intRecurringPaymentId;
		const RecurringPaymentIdDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_donation.amount
		 * @var double fltAmount
		 */
		protected $fltAmount;
		const AmountDefault = null;


		/**
		 * Protected member variable that maps to the database column recurring_donation.confirmation_email
		 * @var string strConfirmationEmail
		 */
		protected $strConfirmationEmail;
		const ConfirmationEmailMaxLength = 255;
		const ConfirmationEmailDefault = null;


		/**
		 * Private member variable that stores a reference to a single RecurringDonationItems object
		 * (of type RecurringDonationItems), if this RecurringDonation object was restored with
		 * an expansion on the recurring_donation_items association table.
		 * @var RecurringDonationItems _objRecurringDonationItems;
		 */
		private $_objRecurringDonationItems;

		/**
		 * Private member variable that stores a reference to an array of RecurringDonationItems objects
		 * (of type RecurringDonationItems[]), if this RecurringDonation object was restored with
		 * an ExpandAsArray on the recurring_donation_items association table.
		 * @var RecurringDonationItems[] _objRecurringDonationItemsArray;
		 */
		private $_objRecurringDonationItemsArray = array();

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
		 * in the database column recurring_donation.recurring_payment_id.
		 *
		 * NOTE: Always use the RecurringPayment property getter to correctly retrieve this RecurringPayments object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var RecurringPayments objRecurringPayment
		 */
		protected $objRecurringPayment;





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
		 * Load a RecurringDonation from PK Info
		 * @param integer $intId
		 * @return RecurringDonation
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return RecurringDonation::QuerySingle(
				QQ::Equal(QQN::RecurringDonation()->Id, $intId)
			);
		}

		/**
		 * Load all RecurringDonations
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RecurringDonation[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call RecurringDonation::QueryArray to perform the LoadAll query
			try {
				return RecurringDonation::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all RecurringDonations
		 * @return int
		 */
		public static function CountAll() {
			// Call RecurringDonation::QueryCount to perform the CountAll query
			return RecurringDonation::QueryCount(QQ::All());
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
			$objDatabase = RecurringDonation::GetDatabase();

			// Create/Build out the QueryBuilder object with RecurringDonation-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'recurring_donation');
			RecurringDonation::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('recurring_donation');

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
		 * Static Qcodo Query method to query for a single RecurringDonation object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RecurringDonation the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RecurringDonation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new RecurringDonation object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = RecurringDonation::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return RecurringDonation::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of RecurringDonation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return RecurringDonation[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RecurringDonation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return RecurringDonation::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = RecurringDonation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of RecurringDonation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = RecurringDonation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = RecurringDonation::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'recurring_donation_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with RecurringDonation-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				RecurringDonation::GetSelectFields($objQueryBuilder);
				RecurringDonation::GetFromFields($objQueryBuilder);

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
			return RecurringDonation::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this RecurringDonation
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'recurring_donation';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'recurring_payment_id', $strAliasPrefix . 'recurring_payment_id');
			$objBuilder->AddSelectItem($strTableName, 'amount', $strAliasPrefix . 'amount');
			$objBuilder->AddSelectItem($strTableName, 'confirmation_email', $strAliasPrefix . 'confirmation_email');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a RecurringDonation from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this RecurringDonation::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return RecurringDonation
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
					$strAliasPrefix = 'recurring_donation__';


				$strAlias = $strAliasPrefix . 'recurringdonationitems__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRecurringDonationItemsArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRecurringDonationItemsArray[$intPreviousChildItemCount - 1];
						$objChildItem = RecurringDonationItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recurringdonationitems__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRecurringDonationItemsArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRecurringDonationItemsArray[] = RecurringDonationItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recurringdonationitems__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'recurring_donation__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the RecurringDonation object
			$objToReturn = new RecurringDonation();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'recurring_payment_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'recurring_payment_id'] : $strAliasPrefix . 'recurring_payment_id';
			$objToReturn->intRecurringPaymentId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount'] : $strAliasPrefix . 'amount';
			$objToReturn->fltAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'confirmation_email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'confirmation_email'] : $strAliasPrefix . 'confirmation_email';
			$objToReturn->strConfirmationEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'recurring_donation__';

			// Check for RecurringPayment Early Binding
			$strAlias = $strAliasPrefix . 'recurring_payment_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objRecurringPayment = RecurringPayments::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recurring_payment_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for RecurringDonationItems Virtual Binding
			$strAlias = $strAliasPrefix . 'recurringdonationitems__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRecurringDonationItemsArray[] = RecurringDonationItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recurringdonationitems__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRecurringDonationItems = RecurringDonationItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recurringdonationitems__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of RecurringDonations from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return RecurringDonation[]
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
					$objItem = RecurringDonation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = RecurringDonation::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single RecurringDonation object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return RecurringDonation next row resulting from the query
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
			return RecurringDonation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single RecurringDonation object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return RecurringDonation
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return RecurringDonation::QuerySingle(
				QQ::Equal(QQN::RecurringDonation()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single RecurringDonation object,
		 * by RecurringPaymentId Index(es)
		 * @param integer $intRecurringPaymentId
		 * @return RecurringDonation
		*/
		public static function LoadByRecurringPaymentId($intRecurringPaymentId, $objOptionalClauses = null) {
			return RecurringDonation::QuerySingle(
				QQ::Equal(QQN::RecurringDonation()->RecurringPaymentId, $intRecurringPaymentId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of RecurringDonation objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RecurringDonation[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call RecurringDonation::QueryArray to perform the LoadArrayByPersonId query
			try {
				return RecurringDonation::QueryArray(
					QQ::Equal(QQN::RecurringDonation()->PersonId, $intPersonId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count RecurringDonations
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call RecurringDonation::QueryCount to perform the CountByPersonId query
			return RecurringDonation::QueryCount(
				QQ::Equal(QQN::RecurringDonation()->PersonId, $intPersonId)
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
		 * Save this RecurringDonation
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = RecurringDonation::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `recurring_donation` (
							`person_id`,
							`recurring_payment_id`,
							`amount`,
							`confirmation_email`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intRecurringPaymentId) . ',
							' . $objDatabase->SqlVariable($this->fltAmount) . ',
							' . $objDatabase->SqlVariable($this->strConfirmationEmail) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('recurring_donation', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`recurring_donation`
						SET
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`recurring_payment_id` = ' . $objDatabase->SqlVariable($this->intRecurringPaymentId) . ',
							`amount` = ' . $objDatabase->SqlVariable($this->fltAmount) . ',
							`confirmation_email` = ' . $objDatabase->SqlVariable($this->strConfirmationEmail) . '
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
		 * Delete this RecurringDonation
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this RecurringDonation with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = RecurringDonation::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recurring_donation`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all RecurringDonations
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = RecurringDonation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recurring_donation`');
		}

		/**
		 * Truncate recurring_donation table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = RecurringDonation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `recurring_donation`');
		}

		/**
		 * Reload this RecurringDonation from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved RecurringDonation object.');

			// Reload the Object
			$objReloaded = RecurringDonation::Load($this->intId);

			// Update $this's local variables to match
			$this->intPersonId = $objReloaded->intPersonId;
			$this->RecurringPaymentId = $objReloaded->RecurringPaymentId;
			$this->fltAmount = $objReloaded->fltAmount;
			$this->strConfirmationEmail = $objReloaded->strConfirmationEmail;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = RecurringDonation::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `recurring_donation` (
					`id`,
					`person_id`,
					`recurring_payment_id`,
					`amount`,
					`confirmation_email`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->intRecurringPaymentId) . ',
					' . $objDatabase->SqlVariable($this->fltAmount) . ',
					' . $objDatabase->SqlVariable($this->strConfirmationEmail) . ',
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
		 * @return RecurringDonation[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = RecurringDonation::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM recurring_donation WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return RecurringDonation::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return RecurringDonation[]
		 */
		public function GetJournal() {
			return RecurringDonation::GetJournalForId($this->intId);
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

				case 'RecurringPaymentId':
					// Gets the value for intRecurringPaymentId (Unique)
					// @return integer
					return $this->intRecurringPaymentId;

				case 'Amount':
					// Gets the value for fltAmount 
					// @return double
					return $this->fltAmount;

				case 'ConfirmationEmail':
					// Gets the value for strConfirmationEmail 
					// @return string
					return $this->strConfirmationEmail;


				///////////////////
				// Member Objects
				///////////////////
				case 'RecurringPayment':
					// Gets the value for the RecurringPayments object referenced by intRecurringPaymentId (Unique)
					// @return RecurringPayments
					try {
						if ((!$this->objRecurringPayment) && (!is_null($this->intRecurringPaymentId)))
							$this->objRecurringPayment = RecurringPayments::Load($this->intRecurringPaymentId);
						return $this->objRecurringPayment;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_RecurringDonationItems':
					// Gets the value for the private _objRecurringDonationItems (Read-Only)
					// if set due to an expansion on the recurring_donation_items.recurring_donation_id reverse relationship
					// @return RecurringDonationItems
					return $this->_objRecurringDonationItems;

				case '_RecurringDonationItemsArray':
					// Gets the value for the private _objRecurringDonationItemsArray (Read-Only)
					// if set due to an ExpandAsArray on the recurring_donation_items.recurring_donation_id reverse relationship
					// @return RecurringDonationItems[]
					return (array) $this->_objRecurringDonationItemsArray;


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

				case 'RecurringPaymentId':
					// Sets the value for intRecurringPaymentId (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objRecurringPayment = null;
						return ($this->intRecurringPaymentId = QType::Cast($mixValue, QType::Integer));
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

				case 'ConfirmationEmail':
					// Sets the value for strConfirmationEmail 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strConfirmationEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'RecurringPayment':
					// Sets the value for the RecurringPayments object referenced by intRecurringPaymentId (Unique)
					// @param RecurringPayments $mixValue
					// @return RecurringPayments
					if (is_null($mixValue)) {
						$this->intRecurringPaymentId = null;
						$this->objRecurringPayment = null;
						return null;
					} else {
						// Make sure $mixValue actually is a RecurringPayments object
						try {
							$mixValue = QType::Cast($mixValue, 'RecurringPayments');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED RecurringPayments object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved RecurringPayment for this RecurringDonation');

						// Update Local Member Variables
						$this->objRecurringPayment = $mixValue;
						$this->intRecurringPaymentId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for RecurringDonationItems
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RecurringDonationItemses as an array of RecurringDonationItems objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RecurringDonationItems[]
		*/ 
		public function GetRecurringDonationItemsArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return RecurringDonationItems::LoadArrayByRecurringDonationId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RecurringDonationItemses
		 * @return int
		*/ 
		public function CountRecurringDonationItemses() {
			if ((is_null($this->intId)))
				return 0;

			return RecurringDonationItems::CountByRecurringDonationId($this->intId);
		}

		/**
		 * Associates a RecurringDonationItems
		 * @param RecurringDonationItems $objRecurringDonationItems
		 * @return void
		*/ 
		public function AssociateRecurringDonationItems(RecurringDonationItems $objRecurringDonationItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRecurringDonationItems on this unsaved RecurringDonation.');
			if ((is_null($objRecurringDonationItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRecurringDonationItems on this RecurringDonation with an unsaved RecurringDonationItems.');

			// Get the Database Object for this Class
			$objDatabase = RecurringDonation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`recurring_donation_items`
				SET
					`recurring_donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRecurringDonationItems->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRecurringDonationItems->RecurringDonationId = $this->intId;
				$objRecurringDonationItems->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RecurringDonationItems
		 * @param RecurringDonationItems $objRecurringDonationItems
		 * @return void
		*/ 
		public function UnassociateRecurringDonationItems(RecurringDonationItems $objRecurringDonationItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecurringDonationItems on this unsaved RecurringDonation.');
			if ((is_null($objRecurringDonationItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecurringDonationItems on this RecurringDonation with an unsaved RecurringDonationItems.');

			// Get the Database Object for this Class
			$objDatabase = RecurringDonation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`recurring_donation_items`
				SET
					`recurring_donation_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRecurringDonationItems->Id) . ' AND
					`recurring_donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRecurringDonationItems->RecurringDonationId = null;
				$objRecurringDonationItems->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RecurringDonationItemses
		 * @return void
		*/ 
		public function UnassociateAllRecurringDonationItemses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecurringDonationItems on this unsaved RecurringDonation.');

			// Get the Database Object for this Class
			$objDatabase = RecurringDonation::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RecurringDonationItems::LoadArrayByRecurringDonationId($this->intId) as $objRecurringDonationItems) {
					$objRecurringDonationItems->RecurringDonationId = null;
					$objRecurringDonationItems->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`recurring_donation_items`
				SET
					`recurring_donation_id` = null
				WHERE
					`recurring_donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated RecurringDonationItems
		 * @param RecurringDonationItems $objRecurringDonationItems
		 * @return void
		*/ 
		public function DeleteAssociatedRecurringDonationItems(RecurringDonationItems $objRecurringDonationItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecurringDonationItems on this unsaved RecurringDonation.');
			if ((is_null($objRecurringDonationItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecurringDonationItems on this RecurringDonation with an unsaved RecurringDonationItems.');

			// Get the Database Object for this Class
			$objDatabase = RecurringDonation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recurring_donation_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRecurringDonationItems->Id) . ' AND
					`recurring_donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRecurringDonationItems->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RecurringDonationItemses
		 * @return void
		*/ 
		public function DeleteAllRecurringDonationItemses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecurringDonationItems on this unsaved RecurringDonation.');

			// Get the Database Object for this Class
			$objDatabase = RecurringDonation::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (RecurringDonationItems::LoadArrayByRecurringDonationId($this->intId) as $objRecurringDonationItems) {
					$objRecurringDonationItems->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recurring_donation_items`
				WHERE
					`recurring_donation_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="RecurringDonation"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="PersonId" type="xsd:int"/>';
			$strToReturn .= '<element name="RecurringPayment" type="xsd1:RecurringPayments"/>';
			$strToReturn .= '<element name="Amount" type="xsd:float"/>';
			$strToReturn .= '<element name="ConfirmationEmail" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('RecurringDonation', $strComplexTypeArray)) {
				$strComplexTypeArray['RecurringDonation'] = RecurringDonation::GetSoapComplexTypeXml();
				RecurringPayments::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, RecurringDonation::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new RecurringDonation();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'PersonId'))
				$objToReturn->intPersonId = $objSoapObject->PersonId;
			if ((property_exists($objSoapObject, 'RecurringPayment')) &&
				($objSoapObject->RecurringPayment))
				$objToReturn->RecurringPayment = RecurringPayments::GetObjectFromSoapObject($objSoapObject->RecurringPayment);
			if (property_exists($objSoapObject, 'Amount'))
				$objToReturn->fltAmount = $objSoapObject->Amount;
			if (property_exists($objSoapObject, 'ConfirmationEmail'))
				$objToReturn->strConfirmationEmail = $objSoapObject->ConfirmationEmail;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, RecurringDonation::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objRecurringPayment)
				$objObject->objRecurringPayment = RecurringPayments::GetSoapObjectFromObject($objObject->objRecurringPayment, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRecurringPaymentId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $PersonId
	 * @property-read QQNode $RecurringPaymentId
	 * @property-read QQNodeRecurringPayments $RecurringPayment
	 * @property-read QQNode $Amount
	 * @property-read QQNode $ConfirmationEmail
	 * @property-read QQReverseReferenceNodeRecurringDonationItems $RecurringDonationItems
	 */
	class QQNodeRecurringDonation extends QQNode {
		protected $strTableName = 'recurring_donation';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'RecurringDonation';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'RecurringPaymentId':
					return new QQNode('recurring_payment_id', 'RecurringPaymentId', 'integer', $this);
				case 'RecurringPayment':
					return new QQNodeRecurringPayments('recurring_payment_id', 'RecurringPayment', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'ConfirmationEmail':
					return new QQNode('confirmation_email', 'ConfirmationEmail', 'string', $this);
				case 'RecurringDonationItems':
					return new QQReverseReferenceNodeRecurringDonationItems($this, 'recurringdonationitems', 'reverse_reference', 'recurring_donation_id');

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
	 * @property-read QQNode $RecurringPaymentId
	 * @property-read QQNodeRecurringPayments $RecurringPayment
	 * @property-read QQNode $Amount
	 * @property-read QQNode $ConfirmationEmail
	 * @property-read QQReverseReferenceNodeRecurringDonationItems $RecurringDonationItems
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeRecurringDonation extends QQReverseReferenceNode {
		protected $strTableName = 'recurring_donation';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'RecurringDonation';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'RecurringPaymentId':
					return new QQNode('recurring_payment_id', 'RecurringPaymentId', 'integer', $this);
				case 'RecurringPayment':
					return new QQNodeRecurringPayments('recurring_payment_id', 'RecurringPayment', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'ConfirmationEmail':
					return new QQNode('confirmation_email', 'ConfirmationEmail', 'string', $this);
				case 'RecurringDonationItems':
					return new QQReverseReferenceNodeRecurringDonationItems($this, 'recurringdonationitems', 'reverse_reference', 'recurring_donation_id');

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