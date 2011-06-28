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
		public $txtName;
		public $txtAddress1;
		public $txtAddress2;
		public $txtCity;
		public $lstState;
		public $txtZipCode;

		public $btnSubmit;

		public function __construct($objParentObject, $strControlId = null, Address $objAddress = null, $strName = null) {
			parent::__construct($objParentObject, $strControlId);
			$this->strTemplate = dirname(__FILE__) . '/PaymentPanel.tpl.php';

			if (!$objAddress) $objAddress = new Address();

			$this->txtName = new QTextBox($this);
			$this->txtName->Name = 'Cardholder Name';
			$this->txtName->Required = true;
			$this->txtName->Text = $strName;

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
			
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->CausesValidation = true;
			$this->btnSubmit->CssClass = 'primary';
			$this->btnSubmit->Text = 'Submit';
			$this->btnSubmit->AddAction(new QClickEvent(), new QConfirmAction('By proceeding, your credit card will be charged for the amount shown.  Are you SURE you wish to proceed?'));
			$this->btnSubmit->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnSubmit));
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSubmit_Click'));
		}
		
		public function btnSubmit_Reset() {
			$this->btnSubmit->Enabled = true;
		}

		public function SetButtonText($strText) {
			$this->btnSubmit->Text = $strText;
		}

		public function SetAmounts($fltAmount, $fltDeposit) {
			$this->fltAmount = $fltAmount;
			$this->fltDeposit = $fltDeposit;
		}

		public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
			
		}
	}
?>