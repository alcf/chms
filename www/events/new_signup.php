<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class SearchGroupsForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups - Create New Signup - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		/**
		 * @var SignupForm
		 */
		protected $objSignupForm;
		protected $pnlSelectPerson;
		protected $btnNext;
		protected $btnCancel;
		
		protected $dlgMessage;
		protected $btnDialogOkay;
		protected $btnDialogCancel;

		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			if (!$this->objSignupForm) QApplication::Redirect('/events/');
			if (!$this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/events/');

			$this->strPageTitle .= $this->objSignupForm->Name;

			$this->pnlSelectPerson = new SelectPersonPanel($this);
			$this->pnlSelectPerson->Name = 'Person Name';
			$this->pnlSelectPerson->AllowCreate = true;
			$this->pnlSelectPerson->Required = true;

			$this->pnlSelectPerson->txtName->Focus();
			
			$this->btnNext = new QButton($this);
			$this->btnNext->Text = 'Next';
			$this->btnNext->CausesValidation = true;
			$this->btnNext->CssClass = 'primary';
			$this->btnNext->AddAction(new QClickEvent(), new QAjaxAction('btnNext_Click'));
			
			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->dlgMessage = new QDialogBox($this);
			$this->dlgMessage->MatteClickable = false;
			$this->dlgMessage->HideDialogBox();
			$this->dlgMessage->AutoRenderChildren  = true;

			$this->btnDialogOkay = new QButton($this->dlgMessage);
			$this->btnDialogOkay->Text = 'Okay';
			$this->btnDialogOkay->CssClass = 'primary';
			$this->btnDialogOkay->AddAction(new QClickEvent(), new QAjaxAction('btnDialogOkay_Click'));
			
			$this->btnDialogCancel = new QLinkButton($this->dlgMessage);
			$this->btnDialogCancel->Text = 'Cancel';
			$this->btnDialogCancel->CssClass = 'cancel';
			$this->btnDialogCancel->AddAction(new QClickEvent(), new QAjaxAction('btnDialogCancel_Click'));
			$this->btnDialogCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function btnNext_Click() {
			$objPerson = $this->pnlSelectPerson->Person;
			$objSignupEntryArray = SignupEntry::QueryArray(QQ::AndCondition(
				QQ::Equal(QQN::SignupEntry()->SignupFormId, $this->objSignupForm->Id),
				QQ::Equal(QQN::SignupEntry()->PersonId, $objPerson->Id)));

			$blnAlreadyRegisteredFlag = false;
			$blnAlreadyCancelledFlag = false;

			$objIncomplete = null;

			foreach ($objSignupEntryArray as $objSignupEntry) {
				switch ($objSignupEntry->SignupEntryStatusTypeId) {
					case SignupEntryStatusType::Incomplete:
						if (!$objIncomplete) $objIncomplete = $objSignupEntry;
						break;
					case SignupEntryStatusType::Complete:
						$blnAlreadyRegisteredFlag = true;
						break;
					case SignupEntryStatusType::Cancelled:
						$blnAlreadyCancelledFlag = true;
						break;
				}
			}

			if ($blnAlreadyRegisteredFlag) {
				$this->dlgMessage->Text = 'This person has already registered.  Are you sure you want to create a new registration entry for this person?<br/><br/>';
				$this->dlgMessage->ShowDialogBox();
				return;
			} else if ($blnAlreadyCancelledFlag) {
				$this->dlgMessage->Text = 'This person has already registered and cancelled.  Are you sure you want to create a new registration entry for this person?<br/><br/>';
				$this->dlgMessage->ShowDialogBox();
				return;
			}
		
			if ($objIncomplete) {
				QApplication::Redirect(sprintf('/events/result.php/%s/%s', $this->objSignupForm->Id, $objIncomplete->Id));
				return;
			}

			$this->CreateAndRedirect($objPerson);
		}

		protected function CreateAndRedirect(Person $objPerson) {
			$objSignupEntry = new SignupEntry();
			$objSignupEntry->SignupForm = $this->objSignupForm;
			$objSignupEntry->Person = $objPerson;
			$objSignupEntry->SignupByPerson = $objPerson;
			$objSignupEntry->SignupEntryStatusTypeId = SignupEntryStatusType::Incomplete;
			$objSignupEntry->DateCreated = QDateTime::Now();
			$objSignupEntry->Save();
			QApplication::Redirect(sprintf('/events/result.php/%s/%s', $this->objSignupForm->Id, $objSignupEntry->Id));
		}

		protected function btnDialogOkay_Click() {
			$objPerson = $this->pnlSelectPerson->Person;
			
			// Try and find any INCOMPLETE one for this person and redirect to there
			$objSignupEntryArray = SignupEntry::QueryArray(QQ::AndCondition(
				QQ::Equal(QQN::SignupEntry()->SignupFormId, $this->objSignupForm->Id),
				QQ::Equal(QQN::SignupEntry()->PersonId, $objPerson->Id)));

			foreach ($objSignupEntryArray as $objSignupEntry) {
				switch ($objSignupEntry->SignupEntryStatusTypeId) {
					case SignupEntryStatusType::Incomplete:
						QApplication::Redirect(sprintf('/events/result.php/%s/%s', $this->objSignupForm->Id, $objSignupEntry->Id));
						return;
				}
			}
			
			// If we are here ,then no incompletes were found -- go ahead and create and redirect to a new one
			$this->CreateAndRedirect($objPerson);
		}

		protected function btnDialogCancel_Click() {
			$this->dlgMessage->HideDialogBox();
		}
		
		protected function btnCancel_Click() {
			QApplication::Redirect('/events/results.php/' . $this->objSignupForm->Id);
		}
	}

	SearchGroupsForm::Run('SearchGroupsForm');
?>