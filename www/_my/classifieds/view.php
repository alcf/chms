<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class PaymentSignupQForm extends ChmsForm {
		protected $strPageTitle = 'Classified Acts - ';

		protected $objCategory;
		protected $objPost;

		protected function Form_Run() {
			if (QApplication::$PublicLogin && !QApplication::$PublicLogin->Person) QApplication::PublicLogout(false);
		}

		protected function Form_Create() {
			$this->objCategory = ClassifiedCategory::LoadByToken(QApplication::PathInfo(0));
			if (!$this->objCategory) QApplication::Redirect('/classifieds/');
			
			$this->objPost = ClassifiedPost::Load(QApplication::PathInfo(1));
			if (!$this->objPost) QApplication::Redirect('/classifieds/list.php/' . $this->objCategory->Token);
			if (!$this->objPost->IsViewable()) QApplication::Redirect('/classifieds/list.php/' . $this->objCategory->Token);
			if ($this->objPost->ClassifiedCategoryId != $this->objCategory->Id) QApplication::Redirect('/classifieds/list.php/' . $this->objCategory->Token);

			$this->strPageTitle .= $this->objPost->Title;
		}
	}

	PaymentSignupQForm::Run('PaymentSignupQForm');
?>