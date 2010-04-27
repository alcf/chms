<?php
	class HouseholdSelectorPanel extends QPanel {
		public $dtrHouseholdParticipation;
		public $lstHouseholds;

		public function __construct($objParentObject, $strControlId = null) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			$this->strTemplate = dirname(__FILE__) . '/HouseholdSelectorPanel.tpl.php';
			$this->dtrHouseholdParticipation = new QDataRepeater($this);

			$this->lstHouseholds = new QListBox($this);

			$this->Refresh();
		}

		public function Refresh() {
			parent::Refresh();

			if ($this->objForm->objHousehold) {
				$this->dtrHouseholdParticipation->DataSource = $this->objForm->objHousehold->GetHouseholdParticipationArray();
				$this->dtrHouseholdParticipation->Template = dirname(__FILE__) . '/dtrHouseholdParticipation.tpl.php';
			} else {
				$this->dtrHouseholdParticipation->DataSource = null;
				$this->dtrHouseholdParticipation->Template = dirname(__FILE__) . '/dtrHouseholdParticipation_Individual.tpl.php';
			}

			if (count($this->objForm->objPerson->CountHouseholdParticipations()) >= 2) {
				$this->lstHouseholds->Visible = true;
				$this->lstHouseholds->RemoveAllItems();
				foreach ($this->objForm->objPerson->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
					$this->lstHouseholds->AddItem($objHouseholdParticipation->Household->Name, $objHouseholdParticipation->HouseholdId,
						$objHouseholdParticipation->HouseholdId == $this->objForm->objHousehold->Id);
				}
			} else {
				$this->lstHouseholds->Visible = false;
			}
		}

		public function RenderAction(HouseholdParticipation $objHouseholdParticipation) {
			return sprintf('document.location = "/individuals/view.php/%s/%s#" + qc.getHashContent(); return false;',
				$objHouseholdParticipation->PersonId, $objHouseholdParticipation->HouseholdId);
		}
	}
?>