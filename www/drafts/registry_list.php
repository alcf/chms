<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Registry class.  It uses the code-generated
	 * RegistryDataGrid control which has meta-methods to help with
	 * easily creating/defining Registry columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both registry_list.php AND
	 * registry_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class RegistryListForm extends QForm {
		// Local instance of the Meta DataGrid to list Registries
		protected $dtgRegistries;

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
			$this->dtgRegistries = new RegistryDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgRegistries->CssClass = 'datagrid';
			$this->dtgRegistries->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgRegistries->Paginator = new QPaginator($this->dtgRegistries);
			$this->dtgRegistries->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/registry_edit.php';
			$this->dtgRegistries->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for registry's properties, or you
			// can traverse down QQN::registry() to display fields that are down the hierarchy)
			$this->dtgRegistries->MetaAddColumn('Id');
			$this->dtgRegistries->MetaAddColumn('Name');
			$this->dtgRegistries->MetaAddColumn('Value');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// registry_list.tpl.php as the included HTML template file
	RegistryListForm::Run('RegistryListForm');
?>