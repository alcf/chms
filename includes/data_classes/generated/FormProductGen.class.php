<?php
	/**
	 * The abstract FormProductGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FormProduct subclass which
	 * extends this FormProductGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FormProduct class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $SignupFormId the value for intSignupFormId (Not Null)
	 * @property integer $OrderNumber the value for intOrderNumber 
	 * @property integer $FormProductTypeId the value for intFormProductTypeId (Not Null)
	 * @property integer $FormPaymentTypeId the value for intFormPaymentTypeId (Not Null)
	 * @property integer $StewardshipFundId the value for intStewardshipFundId 
	 * @property string $Name the value for strName 
	 * @property string $Description the value for strDescription 
	 * @property QDateTime $DateStart the value for dttDateStart 
	 * @property QDateTime $DateEnd the value for dttDateEnd 
	 * @property integer $MinimumQuantity the value for intMinimumQuantity 
	 * @property integer $MaximumQuantity the value for intMaximumQuantity 
	 * @property double $Cost the value for fltCost 
	 * @property double $Deposit the value for fltDeposit 
	 * @property boolean $ViewFlag the value for blnViewFlag 
	 * @property SignupForm $SignupForm the value for the SignupForm object referenced by intSignupFormId (Not Null)
	 * @property StewardshipFund $StewardshipFund the value for the StewardshipFund object referenced by intStewardshipFundId 
	 * @property SignupProduct $_SignupProduct the value for the private _objSignupProduct (Read-Only) if set due to an expansion on the signup_product.form_product_id reverse relationship
	 * @property SignupProduct[] $_SignupProductArray the value for the private _objSignupProductArray (Read-Only) if set due to an ExpandAsArray on the signup_product.form_product_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FormProductGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column form_product.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.signup_form_id
		 * @var integer intSignupFormId
		 */
		protected $intSignupFormId;
		const SignupFormIdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.order_number
		 * @var integer intOrderNumber
		 */
		protected $intOrderNumber;
		const OrderNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.form_product_type_id
		 * @var integer intFormProductTypeId
		 */
		protected $intFormProductTypeId;
		const FormProductTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.form_payment_type_id
		 * @var integer intFormPaymentTypeId
		 */
		protected $intFormPaymentTypeId;
		const FormPaymentTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.stewardship_fund_id
		 * @var integer intStewardshipFundId
		 */
		protected $intStewardshipFundId;
		const StewardshipFundIdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 40;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 255;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.date_start
		 * @var QDateTime dttDateStart
		 */
		protected $dttDateStart;
		const DateStartDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.date_end
		 * @var QDateTime dttDateEnd
		 */
		protected $dttDateEnd;
		const DateEndDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.minimum_quantity
		 * @var integer intMinimumQuantity
		 */
		protected $intMinimumQuantity;
		const MinimumQuantityDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.maximum_quantity
		 * @var integer intMaximumQuantity
		 */
		protected $intMaximumQuantity;
		const MaximumQuantityDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.cost
		 * @var double fltCost
		 */
		protected $fltCost;
		const CostDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.deposit
		 * @var double fltDeposit
		 */
		protected $fltDeposit;
		const DepositDefault = null;


		/**
		 * Protected member variable that maps to the database column form_product.view_flag
		 * @var boolean blnViewFlag
		 */
		protected $blnViewFlag;
		const ViewFlagDefault = null;


		/**
		 * Private member variable that stores a reference to a single SignupProduct object
		 * (of type SignupProduct), if this FormProduct object was restored with
		 * an expansion on the signup_product association table.
		 * @var SignupProduct _objSignupProduct;
		 */
		private $_objSignupProduct;

		/**
		 * Private member variable that stores a reference to an array of SignupProduct objects
		 * (of type SignupProduct[]), if this FormProduct object was restored with
		 * an ExpandAsArray on the signup_product association table.
		 * @var SignupProduct[] _objSignupProductArray;
		 */
		private $_objSignupProductArray = array();

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
		 * in the database column form_product.signup_form_id.
		 *
		 * NOTE: Always use the SignupForm property getter to correctly retrieve this SignupForm object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SignupForm objSignupForm
		 */
		protected $objSignupForm;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column form_product.stewardship_fund_id.
		 *
		 * NOTE: Always use the StewardshipFund property getter to correctly retrieve this StewardshipFund object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipFund objStewardshipFund
		 */
		protected $objStewardshipFund;





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
		 * Load a FormProduct from PK Info
		 * @param integer $intId
		 * @return FormProduct
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return FormProduct::QuerySingle(
				QQ::Equal(QQN::FormProduct()->Id, $intId)
			);
		}

		/**
		 * Load all FormProducts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormProduct[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call FormProduct::QueryArray to perform the LoadAll query
			try {
				return FormProduct::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FormProducts
		 * @return int
		 */
		public static function CountAll() {
			// Call FormProduct::QueryCount to perform the CountAll query
			return FormProduct::QueryCount(QQ::All());
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
			$objDatabase = FormProduct::GetDatabase();

			// Create/Build out the QueryBuilder object with FormProduct-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'form_product');
			FormProduct::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('form_product');

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
		 * Static Qcodo Query method to query for a single FormProduct object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FormProduct the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormProduct::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new FormProduct object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FormProduct::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return FormProduct::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of FormProduct objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FormProduct[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormProduct::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FormProduct::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FormProduct::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of FormProduct objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormProduct::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FormProduct::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'form_product_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with FormProduct-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				FormProduct::GetSelectFields($objQueryBuilder);
				FormProduct::GetFromFields($objQueryBuilder);

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
			return FormProduct::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FormProduct
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'form_product';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'signup_form_id', $strAliasPrefix . 'signup_form_id');
			$objBuilder->AddSelectItem($strTableName, 'order_number', $strAliasPrefix . 'order_number');
			$objBuilder->AddSelectItem($strTableName, 'form_product_type_id', $strAliasPrefix . 'form_product_type_id');
			$objBuilder->AddSelectItem($strTableName, 'form_payment_type_id', $strAliasPrefix . 'form_payment_type_id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_fund_id', $strAliasPrefix . 'stewardship_fund_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'date_start', $strAliasPrefix . 'date_start');
			$objBuilder->AddSelectItem($strTableName, 'date_end', $strAliasPrefix . 'date_end');
			$objBuilder->AddSelectItem($strTableName, 'minimum_quantity', $strAliasPrefix . 'minimum_quantity');
			$objBuilder->AddSelectItem($strTableName, 'maximum_quantity', $strAliasPrefix . 'maximum_quantity');
			$objBuilder->AddSelectItem($strTableName, 'cost', $strAliasPrefix . 'cost');
			$objBuilder->AddSelectItem($strTableName, 'deposit', $strAliasPrefix . 'deposit');
			$objBuilder->AddSelectItem($strTableName, 'view_flag', $strAliasPrefix . 'view_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a FormProduct from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FormProduct::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return FormProduct
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
					$strAliasPrefix = 'form_product__';


				$strAlias = $strAliasPrefix . 'signupproduct__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objSignupProductArray)) {
						$objPreviousChildItem = $objPreviousItem->_objSignupProductArray[$intPreviousChildItemCount - 1];
						$objChildItem = SignupProduct::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupproduct__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objSignupProductArray[] = $objChildItem;
					} else
						$objPreviousItem->_objSignupProductArray[] = SignupProduct::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupproduct__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'form_product__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the FormProduct object
			$objToReturn = new FormProduct();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'signup_form_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_form_id'] : $strAliasPrefix . 'signup_form_id';
			$objToReturn->intSignupFormId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'order_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'order_number'] : $strAliasPrefix . 'order_number';
			$objToReturn->intOrderNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'form_product_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'form_product_type_id'] : $strAliasPrefix . 'form_product_type_id';
			$objToReturn->intFormProductTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'form_payment_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'form_payment_type_id'] : $strAliasPrefix . 'form_payment_type_id';
			$objToReturn->intFormPaymentTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_fund_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_fund_id'] : $strAliasPrefix . 'stewardship_fund_id';
			$objToReturn->intStewardshipFundId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_start', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_start'] : $strAliasPrefix . 'date_start';
			$objToReturn->dttDateStart = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_end', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_end'] : $strAliasPrefix . 'date_end';
			$objToReturn->dttDateEnd = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'minimum_quantity', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'minimum_quantity'] : $strAliasPrefix . 'minimum_quantity';
			$objToReturn->intMinimumQuantity = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'maximum_quantity', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'maximum_quantity'] : $strAliasPrefix . 'maximum_quantity';
			$objToReturn->intMaximumQuantity = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'cost', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cost'] : $strAliasPrefix . 'cost';
			$objToReturn->fltCost = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'deposit', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'deposit'] : $strAliasPrefix . 'deposit';
			$objToReturn->fltDeposit = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'view_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'view_flag'] : $strAliasPrefix . 'view_flag';
			$objToReturn->blnViewFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'form_product__';

			// Check for SignupForm Early Binding
			$strAlias = $strAliasPrefix . 'signup_form_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSignupForm = SignupForm::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signup_form_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StewardshipFund Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_fund_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipFund = StewardshipFund::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_fund_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for SignupProduct Virtual Binding
			$strAlias = $strAliasPrefix . 'signupproduct__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objSignupProductArray[] = SignupProduct::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupproduct__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objSignupProduct = SignupProduct::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signupproduct__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of FormProducts from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return FormProduct[]
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
					$objItem = FormProduct::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FormProduct::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single FormProduct object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FormProduct next row resulting from the query
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
			return FormProduct::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single FormProduct object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return FormProduct
		*/
		public static function LoadById($intId) {
			return FormProduct::QuerySingle(
				QQ::Equal(QQN::FormProduct()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of FormProduct objects,
		 * by SignupFormId, FormProductTypeId Index(es)
		 * @param integer $intSignupFormId
		 * @param integer $intFormProductTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormProduct[]
		*/
		public static function LoadArrayBySignupFormIdFormProductTypeId($intSignupFormId, $intFormProductTypeId, $objOptionalClauses = null) {
			// Call FormProduct::QueryArray to perform the LoadArrayBySignupFormIdFormProductTypeId query
			try {
				return FormProduct::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::FormProduct()->SignupFormId, $intSignupFormId),
					QQ::Equal(QQN::FormProduct()->FormProductTypeId, $intFormProductTypeId)
					),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormProducts
		 * by SignupFormId, FormProductTypeId Index(es)
		 * @param integer $intSignupFormId
		 * @param integer $intFormProductTypeId
		 * @return int
		*/
		public static function CountBySignupFormIdFormProductTypeId($intSignupFormId, $intFormProductTypeId) {
			// Call FormProduct::QueryCount to perform the CountBySignupFormIdFormProductTypeId query
			return FormProduct::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::FormProduct()->SignupFormId, $intSignupFormId),
				QQ::Equal(QQN::FormProduct()->FormProductTypeId, $intFormProductTypeId)
				)
			);
		}
			
		/**
		 * Load an array of FormProduct objects,
		 * by SignupFormId Index(es)
		 * @param integer $intSignupFormId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormProduct[]
		*/
		public static function LoadArrayBySignupFormId($intSignupFormId, $objOptionalClauses = null) {
			// Call FormProduct::QueryArray to perform the LoadArrayBySignupFormId query
			try {
				return FormProduct::QueryArray(
					QQ::Equal(QQN::FormProduct()->SignupFormId, $intSignupFormId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormProducts
		 * by SignupFormId Index(es)
		 * @param integer $intSignupFormId
		 * @return int
		*/
		public static function CountBySignupFormId($intSignupFormId) {
			// Call FormProduct::QueryCount to perform the CountBySignupFormId query
			return FormProduct::QueryCount(
				QQ::Equal(QQN::FormProduct()->SignupFormId, $intSignupFormId)
			);
		}
			
		/**
		 * Load an array of FormProduct objects,
		 * by FormProductTypeId Index(es)
		 * @param integer $intFormProductTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormProduct[]
		*/
		public static function LoadArrayByFormProductTypeId($intFormProductTypeId, $objOptionalClauses = null) {
			// Call FormProduct::QueryArray to perform the LoadArrayByFormProductTypeId query
			try {
				return FormProduct::QueryArray(
					QQ::Equal(QQN::FormProduct()->FormProductTypeId, $intFormProductTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormProducts
		 * by FormProductTypeId Index(es)
		 * @param integer $intFormProductTypeId
		 * @return int
		*/
		public static function CountByFormProductTypeId($intFormProductTypeId) {
			// Call FormProduct::QueryCount to perform the CountByFormProductTypeId query
			return FormProduct::QueryCount(
				QQ::Equal(QQN::FormProduct()->FormProductTypeId, $intFormProductTypeId)
			);
		}
			
		/**
		 * Load an array of FormProduct objects,
		 * by FormPaymentTypeId Index(es)
		 * @param integer $intFormPaymentTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormProduct[]
		*/
		public static function LoadArrayByFormPaymentTypeId($intFormPaymentTypeId, $objOptionalClauses = null) {
			// Call FormProduct::QueryArray to perform the LoadArrayByFormPaymentTypeId query
			try {
				return FormProduct::QueryArray(
					QQ::Equal(QQN::FormProduct()->FormPaymentTypeId, $intFormPaymentTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormProducts
		 * by FormPaymentTypeId Index(es)
		 * @param integer $intFormPaymentTypeId
		 * @return int
		*/
		public static function CountByFormPaymentTypeId($intFormPaymentTypeId) {
			// Call FormProduct::QueryCount to perform the CountByFormPaymentTypeId query
			return FormProduct::QueryCount(
				QQ::Equal(QQN::FormProduct()->FormPaymentTypeId, $intFormPaymentTypeId)
			);
		}
			
		/**
		 * Load an array of FormProduct objects,
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormProduct[]
		*/
		public static function LoadArrayByStewardshipFundId($intStewardshipFundId, $objOptionalClauses = null) {
			// Call FormProduct::QueryArray to perform the LoadArrayByStewardshipFundId query
			try {
				return FormProduct::QueryArray(
					QQ::Equal(QQN::FormProduct()->StewardshipFundId, $intStewardshipFundId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormProducts
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @return int
		*/
		public static function CountByStewardshipFundId($intStewardshipFundId) {
			// Call FormProduct::QueryCount to perform the CountByStewardshipFundId query
			return FormProduct::QueryCount(
				QQ::Equal(QQN::FormProduct()->StewardshipFundId, $intStewardshipFundId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this FormProduct
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FormProduct::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `form_product` (
							`signup_form_id`,
							`order_number`,
							`form_product_type_id`,
							`form_payment_type_id`,
							`stewardship_fund_id`,
							`name`,
							`description`,
							`date_start`,
							`date_end`,
							`minimum_quantity`,
							`maximum_quantity`,
							`cost`,
							`deposit`,
							`view_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
							' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							' . $objDatabase->SqlVariable($this->intFormProductTypeId) . ',
							' . $objDatabase->SqlVariable($this->intFormPaymentTypeId) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->dttDateStart) . ',
							' . $objDatabase->SqlVariable($this->dttDateEnd) . ',
							' . $objDatabase->SqlVariable($this->intMinimumQuantity) . ',
							' . $objDatabase->SqlVariable($this->intMaximumQuantity) . ',
							' . $objDatabase->SqlVariable($this->fltCost) . ',
							' . $objDatabase->SqlVariable($this->fltDeposit) . ',
							' . $objDatabase->SqlVariable($this->blnViewFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('form_product', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`form_product`
						SET
							`signup_form_id` = ' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
							`order_number` = ' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							`form_product_type_id` = ' . $objDatabase->SqlVariable($this->intFormProductTypeId) . ',
							`form_payment_type_id` = ' . $objDatabase->SqlVariable($this->intFormPaymentTypeId) . ',
							`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`date_start` = ' . $objDatabase->SqlVariable($this->dttDateStart) . ',
							`date_end` = ' . $objDatabase->SqlVariable($this->dttDateEnd) . ',
							`minimum_quantity` = ' . $objDatabase->SqlVariable($this->intMinimumQuantity) . ',
							`maximum_quantity` = ' . $objDatabase->SqlVariable($this->intMaximumQuantity) . ',
							`cost` = ' . $objDatabase->SqlVariable($this->fltCost) . ',
							`deposit` = ' . $objDatabase->SqlVariable($this->fltDeposit) . ',
							`view_flag` = ' . $objDatabase->SqlVariable($this->blnViewFlag) . '
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
		 * Delete this FormProduct
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FormProduct with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FormProduct::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_product`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all FormProducts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FormProduct::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_product`');
		}

		/**
		 * Truncate form_product table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FormProduct::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `form_product`');
		}

		/**
		 * Reload this FormProduct from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FormProduct object.');

			// Reload the Object
			$objReloaded = FormProduct::Load($this->intId);

			// Update $this's local variables to match
			$this->SignupFormId = $objReloaded->SignupFormId;
			$this->intOrderNumber = $objReloaded->intOrderNumber;
			$this->FormProductTypeId = $objReloaded->FormProductTypeId;
			$this->FormPaymentTypeId = $objReloaded->FormPaymentTypeId;
			$this->StewardshipFundId = $objReloaded->StewardshipFundId;
			$this->strName = $objReloaded->strName;
			$this->strDescription = $objReloaded->strDescription;
			$this->dttDateStart = $objReloaded->dttDateStart;
			$this->dttDateEnd = $objReloaded->dttDateEnd;
			$this->intMinimumQuantity = $objReloaded->intMinimumQuantity;
			$this->intMaximumQuantity = $objReloaded->intMaximumQuantity;
			$this->fltCost = $objReloaded->fltCost;
			$this->fltDeposit = $objReloaded->fltDeposit;
			$this->blnViewFlag = $objReloaded->blnViewFlag;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = FormProduct::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `form_product` (
					`id`,
					`signup_form_id`,
					`order_number`,
					`form_product_type_id`,
					`form_payment_type_id`,
					`stewardship_fund_id`,
					`name`,
					`description`,
					`date_start`,
					`date_end`,
					`minimum_quantity`,
					`maximum_quantity`,
					`cost`,
					`deposit`,
					`view_flag`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
					' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
					' . $objDatabase->SqlVariable($this->intFormProductTypeId) . ',
					' . $objDatabase->SqlVariable($this->intFormPaymentTypeId) . ',
					' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
					' . $objDatabase->SqlVariable($this->dttDateStart) . ',
					' . $objDatabase->SqlVariable($this->dttDateEnd) . ',
					' . $objDatabase->SqlVariable($this->intMinimumQuantity) . ',
					' . $objDatabase->SqlVariable($this->intMaximumQuantity) . ',
					' . $objDatabase->SqlVariable($this->fltCost) . ',
					' . $objDatabase->SqlVariable($this->fltDeposit) . ',
					' . $objDatabase->SqlVariable($this->blnViewFlag) . ',
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
		 * @return FormProduct[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = FormProduct::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM form_product WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return FormProduct::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return FormProduct[]
		 */
		public function GetJournal() {
			return FormProduct::GetJournalForId($this->intId);
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

				case 'SignupFormId':
					// Gets the value for intSignupFormId (Not Null)
					// @return integer
					return $this->intSignupFormId;

				case 'OrderNumber':
					// Gets the value for intOrderNumber 
					// @return integer
					return $this->intOrderNumber;

				case 'FormProductTypeId':
					// Gets the value for intFormProductTypeId (Not Null)
					// @return integer
					return $this->intFormProductTypeId;

				case 'FormPaymentTypeId':
					// Gets the value for intFormPaymentTypeId (Not Null)
					// @return integer
					return $this->intFormPaymentTypeId;

				case 'StewardshipFundId':
					// Gets the value for intStewardshipFundId 
					// @return integer
					return $this->intStewardshipFundId;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;

				case 'DateStart':
					// Gets the value for dttDateStart 
					// @return QDateTime
					return $this->dttDateStart;

				case 'DateEnd':
					// Gets the value for dttDateEnd 
					// @return QDateTime
					return $this->dttDateEnd;

				case 'MinimumQuantity':
					// Gets the value for intMinimumQuantity 
					// @return integer
					return $this->intMinimumQuantity;

				case 'MaximumQuantity':
					// Gets the value for intMaximumQuantity 
					// @return integer
					return $this->intMaximumQuantity;

				case 'Cost':
					// Gets the value for fltCost 
					// @return double
					return $this->fltCost;

				case 'Deposit':
					// Gets the value for fltDeposit 
					// @return double
					return $this->fltDeposit;

				case 'ViewFlag':
					// Gets the value for blnViewFlag 
					// @return boolean
					return $this->blnViewFlag;


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupForm':
					// Gets the value for the SignupForm object referenced by intSignupFormId (Not Null)
					// @return SignupForm
					try {
						if ((!$this->objSignupForm) && (!is_null($this->intSignupFormId)))
							$this->objSignupForm = SignupForm::Load($this->intSignupFormId);
						return $this->objSignupForm;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipFund':
					// Gets the value for the StewardshipFund object referenced by intStewardshipFundId 
					// @return StewardshipFund
					try {
						if ((!$this->objStewardshipFund) && (!is_null($this->intStewardshipFundId)))
							$this->objStewardshipFund = StewardshipFund::Load($this->intStewardshipFundId);
						return $this->objStewardshipFund;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_SignupProduct':
					// Gets the value for the private _objSignupProduct (Read-Only)
					// if set due to an expansion on the signup_product.form_product_id reverse relationship
					// @return SignupProduct
					return $this->_objSignupProduct;

				case '_SignupProductArray':
					// Gets the value for the private _objSignupProductArray (Read-Only)
					// if set due to an ExpandAsArray on the signup_product.form_product_id reverse relationship
					// @return SignupProduct[]
					return (array) $this->_objSignupProductArray;


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
				case 'SignupFormId':
					// Sets the value for intSignupFormId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSignupForm = null;
						return ($this->intSignupFormId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrderNumber':
					// Sets the value for intOrderNumber 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intOrderNumber = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormProductTypeId':
					// Sets the value for intFormProductTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intFormProductTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormPaymentTypeId':
					// Sets the value for intFormPaymentTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intFormPaymentTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipFundId':
					// Sets the value for intStewardshipFundId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipFund = null;
						return ($this->intStewardshipFundId = QType::Cast($mixValue, QType::Integer));
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

				case 'DateStart':
					// Sets the value for dttDateStart 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateStart = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateEnd':
					// Sets the value for dttDateEnd 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateEnd = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MinimumQuantity':
					// Sets the value for intMinimumQuantity 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intMinimumQuantity = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MaximumQuantity':
					// Sets the value for intMaximumQuantity 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intMaximumQuantity = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cost':
					// Sets the value for fltCost 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltCost = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Deposit':
					// Sets the value for fltDeposit 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltDeposit = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ViewFlag':
					// Sets the value for blnViewFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnViewFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupForm':
					// Sets the value for the SignupForm object referenced by intSignupFormId (Not Null)
					// @param SignupForm $mixValue
					// @return SignupForm
					if (is_null($mixValue)) {
						$this->intSignupFormId = null;
						$this->objSignupForm = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SignupForm object
						try {
							$mixValue = QType::Cast($mixValue, 'SignupForm');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED SignupForm object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved SignupForm for this FormProduct');

						// Update Local Member Variables
						$this->objSignupForm = $mixValue;
						$this->intSignupFormId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'StewardshipFund':
					// Sets the value for the StewardshipFund object referenced by intStewardshipFundId 
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
							throw new QCallerException('Unable to set an unsaved StewardshipFund for this FormProduct');

						// Update Local Member Variables
						$this->objStewardshipFund = $mixValue;
						$this->intStewardshipFundId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for SignupProduct
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SignupProducts as an array of SignupProduct objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupProduct[]
		*/ 
		public function GetSignupProductArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SignupProduct::LoadArrayByFormProductId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SignupProducts
		 * @return int
		*/ 
		public function CountSignupProducts() {
			if ((is_null($this->intId)))
				return 0;

			return SignupProduct::CountByFormProductId($this->intId);
		}

		/**
		 * Associates a SignupProduct
		 * @param SignupProduct $objSignupProduct
		 * @return void
		*/ 
		public function AssociateSignupProduct(SignupProduct $objSignupProduct) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSignupProduct on this unsaved FormProduct.');
			if ((is_null($objSignupProduct->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSignupProduct on this FormProduct with an unsaved SignupProduct.');

			// Get the Database Object for this Class
			$objDatabase = FormProduct::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_product`
				SET
					`form_product_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupProduct->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objSignupProduct->FormProductId = $this->intId;
				$objSignupProduct->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a SignupProduct
		 * @param SignupProduct $objSignupProduct
		 * @return void
		*/ 
		public function UnassociateSignupProduct(SignupProduct $objSignupProduct) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupProduct on this unsaved FormProduct.');
			if ((is_null($objSignupProduct->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupProduct on this FormProduct with an unsaved SignupProduct.');

			// Get the Database Object for this Class
			$objDatabase = FormProduct::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_product`
				SET
					`form_product_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupProduct->Id) . ' AND
					`form_product_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSignupProduct->FormProductId = null;
				$objSignupProduct->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all SignupProducts
		 * @return void
		*/ 
		public function UnassociateAllSignupProducts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupProduct on this unsaved FormProduct.');

			// Get the Database Object for this Class
			$objDatabase = FormProduct::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SignupProduct::LoadArrayByFormProductId($this->intId) as $objSignupProduct) {
					$objSignupProduct->FormProductId = null;
					$objSignupProduct->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`signup_product`
				SET
					`form_product_id` = null
				WHERE
					`form_product_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated SignupProduct
		 * @param SignupProduct $objSignupProduct
		 * @return void
		*/ 
		public function DeleteAssociatedSignupProduct(SignupProduct $objSignupProduct) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupProduct on this unsaved FormProduct.');
			if ((is_null($objSignupProduct->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupProduct on this FormProduct with an unsaved SignupProduct.');

			// Get the Database Object for this Class
			$objDatabase = FormProduct::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_product`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSignupProduct->Id) . ' AND
					`form_product_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSignupProduct->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated SignupProducts
		 * @return void
		*/ 
		public function DeleteAllSignupProducts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSignupProduct on this unsaved FormProduct.');

			// Get the Database Object for this Class
			$objDatabase = FormProduct::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SignupProduct::LoadArrayByFormProductId($this->intId) as $objSignupProduct) {
					$objSignupProduct->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_product`
				WHERE
					`form_product_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="FormProduct"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="SignupForm" type="xsd1:SignupForm"/>';
			$strToReturn .= '<element name="OrderNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="FormProductTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="FormPaymentTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="StewardshipFund" type="xsd1:StewardshipFund"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="DateStart" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateEnd" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="MinimumQuantity" type="xsd:int"/>';
			$strToReturn .= '<element name="MaximumQuantity" type="xsd:int"/>';
			$strToReturn .= '<element name="Cost" type="xsd:float"/>';
			$strToReturn .= '<element name="Deposit" type="xsd:float"/>';
			$strToReturn .= '<element name="ViewFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FormProduct', $strComplexTypeArray)) {
				$strComplexTypeArray['FormProduct'] = FormProduct::GetSoapComplexTypeXml();
				SignupForm::AlterSoapComplexTypeArray($strComplexTypeArray);
				StewardshipFund::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FormProduct::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FormProduct();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'SignupForm')) &&
				($objSoapObject->SignupForm))
				$objToReturn->SignupForm = SignupForm::GetObjectFromSoapObject($objSoapObject->SignupForm);
			if (property_exists($objSoapObject, 'OrderNumber'))
				$objToReturn->intOrderNumber = $objSoapObject->OrderNumber;
			if (property_exists($objSoapObject, 'FormProductTypeId'))
				$objToReturn->intFormProductTypeId = $objSoapObject->FormProductTypeId;
			if (property_exists($objSoapObject, 'FormPaymentTypeId'))
				$objToReturn->intFormPaymentTypeId = $objSoapObject->FormPaymentTypeId;
			if ((property_exists($objSoapObject, 'StewardshipFund')) &&
				($objSoapObject->StewardshipFund))
				$objToReturn->StewardshipFund = StewardshipFund::GetObjectFromSoapObject($objSoapObject->StewardshipFund);
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'DateStart'))
				$objToReturn->dttDateStart = new QDateTime($objSoapObject->DateStart);
			if (property_exists($objSoapObject, 'DateEnd'))
				$objToReturn->dttDateEnd = new QDateTime($objSoapObject->DateEnd);
			if (property_exists($objSoapObject, 'MinimumQuantity'))
				$objToReturn->intMinimumQuantity = $objSoapObject->MinimumQuantity;
			if (property_exists($objSoapObject, 'MaximumQuantity'))
				$objToReturn->intMaximumQuantity = $objSoapObject->MaximumQuantity;
			if (property_exists($objSoapObject, 'Cost'))
				$objToReturn->fltCost = $objSoapObject->Cost;
			if (property_exists($objSoapObject, 'Deposit'))
				$objToReturn->fltDeposit = $objSoapObject->Deposit;
			if (property_exists($objSoapObject, 'ViewFlag'))
				$objToReturn->blnViewFlag = $objSoapObject->ViewFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FormProduct::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSignupForm)
				$objObject->objSignupForm = SignupForm::GetSoapObjectFromObject($objObject->objSignupForm, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSignupFormId = null;
			if ($objObject->objStewardshipFund)
				$objObject->objStewardshipFund = StewardshipFund::GetSoapObjectFromObject($objObject->objStewardshipFund, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipFundId = null;
			if ($objObject->dttDateStart)
				$objObject->dttDateStart = $objObject->dttDateStart->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateEnd)
				$objObject->dttDateEnd = $objObject->dttDateEnd->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $SignupFormId
	 * @property-read QQNodeSignupForm $SignupForm
	 * @property-read QQNode $OrderNumber
	 * @property-read QQNode $FormProductTypeId
	 * @property-read QQNode $FormPaymentTypeId
	 * @property-read QQNode $StewardshipFundId
	 * @property-read QQNodeStewardshipFund $StewardshipFund
	 * @property-read QQNode $Name
	 * @property-read QQNode $Description
	 * @property-read QQNode $DateStart
	 * @property-read QQNode $DateEnd
	 * @property-read QQNode $MinimumQuantity
	 * @property-read QQNode $MaximumQuantity
	 * @property-read QQNode $Cost
	 * @property-read QQNode $Deposit
	 * @property-read QQNode $ViewFlag
	 * @property-read QQReverseReferenceNodeSignupProduct $SignupProduct
	 */
	class QQNodeFormProduct extends QQNode {
		protected $strTableName = 'form_product';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FormProduct';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupFormId':
					return new QQNode('signup_form_id', 'SignupFormId', 'integer', $this);
				case 'SignupForm':
					return new QQNodeSignupForm('signup_form_id', 'SignupForm', 'integer', $this);
				case 'OrderNumber':
					return new QQNode('order_number', 'OrderNumber', 'integer', $this);
				case 'FormProductTypeId':
					return new QQNode('form_product_type_id', 'FormProductTypeId', 'integer', $this);
				case 'FormPaymentTypeId':
					return new QQNode('form_payment_type_id', 'FormPaymentTypeId', 'integer', $this);
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'DateStart':
					return new QQNode('date_start', 'DateStart', 'QDateTime', $this);
				case 'DateEnd':
					return new QQNode('date_end', 'DateEnd', 'QDateTime', $this);
				case 'MinimumQuantity':
					return new QQNode('minimum_quantity', 'MinimumQuantity', 'integer', $this);
				case 'MaximumQuantity':
					return new QQNode('maximum_quantity', 'MaximumQuantity', 'integer', $this);
				case 'Cost':
					return new QQNode('cost', 'Cost', 'double', $this);
				case 'Deposit':
					return new QQNode('deposit', 'Deposit', 'double', $this);
				case 'ViewFlag':
					return new QQNode('view_flag', 'ViewFlag', 'boolean', $this);
				case 'SignupProduct':
					return new QQReverseReferenceNodeSignupProduct($this, 'signupproduct', 'reverse_reference', 'form_product_id');

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
	 * @property-read QQNode $SignupFormId
	 * @property-read QQNodeSignupForm $SignupForm
	 * @property-read QQNode $OrderNumber
	 * @property-read QQNode $FormProductTypeId
	 * @property-read QQNode $FormPaymentTypeId
	 * @property-read QQNode $StewardshipFundId
	 * @property-read QQNodeStewardshipFund $StewardshipFund
	 * @property-read QQNode $Name
	 * @property-read QQNode $Description
	 * @property-read QQNode $DateStart
	 * @property-read QQNode $DateEnd
	 * @property-read QQNode $MinimumQuantity
	 * @property-read QQNode $MaximumQuantity
	 * @property-read QQNode $Cost
	 * @property-read QQNode $Deposit
	 * @property-read QQNode $ViewFlag
	 * @property-read QQReverseReferenceNodeSignupProduct $SignupProduct
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeFormProduct extends QQReverseReferenceNode {
		protected $strTableName = 'form_product';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FormProduct';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupFormId':
					return new QQNode('signup_form_id', 'SignupFormId', 'integer', $this);
				case 'SignupForm':
					return new QQNodeSignupForm('signup_form_id', 'SignupForm', 'integer', $this);
				case 'OrderNumber':
					return new QQNode('order_number', 'OrderNumber', 'integer', $this);
				case 'FormProductTypeId':
					return new QQNode('form_product_type_id', 'FormProductTypeId', 'integer', $this);
				case 'FormPaymentTypeId':
					return new QQNode('form_payment_type_id', 'FormPaymentTypeId', 'integer', $this);
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'DateStart':
					return new QQNode('date_start', 'DateStart', 'QDateTime', $this);
				case 'DateEnd':
					return new QQNode('date_end', 'DateEnd', 'QDateTime', $this);
				case 'MinimumQuantity':
					return new QQNode('minimum_quantity', 'MinimumQuantity', 'integer', $this);
				case 'MaximumQuantity':
					return new QQNode('maximum_quantity', 'MaximumQuantity', 'integer', $this);
				case 'Cost':
					return new QQNode('cost', 'Cost', 'double', $this);
				case 'Deposit':
					return new QQNode('deposit', 'Deposit', 'double', $this);
				case 'ViewFlag':
					return new QQNode('view_flag', 'ViewFlag', 'boolean', $this);
				case 'SignupProduct':
					return new QQReverseReferenceNodeSignupProduct($this, 'signupproduct', 'reverse_reference', 'form_product_id');

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