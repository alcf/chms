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

		protected $pxyMoveUp;
		protected $pxyMoveDown;
		protected $lstCreateNewQuestion;
		
		protected $lblName;
		protected $lblSignupUrl;
		protected $lblInformationUrl;
		protected $lblActive;
		protected $lblConfidential;
		protected $lblDescription;
		protected $lblAllowOtherFlag;
		protected $lblAllowMultipleFlag;
		protected $lblPaymentInfo;
		protected $lblLimitInfo;
		protected $lblDateCreated;

		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			if (!$this->objSignupForm) QApplication::Redirect('/events/');
			$this->mctSignupForm = SignupFormMetaControl::Create($this, $this->objSignupForm->Id);

			if ($this->objSignupForm->ConfidentialFlag && !$this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) {
				QApplication::Redirect('/events/');
			}
			
			$this->strPageTitle .= $this->objSignupForm->Name;

			$this->dtgSignupEntries = new QDataGrid($this);
			$this->dtgSignupEntries->CssClass = 'datagrid';
			$this->dtgSignupEntries->SetDataBinder('dtgSignupEntries_Bind');

			$this->dtgQuestions = new FormQuestionDataGrid($this);
			$this->dtgQuestions->AddColumn(new QDataGridColumn('Reorder', '<?= $_FORM->RenderReorder($_ITEM); ?>', 'HtmlEntities=false', 'Width=60px'));
			$this->dtgQuestions->MetaAddTypeColumn('FormQuestionTypeId', 'FormQuestionType', 'Name=Question Type', 'Width=180px');
			$this->dtgQuestions->MetaAddColumn('ShortDescription', 'Html=<?= $_FORM->RenderShortDescription($_ITEM); ?>', 'Width=200px', 'HtmlEntities=false');
			$this->dtgQuestions->MetaAddColumn('Question', 'Width=400px');
			$this->dtgQuestions->MetaAddColumn('RequiredFlag', 'Width=60px', 'Name=Required?', 'Html=<?= ($_ITEM->RequiredFlag ? "Yes" : null) ?>');
			$this->dtgQuestions->SetDataBinder('dtgQuestions_Bind');
			
			if ($this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplication::$Login)) {
				$this->lstCreateNewQuestion = new QListBox($this);
				$this->lstCreateNewQuestion->AddItem('- Create New Question -', null);
				foreach (FormQuestionType::$NameArray as $intId => $strName)
					$this->lstCreateNewQuestion->AddItem($strName, $intId);
				$this->lstCreateNewQuestion->AddAction(new QClickEvent(), new QAjaxAction('lstCreateNewQuestion_Change'));
			}

			$this->cblColumns = new QCheckBoxList($this);
			foreach ($this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber)) as $objFormQuestion) {
				$this->cblColumns->AddItem($objFormQuestion->ShortDescription, $objFormQuestion->Id, $objFormQuestion->ViewFlag);
			}
			
			$this->SetupLabels();
			switch ($this->objSignupForm->SignupFormTypeId) {
				case SignupFormType::Event:
					$this->SetupLabelsForEvent();
					break;
			}
			
			$this->pxyMoveDown = new QControlProxy($this);
			$this->pxyMoveDown->AddAction(new QClickEvent(), new QAjaxAction('pxyMoveDown_Click'));
			$this->pxyMoveDown->AddAction(new QClickEvent(), new QTerminateAction());
			
			$this->pxyMoveUp = new QControlProxy($this);
			$this->pxyMoveUp->AddAction(new QClickEvent(), new QAjaxAction('pxyMoveUp_Click'));
			$this->pxyMoveUp->AddAction(new QClickEvent(), new QTerminateAction());
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
			
			$this->lblPaymentInfo = new QLabel($this);
			$this->lblPaymentInfo->Name = 'Cost and Payment Information';
			switch ($this->objSignupForm->FormPaymentTypeId) {
				case FormPaymentType::NoPayment:
					$this->lblPaymentInfo->Text = 'Free - No Payment Required';
					break;
				case FormPaymentType::DepositRequired:
					$this->lblPaymentInfo->Text = sprintf('Cost: $%.2f - Deposit Required for Registration: $%.2f',
						$this->objSignupForm->Cost, $this->objSignupForm->Deposit);
					break;
				case FormPaymentType::VariablePayment:
					$this->lblPaymentInfo->Text = sprintf('Cost: $%.2f - Registrar can pay in full, or place a deposit of any value that is at least $%.2f', $this->objSignupForm->Cost, $this->objSignupForm->Deposit);
					break;
				case FormPaymentType::PayInFull:
					$this->lblPaymentInfo->Text = sprintf('Cost: $%.2f - Must pay in full with registration', $this->objSignupForm->Cost);
					break;
				default:
					throw new Exception('Invalid Form Payment Type: ' . $this->objSignupForm->FormPaymentTypeId);
			}
			
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

		public function RenderReorder(FormQuestion $objQuestion) {
			$strToReturn = null;

			if ($this->dtgQuestions->CurrentRowIndex == 0) {
				$strToReturn .= '<img src="/assets/images/spacer.png" style="width: 16px; height: 16px;"/>';
			} else {
				$strToReturn .= sprintf('<a href="#" %s><img src="/assets/images/icons/arrow_up.png" title="Move Up" style="width: 16px; height: 16px;"/></a>',
					$this->pxyMoveUp->RenderAsEvents($objQuestion->Id, false));
			}

			$strToReturn .= ' ';
			if ($this->dtgQuestions->CurrentRowIndex == (count($this->dtgQuestions->DataSource) - 1)) {
				$strToReturn .= '<img src="/assets/images/spacer.png" style="width: 16px; height: 16px;"/>';
			} else {
				$strToReturn .= sprintf('<a href="#" %s><img src="/assets/images/icons/arrow_down.png" title="Move Down" style="width: 16px; height: 16px;"/></a>',
					$this->pxyMoveDown->RenderAsEvents($objQuestion->Id, false));
			}
			
			return $strToReturn;
		}

		public function pxyMoveDown_Click($strFormId, $strControlId, $strParameter) {
			$objFormQuestion = FormQuestion::Load($strParameter);
			$objFormQuestion->MoveDown();
			$this->dtgQuestions->Refresh();
		}

		public function pxyMoveUp_Click($strFormId, $strControlId, $strParameter) {
			$objFormQuestion = FormQuestion::Load($strParameter);
			$objFormQuestion->MoveUp();
			$this->dtgQuestions->Refresh();
		}

		public function dtgSignupEntries_Bind() {
			
		}

		public function dtgQuestions_Bind() {
			$this->dtgQuestions->DataSource = $this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber));
		}
		
		public function lstCreateNewQuestion_Change() {
			if ($this->lstCreateNewQuestion->SelectedValue) QApplication::Redirect(sprintf('/events/question.php/%s/0/%s', $this->objSignupForm->Id, $this->lstCreateNewQuestion->SelectedValue));
		}
	}

	SearchGroupsForm::Run('SearchGroupsForm');
?>