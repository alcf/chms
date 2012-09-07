<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class GGReportsForm extends ChmsForm {
		protected $strPageTitle = 'Growth Group Report';
		protected $intNavSectionId = ChmsForm::NavSectionGroups;
		protected $dtgGroups;
		protected $btnReturnToGroup;
		protected $strDebug;
				
		protected function Form_Create() {	
			$this->btnReturnToGroup = new QButton($this);
			$this->btnReturnToGroup->CssClass = 'primary';
			$this->btnReturnToGroup->AddAction(new QClickEvent(), new QAjaxAction('btnReturnToGroup_Click'));
			$this->btnReturnToGroup->Name = "Return to Growth Groups";
			$this->btnReturnToGroup->Text = "Return to Growth Groups";
			$this->btnReturnToGroup->Visible = true;
			
			$this->dtgGroups = new QDataGrid($this);			
			$this->dtgGroups->AddColumn(new QDataGridColumn('Name', '<?= $_FORM->RenderName($_ITEM); ?>', 'HtmlEntities=false','Width=270px'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Group Type', '<?= $_ITEM->Type; ?>', 'Width=270px'));
			$this->dtgGroups->AddColumn(new QDataGridColumn('Count', '<?= $_FORM->RenderCount($_ITEM); ?>', 'HtmlEntities=false','Width=270px'));
			
			$groupArray = Group::LoadOrderedArrayByMinistryIdAndConfidentiality(
			17, Ministry::Load(17)->IsLoginCanAdminMinistry(QApplication::$Login),true);
			$this->dtgGroups->DataSource = $groupArray;	
		}

		protected function btnReturnToGroup_Click() {
			QApplication::Redirect('/groups/#17');
		}
		
		public function RenderName($objGroup) {
			if ($objGroup->Type == GroupType::$NameArray[GroupType::GroupCategory]) {
				return "<span style='font-weight:bold;'>". $objGroup->Name . "</span>";
			} 
			return "<span style='padding-left:20px'>". $objGroup->Name . "</span>";
		}
		
		public function RenderCount($objGroup) {
			// Count differently if it's a group Category or Growth Group								
			if ($objGroup->Type == GroupType::$NameArray[GroupType::GroupCategory]) {
				// Setup Group Array
				$objGroupArray = $objGroup->GetThisAndChildren();
				$intGroupIdArray = array();
				foreach ($objGroupArray as $objGroup) $intGroupIdArray[] = $objGroup->Id;
				
				$objCondition = QQ::In(QQN::Person()->GroupParticipation->GroupId, $intGroupIdArray);
				$objCondition = QQ::AndCondition($objCondition, QQ::IsNull(QQN::Person()->GroupParticipation->DateEnd));
				$strReturn = Person::QueryCount($objCondition);
				return "<b>". $strReturn . "</b>";
			} else {
				$objCondition = QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $objGroup->Id);
				$objCondition = QQ::AndCondition($objCondition, QQ::IsNull(QQN::Person()->GroupParticipation->DateEnd));
				return Person::QueryCount($objCondition);
			}
		}
	}
	
	GGReportsForm::Run('GGReportsForm');
	?>