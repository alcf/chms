<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class PaymentSignupQForm extends ChmsForm {
		protected $strPageTitle = 'Classified Acts - ';

		protected $objCategory;
		protected $dtgPosts;

		protected function Form_Run() {
			if (QApplication::$PublicLogin && !QApplication::$PublicLogin->Person) QApplication::PublicLogout(false);
		}

		protected function Form_Create() {
			$this->objCategory = ClassifiedCategory::LoadByToken(QApplication::PathInfo(0));
			if (!$this->objCategory) QApplication::Redirect('/classifieds/');
			$this->strPageTitle .= $this->objCategory->Name;
			
			$this->dtgPosts = new ClassifiedPostDataGrid($this);
			$this->dtgPosts->Paginator = new QPaginator($this->dtgPosts);
			$this->dtgPosts->MetaAddColumn('DatePosted', 'Html=<?= $_FORM->RenderDatePosted($_ITEM); ?>', 'Width=120px');
			$this->dtgPosts->MetaAddColumn('Title', 'Html=<?= $_FORM->RenderTitle($_ITEM); ?>', 'Width=750px', 'HtmlEntities=false');
			$this->dtgPosts->SetDataBinder('dtgPosts_Bind');
			$this->dtgPosts->SortColumnIndex = 0;
			$this->dtgPosts->SortDirection = 1;
			
			$this->dtgPosts->NoDataHtml = 'There are currently no approved posts that have been posted in the past 90 days.';
		}
		
		public function dtgPosts_Bind() {
			$this->dtgPosts->MetaDataBinder(QQ::AndCondition(
				QQ::Equal(QQN::ClassifiedPost()->ApprovalFlag, true),
				QQ::Equal(QQN::ClassifiedPost()->ClassifiedCategoryId, $this->objCategory->Id),
				QQ::GreaterOrEqual(QQN::ClassifiedPost()->DateExpired, QDateTime::Now())
			));
		}

		public function RenderDatePosted(ClassifiedPost $objPost) {
			return $objPost->DatePosted->ToString('MMM D YYYY');
		}

		public function RenderTitle(ClassifiedPost $objPost) {
			return sprintf('<a href="/classifieds/view.php/%s/%s">%s</a>', $this->objCategory->Token, $objPost->Id, QApplication::HtmlEntities($objPost->Title));
		}
	}

	PaymentSignupQForm::Run('PaymentSignupQForm');
?>