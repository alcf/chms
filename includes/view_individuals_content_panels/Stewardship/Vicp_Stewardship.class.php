<?php
	class Vicp_Stewardship extends Vicp_Base {
		public $dtgStewardshipContributionAmount;
		protected function SetupPanel() {
			$this->dtgStewardshipContributionAmount = new StewardshipContributionAmountDataGrid($this);
			$this->dtgStewardshipContributionAmount->MetaAddColumn(QQN::StewardshipContributionAmount()->StewardshipContribution->DateEntered, 'Html=<?= $_CONTROL->ParentControl->RenderDate($_ITEM); ?>', 'Name=Date', 'Width=100px');
			$this->dtgStewardshipContributionAmount->MetaAddColumn(QQN::StewardshipContributionAmount()->StewardshipContribution->Person->LastName, 'Html=<?= $_CONTROL->ParentControl->RenderPerson($_ITEM); ?>', 'Name=Person', 'Width=180px');
			$this->dtgStewardshipContributionAmount->MetaAddColumn(QQN::StewardshipContributionAmount()->StewardshipFund->Name, 'Name=Fund', 'Width=180px');
			$this->dtgStewardshipContributionAmount->MetaAddColumn(QQN::StewardshipContributionAmount()->StewardshipContribution->StewardshipContributionTypeId, 'Html=<?= $_CONTROL->ParentControl->RenderTransaction($_ITEM); ?>', 'Name=Transaction', 'Width=170px');
			$this->dtgStewardshipContributionAmount->MetaAddColumn(QQN::StewardshipContributionAmount()->Amount, 'Html=<?= $_CONTROL->ParentControl->RenderAmount($_ITEM); ?>', 'HtmlEntities=false', 'FontNames=Lucida Console,Courier New,Courier,monospaced', 'Width=90px');
			$this->dtgStewardshipContributionAmount->SetDataBinder('dtgStewardshipContributionAmount_Bind', $this);
		}

		public function RenderDate(StewardshipContributionAmount $objAmount) {
			return $objAmount->StewardshipContribution->DateEntered->ToString('MMM D YYYY');
		}
		
		public function RenderPerson(StewardshipContributionAmount $objAmount) {
			return $objAmount->StewardshipContribution->Person->Name;
		}
		
		public function RenderTransaction(StewardshipContributionAmount $objAmount) {
			if ($objAmount->StewardshipContribution->Source)
				return sprintf('%s (%s)', StewardshipContributionType::$NameArray[$objAmount->StewardshipContribution->StewardshipContributionTypeId], $objAmount->StewardshipContribution->Source);
			else
				return sprintf('%s', StewardshipContributionType::$NameArray[$objAmount->StewardshipContribution->StewardshipContributionTypeId]);
		}
		
		public function RenderAmount(StewardshipContributionAmount $objAmount) {
			return QApplication::DisplayCurrencyHtml($objAmount->Amount, true);
		}
		
		public function dtgStewardshipContributionAmount_Bind() {
			$objCondition = QQ::Equal(QQN::StewardshipContributionAmount()->StewardshipContribution->PersonId, $this->objPerson->Id);
			$this->dtgStewardshipContributionAmount->MetaDataBinder($objCondition);
		}
	}
?>