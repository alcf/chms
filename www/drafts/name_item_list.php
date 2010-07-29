<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the NameItem class.  It uses the code-generated
	 * NameItemDataGrid control which has meta-methods to help with
	 * easily creating/defining NameItem columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both name_item_list.php AND
	 * name_item_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class NameItemListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list NameItems
		protected $dtgNameItems;

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
			$this->dtgNameItems = new NameItemDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgNameItems->CssClass = 'datagrid';
			$this->dtgNameItems->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgNameItems->Paginator = new QPaginator($this->dtgNameItems);
			$this->dtgNameItems->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/name_item_edit.php';
			$this->dtgNameItems->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for name_item's properties, or you
			// can traverse down QQN::name_item() to display fields that are down the hierarchy)
			$this->dtgNameItems->MetaAddColumn('Id');
			$this->dtgNameItems->MetaAddColumn('Name');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// name_item_list.tpl.php as the included HTML template file
	NameItemListForm::Run('NameItemListForm');
?>