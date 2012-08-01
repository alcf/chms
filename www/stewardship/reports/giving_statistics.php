<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class StewardshipStatisticsForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship Giving Statistics';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $lstYear;
		protected $btnGenerate;
		protected $pxyDelete;
		
		protected function GetFileArrayForYear($intYear) {
			$objDirectory = opendir(STATISTICS_PDF_PATH);
			$strArrayToReturn = array();
			while ($strFile = readdir($objDirectory)) {
				if (strpos($strFile, 'StatisticsFor' . $intYear) === 0)
				$strArrayToReturn[] = $strFile;
			}
			sort($strArrayToReturn);
			return $strArrayToReturn;
		}
		
		protected function Form_Create() {
			$this->lstYear = new QListBox($this);
			$this->lstYear->Required = true;
			$this->lstYear->Name = "Report by Year";
			for ($intYear = 2000; $intYear <= date('Y') + 1; $intYear++) {
				$this->lstYear->AddItem($intYear, $intYear, $intYear == date('Y'));
			}
					
			$this->btnGenerate = new QButton($this);
			$this->btnGenerate->CausesValidation = true;
			$this->btnGenerate->Text = 'Generate PDF Report';
			$this->btnGenerate->AddAction(new QClickEvent(), new QAjaxAction('btnGenerate_Click'));

			$this->pxyDelete = new QControlProxy($this);
			$this->pxyDelete->AddAction(new QClickEvent(), new QAjaxAction('pxyDelete_Click'));
			$this->pxyDelete->AddAction(new QClickEvent(), new QTerminateAction());
		}
		
		public function pxyDelete_Click($strFormId, $strControlId, $strParameter) {
			QApplication::DisplayAlert(sprintf('Reports for %s have been deleted.', $strParameter));
			foreach ($this->GetFileArrayForYear($strParameter) as $strFile)
			unlink(STATISTICS_PDF_PATH . '/' . $strFile);
			QApplication::Redirect('/stewardship/reports/giving_statistics.php');
		}
		
		public function btnGenerate_Click($strFormId, $strControlId, $strParameter) {
			QApplication::DisplayAlert(sprintf('Reports for %s are now being generated.  Please come back shortly to check on its status.', $this->lstYear->SelectedValue));
			file_put_contents(STATISTICS_PDF_PATH . '/run.txt', $this->lstYear->SelectedValue);
			chmod(STATISTICS_PDF_PATH . '/run.txt', 0777);
		}
	}

	StewardshipStatisticsForm::Run('StewardshipStatisticsForm');
?>