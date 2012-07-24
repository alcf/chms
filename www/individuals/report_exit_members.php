<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ExitMembersReportForm extends ChmsForm {
		protected $strPageTitle = 'Generate Reports';
		protected $intNavSectionId = ChmsForm::NavSectionPeople;
		
		public    $lblLabel;
		public    $dtxAfterValue;
		public    $afterCalValue;
		public    $dtxBeforeValue;
		public    $beforeCalValue;
		
		public    $iTotalCount;
		public    $dtgExitingMembers;
		public    $lblTitle;
		
		protected function Form_Create() {	
			$this->lblLabel = new QLabel($this);
			$this->lblLabel->Text = "Members who left after ";
			
			$this->dtxBeforeValue = new QDateTimeTextBox($this);
			$this->dtxBeforeValue->Name = "Members who Exited Before:";
			$this->dtxBeforeValue->Required = true;
			$this->beforeCalValue = new QCalendar($this, $this->dtxBeforeValue);
			$this->dtxBeforeValue->RemoveAllActions(QClickEvent::EventName);
			$this->dtxBeforeValue->AddAction(new QChangeEvent(), new QAjaxAction('dtxDate_Change'));
			$this->dtxBeforeValue->Text = QApplication::PathInfo(1);
			
			$this->dtxAfterValue = new QDateTimeTextBox($this);
			$this->dtxAfterValue->Name = "Members who exited After:";
			$this->dtxAfterValue->Required = true;
			$this->afterCalValue = new QCalendar($this, $this->dtxAfterValue);
			$this->dtxAfterValue->RemoveAllActions(QClickEvent::EventName);
			$this->dtxAfterValue->AddAction(new QChangeEvent(), new QAjaxAction('dtxDate_Change'));
			$this->dtxAfterValue->Text = QApplication::PathInfo(0);
					
			$this->dtgExitingMembers = new QDataGrid($this);
			$this->dtgExitingMembers->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->Person->FullName; ?>', 'Width=270px'));
			$this->dtgExitingMembers->AddColumn(new QDataGridColumn('Membership End Date', '<?= $_ITEM->DateEnd; ?>', 'Width=270px'));
			$this->dtgExitingMembers->AddColumn(new QDataGridColumn('Termination Reason', '<?= $_ITEM->TerminationReason; ?>', 'Width=270px'));
			
			$dtAfterValue = new QDateTime($this->dtxAfterValue->Text);
			$dtBeforeValue = new QDateTime($this->dtxBeforeValue->Text);
			$objMembershipArray = Membership::LoadArrayByEndDateRange($dtAfterValue,$dtBeforeValue );
			$this->iTotalCount = count($objMembershipArray);
			$this->dtgExitingMembers->DataSource = $objMembershipArray;
		}
		
		public function dtxDate_Change() {
			QApplication::Redirect('/individuals/report_exit_members.php/' . $this->dtxAfterValue->Text . '/' . $this->dtxBeforeValue->Text);
		}
	}
	
	ExitMembersReportForm::Run('ExitMembersReportForm');
	?>