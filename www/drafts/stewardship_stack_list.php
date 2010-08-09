<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the StewardshipStack class.  It uses the code-generated
	 * StewardshipStackDataGrid control which has meta-methods to help with
	 * easily creating/defining StewardshipStack columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_stack_list.php AND
	 * stewardship_stack_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipStackListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list StewardshipStacks
		protected $dtgStewardshipStacks;

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
			$this->dtgStewardshipStacks = new StewardshipStackDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStewardshipStacks->CssClass = 'datagrid';
			$this->dtgStewardshipStacks->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStewardshipStacks->Paginator = new QPaginator($this->dtgStewardshipStacks);
			$this->dtgStewardshipStacks->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/stewardship_stack_edit.php';
			$this->dtgStewardshipStacks->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for stewardship_stack's properties, or you
			// can traverse down QQN::stewardship_stack() to display fields that are down the hierarchy)
			$this->dtgStewardshipStacks->MetaAddColumn('Id');
			$this->dtgStewardshipStacks->MetaAddColumn(QQN::StewardshipStack()->StewardshipBatch);
			$this->dtgStewardshipStacks->MetaAddColumn('StackNumber');
			$this->dtgStewardshipStacks->MetaAddColumn('ReportedTotalAmount');
			$this->dtgStewardshipStacks->MetaAddColumn('ActualTotalAmount');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// stewardship_stack_list.tpl.php as the included HTML template file
	StewardshipStackListForm::Run('StewardshipStackListForm');
?>