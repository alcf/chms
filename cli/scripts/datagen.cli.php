<?php
	/**
	 * ALCF ChMS Data Generation file -- this will generate random
	 * data to aid with development.
	 */

	// Counts of items to generate
	define('USER_COUNT', 50);

	// Ministries
	$strMinistryArray = array(
		'bc' => 'Biblical Counseling',
		'busops' => 'Business Operations',
		'comm' => 'Communications',
		'donations' => 'Donations and Resources',
		'evangoutreach' => 'Evangelism and Outreach',
		'events' => 'Events',
		'facilities' => 'Facilities',
		'family' => 'Family Ministry',
		'gmt' => 'Global Ministry Team',
		'growth' => 'Growth Groups',
		'ibs' => 'IBS',
		'it' => 'IT',
		'mc' => 'Member Care',
		'mens' => 'Men\'s Fellowship',
		'mit' => 'Ministry Involvement',
		'music' => 'Music',
		'prayer' => 'Prayer and Visitation',
		'safari' => 'Safari Kids',
		'services' => 'Worship Service Ministries',
		'sm' => 'Student Ministries',
		'sp' => 'Strategic Partnerships',
		'videoprod' => 'Video Production',
		'website' => 'Website',
		'womens' => 'Women\'s Ministry',
		'worshiparts' => 'Worship Arts',
		'yam' => 'Young Adult Ministry');
	QDataGen::DisplayForEachTaskStart('Generating Minsitries', count($strMinistryArray));
	foreach ($strMinistryArray as $strToken=>$strMinistry) {
		QDataGen::DisplayForEachTaskNext('Generating Minsitries');
		
		$objMinistry = new Ministry();
		$objMinistry->Token = $strToken;
		$objMinistry->Name = $strName;
		$objMinistry->ActiveFlag = true;
		$objMinistry->Save();
	}
	QDataGen::DisplayForEachTaskEnd('Generating Minsitries');



	// Generate Random Users
	while (QDataGen::DisplayWhileTask('Generating ChMS Users', USER_COUNT, false)) {
		$objUser = new User();
		$objUser->RoleTypeId = QDataGen::GenerateFromArray(array_keys(RoleType::$NameArray));
		$objUser->FirstName = QDataGen::GenerateFirstName();
		$objUser->LastName = QDataGen::GenerateLastName();
		if (rand(0, 1)) $objUser->MiddleInitial = chr(rand(ord('A'), ord('Z')));
		$objUser->Username = QDataGen::GenerateUsername($objUser->FirstName, $objUser->LastName);
		$objUser->Email = QDataGen::GenerateEmail($objUser->FirstName, $objUser->LastName);
		$objUser->Save();
	}
?>