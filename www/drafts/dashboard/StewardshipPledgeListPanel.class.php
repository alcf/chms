<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the StewardshipPledge class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of StewardshipPledge objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this StewardshipPledgeListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 * 
	 */
	class StewardshipPledgeListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list StewardshipPledges
		public $dtgStewardshipPledges;

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
			$this->Template = 'StewardshipPledgeListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgStewardshipPledges = new StewardshipPledgeDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStewardshipPledges->CssClass = 'datagrid';
			$this->dtgStewardshipPledges->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStewardshipPledges->Paginator = new QPaginator($this->dtgStewardshipPledges);
			$this->dtgStewardshipPledges->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgStewardshipPledges->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for stewardship_pledge's properties, or you
			// can traverse down QQN::stewardship_pledge() to display fields that are down the hierarchy)
			$this->dtgStewardshipPledges->MetaAddColumn('Id');
			$this->dtgStewardshipPledges->MetaAddColumn(QQN::StewardshipPledge()->Person);
			$this->dtgStewardshipPledges->MetaAddColumn(QQN::StewardshipPledge()->StewardshipFund);
			$this->dtgStewardshipPledges->MetaAddColumn('DateStarted');
			$this->dtgStewardshipPledges->MetaAddColumn('DateEnded');
			$this->dtgStewardshipPledges->MetaAddColumn('PledgeAmount');
			$this->dtgStewardshipPledges->MetaAddColumn('ContributedAmount');
			$this->dtgStewardshipPledges->MetaAddColumn('RemainingAmount');
			$this->dtgStewardshipPledges->MetaAddColumn('FulfilledFlag');
			$this->dtgStewardshipPledges->MetaAddColumn('ActiveFlag');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('StewardshipPledge');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new StewardshipPledgeEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new StewardshipPledgeEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>