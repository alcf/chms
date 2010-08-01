<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the SearchQuery class.  It uses the code-generated
	 * SearchQueryDataGrid control which has meta-methods to help with
	 * easily creating/defining SearchQuery columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both search_query_list.php AND
	 * search_query_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class SearchQueryListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list SearchQueries
		protected $dtgSearchQueries;

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
			$this->dtgSearchQueries = new SearchQueryDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgSearchQueries->CssClass = 'datagrid';
			$this->dtgSearchQueries->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgSearchQueries->Paginator = new QPaginator($this->dtgSearchQueries);
			$this->dtgSearchQueries->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/search_query_edit.php';
			$this->dtgSearchQueries->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for search_query's properties, or you
			// can traverse down QQN::search_query() to display fields that are down the hierarchy)
			$this->dtgSearchQueries->MetaAddColumn('Id');
			$this->dtgSearchQueries->MetaAddColumn('Description');
			$this->dtgSearchQueries->MetaAddColumn(QQN::SearchQuery()->SmartGroup);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// search_query_list.tpl.php as the included HTML template file
	SearchQueryListForm::Run('SearchQueryListForm');
?>