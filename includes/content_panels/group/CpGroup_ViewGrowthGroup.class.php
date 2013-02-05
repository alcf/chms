<?php
	class CpGroup_ViewGrowthGroup extends CpGroup_Base {
		public $lblFacilitator;
		public $lblHost;
		public $lblRegion;
		public $lblMeeting;
		public $lblAddress;
		public $lblStructure;
		public $chkViewAll;

		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) $this->ReturnTo('/groups/');

			$this->SetupViewControls(true, false);
			// Set up additional column specifically for Growth Groups
			$this->dtgMembers->AddColumn(new QDataGridColumn('Current Member', '<?= $_CONTROL->ParentControl->RenderCurrentMember($_ITEM); ?>', 'HtmlEntities=true', 'Width=80px'));
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind', $this);
			
			$strFacilitatorArray = array();
			$strHostArray = array();
			
			foreach ($this->objGroup->GetActiveGroupParticipationArray() as $objParticipant) {
				if ($objParticipant->GroupRole->Name == 'Facilitator') {
					$strFacilitatorArray[] = $objParticipant->Person->Name;
				} else if ($objParticipant->GroupRole->Name == 'Host') {
					$strHostArray[] = $objParticipant->Person->Name;
				}
			}
			
			$this->lblFacilitator = new QLabel($this);
			$this->lblFacilitator->Name = 'Facilitator';
			if (count($strFacilitatorArray)) {
				$this->lblFacilitator->Text = implode(', ', $strFacilitatorArray);
			} else {
				$this->lblFacilitator->CssClass = 'na';
				$this->lblFacilitator->Text = 'Not Specified';
			}
			
			$this->lblHost = new QLabel($this);
			$this->lblHost->Name = 'Host';
			if (count($strHostArray)) {
				$this->lblHost->Text = implode(', ', $strHostArray);
			} else {
				$this->lblHost->CssClass = 'na';
				$this->lblHost->Text = 'Not Specified';
			}

			$this->lblRegion = new QLabel($this);
			$this->lblRegion->Name = 'Growth Group Region';
			$this->lblRegion->Text = $this->objGroup->GrowthGroup->GrowthGroupLocation->Location;

			$this->lblMeeting = new QLabel($this);
			$this->lblMeeting->Name = 'Meeting Information';
			$this->lblMeeting->Text = $this->objGroup->GrowthGroup->MeetingInfo;
			
			$this->lblAddress = new QLabel($this);
			$this->lblAddress->Name = 'Address';
			$this->lblAddress->Text = $this->objGroup->GrowthGroup->AddressInfo;
			
			$this->lblStructure = new QLabel($this);
			$this->lblStructure->Name = 'Structure';
			$this->lblStructure->Text = $this->objGroup->GrowthGroup->StructuresHtml;
			$this->lblStructure->HtmlEntities = false;

			if ($this->objGroup->CountEmailMessageRoutes()) $this->SetupEmailMessageControls();
			$this->SetupSmsControls();
			
			$this->chkViewAll = new QCheckBox($this);
			$this->chkViewAll->Text = 'View "Inactive/Past" Members as well';
			$this->chkViewAll->AddAction(new QClickEvent(), new QAjaxControlAction($this,'chkViewAll_Click'));
				
		}

		public function RenderCurrentMember(Person $objPerson) {
			$objClause = QQ::AndCondition(
				QQ::Equal(QQN::Group()->GroupParticipation->PersonId, $objPerson->Id),
				QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id)
				);
			$objArrayGroup = $objPerson->GetGroupParticipationArray();
			foreach($objArrayGroup as $objParticipation) {
				if($objParticipation->GroupId == $this->objGroup->Id) {
					if($objParticipation->DateEnd == null)
						return 'Y';
					else
						return 'N';
				}
			}
			return '';
		}
		
		public function chkViewAll_Click() {
			$this->dtgMembers->Refresh();
		}
		
		public function dtgMembers_Bind() {
			if($this->chkViewAll->Checked) {
				$objCondition = QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id);
			} else {
				$objCondition = QQ::AndCondition(
					QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id),
					QQ::IsNull(QQN::Person()->GroupParticipation->DateEnd)
				);
			}
			$this->dtgMembers->TotalItemCount = Person::QueryCount($objCondition);

			$objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgMembers->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgMembers->OrderByClause) $objClauses[] = $objClause;

			$this->dtgMembers->DataSource = Person::QueryArray($objCondition, $objClauses);
		}
	}
?>