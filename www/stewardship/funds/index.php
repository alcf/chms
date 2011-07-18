<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class StewardshipFundsListForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Manage Funds';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $dtgFunds;
		protected $lstActiveFlag;
		protected $lstExternalFlag;

		protected function Form_Create() {
			$this->dtgFunds = new StewardshipFundDataGrid($this);
			$this->dtgFunds->FontSize = 11;
			$this->dtgFunds->MetaAddColumn('Name', 'Html=<?=$_FORM->RenderName($_ITEM); ?>', 'Width=205px', 'HtmlEntities=false');
			$this->dtgFunds->MetaAddColumn('ExternalName', 'Name=Name on my.alcf.net', 'Width=205px', 'HtmlEntities=false');
			$this->dtgFunds->MetaAddColumn('AccountNumber', 'Width=130px');
			$this->dtgFunds->MetaAddColumn('FundNumber', 'Width=120px');
			$this->dtgFunds->MetaAddColumn('ActiveFlag', 'Html=<?= ($_ITEM->ActiveFlag) ? "" : "No"; ?>', 'Name=Display in NOAH?', 'Width=120px');
			$this->dtgFunds->MetaAddColumn('ExternalFlag', 'Html=<?= ($_ITEM->ExternalFlag) ? "" : "No"; ?>', 'Name=Diaplay in my.alcf?', 'Width=120px');

			$this->dtgFunds->SortColumnIndex = 0;
			$this->dtgFunds->SortDirection = 0;

			$this->dtgFunds->Paginator = new QPaginator($this->dtgFunds);
			$this->dtgFunds->ItemsPerPage = 25;

			$this->lstActiveFlag = new QListBox($this);
			$this->lstActiveFlag->AddItem('- View All -', null);
			$this->lstActiveFlag->AddItem('Displayed', true);
			$this->lstActiveFlag->AddItem('Not Displayed', false);
			$this->lstActiveFlag->AddAction(new QChangeEvent(), new QAjaxAction('dtgFunds_Bind'));

			$this->lstExternalFlag = new QListBox($this);
			$this->lstExternalFlag->AddItem('- View All -', null);
			$this->lstExternalFlag->AddItem('Displayed', true);
			$this->lstExternalFlag->AddItem('Not Displayed', false);
			$this->lstExternalFlag->AddAction(new QChangeEvent(), new QAjaxAction('dtgFunds_Bind'));
		}

		public function dtgFunds_Bind() {
			$objCondition = QQ::All();
			if (!is_null($blnOption = $this->lstActiveFlag->SelectedValue))
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::StewardshipFund()->ActiveFlag, $blnOption));
			if (!is_null($blnOption = $this->lstExternalFlag->SelectedValue))
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::StewardshipFund()->ExternalFlag, $blnOption));
			$this->dtgFunds->MetaDataBinder($objCondition);
		}

		public function RenderName(StewardshipFund $objFund) {
			if ($objFund->ActiveFlag) {
				$objStyle = null;
			} else {
				$objStyle = new QDataGridRowStyle();
				$objStyle->BackColor = '#edd';
			}

			$this->dtgFunds->OverrideRowStyle($this->dtgFunds->CurrentRowIndex, $objStyle);
			return sprintf('<a href="/stewardship/funds/edit.php/%s">%s</a>', $objFund->Id, QApplication::HtmlEntities($objFund->Name));
		}
	}

	StewardshipFundsListForm::Run('StewardshipFundsListForm');
?>