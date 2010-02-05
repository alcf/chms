<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Country class.  It uses the code-generated
	 * CountryDataGrid control which has meta-methods to help with
	 * easily creating/defining Country columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both country_list.php AND
	 * country_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class CountryListForm extends QForm {
		// Local instance of the Meta DataGrid to list Countries
		protected $dtgCountries;

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
			$this->dtgCountries = new CountryDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgCountries->CssClass = 'datagrid';
			$this->dtgCountries->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgCountries->Paginator = new QPaginator($this->dtgCountries);
			$this->dtgCountries->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/country_edit.php';
			$this->dtgCountries->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for country's properties, or you
			// can traverse down QQN::country() to display fields that are down the hierarchy)
			$this->dtgCountries->MetaAddColumn('Id');
			$this->dtgCountries->MetaAddColumn('Name');
			$this->dtgCountries->MetaAddColumn('Abbreviation');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// country_list.tpl.php as the included HTML template file
	CountryListForm::Run('CountryListForm');
?>