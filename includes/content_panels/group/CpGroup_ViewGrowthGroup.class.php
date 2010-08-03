<?php
	class CpGroup_ViewGrowthGroup extends CpGroup_Base {
		public $lblRegion;
		public $lblMeeting;
		public $lblAddress;
		public $lblStructure;

		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) $this->ReturnTo('/groups/');

			$this->SetupViewControls(true, false);
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind', $this);
			
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
		}

		public function dtgMembers_Bind() {
			$objCondition = QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id);
			$this->dtgMembers->TotalItemCount = Person::QueryCount($objCondition);

			$objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgMembers->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgMembers->OrderByClause) $objClauses[] = $objClause;

			$this->dtgMembers->DataSource = Person::QueryArray($objCondition, $objClauses);
		}
	}
?>