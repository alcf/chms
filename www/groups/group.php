<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewGroupForm extends ChmsForm {
		protected $strPageTitle = 'View Groups';
		protected $intNavSectionId = ChmsForm::NavSectionGroups;

		public $objGroup;
		protected $lblMinistry;
		protected $pnlGroups;
		protected $pnlContent;

		protected $lstGroupType;
		protected $btnViewRoles;

		protected function Form_Create() {
			$this->pnlGroups = new QPanel($this);
			$this->pnlGroups->TagName = 'ul';
			$this->pnlGroups->CssClass = 'subnavSide';
			$this->pnlGroups->AutoRenderChildren = true;

			$this->lblMinistry = new QLabel($this);
			$this->lblMinistry->TagName = 'h1';

			$this->pnlContent = new QPanel($this);
			$this->pnlContent->AutoRenderChildren = true;

			$this->lstGroupType = new QListBox($this);
			$this->lstGroupType->AddItem('- Create New... -');
			foreach (GroupType::$NameArray as $intId => $strName)
				$this->lstGroupType->AddItem($strName, $intId);
			$this->lstGroupType->AddAction(new QChangeEvent(), new QAjaxAction('lstGroupType_Change'));

			$this->btnViewRoles = new QLinkButton($this);
			$this->btnViewRoles->Text = 'View Roles';
			$this->btnViewRoles->AddAction(new QClickEvent(), new QAjaxAction('btnViewRoles_Click'));
			$this->btnViewRoles->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->SetUrlHashProcessor('Form_ProcessHash');
		}

		protected function btnViewRoles_Click() {
			QApplication::Redirect('/groups/roles.php/' . $this->objGroup->MinistryId);
		}

		protected function btnViewRoles_Refresh() {
			$this->btnViewRoles->Visible = $this->objGroup->Ministry->IsLoginCanAdminMinistry(QApplication::$Login);
		}

		public function lstGroupType_Change($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript(sprintf('document.location = "#new/%s/%s";',
				strtolower(str_replace(' ', '_', GroupType::$NameArray[$this->lstGroupType->SelectedIndex])),
				$this->objGroup->MinistryId));
			$this->lstGroupType->SelectedIndex = 0;
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
					$pnlGroup->TagName = 'li';
					$this->pnlGroup_Refresh($objGroup);
				}
			}
		}

		protected function Form_ProcessHash() {
			// Cleanup and Tokenize UrlHash Contents
			$strUrlHash = trim(strtolower($this->strUrlHash));
			$strUrlHashTokens = explode('/', $strUrlHash);

			// Create a New Group?
			if ($strUrlHashTokens[0] == 'new') {
				if (count($strUrlHashTokens) != 3) QApplication::Redirect('/groups/');

				// Validate the GroupType
				$strConstantName = QString::ConvertToCamelCase($strUrlHashTokens[1]);
				if (!defined('GroupType::' . $strConstantName)) QApplication::Redirect('/groups/');

				// Validate the Ministry
				$objMinistry = Ministry::Load($strUrlHashTokens[2]);
				if (!$objMinistry) QApplication::Redirect('/groups/');
				if (!$objMinistry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/groups/');

				// Create the Group Object
				$objGroup = new Group();
				$objGroup->GroupTypeId = constant('GroupType::' . $strConstantName);
				$objGroup->Ministry = $objMinistry;
			} else {
				// Get the Group from the Hash and Refresh the Label
				$objGroup = Group::Load($strUrlHashTokens[0]);
				if (!$objGroup) QApplication::Redirect('/groups/');
			}

			$intOldGroupId = ($this->objGroup) ? $this->objGroup->Id : null;
			$blnRefreshGroupsPanel = (!$this->objGroup || ($this->objGroup->MinistryId != $objGroup->MinistryId)) ? true : false;

			$this->objGroup = $objGroup;
			$this->pnlGroup_Refresh($this->objGroup);

			if ($intOldGroupId) $this->pnlGroup_Refresh($intOldGroupId);
			if ($blnRefreshGroupsPanel) {
				$this->pnlGroups_Refresh();
				$this->btnViewRoles_Refresh();
			}

			$this->lblMinistry_Refresh();
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

				if ($strUrlHashTokens[0] == 'new') {
					$strClassName = sprintf('CpGroup_Edit%s', QString::ConvertToCamelCase($strUrlHashTokens[1]));
				} else switch (strtolower($strUrlHashTokens[1])) {
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

		public function lblMinistry_Refresh() {
			if ($this->objGroup &&
				($this->lblMinistry->Text != $this->objGroup->Ministry->Name)) {
				$this->lblMinistry->Text = $this->objGroup->Ministry->Name;
			}
		}

		public function pnlGroup_Refresh($mixGroup) {
			if ($mixGroup instanceof Group) {
				$objGroup = $mixGroup;
				$intGroupId = $objGroup->Id;
			} else {
				$intGroupId = $mixGroup;
				$objGroup = Group::Load($intGroupId);
			}

			$pnlGroup = $this->GetControl('pnlGroup' . $intGroupId);
			if ($pnlGroup) {
				$strName = $objGroup->Name;

				// Add Pointer
				$strName = ($objGroup->HierarchyLevel) ? '&gt;&nbsp;' . $strName : $strName;

				// Add Indent
				$strPadding = 'padding-left: ' . (($objGroup->HierarchyLevel * 10) + 10) . 'px;';

				$pnlGroup->Text = sprintf('<a href="#%s" style="%s" %s>%s</a>',
					$objGroup->Id,
					$strPadding,
					($this->objGroup && ($this->objGroup->Id == $intGroupId)) ? 'class="selected"' : null,
					$strName);
				
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