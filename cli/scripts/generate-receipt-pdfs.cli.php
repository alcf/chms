<?php
	ini_set("memory_limit", "1024M");

	// Setup Zend Framework load
	set_include_path(get_include_path() . ':' . __INCLUDES__);
	require_once('Zend/Loader.php');
	Zend_Loader::loadClass('Zend_Pdf'); 

	$intYear = 2010;

	// Make the Directory, clean up the directory
	if (!is_dir(RECEIPT_PDF_PATH)) QApplication::MakeDirectory(RECEIPT_PDF_PATH, 0777);
	exec('rm -r -f ' . RECEIPT_PDF_PATH . '/ReceiptsFor' . $intYear . '*.pdf');

	// Create the PDF Object for the Single and Multiple-page PDFs
	$intSingplePageCount = 1;
	$objSinglePagePdf = new Zend_Pdf();
	$objMultiplePagePdf = new Zend_Pdf();

	$objHouseholdCursor = Household::QueryCursor(QQ::All(), QQ::OrderBy(QQN::Household()->Id));
	QDataGen::DisplayForEachTaskStart('Generating Receipt for Household', Household::CountAll());
	while ($objHousehold = Household::InstantiateCursor($objHouseholdCursor)) {
		QDataGen::DisplayForEachTaskNext('Generating Receipt for Household');

		// Generate for the whole household
		if ($objHousehold->CombinedStewardshipFlag) {
			$intPersonIdArray = StewardshipContribution::GetPersonIdArrayForPersonOrHousehold($objHousehold);
			$intEntryCount = count(StewardshipContribution::GetContributionAmountArrayForPresonArray($intPersonIdArray, $intYear));
			if ($intEntryCount > 38)
				StewardshipContribution::GenerateReceiptInPdf($objMultiplePagePdf, $objHousehold, $intYear);
			else if ($intEntryCount)
				StewardshipContribution::GenerateReceiptInPdf($objSinglePagePdf, $objHousehold, $intYear);

		// Generate for each individual in the household
		} else foreach ($objHousehold->GetHouseholdParticipationArray() as $objParticipation) {
			$intPersonIdArray = array($objParticipation->Person->Id);
			$intEntryCount = count(StewardshipContribution::GetContributionAmountArrayForPresonArray($intPersonIdArray, $intYear));
			if ($intEntryCount > 38)
				StewardshipContribution::GenerateReceiptInPdf($objMultiplePagePdf, $objParticipation->Person, $intYear);
			else if ($intEntryCount)
				StewardshipContribution::GenerateReceiptInPdf($objSinglePagePdf, $objParticipation->Person, $intYear);
		}

		// Separate into New File?
		if (count($objSinglePagePdf->pages) > 500) {
			$objSinglePagePdf->save(__DOCROOT__ . '/../ReceiptsFor' . $intYear . '_Single_' . $intSingplePageCount . '.pdf');
			$objSinglePagePdf = new Zend_Pdf();
			$intSingplePageCount++;
		}
	}
	QDataGen::DisplayForEachTaskEnd('Generating Receipt for Household');

	$objSinglePagePdf->save(__DOCROOT__ . '/../ReceiptsFor' . $intYear . '_Single_' . $intSingplePageCount . '.pdf');
	$objMultiplePagePdf->save(__DOCROOT__ . '/../ReceiptsFor' . $intYear . '_Multiple.pdf');
?>