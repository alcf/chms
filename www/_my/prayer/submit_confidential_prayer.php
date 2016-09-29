<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class SubmitConfidentialPrayerForm extends ChmsForm {
		protected $strPageTitle = 'Submit Confidential Prayer';
		protected $btnSubmitPrayer;
		protected $txtName;
		protected $txtContent;

		protected function Form_Create() {	
			$this->txtName = new QTextBox($this);
			$this->txtName->Name = 'Your Name: (not displayed)';
			$this->txtName->Visible = true;
			//$this->txtName->Width = 400;
			
			$this->txtContent = new QTextBox($this);
			$this->txtContent->Name = 'Prayer Request:';
			$this->txtContent->Rows = 10;
			$this->txtContent->Columns = 10;
			$this->txtContent->TextMode = QTextMode::MultiLine;
			$this->txtContent->Visible = true;
			//$this->txtContent->Width = 400;
									
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

			if (strlen($this->txtContent->Text) <= 0) {
				$this->txtName->Warning = 'Prayer Content cannot be empty';
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
			$objPrayer->Email = '';
			$objPrayer->Name = $this->txtName->Text;
			$objPrayer->Subject = '';
			$objPrayer->Content = $this->txtContent->Text;
			$objPrayer->IsAllowNotes = false;
			$objPrayer->IsConfidential = true;
			$objPrayer->IsInappropriate = false;
			$objPrayer->IsPrayerIndicator = false;
			$objNowTime = new DateTime();
			$objPrayer->Date = QDateTime::Now();
			$objPrayer->Save();
			
			$this->SendMessage();
			
			// return to prayer page
			QApplication::Redirect('/prayer/complete_confidential_prayer.php');
		}
		
		public function SendMessage() {
			// Set debug mode
			//QEmailServer::$TestMode = true;
			//QEmailServer::$TestModeDirectory = __DOCROOT__ . '/../file_assets/emails';
		
			QEmailServer::$SmtpServer = SMTP_SERVER;
		
			// Create a new message
			// Note that you can list multiple addresses and that Qcodo supports Bcc and Cc
			$objMessage = new QEmailMessage();
			$objMessage->From = 'info@alcf.net <info@alcf.net>';
			$objMessage->To = 'geraldine.hill@alcf.net  <geraldine.hill@alcf.net >'; // send to prayer team
			$objMessage->Subject = 'A Confidential Prayer Request was submitted.';
		
			// Setup Plaintext Message
			$strBody = "Dear Prayer Team,\r\n\r\n";
			$strBody .= sprintf("The following confidential prayer request was submitted:\r\n");
			$strBody .= sprintf($this->txtContent->Text .'\r\n');
			$strBody .= '\r\nRegards, \r\nALCF Communications';
			$objMessage->Body = $strBody;
		
			// Also setup HTML message (optional)
			$strBody = "Dear Prayer Team,<br/><br/>";
			$strBody .= sprintf("The following confidential prayer request was submitted:<br>");
			$strBody .= sprintf($this->txtContent->Text."<br>");
			$strBody .= '<br>Regards,<br/><b>ALCF Communications</b>';
			$objMessage->HtmlBody = $strBody;
		
			// Add random/custom email headers
			$objMessage->SetHeader('x-application', 'Communications Team');
			QEmailServer::Send($objMessage);
		}
		
	}

	SubmitConfidentialPrayerForm::Run('SubmitConfidentialPrayerForm');
?>