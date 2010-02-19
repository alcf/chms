<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
	QApplication::Authenticate();

	class SearchIndividualsForm extends ChmsForm {
		protected $strPageTitle = 'Search Individuals';
		protected $intNavSectionId = ChmsForm::NavSectionPeople;

		protected $dtgPeople;

		protected function Form_Create() {
			$this->dtgPeople = new PersonDataGrid($this);
			$this->dtgPeople->Paginator = new QPaginator($this->dtgPeople);
			$this->dtgPeople->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgPeople->MetaAddColumn('FirstName','Html=<?=$_FORM->RenderFirstName($_ITEM); ?>', 'HtmlEntities=false');
			$this->dtgPeople->MetaAddColumn('LastName','Html=<?=$_FORM->RenderLastName($_ITEM); ?>', 'HtmlEntities=false');
			$this->dtgPeople->MetaAddTypeColumn('MembershipStatusTypeId', 'MembershipStatusType');
			// TODO: Confirm that we should be displaying the "Mailing Address" field
			$this->dtgPeople->MetaAddColumn(QQN::Person()->MailingAddress->Address1);
			$this->dtgPeople->MetaAddColumn(QQN::Person()->MailingAddress->City);
			$this->dtgPeople->SetDataBinder('dtgPeople_Bind');
		}
		
		public function RenderFirstName(Person $objPerson) {
			return sprintf('<a href="/individuals/view.php/%s">%s</a>', $objPerson->Id, QApplication::HtmlEntities($objPerson->FirstName));
		}
		
		public function RenderLastName(Person $objPerson) {
			return sprintf('<a href="/individuals/view.php/%s">%s</a>', $objPerson->Id, QApplication::HtmlEntities($objPerson->LastName));
		}
		
		public function dtgPeople_Bind() {
			$objConditions = QQ::All();

			$this->dtgPeople->TotalItemCount = Person::QueryCount($objConditions);

			$objClauses = array();
			if ($objClause = $this->dtgPeople->OrderByClause)
				array_push($objClauses, $objClause);

			// Add the LimitClause information, as well
			if ($objClause = $this->dtgPeople->LimitClause)
				array_push($objClauses, $objClause);

			// Set the DataSource to be a Query result from Person, given the clauses above
			$this->dtgPeople->DataSource = Person::QueryArray($objConditions, $objClauses);
		}
	}

	SearchIndividualsForm::Run('SearchIndividualsForm');
?>