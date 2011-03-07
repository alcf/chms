<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Outstanding Pledges';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $dtgPledges;

		protected $lstFund;
		protected $lstActiveFlag;
		protected $lstFulfilledFlag;
		
		protected $pxyActiveFlagToggle;
		protected $pxyActiveFlagToggleAll;
		
		public function RenderActiveFlag(StewardshipPledge $objPledge) {
			if ($objPledge->ActiveFlag) {
				return sprintf('Y <a href="#" %s><img title="Deactivate This Pledge" src="/assets/images/icons/arrow_refresh.png"/></a>', $this->pxyActiveFlagToggle->RenderAsEvents($objPledge->Id, false));
			}
		}
		
		public function pxyActiveFlagToggle_Click($strFormId, $strControlId, $strParameter) {
			$objPledge = StewardshipPledge::Load($strParameter);
			$objPledge->ActiveFlag = false;
			$objPledge->Save();
			$this->dtgPledges->Refresh();
		}

		public function pxyActiveFlagToggleAll_Click() {
			$this->dtgPledges_Bind();
			foreach ($this->dtgPledges->DataSource as $objPledge) {
				$objPledge->ActiveFlag = false;
				$objPledge->Save();
			}
			$this->dtgPledges->Refresh();
		}

		protected function Form_Create() {
			$this->dtgPledges = new StewardshipPledgeDataGrid($this);
			$this->dtgPledges->Paginator = new QPaginator($this->dtgPledges);
			$objCol = $this->dtgPledges->MetaAddColumn(QQN::StewardshipPledge()->Person->LastName, 'Name=Person', 'Html=<?= $_ITEM->Person->LinkHtml; ?>', 'Width=200px', 'HtmlEntities=false');
			$objCol->OrderByClause = QQ::OrderBy(QQN::StewardshipPledge()->Person->LastName, QQN::StewardshipPledge()->Person->FirstName, QQN::StewardshipPledge()->Id);
			$this->dtgPledges->MetaAddColumn(QQN::StewardshipPledge()->StewardshipFund->Name, 'Name=Fund',  'Width=170px', 'FontSize=10px');
			$this->dtgPledges->MetaAddColumn('PledgeAmount', 'Html=<?= $_FORM->RenderAmount($_ITEM, $_ITEM->PledgeAmount); ?>', 'HtmlEntities=false', 'Width=90px', 'Name=Pledged');
			$this->dtgPledges->MetaAddColumn('RemainingAmount', 'Html=<?= $_FORM->RenderAmount($_ITEM, $_ITEM->RemainingAmount); ?>', 'HtmlEntities=false', 'Width=90px', 'Name=Remaining');
			$this->dtgPledges->MetaAddColumn('DateStarted', 'Width=85px', 'FontSize=10px');
			$this->dtgPledges->MetaAddColumn('DateEnded', 'Width=85px', 'FontSize=10px');
			$this->dtgPledges->MetaAddColumn(QQN::StewardshipPledge()->FulfilledFlag, 'Html=<?= ($_ITEM->FulfilledFlag ? "Y" : ""); ?>', 'Name=Fulfilled?', 'Width=70px');
			$this->dtgPledges->MetaAddColumn(QQN::StewardshipPledge()->ActiveFlag, 'Html=<?= $_FORM->RenderActiveFlag($_ITEM); ?>', 'Name=Active?', 'Width=70px', 'HtmlEntities=false');
			$this->dtgPledges->SetDataBinder('dtgPledges_Bind');
			
			$this->dtgPledges->NoDataHtml = '<strong>No results.</strong><br/>Please specify search parameters above.';

			$this->dtgPledges->SortColumnIndex = 0;
			$this->dtgPledges->SortDirection = 0;

			$this->pxyActiveFlagToggle = new QControlProxy($this);
			$this->pxyActiveFlagToggle->AddAction(new QClickEvent(), new QAjaxAction('pxyActiveFlagToggle_Click'));
			$this->pxyActiveFlagToggle->AddAction(new QClickEvent(), new QTerminateAction());
			$this->pxyActiveFlagToggleAll = new QControlProxy($this);
			$this->pxyActiveFlagToggleAll->AddAction(new QClickEvent(), new QAjaxAction('pxyActiveFlagToggleAll_Click'));
			$this->pxyActiveFlagToggleAll->AddAction(new QClickEvent(), new QTerminateAction());

			$this->lstFund = new QListBox($this);
			$this->lstFund->AddItem('- View All -');
			foreach (StewardshipFund::QueryArray(QQ::Equal(QQN::StewardshipFund()->ActiveFlag, true), QQ::OrderBy(QQN::StewardshipFund()->Name)) as $objFund) {
				if ($objFund->FundNumber)
					$this->lstFund->AddItem($objFund->Name . ' (' . $objFund->FundNumber . ')', $objFund->Id);
				else
					$this->lstFund->AddItem($objFund->Name, $objFund->Id);
			}
			$this->lstFund->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));

			$this->lstActiveFlag = new QListBox($this);
			$this->lstActiveFlag->AddItem('- View All -', null);
			$this->lstActiveFlag->AddItem('Active Only', true);
			$this->lstActiveFlag->AddItem('Inactive Only', false);
			$this->lstActiveFlag->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));

			$this->lstFulfilledFlag= new QListBox($this);
			$this->lstFulfilledFlag->AddItem('- View All -', null);
			$this->lstFulfilledFlag->AddItem('Fulfilled Only', true);
			$this->lstFulfilledFlag->AddItem('Not Yet Fulfilled Only', false, true);
			$this->lstFulfilledFlag->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));
		}

		public function ResetFilter() {
			$this->dtgPledges->PageNumber = 1;
			$this->dtgPledges->Refresh();
		}

		public function RenderAmount(StewardshipPledge $objPledge, $fltAmount) {
			return sprintf('<a href="/individuals/view.php/%s#stewardship/edit_pledge/%s">%s</a>',
				$objPledge->PersonId,
				$objPledge->Id,
				$this->FormatNumber($fltAmount));
		}

		public function FormatNumber($fltAmount) {
			if ($fltAmount < 0)
				return '<span style="color: #933;">' . QApplication::DisplayCurrency($fltAmount) . '</span>';
			if ($fltAmount > 0)
				return QApplication::DisplayCurrency($fltAmount);
			return '<span style="color: #999;">$0.00</span>';
		}
		
		protected function CalculateQuery(&$objCondition, &$objClauses, &$blnQueried) {
			$objCondition = QQ::All();
			$objClauses = array();
			$blnQueried = false;

			if ($intFundId = $this->lstFund->SelectedValue) {
				$blnQueried = true;
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::StewardshipPledge()->StewardshipFundId, $intFundId));
			}

			if (!is_null($blnFlag = $this->lstActiveFlag->SelectedValue)) {
				$blnQueried = true;
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::StewardshipPledge()->ActiveFlag, $blnFlag));
			}

			if (!is_null($blnFlag = $this->lstFulfilledFlag->SelectedValue)) {
				$blnQueried = true;
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::StewardshipPledge()->FulfilledFlag, $blnFlag));
			}
		}

		protected function dtgPledges_Bind() {
			$this->CalculateQuery($objCondition, $objClauses, $blnQueried);
			$this->dtgPledges->MetaDataBinder($objCondition, $objClauses);
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>