<?php
	require(__DATAGEN_CLASSES__ . '/PersonGen.class.php');

	/**
	 * The Person class defined here contains any
	 * customized code for the Person class in the
	 * Object Relational Model.  It represents the "person" table 
	 * in the database, and extends from the code generated abstract PersonGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class Person extends PersonGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPerson->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Person Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Name':
					if ($this->strNickname)
						return sprintf('%s "%s" %s', $this->strFirstName, $this->strNickname, $this->strLastName);
					else
						return $this->strFirstName . ' ' . $this->strLastName;

				case 'FormalName':
					$strToReturn = null;
					
					if ($this->strTitle)
						$strToReturn .= $this->strTitle . ' ';

					$strToReturn .= $this->strFirstName . ' ';
					
					if ($this->strMiddleName) {
						if (strlen($this->strMiddleName) == 1)
							$strToReturn .= $this->strMiddleName . '. ';
						else
							$strToReturn .= $this->strMiddleName . ' ';
					}

					$strToReturn .= $this->strLastName;
					
					if ($this->strSuffix)
						$strToReturn .= ', ' . $this->strSuffix;

					return $strToReturn;

				case 'ActiveMailingLabel':
					if ($this->strMailingLabel)
						return $this->strMailingLabel;
					else
						return $this->Name;

				case 'Gender':
					return $this->blnMaleFlag ? 'Male' : 'Female';

				case 'Birthdate':
					if (!$this->dttDateOfBirth) return null;
					$strToReturn = $this->dttDateOfBirth->__toString('MMMM D, YYYY');
					$intAge = $this->Age;
					$strToReturn .= sprintf(' - %s year%s old', $intAge, ($intAge != 1) ? 's' : '');
					if ($this->blnDobApproximateFlag)
						$strToReturn .= ' (approx.)';
					return $strToReturn; 
				case 'Age':
					if (!$this->dttDateOfBirth) return null;
					return QDateTime::Now()->Difference($this->dttDateOfBirth)->Years;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Calcluates based on this person's birthdate whether or not the person is less than 18 years old.
		 * If the person is 18 or older, OR if no birthdate is specified, then this will return false.
		 * @return boolean whether or not the person is a child
		 */
		public function IsChild() {
			if (!$this->DateOfBirth) return false;

			$dtt18YearsAgo = QDateTime::Now(false);
			$dtt18YearsAgo->Year -= 18;
			return $this->DateOfBirth->IsEarlierOrEqualTo($dtt18YearsAgo);
		}


		/**
		 * Recalculates this member's Membership Status and updates MembershipStatusTypeId
		 * based on the calculation.  Will call save if asked to do so
		 * @param boolean $blnSave whether or not to call save after updating
		 * @return integer the new/updated TypeId
		 */
		public function RefreshMembershipStatusTypeId($blnSave = true) {
			// If this Individual record isn't saved yet, then we are automatically not a member
			if (!$this->intId) {
				$this->intMembershipStatusTypeId = MembershipStatusType::NonMember;
				if ($blnSave) $this->Save();
				return $this->intMembershipStatusTypeId;
			}
			
			// Pull the most recent Membership
			$objMembership = Membership::QuerySingle(QQ::Equal(QQN::Membership()->PersonId, $this->intId), QQ::OrderBy(QQN::Membership()->DateStart, false));

			// If no membership
			if (!$objMembership) {
				// TODO: Check to see if "Child of Member"
				
				$this->intMembershipStatusTypeId = MembershipStatusType::NonMember;
				if ($blnSave) $this->Save();
				return $this->intMembershipStatusTypeId;
			}

			// If no EndDate, or EndDate is in the future
			if (!$objMembership->DateEnd || $objMembership->DateEnd->IsLaterThan(QDateTime::Now(false))) {
				$this->intMembershipStatusTypeId = MembershipStatusType::Member;
				if ($blnSave) $this->Save();
				return $this->intMembershipStatusTypeId;
			}

			// Otherwise, we are a Past member
			$this->intMembershipStatusTypeId = MembershipStatusType::FormerMember;
			if ($blnSave) $this->Save();
			return $this->intMembershipStatusTypeId;
		}

		/**
		 * Recalculates this member's Marital Status and updates MaritalStatusTypeId
		 * based on the calculation.  Will call save if asked to do so
		 * @param boolean $blnSave whether or not to call save after updating
		 * @return integer the new/updated TypeId
		 */
		public function RefreshMaritalStatusTypeId($blnSave = true) {
			// If this Individual record isn't saved yet, then we are automatically Not Specified
			if (!$this->intId) {
				$this->intMaritalStatusTypeId = MaritalStatusType::NotSpecified;
				if ($blnSave) $this->Save();
				return $this->intMaritalStatusTypeId;
			}

			// Pull the most recent Marriage
			$objMarriage = Marriage::QuerySingle(QQ::Equal(QQN::Marriage()->PersonId, $this->intId), QQ::OrderBy(QQN::Marriage()->DateStart, false));

			// If no marriage
			if (!$objMarriage) {
				// If we were previously specified as Single, then keep it -- otherwise, we are "Not Specified"
				if ($this->intMaritalStatusTypeId == MaritalStatusType::Single) {
					$this->intMaritalStatusTypeId = MaritalStatusType::Single;
				} else {
					$this->intMaritalStatusTypeId = MaritalStatusType::NotSpecified;
				}
				if ($blnSave) $this->Save();
				return $this->intMaritalStatusTypeId;
			}

			// There was a marriage -- marital status is dependent on the marriage status
			switch ($objMarriage->MarriageStatusTypeId) {
				case MarriageStatusType::Married:
					$this->intMaritalStatusTypeId = MaritalStatusType::Married;
					break;
				case MarriageStatusType::Separated:
					$this->intMaritalStatusTypeId = MaritalStatusType::Separated;
					break;
				default:
					$this->intMaritalStatusTypeId = MaritalStatusType::Single;
					break;
			}

			if ($blnSave) $this->Save();
			return $this->intMaritalStatusTypeId;
		}
		
		/**
		 * Creates a new Marriage record and refreshes the marrital status for both this person and the spouse
		 * @param Person $objSpouse the spouse
		 * @param QDateTime $dttStartDate the start date of the marriage
		 * @return Marriage
		 */
		public function CreateMarriageWith(Person $objSpouse, QDateTime $dttStartDate = null) {
			$objMarriage = new Marriage();
			$objMarriage->Person = $this;
			$objMarriage->MarriedToPerson = $objSpouse;
			$objMarriage->MarriageStatusTypeId = MarriageStatusType::Married;
			$objMarriage->DateStart = $dttStartDate;
			$objMarriage->Save();

			$objOtherMarriage = new Marriage();
			$objOtherMarriage->Person = $objSpouse;
			$objOtherMarriage->MarriedToPerson = $this;
			$objOtherMarriage->MarriageStatusTypeId = MarriageStatusType::Married;
			$objOtherMarriage->DateStart = $dttStartDate;
			$objOtherMarriage->Save();

			$this->RefreshMaritalStatusTypeId();
			$objSpouse->RefreshMaritalStatusTypeId();
			
			return $objMarriage;
		}

		/**
		 * Given a temporary file path on the server, this will save the file as a HeadShot for this Person
		 * @param string $strTempFilePath
		 * @param QDateTime $dttDateUploaded optional parameter -- will be set to Now() if null is passed in
		 * @return HeadShot
		 */
		public function SaveHeadShot($strTempFilePath, $dttDateUploaded = null) {
			$objHeadShot = new HeadShot();
			$objHeadShot->PersonId = $this->intId;
			$objHeadShot->DateUploaded = ($dttDateUploaded) ? $dttDateUploaded : QDateTime::Now();
			$objHeadShot->SaveHeadShot($strTempFilePath);
			
			return $objHeadShot;
		}

		public function SetCurrentHeadShot(HeadShot $objHeadShot) {
			if ($objHeadShot->PersonId != $this->intId)
				throw new QCallerException('Cannot set Current headshot for a headshot that does not belong to this person');
			$this->CurrentHeadShot = $objHeadShot;
			$this->Save();
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Person objects
			return Person::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Person()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Person object
			return Person::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Person()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Person objects
			return Person::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Param1, $strParam1),
					QQ::Equal(QQN::Person()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`person`.*
				FROM
					`person` AS `person`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Person::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>