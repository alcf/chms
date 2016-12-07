<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class ViewPrayerForm extends ChmsForm {
		protected $strPageTitle = 'View Prayer Requests';
		protected $dtgPrayerRequests;
		protected $lblSubject;
		protected $lblDate;
		protected $lblContent;
		protected $lblPrayerCount;
		protected $btnIPrayed;
		protected $btnEncouragement;
		protected $btnInappropriate;
		protected $objPrayerRequest;
		
		protected function Form_Create() {	
			$this->objPrayerRequest	= null;	
			$this->dtgPrayerRequests = new PrayerRequestDataGrid($this);
			$this->dtgPrayerRequests->Paginator = new QPaginator($this->dtgPrayerRequests);
			$this->dtgPrayerRequests->MetaAddColumn('Date','Html=<?= $_ITEM->Date; ?>', 'HtmlEntities=false', 'Width=150px');
			$this->dtgPrayerRequests->AddColumn(new QDataGridColumn('Prayer Request', '<?= $_FORM->lnkSelected_Render($_ITEM) ?>','HtmlEntities=false','Width=750px'));
			$this->dtgPrayerRequests->SetDataBinder('dtgPrayerRequests_Bind');
			$this->dtgPrayerRequests->NoDataHtml = 'Currently there are no Prayer Requests.';
			$objStyle = $this->dtgPrayerRequests->RowStyle;
            $objStyle->BackColor = '#787878';
            $objStyle->FontSize = 12;

            $objStyle = $this->dtgPrayerRequests->AlternateRowStyle;
            $objStyle->BackColor = '#262526';

            $objStyle = $this->dtgPrayerRequests->HeaderRowStyle;
            $objStyle->ForeColor = '#ffffff';
            $objStyle->BackColor = '#AF8768';
            $objStyle->FontSize = 16;
				
			$this->dtgPrayerRequests->SortColumnIndex = 1;
			$this->dtgPrayerRequests->ItemsPerPage = 20;
			
			$this->lblSubject = new QLabel($this);
			//$this->lblSubject->Width = 40;
			$this->lblSubject->Text = '';
			
			$this->lblDate = new QLabel($this);
			//$this->lblDate->Width = 10;
			$this->lblDate->Text = '';
			
			$this->lblContent = new QLabel($this);
			//$this->lblContent->Width = '50%';
			//$this->lblContent->Height = 100;
			$this->lblContent->BorderColor = '#888888';
			$this->lblContent->Text = '';
			
			$this->lblPrayerCount= new QLabel($this);
			$this->lblPrayerCount->HtmlEntities = false;
			$this->lblPrayerCount->Text = '0 People prayed for you';
			$this->lblPrayerCount->Visible = false;
			$this->btnIPrayed = new QButton($this);
			$this->btnIPrayed->Text = 'I prayed for you';
			$this->btnIPrayed->CssClass = 'linkButton';
            $this->btnIPrayed->AddAction(new QClickEvent(), new QServerAction('btnIPrayed_Click'));
            $this->btnIPrayed->Visible = false;
            
            $this->btnInappropriate = new QButton($this);
			$this->btnInappropriate->Text = 'Flag as inappropriate';
			$this->btnInappropriate->CssClass = 'linkButtonRight';
            $this->btnInappropriate->AddAction(new QClickEvent(), new QServerAction('btnInappropriate_Click'));
            $this->btnInappropriate->Visible = false;
            
            $this->btnEncouragement = new QButton($this);
			$this->btnEncouragement->Text = 'Send a note of encouragement';
			$this->btnEncouragement->CssClass = 'linkButtonRight';
            $this->btnEncouragement->AddAction(new QClickEvent(), new QServerAction('btnEncouragement_Click'));
            $this->btnEncouragement->Visible = false;
		}

		public function btnInappropriate_Click($strFormId, $strControlId, $strParameter) {
			if($this->objPrayerRequest != null){
				$this->objPrayerRequest->IsInappropriate = true;
				$this->objPrayerRequest->Save();
				$this->dtgPrayerRequests_Refresh();
			}
		}
		public function btnEncouragement_Click($strFormId, $strControlId, $strParameter) {
			$intPrayerId = $this->objPrayerRequest->Id;
			QApplication::Redirect('send_note.php/'.$intPrayerId);	
		}
		public function btnIPrayed_Click($strFormId, $strControlId, $strParameter) {
			if($this->objPrayerRequest != null){
				$this->objPrayerRequest->PrayerCount++;
				$this->objPrayerRequest->Save();
				
				$imgPrayerCount = '<img src="/assets/images/spacer.png" class="prayerStar" />'.
					' '.$this->objPrayerRequest->PrayerCount. ' People prayed for you';				
				$this->lblPrayerCount->Text = $imgPrayerCount;
			}
		}
		
		public function lnkSelected_Render(PrayerRequest $objPrayerRequest) {
			$strControlId = 'lnkSelected' . $objPrayerRequest->Id;

            // Let's see if the Checkbox exists already
            $lnkSelected = $this->GetControl($strControlId);
            
            if (!$lnkSelected) {
                $lnkSelected = new QButton($this->dtgPrayerRequests, $strControlId);
                $lnkSelected->Text = $objPrayerRequest->Subject;            
                $lnkSelected->ActionParameter = $objPrayerRequest->Id;
                $lnkSelected->CssClass = 'linkButton';
                $lnkSelected->AddAction(new QClickEvent(), new QServerAction('lnkSelected_Click'));
            }
            return $lnkSelected->Render(false);		}
		
		protected function dtgPrayerRequests_Refresh() {
			$this->dtgPrayerRequests->PageNumber = 1;
			$this->dtgPrayerRequests->Refresh();
		}
		
		protected function lnkSelected_Click($strFormId, $strControlId, $strParameter) {
			$intPrayerRequestId = $strParameter;		
			$objPrayerRequest = PrayerRequest::Load($intPrayerRequestId);
			if($objPrayerRequest) {
				$this->btnInappropriate->Visible = true;
				if($objPrayerRequest->IsAllowNotes)
					$this->btnEncouragement->Visible = true;
				else 
					$this->btnEncouragement->Visible = false;
				if($objPrayerRequest->IsPrayerIndicator) {
					$this->lblPrayerCount->Visible = true;
					$this->btnIPrayed->Visible = true;
				} else {
					$this->lblPrayerCount->Visible = false;
					$this->btnIPrayed->Visible = false;
				}
				$this->objPrayerRequest = $objPrayerRequest;
				$this->lblSubject->Text = $objPrayerRequest->Subject;
				$this->lblDate->Text = ($objPrayerRequest->Date)? $objPrayerRequest->Date->ToString() :'';
				$this->lblContent->Text = $objPrayerRequest->Content;
				$imgPrayerCount = '<img src="/assets/images/spacer.png" class="prayerStar" />'.
					' '.$this->objPrayerRequest->PrayerCount. ' People prayed for you';	
				$this->lblPrayerCount->Text = $imgPrayerCount;			
			}
		}
		
		public function dtgPrayerRequests_Bind() {
			$objConditions = QQ::AndCondition( QQ::Equal(QQN::PrayerRequest()->IsConfidential, false),
											   QQ::Equal(QQN::PrayerRequest()->IsInappropriate, false));
			$objClauses = array();
							
			$this->dtgPrayerRequests->MetaDataBinder($objConditions, $objClauses);
		}
		
	}

	ViewPrayerForm::Run('ViewPrayerForm');
?>