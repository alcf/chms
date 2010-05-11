<?php
	class Vicp_Groups extends Vicp_Base {
		public $dtgCommunicationLists;
		public $pxyUnsubscribe;

		protected function SetupPanel() {
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