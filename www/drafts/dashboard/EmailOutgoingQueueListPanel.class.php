<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the EmailOutgoingQueue class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of EmailOutgoingQueue objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this EmailOutgoingQueueListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 * 
	 */
	class EmailOutgoingQueueListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list EmailOutgoingQueues
		public $dtgEmailOutgoingQueues;

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
			$this->Template = 'EmailOutgoingQueueListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgEmailOutgoingQueues = new EmailOutgoingQueueDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgEmailOutgoingQueues->CssClass = 'datagrid';
			$this->dtgEmailOutgoingQueues->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgEmailOutgoingQueues->Paginator = new QPaginator($this->dtgEmailOutgoingQueues);
			$this->dtgEmailOutgoingQueues->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgEmailOutgoingQueues->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for email_outgoing_queue's properties, or you
			// can traverse down QQN::email_outgoing_queue() to display fields that are down the hierarchy)
			$this->dtgEmailOutgoingQueues->MetaAddColumn('Id');
			$this->dtgEmailOutgoingQueues->MetaAddColumn(QQN::EmailOutgoingQueue()->EmailMessage);
			$this->dtgEmailOutgoingQueues->MetaAddColumn('SendToEmailAddress');
			$this->dtgEmailOutgoingQueues->MetaAddColumn('ErrorFlag');
			$this->dtgEmailOutgoingQueues->MetaAddColumn('Token');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('EmailOutgoingQueue');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new EmailOutgoingQueueEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new EmailOutgoingQueueEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>