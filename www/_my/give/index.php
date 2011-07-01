<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	class PaymentSignupQForm extends ChmsForm {
		protected $strPageTitle = 'Give Online';

		protected $objDonationItemArray;
		protected $dtgDonationItems;
		protected $lblTotal;
		protected $lblMessage;

		/**
		 * @var PaymentPanel
		 */
		protected $pnlPayment;

		protected function Form_Create() {
			$this->objDonationItemArray = array();
			
			// Online Tithes and Offering = 28
			$objDonationItem = new OnlineDonationLineItem();
			$objDonationItem->StewardshipFundId = 28;
			$this->objDonationItemArray[] = $objDonationItem;
			$objDonationItem = new OnlineDonationLineItem();
			$this->objDonationItemArray[] = $objDonationItem;
			
			$this->dtgDonationItems = new QDataGrid($this);
			$this->dtgDonationItems->AddColumn(new QDataGridColumn('Fund', '<?= $_FORM->RenderFund($_ITEM); ?>', 'HtmlEntities=false', 'Width=650px'));
			$this->dtgDonationItems->AddColumn(new QDataGridColumn('Amount', '<?= $_FORM->RenderAmount($_ITEM); ?>', 'HtmlEntities=false', 'Width=225px'));
			$this->dtgDonationItems->SetDataBinder('dtgDonationItems_Bind');

			// Figure out which address to use
			$objAddress = QApplication::$PublicLogin->Person->DeducePrimaryAddress();

			// Any Messaging
			$this->lblMessage = new QPanel($this);
			$this->lblMessage->CssClass = 'section';
			$this->lblMessage->Visible = false;

			// Total Label
			$this->lblTotal = new QLabel($this->dtgDonationItems);
			$this->lblTotal->FontBold = true;
			$this->lblTotal->Text = '$ 0.00';

			// Create the Payment Panel
			$this->pnlPayment = new PaymentPanel($this, null, $objAddress, QApplication::$PublicLogin->Person->FirstName, QApplication::$PublicLogin->Person->LastName);
			$this->pnlPayment->SetButtonText('Submit Donation');
		}

		public function Form_Validate() {
			$blnToReturn = parent::Form_Validate();
			$blnFirst = true;

			if (!$this->GetAmount()) {
				$blnToReturn = false;
				$this->lblMessage->Text = 'You must enter in an amount.';
				$this->lblMessage->FontSize = '14px';
				$this->lblMessage->FontBold = true;
				$this->lblMessage->ForeColor = '#844';
				$this->lblMessage->Visible = true;
				$this->lblMessage->Blink();
				
				$this->pnlPayment->btnSubmit_Reset();
				$this->GetControl('txtAmount0')->Select();
				$blnFirst = false;
			} else {
				if ($this->lblMessage->Visible) $this->lblMessage->Visible = false;
			}
			
			foreach ($this->GetErrorControls() as $objControl) {
				$objControl->Blink();
				if ($blnFirst) {
					$this->pnlPayment->btnSubmit_Reset();
					$objControl->Focus();
					$blnFirst = false;
				}
			}

			return $blnToReturn;
		}
		
		public function RenderFund(OnlineDonationLineItem $objItem = null) {
			if (!$objItem) {
				return '<strong>TOTAL SUBMISSION</strong>';
			}

			$lstFunds = $this->GetControl('lstFunds' . $this->dtgDonationItems->CurrentRowIndex);
			if (!$lstFunds) {
				$lstFunds = new QListBox($this->dtgDonationItems, 'lstFunds' . $this->dtgDonationItems->CurrentRowIndex);
				$lstFunds->ActionParameter = $this->dtgDonationItems->CurrentRowIndex;
				$lstFunds->AddAction(new QChangeEvent(), new QAjaxAction('lstFunds_Change'));
				
				
				if (!$objItem->StewardshipFundId) $lstFunds->AddItem('- Select One -', null);
				foreach (StewardshipFund::LoadArrayByExternalFlag(true, QQ::OrderBy(QQN::StewardshipFund()->ExternalName)) as $objFund)
					$lstFunds->AddItem($objFund->ExternalName, $objFund->Id, $objFund->Id == $objItem->StewardshipFundId);
			}
			return $lstFunds->RenderWithError(false);
		}

		public function RenderAmount(OnlineDonationLineItem $objItem = null) {
			if (!$objItem) {
				return $this->lblTotal->Render(false);
			}

			$txtAmount = $this->GetControl('txtAmount' . $this->dtgDonationItems->CurrentRowIndex);
			$lstFunds = $this->GetControl('lstFunds' . $this->dtgDonationItems->CurrentRowIndex);
			if (!$txtAmount) {
				$txtAmount = new QFloatTextBox($this->dtgDonationItems, 'txtAmount' . $this->dtgDonationItems->CurrentRowIndex);
				$txtAmount->ActionParameter = $this->dtgDonationItems->CurrentRowIndex;
				$txtAmount->AddAction(new QChangeEvent(), new QAjaxAction('txtAmount_Change'));
				$txtAmount->Width = '100px';
				$txtAmount->Text = '0.00';
			}
			
			if ($lstFunds->SelectedValue) {
				if (!$txtAmount->Enabled) $txtAmount->Enabled = true;
			} else {
				$txtAmount->Enabled = false;
				$txtAmount->Text = '0.00';
			}
			return '$ ' . $txtAmount->RenderWithError(false);
		}

		public function txtAmount_Change($strFormId, $strControlId, $strParameter) {
			$txtAmount = $this->GetControl($strControlId);
			$lstFunds = $this->GetControl('lstFunds' . $strParameter);
			
			$txtAmount->Text = str_replace('$', '', $txtAmount->Text);
			$txtAmount->Text = str_replace('-', '', $txtAmount->Text);
			$txtAmount->Text = sprintf('%.2f', (float) $txtAmount->Text);
			$this->lblTotal_Refresh();
		}

		public function lblTotal_Refresh() {
			$this->lblTotal->Text = QApplication::DisplayCurrency($this->GetAmount(), ' ');
		}

		public function lstFunds_Change($strFormId, $strControlId, $strParameter) {
			$lstFunds = $this->GetControl($strControlId);
			$txtAmount = $this->GetControl('txtAmount' . $strParameter);
			if ($lstFunds->SelectedValue) {
				if (!$txtAmount->Enabled) $txtAmount->Enabled = true;
				$txtAmount->Select();
			} else {
				$txtAmount->Enabled = false;
				$txtAmount->Text = '0.00';
			}
			
			// Do we need to add another row?
			for ($intIndex = 0 ; $intIndex < count($this->objDonationItemArray) ; $intIndex++) {
				$lstFunds = $this->GetControl('lstFunds' . $intIndex);
				if (is_null($lstFunds->SelectedValue)) return;
			}

			// If we are here, then we need to add another row
			$this->objDonationItemArray[] = new OnlineDonationLineItem();
			$this->dtgDonationItems->Refresh();
		}

		public function dtgDonationItems_Bind() {
			$objDataSource = $this->objDonationItemArray;
			$objDataSource[] = null;
			$this->dtgDonationItems->DataSource = $objDataSource;
		}

		/////////////////////////
		// PaymentPanel CallBacks
		/////////////////////////

		/**
		 * Called back from PaymentPanel to actually generate a PaymentObject
		 * or in this case, a OnlineDonation entry.
		 * @return SignupPayment
		 */
		public function CreatePaymentObject() {
			// Create the PaymentObject
			$objPaymentObject = new OnlineDonation();
			$objPaymentObject->Person = QApplication::$PublicLogin->Person;
			
			return $objPaymentObject;
		}

		/**
		 * Called back from PaymentPanel to perform saves on any children objects
		 * from PaymentObject, or in this case, all the OnlineDonationLineItem objects.
		 */
		public function PaymentObjectSaveChildren(OnlineDonation $objPaymentObject) {
			foreach ($this->objDonationItemArray as $objDonationItem) {
				if ($objDonationItem->Amount) {
					$objOnlineDonationLineItem = clone($objDonationItem);
					$objOnlineDonationLineItem->OnlineDonation = $objPaymentObject;
					$objOnlineDonationLineItem->Save();
				}
			}
		}

		/**
		 * Called back from PaymentPanel to figure out how much is actually
		 * being charged.
		 * @return float
		 */
		public function GetAmount() {
			$fltTotal = null;
			for ($intIndex = 0; $intIndex < count($this->objDonationItemArray); $intIndex++) {
				$lstFunds = $this->GetControl('lstFunds' . $intIndex);
				$txtAmount = $this->GetControl('txtAmount' . $intIndex);
				$objDonationItem = $this->objDonationItemArray[$intIndex];
				
				$objDonationItem->StewardshipFundId = $lstFunds->SelectedValue;
				
				if ($objDonationItem->StewardshipFundId) {
					$objDonationItem->Amount = $txtAmount->Text;
					$fltTotal += $objDonationItem->Amount;
				} else {
					if ($txtAmount->Text != '0.00') $txtAmount->Text = '0.00';
					if ($txtAmount->Enabled) $txtAmount->Enabled = false;
				}
			}
			
			return $fltTotal;
		}

		/**
		 * Called back from PaymentPanel to perform final tasks after we know
		 * the payment has been submitted successfully.
		 */
		public function PaymentPanel_Success(OnlineDonation $objPaymentObject) {
			$objPaymentObject->SendConfirmationEmail();
			QApplication::Redirect($objPaymentObject->ConfirmationUrl);
		}
	}

	PaymentSignupQForm::Run('PaymentSignupQForm');
?>