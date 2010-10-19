<?php 
	class CpStewardship_PostBatch extends CpStewardship_Base {
		public $dtgPosts;

		protected function SetupPanel() {
			if ($this->objBatch->StewardshipBatchStatusTypeId == StewardshipBatchStatusType::NewBatch)
				return $this->ReturnTo('#/view_post');

			$this->dtgPosts = new QDataGrid($this);
			$this->dtgPosts->AddColumn(new QDataGridColumn('Posting', '<?= $_CONTROL->ParentControl->RenderPosting($_ITEM); ?>', 'HtmlEntities=false', 'Width=200px'));
			$this->dtgPosts->AddColumn(new QDataGridColumn('Post Date', '<?= $_CONTROL->ParentControl->RenderPostDate($_ITEM); ?>', 'Width=140px'));
			$this->dtgPosts->AddColumn(new QDataGridColumn('Posted By', '<?= $_CONTROL->ParentControl->RenderPostedBy($_ITEM); ?>', 'Width=140px'));
			$this->dtgPosts->AddColumn(new QDataGridColumn('Transaction Count', '<?= $_CONTROL->ParentControl->RenderCount($_ITEM); ?>', 'Width=130px'));
			$this->dtgPosts->AddColumn(new QDataGridColumn('Amount', '<?= $_CONTROL->ParentControl->RenderAmount($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px'));
			$this->dtgPosts->SetDataBinder('dtgPosts_Bind', $this);
		}

		public function dtgPosts_Bind() {
			if ($this->objBatch->StewardshipBatchStatusTypeId != StewardshipBatchStatusType::PostedInFull) {
				$objPostArray = array(new StewardshipPost());
			} else {
				$objPostArray = array();
			}

			$objPostArray = array_merge($objPostArray, $this->objBatch->GetStewardshipPostArray(QQ::OrderBy(QQN::StewardshipPost()->PostNumber)));
			$this->dtgPosts->DataSource = $objPostArray;
		}

		public function RenderPosting(StewardshipPost $objPost) {
			if ($objPost->Id) {
				return sprintf('<a href="#/view_post/%s">Post #%s</a>', $objPost->PostNumber, $objPost->PostNumber);
			} else {
				return '<a href="#/view_post">Unposted Transactions</a>';
			}
		}

		public function RenderPostDate(StewardshipPost $objPost) {
			if ($objPost->Id) return $objPost->DatePosted->ToString('MMMM D, YYYY');
		}

		public function RenderPostedBy(StewardshipPost $objPost) {
			if ($objPost->Id) return $objPost->CreatedByLogin->Name;
		}

		public function RenderCount(StewardshipPost $objPost) {
			if ($objPost->Id) {
				return $objPost->CountStewardshipPostLineItems();
			} else {
				return StewardshipContribution::CountByStewardshipBatchIdUnpostedFlag($this->objBatch->Id, true);
			}
		}
		
		public function RenderAmount(StewardshipPost $objPost) {
			if ($objPost->Id) return QApplication::DisplayCurrencyHtml($objPost->TotalAmount);
		}
	}
?>