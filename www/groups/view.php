<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewGroupForm extends ChmsForm {
		protected $strPageTitle = 'View Groups';
		protected $intNavSectionId = ChmsForm::NavSectionGroups;

		public $objGroup;
		protected $lblGroup;

		protected $pnlGroups;
		protected $pxyGroup;

		protected function Form_Create() {
			$this->pnlGroups = new QPanel($this);
			$this->pnlGroups->TagName = 'ul';
			$this->pnlGroups->CssClass = 'groupsPanel';
			$this->pnlGroups->AutoRenderChildren = true;

			$this->pxyGroup = new QControlProxy($this);
			$this->pxyGroup->AddAction(new QClickEvent(), new QAjaxAction('pxyGroup_Click'));
			$this->pxyGroup->AddAction(new QClickEvent(), new QTerminateAction());

			$this->lblGroup = new QLabel($this);
			$this->lblGroup->TagName = 'h2';

			$this->SetUrlHashProcessor('Form_ProcessHash');
		}
		
		protected function pnlGroups_Refresh() {
			$this->pnlGroups->RemoveChildControls(true);

			if (!$this->objGroup)
				$this->pnlGroups->Visible = false;
			else {
				$this->pnlGroups->Visible = true;

				foreach (Group::LoadOrderedArrayForMinistry($this->objGroup->MinistryId) as $objGroup) {
					$pnlGroup = new QPanel($this->pnlGroups, 'pnlGroup' . $objGroup->Id);
					$pnlGroup->Text = sprintf('<a href="#%s">%s</a>', $objGroup->Id, $objGroup->Name);
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

			if (!$this->objGroup ||
				($this->objGroup->Id != $objGroup->Id)) {
				$intOldGroupId = ($this->objGroup) ? $this->objGroup->Id : null;
				$blnRefreshGroupsPanel = (!$this->objGroup || ($this->objGroup->MinistryId != $objGroup->MinistryId)) ? true : false;

				$this->objGroup = $objGroup;
				$this->pnlGroup_Refresh($this->objGroup->Id);

				if ($intOldGroupId) $this->pnlGroup_Refresh($intOldGroupId);
				if ($blnRefreshGroupsPanel) $this->pnlGroups_Refresh();
			}

			$this->lblGroup_Refresh();
		}

		protected function lblGroup_Refresh() {
			if ($this->objGroup &&
				($this->lblGroup->Text != $this->objGroup->Name)) {
				$this->lblGroup->Text = $this->objGroup->Name;
			} else {
				$this->lblGroup->Text = null;
			}
		}

		protected function pnlGroup_Refresh($intGroupId) {
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