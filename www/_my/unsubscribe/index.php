<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class subscriptionListsForm extends ChmsForm  {
		protected $objList;
		protected $strInitialToken;
		protected $lstEmailLists;		
		protected $lblListName;
		protected $lblListDecription;
		protected $txtEmail;
		protected $lstTerminationReason;
		protected $txtOther;
		protected $btnUnsubscribe;
		protected $lblMessage;
		protected $objAttribute;
		
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
			
			$this->lstTerminationReason = new QListBox($this);
			$this->lstTerminationReason->Name = 'Reason for unsubscribing: ';
			$this->objAttribute = Attribute::QuerySingle(QQ::Equal(QQN::Attribute()->Name, 'Unsubscribe From Church Newsletter'));
			foreach ($this->objAttribute->GetAttributeOptionArray(QQ::OrderBy(QQN::AttributeOption()->Name)) as $objOption)
					$this->lstTerminationReason->AddItem($objOption->Name, $objOption->Id);
			$this->lstTerminationReason->AddItem('- Other... -', -1);
			$this->lstTerminationReason->AddAction(new QChangeEvent(), new QAjaxAction('lstTerminationReason_Change'));

			$this->txtOther = new QTextBox($this);
			$this->txtOther->Name = 'Other';
			$this->txtOther->Visible = false;
			
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
		
		protected function lstTerminationReason_Change() {
			if($this->lstTerminationReason->SelectedValue == -1) {
				$this->txtOther->Visible = true;
			} else {
				$this->txtOther->Visible = false;
			}
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
									
									// If church newletter is the one being unsubscribed, document reason.	
									if ($this->lstTerminationReason->SelectedValue == -1) {
										$objAttributeOption = new AttributeOption();
										$objAttributeOption->AttributeId = $this->objAttributeValue->AttributeId;
										$objAttributeOption->Name = trim($this->txtOther->Text);
										$objAttributeOption->Save();
										
										$objAttributeValue = AttributeValue::LoadByAttributeIdPersonId($this->objAttribute->Id, $objPerson->Id);
										if($objAttributeValue) {
											$objAttributeValue->SingleAttributeOption = $objAttributeOption;
											$objAttributeValue->Save();
										} else {
											$objAttributeValue = new AttributeValue();
											$objAttributeValue->AttributeId = $this->objAttribute->Id;
											$objAttributeValue->PersonId = $objPerson->Id;
											$objAttributeValue->SingleAttributeOption = $objAttributeOption;
											$objAttributeValue->Save();
											$objPerson->AssociateAttributeValue($objAttributeValue);											
										}
									} else {
										$objAttributeValue = AttributeValue::LoadByAttributeIdPersonId($this->objAttribute->Id, $objPerson->Id);
										if($objAttributeValue) { 
											$objAttributeValue->SingleAttributeOptionId = $this->lstTerminationReason->SelectedValue;
											$objAttributeValue->Save();
										} else {
											$objAttributeValue = new AttributeValue();
											$objAttributeValue->AttributeId = $this->objAttribute->Id;
											$objAttributeValue->PersonId = $objPerson->Id;
											$objAttributeValue->SingleAttributeOptionId = $this->lstTerminationReason->SelectedValue;
											$objAttributeValue->Save();
											$objPerson->AssociateAttributeValue($objAttributeValue);
										}
									}
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
						QApplication::Redirect('/unsubscribe/success.php/'.urlencode($strUnsubscribedList).'/'.$objPerson->Id);
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