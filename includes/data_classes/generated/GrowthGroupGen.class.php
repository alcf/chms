<?php
	/**
	 * The abstract GrowthGroupGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GrowthGroup subclass which
	 * extends this GrowthGroupGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GrowthGroup class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $GroupId the value for intGroupId (PK)
	 * @property integer $GrowthGroupLocationId the value for intGrowthGroupLocationId (Not Null)
	 * @property integer $GrowthGroupDayTypeId the value for intGrowthGroupDayTypeId 
	 * @property integer $MeetingBitmap the value for intMeetingBitmap 
	 * @property integer $StartTime the value for intStartTime 
	 * @property integer $EndTime the value for intEndTime 
	 * @property string $Address1 the value for strAddress1 
	 * @property string $Address2 the value for strAddress2 
	 * @property string $CrossStreet1 the value for strCrossStreet1 
	 * @property string $CrossStreet2 the value for strCrossStreet2 
	 * @property string $ZipCode the value for strZipCode 
	 * @property double $Longitude the value for fltLongitude 
	 * @property double $Latitude the value for fltLatitude 
	 * @property integer $Accuracy the value for intAccuracy 
	 * @property Group $Group the value for the Group object referenced by intGroupId (PK)
	 * @property GrowthGroupLocation $GrowthGroupLocation the value for the GrowthGroupLocation object referenced by intGrowthGroupLocationId (Not Null)
	 * @property GrowthGroupStructure $_GrowthGroupStructure the value for the private _objGrowthGroupStructure (Read-Only) if set due to an expansion on the growthgroupstructure_growthgroup_assn association table
	 * @property GrowthGroupStructure[] $_GrowthGroupStructureArray the value for the private _objGrowthGroupStructureArray (Read-Only) if set due to an ExpandAsArray on the growthgroupstructure_growthgroup_assn association table
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GrowthGroupGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column growth_group.group_id
		 * @var integer intGroupId
		 */
		protected $intGroupId;
		const GroupIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intGroupId;
		 */
		protected $__intGroupId;

		/**
		 * Protected member variable that maps to the database column growth_group.growth_group_location_id
		 * @var integer intGrowthGroupLocationId
		 */
		protected $intGrowthGroupLocationId;
		const GrowthGroupLocationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group.growth_group_day_type_id
		 * @var integer intGrowthGroupDayTypeId
		 */
		protected $intGrowthGroupDayTypeId;
		const GrowthGroupDayTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group.meeting_bitmap
		 * @var integer intMeetingBitmap
		 */
		protected $intMeetingBitmap;
		const MeetingBitmapDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group.start_time
		 * @var integer intStartTime
		 */
		protected $intStartTime;
		const StartTimeDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group.end_time
		 * @var integer intEndTime
		 */
		protected $intEndTime;
		const EndTimeDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group.address_1
		 * @var string strAddress1
		 */
		protected $strAddress1;
		const Address1MaxLength = 100;
		const Address1Default = null;


		/**
		 * Protected member variable that maps to the database column growth_group.address_2
		 * @var string strAddress2
		 */
		protected $strAddress2;
		const Address2MaxLength = 100;
		const Address2Default = null;


		/**
		 * Protected member variable that maps to the database column growth_group.cross_street_1
		 * @var string strCrossStreet1
		 */
		protected $strCrossStreet1;
		const CrossStreet1MaxLength = 100;
		const CrossStreet1Default = null;


		/**
		 * Protected member variable that maps to the database column growth_group.cross_street_2
		 * @var string strCrossStreet2
		 */
		protected $strCrossStreet2;
		const CrossStreet2MaxLength = 100;
		const CrossStreet2Default = null;


		/**
		 * Protected member variable that maps to the database column growth_group.zip_code
		 * @var string strZipCode
		 */
		protected $strZipCode;
		const ZipCodeMaxLength = 10;
		const ZipCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group.longitude
		 * @var double fltLongitude
		 */
		protected $fltLongitude;
		const LongitudeDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group.latitude
		 * @var double fltLatitude
		 */
		protected $fltLatitude;
		const LatitudeDefault = null;


		/**
		 * Protected member variable that maps to the database column growth_group.accuracy
		 * @var integer intAccuracy
		 */
		protected $intAccuracy;
		const AccuracyDefault = null;


		/**
		 * Private member variable that stores a reference to a single GrowthGroupStructure object
		 * (of type GrowthGroupStructure), if this GrowthGroup object was restored with
		 * an expansion on the growthgroupstructure_growthgroup_assn association table.
		 * @var GrowthGroupStructure _objGrowthGroupStructure;
		 */
		private $_objGrowthGroupStructure;

		/**
		 * Private member variable that stores a reference to an array of GrowthGroupStructure objects
		 * (of type GrowthGroupStructure[]), if this GrowthGroup object was restored with
		 * an ExpandAsArray on the growthgroupstructure_growthgroup_assn association table.
		 * @var GrowthGroupStructure[] _objGrowthGroupStructureArray;
		 */
		private $_objGrowthGroupStructureArray = array();

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
		 * in the database column growth_group.group_id.
		 *
		 * NOTE: Always use the Group property getter to correctly retrieve this Group object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Group objGroup
		 */
		protected $objGroup;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column growth_group.growth_group_location_id.
		 *
		 * NOTE: Always use the GrowthGroupLocation property getter to correctly retrieve this GrowthGroupLocation object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GrowthGroupLocation objGrowthGroupLocation
		 */
		protected $objGrowthGroupLocation;





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
		 * Load a GrowthGroup from PK Info
		 * @param integer $intGroupId
		 * @return GrowthGroup
		 */
		public static function Load($intGroupId) {
			// Use QuerySingle to Perform the Query
			return GrowthGroup::QuerySingle(
				QQ::Equal(QQN::GrowthGroup()->GroupId, $intGroupId)
			);
		}

		/**
		 * Load all GrowthGroups
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GrowthGroup[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call GrowthGroup::QueryArray to perform the LoadAll query
			try {
				return GrowthGroup::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GrowthGroups
		 * @return int
		 */
		public static function CountAll() {
			// Call GrowthGroup::QueryCount to perform the CountAll query
			return GrowthGroup::QueryCount(QQ::All());
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
			$objDatabase = GrowthGroup::GetDatabase();

			// Create/Build out the QueryBuilder object with GrowthGroup-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'growth_group');
			GrowthGroup::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('growth_group');

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
		 * Static Qcodo Query method to query for a single GrowthGroup object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GrowthGroup the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GrowthGroup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new GrowthGroup object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GrowthGroup::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return GrowthGroup::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of GrowthGroup objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GrowthGroup[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GrowthGroup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GrowthGroup::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GrowthGroup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of GrowthGroup objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GrowthGroup::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GrowthGroup::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'growth_group_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with GrowthGroup-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				GrowthGroup::GetSelectFields($objQueryBuilder);
				GrowthGroup::GetFromFields($objQueryBuilder);

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
			return GrowthGroup::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GrowthGroup
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'growth_group';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'group_id', $strAliasPrefix . 'group_id');
			$objBuilder->AddSelectItem($strTableName, 'growth_group_location_id', $strAliasPrefix . 'growth_group_location_id');
			$objBuilder->AddSelectItem($strTableName, 'growth_group_day_type_id', $strAliasPrefix . 'growth_group_day_type_id');
			$objBuilder->AddSelectItem($strTableName, 'meeting_bitmap', $strAliasPrefix . 'meeting_bitmap');
			$objBuilder->AddSelectItem($strTableName, 'start_time', $strAliasPrefix . 'start_time');
			$objBuilder->AddSelectItem($strTableName, 'end_time', $strAliasPrefix . 'end_time');
			$objBuilder->AddSelectItem($strTableName, 'address_1', $strAliasPrefix . 'address_1');
			$objBuilder->AddSelectItem($strTableName, 'address_2', $strAliasPrefix . 'address_2');
			$objBuilder->AddSelectItem($strTableName, 'cross_street_1', $strAliasPrefix . 'cross_street_1');
			$objBuilder->AddSelectItem($strTableName, 'cross_street_2', $strAliasPrefix . 'cross_street_2');
			$objBuilder->AddSelectItem($strTableName, 'zip_code', $strAliasPrefix . 'zip_code');
			$objBuilder->AddSelectItem($strTableName, 'longitude', $strAliasPrefix . 'longitude');
			$objBuilder->AddSelectItem($strTableName, 'latitude', $strAliasPrefix . 'latitude');
			$objBuilder->AddSelectItem($strTableName, 'accuracy', $strAliasPrefix . 'accuracy');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a GrowthGroup from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GrowthGroup::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return GrowthGroup
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'group_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intGroupId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'growth_group__';

				$strAlias = $strAliasPrefix . 'growthgroupstructure__growth_group_structure_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objGrowthGroupStructureArray)) {
						$objPreviousChildItem = $objPreviousItem->_objGrowthGroupStructureArray[$intPreviousChildItemCount - 1];
						$objChildItem = GrowthGroupStructure::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroupstructure__growth_group_structure_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objGrowthGroupStructureArray[] = $objChildItem;
					} else
						$objPreviousItem->_objGrowthGroupStructureArray[] = GrowthGroupStructure::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroupstructure__growth_group_structure_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'growth_group__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the GrowthGroup object
			$objToReturn = new GrowthGroup();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'group_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'group_id'] : $strAliasPrefix . 'group_id';
			$objToReturn->intGroupId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intGroupId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'growth_group_location_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'growth_group_location_id'] : $strAliasPrefix . 'growth_group_location_id';
			$objToReturn->intGrowthGroupLocationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'growth_group_day_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'growth_group_day_type_id'] : $strAliasPrefix . 'growth_group_day_type_id';
			$objToReturn->intGrowthGroupDayTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'meeting_bitmap', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'meeting_bitmap'] : $strAliasPrefix . 'meeting_bitmap';
			$objToReturn->intMeetingBitmap = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'start_time', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'start_time'] : $strAliasPrefix . 'start_time';
			$objToReturn->intStartTime = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'end_time', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'end_time'] : $strAliasPrefix . 'end_time';
			$objToReturn->intEndTime = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_1', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_1'] : $strAliasPrefix . 'address_1';
			$objToReturn->strAddress1 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_2', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_2'] : $strAliasPrefix . 'address_2';
			$objToReturn->strAddress2 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'cross_street_1', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cross_street_1'] : $strAliasPrefix . 'cross_street_1';
			$objToReturn->strCrossStreet1 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'cross_street_2', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cross_street_2'] : $strAliasPrefix . 'cross_street_2';
			$objToReturn->strCrossStreet2 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'zip_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'zip_code'] : $strAliasPrefix . 'zip_code';
			$objToReturn->strZipCode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'longitude', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'longitude'] : $strAliasPrefix . 'longitude';
			$objToReturn->fltLongitude = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'latitude', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'latitude'] : $strAliasPrefix . 'latitude';
			$objToReturn->fltLatitude = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'accuracy', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'accuracy'] : $strAliasPrefix . 'accuracy';
			$objToReturn->intAccuracy = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'growth_group__';

			// Check for Group Early Binding
			$strAlias = $strAliasPrefix . 'group_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objGroup = Group::InstantiateDbRow($objDbRow, $strAliasPrefix . 'group_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for GrowthGroupLocation Early Binding
			$strAlias = $strAliasPrefix . 'growth_group_location_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objGrowthGroupLocation = GrowthGroupLocation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growth_group_location_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for GrowthGroupStructure Virtual Binding
			$strAlias = $strAliasPrefix . 'growthgroupstructure__growth_group_structure_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objGrowthGroupStructureArray[] = GrowthGroupStructure::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroupstructure__growth_group_structure_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objGrowthGroupStructure = GrowthGroupStructure::InstantiateDbRow($objDbRow, $strAliasPrefix . 'growthgroupstructure__growth_group_structure_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			return $objToReturn;
		}

		/**
		 * Instantiate an array of GrowthGroups from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return GrowthGroup[]
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
					$objItem = GrowthGroup::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GrowthGroup::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single GrowthGroup object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GrowthGroup next row resulting from the query
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
			return GrowthGroup::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single GrowthGroup object,
		 * by GroupId Index(es)
		 * @param integer $intGroupId
		 * @return GrowthGroup
		*/
		public static function LoadByGroupId($intGroupId) {
			return GrowthGroup::QuerySingle(
				QQ::Equal(QQN::GrowthGroup()->GroupId, $intGroupId)
			);
		}
			
		/**
		 * Load an array of GrowthGroup objects,
		 * by GrowthGroupLocationId Index(es)
		 * @param integer $intGrowthGroupLocationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GrowthGroup[]
		*/
		public static function LoadArrayByGrowthGroupLocationId($intGrowthGroupLocationId, $objOptionalClauses = null) {
			// Call GrowthGroup::QueryArray to perform the LoadArrayByGrowthGroupLocationId query
			try {
				return GrowthGroup::QueryArray(
					QQ::Equal(QQN::GrowthGroup()->GrowthGroupLocationId, $intGrowthGroupLocationId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GrowthGroups
		 * by GrowthGroupLocationId Index(es)
		 * @param integer $intGrowthGroupLocationId
		 * @return int
		*/
		public static function CountByGrowthGroupLocationId($intGrowthGroupLocationId) {
			// Call GrowthGroup::QueryCount to perform the CountByGrowthGroupLocationId query
			return GrowthGroup::QueryCount(
				QQ::Equal(QQN::GrowthGroup()->GrowthGroupLocationId, $intGrowthGroupLocationId)
			);
		}
			
		/**
		 * Load an array of GrowthGroup objects,
		 * by GrowthGroupDayTypeId Index(es)
		 * @param integer $intGrowthGroupDayTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GrowthGroup[]
		*/
		public static function LoadArrayByGrowthGroupDayTypeId($intGrowthGroupDayTypeId, $objOptionalClauses = null) {
			// Call GrowthGroup::QueryArray to perform the LoadArrayByGrowthGroupDayTypeId query
			try {
				return GrowthGroup::QueryArray(
					QQ::Equal(QQN::GrowthGroup()->GrowthGroupDayTypeId, $intGrowthGroupDayTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GrowthGroups
		 * by GrowthGroupDayTypeId Index(es)
		 * @param integer $intGrowthGroupDayTypeId
		 * @return int
		*/
		public static function CountByGrowthGroupDayTypeId($intGrowthGroupDayTypeId) {
			// Call GrowthGroup::QueryCount to perform the CountByGrowthGroupDayTypeId query
			return GrowthGroup::QueryCount(
				QQ::Equal(QQN::GrowthGroup()->GrowthGroupDayTypeId, $intGrowthGroupDayTypeId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of GrowthGroupStructure objects for a given GrowthGroupStructure
		 * via the growthgroupstructure_growthgroup_assn table
		 * @param integer $intGrowthGroupStructureId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GrowthGroup[]
		*/
		public static function LoadArrayByGrowthGroupStructure($intGrowthGroupStructureId, $objOptionalClauses = null) {
			// Call GrowthGroup::QueryArray to perform the LoadArrayByGrowthGroupStructure query
			try {
				return GrowthGroup::QueryArray(
					QQ::Equal(QQN::GrowthGroup()->GrowthGroupStructure->GrowthGroupStructureId, $intGrowthGroupStructureId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GrowthGroups for a given GrowthGroupStructure
		 * via the growthgroupstructure_growthgroup_assn table
		 * @param integer $intGrowthGroupStructureId
		 * @return int
		*/
		public static function CountByGrowthGroupStructure($intGrowthGroupStructureId) {
			return GrowthGroup::QueryCount(
				QQ::Equal(QQN::GrowthGroup()->GrowthGroupStructure->GrowthGroupStructureId, $intGrowthGroupStructureId)
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
				INSERT INTO `growth_group` (
					`group_id`,
					`growth_group_location_id`,
					`growth_group_day_type_id`,
					`meeting_bitmap`,
					`start_time`,
					`end_time`,
					`address_1`,
					`address_2`,
					`cross_street_1`,
					`cross_street_2`,
					`zip_code`,
					`longitude`,
					`latitude`,
					`accuracy`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intGroupId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intGrowthGroupLocationId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intGrowthGroupDayTypeId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intMeetingBitmap) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intStartTime) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intEndTime) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strAddress1) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strAddress2) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strCrossStreet1) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strCrossStreet2) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strZipCode) . ',
					' . QApplication::$Database[2]->SqlVariable($this->fltLongitude) . ',
					' . QApplication::$Database[2]->SqlVariable($this->fltLatitude) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intAccuracy) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intGroupId
		 * @return GrowthGroup[]
		 */
		public static function GetJournalForId($intGroupId) {
			$objResult = QApplication::$Database[2]->Query('SELECT * FROM growth_group WHERE group_id = ' .
				QApplication::$Database[2]->SqlVariable($intGroupId) . ' ORDER BY __sys_date');

			return GrowthGroup::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return GrowthGroup[]
		 */
		public function GetJournal() {
			return GrowthGroup::GetJournalForId($this->intGroupId);
		}

		/**
		 * Save this GrowthGroup
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GrowthGroup::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `growth_group` (
							`group_id`,
							`growth_group_location_id`,
							`growth_group_day_type_id`,
							`meeting_bitmap`,
							`start_time`,
							`end_time`,
							`address_1`,
							`address_2`,
							`cross_street_1`,
							`cross_street_2`,
							`zip_code`,
							`longitude`,
							`latitude`,
							`accuracy`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intGroupId) . ',
							' . $objDatabase->SqlVariable($this->intGrowthGroupLocationId) . ',
							' . $objDatabase->SqlVariable($this->intGrowthGroupDayTypeId) . ',
							' . $objDatabase->SqlVariable($this->intMeetingBitmap) . ',
							' . $objDatabase->SqlVariable($this->intStartTime) . ',
							' . $objDatabase->SqlVariable($this->intEndTime) . ',
							' . $objDatabase->SqlVariable($this->strAddress1) . ',
							' . $objDatabase->SqlVariable($this->strAddress2) . ',
							' . $objDatabase->SqlVariable($this->strCrossStreet1) . ',
							' . $objDatabase->SqlVariable($this->strCrossStreet2) . ',
							' . $objDatabase->SqlVariable($this->strZipCode) . ',
							' . $objDatabase->SqlVariable($this->fltLongitude) . ',
							' . $objDatabase->SqlVariable($this->fltLatitude) . ',
							' . $objDatabase->SqlVariable($this->intAccuracy) . '
						)
					');



					// Journaling
					$this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`growth_group`
						SET
							`group_id` = ' . $objDatabase->SqlVariable($this->intGroupId) . ',
							`growth_group_location_id` = ' . $objDatabase->SqlVariable($this->intGrowthGroupLocationId) . ',
							`growth_group_day_type_id` = ' . $objDatabase->SqlVariable($this->intGrowthGroupDayTypeId) . ',
							`meeting_bitmap` = ' . $objDatabase->SqlVariable($this->intMeetingBitmap) . ',
							`start_time` = ' . $objDatabase->SqlVariable($this->intStartTime) . ',
							`end_time` = ' . $objDatabase->SqlVariable($this->intEndTime) . ',
							`address_1` = ' . $objDatabase->SqlVariable($this->strAddress1) . ',
							`address_2` = ' . $objDatabase->SqlVariable($this->strAddress2) . ',
							`cross_street_1` = ' . $objDatabase->SqlVariable($this->strCrossStreet1) . ',
							`cross_street_2` = ' . $objDatabase->SqlVariable($this->strCrossStreet2) . ',
							`zip_code` = ' . $objDatabase->SqlVariable($this->strZipCode) . ',
							`longitude` = ' . $objDatabase->SqlVariable($this->fltLongitude) . ',
							`latitude` = ' . $objDatabase->SqlVariable($this->fltLatitude) . ',
							`accuracy` = ' . $objDatabase->SqlVariable($this->intAccuracy) . '
						WHERE
							`group_id` = ' . $objDatabase->SqlVariable($this->__intGroupId) . '
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
			$this->__intGroupId = $this->intGroupId;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this GrowthGroup
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intGroupId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GrowthGroup with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroup::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growth_group`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intGroupId) . '');

			// Journaling
			$this->Journal('DELETE');
		}

		/**
		 * Delete all GrowthGroups
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GrowthGroup::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growth_group`');
		}

		/**
		 * Truncate growth_group table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GrowthGroup::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `growth_group`');
		}

		/**
		 * Reload this GrowthGroup from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GrowthGroup object.');

			// Reload the Object
			$objReloaded = GrowthGroup::Load($this->intGroupId);

			// Update $this's local variables to match
			$this->GroupId = $objReloaded->GroupId;
			$this->__intGroupId = $this->intGroupId;
			$this->GrowthGroupLocationId = $objReloaded->GrowthGroupLocationId;
			$this->GrowthGroupDayTypeId = $objReloaded->GrowthGroupDayTypeId;
			$this->intMeetingBitmap = $objReloaded->intMeetingBitmap;
			$this->intStartTime = $objReloaded->intStartTime;
			$this->intEndTime = $objReloaded->intEndTime;
			$this->strAddress1 = $objReloaded->strAddress1;
			$this->strAddress2 = $objReloaded->strAddress2;
			$this->strCrossStreet1 = $objReloaded->strCrossStreet1;
			$this->strCrossStreet2 = $objReloaded->strCrossStreet2;
			$this->strZipCode = $objReloaded->strZipCode;
			$this->fltLongitude = $objReloaded->fltLongitude;
			$this->fltLatitude = $objReloaded->fltLatitude;
			$this->intAccuracy = $objReloaded->intAccuracy;
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
				case 'GroupId':
					// Gets the value for intGroupId (PK)
					// @return integer
					return $this->intGroupId;

				case 'GrowthGroupLocationId':
					// Gets the value for intGrowthGroupLocationId (Not Null)
					// @return integer
					return $this->intGrowthGroupLocationId;

				case 'GrowthGroupDayTypeId':
					// Gets the value for intGrowthGroupDayTypeId 
					// @return integer
					return $this->intGrowthGroupDayTypeId;

				case 'MeetingBitmap':
					// Gets the value for intMeetingBitmap 
					// @return integer
					return $this->intMeetingBitmap;

				case 'StartTime':
					// Gets the value for intStartTime 
					// @return integer
					return $this->intStartTime;

				case 'EndTime':
					// Gets the value for intEndTime 
					// @return integer
					return $this->intEndTime;

				case 'Address1':
					// Gets the value for strAddress1 
					// @return string
					return $this->strAddress1;

				case 'Address2':
					// Gets the value for strAddress2 
					// @return string
					return $this->strAddress2;

				case 'CrossStreet1':
					// Gets the value for strCrossStreet1 
					// @return string
					return $this->strCrossStreet1;

				case 'CrossStreet2':
					// Gets the value for strCrossStreet2 
					// @return string
					return $this->strCrossStreet2;

				case 'ZipCode':
					// Gets the value for strZipCode 
					// @return string
					return $this->strZipCode;

				case 'Longitude':
					// Gets the value for fltLongitude 
					// @return double
					return $this->fltLongitude;

				case 'Latitude':
					// Gets the value for fltLatitude 
					// @return double
					return $this->fltLatitude;

				case 'Accuracy':
					// Gets the value for intAccuracy 
					// @return integer
					return $this->intAccuracy;


				///////////////////
				// Member Objects
				///////////////////
				case 'Group':
					// Gets the value for the Group object referenced by intGroupId (PK)
					// @return Group
					try {
						if ((!$this->objGroup) && (!is_null($this->intGroupId)))
							$this->objGroup = Group::Load($this->intGroupId);
						return $this->objGroup;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GrowthGroupLocation':
					// Gets the value for the GrowthGroupLocation object referenced by intGrowthGroupLocationId (Not Null)
					// @return GrowthGroupLocation
					try {
						if ((!$this->objGrowthGroupLocation) && (!is_null($this->intGrowthGroupLocationId)))
							$this->objGrowthGroupLocation = GrowthGroupLocation::Load($this->intGrowthGroupLocationId);
						return $this->objGrowthGroupLocation;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_GrowthGroupStructure':
					// Gets the value for the private _objGrowthGroupStructure (Read-Only)
					// if set due to an expansion on the growthgroupstructure_growthgroup_assn association table
					// @return GrowthGroupStructure
					return $this->_objGrowthGroupStructure;

				case '_GrowthGroupStructureArray':
					// Gets the value for the private _objGrowthGroupStructureArray (Read-Only)
					// if set due to an ExpandAsArray on the growthgroupstructure_growthgroup_assn association table
					// @return GrowthGroupStructure[]
					return (array) $this->_objGrowthGroupStructureArray;


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
				case 'GroupId':
					// Sets the value for intGroupId (PK)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objGroup = null;
						return ($this->intGroupId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GrowthGroupLocationId':
					// Sets the value for intGrowthGroupLocationId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objGrowthGroupLocation = null;
						return ($this->intGrowthGroupLocationId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GrowthGroupDayTypeId':
					// Sets the value for intGrowthGroupDayTypeId 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intGrowthGroupDayTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MeetingBitmap':
					// Sets the value for intMeetingBitmap 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intMeetingBitmap = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StartTime':
					// Sets the value for intStartTime 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intStartTime = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EndTime':
					// Sets the value for intEndTime 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intEndTime = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Address1':
					// Sets the value for strAddress1 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAddress1 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Address2':
					// Sets the value for strAddress2 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAddress2 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CrossStreet1':
					// Sets the value for strCrossStreet1 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCrossStreet1 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CrossStreet2':
					// Sets the value for strCrossStreet2 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCrossStreet2 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ZipCode':
					// Sets the value for strZipCode 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strZipCode = QType::Cast($mixValue, QType::String));
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

				case 'Accuracy':
					// Sets the value for intAccuracy 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intAccuracy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Group':
					// Sets the value for the Group object referenced by intGroupId (PK)
					// @param Group $mixValue
					// @return Group
					if (is_null($mixValue)) {
						$this->intGroupId = null;
						$this->objGroup = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Group object
						try {
							$mixValue = QType::Cast($mixValue, 'Group');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Group object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Group for this GrowthGroup');

						// Update Local Member Variables
						$this->objGroup = $mixValue;
						$this->intGroupId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GrowthGroupLocation':
					// Sets the value for the GrowthGroupLocation object referenced by intGrowthGroupLocationId (Not Null)
					// @param GrowthGroupLocation $mixValue
					// @return GrowthGroupLocation
					if (is_null($mixValue)) {
						$this->intGrowthGroupLocationId = null;
						$this->objGrowthGroupLocation = null;
						return null;
					} else {
						// Make sure $mixValue actually is a GrowthGroupLocation object
						try {
							$mixValue = QType::Cast($mixValue, 'GrowthGroupLocation');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED GrowthGroupLocation object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved GrowthGroupLocation for this GrowthGroup');

						// Update Local Member Variables
						$this->objGrowthGroupLocation = $mixValue;
						$this->intGrowthGroupLocationId = $mixValue->Id;

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

			
		// Related Many-to-Many Objects' Methods for GrowthGroupStructure
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated GrowthGroupStructures as an array of GrowthGroupStructure objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GrowthGroupStructure[]
		*/ 
		public function GetGrowthGroupStructureArray($objOptionalClauses = null) {
			if ((is_null($this->intGroupId)))
				return array();

			try {
				return GrowthGroupStructure::LoadArrayByGrowthGroup($this->intGroupId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated GrowthGroupStructures
		 * @return int
		*/ 
		public function CountGrowthGroupStructures() {
			if ((is_null($this->intGroupId)))
				return 0;

			return GrowthGroupStructure::CountByGrowthGroup($this->intGroupId);
		}

		/**
		 * Checks to see if an association exists with a specific GrowthGroupStructure
		 * @param GrowthGroupStructure $objGrowthGroupStructure
		 * @return bool
		*/
		public function IsGrowthGroupStructureAssociated(GrowthGroupStructure $objGrowthGroupStructure) {
			if ((is_null($this->intGroupId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGrowthGroupStructureAssociated on this unsaved GrowthGroup.');
			if ((is_null($objGrowthGroupStructure->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGrowthGroupStructureAssociated on this GrowthGroup with an unsaved GrowthGroupStructure.');

			$intRowCount = GrowthGroup::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GrowthGroup()->GroupId, $this->intGroupId),
					QQ::Equal(QQN::GrowthGroup()->GrowthGroupStructure->GrowthGroupStructureId, $objGrowthGroupStructure->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the GrowthGroupStructure relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalGrowthGroupStructureAssociation($intAssociatedId, $strJournalCommand) {
			QApplication::$Database[2]->NonQuery('
				INSERT INTO `growthgroupstructure_growthgroup_assn` (
					`growth_group_id`,
					`growth_group_structure_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intGroupId) . ',
					' . QApplication::$Database[2]->SqlVariable($intAssociatedId) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object's GrowthGroupStructure relationship from the log database.
		 * @param integer intGroupId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalGrowthGroupStructureAssociationForId($intGroupId) {
			return QApplication::$Database[2]->Query('SELECT * FROM growthgroupstructure_growthgroup_assn WHERE growth_group_id = ' .
				QApplication::$Database[2]->SqlVariable($intGroupId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's GrowthGroupStructure relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalGrowthGroupStructureAssociation() {
			return GrowthGroup::GetJournalGrowthGroupStructureAssociationForId($this->intGroupId);
		}

		/**
		 * Associates a GrowthGroupStructure
		 * @param GrowthGroupStructure $objGrowthGroupStructure
		 * @return void
		*/ 
		public function AssociateGrowthGroupStructure(GrowthGroupStructure $objGrowthGroupStructure) {
			if ((is_null($this->intGroupId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGrowthGroupStructure on this unsaved GrowthGroup.');
			if ((is_null($objGrowthGroupStructure->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGrowthGroupStructure on this GrowthGroup with an unsaved GrowthGroupStructure.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroup::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `growthgroupstructure_growthgroup_assn` (
					`growth_group_id`,
					`growth_group_structure_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intGroupId) . ',
					' . $objDatabase->SqlVariable($objGrowthGroupStructure->Id) . '
				)
			');

			// Journaling
			$this->JournalGrowthGroupStructureAssociation($objGrowthGroupStructure->Id, 'INSERT');
		}

		/**
		 * Unassociates a GrowthGroupStructure
		 * @param GrowthGroupStructure $objGrowthGroupStructure
		 * @return void
		*/ 
		public function UnassociateGrowthGroupStructure(GrowthGroupStructure $objGrowthGroupStructure) {
			if ((is_null($this->intGroupId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroupStructure on this unsaved GrowthGroup.');
			if ((is_null($objGrowthGroupStructure->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGrowthGroupStructure on this GrowthGroup with an unsaved GrowthGroupStructure.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroup::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growthgroupstructure_growthgroup_assn`
				WHERE
					`growth_group_id` = ' . $objDatabase->SqlVariable($this->intGroupId) . ' AND
					`growth_group_structure_id` = ' . $objDatabase->SqlVariable($objGrowthGroupStructure->Id) . '
			');

			// Journaling
			$this->JournalGrowthGroupStructureAssociation($objGrowthGroupStructure->Id, 'DELETE');
		}

		/**
		 * Unassociates all GrowthGroupStructures
		 * @return void
		*/ 
		public function UnassociateAllGrowthGroupStructures() {
			if ((is_null($this->intGroupId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllGrowthGroupStructureArray on this unsaved GrowthGroup.');

			// Get the Database Object for this Class
			$objDatabase = GrowthGroup::GetDatabase();


			// Journaling
			$objResult = $objDatabase->Query('SELECT `growth_group_structure_id` AS associated_id FROM `growthgroupstructure_growthgroup_assn` WHERE `growth_group_id` = ' . $objDatabase->SqlVariable($this->intGroupId));
			while ($objRow = $objResult->GetNextRow()) {
				$this->JournalGrowthGroupStructureAssociation($objRow->GetColumn('associated_id'), 'DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`growthgroupstructure_growthgroup_assn`
				WHERE
					`growth_group_id` = ' . $objDatabase->SqlVariable($this->intGroupId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="GrowthGroup"><sequence>';
			$strToReturn .= '<element name="Group" type="xsd1:Group"/>';
			$strToReturn .= '<element name="GrowthGroupLocation" type="xsd1:GrowthGroupLocation"/>';
			$strToReturn .= '<element name="GrowthGroupDayTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="MeetingBitmap" type="xsd:int"/>';
			$strToReturn .= '<element name="StartTime" type="xsd:int"/>';
			$strToReturn .= '<element name="EndTime" type="xsd:int"/>';
			$strToReturn .= '<element name="Address1" type="xsd:string"/>';
			$strToReturn .= '<element name="Address2" type="xsd:string"/>';
			$strToReturn .= '<element name="CrossStreet1" type="xsd:string"/>';
			$strToReturn .= '<element name="CrossStreet2" type="xsd:string"/>';
			$strToReturn .= '<element name="ZipCode" type="xsd:string"/>';
			$strToReturn .= '<element name="Longitude" type="xsd:float"/>';
			$strToReturn .= '<element name="Latitude" type="xsd:float"/>';
			$strToReturn .= '<element name="Accuracy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GrowthGroup', $strComplexTypeArray)) {
				$strComplexTypeArray['GrowthGroup'] = GrowthGroup::GetSoapComplexTypeXml();
				Group::AlterSoapComplexTypeArray($strComplexTypeArray);
				GrowthGroupLocation::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GrowthGroup::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GrowthGroup();
			if ((property_exists($objSoapObject, 'Group')) &&
				($objSoapObject->Group))
				$objToReturn->Group = Group::GetObjectFromSoapObject($objSoapObject->Group);
			if ((property_exists($objSoapObject, 'GrowthGroupLocation')) &&
				($objSoapObject->GrowthGroupLocation))
				$objToReturn->GrowthGroupLocation = GrowthGroupLocation::GetObjectFromSoapObject($objSoapObject->GrowthGroupLocation);
			if (property_exists($objSoapObject, 'GrowthGroupDayTypeId'))
				$objToReturn->intGrowthGroupDayTypeId = $objSoapObject->GrowthGroupDayTypeId;
			if (property_exists($objSoapObject, 'MeetingBitmap'))
				$objToReturn->intMeetingBitmap = $objSoapObject->MeetingBitmap;
			if (property_exists($objSoapObject, 'StartTime'))
				$objToReturn->intStartTime = $objSoapObject->StartTime;
			if (property_exists($objSoapObject, 'EndTime'))
				$objToReturn->intEndTime = $objSoapObject->EndTime;
			if (property_exists($objSoapObject, 'Address1'))
				$objToReturn->strAddress1 = $objSoapObject->Address1;
			if (property_exists($objSoapObject, 'Address2'))
				$objToReturn->strAddress2 = $objSoapObject->Address2;
			if (property_exists($objSoapObject, 'CrossStreet1'))
				$objToReturn->strCrossStreet1 = $objSoapObject->CrossStreet1;
			if (property_exists($objSoapObject, 'CrossStreet2'))
				$objToReturn->strCrossStreet2 = $objSoapObject->CrossStreet2;
			if (property_exists($objSoapObject, 'ZipCode'))
				$objToReturn->strZipCode = $objSoapObject->ZipCode;
			if (property_exists($objSoapObject, 'Longitude'))
				$objToReturn->fltLongitude = $objSoapObject->Longitude;
			if (property_exists($objSoapObject, 'Latitude'))
				$objToReturn->fltLatitude = $objSoapObject->Latitude;
			if (property_exists($objSoapObject, 'Accuracy'))
				$objToReturn->intAccuracy = $objSoapObject->Accuracy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, GrowthGroup::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objGroup)
				$objObject->objGroup = Group::GetSoapObjectFromObject($objObject->objGroup, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGroupId = null;
			if ($objObject->objGrowthGroupLocation)
				$objObject->objGrowthGroupLocation = GrowthGroupLocation::GetSoapObjectFromObject($objObject->objGrowthGroupLocation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGrowthGroupLocationId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodeGrowthGroupGrowthGroupStructure extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'growthgroupstructure';

		protected $strTableName = 'growthgroupstructure_growthgroup_assn';
		protected $strPrimaryKey = 'growth_group_id';
		protected $strClassName = 'GrowthGroupStructure';

		public function __get($strName) {
			switch ($strName) {
				case 'GrowthGroupStructureId':
					return new QQNode('growth_group_structure_id', 'GrowthGroupStructureId', 'integer', $this);
				case 'GrowthGroupStructure':
					return new QQNodeGrowthGroupStructure('growth_group_structure_id', 'GrowthGroupStructureId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeGrowthGroupStructure('growth_group_structure_id', 'GrowthGroupStructureId', 'integer', $this);
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

	class QQNodeGrowthGroup extends QQNode {
		protected $strTableName = 'growth_group';
		protected $strPrimaryKey = 'group_id';
		protected $strClassName = 'GrowthGroup';
		public function __get($strName) {
			switch ($strName) {
				case 'GroupId':
					return new QQNode('group_id', 'GroupId', 'integer', $this);
				case 'Group':
					return new QQNodeGroup('group_id', 'Group', 'integer', $this);
				case 'GrowthGroupLocationId':
					return new QQNode('growth_group_location_id', 'GrowthGroupLocationId', 'integer', $this);
				case 'GrowthGroupLocation':
					return new QQNodeGrowthGroupLocation('growth_group_location_id', 'GrowthGroupLocation', 'integer', $this);
				case 'GrowthGroupDayTypeId':
					return new QQNode('growth_group_day_type_id', 'GrowthGroupDayTypeId', 'integer', $this);
				case 'MeetingBitmap':
					return new QQNode('meeting_bitmap', 'MeetingBitmap', 'integer', $this);
				case 'StartTime':
					return new QQNode('start_time', 'StartTime', 'integer', $this);
				case 'EndTime':
					return new QQNode('end_time', 'EndTime', 'integer', $this);
				case 'Address1':
					return new QQNode('address_1', 'Address1', 'string', $this);
				case 'Address2':
					return new QQNode('address_2', 'Address2', 'string', $this);
				case 'CrossStreet1':
					return new QQNode('cross_street_1', 'CrossStreet1', 'string', $this);
				case 'CrossStreet2':
					return new QQNode('cross_street_2', 'CrossStreet2', 'string', $this);
				case 'ZipCode':
					return new QQNode('zip_code', 'ZipCode', 'string', $this);
				case 'Longitude':
					return new QQNode('longitude', 'Longitude', 'double', $this);
				case 'Latitude':
					return new QQNode('latitude', 'Latitude', 'double', $this);
				case 'Accuracy':
					return new QQNode('accuracy', 'Accuracy', 'integer', $this);
				case 'GrowthGroupStructure':
					return new QQNodeGrowthGroupGrowthGroupStructure($this);

				case '_PrimaryKeyNode':
					return new QQNodeGroup('group_id', 'GroupId', 'integer', $this);
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

	class QQReverseReferenceNodeGrowthGroup extends QQReverseReferenceNode {
		protected $strTableName = 'growth_group';
		protected $strPrimaryKey = 'group_id';
		protected $strClassName = 'GrowthGroup';
		public function __get($strName) {
			switch ($strName) {
				case 'GroupId':
					return new QQNode('group_id', 'GroupId', 'integer', $this);
				case 'Group':
					return new QQNodeGroup('group_id', 'Group', 'integer', $this);
				case 'GrowthGroupLocationId':
					return new QQNode('growth_group_location_id', 'GrowthGroupLocationId', 'integer', $this);
				case 'GrowthGroupLocation':
					return new QQNodeGrowthGroupLocation('growth_group_location_id', 'GrowthGroupLocation', 'integer', $this);
				case 'GrowthGroupDayTypeId':
					return new QQNode('growth_group_day_type_id', 'GrowthGroupDayTypeId', 'integer', $this);
				case 'MeetingBitmap':
					return new QQNode('meeting_bitmap', 'MeetingBitmap', 'integer', $this);
				case 'StartTime':
					return new QQNode('start_time', 'StartTime', 'integer', $this);
				case 'EndTime':
					return new QQNode('end_time', 'EndTime', 'integer', $this);
				case 'Address1':
					return new QQNode('address_1', 'Address1', 'string', $this);
				case 'Address2':
					return new QQNode('address_2', 'Address2', 'string', $this);
				case 'CrossStreet1':
					return new QQNode('cross_street_1', 'CrossStreet1', 'string', $this);
				case 'CrossStreet2':
					return new QQNode('cross_street_2', 'CrossStreet2', 'string', $this);
				case 'ZipCode':
					return new QQNode('zip_code', 'ZipCode', 'string', $this);
				case 'Longitude':
					return new QQNode('longitude', 'Longitude', 'double', $this);
				case 'Latitude':
					return new QQNode('latitude', 'Latitude', 'double', $this);
				case 'Accuracy':
					return new QQNode('accuracy', 'Accuracy', 'integer', $this);
				case 'GrowthGroupStructure':
					return new QQNodeGrowthGroupGrowthGroupStructure($this);

				case '_PrimaryKeyNode':
					return new QQNodeGroup('group_id', 'GroupId', 'integer', $this);
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