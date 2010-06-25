<?php 
	class HouseholdManagementTest extends PHPUnit_Framework_TestCase {
		protected $objIndividual;

		protected $objMemberOfOne1;
		protected $objMemberOfOne2;
		protected $objMemberOfMany;

		protected $objSinglePersonHousehold;
		protected $objMultiplePersonHousehold1;
		protected $objMultiplePersonHousehold2;
		
		public function SetUp() {
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
		}

		public function testSetup() {
			$this->AssertNotNull($this->objIndividual, 'Individual Not Created Properly');
			$this->AssertNotNull($this->objMemberOfOne1, 'Member of Single Household not created properly');
			$this->AssertNotNull($this->objMemberOfOne2, 'Member of Single Household not created properly');
			$this->AssertNotNull($this->objMemberOfMany, 'Member of Multiple Households not created properly');
			$this->AssertNotNull($this->objSinglePersonHousehold, 'Single Person Household not created properly');
			$this->AssertNotNull($this->objMultiplePersonHousehold1, 'Multiple Person Household not created properly');
			$this->AssertNotNull($this->objMultiplePersonHousehold2, 'Multiple Person Household not created properly');
		}
		
		public function testHouseholdStatusType() {
			$this->AssertEquals($this->objIndividual->GetHouseholdStatus(), Person::HouseholdStatusNone, 'HouseholdStatusNone incorrect');
			$this->AssertEquals($this->objMemberOfOne1->GetHouseholdStatus(), Person::HouseholdStatusMemberOfOne, 'HouseholdStatusMemberOfOne incorrect');
			$this->AssertEquals($this->objMemberOfOne2->GetHouseholdStatus(), Person::HouseholdStatusMemberOfOne, 'HouseholdStatusMemberOfOne incorrect');
			$this->AssertEquals($this->objMemberOfMany->GetHouseholdStatus(), Person::HouseholdStatusMemberOfMultiple, 'HouseholdStatusMemberOfMultiple incorrect');
			$this->AssertEquals($this->objSinglePersonHousehold->HeadPerson->GetHouseholdStatus(), Person::HouseholdStatusHeadOfOne, 'HouseholdStatusHeadOfOne incorrect');
			$this->AssertEquals($this->objMultiplePersonHousehold1->HeadPerson->GetHouseholdStatus(), Person::HouseholdStatusHeadOfFamily, 'HouseholdStatusHeadOfFamily incorrect');
			$this->AssertEquals($this->objMultiplePersonHousehold2->HeadPerson->GetHouseholdStatus(), Person::HouseholdStatusHeadOfFamily, 'HouseholdStatusHeadOfFamily incorrect');

			$this->AssertEquals($this->objMultiplePersonHousehold1->CountHouseholdParticipations(), 3);
			$this->AssertEquals($this->objMultiplePersonHousehold2->CountHouseholdParticipations(), 3);
		}

		/**
		 * @expectedException QCallerException
		 */
		public function testMultipleHeadRestriction() {
			$this->objMultiplePersonHousehold1->AssociatePerson($this->objSinglePersonHousehold->HeadPerson);
		}

		/**
		 * @expectedException QCallerException
		 */
		public function testRemoveHeadRestriction() {
			$this->objMultiplePersonHousehold1->UnassociatePerson($this->objMultiplePersonHousehold1->HeadPerson);
		}

		/**
		 * @expectedException QCallerException
		 */
		public function testHeadWhileMultipleRestriction() {
			$this->objMultiplePersonHousehold1->SetAsHeadPerson($this->objMemberOfMany);
		}
		
		/**
		 * @expectedException QCallerException
		 */
		public function testHeadWhileNotInFamilyRestriction() {
			$this->objMultiplePersonHousehold1->SetAsHeadPerson($this->objIndividual);
		}

		public function testAssociateAndUnassociatePerson() {
			$this->objMultiplePersonHousehold1->AssociatePerson($this->objIndividual);
			$this->AssertEquals($this->objMultiplePersonHousehold1->CountHouseholdParticipations(), 4, 'AssociatePerson Count incorrect');
			$this->AssertEquals($this->objIndividual->GetHouseholdStatus(), Person::HouseholdStatusMemberOfOne, 'AssociatePerson HouseholdStatusMemberOfOne incorrect');

			$this->AssertNotNull(HouseholdParticipation::LoadByPersonIdHouseholdId($this->objIndividual->Id, $this->objMultiplePersonHousehold1->Id), 'AssociatePerson failed');

			$objOldHead = $this->objMultiplePersonHousehold1->HeadPerson;
			$this->objMultiplePersonHousehold1->SetAsHeadPerson($this->objIndividual);
			$this->AssertEquals($this->objIndividual->GetHouseholdStatus(), Person::HouseholdStatusHeadOfFamily, 'AssociatePerson HouseholdStatusHeadOfFamily incorrect');

			$this->objMultiplePersonHousehold1->SetAsHeadPerson($objOldHead);
			$this->objIndividual = Person::Load($this->objIndividual->Id);
			$this->AssertEquals($this->objIndividual->GetHouseholdStatus(), Person::HouseholdStatusMemberOfOne, 'AssociatePerson HouseholdStatusMemberOfOne incorrect');

			$this->objMultiplePersonHousehold1->UnassociatePerson($this->objIndividual);
			$this->AssertEquals($this->objIndividual->GetHouseholdStatus(), Person::HouseholdStatusNone, 'UnassociatePerson HouseholdStatusNone failed');
		}

		public function testMergeHouseholds() {
			$objOldHead = $this->objMultiplePersonHousehold1->HeadPerson;
			$objHeadPerson = Person::CreatePerson('HeadOfOne', null, 'Person', true);
			$objMergeHousehold = Household::CreateHousehold($objHeadPerson);

			$this->objMultiplePersonHousehold1->MergeHousehold($objMergeHousehold, $objHeadPerson);
			$this->AssertNull(Household::Load($objMergeHousehold->Id), 'MergeHousehold did not delete merged household');
			$this->AssertEquals($this->objMultiplePersonHousehold1->CountHouseholdParticipations(), 4, 'MergeHousehold Person Count incorrect');

			$objOldHead = Person::Load($objOldHead->Id);
			$this->AssertEquals($objOldHead->GetHouseholdStatus(), Person::HouseholdStatusMemberOfOne, 'MergeHousehold OldHead Status incorrect');
			$objHeadPerson = Person::Load($objHeadPerson->Id);
			$this->AssertEquals($objHeadPerson->GetHouseholdStatus(), Person::HouseholdStatusHeadOfFamily, 'MergeHousehold NewHead Status incorrect');

			$this->objMultiplePersonHousehold1->SetAsHeadPerson($objOldHead);
			$this->objMultiplePersonHousehold1->UnassociatePerson($objHeadPerson);
			$this->AssertEquals($this->objMultiplePersonHousehold1->CountHouseholdParticipations(), 3, 'MergeHousehold Person Count incorrect');
			$objHeadPerson->Delete();
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