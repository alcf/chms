<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class subscriptionListsForm extends ChmsForm  {
		protected $objList;
		protected $strInitialToken;
		protected $lstEmailLists;		
		protected $lblListName;
		protected $lblListDecription;
		protected $txtEmail;
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
				$objItemList->Text = $objEmailList->Name;
				if ($objEmailList->Token == $this->strInitialToken) {
					$objItemList->Checked = true;
				}
				$this->chkBtnListArray[] = $objItemList;
			}

			$this->txtEmail = new QTextBox($this);
			$this->txtEmail->Name = 'Email: ';
			$this->txtEmail->Visible = true;
									
			$this->btnUnsubscribe = new QButton($this);
			$this->btnUnsubscribe->Name = 'Unsubscribe';
			$this->btnUnsubscribe->Text = 'Unsubscribe';
			$this->btnUnsubscribe->CssClass = 'primary';
			$this->btnUnsubscribe->AddAction(new QClickEvent(), new QAjaxAction('btnUnsubscribe_Click'));
			
			$this->lblMessage = new QLabel($this);
			$this->lblMessage->FontBold = true;
			$this->lblMessage->ForeColor = 'red';
			$this->lblMessage->Visible = false;
		}
		
		protected function btnUnsubscribe_Click() {
			$objCommunicationListEntry = CommunicationListEntry::LoadByEmail($this->txtEmail->Text);
			$objEmailArray = Email::LoadArrayByAddress($this->txtEmail->Text);
			foreach($objEmailArray as $objEmail) {
				$objPerson = Person::LoadByPrimaryEmailId($objEmail->Id);
				if($objPerson != null) {
					$strUnsubscribedList = '';
					$success = false;
					foreach ($this->chkBtnListArray as $objItem) {
						if ($objItem->Checked) {
							$this->objList = CommunicationList::LoadByToken($objItem->Name);
							if ($this->objList){
								$bFound = false;
								if($this->objList->IsPersonAssociated($objPerson)) {
									$this->objList->UnassociatePerson($objPerson);
									$strUnsubscribedList .= $objItem->Text .',';
									$success = true;
									$bFound = true;
								}
								if(!$bFound) {
									$this->lblMessage->Text = '(Person Entry) You cannot Unsubscribe because you are not subscribed to the '.$objItem->Text.' Mailing List.';
									$this->lblMessage->Visible = true;
								}
							}
						}
					}					
					if ($success) {
						$strUnsubscribedList = substr($strUnsubscribedList,0,strlen($strUnsubscribedList)-1);
						QApplication::Redirect('/unsubscribe/success.php/'.urlencode($strUnsubscribedList));
					}
				}
			}
			if ($objCommunicationListEntry) {
				$strUnsubscribedList = '';
				$success = false;
				$bChecked = false;
				foreach ($this->chkBtnListArray as $objItem) {
					if ($objItem->Checked) {
						$this->objList = CommunicationList::LoadByToken($objItem->Name);
						if ($this->objList){
							$bFound = false;
							if($objCommunicationListEntry != null){
								if($this->objList->IsCommunicationListEntryAssociated($objCommunicationListEntry)) {
									$this->objList->UnassociateCommunicationListEntry($objCommunicationListEntry);
									$strUnsubscribedList .= $objItem->Text .',';
									$success = true;
									$bFound = true;
								} 
							}	
							if(!$bFound) {
								$this->lblMessage->Text = '(CommunicationsEntry) You cannot Unsubscribe because you are not subscribed to the '.$objItem->Text.' Mailing List.';
								$this->lblMessage->Visible = true;
							}
						}
					}
				}			
				if ($success) {
					$strUnsubscribedList = substr($strUnsubscribedList,0,strlen($strUnsubscribedList)-1);
					QApplication::Redirect('/unsubscribe/success.php/'.urlencode($strUnsubscribedList));
				}
			}
			$bChecked = false;
			foreach ($this->chkBtnListArray as $objItem) {
				if ($objItem->Checked) {
					$bChecked = true;
					break;
				}
			}
			if(!$bChecked) {
				$this->lblMessage->Text = 'You must select a list to subscribe to.';
				$this->lblMessage->Visible = true;
			} else {
				$this->lblMessage->Text = 'Failed to unsubscribe from the list. The email may not exist.';
				$this->lblMessage->Visible = true;
			}
		}
	}
	
	subscriptionListsForm::Run('subscriptionListsForm');