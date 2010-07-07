<?php
	class Vicp_Comments extends Vicp_Base {
		public $dtgComments;

		protected function SetupPanel() {
			$this->dtgComments = new CommentDataGrid($this);
			$this->dtgComments->AddColumn(new QDataGridColumn('Edit', '<?= $_CONTROL->ParentControl->RenderEdit($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgComments->MetaAddColumn(QQN::Comment()->PostedByLogin->FirstName, 'Name=Posted By', 'Html=<?= $_CONTROL->ParentControl->RenderPostedBy($_ITEM); ?>');
			$this->dtgComments->MetaAddColumn('DatePosted', 'Html=<?= $_ITEM->DatePosted->ToString("MMM D YYYY"); ?>');
			$this->dtgComments->MetaAddTypeColumn('CommentPrivacyTypeId', 'CommentPrivacyType', 'Name=Privacy Level');
			$this->dtgComments->MetaAddColumn(QQN::Comment()->CommentCategory->Name, 'Name=Category');
			$this->dtgComments->MetaAddColumn('Comment');
			$this->dtgComments->SetDataBinder('dtgComments_Bind', $this);
		}
		
		public function dtgComments_Bind() {
			$this->dtgComments->MetaDataBinder(QQ::Equal(QQN::Comment()->PersonId, $this->objPerson->Id));
		}
		
		public function RenderPostedBy(Comment $objComment) {
			return $objComment->PostedByLogin->Name;
		}	
		
		// Edit is only available for comments posted by the login user
		public function RenderEdit(Comment $objComment) {
			if ($objComment->PostedByLoginId == $this->objPerson->Id){
				return sprintf('<a href="#Comments/edit_comment/%s">Edit</a>', $objComment->Id);
			} else {
				return '&nbsp;';
			}
		}		
}		
?>
