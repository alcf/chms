<?php
	class Vicp_ContactInformation extends Vicp_Base {
		public $dtgPersonalAddresses;

		protected function SetupPanel() {
			$this->dtgPersonalAddresses = new QDataGrid($this);
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('Type', '<?= $_CONTROL->ParentControl->RenderPersonalAddressType($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('Address', '<?= $_CONTROL->ParentControl->RenderPersonalAddress($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('City, State', '<?= $_ITEM->City . ", " . $_ITEM->State; ?>'));
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('Zip', '<?= $_ITEM->ZipCode; ?>'));
			$this->dtgPersonalAddresses->SetDataBinder('dtgPersonalAddress_Bind', $this);
		}

		public function dtgPersonalAddress_Bind() {
			$this->dtgPersonalAddresses->DataSource = $this->objPerson->GetAddressArray();
		}

		public function RenderPersonalAddressType(Address $objAddress) {
			return AddressType::$NameArray[$objAddress->AddressTypeId];
		}

		public function RenderPersonalAddress(Address $objAddress) {
			$strToReturn = $objAddress->Address1;
			if ($objAddress->Address2) $strToReturn .= ', ' . $objAddress->Address2;
			if ($objAddress->Address3) $strToReturn .= ', ' . $objAddress->Address3;
			return $strToReturn;
		}
	}
?>