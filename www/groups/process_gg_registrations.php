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
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Source', '<?= $_FORM->RenderSource($_ITEM); ?>', 'HtmlEntities=false','Width=200px'));						
			$this->dtgGroupRegistrations->MetaAddColumn('DateReceived');
			$this->dtgGroupRegistrations->MetaAddColumn('PreferredLocation1');
			$this->dtgGroupRegistrations->MetaAddColumn('PreferredLocation2');			
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Requested Group Role', '<?= $_FORM->RenderGroupRole($_ITEM); ?>', 'HtmlEntities=false'));				
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Requested Group Types', '<?= $_FORM->RenderGroupTypes($_ITEM); ?>', 'HtmlEntities=false','Width=150px'));				
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Requested Group Days', '<?= $_FORM->RenderGroupDay($_ITEM); ?>', 'HtmlEntities=false','Width=100px'));
			$this->dtgGroupRegistrations->AddColumn(new QDataGridColumn('Process', '<?= $_FORM->RenderProcess($_ITEM); ?>', 'HtmlEntities=false'));

			$this->dtgGroupRegistrations->NoDataHtml = 'No Registrants to Process.';
			$this->dtgGroupRegistrations->SetDataBinder('dtgGroupRegistration_Bind',$this);
		}

		protected function dtgGroupRegistration_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			
			if(!$this->chkShowInactive->Checked) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::OrCondition(QQ::Equal((QQN::GroupRegistrations()->ProcessedFlag),false),
						QQ::IsNull((QQN::GroupRegistrations()->ProcessedFlag)))
					);
			}
			$this->dtgGroupRegistrations->DataSource = GroupRegistrations::QueryArray($objConditions);
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
				$strReturn = sprintf('<span style="color:green">%s %s</span>',$objGroupRegistration->FirstName,$objGroupRegistration->LastName);
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
			return GroupRole::Load($objGroupRegistration->GroupRoleId)->Name;
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