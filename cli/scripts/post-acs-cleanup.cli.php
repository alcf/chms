<?php
	$objPersonCursor = Person::QueryCursor(QQ::All());
	QDataGen::DisplayForEachTaskStart('Refreshing Person data', Person::CountAll());
	while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
		QDataGen::DisplayForEachTaskNext('Refreshing Person data');
		$objPerson->RefreshMaritalStatusTypeId(false);
		$objPerson->RefreshMembershipStatusTypeId(false);
		$objPerson->RefreshPrimaryContactInfo(true);
	}
	QDataGen::DisplayForEachTaskEnd('Refreshing Person data');

	$objHouseholdCursor = Household::QueryCursor(QQ::All());
	QDataGen::DisplayForEachTaskStart('Refreshing Household data', Household::CountAll());
	while ($objHousehold = Household::InstantiateCursor($objHouseholdCursor)) {
		QDataGen::DisplayForEachTaskNext('Refreshing Household data');
		$objHousehold->RefreshMembers(false);
		
		$objMarriedPersonArray = array();
		foreach ($objHousehold->GetHouseholdParticipationArray() as $objParticipation) {
			if (($objParticipation->Person->MaritalStatusTypeId == MaritalStatusType::Married) &&
				($objParticipation->Person->CountMarriages() == 1))
				$objMarriedPersonArray[] = $objParticipation->Person;
		}

		if (count($objMarriedPersonArray) == 2) {
			$objMarriedPersonArray[0]->DeleteAllMarriages();
			$objMarriedPersonArray[1]->DeleteAllMarriages();
			$objMarriedPersonArray[0]->CreateMarriageWith($objMarriedPersonArray[1]);
		} else if (count($objMarriedPersonArray)) {
			print "\r\nWhat!?  Household " . $objHousehold->Id . " has a marriage count of " . count($objMarriedPersonArray) . "!\r\n";
		}
		
		$objHousehold->Save();
	}
	QDataGen::DisplayForEachTaskEnd('Refreshing Household data');
?>