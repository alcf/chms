<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the AttributeValue class.  It uses the code-generated
	 * AttributeValueDataGrid control which has meta-methods to help with
	 * easily creating/defining AttributeValue columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both attribute_value_list.php AND
	 * attribute_value_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class AttributeValueListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list AttributeValues
		protected $dtgAttributeValues;

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
			$this->dtgAttributeValues = new AttributeValueDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgAttributeValues->CssClass = 'datagrid';
			$this->dtgAttributeValues->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgAttributeValues->Paginator = new QPaginator($this->dtgAttributeValues);
			$this->dtgAttributeValues->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/attribute_value_edit.php';
			$this->dtgAttributeValues->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for attribute_value's properties, or you
			// can traverse down QQN::attribute_value() to display fields that are down the hierarchy)
			$this->dtgAttributeValues->MetaAddColumn('Id');
			$this->dtgAttributeValues->MetaAddColumn(QQN::AttributeValue()->Attribute);
			$this->dtgAttributeValues->MetaAddColumn(QQN::AttributeValue()->Person);
			$this->dtgAttributeValues->MetaAddColumn('DateValue');
			$this->dtgAttributeValues->MetaAddColumn('DatetimeValue');
			$this->dtgAttributeValues->MetaAddColumn('TextValue');
			$this->dtgAttributeValues->MetaAddColumn('BooleanValue');
			$this->dtgAttributeValues->MetaAddColumn(QQN::AttributeValue()->SingleAttributeOption);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// attribute_value_list.tpl.php as the included HTML template file
	AttributeValueListForm::Run('AttributeValueListForm');
?>