<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewHouseholdForm extends ChmsForm {
		protected $strPageTitle = 'View Household - ';
		protected $intNavSectionId = ChmsForm::NavSectionHouseholds;

		/**
		 * @var Household
		 */
		protected $objHousehold;

		protected $dtgMembers;
		protected $dtgHomeAddresses;
		protected $pxySetCurrentHomeAddress;
		
		protected function Form_Create() {
			// Setup Household Object
			$this->objHousehold = Household::Load(QApplication::PathInfo(0));
			if (!$this->objHousehold) QApplication::Redirect('/households/');
			$this->strPageTitle .= $this->objHousehold->Name;

			// Setup DataGrids
			$this->dtgMembers = new HouseholdParticipationDataGrid($this);
			$this->dtgMembers->MetaAddColumn('Role', 'Width=80px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->FirstName, 'Name=Name', 'Html=<?= $_ITEM->Person->LinkHtml; ?>', 'HtmlEntities=false', 'Width=300px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryEmail->Address, 'Name=Email', 'Width=250px');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryPhone->Number, 'Name=Phone', 'Width=290px');

			$this->dtgMembers->GetColumn(0)->OrderByClause = null;
			$this->dtgMembers->GetColumn(1)->OrderByClause = null;
			$this->dtgMembers->GetColumn(2)->OrderByClause = null;
			$this->dtgMembers->GetColumn(3)->OrderByClause = null;

			$this->dtgMembers->SetDataBinder('dtgMembers_Bind');


			$this->dtgHomeAddresses = new QDataGrid($this);
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('Type', '<?= $_FORM->RenderHomeAddressType($_ITEM); ?>', 'HtmlEntities=false', 'Width=80px'));
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('Address', '<?= $_FORM->RenderHomeAddress($_ITEM); ?>', 'HtmlEntities=false', 'Width=320px'));
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('City, State', '<?= $_ITEM->City . ", " . $_ITEM->State; ?>', 'Width=180px'));
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('Zip', '<?= $_ITEM->ZipCode; ?>', 'Width=100px'));
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('Phone', '<?= $_FORM->RenderHomePhone($_ITEM); ?>', 'Width=120px'));
			$this->dtgHomeAddresses->AddColumn(new QDataGridColumn('Invalid', '<?= $_ITEM->InvalidFlag ? "INVALID" : null; ?>', 'Width=100px'));
			$this->dtgHomeAddresses->SetDataBinder('dtgHomeAddresses_Bind');

			$this->pxySetCurrentHomeAddress = new QControlProxy($this);
			$this->pxySetCurrentHomeAddress->AddAction(new QClickEvent(), new QAjaxAction('pxySetCurrentHomeAddress_Click'));
			$this->pxySetCurrentHomeAddress->AddAction(new QClickEvent(), new QTerminateAction());
		}

		public function dtgHomeAddresses_Bind() {
			$this->dtgHomeAddresses->DataSource = $this->objHousehold->GetAddressArray(QQ::OrderBy(QQN::Address()->CurrentFlag, false, QQN::Address()->AddressTypeId));
		}

		public function pxySetCurrentHomeAddress_Click($strFormId, $strControlId, $strParameter) {
			// Get and validate Address object
			$objAddress = Address::Load($strParameter);
			if (!$objAddress) return;
			if ($objAddress->HouseholdId != $this->objHousehold->Id) return;

			$this->objHousehold->SetAsCurrentAddress($objAddress);
			$this->dtgHomeAddresses->Refresh();
		}

		public function RenderHomePhone(Address $objAddress) {
			if ($objAddress->PrimaryPhone) return $objAddress->PrimaryPhone->Number;
		}

		public function RenderHomeAddressType(Address $objAddress) {
			if ($objAddress->CurrentFlag) {
				return 'Current';
			} else {
				return sprintf('[<a href="#" %s>set</a>]', $this->pxySetCurrentHomeAddress->RenderAsEvents($objAddress->Id, false));
			}
		}

		public function RenderHomeAddress(Address $objAddress) {
			$strToReturn = $objAddress->Address1;
			if ($objAddress->Address2) $strToReturn .= ', ' . $objAddress->Address2;
			if ($objAddress->Address3) $strToReturn .= ', ' . $objAddress->Address3;
			return sprintf('<a href="#contact/edit_home_address/%s">%s</a>', $objAddress->Id, QApplication::HtmlEntities($strToReturn));
		}

		public function dtgMembers_Bind() {
			$this->dtgMembers->DataSource = $this->objHousehold->GetOrderedParticipantArray();
		}
	}

	ViewHouseholdForm::Run('ViewHouseholdForm');
?>