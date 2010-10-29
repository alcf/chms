<?php
	/**
	 * Ongoing service to ensure that any groups that are "flagged" for refresh get recalculated
	 */

	// Ensure we are NOT running
	QApplication::CliProcessEnsureUnique();

	// Setup a Lock File
	QApplication::CliProcessSetupLockFile();

	// Run the Logic/Code
	while (QApplication::CliProcessIsLockFileValid()) {
		foreach (SmartGroup::QueryArray(QQ::IsNull(QQN::SmartGroup()->DateRefreshed)) as $objSmartGroup)
			$objSmartGroup->RefreshParticipationList();
		foreach (GroupCategory::QueryArray(QQ::IsNull(QQN::GroupCategory()->DateRefreshed)) as $objGroupCategory)
			$objGroupCategory->RefreshParticipationList();

		sleep(10);
	}
?>