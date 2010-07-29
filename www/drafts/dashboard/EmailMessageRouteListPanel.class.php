<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the EmailMessageRoute class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of EmailMessageRoute objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this EmailMessageRouteListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 * 
	 */
	class EmailMessageRouteListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list EmailMessageRoutes
		public $dtgEmailMessageRoutes;

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
			$this->Template = 'EmailMessageRouteListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgEmailMessageRoutes = new EmailMessageRouteDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgEmailMessageRoutes->CssClass = 'datagrid';
			$this->dtgEmailMessageRoutes->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgEmailMessageRoutes->Paginator = new QPaginator($this->dtgEmailMessageRoutes);
			$this->dtgEmailMessageRoutes->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgEmailMessageRoutes->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for email_message_route's properties, or you
			// can traverse down QQN::email_message_route() to display fields that are down the hierarchy)
			$this->dtgEmailMessageRoutes->MetaAddColumn('Id');
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->EmailMessage);
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->Group);
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->CommunicationList);
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->Login);
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->CommunicationListEntry);
			$this->dtgEmailMessageRoutes->MetaAddColumn(QQN::EmailMessageRoute()->Person);

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('EmailMessageRoute');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new EmailMessageRouteEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new EmailMessageRouteEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>