<?php
	$objParameters = new QCliParameterProcessor('get-data', 'ALCF Parent Pager sync script');
	$objParameters->AddDefaultParameter('connection', QCliParameterType::String, 'Connection Name (per freetds.conf file) containing the Parent Pager DB server information');
	$objParameters->AddDefaultParameter('username', QCliParameterType::String, 'Username of the MS SQL User that is authorized to access the Parent Pager DB');
	$objParameters->AddDefaultParameter('password', QCliParameterType::String, 'Password of the MS SQL User that is authorized to access the Parent Pager DB');
	$objParameters->AddDefaultParameter('dbname', QCliParameterType::String, 'Database Name within the MS SQL Server that is the Parent Pager DB');
	$objParameters->Run();

	// Get the Fields
	$strConnectionName = $objParameters->GetDefaultValue('connection');
	$strUsername = $objParameters->GetDefaultValue('username');
	$strPassword = $objParameters->GetDefaultValue('password');
	$strDbName = $objParameters->GetDefaultValue('dbname');

	// Shared Functions
	function GetRowCount($strTableName) {
		global $objMsSql;
		$objRow = mssql_fetch_assoc(mssql_query('SELECT COUNT(*) AS row_count FROM ' . $strTableName . ';', $objMsSql));
		return $objRow['row_count'];
	}

	function GetPkResultForTableColumn($strTableName, $strPkColumnName) {
		global $objMsSql;
		return mssql_query('SELECT ' . $strPkColumnName . ' FROM ' . $strTableName . ';', $objMsSql);
	}

	function GetRowForTableColumnRow($strTableName, $strPkColumnName, $objRow) {
		global $objMsSql;
		return mssql_fetch_assoc(mssql_query(
			sprintf('SELECT * FROM %s WHERE %s=%s;', $strTableName, $strPkColumnName, $objRow[$strPkColumnName]), 
			$objMsSql));
	}

	// Attempt to Connect

	// Uses FREETDS.conf to specify connection settings to ppager!!!
	// Oh and ensure the connection in FREETDS sets text size to a large enough value (e.g. text size = 4194304)
	$objMsSql = mssql_connect($strConnectionName, $strUsername, $strPassword);
	mssql_select_db($strDbName, $objMsSql);


	// One Table at a Time...


	////////////////////////////
	// ParentPager Household
	////////////////////////////
/*	$strTableName = 'tblHousehold';
	$strPkColumnName = 'lngHouseHoldID';
	$intRowCount = GetRowCount($strTableName);
	$intCurrentRow = 0;

	$objResult = GetPkResultForTableColumn($strTableName, $strPkColumnName);
	while ($objRow = mssql_fetch_assoc($objResult)) {
printf('[%5s/%5s]', $intCurrentRow++, $intRowCount); 
		$objRow = GetRowForTableColumnRow($strTableName, $strPkColumnName, $objRow);
print '  -  ID #' . $objRow[$strPkColumnName] . '  -  ' . $objRow['strHouseHold'] . "\r\n";
		ParentPagerHousehold::CreateOrUpdateForMsSqlRow($objRow);
	}

	///////////////////////////
	// ParentPager Individual
	////////////////////////////
	$strTableName = 'tblIndividual';
	$strPkColumnName = 'lngIndividualID';
	$intRowCount = GetRowCount($strTableName);
	$intCurrentRow = 0;

	$objResult = GetPkResultForTableColumn($strTableName, $strPkColumnName);
	while ($objRow = mssql_fetch_assoc($objResult)) {
printf('[%5s/%5s]', $intCurrentRow++, $intRowCount); 
		$objRow = GetRowForTableColumnRow($strTableName, $strPkColumnName, $objRow);
print '  -  ID #' . $objRow[$strPkColumnName] . '  -  ' . $objRow['strFirstName'] . ' ' . $objRow['strLastName'] . "\r\n";
		ParentPagerIndividual::CreateOrUpdateForMsSqlRow($objRow);
	}
*/

	///////////////////////////
	// ParentPager Address
	////////////////////////////
	$strTableName = 'tblAddress';
	$strPkColumnName = 'lngAddressID';
	$intRowCount = GetRowCount($strTableName);
	$intCurrentRow = 0;

	$objResult = GetPkResultForTableColumn($strTableName, $strPkColumnName);
	while ($objRow = mssql_fetch_assoc($objResult)) {
printf('[%5s/%5s]', $intCurrentRow++, $intRowCount); 
		$objRow = GetRowForTableColumnRow($strTableName, $strPkColumnName, $objRow);
print '  -  ID #' . $objRow[$strPkColumnName] . '  -  ' . $objRow['strAddress1'] . ' ' . $objRow['strCity'] . "\r\n";
		ParentPagerAddress::CreateOrUpdateForMsSqlRow($objRow);
	}
?>