<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();
	
	class RecurringInfo extends ChmsForm {
		protected $strPageTitle = 'Recurring Payment Information';
		protected $chkAgreement;
		protected $txtPaymentName;
		protected $dtgDonationItems;
		protected $dtxStartDate;
		protected $calStartDate;
		protected $dtxEndDate;
		protected $calEndDate;
		protected $pnlPayment;
		protected $dtgPaymentHistory;
		protected $btnUpdatePaymentInfo;
		protected $btnAdd;
		protected $btnCancel;
		protected $btnBack;
		protected $lstPaymentPeriod;
		protected $isEdit;
		protected $objRecurringDonation;
		protected $objDonationItemArray;
		protected $lblTotal;
		
		protected function Form_Run() {
			if (QApplication::$PublicLogin && !QApplication::$PublicLogin->Person) QApplication::PublicLogout(false);
		}

		protected function Form_Create() {
			if(QApplication::PathInfo(0) == 'edit') {
				$this->isEdit = true;
				$this->objRecurringDonation = RecurringDonation::Load(QApplication::PathInfo(1));
			} else {
				$this->isEdit = false;
				$this->objRecurringDonation = null;
				
			}
			
			$this->chkAgreement = new QCheckBox($this);
			$this->chkAgreement->Text = 'I agree to allow recurring payments from my credit card';
			if($this->isEdit) {
				$this->chkAgreement->Checked = $this->objRecurringDonation->RecurringPayment->AuthorizeFlag;
			}
				
			$this->txtPaymentName = new QTextBox($this);
			$this->txtPaymentName->HtmlBefore = 'Recuring Payment Name: ';
			if($this->isEdit) {
				$this->txtPaymentName->Text = $this->objRecurringDonation->RecurringPayment->Name;
			}
			
			// Online Tithes and Offering = 28
			$this->objDonationItemArray = array();
			if($this->isEdit) {
				$objDonationItems = RecurringDonationItems::LoadArrayByRecurringDonationId(QApplication::PathInfo(1));
				foreach($objDonationItems as $objDonationItem) {
					$this->objDonationItemArray[] = $objDonationItem;
				}
				$objDonationItem = new RecurringDonationItems();
				$this->objDonationItemArray[] = $objDonationItem;
			} else {
				$objDonationItem = new RecurringDonationItems();
				$objDonationItem->StewardshipFundId = 28;
				$this->objDonationItemArray[] = $objDonationItem;
				$objDonationItem = new RecurringDonationItems();
				$this->objDonationItemArray[] = $objDonationItem;
			}
			$this->dtgDonationItems = new QDataGrid($this);
			$this->dtgDonationItems->AddColumn(new QDataGridColumn('Fund', '<?= $_FORM->RenderFund($_ITEM); ?>', 'HtmlEntities=false', 'Width=650px'));
			$this->dtgDonationItems->AddColumn(new QDataGridColumn('Amount', '<?= $_FORM->RenderAmount($_ITEM); ?>', 'HtmlEntities=false', 'Width=225px'));
			$this->dtgDonationItems->SetDataBinder('dtgDonationItems_Bind');
			
			// Total Label
			$this->lblTotal = new QLabel($this->dtgDonationItems);
			$this->lblTotal->FontBold = true;
			$this->lblTotal->Text = '$ 0.00';
			
			$this->lstPaymentPeriod = new QListBox($this);
			$this->lstPaymentPeriod->AddItem('- Select One -', null);
			$objPaymentPeriodArray = PaymentPeriod::LoadAll();
			foreach($objPaymentPeriodArray as $objPaymentPeriod) {
				if($this->isEdit) {
					$this->lstPaymentPeriod->AddItem($objPaymentPeriod->Name,$objPaymentPeriod->Id,$objPaymentPeriod->Id == $this->objRecurringDonation->RecurringPayment->PaymentPeriodId);
				} else {
					$this->lstPaymentPeriod->AddItem($objPaymentPeriod->Name,$objPaymentPeriod->Id,false);
				}
			}
			$this->dtxStartDate = new QDateTimeTextBox($this);
			$this->dtxStartDate->Name = "Start Date";
			if($this->isEdit) {
				$this->dtxStartDate->Text = ($this->objRecurringDonation->RecurringPayment->StartDate) ? $this->objRecurringDonation->RecurringPayment->StartDate->__toString() : null;
			}
			$this->calStartDate = new QCalendar($this, $this->dtxStartDate);
			$this->dtxStartDate->RemoveAllActions(QClickEvent::EventName);
			
			$this->dtxEndDate = new QDateTimeTextBox($this);
			$this->dtxEndDate->Name = "End Date";
			if($this->isEdit) {
				$this->dtxEndDate->Text = ($this->objRecurringDonation->RecurringPayment->EndDate) ? $this->objRecurringDonation->RecurringPayment->EndDate->__toString() : null;
			}		
			$this->calEndDate = new QCalendar($this, $this->dtxEndDate);
			$this->dtxEndDate->RemoveAllActions(QClickEvent::EventName);
			
			// Create the Payment Panel GJS- will eventually have to create a different payment panel class
			// Figure out which address to use
			if (QApplication::$PublicLogin) {
				$objAddress = QApplication::$PublicLogin->Person->DeducePrimaryAddress();
			} else {
				$objAddress = new Address();
			}
			$strFirstName = (QApplication::$PublicLogin) ? QApplication::$PublicLogin->Person->FirstName : null;
			$strLastName = (QApplication::$PublicLogin) ? QApplication::$PublicLogin->Person->LastName : null;
			if($this->isEdit) {
				$this->pnlPayment = new RecurringPaymentPanel($this, null, $objAddress, $strFirstName, $strLastName,$this->objRecurringDonation->RecurringPayment);
			} else {
				$this->pnlPayment = new RecurringPaymentPanel($this, null, $objAddress, $strFirstName, $strLastName,null);
			}
			
			
			$this->dtgPaymentHistory = new OnlineDonationDataGrid($this);
			$this->dtgPaymentHistory->Paginator = new QPaginator($this->dtgPaymentHistory);
			$this->dtgPaymentHistory->AddColumn(new QDataGridColumn('Date', '<?= $_FORM->RenderDate($_ITEM); ?>', 'HtmlEntities=false', 'Width=250px'));
			$this->dtgPaymentHistory->MetaAddColumn('Amount', 'Html=$<?=$_ITEM->Amount; ?>', 'HtmlEntities=false', 'Width=100px');
			$this->dtgPaymentHistory->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM); ?>', 'HtmlEntities=false', 'Width=200px'));
			$this->dtgPaymentHistory->SetDataBinder('dtgPaymentHistory_Bind');
			$this->dtgPaymentHistory->NoDataHtml = 'No Payment History.';
				
			$this->dtgPaymentHistory->SortColumnIndex = 1;
			$this->dtgPaymentHistory->ItemsPerPage = 20;
			
			$this->btnAdd = new QButton($this);
			if($this->isEdit) {
				$this->btnAdd->Name = 'Update Recurring Payment Information';
				$this->btnAdd->Text= 'Update Recurring Payment Information';
			} else {
				$this->btnAdd->Name = 'Add Recurring Payment Information';
				$this->btnAdd->Text= 'Add Recurring Payment Information';
			}
			$this->btnAdd->CssClass = 'primary';
			$this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAdd_Click'));
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Name = 'Return to Recurring Payments';
			$this->btnCancel->Text= 'Return to Recurring Payments';
			$this->btnCancel->CssClass = 'primary';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			
			$this->btnBack = new QButton($this);
			$this->btnBack->Name = 'Return To Give Online';
			$this->btnBack->Text = 'Return To Give Online';
			$this->btnBack->CssClass = 'primary';
			$this->btnBack->AddAction(new QClickEvent(), new QAjaxAction('btnBack_Click'));				
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
		
			// Add validation for credit card numbers
			if (($this->pnlPayment->lstCcType->SelectedName == 'Discover') &&
			substr($this->pnlPayment->txtCcNumber->Text,0,1) != '6'){
				$strMissingArray[] = 'The Account Number specified is not a valid Discover Card number';
			}
			if (($this->pnlPayment->lstCcType->SelectedName == 'Mastercard') &&
			substr($this->pnlPayment->txtCcNumber->Text,0,1) != '5'){
				$strMissingArray[] = 'The Account Number specified is not a valid Mastercard number';
			}
			if (($this->pnlPayment->lstCcType->SelectedName == 'Visa') &&
			substr($this->pnlPayment->txtCcNumber->Text,0,1) != '4'){
				$strMissingArray[] = 'The Account Number specified is not a valid Visa number';
			}
			foreach ($this->GetErrorControls() as $objControl) {
				if($objControl) {
					$objControl->Blink();
					if ($objControl->ValidationError) $strMissingArray[] = $objControl->ValidationError;
					else $strMissingArray[] = $objControl->Warning;
					if ($blnFirst) {
						$objControl->Focus();
						$blnFirst = false;
					}
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
		
		public function btnBack_Click() {
			QApplication::Redirect('/give/base.php');
		}
		public function btnCancel_Click() {
			QApplication::Redirect('/give/recurring.php');
		}
		
		public function btnAdd_Click() {
			//Save or create all necessary objects
			
			// Create RecurringDonation
			if(!$this->isEdit) {
				$this->objRecurringDonation = new RecurringDonation();
				$this->objRecurringDonation->PersonId = QApplication::$PublicLogin->Person->Id;
				$this->objRecurringDonation->ConfirmationEmail = QApplication::$PublicLogin->Person->PrimaryEmail->Address;
			}
			$this->objRecurringDonation->Amount = $this->GetAmount();
			$this->objRecurringDonation->Save();
			
			//Create RecurringPayment object - and associate with RecurringDonation.
			if(!$this->isEdit) {
				$objRecurringPayment = new RecurringPayments();
			} else {
				$objRecurringPayment = RecurringPayments::Load($this->objRecurringDonation->RecurringPaymentId);
			}
			
			QCryptography::$Key = CRYPTO_KEY;
			$objCrypto = new QCryptography(null, false);			
			$objRecurringPayment->Address1 = $objCrypto->Encrypt(trim($this->pnlPayment->txtAddress1->Text));
			$objRecurringPayment->Address2 = $objCrypto->Encrypt(trim($this->pnlPayment->txtAddress2->Text));
			$objRecurringPayment->City = $objCrypto->Encrypt(trim($this->pnlPayment->txtCity->Text));
			$objRecurringPayment->State = trim($this->pnlPayment->lstState->SelectedValue);
			$objRecurringPayment->Zip = $objCrypto->Encrypt(trim($this->pnlPayment->txtZipCode->Text));
			$objRecurringPayment->ExpirationDate = sprintf('%02d%02d', $this->pnlPayment->lstCcExpMonth->SelectedValue, substr($this->pnlPayment->lstCcExpYear->SelectedValue, 2)); //$objCrypto->Encrypt(sprintf('%02d%02d', $this->pnlPayment->lstCcExpMonth->SelectedValue, substr($this->pnlPayment->lstCcExpYear->SelectedValue, 2)));			
			$objRecurringPayment->SecurityCode = $objCrypto->Encrypt($this->pnlPayment->txtCcCsc->Text);
			$objRecurringPayment->CreditCardTypeId = $this->pnlPayment->lstCcType->SelectedValue;
			$objRecurringPayment->CardHolderName = $objCrypto->Encrypt(sprintf('%s %s',$this->pnlPayment->txtFirstName->Text, $this->pnlPayment->txtLastName->Text));
			$objRecurringPayment->AccountNumber = $objCrypto->Encrypt($this->pnlPayment->txtCcNumber->Text);

			$objRecurringPayment->AuthorizeFlag = $this->chkAgreement->Checked;
			$objRecurringPayment->StartDate = $this->dtxStartDate->DateTime;
			$objRecurringPayment->EndDate = $this->dtxEndDate->DateTime;
			$objRecurringPayment->Amount = $this->GetAmount();
			$objRecurringPayment->PaymentPeriodId = $this->lstPaymentPeriod->SelectedValue;
			$objRecurringPayment->Name = $this->txtPaymentName->Text;
			$intRecurringPaymentId = $objRecurringPayment->Save();
			
			if(!$this->isEdit) {
				$this->objRecurringDonation->RecurringPaymentId = $intRecurringPaymentId;
				$this->objRecurringDonation->Save();
			}
						

			// Create RecurringDonationItems - And associate with RecurringDonation
			foreach ($this->objDonationItemArray as $objDonationItem) {
				if ($objDonationItem->Amount) {
					$objOnlineDonationLineItem = clone($objDonationItem);
					$objOnlineDonationLineItem->RecurringDonationId = $this->objRecurringDonation->Id;
					$objOnlineDonationLineItem->DonationFlag = true;
					$objOnlineDonationLineItem->Save();
				}
			}
			QApplication::Redirect('/give/recurring.php');
		}
		
		public function dtgPaymentHistory_Bind() {
			if($this->objRecurringDonation) {
				$objOnlineDonationArray = OnlineDonation::LoadArrayByPersonId($this->objRecurringDonation->PersonId);
				$objConditions = QQ::All();
				$objClauses = array();
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Equal( QQN::OnlineDonation()->IsRecurringFlag, true));
				$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::OnlineDonation()->RecurringPaymentId, $this->objRecurringDonation->RecurringPaymentId));
				
				$this->dtgPaymentHistory->DataSource = OnlineDonation::QueryArray($objConditions);
			} else {
				$this->dtgPaymentHistory->DataSource = null;
			}
		}
		
		public function RenderDate(OnlineDonation $objDonation) {
			return $objDonation->CreditCardPayment->DateAuthorized->ToString();
		}
		public function RenderStatus(OnlineDonation $objDonation) {
			if($objDonation->Status == true)
				return 'Successful';
			else 
				return 'Failed';		
		}
		public function dtgRecurringDonation_Bind() {
			$this->dtgRecurringDonation->DataSource = RecurringDonation::LoadArrayByPersonId(QApplication::$PublicLogin->Person->Id);
		}
		
		public function RenderName(RecurringDonation $objDonation) {
			return sprintf('<a href="/give/recurringInfo.php/edit/%s">%s</a>', $objDonation->Id, QApplication::HtmlEntities($objDonation->RecurringPayment->Name));
		}
		public function RenderPaymentPeriod(RecurringDonation $objDonation) {
			return sprintf('%s',PaymentPeriod::Load($objDonation->RecurringPayment->PaymentPeriod->Name));			
		}
		public function RenderStartDate(RecurringDonation $objDonation) {
			return sprintf('%s',$objDonation->RecurringPayment->StartDate->__toString('MMMM D, YYYY'));
		}
		public function RenderEndDate(RecurringDonation $objDonation) {
			return sprintf('%s',$objDonation->RecurringPayment->EndDate->__toString('MMMM D, YYYY'));
		}

		public function RenderFund(RecurringDonationItems $objItem = null) {
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
		
		public function RenderAmount(RecurringDonationItems $objItem = null) {
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
				if($objItem != null){
					$txtAmount->Text = $objItem->Amount;
				} else {
					$txtAmount->Text = '0.00';
				}
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
					$objDonationItem->Amount = 0;
				}
			}
		
			return $fltTotal;
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
				$this->lblTotal_Refresh();
			}
		
			// Do we need to add another row?
			for ($intIndex = 0 ; $intIndex < count($this->objDonationItemArray) ; $intIndex++) {
				$lstFunds = $this->GetControl('lstFunds' . $intIndex);
				if (is_null($lstFunds->SelectedValue)) return;
			}
		
			// If we are here, then we need to add another row
			$this->objDonationItemArray[] = new RecurringDonationItems();
			$this->dtgDonationItems->Refresh();
		}
		
		public function dtgDonationItems_Bind() {
			$objDataSource = $this->objDonationItemArray;
			$objDataSource[] = null;
			$this->dtgDonationItems->DataSource = $objDataSource;
		}
		
	}

	RecurringInfo::Run('RecurringInfo');
?>
