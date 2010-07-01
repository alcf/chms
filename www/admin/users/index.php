<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(array(RoleType::ChMSAdministrator));

	class AdminUsersForm extends ChmsForm {
		protected $strPageTitle = 'Administration - Manage Users';
		protected $intNavSectionId = ChmsForm::NavSectionAdministration;

		protected $lstMinistry;
		protected $dtgStaff;

		protected function Form_Create() {
			$this->dtgStaff = new LoginDataGrid($this);
			$this->dtgStaff->Width = '960px';
			$this->dtgStaff->AddColumn(new QDataGridColumn('View', '<?= $_FORM->RenderView($_ITEM); ?>', 'HtmlEntities=false', 'Width=40px'));
			$this->dtgStaff->MetaAddColumn(QQN::Login()->Username, 'Width=80px');
			$this->dtgStaff->MetaAddColumn(QQN::Login()->FirstName, 'Width=90px');
			$this->dtgStaff->MetaAddColumn(QQN::Login()->LastName, 'Width=90px');
			$this->dtgStaff->MetaAddColumn(QQN::Login()->DomainActiveFlag, 'Name=Domain Active', 'Width=52px');
			$this->dtgStaff->MetaAddColumn(QQN::Login()->LoginActiveFlag, 'Name=Login Active', 'Width=52px');
			$this->dtgStaff->MetaAddTypeColumn('RoleTypeId', 'RoleType', 'Name=Role');
			$this->dtgStaff->FontSize = 11;

			$this->dtgStaff->SetDataBinder('dtgStaff_Bind');
			$this->dtgStaff->SortColumnIndex = 1;
			$this->dtgStaff->SortDirection = 0;
			
			$this->dtgStaff->Paginator = new QPaginator($this->dtgStaff);
			$this->dtgStaff->ItemsPerPage = 100;
			
			$this->lstMinistry = new QListBox($this);
			$this->lstMinistry->Name = 'Ministry';
			$this->lstMinistry->AddItem('- View All -', null);
			foreach (Ministry::LoadAll(QQ::OrderBy(QQN::Ministry()->Name)) as $objMinistry) {
				$this->lstMinistry->AddItem($objMinistry->Name, $objMinistry->Id);
			}
			$this->lstMinistry->AddAction(new QChangeEvent(), new QAjaxAction('dtgStaff_Refresh'));
		}

		public function RenderView(Login $objLogin) {
			if (!$objLogin->DomainActiveFlag || !$objLogin->LoginActiveFlag) {
				$objStyle = new QDataGridRowStyle();
				if ($this->dtgStaff->CurrentRowIndex % 2)
					$objStyle->BackColor = '#fdd';
				else
					$objStyle->BackColor = '#fdd';
				$this->dtgStaff->OverrideRowStyle($this->dtgStaff->CurrentRowIndex, $objStyle);
			} else {
				$this->dtgStaff->OverrideRowStyle($this->dtgStaff->CurrentRowIndex, null);
			}

			return sprintf('<a href="/admin/users/edit.php/%s" title="View Details for %s"><img src="/assets/images/icons/magnifier.png"/></a>',
				$objLogin->Id, $objLogin->Name);
		}
	
		protected function dtgStaff_Refresh() {
			$this->dtgStaff->PageNumber = 1;
			$this->dtgStaff->Refresh();
		}
		
		public function dtgStaff_Bind() {
			$objConditions = QQ::All();

			if ($this->lstMinistry->SelectedValue) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Equal( QQN::Login()->Ministry->MinistryId, $this->lstMinistry->SelectedValue )
				);
			}

			$this->dtgStaff->TotalItemCount = Login::QueryCount($objConditions);

			// Setup the $objClauses Array
			$objClauses = array();

			// If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
			// the OrderByClause to the $objClauses array
			if ($objClause = $this->dtgStaff->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgStaff->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be a Query result from Login, given the clauses above
			$this->dtgStaff->DataSource = Login::QueryArray($objConditions, $objClauses);
		}
	}

	AdminUsersForm::Run('AdminUsersForm');
?>