<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the StewardshipContribution class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of StewardshipContribution objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this StewardshipContributionListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 * 
	 */
	class StewardshipContributionListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list StewardshipContributions
		public $dtgStewardshipContributions;

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
			$this->Template = 'StewardshipContributionListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgStewardshipContributions = new StewardshipContributionDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgStewardshipContributions->CssClass = 'datagrid';
			$this->dtgStewardshipContributions->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgStewardshipContributions->Paginator = new QPaginator($this->dtgStewardshipContributions);
			$this->dtgStewardshipContributions->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgStewardshipContributions->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for stewardship_contribution's properties, or you
			// can traverse down QQN::stewardship_contribution() to display fields that are down the hierarchy)
			$this->dtgStewardshipContributions->MetaAddColumn('Id');
			$this->dtgStewardshipContributions->MetaAddColumn(QQN::StewardshipContribution()->Person);
			$this->dtgStewardshipContributions->MetaAddTypeColumn('StewardshipContributionTypeId', 'StewardshipContributionType');
			$this->dtgStewardshipContributions->MetaAddColumn(QQN::StewardshipContribution()->StewardshipBatch);
			$this->dtgStewardshipContributions->MetaAddColumn(QQN::StewardshipContribution()->StewardshipStack);
			$this->dtgStewardshipContributions->MetaAddColumn(QQN::StewardshipContribution()->CheckingAccountLookup);
			$this->dtgStewardshipContributions->MetaAddColumn('TotalAmount');
			$this->dtgStewardshipContributions->MetaAddColumn('DateEntered');
			$this->dtgStewardshipContributions->MetaAddColumn('DateCleared');
			$this->dtgStewardshipContributions->MetaAddColumn('DateCredited');
			$this->dtgStewardshipContributions->MetaAddColumn('CheckNumber');
			$this->dtgStewardshipContributions->MetaAddColumn('AuthorizationNumber');
			$this->dtgStewardshipContributions->MetaAddColumn('AlternateSource');
			$this->dtgStewardshipContributions->MetaAddColumn('Note');
			$this->dtgStewardshipContributions->MetaAddColumn(QQN::StewardshipContribution()->CreatedByLogin);

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('StewardshipContribution');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new StewardshipContributionEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new StewardshipContributionEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>