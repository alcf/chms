<?php
	require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
	QApplication::Authenticate(null, array(PermissionType::AccessStewardship));

	class AdminMainForm extends ChmsForm {
		protected $strPageTitle = 'Stewardship - Search for a Contribution';
		protected $intNavSectionId = ChmsForm::NavSectionStewardship;

		protected $dtgContributions;

		protected $txtName;
		protected $txtDateEnteredStart;
		protected $txtDateEnteredEnd;
		protected $txtDateCreditedStart;
		protected $txtDateCreditedEnd;
		protected $txtAmount;
		protected $txtCheckNumber;
		protected $txtAuthorizationNumber;

		protected function Form_Create() {
			$this->dtgContributions = new StewardshipContributionDataGrid($this);
			$this->dtgContributions->Paginator = new QPaginator($this->dtgContributions);
			$this->dtgContributions->MetaAddColumn(QQN::StewardshipContribution()->Person->LastName, 'Name=Person', 'Html=<?= $_ITEM->Person->Name; ?>', 'Width=280px');
			$this->dtgContributions->MetaAddColumn('TotalAmount', 'Html=<?= $_FORM->RenderAmount($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px');
			$this->dtgContributions->MetaAddColumn('CheckNumber', 'Width=120px');
			$this->dtgContributions->MetaAddColumn('AuthorizationNumber', 'Width=140px');
			$this->dtgContributions->MetaAddColumn(QQN::StewardshipContribution()->StewardshipBatch->DateEntered, 'Width=100px');
			$this->dtgContributions->MetaAddColumn('DateCredited', 'Width=100px');
			$this->dtgContributions->SetDataBinder('dtgContributions_Bind');
			
			$this->dtgContributions->NoDataHtml = '<strong>No results.</strong><br/>Please specify search parameters above.';

			$this->dtgContributions->SortColumnIndex = 0;
			$this->dtgContributions->SortDirection = 0;

			$this->txtName = new QTextBox($this);
			$this->txtDateEnteredStart = new QDateTimeTextBox($this);
			$this->txtDateEnteredEnd = new QDateTimeTextBox($this);
			$this->txtDateCreditedStart = new QDateTimeTextBox($this);
			$this->txtDateCreditedEnd = new QDateTimeTextBox($this);
			$this->txtAmount = new QFloatTextBox($this);
			$this->txtCheckNumber= new QTextBox($this);
			$this->txtAuthorizationNumber = new QTextBox($this);

			$this->txtName->AddAction(new QEnterKeyEvent(), new QAjaxAction('ResetFilter'));
			$this->txtName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtName->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));

			$this->txtDateEnteredStart->AddAction(new QEnterKeyEvent(), new QAjaxAction('ResetFilter'));
			$this->txtDateEnteredStart->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtDateEnteredStart->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));

			$this->txtDateEnteredEnd->AddAction(new QEnterKeyEvent(), new QAjaxAction('ResetFilter'));
			$this->txtDateEnteredEnd->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtDateEnteredEnd->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));

			$this->txtDateCreditedStart->AddAction(new QEnterKeyEvent(), new QAjaxAction('ResetFilter'));
			$this->txtDateCreditedStart->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtDateCreditedStart->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));

			$this->txtDateCreditedEnd->AddAction(new QEnterKeyEvent(), new QAjaxAction('ResetFilter'));
			$this->txtDateCreditedEnd->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtDateCreditedEnd->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));

			$this->txtAmount->AddAction(new QEnterKeyEvent(), new QAjaxAction('ResetFilter'));
			$this->txtAmount->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtAmount->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));

			$this->txtCheckNumber->AddAction(new QEnterKeyEvent(), new QAjaxAction('ResetFilter'));
			$this->txtCheckNumber->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtCheckNumber->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));

			$this->txtAuthorizationNumber->AddAction(new QEnterKeyEvent(), new QAjaxAction('ResetFilter'));
			$this->txtAuthorizationNumber->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtAuthorizationNumber->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));
		}

		public function ResetFilter() {
			$this->dtgContributions->PageNumber = 1;
			$this->dtgContributions->Refresh();
		}

		public function RenderAmount(StewardshipContribution $objStewardshipContribution) {
			return sprintf('<a href="/stewardship/batch.php/%s#%s/view_contribution/%s">%s</a>',
				$objStewardshipContribution->StewardshipBatchId,
				$objStewardshipContribution->StewardshipStack->StackNumber,
				$objStewardshipContribution->Id,
				$this->FormatNumber($objStewardshipContribution->TotalAmount));
		}

		public function FormatNumber($fltAmount) {
			if ($fltAmount < 0)
				return '<span style="color: #933;">' . QApplication::DisplayCurrency($fltAmount) . '</span>';
			if ($fltAmount > 0)
				return QApplication::DisplayCurrency($fltAmount);
			return '<span style="color: #999;">$0.00</span>';
		}
		protected function dtgContributions_Bind() {
			$objCondition = QQ::All();
			$objClauses = array();
			$blnQueried = false;

			if ($strName = trim($this->txtName->Text)) {
				Person::PrepareQqForSearch($strName, $objCondition, $objClauses, QQN::StewardshipContribution()->Person);
				$blnQueried = true;				
			}

			if (strlen($strText = trim($this->txtAmount->Text))) {
				$blnQueried = true;
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::StewardshipContribution()->TotalAmount, $strText));
			}
			
			if (strlen($strText = trim($this->txtCheckNumber->Text))) {
				$blnQueried = true;
				$objCondition = QQ::AndCondition($objCondition, QQ::Like(QQN::StewardshipContribution()->CheckNumber, '%' . $strText . '%'));
			}
			
			if (strlen($strText = trim($this->txtAuthorizationNumber->Text))) {
				$blnQueried = true;
				$objCondition = QQ::AndCondition($objCondition, QQ::Like(QQN::StewardshipContribution()->AuthorizationNumber, '%' . $strText . '%'));
			}

			$dttStart = $this->txtDateCreditedStart->DateTime;
			$dttEnd = $this->txtDateCreditedEnd->DateTime;
			if ($dttStart || $dttEnd) {
				$blnQueried = true;

				if ($dttStart && $dttEnd) /* $dttStart AND $dttEnd Provided */ {
					$objCondition = QQ::AndCondition($objCondition,
						QQ::GreaterOrEqual(QQN::StewardshipContribution()->DateCredited, $dttStart),
						QQ::LessOrEqual(QQN::StewardshipContribution()->DateCredited, $dttEnd));

				} else if ($dttStart) /* $dttStart Only -- EXACT Match Only */ {
					$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::StewardshipContribution()->DateCredited, $dttStart));

				} else /* $dttEnd Only */ {
					$objCondition = QQ::AndCondition($objCondition, QQ::LessOrEqual(QQN::StewardshipContribution()->DateCredited, $dttEnd));
				}
			}
			
			$dttStart = $this->txtDateEnteredStart->DateTime;
			$dttEnd = $this->txtDateEnteredEnd->DateTime;
			if ($dttStart || $dttEnd) {
				$blnQueried = true;

				if ($dttStart && $dttEnd) /* $dttStart AND $dttEnd Provided */ {
					$objCondition = QQ::AndCondition($objCondition,
						QQ::GreaterOrEqual(QQN::StewardshipContribution()->StewardshipBatch->DateEntered, $dttStart),
						QQ::LessOrEqual(QQN::StewardshipContribution()->StewardshipBatch->DateEntered, $dttEnd));

				} else if ($dttStart) /* $dttStart Only -- EXACT Match Only */ {
					$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::StewardshipContribution()->StewardshipBatch->DateEntered, $dttStart));

				} else /* $dttEnd Only */ {
					$objCondition = QQ::AndCondition($objCondition, QQ::LessOrEqual(QQN::StewardshipContribution()->StewardshipBatch->DateEntered, $dttEnd));
				}
			}
			
			if ($blnQueried)
				$this->dtgContributions->MetaDataBinder($objCondition, $objClauses);
			else
				$this->dtgContributions->MetaDataBinder(QQ::None());
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>