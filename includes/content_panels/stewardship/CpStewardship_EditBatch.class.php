<?php 
	class CpStewardship_EditBatch extends CpStewardship_Base {
		public $mctStewardshipBatch;

		public $txtDescription;

		protected function SetupPanel() {
			$this->mctStewardshipBatch = new StewardshipBatchMetaControl($this, $this->objBatch);
			$this->txtDescription = $this->mctStewardshipBatch->txtDescription_Create();
		}
	}
?>