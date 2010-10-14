<?php
	/**
	 * The abstract CommentGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Comment subclass which
	 * extends this CommentGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Comment class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property integer $PostedByLoginId the value for intPostedByLoginId (Not Null)
	 * @property integer $CommentPrivacyTypeId the value for intCommentPrivacyTypeId (Not Null)
	 * @property integer $CommentCategoryId the value for intCommentCategoryId (Not Null)
	 * @property string $Comment the value for strComment 
	 * @property QDateTime $DatePosted the value for dttDatePosted (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property Login $PostedByLogin the value for the Login object referenced by intPostedByLoginId (Not Null)
	 * @property CommentCategory $CommentCategory the value for the CommentCategory object referenced by intCommentCategoryId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CommentGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column comment.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column comment.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column comment.posted_by_login_id
		 * @var integer intPostedByLoginId
		 */
		protected $intPostedByLoginId;
		const PostedByLoginIdDefault = null;


		/**
		 * Protected member variable that maps to the database column comment.comment_privacy_type_id
		 * @var integer intCommentPrivacyTypeId
		 */
		protected $intCommentPrivacyTypeId;
		const CommentPrivacyTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column comment.comment_category_id
		 * @var integer intCommentCategoryId
		 */
		protected $intCommentCategoryId;
		const CommentCategoryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column comment.comment
		 * @var string strComment
		 */
		protected $strComment;
		const CommentDefault = null;


		/**
		 * Protected member variable that maps to the database column comment.date_posted
		 * @var QDateTime dttDatePosted
		 */
		protected $dttDatePosted;
		const DatePostedDefault = null;


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
		 * in the database column comment.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column comment.posted_by_login_id.
		 *
		 * NOTE: Always use the PostedByLogin property getter to correctly retrieve this Login object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Login objPostedByLogin
		 */
		protected $objPostedByLogin;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column comment.comment_category_id.
		 *
		 * NOTE: Always use the CommentCategory property getter to correctly retrieve this CommentCategory object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CommentCategory objCommentCategory
		 */
		protected $objCommentCategory;





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
		 * Load a Comment from PK Info
		 * @param integer $intId
		 * @return Comment
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Comment::QuerySingle(
				QQ::Equal(QQN::Comment()->Id, $intId)
			);
		}

		/**
		 * Load all Comments
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Comment[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Comment::QueryArray to perform the LoadAll query
			try {
				return Comment::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Comments
		 * @return int
		 */
		public static function CountAll() {
			// Call Comment::QueryCount to perform the CountAll query
			return Comment::QueryCount(QQ::All());
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
			$objDatabase = Comment::GetDatabase();

			// Create/Build out the QueryBuilder object with Comment-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'comment');
			Comment::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('comment');

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
		 * Static Qcodo Query method to query for a single Comment object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Comment the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Comment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Comment object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Comment::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Comment::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Comment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Comment[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Comment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Comment::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Comment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Comment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Comment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Comment::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'comment_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Comment-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Comment::GetSelectFields($objQueryBuilder);
				Comment::GetFromFields($objQueryBuilder);

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
			return Comment::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Comment
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'comment';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'posted_by_login_id', $strAliasPrefix . 'posted_by_login_id');
			$objBuilder->AddSelectItem($strTableName, 'comment_privacy_type_id', $strAliasPrefix . 'comment_privacy_type_id');
			$objBuilder->AddSelectItem($strTableName, 'comment_category_id', $strAliasPrefix . 'comment_category_id');
			$objBuilder->AddSelectItem($strTableName, 'comment', $strAliasPrefix . 'comment');
			$objBuilder->AddSelectItem($strTableName, 'date_posted', $strAliasPrefix . 'date_posted');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Comment from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Comment::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Comment
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the Comment object
			$objToReturn = new Comment();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'posted_by_login_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'posted_by_login_id'] : $strAliasPrefix . 'posted_by_login_id';
			$objToReturn->intPostedByLoginId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'comment_privacy_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'comment_privacy_type_id'] : $strAliasPrefix . 'comment_privacy_type_id';
			$objToReturn->intCommentPrivacyTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'comment_category_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'comment_category_id'] : $strAliasPrefix . 'comment_category_id';
			$objToReturn->intCommentCategoryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'comment', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'comment'] : $strAliasPrefix . 'comment';
			$objToReturn->strComment = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_posted', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_posted'] : $strAliasPrefix . 'date_posted';
			$objToReturn->dttDatePosted = $objDbRow->GetColumn($strAliasName, 'DateTime');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'comment__';

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for PostedByLogin Early Binding
			$strAlias = $strAliasPrefix . 'posted_by_login_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPostedByLogin = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'posted_by_login_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CommentCategory Early Binding
			$strAlias = $strAliasPrefix . 'comment_category_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCommentCategory = CommentCategory::InstantiateDbRow($objDbRow, $strAliasPrefix . 'comment_category_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of Comments from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Comment[]
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
					$objItem = Comment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Comment::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Comment object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Comment next row resulting from the query
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
			return Comment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Comment object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Comment
		*/
		public static function LoadById($intId) {
			return Comment::QuerySingle(
				QQ::Equal(QQN::Comment()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of Comment objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Comment[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call Comment::QueryArray to perform the LoadArrayByPersonId query
			try {
				return Comment::QueryArray(
					QQ::Equal(QQN::Comment()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Comments
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call Comment::QueryCount to perform the CountByPersonId query
			return Comment::QueryCount(
				QQ::Equal(QQN::Comment()->PersonId, $intPersonId)
			);
		}
			
		/**
		 * Load an array of Comment objects,
		 * by PostedByLoginId Index(es)
		 * @param integer $intPostedByLoginId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Comment[]
		*/
		public static function LoadArrayByPostedByLoginId($intPostedByLoginId, $objOptionalClauses = null) {
			// Call Comment::QueryArray to perform the LoadArrayByPostedByLoginId query
			try {
				return Comment::QueryArray(
					QQ::Equal(QQN::Comment()->PostedByLoginId, $intPostedByLoginId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Comments
		 * by PostedByLoginId Index(es)
		 * @param integer $intPostedByLoginId
		 * @return int
		*/
		public static function CountByPostedByLoginId($intPostedByLoginId) {
			// Call Comment::QueryCount to perform the CountByPostedByLoginId query
			return Comment::QueryCount(
				QQ::Equal(QQN::Comment()->PostedByLoginId, $intPostedByLoginId)
			);
		}
			
		/**
		 * Load an array of Comment objects,
		 * by CommentPrivacyTypeId Index(es)
		 * @param integer $intCommentPrivacyTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Comment[]
		*/
		public static function LoadArrayByCommentPrivacyTypeId($intCommentPrivacyTypeId, $objOptionalClauses = null) {
			// Call Comment::QueryArray to perform the LoadArrayByCommentPrivacyTypeId query
			try {
				return Comment::QueryArray(
					QQ::Equal(QQN::Comment()->CommentPrivacyTypeId, $intCommentPrivacyTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Comments
		 * by CommentPrivacyTypeId Index(es)
		 * @param integer $intCommentPrivacyTypeId
		 * @return int
		*/
		public static function CountByCommentPrivacyTypeId($intCommentPrivacyTypeId) {
			// Call Comment::QueryCount to perform the CountByCommentPrivacyTypeId query
			return Comment::QueryCount(
				QQ::Equal(QQN::Comment()->CommentPrivacyTypeId, $intCommentPrivacyTypeId)
			);
		}
			
		/**
		 * Load an array of Comment objects,
		 * by CommentCategoryId Index(es)
		 * @param integer $intCommentCategoryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Comment[]
		*/
		public static function LoadArrayByCommentCategoryId($intCommentCategoryId, $objOptionalClauses = null) {
			// Call Comment::QueryArray to perform the LoadArrayByCommentCategoryId query
			try {
				return Comment::QueryArray(
					QQ::Equal(QQN::Comment()->CommentCategoryId, $intCommentCategoryId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Comments
		 * by CommentCategoryId Index(es)
		 * @param integer $intCommentCategoryId
		 * @return int
		*/
		public static function CountByCommentCategoryId($intCommentCategoryId) {
			// Call Comment::QueryCount to perform the CountByCommentCategoryId query
			return Comment::QueryCount(
				QQ::Equal(QQN::Comment()->CommentCategoryId, $intCommentCategoryId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			QApplication::$Database[2]->NonQuery('
				INSERT INTO `comment` (
					`id`,
					`person_id`,
					`posted_by_login_id`,
					`comment_privacy_type_id`,
					`comment_category_id`,
					`comment`,
					`date_posted`,
					sys_login_id,
					sys_action,
					sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intPersonId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intPostedByLoginId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intCommentPrivacyTypeId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intCommentCategoryId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strComment) . ',
					' . QApplication::$Database[2]->SqlVariable($this->dttDatePosted) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Save this Comment
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Comment::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `comment` (
							`person_id`,
							`posted_by_login_id`,
							`comment_privacy_type_id`,
							`comment_category_id`,
							`comment`,
							`date_posted`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intPostedByLoginId) . ',
							' . $objDatabase->SqlVariable($this->intCommentPrivacyTypeId) . ',
							' . $objDatabase->SqlVariable($this->intCommentCategoryId) . ',
							' . $objDatabase->SqlVariable($this->strComment) . ',
							' . $objDatabase->SqlVariable($this->dttDatePosted) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('comment', 'id');

					// Journaling
					$this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`comment`
						SET
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`posted_by_login_id` = ' . $objDatabase->SqlVariable($this->intPostedByLoginId) . ',
							`comment_privacy_type_id` = ' . $objDatabase->SqlVariable($this->intCommentPrivacyTypeId) . ',
							`comment_category_id` = ' . $objDatabase->SqlVariable($this->intCommentCategoryId) . ',
							`comment` = ' . $objDatabase->SqlVariable($this->strComment) . ',
							`date_posted` = ' . $objDatabase->SqlVariable($this->dttDatePosted) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					$this->Journal('UPDATE');
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
		 * Delete this Comment
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Comment with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Comment::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`comment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			$this->Journal('DELETE');
		}

		/**
		 * Delete all Comments
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Comment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`comment`');
		}

		/**
		 * Truncate comment table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Comment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `comment`');
		}

		/**
		 * Reload this Comment from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Comment object.');

			// Reload the Object
			$objReloaded = Comment::Load($this->intId);

			// Update $this's local variables to match
			$this->PersonId = $objReloaded->PersonId;
			$this->PostedByLoginId = $objReloaded->PostedByLoginId;
			$this->CommentPrivacyTypeId = $objReloaded->CommentPrivacyTypeId;
			$this->CommentCategoryId = $objReloaded->CommentCategoryId;
			$this->strComment = $objReloaded->strComment;
			$this->dttDatePosted = $objReloaded->dttDatePosted;
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

				case 'PostedByLoginId':
					// Gets the value for intPostedByLoginId (Not Null)
					// @return integer
					return $this->intPostedByLoginId;

				case 'CommentPrivacyTypeId':
					// Gets the value for intCommentPrivacyTypeId (Not Null)
					// @return integer
					return $this->intCommentPrivacyTypeId;

				case 'CommentCategoryId':
					// Gets the value for intCommentCategoryId (Not Null)
					// @return integer
					return $this->intCommentCategoryId;

				case 'Comment':
					// Gets the value for strComment 
					// @return string
					return $this->strComment;

				case 'DatePosted':
					// Gets the value for dttDatePosted (Not Null)
					// @return QDateTime
					return $this->dttDatePosted;


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

				case 'PostedByLogin':
					// Gets the value for the Login object referenced by intPostedByLoginId (Not Null)
					// @return Login
					try {
						if ((!$this->objPostedByLogin) && (!is_null($this->intPostedByLoginId)))
							$this->objPostedByLogin = Login::Load($this->intPostedByLoginId);
						return $this->objPostedByLogin;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CommentCategory':
					// Gets the value for the CommentCategory object referenced by intCommentCategoryId (Not Null)
					// @return CommentCategory
					try {
						if ((!$this->objCommentCategory) && (!is_null($this->intCommentCategoryId)))
							$this->objCommentCategory = CommentCategory::Load($this->intCommentCategoryId);
						return $this->objCommentCategory;
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

				case 'PostedByLoginId':
					// Sets the value for intPostedByLoginId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPostedByLogin = null;
						return ($this->intPostedByLoginId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CommentPrivacyTypeId':
					// Sets the value for intCommentPrivacyTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intCommentPrivacyTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CommentCategoryId':
					// Sets the value for intCommentCategoryId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCommentCategory = null;
						return ($this->intCommentCategoryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Comment':
					// Sets the value for strComment 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strComment = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DatePosted':
					// Sets the value for dttDatePosted (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDatePosted = QType::Cast($mixValue, QType::DateTime));
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
							throw new QCallerException('Unable to set an unsaved Person for this Comment');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'PostedByLogin':
					// Sets the value for the Login object referenced by intPostedByLoginId (Not Null)
					// @param Login $mixValue
					// @return Login
					if (is_null($mixValue)) {
						$this->intPostedByLoginId = null;
						$this->objPostedByLogin = null;
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
							throw new QCallerException('Unable to set an unsaved PostedByLogin for this Comment');

						// Update Local Member Variables
						$this->objPostedByLogin = $mixValue;
						$this->intPostedByLoginId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CommentCategory':
					// Sets the value for the CommentCategory object referenced by intCommentCategoryId (Not Null)
					// @param CommentCategory $mixValue
					// @return CommentCategory
					if (is_null($mixValue)) {
						$this->intCommentCategoryId = null;
						$this->objCommentCategory = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CommentCategory object
						try {
							$mixValue = QType::Cast($mixValue, 'CommentCategory');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED CommentCategory object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved CommentCategory for this Comment');

						// Update Local Member Variables
						$this->objCommentCategory = $mixValue;
						$this->intCommentCategoryId = $mixValue->Id;

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
			$strToReturn = '<complexType name="Comment"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="PostedByLogin" type="xsd1:Login"/>';
			$strToReturn .= '<element name="CommentPrivacyTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="CommentCategory" type="xsd1:CommentCategory"/>';
			$strToReturn .= '<element name="Comment" type="xsd:string"/>';
			$strToReturn .= '<element name="DatePosted" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Comment', $strComplexTypeArray)) {
				$strComplexTypeArray['Comment'] = Comment::GetSoapComplexTypeXml();
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				Login::AlterSoapComplexTypeArray($strComplexTypeArray);
				CommentCategory::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Comment::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Comment();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if ((property_exists($objSoapObject, 'PostedByLogin')) &&
				($objSoapObject->PostedByLogin))
				$objToReturn->PostedByLogin = Login::GetObjectFromSoapObject($objSoapObject->PostedByLogin);
			if (property_exists($objSoapObject, 'CommentPrivacyTypeId'))
				$objToReturn->intCommentPrivacyTypeId = $objSoapObject->CommentPrivacyTypeId;
			if ((property_exists($objSoapObject, 'CommentCategory')) &&
				($objSoapObject->CommentCategory))
				$objToReturn->CommentCategory = CommentCategory::GetObjectFromSoapObject($objSoapObject->CommentCategory);
			if (property_exists($objSoapObject, 'Comment'))
				$objToReturn->strComment = $objSoapObject->Comment;
			if (property_exists($objSoapObject, 'DatePosted'))
				$objToReturn->dttDatePosted = new QDateTime($objSoapObject->DatePosted);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Comment::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->objPostedByLogin)
				$objObject->objPostedByLogin = Login::GetSoapObjectFromObject($objObject->objPostedByLogin, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPostedByLoginId = null;
			if ($objObject->objCommentCategory)
				$objObject->objCommentCategory = CommentCategory::GetSoapObjectFromObject($objObject->objCommentCategory, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCommentCategoryId = null;
			if ($objObject->dttDatePosted)
				$objObject->dttDatePosted = $objObject->dttDatePosted->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeComment extends QQNode {
		protected $strTableName = 'comment';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Comment';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'PostedByLoginId':
					return new QQNode('posted_by_login_id', 'PostedByLoginId', 'integer', $this);
				case 'PostedByLogin':
					return new QQNodeLogin('posted_by_login_id', 'PostedByLogin', 'integer', $this);
				case 'CommentPrivacyTypeId':
					return new QQNode('comment_privacy_type_id', 'CommentPrivacyTypeId', 'integer', $this);
				case 'CommentCategoryId':
					return new QQNode('comment_category_id', 'CommentCategoryId', 'integer', $this);
				case 'CommentCategory':
					return new QQNodeCommentCategory('comment_category_id', 'CommentCategory', 'integer', $this);
				case 'Comment':
					return new QQNode('comment', 'Comment', 'string', $this);
				case 'DatePosted':
					return new QQNode('date_posted', 'DatePosted', 'QDateTime', $this);

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

	class QQReverseReferenceNodeComment extends QQReverseReferenceNode {
		protected $strTableName = 'comment';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Comment';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'PostedByLoginId':
					return new QQNode('posted_by_login_id', 'PostedByLoginId', 'integer', $this);
				case 'PostedByLogin':
					return new QQNodeLogin('posted_by_login_id', 'PostedByLogin', 'integer', $this);
				case 'CommentPrivacyTypeId':
					return new QQNode('comment_privacy_type_id', 'CommentPrivacyTypeId', 'integer', $this);
				case 'CommentCategoryId':
					return new QQNode('comment_category_id', 'CommentCategoryId', 'integer', $this);
				case 'CommentCategory':
					return new QQNodeCommentCategory('comment_category_id', 'CommentCategory', 'integer', $this);
				case 'Comment':
					return new QQNode('comment', 'Comment', 'string', $this);
				case 'DatePosted':
					return new QQNode('date_posted', 'DatePosted', 'QDateTime', $this);

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