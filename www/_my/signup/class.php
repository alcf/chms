<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();
	require(dirname(__FILE__) . '/SignupQForm.class.php');

	class ClassSignupForm extends SignupQForm {
		/**
		 * @var ClassMeeting
		 */
		protected $objClassMeeting;

		protected function Form_Create() {
			try {
				parent::Form_Create();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Ensure it is the correct type and it exists
			if (!($this->objClassMeeting = $this->objSignupForm->ClassMeeting)) {
				$this->strHtmlIncludeFilePath = '_notfound.tpl.php';
				return;
			}

			$this->CreateFormItemControls();
		}
		
		protected function CreateChildObject() {
			$objClassRegistration = new ClassRegistration();
			$objClassRegistration->SignupEntry = $this->objSignupEntry;
			$objClassRegistration->ClassMeeting = $this->objClassMeeting;
			$objClassRegistration->Person = $this->objSignupEntry->Person;
			$objClassRegistration->Save();
		}
	}

	ClassSignupForm::Run('ClassSignupForm');
?>