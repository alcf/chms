<?php
	// Ensure we are NOT running
	QApplication::CliProcessEnsureUnique();

	// Setup a Lock File
	QApplication::CliProcessSetupLockFile();

	// Run the Logic/Code
	while (QApplication::CliProcessIsLockFileValid()) {
		$strUsername = GROUPS_SERVER_USERNAME;
		$strPassword = trim(file_get_contents(GROUPS_SERVER_PASSWORD_PATH));

		$objServer = fsockopen(GROUPS_SERVER_URI, GROUPS_SERVER_PORT);

		print($strData = fgets($objServer, 4048));
		if (strpos($strData, '+OK') === false) { fclose($objServer); exit('Here - 1'); }
	
		print($strMessage = "USER " . $strUsername . "\r\n");
		fputs($objServer, $strMessage);
		print($strData = fgets($objServer, 4048));
		if (strpos($strData, '+OK') === false) { fclose($objServer); exit('Here - 2'); }
	
		print($strMessage = "PASS " . $strPassword . "\r\n");
		fputs($objServer, $strMessage);
		print($strData = fgets($objServer, 4048));
		if (strpos($strData, '+OK') === false) { fclose($objServer); exit('Here - 3'); }

		print($strMessage = "STAT\r\n");
		fputs($objServer, $strMessage);
		print($strData = fgets($objServer, 4048));
		if (strpos($strData, '+OK') === false) { fclose($objServer); exit('Here - 4a'); }

		print($strMessage = "RETR 1\r\n");
		fputs($objServer, $strMessage);
		print($strData = fgets($objServer, 4048));
		if (strpos($strData, '+OK') === false) { fclose($objServer); exit('Here - 4b'); }
		
		while (($strData = fgets($objServer, 4048)) != ".\r\n") {
			print $strData;
		}
	
		print($strMessage = "QUIT\r\n");
		fputs($objServer, $strMessage);
		print($strData = fgets($objServer, 4048));
		if (strpos($strData, '+OK') === false) { fclose($objServer); exit('Here - 5'); }
	
		fclose($objServer);

		sleep(10);
	}
?>