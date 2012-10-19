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
		protected $chkBtnListArray;
		
		protected function Form_Create() {
			$this->strInitialToken = QApplication::PathInfo(0);
			if ($this->strInitialToken)
				$this->objList = CommunicationList::LoadByToken($this->strInitialToken);
				
			$this->chkBtnListArray = array();
			foreach (CommunicationList::LoadArrayBySubscribable(true, QQ::OrderBy(QQN::CommunicationList()->Token)) as $objEmailList) {
				$objItemList = new QCheckBox($this);
				$objItemList->Name = $objEmailList->Token;
				$objItemList->Text = $objEmailList->Name .' - '.$objEmailList->Description. "\n";
				if ($objEmailList->Token == $this->strInitialToken) {
					$objItemList->Checked = true;
				}
				$this->chkBtnListArray[] = $objItemList;
			}
			
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
			$this->btnSubscribe->CssClass = 'primary';
			$this->btnSubscribe->Visible = true;
			$this->btnSubscribe->AddAction(new QClickEvent(), new QAjaxAction('btnSubscribe_Click'));
			
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
		
		protected function btnSubscribe_Click() {
			$objCommunicationListEntry = CommunicationListEntry::LoadByEmail($this->txtEmail->Text);
			if (!$objCommunicationListEntry) {
				// create new entry and add to the communications list
				$objCommunicationListEntry = new CommunicationListEntry();
				$objCommunicationListEntry->Email = $this->txtEmail->Text;
				$objCommunicationListEntry->FirstName = $this->txtFirstName->Text;
				$objCommunicationListEntry->LastName = $this->txtLastName->Text;
				$objCommunicationListEntry->Save();
			}
			
			$strSubscribedList = '';
			$success = false;
			foreach ($this->chkBtnListArray as $objItem) {
				if ($objItem->Checked) {
					$this->objList = CommunicationList::LoadByToken($objItem->Name);
					if ($this->objList){
						if($this->objList->IsCommunicationListEntryAssociated($objCommunicationListEntry)) {
							$this->lblMessage->Text .= 'You are already subscribed to the "'.$objItem->Name.'" list';
							$this->lblMessage->ForeColor = 'red';
							$this->lblMessage->Visible = true;
						} else {
							$this->objList->AssociateCommunicationListEntry($objCommunicationListEntry);
							$strSubscribedList .= $objItem->Name .',';
							$success = true;
						}
					}
				}
			}
			if ($success) {
				$strSubscribedList = substr($strSubscribedList,0,strlen($strSubscribedList)-1);
				QApplication::Redirect('/subscribe/success.php/Subscribed/'.urlencode($strSubscribedList));
			}
		}
		
	}
	
	subscriptionListsForm::Run('subscriptionListsForm');