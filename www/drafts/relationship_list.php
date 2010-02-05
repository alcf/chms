<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Relationship class.  It uses the code-generated
	 * RelationshipDataGrid control which has meta-methods to help with
	 * easily creating/defining Relationship columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both relationship_list.php AND
	 * relationship_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class RelationshipListForm extends QForm {
		// Local instance of the Meta DataGrid to list Relationships
		protected $dtgRelationships;

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
			$this->dtgRelationships = new RelationshipDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgRelationships->CssClass = 'datagrid';
			$this->dtgRelationships->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgRelationships->Paginator = new QPaginator($this->dtgRelationships);
			$this->dtgRelationships->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/relationship_edit.php';
			$this->dtgRelationships->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for relationship's properties, or you
			// can traverse down QQN::relationship() to display fields that are down the hierarchy)
			$this->dtgRelationships->MetaAddColumn('Id');
			$this->dtgRelationships->MetaAddColumn(QQN::Relationship()->Person);
			$this->dtgRelationships->MetaAddColumn(QQN::Relationship()->RelatedToPerson);
			$this->dtgRelationships->MetaAddTypeColumn('RelationshipTypeId', 'RelationshipType');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// relationship_list.tpl.php as the included HTML template file
	RelationshipListForm::Run('RelationshipListForm');
?>