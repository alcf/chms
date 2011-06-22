<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	class EventSignupQForm extends ChmsForm {
		protected $strPageTitle = 'Main Menu';
		/**
		 * @var EventSignupForm
		 */
		protected $objEvent;
		/**
		 * @var SignupForm
		 */
		protected $objSignupForm;

		/**
		 * @var SignupEntry
		 */
		protected $objSignupEntry;

		protected function Form_Create() {
			// Attempt to load by Token and then by ID
			$this->objSignupForm = SignupForm::LoadByToken(QApplication::PathInfo(0));
			if (!$this->objSignupForm) $this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));

			// Ensure it is the correct type and it exists
			if (!$this->objSignupForm || !$this->objSignupForm->EventSignupForm) {
				$this->strHtmlIncludeFilePath = '_notfound.tpl.php';
				return;
			}

			// Ensure it is Active
			if (!$this->objSignupForm->ActiveFlag) {
				$this->strHtmlIncludeFilePath = '_notactive.tpl.php';
				return;
			}
			
			// Finally, ensure we are not double registering where not allowed
			if (!$this->objSignupForm->AllowMultipleFlag &&
				count(SignupEntry::LoadArrayBySignupFormIdPersonIdSignupEntryStatusTypeId($this->objSignupForm->Id, QApplication::$PublicLogin->PersonId, SignupEntryStatusType::Complete))) {
				$this->strHtmlIncludeFilePath = '_registered.tpl.php';
				return;
			}

			$this->objEvent = $this->objSignupForm->EventSignupForm;
			$objSignupEntryArray = SignupEntry::LoadArrayBySignupFormIdPersonIdSignupEntryStatusTypeId($this->objSignupForm->Id, QApplication::$PublicLogin->PersonId, SignupEntryStatusType::Incomplete);
			if (count($objSignupEntryArray)) $this->objSignupEntry = $objSignupEntryArray[0];
			
			// Create the Entry object if doesn't yet exists
			if (!$this->objSignupEntry) {
				$this->objSignupEntry = new SignupEntry();
				$this->objSignupEntry->SignupForm = $this->objSignupForm;
				$this->objSignupEntry->Person = QApplication::$PublicLogin->Person;
				$this->objSignupEntry->SignupByPerson = QApplication::$PublicLogin->Person;
				$this->objSignupEntry->SignupEntryStatusTypeId = SignupEntryStatusType::Incomplete;
				$this->objSignupEntry->DateCreated = QDateTime::Now();
			}
			
			$this->CreateFormItemControls();
		}

		protected function CreateFormItemControls() {
			
		}

		protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {
			
		}
	}

	EventSignupQForm::Run('EventSignupQForm');
?>