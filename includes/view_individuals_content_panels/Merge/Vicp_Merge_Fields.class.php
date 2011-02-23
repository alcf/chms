<?php
	class Vicp_Merge_Fields extends Vicp_Base {
		/**
		 * @var Person
		 */
		public $objPersonMergeWith;
		
		public $btnLeft;
		public $btnRight;
		
		protected function SetupPanel() {
			$this->objPersonMergeWith = Person::Load($this->strUrlHashArgument);
			if (!$this->objPersonMergeWith ||
				($this->objPersonMergeWith->Id == $this->objPerson->Id))
				return $this->ReturnTo($this->objPerson->LinkUrl);

			// Do the households match up okay?
			$blnHouseholdOkay = true;
			if ($this->objPerson->HouseholdAsHead) {
				foreach ($this->objPersonMergeWith->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
					if ($objHouseholdParticipation->HouseholdId != $this->objPerson->HouseholdAsHead->Id)
						if ($objHouseholdParticipation->Household->CountHouseholdParticipations() > 1)
							$blnHouseholdOkay = false;
				}
			}
			if ($this->objPersonMergeWith->HouseholdAsHead) {
				foreach ($this->objPerson->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
					if ($objHouseholdParticipation->HouseholdId != $this->objPersonMergeWith->HouseholdAsHead->Id)
						if ($objHouseholdParticipation->Household->CountHouseholdParticipations() > 1)
							$blnHouseholdOkay = false;
				}
			}
			
			if (!$blnHouseholdOkay) {
				$this->strTemplate = dirname(__FILE__) . '/Vicp_Merge_Fields_Invalid.tpl.php';
				return;
			}

			$this->btnLeft = new QButton($this);
			$this->btnLeft->CssClass = 'primary';
			$this->btnLeft->Text = 'Use This';
			$this->btnLeft->AddAction(new QClickEvent(), new QConfirmAction('You are about to PERMANENTLY merge two records together.  This cannot be undone.\\r\\nAre you SURE you wish to proceed?'));
			$this->btnLeft->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnLeft_Click'));

			$this->btnRight = new QButton($this);
			$this->btnRight->CssClass = 'primary';
			$this->btnRight->Text = 'Use This';
			$this->btnRight->AddAction(new QClickEvent(), new QConfirmAction('You are about to PERMANENTLY merge two records together.  This cannot be undone.\\r\\nAre you SURE you wish to proceed?'));
			$this->btnRight->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnRight_Click'));
		}

		public function btnLeft_Click() {
			$this->objPerson->MergeWith($this->objPersonMergeWith, true);
			QApplication::DisplayAlert('The records have been merged.');
			$this->ReturnTo($this->objPerson->LinkUrl);
		}

		public function btnRight_Click() {
			$this->objPerson->MergeWith($this->objPersonMergeWith, false);
			QApplication::DisplayAlert('The records have been merged.');
			$this->ReturnTo($this->objPerson->LinkUrl);
		}
	}
?>