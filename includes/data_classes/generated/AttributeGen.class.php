<?php
	/**
	 * The abstract AttributeGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Attribute subclass which
	 * extends this AttributeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Attribute class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $AttributeDataTypeId the value for intAttributeDataTypeId (Not Null)
	 * @property string $Name the value for strName 
	 * @property AttributeOption $_AttributeOption the value for the private _objAttributeOption (Read-Only) if set due to an expansion on the attribute_option.attribute_id reverse relationship
	 * @property AttributeOption[] $_AttributeOptionArray the value for the private _objAttributeOptionArray (Read-Only) if set due to an ExpandAsArray on the attribute_option.attribute_id reverse relationship
	 * @property AttributeValue $_AttributeValue the value for the private _objAttributeValue (Read-Only) if set due to an expansion on the attribute_value.attribute_id reverse relationship
	 * @property AttributeValue[] $_AttributeValueArray the value for the private _objAttributeValueArray (Read-Only) if set due to an ExpandAsArray on the attribute_value.attribute_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AttributeGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column attribute.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column attribute.attribute_data_type_id
		 * @var integer intAttributeDataTypeId
		 */
		protected $intAttributeDataTypeId;
		const AttributeDataTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column attribute.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 100;
		const NameDefault = null;


		/**
		 * Private member variable that stores a reference to a single AttributeOption object
		 * (of type AttributeOption), if this Attribute object was restored with
		 * an expansion on the attribute_option association table.
		 * @var AttributeOption _objAttributeOption;
		 */
		private $_objAttributeOption;

		/**
		 * Private member variable that stores a reference to an array of AttributeOption objects
		 * (of type AttributeOption[]), if this Attribute object was restored with
		 * an ExpandAsArray on the attribute_option association table.
		 * @var AttributeOption[] _objAttributeOptionArray;
		 */
		private $_objAttributeOptionArray = array();

		/**
		 * Private member variable that stores a reference to a single AttributeValue object
		 * (of type AttributeValue), if this Attribute object was restored with
		 * an expansion on the attribute_value association table.
		 * @var AttributeValue _objAttributeValue;
		 */
		private $_objAttributeValue;

		/**
		 * Private member variable that stores a reference to an array of AttributeValue objects
		 * (of type AttributeValue[]), if this Attribute object was restored with
		 * an ExpandAsArray on the attribute_value association table.
		 * @var AttributeValue[] _objAttributeValueArray;
		 */
		private $_objAttributeValueArray = array();

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
		 * Load a Attribute from PK Info
		 * @param integer $intId
		 * @return Attribute
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Attribute::QuerySingle(
				QQ::Equal(QQN::Attribute()->Id, $intId)
			);
		}

		/**
		 * Load all Attributes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Attribute[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Attribute::QueryArray to perform the LoadAll query
			try {
				return Attribute::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Attributes
		 * @return int
		 */
		public static function CountAll() {
			// Call Attribute::QueryCount to perform the CountAll query
			return Attribute::QueryCount(QQ::All());
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
			$objDatabase = Attribute::GetDatabase();

			// Create/Build out the QueryBuilder object with Attribute-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'attribute');
			Attribute::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('attribute');

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
		 * Static Qcodo Query method to query for a single Attribute object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Attribute the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Attribute::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Attribute object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Attribute::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Attribute::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Attribute objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Attribute[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Attribute::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Attribute::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Attribute::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Attribute objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Attribute::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Attribute::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'attribute_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Attribute-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Attribute::GetSelectFields($objQueryBuilder);
				Attribute::GetFromFields($objQueryBuilder);

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
			return Attribute::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Attribute
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'attribute';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'attribute_data_type_id', $strAliasPrefix . 'attribute_data_type_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Attribute from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Attribute::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Attribute
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
					$strAliasPrefix = 'attribute__';


				$strAlias = $strAliasPrefix . 'attributeoption__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAttributeOptionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAttributeOptionArray[$intPreviousChildItemCount - 1];
						$objChildItem = AttributeOption::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributeoption__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAttributeOptionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAttributeOptionArray[] = AttributeOption::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributeoption__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'attributevalue__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAttributeValueArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAttributeValueArray[$intPreviousChildItemCount - 1];
						$objChildItem = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalue__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAttributeValueArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAttributeValueArray[] = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'attribute__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Attribute object
			$objToReturn = new Attribute();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'attribute_data_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'attribute_data_type_id'] : $strAliasPrefix . 'attribute_data_type_id';
			$objToReturn->intAttributeDataTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'attribute__';




			// Check for AttributeOption Virtual Binding
			$strAlias = $strAliasPrefix . 'attributeoption__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAttributeOptionArray[] = AttributeOption::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributeoption__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAttributeOption = AttributeOption::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributeoption__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AttributeValue Virtual Binding
			$strAlias = $strAliasPrefix . 'attributevalue__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAttributeValueArray[] = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAttributeValue = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Attributes from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Attribute[]
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
					$objItem = Attribute::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Attribute::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Attribute object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Attribute next row resulting from the query
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
			return Attribute::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Attribute object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Attribute
		*/
		public static function LoadById($intId) {
			return Attribute::QuerySingle(
				QQ::Equal(QQN::Attribute()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of Attribute objects,
		 * by AttributeDataTypeId Index(es)
		 * @param integer $intAttributeDataTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Attribute[]
		*/
		public static function LoadArrayByAttributeDataTypeId($intAttributeDataTypeId, $objOptionalClauses = null) {
			// Call Attribute::QueryArray to perform the LoadArrayByAttributeDataTypeId query
			try {
				return Attribute::QueryArray(
					QQ::Equal(QQN::Attribute()->AttributeDataTypeId, $intAttributeDataTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Attributes
		 * by AttributeDataTypeId Index(es)
		 * @param integer $intAttributeDataTypeId
		 * @return int
		*/
		public static function CountByAttributeDataTypeId($intAttributeDataTypeId) {
			// Call Attribute::QueryCount to perform the CountByAttributeDataTypeId query
			return Attribute::QueryCount(
				QQ::Equal(QQN::Attribute()->AttributeDataTypeId, $intAttributeDataTypeId)
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
				INSERT INTO `attribute` (
					`id`,
					`attribute_data_type_id`,
					`name`,
					sys_login_id,
					sys_action,
					sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intAttributeDataTypeId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strName) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Save this Attribute
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `attribute` (
							`attribute_data_type_id`,
							`name`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intAttributeDataTypeId) . ',
							' . $objDatabase->SqlVariable($this->strName) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('attribute', 'id');

					// Journaling
					$this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`attribute`
						SET
							`attribute_data_type_id` = ' . $objDatabase->SqlVariable($this->intAttributeDataTypeId) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . '
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
		 * Delete this Attribute
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Attribute with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			$this->Journal('DELETE');
		}

		/**
		 * Delete all Attributes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute`');
		}

		/**
		 * Truncate attribute table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `attribute`');
		}

		/**
		 * Reload this Attribute from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Attribute object.');

			// Reload the Object
			$objReloaded = Attribute::Load($this->intId);

			// Update $this's local variables to match
			$this->AttributeDataTypeId = $objReloaded->AttributeDataTypeId;
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

				case 'AttributeDataTypeId':
					// Gets the value for intAttributeDataTypeId (Not Null)
					// @return integer
					return $this->intAttributeDataTypeId;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_AttributeOption':
					// Gets the value for the private _objAttributeOption (Read-Only)
					// if set due to an expansion on the attribute_option.attribute_id reverse relationship
					// @return AttributeOption
					return $this->_objAttributeOption;

				case '_AttributeOptionArray':
					// Gets the value for the private _objAttributeOptionArray (Read-Only)
					// if set due to an ExpandAsArray on the attribute_option.attribute_id reverse relationship
					// @return AttributeOption[]
					return (array) $this->_objAttributeOptionArray;

				case '_AttributeValue':
					// Gets the value for the private _objAttributeValue (Read-Only)
					// if set due to an expansion on the attribute_value.attribute_id reverse relationship
					// @return AttributeValue
					return $this->_objAttributeValue;

				case '_AttributeValueArray':
					// Gets the value for the private _objAttributeValueArray (Read-Only)
					// if set due to an ExpandAsArray on the attribute_value.attribute_id reverse relationship
					// @return AttributeValue[]
					return (array) $this->_objAttributeValueArray;


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
				case 'AttributeDataTypeId':
					// Sets the value for intAttributeDataTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intAttributeDataTypeId = QType::Cast($mixValue, QType::Integer));
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

			
		
		// Related Objects' Methods for AttributeOption
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AttributeOptions as an array of AttributeOption objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeOption[]
		*/ 
		public function GetAttributeOptionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return AttributeOption::LoadArrayByAttributeId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AttributeOptions
		 * @return int
		*/ 
		public function CountAttributeOptions() {
			if ((is_null($this->intId)))
				return 0;

			return AttributeOption::CountByAttributeId($this->intId);
		}

		/**
		 * Associates a AttributeOption
		 * @param AttributeOption $objAttributeOption
		 * @return void
		*/ 
		public function AssociateAttributeOption(AttributeOption $objAttributeOption) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeOption on this unsaved Attribute.');
			if ((is_null($objAttributeOption->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeOption on this Attribute with an unsaved AttributeOption.');

			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_option`
				SET
					`attribute_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeOption->Id) . '
			');

			// Journaling
			$objAttributeOption->AttributeId = $this->intId;
			$objAttributeOption->Journal('UPDATE');
		}

		/**
		 * Unassociates a AttributeOption
		 * @param AttributeOption $objAttributeOption
		 * @return void
		*/ 
		public function UnassociateAttributeOption(AttributeOption $objAttributeOption) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeOption on this unsaved Attribute.');
			if ((is_null($objAttributeOption->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeOption on this Attribute with an unsaved AttributeOption.');

			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_option`
				SET
					`attribute_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeOption->Id) . ' AND
					`attribute_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objAttributeOption->AttributeId = null;
			$objAttributeOption->Journal('UPDATE');
		}

		/**
		 * Unassociates all AttributeOptions
		 * @return void
		*/ 
		public function UnassociateAllAttributeOptions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeOption on this unsaved Attribute.');

			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Journaling
			foreach (AttributeOption::LoadArrayByAttributeId($this->intId) as $objAttributeOption) {
				$objAttributeOption->AttributeId = null;
				$objAttributeOption->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_option`
				SET
					`attribute_id` = null
				WHERE
					`attribute_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated AttributeOption
		 * @param AttributeOption $objAttributeOption
		 * @return void
		*/ 
		public function DeleteAssociatedAttributeOption(AttributeOption $objAttributeOption) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeOption on this unsaved Attribute.');
			if ((is_null($objAttributeOption->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeOption on this Attribute with an unsaved AttributeOption.');

			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_option`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeOption->Id) . ' AND
					`attribute_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objAttributeOption->Journal('DELETE');
		}

		/**
		 * Deletes all associated AttributeOptions
		 * @return void
		*/ 
		public function DeleteAllAttributeOptions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeOption on this unsaved Attribute.');

			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Journaling
			foreach (AttributeOption::LoadArrayByAttributeId($this->intId) as $objAttributeOption) {
				$objAttributeOption->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_option`
				WHERE
					`attribute_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for AttributeValue
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AttributeValues as an array of AttributeValue objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeValue[]
		*/ 
		public function GetAttributeValueArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return AttributeValue::LoadArrayByAttributeId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AttributeValues
		 * @return int
		*/ 
		public function CountAttributeValues() {
			if ((is_null($this->intId)))
				return 0;

			return AttributeValue::CountByAttributeId($this->intId);
		}

		/**
		 * Associates a AttributeValue
		 * @param AttributeValue $objAttributeValue
		 * @return void
		*/ 
		public function AssociateAttributeValue(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeValue on this unsaved Attribute.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeValue on this Attribute with an unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_value`
				SET
					`attribute_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeValue->Id) . '
			');

			// Journaling
			$objAttributeValue->AttributeId = $this->intId;
			$objAttributeValue->Journal('UPDATE');
		}

		/**
		 * Unassociates a AttributeValue
		 * @param AttributeValue $objAttributeValue
		 * @return void
		*/ 
		public function UnassociateAttributeValue(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this unsaved Attribute.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this Attribute with an unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_value`
				SET
					`attribute_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeValue->Id) . ' AND
					`attribute_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objAttributeValue->AttributeId = null;
			$objAttributeValue->Journal('UPDATE');
		}

		/**
		 * Unassociates all AttributeValues
		 * @return void
		*/ 
		public function UnassociateAllAttributeValues() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this unsaved Attribute.');

			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Journaling
			foreach (AttributeValue::LoadArrayByAttributeId($this->intId) as $objAttributeValue) {
				$objAttributeValue->AttributeId = null;
				$objAttributeValue->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_value`
				SET
					`attribute_id` = null
				WHERE
					`attribute_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated AttributeValue
		 * @param AttributeValue $objAttributeValue
		 * @return void
		*/ 
		public function DeleteAssociatedAttributeValue(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this unsaved Attribute.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this Attribute with an unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_value`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeValue->Id) . ' AND
					`attribute_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objAttributeValue->Journal('DELETE');
		}

		/**
		 * Deletes all associated AttributeValues
		 * @return void
		*/ 
		public function DeleteAllAttributeValues() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this unsaved Attribute.');

			// Get the Database Object for this Class
			$objDatabase = Attribute::GetDatabase();

			// Journaling
			foreach (AttributeValue::LoadArrayByAttributeId($this->intId) as $objAttributeValue) {
				$objAttributeValue->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_value`
				WHERE
					`attribute_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Attribute"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="AttributeDataTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Attribute', $strComplexTypeArray)) {
				$strComplexTypeArray['Attribute'] = Attribute::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Attribute::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Attribute();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'AttributeDataTypeId'))
				$objToReturn->intAttributeDataTypeId = $objSoapObject->AttributeDataTypeId;
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
				array_push($objArrayToReturn, Attribute::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeAttribute extends QQNode {
		protected $strTableName = 'attribute';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Attribute';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'AttributeDataTypeId':
					return new QQNode('attribute_data_type_id', 'AttributeDataTypeId', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'AttributeOption':
					return new QQReverseReferenceNodeAttributeOption($this, 'attributeoption', 'reverse_reference', 'attribute_id');
				case 'AttributeValue':
					return new QQReverseReferenceNodeAttributeValue($this, 'attributevalue', 'reverse_reference', 'attribute_id');

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

	class QQReverseReferenceNodeAttribute extends QQReverseReferenceNode {
		protected $strTableName = 'attribute';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Attribute';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'AttributeDataTypeId':
					return new QQNode('attribute_data_type_id', 'AttributeDataTypeId', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'AttributeOption':
					return new QQReverseReferenceNodeAttributeOption($this, 'attributeoption', 'reverse_reference', 'attribute_id');
				case 'AttributeValue':
					return new QQReverseReferenceNodeAttributeValue($this, 'attributevalue', 'reverse_reference', 'attribute_id');

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