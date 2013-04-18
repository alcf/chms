<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class subscriptionSuccessForm extends ChmsForm  {
		protected $lblMessage;
		protected $btnReturnToSubscribe;
		protected $lblExitMembership;
		protected $chkMemberExit;
		protected $lstTermination;
		protected $txtTermination;
		protected $btnSubmitMemberExit;
		protected $objPersonId;
		
		protected function Form_Create() {
			$this->lblMessage = new QLabel($this);
			$this->lblMessage->Text = 'You have successfully unsubscribed from the '. urldecode(QApplication::PathInfo(0)) . ' Email List/s';
			$this->btnReturnToSubscribe = new QButton($this);
			$this->btnReturnToSubscribe->Text = 'Subscribe to additional Mailing Lists';
			$this->btnReturnToSubscribe->CssClass = 'primary';
			$this->btnReturnToSubscribe->CausesValidation = false;
			$this->btnReturnToSubscribe->AddAction(new QClickEvent(), new QAjaxAction('btnReturnToSubscribe_Click', null, true));

			// If a person ID was provided, check to see if they are an alcf member
			// If they are, check to see whether they also are leaving the church
			$this->lblExitMembership = new QLabel($this);
			$this->lblExitMembership->HtmlEntities = false;
			$this->lblExitMembership->Text = '<p>We notice that you\'re unsubscribing from the church newsletter email list.</p>'.
			                                    '<p>If you also no longer plan on attending ALCF, would you like us to update your information accordingly?<br>'.
			                                    'Make the appropriate selections below and we will update your records as requested.</p>';
			$this->lblExitMembership->Visible = false;
			$this->chkMemberExit = new QRadioButtonList($this);
			$this->chkMemberExit->AddItem('Remove me from ALCF Membership', true);
			$this->chkMemberExit->AddItem('Remove my household from ALCF Membership', false);
			$this->chkMemberExit->Visible = false;
			$this->lstTermination = new QListBox($this);
			$this->lstTermination->Name = 'Reason for Termination';
			$this->lstTermination->AddItem('- Select One -', null);
			if ($strTerminationReasons = Registry::GetValue('membership_termination_reason')) {
				foreach (explode(',', $strTerminationReasons) as $strReason) {
					$strReason = trim($strReason);
					$this->lstTermination->AddItem($strReason, $strReason);
				}
			}
			$this->lstTermination->AddItem('- Other... -', -1);
			$this->lstTermination->Visible = false;
			$this->lstTermination->AddAction(new QChangeEvent(), new QAjaxAction('lstTermination_Change'));
			
			// Setup "Other" textbox
			$this->txtTermination = new QTextBox($this);
			$this->txtTermination->Name = '&nbsp;';
			$this->txtTermination->Visible = false;
			
			$this->btnSubmitMemberExit = new QButton($this);
			$this->btnSubmitMemberExit->Text = 'Submit Request';
			$this->btnSubmitMemberExit->CssClass = 'primary';
			$this->btnSubmitMemberExit->Visible = false;
			$this->btnSubmitMemberExit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmitMemberExit_Click'));
			$this->objPersonId = QApplication::PathInfo(1);
			if($this->objPersonId) {
				$objPerson = Person::Load($this->objPersonId);
				if($objPerson->CurrentMembershipInfo) {
					$this->lblExitMembership->Visible = true;
					$this->chkMemberExit->Visible = true;
					$this->lstTermination->Visible = true;
					$this->btnSubmitMemberExit->Visible = true;
				}
			}
		}
		
		protected function btnReturnToSubscribe_Click() {
			QApplication::Redirect('/subscribe/index.php');
		}
		
		protected function lstTermination_Change() {
			if ($this->lstTermination->SelectedValue == -1) {
				$this->txtTermination->Visible = true;
			} else {
				$this->txtTermination->Visible = false;
			}
		}
		protected function btnSubmitMemberExit_Click() {
			// First remove the person.
			$objMembershipArray = Membership::LoadArrayByPersonId($this->objPersonId);
			if($objMembershipArray) {
				foreach($objMembershipArray as $objMembership) {
					$objMembership->DateEnd = QDateTime::Now(false);
					if ($this->lstTermination->SelectedValue == -1) {
						$objMembership->TerminationReason = trim($this->txtTermination->Text);
					} else {
						$objMembership->TerminationReason = $this->lstTermination->SelectedValue;
					}
					$objMembership->Save();
				}
			}
			
			// Determine if we also need to remove entire household.
			if($this->chkMemberExit->SelectedValue == false) {	
				$objPerson = Person::Load($this->objPersonId);
				$objHouseholdParticipation = $objPerson->GetHouseholdParticipationArray();		
				foreach($objHouseholdParticipation as $objParticipant) {
					if($objParticipant->PersonId != $this->objPersonId) {
						$objMembershipArray = Membership::LoadArrayByPersonId($objParticipant->PersonId);
						if($objMembershipArray) {
							foreach($objMembershipArray as $objMembership) {
								$objMembership->DateEnd = QDateTime::Now();
								if ($this->lstTermination->SelectedValue == -1) {
									$objMembership->TerminationReason = trim($this->txtTermination->Text);
								} else {
									$objMembership->TerminationReason = $this->lstTermination->SelectedValue;
								}
								$objMembership->Save();
							}
						}
					}		
				}	
			}
			//Send notification to administrator indicating  people have been "ummembered"
			$this->SendNotification();
			QApplication::Redirect('/unsubscribe/removedMember.php/'.QApplication::PathInfo(0));
		}
		
		public function SendNotification() {
			$objPerson = Person::Load($this->objPersonId);
			$email = '';
			if($objPerson->PrimaryEmail->Address)
				$email = $objPerson->PrimaryEmail->Address;
			else 
				$email = $objPerson->_Email->Address;
			
			// Set debug mode
			//QEmailServer::$TestMode = true;
			//QEmailServer::$TestModeDirectory = __DOCROOT__ . '/../file_assets/emails';
				
			QEmailServer::$SmtpServer = SMTP_SERVER;
				
			// Create a new message
			// Note that you can list multiple addresses and that Qcodo supports Bcc and Cc
			$objMessage = new QEmailMessage();
			$objMessage->From = 'Christina Alo <christina.alo@alcf.net>';
			$objMessage->To = 'Christina <christina.alo@alcf.net>';
			$objMessage->Subject = 'Notification of Exiting Members';
				
			// Setup Plaintext Message
			$strBody = "Hello Administrator (Christina)!\r\n\r\n";
			$strBody .= 'r\n';
			$strBody .= 'Someone just unsubscribed from the church newsletter and closed their membership.\r\n\r\n';
			$strBody .= sprintf("Their Details:\r\n%s %s\r\nemail: %s \r\n\r\n",$objPerson->FirstName,$objPerson->LastName,$email);
			$strBody .= 'Blessings,\r\n Noah.';
			$objMessage->Body = $strBody;
				
			// Also setup HTML message (optional)
			$strBody = "Hello Administrator (Christina)!<br><br>";
			$strBody .= 'Someone just unsubscribed from the church newsletter and closed their membership.<br><br>';
			$strBody .= sprintf("Their Details:<br>%s %s<br>email: %s<br><br>",$objPerson->FirstName,$objPerson->LastName,$email);
			$strBody .= 'Blessings,<br> Noah.';
				
			$objMessage->HtmlBody = $strBody;
				
			// Add random/custom email headers
			$objMessage->SetHeader('x-application', 'Church Newsletter Administration');
			QEmailServer::Send($objMessage);
		}
	}
	
	subscriptionSuccessForm::Run('subscriptionSuccessForm');
?>
