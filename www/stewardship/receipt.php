<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	// Setup Zend Framework load
	set_include_path(get_include_path() . ':' . __INCLUDES__);
	require_once('Zend/Loader.php');
	Zend_Loader::loadClass('Zend_Pdf'); 

	// Expected PathInfo to be PersonId/HouseholdId/Year
	// Note that HouseholdId is OPTIONAL -- if HouseholdId, then it is a combined statement for the entire household
	// Otherwise, if no HouseholdId (e.g. "0"), then it is just a individual statement
	$objPerson = Person::Load(QApplication::PathInfo(0));
	$objObject = $objPerson;
	if (QApplication::PathInfo(1)) {
		$objHousehold = Household::Load(QApplication::PathInfo(1));
		if (!$objHousehold) QApplication::Redirect('/main/');
		if (!HouseholdParticipation::LoadByPersonIdHouseholdId($objPerson->Id, $objHousehold->Id)) QApplication::Redirect('/main/');
		$objObject = $objHousehold;
	}

	if (!((QApplication::PathInfo(2) >= 1950) && (QApplication::PathInfo(2) <= 2500)))
		 QApplication::Redirect('/main/');

	// Create the PDF Object
	$objPdf = new Zend_Pdf();
	StewardshipContribution::GenerateReceiptInPdf($objPdf, $objObject, QApplication::PathInfo(2), true);

	// Get PDF document as a string 
	$strData = $objPdf->render(); 

	// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	if (QApplication::PathInfo(3))
		header('Content-Disposition: attachment; filename=' . QApplication::PathInfo(3)); 
	header('Content-type: application/x-pdf'); 
	echo $strData;
?>