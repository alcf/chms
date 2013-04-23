<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class GGProcessRegistrationForm extends ChmsForm {
		protected $strPageTitle = 'Process Growth Group Registrations';
		protected $intNavSectionId = ChmsForm::NavSectionGroups;
		protected $dtgGroupRegistrations;
		protected $btnReturnToGroup;
		protected $pnlStep1;
		protected $pnlStep2;
		protected $chkShowInactive;
				
		protected function Form_Create() {	
			$this->chkShowInactive = new QCheckBox($this);
			$this->chkShowInactive->Text = 'Show Already Processed Registrants';
			$this->chkShowInactive->Checked = false;
			$this->chkShowInactive->AddAction(new QClickEvent(), new QAjaxAction('dtgGroupRegistration_Refresh'));
			
			$this->pnlStep1 = new QPanel($this);
			$this->pnlStep1->AutoRenderChildren = true;
			
			$this->pnlStep2 = new QPanel($this);
			$this->pnlStep2->AutoRenderChildren = true;
					
			$this->btnReturnToGroup = new QButton($this);
			$this->btnReturnToGroup->CssClass = 'primary';
			$this->btnReturnToGroup->AddAction(new QClickEvent(), new QAjaxAction('btnReturnToGroup_Click'));
			$this->btnReturnToGroup->Name = "Return to Growth Groups";
			$this->btnReturnToGroup->Text = "Return to Growth Groups";
			$this->btnReturnToGroup->Visible = true;
			
			$this->dtgGroupRegistrations = new GroupRegistrationsDataGrid($this);
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Name', '<?= $_FORM->RenderName($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgGroupRegistrations->MetaAddColumn('Gender');
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Address', '<?= $_FORM->RenderAddress($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgGroupRegistrations->MetaAddColumn('Email','Width=100px');
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Source', '<?= $_FORM->RenderSource($_ITEM); ?>', 'HtmlEntities=false','Width=200px',array('OrderByClause' => QQ::OrderBy(QQN::GroupRegistrations()->SourceList->Name), 'ReverseOrderByClause' => QQ::OrderBy(QQN::GroupRegistrations()->SourceList->Name, false))));						
			$this->dtgGroupRegistrations->MetaAddColumn('DateReceived');
			$this->dtgGroupRegistrations->MetaAddColumn('PreferredLocation1',array('OrderByClause' => QQ::OrderBy(QQN::GroupRegistrations()->PreferredLocation1), 'ReverseOrderByClause' => QQ::OrderBy(QQN::GroupRegistrations()->PreferredLocation1, false)));
			$this->dtgGroupRegistrations->MetaAddColumn('PreferredLocation2',array('OrderByClause' => QQ::OrderBy(QQN::GroupRegistrations()->PreferredLocation2), 'ReverseOrderByClause' => QQ::OrderBy(QQN::GroupRegistrations()->PreferredLocation2, false)));			
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Requested Group Role', '<?= $_FORM->RenderGroupRole($_ITEM); ?>', 'HtmlEntities=false',array('OrderByClause' => QQ::OrderBy(QQN::GroupRegistrations()->GroupRole->Name), 'ReverseOrderByClause' => QQ::OrderBy(QQN::GroupRegistrations()->GroupRole->Name, false))));				
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Requested Group Types', '<?= $_FORM->RenderGroupTypes($_ITEM); ?>', 'HtmlEntities=false','Width=150px'));				
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Requested Group Days', '<?= $_FORM->RenderGroupDay($_ITEM); ?>', 'HtmlEntities=false','Width=100px'));
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Process', '<?= $_FORM->RenderProcess($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Delete', '<?= $_FORM->RenderDelete($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgGroupRegistrations->MetaAddColumn('GroupsPlaced');
			$this->dtgGroupRegistrations->MetaAddColumn('DateProcessed');
			$this->dtgGroupRegistrations->GridLines = QGridLines::Both;
			$this->dtgGroupRegistrations->NoDataHtml = 'No Registrants to Process.';
			$this->dtgGroupRegistrations->SetDataBinder('dtgGroupRegistration_Bind',$this);
		}

		protected function dtgGroupRegistration_Bind() {
			$objConditions = QQ::All();
			$objClauses = QQ::Clause($this->dtgGroupRegistrations->OrderByClause);
			
			if(!$this->chkShowInactive->Checked) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::OrCondition(QQ::Equal((QQN::GroupRegistrations()->ProcessedFlag),false),
						QQ::IsNull((QQN::GroupRegistrations()->ProcessedFlag)))
					);
			}
			$this->dtgGroupRegistrations->DataSource = GroupRegistrations::QueryArray($objConditions,$objClauses);
		}
		protected function dtgGroupRegistration_Refresh() {
			$this->dtgGroupRegistrations->Refresh();
		}
		protected function btnReturnToGroup_Click() {
			QApplication::Redirect('/groups/#17');
		}
		
		public function RenderGroupDay(GroupRegistrations $objGroupRegistration) {
			return $objGroupRegistration->GroupDay;
		}
		public function RenderName(GroupRegistrations $objGroupRegistration) {
			if($objGroupRegistration->ProcessedFlag) {
				// Grab Person and if found provide a link.
				$personArray = Person::LoadArrayByNameMatch($objGroupRegistration->FirstName, $objGroupRegistration->LastName);
				if($personArray) {
					$strReturn = sprintf('<a href="%s" style="color:green">%s %s</a>',$personArray[0]->LinkUrl,$objGroupRegistration->FirstName,$objGroupRegistration->LastName);
				} else {
					$strReturn = sprintf('<span style="color:green">%s %s</span>',$objGroupRegistration->FirstName,$objGroupRegistration->LastName);
				}
			} else {
				$strReturn = sprintf('%s %s',$objGroupRegistration->FirstName,$objGroupRegistration->LastName);
			}
			return $strReturn;
		}
		public function RenderAddress(GroupRegistrations $objGroupRegistration) {
			return sprintf('%s, %s, %s',$objGroupRegistration->Address, $objGroupRegistration->City, $objGroupRegistration->Zipcode);
		}
		public function RenderSource(GroupRegistrations $objGroupRegistration) {
			return SourceList::Load($objGroupRegistration->SourceListId)->Name;
		}
		public function RenderGroupRole(GroupRegistrations $objGroupRegistration) {
			if($objGroupRegistration->GroupRoleId)
				return GroupRole::Load($objGroupRegistration->GroupRoleId)->Name;
			else 
				return 'Not Selected';
		}
		public function RenderGroupTypes(GroupRegistrations $objGroupRegistration) {
			$strReturn = '';
			foreach (GrowthGroupStructure::LoadAll() as $objGrowthGroupStructure) {
				if($objGroupRegistration->IsGrowthGroupStructureAsGroupstructureAssociated($objGrowthGroupStructure)) {
					$strReturn .= $objGrowthGroupStructure->Name . ', ';
				}
			}
			return substr($strReturn, 0,strlen($strReturn)-2);
		}
		
		public function RenderProcess(GroupRegistrations $objGroupRegistration) {
			$strControlId = 'process'.$objGroupRegistration->Id;
			$btnProcess = $this->GetControl($strControlId);
			if(!$btnProcess) {
				$btnProcess = new QButton($this->dtgGroupRegistrations,$strControlId);
				$btnProcess->Text = 'Process';
				$btnProcess->ActionParameter = $objGroupRegistration->Id;
				$btnProcess->AddAction(new QClickEvent(), new QAjaxAction('btnProcess_Clicked'));
			}
			return $btnProcess->Render(false);
		}
		
		public function RenderDelete(GroupRegistrations $objGroupRegistration) {
			$strControlId = 'delete'.$objGroupRegistration->Id;
			$btnDelete = $this->GetControl($strControlId);
			if(!$btnDelete) {
				$btnDelete = new QButton($this->dtgGroupRegistrations,$strControlId);
				$btnDelete->Text = 'Delete';
				$btnDelete->ActionParameter = $objGroupRegistration->Id;
				$btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Clicked'));
			}
			return $btnDelete->Render(false);
		}
		
		public function btnDelete_Clicked($strFormId, $strControlId, $strParameter) {
			$objGroupRegistrant = GroupRegistrations::Load($strParameter);
			$objGroupRegistrant->UnassociateAllGrowthGroupStructuresAsGroupstructure();
			$objGroupRegistrant->Delete();
			$this->dtgGroupRegistration_Refresh();
		}
		
		public function btnProcess_Clicked($strFormId, $strControlId, $strParameter) {
			$objGroupRegistrant = GroupRegistrations::Load($strParameter);
			// Clear the panel and load it again
			$this->pnlStep1->RemoveChildControls(true);
			$this->pnlStep2->RemoveChildControls(true);
			$pnlProjectView = new CpGroup_RegistrationStep1Panel($this->pnlStep1,$this->pnlStep2, $objGroupRegistrant,'RefreshRegistrants');
		}
		
		public function RefreshRegistrants($blnUpdatesMade) {
			if($blnUpdatesMade) {
				$this->pnlStep1->RemoveChildControls(true);
				$this->pnlStep2->RemoveChildControls(true);
				$this->dtgGroupRegistrations->Refresh();
			}		
		}
	}
	
	GGProcessRegistrationForm::Run('GGProcessRegistrationForm');
	?>