<?php
	/**
	 * ALCF ChMS Data Generation file -- this will generate random
	 * data to aid with development.
	 */
	class ChmsDataGen extends QDataGen {
		// Counts of items to generate
		const UserCount = 50;
		const IndividualCount = 100;
		const HouseholdCount = 100;
		const CommunicationListCount = 100;
		const GroupCount = 100;

		// Static Data
		public static $MinistryArray = array(
			'bc' => 'Biblical Counseling',
			'busops' => 'Business Operations',
			'comm' => 'Communications',
			'donations' => 'Donations and Resources',
			'evangoutreach' => 'Evangelism and Outreach',
			'events' => 'Events',
			'facilities' => 'Facilities',
			'family' => 'Family Ministry',
			'gmt' => 'Global Ministry Team',
			'growth' => 'Growth Groups',
			'ibs' => 'IBS',
			'it' => 'IT',
			'mc' => 'Member Care',
			'mens' => 'Men\'s Fellowship',
			'mit' => 'Ministry Involvement',
			'music' => 'Music',
			'prayer' => 'Prayer and Visitation',
			'safari' => 'Safari Kids',
			'services' => 'Worship Service Ministries',
			'sm' => 'Student Ministries',
			'sp' => 'Strategic Partnerships',
			'videoprod' => 'Video Production',
			'website' => 'Website',
			'womens' => 'Women\'s Ministry',
			'worshiparts' => 'Worship Arts',
			'yam' => 'Young Adult Ministry');

		// Generated Data
		public static $SystemStartDate;
		public static $LifeStartDate;
		public static $OldestChildBirthDate;
		public static $UserArray;
		public static $MaxPersonId;

		// Cached Data
		public static $CommentCategoryArray;

		/**
		 * Main DataGen Runner
		 * @return void
		 */
		public static function Run() {
			self::$SystemStartDate = new QDateTime('1990-01-01');
			self::$LifeStartDate = new QDateTime('1930-01-01');
			self::$OldestChildBirthDate = QDateTime::Now(false);
			self::$OldestChildBirthDate->Year -= 18;

			// Get Cached Data
			self::$CommentCategoryArray = CommentCategory::LoadAll();

			// Erase Directories
			exec('rm -r -f ' . __DOCROOT__ . '/../file_assets/head_shots');

			// Generate Stuff
			ChmsDataGen::GenerateMinistries();
			ChmsDataGen::GenerateUsers();
			ChmsDataGen::GenerateHouseholds();

			self::$MaxPersonId = Person::CountAll();

			ChmsDataGen::GenerateCommunicationLists();
			ChmsDataGen::GenerateGroups();
		}

		public static function GenerateCommunicationLists() {
			$objPersonArray = Person::LoadAll();
			while (QDataGen::DisplayWhileTask('Generating Communication Lists', self::CommunicationListCount, false)) {
				$objCommunicationList = new CommunicationList();
				$objCommunicationList->EmailBroadcastTypeId = QDataGen::GenerateFromArray(array_keys(EmailBroadcastType::$NameArray));
				$objCommunicationList->Ministry = QDataGen::GenerateFromArray(self::$MinistryArray);
				$objCommunicationList->Name = QDataGen::GenerateTitle(1, 4);
				$objCommunicationList->Token = strtolower(str_replace(' ', '_', $objCommunicationList->Name));
				while (CommunicationList::LoadByToken($objCommunicationList->Token)) {
					$objCommunicationList->Name = QDataGen::GenerateTitle(1, 4);
					$objCommunicationList->Token = strtolower(str_replace(' ', '_', $objCommunicationList->Name));
				}
				$objCommunicationList->Save();

				$intCount = rand(5, 100);
				for ($i = 0; $i < $intCount; $i++) {
					if (rand(0, 3)) {
						$objPerson = QDataGen::GenerateFromArray($objPersonArray);
						while ($objCommunicationList->IsPersonAssociated($objPerson))
							$objPerson = QDataGen::GenerateFromArray($objPersonArray);
						$objCommunicationList->AssociatePerson($objPerson);
					} else {
						$strFirstName = QDataGen::GenerateFirstName();
						if (!rand(0, 5))
							$strMiddleName = QDataGen::GenerateMiddleInitial() . '.';
						else
							$strMiddleName = null;
						$strLastName = QDataGen::GenerateLastName();
						$strEmail = QDataGen::GenerateEmail($strFirstName, $strLastName);
						$objCommunicationList->AddEntry($strEmail, $strFirstName, $strMiddleName, $strLastName);
					}
				}
			}
		}

		public static function GenerateGroups() {
			QDataGen::DisplayForEachTaskStart('Generating groups for ministries', self::$MinistryArray);
			foreach (self::$MinistryArray as $objMinistry) {
				QDataGen::DisplayForEachTaskNext('Generating groups for ministries');

				$intGroupCount = rand(1, 8);
				for ($intCount = 0; $intCount < $intGroupCount; $intCount++) {
					self::GenerateGroup($objMinistry, null);
				}
			}
			QDataGen::DisplayForEachTaskEnd('Generating groups for ministries');
		}

		public static function GenerateGroup(Ministry $objMinistry, Group $objParentGroup = null) {
			$strName = QDataGen::GenerateTitle(1, 4);
			$strToken = strtolower(str_replace(' ', '_', $strName));
			while (Group::LoadByToken($strToken)) {
				$strName = QDataGen::GenerateTitle(1, 4);
				$strToken = strtolower(str_replace(' ', '_', $strName));
			}

			$strDescription = QDataGen::GenerateContent(rand(0, 1), 5, 20);
			$intGroupTypeId = QDataGen::GenerateFromArray(array_keys(GroupType::$NameArray));
			$objGroup = Group::CreateGroupForMinistry($objMinistry, $intGroupTypeId, $strName, $strDescription, $objParentGroup);

			// Set folder options
			$objGroup->ConfidentialFlag = !rand(0, 8);

			// Email
			if (!rand(0, 3)) {
				$objGroup->EmailBroadcastTypeId = QDataGen::GenerateFromArray(array_keys(EmailBroadcastType::$NameArray));
				$objGroup->Token = $strToken;
			}

			$objGroup->Save();

			switch ($objGroup->GroupTypeId) {
				case GroupType::GrowthGroup:
					$objGrowthGroup = new GrowthGroup();
					$objGrowthGroup->Group = $objGroup;
					$objGrowthGroup->GrowthGroupLocationId = rand(1, GrowthGroupLocation::CountAll());
					$objGrowthGroup->Save();
					break;

				case GroupType::SmartGroup:
					$objSmartGroup = new SmartGroup();
					$objSmartGroup->Group = $objGroup;
					$objSmartGroup->Save();
					break;

				case GroupType::GroupCategory:
					// Create Subgroups
					$intSubFolderCount = rand(0, 5);
					for ($intCount = 0; $intCount < $intSubFolderCount; $intCount++)
						self::GenerateGroup($objMinistry, $objGroup);
					break;
			}

			// Create Participants
			$objGroupRoleArray = GroupRole::LoadArrayByMinistryId($objMinistry->Id);
			switch ($objGroup->GroupTypeId) {
				case GroupType::GrowthGroup:
				case GroupType::RegularGroup:
					$intParticipantCount = rand(1, 8);
					for ($intIndex = 0; $intIndex < $intParticipantCount; $intIndex++) {
						$dttStartDate = QDataGen::GenerateDateTime(self::$SystemStartDate, QDateTime::Now());
						$dttEndDate = rand(0, 4) ? null : QDataGen::GenerateDateTime($dttStartDate, QDateTime::Now());
						$objGroup->AddPerson(
							Person::Load(rand(1, self::$MaxPersonId)),
							QDataGen::GenerateFromArray($objGroupRoleArray)->Id,
							$dttStartDate,
							$dttEndDate
						);
					}
					break;
			}
		}

		public static function GenerateMinistries() {
			QDataGen::DisplayForEachTaskStart('Generating Minsitries', count(self::$MinistryArray));
			foreach (self::$MinistryArray as $strToken=>$strMinistry) {
				QDataGen::DisplayForEachTaskNext('Generating Minsitries');
				
				$objMinistry = new Ministry();
				$objMinistry->Token = $strToken;
				$objMinistry->Name = $strMinistry;
				$objMinistry->ActiveFlag = true;
				$objMinistry->Save();

				$strArray = array(
					'Member' => GroupRoleType::Participant,
					'Participant' => GroupRoleType::Participant,
					'Volunteer' => GroupRoleType::Volunteer,
					'Leader' => GroupRoleType::Volunteer
				);

				foreach ($strArray as $strName => $intGroupRoleTypeId) {
					$objGroupRole = new GroupRole();
					$objGroupRole->Ministry = $objMinistry;
					$objGroupRole->Name = $strName;
					$objGroupRole->GroupRoleTypeId = $intGroupRoleTypeId;
					$objGroupRole->Save();
				}
			}
			self::$MinistryArray = Ministry::LoadAll();
			QDataGen::DisplayForEachTaskEnd('Generating Minsitries');
		}


		public static function GenerateUsers() {
			$blnAdminGenerated = false;
			while (QDataGen::DisplayWhileTask('Generating ChMS Users', self::UserCount, false)) {
				$objLogin = new Login();
				$objLogin->RoleTypeId = ($blnAdminGenerated) ? QDataGen::GenerateFromArray(array_keys(RoleType::$NameArray)) : RoleType::ChMSAdministrator;
				$objLogin->FirstName = QDataGen::GenerateFirstName();
				$objLogin->LastName = QDataGen::GenerateLastName();
				if (rand(0, 1)) $objLogin->MiddleInitial = chr(rand(ord('A'), ord('Z')));
				$objLogin->Username = ($blnAdminGenerated) ? QDataGen::GenerateUsername($objLogin->FirstName, $objLogin->LastName) : 'admin';
				$objLogin->Email = QDataGen::GenerateEmail($objLogin->FirstName, $objLogin->LastName);
				$objLogin->SetPasswordCache('password');
				$objLogin->DomainActiveFlag = ($blnAdminGenerated) ? rand(0, 10) : true;
				$objLogin->LoginActiveFlag = ($blnAdminGenerated) ? rand(0, 10) : true;

				// Random Permissions
				$intPermissionBitmap = 0;
				foreach (PermissionType::$NameArray as $intId => $strName) {
					if (!rand(0, 2))
						$intPermissionBitmap = $intPermissionBitmap | $intId;
				}
				$objLogin->PermissionBitmap = $intPermissionBitmap;
				$objLogin->Save();

				// Associate Random Ministries
				$intMinistryCount = ($blnAdminGenerated) ? rand(1, 3) : 5;
				for ($i = 0; $i < $intMinistryCount; $i++) {
					$objMinistry = QDataGen::GenerateFromArray(self::$MinistryArray);
					while ($objLogin->IsMinistryAssociated($objMinistry))
						$objMinistry = QDataGen::GenerateFromArray(self::$MinistryArray);
					$objLogin->AssociateMinistry($objMinistry);
				}

				$blnAdminGenerated = true;
			}
			self::$UserArray = Login::LoadAll();
		}


		public static function GenerateIndividuals() {
			while (QDataGen::DisplayWhileTask('Generating Individuals', self::IndividualCount, false)) {
				$objPerson = self::GenerateIndividual(rand(0, 1));
			}
		}


		public static function GenerateHouseholds() {
			while (QDataGen::DisplayWhileTask('Generating Households', self::HouseholdCount, false)) {
				$objHousehold = null;

				switch (rand(0, 9)) {
					case 0:
					case 1:
					case 2:
						// Single-Family Household
						$objHousehold = self::GenerateHouseholdSingleFamily();
						break;
					case 3:
					case 4:
					case 5:
						// Single-Person Household
						$objPerson = self::GenerateIndividual(rand(0, 1), rand(0, 8));
						$objHousehold = Household::CreateHousehold($objPerson);
						break;
					case 6:
					case 7:
						// Multi-Family Households
						// TODO
						break;
					case 8:
					case 9:
						// Non-Household
						$objPerson = self::GenerateIndividual(rand(0, 1), rand(0, 8));
						break;
				}

				// Address and Phone for Household
				if ($objHousehold) {
					self::GenerateAddressesForHousehold($objHousehold);
				}
			}
		}

		protected static function GenerateAddressesForHousehold(Household $objHousehold) {
			// Add address and phone
			$intAddressCount = rand(1, 5);
			for ($i = 0; $i < $intAddressCount; $i++) {
				$objAddress = new Address();
				$objAddress->AddressTypeId = AddressType::Home;
				$objAddress->Household = $objHousehold;
				$objAddress->Address1 = QDataGen::GenerateStreetAddress();
				if (rand(0, 1)) $objAddress->Address2 = QDataGen::GenerateAddressLine2();
				$objAddress->City = QDataGen::GenerateCity();
				$objAddress->State = QDataGen::GenerateUsState();
				$objAddress->ZipCode = rand(10000, 99999);
				$objAddress->Country = 'US';
				$objAddress->InvalidFlag = false;
				$objAddress->CurrentFlag = (($i+1) == $intAddressCount);
				$objAddress->Save();

				$intPhoneCount = rand(1, 3);
				for ($j = 0; $j < $intPhoneCount; $j++) {
					$objPhone = new Phone();
					$objPhone->PhoneTypeId = PhoneType::Home;
					$objPhone->Address = $objAddress;
					$objPhone->Number = QDataGen::GeneratePhone();
					$objPhone->Save();
				}

				// Set the last one we created as "Primary"
				$objPhone->SetAsPrimary();
			}
		}

		protected static function GenerateAddressesAndPhonesForPerson(Person $objPerson) {
			$intAddressCount = rand(0, 5);
			for ($i = 0; $i < $intAddressCount; $i++) {
				$objAddress = new Address();
				$objAddress->AddressTypeId = QDataGen::GenerateFromArray(array_keys(AddressType::$NameArray));
				$objAddress->Person = $objPerson;
				$objAddress->Address1 = QDataGen::GenerateStreetAddress();
				if (rand(0, 1)) $objAddress->Address2 = QDataGen::GenerateAddressLine2();
				$objAddress->City = QDataGen::GenerateCity();
				$objAddress->State = QDataGen::GenerateUsState();
				$objAddress->ZipCode = rand(10000, 99999);
				$objAddress->Country = 'US';
				$objAddress->InvalidFlag = false;
				switch ($objAddress->AddressTypeId) {
					case AddressType::Temporary:
						$objAddress->CurrentFlag = true;
						$dttNextYear = QDateTime::Now();
						$dttNextYear->Year++;
						$objAddress->DateUntilWhen = QDataGen::GenerateDateTime(QDateTime::Now(), $dttNextYear);
						break;
					default:
						$objAddress->CurrentFlag = rand(0, 1);
						break;
				}
				$objAddress->Save();
			}
			
			$intPhoneCount = rand(0, 5);
			$objPhoneArray = array();
			for ($i = 0; $i < $intPhoneCount; $i++) {
				$objPhone = new Phone();
				$objPhone->PhoneTypeId = QDataGen::GenerateFromArray(array_keys(PhoneType::$NameArray));
				while ($objPhone->PhoneTypeId == PhoneType::Home) $objPhone->PhoneTypeId = QDataGen::GenerateFromArray(array_keys(PhoneType::$NameArray));
				$objPhone->Number = QDataGen::GeneratePhone();
				$objPhone->Person = $objPerson;
				$objPhone->Save();
				$objPhoneArray[] = $objPhone;
			}
			
			if ($intPhoneCount && !rand(0, 2)) {
				QDataGen::GenerateFromArray($objPhoneArray)->SetAsPrimary();
			}

			$intEmailCount = rand(0, 5);
			$objEmailArray = array();
			for ($i = 0; $i < $intEmailCount; $i++) {
				$objEmail = new Email();
				$objEmail->Address = QDataGen::GenerateEmail($objPerson->FirstName, $objPerson->LastName);
				$objEmail->Person = $objPerson;
				$objEmail->Save();
				$objEmailArray[] = $objEmail;
			}

			if ($intEmailCount && !rand(0, 2)) {
				QDataGen::GenerateFromArray($objEmailArray)->SetAsPrimary();
			}

			$intMaxId = OtherContactMethod::CountAll();
			for ($intOtherContactMethodId = 1; $intOtherContactMethodId <= $intMaxId; $intOtherContactMethodId++) {
				if (!rand(0, 2)) {
					$objContactInfo = new OtherContactInfo();
					$objContactInfo->Person = $objPerson;
					$objContactInfo->OtherContactMethodId = $intOtherContactMethodId;
					$objContactInfo->Value = QDataGen::GenerateUsername($objPerson->FirstName, $objPerson->LastName);
					$objContactInfo->Save();
				}
			}
		}

		/**
		 * Generates a typical Single-Family household
		 * @return Household
		 */
		public static function GenerateHouseholdSingleFamily() {
			$strLastName = QDataGen::GenerateLastName();

			$objHeadPerson = self::GenerateIndividual(rand(0, 6), true, $strLastName);
			$objHousehold = Household::CreateHousehold($objHeadPerson);

			// Add a Spouse
			if (rand(0, 6)) {
				$objSpouse = self::GenerateIndividual(!$objHeadPerson->MaleFlag, true, $strLastName);
				$intMinimumChildCount = 0;

				$objHeadPerson->DeleteAllMarriages();
				$objSpouse->DeleteAllMarriages();

				if ($objHeadPerson->DateOfBirth)
					$dttStartDate = $objHeadPerson->DateOfBirth;
				else if ($objSpouse->DateOfBirth)
					$dttStartDate = $objSpouse->DateOfBirth;
				else
					$dttStartDate = QDataGen::GenerateDateTime(self::$LifeStartDate, QDateTime::Now());
				$dttStartDate = QDataGen::GenerateDateTime($dttStartDate, QDateTime::Now());

				$objHeadPerson->CreateMarriageWith($objSpouse, $dttStartDate);

				$objHousehold->AssociatePerson($objSpouse);
			} else {
				// If no spouse, we must have at least one child in order to be a "family"
				$objSpouse = null;
				$intMinimumChildCount = 1;
			}

			// Add Children (if applicable)
			$intChildCount = rand($intMinimumChildCount, 4);
			$objChildArray = array();
			for ($i = 0; $i < $intChildCount; $i++) {
				$objChild = self::GenerateIndividual(rand(0, 1), false, $strLastName);

				// Add the relationship
				$objHeadPerson->AddRelationship($objChild, RelationshipType::Child);
				if ($objSpouse) $objSpouse->AddRelationship($objChild, RelationshipType::Child);
				
				foreach ($objChildArray as $objSibling) {
					$objChild->AddRelationship($objSibling, RelationshipType::Sibling);
				}

				$objHousehold->AssociatePerson($objChild);
				
				$objChildArray[] = $objChild;
			}

			return $objHousehold;
		}

		/**
		 * Generates a single Individual record
		 * @param boolean $blnMaleFlag
		 * @param boolean $blnAdultFlag whether this Individual should be a child or an adult
		 * @param string $strLastName optional last name
		 * @return Person
		 */
		protected static function GenerateIndividual($blnMaleFlag, $blnAdultFlag, $strLastName = null) {
			$objPerson = new Person();
			$objPerson->MaleFlag = $blnMaleFlag;

			// Generate the name
			$objPerson->FirstName = ($blnMaleFlag) ? QDataGen::GenerateMaleFirstName() : QDataGen::GenerateFemaleFirstName();
			switch (rand(1, 10)) {
				case 1:
				case 2:
				case 3:
					$objPerson->MiddleName = chr(rand(ord('A'), ord('Z'))) . '.';
					break;
				case 4:
				case 5:
					$objPerson->MiddleName = ($blnMaleFlag) ? QDataGen::GenerateMaleFirstName() : QDataGen::GenerateFemaleFirstName();
					break;
			}
			$objPerson->LastName = ($strLastName) ? $strLastName : QDataGen::GenerateLastName();
			
			if (!rand(0, 10)) {
				$objPerson->Nickname = ($blnMaleFlag) ? QDataGen::GenerateMaleFirstName() : QDataGen::GenerateFemaleFirstName();
			}

			if (!rand(0, 5) && !$blnMaleFlag) {
				$objPerson->PriorLastNames = QDataGen::GenerateLastName();
			}

			if (!rand(0, 10)) {
				$objPerson->MailingLabel = QString::FirstCharacter($objPerson->FirstName) . '. ' . $objPerson->LastName;
			}

			if (!rand(0, 10)) {
				$arrTitleArray = ($blnMaleFlag) ? array('Mr.', 'Dr.', 'Sir') : array('Ms.', 'Miss', 'Mrs.', 'Dr.', 'Lady');
				$objPerson->Title = QDataGen::GenerateFromArray($arrTitleArray);
			}

			if (!rand(0, 10)) {
				$arrSuffixArray = array('Sr.', 'Jr.', 'III', 'PhD', 'MD');
				$objPerson->Suffix = QDataGen::GenerateFromArray($arrSuffixArray);
			}

			// Date of Birth
			if ($blnAdultFlag) {
				if (rand(0, 1))
					$objPerson->DateOfBirth = QDataGen::GenerateDateTime(self::$LifeStartDate, self::$OldestChildBirthDate);
			} else {
				$objPerson->DateOfBirth = QDataGen::GenerateDateTime(self::$OldestChildBirthDate, QDateTime::Now());
			}
				
			// Refresh Membership and Marital Statuses
			$objPerson->RefreshMembershipStatusTypeId(false);
			$objPerson->RefreshMaritalStatusTypeId(false);

			// Setup Deceased Information
			$objPerson->DeceasedFlag = !rand(0, 200);
			if ($objPerson->DeceasedFlag && rand(0, 1))
				$objPerson->DateDeceased = QDataGen::GenerateDateTime(self::$LifeStartDate, QDateTime::Now());
			$objPerson->Save();

			// Head Shots
			$objHeadShotArray = array();
			$intHeadShotCount = rand(0, 3);
			for ($i = 0; $i < $intHeadShotCount; $i++) {
				$objHeadShotArray[] = $objPerson->SaveHeadShot(self::GetRandomHeadShot($objPerson->MaleFlag), QDataGen::GenerateDateTime(self::$SystemStartDate, QDateTime::Now()));
			}
			if (count($objHeadShotArray)) {
				$objPerson->SetCurrentHeadShot(QDataGen::GenerateFromArray($objHeadShotArray));
			}

			// Membership
			$intMembershipCount = 0;
			if ($blnAdultFlag) {
				if (!rand(0, 2)) {
					$intMembershipCount = rand(1, 3);
				}
			} else {
				if (!rand(0, 10)) {
					$intMembershipCount = rand(1, 2);
				}
			}

			if ($intMembershipCount) {
				$dttEarliestPossible = new QDateTime(($objPerson->DateOfBirth) ? $objPerson->DateOfBirth : self::$SystemStartDate);
				self::GenerateMembershipsForIndividual($objPerson, $dttEarliestPossible, $intMembershipCount);
			}

			// Past or non-defined marriage
			if ($blnAdultFlag && !rand(0, 10)) {
				$objMarriage = new Marriage();
				$objMarriage->Person = $objPerson;
				$objMarriage->MarriageStatusTypeId = QDataGen::GenerateFromArray(array_keys(MarriageStatusType::$NameArray));

				if (rand(0, 1)) {
					$dttStart = QDateTime::Now();
					$dttStart = QDataGen::GenerateDateTime(self::$LifeStartDate, $dttStart);
					$dttStart = QDataGen::GenerateDateTime(self::$LifeStartDate, $dttStart);
					$dttStart = QDataGen::GenerateDateTime(self::$LifeStartDate, $dttStart);
					$dttStart = QDataGen::GenerateDateTime(self::$LifeStartDate, $dttStart);
					$dttStart = QDataGen::GenerateDateTime(self::$LifeStartDate, $dttStart);

					$objMarriage->DateStart = $dttStart;
					switch ($objMarriage->MarriageStatusTypeId) {
						case MarriageStatusType::Divorced;
						case MarriageStatusType::Widowed;
							$objMarriage->DateEnd = QDataGen::GenerateDateTime($dttStart, QDateTime::Now());
							break;
					}
				}

				$objMarriage->Save();
				$objPerson->RefreshMaritalStatusTypeId();
			}

			// Comments
			$intCount = rand(0, 12);
			for ($intIndex = 0; $intIndex < $intCount; $intIndex++) {
				$dttPostDate = self::GenerateDateTime(self::$SystemStartDate, QDateTime::Now());
				$objLogin = self::GenerateFromArray(self::$UserArray);
				$objCommentCategory = self::GenerateFromArray(self::$CommentCategoryArray);
				$intCommentPrivacyTypeId = self::GenerateFromArray(array_keys(CommentPrivacyType::$NameArray));
				$strComment = self::GenerateContent(rand (1, 2), 5, 20);

				$objPerson->SaveComment($objLogin, $strComment, $intCommentPrivacyTypeId, $objCommentCategory->Id, $dttPostDate);
			}

			// Addresses and Phone
			self::GenerateAddressesAndPhonesForPerson($objPerson);
			
			// Attributes
			self::GenerateAttributesForPerson($objPerson);

			return $objPerson;
		}

		protected static function GenerateAttributesForPerson($objPerson) {
			foreach (Attribute::LoadAll() as $objAttribute) {
				if (!rand(0, 3)) {
					switch($objAttribute->AttributeDataTypeId) {
						case AttributeDataType::Text:
							$mixData = QDataGen::GenerateTitle(5, 25);
							break;
						
						case AttributeDataType::Checkbox:
							$mixData = rand(0, 1) ? true : false;
							break;

						case AttributeDataType::Date:
							$mixData = QDataGen::GenerateDateTime(self::$LifeStartDate, QDateTime::Now());
							break;

						case AttributeDataType::ImmutableSingleDropdown:
						case AttributeDataType::MutableSingleDropdown:
							$mixData = QDataGen::GenerateFromArray($objAttribute->GetAttributeOptionArray());
							break;

						case AttributeDataType::ImmutableMultipleDropdown:
						case AttributeDataType::MutableMultipleDropdown:
							$mixData = array();
							while (!count($mixData)) {
								foreach ($objAttribute->GetAttributeOptionArray() as $objAttributeOption) {
									if (rand(0, 1)) {
										$mixData[] = $objAttributeOption;
									}
								}
							}
							break;
						default:
							throw new Exception('Unhandled Attribute Data Type');
					}

					$objPerson->SetAttribute($objAttribute, $mixData);
				}
			}
		}

		protected static function GenerateMembershipsForIndividual(Person $objPerson, QDateTime $dttEarliestPossible, $intMembershipCount) {
			for ($i = 0; $i < $intMembershipCount; $i++) {
				$objMembership = new Membership();
				$objMembership->Person = $objPerson;

				$dttDateStart = QDateTime::Now();
				$dttDateStart = QDataGen::GenerateDateTime($dttEarliestPossible, $dttDateStart);
				$dttDateStart = QDataGen::GenerateDateTime($dttEarliestPossible, $dttDateStart);
				$dttDateStart = QDataGen::GenerateDateTime($dttEarliestPossible, $dttDateStart);
				$dttDateStart = QDataGen::GenerateDateTime($dttEarliestPossible, $dttDateStart);

				$objMembership->DateStart = $dttDateStart;
				$dttEarliestPossible = new QDateTime($dttDateStart);

				if ((($i + 1) != $intMembershipCount) || !rand(0, 3)) {
					$dttDateEnd = QDateTime::Now();
					$dttDateEnd = QDataGen::GenerateDateTime($dttEarliestPossible, $dttDateEnd);
					$dttDateEnd = QDataGen::GenerateDateTime($dttEarliestPossible, $dttDateEnd);
					$dttDateEnd = QDataGen::GenerateDateTime($dttEarliestPossible, $dttDateEnd);
					$dttDateEnd = QDataGen::GenerateDateTime($dttEarliestPossible, $dttDateEnd);

					$objMembership->DateEnd = $dttDateEnd;
					$dttEarliestPossible = new QDateTime($dttDateEnd);
					
					$objMembership->TerminationReason = QDataGen::GenerateContent(1, 3, 10);
				}
				
				$objMembership->Save();
			}

			$objPerson->RefreshMembershipStatusTypeId();
		}

		protected static $HeadShotMaleArray;
		protected static $HeadShotFemaleArray;
		protected static function GetRandomHeadShot($blnMaleFlag) {
			if (!self::$HeadShotMaleArray) {
				// Create the Arrays
				self::$HeadShotMaleArray = array();
				$objDirectory = opendir(__DEVTOOLS_CLI__ . '/datagen_file_assets/headshots/male');
				while ($strFile = readdir($objDirectory)) {
					if (substr($strFile, 0, 8) == 'headshot') self::$HeadShotMaleArray[] = $strFile;
				}

				self::$HeadShotFemaleArray = array();
				$objDirectory = opendir(__DEVTOOLS_CLI__ . '/datagen_file_assets/headshots/female');
				while ($strFile = readdir($objDirectory)) {
					if (substr($strFile, 0, 8) == 'headshot') self::$HeadShotFemaleArray[] = $strFile;
				}
			}

			if ($blnMaleFlag) {
				return __DEVTOOLS_CLI__ . '/datagen_file_assets/headshots/male/' . QDataGen::GenerateFromArray(self::$HeadShotMaleArray);
			} else {
				return __DEVTOOLS_CLI__ . '/datagen_file_assets/headshots/female/' . QDataGen::GenerateFromArray(self::$HeadShotFemaleArray);
			}
		}
	}

	// Make sure we are NOT in Production!
	if (SERVER_INSTANCE == 'prod') {
		print "error: datagen cannot be run in production\r\n";
		exit(1);
	}

	// Run the Generator
	ChmsDataGen::Run();
?>