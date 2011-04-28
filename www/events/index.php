<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class SearchGroupsForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		protected $lblMinistry;
		protected $pnlMinistries;
		protected $pxyMinistry;
		protected $intMinistryId;

		protected $lstSignupFormType;
		protected $chkViewAll;

		protected $dtgSignupForms;
		protected $lblStartText;

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

			$this->lstSignupFormType = new QListBox($this);
			$this->lstSignupFormType->AddAction(new QChangeEvent(), new QAjaxAction('lstSignupFormType_Change'));
			$this->lstSignupFormType->Visible = false;

			$this->chkViewAll = new QCheckBox($this);
			$this->chkViewAll->Text = 'View "Inactive" Signup Forms as well';
			$this->chkViewAll->AddAction(new QClickEvent(), new QAjaxAction('chkViewAll_Click'));
			$this->chkViewAll->Visible = false;
			
			$this->lblMinistry = new QLabel($this);
			$this->lblMinistry->TagName = 'h3';
			$this->lblMinistry_Refresh();

			$this->dtgSignupForms = new QDataGrid($this);
			$this->dtgSignupForms->CssClass = 'datagrid';
			$this->dtgSignupForms->AddColumn(new QDataGridColumn('Group Name', '<?= $_FORM->RenderName($_ITEM); ?>', 'HtmlEntities=false', 'Width=260px'));
			$this->dtgSignupForms->AddColumn(new QDataGridColumn('Type', '<?= $_ITEM->Type; ?>', 'Width=120px'));
			$this->dtgSignupForms->AddColumn(new QDataGridColumn('Email', '<?= $_ITEM->EmailTypeHtml ; ?>', 'HtmlEntities=false', 'Width=350px'));
			$this->dtgSignupForms->SetDataBinder('dtgSignupForms_Bind');

			$this->lblStartText = new QLabel($this);
			$this->lblStartText->Text = '<h3>Events and Signup Forms</h3><p>Please select a ministry from the list on the right.</p>';
			$this->lblStartText->HtmlEntities = false;
			
			$this->SetUrlHashProcessor('Form_ProcessHash');
		}

		public function chkViewAll_Click() {
			$this->dtgGroups->Refresh();
		}

		public function dtgSignupForms_Bind() {
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
			} else {
				$this->lblMinistry->Visible = false;
			}
		}

		protected function pxyMinistry_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('#' . $strParameter);
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