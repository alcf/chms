<?php
	$intPersonIdByIndvId = array();
	foreach (AttributeValue::LoadArrayByAttributeId(2) as $objAttributeValue) {
		$intPersonIdByIndvId[$objAttributeValue->TextValue] = $objAttributeValue->PersonId;
	}

	$objMySqli = new mysqli('localhost', 'root', '', 'alcf_acs');
	$objResult = $objMySqli->query('SELECT * FROM awperelt');
	$intCount = $objResult->num_rows;

	while (QDataGen::DisplayWhileTask('Importing Family Relationships', $intCount) && ($objRow = $objResult->fetch_array())) {
		if ($objRow['indvid'] != $objRow['reltindvid']) {
			$intRelationshipTypeId = null;
			switch (strtolower($objRow['relationship'])) {
				case 'mother':
				case 'father':
					$intRelationshipTypeId = RelationshipType::Parental;
					break;
				case 'son':
				case 'daughter':
					$intRelationshipTypeId = RelationshipType::Child;
					break;
				case 'brother':
				case 'sister':
					$intRelationshipTypeId = RelationshipType::Sibling;
					break;
				case 'grandmother':
				case 'grandfather':
					$intRelationshipTypeId = RelationshipType::Grandparent;
					break;
				case 'grandchild':
				case 'grandson':
				case 'granddaughter':
					$intRelationshipTypeId = RelationshipType::Grandchild;
					break;
			}

			if ($intRelationshipTypeId) {
				$objPerson = Person::Load($intPersonIdByIndvId[$objRow['indvid']]);
				$objRelatedPerson = Person::Load($intPersonIdByIndvId[$objRow['reltindvid']]);

				if (!Relationship::LoadByPersonIdRelatedToPersonId($objPerson->Id, $objRelatedPerson->Id)) {
					$objPerson->AddRelationship($objRelatedPerson, $intRelationshipTypeId);
				}
			}
		}
	}

	$objParticipationCursor = HouseholdParticipation::QueryCursor(QQ::All());
	$intCount = HouseholdParticipation::CountAll();
	while (QDataGen::DisplayWhileTask('Recalculating HouseholdParticipation Roles', $intCount) && ($objHouseholdParticipation = HouseholdParticipation::InstantiateCursor($objParticipationCursor))) {
		$objHouseholdParticipation->RefreshRole();
	}
?>