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

		protected $dtgSignupEntries;
		protected $cblColumns;
		protected $chkShowNonComplete;

		protected function Form_Create() {
			$this->objSignupForm = SignupForm::Load(QApplication::PathInfo(0));
			if (!$this->objSignupForm) QApplication::Redirect('/events/');

			if (!$this->objSignupForm->IsLoginCanView(QApplication::$Login)) {
				QApplication::Redirect('/events/');
			}
			
			$this->strPageTitle .= $this->objSignupForm->Name;

			$this->dtgSignupEntries = new SignupEntryDataGrid($this);
			$this->dtgSignupEntries->CssClass = 'datagrid';
			$this->dtgSignupEntries->SetDataBinder('dtgSignupEntries_Bind');
			$this->dtgSignupEntries->Paginator = new QPaginator($this->dtgSignupEntries);
			$this->dtgSignupEntries->SortColumnIndex = 0;
			$this->dtgSignupEntries->FontSize = '10px';

			$this->cblColumns = new QCheckBoxList($this);
			$this->cblColumns->HtmlEntities = false;
			$this->cblColumns->AddAction(new QClickEvent(), new QAjaxAction('cblColumns_Click'));
			foreach ($this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber)) as $objFormQuestion) {
				if ($objFormQuestion->RequiredFlag)
					$strDescription = '<strong>' . QApplication::HtmlEntities($objFormQuestion->ShortDescription) . '</strong>';
				else
					$strDescription = QApplication::HtmlEntities($objFormQuestion->ShortDescription);
				$this->cblColumns->AddItem($strDescription, 'q' . $objFormQuestion->Id, $objFormQuestion->ViewFlag);
			}
			foreach ($this->objSignupForm->GetFormProductArray(QQ::OrderBy(QQN::FormProduct()->FormProductTypeId, QQN::FormProduct()->OrderNumber)) as $objFormProduct) {
				$this->cblColumns->AddItem(QApplication::HtmlEntities($objFormProduct->Name), 'p' . $objFormProduct->Id, $objFormProduct->ViewFlag);
			}

			// Setup dtgSignups
			$this->dtgSignupEntries_SetupColumns();
			
			$this->chkShowNonComplete = new QCheckBox($this);
			$this->chkShowNonComplete->Text = 'Show Incomplete / Test';
			$this->chkShowNonComplete->Checked = false;
			$this->chkShowNonComplete->AddAction(new QClickEvent(), new QAjaxAction('chkShowNonComplete_Click'));
		}

		public function chkShowNonComplete_Click() {
			$this->dtgSignupEntries->Refresh();
		}

		public function cblColumns_Click() {
			foreach ($this->cblColumns->GetAllItems() as $objItem) {
				$intId = substr($objItem->Value, 1);
				if (substr($objItem->Value, 0, 1) == 'q') {
					$objQuestion = FormQuestion::Load($intId);
					$objQuestion->ViewFlag = $objItem->Selected;
					$objQuestion->Save();
				} else {
					$objProduct = FormProduct::Load($intId);
					$objProduct->ViewFlag = $objItem->Selected;
					$objProduct->Save();
				}
			}
			$this->dtgSignupEntries_SetupColumns();
			$this->dtgSignupEntries->Refresh();
		}

		public function dtgSignupEntries_SetupColumns() {
			$this->dtgSignupEntries->RemoveAllColumns();
			$this->dtgSignupEntries->MetaAddColumn(QQN::SignupEntry()->Person->LastName, 'Name=Name', 'Html=<?= $_FORM->RenderName($_ITEM); ?>', 'HtmlEntities=false');
			$this->dtgSignupEntries->MetaAddTypeColumn('SignupEntryStatusTypeId', 'SignupEntryStatusType', 'Name=Status');

			foreach ($this->objSignupForm->GetFormQuestionArray(QQ::OrderBy(QQN::FormQuestion()->OrderNumber)) as $objFormQuestion) {
				if ($objFormQuestion->ViewFlag) {
					$this->dtgSignupEntries->AddColumn(new QDataGridColumn($objFormQuestion->ShortDescription, '<?= $_FORM->RenderAnswer($_ITEM, ' . $objFormQuestion->Id . ',' . $objFormQuestion->FormQuestionTypeId . '); ?>', 'HtmlEntities=false'));
				}
			}
						
			foreach ($this->objSignupForm->GetFormProductArray(QQ::OrderBy(QQN::FormProduct()->FormProductTypeId, QQN::FormProduct()->OrderNumber)) as $objFormProduct) {
				if ($objFormProduct->ViewFlag) {
					$this->dtgSignupEntries->AddColumn(new QDataGridColumn($objFormProduct->Name, '<?= $_FORM->RenderProductQuantity($_ITEM, ' . $objFormProduct->Id . '); ?>', 'HtmlEntities=false'));
				}
			}
			
			if ($this->objSignupForm->CountFormProducts()) {
				$this->dtgSignupEntries->MetaAddColumn(QQN::SignupEntry()->AmountPaid, 'Name=Paid', 'Html=<?= $_FORM->RenderAmount($_ITEM->AmountPaid); ?>');
				$this->dtgSignupEntries->MetaAddColumn(QQN::SignupEntry()->AmountBalance, 'Name=Balance', 'Html=<?= $_FORM->RenderAmount($_ITEM->AmountBalance); ?>');
			}
			
			$this->dtgSignupEntries->MetaAddColumn(QQN::SignupEntry()->DateSubmitted, 'Name=Submitted', 'Html=<?= $_ITEM->DateSubmitted ? $_ITEM->DateSubmitted->ToString("MMM D YYYY") : null; ?>');
		}
		
		public function RenderName(SignupEntry $objSignupEntry) {
			if ($objSignupEntry->SignupEntryStatusTypeId == SignupEntryStatusType::Complete) {
				$this->dtgSignupEntries->OverrideRowStyle($this->dtgSignupEntries->CurrentRowIndex, null);
				$strASpan = null;
			} else {
				$objStyle = new QDataGridRowStyle();
				$objStyle->ForeColor = '#999';
				$objStyle->FontItalic = true;
				$this->dtgSignupEntries->OverrideRowStyle($this->dtgSignupEntries->CurrentRowIndex, $objStyle);
				$strASpan = ' style="color: #999;"';
			}
			
			// Show a link if we can edit
			if ($this->objSignupForm->Ministry->IsLoginCanAdminMinistry(QApplicatioN::$Login)) {
				return sprintf('<a href="/events/result.php/%s/%s" title="View and Edit this signup" %s>%s</a>',
					$this->objSignupForm->Id, $objSignupEntry->Id, $strASpan, QApplication::HtmlEntities($objSignupEntry->Person->Name));
			} else {
				return QApplication::HtmlEntities($objSignupEntry->Person->Name);
			}
		}

		public function RenderAmount($fltAmount, $blnDisplayNullAsZero = true) {
			if ($blnDisplayNullAsZero || !is_null($fltAmount))
				return QApplication::DisplayCurrency($fltAmount);
		}

		public function RenderProductQuantity(SignupEntry $objSignupEntry, $intFormProductId) {
			$objSignupProduct = SignupProduct::LoadBySignupEntryIdFormProductId($objSignupEntry->Id, $intFormProductId);
			if (!$objSignupProduct) return;
			return $objSignupProduct->Quantity;
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
			$objCondition = QQ::Equal(QQN::SignupEntry()->SignupFormId, $this->objSignupForm->Id);
			if (!$this->chkShowNonComplete->Checked) {
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::SignupEntry()->SignupEntryStatusTypeId, SignupEntryStatusType::Complete));
			}

			$this->dtgSignupEntries->MetaDataBinder($objCondition);
		}
	}

	SearchGroupsForm::Run('SearchGroupsForm');
?>