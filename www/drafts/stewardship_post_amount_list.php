<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the StewardshipPostAmount class.  It uses the code-generated
	 * StewardshipPostAmountDataGrid control which has meta-methods to help with
	 * easily creating/defining StewardshipPostAmount columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_post_amount_list.php AND
	 * stewardship_post_amount_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipPostAmountListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list StewardshipPostAmounts
		protected $dtgStewardshipPostAmounts;

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
			$this->dtgStewardshipPostAmounts = new StewardshipPostAmountDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStewardshipPostAmounts->CssClass = 'datagrid';
			$this->dtgStewardshipPostAmounts->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStewardshipPostAmounts->Paginator = new QPaginator($this->dtgStewardshipPostAmounts);
			$this->dtgStewardshipPostAmounts->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/stewardship_post_amount_edit.php';
			$this->dtgStewardshipPostAmounts->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for stewardship_post_amount's properties, or you
			// can traverse down QQN::stewardship_post_amount() to display fields that are down the hierarchy)
			$this->dtgStewardshipPostAmounts->MetaAddColumn('Id');
			$this->dtgStewardshipPostAmounts->MetaAddColumn(QQN::StewardshipPostAmount()->StewardshipPost);
			$this->dtgStewardshipPostAmounts->MetaAddColumn(QQN::StewardshipPostAmount()->StewardshipFund);
			$this->dtgStewardshipPostAmounts->MetaAddColumn('Amount');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// stewardship_post_amount_list.tpl.php as the included HTML template file
	StewardshipPostAmountListForm::Run('StewardshipPostAmountListForm');
?>