<?php
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class Vicp_Stewardship_EditPledge extends Vicp_Base {
		public $mctPledge;

		public $lstStewardshipFund;
		public $calDateStarted;
		public $calDateEnded;
		public $txtPledgeAmount;
		public $chkActiveFlag;

		public $btnDelete;
		protected function SetupPanel() {
			$this->mctPledge = StewardshipPledgeMetaControl::Create($this, $this->strUrlHashArgument, QMetaControlCreateType::CreateOnRecordNotFound);

			if (!$this->mctPledge->EditMode) {				
				// Trying to create a NEW comment
				$this->mctPledge->StewardshipPledge->DateStarted = QDateTime::Now();
				$this->mctPledge->StewardshipPledge->Person = $this->objPerson;
				$this->mctPledge->StewardshipPledge->FulfilledFlag = false;
				$this->mctPledge->StewardshipPledge->ActiveFlag = true;
				$this->btnSave->Text = 'Create';
			} else {
				$this->btnSave->Text = 'Update';
				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->CssClass = 'delete';
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to DELETE this pledge?'));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}

			// Create Controls
			$this->lstStewardshipFund = $this->mctPledge->lstStewardshipFund_Create(null, QQ::All(), array(QQ::OrderBy(QQN::StewardshipFund()->Name)));
			$this->calDateStarted = $this->mctPledge->calDateStarted_Create();
			$this->calDateEnded = $this->mctPledge->calDateEnded_Create();
			$this->txtPledgeAmount = $this->mctPledge->txtPledgeAmount_Create();
			$this->chkActiveFlag = $this->mctPledge->chkActiveFlag_Create();
			$this->chkActiveFlag->Text = 'Note: All fulfilled pledges automatically considred "inactive".';

			$this->calDateStarted->MinimumYear = 2000;
			$this->calDateStarted->MaximumYear = date('Y') + 10;
			$this->calDateEnded->MinimumYear = 2000;
			$this->calDateEnded->MaximumYear = date('Y') + 10;
		}

		public function btnSave_Click() {
			if ($this->calDateStarted->DateTime->IsLaterOrEqualTo($this->calDateEnded->DateTime)) {
				$this->calDateEnded->Warning = 'Must be after Start Date';
				return;
			}

			$this->mctPledge->SaveStewardshipPledge();
			$this->mctPledge->StewardshipPledge->Refresh();
			QApplication::ExecuteJavaScript('document.location="#stewardship";');
		}

		public function btnDelete_Click() {
			$this->mctPledge->DeleteStewardshipPledge();
			QApplication::ExecuteJavaScript('document.location="#stewardship";');
		}

		public function btnCancel_Click() {
			QApplication::ExecuteJavaScript('document.location="#stewardship";');
		}	
	}
?>