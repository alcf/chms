<?php
	class CpGroup_ViewGrowthGroup extends CpGroup_Base {
		/**
		 * @var PersonDataGrid
		 */
		public $dtgMembers;

		public $lblRegion;
		public $lblMeeting;
		public $lblAddress;
		public $lblStructure;

		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) $this->ReturnTo('/groups/');

			$this->dtgMembers = new PersonDataGrid($this);
			$this->dtgMembers->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgMembers->AddColumn(new QDataGridColumn('Edit', '<?= $_CONTROL->ParentControl->RenderEdit($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgMembers->MetaAddColumn('FirstName', 'Html=<?= $_CONTROL->ParentControl->RenderFirstName($_ITEM); ?>', 'HtmlEntities=false');
			$this->dtgMembers->MetaAddColumn('LastName', 'Html=<?= $_CONTROL->ParentControl->RenderLastName($_ITEM); ?>', 'HtmlEntities=false');
			$this->dtgMembers->MetaAddColumn(QQN::Person()->PrimaryEmail->Address, 'Name=Email');
			$this->dtgMembers->MetaAddColumn('MembershipStatusTypeId', 'Name=ALCF Member?', 'Html=<?= $_CONTROL->ParentControl->RenderMember($_ITEM); ?>');
			$this->dtgMembers->AddColumn(new QDataGridColumn('Edit', '<?= $_CONTROL->ParentControl->RenderCurrentRoles($_ITEM); ?>', 'HtmlEntities=false'));
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

			$this->SetupViewControls();
		}

		public function RenderEdit(Person $objPerson) {
			return sprintf('<a href="#%s/edit_participation/%s">Edit</a>', $this->objGroup->Id, $objPerson->Id);
		}

		public function RenderFirstName(Person $objPerson) {
			return sprintf('<a href="/individuals/view.php/%s#general">%s</a>', $objPerson->Id, QApplication::HtmlEntities($objPerson->FirstName));
		}
		
		public function RenderLastName(Person $objPerson) {
			return sprintf('<a href="/individuals/view.php/%s#general">%s</a>', $objPerson->Id, QApplication::HtmlEntities($objPerson->LastName));
		}

		public function RenderMember(Person $objPerson) {
			switch ($objPerson->MembershipStatusTypeId) {
				case MembershipStatusType::Member:
				case MembershipStatusType::ChildOfMember:
					return 'Y';
				default:
					return 'N';
			}
		}

		public function RenderCurrentRoles(Person $objPerson) {
			$objParticipations = GroupParticipation::LoadArrayByPersonIdGroupId($objPerson->Id, $this->objGroup->Id, array(
				QQ::OrderBy(QQN::GroupParticipation()->GroupRole->Name),
				QQ::Expand(QQN::GroupParticipation()->GroupRole->Name)));

			$strArray = array();
			foreach ($objParticipations as $objParticipation)
				if (!$objParticipation->DateEnd) $strArray[] = $objParticipation->GroupRole->Name;

			if (count($strArray))
				return implode(' and ', $strArray);
			else
				return '<span style="font-size: 10px; color: #999;">No current roles</span>';
		}

		public function dtgMembers_Bind() {
			$objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgMembers->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgMembers->OrderByClause) $objClauses[] = $objClause;

			$this->dtgMembers->DataSource = Person::QueryArray(QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id), $objClauses);
		}
	}
?>