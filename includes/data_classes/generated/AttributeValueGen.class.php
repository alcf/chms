<?php
	/**
	 * The abstract AttributeValueGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the AttributeValue subclass which
	 * extends this AttributeValueGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the AttributeValue class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $AttributeId the value for intAttributeId (Not Null)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property QDateTime $DateValue the value for dttDateValue 
	 * @property QDateTime $DatetimeValue the value for dttDatetimeValue 
	 * @property string $TextValue the value for strTextValue 
	 * @property boolean $BooleanValue the value for blnBooleanValue 
	 * @property integer $SingleAttributeOptionId the value for intSingleAttributeOptionId 
	 * @property Attribute $Attribute the value for the Attribute object referenced by intAttributeId (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property AttributeOption $SingleAttributeOption the value for the AttributeOption object referenced by intSingleAttributeOptionId 
	 * @property AttributeOption $_AttributeOptionAsMultiple the value for the private _objAttributeOptionAsMultiple (Read-Only) if set due to an expansion on the attributevalue_multipleattributeoption_assn association table
	 * @property AttributeOption[] $_AttributeOptionAsMultipleArray the value for the private _objAttributeOptionAsMultipleArray (Read-Only) if set due to an ExpandAsArray on the attributevalue_multipleattributeoption_assn association table
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AttributeValueGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column attribute_value.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column attribute_value.attribute_id
		 * @var integer intAttributeId
		 */
		protected $intAttributeId;
		const AttributeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column attribute_value.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column attribute_value.date_value
		 * @var QDateTime dttDateValue
		 */
		protected $dttDateValue;
		const DateValueDefault = null;


		/**
		 * Protected member variable that maps to the database column attribute_value.datetime_value
		 * @var QDateTime dttDatetimeValue
		 */
		protected $dttDatetimeValue;
		const DatetimeValueDefault = null;


		/**
		 * Protected member variable that maps to the database column attribute_value.text_value
		 * @var string strTextValue
		 */
		protected $strTextValue;
		const TextValueDefault = null;


		/**
		 * Protected member variable that maps to the database column attribute_value.boolean_value
		 * @var boolean blnBooleanValue
		 */
		protected $blnBooleanValue;
		const BooleanValueDefault = null;


		/**
		 * Protected member variable that maps to the database column attribute_value.single_attribute_option_id
		 * @var integer intSingleAttributeOptionId
		 */
		protected $intSingleAttributeOptionId;
		const SingleAttributeOptionIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single AttributeOptionAsMultiple object
		 * (of type AttributeOption), if this AttributeValue object was restored with
		 * an expansion on the attributevalue_multipleattributeoption_assn association table.
		 * @var AttributeOption _objAttributeOptionAsMultiple;
		 */
		private $_objAttributeOptionAsMultiple;

		/**
		 * Private member variable that stores a reference to an array of AttributeOptionAsMultiple objects
		 * (of type AttributeOption[]), if this AttributeValue object was restored with
		 * an ExpandAsArray on the attributevalue_multipleattributeoption_assn association table.
		 * @var AttributeOption[] _objAttributeOptionAsMultipleArray;
		 */
		private $_objAttributeOptionAsMultipleArray = array();

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
		 * in the database column attribute_value.attribute_id.
		 *
		 * NOTE: Always use the Attribute property getter to correctly retrieve this Attribute object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Attribute objAttribute
		 */
		protected $objAttribute;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column attribute_value.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column attribute_value.single_attribute_option_id.
		 *
		 * NOTE: Always use the SingleAttributeOption property getter to correctly retrieve this AttributeOption object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AttributeOption objSingleAttributeOption
		 */
		protected $objSingleAttributeOption;





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
		 * Load a AttributeValue from PK Info
		 * @param integer $intId
		 * @return AttributeValue
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return AttributeValue::QuerySingle(
				QQ::Equal(QQN::AttributeValue()->Id, $intId)
			);
		}

		/**
		 * Load all AttributeValues
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeValue[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call AttributeValue::QueryArray to perform the LoadAll query
			try {
				return AttributeValue::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all AttributeValues
		 * @return int
		 */
		public static function CountAll() {
			// Call AttributeValue::QueryCount to perform the CountAll query
			return AttributeValue::QueryCount(QQ::All());
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
			$objDatabase = AttributeValue::GetDatabase();

			// Create/Build out the QueryBuilder object with AttributeValue-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'attribute_value');
			AttributeValue::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('attribute_value');

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
		 * Static Qcodo Query method to query for a single AttributeValue object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AttributeValue the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AttributeValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new AttributeValue object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = AttributeValue::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return AttributeValue::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of AttributeValue objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AttributeValue[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AttributeValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AttributeValue::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = AttributeValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of AttributeValue objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AttributeValue::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = AttributeValue::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'attribute_value_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with AttributeValue-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				AttributeValue::GetSelectFields($objQueryBuilder);
				AttributeValue::GetFromFields($objQueryBuilder);

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
			return AttributeValue::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this AttributeValue
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'attribute_value';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'attribute_id', $strAliasPrefix . 'attribute_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'date_value', $strAliasPrefix . 'date_value');
			$objBuilder->AddSelectItem($strTableName, 'datetime_value', $strAliasPrefix . 'datetime_value');
			$objBuilder->AddSelectItem($strTableName, 'text_value', $strAliasPrefix . 'text_value');
			$objBuilder->AddSelectItem($strTableName, 'boolean_value', $strAliasPrefix . 'boolean_value');
			$objBuilder->AddSelectItem($strTableName, 'single_attribute_option_id', $strAliasPrefix . 'single_attribute_option_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a AttributeValue from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this AttributeValue::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return AttributeValue
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
					$strAliasPrefix = 'attribute_value__';

				$strAlias = $strAliasPrefix . 'attributeoptionasmultiple__attribute_option_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAttributeOptionAsMultipleArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAttributeOptionAsMultipleArray[$intPreviousChildItemCount - 1];
						$objChildItem = AttributeOption::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributeoptionasmultiple__attribute_option_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAttributeOptionAsMultipleArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAttributeOptionAsMultipleArray[] = AttributeOption::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributeoptionasmultiple__attribute_option_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'attribute_value__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the AttributeValue object
			$objToReturn = new AttributeValue();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'attribute_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'attribute_id'] : $strAliasPrefix . 'attribute_id';
			$objToReturn->intAttributeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_value', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_value'] : $strAliasPrefix . 'date_value';
			$objToReturn->dttDateValue = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'datetime_value', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'datetime_value'] : $strAliasPrefix . 'datetime_value';
			$objToReturn->dttDatetimeValue = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'text_value', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'text_value'] : $strAliasPrefix . 'text_value';
			$objToReturn->strTextValue = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'boolean_value', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'boolean_value'] : $strAliasPrefix . 'boolean_value';
			$objToReturn->blnBooleanValue = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'single_attribute_option_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'single_attribute_option_id'] : $strAliasPrefix . 'single_attribute_option_id';
			$objToReturn->intSingleAttributeOptionId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'attribute_value__';

			// Check for Attribute Early Binding
			$strAlias = $strAliasPrefix . 'attribute_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAttribute = Attribute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attribute_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for SingleAttributeOption Early Binding
			$strAlias = $strAliasPrefix . 'single_attribute_option_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSingleAttributeOption = AttributeOption::InstantiateDbRow($objDbRow, $strAliasPrefix . 'single_attribute_option_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for AttributeOptionAsMultiple Virtual Binding
			$strAlias = $strAliasPrefix . 'attributeoptionasmultiple__attribute_option_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAttributeOptionAsMultipleArray[] = AttributeOption::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributeoptionasmultiple__attribute_option_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAttributeOptionAsMultiple = AttributeOption::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributeoptionasmultiple__attribute_option_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			return $objToReturn;
		}

		/**
		 * Instantiate an array of AttributeValues from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return AttributeValue[]
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
					$objItem = AttributeValue::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = AttributeValue::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single AttributeValue object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return AttributeValue next row resulting from the query
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
			return AttributeValue::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single AttributeValue object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return AttributeValue
		*/
		public static function LoadById($intId) {
			return AttributeValue::QuerySingle(
				QQ::Equal(QQN::AttributeValue()->Id, $intId)
			);
		}
			
		/**
		 * Load a single AttributeValue object,
		 * by AttributeId, PersonId Index(es)
		 * @param integer $intAttributeId
		 * @param integer $intPersonId
		 * @return AttributeValue
		*/
		public static function LoadByAttributeIdPersonId($intAttributeId, $intPersonId) {
			return AttributeValue::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::AttributeValue()->AttributeId, $intAttributeId),
				QQ::Equal(QQN::AttributeValue()->PersonId, $intPersonId)
				)
			);
		}
			
		/**
		 * Load an array of AttributeValue objects,
		 * by AttributeId Index(es)
		 * @param integer $intAttributeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeValue[]
		*/
		public static function LoadArrayByAttributeId($intAttributeId, $objOptionalClauses = null) {
			// Call AttributeValue::QueryArray to perform the LoadArrayByAttributeId query
			try {
				return AttributeValue::QueryArray(
					QQ::Equal(QQN::AttributeValue()->AttributeId, $intAttributeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AttributeValues
		 * by AttributeId Index(es)
		 * @param integer $intAttributeId
		 * @return int
		*/
		public static function CountByAttributeId($intAttributeId) {
			// Call AttributeValue::QueryCount to perform the CountByAttributeId query
			return AttributeValue::QueryCount(
				QQ::Equal(QQN::AttributeValue()->AttributeId, $intAttributeId)
			);
		}
			
		/**
		 * Load an array of AttributeValue objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeValue[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call AttributeValue::QueryArray to perform the LoadArrayByPersonId query
			try {
				return AttributeValue::QueryArray(
					QQ::Equal(QQN::AttributeValue()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AttributeValues
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call AttributeValue::QueryCount to perform the CountByPersonId query
			return AttributeValue::QueryCount(
				QQ::Equal(QQN::AttributeValue()->PersonId, $intPersonId)
			);
		}
			
		/**
		 * Load an array of AttributeValue objects,
		 * by SingleAttributeOptionId Index(es)
		 * @param integer $intSingleAttributeOptionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeValue[]
		*/
		public static function LoadArrayBySingleAttributeOptionId($intSingleAttributeOptionId, $objOptionalClauses = null) {
			// Call AttributeValue::QueryArray to perform the LoadArrayBySingleAttributeOptionId query
			try {
				return AttributeValue::QueryArray(
					QQ::Equal(QQN::AttributeValue()->SingleAttributeOptionId, $intSingleAttributeOptionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AttributeValues
		 * by SingleAttributeOptionId Index(es)
		 * @param integer $intSingleAttributeOptionId
		 * @return int
		*/
		public static function CountBySingleAttributeOptionId($intSingleAttributeOptionId) {
			// Call AttributeValue::QueryCount to perform the CountBySingleAttributeOptionId query
			return AttributeValue::QueryCount(
				QQ::Equal(QQN::AttributeValue()->SingleAttributeOptionId, $intSingleAttributeOptionId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of AttributeOption objects for a given AttributeOptionAsMultiple
		 * via the attributevalue_multipleattributeoption_assn table
		 * @param integer $intAttributeOptionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeValue[]
		*/
		public static function LoadArrayByAttributeOptionAsMultiple($intAttributeOptionId, $objOptionalClauses = null) {
			// Call AttributeValue::QueryArray to perform the LoadArrayByAttributeOptionAsMultiple query
			try {
				return AttributeValue::QueryArray(
					QQ::Equal(QQN::AttributeValue()->AttributeOptionAsMultiple->AttributeOptionId, $intAttributeOptionId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AttributeValues for a given AttributeOptionAsMultiple
		 * via the attributevalue_multipleattributeoption_assn table
		 * @param integer $intAttributeOptionId
		 * @return int
		*/
		public static function CountByAttributeOptionAsMultiple($intAttributeOptionId) {
			return AttributeValue::QueryCount(
				QQ::Equal(QQN::AttributeValue()->AttributeOptionAsMultiple->AttributeOptionId, $intAttributeOptionId)
			);
		}




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
				INSERT INTO `attribute_value` (
					`id`,
					`attribute_id`,
					`person_id`,
					`date_value`,
					`datetime_value`,
					`text_value`,
					`boolean_value`,
					`single_attribute_option_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intAttributeId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intPersonId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->dttDateValue) . ',
					' . QApplication::$Database[2]->SqlVariable($this->dttDatetimeValue) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strTextValue) . ',
					' . QApplication::$Database[2]->SqlVariable($this->blnBooleanValue) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intSingleAttributeOptionId) . ',
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
		 * @return AttributeValue[]
		 */
		public static function GetJournalForId($intId) {
			$objResult = QApplication::$Database[2]->Query('SELECT * FROM attribute_value WHERE id = ' .
				QApplication::$Database[2]->SqlVariable($intId) . ' ORDER BY __sys_date');

			return AttributeValue::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return AttributeValue[]
		 */
		public function GetJournal() {
			return AttributeValue::GetJournalForId($this->intId);
		}

		/**
		 * Save this AttributeValue
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = AttributeValue::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `attribute_value` (
							`attribute_id`,
							`person_id`,
							`date_value`,
							`datetime_value`,
							`text_value`,
							`boolean_value`,
							`single_attribute_option_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intAttributeId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->dttDateValue) . ',
							' . $objDatabase->SqlVariable($this->dttDatetimeValue) . ',
							' . $objDatabase->SqlVariable($this->strTextValue) . ',
							' . $objDatabase->SqlVariable($this->blnBooleanValue) . ',
							' . $objDatabase->SqlVariable($this->intSingleAttributeOptionId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('attribute_value', 'id');

					// Journaling
					$this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`attribute_value`
						SET
							`attribute_id` = ' . $objDatabase->SqlVariable($this->intAttributeId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`date_value` = ' . $objDatabase->SqlVariable($this->dttDateValue) . ',
							`datetime_value` = ' . $objDatabase->SqlVariable($this->dttDatetimeValue) . ',
							`text_value` = ' . $objDatabase->SqlVariable($this->strTextValue) . ',
							`boolean_value` = ' . $objDatabase->SqlVariable($this->blnBooleanValue) . ',
							`single_attribute_option_id` = ' . $objDatabase->SqlVariable($this->intSingleAttributeOptionId) . '
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
		 * Delete this AttributeValue
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this AttributeValue with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = AttributeValue::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_value`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			$this->Journal('DELETE');
		}

		/**
		 * Delete all AttributeValues
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = AttributeValue::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_value`');
		}

		/**
		 * Truncate attribute_value table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = AttributeValue::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `attribute_value`');
		}

		/**
		 * Reload this AttributeValue from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved AttributeValue object.');

			// Reload the Object
			$objReloaded = AttributeValue::Load($this->intId);

			// Update $this's local variables to match
			$this->AttributeId = $objReloaded->AttributeId;
			$this->PersonId = $objReloaded->PersonId;
			$this->dttDateValue = $objReloaded->dttDateValue;
			$this->dttDatetimeValue = $objReloaded->dttDatetimeValue;
			$this->strTextValue = $objReloaded->strTextValue;
			$this->blnBooleanValue = $objReloaded->blnBooleanValue;
			$this->SingleAttributeOptionId = $objReloaded->SingleAttributeOptionId;
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

				case 'PersonId':
					// Gets the value for intPersonId (Not Null)
					// @return integer
					return $this->intPersonId;

				case 'DateValue':
					// Gets the value for dttDateValue 
					// @return QDateTime
					return $this->dttDateValue;

				case 'DatetimeValue':
					// Gets the value for dttDatetimeValue 
					// @return QDateTime
					return $this->dttDatetimeValue;

				case 'TextValue':
					// Gets the value for strTextValue 
					// @return string
					return $this->strTextValue;

				case 'BooleanValue':
					// Gets the value for blnBooleanValue 
					// @return boolean
					return $this->blnBooleanValue;

				case 'SingleAttributeOptionId':
					// Gets the value for intSingleAttributeOptionId 
					// @return integer
					return $this->intSingleAttributeOptionId;


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

				case 'SingleAttributeOption':
					// Gets the value for the AttributeOption object referenced by intSingleAttributeOptionId 
					// @return AttributeOption
					try {
						if ((!$this->objSingleAttributeOption) && (!is_null($this->intSingleAttributeOptionId)))
							$this->objSingleAttributeOption = AttributeOption::Load($this->intSingleAttributeOptionId);
						return $this->objSingleAttributeOption;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_AttributeOptionAsMultiple':
					// Gets the value for the private _objAttributeOptionAsMultiple (Read-Only)
					// if set due to an expansion on the attributevalue_multipleattributeoption_assn association table
					// @return AttributeOption
					return $this->_objAttributeOptionAsMultiple;

				case '_AttributeOptionAsMultipleArray':
					// Gets the value for the private _objAttributeOptionAsMultipleArray (Read-Only)
					// if set due to an ExpandAsArray on the attributevalue_multipleattributeoption_assn association table
					// @return AttributeOption[]
					return (array) $this->_objAttributeOptionAsMultipleArray;


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

				case 'DateValue':
					// Sets the value for dttDateValue 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateValue = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DatetimeValue':
					// Sets the value for dttDatetimeValue 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDatetimeValue = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TextValue':
					// Sets the value for strTextValue 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTextValue = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'BooleanValue':
					// Sets the value for blnBooleanValue 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnBooleanValue = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SingleAttributeOptionId':
					// Sets the value for intSingleAttributeOptionId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSingleAttributeOption = null;
						return ($this->intSingleAttributeOptionId = QType::Cast($mixValue, QType::Integer));
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
							throw new QCallerException('Unable to set an unsaved Attribute for this AttributeValue');

						// Update Local Member Variables
						$this->objAttribute = $mixValue;
						$this->intAttributeId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
							throw new QCallerException('Unable to set an unsaved Person for this AttributeValue');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'SingleAttributeOption':
					// Sets the value for the AttributeOption object referenced by intSingleAttributeOptionId 
					// @param AttributeOption $mixValue
					// @return AttributeOption
					if (is_null($mixValue)) {
						$this->intSingleAttributeOptionId = null;
						$this->objSingleAttributeOption = null;
						return null;
					} else {
						// Make sure $mixValue actually is a AttributeOption object
						try {
							$mixValue = QType::Cast($mixValue, 'AttributeOption');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED AttributeOption object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved SingleAttributeOption for this AttributeValue');

						// Update Local Member Variables
						$this->objSingleAttributeOption = $mixValue;
						$this->intSingleAttributeOptionId = $mixValue->Id;

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

			
		// Related Many-to-Many Objects' Methods for AttributeOptionAsMultiple
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated AttributeOptionsAsMultiple as an array of AttributeOption objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeOption[]
		*/ 
		public function GetAttributeOptionAsMultipleArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return AttributeOption::LoadArrayByAttributeValueAsMultiple($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated AttributeOptionsAsMultiple
		 * @return int
		*/ 
		public function CountAttributeOptionsAsMultiple() {
			if ((is_null($this->intId)))
				return 0;

			return AttributeOption::CountByAttributeValueAsMultiple($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific AttributeOptionAsMultiple
		 * @param AttributeOption $objAttributeOption
		 * @return bool
		*/
		public function IsAttributeOptionAsMultipleAssociated(AttributeOption $objAttributeOption) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsAttributeOptionAsMultipleAssociated on this unsaved AttributeValue.');
			if ((is_null($objAttributeOption->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsAttributeOptionAsMultipleAssociated on this AttributeValue with an unsaved AttributeOption.');

			$intRowCount = AttributeValue::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::AttributeValue()->Id, $this->intId),
					QQ::Equal(QQN::AttributeValue()->AttributeOptionAsMultiple->AttributeOptionId, $objAttributeOption->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the AttributeOptionAsMultiple relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalAttributeOptionAsMultipleAssociation($intAssociatedId, $strJournalCommand) {
			QApplication::$Database[2]->NonQuery('
				INSERT INTO `attributevalue_multipleattributeoption_assn` (
					`attribute_value_id`,
					`attribute_option_id`
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($intAssociatedId) . '
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object's AttributeOptionAsMultiple relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalAttributeOptionAsMultipleAssociationForId($intId) {
			return QApplication::$Database[2]->Query('SELECT * FROM attributevalue_multipleattributeoption_assn WHERE attribute_value_id = ' .
				QApplication::$Database[2]->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's AttributeOptionAsMultiple relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalAttributeOptionAsMultipleAssociation() {
			return AttributeValue::GetJournalAttributeOptionAsMultipleAssociationForId($this->intId);
		}

		/**
		 * Associates a AttributeOptionAsMultiple
		 * @param AttributeOption $objAttributeOption
		 * @return void
		*/ 
		public function AssociateAttributeOptionAsMultiple(AttributeOption $objAttributeOption) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeOptionAsMultiple on this unsaved AttributeValue.');
			if ((is_null($objAttributeOption->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeOptionAsMultiple on this AttributeValue with an unsaved AttributeOption.');

			// Get the Database Object for this Class
			$objDatabase = AttributeValue::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `attributevalue_multipleattributeoption_assn` (
					`attribute_value_id`,
					`attribute_option_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objAttributeOption->Id) . '
				)
			');

			// Journaling
			$this->JournalAttributeOptionAsMultipleAssociation($objAttributeOption->Id, 'INSERT');
		}

		/**
		 * Unassociates a AttributeOptionAsMultiple
		 * @param AttributeOption $objAttributeOption
		 * @return void
		*/ 
		public function UnassociateAttributeOptionAsMultiple(AttributeOption $objAttributeOption) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeOptionAsMultiple on this unsaved AttributeValue.');
			if ((is_null($objAttributeOption->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeOptionAsMultiple on this AttributeValue with an unsaved AttributeOption.');

			// Get the Database Object for this Class
			$objDatabase = AttributeValue::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attributevalue_multipleattributeoption_assn`
				WHERE
					`attribute_value_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`attribute_option_id` = ' . $objDatabase->SqlVariable($objAttributeOption->Id) . '
			');

			// Journaling
			$this->JournalAttributeOptionAsMultipleAssociation($objAttributeOption->Id, 'DELETE');
		}

		/**
		 * Unassociates all AttributeOptionsAsMultiple
		 * @return void
		*/ 
		public function UnassociateAllAttributeOptionsAsMultiple() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllAttributeOptionAsMultipleArray on this unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = AttributeValue::GetDatabase();


			// Journaling
			$objResult = $objDatabase->Query('SELECT `attribute_option_id` AS associated_id FROM `attributevalue_multipleattributeoption_assn` WHERE `attribute_value_id` = ' . $objDatabase->SqlVariable($this->intId));
			while ($objRow = $objResult->GetNextRow()) {
				$this->JournalAttributeOptionAsMultipleAssociation($objRow->GetColumn('associated_id'), 'DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attributevalue_multipleattributeoption_assn`
				WHERE
					`attribute_value_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="AttributeValue"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Attribute" type="xsd1:Attribute"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="DateValue" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DatetimeValue" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="TextValue" type="xsd:string"/>';
			$strToReturn .= '<element name="BooleanValue" type="xsd:boolean"/>';
			$strToReturn .= '<element name="SingleAttributeOption" type="xsd1:AttributeOption"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('AttributeValue', $strComplexTypeArray)) {
				$strComplexTypeArray['AttributeValue'] = AttributeValue::GetSoapComplexTypeXml();
				Attribute::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				AttributeOption::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, AttributeValue::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new AttributeValue();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Attribute')) &&
				($objSoapObject->Attribute))
				$objToReturn->Attribute = Attribute::GetObjectFromSoapObject($objSoapObject->Attribute);
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if (property_exists($objSoapObject, 'DateValue'))
				$objToReturn->dttDateValue = new QDateTime($objSoapObject->DateValue);
			if (property_exists($objSoapObject, 'DatetimeValue'))
				$objToReturn->dttDatetimeValue = new QDateTime($objSoapObject->DatetimeValue);
			if (property_exists($objSoapObject, 'TextValue'))
				$objToReturn->strTextValue = $objSoapObject->TextValue;
			if (property_exists($objSoapObject, 'BooleanValue'))
				$objToReturn->blnBooleanValue = $objSoapObject->BooleanValue;
			if ((property_exists($objSoapObject, 'SingleAttributeOption')) &&
				($objSoapObject->SingleAttributeOption))
				$objToReturn->SingleAttributeOption = AttributeOption::GetObjectFromSoapObject($objSoapObject->SingleAttributeOption);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, AttributeValue::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objAttribute)
				$objObject->objAttribute = Attribute::GetSoapObjectFromObject($objObject->objAttribute, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAttributeId = null;
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->dttDateValue)
				$objObject->dttDateValue = $objObject->dttDateValue->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDatetimeValue)
				$objObject->dttDatetimeValue = $objObject->dttDatetimeValue->__toString(QDateTime::FormatSoap);
			if ($objObject->objSingleAttributeOption)
				$objObject->objSingleAttributeOption = AttributeOption::GetSoapObjectFromObject($objObject->objSingleAttributeOption, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSingleAttributeOptionId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeAttributeValueAttributeOptionAsMultiple extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'attributeoptionasmultiple';

		protected $strTableName = 'attributevalue_multipleattributeoption_assn';
		protected $strPrimaryKey = 'attribute_value_id';
		protected $strClassName = 'AttributeOption';

		public function __get($strName) {
			switch ($strName) {
				case 'AttributeOptionId':
					return new QQNode('attribute_option_id', 'AttributeOptionId', 'integer', $this);
				case 'AttributeOption':
					return new QQNodeAttributeOption('attribute_option_id', 'AttributeOptionId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeAttributeOption('attribute_option_id', 'AttributeOptionId', 'integer', $this);
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

	class QQNodeAttributeValue extends QQNode {
		protected $strTableName = 'attribute_value';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'AttributeValue';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'AttributeId':
					return new QQNode('attribute_id', 'AttributeId', 'integer', $this);
				case 'Attribute':
					return new QQNodeAttribute('attribute_id', 'Attribute', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'DateValue':
					return new QQNode('date_value', 'DateValue', 'QDateTime', $this);
				case 'DatetimeValue':
					return new QQNode('datetime_value', 'DatetimeValue', 'QDateTime', $this);
				case 'TextValue':
					return new QQNode('text_value', 'TextValue', 'string', $this);
				case 'BooleanValue':
					return new QQNode('boolean_value', 'BooleanValue', 'boolean', $this);
				case 'SingleAttributeOptionId':
					return new QQNode('single_attribute_option_id', 'SingleAttributeOptionId', 'integer', $this);
				case 'SingleAttributeOption':
					return new QQNodeAttributeOption('single_attribute_option_id', 'SingleAttributeOption', 'integer', $this);
				case 'AttributeOptionAsMultiple':
					return new QQNodeAttributeValueAttributeOptionAsMultiple($this);

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

	class QQReverseReferenceNodeAttributeValue extends QQReverseReferenceNode {
		protected $strTableName = 'attribute_value';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'AttributeValue';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'AttributeId':
					return new QQNode('attribute_id', 'AttributeId', 'integer', $this);
				case 'Attribute':
					return new QQNodeAttribute('attribute_id', 'Attribute', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'DateValue':
					return new QQNode('date_value', 'DateValue', 'QDateTime', $this);
				case 'DatetimeValue':
					return new QQNode('datetime_value', 'DatetimeValue', 'QDateTime', $this);
				case 'TextValue':
					return new QQNode('text_value', 'TextValue', 'string', $this);
				case 'BooleanValue':
					return new QQNode('boolean_value', 'BooleanValue', 'boolean', $this);
				case 'SingleAttributeOptionId':
					return new QQNode('single_attribute_option_id', 'SingleAttributeOptionId', 'integer', $this);
				case 'SingleAttributeOption':
					return new QQNodeAttributeOption('single_attribute_option_id', 'SingleAttributeOption', 'integer', $this);
				case 'AttributeOptionAsMultiple':
					return new QQNodeAttributeValueAttributeOptionAsMultiple($this);

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