<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Administration - System Preferences';
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $dtgRegistries;

		protected function Form_Create() {
			$this->dtgRegistries = new RegistryDataGrid($this);
			$this->dtgRegistries->MetaAddColumn('Name', 'Html=<?= $_FORM->RenderName($_ITEM); ?>', 'Width=380px', 'HtmlEntities=false');
			$this->dtgRegistries->MetaAddColumn('Value', 'Width=550px');
		}

		public function RenderName(Registry $objRegistry) {
			return sprintf('<a href="/admin/registry/edit.php/%s">%s</a>', $objRegistry->Id, QApplication::HtmlEntities($objRegistry->Name));
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>