<?php
	/**
	 * The abstract ClassRegistrationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ClassRegistration subclass which
	 * extends this ClassRegistrationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ClassRegistration class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $SignupEntryId the value for intSignupEntryId (PK)
	 * @property integer $ClassMeetingId the value for intClassMeetingId (Not Null)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property integer $ClassGradeId the value for intClassGradeId 
	 * @property string $ChildcareNotes the value for strChildcareNotes 
	 * @property SignupEntry $SignupEntry the value for the SignupEntry object referenced by intSignupEntryId (PK)
	 * @property ClassMeeting $ClassMeeting the value for the ClassMeeting object referenced by intClassMeetingId (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property ClassGrade $ClassGrade the value for the ClassGrade object referenced by intClassGradeId 
	 * @property ClassAttendence $_ClassAttendence the value for the private _objClassAttendence (Read-Only) if set due to an expansion on the class_attendence.class_registration_id reverse relationship
	 * @property ClassAttendence[] $_ClassAttendenceArray the value for the private _objClassAttendenceArray (Read-Only) if set due to an ExpandAsArray on the class_attendence.class_registration_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ClassRegistrationGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column class_registration.signup_entry_id
		 * @var integer intSignupEntryId
		 */
		protected $intSignupEntryId;
		const SignupEntryIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intSignupEntryId;
		 */
		protected $__intSignupEntryId;

		/**
		 * Protected member variable that maps to the database column class_registration.class_meeting_id
		 * @var integer intClassMeetingId
		 */
		protected $intClassMeetingId;
		const ClassMeetingIdDefault = null;


		/**
		 * Protected member variable that maps to the database column class_registration.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column class_registration.class_grade_id
		 * @var integer intClassGradeId
		 */
		protected $intClassGradeId;
		const ClassGradeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column class_registration.childcare_notes
		 * @var string strChildcareNotes
		 */
		protected $strChildcareNotes;
		const ChildcareNotesDefault = null;


		/**
		 * Private member variable that stores a reference to a single ClassAttendence object
		 * (of type ClassAttendence), if this ClassRegistration object was restored with
		 * an expansion on the class_attendence association table.
		 * @var ClassAttendence _objClassAttendence;
		 */
		private $_objClassAttendence;

		/**
		 * Private member variable that stores a reference to an array of ClassAttendence objects
		 * (of type ClassAttendence[]), if this ClassRegistration object was restored with
		 * an ExpandAsArray on the class_attendence association table.
		 * @var ClassAttendence[] _objClassAttendenceArray;
		 */
		private $_objClassAttendenceArray = array();

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
		 * in the database column class_registration.signup_entry_id.
		 *
		 * NOTE: Always use the SignupEntry property getter to correctly retrieve this SignupEntry object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SignupEntry objSignupEntry
		 */
		protected $objSignupEntry;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column class_registration.class_meeting_id.
		 *
		 * NOTE: Always use the ClassMeeting property getter to correctly retrieve this ClassMeeting object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClassMeeting objClassMeeting
		 */
		protected $objClassMeeting;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column class_registration.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column class_registration.class_grade_id.
		 *
		 * NOTE: Always use the ClassGrade property getter to correctly retrieve this ClassGrade object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClassGrade objClassGrade
		 */
		protected $objClassGrade;





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
		 * Load a ClassRegistration from PK Info
		 * @param integer $intSignupEntryId
		 * @return ClassRegistration
		 */
		public static function Load($intSignupEntryId) {
			// Use QuerySingle to Perform the Query
			return ClassRegistration::QuerySingle(
				QQ::Equal(QQN::ClassRegistration()->SignupEntryId, $intSignupEntryId)
			);
		}

		/**
		 * Load all ClassRegistrations
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassRegistration[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ClassRegistration::QueryArray to perform the LoadAll query
			try {
				return ClassRegistration::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ClassRegistrations
		 * @return int
		 */
		public static function CountAll() {
			// Call ClassRegistration::QueryCount to perform the CountAll query
			return ClassRegistration::QueryCount(QQ::All());
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
			$objDatabase = ClassRegistration::GetDatabase();

			// Create/Build out the QueryBuilder object with ClassRegistration-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'class_registration');
			ClassRegistration::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('class_registration');

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
		 * Static Qcodo Query method to query for a single ClassRegistration object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClassRegistration the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassRegistration::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ClassRegistration object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ClassRegistration::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ClassRegistration::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ClassRegistration objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClassRegistration[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassRegistration::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ClassRegistration::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ClassRegistration::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ClassRegistration objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClassRegistration::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ClassRegistration::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'class_registration_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ClassRegistration-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ClassRegistration::GetSelectFields($objQueryBuilder);
				ClassRegistration::GetFromFields($objQueryBuilder);

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
			return ClassRegistration::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ClassRegistration
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'class_registration';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'signup_entry_id', $strAliasPrefix . 'signup_entry_id');
			$objBuilder->AddSelectItem($strTableName, 'class_meeting_id', $strAliasPrefix . 'class_meeting_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'class_grade_id', $strAliasPrefix . 'class_grade_id');
			$objBuilder->AddSelectItem($strTableName, 'childcare_notes', $strAliasPrefix . 'childcare_notes');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ClassRegistration from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ClassRegistration::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ClassRegistration
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'signup_entry_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intSignupEntryId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'class_registration__';


				$strAlias = $strAliasPrefix . 'classattendence__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objClassAttendenceArray)) {
						$objPreviousChildItem = $objPreviousItem->_objClassAttendenceArray[$intPreviousChildItemCount - 1];
						$objChildItem = ClassAttendence::InstantiateDbRow($objDbRow, $strAliasPrefix . 'classattendence__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objClassAttendenceArray[] = $objChildItem;
					} else
						$objPreviousItem->_objClassAttendenceArray[] = ClassAttendence::InstantiateDbRow($objDbRow, $strAliasPrefix . 'classattendence__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'class_registration__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the ClassRegistration object
			$objToReturn = new ClassRegistration();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'signup_entry_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_entry_id'] : $strAliasPrefix . 'signup_entry_id';
			$objToReturn->intSignupEntryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intSignupEntryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'class_meeting_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'class_meeting_id'] : $strAliasPrefix . 'class_meeting_id';
			$objToReturn->intClassMeetingId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'class_grade_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'class_grade_id'] : $strAliasPrefix . 'class_grade_id';
			$objToReturn->intClassGradeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'childcare_notes', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'childcare_notes'] : $strAliasPrefix . 'childcare_notes';
			$objToReturn->strChildcareNotes = $objDbRow->GetColumn($strAliasName, 'Blob');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'class_registration__';

			// Check for SignupEntry Early Binding
			$strAlias = $strAliasPrefix . 'signup_entry_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSignupEntry = SignupEntry::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signup_entry_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ClassMeeting Early Binding
			$strAlias = $strAliasPrefix . 'class_meeting_id__signup_form_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objClassMeeting = ClassMeeting::InstantiateDbRow($objDbRow, $strAliasPrefix . 'class_meeting_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ClassGrade Early Binding
			$strAlias = $strAliasPrefix . 'class_grade_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objClassGrade = ClassGrade::InstantiateDbRow($objDbRow, $strAliasPrefix . 'class_grade_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for ClassAttendence Virtual Binding
			$strAlias = $strAliasPrefix . 'classattendence__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objClassAttendenceArray[] = ClassAttendence::InstantiateDbRow($objDbRow, $strAliasPrefix . 'classattendence__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objClassAttendence = ClassAttendence::InstantiateDbRow($objDbRow, $strAliasPrefix . 'classattendence__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of ClassRegistrations from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ClassRegistration[]
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
					$objItem = ClassRegistration::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ClassRegistration::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ClassRegistration object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ClassRegistration next row resulting from the query
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
			return ClassRegistration::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ClassRegistration object,
		 * by SignupEntryId Index(es)
		 * @param integer $intSignupEntryId
		 * @return ClassRegistration
		*/
		public static function LoadBySignupEntryId($intSignupEntryId, $objOptionalClauses = null) {
			return ClassRegistration::QuerySingle(
				QQ::Equal(QQN::ClassRegistration()->SignupEntryId, $intSignupEntryId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single ClassRegistration object,
		 * by ClassMeetingId, PersonId Index(es)
		 * @param integer $intClassMeetingId
		 * @param integer $intPersonId
		 * @return ClassRegistration
		*/
		public static function LoadByClassMeetingIdPersonId($intClassMeetingId, $intPersonId, $objOptionalClauses = null) {
			return ClassRegistration::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::ClassRegistration()->ClassMeetingId, $intClassMeetingId),
				QQ::Equal(QQN::ClassRegistration()->PersonId, $intPersonId)
				)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ClassRegistration objects,
		 * by ClassMeetingId Index(es)
		 * @param integer $intClassMeetingId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassRegistration[]
		*/
		public static function LoadArrayByClassMeetingId($intClassMeetingId, $objOptionalClauses = null) {
			// Call ClassRegistration::QueryArray to perform the LoadArrayByClassMeetingId query
			try {
				return ClassRegistration::QueryArray(
					QQ::Equal(QQN::ClassRegistration()->ClassMeetingId, $intClassMeetingId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClassRegistrations
		 * by ClassMeetingId Index(es)
		 * @param integer $intClassMeetingId
		 * @return int
		*/
		public static function CountByClassMeetingId($intClassMeetingId, $objOptionalClauses = null) {
			// Call ClassRegistration::QueryCount to perform the CountByClassMeetingId query
			return ClassRegistration::QueryCount(
				QQ::Equal(QQN::ClassRegistration()->ClassMeetingId, $intClassMeetingId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ClassRegistration objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassRegistration[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call ClassRegistration::QueryArray to perform the LoadArrayByPersonId query
			try {
				return ClassRegistration::QueryArray(
					QQ::Equal(QQN::ClassRegistration()->PersonId, $intPersonId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClassRegistrations
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call ClassRegistration::QueryCount to perform the CountByPersonId query
			return ClassRegistration::QueryCount(
				QQ::Equal(QQN::ClassRegistration()->PersonId, $intPersonId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ClassRegistration objects,
		 * by ClassGradeId Index(es)
		 * @param integer $intClassGradeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassRegistration[]
		*/
		public static function LoadArrayByClassGradeId($intClassGradeId, $objOptionalClauses = null) {
			// Call ClassRegistration::QueryArray to perform the LoadArrayByClassGradeId query
			try {
				return ClassRegistration::QueryArray(
					QQ::Equal(QQN::ClassRegistration()->ClassGradeId, $intClassGradeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClassRegistrations
		 * by ClassGradeId Index(es)
		 * @param integer $intClassGradeId
		 * @return int
		*/
		public static function CountByClassGradeId($intClassGradeId, $objOptionalClauses = null) {
			// Call ClassRegistration::QueryCount to perform the CountByClassGradeId query
			return ClassRegistration::QueryCount(
				QQ::Equal(QQN::ClassRegistration()->ClassGradeId, $intClassGradeId)
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
		 * Save this ClassRegistration
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ClassRegistration::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `class_registration` (
							`signup_entry_id`,
							`class_meeting_id`,
							`person_id`,
							`class_grade_id`,
							`childcare_notes`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intSignupEntryId) . ',
							' . $objDatabase->SqlVariable($this->intClassMeetingId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intClassGradeId) . ',
							' . $objDatabase->SqlVariable($this->strChildcareNotes) . '
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
							`class_registration`
						SET
							`signup_entry_id` = ' . $objDatabase->SqlVariable($this->intSignupEntryId) . ',
							`class_meeting_id` = ' . $objDatabase->SqlVariable($this->intClassMeetingId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`class_grade_id` = ' . $objDatabase->SqlVariable($this->intClassGradeId) . ',
							`childcare_notes` = ' . $objDatabase->SqlVariable($this->strChildcareNotes) . '
						WHERE
							`signup_entry_id` = ' . $objDatabase->SqlVariable($this->__intSignupEntryId) . '
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
			$this->__intSignupEntryId = $this->intSignupEntryId;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this ClassRegistration
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intSignupEntryId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ClassRegistration with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ClassRegistration::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`class_registration`
				WHERE
					`signup_entry_id` = ' . $objDatabase->SqlVariable($this->intSignupEntryId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ClassRegistrations
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ClassRegistration::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`class_registration`');
		}

		/**
		 * Truncate class_registration table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ClassRegistration::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `class_registration`');
		}

		/**
		 * Reload this ClassRegistration from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ClassRegistration object.');

			// Reload the Object
			$objReloaded = ClassRegistration::Load($this->intSignupEntryId);

			// Update $this's local variables to match
			$this->SignupEntryId = $objReloaded->SignupEntryId;
			$this->__intSignupEntryId = $this->intSignupEntryId;
			$this->ClassMeetingId = $objReloaded->ClassMeetingId;
			$this->PersonId = $objReloaded->PersonId;
			$this->ClassGradeId = $objReloaded->ClassGradeId;
			$this->strChildcareNotes = $objReloaded->strChildcareNotes;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ClassRegistration::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `class_registration` (
					`signup_entry_id`,
					`class_meeting_id`,
					`person_id`,
					`class_grade_id`,
					`childcare_notes`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intSignupEntryId) . ',
					' . $objDatabase->SqlVariable($this->intClassMeetingId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->intClassGradeId) . ',
					' . $objDatabase->SqlVariable($this->strChildcareNotes) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intSignupEntryId
		 * @return ClassRegistration[]
		 */
		public static function GetJournalForId($intSignupEntryId) {
			$objDatabase = ClassRegistration::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM class_registration WHERE signup_entry_id = ' .
				$objDatabase->SqlVariable($intSignupEntryId) . ' ORDER BY __sys_date');

			return ClassRegistration::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ClassRegistration[]
		 */
		public function GetJournal() {
			return ClassRegistration::GetJournalForId($this->intSignupEntryId);
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
				case 'SignupEntryId':
					// Gets the value for intSignupEntryId (PK)
					// @return integer
					return $this->intSignupEntryId;

				case 'ClassMeetingId':
					// Gets the value for intClassMeetingId (Not Null)
					// @return integer
					return $this->intClassMeetingId;

				case 'PersonId':
					// Gets the value for intPersonId (Not Null)
					// @return integer
					return $this->intPersonId;

				case 'ClassGradeId':
					// Gets the value for intClassGradeId 
					// @return integer
					return $this->intClassGradeId;

				case 'ChildcareNotes':
					// Gets the value for strChildcareNotes 
					// @return string
					return $this->strChildcareNotes;


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupEntry':
					// Gets the value for the SignupEntry object referenced by intSignupEntryId (PK)
					// @return SignupEntry
					try {
						if ((!$this->objSignupEntry) && (!is_null($this->intSignupEntryId)))
							$this->objSignupEntry = SignupEntry::Load($this->intSignupEntryId);
						return $this->objSignupEntry;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClassMeeting':
					// Gets the value for the ClassMeeting object referenced by intClassMeetingId (Not Null)
					// @return ClassMeeting
					try {
						if ((!$this->objClassMeeting) && (!is_null($this->intClassMeetingId)))
							$this->objClassMeeting = ClassMeeting::Load($this->intClassMeetingId);
						return $this->objClassMeeting;
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

				case 'ClassGrade':
					// Gets the value for the ClassGrade object referenced by intClassGradeId 
					// @return ClassGrade
					try {
						if ((!$this->objClassGrade) && (!is_null($this->intClassGradeId)))
							$this->objClassGrade = ClassGrade::Load($this->intClassGradeId);
						return $this->objClassGrade;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ClassAttendence':
					// Gets the value for the private _objClassAttendence (Read-Only)
					// if set due to an expansion on the class_attendence.class_registration_id reverse relationship
					// @return ClassAttendence
					return $this->_objClassAttendence;

				case '_ClassAttendenceArray':
					// Gets the value for the private _objClassAttendenceArray (Read-Only)
					// if set due to an ExpandAsArray on the class_attendence.class_registration_id reverse relationship
					// @return ClassAttendence[]
					return (array) $this->_objClassAttendenceArray;


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
				case 'SignupEntryId':
					// Sets the value for intSignupEntryId (PK)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSignupEntry = null;
						return ($this->intSignupEntryId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClassMeetingId':
					// Sets the value for intClassMeetingId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objClassMeeting = null;
						return ($this->intClassMeetingId = QType::Cast($mixValue, QType::Integer));
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

				case 'ClassGradeId':
					// Sets the value for intClassGradeId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objClassGrade = null;
						return ($this->intClassGradeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ChildcareNotes':
					// Sets the value for strChildcareNotes 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strChildcareNotes = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupEntry':
					// Sets the value for the SignupEntry object referenced by intSignupEntryId (PK)
					// @param SignupEntry $mixValue
					// @return SignupEntry
					if (is_null($mixValue)) {
						$this->intSignupEntryId = null;
						$this->objSignupEntry = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SignupEntry object
						try {
							$mixValue = QType::Cast($mixValue, 'SignupEntry');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED SignupEntry object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved SignupEntry for this ClassRegistration');

						// Update Local Member Variables
						$this->objSignupEntry = $mixValue;
						$this->intSignupEntryId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ClassMeeting':
					// Sets the value for the ClassMeeting object referenced by intClassMeetingId (Not Null)
					// @param ClassMeeting $mixValue
					// @return ClassMeeting
					if (is_null($mixValue)) {
						$this->intClassMeetingId = null;
						$this->objClassMeeting = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClassMeeting object
						try {
							$mixValue = QType::Cast($mixValue, 'ClassMeeting');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ClassMeeting object
						if (is_null($mixValue->SignupFormId))
							throw new QCallerException('Unable to set an unsaved ClassMeeting for this ClassRegistration');

						// Update Local Member Variables
						$this->objClassMeeting = $mixValue;
						$this->intClassMeetingId = $mixValue->SignupFormId;

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
							throw new QCallerException('Unable to set an unsaved Person for this ClassRegistration');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ClassGrade':
					// Sets the value for the ClassGrade object referenced by intClassGradeId 
					// @param ClassGrade $mixValue
					// @return ClassGrade
					if (is_null($mixValue)) {
						$this->intClassGradeId = null;
						$this->objClassGrade = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClassGrade object
						try {
							$mixValue = QType::Cast($mixValue, 'ClassGrade');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED ClassGrade object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ClassGrade for this ClassRegistration');

						// Update Local Member Variables
						$this->objClassGrade = $mixValue;
						$this->intClassGradeId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for ClassAttendence
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ClassAttendences as an array of ClassAttendence objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClassAttendence[]
		*/ 
		public function GetClassAttendenceArray($objOptionalClauses = null) {
			if ((is_null($this->intSignupEntryId)))
				return array();

			try {
				return ClassAttendence::LoadArrayByClassRegistrationId($this->intSignupEntryId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ClassAttendences
		 * @return int
		*/ 
		public function CountClassAttendences() {
			if ((is_null($this->intSignupEntryId)))
				return 0;

			return ClassAttendence::CountByClassRegistrationId($this->intSignupEntryId);
		}

		/**
		 * Associates a ClassAttendence
		 * @param ClassAttendence $objClassAttendence
		 * @return void
		*/ 
		public function AssociateClassAttendence(ClassAttendence $objClassAttendence) {
			if ((is_null($this->intSignupEntryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClassAttendence on this unsaved ClassRegistration.');
			if ((is_null($objClassAttendence->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClassAttendence on this ClassRegistration with an unsaved ClassAttendence.');

			// Get the Database Object for this Class
			$objDatabase = ClassRegistration::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`class_attendence`
				SET
					`class_registration_id` = ' . $objDatabase->SqlVariable($this->intSignupEntryId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClassAttendence->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objClassAttendence->ClassRegistrationId = $this->intSignupEntryId;
				$objClassAttendence->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ClassAttendence
		 * @param ClassAttendence $objClassAttendence
		 * @return void
		*/ 
		public function UnassociateClassAttendence(ClassAttendence $objClassAttendence) {
			if ((is_null($this->intSignupEntryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassAttendence on this unsaved ClassRegistration.');
			if ((is_null($objClassAttendence->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassAttendence on this ClassRegistration with an unsaved ClassAttendence.');

			// Get the Database Object for this Class
			$objDatabase = ClassRegistration::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`class_attendence`
				SET
					`class_registration_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClassAttendence->Id) . ' AND
					`class_registration_id` = ' . $objDatabase->SqlVariable($this->intSignupEntryId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objClassAttendence->ClassRegistrationId = null;
				$objClassAttendence->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ClassAttendences
		 * @return void
		*/ 
		public function UnassociateAllClassAttendences() {
			if ((is_null($this->intSignupEntryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassAttendence on this unsaved ClassRegistration.');

			// Get the Database Object for this Class
			$objDatabase = ClassRegistration::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ClassAttendence::LoadArrayByClassRegistrationId($this->intSignupEntryId) as $objClassAttendence) {
					$objClassAttendence->ClassRegistrationId = null;
					$objClassAttendence->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`class_attendence`
				SET
					`class_registration_id` = null
				WHERE
					`class_registration_id` = ' . $objDatabase->SqlVariable($this->intSignupEntryId) . '
			');
		}

		/**
		 * Deletes an associated ClassAttendence
		 * @param ClassAttendence $objClassAttendence
		 * @return void
		*/ 
		public function DeleteAssociatedClassAttendence(ClassAttendence $objClassAttendence) {
			if ((is_null($this->intSignupEntryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassAttendence on this unsaved ClassRegistration.');
			if ((is_null($objClassAttendence->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassAttendence on this ClassRegistration with an unsaved ClassAttendence.');

			// Get the Database Object for this Class
			$objDatabase = ClassRegistration::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`class_attendence`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClassAttendence->Id) . ' AND
					`class_registration_id` = ' . $objDatabase->SqlVariable($this->intSignupEntryId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objClassAttendence->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ClassAttendences
		 * @return void
		*/ 
		public function DeleteAllClassAttendences() {
			if ((is_null($this->intSignupEntryId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClassAttendence on this unsaved ClassRegistration.');

			// Get the Database Object for this Class
			$objDatabase = ClassRegistration::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ClassAttendence::LoadArrayByClassRegistrationId($this->intSignupEntryId) as $objClassAttendence) {
					$objClassAttendence->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`class_attendence`
				WHERE
					`class_registration_id` = ' . $objDatabase->SqlVariable($this->intSignupEntryId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ClassRegistration"><sequence>';
			$strToReturn .= '<element name="SignupEntry" type="xsd1:SignupEntry"/>';
			$strToReturn .= '<element name="ClassMeeting" type="xsd1:ClassMeeting"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="ClassGrade" type="xsd1:ClassGrade"/>';
			$strToReturn .= '<element name="ChildcareNotes" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ClassRegistration', $strComplexTypeArray)) {
				$strComplexTypeArray['ClassRegistration'] = ClassRegistration::GetSoapComplexTypeXml();
				SignupEntry::AlterSoapComplexTypeArray($strComplexTypeArray);
				ClassMeeting::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				ClassGrade::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ClassRegistration::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ClassRegistration();
			if ((property_exists($objSoapObject, 'SignupEntry')) &&
				($objSoapObject->SignupEntry))
				$objToReturn->SignupEntry = SignupEntry::GetObjectFromSoapObject($objSoapObject->SignupEntry);
			if ((property_exists($objSoapObject, 'ClassMeeting')) &&
				($objSoapObject->ClassMeeting))
				$objToReturn->ClassMeeting = ClassMeeting::GetObjectFromSoapObject($objSoapObject->ClassMeeting);
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if ((property_exists($objSoapObject, 'ClassGrade')) &&
				($objSoapObject->ClassGrade))
				$objToReturn->ClassGrade = ClassGrade::GetObjectFromSoapObject($objSoapObject->ClassGrade);
			if (property_exists($objSoapObject, 'ChildcareNotes'))
				$objToReturn->strChildcareNotes = $objSoapObject->ChildcareNotes;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ClassRegistration::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSignupEntry)
				$objObject->objSignupEntry = SignupEntry::GetSoapObjectFromObject($objObject->objSignupEntry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSignupEntryId = null;
			if ($objObject->objClassMeeting)
				$objObject->objClassMeeting = ClassMeeting::GetSoapObjectFromObject($objObject->objClassMeeting, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClassMeetingId = null;
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->objClassGrade)
				$objObject->objClassGrade = ClassGrade::GetSoapObjectFromObject($objObject->objClassGrade, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClassGradeId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $SignupEntryId
	 * @property-read QQNodeSignupEntry $SignupEntry
	 * @property-read QQNode $ClassMeetingId
	 * @property-read QQNodeClassMeeting $ClassMeeting
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $ClassGradeId
	 * @property-read QQNodeClassGrade $ClassGrade
	 * @property-read QQNode $ChildcareNotes
	 * @property-read QQReverseReferenceNodeClassAttendence $ClassAttendence
	 */
	class QQNodeClassRegistration extends QQNode {
		protected $strTableName = 'class_registration';
		protected $strPrimaryKey = 'signup_entry_id';
		protected $strClassName = 'ClassRegistration';
		public function __get($strName) {
			switch ($strName) {
				case 'SignupEntryId':
					return new QQNode('signup_entry_id', 'SignupEntryId', 'integer', $this);
				case 'SignupEntry':
					return new QQNodeSignupEntry('signup_entry_id', 'SignupEntry', 'integer', $this);
				case 'ClassMeetingId':
					return new QQNode('class_meeting_id', 'ClassMeetingId', 'integer', $this);
				case 'ClassMeeting':
					return new QQNodeClassMeeting('class_meeting_id', 'ClassMeeting', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'ClassGradeId':
					return new QQNode('class_grade_id', 'ClassGradeId', 'integer', $this);
				case 'ClassGrade':
					return new QQNodeClassGrade('class_grade_id', 'ClassGrade', 'integer', $this);
				case 'ChildcareNotes':
					return new QQNode('childcare_notes', 'ChildcareNotes', 'string', $this);
				case 'ClassAttendence':
					return new QQReverseReferenceNodeClassAttendence($this, 'classattendence', 'reverse_reference', 'class_registration_id');

				case '_PrimaryKeyNode':
					return new QQNodeSignupEntry('signup_entry_id', 'SignupEntryId', 'integer', $this);
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
	 * @property-read QQNode $SignupEntryId
	 * @property-read QQNodeSignupEntry $SignupEntry
	 * @property-read QQNode $ClassMeetingId
	 * @property-read QQNodeClassMeeting $ClassMeeting
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $ClassGradeId
	 * @property-read QQNodeClassGrade $ClassGrade
	 * @property-read QQNode $ChildcareNotes
	 * @property-read QQReverseReferenceNodeClassAttendence $ClassAttendence
	 * @property-read QQNodeSignupEntry $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeClassRegistration extends QQReverseReferenceNode {
		protected $strTableName = 'class_registration';
		protected $strPrimaryKey = 'signup_entry_id';
		protected $strClassName = 'ClassRegistration';
		public function __get($strName) {
			switch ($strName) {
				case 'SignupEntryId':
					return new QQNode('signup_entry_id', 'SignupEntryId', 'integer', $this);
				case 'SignupEntry':
					return new QQNodeSignupEntry('signup_entry_id', 'SignupEntry', 'integer', $this);
				case 'ClassMeetingId':
					return new QQNode('class_meeting_id', 'ClassMeetingId', 'integer', $this);
				case 'ClassMeeting':
					return new QQNodeClassMeeting('class_meeting_id', 'ClassMeeting', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'ClassGradeId':
					return new QQNode('class_grade_id', 'ClassGradeId', 'integer', $this);
				case 'ClassGrade':
					return new QQNodeClassGrade('class_grade_id', 'ClassGrade', 'integer', $this);
				case 'ChildcareNotes':
					return new QQNode('childcare_notes', 'ChildcareNotes', 'string', $this);
				case 'ClassAttendence':
					return new QQReverseReferenceNodeClassAttendence($this, 'classattendence', 'reverse_reference', 'class_registration_id');

				case '_PrimaryKeyNode':
					return new QQNodeSignupEntry('signup_entry_id', 'SignupEntryId', 'integer', $this);
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