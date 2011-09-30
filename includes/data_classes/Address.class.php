<?php
	require(__DATAGEN_CLASSES__ . '/AddressGen.class.php');

	/**
	 * The Address class defined here contains any
	 * customized code for the Address class in the
	 * Object Relational Model.  It represents the "address" table 
	 * in the database, and extends from the code generated abstract AddressGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class Address extends AddressGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objAddress->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Address Object %s',  $this->intId);
		}
		
		/**
		 * Given a "AddressFullLine" string, this will try and create an Address object (NOT from the DB or linked to a DB id)
		 * given the parts of the FullLine.
		 * 
		 * This will return NULL if an address could not be deduced.
		 * @param string $strAddressFullLine
		 * @return Address
		 */
		public static function DeduceAddressFromFullLine($strAddressFullLine) {
			$strParts = explode(', ', $strAddressFullLine);
			if ((count($strParts) == 3) && (($intPosition = strpos($strParts[2], ' ')) == 2)) {
				$objAddress = new Address();
				$objAddress->Address1 = trim($strParts[0]);
				$objAddress->City = trim($strParts[1]);
				$objAddress->State = substr($strParts[2], 0, 2);
				$objAddress->ZipCode = substr($strParts[2], 3);
				return $objAddress;
			} else if ((count($strParts) == 4) && (($intPosition = strpos($strParts[3], ' ')) == 2)) {
				$objAddress = new Address();
				$objAddress->Address1 = trim($strParts[0]);
				$objAddress->Address2 = trim($strParts[1]);
				$objAddress->City = trim($strParts[2]);
				$objAddress->State = substr($strParts[3], 0, 2);
				$objAddress->ZipCode = substr($strParts[3], 3);
				return $objAddress;
			}
			return null;
		}

		public function Delete() {
			try {
				if ($this->PrimaryPhone) {
					$this->PrimaryPhone = null;
					$this->Save();
				}
				foreach ($this->GetPhoneArray() as $objPhone) $objPhone->Delete();

				// Get PersonIdArray to Refresh Info for
				$intPersonIdArray = array();
				if ($this->intPersonId) $intPersonIdArray[$this->intPersonId] = true;
				foreach ($this->GetPersonAsMailingArray() as $objPerson) $intPersonIdArray[$objPerson->Id] = true;

				if ($this->Household) {
					foreach ($this->Household->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
						$intPersonIdArray[$objHouseholdParticipation->PersonId] = true;
					}
				}

				$this->UnassociateAllPeopleAsMailing();
				$this->UnassociateAllPeopleAsStewardship();
				$this->UnassociateAllFormAnswers();

				foreach ($intPersonIdArray as $intPersonId => $blnValue) {
					Person::Load($intPersonId)->RefreshPrimaryContactInfo();
				}

				parent::Delete();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		public function IsEqualTo(Address $objAddress) {
			$blnCheckAddress2 = (strlen($objAddress->Address2) || strlen($this->Address2)) ? true : false;

			if (
				(trim(strtolower($objAddress->Address1)) == trim(strtolower($this->Address1))) &&
				(!$blnCheckAddress2 || (trim(strtolower($objAddress->Address2)) == trim(strtolower($this->Address2)))) &&
				(trim(strtolower($objAddress->City)) == trim(strtolower($this->City))) &&
				($objAddress->State == $this->State) &&
				((substr(trim($objAddress->ZipCode), 0, 5)) == (substr(trim($this->ZipCode), 0, 5)))
			) {
				return true;
			} else {
				return false;
			}
		}

		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			try {
				parent::Save($blnForceInsert, $blnForceUpdate);

				// Get PersonIdArray to Refresh Info for
				$intPersonIdArray = array();
				if ($this->intPersonId) $intPersonIdArray[$this->intPersonId] = true;
				foreach ($this->GetPersonAsMailingArray() as $objPerson) $intPersonIdArray[$objPerson->Id] = true;

				if ($this->Household) {
					foreach ($this->Household->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
						$intPersonIdArray[$objHouseholdParticipation->PersonId] = true;
					}
				}

				foreach ($intPersonIdArray as $intPersonId => $blnValue) {
					Person::Load($intPersonId)->RefreshPrimaryContactInfo();
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Overrides codegenned GetPhoneArray.  Since phones associated with addresses
		 * are really only for Home addresses, since we always want the "primary" one to show up first
		 * we will expliclty order it that way and return it.
		 * @param QQClause[] $objOptionalClauses this parameter is IGNORED
		 * @return Phone[] 
		 */
		public function GetPhoneArray($objOptionalClauses = null) {
			$arrPhones = parent::GetPhoneArray(QQ::OrderBy(QQN::Phone()->Id));

			if ($this->PrimaryPhone) {
				$arrToReturn = array();
				$arrToReturn[] = $this->PrimaryPhone;
				foreach ($arrPhones as $objPhone) {
					if ($objPhone->Id != $this->PrimaryPhoneId)
						$arrToReturn[] = $objPhone;
				}
				return $arrToReturn;

			} else {
				return $arrPhones;
			}
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Label':
					$strToReturn = ($this->blnCurrentFlag) ? 'Current ' : 'Previous ';
					$strToReturn .= AddressType::$NameArray[$this->intAddressTypeId];
					return $strToReturn;

				case 'ShortName':
					return $this->Address1;
					
				case 'DisplayHtml':
					if ($this->Address3)
						$strToReturn = QApplication::HtmlEntities($this->Address3) . '<br/>';
					else
						$strToReturn = null;

					$strToReturn .= QApplication::HtmlEntities($this->Address1) . '<br/>';

					if ($this->Address2)
						$strToReturn .= QApplication::HtmlEntities($this->Address2) . '<br/>';

					$strToReturn .= QApplication::HtmlEntities($this->City . ', ' . $this->State . '  ' . $this->ZipCode);
					
					foreach ($this->GetPhoneArray() as $objPhone)
						$strToReturn .= '<br/>' . $objPhone->Number;

					return $strToReturn;

				case 'AddressShortLine':
					$strToReturn = null;
					if ($this->Address1) {
						$strToReturn .= $this->strAddress1;
						if ($this->strAddress2)
							$strToReturn .= ', ' . $this->strAddress2;
					}
					if ($this->strCity) {
						if ($strToReturn) $strToReturn .= ', ';
						$strToReturn .= $this->strCity;
					}
					return $strToReturn;

				case 'AddressFullLine':
					$strToReturn = null;
					if ($this->Address1) {
						$strToReturn .= $this->strAddress1;
						if ($this->strAddress2)
							$strToReturn .= ', ' . $this->strAddress2;
					}
					if ($this->strCity) {
						if ($strToReturn) $strToReturn .= ', ';
						$strToReturn .= sprintf('%s, %s %s', $this->strCity, $this->strState, $this->strZipCode);
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

		/**
		 * Given an Address record -- copy it and assign it to the specified Person.
		 * 
		 * This is typically used to take a HomeAddress record for a Household and to resassign it
		 * as a previous home address for each member of a household that is being merged with another household.
		 * 
		 * ANY LINKED PHONE NUMBERS WILL BE LOST. 
		 * 
		 * This will return the new address record that is now linked to the Person.
		 * @param Person $objPerson 
		 * @param integer $intAddressTypeId
		 * @param boolean $blnCurrentFlag
		 * @return Address
		 */
		public function CopyForPerson(Person $objPerson, $intAddressTypeId, $blnCurrentFlag) {
			$objAddress = new Address();
			$objAddress->AddressTypeId = $intAddressTypeId;
			$objAddress->Person = $objPerson;
			$objAddress->Address1 = $this->Address1;
			$objAddress->Address2 = $this->Address2;
			$objAddress->Address3 = $this->Address3;
			$objAddress->City = $this->City;
			$objAddress->State = $this->State;
			$objAddress->ZipCode = $this->ZipCode;
			$objAddress->Country = $this->Country;
			$objAddress->CurrentFlag = $blnCurrentFlag;
			$objAddress->InvalidFlag = $this->InvalidFlag;
			$objAddress->Save();

			return $objAddress;
		}


		/**
		 * Validate this address against the USPS.
		 * @ return boolean whether or not the address validated
		 */
		public function ValidateUsps() {
			$objValidator = new AddressValidator($this->strAddress1, $this->strAddress2, $this->strCity, $this->strState, $this->strZipCode);

			$objValidator->ValidateAddress();
			if ($objValidator->AddressValidFlag) {
				$this->strAddress1 = $objValidator->PrimaryAddressLine;
				$this->strAddress2 = $objValidator->SecondaryAddressLine;
				$this->strCity = $objValidator->City;
				$this->strState = $objValidator->State;
				$this->strZipCode = $objValidator->ZipCode;

				$this->blnVerificationCheckedFlag = true;
				$this->blnInvalidFlag = false;
				$this->Save();
				return true;
			} else {
				return false;
			}
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Address objects
			return Address::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Address()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Address()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Address object
			return Address::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Address()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Address()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Address objects
			return Address::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Address()->Param1, $strParam1),
					QQ::Equal(QQN::Address()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`address`.*
				FROM
					`address` AS `address`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Address::InstantiateDbResult($objDbResult);
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