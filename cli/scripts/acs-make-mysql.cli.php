<?php
	$objParameters = new QCliParameterProcessor('acs-make-mysql', 'Make MySQL Create Script for ACS');

	// Package Name is always required
	$objParameters->AddDefaultParameter('output_path', QCliParameterType::String, 'the path of the script output');
	$objParameters->Run();

	function GetTableScript($objOdbc, $strTablePath, $strTableName, $strPrefix) {
		$objResult = odbc_exec($objOdbc, "SELECT * FROM " . $strTablePath . ";");
		$intNumFields = odbc_num_fields($objResult);

		$strSql = 'CREATE TABLE `' . strtolower($strTableName) . "` (\r\n";
		$strSql .= "    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,\r\n";
		for ($intFieldNumber = 1; $intFieldNumber <= $intNumFields; $intFieldNumber++) {
			$strType = odbc_field_type($objResult, $intFieldNumber);
			switch ($strType) {
				case 'LONGVARCHAR':
				case 'LONGVARBINARY':
					$strType = 'TEXT';
					break;
				case 'VARCHAR':
				case 'WORD':
					$strType = 'VARCHAR(255)';
					break;
				case 'LARGEINT':
				case 'SMALLINT':
				case 'AUTOINC':
					$strType = 'INT';
					break;

				case 'Long':
					$strType = 'INT';
					break;
				case 'AlphaNumeric':
					$strType = 'VARCHAR(255)';
					break;
				case 'Timestamp':
					$strType = 'DATETIME';
					break;
				case 'Logical':
					$strType = 'VARCHAR(255)';
					break;
				case 'Memo':
					$strType = 'TEXT';
					break;
				case 'Number':
					$strType = 'DECIMAL(9,2)';
					break;
			}
			
			if (odbc_field_name($objResult, $intFieldNumber) == 'Family_Number')
				$strType = 'INT';

			$strSql .= sprintf("    `%s%s` %s,\r\n",
				$strPrefix,
				strtolower(odbc_field_name($objResult, $intFieldNumber)),
				$strType);
		}

		$strSql .= "    PRIMARY KEY (pkid)\r\n);\r\n\r\n";
		return $strSql;
	}

	$objOdbc = odbc_connect(ACS_ODBC, null, null);
	$objDirectory = opendir(ACS_DATA_PATH);

	$strSql = null;
	while ($strFile = readdir($objDirectory)) {
		$strFile = strtolower($strFile);
		if (substr($strFile, strlen($strFile) - 7) == '.acsdat') {
			$strTableName = substr($strFile, 0, strlen($strFile) - 7);
			$strSql .= GetTableScript($objOdbc, $strTableName, $strTableName, null);
		}
	}

	if (trim(strtolower($objParameters->GetDefaultValue('output_path'))) == 'run') {
		$strConnectionArray = unserialize(DB_CONNECTION_2);
		$objMySql = new MySqli($strConnectionArray['server'], $strConnectionArray['username']);
		$objMySql->select_db('mysql');
		$objMySql->query('DROP DATABASE IF EXISTS `' . $strConnectionArray['database'] . '`;');
		$objMySql->query('CREATE DATABASE `' . $strConnectionArray['database'] . '`;');

		$objMySql->select_db($strConnectionArray['database']);
		foreach (explode(';', $strSql) as $strSqlStatement) {
			$objMySql->query(trim($strSqlStatement . ';'));
			if ($strError = $objMySql->error) print $strError . "\r\n";
		}
		$objMySql->close();
	} else {
		file_put_contents($objParameters->GetDefaultValue('output_path'), $strSql);
	}
?>