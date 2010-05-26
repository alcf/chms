<?php
	class CpGroup_EditParticipation extends CpGroup_Base {
		/**
		 * @var Person
		 */
		public $objPerson;
	
		protected function SetupPanel() {
			$this->objPerson = Person::Load($this->strUrlHashArgument);
			if (!$this->objPerson) {
				$this->ReturnTo('#' . $this->objGroup->Id);
			}
		}
	}
?>