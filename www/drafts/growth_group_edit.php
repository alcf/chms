<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
	 * of the GrowthGroup class.  It uses the code-generated
	 * GrowthGroupMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a GrowthGroup columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both growth_group_edit.php AND
	 * growth_group_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package ALCF ChMS
	 * @subpackage Drafts
	 */
	class GrowthGroupEditForm extends QForm {
		// Local instance of the GrowthGroupMetaControl
		protected $mctGrowthGroup;

		// Controls for GrowthGroup's Data Fields
		protected $lstGroup;
		protected $lstGrowthGroupLocation;
		protected $lstGrowthGroupDayType;
		protected $txtMeetingBitmap;
		protected $txtStartTime;
		protected $txtEndTime;
		protected $txtAddress1;
		protected $txtAddress2;
		protected $txtCrossStreet1;
		protected $txtCrossStreet2;
		protected $txtZipCode;
		protected $txtLongitude;
		protected $txtLatitude;
		protected $txtAccuracy;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		protected $lstGrowthGroupStructures;

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
			// Use the CreateFromPathInfo shortcut (this can also be done manually using the GrowthGroupMetaControl constructor)
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctGrowthGroup = GrowthGroupMetaControl::CreateFromPathInfo($this);

			// Call MetaControl's methods to create qcontrols based on GrowthGroup's data fields
			$this->lstGroup = $this->mctGrowthGroup->lstGroup_Create();
			$this->lstGrowthGroupLocation = $this->mctGrowthGroup->lstGrowthGroupLocation_Create();
			$this->lstGrowthGroupDayType = $this->mctGrowthGroup->lstGrowthGroupDayType_Create();
			$this->txtMeetingBitmap = $this->mctGrowthGroup->txtMeetingBitmap_Create();
			$this->txtStartTime = $this->mctGrowthGroup->txtStartTime_Create();
			$this->txtEndTime = $this->mctGrowthGroup->txtEndTime_Create();
			$this->txtAddress1 = $this->mctGrowthGroup->txtAddress1_Create();
			$this->txtAddress2 = $this->mctGrowthGroup->txtAddress2_Create();
			$this->txtCrossStreet1 = $this->mctGrowthGroup->txtCrossStreet1_Create();
			$this->txtCrossStreet2 = $this->mctGrowthGroup->txtCrossStreet2_Create();
			$this->txtZipCode = $this->mctGrowthGroup->txtZipCode_Create();
			$this->txtLongitude = $this->mctGrowthGroup->txtLongitude_Create();
			$this->txtLatitude = $this->mctGrowthGroup->txtLatitude_Create();
			$this->txtAccuracy = $this->mctGrowthGroup->txtAccuracy_Create();
			$this->lstGrowthGroupStructures = $this->mctGrowthGroup->lstGrowthGroupStructures_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('GrowthGroup') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctGrowthGroup->EditMode;
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
			// Delegate "Save" processing to the GrowthGroupMetaControl
			$this->mctGrowthGroup->SaveGrowthGroup();
			$this->RedirectToListPage();
		}

		protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the GrowthGroupMetaControl
			$this->mctGrowthGroup->DeleteGrowthGroup();
			$this->RedirectToListPage();
		}

		protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->RedirectToListPage();
		}

		// Other Methods

		protected function RedirectToListPage() {
			QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/growth_group_list.php');
		}
	}

	// Go ahead and run this form object to render the page and its event handlers, implicitly using
	// growth_group_edit.tpl.php as the included HTML template file
	GrowthGroupEditForm::Run('GrowthGroupEditForm');
?>