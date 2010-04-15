<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Marriage class.  It uses the code-generated
	 * MarriageMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Marriage columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both marriage_edit.php AND
	 * marriage_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class MarriageEditPanel extends QPanel {
		// Local instance of the MarriageMetaControl
		protected $mctMarriage;

		// Controls for Marriage's Data Fields
		public $lblId;
		public $lstLinkedMarriage;
		public $lstPerson;
		public $lstMarriedToPerson;
		public $lstMarriageStatusType;
		public $calDateStart;
		public $calDateEnd;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstMarriageAsLinked;

		// Other Controls
		public $btnSave;
		public $btnDelete;
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod, $intId = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = 'MarriageEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the MarriageMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctMarriage = MarriageMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on Marriage's data fields
			$this->lblId = $this->mctMarriage->lblId_Create();
			$this->lstLinkedMarriage = $this->mctMarriage->lstLinkedMarriage_Create();
			$this->lstPerson = $this->mctMarriage->lstPerson_Create();
			$this->lstMarriedToPerson = $this->mctMarriage->lstMarriedToPerson_Create();
			$this->lstMarriageStatusType = $this->mctMarriage->lstMarriageStatusType_Create();
			$this->calDateStart = $this->mctMarriage->calDateStart_Create();
			$this->calDateEnd = $this->mctMarriage->calDateEnd_Create();
			$this->lstMarriageAsLinked = $this->mctMarriage->lstMarriageAsLinked_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('Marriage') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctMarriage->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the MarriageMetaControl
			$this->mctMarriage->SaveMarriage();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the MarriageMetaControl
			$this->mctMarriage->DeleteMarriage();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			$strMethod = $this->strClosePanelMethod;
			$this->objForm->$strMethod($blnChangesMade);
		}
	}
?>