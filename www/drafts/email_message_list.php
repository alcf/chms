<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the EmailMessage class.  It uses the code-generated
	 * EmailMessageDataGrid control which has meta-methods to help with
	 * easily creating/defining EmailMessage columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both email_message_list.php AND
	 * email_message_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class EmailMessageListForm extends QForm {
		// Local instance of the Meta DataGrid to list EmailMessages
		protected $dtgEmailMessages;

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
			$this->dtgEmailMessages = new EmailMessageDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgEmailMessages->CssClass = 'datagrid';
			$this->dtgEmailMessages->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgEmailMessages->Paginator = new QPaginator($this->dtgEmailMessages);
			$this->dtgEmailMessages->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/email_message_edit.php';
			$this->dtgEmailMessages->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for email_message's properties, or you
			// can traverse down QQN::email_message() to display fields that are down the hierarchy)
			$this->dtgEmailMessages->MetaAddColumn('Id');
			$this->dtgEmailMessages->MetaAddTypeColumn('EmailMessageStatusTypeId', 'EmailMessageStatusType');
			$this->dtgEmailMessages->MetaAddColumn('DateReceived');
			$this->dtgEmailMessages->MetaAddColumn('RawMessage');
			$this->dtgEmailMessages->MetaAddColumn('MessageIdentifier');
			$this->dtgEmailMessages->MetaAddColumn('Subject');
			$this->dtgEmailMessages->MetaAddColumn('ResponseHeader');
			$this->dtgEmailMessages->MetaAddColumn('ResponseBody');
			$this->dtgEmailMessages->MetaAddColumn('ErrorMessage');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// email_message_list.tpl.php as the included HTML template file
	EmailMessageListForm::Run('EmailMessageListForm');
?>