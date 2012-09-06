<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class SearchGroupsForm extends ChmsForm {
		protected $strPageTitle = 'View Groups';
		protected $intNavSectionId = ChmsForm::NavSectionGroups;

		protected $lblMinistry;
		protected $pnlMinistries;
		protected $pxyMinistry;
		protected $intMinistryId;

		protected $lstGroupType;
		protected $chkViewAll;

		protected $dtgGroups;
		protected $lblStartText;
		
		protected $btnGroupReport;
		
		protected $bIsGrowthGroup;
		public $strDebug;

		protected function Form_Create() {
			$this->pnlMinistries = new QPanel($this);
			$this->pnlMinistries->TagName = 'ul';
			$this->pnlMinistries->CssClass = 'subnavSide subnavSideSmall';
			$this->pnlMinistries->AutoRenderChildren = true;

			$this->pxyMinistry = new QControlProxy($this);
			$this->pxyMinistry->AddAction(new QClickEvent(), new QAjaxAction('pxyMinistry_Click'));
			$this->pxyMinistry->AddAction(new QClickEvent(), new QTerminateAction());

			$blnFirst = true;
			foreach (Ministry::LoadArrayByActiveFlag(true, QQ::OrderBy(QQN::Ministry()->Name)) as $objMinistry) {
				$pnlMinistry = new QPanel($this->pnlMinistries, 'pnlMinistry' . $objMinistry->Id);
				$pnlMinistry->TagName = 'li';
				$pnlMinistry->ActionParameter = $objMinistry->Id;
				if ($blnFirst) {
					$blnFirst = false;
					$pnlMinistry->CssClass = 'first';
				}
				$this->pnlMinistry_Refresh($objMinistry);
			}
			// Last
			$pnlMinistry->CssClass = 'last';

			$this->lstGroupType = new QListBox($this);
			$this->lstGroupType->AddAction(new QChangeEvent(), new QAjaxAction('lstGroupType_Change'));
			$this->lstGroupType->Visible = false;
			
			$this->chkViewAll = new QCheckBox($this);
			$this->chkViewAll->Text = 'View "Inactive" Groups as well';
			$this->chkViewAll->AddAction(new QClickEvent(), new QAjaxAction('chkViewAll_Click'));
			$this->chkViewAll->Visible = false;
			
			$this->lblMinistry = new QLabel($this);
			$this->lblMinistry->TagName = 'h3';
			$this->lblMinistry_Refresh();

			$this->dtgGroups = new QDataGrid($this);
			$this->dtgGroups->CssClass = 'datagrid';
			$this->dtgGroups->AddColumn(new QDataGridColumn('Group Name', '<?= $_FORM->RenderName($_ITEM); ?>', 'HtmlEntities=false', 'Width=260px'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Type', '<?= $_ITEM->Type; ?>', 'Width=120px'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Email', '<?= $_ITEM->EmailTypeHtml ; ?>', 'HtmlEntities=false', 'Width=350px'));
			$this->dtgGroups->SetDataBinder('dtgGroups_Bind');
			
//			$this->dtgGroups->Visible = false;

			$this->btnGroupReport = new QButton($this);
			$this->btnGroupReport->CssClass = 'primary';
			$this->btnGroupReport->AddAction(new QClickEvent(), new QAjaxAction('btnGroupReport_Click'));
			$this->btnGroupReport->Name = "Growth Group Report";
			$this->btnGroupReport->Text = "Growth Group Report";
			$this->btnGroupReport->Visible = false;
			
			$this->lblStartText = new QLabel($this);
			$this->lblStartText->Text = '<h3>Groups and Ministries</h3><p>Please select a ministry from the list on the right.</p>';
			$this->lblStartText->HtmlEntities = false;
			
			$this->SetUrlHashProcessor('Form_ProcessHash');
		}

		public function chkViewAll_Click() {
			$this->dtgGroups->Refresh();
		}

		public function dtgGroups_Bind() {
			if ($this->intMinistryId) {
				$this->dtgGroups->DataSource = Group::LoadOrderedArrayByMinistryIdAndConfidentiality(
					$this->intMinistryId,
					Ministry::Load($this->intMinistryId)->IsLoginCanAdminMinistry(QApplication::$Login),
					!$this->chkViewAll->Checked);
				$this->dtgGroups->Visible = true;
			} else {
				$this->dtgGroups->DataSource = null;
				$this->dtgGroups->Visible = false;
			}

			$this->lblStartText->Visible = !$this->dtgGroups->Visible;
		}

		public function lstGroupType_Change($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript(sprintf('document.location = "/groups/group.php#new/%s/%s";',
				strtolower(str_replace(' ', '_', GroupType::$NameArray[$this->lstGroupType->SelectedValue])),
				$this->intMinistryId));
			$this->lstGroupType->SelectedIndex = 0;
		}

		public function RenderName(Group $objGroup) {
			if ($objGroup->ActiveFlag) {
				$this->dtgGroups->OverrideRowStyle($this->dtgGroups->CurrentRowIndex, null);
			} else {
				$objStyle = new QDataGridRowStyle();
				$objStyle->BackColor = '#ccc';
				$this->dtgGroups->OverrideRowStyle($this->dtgGroups->CurrentRowIndex, $objStyle);
			}
			$strName = sprintf('<a href="/groups/group.php#%s">%s</a>', $objGroup->Id, QApplication::HtmlEntities($objGroup->Name));

			// Add Pointer
			$strName = ($objGroup->HierarchyLevel) ? '&gt;&nbsp;' . $strName : $strName;

			// Add Indent
			$strName = str_repeat('&nbsp;&nbsp;&nbsp;', $objGroup->HierarchyLevel) . $strName;

			// Add Facilitator Name (for Growth Groups, specifically)
			if ($objGroup->GroupTypeId == GroupType::GrowthGroup) {
				$strFacArray = array();
				foreach ($objGroup->GetActiveGroupParticipationArray() as $objParticipant) {
					if ($objParticipant->GroupRole->Name == 'Facilitator') {
						$strFacArray[] = $objParticipant->Person->Name;
					}
				}
				
				if (count($strFacArray)) $strName .= ' <span style="font-size: 10px;">(' . implode(', ', $strFacArray) . ')</span>';
			}

			return $strName;
		}

		protected function pnlMinistry_Refresh($mixMinistry) {
			if ($mixMinistry instanceof Ministry) {
				$objMinistry = $mixMinistry;
				$intMinistryId = $objMinistry->Id;
			} else {
				$intMinistryId = $mixMinistry;
				$objMinistry = Ministry::Load($intMinistryId);
			}

			$pnlMinistry = $this->GetControl('pnlMinistry' . $intMinistryId);
			if ($pnlMinistry) {
				$pnlMinistry->Text = sprintf('<a href="" %s %s>%s</a>',
					$this->pxyMinistry->RenderAsEvents($objMinistry->Id, false),
					($intMinistryId == $this->intMinistryId) ? 'class="selected"' : null,
					$objMinistry->Name);
			}
		}
		
		protected function lblMinistry_Refresh() {
			$objMinistry = Ministry::Load($this->intMinistryId);
			if ($objMinistry) {
				$this->lblMinistry->Visible = true;
				$this->lblMinistry->Text = 'Groups in ' . $objMinistry->Name;
				if ($objMinistry->Name == 'Growth Groups')
					$this->btnGroupReport->Visible = true;
				else
				$this->btnGroupReport->Visible = false;
			} else {
				$this->lblMinistry->Visible = false;
			}
		}

		protected function btnGroupReport_Click() {
			QApplication::Redirect('/groups/gg_report.php');
		}
		
		protected function pxyMinistry_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('#' . $strParameter);
		}
		
		protected function Form_Run() {
			$this->strDebug = "running Form_run() id = ". $this->strUrlHash;
			if ($this->intMinistryId == 17)
					$this->bIsGrowthGroup = true;
				else
					$this->bIsGrowthGroup = false;
		}
		
		protected function Form_ProcessHash() {
			$strParameter = $this->strUrlHash;
			if ($strParameter != $this->intMinistryId) {
				$intOldMinistryId = $this->intMinistryId;
				$this->intMinistryId = $strParameter;
							
				$this->pnlMinistry_Refresh($intOldMinistryId);
				$this->pnlMinistry_Refresh($this->intMinistryId);
				$this->lblMinistry_Refresh();
				$this->dtgGroups->Refresh();
				
				$objMinistry = Ministry::Load($this->intMinistryId);
				if ($objMinistry->IsLoginCanAdminMinistry(QApplication::$Login)) {
					$this->chkViewAll->Visible = true;
					$this->lstGroupType->Visible = true;
					$this->lstGroupType->RemoveAllItems();
					$this->lstGroupType->AddItem('- Create New... -');
					foreach (GroupType::$NameArray as $intId => $strName)
						if ($objMinistry->GroupTypeBitmap & $intId) $this->lstGroupType->AddItem($strName, $intId);
				} else {
					$this->lstGroupType->Visible = true;
					$this->lstGroupType->Visible = false;
				}
			}
		}
	}

	SearchGroupsForm::Run('SearchGroupsForm');
?>