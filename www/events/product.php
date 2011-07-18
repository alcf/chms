<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class FormProductEditForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		protected $objSignupForm;
		protected $mctProduct;
		
		protected $lblHeading;
		
		protected $lblFormProductType;
		protected $txtName;
		protected $txtDescription;
		
		protected $txtMinimumQuantity;
		protected $txtMaximumQuantity;
		
		protected $lstFormPaymentTypeId;
		protected $txtCost;
		protected $txtDeposit;

		protected $dtxDateStart;
		protected $calDateStart;
		protected $dtxDateEnd;
		protected $calDateEnd;
		
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;
		
		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			$this->lblHeading = new QLabel($this);

			if (!$this->objSignupForm) QApplication::Redirect('/events/');
			if (!$this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);

			if (QApplication::PathInfo(1)) {
				$objProduct = FormProduct::Load(QApplication::PathInfo(1));
				if (!$objProduct) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
				if ($objProduct->SignupFormId != $this->objSignupForm->Id) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
				$this->strPageTitle .= 'Edit Product';
				$this->lblHeading->Text = 'Edit ' . $objProduct->Type . ' Product';
			} else {
				if (!QApplication::PathInfo(2)) QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
				$objProduct = new FormProduct();
				$objProduct->SignupForm = $this->objSignupForm;
				$objProduct->FormProductTypeId = QApplication::PathInfo(2);
				$objProduct->OrderNumber = 100000;
				$this->strPageTitle .= 'Create New Product';
				$this->lblHeading->Text = 'Create New ' . $objProduct->Type . ' Product';
				
				switch ($objProduct->FormProductTypeId) {
					case FormProductType::Required:
						$objProduct->MinimumQuantity = 1;
						$objProduct->MaximumQuantity = 1;
						break;
					case FormProductType::RequiredWithChoice:
						$objProduct->MinimumQuantity = 1;
						$objProduct->MaximumQuantity = 1;
						break;
					case FormProductType::Optional:
						break;
					default:
						throw new Exception('Invalid FormProductType: ' . $objProduct->FormProductTypeId);
				}
				
				$objProduct->FormPaymentTypeId = FormPaymentType::PayInFull;
			}

			$this->mctProduct = new FormProductMetaControl($this, $objProduct);

			// Fields
			$this->lblFormProductType = $this->mctProduct->lblFormProductTypeId_Create();
			$this->txtName = $this->mctProduct->txtName_Create();
			$this->txtName->Required = true;
			$this->txtDescription = $this->mctProduct->txtDescription_Create();

			$this->dtxDateStart = $this->mctProduct->dtxDateStart_Create();
			$this->calDateStart = $this->mctProduct->calDateStart_Create();
			$this->dtxDateEnd = $this->mctProduct->dtxDateEnd_Create();
			$this->calDateEnd = $this->mctProduct->calDateEnd_Create();

			switch ($objProduct->FormProductTypeId) {
				case FormProductType::Required:
					break;
				case FormProductType::RequiredWithChoice:
					break;
				case FormProductType::Optional:
					$this->txtMaximumQuantity = $this->mctProduct->txtMaximumQuantity_Create();
					$this->txtMaximumQuantity->Required = true;
					$this->txtMaximumQuantity->Minimum = 0;
					$this->txtMinimumQuantity = $this->mctProduct->txtMinimumQuantity_Create();
					$this->txtMinimumQuantity->Required = true;
					$this->txtMinimumQuantity->Minimum = 0;
					break;
				default:
					throw new Exception('Invalid FormProductType: ' . $objProduct->FormProductTypeId);
			}

			// Setup Payment
			$this->lstFormPaymentTypeId = $this->mctProduct->lstFormPaymentType_Create();
			$this->lstFormPaymentTypeId->AddAction(new QChangeEvent(), new QAjaxAction('lstFormPaymentTypeId_Refresh'));
			
			$this->txtCost = $this->mctProduct->txtCost_Create();
			$this->txtCost->HtmlBefore = '<span>$ </span>';
			$this->txtCost->Minimum = 0;
			$this->txtDeposit = $this->mctProduct->txtDeposit_Create();
			$this->txtDeposit->HtmlBefore = '<span>$ </span>';
			$this->txtDeposit->Minimum = 0;

			$this->lstFormPaymentTypeId_Refresh(null, null, null);

			// Buttons
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->CausesValidation = true;
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
			
			$this->btnCancel = new QLinkButton($this);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

			// Delete?
			if ($this->mctProduct->EditMode) {
				$this->btnDelete = new QLinkButton($this);
				$this->btnDelete->Text = 'Delete';
				$this->btnDelete->CssClass = 'delete';
				
				if ($this->mctProduct->FormProduct->CountSignupProducts()) {
					$this->btnDelete->AddAction(new QClickEvent(), new QAlertAction('You cannot delete this product as there are already registrations that have selected it.  A better idea would be to put an "end date" in the past.'));
					$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
				} else {
					$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to DELETE this Product?  This cannot be undone.'));
					$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
					$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
				}
			}
		}

		public function lstFormPaymentTypeId_Refresh($strFormId, $strControlId, $strParameter) {
			switch ($this->lstFormPaymentTypeId->SelectedValue) {
				case FormPaymentType::DepositRequired:
					$this->txtCost->Visible = true;
					$this->txtDeposit->Visible = true;
					break;
				case FormPaymentType::PayInFull:
					$this->txtDeposit->Text = null;
					$this->txtCost->Visible = true;
					$this->txtDeposit->Visible = false;
					break;
				case FormPaymentType::Donation:
					$this->txtCost->Text = null;
					$this->txtDeposit->Text = null;
					$this->txtCost->Visible = false;
					$this->txtDeposit->Visible = false;
					break;
				default:
					throw new Exception('Unhandled FormPaymentTypeId: ' . $this->lstFormPaymentTypeId->SelectedValue);
			}
			
			$this->txtCost->Required = $this->txtCost->Visible;
			$this->txtDeposit->Required = $this->txtDeposit->Visible;
		}

		public function Form_Validate() {
			$blnToReturn = parent::Form_Validate();

			// Check to ensure cost makes sense
			if ($this->txtDeposit->Visible) {
				if ($this->txtDeposit->Text >= $this->txtCost->Text) {
					$this->txtDeposit->Warning = 'Deposit must be less than the overall cost';
					$blnToReturn = false;
				}
			}

			if ($this->txtMinimumQuantity) {
				if ($this->txtMaximumQuantity->Text < $this->txtMinimumQuantity->Text) {
					$this->txtMaximumQuantity->Warning = 'Maximum Quantity must be greater or equal to Minimum Quantity';
					$blnToReturn = false;
				}
			}

			if ($this->dtxDateStart->DateTime && $this->dtxDateEnd->DateTime) {
				if ($this->dtxDateEnd->DateTime->IsEarlierThan($this->dtxDateStart->DateTime)) {
					$this->dtxDateEnd->Warning = 'Date Unavailable must be after Date Available';
					$blnToReturn = false;
				}
			}

			$blnFirst = true;
			foreach ($this->GetErrorControls() as $objControl) {
				$objControl->Blink();
				if ($blnFirst) {
					$objControl->Focus();
					$blnFirst = false;
				}
			}

			return $blnToReturn;
		}
		protected function btnSave_Click() {
			$this->mctProduct->SaveFormProduct();
			
			// Fixup Quantity for Donations
			if ($this->mctProduct->FormProduct->FormPaymentTypeId == FormPaymentType::Donation) {
				$this->mctProduct->FormProduct->MinimumQuantity = 1;
				$this->mctProduct->FormProduct->MaximumQuantity = 1;
				$this->mctProduct->FormProduct->Save();
			}
			
			// Fix up 12AM (no time) issue for end date
			if ($this->mctProduct->FormProduct->DateEnd &&
				($this->mctProduct->FormProduct->DateEnd->Hour == 0) &&
				($this->mctProduct->FormProduct->DateEnd->Minute == 0) &&
				($this->mctProduct->FormProduct->DateEnd->Second == 0)) {
				$this->mctProduct->FormProduct->DateEnd->SetTime(23, 59, 59);
				$this->mctProduct->FormProduct->Save();
			}

			FormProduct::RefreshOrderNumber($this->objSignupForm->Id, $this->mctProduct->FormProduct->FormProductTypeId);
			QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
		}
		
		protected function btnCancel_Click() {
			QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
		}
			
		protected function btnDelete_Click() {
			$this->mctProduct->DeleteFormProduct();
			FormProduct::RefreshOrderNumber($this->objSignupForm->Id, $this->mctProduct->FormProduct->FormProductTypeId);
			QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
		}
	}
	
	FormProductEditForm::Run('FormProductEditForm');
?>