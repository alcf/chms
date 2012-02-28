<?php
	require(__DATAGEN_CLASSES__ . '/ParentPagerAttendantHistoryGen.class.php');

	/**
	 * The ParentPagerAttendantHistory class defined here contains any
	 * customized code for the ParentPagerAttendantHistory class in the
	 * Object Relational Model.  It represents the "parent_pager_attendant_history" table 
	 * in the database, and extends from the code generated abstract ParentPagerAttendantHistoryGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class ParentPagerAttendantHistory extends ParentPagerAttendantHistoryGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objParentPagerAttendantHistory->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('ParentPagerAttendantHistory Object %s',  $this->intId);
		}

		/**
		 * This will create a new record or update an existing record given the MS SQL Data Row
		 * @param string[] $objRow the mssql_fetch_assoc row result from MS SQL Server
		 * @return ParentPagerAttendantHistory
		 */
		public static function CreateOrUpdateForMsSqlRow($objRow) {
			$intServerIdentifier = $objRow['lngAttendantHistoryID'];
			$intIndividualIdentifier = $objRow['lngIndividualID'];
			$intStationIdentifier = $objRow['lngStationID'];
			$intPeriodIdentifier = $objRow['lngPeriodID'];
			$intProgramIdentifier = $objRow['lngProgramID'];
			$dttDateIn = new QDateTime($objRow['dtmStartDateTime']);
			$dttDateOut = new QDateTime($objRow['dtmEndDateTime']);

			$objParentPagerAttendantHistory = ParentPagerAttendantHistory::LoadByServerIdentifier($intServerIdentifier);
			if (!$objParentPagerAttendantHistory) {
				$objParentPagerAttendantHistory = new ParentPagerAttendantHistory();
				$objParentPagerAttendantHistory->ServerIdentifier = $intServerIdentifier;
			}

			$objParentPagerAttendantHistory->ParentPagerIndividual = ParentPagerIndividual::LoadByServerIdentifier($intIndividualIdentifier);
			$objParentPagerAttendantHistory->ParentPagerStation = ParentPagerStation::LoadByServerIdentifier($intStationIdentifier);
			$objParentPagerAttendantHistory->ParentPagerPeriod = ParentPagerPeriod::LoadByServerIdentifier($intPeriodIdentifier);
			$objParentPagerAttendantHistory->ParentPagerProgram = ParentPagerProgram::LoadByServerIdentifier($intProgramIdentifier);
			$objParentPagerAttendantHistory->DateIn = $dttDateIn;
			$objParentPagerAttendantHistory->DateOut = $dttDateOut;

			$objParentPagerAttendantHistory->Save();

			return $objParentPagerAttendantHistory;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of ParentPagerAttendantHistory objects
			return ParentPagerAttendantHistory::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::ParentPagerAttendantHistory()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ParentPagerAttendantHistory()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single ParentPagerAttendantHistory object
			return ParentPagerAttendantHistory::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ParentPagerAttendantHistory()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ParentPagerAttendantHistory()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of ParentPagerAttendantHistory objects
			return ParentPagerAttendantHistory::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ParentPagerAttendantHistory()->Param1, $strParam1),
					QQ::Equal(QQN::ParentPagerAttendantHistory()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = ParentPagerAttendantHistory::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`parent_pager_attendant_history`.*
				FROM
					`parent_pager_attendant_history` AS `parent_pager_attendant_history`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return ParentPagerAttendantHistory::InstantiateDbResult($objDbResult);
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