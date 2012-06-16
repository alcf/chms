<?php
	require(__DATAGEN_CLASSES__ . '/PersonGen.class.php');

	/**
	 * The Person class defined here contains any
	 * customized code for the Person class in the
	 * Object Relational Model.  It represents the "person" table 
	 * in the database, and extends from the code generated abstract PersonGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class Person extends PersonGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPerson->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Person Object %s',  $this->intId);
		}

		public function RefreshNameItemAssociations() {
			$this->UnassociateAllNameItems();
			$strNames = sprintf('%s %s %s %s %s %s', trim($this->strFirstName), trim($this->strMiddleName), trim($this->strLastName), trim($this->strNickname), trim($this->strPriorLastNames), trim($this->strSuffix));
			$strNameArray = NameItem::GetNormalizedArrayFromNameString($strNames);
			NameItem::AssociateNameItemArrayForPerson($strNameArray, $this);
		}

		public function Delete() {
			self::GetDatabase()->TransactionBegin();
			try {
				$this->PrimaryPhoneId = null;
				$this->PrimaryEmailId = null;
				$this->CurrentHeadShotId = null;
				$this->MailingAddressId = null;
				$this->StewardshipAddressId = null;
				$this->Save();

				$this->DeleteAllAddresses();
				$this->DeleteAllEmails();
				$this->DeleteAllOtherContactInfos();
				$this->DeleteAllPhones();
				$this->UnassociateAllNameItems();

				foreach ($this->GetHeadShotArray() as $objHeadShot) {
					$objHeadShot->Delete();
				}

				parent::Delete();
			} catch (QCallerException $objExc) {
				self::GetDatabase()->TransactionRollBack();
				$objExc->IncrementOffset();
				throw $objExc;
			}
			self::GetDatabase()->TransactionCommit();
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Name':
					return $this->strFirstName . ' ' . $this->strLastName;

				case 'FullName':
					$strToReturn = null;
					$strToReturn .= $this->strFirstName . ' ';

					if ($this->strMiddleName) {
						if (strlen($this->strMiddleName) == 1)
							$strToReturn .= $this->strMiddleName . '. ';
						else
							$strToReturn .= $this->strMiddleName . ' ';
					}

					$strToReturn .= $this->strLastName;
					
					if ($this->strSuffix) $strToReturn .= ', ' . $this->strSuffix;
					return $strToReturn;

				case 'NameWithNickname':
					if ($this->strNickname)
						return sprintf('%s "%s" %s', $this->strFirstName, $this->strNickname, $this->strLastName);
					else
						return $this->strFirstName . ' ' . $this->strLastName;

				case 'FormalName':
					$strToReturn = null;
					
					if ($this->strTitle)
						$strToReturn .= $this->strTitle . ' ';

					$strToReturn .= $this->strFirstName . ' ';
					
					if ($this->strMiddleName) {
						if (strlen($this->strMiddleName) == 1)
							$strToReturn .= $this->strMiddleName . '. ';
						else
							$strToReturn .= $this->strMiddleName . ' ';
					}

					$strToReturn .= $this->strLastName;
					
					if ($this->strSuffix)
						$strToReturn .= ', ' . $this->strSuffix;

					return $strToReturn;

				case 'ActiveMailingLabel':
					if ($this->strMailingLabel)
						return $this->strMailingLabel;
					else
						return $this->Name;

				case 'MembershipStatus':
					return MembershipStatusType::$NameArray[$this->intMembershipStatusTypeId];

				case 'CurrentMembershipInfo':
					$objMembership = Membership::QuerySingle(QQ::Equal(QQN::Membership()->PersonId, $this->intId), QQ::OrderBy(QQN::Membership()->DateStart, false));
					if (!$objMembership) return null;
					if ($objMembership->DateEnd) return null;
					$intYears = QDateTime::Now()->Difference($objMembership->DateStart)->Years;
					return sprintf('since %s (%s year%s)', $objMembership->DateStart->__toString('MMMM D, YYYY'), $intYears, ($intYears == 1) ? '' : 's');

				case 'MaritalStatus':
					return MaritalStatusType::$NameArray[$this->intMaritalStatusTypeId];

				case 'PronounSubject':
					switch ($this->strGender) {
						case 'M':	return 'he';
						case 'F':	return 'she';
						default:	return 'he/she';
					}

				case 'PronounIndirectObject':
					switch ($this->strGender) {
						case 'M':	return 'him';
						case 'F':	return 'her';
						default:	return 'him/her';
					}

				case 'PronounAdjective':
					switch ($this->strGender) {
						case 'M':	return 'his';
						case 'F':	return 'her';
						default:	return 'his/her';
					}

				case 'GenderLabel':
					switch ($this->strGender) {
						case 'M':	return 'Male';
						case 'F':	return 'Female';
						default:	return 'Not Specified';
					}

				case 'Birthdate':
					if (!$this->dttDateOfBirth) return null;
					switch (true) {
						case !$this->blnDobGuessedFlag && !$this->blnDobYearApproximateFlag:
							$strToReturn = $this->dttDateOfBirth->__toString('MMMM D, YYYY');
							$intAge = $this->Age;
							$strToReturn .= sprintf('<br/>%s year%s old', $intAge, ($intAge != 1) ? 's' : '');
							return $strToReturn;

						case $this->blnDobGuessedFlag && !$this->blnDobYearApproximateFlag:
							$strToReturn = 'Birthday Not Available';
							$intAge = $this->Age;
							$strToReturn .= sprintf('<br/>%s year%s old', $intAge, ($intAge != 1) ? 's' : '');
							return $strToReturn;

						case !$this->blnDobGuessedFlag && $this->blnDobYearApproximateFlag:
							$strToReturn = $this->dttDateOfBirth->__toString('MMMM D');
							$intAge = $this->Age;
							$strToReturn .= sprintf('<br/>Approximately %s year%s old', $intAge, ($intAge != 1) ? 's' : '');
							return $strToReturn;

						case $this->blnDobGuessedFlag && $this->blnDobYearApproximateFlag:
							$strToReturn = 'Birthday Not Available';
							$intAge = $this->Age;
							$strToReturn .= sprintf('<br/>Approximately %s year%s old', $intAge, ($intAge != 1) ? 's' : '');
							return $strToReturn;

						default:
							throw new Exception('Invalid BirthDate Switch');
					}

				case 'LinkUrl':
					return sprintf('/individuals/view.php/%s#general', $this->intId);

				case 'ContactInfoLinkUrl':
					return sprintf('/individuals/view.php/%s#contact', $this->intId);

				case 'RefreshLinkUrl':
					return sprintf('/individuals/refresh_view.php/%s', $this->intId);

				case 'LinkHtml':
					return sprintf('<a href="%s" title="View %s\'s Information">%s</a>', $this->LinkUrl, QApplication::HtmlEntities($this->FormalName), QApplication::HtmlEntities($this->FormalName));

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
		 * This will move all the transactions for a given year to be credited to another person
		 * @param integer $intYear
		 * @param Person $objPerson
		 */
		public function MoveStewardshipTransactions($intYear, Person $objPerson) {
			StewardshipContribution::GetDatabase()->TransactionBegin();

			$objArray = StewardshipContribution::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::StewardshipContribution()->PersonId, $this->intId),
					QQ::GreaterOrEqual(QQN::StewardshipContribution()->DateCredited, new QDateTime($intYear . '-01-01')),
					QQ::LessThan(QQN::StewardshipContribution()->DateCredited, new QDateTime(($intYear + 1). '-01-01'))
				)
			);
			
			foreach ($objArray as $objContribution) {
				$objContribution->Person = $objPerson;
				$objContribution->Save();
				
				foreach ($objContribution->GetStewardshipPostLineItemArray() as $objLineItem) {
					$objLineItem->Person = $objPerson;
					$objLineItem->Save();
				}
			}
			
			StewardshipContribution::GetDatabase()->TransactionCommit();
		}

		/**
		 * Attempts to get the StewardshipAddress record for this person
		 * @return Address
		 */
		public function GetStewardshipAddress() {
			if ($this->StewardshipAddress && !$this->StewardshipAddress->InvalidFlag) return $this->StewardshipAddress;
			if ($this->MailingAddress && !$this->MailingAddress->InvalidFlag) return $this->MailingAddress;

			// Try to find any valid, current HomeAddress if member of a household
			$objHouseholdParticipationArray = $this->GetHouseholdParticipationArray();
			if (count($objHouseholdParticipationArray)) {
				$objHouseholdParticipation = $objHouseholdParticipationArray[0];
				$objAddressArray = Address::LoadArrayByHouseholdIdCurrentFlag($objHouseholdParticipation->HouseholdId, true);
				foreach ($objAddressArray as $objAddressToTest) {
					if (!$objAddressToTest->InvalidFlag) return $objAddressToTest;
				}
			}

			// Otherwise, just return any current and valid address that can be found
			foreach ($this->GetAddressArray(QQ::OrderBy(QQN::Address()->AddressTypeId, QQN::Address()->Id, false)) as $objAddress) {
				if ($objAddress->CurrentFlag && !$objAddress->InvalidFlag) {
					return $objAddress;
				}
			}

			return null;
		}

		/**
		 * Calculate and refresh the Person's Age (if applicable)
		 * @param boolean $blnSave whether or not to save the Person object
		 * @return integer the age
		 */
		public function RefreshAge($blnSave = true) {
			if (!$this->dttDateOfBirth)
				$this->intAge = null;
			else
				$this->intAge = QDateTime::Now()->Difference($this->dttDateOfBirth)->Years;

			if ($blnSave) $this->Save();
			return $this->intAge;
		}

		/**
		 * This will try and figure out the primary address and return it as an object
		 * (used for things like pre-filling address fields on my.alcf
		 * @return Address
		 */
		public function DeducePrimaryAddress() {
			$objAddress = null;

			if ($this->MailingAddress) {
				return $this->MailingAddress;
			} else {
				$objHouseholdParticipationArray = $this->GetHouseholdParticipationArray();
				if (count($objHouseholdParticipationArray) > 1) {
					return null;
				} else if (count($objHouseholdParticipationArray) == 1) {
					$objHouseholdParticipation = $objHouseholdParticipationArray[0];
					$objAddressArray = Address::LoadArrayByHouseholdIdCurrentFlag($objHouseholdParticipation->HouseholdId, true);
					foreach ($objAddressArray as $objAddressToTest) {
						if (!$objAddressToTest->InvalidFlag) $objAddress = $objAddressToTest;
					}
				}
			}
			
			return $objAddress;
		}

		/**
		 * This single method will refresh all the denormalized PrimaryFooText fields for Address, Phone and City.
		 * (Note that PrimaryEmailText does not exist -- it simply uses the PrimaryEmail object)
		 * @param boolean $blnSave
		 * @return void
		 */
		public function RefreshPrimaryContactInfo($blnSave = true) {
			// Get the Address Object
			$objAddress = null;

			if ($this->MailingAddress) {
				$objAddress = $this->MailingAddress;
			} else {
				$objHouseholdParticipationArray = $this->GetHouseholdParticipationArray();
				if (count($objHouseholdParticipationArray) > 1) {
					$objAddress = false;
				} else if (count($objHouseholdParticipationArray) == 1) {
					$objHouseholdParticipation = $objHouseholdParticipationArray[0];
					$objAddressArray = Address::LoadArrayByHouseholdIdCurrentFlag($objHouseholdParticipation->HouseholdId, true);
					foreach ($objAddressArray as $objAddressToTest) {
						if (!$objAddressToTest->InvalidFlag) $objAddress = $objAddressToTest;
					}
				}
			}

			// Update PrimaryAddress and PrimaryCity
			if ($objAddress === false) {
				$this->strPrimaryAddressText = 'Multiple Households';
				$this->strPrimaryCityText = 'Multiple Households';
			} else if ($objAddress) {
				$this->strPrimaryAddressText = ucwords(strtolower(trim($objAddress->Address1)));
				if ($objAddress->Address2) $this->strPrimaryAddressText .= ', ' . ucwords(strtolower(trim($objAddress->Address2)));
				$this->strPrimaryCityText = ucwords(strtolower(trim($objAddress->City)));
				$this->strPrimaryStateText = $objAddress->State;
				$this->strPrimaryZipCodeText = $objAddress->ZipCode;
			} else {
				$this->strPrimaryAddressText = null;
				$this->strPrimaryCityText = null;
				$this->strPrimaryStateText = null;
				$this->strPrimaryZipCodeText = null;
			}

			// Update PrimaryPhone
			if ($this->PrimaryPhone) {
				$this->strPrimaryPhoneText = $this->PrimaryPhone->Number;
			} else {
				if ($objAddress === false) {
					$this->strPrimaryPhoneText = 'Multiple Households';
				} else if ($objAddress && $objAddress->PrimaryPhone) {
					$this->strPrimaryPhoneText = $objAddress->PrimaryPhone->Number;
				} else {
					$objPhoneArray = $this->GetPhoneArray();
					if (count($objPhoneArray) == 1)
						$this->strPrimaryPhoneText = $objPhoneArray[0]->Number;
					else
						$this->strPrimaryPhoneText = null;
				}
			}

			if ($blnSave) $this->Save();
		}

		/**
		 * Calcluates based on this person's birthdate whether or not the person is less than 18 years old.
		 * If the person is 18 or older, OR if no birthdate is specified, then this will return false.
		 * @return boolean whether or not the person is a child
		 */
		public function IsChild() {
			if (!$this->DateOfBirth) return false;

			return ($this->Age < 18);
		}

		/**
		 * This will check and provide a "score" on a match against DOB, Gender and Mobile Phone Number.
		 * The score returned will be anything from -2 to 3.
		 * 
		 * A point is given for any item that is positively matched.
		 * The score is negative if there is any item that does NOT match.
		 * 
		 * In order for a match or non-match to take place, the data item needs to be defined on BOTH this person and in the data being passed in.
		 * 
		 * @param QDateTime $dttDateOfBirth optional
		 * @param string $strGender optional
		 * @param string $strMobilePhone optional
		 * @return integer
		 */
		public function ScoreDobGenderMobileMatch(QDateTime $dttDateOfBirth = null, $strGender = null, $strMobilePhone = null) {
			$intScore = 0;
			$blnNegativeFlag = false;

			if ($dttDateOfBirth && $this->DateOfBirth && !$this->DobGuessedFlag && !$this->DobYearApproximateFlag) {
				if ($dttDateOfBirth->IsEqualTo($this->DateOfBirth))
					$intScore++;
				else
					$blnNegativeFlag = true;
			}

			if ($strGender && $this->Gender) {
				if (trim(strtoupper($strGender) == $this->Gender))
					$intScore++;
				else
					$blnNegativeFlag = true;
			}

			if ($strMobilePhone && $this->CountPhones()) {
				$blnFound = false;
				foreach ($this->GetPhoneArray() as $objPhone) {
					if ($objPhone->PhoneTypeId != PhoneType::Home) {
						if ($strMobilePhone == $objPhone->Number) $blnFound = true;
					}
				}
				
				if ($blnFound)
					$intScore++;
				else
					$blnNegativeFlag = true;
			}
			
			return ($blnNegativeFlag) ? (-1 * $intScore) : $intScore;
		}


		/**
		 * This is a bit similar to a db-load based version of Person::IsNameMatch().
		 * It will utilize querying to find any and all Person objects that do a normalized name match based on the name item objects.
		 * @param string $strFirstName
		 * @param string $strLastName
		 * @return Person[]
		 */
		public static function LoadArrayByNameMatch($strFirstName, $strLastName) {
			// Calculate the normalized name items were are using
			$strNameItemArray = NameItem::GetNormalizedArrayFromNameString($strFirstName . ' ' . $strLastName);
			
			// Create an Integer[] of NameItem IDs
			$intNameItemIdArray = array();
			foreach ($strNameItemArray as $strNameItem) {
				$objNameItem = NameItem::LoadByName($strNameItem);
				if (!$objNameItem) return array();
				$intNameItemIdArray[] = $objNameItem->Id;
			}

			// Iterate to setup the Condition and Clauses
			$objCondition = QQ::All();
			$objClauses = array();
			$intIndex = 0;

			foreach ($intNameItemIdArray as $intNameItemId) {
				$intIndex++;
				$strAlias = 'assn_' . $intIndex;

				if ($intIndex == 2) $objClauses[] = QQ::Distinct();

				$objClauses[] = QQ::CustomFrom('person_nameitem_assn', $strAlias);
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Equal(QQ::CustomNode($strAlias . '.person_id'), QQN::Person()->Id),
					QQ::Equal(QQ::CustomNode($strAlias . '.name_item_id'), $intNameItemId)
				);
			}

			return Person::QueryArray($objCondition, $objClauses);
		}

		/**
		 * This will check to see if this person has a near-match on the first and last name provided.
		 * It will check first name against nicknames, it will check last name against prior last names
		 * @param string $strFirstName
		 * @param string $strLastName
		 * @return boolean whether or not there was a match
		 */
		public function IsNameMatch($strFirstName, $strLastName) {
			$strFirstName = NameItem::NormalizeNameItem($strFirstName);
			$strLastName = NameItem::NormalizeNameItem($strLastName);

			// Check First Name
			if ($strFirstName != NameItem::NormalizeNameItem($this->FirstName)) {
				// If we are here, then we should try and match against the nickname
				$blnFound = false;

				foreach (explode(',', $this->Nickname) as $strName) {
					if (strlen(trim($strName)) && ($strFirstName == NameItem::NormalizeNameItem($strName)))
						$blnFound = true;
				}

				if (!$blnFound) return false;
			}

			// So far, so good!  If we are here, then the first name is valid
			// Now, let's check the last name
			if ($strLastName != NameItem::NormalizeNameItem($this->LastName)) {
				// If we are here, then we should try and match against the nickname
				$blnFound = false;

				foreach (explode(',', $this->PriorLastNames) as $strName) {
					if (strlen(trim($strName)) && ($strLastName == NameItem::NormalizeNameItem($strName)))
						$blnFound = true;
				}

				if (!$blnFound) return false;
			}

			// If we are here, then we've succeeded!
			return true;
		}
		
		/**
		 * This will use CheckName to determine a name match and do a match on either the home or mailing address... will return true
		 * if the names match AND at least one of the addresses match
		 * @param string $strFirstName
		 * @param string $strLastName
		 * @param Address $objHomeAddress required
		 * @param Address $objMailingAddress optional
		 * @return boolean whether or not there was a match
		 */
		public function IsNameAndAddressMatch($strFirstName, $strLastName, Address $objHomeAddress, Address $objMailingAddress = null) {
			// Check Names, and return FALSE if does not match
			if (!$this->IsNameMatch($strFirstName, $strLastName)) return false;

			// If we are here, the the name matched.
			// Now let's match home and possibly mailing against any of the addresses that belong to this person
			foreach ($this->GetAllAssociatedAddressArray() as $objAddress) {
				if ($objHomeAddress->IsEqualTo($objAddress)) return true;
				if ($objMailingAddress && $objMailingAddress->IsEqualTo($objAddress)) return true;
			}

			// If we are here, we did not find an address match
			return false;
		}

		/**
		 * Returns true if this person is an individual (has no household participation records and is not the head of any household)
		 * @return boolean
		 */
		public function IsIndividual() {
			if ($this->CountHouseholdParticipations()) return false;
			if ($this->HouseholdAsHead) return false;
			return true;
		}

		const HouseholdStatusNone = 1;
		const HouseholdStatusHeadOfOne = 2;
		const HouseholdStatusHeadOfFamily = 3;
		const HouseholdStatusMemberOfOne = 4;
		const HouseholdStatusMemberOfMultiple = 5;
		const HouseholdStatusError = 10;

		/**
		 * Gives the HouseholdStatus constant for this person, based on this person's role(s) in households.
		 * @return integer
		 */
		public function GetHouseholdStatus() {
			$intHouseholdParticipationCount = $this->CountHouseholdParticipations();

			// Not part of any households
			if (!$intHouseholdParticipationCount) {
				if ($this->HouseholdAsHead) return self::HouseholdStatusError;
				return self::HouseholdStatusNone;
			}

			// Head of a Household
			if ($this->HouseholdAsHead) {
				if ($intHouseholdParticipationCount > 1) return self::HouseholdStatusError;

				if ($this->HouseholdAsHead->CountHouseholdParticipations() == 1) {
					return self::HouseholdStatusHeadOfOne;
				} else {
					return self::HouseholdStatusHeadOfFamily;
				}
			}

			// Member of 1 or more households, head of none
			if ($intHouseholdParticipationCount == 1)
				return self::HouseholdStatusMemberOfOne;
			else
				return self::HouseholdStatusMemberOfMultiple;

			// We should never be here
			return self::HouseholdStatusError;
		}

		/**
		 * Given a Person to be related to an a RelationshipTypeId, this will create BOTH ends of
		 * the relationship (e.g. TWO relationship records).
		 * 
		 * If a relationship of any kind is already defined between these two individuals, this will
		 * return null and make no changes.
		 * 
		 * Otherwise, this will return the relationship record for this person.
		 * 
		 * If either THIS or $objWithPerson has not yet been saved, this will throw a QCallerException
		 * 
		 * @param Person $objWithPerson
		 * @param integer $intRelationshipTypeId
		 * @return Relationship
		 */
		public function AddRelationship(Person $objWithPerson, $intRelationshipTypeId) {
			if (!$objWithPerson->Id) throw new QCallerException('Attempting to add relationship with an unsaved Person record');
			if (!$this->intId) throw new QCallerException('Attempting to add relationship for an unsaved Person record');

			// Ensure no relationship already exists
			if (Relationship::LoadByPersonIdRelatedToPersonId($this->intId, $objWithPerson->Id)) return null;
			if (Relationship::LoadByPersonIdRelatedToPersonId($objWithPerson->Id, $this->intId)) return null;

			// Figure out the "Opposite" relationship to create
			switch ($intRelationshipTypeId) {
				case RelationshipType::Child:
					$intOppositeRelationship = RelationshipType::Parental;
					break;
				case RelationshipType::Parental:
					$intOppositeRelationship = RelationshipType::Child;
					break;
				case RelationshipType::Sibling:
					$intOppositeRelationship = RelationshipType::Sibling;
					break;
				case RelationshipType::Grandchild:
					$intOppositeRelationship = RelationshipType::Grandparent;
					break;
				case RelationshipType::Grandparent:
					$intOppositeRelationship = RelationshipType::Grandchild;
					break;
				default:
					throw new Exception('Invalid Relationship Type Id: ' . $intRelationshipTypeId);
			}

			// Create the relationship
			$objRelationship = new Relationship();
			$objRelationship->Person = $this;
			$objRelationship->RelatedToPerson = $objWithPerson;
			$objRelationship->RelationshipTypeId = $intRelationshipTypeId;
			$objRelationship->Save();

			// Create the other end of the relationship
			$objOtherRelationship = new Relationship();
			$objOtherRelationship->Person = $objWithPerson;
			$objOtherRelationship->RelatedToPerson = $this;
			$objOtherRelationship->RelationshipTypeId = $intOppositeRelationship;
			$objOtherRelationship->Save();

			// Return
			return $objRelationship;
		}

		/**
		 * Recalculates this member's Membership Status and updates MembershipStatusTypeId
		 * based on the calculation.  Will call save if asked to do so
		 * @param boolean $blnSave whether or not to call save after updating
		 * @return integer the new/updated TypeId
		 */
		public function RefreshMembershipStatusTypeId($blnSave = true) {
			// If this Individual record isn't saved yet, then we are automatically not a member
			if (!$this->intId) {
				$this->intMembershipStatusTypeId = MembershipStatusType::NonMember;
				if ($blnSave) $this->Save();
				return $this->intMembershipStatusTypeId;
			}
			
			// Pull the most recent Membership
			$objMembership = Membership::QuerySingle(QQ::Equal(QQN::Membership()->PersonId, $this->intId), QQ::OrderBy(QQN::Membership()->DateStart, false));

			// If no membership
			if (!$objMembership) {
				// TODO: Check to see if "Child of Member"
				
				$this->intMembershipStatusTypeId = MembershipStatusType::NonMember;
				if ($blnSave) $this->Save();
				return $this->intMembershipStatusTypeId;
			}

			// If no EndDate, or EndDate is in the future
			if (!$objMembership->DateEnd || $objMembership->DateEnd->IsLaterThan(QDateTime::Now(false))) {
				$this->intMembershipStatusTypeId = MembershipStatusType::Member;
				if ($blnSave) $this->Save();
				return $this->intMembershipStatusTypeId;
			}

			// Check to see if we're deceased
			if ($objMembership->TerminationReason == MembershipStatusType::ToString(MembershipStatusType::Deceased)) {
				$this->intMembershipStatusTypeId = MembershipStatusType::Deceased;
				return $this->intMembershipStatusTypeId;
			}
			
			// Otherwise, we are a Past member
			$this->intMembershipStatusTypeId = MembershipStatusType::FormerMember;
			if ($blnSave) $this->Save();
			return $this->intMembershipStatusTypeId;
		}

		/**
		 * Recalculates this member's Marital Status and updates MaritalStatusTypeId
		 * based on the calculation.  Will call save if asked to do so
		 * @param boolean $blnSave whether or not to call save after updating
		 * @return integer the new/updated TypeId
		 */
		public function RefreshMaritalStatusTypeId($blnSave = true) {
			// If this Individual record isn't saved yet, then we are automatically Not Specified
			if (!$this->intId) {
				$this->intMaritalStatusTypeId = MaritalStatusType::NotSpecified;
				if ($blnSave) $this->Save();
				return $this->intMaritalStatusTypeId;
			}

			// Pull the most recent Marriage
			$objMarriage = $this->GetMostRecentMarriage();

			// If no marriage
			if (!$objMarriage) {
				// If we were previously specified as Single, then keep it -- otherwise, we are "Not Specified"
				if ($this->intMaritalStatusTypeId == MaritalStatusType::Single) {
					$this->intMaritalStatusTypeId = MaritalStatusType::Single;
				} else {
					$this->intMaritalStatusTypeId = MaritalStatusType::NotSpecified;
				}
				if ($blnSave) $this->Save();
				return $this->intMaritalStatusTypeId;
			}

			// There was a marriage -- marital status is dependent on the marriage status
			switch ($objMarriage->MarriageStatusTypeId) {
				case MarriageStatusType::Married:
					$this->intMaritalStatusTypeId = MaritalStatusType::Married;
					break;
				case MarriageStatusType::Separated:
					$this->intMaritalStatusTypeId = MaritalStatusType::Separated;
					break;
				default:
					$this->intMaritalStatusTypeId = MaritalStatusType::Single;
					break;
			}

			if ($blnSave) $this->Save();
			return $this->intMaritalStatusTypeId;
		}

		/**
		 * Returns the most recent (or current) Marriage Record for this person
		 * @return Marriage
		 */
		public function GetMostRecentMarriage() {
			return Marriage::QuerySingle(QQ::Equal(QQN::Marriage()->PersonId, $this->intId), QQ::OrderBy(QQN::Marriage()->DateStart, false));			
		}

		/**
		 * Creates a new Marriage record and refreshes the marrital status for both this person and the spouse
		 * @param integer $intMarriageStatusTypeId (defaults to "Married")
		 * @param Person $objSpouse the spouse
		 * @param QDateTime $dttStartDate the start date of the marriage
		 * @param QDateTime $dttEndDate the end date of the marriage
		 * @return Marriage
		 */
		public function CreateMarriageWith(Person $objSpouse = null, QDateTime $dttStartDate = null, QDateTime $dttEndDate = null, $intMarriageStatusTypeId = MarriageStatusType::Married) {
			$objMarriage = new Marriage();
			$objMarriage->Person = $this;
			$objMarriage->MarriedToPerson = $objSpouse;
			$objMarriage->MarriageStatusTypeId = $intMarriageStatusTypeId;
			$objMarriage->DateStart = $dttStartDate;
			$objMarriage->DateEnd = $dttEndDate;
			$objMarriage->Save();

			// Updated Link record (if applicable)
			if ($objSpouse) $objMarriage->UpdateLinkedMarriage();

			// Refresh Stats
			$this->RefreshMaritalStatusTypeId();
			if ($objSpouse) $objSpouse->RefreshMaritalStatusTypeId();

			return $objMarriage;
		}

		/**
		 * Given a temporary file path on the server, this will save the file as a HeadShot for this Person
		 * @param string $strTempFilePath
		 * @param QDateTime $dttDateUploaded optional parameter -- will be set to Now() if null is passed in
		 * @return HeadShot
		 */
		public function SaveHeadShot($strTempFilePath, $dttDateUploaded = null) {
			$objHeadShot = new HeadShot();
			$objHeadShot->PersonId = $this->intId;
			$objHeadShot->DateUploaded = ($dttDateUploaded) ? $dttDateUploaded : QDateTime::Now();
			$objHeadShot->SaveHeadShot($strTempFilePath);
			
			return $objHeadShot;
		}

		public function SetCurrentHeadShot(HeadShot $objHeadShot = null) {
			if (!$objHeadShot) {
				$this->CurrentHeadShotId = null;
				$this->Save();
			} else {
				if ($objHeadShot->PersonId != $this->intId)
					throw new QCallerException('Cannot set Current headshot for a headshot that does not belong to this person');
				$this->CurrentHeadShot = $objHeadShot;
				$this->Save();
			}
		}

		/**
		 * Saves a Comment for this Person.  Note that the PostDate is optional.  If none is provided, the system
		 * will just use QDateTime::Now()
		 * 
		 * @param Login $objLogin the login/user who posted the comment
		 * @param string $strComment the comment itself
		 * @param integer $intCommentPrivacyTypeId
		 * @param integer $intCommentCategoryId
		 * @param QDateTime $dttPostDate
		 * @param QDateTime $dttActionDate
		 * @return Comment
		 */
		public function SaveComment(Login $objLogin, $strComment, $intCommentPrivacyTypeId, $intCommentCategoryId, QDateTime $dttPostDate = null, QDateTime $dttActionDate = null) {
			$objComment = new Comment();
			$objComment->Person = $this;
			$objComment->PostedByLogin = $objLogin;
			$objComment->CommentPrivacyTypeId = $intCommentPrivacyTypeId;
			$objComment->CommentCategoryId = $intCommentCategoryId;
			$objComment->Comment = $strComment;
			$objComment->DatePosted = ($dttPostDate ? $dttPostDate : QDateTime::Now());
			if ($dttActionDate) $objComment->DateAction = $dttActionDate;
			$objComment->Save();

			return $objComment;
		}

		
		
		
		public static function LoadArrayBySearch($strName, $objClauses = null) {
			$objCondition = QQ::All();
			if (!$objClauses) $objClauses = array();
			self::PrepareQqForSearch($strName, $objCondition, $objClauses);
			return Person::QueryArray($objCondition, $objClauses);
		}

		/**
		 * Given a search term, this will try and match all similarly matched individuals.
		 * This will utilize soundex and other indexing methodologies.
		 * 
		 * @param string $strName
		 * @param QQCondition $objCondition
		 * @param QQClause[] $objClauses
		 * @param QQNodePerson $objPersonNode
		 * @return void
		 */
		public static function PrepareQqForSearch($strName, QQCondition &$objCondition, &$objClauses, QQNodePerson $objPersonNode = null) {
			if (!$objPersonNode) $objPersonNode = QQN::Person();
			$strNameItemArray = NameItem::GetNormalizedArrayFromNameString($strName, true);

			// First, get the applicable NameItem
			$intNameItemIdArrayArray = array();

			foreach ($strNameItemArray as $strNameItem) {
				$intNameItemIdArray = array();

				$strQuery = sprintf("SELECT * FROM name_item WHERE (soundex(name) = soundex('%s') OR name LIKE '%s%%')", mysql_escape_string($strNameItem), mysql_escape_string($strNameItem));

				$objNameItemArray = NameItem::InstantiateDbResult(NameItem::GetDatabase()->Query($strQuery));

				foreach ($objNameItemArray as $objNameItem) $intNameItemIdArray[] = $objNameItem->Id;

				$intNameItemIdArrayArray[] = $intNameItemIdArray;
			}

			// Build the search array from Person
			$intIndex = 0;

			foreach ($intNameItemIdArrayArray as $intNameItemIdArray) {
				if (!count($intNameItemIdArray)) {
					$objCondition = QQ::None();
					return;
				}

				$intIndex++;
				$strAlias = 'assn_' . $intIndex;

				if ($intIndex == 2) $objClauses[] = QQ::Distinct();

				$objClauses[] = QQ::CustomFrom('person_nameitem_assn', $strAlias);
				if (count($intNameItemIdArray) == 1) {
					$objCondition = QQ::AndCondition(
						$objCondition,
						QQ::Equal(QQ::CustomNode($strAlias . '.person_id'), $objPersonNode->Id),
						QQ::Equal(QQ::CustomNode($strAlias . '.name_item_id'), $intNameItemIdArray[0])
					);
				} else {
					$objCondition = QQ::AndCondition(
						$objCondition,
						QQ::Equal(QQ::CustomNode($strAlias . '.person_id'), $objPersonNode->Id),
						QQ::In(QQ::CustomNode($strAlias . '.name_item_id'), $intNameItemIdArray)
					);
				}
			}
		}

		/**
		 * Given some very limited information, this will create a Person record for it
		 * @param string $strFirstName
		 * @param string $strMiddle
		 * @param string $strLastName
		 * @param boolean $blnMaleFlag
		 * @param string $strEmail optional
		 * @param string $strPhone optional
		 * @param integer $intPhoneTypeId optional unless $strPhone has been specified
		 * @param integer $intMobileProviderId optional
		 * @return Person
		 */
		public static function CreatePerson($strFirstName, $strMiddle, $strLastName, $blnMaleFlag, $strEmail = null, $strPhone = null, $intPhoneTypeId = null, $intMobileProviderId = null) {
			$strFirstName = trim($strFirstName);
			$strMiddle = trim($strMiddle);
			$strLastName = trim($strLastName);

			switch (strlen($strMiddle)) {
				case 1:
					$strMiddle = strtoupper($strMiddle);
					break;
				case 2:
					if (substr($strMiddle, 1, 1) == '.')
						$strMiddle = strtoupper(substr($strMiddle, 0, 1));
					break;
			}

			$objPerson = new Person();
			$objPerson->FirstName = $strFirstName;
			$objPerson->MiddleName = strlen($strMiddle) ? $strMiddle : null;
			$objPerson->LastName = $strLastName;

			$objPerson->RefreshMaritalStatusTypeId(false);
			$objPerson->RefreshMembershipStatusTypeId(false);
			if (!is_null($blnMaleFlag)) $objPerson->Gender = ($blnMaleFlag) ? 'M' : 'F';
			$objPerson->DeceasedFlag = false;

			$objPerson->CanEmailFlag = true;
			$objPerson->CanPhoneFlag = true;
			$objPerson->CanMailFlag = true;

			$objPerson->Save();
			$objPerson->RefreshNameItemAssociations();

			// Create Primary Contact Info (if applicable)
			$blnSaveAgain = false;

			if ($strEmail) {
				$objEmail = new Email();
				$objEmail->Person = $objPerson;
				$objEmail->Address = $strEmail;
				$objEmail->Save();

				$objPerson->PrimaryEmail = $objEmail;
				$blnSaveAgain = true;
			}

			if ($strPhone) {
				$objPhone = new Phone();
				$objPhone->Person = $objPerson;
				$objPhone->PhoneTypeId = $intPhoneTypeId;
				if ($objPhone->PhoneTypeId == PhoneType::Mobile) $objPhone->MobileProviderId = $intMobileProviderId;
				$objPhone->Number = $strPhone;
				$objPhone->Save();

				$objPerson->PrimaryPhone = $objPhone;
				$blnSaveAgain = true;
			}

			if ($blnSaveAgain) $objPerson->Save();

			return $objPerson;
		}


		/**
		 * *IF* this person can receive SMS Messages, this will return the Phone object
		 * to which SMS messages can be received.
		 * 
		 * Otherwise, this will return NULL.
		 * 
		 * @return Phone phone object that can receive SMS messages for this person or NULL if not applicable
		 * 
		 */
		public function GetSmsEnabledPhone() {
			if ($this->PrimaryPhone && $this->PrimaryPhone->IsSmsEnabled()) return $this->PrimaryPhone;
			return null;
		}


		/**
		 * Similar to the codegenned GetPhoneArray -- however this will retrieve ALL current and associated
		 * phones.  Not just personal phone numbers, but phone numbers attributed to the current home
		 * of a given household.  You must specify the household as well.  If the household is invalid (e.g.
		 * the participation doesn't exist), then this will throw.
		 * 
		 * If NO household is passed in (or NULL), then this will act just like GetPhoneArray, only retrieving
		 * personal phone numbers.
		 * 
		 * @return Phone[]
		 */
		public function GetAllAssociatedPhoneArray(Household $objHousehold = null) {
			$objToReturn = array();

			if ($objHousehold) {
				if (!HouseholdParticipation::LoadByPersonIdHouseholdId($this->intId, $objHousehold->Id))
					throw new QCallerException('Person does not exist in this household');

				if ($objAddress = $objHousehold->GetCurrentAddress()) {
					foreach ($objAddress->GetPhoneArray() as $objPhone) {
						$objToReturn[] = $objPhone;
					}
				}
			}

			foreach ($this->GetPhoneArray(QQ::OrderBy(QQN::Phone()->Id)) as $objPhone) {
				$objToReturn[] = $objPhone;
			}
			
			return $objToReturn;
		}
		
		/**
		 * For the my.alcf site this will return the MobilePhone record, if any is found
		 * @return Phone or null
		 */
		public function DeduceMobilePhone() {
			if ($this->PrimaryPhone &&
				($this->PrimaryPhone->PhoneTypeId == PhoneType::Mobile)) return $this->PrimaryPhone;

			foreach ($this->GetPhoneArray() as $objPhone)
				if ($objPhone->PhoneTypeId == PhoneType::Mobile) return $objPhone;

			return null;
		}

		/**
		 * Similar to the codegenned GetAddressArray -- however this will retrieve ALL current and associated
		 * Addresss.  Not just personal addresses, but addresses attributed to the current home
		 * of a given household.  You must specify the household as well.  If the household is invalid (e.g.
		 * the participation doesn't exist), then this will throw.
		 * 
		 * If NO household is passed in (or NULL), then this will return values for ALL associated households.
		 * 
		 * @return Address[]
		 */
		public function GetAllAssociatedAddressArray(Household $objHousehold = null, $bUseCurrentFlag=true) {
			$objToReturn = array();

			// Add Address from a specific household
			if ($objHousehold) {
				if (!HouseholdParticipation::LoadByPersonIdHouseholdId($this->intId, $objHousehold->Id))
					throw new QCallerException('Person does not exist in this household');
				foreach ($objHousehold->GetAddressArray() as $objAddress) $objToReturn[] = $objAddress;

			// Add addresses from all households
			} else foreach ($this->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
				foreach ($objHouseholdParticipation->Household->GetAddressArray() as $objAddress) $objToReturn[] = $objAddress;
			}

			// Now add personal addresses
			foreach ($this->GetAddressArray(QQ::OrderBy(QQN::Address()->Id)) as $objAddress) {
				if ($bUseCurrentFlag) {
					if ($objAddress->CurrentFlag) $objToReturn[] = $objAddress;
				} else {
					$objToReturn[] = $objAddress;
				}
			}

			return $objToReturn;
		}

		/**
		 * Sets an attribute value for this person.
		 * Data Type of $mixValue is dependent on the Data Type for the attribute being set.
		 * @param Attribute $objAttribute
		 * @param mixed $mixValue
		 * @return AttributeValue
		 */
		public function SetAttribute(Attribute $objAttribute, $mixValue) {
			$objValue = AttributeValue::LoadByAttributeIdPersonId($objAttribute->Id, $this->intId);
			if (!$objValue) {
				$objValue = new AttributeValue();
				$objValue->Attribute = $objAttribute;
				$objValue->Person = $this;
			}

			switch($objAttribute->AttributeDataTypeId) {
				case AttributeDataType::Text:
					$objValue->TextValue = $mixValue;
					break;
				
				case AttributeDataType::Checkbox:
					$objValue->BooleanValue = $mixValue;
					break;

				case AttributeDataType::Date:
					$objValue->DateValue = $mixValue;
					break;

				case AttributeDataType::ImmutableSingleDropdown:
				case AttributeDataType::MutableSingleDropdown:
					$objValue->SingleAttributeOption = $mixValue;
					break;

				case AttributeDataType::ImmutableMultipleDropdown:
				case AttributeDataType::MutableMultipleDropdown:
					$objValue->Save();
					$objValue->UnassociateAllAttributeOptionsAsMultiple();
					foreach ($mixValue as $objOption) {
						$objValue->AssociateAttributeOptionAsMultiple($objOption);
					}
					break;
				default:
					throw new Exception('Unhandled Attribute Data Type');
			}
			
			$objValue->Save();
			return $objValue;
		}

		/**
		 * This will return the email "to use" for COmmunication/Email lists.
		 * Typically, we will use a Person's PrimaryEmail address if s/he is
		 * associated with a CommunicationList.  However, if no primary is defined,
		 * then we will try and pull the emial address with the
		 * lowest ID.
		 * 
		 * Note that it IS POSSIBLE for this to return NULL if the person has absoultely
		 * no email addresses associated with him/her.
		 * @return string
		 */
		public function GetEmailToUseForCommLists() {
			if ($this->PrimaryEmail)
				$strEmail = $this->PrimaryEmail->Address;
			else {
				$objArray = $this->GetEmailArray(QQ::OrderBy(QQN::Email()->Id));
				if (count($objArray))
					$strEmail = $objArray[0]->Address;
				else
					$strEmail = null;
			}
			
			return $strEmail;
		}


		/**
		 * Merges two records together.
		 * @param Person $objPersonMergeWith
		 * @param boolean $blnUseThisDetails boolean on whether to use this person's Person object details, or if false, use the PersonMergeWith's
		 */
		public function MergeWith(Person $objPersonMergeWith, $blnUseThisDetails) {
			QLog::Log(sprintf('Merging %s (ID %s) with %s (ID %s) - %s', $this->Name, $this->Id, $objPersonMergeWith->Name, $objPersonMergeWith->Id,
				$blnUseThisDetails ? 'left' : 'right'));

			Person::GetDatabase()->TransactionBegin();

			// Household Participation Records
			if ($this->HouseholdAsHead && $objPersonMergeWith->HouseholdAsHead) {
				$this->HouseholdAsHead->MergeHousehold($objPersonMergeWith->HouseholdAsHead, $this);
			} else if ($this->HouseholdAsHead) {
				// Go through each MergeWith HouseholdParticipation -- Throw if it's another household, Delete if it's this Household-as-Head
				foreach ($objPersonMergeWith->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
					if ($objHouseholdParticipation->HouseholdId != $this->HouseholdAsHead->Id)
						throw new QCallerException('Cannot merge this head of household with a person record that exists in other households');
					else {
						$objHouseholdParticipation->Delete();
					}
				}
			} else if ($objHousehold = $objPersonMergeWith->HouseholdAsHead) {
				// Go through each of this's HouseholdParticipation -- Throw if it's another household, Delete if it's MergeWith's Household-as-Head
				foreach ($this->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
					if ($objHouseholdParticipation->HouseholdId != $objPersonMergeWith->HouseholdAsHead->Id)
						throw new QCallerException('Cannot merge MergeWith head of household with this person record which exists in other households');
					else {
						$objHouseholdParticipation->Delete();
					}
				}

				$objHousehold->HeadPerson = $this;
				$objHousehold->Save();
				$objParticipation = HouseholdParticipation::LoadByPersonIdHouseholdId($objPersonMergeWith->Id, $objHousehold->Id);
				$objParticipation->PersonId = $this->Id;
				$objParticipation->Save();
			} else {
				// Otherwise: members of multiple households! but head of none
				foreach ($objPersonMergeWith->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
					if (HouseholdParticipation::LoadByPersonIdHouseholdId($this->Id, $objHouseholdParticipation->HouseholdId)) {
						$objHouseholdParticipation->Delete();
					} else {
						$objHouseholdParticipation->PersonId = $this->Id;
						$objHouseholdParticipation->Save();
					}
				}
			}

			if (!$blnUseThisDetails) {
				$this->FirstName = $objPersonMergeWith->FirstName;
				$this->MiddleName = $objPersonMergeWith->MiddleName;
				$this->LastName = $objPersonMergeWith->LastName;
				$this->MailingLabel = $objPersonMergeWith->MailingLabel;
				$this->PriorLastNames = $objPersonMergeWith->PriorLastNames;
				$this->Nickname = $objPersonMergeWith->Nickname;
				$this->Title = $objPersonMergeWith->Title;
				$this->Suffix = $objPersonMergeWith->Suffix;
				$this->Gender = $objPersonMergeWith->Gender;
				$this->DateOfBirth = $objPersonMergeWith->DateOfBirth;
				$this->DobYearApproximateFlag = $objPersonMergeWith->DobYearApproximateFlag;
				$this->DobGuessedFlag = $objPersonMergeWith->DobGuessedFlag;
				$this->Age = $objPersonMergeWith->Age;
				$this->DeceasedFlag = $objPersonMergeWith->DeceasedFlag;
				$this->DateDeceased = $objPersonMergeWith->DateDeceased;
			}


			// Attributes
			foreach ($objPersonMergeWith->GetAttributeValueArray() as $objAttributeValue) {
				// Check for double-defined attributes
				if ($objDoubleDefinedAttribute = AttributeValue::LoadByAttributeIdPersonId($objAttributeValue->AttributeId, $this->Id)) {
					if ($blnUseThisDetails) {
						$objAttributeValue->Delete();
					} else {
						$objDoubleDefinedAttribute->Delete();
						$objAttributeValue->PersonId = $this->Id;
						$objAttributeValue->Save();
					}

				// Nothing double-defined -- just move it over!
				} else {
					$objAttributeValue->PersonId = $this->Id;
					$objAttributeValue->Save();
				}
			}


			// Comments
			foreach ($objPersonMergeWith->GetCommentArray() as $objComment) {
				$objComment->PersonId = $this->Id;
				$objComment->Save();
			}


			// Memberships
			foreach ($objPersonMergeWith->GetMembershipArray() as $objMembership) {
				$objMembership->PersonId = $this->Id;
				$objMembership->Save();
			}


			// Communication Lists
			foreach ($objPersonMergeWith->GetCommunicationListArray() as $objCommList) {
				$objPersonMergeWith->UnassociateCommunicationList($objCommList);
				if (!$this->IsCommunicationListAssociated($objCommList)) $this->AssociateCommunicationList($objCommList);
			}


			// Head Shots
			foreach ($objPersonMergeWith->GetHeadShotArray() as $objHeadShot) {
				$objHeadShot->PersonId = $this->Id;
				$objHeadShot->Save();
			}
			

			// Group Participation
			foreach ($objPersonMergeWith->GetGroupParticipationArray() as $objGroupParticipation) {
				$objGroupParticipation->PersonId = $this->Id;
				$objGroupParticipation->Save();
			}


			// NameItemAssn
			$objPersonMergeWith->UnassociateAllNameItems();


			// Marrriage Records
			foreach ($objPersonMergeWith->GetMarriageArray() as $objMarriage) {
				$this->CreateMarriageWith($objMarriage->MarriedToPerson, $objMarriage->DateStart, $objMarriage->DateEnd, $objMarriage->MarriageStatusTypeId);
				$objMarriage->DeleteThisAndLinked();
			}
			foreach ($objPersonMergeWith->GetMarriageAsMarriedToArray() as $objMarriage) {
				$this->CreateMarriageWith($objMarriage->Person, $objMarriage->DateStart, $objMarriage->DateEnd, $objMarriage->MarriageStatusTypeId);
				$objMarriage->DeleteThisAndLinked();
			}


			// Family Relationships
			foreach ($objPersonMergeWith->GetRelationshipArray() as $objRelationship) {
				if (!Relationship::LoadByPersonIdRelatedToPersonId($this->Id, $objRelationship->RelatedToPersonId))
					$this->AddRelationship($objRelationship->RelatedToPerson, $objRelationship->RelationshipTypeId);
				$objRelationship->DeleteThisAndLinked();
			}
			foreach ($objPersonMergeWith->GetRelationshipAsRelatedToArray() as $objRelationship) {
				if (!Relationship::LoadByPersonIdRelatedToPersonId($this->Id, $objRelationship->PersonId))
					$this->AddRelationship($objRelationship->Person, $objRelationship->RelationshipTypeId);
				$objRelationship->DeleteThisAndLinked();
			}


			// Phones
			foreach ($objPersonMergeWith->GetPhoneArray() as $objContact) {
				$objContact->PersonId = $this->Id;
				$objContact->Save();
			}


			// Addresses
			foreach ($objPersonMergeWith->GetAddressArray() as $objContact) {
				$objContact->PersonId = $this->Id;
				$objContact->Save();
			}


			// Email
			foreach ($objPersonMergeWith->GetEmailArray() as $objContact) {
				$objContact->PersonId = $this->Id;
				$objContact->Save();
			}


			// Other Contact Info
			foreach ($objPersonMergeWith->GetOtherContactInfoArray() as $objContact) {
				$objContact->PersonId = $this->Id;
				$objContact->Save();
			}


			// Checking Account Lookups
			foreach ($objPersonMergeWith->GetCheckingAccountLookupArray() as $objCheckingAccount) {
				$objPersonMergeWith->UnassociateCheckingAccountLookup($objCheckingAccount);
				if (!$this->IsCheckingAccountLookupAssociated($objCheckingAccount)) $this->AssociateCheckingAccountLookup($objCheckingAccount);
			}


			// Stewardship Contributions
			foreach ($objPersonMergeWith->GetStewardshipContributionArray() as $objStewardship) {
				$objStewardship->PersonId = $this->Id;
				$objStewardship->Save();
			}


			// Stewardship Pledges
			foreach ($objPersonMergeWith->GetStewardshipPledgeArray() as $objPledge) {
				// Check for double-defined pledge
				if ($objDoubleDefinedPledge = StewardshipPledge::LoadByPersonIdStewardshipFundId($this->Id, $objPledge->StewardshipFundId)) {
					if ($blnUseThisDetails) {
						$objPledge->Delete();
					} else {
						$objDoubleDefinedPledge->Delete();
						$objPledge->PersonId = $this->Id;
						$objPledge->Save();
					}
					
				// Nope, just move it over like normal
				} else {
					$objPledge->PersonId = $this->Id;
					$objPledge->Save();
				}
			}

			// Online Donations
			foreach ($objPersonMergeWith->GetOnlineDonationArray() as $objOnlineDonation) {
				$objOnlineDonation->PersonId = $this->Id;
				$objOnlineDonation->Save();
			}

			// Public Login
			if ($objPublicLogin = $objPersonMergeWith->PublicLogin) {
				$objPublicLogin->PersonId = $this->Id;
				$objPublicLogin->Save();
			}

			// Events and Classes
			foreach ($objPersonMergeWith->GetSignupEntryArray() as $objSignupEntry) {
				$objSignupEntry->PersonId = $this->Id;
				$objSignupEntry->Save();
			}

			foreach ($objPersonMergeWith->GetSignupEntryAsSignupByArray() as $objSignupEntry) {
				$objSignupEntry->SignupByPersonId = $this->Id;
				$objSignupEntry->Save();
			}

			foreach ($objPersonMergeWith->GetClassRegistrationArray() as $objClassRegistration) {
				$objClassRegistration->PersonId = $this->Id;
				$objClassRegistration->Save();
			}

			// Stewardship Post Line Items
			foreach ($objPersonMergeWith->GetStewardshipPostLineItemArray() as $objStewardship) {
				$objStewardship->PersonId = $this->Id;
				$objStewardship->Save();
			}


			// Email Message Route
			foreach ($objPersonMergeWith->GetEmailMessageRouteArray() as $objEmailMessageRoute) {
				$objEmailMessageRoute->PersonId = $this->Id;
				$objEmailMessageRoute->Save();
			}


			// Search Query
			foreach ($objPersonMergeWith->GetSearchQueryArray() as $objSearchQuery) {
				$objSearchQuery->PersonId = $this->Id;
				$objSearchQuery->Save();
			}


			// Final Refresh/Cleanup
			$this->RefreshAge(false);
			$this->RefreshMaritalStatusTypeId(false);
			$this->RefreshMembershipStatusTypeId(false);
			$this->RefreshPrimaryContactInfo(false);

			$this->Save();
			$this->RefreshNameItemAssociations();

			$objPersonMergeWith->Delete();
			Person::GetDatabase()->TransactionCommit();
		}

		/**
		 * Specifies whether the Login can edit this person's email address information.
		 * If the person has a linked PublicLogin record, then only CHMS Administrators can edit the email address info.
		 * @param Login $objLogin
		 * @return boolean
		 */
		public function IsLoginCanEditEmailAddress(Login $objLogin) {
			if (!$objLogin->IsPermissionAllowed(PermissionType::EditData)) return false;
			if ($objLogin->RoleTypeId == RoleType::ChMSAdministrator) return true;
			if ($this->PublicLogin) return false;
			return true;
		}

		/**
		 * Given a string-based email address, this will see if this email is already associated with this person
		 * and if so, it will upgrade that email record to be "Primary".  If not, it will delete the current primary (if applicable)
		 * and create a new record for the passed-in string.
		 * @param string $strEmailAddress
		 * @param boolean $blnDeleteCurrentPrimary (default is true) whether or not to delete the current primary
		 */
		public function ChangePrimaryEmailTo($strEmailAddress, $blnDeleteCurrentPrimary = true) {
			$strEmailAddress = trim(strtolower($strEmailAddress));
			
			// If what was passed in is already primary, then do nothing
			if ($this->PrimaryEmail && ($this->PrimaryEmail->Address == $strEmailAddress))
				return;

			// If what was passed in already exists as non-primary, upgrade it to primary and downgrade current primary to not so (if applicable)
			foreach ($this->GetEmailArray() as $objEmail) {
				if ($objEmail->Address == $strEmailAddress) {
					$this->PrimaryEmail = $objEmail;
					$this->Save();
					return;
				}
			}

			// If we are here, then we *know* we need to create a new email address

			// first, delete the current primary, if applicable
			if ($this->PrimaryEmail && $blnDeleteCurrentPrimary) {
				$this->PrimaryEmail->Delete();
				$this->PrimaryEmail = null;
			}

			$objEmail = new Email();
			$objEmail->Address = $strEmailAddress;
			$objEmail->Person = $this;
			$objEmail->Save();
			
			$this->PrimaryEmail = $objEmail;
			$this->Save();
		}

		/**
		 * If a mobile phone record already exists, update it with the following.
		 * 
		 * If one does NOT already exist, create it as a new one.
		 * 
		 * Finally, if there is no primary phone defined on this user, set the mobile phone to be primary
		 * @param string $strMobilePhone
		 */
		public function CreateOrUpdateMobilePhone($strMobilePhone) {
			// If what was passed in is already the deducedmobilephone record, then do nothing
			$objPhone = $this->DeduceMobilePhone();
			if ($objPhone && ($objPhone->Number == $strMobilePhone)) return;
			
			// Go through all mobile phones to see if this already exists
			// If it does, simply upgrade that to be "primary"
			foreach ($this->GetPhoneArray() as $objPhone) {
				if ($objPhone->Number == $strMobilePhone) {
					$objPhone->PhoneTypeId = PhoneType::Mobile;
					$objPhone->Save();
					
					$this->PrimaryPhone = $objPhone;
					$this->RefreshPrimaryContactInfo();
					return;
				}
			}

			// If we are here, then it's clearly a number that does not yet exist
			// Let's use DeduecedMobilePhone record or create new one if there are none
			$objPhone = $this->DeduceMobilePhone();
			if (!$objPhone) {
				$objPhone = new Phone();
				$objPhone->PhoneTypeId = PhoneType::Mobile;
				$objPhone->Person = $this;
			}
			$objPhone->Number = $strMobilePhone;
			$objPhone->Save();

			// Finally, if there is no primary phone, make this primary as well
			if (!$this->PrimaryPhone) {
				$this->PrimaryPhone = $objPhone;
				$this->RefreshPrimaryContactInfo();
			}
		}

		/**
		 * Given a home (and optional mailing) address validator (which is unlinked from any db entry), go ahead and make updates
		 * to this person record accordingly.
		 * 
		 * If this person is part of multiple households, it will throw an error.
		 * 
		 * If this person is part of one household, it will update the information for the household.
		 * 
		 * If this person is not part of any houseold, it will create one for him/her.
		 * 
		 * @param AddressValidator $objHomeAddressValidator
		 * @param AddressValidator $objMailingAddressValidator optional
		 * @param string $strHomePhone optional
		 */
		public function UpdateAddressInformation(AddressValidator $objHomeAddressValidator, AddressValidator $objMailingAddressValidator = null, $strHomePhone = null) {
			$objHouseholdArray = array();
			foreach ($this->GetHouseholdParticipationArray() as $objHouseholdParticipation) $objHouseholdArray[] = $objHouseholdParticipation->Household;

			// Figure Out Household Information
			if (count($objHouseholdArray) > 1) throw new QCallerException('Cannot call UpdateAddressInformation on a person who is part of multiple households: ' . $this->intId);
			if (count($objHouseholdArray)) {
				$objHousehold = $objHouseholdArray[0];
			} else {
				$objHousehold = Household::CreateHousehold($this);
			}

			// Home Address
			$objHomeAddress = $objHousehold->GetCurrentAddress();
			$objAddress = $objHomeAddressValidator->CreateAddressRecord();
			
			// Are we using the existing Household CurrentAddress record?
			if ($objHomeAddress && $objHomeAddress->IsEqualTo($objAddress)) {
				// Yes -- so all we're handling is the phones
				$objHomePhoneArray = $objHomeAddress->GetPhoneArray();

				// Are we setting a home phone?
				if ($strHomePhone) {
					// Try and find the phone within the array
					foreach ($objHomePhoneArray as $objPhone) {
						$blnFound = false;
						if ($objPhone->Number == $strHomePhone) {
							$objPhone->SetAsPrimary(null, $objHomeAddress);
							$blnFound = true;
						}
					}
					
					// If we didn't find an existing home phone, we will update the current primary (if applicable)
					// Or create a new one as primary
					if (!$blnFound) {
						if (count($objHomePhoneArray)) {
							$objHomePhoneArray[0]->Number = $strHomePhone;
							$objHomePhoneArray[0]->Save();
						} else {
							$objPhone = new Phone();
							$objPhone->Number = $strHomePhone;
							$objPhone->Address = $objHomeAddress;
							$objPhone->PhoneTypeId = PhoneType::Home;
							$objPhone->Save();
							$objPhone->SetAsPrimary(null, $objHomeAddress);
						}
					}

				// Nope - we are deleting the home phone
				} else {
					foreach ($objHomePhoneArray as $objPhone) {
						$objPhone->Delete();
					}
				}

			// Not an existing Household CurrentAddress record that matches -- so we are creating a new one
			} else {
				$objAddress->Household = $objHousehold;
				$objAddress->CurrentFlag = true;
				$objAddress->AddressTypeId = AddressType::Home;
				$objAddress->Save();

				$objHousehold->SetAsCurrentAddress($objAddress);

				// Add the phone if applicable
				if ($strHomePhone) {
					$objPhone = new Phone();
					$objPhone->Number = $strHomePhone;
					$objPhone->Address = $objAddress;
					$objPhone->PhoneTypeId = PhoneType::Home;
					$objPhone->Save();
					$objPhone->SetAsPrimary(null, $objAddress);
				}
			}

			// Mailing Address?
			if ($objMailingAddressValidator) {
				$objAddress = $objMailingAddressValidator->CreateAddressRecord();

				$blnFound = false;
				foreach ($this->GetAllAssociatedAddressArray($objHousehold) as $objExistingAddress) {
					if ($objExistingAddress->IsEqualTo($objAddress)) {
						$this->MailingAddress = $objExistingAddress;
						$this->RefreshPrimaryContactInfo();
						$blnFound = true;
					}
				}

				if (!$blnFound) {
					$objAddress->AddressTypeId = AddressType::Other;
					$objAddress->Person = $this;
					$objAddress->CurrentFlag = true;
					$objAddress->Save();
					$this->MailingAddress = $objAddress;
					$this->RefreshPrimaryContactInfo();
				}
			} else if ($this->MailingAddress) {
				$this->MailingAddress = null;
				$this->RefreshPrimaryContactInfo();
			}
		}

		/**
		* Remove any duplicate addresses from the address array passed as argument.
		* @param address array
		* @return none
		*/
		private function RemoveRedundantAddresses($objAddressArray) {
			$objExistingAddressListArray = array();
			$i = 0;
			foreach ($objAddressArray as $objAddress) {
				if (!count($objExistingAddressListArray)) {
					$objExistingAddressListArray[$i] = $objAddress;
					$i++;
				} else {
					foreach ($objExistingAddressListArray as $objExistingAddress) {
						if ($objExistingAddress->IsEqualTo($objAddress)) {
							print "PERSON: ". $this->FirstName." ".$this->LastName."\r\n";
							print "    Deleting Redundant Address: " . $objAddress->AddressFullLine."\r\n \r\n";
							// now to figure out which one to delete.
							if ($objAddress->PersonId && !$objExistingAddress->PersonId) {
								$objAddress->delete();
							} elseif (!$objAddress->CurrentFlag) {
								$objAddress->delete();
							} else {
								$objExistingAddress->delete();
								//$objExistingAddressListArray[$i] = $objAddress;
								//$i++;
							}
						} else {
							$objExistingAddressListArray[$i] = $objAddress;
							$i++;
						}
					}
				}
			}
		}
		
		/**
		* Perform a check of addresses associated with this person and remove any duplicates.
		* @param none
		* @return none
		*/
		public function RemoveDuplicateAddresses() {
			/*
			 * 1) Obtain household/s of the person.
			 * 2) For each household, check for duplication of addresses
			 * 3) If duplication found, remove.
			 */	
			if (!$this->__get('_HouseholdParticipation')){
				$objHouseholdArray = $this->__get('_HouseholdParticipationArray');
				foreach ($objHouseholdArray as $objHousehold) {
					$objAddressArray = $objHousehold->GetAddressArray();
					$this->RemoveRedundantAddresses($objAddressArray);
				}
			} else {
				$this->RemoveRedundantAddresses($this->__get('_HouseholdParticipation'));
			}
			
			/*
			* 1) Get all addresses, both personal and associated households
			* 2) check for duplication of addresses
			* 3) If duplication found, remove. When removing, always remove personal before houshold
			*/
			$objAddressArray = $this->GetAllAssociatedAddressArray(null,false);
			$this->RemoveRedundantAddresses($objAddressArray);
		}
		
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Person objects
			return Person::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Person()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Person object
			return Person::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Person()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Person objects
			return Person::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Param1, $strParam1),
					QQ::Equal(QQN::Person()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`person`.*
				FROM
					`person` AS `person`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Person::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

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