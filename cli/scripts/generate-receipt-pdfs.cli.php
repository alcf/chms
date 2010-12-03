<?php
	ini_set("memory_limit", "1024M");

	// Make the Directory
	if (!is_dir(RECEIPT_PDF_PATH)) QApplication::MakeDirectory(RECEIPT_PDF_PATH, 0777);

	// Anything to Load?
	if (is_file(RECEIPT_PDF_PATH . '/run.txt')) {
		$intYear = intval(trim(file_get_contents(RECEIPT_PDF_PATH . '/run.txt')));
		unlink(RECEIPT_PDF_PATH . '/run.txt');
	} else {
		exit(0);
	}

	if (($intYear < 1950) || ($intYear > 2500)) exit(0);

	// Setup Zend Framework load
	set_include_path(get_include_path() . ':' . __INCLUDES__);
	require_once('Zend/Loader.php');
	Zend_Loader::loadClass('Zend_Pdf'); 

	print "Generating Receipts PDF for " . $intYear . "\r\n";

	// Delete Old Files
	exec('rm -r -f ' . RECEIPT_PDF_PATH . '/ReceiptsFor' . $intYear . '*.pdf');

	// Create the PDF Object for the Single and Multiple-page PDFs
	$intSingplePageCount = 1;
	$objSinglePagePdf = new Zend_Pdf();
	$objMultiplePagePdf = new Zend_Pdf();
	$objInvalidAddressPdf = new Zend_Pdf();
	
	$objHouseholdCursor = Household::QueryCursor(QQ::All(), QQ::OrderBy(QQN::Household()->Id));
	QDataGen::DisplayForEachTaskStart('Generating Receipt for Household', Household::CountAll());
	while ($objHousehold = Household::InstantiateCursor($objHouseholdCursor)) {
		QDataGen::DisplayForEachTaskNext('Generating Receipt for Household');

		// Generate for the whole household
		if ($objHousehold->CombinedStewardshipFlag) {
			if ($objHousehold->GetStewardshipAddress()) {
				$intPersonIdArray = StewardshipContribution::GetPersonIdArrayForPersonOrHousehold($objHousehold);
				$intEntryCount = count(StewardshipContribution::GetContributionAmountArrayForPresonArray($intPersonIdArray, $intYear));
				if ($intEntryCount > 38)
					StewardshipContribution::GenerateReceiptInPdf($objMultiplePagePdf, $objHousehold, $intYear);
				else if ($intEntryCount)
					StewardshipContribution::GenerateReceiptInPdf($objSinglePagePdf, $objHousehold, $intYear);
			} else {
				StewardshipContribution::GenerateReceiptInPdf($objInvalidAddressPdf, $objHousehold, $intYear);
			}

		// Generate for each individual in the household
		} else foreach ($objHousehold->GetHouseholdParticipationArray() as $objParticipation) {
			if ($objParticipation->Person->GetStewardshipAddress()) {
				$intPersonIdArray = array($objParticipation->Person->Id);
				$intEntryCount = count(StewardshipContribution::GetContributionAmountArrayForPresonArray($intPersonIdArray, $intYear));
				if ($intEntryCount > 38)
					StewardshipContribution::GenerateReceiptInPdf($objMultiplePagePdf, $objParticipation->Person, $intYear);
				else if ($intEntryCount)
					StewardshipContribution::GenerateReceiptInPdf($objSinglePagePdf, $objParticipation->Person, $intYear);
			} else {
				StewardshipContribution::GenerateReceiptInPdf($objInvalidAddressPdf, $objParticipation->Person, $intYear);
			}
		}

		// Separate into New File?
		if (count($objSinglePagePdf->pages) > 500) {
			$objSinglePagePdf->save(RECEIPT_PDF_PATH . '/ReceiptsFor' . $intYear . '_Single_' . $intSingplePageCount . '.pdf');
			chmod(RECEIPT_PDF_PATH . '/ReceiptsFor' . $intYear . '_Single_' . $intSingplePageCount . '.pdf', 0777);
			$objSinglePagePdf = new Zend_Pdf();
			$intSingplePageCount++;
		}
	}
	QDataGen::DisplayForEachTaskEnd('Generating Receipt for Household');

	$objSinglePagePdf->save(RECEIPT_PDF_PATH . '/ReceiptsFor' . $intYear . '_Single_' . $intSingplePageCount . '.pdf');
	chmod(RECEIPT_PDF_PATH . '/ReceiptsFor' . $intYear . '_Single_' . $intSingplePageCount . '.pdf', 0777);

	$objMultiplePagePdf->save(RECEIPT_PDF_PATH . '/ReceiptsFor' . $intYear . '_Multiple.pdf');
	chmod(RECEIPT_PDF_PATH . '/ReceiptsFor' . $intYear . '_Multiple.pdf', 0777);

	$objInvalidAddressPdf->save(RECEIPT_PDF_PATH . '/ReceiptsFor' . $intYear . '_InvalidAddress.pdf');
	chmod(RECEIPT_PDF_PATH . '/ReceiptsFor' . $intYear . '_InvalidAddress.pdf', 0777);
	?>