<?php
	// Up the Memory Limit
	ini_set('memory_limit', '256M');

	// Ensure we are NOT running
	QApplication::CliProcessEnsureUnique();

	// Setup a Lock File
	QApplication::CliProcessSetupLockFile();

	// Run the Logic/Code
	while (QApplication::CliProcessIsLockFileValid()) {
		// Analyze only 10 at a time, starting with the oldest (E.g. lowest ID) first
		$objMessageArray = SmsMessage::LoadArrayByDateSent(
			null,
			array(
				QQ::OrderBy(QQN::SmsMessage()->Id),
				QQ::LimitInfo(10)
			)
		);

		foreach ($objMessageArray as $objMessage) {
			$objMessage->Send();
		}

		sleep(10);
	}
?>