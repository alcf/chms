<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=gg_registrations.csv');

	print "First Name,Last Name,E-mail,Address,City,Zip Code,Date Received,Preferred Location 1, Preferred Location 2, Requested Group Role, Requested Group Types, Requested Group Days, Source, Processed,Groups Placed, Placement Date\r\n";
	$objGroupRegistrantCursor = GroupRegistrations::QueryCursor(QQ::All());		

	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}

	while ($objGroupRegistrant = GroupRegistrations::InstantiateCursor($objGroupRegistrantCursor)) {
		print EscapeCsv($objGroupRegistrant->FirstName);
		print ",";
		print EscapeCsv($objGroupRegistrant->LastName);
		print ",";
		print EscapeCsv($objGroupRegistrant->Email);
		print ",";
		print EscapeCsv($objGroupRegistrant->Address);
		print ",";
		print EscapeCsv($objGroupRegistrant->City);
		print ",";
		print EscapeCsv($objGroupRegistrant->Zipcode);
		print ",";
		print EscapeCsv($objGroupRegistrant->DateReceived->ToString('M/D/YYYY'));
		print ",";
		print EscapeCsv($objGroupRegistrant->PreferredLocation1);
		print ",";
		print EscapeCsv($objGroupRegistrant->PreferredLocation2);
		print ",";
		print EscapeCsv($objGroupRegistrant->GroupRole->Name);
		print ",";
		
		$strReturn = '';
		foreach (GrowthGroupStructure::LoadAll() as $objGrowthGroupStructure) {
			if($objGroupRegistrant->IsGrowthGroupStructureAsGroupstructureAssociated($objGrowthGroupStructure)) {
				$strReturn .= $objGrowthGroupStructure->Name . ', ';
			}
		}
		$strReturn =  substr($strReturn, 0,strlen($strReturn)-2);
		print EscapeCsv($strReturn);
		print ",";
		print EscapeCsv($objGroupRegistrant->GroupDay);
		print ",";	
		print EscapeCsv(SourceList::Load($objGroupRegistrant->SourceListId)->Name);
		print ",";
		if($objGroupRegistrant->ProcessedFlag)
			print 'Yes';
		else 
			print 'No';
		print ",";
		print EscapeCsv($objGroupRegistrant->GroupsPlaced);
		print ",";
		print EscapeCsv($objGroupRegistrant->DateProcessed);
		print ",";
		print "\r\n";
	}
?>