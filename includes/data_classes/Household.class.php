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

		public function __get($strName) {
			switch ($strName) {
				case 'StewardshipHouseholdName':
					$strToReturn = $this->HeadPerson->ActiveMailingLabel;
					$objCurrentMarriage = $this->HeadPerson->GetMostRecentMarriage();
					if ($objCurrentMarriage && $objCurrentMarriage->MarriedToPerson &&
						HouseholdParticipation::LoadByPersonIdHouseholdId($objCurrentMarriage->MarriedToPerson->Id, $this->Id)) {
						$strToReturn .= ' & ' . $objCurrentMarriage->MarriedToPerson->ActiveMailingLabel;
					}
					return $strToReturn;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function Delete() {
			try {
				foreach ($this->GetAddressArray() as $objAddress) $objAddress->Delete();
				$this->DeleteAllHouseholdParticipations();
				parent::Delete();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
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
			$objHousehold->CombinedStewardshipFlag = true;
			$objHousehold->Save();

			$objHousehold->AssociatePerson($objHeadPerson);
			return $objHousehold;
		}

		/**
		 * Sets the Person as the HeadPerson for this household.  Person must already be associated to this Household
		 * or this will throw an Exception.  Person must not be a HeadOfHousehold elsewhere or this will throw as well.
		 * @param Person $objHeadPerson
		 * @return void
		 */
		public function SetAsHeadPerson(Person $objHeadPerson) {
			if (!HouseholdParticipation::LoadByPersonIdHouseholdId($objHeadPerson->Id, $this->Id)) {
				throw new QCallerException('Person is not currently associated with this Household');
			}

			if ($objHeadPerson->CountHouseholdParticipations() > 1) {
				throw new QCallerException('Cannot SetAsHead a Person who is a member of other household(s)');
			}

			if ($objHeadPerson->HouseholdAsHead &&
				($objHeadPerson->HouseholdAsHead->Id != $this->Id)) {
				throw new QCallerException('Cannot SetAsHead a Person who is already head of another household');
			}

			$this->HeadPerson = $objHeadPerson;
			$this->RefreshMembers(false);
			$this->RefreshName(false);
			$this->Save();
		}

		/**
		 * Associates a Person into this Household, and an optional role can be specified.  If no role is specified,
		 * then the role is calculated.
		 * 
		 * If this person is Head of another household, this will throw an exception
		 * If a record already exists, no new record will be created.  If a Role is specified, it will use it.  Otherwise,
		 * it will update the role using RefreshRole() calculation.
		 * 
		 * @param Person $objPerson
		 * @param string $strRole
		 * @return void
		 */
		public function AssociatePerson(Person $objPerson, $strRole = null) {
			if ($objPerson->HouseholdAsHead &&
				($objPerson->HouseholdAsHead->Id != $this->Id)) {
				throw new QCallerException('Cannot associate a person who is already head of another household');
			}

			// Create if doesn't exist
			$objHouseholdParticipation = HouseholdParticipation::LoadByPersonIdHouseholdId($objPerson->Id, $this->Id);
			if (!$objHouseholdParticipation) {
				$objHouseholdParticipation = new HouseholdParticipation();
				$objHouseholdParticipation->Person = $objPerson;
				$objHouseholdParticipation->Household = $this;
			}

			if ($strRole) {
				$objHouseholdParticipation->Role = $strRole;
			} else {
				$objHouseholdParticipation->RefreshRole(false);
			}
			$objHouseholdParticipation->Save();

			$this->RefreshMembers();
			$objPerson->RefreshPrimaryContactInfo();
		}

		/**
		 * Split this household into two.  Move PersonArray into the new household and assign $objNewHeadPerson
		 * as the head of the new household.
		 * 
		 * @param Person[] $objPersonArray
		 * @param Person $objNewHeadPerson
		 * @param Address $objNewAddress
		 * @return Household
		 */
		public function SplitHousehold($objPersonArray, Person $objNewHeadPerson, Address $objNewAddress) {
			$this->UnassociatePerson($objNewHeadPerson, false);
			$objNewHousehold = Household::CreateHousehold($objNewHeadPerson);
			foreach ($objPersonArray as $objPerson) {
				if ($objPerson->Id != $objNewHeadPerson->Id) {
					$this->UnassociatePerson($objPerson);
					$objNewHousehold->AssociatePerson($objPerson);
				}
			}

			// Log it
			$objHouseholdSplit = new HouseholdSplit();
			$objHouseholdSplit->Household = $this;
			$objHouseholdSplit->SplitHousehold = $objNewHousehold;
			$objHouseholdSplit->DateSplit = QDateTime::Now();
			$objHouseholdSplit->Save();

			// Set the Address
			$objNewAddress->Household = $objNewHousehold;
			$objNewAddress->Save();
			$objNewHousehold->SetAsCurrentAddress($objNewAddress);

			return $objNewHousehold;
		}
		
		/**
		 * Get an ordered lists of householdsplit objects for this household
		 * in reverse chronological order.
		 * @return HouseholdSplit[]
		 */
		public function GetSplitArray() {
			return HouseholdSplit::QueryArray(QQ::OrCondition(
				QQ::Equal(QQN::HouseholdSplit()->HouseholdId, $this->Id),
				QQ::Equal(QQN::HouseholdSplit()->SplitHouseholdId, $this->Id)),
				QQ::OrderBy(QQN::HouseholdSplit()->DateSplit, false));
		}

		/**
		 * This will marge the specified household into this household.  The passed in household will be DELETED.
		 * All members of either household will be part of the merged household.
		 * 
		 * The New HeadPerson must be a member of either household, or else an exception will be thrown
		 * 
		 * All "Roles" will be reset by calling RefreshRole() on each HouseholdParticipation record.
		 * @param Household $objHousehold
		 * @param Person $objNewHeadPerson
		 * @return void
		 */
		public function MergeHousehold(Household $objHousehold, Person $objNewHeadPerson) {
			// Ensure the specified HeadPerson is part of either household
			if (!HouseholdParticipation::LoadByPersonIdHouseholdId($objNewHeadPerson->Id, $this->Id) &&
				!HouseholdParticipation::LoadByPersonIdHouseholdId($objNewHeadPerson->Id, $objHousehold->Id)) {
				throw new QCallerException('Specified HeadPerson of this newly merged Household not a member of either household');
			}

			self::GetDatabase()->TransactionBegin();

			try {
				// Get all the members of the Merging Hosuehold
				$objParticipationArray = $objHousehold->GetHouseholdParticipationArray();

				// Each Home Address in the Merging Household will be set as a Prior Home address for each member
				$objAddressArray = $objHousehold->GetAddressArray();
				foreach ($objParticipationArray as $objParticipation) {
					foreach ($objAddressArray as $objAddress) {
						$objAddress->CopyForPerson($objParticipation->Person, AddressType::Home, false);
					}
				}

				// Combine any household Splits
				foreach ($objHousehold->GetHouseholdSplitArray() as $objSplit) {
					if ($objSplit->SplitHouseholdId == $this->Id)
						$objSplit->Delete();
					else {
						$objSplit->Household = $this;
						$objSplit->Save();
					}
				}
				foreach ($objHousehold->GetHouseholdSplitAsSplitArray() as $objSplit) {
					if ($objSplit->HouseholdId == $this->Id)
						$objSplit->Delete();
					else {
						$objSplit->SplitHousehold = $this;
						$objSplit->Save();
					}
				}

				// Delete the merging household object, itself
				$objHousehold->Delete();

				// Each Person in the Merging Household will be now be associated with This Household
				foreach ($objParticipationArray as $objParticipation) {
					$this->AssociatePerson($objParticipation->Person, 'none');
				}

				// Setup the New Head and Refresh Data
				$this->HeadPerson = $objNewHeadPerson;
				$this->RefreshMembers(false);
				$this->RefreshName(false);
				$this->Save();

				// Refresh Roles of All Members
				foreach ($this->GetHouseholdParticipationArray() as $objParticipation) {
					$objParticipation->RefreshRole();
					$objParticipation->Person->RefreshPrimaryContactInfo();
				}
			} catch (Exception $objExc) {
				self::GetDatabase()->TransactionRollBack();
				throw $objExc;
			}

			self::GetDatabase()->TransactionCommit();
		}

		/**
		 * Attempts to remove the person from the household.  This will throw an exception if:
		 *  - This person is not currently part of the household
		 * 	- This person is the only person in the household
		 *  - This person is the head of the household
		 * @param Person $objPerson
		 * @param boolean $blnClearAssociatedPhoneAndAddress
		 * @return void
		 */
		public function UnassociatePerson(Person $objPerson, $blnClearAssociatedPhoneAndAddress = true) {
			$objParticipation = HouseholdParticipation::LoadByPersonIdHouseholdId($objPerson->Id, $this->Id);
			if (!$objParticipation)
				throw new QCallerException('Person does not exist in the household');
			if ($this->CountHouseholdParticipations() == 1)
				throw new QCallerException('Person is the only member of this household and thus cannot be removed');
			if ($this->HeadPersonId == $objPerson->Id)
				throw new QCallerException('Person is the Head of this household and thus cannot be removed');

			self::GetDatabase()->TransactionBegin();
			try {
				foreach ($this->GetAddressArray() as $objAddress)
					$objAddress->CopyForPerson($objPerson, AddressType::Home, false);
				$objParticipation->Delete();
				$this->RefreshMembers();
			} catch (Exception $objExc) {
				self::GetDatabase()->TransactionRollBack();
				throw $objExc;
			}
			self::GetDatabase()->TransactionCommit();

			// Update linked phone and address stuff
			if ($blnClearAssociatedPhoneAndAddress) {
				$intAddressIdArray = array();
				$intPhoneIdArray = array();
				foreach ($this->GetAddressArray() as $objAddress) {
					$intAddressIdArray[$objAddress->Id] = true;
					foreach ($objAddress->GetPhoneArray() as $objPhone) $intPhoneIdArray[$objPhone->Id] = true;
				}
				if (array_key_exists($objPerson->MailingAddressId, $intAddressIdArray)) $objPerson->MailingAddress = null;
				if (array_key_exists($objPerson->StewardshipAddressId, $intAddressIdArray)) $objPerson->StewardshipAddress = null;
				if (array_key_exists($objPerson->PrimaryPhoneId, $intPhoneIdArray)) $objPerson->PrimaryPhone = null;
			}
			$objPerson->RefreshPrimaryContactInfo();
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
		 * Returns an array of HouseholdParticipant records WITH early-bound person records for this household,
		 * ordered by Head FIRST and then everyone else in alphabetical order
		 * @return HouseholdParticipant[]
		 */
		public function GetOrderedParticipantArray() {
			$objArray = array();
			$objArrayToReturn = array();
			foreach ($this->GetHouseholdParticipationArray(QQ::Expand(QQN::HouseholdParticipation()->Person->Id), QQ::OrderBy(QQN::HouseholdParticipation()->Person->FirstName)) as $objHouseholdParticipant) {
				if ($objHouseholdParticipant->PersonId == $this->HeadPersonId)
					$objArrayToReturn[] = $objHouseholdParticipant;
				else
					$objArray[] = $objHouseholdParticipant;
			}

			return array_merge($objArrayToReturn, $objArray);
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

			// Get any home address and home phone records for this household (and any from-split households)
			$intAddressIdArray = array();
			$intPhoneIdArray = array();

			foreach ($this->GetAddressArray() as $objAddress) {
				if (($objAddress->Id != $objCurrentAddress->Id) && $objAddress->CurrentFlag) {
					$objAddress->CurrentFlag = false;
					$objAddress->Save();
				}

				$intAddressIdArray[$objAddress->Id] = true;
				foreach ($objAddress->GetPhoneArray() as $objPhone) $intPhoneIdArray[$objPhone->Id] = true;
			}

			// Add any old HomeAddresses from previous households
			foreach ($this->GetHouseholdSplitAsSplitArray() as $objHouseholdSplit) {
				foreach ($objHouseholdSplit->Household->GetAddressArray() as $objAddress) {
					$intAddressIdArray[$objAddress->Id] = true;
					foreach ($objAddress->GetPhoneArray() as $objPhone) $intPhoneIdArray[$objPhone->Id] = true;
				}
			}

			if (!$objCurrentAddress->CurrentFlag) {
				$objCurrentAddress->CurrentFlag = true;
				$objCurrentAddress->Save();
			}

			// Update "MailingAddress" and "StewardshipAddress" info for HouseholdParticipants
			// Update "PrimaryAddressText" info for HouseholdParticipants
			foreach ($this->GetHouseholdParticipationArray(QQ::Expand(QQN::HouseholdParticipation()->Person->Id)) as $objHouseholdParticipation) {
				$objPerson = $objHouseholdParticipation->Person;
				if (array_key_exists($objPerson->MailingAddressId, $intAddressIdArray)) $objPerson->MailingAddress = $objCurrentAddress;
				if (array_key_exists($objPerson->StewardshipAddressId, $intAddressIdArray)) $objPerson->StewardshipAddress = $objCurrentAddress;
				if (array_key_exists($objPerson->PrimaryPhoneId, $intPhoneIdArray)) $objPerson->PrimaryPhone = $objCurrentAddress->PrimaryPhone;
				$objPerson->RefreshPrimaryContactInfo();
			}
		}

		public function GetCurrentAddress() {
			return Address::QuerySingle(QQ::AndCondition(
				QQ::Equal(QQN::Address()->HouseholdId, $this->intId),
				QQ::Equal(QQN::Address()->CurrentFlag, true)));
		}

		/**
		 * Given a search term, this will try and match all similarly matched households based on
		 * hopuseholdparticipation indivudal match.
		 * This will utilize soundex and other indexing methodologies.
		 * 
		 * THIS IS TODO and the algorithm needs to be tuned.
		 * 
		 * @param string $strFirstName
		 * @param string $strLastName
		 * @param integer $intNotHouseholdId HouseholdId NOT to include
		 * @return Household[]
		 */
		public static function LoadArrayBySearch($strFirstName, $strLastName, $intNotHouseholdId = null) {
			$strClauseArray = array();
			
			$strClauseArray[] = '(household_participation.household_id = household.id)';
			$strClauseArray[] = '(household_participation.person_id = person.id)';

			if (strlen($strFirstName))
				$strClauseArray[] = sprintf("(soundex(person.first_name) = soundex('%s') OR person.first_name LIKE '%s%%')", mysql_escape_string($strFirstName), mysql_escape_string($strFirstName));
			if (strlen($strLastName))
				$strClauseArray[] = sprintf("(soundex(person.last_name) = soundex('%s') OR person.last_name LIKE '%s%%')", mysql_escape_string($strLastName), mysql_escape_string($strLastName));
			if ($intNotHouseholdId)
				$strClauseArray[] = sprintf("(household.id != %s)", mysql_escape_string($intNotHouseholdId));

			$strQuery = 'SELECT DISTINCT household.* FROM household, household_participation, person WHERE ' .
				implode(' AND ', $strClauseArray) . ' ORDER BY household.name';
			return Household::InstantiateDbResult(Household::GetDatabase()->Query($strQuery));
		}


		/**
		 * Attempts to get the StewardshipAddress record for this Household
		 * @return Address
		 */
		public function GetStewardshipAddress() {
			if ($this->HeadPerson->StewardshipAddress && !$this->HeadPerson->StewardshipAddress->InvalidFlag) return $this->HeadPerson->StewardshipAddress;
			if ($this->HeadPerson->MailingAddress && !$this->HeadPerson->MailingAddress->InvalidFlag) return $this->HeadPerson->MailingAddress;

			// Try to find any valid, current HomeAddress
			$objAddressArray = Address::LoadArrayByHouseholdIdCurrentFlag($this->Id, true);
			foreach ($objAddressArray as $objAddressToTest) {
				if (!$objAddressToTest->InvalidFlag) return $objAddressToTest;
			}

			// Otherwise, just return any current and valid address that can be found
			return $this->HeadPerson->GetStewardshipAddress();
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