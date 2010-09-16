<?php
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class Vicp_Stewardship_EditPledge extends Vicp_Base {
		public $mctPledge;

		public $lstStewardshipFund;
		public $calDateStarted;
		public $calDateEnded;
		public $txtPledgeAmount;
		public $chkActiveFlag;

		protected function SetupPanel() {
			$this->mctPledge = StewardshipPledgeMetaControl::Create($this, $this->strUrlHashArgument, QMetaControlCreateType::CreateOnRecordNotFound);

			if (!$this->mctPledge->EditMode) {				
				// Trying to create a NEW comment
				$this->mctPledge->StewardshipPledge->Person = $this->objPerson;
				$this->mctPledge->StewardshipPledge->FulfilledFlag = false;
				$this->btnSave->Text = 'Create';
			} else {
				$this->btnSave->Text = 'Update';
			}
	
			// Create Controls
			$this->lstStewardshipFund = $this->mctPledge->lstStewardshipFund_Create(null, QQ::All(), array(QQ::OrderBy(QQN::StewardshipFund()->Name)));
			$this->calDateStarted = $this->mctPledge->calDateStarted_Create();
			$this->calDateEnded = $this->mctPledge->calDateEnded_Create();
			$this->txtPledgeAmount = $this->mctPledge->txtPledgeAmount_Create();
			$this->chkActiveFlag = $this->mctPledge->chkActiveFlag_Create();
			$this->chkActiveFlag->Text = 'Note: All fulfilled pledges automatically considred "inactive".';
		}

		public function btnSave_Click() {
			$this->mctPledge->SaveStewardshipPledge();
			$this->mctPledge->StewardshipPledge->Refresh();
			QApplication::ExecuteJavaScript('document.location="#stewardship";');
		}

		public function btnCancel_Click() {
			QApplication::ExecuteJavaScript('document.location="#stewardship";');
		}	
	}
?>