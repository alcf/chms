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
			$this->dtgItems->AddColumn(new QDataGridColumn('Name', '<?= $_ITEM; ?>', 'HtmlEntities=false', 'Width=950px'));
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

			$objPersonCursor = Person::QueryCursor(QQ::AndCondition(
				QQ::GreaterOrEqual(QQN::Person()->StewardshipContribution->DateCredited, $dttStart),
				QQ::LessThan(QQN::Person()->StewardshipContribution->DateCredited, $dttEnd)
			), QQ::Clause(
				QQ::Distinct(),
				QQ::OrderBy(QQN::Person()->LastName, QQN::Person()->FirstName)
			));

			$strNameArray = array();
			$strNameValueArray = array();
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$strToken = strtolower($objPerson->FirstName . '|' . $objPerson->LastName);
				$strToken = str_replace(' ', '', $strToken);
				$strToken = str_replace('.', '', $strToken);
				$strToken = str_replace(',', '', $strToken);
				$strToken = str_replace('-', '', $strToken);
				$strToken = str_replace('_', '', $strToken);
				$strToken = str_replace('/', '', $strToken);

				if (array_key_exists($strToken, $strNameArray)) {
					$strNameValueArray[$strToken] = $objPerson->FirstName . ' ' . $objPerson->LastName;
				}
				
				$strNameArray[$strToken] = true;
			}
			
			$this->dtgItems->DataSource = $strNameValueArray;
		}
	}
	
	AdminMainForm::Run('AdminMainForm');
?>