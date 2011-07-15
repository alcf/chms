<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::ManageClassifieds));
	
	class AdminEditAttributeForm extends ChmsForm {
		protected $strPageTitle;
		protected $intNavSectionId = ChmsForm::NavSectionClassifieds;

		protected $mctPost;
		protected $txtTitle;
		protected $txtContent;
		protected $lstClassifiedCategory;
		protected $calDatePosted;
		protected $calDateExpired;

		protected $lblName;
		protected $lblPhone;
		protected $lblEmail;

		protected $chkApprovalFlag;

		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function Form_Create() {
			$objPost = ClassifiedPost::Load(QApplication::PathInfo(0));
			if (!$objPost) QApplication::Redirect('/classifieds/');

			$this->mctPost = new ClassifiedPostMetaControl($this, $objPost);
			$this->strPageTitle = 'Classifieds - Edit Post';

			$this->txtTitle = $this->mctPost->txtTitle_Create();
			$this->txtTitle->Required = true;

			$this->txtContent = $this->mctPost->txtContent_Create();
			$this->txtContent->Required = true;
			
			$this->lstClassifiedCategory = $this->mctPost->lstClassifiedCategory_Create();
			$this->lstClassifiedCategory->Required = true;

			$this->calDatePosted = $this->mctPost->calDatePosted_Create();
			$this->calDatePosted->Required = true;

			$this->calDateExpired = $this->mctPost->calDateExpired_Create();
			$this->calDateExpired->Required = true;
			
			$this->chkApprovalFlag = $this->mctPost->chkApprovalFlag_Create();
			
			$this->lblName = $this->mctPost->lblName_Create();
			$this->lblPhone = $this->mctPost->lblPhone_Create();
			$this->lblEmail = $this->mctPost->lblEmail_Create();

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Update';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->btnDelete = new QLinkButton($this);
			$this->btnDelete->Text = 'Delete';
			$this->btnDelete->CssClass = 'delete';
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to DELETE this post?  Generally this is not needed.  Simply leaving it in Not Approved status will keep it off the main website.'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->txtTitle->Text = trim($this->txtTitle->Text);
			$this->txtContent->Text = trim($this->txtContent->Text);
			
			$this->mctPost->SaveClassifiedPost();
			$this->ReturnToList();
		}

		protected function btnDelete_Click() {
			$this->mctPost->DeleteClassifiedPost();
			$this->ReturnToList();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->ReturnToList();
		}
	
		protected function ReturnToList() {
			QApplication::Redirect('/classifieds/');
		}
	}

	AdminEditAttributeForm::Run('AdminEditAttributeForm');
?>