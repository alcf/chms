<?php
	class CpGroup_ViewSmartGroup extends CpGroup_Base {
		public $lblQuery;

		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) $this->ReturnTo('/groups/');

			$this->SetupViewControls(false, false);
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind', $this);

			$this->lblQuery = new QLabel($this);
			$this->lblQuery->Name = 'Query Info';
			$this->lblQuery->Text = nl2br(QApplication::HtmlEntities($this->objGroup->SmartGroup->SearchQuery->Description));
			$this->lblQuery->HtmlEntities = false;
			
			if ($this->objGroup->CountEmailMessageRoutes()) $this->SetupEmailMessageControls();
		}

		public function dtgMembers_Bind() {
			$objCondition = QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id);
			$this->dtgMembers->TotalItemCount = Person::QueryCount($objCondition);

			$objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgMembers->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgMembers->OrderByClause) $objClauses[] = $objClause;

			$this->dtgMembers->DataSource = Person::QueryArray($objCondition, $objClauses);
		}
	}
?>