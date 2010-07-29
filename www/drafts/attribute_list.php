<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Attribute class.  It uses the code-generated
	 * AttributeDataGrid control which has meta-methods to help with
	 * easily creating/defining Attribute columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both attribute_list.php AND
	 * attribute_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class AttributeListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list Attributes
		protected $dtgAttributes;

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
			$this->dtgAttributes = new AttributeDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgAttributes->CssClass = 'datagrid';
			$this->dtgAttributes->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgAttributes->Paginator = new QPaginator($this->dtgAttributes);
			$this->dtgAttributes->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/attribute_edit.php';
			$this->dtgAttributes->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for attribute's properties, or you
			// can traverse down QQN::attribute() to display fields that are down the hierarchy)
			$this->dtgAttributes->MetaAddColumn('Id');
			$this->dtgAttributes->MetaAddTypeColumn('AttributeDataTypeId', 'AttributeDataType');
			$this->dtgAttributes->MetaAddColumn('Name');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// attribute_list.tpl.php as the included HTML template file
	AttributeListForm::Run('AttributeListForm');
?>