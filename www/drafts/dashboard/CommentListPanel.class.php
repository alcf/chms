<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the Comment class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of Comment objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this CommentListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 * 
	 */
	class CommentListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list Comments
		public $dtgComments;

		// Other public QControls in this panel
		public $btnCreateNew;
		public $pxyEdit;

		// Callback Method Names
		protected $strSetEditPanelMethod;
		protected $strCloseEditPanelMethod;
		
		public function __construct($objParentObject, $strSetEditPanelMethod, $strCloseEditPanelMethod, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Record Method Callbacks
			$this->strSetEditPanelMethod = $strSetEditPanelMethod;
			$this->strCloseEditPanelMethod = $strCloseEditPanelMethod;

			// Setup the Template
			$this->Template = 'CommentListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgComments = new CommentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgComments->CssClass = 'datagrid';
			$this->dtgComments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgComments->Paginator = new QPaginator($this->dtgComments);
			$this->dtgComments->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgComments->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for comment's properties, or you
			// can traverse down QQN::comment() to display fields that are down the hierarchy)
			$this->dtgComments->MetaAddColumn('Id');
			$this->dtgComments->MetaAddColumn(QQN::Comment()->Person);
			$this->dtgComments->MetaAddColumn(QQN::Comment()->PostedByLogin);
			$this->dtgComments->MetaAddTypeColumn('CommentPrivacyTypeId', 'CommentPrivacyType');
			$this->dtgComments->MetaAddColumn(QQN::Comment()->CommentCategory);
			$this->dtgComments->MetaAddColumn('Comment');
			$this->dtgComments->MetaAddColumn('DatePosted');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('Comment');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new CommentEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new CommentEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>