<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();
	
	class Recurring extends ChmsForm {
		protected $strPageTitle = 'Recurring Payments';
		protected $dtgRecurringDonation;
		protected $btnAdd;
		protected $btnBack;
		
		protected function Form_Run() {
			if (QApplication::$PublicLogin && !QApplication::$PublicLogin->Person) QApplication::PublicLogout(false);
		}

		protected function Form_Create() {			
			$this->dtgRecurringDonation = new RecurringDonationDataGrid($this);
			$this->dtgRecurringDonation->Paginator = new QPaginator($this->dtgRecurringDonation);
			$this->dtgRecurringDonation->AddColumn(new QDataGridColumn('Name', '<?= $_FORM->RenderName($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px'));
			$this->dtgRecurringDonation->MetaAddColumn('Amount', 'Html=<?=$_ITEM->Amount; ?>', 'HtmlEntities=false', 'Width=80px');
			$this->dtgRecurringDonation->AddColumn(new QDataGridColumn('Payment Period', '<?= $_FORM->RenderPaymentPeriod($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px'));
			$this->dtgRecurringDonation->AddColumn(new QDataGridColumn('Start Date', '<?= $_FORM->RenderStartDate($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px'));
			$this->dtgRecurringDonation->AddColumn(new QDataGridColumn('End Date', '<?= $_FORM->RenderEndDate($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px'));
			$this->dtgRecurringDonation->SetDataBinder('dtgRecurringDonation_Bind');
			$this->dtgRecurringDonation->NoDataHtml = 'No Recurring payments have been set up.';
				
			$this->dtgRecurringDonation->SortColumnIndex = 1;
			$this->dtgRecurringDonation->ItemsPerPage = 20;
			
			$this->btnAdd = new QButton($this);
			$this->btnAdd->Name = 'Add a Recurring Payment';
			$this->btnAdd->Text= 'Add a Recurring Payment';
			$this->btnAdd->CssClass = 'primary';
			$this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAdd_Click'));
			
			$this->btnBack = new QButton($this);
			$this->btnBack->Name = 'Return To Give Online';
			$this->btnBack->Text = 'Return To Give Online';
			$this->btnBack->CssClass = 'primary';
			$this->btnBack->AddAction(new QClickEvent(), new QAjaxAction('btnBack_Click'));				
		}
		
		public function btnAdd_Click() {
			QApplication::Redirect('/give/recurringInfo.php');
		}
		
		public function btnBack_Click() {
			QApplication::Redirect('/give/');
		}
		
		public function dtgRecurringDonation_Bind() {
			$this->dtgRecurringDonation->DataSource = RecurringDonation::LoadArrayByPersonId(QApplication::$PublicLogin->Person->Id);
		}
		
		public function RenderName(RecurringDonation $objDonation) {
			return sprintf('<a href="/give/recurringInfo.php/edit/%s">%s</a>', $objDonation->Id, QApplication::HtmlEntities($objDonation->RecurringPayment->Name));
		}
		public function RenderPaymentPeriod(RecurringDonation $objDonation) {
			return sprintf('%s',$objDonation->RecurringPayment->PaymentPeriod->Name);			
		}
		public function RenderStartDate(RecurringDonation $objDonation) {
			return sprintf('%s',$objDonation->RecurringPayment->StartDate->__toString('MMMM D, YYYY'));
		}
		public function RenderEndDate(RecurringDonation $objDonation) {
			return sprintf('%s',$objDonation->RecurringPayment->EndDate->__toString('MMMM D, YYYY'));
		}

	}

	Recurring::Run('Recurring');
?>