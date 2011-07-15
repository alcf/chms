<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

	class PaymentSignupQForm extends ChmsForm {
		protected $strPageTitle = 'Classified Acts';

		protected $dtrCategories;

		protected function Form_Run() {
			if (QApplication::$PublicLogin && !QApplication::$PublicLogin->Person) QApplication::PublicLogout(false);
		}

		protected function Form_Create() {
			$this->dtrCategories = new QDataRepeater($this);
			$this->dtrCategories->Template = dirname(__FILE__) . '/dtrCategories.tpl.php';
			$this->dtrCategories->SetDataBinder('dtrCategories_Bind');
		}

		public function dtrCategories_Bind() {
			$this->dtrCategories->DataSource = ClassifiedCategory::LoadAll(QQ::OrderBy(QQN::ClassifiedCategory()->OrderNumber));
		}
	}

	PaymentSignupQForm::Run('PaymentSignupQForm');
?>