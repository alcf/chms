<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
	 * of the CommunicationList class.  It uses the code-generated
	 * CommunicationListMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a CommunicationList columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both communication_list_edit.php AND
	 * communication_list_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class CommunicationListEditForm extends QForm {
		// Local instance of the CommunicationListMetaControl
		protected $mctCommunicationList;

		// Controls for CommunicationList's Data Fields
		protected $lblId;
		protected $lstEmailBroadcastType;
		protected $lstMinistry;
		protected $txtName;
		protected $txtToken;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		protected $lstCommunicationListEntries;
		protected $lstPeople;
		protected $lstEmailMessages;

		// Other Controls
		protected $btnSave;
		protected $btnDelete;
		protected $btnCancel;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}

		protected function Form_Run() {
			// Security check for ALLOW_REMOTE_ADMIN
			// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
			QApplication::CheckRemoteAdmin();
		}

		protected function Form_Create() {
			// Use the CreateFromPathInfo shortcut (this can also be done manually using the CommunicationListMetaControl constructor)
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctCommunicationList = CommunicationListMetaControl::CreateFromPathInfo($this);

			// Call MetaControl's methods to create qcontrols based on CommunicationList's data fields
			$this->lblId = $this->mctCommunicationList->lblId_Create();
			$this->lstEmailBroadcastType = $this->mctCommunicationList->lstEmailBroadcastType_Create();
			$this->lstMinistry = $this->mctCommunicationList->lstMinistry_Create();
			$this->txtName = $this->mctCommunicationList->txtName_Create();
			$this->txtToken = $this->mctCommunicationList->txtToken_Create();
			$this->lstCommunicationListEntries = $this->mctCommunicationList->lstCommunicationListEntries_Create();
			$this->lstPeople = $this->mctCommunicationList->lstPeople_Create();
			$this->lstEmailMessages = $this->mctCommunicationList->lstEmailMessages_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			$this->btnSave->CausesValidation = true;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('CommunicationList') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctCommunicationList->EditMode;
		}

		/**
		 * This Form_Validate event handler allows you to specify any custom Form Validation rules.
		 * It will also Blink() on all invalid controls, as well as Focus() on the top-most invalid control.
		 */
		protected function Form_Validate() {
			// By default, we report that Custom Validations passed
			$blnToReturn = true;

			// Custom validation rules goes here 
			// Be sure to set $blnToReturn to false if any custom validation fails!

			$blnFocused = false;
			foreach ($this->GetErrorControls() as $objControl) {
				// Set Focus to the top-most invalid control
				if (!$blnFocused) {
					$objControl->Focus();
					$blnFocused = true;
				}

				// Blink on ALL invalid controls
				$objControl->Blink();
			}

			return $blnToReturn;
		}

		// Button Event Handlers

		protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the CommunicationListMetaControl
			$this->mctCommunicationList->SaveCommunicationList();
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the CommunicationListMetaControl
			$this->mctCommunicationList->DeleteCommunicationList();
			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		// Other Methods

		protected function RedirectToListPage() {
			QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/communication_list_list.php');
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, implicitly using
	// communication_list_edit.tpl.php as the included HTML template file
	CommunicationListEditForm::Run('CommunicationListEditForm');
?>