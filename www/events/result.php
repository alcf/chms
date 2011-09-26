<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class ViewSignupForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		/**
		 * @var SignupForm
		 */
		protected $objSignupForm;
		protected $mctSignupEntry;
		protected $mctClassRegistration;
		
		protected $lblPerson;
		protected $lblSignupByPerson;
		protected $lblSignupEntryStatusType;
		protected $lblDateCreated;
		protected $lblDateSubmitted;

		protected $lblInternalNotes;
		protected $btnEditNote;
		protected $btnToggleStatus;

		protected $dtgFormQuestions;
		protected $pxyEditFormQuestion;

		protected $dtgFormProducts;
		protected $pxyEditFormProduct;

		protected $dtgPayments;
		protected $lstAddPayment;

		// Specifically for classes
		protected $dtgClassAttendance;
		protected $pxyEditClassAttendance;
		protected $dtgClassGrade;
		protected $pxyEditClassGrade;

		protected $dlgEdit;
		/**
		 * Tag should be one of the EditTag constants
		 * @var integer
		 */
		protected $intEditTag;
		protected $btnSave;
		protected $btnCancel;
		protected $btnDelete;

		// Dialog Box for Internal Note
		protected $txtTextArea;

		// Dialog Box for FormAnswer
		protected $objAnswer;
		protected $txtTextbox;
		protected $lstListbox;
		protected $txtInteger;
		protected $txtFloat;
		protected $chkBoolean;
		protected $dtxDateValue;
		protected $lblInstructions;

		const EditTagNote = 1;
		const EditTagPayment = 2;
		const EditTagAnswer = 3;
		const EditTagProduct = 4;
		const EditTagStatus = 5;
		const EditTagClassAttendance = 6;
		const EditTagClassGrade = 7;
		
		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			if (!$this->objSignupForm) QApplication::Redirect('/events/');

			// Check for view *and* admin permissions on this ministry
			if (!$this->objSignupForm->IsLoginCanView(QApplication::$Login)) QApplication::Redirect('/events/');
			if (!$this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) QApplication::Redirect('/events/');

			switch ($this->objSignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					$this->strPageTitle .= $this->objSignupForm->Name;
					break;
				case SignupFormType::Course:
					$this->strPageTitle = 'Class Registration - ' . $this->objSignupForm->Name;
					break;
				default:
					throw new Exception('Invalid SignupFormTypeId for SignupForm: ' . $this->objSignupForm->Id);
			}

			// Check for the SignupEntry
			if (QApplication::PathInfo(1)) {
				$objSignupEntry = SignupEntry::Load(QApplication::PathInfo(1));
				if (!$objSignupEntry) QApplication::Redirect('/events/');
				if ($objSignupEntry->SignupFormId != $this->objSignupForm->Id) QApplication::Redirect('/events/');
			} else {
				QApplication::Redirect('/events/results.php/' . $this->objSignupForm->Id);
			}

			$this->mctSignupEntry = new SignupEntryMetaControl($this, $objSignupEntry);
			$this->lblPerson = new QLabel($this);
			$this->lblPerson->Name = 'Person';
			$this->lblPerson->HtmlEntities = false;
			$this->lblPerson->Text = $this->mctSignupEntry->SignupEntry->Person->LinkHtml;

			$this->lblSignupEntryStatusType = $this->mctSignupEntry->lblSignupEntryStatusTypeId_Create();
			$this->lblDateCreated = $this->mctSignupEntry->lblDateCreated_Create();
			$this->lblDateSubmitted = $this->mctSignupEntry->lblDateSubmitted_Create();

			if (($this->mctSignupEntry->SignupEntry->PersonId != $this->mctSignupEntry->SignupEntry->SignupByPersonId) &&
				($this->mctSignupEntry->SignupEntry->SignupByPersonId)) {
				$this->lblSignupByPerson = new QLabel($this);
				$this->lblSignupByPerson->HtmlEntities = false;
				$this->lblSignupByPerson->Text = $this->mctSignupEntry->SignupEntry->SignupByPerson->LinkHtml;
			}

			$this->lblInternalNotes = $this->mctSignupEntry->lblInternalNotes_Create();

			$this->btnEditNote = new QButton($this);
			$this->btnEditNote->Text = 'Edit Internal Note';
			$this->btnEditNote->AddAction(new QClickEvent(), new QAjaxAction('btnEditNote_Click'));
			$this->btnEditNote->CssClass = 'alternate';

			$this->btnToggleStatus = new QButton($this);
			$this->btnToggleStatus->Text = 'Change Registration Status';
			$this->btnToggleStatus->CssClass = 'alternate';
			$this->btnToggleStatus->AddAction(new QClickEvent(), new QAjaxAction('btnToggleStatus_Click'));
			
			$this->dtgFormQuestions = new QDataGrid($this);
			$this->dtgFormQuestions->AddColumn(new QDataGridColumn('Question', '<?= $_ITEM->ShortDescriptionBoldIfRequiredHtml; ?>', 'Width=300px', 'HtmlEntities=false'));
			$this->dtgFormQuestions->AddColumn(new QDataGridColumn('Response', '<?= $_FORM->RenderResponse($_ITEM); ?>', 'Width=640px', 'HtmlEntities=false'));
			$this->dtgFormQuestions->SetDataBinder('dtgFormQuestions_Bind');

			$this->pxyEditFormQuestion = new QControlProxy($this);
			$this->pxyEditFormQuestion->AddAction(new QClickEvent(), new QAjaxAction('pxyEditFormQuestion_Click'));
			$this->pxyEditFormQuestion->AddAction(new QClickEvent(), new QTerminateAction());

			$this->dtgFormProducts = new QDataGrid($this);
			$this->dtgFormProducts->AddColumn(new QDataGridColumn('Product Name', '<?= $_FORM->RenderProductName($_ITEM); ?>', 'Width=300px', 'HtmlEntities=false'));
			$this->dtgFormProducts->AddColumn(new QDataGridColumn('Purchased / Quantity', '<?= $_FORM->RenderProductQuantity($_ITEM); ?>', 'Width=475px', 'HtmlEntities=false'));
			$this->dtgFormProducts->AddColumn(new QDataGridColumn('Total Cost', '<?= $_FORM->RenderProductCost($_ITEM); ?>', 'Width=150px', 'HtmlEntities=false'));
			$this->dtgFormProducts->SetDataBinder('dtgFormProducts_Bind');
			
			$this->pxyEditFormProduct = new QControlProxy($this);
			$this->pxyEditFormProduct->AddAction(new QClickEvent(), new QAjaxAction('pxyEditFormProduct_Click'));
			$this->pxyEditFormProduct->AddAction(new QClickEvent(), new QTerminateAction());

			$this->dtgPayments = new SignupPaymentDataGrid($this);
			$this->dtgPayments->MetaAddColumn('TransactionDate', 'Width=160px');
			$this->dtgPayments->MetaAddTypeColumn('SignupPaymentTypeId', 'SignupPaymentType', 'Name=Type', 'Width=160px');
			$this->dtgPayments->MetaAddColumn('TransactionDescription', 'Name=Description', 'Width=445px', 'Html=<?= $_FORM->RenderPaymentCode($_ITEM); ?>', 'HtmlEntities=false');
			$this->dtgPayments->MetaAddColumn('Amount', 'Width=150px', 'Html=<?= $_FORM->RenderPaymentAmount($_ITEM); ?>', 'HtmlEntities=false', 'FontBold=true');
			$this->dtgPayments->SetDataBinder('dtgPayments_Bind');
			$this->dtgPayments->SortColumnIndex = 0;
			
			$this->lstAddPayment = new QListBox($this);
			$this->lstAddPayment->AddItem('- Add Payment -');
			foreach (SignupPaymentType::$NameArray as $intId => $strName) {
				if ($intId != SignupPaymentType::CreditCard) $this->lstAddPayment->AddItem($strName, $intId);
			}
			$this->lstAddPayment->AddAction(new QChangeEvent(), new QAjaxAction('lstAddPayment_Change'));

			$this->dlgEdit_Create();

			// Child Object
			switch ($this->objSignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					break;
				case SignupFormType::Course:
					$this->mctClassRegistration = new ClassRegistrationMetaControl($this->dlgEdit, $objSignupEntry->ClassRegistration);
					break;
				default:
					throw new Exception('Invalid SignupFormTypeId for SignupForm: ' . $this->objSignupForm->Id);
			}

			// Specifically for class registrations
			if ($this->mctClassRegistration) {
				$this->dtgClassAttendance = new QDataGrid($this);
				$this->dtgClassAttendance->AddColumn(new QDataGridColumn('Class Meeting', '<?= $_FORM->dttClassMeetingArrayForIndex[$_ITEM->MeetingNumber - 1]->ToString("DDDD, MMMM D, YYYY"); ?>', 'Width=300px'));
				$this->dtgClassAttendance->AddColumn(new QDataGridColumn('Attendance', '<?= $_FORM->RenderAttendance($_ITEM); ?>', 'Width=640px', 'HtmlEntities=false'));
				$this->dtgClassAttendance->SetDataBinder('dtgClassAttendance_Bind');
				$this->pxyEditClassAttendance = new QControlProxy($this);
				$this->pxyEditClassAttendance->AddAction(new QClickEvent(), new QAjaxAction('pxyEditClassAttendance_Click'));
				$this->pxyEditClassAttendance->AddAction(new QClickEvent(), new QTerminateAction());

				$this->dtgClassGrade = new QDataGrid($this);
				$this->dtgClassGrade->AddColumn(new QDataGridColumn('Class Grade', 'Final Class Grade', 'Width=300px'));
				$this->dtgClassGrade->AddColumn(new QDataGridColumn('Grade', '<?= $_FORM->RenderClassGrade(); ?>', 'Width=640px', 'HtmlEntities=false'));
				$this->dtgClassGrade->SetDataBinder('dtgClassGrade_Bind');
				$this->pxyEditClassGrade = new QControlProxy($this);
				$this->pxyEditClassGrade->AddAction(new QClickEvent(), new QAjaxAction('pxyEditClassGrade_Click'));
				$this->pxyEditClassGrade->AddAction(new QClickEvent(), new QTerminateAction());
			}
		}

		/**
		 * @var QDateTime[]
		 */
		public $dttClassMeetingArrayForIndex;
		public function RenderAttendance(ClassAttendence $objAttendance) {
			if (is_null($objAttendance->PresentFlag)) {
				$strToReturn = '(not yet specified)';
				$strStyle = 'color: #666;';
			} else if ($objAttendance->PresentFlag) {
				$strToReturn = 'PRESENT';
				$strStyle = 'color: #060; font-weight: bold;';
			} else {
				$strToReturn = 'NOT Present';
				$strStyle = 'color: #600; font-weight: bold;';
			}
			
			return sprintf('<a href="#" %s style="%s">%s</a>', $this->pxyEditClassAttendance->RenderAsEvents($objAttendance->MeetingNumber, false), $strStyle, $strToReturn);
		}
		public function dtgClassAttendance_Bind() {
			$this->mctClassRegistration->ClassRegistration->RefreshClassAttendance();
			$this->dttClassMeetingArrayForIndex = $this->mctClassRegistration->ClassRegistration->ClassMeeting->GetClassMeetingDays();
			$this->dtgClassAttendance->DataSource = $this->mctClassRegistration->ClassRegistration->GetClassAttendenceArray(QQ::OrderBy(QQN::ClassAttendence()->MeetingNumber));
		}

		public function RenderClassGrade() {
			if (is_null($this->mctClassRegistration->ClassRegistration->ClassGrade)) {
				$strToReturn = '(not yet specified)';
				$strStyle = 'color: #666;';
			} else {
				$strToReturn = $this->mctClassRegistration->ClassRegistration->ClassGrade->Code . ' - ' . $this->mctClassRegistration->ClassRegistration->ClassGrade->Name;
				$strStyle = 'color: #000; font-weight: bold;';
			}
			
			return sprintf('<a href="#" %s style="%s">%s</a>', $this->pxyEditClassGrade->RenderAsEvents(null, false), $strStyle, $strToReturn);
		}
		public function dtgClassGrade_Bind() {
			$this->dtgClassGrade->DataSource = array(true);
		}

		/**
		 * @var SignupProduct
		 */
		protected $objSignupProduct;
		public function RenderProductName(FormProduct $objProduct) {
			$this->objSignupProduct = SignupProduct::LoadBySignupEntryIdFormProductId($this->mctSignupEntry->SignupEntry->Id, $objProduct->Id);
			
			$objStyle = new QDataGridRowStyle();
			if ($this->objSignupProduct) {
				$objStyle->FontBold = true;
			} else {
				$objStyle->ForeColor = '#999';
			}
			$this->dtgFormProducts->OverrideRowStyle($this->dtgFormProducts->CurrentRowIndex, $objStyle);
			
			return QApplication::HtmlEntities($objProduct->Name);
		}

		public function RenderProductQuantity(FormProduct $objProduct) {
			if (!$this->objSignupProduct) return (sprintf('<a href="#" style="color: #999; font-size: 10px;" %s>Not Purchased</a>', $this->pxyEditFormProduct->RenderAsEvents($objProduct->Id, false)));

			switch ($objProduct->FormProductTypeId) {
				case FormProductType::Required:
					return (sprintf('<a href="#" %s><img src="/assets/images/icons/tick.png" title="Purchased"/></a>', $this->pxyEditFormProduct->RenderAsEvents($objProduct->Id, false)));

				case FormProductType::RequiredWithChoice:
					return (sprintf('<a href="#" %s><img src="/assets/images/icons/tick.png" title="Purchased"/></a>', $this->pxyEditFormProduct->RenderAsEvents($objProduct->Id, false)));

				case FormProductType::Optional:
					return (sprintf('<a href="#" %s>%s</a>', $this->pxyEditFormProduct->RenderAsEvents($objProduct->Id, false), $this->objSignupProduct->Quantity));
			}
		}

		public function RenderPaymentAmount(SignupPayment $objPayment) {
			if ($objPayment->Id)
				return QApplication::DisplayCurrencyHtml($objPayment->Amount);
			else
				return QApplication::DisplayCurrencyHtml($this->mctSignupEntry->SignupEntry->RefreshAmounts());
		}

		public function RenderPaymentCode(SignupPayment $objPayment) {
			if ($objPayment->Id) {
				if ($objPayment->SignupPaymentTypeId == SignupPaymentType::CreditCard) {
					$strToReturn = QApplication::HtmlEntities($objPayment->TransactionDescription);
					$strToReturn .= '<br/><span class="detail">';
					if (strlen(trim($objPayment->FundingAccount)))
						$strToReturn .= sprintf('Funds <strong>Account [%s]</strong>', QApplication::HtmlEntities($objPayment->FundingAccount));
					else
						$strToReturn .= 'Funds <strong>UNSPECIFIED FUNDING ACCOUNT</strong>';
					if ($objPayment->AmountDonation) $strToReturn .= sprintf('<br/> &nbsp; &nbsp; &bull; Amount of Donation: <strong>%s</strong>', QApplication::DisplayCurrency($objPayment->AmountDonation));
					if ($objPayment->AmountNonDonation) $strToReturn .= sprintf('<br/> &nbsp; &nbsp; &bull; Amount of Non-Donation: <strong>%s</strong>', QApplication::DisplayCurrency($objPayment->AmountNonDonation));
					$strToReturn .= '</span>';
					return $strToReturn;
				} else {
					return QApplication::HtmlEntities($objPayment->TransactionDescription);
				}
			} else
				return '<strong>BALANCE REMAINING</strong>';
		}

		public function RenderProductCost(FormProduct $objProduct) {
			if (!$this->objSignupProduct) return null;
			return QApplication::DisplayCurrency($this->objSignupProduct->TotalAmount);
		}
		
		protected function dlgEdit_Create() {
			// DIalog box stuff
			$this->dlgEdit = new QDialogBox($this);
			$this->dlgEdit->HideDialogBox();
			$this->dlgEdit->MatteClickable = false;
			
			$this->txtTextArea = new QTextBox($this->dlgEdit);
			$this->txtTextArea->TextMode = QTextMode::MultiLine;

			$this->txtTextbox = new QTextBox($this->dlgEdit);
			$this->lstListbox = new QListBox($this->dlgEdit);
			$this->txtInteger = new QIntegerTextBox($this->dlgEdit);
			$this->txtFloat = new QFloatTextBox($this->dlgEdit);
			$this->chkBoolean = new QCheckBox($this->dlgEdit);
			$this->dtxDateValue = new QDateTimeTextBox($this->dlgEdit);
			$this->lblInstructions = new QLabel($this->dlgEdit);
			$this->lblInstructions->HtmlEntities = false;

			$this->btnSave = new QButton($this->dlgEdit);
			$this->btnSave->Text = 'Save';
			$this->btnSave->CssClass = 'primary';
			$this->btnSave->CausesValidation = QCausesValidation::SiblingsAndChildren;
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));

			$this->btnCancel = new QLinkButton($this->dlgEdit);
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->CssClass = 'cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
			$this->btnCancel->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->btnDelete = new QLinkButton($this->dlgEdit);
			$this->btnDelete->Text = 'Delete';
			$this->btnDelete->CssClass = 'delete';
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction('Are you SURE you want to delete this?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
			$this->btnDelete->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function dtgFormQuestions_Bind() {
			$this->dtgFormQuestions->DataSource = $this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber));
		}

		protected function dtgFormProducts_Bind() {
			$this->dtgFormProducts->DataSource = $this->objSignupForm->GetFormProductArray(QQ::OrderBy(QQN::FormProduct()->FormProductTypeId, QQN::FormProduct()->OrderNumber));
		}

		protected function dtgPayments_Bind() {
			$this->dtgPayments->MetaDataBinder(QQ::Equal(QQN::SignupPayment()->SignupEntryId, $this->mctSignupEntry->SignupEntry->Id));
			$objDataSource = $this->dtgPayments->DataSource;
			$objDataSource[] = new SignupPayment();
			$this->dtgPayments->DataSource = $objDataSource;
		}

		public function ResetDialogControls() {
			$this->txtTextArea->Required = false;
			$this->txtTextbox->Required = false;
			$this->txtTextbox->Enabled = true;
			$this->lstListbox->Required = false;
			$this->txtInteger->Required = false;
			$this->txtFloat->Required = false;
			$this->chkBoolean->Required = false;
			$this->dtxDateValue->Required = false;

			$this->lstListbox->SelectionMode = QSelectionMode::Single;
			$this->lstListbox->Height = null;
			$this->lstListbox->Width = null;
			$this->lstListbox->RemoveAllActions(QChangeEvent::EventName);
			$this->lstListbox->RemoveAllItems();

			$this->txtTextbox->RemoveAllActions(QEnterKeyEvent::EventName);
			$this->txtTextbox->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtTextbox->Instructions = null;		

			$this->txtFloat->RemoveAllActions(QEnterKeyEvent::EventName);
			$this->txtFloat->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtFloat->Instructions = null;		

			$this->txtInteger->RemoveAllActions(QEnterKeyEvent::EventName);
			$this->txtInteger->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtInteger->Instructions = null;		
		}

		public function RenderResponse(FormQuestion $objFormQuestion) {
			$objFormAnswer = FormAnswer::LoadBySignupEntryIdFormQuestionId($this->mctSignupEntry->SignupEntry->Id, $objFormQuestion->Id);
			$strToReturn = null;

			/**
			 * @var Person
			 */
			$objPerson = $this->mctSignupEntry->SignupEntry->Person;

			if ($objFormAnswer) {
				switch ($objFormQuestion->FormQuestionTypeId) {
					case FormQuestionType::YesNo:
						if ($objFormAnswer->BooleanValue === true) $strToReturn = 'Yes';
						if ($objFormAnswer->BooleanValue === false) $strToReturn = 'No';
						break;

					case FormQuestionType::Address:
						if ($objFormAnswer->Address) $strToReturn = $objFormAnswer->Address->AddressShortLine;
						break;

					case FormQuestionType::Phone:
						if ($objFormAnswer->Phone) $strToReturn = $objFormAnswer->Phone->Number;
						break;

					case FormQuestionType::Email:
						if ($objFormAnswer->Email) $strToReturn = $objFormAnswer->Email->Address;
						break;

					case FormQuestionType::Gender:
						switch ($objPerson->Gender) {
							case 'M':
								$strToReturn = 'Male';
								break;
							case 'F':
								$strToReturn = 'Female';
								break;
						}
						break;

					case FormQuestionType::SpouseName:
					case FormQuestionType::ShortText:
					case FormQuestionType::LongText:
					case FormQuestionType::SingleSelect:
					case FormQuestionType::MultipleSelect:
						$strToReturn = nl2br(QApplication::HtmlEntities(trim($objFormAnswer->TextValue)), true);
						break;

					case FormQuestionType::Number:
						$strToReturn = $objFormAnswer->IntegerValue;
						break;
						
					case FormQuestionType::Age:
						$strToReturn = $objPerson->Age;
						break;

					case FormQuestionType::DateofBirth:
						if ($objPerson->DateOfBirth) $strToReturn = $objPerson->DateOfBirth->ToString('MMM D YYYY');
						break;
				}
			}

			if (strlen($strToReturn)) {
				// If we are here, nothing was answered!
				return (sprintf('<a href="#" style="font-weight: bold;" %s>%s</a>', $this->pxyEditFormQuestion->RenderAsEvents($objFormQuestion->Id, false), $strToReturn));
			} else {
				// If we are here, nothing was answered!
				return (sprintf('<a href="#" style="color: #999; font-size: 10px;" %s>Not Answered</a>', $this->pxyEditFormQuestion->RenderAsEvents($objFormQuestion->Id, false)));
			}
		}

		protected function pxyEditClassGrade_Click() {
			$this->dlgEdit->ShowDialogBox();
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEditResult_ClassGrade.tpl.php';
			$this->intEditTag = self::EditTagClassGrade;
			$this->btnDelete->Visible = false;
			
			// Reset
			$this->ResetDialogControls();

			$this->lstListbox = $this->mctClassRegistration->lstClassGrade_Create();
		}

		protected $objClassAttendance;
		protected function pxyEditClassAttendance_Click($strFormId, $strControlId, $strParameter) {
			$this->objClassAttendance = ClassAttendence::LoadByClassRegistrationIdMeetingNumber($this->mctClassRegistration->ClassRegistration->SignupEntryId, $strParameter);
			
			$this->dlgEdit->ShowDialogBox();
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEditResult_ClassAttendance.tpl.php';
			$this->intEditTag = self::EditTagClassAttendance;
			$this->btnDelete->Visible = false;
			
			// Reset
			$this->ResetDialogControls();
			
			$this->lstListbox->Name = 'Attendance Entry';
			$this->lstListbox->AddItem('- Not Specified -', null, is_null($this->objClassAttendance->PresentFlag));
			$this->lstListbox->AddItem('Present', true, $this->objClassAttendance->PresentFlag === true);
			$this->lstListbox->AddItem('Not Present', false, $this->objClassAttendance->PresentFlag === false);
		}

		protected function pxyEditFormProduct_Click($strFormId, $strControlId, $strParameter) {
			$objFormProduct = FormProduct::Load($strParameter);
			if ($objFormProduct->SignupFormId != $this->objSignupForm->Id) return;
			

			/**
			 * @var SignupEntry
			 */
			$objSignupEntry = $this->mctSignupEntry->SignupEntry;
			/**
			 * @var Person
			 */
			$objPerson = $this->mctSignupEntry->SignupEntry->Person;
			
			$this->dlgEdit->ShowDialogBox();
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEditResult_SignupProduct.tpl.php';
			$this->intEditTag = self::EditTagProduct;

			$this->objSignupProduct = SignupProduct::LoadBySignupEntryIdFormProductId($objSignupEntry->Id, $objFormProduct->Id);

			if (!$this->objSignupProduct) {
				$this->objSignupProduct = new SignupProduct();
				$this->objSignupProduct->SignupEntryId = $objSignupEntry->Id;
				$this->objSignupProduct->FormProductId = $objFormProduct->Id;
				$this->objSignupProduct->Amount = $objFormProduct->Cost;
				$this->objSignupProduct->Deposit = $objFormProduct->Deposit;
				$this->objSignupProduct->Quantity = $objFormProduct->MinimumQuantity;
				$this->btnDelete->Visible = false;
			} else {
				$this->btnDelete->Visible = true;
			}
			
			// Reset
			$this->ResetDialogControls();

			$this->lstListbox->Name = 'Quantity';
			for ($i = $objFormProduct->MinimumQuantity; $i <= $objFormProduct->MaximumQuantity; $i++)
				$this->lstListbox->AddItem($i, $i, $i == $this->objSignupProduct->Quantity);
			$this->txtFloat->Name = 'Cost per Item';
			$this->txtFloat->Text = $this->objSignupProduct->Amount;		
		}

		protected function lstAddPayment_Change($strFormId, $strControlId, $strParameter) {
			if ($this->lstAddPayment->SelectedValue) {
				$this->objPayment = new SignupPayment();
				$this->objPayment->SignupPaymentTypeId = $this->lstAddPayment->SelectedValue;
				$this->objPayment->SignupEntry = $this->mctSignupEntry->SignupEntry;
				$this->PaymentDialogBox();
			}
		}

		/**
		 * @var SignupPayment
		 */
		protected $objPayment;
		protected function PaymentDialogBox() {
			$this->dlgEdit->ShowDialogBox();
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEditResult_Payment.tpl.php';
			$this->intEditTag = self::EditTagPayment;

			// Reset
			$this->ResetDialogControls();

			if (!$this->objPayment->Id) $this->btnDelete->Visible = false;
			
			$this->txtFloat->Name = 'Amount';
			$this->txtFloat->Required = true;
			$this->txtFloat->Minimum = 0;
			$this->txtFloat->Maximum = null;
			
			$this->txtTextbox->Text = null;
			$this->txtFloat->Text = null;

			// Setup the appropriate control
			switch ($this->objPayment->SignupPaymentTypeId) {
				case SignupPaymentType::Cash:
					$this->txtTextbox->Name = 'Note';
					break;
				case SignupPaymentType::Check:
					$this->txtTextbox->Name = 'Check Number';
					$this->txtTextbox->Required = true;
					break;
				case SignupPaymentType::CreditCard:
					$this->txtTextbox->Name = 'Transaction Confirmation';
					$this->txtTextbox->Required = true;
					break;
				case SignupPaymentType::Discount:
					$this->txtTextbox->Name = 'Note / Reason';
					$this->txtTextbox->Required = true;
					break;
				case SignupPaymentType::Other:
					$this->txtTextbox->Name = 'Note';
					break;
				case SignupPaymentType::Refund:
					$this->txtTextbox->Name = 'Note';
					$this->txtTextbox->Required = true;
					$this->txtFloat->Maximum = 0;
					$this->txtFloat->Minimum = null;
					break;
				case SignupPaymentType::Scholarship:
					$this->txtTextbox->Name = 'Note / Reason';
					$this->txtTextbox->Required = true;
					break;
				case SignupPaymentType::Transfer:
					$this->txtTextbox->Name = 'Note';
					$this->txtFloat->Maximum = 0;
					$this->txtFloat->Minimum = null;
					$this->lstListbox->Name = 'Transfer To';
					foreach ($this->mctSignupEntry->SignupEntry->SignupForm->GetSignupEntryArray(QQ::OrderBy(QQN::SignupEntry()->Person->LastName, QQN::SignupEntry()->Person->FirstName)) as $objSignupEntry) {
						$this->lstListbox->AddItem($objSignupEntry->Person->Name, $objSignupEntry->Id);
					}
					$this->lstListbox->Required = true;
					break;
			}
		}

		protected function pxyEditFormQuestion_Click($strFormId, $strControlId, $strParameter) {
			$objFormQuestion = FormQuestion::Load($strParameter);
			if ($objFormQuestion->SignupFormId != $this->objSignupForm->Id) return;

			/**
			 * @var SignupEntry
			 */
			$objSignupEntry = $this->mctSignupEntry->SignupEntry;
			/**
			 * @var Person
			 */
			$objPerson = $this->mctSignupEntry->SignupEntry->Person;
			
			$this->dlgEdit->ShowDialogBox();
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEditResult_FormAnswer.tpl.php';
			$this->intEditTag = self::EditTagAnswer;
			$this->objAnswer = FormAnswer::LoadBySignupEntryIdFormQuestionId($objSignupEntry->Id, $objFormQuestion->Id);
			if (!$this->objAnswer) {
				$this->objAnswer = new FormAnswer();
				$this->objAnswer->SignupEntryId = $objSignupEntry->Id;
				$this->objAnswer->FormQuestionId = $objFormQuestion->Id;
				$this->btnDelete->Visible = false;
			} else {
				$this->btnDelete->Visible = true;
			}

			// Reset
			$this->ResetDialogControls();

			// Setup the appropriate control
			switch ($objFormQuestion->FormQuestionTypeId) {
				case FormQuestionType::YesNo:
					$this->chkBoolean->Name = 'Response';
					$this->chkBoolean->Checked = $this->objAnswer->BooleanValue;
					$this->chkBoolean->Text = $objFormQuestion->ShortDescription;
					break;

				case FormQuestionType::SpouseName:
					$this->txtTextbox->Name = 'Spouse\'s Name';
					$this->txtTextbox->Text = $this->objAnswer->TextValue;
					$this->txtTextbox->Focus();
					break;

				case FormQuestionType::Address:
					$objAddresses = array();
					foreach ($objPerson->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
						foreach ($objHouseholdParticipation->Household->GetAddressArray() as $objAddress)
							if ($objAddress->CurrentFlag) $objAddresses[$objAddress->Id] = $objAddress;
					}
					foreach (Address::LoadArrayByPersonId($objPerson->Id) as $objAddress) {
						if ($objAddress->CurrentFlag) $objAddresses[$objAddress->Id] = $objAddress;
					}
					$this->lstListbox->RemoveAllItems();
					foreach ($objAddresses as $objAddress) {
						$this->lstListbox->AddItem(
							sprintf('%s (%s)', $objAddress->Label, $objAddress->AddressShortLine),
								$objAddress->Id,
								$objAddress->Id == $this->objAnswer->AddressId);
					}
					$this->lstListbox->Name = $objFormQuestion->ShortDescription;
					
					$this->lblInstructions->Text = sprintf(
						'If you need to specify an address that is not listed, you will need to <a href="%s">Update this person\'s Contact Info</a>.',
						$objPerson->ContactInfoLinkUrl);
					break;

				case FormQuestionType::Gender:
					$this->lstListbox->RemoveAllItems();
					$this->lstListbox->AddItem('Male', true, $objPerson->Gender == 'M');
					$this->lstListbox->AddItem('Female', false, $objPerson->Gender == 'F');
					$this->lstListbox->Name = 'Gender';
					
					$this->lblInstructions->Text = 'Please note that updating the Gender value here will also update this person\'s record in NOAH.';
					break;

				case FormQuestionType::Phone:
					$objPhones = array();
					foreach ($objPerson->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
						foreach ($objHouseholdParticipation->Household->GetAddressArray() as $objAddress) {
							foreach ($objAddress->GetPhoneArray() as $objPhone) {
								$objPhones[] = $objPhone;
							}
						}
					}
					foreach ($objPerson->GetPhoneArray() as $objPhone) $objPhones[] = $objPhone;

					$this->lstListbox->RemoveAllItems();
					foreach ($objPhones as $objPhone) {
						$this->lstListbox->AddItem(
							sprintf('%s (%s)', $objPhone->Number, $objPhone->Label),
							$objPhone->Id,
							$objPhone->Id == $this->objAnswer->PhoneId);
					}
					$this->lstListbox->Name = $objFormQuestion->ShortDescription;
					$this->lblInstructions->Text = sprintf(
						'If you need to specify a phone number that is not listed, you will need to <a href="%s">Update this person\'s Contact Info</a>.',
						$objPerson->ContactInfoLinkUrl);
					break;

				case FormQuestionType::Email:
					$this->lstListbox->RemoveAllItems();
					foreach ($objPerson->GetEmailArray() as $objEmail) {
						$this->lstListbox->AddItem(
							$objEmail->Label,
							$objEmail->Id,
							$objEmail->Id == $this->objAnswer->EmailId);
					}
					$this->lstListbox->Name = $objFormQuestion->ShortDescription;
					$this->lblInstructions->Text = sprintf(
						'If you need to specify an email address that is not listed, you will need to <a href="%s">Update this person\'s Contact Info</a>.',
						$objPerson->ContactInfoLinkUrl);
					break;

				case FormQuestionType::ShortText:
					$this->txtTextbox->Text = $this->objAnswer->TextValue;
					$this->txtTextbox->Name = $objFormQuestion->ShortDescription;
					break;

				case FormQuestionType::LongText:
					$this->txtTextArea->Text = $this->objAnswer->TextValue;
					$this->txtTextArea->Name = $objFormQuestion->ShortDescription;
					break;

				case FormQuestionType::SingleSelect:
					$this->lstListbox->RemoveAllItems();
					$this->lstListbox->Name = $objFormQuestion->ShortDescription;
					foreach (explode("\n", $objFormQuestion->Options) as $strOption) {
						$strOption = trim($strOption);
						$this->lstListbox->AddItem($strOption, $strOption, trim($this->objAnswer->TextValue) == $strOption);
					}
					if ($objFormQuestion->AllowOtherFlag) {
						$this->txtTextbox->Name = 'Other...';
						if (!$this->lstListbox->SelectedValue && strlen(trim($this->objAnswer->TextValue))) {
							$blnOtherSelected = true;
							$this->txtTextbox->Text = trim($this->objAnswer->TextValue);
						} else {
							$blnOtherSelected = false;
						}
						
						$this->txtTextbox->Enabled = $blnOtherSelected;
						$this->lstListbox->AddItem('- Other... -', false, $blnOtherSelected);
						$this->lstListbox->AddAction(new QChangeEvent(), new QAjaxAction('lstListbox_Change'));
						$this->lstListbox_Change();
					}
					break;

				case FormQuestionType::MultipleSelect:
					$this->lstListbox->SelectionMode = QSelectionMode::Multiple;
					$this->lstListbox->Height = '100px';
					$this->lstListbox->Width = '200px';
					$this->lstListbox->RemoveAllItems();
					$this->lstListbox->Name = $objFormQuestion->ShortDescription;
					
					// Get the answers
					$strAnswerArray = $this->objAnswer->GetSelectedMultipleChoiceArray();
					foreach ($objFormQuestion->GetOptionsAsArray() as $strOption) {
						if (array_key_exists($strOption, $strAnswerArray)) {
							$blnSelected = true;
							unset($strAnswerArray[$strOption]);
						} else
							$blnSelected = false;
						$this->lstListbox->AddItem($strOption, $strOption, $blnSelected);
					}
					
					// Add "others" for any remaining answers
					foreach ($strAnswerArray as $strAnswer)
						$this->lstListbox->AddItem($strAnswer, $strAnswer, true);
						
					// Are we allowing "others"?
					if ($objFormQuestion->AllowOtherFlag) {
						$this->txtTextbox->Name = 'Other...';
						$this->txtTextbox->Text = null;
						$this->txtTextbox->RemoveAllActions(QEnterKeyEvent::EventName);
						$this->txtTextbox->AddAction(new QEnterKeyEvent(), new QAjaxAction('txtTextbox_EnterKey'));
						$this->txtTextbox->AddAction(new QEnterKeyEvent(), new QTerminateAction());
						$this->txtTextbox->Instructions = 'Type in a value and hit <strong>return</strong> to add it to the list';
					}
					break;

				case FormQuestionType::Number:
					$this->txtInteger->Text = $this->objAnswer->IntegerValue;
					$this->txtInteger->Name = $objFormQuestion->ShortDescription;
					break;

				case FormQuestionType::Age:
					$this->txtTextbox->Name = $objFormQuestion->ShortDescription;
					$this->txtTextbox->Text = $objPerson->Age;
					$this->txtTextbox->Enabled = false;
					$this->lblInstructions->Text = sprintf(
						'If you need modify the person\'s age, you will need to <a href="%s">update this person\'s NOAH information</a>.',
						$objPerson->LinkUrl);
					break;

				case FormQuestionType::DateofBirth:
					$this->txtTextbox->Name = $objFormQuestion->ShortDescription;
					$this->txtTextbox->Text = ($objPerson->DateOfBirth ? $objPerson->DateOfBirth->ToString('MMM D YYYY') : null);
					$this->txtTextbox->Enabled = false;
					$this->lblInstructions->Text = sprintf(
						'If you need modify the person\'s date of birth, you will need to <a href="%s">update this person\'s NOAH information</a>.',
						$objPerson->LinkUrl);
					break;
			}
		}

		protected function txtTextbox_EnterKey() {
			$strText = trim($this->txtTextbox->Text);
			if (strlen($strText))
				$this->lstListbox->AddItem($strText, $strText, true);
			$this->txtTextbox->Text = null;
		}

		protected function lstListbox_Change() {
			if ($this->lstListbox->SelectedValue === false) {
				$this->txtTextbox->Enabled = true;
				$this->txtTextbox->Required = true;
				$this->txtTextbox->Focus();
			} else {
				$this->txtTextbox->Enabled = false;
				$this->txtTextbox->Required = false;
				$this->txtTextbox->Text = null;
			}
		}

		protected function btnToggleStatus_Click() {
			$this->ResetDialogControls();

			$this->dlgEdit->ShowDialogBox();
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEditResult_Status.tpl.php';

			foreach (SignupEntryStatusType::$NameArray as $intId => $strName)
				$this->lstListbox->AddItem($strName, $intId, $intId == $this->mctSignupEntry->SignupEntry->SignupEntryStatusTypeId);
			$this->intEditTag = self::EditTagStatus;
		}

		protected function btnEditNote_Click() {
			$this->ResetDialogControls();

			$this->dlgEdit->ShowDialogBox();
			$this->dlgEdit->Template = dirname(__FILE__) . '/dlgEditResult_InternalNote.tpl.php';
			$this->txtTextArea->Text = trim($this->mctSignupEntry->SignupEntry->InternalNotes);
			$this->txtTextArea->Focus();
			$this->intEditTag = self::EditTagNote;
		}

		protected function btnDelete_Click() {
			if (!$this->intEditTag) $this->btnCancel_Click();
			
			switch ($this->intEditTag) {
				case self::EditTagNote:
				case self::EditTagStatus:
					break;
				case self::EditTagPayment:
					break;
				case self::EditTagAnswer:
					$this->objAnswer->Delete();
					$this->dtgFormQuestions->Refresh();
					break;
				case self::EditTagProduct:
					$this->objSignupProduct->Delete();
					$this->dtgFormProducts->Refresh();
					break;
			}

			$this->btnCancel_Click();
		}

		protected function btnSave_Click() {
			if (!$this->intEditTag) $this->btnCancel_Click();
			
			switch ($this->intEditTag) {
				case self::EditTagPayment:
					if (!$this->PerformPaymentSave()) return;
					$this->dtgPayments->Refresh();
					break;
				case self::EditTagNote:
					$this->mctSignupEntry->SignupEntry->InternalNotes = trim($this->txtTextArea->Text);
					$this->mctSignupEntry->SaveSignupEntry();
					$this->mctSignupEntry->lblInternalNotes_Refresh();
					break;
				case self::EditTagStatus:
					$this->mctSignupEntry->SignupEntry->SignupEntryStatusTypeId = $this->lstListbox->SelectedValue;
					$this->mctSignupEntry->SaveSignupEntry();
					$this->mctSignupEntry->lblSignupEntryStatusTypeId_Refresh();
					break;
				case self::EditTagAnswer:
					if (!$this->PerformFormAnswerSave()) return;
					$this->dtgFormQuestions->Refresh();
					break;
				case self::EditTagProduct;
					if (!$this->PerformSignupProductSave()) return;
					$this->dtgFormProducts->Refresh();
					$this->dtgPayments->Refresh();
					break;
				case self::EditTagClassAttendance:
					$this->objClassAttendance->PresentFlag = $this->lstListbox->SelectedValue;
					$this->objClassAttendance->Save();
					$this->dtgClassAttendance->Refresh();
					break;
				case self::EditTagClassGrade:
					$this->mctClassRegistration->SaveClassRegistration();
					$this->dtgClassGrade->Refresh();
					break;
			}

			$this->btnCancel_Click();
		}
		
		/**
		 * @return boolean whether or not the save was successful
		 */
		protected function PerformSignupProductSave() {
			/**
			 * @var SignupEntry
			 */
			$objSignupEntry = $this->mctSignupEntry->SignupEntry;

			/**
			 * @var FormProduct
			 */
			$objFormProduct =  $this->objSignupProduct->FormProduct;

			// Delete the "other" required w/ choice items if we are switching it
			if ($objFormProduct->FormProductTypeId == FormProductType::RequiredWithChoice) {
				foreach ($objSignupEntry->GetSignupProductArray() as $objSignupProduct) {
					if (($objSignupProduct->FormProduct->FormProductTypeId == FormProductType::RequiredWithChoice) &&
						($objSignupProduct->Id != $this->objSignupProduct->Id))
						$objSignupProduct->Delete();
				}
			}

			$this->objSignupProduct->Quantity = $this->lstListbox->SelectedValue;
			$this->objSignupProduct->Amount = $this->txtFloat->Text;
			$this->objSignupProduct->Save();
			
			return true;
		}

		/**
		 * @return boolean whether or not the save was successful
		 */
		protected function PerformPaymentSave() {
			if (!$this->objPayment->TransactionDate) $this->objPayment->TransactionDate = QDateTime::Now();
			$this->objPayment->TransactionDescription = trim($this->txtTextbox->Text);
			$this->objPayment->Amount = $this->txtFloat->Text;
			$this->objPayment->Save();
			return true;
		}

		/**
		 * @return boolean whether or not the save was successful
		 */
		protected function PerformFormAnswerSave() {
			/**
			 * @var FormQuestion
			 */
			$objFormQuestion = $this->objAnswer->FormQuestion;

			/**
			 * @var SignupEntry
			 */
			$objSignupEntry = $this->mctSignupEntry->SignupEntry;

			/**
			 * @var Person
			 */
			$objPerson = $this->mctSignupEntry->SignupEntry->Person;

			// Save based on the type of question
			switch ($objFormQuestion->FormQuestionTypeId) {
				case FormQuestionType::YesNo:
					$this->objAnswer->BooleanValue = $this->chkBoolean->Checked;
					break;

				case FormQuestionType::SpouseName:
					$this->objAnswer->TextValue = trim($this->txtTextbox->Text);
					break;

				case FormQuestionType::Address:
					$this->objAnswer->AddressId = $this->lstListbox->SelectedValue;
					$this->objAnswer->TextValue = $this->objAnswer->Address->AddressShortLine;
					break;

				case FormQuestionType::Gender:
					if ($this->lstListbox->SelectedValue) {
						$objPerson->Gender = 'M';
					} else {
						$objPerson->Gender = 'F';
					}
					$objPerson->Save();

					switch ($objPerson->Gender) {
						case 'M':
							$this->objAnswer->TextValue = 'Male';
							break;
						case 'F':
							$this->objAnswer->TextValue = 'Female';
							break;
						default:
							$this->objAnswer = null;
					}
					break;

				case FormQuestionType::Phone:
					$this->objAnswer->PhoneId = $this->lstListbox->SelectedValue;
					$this->objAnswer->TextValue = $this->objAnswer->Phone->Number;
					break;

				case FormQuestionType::Email:
					$this->objAnswer->EmailId = $this->lstListbox->SelectedValue;
					$this->objAnswer->TextValue = $this->objAnswer->Email->Address;
					break;

				case FormQuestionType::ShortText:
					$this->objAnswer->TextValue = trim($this->txtTextbox->Text);
					break;

				case FormQuestionType::LongText:
					$this->objAnswer->TextValue = trim($this->txtTextArea->Text);
					break;

				case FormQuestionType::SingleSelect:
					if ($this->lstListbox->SelectedValue === false)
						$this->objAnswer->TextValue = trim($this->txtTextbox->Text);
					else
						$this->objAnswer->TextValue = $this->lstListbox->SelectedValue; 
					break;

				case FormQuestionType::MultipleSelect:
					$strArray = array();
					foreach ($this->lstListbox->SelectedValues as $strValue) {
						$strArray[] = trim($strValue);
					}
					$this->objAnswer->TextValue = implode("\n", $strArray);
					break;

				case FormQuestionType::Number:
					$this->objAnswer->IntegerValue = $this->txtInteger->Text;
					break;

				case FormQuestionType::Age:
					$this->objAnswer->IntegerValue = $objPerson->Age;
					break;

				case FormQuestionType::DateofBirth:
					$this->objAnswer->DateValue = $objPerson->DateOfBirth;
					break;
			}

			if ($this->objAnswer) {
				$this->objAnswer->Save();
				$this->objAnswer = null;
			}
			
			return true;
		}

		protected function btnCancel_Click() {
			$this->intEditTag = null;
			$this->dlgEdit->HideDialogBox();
			$this->dlgEdit->Template = null;
		}
	}

	ViewSignupForm::Run('ViewSignupForm');
?>