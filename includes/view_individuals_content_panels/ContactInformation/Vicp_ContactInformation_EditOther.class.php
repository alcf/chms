<?php
	class Vicp_ContactInformation_EditOther extends Vicp_Base {
		public $mctOther;
		public $btnDelete;

		public $lstOtherContactMethod;
		public $txtValue;

		protected function SetupPanel() {
			// Get and Validate the Other Object
			$this->mctOther = OtherContactInfoMetaControl::Create($this, $this->strUrlHashArgument, QMetaControlCreateType::CreateOnRecordNotFound);

			if (!$this->mctOther->EditMode) {
				// Trying to create a NEW Other
				$this->mctOther->OtherContactInfo->Person = $this->objPerson;
				$this->btnSave->Text = 'Create';
			} else {
				// Ensure the Other object belongs to the person
				if ($this->mctOther->OtherContactInfo->PersonId != $this->objPerson->Id) {
					return $this->ReturnTo('#contact');
				}
				$this->btnSave->Text = 'Update';

				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->CssClass = 'delete';
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to permenantly DELETE this record?'));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}

			$this->txtValue = $this->mctOther->txtValue_Create();
			$this->txtValue->Required = true;

			$this->txtValue->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->txtValue->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtValue->CausesValidation = $this->btnSave->CausesValidation;

			$this->lstOtherContactMethod = $this->mctOther->lstOtherContactMethod_Create();
			$this->lstOtherContactMethod->Required = true;
		}

		public function btnSave_Click() {
			$this->mctOther->SaveOtherContactInfo();
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}

		public function btnCancel_Click() {
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}
	
		public function btnDelete_Click() {
			$this->mctOther->OtherContactInfo->Delete();
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}
	}
?>