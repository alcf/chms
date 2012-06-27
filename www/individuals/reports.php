<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ReportsForm extends ChmsForm {
		protected $strPageTitle = 'Generate Reports';
		protected $intNavSectionId = ChmsForm::NavSectionPeople;
		
		public    $lblLabel;
		public    $dtxAfterValue;
		public    $afterCalValue;
		public    $dtxBeforeValue;
		public    $beforeCalValue;
		
		public    $iTotalCount;
		public    $dtgNewMembers;
		public    $lblTitle;
		
		protected function Form_Create() {	
			$this->lblLabel = new QLabel($this);
			$this->lblLabel->Text = "New Members after ";
			
			$this->dtxBeforeValue = new QDateTimeTextBox($this);
			$this->dtxBeforeValue->Name = "New Members Before:";
			$this->dtxBeforeValue->Required = true;
			$this->beforeCalValue = new QCalendar($this, $this->dtxBeforeValue);
			$this->dtxBeforeValue->RemoveAllActions(QClickEvent::EventName);
			$this->dtxBeforeValue->AddAction(new QChangeEvent(), new QAjaxAction('dtxDate_Change'));
			$this->dtxBeforeValue->Text = QApplication::PathInfo(1);
			
			$this->dtxAfterValue = new QDateTimeTextBox($this);
			$this->dtxAfterValue->Name = "New Members After:";
			$this->dtxAfterValue->Required = true;
			$this->afterCalValue = new QCalendar($this, $this->dtxAfterValue);
			$this->dtxAfterValue->RemoveAllActions(QClickEvent::EventName);
			$this->dtxAfterValue->AddAction(new QChangeEvent(), new QAjaxAction('dtxDate_Change'));
			$this->dtxAfterValue->Text = QApplication::PathInfo(0);
					
			$this->dtgNewMembers = new QDataGrid($this);
			$this->dtgNewMembers->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->Person->FullName; ?>', 'Width=270px'));
			$this->dtgNewMembers->AddColumn(new QDataGridColumn('Membership Start Date', '<?= $_ITEM->DateStart; ?>', 'Width=270px'));
			
			$dtAfterValue = new QDateTime($this->dtxAfterValue->Text);
			$dtBeforeValue = new QDateTime($this->dtxBeforeValue->Text);
			$objMembershipArray = Membership::LoadArrayByStartDateRange($dtAfterValue,$dtBeforeValue );
			$this->iTotalCount = count($objMembershipArray);
			$this->dtgNewMembers->DataSource = $objMembershipArray;
		}
		
		public function dtxDate_Change() {
			QApplication::Redirect('/individuals/reports.php/' . $this->dtxAfterValue->Text . '/' . $this->dtxBeforeValue->Text);
		}
	}
	
	ReportsForm::Run('ReportsForm');
	?>