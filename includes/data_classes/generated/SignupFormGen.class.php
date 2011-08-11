<?php
	/**
	 * The abstract SignupFormGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SignupForm subclass which
	 * extends this SignupFormGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SignupForm class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $SignupFormTypeId the value for intSignupFormTypeId (Not Null)
	 * @property integer $MinistryId the value for intMinistryId (Not Null)
	 * @property string $Name the value for strName 
	 * @property string $Token the value for strToken (Unique)
	 * @property boolean $ActiveFlag the value for blnActiveFlag 
	 * @property boolean $ConfidentialFlag the value for blnConfidentialFlag 
	 * @property string $Description the value for strDescription 
	 * @property string $InformationUrl the value for strInformationUrl 
	 * @property string $SupportEmail the value for strSupportEmail (Not Null)
	 * @property string $EmailNotification the value for strEmailNotification 
	 * @property boolean $AllowOtherFlag the value for blnAllowOtherFlag 
	 * @property boolean $AllowMultipleFlag the value for blnAllowMultipleFlag 
	 * @property integer $SignupLimit the value for intSignupLimit 
	 * @property integer $SignupMaleLimit the value for intSignupMaleLimit 
	 * @property integer $SignupFemaleLimit the value for intSignupFemaleLimit 
	 * @property string $FundingAccount the value for strFundingAccount 
	 * @property integer $DonationStewardshipFundId the value for intDonationStewardshipFundId 
	 * @property QDateTime $DateCreated the value for dttDateCreated (Not Null)
	 * @property Ministry $Ministry the value for the Ministry object referenced by intMinistryId (Not Null)
	 * @property StewardshipFund $DonationStewardshipFund the value for the StewardshipFund object referenced by intDonationStewardshipFundId 
	 * @property ClassMeeting $ClassMeeting the value for the ClassMeeting object that uniquely references this SignupForm
	 * @property EventSignupForm $EventSignupForm the value for the EventSignupForm object that uniquely references this SignupForm
	 * @property FormProduct $_FormProduct the value for the private _objFormProduct (Read-Only) if set due to an expansion on the form_product.signup_form_id reverse relationship
	 * @property FormProduct[] $_FormProductArray the value for the private _objFormProductArray (Read-Only) if set due to an ExpandAsArray on the form_product.signup_form_id reverse relationship
	 * @property FormQuestion $_FormQuestion the value for the private _objFormQuestion (Read-Only) if set due to an expansion on the form_question.signup_form_id reverse relationship
	 * @property FormQuestion[] $_FormQuestionArray the value for the private _objFormQuestionArray (Read-Only) if set due to an ExpandAsArray on the form_question.signup_form_id reverse relationship
	 * @property SignupEntry $_SignupEntry the value for the private _objSignupEntry (Read-Only) if set due to an expansion on the signup_entry.signup_form_id reverse relationship
	 * @property SignupEntry[] $_SignupEntryArray the value for the private _objSignupEntryArray (Read-Only) if set due to an ExpandAsArray on the signup_entry.signup_form_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SignupFormGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column signup_form.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.signup_form_type_id
		 * @var integer intSignupFormTypeId
		 */
		protected $intSignupFormTypeId;
		const SignupFormTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.ministry_id
		 * @var integer intMinistryId
		 */
		protected $intMinistryId;
		const MinistryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 200;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.token
		 * @var string strToken
		 */
		protected $strToken;
		const TokenMaxLength = 200;
		const TokenDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.active_flag
		 * @var boolean blnActiveFlag
		 */
		protected $blnActiveFlag;
		const ActiveFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.confidential_flag
		 * @var boolean blnConfidentialFlag
		 */
		protected $blnConfidentialFlag;
		const ConfidentialFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.information_url
		 * @var string strInformationUrl
		 */
		protected $strInformationUrl;
		const InformationUrlMaxLength = 200;
		const InformationUrlDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.support_email
		 * @var string strSupportEmail
		 */
		protected $strSupportEmail;
		const SupportEmailMaxLength = 255;
		const SupportEmailDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.email_notification
		 * @var string strEmailNotification
		 */
		protected $strEmailNotification;
		const EmailNotificationDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.allow_other_flag
		 * @var boolean blnAllowOtherFlag
		 */
		protected $blnAllowOtherFlag;
		const AllowOtherFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.allow_multiple_flag
		 * @var boolean blnAllowMultipleFlag
		 */
		protected $blnAllowMultipleFlag;
		const AllowMultipleFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.signup_limit
		 * @var integer intSignupLimit
		 */
		protected $intSignupLimit;
		const SignupLimitDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.signup_male_limit
		 * @var integer intSignupMaleLimit
		 */
		protected $intSignupMaleLimit;
		const SignupMaleLimitDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.signup_female_limit
		 * @var integer intSignupFemaleLimit
		 */
		protected $intSignupFemaleLimit;
		const SignupFemaleLimitDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.funding_account
		 * @var string strFundingAccount
		 */
		protected $strFundingAccount;
		const FundingAccountMaxLength = 10;
		const FundingAccountDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.donation_stewardship_fund_id
		 * @var integer intDonationStewardshipFundId
		 */
		protected $intDonationStewardshipFundId;
		const DonationStewardshipFundIdDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_form.date_created
		 * @var QDateTime dttDateCreated
		 */
		protected $dttDateCreated;
		const DateCreatedDefault = null;


		/**
		 * Private member variable that stores a reference to a single FormProduct object
		 * (of type FormProduct), if this SignupForm object was restored with
		 * an expansion on the form_product association table.
		 * @var FormProduct _objFormProduct;
		 */
		private $_objFormProduct;

		/**
		 * Private member variable that stores a reference to an array of FormProduct objects
		 * (of type FormProduct[]), if this SignupForm object was restored with
		 * an ExpandAsArray on the form_product association table.
		 * @var FormProduct[] _objFormProductArray;
		 */
		private $_objFormProductArray = array();

		/**
		 * Private member variable that stores a reference to a single FormQuestion object
		 * (of type FormQuestion), if this SignupForm object was restored with
		 * an expansion on the form_question association table.
		 * @var FormQuestion _objFormQuestion;
		 */
		private $_objFormQuestion;

		/**
		 * Private member variable that stores a reference to an array of FormQuestion objects
		 * (of type FormQuestion[]), if this SignupForm object was restored with
		 * an ExpandAsArray on the form_question association table.
		 * @var FormQuestion[] _objFormQuestionArray;
		 */
		private $_objFormQuestionArray = array();

		/**
		 * Private member variable that stores a reference to a single SignupEntry object
		 * (of type SignupEntry), if this SignupForm object was restored with
		 * an expansion on the signup_entry association table.
		 * @var SignupEntry _objSignupEntry;
		 */
		private $_objSignupEntry;

		/**
		 * Private member variable that stores a reference to an array of SignupEntry objects
		 * (of type SignupEntry[]), if this SignupForm object was restored with
		 * an ExpandAsArray on the signup_entry association table.
		 * @var SignupEntry[] _objSignupEntryArray;
		 */
		private $_objSignupEntryArray = array();

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
		 * in the database column signup_form.ministry_id.
		 *
		 * NOTE: Always use the Ministry property getter to correctly retrieve this Ministry object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Ministry objMinistry
		 */
		protected $objMinistry;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column signup_form.donation_stewardship_fund_id.
		 *
		 * NOTE: Always use the DonationStewardshipFund property getter to correctly retrieve this StewardshipFund object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipFund objDonationStewardshipFund
		 */
		protected $objDonationStewardshipFund;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column class_meeting.signup_form_id.
		 *
		 * NOTE: Always use the ClassMeeting property getter to correctly retrieve this ClassMeeting object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClassMeeting objClassMeeting
		 */
		protected $objClassMeeting;
		
		/**
		 * Used internally to manage whether the adjoined ClassMeeting object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyClassMeeting;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column event_signup_form.signup_form_id.
		 *
		 * NOTE: Always use the EventSignupForm property getter to correctly retrieve this EventSignupForm object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var EventSignupForm objEventSignupForm
		 */
		protected $objEventSignupForm;
		
		/**
		 * Used internally to manage whether the adjoined EventSignupForm object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyEventSignupForm;





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
		 * Load a SignupForm from PK Info
		 * @param integer $intId
		 * @return SignupForm
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return SignupForm::QuerySingle(
				QQ::Equal(QQN::SignupForm()->Id, $intId)
			);
		}

		/**
		 * Load all SignupForms
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupForm[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call SignupForm::QueryArray to perform the LoadAll query
			try {
				return SignupForm::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SignupForms
		 * @return int
		 */
		public static function CountAll() {
			// Call SignupForm::QueryCount to perform the CountAll query
			return SignupForm::QueryCount(QQ::All());
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
			$objDatabase = SignupForm::GetDatabase();

			// Create/Build out the QueryBuilder object with SignupForm-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'signup_form');
			SignupForm::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('signup_form');

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
		 * Static Qcodo Query method to query for a single SignupForm object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SignupForm the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SignupForm::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new SignupForm object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SignupForm::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return SignupForm::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of SignupForm objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SignupForm[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SignupForm::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SignupForm::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = SignupForm::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of SignupForm objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SignupForm::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = SignupForm::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'signup_form_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with SignupForm-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				SignupForm::GetSelectFields($objQueryBuilder);
				SignupForm::GetFromFields($objQueryBuilder);

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
			return SignupForm::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SignupForm
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'signup_form';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'signup_form_type_id', $strAliasPrefix . 'signup_form_type_id');
			$objBuilder->AddSelectItem($strTableName, 'ministry_id', $strAliasPrefix . 'ministry_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'token', $strAliasPrefix . 'token');
			$objBuilder->AddSelectItem($strTableName, 'active_flag', $strAliasPrefix . 'active_flag');
			$objBuilder->AddSelectItem($strTableName, 'confidential_flag', $strAliasPrefix . 'confidential_flag');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'information_url', $strAliasPrefix . 'information_url');
			$objBuilder->AddSelectItem($strTableName, 'support_email', $strAliasPrefix . 'support_email');
			$objBuilder->AddSelectItem($strTableName, 'email_notification', $strAliasPrefix . 'email_notification');
			$objBuilder->AddSelectItem($strTableName, 'allow_other_flag', $strAliasPrefix . 'allow_other_flag');
			$objBuilder->AddSelectItem($strTableName, 'allow_multiple_flag', $strAliasPrefix . 'allow_multiple_flag');
			$objBuilder->AddSelectItem($strTableName, 'signup_limit', $strAliasPrefix . 'signup_limit');
			$objBuilder->AddSelectItem($strTableName, 'signup_male_limit', $strAliasPrefix . 'signup_male_limit');
			$objBuilder->AddSelectItem($strTableName, 'signup_female_limit', $strAliasPrefix . 'signup_female_limit');
			$objBuilder->AddSelectItem($strTableName, 'funding_account', $strAliasPrefix . 'funding_account');
			$objBuilder->AddSelectItem($strTableName, 'donation_stewardship_fund_id', $strAliasPrefix . 'donation_stewardship_fund_id');
			$objBuilder->AddSelectItem($strTableName, 'date_created', $strAliasPrefix . 'date_created');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a SignupForm from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SignupForm::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return SignupForm
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
					$strAliasPrefix = 'signup_form__';


				$strAlias = $strAliasPrefix . 'formproduct__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objFormProductArray)) {
						$objPreviousChildItem = $objPreviousItem->_objFormProductArray[$intPreviousChildItemCount - 1];
						$objChildItem = FormProduct::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formproduct__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objFormProductArray[] = $objChildItem;
					} else
						$objPreviousItem->_objFormProductArray[] = FormProduct::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formproduct__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'formquestion__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objFormQuestionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objFormQuestionArray[$intPreviousChildItemCount - 1];
						$objChildItem = FormQuestion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formquestion__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objFormQuestionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objFormQuestionArray[] = FormQuestion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formquestion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'signupentry__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objSignupEntryArray)) {
						$objPreviousChildItem = $objPreviousItem->_objSignupEntryArray[$intPreviousChildItemCount - 1];
						$objChildItem = SignupEntry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupentry__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objSignupEntryArray[] = $objChildItem;
					} else
						$objPreviousItem->_objSignupEntryArray[] = SignupEntry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupentry__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'signup_form__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the SignupForm object
			$objToReturn = new SignupForm();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'signup_form_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_form_type_id'] : $strAliasPrefix . 'signup_form_type_id';
			$objToReturn->intSignupFormTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'ministry_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ministry_id'] : $strAliasPrefix . 'ministry_id';
			$objToReturn->intMinistryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'token', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'token'] : $strAliasPrefix . 'token';
			$objToReturn->strToken = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'active_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'active_flag'] : $strAliasPrefix . 'active_flag';
			$objToReturn->blnActiveFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'confidential_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'confidential_flag'] : $strAliasPrefix . 'confidential_flag';
			$objToReturn->blnConfidentialFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'information_url', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'information_url'] : $strAliasPrefix . 'information_url';
			$objToReturn->strInformationUrl = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'support_email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'support_email'] : $strAliasPrefix . 'support_email';
			$objToReturn->strSupportEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email_notification', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email_notification'] : $strAliasPrefix . 'email_notification';
			$objToReturn->strEmailNotification = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'allow_other_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'allow_other_flag'] : $strAliasPrefix . 'allow_other_flag';
			$objToReturn->blnAllowOtherFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'allow_multiple_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'allow_multiple_flag'] : $strAliasPrefix . 'allow_multiple_flag';
			$objToReturn->blnAllowMultipleFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'signup_limit', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_limit'] : $strAliasPrefix . 'signup_limit';
			$objToReturn->intSignupLimit = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'signup_male_limit', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_male_limit'] : $strAliasPrefix . 'signup_male_limit';
			$objToReturn->intSignupMaleLimit = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'signup_female_limit', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_female_limit'] : $strAliasPrefix . 'signup_female_limit';
			$objToReturn->intSignupFemaleLimit = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'funding_account', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'funding_account'] : $strAliasPrefix . 'funding_account';
			$objToReturn->strFundingAccount = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'donation_stewardship_fund_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'donation_stewardship_fund_id'] : $strAliasPrefix . 'donation_stewardship_fund_id';
			$objToReturn->intDonationStewardshipFundId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_created', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_created'] : $strAliasPrefix . 'date_created';
			$objToReturn->dttDateCreated = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'signup_form__';

			// Check for Ministry Early Binding
			$strAlias = $strAliasPrefix . 'ministry_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objMinistry = Ministry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ministry_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for DonationStewardshipFund Early Binding
			$strAlias = $strAliasPrefix . 'donation_stewardship_fund_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objDonationStewardshipFund = StewardshipFund::InstantiateDbRow($objDbRow, $strAliasPrefix . 'donation_stewardship_fund_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for ClassMeeting Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'classmeeting__signup_form_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objClassMeeting = ClassMeeting::InstantiateDbRow($objDbRow, $strAliasPrefix . 'classmeeting__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objClassMeeting = false;
			}

			// Check for EventSignupForm Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'eventsignupform__signup_form_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objEventSignupForm = EventSignupForm::InstantiateDbRow($objDbRow, $strAliasPrefix . 'eventsignupform__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objEventSignupForm = false;
			}



			// Check for FormProduct Virtual Binding
			$strAlias = $strAliasPrefix . 'formproduct__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objFormProductArray[] = FormProduct::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formproduct__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objFormProduct = FormProduct::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formproduct__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for FormQuestion Virtual Binding
			$strAlias = $strAliasPrefix . 'formquestion__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objFormQuestionArray[] = FormQuestion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formquestion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objFormQuestion = FormQuestion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formquestion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for SignupEntry Virtual Binding
			$strAlias = $strAliasPrefix . 'signupentry__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objSignupEntryArray[] = SignupEntry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupentry__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objSignupEntry = SignupEntry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupentry__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of SignupForms from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return SignupForm[]
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
					$objItem = SignupForm::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SignupForm::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single SignupForm object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return SignupForm next row resulting from the query
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
			return SignupForm::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single SignupForm object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return SignupForm
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return SignupForm::QuerySingle(
				QQ::Equal(QQN::SignupForm()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single SignupForm object,
		 * by Token Index(es)
		 * @param string $strToken
		 * @return SignupForm
		*/
		public static function LoadByToken($strToken, $objOptionalClauses = null) {
			return SignupForm::QuerySingle(
				QQ::Equal(QQN::SignupForm()->Token, $strToken)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SignupForm objects,
		 * by SignupFormTypeId Index(es)
		 * @param integer $intSignupFormTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupForm[]
		*/
		public static function LoadArrayBySignupFormTypeId($intSignupFormTypeId, $objOptionalClauses = null) {
			// Call SignupForm::QueryArray to perform the LoadArrayBySignupFormTypeId query
			try {
				return SignupForm::QueryArray(
					QQ::Equal(QQN::SignupForm()->SignupFormTypeId, $intSignupFormTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SignupForms
		 * by SignupFormTypeId Index(es)
		 * @param integer $intSignupFormTypeId
		 * @return int
		*/
		public static function CountBySignupFormTypeId($intSignupFormTypeId, $objOptionalClauses = null) {
			// Call SignupForm::QueryCount to perform the CountBySignupFormTypeId query
			return SignupForm::QueryCount(
				QQ::Equal(QQN::SignupForm()->SignupFormTypeId, $intSignupFormTypeId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SignupForm objects,
		 * by MinistryId Index(es)
		 * @param integer $intMinistryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupForm[]
		*/
		public static function LoadArrayByMinistryId($intMinistryId, $objOptionalClauses = null) {
			// Call SignupForm::QueryArray to perform the LoadArrayByMinistryId query
			try {
				return SignupForm::QueryArray(
					QQ::Equal(QQN::SignupForm()->MinistryId, $intMinistryId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SignupForms
		 * by MinistryId Index(es)
		 * @param integer $intMinistryId
		 * @return int
		*/
		public static function CountByMinistryId($intMinistryId, $objOptionalClauses = null) {
			// Call SignupForm::QueryCount to perform the CountByMinistryId query
			return SignupForm::QueryCount(
				QQ::Equal(QQN::SignupForm()->MinistryId, $intMinistryId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SignupForm objects,
		 * by DonationStewardshipFundId Index(es)
		 * @param integer $intDonationStewardshipFundId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupForm[]
		*/
		public static function LoadArrayByDonationStewardshipFundId($intDonationStewardshipFundId, $objOptionalClauses = null) {
			// Call SignupForm::QueryArray to perform the LoadArrayByDonationStewardshipFundId query
			try {
				return SignupForm::QueryArray(
					QQ::Equal(QQN::SignupForm()->DonationStewardshipFundId, $intDonationStewardshipFundId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SignupForms
		 * by DonationStewardshipFundId Index(es)
		 * @param integer $intDonationStewardshipFundId
		 * @return int
		*/
		public static function CountByDonationStewardshipFundId($intDonationStewardshipFundId, $objOptionalClauses = null) {
			// Call SignupForm::QueryCount to perform the CountByDonationStewardshipFundId query
			return SignupForm::QueryCount(
				QQ::Equal(QQN::SignupForm()->DonationStewardshipFundId, $intDonationStewardshipFundId)
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
		 * Save this SignupForm
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `signup_form` (
							`signup_form_type_id`,
							`ministry_id`,
							`name`,
							`token`,
							`active_flag`,
							`confidential_flag`,
							`description`,
							`information_url`,
							`support_email`,
							`email_notification`,
							`allow_other_flag`,
							`allow_multiple_flag`,
							`signup_limit`,
							`signup_male_limit`,
							`signup_female_limit`,
							`funding_account`,
							`donation_stewardship_fund_id`,
							`date_created`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intSignupFormTypeId) . ',
							' . $objDatabase->SqlVariable($this->intMinistryId) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strToken) . ',
							' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
							' . $objDatabase->SqlVariable($this->blnConfidentialFlag) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->strInformationUrl) . ',
							' . $objDatabase->SqlVariable($this->strSupportEmail) . ',
							' . $objDatabase->SqlVariable($this->strEmailNotification) . ',
							' . $objDatabase->SqlVariable($this->blnAllowOtherFlag) . ',
							' . $objDatabase->SqlVariable($this->blnAllowMultipleFlag) . ',
							' . $objDatabase->SqlVariable($this->intSignupLimit) . ',
							' . $objDatabase->SqlVariable($this->intSignupMaleLimit) . ',
							' . $objDatabase->SqlVariable($this->intSignupFemaleLimit) . ',
							' . $objDatabase->SqlVariable($this->strFundingAccount) . ',
							' . $objDatabase->SqlVariable($this->intDonationStewardshipFundId) . ',
							' . $objDatabase->SqlVariable($this->dttDateCreated) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('signup_form', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`signup_form`
						SET
							`signup_form_type_id` = ' . $objDatabase->SqlVariable($this->intSignupFormTypeId) . ',
							`ministry_id` = ' . $objDatabase->SqlVariable($this->intMinistryId) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`token` = ' . $objDatabase->SqlVariable($this->strToken) . ',
							`active_flag` = ' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
							`confidential_flag` = ' . $objDatabase->SqlVariable($this->blnConfidentialFlag) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`information_url` = ' . $objDatabase->SqlVariable($this->strInformationUrl) . ',
							`support_email` = ' . $objDatabase->SqlVariable($this->strSupportEmail) . ',
							`email_notification` = ' . $objDatabase->SqlVariable($this->strEmailNotification) . ',
							`allow_other_flag` = ' . $objDatabase->SqlVariable($this->blnAllowOtherFlag) . ',
							`allow_multiple_flag` = ' . $objDatabase->SqlVariable($this->blnAllowMultipleFlag) . ',
							`signup_limit` = ' . $objDatabase->SqlVariable($this->intSignupLimit) . ',
							`signup_male_limit` = ' . $objDatabase->SqlVariable($this->intSignupMaleLimit) . ',
							`signup_female_limit` = ' . $objDatabase->SqlVariable($this->intSignupFemaleLimit) . ',
							`funding_account` = ' . $objDatabase->SqlVariable($this->strFundingAccount) . ',
							`donation_stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intDonationStewardshipFundId) . ',
							`date_created` = ' . $objDatabase->SqlVariable($this->dttDateCreated) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

		
		
				// Update the adjoined ClassMeeting object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyClassMeeting) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = ClassMeeting::LoadBySignupFormId($this->intId)) {
						$objAssociated->SignupFormId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objClassMeeting) {
						$this->objClassMeeting->SignupFormId = $this->intId;
						$this->objClassMeeting->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyClassMeeting = false;
				}
		
		
				// Update the adjoined EventSignupForm object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyEventSignupForm) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = EventSignupForm::LoadBySignupFormId($this->intId)) {
						$objAssociated->SignupFormId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objEventSignupForm) {
						$this->objEventSignupForm->SignupFormId = $this->intId;
						$this->objEventSignupForm->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyEventSignupForm = false;
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
		 * Delete this SignupForm
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SignupForm with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			
			
			// Update the adjoined ClassMeeting object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = ClassMeeting::LoadBySignupFormId($this->intId)) {
				$objAssociated->Delete();
			}
			
			
			// Update the adjoined EventSignupForm object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = EventSignupForm::LoadBySignupFormId($this->intId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_form`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all SignupForms
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_form`');
		}

		/**
		 * Truncate signup_form table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `signup_form`');
		}

		/**
		 * Reload this SignupForm from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SignupForm object.');

			// Reload the Object
			$objReloaded = SignupForm::Load($this->intId);

			// Update $this's local variables to match
			$this->SignupFormTypeId = $objReloaded->SignupFormTypeId;
			$this->MinistryId = $objReloaded->MinistryId;
			$this->strName = $objReloaded->strName;
			$this->strToken = $objReloaded->strToken;
			$this->blnActiveFlag = $objReloaded->blnActiveFlag;
			$this->blnConfidentialFlag = $objReloaded->blnConfidentialFlag;
			$this->strDescription = $objReloaded->strDescription;
			$this->strInformationUrl = $objReloaded->strInformationUrl;
			$this->strSupportEmail = $objReloaded->strSupportEmail;
			$this->strEmailNotification = $objReloaded->strEmailNotification;
			$this->blnAllowOtherFlag = $objReloaded->blnAllowOtherFlag;
			$this->blnAllowMultipleFlag = $objReloaded->blnAllowMultipleFlag;
			$this->intSignupLimit = $objReloaded->intSignupLimit;
			$this->intSignupMaleLimit = $objReloaded->intSignupMaleLimit;
			$this->intSignupFemaleLimit = $objReloaded->intSignupFemaleLimit;
			$this->strFundingAccount = $objReloaded->strFundingAccount;
			$this->DonationStewardshipFundId = $objReloaded->DonationStewardshipFundId;
			$this->dttDateCreated = $objReloaded->dttDateCreated;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = SignupForm::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `signup_form` (
					`id`,
					`signup_form_type_id`,
					`ministry_id`,
					`name`,
					`token`,
					`active_flag`,
					`confidential_flag`,
					`description`,
					`information_url`,
					`support_email`,
					`email_notification`,
					`allow_other_flag`,
					`allow_multiple_flag`,
					`signup_limit`,
					`signup_male_limit`,
					`signup_female_limit`,
					`funding_account`,
					`donation_stewardship_fund_id`,
					`date_created`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intSignupFormTypeId) . ',
					' . $objDatabase->SqlVariable($this->intMinistryId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->strToken) . ',
					' . $objDatabase->SqlVariable($this->blnActiveFlag) . ',
					' . $objDatabase->SqlVariable($this->blnConfidentialFlag) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
					' . $objDatabase->SqlVariable($this->strInformationUrl) . ',
					' . $objDatabase->SqlVariable($this->strSupportEmail) . ',
					' . $objDatabase->SqlVariable($this->strEmailNotification) . ',
					' . $objDatabase->SqlVariable($this->blnAllowOtherFlag) . ',
					' . $objDatabase->SqlVariable($this->blnAllowMultipleFlag) . ',
					' . $objDatabase->SqlVariable($this->intSignupLimit) . ',
					' . $objDatabase->SqlVariable($this->intSignupMaleLimit) . ',
					' . $objDatabase->SqlVariable($this->intSignupFemaleLimit) . ',
					' . $objDatabase->SqlVariable($this->strFundingAccount) . ',
					' . $objDatabase->SqlVariable($this->intDonationStewardshipFundId) . ',
					' . $objDatabase->SqlVariable($this->dttDateCreated) . ',
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
		 * @return SignupForm[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = SignupForm::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM signup_form WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return SignupForm::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return SignupForm[]
		 */
		public function GetJournal() {
			return SignupForm::GetJournalForId($this->intId);
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

				case 'SignupFormTypeId':
					// Gets the value for intSignupFormTypeId (Not Null)
					// @return integer
					return $this->intSignupFormTypeId;

				case 'MinistryId':
					// Gets the value for intMinistryId (Not Null)
					// @return integer
					return $this->intMinistryId;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'Token':
					// Gets the value for strToken (Unique)
					// @return string
					return $this->strToken;

				case 'ActiveFlag':
					// Gets the value for blnActiveFlag 
					// @return boolean
					return $this->blnActiveFlag;

				case 'ConfidentialFlag':
					// Gets the value for blnConfidentialFlag 
					// @return boolean
					return $this->blnConfidentialFlag;

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;

				case 'InformationUrl':
					// Gets the value for strInformationUrl 
					// @return string
					return $this->strInformationUrl;

				case 'SupportEmail':
					// Gets the value for strSupportEmail (Not Null)
					// @return string
					return $this->strSupportEmail;

				case 'EmailNotification':
					// Gets the value for strEmailNotification 
					// @return string
					return $this->strEmailNotification;

				case 'AllowOtherFlag':
					// Gets the value for blnAllowOtherFlag 
					// @return boolean
					return $this->blnAllowOtherFlag;

				case 'AllowMultipleFlag':
					// Gets the value for blnAllowMultipleFlag 
					// @return boolean
					return $this->blnAllowMultipleFlag;

				case 'SignupLimit':
					// Gets the value for intSignupLimit 
					// @return integer
					return $this->intSignupLimit;

				case 'SignupMaleLimit':
					// Gets the value for intSignupMaleLimit 
					// @return integer
					return $this->intSignupMaleLimit;

				case 'SignupFemaleLimit':
					// Gets the value for intSignupFemaleLimit 
					// @return integer
					return $this->intSignupFemaleLimit;

				case 'FundingAccount':
					// Gets the value for strFundingAccount 
					// @return string
					return $this->strFundingAccount;

				case 'DonationStewardshipFundId':
					// Gets the value for intDonationStewardshipFundId 
					// @return integer
					return $this->intDonationStewardshipFundId;

				case 'DateCreated':
					// Gets the value for dttDateCreated (Not Null)
					// @return QDateTime
					return $this->dttDateCreated;


				///////////////////
				// Member Objects
				///////////////////
				case 'Ministry':
					// Gets the value for the Ministry object referenced by intMinistryId (Not Null)
					// @return Ministry
					try {
						if ((!$this->objMinistry) && (!is_null($this->intMinistryId)))
							$this->objMinistry = Ministry::Load($this->intMinistryId);
						return $this->objMinistry;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DonationStewardshipFund':
					// Gets the value for the StewardshipFund object referenced by intDonationStewardshipFundId 
					// @return StewardshipFund
					try {
						if ((!$this->objDonationStewardshipFund) && (!is_null($this->intDonationStewardshipFundId)))
							$this->objDonationStewardshipFund = StewardshipFund::Load($this->intDonationStewardshipFundId);
						return $this->objDonationStewardshipFund;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'ClassMeeting':
					// Gets the value for the ClassMeeting object that uniquely references this SignupForm
					// by objClassMeeting (Unique)
					// @return ClassMeeting
					try {
						if ($this->objClassMeeting === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objClassMeeting)
							$this->objClassMeeting = ClassMeeting::LoadBySignupFormId($this->intId);
						return $this->objClassMeeting;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'EventSignupForm':
					// Gets the value for the EventSignupForm object that uniquely references this SignupForm
					// by objEventSignupForm (Unique)
					// @return EventSignupForm
					try {
						if ($this->objEventSignupForm === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objEventSignupForm)
							$this->objEventSignupForm = EventSignupForm::LoadBySignupFormId($this->intId);
						return $this->objEventSignupForm;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_FormProduct':
					// Gets the value for the private _objFormProduct (Read-Only)
					// if set due to an expansion on the form_product.signup_form_id reverse relationship
					// @return FormProduct
					return $this->_objFormProduct;

				case '_FormProductArray':
					// Gets the value for the private _objFormProductArray (Read-Only)
					// if set due to an ExpandAsArray on the form_product.signup_form_id reverse relationship
					// @return FormProduct[]
					return (array) $this->_objFormProductArray;

				case '_FormQuestion':
					// Gets the value for the private _objFormQuestion (Read-Only)
					// if set due to an expansion on the form_question.signup_form_id reverse relationship
					// @return FormQuestion
					return $this->_objFormQuestion;

				case '_FormQuestionArray':
					// Gets the value for the private _objFormQuestionArray (Read-Only)
					// if set due to an ExpandAsArray on the form_question.signup_form_id reverse relationship
					// @return FormQuestion[]
					return (array) $this->_objFormQuestionArray;

				case '_SignupEntry':
					// Gets the value for the private _objSignupEntry (Read-Only)
					// if set due to an expansion on the signup_entry.signup_form_id reverse relationship
					// @return SignupEntry
					return $this->_objSignupEntry;

				case '_SignupEntryArray':
					// Gets the value for the private _objSignupEntryArray (Read-Only)
					// if set due to an ExpandAsArray on the signup_entry.signup_form_id reverse relationship
					// @return SignupEntry[]
					return (array) $this->_objSignupEntryArray;


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
				case 'SignupFormTypeId':
					// Sets the value for intSignupFormTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intSignupFormTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MinistryId':
					// Sets the value for intMinistryId (Not Null)
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

				case 'Token':
					// Sets the value for strToken (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strToken = QType::Cast($mixValue, QType::String));
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

				case 'ConfidentialFlag':
					// Sets the value for blnConfidentialFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnConfidentialFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Description':
					// Sets the value for strDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'InformationUrl':
					// Sets the value for strInformationUrl 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strInformationUrl = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SupportEmail':
					// Sets the value for strSupportEmail (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strSupportEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmailNotification':
					// Sets the value for strEmailNotification 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEmailNotification = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AllowOtherFlag':
					// Sets the value for blnAllowOtherFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnAllowOtherFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AllowMultipleFlag':
					// Sets the value for blnAllowMultipleFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnAllowMultipleFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SignupLimit':
					// Sets the value for intSignupLimit 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intSignupLimit = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SignupMaleLimit':
					// Sets the value for intSignupMaleLimit 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intSignupMaleLimit = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SignupFemaleLimit':
					// Sets the value for intSignupFemaleLimit 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intSignupFemaleLimit = QType::Cast($mixValue, QType::Integer));
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

				case 'DonationStewardshipFundId':
					// Sets the value for intDonationStewardshipFundId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objDonationStewardshipFund = null;
						return ($this->intDonationStewardshipFundId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateCreated':
					// Sets the value for dttDateCreated (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateCreated = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Ministry':
					// Sets the value for the Ministry object referenced by intMinistryId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved Ministry for this SignupForm');

						// Update Local Member Variables
						$this->objMinistry = $mixValue;
						$this->intMinistryId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'DonationStewardshipFund':
					// Sets the value for the StewardshipFund object referenced by intDonationStewardshipFundId 
					// @param StewardshipFund $mixValue
					// @return StewardshipFund
					if (is_null($mixValue)) {
						$this->intDonationStewardshipFundId = null;
						$this->objDonationStewardshipFund = null;
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
							throw new QCallerException('Unable to set an unsaved DonationStewardshipFund for this SignupForm');

						// Update Local Member Variables
						$this->objDonationStewardshipFund = $mixValue;
						$this->intDonationStewardshipFundId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ClassMeeting':
					// Sets the value for the ClassMeeting object referenced by objClassMeeting (Unique)
					// @param ClassMeeting $mixValue
					// @return ClassMeeting
					if (is_null($mixValue)) {
						$this->objClassMeeting = null;

						// Make sure we update the adjoined ClassMeeting object the next time we call Save()
						$this->blnDirtyClassMeeting = true;

						return null;
					} else {
						// Make sure $mixValue actually is a ClassMeeting object
						try {
							$mixValue = QType::Cast($mixValue, 'ClassMeeting');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objClassMeeting to a DIFFERENT $mixValue?
						if ((!$this->ClassMeeting) || ($this->ClassMeeting->SignupFormId != $mixValue->SignupFormId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined ClassMeeting object the next time we call Save()
							$this->blnDirtyClassMeeting = true;

							// Update Local Member Variable
							$this->objClassMeeting = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'EventSignupForm':
					// Sets the value for the EventSignupForm object referenced by objEventSignupForm (Unique)
					// @param EventSignupForm $mixValue
					// @return EventSignupForm
					if (is_null($mixValue)) {
						$this->objEventSignupForm = null;

						// Make sure we update the adjoined EventSignupForm object the next time we call Save()
						$this->blnDirtyEventSignupForm = true;

						return null;
					} else {
						// Make sure $mixValue actually is a EventSignupForm object
						try {
							$mixValue = QType::Cast($mixValue, 'EventSignupForm');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objEventSignupForm to a DIFFERENT $mixValue?
						if ((!$this->EventSignupForm) || ($this->EventSignupForm->SignupFormId != $mixValue->SignupFormId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined EventSignupForm object the next time we call Save()
							$this->blnDirtyEventSignupForm = true;

							// Update Local Member Variable
							$this->objEventSignupForm = $mixValue;
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

			
		
		// Related Objects' Methods for FormProduct
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FormProducts as an array of FormProduct objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormProduct[]
		*/ 
		public function GetFormProductArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FormProduct::LoadArrayBySignupFormId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FormProducts
		 * @return int
		*/ 
		public function CountFormProducts() {
			if ((is_null($this->intId)))
				return 0;

			return FormProduct::CountBySignupFormId($this->intId);
		}

		/**
		 * Associates a FormProduct
		 * @param FormProduct $objFormProduct
		 * @return void
		*/ 
		public function AssociateFormProduct(FormProduct $objFormProduct) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFormProduct on this unsaved SignupForm.');
			if ((is_null($objFormProduct->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFormProduct on this SignupForm with an unsaved FormProduct.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_product`
				SET
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormProduct->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objFormProduct->SignupFormId = $this->intId;
				$objFormProduct->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a FormProduct
		 * @param FormProduct $objFormProduct
		 * @return void
		*/ 
		public function UnassociateFormProduct(FormProduct $objFormProduct) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormProduct on this unsaved SignupForm.');
			if ((is_null($objFormProduct->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormProduct on this SignupForm with an unsaved FormProduct.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_product`
				SET
					`signup_form_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormProduct->Id) . ' AND
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objFormProduct->SignupFormId = null;
				$objFormProduct->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all FormProducts
		 * @return void
		*/ 
		public function UnassociateAllFormProducts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormProduct on this unsaved SignupForm.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (FormProduct::LoadArrayBySignupFormId($this->intId) as $objFormProduct) {
					$objFormProduct->SignupFormId = null;
					$objFormProduct->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_product`
				SET
					`signup_form_id` = null
				WHERE
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FormProduct
		 * @param FormProduct $objFormProduct
		 * @return void
		*/ 
		public function DeleteAssociatedFormProduct(FormProduct $objFormProduct) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormProduct on this unsaved SignupForm.');
			if ((is_null($objFormProduct->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormProduct on this SignupForm with an unsaved FormProduct.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_product`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormProduct->Id) . ' AND
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objFormProduct->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated FormProducts
		 * @return void
		*/ 
		public function DeleteAllFormProducts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormProduct on this unsaved SignupForm.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (FormProduct::LoadArrayBySignupFormId($this->intId) as $objFormProduct) {
					$objFormProduct->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_product`
				WHERE
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for FormQuestion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FormQuestions as an array of FormQuestion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormQuestion[]
		*/ 
		public function GetFormQuestionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FormQuestion::LoadArrayBySignupFormId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FormQuestions
		 * @return int
		*/ 
		public function CountFormQuestions() {
			if ((is_null($this->intId)))
				return 0;

			return FormQuestion::CountBySignupFormId($this->intId);
		}

		/**
		 * Associates a FormQuestion
		 * @param FormQuestion $objFormQuestion
		 * @return void
		*/ 
		public function AssociateFormQuestion(FormQuestion $objFormQuestion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFormQuestion on this unsaved SignupForm.');
			if ((is_null($objFormQuestion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFormQuestion on this SignupForm with an unsaved FormQuestion.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_question`
				SET
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormQuestion->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objFormQuestion->SignupFormId = $this->intId;
				$objFormQuestion->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a FormQuestion
		 * @param FormQuestion $objFormQuestion
		 * @return void
		*/ 
		public function UnassociateFormQuestion(FormQuestion $objFormQuestion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormQuestion on this unsaved SignupForm.');
			if ((is_null($objFormQuestion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormQuestion on this SignupForm with an unsaved FormQuestion.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_question`
				SET
					`signup_form_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormQuestion->Id) . ' AND
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objFormQuestion->SignupFormId = null;
				$objFormQuestion->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all FormQuestions
		 * @return void
		*/ 
		public function UnassociateAllFormQuestions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormQuestion on this unsaved SignupForm.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (FormQuestion::LoadArrayBySignupFormId($this->intId) as $objFormQuestion) {
					$objFormQuestion->SignupFormId = null;
					$objFormQuestion->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_question`
				SET
					`signup_form_id` = null
				WHERE
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FormQuestion
		 * @param FormQuestion $objFormQuestion
		 * @return void
		*/ 
		public function DeleteAssociatedFormQuestion(FormQuestion $objFormQuestion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormQuestion on this unsaved SignupForm.');
			if ((is_null($objFormQuestion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormQuestion on this SignupForm with an unsaved FormQuestion.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_question`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormQuestion->Id) . ' AND
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objFormQuestion->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated FormQuestions
		 * @return void
		*/ 
		public function DeleteAllFormQuestions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormQuestion on this unsaved SignupForm.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (FormQuestion::LoadArrayBySignupFormId($this->intId) as $objFormQuestion) {
					$objFormQuestion->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_question`
				WHERE
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for SignupEntry
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SignupEntries as an array of SignupEntry objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupEntry[]
		*/ 
		public function GetSignupEntryArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SignupEntry::LoadArrayBySignupFormId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SignupEntries
		 * @return int
		*/ 
		public function CountSignupEntries() {
			if ((is_null($this->intId)))
				return 0;

			return SignupEntry::CountBySignupFormId($this->intId);
		}

		/**
		 * Associates a SignupEntry
		 * @param SignupEntry $objSignupEntry
		 * @return void
		*/ 
		public function AssociateSignupEntry(SignupEntry $objSignupEntry) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSignupEntry on this unsaved SignupForm.');
			if ((is_null($objSignupEntry->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSignupEntry on this SignupForm with an unsaved SignupEntry.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_entry`
				SET
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupEntry->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objSignupEntry->SignupFormId = $this->intId;
				$objSignupEntry->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a SignupEntry
		 * @param SignupEntry $objSignupEntry
		 * @return void
		*/ 
		public function UnassociateSignupEntry(SignupEntry $objSignupEntry) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupEntry on this unsaved SignupForm.');
			if ((is_null($objSignupEntry->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupEntry on this SignupForm with an unsaved SignupEntry.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_entry`
				SET
					`signup_form_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupEntry->Id) . ' AND
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSignupEntry->SignupFormId = null;
				$objSignupEntry->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all SignupEntries
		 * @return void
		*/ 
		public function UnassociateAllSignupEntries() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupEntry on this unsaved SignupForm.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SignupEntry::LoadArrayBySignupFormId($this->intId) as $objSignupEntry) {
					$objSignupEntry->SignupFormId = null;
					$objSignupEntry->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_entry`
				SET
					`signup_form_id` = null
				WHERE
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated SignupEntry
		 * @param SignupEntry $objSignupEntry
		 * @return void
		*/ 
		public function DeleteAssociatedSignupEntry(SignupEntry $objSignupEntry) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupEntry on this unsaved SignupForm.');
			if ((is_null($objSignupEntry->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupEntry on this SignupForm with an unsaved SignupEntry.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_entry`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupEntry->Id) . ' AND
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSignupEntry->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated SignupEntries
		 * @return void
		*/ 
		public function DeleteAllSignupEntries() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupEntry on this unsaved SignupForm.');

			// Get the Database Object for this Class
			$objDatabase = SignupForm::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SignupEntry::LoadArrayBySignupFormId($this->intId) as $objSignupEntry) {
					$objSignupEntry->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_entry`
				WHERE
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="SignupForm"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="SignupFormTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Ministry" type="xsd1:Ministry"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Token" type="xsd:string"/>';
			$strToReturn .= '<element name="ActiveFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ConfidentialFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="InformationUrl" type="xsd:string"/>';
			$strToReturn .= '<element name="SupportEmail" type="xsd:string"/>';
			$strToReturn .= '<element name="EmailNotification" type="xsd:string"/>';
			$strToReturn .= '<element name="AllowOtherFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="AllowMultipleFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="SignupLimit" type="xsd:int"/>';
			$strToReturn .= '<element name="SignupMaleLimit" type="xsd:int"/>';
			$strToReturn .= '<element name="SignupFemaleLimit" type="xsd:int"/>';
			$strToReturn .= '<element name="FundingAccount" type="xsd:string"/>';
			$strToReturn .= '<element name="DonationStewardshipFund" type="xsd1:StewardshipFund"/>';
			$strToReturn .= '<element name="DateCreated" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SignupForm', $strComplexTypeArray)) {
				$strComplexTypeArray['SignupForm'] = SignupForm::GetSoapComplexTypeXml();
				Ministry::AlterSoapComplexTypeArray($strComplexTypeArray);
				StewardshipFund::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SignupForm::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SignupForm();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'SignupFormTypeId'))
				$objToReturn->intSignupFormTypeId = $objSoapObject->SignupFormTypeId;
			if ((property_exists($objSoapObject, 'Ministry')) &&
				($objSoapObject->Ministry))
				$objToReturn->Ministry = Ministry::GetObjectFromSoapObject($objSoapObject->Ministry);
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Token'))
				$objToReturn->strToken = $objSoapObject->Token;
			if (property_exists($objSoapObject, 'ActiveFlag'))
				$objToReturn->blnActiveFlag = $objSoapObject->ActiveFlag;
			if (property_exists($objSoapObject, 'ConfidentialFlag'))
				$objToReturn->blnConfidentialFlag = $objSoapObject->ConfidentialFlag;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'InformationUrl'))
				$objToReturn->strInformationUrl = $objSoapObject->InformationUrl;
			if (property_exists($objSoapObject, 'SupportEmail'))
				$objToReturn->strSupportEmail = $objSoapObject->SupportEmail;
			if (property_exists($objSoapObject, 'EmailNotification'))
				$objToReturn->strEmailNotification = $objSoapObject->EmailNotification;
			if (property_exists($objSoapObject, 'AllowOtherFlag'))
				$objToReturn->blnAllowOtherFlag = $objSoapObject->AllowOtherFlag;
			if (property_exists($objSoapObject, 'AllowMultipleFlag'))
				$objToReturn->blnAllowMultipleFlag = $objSoapObject->AllowMultipleFlag;
			if (property_exists($objSoapObject, 'SignupLimit'))
				$objToReturn->intSignupLimit = $objSoapObject->SignupLimit;
			if (property_exists($objSoapObject, 'SignupMaleLimit'))
				$objToReturn->intSignupMaleLimit = $objSoapObject->SignupMaleLimit;
			if (property_exists($objSoapObject, 'SignupFemaleLimit'))
				$objToReturn->intSignupFemaleLimit = $objSoapObject->SignupFemaleLimit;
			if (property_exists($objSoapObject, 'FundingAccount'))
				$objToReturn->strFundingAccount = $objSoapObject->FundingAccount;
			if ((property_exists($objSoapObject, 'DonationStewardshipFund')) &&
				($objSoapObject->DonationStewardshipFund))
				$objToReturn->DonationStewardshipFund = StewardshipFund::GetObjectFromSoapObject($objSoapObject->DonationStewardshipFund);
			if (property_exists($objSoapObject, 'DateCreated'))
				$objToReturn->dttDateCreated = new QDateTime($objSoapObject->DateCreated);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SignupForm::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objMinistry)
				$objObject->objMinistry = Ministry::GetSoapObjectFromObject($objObject->objMinistry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intMinistryId = null;
			if ($objObject->objDonationStewardshipFund)
				$objObject->objDonationStewardshipFund = StewardshipFund::GetSoapObjectFromObject($objObject->objDonationStewardshipFund, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDonationStewardshipFundId = null;
			if ($objObject->dttDateCreated)
				$objObject->dttDateCreated = $objObject->dttDateCreated->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $SignupFormTypeId
	 * @property-read QQNode $MinistryId
	 * @property-read QQNodeMinistry $Ministry
	 * @property-read QQNode $Name
	 * @property-read QQNode $Token
	 * @property-read QQNode $ActiveFlag
	 * @property-read QQNode $ConfidentialFlag
	 * @property-read QQNode $Description
	 * @property-read QQNode $InformationUrl
	 * @property-read QQNode $SupportEmail
	 * @property-read QQNode $EmailNotification
	 * @property-read QQNode $AllowOtherFlag
	 * @property-read QQNode $AllowMultipleFlag
	 * @property-read QQNode $SignupLimit
	 * @property-read QQNode $SignupMaleLimit
	 * @property-read QQNode $SignupFemaleLimit
	 * @property-read QQNode $FundingAccount
	 * @property-read QQNode $DonationStewardshipFundId
	 * @property-read QQNodeStewardshipFund $DonationStewardshipFund
	 * @property-read QQNode $DateCreated
	 * @property-read QQReverseReferenceNodeClassMeeting $ClassMeeting
	 * @property-read QQReverseReferenceNodeEventSignupForm $EventSignupForm
	 * @property-read QQReverseReferenceNodeFormProduct $FormProduct
	 * @property-read QQReverseReferenceNodeFormQuestion $FormQuestion
	 * @property-read QQReverseReferenceNodeSignupEntry $SignupEntry
	 */
	class QQNodeSignupForm extends QQNode {
		protected $strTableName = 'signup_form';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'SignupForm';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupFormTypeId':
					return new QQNode('signup_form_type_id', 'SignupFormTypeId', 'integer', $this);
				case 'MinistryId':
					return new QQNode('ministry_id', 'MinistryId', 'integer', $this);
				case 'Ministry':
					return new QQNodeMinistry('ministry_id', 'Ministry', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'ConfidentialFlag':
					return new QQNode('confidential_flag', 'ConfidentialFlag', 'boolean', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'InformationUrl':
					return new QQNode('information_url', 'InformationUrl', 'string', $this);
				case 'SupportEmail':
					return new QQNode('support_email', 'SupportEmail', 'string', $this);
				case 'EmailNotification':
					return new QQNode('email_notification', 'EmailNotification', 'string', $this);
				case 'AllowOtherFlag':
					return new QQNode('allow_other_flag', 'AllowOtherFlag', 'boolean', $this);
				case 'AllowMultipleFlag':
					return new QQNode('allow_multiple_flag', 'AllowMultipleFlag', 'boolean', $this);
				case 'SignupLimit':
					return new QQNode('signup_limit', 'SignupLimit', 'integer', $this);
				case 'SignupMaleLimit':
					return new QQNode('signup_male_limit', 'SignupMaleLimit', 'integer', $this);
				case 'SignupFemaleLimit':
					return new QQNode('signup_female_limit', 'SignupFemaleLimit', 'integer', $this);
				case 'FundingAccount':
					return new QQNode('funding_account', 'FundingAccount', 'string', $this);
				case 'DonationStewardshipFundId':
					return new QQNode('donation_stewardship_fund_id', 'DonationStewardshipFundId', 'integer', $this);
				case 'DonationStewardshipFund':
					return new QQNodeStewardshipFund('donation_stewardship_fund_id', 'DonationStewardshipFund', 'integer', $this);
				case 'DateCreated':
					return new QQNode('date_created', 'DateCreated', 'QDateTime', $this);
				case 'ClassMeeting':
					return new QQReverseReferenceNodeClassMeeting($this, 'classmeeting', 'reverse_reference', 'signup_form_id', 'ClassMeeting');
				case 'EventSignupForm':
					return new QQReverseReferenceNodeEventSignupForm($this, 'eventsignupform', 'reverse_reference', 'signup_form_id', 'EventSignupForm');
				case 'FormProduct':
					return new QQReverseReferenceNodeFormProduct($this, 'formproduct', 'reverse_reference', 'signup_form_id');
				case 'FormQuestion':
					return new QQReverseReferenceNodeFormQuestion($this, 'formquestion', 'reverse_reference', 'signup_form_id');
				case 'SignupEntry':
					return new QQReverseReferenceNodeSignupEntry($this, 'signupentry', 'reverse_reference', 'signup_form_id');

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
	 * @property-read QQNode $SignupFormTypeId
	 * @property-read QQNode $MinistryId
	 * @property-read QQNodeMinistry $Ministry
	 * @property-read QQNode $Name
	 * @property-read QQNode $Token
	 * @property-read QQNode $ActiveFlag
	 * @property-read QQNode $ConfidentialFlag
	 * @property-read QQNode $Description
	 * @property-read QQNode $InformationUrl
	 * @property-read QQNode $SupportEmail
	 * @property-read QQNode $EmailNotification
	 * @property-read QQNode $AllowOtherFlag
	 * @property-read QQNode $AllowMultipleFlag
	 * @property-read QQNode $SignupLimit
	 * @property-read QQNode $SignupMaleLimit
	 * @property-read QQNode $SignupFemaleLimit
	 * @property-read QQNode $FundingAccount
	 * @property-read QQNode $DonationStewardshipFundId
	 * @property-read QQNodeStewardshipFund $DonationStewardshipFund
	 * @property-read QQNode $DateCreated
	 * @property-read QQReverseReferenceNodeClassMeeting $ClassMeeting
	 * @property-read QQReverseReferenceNodeEventSignupForm $EventSignupForm
	 * @property-read QQReverseReferenceNodeFormProduct $FormProduct
	 * @property-read QQReverseReferenceNodeFormQuestion $FormQuestion
	 * @property-read QQReverseReferenceNodeSignupEntry $SignupEntry
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeSignupForm extends QQReverseReferenceNode {
		protected $strTableName = 'signup_form';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'SignupForm';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupFormTypeId':
					return new QQNode('signup_form_type_id', 'SignupFormTypeId', 'integer', $this);
				case 'MinistryId':
					return new QQNode('ministry_id', 'MinistryId', 'integer', $this);
				case 'Ministry':
					return new QQNodeMinistry('ministry_id', 'Ministry', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Token':
					return new QQNode('token', 'Token', 'string', $this);
				case 'ActiveFlag':
					return new QQNode('active_flag', 'ActiveFlag', 'boolean', $this);
				case 'ConfidentialFlag':
					return new QQNode('confidential_flag', 'ConfidentialFlag', 'boolean', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'InformationUrl':
					return new QQNode('information_url', 'InformationUrl', 'string', $this);
				case 'SupportEmail':
					return new QQNode('support_email', 'SupportEmail', 'string', $this);
				case 'EmailNotification':
					return new QQNode('email_notification', 'EmailNotification', 'string', $this);
				case 'AllowOtherFlag':
					return new QQNode('allow_other_flag', 'AllowOtherFlag', 'boolean', $this);
				case 'AllowMultipleFlag':
					return new QQNode('allow_multiple_flag', 'AllowMultipleFlag', 'boolean', $this);
				case 'SignupLimit':
					return new QQNode('signup_limit', 'SignupLimit', 'integer', $this);
				case 'SignupMaleLimit':
					return new QQNode('signup_male_limit', 'SignupMaleLimit', 'integer', $this);
				case 'SignupFemaleLimit':
					return new QQNode('signup_female_limit', 'SignupFemaleLimit', 'integer', $this);
				case 'FundingAccount':
					return new QQNode('funding_account', 'FundingAccount', 'string', $this);
				case 'DonationStewardshipFundId':
					return new QQNode('donation_stewardship_fund_id', 'DonationStewardshipFundId', 'integer', $this);
				case 'DonationStewardshipFund':
					return new QQNodeStewardshipFund('donation_stewardship_fund_id', 'DonationStewardshipFund', 'integer', $this);
				case 'DateCreated':
					return new QQNode('date_created', 'DateCreated', 'QDateTime', $this);
				case 'ClassMeeting':
					return new QQReverseReferenceNodeClassMeeting($this, 'classmeeting', 'reverse_reference', 'signup_form_id', 'ClassMeeting');
				case 'EventSignupForm':
					return new QQReverseReferenceNodeEventSignupForm($this, 'eventsignupform', 'reverse_reference', 'signup_form_id', 'EventSignupForm');
				case 'FormProduct':
					return new QQReverseReferenceNodeFormProduct($this, 'formproduct', 'reverse_reference', 'signup_form_id');
				case 'FormQuestion':
					return new QQReverseReferenceNodeFormQuestion($this, 'formquestion', 'reverse_reference', 'signup_form_id');
				case 'SignupEntry':
					return new QQReverseReferenceNodeSignupEntry($this, 'signupentry', 'reverse_reference', 'signup_form_id');

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