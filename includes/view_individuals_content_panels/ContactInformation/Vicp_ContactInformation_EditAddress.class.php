<?php
	class Vicp_ContactInformation_EditAddress extends Vicp_Base {
		public $objAddress;

		public $blnEditMode;
		public $btnDelete;

		public $lstAddressType;
		public $txtAddress1;
		public $txtAddress2;
		public $txtAddress3;
		public $txtCity;
		public $lstState;
		public $txtZipCode;

		protected function SetupPanel() {
			// Get and Validate the Address Object
			$this->objAddress = Address::Load($this->strUrlHashArgument);

			if (!$this->objAddress) {
				// Trying to create a NEW address
				$this->objAddress = new Address();
				$this->objAddress->Person = $this->objPerson;
				$this->blnEditMode = false;
				$this->btnSave->Text = 'Create';
			} else {
				// Ensure the Address object belongs to the person
				if ($this->objAddress->PersonId != $this->objPerson->Id) {
					return $this->ReturnTo('#contact');
				}
				$this->blnEditMode = true;
				$this->btnSave->Text = 'Update';

				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->ForeColor = '#666666';
				$this->btnDelete->SetCustomStyle('margin-left', '200px');
				$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to permenantly DELETE this record?'));
				$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
				$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
			}

			// Create Controls
			$this->txtAddress1 = new QTextBox($this);
			$this->txtAddress1->Name = 'Address 1';
			$this->txtAddress1->Required = true;
			$this->txtAddress1->Text = $this->objAddress->Address1;
		}

		public function btnSave_Click() {
			
		}

		public function btnCancel_Click() {
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}
	
		public function btnDelete_Click() {
			
		}
	}
?>