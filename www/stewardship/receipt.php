<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

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

	$objPdf = StewardshipContribution::GeneratePdfReceipt($objObject, QApplication::PathInfo(2));

	// Get PDF document as a string 
	$strData = $objPdf->render(); 

	if (QApplication::PathInfo(3))
		header('Content-Disposition: attachment; filename=' . QApplication::PathInfo(3)); 
	header('Content-type: application/x-pdf'); 
	echo $strData;
?>