<?php
	class Vicp_Groups_EditParticipation extends Vicp_Base {
		public $objGroup;
		public $lblCurrentRoles;
		public $btnAddNewRole;
		public $dtgParticipations;

		protected function SetupPanel() {
			// Get the group and check for validity / authorization
			$this->objGroup = Group::Load($this->strUrlHashArgument);
			if (!$this->objGroup) return $this->ReturnTo('#groups');
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) return $this->ReturnTo('#groups');

			
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#groups";');
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#groups";');
		}
	}
?>