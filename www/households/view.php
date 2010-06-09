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
		protected $dtgAddresses;

		protected function Form_Create() {
			// Setup Household Object
			$this->objHousehold = Household::Load(QApplication::PathInfo(0));
			if (!$this->objHousehold) QApplication::Redirect('/households/');
			$this->strPageTitle .= $this->objHousehold->Name;

			// Setup DataGrids
			$this->dtgMembers = new HouseholdParticipationDataGrid($this);
			$this->dtgMembers->MetaAddColumn('Role');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->FirstName, 'Name=Name', 'Html=<?= $_ITEM->Person->LinkHtml; ?>', 'HtmlEntities=false');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryEmail->Address, 'Name=Email');
			$this->dtgMembers->MetaAddColumn(QQN::HouseholdParticipation()->Person->PrimaryPhone->Number, 'Name=Phone');
			$this->dtgMembers->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind');
		}

		public function dtgMembers_Bind() {
			$objCondition = QQ::Equal(QQN::HouseholdParticipation()->HouseholdId, $this->objHousehold->Id);
			$this->dtgMembers->MetaDataBinder($objCondition);
		}
	}

	ViewHouseholdForm::Run('ViewHouseholdForm');
?>