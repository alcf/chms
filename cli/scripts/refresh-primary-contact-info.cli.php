<?php
	$objPersonCursor = Person::QueryCursor(QQ::All());
	QDataGen::DisplayForEachTaskStart('Refreshing Person data', Person::CountAll());
	while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
		QDataGen::DisplayForEachTaskNext('Refreshing Person data');
		$objPerson->RefreshPrimaryContactInfo(true);
	}
	QDataGen::DisplayForEachTaskEnd('Refreshing Person data');
?>