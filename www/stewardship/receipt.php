<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	require_once('Zend/Loader.php');
	Zend_Loader::loadClass('Zend_Pdf'); 

	var_dump(function_exists("iconv_get_encoding"));
	exit();
	
	$objPdf = new Zend_Pdf();
	$objPage = $objPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
	$objPdf->pages[] = $objPage;

	// Set font 
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA), 20); 

	// Draw text 
	$objPage->drawText('Hello world!', 100, 510); 

	// Get PDF document as a string 
	$strData = $objPdf->render(); 

//	header("Content-Disposition: inline; filename=result.pdf"); 
	header("Content-type: application/x-pdf"); 
	echo $strData;
?>