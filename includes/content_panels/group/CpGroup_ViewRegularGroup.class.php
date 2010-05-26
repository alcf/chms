<?php
	class CpGroup_ViewRegularGroup extends CpGroup_Base {
		/**
		 * @var PersonDataGrid
		 */
		public $dtgMembers;

		protected function SetupPanel() {
			$this->dtgMembers = new PersonDataGrid($this);
			$this->dtgMembers->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgMembers->AddColumn(new QDataGridColumn('Edit', '<?= $_CONTROL->ParentControl->RenderEdit($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgMembers->MetaAddColumn('FirstName', 'Html=<?= $_CONTROL->ParentControl->RenderFirstName($_ITEM); ?>', 'HtmlEntities=false');
			$this->dtgMembers->MetaAddColumn('LastName', 'Html=<?= $_CONTROL->ParentControl->RenderLastName($_ITEM); ?>', 'HtmlEntities=false');
			$this->dtgMembers->MetaAddColumn(QQN::Person()->PrimaryEmail->Address);
			$this->dtgMembers->MetaAddColumn('MembershipStatusTypeId', 'Name=ALCF Member?', 'Html=<?= $_CONTROL->ParentControl->RenderMember($_ITEM); ?>');
			$this->dtgMembers->AddColumn(new QDataGridColumn('Edit', '<?= $_CONTROL->ParentControl->RenderCurrentRoles($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind', $this);
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
				return 'No current roles';
		}

		public function dtgMembers_Bind() {
			$objClauses = array();
			if ($objClause = $this->dtgMembers->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgMembers->OrderByClause) $objClauses[] = $objClause;

			$this->dtgMembers->DataSource = Person::QueryArray(QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id), $objClauses);
		}
	}
?>