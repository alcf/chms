<?php
	/**
	 * The abstract GrowthGroupLocationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GrowthGroupLocation subclass which
	 * extends this GrowthGroupLocationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GrowthGroupLocation class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Location the value for strLocation 
	 * @property double $Longitude the value for fltLongitude 
	 * @property double $Latitude the value for fltLatitude 
	 * @property integer $Zoom the value for intZoom 
	 * @property GrowthGroup $_GrowthGroup the value for the private _objGrowthGroup (Read-Only) if set due to an expansion on the growth_group.growth_group_location_id reverse relationship
	 * @property GrowthGroup[] $_GrowthGroupArray the value for the private _objGrowthGroupArray (Read-Only) if set due to an ExpandAsArray on the growth_group.growth_group_location_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GrowthGroupLocationGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column growth_group_location.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group_location.location
		 * @var string strLocation
		 */
		protected $strLocation;
		const LocationMaxLength = 100;
		const LocationDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group_location.longitude
		 * @var double fltLongitude
		 */
		protected $fltLongitude;
		const LongitudeDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group_location.latitude
		 * @var double fltLatitude
		 */
		protected $fltLatitude;
		const LatitudeDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group_location.zoom
		 * @var integer intZoom
		 */
		protected $intZoom;
		const ZoomDefault = null;


		/**
		 * Private member variable that stores a reference to a single GrowthGroup object
		 * (of type GrowthGroup), if this GrowthGroupLocation object was restored with
		 * an expansion on the growth_group association table.
		 * @var GrowthGroup _objGrowthGroup;
		 */
		private $_objGrowthGroup;

		/**
		 * Private member variable that stores a reference to an array of GrowthGroup objects
		 * (of type GrowthGroup[]), if this GrowthGroupLocation object was restored with
		 * an ExpandAsArray on the growth_group association table.
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
		 * Load a GrowthGroupLocation from PK Info
		 * @param integer $intId
		 * @return GrowthGroupLocation
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return GrowthGroupLocation::QuerySingle(
				QQ::Equal(QQN::GrowthGroupLocation()->Id, $intId)
			);
		}

		/**
		 * Load all GrowthGroupLocations
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GrowthGroupLocation[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call GrowthGroupLocation::QueryArray to perform the LoadAll query
			try {
				return GrowthGroupLocation::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GrowthGroupLocations
		 * @return int
		 */
		public static function CountAll() {
			// Call GrowthGroupLocation::QueryCount to perform the CountAll query
			return GrowthGroupLocation::QueryCount(QQ::All());
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
			$objDatabase = GrowthGroupLocation::GetDatabase();

			// Create/Build out the QueryBuilder object with GrowthGroupLocation-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'growth_group_location');
			GrowthGroupLocation::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('growth_group_location');

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
		 * Static Qcodo Query method to query for a single GrowthGroupLocation object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GrowthGroupLocation the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GrowthGroupLocation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new GrowthGroupLocation object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GrowthGroupLocation::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return GrowthGroupLocation::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of GrowthGroupLocation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GrowthGroupLocation[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GrowthGroupLocation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GrowthGroupLocation::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GrowthGroupLocation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of GrowthGroupLocation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GrowthGroupLocation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GrowthGroupLocation::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'growth_group_location_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with GrowthGroupLocation-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				GrowthGroupLocation::GetSelectFields($objQueryBuilder);
				GrowthGroupLocation::GetFromFields($objQueryBuilder);

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
			return GrowthGroupLocation::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GrowthGroupLocation
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'growth_group_location';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'location', $strAliasPrefix . 'location');
			$objBuilder->AddSelectItem($strTableName, 'longitude', $strAliasPrefix . 'longitude');
			$objBuilder->AddSelectItem($strTableName, 'latitude', $strAliasPrefix . 'latitude');
			$objBuilder->AddSelectItem($strTableName, 'zoom', $strAliasPrefix . 'zoom');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a GrowthGroupLocation from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GrowthGroupLocation::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return GrowthGroupLocation
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
					$strAliasPrefix = 'growth_group_location__';


				$strAlias = $strAliasPrefix . 'growthgroup__group_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objGrowthGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objGrowthGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = GrowthGroup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objGrowthGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objGrowthGroupArray[] = GrowthGroup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'growth_group_location__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the GrowthGroupLocation object
			$objToReturn = new GrowthGroupLocation();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'location', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'location'] : $strAliasPrefix . 'location';
			$objToReturn->strLocation = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'longitude', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'longitude'] : $strAliasPrefix . 'longitude';
			$objToReturn->fltLongitude = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'latitude', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'latitude'] : $strAliasPrefix . 'latitude';
			$objToReturn->fltLatitude = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'zoom', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'zoom'] : $strAliasPrefix . 'zoom';
			$objToReturn->intZoom = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'growth_group_location__';




			// Check for GrowthGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'growthgroup__group_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objGrowthGroupArray[] = GrowthGroup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objGrowthGroup = GrowthGroup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of GrowthGroupLocations from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return GrowthGroupLocation[]
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
					$objItem = GrowthGroupLocation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GrowthGroupLocation::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single GrowthGroupLocation object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GrowthGroupLocation next row resulting from the query
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
			return GrowthGroupLocation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single GrowthGroupLocation object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return GrowthGroupLocation
		*/
		public static function LoadById($intId) {
			return GrowthGroupLocation::QuerySingle(
				QQ::Equal(QQN::GrowthGroupLocation()->Id, $intId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this GrowthGroupLocation
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GrowthGroupLocation::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `growth_group_location` (
							`location`,
							`longitude`,
							`latitude`,
							`zoom`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strLocation) . ',
							' . $objDatabase->SqlVariable($this->fltLongitude) . ',
							' . $objDatabase->SqlVariable($this->fltLatitude) . ',
							' . $objDatabase->SqlVariable($this->intZoom) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('growth_group_location', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`growth_group_location`
						SET
							`location` = ' . $objDatabase->SqlVariable($this->strLocation) . ',
							`longitude` = ' . $objDatabase->SqlVariable($this->fltLongitude) . ',
							`latitude` = ' . $objDatabase->SqlVariable($this->fltLatitude) . ',
							`zoom` = ' . $objDatabase->SqlVariable($this->intZoom) . '
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
		 * Delete this GrowthGroupLocation
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GrowthGroupLocation with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroupLocation::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growth_group_location`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');
		}

		/**
		 * Delete all GrowthGroupLocations
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GrowthGroupLocation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growth_group_location`');
		}

		/**
		 * Truncate growth_group_location table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GrowthGroupLocation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `growth_group_location`');
		}

		/**
		 * Reload this GrowthGroupLocation from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GrowthGroupLocation object.');

			// Reload the Object
			$objReloaded = GrowthGroupLocation::Load($this->intId);

			// Update $this's local variables to match
			$this->strLocation = $objReloaded->strLocation;
			$this->fltLongitude = $objReloaded->fltLongitude;
			$this->fltLatitude = $objReloaded->fltLatitude;
			$this->intZoom = $objReloaded->intZoom;
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

				case 'Location':
					// Gets the value for strLocation 
					// @return string
					return $this->strLocation;

				case 'Longitude':
					// Gets the value for fltLongitude 
					// @return double
					return $this->fltLongitude;

				case 'Latitude':
					// Gets the value for fltLatitude 
					// @return double
					return $this->fltLatitude;

				case 'Zoom':
					// Gets the value for intZoom 
					// @return integer
					return $this->intZoom;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_GrowthGroup':
					// Gets the value for the private _objGrowthGroup (Read-Only)
					// if set due to an expansion on the growth_group.growth_group_location_id reverse relationship
					// @return GrowthGroup
					return $this->_objGrowthGroup;

				case '_GrowthGroupArray':
					// Gets the value for the private _objGrowthGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the growth_group.growth_group_location_id reverse relationship
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
				case 'Location':
					// Sets the value for strLocation 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLocation = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Longitude':
					// Sets the value for fltLongitude 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltLongitude = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Latitude':
					// Sets the value for fltLatitude 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltLatitude = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Zoom':
					// Sets the value for intZoom 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intZoom = QType::Cast($mixValue, QType::Integer));
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

			
		
		// Related Objects' Methods for GrowthGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GrowthGroups as an array of GrowthGroup objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GrowthGroup[]
		*/ 
		public function GetGrowthGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GrowthGroup::LoadArrayByGrowthGroupLocationId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GrowthGroups
		 * @return int
		*/ 
		public function CountGrowthGroups() {
			if ((is_null($this->intId)))
				return 0;

			return GrowthGroup::CountByGrowthGroupLocationId($this->intId);
		}

		/**
		 * Associates a GrowthGroup
		 * @param GrowthGroup $objGrowthGroup
		 * @return void
		*/ 
		public function AssociateGrowthGroup(GrowthGroup $objGrowthGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGrowthGroup on this unsaved GrowthGroupLocation.');
			if ((is_null($objGrowthGroup->GroupId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGrowthGroup on this GrowthGroupLocation with an unsaved GrowthGroup.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroupLocation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`growth_group`
				SET
					`growth_group_location_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($objGrowthGroup->GroupId) . '
			');
		}

		/**
		 * Unassociates a GrowthGroup
		 * @param GrowthGroup $objGrowthGroup
		 * @return void
		*/ 
		public function UnassociateGrowthGroup(GrowthGroup $objGrowthGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroup on this unsaved GrowthGroupLocation.');
			if ((is_null($objGrowthGroup->GroupId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroup on this GrowthGroupLocation with an unsaved GrowthGroup.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroupLocation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`growth_group`
				SET
					`growth_group_location_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($objGrowthGroup->GroupId) . ' AND
					`growth_group_location_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GrowthGroups
		 * @return void
		*/ 
		public function UnassociateAllGrowthGroups() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroup on this unsaved GrowthGroupLocation.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroupLocation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`growth_group`
				SET
					`growth_group_location_id` = null
				WHERE
					`growth_group_location_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GrowthGroup
		 * @param GrowthGroup $objGrowthGroup
		 * @return void
		*/ 
		public function DeleteAssociatedGrowthGroup(GrowthGroup $objGrowthGroup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroup on this unsaved GrowthGroupLocation.');
			if ((is_null($objGrowthGroup->GroupId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroup on this GrowthGroupLocation with an unsaved GrowthGroup.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroupLocation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growth_group`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($objGrowthGroup->GroupId) . ' AND
					`growth_group_location_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GrowthGroups
		 * @return void
		*/ 
		public function DeleteAllGrowthGroups() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroup on this unsaved GrowthGroupLocation.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroupLocation::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growth_group`
				WHERE
					`growth_group_location_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="GrowthGroupLocation"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Location" type="xsd:string"/>';
			$strToReturn .= '<element name="Longitude" type="xsd:float"/>';
			$strToReturn .= '<element name="Latitude" type="xsd:float"/>';
			$strToReturn .= '<element name="Zoom" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GrowthGroupLocation', $strComplexTypeArray)) {
				$strComplexTypeArray['GrowthGroupLocation'] = GrowthGroupLocation::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GrowthGroupLocation::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GrowthGroupLocation();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Location'))
				$objToReturn->strLocation = $objSoapObject->Location;
			if (property_exists($objSoapObject, 'Longitude'))
				$objToReturn->fltLongitude = $objSoapObject->Longitude;
			if (property_exists($objSoapObject, 'Latitude'))
				$objToReturn->fltLatitude = $objSoapObject->Latitude;
			if (property_exists($objSoapObject, 'Zoom'))
				$objToReturn->intZoom = $objSoapObject->Zoom;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, GrowthGroupLocation::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeGrowthGroupLocation extends QQNode {
		protected $strTableName = 'growth_group_location';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GrowthGroupLocation';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Location':
					return new QQNode('location', 'Location', 'string', $this);
				case 'Longitude':
					return new QQNode('longitude', 'Longitude', 'double', $this);
				case 'Latitude':
					return new QQNode('latitude', 'Latitude', 'double', $this);
				case 'Zoom':
					return new QQNode('zoom', 'Zoom', 'integer', $this);
				case 'GrowthGroup':
					return new QQReverseReferenceNodeGrowthGroup($this, 'growthgroup', 'reverse_reference', 'growth_group_location_id');

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

	class QQReverseReferenceNodeGrowthGroupLocation extends QQReverseReferenceNode {
		protected $strTableName = 'growth_group_location';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GrowthGroupLocation';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Location':
					return new QQNode('location', 'Location', 'string', $this);
				case 'Longitude':
					return new QQNode('longitude', 'Longitude', 'double', $this);
				case 'Latitude':
					return new QQNode('latitude', 'Latitude', 'double', $this);
				case 'Zoom':
					return new QQNode('zoom', 'Zoom', 'integer', $this);
				case 'GrowthGroup':
					return new QQReverseReferenceNodeGrowthGroup($this, 'growthgroup', 'reverse_reference', 'growth_group_location_id');

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