<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class SendNoteForm extends ChmsForm {
		protected $strPageTitle = 'Send a note of encouragement';
		protected $btnSubmitNote;
		protected $txtSubject;
		protected $txtNote;
		protected $objPrayerRequest;

		protected function Form_Create() {	
			$this->objPrayerRequest = PrayerRequest::Load(QApplication::PathInfo(0));			
			$this->txtSubject = new QTextBox($this);
			$this->txtSubject->Name = 'Prayer Subject:';
			$this->txtSubject->Visible = true;
			$this->txtSubject->Width = 400;
			$this->txtSubject->Enabled = false;
			if($this->objPrayerRequest != null){
				$this->txtSubject->Text ='RE: '.$this->objPrayerRequest->Subject;
			}
			
			$this->txtNote = new QTextBox($this);
			$this->txtNote->Name = 'Note:';
			$this->txtNote->Rows = 20;
			$this->txtNote->Columns = 20;
			$this->txtNote->TextMode = QTextMode::MultiLine;
			$this->txtNote->Visible = true;
												
			$this->btnSubmitNote = new QButton($this);
			$this->btnSubmitNote->Text = 'Submit Note';
			$this->btnSubmitNote->CausesValidation = true;
			$this->btnSubmitNote->AddAction(new QClickEvent(), new QAjaxAction('btnSubmitNote_Click'));

		}

		protected function Form_Validate() {
			$blnToReturn = true;
			if (strlen($this->txtNote->Text) <= 0) {
				$this->txtNote->Warning = 'Note cannot be empty';
				$blnToReturn = false;
			}
			$blnFirst = true;
			foreach ($this->GetErrorControls() as $objControl) {
				if ($blnFirst) {
					$blnFirst = false;
					$objControl->Focus();
				}
				$objControl->Blink();
			}
		
			return $blnToReturn;
		}
		
		protected function btnSubmitNote_Click($strFormId, $strControlId, $strParameter) {			
			//email success
			$status = $this->SendMessage();
			
			// return to prayer page
			QApplication::Redirect('/prayer/complete_send_note.php/'.$status);
		}
		
		public function SendMessage() {
			// Set debug mode
			//QEmailServer::$TestMode = true;
			//QEmailServer::$TestModeDirectory = __DOCROOT__ . '/../file_assets/emails';
		
			QEmailServer::$SmtpServer = SMTP_SERVER;
		
			// Create a new message
			// Note that you can list multiple addresses and that Qcodo supports Bcc and Cc
			if($this->objPrayerRequest) {
				$objMessage = new QEmailMessage();
				$objMessage->From = 'info@alcf.net <info@alcf.net>';
				$objMessage->To = $this->objPrayerRequest->Email;
				$objMessage->Subject = $this->txtSubject->Text;
			
				// Setup Plaintext Message
				$strBody = "Dear ". $this->objPrayerRequest->Name.",\r\n\r\n";
				$strBody .= sprintf("Someone has sent you a note of encouragement regarding your prayer request.");
				$strBody .= sprintf("\r\nYou can view their note below.");
				$strBody .= '\r\nRegards, \r\nALCF Communications\r\n\r\n';
				$strBody .= $this->txtNote->Text;
				$objMessage->Body = $strBody;
			
				// Also setup HTML message (optional)
				$strBody = "Dear ".$this->objPrayerRequest->Name .',<br/><br/>';
				$strBody .= sprintf("Someone has sent you a note of encouragement regarding your prayer request.");
				$strBody .= sprintf("<br>You can view their note below.");
				$strBody .= '<br>Regards,<br/><b>ALCF Communications</b><br><br>';
				$strBody .= '<p>'.$this->txtNote->Text.'</p>';
				$objMessage->HtmlBody = $strBody;
			
				// Add random/custom email headers
				$objMessage->SetHeader('x-application', 'Communications Team');
				QEmailServer::Send($objMessage);
				return 1;
			} else
				return 0;
		}
	}

	SendNoteForm::Run('SendNoteForm');
?>