<?php
$objPersonCursor = Person::QueryCursor(QQ::All());
QDataGen::DisplayForEachTaskStart('Checking for Multiple First Names in Person', Person::CountAll());
print("\n");
while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
	QDataGen::DisplayForEachTaskNext('Checking for Multiple First Names in Person');
	$pos = strpos($objPerson->FirstName, " and ");
	if ($pos !== false) {
		print("Found Multiple First Name:  ".$objPerson->FirstName."\n");
	}
	$pos = strpos($objPerson->FirstName, "&");
	if ($pos !== false) {
		print("Found Multiple First Name:  ".$objPerson->FirstName."\n");
	}
}
QDataGen::DisplayForEachTaskEnd('Checking for Multiple First Names in Person');

?>