<?php
	/**
	 * ALCF ChMS Data Generation file -- this will generate random
	 * data to aid with development.
	 */
	class ChmsDataGen extends QDataGen {
		// Counts of items to generate
		const UserCount = 50;
		const IndividualCount = 100;

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
		public static $UserArray;

		/**
		 * Main DataGen Runner
		 * @return void
		 */
		public static function Run() {
			self::$SystemStartDate = new QDateTime('1990-01-01');
			self::$LifeStartDate = new QDateTime('1930-01-01');

			// Erase Directories
			exec('rm -r -f ' . __DOCROOT__ . '/../file_assets/head_shots');

			// Generate Stuff
			ChmsDataGen::GenerateMinistries();
			ChmsDataGen::GenerateUsers();
			ChmsDataGen::GenerateIndividuals();
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
			}
			QDataGen::DisplayForEachTaskEnd('Generating Minsitries');
		}


		public static function GenerateUsers() {
			while (QDataGen::DisplayWhileTask('Generating ChMS Users', self::UserCount, false)) {
				$objLogin = new Login();
				$objLogin->RoleTypeId = QDataGen::GenerateFromArray(array_keys(RoleType::$NameArray));
				$objLogin->FirstName = QDataGen::GenerateFirstName();
				$objLogin->LastName = QDataGen::GenerateLastName();
				if (rand(0, 1)) $objLogin->MiddleInitial = chr(rand(ord('A'), ord('Z')));
				$objLogin->Username = QDataGen::GenerateUsername($objLogin->FirstName, $objLogin->LastName);
				$objLogin->Email = QDataGen::GenerateEmail($objLogin->FirstName, $objLogin->LastName);
				$objLogin->SetPasswordCache('password');
				$objLogin->DomainActiveFlag = rand(0, 10);
				$objLogin->LoginActiveFlag = rand(0, 10);
				$objLogin->Save();

				// Associate Random Ministries
				$intMinistryCount = rand(1, 3);
				for ($i = 0; $i < $intMinistryCount; $i++) {
					$objMinistry = Ministry::LoadByToken(QDataGen::GenerateFromArray(array_keys(self::$MinistryArray)));
					while ($objLogin->IsMinistryAssociated($objMinistry))
						$objMinistry = Ministry::LoadByToken(QDataGen::GenerateFromArray(array_keys(self::$MinistryArray)));
					$objLogin->AssociateMinistry($objMinistry);
				}
			}
			self::$UserArray = Login::LoadAll();
		}


		public static function GenerateIndividuals() {
			while (QDataGen::DisplayWhileTask('Generating Individuals', self::IndividualCount, false)) {
				$objPerson = self::GenerateIndividual(rand(0, 1));
			}
		}


		/**
		 * Generates a single Individual record
		 * @param boolean $blnMaleFlag
		 * @param string $strLastName optional last name
		 * @return Person
		 */
		protected static function GenerateIndividual($blnMaleFlag, $strLastName = null) {
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

			$objPerson->RefreshMembershipStatusTypeId(false);
			$objPerson->RefreshMaritalStatusTypeId(false);

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

			return $objPerson;
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