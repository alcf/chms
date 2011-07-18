<?php
	require(__DATAGEN_CLASSES__ . '/EventSignupFormGen.class.php');

	/**
	 * The EventSignupForm class defined here contains any
	 * customized code for the EventSignupForm class in the
	 * Object Relational Model.  It represents the "event_signup_form" table 
	 * in the database, and extends from the code generated abstract EventSignupFormGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class EventSignupForm extends EventSignupFormGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objEventSignupForm->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('EventSignupForm Object %s',  $this->intSignupFormId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'GeneratedDescription':
					if ($this->strLocation || $this->dttDateStart || $this->dttDateEnd) {
						$strToReturn = ', to be held';
						if ($this->strLocation) {
							$strToReturn .= ' at ' . $this->strLocation;
						}

						if ($this->dttDateStart && $this->dttDateEnd) {
							$dttCompare1 = new QDateTime($this->dttDateStart);
							$dttCompare2 = new QDateTime($this->dttDateEnd);
							$dttCompare1->SetTime(null, null, null);
							$dttCompare2->SetTime(null, null, null);
							if ($dttCompare1->IsEqualTo($dttCompare2)) {
								$strToReturn .= ' on ' . $this->dttDateStart->ToString('MMMM D YYYY');
								$strToReturn .= ' from ' . $this->dttDateStart->ToString('h:mm z');
								$strToReturn .= ' to ' . $this->dttDateEnd->ToString('h:mm z');
							} else {
								$strToReturn .= ' from ' . $this->dttDateStart->ToString('MMMM D');
								$strToReturn .= ' to ' . $this->dttDateEnd->ToString('MMMM D YYYY');
							}

						} else if ($this->dttDateStart) {
							$strToReturn .= ' on ' . $this->dttDateStart->ToString('MMMM D YYYY');
							if ($this->dttDateStart->Hour || $this->dttDateStart->Minute) $strToReturn .= ' @ ' . $this->dttDateStart->ToString('h:mm z');

						} else if ($this->dttDateEnd) {
							$strToReturn .= ' until ' . $this->dttDateEnd->ToString('MMMM D YYYY');
							if ($this->dttDateStart->Hour || $this->dttDateEnd->Minute) $strToReturn .= ' @ ' . $this->dttDateEnd->ToString('h:mm z'); 
						}

						return $strToReturn;
					} else {
						return null;
					}
					break;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of EventSignupForm objects
			return EventSignupForm::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::EventSignupForm()->Param1, $strParam1),
					QQ::GreaterThan(QQN::EventSignupForm()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single EventSignupForm object
			return EventSignupForm::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EventSignupForm()->Param1, $strParam1),
					QQ::GreaterThan(QQN::EventSignupForm()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of EventSignupForm objects
			return EventSignupForm::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::EventSignupForm()->Param1, $strParam1),
					QQ::Equal(QQN::EventSignupForm()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = EventSignupForm::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`event_signup_form`.*
				FROM
					`event_signup_form` AS `event_signup_form`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return EventSignupForm::InstantiateDbResult($objDbResult);
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