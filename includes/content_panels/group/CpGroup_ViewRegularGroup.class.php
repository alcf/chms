<?php
	class CpGroup_ViewRegularGroup extends CpGroup_Base {
		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) $this->ReturnTo('/groups/');

			$this->SetupViewControls(true, false);
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind', $this);
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