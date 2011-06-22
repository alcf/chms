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

		protected function Form_Create() {
			// Attempt to load by Token and then by ID
			$this->objSignupForm = SignupForm::LoadByToken(QApplication::PathInfo(0));
			if (!$this->objSignupForm) $this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));

			// Ensure it is the correct type and it exists
			if (!$this->objSignupForm || !$this->objSignupForm->EventSignupForm) {
				$this->strHtmlIncludeFilePath = '_notfound.tpl.php';
				return;
			}

			// Finally, ensure we are not double registering where not allowed
			if (!$this->objSignupForm->AllowMultipleFlag &&
				count(SignupEntry::LoadArrayBySignupFormIdPersonIdSignupEntryStatusTypeId($this->objSignupForm->Id, QApplication::$PublicLogin->PersonId, SignupEntryStatusType::Complete))) {
				$this->strHtmlIncludeFilePath = '_registered.tpl.php';
				return;
			}
		}

		protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {
		}
	}

	EventSignupQForm::Run('EventSignupQForm');
?>