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

		protected $dtgEmailMessageRoute;
		protected $dlgEmailMessage;
		protected $btnEmailMessage;
		protected $pxyEmailMessage;
		protected $objSelectedEmailMessageRoute;
		
		protected function Form_Create() {
			$this->objList = CommunicationList::LoadById(QApplication::PathInfo(0));
			if (!$this->objList) QApplication::Redirect('/communications/');

			$this->strPageTitle .= $this->objList->Name;

			$this->dtgMembers = new QDataGrid($this);
			$this->dtgMembers->UseAjax = true;
			$this->dtgMembers->Paginator = new QPaginator($this->dtgMembers);
			if ($this->objList->Ministry->IsLoginCanAdminMinistry(QApplication::$Login))
				$this->dtgMembers->AddColumn(new QDataGridColumn('Edit', '<?= $_FORM->RenderEdit($_ITEM); ?>', 'HtmlEntities=false', 'Width=140px', 'FontSize=10px'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('First Name', '<?= $_ITEM[0]; ?>', 'Width=170px','SortByCommand=0,0','ReverseSortByCommand=0,1'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('Middle Name', '<?= $_ITEM[1]; ?>', 'Width=100px','SortByCommand=1,0','ReverseSortByCommand=1,1'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('Last Name', '<?= $_ITEM[2]; ?>', 'Width=170px','SortByCommand=2,0','ReverseSortByCommand=2,1'));
			$this->dtgMembers->AddColumn(new QDataGridColumn('Email', '<a href="mailto:<?= QApplication::HtmlEntities($_ITEM[3]); ?>"><?= QApplication::HtmlEntities($_ITEM[3]); ?></a>', 'HtmlEntities=false', 'Width=310px','SortByCommand=3,0','ReverseSortByCommand=3,1'));

			if ($this->objList->Ministry->IsLoginCanAdminMinistry(QApplication::$Login))
				$this->dtgMembers->SortColumnIndex = 3;
			else
				$this->dtgMembers->SortColumnIndex = 2;

			$this->pxyUnsubscribeEntry = new QControlProxy($this);
			$this->pxyUnsubscribeEntry->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to unsubscribe this person from the list?'));
			$this->pxyUnsubscribeEntry->AddAction(new QClickEvent(), new QAjaxAction('pxyUnsubscribeEntry_Click'));
			$this->pxyUnsubscribeEntry->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyUnsubscribePerson = new QControlProxy($this);
			$this->pxyUnsubscribePerson->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to unsubscribe this person from the list?'));
			$this->pxyUnsubscribePerson->AddAction(new QClickEvent(), new QAjaxAction('pxyUnsubscribePerson_Click'));
			$this->pxyUnsubscribePerson->AddAction(new QClickEvent(), new QTerminateAction());

			$this->dtgMembers->SetDataBinder('dtgMembers_Bind');
			$this->SetupEmailMessageControls();
		}
		
		/**
		 * Sets up the EmailMessageRouteDataGrid if there are messages associated with this group
		 * @return void
		 */
		protected function SetupEmailMessageControls() {
			$this->dtgEmailMessageRoute = new EmailMessageRouteDataGrid($this);
			$this->dtgEmailMessageRoute->MetaAddColumn(QQN::EmailMessageRoute()->EmailMessage->DateReceived, 'Width=115px', 'FontSize=11px', 'Html=<?= $_FORM->RenderEmailDateReceived($_ITEM); ?>');
			$this->dtgEmailMessageRoute->MetaAddColumn(QQN::EmailMessageRoute()->EmailMessage->FromAddress, 'Width=200px', 'FontSize=11px', 'Html=<?= $_FORM->RenderEmailFromAddress($_ITEM); ?>', 'HtmlEntities=false');
			$this->dtgEmailMessageRoute->MetaAddColumn(QQN::EmailMessageRoute()->EmailMessage->Subject, 'Width=610px', 'FontSize=11px', 'Html=<?= $_FORM->RenderEmailSubject($_ITEM); ?>', 'HtmlEntities=false');

			$this->dtgEmailMessageRoute->SetDataBinder('dtgEmailMessageRoute_Bind', $this);
			$this->dtgEmailMessageRoute->Paginator = new QPaginator($this->dtgEmailMessageRoute);
			$this->dtgEmailMessageRoute->SortColumnIndex = 0;
			$this->dtgEmailMessageRoute->SortDirection = 1;

			$this->dlgEmailMessage = new QDialogBox($this);
			$this->dlgEmailMessage->Template = dirname(__FILE__) . '/dlgEmailMessage.tpl.php';
			$this->dlgEmailMessage->HideDialogBox();

			$this->btnEmailMessage = new QButton($this->dlgEmailMessage);
			$this->btnEmailMessage->Text = 'Close';
			$this->btnEmailMessage->AddAction(new QClickEvent(), new QHideDialogBox($this->dlgEmailMessage));

			$this->pxyEmailMessage = new QControlProxy($this);
			$this->pxyEmailMessage->AddAction(new QClickEvent(), new QAjaxAction('pxyEmailMessage_Click'));
			$this->pxyEmailMessage->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function pxyEmailMessage_Click($strFormId, $strControlId, $strParameter) {
			$objEmailMessageRoute = EmailMessageRoute::Load($strParameter);
			
			if ($objEmailMessageRoute &&
				($objEmailMessageRoute->CommunicationListId == $this->objList->Id)) {
				$this->objSelectedEmailMessageRoute = $objEmailMessageRoute;
				$this->dlgEmailMessage->ShowDialogBox();
			}
		}

		public function dtgEmailMessageRoute_Bind() {
			$this->dtgEmailMessageRoute->MetaDataBinder(QQ::Equal(QQN::EmailMessageRoute()->CommunicationListId, $this->objList->Id), array(QQ::Expand(QQN::EmailMessageRoute()->EmailMessage->Id)));
		}

		public function RenderEmailDateReceived(EmailMessageRoute $objEmailMessageRoute) {
			$objEmailMessage = $objEmailMessageRoute->EmailMessage;

			$dttToCompare = QDateTime::Now(false);
			if ($objEmailMessage->DateReceived->IsEqualTo($dttToCompare)) {
				return 'Today ' . $objEmailMessage->DateReceived->ToString('h:mmz');
			}

			$dttToCompare->Day--;
			if ($objEmailMessage->DateReceived->IsEqualTo($dttToCompare)) {
				return 'Yesterday ' . $objEmailMessage->DateReceived->ToString('h:mmz');
			}

			$dttToCompare->Day -= 6;
			if ($objEmailMessage->DateReceived->IsLaterThan($dttToCompare)) {
				return $objEmailMessage->DateReceived->ToString('DDD h:mmz');
			}

			return $objEmailMessage->DateReceived->ToString('MMM D YYYY');
		}

		public function RenderEmailSubject(EmailMessageRoute $objEmailMessageRoute) {
			$strSubject = QApplication::HtmlEntities($objEmailMessageRoute->EmailMessage->Subject);
			return sprintf('<a href="" %s>%s</a>', $this->pxyEmailMessage->RenderAsEvents($objEmailMessageRoute->Id, false), $strSubject);
		}
		
		public function RenderEmailFromAddress(EmailMessageRoute $objEmailMessageRoute) {
			$strToReturn = $objEmailMessageRoute->EmailMessage->FromAddress;
			if ($objEmailMessageRoute->Login) {
				return $strToReturn;
			} else if ($objEmailMessageRoute->Person) {
				return sprintf('<a href="%s">%s</a>', $objEmailMessageRoute->Person->LinkUrl, $strToReturn);
			}

			return $strToReturn;
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