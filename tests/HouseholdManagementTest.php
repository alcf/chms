<?php 
	class HouseholdManagementTest extends PHPUnit_Framework_TestCase {
		protected $objIndividual;

		protected $objMemberOfOne1;
		protected $objMemberOfOne2;
		protected $objMemberOfMany;

		protected $objSinglePersonHousehold;
		protected $objMultiplePersonHousehold1;
		protected $objMultiplePersonHousehold2;
		
		public function testSetup() {
			$this->objIndividual = Person::CreatePerson('Individual', null, 'Person', true);

			$objHeadPerson = Person::CreatePerson('HeadOfOne', null, 'Person', true);
			$this->objSinglePersonHousehold = Household::CreateHousehold($objHeadPerson);

			$objHeadPerson = Person::CreatePerson('HeadOfMany', null, 'Person', true);
			$this->objMultiplePersonHousehold1 = Household::CreateHousehold($objHeadPerson);

			$objHeadPerson = Person::CreatePerson('HeadOfMany', null, 'Person', true);
			$this->objMultiplePersonHousehold2 = Household::CreateHousehold($objHeadPerson);

			$this->objMemberOfMany = Person::CreatePerson('MemberOfMany', null, 'Person', true);
			$this->objMultiplePersonHousehold1->AssociatePerson($this->objMemberOfMany);
			$this->objMultiplePersonHousehold2->AssociatePerson($this->objMemberOfMany);

			$this->objMemberOfOne1 = Person::CreatePerson('MemberOfOne', null, 'Person', true);
			$this->objMultiplePersonHousehold1->AssociatePerson($this->objMemberOfOne1);

			$this->objMemberOfOne2 = Person::CreatePerson('MemberOfOne', null, 'Person', true);
			$this->objMultiplePersonHousehold2->AssociatePerson($this->objMemberOfOne2);

			$this->AssertNotNull($this->objIndividual, 'Individual Not Created Properly');
			$this->AssertNotNull($this->objMemberOfOne1, 'Member of Single Household not created properly');
			$this->AssertNotNull($this->objMemberOfOne2, 'Member of Single Household not created properly');
			$this->AssertNotNull($this->objMemberOfMany, 'Member of Multiple Households not created properly');
			$this->AssertNotNull($this->objSinglePersonHousehold, 'Single Person Household not created properly');
			$this->AssertNotNull($this->objMultiplePersonHousehold1, 'Multiple Person Household not created properly');
			$this->AssertNotNull($this->objMultiplePersonHousehold2, 'Multiple Person Household not created properly');
		}

		public function TearDown() {
			foreach (array($this->objIndividual, $this->objMemberOfOne1, $this->objMemberOfOne2, $this->objMemberOfMany) as $objPerson) {
				$objPerson->DeleteAllHouseholdParticipations();
				$objPerson->Delete();
			}

			foreach (array($this->objSinglePersonHousehold, $this->objMultiplePersonHousehold1, $this->objMultiplePersonHousehold2) as $objHousehold) {
				$objHeadPerson = $objHousehold->HeadPerson;
				$objHousehold->DeleteAllHouseholdParticipations();
				$objHousehold->Delete();

				$objHeadPerson->DeleteAllHouseholdParticipations();
				$objHeadPerson->Delete();
			}
		}
	}
?>