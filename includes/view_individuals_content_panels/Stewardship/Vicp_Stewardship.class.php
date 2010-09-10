<?php
	class Vicp_Stewardship extends Vicp_Base {
		public $dtgStewardshipContributionAmount;
		public $chkCombined;
		public $lstYear;
		public $lstFund;

		public $pxyPrint;
		
		protected function SetupPanel() {
			$this->dtgStewardshipContributionAmount = new StewardshipContributionAmountDataGrid($this);
			$this->dtgStewardshipContributionAmount->MetaAddColumn(QQN::StewardshipContributionAmount()->StewardshipContribution->DateCredited, 'Html=<?= $_CONTROL->ParentControl->RenderDate($_ITEM); ?>', 'Name=Date', 'Width=100px', 'HtmlEntities=false');
			$this->dtgStewardshipContributionAmount->MetaAddColumn(QQN::StewardshipContributionAmount()->StewardshipContribution->Person->LastName, 'Html=<?= $_CONTROL->ParentControl->RenderPerson($_ITEM); ?>', 'Name=Person', 'Width=180px');
			$this->dtgStewardshipContributionAmount->MetaAddColumn(QQN::StewardshipContributionAmount()->StewardshipFund->Name, 'Name=Fund', 'Width=180px');
			$this->dtgStewardshipContributionAmount->MetaAddColumn(QQN::StewardshipContributionAmount()->StewardshipContribution->StewardshipContributionTypeId, 'Html=<?= $_CONTROL->ParentControl->RenderTransaction($_ITEM); ?>', 'Name=Transaction', 'Width=170px');
			$this->dtgStewardshipContributionAmount->MetaAddColumn(QQN::StewardshipContributionAmount()->Amount, 'Html=<?= $_CONTROL->ParentControl->RenderAmount($_ITEM); ?>', 'HtmlEntities=false', 'FontNames=Lucida Console,Courier New,Courier,monospaced', 'Width=90px');
			$this->dtgStewardshipContributionAmount->SetDataBinder('dtgStewardshipContributionAmount_Bind', $this);
			$this->dtgStewardshipContributionAmount->SortColumnIndex = 0;

			$this->dtgStewardshipContributionAmount->NoDataHtml = 'No contribution records given your filtering criteria above.';
			
			if ($this->objForm->objHousehold) {
				$this->chkCombined = new QCheckBox($this);
				$this->chkCombined->Text = 'View contributions by all household members';
				$this->chkCombined->Checked = $this->objForm->objHousehold->CombinedStewardshipFlag;
			}

			$this->lstYear = new QListBox($this);
			$this->lstYear->AddItem('- View All -', null);
			$intYearNow = QDateTime::Now()->Year;
			for ($intYear = 2000; $intYear <= ($intYearNow + 1); $intYear++) {
				$this->lstYear->AddItem($intYear, $intYear, $intYear == $intYearNow);
			}

			$this->lstFund = new QListBox($this);
			$this->lstFund->AddItem('- View All -', null, true);
			foreach (StewardshipFund::LoadAll(QQ::OrderBy(QQN::StewardshipFund()->Name)) as $objFund) {
				$this->lstFund->AddItem($objFund->Name, $objFund->Id);
			}

			$this->lstYear->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'Filter'));
			$this->lstYear->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'Filter'));
			$this->lstYear->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->lstFund->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'Filter'));
			$this->lstFund->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'Filter'));
			$this->lstFund->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			if ($this->objForm->objHousehold) {
				$this->chkCombined->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'Filter'));
			}

			$this->pxyPrint = new QControlProxy($this);
			$this->pxyPrint->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyPrint_Click'));
			$this->pxyPrint->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function pxyPrint_Click() {
			if (!$this->lstYear->SelectedValue) {
				QApplication::DisplayAlert('Please specify a year to print');
				return;
			}

			if ($this->objForm->objHousehold && $this->objForm->objHousehold->CombinedStewardshipFlag) {
				$strUrl = sprintf('/stewardship/receipt.php/%s/%s/%s/Statement%s.pdf',
					$this->objPerson->Id, $this->objForm->objHousehold->Id, $this->lstYear->SelectedValue, $this->lstYear->SelectedValue);
			} else {
				$strUrl = sprintf('/stewardship/receipt.php/%s/%s/%s/Statement%s.pdf',
					$this->objPerson->Id, 0, $this->lstYear->SelectedValue, $this->lstYear->SelectedValue);
			}

			QApplication::Redirect($strUrl);
		}

		public function Filter() {
			$this->dtgStewardshipContributionAmount->Refresh();
		}

		public function RenderDate(StewardshipContributionAmount $objAmount) {
			return sprintf('<a href="/stewardship/batch.php/%s#%s/view_contribution/%s">%s</a>',
				$objAmount->StewardshipContribution->StewardshipBatchId,
				$objAmount->StewardshipContribution->StewardshipStack->StackNumber,
				$objAmount->StewardshipContributionId,
				$objAmount->StewardshipContribution->DateCredited->ToString('MMM D YYYY'));
		}
		
		public function RenderPerson(StewardshipContributionAmount $objAmount) {
			return $objAmount->StewardshipContribution->Person->Name;
		}
		
		public function RenderTransaction(StewardshipContributionAmount $objAmount) {
			return ($objAmount->StewardshipContribution->Transaction);
		}
		
		public function RenderAmount(StewardshipContributionAmount $objAmount) {
			return QApplication::DisplayCurrencyHtml($objAmount->Amount, true);
		}
		
		public function dtgStewardshipContributionAmount_Bind() {
			if ($this->chkCombined && $this->chkCombined->Checked) {
				$intPersonIdArray = array();
				foreach ($this->objForm->objHousehold->GetHouseholdParticipationArray() as $objParticipation) {
					$intPersonIdArray[] = $objParticipation->PersonId;
				}
				$objCondition = QQ::In(QQN::StewardshipContributionAmount()->StewardshipContribution->PersonId, $intPersonIdArray);
			} else
				$objCondition = QQ::Equal(QQN::StewardshipContributionAmount()->StewardshipContribution->PersonId, $this->objPerson->Id);

			if ($this->lstYear->SelectedValue) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::GreaterOrEqual(QQN::StewardshipContributionAmount()->StewardshipContribution->DateEntered, new QDateTime($this->lstYear->SelectedValue . '-01-01 00:00:00')),
					QQ::LessOrEqual(QQN::StewardshipContributionAmount()->StewardshipContribution->DateEntered, new QDateTime($this->lstYear->SelectedValue . '-12-31 23:59:59')));
			}

			if ($this->lstFund->SelectedValue) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Equal(QQN::StewardshipContributionAmount()->StewardshipFundId, $this->lstFund->SelectedValue));
			}

			$this->dtgStewardshipContributionAmount->MetaDataBinder($objCondition);
		}
	}
?>