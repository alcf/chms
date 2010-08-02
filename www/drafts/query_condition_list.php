<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the QueryCondition class.  It uses the code-generated
	 * QueryConditionDataGrid control which has meta-methods to help with
	 * easily creating/defining QueryCondition columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both query_condition_list.php AND
	 * query_condition_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class QueryConditionListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list QueryConditions
		protected $dtgQueryConditions;

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
			$this->dtgQueryConditions = new QueryConditionDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgQueryConditions->CssClass = 'datagrid';
			$this->dtgQueryConditions->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgQueryConditions->Paginator = new QPaginator($this->dtgQueryConditions);
			$this->dtgQueryConditions->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/query_condition_edit.php';
			$this->dtgQueryConditions->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for query_condition's properties, or you
			// can traverse down QQN::query_condition() to display fields that are down the hierarchy)
			$this->dtgQueryConditions->MetaAddColumn('Id');
			$this->dtgQueryConditions->MetaAddColumn(QQN::QueryCondition()->SearchQuery);
			$this->dtgQueryConditions->MetaAddColumn(QQN::QueryCondition()->QueryOperation);
			$this->dtgQueryConditions->MetaAddColumn(QQN::QueryCondition()->QueryNode);
			$this->dtgQueryConditions->MetaAddColumn('Value');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// query_condition_list.tpl.php as the included HTML template file
	QueryConditionListForm::Run('QueryConditionListForm');
?>