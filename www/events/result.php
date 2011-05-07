<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewSignupForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		/**
		 * @var SignupForm
		 */
		protected $objSignupForm;
		protected $mctSignupEntry;
		
		protected $lblPerson;
		protected $lblSignupByPerson;
		protected $lblSignupEntryStatusType;
		protected $lblDateCreated;
		protected $lblDateSubmitted;

		protected $lblInternalNotes;

		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			if (!$this->objSignupForm) QApplication::Redirect('/events/');

			if (!$this->objSignupForm->IsLoginCanView(QApplication::$Login)) QApplication::Redirect('/events/');
			if (!$this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/events/');

			$this->strPageTitle .= $this->objSignupForm->Name;

			// Check for the SignupEntry
			if (QApplication::PathInfo(1)) {
				$objSignupEntry = SignupEntry::Load(QApplication::PathInfo(1));
				if (!$objSignupEntry) QApplication::Redirect('/events/');
				if ($objSignupEntry->SignupFormId != $this->objSignupForm->Id) QApplication::Redirect('/events/');
			} else {
				$objSignupEntry = new SignupEntry();
				$objSignupEntry->SignupForm = $this->objSignupForm;
			}

			$this->mctSignupEntry = new SignupEntryMetaControl($this, $objSignupEntry);
			$this->lblPerson = new QLabel($this);
			$this->lblPerson->Name = 'Person';
			$this->lblPerson->Text = $this->mctSignupEntry->SignupEntry->Person->Name;
			
			$this->lblSignupEntryStatusType = $this->mctSignupEntry->lblSignupEntryStatusTypeId_Create();
			$this->lblDateCreated = $this->mctSignupEntry->lblDateCreated_Create();
			$this->lblDateSubmitted = $this->mctSignupEntry->lblDateSubmitted_Create();
			
			if (($this->mctSignupEntry->SignupEntry->PersonId != $this->mctSignupEntry->SignupEntry->SignupByPersonId) &&
				($this->mctSignupEntry->SignupEntry->SignupByPersonId)) {
				$this->lblSignupByPerson = new QLabel($this);
				$this->lblSignupByPerson->Text = $this->mctSignupEntry->SignupEntry->SignupByPerson->Name;
			}
		}


	}

	ViewSignupForm::Run('ViewSignupForm');
?>