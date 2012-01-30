<?php
	ini_set('memory_liimt', '1024M');

/*
	$strTableNameOverrideArray = array(
		'tblIndividual' => 'tblIndividual'
	);
*/

	// Uses FREETDS.conf to specify connection settings to ppager!!!
	// Ensure the connection in FREETDS sets text size to a large enough value (e.g. text size = 4194304)
	$objDb = mssql_connect('ppager', 'sa', 'sa');
	mssql_select_db('ParentPager', $objDb);

	// Local DB Connection Info
	$objMySqlDb = new mysqli('localhost', 'root', '', 'parent_pager');

	function PrepareForSql($strValue, $blnNullify) {
		if ($blnNullify) {
			if (!is_null($strValue))
				return "'" . str_replace("'", "\\'", $strValue) . "'";
			else
				return 'NULL';
		} else {
			return "'" . str_replace("'", "\\'", $strValue) . "'";
		}
	}

	// Ensure we are asking for either a MODEL script or to perform the DATA import
	if ($_SERVER['argc'] == 2) {
		switch (strtolower($_SERVER['argv'][1])) {
			case 'model':
				$blnModel = true;
				break;
			case 'data':
				$blnModel = false;
				break;
			default:
				exit('usage: php ppager.php [model|data]' . "\r\n");
		}
	} else {
		exit('usage: php ppager.php [model|data]' . "\r\n");
	}

	// Get the List of Tables
	$strTableArray = array();
	$objTableResult = mssql_query("SELECT * FROM information_schema.tables WHERE table_type='BASE TABLE';", $objDb);
	while ($objTableRow = mssql_fetch_array($objTableResult)) {
		$strTableArray[] = $objTableRow['TABLE_NAME'];
	}

	// Iterate thru each table
	foreach ($strTableArray as $strTableName) {
		if (isset($strTableNameOverrideArray) && !array_key_exists($strTableName, $strTableNameOverrideArray)) continue;

		// And get the columns
		$objResult = mssql_query("SELECT * FROM information_schema.columns WHERE table_name='" . $strTableName . "' ORDER BY ordinal_position;", $objDb);

		$strColumnDescriptionArray = array();
		$strColumnNameArray = array();
		$strBlobNameArray = array();
		$strDateNameArray = array();
		$strPkNameArray = array();

		// Determine PKs
		
		// The following officially-supported INFORMATION_SCHEMA method unfortunately does not differentiate between FK and PK
//		$objPkResult = mssql_query("SELECT * FROM information_schema.key_column_usage WHERE constraint_name like 'PK_%' AND table_name='" . $strTableName . "' ORDER BY ordinal_position;", $objDb);

		$objPkResult = mssql_query("
select s.name as TABLE_SCHEMA, t.name as TABLE_NAME
     , k.name as CONSTRAINT_NAME, k.type_desc as CONSTRAINT_TYPE
     , c.name as COLUMN_NAME, ic.key_ordinal AS ORDINAL_POSITION
  from sys.key_constraints as k
  join sys.tables as t
    on t.object_id = k.parent_object_id
  join sys.schemas as s
    on s.schema_id = t.schema_id
  join sys.index_columns as ic
    on ic.object_id = t.object_id
   and ic.index_id = k.unique_index_id
  join sys.columns as c
    on c.object_id = t.object_id
   and c.column_id = ic.column_id
 WHERE t.name='" . $strTableName . "' AND k.type_desc='PRIMARY_KEY_CONSTRAINT'
 order by ORDINAL_POSITION;", $objDb);
 
		while ($objPkRow = mssql_fetch_array($objPkResult)) {
			$strPkNameArray[$objPkRow['COLUMN_NAME']] = $objPkRow['COLUMN_NAME'];
		}

		// Setup Column Description
		while ($objRow = mssql_fetch_array($objResult)) {
			$strColumnName = $objRow['COLUMN_NAME'];
			$strColumnNameArray[] = $strColumnName;
			$strNull = ($objRow['IS_NULLABLE'] == 'YES') ? '' : ' NOT NULL';

			switch ($objRow['DATA_TYPE']) {
				case 'char':
				case 'varchar':
				case 'nvarchar':
					$strType = 'VARCHAR(' . $objRow['CHARACTER_MAXIMUM_LENGTH'] . ')';
					break;

				case 'bit':
					$strType = 'BOOLEAN';
					break;

				case 'int':
				case 'smallint':
				case 'tinyint':
					$strType = 'INTEGER';
					break;

				case 'smalldatetime':
				case 'datetime':
					$strType = 'DATETIME';
					$strDateNameArray[] = $strColumnName;
					break;

				case 'float':
					$strType = 'FLOAT';
					break;

				case 'image':
					$strType = 'MEDIUMBLOB';
					$strBlobNameArray[] = $strColumnName;
					break;

				case 'text':
					$strType = 'TEXT';
					break;

				default:
					exit('Invalid Column DataType: ' . $objRow['DATA_TYPE']);
			}

			$strColumnDescriptionArray[] = sprintf('%s %s%s', $strColumnName, $strType, $strNull);
		}

		// Output Structure
		if ($blnModel) {
			print 'CREATE TABLE ' . $strTableName . " (\r\n    ";
			print implode(",\r\n    ", $strColumnDescriptionArray);
			if (count($strPkNameArray)) print ",\r\n    PRIMARY KEY (" . implode(', ', $strPkNameArray) . ")";
			print "\r\n);\r\n\r\n";

		// Process Import
		} else {
			print 'Importing data from ' . $strTableName;

			$objMySqlDb->query('TRUNCATE ' . $strTableName . ';');
			$objResult = mssql_query("SELECT COUNT(*) AS row_count FROM dbo." . $strTableName . ";", $objDb);
			$objRow = mssql_fetch_array($objResult);
			$intRowCount = $objRow['row_count'];
			print ' (' . $intRowCount . ')... ';

			// Get Each Row, One at a Time by PK
			if (count($strPkNameArray)) {
				$objPkResult = mssql_query("SELECT " . implode(',', $strPkNameArray) . " FROM dbo." . $strTableName . ";", $objDb);

				// Iterate thru each Row
				$intCount = 0;
				while ($objPkRow = mssql_fetch_array($objPkResult)) {
					// Print Status Start
					print ($strStatus = '[' . $intCount . ']');

					// Get the raw values
					$strQuery = "SELECT * FROM dbo." . $strTableName . " WHERE ";
					foreach ($strPkNameArray as $strPkName) {
						$strQuery .= $strPkName . " = " . PrepareForSql($objPkRow[$strPkName], false) . " AND ";
					}
					$strQuery = substr($strQuery, 0, strlen($strQuery) - 5);
					$objRow = mssql_fetch_array(mssql_query($strQuery));

					// Clear Out Blobs
					$objBlobData = array();
					foreach ($strBlobNameArray as $strBlobName) {
						$objBlobData[$strBlobName] = $objRow[$strBlobName];
						$objRow[$strBlobName] = null;
					}

					// Perform Insert
					PerformInsert($objMySqlDb, $objRow, $strColumnNameArray, $strDateNameArray, $strTableName);

					// Perform Blob
					PerformBlobInsert($objMySqlDb, $objRow, $objBlobData, $strPkNameArray, $strTableName);

					// Print Status End
					print(str_repeat(chr(8), strlen($strStatus)));
					$intCount++;
				}

			// Do All Columns at Once (since there is no PK)
			} else {
				$objResult = mssql_query("SELECT * FROM dbo." . $strTableName . ";", $objDb);

				// Iterate thru each row
				$intCount = 0;
				while ($objRow = mssql_fetch_array($objResult)) {
					// Print Status Start
					print ($strStatus = '[' . $intCount . ']');

					// Perform Insert
					PerformInsert($objMySqlDb, $objRow, $strColumnNameArray, $strDateNameArray, $strTableName);

					// Print Status End
					print(str_repeat(chr(8), strlen($strStatus)));
					$intCount++;
				}
			}

			print "Done. [$intCount]\r\n";

			// Perform Import Check (Checks against Row Counts)
			if ($intRowCount != $intCount) {
				print '=====> ROW COUNT MISMATCH FOR ' . $strTableName . "\r\n";
			} else {
				$objResult = $objMySqlDb->query('SELECT COUNT(*) AS row_count FROM ' . $strTableName . ';');
				$objRow = $objResult->fetch_array();
				if ($objRow['row_count'] != $intRowCount) {
					print '=====> ROW COUNT MISMATCH FOR ' . $strTableName . "\r\n";
				} else {
					print '    Valid data from ' . $strTableName . ' (' . $objRow['row_count'] . ')' . "\r\n";
				}
			}
		}
	}

	function PerformInsert(mysqli $objMySqlDb, $objRow, $strColumnNameArray, $strDateNameArray, $strTableName) {
		// Setup Each Date Column
		foreach ($strDateNameArray as $strDateName) {
			if (strlen($objRow[$strDateName]))
				$objRow[$strDateName] = date('Y-m-d H:i:s', strtotime($objRow[$strDateName]));
			else
				$objRow[$strDateName] = null;
		}

		// Setup Each Column
		$strColumnArray = array();
		foreach ($strColumnNameArray as $strColumnName) {
			$strColumnArray[] = PrepareForSql($objRow[$strColumnName], true);
		}

		// Perform the Insert
		$strQuery = 'INSERT INTO ' . $strTableName . ' VALUES (' . implode(',', $strColumnArray) . ');';
		$objMySqlDb->query($strQuery);
		if ($objMySqlDb->error) {
			print "\r\nERROR: " . $objMySqlDb->error . "\r\n";
			print $strQuery . "\r\n";
			exit();
		}

//		file_put_contents (dirname(__FILE__) . '/parent_pager.log', $strQuery);
	}

	function PerformBlobInsert($objMySqlDb, $objRow, $objBlobData, $strPkNameArray, $strTableName) {
		foreach ($objBlobData as $strColumnName => $objBlob) {
			$strQuery = 'UPDATE ' . $strTableName . ' SET ' . $strColumnName . ' = ? WHERE ';
			foreach ($strPkNameArray as $strPkName) {
				$strQuery .= $strPkName . " = " . PrepareForSql($objRow[$strPkName], false) . " AND ";
			}
			$strQuery = substr($strQuery, 0, strlen($strQuery) - 5) . ';';

			$objStatement = $objMySqlDb->prepare($strQuery);
			if (!$objStatement) {
				print "\r\n" . $strQuery . "\r\n";
				exit('Unable to Prepare: ' . $objMySqlDb->error);
			}

			$objNull = null;
			$objStatement->bind_param('b', $objNull);
			$objStatement->send_long_data(0, $objBlob);

			if (!$objStatement->execute()) {
				print "\r\n" . $strQuery . "\r\n";
				exit('Unable to Execute: ' . $objMySqlDb->error);
			}
			$objStatement->close();
		}
	}
?>