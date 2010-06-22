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

		protected $dtgGroups;

		protected function Form_Create() {
			$this->pnlMinistries = new QPanel($this);
			$this->pnlMinistries->TagName = 'ul';
			$this->pnlMinistries->CssClass = 'subnavSide';
			$this->pnlMinistries->AutoRenderChildren = true;

			$this->pxyMinistry = new QControlProxy($this);
			$this->pxyMinistry->AddAction(new QClickEvent(), new QAjaxAction('pxyMinistry_Click'));
			$this->pxyMinistry->AddAction(new QClickEvent(), new QTerminateAction());

			foreach (Ministry::LoadArrayByActiveFlag(true, QQ::OrderBy(QQN::Ministry()->Name)) as $objMinistry) {
				$pnlMinistry = new QPanel($this->pnlMinistries, 'pnlMinistry' . $objMinistry->Id);
				$pnlMinistry->TagName = 'li';
				$pnlMinistry->ActionParameter = $objMinistry->Id;
				$this->pnlMinistry_Refresh($objMinistry);
			}
			
			$this->lblMinistry = new QLabel($this);
			$this->lblMinistry->TagName = 'h3';
			$this->lblMinistry_Refresh();

			$this->dtgGroups = new QDataGrid($this);
			$this->dtgGroups->CssClass = 'datagrid';
			$this->dtgGroups->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgGroups->AddColumn(new QDataGridColumn('Group Name', '<?= $_FORM->RenderName($_ITEM); ?>', 'HtmlEntities=false', 'Width=260px'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Type', '<?= $_ITEM->Type; ?>', 'Width=120px'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Email', '<?= $_ITEM->EmailTypeHtml ; ?>', 'HtmlEntities=false', 'Width=350px'));
			$this->dtgGroups->SetDataBinder('dtgGroups_Bind');
		}

		public function dtgGroups_Bind() {
			if ($this->intMinistryId)
				$this->dtgGroups->DataSource = Group::LoadOrderedArrayByMinistryIdAndConfidentiality(
					$this->intMinistryId,
					Ministry::Load($this->intMinistryId)->IsLoginCanAdminMinistry(QApplication::$Login));
			else
				$this->dtgGroups->DataSource = null;
		}

		public function RenderName(Group $objGroup) {
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
			if ($strParameter != $this->intMinistryId) {
				$intOldMinistryId = $this->intMinistryId;
				$this->intMinistryId = $strParameter;
				$this->pnlMinistry_Refresh($intOldMinistryId);
				$this->pnlMinistry_Refresh($this->intMinistryId);
				$this->lblMinistry_Refresh();
				$this->dtgGroups->Refresh();
			}
		}
	}

	SearchGroupsForm::Run('SearchGroupsForm');
?>