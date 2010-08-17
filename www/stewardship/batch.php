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

		public $dtgContributions;
		public $pxyDeleteContribution;

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
			$this->pnlContent->CssClass = 'stewardshipContent';
			$this->pnlContent->AutoRenderChildren = true;

			$this->dtgContributions = new StewardshipContributionDataGrid($this);
			$this->dtgContributions->SetDataBinder('dtgContributions_Bind');
			
			$this->dtgContributions->AddColumn(new QDataGridColumn('Contributor', '<?= $_FORM->RenderName($_ITEM); ?>', 'HtmlEntities=false', 'Width=160px'));
			$this->dtgContributions->AddColumn(new QDataGridColumn('Number', '<?= $_FORM->RenderNumber($_ITEM); ?>', 'HtmlEntities=false', 'Width=60px'));
			$this->dtgContributions->AddColumn(new QDataGridColumn('Amount', '<?= $_FORM->RenderAmount($_ITEM); ?>', 'HtmlEntities=false', 'Width=80px'));
			
			$this->pxyDeleteContribution = new QControlProxy($this);
			if ($this->objBatch->StewardshipBatchStatusTypeId != StewardshipBatchStatusType::NewBatch) {
				$this->pxyDeleteContribution->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to DELETE this contribution?  This will require you to re-post the stack with updates.'));
			} else {
				$this->pxyDeleteContribution->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to DELETE this contribution?'));
			}
			$this->pxyDeleteContribution->AddAction(new QClickEvent(), new QAjaxAction('pxyDeleteContribution_Click'));
			$this->pxyDeleteContribution->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pnlStacks_Refresh();
			$this->SetUrlHashProcessor('Form_ProcessHash');
		}

		public function RenderName(StewardshipContribution $objContribution) {
			$strToReturn = $objContribution->Person->LinkHtml;
			return $strToReturn; 
		}
				
		public function RenderNumber(StewardshipContribution $objContribution) {
			return QApplication::HtmlEntities($objContribution->Source);
		}
				
		public function RenderAmount(StewardshipContribution $objContribution) {
			$strToReturn = '<div class="stewardshipAmount">' . QApplication::DisplayCurrency($objContribution->TotalAmount) . '</div>';
			$strToReturn .= '<div class="stewardshipActionBackground">&nbsp;</div>';
			$strToReturn .= '<div class="stewardshipAction">';
			$strToReturn .= sprintf('<a href="#" %s><img src="/assets/images/icons/cross.png" title="Delete Contribution"/></a>', $this->pxyDeleteContribution->RenderAsEvents($objContribution->Id, false));
			$strToReturn .= sprintf('<a href="#%s/edit/%s"><img src="/assets/images/icons/pencil.png" title="Edit Contribution"/></a>', $this->objStack->StackNumber, $objContribution->Id);
			$strToReturn .= sprintf('<a href="#%s/view/%s"><img src="/assets/images/icons/magnifier.png" title="View Details"/></a>', $this->objStack->StackNumber, $objContribution->Id);
			$strToReturn .= '</div>';
			return $strToReturn;
		}
		
		public function dtgContributions_Bind() {
			if ($this->objBatch->CountStewardshipStacks())
				$this->dtgContributions->NoDataHtml = '<p>Select a <strong>Stack</strong> to your left to begin entering contributions.</p>';
			else
				$this->dtgContributions->NoDataHtml = '<p>Click on <strong>Create Stack</strong> to your left to create your first stack.</p>';
			
			if ($this->objStack) {
				$objCondition = QQ::Equal(QQN::StewardshipContribution()->StewardshipStackId, $this->objStack->Id);
				$this->dtgContributions->MetaDataBinder($objCondition, QQ::OrderBy(QQN::StewardshipContribution()->Id));
			}
		}

		public function pxyDeleteContribution_Click($strFormId, $strControlId, $strParameter) {
			$objContribution = StewardshipContribution::Load($strParameter);
			if (!$objContribution || ($objContribution->StewardshipStackId != $this->objStack->Id) || ($objContribution->StewardshipBatchId != $this->objBatch->Id)) {
				return;
			}
			$objContribution->DeleteAllStewardshipContributionAmounts();
			$objContribution->Delete();
			$this->objStack->RefreshActualTotalAmount();
			$this->objBatch->RefreshActualTotalAmount(false);
			$this->objBatch->RefreshStatus();
			$this->pnlStack_Refresh($this->objStack);
			$this->pnlBatchTitle->Refresh();
			$this->dtgContributions->Refresh();
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
				if ($intStackNumber) {
					$this->objStack = StewardshipStack::LoadByStewardshipBatchIdStackNumber($this->objBatch->Id, $intStackNumber);
					if (!$this->objStack) QApplication::Redirect('/stewardship/');
				} else {
					$this->objStack = null;
				}

				// Refresh teh DataGrid and Stack in the stacklist
				$this->dtgContributions->Refresh();
				if ($this->objStack) $this->pnlStack_Refresh($this->objStack);
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

			// Since there are so many calculated values in the HTML, we'll store the template as a
			// sprintf-formatted string (e.g. with a bunch of %s) as a textfile and use sprintf to manually set the text of the 
			// pnlStack, instead of doing a full fledged QPanel template
			if ($objStack->ReportedTotalAmount) {
				$strSprintfTemplate = file_get_contents(dirname(__FILE__) . '/pnlStack_WithReportedAmount.txt');
				$pnlStack->Text = sprintf($strSprintfTemplate, $objStack->StackNumber, $strClassName, $objStack->StackNumber,
					$objStack->ItemCount,
					QApplication::DisplayCurrency($objStack->ActualTotalAmount),
					QApplication::DisplayCurrency($objStack->ReportedTotalAmount),
					QApplication::DisplayCurrency($objStack->ActualTotalAmount - $objStack->ReportedTotalAmount));
			} else {
				$strSprintfTemplate = file_get_contents(dirname(__FILE__) . '/pnlStack_WithoutReportedAmount.txt');
				$pnlStack->Text = sprintf($strSprintfTemplate, $objStack->StackNumber, $strClassName, $objStack->StackNumber,
					$objStack->ItemCount,
					QApplication::DisplayCurrency($objStack->ActualTotalAmount));
			}
		}
	}

	ViewStewardshipBatchForm::Run('ViewStewardshipBatchForm');
?>