<?php
$objParameters = new QCliParameterProcessor('zipcode-locater', 'Zipcode locater Script');
$objParameters->AddDefaultParameter('zipcode', QCliParameterType::String, 'Zipcode to search for');
$objParameters->Run();
$zipcode = $objParameters->GetDefaultValue('zipcode');

$objPersonCursor = Person::QueryCursor(QQ::All());
QDataGen::DisplayForEachTaskStart('Checking for Persons in  zipcode', Person::CountAll());
print("\n");
while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
	QDataGen::DisplayForEachTaskNext('Checking for Persons in  zipcode');
	if($objPerson->MembershipStatusTypeId == MembershipStatusType::Member) {
		$objAddressArray = $objPerson->GetAllAssociatedAddressArray();
		foreach($objAddressArray as $objAddress) {
			if(strstr($objAddress->ZipCode, $zipcode)!= false) {
				print($objPerson->FirstName." ".$objPerson->LastName.": ".$objAddress->Address1.
					", ".$objAddress->City.", ".$objAddress->ZipCode."\n");
			}
		}
	}
}
//$test = new Address();
//$test->City
QDataGen::DisplayForEachTaskEnd('Checking for Persons in  zipcode');

?>