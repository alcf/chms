<?php
	require(dirname(__FILE__) . '/../includes/prepend.inc.php');
	if (PublicLogin::CountAll() > 0) print 'System OK';
?>