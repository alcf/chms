<?php
	class Vicp_SafariKids_Select extends Vicp_Base {
		public $txtServerIdentifier;
		public $txtFirstName;
		public $txtLastName;
		public $chkShowUnlinkedOnly;
		
		public $dtgParentPagerIndividuals;
		public $btnCancel;

		protected function SetupPanel() {
			$this->dtgParentPagerIndividuals = new ParentPagerIndividualDataGrid($this);
			$this->dtgParentPagerIndividuals->Paginator = new QPaginator($this->dtgParentPagerIndividuals);
			$this->dtgParentPagerIndividuals->MetaAddColumn('ServerIdentifier', 'Name=Parent Pager ID', 'Width=120px');
			$this->dtgParentPagerIndividuals->MetaAddColumn('FirstName', 'Width=120px');
			$this->dtgParentPagerIndividuals->MetaAddColumn('LastName', 'Width=120px');
			$this->dtgParentPagerIndividuals->MetaAddColumn(QQN::ParentPagerIndividual()->Person->FirstName, 'Name=Linked to NOAH Record', 'Width=200px');
			$this->dtgParentPagerIndividuals->SortColumnIndex = 2;

			$this->txtServerIdentifier = new QTextBox($this);
			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Text = $this->objPerson->FirstName;
			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Text = $this->objPerson->LastName;
			$this->chkShowUnlinkedOnly = new QCheckBox($this);
			$this->chkShowUnlinkedOnly->Checked = true;
			$this->chkShowUnlinkedOnly->Text = 'Only show records that are Not-Yet-Linked to NOAH';

			$this->dtgParentPagerIndividuals->SetDataBinder('dtgParentPagerIndividual_Bind', $this);
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->CssClass = 'alternate';
			$this->btnCancel->Text = 'Cancel';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
			
			// Actions
			$this->txtServerIdentifier->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtServerIdentifier->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtServerIdentifier->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->txtFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->txtLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->chkShowUnlinkedOnly->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'Filter_Refresh'));
		}

		public function Filter_Refresh() {
			$this->dtgParentPagerIndividuals->PageNumber = 1;
			$this->dtgParentPagerIndividuals->Refresh();
		}
		public function btnCancel_Click() {
			$this->ReturnTo('#sk');
		}

		public function dtgParentPagerIndividual_Bind() {
			$objCondition = QQ::All();
			
			if (strlen($strText = trim($this->txtServerIdentifier->Text))) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Equal(QQN::ParentPagerIndividual()->ServerIdentifier, $strText)
				);
			}
			
			if (strlen($strText = trim($this->txtFirstName->Text))) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::ParentPagerIndividual()->FirstName, $strText . '%')
				);
			}
			
			if (strlen($strText = trim($this->txtLastName->Text))) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::Like(QQN::ParentPagerIndividual()->LastName, $strText . '%')
				);
			}

			if ($this->chkShowUnlinkedOnly->Checked) {
				$objCondition = QQ::AndCondition(
					$objCondition,
					QQ::IsNull(QQN::ParentPagerIndividual()->PersonId)
				);
			}

			$this->dtgParentPagerIndividuals->MetaDataBinder($objCondition);
		}
	}
?>