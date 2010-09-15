<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	$strFile = QApplication::PathInfo(0);
	$strFile = str_replace('/', '', $strFile);
	$strFile = str_replace('\\', '', $strFile);

	if (is_file(RECEIPT_PDF_PATH . '/' . $strFile)) {
		header('Content-Disposition: attachment; filename=' . QApplication::PathInfo(0)); 
		header('Content-type: application/x-pdf'); 
		echo file_get_contents(RECEIPT_PDF_PATH . '/' . $strFile);
	} else {
		QApplication::Redirect('/stewardship/receipts');
	}
?>