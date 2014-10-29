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
							// See if Person exists in Noah, and if so, then associate. Else associate the Communications Entry
							$bFoundPerson = false;
							$emailArray = Email::LoadArrayByAddress($this->txtEmail->Text);
							foreach($emailArray as $email) {
								$objPerson = Person::LoadByPrimaryEmailId($email->Id);
								if($objPerson) {
									if(!$this->objList->IsPersonAssociated($objPerson)) {
										$bFoundPerson = true;
										$this->objList->AssociatePerson($objPerson);
									} else {
										$this->lblMessage->Text .= 'You are already subscribed to the "'.$objItem->Name.'" list';
										$this->lblMessage->ForeColor = 'red';
										$this->lblMessage->Visible = true;
									}
								}								
							}
							if(!$bFoundPerson){
								$this->objList->AssociateCommunicationListEntry($objCommunicationListEntry);
							}
							$strSubscribedList .= $objItem->Name .',';
							$success = true;
						}
					}
				} else {
					$this->lblMessage->Text .= 'You must select a list to subscribe to.';
					$this->lblMessage->ForeColor = 'red';
					$this->lblMessage->Visible = true;
				}
			}
			if ($success) {							
				$strSubscribedList = substr($strSubscribedList,0,strlen($strSubscribedList)-1);
				// Send confirmation email here.
				$this->SendMessage($strSubscribedList);
				QApplication::Redirect('/subscribe/success.php/subscribed/'.urlencode($strSubscribedList));
			}
		}
		
		public function SendMessage($strSubscribedList) {			
			// Set debug mode
			//QEmailServer::$TestMode = true;
			//QEmailServer::$TestModeDirectory = __DOCROOT__ . '/../file_assets/emails';
		
			QEmailServer::$SmtpServer = SMTP_SERVER;
		
			// Create a new message
			// Note that you can list multiple addresses and that Qcodo supports Bcc and Cc
			$objMessage = new QEmailMessage();
			$objMessage->From = 'info@alcf.net <info@alcf.net>';
			$objMessage->To = $this->txtEmail->Text;
			$objMessage->Subject = 'Subscription Confirmation';
		
			// Setup Plaintext Message
			$strBody = "Dear ". $this->txtFirstName->Text .",\r\n\r\n";
			$strBody .= sprintf("You have been successfully subscribed to the %s email list.",$strSubscribedList);
			$strBody .= sprintf("\r\nIf you did not subscribe to the list, please contact info@alcf.net");
			$strBody .= '\r\nRegards, \r\nALCF Communications';
			$objMessage->Body = $strBody;
		
			// Also setup HTML message (optional)
			$strBody = "Dear ".$this->txtFirstName->Text .',<br/><br/>';
			$strBody .= sprintf("You have been successfully subscribed to the %s email list.",$strSubscribedList);
			$strBody .= sprintf("<br>If you did not subscribe to the list, please contact info@alcf.net");
			$strBody .= '<br>Regards,<br/><b>ALCF Communications</b>';
			$objMessage->HtmlBody = $strBody;
		
			// Add random/custom email headers
			$objMessage->SetHeader('x-application', 'Communications Team');
			QEmailServer::Send($objMessage);
		}
		
	}
	
	subscriptionListsForm::Run('subscriptionListsForm');