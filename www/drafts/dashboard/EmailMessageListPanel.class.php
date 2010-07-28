<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the EmailMessage class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of EmailMessage objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this EmailMessageListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 * 
	 */
	class EmailMessageListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list EmailMessages
		public $dtgEmailMessages;

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
			$this->Template = 'EmailMessageListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgEmailMessages = new EmailMessageDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgEmailMessages->CssClass = 'datagrid';
			$this->dtgEmailMessages->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgEmailMessages->Paginator = new QPaginator($this->dtgEmailMessages);
			$this->dtgEmailMessages->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgEmailMessages->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for email_message's properties, or you
			// can traverse down QQN::email_message() to display fields that are down the hierarchy)
			$this->dtgEmailMessages->MetaAddColumn('Id');
			$this->dtgEmailMessages->MetaAddTypeColumn('EmailMessageStatusTypeId', 'EmailMessageStatusType');
			$this->dtgEmailMessages->MetaAddColumn('DateReceived');
			$this->dtgEmailMessages->MetaAddColumn('RawMessage');
			$this->dtgEmailMessages->MetaAddColumn('MessageIdentifier');
			$this->dtgEmailMessages->MetaAddColumn(QQN::EmailMessage()->Person);
			$this->dtgEmailMessages->MetaAddColumn(QQN::EmailMessage()->CommunicationListEntry);
			$this->dtgEmailMessages->MetaAddColumn('Subject');
			$this->dtgEmailMessages->MetaAddColumn('ResponseHeader');
			$this->dtgEmailMessages->MetaAddColumn('ResponseBody');
			$this->dtgEmailMessages->MetaAddColumn('ErrorMessage');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('EmailMessage');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new EmailMessageEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new EmailMessageEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>