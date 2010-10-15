#!/usr/local/bin/php
<?php
	define('MYSQL_SERVER', 'localhost');
	define('MYSQL_DATABASE', 'alcf_chms_log');
	define('MYSQL_USERNAME', 'root');
	define('MYSQL_PASSWORD', '');

	print 'Processing [' . MYSQL_DATABASE . ']... ';
	$objMySqli = new mysqli(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
	$objResult = $objMySqli->query('SHOW TABLES');

	while ($objRow = $objResult->fetch_array()) {
		$strTableName = $objRow[0];

		if (substr($strTableName, strlen($strTableName) - 5) != '_type') {
			print '[' . $strTableName . ']';

			$strColumnArray = array();
			$objColumnResult = $objMySqli->query('DESCRIBE `' . $strTableName . '`');
			while ($objColumnRow = $objColumnResult->fetch_array()) {
				$strColumnArray[$objColumnRow[0]] = true;
			}

			if (!array_key_exists('__sys_login_id', $strColumnArray))
				$objMySqli->query(sprintf('ALTER TABLE `%s` ADD COLUMN __sys_login_id INT UNSIGNED;', $strTableName));

			if (!array_key_exists('__sys_action', $strColumnArray))
				$objMySqli->query(sprintf("ALTER TABLE `%s` ADD COLUMN __sys_action ENUM('INSERT', 'UPDATE', 'DELETE');", $strTableName));

			if (!array_key_exists('__sys_date', $strColumnArray))
				$objMySqli->query(sprintf('ALTER TABLE `%s` ADD COLUMN __sys_date DATETIME;', $strTableName));

			print(str_repeat(chr(8) . ' ' . chr(8), strlen($strTableName) + 2));
		}
	}
	print "Done.\r\n";
?>