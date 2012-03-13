<?php
	class Vicp_SafariKids extends Vicp_Base {
		public $dtgAttendantHistory;
		public $dtgChildHistory;
		public $dtgParentHistory;
		
		protected function SetupPanel() {
			if ($this->objPerson->CountParentPagerIndividuals()) {
				if (ParentPagerAttendantHistory::QueryCount(QQ::Equal(QQN::ParentPagerAttendantHistory()->ParentPagerIndividual->PersonId, $this->objPerson->Id))) {
					$this->dtgAttendantHistory = new ParentPagerAttendantHistoryDataGrid($this);
					$this->dtgAttendantHistory->MetaAddColumn('DateIn', 'Width=125px', 'FontSize=10px');
					$this->dtgAttendantHistory->MetaAddColumn('DateOut', 'Width=125px', 'FontSize=10px');
					$this->dtgAttendantHistory->MetaAddColumn(QQN::ParentPagerAttendantHistory()->ParentPagerStation->Name, 'Name=Station', 'Width=160px');
					$this->dtgAttendantHistory->MetaAddColumn(QQN::ParentPagerAttendantHistory()->ParentPagerPeriod->Name, 'Name=Period', 'Width=150px');
					$this->dtgAttendantHistory->MetaAddColumn(QQN::ParentPagerAttendantHistory()->ParentPagerProgram->Name, 'Name=Program', 'Width=150px');
					$this->dtgAttendantHistory->SetDataBinder('dtgAttendantHistory_Bind', $this);
					$this->dtgAttendantHistory->Paginator = new QPaginator($this->dtgAttendantHistory);
					$this->dtgAttendantHistory->SortColumnIndex = 0;
					$this->dtgAttendantHistory->SortDirection = 1;
					$this->dtgAttendantHistory->FontSize = '11px';
				}
				
				if (ParentPagerChildHistory::QueryCount(QQ::Equal(QQN::ParentPagerChildHistory()->ParentPagerIndividual->PersonId, $this->objPerson->Id)) ||
					ParentPagerChildHistory::QueryCount(QQ::Equal(QQN::ParentPagerChildHistory()->PickupByParentPagerIndividual->PersonId, $this->objPerson->Id)) ||
					ParentPagerChildHistory::QueryCount(QQ::Equal(QQN::ParentPagerChildHistory()->DropoffByParentPagerIndividual->PersonId, $this->objPerson->Id))) {
					$this->dtgChildHistory = new ParentPagerChildHistoryDataGrid($this);
					$this->dtgChildHistory->MetaAddColumn('DateIn', 'Width=125px', 'FontSize=10px');
					$this->dtgChildHistory->MetaAddColumn('DateOut', 'Width=125px', 'FontSize=10px');
					$this->dtgChildHistory->MetaAddColumn(QQN::ParentPagerChildHistory()->ParentPagerIndividual->FirstName, 'Name=Child', 'Width=80px');
					$this->dtgChildHistory->MetaAddColumn(QQN::ParentPagerChildHistory()->PickupByParentPagerIndividual->FirstName, 'Name=Pick Up', 'Width=70px');
					$this->dtgChildHistory->MetaAddColumn(QQN::ParentPagerChildHistory()->DropoffByParentPagerIndividual->FirstName, 'Name=Drop Off', 'Width=70px');
					$this->dtgChildHistory->MetaAddColumn(QQN::ParentPagerChildHistory()->ParentPagerStation->Name, 'Name=Station', 'Width=150px');
					$this->dtgChildHistory->MetaAddColumn(QQN::ParentPagerChildHistory()->ParentPagerPeriod->Name, 'Name=Period', 'Width=70px');
					$this->dtgChildHistory->SetDataBinder('dtgChildHistory_Bind', $this);
					$this->dtgChildHistory->Paginator = new QPaginator($this->dtgChildHistory);
					$this->dtgChildHistory->SortColumnIndex = 0;
					$this->dtgChildHistory->SortDirection = 1;
					$this->dtgChildHistory->FontSize = '11px';
				}
			}
		}
		
		public function dtgAttendantHistory_Bind() {
			$this->dtgAttendantHistory->MetaDataBinder(QQ::Equal(QQN::ParentPagerAttendantHistory()->ParentPagerIndividual->PersonId, $this->objPerson->Id));
		}

		public function dtgChildHistory_Bind() {
			$this->dtgChildHistory->MetaDataBinder(QQ::OrCondition(
				QQ::Equal(QQN::ParentPagerChildHistory()->ParentPagerIndividual->PersonId, $this->objPerson->Id),
				QQ::Equal(QQN::ParentPagerChildHistory()->PickupByParentPagerIndividual->PersonId, $this->objPerson->Id),
				QQ::Equal(QQN::ParentPagerChildHistory()->DropoffByParentPagerIndividual->PersonId, $this->objPerson->Id)
			));
		}
	}
?>