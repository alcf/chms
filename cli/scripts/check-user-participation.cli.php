<?php
// Get arguments
$objParameters = new QCliParameterProcessor('email', 'Email to check against');
$objParameters->AddDefaultParameter('email', QCliParameterType::String, 'The email address to check for in group and email lists');
$objParameters->Run();

$txtEmail = $objParameters->GetDefaultValue('email');
$objEmailArray = Email::LoadArrayByAddress($txtEmail);
if(count($objEmailArray)>0) {
	print("Found email objects\n");
	print("\n");
	$intPersonIdArray = array();
	foreach($objEmailArray as $objEmail) {
		$objPerson = Person::LoadByPrimaryEmailId($objEmail->Id);
		if($objPerson)
			$intPersonIdArray[] = $objPerson->Id;
	}

	print("GROUPS\n");
	$objGroupCursor = Group::QueryCursor(QQ::All());
	QDataGen::DisplayForEachTaskStart('Checking for email in Group Lists', Group::CountAll());
	while ($objGroup = Group::InstantiateCursor($objGroupCursor)) {
		QDataGen::DisplayForEachTaskNext('Checking for email in Group Lists');
		$objGroupParticipationArr = $objGroup->GetGroupParticipationArray();
		foreach($objGroupParticipationArr as $objGroupParticipant) {
			if(in_array($objGroupParticipant->PersonId, $intPersonIdArray)) {
				printf("\n%s is in %s: %s\n",$txtEmail,$objGroup->Ministry->Name, $objGroup->Name);
				break;
			}
		}
	}
	QDataGen::DisplayForEachTaskEnd('Checking for email in Group Lists');
	
	print("COMMUNICATION LISTS\n");
	$objCommuncationsCursor = CommunicationList::QueryCursor(QQ::All());
	QDataGen::DisplayForEachTaskStart('Checking for email in Communication Lists', CommunicationList::CountAll());
	while ($objCommunicationList = CommunicationList::InstantiateCursor($objCommuncationsCursor)) {
		QDataGen::DisplayForEachTaskNext('Checking for email in Communication Lists');
		$objCommListArray = $objCommunicationList->GetMemberAsArray();
		foreach($objCommListArray as $objComListEntry) {			
			if($objComListEntry[3] == $txtEmail) {
				printf("\n%s is in %s: %s\n",$txtEmail,$objCommunicationList->Ministry->Name,$objCommunicationList->Name);
				break;
			}
		}
	}
	QDataGen::DisplayForEachTaskEnd('Checking for email in Communication Lists');
} else {
	print ("No email object found\n");
}
?>