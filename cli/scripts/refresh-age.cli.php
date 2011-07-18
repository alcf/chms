<?php
	$objPersonCursor = Person::QueryCursor(QQ::All());
	QDataGen::DisplayForEachTaskStart('Refreshing Person data (age)', Person::CountAll());
	while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
		QDataGen::DisplayForEachTaskNext('Refreshing Person data (age)');
		$objPerson->RefreshAge(true);
	}
	QDataGen::DisplayForEachTaskEnd('Refreshing Person data (age)');
?>