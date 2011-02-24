<?php
	// Up the Memory Limit
	ini_set('memory_limit', '1024M');

	// Ensure we are NOT running
	QApplication::CliProcessEnsureUnique();

	// Setup a Lock File
	QApplication::CliProcessSetupLockFile();

	// Run the Logic/Code
	while (QApplication::CliProcessIsLockFileValid()) {
		$strPassword = trim(file_get_contents(GROUPS_SERVER_PASSWORD_PATH));
		$objPopClient = GroupsPopClient::CreateClient(GROUPS_SERVER_URI, GROUPS_SERVER_PORT, GROUPS_SERVER_USERNAME, $strPassword);

		// Only proceed if the POP Client has connected
		if ($objPopClient) {
			// We only want to process up to 10 messages at a time
			$intMessageCount = min(10, $objPopClient->MessageCount);

			for ($intMessageNumber = 1; $intMessageNumber <= $intMessageCount; $intMessageNumber++) { 
				$strRawMessage = $objPopClient->GetMessage($intMessageNumber, 99999999);
				EmailMessage::CreateWithRawMessage($strRawMessage);

				// The 99999999 above and the repeat RETR request below is due to Gmail's quirkiness
				$objPopClient->GetMessage($intMessageNumber);
				$objPopClient->DeleteMessage($intMessageNumber);
			}

			$objPopClient->CloseClient();

			sleep(10);
		} else {
			sleep(3);
		}
	}
?>