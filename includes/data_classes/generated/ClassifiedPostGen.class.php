<?php
	/**
	 * The abstract ClassifiedPostGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ClassifiedPost subclass which
	 * extends this ClassifiedPostGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ClassifiedPost class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $ClassifiedCategoryId the value for intClassifiedCategoryId (Not Null)
	 * @property boolean $ApprovalFlag the value for blnApprovalFlag (Not Null)
	 * @property string $Title the value for strTitle 
	 * @property string $Content the value for strContent 
	 * @property QDateTime $DatePosted the value for dttDatePosted 
	 * @property QDateTime $DateExpired the value for dttDateExpired (Not Null)
	 * @property string $Name the value for strName 
	 * @property string $Phone the value for strPhone 
	 * @property string $Email the value for strEmail 
	 * @property ClassifiedCategory $ClassifiedCategory the value for the ClassifiedCategory object referenced by intClassifiedCategoryId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ClassifiedPostGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column classified_post.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column classified_post.classified_category_id
		 * @var integer intClassifiedCategoryId
		 */
		protected $intClassifiedCategoryId;
		const ClassifiedCategoryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column classified_post.approval_flag
		 * @var boolean blnApprovalFlag
		 */
		protected $blnApprovalFlag;
		const ApprovalFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column classified_post.title
		 * @var string strTitle
		 */
		protected $strTitle;
		const TitleMaxLength = 255;
		const TitleDefault = null;


		/**
		 * Protected member variable that maps to the database column classified_post.content
		 * @var string strContent
		 */
		protected $strContent;
		const ContentDefault = null;


		/**
		 * Protected member variable that maps to the database column classified_post.date_posted
		 * @var QDateTime dttDatePosted
		 */
		protected $dttDatePosted;
		const DatePostedDefault = null;


		/**
		 * Protected member variable that maps to the database column classified_post.date_expired
		 * @var QDateTime dttDateExpired
		 */
		protected $dttDateExpired;
		const DateExpiredDefault = null;


		/**
		 * Protected member variable that maps to the database column classified_post.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column classified_post.phone
		 * @var string strPhone
		 */
		protected $strPhone;
		const PhoneMaxLength = 255;
		const PhoneDefault = null;


		/**
		 * Protected member variable that maps to the database column classified_post.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 255;
		const EmailDefault = null;


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
		 * in the database column classified_post.classified_category_id.
		 *
		 * NOTE: Always use the ClassifiedCategory property getter to correctly retrieve this ClassifiedCategory object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClassifiedCategory objClassifiedCategory
		 */
		protected $objClassifiedCategory;





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
		 * Load a ClassifiedPost from PK Info
		 * @param integer $intId
		 * @return ClassifiedPost
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return ClassifiedPost::QuerySingle(
				QQ::Equal(QQN::ClassifiedPost()->Id, $intId)
			);
		}

		/**
		 * Load all ClassifiedPosts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassifiedPost[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ClassifiedPost::QueryArray to perform the LoadAll query
			try {
				return ClassifiedPost::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ClassifiedPosts
		 * @return int
		 */
		public static function CountAll() {
			// Call ClassifiedPost::QueryCount to perform the CountAll query
			return ClassifiedPost::QueryCount(QQ::All());
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
			$objDatabase = ClassifiedPost::GetDatabase();

			// Create/Build out the QueryBuilder object with ClassifiedPost-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'classified_post');
			ClassifiedPost::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('classified_post');

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
		 * Static Qcodo Query method to query for a single ClassifiedPost object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClassifiedPost the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassifiedPost::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ClassifiedPost object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ClassifiedPost::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ClassifiedPost::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ClassifiedPost objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClassifiedPost[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassifiedPost::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ClassifiedPost::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ClassifiedPost::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ClassifiedPost objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassifiedPost::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ClassifiedPost::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'classified_post_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ClassifiedPost-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ClassifiedPost::GetSelectFields($objQueryBuilder);
				ClassifiedPost::GetFromFields($objQueryBuilder);

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
			return ClassifiedPost::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ClassifiedPost
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'classified_post';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'classified_category_id', $strAliasPrefix . 'classified_category_id');
			$objBuilder->AddSelectItem($strTableName, 'approval_flag', $strAliasPrefix . 'approval_flag');
			$objBuilder->AddSelectItem($strTableName, 'title', $strAliasPrefix . 'title');
			$objBuilder->AddSelectItem($strTableName, 'content', $strAliasPrefix . 'content');
			$objBuilder->AddSelectItem($strTableName, 'date_posted', $strAliasPrefix . 'date_posted');
			$objBuilder->AddSelectItem($strTableName, 'date_expired', $strAliasPrefix . 'date_expired');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'phone', $strAliasPrefix . 'phone');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ClassifiedPost from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ClassifiedPost::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ClassifiedPost
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the ClassifiedPost object
			$objToReturn = new ClassifiedPost();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'classified_category_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'classified_category_id'] : $strAliasPrefix . 'classified_category_id';
			$objToReturn->intClassifiedCategoryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'approval_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'approval_flag'] : $strAliasPrefix . 'approval_flag';
			$objToReturn->blnApprovalFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'title', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'title'] : $strAliasPrefix . 'title';
			$objToReturn->strTitle = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'content', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'content'] : $strAliasPrefix . 'content';
			$objToReturn->strContent = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_posted', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_posted'] : $strAliasPrefix . 'date_posted';
			$objToReturn->dttDatePosted = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_expired', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_expired'] : $strAliasPrefix . 'date_expired';
			$objToReturn->dttDateExpired = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'phone', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'phone'] : $strAliasPrefix . 'phone';
			$objToReturn->strPhone = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'classified_post__';

			// Check for ClassifiedCategory Early Binding
			$strAlias = $strAliasPrefix . 'classified_category_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objClassifiedCategory = ClassifiedCategory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'classified_category_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of ClassifiedPosts from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ClassifiedPost[]
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
					$objItem = ClassifiedPost::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ClassifiedPost::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ClassifiedPost object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ClassifiedPost next row resulting from the query
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
			return ClassifiedPost::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ClassifiedPost object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return ClassifiedPost
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ClassifiedPost::QuerySingle(
				QQ::Equal(QQN::ClassifiedPost()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ClassifiedPost objects,
		 * by ClassifiedCategoryId, ApprovalFlag, DateExpired Index(es)
		 * @param integer $intClassifiedCategoryId
		 * @param boolean $blnApprovalFlag
		 * @param QDateTime $dttDateExpired
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassifiedPost[]
		*/
		public static function LoadArrayByClassifiedCategoryIdApprovalFlagDateExpired($intClassifiedCategoryId, $blnApprovalFlag, $dttDateExpired, $objOptionalClauses = null) {
			// Call ClassifiedPost::QueryArray to perform the LoadArrayByClassifiedCategoryIdApprovalFlagDateExpired query
			try {
				return ClassifiedPost::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::ClassifiedPost()->ClassifiedCategoryId, $intClassifiedCategoryId),
					QQ::Equal(QQN::ClassifiedPost()->ApprovalFlag, $blnApprovalFlag),
					QQ::Equal(QQN::ClassifiedPost()->DateExpired, $dttDateExpired)
					),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClassifiedPosts
		 * by ClassifiedCategoryId, ApprovalFlag, DateExpired Index(es)
		 * @param integer $intClassifiedCategoryId
		 * @param boolean $blnApprovalFlag
		 * @param QDateTime $dttDateExpired
		 * @return int
		*/
		public static function CountByClassifiedCategoryIdApprovalFlagDateExpired($intClassifiedCategoryId, $blnApprovalFlag, $dttDateExpired, $objOptionalClauses = null) {
			// Call ClassifiedPost::QueryCount to perform the CountByClassifiedCategoryIdApprovalFlagDateExpired query
			return ClassifiedPost::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::ClassifiedPost()->ClassifiedCategoryId, $intClassifiedCategoryId),
				QQ::Equal(QQN::ClassifiedPost()->ApprovalFlag, $blnApprovalFlag),
				QQ::Equal(QQN::ClassifiedPost()->DateExpired, $dttDateExpired)
				)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ClassifiedPost objects,
		 * by ClassifiedCategoryId Index(es)
		 * @param integer $intClassifiedCategoryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassifiedPost[]
		*/
		public static function LoadArrayByClassifiedCategoryId($intClassifiedCategoryId, $objOptionalClauses = null) {
			// Call ClassifiedPost::QueryArray to perform the LoadArrayByClassifiedCategoryId query
			try {
				return ClassifiedPost::QueryArray(
					QQ::Equal(QQN::ClassifiedPost()->ClassifiedCategoryId, $intClassifiedCategoryId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClassifiedPosts
		 * by ClassifiedCategoryId Index(es)
		 * @param integer $intClassifiedCategoryId
		 * @return int
		*/
		public static function CountByClassifiedCategoryId($intClassifiedCategoryId, $objOptionalClauses = null) {
			// Call ClassifiedPost::QueryCount to perform the CountByClassifiedCategoryId query
			return ClassifiedPost::QueryCount(
				QQ::Equal(QQN::ClassifiedPost()->ClassifiedCategoryId, $intClassifiedCategoryId)
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
		 * Save this ClassifiedPost
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ClassifiedPost::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `classified_post` (
							`classified_category_id`,
							`approval_flag`,
							`title`,
							`content`,
							`date_posted`,
							`date_expired`,
							`name`,
							`phone`,
							`email`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intClassifiedCategoryId) . ',
							' . $objDatabase->SqlVariable($this->blnApprovalFlag) . ',
							' . $objDatabase->SqlVariable($this->strTitle) . ',
							' . $objDatabase->SqlVariable($this->strContent) . ',
							' . $objDatabase->SqlVariable($this->dttDatePosted) . ',
							' . $objDatabase->SqlVariable($this->dttDateExpired) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strPhone) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('classified_post', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`classified_post`
						SET
							`classified_category_id` = ' . $objDatabase->SqlVariable($this->intClassifiedCategoryId) . ',
							`approval_flag` = ' . $objDatabase->SqlVariable($this->blnApprovalFlag) . ',
							`title` = ' . $objDatabase->SqlVariable($this->strTitle) . ',
							`content` = ' . $objDatabase->SqlVariable($this->strContent) . ',
							`date_posted` = ' . $objDatabase->SqlVariable($this->dttDatePosted) . ',
							`date_expired` = ' . $objDatabase->SqlVariable($this->dttDateExpired) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`phone` = ' . $objDatabase->SqlVariable($this->strPhone) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . '
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
		 * Delete this ClassifiedPost
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ClassifiedPost with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ClassifiedPost::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`classified_post`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ClassifiedPosts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ClassifiedPost::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`classified_post`');
		}

		/**
		 * Truncate classified_post table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ClassifiedPost::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `classified_post`');
		}

		/**
		 * Reload this ClassifiedPost from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ClassifiedPost object.');

			// Reload the Object
			$objReloaded = ClassifiedPost::Load($this->intId);

			// Update $this's local variables to match
			$this->ClassifiedCategoryId = $objReloaded->ClassifiedCategoryId;
			$this->blnApprovalFlag = $objReloaded->blnApprovalFlag;
			$this->strTitle = $objReloaded->strTitle;
			$this->strContent = $objReloaded->strContent;
			$this->dttDatePosted = $objReloaded->dttDatePosted;
			$this->dttDateExpired = $objReloaded->dttDateExpired;
			$this->strName = $objReloaded->strName;
			$this->strPhone = $objReloaded->strPhone;
			$this->strEmail = $objReloaded->strEmail;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ClassifiedPost::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `classified_post` (
					`id`,
					`classified_category_id`,
					`approval_flag`,
					`title`,
					`content`,
					`date_posted`,
					`date_expired`,
					`name`,
					`phone`,
					`email`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intClassifiedCategoryId) . ',
					' . $objDatabase->SqlVariable($this->blnApprovalFlag) . ',
					' . $objDatabase->SqlVariable($this->strTitle) . ',
					' . $objDatabase->SqlVariable($this->strContent) . ',
					' . $objDatabase->SqlVariable($this->dttDatePosted) . ',
					' . $objDatabase->SqlVariable($this->dttDateExpired) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->strPhone) . ',
					' . $objDatabase->SqlVariable($this->strEmail) . ',
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
		 * @return ClassifiedPost[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = ClassifiedPost::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM classified_post WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return ClassifiedPost::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ClassifiedPost[]
		 */
		public function GetJournal() {
			return ClassifiedPost::GetJournalForId($this->intId);
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

				case 'ClassifiedCategoryId':
					// Gets the value for intClassifiedCategoryId (Not Null)
					// @return integer
					return $this->intClassifiedCategoryId;

				case 'ApprovalFlag':
					// Gets the value for blnApprovalFlag (Not Null)
					// @return boolean
					return $this->blnApprovalFlag;

				case 'Title':
					// Gets the value for strTitle 
					// @return string
					return $this->strTitle;

				case 'Content':
					// Gets the value for strContent 
					// @return string
					return $this->strContent;

				case 'DatePosted':
					// Gets the value for dttDatePosted 
					// @return QDateTime
					return $this->dttDatePosted;

				case 'DateExpired':
					// Gets the value for dttDateExpired (Not Null)
					// @return QDateTime
					return $this->dttDateExpired;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'Phone':
					// Gets the value for strPhone 
					// @return string
					return $this->strPhone;

				case 'Email':
					// Gets the value for strEmail 
					// @return string
					return $this->strEmail;


				///////////////////
				// Member Objects
				///////////////////
				case 'ClassifiedCategory':
					// Gets the value for the ClassifiedCategory object referenced by intClassifiedCategoryId (Not Null)
					// @return ClassifiedCategory
					try {
						if ((!$this->objClassifiedCategory) && (!is_null($this->intClassifiedCategoryId)))
							$this->objClassifiedCategory = ClassifiedCategory::Load($this->intClassifiedCategoryId);
						return $this->objClassifiedCategory;
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
				case 'ClassifiedCategoryId':
					// Sets the value for intClassifiedCategoryId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objClassifiedCategory = null;
						return ($this->intClassifiedCategoryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ApprovalFlag':
					// Sets the value for blnApprovalFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnApprovalFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Title':
					// Sets the value for strTitle 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTitle = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Content':
					// Sets the value for strContent 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strContent = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DatePosted':
					// Sets the value for dttDatePosted 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDatePosted = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateExpired':
					// Sets the value for dttDateExpired (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateExpired = QType::Cast($mixValue, QType::DateTime));
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

				case 'Phone':
					// Sets the value for strPhone 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPhone = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					// Sets the value for strEmail 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ClassifiedCategory':
					// Sets the value for the ClassifiedCategory object referenced by intClassifiedCategoryId (Not Null)
					// @param ClassifiedCategory $mixValue
					// @return ClassifiedCategory
					if (is_null($mixValue)) {
						$this->intClassifiedCategoryId = null;
						$this->objClassifiedCategory = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClassifiedCategory object
						try {
							$mixValue = QType::Cast($mixValue, 'ClassifiedCategory');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ClassifiedCategory object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ClassifiedCategory for this ClassifiedPost');

						// Update Local Member Variables
						$this->objClassifiedCategory = $mixValue;
						$this->intClassifiedCategoryId = $mixValue->Id;

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
			$strToReturn = '<complexType name="ClassifiedPost"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ClassifiedCategory" type="xsd1:ClassifiedCategory"/>';
			$strToReturn .= '<element name="ApprovalFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Title" type="xsd:string"/>';
			$strToReturn .= '<element name="Content" type="xsd:string"/>';
			$strToReturn .= '<element name="DatePosted" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateExpired" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Phone" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ClassifiedPost', $strComplexTypeArray)) {
				$strComplexTypeArray['ClassifiedPost'] = ClassifiedPost::GetSoapComplexTypeXml();
				ClassifiedCategory::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ClassifiedPost::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ClassifiedPost();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'ClassifiedCategory')) &&
				($objSoapObject->ClassifiedCategory))
				$objToReturn->ClassifiedCategory = ClassifiedCategory::GetObjectFromSoapObject($objSoapObject->ClassifiedCategory);
			if (property_exists($objSoapObject, 'ApprovalFlag'))
				$objToReturn->blnApprovalFlag = $objSoapObject->ApprovalFlag;
			if (property_exists($objSoapObject, 'Title'))
				$objToReturn->strTitle = $objSoapObject->Title;
			if (property_exists($objSoapObject, 'Content'))
				$objToReturn->strContent = $objSoapObject->Content;
			if (property_exists($objSoapObject, 'DatePosted'))
				$objToReturn->dttDatePosted = new QDateTime($objSoapObject->DatePosted);
			if (property_exists($objSoapObject, 'DateExpired'))
				$objToReturn->dttDateExpired = new QDateTime($objSoapObject->DateExpired);
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Phone'))
				$objToReturn->strPhone = $objSoapObject->Phone;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ClassifiedPost::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objClassifiedCategory)
				$objObject->objClassifiedCategory = ClassifiedCategory::GetSoapObjectFromObject($objObject->objClassifiedCategory, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClassifiedCategoryId = null;
			if ($objObject->dttDatePosted)
				$objObject->dttDatePosted = $objObject->dttDatePosted->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateExpired)
				$objObject->dttDateExpired = $objObject->dttDateExpired->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $ClassifiedCategoryId
	 * @property-read QQNodeClassifiedCategory $ClassifiedCategory
	 * @property-read QQNode $ApprovalFlag
	 * @property-read QQNode $Title
	 * @property-read QQNode $Content
	 * @property-read QQNode $DatePosted
	 * @property-read QQNode $DateExpired
	 * @property-read QQNode $Name
	 * @property-read QQNode $Phone
	 * @property-read QQNode $Email
	 */
	class QQNodeClassifiedPost extends QQNode {
		protected $strTableName = 'classified_post';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ClassifiedPost';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ClassifiedCategoryId':
					return new QQNode('classified_category_id', 'ClassifiedCategoryId', 'integer', $this);
				case 'ClassifiedCategory':
					return new QQNodeClassifiedCategory('classified_category_id', 'ClassifiedCategory', 'integer', $this);
				case 'ApprovalFlag':
					return new QQNode('approval_flag', 'ApprovalFlag', 'boolean', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Content':
					return new QQNode('content', 'Content', 'string', $this);
				case 'DatePosted':
					return new QQNode('date_posted', 'DatePosted', 'QDateTime', $this);
				case 'DateExpired':
					return new QQNode('date_expired', 'DateExpired', 'QDateTime', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Phone':
					return new QQNode('phone', 'Phone', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);

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
	 * @property-read QQNode $ClassifiedCategoryId
	 * @property-read QQNodeClassifiedCategory $ClassifiedCategory
	 * @property-read QQNode $ApprovalFlag
	 * @property-read QQNode $Title
	 * @property-read QQNode $Content
	 * @property-read QQNode $DatePosted
	 * @property-read QQNode $DateExpired
	 * @property-read QQNode $Name
	 * @property-read QQNode $Phone
	 * @property-read QQNode $Email
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeClassifiedPost extends QQReverseReferenceNode {
		protected $strTableName = 'classified_post';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ClassifiedPost';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ClassifiedCategoryId':
					return new QQNode('classified_category_id', 'ClassifiedCategoryId', 'integer', $this);
				case 'ClassifiedCategory':
					return new QQNodeClassifiedCategory('classified_category_id', 'ClassifiedCategory', 'integer', $this);
				case 'ApprovalFlag':
					return new QQNode('approval_flag', 'ApprovalFlag', 'boolean', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Content':
					return new QQNode('content', 'Content', 'string', $this);
				case 'DatePosted':
					return new QQNode('date_posted', 'DatePosted', 'QDateTime', $this);
				case 'DateExpired':
					return new QQNode('date_expired', 'DateExpired', 'QDateTime', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Phone':
					return new QQNode('phone', 'Phone', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);

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