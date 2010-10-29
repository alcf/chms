<?php
	/**
	 * Run at explicit times to "clear" group participation lists, which would then cause the groups-participation-calculate to
	 * re-refresh the lists for all groups
	 */
	SmartGroup::ForceRefreshParticipations();
	GroupCategory::ForceRefreshParticipations();
?>