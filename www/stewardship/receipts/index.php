<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	// Make the Directory
	if (!is_dir(RECEIPT_PDF_PATH)) QApplication::MakeDirectory(RECEIPT_PDF_PATH, 0777);

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Generated Bulk Receipts';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $lstYear;
		protected $lstQuarter;
		protected $btnGenerate;
		protected $btnGenerateQuarterly;

		protected $pxyDelete;

		protected function GetFileArrayForYear($intYear) {
			$objDirectory = opendir(RECEIPT_PDF_PATH);
			$strArrayToReturn = array();
			while ($strFile = readdir($objDirectory)) {
				if (strpos($strFile, 'ReceiptsFor' . $intYear) === 0)
					$strArrayToReturn[] = $strFile;
			}
			sort($strArrayToReturn);
			return $strArrayToReturn;
		}

		protected function Form_Create() {
			$this->lstYear = new QListBox($this);
			$this->lstYear->Name = 'Year to Generate';
			$this->lstYear->Required = true;
			for ($intYear = 2000; $intYear <= date('Y') + 1; $intYear++) {
				$this->lstYear->AddItem($intYear, $intYear, $intYear == date('Y'));
			}

			$this->btnGenerate = new QButton($this);
			$this->btnGenerate->CausesValidation = true;
			$this->btnGenerate->Text = 'Annual Statement';
			$this->btnGenerate->AddAction(new QClickEvent(), new QAjaxAction('btnGenerate_Click'));
			$this->btnGenerate->ActionParameter = 'annual';

			$this->btnGenerateQuarterly = new QButton($this);
			$this->btnGenerateQuarterly->CausesValidation = true;
			$this->btnGenerateQuarterly->Text = 'Quarterly Statement';
			$this->btnGenerateQuarterly->AddAction(new QClickEvent(), new QAjaxAction('btnGenerate_Click'));
			$this->btnGenerateQuarterly->ActionParameter = null;
			
			$this->lstQuarter = new QListBox($this);
			$this->lstQuarter->AddItem('1st Quarter', 1);
			$this->lstQuarter->AddItem('2nd Quarter', 2);
			$this->lstQuarter->AddItem('3rd Quarter', 3);
						
			$this->pxyDelete = new QControlProxy($this);
			$this->pxyDelete->AddAction(new QClickEvent(), new QAjaxAction('pxyDelete_Click'));
			$this->pxyDelete->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function pxyDelete_Click($strFormId, $strControlId, $strParameter) {
			QApplication::DisplayAlert(sprintf('Receipts for %s have been deleted.', $strParameter));
			foreach ($this->GetFileArrayForYear($strParameter) as $strFile)
				unlink(RECEIPT_PDF_PATH . '/' . $strFile);
			QApplication::Redirect('/stewardship/receipts/');
		}

		public function btnGenerate_Click($strFormId, $strControlId, $strParameter) {
			QApplication::DisplayAlert(sprintf('Receipts for %s are now being generated.  Please come back shortly to check on its status.', $this->lstYear->SelectedValue));
			if (strlen($strParameter))
				file_put_contents(RECEIPT_PDF_PATH . '/run.txt', $this->lstYear->SelectedValue . " " . $strParameter);
			else
				file_put_contents(RECEIPT_PDF_PATH . '/run.txt', $this->lstYear->SelectedValue . " " . $this->lstQuarter->SelectedValue);
			chmod(RECEIPT_PDF_PATH . '/run.txt', 0777);
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>