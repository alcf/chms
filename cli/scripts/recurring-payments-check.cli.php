<?php
QCryptography::$Key = CRYPTO_KEY;
$objCrypto = new QCryptography(null, false);

// iterate through all recurring payments within the time period.
$objRecurringPaymentCursor = RecurringPayments::QueryCursor(QQ::AndCondition(
	QQ::LessOrEqual(QQN::RecurringPayments()->StartDate, date('Y-m-d')), 
	QQ::GreaterOrEqual(QQN::RecurringPayments()->EndDate, date('Y-m-d')))
);
while ($objRecurringPayment = RecurringPayments::InstantiateCursor($objRecurringPaymentCursor)) {
	// display information..
	print sprintf("Payment of: %s within time period: %s - %s\n",$objRecurringPayment->Amount,$objRecurringPayment->StartDate,$objRecurringPayment->EndDate);
	print sprintf("name : %s\nAddress: %s %s\n City: %s\nState: %s\nZip: %s\n",
	$objCrypto->Decrypt($objRecurringPayment->CardHolderName),$objCrypto->Decrypt($objRecurringPayment->Address1),
	$objCrypto->Decrypt($objRecurringPayment->Address2), $objCrypto->Decrypt($objRecurringPayment->City), $objRecurringPayment->State,
	$objCrypto->Decrypt($objRecurringPayment->Zip));
	
	print sprintf("Account Number: %s\nExpiration Date: %s\nSecurity code: %s\n",
		$objCrypto->Decrypt($objRecurringPayment->AccountNumber), $objRecurringPayment->ExpirationDate, $objCrypto->Decrypt($objRecurringPayment->SecurityCode));
	print sprintf("CreditCard Type: %d\n",$objRecurringPayment->CreditCardTypeId);
	// identify if any are due today
	$startDate = $objRecurringPayment->StartDate;
	$timePeriod = 0;
	switch($objRecurringPayment->PaymentPeriod->Id) {
		case 1: // weekly
			$timePeriod =(7 * 24 * 60 * 60);
			break;
		case 2: // bi-weekly
			$timePeriod =(2 * 7 * 24 * 60 * 60);
			break;
		case 3: // monthly
			$timePeriod =(30 * 24 * 60 * 60);
			break;
		case 4: // quarterly
			$timePeriod =(4 * 30 * 24 * 60 * 60);
			break;
	}
	print sprintf("today is: %s\n",date('Y-m-d',time()));
	$checkTime = strtotime($startDate);
	while($checkTime < strtotime($objRecurringPayment->EndDate)) {
		if(date('Y-m-d',$checkTime) == date('Y-m-d',time())) {
			print "TODAYS THE DAY. MAKE A PAYMENT!\n";
			/**************/
			// Create the Payment Object
			$objPaymentObject = new OnlineDonation();
			$objAddressValidator = new AddressValidator(
			$objCrypto->Decrypt($objRecurringPayment->Address1),
			$objCrypto->Decrypt($objRecurringPayment->Address2),
			$objCrypto->Decrypt($objRecurringPayment->City), 
			$objRecurringPayment->State,
			$objCrypto->Decrypt($objRecurringPayment->Zip));
			$objAddressValidator->ValidateAddress();
			$objAddress = $objAddressValidator->CreateAddressRecord();
			
			$namearray = explode(' ', $objCrypto->Decrypt($objRecurringPayment->CardHolderName));
			$objPaymentObject->AttachPersonWithInformation($namearray[0], $namearray[1], $objAddress);
			$objPaymentObject->IsRecurringFlag = true;
			$objPaymentObject->RecurringPaymentId = $objRecurringPayment->Id;
			
			$mixReturn = CreditCardPayment::PerformAuthorization($objPaymentObject, null, $namearray[0], $namearray[1], $objAddress,
			$objRecurringPayment->Amount, $objCrypto->Decrypt($objRecurringPayment->AccountNumber), $objRecurringPayment->ExpirationDate, $objCrypto->Decrypt($objRecurringPayment->SecurityCode), $objRecurringPayment->CreditCardTypeId);
			
			// Success?
			if ($mixReturn instanceof CreditCardPayment) {
				print "Successful scheduling of payment.\n";
				$objPaymentObject->Status = true;
				$intDonationId = $objPaymentObject->Save();
				
				$strPaymentItems = '';
				$objDonationItems = RecurringDonationItems::LoadArrayByRecurringDonationId($objRecurringPayment->RecurringDonationAsRecurringPayment->Id);
				foreach($objDonationItems as $objDonationItem) {
					$objFund = StewardshipFund::LoadById($objDonationItem->StewardshipFundId);
					$strPaymentItems .= sprintf("%s - $%01.2f ,",$objFund->Name,$objDonationItem->Amount);
				}								
				sendSuccessEmail($objPaymentObject->Person->Id, $objPaymentObject->Id,
					$objCrypto->Decrypt($objRecurringPayment->CardHolderName),
					$objCrypto->Decrypt($objRecurringPayment->AccountNumber),
					$objRecurringPayment->CreditCardTypeId,
					$strPaymentItems,
					$objRecurringPayment->Amount);
				
				
				// Failed!
			} else {
				// Report Message
				if (!$mixReturn) {
					print "Cannot connect to payment gateway.\n";
					$status = null;
					$strPaymentItems = '';
				}
				else {
					$objPaymentObject->Status = false;
					$objPaymentObject->Save();
					$status = $mixReturn;
					print sprintf("Credit Card Processing Failed: %s\n",$mixReturn);	
					$strPaymentItems = '';
					$objDonationItems = RecurringDonationItems::LoadArrayByRecurringDonationId($objRecurringPayment->RecurringDonationAsRecurringPayment->Id);
					foreach($objDonationItems as $objDonationItem) {
						$objFund = StewardshipFund::LoadById($objDonationItem->StewardshipFundId);
						$strPaymentItems .= sprintf("%s - $%01.2f ,",$objFund->Name,$objDonationItem->Amount);
					}	
				}
				sendFailureEmail($objPaymentObject->Person->Id,$objPaymentObject->Id,
				$objCrypto->Decrypt($objRecurringPayment->CardHolderName),
				$objRecurringPayment->CreditCardTypeId,
				$objCrypto->Decrypt($objRecurringPayment->AccountNumber),
				$strPaymentItems,
				$objRecurringPayment->Amount, $status);
			}
			/********************/
		} else {
			print sprintf("Checked. And today was not : %s\n",date('Y-m-d',$checkTime));
		}
		$checkTime += $timePeriod;
	}
	print "\n";
	// create a payment entry for each one scheduled for today
}

