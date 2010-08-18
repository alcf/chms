<?php 
	class CpStewardship_ViewContribution extends CpStewardship_Base {
		public $objContribution;
		protected function SetupPanel() {
			$this->objContribution = StewardshipContribution::Load($this->strUrlHashArgument);
			if ((!$this->objContribution) ||
				($this->objContribution->StewardshipStackId != $this->objStack->Id) ||
				($this->objContribution->StewardshipBatchId != $this->objBatch->Id)) {
				$this->ReturnTo('#' . $this->objStack->StackNumber);
			} 
		}
	}
?>