<?php
	/**
	 * ALCF ChMS Data Generation file -- this will generate random
	 * data to aid with development.
	 */
	class ChmsDataGen extends QDataGen {
		// Counts of items to generate
		const UserCount = 50;

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
		public static $UserArray;

		/**
		 * Main DataGen Runner
		 * @return void
		 */
		public static function Run() {
			ChmsDataGen::GenerateMinistries();
			ChmsDataGen::GenerateUsers();
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
	}

	// Run the Generator
	ChmsDataGen::Run();
?>