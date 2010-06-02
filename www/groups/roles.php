<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class EditGroupRolesForm extends ChmsForm {
		protected $strPageTitle = 'View Roles for';
		protected $intNavSectionId = ChmsForm::NavSectionGroups;

		protected $dtgRoles;
		protected $pxyEditRole;
		protected $pnlEditRole;

		protected $txtName;
		protected $lstType;
		protected $btnSave;
		protected $btnCancel;

		protected $objMinistry;
		public $objGroupRole;

		protected function Form_Create() {
			$this->objMinistry = Ministry::Load(QApplication::PathInfo(0));
			if (!$this->objMinistry) QApplication::Redirect('/groups/');
			if (!$this->objMinistry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/groups/');

			$this->dtgRoles = new QDataGrid($this);
			$this->dtgRoles->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgRoles->SetDataBinder('dtgRoles_Bind');
			$this->dtgRoles->AddColumn(new QDataGridColumn('Edit', '<?= $_FORM->RenderEdit($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgRoles->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->Name; ?>'));
			$this->dtgRoles->AddColumn(new QDataGridColumn('Type', '<?= GroupRoleType::$NameArray[$_ITEM->GroupRoleTypeId]; ?>'));

			$this->pxyEditRole = new QControlProxy($this);
			$this->pxyEditRole->AddAction(new QClickEvent(), new QAjaxAction('pxyEditRole_Click'));
			$this->pxyEditRole->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pnlEditRole = new QPanel($this);
			$this->pnlEditRole->Template = dirname(__FILE__) . '/pnlEditRole.tpl.php';
			$this->pnlEditRole->Visible = false;

			$this->txtName = new QTextBox($this->pnlEditRole);
			$this->txtName->Name = 'Role Name';
			$this->txtName->Required = true;

			$this->lstType = new QListBox($this->pnlEditRole);
			$this->lstType->Name = 'Role Type';
			$this->lstType->Required = true;
			foreach (GroupRoleType::$NameArray as $intId => $strName)
				$this->lstType->AddItem($strName, $intId);

			$this->btnSave = new QButton($this->pnlEditRole);
			$this->btnSave->CausesValidation = true;
			$this->btnSave->Text = 'Save';
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));

			$this->btnCancel = new QLinkButton($this->pnlEditRole);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function dtgRoles_Bind() {
			$this->dtgRoles->DataSource = $this->objMinistry->GetGroupRoleArray(QQ::OrderBy(QQN::GroupRole()->Name));
		}

		public function RenderEdit(GroupRole $objGroupRole) {
			return sprintf('<a href="" %s>Edit</a>', $this->pxyEditRole->RenderAsEvents($objGroupRole->Id, false));
		}

		protected function pxyEditRole_Click($strFormId, $strControlId, $strParameter) {
			$objGroupRole = GroupRole::Load($strParameter);
			if (!$objGroupRole ||
				($objGroupRole->MinistryId != $this->objMinistry->Id)) {
				$this->objGroupRole = new GroupRole();
				$this->objGroupRole->Ministry = $this->objMinistry;
				$this->btnSave->Text = 'Create New Role';
				$this->txtName->Text = null;
				$this->lstType->SelectedValue = null;
			} else {
				$this->objGroupRole = $objGroupRole;
				$this->btnSave->Text = 'Update Role';
				$this->txtName->Text = $objGroupRole->Name;
				$this->lstType->SelectedValue = $objGroupRole->GroupRoleTypeId;
			}

			$this->txtName->Focus();
			$this->pnlEditRole->Visible = true;
		}

		protected function btnCancel_Click() {
			$this->pnlEditRole->Visible = false;
			$this->objGroupRole = null;
		}

		protected function btnSave_Click() {
			$this->objGroupRole->Name = trim($this->txtName->Text);
			$this->objGroupRole->GroupRoleTypeId = $this->lstType->SelectedValue;
			$this->objGroupRole->Save();
			$this->pnlEditRole->Visible = false;
			$this->dtgRoles->Refresh(); 
		}
	}

	EditGroupRolesForm::Run('EditGroupRolesForm');
?>