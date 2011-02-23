<?php
	class Vicp_Merge extends Vicp_Base {
		public $txtName;
		public $txtFirstName;
		public $txtLastName;
		public $lstGender;
		public $lstMemberStatus;
		public $txtEmail;
		public $txtPhone;
		public $txtCity;

		public $dtgPeople;

		protected function SetupPanel() {
			$this->dtgPeople = new PersonDataGrid($this);
			$this->dtgPeople->Paginator = new QPaginator($this->dtgPeople);
			$this->dtgPeople->MetaAddColumn('FirstName','Html=<?=$_CONTROL->ParentControl->RenderFirstName($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px');
			$this->dtgPeople->MetaAddColumn('LastName','Html=<?=$_CONTROL->ParentControl->RenderLastName($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px');
			$this->dtgPeople->MetaAddTypeColumn('MembershipStatusTypeId', 'MembershipStatusType', 'Name=Membership', 'Width=110px', 'FontSize=11px');

			$this->dtgPeople->MetaAddColumn('PrimaryAddressText', 'Name=Address', 'Width=240px', 'FontSize=11px');
			$this->dtgPeople->MetaAddColumn('PrimaryCityText', 'Name=City', 'Width=130px', 'FontSize=11px');
			$this->dtgPeople->MetaAddColumn('PrimaryPhoneText', 'Name=Phone', 'Width=115px', 'FontSize=11px');
			$this->dtgPeople->SetDataBinder('dtgPeople_Bind', $this);
			$this->dtgPeople->NoDataHtml = 'No results found.  Please use a less-restrictive filter.';

			$this->dtgPeople->SortColumnIndex = 1;
			$this->dtgPeople->ItemsPerPage = 20;

			$this->txtName = new QTextBox($this);
			$this->txtName->Name = 'Person\'s Name (including nicknames, mispellings, etc.)';
			$this->txtName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->txtName->Text = $this->objPerson->Name;
			$this->txtName->Focus();

			$this->txtFirstName = new QTextBox($this);
			$this->txtFirstName->Name = 'First Name (Exact)';
			$this->txtFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->txtLastName = new QTextBox($this);
			$this->txtLastName->Name = 'Last Name (Exact)';
			$this->txtLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());

			$this->lstGender = new QListBox($this);
			$this->lstGender->Name = 'Gender';
			$this->lstGender->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->lstGender->AddItem('- View All -');
			$this->lstGender->AddItem('Male', 'M');
			$this->lstGender->AddItem('Female', 'F');

			$this->lstMemberStatus = new QListBox($this);
			$this->lstMemberStatus->Name = 'Member Status';
			$this->lstMemberStatus->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->lstMemberStatus->AddItem('- View All -');
			foreach (MembershipStatusType::$NameArray as $intId => $strMemberStatus) {
				$this->lstMemberStatus->AddItem($strMemberStatus, $intId);
			}

			$this->txtEmail = new QTextBox($this);
			$this->txtEmail->Name = 'Email';
			$this->txtEmail->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtEmail->AddAction(new QEnterKeyEvent(), new QTerminateAction());
						
			$this->txtPhone = new QTextBox($this);
			$this->txtPhone->Name = 'Phone';
			$this->txtPhone->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtPhone->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtPhone->AddAction(new QEnterKeyEvent(), new QTerminateAction());
						
			$this->txtCity = new QTextBox($this);
			$this->txtCity->Name = 'City';
			$this->txtCity->AddAction(new QChangeEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtCity->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'dtgPeople_Refresh'));
			$this->txtCity->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		}
		
		public function RenderFirstName(Person $objPerson) {
			if (!strlen(trim($objPerson->FirstName))) return '&nbsp;';
			return sprintf('<a href="#merge/fields/%s">%s</a>', $objPerson->Id, QApplication::HtmlEntities($objPerson->FirstName));
		}
		
		public function RenderLastName(Person $objPerson) {
			if (!strlen(trim($objPerson->LastName))) return '&nbsp;';
			return sprintf('<a href="#merge/fields/%s">%s</a>', $objPerson->Id, QApplication::HtmlEntities($objPerson->LastName));
		}

		public function dtgPeople_Refresh() {
			$this->dtgPeople->PageNumber = 1;
			$this->dtgPeople->Refresh();
		}

		public function dtgPeople_Bind() {
			$objConditions = QQ::NotEqual(QQN::Person()->Id, $this->objPerson->Id);
			$objClauses = array();

			if ($strName = trim($this->txtName->Text)) {
				Person::PrepareQqForSearch($strName, $objConditions, $objClauses);
			}

			if ($strName = trim($this->txtFirstName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->FirstName, $strName . '%')
				);
			}

			if ($strName = trim($this->txtLastName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->LastName, $strName . '%')
				);
			}

			if ($strName = trim($this->txtCity->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->PrimaryCityText, $strName . '%')
				);
			}
						
			if ($strName = trim($this->txtEmail->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Person()->PrimaryEmail->Address, $strName . '%')
				);
			}

			if ($strName = trim($this->txtPhone->Text)) {
				$objClauses[] = QQ::Distinct();
				$objConditions = QQ::AndCondition($objConditions,
					QQ::OrCondition(
						QQ::Like( QQN::Person()->Phone->Number, $strName . '%'),
						QQ::Like( QQN::Person()->HouseholdParticipation->Household->Address->Phone->Number, $strName . '%')
					)
				);
			}
			
			if (!is_null($strValue = $this->lstGender->SelectedValue)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Equal( QQN::Person()->Gender, $strValue)
				);
			}

			if (!is_null($strValue = $this->lstMemberStatus->SelectedValue)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Equal( QQN::Person()->MembershipStatusTypeId, $strValue)
				);
			}

			$this->dtgPeople->MetaDataBinder($objConditions, $objClauses);
		}
	}
?>