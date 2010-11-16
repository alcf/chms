<?php
	$objAcsDatabase = new mysqli('localhost', 'root', '', 'alcf_acs');

	// The following is indexed by Noah Ministry ID and then ACS GroupId
	// The array value [0] is the Name of the Group (if the Group is to be migrated over wholesale)
	// The array value [1] is a boolean on whether or not the group's ELEMENT1 that should be made into an individual group,
	//		true means use ALL reserveids
	//		or an array of awgrresf.reserveid's to use just the specified subset within that group
	//		(thus ignoring the ACS Group for the groupid)
	$objGroupArray = array(
		21 => array(
			63 => array('Alter Prayer Ministry', false),
			26 => array('Prayer Ministry', array(104, 105, 106, 272, 314, 364, 374, 375, 383, 401)), 
			36 => array('PrayerWorks', false),
			35 => array('Worship Warriors', false),
		),
		
		23 => array(
			53 => array('Information Center', false),
			28 => array('Worship Services', array(123, 115, 116, 278, 121, 254, 124)),
			19 => array('Hospitality', false)
		)
	);

	foreach ($objGroupArray as $intMinistryId => $objAcsGroupArray) {
		$objMinistry = Ministry::Load($intMinistryId);
		$objRoleArray = $objMinistry->GetGroupRoleArray();
		$objRole = $objRoleArray[0];

		foreach ($objAcsGroupArray as $intAcsGroupId => $objDescriptionArray) {
			if (!$objDescriptionArray[1]) {
				$objGroup = Group::CreateGroupForMinistry($objMinistry, GroupType::RegularGroup, $objDescriptionArray[0], null);
				CreateGroupParticipations($objAcsDatabase, $objGroup, $objRole, $intAcsGroupId, null);

			} else {
				$objGroupCategory = Group::CreateGroupForMinistry($objMinistry, GroupType::GroupCategory, $objDescriptionArray[0], null);
				$objGroupCategoryDetail = new GroupCategory();
				$objGroupCategoryDetail->GroupId = $objGroupCategory->Id;
				$objGroupCategoryDetail->Save();

				foreach ($objDescriptionArray[1] as $intAcsReserveId) {
					$objResult = $objAcsDatabase->query(sprintf('select * from awgrresf where groupid=%s AND reserveid=%s;', $intAcsGroupId, $intAcsReserveId));
					while ($objRow = $objResult->fetch_array()) {
						$objGroup = Group::CreateGroupForMinistry($objMinistry, GroupType::RegularGroup, $objRow['value'], null, $objGroupCategory);
						
						CreateGroupParticipations($objAcsDatabase, $objGroup, $objRole, $intAcsGroupId, $intAcsReserveId);
					}
				}
			}
		}

		Group::RefreshHierarchyDataForMinistry($intMinistryId);
	}

	function CreateGroupParticipations(mysqli $objAcsDatabase, Group $objGroup, GroupRole $objRole, $intAcsGroupId, $intAcsReserveId) {
		print "Adding for Group: " . $objGroup->Name . "\r\n      ";

		if ($intAcsReserveId)
			$objResult = $objAcsDatabase->query(sprintf('select * from awgrrost where groupid=%s AND reserveid1=%s', $intAcsGroupId, $intAcsReserveId));
		else
			$objResult = $objAcsDatabase->query(sprintf('select * from awgrrost where groupid=%s', $intAcsGroupId));

		while ($objRow = $objResult->fetch_array()) {
			$objAttributeValueArray = AttributeValue::QueryArray(QQ::AndCondition(
				QQ::Equal(QQN::AttributeValue()->AttributeId, 2),
				QQ::Equal(QQN::AttributeValue()->TextValue, $objRow['indvid'])
			));
			
			if (count($objAttributeValueArray) != 1) {
				printf("Issue with awgrrost.pkid of %s - IndvId %s for Group %s - AVCount of %s\r\n", $objRow['pkid'], $objRow['indvid'], $objGroup->Name, count($objAttributeValueArray));
			} else {
				$objPerson = $objAttributeValueArray[0]->Person;

				$dttStartDate = new QDateTime($objRow['dateadded']);
				if ($objRow['dateremoved'])
					$dttEndDate = new QDateTime($objRow['dateremoved']);
				else
					$dttEndDate = null;

				$objGroup->AddPerson($objPerson, $objRole->Id, $dttStartDate, $dttEndDate);
				print "*";
			}
		}

		print "\r\n      Done.\r\n\r\n";
	}