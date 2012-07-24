<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class EditSignupFormForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		/**
		 * @var SignupFormMetaControl
		 */
		protected $mctSignupForm;
		protected $lblHeading;

		protected $lstMinistry;
		protected $txtName;
		protected $txtToken;
		protected $chkActiveFlag;
		protected $chkConfidentialFlag;
		protected $txtDescription;
		protected $txtInformationUrl;
		protected $chkAllowOtherFlag;
		protected $chkAllowMultipleFlag;

		protected $txtFundingAccount;
		protected $lstDonationStewardshipFund;
		
		protected $txtSignupLimit;
		protected $txtSignupMaleLimit;
		protected $txtSignupFemaleLimit;

		protected $txtSupportEmail;
		protected $txtEmailNotification;

		// Child Object for Signup
		protected $mctSignupChild;

		// Event-Specific and ClassMeeting-Specific Controls
		protected $dtxDateStart;
		protected $calDateStart;
		protected $dtxDateEnd;
		protected $calDateEnd;
		protected $txtLocation;

		// Class Meeting-specific Controls
		protected $lstClassTerm;
		protected $lstClassCourse;
		protected $lstClassInstructor;
		protected $lstMeetingDay;
		protected $lstMeetingStartTime;
		protected $lstMeetingEndTime;

		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function Form_Create() {
			$this->lblHeading = new QLabel($this);

			if (QApplication::PathInfo(0)) {
				$objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
				if (!$objSignupForm) QApplication::Redirect('/events/');
				if (!$objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/events/');
				$this->strPageTitle .= 'Edit Form';
				$this->lblHeading->Text = 'Edit ' . $objSignupForm->Type . ' Form';
				
				switch ($objSignupForm->SignupFormTypeId) {
					case SignupFormType::Event:
						$objChild = $objSignupForm->EventSignupForm;
						break;
					case SignupFormType::Course:
						$objChild = $objSignupForm->ClassMeeting;
						break;
					default:
						throw new Exception('Invalid SignupFormTypeId: ' . $objSignupForm->SignupFormTypeId);
				}
			} else {
				if (!QApplication::PathInfo(1)) QApplication::Redirect('/events/');
				$objSignupForm = new SignupForm();
				$objSignupForm->SignupFormTypeId = QApplication::PathInfo(1);
				$objSignupForm->DateCreated = QDateTime::Now();
				$objSignupForm->ActiveFlag = true;
				$this->strPageTitle .= 'Create New Form';
				$this->lblHeading->Text = 'Create New ' . $objSignupForm->Type . ' Form';

				switch ($objSignupForm->SignupFormTypeId) {
					case SignupFormType::Event:
						$objChild = new EventSignupForm();
						break;
					case SignupFormType::Course:
						$objChild = new ClassMeeting();
						break;
					default:
						throw new Exception('Invalid SignupFormTypeId: ' . $objSignupForm->SignupFormTypeId);
				}
			}

			// Setup MCTs for Signup and Child
			$this->mctSignupForm = new SignupFormMetaControl($this, $objSignupForm);
			switch ($objSignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					$this->mctSignupChild = new EventSignupFormMetaControl($this, $objChild);
					break;
				case SignupFormType::Course:
					$this->mctSignupChild = new ClassMeetingMetaControl($this, $objChild);
					break;
				default:
					throw new Exception('Invalid SignupFormTypeId: ' . $objSignupForm->SignupFormTypeId);
			}

			$this->txtName = $this->mctSignupForm->txtName_Create();
			$this->txtName->Select();
			$this->txtName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtName->Required = true;

			$this->txtDescription = $this->mctSignupForm->txtDescription_Create();
			$this->txtInformationUrl = $this->mctSignupForm->txtInformationUrl_Create();

			$this->chkAllowMultipleFlag = $this->mctSignupForm->chkAllowMultipleFlag_Create();
			$this->chkAllowMultipleFlag->Name = 'Allow Multiple Registrations?';
			$this->chkAllowMultipleFlag->Text = 'Check if people are allowed to be registered multiple times.';

			$this->chkAllowOtherFlag = $this->mctSignupForm->chkAllowOtherFlag_Create();
			$this->chkAllowOtherFlag->Name = 'Allow Registering for Others?';
			$this->chkAllowOtherFlag->Text = 'Check if people are allowed to register on behalf of someone else.';
			$this->chkAllowOtherFlag->Visible = false;
			
			$this->chkActiveFlag = $this->mctSignupForm->chkActiveFlag_Create();
			$this->chkActiveFlag->Name = 'Active?';
			$this->chkActiveFlag->Text = 'Check if this is an "Active" form.';

			$this->txtToken = $this->mctSignupForm->txtToken_Create();
			$this->txtToken->Name = 'Custom Signup Web Address';
			$this->txtToken->HtmlBefore = '<span>https://my.alcf.net/signup/event.php / </span>';

			$this->chkConfidentialFlag = $this->mctSignupForm->chkConfidentialFlag_Create();
			$this->chkConfidentialFlag->Name = 'Confidential?';
			$this->chkConfidentialFlag->Text = 'Check if this form is considered a "Confidential" form.';

			$this->txtFundingAccount = $this->mctSignupForm->txtFundingAccount_Create();
			if ($this->mctSignupForm->SignupForm->CountFormProducts()) $this->txtFundingAccount->Required = true;
			
			$this->lstDonationStewardshipFund = $this->mctSignupForm->lstDonationStewardshipFund_Create(null, QQ::Equal(QQN::StewardshipFund()->ActiveFlag, true), QQ::OrderBy(QQN::StewardshipFund()->Name));
			$this->lstDonationStewardshipFund->Name = 'Funding Account for Donations';
			if ($this->mctSignupForm->SignupForm->IsDonationAccepted()) $this->lstDonationStewardshipFund->Required = true;

			// Setup Ministry with Rules			
			if (QApplication::$Login->RoleTypeId == RoleType::ChMSAdministrator) {
				$this->lstMinistry = $this->mctSignupForm->lstMinistry_Create(null, null, QQ::OrderBy(QQN::Ministry()->Name));
			} else {
				$intMinistryIdArray = array();
				foreach (QApplication::$Login->GetMinistryArray() as $objMinistry) $intMinistryIdArray[] = $objMinistry->Id;

				$this->lstMinistry = $this->mctSignupForm->lstMinistry_Create(null, QQ::In(QQN::Ministry()->Id, $intMinistryIdArray), QQ::OrderBy(QQN::Ministry()->Name));
			}

			if ($this->mctSignupForm->EditMode) $this->lstMinistry->Enabled = false;

			// Communciation
			$this->txtSupportEmail = $this->mctSignupForm->txtSupportEmail_Create();
			$this->txtEmailNotification = $this->mctSignupForm->txtEmailNotification_Create();

			// Setup Limit
			$this->txtSignupLimit = $this->mctSignupForm->txtSignupLimit_Create();
			$this->txtSignupLimit->Minimum = 0;
			
			// TODO: Implement Gender-Specific Limits
			$this->txtSignupMaleLimit = $this->mctSignupForm->txtSignupMaleLimit_Create();
			$this->txtSignupMaleLimit->Visible = false;
			$this->txtSignupMaleLimit->Minimum = 0;
			$this->txtSignupFemaleLimit = $this->mctSignupForm->txtSignupFemaleLimit_Create();
			$this->txtSignupFemaleLimit->Minimum = 0;
			$this->txtSignupFemaleLimit->Visible = false;
			
			// Setup Controls for Child
			switch ($objSignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					$this->dtxDateStart = $this->mctSignupChild->dtxDateStart_Create();
					$this->calDateStart = $this->mctSignupChild->calDateStart_Create();
					$this->dtxDateEnd = $this->mctSignupChild->dtxDateEnd_Create();
					$this->calDateEnd = $this->mctSignupChild->calDateEnd_Create();
					$this->txtLocation = $this->mctSignupChild->txtLocation_Create();
					break;

				case SignupFormType::Course:
					$this->lstClassTerm = $this->mctSignupChild->lstClassTerm_Create(
						null,
						QQ::OrCondition(
							QQ::Equal(QQN::ClassTerm()->ActiveFlag, true),
							QQ::Equal(QQN::ClassTerm()->Id, $this->mctSignupChild->ClassMeeting->ClassTermId)
						)
					);
					$this->lstClassCourse = $this->mctSignupChild->lstClassCourse_Create(null, null, QQ::OrderBy(QQN::ClassCourse()->Code));
					$this->lstClassInstructor = $this->mctSignupChild->lstClassInstructor_Create(null, null, QQ::OrderBy(QQN::ClassInstructor()->DisplayName));
					$this->calDateStart = $this->mctSignupChild->calDateStart_Create();
					$this->calDateEnd = $this->mctSignupChild->calDateEnd_Create();
					$this->txtLocation = $this->mctSignupChild->txtLocation_Create();
					$this->lstMeetingDay = $this->mctSignupChild->lstMeetingDay_Create();
					$this->lstMeetingStartTime = $this->mctSignupChild->lstMeetingStartTime_Create();
					$this->lstMeetingEndTime = $this->mctSignupChild->lstMeetingEndTime_Create();
					
					// Make some upates to the default fields
					$this->txtName->Enabled = false;
					$this->lstClassCourse->AddAction(new QChangeEvent(), new QAjaxAction('lstClassCourse_Change'));
					break;

				default:
					throw new Exception('Invalid SignupFormTypeId: ' . $objSignupForm->SignupFormTypeId);
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
			if ($this->mctSignupForm->EditMode) {
				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->CssClass = 'delete';
				
				if ($this->mctSignupForm->SignupForm->CountSignupEntries()) {
					$this->btnDelete->AddAction(new QClickEvent(), new QAlertAction('This signup form already has signup entries and therefore cannot be deleted.  An alternative option would be to simply mark this form as "Inactive".'));
					$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
				} else {
					$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to DELETE this Signup Form?  This cannot be undone.'));
					$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
					$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
				}
			}
		}

		public function btnSave_Click() {
			// Check for unique token
			$strToken = QApplication::Tokenize($this->txtToken->Text);
			if (strlen($strToken)) {
				if (is_numeric($strToken)) {
					$this->txtToken->Warning = 'URL must have more than just numbers';
				}
				if (($objTest = SignupForm::LoadByToken($strToken)) &&
					($objTest->Id != $this->mctSignupForm->SignupForm->Id)) {
					$this->txtToken->Warning = 'URL is already taken';
				}
				if ($this->txtToken->Warning) {
					$this->txtToken->Blink(); $this->txtToken->Focus(); return;
				}
				$this->txtToken->Text = $strToken;
			} else {
				$this->txtToken->Text = null;
			}
			
			$this->mctSignupForm->SaveSignupForm();
			
			// Add Child
			switch ($this->mctSignupForm->SignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					if (!$this->mctSignupChild->EventSignupForm->SignupForm) $this->mctSignupChild->EventSignupForm->SignupForm = $this->mctSignupForm->SignupForm;
					$this->mctSignupChild->SaveEventSignupForm();
					break;
				case SignupFormType::Course:
					if (!$this->mctSignupChild->ClassMeeting->SignupForm) $this->mctSignupChild->ClassMeeting->SignupForm = $this->mctSignupForm->SignupForm;
					$this->mctSignupChild->SaveClassMeeting();
					break;
				default:
					throw new Exception('Invalid SignupFormTypeId: ' . $objSignupForm->SignupFormTypeId);
			}

			// Redirect to View Page
			QApplication::Redirect('/events/form.php/' . $this->mctSignupForm->SignupForm->Id);
		}

		public function btnCancel_Click() {
			if ($this->mctSignupForm->EditMode)
				QApplication::Redirect('/events/form.php/' . $this->mctSignupForm->SignupForm->Id);
			else
				QApplication::Redirect('/events/');
		}

		public function btnDelete_Click() {
			$this->mctSignupForm->SignupForm->DeleteAllFormQuestions();
			if ($this->mctSignupForm->SignupForm->EventSignupForm) $this->mctSignupForm->SignupForm->EventSignupForm->Delete();
			$this->mctSignupForm->DeleteSignupForm();

			QApplication::Redirect('/events/');
		}

		public function lstClassCourse_Change() {
			if ($this->lstClassCourse && $this->lstClassCourse->SelectedValue) {
				$this->txtName->Text = $this->lstClassCourse->SelectedName;
			} else {
				$this->txtName->Text = null;
			}
		}
	}

	EditSignupFormForm::Run('EditSignupFormForm');
?>