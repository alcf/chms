<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the AttributeOption class.  It uses the code-generated
	 * AttributeOptionDataGrid control which has meta-methods to help with
	 * easily creating/defining AttributeOption columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both attribute_option_list.php AND
	 * attribute_option_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class AttributeOptionListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list AttributeOptions
		protected $dtgAttributeOptions;

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
			$this->dtgAttributeOptions = new AttributeOptionDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgAttributeOptions->CssClass = 'datagrid';
			$this->dtgAttributeOptions->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgAttributeOptions->Paginator = new QPaginator($this->dtgAttributeOptions);
			$this->dtgAttributeOptions->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/attribute_option_edit.php';
			$this->dtgAttributeOptions->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for attribute_option's properties, or you
			// can traverse down QQN::attribute_option() to display fields that are down the hierarchy)
			$this->dtgAttributeOptions->MetaAddColumn('Id');
			$this->dtgAttributeOptions->MetaAddColumn(QQN::AttributeOption()->Attribute);
			$this->dtgAttributeOptions->MetaAddColumn('Name');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// attribute_option_list.tpl.php as the included HTML template file
	AttributeOptionListForm::Run('AttributeOptionListForm');
?>