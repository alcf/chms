<?php
	class CpGroup_EditGroupCategory extends CpGroup_Base {
		/**
		 * @var GroupCategoryMetaControl
		 */
		public $mctGroupCategory;

		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanEdit(QApplication::$Login)) $this->ReturnTo('#' . $this->objGroup->Id);
			$this->SetupEditControls();
			
			// Setup Everything for Smart Group child
			if ($this->mctGroup->EditMode) {
				$this->mctGroupCategory = new GroupCategoryMetaControl($this, $this->mctGroup->Group->GroupCategory);
			} else {
				$this->mctGroupCategory = new GroupCategoryMetaControl($this, new GroupCategory());
			}
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$blnRefreshGroups = !$this->mctGroup->EditMode || ($this->mctGroup->Group->ParentGroupId != $this->lstParentGroup->SelectedValue);

			$this->mctGroup->SaveGroup();

			// Delegate "Save" processing to the GroupCategoryMetaControl
			if (!$this->mctGroupCategory->EditMode) {
				$this->mctGroupCategory->GroupCategory->Group = $this->mctGroup->Group;
			}

			// Now we can save the Smart Group
			$this->mctGroupCategory->SaveGroupCategory();

			if ($blnRefreshGroups) {
				Group::RefreshHierarchyDataForMinistry($this->mctGroup->Group->MinistryId);
				$this->objForm->pnlGroups_Refresh();
			}

			$this->ReturnTo('#' . $this->mctGroup->Group->Id);
		}
	}
?>