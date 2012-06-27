<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	$dtAfterValue = new QDateTime(QApplication::PathInfo(0));
	$dtBeforeValue = new QDateTime(QApplication::PathInfo(1));
	$objMembershipArray = Membership::LoadArrayByStartDateRange($dtAfterValue,$dtBeforeValue );
	$iTotalCount = count($objMembershipArray);
	
	if ((!$objMembershipArray)|| !QApplication::PathInfo(0)|| !QApplication::PathInfo(1)) 
		QApplication::Redirect('/individuals/reports.php');

	// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=newMemberReport.csv');

	print "Name,Membership Start Date\r\n";
	

	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}

	foreach ($objMembershipArray as $objMembership) {
		print EscapeCsv($objMembership->Person->FullName);
		print ",";
		print EscapeCsv($objMembership->DateStart);
		print "\r\n";
	}
?>