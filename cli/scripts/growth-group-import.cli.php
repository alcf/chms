<?php
	$objParameters = new QCliParameterProcessor('growth-group-import', 'ALCF Growth Group Importer Script');
	$objParameters->AddDefaultParameter('server', QCliParameterType::String, 'Server/Host of the MySQL Database');
	$objParameters->AddDefaultParameter('dbname', QCliParameterType::String, 'Database Name of the MySQL Database');
	$objParameters->AddDefaultParameter('username', QCliParameterType::String, 'Username of the MySQL user');
	$objParameters->Run();

	$objMySqli = new mysqli($objParameters->GetDefaultValue('server'), $objParameters->GetDefaultValue('username'), null, $objParameters->GetDefaultValue('dbname'));
	$objMinistry = Ministry::LoadByToken('growth');
	if (!$objMinistry) exit('No GG Ministry Found');

	$objResult = $objMySqli->Query('SELECT * FROM growth_group_structure order by id;');
	while ($objRow = $objResult->fetch_array()) {
		$objStructure = new GrowthGroupStructure();
		$objStructure->Name = $objRow['name'];
		$objStructure->Save();
	}

	$objResult = $objMySqli->Query('SELECT * FROM growth_group_location order by id;');
	$objParentGroupArray = array();
	while ($objRow = $objResult->fetch_array()) {
		$objGrowthGroupLocation = new GrowthGroupLocation();
		$objGrowthGroupLocation->Location = $objRow['location'];
		$objGrowthGroupLocation->Longitude = $objRow['longitude'];
		$objGrowthGroupLocation->Latitude = $objRow['latitude'];
		$objGrowthGroupLocation->Zoom = $objRow['zoom'];
		$objGrowthGroupLocation->Save();
		
		$strTokens = explode('(', $objGrowthGroupLocation->Location);
		$objParentGroup = Group::CreateGroupForMinistry($objMinistry, GroupType::GroupCategory, trim($strTokens[0]), 'Growth Groups in ' . $objGrowthGroupLocation->Location);

		$objGgResult = $objMySqli->Query('SELECT * FROM growth_group WHERE growth_group_location_id=' . $objRow['id'] . ' ORDER BY id');
		while ($objGgRow = $objGgResult->fetch_array()) {
			$objGroup = Group::CreateGroupForMinistry($objMinistry, GroupType::GrowthGroup, $objGgRow['name'], 'Growth Group for ' . $objGgRow['name'], $objParentGroup);
			$objGrowthGroup = new GrowthGroup();
			$objGrowthGroup->Group = $objGroup;
			$objGrowthGroup->GrowthGroupLocationId = $objGgRow['growth_group_location_id'];
			$objGrowthGroup->GrowthGroupDayTypeId = $objGgRow['growth_group_day_type_id'];
			$objGrowthGroup->MeetingBitmap = $objGgRow['meeting_bitmap'];
			$objGrowthGroup->StartTime = $objGgRow['start_time'];
			$objGrowthGroup->EndTime = $objGgRow['end_time'];
			$objGrowthGroup->Address1 = $objGgRow['address_1'];
			$objGrowthGroup->Address2 = $objGgRow['address_2'];
			$objGrowthGroup->CrossStreet1 = $objGgRow['cross_street_1'];
			$objGrowthGroup->CrossStreet2 = $objGgRow['cross_street_2'];
			$objGrowthGroup->ZipCode = $objGgRow['zip_code'];
			$objGrowthGroup->Longitude = $objGgRow['longitude'];
			$objGrowthGroup->Latitude = $objGgRow['latitude'];
			$objGrowthGroup->Accuracy = $objGgRow['accuracy'];
			$objGrowthGroup->Save();
			
			$objStructureResult = $objMySqli->Query('SELECT * FROM growthgroupstructure_growthgroup_assn where growth_group_id=' . $objGgRow['id']);
			while ($objStructureRow = $objStructureResult->fetch_array()) {
				$objGrowthGroup->AssociateGrowthGroupStructure(GrowthGroupStructure::Load($objStructureRow['growth_group_structure_id']));
			}
		}
	}

	$objMySqli->Close();
	Group::RefreshHierarchyDataForMinistry($objMinistry->Id);
?>