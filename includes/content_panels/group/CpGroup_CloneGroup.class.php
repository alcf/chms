<?php
	class CpGroup_CloneGroup extends CpGroup_Base {
		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanEdit(QApplication::$Login)) $this->ReturnTo('#' . $this->objGroup->Id);
			$this->SetupEditControls();
		}
		
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			//Create New Group from information stored in mctGroup	
			$objCloneGroup = new Group();
			// Update any fields for controls that have been created
			if($this->mctGroup->GroupTypeIdControl)$objCloneGroup->GroupTypeId = $this->mctGroup->GroupTypeIdControl->SelectedValue;
			if($this->mctGroup->MinistryIdControl)$objCloneGroup->MinistryId = $this->mctGroup->MinistryIdControl->SelectedValue;
			if($this->mctGroup->NameControl)$objCloneGroup->Name = $this->mctGroup->NameControl->Text;
			if($this->mctGroup->DescriptionControl)$objCloneGroup->Description = $this->mctGroup->DescriptionControl->Text;
			if($this->mctGroup->ParentGroupIdControl)$objCloneGroup->ParentGroupId = $this->mctGroup->ParentGroupIdControl->SelectedValue;
			if($this->mctGroup->HierarchyLevelControl)$objCloneGroup->HierarchyLevel = $this->mctGroup->HierarchyLevelControl->Text;
			if($this->mctGroup->HierarchyOrderNumberControl)$objCloneGroup->HierarchyOrderNumber = $this->mctGroup->HierarchyOrderNumberControl->Text;
			if($this->mctGroup->ConfidentialFlagControl)$objCloneGroup->ConfidentialFlag = $this->mctGroup->ConfidentialFlagControl->Checked;
			if($this->mctGroup->EmailBroadcastTypeIdControl)$objCloneGroup->EmailBroadcastTypeId = $this->mctGroup->EmailBroadcastTypeIdControl->SelectedValue;
			if($this->mctGroup->TokenControl) $objCloneGroup->Token = $this->mctGroup->TokenControl->Text;
			if($this->mctGroup->ActiveFlagControl)$objCloneGroup->ActiveFlag = $this->mctGroup->ActiveFlagControl->Checked;
			
			// Update any UniqueReverseReferences (if any) for controls that have been created for it
			if($this->mctGroup->GroupCategoryControl)$objCloneGroup->GroupCategory = GroupCategory::Load($this->mctGroup->GroupCategoryControl->SelectedValue);
			if($this->mctGroup->GrowthGroupControl) $objCloneGroup->GrowthGroup = GrowthGroup::Load($this->mctGroup->GrowthGroupControl->SelectedValue);
			if ($this->mctGroup->SmartGroupControl) $objCloneGroup->SmartGroup = SmartGroup::Load($this->mctGroup->SmartGroupControl->SelectedValue);
			
			// Save the Cloned Group object
			$objCloneGroup->Save();

			// Get Participation List and propogate it
			$objGroupParticipationArray = $this->mctGroup->Group->GetActiveGroupParticipationArray();
			foreach($objGroupParticipationArray as $objGroupParticipation) {
				$objCloneGroup->AddPerson(Person::Load($objGroupParticipation->PersonId), $objGroupParticipation->GroupRoleId);
			}

			// Go to new Group.
			$this->ReturnTo('#' . $objCloneGroup->Id);
		}
	}
?>