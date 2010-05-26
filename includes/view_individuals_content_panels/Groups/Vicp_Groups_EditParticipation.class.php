<?php
	class Vicp_Groups_EditParticipation extends Vicp_Base {
		/**
		 * @var Group
		 */
		public $objGroup;

		/**
		 * @var EditGroupParticipationDelegate
		 */
		public $objDelegate;

		/**
		 * @var string
		 */
		public $strReturnUrl;

		protected function SetupPanel() {
			// Get the group and check for validity / authorization
			$this->objGroup = Group::Load($this->strUrlHashArgument);
			if (!$this->objGroup) return $this->ReturnTo('#groups');
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) return $this->ReturnTo('#groups');

			$this->objDelegate = new EditGroupParticipationDelegate($this, '#groups');
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