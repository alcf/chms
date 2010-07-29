<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the GrowthGroupStructure class.  It uses the code-generated
	 * GrowthGroupStructureDataGrid control which has meta-methods to help with
	 * easily creating/defining GrowthGroupStructure columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both growth_group_structure_list.php AND
	 * growth_group_structure_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class GrowthGroupStructureListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list GrowthGroupStructures
		protected $dtgGrowthGroupStructures;

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
			$this->dtgGrowthGroupStructures = new GrowthGroupStructureDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgGrowthGroupStructures->CssClass = 'datagrid';
			$this->dtgGrowthGroupStructures->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgGrowthGroupStructures->Paginator = new QPaginator($this->dtgGrowthGroupStructures);
			$this->dtgGrowthGroupStructures->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/growth_group_structure_edit.php';
			$this->dtgGrowthGroupStructures->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for growth_group_structure's properties, or you
			// can traverse down QQN::growth_group_structure() to display fields that are down the hierarchy)
			$this->dtgGrowthGroupStructures->MetaAddColumn('Id');
			$this->dtgGrowthGroupStructures->MetaAddColumn('Name');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// growth_group_structure_list.tpl.php as the included HTML template file
	GrowthGroupStructureListForm::Run('GrowthGroupStructureListForm');
?>