<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the StewardshipPledge class.  It uses the code-generated
	 * StewardshipPledgeDataGrid control which has meta-methods to help with
	 * easily creating/defining StewardshipPledge columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_pledge_list.php AND
	 * stewardship_pledge_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipPledgeListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list StewardshipPledges
		protected $dtgStewardshipPledges;

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
			$this->dtgStewardshipPledges = new StewardshipPledgeDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStewardshipPledges->CssClass = 'datagrid';
			$this->dtgStewardshipPledges->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStewardshipPledges->Paginator = new QPaginator($this->dtgStewardshipPledges);
			$this->dtgStewardshipPledges->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/stewardship_pledge_edit.php';
			$this->dtgStewardshipPledges->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for stewardship_pledge's properties, or you
			// can traverse down QQN::stewardship_pledge() to display fields that are down the hierarchy)
			$this->dtgStewardshipPledges->MetaAddColumn('Id');
			$this->dtgStewardshipPledges->MetaAddColumn(QQN::StewardshipPledge()->Person);
			$this->dtgStewardshipPledges->MetaAddColumn(QQN::StewardshipPledge()->StewardshipFund);
			$this->dtgStewardshipPledges->MetaAddColumn('DateStarted');
			$this->dtgStewardshipPledges->MetaAddColumn('DateEnded');
			$this->dtgStewardshipPledges->MetaAddColumn('PledgeAmount');
			$this->dtgStewardshipPledges->MetaAddColumn('ContributedAmount');
			$this->dtgStewardshipPledges->MetaAddColumn('RemainingAmount');
			$this->dtgStewardshipPledges->MetaAddColumn('FulfilledFlag');
			$this->dtgStewardshipPledges->MetaAddColumn('ActiveFlag');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// stewardship_pledge_list.tpl.php as the included HTML template file
	StewardshipPledgeListForm::Run('StewardshipPledgeListForm');
?>