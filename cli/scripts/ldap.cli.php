<?php
	$objParameters = new QCliParameterProcessor('ldap', 'ALCF LDAP-to-ChMS Sync Script');
	$objParameters->AddDefaultParameter('username', QCliParameterType::String, 'Domain\\Username of the LDAP user that is authorized to download credentials');
	$objParameters->AddDefaultParameter('password', QCliParameterType::String, 'Password of the LDAP user that is authorized to download credentials');
	$objParameters->Run();

	$objLdap = new AlcfLdap(LDAP_PATH, $objParameters->GetDefaultValue('username'), $objParameters->GetDefaultValue('password'));

	print "Pulling data from LDAP... ";
	$objLdap->PullDataFromLdap();
	print "Done.\r\n";

	// Group Sync
	print "Syncing Groups... ";
	$objLdap->UpdateLocalGroups();
	print "Done.\r\n";
	
	// People Sync
	print "Syncing People... ";
	$objLdap->UpdateLocalPeople();
	print "Done.\r\n";

	// TODO: Delete Old Records

	// Disconnect
	$objLdap->Unbind();
?>