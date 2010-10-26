<?php
	class Vicp_Groups_AddGroup extends Vicp_Base {
		public $lstMinistries;
		public $dtgGroups;

		protected function SetupPanel() {
			$this->lstMinistries = new QListBox($this);
			$this->lstMinistries->Name = 'Select a Ministry';
			$this->lstMinistries->AddItem('- Select One -');
			foreach (Ministry::LoadArrayByActiveFlag(true, QQ::OrderBy(QQN::Ministry()->Name)) as $objMinistry) {
				if ($objMinistry->IsLoginCanAdminMinistry(QApplication::$Login))
					$this->lstMinistries->AddItem($objMinistry->Name, $objMinistry->Id);
			}

			$this->dtgGroups = new QDataGrid($this);
			$this->dtgGroups->Name = '&nbsp;';
			$this->dtgGroups->AddColumn(new QDataGridColumn('Group Name', '<?= $_CONTROL->ParentControl->RenderName($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Type', '<?= $_ITEM->Type; ?>'));
			$this->dtgGroups->SetDataBinder('dtgGroups_Bind', $this);

			$this->lstMinistries->AddAction(new QChangeEvent(), new QAjaxControlAction($this->dtgGroups, 'Refresh'));
		}

		public function dtgGroups_Bind() {
			if ($this->lstMinistries->SelectedValue)
				$this->dtgGroups->DataSource = Group::LoadOrderedArrayByMinistryIdAndConfidentiality($this->lstMinistries->SelectedValue, true);
			else
				$this->dtgGroups->DataSource = array();
		}
		
		public function RenderName(Group $objGroup) {
			if ($objGroup->IsGroupCanHaveExplicitlyDefinedParticipants()) {
				$strName = sprintf('<a href="#groups/edit_participation/%s">%s</a>', $objGroup->Id, QApplication::HtmlEntities($objGroup->Name));
			} else {
				$strName = QApplication::HtmlEntities($objGroup->Name);
			}

			$strName = ($objGroup->ParentGroup) ? '&gt;&nbsp;' . $strName : $strName;

			$objGroupIterate = $objGroup;
			while ($objGroupIterate = $objGroupIterate->ParentGroup) {
				$strName = '&nbsp;&nbsp;&nbsp;' . $strName;
			}

			return $strName;
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#groups";');
		}
	}
?>