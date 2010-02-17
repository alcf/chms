<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the HeadShot class.  It uses the code-generated
	 * HeadShotDataGrid control which has meta-methods to help with
	 * easily creating/defining HeadShot columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both head_shot_list.php AND
	 * head_shot_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class HeadShotListForm extends QForm {
		// Local instance of the Meta DataGrid to list HeadShots
		protected $dtgHeadShots;

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
			$this->dtgHeadShots = new HeadShotDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgHeadShots->CssClass = 'datagrid';
			$this->dtgHeadShots->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgHeadShots->Paginator = new QPaginator($this->dtgHeadShots);
			$this->dtgHeadShots->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/head_shot_edit.php';
			$this->dtgHeadShots->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for head_shot's properties, or you
			// can traverse down QQN::head_shot() to display fields that are down the hierarchy)
			$this->dtgHeadShots->MetaAddColumn('Id');
			$this->dtgHeadShots->MetaAddColumn(QQN::HeadShot()->Person);
			$this->dtgHeadShots->MetaAddColumn('DateUploaded');
			$this->dtgHeadShots->MetaAddColumn(QQN::HeadShot()->PersonAsCurrentMugShot);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// head_shot_list.tpl.php as the included HTML template file
	HeadShotListForm::Run('HeadShotListForm');
?>