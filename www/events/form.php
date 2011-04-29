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
			$this->dtgQuestions->AddColumn(new QDataGridColumn('Reorder', '<?= $_FORM->RenderReorder($_ITEM); ?>', 'HtmlEntities=false'));
			$this->dtgQuestions->MetaAddColumn('ShortDescription');
			$this->dtgQuestions->MetaAddColumn('Question');
			$this->dtgQuestions->MetaAddColumn('RequiredFlag');
			$this->dtgQuestions->SetDataBinder('dtgQuestions_Bind');

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

		public function RenderReorder(FormQuestion $objQuestion) {
			
		}

		public function dtgSignupEntries_Bind() {
			
		}

		public function dtgQuestions_Bind() {
			
		}
	}

	SearchGroupsForm::Run('SearchGroupsForm');
?>