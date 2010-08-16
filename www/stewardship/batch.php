<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	QLog::$LogFileWidth = 180;
	
	class ViewStewardshipBatchForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - View Batch - ';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		public $objBatch;
		public $objStack;

		public $pnlBatchTitle;
		public $pnlStacks;
		public $pnlContent;

		public $dtgContributions;

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

			$this->dtgContributions = new StewardshipContributionDataGrid($this);
			$this->dtgContributions->SetDataBinder('dtgContributions_Bind');

			$this->dtgContributions->AddColumn(new QDataGridColumn('Contributor', '<?= $_FORM->RenderName($_ITEM); ?>', 'HtmlEntities=false', 'Width=160px'));
			$this->dtgContributions->AddColumn(new QDataGridColumn('Number', '<?= $_FORM->RenderNumber($_ITEM); ?>', 'HtmlEntities=false', 'Width=60px'));
			$this->dtgContributions->AddColumn(new QDataGridColumn('Amount', '<?= $_FORM->RenderAmount($_ITEM); ?>', 'HtmlEntities=false', 'Width=80px'));
			
			$this->pnlStacks_Refresh();
			$this->SetUrlHashProcessor('Form_ProcessHash');
		}

		public function RenderName(StewardshipContribution $objContribution) {
			return $objContribution->Person->LinkHtml; 
		}
				
		public function RenderNumber(StewardshipContribution $objContribution) {
			return QApplication::HtmlEntities($objContribution->Source);
		}
				
		public function RenderAmount(StewardshipContribution $objContribution) {
			return QApplication::DisplayCurrency($objContribution->TotalAmount);
		}
		
		public function dtgContributions_Bind() {
			if ($this->objStack) {
				$objCondition = QQ::Equal(QQN::StewardshipContribution()->StewardshipStackId, $this->objStack->Id);
				$this->dtgContributions->MetaDataBinder($objCondition, QQ::OrderBy(QQN::StewardshipContribution()->Id));
			}
		}

		public function Form_ProcessHash() {
			// /stewardship/batch.php/X#Y/verb/Z
			// X = Batch ID
			// Y = Stack # (*NOT* Stack ID)
			
			
			// Cleanup and Tokenize UrlHash Contents
			$strUrlHash = trim(strtolower($this->strUrlHash));
			$strUrlHashTokens = explode('/', $strUrlHash);

			// Get Values
			$intStackNumber = $strUrlHashTokens[0];
			$strCommand = (array_key_exists(1, $strUrlHashTokens)) ? $strUrlHashTokens[1] : null;
			$strUrlHashArgument = (array_key_exists(2, $strUrlHashTokens)) ? $strUrlHashTokens[2] : null;

			// Did we switch the stack?
			if (!$this->objStack || ($this->objStack->StackNumber != $intStackNumber)) {
				// Save the "Old" Stack (if applicable)
				$objOldStack = null;
				if ($this->objStack) $objOldStack = $this->objStack;

				// Set the "New" stack (and validate!)
				$this->objStack = StewardshipStack::LoadByStewardshipBatchIdStackNumber($this->objBatch->Id, $intStackNumber);
				if (!$this->objStack) QApplication::Redirect('/stewardship/');

				// Refresh teh DataGrid and Stack in the stacklist
				$this->dtgContributions->Refresh();
				$this->pnlStack_Refresh($this->objStack);
				if ($objOldStack) $this->pnlStack_Refresh($objOldStack);
			}

			$this->pnlContent->RemoveChildControls(true);

			// Setup the Command
			if (!$strCommand) $strCommand = 'view';

			$strClassName = sprintf('CpStewardship_%s', QString::ConvertToCamelCase($strCommand));
			if (class_exists($strClassName, true)) {
				new $strClassName($this->pnlContent, 'content', $this->objBatch, $this->objStack, $strUrlHashArgument);
				QApplication::ExecuteJavaScript('ScrollToBottom();');
			} else {
				QApplication::Redirect('#1');
			}
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