<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the StewardshipPostLineItem class.  It uses the code-generated
	 * StewardshipPostLineItemDataGrid control which has meta-methods to help with
	 * easily creating/defining StewardshipPostLineItem columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_post_line_item_list.php AND
	 * stewardship_post_line_item_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipPostLineItemListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list StewardshipPostLineItems
		protected $dtgStewardshipPostLineItems;

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
			$this->dtgStewardshipPostLineItems = new StewardshipPostLineItemDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStewardshipPostLineItems->CssClass = 'datagrid';
			$this->dtgStewardshipPostLineItems->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStewardshipPostLineItems->Paginator = new QPaginator($this->dtgStewardshipPostLineItems);
			$this->dtgStewardshipPostLineItems->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/stewardship_post_line_item_edit.php';
			$this->dtgStewardshipPostLineItems->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for stewardship_post_line_item's properties, or you
			// can traverse down QQN::stewardship_post_line_item() to display fields that are down the hierarchy)
			$this->dtgStewardshipPostLineItems->MetaAddColumn('Id');
			$this->dtgStewardshipPostLineItems->MetaAddColumn(QQN::StewardshipPostLineItem()->StewardshipPost);
			$this->dtgStewardshipPostLineItems->MetaAddColumn(QQN::StewardshipPostLineItem()->StewardshipContribution);
			$this->dtgStewardshipPostLineItems->MetaAddColumn(QQN::StewardshipPostLineItem()->Person);
			$this->dtgStewardshipPostLineItems->MetaAddColumn(QQN::StewardshipPostLineItem()->StewardshipFund);
			$this->dtgStewardshipPostLineItems->MetaAddColumn('Description');
			$this->dtgStewardshipPostLineItems->MetaAddColumn('Amount');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// stewardship_post_line_item_list.tpl.php as the included HTML template file
	StewardshipPostLineItemListForm::Run('StewardshipPostLineItemListForm');
?>