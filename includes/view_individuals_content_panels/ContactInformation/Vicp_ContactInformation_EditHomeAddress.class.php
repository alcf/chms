<?php
	class Vicp_ContactInformation_EditHomeAddress extends Vicp_Base {
		/**
		 * @var EditHomeAddressDelegate
		 */
		public $objDelegate;

		protected function SetupPanel() {
			$this->objDelegate = new EditHomeAddressDelegate($this, '#contact', $this->strUrlHashArgument);
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