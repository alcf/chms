<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the StewardshipFund class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of StewardshipFund objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this StewardshipFundListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 * 
	 */
	class StewardshipFundListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list StewardshipFunds
		public $dtgStewardshipFunds;

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
			$this->Template = 'StewardshipFundListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgStewardshipFunds = new StewardshipFundDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStewardshipFunds->CssClass = 'datagrid';
			$this->dtgStewardshipFunds->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStewardshipFunds->Paginator = new QPaginator($this->dtgStewardshipFunds);
			$this->dtgStewardshipFunds->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgStewardshipFunds->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for stewardship_fund's properties, or you
			// can traverse down QQN::stewardship_fund() to display fields that are down the hierarchy)
			$this->dtgStewardshipFunds->MetaAddColumn('Id');
			$this->dtgStewardshipFunds->MetaAddColumn(QQN::StewardshipFund()->Ministry);
			$this->dtgStewardshipFunds->MetaAddColumn('Name');
			$this->dtgStewardshipFunds->MetaAddColumn('AccountNumber');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('StewardshipFund');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new StewardshipFundEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new StewardshipFundEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>