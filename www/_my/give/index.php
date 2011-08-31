<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class PaymentSignupQForm extends ChmsForm {
		protected $strPageTitle = 'Give Online';

		protected $objDonationItemArray;
		protected $dtgDonationItems;
		protected $lblTotal;
		protected $lblMessage;
		
		protected $txtEmail;

		/**
		 * @var PaymentPanel
		 */
		protected $pnlPayment;

		protected function Form_Run() {
			if (QApplication::$PublicLogin && !QApplication::$PublicLogin->Person) QApplication::PublicLogout(false);
		}

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
			if (QApplication::$PublicLogin) {
				$objAddress = QApplication::$PublicLogin->Person->DeducePrimaryAddress();
			} else {
				$objAddress = new Address();
			}

			// Any Messaging
			$this->lblMessage = new QPanel($this);
			$this->lblMessage->CssClass = 'section';
			$this->lblMessage->Visible = false;

			// Total Label
			$this->lblTotal = new QLabel($this->dtgDonationItems);
			$this->lblTotal->FontBold = true;
			$this->lblTotal->Text = '$ 0.00';

			// Create the Email
			$this->txtEmail = new QEmailTextBox($this);
			$this->txtEmail->Name = 'Email Address';
			$this->txtEmail->Required = true;

			// Create the Payment Panel
			$strFirstName = (QApplication::$PublicLogin) ? QApplication::$PublicLogin->Person->FirstName : null;
			$strLastName = (QApplication::$PublicLogin) ? QApplication::$PublicLogin->Person->LastName : null;
			$this->pnlPayment = new PaymentPanel($this, null, $objAddress, $strFirstName, $strLastName);
			$this->pnlPayment->SetButtonText('Submit Donation');
		}

		public function Form_Validate() {
			$blnToReturn = parent::Form_Validate();
			$blnFirst = true;

			$strMissingArray = array();

			if (!$this->GetAmount()) {
				$strMissingArray[] = 'A Fund and/or Donation Amount is missing';
				$this->GetControl('txtAmount0')->Select();
				$blnFirst = false;
			}

			foreach ($this->GetErrorControls() as $objControl) {
				$objControl->Blink();
				if ($objControl->ValidationError) $strMissingArray[] = $objControl->ValidationError;
				else $strMissingArray[] = $objControl->Warning;
				if ($blnFirst) {
					$objControl->Focus();
					$blnFirst = false;
				}
			}
			
			if (count($strMissingArray)) {
				$blnToReturn = false;
				$this->lblMessage->Text = 'Please address the issues in the following fields:<ul>';
				foreach ($strMissingArray as $strMissing)
					$this->lblMessage->Text .= '<li>' . $strMissing . '</li>';
				$this->lblMessage->Text .= '</ul>';
				$this->lblMessage->FontSize = '14px';
				$this->lblMessage->FontBold = true;
				$this->lblMessage->ForeColor = '#844';
				$this->lblMessage->Visible = true;
				$this->lblMessage->Blink();

				$this->pnlPayment->btnSubmit_Reset();
				QApplication::ExecuteJavaScript('document.location="#give";');
				QApplication::ExecuteJavaScript('document.location="#";');
			} else {
				if ($this->lblMessage->Visible) $this->lblMessage->Visible = false;
			}

			return $blnToReturn;
		}
		
		public function RenderFund(OnlineDonationLineItem $objItem = null) {
			if (!$objItem) {
				return '<strong>TOTAL SUBMISSION</strong>';
			}

			$lstFunds = $this->GetControl('lstFunds' . $this->dtgDonationItems->CurrentRowIndex);
			$txtFund = $this->GetControl('txtFund' . $this->dtgDonationItems->CurrentRowIndex);

			if (!$lstFunds) {
				$lstFunds = new QListBox($this->dtgDonationItems, 'lstFunds' . $this->dtgDonationItems->CurrentRowIndex);
				$lstFunds->ActionParameter = $this->dtgDonationItems->CurrentRowIndex;
				$lstFunds->AddAction(new QChangeEvent(), new QAjaxAction('lstFunds_Change'));

				$txtFund = new QTextBox($this->dtgDonationItems, 'txtFund' . $this->dtgDonationItems->CurrentRowIndex);
				$txtFund->Visible = false;

				if (!$objItem->StewardshipFundId) $lstFunds->AddItem('- Select One -', null);
				foreach (StewardshipFund::LoadArrayByExternalFlag(true, QQ::OrderBy(QQN::StewardshipFund()->ExternalName)) as $objFund)
					$lstFunds->AddItem($objFund->ExternalName, $objFund->Id, $objFund->Id == $objItem->StewardshipFundId);
				$lstFunds->AddItem('- Other... -', false);
			}

			return $lstFunds->RenderWithError(false) . ' ' . $txtFund->RenderWithError(false);
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

			if (!is_null($lstFunds->SelectedValue)) {
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
			$txtAmount->Text = str_replace(',', '', $txtAmount->Text);
			$txtAmount->Text = str_replace('-', '', $txtAmount->Text);
			$txtAmount->Text = sprintf('%.2f', (float) $txtAmount->Text);
			$this->lblTotal_Refresh();
		}

		public function lblTotal_Refresh() {
			$this->lblTotal->Text = QApplication::DisplayCurrency($this->GetAmount(), ' ');
		}

		public function lstFunds_Change($strFormId, $strControlId, $strParameter) {
			$lstFunds = $this->GetControl($strControlId);
			$txtFund = $this->GetControl('txtFund' . $strParameter);
			$txtAmount = $this->GetControl('txtAmount' . $strParameter);
			
			// An Actual Fund was selected
			if ($lstFunds->SelectedValue) {
				if (!$txtAmount->Enabled) $txtAmount->Enabled = true;
				$txtAmount->Select();
				if ($txtFund->Visible) $txtFund->Visible = false;
				if ($txtFund->Required) $txtFund->Required = false;
				
			// An "Other..." Fund was selected
			} else if ($lstFunds->SelectedValue === false) {
				if (!$txtAmount->Enabled) $txtAmount->Enabled = true;
				if (!$txtFund->Visible) {
					$txtFund->Visible = true;
					$txtFund->Text = null;
					$txtFund->Required = true;
				}
				$txtFund->Select();

			// No fund was selected
			} else {
				$txtAmount->Enabled = false;
				$txtAmount->Text = '0.00';
				if ($txtFund->Visible) $txtFund->Visible = false;
				if ($txtFund->Required) $txtFund->Required = false;
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
		 * @return OnlineDonation
		 */
		public function CreatePaymentObject() {
			// Create the PaymentObject
			$objPaymentObject = new OnlineDonation();
			
			// Person we attach is either the Login Record
			if (QApplication::$PublicLogin)
				$objPaymentObject->Person = QApplication::$PublicLogin->Person;
				
			// Or needs to be deduced from all the fields in the PaymentPanel
			else {
				$objAddressValidator = new AddressValidator(
					$this->pnlPayment->txtAddress1->Text,
					$this->pnlPayment->txtAddress2->Text,
					$this->pnlPayment->txtCity->Text,
					$this->pnlPayment->lstState->SelectedValue,
					$this->pnlPayment->txtZipCode->Text);
				$objAddressValidator->ValidateAddress();
				$objAddress = $objAddressValidator->CreateAddressRecord();

				$objPaymentObject->AttachPersonWithInformation($this->pnlPayment->txtFirstName->Text, $this->pnlPayment->txtLastName->Text, $objAddress);
			}

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
					$objOnlineDonationLineItem->DonationFlag = true;
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
				$txtFund = $this->GetControl('txtFund' . $intIndex);
				$objDonationItem = $this->objDonationItemArray[$intIndex];

				if ($lstFunds->SelectedValue)
					$objDonationItem->StewardshipFundId = $lstFunds->SelectedValue;
				else
					$objDonationItem->StewardshipFundId = null;

				// Add in "Other" if applicable
				if ($lstFunds->SelectedValue === false)
					$objDonationItem->Other = trim($txtFund->Text);
				else
					$objDonationItem->Other = null;

				if ($objDonationItem->StewardshipFundId || ($lstFunds->SelectedValue === false)) {
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
			$strEmailAddress = trim(strtolower($this->txtEmail->Text));

			// If there is a "address in waiting" for this OnlineDonation
			// Then it was a newly-created Person object
			// Let's create the household for this person
			if ($objPaymentObject->Address) {
				$objPerson = $objPaymentObject->Person;
				$objHousehold = Household::CreateHousehold($objPerson);
				$objAddress = $objPaymentObject->Address;
				
				$objAddress->AddressTypeId = AddressType::Home;
				$objAddress->CurrentFlag = true;
				$objAddress->Household = $objHousehold;
				$objAddress->Save();

				$objHousehold->SetAsCurrentAddress($objAddress);
				
				// Add Email Address
				if ($strEmailAddress) {
					$objEmail = new Email();
					$objEmail->Address = $strEmailAddress;
					$objEmail->Person = $objPerson;
					$objEmail->Save();
					$objEmail->SetAsPrimary();
				}
			}

			if (QApplication::$PublicLogin) {
				$objPaymentObject->SendConfirmationEmail();
			} else if ($strEmailAddress) {
				$objPaymentObject->SendConfirmationEmail($strEmailAddress);
				$_SESSION['onlineDonationEmailAddress' . $objPaymentObject->Id] = $strEmailAddress;
			} else {
				$_SESSION['onlineDonationEmailAddress' . $objPaymentObject->Id] = null;
				unset($_SESSION['onlineDonationEmailAddress' . $objPaymentObject->Id]);
			}

			QApplication::Redirect($objPaymentObject->ConfirmationUrl);
		}

		/**
		 * Called back from PaymentPanel to perform cleanup tasks after we know
		 * the payment has failed.
		 */
		public function PaymentPanel_Failed(OnlineDonation $objPaymentObject) {
			// If there is a "address in waiting" for this OnlineDonation
			// Then it was a newly-created Person object
			// Let's delete it to make sure we clean up after ourselves
			if ($objPaymentObject->Address) {
				$objPaymentObject->Person->Delete();
			}
		}
	}

	PaymentSignupQForm::Run('PaymentSignupQForm');
?>