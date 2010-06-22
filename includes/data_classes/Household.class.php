<?php
	require(__DATAGEN_CLASSES__ . '/HouseholdGen.class.php');

	/**
	 * The Household class defined here contains any
	 * customized code for the Household class in the
	 * Object Relational Model.  It represents the "household" table 
	 * in the database, and extends from the code generated abstract HouseholdGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class Household extends HouseholdGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objHousehold->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Household Object %s',  $this->intId);
		}

		/**
		 * Creates a new Household record, and sets the HeadPerson as the Head of Household and HouseholdParticipant for this household
		 * 
		 * This will throw an exception if the HeadPerson is already head of another household.
		 * @param Person $objHeadPerson
		 * @return Household
		 */
		public static function CreateHousehold(Person $objHeadPerson) {
			if (Household::LoadByHeadPersonId($objHeadPerson->Id)) throw new QCallerException('HeadPerson is already head of another household');
			
			// Create the new Household record
			$objHousehold = new Household();
			$objHousehold->HeadPerson = $objHeadPerson;
			$objHousehold->RefreshName(false);
			$objHousehold->Save();

			$objHousehold->AssociatePerson($objHeadPerson);
			return $objHousehold;
		}

		/**
		 * Associates a Person into this Household, and an optional role can be specified.  If no role is specified,
		 * then the role is calculated.
		 * @param Person $objPerson
		 * @param string $strRole
		 * @return void
		 */
		public function AssociatePerson(Person $objPerson, $strRole = null) {
			$objHouseholdParticipation = new HouseholdParticipation();
			$objHouseholdParticipation->Person = $objPerson;
			$objHouseholdParticipation->Household = $this;
			if ($strRole) {
				$objHouseholdParticipation->Role = $strRole;
			} else {
				$objHouseholdParticipation->RefreshRole(false);
			}
			$objHouseholdParticipation->Save();

			$this->RefreshMembers();
		}

		/**
		 * Refreshes the Members field based on the members / household participants in this household.
		 * @param boolean $blnSave whether or not to call save after updating
		 * @return void
		 */
		public function RefreshMembers($blnSave = true) {
			$strMemberArray = array();
			$strMemberArray[] = $this->HeadPerson->Name;
			foreach ($this->GetHouseholdParticipationArray(QQ::Expand(QQN::HouseholdParticipation()->Person->Id), QQ::OrderBy(QQN::HouseholdParticipation()->Person->FirstName)) as $objHouseholdParticipant) {
				if ($objHouseholdParticipant->PersonId != $this->HeadPersonId) {
					$strMemberArray[] = $objHouseholdParticipant->Person->Name;
				}
			}
			
			$this->strMembers = implode(', ', $strMemberArray);
			if ($blnSave) $this->Save();
		}

		/**
		 * Refreshes the name of the household based on the Head of Household information.  Will call Save unless explicilty specified not to.
		 * @param boolean $blnSave whether or not to call save after updating
		 * @return void
		 */
		public function RefreshName($blnSave = true) {
			$this->strName = $this->HeadPerson->Name . ' Household';
			if ($blnSave) $this->Save();
		}


		/**
		 * Sets the address record as the "Current" address, and all others as "Previous"
		 * Address MUST be associated with the household or this will throw an exception
		 * @param Address $objCurrentAddress
		 * @return void
		 */
		public function SetAsCurrentAddress(Address $objCurrentAddress) {
			if ($objCurrentAddress->HouseholdId != $this->intId)
				throw new QCallerException('Address does not belong to this Household');
				
			foreach ($this->GetAddressArray() as $objAddress) {
				if (($objAddress->Id != $objCurrentAddress->Id) && $objAddress->CurrentFlag) {
					$objAddress->CurrentFlag = false;
					$objAddress->Save();
				}
			}

			if (!$objCurrentAddress->CurrentFlag) {
				$objCurrentAddress->CurrentFlag = true;
				$objCurrentAddress->Save();
			}
		}

		public function GetCurrentAddress() {
			return Address::QuerySingle(QQ::AndCondition(
				QQ::Equal(QQN::Address()->HouseholdId, $this->intId),
				QQ::Equal(QQN::Address()->CurrentFlag, true)));
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Household objects
			return Household::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Household()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Household()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Household object
			return Household::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Household()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Household()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Household objects
			return Household::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Household()->Param1, $strParam1),
					QQ::Equal(QQN::Household()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Household::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`household`.*
				FROM
					`household` AS `household`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Household::InstantiateDbResult($objDbResult);
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