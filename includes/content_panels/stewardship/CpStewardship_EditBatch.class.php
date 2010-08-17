<?php 
	class CpStewardship_EditBatch extends CpStewardship_Base {
		public $mctStewardshipBatch;

		public $txtDescription;
		public $lstStackCount;
		
		public $txtReportedTotals;

		protected function SetupPanel() {
			$this->mctStewardshipBatch = new StewardshipBatchMetaControl($this, $this->objBatch);
			$this->txtDescription = $this->mctStewardshipBatch->txtDescription_Create();

			$this->lstStackCount = new QListBox($this);
			$this->lstStackCount->Name = 'Number of Stacks';

			$objStackArray = array();
			foreach ($this->objBatch->GetStewardshipStackArray() as $objStack) {
				$objStackArray[$objStack->StackNumber] = $objStack;
			}

			$this->txtReportedTotals = array();
			for ($i = 1; $i <= 10; $i++) {
				$txtReportedTotal = new QFloatTextBox($this, 'txtReportedTotal' . $i);
				$txtReportedTotal->Name = 'Reported Total for Stack #' . $i;
				$txtReportedTotal->Visible = false;
				if (array_key_exists($i, $objStackArray)) $txtReportedTotal->Text = $objStackArray[$i]->ReportedTotalAmount;
				$this->txtReportedTotals[$i] = $txtReportedTotal;
			}
			
			for ($i = max(1, count($objStackArray)); $i <= 10; $i++) {
				$this->lstStackCount->AddItem($i, $i, $i==max(1, count($objStackArray)));
			}
			$this->lstStackCount->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstStackCount_Change'));
			$this->lstStackCount_Change();
		}
		
		public function lstStackCount_Change() {
			foreach ($this->txtReportedTotals as $i => $txtReportedTotal) {
				$txtReportedTotal->Visible = ($this->lstStackCount->SelectedValue >= $i);
			}
		}
	}
?>