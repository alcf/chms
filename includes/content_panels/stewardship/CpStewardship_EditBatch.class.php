<?php 
	class CpStewardship_EditBatch extends CpStewardship_Base {
		public $mctStewardshipBatch;

		public $txtDescription;
		public $lstStackCount;
		public $calDateCredited;

		public $txtReportedTotals;

		protected function SetupPanel() {
			if ($this->objStack) return $this->ReturnTo('#/edit_batch');
			$this->mctStewardshipBatch = new StewardshipBatchMetaControl($this, $this->objBatch);
			$this->txtDescription = $this->mctStewardshipBatch->txtDescription_Create();

			$this->lstStackCount = new QListBox($this);
			$this->lstStackCount->Name = 'Number of Stacks';

			$this->calDateCredited = $this->mctStewardshipBatch->calDateCredited_Create();
			$this->calDateCredited->MaximumYear = date('Y') + 5;
			
			$objStackArray = array();
			foreach ($this->objBatch->GetStewardshipStackArray() as $objStack) {
				$objStackArray[$objStack->StackNumber] = $objStack;
			}

			$this->txtReportedTotals = array();
			for ($i = 1; $i <= 20; $i++) {
				$txtReportedTotal = new QFloatTextBox($this, 'txtReportedTotal' . $i);
				$txtReportedTotal->Name = 'Reported Total for Stack #' . $i;
				$txtReportedTotal->Visible = false;
				$txtReportedTotal->ActionParameter = $i;
				if (array_key_exists($i, $objStackArray)) $txtReportedTotal->Text = $objStackArray[$i]->ReportedTotalAmount;
				$this->txtReportedTotals[$i] = $txtReportedTotal;
			}
			
			for ($i = max(1, count($objStackArray)); $i <= 20; $i++) {
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

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			return $this->ReturnTo('#1');
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$objStackArray = array();
			foreach ($this->objBatch->GetStewardshipStackArray() as $objStack) {
				$objStackArray[$objStack->StackNumber] = $objStack;
			}

			$fltTotalAmount = 0;
			foreach ($this->txtReportedTotals as $txtReportedTotal) {
				if ($txtReportedTotal->Visible) {
					$intStackNumber = intval($txtReportedTotal->ActionParameter);
					
					if ($fltAmount = trim($txtReportedTotal->Text))
						$fltTotalAmount += $fltAmount;
					else
						$fltAmount = null;

					if (array_key_exists($intStackNumber, $objStackArray))
						$objStack = $objStackArray[$intStackNumber];
					else {
						$objStack = new StewardshipStack();
						$objStack->StewardshipBatch = $this->objBatch;
						$objStack->StackNumber = $intStackNumber;
					}
					
					$objStack->ReportedTotalAmount = $fltAmount;
					$objStack->Save();
				}
			}

			$this->mctStewardshipBatch->StewardshipBatch->ReportedTotalAmount = $fltTotalAmount;
			$this->mctStewardshipBatch->SaveStewardshipBatch();
			$this->objForm->pnlBatchTitle->Refresh();
			$this->objForm->pnlStacks_Refresh();
			return $this->ReturnTo('#1');
		}
	}
?>