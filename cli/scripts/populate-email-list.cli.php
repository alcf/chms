<?php
// Get arguments
$objParameters = new QCliParameterProcessor('populate', 'Populate Email List Script');
$objParameters->AddDefaultParameter('file', QCliParameterType::String, 'The csv file that contains the email addresses to import to the email list');
$objParameters->AddDefaultParameter('token', QCliParameterType::String, 'The token identifying the list to import the email addresses to');
$objParameters->Run();

$txtSrcFile = $objParameters->GetDefaultValue('file');
$groupList =  $objParameters->GetDefaultValue('token');

// read file
if (is_file($txtSrcFile)) {
	$lineArray = file($txtSrcFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$isFirst = true;
	foreach($lineArray as $line) {
		if ($isFirst) {
			$isFirst = false;
		} else {
			$strTokens = explode(',', trim($line));
			$firstName = $strTokens[0];
			$lastName = $strTokens[1];
			$email = $strTokens[2];
			
			$objCommunicationListEntry = CommunicationListEntry::LoadByEmail($email);
			if (!$objCommunicationListEntry) {
				// If not found then create new entry and add to the communications list
				$objCommunicationListEntry = new CommunicationListEntry();
				$objCommunicationListEntry->Email = $email;
				$objCommunicationListEntry->FirstName = $firstName;
				$objCommunicationListEntry->LastName = $lastName;
				$objCommunicationListEntry->Save();
			}
	
			$objList = CommunicationList::LoadByToken($groupList);
			if ($objList){
				if($objList->IsCommunicationListEntryAssociated($objCommunicationListEntry)) {
					print $email." is already subscribed to the '".$groupList."' list\r\n";
				} else {
					$objList->AssociateCommunicationListEntry($objCommunicationListEntry);
					print ("Added email: ". $email."\n\r");
				}
			} else {
				print $groupList . " List could not be found. No entries added.\n\r";
			}
		}
	}
	
} else {
	exit(0);
}
?>