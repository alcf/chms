<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the Group class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of Group objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this GroupListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 * 
	 */
	class GroupListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list Groups
		public $dtgGroups;

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
			$this->Template = 'GroupListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgGroups = new GroupDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgGroups->CssClass = 'datagrid';
			$this->dtgGroups->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgGroups->Paginator = new QPaginator($this->dtgGroups);
			$this->dtgGroups->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgGroups->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for group's properties, or you
			// can traverse down QQN::group() to display fields that are down the hierarchy)
			$this->dtgGroups->MetaAddColumn('Id');
			$this->dtgGroups->MetaAddTypeColumn('GroupTypeId', 'GroupType');
			$this->dtgGroups->MetaAddColumn(QQN::Group()->Ministry);
			$this->dtgGroups->MetaAddColumn('Name');
			$this->dtgGroups->MetaAddColumn('Description');
			$this->dtgGroups->MetaAddColumn(QQN::Group()->ParentGroup);
			$this->dtgGroups->MetaAddColumn('HierarchyLevel');
			$this->dtgGroups->MetaAddColumn('HierarchyOrderNumber');
			$this->dtgGroups->MetaAddColumn('ConfidentialFlag');
			$this->dtgGroups->MetaAddTypeColumn('EmailBroadcastTypeId', 'EmailBroadcastType');
			$this->dtgGroups->MetaAddColumn('Token');
			$this->dtgGroups->MetaAddColumn(QQN::Group()->GrowthGroup);
			$this->dtgGroups->MetaAddColumn(QQN::Group()->SmartGroup);

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('Group');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new GroupEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new GroupEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>