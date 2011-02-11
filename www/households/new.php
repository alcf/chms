<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	require(dirname(__FILE__) . '/EditHouseholdHomeAddressPanel.class.php');
	QApplication::Authenticate();

	class CreateHouseholdForIndividualForm extends ChmsForm {
		protected $strPageTitle = 'Create Household for Individual - ';
		protected $intNavSectionId = ChmsForm::NavSectionHouseholds;

		/**
		 * @var Household
		 */
		public $objHousehold;
		
		/**
		 * @var Person
		 */
		public $objPerson;
		
		public $pnlContent;

		protected function Form_Create() {
			$this->objPerson = Person::Load(QApplication::PathInfo(0));
			if (!$this->objPerson) QApplication::Redirect('/');
			if (!$this->objPerson->IsIndividual()) QApplication::Redirect('/');

			$this->strPageTitle .= $this->objPerson->Name;

			$this->pnlContent = new EditHouseholdHomeAddressPanel($this);
			$this->pnlContent->objDelegate = new EditHomeAddressDelegate($this->pnlContent, $this->objPerson->LinkUrl, null);
			$this->pnlContent->btnSave->AddAction(new QClickEvent(), new QShowDialogBox($this->pnlContent->objDelegate->dlgMessage));
			$this->pnlContent->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));

			// Copy over home phone number
			foreach ($this->objPerson->GetPhoneArray() as $objPhone) if (($objPhone->PhoneTypeId == PhoneType::Home)) {
					$this->pnlContent->objDelegate->arrPhones[0]->Number = $objPhone->Number;
			}
		}
		
		protected function btnSave_Click() {
			$this->pnlContent->objDelegate->mctAddress->UpdateFields();

			if ($this->pnlContent->objDelegate->mctAddress->Address->ValidateUsps()) {
				// Create the household
				$this->objHousehold = Household::CreateHousehold($this->objPerson);
				
				// Delete any old home phone number records
				foreach ($this->objPerson->GetPhoneArray() as $objPhone) if (($objPhone->PhoneTypeId == PhoneType::Home)) {
					$objPhone->Delete();
				}
			}

			// Save the address
			$this->pnlContent->btnSave_Click();
		}
	}

	CreateHouseholdForIndividualForm::Run('CreateHouseholdForIndividualForm');
?>