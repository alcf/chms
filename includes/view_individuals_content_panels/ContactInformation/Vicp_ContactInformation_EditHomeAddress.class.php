<?php
	class Vicp_ContactInformation_EditHomeAddress extends Vicp_Base {
		public $mctAddress;
		public $btnDelete;

		public $dtrPhones;
		public $arrPhones;
		public $pxyAddPhone;

		public $chkInvalidFlag;
		public $txtAddress1;
		public $txtAddress2;
		public $txtAddress3;
		public $txtCity;
		public $lstState;
		public $txtZipCode;

		protected function SetupPanel() {
			// We need to have a household!
			if (!$this->objForm->objHousehold) return $this->ReturnTo('#contact');

			// Get and Validate the Address Object
			$this->mctAddress = AddressMetaControl::Create($this, $this->strUrlHashArgument, QMetaControlCreateType::CreateOnRecordNotFound);

			if (!$this->mctAddress->EditMode) {
				// Trying to create a NEW address
				$this->mctAddress->Address->Household = $this->objForm->objHousehold;
				$this->mctAddress->Address->AddressTypeId = AddressType::Home;
				$this->mctAddress->Address->CurrentFlag = true;
				$this->btnSave->Text = 'Create';

				// Create Phone Numbers
				$this->arrPhones = array();
				$this->AddPhoneNumberField();
				$this->AddPhoneNumberField();
				$this->AddPhoneNumberField();
			} else {
				// Ensure the Address object belongs to the household
				if ($this->mctAddress->Address->HouseholdId != $this->objForm->objHousehold->Id) {
					return $this->ReturnTo('#contact');
				}
				$this->btnSave->Text = 'Update';

				// Create DELETE Button for non-Current
				if (!$this->mctAddress->Address->CurrentFlag) {
					$this->btnDelete = new QLinkButton($this);
					$this->btnDelete->Text = 'Delete';
					$this->btnDelete->ForeColor = '#666666';
					$this->btnDelete->SetCustomStyle('margin-left', '200px');
					$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to permenantly DELETE this record?'));
					$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
					$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
				}

				// Get Phone Numbers
				$arrPhones = $this->mctAddress->Address->GetPhoneArray(QQ::OrderBy(QQN::Phone()->Id));
				if ($this->mctAddress->Address->PrimaryPhone) {
					$this->arrPhones = array();
					$this->arrPhones[] = $this->mctAddress->Address->PrimaryPhone;
					foreach ($arrPhones as $objPhone) {
						if ($objPhone->Id != $this->mctAddress->Address->PrimaryPhoneId)
							$this->arrPhones[] = $objPhone;
					}
				} else {
					$this->arrPhones = $arrPhones;
				}

				// Add one additional
				if (count($this->arrPhones) < 3) {
					while (count($this->arrPhones) < 3) $this->AddPhoneNumberField();
				} else {
					$this->AddPhoneNumberField();
				}
			}

			// Create Controls
			$this->chkInvalidFlag = $this->mctAddress->chkInvalidFlag_Create();
			$this->txtAddress1 = $this->mctAddress->txtAddress1_Create();
			$this->txtAddress2 = $this->mctAddress->txtAddress2_Create();
			$this->txtAddress3 = $this->mctAddress->txtAddress3_Create();
			$this->txtCity = $this->mctAddress->txtCity_Create();
			$this->lstState = $this->mctAddress->lstState_Create();
			$this->txtZipCode = $this->mctAddress->txtZipCode_Create();

			// PHone Numbers
			$this->dtrPhones = new QDataRepeater($this);
			$this->dtrPhones->Template = dirname(__FILE__) . '/dtrPhones.tpl.php';
			$this->dtrPhones->SetDataBinder('dtrPhones_Bind', $this);
			
			$this->pxyAddPhone = new QControlProxy($this);
			$this->pxyAddPhone->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyAddPhone_Click'));
			$this->pxyAddPhone->AddAction(new QClickEvent(), new QTerminateAction());
		}
		
		public function pxyAddPhone_Click() {
			$this->AddPhoneNumberField();
			$this->dtrPhones->Refresh();
		}

		public function AddPhoneNumberField() {
			$objPhone = new Phone();
			$objPhone->PhoneTypeId = PhoneType::Home;
			$this->arrPhones[] = $objPhone;
		}

		public function dtrPhones_Bind() {
			$this->dtrPhones->DataSource = $this->arrPhones;
		}

		public function btnSave_Click() {
			// Save the object, itself
			$this->mctAddress->SaveAddress();
			
			// Phone Numbers
			for ($intIndex = 0; $intIndex < count($this->arrPhones); $intIndex++) {
				$txtPhone = $this->objForm->GetControl('txtPhone' . $intIndex);
				$radPhone = $this->objForm->GetControl('radPhone' . $intIndex);
				$objPhone = $this->arrPhones[$intIndex];

				if (trim($txtPhone->Text)) {
					$objPhone->AddressId = $this->mctAddress->Address->Id;
					$objPhone->Number = trim($txtPhone->Text);
					$objPhone->Save();

					if ($radPhone->Checked) $objPhone->SetAsPrimary();
				} else if ($objPhone->Id) {
					$objPhone->Delete();
				}
			}

			// If this addrss we are saving is "Current" then
			// let's make sure all the other addresses are PREVIOUS
			if ($this->mctAddress->Address->CurrentFlag) $this->objForm->objHousehold->SetAsCurrentAddress($this->mctAddress->Address);

			QApplication::ExecuteJavaScript('document.location="#contact";');
		}

		public function btnCancel_Click() {
			QApplication::ExecuteJavaScript('document.location="#contact";');
		}
	
		public function btnDelete_Click() {
			
		}

		public function Validate() {
			$blnToReturn = parent::Validate();

			// How Many Phone Textboxes?
			$intCount = 0;
			$blnPrimaryContentExists = false;
			$blnAnyContentExists = false;

			while ($txtPhone = $this->objForm->GetControl('txtPhone' . $intCount)) {
				$radPhone = $this->objForm->GetControl('radPhone' . $intCount);
				$intCount++;

				if ($radPhone->Checked && strlen(trim($txtPhone->Text)))
					$blnPrimaryContentExists = true;
				if (strlen(trim($txtPhone->Text)))
					$blnAnyContentExists = true;

				if ($radPhone->Checked) $txtPrimaryPhone = $txtPhone;
			}

			if ($blnAnyContentExists && !$blnPrimaryContentExists) {
				$txtPrimaryPhone->Warning = 'At least one number must be Primary';
				$blnToReturn = false;
			}

			return $blnToReturn;
		}
	}
?>