<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	//QApplication::AuthenticatePublic();

	class ConfirmationSignupQForm extends ChmsForm {
		protected $strPageTitle = 'Main Menu';
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
			if (!$this->objSignupForm) {
				$this->strHtmlIncludeFilePath = '_notfound.tpl.php';
				return;
			}

			$this->strPageTitle = $this->objSignupForm->Name . ' - Confirmation';

			// Ensure it is Active
			if (!$this->objSignupForm->ActiveFlag) {
				$this->strHtmlIncludeFilePath = '_notactive.tpl.php';
				return;
			}

			// Get the SignupEntry
			$this->objSignupEntry = SignupEntry::Load(QApplication::PathInfo(1));
			
			// Ensure it is correct for the form and the signup person
			if($this->objSignupEntry->SignupByPersonId) {
				if (!$this->objSignupEntry ||
					($this->objSignupEntry->SignupFormId != $this->objSignupForm->Id) ||
					($this->objSignupEntry->SignupByPersonId != QApplication::$PublicLogin->PersonId) ||
					($this->objSignupEntry->SignupEntryStatusTypeId != SignupEntryStatusType::Complete)) {
					$this->strHtmlIncludeFilePath = '_notfound.tpl.php';
					return;
				}
			} else {
				if (!$this->objSignupEntry ||
				($this->objSignupEntry->SignupFormId != $this->objSignupForm->Id) ||
				(!$this->objSignupEntry->CommunicationsEntryId) ||
				($this->objSignupEntry->SignupEntryStatusTypeId != SignupEntryStatusType::Complete)) {
					$this->strHtmlIncludeFilePath = '_notfound.tpl.php';
					return;
				}
			}
		}
		
		public function Form_Validate() {
			$blnToReturn = parent::Form_Validate();
			$blnFirst = true;
			foreach ($this->GetErrorControls() as $objControl) {
				$objControl->Blink();
				if ($blnFirst) {
					$objControl->Focus();
					$blnFirst = false;
				}
			}
			
			return $blnToReturn;
		}
		

	}

	ConfirmationSignupQForm::Run('ConfirmationSignupQForm');
?>