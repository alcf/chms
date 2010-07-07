<?php
	class Vicp_Comments extends Vicp_Base {
		public $dtgComments;

		protected function SetupPanel() {
			$this->dtgComments = new CommentDataGrid($this);
			$this->dtgComments->AddColumn(new QDataGridColumn('Edit', '<?= $_CONTROL->ParentControl->RenderEdit($_ITEM); ?>', 'HtmlEntities=false', 'FontSize=11px', 'Width=30px'));
			$this->dtgComments->MetaAddColumn(QQN::Comment()->PostedByLogin->FirstName, 'Name=Posted By', 'Html=<?= $_CONTROL->ParentControl->RenderPostedBy($_ITEM); ?>', 'FontSize=11px', 'Width=90px');
			$this->dtgComments->MetaAddColumn('DatePosted', 'Html=<?= $_ITEM->DatePosted->ToString("MMM D YYYY"); ?>', 'FontSize=11px', 'Width=90px');
			$this->dtgComments->MetaAddColumn('Comment', 'Width=410px');
			$this->dtgComments->AddColumn(new QDataGridColumn('Category<br/><span style="font-size: 10px;">Privacy Level</span>', '<?= $_CONTROL->ParentControl->RenderCategoryPrivacy($_ITEM); ?>', 'HtmlEntities=false', 'FontSize=11px', 'Width=90px'));
			$this->dtgComments->SetDataBinder('dtgComments_Bind', $this);

			$this->dtgComments->SortColumnIndex = 2;
			$this->dtgComments->SortDirection = 1;
		}
		
		public function dtgComments_Bind() {
			// Only bind comments about this person
			$objCondition = QQ::Equal(QQN::Comment()->PersonId, $this->objPerson->Id);

			// Do NOT allow viewing of Confidential notes if the Login isn't allowed to see them
			if (!QApplication::$Login->IsPermissionAllowed(PermissionType::AccessConfidentialNotes)) {
				$objCondition = QQ::AndCondition($objCondition, QQ::NotEqual(QQN::Comment()->CommentPrivacyTypeId, CommentPrivacyType::Confidential));
			}

			// Perform the Bind
			$this->dtgComments->MetaDataBinder($objCondition);
		}

		public function RenderPostedBy(Comment $objComment) {
			return $objComment->PostedByLogin->Name;
		}	

		public function RenderCategoryPrivacy(Comment $objComment) {
			$strToReturn = QApplication::HtmlEntities($objComment->CommentCategory->Name);
			$strToReturn .= '<br/><span class="subtext">' . QApplication::HtmlEntities(CommentPrivacyType::$NameArray[$objComment->CommentPrivacyTypeId]) . '</span>';
			return $strToReturn;
		}

		// Edit is only available for comments posted by the login user
		public function RenderEdit(Comment $objComment) {
			if ($objComment->PostedByLoginId == QApplication::$Login->Id) {
				return sprintf('<a href="#Comments/edit_comment/%s">Edit</a>', $objComment->Id);
			} else {
				return '&nbsp;';
			}
		}	
	}
?>