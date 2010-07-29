<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the EmailMessageRoute class.  It uses the code-generated
	 * EmailMessageRouteDataGrid control which has meta-methods to help with
	 * easily creating/defining EmailMessageRoute columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both email_message_route_list.php AND
	 * email_message_route_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class EmailMessageRouteListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list EmailMessageRoutes
		protected $dtgEmailMessageRoutes;

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
			$this->dtgEmailMessageRoutes = new EmailMessageRouteDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgEmailMessageRoutes->CssClass = 'datagrid';
			$this->dtgEmailMessageRoutes->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgEmailMessageRoutes->Paginator = new QPaginator($this->dtgEmailMessageRoutes);
			$this->dtgEmailMessageRoutes->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/email_message_route_edit.php';
			$this->dtgEmailMessageRoutes->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for email_message_route's properties, or you
			// can traverse down QQN::email_message_route() to display fields that are down the hierarchy)
			$this->dtgEmailMessageRoutes->MetaAddColumn('Id');
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->EmailMessage);
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->Group);
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->CommunicationList);
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->Login);
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->CommunicationListEntry);
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->Person);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// email_message_route_list.tpl.php as the included HTML template file
	EmailMessageRouteListForm::Run('EmailMessageRouteListForm');
?>