<?php
$objPersonCursor = Person::QueryCursor(QQ::All());
//QDataGen::DisplayForEachTaskStart('Checking for Members who might have left', Person::CountAll());
print("\n");
$iTotal = 0;
$yearBack = QDateTime::FromTimestamp(strtotime("1 February 2014"));
print "YearBack = ". $yearBack ."\n";
while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
	//QDataGen::DisplayForEachTaskNext('Checking for Members who might have left');
	if($objPerson->MembershipStatusTypeId == MembershipStatusType::Member) {
		$stewardshipArray = $objPerson->GetStewardshipContributionArray();
		$isMember = false;
		foreach($stewardshipArray as $objStewardship) {
			//$temp = new StewardshipContribution();
			//$temp-> QDateTime
			if($objStewardship->DateEntered > $yearBack) {
				$isMember = true;
			}
			//print "Stewardship Date Entered = ". $objStewardship->DateEntered ."\n";
		}
		if(!$isMember) {
			if($objPerson->PublicLogin == null) {
				print $objPerson->FirstName . ' ' .$objPerson->LastName . ' might not be a member..';
				print("\n");
				$iTotal++;
			}
		}
	}
}
//DataGen::DisplayForEachTaskEnd('Checking for Members who might have left');
print "Total potential nonmembers discovered: ". $iTotal. "\n";

?>