<?php 
	class PersonNaeCheckTest extends PHPUnit_Framework_TestCase {
		public function testNameCheck() {
			$objAddress1 = new Address();
			$objAddress1->Address1 = '123 Main terrace';
			$objAddress1->Address2 = 'apt 3';
			$objAddress1->City = 'City';
			$objAddress1->State = 'CA';
			$objAddress1->ZipCode = '94086-1234';

			$objAddress2 = new Address();
			$objAddress2->Address1 = '123 Main TERRACE';
			$objAddress2->Address2 = 'APT 3';
			$objAddress2->Address3 = 'Residence Inn';
			$objAddress2->City = ' city ';
			$objAddress2->State = 'CA';
			$objAddress2->ZipCode = '94086';

			$objAddress3 = new Address();
			$objAddress3->Address1 = '123 Main Terrace';
			$objAddress3->City = ' city ';
			$objAddress3->State = 'CA';
			$objAddress3->ZipCode = '94086';

			$objAddress4 = new Address();
			$objAddress4->Address1 = '123 Main terr';
			$objAddress4->Address2 = 'apt 3';
			$objAddress4->City = ' city ';
			$objAddress4->State = 'CA';
			$objAddress4->ZipCode = '94086';


			$objAddress5 = new Address();
			$objAddress5->Address1 = '123 Main Terrace';
			$objAddress5->City = ' city ';
			$objAddress5->State = 'CA';
			$objAddress5->ZipCode = '94086-1411';

			$this->AssertTrue($objAddress1->IsEqualTo($objAddress2));
			$this->AssertFalse($objAddress1->IsEqualTo($objAddress3));
			$this->AssertFalse($objAddress1->IsEqualTo($objAddress4));
			$this->AssertTrue($objAddress3->IsEqualTo($objAddress5));
		}
	}
?>