<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class subscriptionListsForm extends ChmsForm  {
		protected $objList;
		protected $strInitialToken;
		protected $lstEmailLists;		
		protected $lblListName;
		protected $lblListDecription;
		protected $rbnSubscribeSelection;
		protected $txtEmail;
		protected $txtFirstName;
		protected $txtLastName;
		protected $btnSubscribe;
		protected $btnUnsubscribe;
		protected $lblMessage;
		
		protected function Form_Create() {
			$this->strInitialToken = QApplication::PathInfo(0);
			if ($this->strInitialToken)
				$this->objList = CommunicationList::LoadByToken($this->strInitialToken);
	
			$this->lstEmailLists = new QListBox($this);
			$select = false;
			$initialName = '';
			$initialDescription = '';
			foreach (CommunicationList::LoadArrayBySubscribable(true, QQ::OrderBy(QQN::CommunicationList()->Token)) as $objEmailList) {
				if (!$this->strInitialToken && !$select) {
					$this->lstEmailLists->AddItem($objEmailList->Name,$objEmailList->Token,true);
					$select = true;
					$initialName = $objEmailList->Name;
					$initialDescription = $objEmailList->Description;
					$this->objList = CommunicationList::LoadByToken($objEmailList->Token);
				} else {
					if ($objEmailList->Token == $this->strInitialToken) {
						$this->lstEmailLists->AddItem($objEmailList->Name,$objEmailList->Token,true);
						$initialName = $objEmailList->Name;
						$initialDescription = $objEmailList->Description;
					} else
						$this->lstEmailLists->AddItem($objEmailList->Name,$objEmailList->Token);
				}
			}
			$this->lstEmailLists->AddAction(new QClickEvent(), new QAjaxAction('lstEmailLists_Change'));		
			
			$this->lblListName = new QLabel($this);
			$this->lblListName->Name = 'List Name';
			$this->lblListName->Text = $initialName;
			
			$this->lblListDecription = new QLabel($this);
			$this->lblListDecription->Name = 'List description';
			$this->lblListDecription->Text = $initialDescription;

			$this->rbnSubscribeSelection = new QRadioButtonList($this);
			$this->rbnSubscribeSelection->AddAction(new QClickEvent(), new QAjaxAction('lstSubscription_Change'));
			$this->rbnSubscribeSelection->Name = 'Leave or Join the Mailing List';
			$this->rbnSubscribeSelection->AddItem('Opt-in to the Mailing List', 1, true);
			$this->rbnSubscribeSelection->AddItem('Opt-Out of the Mailing List', 2);
			
			$this->txtEmail = new QTextBox($this);
			$this->txtEmail->Name = 'Email: ';
			$this->txtEmail->Visible = true;
			
			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'First Name: ';
			$this->txtFirstName->Visible = true;
			
			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Last Name';
			$this->txtLastName->Visible = true;
			
			$this->btnSubscribe = new QButton($this);
			$this->btnSubscribe->Name = 'Subscribe';
			$this->btnSubscribe->Text = 'Subscribe';
			$this->btnSubscribe->Visible = true;
			$this->btnSubscribe->AddAction(new QClickEvent(), new QAjaxAction('btnSubscribe_Click'));
			
			$this->btnUnsubscribe = new QButton($this);
			$this->btnUnsubscribe->Name = 'Unsubscribe';
			$this->btnUnsubscribe->Text = 'Unsubscribe';
			$this->btnUnsubscribe->Visible = false;
			$this->btnUnsubscribe->AddAction(new QClickEvent(), new QAjaxAction('btnUnsubscribe_Click'));
			
			$this->lblMessage = new QLabel($this);
			$this->lblMessage->FontBold = true;
			$this->lblMessage->Visible = false;
		}
		
		protected function lstEmailLists_Change() {
			$this->strInitialToken = $this->lstEmailLists->SelectedItem->Value;
			$this->objList = CommunicationList::LoadByToken($this->strInitialToken);
			if($this->objList) {
				$this->lblListName->Text = $this->objList->Name;
				$this->lblListDecription->Text = $this->objList->Description;
			}
		}
		
		protected function lstSubscription_Change() {
			switch ($this->rbnSubscribeSelection->SelectedValue) {
				case 1: // Opt-In
					$this->txtEmail->Visible = true;
					$this->txtFirstName->Visible = true;
					$this->txtLastName->Visible = true;
					$this->btnSubscribe->Visible = true;
					$this->btnUnsubscribe->Visible = false;
					$this->lblMessage->Visible = false;
					break;
				case 2: // Opt- Out
					$this->txtEmail->Visible = true;
					$this->txtFirstName->Visible = false;
					$this->txtLastName->Visible = false;
					$this->btnSubscribe->Visible = false;
					$this->btnUnsubscribe->Visible = true;
					$this->lblMessage->Visible = false;
					break;
				default:
				break;
			}
		}
		
		protected function btnSubscribe_Click() {
			$objCommunicationListEntry = CommunicationListEntry::LoadByEmail($this->txtEmail->Text);
			if ($objCommunicationListEntry) {
				if($this->objList->IsCommunicationListEntryAssociated($objCommunicationListEntry)) {
					$this->lblMessage->Text = 'You are already subscribed to this list';
					$this->lblMessage->ForeColor = 'red';
					$this->lblMessage->Visible = true;
				} else {
					$this->objList->AssociateCommunicationListEntry($objCommunicationListEntry);
					QApplication::Redirect('/subscribe/success.php/Subscribed/'.urlencode($this->lblListName->Text));					
				}
			} else {
				// create new entry and add to the communications list
				$objCommunicationListEntry = new CommunicationListEntry();
				$objCommunicationListEntry->Email = $this->txtEmail->Text;
				$objCommunicationListEntry->FirstName = $this->txtFirstName->Text;
				$objCommunicationListEntry->LastName = $this->txtLastName->Text;
				$objCommunicationListEntry->Save();
				$this->objList->AssociateCommunicationListEntry($objCommunicationListEntry);
				QApplication::Redirect('/subscribe/success.php/Subscribed/'.urlencode($this->lblListName->Text));
			}
		}
		
		protected function btnUnsubscribe_Click() {
			$objCommunicationListEntry = CommunicationListEntry::LoadByEmail($this->txtEmail->Text);
			if ($objCommunicationListEntry) {
				if($this->objList->IsCommunicationListEntryAssociated($objCommunicationListEntry)) {
					$this->objList->UnassociateCommunicationListEntry($objCommunicationListEntry);
					QApplication::Redirect('/subscribe/success.php/Unsubscribed/'.urlencode($this->lblListName->Text));
				} else {
					$this->lblMessage->Text = 'You cannot Opt-Out because you are not subscribed to this list.';
					$this->lblMessage->Visible = true;
				}
			} else {
				$this->lblMessage->Text = 'You cannot Opt-Out because you are not subscribed to this list.';
				$this->lblMessage->Visible = true;
			}
		}
	}
	
	subscriptionListsForm::Run('subscriptionListsForm');