<?php
 $objPersonCursor = Person::QueryCursor(QQ::All());
 QDataGen::DisplayForEachTaskStart('Removing Duplicate Addresses from Person', Person::CountAll());
 while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
 	QDataGen::DisplayForEachTaskNext('Removing Duplicate Addresses from Person');
 	$objPerson->RemoveDuplicateAddresses();
 }
 QDataGen::DisplayForEachTaskEnd('Removing Duplicate Addresses from Person');
 
?>