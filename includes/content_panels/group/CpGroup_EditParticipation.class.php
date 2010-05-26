<?php
	class CpGroup_EditParticipation extends CpGroup_Base {
		/**
		 * @var Person
		 */
		public $objPerson;

		/**
		 * @var EditGroupParticipation
		 */
		public $objDelegate;

		protected function SetupPanel() {
			// Get the group and check for validity / authorization
			$this->objPerson = Person::Load($this->strUrlHashArgument);
			if (!$this->objPerson) return $this->ReturnTo('#' . $this->objGroup->Id);

			$this->objDelegate = new EditGroupParticipation($this);
		}
	}
?>