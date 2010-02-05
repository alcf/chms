<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the OtherContactMethod class.  It uses the code-generated
	 * OtherContactMethodDataGrid control which has meta-methods to help with
	 * easily creating/defining OtherContactMethod columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both other_contact_method_list.php AND
	 * other_contact_method_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class OtherContactMethodListForm extends QForm {
		// Local instance of the Meta DataGrid to list OtherContactMethods
		protected $dtgOtherContactMethods;

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
			$this->dtgOtherContactMethods = new OtherContactMethodDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgOtherContactMethods->CssClass = 'datagrid';
			$this->dtgOtherContactMethods->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgOtherContactMethods->Paginator = new QPaginator($this->dtgOtherContactMethods);
			$this->dtgOtherContactMethods->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/other_contact_method_edit.php';
			$this->dtgOtherContactMethods->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for other_contact_method's properties, or you
			// can traverse down QQN::other_contact_method() to display fields that are down the hierarchy)
			$this->dtgOtherContactMethods->MetaAddColumn('Id');
			$this->dtgOtherContactMethods->MetaAddColumn('Name');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// other_contact_method_list.tpl.php as the included HTML template file
	OtherContactMethodListForm::Run('OtherContactMethodListForm');
?>