<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Group class.  It uses the code-generated
	 * GroupDataGrid control which has meta-methods to help with
	 * easily creating/defining Group columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both group_list.php AND
	 * group_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class GroupListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list Groups
		protected $dtgGroups;

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
			$this->dtgGroups = new GroupDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgGroups->CssClass = 'datagrid';
			$this->dtgGroups->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgGroups->Paginator = new QPaginator($this->dtgGroups);
			$this->dtgGroups->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/group_edit.php';
			$this->dtgGroups->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for group's properties, or you
			// can traverse down QQN::group() to display fields that are down the hierarchy)
			$this->dtgGroups->MetaAddColumn('Id');
			$this->dtgGroups->MetaAddTypeColumn('GroupTypeId', 'GroupType');
			$this->dtgGroups->MetaAddColumn(QQN::Group()->Ministry);
			$this->dtgGroups->MetaAddColumn('Name');
			$this->dtgGroups->MetaAddColumn('Description');
			$this->dtgGroups->MetaAddColumn(QQN::Group()->ParentGroup);
			$this->dtgGroups->MetaAddColumn('HierarchyLevel');
			$this->dtgGroups->MetaAddColumn('HierarchyOrderNumber');
			$this->dtgGroups->MetaAddColumn('ConfidentialFlag');
			$this->dtgGroups->MetaAddTypeColumn('EmailBroadcastTypeId', 'EmailBroadcastType');
			$this->dtgGroups->MetaAddColumn('Token');
			$this->dtgGroups->MetaAddColumn(QQN::Group()->GroupCategory);
			$this->dtgGroups->MetaAddColumn(QQN::Group()->GrowthGroup);
			$this->dtgGroups->MetaAddColumn(QQN::Group()->SmartGroup);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// group_list.tpl.php as the included HTML template file
	GroupListForm::Run('GroupListForm');
?>