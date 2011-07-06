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
			
			$this->Transactions_Refresh();
			
			$this->pxyEditFundDonationLineItem = new QControlProxy($this);
			$this->pxyEditFundDonationLineItem->AddAction(new QClickEvent(), new QAjaxAction('pxyEditFundDonationLineItem_Click'));
			$this->pxyEditFundDonationLineItem->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->pxyEditFundSignupPayment = new QControlProxy($this);
			$this->pxyEditFundSignupPayment->AddAction(new QClickEvent(), new QAjaxAction('pxyEditFundSignupPayment_Click'));
			$this->pxyEditFundSignupPayment->AddAction(new QClickEvent(), new QTerminateAction());
		}
		
		protected function Transactions_Refresh() {
			// TODO: Replace with Indexed-Codegen version!
			$objCondition = QQ::AndCondition(
				QQ::Equal(QQN::CreditCardPayment()->UnlinkedFlag, false),
				QQ::Equal(QQN::CreditCardPayment()->PaypalBatchId, $this->objBatch->Id)
			);

			$this->objPaymentArray = CreditCardPayment::QueryArray($objCondition, QQ::OrderBy(QQN::CreditCardPayment()->DateCaptured));
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
					if (!array_key_exists($objPayment->SignupPayment->StewardshipFundId, $objDataSource)) {
						$objDataSource[$objPayment->SignupPayment->StewardshipFundId] = array(QApplication::HtmlEntities($objPayment->SignupPayment->StewardshipFund->Name), $objPayment->SignupPayment->StewardshipFund->AccountNumber, 0);
					}
					$objDataSource[$objPayment->SignupPayment->StewardshipFundId][2] += $objPayment->SignupPayment->Amount;
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
			// TODO: Replace with Indexed-Codegen version!
			$objCondition = QQ::AndCondition(
				QQ::Equal(QQN::CreditCardPayment()->UnlinkedFlag, true),
				QQ::Equal(QQN::CreditCardPayment()->PaypalBatchId, $this->objBatch->Id)
			);
			$this->dtgUnaccounted->MetaDataBinder($objCondition);
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>