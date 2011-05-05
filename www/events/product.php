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
					$this->txtMinimumQuantity = $this->mctProduct->txtMinimumQuantity_Create();
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
				case FormPaymentType::PayInFull:
					$this->txtCost->Text = null;
					$this->txtDeposit->Text = null;
					$this->txtCost->Visible = false;
					$this->txtDeposit->Visible = false;
					break;
				default:
					$this->txtCost->Text = null;
					$this->txtDeposit->Text = null;
					$this->txtCost->Visible = false;
					$this->txtDeposit->Visible = false;
					break;
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
					$this->txtDeposit->Blink();
					$this->txtDeposit->Focus();
					$blnToReturn = false;
				}
			}

			return $blnToReturn;
		}
		protected function btnSave_Click() {
			$this->mctQuestion->SaveFormQuestion();
			FormQuestion::RefreshOrderNumber($this->objSignupForm->Id);
			QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
		}
		
		protected function btnCancel_Click() {
			QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
		}
			
		protected function btnDelete_Click() {
			$this->mctQuestion->FormQuestion->DeleteAllFormAnswers();
			$this->mctQuestion->DeleteFormQuestion();
			FormQuestion::RefreshOrderNumber($this->objSignupForm->Id);
			QApplication::Redirect('/events/form.php/' . $this->objSignupForm->Id);
		}
	}
	
	FormProductEditForm::Run('FormProductEditForm');
?>