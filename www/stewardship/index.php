<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - All Batches';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $dtgBatches;

		protected $lstStatus;
		protected $txtDescription;
		protected $lstCreatedBy;

		protected function Form_Create() {
			$this->dtgBatches = new StewardshipBatchDataGrid($this);
			$this->dtgBatches->FontSize = '10px';
			$this->dtgBatches->Paginator = new QPaginator($this->dtgBatches);
			$this->dtgBatches->MetaAddColumn('DateEntered', 'Name=Batch Label', 'Html=<?= $_FORM->RenderBatchLabel($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px');
			$this->dtgBatches->MetaAddColumn('DateCredited', 'Name=Post Date', 'Html=<?= $_FORM->RenderPostDate($_ITEM); ?>', 'HtmlEntities=false', 'Width=80px');
			$this->dtgBatches->MetaAddTypeColumn('StewardshipBatchStatusTypeId', 'StewardshipBatchStatusType', 'Name=Status', 'Width=80px');
			$this->dtgBatches->MetaAddColumn('Description', 'Width=210px');
			$this->dtgBatches->MetaAddColumn('ItemCount', 'Name=Items', 'Width=40px');
			$this->dtgBatches->MetaAddColumn('ActualTotalAmount', 'Name=Total', 'Html=<?= $_FORM->FormatNumber($_ITEM->ActualTotalAmount); ?>', 'Width=85px', 'HtmlEntities=false');
			$this->dtgBatches->MetaAddColumn('ReportedTotalAmount', 'Name=Reported', 'Html=<?= $_FORM->FormatNumber($_ITEM->ReportedTotalAmount); ?>','Width=85px', 'HtmlEntities=false');
			$this->dtgBatches->MetaAddColumn('PostedTotalAmount', 'Name=Posted', 'Html=<?= $_FORM->FormatNumber($_ITEM->PostedTotalAmount); ?>','Width=85px', 'HtmlEntities=false');
			$this->dtgBatches->MetaAddColumn(QQN::StewardshipBatch()->CreatedByLogin->LastName, 'Name=Created By', 'Html=<?= ($_ITEM->CreatedByLogin->Name); ?>', 'Width=100px');
			$this->dtgBatches->SetDataBinder('dtgBatches_Bind');

			$this->dtgBatches->SortColumnIndex = 0;
			$this->dtgBatches->SortDirection = 1;

			$this->txtDescription = new QTextBox($this);
			
			$this->lstStatus = new QListBox($this);
			$this->lstStatus->AddItem('- View All -');
			foreach (StewardshipBatchStatusType::$NameArray as $intId => $strName) {
				$this->lstStatus->AddItem($strName, $intId);
			}
			
			$this->lstCreatedBy = new QListBox($this);
			$this->lstCreatedBy->AddItem('- View All -');
			foreach (Login::LoadAll(QQ::OrderBy(QQN::Login()->LastName)) as $objLogin) {
				$this->lstCreatedBy->AddItem($objLogin->Name, $objLogin->Id);
			}

			$this->txtDescription->AddAction(new QEnterKeyEvent(), new QAjaxAction('ResetFilter'));
			$this->txtDescription->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtDescription->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));
			$this->lstStatus->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));
			$this->lstCreatedBy->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));
		}
		
		public function ResetFilter() {
			$this->dtgBatches->PageNumber = 1;
			$this->dtgBatches->Refresh();
		}

		public function RenderBatchLabel(StewardshipBatch $objBatch) {
			return sprintf('<a href="/stewardship/batch.php/%s#1">%s</a> '.
				'<span style="font-size:11px; color: #888;">' . 
				'(<strong>%s</strong>)</span>',
				$objBatch->Id, $objBatch->DateEntered->ToString('MMM D YYYY'), $objBatch->BatchLabel);
//			return sprintf('<div style="width: 90px; float: left;"><a href="/stewardship/batch.php/%s#1">%s</a></div>'.
//				'<div style="float: left; font-size:11px; font-weight: bold;">' . 
//				'<a style="color: #888;" href="/stewardship/batch.php/%s#1">Batch %s</a></div>',
//				$objBatch->Id, $objBatch->DateEntered->ToString('MMM D YYYY'), $objBatch->Id, $objBatch->BatchLabel);
		}

		public function RenderPostDate(StewardshipBatch $objBatch) {
			if ($objBatch->DateCredited) return $objBatch->DateCredited->ToString('MMM D YYYY');
		}

		public function FormatNumber($fltAmount) {
			if ($fltAmount < 0)
				return '<span style="color: #933;">' . QApplication::DisplayCurrency($fltAmount) . '</span>';
			if ($fltAmount > 0)
				return QApplication::DisplayCurrency($fltAmount);
			return '<span style="color: #999;">$0.00</span>';
		}
		protected function dtgBatches_Bind() {
			$objCondition = QQ::All();
			
			if (strlen($strText = trim($this->txtDescription->Text)))
				$objCondition = QQ::AndCondition($objCondition, QQ::Like(QQN::StewardshipBatch()->Description, $strText . '%'));
			if ($this->lstCreatedBy->SelectedValue)
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::StewardshipBatch()->CreatedByLoginId, $this->lstCreatedBy->SelectedValue));
			if ($this->lstStatus->SelectedValue)
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::StewardshipBatch()->StewardshipBatchStatusTypeId, $this->lstStatus->SelectedValue));
			
			$this->dtgBatches->MetaDataBinder($objCondition);
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>