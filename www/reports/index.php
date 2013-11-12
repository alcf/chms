<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ReportsForm extends ChmsForm {
		protected $strPageTitle = 'Reports';
		protected $intNavSectionId = ChmsForm::NavSectionReports;
		public $lstReports;

		protected function Form_Create() {
			$this->lstReports = new QListBox($this);
			$this->lstReports->Name = 'Reports';
			$this->lstReports->AddAction(new QChangeEvent(), new QAjaxAction('lstReports_Change'));

			// Add each report based on the privileges of the current logged in user
			$this->lstReports->AddItem('- Select a Report -');
			if (QApplication::IsLoginHasPermission(PermissionType::AddNewIndividual)) {
				$this->lstReports->AddItem('New Members Report', 'newMembers.php');
				$this->lstReports->AddItem('Exiting Members Report', 'exitMembers.php');
				$this->lstReports->AddItem('Volunteer Report', 'volunteers.php');
			}
			$this->lstReports->AddItem('Church Ethnicity Report', 'churchEthnicity.php');
			if (QApplication::IsLoginHasPermission(PermissionType::AccessConfidentialNotes)) {
				$this->lstReports->AddItem('Confidential Notes Report', 'confidentialNotes.php');
			}
		}
		
		protected function lstReports_Change() {
			QApplication::Redirect('./'.$this->lstReports->SelectedValue);			
		}
	}

	ReportsForm::Run('ReportsForm');
?>