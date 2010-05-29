<?php
	require(__DATAGEN_CLASSES__ . '/GroupParticipationGen.class.php');

	/**
	 * The GroupParticipation class defined here contains any
	 * customized code for the GroupParticipation class in the
	 * Object Relational Model.  It represents the "group_participation" table 
	 * in the database, and extends from the code generated abstract GroupParticipationGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class GroupParticipation extends GroupParticipationGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objGroupParticipation->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('GroupParticipation Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Dates':
					if ($this->dttDateEnd) {
						return sprintf('%s - %s', $this->dttDateStart->__toString('MMM YYYY'), $this->dttDateEnd->__toString('MMM YYYY'));
					} else {
						return sprintf('%s - Present', $this->dttDateStart->__toString('MMM YYYY'));
					}

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
		 * Given an array of start and end dates (ordered by start date)
		 * 
		 * Parameter is an array of array of dates:
		 * 	array(
		 *		array(StartDateForFirstParticipation-1, EndDateForParticipation-1),
		 *		array(StartDateForFirstParticipation-2, EndDateForParticipation-2),
		 *		array(StartDateForFirstParticipation-3, EndDateForParticipation-3),
		 *		array(StartDateForFirstParticipation-N, EndDateForParticipation-N)
		 * 	);
		 * 
		 * @param QDateTime[][] $dttDateArray
		 * @return boolean
		 */
		public static function IsValidDates($dttDateArray) {
			for ($intIndex = 0; $intIndex < count($dttDateArray); $intIndex++) {
				// Start Date must be later than previous's Start Date and End Date
				if ($intIndex > 0) {
					if ($dttDateArray[$intIndex][0]->IsEarlierThan($dttDateArray[$intIndex-1][0])) return false;
					if (!$dttDateArray[$intIndex-1][1]) return false;
					if ($dttDateArray[$intIndex][0]->IsEarlierThan($dttDateArray[$intIndex-1][1])) return false;
				}

				// End Date must be later than start date (if applicable)
				if ($dttDateArray[$intIndex][1]) {
					if ($dttDateArray[$intIndex][0]->IsLaterThan($dttDateArray[$intIndex][1])) return false;
				}
			}

			return true;
		}

		/**
		 * Retrieves an array of array of dates (which can be used for IsValidDates for a given
		 * Person, Group and GroupRole
		 * 
		 * @param integer $intPersonId
		 * @param integer $intGroupId
		 * @param integer $intGroupRoleId
		 * @return QDateTime[][]
		 */
		public static function GetParticipationDatesArrayForPersonIdGroupIdGroupRoleId($intPersonId, $intGroupId, $intGroupRoleId) {
			$objParticipationArray = GroupParticipation::QueryArray(QQ::AndCondition(
				QQ::Equal(QQN::GroupParticipation()->PersonId, $intPersonId),
				QQ::Equal(QQN::GroupParticipation()->GroupId, $intGroupId),
				QQ::Equal(QQN::GroupParticipation()->GroupRoleId, $intGroupRoleId)
			), QQ::OrderBy(QQN::GroupParticipation()->DateStart));

			$dttArrayToReturn = array();
			foreach ($objParticipationArray as $objParticipation) {
				$dttArrayToReturn[] = array($objParticipation->DateStart, $objParticipation->DateEnd);
			}

			return $dttArrayToReturn;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of GroupParticipation objects
			return GroupParticipation::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::GroupParticipation()->Param1, $strParam1),
					QQ::GreaterThan(QQN::GroupParticipation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single GroupParticipation object
			return GroupParticipation::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GroupParticipation()->Param1, $strParam1),
					QQ::GreaterThan(QQN::GroupParticipation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of GroupParticipation objects
			return GroupParticipation::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GroupParticipation()->Param1, $strParam1),
					QQ::Equal(QQN::GroupParticipation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = GroupParticipation::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`group_participation`.*
				FROM
					`group_participation` AS `group_participation`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return GroupParticipation::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;


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