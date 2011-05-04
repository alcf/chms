<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class SearchGroupsForm extends ChmsForm {
		protected $strPageTitle = 'Events and Signups - ';
		protected $intNavSectionId = ChmsForm::NavSectionEvents;

		/**
		 * @var SignupForm
		 */
		protected $objSignupForm;
		protected $mctSignupForm;

		protected $dtgSignupEntries;
		protected $dtgQuestions;
		protected $cblColumns;

		protected $dtgProductsArray;
		
		protected $pxyMoveUpQuestion;
		protected $pxyMoveDownQuestion;
		protected $lstCreateNewQuestion;
		
		protected $pxyMoveUpProduct;
		protected $pxyMoveDownProduct;
		protected $lstCreateNewProduct;
		
		protected $lblName;
		protected $lblSignupUrl;
		protected $lblInformationUrl;
		protected $lblActive;
		protected $lblConfidential;
		protected $lblDescription;
		protected $lblAllowOtherFlag;
		protected $lblAllowMultipleFlag;
		protected $lblLimitInfo;
		protected $lblDateCreated;

		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			if (!$this->objSignupForm) QApplication::Redirect('/events/');
			$this->mctSignupForm = SignupFormMetaControl::Create($this, $this->objSignupForm->Id);

			if (!$this->objSignupForm->IsLoginCanView(QApplication::$Login)) {
				QApplication::Redirect('/events/');
			}
			
			$this->strPageTitle .= $this->objSignupForm->Name;

			$this->dtgSignupEntries = new SignupEntryDataGrid($this);
			$this->dtgSignupEntries->CssClass = 'datagrid';
			$this->dtgSignupEntries->SetDataBinder('dtgSignupEntries_Bind');
			$this->dtgSignupEntries->Paginator = new QPaginator($this->dtgSignupEntries);
			$this->dtgSignupEntries->SortColumnIndex = 1;
			$this->dtgSignupEntries->FontSize = '10px';

			$this->dtgQuestions = new FormQuestionDataGrid($this);
			$this->dtgQuestions->AddColumn(new QDataGridColumn('Reorder', '<?= $_FORM->RenderReorderQuestion($_ITEM); ?>', 'HtmlEntities=false', 'Width=60px'));
			$this->dtgQuestions->MetaAddTypeColumn('FormQuestionTypeId', 'FormQuestionType', 'Name=Question Type', 'Width=180px');
			$this->dtgQuestions->MetaAddColumn('ShortDescription', 'Html=<?= $_FORM->RenderShortDescription($_ITEM); ?>', 'Width=200px', 'HtmlEntities=false');
			$this->dtgQuestions->MetaAddColumn('Question', 'Width=400px');
			$this->dtgQuestions->MetaAddColumn('RequiredFlag', 'Width=60px', 'Name=Required?', 'Html=<?= ($_ITEM->RequiredFlag ? "Yes" : null) ?>');
			$this->dtgQuestions->SetDataBinder('dtgQuestions_Bind');
			
			$this->dtgProductsArray = array();
			foreach (FormProductType::$NameArray as $intFormProductTypeId => $strName) {
				if (FormProduct::CountBySignupFormIdFormProductTypeId($this->objSignupForm->Id, $intFormProductTypeId)) {
					$dtgProducts = new FormProductDataGrid($this);
					$dtgProducts->ActionParameter = $intFormProductTypeId;
					$dtgProducts->SetDataBinder('dtgProducts_Bind');

					$dtgProducts->AddColumn(new QDataGridColumn('Reorder', '<?= $_FORM->RenderReorderProduct($_ITEM, $_CONTROL); ?>', 'HtmlEntities=false', 'Width=60px'));
					$dtgProducts->MetaAddColumn('Name', 'Html=<?= $_FORM->RenderName($_ITEM); ?>', 'Width=200px', 'HtmlEntities=false');
					
					$this->dtgProductsArray[] = $dtgProducts;
				}
			}
			
			if ($this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) {
				$this->lstCreateNewQuestion = new QListBox($this);
				$this->lstCreateNewQuestion->AddItem('- Create New Question -', null);
				foreach (FormQuestionType::$NameArray as $intId => $strName)
					$this->lstCreateNewQuestion->AddItem($strName, $intId);
				$this->lstCreateNewQuestion->AddAction(new QClickEvent(), new QAjaxAction('lstCreateNewQuestion_Change'));

				$this->lstCreateNewProduct = new QListBox($this);
				$this->lstCreateNewProduct->AddItem('- Create New Product -', null);
				foreach (FormProductType::$NameArray as $intId => $strName)
					$this->lstCreateNewProduct->AddItem($strName, $intId);
				$this->lstCreateNewProduct->AddAction(new QClickEvent(), new QAjaxAction('lstCreateNewProduct_Change'));
			}

			$this->cblColumns = new QCheckBoxList($this);
			$this->cblColumns->HtmlEntities = false;
			$this->cblColumns->AddAction(new QClickEvent(), new QAjaxAction('cblColumns_Click'));
			foreach ($this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber)) as $objFormQuestion) {
				if ($objFormQuestion->RequiredFlag)
					$strDescription = '<strong>' . QApplication::HtmlEntities($objFormQuestion->ShortDescription) . '</strong>';
				else
					$strDescription = QApplication::HtmlEntities($objFormQuestion->ShortDescription);
				$this->cblColumns->AddItem($strDescription, $objFormQuestion->Id, $objFormQuestion->ViewFlag);
			}
			
			// Setup dtgSignups
			$this->dtgSignupEntries_SetupColumns();
			
			// Setup "About Event" label controls
			$this->SetupLabels();
			switch ($this->objSignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					$this->SetupLabelsForEvent();
					break;
			}

			$this->pxyMoveDownQuestion = new QControlProxy($this);
			$this->pxyMoveDownQuestion->AddAction(new QClickEvent(), new QAjaxAction('pxyMoveDownQuestion_Click'));
			$this->pxyMoveDownQuestion->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyMoveUpQuestion = new QControlProxy($this);
			$this->pxyMoveUpQuestion->AddAction(new QClickEvent(), new QAjaxAction('pxyMoveUpQuestion_Click'));
			$this->pxyMoveUpQuestion->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyMoveDownProduct = new QControlProxy($this);
			$this->pxyMoveDownProduct->AddAction(new QClickEvent(), new QAjaxAction('pxyMoveDownProduct_Click'));
			$this->pxyMoveDownProduct->AddAction(new QClickEvent(), new QTerminateAction());

			$this->pxyMoveUpProduct = new QControlProxy($this);
			$this->pxyMoveUpProduct->AddAction(new QClickEvent(), new QAjaxAction('pxyMoveUpProduct_Click'));
			$this->pxyMoveUpProduct->AddAction(new QClickEvent(), new QTerminateAction());
		}

		protected function SetupLabels() {
			$this->lblName = $this->mctSignupForm->lblName_Create();

			$this->lblSignupUrl = new QLabel($this);
			$this->lblSignupUrl->Name = 'Signup Web Address';
			$this->lblSignupUrl->Text = $this->objSignupForm->SignupUrl;

			$this->lblConfidential = new QLabel($this);
			$this->lblConfidential->Name = 'Confidential?';
			$this->lblConfidential->HtmlEntities = false;
			$this->lblConfidential->Text = '<img src="/assets/images/confidential.png"/>';
			$this->lblConfidential->Visible = $this->objSignupForm->ConfidentialFlag;

			$this->lblActive = new QLabel($this);
			$this->lblActive->Name = 'Active?';
			$this->lblActive->HtmlEntities = false;
			$this->lblActive->Text = '<img src="/assets/images/marker_inactive.png"/>';
			$this->lblActive->Visible = !$this->objSignupForm->ActiveFlag;

			$this->lblDescription = $this->mctSignupForm->lblDescription_Create();
			$this->lblDescription->Text = nl2br(QApplication::HtmlEntities($this->lblDescription->Text), true);
			$this->lblDescription->HtmlEntities = false;
			
			$this->lblInformationUrl = $this->mctSignupForm->lblInformationUrl_Create();
			if (!$this->lblInformationUrl->Text) $this->lblInformationUrl->Visible = false;
			$this->lblAllowMultipleFlag = $this->mctSignupForm->lblAllowMultipleFlag_Create();
			$this->lblAllowOtherFlag = $this->mctSignupForm->lblAllowOtherFlag_Create();
			$this->lblDateCreated = $this->mctSignupForm->lblDateCreated_Create();
			
			$this->lblLimitInfo = new QLabel($this);
			$this->lblLimitInfo->Name = 'Registration Capacity';
			$this->lblLimitInfo->HtmlEntities = false;
			$strArray = array();
			if (!is_null($this->objSignupForm->SignupLimit)) $strArray[] = 'Overall Capacity: ' . $this->objSignupForm->SignupLimit . ' Registrations';
			if (!is_null($this->objSignupForm->SignupFemaleLimit)) $strArray[] = 'Female Capacity: ' . $this->objSignupForm->SignupFemaleLimit . ' Registrations';
			if (!is_null($this->objSignupForm->SignupMaleLimit)) $strArray[] = 'Male Capacity: ' . $this->objSignupForm->SignupMaleLimit . ' Registrations';
			if (count($strArray))
				$this->lblLimitInfo->Text = implode(' &nbsp; - &nbsp; ', $strArray);
			else
				$this->lblLimitInfo->Text = 'None (unlimited)'; 
		}
		
		protected function SetupLabelsForEvent() {
			
		}

		public function RenderShortDescription(FormQuestion $objQuestion) {
			return sprintf('<a href="/events/question.php/%s/%s">%s</a>', $this->objSignupForm->Id, $objQuestion->Id, QApplication::HtmlEntities($objQuestion->ShortDescription));
		}

		public function RenderReorderQuestion(FormQuestion $objQuestion) {
			$strToReturn = null;

			if ($this->dtgQuestions->CurrentRowIndex == 0) {
				$strToReturn .= '<img src="/assets/images/spacer.png" style="width: 16px; height: 16px;"/>';
			} else {
				$strToReturn .= sprintf('<a href="#" %s><img src="/assets/images/icons/arrow_up.png" title="Move Up" style="width: 16px; height: 16px;"/></a>',
					$this->pxyMoveUpQuestion->RenderAsEvents($objQuestion->Id, false));
			}

			$strToReturn .= ' ';
			if ($this->dtgQuestions->CurrentRowIndex == (count($this->dtgQuestions->DataSource) - 1)) {
				$strToReturn .= '<img src="/assets/images/spacer.png" style="width: 16px; height: 16px;"/>';
			} else {
				$strToReturn .= sprintf('<a href="#" %s><img src="/assets/images/icons/arrow_down.png" title="Move Down" style="width: 16px; height: 16px;"/></a>',
					$this->pxyMoveDownQuestion->RenderAsEvents($objQuestion->Id, false));
			}
			
			return $strToReturn;
		}

		public function RenderReorderProduct(FormProduct $objProduct, FormProductDataGrid $dtgProducts) {
			$strToReturn = null;

			if ($dtgProducts->CurrentRowIndex == 0) {
				$strToReturn .= '<img src="/assets/images/spacer.png" style="width: 16px; height: 16px;"/>';
			} else {
				$strToReturn .= sprintf('<a href="#" %s><img src="/assets/images/icons/arrow_up.png" title="Move Up" style="width: 16px; height: 16px;"/></a>',
					$this->pxyMoveUpProduct->RenderAsEvents($objProduct->Id, false));
			}

			$strToReturn .= ' ';
			if ($dtgProducts->CurrentRowIndex == (count($dtgProducts->DataSource) - 1)) {
				$strToReturn .= '<img src="/assets/images/spacer.png" style="width: 16px; height: 16px;"/>';
			} else {
				$strToReturn .= sprintf('<a href="#" %s><img src="/assets/images/icons/arrow_down.png" title="Move Down" style="width: 16px; height: 16px;"/></a>',
					$this->pxyMoveDownProduct->RenderAsEvents($objProduct->Id, false));
			}
			
			return $strToReturn;
		}

		public function pxyMoveDownQuestion_Click($strFormId, $strControlId, $strParameter) {
			$objFormQuestion = FormQuestion::Load($strParameter);
			$objFormQuestion->MoveDown();
			$this->dtgQuestions->Refresh();
		}

		public function pxyMoveUpQuestion_Click($strFormId, $strControlId, $strParameter) {
			$objFormQuestion = FormQuestion::Load($strParameter);
			$objFormQuestion->MoveUp();
			$this->dtgQuestions->Refresh();
		}

		public function pxyMoveDownProduct_Click($strFormId, $strControlId, $strParameter) {
			$objFormProduct = FormProduct::Load($strParameter);
			$objFormProduct->MoveDown();
			foreach ($this->dtgProductsArray as $dtgProducts) $dtgProducts->Refresh();
		}

		public function pxyMoveUpProduct_Click($strFormId, $strControlId, $strParameter) {
			$objFormProduct = FormProduct::Load($strParameter);
			$objFormProduct->MoveUp();
			foreach ($this->dtgProductsArray as $dtgProducts) $dtgProducts->Refresh();
		}

		public function cblColumns_Click() {
			foreach ($this->cblColumns->GetAllItems() as $objItem) {
				$objQuestion = FormQuestion::Load($objItem->Value);
				$objQuestion->ViewFlag = $objItem->Selected;
				$objQuestion->Save();
			}
			$this->dtgSignupEntries_SetupColumns();
			$this->dtgSignupEntries->Refresh();
		}

		public function dtgSignupEntries_SetupColumns() {
			$this->dtgSignupEntries->RemoveAllColumns();
			$this->dtgSignupEntries->MetaAddColumn(QQN::SignupEntry()->Person->FirstName);
			$this->dtgSignupEntries->MetaAddColumn(QQN::SignupEntry()->Person->LastName);
			
			foreach ($this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber)) as $objFormQuestion) {
				if ($objFormQuestion->ViewFlag) {
					$this->dtgSignupEntries->AddColumn(new QDataGridColumn($objFormQuestion->ShortDescription, '<?= $_FORM->RenderAnswer($_ITEM, ' . $objFormQuestion->Id . ',' . $objFormQuestion->FormQuestionTypeId . '); ?>', 'HtmlEntities=false'));
				}
			}

			if ($this->objSignupForm->CountFormProducts()) {
				$this->dtgSignupEntries->MetaAddColumn(QQN::SignupEntry()->AmountPaid, 'Name=Paid', 'Html=<?= $_FORM->RenderAmount($_ITEM->AmountPaid); ?>');
				$this->dtgSignupEntries->MetaAddColumn(QQN::SignupEntry()->AmountBalance, 'Name=Balance', 'Html=<?= $_FORM->RenderAmount($_ITEM->AmountBalance); ?>');
			}
			
			$this->dtgSignupEntries->MetaAddColumn(QQN::SignupEntry()->DateSubmitted, 'Name=Submitted', 'Html=<?= $_ITEM->DateSubmitted ? $_ITEM->DateSubmitted->ToString("MMM D YYYY") : null; ?>');
		}

		public function RenderAmount($fltAmount) {
			return QApplication::DisplayCurrency($fltAmount);
		}

		public function RenderName(FormProduct $objProduct) {
			return sprintf('<a href="/events/product.php/%s/%s">%s</a>', $this->objSignupForm->Id, $objProduct->Id, QApplication::HtmlEntities($objProduct->Name));
		}

		public function RenderAnswer(SignupEntry $objSignupEntry, $intFormQuestionId, $intFormQuestionTypeId) {
			$objAnswer = FormAnswer::LoadBySignupEntryIdFormQuestionId($objSignupEntry->Id, $intFormQuestionId);
			if (!$objAnswer) return;

			switch ($intFormQuestionTypeId) {
				case FormQuestionType::YesNo:
					if ($objAnswer->BooleanValue) return 'Yes';
					break;

				case FormQuestionType::SpouseName:
				case FormQuestionType::Address:
				case FormQuestionType::Gender:
				case FormQuestionType::Phone:
				case FormQuestionType::Email:
				case FormQuestionType::ShortText:
				case FormQuestionType::LongText:
				case FormQuestionType::SingleSelect:
				case FormQuestionType::MultipleSelect:
					return QString::Truncate(QApplication::HtmlEntities($objAnswer->TextValue), 50);

				case FormQuestionType::Number:
				case FormQuestionType::Age:
					return $objAnswer->IntegerValue;

				case FormQuestionType::DateofBirth:
					if ($objAnswer->DateValue) return $objAnswer->DateValue->ToString('MMM D YYYY');
					break;
			}
		}
		
		public function dtgSignupEntries_Bind() {
			$this->dtgSignupEntries->MetaDataBinder(QQ::Equal(QQN::SignupEntry()->SignupFormId, $this->objSignupForm->Id));
		}

		public function dtgQuestions_Bind() {
			$this->dtgQuestions->DataSource = $this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber));
		}
		
		public function dtgProducts_Bind(QDataGrid $dtgProducts) {
			$intFormProductTypeId = $dtgProducts->ActionParameter;
			$dtgProducts->DataSource = FormProduct::LoadArrayBySignupFormIdFormProductTypeId($this->objSignupForm->Id, $intFormProductTypeId, QQ::OrderBy(QQN::FormProduct()->OrderNumber));
		}
		
		public function lstCreateNewQuestion_Change() {
			if ($this->lstCreateNewQuestion->SelectedValue) QApplication::Redirect(sprintf('/events/question.php/%s/0/%s', $this->objSignupForm->Id, $this->lstCreateNewQuestion->SelectedValue));
		}
		
		public function lstCreateNewProduct_Change() {
			if ($this->lstCreateNewProduct->SelectedValue) QApplication::Redirect(sprintf('/events/product.php/%s/0/%s', $this->objSignupForm->Id, $this->lstCreateNewProduct->SelectedValue));
		}
	}

	SearchGroupsForm::Run('SearchGroupsForm');
?>