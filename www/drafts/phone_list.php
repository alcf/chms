<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Phone class.  It uses the code-generated
	 * PhoneDataGrid control which has meta-methods to help with
	 * easily creating/defining Phone columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both phone_list.php AND
	 * phone_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class PhoneListForm extends QForm {
		// Local instance of the Meta DataGrid to list Phones
		protected $dtgPhones;

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
			$this->dtgPhones = new PhoneDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgPhones->CssClass = 'datagrid';
			$this->dtgPhones->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgPhones->Paginator = new QPaginator($this->dtgPhones);
			$this->dtgPhones->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/phone_edit.php';
			$this->dtgPhones->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for phone's properties, or you
			// can traverse down QQN::phone() to display fields that are down the hierarchy)
			$this->dtgPhones->MetaAddColumn('Id');
			$this->dtgPhones->MetaAddTypeColumn('PhoneTypeId', 'PhoneType');
			$this->dtgPhones->MetaAddColumn(QQN::Phone()->Address);
			$this->dtgPhones->MetaAddColumn(QQN::Phone()->Person);
			$this->dtgPhones->MetaAddColumn('Number');
			$this->dtgPhones->MetaAddColumn('PrimaryFlag');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// phone_list.tpl.php as the included HTML template file
	PhoneListForm::Run('PhoneListForm');
?>