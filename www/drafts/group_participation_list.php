<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the GroupParticipation class.  It uses the code-generated
	 * GroupParticipationDataGrid control which has meta-methods to help with
	 * easily creating/defining GroupParticipation columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both group_participation_list.php AND
	 * group_participation_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class GroupParticipationListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list GroupParticipations
		protected $dtgGroupParticipations;

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
			$this->dtgGroupParticipations = new GroupParticipationDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgGroupParticipations->CssClass = 'datagrid';
			$this->dtgGroupParticipations->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgGroupParticipations->Paginator = new QPaginator($this->dtgGroupParticipations);
			$this->dtgGroupParticipations->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/group_participation_edit.php';
			$this->dtgGroupParticipations->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for group_participation's properties, or you
			// can traverse down QQN::group_participation() to display fields that are down the hierarchy)
			$this->dtgGroupParticipations->MetaAddColumn('Id');
			$this->dtgGroupParticipations->MetaAddColumn(QQN::GroupParticipation()->Person);
			$this->dtgGroupParticipations->MetaAddColumn(QQN::GroupParticipation()->Group);
			$this->dtgGroupParticipations->MetaAddColumn(QQN::GroupParticipation()->GroupRole);
			$this->dtgGroupParticipations->MetaAddColumn('DateStart');
			$this->dtgGroupParticipations->MetaAddColumn('DateEnd');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// group_participation_list.tpl.php as the included HTML template file
	GroupParticipationListForm::Run('GroupParticipationListForm');
?>