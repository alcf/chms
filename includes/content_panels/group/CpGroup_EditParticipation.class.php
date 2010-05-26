<?php
	class CpGroup_EditParticipation extends CpGroup_Base {
		/**
		 * @var Person
		 */
		public $objPerson;

		/**
		 * @var EditGroupParticipationDelegate
		 */
		public $objDelegate;

		/**
		 * @var string
		 */
		public $strReturnUrl;

		protected function SetupPanel() {
			// Get the person and check for validity / authorization
			$this->objPerson = Person::Load($this->strUrlHashArgument);
			if (!$this->objPerson) return $this->ReturnTo('#' . $this->objGroup->Id);

			$this->objDelegate = new EditGroupParticipationDelegate($this, '#' . $this->objGroup->Id);
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