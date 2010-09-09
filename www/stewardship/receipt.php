<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	$objPdf = StewardshipContribution::GeneratePdfReceipt(null, 2010);

	// Get PDF document as a string 
	$strData = $objPdf->render(); 

//	header("Content-Disposition: inline; filename=result.pdf"); 
	header("Content-type: application/x-pdf"); 
	echo $strData;
?>