<?php
	require(__DATAGEN_CLASSES__ . '/ProvisionalPublicLoginGen.class.php');

	/**
	 * The ProvisionalPublicLogin class defined here contains any
	 * customized code for the ProvisionalPublicLogin class in the
	 * Object Relational Model.  It represents the "provisional_public_login" table 
	 * in the database, and extends from the code generated abstract ProvisionalPublicLoginGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class ProvisionalPublicLogin extends ProvisionalPublicLoginGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objProvisionalPublicLogin->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('ProvisionalPublicLogin Object %s',  $this->intPublicLoginId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'AwaitingConfirmationUrl':
					return sprintf('/register/awaiting.php/%s/%s', $this->intPublicLoginId, $this->strUrlHash);

				case 'ConfirmationUrl':
					return sprintf('%s/c.php/%s', MY_ALCF_URL, $this->PublicLogin->Username);

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
		 * This queues up and sends an email requesting the registrant to confirm
		 * the registration.
		 */
		public function SendConfirmationEmail() {
			// Template
			$strTemplateName = 'registration';

			// Calculate Email Address - THIS WILL RETURN if none is found
			$strFromAddress = 'ALCF my.alcf Registration <do_not_reply@alcf.net>';
			$strToAddress = $this->strEmailAddress;
			$strSubject = 'Your Online Registration';

			// Setup the SubstitutionArray
			$strArray = array();

			// Setup Always-Used Fields
			$strArray['PERSON_NAME'] = $this->strFirstName . ' ' . $this->strLastName;

			// Add Payment Info
			$strArray['URL'] = $this->ConfirmationUrl . '/' . $this->strConfirmationCode;
			$strArray['CODE'] = $this->strConfirmationCode;
			$strArray['USERNAME'] = $this->PublicLogin->Username;
			$strArray['CONTACT'] = strip_tags(Registry::GetValue('contact_sentence_my_alcf_support'));

			OutgoingEmailQueue::QueueFromTemplate($strTemplateName, $strArray, $strToAddress, $strFromAddress, $strSubject);
		}

		/**
		 * Given data points supplied this will attempt to reconcile this PublicLogin record to an actual person... or if not possible,
		 * it will create a new person record.
		 * 
		 * There are several stesp to this process.
		 * First, do a Search of All People for the given Email
		 * 		- if 1 and only 1 person was found:
		 * 			+ Check the personal details of that persons record
		 * 				- If matched against First/Last or Nickname/Last, setup the match
		 * 				- If matched against DOB and/or Gender and/or Mobile, setup the match and update the name
		 * 				- If not matched, create as new
		 * 		- if no people were found
		 * 			+ in all the DB, do a search to find matches against First/Last or Nickname/Last AND any address
		 * 				- if exactly one is found, setup the match
		 * 				- if non were found, create as new
		 * 				- if multiple were found, find the first one that also match DOB and/or Gender and/or Mobile (or if none just find the first one) and setup the match
		 * 		- if multiple people were found
		 * 			+ WITHIN the set of found people, do a search to find matches against First/Last or Nickname/Last AND any address
		 * 				- if exactly one is found, setup the match
		 * 				- if non were found, create as new
		 * 				- if multiple were found, find the first one that also match DOB and/or Gender and/or Mobile (or if none just find the first one) and setup the match
		 * 
		 * It will then check and see if the Person found (if any) already has a login object... if so, it will return that found Person record and do nothing further.
		 * 
		 * Otherwise, it will then update all data accordingly (including creating a new Person record, if needed) and return the Person that was created.
		 * 
		 * @param string $strPassword
		 * @param string $strQuestion
		 * @param string $strAnswer
		 * @param string $strHomePhone
		 * @param string $strMobilePhone
		 * @param Address $objHomeAddress
		 * @param Address $objMailingAddress optional
		 * @param QDateTime $dttDateOfBirth optional
		 * @param string $strGenderFlag optional
		 * @return Person the person that was matched
		 */
		public function Reconcile($strPassword, $strQuestion, $strAnswer, $strHomePhone, $strMobilePhone, Address $objHomeAddress, Address $objMailingAddress = null, QDateTime $dttDateOfBirth = null, $strGenderFlag = null) {
			// Try and Find a Person based on Email
			$objPersonArray = array();

			foreach (Email::LoadArrayByAddress($this->strEmailAddress) as $objEmail) {
				$objPersonArray[] = $objEmail->Person;
			}

			// Let's try and find a single Person object to reconcile for

			// 1 and only 1 person was found with the email
			if (count($objPersonArray) == 1) {
				if ($objPersonArray[0]->IsNameMatch($this->FirstName, $this->LastName)) {
					$objPerson = $objPersonArray[0];
				} else if ($objPersonArray[0]->ScoreDobGenderMobileMatch($dttDateOfBirth, $strGenderFlag, $strMobilePhone) > 0) {
					$objPerson = $objPersonArray[0];
				} else {
					$objPerson = null;
				}

			// MORE than one person was found with the email
			} else if (count($objPersonArray)) {
				// Go through each of them and find a name-match and address-match
				$objMatchedPersonArray = array();
				foreach ($objPersonArray as $objPerson) {
					if ($objPerson->IsNameAndAddressMatch($this->FirstName, $this->LastName, $objHomeAddress, $objMailingAddress))
						$objMatchedPersonArray[] = $objPerson;
				}

				if (count($objMatchedPersonArray) == 1) {
					$objPerson = $objMatchedPersonArray[0];
				} else if (!count($objMatchedPersonArray)) {
					$objPerson = null;
				} else {
					$objPerson = $objMatchedPersonArray[0];
					$intCurrentScore = 0;
					foreach ($objMatchedPersonArray as $objMatchedPerson) {
						$intScore = $objMatchedPerson->ScoreDobGenderMobileMatch($dttDateOfBirth, $strGenderFlag, $strMobilePhone);
						if ($intScore > $intCurrentScore) {
							$intCurrentScore = $intScore;
							$objPerson = $objMatchedPerson;
						}
					}
				}

			// NO ONE was found with the email
			} else {
				// First pull the ones with Name Matched
				$objPersonArray = Person::LoadArrayByNameMatch($this->FirstName, $this->LastName);
				
				// Go through each of those and find address-match records
				$objMatchedPersonArray = array();
				foreach ($objPersonArray as $objPerson) {
					if ($objPerson->IsNameAndAddressMatch($this->FirstName, $this->LastName, $objHomeAddress, $objMailingAddress))
						$objMatchedPersonArray[] = $objPerson;
				}

				if (count($objMatchedPersonArray) == 1) {
					$objPerson = $objMatchedPersonArray[0];
				} else if (!count($objMatchedPersonArray)) {
					$objPerson = null;
				} else {
					$objPerson = $objMatchedPersonArray[0];
					$intCurrentScore = 0;
					foreach ($objMatchedPersonArray as $objMatchedPerson) {
						$intScore = $objMatchedPerson->ScoreDobGenderMobileMatch($dttDateOfBirth, $strGenderFlag, $strMobilePhone);
						if ($intScore > $intCurrentScore) {
							$intCurrentScore = $intScore;
							$objPerson = $objMatchedPerson;
						}
					}
				}
			}


			
			// If we have a person, make sure it's not already linked
			if ($objPerson) {
				if ($objPerson->PublicLogin) return $objPerson;
			}



			// We now have either a unlinked Person record or no person record
			// Let's make all the DB updates we need to
			Person::GetDatabase()->TransactionBegin();

			// Do we have a single Person object?
			// If not, let's create it
			if (!$objPerson) {
				$this->PublicLogin->NewPersonFlag = true;
				$blnMaleFlag = null;
				if ($strGenderFlag = trim(strtoupper($strGenderFlag))) {
					$blnMaleFlag = ($strGenderFlag == 'M');
				}

				$intPhoneTypeId = $strMobilePhone ? PhoneType::Mobile : null;
				$objPerson = Person::CreatePerson($this->FirstName, null, $this->LastName, $blnMaleFlag, $this->EmailAddress,
					$strMobilePhone, $intPhoneTypeId);
				$objPerson->DateOfBirth = $dttDateOfBirth;
				if ($objPerson->DateOfBirth) {
					$objPerson->DobGuessedFlag = false;
					$objPerson->DobYearApproximateFlag = false;
				}
				$objPerson->Save();
			}

			//////////////////////////////////
			// Let's update the information
			//////////////////////////////////

			// Email Address
			$objPerson->ChangePrimaryEmailTo($this->EmailAddress, false);

			// Gender and DOB
			if ($strGenderFlag = trim(strtoupper($strGenderFlag))) $objPerson->Gender = $strGenderFlag;
			if ($dttDateOfBirth) {
				$objPerson->DateOfBirth = $dttDateOfBirth;
				$objPerson->DobGuessedFlag = false;
				$objPerson->DobYearApproximateFlag = false;
			}

			// Mobile Phone
			if ($strMobilePhone) {
				$blnFound = false;
				foreach ($objPerson->GetAllAssociatedPhoneArray() as $objPhone) {
					if ($objPhone->Number == $strMobilePhone) {
						$objPhone->PhoneTypeId = PhoneType::Mobile;
						$objPhone->Save();
						$blnFound = true;
					}
				}
				
				if (!$blnFound) {
					$objPhone = new Phone();
					$objPhone->Number = $strMobilePhone;
					$objPhone->PhoneTypeId = PhoneType::Mobile;
					$objPhone->Save();
					$objPerson->PrimaryPhone = $objPhone;
				}
			}

			// Mailing Address
			if ($objMailingAddress) {
				$blnFound = false;
				foreach ($objPerson->GetAllAssociatedAddressArray() as $objAddress) {
					if ($objAddress->IsEqualTo($objMailingAddress)) {
						$blnFound = true;
						$objAddress->CurrentFlag = true;
						$objAddress->AddressTypeId = AddressType::Other;
						$objAddress->Save();
						$objPerson->MailingAddress = $objAddress;
						$objPerson->StewardshipAddress = $objAddress;
					}
				}

				if (!$blnFound) {
					$objMailingAddress->Person = $objPerson;
					$objMailingAddress->CurrentFlag = true;
					$objMailingAddress->AddressTypeId = AddressType::Other;
					$objMailingAddress->Save();

					$objPerson->MailingAddress = $objMailingAddress;
					$objPerson->StewardshipAddress = $objMailingAddress;
				}
			}

			// Home Address and Phone
			$objHouseholdParticipationArray = $objPerson->GetHouseholdParticipationArray();
			if (count($objHouseholdParticipationArray) == 1) {
				$objHousehold = $objHouseholdParticipationArray[0]->Household;
				$objAddress = $objHousehold->GetCurrentAddress();
				if ($objAddress && $objAddress->IsEqualTo($objHomeAddress)) {
					$objHomeAddress = $objAddress;
				} else {
					$objHomeAddress->AddressTypeId = AddressType::Home;
					$objHomeAddress->Household = $objHousehold;
					$objHomeAddress->CurrentFlag = true;
					$objHomeAddress->Save();

					if ($objAddress) {
						$objAddress->CurrentFlag = false;
						$objAddress->Save();
					}
				}

				if ($strHomePhone) {
					$blnFound = false;
					foreach ($objHomeAddress->GetPhoneArray() as $objPhone) {
						if ($objPhone->Number == $strHomePhone) {
							$blnFound = true;
							$objPhone->SetAsPrimary(null, $objHomeAddress);
						}
					}
					
					if (!$blnFound) {
						$objPhone = new Phone();
						$objPhone->PhoneTypeId = PhoneType::Home;
						$objPhone->Number = $strHomePhone;
						$objPhone->Address = $objHomeAddress;
						$objPhone->Save();
						$objPhone->SetAsPrimary(null, $objHomeAddress);
					}
				}
			} else if (count($objHouseholdParticipationArray) == 0) {
				$objHousehold = Household::CreateHousehold($objPerson);
				$objHomeAddress->AddressTypeId = AddressType::Home;
				$objHomeAddress->Household = $objHousehold;
				$objHomeAddress->CurrentFlag = true;
				$objHomeAddress->Save();

				$objHousehold->SetAsCurrentAddress($objHomeAddress);
				if ($strHomePhone) {
					$objPhone = new Phone();
					$objPhone->PhoneTypeId = PhoneType::Home;
					$objPhone->Number = $strHomePhone;
					$objPhone->Address = $objHomeAddress;
					$objPhone->Save();
					$objPhone->SetAsPrimary(null, $objHomeAddress);
				}
			}

			// Wire to PublicLogin
			$this->PublicLogin->Person = $objPerson;
			$this->PublicLogin->SetPassword($strPassword);
			$this->PublicLogin->LostPasswordQuestion = trim($strQuestion);
			$this->PublicLogin->LostPasswordAnswer = trim(strtolower($strAnswer));
			$this->PublicLogin->DateLastLogin = QDateTime::Now();
			$this->PublicLogin->Save();

			// Save the person and delete the provision
			$objPerson->RefreshPrimaryContactInfo();
			$objPerson->RefreshAge(false);
			$objPerson->RefreshNameItemAssociations(true);
			$this->Delete();

			// Commit to DB
			Person::GetDatabase()->TransactionCommit();

			// Return the now-linked person!
			return $objPerson;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of ProvisionalPublicLogin objects
			return ProvisionalPublicLogin::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::ProvisionalPublicLogin()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ProvisionalPublicLogin()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single ProvisionalPublicLogin object
			return ProvisionalPublicLogin::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ProvisionalPublicLogin()->Param1, $strParam1),
					QQ::GreaterThan(QQN::ProvisionalPublicLogin()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of ProvisionalPublicLogin objects
			return ProvisionalPublicLogin::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::ProvisionalPublicLogin()->Param1, $strParam1),
					QQ::Equal(QQN::ProvisionalPublicLogin()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = ProvisionalPublicLogin::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`provisional_public_login`.*
				FROM
					`provisional_public_login` AS `provisional_public_login`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return ProvisionalPublicLogin::InstantiateDbResult($objDbResult);
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