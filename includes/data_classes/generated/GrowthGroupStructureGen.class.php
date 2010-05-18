<?php
	/**
	 * The abstract GrowthGroupStructureGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GrowthGroupStructure subclass which
	 * extends this GrowthGroupStructureGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GrowthGroupStructure class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Name the value for strName 
	 * @property GrowthGroup $_GrowthGroup the value for the private _objGrowthGroup (Read-Only) if set due to an expansion on the growthgroupstructure_growthgroup_assn association table
	 * @property GrowthGroup[] $_GrowthGroupArray the value for the private _objGrowthGroupArray (Read-Only) if set due to an ExpandAsArray on the growthgroupstructure_growthgroup_assn association table
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GrowthGroupStructureGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column growth_group_structure.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group_structure.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 100;
		const NameDefault = null;


		/**
		 * Private member variable that stores a reference to a single GrowthGroup object
		 * (of type GrowthGroup), if this GrowthGroupStructure object was restored with
		 * an expansion on the growthgroupstructure_growthgroup_assn association table.
		 * @var GrowthGroup _objGrowthGroup;
		 */
		private $_objGrowthGroup;

		/**
		 * Private member variable that stores a reference to an array of GrowthGroup objects
		 * (of type GrowthGroup[]), if this GrowthGroupStructure object was restored with
		 * an ExpandAsArray on the growthgroupstructure_growthgroup_assn association table.
		 * @var GrowthGroup[] _objGrowthGroupArray;
		 */
		private $_objGrowthGroupArray = array();

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
		 * Load a GrowthGroupStructure from PK Info
		 * @param integer $intId
		 * @return GrowthGroupStructure
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return GrowthGroupStructure::QuerySingle(
				QQ::Equal(QQN::GrowthGroupStructure()->Id, $intId)
			);
		}

		/**
		 * Load all GrowthGroupStructures
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GrowthGroupStructure[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call GrowthGroupStructure::QueryArray to perform the LoadAll query
			try {
				return GrowthGroupStructure::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GrowthGroupStructures
		 * @return int
		 */
		public static function CountAll() {
			// Call GrowthGroupStructure::QueryCount to perform the CountAll query
			return GrowthGroupStructure::QueryCount(QQ::All());
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
			$objDatabase = GrowthGroupStructure::GetDatabase();

			// Create/Build out the QueryBuilder object with GrowthGroupStructure-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'growth_group_structure');
			GrowthGroupStructure::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('growth_group_structure');

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
		 * Static Qcodo Query method to query for a single GrowthGroupStructure object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GrowthGroupStructure the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GrowthGroupStructure::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new GrowthGroupStructure object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GrowthGroupStructure::InstantiateDbRow($objDbResult->GetNextRow(), null, null, null, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo Query method to query for an array of GrowthGroupStructure objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GrowthGroupStructure[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GrowthGroupStructure::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GrowthGroupStructure::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GrowthGroupStructure::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of GrowthGroupStructure objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GrowthGroupStructure::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GrowthGroupStructure::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'growth_group_structure_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with GrowthGroupStructure-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				GrowthGroupStructure::GetSelectFields($objQueryBuilder);
				GrowthGroupStructure::GetFromFields($objQueryBuilder);

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
			return GrowthGroupStructure::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GrowthGroupStructure
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'growth_group_structure';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a GrowthGroupStructure from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GrowthGroupStructure::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return GrowthGroupStructure
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
					$strAliasPrefix = 'growth_group_structure__';

				$strAlias = $strAliasPrefix . 'growthgroup__growth_group_id__group_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objGrowthGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objGrowthGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = GrowthGroup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroup__growth_group_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objGrowthGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objGrowthGroupArray[] = GrowthGroup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroup__growth_group_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'growth_group_structure__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the GrowthGroupStructure object
			$objToReturn = new GrowthGroupStructure();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'growth_group_structure__';



			// Check for GrowthGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'growthgroup__growth_group_id__group_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objGrowthGroupArray[] = GrowthGroup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroup__growth_group_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objGrowthGroup = GrowthGroup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroup__growth_group_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			return $objToReturn;
		}

		/**
		 * Instantiate an array of GrowthGroupStructures from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return GrowthGroupStructure[]
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
					$objItem = GrowthGroupStructure::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GrowthGroupStructure::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single GrowthGroupStructure object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GrowthGroupStructure next row resulting from the query
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
			return GrowthGroupStructure::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single GrowthGroupStructure object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return GrowthGroupStructure
		*/
		public static function LoadById($intId) {
			return GrowthGroupStructure::QuerySingle(
				QQ::Equal(QQN::GrowthGroupStructure()->Id, $intId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of GrowthGroup objects for a given GrowthGroup
		 * via the growthgroupstructure_growthgroup_assn table
		 * @param integer $intGrowthGroupId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GrowthGroupStructure[]
		*/
		public static function LoadArrayByGrowthGroup($intGrowthGroupId, $objOptionalClauses = null) {
			// Call GrowthGroupStructure::QueryArray to perform the LoadArrayByGrowthGroup query
			try {
				return GrowthGroupStructure::QueryArray(
					QQ::Equal(QQN::GrowthGroupStructure()->GrowthGroup->GrowthGroupId, $intGrowthGroupId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GrowthGroupStructures for a given GrowthGroup
		 * via the growthgroupstructure_growthgroup_assn table
		 * @param integer $intGrowthGroupId
		 * @return int
		*/
		public static function CountByGrowthGroup($intGrowthGroupId) {
			return GrowthGroupStructure::QueryCount(
				QQ::Equal(QQN::GrowthGroupStructure()->GrowthGroup->GrowthGroupId, $intGrowthGroupId)
			);
		}




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this GrowthGroupStructure
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GrowthGroupStructure::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `growth_group_structure` (
							`name`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('growth_group_structure', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`growth_group_structure`
						SET
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
		 * Delete this GrowthGroupStructure
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GrowthGroupStructure with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroupStructure::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growth_group_structure`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all GrowthGroupStructures
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GrowthGroupStructure::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growth_group_structure`');
		}

		/**
		 * Truncate growth_group_structure table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GrowthGroupStructure::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `growth_group_structure`');
		}

		/**
		 * Reload this GrowthGroupStructure from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GrowthGroupStructure object.');

			// Reload the Object
			$objReloaded = GrowthGroupStructure::Load($this->intId);

			// Update $this's local variables to match
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

				case '_GrowthGroup':
					// Gets the value for the private _objGrowthGroup (Read-Only)
					// if set due to an expansion on the growthgroupstructure_growthgroup_assn association table
					// @return GrowthGroup
					return $this->_objGrowthGroup;

				case '_GrowthGroupArray':
					// Gets the value for the private _objGrowthGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the growthgroupstructure_growthgroup_assn association table
					// @return GrowthGroup[]
					return (array) $this->_objGrowthGroupArray;


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

			
		// Related Many-to-Many Objects' Methods for GrowthGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated GrowthGroups as an array of GrowthGroup objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GrowthGroup[]
		*/ 
		public function GetGrowthGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GrowthGroup::LoadArrayByGrowthGroupStructure($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated GrowthGroups
		 * @return int
		*/ 
		public function CountGrowthGroups() {
			if ((is_null($this->intId)))
				return 0;

			return GrowthGroup::CountByGrowthGroupStructure($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific GrowthGroup
		 * @param GrowthGroup $objGrowthGroup
		 * @return bool
		*/
		public function IsGrowthGroupAssociated(GrowthGroup $objGrowthGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGrowthGroupAssociated on this unsaved GrowthGroupStructure.');
			if ((is_null($objGrowthGroup->GroupId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGrowthGroupAssociated on this GrowthGroupStructure with an unsaved GrowthGroup.');

			$intRowCount = GrowthGroupStructure::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GrowthGroupStructure()->Id, $this->intId),
					QQ::Equal(QQN::GrowthGroupStructure()->GrowthGroup->GrowthGroupId, $objGrowthGroup->GroupId)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a GrowthGroup
		 * @param GrowthGroup $objGrowthGroup
		 * @return void
		*/ 
		public function AssociateGrowthGroup(GrowthGroup $objGrowthGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGrowthGroup on this unsaved GrowthGroupStructure.');
			if ((is_null($objGrowthGroup->GroupId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGrowthGroup on this GrowthGroupStructure with an unsaved GrowthGroup.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroupStructure::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `growthgroupstructure_growthgroup_assn` (
					`growth_group_structure_id`,
					`growth_group_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objGrowthGroup->GroupId) . '
				)
			');
		}

		/**
		 * Unassociates a GrowthGroup
		 * @param GrowthGroup $objGrowthGroup
		 * @return void
		*/ 
		public function UnassociateGrowthGroup(GrowthGroup $objGrowthGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroup on this unsaved GrowthGroupStructure.');
			if ((is_null($objGrowthGroup->GroupId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroup on this GrowthGroupStructure with an unsaved GrowthGroup.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroupStructure::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growthgroupstructure_growthgroup_assn`
				WHERE
					`growth_group_structure_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`growth_group_id` = ' . $objDatabase->SqlVariable($objGrowthGroup->GroupId) . '
			');
		}

		/**
		 * Unassociates all GrowthGroups
		 * @return void
		*/ 
		public function UnassociateAllGrowthGroups() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllGrowthGroupArray on this unsaved GrowthGroupStructure.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroupStructure::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growthgroupstructure_growthgroup_assn`
				WHERE
					`growth_group_structure_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="GrowthGroupStructure"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GrowthGroupStructure', $strComplexTypeArray)) {
				$strComplexTypeArray['GrowthGroupStructure'] = GrowthGroupStructure::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GrowthGroupStructure::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GrowthGroupStructure();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
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
				array_push($objArrayToReturn, GrowthGroupStructure::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeGrowthGroupStructureGrowthGroup extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'growthgroup';

		protected $strTableName = 'growthgroupstructure_growthgroup_assn';
		protected $strPrimaryKey = 'growth_group_structure_id';
		protected $strClassName = 'GrowthGroup';

		public function __get($strName) {
			switch ($strName) {
				case 'GrowthGroupId':
					return new QQNode('growth_group_id', 'GrowthGroupId', 'integer', $this);
				case 'GrowthGroup':
					return new QQNodeGrowthGroup('growth_group_id', 'GrowthGroupId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeGrowthGroup('growth_group_id', 'GrowthGroupId', 'integer', $this);
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

	class QQNodeGrowthGroupStructure extends QQNode {
		protected $strTableName = 'growth_group_structure';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GrowthGroupStructure';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'GrowthGroup':
					return new QQNodeGrowthGroupStructureGrowthGroup($this);

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

	class QQReverseReferenceNodeGrowthGroupStructure extends QQReverseReferenceNode {
		protected $strTableName = 'growth_group_structure';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GrowthGroupStructure';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'GrowthGroup':
					return new QQNodeGrowthGroupStructureGrowthGroup($this);

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