<?php
	class Vicp_GeneralProfile_EditName extends Vicp_Base {
		const DobNone = 1;
		const DobExact = 2;
		const DobApproximateYear = 3;
		const DobApproximateDay = 4;
		const DobApproximateYearAndDay = 5;

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
		private $strSuffixArray = array('Sr.', 'Jr.', 'II', 'III', 'PhD', 'MD');

		public $lstDateOfBirth;

		public $dtxDateOfBirth;
		public $calDateOfBirth;
		public $lstMonth;
		public $lstDay;
		public $txtAge;

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
			if (!$this->objPerson->Gender) $this->lstGender->AddItem('- Select One -', null);
			$this->lstGender->AddItem('Female', 'F', $this->objPerson->Gender == 'F');
			$this->lstGender->AddItem('Male', 'M', $this->objPerson->Gender == 'M');

			$this->lstDateOfBirth = new QListBox($this);
			$this->lstDateOfBirth->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstDateOfBirth_Change'));
			$this->lstDateOfBirth->Name = 'Birthdate / Age Information';
			$this->lstDateOfBirth->AddItem('Not Available', self::DobNone,
				is_null($this->objPerson->DateOfBirth));
			$this->lstDateOfBirth->AddItem('Date of Birth', self::DobExact,
				!is_null($this->objPerson->DateOfBirth) && !$this->objPerson->DobGuessedFlag && !$this->objPerson->DobYearApproximateFlag);
			$this->lstDateOfBirth->AddItem('Birthday and Approximate Age', self::DobApproximateYear,
				!is_null($this->objPerson->DateOfBirth) && !$this->objPerson->DobGuessedFlag && $this->objPerson->DobYearApproximateFlag);
			$this->lstDateOfBirth->AddItem('Current Age Only', self::DobApproximateDay,
				!is_null($this->objPerson->DateOfBirth) && $this->objPerson->DobGuessedFlag && !$this->objPerson->DobYearApproximateFlag);
			$this->lstDateOfBirth->AddItem('Approximate Age Only', self::DobApproximateYearAndDay,
				!is_null($this->objPerson->DateOfBirth) && $this->objPerson->DobGuessedFlag && $this->objPerson->DobYearApproximateFlag);

			$this->dtxDateOfBirth = new QDateTimeTextBox($this);
			$this->dtxDateOfBirth->Name = "Date of Birth";
			$this->dtxDateOfBirth->Text = ($this->objPerson->DateOfBirth) ? $this->objPerson->DateOfBirth->__toString() : null; 

			$this->calDateOfBirth = new QCalendar($this, $this->dtxDateOfBirth);
			$this->dtxDateOfBirth->RemoveAllActions(QClickEvent::EventName);

			$this->txtAge = new QIntegerTextBox($this);
			$this->txtAge->Name = 'Current Age';
			$this->txtAge->Minimum = 0;
			$this->txtAge->Maximum = 120;
			$this->txtAge->Width = '60px';
			$this->txtAge->Text = $this->objPerson->Age;

			$this->lstMonth = new QListBox($this);
			$this->lstMonth->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'lstMonth_Change'));
			$this->lstMonth->Name = 'Birthday';
			$this->lstMonth->AddItem('- Select One -', null, !$this->objPerson->DateOfBirth);
			for ($i = 1; $i <= 12; $i++) {
				$this->lstMonth->AddItem($i . ' - ' . date('M', mktime(0, 0, 0, $i, 1, 2000)), $i, $this->objPerson->DateOfBirth && ($this->objPerson->DateOfBirth->Month == $i));
			}

			$this->lstDay = new QListBox($this);
			$this->lstMonth_Change(null, null, null);

			$this->lstDateOfBirth_Change();

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

		public function lstMonth_Change($strFormId, $strControlId, $strParameter) {
			$intCurrentDay = $this->lstDay->SelectedValue;
			$this->lstDay->RemoveAllItems();
			if (!$this->lstMonth->SelectedValue) {
				$this->lstDay->AddItem('--');
				$this->lstDay->Enabled = false;
			} else {
				$this->lstDay->Enabled = true;
				for ($i = 1; $i <= date('t', mktime(0, 0, 0, $this->lstMonth->SelectedValue, 1, 2000)); $i++) {
					$this->lstDay->AddItem($i, $i,
						(is_null($strFormId) && $this->objPerson->DateOfBirth && ($this->objPerson->DateOfBirth->Day == $i)) ||
						((!is_null($strFormId)) && ($intCurrentDay == $i))
					);
				}
				
				if ($strFormId) $this->lstDay->Focus();
			}
		}

		public function lstDateOfBirth_Change() {
			switch ($this->lstDateOfBirth->SelectedValue) {
				case self::DobExact:
					$this->dtxDateOfBirth->Visible = true;
					$this->dtxDateOfBirth->Required = true;
					$this->txtAge->Visible = false;
					$this->txtAge->Required = false;
					$this->lstMonth->Visible = false;
					$this->lstMonth->Required = false;
					$this->lstDay->Visible = false;
					$this->lstDay->Required = false;
					$this->dtxDateOfBirth->Select();
					break;
				case self::DobApproximateDay:
					$this->dtxDateOfBirth->Visible = false;
					$this->dtxDateOfBirth->Required = false;
					$this->txtAge->Visible = true;
					$this->txtAge->Required = true;
					$this->txtAge->Name = 'Current Age';
					$this->lstMonth->Visible = false;
					$this->lstMonth->Required = false;
					$this->lstDay->Visible = false;
					$this->lstDay->Required = false;
					$this->txtAge->Select();
					break;
				case self::DobApproximateYear:
					$this->dtxDateOfBirth->Visible = false;
					$this->dtxDateOfBirth->Required = false;
					$this->txtAge->Visible = true;
					$this->txtAge->Required = true;
					$this->txtAge->Name = 'Approximate Age';
					$this->lstMonth->Visible = true;
					$this->lstMonth->Required = true;
					$this->lstDay->Visible = true;
					$this->lstDay->Required = true;
					$this->lstMonth->Focus();
					break;
				case self::DobApproximateYearAndDay:
					$this->dtxDateOfBirth->Visible = false;
					$this->dtxDateOfBirth->Required = false;
					$this->txtAge->Visible = true;
					$this->txtAge->Required = true;
					$this->txtAge->Name = 'Approximate Age';
					$this->lstMonth->Visible = false;
					$this->lstMonth->Required = false;
					$this->lstDay->Visible = false;
					$this->lstDay->Required = false;
					$this->txtAge->Select();
					break;
				default:
					$this->dtxDateOfBirth->Visible = false;
					$this->dtxDateOfBirth->Required = false;
					$this->txtAge->Visible = false;
					$this->txtAge->Required = false;
					$this->lstMonth->Visible = false;
					$this->lstMonth->Required = false;
					$this->lstDay->Visible = false;
					$this->lstDay->Required = false;
					break;
			}
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
			
			$this->objPerson->Gender = trim($this->lstGender->SelectedValue);
			
			// Date of Birth Stuff
			switch ($this->lstDateOfBirth->SelectedValue) {
				case self::DobNone:
					$this->objPerson->DateOfBirth = null;
					$this->objPerson->DobGuessedFlag = null;
					$this->objPerson->DobYearApproximateFlag = null;
					break;

				case self::DobExact:
					$this->objPerson->DateOfBirth = $this->dtxDateOfBirth->DateTime;
					$this->objPerson->DobGuessedFlag = false;
					$this->objPerson->DobYearApproximateFlag = false;
					break;

				case self::DobApproximateDay:
					if ($this->objPerson->DateOfBirth) {
						$dttDate = new QDateTime($this->objPerson->DateOfBirth);
						$dttDate->Year = QDateTime::Now()->Year;
						if ($dttDate->IsLaterThan(QDateTime::Now())) $dttDate->Year -= 1;
					} else {
						$dttDate = QDateTime::Now();
						$dttDate->Month -= 6;
					}
					$dttDate->Year -= $this->txtAge->Text;
					$this->objPerson->DateOfBirth = $dttDate;
					$this->objPerson->DobGuessedFlag = true;
					$this->objPerson->DobYearApproximateFlag = false;
					break;

				case self::DobApproximateYear:
					$dttDate = QDateTime::Now();
					$dttDate->Month = $this->lstMonth->SelectedValue;
					$dttDate->Day = $this->lstDay->SelectedValue;
					if ($dttDate->IsLaterThan(QDateTime::Now())) $dttDate->Year -= 1;
					$dttDate->Year -= $this->txtAge->Text;
					$this->objPerson->DateOfBirth = $dttDate;
					$this->objPerson->DobGuessedFlag = false;
					$this->objPerson->DobYearApproximateFlag = true;
					break;

				case self::DobApproximateYearAndDay:
					if ($this->objPerson->DateOfBirth) {
						$dttDate = new QDateTime($this->objPerson->DateOfBirth);
						$dttDate->Year = QDateTime::Now()->Year;
						if ($dttDate->IsLaterThan(QDateTime::Now())) $dttDate->Year -= 1;
					} else {
						$dttDate = QDateTime::Now();
						$dttDate->Month -= 6;
					}
					$dttDate->Year -= $this->txtAge->Text;
					$this->objPerson->DateOfBirth = $dttDate;
					$this->objPerson->DobGuessedFlag = true;
					$this->objPerson->DobYearApproximateFlag = true;
					break;

				default:
					throw new Exception('Invalid DOB Type');
			}
			$this->objPerson->RefreshAge(false);

			// Deceased Flag and Date
			if ($this->objPerson->DeceasedFlag = $this->chkDeceased->Checked) {
				$this->objPerson->DateDeceased = $this->dtxDateDeceased->DateTime;
			} else {
				$this->objPerson->DateDeceased = null;
			}

			$this->objPerson->Save();
			$this->objPerson->RefreshNameItemAssociations();

			// Refresh Name of teh Household (if applicable)
			if ($this->objPerson->HouseholdAsHead)
				$this->objPerson->HouseholdAsHead->RefreshName();

			foreach ($this->objPerson->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
				$objHouseholdParticipation->Household->RefreshMembers();
			}
			QApplication::ExecuteJavaScript('document.location = "#general";');
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#general";');
		}
	}
?>