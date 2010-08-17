<?php 
	class CpStewardship_EditBatch extends CpStewardship_Base {
		public $mctStewardshipBatch;

		public $txtDescription;
		public $txtReportedTotalAmount;

		protected function SetupPanel() {
			$this->mctStewardshipBatch = new StewardshipBatchMetaControl($this, $this->objBatch);
			$this->txtDescription = $this->mctStewardshipBatch->txtDescription_Create();
			$this->txtReportedTotalAmount = $this->mctStewardshipBatch->txtReportedTotalAmount_Create();
		}
	}
?>