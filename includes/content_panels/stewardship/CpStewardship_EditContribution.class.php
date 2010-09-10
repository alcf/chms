<?php 
	class CpStewardship_EditContribution extends CpStewardship_Base {
		public $mctContribution;
		public $blnScanFlag = false;

		public $btnChangePerson;
		public $dlgChangePerson;

		public $lstStewardshipContributionType;
		public $txtCheckNumber;
		public $txtAuthorization;
		public $txtAlternateSource;

		public $lblTotalAmount;

		public $mctAmountArray;
		public $btnSaveAndScanAgain;

		public $pnlPersonError;
		public $pnlFundingError;

		/**
		 * This methods will save the currently selected funds to session, so that the next time
		 * this pops up, it will "remember" the last used funds
		 */
		public function SaveSelectedFundsToSession() {
			$strArray = array();
			foreach ($this->mctAmountArray as $mctAmount) {
				$lstFund = $mctAmount->StewardshipFundIdControl;
				if ($lstFund->SelectedValue) $strArray[] = $lstFund->SelectedValue;
			}

			$_SESSION['strSelectedFundArray'] = implode(',', $strArray);
		}

		/**
		 * This method will restore the "last used funds" and pre-select them for here
		 */
		public function LoadSelectedFundsFromSession() {
			if (array_key_exists('strSelectedFundArray', $_SESSION)) {
				$strArray = explode(',', $_SESSION['strSelectedFundArray']);
				foreach ($strArray as $intIndex => $intFundId) {
					$this->mctAmountArray[$intIndex]->StewardshipFundIdControl->SelectedValue = $intFundId;
					$this->lstFund_Change(null, $this->mctAmountArray[$intIndex]->StewardshipFundIdControl->ControlId, $intIndex);
				}
			}
		}

		protected function SetupPanel() {
			$blnScanFlag = false;

			// Creating New?
			if ($this->strUrlHashArgument == 'new') {
				$objContribution = new StewardshipContribution();
				$objContribution->StewardshipBatch = $this->objBatch;
				$objContribution->StewardshipStack = $this->objStack;
				$objContribution->DateEntered = QDateTime::Now();
				$objContribution->CreatedByLogin = QApplication::$Login;
				$objContribution->DateCredited = new QDateTime($this->objBatch->DateCredited);
				$objContribution->StewardshipContributionTypeId = StewardshipContributionType::Cash;

			// Editing an existing
			} else if ($this->strUrlHashArgument) {
				$objContribution = StewardshipContribution::Load($this->strUrlHashArgument);
				if ((!$objContribution) ||
					($objContribution->StewardshipStackId != $this->objStack->Id) ||
					($objContribution->StewardshipBatchId != $this->objBatch->Id)) {
					$this->ReturnTo('#' . $this->objStack->StackNumber);
				}

			// Scanning?
			} else if ($this->strUrlHashArgument2) {
				$objContribution = StewardshipContribution::CreateFromCheckImage(QApplication::$Login, $this->objStack, $this->strUrlHashArgument2);
				$this->blnScanFlag = true;

			// Error -- go back
			} else {
				$this->ReturnTo('#' . $this->objStack->StackNumber);
			}
			
			$this->mctContribution = new StewardshipContributionMetaControl($this, $objContribution);

			if (!$this->mctContribution->EditMode && !$blnScanFlag) {
				$this->lstStewardshipContributionType = $this->mctContribution->lstStewardshipContributionType_Create();
				$this->lstStewardshipContributionType->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstStewardshipContributionType_Change'));

				$this->txtAuthorization = $this->mctContribution->txtAuthorizationNumber_Create();
				$this->txtCheckNumber = $this->mctContribution->txtCheckNumber_Create();
				$this->txtAlternateSource = $this->mctContribution->txtAlternateSource_Create();

				$this->lstStewardshipContributionType_Change();
			} else {
				switch ($this->mctContribution->StewardshipContribution->StewardshipContributionTypeId) {
					case StewardshipContributionType::Check:
					case StewardshipContributionType::ReturnedCheck:
					case StewardshipContributionType::CorporateMatch:
					case StewardshipContributionType::CorporateMatchNonDeductible:
						$this->txtCheckNumber = $this->mctContribution->txtCheckNumber_Create();
						$this->txtCheckNumber->AddAction(new QEnterKeyEvent(), new QTerminateAction());
						$this->txtCheckNumber->Select();
						break;
	
					case StewardshipContributionType::CreditCard:
					case StewardshipContributionType::CreditCardRecurring:
						$this->txtAuthorization = $this->mctContribution->txtAuthorizationNumber_Create();
						$this->txtAuthorization->Select();
						break;
	
					case StewardshipContributionType::Cash:
					case StewardshipContributionType::StockDonation:
					case StewardshipContributionType::Automobile:
					case StewardshipContributionType::Other:
						$this->txtAlternateSource = $this->mctContribution->txtAlternateSource_Create();
						$this->txtAlternateSource->Select();
						break;
	
					default:
						throw new Exception('Unhandled Stewardship Contribution Type');
				}
			}

			// Setup Total Amount
			$this->lblTotalAmount = new QLabel($this);
			$this->lblTotalAmount->HtmlEntities = false;

			// Setup Error Panels
			$this->pnlFundingError = new QPanel($this);
			$this->pnlFundingError->Visible = false;
			$this->pnlFundingError->CssClass = 'errorMessage';
			$this->pnlPersonError = new QPanel($this);
			$this->pnlPersonError->Visible = false;
			$this->pnlPersonError->CssClass = 'errorMessage';

			// Setup AmountArray
			$this->mctAmountArray = array();
			$objAmountArray = $this->mctContribution->StewardshipContribution->GetStewardshipContributionAmountArray(QQ::OrderBy(QQN::StewardshipContributionAmount()->Id));
			for ($i = 0; $i < 5; $i++) {
				if (array_key_exists($i, $objAmountArray))
					$objAmount = $objAmountArray[$i];
				else {
					$objAmount = new StewardshipContributionAmount();
				}

				$mctAmount = new StewardshipContributionAmountMetaControl($this, $objAmount);
				$this->mctAmountArray[] = $mctAmount;

				if ($mctAmount->EditMode) {
					$lstFund = $mctAmount->lstStewardshipFund_Create();
				} else {
					$lstFund = $mctAmount->lstStewardshipFund_Create(null, QQ::Equal(QQN::StewardshipFund()->ActiveFlag, true));
				}

				$lstFund->Required = false;
				$lstFund->ActionParameter = $i;

				$txtAmount = $mctAmount->txtAmount_Create();
				$txtAmount->ActionParameter = $i;
				$txtAmount->Text = sprintf('%.2f', $txtAmount->Text, 2);

				$lstFund->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstFund_Change'));
				$this->lstFund_Change(null, null, $i);

				$txtAmount->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lblTotalAmount_Refresh'));
				$txtAmount->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'txtAmount_Enter'));
				$txtAmount->AddAction(new QEnterKeyEvent(), new QTerminateAction());
				$this->lblTotalAmount_Refresh(null, null, null);
			}

			// Setup ChangePerson Dialog stuff
			$this->dlgChangePerson = new StewardshipSelectPersonDialogBox($this, null, $objContribution, $this, 'dlgChangePerson_Select');
			
			$this->btnChangePerson = new QButton($this);
			$this->btnChangePerson->Text = 'Change';
			$this->btnChangePerson->CssClass = 'primary';

			$this->btnChangePerson->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnChangePerson_Click'));

			if ($this->blnScanFlag) {
				$this->ProcessNewCheck();
				$this->btnSaveAndScanAgain = new QButton($this);
				$this->btnSaveAndScanAgain->Text = 'Save and Scan Next Check';
				$this->btnSaveAndScanAgain->CssClass = 'primary';
				$this->btnSaveAndScanAgain->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			}

			if (!$this->mctContribution->EditMode) {
				$this->LoadSelectedFundsFromSession();
			} else {
				$this->btnSave->Text = 'Update';
			}
		}

		// Dependning on the status/state of the new check, we need to do different things
		public function ProcessNewCheck() {

			// We found one unique person -- woot!
			if ($this->mctContribution->StewardshipContribution->Person) {
				return;
			}

			// We found a bunch of people tied to this account
			if ($this->mctContribution->StewardshipContribution->PossiblePeopleArray) {
				$this->btnChangePerson_Click(null, null, null);
				return;
			}

			// We didn't find anyone, but do have a valid check MICR read
			if ($this->mctContribution->StewardshipContribution->UnsavedCheckingAccountLookup) {
				$this->btnChangePerson_Click(null, null, null);
				$this->dlgChangePerson->dtgPeople->NoDataHtml = '<div class="section sectionBatchInfo"><strong>No Linked Individuals</strong><br/><br/>' .
					'No records found that matched this checking account and transit information.<br/>' .
					'Use above fields to find the appropriate individual.</div>';			
				return;
			}

			// If we're here ,then it's clear We don't even have a good check read
			$this->btnChangePerson_Click(null, null, null);
			$this->dlgChangePerson->dtgPeople->NoDataHtml = '<div class="section sectionBatchInfo"><strong>MICR Read Error</strong><br/><br/>Check MICR was not scanned cleanly.<br/>' .
				'You may proceed, but note that the checking account and transit information will not be saved.</div>';	
			return;
		}

		public function lstFund_Change($strFormId, $strControlId, $strParameter) {
			$this->pnlFundingError->Visible = false;

			$mctAmount = $this->mctAmountArray[$strParameter];
			$lstFund = $mctAmount->StewardshipFundIdControl;
			$txtAmount = $mctAmount->AmountControl;
			if ($lstFund->SelectedValue) {
				$txtAmount->Enabled = true;
			} else {
				$txtAmount->Enabled = false;
				$txtAmount->Text = '0.00';
			}

			// Refresh the Totals (if via ajax call) and select the textbox
			if ($strFormId) {
				$this->lblTotalAmount_Refresh(null, null, null);
				$txtAmount->Select();
			}
		}


		public function txtAmount_Enter($strFormId, $strControlId, $strParameter) {
			$this->lblTotalAmount_Refresh($strFormId, $strControlId, $strParameter);
			if ($this->btnSaveAndScanAgain) $this->btnSave_Click($strFormId, $this->btnSaveAndScanAgain->ControlId, $strParameter);
			else $this->btnSave_Click($strFormId, $this->btnSave->ControlId, $strParameter);
		}

		public function lblTotalAmount_Refresh($strFormId, $strControlId, $strParameter) {
			$fltTotal = 0;
			foreach ($this->mctAmountArray as $mctAmount) {
				$fltTotal += floatval($mctAmount->AmountControl->Text);
			}
			$this->lblTotalAmount->Text = QApplication::DisplayCurrencyHtml($fltTotal);
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Validate
			if (!$this->mctContribution->StewardshipContribution->PersonId) {
				$this->pnlPersonError->Text = 'You must select a person';
				$this->pnlPersonError->Visible = true;
			}

			$blnFound = false;
			foreach ($this->mctAmountArray as $mctAmount) {
				$lstFund = $mctAmount->StewardshipFundIdControl;
				if ($lstFund->SelectedValue) $blnFound = true;
			}
			if (!$blnFound) {
				$this->pnlFundingError->Text = 'You must select at least one fund';
				$this->pnlFundingError->Visible = true;
			}

			if ($this->pnlFundingError->Visible || $this->pnlPersonError->Visible)
				return;

			if ($this->mctContribution->StewardshipContribution->UnsavedCheckingAccountLookup) {
				$this->mctContribution->StewardshipContribution->UnsavedCheckingAccountLookup->Save();
				$this->mctContribution->StewardshipContribution->CheckingAccountLookup = $this->mctContribution->StewardshipContribution->UnsavedCheckingAccountLookup;
			}
			$this->mctContribution->SaveStewardshipContribution();

			foreach ($this->mctAmountArray as $mctAmount) {
				$lstFund = $mctAmount->StewardshipFundIdControl;
				$txtAmount = $mctAmount->AmountControl;
				if ($lstFund->SelectedValue && (floatval($txtAmount->Text))) {
					$mctAmount->StewardshipContributionAmount->StewardshipContribution = $this->mctContribution->StewardshipContribution;
					$mctAmount->SaveStewardshipContributionAmount();
				} else if ($mctAmount->EditMode) {
					$mctAmount->DeleteStewardshipContributionAmount();
				}
			}

			$this->mctContribution->StewardshipContribution->RefreshTotalAmount();
			$this->mctContribution->StewardshipContribution->SetupCheckingAccountLookup();
			if ($this->mctContribution->StewardshipContribution->TempPath && is_file($this->mctContribution->StewardshipContribution->TempPath))
				$this->mctContribution->StewardshipContribution->SaveImageFile($this->mctContribution->StewardshipContribution->TempPath);

			$this->objStack->RefreshActualTotalAmount();
			$this->objBatch->RefreshActualTotalAmount();
			$this->objForm->pnlBatchTitle->Refresh();
			$this->objForm->dtgContributions_Refresh();
			$this->objForm->pnlStack_Refresh($this->objStack);

			$this->SaveSelectedFundsToSession();

			if ($this->btnSaveAndScanAgain && ($strControlId == $this->btnSaveAndScanAgain->ControlId)) {
				return $this->ReturnTo('#' . $this->objStack->StackNumber . '/view/scan');
			} else {
				return $this->ReturnTo('#' . $this->objStack->StackNumber . '/view_contribution/' . $this->mctContribution->StewardshipContribution->Id);
			}
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			return $this->ReturnTo('#' . $this->objStack->StackNumber . '/view_contribution/' . $this->mctContribution->StewardshipContribution->Id);
		}

		public function btnChangePerson_Click() {
			$this->pnlPersonError->Visible = false;
			$this->dlgChangePerson->ShowDialogBox();
		}

		public function dlgChangePerson_Select(Person $objPerson) {
			$blnRefresh = ($this->mctContribution->StewardshipContribution->PersonId != $objPerson->Id);
			if ($blnRefresh) {
				$this->mctContribution->StewardshipContribution->Person = $objPerson;
				$this->Refresh();
			}

			if ($this->txtCheckNumber && $this->txtCheckNumber->Visible) $this->txtCheckNumber->Select();
			if ($this->txtAuthorization && $this->txtAuthorization->Visible) $this->txtAuthorization->Select();
			if ($this->txtAlternateSource && $this->txtAlternateSource->Visible) $this->txtAlternateSource->Select();
		}

		public function lstStewardshipContributionType_Change() {
			$this->txtCheckNumber->Visible = false;
			$this->txtAuthorization->Visible = false;
			$this->txtAlternateSource->Visible = false;

			switch ($this->lstStewardshipContributionType->SelectedValue) {
					case StewardshipContributionType::Check:
					case StewardshipContributionType::ReturnedCheck:
					case StewardshipContributionType::CorporateMatch:
					case StewardshipContributionType::CorporateMatchNonDeductible:
						$this->txtCheckNumber->Visible = true;
						break;
	
					case StewardshipContributionType::CreditCard:
					case StewardshipContributionType::CreditCardRecurring:
						$this->txtAuthorization->Visible = true;
						break;
	
					case StewardshipContributionType::Cash:
					case StewardshipContributionType::StockDonation:
					case StewardshipContributionType::Automobile:
					case StewardshipContributionType::Other:
						$this->txtAlternateSource->Visible = true;
						break;
	
					default:
						throw new Exception('Unhandled Stewardship Contribution Type');
			}
		}
	}
?>