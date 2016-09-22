<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class SubmitPrayerForm extends ChmsForm {
		protected $strPageTitle = 'Submit Prayer';
		protected $btnSubmitPrayer;
		protected $txtName;
		protected $txtEmail;
		protected $txtSubject;
		protected $txtContent;
		protected $chkAllowEmail;
		protected $chkSeePrayers;
		protected $chkTerms;

		protected function Form_Create() {	
			$this->txtName = new QTextBox($this);
			$this->txtName->Name = 'Your Name: (not displayed)';
			$this->txtName->Visible = true;
			$this->txtName->Width = 400;
			
			$this->txtEmail = new QTextBox($this);
			$this->txtEmail->Name = 'Your Email: (not displayed)';
			$this->txtEmail->Visible = true;
			$this->txtEmail->Width = 400;
			
			$this->txtSubject = new QTextBox($this);
			$this->txtSubject->Name = 'Prayer Subject:';
			$this->txtSubject->Visible = true;
			$this->txtSubject->Width = 400;
			
			$this->txtContent = new QTextBox($this);
			$this->txtContent->Name = 'Prayer Request:';
			$this->txtContent->Rows = 20;
			$this->txtContent->Columns = 20;
			$this->txtContent->TextMode = QTextMode::MultiLine;
			$this->txtContent->Visible = true;
			
			$this->chkAllowEmail = new QCheckBox($this);
			$this->chkAllowEmail->Name = '';
			$this->chkAllowEmail->Text = 'Allow members to send an encouraging note via email';
			
			$this->chkSeePrayers = new QCheckBox($this);
			$this->chkSeePrayers->Name = '';
			$this->chkSeePrayers->Text = 'Let me know when someone prays for me';
			
			$this->chkTerms = new QCheckBox($this);
			$this->chkTerms->Name = '';
			$this->chkTerms->HtmlEntities = false;
			$this->chkTerms->Text = 'I have read and understood the <a href="terms.html" target="_blank">terms of use</a>';
			
			$this->btnSubmitPrayer = new QButton($this);
			$this->btnSubmitPrayer->Text = 'Submit Prayer Request';
			$this->btnSubmitPrayer->CausesValidation = true;
			$this->btnSubmitPrayer->AddAction(new QClickEvent(), new QAjaxAction('btnSubmitPrayer_Click'));

		}

		protected function Form_Validate() {
			$blnToReturn = true;
		
			if (strlen($this->txtName->Text) <= 0) {
				$this->txtName->Warning = 'Name cannot be empty';
				$blnToReturn = false;
			}
			if (strlen($this->txtEmail->Text) <= 0) {
				$this->txtName->Warning = 'Email cannot be empty';
				$blnToReturn = false;
			}	
			if (strlen($this->txtSubject->Text) <= 0) {
				$this->txtName->Warning = 'Prayer Subject cannot be empty';
				$blnToReturn = false;
			}	
			if (strlen($this->txtContent->Text) <= 0) {
				$this->txtName->Warning = 'Prayer Content cannot be empty';
				$blnToReturn = false;
			}
			if(!$this->chkTerms->Checked) {
				$this->chkTerms->Warning = 'Terms and conditions must be agreed to before continuing.';
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
		
		protected function btnSubmitPrayer_Click($strFormId, $strControlId, $strParameter) {
			// Generate a prayer request object.
			$objPrayer = new PrayerRequest();
			$objPrayer->Email = $this->txtEmail->Text;
			$objPrayer->Name = $this->txtName->Text;
			$objPrayer->Subject = $this->txtSubject->Text;
			$objPrayer->Content = $this->txtContent->Text;
			$objPrayer->IsAllowNotes = $this->chkAllowEmail->Checked;
			$objPrayer->IsConfidential = false;
			$objPrayer->IsInappropriate = false;
			$objPrayer->IsPrayerIndicator = $this->chkSeePrayers->Checked;
			$objNowTime = new DateTime();
			$objPrayer->Date = QDateTime::Now();
			$objPrayer->Save();
			
			//email success
			$this->SendMessage();
			
			// return to prayer page
			QApplication::Redirect('/prayer/complete_submit_prayer.php');
		}
		
		public function SendMessage() {
			// Set debug mode
			QEmailServer::$TestMode = true;
			QEmailServer::$TestModeDirectory = __DOCROOT__ . '/../file_assets/emails';
		
			QEmailServer::$SmtpServer = SMTP_SERVER;
		
			// Create a new message
			// Note that you can list multiple addresses and that Qcodo supports Bcc and Cc
			$objMessage = new QEmailMessage();
			$objMessage->From = 'info@alcf.net <info@alcf.net>';
			$objMessage->To = $this->txtEmail->Text;
			$objMessage->Subject = 'Your Prayer Request has been successfuly submitted.';
		
			// Setup Plaintext Message
			$strBody = "Dear ". $this->txtName->Text .",\r\n\r\n";
			$strBody .= sprintf("You have successfully submitted your prayer request.");
			$strBody .= sprintf("\r\nYou can view your prayer request by selecting the 'View Non-confidential prayer requests' button in the prayer room.");
			$strBody .= sprintf("\r\nIf you selected to view whenever anyone prays for you, you should be able to see the number of people who have prayed for you by observing the indicator when viewing your prayer details.");
			$strBody .= '\r\nRegards, \r\nALCF Communications';
			$objMessage->Body = $strBody;
		
			// Also setup HTML message (optional)
			$strBody = "Dear ".$this->txtName->Text .',<br/><br/>';
			$strBody .= sprintf("You have successfully submitted your prayer request.");
			$strBody .= sprintf("<br>You can view your prayer request by selecting the 'View Non-confidential prayer requests' button in the prayer room.");
			$strBody .= sprintf("<br>If you selected to view whenever anyone prays for you, you should be able to see the number of people who have prayed for you by observing the indicator when viewing your prayer details.");
			$strBody .= '<br>Regards,<br/><b>ALCF Communications</b>';
			$objMessage->HtmlBody = $strBody;
		
			// Add random/custom email headers
			$objMessage->SetHeader('x-application', 'Communications Team');
			QEmailServer::Send($objMessage);
		}
	}

	SubmitPrayerForm::Run('SubmitPrayerForm');
?>