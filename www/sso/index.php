<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	$strPayload = QApplication::PathInfo(0);

	try {
		QCryptography::$Key = file_get_contents(__INCLUDES__ . '/../sso_key.txt');
		$objCrypto = new QCryptography();
		$strPayload = $objCrypto->Decrypt($strPayload);
	} catch (Exception $objExc) {
		QApplication::Logout();
		QApplication::Redirect('/');
	}

	$strTokens = explode("_", $strPayload);
	if (count($strTokens) != 2) {
		QApplication::Logout();
		QApplication::Redirect('/');
	}

	$strUsername = $strTokens[0];
	$intTime = $strTokens[1];

	if (($intTime < (time() - 5)) ||
		($intTime > (time() + 5))) {
		QApplication::Logout();
		QApplication::Redirect('/');
	}	

	$objLogin = Login::LoadByUsername($strUsername);
	if (!$objLogin) {
		QApplication::Logout();
		QApplication::Redirect('/');
	}

	QApplication::Login($objLogin);
	QApplication::Redirect('/');
?>