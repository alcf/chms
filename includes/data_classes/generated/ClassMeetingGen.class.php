<?php
	/**
	 * The abstract ClassMeetingGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ClassMeeting subclass which
	 * extends this ClassMeetingGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ClassMeeting class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $SignupFormId the value for intSignupFormId (PK)
	 * @property integer $ClassTermId the value for intClassTermId (Not Null)
	 * @property integer $ClassCourseId the value for intClassCourseId (Not Null)
	 * @property integer $ClassInstructorId the value for intClassInstructorId (Not Null)
	 * @property QDateTime $DateStart the value for dttDateStart (Not Null)
	 * @property QDateTime $DateEnd the value for dttDateEnd (Not Null)
	 * @property string $Location the value for strLocation 
	 * @property integer $MeetingDay the value for intMeetingDay 
	 * @property integer $MeetingStartTime the value for intMeetingStartTime 
	 * @property integer $MeetingEndTime the value for intMeetingEndTime 
	 * @property SignupForm $SignupForm the value for the SignupForm object referenced by intSignupFormId (PK)
	 * @property ClassTerm $ClassTerm the value for the ClassTerm object referenced by intClassTermId (Not Null)
	 * @property ClassCourse $ClassCourse the value for the ClassCourse object referenced by intClassCourseId (Not Null)
	 * @property ClassInstructor $ClassInstructor the value for the ClassInstructor object referenced by intClassInstructorId (Not Null)
	 * @property ClassRegistration $_ClassRegistration the value for the private _objClassRegistration (Read-Only) if set due to an expansion on the class_registration.class_meeting_id reverse relationship
	 * @property ClassRegistration[] $_ClassRegistrationArray the value for the private _objClassRegistrationArray (Read-Only) if set due to an ExpandAsArray on the class_registration.class_meeting_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ClassMeetingGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column class_meeting.signup_form_id
		 * @var integer intSignupFormId
		 */
		protected $intSignupFormId;
		const SignupFormIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intSignupFormId;
		 */
		protected $__intSignupFormId;

		/**
		 * Protected member variable that maps to the database column class_meeting.class_term_id
		 * @var integer intClassTermId
		 */
		protected $intClassTermId;
		const ClassTermIdDefault = null;


		/**
		 * Protected member variable that maps to the database column class_meeting.class_course_id
		 * @var integer intClassCourseId
		 */
		protected $intClassCourseId;
		const ClassCourseIdDefault = null;


		/**
		 * Protected member variable that maps to the database column class_meeting.class_instructor_id
		 * @var integer intClassInstructorId
		 */
		protected $intClassInstructorId;
		const ClassInstructorIdDefault = null;


		/**
		 * Protected member variable that maps to the database column class_meeting.date_start
		 * @var QDateTime dttDateStart
		 */
		protected $dttDateStart;
		const DateStartDefault = null;


		/**
		 * Protected member variable that maps to the database column class_meeting.date_end
		 * @var QDateTime dttDateEnd
		 */
		protected $dttDateEnd;
		const DateEndDefault = null;


		/**
		 * Protected member variable that maps to the database column class_meeting.location
		 * @var string strLocation
		 */
		protected $strLocation;
		const LocationMaxLength = 200;
		const LocationDefault = null;


		/**
		 * Protected member variable that maps to the database column class_meeting.meeting_day
		 * @var integer intMeetingDay
		 */
		protected $intMeetingDay;
		const MeetingDayDefault = null;


		/**
		 * Protected member variable that maps to the database column class_meeting.meeting_start_time
		 * @var integer intMeetingStartTime
		 */
		protected $intMeetingStartTime;
		const MeetingStartTimeDefault = null;


		/**
		 * Protected member variable that maps to the database column class_meeting.meeting_end_time
		 * @var integer intMeetingEndTime
		 */
		protected $intMeetingEndTime;
		const MeetingEndTimeDefault = null;


		/**
		 * Private member variable that stores a reference to a single ClassRegistration object
		 * (of type ClassRegistration), if this ClassMeeting object was restored with
		 * an expansion on the class_registration association table.
		 * @var ClassRegistration _objClassRegistration;
		 */
		private $_objClassRegistration;

		/**
		 * Private member variable that stores a reference to an array of ClassRegistration objects
		 * (of type ClassRegistration[]), if this ClassMeeting object was restored with
		 * an ExpandAsArray on the class_registration association table.
		 * @var ClassRegistration[] _objClassRegistrationArray;
		 */
		private $_objClassRegistrationArray = array();

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
		 * in the database column class_meeting.signup_form_id.
		 *
		 * NOTE: Always use the SignupForm property getter to correctly retrieve this SignupForm object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SignupForm objSignupForm
		 */
		protected $objSignupForm;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column class_meeting.class_term_id.
		 *
		 * NOTE: Always use the ClassTerm property getter to correctly retrieve this ClassTerm object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClassTerm objClassTerm
		 */
		protected $objClassTerm;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column class_meeting.class_course_id.
		 *
		 * NOTE: Always use the ClassCourse property getter to correctly retrieve this ClassCourse object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClassCourse objClassCourse
		 */
		protected $objClassCourse;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column class_meeting.class_instructor_id.
		 *
		 * NOTE: Always use the ClassInstructor property getter to correctly retrieve this ClassInstructor object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClassInstructor objClassInstructor
		 */
		protected $objClassInstructor;





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
		 * Load a ClassMeeting from PK Info
		 * @param integer $intSignupFormId
		 * @return ClassMeeting
		 */
		public static function Load($intSignupFormId) {
			// Use QuerySingle to Perform the Query
			return ClassMeeting::QuerySingle(
				QQ::Equal(QQN::ClassMeeting()->SignupFormId, $intSignupFormId)
			);
		}

		/**
		 * Load all ClassMeetings
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassMeeting[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ClassMeeting::QueryArray to perform the LoadAll query
			try {
				return ClassMeeting::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ClassMeetings
		 * @return int
		 */
		public static function CountAll() {
			// Call ClassMeeting::QueryCount to perform the CountAll query
			return ClassMeeting::QueryCount(QQ::All());
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
			$objDatabase = ClassMeeting::GetDatabase();

			// Create/Build out the QueryBuilder object with ClassMeeting-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'class_meeting');
			ClassMeeting::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('class_meeting');

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
		 * Static Qcodo Query method to query for a single ClassMeeting object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClassMeeting the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassMeeting::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ClassMeeting object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ClassMeeting::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ClassMeeting::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ClassMeeting objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClassMeeting[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassMeeting::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ClassMeeting::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ClassMeeting::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ClassMeeting objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassMeeting::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ClassMeeting::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'class_meeting_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ClassMeeting-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ClassMeeting::GetSelectFields($objQueryBuilder);
				ClassMeeting::GetFromFields($objQueryBuilder);

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
			return ClassMeeting::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ClassMeeting
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'class_meeting';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'signup_form_id', $strAliasPrefix . 'signup_form_id');
			$objBuilder->AddSelectItem($strTableName, 'class_term_id', $strAliasPrefix . 'class_term_id');
			$objBuilder->AddSelectItem($strTableName, 'class_course_id', $strAliasPrefix . 'class_course_id');
			$objBuilder->AddSelectItem($strTableName, 'class_instructor_id', $strAliasPrefix . 'class_instructor_id');
			$objBuilder->AddSelectItem($strTableName, 'date_start', $strAliasPrefix . 'date_start');
			$objBuilder->AddSelectItem($strTableName, 'date_end', $strAliasPrefix . 'date_end');
			$objBuilder->AddSelectItem($strTableName, 'location', $strAliasPrefix . 'location');
			$objBuilder->AddSelectItem($strTableName, 'meeting_day', $strAliasPrefix . 'meeting_day');
			$objBuilder->AddSelectItem($strTableName, 'meeting_start_time', $strAliasPrefix . 'meeting_start_time');
			$objBuilder->AddSelectItem($strTableName, 'meeting_end_time', $strAliasPrefix . 'meeting_end_time');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ClassMeeting from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ClassMeeting::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ClassMeeting
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'signup_form_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intSignupFormId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'class_meeting__';


				$strAlias = $strAliasPrefix . 'classregistration__signup_entry_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objClassRegistrationArray)) {
						$objPreviousChildItem = $objPreviousItem->_objClassRegistrationArray[$intPreviousChildItemCount - 1];
						$objChildItem = ClassRegistration::InstantiateDbRow($objDbRow, $strAliasPrefix . 'classregistration__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objClassRegistrationArray[] = $objChildItem;
					} else
						$objPreviousItem->_objClassRegistrationArray[] = ClassRegistration::InstantiateDbRow($objDbRow, $strAliasPrefix . 'classregistration__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'class_meeting__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the ClassMeeting object
			$objToReturn = new ClassMeeting();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'signup_form_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_form_id'] : $strAliasPrefix . 'signup_form_id';
			$objToReturn->intSignupFormId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intSignupFormId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'class_term_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'class_term_id'] : $strAliasPrefix . 'class_term_id';
			$objToReturn->intClassTermId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'class_course_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'class_course_id'] : $strAliasPrefix . 'class_course_id';
			$objToReturn->intClassCourseId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'class_instructor_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'class_instructor_id'] : $strAliasPrefix . 'class_instructor_id';
			$objToReturn->intClassInstructorId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_start', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_start'] : $strAliasPrefix . 'date_start';
			$objToReturn->dttDateStart = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_end', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_end'] : $strAliasPrefix . 'date_end';
			$objToReturn->dttDateEnd = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'location', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'location'] : $strAliasPrefix . 'location';
			$objToReturn->strLocation = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'meeting_day', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'meeting_day'] : $strAliasPrefix . 'meeting_day';
			$objToReturn->intMeetingDay = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'meeting_start_time', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'meeting_start_time'] : $strAliasPrefix . 'meeting_start_time';
			$objToReturn->intMeetingStartTime = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'meeting_end_time', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'meeting_end_time'] : $strAliasPrefix . 'meeting_end_time';
			$objToReturn->intMeetingEndTime = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'class_meeting__';

			// Check for SignupForm Early Binding
			$strAlias = $strAliasPrefix . 'signup_form_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSignupForm = SignupForm::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signup_form_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ClassTerm Early Binding
			$strAlias = $strAliasPrefix . 'class_term_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objClassTerm = ClassTerm::InstantiateDbRow($objDbRow, $strAliasPrefix . 'class_term_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ClassCourse Early Binding
			$strAlias = $strAliasPrefix . 'class_course_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objClassCourse = ClassCourse::InstantiateDbRow($objDbRow, $strAliasPrefix . 'class_course_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ClassInstructor Early Binding
			$strAlias = $strAliasPrefix . 'class_instructor_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objClassInstructor = ClassInstructor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'class_instructor_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for ClassRegistration Virtual Binding
			$strAlias = $strAliasPrefix . 'classregistration__signup_entry_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objClassRegistrationArray[] = ClassRegistration::InstantiateDbRow($objDbRow, $strAliasPrefix . 'classregistration__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objClassRegistration = ClassRegistration::InstantiateDbRow($objDbRow, $strAliasPrefix . 'classregistration__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of ClassMeetings from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ClassMeeting[]
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
					$objItem = ClassMeeting::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ClassMeeting::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ClassMeeting object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ClassMeeting next row resulting from the query
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
			return ClassMeeting::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ClassMeeting object,
		 * by SignupFormId Index(es)
		 * @param integer $intSignupFormId
		 * @return ClassMeeting
		*/
		public static function LoadBySignupFormId($intSignupFormId, $objOptionalClauses = null) {
			return ClassMeeting::QuerySingle(
				QQ::Equal(QQN::ClassMeeting()->SignupFormId, $intSignupFormId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ClassMeeting objects,
		 * by ClassTermId Index(es)
		 * @param integer $intClassTermId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassMeeting[]
		*/
		public static function LoadArrayByClassTermId($intClassTermId, $objOptionalClauses = null) {
			// Call ClassMeeting::QueryArray to perform the LoadArrayByClassTermId query
			try {
				return ClassMeeting::QueryArray(
					QQ::Equal(QQN::ClassMeeting()->ClassTermId, $intClassTermId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClassMeetings
		 * by ClassTermId Index(es)
		 * @param integer $intClassTermId
		 * @return int
		*/
		public static function CountByClassTermId($intClassTermId, $objOptionalClauses = null) {
			// Call ClassMeeting::QueryCount to perform the CountByClassTermId query
			return ClassMeeting::QueryCount(
				QQ::Equal(QQN::ClassMeeting()->ClassTermId, $intClassTermId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ClassMeeting objects,
		 * by ClassCourseId Index(es)
		 * @param integer $intClassCourseId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassMeeting[]
		*/
		public static function LoadArrayByClassCourseId($intClassCourseId, $objOptionalClauses = null) {
			// Call ClassMeeting::QueryArray to perform the LoadArrayByClassCourseId query
			try {
				return ClassMeeting::QueryArray(
					QQ::Equal(QQN::ClassMeeting()->ClassCourseId, $intClassCourseId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClassMeetings
		 * by ClassCourseId Index(es)
		 * @param integer $intClassCourseId
		 * @return int
		*/
		public static function CountByClassCourseId($intClassCourseId, $objOptionalClauses = null) {
			// Call ClassMeeting::QueryCount to perform the CountByClassCourseId query
			return ClassMeeting::QueryCount(
				QQ::Equal(QQN::ClassMeeting()->ClassCourseId, $intClassCourseId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ClassMeeting objects,
		 * by ClassInstructorId Index(es)
		 * @param integer $intClassInstructorId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassMeeting[]
		*/
		public static function LoadArrayByClassInstructorId($intClassInstructorId, $objOptionalClauses = null) {
			// Call ClassMeeting::QueryArray to perform the LoadArrayByClassInstructorId query
			try {
				return ClassMeeting::QueryArray(
					QQ::Equal(QQN::ClassMeeting()->ClassInstructorId, $intClassInstructorId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClassMeetings
		 * by ClassInstructorId Index(es)
		 * @param integer $intClassInstructorId
		 * @return int
		*/
		public static function CountByClassInstructorId($intClassInstructorId, $objOptionalClauses = null) {
			// Call ClassMeeting::QueryCount to perform the CountByClassInstructorId query
			return ClassMeeting::QueryCount(
				QQ::Equal(QQN::ClassMeeting()->ClassInstructorId, $intClassInstructorId)
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
		 * Save this ClassMeeting
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ClassMeeting::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `class_meeting` (
							`signup_form_id`,
							`class_term_id`,
							`class_course_id`,
							`class_instructor_id`,
							`date_start`,
							`date_end`,
							`location`,
							`meeting_day`,
							`meeting_start_time`,
							`meeting_end_time`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
							' . $objDatabase->SqlVariable($this->intClassTermId) . ',
							' . $objDatabase->SqlVariable($this->intClassCourseId) . ',
							' . $objDatabase->SqlVariable($this->intClassInstructorId) . ',
							' . $objDatabase->SqlVariable($this->dttDateStart) . ',
							' . $objDatabase->SqlVariable($this->dttDateEnd) . ',
							' . $objDatabase->SqlVariable($this->strLocation) . ',
							' . $objDatabase->SqlVariable($this->intMeetingDay) . ',
							' . $objDatabase->SqlVariable($this->intMeetingStartTime) . ',
							' . $objDatabase->SqlVariable($this->intMeetingEndTime) . '
						)
					');



					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`class_meeting`
						SET
							`signup_form_id` = ' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
							`class_term_id` = ' . $objDatabase->SqlVariable($this->intClassTermId) . ',
							`class_course_id` = ' . $objDatabase->SqlVariable($this->intClassCourseId) . ',
							`class_instructor_id` = ' . $objDatabase->SqlVariable($this->intClassInstructorId) . ',
							`date_start` = ' . $objDatabase->SqlVariable($this->dttDateStart) . ',
							`date_end` = ' . $objDatabase->SqlVariable($this->dttDateEnd) . ',
							`location` = ' . $objDatabase->SqlVariable($this->strLocation) . ',
							`meeting_day` = ' . $objDatabase->SqlVariable($this->intMeetingDay) . ',
							`meeting_start_time` = ' . $objDatabase->SqlVariable($this->intMeetingStartTime) . ',
							`meeting_end_time` = ' . $objDatabase->SqlVariable($this->intMeetingEndTime) . '
						WHERE
							`signup_form_id` = ' . $objDatabase->SqlVariable($this->__intSignupFormId) . '
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
			$this->__intSignupFormId = $this->intSignupFormId;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this ClassMeeting
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intSignupFormId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ClassMeeting with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ClassMeeting::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`class_meeting`
				WHERE
					`signup_form_id` = ' . $objDatabase->SqlVariable($this->intSignupFormId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ClassMeetings
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ClassMeeting::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`class_meeting`');
		}

		/**
		 * Truncate class_meeting table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ClassMeeting::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `class_meeting`');
		}

		/**
		 * Reload this ClassMeeting from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ClassMeeting object.');

			// Reload the Object
			$objReloaded = ClassMeeting::Load($this->intSignupFormId);

			// Update $this's local variables to match
			$this->SignupFormId = $objReloaded->SignupFormId;
			$this->__intSignupFormId = $this->intSignupFormId;
			$this->ClassTermId = $objReloaded->ClassTermId;
			$this->ClassCourseId = $objReloaded->ClassCourseId;
			$this->ClassInstructorId = $objReloaded->ClassInstructorId;
			$this->dttDateStart = $objReloaded->dttDateStart;
			$this->dttDateEnd = $objReloaded->dttDateEnd;
			$this->strLocation = $objReloaded->strLocation;
			$this->intMeetingDay = $objReloaded->intMeetingDay;
			$this->intMeetingStartTime = $objReloaded->intMeetingStartTime;
			$this->intMeetingEndTime = $objReloaded->intMeetingEndTime;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ClassMeeting::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `class_meeting` (
					`signup_form_id`,
					`class_term_id`,
					`class_course_id`,
					`class_instructor_id`,
					`date_start`,
					`date_end`,
					`location`,
					`meeting_day`,
					`meeting_start_time`,
					`meeting_end_time`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
					' . $objDatabase->SqlVariable($this->intClassTermId) . ',
					' . $objDatabase->SqlVariable($this->intClassCourseId) . ',
					' . $objDatabase->SqlVariable($this->intClassInstructorId) . ',
					' . $objDatabase->SqlVariable($this->dttDateStart) . ',
					' . $objDatabase->SqlVariable($this->dttDateEnd) . ',
					' . $objDatabase->SqlVariable($this->strLocation) . ',
					' . $objDatabase->SqlVariable($this->intMeetingDay) . ',
					' . $objDatabase->SqlVariable($this->intMeetingStartTime) . ',
					' . $objDatabase->SqlVariable($this->intMeetingEndTime) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intSignupFormId
		 * @return ClassMeeting[]
		 */
		public static function GetJournalForId($intSignupFormId) {
			$objDatabase = ClassMeeting::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM class_meeting WHERE signup_form_id = ' .
				$objDatabase->SqlVariable($intSignupFormId) . ' ORDER BY __sys_date');

			return ClassMeeting::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ClassMeeting[]
		 */
		public function GetJournal() {
			return ClassMeeting::GetJournalForId($this->intSignupFormId);
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
				case 'SignupFormId':
					// Gets the value for intSignupFormId (PK)
					// @return integer
					return $this->intSignupFormId;

				case 'ClassTermId':
					// Gets the value for intClassTermId (Not Null)
					// @return integer
					return $this->intClassTermId;

				case 'ClassCourseId':
					// Gets the value for intClassCourseId (Not Null)
					// @return integer
					return $this->intClassCourseId;

				case 'ClassInstructorId':
					// Gets the value for intClassInstructorId (Not Null)
					// @return integer
					return $this->intClassInstructorId;

				case 'DateStart':
					// Gets the value for dttDateStart (Not Null)
					// @return QDateTime
					return $this->dttDateStart;

				case 'DateEnd':
					// Gets the value for dttDateEnd (Not Null)
					// @return QDateTime
					return $this->dttDateEnd;

				case 'Location':
					// Gets the value for strLocation 
					// @return string
					return $this->strLocation;

				case 'MeetingDay':
					// Gets the value for intMeetingDay 
					// @return integer
					return $this->intMeetingDay;

				case 'MeetingStartTime':
					// Gets the value for intMeetingStartTime 
					// @return integer
					return $this->intMeetingStartTime;

				case 'MeetingEndTime':
					// Gets the value for intMeetingEndTime 
					// @return integer
					return $this->intMeetingEndTime;


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupForm':
					// Gets the value for the SignupForm object referenced by intSignupFormId (PK)
					// @return SignupForm
					try {
						if ((!$this->objSignupForm) && (!is_null($this->intSignupFormId)))
							$this->objSignupForm = SignupForm::Load($this->intSignupFormId);
						return $this->objSignupForm;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClassTerm':
					// Gets the value for the ClassTerm object referenced by intClassTermId (Not Null)
					// @return ClassTerm
					try {
						if ((!$this->objClassTerm) && (!is_null($this->intClassTermId)))
							$this->objClassTerm = ClassTerm::Load($this->intClassTermId);
						return $this->objClassTerm;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClassCourse':
					// Gets the value for the ClassCourse object referenced by intClassCourseId (Not Null)
					// @return ClassCourse
					try {
						if ((!$this->objClassCourse) && (!is_null($this->intClassCourseId)))
							$this->objClassCourse = ClassCourse::Load($this->intClassCourseId);
						return $this->objClassCourse;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClassInstructor':
					// Gets the value for the ClassInstructor object referenced by intClassInstructorId (Not Null)
					// @return ClassInstructor
					try {
						if ((!$this->objClassInstructor) && (!is_null($this->intClassInstructorId)))
							$this->objClassInstructor = ClassInstructor::Load($this->intClassInstructorId);
						return $this->objClassInstructor;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ClassRegistration':
					// Gets the value for the private _objClassRegistration (Read-Only)
					// if set due to an expansion on the class_registration.class_meeting_id reverse relationship
					// @return ClassRegistration
					return $this->_objClassRegistration;

				case '_ClassRegistrationArray':
					// Gets the value for the private _objClassRegistrationArray (Read-Only)
					// if set due to an ExpandAsArray on the class_registration.class_meeting_id reverse relationship
					// @return ClassRegistration[]
					return (array) $this->_objClassRegistrationArray;


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
				case 'SignupFormId':
					// Sets the value for intSignupFormId (PK)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSignupForm = null;
						return ($this->intSignupFormId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClassTermId':
					// Sets the value for intClassTermId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objClassTerm = null;
						return ($this->intClassTermId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClassCourseId':
					// Sets the value for intClassCourseId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objClassCourse = null;
						return ($this->intClassCourseId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClassInstructorId':
					// Sets the value for intClassInstructorId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objClassInstructor = null;
						return ($this->intClassInstructorId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateStart':
					// Sets the value for dttDateStart (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateStart = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateEnd':
					// Sets the value for dttDateEnd (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateEnd = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'MeetingDay':
					// Sets the value for intMeetingDay 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intMeetingDay = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MeetingStartTime':
					// Sets the value for intMeetingStartTime 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intMeetingStartTime = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MeetingEndTime':
					// Sets the value for intMeetingEndTime 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intMeetingEndTime = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupForm':
					// Sets the value for the SignupForm object referenced by intSignupFormId (PK)
					// @param SignupForm $mixValue
					// @return SignupForm
					if (is_null($mixValue)) {
						$this->intSignupFormId = null;
						$this->objSignupForm = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SignupForm object
						try {
							$mixValue = QType::Cast($mixValue, 'SignupForm');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED SignupForm object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved SignupForm for this ClassMeeting');

						// Update Local Member Variables
						$this->objSignupForm = $mixValue;
						$this->intSignupFormId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ClassTerm':
					// Sets the value for the ClassTerm object referenced by intClassTermId (Not Null)
					// @param ClassTerm $mixValue
					// @return ClassTerm
					if (is_null($mixValue)) {
						$this->intClassTermId = null;
						$this->objClassTerm = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClassTerm object
						try {
							$mixValue = QType::Cast($mixValue, 'ClassTerm');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ClassTerm object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ClassTerm for this ClassMeeting');

						// Update Local Member Variables
						$this->objClassTerm = $mixValue;
						$this->intClassTermId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ClassCourse':
					// Sets the value for the ClassCourse object referenced by intClassCourseId (Not Null)
					// @param ClassCourse $mixValue
					// @return ClassCourse
					if (is_null($mixValue)) {
						$this->intClassCourseId = null;
						$this->objClassCourse = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClassCourse object
						try {
							$mixValue = QType::Cast($mixValue, 'ClassCourse');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ClassCourse object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ClassCourse for this ClassMeeting');

						// Update Local Member Variables
						$this->objClassCourse = $mixValue;
						$this->intClassCourseId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ClassInstructor':
					// Sets the value for the ClassInstructor object referenced by intClassInstructorId (Not Null)
					// @param ClassInstructor $mixValue
					// @return ClassInstructor
					if (is_null($mixValue)) {
						$this->intClassInstructorId = null;
						$this->objClassInstructor = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClassInstructor object
						try {
							$mixValue = QType::Cast($mixValue, 'ClassInstructor');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ClassInstructor object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ClassInstructor for this ClassMeeting');

						// Update Local Member Variables
						$this->objClassInstructor = $mixValue;
						$this->intClassInstructorId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for ClassRegistration
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ClassRegistrations as an array of ClassRegistration objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassRegistration[]
		*/ 
		public function GetClassRegistrationArray($objOptionalClauses = null) {
			if ((is_null($this->intSignupFormId)))
				return array();

			try {
				return ClassRegistration::LoadArrayByClassMeetingId($this->intSignupFormId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ClassRegistrations
		 * @return int
		*/ 
		public function CountClassRegistrations() {
			if ((is_null($this->intSignupFormId)))
				return 0;

			return ClassRegistration::CountByClassMeetingId($this->intSignupFormId);
		}

		/**
		 * Associates a ClassRegistration
		 * @param ClassRegistration $objClassRegistration
		 * @return void
		*/ 
		public function AssociateClassRegistration(ClassRegistration $objClassRegistration) {
			if ((is_null($this->intSignupFormId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClassRegistration on this unsaved ClassMeeting.');
			if ((is_null($objClassRegistration->SignupEntryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClassRegistration on this ClassMeeting with an unsaved ClassRegistration.');

			// Get the Database Object for this Class
			$objDatabase = ClassMeeting::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`class_registration`
				SET
					`class_meeting_id` = ' . $objDatabase->SqlVariable($this->intSignupFormId) . '
				WHERE
					`signup_entry_id` = ' . $objDatabase->SqlVariable($objClassRegistration->SignupEntryId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objClassRegistration->ClassMeetingId = $this->intSignupFormId;
				$objClassRegistration->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ClassRegistration
		 * @param ClassRegistration $objClassRegistration
		 * @return void
		*/ 
		public function UnassociateClassRegistration(ClassRegistration $objClassRegistration) {
			if ((is_null($this->intSignupFormId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassRegistration on this unsaved ClassMeeting.');
			if ((is_null($objClassRegistration->SignupEntryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassRegistration on this ClassMeeting with an unsaved ClassRegistration.');

			// Get the Database Object for this Class
			$objDatabase = ClassMeeting::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`class_registration`
				SET
					`class_meeting_id` = null
				WHERE
					`signup_entry_id` = ' . $objDatabase->SqlVariable($objClassRegistration->SignupEntryId) . ' AND
					`class_meeting_id` = ' . $objDatabase->SqlVariable($this->intSignupFormId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objClassRegistration->ClassMeetingId = null;
				$objClassRegistration->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ClassRegistrations
		 * @return void
		*/ 
		public function UnassociateAllClassRegistrations() {
			if ((is_null($this->intSignupFormId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassRegistration on this unsaved ClassMeeting.');

			// Get the Database Object for this Class
			$objDatabase = ClassMeeting::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ClassRegistration::LoadArrayByClassMeetingId($this->intSignupFormId) as $objClassRegistration) {
					$objClassRegistration->ClassMeetingId = null;
					$objClassRegistration->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`class_registration`
				SET
					`class_meeting_id` = null
				WHERE
					`class_meeting_id` = ' . $objDatabase->SqlVariable($this->intSignupFormId) . '
			');
		}

		/**
		 * Deletes an associated ClassRegistration
		 * @param ClassRegistration $objClassRegistration
		 * @return void
		*/ 
		public function DeleteAssociatedClassRegistration(ClassRegistration $objClassRegistration) {
			if ((is_null($this->intSignupFormId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassRegistration on this unsaved ClassMeeting.');
			if ((is_null($objClassRegistration->SignupEntryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassRegistration on this ClassMeeting with an unsaved ClassRegistration.');

			// Get the Database Object for this Class
			$objDatabase = ClassMeeting::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`class_registration`
				WHERE
					`signup_entry_id` = ' . $objDatabase->SqlVariable($objClassRegistration->SignupEntryId) . ' AND
					`class_meeting_id` = ' . $objDatabase->SqlVariable($this->intSignupFormId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objClassRegistration->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ClassRegistrations
		 * @return void
		*/ 
		public function DeleteAllClassRegistrations() {
			if ((is_null($this->intSignupFormId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassRegistration on this unsaved ClassMeeting.');

			// Get the Database Object for this Class
			$objDatabase = ClassMeeting::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ClassRegistration::LoadArrayByClassMeetingId($this->intSignupFormId) as $objClassRegistration) {
					$objClassRegistration->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`class_registration`
				WHERE
					`class_meeting_id` = ' . $objDatabase->SqlVariable($this->intSignupFormId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ClassMeeting"><sequence>';
			$strToReturn .= '<element name="SignupForm" type="xsd1:SignupForm"/>';
			$strToReturn .= '<element name="ClassTerm" type="xsd1:ClassTerm"/>';
			$strToReturn .= '<element name="ClassCourse" type="xsd1:ClassCourse"/>';
			$strToReturn .= '<element name="ClassInstructor" type="xsd1:ClassInstructor"/>';
			$strToReturn .= '<element name="DateStart" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateEnd" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Location" type="xsd:string"/>';
			$strToReturn .= '<element name="MeetingDay" type="xsd:int"/>';
			$strToReturn .= '<element name="MeetingStartTime" type="xsd:int"/>';
			$strToReturn .= '<element name="MeetingEndTime" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ClassMeeting', $strComplexTypeArray)) {
				$strComplexTypeArray['ClassMeeting'] = ClassMeeting::GetSoapComplexTypeXml();
				SignupForm::AlterSoapComplexTypeArray($strComplexTypeArray);
				ClassTerm::AlterSoapComplexTypeArray($strComplexTypeArray);
				ClassCourse::AlterSoapComplexTypeArray($strComplexTypeArray);
				ClassInstructor::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ClassMeeting::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ClassMeeting();
			if ((property_exists($objSoapObject, 'SignupForm')) &&
				($objSoapObject->SignupForm))
				$objToReturn->SignupForm = SignupForm::GetObjectFromSoapObject($objSoapObject->SignupForm);
			if ((property_exists($objSoapObject, 'ClassTerm')) &&
				($objSoapObject->ClassTerm))
				$objToReturn->ClassTerm = ClassTerm::GetObjectFromSoapObject($objSoapObject->ClassTerm);
			if ((property_exists($objSoapObject, 'ClassCourse')) &&
				($objSoapObject->ClassCourse))
				$objToReturn->ClassCourse = ClassCourse::GetObjectFromSoapObject($objSoapObject->ClassCourse);
			if ((property_exists($objSoapObject, 'ClassInstructor')) &&
				($objSoapObject->ClassInstructor))
				$objToReturn->ClassInstructor = ClassInstructor::GetObjectFromSoapObject($objSoapObject->ClassInstructor);
			if (property_exists($objSoapObject, 'DateStart'))
				$objToReturn->dttDateStart = new QDateTime($objSoapObject->DateStart);
			if (property_exists($objSoapObject, 'DateEnd'))
				$objToReturn->dttDateEnd = new QDateTime($objSoapObject->DateEnd);
			if (property_exists($objSoapObject, 'Location'))
				$objToReturn->strLocation = $objSoapObject->Location;
			if (property_exists($objSoapObject, 'MeetingDay'))
				$objToReturn->intMeetingDay = $objSoapObject->MeetingDay;
			if (property_exists($objSoapObject, 'MeetingStartTime'))
				$objToReturn->intMeetingStartTime = $objSoapObject->MeetingStartTime;
			if (property_exists($objSoapObject, 'MeetingEndTime'))
				$objToReturn->intMeetingEndTime = $objSoapObject->MeetingEndTime;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ClassMeeting::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSignupForm)
				$objObject->objSignupForm = SignupForm::GetSoapObjectFromObject($objObject->objSignupForm, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSignupFormId = null;
			if ($objObject->objClassTerm)
				$objObject->objClassTerm = ClassTerm::GetSoapObjectFromObject($objObject->objClassTerm, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClassTermId = null;
			if ($objObject->objClassCourse)
				$objObject->objClassCourse = ClassCourse::GetSoapObjectFromObject($objObject->objClassCourse, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClassCourseId = null;
			if ($objObject->objClassInstructor)
				$objObject->objClassInstructor = ClassInstructor::GetSoapObjectFromObject($objObject->objClassInstructor, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClassInstructorId = null;
			if ($objObject->dttDateStart)
				$objObject->dttDateStart = $objObject->dttDateStart->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateEnd)
				$objObject->dttDateEnd = $objObject->dttDateEnd->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $SignupFormId
	 * @property-read QQNodeSignupForm $SignupForm
	 * @property-read QQNode $ClassTermId
	 * @property-read QQNodeClassTerm $ClassTerm
	 * @property-read QQNode $ClassCourseId
	 * @property-read QQNodeClassCourse $ClassCourse
	 * @property-read QQNode $ClassInstructorId
	 * @property-read QQNodeClassInstructor $ClassInstructor
	 * @property-read QQNode $DateStart
	 * @property-read QQNode $DateEnd
	 * @property-read QQNode $Location
	 * @property-read QQNode $MeetingDay
	 * @property-read QQNode $MeetingStartTime
	 * @property-read QQNode $MeetingEndTime
	 * @property-read QQReverseReferenceNodeClassRegistration $ClassRegistration
	 */
	class QQNodeClassMeeting extends QQNode {
		protected $strTableName = 'class_meeting';
		protected $strPrimaryKey = 'signup_form_id';
		protected $strClassName = 'ClassMeeting';
		public function __get($strName) {
			switch ($strName) {
				case 'SignupFormId':
					return new QQNode('signup_form_id', 'SignupFormId', 'integer', $this);
				case 'SignupForm':
					return new QQNodeSignupForm('signup_form_id', 'SignupForm', 'integer', $this);
				case 'ClassTermId':
					return new QQNode('class_term_id', 'ClassTermId', 'integer', $this);
				case 'ClassTerm':
					return new QQNodeClassTerm('class_term_id', 'ClassTerm', 'integer', $this);
				case 'ClassCourseId':
					return new QQNode('class_course_id', 'ClassCourseId', 'integer', $this);
				case 'ClassCourse':
					return new QQNodeClassCourse('class_course_id', 'ClassCourse', 'integer', $this);
				case 'ClassInstructorId':
					return new QQNode('class_instructor_id', 'ClassInstructorId', 'integer', $this);
				case 'ClassInstructor':
					return new QQNodeClassInstructor('class_instructor_id', 'ClassInstructor', 'integer', $this);
				case 'DateStart':
					return new QQNode('date_start', 'DateStart', 'QDateTime', $this);
				case 'DateEnd':
					return new QQNode('date_end', 'DateEnd', 'QDateTime', $this);
				case 'Location':
					return new QQNode('location', 'Location', 'string', $this);
				case 'MeetingDay':
					return new QQNode('meeting_day', 'MeetingDay', 'integer', $this);
				case 'MeetingStartTime':
					return new QQNode('meeting_start_time', 'MeetingStartTime', 'integer', $this);
				case 'MeetingEndTime':
					return new QQNode('meeting_end_time', 'MeetingEndTime', 'integer', $this);
				case 'ClassRegistration':
					return new QQReverseReferenceNodeClassRegistration($this, 'classregistration', 'reverse_reference', 'class_meeting_id');

				case '_PrimaryKeyNode':
					return new QQNodeSignupForm('signup_form_id', 'SignupFormId', 'integer', $this);
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
	 * @property-read QQNode $SignupFormId
	 * @property-read QQNodeSignupForm $SignupForm
	 * @property-read QQNode $ClassTermId
	 * @property-read QQNodeClassTerm $ClassTerm
	 * @property-read QQNode $ClassCourseId
	 * @property-read QQNodeClassCourse $ClassCourse
	 * @property-read QQNode $ClassInstructorId
	 * @property-read QQNodeClassInstructor $ClassInstructor
	 * @property-read QQNode $DateStart
	 * @property-read QQNode $DateEnd
	 * @property-read QQNode $Location
	 * @property-read QQNode $MeetingDay
	 * @property-read QQNode $MeetingStartTime
	 * @property-read QQNode $MeetingEndTime
	 * @property-read QQReverseReferenceNodeClassRegistration $ClassRegistration
	 * @property-read QQNodeSignupForm $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeClassMeeting extends QQReverseReferenceNode {
		protected $strTableName = 'class_meeting';
		protected $strPrimaryKey = 'signup_form_id';
		protected $strClassName = 'ClassMeeting';
		public function __get($strName) {
			switch ($strName) {
				case 'SignupFormId':
					return new QQNode('signup_form_id', 'SignupFormId', 'integer', $this);
				case 'SignupForm':
					return new QQNodeSignupForm('signup_form_id', 'SignupForm', 'integer', $this);
				case 'ClassTermId':
					return new QQNode('class_term_id', 'ClassTermId', 'integer', $this);
				case 'ClassTerm':
					return new QQNodeClassTerm('class_term_id', 'ClassTerm', 'integer', $this);
				case 'ClassCourseId':
					return new QQNode('class_course_id', 'ClassCourseId', 'integer', $this);
				case 'ClassCourse':
					return new QQNodeClassCourse('class_course_id', 'ClassCourse', 'integer', $this);
				case 'ClassInstructorId':
					return new QQNode('class_instructor_id', 'ClassInstructorId', 'integer', $this);
				case 'ClassInstructor':
					return new QQNodeClassInstructor('class_instructor_id', 'ClassInstructor', 'integer', $this);
				case 'DateStart':
					return new QQNode('date_start', 'DateStart', 'QDateTime', $this);
				case 'DateEnd':
					return new QQNode('date_end', 'DateEnd', 'QDateTime', $this);
				case 'Location':
					return new QQNode('location', 'Location', 'string', $this);
				case 'MeetingDay':
					return new QQNode('meeting_day', 'MeetingDay', 'integer', $this);
				case 'MeetingStartTime':
					return new QQNode('meeting_start_time', 'MeetingStartTime', 'integer', $this);
				case 'MeetingEndTime':
					return new QQNode('meeting_end_time', 'MeetingEndTime', 'integer', $this);
				case 'ClassRegistration':
					return new QQReverseReferenceNodeClassRegistration($this, 'classregistration', 'reverse_reference', 'class_meeting_id');

				case '_PrimaryKeyNode':
					return new QQNodeSignupForm('signup_form_id', 'SignupFormId', 'integer', $this);
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