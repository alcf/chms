<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	// Get the array of all growth groups
	$groupArray = Group::LoadOrderedArrayByMinistryIdAndConfidentiality(
	17, Ministry::Load(17)->IsLoginCanAdminMinistry(QApplication::$Login),true);
	
	$intTotalCount = 0;
	$intGroupCount = 0;
	
	// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=growthgroupreport.csv');

	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}
	
	print "Growth Group,First Name,Last Name,E-mail,Phone,Address,City,State,Zip Code\r\n";
	foreach ($groupArray as $objGroup) {
		// If it's a growth group then display the details
		if ($objGroup->Type != GroupType::$NameArray[GroupType::GroupCategory]) {
			$objPersonCursor = Person::QueryCursor(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $objGroup->Id),
					QQ::IsNull(QQN::Person()->GroupParticipation->DateEnd)
				), QQ::Clause(
					QQ::OrderBy(QQN::Person()->LastName, QQN::Person()->FirstName),
					QQ::Distinct()
				));
		$intGroupCount++;
		while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
			print EscapeCsv($objGroup->Name);
			print ",";
			print EscapeCsv($objPerson->FirstName);
			print ",";
			print EscapeCsv($objPerson->LastName);
			print ",";
			if ($objPerson->PrimaryEmail) print EscapeCsv($objPerson->PrimaryEmail->Address);
			print ",";
			print EscapeCsv($objPerson->PrimaryPhoneText);
			print ",";
			print EscapeCsv($objPerson->PrimaryAddressText);
			print ",";
			print EscapeCsv($objPerson->PrimaryCityText);
			print ",";
			print EscapeCsv($objPerson->PrimaryStateText);
			print ",";
			print EscapeCsv($objPerson->PrimaryZipCodeText);
			print ",";
			print "\r\n";
			$intTotalCount++;
		}
	}
}
print "\r\n";
print "\r\n";
print "Total Number of Growth Groups: ". $intGroupCount;
print "\r\n";
print "\r\n";
print "Total Count of People in Growth Groups: ". $intTotalCount;

?>