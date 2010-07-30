<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the SmartGroup class.  It uses the code-generated
	 * SmartGroupDataGrid control which has meta-methods to help with
	 * easily creating/defining SmartGroup columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both smart_group_list.php AND
	 * smart_group_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class SmartGroupListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list SmartGroups
		protected $dtgSmartGroups;

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
			$this->dtgSmartGroups = new SmartGroupDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgSmartGroups->CssClass = 'datagrid';
			$this->dtgSmartGroups->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgSmartGroups->Paginator = new QPaginator($this->dtgSmartGroups);
			$this->dtgSmartGroups->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/smart_group_edit.php';
			$this->dtgSmartGroups->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for smart_group's properties, or you
			// can traverse down QQN::smart_group() to display fields that are down the hierarchy)
			$this->dtgSmartGroups->MetaAddColumn(QQN::SmartGroup()->Group);
			$this->dtgSmartGroups->MetaAddColumn('Query');
			$this->dtgSmartGroups->MetaAddColumn('DateRefreshed');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// smart_group_list.tpl.php as the included HTML template file
	SmartGroupListForm::Run('SmartGroupListForm');
?>