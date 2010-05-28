<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class SearchGroupsForm extends ChmsForm {
		protected $strPageTitle = 'View Groups';
		protected $intNavSectionId = ChmsForm::NavSectionGroups;

		protected $pnlMinistries;
		protected $pxyMinistry;
		protected $intMinistryId;

		protected $dtgGroups;

		protected function Form_Create() {
			$this->pnlMinistries = new QPanel($this);
			$this->pnlMinistries->TagName = 'ul';
			$this->pnlMinistries->CssClass = 'ministriesPanel';
			$this->pnlMinistries->AutoRenderChildren = true;

			$this->pxyMinistry = new QControlProxy($this);
			$this->pxyMinistry->AddAction(new QClickEvent(), new QAjaxAction('pxyMinistry_Click'));
			$this->pxyMinistry->AddAction(new QClickEvent(), new QTerminateAction());

			foreach (Ministry::LoadArrayByActiveFlag(true, QQ::OrderBy(QQN::Ministry()->Name)) as $objMinistry) {
				$pnlMinistry = new QPanel($this->pnlMinistries, 'pnlMinistry' . $objMinistry->Id);
				$pnlMinistry->Text = sprintf('<a href="" %s>%s</a>', $this->pxyMinistry->RenderAsEvents($objMinistry->Id, false), $objMinistry->Name);
				$pnlMinistry->TagName = 'li';
				$pnlMinistry->ActionParameter = $objMinistry->Id;
				$this->pnlMinistry_Refresh($objMinistry->Id);
			}

			$this->dtgGroups = new QDataGrid($this);
			$this->dtgGroups->CssClass = 'groupList datagrid';
			$this->dtgGroups->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgGroups->AddColumn(new QDataGridColumn('Group Name', '<?= $_FORM->RenderName($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Type', '<?= $_ITEM->Type; ?>'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Email', '<?= $_ITEM->EmailTypeHtml ; ?>', 'HtmlEntities=false'));
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

		protected function pnlMinistry_Refresh($intMinistryId) {
			$pnlMinistry = $this->GetControl('pnlMinistry' . $intMinistryId);
			if ($pnlMinistry) {
				if ($this->intMinistryId == $intMinistryId) {
					$pnlMinistry->AddCssClass('selected');
				} else {
					$pnlMinistry->RemoveCssClass('selected');
				}
			}
		}

		protected function pxyMinistry_Click($strFormId, $strControlId, $strParameter) {
			if ($strParameter != $this->intMinistryId) {
				$intOldMinistryId = $this->intMinistryId;
				$this->intMinistryId = $strParameter;
				$this->pnlMinistry_Refresh($intOldMinistryId);
				$this->pnlMinistry_Refresh($this->intMinistryId);

				$this->dtgGroups->Refresh();
			}
		}
	}

	SearchGroupsForm::Run('SearchGroupsForm');
?>