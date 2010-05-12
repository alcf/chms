<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the GrowthGroup class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of GrowthGroup objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this GrowthGroupListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 * 
	 */
	class GrowthGroupListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list GrowthGroups
		public $dtgGrowthGroups;

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
			$this->Template = 'GrowthGroupListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgGrowthGroups = new GrowthGroupDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgGrowthGroups->CssClass = 'datagrid';
			$this->dtgGrowthGroups->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgGrowthGroups->Paginator = new QPaginator($this->dtgGrowthGroups);
			$this->dtgGrowthGroups->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgGrowthGroups->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for growth_group's properties, or you
			// can traverse down QQN::growth_group() to display fields that are down the hierarchy)
			$this->dtgGrowthGroups->MetaAddColumn(QQN::GrowthGroup()->Group);
			$this->dtgGrowthGroups->MetaAddColumn(QQN::GrowthGroup()->GrowthGroupLocation);
			$this->dtgGrowthGroups->MetaAddTypeColumn('GrowthGroupDayTypeId', 'GrowthGroupDayType');
			$this->dtgGrowthGroups->MetaAddColumn('MeetingBitmap');
			$this->dtgGrowthGroups->MetaAddColumn('StartTime');
			$this->dtgGrowthGroups->MetaAddColumn('EndTime');
			$this->dtgGrowthGroups->MetaAddColumn('Address1');
			$this->dtgGrowthGroups->MetaAddColumn('Address2');
			$this->dtgGrowthGroups->MetaAddColumn('CrossStreet1');
			$this->dtgGrowthGroups->MetaAddColumn('CrossStreet2');
			$this->dtgGrowthGroups->MetaAddColumn('ZipCode');
			$this->dtgGrowthGroups->MetaAddColumn('Longitude');
			$this->dtgGrowthGroups->MetaAddColumn('Latitude');
			$this->dtgGrowthGroups->MetaAddColumn('Accuracy');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('GrowthGroup');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new GrowthGroupEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new GrowthGroupEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>