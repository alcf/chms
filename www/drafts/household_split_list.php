<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the HouseholdSplit class.  It uses the code-generated
	 * HouseholdSplitDataGrid control which has meta-methods to help with
	 * easily creating/defining HouseholdSplit columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both household_split_list.php AND
	 * household_split_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class HouseholdSplitListForm extends QForm {
		// Local instance of the Meta DataGrid to list HouseholdSplits
		protected $dtgHouseholdSplits;

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
			$this->dtgHouseholdSplits = new HouseholdSplitDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgHouseholdSplits->CssClass = 'datagrid';
			$this->dtgHouseholdSplits->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgHouseholdSplits->Paginator = new QPaginator($this->dtgHouseholdSplits);
			$this->dtgHouseholdSplits->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/household_split_edit.php';
			$this->dtgHouseholdSplits->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for household_split's properties, or you
			// can traverse down QQN::household_split() to display fields that are down the hierarchy)
			$this->dtgHouseholdSplits->MetaAddColumn('Id');
			$this->dtgHouseholdSplits->MetaAddColumn(QQN::HouseholdSplit()->Household);
			$this->dtgHouseholdSplits->MetaAddColumn(QQN::HouseholdSplit()->SplitHousehold);
			$this->dtgHouseholdSplits->MetaAddColumn('DateSplit');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// household_split_list.tpl.php as the included HTML template file
	HouseholdSplitListForm::Run('HouseholdSplitListForm');
?>