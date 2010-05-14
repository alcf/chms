<?php
	class Vicp_Groups extends Vicp_Base {
		public $dtgGroups;
		public $dtgCommunicationLists;
		public $pxyUnsubscribe;

		protected function SetupPanel() {
			$this->dtgGroups = new QDataGrid($this);
			$this->dtgGroups->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgGroups->SetDataBinder('dtgGroups_Bind', $this);
			$this->dtgGroups->AddColumn(new QDataGridColumn('Ministry', '<?= $_ITEM->Ministry->Name; ?>'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Group', '<?= $_CONTROL->ParentControl->RenderGroupName($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Role(s)', '<?= $_CONTROL->ParentControl->RenderGroupRoles($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Date(s) of Involvement', '<?= $_CONTROL->ParentControl->RenderGroupDates($_ITEM); ?>', 'HtmlEntities=false'));

			$this->dtgCommunicationLists = new CommunicationListDataGrid($this);
			$this->dtgCommunicationLists->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgCommunicationLists->AddColumn(new QDataGridColumn('Unsubscribe', '<?= $_CONTROL->ParentControl->RenderUnsubscribe($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgCommunicationLists->MetaAddColumn('Name');
			$this->dtgCommunicationLists->AddColumn(new QDataGridColumn('Email', '<?= $_ITEM->Token; ?>@groups.alcf.net'));
			$this->dtgCommunicationLists->SetDataBinder('dtgCommunicationLists_Bind', $this);

			$this->pxyUnsubscribe = new QControlProxy($this);
			$this->pxyUnsubscribe->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to unsubscribe ' . $this->objPerson->Name . ' from this list?'));
			$this->pxyUnsubscribe->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyUnsubscribe_Click'));
			$this->pxyUnsubscribe->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function dtgGroups_Bind() {
			$this->dtgGroups->DataSource = Group::QueryArray(
				QQ::Equal(QQN::Group()->GroupParticipation->PersonId, $this->objPerson->Id),
				QQ::Distinct()
			);
		}

		protected $objParticipationArray;

		public function RenderGroupName(Group $objGroup) {
			$intGroupId = $objGroup->Id;
			$strToReturn = QApplication::HtmlEntities($objGroup->Name);
			while ($objGroup = $objGroup->ParentGroup)
				$strToReturn = '<span style="font-size: 10px; color: #666;">' . QApplication::HtmlEntities($objGroup->Name) . ' &gt; </span>' . $strToReturn;
			return sprintf('<a href="#groups/edit_participation/%s">%s</a>', $intGroupId, $strToReturn);
		}

		public function RenderGroupRoles(Group $objGroup) {
			$this->objParticipationArray = GroupParticipation::LoadArrayByPersonIdGroupId($this->objPerson->Id, $objGroup->Id, QQ::OrderBy(QQN::GroupParticipation()->GroupRole->Name, QQN::GroupParticipation()->DateStart));
			$strToReturn = null;
			$strCurrentRole = null;
			foreach ($this->objParticipationArray as $objParticipation) {
				if ($strCurrentRole != $objParticipation->GroupRole->Name) {
					$strCurrentRole = $objParticipation->GroupRole->Name;
					$strToReturn .= QApplication::HtmlEntities($strCurrentRole) . '<br/>';
				} else {
					$strToReturn .= '</br/>';
				}
			}

			return $strToReturn;
		}

		public function RenderGroupDates(Group $objGroup) {
			$strToReturn = null;
			foreach ($this->objParticipationArray as $objParticipation) {
				$strToReturn .= $objParticipation->Dates . '<br/>';
			}
			return $strToReturn;
		}

		public function dtgCommunicationLists_Bind() {
			$this->dtgCommunicationLists->DataSource = $this->objPerson->GetCommunicationListArray(QQ::OrderBy(QQN::CommunicationList()->Name));
		}

		public function RenderUnsubscribe(CommunicationList $objCommunicationList) {
			return sprintf('<a href="" %s>Unsubscribe</a>', $this->pxyUnsubscribe->RenderAsEvents($objCommunicationList->Id, false));
		}

		public function pxyUnsubscribe_Click($strFormId, $strControlId, $strParameter) {
			$objCommunicationList = CommunicationList::Load($strParameter);
			if ($objCommunicationList->IsPersonAssociated($this->objPerson))
				$objCommunicationList->UnassociatePerson($this->objPerson);
			$this->dtgCommunicationLists->Refresh();
		}
	}
?>