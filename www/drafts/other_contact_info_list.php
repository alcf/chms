<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the OtherContactInfo class.  It uses the code-generated
	 * OtherContactInfoDataGrid control which has meta-methods to help with
	 * easily creating/defining OtherContactInfo columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both other_contact_info_list.php AND
	 * other_contact_info_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class OtherContactInfoListForm extends QForm {
		// Local instance of the Meta DataGrid to list OtherContactInfos
		protected $dtgOtherContactInfos;

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
			$this->dtgOtherContactInfos = new OtherContactInfoDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgOtherContactInfos->CssClass = 'datagrid';
			$this->dtgOtherContactInfos->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgOtherContactInfos->Paginator = new QPaginator($this->dtgOtherContactInfos);
			$this->dtgOtherContactInfos->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/other_contact_info_edit.php';
			$this->dtgOtherContactInfos->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for other_contact_info's properties, or you
			// can traverse down QQN::other_contact_info() to display fields that are down the hierarchy)
			$this->dtgOtherContactInfos->MetaAddColumn('Id');
			$this->dtgOtherContactInfos->MetaAddColumn(QQN::OtherContactInfo()->Person);
			$this->dtgOtherContactInfos->MetaAddColumn(QQN::OtherContactInfo()->OtherContactMethod);
			$this->dtgOtherContactInfos->MetaAddColumn('Value');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// other_contact_info_list.tpl.php as the included HTML template file
	OtherContactInfoListForm::Run('OtherContactInfoListForm');
?>