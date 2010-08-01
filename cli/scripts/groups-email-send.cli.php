<?php
	// Ensure we are NOT running
	QApplication::CliProcessEnsureUnique();

	// Setup a Lock File
	QApplication::CliProcessSetupLockFile();

	// Run the Logic/Code
	while (QApplication::CliProcessIsLockFileValid()) {
		// Analyze only 10 at a time, starting with the oldest (E.g. lowest ID) first
		$objMessageArray = EmailMessage::LoadArrayByEmailMessageStatusTypeId(
			EmailMessageStatusType::PendingSend,
			array(
				QQ::OrderBy(QQN::EmailMessage()->Id),
				QQ::LimitInfo(10)
			)
		);

		foreach ($objMessageArray as $objMessage) {
			// Send up to 100 at a time for any given EmailMessage
			$objMessage->SendMessage(100);
		}

		sleep(10);
	}
?>