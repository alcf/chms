<?php
	require(__DATAGEN_CLASSES__ . '/PhoneGen.class.php');

	/**
	 * The Phone class defined here contains any
	 * customized code for the Phone class in the
	 * Object Relational Model.  It represents the "phone" table 
	 * in the database, and extends from the code generated abstract PhoneGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class Phone extends PhoneGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPhone->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Phone Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Label':
					if ($this->CountAddressesAsPrimary() || $this->CountPeopleAsPrimary())
						return sprintf('Primary %s', PhoneType::$NameArray[$this->intPhoneTypeId]);
					else
						return PhoneType::$NameArray[$this->intPhoneTypeId];

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
			$this->UnassociateAllAddressesAsPrimary();
			$this->UnassociateAllPeopleAsPrimary();
			if ($this->Person) $this->Person->RefreshPrimaryContactInfo();
			try {
				parent::Delete();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will set this phone object as the "primary" phone number for (if associated to an address) the address
		 * or (if associated to a person) the person.
		 * 
		 * Alternatively, if the phone is associated with the address (e.g. a home phone), you can explicitly
		 * pass in a Person in that house to set as "primary" for that person.
		 * 
		 * This will automatically UNSET as primary any current-primary phone (if applicable)
		 * @return void
		 */
		public function SetAsPrimary(Person $objPerson = null, Address $objAddress = null) {
			if ($objPerson) {
				if (($this->PersonId != $objPerson->Id) &&
					(!$this->Address || !$this->Address->Household ||
					 !(HouseholdParticipation::LoadByPersonIdHouseholdId($objPerson->Id, $this->Address->HouseholdId)))) {
					throw new QCallerException('Cannot set as primary phone for person not in the household for this address');
				}
				$objPerson->PrimaryPhone = $this;
				$objPerson->Save();
				$objPerson->RefreshPrimaryContactInfo();
			} else if ($objAddress) {
				if ($objAddress->Id != $this->intAddressId) {
					throw new QCallerException('Cannot set as primary phone for home address that does not own this phone object');
				}
				$objAddress->PrimaryPhone = $this;
				$objAddress->Save();
			} else if ($this->Address) {
				$this->Address->PrimaryPhone = $this;
				$this->Address->Save();
			} else {
				$this->Person->PrimaryPhone = $this;
				$this->Person->Save();
				$this->Person->RefreshPrimaryContactInfo();
			}
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Phone objects
			return Phone::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Phone()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Phone()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Phone object
			return Phone::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Phone()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Phone()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Phone objects
			return Phone::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Phone()->Param1, $strParam1),
					QQ::Equal(QQN::Phone()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Phone::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`phone`.*
				FROM
					`phone` AS `phone`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Phone::InstantiateDbResult($objDbResult);
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