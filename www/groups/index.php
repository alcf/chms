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
			$this->dtgGroups->AddColumn(new QDataGridColumn('Email', '<?= $_FORM->RenderEmail($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgGroups->SetDataBinder('dtgGroups_Bind');
		}

		public function dtgGroups_Bind() {
			if ($this->intMinistryId)
				$this->dtgGroups->DataSource = Group::LoadOrderedArrayForMinistry($this->intMinistryId);
			else
				$this->dtgGroups->DataSource = array();
		}

		public function RenderName(Group $objGroup) {
			$strName = sprintf('<a href="/groups/view.php#%s">%s</a>', $objGroup->Id, QApplication::HtmlEntities($objGroup->Name));

			$strName = ($objGroup->ParentGroup) ? '&gt;&nbsp;' . $strName : $strName;

			$objGroupIterate = $objGroup;
			while ($objGroupIterate = $objGroupIterate->ParentGroup) {
				$strName = '&nbsp;&nbsp;&nbsp;' . $strName;
			}

			return $strName;
		}

		public function RenderEmail(Group $objGroup) {
			switch ($objGroup->EmailBroadcastTypeId) {
				case EmailBroadcastType::PrivateList:
				case EmailBroadcastType::PublicList:
				case EmailBroadcastType::AnnouncementOnly:
					return sprintf('%s - <a href="mailto:%s@groups.alcf.net">%s@groups.alcf.net</a>',
						EmailBroadcastType::$NameArray[$objGroup->EmailBroadcastTypeId],
						QApplication::HtmlEntities($objGroup->Token),
						QApplication::HtmlEntities($objGroup->Token));

				case null:
					return '<span style="color: #999; font-size: 10px; ">None</span>';

				default:
					throw new Exception('Invalid EmailBroadcastTypeId: ' . $objGroup->EmailBroadcastTypeId);
			}
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