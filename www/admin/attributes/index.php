<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Administration - View Attributes';
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $dtgAttributes;

		protected function Form_Create() {
			$this->dtgAttributes = new AttributeDataGrid($this);
			$this->dtgAttributes->MetaAddColumn('Name', 'Html=<?= $_FORM->RenderName($_ITEM); ?>', 'Width=380px', 'HtmlEntities=false');
			$this->dtgAttributes->MetaAddTypeColumn('AttributeDataTypeId', 'AttributeDataType', 'Width=550px', 'Name=Data Type');
		}

		public function RenderName(Attribute $objAttribute) {
			return sprintf('<a href="/admin/attributes/edit.php/%s">%s</a>', $objAttribute->Id, QApplication::HtmlEntities($objAttribute->Name));
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>