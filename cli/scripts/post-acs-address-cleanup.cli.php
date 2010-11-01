<?php
	ini_set('memory_limit','1024M');

	$objMySqli = new mysqli('localhost', 'root', '', 'alcf_address');
	QDataGen::DisplayForEachTaskStart('Cleaning Addresses', Address::CountAll());
	foreach (Address::LoadAll() as $objAddress) {
		QDataGen::DisplayForEachTaskNext('Cleaning Addresses');

		$strQuery = sprintf("SELECT id FROM address WHERE address_1 %s AND address_2 %s AND address_3 %s AND city %s AND state %s AND zip_code %s;",
			is_null($objAddress->Address1) ? 'IS NULL' : "='" . $objMySqli->escape_string($objAddress->Address1) . "'",
			is_null($objAddress->Address2) ? 'IS NULL' : "='" . $objMySqli->escape_string($objAddress->Address2) . "'",
			is_null($objAddress->Address3) ? 'IS NULL' : "='" . $objMySqli->escape_string($objAddress->Address3) . "'",
			is_null($objAddress->City    ) ? 'IS NULL' : "='" . $objMySqli->escape_string($objAddress->City    ) . "'",
			is_null($objAddress->State   ) ? 'IS NULL' : "='" . $objMySqli->escape_string($objAddress->State   ) . "'",
			is_null($objAddress->ZipCode ) ? 'IS NULL' : "='" . $objMySqli->escape_string($objAddress->ZipCode ) . "'"
		);

		$objResult = $objMySqli->Query($strQuery);

		if ($objRow = $objResult->fetch_array()) {
			$objResult = $objMySqli->Query('SELECT * FROM corrected_address WHERE address_id=' . $objRow['id']);
			$objRow = $objResult->fetch_array();
			if ($objRow['status_flag'] == 1) {
				$objAddress->Address1 = $objRow['address_1'];
				$objAddress->Address2 = $objRow['address_2'];
				$objAddress->City = $objRow['city'];
				$objAddress->State = $objRow['state'];
				$objAddress->ZipCode = $objRow['zip_code'];
				$objAddress->InvalidFlag = false;
				$objAddress->VerificationCheckedFlag = true;
			} else {
				$objAddress->InvalidFlag = true;
			}
			$objAddress->Save();
		} else {
			if (!$objAddress->ValidateUsps()) {
				print "NONE FOUND FOR - " . $objAddress->Id . "\r\n";
				$objAddress->InvalidFlag = true;
				$objAddress->Save();
			}
		}
	}
	QDataGen::DisplayForEachTaskEnd('Cleaning Addresses');
?>