<?php
	class Vicp_Comments extends Vicp_Base {
		public $dtgComments;

		protected function SetupPanel() {
			$this->dtgComments = new QDataGrid($this);
			$this->dtgComments->AlternateRowStyle->CssClass = 'alternate';
			              
			$objPaginator = new QPaginator($this->dtgComments);
			$this->dtgComments->Paginator = $objPaginator;
			$this->dtgComments->ItemsPerPage = 20; //TODO this hard code value needs to be set?                  
			            
			$this->dtgComments->AddColumn(new QDataGridColumn('Edit', '<?= $_CONTROL->ParentControl->RenderEdit($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgComments->AddColumn(new QDataGridColumn('Posted By', '<?= $_CONTROL->ParentControl->RenderPostedBy($_ITEM); ?>'));
			$this->dtgComments->AddColumn(new QDataGridColumn('Date', '<?= $_ITEM->DatePosted; ?>'));
			$this->dtgComments->AddColumn(new QDataGridColumn('Privacy Level', '<?= $_CONTROL->ParentControl->RenderPrivacyLevel($_ITEM); ?>'));
			$this->dtgComments->AddColumn(new QDataGridColumn('Category', '<?= $_CONTROL->ParentControl->RenderCommentCategory($_ITEM); ?>'));
			$this->dtgComments->AddColumn(new QDataGridColumn('Comment', '<?= $_ITEM->Comment; ?>'));
			$this->dtgComments->SetDataBinder('dtgComments_Bind', $this);
		}
		
		public function dtgComments_Bind() {
			$this->dtgComments->DataSource = $this->objPerson->GetCommentArray();
		}
		
		public function RenderPostedBy(Comment $objComment) {
			return $objComment->PostedByLogin->Name;
			//return CommentPrivacyType::$NameArray[$objComment->CommentPrivacyTypeId];
		}	
		
		public function RenderCommentCategory(Comment $objComment) {
			return $objComment->CommentCategory->Name;
		}
		
		public function RenderPrivacyLevel(Comment $objComment) {
			return CommentPrivacyType::$NameArray[$objComment->CommentPrivacyTypeId];
		}		
		
		// Edit is only available for comments posted by the login user
		public function RenderEdit(Comment $objComment) {
			if ($objComment->PostedByLoginId == $this->objPerson->Id){
				return sprintf('[<a href="#contact/edit_comment/%s">Edit</a>]', $objComment->Id);
			} else {
				return '[Edit]';
			}
		}		
}		
?>
