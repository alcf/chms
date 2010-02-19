<?php
	class HouseholdSelectorPanel extends QPanel {
		public function __construct($objParentObject, $strControlId = null) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			$this->strTemplate = dirname(__FILE__) . '/HouseholdSelectorPanel.tpl.php';
		}
	}
?>