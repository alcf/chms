<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	$dtAfterValue = new QDateTime(QApplication::PathInfo(0));
	$dtBeforeValue = new QDateTime(QApplication::PathInfo(1));
	$bIsExit = false;
	
	if (QApplication::PathInfo(2)=="exit")
		$bIsExit = true;
	
	$objMembershipArray;
	if ($bIsExit) {
		$objMembershipArray = Membership::LoadArrayByEndDateRange($dtAfterValue,$dtBeforeValue,QQ::All() );
	} else {
		$objMembershipArray = Membership::LoadArrayByStartDateRange($dtAfterValue,$dtBeforeValue,QQ::All() );
	}
	$iTotalCount = count($objMembershipArray);
	
	if ((!$objMembershipArray)|| !QApplication::PathInfo(0)|| !QApplication::PathInfo(1)) {
		if ($bIsExit) {
			QApplication::Redirect('/individuals/report_exit_members.php');
		} else {
			QApplication::Redirect('/individuals/reports.php');
		}
	}
	
	// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=MemberReport.csv');

	if ($bIsExit) {
		print "Exiting Members Report From ".QApplication::PathInfo(0) . " to ". QApplication::PathInfo(1)."  \r\n";
		print "Total Exiting Member Count: ".$iTotalCount ."\r\n";
		print "Name,Membership End Date, Termination Reason\r\n";
	} else {
		print "New Members Report From ".QApplication::PathInfo(0) . " to ". QApplication::PathInfo(1)."  \r\n";
		print "Total Member Count: ".$iTotalCount ."\r\n";
		// Calculate and print
		CalculateAttributeStatistics($objMembershipArray,$iTotalCount);
		print "Name,Membership Start Date,Marital Status,Age,Ethnicity, Prior Church, Salvation Date\r\n";
	}
	

	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}

	function GetAge($objMembership) {
		$objPerson = $objMembership->Person;
		return $objPerson->Age;
	}
	
	function GetMaritalStatus($objMembership) {
		$objPerson = $objMembership->Person;
		switch ($objPerson->MaritalStatusTypeId) {
			case MaritalStatusType::NotSpecified:
				return 'Not Specified';
				break;
			case MaritalStatusType::Single:
				return 'Single';
				break;
			case MaritalStatusType::Married:
				return 'Married';
				break;
			case MaritalStatusType::Separated;
				return 'Separated';
				break;
			default:
				return 'Not Specified';
		}		
	}

	function GetEthnicity($objMembership) {
		$objPerson = $objMembership->Person;
		$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
		foreach($attributeArray as $objAttribute) {
			if($objAttribute->Attribute->Name == 'Ethnicity') {
				return $objAttribute->SingleAttributeOption->Name;
			}
		}
	}
	
	function GetPriorChurch($objMembership) {
		$objPerson = $objMembership->Person;
		$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
		foreach($attributeArray as $objAttribute) {
			if($objAttribute->Attribute->Name == 'Previous Church') {
				return $objAttribute->TextValue;
			}
		}
	}
	
	function GetSalvationDate($objMembership) {
		$objPerson = $objMembership->Person;
		$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
		foreach($attributeArray as $objAttribute) {
			if($objAttribute->Attribute->Name == 'Date Accepted Christ') {
				return $objAttribute->DateValue->ToString('MMMM D, YYYY');
			}
		}
	}
	
	function CalculateAttributeStatistics($objMembershipArray,$iTotalCount) {
		$iEthnicity = array();
		$iFromPreviousChurch = 0;
		$iSalvationDate = array('Not Specified' => 0,
									'Ten Years' => 0,
									'Twenty Years' => 0,
									'Thirty Years' => 0,
									'Forty Years' =>0,
									'Fifty Years Or More' =>0);
		$iMaritalStatus = array('Not Specified'=> 0,
									'Single' => 0,
									'Married' => 0,
									'Separated' => 0);
		$iAgeStatus = array('Not Specified' => 0,
								'0-10 Years Old' => 0,
								'10-20  Years Old' => 0,
								'20-30 Years Old' => 0,
								'30-40 Years Old' =>0,
								'40-50 Years Old' =>0,
								'50-60 Years Old' =>0,
								'60+ Years Old' =>0);
		foreach($objMembershipArray as $objMembership) {
			$objPerson = $objMembership->Person;
			switch ($objPerson->MaritalStatusTypeId) {
				case MaritalStatusType::NotSpecified:
					$iMaritalStatus['Not Specified']++;
					break;
				case MaritalStatusType::Single:
					$iMaritalStatus['Single']++;
					break;
				case MaritalStatusType::Married:
					$iMaritalStatus['Married']++;
					break;
				case MaritalStatusType::Separated;
				$iMaritalStatus['Separated']++;
				break;
				default:
					$iMaritalStatus['Not Specified']++;
			}
			$iAge = $objPerson->Age;
			if ($iAge != null) {
				if ($iAge<10)
				$iAgeStatus['0-10 Years Old']++;
				elseif ($iAge<20)
				$iAgeStatus['10-20  Years Old']++;
				elseif ($iAge<30)
				$iAgeStatus['20-30 Years Old']++;
				elseif ($iAge<40)
				$iAgeStatus['30-40 Years Old']++;
				elseif ($iAge<50)
				$iAgeStatus['40-50 Years Old']++;
				elseif ($iAge<60)
				$iAgeStatus['50-60 Years Old']++;
				else
				$iAgeStatus['60+ Years Old']++;
			} else {
				$iAgeStatus['Not Specified']++;
			}
			$attributeArray = $objPerson->GetAttributeValueArray(QQ::OrderBy(QQN::AttributeValue()->Attribute->Name));
			foreach($attributeArray as $objAttribute) {
				if($objAttribute->Attribute->Name == 'Ethnicity') {
					if(array_key_exists($objAttribute->SingleAttributeOption->Name,$iEthnicity)) {
						$iEthnicity[$objAttribute->SingleAttributeOption->Name]++;
					} else {
						$iEthnicity[$objAttribute->SingleAttributeOption->Name] = 1;
					}
				}
				if($objAttribute->Attribute->Name == 'Previous Church') {
					$iFromPreviousChurch++;
				}
				if($objAttribute->Attribute->Name == 'Date Accepted Christ') {
					$dtsValue = $objAttribute->DateValue->Difference(QDateTime::Now());
					if ($dtsValue->IsNegative()) {
						$intYear = abs($dtsValue->Years);
						if ($intYear<10)
						$iSalvationDate['Ten Years']++;
						elseif ($intYear<20)
						$iSalvationDate['Twenty Years']++;
						elseif ($intYear<30)
						$iSalvationDate['Thirty Years']++;
						elseif ($intYear<40)
						$iSalvationDate['Forty Years']++;
						else
						$iSalvationDate['Fifty Years Or More']++;						
					}
				}
				
			}
		}
		ksort($iEthnicity);
		$iSalvationDate['Not Specified'] = $iTotalCount - array_sum($iSalvationDate);
		
		// Now print it all out
		print "Total New Members From Other Churches:" . $iFromPreviousChurch."\r\n";
		print "Salvation Date Statistics - New Member has been a Christian for:\r\n";
		foreach($iSalvationDate as $key=>$value){
			print $key.': ,'.$value ."\r\n";
		}
		print "Marital Statistics:\r\n";
		foreach($iMaritalStatus as $key=>$value){
			print $key.': ,'.$value ."\r\n";
		} 
		print "Age Statistics:\r\n";
		foreach($iAgeStatus as $key=>$value){
			print $key.': ,'.$value ."\r\n";
		}
	
		print "Ethnicity BreakDown:\r\n";
		foreach($iEthnicity as $key=>$value){
			print $key.': ,'.$value ."\r\n";
		}
	}
	
	foreach ($objMembershipArray as $objMembership) {
		print EscapeCsv($objMembership->Person->FullName);
		print ",";
		if ($bIsExit) {
			print EscapeCsv($objMembership->DateEnd);
			print ",";
			print EscapeCsv($objMembership->TerminationReason);
		} else {
			print EscapeCsv($objMembership->DateStart);
			print ",";
			print EscapeCsv(GetMaritalStatus($objMembership));
			print ",";
			print EscapeCsv(GetAge($objMembership));
			print ",";
			print EscapeCsv(GetEthnicity($objMembership));
			print ",";
			print EscapeCsv(GetPriorChurch($objMembership));
			print ",";
			print EscapeCsv(GetSalvationDate($objMembership));
		}
		print "\r\n";
	}
?>