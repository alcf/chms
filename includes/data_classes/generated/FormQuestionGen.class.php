<?php
	/**
	 * The abstract FormQuestionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FormQuestion subclass which
	 * extends this FormQuestionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FormQuestion class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $SignupFormId the value for intSignupFormId (Not Null)
	 * @property integer $OrderNumber the value for intOrderNumber 
	 * @property integer $FormQuestionTypeId the value for intFormQuestionTypeId (Not Null)
	 * @property string $ShortDescription the value for strShortDescription 
	 * @property string $Question the value for strQuestion 
	 * @property boolean $RequiredFlag the value for blnRequiredFlag 
	 * @property boolean $InternalFlag the value for blnInternalFlag 
	 * @property string $Options the value for strOptions 
	 * @property boolean $AllowOtherFlag the value for blnAllowOtherFlag 
	 * @property boolean $ViewFlag the value for blnViewFlag 
	 * @property SignupForm $SignupForm the value for the SignupForm object referenced by intSignupFormId (Not Null)
	 * @property FormAnswer $_FormAnswer the value for the private _objFormAnswer (Read-Only) if set due to an expansion on the form_answer.form_question_id reverse relationship
	 * @property FormAnswer[] $_FormAnswerArray the value for the private _objFormAnswerArray (Read-Only) if set due to an ExpandAsArray on the form_answer.form_question_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FormQuestionGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column form_question.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_question.signup_form_id
		 * @var integer intSignupFormId
		 */
		protected $intSignupFormId;
		const SignupFormIdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_question.order_number
		 * @var integer intOrderNumber
		 */
		protected $intOrderNumber;
		const OrderNumberDefault = null;


		/**
		 * Protected member variable that maps to the database column form_question.form_question_type_id
		 * @var integer intFormQuestionTypeId
		 */
		protected $intFormQuestionTypeId;
		const FormQuestionTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column form_question.short_description
		 * @var string strShortDescription
		 */
		protected $strShortDescription;
		const ShortDescriptionMaxLength = 40;
		const ShortDescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column form_question.question
		 * @var string strQuestion
		 */
		protected $strQuestion;
		const QuestionMaxLength = 200;
		const QuestionDefault = null;


		/**
		 * Protected member variable that maps to the database column form_question.required_flag
		 * @var boolean blnRequiredFlag
		 */
		protected $blnRequiredFlag;
		const RequiredFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column form_question.internal_flag
		 * @var boolean blnInternalFlag
		 */
		protected $blnInternalFlag;
		const InternalFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column form_question.options
		 * @var string strOptions
		 */
		protected $strOptions;
		const OptionsDefault = null;


		/**
		 * Protected member variable that maps to the database column form_question.allow_other_flag
		 * @var boolean blnAllowOtherFlag
		 */
		protected $blnAllowOtherFlag;
		const AllowOtherFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column form_question.view_flag
		 * @var boolean blnViewFlag
		 */
		protected $blnViewFlag;
		const ViewFlagDefault = null;


		/**
		 * Private member variable that stores a reference to a single FormAnswer object
		 * (of type FormAnswer), if this FormQuestion object was restored with
		 * an expansion on the form_answer association table.
		 * @var FormAnswer _objFormAnswer;
		 */
		private $_objFormAnswer;

		/**
		 * Private member variable that stores a reference to an array of FormAnswer objects
		 * (of type FormAnswer[]), if this FormQuestion object was restored with
		 * an ExpandAsArray on the form_answer association table.
		 * @var FormAnswer[] _objFormAnswerArray;
		 */
		private $_objFormAnswerArray = array();

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
		 * in the database column form_question.signup_form_id.
		 *
		 * NOTE: Always use the SignupForm property getter to correctly retrieve this SignupForm object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SignupForm objSignupForm
		 */
		protected $objSignupForm;





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
		 * Load a FormQuestion from PK Info
		 * @param integer $intId
		 * @return FormQuestion
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return FormQuestion::QuerySingle(
				QQ::Equal(QQN::FormQuestion()->Id, $intId)
			);
		}

		/**
		 * Load all FormQuestions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormQuestion[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call FormQuestion::QueryArray to perform the LoadAll query
			try {
				return FormQuestion::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FormQuestions
		 * @return int
		 */
		public static function CountAll() {
			// Call FormQuestion::QueryCount to perform the CountAll query
			return FormQuestion::QueryCount(QQ::All());
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
			$objDatabase = FormQuestion::GetDatabase();

			// Create/Build out the QueryBuilder object with FormQuestion-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'form_question');
			FormQuestion::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('form_question');

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
		 * Static Qcodo Query method to query for a single FormQuestion object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FormQuestion the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormQuestion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new FormQuestion object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FormQuestion::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return FormQuestion::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of FormQuestion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FormQuestion[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormQuestion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FormQuestion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FormQuestion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of FormQuestion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormQuestion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FormQuestion::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'form_question_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with FormQuestion-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				FormQuestion::GetSelectFields($objQueryBuilder);
				FormQuestion::GetFromFields($objQueryBuilder);

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
			return FormQuestion::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FormQuestion
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'form_question';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'signup_form_id', $strAliasPrefix . 'signup_form_id');
			$objBuilder->AddSelectItem($strTableName, 'order_number', $strAliasPrefix . 'order_number');
			$objBuilder->AddSelectItem($strTableName, 'form_question_type_id', $strAliasPrefix . 'form_question_type_id');
			$objBuilder->AddSelectItem($strTableName, 'short_description', $strAliasPrefix . 'short_description');
			$objBuilder->AddSelectItem($strTableName, 'question', $strAliasPrefix . 'question');
			$objBuilder->AddSelectItem($strTableName, 'required_flag', $strAliasPrefix . 'required_flag');
			$objBuilder->AddSelectItem($strTableName, 'internal_flag', $strAliasPrefix . 'internal_flag');
			$objBuilder->AddSelectItem($strTableName, 'options', $strAliasPrefix . 'options');
			$objBuilder->AddSelectItem($strTableName, 'allow_other_flag', $strAliasPrefix . 'allow_other_flag');
			$objBuilder->AddSelectItem($strTableName, 'view_flag', $strAliasPrefix . 'view_flag');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a FormQuestion from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FormQuestion::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return FormQuestion
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
					$strAliasPrefix = 'form_question__';


				$strAlias = $strAliasPrefix . 'formanswer__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objFormAnswerArray)) {
						$objPreviousChildItem = $objPreviousItem->_objFormAnswerArray[$intPreviousChildItemCount - 1];
						$objChildItem = FormAnswer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formanswer__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objFormAnswerArray[] = $objChildItem;
					} else
						$objPreviousItem->_objFormAnswerArray[] = FormAnswer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formanswer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'form_question__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the FormQuestion object
			$objToReturn = new FormQuestion();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'signup_form_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'signup_form_id'] : $strAliasPrefix . 'signup_form_id';
			$objToReturn->intSignupFormId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'order_number', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'order_number'] : $strAliasPrefix . 'order_number';
			$objToReturn->intOrderNumber = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'form_question_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'form_question_type_id'] : $strAliasPrefix . 'form_question_type_id';
			$objToReturn->intFormQuestionTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'short_description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'short_description'] : $strAliasPrefix . 'short_description';
			$objToReturn->strShortDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'question', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'question'] : $strAliasPrefix . 'question';
			$objToReturn->strQuestion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'required_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'required_flag'] : $strAliasPrefix . 'required_flag';
			$objToReturn->blnRequiredFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'internal_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'internal_flag'] : $strAliasPrefix . 'internal_flag';
			$objToReturn->blnInternalFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'options', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'options'] : $strAliasPrefix . 'options';
			$objToReturn->strOptions = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'allow_other_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'allow_other_flag'] : $strAliasPrefix . 'allow_other_flag';
			$objToReturn->blnAllowOtherFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'view_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'view_flag'] : $strAliasPrefix . 'view_flag';
			$objToReturn->blnViewFlag = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'form_question__';

			// Check for SignupForm Early Binding
			$strAlias = $strAliasPrefix . 'signup_form_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objSignupForm = SignupForm::InstantiateDbRow($objDbRow, $strAliasPrefix . 'signup_form_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for FormAnswer Virtual Binding
			$strAlias = $strAliasPrefix . 'formanswer__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objFormAnswerArray[] = FormAnswer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formanswer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objFormAnswer = FormAnswer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'formanswer__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of FormQuestions from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return FormQuestion[]
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
					$objItem = FormQuestion::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FormQuestion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single FormQuestion object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FormQuestion next row resulting from the query
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
			return FormQuestion::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single FormQuestion object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return FormQuestion
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return FormQuestion::QuerySingle(
				QQ::Equal(QQN::FormQuestion()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of FormQuestion objects,
		 * by SignupFormId Index(es)
		 * @param integer $intSignupFormId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormQuestion[]
		*/
		public static function LoadArrayBySignupFormId($intSignupFormId, $objOptionalClauses = null) {
			// Call FormQuestion::QueryArray to perform the LoadArrayBySignupFormId query
			try {
				return FormQuestion::QueryArray(
					QQ::Equal(QQN::FormQuestion()->SignupFormId, $intSignupFormId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormQuestions
		 * by SignupFormId Index(es)
		 * @param integer $intSignupFormId
		 * @return int
		*/
		public static function CountBySignupFormId($intSignupFormId, $objOptionalClauses = null) {
			// Call FormQuestion::QueryCount to perform the CountBySignupFormId query
			return FormQuestion::QueryCount(
				QQ::Equal(QQN::FormQuestion()->SignupFormId, $intSignupFormId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of FormQuestion objects,
		 * by FormQuestionTypeId Index(es)
		 * @param integer $intFormQuestionTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormQuestion[]
		*/
		public static function LoadArrayByFormQuestionTypeId($intFormQuestionTypeId, $objOptionalClauses = null) {
			// Call FormQuestion::QueryArray to perform the LoadArrayByFormQuestionTypeId query
			try {
				return FormQuestion::QueryArray(
					QQ::Equal(QQN::FormQuestion()->FormQuestionTypeId, $intFormQuestionTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormQuestions
		 * by FormQuestionTypeId Index(es)
		 * @param integer $intFormQuestionTypeId
		 * @return int
		*/
		public static function CountByFormQuestionTypeId($intFormQuestionTypeId, $objOptionalClauses = null) {
			// Call FormQuestion::QueryCount to perform the CountByFormQuestionTypeId query
			return FormQuestion::QueryCount(
				QQ::Equal(QQN::FormQuestion()->FormQuestionTypeId, $intFormQuestionTypeId)
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
		 * Save this FormQuestion
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FormQuestion::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `form_question` (
							`signup_form_id`,
							`order_number`,
							`form_question_type_id`,
							`short_description`,
							`question`,
							`required_flag`,
							`internal_flag`,
							`options`,
							`allow_other_flag`,
							`view_flag`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
							' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							' . $objDatabase->SqlVariable($this->intFormQuestionTypeId) . ',
							' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							' . $objDatabase->SqlVariable($this->strQuestion) . ',
							' . $objDatabase->SqlVariable($this->blnRequiredFlag) . ',
							' . $objDatabase->SqlVariable($this->blnInternalFlag) . ',
							' . $objDatabase->SqlVariable($this->strOptions) . ',
							' . $objDatabase->SqlVariable($this->blnAllowOtherFlag) . ',
							' . $objDatabase->SqlVariable($this->blnViewFlag) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('form_question', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`form_question`
						SET
							`signup_form_id` = ' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
							`order_number` = ' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
							`form_question_type_id` = ' . $objDatabase->SqlVariable($this->intFormQuestionTypeId) . ',
							`short_description` = ' . $objDatabase->SqlVariable($this->strShortDescription) . ',
							`question` = ' . $objDatabase->SqlVariable($this->strQuestion) . ',
							`required_flag` = ' . $objDatabase->SqlVariable($this->blnRequiredFlag) . ',
							`internal_flag` = ' . $objDatabase->SqlVariable($this->blnInternalFlag) . ',
							`options` = ' . $objDatabase->SqlVariable($this->strOptions) . ',
							`allow_other_flag` = ' . $objDatabase->SqlVariable($this->blnAllowOtherFlag) . ',
							`view_flag` = ' . $objDatabase->SqlVariable($this->blnViewFlag) . '
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
		 * Delete this FormQuestion
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FormQuestion with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FormQuestion::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_question`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all FormQuestions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FormQuestion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_question`');
		}

		/**
		 * Truncate form_question table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FormQuestion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `form_question`');
		}

		/**
		 * Reload this FormQuestion from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FormQuestion object.');

			// Reload the Object
			$objReloaded = FormQuestion::Load($this->intId);

			// Update $this's local variables to match
			$this->SignupFormId = $objReloaded->SignupFormId;
			$this->intOrderNumber = $objReloaded->intOrderNumber;
			$this->FormQuestionTypeId = $objReloaded->FormQuestionTypeId;
			$this->strShortDescription = $objReloaded->strShortDescription;
			$this->strQuestion = $objReloaded->strQuestion;
			$this->blnRequiredFlag = $objReloaded->blnRequiredFlag;
			$this->blnInternalFlag = $objReloaded->blnInternalFlag;
			$this->strOptions = $objReloaded->strOptions;
			$this->blnAllowOtherFlag = $objReloaded->blnAllowOtherFlag;
			$this->blnViewFlag = $objReloaded->blnViewFlag;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = FormQuestion::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `form_question` (
					`id`,
					`signup_form_id`,
					`order_number`,
					`form_question_type_id`,
					`short_description`,
					`question`,
					`required_flag`,
					`internal_flag`,
					`options`,
					`allow_other_flag`,
					`view_flag`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intSignupFormId) . ',
					' . $objDatabase->SqlVariable($this->intOrderNumber) . ',
					' . $objDatabase->SqlVariable($this->intFormQuestionTypeId) . ',
					' . $objDatabase->SqlVariable($this->strShortDescription) . ',
					' . $objDatabase->SqlVariable($this->strQuestion) . ',
					' . $objDatabase->SqlVariable($this->blnRequiredFlag) . ',
					' . $objDatabase->SqlVariable($this->blnInternalFlag) . ',
					' . $objDatabase->SqlVariable($this->strOptions) . ',
					' . $objDatabase->SqlVariable($this->blnAllowOtherFlag) . ',
					' . $objDatabase->SqlVariable($this->blnViewFlag) . ',
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
		 * @return FormQuestion[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = FormQuestion::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM form_question WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return FormQuestion::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return FormQuestion[]
		 */
		public function GetJournal() {
			return FormQuestion::GetJournalForId($this->intId);
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

				case 'SignupFormId':
					// Gets the value for intSignupFormId (Not Null)
					// @return integer
					return $this->intSignupFormId;

				case 'OrderNumber':
					// Gets the value for intOrderNumber 
					// @return integer
					return $this->intOrderNumber;

				case 'FormQuestionTypeId':
					// Gets the value for intFormQuestionTypeId (Not Null)
					// @return integer
					return $this->intFormQuestionTypeId;

				case 'ShortDescription':
					// Gets the value for strShortDescription 
					// @return string
					return $this->strShortDescription;

				case 'Question':
					// Gets the value for strQuestion 
					// @return string
					return $this->strQuestion;

				case 'RequiredFlag':
					// Gets the value for blnRequiredFlag 
					// @return boolean
					return $this->blnRequiredFlag;

				case 'InternalFlag':
					// Gets the value for blnInternalFlag 
					// @return boolean
					return $this->blnInternalFlag;

				case 'Options':
					// Gets the value for strOptions 
					// @return string
					return $this->strOptions;

				case 'AllowOtherFlag':
					// Gets the value for blnAllowOtherFlag 
					// @return boolean
					return $this->blnAllowOtherFlag;

				case 'ViewFlag':
					// Gets the value for blnViewFlag 
					// @return boolean
					return $this->blnViewFlag;


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupForm':
					// Gets the value for the SignupForm object referenced by intSignupFormId (Not Null)
					// @return SignupForm
					try {
						if ((!$this->objSignupForm) && (!is_null($this->intSignupFormId)))
							$this->objSignupForm = SignupForm::Load($this->intSignupFormId);
						return $this->objSignupForm;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_FormAnswer':
					// Gets the value for the private _objFormAnswer (Read-Only)
					// if set due to an expansion on the form_answer.form_question_id reverse relationship
					// @return FormAnswer
					return $this->_objFormAnswer;

				case '_FormAnswerArray':
					// Gets the value for the private _objFormAnswerArray (Read-Only)
					// if set due to an ExpandAsArray on the form_answer.form_question_id reverse relationship
					// @return FormAnswer[]
					return (array) $this->_objFormAnswerArray;


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
					// Sets the value for intSignupFormId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objSignupForm = null;
						return ($this->intSignupFormId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrderNumber':
					// Sets the value for intOrderNumber 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intOrderNumber = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormQuestionTypeId':
					// Sets the value for intFormQuestionTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intFormQuestionTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ShortDescription':
					// Sets the value for strShortDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strShortDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Question':
					// Sets the value for strQuestion 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strQuestion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RequiredFlag':
					// Sets the value for blnRequiredFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnRequiredFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'InternalFlag':
					// Sets the value for blnInternalFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnInternalFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Options':
					// Sets the value for strOptions 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strOptions = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AllowOtherFlag':
					// Sets the value for blnAllowOtherFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnAllowOtherFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ViewFlag':
					// Sets the value for blnViewFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnViewFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'SignupForm':
					// Sets the value for the SignupForm object referenced by intSignupFormId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved SignupForm for this FormQuestion');

						// Update Local Member Variables
						$this->objSignupForm = $mixValue;
						$this->intSignupFormId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for FormAnswer
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FormAnswers as an array of FormAnswer objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormAnswer[]
		*/ 
		public function GetFormAnswerArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FormAnswer::LoadArrayByFormQuestionId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FormAnswers
		 * @return int
		*/ 
		public function CountFormAnswers() {
			if ((is_null($this->intId)))
				return 0;

			return FormAnswer::CountByFormQuestionId($this->intId);
		}

		/**
		 * Associates a FormAnswer
		 * @param FormAnswer $objFormAnswer
		 * @return void
		*/ 
		public function AssociateFormAnswer(FormAnswer $objFormAnswer) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFormAnswer on this unsaved FormQuestion.');
			if ((is_null($objFormAnswer->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFormAnswer on this FormQuestion with an unsaved FormAnswer.');

			// Get the Database Object for this Class
			$objDatabase = FormQuestion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_answer`
				SET
					`form_question_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormAnswer->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objFormAnswer->FormQuestionId = $this->intId;
				$objFormAnswer->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a FormAnswer
		 * @param FormAnswer $objFormAnswer
		 * @return void
		*/ 
		public function UnassociateFormAnswer(FormAnswer $objFormAnswer) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved FormQuestion.');
			if ((is_null($objFormAnswer->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this FormQuestion with an unsaved FormAnswer.');

			// Get the Database Object for this Class
			$objDatabase = FormQuestion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_answer`
				SET
					`form_question_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormAnswer->Id) . ' AND
					`form_question_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objFormAnswer->FormQuestionId = null;
				$objFormAnswer->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all FormAnswers
		 * @return void
		*/ 
		public function UnassociateAllFormAnswers() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved FormQuestion.');

			// Get the Database Object for this Class
			$objDatabase = FormQuestion::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (FormAnswer::LoadArrayByFormQuestionId($this->intId) as $objFormAnswer) {
					$objFormAnswer->FormQuestionId = null;
					$objFormAnswer->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`form_answer`
				SET
					`form_question_id` = null
				WHERE
					`form_question_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FormAnswer
		 * @param FormAnswer $objFormAnswer
		 * @return void
		*/ 
		public function DeleteAssociatedFormAnswer(FormAnswer $objFormAnswer) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved FormQuestion.');
			if ((is_null($objFormAnswer->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this FormQuestion with an unsaved FormAnswer.');

			// Get the Database Object for this Class
			$objDatabase = FormQuestion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_answer`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFormAnswer->Id) . ' AND
					`form_question_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objFormAnswer->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated FormAnswers
		 * @return void
		*/ 
		public function DeleteAllFormAnswers() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFormAnswer on this unsaved FormQuestion.');

			// Get the Database Object for this Class
			$objDatabase = FormQuestion::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (FormAnswer::LoadArrayByFormQuestionId($this->intId) as $objFormAnswer) {
					$objFormAnswer->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`form_answer`
				WHERE
					`form_question_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="FormQuestion"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="SignupForm" type="xsd1:SignupForm"/>';
			$strToReturn .= '<element name="OrderNumber" type="xsd:int"/>';
			$strToReturn .= '<element name="FormQuestionTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="ShortDescription" type="xsd:string"/>';
			$strToReturn .= '<element name="Question" type="xsd:string"/>';
			$strToReturn .= '<element name="RequiredFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="InternalFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Options" type="xsd:string"/>';
			$strToReturn .= '<element name="AllowOtherFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ViewFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FormQuestion', $strComplexTypeArray)) {
				$strComplexTypeArray['FormQuestion'] = FormQuestion::GetSoapComplexTypeXml();
				SignupForm::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FormQuestion::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FormQuestion();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'SignupForm')) &&
				($objSoapObject->SignupForm))
				$objToReturn->SignupForm = SignupForm::GetObjectFromSoapObject($objSoapObject->SignupForm);
			if (property_exists($objSoapObject, 'OrderNumber'))
				$objToReturn->intOrderNumber = $objSoapObject->OrderNumber;
			if (property_exists($objSoapObject, 'FormQuestionTypeId'))
				$objToReturn->intFormQuestionTypeId = $objSoapObject->FormQuestionTypeId;
			if (property_exists($objSoapObject, 'ShortDescription'))
				$objToReturn->strShortDescription = $objSoapObject->ShortDescription;
			if (property_exists($objSoapObject, 'Question'))
				$objToReturn->strQuestion = $objSoapObject->Question;
			if (property_exists($objSoapObject, 'RequiredFlag'))
				$objToReturn->blnRequiredFlag = $objSoapObject->RequiredFlag;
			if (property_exists($objSoapObject, 'InternalFlag'))
				$objToReturn->blnInternalFlag = $objSoapObject->InternalFlag;
			if (property_exists($objSoapObject, 'Options'))
				$objToReturn->strOptions = $objSoapObject->Options;
			if (property_exists($objSoapObject, 'AllowOtherFlag'))
				$objToReturn->blnAllowOtherFlag = $objSoapObject->AllowOtherFlag;
			if (property_exists($objSoapObject, 'ViewFlag'))
				$objToReturn->blnViewFlag = $objSoapObject->ViewFlag;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FormQuestion::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSignupForm)
				$objObject->objSignupForm = SignupForm::GetSoapObjectFromObject($objObject->objSignupForm, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSignupFormId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $SignupFormId
	 * @property-read QQNodeSignupForm $SignupForm
	 * @property-read QQNode $OrderNumber
	 * @property-read QQNode $FormQuestionTypeId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $Question
	 * @property-read QQNode $RequiredFlag
	 * @property-read QQNode $InternalFlag
	 * @property-read QQNode $Options
	 * @property-read QQNode $AllowOtherFlag
	 * @property-read QQNode $ViewFlag
	 * @property-read QQReverseReferenceNodeFormAnswer $FormAnswer
	 */
	class QQNodeFormQuestion extends QQNode {
		protected $strTableName = 'form_question';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FormQuestion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupFormId':
					return new QQNode('signup_form_id', 'SignupFormId', 'integer', $this);
				case 'SignupForm':
					return new QQNodeSignupForm('signup_form_id', 'SignupForm', 'integer', $this);
				case 'OrderNumber':
					return new QQNode('order_number', 'OrderNumber', 'integer', $this);
				case 'FormQuestionTypeId':
					return new QQNode('form_question_type_id', 'FormQuestionTypeId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'Question':
					return new QQNode('question', 'Question', 'string', $this);
				case 'RequiredFlag':
					return new QQNode('required_flag', 'RequiredFlag', 'boolean', $this);
				case 'InternalFlag':
					return new QQNode('internal_flag', 'InternalFlag', 'boolean', $this);
				case 'Options':
					return new QQNode('options', 'Options', 'string', $this);
				case 'AllowOtherFlag':
					return new QQNode('allow_other_flag', 'AllowOtherFlag', 'boolean', $this);
				case 'ViewFlag':
					return new QQNode('view_flag', 'ViewFlag', 'boolean', $this);
				case 'FormAnswer':
					return new QQReverseReferenceNodeFormAnswer($this, 'formanswer', 'reverse_reference', 'form_question_id');

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
	 * @property-read QQNode $SignupFormId
	 * @property-read QQNodeSignupForm $SignupForm
	 * @property-read QQNode $OrderNumber
	 * @property-read QQNode $FormQuestionTypeId
	 * @property-read QQNode $ShortDescription
	 * @property-read QQNode $Question
	 * @property-read QQNode $RequiredFlag
	 * @property-read QQNode $InternalFlag
	 * @property-read QQNode $Options
	 * @property-read QQNode $AllowOtherFlag
	 * @property-read QQNode $ViewFlag
	 * @property-read QQReverseReferenceNodeFormAnswer $FormAnswer
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeFormQuestion extends QQReverseReferenceNode {
		protected $strTableName = 'form_question';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FormQuestion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'SignupFormId':
					return new QQNode('signup_form_id', 'SignupFormId', 'integer', $this);
				case 'SignupForm':
					return new QQNodeSignupForm('signup_form_id', 'SignupForm', 'integer', $this);
				case 'OrderNumber':
					return new QQNode('order_number', 'OrderNumber', 'integer', $this);
				case 'FormQuestionTypeId':
					return new QQNode('form_question_type_id', 'FormQuestionTypeId', 'integer', $this);
				case 'ShortDescription':
					return new QQNode('short_description', 'ShortDescription', 'string', $this);
				case 'Question':
					return new QQNode('question', 'Question', 'string', $this);
				case 'RequiredFlag':
					return new QQNode('required_flag', 'RequiredFlag', 'boolean', $this);
				case 'InternalFlag':
					return new QQNode('internal_flag', 'InternalFlag', 'boolean', $this);
				case 'Options':
					return new QQNode('options', 'Options', 'string', $this);
				case 'AllowOtherFlag':
					return new QQNode('allow_other_flag', 'AllowOtherFlag', 'boolean', $this);
				case 'ViewFlag':
					return new QQNode('view_flag', 'ViewFlag', 'boolean', $this);
				case 'FormAnswer':
					return new QQReverseReferenceNodeFormAnswer($this, 'formanswer', 'reverse_reference', 'form_question_id');

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