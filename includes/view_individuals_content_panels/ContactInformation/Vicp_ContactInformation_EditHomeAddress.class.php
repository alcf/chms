<?php
	class Vicp_ContactInformation_EditHomeAddress extends Vicp_Base {
		/**
		 * @var EditHomeAddressDelegate
		 */
		public $objDelegate;

		protected function SetupPanel() {
			$this->objDelegate = new EditHomeAddressDelegate($this, '#contact', $this->strUrlHashArgument);
			$this->btnSave->RemoveAllActions(QClickEvent::EventName);
			$this->btnSave->AddAction(new QClickEvent(), new QShowDialogBox($this->objDelegate->dlgMessage));
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
		}

		public function Validate() {
			return $this->objDelegate->Validate(parent::Validate());
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
?>