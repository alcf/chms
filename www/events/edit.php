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

		protected $txtSignupLimit;
		protected $txtSignupMaleLimit;
		protected $txtSignupFemaleLimit;

		// Child Object for Signup
		protected $mctSignupChild;
		// Event-Specific
		protected $dtxDateStart;
		protected $calDateStart;
		protected $dtxDateEnd;
		protected $calDateEnd;
		protected $txtLocation;

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
			
			$this->chkActiveFlag = $this->mctSignupForm->chkActiveFlag_Create();
			$this->chkActiveFlag->Name = 'Active?';
			$this->chkActiveFlag->Text = 'Check if this is an "Active" form.';

			$this->txtToken = $this->mctSignupForm->txtToken_Create();
			$this->txtToken->Name = 'Custom Signup Web Address';
			$this->txtToken->HtmlBefore = '<span>https://my.alcf.net/signup/form.php / </span>';

			$this->chkConfidentialFlag = $this->mctSignupForm->chkConfidentialFlag_Create();
			$this->chkConfidentialFlag->Name = 'Confidential?';
			$this->chkConfidentialFlag->Text = 'Check if this form is considered a "Confidential" form.';

			// Setup Ministry with Rules			
			if (QApplication::$Login->RoleTypeId == RoleType::ChMSAdministrator) {
				$this->lstMinistry = $this->mctSignupForm->lstMinistry_Create(null, null, QQ::OrderBy(QQN::Ministry()->Name));
			} else {
				$intMinistryIdArray = array();
				foreach (QApplication::$Login->GetMinistryArray() as $objMinistry) $intMinistryIdArray[] = $objMinistry->Id;

				$this->lstMinistry = $this->mctSignupForm->lstMinistry_Create(null, QQ::In(QQN::Ministry()->Id, $intMinistryIdArray), QQ::OrderBy(QQN::Ministry()->Name));
			}

			if ($this->mctSignupForm->EditMode) $this->lstMinistry->Enabled = false;

			// Setup Limit
			$this->txtSignupLimit = $this->mctSignupForm->txtSignupLimit_Create();
			$this->txtSignupLimit->Minimum = 0;
			$this->txtSignupMaleLimit = $this->mctSignupForm->txtSignupMaleLimit_Create();
			$this->txtSignupMaleLimit->Minimum = 0;
			$this->txtSignupFemaleLimit = $this->mctSignupForm->txtSignupFemaleLimit_Create();
			$this->txtSignupFemaleLimit->Minimum = 0;

			// Setup Controls for Child
			switch ($objSignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					$this->dtxDateStart = $this->mctSignupChild->dtxDateStart_Create();
					$this->calDateStart = $this->mctSignupChild->calDateStart_Create();
					$this->dtxDateEnd = $this->mctSignupChild->dtxDateEnd_Create();
					$this->calDateEnd = $this->mctSignupChild->calDateEnd_Create();
					$this->txtLocation = $this->mctSignupChild->txtLocation_Create();
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
	}

	EditSignupFormForm::Run('EditSignupFormForm');
?>