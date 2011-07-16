<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class PaymentSignupQForm extends ChmsForm {
		protected $strPageTitle = 'Classified Acts - Submit Request';

		protected $objCategory;
		protected $mctPost;
		protected $txtTitle;
		protected $txtContent;
		protected $txtName;
		protected $txtPhone;
		protected $txtEmail;
		
		protected $btnSubmit;
		protected $btnCancel;
		
		protected function Form_Run() {
			if (QApplication::$PublicLogin && !QApplication::$PublicLogin->Person) QApplication::PublicLogout(false);
		}

		protected function Form_Validate() {
			$blnToReturn = true;

			$blnFirst = true;
			foreach ($this->GetErrorControls() as $objControl) {
				if ($blnFirst) {
					$blnFirst = false;
					$objControl->Focus();
				}
				$objControl->Blink();
			}

			return $blnToReturn;
		}

		protected function Form_Create() {
			$this->objCategory = ClassifiedCategory::LoadByToken(QApplication::PathInfo(0));
			if (!$this->objCategory) QApplication::Redirect('/classifieds/');

			$objPost = new ClassifiedPost();
			$objPost->ClassifiedCategory = $this->objCategory;
			$objPost->DatePosted = QDateTime::Now();
			$objPost->DateExpired = QDateTime::Now();
			$objPost->DateExpired->Day += 90;
			$objPost->ApprovalFlag = false;

			$this->mctPost = new ClassifiedPostMetaControl($this, $objPost);
			$this->txtTitle = $this->mctPost->txtTitle_Create();
			$this->txtTitle->Required = true;
			
			$this->txtContent = $this->mctPost->txtContent_Create();
			$this->txtContent->Required = true;

			$this->txtName = $this->mctPost->txtName_Create();
			$this->txtName->Required = true;

			$this->txtPhone = $this->mctPost->txtPhone_Create();
			$this->txtPhone->Required = true;

			$this->txtEmail = $this->mctPost->txtEmail_Create();
			$this->txtEmail->Required = true;

			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
			$this->btnSubmit->CssClass = 'primary';
			$this->btnSubmit->Text = 'Submit Request';
			$this->btnSubmit->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function btnSubmit_Click() {
			$this->mctPost->SaveClassifiedPost();
			QApplication::DisplayAlert('Thank you for your submission request.  Please wait up to five (5) business days for your post to appear on Classified Acts.');
			QApplication::ExecuteJavaScript('document.location="/classifieds/";');
		}

		protected function btnCancel_Click() {
			QApplication::Redirect('/classifieds');
		}
		
	}

	PaymentSignupQForm::Run('PaymentSignupQForm');
?>