<?php
	/**
	 * The abstract ClassAttendenceGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ClassAttendence subclass which
	 * extends this ClassAttendenceGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ClassAttendence class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $ClassRegistrationId the value for intClassRegistrationId (Not Null)
	 * @property integer $MeetingNumber the value for intMeetingNumber (Not Null)
	 * @property boolean $PresentFlag the value for blnPresentFlag 
	 * @property ClassRegistration $ClassRegistration the value for the ClassRegistration object referenced by intClassRegistrationId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ClassAttendenceGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column class_attendence.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column class_attendence.class_registration_id
		 * @var integer intClassRegistrationId
		 */
		protected $intClassRegistrationId;
		const ClassRegistrationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column class_attendence.meeting_number
		 * @var integer intMeetingNumber
		 */
		protected $intMeetingNumber;
		const MeetingNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column class_attendence.present_flag
		 * @var boolean blnPresentFlag
		 */
		protected $blnPresentFlag;
		const PresentFlagDefault = null;


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
		 * in the database column class_attendence.class_registration_id.
		 *
		 * NOTE: Always use the ClassRegistration property getter to correctly retrieve this ClassRegistration object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClassRegistration objClassRegistration
		 */
		protected $objClassRegistration;





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
		 * Load a ClassAttendence from PK Info
		 * @param integer $intId
		 * @return ClassAttendence
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return ClassAttendence::QuerySingle(
				QQ::Equal(QQN::ClassAttendence()->Id, $intId)
			);
		}

		/**
		 * Load all ClassAttendences
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassAttendence[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ClassAttendence::QueryArray to perform the LoadAll query
			try {
				return ClassAttendence::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ClassAttendences
		 * @return int
		 */
		public static function CountAll() {
			// Call ClassAttendence::QueryCount to perform the CountAll query
			return ClassAttendence::QueryCount(QQ::All());
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
			$objDatabase = ClassAttendence::GetDatabase();

			// Create/Build out the QueryBuilder object with ClassAttendence-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'class_attendence');
			ClassAttendence::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('class_attendence');

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
		 * Static Qcodo Query method to query for a single ClassAttendence object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClassAttendence the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassAttendence::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ClassAttendence object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ClassAttendence::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ClassAttendence::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ClassAttendence objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClassAttendence[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassAttendence::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ClassAttendence::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ClassAttendence::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ClassAttendence objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassAttendence::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ClassAttendence::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'class_attendence_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ClassAttendence-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ClassAttendence::GetSelectFields($objQueryBuilder);
				ClassAttendence::GetFromFields($objQueryBuilder);

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
			return ClassAttendence::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ClassAttendence
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'class_attendence';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'class_registration_id', $strAliasPrefix . 'class_registration_id');
			$objBuilder->AddSelectItem($strTableName, 'meeting_number', $strAliasPrefix . 'meeting_number');
			$objBuilder->AddSelectItem($strTableName, 'present_flag', $strAliasPrefix . 'present_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ClassAttendence from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ClassAttendence::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ClassAttendence
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the ClassAttendence object
			$objToReturn = new ClassAttendence();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'class_registration_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'class_registration_id'] : $strAliasPrefix . 'class_registration_id';
			$objToReturn->intClassRegistrationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'meeting_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'meeting_number'] : $strAliasPrefix . 'meeting_number';
			$objToReturn->intMeetingNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'present_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'present_flag'] : $strAliasPrefix . 'present_flag';
			$objToReturn->blnPresentFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'class_attendence__';

			// Check for ClassRegistration Early Binding
			$strAlias = $strAliasPrefix . 'class_registration_id__signup_entry_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objClassRegistration = ClassRegistration::InstantiateDbRow($objDbRow, $strAliasPrefix . 'class_registration_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of ClassAttendences from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ClassAttendence[]
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
					$objItem = ClassAttendence::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ClassAttendence::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ClassAttendence object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ClassAttendence next row resulting from the query
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
			return ClassAttendence::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ClassAttendence object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return ClassAttendence
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ClassAttendence::QuerySingle(
				QQ::Equal(QQN::ClassAttendence()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single ClassAttendence object,
		 * by ClassRegistrationId, MeetingNumber Index(es)
		 * @param integer $intClassRegistrationId
		 * @param integer $intMeetingNumber
		 * @return ClassAttendence
		*/
		public static function LoadByClassRegistrationIdMeetingNumber($intClassRegistrationId, $intMeetingNumber, $objOptionalClauses = null) {
			return ClassAttendence::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::ClassAttendence()->ClassRegistrationId, $intClassRegistrationId),
				QQ::Equal(QQN::ClassAttendence()->MeetingNumber, $intMeetingNumber)
				)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ClassAttendence objects,
		 * by ClassRegistrationId Index(es)
		 * @param integer $intClassRegistrationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassAttendence[]
		*/
		public static function LoadArrayByClassRegistrationId($intClassRegistrationId, $objOptionalClauses = null) {
			// Call ClassAttendence::QueryArray to perform the LoadArrayByClassRegistrationId query
			try {
				return ClassAttendence::QueryArray(
					QQ::Equal(QQN::ClassAttendence()->ClassRegistrationId, $intClassRegistrationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClassAttendences
		 * by ClassRegistrationId Index(es)
		 * @param integer $intClassRegistrationId
		 * @return int
		*/
		public static function CountByClassRegistrationId($intClassRegistrationId, $objOptionalClauses = null) {
			// Call ClassAttendence::QueryCount to perform the CountByClassRegistrationId query
			return ClassAttendence::QueryCount(
				QQ::Equal(QQN::ClassAttendence()->ClassRegistrationId, $intClassRegistrationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ClassAttendence objects,
		 * by MeetingNumber Index(es)
		 * @param integer $intMeetingNumber
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassAttendence[]
		*/
		public static function LoadArrayByMeetingNumber($intMeetingNumber, $objOptionalClauses = null) {
			// Call ClassAttendence::QueryArray to perform the LoadArrayByMeetingNumber query
			try {
				return ClassAttendence::QueryArray(
					QQ::Equal(QQN::ClassAttendence()->MeetingNumber, $intMeetingNumber),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClassAttendences
		 * by MeetingNumber Index(es)
		 * @param integer $intMeetingNumber
		 * @return int
		*/
		public static function CountByMeetingNumber($intMeetingNumber, $objOptionalClauses = null) {
			// Call ClassAttendence::QueryCount to perform the CountByMeetingNumber query
			return ClassAttendence::QueryCount(
				QQ::Equal(QQN::ClassAttendence()->MeetingNumber, $intMeetingNumber)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this ClassAttendence
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ClassAttendence::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `class_attendence` (
							`class_registration_id`,
							`meeting_number`,
							`present_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intClassRegistrationId) . ',
							' . $objDatabase->SqlVariable($this->intMeetingNumber) . ',
							' . $objDatabase->SqlVariable($this->blnPresentFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('class_attendence', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`class_attendence`
						SET
							`class_registration_id` = ' . $objDatabase->SqlVariable($this->intClassRegistrationId) . ',
							`meeting_number` = ' . $objDatabase->SqlVariable($this->intMeetingNumber) . ',
							`present_flag` = ' . $objDatabase->SqlVariable($this->blnPresentFlag) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
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
		 * Delete this ClassAttendence
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ClassAttendence with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ClassAttendence::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`class_attendence`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ClassAttendences
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ClassAttendence::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`class_attendence`');
		}

		/**
		 * Truncate class_attendence table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ClassAttendence::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `class_attendence`');
		}

		/**
		 * Reload this ClassAttendence from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ClassAttendence object.');

			// Reload the Object
			$objReloaded = ClassAttendence::Load($this->intId);

			// Update $this's local variables to match
			$this->ClassRegistrationId = $objReloaded->ClassRegistrationId;
			$this->intMeetingNumber = $objReloaded->intMeetingNumber;
			$this->blnPresentFlag = $objReloaded->blnPresentFlag;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ClassAttendence::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `class_attendence` (
					`id`,
					`class_registration_id`,
					`meeting_number`,
					`present_flag`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intClassRegistrationId) . ',
					' . $objDatabase->SqlVariable($this->intMeetingNumber) . ',
					' . $objDatabase->SqlVariable($this->blnPresentFlag) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intId
		 * @return ClassAttendence[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = ClassAttendence::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM class_attendence WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return ClassAttendence::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ClassAttendence[]
		 */
		public function GetJournal() {
			return ClassAttendence::GetJournalForId($this->intId);
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

				case 'ClassRegistrationId':
					// Gets the value for intClassRegistrationId (Not Null)
					// @return integer
					return $this->intClassRegistrationId;

				case 'MeetingNumber':
					// Gets the value for intMeetingNumber (Not Null)
					// @return integer
					return $this->intMeetingNumber;

				case 'PresentFlag':
					// Gets the value for blnPresentFlag 
					// @return boolean
					return $this->blnPresentFlag;


				///////////////////
				// Member Objects
				///////////////////
				case 'ClassRegistration':
					// Gets the value for the ClassRegistration object referenced by intClassRegistrationId (Not Null)
					// @return ClassRegistration
					try {
						if ((!$this->objClassRegistration) && (!is_null($this->intClassRegistrationId)))
							$this->objClassRegistration = ClassRegistration::Load($this->intClassRegistrationId);
						return $this->objClassRegistration;
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
				case 'ClassRegistrationId':
					// Sets the value for intClassRegistrationId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objClassRegistration = null;
						return ($this->intClassRegistrationId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MeetingNumber':
					// Sets the value for intMeetingNumber (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intMeetingNumber = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PresentFlag':
					// Sets the value for blnPresentFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnPresentFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ClassRegistration':
					// Sets the value for the ClassRegistration object referenced by intClassRegistrationId (Not Null)
					// @param ClassRegistration $mixValue
					// @return ClassRegistration
					if (is_null($mixValue)) {
						$this->intClassRegistrationId = null;
						$this->objClassRegistration = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClassRegistration object
						try {
							$mixValue = QType::Cast($mixValue, 'ClassRegistration');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ClassRegistration object
						if (is_null($mixValue->SignupEntryId))
							throw new QCallerException('Unable to set an unsaved ClassRegistration for this ClassAttendence');

						// Update Local Member Variables
						$this->objClassRegistration = $mixValue;
						$this->intClassRegistrationId = $mixValue->SignupEntryId;

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
			$strToReturn = '<complexType name="ClassAttendence"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ClassRegistration" type="xsd1:ClassRegistration"/>';
			$strToReturn .= '<element name="MeetingNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="PresentFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ClassAttendence', $strComplexTypeArray)) {
				$strComplexTypeArray['ClassAttendence'] = ClassAttendence::GetSoapComplexTypeXml();
				ClassRegistration::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ClassAttendence::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ClassAttendence();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'ClassRegistration')) &&
				($objSoapObject->ClassRegistration))
				$objToReturn->ClassRegistration = ClassRegistration::GetObjectFromSoapObject($objSoapObject->ClassRegistration);
			if (property_exists($objSoapObject, 'MeetingNumber'))
				$objToReturn->intMeetingNumber = $objSoapObject->MeetingNumber;
			if (property_exists($objSoapObject, 'PresentFlag'))
				$objToReturn->blnPresentFlag = $objSoapObject->PresentFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ClassAttendence::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objClassRegistration)
				$objObject->objClassRegistration = ClassRegistration::GetSoapObjectFromObject($objObject->objClassRegistration, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClassRegistrationId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $ClassRegistrationId
	 * @property-read QQNodeClassRegistration $ClassRegistration
	 * @property-read QQNode $MeetingNumber
	 * @property-read QQNode $PresentFlag
	 */
	class QQNodeClassAttendence extends QQNode {
		protected $strTableName = 'class_attendence';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ClassAttendence';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ClassRegistrationId':
					return new QQNode('class_registration_id', 'ClassRegistrationId', 'integer', $this);
				case 'ClassRegistration':
					return new QQNodeClassRegistration('class_registration_id', 'ClassRegistration', 'integer', $this);
				case 'MeetingNumber':
					return new QQNode('meeting_number', 'MeetingNumber', 'integer', $this);
				case 'PresentFlag':
					return new QQNode('present_flag', 'PresentFlag', 'boolean', $this);

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
	
	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $ClassRegistrationId
	 * @property-read QQNodeClassRegistration $ClassRegistration
	 * @property-read QQNode $MeetingNumber
	 * @property-read QQNode $PresentFlag
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeClassAttendence extends QQReverseReferenceNode {
		protected $strTableName = 'class_attendence';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ClassAttendence';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ClassRegistrationId':
					return new QQNode('class_registration_id', 'ClassRegistrationId', 'integer', $this);
				case 'ClassRegistration':
					return new QQNodeClassRegistration('class_registration_id', 'ClassRegistration', 'integer', $this);
				case 'MeetingNumber':
					return new QQNode('meeting_number', 'MeetingNumber', 'integer', $this);
				case 'PresentFlag':
					return new QQNode('present_flag', 'PresentFlag', 'boolean', $this);

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