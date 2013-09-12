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
				$objPaymentObject->Save();
			
				// Failed!
			} else {
				// Report Message
				if (!$mixReturn) print "Cannot connect to payment gateway.\n";
				else {
					$objPaymentObject->Status = false;
					$objPaymentObject->Save();
					print sprintf("Credit Card Processing Failed: %s\n",$mixReturn);
				}
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

?>