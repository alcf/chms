<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class PrayerRoomForm extends ChmsForm {
		protected $strPageTitle = 'Prayer Room';
		protected $btnSubmitPrayer;
		protected $btnSubmitConfidentialPrayer;
		protected $btnViewPrayer;
		protected $btnPraises;

		protected function Form_Create() {			
			$this->btnSubmitPrayer = new QButton($this);
			$this->btnSubmitPrayer->Text = 'Submit a Prayer Request';
			$this->btnSubmitPrayer->CausesValidation = false;
			$this->btnSubmitPrayer->AddAction(new QClickEvent(), new QAjaxAction('btnSubmitPrayer_Click'));
			
			$this->btnSubmitConfidentialPrayer = new QButton($this);
			$this->btnSubmitConfidentialPrayer->Text = 'Submit a Confidential Prayer Request';
			$this->btnSubmitConfidentialPrayer->CausesValidation = false;
			$this->btnSubmitConfidentialPrayer->AddAction(new QClickEvent(), new QAjaxAction('btnSubmitConfidentialPrayer_Click'));
				
			$this->btnViewPrayer = new QButton($this);
			$this->btnViewPrayer->Text = 'View Non-Confidential Prayer Requests';
			$this->btnViewPrayer->CausesValidation = false;
			$this->btnViewPrayer->AddAction(new QClickEvent(), new QAjaxAction('btnViewPrayer_Click'));		
			
			$this->btnPraises = new QButton($this);
			$this->btnPraises->Text = 'Praises and Thanks';
			$this->btnPraises->CausesValidation = false;
			$this->btnPraises->AddAction(new QClickEvent(), new QAjaxAction('btnPraises_Click'));		
		}

		protected function btnSubmitPrayer_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/prayer/submit_prayer.php');
		}
		protected function btnSubmitConfidentialPrayer_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/prayer/submit_confidential_prayer.php');
		}
		protected function btnViewPrayer_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/prayer/view_prayer.php');
		}
		protected function btnPraises_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('/prayer/view_praises.php');
		}
	}

	PrayerRoomForm::Run('PrayerRoomForm');
?>