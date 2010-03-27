<?php
	class Vicp_GeneralProfile_EditFamily extends Vicp_Base {
		public $lstTitle;
		public $txtFirstName;
		public $txtMiddleName;
		public $txtLastName;
		public $lstSuffix;
		public $txtNickname;
		public $txtPriorLastNames;
		public $txtMailingLabel;
		public $lblMailingLabel;

		public $lstGender;

		private $strTitleArray = array('Dr.', 'Lady', 'Madam', 'Miss', 'Mr.', 'Mrs.', 'Ms.', 'Sir');
		private $strSuffixArray = array('Sr.', 'Jr.', 'III', 'PhD', 'MD');

		public $dtxDateOfBirth;
		public $calDateOfBirth;
		public $chkDobApproximate;

		public $chkDeceased;
		public $dtxDateDeceased;
		public $calDateDeceased;

		protected function SetupPanel() {
			$this->lstTitle = new QListBox($this);
			$this->lstTitle->Name = 'Title';
			$this->lstTitle->AddItem('- None -', null);
			foreach ($this->strTitleArray as $strTitle)
				$this->lstTitle->AddItem($strTitle, $strTitle, $this->objPerson->Title == $strTitle);

			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'First Name';
			$this->txtFirstName->Text = $this->objPerson->FirstName;
			$this->txtFirstName->Required = true;

			$this->txtMiddleName = new QTextBox($this);
			$this->txtMiddleName->Name = 'Middle Name or Initial';
			$this->txtMiddleName->Text = $this->objPerson->MiddleName;

			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Last Name';
			$this->txtLastName->Text = $this->objPerson->LastName;
			$this->txtLastName->Required = true;
			
			$this->lstSuffix = new QListBox($this);
			$this->lstSuffix->Name = 'Suffix';
			$this->lstSuffix->AddItem('- None -', null);
			foreach ($this->strSuffixArray as $strSuffix)
				$this->lstSuffix->AddItem($strSuffix, $strSuffix, $this->objPerson->Suffix == $strSuffix);

			$this->txtNickname = new QTextBox($this);
			$this->txtNickname->Name = 'Nickname';
			$this->txtNickname->Text = $this->objPerson->Nickname;

			$this->txtPriorLastNames = new QTextBox($this);
			$this->txtPriorLastNames->Name = 'Prior Last Name(s)';
			$this->txtPriorLastNames->Text = $this->objPerson->PriorLastNames;
			$this->txtPriorLastNames->Instructions = 'Separate with Spaces';

			$this->txtMailingLabel = new QTextBox($this);
			$this->txtMailingLabel->Name = 'Mailing Label';
			$this->txtMailingLabel->Text = $this->objPerson->MailingLabel;
			
			$this->lblMailingLabel = new QLabel($this);
			$this->lblMailingLabel->Name = '&nbsp;';
			$this->lblMailingLabel->HtmlEntities = false;
			$this->lblMailingLabel->ForeColor = '#666666';
			$this->lblMailingLabel->FontSize = '11px';
			$this->lblMailingLabel->FontItalic = true;
			
			$this->lblMailingLabel_Refresh();
			$this->txtFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lblMailingLabel_Refresh'));
			$this->txtLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lblMailingLabel_Refresh'));
			$this->txtNickname->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lblMailingLabel_Refresh'));
			
			$this->lstGender = new QListBox($this);
			$this->lstGender->Name = 'Gender';			
			$this->lstGender->AddItem('Male', true, $this->objPerson->MaleFlag);
			$this->lstGender->AddItem('Female', false, !$this->objPerson->MaleFlag);

			$this->dtxDateOfBirth = new QDateTimeTextBox($this);
			$this->dtxDateOfBirth->Name = "Date of Birth";
			$this->dtxDateOfBirth->Text = ($this->objPerson->DateOfBirth) ? $this->objPerson->DateOfBirth->__toString() : null; 

			$this->calDateOfBirth = new QCalendar($this, $this->dtxDateOfBirth);
			$this->dtxDateOfBirth->RemoveAllActions(QClickEvent::EventName);

			$this->chkDobApproximate = new QCheckBox($this);
			$this->chkDobApproximate->Name = 'DOB Year Approximate';
			$this->chkDobApproximate->Text = 'Check if Year of Birth is approximate';
			$this->chkDobApproximate->Checked = $this->objPerson->DobApproximateFlag;

			$this->chkDeceased = new QCheckBox($this);
			$this->chkDeceased->Name = 'Deceased';
			$this->chkDeceased->Text = 'Check if person is deceased';
			$this->chkDeceased->Checked = $this->objPerson->DeceasedFlag;

			$this->dtxDateDeceased = new QDateTimeTextBox($this);
			$this->dtxDateDeceased->Name = "Date Deceased";
			$this->dtxDateDeceased->Text = ($this->objPerson->DateDeceased) ? $this->objPerson->DateDeceased->__toString() : null; 

			$this->calDateDeceased = new QCalendar($this, $this->dtxDateDeceased);
			$this->dtxDateDeceased->RemoveAllActions(QClickEvent::EventName);

			$this->chkDeceased->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'dtxDateDeceased_Refresh'));
			$this->dtxDateDeceased_Refresh();
		}

		public function dtxDateDeceased_Refresh() {
			$this->dtxDateDeceased->Visible = $this->chkDeceased->Checked;
		}

		public function lblMailingLabel_Refresh() {
			$this->lblMailingLabel->Instructions = null;
			if ($this->txtFirstName->Text || $this->txtLastName->Text || $this->txtNickname->Text) {
				$this->objPerson->FirstName = trim($this->txtFirstName->Text);
				$this->objPerson->LastName = trim($this->txtLastName->Text);
				$this->objPerson->Nickname = trim($this->txtNickname->Text);
				$this->lblMailingLabel->Text = sprintf('To be used for emails, mailings, etc. If left blank, <strong>%s</strong> will be used.',
					QApplication::HtmlEntities($this->objPerson->Name));
			}
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->objPerson->Title = $this->lstTitle->SelectedValue;
			$this->objPerson->FirstName = trim($this->txtFirstName->Text);
			$this->objPerson->MiddleName = trim($this->txtMiddleName->Text);
			$this->objPerson->LastName = trim($this->txtLastName->Text);
			$this->objPerson->Suffix = $this->lstSuffix->SelectedValue;

			$this->objPerson->Nickname = trim($this->txtNickname->Text);
			$this->objPerson->PriorLastNames = trim($this->txtPriorLastNames->Text);
			$this->objPerson->MailingLabel = trim($this->txtMailingLabel->Text);
			
			$this->objPerson->MaleFlag = trim($this->lstGender->SelectedValue);
			$this->objPerson->DateOfBirth = $this->dtxDateOfBirth->DateTime;			
			$this->objPerson->DobApproximateFlag = $this->objPerson->DateOfBirth && $this->chkDobApproximate->Checked;

			if ($this->objPerson->DeceasedFlag = $this->chkDeceased->Checked) {
				$this->objPerson->DateDeceased = $this->dtxDateDeceased->DateTime;
			} else {
				$this->objPerson->DateDeceased = null;
			}

			$this->objPerson->Save();
			QApplication::ExecuteJavaScript('document.location = "#general";');
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#general";');
		}
	}
?>