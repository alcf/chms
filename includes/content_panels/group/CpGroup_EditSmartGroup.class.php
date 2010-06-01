<?php
	class CpGroup_EditSmartGroup extends CpGroup_Base {
		/**
		 * @var SmartGroupMetaControl
		 */
		public $mctSmartGroup;

		public $txtQuery;

		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanEdit(QApplication::$Login)) $this->ReturnTo('#' . $this->objGroup->Id);
			$this->SetupEditControls();

			// Setup Everything for Smart Group child
			if ($this->mctGroup->EditMode) {
				$this->mctSmartGroup = new SmartGroupMetaControl($this, $this->mctGroup->Group->SmartGroup);
			} else {
				// TODO: Implement "Create New" Smart Group
			}
			$this->SetupChildEditControls();
		}

		protected function SetupChildEditControls() {
			$this->txtQuery = $this->mctSmartGroup->txtQuery_Create();
			$this->txtQuery->Required = true;
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$blnRefreshGroups = $this->mctGroup->EditMode || ($this->mctGroup->Group->ParentGroupId != $this->lstParentGroup->SelectedValue);

			$this->mctGroup->SaveGroup();

			// Delegate "Save" processing to the SmartGroupMetaControl
			$this->mctSmartGroup->SaveSmartGroup();

			// Refresh
			if ($blnRefreshGroups) {
				Group::RefreshHierarchyDataForMinistry($this->mctGroup->Group->MinistryId);
				$this->objForm->pnlGroups_Refresh();
			}

			$this->ReturnTo('#' . $this->mctGroup->Group->Id);
		}
	}
?>