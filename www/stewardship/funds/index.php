<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class StewardshipFundsListForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Manage Funds';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $dtgFunds;

		protected function Form_Create() {
			$this->dtgFunds = new StewardshipFundDataGrid($this);
			$this->dtgFunds->FontSize = 11;
			$this->dtgFunds->MetaAddColumn('Name', 'Html=<?=$_FORM->RenderName($_ITEM); ?>', 'Width=500px', 'HtmlEntities=false');
			$this->dtgFunds->MetaAddColumn('AccountNumber', 'Width=220px');
			$this->dtgFunds->MetaAddColumn('ActiveFlag', 'Html=<?= ($_ITEM->ActiveFlag) ? "" : "Inactive"; ?>', 'Name=Inactive?', 'Width=200px');

			$this->dtgFunds->SortColumnIndex = 0;
			$this->dtgFunds->SortDirection = 0;
			
			$this->dtgFunds->Paginator = new QPaginator($this->dtgFunds);
			$this->dtgFunds->ItemsPerPage = 25;
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