<?php
	class Vicp_ContactInformation_EditPhone extends Vicp_Base {
		public $mctPhone;
		public $btnDelete;

		public $lstPhoneType;
		public $txtNumber;

		protected function SetupPanel() {
			// Get and Validate the Phone Object
			$this->mctPhone = PhoneMetaControl::Create($this, $this->strUrlHashArgument, QMetaControlCreateType::CreateOnRecordNotFound);

			if (!$this->mctPhone->EditMode) {
				// Trying to create a NEW phone
				$this->mctPhone->Phone->Person = $this->objPerson;
				$this->btnSave->Text = 'Create';
			} else {
				// Ensure the Phone object belongs to the person
				if ($this->mctPhone->Phone->PersonId != $this->objPerson->Id) {
					return $this->ReturnTo('#contact');
				}
				$this->btnSave->Text = 'Update';

				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->ForeColor = '#666666';
				$this->btnDelete->SetCustomStyle('margin-left', '200px');
				if ($this->objPerson->PrimaryPhoneId == $this->mctPhone->Phone->Id) {
					$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('You are about to delete the PRIMARY phone nubmer.  Are you SURE you want to permenantly DELETE this record?'));
				} else {
					$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to permenantly DELETE this record?'));
				}
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}

			// Create Controls
			$this->lstPhoneType = $this->mctPhone->lstPhoneType_Create();

			// Fixup "Phone Type"
			$this->lstPhoneType->RemoveItem(0);
			if (!$this->mctPhone->EditMode) $this->lstPhoneType->AddSelectOneOption();

			$this->txtNumber = $this->mctPhone->txtNumber_Create();
			$this->txtNumber->Required = true;
		}

		public function btnSave_Click() {
			$this->mctPhone->SavePhone();
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}

		public function btnCancel_Click() {
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}
	
		public function btnDelete_Click() {
			$this->mctPhone->Phone->Delete();
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}
	}
?>