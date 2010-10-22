<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	require(dirname(__FILE__) . '/EditHouseholdHomeAddressPanel.class.php');
	QApplication::Authenticate();

	class EditHouseholdHomeAddressForm extends ChmsForm {
		protected $strPageTitle;
		protected $intNavSectionId = ChmsForm::NavSectionHouseholds;

		/**
		 * @var Household
		 */
		public $objHousehold;

		public $pnlContent;

		protected function Form_Create() {
			// Setup Household Object
			$this->objHousehold = Household::Load(QApplication::PathInfo(0));
			if (!$this->objHousehold) QApplication::Redirect('/households/');
			$this->strPageTitle .= 'Home Address - ' . $this->objHousehold->Name;

			$this->pnlContent = new EditHouseholdHomeAddressPanel($this);
			$this->pnlContent->objDelegate = new EditHomeAddressDelegate($this->pnlContent, '/households/view.php/' . $this->objHousehold->Id, QApplication::PathInfo(1));
			$this->pnlContent->btnSave->AddAction(new QClickEvent(), new QShowDialogBox($this->pnlContent->objDelegate->dlgMessage));
			$this->pnlContent->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this->pnlContent, 'btnSave_Click'));

			$this->strPageTitle = ($this->pnlContent->objDelegate->mctAddress->EditMode ? 'Edit' : 'Create New') . ' ' . $this->strPageTitle;
		}

	}

	EditHouseholdHomeAddressForm::Run('EditHouseholdHomeAddressForm');
?>