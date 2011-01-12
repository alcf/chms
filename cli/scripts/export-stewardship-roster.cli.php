<?php
	$objParameters = new QCliParameterProcessor('export-stewardship-roster', 'ALCF Export Stewardship Roster to CSV');
	$objParameters->AddDefaultParameter('year', QCliParameterType::Integer, 'The year of giving data to use');
	$objParameters->Run();

	$intYear = $objParameters->GetDefaultValue('year');

	print $intYear . "\r\n";
?>