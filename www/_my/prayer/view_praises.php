<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class ViewPraisesForm extends ChmsForm {
		protected $strPageTitle = 'Praises and Thanks';
		protected $dtgPraises;
		protected $lblSubject;
		protected $lblDate;
		protected $lblContent;
		protected $btnSubmitPraise;
		
		protected $objPraise;
		
		protected function Form_Create() {	
			$this->objPraise	= null;	
			$this->dtgPraises = new PraisesDataGrid($this);
			$this->dtgPraises->Paginator = new QPaginator($this->dtgPraises);
			$this->dtgPraises->MetaAddColumn('Date','Html=<?= $_ITEM->Date; ?>', 'HtmlEntities=false', 'Width=150px');
			$this->dtgPraises->AddColumn(new QDataGridColumn('Praises and Thanks', '<?= $_FORM->lnkSelected_Render($_ITEM) ?>','HtmlEntities=false','Width=750px'));
			$this->dtgPraises->SetDataBinder('dtgPraises_Bind');
			$this->dtgPraises->NoDataHtml = 'Currently there are no Praises.';
				
			$this->dtgPraises->SortColumnIndex = 1;
			$this->dtgPraises->ItemsPerPage = 20;
			
			$objStyle = $this->dtgPraises->HeaderRowStyle;
			$objStyle->ForeColor = '#ffffff';
			$objStyle->BackColor = '#AF8768';
			$objStyle->FontSize = 16;
			
			$this->lblSubject = new QLabel($this);
			$this->lblSubject->Width = 40;
			$this->lblSubject->Text = '';
			$this->lblSubject->Visible = false;
			
			$this->lblDate = new QLabel($this);
			$this->lblDate->Width = 10;
			$this->lblDate->Text = '';
			$this->lblDate->Visible = false;
			
			$this->lblContent = new QLabel($this);
			$this->lblContent->Width = 200;
			$this->lblContent->Height = 100;
			$this->lblContent->BorderColor = '#888888';
			$this->lblContent->Text = '';
			$this->lblContent->Visible = false;

			$this->btnSubmitPraise = new QButton($this);
			$this->btnSubmitPraise->Text = 'Submit a Praise or Thanks';
			$this->btnSubmitPraise->AddAction(new QClickEvent(), new QServerAction('btnSubmitPraise_Click'));
  		}
		
  		public function btnSubmitPraise_Click($strFormId, $strControlId, $strParameter) {
  			QApplication::Redirect('/prayer/submit_praise.php');
  		}
  		
		public function lnkSelected_Render(Praises $objPraise) {
			$strControlId = 'lnkSelected' . $objPraise->Id;

            // Let's see if the Checkbox exists already
            $lnkSelected = $this->GetControl($strControlId);
            
            if (!$lnkSelected) {
                $lnkSelected = new QButton($this->dtgPraises, $strControlId);
                $lnkSelected->Text = $objPraise->Subject;            
                $lnkSelected->ActionParameter = $objPraise->Id;
                $lnkSelected->CssClass = 'linkButton';
                $lnkSelected->AddAction(new QClickEvent(), new QServerAction('lnkSelected_Click'));
            }
            return $lnkSelected->Render(false);		}
		
		protected function dtgPraises_Refresh() {
			$this->dtgPraises->PageNumber = 1;
			$this->dtgPraises->Refresh();
		}
		
		protected function lnkSelected_Click($strFormId, $strControlId, $strParameter) {
			$intPraiseId = $strParameter;		
			$objPraise = Praises::Load($intPraiseId);
			if($objPraise) {					
				$this->objPraise = $objPraise;
				$this->lblSubject->Text = $objPraise->Subject;
				$this->lblSubject->Visible = true;
				$this->lblDate->Text = ($objPraise->Date)? $objPraise->Date->ToString() :'';
				$this->lblDate->Visible = true;
				$this->lblContent->Text = $objPraise->Content;
				$this->lblContent->Visible = true;		
			}
		}
		
		public function dtgPraises_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();							
			$this->dtgPraises->MetaDataBinder($objConditions, $objClauses);
		}
		
	}

	ViewPraisesForm::Run('ViewPraisesForm');
?>