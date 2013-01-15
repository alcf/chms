<?php
	require(__DATAGEN_CLASSES__ . '/MembershipGen.class.php');

	/**
	 * The Membership class defined here contains any
	 * customized code for the Membership class in the
	 * Object Relational Model.  It represents the "membership" table 
	 * in the database, and extends from the code generated abstract MembershipGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class Membership extends MembershipGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objMembership->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Membership Object %s',  $this->intId);
		}

		/**
		 * This checks to make sure the start and optional end date presents a "valid" membership
		 * period, given all the other periods associated with this individual.
		 * 
		 * So if it has no end date (e.g. it is a current membership), then this start date must be later than
		 * the end date of the most reent membership period.
		 * 
		 * If there is a start date and an end date, it must be a period that does not overlap any other periods
		 * @return boolean returns TRUE if there IS a conflict
		 */
		public function IsDatesConflict() {
			// Make sure the DateEnd is after DateStart (if applicable)
			if ($this->dttDateEnd &&
				($this->dttDateEnd->IsEarlierOrEqualTo($this->dttDateStart)))
				return true;

			// Get the Other Membership Records for This Person
			$objMembershipArrayTemp = $this->Person->GetMembershipArray(QQ::OrderBy(QQN::Membership()->DateStart));

			// Let's "take out" this current membership from MembershipArray (if applicable) to make sure
			// our conflict checking is accurate
			$objMembershipArray = array();
			foreach ($objMembershipArrayTemp as $objMembership)
				if ($objMembership->Id != $this->intId) $objMembershipArray[] = $objMembership;

			// If no memberships, then by definition we have no conflict... yay!
			if (count($objMembershipArray) == 0)
				return false;

			// Get the "most Recent membership"
			$objMostRecentMembership = $objMembershipArray[count($objMembershipArray) - 1];

			// Test the simple case -- we are attempting to be a "current" membership period that has no end date
			if (!$this->dttDateEnd) {
				// If the most recent membership has NOT ended, we have a conflict
				if (!$objMostRecentMembership->DateEnd)
					return true;

				// No current membership -- let's go ahead and make sure this now "current" membership is later than the rest
				if ($objMostRecentMembership->DateEnd->IsEarlierThan($this->dttDateStart))
					return false;
				else
					return true;
			}

			// We are attempting to be a closed membership that has a start and end date -- make sure it doesn't conflict with any other period

			// Is the most recent membership a current membership?
			if (!$objMostRecentMembership->DateEnd) {
				// If so, then this membership we are checking cannot be after the Most Recent Membership
				if ($this->dttDateStart->IsLaterOrEqualTo($objMostRecentMembership->DateStart) ||
					$this->dttDateEnd->IsLaterOrEqualTo($objMostRecentMembership->DateStart))
					return true;
			}

			// Go through all the memberships and make sure we don't have any conflicts
			foreach ($objMembershipArray as $objMembership) {
				// Both start and end date must be completely before the start date of the membership we're iterating through
				// AND completele AFTER the end date of the membership we're iterating through
				if ($objMembership->DateEnd) {
					if (($this->dttDateStart->IsEarlierThan($objMembership->DateStart) && $this->dttDateEnd->IsEarlierThan($objMembership->DateStart)) ||
						($this->dttDateStart->IsLaterThan($objMembership->DateEnd) && $this->dttDateEnd->IsLaterThan($objMembership->DateEnd))) {
						// Do nothing -- so far so good
					} else {
						// conflict found
						return true;
					}
				} else {
					if ($this->dttDateStart->IsEarlierThan($objMembership->DateStart) && $this->dttDateEnd->IsEarlierThan($objMembership->DateStart)) {
						// Do nothing -- so far so good
					} else {
						// conflict found
						return true;
					}
				}
			}

			// If we've made it here, then no conflicts were found
			return false;
		}

		public static function CountArrayByStartDateRange($dttAfterDateStart, $dttBeforeDateStart, $objOptionalClauses = null) {
			// This will return an array of Membership objects
			return Membership::QueryCount(
			QQ::AndCondition(
			QQ::GreaterOrEqual(QQN::Membership()->DateStart, $dttAfterDateStart),
			QQ::LessOrEqual(QQN::Membership()->DateStart, $dttBeforeDateStart)
			),
			$objOptionalClauses
			);
		}
		
		public static function LoadArrayByStartDateRange($dttAfterDateStart, $dttBeforeDateStart, $objOptionalClauses = null) {
			// This will return an array of Membership objects
			return Membership::QueryArray(
			QQ::AndCondition(
			QQ::GreaterOrEqual(QQN::Membership()->DateStart, $dttAfterDateStart),
			QQ::LessOrEqual(QQN::Membership()->DateStart, $dttBeforeDateStart)
			),
			$objOptionalClauses
			);
		}
		
		public static function LoadArrayByEndDateRange($dttAfterDateStart, $dttBeforeDateStart, $objOptionalClauses = null) {
			// This will return an array of Membership objects
			return Membership::QueryArray(
			QQ::AndCondition(
			QQ::GreaterOrEqual(QQN::Membership()->DateEnd, $dttAfterDateStart),
			QQ::LessOrEqual(QQN::Membership()->DateEnd, $dttBeforeDateStart)
			),
			$objOptionalClauses
			);
		}
		
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Membership objects
			return Membership::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Membership()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Membership()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Membership object
			return Membership::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Membership()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Membership()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Membership objects
			return Membership::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Membership()->Param1, $strParam1),
					QQ::Equal(QQN::Membership()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Membership::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`membership`.*
				FROM
					`membership` AS `membership`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Membership::InstantiateDbResult($objDbResult);
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