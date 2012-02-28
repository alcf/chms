<?php
	require(__DATAGEN_CLASSES__ . '/ParentPagerChildHistoryGen.class.php');

	/**
	 * The ParentPagerChildHistory class defined here contains any
	 * customized code for the ParentPagerChildHistory class in the
	 * Object Relational Model.  It represents the "parent_pager_child_history" table 
	 * in the database, and extends from the code generated abstract ParentPagerChildHistoryGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class ParentPagerChildHistory extends ParentPagerChildHistoryGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objParentPagerChildHistory->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('ParentPagerChildHistory Object %s',  $this->intId);
		}


		/**
		 * This will create a new record or update an existing record given the MS SQL Data Row
		 * @param string[] $objRow the mssql_fetch_assoc row result from MS SQL Server
		 * @return ParentPagerChildHistory
		 */
		public static function CreateOrUpdateForMsSqlRow($objRow) {
			$intServerIdentifier = $objRow['lngChildHistoryID'];
			$intIndividualIdentifier = $objRow['lngIndividualID'];
			$intStationIdentifier = $objRow['lngStationID'];
			$intPeriodIdentifier = $objRow['lngPeriodID'];
			$intDropoffIndividualIdentifier = $objRow['lngDropOffByID'];
			$intPickupIndividualIdentifier = $objRow['lngPickupByID'];
			$dttDateIn = new QDateTime($objRow['dtmCheckInDateTime']);
			$dttDateOut = new QDateTime($objRow['dtmCheckOutDateTime']);

			$objParentPagerChildHistory = ParentPagerChildHistory::LoadByServerIdentifier($intServerIdentifier);
			if (!$objParentPagerChildHistory) {
				$objParentPagerChildHistory = new ParentPagerChildHistory();
				$objParentPagerChildHistory->ServerIdentifier = $intServerIdentifier;
			}

			$objParentPagerChildHistory->ParentPagerIndividual = ParentPagerIndividual::LoadByServerIdentifier($intIndividualIdentifier);
			$objParentPagerChildHistory->ParentPagerStation = ParentPagerStation::LoadByServerIdentifier($intStationIdentifier);
			$objParentPagerChildHistory->ParentPagerPeriod = ParentPagerPeriod::LoadByServerIdentifier($intPeriodIdentifier);
			$objParentPagerChildHistory->DropoffByParentPagerIndividual = ParentPagerIndividual::LoadByServerIdentifier($intDropoffIndividualIdentifier);
			$objParentPagerChildHistory->PickupByParentPagerIndividual = ParentPagerIndividual::LoadByServerIdentifier($intPickupIndividualIdentifier);
			$objParentPagerChildHistory->DateIn = $dttDateIn;
			$objParentPagerChildHistory->DateOut = $dttDateOut;

			$objParentPagerChildHistory->Save();

			return $objParentPagerChildHistory;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of ParentPagerChildHistory objects
			return ParentPagerChildHistory::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::ParentPagerChildHistory()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ParentPagerChildHistory()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single ParentPagerChildHistory object
			return ParentPagerChildHistory::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ParentPagerChildHistory()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ParentPagerChildHistory()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of ParentPagerChildHistory objects
			return ParentPagerChildHistory::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ParentPagerChildHistory()->Param1, $strParam1),
					QQ::Equal(QQN::ParentPagerChildHistory()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = ParentPagerChildHistory::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`parent_pager_child_history`.*
				FROM
					`parent_pager_child_history` AS `parent_pager_child_history`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return ParentPagerChildHistory::InstantiateDbResult($objDbResult);
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