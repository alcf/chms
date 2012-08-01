<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	$strFile = QApplication::PathInfo(0);
	$strFile = str_replace('/', '', $strFile);
	$strFile = str_replace('\\', '', $strFile);

	if (is_file(STATISTICS_PDF_PATH . '/' . $strFile)) {
		// Disable strict no-cache for IE due to IE issues with downloading no-cache items
		if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
			header("Pragma:");
			header("Expires:");
		}

		header('Content-Disposition: attachment; filename=' . QApplication::PathInfo(0)); 
		header('Content-type: application/x-pdf'); 
		echo file_get_contents(STATISTICS_PDF_PATH . '/' . $strFile);
	} else {
		QApplication::Redirect('/stewardship/reports/giving_statistics.php');
	}
?>