<?php
	class HouseholdManagementTest extends PHPUnit_Framework_TestCase {
		protected $objPersonArray = array();

		protected $objLoginLeader;
		protected $objLoginNonLeader;
		protected $objMinistry;
		protected $objGroupRole;

		protected $objGroup1;
		protected $objGroup2;

		const DeleteFlag = false;

		public function SetUp() {
			$this->objMinistry = Ministry::LoadByToken('ert');
			if (!$this->objMinistry) {
				$this->objMinistry = new Ministry();
				$this->objMinistry->Token = 'ert';
			}
			$this->objMinistry->Name = 'Test Ministry';
			$this->objMinistry->ActiveFlag = true;
			$this->objMinistry->Save();

			if ($objGroupRoleArray = $this->objMinistry->GetGroupRoleArray()) {
				$this->objGroupRole = $objGroupRoleArray[0];
			} else {
				$this->objGroupRole = new GroupRole();
				$this->objGroupRole->Ministry = $this->objMinistry;
				$this->objGroupRole->Name = 'ERT';
				$this->objGroupRole->GroupRoleTypeId = GroupRoleType::Participant;
				$this->objGroupRole->Save();
			}

			$this->objLoginLeader = Login::LoadByUsername('ert1');
			if (!$this->objLoginLeader) {
				$this->objLoginLeader = new Login();
				$this->objLoginLeader->Username = 'ert1';
			} else {
				$this->objLoginLeader->UnassociateAllMinistries();
			}
			$this->objLoginLeader->RoleTypeId = RoleType::StaffMember;
			$this->objLoginLeader->Email = 'ert1@alcf.net';
			$this->objLoginLeader->Save();
			
			$this->objLoginLeader->AssociateMinistry($this->objMinistry);

			$this->objLoginNonLeader = Login::LoadByUsername('ert2');
			if (!$this->objLoginNonLeader) {
				$this->objLoginNonLeader = new Login();
				$this->objLoginNonLeader->Username = 'ert2';
			} else {
				$this->objLoginNonLeader->UnassociateAllMinistries();
			}
			$this->objLoginNonLeader->RoleTypeId = RoleType::StaffMember;
			$this->objLoginNonLeader->Email = 'ert2@alcf.net';
			$this->objLoginNonLeader->Save();

			$this->objPersonArray = array();
			$this->objPersonArray['ert1'] = Person::CreatePerson('Test', 'E', 'User', true, 'ert1@michaelho.com', null, null);
			$this->objPersonArray['ert2'] = Person::CreatePerson('Test', 'E', 'User', true, 'ert2@michaelho.com', null, null);
			$this->objPersonArray['ert3'] = Person::CreatePerson('Test', 'E', 'User', true, 'ert3@michaelho.com', null, null);
			
			$objPerson = Person::CreatePerson('Test', 'E', 'User', true, null, null, null);
			$objEmail = new Email();
			$objEmail->Address = 'ert4@michaelho.com';
			$objEmail->Person = $objPerson;
			$objEmail->Save();
			$this->objPersonArray['ert4'] = $objPerson;
						
			$objPerson = Person::CreatePerson('Test', 'E', 'User', true, null, null, null);
			$objEmail = new Email();
			$objEmail->Address = 'ert5@michaelho.com';
			$objEmail->Person = $objPerson;
			$objEmail->Save();
			$objEmail = new Email();
			$objEmail->Address = 'ert6@michaelho.com';
			$objEmail->Person = $objPerson;
			$objEmail->Save();
			$this->objPersonArray['ert5'] = $objPerson;

			$this->objGroup1 = Group::LoadByToken('ert1');
			if (!$this->objGroup1) {
				$this->objGroup1 = new Group();
				$this->objGroup1->Token = 'ert1';
			}
			$this->objGroup1->GroupTypeId = GroupType::RegularGroup;
			$this->objGroup1->Ministry = $this->objMinistry;
			$this->objGroup1->EmailBroadcastTypeId = EmailBroadcastType::PrivateList;
			$this->objGroup1->Name = 'ERT Test Group 1';
			$this->objGroup1->Save();

			$this->objGroup2 = Group::LoadByToken('ert2');
			if (!$this->objGroup2) {
				$this->objGroup2 = new Group();
				$this->objGroup2->Token = 'ert2';
			}
			$this->objGroup2->GroupTypeId = GroupType::RegularGroup;
			$this->objGroup2->Ministry = $this->objMinistry;
			$this->objGroup2->EmailBroadcastTypeId = EmailBroadcastType::AnnouncementOnly;
			$this->objGroup2->Name = 'ERT Test Group 2';
			$this->objGroup2->Save();

			$this->objGroup1->DeleteAllGroupParticipations();
			$this->objGroup2->DeleteAllGroupParticipations();

			$objParticipation = new GroupParticipation();
			$objParticipation->Person = $this->objPersonArray['ert1'];
			$objParticipation->Group = $this->objGroup1;
			$objParticipation->GroupRole = $this->objGroupRole;
			$objParticipation->DateStart = new QDateTime('2005-01-01');
			$objParticipation->Save();

			$objParticipation = new GroupParticipation();
			$objParticipation->Person = $this->objPersonArray['ert1'];
			$objParticipation->Group = $this->objGroup2;
			$objParticipation->GroupRole = $this->objGroupRole;
			$objParticipation->DateStart = new QDateTime('2005-01-01');
			$objParticipation->Save();
		}

		protected function GenerateEmailMessage($strFromAddress, $strToToken) {
			$strRawMessage = array();
			$strRawMessage[] = 'Message-Id: ' . md5(microtime());
			$strRawMessage[] = 'From: ' . $strFromAddress;
			$strRawMessage[] = 'To: ' . $strToToken . '@groups.alcf.net';
			$strRawMessage[] = 'Subject: Testing Route Test For Private';
			$strRawMessage[] = '';
			$strRawMessage[] = 'Lorum ipsum text goes here.';
			$objEmailMessage = EmailMessage::CreateWithRawMessage(implode("\r\n", $strRawMessage));
			return $objEmailMessage;
		}

		public function testRouteTestForPrivate() {
			$objEmailMessage = $this->GenerateEmailMessage('ert1@michaelho.com', $this->objGroup1->Token);
			$this->AssertEquals($objEmailMessage->EmailMessageStatusTypeId, EmailMessageStatusType::NotYetAnalyzed, 'NotYetAnalyzed');

			$objEmailMessage->AnalyzeMessage();
			$this->AssertEquals($objEmailMessage->EmailMessageStatusTypeId, EmailMessageStatusType::PendingSend, 'PendingSend');
			$this->AssertNull($objEmailMessage->ErrorMessage, 'Valid Message Should Have Null Error');
			$this->AssertEquals($objEmailMessage->CountEmailMessageRoutes(), 1, 'Valid Msssage should have 1 route');

			if (self::DeleteFlag) $objEmailMessage->DeleteAllEmailMessageRoutes();
			if (self::DeleteFlag) $objEmailMessage->Delete();

			$objEmailMessage = $this->GenerateEmailMessage('ert2@michaelho.com', $this->objGroup1->Token);
			$this->AssertEquals($objEmailMessage->EmailMessageStatusTypeId, EmailMessageStatusType::NotYetAnalyzed, 'NotYetAnalyzed');

			$objEmailMessage->AnalyzeMessage();
			$this->AssertEquals($objEmailMessage->EmailMessageStatusTypeId, EmailMessageStatusType::PendingSend, 'PendingSend');
			$this->AssertNotNull($objEmailMessage->ErrorMessage, 'InValid Message Should Have Error');
			$this->AssertEquals($objEmailMessage->CountEmailMessageRoutes(), 0, 'InValid Msssage should have 1 route');

			if (self::DeleteFlag) $objEmailMessage->DeleteAllEmailMessageRoutes();
			if (self::DeleteFlag) $objEmailMessage->Delete();
		}


		public function testRouteTestForAnnouncement() {
			$objEmailMessage = $this->GenerateEmailMessage('ert1@michaelho.com', $this->objGroup2->Token);
			$this->AssertEquals($objEmailMessage->EmailMessageStatusTypeId, EmailMessageStatusType::NotYetAnalyzed, 'NotYetAnalyzed');

			$objEmailMessage->AnalyzeMessage();
			$this->AssertEquals($objEmailMessage->EmailMessageStatusTypeId, EmailMessageStatusType::PendingSend, 'PendingSend');
			$this->AssertNotNull($objEmailMessage->ErrorMessage, 'InValid Message Should Have Null Error');
			$this->AssertEquals($objEmailMessage->CountEmailMessageRoutes(), 0, 'InValid Msssage should have 0 route');

			if (self::DeleteFlag) $objEmailMessage->DeleteAllEmailMessageRoutes();
			if (self::DeleteFlag) $objEmailMessage->Delete();

			$objEmailMessage = $this->GenerateEmailMessage('ert2@michaelho.com', $this->objGroup2->Token);
			$this->AssertEquals($objEmailMessage->EmailMessageStatusTypeId, EmailMessageStatusType::NotYetAnalyzed, 'NotYetAnalyzed');

			$objEmailMessage->AnalyzeMessage();
			$this->AssertEquals($objEmailMessage->EmailMessageStatusTypeId, EmailMessageStatusType::PendingSend, 'PendingSend');
			$this->AssertNotNull($objEmailMessage->ErrorMessage, 'InValid Message Should Have Error');
			$this->AssertEquals($objEmailMessage->CountEmailMessageRoutes(), 0, 'InValid Msssage should have 0 route');

			if (self::DeleteFlag) $objEmailMessage->DeleteAllEmailMessageRoutes();
			if (self::DeleteFlag) $objEmailMessage->Delete();
		}

		public function TearDown() {
			if (self::DeleteFlag) $this->objGroup1->DeleteAllGroupParticipations();
			if (self::DeleteFlag) $this->objGroup2->DeleteAllGroupParticipations();

			foreach ($this->objPersonArray as $objPerson) {
				if (self::DeleteFlag) $objPerson->Delete();
			}
		}
	}
?>