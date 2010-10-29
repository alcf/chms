<?php
	require(__DATAGEN_CLASSES__ . '/GroupCategoryGen.class.php');

	/**
	 * The GroupCategory class defined here contains any
	 * customized code for the GroupCategory class in the
	 * Object Relational Model.  It represents the "group_category" table 
	 * in the database, and extends from the code generated abstract GroupCategoryGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class GroupCategory extends GroupCategoryGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objGroupCategory->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('GroupCategory Object %s',  $this->intGroupId);
		}

		/**
		 * Called to refresh the list of participations for this GroupCategory
		 */
		public function RefreshParticipationList() {
			$fltTime = microtime(true);
			GroupParticipation::GetDatabase()->NonQuery('DELETE FROM group_participation WHERE group_id=' . $this->intGroupId);

			$objPersonArray = array();
			foreach ($this->Group->GetThisAndChildren() as $objGroup) {
				if ($objGroup->GroupTypeId != GroupType::GroupCategory) {
					foreach ($objGroup->GetGroupParticipationArray() as $objParticipation) {
						$objPersonArray[$objParticipation->PersonId] = $objParticipation->Person;
					}
				}
			}

			foreach ($objPersonArray as $objPerson) {
				$this->Group->AddPerson($objPerson, null);
			}

			$intTime = round((microtime(true) - $fltTime) * 1000);
			$this->DateRefreshed = QDateTime::Now();
			$this->ProcessTimeMs = $intTime;
			$this->Save();
		}

		public static function ForceRefreshParticipations() {
			// Force ALL to refresh participation lists by deleting the date_updated
			self::GetDatabase()->NonQuery('UPDATE group_category SET date_refreshed=NULL;');
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of GroupCategory objects
			return GroupCategory::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::GroupCategory()->Param1, $strParam1),
					QQ::GreaterThan(QQN::GroupCategory()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single GroupCategory object
			return GroupCategory::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GroupCategory()->Param1, $strParam1),
					QQ::GreaterThan(QQN::GroupCategory()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of GroupCategory objects
			return GroupCategory::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GroupCategory()->Param1, $strParam1),
					QQ::Equal(QQN::GroupCategory()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = GroupCategory::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`group_category`.*
				FROM
					`group_category` AS `group_category`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return GroupCategory::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>