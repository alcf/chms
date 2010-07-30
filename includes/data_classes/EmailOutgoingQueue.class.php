<?php
	require(__DATAGEN_CLASSES__ . '/EmailOutgoingQueueGen.class.php');

	/**
	 * The EmailOutgoingQueue class defined here contains any
	 * customized code for the EmailOutgoingQueue class in the
	 * Object Relational Model.  It represents the "email_outgoing_queue" table 
	 * in the database, and extends from the code generated abstract EmailOutgoingQueueGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class EmailOutgoingQueue extends EmailOutgoingQueueGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objEmailOutgoingQueue->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('EmailOutgoingQueue Object %s',  $this->intId);
		}

		/**
		 * Queues a given message, with a token (from the group or commlist we are sending to) and a recipient,
		 * which can be a Person, Login or CommunicationListEntry object.
		 * 
		 * Note that this does **NO** validation.  It is assumed that any call to this has already validated
		 * the message, recipient and list to be valid.
		 * 
		 * @param EmailMessage $objMessage
		 * @param string $strToken
		 * @param mixed $objRecipient
		 * @return EmailOutgoingQueue
		 */
		public static function QueueMessage(EmailMessage $objMessage, $strToken, $objRecipient) {
			$objQueue = new EmailOutgoingQueue();
			$objQueue->EmailMessage = $objMessage;
			$objQueue->Token = $strToken;

			if ($objRecipient instanceof Login) {
				$objQueue->ToAddress = $objRecipient->Email;
			} else if ($objRecipient instanceof CommunicationListEntry) {
				$objQueue->ToAddress = $objRecipient->Email;
			} else if ($objRecipient instanceof Person) {
				if ($objRecipient->PrimaryEmail)
					$objQueue->ToAddress = $objRecipient->PrimaryEmail->Address;
				else if (count($objEmailArray = $objRecipient->GetEmailArray()))
					$objQueue->ToAddress = $objEmailArray[0]->Address;
			} else {
				throw new QCallerException('Recipient must be a Login, Person or CommunicationListEntry object');
			}

			if ($objQueue->ToAddress) {
				$objQueue->Save();
				return $objQueue;
			} else {
				return null;
			}
		}

		/**
		 * If the EmailMessage has an error, then this will queue the bounceback/error message
		 * to be sent back to the Sender.
		 * 
		 * Note that this does **NO** validation.  It is assumes that the EmailMessage has a Error / Bounceback
		 * message set.
		 * 
		 * @param EmailMessage $objMessage
		 * @param string $strSenderEmailAddress
		 * @return EmailOutgoingQueue
		 */
		public static function QueueError(EmailMessage $objMessage) {
			$objQueue = new EmailOutgoingQueue();
			$objQueue->EmailMessage = $objMessage;
			$objQueue->ErrorFlag = true;
			$objQueue->ToAddress = $objMessage->FromAddress;
			$objQueue->Save();

			return $objQueue;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of EmailOutgoingQueue objects
			return EmailOutgoingQueue::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::EmailOutgoingQueue()->Param1, $strParam1),
					QQ::GreaterThan(QQN::EmailOutgoingQueue()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single EmailOutgoingQueue object
			return EmailOutgoingQueue::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EmailOutgoingQueue()->Param1, $strParam1),
					QQ::GreaterThan(QQN::EmailOutgoingQueue()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of EmailOutgoingQueue objects
			return EmailOutgoingQueue::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::EmailOutgoingQueue()->Param1, $strParam1),
					QQ::Equal(QQN::EmailOutgoingQueue()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = EmailOutgoingQueue::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`email_outgoing_queue`.*
				FROM
					`email_outgoing_queue` AS `email_outgoing_queue`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return EmailOutgoingQueue::InstantiateDbResult($objDbResult);
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