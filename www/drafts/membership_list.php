<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Membership class.  It uses the code-generated
	 * MembershipDataGrid control which has meta-methods to help with
	 * easily creating/defining Membership columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both membership_list.php AND
	 * membership_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class MembershipListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list Memberships
		protected $dtgMemberships;

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
			$this->dtgMemberships = new MembershipDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgMemberships->CssClass = 'datagrid';
			$this->dtgMemberships->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgMemberships->Paginator = new QPaginator($this->dtgMemberships);
			$this->dtgMemberships->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/membership_edit.php';
			$this->dtgMemberships->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for membership's properties, or you
			// can traverse down QQN::membership() to display fields that are down the hierarchy)
			$this->dtgMemberships->MetaAddColumn('Id');
			$this->dtgMemberships->MetaAddColumn(QQN::Membership()->Person);
			$this->dtgMemberships->MetaAddColumn('DateStart');
			$this->dtgMemberships->MetaAddColumn('DateEnd');
			$this->dtgMemberships->MetaAddColumn('TerminationReason');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// membership_list.tpl.php as the included HTML template file
	MembershipListForm::Run('MembershipListForm');
?>