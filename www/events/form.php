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

		protected $dtgQuestions;

		protected $dtgProductsArray;
		
		protected $pxyMoveUpQuestion;
		protected $pxyMoveDownQuestion;
		
		protected $pxyMoveUpProduct;
		protected $pxyMoveDownProduct;

		protected $lstCreateNew;

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
		protected $lblFundingAccount;
		protected $lblDonationStewardshipFund;
		
		protected $lblSupportEmail;
		protected $lblEmailNotification;

		protected $lblClassTerm;
		protected $lblClassCourse;
		protected $lblClassInstructor;

		protected $lblDateStart;
		protected $lblDateEnd;
		protected $lblLocation;

		protected $lblMeetsOn;

		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			if (!$this->objSignupForm) QApplication::Redirect('/events/');
			$this->mctSignupForm = SignupFormMetaControl::Create($this, $this->objSignupForm->Id);

			if (!$this->objSignupForm->IsLoginCanView(QApplication::$Login)) {
				QApplication::Redirect('/events/');
			}
			
			$this->strPageTitle .= $this->objSignupForm->Name;

			$this->dtgQuestions = new FormQuestionDataGrid($this);
			$this->dtgQuestions->AddColumn(new QDataGridColumn('Reorder', '<?= $_FORM->RenderReorderQuestion($_ITEM); ?>', 'HtmlEntities=false', 'Width=60px'));
			$this->dtgQuestions->MetaAddTypeColumn('FormQuestionTypeId', 'FormQuestionType', 'Name=Question Type', 'Width=140px');
			$this->dtgQuestions->MetaAddColumn('ShortDescription', 'Html=<?= $_FORM->RenderShortDescription($_ITEM); ?>', 'Width=170px', 'HtmlEntities=false');
			$this->dtgQuestions->MetaAddColumn('Question', 'Width=400px');
			$this->dtgQuestions->MetaAddColumn('RequiredFlag', 'Width=60px', 'Name=Required?', 'Html=<?= ($_ITEM->RequiredFlag ? "Yes" : null) ?>');
			$this->dtgQuestions->MetaAddColumn('InternalFlag', 'Width=60px', 'Name=Internal Only', 'Html=<?= ($_ITEM->InternalFlag ? "Yes" : null) ?>');
			$this->dtgQuestions->SetDataBinder('dtgQuestions_Bind');
			
			$this->dtgProductsArray = array();
			foreach (FormProductType::$NameArray as $intFormProductTypeId => $strName) {
				if (FormProduct::CountBySignupFormIdFormProductTypeId($this->objSignupForm->Id, $intFormProductTypeId)) {
					$dtgProducts = new FormProductDataGrid($this);
					$dtgProducts->Name = $intFormProductTypeId;
					$dtgProducts->SetDataBinder('dtgProducts_Bind');

					$dtgProducts->AddColumn(new QDataGridColumn('Reorder', '<?= $_FORM->RenderReorderProduct($_ITEM, $_CONTROL); ?>', 'HtmlEntities=false', 'Width=60px'));
					$dtgProducts->MetaAddColumn('Name', 'Html=<?= $_FORM->RenderName($_ITEM); ?>', 'Width=250px', 'HtmlEntities=false');
					$dtgProducts->MetaAddColumn('DateStart', 'Name=Date Available', 'Html=<?= $_ITEM->DateStartHtml; ?>', 'HtmlEntities=false', 'Width=100px');
					$dtgProducts->MetaAddColumn('DateEnd', 'Name=Date Unavail.', 'Html=<?= $_ITEM->DateEndHtml; ?>', 'HtmlEntities=false', 'Width=100px');
					$dtgProducts->MetaAddColumn('MinimumQuantity', 'Name=Min. Qty.', 'Width=70px');
					$dtgProducts->MetaAddColumn('MaximumQuantity', 'Name=Max. Qty.', 'Width=70px');
					$dtgProducts->MetaAddTypeColumn('FormPaymentTypeId', 'FormPaymentType', 'Name=Pay Type', 'Width=70px');
					$dtgProducts->MetaAddColumn('Cost', 'Html=<?= $_FORM->RenderAmount($_ITEM->Cost, false); ?>', 'Width=70px');
					$dtgProducts->MetaAddColumn('Deposit', 'Html=<?= $_FORM->RenderAmount($_ITEM->Deposit, false); ?>', 'Width=70px');
					
					$this->dtgProductsArray[] = $dtgProducts;
				}
			}
			
			if ($this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) {
				$this->lstCreateNew = new QListBox($this);
				$this->lstCreateNew->AddItem('- Create New Question or Product -', null);
				foreach (FormQuestionType::$NameArray as $intId => $strName)
					$this->lstCreateNew->AddItem($strName, $intId, false, 'Question Types');
				foreach (FormProductType::$NameArray as $intId => $strName)
					$this->lstCreateNew->AddItem($strName, $intId * -1, false, 'Product Types');

				$this->lstCreateNew->AddAction(new QChangeEvent(), new QAjaxAction('lstCreateNew_Change'));
			}

			// Setup "About Event" label controls
			$this->SetupLabels();
			switch ($this->objSignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					$this->SetupLabelsForEvent();
					break;
				case SignupFormType::Course:
					$this->SetupLabelsForCourse();
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
			$this->lblSignupUrl->HtmlEntities = false;
			$this->lblSignupUrl->Text = sprintf('<a href="%s" target="_blank">%s</a><br/><span class="na" style="font-size: 11px;">Clicking will open link in a new window</span>', $this->objSignupForm->SignupUrl, $this->objSignupForm->SignupUrl);

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
			$this->lblAllowOtherFlag->Visible = false;
			$this->lblDateCreated = $this->mctSignupForm->lblDateCreated_Create();
			$this->lblFundingAccount = $this->mctSignupForm->lblFundingAccount_Create();
			if (!$this->lblFundingAccount->Text) $this->lblFundingAccount->Visible = false;
			
			$this->lblDonationStewardshipFund = $this->mctSignupForm->lblDonationStewardshipFundId_Create();
			if (!$this->lblDonationStewardshipFund->Text) $this->lblDonationStewardshipFund->Visible = false;
			
			$this->lblSupportEmail = $this->mctSignupForm->lblSupportEmail_Create();
			$this->lblSupportEmail->Required = false;
			$this->lblEmailNotification = $this->mctSignupForm->lblEmailNotification_Create();
			if (!$this->lblEmailNotification ->Text) $this->lblEmailNotification ->Visible = false;
			
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
			if (null != $this->mctSignupForm->SignupForm->EventSignupForm) {
				$mctEventSignupForm = new EventSignupFormMetaControl($this, $this->mctSignupForm->SignupForm->EventSignupForm);
				$this->lblDateStart = $mctEventSignupForm->lblDateStart_Create();
				$this->lblDateEnd = $mctEventSignupForm->lblDateEnd_Create();
				$this->lblLocation = $mctEventSignupForm->lblLocation_Create();
				if (!strlen(trim($this->lblDateStart->Text))) $this->lblDateStart->Visible = false;
				if (!strlen(trim($this->lblDateEnd->Text))) $this->lblDateEnd->Visible = false;
				if (!strlen(trim($this->lblLocation->Text))) $this->lblLocation->Visible = false;
			}
		}

		protected function SetupLabelsForCourse() {
			$mctClassMeeting = new ClassMeetingMetaControl($this, $this->mctSignupForm->SignupForm->ClassMeeting);
			if ($mctClassMeeting->ClassMeeting->ClassTerm) {
				$this->lblClassTerm = new QLabel($this);
				$this->lblClassTerm->Text = $mctClassMeeting->ClassMeeting->ClassTerm->__ToString();
			}
			
			if ($mctClassMeeting->ClassMeeting->ClassCourse) {
				$this->lblClassCourse = new QLabel($this);
				$this->lblClassCourse->Text = $mctClassMeeting->ClassMeeting->ClassCourse->__ToString();
			}

			if ($mctClassMeeting->ClassMeeting->ClassInstructor) {
				$this->lblClassInstructor = new QLabel($this);
				$this->lblClassInstructor->Text = $mctClassMeeting->ClassMeeting->ClassInstructor->__ToString();
			}

			$this->lblDateStart = $mctClassMeeting->lblDateStart_Create();
			$this->lblDateEnd = $mctClassMeeting->lblDateEnd_Create();
			$this->lblLocation = $mctClassMeeting->lblLocation_Create();
			if (!strlen(trim($this->lblLocation->Text))) $this->lblLocation->Visible = false;

			$this->lblMeetsOn = new QLabel($this);
			$this->lblMeetsOn->Text = $mctClassMeeting->ClassMeeting->MeetsOnInfo;
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

		public function RenderAmount($fltAmount, $blnDisplayNullAsZero = true) {
			if ($blnDisplayNullAsZero || !is_null($fltAmount))
				return QApplication::DisplayCurrency($fltAmount);
		}

		public function RenderName(FormProduct $objProduct) {
			return sprintf('<a href="/events/product.php/%s/%s">%s</a>', $this->objSignupForm->Id, $objProduct->Id, QApplication::HtmlEntities($objProduct->Name));
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
			foreach ($this->dtgProductsArray as $dtgProducts) if ($dtgProducts->Name == $objFormProduct->FormProductTypeId) $dtgProducts->Refresh();
		}

		public function pxyMoveUpProduct_Click($strFormId, $strControlId, $strParameter) {
			$objFormProduct = FormProduct::Load($strParameter);
			$objFormProduct->MoveUp();
			foreach ($this->dtgProductsArray as $dtgProducts) if ($dtgProducts->Name == $objFormProduct->FormProductTypeId) $dtgProducts->Refresh();
		}

		public function dtgQuestions_Bind() {
			$this->dtgQuestions->DataSource = $this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber));
		}
		
		public function dtgProducts_Bind(QDataGrid $dtgProducts) {
			$intFormProductTypeId = $dtgProducts->Name;
			$dtgProducts->DataSource = FormProduct::LoadArrayBySignupFormIdFormProductTypeId($this->objSignupForm->Id, $intFormProductTypeId, QQ::OrderBy(QQN::FormProduct()->OrderNumber));
		}
		
		public function lstCreateNew_Change() {
			if ($intId = $this->lstCreateNew->SelectedValue) {
				if ($intId > 0)
					QApplication::Redirect(sprintf('/events/question.php/%s/0/%s', $this->objSignupForm->Id, $intId));
				else
					QApplication::Redirect(sprintf('/events/product.php/%s/0/%s', $this->objSignupForm->Id, $intId * -1));
			}
		}
	}

	SearchGroupsForm::Run('SearchGroupsForm');
?>