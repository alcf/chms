<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the GroupCategory class.  It uses the code-generated
	 * GroupCategoryDataGrid control which has meta-methods to help with
	 * easily creating/defining GroupCategory columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both group_category_list.php AND
	 * group_category_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class GroupCategoryListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list GroupCategories
		protected $dtgGroupCategories;

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
			$this->dtgGroupCategories = new GroupCategoryDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgGroupCategories->CssClass = 'datagrid';
			$this->dtgGroupCategories->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgGroupCategories->Paginator = new QPaginator($this->dtgGroupCategories);
			$this->dtgGroupCategories->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/group_category_edit.php';
			$this->dtgGroupCategories->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for group_category's properties, or you
			// can traverse down QQN::group_category() to display fields that are down the hierarchy)
			$this->dtgGroupCategories->MetaAddColumn(QQN::GroupCategory()->Group);
			$this->dtgGroupCategories->MetaAddColumn('DateRefreshed');
			$this->dtgGroupCategories->MetaAddColumn('ProcessTimeMs');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// group_category_list.tpl.php as the included HTML template file
	GroupCategoryListForm::Run('GroupCategoryListForm');
?>