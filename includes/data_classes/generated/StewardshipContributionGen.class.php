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
	 * @property integer $StewardshipFundId the value for intStewardshipFundId (Not Null)
	 * @property integer $StewardshipContributionType the value for intStewardshipContributionType (Not Null)
	 * @property integer $StewardshipBatchId the value for intStewardshipBatchId (Not Null)
	 * @property integer $CheckingAccountLookupId the value for intCheckingAccountLookupId 
	 * @property double $Amount the value for fltAmount 
	 * @property QDateTime $DateEntered the value for dttDateEntered (Not Null)
	 * @property QDateTime $DateCleared the value for dttDateCleared 
	 * @property string $CheckNumber the value for strCheckNumber 
	 * @property string $AuthorizationNumber the value for strAuthorizationNumber 
	 * @property string $AlternateTitle the value for strAlternateTitle 
	 * @property string $Note the value for strNote 
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property StewardshipFund $StewardshipFund the value for the StewardshipFund object referenced by intStewardshipFundId (Not Null)
	 * @property StewardshipBatch $StewardshipBatch the value for the StewardshipBatch object referenced by intStewardshipBatchId (Not Null)
	 * @property CheckingAccountLookup $CheckingAccountLookup the value for the CheckingAccountLookup object referenced by intCheckingAccountLookupId 
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
		 * Protected member variable that maps to the database column stewardship_contribution.stewardship_fund_id
		 * @var integer intStewardshipFundId
		 */
		protected $intStewardshipFundId;
		const StewardshipFundIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.stewardship_contribution_type
		 * @var integer intStewardshipContributionType
		 */
		protected $intStewardshipContributionType;
		const StewardshipContributionTypeDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.stewardship_batch_id
		 * @var integer intStewardshipBatchId
		 */
		protected $intStewardshipBatchId;
		const StewardshipBatchIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.checking_account_lookup_id
		 * @var integer intCheckingAccountLookupId
		 */
		protected $intCheckingAccountLookupId;
		const CheckingAccountLookupIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.amount
		 * @var double fltAmount
		 */
		protected $fltAmount;
		const AmountDefault = null;


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
		 * Protected member variable that maps to the database column stewardship_contribution.alternate_title
		 * @var string strAlternateTitle
		 */
		protected $strAlternateTitle;
		const AlternateTitleMaxLength = 200;
		const AlternateTitleDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_contribution.note
		 * @var string strNote
		 */
		protected $strNote;
		const NoteDefault = null;


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
		 * in the database column stewardship_contribution.stewardship_fund_id.
		 *
		 * NOTE: Always use the StewardshipFund property getter to correctly retrieve this StewardshipFund object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipFund objStewardshipFund
		 */
		protected $objStewardshipFund;

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
		 * in the database column stewardship_contribution.checking_account_lookup_id.
		 *
		 * NOTE: Always use the CheckingAccountLookup property getter to correctly retrieve this CheckingAccountLookup object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CheckingAccountLookup objCheckingAccountLookup
		 */
		protected $objCheckingAccountLookup;





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

			// Perform the Query, Get the First Row, and Instantiate a new StewardshipContribution object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return StewardshipContribution::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
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
			$objBuilder->AddSelectItem($strTableName, 'stewardship_fund_id', $strAliasPrefix . 'stewardship_fund_id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_contribution_type', $strAliasPrefix . 'stewardship_contribution_type');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_batch_id', $strAliasPrefix . 'stewardship_batch_id');
			$objBuilder->AddSelectItem($strTableName, 'checking_account_lookup_id', $strAliasPrefix . 'checking_account_lookup_id');
			$objBuilder->AddSelectItem($strTableName, 'amount', $strAliasPrefix . 'amount');
			$objBuilder->AddSelectItem($strTableName, 'date_entered', $strAliasPrefix . 'date_entered');
			$objBuilder->AddSelectItem($strTableName, 'date_cleared', $strAliasPrefix . 'date_cleared');
			$objBuilder->AddSelectItem($strTableName, 'check_number', $strAliasPrefix . 'check_number');
			$objBuilder->AddSelectItem($strTableName, 'authorization_number', $strAliasPrefix . 'authorization_number');
			$objBuilder->AddSelectItem($strTableName, 'alternate_title', $strAliasPrefix . 'alternate_title');
			$objBuilder->AddSelectItem($strTableName, 'note', $strAliasPrefix . 'note');
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


			// Create a new instance of the StewardshipContribution object
			$objToReturn = new StewardshipContribution();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_fund_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_fund_id'] : $strAliasPrefix . 'stewardship_fund_id';
			$objToReturn->intStewardshipFundId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_contribution_type', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_contribution_type'] : $strAliasPrefix . 'stewardship_contribution_type';
			$objToReturn->intStewardshipContributionType = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_batch_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_batch_id'] : $strAliasPrefix . 'stewardship_batch_id';
			$objToReturn->intStewardshipBatchId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'checking_account_lookup_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'checking_account_lookup_id'] : $strAliasPrefix . 'checking_account_lookup_id';
			$objToReturn->intCheckingAccountLookupId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount'] : $strAliasPrefix . 'amount';
			$objToReturn->fltAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_entered', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_entered'] : $strAliasPrefix . 'date_entered';
			$objToReturn->dttDateEntered = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_cleared', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_cleared'] : $strAliasPrefix . 'date_cleared';
			$objToReturn->dttDateCleared = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'check_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'check_number'] : $strAliasPrefix . 'check_number';
			$objToReturn->strCheckNumber = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'authorization_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'authorization_number'] : $strAliasPrefix . 'authorization_number';
			$objToReturn->strAuthorizationNumber = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'alternate_title', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'alternate_title'] : $strAliasPrefix . 'alternate_title';
			$objToReturn->strAlternateTitle = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'note', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'note'] : $strAliasPrefix . 'note';
			$objToReturn->strNote = $objDbRow->GetColumn($strAliasName, 'Blob');

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

			// Check for StewardshipFund Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_fund_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipFund = StewardshipFund::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_fund_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StewardshipBatch Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_batch_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipBatch = StewardshipBatch::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_batch_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CheckingAccountLookup Early Binding
			$strAlias = $strAliasPrefix . 'checking_account_lookup_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCheckingAccountLookup = CheckingAccountLookup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'checking_account_lookup_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




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
		 * by PersonId, StewardshipContributionType Index(es)
		 * @param integer $intPersonId
		 * @param integer $intStewardshipContributionType
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/
		public static function LoadArrayByPersonIdStewardshipContributionType($intPersonId, $intStewardshipContributionType, $objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadArrayByPersonIdStewardshipContributionType query
			try {
				return StewardshipContribution::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::StewardshipContribution()->PersonId, $intPersonId),
					QQ::Equal(QQN::StewardshipContribution()->StewardshipContributionType, $intStewardshipContributionType)
					),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipContributions
		 * by PersonId, StewardshipContributionType Index(es)
		 * @param integer $intPersonId
		 * @param integer $intStewardshipContributionType
		 * @return int
		*/
		public static function CountByPersonIdStewardshipContributionType($intPersonId, $intStewardshipContributionType) {
			// Call StewardshipContribution::QueryCount to perform the CountByPersonIdStewardshipContributionType query
			return StewardshipContribution::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::StewardshipContribution()->PersonId, $intPersonId),
				QQ::Equal(QQN::StewardshipContribution()->StewardshipContributionType, $intStewardshipContributionType)
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
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/
		public static function LoadArrayByStewardshipFundId($intStewardshipFundId, $objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadArrayByStewardshipFundId query
			try {
				return StewardshipContribution::QueryArray(
					QQ::Equal(QQN::StewardshipContribution()->StewardshipFundId, $intStewardshipFundId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipContributions
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @return int
		*/
		public static function CountByStewardshipFundId($intStewardshipFundId) {
			// Call StewardshipContribution::QueryCount to perform the CountByStewardshipFundId query
			return StewardshipContribution::QueryCount(
				QQ::Equal(QQN::StewardshipContribution()->StewardshipFundId, $intStewardshipFundId)
			);
		}
			
		/**
		 * Load an array of StewardshipContribution objects,
		 * by StewardshipContributionType Index(es)
		 * @param integer $intStewardshipContributionType
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/
		public static function LoadArrayByStewardshipContributionType($intStewardshipContributionType, $objOptionalClauses = null) {
			// Call StewardshipContribution::QueryArray to perform the LoadArrayByStewardshipContributionType query
			try {
				return StewardshipContribution::QueryArray(
					QQ::Equal(QQN::StewardshipContribution()->StewardshipContributionType, $intStewardshipContributionType),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipContributions
		 * by StewardshipContributionType Index(es)
		 * @param integer $intStewardshipContributionType
		 * @return int
		*/
		public static function CountByStewardshipContributionType($intStewardshipContributionType) {
			// Call StewardshipContribution::QueryCount to perform the CountByStewardshipContributionType query
			return StewardshipContribution::QueryCount(
				QQ::Equal(QQN::StewardshipContribution()->StewardshipContributionType, $intStewardshipContributionType)
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



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

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
							`stewardship_fund_id`,
							`stewardship_contribution_type`,
							`stewardship_batch_id`,
							`checking_account_lookup_id`,
							`amount`,
							`date_entered`,
							`date_cleared`,
							`check_number`,
							`authorization_number`,
							`alternate_title`,
							`note`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipContributionType) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . ',
							' . $objDatabase->SqlVariable($this->intCheckingAccountLookupId) . ',
							' . $objDatabase->SqlVariable($this->fltAmount) . ',
							' . $objDatabase->SqlVariable($this->dttDateEntered) . ',
							' . $objDatabase->SqlVariable($this->dttDateCleared) . ',
							' . $objDatabase->SqlVariable($this->strCheckNumber) . ',
							' . $objDatabase->SqlVariable($this->strAuthorizationNumber) . ',
							' . $objDatabase->SqlVariable($this->strAlternateTitle) . ',
							' . $objDatabase->SqlVariable($this->strNote) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('stewardship_contribution', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`stewardship_contribution`
						SET
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							`stewardship_contribution_type` = ' . $objDatabase->SqlVariable($this->intStewardshipContributionType) . ',
							`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . ',
							`checking_account_lookup_id` = ' . $objDatabase->SqlVariable($this->intCheckingAccountLookupId) . ',
							`amount` = ' . $objDatabase->SqlVariable($this->fltAmount) . ',
							`date_entered` = ' . $objDatabase->SqlVariable($this->dttDateEntered) . ',
							`date_cleared` = ' . $objDatabase->SqlVariable($this->dttDateCleared) . ',
							`check_number` = ' . $objDatabase->SqlVariable($this->strCheckNumber) . ',
							`authorization_number` = ' . $objDatabase->SqlVariable($this->strAuthorizationNumber) . ',
							`alternate_title` = ' . $objDatabase->SqlVariable($this->strAlternateTitle) . ',
							`note` = ' . $objDatabase->SqlVariable($this->strNote) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
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


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
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
			$this->StewardshipFundId = $objReloaded->StewardshipFundId;
			$this->StewardshipContributionType = $objReloaded->StewardshipContributionType;
			$this->StewardshipBatchId = $objReloaded->StewardshipBatchId;
			$this->CheckingAccountLookupId = $objReloaded->CheckingAccountLookupId;
			$this->fltAmount = $objReloaded->fltAmount;
			$this->dttDateEntered = $objReloaded->dttDateEntered;
			$this->dttDateCleared = $objReloaded->dttDateCleared;
			$this->strCheckNumber = $objReloaded->strCheckNumber;
			$this->strAuthorizationNumber = $objReloaded->strAuthorizationNumber;
			$this->strAlternateTitle = $objReloaded->strAlternateTitle;
			$this->strNote = $objReloaded->strNote;
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

				case 'StewardshipFundId':
					// Gets the value for intStewardshipFundId (Not Null)
					// @return integer
					return $this->intStewardshipFundId;

				case 'StewardshipContributionType':
					// Gets the value for intStewardshipContributionType (Not Null)
					// @return integer
					return $this->intStewardshipContributionType;

				case 'StewardshipBatchId':
					// Gets the value for intStewardshipBatchId (Not Null)
					// @return integer
					return $this->intStewardshipBatchId;

				case 'CheckingAccountLookupId':
					// Gets the value for intCheckingAccountLookupId 
					// @return integer
					return $this->intCheckingAccountLookupId;

				case 'Amount':
					// Gets the value for fltAmount 
					// @return double
					return $this->fltAmount;

				case 'DateEntered':
					// Gets the value for dttDateEntered (Not Null)
					// @return QDateTime
					return $this->dttDateEntered;

				case 'DateCleared':
					// Gets the value for dttDateCleared 
					// @return QDateTime
					return $this->dttDateCleared;

				case 'CheckNumber':
					// Gets the value for strCheckNumber 
					// @return string
					return $this->strCheckNumber;

				case 'AuthorizationNumber':
					// Gets the value for strAuthorizationNumber 
					// @return string
					return $this->strAuthorizationNumber;

				case 'AlternateTitle':
					// Gets the value for strAlternateTitle 
					// @return string
					return $this->strAlternateTitle;

				case 'Note':
					// Gets the value for strNote 
					// @return string
					return $this->strNote;


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

				case 'StewardshipFund':
					// Gets the value for the StewardshipFund object referenced by intStewardshipFundId (Not Null)
					// @return StewardshipFund
					try {
						if ((!$this->objStewardshipFund) && (!is_null($this->intStewardshipFundId)))
							$this->objStewardshipFund = StewardshipFund::Load($this->intStewardshipFundId);
						return $this->objStewardshipFund;
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

				case 'StewardshipFundId':
					// Sets the value for intStewardshipFundId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipFund = null;
						return ($this->intStewardshipFundId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipContributionType':
					// Sets the value for intStewardshipContributionType (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intStewardshipContributionType = QType::Cast($mixValue, QType::Integer));
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

				case 'AlternateTitle':
					// Sets the value for strAlternateTitle 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAlternateTitle = QType::Cast($mixValue, QType::String));
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

				case 'StewardshipFund':
					// Sets the value for the StewardshipFund object referenced by intStewardshipFundId (Not Null)
					// @param StewardshipFund $mixValue
					// @return StewardshipFund
					if (is_null($mixValue)) {
						$this->intStewardshipFundId = null;
						$this->objStewardshipFund = null;
						return null;
					} else {
						// Make sure $mixValue actually is a StewardshipFund object
						try {
							$mixValue = QType::Cast($mixValue, 'StewardshipFund');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED StewardshipFund object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved StewardshipFund for this StewardshipContribution');

						// Update Local Member Variables
						$this->objStewardshipFund = $mixValue;
						$this->intStewardshipFundId = $mixValue->Id;

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
			$strToReturn = '<complexType name="StewardshipContribution"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="StewardshipFund" type="xsd1:StewardshipFund"/>';
			$strToReturn .= '<element name="StewardshipContributionType" type="xsd:int"/>';
			$strToReturn .= '<element name="StewardshipBatch" type="xsd1:StewardshipBatch"/>';
			$strToReturn .= '<element name="CheckingAccountLookup" type="xsd1:CheckingAccountLookup"/>';
			$strToReturn .= '<element name="Amount" type="xsd:float"/>';
			$strToReturn .= '<element name="DateEntered" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateCleared" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CheckNumber" type="xsd:string"/>';
			$strToReturn .= '<element name="AuthorizationNumber" type="xsd:string"/>';
			$strToReturn .= '<element name="AlternateTitle" type="xsd:string"/>';
			$strToReturn .= '<element name="Note" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('StewardshipContribution', $strComplexTypeArray)) {
				$strComplexTypeArray['StewardshipContribution'] = StewardshipContribution::GetSoapComplexTypeXml();
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				StewardshipFund::AlterSoapComplexTypeArray($strComplexTypeArray);
				StewardshipBatch::AlterSoapComplexTypeArray($strComplexTypeArray);
				CheckingAccountLookup::AlterSoapComplexTypeArray($strComplexTypeArray);
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
			if ((property_exists($objSoapObject, 'StewardshipFund')) &&
				($objSoapObject->StewardshipFund))
				$objToReturn->StewardshipFund = StewardshipFund::GetObjectFromSoapObject($objSoapObject->StewardshipFund);
			if (property_exists($objSoapObject, 'StewardshipContributionType'))
				$objToReturn->intStewardshipContributionType = $objSoapObject->StewardshipContributionType;
			if ((property_exists($objSoapObject, 'StewardshipBatch')) &&
				($objSoapObject->StewardshipBatch))
				$objToReturn->StewardshipBatch = StewardshipBatch::GetObjectFromSoapObject($objSoapObject->StewardshipBatch);
			if ((property_exists($objSoapObject, 'CheckingAccountLookup')) &&
				($objSoapObject->CheckingAccountLookup))
				$objToReturn->CheckingAccountLookup = CheckingAccountLookup::GetObjectFromSoapObject($objSoapObject->CheckingAccountLookup);
			if (property_exists($objSoapObject, 'Amount'))
				$objToReturn->fltAmount = $objSoapObject->Amount;
			if (property_exists($objSoapObject, 'DateEntered'))
				$objToReturn->dttDateEntered = new QDateTime($objSoapObject->DateEntered);
			if (property_exists($objSoapObject, 'DateCleared'))
				$objToReturn->dttDateCleared = new QDateTime($objSoapObject->DateCleared);
			if (property_exists($objSoapObject, 'CheckNumber'))
				$objToReturn->strCheckNumber = $objSoapObject->CheckNumber;
			if (property_exists($objSoapObject, 'AuthorizationNumber'))
				$objToReturn->strAuthorizationNumber = $objSoapObject->AuthorizationNumber;
			if (property_exists($objSoapObject, 'AlternateTitle'))
				$objToReturn->strAlternateTitle = $objSoapObject->AlternateTitle;
			if (property_exists($objSoapObject, 'Note'))
				$objToReturn->strNote = $objSoapObject->Note;
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
			if ($objObject->objStewardshipFund)
				$objObject->objStewardshipFund = StewardshipFund::GetSoapObjectFromObject($objObject->objStewardshipFund, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipFundId = null;
			if ($objObject->objStewardshipBatch)
				$objObject->objStewardshipBatch = StewardshipBatch::GetSoapObjectFromObject($objObject->objStewardshipBatch, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipBatchId = null;
			if ($objObject->objCheckingAccountLookup)
				$objObject->objCheckingAccountLookup = CheckingAccountLookup::GetSoapObjectFromObject($objObject->objCheckingAccountLookup, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCheckingAccountLookupId = null;
			if ($objObject->dttDateEntered)
				$objObject->dttDateEntered = $objObject->dttDateEntered->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateCleared)
				$objObject->dttDateCleared = $objObject->dttDateCleared->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

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
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'StewardshipContributionType':
					return new QQNode('stewardship_contribution_type', 'StewardshipContributionType', 'integer', $this);
				case 'StewardshipBatchId':
					return new QQNode('stewardship_batch_id', 'StewardshipBatchId', 'integer', $this);
				case 'StewardshipBatch':
					return new QQNodeStewardshipBatch('stewardship_batch_id', 'StewardshipBatch', 'integer', $this);
				case 'CheckingAccountLookupId':
					return new QQNode('checking_account_lookup_id', 'CheckingAccountLookupId', 'integer', $this);
				case 'CheckingAccountLookup':
					return new QQNodeCheckingAccountLookup('checking_account_lookup_id', 'CheckingAccountLookup', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'DateEntered':
					return new QQNode('date_entered', 'DateEntered', 'QDateTime', $this);
				case 'DateCleared':
					return new QQNode('date_cleared', 'DateCleared', 'QDateTime', $this);
				case 'CheckNumber':
					return new QQNode('check_number', 'CheckNumber', 'string', $this);
				case 'AuthorizationNumber':
					return new QQNode('authorization_number', 'AuthorizationNumber', 'string', $this);
				case 'AlternateTitle':
					return new QQNode('alternate_title', 'AlternateTitle', 'string', $this);
				case 'Note':
					return new QQNode('note', 'Note', 'string', $this);

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
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'StewardshipContributionType':
					return new QQNode('stewardship_contribution_type', 'StewardshipContributionType', 'integer', $this);
				case 'StewardshipBatchId':
					return new QQNode('stewardship_batch_id', 'StewardshipBatchId', 'integer', $this);
				case 'StewardshipBatch':
					return new QQNodeStewardshipBatch('stewardship_batch_id', 'StewardshipBatch', 'integer', $this);
				case 'CheckingAccountLookupId':
					return new QQNode('checking_account_lookup_id', 'CheckingAccountLookupId', 'integer', $this);
				case 'CheckingAccountLookup':
					return new QQNodeCheckingAccountLookup('checking_account_lookup_id', 'CheckingAccountLookup', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'DateEntered':
					return new QQNode('date_entered', 'DateEntered', 'QDateTime', $this);
				case 'DateCleared':
					return new QQNode('date_cleared', 'DateCleared', 'QDateTime', $this);
				case 'CheckNumber':
					return new QQNode('check_number', 'CheckNumber', 'string', $this);
				case 'AuthorizationNumber':
					return new QQNode('authorization_number', 'AuthorizationNumber', 'string', $this);
				case 'AlternateTitle':
					return new QQNode('alternate_title', 'AlternateTitle', 'string', $this);
				case 'Note':
					return new QQNode('note', 'Note', 'string', $this);

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