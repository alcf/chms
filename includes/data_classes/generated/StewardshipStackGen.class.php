<?php
	/**
	 * The abstract StewardshipStackGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the StewardshipStack subclass which
	 * extends this StewardshipStackGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StewardshipStack class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $StewardshipBatchId the value for intStewardshipBatchId (Not Null)
	 * @property integer $StackNumber the value for intStackNumber (Not Null)
	 * @property integer $ItemCount the value for intItemCount 
	 * @property double $ReportedTotalAmount the value for fltReportedTotalAmount 
	 * @property double $ActualTotalAmount the value for fltActualTotalAmount 
	 * @property StewardshipBatch $StewardshipBatch the value for the StewardshipBatch object referenced by intStewardshipBatchId (Not Null)
	 * @property StewardshipContribution $_StewardshipContribution the value for the private _objStewardshipContribution (Read-Only) if set due to an expansion on the stewardship_contribution.stewardship_stack_id reverse relationship
	 * @property StewardshipContribution[] $_StewardshipContributionArray the value for the private _objStewardshipContributionArray (Read-Only) if set due to an ExpandAsArray on the stewardship_contribution.stewardship_stack_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class StewardshipStackGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column stewardship_stack.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_stack.stewardship_batch_id
		 * @var integer intStewardshipBatchId
		 */
		protected $intStewardshipBatchId;
		const StewardshipBatchIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_stack.stack_number
		 * @var integer intStackNumber
		 */
		protected $intStackNumber;
		const StackNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_stack.item_count
		 * @var integer intItemCount
		 */
		protected $intItemCount;
		const ItemCountDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_stack.reported_total_amount
		 * @var double fltReportedTotalAmount
		 */
		protected $fltReportedTotalAmount;
		const ReportedTotalAmountDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_stack.actual_total_amount
		 * @var double fltActualTotalAmount
		 */
		protected $fltActualTotalAmount;
		const ActualTotalAmountDefault = null;


		/**
		 * Private member variable that stores a reference to a single StewardshipContribution object
		 * (of type StewardshipContribution), if this StewardshipStack object was restored with
		 * an expansion on the stewardship_contribution association table.
		 * @var StewardshipContribution _objStewardshipContribution;
		 */
		private $_objStewardshipContribution;

		/**
		 * Private member variable that stores a reference to an array of StewardshipContribution objects
		 * (of type StewardshipContribution[]), if this StewardshipStack object was restored with
		 * an ExpandAsArray on the stewardship_contribution association table.
		 * @var StewardshipContribution[] _objStewardshipContributionArray;
		 */
		private $_objStewardshipContributionArray = array();

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
		 * in the database column stewardship_stack.stewardship_batch_id.
		 *
		 * NOTE: Always use the StewardshipBatch property getter to correctly retrieve this StewardshipBatch object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipBatch objStewardshipBatch
		 */
		protected $objStewardshipBatch;





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
		 * Load a StewardshipStack from PK Info
		 * @param integer $intId
		 * @return StewardshipStack
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return StewardshipStack::QuerySingle(
				QQ::Equal(QQN::StewardshipStack()->Id, $intId)
			);
		}

		/**
		 * Load all StewardshipStacks
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipStack[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call StewardshipStack::QueryArray to perform the LoadAll query
			try {
				return StewardshipStack::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all StewardshipStacks
		 * @return int
		 */
		public static function CountAll() {
			// Call StewardshipStack::QueryCount to perform the CountAll query
			return StewardshipStack::QueryCount(QQ::All());
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
			$objDatabase = StewardshipStack::GetDatabase();

			// Create/Build out the QueryBuilder object with StewardshipStack-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'stewardship_stack');
			StewardshipStack::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('stewardship_stack');

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
		 * Static Qcodo Query method to query for a single StewardshipStack object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipStack the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipStack::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new StewardshipStack object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = StewardshipStack::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return StewardshipStack::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of StewardshipStack objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipStack[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipStack::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return StewardshipStack::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = StewardshipStack::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of StewardshipStack objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipStack::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = StewardshipStack::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'stewardship_stack_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with StewardshipStack-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				StewardshipStack::GetSelectFields($objQueryBuilder);
				StewardshipStack::GetFromFields($objQueryBuilder);

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
			return StewardshipStack::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this StewardshipStack
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'stewardship_stack';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_batch_id', $strAliasPrefix . 'stewardship_batch_id');
			$objBuilder->AddSelectItem($strTableName, 'stack_number', $strAliasPrefix . 'stack_number');
			$objBuilder->AddSelectItem($strTableName, 'item_count', $strAliasPrefix . 'item_count');
			$objBuilder->AddSelectItem($strTableName, 'reported_total_amount', $strAliasPrefix . 'reported_total_amount');
			$objBuilder->AddSelectItem($strTableName, 'actual_total_amount', $strAliasPrefix . 'actual_total_amount');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a StewardshipStack from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this StewardshipStack::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipStack
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
					$strAliasPrefix = 'stewardship_stack__';


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

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'stewardship_stack__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the StewardshipStack object
			$objToReturn = new StewardshipStack();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_batch_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_batch_id'] : $strAliasPrefix . 'stewardship_batch_id';
			$objToReturn->intStewardshipBatchId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stack_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stack_number'] : $strAliasPrefix . 'stack_number';
			$objToReturn->intStackNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'item_count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'item_count'] : $strAliasPrefix . 'item_count';
			$objToReturn->intItemCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'reported_total_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'reported_total_amount'] : $strAliasPrefix . 'reported_total_amount';
			$objToReturn->fltReportedTotalAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'actual_total_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'actual_total_amount'] : $strAliasPrefix . 'actual_total_amount';
			$objToReturn->fltActualTotalAmount = $objDbRow->GetColumn($strAliasName, 'Float');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'stewardship_stack__';

			// Check for StewardshipBatch Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_batch_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipBatch = StewardshipBatch::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_batch_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for StewardshipContribution Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshipcontribution__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipContributionArray[] = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipContribution = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of StewardshipStacks from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipStack[]
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
					$objItem = StewardshipStack::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = StewardshipStack::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single StewardshipStack object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return StewardshipStack next row resulting from the query
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
			return StewardshipStack::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single StewardshipStack object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return StewardshipStack
		*/
		public static function LoadById($intId) {
			return StewardshipStack::QuerySingle(
				QQ::Equal(QQN::StewardshipStack()->Id, $intId)
			);
		}
			
		/**
		 * Load a single StewardshipStack object,
		 * by StewardshipBatchId, StackNumber Index(es)
		 * @param integer $intStewardshipBatchId
		 * @param integer $intStackNumber
		 * @return StewardshipStack
		*/
		public static function LoadByStewardshipBatchIdStackNumber($intStewardshipBatchId, $intStackNumber) {
			return StewardshipStack::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::StewardshipStack()->StewardshipBatchId, $intStewardshipBatchId),
				QQ::Equal(QQN::StewardshipStack()->StackNumber, $intStackNumber)
				)
			);
		}
			
		/**
		 * Load an array of StewardshipStack objects,
		 * by StewardshipBatchId Index(es)
		 * @param integer $intStewardshipBatchId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipStack[]
		*/
		public static function LoadArrayByStewardshipBatchId($intStewardshipBatchId, $objOptionalClauses = null) {
			// Call StewardshipStack::QueryArray to perform the LoadArrayByStewardshipBatchId query
			try {
				return StewardshipStack::QueryArray(
					QQ::Equal(QQN::StewardshipStack()->StewardshipBatchId, $intStewardshipBatchId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipStacks
		 * by StewardshipBatchId Index(es)
		 * @param integer $intStewardshipBatchId
		 * @return int
		*/
		public static function CountByStewardshipBatchId($intStewardshipBatchId) {
			// Call StewardshipStack::QueryCount to perform the CountByStewardshipBatchId query
			return StewardshipStack::QueryCount(
				QQ::Equal(QQN::StewardshipStack()->StewardshipBatchId, $intStewardshipBatchId)
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
				INSERT INTO `stewardship_stack` (
					`id`,
					`stewardship_batch_id`,
					`stack_number`,
					`item_count`,
					`reported_total_amount`,
					`actual_total_amount`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intStewardshipBatchId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intStackNumber) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intItemCount) . ',
					' . QApplication::$Database[2]->SqlVariable($this->fltReportedTotalAmount) . ',
					' . QApplication::$Database[2]->SqlVariable($this->fltActualTotalAmount) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intId
		 * @return StewardshipStack[]
		 */
		public static function GetJournalObjectsForId($intId) {
			$objResult = QApplication::$Database[2]->Query('SELECT * FROM stewardship_stack WHERE id = ' .
				QApplication::$Database[2]->SqlVariable($intId) . ' ORDER BY __sys_date');

			return StewardshipStack::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return StewardshipStack[]
		 */
		public function GetJournalObjects() {
			return StewardshipStack::GetJournalObjectsForId($this->intId);
		}

		/**
		 * Save this StewardshipStack
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = StewardshipStack::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `stewardship_stack` (
							`stewardship_batch_id`,
							`stack_number`,
							`item_count`,
							`reported_total_amount`,
							`actual_total_amount`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . ',
							' . $objDatabase->SqlVariable($this->intStackNumber) . ',
							' . $objDatabase->SqlVariable($this->intItemCount) . ',
							' . $objDatabase->SqlVariable($this->fltReportedTotalAmount) . ',
							' . $objDatabase->SqlVariable($this->fltActualTotalAmount) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('stewardship_stack', 'id');

					// Journaling
					$this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`stewardship_stack`
						SET
							`stewardship_batch_id` = ' . $objDatabase->SqlVariable($this->intStewardshipBatchId) . ',
							`stack_number` = ' . $objDatabase->SqlVariable($this->intStackNumber) . ',
							`item_count` = ' . $objDatabase->SqlVariable($this->intItemCount) . ',
							`reported_total_amount` = ' . $objDatabase->SqlVariable($this->fltReportedTotalAmount) . ',
							`actual_total_amount` = ' . $objDatabase->SqlVariable($this->fltActualTotalAmount) . '
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
		 * Delete this StewardshipStack
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this StewardshipStack with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipStack::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_stack`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			$this->Journal('DELETE');
		}

		/**
		 * Delete all StewardshipStacks
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipStack::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_stack`');
		}

		/**
		 * Truncate stewardship_stack table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipStack::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `stewardship_stack`');
		}

		/**
		 * Reload this StewardshipStack from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved StewardshipStack object.');

			// Reload the Object
			$objReloaded = StewardshipStack::Load($this->intId);

			// Update $this's local variables to match
			$this->StewardshipBatchId = $objReloaded->StewardshipBatchId;
			$this->intStackNumber = $objReloaded->intStackNumber;
			$this->intItemCount = $objReloaded->intItemCount;
			$this->fltReportedTotalAmount = $objReloaded->fltReportedTotalAmount;
			$this->fltActualTotalAmount = $objReloaded->fltActualTotalAmount;
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

				case 'StackNumber':
					// Gets the value for intStackNumber (Not Null)
					// @return integer
					return $this->intStackNumber;

				case 'ItemCount':
					// Gets the value for intItemCount 
					// @return integer
					return $this->intItemCount;

				case 'ReportedTotalAmount':
					// Gets the value for fltReportedTotalAmount 
					// @return double
					return $this->fltReportedTotalAmount;

				case 'ActualTotalAmount':
					// Gets the value for fltActualTotalAmount 
					// @return double
					return $this->fltActualTotalAmount;


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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_StewardshipContribution':
					// Gets the value for the private _objStewardshipContribution (Read-Only)
					// if set due to an expansion on the stewardship_contribution.stewardship_stack_id reverse relationship
					// @return StewardshipContribution
					return $this->_objStewardshipContribution;

				case '_StewardshipContributionArray':
					// Gets the value for the private _objStewardshipContributionArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_contribution.stewardship_stack_id reverse relationship
					// @return StewardshipContribution[]
					return (array) $this->_objStewardshipContributionArray;


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

				case 'StackNumber':
					// Sets the value for intStackNumber (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intStackNumber = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ItemCount':
					// Sets the value for intItemCount 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intItemCount = QType::Cast($mixValue, QType::Integer));
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
							throw new QCallerException('Unable to set an unsaved StewardshipBatch for this StewardshipStack');

						// Update Local Member Variables
						$this->objStewardshipBatch = $mixValue;
						$this->intStewardshipBatchId = $mixValue->Id;

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
				return StewardshipContribution::LoadArrayByStewardshipStackId($this->intId, $objOptionalClauses);
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

			return StewardshipContribution::CountByStewardshipStackId($this->intId);
		}

		/**
		 * Associates a StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function AssociateStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContribution on this unsaved StewardshipStack.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContribution on this StewardshipStack with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipStack::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`stewardship_stack_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . '
			');

			// Journaling
			$objStewardshipContribution->StewardshipStackId = $this->intId;
			$objStewardshipContribution->Journal('UPDATE');
		}

		/**
		 * Unassociates a StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function UnassociateStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved StewardshipStack.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this StewardshipStack with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipStack::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`stewardship_stack_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . ' AND
					`stewardship_stack_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objStewardshipContribution->StewardshipStackId = null;
			$objStewardshipContribution->Journal('UPDATE');
		}

		/**
		 * Unassociates all StewardshipContributions
		 * @return void
		*/ 
		public function UnassociateAllStewardshipContributions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved StewardshipStack.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipStack::GetDatabase();

			// Journaling
			foreach (StewardshipContribution::LoadArrayByStewardshipStackId($this->intId) as $objStewardshipContribution) {
				$objStewardshipContribution->StewardshipStackId = null;
				$objStewardshipContribution->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`stewardship_stack_id` = null
				WHERE
					`stewardship_stack_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved StewardshipStack.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this StewardshipStack with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipStack::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . ' AND
					`stewardship_stack_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objStewardshipContribution->Journal('DELETE');
		}

		/**
		 * Deletes all associated StewardshipContributions
		 * @return void
		*/ 
		public function DeleteAllStewardshipContributions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved StewardshipStack.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipStack::GetDatabase();

			// Journaling
			foreach (StewardshipContribution::LoadArrayByStewardshipStackId($this->intId) as $objStewardshipContribution) {
				$objStewardshipContribution->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution`
				WHERE
					`stewardship_stack_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="StewardshipStack"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="StewardshipBatch" type="xsd1:StewardshipBatch"/>';
			$strToReturn .= '<element name="StackNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="ItemCount" type="xsd:int"/>';
			$strToReturn .= '<element name="ReportedTotalAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="ActualTotalAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('StewardshipStack', $strComplexTypeArray)) {
				$strComplexTypeArray['StewardshipStack'] = StewardshipStack::GetSoapComplexTypeXml();
				StewardshipBatch::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, StewardshipStack::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new StewardshipStack();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'StewardshipBatch')) &&
				($objSoapObject->StewardshipBatch))
				$objToReturn->StewardshipBatch = StewardshipBatch::GetObjectFromSoapObject($objSoapObject->StewardshipBatch);
			if (property_exists($objSoapObject, 'StackNumber'))
				$objToReturn->intStackNumber = $objSoapObject->StackNumber;
			if (property_exists($objSoapObject, 'ItemCount'))
				$objToReturn->intItemCount = $objSoapObject->ItemCount;
			if (property_exists($objSoapObject, 'ReportedTotalAmount'))
				$objToReturn->fltReportedTotalAmount = $objSoapObject->ReportedTotalAmount;
			if (property_exists($objSoapObject, 'ActualTotalAmount'))
				$objToReturn->fltActualTotalAmount = $objSoapObject->ActualTotalAmount;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, StewardshipStack::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objStewardshipBatch)
				$objObject->objStewardshipBatch = StewardshipBatch::GetSoapObjectFromObject($objObject->objStewardshipBatch, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipBatchId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeStewardshipStack extends QQNode {
		protected $strTableName = 'stewardship_stack';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipStack';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'StewardshipBatchId':
					return new QQNode('stewardship_batch_id', 'StewardshipBatchId', 'integer', $this);
				case 'StewardshipBatch':
					return new QQNodeStewardshipBatch('stewardship_batch_id', 'StewardshipBatch', 'integer', $this);
				case 'StackNumber':
					return new QQNode('stack_number', 'StackNumber', 'integer', $this);
				case 'ItemCount':
					return new QQNode('item_count', 'ItemCount', 'integer', $this);
				case 'ReportedTotalAmount':
					return new QQNode('reported_total_amount', 'ReportedTotalAmount', 'double', $this);
				case 'ActualTotalAmount':
					return new QQNode('actual_total_amount', 'ActualTotalAmount', 'double', $this);
				case 'StewardshipContribution':
					return new QQReverseReferenceNodeStewardshipContribution($this, 'stewardshipcontribution', 'reverse_reference', 'stewardship_stack_id');

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

	class QQReverseReferenceNodeStewardshipStack extends QQReverseReferenceNode {
		protected $strTableName = 'stewardship_stack';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipStack';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'StewardshipBatchId':
					return new QQNode('stewardship_batch_id', 'StewardshipBatchId', 'integer', $this);
				case 'StewardshipBatch':
					return new QQNodeStewardshipBatch('stewardship_batch_id', 'StewardshipBatch', 'integer', $this);
				case 'StackNumber':
					return new QQNode('stack_number', 'StackNumber', 'integer', $this);
				case 'ItemCount':
					return new QQNode('item_count', 'ItemCount', 'integer', $this);
				case 'ReportedTotalAmount':
					return new QQNode('reported_total_amount', 'ReportedTotalAmount', 'double', $this);
				case 'ActualTotalAmount':
					return new QQNode('actual_total_amount', 'ActualTotalAmount', 'double', $this);
				case 'StewardshipContribution':
					return new QQReverseReferenceNodeStewardshipContribution($this, 'stewardshipcontribution', 'reverse_reference', 'stewardship_stack_id');

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