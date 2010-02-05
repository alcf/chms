<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the HouseholdParticipation class.  It uses the code-generated
	 * HouseholdParticipationDataGrid control which has meta-methods to help with
	 * easily creating/defining HouseholdParticipation columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both household_participation_list.php AND
	 * household_participation_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class HouseholdParticipationListForm extends QForm {
		// Local instance of the Meta DataGrid to list HouseholdParticipations
		protected $dtgHouseholdParticipations;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}
//		protected function Form_Validate() {}

		protected function Form_Run() {
			// Security check for ALLOW_REMOTE_ADMIN
			// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
			QApplication::CheckRemoteAdmin();
		}

		protected function Form_Create() {
			// Instantiate the Meta DataGrid
			$this->dtgHouseholdParticipations = new HouseholdParticipationDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgHouseholdParticipations->CssClass = 'datagrid';
			$this->dtgHouseholdParticipations->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgHouseholdParticipations->Paginator = new QPaginator($this->dtgHouseholdParticipations);
			$this->dtgHouseholdParticipations->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/household_participation_edit.php';
			$this->dtgHouseholdParticipations->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for household_participation's properties, or you
			// can traverse down QQN::household_participation() to display fields that are down the hierarchy)
			$this->dtgHouseholdParticipations->MetaAddColumn('Id');
			$this->dtgHouseholdParticipations->MetaAddColumn(QQN::HouseholdParticipation()->Person);
			$this->dtgHouseholdParticipations->MetaAddColumn(QQN::HouseholdParticipation()->Household);
			$this->dtgHouseholdParticipations->MetaAddColumn('Role');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// household_participation_list.tpl.php as the included HTML template file
	HouseholdParticipationListForm::Run('HouseholdParticipationListForm');
?>