<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class SearchIndividualsForm extends ChmsForm {
		protected $strPageTitle = 'Search for a Household';
		protected $intNavSectionId = ChmsForm::NavSectionHouseholds;

		protected $txtFirstName;
		protected $txtLastName;
		protected $txtPhone;
		protected $txtCity;

		protected $dtgHouseholds;

		protected function Form_Create() {
			$this->dtgHouseholds = new HouseholdDataGrid($this);
			$this->dtgHouseholds->Paginator = new QPaginator($this->dtgHouseholds);
			$this->dtgHouseholds->ItemsPerPage = 25;
			$this->dtgHouseholds->MetaAddColumn('Name','Html=<?=$_FORM->RenderHouseholdName($_ITEM); ?>', 'HtmlEntities=false', 'Width=280px');
			$this->dtgHouseholds->MetaAddColumn('Members', 'Width=650px');
			$this->dtgHouseholds->SetDataBinder('dtgHouseholds_Bind');

			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'First Name';
			$this->txtFirstName->AddAction(new QChangeEvent(), new QAjaxAction('dtgHouseholds_Refresh'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgHouseholds_Refresh'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Last Name';
			$this->txtLastName->AddAction(new QChangeEvent(), new QAjaxAction('dtgHouseholds_Refresh'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgHouseholds_Refresh'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
						
			$this->txtPhone = new QTextBox($this);
			$this->txtPhone->Name = 'Phone';
			$this->txtPhone->AddAction(new QChangeEvent(), new QAjaxAction('dtgHouseholds_Refresh'));
			$this->txtPhone->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgHouseholds_Refresh'));
			$this->txtPhone->AddAction(new QEnterKeyEvent(), new QTerminateAction());
						
			$this->txtCity = new QTextBox($this);
			$this->txtCity->Name = 'City';
			$this->txtCity->AddAction(new QChangeEvent(), new QAjaxAction('dtgHouseholds_Refresh'));
			$this->txtCity->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgHouseholds_Refresh'));
			$this->txtCity->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}

		protected function dtgHouseholds_Refresh() {
			$this->dtgHouseholds->PageNumber = 1;
			$this->dtgHouseholds->Refresh();
		}

		public function RenderHouseholdName(Household $objHousehold) {
			return sprintf('<a href="/households/view.php/%s">%s</a>', $objHousehold->Id, QApplication::HtmlEntities($objHousehold->Name));
		}

		public function dtgHouseholds_Bind() {
			$objConditions = QQ::All();

			if ($strName = trim($this->txtFirstName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Household()->HouseholdParticipation->Person->FirstName, $strName . '%')
				);
			}
						
			if ($strName = trim($this->txtLastName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Household()->HouseholdParticipation->Person->LastName, $strName . '%')
				);
			}
						
			if ($strName = trim($this->txtCity->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Household()->Address->City, $strName . '%')
				);
			}

			if ($strName = trim($this->txtPhone->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Household()->Address->Phone, $strName . '%')
				);
			}

			$this->dtgHouseholds->MetaDataBinder($objConditions, array(QQ::Distinct()));
		}
	}

	SearchIndividualsForm::Run('SearchIndividualsForm');
?>