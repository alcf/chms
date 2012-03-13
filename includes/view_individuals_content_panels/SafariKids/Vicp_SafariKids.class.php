<?php
	class Vicp_SafariKids extends Vicp_Base {
		public $dtgAttendantHistory;
		public $dtgChildHistory;
		public $dtgParentHistory;
		public $dtgParentPagerIndividuals;
		public $pxyUnassociate;
		
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
	
				$this->dtgParentPagerIndividuals = new ParentPagerIndividualDataGrid($this);
				$this->dtgParentPagerIndividuals->MetaAddColumn('ServerIdentifier', 'Name=Parent Pager ID', 'Html=<?= $_CONTROL->ParentControl->RenderIdentifier($_ITEM); ?>', 'Width=120px', 'HtmlEntities=false');
				$this->dtgParentPagerIndividuals->MetaAddColumn('FirstName', 'Width=125px', 'FontSize=10px');
				$this->dtgParentPagerIndividuals->MetaAddColumn('MiddleName', 'Width=125px', 'FontSize=10px');
				$this->dtgParentPagerIndividuals->MetaAddColumn('LastName', 'Width=125px', 'FontSize=10px');
				$this->dtgParentPagerIndividuals->AddColumn(new QDataGridColumn('Address(es)', '<?= $_CONTROL->ParentControl->RenderAddresses($_ITEM); ?>', 'Width=200px', 'HtmlEntities=false'));
				$this->dtgParentPagerIndividuals->SetDataBinder('ParentPagerIndividuals_Bind', $this);
				$this->dtgParentPagerIndividuals->SortColumnIndex = 0;
				$this->dtgParentPagerIndividuals->FontSize = '11px';
			}
			
			$this->pxyUnassociate = new QControlProxy($this);
			$this->pxyUnassociate->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to UNASSOCIATE this ParentPagerIndividual record from this NOAH Person?'));
			$this->pxyUnassociate->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyUnassociate_Click'));
			$this->pxyUnassociate->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function pxyUnassociate_Click($strFormId, $strControlId, $strParameter) {
			$objIndividual = ParentPagerIndividual::Load($strParameter);
			$objIndividual->Person = null;
			$objIndividual->Save();
			$this->Refresh();
		}

		public function RenderIdentifier(ParentPagerIndividual $objIndividual) {
			if (QApplication::$Login->IsPermissionAllowed(PermissionType::ManageSafariKids))
				return sprintf('<a href="#" %s>%s</a>', $this->pxyUnassociate->RenderAsEvents($objIndividual->Id, false), $objIndividual->Id);
			else 
				return $objIndividual->Id;
		}

		public function RenderAddresses(ParentPagerIndividual $objIndividual) {
			$objAddressArray = $objIndividual->GetParentPagerAddressArray();
			if ($objIndividual->ParentPagerHousehold)
				$objAddressArray = array_merge($objAddressArray, $objIndividual->ParentPagerHousehold->GetParentPagerAddressArray());
		
			$strToReturnArray = array();
			foreach ($objAddressArray as $objAddress) {
				$strToReturnArray[] = QApplication::HtmlEntities($objAddress->Address1) . ', ' . QApplication::HtmlEntities($objAddress->City);
			}
			return implode('<br/>', $strToReturnArray);
		}

		public function ParentPagerIndividuals_Bind() {
			$this->dtgParentPagerIndividuals->MetaDataBinder(QQ::Equal(QQN::ParentPagerIndividual()->PersonId, $this->objPerson->Id));
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