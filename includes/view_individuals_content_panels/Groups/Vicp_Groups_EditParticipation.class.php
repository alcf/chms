<?php
	class Vicp_Groups_EditParticipation extends Vicp_Base {
		public $objGroup;
		public $lblCurrentRoles;
		public $btnAddNewRole;
		public $dtgParticipations;

		protected function SetupPanel() {
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#groups";');
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#groups";');
		}
	}
?>