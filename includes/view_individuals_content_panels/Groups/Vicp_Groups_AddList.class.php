<?php
	class Vicp_Groups_AddList extends Vicp_Base {
		public $lstCommunicationLists;

		protected function SetupPanel() {
			$objExistingLists = array();
			foreach ($this->objPerson->GetCommunicationListArray() as $objList)
				$objExistingLists[$objList->Id] = true;

			$this->lstCommunicationLists = new QListBox($this);
			$this->lstCommunicationLists->Name = 'Communication List';
			$this->lstCommunicationLists->AddItem('- Select One -');
			$this->lstCommunicationLists->Required = true;
			foreach (CommunicationList::LoadAll(QQ::OrderBy(QQN::CommunicationList()->Name)) as $objList) {
				if (!array_key_exists($objList->Id, $objExistingLists))
					$this->lstCommunicationLists->AddItem($objList->Name, $objList->Id);
			}
			$this->btnSave->Text = 'Add';
		}

		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			$objList = CommunicationList::Load($this->lstCommunicationLists->SelectedValue);
			$this->objPerson->AssociateCommunicationList($objList);
			QApplication::ExecuteJavaScript('document.location = "#groups";');
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			QApplication::ExecuteJavaScript('document.location = "#groups";');
		}
	}
?>