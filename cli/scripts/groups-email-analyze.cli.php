<?php
	// Ensure we are NOT running
	QApplication::CliProcessEnsureUnique();

	// Setup a Lock File
	QApplication::CliProcessSetupLockFile();

	// Run the Logic/Code
	while (QApplication::CliProcessIsLockFileValid()) {
		// Analyze only 10 at a time, starting with the oldest (E.g. lowest ID) first
		$objMessageArray = EmailMessage::LoadArrayByEmailMessageStatusTypeId(
			EmailMessageStatusType::NotYetAnalyzed,
			array(
				QQ::OrderBy(QQN::EmailMessage()->Id),
				QQ::LimitInfo(10)
			)
		);

		foreach ($objMessageArray as $objMessage) {
print ('Analyzeing ' . $objMessage->Id . '... ');
			$objMessage->AnalyzeMessage();
print "Done.\r\n";
		}

		sleep(10);
	}
?>