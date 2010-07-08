<?php
	$objServer = fsockopen('ssl://pop.gmail.com', 995);

	print($strData = fgets($objServer, 4048));
	if (strpos($strData, '+OK') === false) { fclose($objServer); exit('Here - 1'); }

	print($strMessage = "USER groups@groups.alcf.net\r\n");
	fputs($objServer, $strMessage);
	print($strData = fgets($objServer, 4048));
	if (strpos($strData, '+OK') === false) { fclose($objServer); exit('Here - 2'); }

	print($strMessage = "PASS 2Drf1$&ja\r\n");
	fputs($objServer, $strMessage);
	print($strData = fgets($objServer, 4048));
	if (strpos($strData, '+OK') === false) { fclose($objServer); exit('Here - 3'); }

	print($strMessage = "RETR 1\r\n");
	fputs($objServer, $strMessage);
	print($strData = fgets($objServer, 4048));
	if (strpos($strData, '+OK') === false) { fclose($objServer); exit('Here - 4'); }

	while (($strData = fgets($objServer, 4048)) != ".\r\n") {
		print $strData;
	}

	print($strMessage = "QUIT\r\n");
	fputs($objServer, $strMessage);
	print($strData = fgets($objServer, 4048));
	if (strpos($strData, '+OK') === false) { fclose($objServer); exit('Here - 5'); }

	fclose($objServer);
?>