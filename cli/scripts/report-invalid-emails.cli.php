<?php
	$objEmailCursor = Email::QueryCursor(QQ::All());
	while ($objEmail = Email::InstantiateCursor($objEmailCursor)) {
		if (!QEmailServer::IsEmailValid($objEmail->Address)) {
			printf("%s - %s Id #%s\r\n", $objEmail->Address, $objEmail->Person->Name, $objEmail->PersonId); 
		}
	}
?>