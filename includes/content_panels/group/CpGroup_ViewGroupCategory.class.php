<?php
	class CpGroup_ViewGroupCategory extends CpGroup_Base {
		/**
		 * @var QDataGrid
		 */
		public $dtgGroups;

		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) $this->ReturnTo('/groups/');

			// Setup Group Array
			$this->objGroupArray = $this->objGroup->GetThisAndChildren();
			$this->intGroupIdArray = array();
			foreach ($this->objGroupArray as $objGroup) $this->intGroupIdArray[] = $objGroup->Id;

			$this->SetupViewControls(false, true);
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind', $this);

			$this->dtgGroups = new QDataGrid($this);
			$this->dtgGroups->AddColumn(new QDataGridColumn('Group Name', '<?= $_CONTROL->ParentControl->RenderGroupName($_ITEM); ?>', 'HtmlEntities=false', 'Width=250px'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Type', '<?= $_ITEM->Type; ?>', 'Width=130px'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Email', '<?= $_ITEM->EmailTypeHtml ; ?>', 'HtmlEntities=false', 'Width=360px'));
			$this->dtgGroups->SetDataBinder('dtgGroups_Bind', $this);
		}

		public function RenderGroupName(Group $objGroup) {
			$strName = sprintf('<a href="/groups/group.php#%s">%s</a>', $objGroup->Id, QApplication::HtmlEntities($objGroup->Name));

			// Add Pointer
			$intHierarchyLevel = $objGroup->HierarchyLevel - $this->objGroup->HierarchyLevel - 1;

			$strName = ($intHierarchyLevel) ? '&gt;&nbsp;' . $strName : $strName;

			// Add Indent
			$strName = str_repeat('&nbsp;&nbsp;&nbsp;', $intHierarchyLevel) . $strName;

			return $strName;
		}

		public function dtgMembers_Bind() {
			$objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgMembers->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgMembers->OrderByClause) $objClauses[] = $objClause;

			$this->dtgMembers->DataSource = Person::QueryArray(QQ::In(QQN::Person()->GroupParticipation->GroupId, $this->intGroupIdArray), $objClauses);
		}

		public function dtgGroups_Bind() {
			$objGroupArray = $this->objGroupArray;
			array_shift($objGroupArray);
			$this->dtgGroups->DataSource = $objGroupArray;
			
		}
	}
?>