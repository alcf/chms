<?php
	class CpGroup_AddParticipation extends CpGroup_Base {
		public $pnlPerson;

		public $lstRole;
		
		public $dtxDateStart;
		public $calDateStart;
		public $dtxDateEnd;
		public $calDateEnd;

		protected function SetupPanel() {
			if (!$this->objGroup->IsLoginCanEdit(QApplication::$Login)) $this->ReturnTo('/groups/');

			$this->pnlPerson = new SelectPersonPanel($this);
			$this->pnlPerson->Name = 'Participant';
			$this->pnlPerson->AllowCreate = true;
			$this->pnlPerson->Required = true;

			$this->lstRole = new QListBox($this);
			$this->lstRole->Name = 'Role';
			$this->lstRole->Required = true;
			$this->lstRole->AddItem('- Select One -');
			foreach ($this->objGroup->Ministry->GetGroupRoleArray(QQ::OrderBy(QQN::GroupRole()->Name)) as $objGroupRole)
				$this->lstRole->AddItem($objGroupRole->Name, $objGroupRole->Id);

			$this->dtxDateStart = new QDateTimeTextBox($this);
			$this->dtxDateStart->Name = 'Participation Started';
			$this->dtxDateStart->Required = true;
			$this->calDateStart = new QCalendar($this, $this->dtxDateStart);

			$this->dtxDateEnd = new QDateTimeTextBox($this);
			$this->dtxDateEnd->Name = 'Participation Ended';
			$this->calDateEnd = new QCalendar($this, $this->dtxDateEnd);

			$this->dtxDateStart->RemoveAllActions(QClickEvent::EventName);
			$this->dtxDateEnd->RemoveAllActions(QClickEvent::EventName);
		}

		public function Validate() {
			$blnToReturn = parent::Validate();

			if ($this->dtxDateStart->DateTime && $this->dtxDateEnd->DateTime &&
				($this->dtxDateEnd->DateTime->IsEarlierThan($this->dtxDateStart->DateTime))) {
				$this->dtxDateEnd->Warning = 'Must be later than Start Date';
				$blnToReturn = false;
			}

			return $blnToReturn;
		}
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$objPerson = $this->pnlPerson->Person;

			// Validate the Dates
			$dttDateArray = GroupParticipation::GetParticipationDatesArrayForPersonIdGroupIdGroupRoleId($objPerson->Id, $this->objGroup->Id, $this->lstRole->SelectedValue);

			// Add This One
			$dttDateArray[] = array($this->dtxDateStart->DateTime, $this->dtxDateEnd->DateTime);

			// If we have trouble trying to add it, let's redirect the user to the full record
			if (!GroupParticipation::IsValidDates($dttDateArray)) {
				QApplication::DisplayAlert('You are adding a participation that already exists.  Taking you to this person\'s record for more information.');
				return $this->ReturnTo('#' . $this->objGroup->Id . '/edit_participation/' . $objPerson->Id);
			}

			// Go ahead and create the record
			$this->objGroup->AddPerson($objPerson, $this->lstRole->SelectedValue, $this->dtxDateStart->DateTime, $this->dtxDateEnd->DateTime);

			return $this->ReturnTo('#' . $this->objGroup->Id);
		}
	}
?>