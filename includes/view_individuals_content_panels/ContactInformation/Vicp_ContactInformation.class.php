<?php
	class Vicp_ContactInformation extends Vicp_Base {
		public $dtgPersonalAddresses;
		public $dtgHomeAddresses;
		public $dtgPhones;

		protected $pxySetCurrentHomeAddress;
		protected $pxySetPrimaryPhone;

		protected function SetupPanel() {
			$this->dtgPersonalAddresses = new QDataGrid($this);
			$this->dtgPersonalAddresses->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('Type', '<?= $_CONTROL->ParentControl->RenderPersonalAddressType($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('Address', '<?= $_CONTROL->ParentControl->RenderPersonalAddress($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('City, State', '<?= $_ITEM->City . ", " . $_ITEM->State; ?>'));
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('Zip', '<?= $_ITEM->ZipCode; ?>'));
			$this->dtgPersonalAddresses->SetDataBinder('dtgPersonalAddresses_Bind', $this);

			$this->dtgHomeAddresses = new QDataGrid($this);
			$this->dtgHomeAddresses->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('Type', '<?= $_CONTROL->ParentControl->RenderHomeAddressType($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('Address', '<?= $_CONTROL->ParentControl->RenderHomeAddress($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('City, State', '<?= $_ITEM->City . ", " . $_ITEM->State; ?>'));
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('Zip', '<?= $_ITEM->ZipCode; ?>'));
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('Phone', '<?= $_CONTROL->ParentControl->RenderHomePhone($_ITEM); ?>'));
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('Invalid', '<?= $_ITEM->InvalidFlag ? "INVALID" : null; ?>'));
			$this->dtgHomeAddresses->SetDataBinder('dtgHomeAddresses_Bind', $this);

			$this->pxySetCurrentHomeAddress = new QControlProxy($this);
			$this->pxySetCurrentHomeAddress->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxySetCurrentHomeAddress_Click'));
			$this->pxySetCurrentHomeAddress->AddAction(new QClickEvent(), new QTerminateAction());

			$this->dtgPhones = new QDataGrid($this);
			$this->dtgPhones->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgPhones->AddColumn(new QDataGridColumn('Primary?', '<?= $_CONTROL->ParentControl->RenderPhonePrimary($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgPhones->AddColumn(new QDataGridColumn('Type', '<?= $_CONTROL->ParentControl->RenderPhoneType($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgPhones->AddColumn(new QDataGridColumn('Number', '<?= $_CONTROL->ParentControl->RenderPhoneNumber($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgPhones->SetDataBinder('dtgPhones_Bind', $this);

			$this->pxySetPrimaryPhone = new QControlProxy($this);
			$this->pxySetPrimaryPhone->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxySetPrimaryPhone_Click'));
			$this->pxySetPrimaryPhone->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function dtgPhones_Bind() {
			$this->dtgPhones->DataSource = $this->objPerson->GetAllAssociatedPhoneArray($this->objForm->objHousehold);
		}

		public function RenderPhonePrimary(Phone $objPhone) {
			if ($objPhone->Id == $this->objPerson->PrimaryPhoneId) {
				return 'Primary';
			} else {
				return sprintf('[<a href="#" %s>set as primary</a>]', $this->pxySetPrimaryPhone->RenderAsEvents($objPhone->Id, false));
			}
		}

		public function RenderPhoneNumber(Phone $objPhone) {
			if ($objPhone->Address)
				return $objPhone->Number;
			else
				return sprintf('<a href="#contact/edit_phone/%s">%s</a>', $objPhone->Id, $objPhone->Number);
		}
		
		public function RenderPhoneType(Phone $objPhone) {
			if ($objPhone->Address)
				return PhoneType::$NameArray[$objPhone->PhoneTypeId];
			else
				return sprintf('<a href="#contact/edit_phone/%s">%s</a>', $objPhone->Id, PhoneType::$NameArray[$objPhone->PhoneTypeId]);
		}

		public function pxySetPrimaryPhone_Click($strFormId, $strControlId, $strParameter) {
			// Get and validate Phone object
			$objPhone = Phone::Load($strParameter);
			$objPhone->SetAsPrimary($this->objPerson);
			$this->dtgPhones->Refresh();
		}

		public function pxySetCurrentHomeAddress_Click($strFormId, $strControlId, $strParameter) {
			// Get and validate Address object
			$objAddress = Address::Load($strParameter);
			if (!$objAddress) return;
			if ($objAddress->HouseholdId != $this->objForm->objHousehold->Id) return;

			$this->objForm->objHousehold->SetAsCurrentAddress($objAddress);
			$this->dtgHomeAddresses->Refresh();
			$this->dtgPhones->Refresh();
		}

		public function dtgPersonalAddresses_Bind() {
			$this->dtgPersonalAddresses->DataSource = $this->objPerson->GetAddressArray(QQ::OrderBy(QQN::Address()->CurrentFlag, false, QQN::Address()->AddressTypeId));
		}

		public function dtgHomeAddresses_Bind() {
			$this->dtgHomeAddresses->DataSource = $this->objForm->objHousehold->GetAddressArray(QQ::OrderBy(QQN::Address()->CurrentFlag, false, QQN::Address()->AddressTypeId));
		}

		public function RenderHomePhone(Address $objAddress) {
			if ($objAddress->PrimaryPhone) return $objAddress->PrimaryPhone->Number;
		}

		public function RenderHomeAddressType(Address $objAddress) {
			if ($objAddress->CurrentFlag) {
				return 'Current Home';
			} else {
				return sprintf('[<a href="#" %s>set as current</a>]', $this->pxySetCurrentHomeAddress->RenderAsEvents($objAddress->Id, false));
			}
		}

		public function RenderPersonalAddressType(Address $objAddress) {
			switch ($objAddress->AddressTypeId) {
				case AddressType::Temporary:
					$strToReturn = AddressType::$NameArray[$objAddress->AddressTypeId];
					break;
				default:
					$strToReturn = ($objAddress->CurrentFlag) ? 'Current ' : 'Previous ';
					$strToReturn .= AddressType::$NameArray[$objAddress->AddressTypeId];
					break;
			}

			if (($objAddress->AddressTypeId == AddressType::Temporary) && ($objAddress->DateUntilWhen)) {
				$strToReturn .= '<br/>' . '(until ' . $objAddress->DateUntilWhen->__toString('MMMM D YYYY') . ')';
			}

			return $strToReturn;
		}

		public function RenderHomeAddress(Address $objAddress) {
			$strToReturn = $objAddress->Address1;
			if ($objAddress->Address2) $strToReturn .= ', ' . $objAddress->Address2;
			if ($objAddress->Address3) $strToReturn .= ', ' . $objAddress->Address3;
			return sprintf('<a href="#contact/edit_home_address/%s">%s</a>', $objAddress->Id, QApplication::HtmlEntities($strToReturn));
		}

		public function RenderPersonalAddress(Address $objAddress) {
			$strToReturn = $objAddress->Address1;
			if ($objAddress->Address2) $strToReturn .= ', ' . $objAddress->Address2;
			if ($objAddress->Address3) $strToReturn .= ', ' . $objAddress->Address3;
			return sprintf('<a href="#contact/edit_address/%s">%s</a>', $objAddress->Id, QApplication::HtmlEntities($strToReturn));
		}
	}
?>