<?php
	require(__DATAGEN_CLASSES__ . '/EmailMessageRouteGen.class.php');

	/**
	 * The EmailMessageRoute class defined here contains any
	 * customized code for the EmailMessageRoute class in the
	 * Object Relational Model.  It represents the "email_message_route" table 
	 * in the database, and extends from the code generated abstract EmailMessageRouteGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class EmailMessageRoute extends EmailMessageRouteGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objEmailMessageRoute->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('EmailMessageRoute Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Token':
					if ($this->Group) return $this->Group->Token;
					return $this->CommunicationList->Token;

				case 'Name':
					if ($this->Group) return $this->Group->Name;
					return $this->CommunicationList->Name;

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
		 * This will create a New EmailMessageRoute object for a given EmailMessage.
		 * You must specify the Source object (which is either a Login, CommListEntry or Person) and
		 * the Destination object (which is either a Group or CommList).
		 * 
		 * This will throw a QCallerException if the route is invalid.
		 * 
		 * @param EmailMessage $objEmailMessage
		 * @param object $objSource must be a Login, CommunicationListEntry or Person object (can be null for public lists)
		 * @param object $objDestination must be a Group or CommunicationList object
		 * @return EmailMessageRoute
		 */
		public static function CreateNewRoute(EmailMessage $objEmailMessage, $objSource = null, $objDestination = null) {
			$objRoute = new EmailMessageRoute();
			$objRoute->EmailMessage = $objEmailMessage;

			if ($objSource instanceof Login) {
				$objRoute->Login = $objSource;
			} else if ($objSource instanceof CommunicationListEntry) {
				$objRoute->CommunicationListEntry = $objSource;
			} else if ($objSource instanceof Person) {
				$objRoute->Person= $objSource;
			} else if (!is_null($objSource)) {
				throw new QCallerException('Invalid Source for EmailMessageRoute');
			}

			if ($objDestination instanceof Group) {
				$objRoute->Group = $objDestination;
			} else if ($objDestination instanceof CommunicationList) {
				$objRoute->CommunicationList = $objDestination;
			} else {
				throw new QCallerException('Invalid Destination for EmailMessageRoute');
			}

			if (is_null($objSource) && ($objDestination->EmailBroadcastTypeId != EmailBroadcastType::PublicList))
				throw new QCallerException('Invalid External Source for EmailMessageRoute to a non PublicList Destination');
			if ($objRoute->CommunicationListEntry && !$objRoute->CommunicationList)
				throw new QCallerException('Invalid CommunicationListEntry Source for EmailMessageRoute to a non CommunicationList Destination');

			$objRoute->Save();
			return $objRoute;
		}

		public function QueueMessages() {
			if ($this->Group) {
				foreach ($this->Group->GetActiveGroupParticipationArray() as $objParticipation) {
					$objPerson = $objParticipation->Person;
					EmailOutgoingQueue::QueueMessage($this->EmailMessage, $this->Group->Token, $objPerson);
					// GJS: At this point, also check if there is a co-primary and include them to the list
					if($objPerson->DateOfBirth && $objPerson->CoPrimary) {
						$objCoPrimary = Person::Load($objPerson->CoPrimary);
						if($objCoPrimary) {
							EmailOutgoingQueue::QueueMessage($this->EmailMessage, $this->Group->Token, $objCoPrimary);
						} 						
					}
				}
				foreach ($this->Group->Ministry->GetLoginArray() as $objLogin) {
					if ($objLogin->DomainActiveFlag && $objLogin->LoginActiveFlag) EmailOutgoingQueue::QueueMessage($this->EmailMessage, $this->Group->Token, $objLogin);
				}
			} else if ($this->CommunicationList) {
				foreach ($this->CommunicationList->GetPersonArray() as $objPerson) {
					EmailOutgoingQueue::QueueMessage($this->EmailMessage, $this->CommunicationList->Token, $objPerson);
				}
				foreach ($this->CommunicationList->GetCommunicationListEntryArray() as $objCommunicationListEntry) {
					EmailOutgoingQueue::QueueMessage($this->EmailMessage, $this->CommunicationList->Token, $objCommunicationListEntry);
				}
				foreach ($this->CommunicationList->Ministry->GetLoginArray() as $objLogin) {
					if ($objLogin->DomainActiveFlag && $objLogin->LoginActiveFlag) EmailOutgoingQueue::QueueMessage($this->EmailMessage, $this->CommunicationList->Token, $objLogin);
				}
			}
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of EmailMessageRoute objects
			return EmailMessageRoute::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::EmailMessageRoute()->Param1, $strParam1),
					QQ::GreaterThan(QQN::EmailMessageRoute()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single EmailMessageRoute object
			return EmailMessageRoute::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EmailMessageRoute()->Param1, $strParam1),
					QQ::GreaterThan(QQN::EmailMessageRoute()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of EmailMessageRoute objects
			return EmailMessageRoute::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::EmailMessageRoute()->Param1, $strParam1),
					QQ::Equal(QQN::EmailMessageRoute()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = EmailMessageRoute::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`email_message_route`.*
				FROM
					`email_message_route` AS `email_message_route`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return EmailMessageRoute::InstantiateDbResult($objDbResult);
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