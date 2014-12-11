<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	$objList = CommunicationList::Load(QApplication::PathInfo(0));
	if (!$objList) QApplication::Redirect('/communications/');

	if (!$objList->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/communications/');

	// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=' . $objList->CsvFilename);

	print "First Name, Middle Name, Last Name,E-mail, Phone, Address,City, State, Zipcode\r\n";
	
	// iterate through the Communications List. sort by Last Name, then First Name
	$objMembersListArray = $objList->GetMemberAsArray('2,0');
	//asort($objMembersListArray);
	foreach($objMembersListArray as $objMember) {
		print EscapeCsv($objMember[0]); // First Name
		print ",";
		print EscapeCsv($objMember[1]); // Middle Name
		print ",";
		print EscapeCsv($objMember[2]); // Last Name
		print ",";
		print EscapeCsv($objMember[3]); // Email
		print ",";
		if(($objMember[4] != null)&&($objMember[4] != 0)) {
			$objPerson = Person::Load($objMember[4]);
			if($objPerson) {
				if($objPerson->PrimaryPhone) print EscapeCsv($objPerson->PrimaryPhone->Number); 	//Phone number
				print ",";
				if($objPerson->PrimaryAddressText) print EscapeCsv($objPerson->PrimaryAddressText);
				print ",";
				if($objPerson->PrimaryCityText) print EscapeCsv($objPerson->PrimaryCityText);
				print ",";
				if($objPerson->PrimaryStateText) print EscapeCsv($objPerson->PrimaryStateText);
				print ",";
				if($objPerson->PrimaryZipCodeText) print EscapeCsv($objPerson->PrimaryZipCodeText);
				
			} else {
				print ",,,,,";
			} 
		}else {
			print ",,,,,";
		}

		print "\r\n";
	}

	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}
?>