<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));
	$strErrorFile = __ERROR_LOG__ . '/' . QApplication::PathInfo(0);


	if (file_exists($strErrorFile)) {
		$strContents = trim(file_get_contents($strErrorFile));
		if (substr($strContents, 0, 5) == '<html') {
			print $strContents;
		} else {
			header('Content-Type: text/plain');
			print $strContents;
		}
	} else if (QApplication::PathInfo(0))
		print('Error file does not exist');
?>