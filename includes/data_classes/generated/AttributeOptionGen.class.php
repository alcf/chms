<?php
	/**
	 * The abstract AttributeOptionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the AttributeOption subclass which
	 * extends this AttributeOptionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the AttributeOption class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $AttributeId the value for intAttributeId (Not Null)
	 * @property string $Name the value for strName 
	 * @property Attribute $Attribute the value for the Attribute object referenced by intAttributeId (Not Null)
	 * @property AttributeValue $_AttributeValueAsMultiple the value for the private _objAttributeValueAsMultiple (Read-Only) if set due to an expansion on the attributevalue_multipleattributeoption_assn association table
	 * @property AttributeValue[] $_AttributeValueAsMultipleArray the value for the private _objAttributeValueAsMultipleArray (Read-Only) if set due to an ExpandAsArray on the attributevalue_multipleattributeoption_assn association table
	 * @property AttributeValue $_AttributeValueAsSingle the value for the private _objAttributeValueAsSingle (Read-Only) if set due to an expansion on the attribute_value.single_attribute_option_id reverse relationship
	 * @property AttributeValue[] $_AttributeValueAsSingleArray the value for the private _objAttributeValueAsSingleArray (Read-Only) if set due to an ExpandAsArray on the attribute_value.single_attribute_option_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AttributeOptionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column attribute_option.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column attribute_option.attribute_id
		 * @var integer intAttributeId
		 */
		protected $intAttributeId;
		const AttributeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column attribute_option.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 100;
		const NameDefault = null;


		/**
		 * Private member variable that stores a reference to a single AttributeValueAsMultiple object
		 * (of type AttributeValue), if this AttributeOption object was restored with
		 * an expansion on the attributevalue_multipleattributeoption_assn association table.
		 * @var AttributeValue _objAttributeValueAsMultiple;
		 */
		private $_objAttributeValueAsMultiple;

		/**
		 * Private member variable that stores a reference to an array of AttributeValueAsMultiple objects
		 * (of type AttributeValue[]), if this AttributeOption object was restored with
		 * an ExpandAsArray on the attributevalue_multipleattributeoption_assn association table.
		 * @var AttributeValue[] _objAttributeValueAsMultipleArray;
		 */
		private $_objAttributeValueAsMultipleArray = array();

		/**
		 * Private member variable that stores a reference to a single AttributeValueAsSingle object
		 * (of type AttributeValue), if this AttributeOption object was restored with
		 * an expansion on the attribute_value association table.
		 * @var AttributeValue _objAttributeValueAsSingle;
		 */
		private $_objAttributeValueAsSingle;

		/**
		 * Private member variable that stores a reference to an array of AttributeValueAsSingle objects
		 * (of type AttributeValue[]), if this AttributeOption object was restored with
		 * an ExpandAsArray on the attribute_value association table.
		 * @var AttributeValue[] _objAttributeValueAsSingleArray;
		 */
		private $_objAttributeValueAsSingleArray = array();

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
		 * in the database column attribute_option.attribute_id.
		 *
		 * NOTE: Always use the Attribute property getter to correctly retrieve this Attribute object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Attribute objAttribute
		 */
		protected $objAttribute;





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
		 * Load a AttributeOption from PK Info
		 * @param integer $intId
		 * @return AttributeOption
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return AttributeOption::QuerySingle(
				QQ::Equal(QQN::AttributeOption()->Id, $intId)
			);
		}

		/**
		 * Load all AttributeOptions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeOption[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call AttributeOption::QueryArray to perform the LoadAll query
			try {
				return AttributeOption::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all AttributeOptions
		 * @return int
		 */
		public static function CountAll() {
			// Call AttributeOption::QueryCount to perform the CountAll query
			return AttributeOption::QueryCount(QQ::All());
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
			$objDatabase = AttributeOption::GetDatabase();

			// Create/Build out the QueryBuilder object with AttributeOption-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'attribute_option');
			AttributeOption::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('attribute_option');

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
		 * Static Qcodo Query method to query for a single AttributeOption object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AttributeOption the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AttributeOption::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new AttributeOption object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AttributeOption::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of AttributeOption objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AttributeOption[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AttributeOption::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AttributeOption::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = AttributeOption::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of AttributeOption objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AttributeOption::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = AttributeOption::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'attribute_option_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with AttributeOption-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				AttributeOption::GetSelectFields($objQueryBuilder);
				AttributeOption::GetFromFields($objQueryBuilder);

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
			return AttributeOption::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this AttributeOption
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'attribute_option';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'attribute_id', $strAliasPrefix . 'attribute_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a AttributeOption from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this AttributeOption::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return AttributeOption
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
					$strAliasPrefix = 'attribute_option__';

				$strAlias = $strAliasPrefix . 'attributevalueasmultiple__attribute_value_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAttributeValueAsMultipleArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAttributeValueAsMultipleArray[$intPreviousChildItemCount - 1];
						$objChildItem = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalueasmultiple__attribute_value_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAttributeValueAsMultipleArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAttributeValueAsMultipleArray[] = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalueasmultiple__attribute_value_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				$strAlias = $strAliasPrefix . 'attributevalueassingle__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAttributeValueAsSingleArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAttributeValueAsSingleArray[$intPreviousChildItemCount - 1];
						$objChildItem = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalueassingle__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAttributeValueAsSingleArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAttributeValueAsSingleArray[] = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalueassingle__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'attribute_option__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the AttributeOption object
			$objToReturn = new AttributeOption();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'attribute_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'attribute_id'] : $strAliasPrefix . 'attribute_id';
			$objToReturn->intAttributeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'attribute_option__';

			// Check for Attribute Early Binding
			$strAlias = $strAliasPrefix . 'attribute_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAttribute = Attribute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attribute_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for AttributeValueAsMultiple Virtual Binding
			$strAlias = $strAliasPrefix . 'attributevalueasmultiple__attribute_value_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAttributeValueAsMultipleArray[] = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalueasmultiple__attribute_value_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAttributeValueAsMultiple = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalueasmultiple__attribute_value_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for AttributeValueAsSingle Virtual Binding
			$strAlias = $strAliasPrefix . 'attributevalueassingle__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAttributeValueAsSingleArray[] = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalueassingle__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAttributeValueAsSingle = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalueassingle__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of AttributeOptions from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return AttributeOption[]
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
					$objItem = AttributeOption::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = AttributeOption::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single AttributeOption object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return AttributeOption next row resulting from the query
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
			return AttributeOption::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single AttributeOption object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return AttributeOption
		*/
		public static function LoadById($intId) {
			return AttributeOption::QuerySingle(
				QQ::Equal(QQN::AttributeOption()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of AttributeOption objects,
		 * by AttributeId Index(es)
		 * @param integer $intAttributeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeOption[]
		*/
		public static function LoadArrayByAttributeId($intAttributeId, $objOptionalClauses = null) {
			// Call AttributeOption::QueryArray to perform the LoadArrayByAttributeId query
			try {
				return AttributeOption::QueryArray(
					QQ::Equal(QQN::AttributeOption()->AttributeId, $intAttributeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AttributeOptions
		 * by AttributeId Index(es)
		 * @param integer $intAttributeId
		 * @return int
		*/
		public static function CountByAttributeId($intAttributeId) {
			// Call AttributeOption::QueryCount to perform the CountByAttributeId query
			return AttributeOption::QueryCount(
				QQ::Equal(QQN::AttributeOption()->AttributeId, $intAttributeId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of AttributeValue objects for a given AttributeValueAsMultiple
		 * via the attributevalue_multipleattributeoption_assn table
		 * @param integer $intAttributeValueId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeOption[]
		*/
		public static function LoadArrayByAttributeValueAsMultiple($intAttributeValueId, $objOptionalClauses = null) {
			// Call AttributeOption::QueryArray to perform the LoadArrayByAttributeValueAsMultiple query
			try {
				return AttributeOption::QueryArray(
					QQ::Equal(QQN::AttributeOption()->AttributeValueAsMultiple->AttributeValueId, $intAttributeValueId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AttributeOptions for a given AttributeValueAsMultiple
		 * via the attributevalue_multipleattributeoption_assn table
		 * @param integer $intAttributeValueId
		 * @return int
		*/
		public static function CountByAttributeValueAsMultiple($intAttributeValueId) {
			return AttributeOption::QueryCount(
				QQ::Equal(QQN::AttributeOption()->AttributeValueAsMultiple->AttributeValueId, $intAttributeValueId)
			);
		}




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this AttributeOption
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `attribute_option` (
							`attribute_id`,
							`name`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intAttributeId) . ',
							' . $objDatabase->SqlVariable($this->strName) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('attribute_option', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`attribute_option`
						SET
							`attribute_id` = ' . $objDatabase->SqlVariable($this->intAttributeId) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . '
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
		 * Delete this AttributeOption
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this AttributeOption with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_option`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all AttributeOptions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_option`');
		}

		/**
		 * Truncate attribute_option table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `attribute_option`');
		}

		/**
		 * Reload this AttributeOption from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved AttributeOption object.');

			// Reload the Object
			$objReloaded = AttributeOption::Load($this->intId);

			// Update $this's local variables to match
			$this->AttributeId = $objReloaded->AttributeId;
			$this->strName = $objReloaded->strName;
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

				case 'AttributeId':
					// Gets the value for intAttributeId (Not Null)
					// @return integer
					return $this->intAttributeId;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;


				///////////////////
				// Member Objects
				///////////////////
				case 'Attribute':
					// Gets the value for the Attribute object referenced by intAttributeId (Not Null)
					// @return Attribute
					try {
						if ((!$this->objAttribute) && (!is_null($this->intAttributeId)))
							$this->objAttribute = Attribute::Load($this->intAttributeId);
						return $this->objAttribute;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_AttributeValueAsMultiple':
					// Gets the value for the private _objAttributeValueAsMultiple (Read-Only)
					// if set due to an expansion on the attributevalue_multipleattributeoption_assn association table
					// @return AttributeValue
					return $this->_objAttributeValueAsMultiple;

				case '_AttributeValueAsMultipleArray':
					// Gets the value for the private _objAttributeValueAsMultipleArray (Read-Only)
					// if set due to an ExpandAsArray on the attributevalue_multipleattributeoption_assn association table
					// @return AttributeValue[]
					return (array) $this->_objAttributeValueAsMultipleArray;

				case '_AttributeValueAsSingle':
					// Gets the value for the private _objAttributeValueAsSingle (Read-Only)
					// if set due to an expansion on the attribute_value.single_attribute_option_id reverse relationship
					// @return AttributeValue
					return $this->_objAttributeValueAsSingle;

				case '_AttributeValueAsSingleArray':
					// Gets the value for the private _objAttributeValueAsSingleArray (Read-Only)
					// if set due to an ExpandAsArray on the attribute_value.single_attribute_option_id reverse relationship
					// @return AttributeValue[]
					return (array) $this->_objAttributeValueAsSingleArray;


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
				case 'AttributeId':
					// Sets the value for intAttributeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAttribute = null;
						return ($this->intAttributeId = QType::Cast($mixValue, QType::Integer));
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


				///////////////////
				// Member Objects
				///////////////////
				case 'Attribute':
					// Sets the value for the Attribute object referenced by intAttributeId (Not Null)
					// @param Attribute $mixValue
					// @return Attribute
					if (is_null($mixValue)) {
						$this->intAttributeId = null;
						$this->objAttribute = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Attribute object
						try {
							$mixValue = QType::Cast($mixValue, 'Attribute');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Attribute object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Attribute for this AttributeOption');

						// Update Local Member Variables
						$this->objAttribute = $mixValue;
						$this->intAttributeId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for AttributeValueAsSingle
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AttributeValuesAsSingle as an array of AttributeValue objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeValue[]
		*/ 
		public function GetAttributeValueAsSingleArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return AttributeValue::LoadArrayBySingleAttributeOptionId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AttributeValuesAsSingle
		 * @return int
		*/ 
		public function CountAttributeValuesAsSingle() {
			if ((is_null($this->intId)))
				return 0;

			return AttributeValue::CountBySingleAttributeOptionId($this->intId);
		}

		/**
		 * Associates a AttributeValueAsSingle
		 * @param AttributeValue $objAttributeValue
		 * @return void
		*/ 
		public function AssociateAttributeValueAsSingle(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeValueAsSingle on this unsaved AttributeOption.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeValueAsSingle on this AttributeOption with an unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_value`
				SET
					`single_attribute_option_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeValue->Id) . '
			');
		}

		/**
		 * Unassociates a AttributeValueAsSingle
		 * @param AttributeValue $objAttributeValue
		 * @return void
		*/ 
		public function UnassociateAttributeValueAsSingle(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValueAsSingle on this unsaved AttributeOption.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValueAsSingle on this AttributeOption with an unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_value`
				SET
					`single_attribute_option_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeValue->Id) . ' AND
					`single_attribute_option_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all AttributeValuesAsSingle
		 * @return void
		*/ 
		public function UnassociateAllAttributeValuesAsSingle() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValueAsSingle on this unsaved AttributeOption.');

			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_value`
				SET
					`single_attribute_option_id` = null
				WHERE
					`single_attribute_option_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated AttributeValueAsSingle
		 * @param AttributeValue $objAttributeValue
		 * @return void
		*/ 
		public function DeleteAssociatedAttributeValueAsSingle(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValueAsSingle on this unsaved AttributeOption.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValueAsSingle on this AttributeOption with an unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_value`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeValue->Id) . ' AND
					`single_attribute_option_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated AttributeValuesAsSingle
		 * @return void
		*/ 
		public function DeleteAllAttributeValuesAsSingle() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValueAsSingle on this unsaved AttributeOption.');

			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_value`
				WHERE
					`single_attribute_option_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for AttributeValueAsMultiple
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated AttributeValuesAsMultiple as an array of AttributeValue objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeValue[]
		*/ 
		public function GetAttributeValueAsMultipleArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return AttributeValue::LoadArrayByAttributeOptionAsMultiple($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated AttributeValuesAsMultiple
		 * @return int
		*/ 
		public function CountAttributeValuesAsMultiple() {
			if ((is_null($this->intId)))
				return 0;

			return AttributeValue::CountByAttributeOptionAsMultiple($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific AttributeValueAsMultiple
		 * @param AttributeValue $objAttributeValue
		 * @return bool
		*/
		public function IsAttributeValueAsMultipleAssociated(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsAttributeValueAsMultipleAssociated on this unsaved AttributeOption.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsAttributeValueAsMultipleAssociated on this AttributeOption with an unsaved AttributeValue.');

			$intRowCount = AttributeOption::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::AttributeOption()->Id, $this->intId),
					QQ::Equal(QQN::AttributeOption()->AttributeValueAsMultiple->AttributeValueId, $objAttributeValue->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a AttributeValueAsMultiple
		 * @param AttributeValue $objAttributeValue
		 * @return void
		*/ 
		public function AssociateAttributeValueAsMultiple(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeValueAsMultiple on this unsaved AttributeOption.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeValueAsMultiple on this AttributeOption with an unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `attributevalue_multipleattributeoption_assn` (
					`attribute_option_id`,
					`attribute_value_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objAttributeValue->Id) . '
				)
			');
		}

		/**
		 * Unassociates a AttributeValueAsMultiple
		 * @param AttributeValue $objAttributeValue
		 * @return void
		*/ 
		public function UnassociateAttributeValueAsMultiple(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValueAsMultiple on this unsaved AttributeOption.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValueAsMultiple on this AttributeOption with an unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attributevalue_multipleattributeoption_assn`
				WHERE
					`attribute_option_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`attribute_value_id` = ' . $objDatabase->SqlVariable($objAttributeValue->Id) . '
			');
		}

		/**
		 * Unassociates all AttributeValuesAsMultiple
		 * @return void
		*/ 
		public function UnassociateAllAttributeValuesAsMultiple() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllAttributeValueAsMultipleArray on this unsaved AttributeOption.');

			// Get the Database Object for this Class
			$objDatabase = AttributeOption::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attributevalue_multipleattributeoption_assn`
				WHERE
					`attribute_option_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="AttributeOption"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Attribute" type="xsd1:Attribute"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('AttributeOption', $strComplexTypeArray)) {
				$strComplexTypeArray['AttributeOption'] = AttributeOption::GetSoapComplexTypeXml();
				Attribute::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, AttributeOption::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new AttributeOption();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Attribute')) &&
				($objSoapObject->Attribute))
				$objToReturn->Attribute = Attribute::GetObjectFromSoapObject($objSoapObject->Attribute);
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, AttributeOption::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objAttribute)
				$objObject->objAttribute = Attribute::GetSoapObjectFromObject($objObject->objAttribute, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAttributeId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeAttributeOptionAttributeValueAsMultiple extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'attributevalueasmultiple';

		protected $strTableName = 'attributevalue_multipleattributeoption_assn';
		protected $strPrimaryKey = 'attribute_option_id';
		protected $strClassName = 'AttributeValue';

		public function __get($strName) {
			switch ($strName) {
				case 'AttributeValueId':
					return new QQNode('attribute_value_id', 'AttributeValueId', 'integer', $this);
				case 'AttributeValue':
					return new QQNodeAttributeValue('attribute_value_id', 'AttributeValueId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeAttributeValue('attribute_value_id', 'AttributeValueId', 'integer', $this);
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

	class QQNodeAttributeOption extends QQNode {
		protected $strTableName = 'attribute_option';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'AttributeOption';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'AttributeId':
					return new QQNode('attribute_id', 'AttributeId', 'integer', $this);
				case 'Attribute':
					return new QQNodeAttribute('attribute_id', 'Attribute', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'AttributeValueAsMultiple':
					return new QQNodeAttributeOptionAttributeValueAsMultiple($this);
				case 'AttributeValueAsSingle':
					return new QQReverseReferenceNodeAttributeValue($this, 'attributevalueassingle', 'reverse_reference', 'single_attribute_option_id');

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

	class QQReverseReferenceNodeAttributeOption extends QQReverseReferenceNode {
		protected $strTableName = 'attribute_option';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'AttributeOption';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'AttributeId':
					return new QQNode('attribute_id', 'AttributeId', 'integer', $this);
				case 'Attribute':
					return new QQNodeAttribute('attribute_id', 'Attribute', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'AttributeValueAsMultiple':
					return new QQNodeAttributeOptionAttributeValueAsMultiple($this);
				case 'AttributeValueAsSingle':
					return new QQReverseReferenceNodeAttributeValue($this, 'attributevalueassingle', 'reverse_reference', 'single_attribute_option_id');

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