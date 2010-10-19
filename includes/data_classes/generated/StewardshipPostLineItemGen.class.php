<?php
	/**
	 * The abstract StewardshipPostLineItemGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the StewardshipPostLineItem subclass which
	 * extends this StewardshipPostLineItemGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StewardshipPostLineItem class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $StewardshipPostId the value for intStewardshipPostId (Not Null)
	 * @property integer $StewardshipContributionId the value for intStewardshipContributionId (Not Null)
	 * @property integer $PersonId the value for intPersonId (Not Null)
	 * @property integer $StewardshipFundId the value for intStewardshipFundId (Not Null)
	 * @property string $Description the value for strDescription 
	 * @property double $Amount the value for fltAmount 
	 * @property StewardshipPost $StewardshipPost the value for the StewardshipPost object referenced by intStewardshipPostId (Not Null)
	 * @property StewardshipContribution $StewardshipContribution the value for the StewardshipContribution object referenced by intStewardshipContributionId (Not Null)
	 * @property Person $Person the value for the Person object referenced by intPersonId (Not Null)
	 * @property StewardshipFund $StewardshipFund the value for the StewardshipFund object referenced by intStewardshipFundId (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class StewardshipPostLineItemGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column stewardship_post_line_item.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post_line_item.stewardship_post_id
		 * @var integer intStewardshipPostId
		 */
		protected $intStewardshipPostId;
		const StewardshipPostIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post_line_item.stewardship_contribution_id
		 * @var integer intStewardshipContributionId
		 */
		protected $intStewardshipContributionId;
		const StewardshipContributionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post_line_item.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post_line_item.stewardship_fund_id
		 * @var integer intStewardshipFundId
		 */
		protected $intStewardshipFundId;
		const StewardshipFundIdDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post_line_item.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 255;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column stewardship_post_line_item.amount
		 * @var double fltAmount
		 */
		protected $fltAmount;
		const AmountDefault = null;


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
		 * in the database column stewardship_post_line_item.stewardship_post_id.
		 *
		 * NOTE: Always use the StewardshipPost property getter to correctly retrieve this StewardshipPost object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipPost objStewardshipPost
		 */
		protected $objStewardshipPost;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column stewardship_post_line_item.stewardship_contribution_id.
		 *
		 * NOTE: Always use the StewardshipContribution property getter to correctly retrieve this StewardshipContribution object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipContribution objStewardshipContribution
		 */
		protected $objStewardshipContribution;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column stewardship_post_line_item.person_id.
		 *
		 * NOTE: Always use the Person property getter to correctly retrieve this Person object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Person objPerson
		 */
		protected $objPerson;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column stewardship_post_line_item.stewardship_fund_id.
		 *
		 * NOTE: Always use the StewardshipFund property getter to correctly retrieve this StewardshipFund object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var StewardshipFund objStewardshipFund
		 */
		protected $objStewardshipFund;





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
		 * Load a StewardshipPostLineItem from PK Info
		 * @param integer $intId
		 * @return StewardshipPostLineItem
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return StewardshipPostLineItem::QuerySingle(
				QQ::Equal(QQN::StewardshipPostLineItem()->Id, $intId)
			);
		}

		/**
		 * Load all StewardshipPostLineItems
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPostLineItem[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call StewardshipPostLineItem::QueryArray to perform the LoadAll query
			try {
				return StewardshipPostLineItem::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all StewardshipPostLineItems
		 * @return int
		 */
		public static function CountAll() {
			// Call StewardshipPostLineItem::QueryCount to perform the CountAll query
			return StewardshipPostLineItem::QueryCount(QQ::All());
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
			$objDatabase = StewardshipPostLineItem::GetDatabase();

			// Create/Build out the QueryBuilder object with StewardshipPostLineItem-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'stewardship_post_line_item');
			StewardshipPostLineItem::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('stewardship_post_line_item');

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
		 * Static Qcodo Query method to query for a single StewardshipPostLineItem object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipPostLineItem the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPostLineItem::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new StewardshipPostLineItem object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = StewardshipPostLineItem::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return StewardshipPostLineItem::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of StewardshipPostLineItem objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StewardshipPostLineItem[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPostLineItem::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return StewardshipPostLineItem::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = StewardshipPostLineItem::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of StewardshipPostLineItem objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StewardshipPostLineItem::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = StewardshipPostLineItem::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'stewardship_post_line_item_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with StewardshipPostLineItem-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				StewardshipPostLineItem::GetSelectFields($objQueryBuilder);
				StewardshipPostLineItem::GetFromFields($objQueryBuilder);

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
			return StewardshipPostLineItem::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this StewardshipPostLineItem
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'stewardship_post_line_item';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_post_id', $strAliasPrefix . 'stewardship_post_id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_contribution_id', $strAliasPrefix . 'stewardship_contribution_id');
			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_fund_id', $strAliasPrefix . 'stewardship_fund_id');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'amount', $strAliasPrefix . 'amount');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a StewardshipPostLineItem from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this StewardshipPostLineItem::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipPostLineItem
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the StewardshipPostLineItem object
			$objToReturn = new StewardshipPostLineItem();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_post_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_post_id'] : $strAliasPrefix . 'stewardship_post_id';
			$objToReturn->intStewardshipPostId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_contribution_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_contribution_id'] : $strAliasPrefix . 'stewardship_contribution_id';
			$objToReturn->intStewardshipContributionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_fund_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_fund_id'] : $strAliasPrefix . 'stewardship_fund_id';
			$objToReturn->intStewardshipFundId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'amount'] : $strAliasPrefix . 'amount';
			$objToReturn->fltAmount = $objDbRow->GetColumn($strAliasName, 'Float');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'stewardship_post_line_item__';

			// Check for StewardshipPost Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_post_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipPost = StewardshipPost::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_post_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StewardshipContribution Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_contribution_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipContribution = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_contribution_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Person Early Binding
			$strAlias = $strAliasPrefix . 'person_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StewardshipFund Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_fund_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipFund = StewardshipFund::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_fund_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of StewardshipPostLineItems from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return StewardshipPostLineItem[]
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
					$objItem = StewardshipPostLineItem::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = StewardshipPostLineItem::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single StewardshipPostLineItem object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return StewardshipPostLineItem next row resulting from the query
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
			return StewardshipPostLineItem::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single StewardshipPostLineItem object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return StewardshipPostLineItem
		*/
		public static function LoadById($intId) {
			return StewardshipPostLineItem::QuerySingle(
				QQ::Equal(QQN::StewardshipPostLineItem()->Id, $intId)
			);
		}
			
		/**
		 * Load an array of StewardshipPostLineItem objects,
		 * by StewardshipPostId Index(es)
		 * @param integer $intStewardshipPostId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPostLineItem[]
		*/
		public static function LoadArrayByStewardshipPostId($intStewardshipPostId, $objOptionalClauses = null) {
			// Call StewardshipPostLineItem::QueryArray to perform the LoadArrayByStewardshipPostId query
			try {
				return StewardshipPostLineItem::QueryArray(
					QQ::Equal(QQN::StewardshipPostLineItem()->StewardshipPostId, $intStewardshipPostId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipPostLineItems
		 * by StewardshipPostId Index(es)
		 * @param integer $intStewardshipPostId
		 * @return int
		*/
		public static function CountByStewardshipPostId($intStewardshipPostId) {
			// Call StewardshipPostLineItem::QueryCount to perform the CountByStewardshipPostId query
			return StewardshipPostLineItem::QueryCount(
				QQ::Equal(QQN::StewardshipPostLineItem()->StewardshipPostId, $intStewardshipPostId)
			);
		}
			
		/**
		 * Load an array of StewardshipPostLineItem objects,
		 * by StewardshipContributionId Index(es)
		 * @param integer $intStewardshipContributionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPostLineItem[]
		*/
		public static function LoadArrayByStewardshipContributionId($intStewardshipContributionId, $objOptionalClauses = null) {
			// Call StewardshipPostLineItem::QueryArray to perform the LoadArrayByStewardshipContributionId query
			try {
				return StewardshipPostLineItem::QueryArray(
					QQ::Equal(QQN::StewardshipPostLineItem()->StewardshipContributionId, $intStewardshipContributionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipPostLineItems
		 * by StewardshipContributionId Index(es)
		 * @param integer $intStewardshipContributionId
		 * @return int
		*/
		public static function CountByStewardshipContributionId($intStewardshipContributionId) {
			// Call StewardshipPostLineItem::QueryCount to perform the CountByStewardshipContributionId query
			return StewardshipPostLineItem::QueryCount(
				QQ::Equal(QQN::StewardshipPostLineItem()->StewardshipContributionId, $intStewardshipContributionId)
			);
		}
			
		/**
		 * Load an array of StewardshipPostLineItem objects,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPostLineItem[]
		*/
		public static function LoadArrayByPersonId($intPersonId, $objOptionalClauses = null) {
			// Call StewardshipPostLineItem::QueryArray to perform the LoadArrayByPersonId query
			try {
				return StewardshipPostLineItem::QueryArray(
					QQ::Equal(QQN::StewardshipPostLineItem()->PersonId, $intPersonId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipPostLineItems
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return int
		*/
		public static function CountByPersonId($intPersonId) {
			// Call StewardshipPostLineItem::QueryCount to perform the CountByPersonId query
			return StewardshipPostLineItem::QueryCount(
				QQ::Equal(QQN::StewardshipPostLineItem()->PersonId, $intPersonId)
			);
		}
			
		/**
		 * Load an array of StewardshipPostLineItem objects,
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPostLineItem[]
		*/
		public static function LoadArrayByStewardshipFundId($intStewardshipFundId, $objOptionalClauses = null) {
			// Call StewardshipPostLineItem::QueryArray to perform the LoadArrayByStewardshipFundId query
			try {
				return StewardshipPostLineItem::QueryArray(
					QQ::Equal(QQN::StewardshipPostLineItem()->StewardshipFundId, $intStewardshipFundId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StewardshipPostLineItems
		 * by StewardshipFundId Index(es)
		 * @param integer $intStewardshipFundId
		 * @return int
		*/
		public static function CountByStewardshipFundId($intStewardshipFundId) {
			// Call StewardshipPostLineItem::QueryCount to perform the CountByStewardshipFundId query
			return StewardshipPostLineItem::QueryCount(
				QQ::Equal(QQN::StewardshipPostLineItem()->StewardshipFundId, $intStewardshipFundId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this StewardshipPostLineItem
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPostLineItem::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `stewardship_post_line_item` (
							`stewardship_post_id`,
							`stewardship_contribution_id`,
							`person_id`,
							`stewardship_fund_id`,
							`description`,
							`amount`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intStewardshipPostId) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipContributionId) . ',
							' . $objDatabase->SqlVariable($this->intPersonId) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->fltAmount) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('stewardship_post_line_item', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`stewardship_post_line_item`
						SET
							`stewardship_post_id` = ' . $objDatabase->SqlVariable($this->intStewardshipPostId) . ',
							`stewardship_contribution_id` = ' . $objDatabase->SqlVariable($this->intStewardshipContributionId) . ',
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . ',
							`stewardship_fund_id` = ' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`amount` = ' . $objDatabase->SqlVariable($this->fltAmount) . '
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
		 * Delete this StewardshipPostLineItem
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this StewardshipPostLineItem with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = StewardshipPostLineItem::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_line_item`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all StewardshipPostLineItems
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPostLineItem::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_post_line_item`');
		}

		/**
		 * Truncate stewardship_post_line_item table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = StewardshipPostLineItem::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `stewardship_post_line_item`');
		}

		/**
		 * Reload this StewardshipPostLineItem from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved StewardshipPostLineItem object.');

			// Reload the Object
			$objReloaded = StewardshipPostLineItem::Load($this->intId);

			// Update $this's local variables to match
			$this->StewardshipPostId = $objReloaded->StewardshipPostId;
			$this->StewardshipContributionId = $objReloaded->StewardshipContributionId;
			$this->PersonId = $objReloaded->PersonId;
			$this->StewardshipFundId = $objReloaded->StewardshipFundId;
			$this->strDescription = $objReloaded->strDescription;
			$this->fltAmount = $objReloaded->fltAmount;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = StewardshipPostLineItem::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `stewardship_post_line_item` (
					`id`,
					`stewardship_post_id`,
					`stewardship_contribution_id`,
					`person_id`,
					`stewardship_fund_id`,
					`description`,
					`amount`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intStewardshipPostId) . ',
					' . $objDatabase->SqlVariable($this->intStewardshipContributionId) . ',
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->intStewardshipFundId) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
					' . $objDatabase->SqlVariable($this->fltAmount) . ',
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
		 * @return StewardshipPostLineItem[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = StewardshipPostLineItem::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM stewardship_post_line_item WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return StewardshipPostLineItem::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return StewardshipPostLineItem[]
		 */
		public function GetJournal() {
			return StewardshipPostLineItem::GetJournalForId($this->intId);
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

				case 'StewardshipPostId':
					// Gets the value for intStewardshipPostId (Not Null)
					// @return integer
					return $this->intStewardshipPostId;

				case 'StewardshipContributionId':
					// Gets the value for intStewardshipContributionId (Not Null)
					// @return integer
					return $this->intStewardshipContributionId;

				case 'PersonId':
					// Gets the value for intPersonId (Not Null)
					// @return integer
					return $this->intPersonId;

				case 'StewardshipFundId':
					// Gets the value for intStewardshipFundId (Not Null)
					// @return integer
					return $this->intStewardshipFundId;

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;

				case 'Amount':
					// Gets the value for fltAmount 
					// @return double
					return $this->fltAmount;


				///////////////////
				// Member Objects
				///////////////////
				case 'StewardshipPost':
					// Gets the value for the StewardshipPost object referenced by intStewardshipPostId (Not Null)
					// @return StewardshipPost
					try {
						if ((!$this->objStewardshipPost) && (!is_null($this->intStewardshipPostId)))
							$this->objStewardshipPost = StewardshipPost::Load($this->intStewardshipPostId);
						return $this->objStewardshipPost;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipContribution':
					// Gets the value for the StewardshipContribution object referenced by intStewardshipContributionId (Not Null)
					// @return StewardshipContribution
					try {
						if ((!$this->objStewardshipContribution) && (!is_null($this->intStewardshipContributionId)))
							$this->objStewardshipContribution = StewardshipContribution::Load($this->intStewardshipContributionId);
						return $this->objStewardshipContribution;
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

				case 'StewardshipFund':
					// Gets the value for the StewardshipFund object referenced by intStewardshipFundId (Not Null)
					// @return StewardshipFund
					try {
						if ((!$this->objStewardshipFund) && (!is_null($this->intStewardshipFundId)))
							$this->objStewardshipFund = StewardshipFund::Load($this->intStewardshipFundId);
						return $this->objStewardshipFund;
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
				case 'StewardshipPostId':
					// Sets the value for intStewardshipPostId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipPost = null;
						return ($this->intStewardshipPostId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipContributionId':
					// Sets the value for intStewardshipContributionId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipContribution = null;
						return ($this->intStewardshipContributionId = QType::Cast($mixValue, QType::Integer));
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

				case 'StewardshipFundId':
					// Sets the value for intStewardshipFundId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipFund = null;
						return ($this->intStewardshipFundId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Description':
					// Sets the value for strDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Amount':
					// Sets the value for fltAmount 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltAmount = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'StewardshipPost':
					// Sets the value for the StewardshipPost object referenced by intStewardshipPostId (Not Null)
					// @param StewardshipPost $mixValue
					// @return StewardshipPost
					if (is_null($mixValue)) {
						$this->intStewardshipPostId = null;
						$this->objStewardshipPost = null;
						return null;
					} else {
						// Make sure $mixValue actually is a StewardshipPost object
						try {
							$mixValue = QType::Cast($mixValue, 'StewardshipPost');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED StewardshipPost object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved StewardshipPost for this StewardshipPostLineItem');

						// Update Local Member Variables
						$this->objStewardshipPost = $mixValue;
						$this->intStewardshipPostId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'StewardshipContribution':
					// Sets the value for the StewardshipContribution object referenced by intStewardshipContributionId (Not Null)
					// @param StewardshipContribution $mixValue
					// @return StewardshipContribution
					if (is_null($mixValue)) {
						$this->intStewardshipContributionId = null;
						$this->objStewardshipContribution = null;
						return null;
					} else {
						// Make sure $mixValue actually is a StewardshipContribution object
						try {
							$mixValue = QType::Cast($mixValue, 'StewardshipContribution');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED StewardshipContribution object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved StewardshipContribution for this StewardshipPostLineItem');

						// Update Local Member Variables
						$this->objStewardshipContribution = $mixValue;
						$this->intStewardshipContributionId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Person for this StewardshipPostLineItem');

						// Update Local Member Variables
						$this->objPerson = $mixValue;
						$this->intPersonId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'StewardshipFund':
					// Sets the value for the StewardshipFund object referenced by intStewardshipFundId (Not Null)
					// @param StewardshipFund $mixValue
					// @return StewardshipFund
					if (is_null($mixValue)) {
						$this->intStewardshipFundId = null;
						$this->objStewardshipFund = null;
						return null;
					} else {
						// Make sure $mixValue actually is a StewardshipFund object
						try {
							$mixValue = QType::Cast($mixValue, 'StewardshipFund');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED StewardshipFund object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved StewardshipFund for this StewardshipPostLineItem');

						// Update Local Member Variables
						$this->objStewardshipFund = $mixValue;
						$this->intStewardshipFundId = $mixValue->Id;

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
			$strToReturn = '<complexType name="StewardshipPostLineItem"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="StewardshipPost" type="xsd1:StewardshipPost"/>';
			$strToReturn .= '<element name="StewardshipContribution" type="xsd1:StewardshipContribution"/>';
			$strToReturn .= '<element name="Person" type="xsd1:Person"/>';
			$strToReturn .= '<element name="StewardshipFund" type="xsd1:StewardshipFund"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="Amount" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('StewardshipPostLineItem', $strComplexTypeArray)) {
				$strComplexTypeArray['StewardshipPostLineItem'] = StewardshipPostLineItem::GetSoapComplexTypeXml();
				StewardshipPost::AlterSoapComplexTypeArray($strComplexTypeArray);
				StewardshipContribution::AlterSoapComplexTypeArray($strComplexTypeArray);
				Person::AlterSoapComplexTypeArray($strComplexTypeArray);
				StewardshipFund::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, StewardshipPostLineItem::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new StewardshipPostLineItem();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'StewardshipPost')) &&
				($objSoapObject->StewardshipPost))
				$objToReturn->StewardshipPost = StewardshipPost::GetObjectFromSoapObject($objSoapObject->StewardshipPost);
			if ((property_exists($objSoapObject, 'StewardshipContribution')) &&
				($objSoapObject->StewardshipContribution))
				$objToReturn->StewardshipContribution = StewardshipContribution::GetObjectFromSoapObject($objSoapObject->StewardshipContribution);
			if ((property_exists($objSoapObject, 'Person')) &&
				($objSoapObject->Person))
				$objToReturn->Person = Person::GetObjectFromSoapObject($objSoapObject->Person);
			if ((property_exists($objSoapObject, 'StewardshipFund')) &&
				($objSoapObject->StewardshipFund))
				$objToReturn->StewardshipFund = StewardshipFund::GetObjectFromSoapObject($objSoapObject->StewardshipFund);
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'Amount'))
				$objToReturn->fltAmount = $objSoapObject->Amount;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, StewardshipPostLineItem::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objStewardshipPost)
				$objObject->objStewardshipPost = StewardshipPost::GetSoapObjectFromObject($objObject->objStewardshipPost, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipPostId = null;
			if ($objObject->objStewardshipContribution)
				$objObject->objStewardshipContribution = StewardshipContribution::GetSoapObjectFromObject($objObject->objStewardshipContribution, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipContributionId = null;
			if ($objObject->objPerson)
				$objObject->objPerson = Person::GetSoapObjectFromObject($objObject->objPerson, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPersonId = null;
			if ($objObject->objStewardshipFund)
				$objObject->objStewardshipFund = StewardshipFund::GetSoapObjectFromObject($objObject->objStewardshipFund, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipFundId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $StewardshipPostId
	 * @property-read QQNodeStewardshipPost $StewardshipPost
	 * @property-read QQNode $StewardshipContributionId
	 * @property-read QQNodeStewardshipContribution $StewardshipContribution
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $StewardshipFundId
	 * @property-read QQNodeStewardshipFund $StewardshipFund
	 * @property-read QQNode $Description
	 * @property-read QQNode $Amount
	 */
	class QQNodeStewardshipPostLineItem extends QQNode {
		protected $strTableName = 'stewardship_post_line_item';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipPostLineItem';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'StewardshipPostId':
					return new QQNode('stewardship_post_id', 'StewardshipPostId', 'integer', $this);
				case 'StewardshipPost':
					return new QQNodeStewardshipPost('stewardship_post_id', 'StewardshipPost', 'integer', $this);
				case 'StewardshipContributionId':
					return new QQNode('stewardship_contribution_id', 'StewardshipContributionId', 'integer', $this);
				case 'StewardshipContribution':
					return new QQNodeStewardshipContribution('stewardship_contribution_id', 'StewardshipContribution', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);

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
	 * @property-read QQNode $StewardshipPostId
	 * @property-read QQNodeStewardshipPost $StewardshipPost
	 * @property-read QQNode $StewardshipContributionId
	 * @property-read QQNodeStewardshipContribution $StewardshipContribution
	 * @property-read QQNode $PersonId
	 * @property-read QQNodePerson $Person
	 * @property-read QQNode $StewardshipFundId
	 * @property-read QQNodeStewardshipFund $StewardshipFund
	 * @property-read QQNode $Description
	 * @property-read QQNode $Amount
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeStewardshipPostLineItem extends QQReverseReferenceNode {
		protected $strTableName = 'stewardship_post_line_item';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StewardshipPostLineItem';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'StewardshipPostId':
					return new QQNode('stewardship_post_id', 'StewardshipPostId', 'integer', $this);
				case 'StewardshipPost':
					return new QQNodeStewardshipPost('stewardship_post_id', 'StewardshipPost', 'integer', $this);
				case 'StewardshipContributionId':
					return new QQNode('stewardship_contribution_id', 'StewardshipContributionId', 'integer', $this);
				case 'StewardshipContribution':
					return new QQNodeStewardshipContribution('stewardship_contribution_id', 'StewardshipContribution', 'integer', $this);
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Person':
					return new QQNodePerson('person_id', 'Person', 'integer', $this);
				case 'StewardshipFundId':
					return new QQNode('stewardship_fund_id', 'StewardshipFundId', 'integer', $this);
				case 'StewardshipFund':
					return new QQNodeStewardshipFund('stewardship_fund_id', 'StewardshipFund', 'integer', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Amount':
					return new QQNode('amount', 'Amount', 'double', $this);

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