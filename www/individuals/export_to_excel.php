<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	$dtAfterValue = new QDateTime(QApplication::PathInfo(0));
	$dtBeforeValue = new QDateTime(QApplication::PathInfo(1));
	$bIsExit = false;
	if (QApplication::PathInfo(2)=="exit")
		$bIsExit = true;
	
	$objMembershipArray;
	if ($bIsExit) {
		$objMembershipArray = Membership::LoadArrayByEndDateRange($dtAfterValue,$dtBeforeValue );
	} else {
		$objMembershipArray = Membership::LoadArrayByStartDateRange($dtAfterValue,$dtBeforeValue );
	}
	$iTotalCount = count($objMembershipArray);
	
	if ((!$objMembershipArray)|| !QApplication::PathInfo(0)|| !QApplication::PathInfo(1)) {
		if ($bIsExit) {
			QApplication::Redirect('/individuals/report_exit_members.php');
		} else {
			QApplication::Redirect('/individuals/reports.php');
		}
	}

	// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=MemberReport.csv');

	if ($bIsExit) {
		print "Exiting Members Report From ".QApplication::PathInfo(0) . " to ". QApplication::PathInfo(1)."  \r\n";
		print "Total Exiting Member Count: ".$iTotalCount ."\r\n";
		print "Name,Membership End Date, Termination Reason\r\n";
	} else {
		print "New Members Report From ".QApplication::PathInfo(0) . " to ". QApplication::PathInfo(1)."  \r\n";
		print "Total Member Count: ".$iTotalCount ."\r\n";
		print "Name,Membership Start Date\r\n";
	}
	

	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}

	foreach ($objMembershipArray as $objMembership) {
		print EscapeCsv($objMembership->Person->FullName);
		print ",";
		if ($bIsExit) {
			print EscapeCsv($objMembership->DateEnd);
			print ",";
			print EscapeCsv($objMembership->TerminationReason);
		} else {
			print EscapeCsv($objMembership->DateStart);
		}
		print "\r\n";
	}
?>