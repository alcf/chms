<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::ManageClassifieds));
	
	class AdminEditAttributeForm extends ChmsForm {
		protected $strPageTitle;
		protected $intNavSectionId = ChmsForm::NavSectionClassifieds;

		protected $mctClassifiedCategory;
		protected $txtName;
		protected $txtToken;
		protected $txtDescription;
		protected $txtInstructions;

		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		protected function Form_Create() {
			$this->mctClassifiedCategory = ClassifiedCategoryMetaControl::Create($this, QApplication::PathInfo(0), QMetaControlCreateType::CreateOrEdit);

			if (!$this->mctClassifiedCategory->EditMode) $this->mctClassifiedCategory->ClassifiedCategory->OrderNumber = 0;
			$this->strPageTitle = 'Classifieds - ' . (($this->mctClassifiedCategory->EditMode) ? 'Edit' : 'Create New') . ' Posting Category';

			$this->txtName = $this->mctClassifiedCategory->txtName_Create();
			$this->txtName->Required = true;

			$this->txtToken = $this->mctClassifiedCategory->txtToken_Create();
			$this->txtToken->Required = true;

			$this->txtDescription = $this->mctClassifiedCategory->txtDescription_Create();
			$this->txtDescription->Required = true;
			$this->txtDescription->Instructions = 'HTML of Description Text for this Posting Category';
			
			$this->txtInstructions = $this->mctClassifiedCategory->txtInstructions_Create();
			$this->txtInstructions->Required = true;
			$this->txtInstructions->Instructions = 'Bullet points of what needs to be included in every post (one per line)';

			$this->btnSave = new QButton($this);
			$this->btnSave->Text = ($this->mctClassifiedCategory->EditMode ? 'Update' : 'Create');
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			if (!$this->mctClassifiedCategory->ClassifiedCategory->CountClassifiedPosts()) {
				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->CssClass = 'delete';
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}
		}

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$this->txtName->Text = trim($this->txtName->Text);
			$this->txtToken->Text = QApplication::Tokenize($this->txtToken->Text);
			$this->txtDescription->Text = trim($this->txtDescription->Text);
			$this->txtInstructions->Text = trim($this->txtInstructions->Text);

			// Check Token for Unique
			if (($objCategory = ClassifiedCategory::LoadByToken($this->txtToken->Text)) &&
				($objCategory->Id != $this->mctClassifiedCategory->ClassifiedCategory->Id)) {
				$this->txtToken->Warning = 'Token is already taken';
				$this->txtToken->Blink();
				$this->txtToken->Focus();
				return;
			}

			$this->mctClassifiedCategory->SaveClassifiedCategory();
			ClassifiedCategory::RefreshOrderNumber();
			$this->ReturnToList();
		}

		protected function btnDelete_Click() {
			$this->mctClassifiedCategory->DeleteClassifiedCategory();
			ClassifiedCategory::RefreshOrderNumber();
			$this->ReturnToList();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->ReturnToList();
		}
	
		protected function ReturnToList() {
			QApplication::Redirect('/classifieds/categories.php');
		}
	}

	AdminEditAttributeForm::Run('AdminEditAttributeForm');
?>