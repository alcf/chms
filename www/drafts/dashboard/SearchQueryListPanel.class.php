<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the SearchQuery class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of SearchQuery objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this SearchQueryListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 * 
	 */
	class SearchQueryListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list SearchQueries
		public $dtgSearchQueries;

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
			$this->Template = 'SearchQueryListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgSearchQueries = new SearchQueryDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgSearchQueries->CssClass = 'datagrid';
			$this->dtgSearchQueries->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgSearchQueries->Paginator = new QPaginator($this->dtgSearchQueries);
			$this->dtgSearchQueries->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgSearchQueries->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for search_query's properties, or you
			// can traverse down QQN::search_query() to display fields that are down the hierarchy)
			$this->dtgSearchQueries->MetaAddColumn('Id');
			$this->dtgSearchQueries->MetaAddColumn('Description');
			$this->dtgSearchQueries->MetaAddColumn(QQN::SearchQuery()->SmartGroup);

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('SearchQuery');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new SearchQueryEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new SearchQueryEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>