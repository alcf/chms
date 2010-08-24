<?php 
	class CpStewardship_EditContribution extends CpStewardship_Base {
		public $mctContribution;

		public $btnChangePerson;
		public $dlgChangePerson;

		public $txtCheckNumber;
		public $txtAuthorization;
		public $txtAlternateSource;

		public $lblTotalAmount;

		public $mctAmountArray;

		protected function SetupPanel() {
			// Editing an existing
			if ($this->strUrlHashArgument) {
				$objContribution = StewardshipContribution::Load($this->strUrlHashArgument);
				if ((!$objContribution) ||
					($objContribution->StewardshipStackId != $this->objStack->Id) ||
					($objContribution->StewardshipBatchId != $this->objBatch->Id)) {
					$this->ReturnTo('#' . $this->objStack->StackNumber);
				}

			// Creating New?
			} else if ($this->strUrlHashArgument2) {
				$objContribution = StewardshipContribution::CreateFromCheckImage($this->strUrlHashArgument2);

			// Error -- go back
			} else {
				$this->ReturnTo('#' . $this->objStack->StackNumber);
			}
			
			$this->mctContribution = new StewardshipContributionMetaControl($this, $objContribution);

			switch ($this->mctContribution->StewardshipContribution->StewardshipContributionTypeId) {
				case StewardshipContributionType::Check:
				case StewardshipContributionType::ReturnedCheck:
					$this->txtCheckNumber = $this->mctContribution->txtCheckNumber_Create();
					break;

				case StewardshipContributionType::CreditCard:
				case StewardshipContributionType::CreditCardRecurring:
					$this->txtAuthorization = $this->mctContribution->txtAuthorizationNumber_Create();
					break;

				case StewardshipContributionType::Cash:
				case StewardshipContributionType::CorporateMatch:
				case StewardshipContributionType::CorporateMatchNonDeductible:
				case StewardshipContributionType::StockDonation:
				case StewardshipContributionType::Automobile:
				case StewardshipContributionType::Other:
					$this->txtAlternateSource = $this->mctContribution->txtAlternateSource_Create();
					break;

				default:
					throw new Exception('Unhandled Stewardship Contribution Type');
			}

			// Setup Total Amount
			$this->lblTotalAmount = new QLabel($this);
			$this->lblTotalAmount->HtmlEntities = false;

			// Setup AmountArray
			$this->mctAmountArray = array();
			$objAmountArray = $this->mctContribution->StewardshipContribution->GetStewardshipContributionAmountArray(QQ::OrderBy(QQN::StewardshipContributionAmount()->Id));
			for ($i = 0; $i < 5; $i++) {
				if (array_key_exists($i, $objAmountArray))
					$objAmount = $objAmountArray[$i];
				else {
					$objAmount = new StewardshipContributionAmount();
					$objAmount->StewardshipContribution = $this->mctContribution->StewardshipContribution;
				}

				$mctAmount = new StewardshipContributionAmountMetaControl($this, $objAmount);
				$this->mctAmountArray[] = $mctAmount;

				$lstFund = $mctAmount->lstStewardshipFund_Create();
				$lstFund->Required = false;
				$lstFund->ActionParameter = $i;

				$txtAmount = $mctAmount->txtAmount_Create();
				$txtAmount->ActionParameter = $i;
				$txtAmount->Text = sprintf('%.2f', $txtAmount->Text, 2);

				$lstFund->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstFund_Change'));
				$this->lstFund_Change(null, null, $i);

				$txtAmount->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lblTotalAmount_Refresh'));
				$txtAmount->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'lblTotalAmount_Refresh'));
				$txtAmount->AddAction(new QEnterKeyEvent(), new QTerminateAction());
				$this->lblTotalAmount_Refresh(null, null, null);
			}

			$this->mctAmountArray[0]->AmountControl->Select();
			
			// Setup ChangePerson Dialog stuff
			$this->dlgChangePerson = new StewardshipSelectPersonDialogBox($this, null, $objContribution, $this, 'dlgChangePerson_Select');
			
			$this->btnChangePerson = new QButton($this);
			$this->btnChangePerson->Text = 'Change';
			$this->btnChangePerson->CssClass = 'primary';

			$this->btnChangePerson->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnChangePerson_Click'));
		}

		public function lstFund_Change($strFormId, $strControlId, $strParameter) {
			$mctAmount = $this->mctAmountArray[$strParameter];
			$lstFund = $mctAmount->StewardshipFundIdControl;
			$txtAmount = $mctAmount->AmountControl;
			if ($lstFund->SelectedValue) {
				$txtAmount->Enabled = true;
			} else {
				$txtAmount->Enabled = false;
				$txtAmount->Text = '0.00';
			}

			// Refresh the Totals (if via ajax call)
			if ($strFormId) $this->lblTotalAmount_Refresh(null, null, null);
		}

		public function lblTotalAmount_Refresh($strFormId, $strControlId, $strParameter) {
			$fltTotal = 0;
			foreach ($this->mctAmountArray as $mctAmount) {
				$fltTotal += floatval($mctAmount->AmountControl->Text);
			}
			$this->lblTotalAmount->Text = QApplication::DisplayCurrencyHtml($fltTotal);
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->mctContribution->SaveStewardshipContribution();
			
			foreach ($this->mctAmountArray as $mctAmount) {
				$lstFund = $mctAmount->StewardshipFundIdControl;
				$txtAmount = $mctAmount->AmountControl;
				if ($lstFund->SelectedValue && (floatval($txtAmount->Text))) {
					$mctAmount->SaveStewardshipContributionAmount();
				} else if ($mctAmount->EditMode) {
					$mctAmount->DeleteStewardshipContributionAmount();
				}
			}

			$this->mctContribution->StewardshipContribution->RefreshTotalAmount();
			$this->objStack->RefreshActualTotalAmount();
			$this->objBatch->RefreshActualTotalAmount();
			$this->objForm->pnlBatchTitle->Refresh();
			$this->objForm->dtgContributions_Refresh();
			$this->objForm->pnlStack_Refresh($this->objStack);
			$this->ReturnTo('#' . $this->objStack->StackNumber . '/view_contribution/' . $this->mctContribution->StewardshipContribution->Id);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->ReturnTo('#' . $this->objStack->StackNumber . '/view_contribution/' . $this->mctContribution->StewardshipContribution->Id);
		}

		public function btnChangePerson_Click() {
			$this->dlgChangePerson->ShowDialogBox();
		}

		public function dlgChangePerson_Select(Person $objPerson) {
			$blnRefresh = ($this->mctContribution->StewardshipContribution->PersonId != $objPerson->Id);
			if ($blnRefresh) {
				$this->mctContribution->StewardshipContribution->Person = $objPerson;
				$this->Refresh();
			}
		}
	}
?>