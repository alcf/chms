<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the QueryNode class.  It uses the code-generated
	 * QueryNodeDataGrid control which has meta-methods to help with
	 * easily creating/defining QueryNode columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both query_node_list.php AND
	 * query_node_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class QueryNodeListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list QueryNodes
		protected $dtgQueryNodes;

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
			$this->dtgQueryNodes = new QueryNodeDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgQueryNodes->CssClass = 'datagrid';
			$this->dtgQueryNodes->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgQueryNodes->Paginator = new QPaginator($this->dtgQueryNodes);
			$this->dtgQueryNodes->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/query_node_edit.php';
			$this->dtgQueryNodes->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for query_node's properties, or you
			// can traverse down QQN::query_node() to display fields that are down the hierarchy)
			$this->dtgQueryNodes->MetaAddColumn('Id');
			$this->dtgQueryNodes->MetaAddColumn('Name');
			$this->dtgQueryNodes->MetaAddTypeColumn('QueryNodeTypeId', 'QueryNodeType');
			$this->dtgQueryNodes->MetaAddColumn('QcodoQueryNode');
			$this->dtgQueryNodes->MetaAddTypeColumn('QueryDataTypeId', 'QueryDataType');
			$this->dtgQueryNodes->MetaAddColumn('NodeDetail');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// query_node_list.tpl.php as the included HTML template file
	QueryNodeListForm::Run('QueryNodeListForm');
?>