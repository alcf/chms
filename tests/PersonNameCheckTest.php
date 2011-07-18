<?php 
	class PersonNaeCheckTest extends PHPUnit_Framework_TestCase {
		public function testNameCheck() {
			$objPerson = new Person();
			$objPerson->FirstName = 'Michael';
			$objPerson->Nickname = 'Mitch, Mike';
			$objPerson->LastName = 'Hoffman-Griffith';
			$objPerson->PriorLastNames = 'Joséfina';

			$this->AssertTrue($objPerson->CheckName('Michael', 'Hoffman Griffith'));
			$this->AssertTrue($objPerson->CheckName('Mitch', 'Josefina'));
			$this->AssertTrue($objPerson->CheckName('Mike', 'Josefina'));
			$this->AssertFalse($objPerson->CheckName('Michael', 'Hoffman'));
		}
	}
?>