<?php
	class Vicp_GeneralProfile_EditName extends Vicp_Base {
		public $txtFirstName;
		public $txtMiddleName;
		public $txtLastName;
		
		public $lstTitle;
		
		public $strTitleArray = array('Dr.','Mr.','Mrs.','Sir');

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
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->objPerson->Title = $this->lstTitle->SelectedValue;
			$this->objPerson->FirstName = trim($this->txtFirstName->Text);
			$this->objPerson->MiddleName = trim($this->txtMiddleName->Text);
			$this->objPerson->LastName = trim($this->txtLastName->Text);

			$this->objPerson->Save();
			QApplication::ExecuteJavaScript('document.location = "#general";');
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#general";');
		}
	}
?>