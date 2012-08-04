<?php
	ini_set("memory_limit", "1024M");

	// Make the Directory
	if (!is_dir(STATISTICS_PDF_PATH)) QApplication::MakeDirectory(STATISTICS_PDF_PATH, 0777);

	// Anything to Load?
	if (is_file(STATISTICS_PDF_PATH . '/run.txt')) {
		$strTokens = explode(' ', trim(file_get_contents(STATISTICS_PDF_PATH . '/run.txt')));
		$intYear = intval($strTokens[0]);
		unlink(STATISTICS_PDF_PATH . '/run.txt');
	} else {
		exit(0);
	}

	if (($intYear < 1950) || ($intYear > 2500)) exit(0);

	// Setup Zend Framework load
	set_include_path(get_include_path() . ':' . __INCLUDES__);
	require_once('Zend/Loader.php');
	Zend_Loader::loadClass('Zend_Pdf'); 

	print "Generating Statistics PDF for " . $intYear . "\r\n";

	// Delete Old Files
	exec('rm -r -f ' . STATISTICS_PDF_PATH . '/StatisticsFor' . $intYear . '*.pdf');

	// Create the PDF Object for the PDF
	$objStatisticPdf = new Zend_Pdf();
	
	$dtxAfterValue = new QDateTime("1/1/".$intYear);
	$dtxBeforeValue = new QDateTime("12/30/". $intYear);
	
	// Get the Data
	$objContributionCursor = StewardshipContribution::QueryCursor(QQ::AndCondition(
	QQ::GreaterOrEqual(QQN::StewardshipContribution()->DateCredited, $dtxAfterValue),
	QQ::LessOrEqual(QQN::StewardshipContribution()->DateCredited, $dtxBeforeValue)
	));
	
	// Setup the data holders
	$fltTotalGifts = 0;
	$fltTotalAdditionalUniqueGivers = 0;
	$fltTotalGiftsOver1000 = 0;
	$fltTotalGiftsOver10000 = 0;
	$fltTotalAverageGiftSize = 0;
	$fltTotalGiftAmount = 0;
	$fltTotalGivers = 0;
	
	$objDataGridArray = array();
	$objMonthlyTotal = array(0,0,0,0,0,0,0,0,0,0,0,0);
	$objMonthlyCount = array(0,0,0,0,0,0,0,0,0,0,0,0);
	$objOver1000 = array(0,0,0,0,0,0,0,0,0,0,0,0);
	$objOver10000 = array(0,0,0,0,0,0,0,0,0,0,0,0);
	$objUniqueGiver = array(0,0,0,0,0,0,0,0,0,0,0,0);
	$objGiverCount = array(array(),array(),array(),array(),array(),array(),array(),array(),array(),array(),array(),array());
	$objGiverList = array();
	
	while ($objContribution = StewardshipContribution::InstantiateCursor($objContributionCursor)) {
		$iMonth = 0;
		$fltTotalGiftAmount += $objContribution->TotalAmount;
		$fltTotalGifts++;
	
		if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("1/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierThan(new QDateTime("2/1/".$intYear)))) {
			$iMonth = 0;
		} else if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("2/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierThan(new QDateTime("3/1/".$intYear)))) {
			$iMonth = 1;
		}else if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("3/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierThan(new QDateTime("4/1/".$intYear)))) {
			$iMonth = 2;
		} else if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("4/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierThan(new QDateTime("5/1/".$intYear)))) {
			$iMonth = 3;
		} else if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("5/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierThan(new QDateTime("6/1/".$intYear)))) {
			$iMonth = 4;
		} else if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("6/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierThan(new QDateTime("7/1/".$intYear)))) {
			$iMonth = 5;
		} else if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("7/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierThan(new QDateTime("8/1/".$intYear)))) {
			$iMonth = 6;
		}else if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("8/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierThan(new QDateTime("9/1/".$intYear)))) {
			$iMonth = 7;
		} else if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("9/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierThan(new QDateTime("10/1/".$intYear)))) {
			$iMonth = 8;
		} else if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("10/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierThan(new QDateTime("11/1/".$intYear)))) {
			$iMonth = 9;
		} else if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("11/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierThan(new QDateTime("12/1/".$intYear)))) {
			$iMonth = 10;
		} else if (($objContribution->DateCredited->IsLaterOrEqualTo(new QDateTime("12/1/".$intYear))) &&
		($objContribution->DateCredited->IsEarlierOrEqualTo(new QDateTime("12/31/".$intYear)))) {
			$iMonth = 11;
		}
	
		// Increment Monthly Values
		$objMonthlyTotal[$iMonth] += $objContribution->TotalAmount;
		if ($objContribution->TotalAmount > 1000)
		$objOver1000[$iMonth]++;
		if ($objContribution->TotalAmount > 10000)
		$objOver10000[$iMonth]++;
	
		$objMonthlyCount[$iMonth]++;
		
		// Calculate number of givers (as opposed to gifts)
		if (!in_array($objContribution->PersonId,$objGiverList)) {
			$objGiverList[] = $objContribution->PersonId;
		}
		if (!in_array($objContribution->PersonId,$objGiverCount[$iMonth])) {
			$objGiverCount[$iMonth][] = $objContribution->PersonId;
		}
		
		if(StewardshipContribution::CountByPersonId($objContribution->PersonId) <= 1) {
			$fltTotalAdditionalUniqueGivers++;
			$objUniqueGiver[$iMonth]++;
		}
		
	}
	$fltTotalGiftsOver1000 = array_sum($objOver1000);
	$fltTotalGiftsOver10000 = array_sum($objOver10000);
	$fltTotalAdditionalUniqueGivers = array_sum($objUniqueGiver);
	if ($fltTotalGifts != 0)
	$fltTotalAverageGiftSize = round($fltTotalGiftAmount/$fltTotalGifts,2);
	
	// Now fill in the Datagrid Array
	for($i=0; $i<12; $i++) {
		$strMonth = "";
		switch ($i) {
			case 0:
				$strMonth = "January";
				break;
			case 1:
				$strMonth = "February";
				break;
			case 2:
				$strMonth = "March";
				break;
			case 3:
				$strMonth = "April";
				break;
			case 4:
				$strMonth = "May";
				break;
			case 5:
				$strMonth = "June";
				break;
			case 6:
				$strMonth = "July";
				break;
			case 7:
				$strMonth = "August";
				break;
			case 8:
				$strMonth = "September";
				break;
			case 9:
				$strMonth = "October";
				break;
			case 10:
				$strMonth = "November";
				break;
			case 11:
				$strMonth = "December";
				break;
		}
		$fltAverage = 0;
		if ($objMonthlyCount[$i] != 0)
		$fltAverage = round($objMonthlyTotal[$i]/$objMonthlyCount[$i],2);
	
		$objDataGridArray[$i] = array($strMonth, QApplication::DisplayCurrency($objMonthlyTotal[$i]),
		$objMonthlyCount[$i],$objOver1000[$i],$objOver10000[$i],$objUniqueGiver[$i],
		QApplication::DisplayCurrency($fltAverage), count($objGiverCount[$i]));
	
		print("Month : ".$objDataGridArray[$i][0] . " total: ".$objDataGridArray[$i][1].
			" Gift Count: ". $objDataGridArray[$i][2]. " Over $1000: ".$objDataGridArray[$i][3].
			" Over $10,000: " . $objDataGridArray[$i][4]. " Unique Givers: ".$objDataGridArray[$i][5].
			" Average Gift: ". $objDataGridArray[$i][6]. "total givers: ". $objDataGridArray[$i][7]."\n");
	}
	
	// Create PDF with the extracted information
	$objPage = $objStatisticPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
	$objStatisticPdf->pages[] = $objPage;
	
	$intY = STEWARDSHIP_TOP - ((5/8) * 72);
	
	$intY -= 13.2;
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
	$objPage->drawText("Stewardship Giving Statistics For ". $intYear, 36, $intY, 'UTF-8');
	
	$intY -= 13.2;
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 12);
	$objPage->drawText("Totals", 36, $intY, 'UTF-8');
	
	$intY -= 15.2;
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8);
	$objPage->drawText("Total Number of Gifts: ", 36, $intY, 'UTF-8');
	$objPage->drawText($fltTotalGifts, 310, $intY, 'UTF-8');
	
	$intY -= 10.2;
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8);
	$objPage->drawText("Total Number of Givers: ", 36, $intY, 'UTF-8');
	$objPage->drawText(count($objGiverList), 310, $intY, 'UTF-8');
	
	$intY -= 10.2;
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8);
	$objPage->drawText("Total Number of Additional Unique Givers: ", 36, $intY, 'UTF-8');
	$objPage->drawText($fltTotalAdditionalUniqueGivers, 310, $intY, 'UTF-8');
	
	$intY -= 10.2;
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8);
	$objPage->drawText("Yearly Average Gift Size: ", 36, $intY, 'UTF-8');
	$objPage->drawText(QApplication::DisplayCurrency($fltTotalAverageGiftSize), 310, $intY, 'UTF-8');
	
	$intY -= 10.2;
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8);
	$objPage->drawText("Yearly Number Of Gifts Over $1000: ", 36, $intY, 'UTF-8');
	$objPage->drawText($fltTotalGiftsOver1000, 310, $intY, 'UTF-8');
	
	$intY -= 10.2;
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8);
	$objPage->drawText("Yearly Number Of Gifts Over $10000: ", 36, $intY, 'UTF-8');
	$objPage->drawText($fltTotalGiftsOver10000, 310, $intY, 'UTF-8');
	$intY -= 10.2;
	
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8);
	$objPage->drawText("Total Yearly Giving: ", 36, $intY, 'UTF-8');
	$objPage->drawText(QApplication::DisplayCurrency($fltTotalGiftAmount), 310, $intY, 'UTF-8');
	
	// Print the table
	$intY -= 15.2;
	$intXArray = array(20, 80, 150, 210, 260, 312, 398, 498);
	$objPage->setLineColor(new Zend_Pdf_Color_GrayScale(0.2));
	$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(0.2));
	$objPage->drawRectangle($intXArray[0] - 6, $intY, $intXArray[7] + 90, $intY-10);
	$intY -= 7.5;
	$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(1));
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8);
	$objPage->drawText("Month", $intXArray[0], $intY, 'UTF-8');
	$objPage->drawText("Average Gift Size", $intXArray[1], $intY, 'UTF-8');
	$objPage->drawText("Total", $intXArray[2], $intY, 'UTF-8');
	$objPage->drawText("# Gifts", $intXArray[3], $intY, 'UTF-8');
	$objPage->drawText("# Givers", $intXArray[4], $intY, 'UTF-8');
	$objPage->drawText("New Givers", $intXArray[5], $intY, 'UTF-8');
	$objPage->drawText("# Gifts Over $1000", $intXArray[6], $intY, 'UTF-8');
	$objPage->drawText("# Gifts Over $10000", $intXArray[7], $intY, 'UTF-8');
	$objPage->setFillColor(new Zend_Pdf_Color_GrayScale(0));
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 8);
	for($i=0; $i<12; $i++) {
		$intY -= 12;
		$objPage->drawText($objDataGridArray[$i][0], $intXArray[0], $intY, 'UTF-8');
		$objPage->drawText($objDataGridArray[$i][6], $intXArray[1], $intY, 'UTF-8');
		$objPage->drawText($objDataGridArray[$i][1], $intXArray[2], $intY, 'UTF-8');		
		$objPage->drawText($objDataGridArray[$i][2], $intXArray[3], $intY, 'UTF-8');
		$objPage->drawText($objDataGridArray[$i][7], $intXArray[4], $intY, 'UTF-8');
		$objPage->drawText($objDataGridArray[$i][5], $intXArray[5], $intY, 'UTF-8');
		$objPage->drawText($objDataGridArray[$i][3], $intXArray[6], $intY, 'UTF-8');
		$objPage->drawText($objDataGridArray[$i][4], $intXArray[7], $intY, 'UTF-8');
	}
	
	$objStatisticPdf->save(STATISTICS_PDF_PATH . '/StatisticsFor' . $intYear . '.pdf');
	chmod(STATISTICS_PDF_PATH . '/StatisticsFor' . $intYear . '.pdf', 0777);
?>