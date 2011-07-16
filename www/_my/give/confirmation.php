<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class DonationConfirmationForm extends ChmsForm {
		protected $strPageTitle = 'Give Online - Confirmation';
		protected $objOnlineDonation;

		protected $txtUsername;
		protected $txtPassword;
		protected $txtConfirmPassword;
		protected $lstQuestion;
		protected $txtQuestion;
		protected $txtAnswer;
		
		protected function Form_Create() {
			$this->objOnlineDonation = OnlineDonation::Load(QApplication::PathInfo(0));
			if (!$this->objOnlineDonation) QApplication::Redirect('/give/');
			if ($this->objOnlineDonation->Hash != QApplication::PathInfo(1)) QApplication::Redirect('/give/');
			
			// Create the Short-Circuit Registratino form IF:
			// The person donating does not yet have a record AND
			// we still have the email-to-send in Session
			if (array_key_exists('onlineDonationEmailAddress' . $this->objOnlineDonation->Id, $_SESSION) &&
				!$this->objOnlineDonation->Person->PublicLogin) {
				$this->txtPassword = new QTextBox($this);
				$this->txtPassword->Name = 'Select a Password';
				$this->txtPassword->Required = true;
				$this->txtPassword->TextMode = QTextMode::Password;
				$this->txtPassword->Instructions = 'At least 6 characters long';
				
				$this->txtConfirmPassword = new QTextBox($this);
				$this->txtConfirmPassword->Name = 'Confirm Password';
				$this->txtConfirmPassword->Instructions = 'Must match above';
				$this->txtConfirmPassword->Required = true;
				$this->txtConfirmPassword->TextMode = QTextMode::Password;
	
				$this->lstQuestion = new QListBox($this);
				$this->lstQuestion->Name = '"Forgot Password" Question';
				$this->lstQuestion->AddItem('- Select One -', null);
				$this->lstQuestion->AddItem('What city were you born in?', 'What city were you born in?');
				$this->lstQuestion->AddItem('What is the name of your elementary school?', 'What is the name of your elementary school?');
				$this->lstQuestion->AddItem('What street did you grow up on?', 'What street did you grow up on?');
				$this->lstQuestion->AddItem('What is the name of your pet?', 'What is the name of your pet?');
				$this->lstQuestion->AddItem('What was the make and model of your first car?', 'What was the make and model of your first car?');
				$this->lstQuestion->AddItem('- Other... -', false);
				$this->lstQuestion->Required = true;
				$this->lstQuestion->AddAction(new QChangeEvent(), new QAjaxAction('lstQuestion_Refresh'));
	
				$this->txtQuestion = new QTextBox($this);
				$this->txtAnswer = new QTextBox($this);
				$this->txtAnswer->Name = 'Your Answer';
				$this->txtAnswer->Required = true;
				$this->lstQuestion_Refresh();
			}
		}

		public function lstQuestion_Refresh() {
			if ($this->lstQuestion->SelectedValue === false) {
				$this->txtQuestion->Visible = true;
				$this->txtQuestion->Required = true;
			} else {
				$this->txtQuestion->Visible = false;
				$this->txtQuestion->Required = false;
				$this->txtQuestion->Text = null;
			}
		}
	}

	DonationConfirmationForm::Run('DonationConfirmationForm');
?>