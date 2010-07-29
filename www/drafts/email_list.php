<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Email class.  It uses the code-generated
	 * EmailDataGrid control which has meta-methods to help with
	 * easily creating/defining Email columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both email_list.php AND
	 * email_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class EmailListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list Emails
		protected $dtgEmails;

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
			$this->dtgEmails = new EmailDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgEmails->CssClass = 'datagrid';
			$this->dtgEmails->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgEmails->Paginator = new QPaginator($this->dtgEmails);
			$this->dtgEmails->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/email_edit.php';
			$this->dtgEmails->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for email's properties, or you
			// can traverse down QQN::email() to display fields that are down the hierarchy)
			$this->dtgEmails->MetaAddColumn('Id');
			$this->dtgEmails->MetaAddColumn(QQN::Email()->Person);
			$this->dtgEmails->MetaAddColumn('Address');
			$this->dtgEmails->MetaAddColumn(QQN::Email()->PersonAsPrimary);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// email_list.tpl.php as the included HTML template file
	EmailListForm::Run('EmailListForm');
?>