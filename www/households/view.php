<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	// Note that the "Content Panels" for this ViewIndiviual form resides in /includes/view_individuals_content_panels
	// and they get auto_included by the framework

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
			$this->dtgMembers->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgMembers->SetDataBinder('dtgMembers_Bind');
		}

		public function dtgMembers_Bind() {
			$this->dtgMembers->DataSource
		}
	}

	ViewHouseholdForm::Run('ViewHouseholdForm');
?>