<?php
// Get arguments
$objParameters = new QCliParameterProcessor('bounceback', 'Checking for Bounceback emails');
$objParameters->AddDefaultParameter('file', QCliParameterType::String, 'The csv file that contains the email addresses that bounced');
$objParameters->Run();

$txtSrcFile = $objParameters->GetDefaultValue('file');
// read file
if (is_file($txtSrcFile)) {
	$lineArray = file($txtSrcFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$isFirst = true;
	foreach($lineArray as $line) {
		$objEmailArray = Email::LoadArrayByAddress(trim($line));
		if($objEmailArray) {
			printf("Found email: %s\n",trim($line));
			foreach($objEmailArray as $objEmail) {
				$objPerson = Person::LoadByPrimaryEmailId($objEmail->Id);
				if($objPerson) {
					printf("Deleting email: %s from %s %s\n",trim($line),$objPerson->FirstName,$objPerson->LastName);
					$objPerson->PrimaryEmail->Delete();
					// If there's a secondary email associated with the user set it as primary
					$objSecondaryEmailArray = Email::LoadArrayByPersonId($objPerson->Id);
					if(count($objSecondaryEmailArray)>=1) {
						foreach($objSecondaryEmailArray as $objSecondEmail) {
							printf("    Found secondary email object...%s\n",$objSecondEmail->Address);
							if($objSecondEmail->Address != trim($line)) {
								$objPerson->PrimaryEmail = $objSecondEmail;
								$objPerson->PrimaryEmail->SetAsPrimary();
								printf("    Set email: %s as the new primary email.\n",$objSecondEmail->Address);
								break;
							}
							
						}
					}
				}
				printf("    Deleting email object.\n");
				$objEmail->Delete();
			}
			print("\n");
		}
	}

} else {
	exit(0);
}
?>