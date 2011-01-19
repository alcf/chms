<?php
	function EscapeCsv($strString) {
		return '"' . str_replace('"', '""', $strString) . '"';
	}

	$objParameters = new QCliParameterProcessor('export-stewardship-roster', 'ALCF Export Stewardship Roster to CSV');
	$objParameters->AddDefaultParameter('year', QCliParameterType::Integer, 'The year of giving data to use');
	$objParameters->AddDefaultParameter('export_path', QCliParameterType::Path, 'The folder to export to');
	$objParameters->Run();

	$intYear = $objParameters->GetDefaultValue('year');
	$strFolder = $objParameters->GetDefaultValue('export_path');
	$fltMinimumAmount = 0;
	
	$objFile = fopen($strFolder . '/contributors.csv', 'w');
	fwrite($objFile, 'Salutation,MailingName,CompanyFacilityEtc,Address1,Address2,City,State,ZipCode' . "\r\n");

	$objHouseholdCursor = Household::QueryCursor(QQ::All(), QQ::OrderBy(QQN::Household()->Id));
	QDataGen::DisplayForEachTaskStart('Generating CSV Row(s) for Household', Household::CountAll());
	while ($objHousehold = Household::InstantiateCursor($objHouseholdCursor)) {
		QDataGen::DisplayForEachTaskNext('Generating CSV Row(s) for Household');

		// Generate for the whole household
		if ($objHousehold->CombinedStewardshipFlag) {
			if ($objAddress = $objHousehold->GetStewardshipAddress()) {
				$intPersonIdArray = StewardshipContribution::GetPersonIdArrayForPersonOrHousehold($objHousehold);
				$objContributionAmountArray = StewardshipContribution::GetContributionAmountArrayForPersonArray($intPersonIdArray, $intYear);
				$fltAmount = StewardshipContribution::GetContributionAmountTotalForContributionAmountArray($objContributionAmountArray);

				if ($fltAmount > $fltMinimumAmount) {
					$objSpouse = $objHousehold->SpousePerson;
					fwrite($objFile,
						EscapeCsv($objSpouse ? $objHousehold->HeadPerson->FirstName . ' and ' . $objSpouse->FirstName
											 : $objHousehold->HeadPerson->FirstName) . ',' .
						EscapeCsv($objHousehold->StewardshipHouseholdName) . ',' .
						EscapeCsv($objAddress->Address3) . ',' .
						EscapeCsv($objAddress->Address1) . ',' .
						EscapeCsv($objAddress->Address2) . ',' .
						EscapeCsv($objAddress->City) . ',' .
						EscapeCsv($objAddress->State) . ',' .
						EscapeCsv($objAddress->ZipCode) . "\r\n");
				}
			}

		// Generate for each individual in the household
		} else foreach ($objHousehold->GetHouseholdParticipationArray() as $objParticipation) {
			if ($objAddress = $objParticipation->Person->GetStewardshipAddress()) {
				$intPersonIdArray = array($objParticipation->Person->Id);
				$objContributionAmountArray = StewardshipContribution::GetContributionAmountArrayForPersonArray($intPersonIdArray, $intYear);
				$fltAmount = StewardshipContribution::GetContributionAmountTotalForContributionAmountArray($objContributionAmountArray);

				if ($fltAmount > $fltMinimumAmount) {
					$objPerson = $objParticipation->Person;
					fwrite($objFile,
						EscapeCsv($objPerson->FirstName) . ',' .
						EscapeCsv($objPerson->ActiveMailingLabel) . ',' .
						EscapeCsv($objAddress->Address3) . ',' .
						EscapeCsv($objAddress->Address1) . ',' .
						EscapeCsv($objAddress->Address2) . ',' .
						EscapeCsv($objAddress->City) . ',' .
						EscapeCsv($objAddress->State) . ',' .
						EscapeCsv($objAddress->ZipCode) . "\r\n");
				}
			}
		}
	}
	
	fclose($objFile);
	QDataGen::DisplayForEachTaskEnd('Generating CSV Row(s) for Household');
?>