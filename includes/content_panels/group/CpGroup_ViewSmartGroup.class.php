<?php
	class CpGroup_ViewSmartGroup extends CpGroup_Base {
		public $lblQuery;
		public $lblRefresh;
		
		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) $this->ReturnTo('/groups/');

			$this->SetupViewControls(false, false);
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind', $this);

			$this->lblQuery = new QLabel($this);
			$this->lblQuery->Name = 'Query Info';
			$this->lblQuery->Text = nl2br(QApplication::HtmlEntities($this->objGroup->SmartGroup->SearchQuery->Description));
			$this->lblQuery->HtmlEntities = false;

			$this->lblRefresh = new QLabel($this);
			$this->lblRefresh->Name = 'Participant List Last Refresh';
			if ($this->objGroup->SmartGroup->DateRefreshed)
				$this->lblRefresh->Text = 'about ' . QDateTime::Now()->Difference($this->objGroup->SmartGroup->DateRefreshed)->SimpleDisplay() . ' ago';
			else
				$this->lstRefresh->Text = 'n/a';
		}

		public function dtgMembers_Bind() {
			$objCondition = QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id);
			$this->dtgMembers->TotalItemCount = Person::QueryCount($objCondition);

			$objClauses = array();
			if ($objClause = $this->dtgMembers->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgMembers->OrderByClause) $objClauses[] = $objClause;

			$this->dtgMembers->DataSource = Person::QueryArray($objCondition, $objClauses);
		}
	}
?>