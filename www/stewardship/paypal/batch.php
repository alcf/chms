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

			$this->dtgUnaccounted = new CreditCardPaymentDataGrid($this);
			$this->dtgUnaccounted->MetaAddColumn('DateCaptured', 'Width=200px');
			$this->dtgUnaccounted->MetaAddColumn('AmountCharged', 'Html=<?= QApplication::DisplayCurrency($_ITEM->AmountCharged); ?>', 'Width=150px');
			$this->dtgUnaccounted->MetaAddColumn('TransactionCode', 'Width=500px');
			$this->dtgUnaccounted->SortColumnIndex = 0;
			$this->dtgUnaccounted->SetDataBinder('dtgUnaccounted_Bind');
			$this->dtgUnaccounted->NoDataHtml = 'Good!  There are no unaccounted-for credit card transaction entries in this PayPal batch.';
			
			$this->Transactions_Refresh();
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
			$objDataSource = null;
			foreach ($this->objPaymentArray as $objPayment) {
				if ($objPayment->OnlineDonation) {
					$strLineItemNameArray = array();
					$strLineItemAmountArray = array();
					foreach ($objPayment->OnlineDonation->GetOnlineDonationLineItemArray() as $objLineItem) {
						$strLineItemAmountArray[] = QApplication::DisplayCurrency($objLineItem->Amount);
						if ($objLineItem->StewardshipFund)
							$strLineItemNameArray[] = QApplication::HtmlEntities($objLineItem->StewardshipFund->Name);
						else {
							if (!strlen($strDescription = trim($objLineItem->Other))) $strDescription = '(not specified)';
							$strLineItemNameArray[] = '<a href="#" onclick="return false;"><strong>OTHER</strong> - ' . QApplication::HtmlEntities($strDescription) . '</a>';
						}
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

					// Display the Donation amount (if applicable)
					if ($fltAmount = $objPayment->SignupPayment->AmountDonation) {
						$strLineItemNameArray[] = $objPayment->SignupPayment->StewardshipFund->Name;
						$strLineItemAmountArray[] = QApplication::DisplayCurrency($fltAmount);
					}

					// Display the Non-Donation amount (if applicable)
					if ($fltAmount = $objPayment->SignupPayment->AmountNonDonation) {
						$strLineItemNameArray[] = $objPayment->SignupPayment->StewardshipFund->Name . ' (Non-Donation)';
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