<?php
	class Vicp_ContactInformation_EditCoprimary extends Vicp_Base {
		public $pnlPerson;
		public $btnDelete;

		public $txtAddress;

		protected function SetupPanel() {
			// Ensure Permission - figure if they can modify the email address they can modify the co-primary.
			if (!$this->objPerson->IsLoginCanEditEmailAddress(QApplication::$Login)) {
				return $this->ReturnTo('#contact');
			}

			$this->pnlPerson = new SelectPersonPanel($this);
			$this->pnlPerson->Name = 'Co-Primary';
			$this->pnlPerson->AllowCreate = true;
			$this->pnlPerson->Required = true;
			
			// Initialize
			if($this->objPerson->CoPrimary) {
				$objCoPrimary = Person::Load($this->objPerson->CoPrimary);
				if($objCoPrimary) {
					$this->pnlPerson->txtName->Text = sprintf("%s %s",$objCoPrimary->FirstName,$objCoPrimary->LastName);	
				}
			}
			
			$this->btnSave->Text = 'Update';

			$this->btnDelete = new QLinkButton($this);
			$this->btnDelete->Text = 'Delete';
			$this->btnDelete->CssClass = 'delete';
		}

		public function btnSave_Click() {
			$this->objPerson->CoPrimary = $this->pnlPerson->Person->Id;
			$this->objPerson->Save();
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}

		public function btnCancel_Click() {
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}
	
		public function btnDelete_Click() {
			$this->objPerson->CoPrimary = 0;
			$this->objPerson->Save();
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}
	}
?>