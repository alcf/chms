<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class ViewStewardshipBatchForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - View Batch - ';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		public $objBatch;
		public $objStack;

		public $pnlBatchTitle;
		public $pnlStacks;
		public $pnlContent;

		protected function Form_Create() {
			$this->objBatch = StewardshipBatch::Load(QApplication::PathInfo(0));
			if (!$this->objBatch) QApplication::Redirect('/stewardship/');

			$this->pnlBatchTitle = new QPanel($this);
			$this->pnlBatchTitle->Template = dirname(__FILE__) . '/pnlBatchTitle.tpl.php';
			$this->pnlBatchTitle->CssClass = 'section sectionBatchInfo';

			$this->pnlStacks = new QPanel($this);
			$this->pnlStacks->TagName = 'ul';
			$this->pnlStacks->CssClass = 'subnavSide subnavSideStewardship';
			$this->pnlStacks->AutoRenderChildren = true;

			$this->pnlContent = new QPanel($this);
			$this->pnlContent->AutoRenderChildren = true;

			$this->pnlStacks_Refresh();
			$this->SetUrlHashProcessor('Form_ProcessHash');
		}

		public function Form_ProcessHash() {
			// Cleanup and Tokenize UrlHash Contents
			$strUrlHash = trim(strtolower($this->strUrlHash));
			$strUrlHashTokens = explode('/', $strUrlHash);

			$objOldStack = null;
			if ($this->objStack) $objOldStack = $this->objStack;

			$this->objStack = StewardshipStack::LoadByStewardshipBatchIdStackNumber($this->objBatch->Id, $strUrlHashTokens[0]);
			if (!$this->objStack) QApplication::Redirect('/stewardship/');

			$this->pnlStack_Refresh($this->objStack);
			if ($objOldStack) $this->pnlStack_Refresh($objOldStack);

			$this->pnlContent->RemoveChildControls(true);

			if (!array_key_exists(1, $strUrlHashTokens)) $strUrlHashTokens[1] = 'view';

			// Setup the UrlHash Argument
			if (array_key_exists(2, $strUrlHashTokens))
				$strUrlHashArgument = $strUrlHashTokens[2];
			else
				$strUrlHashArgument = null;

			$strClassName = sprintf('CpStewardship_%s', QString::ConvertToCamelCase($strUrlHashTokens[1]));
			new $strClassName($this->pnlContent, 'content', $this->objBatch, $this->objStack, $strUrlHashArgument);
		}

		public function pnlStacks_Refresh() {
			$objStackArray = $this->objBatch->GetStewardshipStackArray(QQ::OrderBy(QQN::StewardshipStack()->StackNumber));

			$pnlStack = null;
			$blnFirst = true;
			foreach ($objStackArray as $objStack) {
				$strControlId = 'pnlStack' . $objStack->Id;
				$pnlStack = $this->GetControl($strControlId);
				if (!$pnlStack) {
					$pnlStack = new QPanel($this->pnlStacks, $strControlId);
					$pnlStack->TagName = 'li';
				}

				if ($blnFirst) {
					$strClassName = 'first';
					$blnFirst = false;
				} else {
					$strClassName = null;
				}

				$pnlStack->CssClass = $strClassName;
				$this->pnlStack_Refresh($objStack);
			}

			// Last
			if ($pnlStack) $pnlStack->CssClass .= ' last';
		}

		public function pnlStack_Refresh(StewardshipStack $objStack) {
			$strControlId = 'pnlStack' . $objStack->Id;
			$pnlStack = $this->GetControl($strControlId);

			$strClassName = null;
			if ($this->objStack && ($this->objStack->Id == $objStack->Id))
				$strClassName = 'selected';

			if ($objStack->ReportedTotalAmount) {
				$strTemplate = <<<template
<a href="#%s" class="%s">Stack #%s
	<div class="info">
		<div class="left">Item Count</div><div class="right">%s</div>
		<div class="cleaner"></div>
		<div class="left">Actual</div><div class="right">%s</div>
		<div class="cleaner"></div>
		<div class="left">Reported</div><div class="right">%s</div>
		<div class="cleaner"></div>
		<div class="left">Difference</div><div class="right">%s</div>
		<div class="cleaner"></div>
	</div>
</a>
template;
				$pnlStack->Text = sprintf($strTemplate, $objStack->StackNumber, $strClassName, $objStack->StackNumber,
					$objStack->ItemCount,
					QApplication::DisplayCurrency($objStack->ActualTotalAmount),
					QApplication::DisplayCurrency($objStack->ReportedTotalAmount),
					QApplication::DisplayCurrency($objStack->ActualTotalAmount - $objStack->ReportedTotalAmount));
			} else {
				$strTemplate = <<<template
<a href="#%s" class="%s">Stack #%s
	<div class="info">
		<div class="left">Item Count</div><div class="right">%s</div>
		<div class="cleaner"></div>
		<div class="left">Actual</div><div class="right">%s</div>
		<div class="cleaner"></div>
	</div>
</a>
template;

				$pnlStack->Text = sprintf($strTemplate, $objStack->StackNumber, $strClassName, $objStack->StackNumber,
					$objStack->ItemCount,
					QApplication::DisplayCurrency($objStack->ActualTotalAmount));
			}
		}
	}

	ViewStewardshipBatchForm::Run('ViewStewardshipBatchForm');
?>