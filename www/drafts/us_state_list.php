<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the UsState class.  It uses the code-generated
	 * UsStateDataGrid control which has meta-methods to help with
	 * easily creating/defining UsState columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both us_state_list.php AND
	 * us_state_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class UsStateListForm extends QForm {
		// Local instance of the Meta DataGrid to list UsStates
		protected $dtgUsStates;

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
			$this->dtgUsStates = new UsStateDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgUsStates->CssClass = 'datagrid';
			$this->dtgUsStates->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgUsStates->Paginator = new QPaginator($this->dtgUsStates);
			$this->dtgUsStates->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/us_state_edit.php';
			$this->dtgUsStates->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for us_state's properties, or you
			// can traverse down QQN::us_state() to display fields that are down the hierarchy)
			$this->dtgUsStates->MetaAddColumn('Id');
			$this->dtgUsStates->MetaAddColumn('Name');
			$this->dtgUsStates->MetaAddColumn('Abbreviation');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// us_state_list.tpl.php as the included HTML template file
	UsStateListForm::Run('UsStateListForm');
?>