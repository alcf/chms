<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Report - Invalid Stewardship Addresses';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;
		
		protected $dtgItems;
		
		protected function Form_Create() {
			$intYear = QApplication::PathInfo(0);
			if (($intYear >= 1950) && ($intYear <= 2500)) {
				// looks good
			} else {
				QApplication::Redirect('/stewardship/');
			}

			$this->dtgItems = new QDataGrid($this);
			$this->dtgItems->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM->LinkHtml; ?>', 'HtmlEntities=false', 'Width=950px'));
			$this->dtgItems->SetDataBinder('dtgItems_Bind');
			$this->dtgItems->Paginator = new QPaginator($this->dtgItems);
		}

		public function dtgItems_Bind() {
			$intYear = QApplication::PathInfo(0);
			$dttStart = new QDateTime($intYear . '-01-01');
			$dttEnd = new QDateTime($dttStart);
			$dttEnd->Year += 1;
			$dttStart->SetTime(null, null, null);
			$dttEnd->SetTime(null, null, null);

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