<?php
	class CpGroup_ViewRegularGroup extends CpGroup_Base {
		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanView(QApplication::$Login)) $this->ReturnTo('/groups/');

			$this->SetupViewControls(true, true);
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind', $this);
			
			if ($this->objGroup->CountEmailMessageRoutes()) $this->SetupEmailMessageControls();
			$this->SetupSmsControls();
		}

		public function dtgMembers_Bind() {
			$objCondition = QQ::AndCondition(
				QQ::Equal(QQN::Person()->GroupParticipation->GroupId, $this->objGroup->Id),
				QQ::IsNull(QQN::Person()->GroupParticipation->DateEnd)
			);
			$this->dtgMembers->TotalItemCount = Person::QueryCount($objCondition);

			$objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgMembers->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgMembers->OrderByClause) $objClauses[] = $objClause;

			$this->dtgMembers->DataSource = Person::QueryArray($objCondition, $objClauses);
		}
	}
?>