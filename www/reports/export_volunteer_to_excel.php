<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	function calculateValues(Group $objGroup) {
		global $startDate;
		global $endDate;
		//global $tempDate;
		global $objPersonArray;
		global $monthCount;
		
		$objGroupParticipationArray = $objGroup->GetGroupParticipationArray();
		foreach ($objGroupParticipationArray as $objParticipation) {
			// If role is Volunteer or Volunteer Leader
			if (($objParticipation->GroupRole->GroupRoleTypeId== 1 )|| ($objParticipation->GroupRole->GroupRoleTypeId== 3 )) {
				// If a volunteer, then instantiate arrays
				$tempDate = new QDateTime($startDate);
				while($tempDate->IsEarlierOrEqualTo($endDate) ) {
					if(($objParticipation->DateStart < $tempDate) && (($objParticipation->DateEnd > $tempDate)||($objParticipation->DateEnd==null))) {
						// Verify unique person each time
						if(!in_array ($objParticipation->PersonId, $objPersonArray[$tempDate->__toString('MMM YYYY')])) {
							$objPersonArray[$tempDate->__toString('MMM YYYY')][] = $objParticipation->PersonId;
							$monthCount[$tempDate->__toString('MMM YYYY')]++;
						}
					}
					$tempDate->AddMonths(1);
				}
			}
		}
	}
	
	/*************/
	if (!QApplication::PathInfo(0)|| !QApplication::PathInfo(1) ||!QApplication::PathInfo(2)) {
		QApplication::Redirect('/reports/volunteers.php');
	}
	
	// Perform the calculation
	$afterArray = explode(" ",QApplication::PathInfo(1));
	$beforeArray = explode(" ",QApplication::PathInfo(0));
	$ministrydepartment = QApplication::PathInfo(2);
	
	$startDate =  new QDateTime($afterArray[0].'/1/'.$afterArray[1]);
	$endDate =  new QDateTime($beforeArray[0].'/1/'.$beforeArray[1]);
	
	// Initialize output values
	$objPersonArray = array();
	$monthCount = array();
	$tempDate = new QDateTime($afterArray[0].'/1/'.$afterArray[1]);
	while($tempDate->IsEarlierOrEqualTo($endDate)) {
		$monthCount[$tempDate->__toString('MMM YYYY')] = 0;
		$objPersonArray[$tempDate->__toString('MMM YYYY')] = array();
		$tempDate->AddMonths(1);
	}
	
	
	// Figure out which groups to search first.
	/*
	 +----+------------------+----------------------------+
	| id | token            | name                       |
	+----+------------------+----------------------------+
	|  1 | bc               | Biblical Counseling        |
	|  2 | hr               | HR                         |
	|  3 | appurch          | AP/Purchasing              |
	|  4 | busops           | Business Operations        |
	|  5 | finance          | Finance                    |
	|  6 | officemanagement | Office Management          |
	|  7 | et               | ETM                        |
	|  8 | evangoutreach    | Evangelism and Outreach    |
	|  9 | events           | Events                     |
	| 10 | family           | Family Ministry            |
	| 11 | ibs              | IBS                        |
	| 12 | music            | Music                      |
	| 13 | pp               | Pastor Paul                |
	| 14 | volunteers       | Volunteers                 |
	| 15 | worshiparts      | Worship Arts               |
	| 16 | facilities       | Facilities                 |
	| 17 | growth           | Growth Groups              |
	| 18 | it               | IT                         |
	| 19 | mc               | Member Care                |
	| 20 | mit              | Ministry Involvement       |
	| 21 | prayer           | Prayer and Visitation      |
	| 22 | safari           | Safari Kids                |
	| 23 | services         | Worship Service Ministries |
	| 24 | videoprod        | Video Production           |
	| 25 | website          | Website                    |
	| 26 | sp               | Strategic Partnerships     |
	| 27 | comm             | Communications             |
	| 28 | sm               | Student Ministries         |
	| 29 | payroll          | Payroll                    |
	| 30 | mens             | Men's Fellowship           |
	| 31 | yam              | Young Adult Ministry       |
	| 32 | donations        | Donations and Resources    |
	| 33 | womens           | Women's Ministry           |
	| 34 | gmt              | Global Ministry Team       |
	| 35 | pastors          | Pastoral Board             |
	| 36 | recovery         | Recovery                   |
	| 37 | singles          | Singles                    |
	| 38 | seniors          | Seniors                    |
	| 39 | minops           | Ministry Operations        |
	| 40 | stewardship      | Stewardship                |
	+----+------------------+----------------------------+-
	*/
	$objGroupCursor = Group::QueryCursor(QQ::In(QQN::Group()->GroupTypeId, array(GroupType::RegularGroup, GroupType::GrowthGroup)));
	while ($objGroup = Group::InstantiateCursor($objGroupCursor)) {
		switch($ministrydepartment) {
			case 'All':
				// increment all the appropriate arrays
				calculateValues($objGroup);
				break;
			case 'OutreachEvangelismCare':
				// Biblical Counseling, Evangelism and Outreach, Global Ministry Team, Prayer and Visitation, Recovery, Strategic Partnerships
				if (($objGroup->MinistryId == 1) || ($objGroup->MinistryId == 8) ||
				($objGroup->MinistryId == 34)|| ($objGroup->MinistryId == 21) ||
				($objGroup->MinistryId == 36) || ($objGroup->MinistryId == 26)) {
					calculateValues($objGroup);
				}
				break;
			case 'AdministrativeOperations':
				// Communications, IT, Stewardship
				if (($objGroup->MinistryId == 27) || ($objGroup->MinistryId == 18) ||
				($objGroup->MinistryId == 40)) {
					calculateValues($objGroup);
				}
				break;
			case'Discipleship':
				// Family Ministry, Growth Groups, IBS, Men's Fellowship
				if (($objGroup->MinistryId == 10) || ($objGroup->MinistryId == 17) ||
				($objGroup->MinistryId == 11) || ($objGroup->MinistryId == 30)) {
					calculateValues($objGroup);
				}
				break;
			case 'MinistryOperations':
				// Member Care, Ministry Involvement, Ministry Operations, Safari Kids, Seniors, Singles, Student Ministries, Women's Ministry, Young Adult Ministry
				if (($objGroup->MinistryId == 19) || ($objGroup->MinistryId == 20) ||
				($objGroup->MinistryId == 39)|| ($objGroup->MinistryId == 22) ||
				($objGroup->MinistryId == 38) || ($objGroup->MinistryId == 37) ||
				($objGroup->MinistryId == 28)|| ($objGroup->MinistryId == 33) || ($objGroup->MinistryId == 31)) {
					calculateValues($objGroup);
				}
				break;
			case 'WorshipArts':
				// Video Production, Worship Arts
				if (($objGroup->MinistryId == 24) || ($objGroup->MinistryId == 15)) {
					calculateValues($objGroup);
				}
				break;
			case 'WorshipService':
				// Worship Service Ministries
				if (($objGroup->MinistryId == 23)) {
					calculateValues($objGroup);
				}
				break;
			default:
				$objMinistry = Ministry::LoadByToken($ministrydepartment);
				if($objMinistry->Token == $objGroup->MinistryId) {
					// Get all participants in the group
					calculateValues($objGroup);
				}
				break;
		}
	}
	/**************/
	
	// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=VolunteerReport.csv');
	
	print "Volunteers Report From ".$startDate->__toString('MMM YYYY') . " to ". $endDate->__toString('MMM YYYY')."  \r\n";
	print "Department/Ministry: ".QApplication::PathInfo(2)."\r\n";
	print "\r\n";
	print "Month and Year, # of Volunteers\r\n";
	
	
	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}
	
	foreach ($monthCount as $key=>$value) {
		print EscapeCsv($key);
		print ",";
		print EscapeCsv($value);
		print "\r\n";
	}
?>