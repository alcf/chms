<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the QueryOperation class.  It uses the code-generated
	 * QueryOperationDataGrid control which has meta-methods to help with
	 * easily creating/defining QueryOperation columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both query_operation_list.php AND
	 * query_operation_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class QueryOperationListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list QueryOperations
		protected $dtgQueryOperations;

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
			$this->dtgQueryOperations = new QueryOperationDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgQueryOperations->CssClass = 'datagrid';
			$this->dtgQueryOperations->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgQueryOperations->Paginator = new QPaginator($this->dtgQueryOperations);
			$this->dtgQueryOperations->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/query_operation_edit.php';
			$this->dtgQueryOperations->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for query_operation's properties, or you
			// can traverse down QQN::query_operation() to display fields that are down the hierarchy)
			$this->dtgQueryOperations->MetaAddColumn('Id');
			$this->dtgQueryOperations->MetaAddColumn('QueryDataTypeBitmap');
			$this->dtgQueryOperations->MetaAddColumn('Name');
			$this->dtgQueryOperations->MetaAddColumn('QqFactoryName');
			$this->dtgQueryOperations->MetaAddColumn('ArgumentFlag');
			$this->dtgQueryOperations->MetaAddColumn('ArgumentPrepend');
			$this->dtgQueryOperations->MetaAddColumn('ArgumentPostpend');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// query_operation_list.tpl.php as the included HTML template file
	QueryOperationListForm::Run('QueryOperationListForm');
?>