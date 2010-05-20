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
				$this->btnSave->Text = 'Create';				
			} else {
				// Ensure the this loginId can modify this comment
				if ($this->mctComments->Comment->PostedByLoginId != $this->objPerson->Id) {
					return $this->ReturnTo('#Comments');
				}
				$this->btnSave->Text = 'Update';
			}
	
			// Create Controls
			$this->lstPrivacyLevel = $this->mctComments->lstCommentPrivacyType_Create();
			$this->lstCategory = $this->mctComments->lstCommentCategory_Create();
			$this->txtComment = $this->mctComments->txtComment_Create();
			

			//TODO
			QApplication::ExecuteJavaScript('alert("Here we go");');
			
			$this->mctComments->lstPerson_Create();
			$this->mctComments->lstPostedByLogin_Create();
			$this->mctComments->calDatePosted_Create();
			
	
			
			//TODO
			$a1 = $this->mctComments->Comment->PersonId;
			$a2 = $this->mctComments->Comment->PostedByLoginId;
			$a3 = $this->mctComments->Comment->CommentPrivacyTypeId;
			$a4 = $this->mctComments->Comment->CommentCategoryId;
			$a5 = $this->mctComments->Comment->Comment;
			$a6 = $this->mctComments->Comment->DatePosted;
			QApplication::ExecuteJavaScript('alert("a1=' . $a1 . ' a2=' . $a2 . ' a3=' . $a3 . ' a4=' . $a4 . '");');
			
		}		
	
		public function btnSave_Click() {
			QApplication::ExecuteJavaScript('alert("btnSave CLICKED");');
			$this->mctComments->SaveComment();
			QApplication::ExecuteJavaScript('document.location="#Comments";');
		}
	
		public function btnCancel_Click() {
			QApplication::ExecuteJavaScript('document.location="#Comments";');
		}	
	}		
?>
