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
					$strToReturn = $this->dttDateOfBirth->__toString('MMMM D, YYYY');
					$intAge = $this->Age;
					$strToReturn .= sprintf(' - %s year%s old', $intAge, ($intAge != 1) ? 's' : '');
					if ($this->blnDobApproximateFlag)
						$strToReturn .= ' (approx.)';
					return $strToReturn;

				case 'Age':
					if (!$this->dttDateOfBirth) return null;
					return QDateTime::Now()->Difference($this->dttDateOfBirth)->Years;					

				case 'LinkUrl':
					return sprintf('/individuals/view.php/%s#general', $this->intId);

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
		 * Attempts to get the StewardshipAddress record for this person
		 * @return Address
		 */
		public function GetStewardshipAddress() {
			if ($this->StewardshipAddress) return $this->StewardshipAddress;
			if ($this->MailingAddress) return $this->MailingAddress;

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
				$this->strPrimaryAddressText = trim($objAddress->Address1);
				if ($objAddress->Address2) $this->strPrimaryAddressText .= ', ' . trim($objAddress->Address2);
				if ($objAddress->Address3) $this->strPrimaryAddressText .= ', ' . trim($objAddress->Address3);
				$this->strPrimaryCityText = trim($objAddress->City);
			} else {
				$this->strPrimaryAddressText = null;
				$this->strPrimaryCityText = null;
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
		 * @return Comment
		 */
		public function SaveComment(Login $objLogin, $strComment, $intCommentPrivacyTypeId, $intCommentCategoryId, QDateTime $dttPostDate = null) {
			$objComment = new Comment();
			$objComment->Person = $this;
			$objComment->PostedByLogin = $objLogin;
			$objComment->CommentPrivacyTypeId = $intCommentPrivacyTypeId;
			$objComment->CommentCategoryId = $intCommentCategoryId;
			$objComment->Comment = $strComment;
			$objComment->DatePosted = ($dttPostDate ? $dttPostDate : QDateTime::Now());
			$objComment->Save();
			
			return $objComment;
		}

		
		
		
		
		/**
		 * Given a search term, this will try and match all similarly matched individuals.
		 * This will utilize soundex and other indexing methodologies.
		 * 
		 * THIS IS TODO and the algorithm needs to be tuned.
		 * 
		 * @param string $strFirstName
		 * @param string $strLastName
		 * @param string $strGender
		 * @return Person[]
		 */
		public static function LoadArrayBySearch($strFirstName, $strLastName, $strGender) {
			$strClauseArray = array();

			// Needs to capture both the requested gender AND any unspecified
			if ($strGender == 'M') {
				$strClauseArray[] = "gender != 'F'";
			} else if ($strGender == 'F') {
				$strClauseArray[] = "gender != 'M'";
			}

			// First or Last Name Requested
			if (strlen($strFirstName))
				$strClauseArray[] = sprintf("(soundex(first_name) = soundex('%s') OR first_name LIKE '%s%%')", mysql_escape_string($strFirstName), mysql_escape_string($strFirstName));
			if (strlen($strLastName))
				$strClauseArray[] = sprintf("(soundex(last_name) = soundex('%s') OR last_name LIKE '%s%%')", mysql_escape_string($strLastName), mysql_escape_string($strLastName));

			$strQuery = 'SELECT * FROM person WHERE ' . implode(' AND ', $strClauseArray) . ' ORDER BY last_name, first_name';
			return Person::InstantiateDbResult(Person::GetDatabase()->Query($strQuery));
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
		 * @return Person
		 */
		public static function CreatePerson($strFirstName, $strMiddle, $strLastName, $blnMaleFlag, $strEmail = null, $strPhone = null, $intPhoneTypeId = null) {
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
			$objPerson->Gender = ($blnMaleFlag) ? 'M' : 'F';
			$objPerson->DeceasedFlag = false;

			$objPerson->Save();

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
				$objPhone->Number = $strPhone;
				$objPhone->Save();

				$objPerson->PrimaryPhone = $objPhone;
				$blnSaveAgain = true;
			}

			if ($blnSaveAgain) $objPerson->Save();

			return $objPerson;
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