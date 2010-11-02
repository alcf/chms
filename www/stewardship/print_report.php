<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class ViewStewardshipBatchReportForm extends ChmsForm {
		protected $objBatch;
		protected $objPost;

		protected $dtgReport;

		protected function Form_Create() {
			switch (QApplication::PathInfo(0)) {
				case 'funds':
					$this->dtgReport = new QDataGrid($this);
					$this->dtgReport->AddColumn(new QDataGridColumn('Fund', '<?= $_ITEM->StewardshipFund->Name; ?>', 'Width=300px'));
					$this->dtgReport->AddColumn(new QDataGridColumn('Account Number', '<?= $_ITEM->StewardshipFund->AccountNumber; ?>', 'Width=200px'));
					$this->dtgReport->AddColumn(new QDataGridColumn('Amount', '<?= QApplication::DisplayCurrencyHtml($_ITEM->Amount); ?>', 'HtmlEntities=false', 'Width=245px'));
					$this->dtgReport->NoDataHtml = 'Changes only to members credited.  (No changes to funding accounts or amounts)';
					$this->dtgReport->SetDataBinder('dtgReport_Funds_Bind');
					break;

				case 'line_items';
					$this->dtgReport = new QDataGrid($this);
					$this->dtgReport->AddColumn(new QDataGridColumn('Person', '<?= $_ITEM->Person->Name; ?>', 'Width=200px'));
					$this->dtgReport->AddColumn(new QDataGridColumn('Fund', '<?= $_ITEM->StewardshipFund->Name; ?>', 'Width=200px'));
					$this->dtgReport->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description; ?>', 'Width=200px'));
					$this->dtgReport->AddColumn(new QDataGridColumn('Amount', '<?= QApplication::DisplayCurrencyHtml($_ITEM->Amount); ?>', 'HtmlEntities=false', 'Width=130px'));
					$this->dtgReport->SetDataBinder('dtgReport_LineItems_Bind');
					break;

				default:
					QApplication::Redirect('/stewardship/');
					break;
			}

			$this->objBatch = StewardshipBatch::Load(QApplication::PathInfo(1));
			if (!$this->objBatch) QApplication::Redirect('/stewardship/');

			$this->objPost = StewardshipPost::LoadByStewardshipBatchIdPostNumber($this->objBatch->Id, QApplication::PathInfo(2));
			if (!$this->objPost) QApplication::Redirect('/stewardship/');
		}

		public function dtgReport_LineItems_Bind() {
			$this->dtgReport->DataSource = $this->objPost->GetStewardshipPostLineItemArray(QQ::OrderBy(QQN::StewardshipPostLineItem()->Person->LastName, QQN::StewardshipPostLineItem()->Person->FirstName, QQN::StewardshipPostLineItem()->Description));
		}

		public function dtgReport_Funds_Bind() {
			$this->dtgReport->DataSource = $this->objPost->GetStewardshipPostAmountArray(array(QQ::OrderBy(QQN::StewardshipPostAmount()->Amount), QQ::Expand(QQN::StewardshipPostAmount()->StewardshipFund->Name)));
		}
	}

	ViewStewardshipBatchReportForm::Run('ViewStewardshipBatchReportForm');
?>