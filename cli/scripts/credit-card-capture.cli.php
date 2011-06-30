<?php
	$objCreditCardPaymentCursor = CreditCardPayment::QueryCursor(QQ::Equal(QQN::CreditCardPayment()->CreditCardStatusTypeId, CreditCardStatusType::Authorized));
	while ($objCreditCardPayment = CreditCardPayment::InstantiateCursor($objCreditCardPaymentCursor)) {
		$objCreditCardPayment->CaptureAuthorization();
	}
?>