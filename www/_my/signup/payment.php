<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::AuthenticatePublic();

	class PaymentSignupQForm extends ChmsForm {
		protected $strPageTitle = null;
		/**
		 * @var SignupForm
		 */
		protected $objSignupForm;

		/**
		 * @var SignupEntry
		 */
		protected $objSignupEntry;
		
		protected $objChild;

		protected $dtgProducts;
		protected $lstRequiredWithChoice;

		protected $btnSubmit;

		protected function Form_Create() {
			// Attempt to load by Token and then by ID
			$this->objSignupForm = SignupForm::LoadByToken(QApplication::PathInfo(0));
			if (!$this->objSignupForm) $this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));

			// Ensure it is the correct type and it exists
			if (!$this->objSignupForm) {
				$this->strHtmlIncludeFilePath = '_notfound.tpl.php';
				return;
			}

			$this->strPageTitle = $this->objSignupForm->Name . ' - Payment';

			// Ensure it is Active
			if (!$this->objSignupForm->ActiveFlag) {
				$this->strHtmlIncludeFilePath = '_notactive.tpl.php';
				return;
			}

			// Ensure we have Products that require some kind of payment
			if (!$this->objSignupForm->CountFormProducts()) {
				$this->strHtmlIncludeFilePath = '_notfound.tpl.php';
				return;
			}

			// Get the SignupEntry
			$this->objSignupEntry = SignupEntry::Load(QApplication::PathInfo(1));
			
			// Ensure it is correct for the form and the signup person
			if (!$this->objSignupEntry ||
				($this->objSignupEntry->SignupFormId != $this->objSignupForm->Id) ||
				($this->objSignupEntry->SignupByPersonId != QApplication::$PublicLogin->PersonId) ||
				($this->objSignupEntry->SignupEntryStatusTypeId != SignupEntryStatusType::Incomplete)) {
				$this->strHtmlIncludeFilePath = '_notfound.tpl.php';
				return;
			}
			
			switch ($this->objSignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					$this->objChild = $this->objSignupForm->EventSignupForm;
					break;
			}

			$this->dtgProducts = new QDataGrid($this);
			$this->dtgProducts->AddColumn(new QDataGridColumn('Product / Item', '<?= $_FORM->RenderProduct($_ITEM); ?>', 'HtmlEntities=false', 'Width=550px'));
			$this->dtgProducts->AddColumn(new QDataGridColumn('Quantity', '<?= $_FORM->RenderQuantity($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px'));
			$this->dtgProducts->AddColumn(new QDataGridColumn('Cost', '<?= $_FORM->RenderCost($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px'));
			$this->dtgProducts->AddColumn(new QDataGridColumn('Total', '<?= $_FORM->RenderTotal($_ITEM); ?>', 'HtmlEntities=false', 'Width=100px'));
			$this->dtgProducts->SetDataBinder('dtgProducts_Bind');

			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->CausesValidation = true;
			$this->btnSubmit->CssClass = 'primary';
			$this->btnSubmit->Text = 'Submit Registration';
			$this->btnSubmit->AddAction(new QClickEvent(), new QConfirmAction('By proceeding, your credit card will be charged for the amount shown.  Are you SURE you wish to proceed?'));
			$this->btnSubmit->AddAction(new QClickEvent(), new QToggleEnableAction($this->btnSubmit));
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));

			// Remove All Product Selections
			$this->objSignupEntry->DeleteAllSignupProducts();

			// Add Required Products
			foreach ($this->objSignupForm->GetFormProductArrayByType(FormProductType::Required, QQ::OrderBy(QQN::FormProduct()->OrderNumber)) as $objProduct) {
				if ($objProduct->IsAvailableRightNow()) {
					$objSignupProduct = SignupProduct::LoadBySignupEntryIdFormProductId($this->objSignupEntry->Id, $objProduct->Id);
					if (!$objSignupProduct) {
						$this->objSignupEntry->AddProduct($objProduct);
					}
				}
			}
		}

		public function Form_Validate() {
			$blnToReturn = parent::Form_Validate();
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
		
		public function RenderProduct($objItem) {
			// For Required and Optional Products
			if ($objItem instanceof FormProduct) {
				if ($objItem->Description)
					return QApplication::HtmlEntities($objItem->Name) . '<br/><span class="na">' .
						QApplication::HtmlEntities($objItem->Description) . '</span>';
				else
					return QApplication::HtmlEntities($objItem->Name);

			// For Payment Entries
			} else if ($objItem instanceof SignupPayment) {
				return SignupPaymentType::$NameArray[$objItem->SignupPaymentTypeId] . '<br/><span class="na">' .
					QApplication::HtmlEntities($objItem->TransactionCode) . ' - ' . $objItem->TransactionDate->ToString('MMM D YYYY') . '</span>';

			// For "Required with Choice" Products
			} else if ($objItem == -1) {
				if (!$this->lstRequiredWithChoice) {
					$this->lstRequiredWithChoice = new QListBox($this->dtgProducts);
					$this->lstRequiredWithChoice->Required = true;

					$this->lstRequiredWithChoice->AddItem('- Select One -', null, true);
					// Get all the active RequiredWithChoice items and add it
					foreach ($this->objSignupForm->GetFormProductArrayByType(FormProductType::RequiredWithChoice, QQ::OrderBy(QQN::FormProduct()->OrderNumber)) as $objProduct)
						if ($objProduct->IsAvailableRightNow()) $this->lstRequiredWithChoice->AddItem($objProduct->Name, $objProduct->Id);

					$this->lstRequiredWithChoice->AddAction(new QChangeEvent(), new QAjaxAction('lstRequiredWithChoice_Change'));
				}

				$objProduct = FormProduct::Load($this->lstRequiredWithChoice->SelectedValue);
				if ($objProduct && $objProduct->Description) {
					return $this->lstRequiredWithChoice->Render(false) . '<br/><span class="na">' . QApplication::HtmlEntities($objProduct->Description) . '</span>';
				} else {
					return $this->lstRequiredWithChoice->Render(false);
				}

			// For the "Balance Due" at the bottom
			} else if (is_null($objItem)) {
				return '<strong>BALANCE DUE</strong>';
			}
		}

		public function RenderQuantity($objItem) {
			// Required and Optional Products
			if ($objItem instanceof FormProduct) {
				if ($objItem->FormProductTypeId == FormProductType::Required)
					return '1';
				else if ($objItem->FormProductTypeId == FormProductType::Optional) {
					if ($objItem->MinimumQuantity == $objItem->MaximumQuantity) return $objItem->MinimumQuantity;

					$lstQuantity = $this->GetControl('lstQuantity' . $objItem->Id);
					if (!$lstQuantity) {
						$lstQuantity = new QListBox($this->dtgProducts, 'lstQuantity' . $objItem->Id);
						for ($intQuantity = $objItem->MinimumQuantity; $intQuantity <= $objItem->MaximumQuantity; $intQuantity++)
							$lstQuantity->AddItem($intQuantity, $intQuantity);
						$lstQuantity->SelectedIndex = 0;
					}
					
					return $lstQuantity->Render(false);
				}

			// Payment Entries
			} else if ($objItem instanceof SignupPayment) {
				return null;

			// "Required with Choice" Products
			} else if ($objItem == -1) {
				if ($this->lstRequiredWithChoice->SelectedValue) return '1';
				else return null;
			}
		}

		public function RenderCost($objItem) {
			// Required and Optional Products
			if ($objItem instanceof FormProduct) {
				switch ($objItem->FormPaymentTypeId) {
					case FormPaymentType::PayInFull:
					case FormPaymentType::DepositRequired:
						return QApplication::DisplayCurrency($objItem->Cost);
					case FormPaymentType::Donation:
						return 'TextBox TODO';
				}

			// Payment Entries
			} else if ($objItem instanceof SignupPayment) {
				return null;

			// "Required with Choice" Products
			} else if ($objItem == -1) {
				$objProduct = FormProduct::Load($this->lstRequiredWithChoice->SelectedValue);
				if (!$objProduct) return null;
				switch ($objProduct->FormPaymentTypeId) {
					case FormPaymentType::PayInFull:
					case FormPaymentType::DepositRequired:
						return QApplication::DisplayCurrency($objProduct->Cost);
					case FormPaymentType::Donation:
						return 'TextBox TODO';
				}
			}
		}
				
		public function RenderTotal($objItem) {
			// Required and Optional Products
			if ($objItem instanceof FormProduct) {
				
				// Required Products
				if ($objItem->FormProductTypeId == FormProductType::Required) {
					if ($objItem->FormPaymentTypeId == FormPaymentType::PayInFull) {
						return QApplication::DisplayCurrency($objItem->Cost);
					} else if ($objItem->FormPaymentTypeId == FormPaymentType::DepositRequired) {
						return QApplication::DisplayCurrency($objItem->Cost);
					} else if ($objItem->FormPaymentTypeId == FormPaymentType::Donation) {
						return 'Value TODO';
					}
				
				// Optional Products
				} else if ($objItem->FormProductTypeId == FormProductType::Optional) {
					if ($objItem->FormPaymentTypeId == FormPaymentType::PayInFull) {
						return 'Value TODO';
					} else if ($objItem->FormPaymentTypeId == FormPaymentType::DepositRequired) {
						return 'Value TODO';
					} else if ($objItem->FormPaymentTypeId == FormPaymentType::Donation) {
						return 'Value TODO';
					}
				}
			
			// Payment Entries
			} else if ($objItem instanceof SignupPayment) {
				return QApplication::DisplayCurrency(-1 * $objItem->Amount);
			
			// "Required with Choice" Products
			} else if ($objItem == -1) {
				if ($intFormProductId = $this->lstRequiredWithChoice->SelectedValue) {
					$objSignupProduct = SignupProduct::LoadBySignupEntryIdFormProductId($this->objSignupEntry->Id, $intFormProductId);
					if ($objSignupProduct) {
						return QApplication::DisplayCurrency($objSignupProduct->TotalAmount);
					}
				}
				return null;

			// Balance Entry
			} else if (is_null($objItem)) {
				return '<strong>' . QApplication::DisplayCurrency(-1 * $this->objSignupEntry->AmountBalance) . '</strong>';
			}
		}
		
		public function dtgProducts_Bind() {
			$arrDataSource = array();

			// First add any required products
			foreach ($this->objSignupForm->GetFormProductArrayByType(FormProductType::Required, QQ::OrderBy(QQN::FormProduct()->OrderNumber)) as $objProduct)
				if ($objProduct->IsAvailableRightNow())
					$arrDataSource[] = $objProduct;

			// If there are any valid "Required with Choice" products, add the row for it
			foreach ($this->objSignupForm->GetFormProductArrayByType(FormProductType::RequiredWithChoice, QQ::OrderBy(QQN::FormProduct()->OrderNumber)) as $objProduct)
				if ($objProduct->IsAvailableRightNow()) {
					$arrDataSource[] = -1;
					break;
				}

			// Add any optional products
			foreach ($this->objSignupForm->GetFormProductArrayByType(FormProductType::Optional, QQ::OrderBy(QQN::FormProduct()->OrderNumber)) as $objProduct)
				if ($objProduct->IsAvailableRightNow())
					$arrDataSource[] = $objProduct;

			// Add any payments
			$arrDataSource = array_merge($arrDataSource, $this->objSignupEntry->GetSignupPaymentArray(QQ::OrderBy(QQN::SignupPayment()->TransactionDate)));

			// Add "Balance Due"
			$arrDataSource[] = null;

			$this->dtgProducts->DataSource = $arrDataSource;
		}

		public function lstRequiredWithChoice_Change() {
			// Erase any old entries
			foreach ($this->objSignupEntry->GetSignupProductArray() as $objSignupProduct) {
				if (($objSignupProduct->FormProduct->FormProductTypeId == FormProductType::RequiredWithChoice) &&
					($objSignupProduct->FormProductId != $this->lstRequiredWithChoice->SelectedValue))
					$objSignupProduct->Delete();
			}
			
			// Create the new entry
			$objFormProduct = FormProduct::Load($this->lstRequiredWithChoice->SelectedValue);
			if ($objFormProduct) $this->objSignupEntry->AddProduct($objFormProduct);
			$this->dtgProducts->Refresh();
		}

		public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
			
		}
	}

	PaymentSignupQForm::Run('PaymentSignupQForm');
?>