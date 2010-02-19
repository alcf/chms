<?php
	abstract class Vicp_Base extends QPanel {
		public $objPerson;
		public $strUrlHashArgument;

		public function __construct($objParentObject, $strControlId = null, Person $objPerson = null, $strUrlHashArgument) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			$this->strTemplate = dirname(__FILE__) . '/../' . $this->objForm->strSubNavItemArray[$this->objForm->strSubNavItemToken][1] . '/' . get_class($this) . '.tpl.php';
			$this->objPerson = $objPerson;
			$this->strUrlHashArgument = $strUrlHashArgument;
			$this->SetupPanel();
		}

		abstract protected function SetupPanel();
	}
?>