<?php
	class RecurringPaymentPanel extends QPanel {
		/**
		 * @var Address
		 */
		protected $objAddress;
		protected $strName;

		// Form Fields
		public $txtFirstName;
		public $txtLastName;
		public $txtAddress1;
		public $txtAddress2;
		public $txtCity;
		public $lstState;
		public $txtZipCode;

		public $lstCcType;
		public $txtCcNumber;
		public $lstCcExpMonth;
		public $lstCcExpYear;
		public $txtCcCsc;

	//	public $btnSubmit;
	//	public $dlgDialogBox;
	//	public $lblDialogBoxMessage;
	//	public $btnDialogBoxOkay;

		public function __construct($objParentObject, $strControlId = null, Address $objAddress = null, $strFirstName = null, $strLastName = null, RecurringPayments $objRecurringPayment = null) {
			parent::__construct($objParentObject, $strControlId);
			$this->strTemplate = dirname(__FILE__) . '/RecurringPaymentPanel.tpl.php';

			if (!$objAddress) $objAddress = new Address();

			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'Cardholder Name';
			$this->txtFirstName->Required = true;
			$this->txtFirstName->Text = $strFirstName;
			$this->txtFirstName->Width = '120px';

			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Cardholder Last Name';
			$this->txtLastName->Required = true;
			$this->txtLastName->Text = $strLastName;
			$this->txtLastName->Width = '120px';

			QCryptography::$Key = CRYPTO_KEY;
			$objCrypto = new QCryptography(null, false);
			if($objRecurringPayment) {
				$strOriginal = $objCrypto->Decrypt($objRecurringPayment->CardHolderName);
				$nameArray  = explode(' ',$strOriginal);
				$this->txtFirstName->Text = $nameArray[0];
				$this->txtLastName->Text = $nameArray[1];
			}
			$this->txtAddress1 = new QTextBox($this);
			$this->txtAddress1->Name = 'Address 1';
			if(!$objRecurringPayment) {
				$this->txtAddress1->Text = $objAddress->Address1;
			} else {
				$this->txtAddress1->Text = $objCrypto->Decrypt($objRecurringPayment->Address1);
			}
			$this->txtAddress1->Required = true;

			$this->txtAddress2 = new QTextBox($this);
			$this->txtAddress2->Name = 'Address 2';
			if(!$objRecurringPayment) {
				$this->txtAddress2->Text = $objAddress->Address2;
			} else {
				$this->txtAddress2->Text = $objCrypto->Decrypt($objRecurringPayment->Address2);
			}
			$this->txtCity = new QTextBox($this);
			$this->txtCity->Name = 'City, State and Zip';
			if(!$objRecurringPayment) {
				$this->txtCity->Text = $objAddress->City;
			} else {
				$this->txtCity->Text = $objCrypto->Decrypt($objRecurringPayment->City);
			}
			$this->txtCity->Required = true;

			$this->lstState = new QListBox($this);
			$this->lstState->Name = QApplication::Translate('State');
			$this->lstState->AddItem(QApplication::Translate('- Select One -'), null);
			foreach (UsState::LoadAll(QQ::OrderBy(QQN::UsState()->Name)) as $objUsState) {
				$this->lstState->AddItem($objUsState->Name, $objUsState->Abbreviation, $objAddress->State == $objUsState->Abbreviation);
			}
			$this->lstState->Required = true;
			
			$this->txtZipCode = new QTextBox($this);
			$this->txtZipCode->Name = 'Zip Code';
			if(!$objRecurringPayment) {
				$this->txtZipCode->Text = $objAddress->ZipCode;
			} else {
				$this->txtZipCode->Text = $objCrypto->Decrypt($objRecurringPayment->Zip);
			}
			$this->txtZipCode->Width = '80px';
			$this->txtZipCode->Required = true;
			
			$this->lstCcType = new QListBox($this);
			$this->lstCcType->Name = 'Credit Card';
			$this->lstCcType->Required = true;
			$this->lstCcType->AddItem('- Select One -');
			foreach (CreditCardType::$NameArray as $intId => $strName) {
				if($objRecurringPayment) 
					$this->lstCcType->AddItem($strName, $intId, ($objRecurringPayment->CreditCardTypeId==$intId));
				else
					$this->lstCcType->AddItem($strName, $intId);
			}

			$this->txtCcNumber = new QTextBox($this);
			$this->txtCcNumber->Name = 'Account Number';
			$this->txtCcNumber->Required = true;
			$this->txtCcNumber->MaxLength = 16;
			if($objRecurringPayment) {
				$this->txtCcNumber->Text = $objCrypto->Decrypt($objRecurringPayment->AccountNumber);
				$objExpirationDate = $objRecurringPayment->ExpirationDate; //$objCrypto->Decrypt($objRecurringPayment->ExpirationDate);
				$intSelectedMonth = substr($objExpirationDate,0,2);
				$intSelectedYear = substr($objExpirationDate,2,2);
			} 
			
			$this->lstCcExpMonth = new QListBox($this);
			$this->lstCcExpMonth->Name = 'Expiration Date';
			$this->lstCcExpMonth->Required = true;
			$this->lstCcExpMonth->AddItem('- Select One -');
			for ($intMonth = 1; $intMonth <= 12; $intMonth++) {
				$strMonth = date('F', mktime(0, 0, 0, $intMonth, 1, 2000));
				if(!$objRecurringPayment)
					$this->lstCcExpMonth->AddItem(sprintf('%02s - %s', $intMonth, $strMonth), $intMonth);
				else 
					$this->lstCcExpMonth->AddItem(sprintf('%02s - %s', $intMonth, $strMonth), $intMonth,($intSelectedMonth==$intMonth));
			}
			
			$this->lstCcExpYear = new QListBox($this);
			$this->lstCcExpYear->Required = true;
			$this->lstCcExpYear->AddItem('---');
			for ($intYear = 0; $intYear <= 11; $intYear++) {
				$intYearToUse = date('Y') + $intYear;
				$intCmpYear = substr($intYearToUse,2,2); 
				if(!$objRecurringPayment)
					$this->lstCcExpYear->AddItem($intYearToUse, $intYearToUse);
				else
					$this->lstCcExpYear->AddItem($intYearToUse, $intYearToUse,($intSelectedYear == $intCmpYear));
			}
			$this->txtCcCsc = new QTextBox($this);
			$this->txtCcCsc->Name = 'Security Code (CSC/CVV2)';
			$this->txtCcCsc->Required = true;
			$this->txtCcCsc->Width = '80px';
			$this->txtCcCsc->MinLength = 3;
			$this->txtCcCsc->MaxLength = 4;
			if($objRecurringPayment) {
				$this->txtCcCsc->Text = $objCrypto->Decrypt($objRecurringPayment->SecurityCode);
			}
		}

	}
?>