<?php 
	class CpStewardship_View extends CpStewardship_Base {
		public $dtgContributions;

		protected function SetupPanel() {
			$this->dtgContributions = new StewardshipContributionDataGrid($this);
			$this->dtgContributions->SetDataBinder('dtgContributions_Bind', $this);

			$this->dtgContributions->AddColumn(new QDataGridColumn('Contributor', '<?= $_CONTROL->ParentControl->RenderName($_ITEM); ?>', 'HtmlEntities=false', 'Width=160px'));
			$this->dtgContributions->AddColumn(new QDataGridColumn('Number', '<?= $_CONTROL->ParentControl->RenderNumber($_ITEM); ?>', 'HtmlEntities=false', 'Width=60px'));
			$this->dtgContributions->AddColumn(new QDataGridColumn('Amount', '<?= $_CONTROL->ParentControl->RenderAmount($_ITEM); ?>', 'HtmlEntities=false', 'Width=80px'));
			
			QApplication::ExecuteJavaScript('ScrollToBottom();');
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
			$objCondition = QQ::Equal(QQN::StewardshipContribution()->StewardshipStackId, $this->objStack->Id);
			$this->dtgContributions->MetaDataBinder($objCondition, QQ::OrderBy(QQN::StewardshipContribution()->Id));
		}
	}
?>