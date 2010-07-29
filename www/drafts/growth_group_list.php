<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the GrowthGroup class.  It uses the code-generated
	 * GrowthGroupDataGrid control which has meta-methods to help with
	 * easily creating/defining GrowthGroup columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both growth_group_list.php AND
	 * growth_group_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class GrowthGroupListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list GrowthGroups
		protected $dtgGrowthGroups;

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
			$this->dtgGrowthGroups = new GrowthGroupDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgGrowthGroups->CssClass = 'datagrid';
			$this->dtgGrowthGroups->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgGrowthGroups->Paginator = new QPaginator($this->dtgGrowthGroups);
			$this->dtgGrowthGroups->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/growth_group_edit.php';
			$this->dtgGrowthGroups->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for growth_group's properties, or you
			// can traverse down QQN::growth_group() to display fields that are down the hierarchy)
			$this->dtgGrowthGroups->MetaAddColumn(QQN::GrowthGroup()->Group);
			$this->dtgGrowthGroups->MetaAddColumn(QQN::GrowthGroup()->GrowthGroupLocation);
			$this->dtgGrowthGroups->MetaAddTypeColumn('GrowthGroupDayTypeId', 'GrowthGroupDayType');
			$this->dtgGrowthGroups->MetaAddColumn('MeetingBitmap');
			$this->dtgGrowthGroups->MetaAddColumn('StartTime');
			$this->dtgGrowthGroups->MetaAddColumn('EndTime');
			$this->dtgGrowthGroups->MetaAddColumn('Address1');
			$this->dtgGrowthGroups->MetaAddColumn('Address2');
			$this->dtgGrowthGroups->MetaAddColumn('CrossStreet1');
			$this->dtgGrowthGroups->MetaAddColumn('CrossStreet2');
			$this->dtgGrowthGroups->MetaAddColumn('ZipCode');
			$this->dtgGrowthGroups->MetaAddColumn('Longitude');
			$this->dtgGrowthGroups->MetaAddColumn('Latitude');
			$this->dtgGrowthGroups->MetaAddColumn('Accuracy');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// growth_group_list.tpl.php as the included HTML template file
	GrowthGroupListForm::Run('GrowthGroupListForm');
?>