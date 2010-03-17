<?php
	class Vicp_GeneralProfile_EditName extends Vicp_Base {
		public $txtFirstName;
		public $txtMiddleName;
		public $txtLastName;
		
		public $lstTitle;
		public $lstGender;

		private $strTitleArray = array('Dr.', 'Lady', 'Madam', 'Miss', 'Mr.', 'Mrs.', 'Ms.', 'Sir');

		public $dtxDateOfBirth;
		public $calDateOfBirth;
		
		protected function SetupPanel() {
			$this->lstTitle = new QListBox($this);
			$this->lstTitle->Name = 'Title';
			$this->lstTitle->AddItem('- None -', null);
			foreach ($this->strTitleArray as $strTitle)
				$this->lstTitle->AddItem($strTitle, $strTitle, $this->objPerson->Title == $strTitle);
			
			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'First Name';
			$this->txtFirstName->Text = $this->objPerson->FirstName;

			$this->txtMiddleName = new QTextBox($this);
			$this->txtMiddleName->Name = 'Middle Name';
			$this->txtMiddleName->Text = $this->objPerson->MiddleName;
			
			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Last Name';
			$this->txtLastName->Text = $this->objPerson->LastName;
			
			$this->lstGender = new QListBox($this);
			$this->lstGender->Name = 'Gender';			
			$this->lstGender->AddItem('Male', true, $this->objPerson->MaleFlag);
			$this->lstGender->AddItem('Female', false, !$this->objPerson->MaleFlag);

			// Note that QCalendar REQUIRES a "linked" QDateTimeTextBox
			$this->dtxDateOfBirth = new QDateTimeTextBox($this);
			$this->dtxDateOfBirth->Name = "Date of Birth";
			$this->dtxDateOfBirth->Text = ($this->objPerson->DateOfBirth) ? $this->objPerson->DateOfBirth->__toString() : null; 

			$this->calDateOfBirth = new QCalendar($this, $this->dtxDateOfBirth);
			$this->dtxDateOfBirth->RemoveAllActions(QClickEvent::EventName);
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->objPerson->Title = $this->lstTitle->SelectedValue;
			$this->objPerson->FirstName = trim($this->txtFirstName->Text);
			$this->objPerson->MiddleName = trim($this->txtMiddleName->Text);
			$this->objPerson->LastName = trim($this->txtLastName->Text);
			
			$this->objPerson->MaleFlag = trim($this->lstGender->SelectedValue);
			$this->objPerson->DateOfBirth = $this->dtxDateOfBirth->DateTime;			
			
//            $objControlToLookup = $this->GetControl($strParameter);
//            $dttDateTime = $objControlToLookup->DateTime;
//			$this->objPerson->DateOfBirth = $dttDateTime;

			$this->objPerson->Save();
			QApplication::ExecuteJavaScript('document.location = "#general";');
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#general";');
		}
	}
?>