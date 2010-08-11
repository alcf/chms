<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the StewardshipBatch class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of StewardshipBatch objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this StewardshipBatchListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 * 
	 */
	class StewardshipBatchListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list StewardshipBatches
		public $dtgStewardshipBatches;

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
			$this->Template = 'StewardshipBatchListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgStewardshipBatches = new StewardshipBatchDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStewardshipBatches->CssClass = 'datagrid';
			$this->dtgStewardshipBatches->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStewardshipBatches->Paginator = new QPaginator($this->dtgStewardshipBatches);
			$this->dtgStewardshipBatches->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgStewardshipBatches->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for stewardship_batch's properties, or you
			// can traverse down QQN::stewardship_batch() to display fields that are down the hierarchy)
			$this->dtgStewardshipBatches->MetaAddColumn('Id');
			$this->dtgStewardshipBatches->MetaAddTypeColumn('StewardshipBatchStatusTypeId', 'StewardshipBatchStatusType');
			$this->dtgStewardshipBatches->MetaAddColumn('DateEntered');
			$this->dtgStewardshipBatches->MetaAddColumn('BatchLabel');
			$this->dtgStewardshipBatches->MetaAddColumn('Description');
			$this->dtgStewardshipBatches->MetaAddColumn('ItemCount');
			$this->dtgStewardshipBatches->MetaAddColumn('ReportedTotalAmount');
			$this->dtgStewardshipBatches->MetaAddColumn('ActualTotalAmount');
			$this->dtgStewardshipBatches->MetaAddColumn('PostedTotalAmount');
			$this->dtgStewardshipBatches->MetaAddColumn(QQN::StewardshipBatch()->CreatedByLogin);

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('StewardshipBatch');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new StewardshipBatchEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new StewardshipBatchEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>