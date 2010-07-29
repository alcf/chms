<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the GrowthGroupLocation class.  It uses the code-generated
	 * GrowthGroupLocationDataGrid control which has meta-methods to help with
	 * easily creating/defining GrowthGroupLocation columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both growth_group_location_list.php AND
	 * growth_group_location_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class GrowthGroupLocationListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list GrowthGroupLocations
		protected $dtgGrowthGroupLocations;

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
			$this->dtgGrowthGroupLocations = new GrowthGroupLocationDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgGrowthGroupLocations->CssClass = 'datagrid';
			$this->dtgGrowthGroupLocations->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgGrowthGroupLocations->Paginator = new QPaginator($this->dtgGrowthGroupLocations);
			$this->dtgGrowthGroupLocations->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/growth_group_location_edit.php';
			$this->dtgGrowthGroupLocations->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for growth_group_location's properties, or you
			// can traverse down QQN::growth_group_location() to display fields that are down the hierarchy)
			$this->dtgGrowthGroupLocations->MetaAddColumn('Id');
			$this->dtgGrowthGroupLocations->MetaAddColumn('Location');
			$this->dtgGrowthGroupLocations->MetaAddColumn('Longitude');
			$this->dtgGrowthGroupLocations->MetaAddColumn('Latitude');
			$this->dtgGrowthGroupLocations->MetaAddColumn('Zoom');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// growth_group_location_list.tpl.php as the included HTML template file
	GrowthGroupLocationListForm::Run('GrowthGroupLocationListForm');
?>