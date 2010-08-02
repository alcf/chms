<?php
	class Vicp_Comments_EditComment extends Vicp_Base {
		public $mctComments;
		
		public $lstPrivacyLevel;
		public $lstCategory;
		public $txtComment;
		
		protected function SetupPanel() {
			// Get and Validate the Comments Object
			$this->mctComments = CommentMetaControl::Create($this, $this->strUrlHashArgument, QMetaControlCreateType::CreateOnRecordNotFound);

			if (!$this->mctComments->EditMode) {				
				// Trying to create a NEW comment
				$this->mctComments->Comment->Person = $this->objPerson;
				$this->mctComments->Comment->PostedByLogin = QApplication::$Login;
				$this->btnSave->Text = 'Create';
			} else {
				// Ensure the this loginId can modify this comment
				if (!$this->mctComments->Comment->IsLoginCanEdit(QApplication::$Login)) return $this->ReturnTo('#comments');
				$this->btnSave->Text = 'Update';
			}
	
			// Create Controls
			$this->lstPrivacyLevel = $this->mctComments->lstCommentPrivacyType_Create();

			if (!QApplication::$Login->IsPermissionAllowed(PermissionType::AccessConfidentialNotes)) {
				$this->lstPrivacyLevel->RemoveItem(0);
			}

			$this->lstCategory = $this->mctComments->lstCommentCategory_Create(null, null, QQ::OrderBy(QQN::CommentCategory()->Name));
			$this->txtComment = $this->mctComments->txtComment_Create();
			$this->txtComment->Width = '500px';
			$this->txtComment->Height = '200px';
		}

		public function btnSave_Click() {
			if (!$this->mctComments->EditMode) {
				$this->mctComments->Comment->DatePosted = QDateTime::Now();
			}

			$this->mctComments->SaveComment();
			QApplication::ExecuteJavaScript('document.location="#comments";');
		}

		public function btnCancel_Click() {
			QApplication::ExecuteJavaScript('document.location="#comments";');
		}	
	}		
?>