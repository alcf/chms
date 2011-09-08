<?php 
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	// Setup Zend Framework load
	set_include_path(get_include_path() . ':' . __INCLUDES__);
	require_once('Zend/Loader.php');
	Zend_Loader::loadClass('Zend_Pdf'); 

	// Do we have one and only one household? and if so, are we using that?  or alternatively, we're just using the person
	$objHouseholdParticipationArray = QApplication::$PublicLogin->Person->GetHouseholdParticipationArray();
	if (count($objHouseholdParticipationArray) && $objHouseholdParticipationArray[0]->Household->CombinedStewardshipFlag)
		$objObject = $objHouseholdParticipationArray[0]->Household;
	else
		$objObject = QApplication::$PublicLogin->Person;

	// Make sure we're okay on "year"	
	if (!((QApplication::PathInfo(0) >= 1950) && (QApplication::PathInfo(0) <= 2500)))
		 QApplication::Redirect('/main/');

	// Create the PDF Object
	$objPdf = new Zend_Pdf();
	StewardshipContribution::GenerateReceiptInPdf($objPdf, $objObject, QApplication::PathInfo(0), true);

	// Get PDF document as a string 
	$strData = $objPdf->render(); 

	// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	if (QApplication::PathInfo(1))
		header('Content-Disposition: attachment; filename=' . QApplication::PathInfo(1)); 
	header('Content-type: application/x-pdf'); 
	echo $strData;
?>
