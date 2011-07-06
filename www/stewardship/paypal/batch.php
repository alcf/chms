<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Pay Pal Reconciliation - Batch #';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $dtgTransactions;
		protected $dtgFunding;
		protected $dtgUnaccounted;
		
		/**
		 * @var PaypalBatch
		 */
		protected $objBatch;

		protected $objEditing;
		protected $pxyEditFundDonationLineItem;
		protected $pxyEditFundSignupPayment;

		protected $lblInstructionHtml;
		protected $btnPost;

		protected $dlgEditFund;
		protected $btnDialogSave;
		protected $btnDialogCancel;
		protected $lstDialogFund;
		
		protected function pxyEditFundDonationLineItem_Click($strFormid, $strControlId, $strParameter) {
			
		}

		protected function pxyEditFundSignupPayment_Click($strFormid, $strControlId, $strParameter) {
			
		}

		protected function dlgEditFund_Show() {
			
		}

		/**
		 * Stores the LINKED CC Paymente records for this batch
		 * @var CreditCardPayment[]
		 */
		protected $objPaymentArray;

		protected function Form_Create() {
			$this->objBatch = PaypalBatch::Load(QApplication::PathInfo(0));
			if (!$this->objBatch) QApplication::Redirect('/stewardship/paypal');
			$this->strPageTitle .= $this->objBatch->Number;

			$this->dtgTransactions = new QDataGrid($this);
			$this->dtgTransactions->SetDataBinder('dtgTransactions_Bind');
			$this->dtgTransactions->AddColumn(new QDataGridColumn('Date Captured', '<?= $_ITEM[0]; ?>', 'Width=150px', 'HtmlEntities=false', 'VerticalAlign=top'));
			$this->dtgTransactions->AddColumn(new QDataGridColumn('Total Amount Charged', '<?= $_ITEM[1]; ?>', 'Width=150px', 'VerticalAlign=top'));
			$this->dtgTransactions->AddColumn(new QDataGridColumn('Transaction Code', '<?= $_ITEM[2]; ?>', 'Width=120px', 'VerticalAlign=top'));
			$this->dtgTransactions->AddColumn(new QDataGridColumn('Account Funding', '<?= $_ITEM[3]; ?>', 'Width=330px', 'HtmlEntities=false', 'VerticalAlign=top', 'FontSize=10px'));
			$this->dtgTransactions->AddColumn(new QDataGridColumn('Funding Amount', '<?= $_ITEM[4]; ?>', 'Width=150px', 'HtmlEntities=false', 'VerticalAlign=top', 'FontSize=10px'));
			
			$this->dtgFunding = new QDataGrid($this);
			$this->dtgFunding->SetDataBinder('dtgFunding_Bind');
			$this->dtgFunding->AddColumn(new QDataGridColumn('Fund', '<?= $_ITEM[0]; ?>', 'Width=340px', 'HtmlEntities=false'));
			$this->dtgFunding->AddColumn(new QDataGridColumn('Account Number', '<?= $_ITEM[1]; ?>', 'Width=200px'));
			$this->dtgFunding->AddColumn(new QDataGridColumn('Amount', '<?= $_ITEM[2]; ?>', 'HtmlEntities=false', 'Width=380px', 'HtmlEntities=false'));
			
			$this->dtgUnaccounted = new CreditCardPaymentDataGrid($this);
			$this->dtgUnaccounted->MetaAddColumn('DateCaptured', 'Width=200px');
			$this->dtgUnaccounted->MetaAddColumn('AmountCharged', 'Html=<?= QApplication::DisplayCurrency($_ITEM->AmountCharged); ?>', 'Width=150px');
			$this->dtgUnaccounted->MetaAddColumn('TransactionCode', 'Width=500px');
			$this->dtgUnaccounted->SortColumnIndex = 0;
			$this->dtgUnaccounted->SetDataBinder('dtgUnaccounted_Bind');
			$this->dtgUnaccounted->NoDataHtml = 'Good!  There are no unaccounted-for credit card transaction entries in this PayPal batch.';
			
			$this->pxyEditFundDonationLineItem = new QControlProxy($this);
			$this->pxyEditFundDonationLineItem->AddAction(new QClickEvent(), new QAjaxAction('pxyEditFundDonationLineItem_Click'));
			$this->pxyEditFundDonationLineItem->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->pxyEditFundSignupPayment = new QControlProxy($this);
			$this->pxyEditFundSignupPayment->AddAction(new QClickEvent(), new QAjaxAction('pxyEditFundSignupPayment_Click'));
			$this->pxyEditFundSignupPayment->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->lblInstructionHtml = new QLabel($this);
			$this->lblInstructionHtml->TagName = 'p';
			$this->lblInstructionHtml->HtmlEntities = false;
			
			$this->btnPost = new QButton($this);
			$this->btnPost->Name = 'Post to NOAH';
			$this->btnPost->CssClass = 'primary';

			$this->dlgEditFund = new QDialogBox($this);
			$this->dlgEditFund->MatteClickable = false;
			$this->dlgEditFund->HideDialogBox();
			$this->dlgEditFund->Template = dirname(__FILE__) . '/dlgEditFund.tpl.php';

			$this->lstDialogFund = new QListBox($this->dlgEditFund);
			$this->lstDialogFund->Name = 'Stewardship Fund';
			$this->lstDialogFund->AddItem('- Select One -', null);
			$this->lstDialogFund->Required = true;
			foreach (StewardshipFund::LoadArrayByActiveFlag(true, QQ::OrderBy(QQN::StewardshipFund()->Name)) as $objFund)
				$this->lstDialogFund->AddItem($objFund->Name, $objFund->Id);

			$this->btnDialogSave = new QButton($this->dlgEditFund);
			$this->btnDialogSave->CssClass = 'primary';
			$this->btnDialogSave->Text = 'Update';
			$this->btnDialogSave->CausesValidation = $this->lstDialogFund;
			$this->btnDialogSave->AddAction(new QClickEvent(), new QAjaxAction('btnDialogSave_Click'));

			$this->btnDialogCancel = new QLinkButton($this->dlgEditFund);
			$this->btnDialogCancel->CssClass = 'cancel';
			$this->btnDialogCancel->Text = 'Cancel';
			$this->btnDialogCancel->AddAction(new QClickEvent(), new QAjaxAction('btnDialogCancel_Click'));
			$this->btnDialogCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->Transactions_Refresh();
		}
		
		protected function Transactions_Refresh() {
			// Cache the Payment Array for actual trackable payments
			$this->objPaymentArray = CreditCardPayment::LoadArrayByPaypalBatchIdUnlinkedFlag($this->objBatch->Id, false, 
				QQ::OrderBy(QQN::CreditCardPayment()->DateCaptured));
			
			if ($this->objBatch->ReconciledFlag) {
				$this->lblInstructionHtml->Text = sprintf('This PayPal Batch was posted to NOAH on <strong>%s</strong>.  No changes can be made to this PayPal Batch.<br/><br/>' . 
					'Click on any Credit Card Transaction with a Donation Record to view the linked Stewardship Entry for each line item.', $this->objBatch->DateReconciled->ToString('MMMM D YYYY'));
				$this->btnPost->Visible = false;
			} else if ($this->objBatch->IsUncategorizedPaymentsExist()) {
				$this->lblInstructionHtml->Text = 'There are currently unspecified funding accounts for one more more credit card payment line item.  Please ensure all items are accounted for before posting to NOAH.';
				$this->btnPost->Visible = false;
				
				if (CreditCardPayment::CountByPaypalBatchIdUnlinkedFlag($this->objBatch->Id, true)) {
					$this->lblInstructionHtml->Text .= '<br/><br/><strong>WARNING!</strong>  There are unaccountable Credit Card Payment records in this batch!';
				}
			} else {
				$this->lblInstructionHtml->Text = 'This PayPal Batch has not yet been posted to NOAH.  Click on <strong>Post to NOAH</strong> when you are sure that there are no more changes or additions left for this batch.';
				$this->btnPost->Visible = true;
				$this->btnPost->RemoveAllActions();

				if (CreditCardPayment::CountByPaypalBatchIdUnlinkedFlag($this->objBatch->Id, true)) {
					$this->lblInstructionHtml->Text .= '<br/><br/><strong>WARNING!</strong>  There are unaccountable Credit Card Payment records in this batch!';
					$this->btnPost->AddAction(new QClickEvent(), new QConfirmAction('NOTE!  There are unaccountable Credit Card Payment records in this batch!  You are about to PERMANENTLY post this batch to NOAH.  No changes can be made after this point.  Are you SURE you want to proceed?'));
					$this->btnPost->AddAction(new QClickEvent(), new QAjaxAction('btnPost_Click'));
				} else {
					$this->btnPost->AddAction(new QClickEvent(), new QConfirmAction('You are about to PERMANENTLY post this batch to NOAH.  No changes can be made after this point.  Are you SURE you want to proceed?'));
					$this->btnPost->AddAction(new QClickEvent(), new QAjaxAction('btnPost_Click'));
				}
			}
		}

		public function dtgTransactions_Bind() {
			$objDataSource = array();
			foreach ($this->objPaymentArray as $objPayment) {
				if ($objPayment->OnlineDonation) {
					$strLineItemNameArray = array();
					$strLineItemAmountArray = array();
					foreach ($objPayment->OnlineDonation->GetOnlineDonationLineItemArray() as $objLineItem) {
						$strLineItemAmountArray[] = QApplication::DisplayCurrency($objLineItem->Amount);
						
						if ($objLineItem->StewardshipFund)
							$strNameHtml = QApplication::HtmlEntities($objLineItem->StewardshipFund->Name);
						else {
							if (!strlen($strDescription = trim($objLineItem->Other))) $strDescription = '(not specified)';
							$strNameHtml = '<strong>OTHER</strong> - ' . QApplication::HtmlEntities($strDescription);
						}
						
						$strLineItemNameArray[] = '<a href="#" ' . $this->pxyEditFundDonationLineItem->RenderAsEvents($objLineItem->Id, false) . '>' . $strNameHtml . '</a>';
					}

					$objDataSource[] = array(
						$objPayment->DateCaptured->ToString('MMM D YYYY h:mm z'),
						QApplication::DisplayCurrency($objPayment->AmountCharged),
						$objPayment->TransactionCode,
						implode('<br/>', $strLineItemNameArray),
						implode('<br/>', $strLineItemAmountArray)
					);
				} else if ($objPayment->SignupPayment) {
					$strLineItemNameArray = array();
					$strLineItemAmountArray = array();

					// Display the Non-Donation amount (if applicable)
					if ($fltAmount = $objPayment->SignupPayment->AmountNonDonation) {
						$strNameHtml = QApplication::HtmlEntities($objPayment->SignupPayment->StewardshipFund->Name);
						$strLineItemNameArray[] = '<a href="#" ' . $this->pxyEditFundSignupPayment->RenderAsEvents($objPayment->SignupPayment->Id, false) . '>' . $strNameHtml . '</a> (Non-Donation)';
						$strLineItemAmountArray[] = QApplication::DisplayCurrency($fltAmount);
					}

					// Display the Donation amount (if applicable)
					if ($fltAmount = $objPayment->SignupPayment->AmountDonation) {
						$strNameHtml = QApplication::HtmlEntities($objPayment->SignupPayment->DonationStewardshipFund->Name);
						$strLineItemNameArray[] = '<a href="#" ' . $this->pxyEditFundSignupPayment->RenderAsEvents($objPayment->SignupPayment->Id, false) . '>' . $strNameHtml . '</a>';
						$strLineItemAmountArray[] = QApplication::DisplayCurrency($fltAmount);
					}

					$objDataSource[] = array(
						$objPayment->DateCaptured->ToString('MMM D YYYY h:mm z'),
						QApplication::DisplayCurrency($objPayment->AmountCharged),
						$objPayment->TransactionCode,
						implode('<br/>', $strLineItemNameArray),
						implode('<br/>', $strLineItemAmountArray)
					);

				} else throw new Exception('Cannot figure out linked record to this credit card payment entry: ' . $objPayment->Id);
			}
			
			$this->dtgTransactions->DataSource = $objDataSource;
		}
		
		public function dtgFunding_Bind() {
			$objDataSource = array();
			$fltTotal = null;
			foreach ($this->objPaymentArray as $objPayment) {
				if ($objPayment->OnlineDonation) {
					foreach ($objPayment->OnlineDonation->GetOnlineDonationLineItemArray() as $objLineItem) {
						if ($objLineItem->StewardshipFundId) {
							if (!array_key_exists($objLineItem->StewardshipFundId, $objDataSource)) {
								$objDataSource[$objLineItem->StewardshipFundId] = array(QApplication::HtmlEntities($objLineItem->StewardshipFund->Name), $objLineItem->StewardshipFund->AccountNumber, 0);
							}
							$objDataSource[$objLineItem->StewardshipFundId][2] += $objLineItem->Amount;
						} else {
							if (!array_key_exists(0, $objDataSource)) {
								$objDataSource[0] = array('<span style="color: #888;">(Not Yet Specified)</span>', '---', 0);
							}
							$objDataSource[0][2] += $objLineItem->Amount;
						}
					}
				} else if ($objPayment->SignupPayment) {
					if ($fltAmount = $objPayment->SignupPayment->AmountNonDonation) {
						if (!array_key_exists($objPayment->SignupPayment->StewardshipFundId, $objDataSource)) {
							$objDataSource[$objPayment->SignupPayment->StewardshipFundId] = array(QApplication::HtmlEntities($objPayment->SignupPayment->StewardshipFund->Name), $objPayment->SignupPayment->StewardshipFund->AccountNumber, 0);
						}
						$objDataSource[$objPayment->SignupPayment->StewardshipFundId][2] += $fltAmount;
					}
					if ($fltAmount = $objPayment->SignupPayment->AmountDonation) {
						if (!array_key_exists($objPayment->SignupPayment->DonationStewardshipFundId, $objDataSource)) {
							$objDataSource[$objPayment->SignupPayment->DonationStewardshipFundId] = array(QApplication::HtmlEntities($objPayment->SignupPayment->DonationStewardshipFund->Name), $objPayment->SignupPayment->DonationStewardshipFund->AccountNumber, 0);
						}
						$objDataSource[$objPayment->SignupPayment->DonationStewardshipFundId][2] += $fltAmount;
					}
				} else throw new Exception('Cannot figure out linked record to this credit card payment entry: ' . $objPayment->Id);
			}

			// Make sure the amount shown is displayed as currency for each row
			// Calculate the Total
			$fltTotal = 0;
			foreach ($objDataSource as $intId => $arrArray) {
				$fltTotal += $objDataSource[$intId][2];
				$objDataSource[$intId][2] = QApplication::DisplayCurrency($objDataSource[$intId][2]);
				if ($intId == 0) $objDataSource[$intId][2] = '<span style="color: #888;">' . $objDataSource[$intId][2] . '</span>';
			}

			$objDataSource[99999] = array('<strong>TOTAL AMOUNT</strong>', null, '<strong>' . QApplication::DisplayCurrency($fltTotal) . '</strong>');
			$this->dtgFunding->DataSource = $objDataSource;
		}
		
		public function dtgUnaccounted_Bind() {
			$objCondition = QQ::AndCondition(
				QQ::Equal(QQN::CreditCardPayment()->UnlinkedFlag, true),
				QQ::Equal(QQN::CreditCardPayment()->PaypalBatchId, $this->objBatch->Id)
			);
			$this->dtgUnaccounted->MetaDataBinder($objCondition);
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>