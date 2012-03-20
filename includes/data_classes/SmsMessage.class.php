<?php
	require(__DATAGEN_CLASSES__ . '/SmsMessageGen.class.php');

	/**
	 * The SmsMessage class defined here contains any
	 * customized code for the SmsMessage class in the
	 * Object Relational Model.  It represents the "sms_message" table 
	 * in the database, and extends from the code generated abstract SmsMessageGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class SmsMessage extends SmsMessageGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objSmsMessage->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('SmsMessage Object %s',  $this->intId);
		}

		/**
		 * Queues a new SMS Message to be sent out
		 * @param Group $objGroup
		 * @param Login $objLogin
		 * @param string $strSubject can be null/blank
		 * @param string $strBody
		 * @return SmsMessage the queued message that has been queued
		 */
		public static function QueueSmsForGroup(Group $objGroup, Login $objLogin, $strSubject, $strBody) {
			$objSmsMessage = new SmsMessage();
			$objSmsMessage->Group = $objGroup;
			$objSmsMessage->Login = $objLogin;
			$objSmsMessage->Subject = trim($strSubject);
			$objSmsMessage->Body = trim($strBody);
			$objSmsMessage->DateQueued = QDateTime::Now();
			$objSmsMessage->Save();
			return $objSmsMessage;
		}

		public function Send() {
			// Do **NOT** send again if it has already been sent!
			if ($this->dttDateSent) return;

			// Store an array of email addresses (SMS-based) to send to
			$strBccArray = array();

			// Get the Group, and get the array for CcArray
			$intPersonIdArray = array();
			foreach ($this->Group->GetActiveGroupParticipationArray() as $objGroupParticipation) {
				// ONly at most one per person
				if (!array_key_exists($objGroupParticipation->PersonId, $intPersonIdArray)) {
					// Get the Person
					$objPerson = $objGroupParticipation->Person;

					// Do we have an SMS?
					if ($objPhone = $objPerson->GetSmsEnabledPhone()) {
						// Yep!  Add it to the list
						$strBccArray[] = $objPhone->SmsEmailAddress;
					}

					// Finally, let's make sure it only gets sent (at most) once per person
					$intPersonIdArray[$objGroupParticipation->PersonId] = $objGroupParticipation->PersonId;
				}
			}

			// Do we have any to send to?
			if (count($strBccArray)) {
				// Yes -- let's send it
				$objEmailMessage = new QEmailMessage($this->Login->Email, $this->Login->Email, $this->strSubject, $this->strBody);
				$objEmailMessage->Bcc = implode(', ', $strBccArray);
				QEmailServer::Send($objEmailMessage);

				$this->DateSent = QDateTime::Now();
				$this->Save();
			} else {
				// No -- let's report it
				$objEmailMessage = new QEmailMessage($this->Login->Email, $this->Login->Email, '[Failed to Send] ' . $this->strSubject, 'The following SMS did NOT send because there were no SMS-enabled group participants: ' . $this->strBody);
				QEmailServer::Send($objEmailMessage);
				$this->Delete();
			}
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of SmsMessage objects
			return SmsMessage::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::SmsMessage()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SmsMessage()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single SmsMessage object
			return SmsMessage::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SmsMessage()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SmsMessage()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of SmsMessage objects
			return SmsMessage::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::SmsMessage()->Param1, $strParam1),
					QQ::Equal(QQN::SmsMessage()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = SmsMessage::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`sms_message`.*
				FROM
					`sms_message` AS `sms_message`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return SmsMessage::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

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