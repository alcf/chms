<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Ministry class.  It uses the code-generated
	 * MinistryDataGrid control which has meta-methods to help with
	 * easily creating/defining Ministry columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both ministry_list.php AND
	 * ministry_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class MinistryListForm extends QForm {
		// Local instance of the Meta DataGrid to list Ministries
		protected $dtgMinistries;

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
			$this->dtgMinistries = new MinistryDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgMinistries->CssClass = 'datagrid';
			$this->dtgMinistries->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgMinistries->Paginator = new QPaginator($this->dtgMinistries);
			$this->dtgMinistries->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/ministry_edit.php';
			$this->dtgMinistries->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for ministry's properties, or you
			// can traverse down QQN::ministry() to display fields that are down the hierarchy)
			$this->dtgMinistries->MetaAddColumn('Id');
			$this->dtgMinistries->MetaAddColumn('Token');
			$this->dtgMinistries->MetaAddColumn('Name');
			$this->dtgMinistries->MetaAddColumn(QQN::Ministry()->ParentMinistry);
			$this->dtgMinistries->MetaAddColumn('ActiveFlag');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// ministry_list.tpl.php as the included HTML template file
	MinistryListForm::Run('MinistryListForm');
?>