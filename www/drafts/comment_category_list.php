<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the CommentCategory class.  It uses the code-generated
	 * CommentCategoryDataGrid control which has meta-methods to help with
	 * easily creating/defining CommentCategory columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both comment_category_list.php AND
	 * comment_category_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class CommentCategoryListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list CommentCategories
		protected $dtgCommentCategories;

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
			$this->dtgCommentCategories = new CommentCategoryDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgCommentCategories->CssClass = 'datagrid';
			$this->dtgCommentCategories->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgCommentCategories->Paginator = new QPaginator($this->dtgCommentCategories);
			$this->dtgCommentCategories->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/comment_category_edit.php';
			$this->dtgCommentCategories->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for comment_category's properties, or you
			// can traverse down QQN::comment_category() to display fields that are down the hierarchy)
			$this->dtgCommentCategories->MetaAddColumn('Id');
			$this->dtgCommentCategories->MetaAddColumn('OrderNumber');
			$this->dtgCommentCategories->MetaAddColumn('Name');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// comment_category_list.tpl.php as the included HTML template file
	CommentCategoryListForm::Run('CommentCategoryListForm');
?>