function sendSuccessEmail($intPersonId,
					$intDonationId,
					$strCardholderName,
					$strAccountNumber,
					$intCreditCardTypeId,
					$strPaymentItems,
					$intAmount) {
	// Set debug mode
	//QEmailServer::$TestMode = true;
	//QEmailServer::$TestModeDirectory = __DOCROOT__ . '/../file_assets/emails';
	
	QEmailServer::$SmtpServer = SMTP_SERVER;
	
	$objPerson = Person::Load($intPersonId);
	$strEmail = $objPerson->GetEmailToUseForCommLists();
	$itemarray = explode(',',$strPaymentItems);
	
	// Create a new message
	// Note that you can list multiple addresses and that Qcodo supports Bcc and Cc
	$objMessage = new QEmailMessage();
	$objMessage->From = 'ALCF Support <alcf.support@alcf.net>';
	$objMessage->To = $strEmail;
	$objMessage->Bcc = 'ALCF Support <alcf.support@alcf.net>';
	$objMessage->Subject = 'Notification of Recurring Payment Success';
	
	// Setup Plaintext Message
	$strBody = '======= DO NOT REPLY =======\r\n';
	$strBody .= sprintf("Dear %s %s,\r\n\r\n",$objPerson->FirstName, $objPerson->LastName);
	$strBody .= 'r\n';
	$strBody .= sprintf("Thank you for your (Recurring)online donation to Abundant Life Christian Fellowship.  Your confirmation number is %d.  You may want to print this page for your records.\r\n\r\n",$intDonationId);
	$strBody .= sprintf("An online payment of $%01.2f has been charged on your %s credit card ending in: %s.  The following is a summary of your donation:\r\n",
		$intAmount,CreditCardType::ToString($intCreditCardTypeId), substr($strAccountNumber,strlen($strAccountNumber)-4));
	for ($i=0; $i< count($itemarray); $i++) {
		$strBody .= sprintf("%s\r\n",$itemarray[$i]);
	}
	$strBody .= "You can view your stewardship receipt online at anytime at https://my.alcf.net, however please note that it may take up to five (5) business days for this most recent transaction to show up on your receipt.\r\n";
	$strBody .= "If you have any questions, please don't hesitate to call Oom Vang at 650-561-8026 or email Oom.Vang@alcf.net.\r\n";
	$strBody .= "Thank you for your continued support of the ministry at Abundant Life Christian Fellowship!\r\n\r\n";
	$strBody .= "============================<br>";
	$strBody .= "P.S. This email was sent from an unmanaged email account.  Please do not reply, as any replies to this message will bounce back.";
	
	$objMessage->Body = $strBody;
	
	// Also setup HTML message (optional)
	$strBody = '======= DO NOT REPLY =======';
	$strBody .= sprintf("Dear %s %s,<br><br>",$objPerson->FirstName, $objPerson->LastName);
	$strBody .= sprintf("Thank you for your (Recurring) online donation to Abundant Life Christian Fellowship.  Your confirmation number is %d.  You may want to print this page for your records.<br><br>",$intDonationId);
	$strBody .= sprintf("An online payment of $%01.2f has been charged on your %s credit card ending in: %s.  The following is a summary of your donation:<br>",
	$intAmount,CreditCardType::ToString($intCreditCardTypeId),substr($strAccountNumber, strlen($strAccountNumber)-4));
	for ($i=0; $i< count($itemarray); $i++) {
		$strBody .= sprintf("%s<br>",$itemarray[$i]);
	}
	$strBody .= "You can view your stewardship receipt online at anytime at https://my.alcf.net, however please note that it may take up to five (5) business days for this most recent transaction to show up on your receipt.<br>";
	$strBody .= "If you have any questions, please don't hesitate to call Oom Vang at 650-561-8026 or email Oom.Vang@alcf.net.<br>";
	$strBody .= "Thank you for your continued support of the ministry at Abundant Life Christian Fellowship!<br><br>";
	$strBody .= "============================<br>";
	$strBody .= "P.S. This email was sent from an unmanaged email account.  Please do not reply, as any replies to this message will bounce back.";
	
	$objMessage->HtmlBody = $strBody;
	
	// Add random/custom email headers
	$objMessage->SetHeader('x-application', 'Recurring Online Donation');
	QEmailServer::Send($objMessage);
}

