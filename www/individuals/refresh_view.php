<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	QApplication::Redirect(Person::Load(QApplication::PathInfo(0))->LinkUrl);
?>