<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class SubmitPraiseForm extends ChmsForm {
		protected $strPageTitle = 'Submit Praise and Thanks';
		protected $btnSubmitPraise;
		protected $txtName;
		protected $txtEmail;
		protected $txtSubject;
		protected $txtContent;		
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
						
			$this->chkTerms = new QCheckBox($this);
			$this->chkTerms->Name = '';
			$this->chkTerms->HtmlEntities = false;
			$this->chkTerms->Text = 'I have read and understood the <a href="terms.html" target="_blank">terms of use</a>';
			
			$this->btnSubmitPraise = new QButton($this);
			$this->btnSubmitPraise->Text = 'Submit Praise and Thanks';
			$this->btnSubmitPraise->CausesValidation = true;
			$this->btnSubmitPraise->AddAction(new QClickEvent(), new QAjaxAction('btnSubmitPraise_Click'));

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
				$this->txtName->Warning = 'Praise Subject cannot be empty';
				$blnToReturn = false;
			}	
			if (strlen($this->txtContent->Text) <= 0) {
				$this->txtName->Warning = 'Praise Content cannot be empty';
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
		
		protected function btnSubmitPraise_Click($strFormId, $strControlId, $strParameter) {
			// Generate a praise object.
			$objPraise = new Praises();
			$objPraise->Email = $this->txtEmail->Text;
			$objPraise->Name = $this->txtName->Text;
			$objPraise->Subject = $this->txtSubject->Text;
			$objPraise->Content = $this->txtContent->Text;
			$objNowTime = new DateTime();
			$objPraise->Date = QDateTime::Now();
			$objPraise->Save();
			
			//email success
			$this->SendMessage();
			
			// return to prayer page
			QApplication::Redirect('/prayer/complete_submit_praise.php');
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
			$objMessage->Subject = 'Your Praise testimony has been successfuly submitted.';
		
			// Setup Plaintext Message
			$strBody = "Dear ". $this->txtName->Text .",\r\n\r\n";
			$strBody .= sprintf("You have successfully submitted your praise testimony.");
			$strBody .= sprintf("\r\nYou can view your praise testimony by selecting the 'Praises and Thanks' button in the prayer room.");
			$strBody .= '\r\nRegards, \r\nALCF Communications';
			$objMessage->Body = $strBody;
		
			// Also setup HTML message (optional)
			$strBody = "Dear ".$this->txtName->Text .',<br/><br/>';
			$strBody .= sprintf("You have successfully submitted your praise testimony.");
			$strBody .= sprintf("<br>You can view your praise testimony by selecting the 'Praises and Thanks' button in the prayer room.");
			$strBody .= '<br>Regards,<br/><b>ALCF Communications</b>';
			$objMessage->HtmlBody = $strBody;
		
			// Add random/custom email headers
			$objMessage->SetHeader('x-application', 'Communications Team');
			QEmailServer::Send($objMessage);
		}
	}

	SubmitPraiseForm::Run('SubmitPraiseForm');
?>