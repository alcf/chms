<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the EmailOutgoingQueue class.  It uses the code-generated
	 * EmailOutgoingQueueDataGrid control which has meta-methods to help with
	 * easily creating/defining EmailOutgoingQueue columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both email_outgoing_queue_list.php AND
	 * email_outgoing_queue_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class EmailOutgoingQueueListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list EmailOutgoingQueues
		protected $dtgEmailOutgoingQueues;

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
			$this->dtgEmailOutgoingQueues = new EmailOutgoingQueueDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgEmailOutgoingQueues->CssClass = 'datagrid';
			$this->dtgEmailOutgoingQueues->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgEmailOutgoingQueues->Paginator = new QPaginator($this->dtgEmailOutgoingQueues);
			$this->dtgEmailOutgoingQueues->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/email_outgoing_queue_edit.php';
			$this->dtgEmailOutgoingQueues->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for email_outgoing_queue's properties, or you
			// can traverse down QQN::email_outgoing_queue() to display fields that are down the hierarchy)
			$this->dtgEmailOutgoingQueues->MetaAddColumn('Id');
			$this->dtgEmailOutgoingQueues->MetaAddColumn(QQN::EmailOutgoingQueue()->EmailMessage);
			$this->dtgEmailOutgoingQueues->MetaAddColumn('SendToEmailAddress');
			$this->dtgEmailOutgoingQueues->MetaAddColumn('ErrorFlag');
			$this->dtgEmailOutgoingQueues->MetaAddColumn('Token');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// email_outgoing_queue_list.tpl.php as the included HTML template file
	EmailOutgoingQueueListForm::Run('EmailOutgoingQueueListForm');
?>