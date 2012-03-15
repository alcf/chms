<?php
	require(__DATAGEN_CLASSES__ . '/ParentPagerIndividualGen.class.php');

	/**
	 * The ParentPagerIndividual class defined here contains any
	 * customized code for the ParentPagerIndividual class in the
	 * Object Relational Model.  It represents the "parent_pager_individual" table 
	 * in the database, and extends from the code generated abstract ParentPagerIndividualGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class ParentPagerIndividual extends ParentPagerIndividualGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objParentPagerIndividual->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('ParentPagerIndividual Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Name': return $this->strFirstName . ' ' . $this->strMiddleName . ' ' . $this->strLastName;
		
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
		 * This will create a new record or update an existing record given the MS SQL Data Row
		 * @param string[] $objRow the mssql_fetch_assoc row result from MS SQL Server
		 * @return ParentPagerIndividual
		 */
		public static function CreateOrUpdateForMsSqlRow($objRow) {
			$intServerIdentifier = $objRow['lngIndividualID'];
			$strFirstName = trim($objRow['strFirstName']);
			$strMiddleName = trim($objRow['strMiddleName']);
			$strLastName = trim($objRow['strLastName']);
			$strPrefix = trim($objRow['strPrefix']);
			$strSuffix = trim($objRow['strSuffix']);
			$strNickname = trim($objRow['strNickName']);
			$intGraduationYear = $objRow['sintGraduationYear'];
			$strDateOfBirth = trim($objRow['dtBirthDate']);
			$strGender = trim(strtoupper($objRow['chrGender']));
			if (!$strGender) $strGender = null;
			
			$strHouseholdId = trim($objRow['lngHouseholdID']);

			$objParentPagerIndividual = ParentPagerIndividual::LoadByServerIdentifier($intServerIdentifier);
			if (!$objParentPagerIndividual) {
				$objParentPagerIndividual = new ParentPagerIndividual();
				$objParentPagerIndividual->ServerIdentifier = $intServerIdentifier;
				$objParentPagerIndividual->HiddenFlag = false;
				$objParentPagerIndividual->ParentPagerSyncStatusTypeId = ParentPagerSyncStatusType::NotYetSynced;
			}

			$objParentPagerIndividual->FirstName = $strFirstName;
			$objParentPagerIndividual->MiddleName = $strMiddleName;
			$objParentPagerIndividual->LastName = $strLastName;
			$objParentPagerIndividual->Prefix = $strPrefix;
			$objParentPagerIndividual->Suffix = $strSuffix;
			$objParentPagerIndividual->Nickname = $strNickname;
			$objParentPagerIndividual->GraduationYear = $intGraduationYear;
			$objParentPagerIndividual->DateOfBirth = ($strDateOfBirth ? new QDateTime($strDateOfBirth) : null);
			$objParentPagerIndividual->Gender = $strGender;

			if ($strHouseholdId) {
				$objParentPagerIndividual->ParentPagerHousehold = ParentPagerHousehold::LoadByServerIdentifier($strHouseholdId);
			}

			$objParentPagerIndividual->Save();

			return $objParentPagerIndividual;
		}

		/**
		 * This will refresh the ParentPagerSyncStatusTypeId to be the appropriate value based on
		 * the linked NOAH record to this PP Individual record (if any)
		 * @return void
		 */
		public function RefreshParentPagerSyncStatusType() {
			if ($this->intPersonId) {
				// TODO: Implement logic to see when we are "Out of Sync"
				// This would also be when we checked for "Ignore", which is when we ignore whether or not we are synced properly or not
				
				// For now, we will always set to "Synced"
				$this->intParentPagerSyncStatusTypeId = ParentPagerSyncStatusType::Synced;

				// We also want to make sure to unhide this record since we know we're linked to an actual record
				$this->blnHiddenFlag = false;

			} else {
				// Since we are not linked to a record, let's set this to NotYetSynced
				$this->intParentPagerSyncStatusTypeId = ParentPagerSyncStatusType::NotYetSynced;
			}

			$this->Save();
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of ParentPagerIndividual objects
			return ParentPagerIndividual::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::ParentPagerIndividual()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ParentPagerIndividual()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single ParentPagerIndividual object
			return ParentPagerIndividual::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ParentPagerIndividual()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ParentPagerIndividual()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of ParentPagerIndividual objects
			return ParentPagerIndividual::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ParentPagerIndividual()->Param1, $strParam1),
					QQ::Equal(QQN::ParentPagerIndividual()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = ParentPagerIndividual::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`parent_pager_individual`.*
				FROM
					`parent_pager_individual` AS `parent_pager_individual`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return ParentPagerIndividual::InstantiateDbResult($objDbResult);
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