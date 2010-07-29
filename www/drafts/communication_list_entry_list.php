<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the CommunicationListEntry class.  It uses the code-generated
	 * CommunicationListEntryDataGrid control which has meta-methods to help with
	 * easily creating/defining CommunicationListEntry columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both communication_list_entry_list.php AND
	 * communication_list_entry_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class CommunicationListEntryListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list CommunicationListEntries
		protected $dtgCommunicationListEntries;

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
			$this->dtgCommunicationListEntries = new CommunicationListEntryDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgCommunicationListEntries->CssClass = 'datagrid';
			$this->dtgCommunicationListEntries->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgCommunicationListEntries->Paginator = new QPaginator($this->dtgCommunicationListEntries);
			$this->dtgCommunicationListEntries->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/communication_list_entry_edit.php';
			$this->dtgCommunicationListEntries->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for communication_list_entry's properties, or you
			// can traverse down QQN::communication_list_entry() to display fields that are down the hierarchy)
			$this->dtgCommunicationListEntries->MetaAddColumn('Id');
			$this->dtgCommunicationListEntries->MetaAddColumn('FirstName');
			$this->dtgCommunicationListEntries->MetaAddColumn('MiddleName');
			$this->dtgCommunicationListEntries->MetaAddColumn('LastName');
			$this->dtgCommunicationListEntries->MetaAddColumn('Email');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// communication_list_entry_list.tpl.php as the included HTML template file
	CommunicationListEntryListForm::Run('CommunicationListEntryListForm');
?>