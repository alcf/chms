<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the StewardshipBatch class.  It uses the code-generated
	 * StewardshipBatchDataGrid control which has meta-methods to help with
	 * easily creating/defining StewardshipBatch columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_batch_list.php AND
	 * stewardship_batch_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipBatchListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list StewardshipBatches
		protected $dtgStewardshipBatches;

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
			$this->dtgStewardshipBatches = new StewardshipBatchDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStewardshipBatches->CssClass = 'datagrid';
			$this->dtgStewardshipBatches->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStewardshipBatches->Paginator = new QPaginator($this->dtgStewardshipBatches);
			$this->dtgStewardshipBatches->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/stewardship_batch_edit.php';
			$this->dtgStewardshipBatches->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for stewardship_batch's properties, or you
			// can traverse down QQN::stewardship_batch() to display fields that are down the hierarchy)
			$this->dtgStewardshipBatches->MetaAddColumn('Id');
			$this->dtgStewardshipBatches->MetaAddColumn('DateEntered');
			$this->dtgStewardshipBatches->MetaAddColumn('BatchNumber');
			$this->dtgStewardshipBatches->MetaAddColumn(QQN::StewardshipBatch()->StewardshipFund);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// stewardship_batch_list.tpl.php as the included HTML template file
	StewardshipBatchListForm::Run('StewardshipBatchListForm');
?>