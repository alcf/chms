<?php
	class CpGroup_ViewSmartGroup extends CpGroup_Base {
		public $lblQuery;
		public $lblRefresh;
		
		public $btnRefresh;
		
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
			if ($this->objGroup->SmartGroup->DateRefreshed) {
				$strText = QDateTime::Now()->Difference($this->objGroup->SmartGroup->DateRefreshed)->SimpleDisplay();
				$this->lblRefresh->Text = ($strText) ? 'about ' . $strText . ' ago' : 'just now';
			} else {
				$this->lstRefresh->Text = 'n/a';
			}

			$this->btnRefresh = new QButton($this);
			$this->btnRefresh->Name = '&nbsp;';
			$this->btnRefresh->Text = 'Refresh Now';
			$this->btnRefresh->CssClass = 'primary';
			$this->btnRefresh->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnRefresh_Click'));
			
			if ($this->objGroup->CountEmailMessageRoutes()) $this->SetupEmailMessageControls();
		}

		public function btnRefresh_Click() {
			$this->objGroup->SmartGroup->RefreshParticipationList();
			$this->dtgMembers->Refresh();
			$strText = QDateTime::Now()->Difference($this->objGroup->SmartGroup->DateRefreshed)->SimpleDisplay();
			$this->lblRefresh->Text = ($strText) ? 'about ' . $strText . ' ago' : 'just now';
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