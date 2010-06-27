<?php
	function ImportData($objOdbc, $objMySql, $strTableName) {
		global $objMySql;

		$objMySql->query("TRUNCATE `" . strtolower($strTableName) . '`;');
		$objResult = odbc_exec($objOdbc, "SELECT * FROM " . $strTableName . ";");

		print "Migrating " . odbc_num_rows($objResult) . " rows of data for " . $strTableName . "... [0]";
		$intCount = 0;

		while ($arrResult = odbc_fetch_array($objResult)) {
			print str_repeat(chr(8), strlen($intCount) + 1); $intCount++; print $intCount . ']';

			$strColumns = 'pkid';
			$strValues = 'NULL';
			foreach ($arrResult as $strKey=>$strValue) {
				$strColumns .= ', `' . strtolower($strKey) . '`';
				if (strlen($strValue))
					$strValues .= ", '" . $objMySql->escape_string($strValue) . "'";
				else
					$strValues .= ', NULL';
			}
			$strSql = sprintf('INSERT INTO `%s` (%s) VALUES (%s);',
				strtolower($strTableName), $strColumns, $strValues);

			$objMySql->query($strSql);
		}
		print " Done.\r\n";
	}

	$strConnectionArray = unserialize(DB_CONNECTION_2);
	$objOdbc = odbc_connect(ACS_ODBC, null, null);
	$objMySql = new MySqli($strConnectionArray['server'], $strConnectionArray['username']);
	$objMySql->select_db($strConnectionArray['database']);

	$objResult = $objMySql->query('SHOW TABLES;');
	$intRowCount = $objResult->num_rows;
	$intIndex = 1;
	while ($strArray = $objResult->fetch_array()) {
		printf('[%3s/%3s] ', $intIndex, $intRowCount);
		$strTableName = $strArray[0];
		ImportData($objOdbc, $objMySql, $strTableName);
		$intIndex++;
	}

	$objMySql->close();
?>