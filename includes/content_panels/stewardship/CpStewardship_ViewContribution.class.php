<?php 
	class CpStewardship_ViewContribution extends CpStewardship_Base {
		public $objContribution;
		public $imgCheckImage;

		protected function SetupPanel() {
			$this->objContribution = StewardshipContribution::Load($this->strUrlHashArgument);
			if ((!$this->objContribution) ||
				($this->objContribution->StewardshipStackId != $this->objStack->Id) ||
				($this->objContribution->StewardshipBatchId != $this->objBatch->Id)) {
				return $this->ReturnTo('#' . $this->objStack->StackNumber);
			}

			if (is_file($this->objContribution->Path)) {
				$this->imgCheckImage = new TiffImageControl($this);
				$this->imgCheckImage->ImagePath = $this->objContribution->Path;
				$this->imgCheckImage->Width = '390';
			}
		}
	}
?>