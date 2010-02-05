<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the MugShot class.  It uses the code-generated
	 * MugShotDataGrid control which has meta-methods to help with
	 * easily creating/defining MugShot columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both mug_shot_list.php AND
	 * mug_shot_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class MugShotListForm extends QForm {
		// Local instance of the Meta DataGrid to list MugShots
		protected $dtgMugShots;

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
			$this->dtgMugShots = new MugShotDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgMugShots->CssClass = 'datagrid';
			$this->dtgMugShots->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgMugShots->Paginator = new QPaginator($this->dtgMugShots);
			$this->dtgMugShots->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/mug_shot_edit.php';
			$this->dtgMugShots->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for mug_shot's properties, or you
			// can traverse down QQN::mug_shot() to display fields that are down the hierarchy)
			$this->dtgMugShots->MetaAddColumn('Id');
			$this->dtgMugShots->MetaAddColumn(QQN::MugShot()->Person);
			$this->dtgMugShots->MetaAddColumn('DateUploaded');
			$this->dtgMugShots->MetaAddColumn(QQN::MugShot()->PersonAsCurrent);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// mug_shot_list.tpl.php as the included HTML template file
	MugShotListForm::Run('MugShotListForm');
?>