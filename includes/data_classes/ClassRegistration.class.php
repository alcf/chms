<?php
	require(__DATAGEN_CLASSES__ . '/ClassRegistrationGen.class.php');

	/**
	 * The ClassRegistration class defined here contains any
	 * customized code for the ClassRegistration class in the
	 * Object Relational Model.  It represents the "class_registration" table 
	 * in the database, and extends from the code generated abstract ClassRegistrationGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class ClassRegistration extends ClassRegistrationGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objClassRegistration->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('ClassRegistration Object %s',  $this->intSignupEntryId);
		}

		public function RefreshClassAttendance() {
			$intMeetingCount = $this->ClassMeeting->GetClassMeetingCount();
			for ($intMeetingNumber = 1; $intMeetingNumber <= $intMeetingCount; $intMeetingNumber++) {
				$objAttendance = ClassAttendence::LoadByClassRegistrationIdMeetingNumber($this->intId, $intMeetingNumber);
				if (!$objAttendance) {
					$objAttendance = new ClassAttendence();
					$objAttendance->ClassRegistration = $this;
					$objAttendance->MeetingNumber = $intMeetingNumber;
					$objAttendance->Save();
				}
			}
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of ClassRegistration objects
			return ClassRegistration::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::ClassRegistration()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ClassRegistration()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single ClassRegistration object
			return ClassRegistration::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClassRegistration()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ClassRegistration()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of ClassRegistration objects
			return ClassRegistration::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ClassRegistration()->Param1, $strParam1),
					QQ::Equal(QQN::ClassRegistration()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = ClassRegistration::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`class_registration`.*
				FROM
					`class_registration` AS `class_registration`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return ClassRegistration::InstantiateDbResult($objDbResult);
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