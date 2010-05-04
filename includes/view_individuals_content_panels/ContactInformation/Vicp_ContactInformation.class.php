<?php
	class Vicp_ContactInformation extends Vicp_Base {
		public $dtgPersonalAddresses;

		protected function SetupPanel() {
			$this->dtgPersonalAddresses = new QDataGrid($this);
			$this->dtgPersonalAddresses->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('Type', '<?= $_CONTROL->ParentControl->RenderPersonalAddressType($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('Address', '<?= $_CONTROL->ParentControl->RenderPersonalAddress($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('City, State', '<?= $_ITEM->City . ", " . $_ITEM->State; ?>'));
			$this->dtgPersonalAddresses->AddColumn(new QDataGridColumn('Zip', '<?= $_ITEM->ZipCode; ?>'));
			$this->dtgPersonalAddresses->SetDataBinder('dtgPersonalAddress_Bind', $this);
		}

		public function dtgPersonalAddress_Bind() {
			$this->dtgPersonalAddresses->DataSource = $this->objPerson->GetAddressArray(QQ::OrderBy(QQN::Address()->CurrentFlag, false, QQN::Address()->AddressTypeId));
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

		public function RenderPersonalAddress(Address $objAddress) {
			$strToReturn = $objAddress->Address1;
			if ($objAddress->Address2) $strToReturn .= ', ' . $objAddress->Address2;
			if ($objAddress->Address3) $strToReturn .= ', ' . $objAddress->Address3;
			return sprintf('<a href="#contact/edit_address/%s">%s</a>', $objAddress->Id, QApplication::HtmlEntities($strToReturn));
		}
	}
?>