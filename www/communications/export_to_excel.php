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

	print "First Name, Middle Name, Last Name,E-mail\r\n";
	
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
		print "\r\n";
	}

	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}
?>