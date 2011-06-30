<?php
	class PaymentPanel extends QPanel {
		/**
		 * @var Address
		 */
		protected $objAddress;
		protected $strName;

		// Amounts
		protected $fltAmount;
		protected $fltDeposit;

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

		public $btnSubmit;
		public $dlgDialogBox;
		public $lblDialogBoxMessage;
		public $btnDialogBoxOkay;
		
		public $rblDeposit;

		public function __construct($objParentObject, $strControlId = null, Address $objAddress = null, $strFirstName = null, $strLastName = null) {
			parent::__construct($objParentObject, $strControlId);
			$this->strTemplate = dirname(__FILE__) . '/PaymentPanel.tpl.php';

			if (!$objAddress) $objAddress = new Address();

			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'Cardholder Name';
			$this->txtFirstName->Required = true;
			$this->txtFirstName->Text = $strFirstName;
			$this->txtFirstName->Width = '120px';

			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Required = true;
			$this->txtLastName->Text = $strLastName;
			$this->txtLastName->Width = '120px';

			$this->txtAddress1 = new QTextBox($this);
			$this->txtAddress1->Name = 'Address 1';
			$this->txtAddress1->Text = $objAddress->Address1;
			$this->txtAddress1->Required = true;

			$this->txtAddress2 = new QTextBox($this);
			$this->txtAddress2->Name = 'Address 2';
			$this->txtAddress2->Text = $objAddress->Address2;
			
			$this->txtCity = new QTextBox($this);
			$this->txtCity->Name = 'City, State and Zip';
			$this->txtCity->Text = $objAddress->City;
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
			$this->txtZipCode->Text = $objAddress->ZipCode;
			$this->txtZipCode->Width = '80px';
			$this->txtZipCode->Required = true;
			
			$this->lstCcType = new QListBox($this);
			$this->lstCcType->Name = 'Credit Card';
			$this->lstCcType->Required = true;
			$this->lstCcType->AddItem('- Select One -');
			foreach (CreditCardType::$NameArray as $intId => $strName)
				$this->lstCcType->AddItem($strName, $intId);

			$this->txtCcNumber = new QTextBox($this);
			$this->txtCcNumber->Name = 'Account Number';
			$this->txtCcNumber->Required = true;
			$this->txtCcNumber->MaxLength = 16;
			
			$this->lstCcExpMonth = new QListBox($this);
			$this->lstCcExpMonth->Name = 'Expiration Date';
			$this->lstCcExpMonth->Required = true;
			$this->lstCcExpMonth->AddItem('- Select One -');
			for ($intMonth = 1; $intMonth <= 12; $intMonth++) {
				$strMonth = date('F', mktime(0, 0, 0, $intMonth, 1, 2000));
				$this->lstCcExpMonth->AddItem(sprintf('%02s - %s', $intMonth, $strMonth), $intMonth);
			}
			
			$this->lstCcExpYear = new QListBox($this);
			$this->lstCcExpYear->Required = true;
			$this->lstCcExpYear->AddItem('---');
			for ($intYear = 0; $intYear <= 11; $intYear++) {
				$intYearToUse = date('Y') + $intYear; 
				$this->lstCcExpYear->AddItem($intYearToUse, $intYearToUse);
			}

			$this->txtCcCsc = new QTextBox($this);
			$this->txtCcCsc->Name = 'Security Code (CSC/CVV2)';
			$this->txtCcCsc->Required = true;
			$this->txtCcCsc->Width = '80px';
			$this->txtCcCsc->MinLength = 3;
			$this->txtCcCsc->MaxLength = 4;
			
			$this->dlgDialogBox = new QDialogBox($this);
			$this->dlgDialogBox->MatteClickable = false;
			$this->dlgDialogBox->Display = false;
			$this->dlgDialogBox->Template = dirname(__FILE__) . '/PaymentPanel_DialogBox.tpl.php';
			
			$this->btnDialogBoxOkay = new QButton($this->dlgDialogBox);
			$this->btnDialogBoxOkay->Text = 'Try Again';
			$this->btnDialogBoxOkay->CssClass = 'primary';
			$this->btnDialogBoxOkay->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDialogBoxOkay_Click'));
			$this->btnDialogBoxOkay->Visible = false;

			$this->lblDialogBoxMessage = new QLabel($this->dlgDialogBox);
			$this->lblDialogBoxMessage->HtmlEntities = false;
			$this->lblDialogBoxMessage->Text = '<h4>Please Wait...</h4>We are processing your credit card.  We appreciate your patience!<br/><br/><img src="/assets/images/cc_processing.gif"/>';

			$this->rblDeposit = new QRadioButtonList($this);
			$this->rblDeposit->Name = 'Payment Option';

			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->CausesValidation = true;
			$this->btnSubmit->CssClass = 'primary';
			$this->btnSubmit->Text = 'Submit';
			$this->btnSubmit->AddAction(new QClickEvent(), new QConfirmAction('By proceeding, your credit card will be charged for the amount shown.  Are you SURE you wish to proceed?'));
			$this->btnSubmit->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnSubmit));
			$this->btnSubmit->AddAction(new QClickEvent(), new QShowDialogBox($this->dlgDialogBox));
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSubmit_Click'));
			
			$this->UpdateAmountsTo(false, false);
		}

		public function UpdateAmountsTo($fltAmount, $fltDeposit) {
			if (($fltAmount !== $this->fltAmount) ||
				($fltDeposit !== $this->fltDeposit)) {
				$this->fltAmount = $fltAmount;
				$this->fltDeposit = $fltDeposit;

				$intCurrentIndex = $this->rblDeposit->SelectedValue;
				$this->rblDeposit->RemoveAllItems();
				if ($this->fltDeposit) {
					$this->rblDeposit->AddItem(sprintf('Pay in Full ($%.2f)', $this->fltAmount), 1, 1 == $intCurrentIndex);
					$this->rblDeposit->AddItem(sprintf('Pay Deposit ($%.2f)', $this->fltDeposit), 2, 2 == $intCurrentIndex);
					$this->rblDeposit->Visible = true;
					$this->rblDeposit->Required = true;
				} else {
					$this->rblDeposit->Visible = false;
					$this->rblDeposit->Required= false;
				}
			}
		}

		public function btnSubmit_Reset() {
			$this->btnSubmit->Enabled = true;
			$this->dlgDialogBox->HideDialogBox();
		}

		public function SetButtonText($strText) {
			$this->btnSubmit->Text = $strText;
		}

		public function SetAmounts($fltAmount, $fltDeposit) {
			$this->fltAmount = $fltAmount;
			$this->fltDeposit = $fltDeposit;
		}

		public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
			// Setup the Address Object
			$objAddress = new Address();
			$objAddress->Address1 = trim($this->txtAddress1->Text);
			$objAddress->Address2 = trim($this->txtAddress2->Text);
			$objAddress->City = trim($this->txtCity->Text);
			$objAddress->State = trim($this->lstState->SelectedValue);
			$objAddress->ZipCode = trim($this->txtZipCode->Text);

			// Calculate the Amount
			if ($this->rblDeposit->SelectedValue == 2)
				$fltAmountToCharge = $this->fltDeposit;
			else
				$fltAmountToCharge = $this->fltAmount;

			// Calculate the Expiration
			$strCcExpiration = sprintf('%02d%02d', $this->lstCcExpMonth->SelectedValue, substr($this->lstCcExpYear->SelectedValue, 2));

			// Get the Payment Object
			$objPaymentObject = $this->objForm->CreatePaymentObject();

			$mixReturn = CreditCardPayment::PerformAuthorization($objPaymentObject, $this->txtFirstName->Text, $this->txtLastName->Text, $objAddress,
				$fltAmountToCharge, $this->txtCcNumber->Text, $strCcExpiration, $this->txtCcCsc->Text, $this->lstCcType->SelectedValue);

			// TODO FOR TESTING
			if ($mixReturn instanceof CreditCardPayment) {
				// TODO: for testing
				$this->btnSubmit->Enabled = true;
				$this->dlgDialogBox->HideDialogBox();
			} else {
				// Failed!  Report Message
				if (!$mixReturn) $mixReturn = 'Cannot connect to payment gateway.';

				$this->btnDialogBoxOkay->Visible = true;
				$this->lblDialogBoxMessage->Text = '<h4>Credit Card Processing Failed</h4>' . $mixReturn . '<br/><br/>';
			}
		}

		public function btnDialogBoxOkay_Click() {
			$this->lblDialogBoxMessage->Text = '<h4>Please Wait...</h4>We are processing your credit card.  We appreciate your patience!<br/><br/><img src="/assets/images/cc_processing.gif"/>';
			$this->btnDialogBoxOkay->Visible = false;
			$this->dlgDialogBox->HideDialogBox();

			$this->btnSubmit->Enabled = true;
		}
	}
?>