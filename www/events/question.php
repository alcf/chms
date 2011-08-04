<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class FormQuestionEditForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		protected $objSignupForm;
		protected $mctQuestion;
		
		protected $lblHeading;
		
		protected $lblFormQuestionType;
		protected $txtShortDescription;
		protected $txtQuestion;
		protected $chkRequiredFlag;

		protected $txtOptions;
		protected $chkAllowOtherFlag;

		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;
		
		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			$this->lblHeading = new QLabel($this);

			if (!$this->objSignupForm) QApplication::Redirect('/events/');
			if (!$this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);

			if (QApplication::PathInfo(1)) {
				$objQuestion = FormQuestion::Load(QApplication::PathInfo(1));
				if (!$objQuestion) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
				if ($objQuestion->SignupFormId != $this->objSignupForm->Id) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
				$this->strPageTitle .= 'Edit Question';
				$this->lblHeading->Text = 'Edit ' . $objQuestion->Type . ' Question';
			} else {
				if (!QApplication::PathInfo(2)) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
				$objQuestion = new FormQuestion();
				$objQuestion->SignupForm = $this->objSignupForm;
				$objQuestion->FormQuestionTypeId = QApplication::PathInfo(2);
				$objQuestion->OrderNumber = 100000;
				$this->strPageTitle .= 'Create New Question';
				$this->lblHeading->Text = 'Create New ' . $objQuestion->Type . ' Question';
				
				// Pre-setup certain fields based on type
				switch ($objQuestion->FormQuestionTypeId) {
					case FormQuestionType::SpouseName:
						$objQuestion->ShortDescription = 'Spouse\'s Name';
						$objQuestion->Question = 'Spouse\'s Name';
						break;
	
					case FormQuestionType::Address:
						$objQuestion->ShortDescription = 'Home Address';
						$objQuestion->Question = 'Home Address';
						break;
	
					case FormQuestionType::Age:
						$objQuestion->ShortDescription = 'Age';
						$objQuestion->Question = 'Age';
						break;
	
					case FormQuestionType::DateofBirth:
						$objQuestion->ShortDescription = 'Date of Birth';
						$objQuestion->Question = 'Date of Birth';
						break;
	
					case FormQuestionType::Gender:
						$objQuestion->ShortDescription = 'Gender';
						$objQuestion->Question = 'Gender';
						break;
	
					case FormQuestionType::Phone:
						$objQuestion->ShortDescription = 'Phone Number';
						$objQuestion->Question = 'Phone Number';
						break;
	
					case FormQuestionType::Email:
						$objQuestion->ShortDescription = 'Email Address';
						$objQuestion->Question = 'Email Address';
						break;
				}
			}

			$this->mctQuestion = new FormQuestionMetaControl($this, $objQuestion);

			// Fields
			$this->lblFormQuestionType = $this->mctQuestion->lblFormQuestionTypeId_Create();
			$this->txtShortDescription = $this->mctQuestion->txtShortDescription_Create();
			$this->txtShortDescription->Required = true;
			$this->txtShortDescription->Instructions = 'This is the label that will show up on reports and forms';
			$this->txtQuestion = $this->mctQuestion->txtQuestion_Create();
			$this->txtQuestion->Required = true;
			$this->txtQuestion->Instructions = 'This is the label that will show up on the signup form online';
			$this->chkRequiredFlag = $this->mctQuestion->chkRequiredFlag_Create();
			$this->chkRequiredFlag->Name = 'Answer Required?';
			$this->chkRequiredFlag->Text = 'Check if an answer to this question is required';

			$this->txtOptions = $this->mctQuestion->txtOptions_Create();
			$this->chkAllowOtherFlag = $this->mctQuestion->chkAllowOtherFlag_Create();

			// Field options based on type
			switch ($intFormQuestionTypeId = $this->mctQuestion->FormQuestion->FormQuestionTypeId) {
				case FormQuestionType::SpouseName:
				case FormQuestionType::Address:
				case FormQuestionType::Age:
				case FormQuestionType::DateofBirth:
				case FormQuestionType::Gender:
				case FormQuestionType::Phone:
				case FormQuestionType::Email:
				case FormQuestionType::ShortText:
				case FormQuestionType::LongText:
				case FormQuestionType::Number:
					$this->txtOptions->Text = null;
					$this->txtOptions->Required = false;
					$this->txtOptions->Visible = false;
					$this->chkAllowOtherFlag->Checked = false;
					$this->chkAllowOtherFlag->Required = false;
					$this->chkAllowOtherFlag->Visible = false;
					break;

				case FormQuestionType::YesNo:
					$this->txtOptions->TextMode = QTextMode::SingleLine;
					$this->txtOptions->Name = 'Text by the Checkbox';
					$this->txtOptions->Required = false;
					$this->txtOptions->Visible = true;
					$this->chkAllowOtherFlag->Checked = false;
					$this->chkAllowOtherFlag->Required = false;
					$this->chkAllowOtherFlag->Visible = false;
					$this->chkRequiredFlag->Text = 'Check if the registrant is <strong>REQUIRED</strong> check &quot;yes&quot;';
					$this->chkRequiredFlag->HtmlEntities = false;
					break;

				case FormQuestionType::SingleSelect:
				case FormQuestionType::MultipleSelect:
					$this->txtOptions->Required = true;
					$this->txtOptions->Visible = true;
					$this->chkAllowOtherFlag->Required = false;
					$this->chkAllowOtherFlag->Visible = true;
					break;

				case FormQuestionType::Instructions:
					$this->txtOptions->Name = 'Instructions Text';
					$this->txtOptions->Required = true;
					$this->txtOptions->Visible = true;
					$this->chkAllowOtherFlag->Checked = false;
					$this->chkAllowOtherFlag->Required = false;
					$this->chkAllowOtherFlag->Visible = false;
					$this->chkRequiredFlag->Visible = false;
					
					$this->txtShortDescription->Text = '(instructions)';
					$this->txtShortDescription->Visible = false;

					$this->chkRequiredFlag->Visible = false;
					$this->txtQuestion->Name = 'Label';
					$this->txtQuestion->Instructions = null;
					$this->txtQuestion->Required = false;
					break;

				default:
					throw new Exception(sprintf('Invalid intFormQuestionTypeId: %s', $intFormQuestionTypeId));
			}

			// Buttons
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->CausesValidation = true;
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			
			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

			// Delete?
			if ($this->mctQuestion->EditMode) {
				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->CssClass = 'delete';
				
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to DELETE this Signup Form?  Any responsese from existing registrations will be deleted as well, and this cannot be undone.'));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}	
		}
		
		protected function btnSave_Click() {
			$this->mctQuestion->SaveFormQuestion();
			FormQuestion::RefreshOrderNumber($this->objSignupForm->Id);
			QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
		}
		
		protected function btnCancel_Click() {
			QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
		}
			
		protected function btnDelete_Click() {
			$this->mctQuestion->FormQuestion->DeleteAllFormAnswers();
			$this->mctQuestion->DeleteFormQuestion();
			FormQuestion::RefreshOrderNumber($this->objSignupForm->Id);
			QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
		}
	}
	
	FormQuestionEditForm::Run('FormQuestionEditForm');
?>