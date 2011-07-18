<?php
	/**
	 * The abstract StewardshipContributionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the StewardshipContribution subclass which
	 * extends this StewardshipContributionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StewardshipContribution class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property integer $StewardshipContributionTypeId the value for intStewardshipContributionTypeId (Not Null)
	 * @property integer $StewardshipBatchId the value for intStewardshipBatchId (Not Null)
	 * @property integer $StewardshipStackId the value for intStewardshipStackId 
	 * @property integer $CheckingAccountLookupId the value for intCheckingAccountLookupId 
	 * @property double $TotalAmount the value for fltTotalAmount 
	 * @property QDateTime $DateEntered the value for dttDateEntered (Not Null)
	 * @property QDateTime $DateCleared the value for dttDateCleared 
	 * @property QDateTime $DateCredited the value for dttDateCredited (Not Null)
	 * @property string $CheckNumber the value for strCheckNumber 
	 * @property string $AuthorizationNumber the value for strAuthorizationNumber 
	 * @property string $AlternateSource the value for strAlternateSource 
	 * @property boolean $NonDeductibleFlag the value for blnNonDeductibleFlag 
	 * @property string $Note the value for strNote 
	 * @property integer $CreatedByLoginId the value for intCreatedByLoginId (Not Null)
	 * @property boolean $UnpostedFlag the value for blnUnpostedFlag 
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property StewardshipBatch $StewardshipBatch the value for the StewardshipBatch object referenced by intStewardshipBatchId (Not Null)
	 * @property StewardshipStack $StewardshipStack the value for the StewardshipStack object referenced by intStewardshipStackId 
	 * @property CheckingAccountLookup $CheckingAccountLookup the value for the CheckingAccountLookup object referenced by intCheckingAccountLookupId 
	 * @property Login $CreatedByLogin the value for the Login object referenced by intCreatedByLoginId (Not Null)
	 * @property CreditCardPayment $CreditCardPayment the value for the CreditCardPayment object that uniquely references this StewardshipContribution
	 * @property StewardshipContributionAmount $_StewardshipContributionAmount the value for the private _objStewardshipContributionAmount (Read-Only) if set due to an expansion on the stewardship_contribution_amount.stewardship_contribution_id reverse relationship
	 * @property StewardshipContributionAmount[] $_StewardshipContributionAmountArray the value for the private _objStewardshipContributionAmountArray (Read-Only) if set due to an ExpandAsArray on the stewardship_contribution_amount.stewardship_contribution_id reverse relationship
	 * @property StewardshipPostLineItem $_StewardshipPostLineItem the value for the private _objStewardshipPostLineItem (Read-Only) if set due to an expansion on the stewardship_post_line_item.stewardship_contribution_id reverse relationship
	 * @property StewardshipPostLineItem[] $_StewardshipPostLineItemArray the value for the private _objStewardshipPostLineItemArray (Read-Only) if set due to an ExpandAsArray on the stewardship_post_line_item.stewardship_contribution_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class StewardshipContributionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column stewardship_contribution.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.stewardship_contribution_type_id
		 * @var integer intStewardshipContributionTypeId
		 */
		protected $intStewardshipContributionTypeId;
		const StewardshipContributionTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.stewardship_batch_id
		 * @var integer intStewardshipBatchId
		 */
		protected $intStewardshipBatchId;
		const StewardshipBatchIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.stewardship_stack_id
		 * @var integer intStewardshipStackId
		 */
		protected $intStewardshipStackId;
		const StewardshipStackIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.checking_account_lookup_id
		 * @var integer intCheckingAccountLookupId
		 */
		protected $intCheckingAccountLookupId;
		const CheckingAccountLookupIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.total_amount
		 * @var double fltTotalAmount
		 */
		protected $fltTotalAmount;
		const TotalAmountDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.date_entered
		 * @var QDateTime dttDateEntered
		 */
		protected $dttDateEntered;
		const DateEnteredDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.date_cleared
		 * @var QDateTime dttDateCleared
		 */
		protected $dttDateCleared;
		const DateClearedDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.date_credited
		 * @var QDateTime dttDateCredited
		 */
		protected $dttDateCredited;
		const DateCreditedDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.check_number
		 * @var string strCheckNumber
		 */
		protected $strCheckNumber;
		const CheckNumberMaxLength = 20;
		const CheckNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.authorization_number
		 * @var string strAuthorizationNumber
		 */
		protected $strAuthorizationNumber;
		const AuthorizationNumberMaxLength = 40;
		const AuthorizationNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.alternate_source
		 * @var string strAlternateSource
		 */
		protected $strAlternateSource;
		const AlternateSourceMaxLength = 200;
		const AlternateSourceDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.non_deductible_flag
		 * @var boolean blnNonDeductibleFlag
		 */
		protected $blnNonDeductibleFlag;
		const NonDeductibleFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.note
		 * @var string strNote
		 */
		protected $strNote;
		const NoteDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.created_by_login_id
		 * @var integer intCreatedByLoginId
		 */
		protected $intCreatedByLoginId;
		const CreatedByLoginIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.unposted_flag
		 * @var boolean blnUnpostedFlag
		 */
		protected $blnUnpostedFlag;
		const UnpostedFlagDefault = null;


		/**
		 * Private member variable that stores a reference to a single StewardshipContributionAmount object
		 * (of type StewardshipContributionAmount), if this StewardshipContribution object was restored with
		 * an expansion on the stewardship_contribution_amount association table.
		 * @var StewardshipContributionAmount _objStewardshipContributionAmount;
		 */
		private $_objStewardshipContributionAmount;

		/**
		 * Private member variable that stores a reference to an array of StewardshipContributionAmount objects
		 * (of type StewardshipContributionAmount[]), if this StewardshipContribution object was restored with
		 * an ExpandAsArray on the stewardship_contribution_amount association table.
		 * @var StewardshipContributionAmount[] _objStewardshipContributionAmountArray;
		 */
		private $_objStewardshipContributionAmountArray = array();

		/**
		 * Private member variable that stores a reference to a single StewardshipPostLineItem object
		 * (of type StewardshipPostLineItem), if this StewardshipContribution object was restored with
		 * an expansion on the stewardship_post_line_item association table.
		 * @var StewardshipPostLineItem _objStewardshipPostLineItem;
		 */
		private $_objStewardshipPostLineItem;

		/**
		 * Private member variable that stores a reference to an array of StewardshipPostLineItem objects
		 * (of type StewardshipPostLineItem[]), if this StewardshipContribution object was restored with
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
		 * in the database column stewardship_contribution.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column stewardship_contribution.stewardship_batch_id.
		 *
		 * NOTE: Always use the StewardshipBatch property getter to correctly retrieve this StewardshipBatch object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipBatch objStewardshipBatch
		 */
		protected $objStewardshipBatch;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column stewardship_contribution.stewardship_stack_id.
		 *
		 * NOTE: Always use the StewardshipStack property getter to correctly retrieve this StewardshipStack object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipStack objStewardshipStack
		 */
		protected $objStewardshipStack;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column stewardship_contribution.checking_account_lookup_id.
		 *
		 * NOTE: Always use the CheckingAccountLookup property getter to correctly retrieve this CheckingAccountLookup object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CheckingAccountLookup objCheckingAccountLookup
		 */
		protected $objCheckingAccountLookup;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column stewardship_contribution.created_by_login_id.
		 *
		 * NOTE: Always use the CreatedByLogin property getter to correctly retrieve this Login object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Login objCreatedByLogin
		 */
		protected $objCreatedByLogin;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column credit_card_payment.stewardship_contribution_id.
		 *
		 * NOTE: Always use the CreditCardPayment property getter to correctly retrieve this CreditCardPayment object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CreditCardPayment objCreditCardPayment
		 */
		protected $objCreditCardPayment;
		
		/**
		 * Used internally to manage whether the adjoined CreditCardPayment object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyCreditCardPayment;





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
		 * Load a StewardshipContribution from PK Info
		 * @param integer $intId
		 * @return StewardshipContribution
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return StewardshipContribution::QuerySingle(
				QQ::Equal(QQN::StewardshipContribution()->Id, $intId)
			);
		}

		/**
		 * Load all StewardshipContributions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadAll query
			try {
				return StewardshipContribution::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all StewardshipContributions
		 * @return int
		 */
		public static function CountAll() {
			// Call StewardshipContribution::QueryCount to perform the CountAll query
			return StewardshipContribution::QueryCount(QQ::All());
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
			$objDatabase = StewardshipContribution::GetDatabase();

			// Create/Build out the QueryBuilder object with StewardshipContribution-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'stewardship_contribution');
			StewardshipContribution::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('stewardship_contribution');

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
		 * Static Qcodo Query method to query for a single StewardshipContribution object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipContribution the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipContribution::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new StewardshipContribution object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = StewardshipContribution::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return StewardshipContribution::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of StewardshipContribution objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipContribution[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipContribution::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return StewardshipContribution::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = StewardshipContribution::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of StewardshipContribution objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipContribution::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = StewardshipContribution::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'stewardship_contribution_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with StewardshipContribution-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				StewardshipContribution::GetSelectFields($objQueryBuilder);
				StewardshipContribution::GetFromFields($objQueryBuilder);

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
			return StewardshipContribution::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this StewardshipContribution
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'stewardship_contribution';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_contribution_type_id', $strAliasPrefix . 'stewardship_contribution_type_id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_batch_id', $strAliasPrefix . 'stewardship_batch_id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_stack_id', $strAliasPrefix . 'stewardship_stack_id');
			$objBuilder->AddSelectItem($strTableName, 'checking_account_lookup_id', $strAliasPrefix . 'checking_account_lookup_id');
			$objBuilder->AddSelectItem($strTableName, 'total_amount', $strAliasPrefix . 'total_amount');
			$objBuilder->AddSelectItem($strTableName, 'date_entered', $strAliasPrefix . 'date_entered');
			$objBuilder->AddSelectItem($strTableName, 'date_cleared', $strAliasPrefix . 'date_cleared');
			$objBuilder->AddSelectItem($strTableName, 'date_credited', $strAliasPrefix . 'date_credited');
			$objBuilder->AddSelectItem($strTableName, 'check_number', $strAliasPrefix . 'check_number');
			$objBuilder->AddSelectItem($strTableName, 'authorization_number', $strAliasPrefix . 'authorization_number');
			$objBuilder->AddSelectItem($strTableName, 'alternate_source', $strAliasPrefix . 'alternate_source');
			$objBuilder->AddSelectItem($strTableName, 'non_deductible_flag', $strAliasPrefix . 'non_deductible_flag');
			$objBuilder->AddSelectItem($strTableName, 'note', $strAliasPrefix . 'note');
			$objBuilder->AddSelectItem($strTableName, 'created_by_login_id', $strAliasPrefix . 'created_by_login_id');
			$objBuilder->AddSelectItem($strTableName, 'unposted_flag', $strAliasPrefix . 'unposted_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a StewardshipContribution from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this StewardshipContribution::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipContribution
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
					$strAliasPrefix = 'stewardship_contribution__';


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
				else if ($strAliasPrefix == 'stewardship_contribution__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the StewardshipContribution object
			$objToReturn = new StewardshipContribution();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_contribution_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_contribution_type_id'] : $strAliasPrefix . 'stewardship_contribution_type_id';
			$objToReturn->intStewardshipContributionTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_batch_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_batch_id'] : $strAliasPrefix . 'stewardship_batch_id';
			$objToReturn->intStewardshipBatchId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_stack_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_stack_id'] : $strAliasPrefix . 'stewardship_stack_id';
			$objToReturn->intStewardshipStackId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'checking_account_lookup_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'checking_account_lookup_id'] : $strAliasPrefix . 'checking_account_lookup_id';
			$objToReturn->intCheckingAccountLookupId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'total_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'total_amount'] : $strAliasPrefix . 'total_amount';
			$objToReturn->fltTotalAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_entered', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_entered'] : $strAliasPrefix . 'date_entered';
			$objToReturn->dttDateEntered = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_cleared', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_cleared'] : $strAliasPrefix . 'date_cleared';
			$objToReturn->dttDateCleared = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_credited', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_credited'] : $strAliasPrefix . 'date_credited';
			$objToReturn->dttDateCredited = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'check_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'check_number'] : $strAliasPrefix . 'check_number';
			$objToReturn->strCheckNumber = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'authorization_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'authorization_number'] : $strAliasPrefix . 'authorization_number';
			$objToReturn->strAuthorizationNumber = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'alternate_source', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'alternate_source'] : $strAliasPrefix . 'alternate_source';
			$objToReturn->strAlternateSource = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'non_deductible_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'non_deductible_flag'] : $strAliasPrefix . 'non_deductible_flag';
			$objToReturn->blnNonDeductibleFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'note', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'note'] : $strAliasPrefix . 'note';
			$objToReturn->strNote = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'created_by_login_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'created_by_login_id'] : $strAliasPrefix . 'created_by_login_id';
			$objToReturn->intCreatedByLoginId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'unposted_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'unposted_flag'] : $strAliasPrefix . 'unposted_flag';
			$objToReturn->blnUnpostedFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'stewardship_contribution__';

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StewardshipBatch Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_batch_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipBatch = StewardshipBatch::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_batch_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StewardshipStack Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_stack_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipStack = StewardshipStack::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_stack_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CheckingAccountLookup Early Binding
			$strAlias = $strAliasPrefix . 'checking_account_lookup_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCheckingAccountLookup = CheckingAccountLookup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'checking_account_lookup_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CreatedByLogin Early Binding
			$strAlias = $strAliasPrefix . 'created_by_login_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCreatedByLogin = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'created_by_login_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for CreditCardPayment Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'creditcardpayment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objCreditCardPayment = CreditCardPayment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'creditcardpayment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objCreditCardPayment = false;
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
		 * Instantiate an array of StewardshipContributions from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipContribution[]
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
					$objItem = StewardshipContribution::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = StewardshipContribution::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single StewardshipContribution object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return StewardshipContribution next row resulting from the query
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
			return StewardshipContribution::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single StewardshipContribution object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return StewardshipContribution
		*/
		public static function LoadById($intId) {
			return StewardshipContribution::QuerySingle(
				QQ::Equal(QQN::StewardshipContribution()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of StewardshipContribution objects,
		 * by PersonId, StewardshipContributionTypeId Index(es)
		 * @param integer $intPersonId
		 * @param integer $intStewardshipContributionTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/
		public static function LoadArrayByPersonIdStewardshipContributionTypeId($intPersonId, $intStewardshipContributionTypeId, $objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadArrayByPersonIdStewardshipContributionTypeId query
			try {
				return StewardshipContribution::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::StewardshipContribution()->PersonId, $intPersonId),
					QQ::Equal(QQN::StewardshipContribution()->StewardshipContributionTypeId, $intStewardshipContributionTypeId)
					),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipContributions
		 * by PersonId, StewardshipContributionTypeId Index(es)
		 * @param integer $intPersonId
		 * @param integer $intStewardshipContributionTypeId
		 * @return int
		*/
		public static function CountByPersonIdStewardshipContributionTypeId($intPersonId, $intStewardshipContributionTypeId) {
			// Call StewardshipContribution::QueryCount to perform the CountByPersonIdStewardshipContributionTypeId query
			return StewardshipContribution::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::StewardshipContribution()->PersonId, $intPersonId),
				QQ::Equal(QQN::StewardshipContribution()->StewardshipContributionTypeId, $intStewardshipContributionTypeId)
				)
			);
		}
			
		/**
		 * Load an array of StewardshipContribution objects,
		 * by StewardshipBatchId, UnpostedFlag Index(es)
		 * @param integer $intStewardshipBatchId
		 * @param boolean $blnUnpostedFlag
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/
		public static function LoadArrayByStewardshipBatchIdUnpostedFlag($intStewardshipBatchId, $blnUnpostedFlag, $objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadArrayByStewardshipBatchIdUnpostedFlag query
			try {
				return StewardshipContribution::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::StewardshipContribution()->StewardshipBatchId, $intStewardshipBatchId),
					QQ::Equal(QQN::StewardshipContribution()->UnpostedFlag, $blnUnpostedFlag)
					),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipContributions
		 * by StewardshipBatchId, UnpostedFlag Index(es)
		 * @param integer $intStewardshipBatchId
		 * @param boolean $blnUnpostedFlag
		 * @return int
		*/
		public static function CountByStewardshipBatchIdUnpostedFlag($intStewardshipBatchId, $blnUnpostedFlag) {
			// Call StewardshipContribution::QueryCount to perform the CountByStewardshipBatchIdUnpostedFlag query
			return StewardshipContribution::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::StewardshipContribution()->StewardshipBatchId, $intStewardshipBatchId),
				QQ::Equal(QQN::StewardshipContribution()->UnpostedFlag, $blnUnpostedFlag)
				)
			);
		}
			
		/**
		 * Load an array of StewardshipContribution objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadArrayByPersonId query
			try {
				return StewardshipContribution::QueryArray(
					QQ::Equal(QQN::StewardshipContribution()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipContributions
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call StewardshipContribution::QueryCount to perform the CountByPersonId query
			return StewardshipContribution::QueryCount(
				QQ::Equal(QQN::StewardshipContribution()->PersonId, $intPersonId)
			);
		}
			
		/**
		 * Load an array of StewardshipContribution objects,
		 * by StewardshipContributionTypeId Index(es)
		 * @param integer $intStewardshipContributionTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/
		public static function LoadArrayByStewardshipContributionTypeId($intStewardshipContributionTypeId, $objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadArrayByStewardshipContributionTypeId query
			try {
				return StewardshipContribution::QueryArray(
					QQ::Equal(QQN::StewardshipContribution()->StewardshipContributionTypeId, $intStewardshipContributionTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipContributions
		 * by StewardshipContributionTypeId Index(es)
		 * @param integer $intStewardshipContributionTypeId
		 * @return int
		*/
		public static function CountByStewardshipContributionTypeId($intStewardshipContributionTypeId) {
			// Call StewardshipContribution::QueryCount to perform the CountByStewardshipContributionTypeId query
			return StewardshipContribution::QueryCount(
				QQ::Equal(QQN::StewardshipContribution()->StewardshipContributionTypeId, $intStewardshipContributionTypeId)
			);
		}
			
		/**
		 * Load an array of StewardshipContribution objects,
		 * by StewardshipBatchId Index(es)
		 * @param integer $intStewardshipBatchId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/
		public static function LoadArrayByStewardshipBatchId($intStewardshipBatchId, $objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadArrayByStewardshipBatchId query
			try {
				return StewardshipContribution::QueryArray(
					QQ::Equal(QQN::StewardshipContribution()->StewardshipBatchId, $intStewardshipBatchId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipContributions
		 * by StewardshipBatchId Index(es)
		 * @param integer $intStewardshipBatchId
		 * @return int
		*/
		public static function CountByStewardshipBatchId($intStewardshipBatchId) {
			// Call StewardshipContribution::QueryCount to perform the CountByStewardshipBatchId query
			return StewardshipContribution::QueryCount(
				QQ::Equal(QQN::StewardshipContribution()->StewardshipBatchId, $intStewardshipBatchId)
			);
		}
			
		/**
		 * Load an array of StewardshipContribution objects,
		 * by StewardshipStackId Index(es)
		 * @param integer $intStewardshipStackId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/
		public static function LoadArrayByStewardshipStackId($intStewardshipStackId, $objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadArrayByStewardshipStackId query
			try {
				return StewardshipContribution::QueryArray(
					QQ::Equal(QQN::StewardshipContribution()->StewardshipStackId, $intStewardshipStackId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipContributions
		 * by StewardshipStackId Index(es)
		 * @param integer $intStewardshipStackId
		 * @return int
		*/
		public static function CountByStewardshipStackId($intStewardshipStackId) {
			// Call StewardshipContribution::QueryCount to perform the CountByStewardshipStackId query
			return StewardshipContribution::QueryCount(
				QQ::Equal(QQN::StewardshipContribution()->StewardshipStackId, $intStewardshipStackId)
			);
		}
			
		/**
		 * Load an array of StewardshipContribution objects,
		 * by CheckingAccountLookupId Index(es)
		 * @param integer $intCheckingAccountLookupId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/
		public static function LoadArrayByCheckingAccountLookupId($intCheckingAccountLookupId, $objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadArrayByCheckingAccountLookupId query
			try {
				return StewardshipContribution::QueryArray(
					QQ::Equal(QQN::StewardshipContribution()->CheckingAccountLookupId, $intCheckingAccountLookupId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipContributions
		 * by CheckingAccountLookupId Index(es)
		 * @param integer $intCheckingAccountLookupId
		 * @return int
		*/
		public static function CountByCheckingAccountLookupId($intCheckingAccountLookupId) {
			// Call StewardshipContribution::QueryCount to perform the CountByCheckingAccountLookupId query
			return StewardshipContribution::QueryCount(
				QQ::Equal(QQN::StewardshipContribution()->CheckingAccountLookupId, $intCheckingAccountLookupId)
			);
		}
			
		/**
		 * Load an array of StewardshipContribution objects,
		 * by CreatedByLoginId Index(es)
		 * @param integer $intCreatedByLoginId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/
		public static function LoadArrayByCreatedByLoginId($intCreatedByLoginId, $objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadArrayByCreatedByLoginId query
			try {
				return StewardshipContribution::QueryArray(
					QQ::Equal(QQN::StewardshipContribution()->CreatedByLoginId, $intCreatedByLoginId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipContributions
		 * by CreatedByLoginId Index(es)
		 * @param integer $intCreatedByLoginId
		 * @return int
		*/
		public static function CountByCreatedByLoginId($intCreatedByLoginId) {
			// Call StewardshipContribution::QueryCount to perform the CountByCreatedByLoginId query
			return StewardshipContribution::QueryCount(
				QQ::Equal(QQN::StewardshipContribution()->CreatedByLoginId, $intCreatedByLoginId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this StewardshipContribution
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `stewardship_contribution` (
							`person_id`,
							`stewardship_contribution_type_id`,
							`stewardship_batch_id`,
							`stewardship_stack_id`,
							`checking_account_lookup_id`,
							`total_amount`,
							`date_entered`,
							`date_cleared`,
							`date_credited`,
							`check_number`,
							`authorization_number`,
							`alternate_source`,
							`non_deductible_flag`,
							`note`,
							`created_by_login_id`,
							`unposted_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipContributionTypeId) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipStackId) . ',
							' . $objDatabase->SqlVariable($this->intCheckingAccountLookupId) . ',
							' . $objDatabase->SqlVariable($this->fltTotalAmount) . ',
							' . $objDatabase->SqlVariable($this->dttDateEntered) . ',
							' . $objDatabase->SqlVariable($this->dttDateCleared) . ',
							' . $objDatabase->SqlVariable($this->dttDateCredited) . ',
							' . $objDatabase->SqlVariable($this->strCheckNumber) . ',
							' . $objDatabase->SqlVariable($this->strAuthorizationNumber) . ',
							' . $objDatabase->SqlVariable($this->strAlternateSource) . ',
							' . $objDatabase->SqlVariable($this->blnNonDeductibleFlag) . ',
							' . $objDatabase->SqlVariable($this->strNote) . ',
							' . $objDatabase->SqlVariable($this->intCreatedByLoginId) . ',
							' . $objDatabase->SqlVariable($this->blnUnpostedFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('stewardship_contribution', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`stewardship_contribution`
						SET
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`stewardship_contribution_type_id` = ' . $objDatabase->SqlVariable($this->intStewardshipContributionTypeId) . ',
							`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . ',
							`stewardship_stack_id` = ' . $objDatabase->SqlVariable($this->intStewardshipStackId) . ',
							`checking_account_lookup_id` = ' . $objDatabase->SqlVariable($this->intCheckingAccountLookupId) . ',
							`total_amount` = ' . $objDatabase->SqlVariable($this->fltTotalAmount) . ',
							`date_entered` = ' . $objDatabase->SqlVariable($this->dttDateEntered) . ',
							`date_cleared` = ' . $objDatabase->SqlVariable($this->dttDateCleared) . ',
							`date_credited` = ' . $objDatabase->SqlVariable($this->dttDateCredited) . ',
							`check_number` = ' . $objDatabase->SqlVariable($this->strCheckNumber) . ',
							`authorization_number` = ' . $objDatabase->SqlVariable($this->strAuthorizationNumber) . ',
							`alternate_source` = ' . $objDatabase->SqlVariable($this->strAlternateSource) . ',
							`non_deductible_flag` = ' . $objDatabase->SqlVariable($this->blnNonDeductibleFlag) . ',
							`note` = ' . $objDatabase->SqlVariable($this->strNote) . ',
							`created_by_login_id` = ' . $objDatabase->SqlVariable($this->intCreatedByLoginId) . ',
							`unposted_flag` = ' . $objDatabase->SqlVariable($this->blnUnpostedFlag) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined CreditCardPayment object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyCreditCardPayment) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = CreditCardPayment::LoadByStewardshipContributionId($this->intId)) {
						$objAssociated->StewardshipContributionId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objCreditCardPayment) {
						$this->objCreditCardPayment->StewardshipContributionId = $this->intId;
						$this->objCreditCardPayment->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyCreditCardPayment = false;
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
		 * Delete this StewardshipContribution
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this StewardshipContribution with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			
			
			// Update the adjoined CreditCardPayment object (if applicable) and perform the unassociation

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = CreditCardPayment::LoadByStewardshipContributionId($this->intId)) {
				$objAssociated->StewardshipContributionId = null;
				$objAssociated->Save();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all StewardshipContributions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution`');
		}

		/**
		 * Truncate stewardship_contribution table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `stewardship_contribution`');
		}

		/**
		 * Reload this StewardshipContribution from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved StewardshipContribution object.');

			// Reload the Object
			$objReloaded = StewardshipContribution::Load($this->intId);

			// Update $this's local variables to match
			$this->PersonId = $objReloaded->PersonId;
			$this->StewardshipContributionTypeId = $objReloaded->StewardshipContributionTypeId;
			$this->StewardshipBatchId = $objReloaded->StewardshipBatchId;
			$this->StewardshipStackId = $objReloaded->StewardshipStackId;
			$this->CheckingAccountLookupId = $objReloaded->CheckingAccountLookupId;
			$this->fltTotalAmount = $objReloaded->fltTotalAmount;
			$this->dttDateEntered = $objReloaded->dttDateEntered;
			$this->dttDateCleared = $objReloaded->dttDateCleared;
			$this->dttDateCredited = $objReloaded->dttDateCredited;
			$this->strCheckNumber = $objReloaded->strCheckNumber;
			$this->strAuthorizationNumber = $objReloaded->strAuthorizationNumber;
			$this->strAlternateSource = $objReloaded->strAlternateSource;
			$this->blnNonDeductibleFlag = $objReloaded->blnNonDeductibleFlag;
			$this->strNote = $objReloaded->strNote;
			$this->CreatedByLoginId = $objReloaded->CreatedByLoginId;
			$this->blnUnpostedFlag = $objReloaded->blnUnpostedFlag;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = StewardshipContribution::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `stewardship_contribution` (
					`id`,
					`person_id`,
					`stewardship_contribution_type_id`,
					`stewardship_batch_id`,
					`stewardship_stack_id`,
					`checking_account_lookup_id`,
					`total_amount`,
					`date_entered`,
					`date_cleared`,
					`date_credited`,
					`check_number`,
					`authorization_number`,
					`alternate_source`,
					`non_deductible_flag`,
					`note`,
					`created_by_login_id`,
					`unposted_flag`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->intStewardshipContributionTypeId) . ',
					' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . ',
					' . $objDatabase->SqlVariable($this->intStewardshipStackId) . ',
					' . $objDatabase->SqlVariable($this->intCheckingAccountLookupId) . ',
					' . $objDatabase->SqlVariable($this->fltTotalAmount) . ',
					' . $objDatabase->SqlVariable($this->dttDateEntered) . ',
					' . $objDatabase->SqlVariable($this->dttDateCleared) . ',
					' . $objDatabase->SqlVariable($this->dttDateCredited) . ',
					' . $objDatabase->SqlVariable($this->strCheckNumber) . ',
					' . $objDatabase->SqlVariable($this->strAuthorizationNumber) . ',
					' . $objDatabase->SqlVariable($this->strAlternateSource) . ',
					' . $objDatabase->SqlVariable($this->blnNonDeductibleFlag) . ',
					' . $objDatabase->SqlVariable($this->strNote) . ',
					' . $objDatabase->SqlVariable($this->intCreatedByLoginId) . ',
					' . $objDatabase->SqlVariable($this->blnUnpostedFlag) . ',
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
		 * @return StewardshipContribution[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = StewardshipContribution::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM stewardship_contribution WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return StewardshipContribution::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return StewardshipContribution[]
		 */
		public function GetJournal() {
			return StewardshipContribution::GetJournalForId($this->intId);
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

				case 'StewardshipContributionTypeId':
					// Gets the value for intStewardshipContributionTypeId (Not Null)
					// @return integer
					return $this->intStewardshipContributionTypeId;

				case 'StewardshipBatchId':
					// Gets the value for intStewardshipBatchId (Not Null)
					// @return integer
					return $this->intStewardshipBatchId;

				case 'StewardshipStackId':
					// Gets the value for intStewardshipStackId 
					// @return integer
					return $this->intStewardshipStackId;

				case 'CheckingAccountLookupId':
					// Gets the value for intCheckingAccountLookupId 
					// @return integer
					return $this->intCheckingAccountLookupId;

				case 'TotalAmount':
					// Gets the value for fltTotalAmount 
					// @return double
					return $this->fltTotalAmount;

				case 'DateEntered':
					// Gets the value for dttDateEntered (Not Null)
					// @return QDateTime
					return $this->dttDateEntered;

				case 'DateCleared':
					// Gets the value for dttDateCleared 
					// @return QDateTime
					return $this->dttDateCleared;

				case 'DateCredited':
					// Gets the value for dttDateCredited (Not Null)
					// @return QDateTime
					return $this->dttDateCredited;

				case 'CheckNumber':
					// Gets the value for strCheckNumber 
					// @return string
					return $this->strCheckNumber;

				case 'AuthorizationNumber':
					// Gets the value for strAuthorizationNumber 
					// @return string
					return $this->strAuthorizationNumber;

				case 'AlternateSource':
					// Gets the value for strAlternateSource 
					// @return string
					return $this->strAlternateSource;

				case 'NonDeductibleFlag':
					// Gets the value for blnNonDeductibleFlag 
					// @return boolean
					return $this->blnNonDeductibleFlag;

				case 'Note':
					// Gets the value for strNote 
					// @return string
					return $this->strNote;

				case 'CreatedByLoginId':
					// Gets the value for intCreatedByLoginId (Not Null)
					// @return integer
					return $this->intCreatedByLoginId;

				case 'UnpostedFlag':
					// Gets the value for blnUnpostedFlag 
					// @return boolean
					return $this->blnUnpostedFlag;


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

				case 'StewardshipBatch':
					// Gets the value for the StewardshipBatch object referenced by intStewardshipBatchId (Not Null)
					// @return StewardshipBatch
					try {
						if ((!$this->objStewardshipBatch) && (!is_null($this->intStewardshipBatchId)))
							$this->objStewardshipBatch = StewardshipBatch::Load($this->intStewardshipBatchId);
						return $this->objStewardshipBatch;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipStack':
					// Gets the value for the StewardshipStack object referenced by intStewardshipStackId 
					// @return StewardshipStack
					try {
						if ((!$this->objStewardshipStack) && (!is_null($this->intStewardshipStackId)))
							$this->objStewardshipStack = StewardshipStack::Load($this->intStewardshipStackId);
						return $this->objStewardshipStack;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CheckingAccountLookup':
					// Gets the value for the CheckingAccountLookup object referenced by intCheckingAccountLookupId 
					// @return CheckingAccountLookup
					try {
						if ((!$this->objCheckingAccountLookup) && (!is_null($this->intCheckingAccountLookupId)))
							$this->objCheckingAccountLookup = CheckingAccountLookup::Load($this->intCheckingAccountLookupId);
						return $this->objCheckingAccountLookup;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedByLogin':
					// Gets the value for the Login object referenced by intCreatedByLoginId (Not Null)
					// @return Login
					try {
						if ((!$this->objCreatedByLogin) && (!is_null($this->intCreatedByLoginId)))
							$this->objCreatedByLogin = Login::Load($this->intCreatedByLoginId);
						return $this->objCreatedByLogin;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'CreditCardPayment':
					// Gets the value for the CreditCardPayment object that uniquely references this StewardshipContribution
					// by objCreditCardPayment (Unique)
					// @return CreditCardPayment
					try {
						if ($this->objCreditCardPayment === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objCreditCardPayment)
							$this->objCreditCardPayment = CreditCardPayment::LoadByStewardshipContributionId($this->intId);
						return $this->objCreditCardPayment;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_StewardshipContributionAmount':
					// Gets the value for the private _objStewardshipContributionAmount (Read-Only)
					// if set due to an expansion on the stewardship_contribution_amount.stewardship_contribution_id reverse relationship
					// @return StewardshipContributionAmount
					return $this->_objStewardshipContributionAmount;

				case '_StewardshipContributionAmountArray':
					// Gets the value for the private _objStewardshipContributionAmountArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_contribution_amount.stewardship_contribution_id reverse relationship
					// @return StewardshipContributionAmount[]
					return (array) $this->_objStewardshipContributionAmountArray;

				case '_StewardshipPostLineItem':
					// Gets the value for the private _objStewardshipPostLineItem (Read-Only)
					// if set due to an expansion on the stewardship_post_line_item.stewardship_contribution_id reverse relationship
					// @return StewardshipPostLineItem
					return $this->_objStewardshipPostLineItem;

				case '_StewardshipPostLineItemArray':
					// Gets the value for the private _objStewardshipPostLineItemArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_post_line_item.stewardship_contribution_id reverse relationship
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

				case 'StewardshipContributionTypeId':
					// Sets the value for intStewardshipContributionTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intStewardshipContributionTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipBatchId':
					// Sets the value for intStewardshipBatchId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipBatch = null;
						return ($this->intStewardshipBatchId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipStackId':
					// Sets the value for intStewardshipStackId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipStack = null;
						return ($this->intStewardshipStackId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CheckingAccountLookupId':
					// Sets the value for intCheckingAccountLookupId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCheckingAccountLookup = null;
						return ($this->intCheckingAccountLookupId = QType::Cast($mixValue, QType::Integer));
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

				case 'DateEntered':
					// Sets the value for dttDateEntered (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateEntered = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateCleared':
					// Sets the value for dttDateCleared 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateCleared = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateCredited':
					// Sets the value for dttDateCredited (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateCredited = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CheckNumber':
					// Sets the value for strCheckNumber 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCheckNumber = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AuthorizationNumber':
					// Sets the value for strAuthorizationNumber 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAuthorizationNumber = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AlternateSource':
					// Sets the value for strAlternateSource 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAlternateSource = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NonDeductibleFlag':
					// Sets the value for blnNonDeductibleFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnNonDeductibleFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Note':
					// Sets the value for strNote 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strNote = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedByLoginId':
					// Sets the value for intCreatedByLoginId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCreatedByLogin = null;
						return ($this->intCreatedByLoginId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UnpostedFlag':
					// Sets the value for blnUnpostedFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnUnpostedFlag = QType::Cast($mixValue, QType::Boolean));
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
							throw new QCallerException('Unable to set an unsaved Person for this StewardshipContribution');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'StewardshipBatch':
					// Sets the value for the StewardshipBatch object referenced by intStewardshipBatchId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved StewardshipBatch for this StewardshipContribution');

						// Update Local Member Variables
						$this->objStewardshipBatch = $mixValue;
						$this->intStewardshipBatchId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'StewardshipStack':
					// Sets the value for the StewardshipStack object referenced by intStewardshipStackId 
					// @param StewardshipStack $mixValue
					// @return StewardshipStack
					if (is_null($mixValue)) {
						$this->intStewardshipStackId = null;
						$this->objStewardshipStack = null;
						return null;
					} else {
						// Make sure $mixValue actually is a StewardshipStack object
						try {
							$mixValue = QType::Cast($mixValue, 'StewardshipStack');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED StewardshipStack object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved StewardshipStack for this StewardshipContribution');

						// Update Local Member Variables
						$this->objStewardshipStack = $mixValue;
						$this->intStewardshipStackId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CheckingAccountLookup':
					// Sets the value for the CheckingAccountLookup object referenced by intCheckingAccountLookupId 
					// @param CheckingAccountLookup $mixValue
					// @return CheckingAccountLookup
					if (is_null($mixValue)) {
						$this->intCheckingAccountLookupId = null;
						$this->objCheckingAccountLookup = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CheckingAccountLookup object
						try {
							$mixValue = QType::Cast($mixValue, 'CheckingAccountLookup');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED CheckingAccountLookup object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved CheckingAccountLookup for this StewardshipContribution');

						// Update Local Member Variables
						$this->objCheckingAccountLookup = $mixValue;
						$this->intCheckingAccountLookupId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreatedByLogin':
					// Sets the value for the Login object referenced by intCreatedByLoginId (Not Null)
					// @param Login $mixValue
					// @return Login
					if (is_null($mixValue)) {
						$this->intCreatedByLoginId = null;
						$this->objCreatedByLogin = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Login object
						try {
							$mixValue = QType::Cast($mixValue, 'Login');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Login object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved CreatedByLogin for this StewardshipContribution');

						// Update Local Member Variables
						$this->objCreatedByLogin = $mixValue;
						$this->intCreatedByLoginId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreditCardPayment':
					// Sets the value for the CreditCardPayment object referenced by objCreditCardPayment (Unique)
					// @param CreditCardPayment $mixValue
					// @return CreditCardPayment
					if (is_null($mixValue)) {
						$this->objCreditCardPayment = null;

						// Make sure we update the adjoined CreditCardPayment object the next time we call Save()
						$this->blnDirtyCreditCardPayment = true;

						return null;
					} else {
						// Make sure $mixValue actually is a CreditCardPayment object
						try {
							$mixValue = QType::Cast($mixValue, 'CreditCardPayment');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objCreditCardPayment to a DIFFERENT $mixValue?
						if ((!$this->CreditCardPayment) || ($this->CreditCardPayment->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined CreditCardPayment object the next time we call Save()
							$this->blnDirtyCreditCardPayment = true;

							// Update Local Member Variable
							$this->objCreditCardPayment = $mixValue;
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
				return StewardshipContributionAmount::LoadArrayByStewardshipContributionId($this->intId, $objOptionalClauses);
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

			return StewardshipContributionAmount::CountByStewardshipContributionId($this->intId);
		}

		/**
		 * Associates a StewardshipContributionAmount
		 * @param StewardshipContributionAmount $objStewardshipContributionAmount
		 * @return void
		*/ 
		public function AssociateStewardshipContributionAmount(StewardshipContributionAmount $objStewardshipContributionAmount) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContributionAmount on this unsaved StewardshipContribution.');
			if ((is_null($objStewardshipContributionAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContributionAmount on this StewardshipContribution with an unsaved StewardshipContributionAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution_amount`
				SET
					`stewardship_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContributionAmount->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipContributionAmount->StewardshipContributionId = $this->intId;
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this unsaved StewardshipContribution.');
			if ((is_null($objStewardshipContributionAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this StewardshipContribution with an unsaved StewardshipContributionAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution_amount`
				SET
					`stewardship_contribution_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContributionAmount->Id) . ' AND
					`stewardship_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipContributionAmount->StewardshipContributionId = null;
				$objStewardshipContributionAmount->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all StewardshipContributionAmounts
		 * @return void
		*/ 
		public function UnassociateAllStewardshipContributionAmounts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipContributionAmount::LoadArrayByStewardshipContributionId($this->intId) as $objStewardshipContributionAmount) {
					$objStewardshipContributionAmount->StewardshipContributionId = null;
					$objStewardshipContributionAmount->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution_amount`
				SET
					`stewardship_contribution_id` = null
				WHERE
					`stewardship_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipContributionAmount
		 * @param StewardshipContributionAmount $objStewardshipContributionAmount
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipContributionAmount(StewardshipContributionAmount $objStewardshipContributionAmount) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this unsaved StewardshipContribution.');
			if ((is_null($objStewardshipContributionAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this StewardshipContribution with an unsaved StewardshipContributionAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution_amount`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContributionAmount->Id) . ' AND
					`stewardship_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContributionAmount on this unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipContributionAmount::LoadArrayByStewardshipContributionId($this->intId) as $objStewardshipContributionAmount) {
					$objStewardshipContributionAmount->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution_amount`
				WHERE
					`stewardship_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				return StewardshipPostLineItem::LoadArrayByStewardshipContributionId($this->intId, $objOptionalClauses);
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

			return StewardshipPostLineItem::CountByStewardshipContributionId($this->intId);
		}

		/**
		 * Associates a StewardshipPostLineItem
		 * @param StewardshipPostLineItem $objStewardshipPostLineItem
		 * @return void
		*/ 
		public function AssociateStewardshipPostLineItem(StewardshipPostLineItem $objStewardshipPostLineItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPostLineItem on this unsaved StewardshipContribution.');
			if ((is_null($objStewardshipPostLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPostLineItem on this StewardshipContribution with an unsaved StewardshipPostLineItem.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_line_item`
				SET
					`stewardship_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostLineItem->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipPostLineItem->StewardshipContributionId = $this->intId;
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this unsaved StewardshipContribution.');
			if ((is_null($objStewardshipPostLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this StewardshipContribution with an unsaved StewardshipPostLineItem.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_line_item`
				SET
					`stewardship_contribution_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostLineItem->Id) . ' AND
					`stewardship_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStewardshipPostLineItem->StewardshipContributionId = null;
				$objStewardshipPostLineItem->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all StewardshipPostLineItems
		 * @return void
		*/ 
		public function UnassociateAllStewardshipPostLineItems() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipPostLineItem::LoadArrayByStewardshipContributionId($this->intId) as $objStewardshipPostLineItem) {
					$objStewardshipPostLineItem->StewardshipContributionId = null;
					$objStewardshipPostLineItem->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_line_item`
				SET
					`stewardship_contribution_id` = null
				WHERE
					`stewardship_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipPostLineItem
		 * @param StewardshipPostLineItem $objStewardshipPostLineItem
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipPostLineItem(StewardshipPostLineItem $objStewardshipPostLineItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this unsaved StewardshipContribution.');
			if ((is_null($objStewardshipPostLineItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this StewardshipContribution with an unsaved StewardshipPostLineItem.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_line_item`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostLineItem->Id) . ' AND
					`stewardship_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostLineItem on this unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipContribution::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StewardshipPostLineItem::LoadArrayByStewardshipContributionId($this->intId) as $objStewardshipPostLineItem) {
					$objStewardshipPostLineItem->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_line_item`
				WHERE
					`stewardship_contribution_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="StewardshipContribution"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="StewardshipContributionTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="StewardshipBatch" type="xsd1:StewardshipBatch"/>';
			$strToReturn .= '<element name="StewardshipStack" type="xsd1:StewardshipStack"/>';
			$strToReturn .= '<element name="CheckingAccountLookup" type="xsd1:CheckingAccountLookup"/>';
			$strToReturn .= '<element name="TotalAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="DateEntered" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateCleared" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateCredited" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CheckNumber" type="xsd:string"/>';
			$strToReturn .= '<element name="AuthorizationNumber" type="xsd:string"/>';
			$strToReturn .= '<element name="AlternateSource" type="xsd:string"/>';
			$strToReturn .= '<element name="NonDeductibleFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Note" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedByLogin" type="xsd1:Login"/>';
			$strToReturn .= '<element name="UnpostedFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('StewardshipContribution', $strComplexTypeArray)) {
				$strComplexTypeArray['StewardshipContribution'] = StewardshipContribution::GetSoapComplexTypeXml();
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				StewardshipBatch::AlterSoapComplexTypeArray($strComplexTypeArray);
				StewardshipStack::AlterSoapComplexTypeArray($strComplexTypeArray);
				CheckingAccountLookup::AlterSoapComplexTypeArray($strComplexTypeArray);
				Login::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, StewardshipContribution::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new StewardshipContribution();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if (property_exists($objSoapObject, 'StewardshipContributionTypeId'))
				$objToReturn->intStewardshipContributionTypeId = $objSoapObject->StewardshipContributionTypeId;
			if ((property_exists($objSoapObject, 'StewardshipBatch')) &&
				($objSoapObject->StewardshipBatch))
				$objToReturn->StewardshipBatch = StewardshipBatch::GetObjectFromSoapObject($objSoapObject->StewardshipBatch);
			if ((property_exists($objSoapObject, 'StewardshipStack')) &&
				($objSoapObject->StewardshipStack))
				$objToReturn->StewardshipStack = StewardshipStack::GetObjectFromSoapObject($objSoapObject->StewardshipStack);
			if ((property_exists($objSoapObject, 'CheckingAccountLookup')) &&
				($objSoapObject->CheckingAccountLookup))
				$objToReturn->CheckingAccountLookup = CheckingAccountLookup::GetObjectFromSoapObject($objSoapObject->CheckingAccountLookup);
			if (property_exists($objSoapObject, 'TotalAmount'))
				$objToReturn->fltTotalAmount = $objSoapObject->TotalAmount;
			if (property_exists($objSoapObject, 'DateEntered'))
				$objToReturn->dttDateEntered = new QDateTime($objSoapObject->DateEntered);
			if (property_exists($objSoapObject, 'DateCleared'))
				$objToReturn->dttDateCleared = new QDateTime($objSoapObject->DateCleared);
			if (property_exists($objSoapObject, 'DateCredited'))
				$objToReturn->dttDateCredited = new QDateTime($objSoapObject->DateCredited);
			if (property_exists($objSoapObject, 'CheckNumber'))
				$objToReturn->strCheckNumber = $objSoapObject->CheckNumber;
			if (property_exists($objSoapObject, 'AuthorizationNumber'))
				$objToReturn->strAuthorizationNumber = $objSoapObject->AuthorizationNumber;
			if (property_exists($objSoapObject, 'AlternateSource'))
				$objToReturn->strAlternateSource = $objSoapObject->AlternateSource;
			if (property_exists($objSoapObject, 'NonDeductibleFlag'))
				$objToReturn->blnNonDeductibleFlag = $objSoapObject->NonDeductibleFlag;
			if (property_exists($objSoapObject, 'Note'))
				$objToReturn->strNote = $objSoapObject->Note;
			if ((property_exists($objSoapObject, 'CreatedByLogin')) &&
				($objSoapObject->CreatedByLogin))
				$objToReturn->CreatedByLogin = Login::GetObjectFromSoapObject($objSoapObject->CreatedByLogin);
			if (property_exists($objSoapObject, 'UnpostedFlag'))
				$objToReturn->blnUnpostedFlag = $objSoapObject->UnpostedFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, StewardshipContribution::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->objStewardshipBatch)
				$objObject->objStewardshipBatch = StewardshipBatch::GetSoapObjectFromObject($objObject->objStewardshipBatch, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipBatchId = null;
			if ($objObject->objStewardshipStack)
				$objObject->objStewardshipStack = StewardshipStack::GetSoapObjectFromObject($objObject->objStewardshipStack, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipStackId = null;
			if ($objObject->objCheckingAccountLookup)
				$objObject->objCheckingAccountLookup = CheckingAccountLookup::GetSoapObjectFromObject($objObject->objCheckingAccountLookup, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCheckingAccountLookupId = null;
			if ($objObject->dttDateEntered)
				$objObject->dttDateEntered = $objObject->dttDateEntered->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateCleared)
				$objObject->dttDateCleared = $objObject->dttDateCleared->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateCredited)
				$objObject->dttDateCredited = $objObject->dttDateCredited->__toString(QDateTime::FormatSoap);
			if ($objObject->objCreatedByLogin)
				$objObject->objCreatedByLogin = Login::GetSoapObjectFromObject($objObject->objCreatedByLogin, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreatedByLoginId = null;
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
	 * @property-read QQNode $StewardshipContributionTypeId
	 * @property-read QQNode $StewardshipBatchId
	 * @property-read QQNodeStewardshipBatch $StewardshipBatch
	 * @property-read QQNode $StewardshipStackId
	 * @property-read QQNodeStewardshipStack $StewardshipStack
	 * @property-read QQNode $CheckingAccountLookupId
	 * @property-read QQNodeCheckingAccountLookup $CheckingAccountLookup
	 * @property-read QQNode $TotalAmount
	 * @property-read QQNode $DateEntered
	 * @property-read QQNode $DateCleared
	 * @property-read QQNode $DateCredited
	 * @property-read QQNode $CheckNumber
	 * @property-read QQNode $AuthorizationNumber
	 * @property-read QQNode $AlternateSource
	 * @property-read QQNode $NonDeductibleFlag
	 * @property-read QQNode $Note
	 * @property-read QQNode $CreatedByLoginId
	 * @property-read QQNodeLogin $CreatedByLogin
	 * @property-read QQNode $UnpostedFlag
	 * @property-read QQReverseReferenceNodeCreditCardPayment $CreditCardPayment
	 * @property-read QQReverseReferenceNodeStewardshipContributionAmount $StewardshipContributionAmount
	 * @property-read QQReverseReferenceNodeStewardshipPostLineItem $StewardshipPostLineItem
	 */
	class QQNodeStewardshipContribution extends QQNode {
		protected $strTableName = 'stewardship_contribution';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipContribution';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'StewardshipContributionTypeId':
					return new QQNode('stewardship_contribution_type_id', 'StewardshipContributionTypeId', 'integer', $this);
				case 'StewardshipBatchId':
					return new QQNode('stewardship_batch_id', 'StewardshipBatchId', 'integer', $this);
				case 'StewardshipBatch':
					return new QQNodeStewardshipBatch('stewardship_batch_id', 'StewardshipBatch', 'integer', $this);
				case 'StewardshipStackId':
					return new QQNode('stewardship_stack_id', 'StewardshipStackId', 'integer', $this);
				case 'StewardshipStack':
					return new QQNodeStewardshipStack('stewardship_stack_id', 'StewardshipStack', 'integer', $this);
				case 'CheckingAccountLookupId':
					return new QQNode('checking_account_lookup_id', 'CheckingAccountLookupId', 'integer', $this);
				case 'CheckingAccountLookup':
					return new QQNodeCheckingAccountLookup('checking_account_lookup_id', 'CheckingAccountLookup', 'integer', $this);
				case 'TotalAmount':
					return new QQNode('total_amount', 'TotalAmount', 'double', $this);
				case 'DateEntered':
					return new QQNode('date_entered', 'DateEntered', 'QDateTime', $this);
				case 'DateCleared':
					return new QQNode('date_cleared', 'DateCleared', 'QDateTime', $this);
				case 'DateCredited':
					return new QQNode('date_credited', 'DateCredited', 'QDateTime', $this);
				case 'CheckNumber':
					return new QQNode('check_number', 'CheckNumber', 'string', $this);
				case 'AuthorizationNumber':
					return new QQNode('authorization_number', 'AuthorizationNumber', 'string', $this);
				case 'AlternateSource':
					return new QQNode('alternate_source', 'AlternateSource', 'string', $this);
				case 'NonDeductibleFlag':
					return new QQNode('non_deductible_flag', 'NonDeductibleFlag', 'boolean', $this);
				case 'Note':
					return new QQNode('note', 'Note', 'string', $this);
				case 'CreatedByLoginId':
					return new QQNode('created_by_login_id', 'CreatedByLoginId', 'integer', $this);
				case 'CreatedByLogin':
					return new QQNodeLogin('created_by_login_id', 'CreatedByLogin', 'integer', $this);
				case 'UnpostedFlag':
					return new QQNode('unposted_flag', 'UnpostedFlag', 'boolean', $this);
				case 'CreditCardPayment':
					return new QQReverseReferenceNodeCreditCardPayment($this, 'creditcardpayment', 'reverse_reference', 'stewardship_contribution_id', 'CreditCardPayment');
				case 'StewardshipContributionAmount':
					return new QQReverseReferenceNodeStewardshipContributionAmount($this, 'stewardshipcontributionamount', 'reverse_reference', 'stewardship_contribution_id');
				case 'StewardshipPostLineItem':
					return new QQReverseReferenceNodeStewardshipPostLineItem($this, 'stewardshippostlineitem', 'reverse_reference', 'stewardship_contribution_id');

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
	 * @property-read QQNode $StewardshipContributionTypeId
	 * @property-read QQNode $StewardshipBatchId
	 * @property-read QQNodeStewardshipBatch $StewardshipBatch
	 * @property-read QQNode $StewardshipStackId
	 * @property-read QQNodeStewardshipStack $StewardshipStack
	 * @property-read QQNode $CheckingAccountLookupId
	 * @property-read QQNodeCheckingAccountLookup $CheckingAccountLookup
	 * @property-read QQNode $TotalAmount
	 * @property-read QQNode $DateEntered
	 * @property-read QQNode $DateCleared
	 * @property-read QQNode $DateCredited
	 * @property-read QQNode $CheckNumber
	 * @property-read QQNode $AuthorizationNumber
	 * @property-read QQNode $AlternateSource
	 * @property-read QQNode $NonDeductibleFlag
	 * @property-read QQNode $Note
	 * @property-read QQNode $CreatedByLoginId
	 * @property-read QQNodeLogin $CreatedByLogin
	 * @property-read QQNode $UnpostedFlag
	 * @property-read QQReverseReferenceNodeCreditCardPayment $CreditCardPayment
	 * @property-read QQReverseReferenceNodeStewardshipContributionAmount $StewardshipContributionAmount
	 * @property-read QQReverseReferenceNodeStewardshipPostLineItem $StewardshipPostLineItem
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeStewardshipContribution extends QQReverseReferenceNode {
		protected $strTableName = 'stewardship_contribution';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipContribution';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'StewardshipContributionTypeId':
					return new QQNode('stewardship_contribution_type_id', 'StewardshipContributionTypeId', 'integer', $this);
				case 'StewardshipBatchId':
					return new QQNode('stewardship_batch_id', 'StewardshipBatchId', 'integer', $this);
				case 'StewardshipBatch':
					return new QQNodeStewardshipBatch('stewardship_batch_id', 'StewardshipBatch', 'integer', $this);
				case 'StewardshipStackId':
					return new QQNode('stewardship_stack_id', 'StewardshipStackId', 'integer', $this);
				case 'StewardshipStack':
					return new QQNodeStewardshipStack('stewardship_stack_id', 'StewardshipStack', 'integer', $this);
				case 'CheckingAccountLookupId':
					return new QQNode('checking_account_lookup_id', 'CheckingAccountLookupId', 'integer', $this);
				case 'CheckingAccountLookup':
					return new QQNodeCheckingAccountLookup('checking_account_lookup_id', 'CheckingAccountLookup', 'integer', $this);
				case 'TotalAmount':
					return new QQNode('total_amount', 'TotalAmount', 'double', $this);
				case 'DateEntered':
					return new QQNode('date_entered', 'DateEntered', 'QDateTime', $this);
				case 'DateCleared':
					return new QQNode('date_cleared', 'DateCleared', 'QDateTime', $this);
				case 'DateCredited':
					return new QQNode('date_credited', 'DateCredited', 'QDateTime', $this);
				case 'CheckNumber':
					return new QQNode('check_number', 'CheckNumber', 'string', $this);
				case 'AuthorizationNumber':
					return new QQNode('authorization_number', 'AuthorizationNumber', 'string', $this);
				case 'AlternateSource':
					return new QQNode('alternate_source', 'AlternateSource', 'string', $this);
				case 'NonDeductibleFlag':
					return new QQNode('non_deductible_flag', 'NonDeductibleFlag', 'boolean', $this);
				case 'Note':
					return new QQNode('note', 'Note', 'string', $this);
				case 'CreatedByLoginId':
					return new QQNode('created_by_login_id', 'CreatedByLoginId', 'integer', $this);
				case 'CreatedByLogin':
					return new QQNodeLogin('created_by_login_id', 'CreatedByLogin', 'integer', $this);
				case 'UnpostedFlag':
					return new QQNode('unposted_flag', 'UnpostedFlag', 'boolean', $this);
				case 'CreditCardPayment':
					return new QQReverseReferenceNodeCreditCardPayment($this, 'creditcardpayment', 'reverse_reference', 'stewardship_contribution_id', 'CreditCardPayment');
				case 'StewardshipContributionAmount':
					return new QQReverseReferenceNodeStewardshipContributionAmount($this, 'stewardshipcontributionamount', 'reverse_reference', 'stewardship_contribution_id');
				case 'StewardshipPostLineItem':
					return new QQReverseReferenceNodeStewardshipPostLineItem($this, 'stewardshippostlineitem', 'reverse_reference', 'stewardship_contribution_id');

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