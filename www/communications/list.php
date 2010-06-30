<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewCommunicationListForm extends ChmsForm {
		protected $strPageTitle = 'Email List - ';
		protected $intNavSectionId = ChmsForm::NavSectionCommunications;

		protected $objList;
		protected $dtgMembers;
		protected $pxyUnsubscribeEntry;
		protected $pxyUnsubscribePerson;

		protected function Form_Create() {
			$this->objList = CommunicationList::LoadById(QApplication::PathInfo(0));
			if (!$this->objList) QApplication::Redirect('/communications/');

			$this->dtgMembers = new QDataGrid($this);
			$this->dtgMembers->UseAjax = true;
			$this->dtgMembers->Paginator = new QPaginator($this->dtgMembers);
			if ($this->objList->Ministry->IsLoginCanAdminMinistry(QApplication::$Login))
				$this->dtgMembers->AddColumn(new QDataGridColumn('Edit', '<?= $_FORM->RenderEdit($_ITEM); ?>', 'HtmlEntities=false', 'Width=140px', 'FontSize=10px'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('First Name', '<?= $_ITEM[0]; ?>', 'Width=170px','SortByCommand=0,0','ReverseSortByCommand=0,1'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('Middle Name', '<?= $_ITEM[1]; ?>', 'Width=100px','SortByCommand=1,0','ReverseSortByCommand=1,1'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('Last Name', '<?= $_ITEM[2]; ?>', 'Width=170px','SortByCommand=2,0','ReverseSortByCommand=2,1'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('Email', '<a href="mailto:<?= QApplication::HtmlEntities($_ITEM[3]); ?>"><?= QApplication::HtmlEntities($_ITEM[3]); ?></a>', 'HtmlEntities=false', 'Width=310px','SortByCommand=3,0','ReverseSortByCommand=3,1'));

			$this->pxyUnsubscribeEntry = new QControlProxy($this);
			$this->pxyUnsubscribeEntry->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to unsubscribe this person from the list?'));
			$this->pxyUnsubscribeEntry->AddAction(new QClickEvent(), new QAjaxAction('pxyUnsubscribeEntry_Click'));
			$this->pxyUnsubscribeEntry->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyUnsubscribePerson = new QControlProxy($this);
			$this->pxyUnsubscribePerson->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to unsubscribe this person from the list?'));
			$this->pxyUnsubscribePerson->AddAction(new QClickEvent(), new QAjaxAction('pxyUnsubscribePerson_Click'));
			$this->pxyUnsubscribePerson->AddAction(new QClickEvent(), new QTerminateAction());

			$this->dtgMembers->SetDataBinder('dtgMembers_Bind');
		}
		
		public function RenderEdit($strArray) {
			if ($strArray[4]) {
				$objPerson = Person::Load($strArray[4]);
				$strToReturn = sprintf('<a href="" %s>Unsubscribe</a> &nbsp;|&nbsp; <a href="%s">View</a>',
					$this->pxyUnsubscribePerson->RenderAsEvents($objPerson->Id, false),
					$objPerson->LinkUrl);
			} else {
				$strToReturn = sprintf('<a href="" %s>Unsubscribe</a>', $this->pxyUnsubscribeEntry->RenderAsEvents($strArray[5], false));
			}

			return $strToReturn;
		}

		public function dtgMembers_Bind() {
			$this->dtgMembers->TotalItemCount = $this->objList->CountMembers();
			$this->dtgMembers->DataSource = $this->objList->GetMemberAsArray($this->dtgMembers->SortInfo, $this->dtgMembers->LimitInfo);
		}

		public function pxyUnsubscribeEntry_Click($strFormId, $strControlId, $strParameter) {
			$objEntry = CommunicationListEntry::Load($strParameter);
			if ($objEntry->IsCommunicationListAssociated($this->objList)) $objEntry->UnassociateCommunicationList($this->objList);
			$this->dtgMembers->Refresh();
		}

		public function pxyUnsubscribePerson_Click($strFormId, $strControlId, $strParameter) {
			$objPerson = Person::Load($strParameter);
			if ($objPerson->IsCommunicationListAssociated($this->objList)) $objPerson->UnassociateCommunicationList($this->objList);
			$this->dtgMembers->Refresh();
		}
	}

	ViewCommunicationListForm::Run('ViewCommunicationListForm');
?>