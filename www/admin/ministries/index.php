<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminMinistriesForm extends ChmsForm {
		protected $strPageTitle = 'Administration - Manage Ministries';
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $dtgMinistries;
		protected $pxyToggle;

		protected function Form_Create() {
			$this->dtgMinistries = new MinistryDataGrid($this);
			$this->dtgMinistries->Width = '960px';
			$this->dtgMinistries->MetaAddColumn('Token');
			$this->dtgMinistries->MetaAddColumn('Name');
			$this->dtgMinistries->MetaAddColumn('ActiveFlag', 'Name=Active', 'Width=65px');
			$this->dtgMinistries->AddColumn(new QDataGridColumn('Toggle', '<?= $_FORM->RenderToggle($_ITEM); ?>', 'HtmlEntities=false'));

			$this->dtgMinistries->SetDataBinder('dtgMinistries_Bind');
			$this->dtgMinistries->SortColumnIndex = 1;
			$this->dtgMinistries->SortDirection = 0;
			
			$this->pxyToggle = new QControlProxy($this);
			$this->pxyToggle->AddAction(new QClickEvent(), new QAjaxAction('pxyToggle_Click'));
		}

		public function RenderToggle(Ministry $objMinistry) {
			if (!$objMinistry->ActiveFlag) {
				$objStyle = new QDataGridRowStyle();
				if ($this->dtgMinistries->CurrentRowIndex % 2)
					$objStyle->BackColor = '#fdd';
				else
					$objStyle->BackColor = '#fdd';
				$this->dtgMinistries->OverrideRowStyle($this->dtgMinistries->CurrentRowIndex, $objStyle);
			} else {
				$this->dtgMinistries->OverrideRowStyle($this->dtgMinistries->CurrentRowIndex, null);
			}
			
			return sprintf('<a href="#" title="Toggle Active for %s" %s><img src="/assets/images/icons/arrow_refresh_small.png"/></a>',
				$objMinistry->Name, $this->pxyToggle->RenderAsEvents($objMinistry->Id, false));
		}
		
		public function pxyToggle_Click($strFormId, $strControlId, $strParameter) {
			$objMinistry = Ministry::Load($strParameter);
			$objMinistry->ActiveFlag = !$objMinistry->ActiveFlag;
			$objMinistry->Save();
			$this->dtgMinistries->Refresh(); 
		}
		
		public function dtgMinistries_Bind() {
			$objConditions = QQ::All();

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgMinistries->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgMinistries->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be a Query result from Login, given the clauses above
			$this->dtgMinistries->DataSource = Ministry::QueryArray($objConditions, $objClauses);
		}
	}

	AdminMinistriesForm::Run('AdminMinistriesForm');
?>