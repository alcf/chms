<?php
	class CpGroup_ViewRegularGroup extends CpGroup_Base {
		public $txtFirstName;
		public $txtLastName;
		public $chkViewAll;
		public $btnInactivate;
		
		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) $this->ReturnTo('/groups/');

			$this->SetupViewControls(true, true);
			
			$this->dtgMembers->AddColumn(new QDataGridColumn('Active Member', '<?= $_CONTROL->ParentControl->RenderCurrentMember($_ITEM); ?>', 'HtmlEntities=true', 'Width=60px',
			array('OrderByClause' => QQ::OrderBy(QQN::Person()->GroupParticipation->DateEnd), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Person()->GroupParticipation->DateEnd, false))));
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind', $this);
			
			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'First Name (Exact)';
			$this->txtFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgMembers_Refresh'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgMembers_Refresh'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
				
			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Last Name (Exact)';
			$this->txtLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgMembers_Refresh'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgMembers_Refresh'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
				
			if ($this->objGroup->CountEmailMessageRoutes()) $this->SetupEmailMessageControls();
			$this->SetupSmsControls();
			
			$this->chkViewAll = new QCheckBox($this);
			$this->chkViewAll->Text = 'View "Inactive/Past" Members as well';
			$this->chkViewAll->AddAction(new QClickEvent(), new QAjaxControlAction($this,'chkViewAll_Click'));

			$this->btnInactivate = new QButton($this);
			$this->btnInactivate->CssClass = "primary";
			$this->btnInactivate->Text = "Inactivate all Group Members";
			$this->btnInactivate->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnInactivate_Click'));
		}

		public function chkViewAll_Click() {
			$this->dtgMembers->Refresh();
		}
		
		public function btnInactivate_Click() {
			$objConditions = QQ::AndCondition(
				QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id),
				QQ::IsNull(QQN::Person()->GroupParticipation->DateEnd)
				);
			$personArray = Person::QueryArray($objConditions, null);
			foreach($personArray as $objPerson) {

				$groupParticipationArray = $objPerson->GetGroupParticipationArray();
				foreach($groupParticipationArray as $objGroupParticipation) {
					if($objGroupParticipation->GroupId == $this->objGroup->Id) {
						$objGroupParticipation->DateEnd = QDateTime::Now();
						$objGroupParticipation->Save();
					}
				}
			}
			$this->dtgMembers->Refresh();
		}
		
		public function dtgMembers_Bind() {
			if($this->chkViewAll->Checked) {
				$objConditions = QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id);
			} else {
				$objConditions = QQ::AndCondition(
				QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id),
				QQ::IsNull(QQN::Person()->GroupParticipation->DateEnd)
				);
			}
			
			$this->dtgMembers->TotalItemCount = Person::QueryCount($objConditions);

			if ($strName = trim($this->txtFirstName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
				QQ::Like( QQN::Person()->FirstName, $strName . '%')
				);
			}
				
			if ($strName = trim($this->txtLastName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
				QQ::Like( QQN::Person()->LastName, $strName . '%')
				);
			}
			$objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgMembers->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgMembers->OrderByClause) $objClauses[] = $objClause;

			$this->dtgMembers->DataSource = Person::QueryArray($objConditions, $objClauses);
		}
		
		public function dtgMembers_Refresh() {
			$this->dtgMembers->PageNumber = 1;
			$this->dtgMembers->Refresh();
		}
		
		public function RenderCurrentMember(Person $objPerson) {
			$objArrayGroup = $objPerson->GetGroupParticipationArray();
			$bfound = false;
			foreach($objArrayGroup as $objParticipation) {
				if($objParticipation->GroupId == $this->objGroup->Id) {
					if($objParticipation->DateEnd == null)
					$bfound = true;
				}
			}
			if($bfound) {
				return 'Y';
			} else {
				return 'N';
			}
			return '';
		}
	}
?>