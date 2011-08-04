<?php
	/**
	 * The abstract SignupProductGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SignupProduct subclass which
	 * extends this SignupProductGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SignupProduct class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $SignupEntryId the value for intSignupEntryId (Not Null)
	 * @property integer $FormProductId the value for intFormProductId (Not Null)
	 * @property integer $Quantity the value for intQuantity (Not Null)
	 * @property double $Amount the value for fltAmount 
	 * @property double $Deposit the value for fltDeposit 
	 * @property SignupEntry $SignupEntry the value for the SignupEntry object referenced by intSignupEntryId (Not Null)
	 * @property FormProduct $FormProduct the value for the FormProduct object referenced by intFormProductId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SignupProductGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column signup_product.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_product.signup_entry_id
		 * @var integer intSignupEntryId
		 */
		protected $intSignupEntryId;
		const SignupEntryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_product.form_product_id
		 * @var integer intFormProductId
		 */
		protected $intFormProductId;
		const FormProductIdDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_product.quantity
		 * @var integer intQuantity
		 */
		protected $intQuantity;
		const QuantityDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_product.amount
		 * @var double fltAmount
		 */
		protected $fltAmount;
		const AmountDefault = null;


		/**
		 * Protected member variable that maps to the database column signup_product.deposit
		 * @var double fltDeposit
		 */
		protected $fltDeposit;
		const DepositDefault = null;


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
		 * in the database column signup_product.signup_entry_id.
		 *
		 * NOTE: Always use the SignupEntry property getter to correctly retrieve this SignupEntry object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SignupEntry objSignupEntry
		 */
		protected $objSignupEntry;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column signup_product.form_product_id.
		 *
		 * NOTE: Always use the FormProduct property getter to correctly retrieve this FormProduct object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FormProduct objFormProduct
		 */
		protected $objFormProduct;





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
		 * Load a SignupProduct from PK Info
		 * @param integer $intId
		 * @return SignupProduct
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return SignupProduct::QuerySingle(
				QQ::Equal(QQN::SignupProduct()->Id, $intId)
			);
		}

		/**
		 * Load all SignupProducts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupProduct[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call SignupProduct::QueryArray to perform the LoadAll query
			try {
				return SignupProduct::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SignupProducts
		 * @return int
		 */
		public static function CountAll() {
			// Call SignupProduct::QueryCount to perform the CountAll query
			return SignupProduct::QueryCount(QQ::All());
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
			$objDatabase = SignupProduct::GetDatabase();

			// Create/Build out the QueryBuilder object with SignupProduct-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'signup_product');
			SignupProduct::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('signup_product');

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
		 * Static Qcodo Query method to query for a single SignupProduct object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SignupProduct the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SignupProduct::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new SignupProduct object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SignupProduct::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return SignupProduct::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of SignupProduct objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SignupProduct[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SignupProduct::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SignupProduct::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = SignupProduct::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of SignupProduct objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SignupProduct::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = SignupProduct::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'signup_product_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with SignupProduct-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				SignupProduct::GetSelectFields($objQueryBuilder);
				SignupProduct::GetFromFields($objQueryBuilder);

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
			return SignupProduct::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SignupProduct
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'signup_product';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'signup_entry_id', $strAliasPrefix . 'signup_entry_id');
			$objBuilder->AddSelectItem($strTableName, 'form_product_id', $strAliasPrefix . 'form_product_id');
			$objBuilder->AddSelectItem($strTableName, 'quantity', $strAliasPrefix . 'quantity');
			$objBuilder->AddSelectItem($strTableName, 'amount', $strAliasPrefix . 'amount');
			$objBuilder->AddSelectItem($strTableName, 'deposit', $strAliasPrefix . 'deposit');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a SignupProduct from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SignupProduct::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return SignupProduct
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the SignupProduct object
			$objToReturn = new SignupProduct();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'signup_entry_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_entry_id'] : $strAliasPrefix . 'signup_entry_id';
			$objToReturn->intSignupEntryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'form_product_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'form_product_id'] : $strAliasPrefix . 'form_product_id';
			$objToReturn->intFormProductId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'quantity', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'quantity'] : $strAliasPrefix . 'quantity';
			$objToReturn->intQuantity = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount'] : $strAliasPrefix . 'amount';
			$objToReturn->fltAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'deposit', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'deposit'] : $strAliasPrefix . 'deposit';
			$objToReturn->fltDeposit = $objDbRow->GetColumn($strAliasName, 'Float');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'signup_product__';

			// Check for SignupEntry Early Binding
			$strAlias = $strAliasPrefix . 'signup_entry_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSignupEntry = SignupEntry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signup_entry_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for FormProduct Early Binding
			$strAlias = $strAliasPrefix . 'form_product_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objFormProduct = FormProduct::InstantiateDbRow($objDbRow, $strAliasPrefix . 'form_product_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of SignupProducts from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return SignupProduct[]
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
					$objItem = SignupProduct::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SignupProduct::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single SignupProduct object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return SignupProduct next row resulting from the query
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
			return SignupProduct::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single SignupProduct object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return SignupProduct
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return SignupProduct::QuerySingle(
				QQ::Equal(QQN::SignupProduct()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single SignupProduct object,
		 * by SignupEntryId, FormProductId Index(es)
		 * @param integer $intSignupEntryId
		 * @param integer $intFormProductId
		 * @return SignupProduct
		*/
		public static function LoadBySignupEntryIdFormProductId($intSignupEntryId, $intFormProductId, $objOptionalClauses = null) {
			return SignupProduct::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::SignupProduct()->SignupEntryId, $intSignupEntryId),
				QQ::Equal(QQN::SignupProduct()->FormProductId, $intFormProductId)
				)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SignupProduct objects,
		 * by SignupEntryId Index(es)
		 * @param integer $intSignupEntryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupProduct[]
		*/
		public static function LoadArrayBySignupEntryId($intSignupEntryId, $objOptionalClauses = null) {
			// Call SignupProduct::QueryArray to perform the LoadArrayBySignupEntryId query
			try {
				return SignupProduct::QueryArray(
					QQ::Equal(QQN::SignupProduct()->SignupEntryId, $intSignupEntryId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SignupProducts
		 * by SignupEntryId Index(es)
		 * @param integer $intSignupEntryId
		 * @return int
		*/
		public static function CountBySignupEntryId($intSignupEntryId, $objOptionalClauses = null) {
			// Call SignupProduct::QueryCount to perform the CountBySignupEntryId query
			return SignupProduct::QueryCount(
				QQ::Equal(QQN::SignupProduct()->SignupEntryId, $intSignupEntryId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SignupProduct objects,
		 * by FormProductId Index(es)
		 * @param integer $intFormProductId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SignupProduct[]
		*/
		public static function LoadArrayByFormProductId($intFormProductId, $objOptionalClauses = null) {
			// Call SignupProduct::QueryArray to perform the LoadArrayByFormProductId query
			try {
				return SignupProduct::QueryArray(
					QQ::Equal(QQN::SignupProduct()->FormProductId, $intFormProductId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SignupProducts
		 * by FormProductId Index(es)
		 * @param integer $intFormProductId
		 * @return int
		*/
		public static function CountByFormProductId($intFormProductId, $objOptionalClauses = null) {
			// Call SignupProduct::QueryCount to perform the CountByFormProductId query
			return SignupProduct::QueryCount(
				QQ::Equal(QQN::SignupProduct()->FormProductId, $intFormProductId)
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
		 * Save this SignupProduct
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SignupProduct::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `signup_product` (
							`signup_entry_id`,
							`form_product_id`,
							`quantity`,
							`amount`,
							`deposit`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intSignupEntryId) . ',
							' . $objDatabase->SqlVariable($this->intFormProductId) . ',
							' . $objDatabase->SqlVariable($this->intQuantity) . ',
							' . $objDatabase->SqlVariable($this->fltAmount) . ',
							' . $objDatabase->SqlVariable($this->fltDeposit) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('signup_product', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`signup_product`
						SET
							`signup_entry_id` = ' . $objDatabase->SqlVariable($this->intSignupEntryId) . ',
							`form_product_id` = ' . $objDatabase->SqlVariable($this->intFormProductId) . ',
							`quantity` = ' . $objDatabase->SqlVariable($this->intQuantity) . ',
							`amount` = ' . $objDatabase->SqlVariable($this->fltAmount) . ',
							`deposit` = ' . $objDatabase->SqlVariable($this->fltDeposit) . '
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
		 * Delete this SignupProduct
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SignupProduct with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SignupProduct::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_product`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all SignupProducts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SignupProduct::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`signup_product`');
		}

		/**
		 * Truncate signup_product table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SignupProduct::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `signup_product`');
		}

		/**
		 * Reload this SignupProduct from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SignupProduct object.');

			// Reload the Object
			$objReloaded = SignupProduct::Load($this->intId);

			// Update $this's local variables to match
			$this->SignupEntryId = $objReloaded->SignupEntryId;
			$this->FormProductId = $objReloaded->FormProductId;
			$this->intQuantity = $objReloaded->intQuantity;
			$this->fltAmount = $objReloaded->fltAmount;
			$this->fltDeposit = $objReloaded->fltDeposit;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = SignupProduct::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `signup_product` (
					`id`,
					`signup_entry_id`,
					`form_product_id`,
					`quantity`,
					`amount`,
					`deposit`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intSignupEntryId) . ',
					' . $objDatabase->SqlVariable($this->intFormProductId) . ',
					' . $objDatabase->SqlVariable($this->intQuantity) . ',
					' . $objDatabase->SqlVariable($this->fltAmount) . ',
					' . $objDatabase->SqlVariable($this->fltDeposit) . ',
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
		 * @return SignupProduct[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = SignupProduct::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM signup_product WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return SignupProduct::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return SignupProduct[]
		 */
		public function GetJournal() {
			return SignupProduct::GetJournalForId($this->intId);
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

				case 'SignupEntryId':
					// Gets the value for intSignupEntryId (Not Null)
					// @return integer
					return $this->intSignupEntryId;

				case 'FormProductId':
					// Gets the value for intFormProductId (Not Null)
					// @return integer
					return $this->intFormProductId;

				case 'Quantity':
					// Gets the value for intQuantity (Not Null)
					// @return integer
					return $this->intQuantity;

				case 'Amount':
					// Gets the value for fltAmount 
					// @return double
					return $this->fltAmount;

				case 'Deposit':
					// Gets the value for fltDeposit 
					// @return double
					return $this->fltDeposit;


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupEntry':
					// Gets the value for the SignupEntry object referenced by intSignupEntryId (Not Null)
					// @return SignupEntry
					try {
						if ((!$this->objSignupEntry) && (!is_null($this->intSignupEntryId)))
							$this->objSignupEntry = SignupEntry::Load($this->intSignupEntryId);
						return $this->objSignupEntry;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormProduct':
					// Gets the value for the FormProduct object referenced by intFormProductId (Not Null)
					// @return FormProduct
					try {
						if ((!$this->objFormProduct) && (!is_null($this->intFormProductId)))
							$this->objFormProduct = FormProduct::Load($this->intFormProductId);
						return $this->objFormProduct;
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
				case 'SignupEntryId':
					// Sets the value for intSignupEntryId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSignupEntry = null;
						return ($this->intSignupEntryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormProductId':
					// Sets the value for intFormProductId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objFormProduct = null;
						return ($this->intFormProductId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Quantity':
					// Sets the value for intQuantity (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intQuantity = QType::Cast($mixValue, QType::Integer));
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


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupEntry':
					// Sets the value for the SignupEntry object referenced by intSignupEntryId (Not Null)
					// @param SignupEntry $mixValue
					// @return SignupEntry
					if (is_null($mixValue)) {
						$this->intSignupEntryId = null;
						$this->objSignupEntry = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SignupEntry object
						try {
							$mixValue = QType::Cast($mixValue, 'SignupEntry');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED SignupEntry object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved SignupEntry for this SignupProduct');

						// Update Local Member Variables
						$this->objSignupEntry = $mixValue;
						$this->intSignupEntryId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'FormProduct':
					// Sets the value for the FormProduct object referenced by intFormProductId (Not Null)
					// @param FormProduct $mixValue
					// @return FormProduct
					if (is_null($mixValue)) {
						$this->intFormProductId = null;
						$this->objFormProduct = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FormProduct object
						try {
							$mixValue = QType::Cast($mixValue, 'FormProduct');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED FormProduct object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved FormProduct for this SignupProduct');

						// Update Local Member Variables
						$this->objFormProduct = $mixValue;
						$this->intFormProductId = $mixValue->Id;

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
			$strToReturn = '<complexType name="SignupProduct"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="SignupEntry" type="xsd1:SignupEntry"/>';
			$strToReturn .= '<element name="FormProduct" type="xsd1:FormProduct"/>';
			$strToReturn .= '<element name="Quantity" type="xsd:int"/>';
			$strToReturn .= '<element name="Amount" type="xsd:float"/>';
			$strToReturn .= '<element name="Deposit" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SignupProduct', $strComplexTypeArray)) {
				$strComplexTypeArray['SignupProduct'] = SignupProduct::GetSoapComplexTypeXml();
				SignupEntry::AlterSoapComplexTypeArray($strComplexTypeArray);
				FormProduct::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SignupProduct::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SignupProduct();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'SignupEntry')) &&
				($objSoapObject->SignupEntry))
				$objToReturn->SignupEntry = SignupEntry::GetObjectFromSoapObject($objSoapObject->SignupEntry);
			if ((property_exists($objSoapObject, 'FormProduct')) &&
				($objSoapObject->FormProduct))
				$objToReturn->FormProduct = FormProduct::GetObjectFromSoapObject($objSoapObject->FormProduct);
			if (property_exists($objSoapObject, 'Quantity'))
				$objToReturn->intQuantity = $objSoapObject->Quantity;
			if (property_exists($objSoapObject, 'Amount'))
				$objToReturn->fltAmount = $objSoapObject->Amount;
			if (property_exists($objSoapObject, 'Deposit'))
				$objToReturn->fltDeposit = $objSoapObject->Deposit;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SignupProduct::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSignupEntry)
				$objObject->objSignupEntry = SignupEntry::GetSoapObjectFromObject($objObject->objSignupEntry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSignupEntryId = null;
			if ($objObject->objFormProduct)
				$objObject->objFormProduct = FormProduct::GetSoapObjectFromObject($objObject->objFormProduct, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFormProductId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $SignupEntryId
	 * @property-read QQNodeSignupEntry $SignupEntry
	 * @property-read QQNode $FormProductId
	 * @property-read QQNodeFormProduct $FormProduct
	 * @property-read QQNode $Quantity
	 * @property-read QQNode $Amount
	 * @property-read QQNode $Deposit
	 */
	class QQNodeSignupProduct extends QQNode {
		protected $strTableName = 'signup_product';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'SignupProduct';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupEntryId':
					return new QQNode('signup_entry_id', 'SignupEntryId', 'integer', $this);
				case 'SignupEntry':
					return new QQNodeSignupEntry('signup_entry_id', 'SignupEntry', 'integer', $this);
				case 'FormProductId':
					return new QQNode('form_product_id', 'FormProductId', 'integer', $this);
				case 'FormProduct':
					return new QQNodeFormProduct('form_product_id', 'FormProduct', 'integer', $this);
				case 'Quantity':
					return new QQNode('quantity', 'Quantity', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'Deposit':
					return new QQNode('deposit', 'Deposit', 'double', $this);

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
	 * @property-read QQNode $SignupEntryId
	 * @property-read QQNodeSignupEntry $SignupEntry
	 * @property-read QQNode $FormProductId
	 * @property-read QQNodeFormProduct $FormProduct
	 * @property-read QQNode $Quantity
	 * @property-read QQNode $Amount
	 * @property-read QQNode $Deposit
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeSignupProduct extends QQReverseReferenceNode {
		protected $strTableName = 'signup_product';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'SignupProduct';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupEntryId':
					return new QQNode('signup_entry_id', 'SignupEntryId', 'integer', $this);
				case 'SignupEntry':
					return new QQNodeSignupEntry('signup_entry_id', 'SignupEntry', 'integer', $this);
				case 'FormProductId':
					return new QQNode('form_product_id', 'FormProductId', 'integer', $this);
				case 'FormProduct':
					return new QQNodeFormProduct('form_product_id', 'FormProduct', 'integer', $this);
				case 'Quantity':
					return new QQNode('quantity', 'Quantity', 'integer', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);
				case 'Deposit':
					return new QQNode('deposit', 'Deposit', 'double', $this);

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