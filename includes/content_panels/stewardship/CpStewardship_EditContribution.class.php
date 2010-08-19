<?php 
	class CpStewardship_EditContribution extends CpStewardship_Base {
		public $mctContribution;

		public $btnChangePerson;
		public $dlgChangePerson;

		public $txtChangePersonFirstName;
		public $txtChangePersonLastName;
		public $txtChangePersonAddress;
		public $txtChangePersonCity;
		public $txtChangePersonPhone;
		public $dtgChangePersonPeople;
		public $btnChangePersonCancel;

		public $txtCheckNumber;
		public $txtAuthorization;
		public $txtAlternateSource;

		public $lblTotalAmount;

		public $mctAmountArray;

		protected function SetupPanel() {
			$objContribution = StewardshipContribution::Load($this->strUrlHashArgument);
			if ((!$objContribution) ||
				($objContribution->StewardshipStackId != $this->objStack->Id) ||
				($objContribution->StewardshipBatchId != $this->objBatch->Id)) {
				$this->ReturnTo('#' . $this->objStack->StackNumber);
			}

			$this->btnChangePerson = new QButton($this);
			$this->btnChangePerson->Text = 'Change';
			$this->btnChangePerson->CssClass = 'primary';

			$this->dlgChangePerson = new QDialogBox($this);
			$this->dlgChangePerson->Template = dirname(__FILE__) . '/dlgChangePerson.tpl.php';
			$this->dlgChangePerson->HideDialogBox();
			$this->dlgChangePerson->MatteClickable = false;
			$this->dlgChangePerson->AddCssClass('stewardshipDialogbox');

			$this->btnChangePerson->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnChangePerson_Click'));
			
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



		/////////////////////////////////
		// Methods for Dialog Box
		/////////////////////////////////
		
		public function btnChangePerson_Click() {
			if (!$this->btnChangePersonCancel) {
				$this->btnChangePersonCancel = new QLinkButton($this->dlgChangePerson);
				$this->btnChangePersonCancel->Text = 'Cancel';
				$this->btnChangePersonCancel->CssClass = 'cancel';
				$this->btnChangePersonCancel->AddAction(new QClickEvent(), new QHideDialogBox($this->dlgChangePerson));
				$this->btnChangePersonCancel->AddAction(new QClickEvent(), new QTerminateAction());

				$this->dtgChangePersonPeople = new PersonDataGrid($this->dlgChangePerson);
				$this->dtgChangePersonPeople->Paginator = new QPaginator($this->dtgChangePersonPeople);
				$this->dtgChangePersonPeople->MetaAddColumn('FirstName','Html=<?=$_FORM->GetControl("' . $this->strControlId . '")->RenderFirstName($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px');
				$this->dtgChangePersonPeople->MetaAddColumn('LastName','Html=<?=$_FORM->GetControl("' . $this->strControlId . '")->RenderLastName($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px');
				$this->dtgChangePersonPeople->MetaAddColumn('PrimaryAddressText', 'Name=Address', 'Width=240px', 'FontSize=11px');
				$this->dtgChangePersonPeople->MetaAddColumn('PrimaryCityText', 'Name=City', 'Width=130px', 'FontSize=11px');
				$this->dtgChangePersonPeople->MetaAddColumn('PrimaryPhoneText', 'Name=Phone', 'Width=115px', 'FontSize=11px');
				$this->dtgChangePersonPeople->SetDataBinder('dtgChangePersonPeople_Bind', $this);

				$this->dtgChangePersonPeople->SortColumnIndex = 1;
				$this->dtgChangePersonPeople->ItemsPerPage = 20;

				$this->txtChangePersonFirstName = new QTextBox($this->dlgChangePerson);
				$this->txtChangePersonFirstName->Name = 'First Name';
				$this->txtChangePersonFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgChangePersonPeople_Refresh'));
				$this->txtChangePersonFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgChangePersonPeople_Refresh'));
				$this->txtChangePersonFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

				$this->txtChangePersonLastName = new QTextBox($this->dlgChangePerson);
				$this->txtChangePersonLastName->Name = 'Last Name';
				$this->txtChangePersonLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgChangePersonPeople_Refresh'));
				$this->txtChangePersonLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgChangePersonPeople_Refresh'));
				$this->txtChangePersonLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

				$this->txtChangePersonPhone = new QTextBox($this->dlgChangePerson);
				$this->txtChangePersonPhone->Name = 'Phone';
				$this->txtChangePersonPhone->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgChangePersonPeople_Refresh'));
				$this->txtChangePersonPhone->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgChangePersonPeople_Refresh'));
				$this->txtChangePersonPhone->AddAction(new QEnterKeyEvent(), new QTerminateAction());

				$this->txtChangePersonAddress = new QTextBox($this->dlgChangePerson);
				$this->txtChangePersonAddress->Name = 'Address';
				$this->txtChangePersonAddress->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgChangePersonPeople_Refresh'));
				$this->txtChangePersonAddress->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgChangePersonPeople_Refresh'));
				$this->txtChangePersonAddress->AddAction(new QEnterKeyEvent(), new QTerminateAction());

				$this->txtChangePersonCity = new QTextBox($this->dlgChangePerson);
				$this->txtChangePersonCity->Name = 'City';
				$this->txtChangePersonCity->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgChangePersonPeople_Refresh'));
				$this->txtChangePersonCity->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgChangePersonPeople_Refresh'));
				$this->txtChangePersonCity->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			}
			$this->dlgChangePerson->ShowDialogBox();
		}

		public function RenderFirstName(Person $objPerson) {
			if (!strlen(trim($objPerson->FirstName))) return '&nbsp;';
			return sprintf('<a href="%s">%s</a>', $objPerson->LinkUrl, QApplication::HtmlEntities($objPerson->FirstName));
		}
		
		public function RenderLastName(Person $objPerson) {
			if (!strlen(trim($objPerson->LastName))) return '&nbsp;';
			return sprintf('<a href="%s">%s</a>', $objPerson->LinkUrl, QApplication::HtmlEntities($objPerson->LastName));
		}

		public function dtgChangePersonPeople_Refresh() {
			$this->dtgChangePersonPeople->PageNumber = 1;
			$this->dtgChangePersonPeople->Refresh();
		}

		public function dtgChangePersonPeople_Bind() {
			$objConditions = QQ::All();

			if ($strName = trim($this->txtChangePersonFirstName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->FirstName, $strName . '%')
				);
			}

			if ($strName = trim($this->txtChangePersonLastName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->LastName, $strName . '%')
				);
			}

			if ($strName = trim($this->txtChangePersonCity->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->PrimaryCityText, $strName . '%')
				);
			}

			if ($strName = trim($this->txtChangePersonAddress->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->PrimaryAddressText, $strName . '%')
				);
			}

			if ($strName = trim($this->txtChangePersonPhone->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->PrimaryPhoneText->Phone, $strName . '%')
				);
			}

			$this->dtgChangePersonPeople->MetaDataBinder($objConditions);
		}
	}
?>