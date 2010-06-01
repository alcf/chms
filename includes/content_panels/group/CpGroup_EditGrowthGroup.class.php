<?php
	class CpGroup_EditGrowthGroup extends CpGroup_Base {
		/**
		 * @var GrowthGroupMetaControl
		 */
		public $mctGrowthGroup;

		public $lstGrowthGroupLocation;
		public $lstGrowthGroupStructure;
		public $lstGrowthGroupDayType;
		public $cblMeetings;
		public $txtStartTime;
		public $txtEndTime;
		public $txtAddress1;
		public $txtAddress2;
		public $txtCrossStreet1;
		public $txtCrossStreet2;
		public $txtZipCode;
		public $txtLongitude;
		public $txtLatitude;
		public $txtAccuracy;

		public $btnRefresh;

		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanEdit(QApplication::$Login)) $this->ReturnTo('#' . $this->objGroup->Id);
			$this->SetupEditControls();

			// Setup Everything for Growth Group child
			if ($this->mctGroup->EditMode) {
				$this->mctGrowthGroup = new GrowthGroupMetaControl($this, $this->mctGroup->Group->GrowthGroup);
			} else {
				// TODO: Implement "Create New" Growth Group
			}
			$this->SetupChildEditControls();
		}

		protected function SetupChildEditControls() {
			$this->lstGrowthGroupLocation = $this->mctGrowthGroup->lstGrowthGroupLocation_Create();
			$this->lstGrowthGroupStructure = $this->mctGrowthGroup->lstGrowthGroupStructures_Create();
			$this->lstGrowthGroupStructure->Rows = 10;
			$this->lstGrowthGroupDayType = $this->mctGrowthGroup->lstGrowthGroupDayType_Create();
			$this->txtStartTime = $this->mctGrowthGroup->txtStartTime_Create();
			$this->txtEndTime = $this->mctGrowthGroup->txtEndTime_Create();
			$this->txtAddress1 = $this->mctGrowthGroup->txtAddress1_Create();
			$this->txtAddress2 = $this->mctGrowthGroup->txtAddress2_Create();
			$this->txtCrossStreet1 = $this->mctGrowthGroup->txtCrossStreet1_Create();
			$this->txtCrossStreet2 = $this->mctGrowthGroup->txtCrossStreet2_Create();
			$this->txtZipCode = $this->mctGrowthGroup->txtZipCode_Create();
			$this->txtLongitude = $this->mctGrowthGroup->txtLongitude_Create();
			$this->txtLatitude = $this->mctGrowthGroup->txtLatitude_Create();
			$this->txtAccuracy = $this->mctGrowthGroup->txtAccuracy_Create();
			$this->txtAccuracy->Instructions = 'as reported by Google Maps -- this should ideally be 7';

			$this->btnRefresh = new QButton($this);
			$this->btnRefresh->Text = 'Refresh from Google Maps';
			$this->btnRefresh->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnRefresh));
			$this->btnRefresh->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnRefresh_Click'));

			$this->cblMeetings = new QCheckBoxList($this, 'days');
			$this->cblMeetings->Name = 'Meetings per Month';
			foreach (array('1st', '2nd', '3rd', '4th', '5th', 'Every Other') as $intKey => $strName) {
				$intValue = pow(2, $intKey);
				$this->cblMeetings->AddItem($strName, $intValue, $this->mctGrowthGroup->GrowthGroup->MeetingBitmap & $intValue);
			}

			QApplication::ExecuteJavaScript('document.getElementById("days[5]").onclick = EveryOtherClicked;');
		}
		
		public function btnRefresh_Click() {
			$this->mctGrowthGroup->GrowthGroup->CrossStreet1 = $this->txtCrossStreet1->Text;
			$this->mctGrowthGroup->GrowthGroup->CrossStreet2 = $this->txtCrossStreet2->Text;
			$this->mctGrowthGroup->GrowthGroup->ZipCode = $this->txtZipCode->Text;
			
			$this->mctGrowthGroup->GrowthGroup->RefreshGeoCode();
			$this->txtLongitude->Text = $this->mctGrowthGroup->GrowthGroup->Longitude;
			$this->txtLatitude->Text = $this->mctGrowthGroup->GrowthGroup->Latitude;
			$this->txtAccuracy->Text = $this->mctGrowthGroup->GrowthGroup->Accuracy;
			$this->btnRefresh->Enabled = true;
		}

		public function Validate() {
			$blnToReturn = parent::Validate();

			$this->mctGrowthGroup->GrowthGroup->MeetingBitmap = 0;
			foreach ($this->cblMeetings->SelectedValues as $intValue)
				$this->mctGrowthGroup->GrowthGroup->MeetingBitmap = $this->mctGrowthGroup->GrowthGroup->MeetingBitmap | $intValue;
			if (!$this->mctGrowthGroup->GrowthGroup->MeetingBitmap) {
				$this->cblMeetings->Warning = 'Must select at least one';
				$blnToReturn = false;
			}

			return $blnToReturn;
		}
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$blnRefreshGroups = $this->mctGroup->EditMode || ($this->mctGroup->Group->ParentGroupId != $this->lstParentGroup->SelectedValue);

			$this->chkConfidentialFlag->Checked = false;
			$this->mctGroup->SaveGroup();

			// Delegate "Save" processing to the GrowthGroupMetaControl
			$this->btnRefresh_Click();
			$this->mctGrowthGroup->SaveGrowthGroup();

			// Refresh
			if ($blnRefreshGroups) {
				Group::RefreshHierarchyDataForMinistry($this->mctGroup->Group->MinistryId);
				$this->objForm->pnlGroups_Refresh();
			}

			$this->ReturnTo('#' . $this->mctGroup->Group->Id);
		}
	}
?>