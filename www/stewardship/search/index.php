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
		protected $lstFund;

		protected $btnCalculateTotal;
		protected $btnCalculateLabel;

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
			
			$this->btnCalculateTotal = new QButton($this);
			$this->btnCalculateTotal->CssClass = 'primary';
			$this->btnCalculateTotal->Text = 'Calculate Total Amount';

			$this->btnCalculateLabel = new QLabel($this);
			$this->btnCalculateLabel->Text = 'Calculating... <img src="/assets/images/spinner_14.gif"/>';
			$this->btnCalculateLabel->Display = false;
			$this->btnCalculateLabel->HtmlEntities = false;

			$this->btnCalculateTotal->AddAction(new QClickEvent(), new QToggleDisplayAction($this->btnCalculateTotal));
			$this->btnCalculateTotal->AddAction(new QClickEvent(), new QToggleDisplayAction($this->btnCalculateLabel));
			$this->btnCalculateTotal->AddAction(new QClickEvent(), new QAjaxAction('btnCalculateTotal_Click'));
			
			$this->txtName = new QTextBox($this);
			$this->txtDateEnteredStart = new QDateTimeTextBox($this);
			$this->txtDateEnteredEnd = new QDateTimeTextBox($this);
			$this->txtDateCreditedStart = new QDateTimeTextBox($this);
			$this->txtDateCreditedEnd = new QDateTimeTextBox($this);
			$this->txtAmount = new QFloatTextBox($this);
			$this->txtCheckNumber= new QTextBox($this);
			$this->txtAuthorizationNumber = new QTextBox($this);
			$this->lstFund = new QListBox($this);

			$this->txtDateCreditedStart->Text = 'Jan 1 ' . date('Y');
			$this->txtDateCreditedEnd->Text = 'Dec 31 ' . date('Y');
			
			$this->lstFund->AddItem('- View All -');
			foreach (StewardshipFund::QueryArray(QQ::Equal(QQN::StewardshipFund()->ActiveFlag, true), QQ::OrderBy(QQN::StewardshipFund()->Name)) as $objFund) {
				if ($objFund->FundNumber)
					$this->lstFund->AddItem($objFund->Name . ' (' . $objFund->FundNumber . ')', $objFund->Id);
				else
					$this->lstFund->AddItem($objFund->Name, $objFund->Id);
			}
			$this->lstFund->AddAction(new QChangeEvent(), new QAjaxAction('ResetFilter'));
			
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

		public function btnCalculateTotal_Click() {
			$this->CalculateQuery($objCondition, $objClauses, $blnQueried);

			if ($blnQueried) {
				$objContributionCursor = StewardshipContribution::QueryCursor($objCondition, $objClauses);
				$fltTotal = 0.00;
				while ($objContribution = StewardshipContribution::InstantiateCursor($objContributionCursor)) {
					// We need to look at a specific fund, if that was specified
					if ($this->lstFund->SelectedValue) {
						foreach ($objContribution->GetStewardshipContributionAmountArray() as $objAmount) {
							if ($objAmount->StewardshipFundId == $this->lstFund->SelectedValue)
								$fltTotal += $objAmount->Amount;
						}
					} else {
						$fltTotal += $objContribution->TotalAmount;
					}
				}
				
				QApplication::DisplayAlert('Total: ' . QApplication::DisplayCurrency($fltTotal));
			} else {
				QApplication::DisplayAlert('No query was specified.');
			}

			$this->btnCalculateTotal->Display = true;
			$this->btnCalculateLabel->Display = false;
		}

		public function RenderAmount(StewardshipContribution $objStewardshipContribution) {
			// We need to look at a specific fund?
			if ($this->lstFund->SelectedValue) {
				$fltAmount = 0;
				foreach ($objStewardshipContribution->GetStewardshipContributionAmountArray() as $objAmount) {
					if ($objAmount->StewardshipFundId == $this->lstFund->SelectedValue)
						$fltAmount += $objAmount->Amount;
				}
			} else {
				$fltAmount = $objStewardshipContribution->TotalAmount;
			}
			return sprintf('<a href="/stewardship/batch.php/%s#%s/view_contribution/%s">%s</a>',
				$objStewardshipContribution->StewardshipBatchId,
				$objStewardshipContribution->StewardshipStack->StackNumber,
				$objStewardshipContribution->Id,
				$this->FormatNumber($fltAmount));
		}

		public function FormatNumber($fltAmount) {
			if ($fltAmount < 0)
				return '<span style="color: #933;">' . QApplication::DisplayCurrency($fltAmount) . '</span>';
			if ($fltAmount > 0)
				return QApplication::DisplayCurrency($fltAmount);
			return '<span style="color: #999;">$0.00</span>';
		}
		
		protected function CalculateQuery(&$objCondition, &$objClauses, &$blnQueried) {
			$objCondition = QQ::All();
			$objClauses = array();
			$blnQueried = false;

			if ($strName = trim($this->txtName->Text)) {
				Person::PrepareQqForSearch($strName, $objCondition, $objClauses, QQN::StewardshipContribution()->Person);
				$blnQueried = true;				
			}

			if ($intFundId = $this->lstFund->SelectedValue) {
				$blnQueried = true;
				$objCondition = QQ::AndCondition($objCondition, QQ::Equal(QQN::StewardshipContribution()->StewardshipContributionAmount->StewardshipFundId, $intFundId));
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
		}

		protected function dtgContributions_Bind() {
			$this->CalculateQuery($objCondition, $objClauses, $blnQueried);

			if ($blnQueried)
				$this->dtgContributions->MetaDataBinder($objCondition, $objClauses);
			else
				$this->dtgContributions->MetaDataBinder(QQ::None());
		}
	}

	AdminMainForm::Run('AdminMainForm');
?>