<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the StewardshipContribution class.  It uses the code-generated
	 * StewardshipContributionDataGrid control which has meta-methods to help with
	 * easily creating/defining StewardshipContribution columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both stewardship_contribution_list.php AND
	 * stewardship_contribution_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class StewardshipContributionListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list StewardshipContributions
		protected $dtgStewardshipContributions;

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
			$this->dtgStewardshipContributions = new StewardshipContributionDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStewardshipContributions->CssClass = 'datagrid';
			$this->dtgStewardshipContributions->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStewardshipContributions->Paginator = new QPaginator($this->dtgStewardshipContributions);
			$this->dtgStewardshipContributions->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/stewardship_contribution_edit.php';
			$this->dtgStewardshipContributions->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for stewardship_contribution's properties, or you
			// can traverse down QQN::stewardship_contribution() to display fields that are down the hierarchy)
			$this->dtgStewardshipContributions->MetaAddColumn('Id');
			$this->dtgStewardshipContributions->MetaAddColumn(QQN::StewardshipContribution()->Person);
			$this->dtgStewardshipContributions->MetaAddTypeColumn('StewardshipContributionType', 'StewardshipContributionType');
			$this->dtgStewardshipContributions->MetaAddColumn(QQN::StewardshipContribution()->StewardshipBatch);
			$this->dtgStewardshipContributions->MetaAddColumn(QQN::StewardshipContribution()->StewardshipStack);
			$this->dtgStewardshipContributions->MetaAddColumn(QQN::StewardshipContribution()->CheckingAccountLookup);
			$this->dtgStewardshipContributions->MetaAddColumn('TotalAmount');
			$this->dtgStewardshipContributions->MetaAddColumn('DateEntered');
			$this->dtgStewardshipContributions->MetaAddColumn('DateCleared');
			$this->dtgStewardshipContributions->MetaAddColumn('CheckNumber');
			$this->dtgStewardshipContributions->MetaAddColumn('AuthorizationNumber');
			$this->dtgStewardshipContributions->MetaAddColumn('AlternateSource');
			$this->dtgStewardshipContributions->MetaAddColumn('Note');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// stewardship_contribution_list.tpl.php as the included HTML template file
	StewardshipContributionListForm::Run('StewardshipContributionListForm');
?>