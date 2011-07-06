<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Pay Pal Reconciliation - All Batches';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $dtgBatches;

		protected $lstStatus;
		protected $txtDescription;
		protected $lstCreatedBy;

		protected function Form_Create() {
			$this->dtgBatches = new PaypalBatchDataGrid($this);
			$this->dtgBatches->Paginator = new QPaginator($this->dtgBatches);
			$this->dtgBatches->MetaAddColumn('Number', 'Name=Batch Number', 'Html=<?= $_FORM->RenderBatchLabel($_ITEM); ?>', 'HtmlEntities=false', 'Width=200px');
			$this->dtgBatches->MetaAddColumn('DateReceived', 'Name=Date Created', 'Width=200px');
			$this->dtgBatches->MetaAddColumn('ReconciledFlag', 'Name=Posted?', 'Html=<?= $_ITEM->ReconciledFlag ? "Yes" : "No"; ?>', 'Width=100px');
			$this->dtgBatches->MetaAddColumn('DateReconciled', 'Name=Date Posted', 'Width=400px');
			$this->dtgBatches->SetDataBinder('dtgBatches_Bind');

			$this->dtgBatches->SortColumnIndex = 0;
			$this->dtgBatches->SortDirection = 1;
		}

		public function RenderBatchLabel(PaypalBatch $objBatch) {
			return sprintf('<a href="/stewardship/paypal/batch.php/%s" style="font-weight: bold;">%s</a> ',
				$objBatch->Id, $objBatch->Number);
//			return sprintf('<div style="width: 90px; float: left;"><a href="/stewardship/batch.php/%s#1">%s</a></div>'.
//				'<div style="float: left; font-size:11px; font-weight: bold;">' . 
//				'<a style="color: #888;" href="/stewardship/batch.php/%s#1">Batch %s</a></div>',
//				$objBatch->Id, $objBatch->DateEntered->ToString('MMM D YYYY'), $objBatch->Id, $objBatch->BatchLabel);
		}

		protected function dtgBatches_Bind() {
			$objCondition = QQ::All();
			
			$this->dtgBatches->MetaDataBinder($objCondition);
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>