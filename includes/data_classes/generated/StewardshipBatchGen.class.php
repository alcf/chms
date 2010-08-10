<?php
	/**
	 * The abstract StewardshipBatchGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the StewardshipBatch subclass which
	 * extends this StewardshipBatchGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StewardshipBatch class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $StewardshipBatchStatusTypeId the value for intStewardshipBatchStatusTypeId (Not Null)
	 * @property QDateTime $DateEntered the value for dttDateEntered (Not Null)
	 * @property string $BatchLabel the value for strBatchLabel (Not Null)
	 * @property string $Description the value for strDescription 
	 * @property double $ReportedTotalAmount the value for fltReportedTotalAmount 
	 * @property double $ActualTotalAmount the value for fltActualTotalAmount 
	 * @property double $PostedTotalAmount the value for fltPostedTotalAmount 
	 * @property StewardshipContribution $_StewardshipContribution the value for the private _objStewardshipContribution (Read-Only) if set due to an expansion on the stewardship_contribution.stewardship_batch_id reverse relationship
	 * @property StewardshipContribution[] $_StewardshipContributionArray the value for the private _objStewardshipContributionArray (Read-Only) if set due to an ExpandAsArray on the stewardship_contribution.stewardship_batch_id reverse relationship
	 * @property StewardshipPost $_StewardshipPost the value for the private _objStewardshipPost (Read-Only) if set due to an expansion on the stewardship_post.stewardship_batch_id reverse relationship
	 * @property StewardshipPost[] $_StewardshipPostArray the value for the private _objStewardshipPostArray (Read-Only) if set due to an ExpandAsArray on the stewardship_post.stewardship_batch_id reverse relationship
	 * @property StewardshipStack $_StewardshipStack the value for the private _objStewardshipStack (Read-Only) if set due to an expansion on the stewardship_stack.stewardship_batch_id reverse relationship
	 * @property StewardshipStack[] $_StewardshipStackArray the value for the private _objStewardshipStackArray (Read-Only) if set due to an ExpandAsArray on the stewardship_stack.stewardship_batch_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class StewardshipBatchGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column stewardship_batch.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_batch.stewardship_batch_status_type_id
		 * @var integer intStewardshipBatchStatusTypeId
		 */
		protected $intStewardshipBatchStatusTypeId;
		const StewardshipBatchStatusTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_batch.date_entered
		 * @var QDateTime dttDateEntered
		 */
		protected $dttDateEntered;
		const DateEnteredDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_batch.batch_label
		 * @var string strBatchLabel
		 */
		protected $strBatchLabel;
		const BatchLabelMaxLength = 1;
		const BatchLabelDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_batch.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 255;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_batch.reported_total_amount
		 * @var double fltReportedTotalAmount
		 */
		protected $fltReportedTotalAmount;
		const ReportedTotalAmountDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_batch.actual_total_amount
		 * @var double fltActualTotalAmount
		 */
		protected $fltActualTotalAmount;
		const ActualTotalAmountDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_batch.posted_total_amount
		 * @var double fltPostedTotalAmount
		 */
		protected $fltPostedTotalAmount;
		const PostedTotalAmountDefault = null;


		/**
		 * Private member variable that stores a reference to a single StewardshipContribution object
		 * (of type StewardshipContribution), if this StewardshipBatch object was restored with
		 * an expansion on the stewardship_contribution association table.
		 * @var StewardshipContribution _objStewardshipContribution;
		 */
		private $_objStewardshipContribution;

		/**
		 * Private member variable that stores a reference to an array of StewardshipContribution objects
		 * (of type StewardshipContribution[]), if this StewardshipBatch object was restored with
		 * an ExpandAsArray on the stewardship_contribution association table.
		 * @var StewardshipContribution[] _objStewardshipContributionArray;
		 */
		private $_objStewardshipContributionArray = array();

		/**
		 * Private member variable that stores a reference to a single StewardshipPost object
		 * (of type StewardshipPost), if this StewardshipBatch object was restored with
		 * an expansion on the stewardship_post association table.
		 * @var StewardshipPost _objStewardshipPost;
		 */
		private $_objStewardshipPost;

		/**
		 * Private member variable that stores a reference to an array of StewardshipPost objects
		 * (of type StewardshipPost[]), if this StewardshipBatch object was restored with
		 * an ExpandAsArray on the stewardship_post association table.
		 * @var StewardshipPost[] _objStewardshipPostArray;
		 */
		private $_objStewardshipPostArray = array();

		/**
		 * Private member variable that stores a reference to a single StewardshipStack object
		 * (of type StewardshipStack), if this StewardshipBatch object was restored with
		 * an expansion on the stewardship_stack association table.
		 * @var StewardshipStack _objStewardshipStack;
		 */
		private $_objStewardshipStack;

		/**
		 * Private member variable that stores a reference to an array of StewardshipStack objects
		 * (of type StewardshipStack[]), if this StewardshipBatch object was restored with
		 * an ExpandAsArray on the stewardship_stack association table.
		 * @var StewardshipStack[] _objStewardshipStackArray;
		 */
		private $_objStewardshipStackArray = array();

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
		 * Load a StewardshipBatch from PK Info
		 * @param integer $intId
		 * @return StewardshipBatch
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return StewardshipBatch::QuerySingle(
				QQ::Equal(QQN::StewardshipBatch()->Id, $intId)
			);
		}

		/**
		 * Load all StewardshipBatches
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipBatch[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call StewardshipBatch::QueryArray to perform the LoadAll query
			try {
				return StewardshipBatch::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all StewardshipBatches
		 * @return int
		 */
		public static function CountAll() {
			// Call StewardshipBatch::QueryCount to perform the CountAll query
			return StewardshipBatch::QueryCount(QQ::All());
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
			$objDatabase = StewardshipBatch::GetDatabase();

			// Create/Build out the QueryBuilder object with StewardshipBatch-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'stewardship_batch');
			StewardshipBatch::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('stewardship_batch');

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
		 * Static Qcodo Query method to query for a single StewardshipBatch object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipBatch the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipBatch::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new StewardshipBatch object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return StewardshipBatch::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of StewardshipBatch objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipBatch[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipBatch::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return StewardshipBatch::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = StewardshipBatch::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of StewardshipBatch objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipBatch::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = StewardshipBatch::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'stewardship_batch_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with StewardshipBatch-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				StewardshipBatch::GetSelectFields($objQueryBuilder);
				StewardshipBatch::GetFromFields($objQueryBuilder);

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
			return StewardshipBatch::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this StewardshipBatch
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'stewardship_batch';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_batch_status_type_id', $strAliasPrefix . 'stewardship_batch_status_type_id');
			$objBuilder->AddSelectItem($strTableName, 'date_entered', $strAliasPrefix . 'date_entered');
			$objBuilder->AddSelectItem($strTableName, 'batch_label', $strAliasPrefix . 'batch_label');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'reported_total_amount', $strAliasPrefix . 'reported_total_amount');
			$objBuilder->AddSelectItem($strTableName, 'actual_total_amount', $strAliasPrefix . 'actual_total_amount');
			$objBuilder->AddSelectItem($strTableName, 'posted_total_amount', $strAliasPrefix . 'posted_total_amount');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a StewardshipBatch from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this StewardshipBatch::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipBatch
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
					$strAliasPrefix = 'stewardship_batch__';


				$strAlias = $strAliasPrefix . 'stewardshipcontribution__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStewardshipContributionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStewardshipContributionArray[$intPreviousChildItemCount - 1];
						$objChildItem = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStewardshipContributionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStewardshipContributionArray[] = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'stewardshippost__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStewardshipPostArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStewardshipPostArray[$intPreviousChildItemCount - 1];
						$objChildItem = StewardshipPost::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippost__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStewardshipPostArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStewardshipPostArray[] = StewardshipPost::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippost__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'stewardshipstack__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStewardshipStackArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStewardshipStackArray[$intPreviousChildItemCount - 1];
						$objChildItem = StewardshipStack::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipstack__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStewardshipStackArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStewardshipStackArray[] = StewardshipStack::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipstack__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'stewardship_batch__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the StewardshipBatch object
			$objToReturn = new StewardshipBatch();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_batch_status_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_batch_status_type_id'] : $strAliasPrefix . 'stewardship_batch_status_type_id';
			$objToReturn->intStewardshipBatchStatusTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_entered', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_entered'] : $strAliasPrefix . 'date_entered';
			$objToReturn->dttDateEntered = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'batch_label', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'batch_label'] : $strAliasPrefix . 'batch_label';
			$objToReturn->strBatchLabel = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'reported_total_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'reported_total_amount'] : $strAliasPrefix . 'reported_total_amount';
			$objToReturn->fltReportedTotalAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'actual_total_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'actual_total_amount'] : $strAliasPrefix . 'actual_total_amount';
			$objToReturn->fltActualTotalAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'posted_total_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'posted_total_amount'] : $strAliasPrefix . 'posted_total_amount';
			$objToReturn->fltPostedTotalAmount = $objDbRow->GetColumn($strAliasName, 'Float');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'stewardship_batch__';




			// Check for StewardshipContribution Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshipcontribution__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipContributionArray[] = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipContribution = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StewardshipPost Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshippost__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipPostArray[] = StewardshipPost::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippost__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipPost = StewardshipPost::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippost__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StewardshipStack Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshipstack__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipStackArray[] = StewardshipStack::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipstack__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipStack = StewardshipStack::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipstack__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of StewardshipBatches from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipBatch[]
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
					$objItem = StewardshipBatch::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = StewardshipBatch::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single StewardshipBatch object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return StewardshipBatch next row resulting from the query
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
			return StewardshipBatch::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single StewardshipBatch object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return StewardshipBatch
		*/
		public static function LoadById($intId) {
			return StewardshipBatch::QuerySingle(
				QQ::Equal(QQN::StewardshipBatch()->Id, $intId)
			);
		}
			
		/**
		 * Load a single StewardshipBatch object,
		 * by DateEntered, BatchLabel Index(es)
		 * @param QDateTime $dttDateEntered
		 * @param string $strBatchLabel
		 * @return StewardshipBatch
		*/
		public static function LoadByDateEnteredBatchLabel($dttDateEntered, $strBatchLabel) {
			return StewardshipBatch::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::StewardshipBatch()->DateEntered, $dttDateEntered),
				QQ::Equal(QQN::StewardshipBatch()->BatchLabel, $strBatchLabel)
				)
			);
		}
			
		/**
		 * Load an array of StewardshipBatch objects,
		 * by StewardshipBatchStatusTypeId Index(es)
		 * @param integer $intStewardshipBatchStatusTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipBatch[]
		*/
		public static function LoadArrayByStewardshipBatchStatusTypeId($intStewardshipBatchStatusTypeId, $objOptionalClauses = null) {
			// Call StewardshipBatch::QueryArray to perform the LoadArrayByStewardshipBatchStatusTypeId query
			try {
				return StewardshipBatch::QueryArray(
					QQ::Equal(QQN::StewardshipBatch()->StewardshipBatchStatusTypeId, $intStewardshipBatchStatusTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipBatches
		 * by StewardshipBatchStatusTypeId Index(es)
		 * @param integer $intStewardshipBatchStatusTypeId
		 * @return int
		*/
		public static function CountByStewardshipBatchStatusTypeId($intStewardshipBatchStatusTypeId) {
			// Call StewardshipBatch::QueryCount to perform the CountByStewardshipBatchStatusTypeId query
			return StewardshipBatch::QueryCount(
				QQ::Equal(QQN::StewardshipBatch()->StewardshipBatchStatusTypeId, $intStewardshipBatchStatusTypeId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this StewardshipBatch
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `stewardship_batch` (
							`stewardship_batch_status_type_id`,
							`date_entered`,
							`batch_label`,
							`description`,
							`reported_total_amount`,
							`actual_total_amount`,
							`posted_total_amount`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intStewardshipBatchStatusTypeId) . ',
							' . $objDatabase->SqlVariable($this->dttDateEntered) . ',
							' . $objDatabase->SqlVariable($this->strBatchLabel) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->fltReportedTotalAmount) . ',
							' . $objDatabase->SqlVariable($this->fltActualTotalAmount) . ',
							' . $objDatabase->SqlVariable($this->fltPostedTotalAmount) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('stewardship_batch', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`stewardship_batch`
						SET
							`stewardship_batch_status_type_id` = ' . $objDatabase->SqlVariable($this->intStewardshipBatchStatusTypeId) . ',
							`date_entered` = ' . $objDatabase->SqlVariable($this->dttDateEntered) . ',
							`batch_label` = ' . $objDatabase->SqlVariable($this->strBatchLabel) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`reported_total_amount` = ' . $objDatabase->SqlVariable($this->fltReportedTotalAmount) . ',
							`actual_total_amount` = ' . $objDatabase->SqlVariable($this->fltActualTotalAmount) . ',
							`posted_total_amount` = ' . $objDatabase->SqlVariable($this->fltPostedTotalAmount) . '
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
		 * Delete this StewardshipBatch
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this StewardshipBatch with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_batch`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all StewardshipBatches
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_batch`');
		}

		/**
		 * Truncate stewardship_batch table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `stewardship_batch`');
		}

		/**
		 * Reload this StewardshipBatch from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved StewardshipBatch object.');

			// Reload the Object
			$objReloaded = StewardshipBatch::Load($this->intId);

			// Update $this's local variables to match
			$this->StewardshipBatchStatusTypeId = $objReloaded->StewardshipBatchStatusTypeId;
			$this->dttDateEntered = $objReloaded->dttDateEntered;
			$this->strBatchLabel = $objReloaded->strBatchLabel;
			$this->strDescription = $objReloaded->strDescription;
			$this->fltReportedTotalAmount = $objReloaded->fltReportedTotalAmount;
			$this->fltActualTotalAmount = $objReloaded->fltActualTotalAmount;
			$this->fltPostedTotalAmount = $objReloaded->fltPostedTotalAmount;
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

				case 'StewardshipBatchStatusTypeId':
					// Gets the value for intStewardshipBatchStatusTypeId (Not Null)
					// @return integer
					return $this->intStewardshipBatchStatusTypeId;

				case 'DateEntered':
					// Gets the value for dttDateEntered (Not Null)
					// @return QDateTime
					return $this->dttDateEntered;

				case 'BatchLabel':
					// Gets the value for strBatchLabel (Not Null)
					// @return string
					return $this->strBatchLabel;

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;

				case 'ReportedTotalAmount':
					// Gets the value for fltReportedTotalAmount 
					// @return double
					return $this->fltReportedTotalAmount;

				case 'ActualTotalAmount':
					// Gets the value for fltActualTotalAmount 
					// @return double
					return $this->fltActualTotalAmount;

				case 'PostedTotalAmount':
					// Gets the value for fltPostedTotalAmount 
					// @return double
					return $this->fltPostedTotalAmount;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_StewardshipContribution':
					// Gets the value for the private _objStewardshipContribution (Read-Only)
					// if set due to an expansion on the stewardship_contribution.stewardship_batch_id reverse relationship
					// @return StewardshipContribution
					return $this->_objStewardshipContribution;

				case '_StewardshipContributionArray':
					// Gets the value for the private _objStewardshipContributionArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_contribution.stewardship_batch_id reverse relationship
					// @return StewardshipContribution[]
					return (array) $this->_objStewardshipContributionArray;

				case '_StewardshipPost':
					// Gets the value for the private _objStewardshipPost (Read-Only)
					// if set due to an expansion on the stewardship_post.stewardship_batch_id reverse relationship
					// @return StewardshipPost
					return $this->_objStewardshipPost;

				case '_StewardshipPostArray':
					// Gets the value for the private _objStewardshipPostArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_post.stewardship_batch_id reverse relationship
					// @return StewardshipPost[]
					return (array) $this->_objStewardshipPostArray;

				case '_StewardshipStack':
					// Gets the value for the private _objStewardshipStack (Read-Only)
					// if set due to an expansion on the stewardship_stack.stewardship_batch_id reverse relationship
					// @return StewardshipStack
					return $this->_objStewardshipStack;

				case '_StewardshipStackArray':
					// Gets the value for the private _objStewardshipStackArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_stack.stewardship_batch_id reverse relationship
					// @return StewardshipStack[]
					return (array) $this->_objStewardshipStackArray;


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
				case 'StewardshipBatchStatusTypeId':
					// Sets the value for intStewardshipBatchStatusTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intStewardshipBatchStatusTypeId = QType::Cast($mixValue, QType::Integer));
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

				case 'BatchLabel':
					// Sets the value for strBatchLabel (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strBatchLabel = QType::Cast($mixValue, QType::String));
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

				case 'ReportedTotalAmount':
					// Sets the value for fltReportedTotalAmount 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltReportedTotalAmount = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ActualTotalAmount':
					// Sets the value for fltActualTotalAmount 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltActualTotalAmount = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PostedTotalAmount':
					// Sets the value for fltPostedTotalAmount 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltPostedTotalAmount = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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

			
		
		// Related Objects' Methods for StewardshipContribution
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StewardshipContributions as an array of StewardshipContribution objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/ 
		public function GetStewardshipContributionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StewardshipContribution::LoadArrayByStewardshipBatchId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StewardshipContributions
		 * @return int
		*/ 
		public function CountStewardshipContributions() {
			if ((is_null($this->intId)))
				return 0;

			return StewardshipContribution::CountByStewardshipBatchId($this->intId);
		}

		/**
		 * Associates a StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function AssociateStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContribution on this unsaved StewardshipBatch.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContribution on this StewardshipBatch with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . '
			');
		}

		/**
		 * Unassociates a StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function UnassociateStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved StewardshipBatch.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this StewardshipBatch with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`stewardship_batch_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . ' AND
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all StewardshipContributions
		 * @return void
		*/ 
		public function UnassociateAllStewardshipContributions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved StewardshipBatch.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`stewardship_batch_id` = null
				WHERE
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved StewardshipBatch.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this StewardshipBatch with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . ' AND
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated StewardshipContributions
		 * @return void
		*/ 
		public function DeleteAllStewardshipContributions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved StewardshipBatch.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution`
				WHERE
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StewardshipPost
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StewardshipPosts as an array of StewardshipPost objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPost[]
		*/ 
		public function GetStewardshipPostArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StewardshipPost::LoadArrayByStewardshipBatchId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StewardshipPosts
		 * @return int
		*/ 
		public function CountStewardshipPosts() {
			if ((is_null($this->intId)))
				return 0;

			return StewardshipPost::CountByStewardshipBatchId($this->intId);
		}

		/**
		 * Associates a StewardshipPost
		 * @param StewardshipPost $objStewardshipPost
		 * @return void
		*/ 
		public function AssociateStewardshipPost(StewardshipPost $objStewardshipPost) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPost on this unsaved StewardshipBatch.');
			if ((is_null($objStewardshipPost->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPost on this StewardshipBatch with an unsaved StewardshipPost.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post`
				SET
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPost->Id) . '
			');
		}

		/**
		 * Unassociates a StewardshipPost
		 * @param StewardshipPost $objStewardshipPost
		 * @return void
		*/ 
		public function UnassociateStewardshipPost(StewardshipPost $objStewardshipPost) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPost on this unsaved StewardshipBatch.');
			if ((is_null($objStewardshipPost->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPost on this StewardshipBatch with an unsaved StewardshipPost.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post`
				SET
					`stewardship_batch_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPost->Id) . ' AND
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all StewardshipPosts
		 * @return void
		*/ 
		public function UnassociateAllStewardshipPosts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPost on this unsaved StewardshipBatch.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_post`
				SET
					`stewardship_batch_id` = null
				WHERE
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipPost
		 * @param StewardshipPost $objStewardshipPost
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipPost(StewardshipPost $objStewardshipPost) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPost on this unsaved StewardshipBatch.');
			if ((is_null($objStewardshipPost->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPost on this StewardshipBatch with an unsaved StewardshipPost.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPost->Id) . ' AND
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated StewardshipPosts
		 * @return void
		*/ 
		public function DeleteAllStewardshipPosts() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPost on this unsaved StewardshipBatch.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post`
				WHERE
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StewardshipStack
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StewardshipStacks as an array of StewardshipStack objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipStack[]
		*/ 
		public function GetStewardshipStackArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StewardshipStack::LoadArrayByStewardshipBatchId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StewardshipStacks
		 * @return int
		*/ 
		public function CountStewardshipStacks() {
			if ((is_null($this->intId)))
				return 0;

			return StewardshipStack::CountByStewardshipBatchId($this->intId);
		}

		/**
		 * Associates a StewardshipStack
		 * @param StewardshipStack $objStewardshipStack
		 * @return void
		*/ 
		public function AssociateStewardshipStack(StewardshipStack $objStewardshipStack) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipStack on this unsaved StewardshipBatch.');
			if ((is_null($objStewardshipStack->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipStack on this StewardshipBatch with an unsaved StewardshipStack.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_stack`
				SET
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipStack->Id) . '
			');
		}

		/**
		 * Unassociates a StewardshipStack
		 * @param StewardshipStack $objStewardshipStack
		 * @return void
		*/ 
		public function UnassociateStewardshipStack(StewardshipStack $objStewardshipStack) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipStack on this unsaved StewardshipBatch.');
			if ((is_null($objStewardshipStack->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipStack on this StewardshipBatch with an unsaved StewardshipStack.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_stack`
				SET
					`stewardship_batch_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipStack->Id) . ' AND
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all StewardshipStacks
		 * @return void
		*/ 
		public function UnassociateAllStewardshipStacks() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipStack on this unsaved StewardshipBatch.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_stack`
				SET
					`stewardship_batch_id` = null
				WHERE
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipStack
		 * @param StewardshipStack $objStewardshipStack
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipStack(StewardshipStack $objStewardshipStack) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipStack on this unsaved StewardshipBatch.');
			if ((is_null($objStewardshipStack->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipStack on this StewardshipBatch with an unsaved StewardshipStack.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_stack`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipStack->Id) . ' AND
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated StewardshipStacks
		 * @return void
		*/ 
		public function DeleteAllStewardshipStacks() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipStack on this unsaved StewardshipBatch.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipBatch::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_stack`
				WHERE
					`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="StewardshipBatch"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="StewardshipBatchStatusTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="DateEntered" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="BatchLabel" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="ReportedTotalAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="ActualTotalAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="PostedTotalAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('StewardshipBatch', $strComplexTypeArray)) {
				$strComplexTypeArray['StewardshipBatch'] = StewardshipBatch::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, StewardshipBatch::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new StewardshipBatch();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'StewardshipBatchStatusTypeId'))
				$objToReturn->intStewardshipBatchStatusTypeId = $objSoapObject->StewardshipBatchStatusTypeId;
			if (property_exists($objSoapObject, 'DateEntered'))
				$objToReturn->dttDateEntered = new QDateTime($objSoapObject->DateEntered);
			if (property_exists($objSoapObject, 'BatchLabel'))
				$objToReturn->strBatchLabel = $objSoapObject->BatchLabel;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'ReportedTotalAmount'))
				$objToReturn->fltReportedTotalAmount = $objSoapObject->ReportedTotalAmount;
			if (property_exists($objSoapObject, 'ActualTotalAmount'))
				$objToReturn->fltActualTotalAmount = $objSoapObject->ActualTotalAmount;
			if (property_exists($objSoapObject, 'PostedTotalAmount'))
				$objToReturn->fltPostedTotalAmount = $objSoapObject->PostedTotalAmount;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, StewardshipBatch::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttDateEntered)
				$objObject->dttDateEntered = $objObject->dttDateEntered->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeStewardshipBatch extends QQNode {
		protected $strTableName = 'stewardship_batch';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipBatch';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'StewardshipBatchStatusTypeId':
					return new QQNode('stewardship_batch_status_type_id', 'StewardshipBatchStatusTypeId', 'integer', $this);
				case 'DateEntered':
					return new QQNode('date_entered', 'DateEntered', 'QDateTime', $this);
				case 'BatchLabel':
					return new QQNode('batch_label', 'BatchLabel', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'ReportedTotalAmount':
					return new QQNode('reported_total_amount', 'ReportedTotalAmount', 'double', $this);
				case 'ActualTotalAmount':
					return new QQNode('actual_total_amount', 'ActualTotalAmount', 'double', $this);
				case 'PostedTotalAmount':
					return new QQNode('posted_total_amount', 'PostedTotalAmount', 'double', $this);
				case 'StewardshipContribution':
					return new QQReverseReferenceNodeStewardshipContribution($this, 'stewardshipcontribution', 'reverse_reference', 'stewardship_batch_id');
				case 'StewardshipPost':
					return new QQReverseReferenceNodeStewardshipPost($this, 'stewardshippost', 'reverse_reference', 'stewardship_batch_id');
				case 'StewardshipStack':
					return new QQReverseReferenceNodeStewardshipStack($this, 'stewardshipstack', 'reverse_reference', 'stewardship_batch_id');

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

	class QQReverseReferenceNodeStewardshipBatch extends QQReverseReferenceNode {
		protected $strTableName = 'stewardship_batch';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipBatch';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'StewardshipBatchStatusTypeId':
					return new QQNode('stewardship_batch_status_type_id', 'StewardshipBatchStatusTypeId', 'integer', $this);
				case 'DateEntered':
					return new QQNode('date_entered', 'DateEntered', 'QDateTime', $this);
				case 'BatchLabel':
					return new QQNode('batch_label', 'BatchLabel', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'ReportedTotalAmount':
					return new QQNode('reported_total_amount', 'ReportedTotalAmount', 'double', $this);
				case 'ActualTotalAmount':
					return new QQNode('actual_total_amount', 'ActualTotalAmount', 'double', $this);
				case 'PostedTotalAmount':
					return new QQNode('posted_total_amount', 'PostedTotalAmount', 'double', $this);
				case 'StewardshipContribution':
					return new QQReverseReferenceNodeStewardshipContribution($this, 'stewardshipcontribution', 'reverse_reference', 'stewardship_batch_id');
				case 'StewardshipPost':
					return new QQReverseReferenceNodeStewardshipPost($this, 'stewardshippost', 'reverse_reference', 'stewardship_batch_id');
				case 'StewardshipStack':
					return new QQReverseReferenceNodeStewardshipStack($this, 'stewardshipstack', 'reverse_reference', 'stewardship_batch_id');

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