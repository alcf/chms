<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Report - Duplicate Names';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;
		
		protected $dtgItems;
		
		protected function Form_Create() {
			$this->dtgItems = new QDataGrid($this);
			$this->dtgItems->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->LinkHtml; ?>', 'HtmlEntities=false', 'Width=950px'));
			$this->dtgItems->SetDataBinder('dtgItems_Bind');
			$this->dtgItems->Paginator = new QPaginator($this->dtgItems);
		}

		public function dtgItems_Bind() {
			$this->dtgItems->DataSource = Person::QueryArray(QQ::AndCondition(
				QQ::GreaterOrEqual(QQN::Person()->StewardshipContribution->DateCredited, $dttStart),
				QQ::LessThan(QQN::Person()->StewardshipContribution->DateCredited, $dttEnd),
				QQ::IsNull(QQN::Person()->PrimaryAddressText),
				QQ::IsNull(QQN::Person()->StewardshipAddressId)
			), QQ::Clause(
				QQ::Distinct(),
				QQ::OrderBy(QQN::Person()->LastName, QQN::Person()->FirstName)
			));
		}
	}
	
	AdminMainForm::Run('AdminMainForm');
?>