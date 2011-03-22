<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Monthly Giving Report';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $lstYear;
		protected $lstMonth;

		protected $dtgReport;
		protected $dttDate;
		protected $fltTotal;

		protected function Form_Create() {
			$this->lstYear = new QListBox($this);
			for ($intYear = 2002; $intYear <= date('Y'); $intYear++) {
				$this->lstYear->AddItem($intYear, $intYear, QApplication::PathInfo(0) ? (QApplication::PathInfo(0) == $intYear) : $intYear == QDateTime::Now()->Year);
			}
			
			$this->lstMonth = new QListBox($this);
			for ($intMonth = 1; $intMonth <= 12; $intMonth++) {
				$dttDate = new QDateTime('2000-' . $intMonth . '-01');
				$this->lstMonth->AddItem($dttDate->ToString('MMMM'), $intMonth, QApplication::PathInfo(1) ? (QApplication::PathInfo(1) == $intMonth) : $intMonth == QDateTime::Now()->Month);
			}

			$this->lstYear->AddAction(new QChangeEvent(), new QAjaxAction('lstDate_Change'));
			$this->lstMonth->AddAction(new QChangeEvent(), new QAjaxAction('lstDate_Change'));

			$this->dtgReport = new QDataGrid($this);
			$this->dtgReport->AddColumn(new QDataGridColumn('Fund', '<?= StewardshipFund::Load($_ITEM[0])->Name; ?>', 'Width=400px'));
			$this->dtgReport->AddColumn(new QDataGridColumn('Monthly Total', '<?= QApplication::DisplayCurrency($_ITEM[1]); ?>', 'Width=400px'));
			
			$this->dttDate = new QDateTime($this->lstYear->SelectedValue . '-' . $this->lstMonth->SelectedValue . '-01');
			$this->dttDate->SetTime(null, null, null);
			
			// Bind the Data
			$this->dtgReport->DataSource = StewardshipPost::GetReportByFundAndMonth($this->dttDate);
			
			$this->fltTotal = 0;
			foreach ($this->dtgReport->DataSource as $strItem) {
				$this->fltTotal += $strItem[1];
			}
		}
		
		public function lstDate_Change() {
			QApplication::Redirect('/stewardship/reports/monthly_giving.php/' . $this->lstYear->SelectedValue . '/' . $this->lstMonth->SelectedValue);
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>