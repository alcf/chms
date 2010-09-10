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
		public $pxyDeleteStack;

		protected function Form_Create() {
			$this->objBatch = StewardshipBatch::Load(QApplication::PathInfo(0));
			if (!$this->objBatch) QApplication::Redirect('/stewardship/');

			$this->strPageTitle .= $this->objBatch->DateEntered->ToString('MMM D YYYY') . ' :: Batch ' . $this->objBatch->BatchLabel; 

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

			$this->dtgContributions = new StewardshipContributionDataGrid($this, 'dtgContributions');
			$this->dtgContributions->SetDataBinder('dtgContributions_Bind');
			$this->dtgContributions->HtmlBefore = '<div id="dtgContributionsDiv" class="section" style="width: 340px; height: 500px; overflow: auto; float: left; margin-right: 10px;">';
			$this->dtgContributions->HtmlAfter = '</div>';

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

			$this->pxyDeleteStack = new QControlProxy($this);

			$this->pnlStacks_Refresh();
			$this->SetUrlHashProcessor('Form_ProcessHash');
		}

		public function RenderName(StewardshipContribution $objContribution) {
			$strToReturn = $objContribution->Person->LinkHtml;
			return $strToReturn; 
		}
				
		public function RenderNumber(StewardshipContribution $objContribution) {
			if (strlen($objContribution->Source) > 7)
				return QApplication::HtmlEntities(substr($objContribution->Source, 0, 5) . '...');
			else
				return QApplication::HtmlEntities($objContribution->Source);
		}
				
		public function RenderAmount(StewardshipContribution $objContribution) {
			$strToReturn = '<div class="stewardshipAmount">' . QApplication::DisplayCurrencyHtml($objContribution->TotalAmount, true) . '</div>';
			$strToReturn .= '<div class="stewardshipActionBackground">&nbsp;</div>';
			$strToReturn .= '<div class="stewardshipAction">';
			$strToReturn .= sprintf('<a href="#" %s><img src="/assets/images/icons/cross.png" title="Delete Contribution"/></a>', $this->pxyDeleteContribution->RenderAsEvents($objContribution->Id, false));
			$strToReturn .= sprintf('<a href="#%s/edit_contribution/%s"><img src="/assets/images/icons/pencil.png" title="Edit Contribution"/></a>', $this->objStack->StackNumber, $objContribution->Id);
			$strToReturn .= sprintf('<a href="#%s/view_contribution/%s"><img src="/assets/images/icons/magnifier.png" title="View Details"/></a>', $this->objStack->StackNumber, $objContribution->Id);
			$strToReturn .= '</div>';
			return $strToReturn;
		}
		
		public function dtgContributions_Refresh() {
			$this->dtgContributions->Refresh();
			$this->dtgContributions->Visible = ($this->objStack) ? true : false;

			if ($this->objStack) {
				if ($this->objBatch->StewardshipBatchStatusTypeId == StewardshipBatchStatusType::NewBatch) {
					$this->pxyDeleteStack->RemoveAllActions(QClickEvent::EventName);
					if ($this->objBatch->CountStewardshipStacks() == 1) {
						$strMessage = 'Are you SURE you want to delete this SINGLE stack?  Doing so will also delete the batch altogether.';
					} else {
						$strMessage = 'Are you SURE you want to delete Stack #' . $this->objStack->StackNumber . '?';
					}

					$this->pxyDeleteStack->AddAction(new QClickEvent(), new QConfirmAction($strMessage));	
					$this->pxyDeleteStack->AddAction(new QClickEvent(), new QAjaxAction('pxyDeleteStack_Click'));
					$this->pxyDeleteStack->AddAction(new QClickEvent(), new QTerminateAction());

					$this->dtgContributions->NoDataHtml = sprintf('<p>Start <strong>Stack #%s</strong> and begin entering contributions.</p><div class="buttonBar"><a href="#" %s class="delete">Delete Stack</div>',
						$this->objStack->StackNumber, $this->pxyDeleteStack->RenderAsEvents(null, false));
				} else {
					$this->dtgContributions->NoDataHtml = sprintf('<p>Start <strong>Stack #%s</strong> and begin entering contributions.</p>', $this->objStack->StackNumber);
				}
			} else {
				$this->dtgContributions->NoDataHtml = null;
			}
		}

		public function pxyDeleteStack_Click($strFormId, $strControlId, $strParameter) {
			if ($this->objStack && !$this->objStack->CountStewardshipContributions()) {
				$this->objStack->Delete();

				if ($this->objBatch->CountStewardshipStacks()) {
					$this->objBatch->RefreshStackNumbering();

					$this->pnlStacks_Refresh(true);
					$this->pnlBatchTitle->Refresh();
					$this->objBatch->RefreshReportedTotalAmount();
					QApplication::ExecuteJavaScript(sprintf('document.location="/stewardship/batch.php/%s";', $this->objBatch->Id));
				} else {
					$this->objBatch->Delete();
					$dttDateEntered = $this->objBatch->DateEntered;
					StewardshipBatch::RefreshBatchLettering($dttDateEntered);
					QApplication::Redirect('/stewardship/');
				}
			}
		}

		public function dtgContributions_Bind() {
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
			QApplication::ExecuteJavaScript(sprintf('document.location="#%s";', $this->objStack->StackNumber));
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
			$strUrlHashArgument2 = (array_key_exists(3, $strUrlHashTokens)) ? $strUrlHashTokens[3] : null;
			
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
				$this->dtgContributions_Refresh();
				if ($this->objStack) $this->pnlStack_Refresh($this->objStack);
				if ($objOldStack) $this->pnlStack_Refresh($objOldStack);
				$this->pnlContent->CssClass = ($this->objStack) ? 'stewardshipContent' : null;
			}

			$this->pnlContent->RemoveChildControls(true);

			// Setup the Command
			if (!$strCommand) $strCommand = 'view';

			$strClassName = sprintf('CpStewardship_%s', QString::ConvertToCamelCase($strCommand));
			if (class_exists($strClassName, true)) {
				new $strClassName($this->pnlContent, 'content', $this->objBatch, $this->objStack, $strUrlHashArgument, $strUrlHashArgument2);
				QApplication::ExecuteJavaScript('ScrollToBottom();');
			} else {
				QApplication::Redirect('#1');
			}
		}

		public function pnlStacks_Refresh($blnClearChildren = false) {
			if ($blnClearChildren) {
				$this->pnlStacks->RemoveChildControls(true);
				$this->pnlStacks->Refresh();
			}

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
			
			if (!$pnlStack) return;

			$strClassName = null;
			if ($this->objStack && ($this->objStack->Id == $objStack->Id))
				$strClassName = 'selected';

			// Since there are so many calculated values in the HTML, we'll store the template as a
			// sprintf-formatted string (e.g. with a bunch of %s) as a textfile and use sprintf to manually set the text of the 
			// pnlStack, instead of doing a full fledged QPanel template
			if ($objStack->ReportedTotalAmount) {
				$strSprintfTemplate = file_get_contents(dirname(__FILE__) . '/pnlStack_WithReportedAmount.txt');
				$pnlStack->Text = sprintf($strSprintfTemplate, $objStack->StackNumber, $strClassName, $objStack->StackNumber,
					number_format($objStack->ItemCount, 0),
					QApplication::DisplayCurrency($objStack->ActualTotalAmount),
					QApplication::DisplayCurrency($objStack->ReportedTotalAmount),
					QApplication::DisplayCurrencyHtml($objStack->ActualTotalAmount - $objStack->ReportedTotalAmount));
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