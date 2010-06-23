<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class EditHouseholdHomeAddressPanel extends QPanel {
		public $btnSave;
		public $btnCancel;

		/**
		 * @var EditHomeAddressDelegate
		 */
		public $objDelegate;

		/**
		 * Make sure the caller of this method is also a "return" call to cease processing within that given method.
		 * This will safely redirect the user back to whatever URL is being requested, even if it's a HASH.
		 * @param string $strUrl
		 * @return null
		 */
		public function ReturnTo($strUrl) {
			$this->strTemplate = null;
			QApplication::ExecuteJavaScript('document.location = "' . $strUrl . '";');
			return null;
		}

		/**
		 * We're using the Delegate to consolidate code between this panel and the Vicp_Groups_EditParticipation panel
		 * 
		 * @param string $strMethod
		 * @param mixed[] $arrArguments
		 * @return mixed
		 */
		public function __call($strMethod, $arrArguments) {
			return call_user_func_array(array($this->objDelegate, $strMethod), $arrArguments);
		}
	}

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

			$this->pnlContent->btnSave = new QButton($this->pnlContent);
			$this->pnlContent->btnSave->CssClass = 'primary';
			$this->pnlContent->btnSave->Text = 'Save';
			$this->pnlContent->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this->pnlContent, 'btnSave_Click'));

			$this->pnlContent->btnCancel = new QLinkButton($this->pnlContent);
			$this->pnlContent->btnCancel->CssClass = 'cancel';
			$this->pnlContent->btnCancel->Text = 'Cancel';
			$this->pnlContent->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this->pnlContent, 'btnCancel_Click'));
			$this->pnlContent->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->pnlContent->objDelegate = new EditHomeAddressDelegate($this->pnlContent, '/households/view.php/' . $this->objHousehold->Id, QApplication::PathInfo(1));

			$this->strPageTitle = ($this->pnlContent->objDelegate->mctAddress->EditMode ? 'Edit' : 'Create New') . ' ' . $this->strPageTitle;
		}

		
	}

	EditHouseholdHomeAddressForm::Run('EditHouseholdHomeAddressForm');
?>