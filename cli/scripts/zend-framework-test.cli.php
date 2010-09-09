<?php
	print "This tests to see if the Zend Framework was installed properly.\r\n";

	require('Zend/Version.php');
	if (Zend_Version::VERSION) {
		print "Your currently installed ZendFramework version is: " . Zend_Version::VERSION . "\r\n";
	}
?>