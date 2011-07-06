<?php
	/**
	 * The abstract StewardshipFundGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the StewardshipFund subclass which
	 * extends this StewardshipFundGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StewardshipFund class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $MinistryId the value for intMinistryId 
	 * @property string $Name the value for strName 
	 * @property string $ExternalName the value for strExternalName 
	 * @property string $AccountNumber the value for strAccountNumber 
	 * @property string $FundNumber the value for strFundNumber 
	 * @property boolean $ActiveFlag the value for blnActiveFlag 
	 * @property boolean $ExternalFlag the value for blnExternalFlag 
	 * @property Ministry $Ministry the value for the Ministry object referenced by intMinistryId 
	 * @property OnlineDonationLineItem $_OnlineDonationLineItem the value for the private _objOnlineDonationLineItem (Read-Only) if set due to an expansion on the online_donation_line_item.stewardship_fund_id reverse relationship
	 * @property OnlineDonationLineItem[] $_OnlineDonationLineItemArray the value for the private _objOnlineDonationLineItemArray (Read-Only) if set due to an ExpandAsArray on the online_donation_line_item.stewardship_fund_id reverse relationship
	 * @property SignupForm $_SignupForm the value for the private _objSignupForm (Read-Only) if set due to an expansion on the signup_form.stewardship_fund_id reverse relationship
	 * @property SignupForm[] $_SignupFormArray the value for the private _objSignupFormArray (Read-Only) if set due to an ExpandAsArray on the signup_form.stewardship_fund_id reverse relationship
	 * @property SignupPayment $_SignupPayment the value for the private _objSignupPayment (Read-Only) if set due to an expansion on the signup_payment.stewardship_fund_id reverse relationship
	 * @property SignupPayment[] $_SignupPaymentArray the value for the private _objSignupPaymentArray (Read-Only) if set due to an ExpandAsArray on the signup_payment.stewardship_fund_id reverse relationship
	 * @property StewardshipContributionAmount $_StewardshipContributionAmount the value for the private _objStewardshipContributionAmount (Read-Only) if set due to an expansion on the stewardship_contribution_amount.stewardship_fund_id reverse relationship
	 * @property StewardshipContributionAmount[] $_StewardshipContributionAmountArray the value for the private _objStewardshipContributionAmountArray (Read-Only) if set due to an ExpandAsArray on the stewardship_contribution_amount.stewardship_fund_id reverse relationship
	 * @property StewardshipPledge $_StewardshipPledge the value for the private _objStewardshipPledge (Read-Only) if set due to an expansion on the stewardship_pledge.stewardship_fund_id reverse relationship
	 * @property StewardshipPledge[] $_StewardshipPledgeArray the value for the private _objStewardshipPledgeArray (Read-Only) if set due to an ExpandAsArray on the stewardship_pledge.stewardship_fund_id reverse relationship
	 * @property StewardshipPostAmount $_StewardshipPostAmount the value for the private _objStewardshipPostAmount (Read-Only) if set due to an expansion on the stewardship_post_amount.stewardship_fund_id reverse relationship
	 * @property StewardshipPostAmount[] $_StewardshipPostAmountArray the value for the private _objStewardshipPostAmountArray (Read-Only) if set due to an ExpandAsArray on the stewardship_post_amount.stewardship_fund_id reverse relationship
	 * @property StewardshipPostLineItem $_StewardshipPostLineItem the value for the private _objStewardshipPostLineItem (Read-Only) if set due to an expansion on the stewardship_post_line_item.stewardship_fund_id reverse relationship
	 * @property StewardshipPostLineItem[] $_StewardshipPostLineItemArray the value for the private _objStewardshipPostLineItemArray (Read-Only) if set due to an ExpandAsArray on the stewardship_post_line_item.stewardship_fund_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class StewardshipFundGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column stewardship_fund.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_fund.ministry_id
		 * @var integer intMinistryId
		 */
		protected $intMinistryId;
		const MinistryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_fund.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 200;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_fund.external_name
		 * @var string strExternalName
		 */
		protected $strExternalName;
		const ExternalNameMaxLength = 200;
		const ExternalNameDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_fund.account_number
		 * @var string strAccountNumber
		 */
		protected $strAccountNumber;
		const AccountNumberMaxLength = 100;
		const AccountNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_fund.fund_number
		 * @var string strFundNumber
		 */
		protected $strFundNumber;
		const FundNumberMaxLength = 100;
		const FundNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_fund.active_flag
		 * @var boolean blnActiveFlag
		 */
		protected $blnActiveFlag;
		const ActiveFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_fund.external_flag
		 * @var boolean blnExternalFlag
		 */
		protected $blnExternalFlag;
		const ExternalFlagDefault = null;


		/**
		 * Private member variable that stores a reference to a single OnlineDonationLineItem object
		 * (of type OnlineDonationLineItem), if this StewardshipFund object was restored with
		 * an expansion on the online_donation_line_item association table.
		 * @var OnlineDonationLineItem _objOnlineDonationLineItem;
		 */
		private $_objOnlineDonationLineItem;

		/**
		 * Private member variable that stores a reference to an array of OnlineDonationLineItem objects
		 * (of type OnlineDonationLineItem[]), if this StewardshipFund object was restored with
		 * an ExpandAsArray on the online_donation_line_item association table.
		 * @var OnlineDonationLineItem[] _objOnlineDonationLineItemArray;
		 */
		private $_objOnlineDonationLineItemArray = array();

		/**
		 * Private member variable that stores a reference to a single SignupForm object
		 * (of type SignupForm), if this StewardshipFund object was restored with
		 * an expansion on the signup_form association table.
		 * @var SignupForm _objSignupForm;
		 */
		private $_objSignupForm;

		/**
		 * Private member variable that stores a reference to an array of SignupForm objects
		 * (of type SignupForm[]), if this StewardshipFund object was restored with
		 * an ExpandAsArray on the signup_form association table.
		 * @var SignupForm[] _objSignupFormArray;
		 */
		private $_objSignupFormArray = array();

		/**
		 * Private member variable that stores a reference to a single SignupPayment object
		 * (of type SignupPayment), if this StewardshipFund object was restored with
		 * an expansion on the signup_payment association table.
		 * @var SignupPayment _objSignupPayment;
		 */
		private $_objSignupPayment;

		/**
		 * Private member variable that stores a reference to an array of SignupPayment objects
		 * (of type SignupPayment[]), if this StewardshipFund object was restored with
		 * an ExpandAsArray on the signup_payment association table.
		 * @var SignupPayment[] _objSignupPaymentArray;
		 */
		private $_objSignupPaymentArray = array();

		/**
		 * Private member variable that stores a reference to a single StewardshipContributionAmount object
		 * (of type StewardshipContributionAmount), if this StewardshipFund object was restored with
		 * an expansion on the stewardship_contribution_amount association table.
		 * @var StewardshipContributionAmount _objStewardshipContributionAmount;
		 */
		private $_objStewardshipContributionAmount;

		/**
		 * Private member variable that stores a reference to an array of StewardshipContributionAmount objects
		 * (of type StewardshipContributionAmount[]), if this StewardshipFund object was restored with
		 * an ExpandAsArray on the stewardship_contribution_amount association table.
		 * @var StewardshipContributionAmount[] _objStewardshipContributionAmountArray;
		 */
		private $_objStewardshipContributionAmountArray = array();

		/**
		 * Private member variable that stores a reference to a single StewardshipPledge object
		 * (of type StewardshipPledge), if this StewardshipFund object was restored with
		 * an expansion on the stewardship_pledge association table.
		 * @var StewardshipPledge _objStewardshipPledge;
		 */
		private $_objStewardshipPledge;

		/**
		 * Private member variable that stores a reference to an array of StewardshipPledge objects
		 * (of type StewardshipPledge[]), if this StewardshipFund object was restored with
		 * an ExpandAsArray on the stewardship_pledge association table.
		 * @var StewardshipPledge[] _objStewardshipPledgeArray;
		 */
		private $_objStewardshipPledgeArray = array();

		/**
		 * Private member variable that stores a reference to a single StewardshipPostAmount object
		 * (of type StewardshipPostAmount), if this StewardshipFund object was restored with
		 * an expansion on the stewardship_post_amount association table.
		 * @var StewardshipPostAmount _objStewardshipPostAmount;
		 */
		private $_objStewardshipPostAmount;

		/**
		 * Private member variable that stores a reference to an array of StewardshipPostAmount objects
		 * (of type StewardshipPostAmount[]), if this StewardshipFund object was restored with
		 * an ExpandAsArray on the stewardship_post_amount association table.
		 * @var StewardshipPostAmount[] _objStewardshipPostAmountArray;
		 */
		private $_objStewardshipPostAmountArray = array();

		/**
		 * Private member variable that stores a reference to a single StewardshipPostLineItem object
		 * (of type StewardshipPostLineItem), if this StewardshipFund object was restored with
		 * an expansion on the stewardship_post_line_item association table.
		 * @var StewardshipPostLineItem _objStewardshipPostLineItem;
		 */
		private $_objStewardshipPostLineItem;

		/**
		 * Private member variable that stores a reference to an array of StewardshipPostLineItem objects
		 * (of type StewardshipPostLineItem[]), if this StewardshipFund object was restored with
		 * an ExpandAsArray on the stewardship_post_line_item association table.
		 * @var StewardshipPostLineItem[] _objStewardshipPostLineItemArray;
		 */
		private $_objStewardshipPostLineItemArray = array();

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
		 * in the database column stewardship_fund.ministry_id.
		 *
		 * NOTE: Always use the Ministry property getter to correctly retrieve this Ministry object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Ministry objMinistry
		 */
		protected $objMinistry;





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
		 * Load a StewardshipFund from PK Info
		 * @param integer $intId
		 * @return StewardshipFund
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return StewardshipFund::QuerySingle(
				QQ::Equal(QQN::StewardshipFund()->Id, $intId)
			);
		}

		/**
		 * Load all StewardshipFunds
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipFund[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call StewardshipFund::QueryArray to perform the LoadAll query
			try {
				return StewardshipFund::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all StewardshipFunds
		 * @return int
		 */
		public static function CountAll() {
			// Call StewardshipFund::QueryCount to perform the CountAll query
			return StewardshipFund::QueryCount(QQ::All());
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
			$objDatabase = StewardshipFund::GetDatabase();

			// Create/Build out the QueryBuilder object with StewardshipFund-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'stewardship_fund');
			StewardshipFund::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('stewardship_fund');

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
		 * Static Qcodo Query method to query for a single StewardshipFund object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipFund the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipFund::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new StewardshipFund object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = StewardshipFund::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return StewardshipFund::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of StewardshipFund objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipFund[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipFund::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return StewardshipFund::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = StewardshipFund::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of StewardshipFund objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipFund::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = StewardshipFund::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'stewardship_fund_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with StewardshipFund-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				StewardshipFund::GetSelectFields($objQueryBuilder);
				StewardshipFund::GetFromFields($objQueryBuilder);

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
			return StewardshipFund::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this StewardshipFund
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'stewardship_fund';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'ministry_id', $strAliasPrefix . 'ministry_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'external_name', $strAliasPrefix . 'external_name');
			$objBuilder->AddSelectItem($strTableName, 'account_number', $strAliasPrefix . 'account_number');
			$objBuilder->AddSelectItem($strTableName, 'fund_number', $strAliasPrefix . 'fund_number');
			$objBuilder->AddSelectItem($strTableName, 'active_flag', $strAliasPrefix . 'active_flag');
			$objBuilder->AddSelectItem($strTableName, 'external_flag', $strAliasPrefix . 'external_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a StewardshipFund from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this StewardshipFund::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipFund
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
					$strAliasPrefix = 'stewardship_fund__';


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

				$strAlias = $strAliasPrefix . 'signupform__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objSignupFormArray)) {
						$objPreviousChildItem = $objPreviousItem->_objSignupFormArray[$intPreviousChildItemCount - 1];
						$objChildItem = SignupForm::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupform__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objSignupFormArray[] = $objChildItem;
					} else
						$objPreviousItem->_objSignupFormArray[] = SignupForm::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupform__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'signuppayment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objSignupPaymentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objSignupPaymentArray[$intPreviousChildItemCount - 1];
						$objChildItem = SignupPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signuppayment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objSignupPaymentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objSignupPaymentArray[] = SignupPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signuppayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'stewardshipcontributionamount__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStewardshipContributionAmountArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStewardshipContributionAmountArray[$intPreviousChildItemCount - 1];
						$objChildItem = StewardshipContributionAmount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontributionamount__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStewardshipContributionAmountArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStewardshipContributionAmountArray[] = StewardshipContributionAmount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontributionamount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'stewardshippledge__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStewardshipPledgeArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStewardshipPledgeArray[$intPreviousChildItemCount - 1];
						$objChildItem = StewardshipPledge::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippledge__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStewardshipPledgeArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStewardshipPledgeArray[] = StewardshipPledge::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippledge__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'stewardshippostamount__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStewardshipPostAmountArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStewardshipPostAmountArray[$intPreviousChildItemCount - 1];
						$objChildItem = StewardshipPostAmount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippostamount__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStewardshipPostAmountArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStewardshipPostAmountArray[] = StewardshipPostAmount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippostamount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'stewardshippostlineitem__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStewardshipPostLineItemArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStewardshipPostLineItemArray[$intPreviousChildItemCount - 1];
						$objChildItem = StewardshipPostLineItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippostlineitem__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStewardshipPostLineItemArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStewardshipPostLineItemArray[] = StewardshipPostLineItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippostlineitem__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'stewardship_fund__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the StewardshipFund object
			$objToReturn = new StewardshipFund();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'ministry_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ministry_id'] : $strAliasPrefix . 'ministry_id';
			$objToReturn->intMinistryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'external_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'external_name'] : $strAliasPrefix . 'external_name';
			$objToReturn->strExternalName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'account_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'account_number'] : $strAliasPrefix . 'account_number';
			$objToReturn->strAccountNumber = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'fund_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'fund_number'] : $strAliasPrefix . 'fund_number';
			$objToReturn->strFundNumber = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'active_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'active_flag'] : $strAliasPrefix . 'active_flag';
			$objToReturn->blnActiveFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'external_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'external_flag'] : $strAliasPrefix . 'external_flag';
			$objToReturn->blnExternalFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'stewardship_fund__';

			// Check for Ministry Early Binding
			$strAlias = $strAliasPrefix . 'ministry_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objMinistry = Ministry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ministry_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for OnlineDonationLineItem Virtual Binding
			$strAlias = $strAliasPrefix . 'onlinedonationlineitem__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objOnlineDonationLineItemArray[] = OnlineDonationLineItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'onlinedonationlineitem__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objOnlineDonationLineItem = OnlineDonationLineItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'onlinedonationlineitem__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for SignupForm Virtual Binding
			$strAlias = $strAliasPrefix . 'signupform__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objSignupFormArray[] = SignupForm::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupform__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objSignupForm = SignupForm::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupform__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for SignupPayment Virtual Binding
			$strAlias = $strAliasPrefix . 'signuppayment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objSignupPaymentArray[] = SignupPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signuppayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objSignupPayment = SignupPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signuppayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StewardshipContributionAmount Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshipcontributionamount__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipContributionAmountArray[] = StewardshipContributionAmount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontributionamount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipContributionAmount = StewardshipContributionAmount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontributionamount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StewardshipPledge Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshippledge__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipPledgeArray[] = StewardshipPledge::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippledge__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipPledge = StewardshipPledge::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippledge__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StewardshipPostAmount Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshippostamount__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipPostAmountArray[] = StewardshipPostAmount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippostamount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipPostAmount = StewardshipPostAmount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippostamount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StewardshipPostLineItem Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshippostlineitem__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipPostLineItemArray[] = StewardshipPostLineItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippostlineitem__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipPostLineItem = StewardshipPostLineItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippostlineitem__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of StewardshipFunds from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipFund[]
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
					$objItem = StewardshipFund::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = StewardshipFund::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single StewardshipFund object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return StewardshipFund next row resulting from the query
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
			return StewardshipFund::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single StewardshipFund object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return StewardshipFund
		*/
		public static function LoadById($intId) {
			return StewardshipFund::QuerySingle(
				QQ::Equal(QQN::StewardshipFund()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of StewardshipFund objects,
		 * by MinistryId Index(es)
		 * @param integer $intMinistryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipFund[]
		*/
		public static function LoadArrayByMinistryId($intMinistryId, $objOptionalClauses = null) {
			// Call StewardshipFund::QueryArray to perform the LoadArrayByMinistryId query
			try {
				return StewardshipFund::QueryArray(
					QQ::Equal(QQN::StewardshipFund()->MinistryId, $intMinistryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipFunds
		 * by MinistryId Index(es)
		 * @param integer $intMinistryId
		 * @return int
		*/
		public static function CountByMinistryId($intMinistryId) {
			// Call StewardshipFund::QueryCount to perform the CountByMinistryId query
			return StewardshipFund::QueryCount(
				QQ::Equal(QQN::StewardshipFund()->MinistryId, $intMinistryId)
			);
		}
			
		/**
		 * Load an array of StewardshipFund objects,
		 * by ActiveFlag Index(es)
		 * @param boolean $blnActiveFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipFund[]
		*/
		public static function LoadArrayByActiveFlag($blnActiveFlag, $objOptionalClauses = null) {
			// Call StewardshipFund::QueryArray to perform the LoadArrayByActiveFlag query
			try {
				return StewardshipFund::QueryArray(
					QQ::Equal(QQN::StewardshipFund()->ActiveFlag, $blnActiveFlag),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipFunds
		 * by ActiveFlag Index(es)
		 * @param boolean $blnActiveFlag
		 * @return int
		*/
		public static function CountByActiveFlag($blnActiveFlag) {
			// Call StewardshipFund::QueryCount to perform the CountByActiveFlag query
			return StewardshipFund::QueryCount(
				QQ::Equal(QQN::StewardshipFund()->ActiveFlag, $blnActiveFlag)
			);
		}
			
		/**
		 * Load an array of StewardshipFund objects,
		 * by ExternalFlag Index(es)
		 * @param boolean $blnExternalFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipFund[]
		*/
		public static function LoadArrayByExternalFlag($blnExternalFlag, $objOptionalClauses = null) {
			// Call StewardshipFund::QueryArray to perform the LoadArrayByExternalFlag query
			try {
				return StewardshipFund::QueryArray(
					QQ::Equal(QQN::StewardshipFund()->ExternalFlag, $blnExternalFlag),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipFunds
		 * by ExternalFlag Index(es)
		 * @param boolean $blnExternalFlag
		 * @return int
		*/
		public static function CountByExternalFlag($blnExternalFlag) {
			// Call StewardshipFund::QueryCount to perform the CountByExternalFlag query
			return StewardshipFund::QueryCount(
				QQ::Equal(QQN::StewardshipFund()->ExternalFlag, $blnExternalFlag)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this StewardshipFund
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `stewardship_fund` (
							`ministry_id`,
							`name`,
							`external_name`,
							`account_number`,
							`fund_number`,
							`active_flag`,
							`external_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intMinistryId) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strExternalName) . ',
							' . $objDatabase->SqlVariable($this->strAccountNumber) . ',
							' . $objDatabase->SqlVariable($this->strFundNumber) . ',
							' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
							' . $objDatabase->SqlVariable($this->blnExternalFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('stewardship_fund', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`stewardship_fund`
						SET
							`ministry_id` = ' . $objDatabase->SqlVariable($this->intMinistryId) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`external_name` = ' . $objDatabase->SqlVariable($this->strExternalName) . ',
							`account_number` = ' . $objDatabase->SqlVariable($this->strAccountNumber) . ',
							`fund_number` = ' . $objDatabase->SqlVariable($this->strFundNumber) . ',
							`active_flag` = ' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
							`external_flag` = ' . $objDatabase->SqlVariable($this->blnExternalFlag) . '
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
		 * Delete this StewardshipFund
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this StewardshipFund with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_fund`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all StewardshipFunds
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_fund`');
		}

		/**
		 * Truncate stewardship_fund table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `stewardship_fund`');
		}

		/**
		 * Reload this StewardshipFund from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved StewardshipFund object.');

			// Reload the Object
			$objReloaded = StewardshipFund::Load($this->intId);

			// Update $this's local variables to match
			$this->MinistryId = $objReloaded->MinistryId;
			$this->strName = $objReloaded->strName;
			$this->strExternalName = $objReloaded->strExternalName;
			$this->strAccountNumber = $objReloaded->strAccountNumber;
			$this->strFundNumber = $objReloaded->strFundNumber;
			$this->blnActiveFlag = $objReloaded->blnActiveFlag;
			$this->blnExternalFlag = $objReloaded->blnExternalFlag;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = StewardshipFund::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `stewardship_fund` (
					`id`,
					`ministry_id`,
					`name`,
					`external_name`,
					`account_number`,
					`fund_number`,
					`active_flag`,
					`external_flag`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intMinistryId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->strExternalName) . ',
					' . $objDatabase->SqlVariable($this->strAccountNumber) . ',
					' . $objDatabase->SqlVariable($this->strFundNumber) . ',
					' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
					' . $objDatabase->SqlVariable($this->blnExternalFlag) . ',
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
		 * @return StewardshipFund[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = StewardshipFund::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM stewardship_fund WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return StewardshipFund::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return StewardshipFund[]
		 */
		public function GetJournal() {
			return StewardshipFund::GetJournalForId($this->intId);
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

				case 'MinistryId':
					// Gets the value for intMinistryId 
					// @return integer
					return $this->intMinistryId;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'ExternalName':
					// Gets the value for strExternalName 
					// @return string
					return $this->strExternalName;

				case 'AccountNumber':
					// Gets the value for strAccountNumber 
					// @return string
					return $this->strAccountNumber;

				case 'FundNumber':
					// Gets the value for strFundNumber 
					// @return string
					return $this->strFundNumber;

				case 'ActiveFlag':
					// Gets the value for blnActiveFlag 
					// @return boolean
					return $this->blnActiveFlag;

				case 'ExternalFlag':
					// Gets the value for blnExternalFlag 
					// @return boolean
					return $this->blnExternalFlag;


				///////////////////
				// Member Objects
				///////////////////
				case 'Ministry':
					// Gets the value for the Ministry object referenced by intMinistryId 
					// @return Ministry
					try {
						if ((!$this->objMinistry) && (!is_null($this->intMinistryId)))
							$this->objMinistry = Ministry::Load($this->intMinistryId);
						return $this->objMinistry;
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
					// if set due to an expansion on the online_donation_line_item.stewardship_fund_id reverse relationship
					// @return OnlineDonationLineItem
					return $this->_objOnlineDonationLineItem;

				case '_OnlineDonationLineItemArray':
					// Gets the value for the private _objOnlineDonationLineItemArray (Read-Only)
					// if set due to an ExpandAsArray on the online_donation_line_item.stewardship_fund_id reverse relationship
					// @return OnlineDonationLineItem[]
					return (array) $this->_objOnlineDonationLineItemArray;

				case '_SignupForm':
					// Gets the value for the private _objSignupForm (Read-Only)
					// if set due to an expansion on the signup_form.stewardship_fund_id reverse relationship
					// @return SignupForm
					return $this->_objSignupForm;

				case '_SignupFormArray':
					// Gets the value for the private _objSignupFormArray (Read-Only)
					// if set due to an ExpandAsArray on the signup_form.stewardship_fund_id reverse relationship
					// @return SignupForm[]
					return (array) $this->_objSignupFormArray;

				case '_SignupPayment':
					// Gets the value for the private _objSignupPayment (Read-Only)
					// if set due to an expansion on the signup_payment.stewardship_fund_id reverse relationship
					// @return SignupPayment
					return $this->_objSignupPayment;

				case '_SignupPaymentArray':
					// Gets the value for the private _objSignupPaymentArray (Read-Only)
					// if set due to an ExpandAsArray on the signup_payment.stewardship_fund_id reverse relationship
					// @return SignupPayment[]
					return (array) $this->_objSignupPaymentArray;

				case '_StewardshipContributionAmount':
					// Gets the value for the private _objStewardshipContributionAmount (Read-Only)
					// if set due to an expansion on the stewardship_contribution_amount.stewardship_fund_id reverse relationship
					// @return StewardshipContributionAmount
					return $this->_objStewardshipContributionAmount;

				case '_StewardshipContributionAmountArray':
					// Gets the value for the private _objStewardshipContributionAmountArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_contribution_amount.stewardship_fund_id reverse relationship
					// @return StewardshipContributionAmount[]
					return (array) $this->_objStewardshipContributionAmountArray;

				case '_StewardshipPledge':
					// Gets the value for the private _objStewardshipPledge (Read-Only)
					// if set due to an expansion on the stewardship_pledge.stewardship_fund_id reverse relationship
					// @return StewardshipPledge
					return $this->_objStewardshipPledge;

				case '_StewardshipPledgeArray':
					// Gets the value for the private _objStewardshipPledgeArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_pledge.stewardship_fund_id reverse relationship
					// @return StewardshipPledge[]
					return (array) $this->_objStewardshipPledgeArray;

				case '_StewardshipPostAmount':
					// Gets the value for the private _objStewardshipPostAmount (Read-Only)
					// if set due to an expansion on the stewardship_post_amount.stewardship_fund_id reverse relationship
					// @return StewardshipPostAmount
					return $this->_objStewardshipPostAmount;

				case '_StewardshipPostAmountArray':
					// Gets the value for the private _objStewardshipPostAmountArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_post_amount.stewardship_fund_id reverse relationship
					// @return StewardshipPostAmount[]
					return (array) $this->_objStewardshipPostAmountArray;

				case '_StewardshipPostLineItem':
					// Gets the value for the private _objStewardshipPostLineItem (Read-Only)
					// if set due to an expansion on the stewardship_post_line_item.stewardship_fund_id reverse relationship
					// @return StewardshipPostLineItem
					return $this->_objStewardshipPostLineItem;

				case '_StewardshipPostLineItemArray':
					// Gets the value for the private _objStewardshipPostLineItemArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_post_line_item.stewardship_fund_id reverse relationship
					// @return StewardshipPostLineItem[]
					return (array) $this->_objStewardshipPostLineItemArray;


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
				case 'MinistryId':
					// Sets the value for intMinistryId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objMinistry = null;
						return ($this->intMinistryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'ExternalName':
					// Sets the value for strExternalName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strExternalName = QType::Cast($mixValue, QType::String));
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

				case 'FundNumber':
					// Sets the value for strFundNumber 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFundNumber = QType::Cast($mixValue, QType::String));
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

				case 'ExternalFlag':
					// Sets the value for blnExternalFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnExternalFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Ministry':
					// Sets the value for the Ministry object referenced by intMinistryId 
					// @param Ministry $mixValue
					// @return Ministry
					if (is_null($mixValue)) {
						$this->intMinistryId = null;
						$this->objMinistry = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Ministry object
						try {
							$mixValue = QType::Cast($mixValue, 'Ministry');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Ministry object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Ministry for this StewardshipFund');

						// Update Local Member Variables
						$this->objMinistry = $mixValue;
						$this->intMinistryId = $mixValue->Id;

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
				return OnlineDonationLineItem::LoadArrayByStewardshipFundId($this->intId, $objOptionalClauses);
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

			return OnlineDonationLineItem::CountByStewardshipFundId($this->intId);
		}

		/**
		 * Associates a OnlineDonationLineItem
		 * @param OnlineDonationLineItem $objOnlineDonationLineItem
		 * @return void
		*/ 
		public function AssociateOnlineDonationLineItem(OnlineDonationLineItem $objOnlineDonationLineItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOnlineDonationLineItem on this unsaved StewardshipFund.');
			if ((is_null($objOnlineDonationLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOnlineDonationLineItem on this StewardshipFund with an unsaved OnlineDonationLineItem.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`online_donation_line_item`
				SET
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOnlineDonationLineItem->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objOnlineDonationLineItem->StewardshipFundId = $this->intId;
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this unsaved StewardshipFund.');
			if ((is_null($objOnlineDonationLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this StewardshipFund with an unsaved OnlineDonationLineItem.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`online_donation_line_item`
				SET
					`stewardship_fund_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOnlineDonationLineItem->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objOnlineDonationLineItem->StewardshipFundId = null;
				$objOnlineDonationLineItem->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all OnlineDonationLineItems
		 * @return void
		*/ 
		public function UnassociateAllOnlineDonationLineItems() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (OnlineDonationLineItem::LoadArrayByStewardshipFundId($this->intId) as $objOnlineDonationLineItem) {
					$objOnlineDonationLineItem->StewardshipFundId = null;
					$objOnlineDonationLineItem->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`online_donation_line_item`
				SET
					`stewardship_fund_id` = null
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated OnlineDonationLineItem
		 * @param OnlineDonationLineItem $objOnlineDonationLineItem
		 * @return void
		*/ 
		public function DeleteAssociatedOnlineDonationLineItem(OnlineDonationLineItem $objOnlineDonationLineItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this unsaved StewardshipFund.');
			if ((is_null($objOnlineDonationLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this StewardshipFund with an unsaved OnlineDonationLineItem.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`online_donation_line_item`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOnlineDonationLineItem->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOnlineDonationLineItem on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (OnlineDonationLineItem::LoadArrayByStewardshipFundId($this->intId) as $objOnlineDonationLineItem) {
					$objOnlineDonationLineItem->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`online_donation_line_item`
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for SignupForm
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SignupForms as an array of SignupForm objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupForm[]
		*/ 
		public function GetSignupFormArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SignupForm::LoadArrayByStewardshipFundId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SignupForms
		 * @return int
		*/ 
		public function CountSignupForms() {
			if ((is_null($this->intId)))
				return 0;

			return SignupForm::CountByStewardshipFundId($this->intId);
		}

		/**
		 * Associates a SignupForm
		 * @param SignupForm $objSignupForm
		 * @return void
		*/ 
		public function AssociateSignupForm(SignupForm $objSignupForm) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSignupForm on this unsaved StewardshipFund.');
			if ((is_null($objSignupForm->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSignupForm on this StewardshipFund with an unsaved SignupForm.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_form`
				SET
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupForm->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objSignupForm->StewardshipFundId = $this->intId;
				$objSignupForm->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a SignupForm
		 * @param SignupForm $objSignupForm
		 * @return void
		*/ 
		public function UnassociateSignupForm(SignupForm $objSignupForm) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupForm on this unsaved StewardshipFund.');
			if ((is_null($objSignupForm->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupForm on this StewardshipFund with an unsaved SignupForm.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_form`
				SET
					`stewardship_fund_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupForm->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSignupForm->StewardshipFundId = null;
				$objSignupForm->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all SignupForms
		 * @return void
		*/ 
		public function UnassociateAllSignupForms() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupForm on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SignupForm::LoadArrayByStewardshipFundId($this->intId) as $objSignupForm) {
					$objSignupForm->StewardshipFundId = null;
					$objSignupForm->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_form`
				SET
					`stewardship_fund_id` = null
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated SignupForm
		 * @param SignupForm $objSignupForm
		 * @return void
		*/ 
		public function DeleteAssociatedSignupForm(SignupForm $objSignupForm) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupForm on this unsaved StewardshipFund.');
			if ((is_null($objSignupForm->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupForm on this StewardshipFund with an unsaved SignupForm.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_form`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupForm->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSignupForm->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated SignupForms
		 * @return void
		*/ 
		public function DeleteAllSignupForms() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupForm on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SignupForm::LoadArrayByStewardshipFundId($this->intId) as $objSignupForm) {
					$objSignupForm->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_form`
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for SignupPayment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SignupPayments as an array of SignupPayment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupPayment[]
		*/ 
		public function GetSignupPaymentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SignupPayment::LoadArrayByStewardshipFundId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SignupPayments
		 * @return int
		*/ 
		public function CountSignupPayments() {
			if ((is_null($this->intId)))
				return 0;

			return SignupPayment::CountByStewardshipFundId($this->intId);
		}

		/**
		 * Associates a SignupPayment
		 * @param SignupPayment $objSignupPayment
		 * @return void
		*/ 
		public function AssociateSignupPayment(SignupPayment $objSignupPayment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSignupPayment on this unsaved StewardshipFund.');
			if ((is_null($objSignupPayment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSignupPayment on this StewardshipFund with an unsaved SignupPayment.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_payment`
				SET
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupPayment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objSignupPayment->StewardshipFundId = $this->intId;
				$objSignupPayment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a SignupPayment
		 * @param SignupPayment $objSignupPayment
		 * @return void
		*/ 
		public function UnassociateSignupPayment(SignupPayment $objSignupPayment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupPayment on this unsaved StewardshipFund.');
			if ((is_null($objSignupPayment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupPayment on this StewardshipFund with an unsaved SignupPayment.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_payment`
				SET
					`stewardship_fund_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupPayment->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSignupPayment->StewardshipFundId = null;
				$objSignupPayment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all SignupPayments
		 * @return void
		*/ 
		public function UnassociateAllSignupPayments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupPayment on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SignupPayment::LoadArrayByStewardshipFundId($this->intId) as $objSignupPayment) {
					$objSignupPayment->StewardshipFundId = null;
					$objSignupPayment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_payment`
				SET
					`stewardship_fund_id` = null
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated SignupPayment
		 * @param SignupPayment $objSignupPayment
		 * @return void
		*/ 
		public function DeleteAssociatedSignupPayment(SignupPayment $objSignupPayment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupPayment on this unsaved StewardshipFund.');
			if ((is_null($objSignupPayment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupPayment on this StewardshipFund with an unsaved SignupPayment.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_payment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupPayment->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSignupPayment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated SignupPayments
		 * @return void
		*/ 
		public function DeleteAllSignupPayments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupPayment on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SignupPayment::LoadArrayByStewardshipFundId($this->intId) as $objSignupPayment) {
					$objSignupPayment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_payment`
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StewardshipContributionAmount
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StewardshipContributionAmounts as an array of StewardshipContributionAmount objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContributionAmount[]
		*/ 
		public function GetStewardshipContributionAmountArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StewardshipContributionAmount::LoadArrayByStewardshipFundId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StewardshipContributionAmounts
		 * @return int
		*/ 
		public function CountStewardshipContributionAmounts() {
			if ((is_null($this->intId)))
				return 0;

			return StewardshipContributionAmount::CountByStewardshipFundId($this->intId);
		}

		/**
		 * Associates a StewardshipContributionAmount
		 * @param StewardshipContributionAmount $objStewardshipContributionAmount
		 * @return void
		*/ 
		public function AssociateStewardshipContributionAmount(StewardshipContributionAmount $objStewardshipContributionAmount) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContributionAmount on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipContributionAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContributionAmount on this StewardshipFund with an unsaved StewardshipContributionAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution_amount`
				SET
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContributionAmount->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipContributionAmount->StewardshipFundId = $this->intId;
				$objStewardshipContributionAmount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a StewardshipContributionAmount
		 * @param StewardshipContributionAmount $objStewardshipContributionAmount
		 * @return void
		*/ 
		public function UnassociateStewardshipContributionAmount(StewardshipContributionAmount $objStewardshipContributionAmount) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipContributionAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this StewardshipFund with an unsaved StewardshipContributionAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution_amount`
				SET
					`stewardship_fund_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContributionAmount->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipContributionAmount->StewardshipFundId = null;
				$objStewardshipContributionAmount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all StewardshipContributionAmounts
		 * @return void
		*/ 
		public function UnassociateAllStewardshipContributionAmounts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipContributionAmount::LoadArrayByStewardshipFundId($this->intId) as $objStewardshipContributionAmount) {
					$objStewardshipContributionAmount->StewardshipFundId = null;
					$objStewardshipContributionAmount->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution_amount`
				SET
					`stewardship_fund_id` = null
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipContributionAmount
		 * @param StewardshipContributionAmount $objStewardshipContributionAmount
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipContributionAmount(StewardshipContributionAmount $objStewardshipContributionAmount) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipContributionAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this StewardshipFund with an unsaved StewardshipContributionAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution_amount`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContributionAmount->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipContributionAmount->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated StewardshipContributionAmounts
		 * @return void
		*/ 
		public function DeleteAllStewardshipContributionAmounts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipContributionAmount::LoadArrayByStewardshipFundId($this->intId) as $objStewardshipContributionAmount) {
					$objStewardshipContributionAmount->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution_amount`
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StewardshipPledge
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StewardshipPledges as an array of StewardshipPledge objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPledge[]
		*/ 
		public function GetStewardshipPledgeArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StewardshipPledge::LoadArrayByStewardshipFundId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StewardshipPledges
		 * @return int
		*/ 
		public function CountStewardshipPledges() {
			if ((is_null($this->intId)))
				return 0;

			return StewardshipPledge::CountByStewardshipFundId($this->intId);
		}

		/**
		 * Associates a StewardshipPledge
		 * @param StewardshipPledge $objStewardshipPledge
		 * @return void
		*/ 
		public function AssociateStewardshipPledge(StewardshipPledge $objStewardshipPledge) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPledge on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipPledge->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPledge on this StewardshipFund with an unsaved StewardshipPledge.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_pledge`
				SET
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPledge->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipPledge->StewardshipFundId = $this->intId;
				$objStewardshipPledge->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a StewardshipPledge
		 * @param StewardshipPledge $objStewardshipPledge
		 * @return void
		*/ 
		public function UnassociateStewardshipPledge(StewardshipPledge $objStewardshipPledge) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipPledge->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this StewardshipFund with an unsaved StewardshipPledge.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_pledge`
				SET
					`stewardship_fund_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPledge->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipPledge->StewardshipFundId = null;
				$objStewardshipPledge->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all StewardshipPledges
		 * @return void
		*/ 
		public function UnassociateAllStewardshipPledges() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipPledge::LoadArrayByStewardshipFundId($this->intId) as $objStewardshipPledge) {
					$objStewardshipPledge->StewardshipFundId = null;
					$objStewardshipPledge->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_pledge`
				SET
					`stewardship_fund_id` = null
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipPledge
		 * @param StewardshipPledge $objStewardshipPledge
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipPledge(StewardshipPledge $objStewardshipPledge) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipPledge->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this StewardshipFund with an unsaved StewardshipPledge.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_pledge`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPledge->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipPledge->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated StewardshipPledges
		 * @return void
		*/ 
		public function DeleteAllStewardshipPledges() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipPledge::LoadArrayByStewardshipFundId($this->intId) as $objStewardshipPledge) {
					$objStewardshipPledge->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_pledge`
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StewardshipPostAmount
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StewardshipPostAmounts as an array of StewardshipPostAmount objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPostAmount[]
		*/ 
		public function GetStewardshipPostAmountArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StewardshipPostAmount::LoadArrayByStewardshipFundId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StewardshipPostAmounts
		 * @return int
		*/ 
		public function CountStewardshipPostAmounts() {
			if ((is_null($this->intId)))
				return 0;

			return StewardshipPostAmount::CountByStewardshipFundId($this->intId);
		}

		/**
		 * Associates a StewardshipPostAmount
		 * @param StewardshipPostAmount $objStewardshipPostAmount
		 * @return void
		*/ 
		public function AssociateStewardshipPostAmount(StewardshipPostAmount $objStewardshipPostAmount) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPostAmount on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipPostAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPostAmount on this StewardshipFund with an unsaved StewardshipPostAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_amount`
				SET
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostAmount->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipPostAmount->StewardshipFundId = $this->intId;
				$objStewardshipPostAmount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a StewardshipPostAmount
		 * @param StewardshipPostAmount $objStewardshipPostAmount
		 * @return void
		*/ 
		public function UnassociateStewardshipPostAmount(StewardshipPostAmount $objStewardshipPostAmount) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipPostAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this StewardshipFund with an unsaved StewardshipPostAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_amount`
				SET
					`stewardship_fund_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostAmount->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipPostAmount->StewardshipFundId = null;
				$objStewardshipPostAmount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all StewardshipPostAmounts
		 * @return void
		*/ 
		public function UnassociateAllStewardshipPostAmounts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipPostAmount::LoadArrayByStewardshipFundId($this->intId) as $objStewardshipPostAmount) {
					$objStewardshipPostAmount->StewardshipFundId = null;
					$objStewardshipPostAmount->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_amount`
				SET
					`stewardship_fund_id` = null
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipPostAmount
		 * @param StewardshipPostAmount $objStewardshipPostAmount
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipPostAmount(StewardshipPostAmount $objStewardshipPostAmount) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipPostAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this StewardshipFund with an unsaved StewardshipPostAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_amount`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostAmount->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipPostAmount->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated StewardshipPostAmounts
		 * @return void
		*/ 
		public function DeleteAllStewardshipPostAmounts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipPostAmount::LoadArrayByStewardshipFundId($this->intId) as $objStewardshipPostAmount) {
					$objStewardshipPostAmount->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_amount`
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StewardshipPostLineItem
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StewardshipPostLineItems as an array of StewardshipPostLineItem objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPostLineItem[]
		*/ 
		public function GetStewardshipPostLineItemArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StewardshipPostLineItem::LoadArrayByStewardshipFundId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StewardshipPostLineItems
		 * @return int
		*/ 
		public function CountStewardshipPostLineItems() {
			if ((is_null($this->intId)))
				return 0;

			return StewardshipPostLineItem::CountByStewardshipFundId($this->intId);
		}

		/**
		 * Associates a StewardshipPostLineItem
		 * @param StewardshipPostLineItem $objStewardshipPostLineItem
		 * @return void
		*/ 
		public function AssociateStewardshipPostLineItem(StewardshipPostLineItem $objStewardshipPostLineItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPostLineItem on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipPostLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPostLineItem on this StewardshipFund with an unsaved StewardshipPostLineItem.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_line_item`
				SET
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostLineItem->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipPostLineItem->StewardshipFundId = $this->intId;
				$objStewardshipPostLineItem->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a StewardshipPostLineItem
		 * @param StewardshipPostLineItem $objStewardshipPostLineItem
		 * @return void
		*/ 
		public function UnassociateStewardshipPostLineItem(StewardshipPostLineItem $objStewardshipPostLineItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipPostLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this StewardshipFund with an unsaved StewardshipPostLineItem.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_line_item`
				SET
					`stewardship_fund_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostLineItem->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipPostLineItem->StewardshipFundId = null;
				$objStewardshipPostLineItem->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all StewardshipPostLineItems
		 * @return void
		*/ 
		public function UnassociateAllStewardshipPostLineItems() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipPostLineItem::LoadArrayByStewardshipFundId($this->intId) as $objStewardshipPostLineItem) {
					$objStewardshipPostLineItem->StewardshipFundId = null;
					$objStewardshipPostLineItem->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_line_item`
				SET
					`stewardship_fund_id` = null
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipPostLineItem
		 * @param StewardshipPostLineItem $objStewardshipPostLineItem
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipPostLineItem(StewardshipPostLineItem $objStewardshipPostLineItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this unsaved StewardshipFund.');
			if ((is_null($objStewardshipPostLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this StewardshipFund with an unsaved StewardshipPostLineItem.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_line_item`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostLineItem->Id) . ' AND
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipPostLineItem->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated StewardshipPostLineItems
		 * @return void
		*/ 
		public function DeleteAllStewardshipPostLineItems() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this unsaved StewardshipFund.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipFund::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipPostLineItem::LoadArrayByStewardshipFundId($this->intId) as $objStewardshipPostLineItem) {
					$objStewardshipPostLineItem->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_line_item`
				WHERE
					`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="StewardshipFund"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Ministry" type="xsd1:Ministry"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="ExternalName" type="xsd:string"/>';
			$strToReturn .= '<element name="AccountNumber" type="xsd:string"/>';
			$strToReturn .= '<element name="FundNumber" type="xsd:string"/>';
			$strToReturn .= '<element name="ActiveFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ExternalFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('StewardshipFund', $strComplexTypeArray)) {
				$strComplexTypeArray['StewardshipFund'] = StewardshipFund::GetSoapComplexTypeXml();
				Ministry::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, StewardshipFund::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new StewardshipFund();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Ministry')) &&
				($objSoapObject->Ministry))
				$objToReturn->Ministry = Ministry::GetObjectFromSoapObject($objSoapObject->Ministry);
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'ExternalName'))
				$objToReturn->strExternalName = $objSoapObject->ExternalName;
			if (property_exists($objSoapObject, 'AccountNumber'))
				$objToReturn->strAccountNumber = $objSoapObject->AccountNumber;
			if (property_exists($objSoapObject, 'FundNumber'))
				$objToReturn->strFundNumber = $objSoapObject->FundNumber;
			if (property_exists($objSoapObject, 'ActiveFlag'))
				$objToReturn->blnActiveFlag = $objSoapObject->ActiveFlag;
			if (property_exists($objSoapObject, 'ExternalFlag'))
				$objToReturn->blnExternalFlag = $objSoapObject->ExternalFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, StewardshipFund::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objMinistry)
				$objObject->objMinistry = Ministry::GetSoapObjectFromObject($objObject->objMinistry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intMinistryId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $MinistryId
	 * @property-read QQNodeMinistry $Ministry
	 * @property-read QQNode $Name
	 * @property-read QQNode $ExternalName
	 * @property-read QQNode $AccountNumber
	 * @property-read QQNode $FundNumber
	 * @property-read QQNode $ActiveFlag
	 * @property-read QQNode $ExternalFlag
	 * @property-read QQReverseReferenceNodeOnlineDonationLineItem $OnlineDonationLineItem
	 * @property-read QQReverseReferenceNodeSignupForm $SignupForm
	 * @property-read QQReverseReferenceNodeSignupPayment $SignupPayment
	 * @property-read QQReverseReferenceNodeStewardshipContributionAmount $StewardshipContributionAmount
	 * @property-read QQReverseReferenceNodeStewardshipPledge $StewardshipPledge
	 * @property-read QQReverseReferenceNodeStewardshipPostAmount $StewardshipPostAmount
	 * @property-read QQReverseReferenceNodeStewardshipPostLineItem $StewardshipPostLineItem
	 */
	class QQNodeStewardshipFund extends QQNode {
		protected $strTableName = 'stewardship_fund';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipFund';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'MinistryId':
					return new QQNode('ministry_id', 'MinistryId', 'integer', $this);
				case 'Ministry':
					return new QQNodeMinistry('ministry_id', 'Ministry', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'ExternalName':
					return new QQNode('external_name', 'ExternalName', 'string', $this);
				case 'AccountNumber':
					return new QQNode('account_number', 'AccountNumber', 'string', $this);
				case 'FundNumber':
					return new QQNode('fund_number', 'FundNumber', 'string', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'ExternalFlag':
					return new QQNode('external_flag', 'ExternalFlag', 'boolean', $this);
				case 'OnlineDonationLineItem':
					return new QQReverseReferenceNodeOnlineDonationLineItem($this, 'onlinedonationlineitem', 'reverse_reference', 'stewardship_fund_id');
				case 'SignupForm':
					return new QQReverseReferenceNodeSignupForm($this, 'signupform', 'reverse_reference', 'stewardship_fund_id');
				case 'SignupPayment':
					return new QQReverseReferenceNodeSignupPayment($this, 'signuppayment', 'reverse_reference', 'stewardship_fund_id');
				case 'StewardshipContributionAmount':
					return new QQReverseReferenceNodeStewardshipContributionAmount($this, 'stewardshipcontributionamount', 'reverse_reference', 'stewardship_fund_id');
				case 'StewardshipPledge':
					return new QQReverseReferenceNodeStewardshipPledge($this, 'stewardshippledge', 'reverse_reference', 'stewardship_fund_id');
				case 'StewardshipPostAmount':
					return new QQReverseReferenceNodeStewardshipPostAmount($this, 'stewardshippostamount', 'reverse_reference', 'stewardship_fund_id');
				case 'StewardshipPostLineItem':
					return new QQReverseReferenceNodeStewardshipPostLineItem($this, 'stewardshippostlineitem', 'reverse_reference', 'stewardship_fund_id');

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
	 * @property-read QQNode $MinistryId
	 * @property-read QQNodeMinistry $Ministry
	 * @property-read QQNode $Name
	 * @property-read QQNode $ExternalName
	 * @property-read QQNode $AccountNumber
	 * @property-read QQNode $FundNumber
	 * @property-read QQNode $ActiveFlag
	 * @property-read QQNode $ExternalFlag
	 * @property-read QQReverseReferenceNodeOnlineDonationLineItem $OnlineDonationLineItem
	 * @property-read QQReverseReferenceNodeSignupForm $SignupForm
	 * @property-read QQReverseReferenceNodeSignupPayment $SignupPayment
	 * @property-read QQReverseReferenceNodeStewardshipContributionAmount $StewardshipContributionAmount
	 * @property-read QQReverseReferenceNodeStewardshipPledge $StewardshipPledge
	 * @property-read QQReverseReferenceNodeStewardshipPostAmount $StewardshipPostAmount
	 * @property-read QQReverseReferenceNodeStewardshipPostLineItem $StewardshipPostLineItem
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeStewardshipFund extends QQReverseReferenceNode {
		protected $strTableName = 'stewardship_fund';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipFund';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'MinistryId':
					return new QQNode('ministry_id', 'MinistryId', 'integer', $this);
				case 'Ministry':
					return new QQNodeMinistry('ministry_id', 'Ministry', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'ExternalName':
					return new QQNode('external_name', 'ExternalName', 'string', $this);
				case 'AccountNumber':
					return new QQNode('account_number', 'AccountNumber', 'string', $this);
				case 'FundNumber':
					return new QQNode('fund_number', 'FundNumber', 'string', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'ExternalFlag':
					return new QQNode('external_flag', 'ExternalFlag', 'boolean', $this);
				case 'OnlineDonationLineItem':
					return new QQReverseReferenceNodeOnlineDonationLineItem($this, 'onlinedonationlineitem', 'reverse_reference', 'stewardship_fund_id');
				case 'SignupForm':
					return new QQReverseReferenceNodeSignupForm($this, 'signupform', 'reverse_reference', 'stewardship_fund_id');
				case 'SignupPayment':
					return new QQReverseReferenceNodeSignupPayment($this, 'signuppayment', 'reverse_reference', 'stewardship_fund_id');
				case 'StewardshipContributionAmount':
					return new QQReverseReferenceNodeStewardshipContributionAmount($this, 'stewardshipcontributionamount', 'reverse_reference', 'stewardship_fund_id');
				case 'StewardshipPledge':
					return new QQReverseReferenceNodeStewardshipPledge($this, 'stewardshippledge', 'reverse_reference', 'stewardship_fund_id');
				case 'StewardshipPostAmount':
					return new QQReverseReferenceNodeStewardshipPostAmount($this, 'stewardshippostamount', 'reverse_reference', 'stewardship_fund_id');
				case 'StewardshipPostLineItem':
					return new QQReverseReferenceNodeStewardshipPostLineItem($this, 'stewardshippostlineitem', 'reverse_reference', 'stewardship_fund_id');

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