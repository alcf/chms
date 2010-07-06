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
			$this->dtgPeople->MetaAddColumn('FirstName','Html=<?=$_FORM->RenderFirstName($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px');
			$this->dtgPeople->MetaAddColumn('LastName','Html=<?=$_FORM->RenderLastName($_ITEM); ?>', 'HtmlEntities=false', 'Width=150px');
			$this->dtgPeople->MetaAddTypeColumn('MembershipStatusTypeId', 'MembershipStatusType', 'Name=Membership', 'Width=110px', 'FontSize=11px');
			// TODO: Confirm that we should be displaying the "Mailing Address" field
			$this->dtgPeople->MetaAddColumn('PrimaryAddressText', 'Name=Address', 'Width=240px', 'FontSize=11px');
			$this->dtgPeople->MetaAddColumn('PrimaryCityText', 'Name=City', 'Width=130px', 'FontSize=11px');
			$this->dtgPeople->MetaAddColumn('PrimaryPhoneText', 'Name=Phone', 'Width=115px', 'FontSize=11px');
			$this->dtgPeople->SetDataBinder('dtgPeople_Bind');
		}
		
		public function RenderFirstName(Person $objPerson) {
			return sprintf('<a href="%s">%s</a>', $objPerson->LinkUrl, QApplication::HtmlEntities($objPerson->FirstName));
		}
		
		public function RenderLastName(Person $objPerson) {
			return sprintf('<a href="%s">%s</a>', $objPerson->LinkUrl, QApplication::HtmlEntities($objPerson->LastName));
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