function sendFailureEmail($intPersonId,
$intDonationId,
$strCardholderName,
$intCreditCardTypeId,
$strAccountNumber,
$strPaymentItems,
$intAmount, 
$status) {
	// Set debug mode
	//QEmailServer::$TestMode = true;
	//QEmailServer::$TestModeDirectory = __DOCROOT__ . '/../file_assets/emails';

	QEmailServer::$SmtpServer = SMTP_SERVER;

	$objPerson = Person::Load($intPersonId);
	$strEmail = $objPerson->GetEmailToUseForCommLists();
	
	// Create a new message
	// Note that you can list multiple addresses and that Qcodo supports Bcc and Cc
	$objMessage->From = 'ALCF Support <alcf.support@alcf.net>';
	$objMessage->To = $strEmail;
	$objMessage->Bcc = 'ALCF Support <alcf.support@alcf.net>';
	$objMessage->Subject = 'Notification of Recurring Payment Failure';

	// Setup Plaintext Message
	$strBody = '======= DO NOT REPLY =======\r\n';
	$strBody .= sprintf("Dear %s %s,\r\n\r\n",$objPerson->FirstName, $objPerson->LastName);
	$strBody .= 'r\n';
	$strBody .= sprintf("Your (Recurring)online donation to Abundant Life Christian Fellowship.  Your transaction number is %d.  \r\n\r\n",$intDonationId);
	$strBody .= sprintf("An attempt to charge $%01.2f on your credit card %s x%s failed.  The following is a summary of the attempted donation:\r\n",
		$intAmount,CreditCardType::ToString($intCreditCardTypeId), substr($strAccountNumber,strlen($strAccountNumber)-4));
	for ($i=0; $i< count($itemarray); $i++) {
		$strBody .= sprintf("%s\r\n",$itemarray[$i]);
	}
	$strBody .= sprintf("The failure was due to: %s\r\n",$status);
	$strBody .= "Please review your credit card details online at https://my.alcf.net, and verify that the details are correct.\r\n";
	$strBody .= "If you have any questions, please don't hesitate to call Oom Vang at 650-561-8026 or email Oom.Vang@alcf.net.\r\n";
	$strBody .= "Thank you for your continued support of the ministry at Abundant Life Christian Fellowship!\r\n\r\n";
	$strBody .= "============================<br>";
	$strBody .= "P.S. This email was sent from an unmanaged email account.  Please do not reply, as any replies to this message will bounce back.";
	
	$objMessage->Body = $strBody;
	
	// Also setup HTML message (optional)
	$strBody = '======= DO NOT REPLY =======';
	$strBody .= sprintf("Dear %s %s,<br><br>",$objPerson->FirstName, $objPerson->LastName);
	$strBody .= sprintf("Your (Recurring)online donation to Abundant Life Christian Fellowship.  Your transaction number is %d.  <br><br>",$intDonationId);
	$strBody .= sprintf("An attempt to charge %01.2f on your credit card %s x%s failed.  The following is a summary of the attempted donation:<br>",
	$intAmount,substr($strAccountNumber,CreditCardType::ToString($intCreditCardTypeId), strlen($strAccountNumber)-4));
	for ($i=0; $i< count($itemarray); $i++) {
		$strBody .= sprintf("%s<br>",$itemarray[$i]);
	}
	$strBody .= sprintf("The failure was due to: %s<br>",$status);
	$strBody .= "Please review your credit card details online at https://my.alcf.net, and verify that the details are correct.<br>";
	$strBody .= "If you have any questions, please don't hesitate to call Oom Vang at 650-561-8026 or email Oom.Vang@alcf.net.<br>";
	$strBody .= "Thank you for your continued support of the ministry at Abundant Life Christian Fellowship!<br><br>";
	$strBody .= "============================<br>";
	$strBody .= "P.S. This email was sent from an unmanaged email account.  Please do not reply, as any replies to this message will bounce back.";
	
	$objMessage->HtmlBody = $strBody;
	
	// Add random/custom email headers
	$objMessage->SetHeader('x-application', 'Recurring Online Donation');
	QEmailServer::Send($objMessage);
}
?>