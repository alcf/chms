<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewGroupForm extends ChmsForm {
		protected $strPageTitle = 'View Groups';
		protected $intNavSectionId = ChmsForm::NavSectionGroups;

		public $objGroup;
		protected $lblGroup;
		protected $pnlGroups;
		protected $pnlContent;

		protected function Form_Create() {
			$this->pnlGroups = new QPanel($this);
			$this->pnlGroups->TagName = 'ul';
			$this->pnlGroups->CssClass = 'groupsPanel';
			$this->pnlGroups->AutoRenderChildren = true;

			$this->lblGroup = new QLabel($this);
			$this->lblGroup->TagName = 'h2';

			$this->pnlContent = new QPanel($this);
			$this->pnlContent->AutoRenderChildren = true;

			$this->SetUrlHashProcessor('Form_ProcessHash');
		}
		
		public function pnlGroups_Refresh() {
			$this->pnlGroups->RemoveChildControls(true);

			if (!$this->objGroup)
				$this->pnlGroups->Visible = false;
			else {
				$this->pnlGroups->Visible = true;

				$objGroups = Group::LoadOrderedArrayByMinistryIdAndConfidentiality(
					$this->objGroup->MinistryId,
					Ministry::Load($this->objGroup->MinistryId)->IsLoginCanAdminMinistry(QApplication::$Login));

				foreach ($objGroups as $objGroup) {
					$pnlGroup = new QPanel($this->pnlGroups, 'pnlGroup' . $objGroup->Id);

					$strName = $objGroup->Name;

					// Add Pointer
					$strName = ($objGroup->HierarchyLevel) ? '&gt;&nbsp;' . $strName : $strName;

					// Add Indent
					$strPadding = 'padding-left: ' . (($objGroup->HierarchyLevel * 10) + 10) . 'px;';

					$pnlGroup->Text = sprintf('<a href="#%s" style="%s">%s</a>', $objGroup->Id, $strPadding, $strName);
					$pnlGroup->TagName = 'li';
					$this->pnlGroup_Refresh($objGroup->Id);
				}
			}
		}

		protected function Form_ProcessHash() {
			// Cleanup and Tokenize UrlHash Contents
			$strUrlHash = trim(strtolower($this->strUrlHash));
			$strUrlHashTokens = explode('/', $strUrlHash);

			// Get the Group from the Hash and Refresh the Label
			$objGroup = Group::Load($strUrlHashTokens[0]);
			if (!$objGroup) QApplication::Redirect('/groups/');

			$intOldGroupId = ($this->objGroup) ? $this->objGroup->Id : null;
			$blnRefreshGroupsPanel = (!$this->objGroup || ($this->objGroup->MinistryId != $objGroup->MinistryId)) ? true : false;

			$this->objGroup = $objGroup;
			$this->pnlGroup_Refresh($this->objGroup->Id);

			if ($intOldGroupId) $this->pnlGroup_Refresh($intOldGroupId);
			if ($blnRefreshGroupsPanel) $this->pnlGroups_Refresh();

			$this->lblGroup_Refresh();
			$this->pnlContent_Refresh($strUrlHashTokens);
		}

		protected function pnlContent_Refresh($strUrlHashTokens) {
			$this->pnlContent->RemoveChildControls(true);

			if ($this->objGroup) {
				if (!array_key_exists(1, $strUrlHashTokens)) $strUrlHashTokens[1] = 'view';

				// Setup the UrlHash Argument
				if (array_key_exists(2, $strUrlHashTokens))
					$strUrlHashArgument = $strUrlHashTokens[2];
				else
					$strUrlHashArgument = null;

				switch (strtolower($strUrlHashTokens[1])) {
					case 'view':
					case 'edit':
						$strClassName = sprintf('CpGroup_%s%s', QString::ConvertToCamelCase($strUrlHashTokens[1]), GroupType::$TokenArray[$this->objGroup->GroupTypeId]);
						break;

					case 'edit_participation':
					case 'add_participation':
						$strClassName = sprintf('CpGroup_%s', QString::ConvertToCamelCase($strUrlHashTokens[1]));
						break;

					default:
						QApplication::Redirect('/groups/');
				}

				new $strClassName($this->pnlContent, 'content', $this->objGroup, $strUrlHashArgument);
			}
		}

		public function lblGroup_Refresh() {
			if ($this->objGroup &&
				($this->lblGroup->Text != $this->objGroup->Name)) {
				$this->lblGroup->Text = $this->objGroup->Name;
			}
		}

		public function pnlGroup_Refresh($intGroupId) {
			$pnlGroup = $this->GetControl('pnlGroup' . $intGroupId);
			if ($pnlGroup) {
				if ($this->objGroup &&
					($this->objGroup->Id == $intGroupId)) {
					$pnlGroup->AddCssClass('selected');
				} else {
					$pnlGroup->RemoveCssClass('selected');
				}
			}
		}
	}

	ViewGroupForm::Run('ViewGroupForm');
?>