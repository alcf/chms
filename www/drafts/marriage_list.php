<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Marriage class.  It uses the code-generated
	 * MarriageDataGrid control which has meta-methods to help with
	 * easily creating/defining Marriage columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both marriage_list.php AND
	 * marriage_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class MarriageListForm extends ChmsForm {
		// Local instance of the Meta DataGrid to list Marriages
		protected $dtgMarriages;

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
			$this->dtgMarriages = new MarriageDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgMarriages->CssClass = 'datagrid';
			$this->dtgMarriages->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgMarriages->Paginator = new QPaginator($this->dtgMarriages);
			$this->dtgMarriages->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/marriage_edit.php';
			$this->dtgMarriages->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for marriage's properties, or you
			// can traverse down QQN::marriage() to display fields that are down the hierarchy)
			$this->dtgMarriages->MetaAddColumn('Id');
			$this->dtgMarriages->MetaAddColumn(QQN::Marriage()->LinkedMarriage);
			$this->dtgMarriages->MetaAddColumn(QQN::Marriage()->Person);
			$this->dtgMarriages->MetaAddColumn(QQN::Marriage()->MarriedToPerson);
			$this->dtgMarriages->MetaAddTypeColumn('MarriageStatusTypeId', 'MarriageStatusType');
			$this->dtgMarriages->MetaAddColumn('DateStart');
			$this->dtgMarriages->MetaAddColumn('DateEnd');
			$this->dtgMarriages->MetaAddColumn(QQN::Marriage()->MarriageAsLinked);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// marriage_list.tpl.php as the included HTML template file
	MarriageListForm::Run('MarriageListForm');
?>