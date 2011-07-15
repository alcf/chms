<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminEditAttributeForm extends ChmsForm {
		protected $strPageTitle;
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $mctCommentCategory;
		protected $txtName;

		protected $btnSave;
		protected $btnCancel;

		protected function Form_Create() {
			$this->mctCommentCategory = CommentCategoryMetaControl::Create($this, QApplication::PathInfo(0), QMetaControlCreateType::CreateOrEdit);

			if (!$this->mctCommentCategory->EditMode) $this->mctCommentCategory->CommentCategory->OrderNumber = 0;
			$this->strPageTitle = 'Administration - ' . (($this->mctCommentCategory->EditMode) ? 'Edit' : 'Create New') . ' Comment Category';
			
			$this->txtName = $this->mctCommentCategory->txtName_Create();
			$this->txtName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = ($this->mctCommentCategory->EditMode ? 'Update' : 'Create');
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->txtName->Text = trim($this->txtName->Text);
			$this->mctCommentCategory->SaveCommentCategory();
			CommentCategory::RefreshOrderNumber();
			$this->ReturnToList();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->ReturnToList();
		}
	
		protected function ReturnToList() {
			QApplication::Redirect('/admin/comment_categories/');
		}
	}

	AdminEditAttributeForm::Run('AdminEditAttributeForm');
?>