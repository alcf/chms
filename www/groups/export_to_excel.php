<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	$objGroup = Group::Load(QApplication::PathInfo(0));
	if (!$objGroup) QApplication::Redirect('/');

	if (!$objGroup->IsLoginCanView(QApplication::$Login)) QApplication::Redirect('/');

	// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=' . $objGroup->CsvFilename);

	print "First Name,Last Name,E-mail,Phone,Address,City,State,Zip Code,Birthdate\r\n";
	$objPersonCursor = Person::QueryCursor(
		QQ::AndCondition(
			QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $objGroup->Id),
			QQ::IsNull(QQN::Person()->GroupParticipation->DateEnd)
		), QQ::Clause(
			QQ::OrderBy(QQN::Person()->LastName, QQN::Person()->FirstName),
			QQ::Distinct()
		));

	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}

	while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
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

		if ($objPerson->DateOfBirth && !$objPerson->DobGuessedFlag) {
			if ($objPerson->DobYearApproximateFlag) {
				print EscapeCsv($objPerson->DateOfBirth->ToString('DD-MMM'));
			} else {
				print EscapeCsv($objPerson->DateOfBirth->ToString('M/D/YYYY'));
			}
		}
		print "\r\n";
	}
?>