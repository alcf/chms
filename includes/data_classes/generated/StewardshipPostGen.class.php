<?php
	/**
	 * The abstract StewardshipPostGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the StewardshipPost subclass which
	 * extends this StewardshipPostGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StewardshipPost class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $StewardshipBatchId the value for intStewardshipBatchId (Not Null)
	 * @property integer $PostNumber the value for intPostNumber (Not Null)
	 * @property QDateTime $DatePosted the value for dttDatePosted (Not Null)
	 * @property double $TotalAmount the value for fltTotalAmount 
	 * @property integer $CreatedByLoginId the value for intCreatedByLoginId (Not Null)
	 * @property StewardshipBatch $StewardshipBatch the value for the StewardshipBatch object referenced by intStewardshipBatchId (Not Null)
	 * @property Login $CreatedByLogin the value for the Login object referenced by intCreatedByLoginId (Not Null)
	 * @property StewardshipPostAmount $_StewardshipPostAmount the value for the private _objStewardshipPostAmount (Read-Only) if set due to an expansion on the stewardship_post_amount.stewardship_post_id reverse relationship
	 * @property StewardshipPostAmount[] $_StewardshipPostAmountArray the value for the private _objStewardshipPostAmountArray (Read-Only) if set due to an ExpandAsArray on the stewardship_post_amount.stewardship_post_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class StewardshipPostGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column stewardship_post.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post.stewardship_batch_id
		 * @var integer intStewardshipBatchId
		 */
		protected $intStewardshipBatchId;
		const StewardshipBatchIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post.post_number
		 * @var integer intPostNumber
		 */
		protected $intPostNumber;
		const PostNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post.date_posted
		 * @var QDateTime dttDatePosted
		 */
		protected $dttDatePosted;
		const DatePostedDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post.total_amount
		 * @var double fltTotalAmount
		 */
		protected $fltTotalAmount;
		const TotalAmountDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post.created_by_login_id
		 * @var integer intCreatedByLoginId
		 */
		protected $intCreatedByLoginId;
		const CreatedByLoginIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single StewardshipPostAmount object
		 * (of type StewardshipPostAmount), if this StewardshipPost object was restored with
		 * an expansion on the stewardship_post_amount association table.
		 * @var StewardshipPostAmount _objStewardshipPostAmount;
		 */
		private $_objStewardshipPostAmount;

		/**
		 * Private member variable that stores a reference to an array of StewardshipPostAmount objects
		 * (of type StewardshipPostAmount[]), if this StewardshipPost object was restored with
		 * an ExpandAsArray on the stewardship_post_amount association table.
		 * @var StewardshipPostAmount[] _objStewardshipPostAmountArray;
		 */
		private $_objStewardshipPostAmountArray = array();

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
		 * in the database column stewardship_post.stewardship_batch_id.
		 *
		 * NOTE: Always use the StewardshipBatch property getter to correctly retrieve this StewardshipBatch object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipBatch objStewardshipBatch
		 */
		protected $objStewardshipBatch;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column stewardship_post.created_by_login_id.
		 *
		 * NOTE: Always use the CreatedByLogin property getter to correctly retrieve this Login object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Login objCreatedByLogin
		 */
		protected $objCreatedByLogin;





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
		 * Load a StewardshipPost from PK Info
		 * @param integer $intId
		 * @return StewardshipPost
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return StewardshipPost::QuerySingle(
				QQ::Equal(QQN::StewardshipPost()->Id, $intId)
			);
		}

		/**
		 * Load all StewardshipPosts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPost[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call StewardshipPost::QueryArray to perform the LoadAll query
			try {
				return StewardshipPost::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all StewardshipPosts
		 * @return int
		 */
		public static function CountAll() {
			// Call StewardshipPost::QueryCount to perform the CountAll query
			return StewardshipPost::QueryCount(QQ::All());
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
			$objDatabase = StewardshipPost::GetDatabase();

			// Create/Build out the QueryBuilder object with StewardshipPost-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'stewardship_post');
			StewardshipPost::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('stewardship_post');

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
		 * Static Qcodo Query method to query for a single StewardshipPost object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipPost the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPost::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new StewardshipPost object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = StewardshipPost::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return StewardshipPost::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of StewardshipPost objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipPost[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPost::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return StewardshipPost::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = StewardshipPost::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of StewardshipPost objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPost::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = StewardshipPost::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'stewardship_post_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with StewardshipPost-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				StewardshipPost::GetSelectFields($objQueryBuilder);
				StewardshipPost::GetFromFields($objQueryBuilder);

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
			return StewardshipPost::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this StewardshipPost
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'stewardship_post';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_batch_id', $strAliasPrefix . 'stewardship_batch_id');
			$objBuilder->AddSelectItem($strTableName, 'post_number', $strAliasPrefix . 'post_number');
			$objBuilder->AddSelectItem($strTableName, 'date_posted', $strAliasPrefix . 'date_posted');
			$objBuilder->AddSelectItem($strTableName, 'total_amount', $strAliasPrefix . 'total_amount');
			$objBuilder->AddSelectItem($strTableName, 'created_by_login_id', $strAliasPrefix . 'created_by_login_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a StewardshipPost from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this StewardshipPost::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipPost
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
					$strAliasPrefix = 'stewardship_post__';


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

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'stewardship_post__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the StewardshipPost object
			$objToReturn = new StewardshipPost();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_batch_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_batch_id'] : $strAliasPrefix . 'stewardship_batch_id';
			$objToReturn->intStewardshipBatchId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'post_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'post_number'] : $strAliasPrefix . 'post_number';
			$objToReturn->intPostNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_posted', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_posted'] : $strAliasPrefix . 'date_posted';
			$objToReturn->dttDatePosted = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'total_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'total_amount'] : $strAliasPrefix . 'total_amount';
			$objToReturn->fltTotalAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'created_by_login_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'created_by_login_id'] : $strAliasPrefix . 'created_by_login_id';
			$objToReturn->intCreatedByLoginId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'stewardship_post__';

			// Check for StewardshipBatch Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_batch_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipBatch = StewardshipBatch::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_batch_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CreatedByLogin Early Binding
			$strAlias = $strAliasPrefix . 'created_by_login_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCreatedByLogin = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'created_by_login_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for StewardshipPostAmount Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshippostamount__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipPostAmountArray[] = StewardshipPostAmount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippostamount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipPostAmount = StewardshipPostAmount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippostamount__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of StewardshipPosts from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipPost[]
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
					$objItem = StewardshipPost::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = StewardshipPost::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single StewardshipPost object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return StewardshipPost next row resulting from the query
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
			return StewardshipPost::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single StewardshipPost object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return StewardshipPost
		*/
		public static function LoadById($intId) {
			return StewardshipPost::QuerySingle(
				QQ::Equal(QQN::StewardshipPost()->Id, $intId)
			);
		}
			
		/**
		 * Load a single StewardshipPost object,
		 * by StewardshipBatchId, PostNumber Index(es)
		 * @param integer $intStewardshipBatchId
		 * @param integer $intPostNumber
		 * @return StewardshipPost
		*/
		public static function LoadByStewardshipBatchIdPostNumber($intStewardshipBatchId, $intPostNumber) {
			return StewardshipPost::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::StewardshipPost()->StewardshipBatchId, $intStewardshipBatchId),
				QQ::Equal(QQN::StewardshipPost()->PostNumber, $intPostNumber)
				)
			);
		}
			
		/**
		 * Load an array of StewardshipPost objects,
		 * by StewardshipBatchId Index(es)
		 * @param integer $intStewardshipBatchId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPost[]
		*/
		public static function LoadArrayByStewardshipBatchId($intStewardshipBatchId, $objOptionalClauses = null) {
			// Call StewardshipPost::QueryArray to perform the LoadArrayByStewardshipBatchId query
			try {
				return StewardshipPost::QueryArray(
					QQ::Equal(QQN::StewardshipPost()->StewardshipBatchId, $intStewardshipBatchId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipPosts
		 * by StewardshipBatchId Index(es)
		 * @param integer $intStewardshipBatchId
		 * @return int
		*/
		public static function CountByStewardshipBatchId($intStewardshipBatchId) {
			// Call StewardshipPost::QueryCount to perform the CountByStewardshipBatchId query
			return StewardshipPost::QueryCount(
				QQ::Equal(QQN::StewardshipPost()->StewardshipBatchId, $intStewardshipBatchId)
			);
		}
			
		/**
		 * Load an array of StewardshipPost objects,
		 * by CreatedByLoginId Index(es)
		 * @param integer $intCreatedByLoginId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPost[]
		*/
		public static function LoadArrayByCreatedByLoginId($intCreatedByLoginId, $objOptionalClauses = null) {
			// Call StewardshipPost::QueryArray to perform the LoadArrayByCreatedByLoginId query
			try {
				return StewardshipPost::QueryArray(
					QQ::Equal(QQN::StewardshipPost()->CreatedByLoginId, $intCreatedByLoginId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipPosts
		 * by CreatedByLoginId Index(es)
		 * @param integer $intCreatedByLoginId
		 * @return int
		*/
		public static function CountByCreatedByLoginId($intCreatedByLoginId) {
			// Call StewardshipPost::QueryCount to perform the CountByCreatedByLoginId query
			return StewardshipPost::QueryCount(
				QQ::Equal(QQN::StewardshipPost()->CreatedByLoginId, $intCreatedByLoginId)
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
				INSERT INTO `stewardship_post` (
					`id`,
					`stewardship_batch_id`,
					`post_number`,
					`date_posted`,
					`total_amount`,
					`created_by_login_id`,
					sys_login_id,
					sys_action,
					sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intStewardshipBatchId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intPostNumber) . ',
					' . QApplication::$Database[2]->SqlVariable($this->dttDatePosted) . ',
					' . QApplication::$Database[2]->SqlVariable($this->fltTotalAmount) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intCreatedByLoginId) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Save this StewardshipPost
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPost::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `stewardship_post` (
							`stewardship_batch_id`,
							`post_number`,
							`date_posted`,
							`total_amount`,
							`created_by_login_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . ',
							' . $objDatabase->SqlVariable($this->intPostNumber) . ',
							' . $objDatabase->SqlVariable($this->dttDatePosted) . ',
							' . $objDatabase->SqlVariable($this->fltTotalAmount) . ',
							' . $objDatabase->SqlVariable($this->intCreatedByLoginId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('stewardship_post', 'id');

					// Journaling
					$this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`stewardship_post`
						SET
							`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . ',
							`post_number` = ' . $objDatabase->SqlVariable($this->intPostNumber) . ',
							`date_posted` = ' . $objDatabase->SqlVariable($this->dttDatePosted) . ',
							`total_amount` = ' . $objDatabase->SqlVariable($this->fltTotalAmount) . ',
							`created_by_login_id` = ' . $objDatabase->SqlVariable($this->intCreatedByLoginId) . '
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
		 * Delete this StewardshipPost
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this StewardshipPost with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipPost::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			$this->Journal('DELETE');
		}

		/**
		 * Delete all StewardshipPosts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPost::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post`');
		}

		/**
		 * Truncate stewardship_post table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPost::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `stewardship_post`');
		}

		/**
		 * Reload this StewardshipPost from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved StewardshipPost object.');

			// Reload the Object
			$objReloaded = StewardshipPost::Load($this->intId);

			// Update $this's local variables to match
			$this->StewardshipBatchId = $objReloaded->StewardshipBatchId;
			$this->intPostNumber = $objReloaded->intPostNumber;
			$this->dttDatePosted = $objReloaded->dttDatePosted;
			$this->fltTotalAmount = $objReloaded->fltTotalAmount;
			$this->CreatedByLoginId = $objReloaded->CreatedByLoginId;
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

				case 'StewardshipBatchId':
					// Gets the value for intStewardshipBatchId (Not Null)
					// @return integer
					return $this->intStewardshipBatchId;

				case 'PostNumber':
					// Gets the value for intPostNumber (Not Null)
					// @return integer
					return $this->intPostNumber;

				case 'DatePosted':
					// Gets the value for dttDatePosted (Not Null)
					// @return QDateTime
					return $this->dttDatePosted;

				case 'TotalAmount':
					// Gets the value for fltTotalAmount 
					// @return double
					return $this->fltTotalAmount;

				case 'CreatedByLoginId':
					// Gets the value for intCreatedByLoginId (Not Null)
					// @return integer
					return $this->intCreatedByLoginId;


				///////////////////
				// Member Objects
				///////////////////
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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_StewardshipPostAmount':
					// Gets the value for the private _objStewardshipPostAmount (Read-Only)
					// if set due to an expansion on the stewardship_post_amount.stewardship_post_id reverse relationship
					// @return StewardshipPostAmount
					return $this->_objStewardshipPostAmount;

				case '_StewardshipPostAmountArray':
					// Gets the value for the private _objStewardshipPostAmountArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_post_amount.stewardship_post_id reverse relationship
					// @return StewardshipPostAmount[]
					return (array) $this->_objStewardshipPostAmountArray;


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

				case 'PostNumber':
					// Sets the value for intPostNumber (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intPostNumber = QType::Cast($mixValue, QType::Integer));
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


				///////////////////
				// Member Objects
				///////////////////
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
							throw new QCallerException('Unable to set an unsaved StewardshipBatch for this StewardshipPost');

						// Update Local Member Variables
						$this->objStewardshipBatch = $mixValue;
						$this->intStewardshipBatchId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved CreatedByLogin for this StewardshipPost');

						// Update Local Member Variables
						$this->objCreatedByLogin = $mixValue;
						$this->intCreatedByLoginId = $mixValue->Id;

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
				return StewardshipPostAmount::LoadArrayByStewardshipPostId($this->intId, $objOptionalClauses);
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

			return StewardshipPostAmount::CountByStewardshipPostId($this->intId);
		}

		/**
		 * Associates a StewardshipPostAmount
		 * @param StewardshipPostAmount $objStewardshipPostAmount
		 * @return void
		*/ 
		public function AssociateStewardshipPostAmount(StewardshipPostAmount $objStewardshipPostAmount) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPostAmount on this unsaved StewardshipPost.');
			if ((is_null($objStewardshipPostAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPostAmount on this StewardshipPost with an unsaved StewardshipPostAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipPost::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_amount`
				SET
					`stewardship_post_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostAmount->Id) . '
			');
		}

		/**
		 * Unassociates a StewardshipPostAmount
		 * @param StewardshipPostAmount $objStewardshipPostAmount
		 * @return void
		*/ 
		public function UnassociateStewardshipPostAmount(StewardshipPostAmount $objStewardshipPostAmount) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this unsaved StewardshipPost.');
			if ((is_null($objStewardshipPostAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this StewardshipPost with an unsaved StewardshipPostAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipPost::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_amount`
				SET
					`stewardship_post_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostAmount->Id) . ' AND
					`stewardship_post_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all StewardshipPostAmounts
		 * @return void
		*/ 
		public function UnassociateAllStewardshipPostAmounts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this unsaved StewardshipPost.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipPost::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post_amount`
				SET
					`stewardship_post_id` = null
				WHERE
					`stewardship_post_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipPostAmount
		 * @param StewardshipPostAmount $objStewardshipPostAmount
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipPostAmount(StewardshipPostAmount $objStewardshipPostAmount) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this unsaved StewardshipPost.');
			if ((is_null($objStewardshipPostAmount->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this StewardshipPost with an unsaved StewardshipPostAmount.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipPost::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_amount`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPostAmount->Id) . ' AND
					`stewardship_post_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated StewardshipPostAmounts
		 * @return void
		*/ 
		public function DeleteAllStewardshipPostAmounts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPostAmount on this unsaved StewardshipPost.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipPost::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_amount`
				WHERE
					`stewardship_post_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="StewardshipPost"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="StewardshipBatch" type="xsd1:StewardshipBatch"/>';
			$strToReturn .= '<element name="PostNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="DatePosted" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="TotalAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="CreatedByLogin" type="xsd1:Login"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('StewardshipPost', $strComplexTypeArray)) {
				$strComplexTypeArray['StewardshipPost'] = StewardshipPost::GetSoapComplexTypeXml();
				StewardshipBatch::AlterSoapComplexTypeArray($strComplexTypeArray);
				Login::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, StewardshipPost::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new StewardshipPost();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'StewardshipBatch')) &&
				($objSoapObject->StewardshipBatch))
				$objToReturn->StewardshipBatch = StewardshipBatch::GetObjectFromSoapObject($objSoapObject->StewardshipBatch);
			if (property_exists($objSoapObject, 'PostNumber'))
				$objToReturn->intPostNumber = $objSoapObject->PostNumber;
			if (property_exists($objSoapObject, 'DatePosted'))
				$objToReturn->dttDatePosted = new QDateTime($objSoapObject->DatePosted);
			if (property_exists($objSoapObject, 'TotalAmount'))
				$objToReturn->fltTotalAmount = $objSoapObject->TotalAmount;
			if ((property_exists($objSoapObject, 'CreatedByLogin')) &&
				($objSoapObject->CreatedByLogin))
				$objToReturn->CreatedByLogin = Login::GetObjectFromSoapObject($objSoapObject->CreatedByLogin);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, StewardshipPost::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objStewardshipBatch)
				$objObject->objStewardshipBatch = StewardshipBatch::GetSoapObjectFromObject($objObject->objStewardshipBatch, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipBatchId = null;
			if ($objObject->dttDatePosted)
				$objObject->dttDatePosted = $objObject->dttDatePosted->__toString(QDateTime::FormatSoap);
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

	class QQNodeStewardshipPost extends QQNode {
		protected $strTableName = 'stewardship_post';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipPost';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'StewardshipBatchId':
					return new QQNode('stewardship_batch_id', 'StewardshipBatchId', 'integer', $this);
				case 'StewardshipBatch':
					return new QQNodeStewardshipBatch('stewardship_batch_id', 'StewardshipBatch', 'integer', $this);
				case 'PostNumber':
					return new QQNode('post_number', 'PostNumber', 'integer', $this);
				case 'DatePosted':
					return new QQNode('date_posted', 'DatePosted', 'QDateTime', $this);
				case 'TotalAmount':
					return new QQNode('total_amount', 'TotalAmount', 'double', $this);
				case 'CreatedByLoginId':
					return new QQNode('created_by_login_id', 'CreatedByLoginId', 'integer', $this);
				case 'CreatedByLogin':
					return new QQNodeLogin('created_by_login_id', 'CreatedByLogin', 'integer', $this);
				case 'StewardshipPostAmount':
					return new QQReverseReferenceNodeStewardshipPostAmount($this, 'stewardshippostamount', 'reverse_reference', 'stewardship_post_id');

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

	class QQReverseReferenceNodeStewardshipPost extends QQReverseReferenceNode {
		protected $strTableName = 'stewardship_post';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipPost';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'StewardshipBatchId':
					return new QQNode('stewardship_batch_id', 'StewardshipBatchId', 'integer', $this);
				case 'StewardshipBatch':
					return new QQNodeStewardshipBatch('stewardship_batch_id', 'StewardshipBatch', 'integer', $this);
				case 'PostNumber':
					return new QQNode('post_number', 'PostNumber', 'integer', $this);
				case 'DatePosted':
					return new QQNode('date_posted', 'DatePosted', 'QDateTime', $this);
				case 'TotalAmount':
					return new QQNode('total_amount', 'TotalAmount', 'double', $this);
				case 'CreatedByLoginId':
					return new QQNode('created_by_login_id', 'CreatedByLoginId', 'integer', $this);
				case 'CreatedByLogin':
					return new QQNodeLogin('created_by_login_id', 'CreatedByLogin', 'integer', $this);
				case 'StewardshipPostAmount':
					return new QQReverseReferenceNodeStewardshipPostAmount($this, 'stewardshippostamount', 'reverse_reference', 'stewardship_post_id');

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