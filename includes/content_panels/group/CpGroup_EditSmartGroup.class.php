<?php
	class CpGroup_EditSmartGroup extends CpGroup_Base {
		/**
		 * @var SmartGroupMetaControl
		 */
		public $mctSmartGroup;
		
		public $objSearchQuery;
		public $pnlSearchQuery;

		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanEdit(QApplication::$Login)) $this->ReturnTo('#' . $this->objGroup->Id);
			$this->SetupEditControls();

			// Setup Everything for Smart Group child
			if ($this->mctGroup->EditMode) {
				$this->mctSmartGroup = new SmartGroupMetaControl($this, $this->mctGroup->Group->SmartGroup);
				$this->objSearchQuery = $this->mctGroup->Group->SmartGroup->SearchQuery;
			} else {
				$this->mctSmartGroup = new SmartGroupMetaControl($this, new SmartGroup());
				$this->objSearchQuery = new SearchQuery();
			}
			$this->SetupChildEditControls();
		}

		protected function SetupChildEditControls() {
			$this->pnlSearchQuery = new SearchQueryPanel($this->objSearchQuery, $this);
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$blnRefreshGroups = !$this->mctGroup->EditMode || ($this->mctGroup->Group->ParentGroupId != $this->lstParentGroup->SelectedValue);

			$this->mctGroup->SaveGroup();

			// Delegate "Save" processing to the SmartGroupMetaControl
			if (!$this->mctSmartGroup->EditMode) {
				$this->objSearchQuery->Save();
				$this->mctSmartGroup->SmartGroup->SearchQuery = $this->objSearchQuery;
				$this->mctSmartGroup->SmartGroup->Group = $this->mctGroup->Group;
			}

			// Now we can save the Smart Group
			$this->mctSmartGroup->SaveSmartGroup();

			// Save the Search Query stuff
			$this->pnlSearchQuery->Save();
			$this->objSearchQuery->RefreshDescription();
			
			$this->mctSmartGroup->SmartGroup->RefreshParticipationList();

			// Refresh
			if ($blnRefreshGroups) {
				Group::RefreshHierarchyDataForMinistry($this->mctGroup->Group->MinistryId);
				$this->objForm->pnlGroups_Refresh();
			}

			$this->ReturnTo('#' . $this->mctGroup->Group->Id);
		}
	}
?>