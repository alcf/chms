<?php
	require(__DATAGEN_CLASSES__ . '/CommunicationListGen.class.php');

	/**
	 * The CommunicationList class defined here contains any
	 * customized code for the CommunicationList class in the
	 * Object Relational Model.  It represents the "communication_list" table 
	 * in the database, and extends from the code generated abstract CommunicationListGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class CommunicationList extends CommunicationListGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objCommunicationList->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('CommunicationList Object %s',  $this->intId);
		}

		public function Delete() {
			try {
				$this->UnassociateAllPeople();
				$this->UnassociateAllCommunicationListEntries();
				$this->DeleteAllEmailMessageRoutes();
				parent::Delete();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
		
		/**
		 * Associates an Email/Name/Etc. to this communication list
		 * @param string $strEmail
		 * @param string $strFirstName
		 * @param string $strMiddleName
		 * @param string $strLastName
		 * @return CommunicationListEntry
		 */
		public function AddEntry($strEmail, $strFirstName, $strMiddleName, $strLastName) {
			$strEmail = strtolower($strEmail);
			if (!($objEntry = CommunicationListEntry::LoadByEmail($strEmail))) {
				$objEntry = new CommunicationListEntry();
				$objEntry->Email = $strEmail;
			}

			$objEntry->FirstName = $strFirstName;
			$objEntry->MiddleName = $strMiddleName;
			$objEntry->LastName = $strLastName;
			$objEntry->Save();

			if (!$this->IsCommunicationListEntryAssociated($objEntry)) $this->AssociateCommunicationListEntry($objEntry);
			return $objEntry;
		}

		public function CountMembers() {
			return $this->CountCommunicationListEntries() + $this->CountPeople();
		}

		/**
		 * This returnas an Array of Arrays representing the membership for this communication list.
		 * Each array item is an array with the following indexes:
		 * 	0 - FirstName
		 * 	1 - MiddleName
		 *  2 - LastName
		 *  3 - Email
		 *  4 - PersonId (if the record is actually linked to a Person ID)
		 *  5 - EntryId (if the record is simply a CommunicationListEntry)
		 *  6 - MembershipFlag (if the record is actually linked to a person ID, 'Y' for yes and '' for no.  If not linked to a person ID, it will be '?')
		 * @param string $strOrderByColumn as column_index,descending_flag
		 * @param string $strLimitInfo as offset,items_per_page
		 * @return string[][]
		 */
		public function GetMemberAsArray($strOrderByColumn = null, $strLimitInfo = null) {
			$strArrayToReturn = array();
			foreach ($this->GetCommunicationListEntryArray() as $objEntry) {
				$strArrayToReturn[] = array($objEntry->FirstName, $objEntry->MiddleName, $objEntry->LastName, $objEntry->Email, null, $objEntry->Id, '?');
			}
			foreach ($this->GetPersonArray() as $objPerson) {
				$strEmail = $objPerson->GetEmailToUseForCommLists();
				$strArrayToReturn[] = array($objPerson->FirstName, $objPerson->MiddleName, $objPerson->LastName, $strEmail, $objPerson->Id, null,
					($objPerson->MembershipStatusTypeId == MembershipStatusType::Member) ? 'Y' : '');
			}

			if ($strOrderByColumn) {
				$strArray = explode(',', $strOrderByColumn);
				$this->intColumnIndex = $strArray[0];
				$this->blnDescendingFlag = $strArray[1];
				usort($strArrayToReturn, array($this, 'SortMemberArray'));
			}

			if ($strLimitInfo) {
				$intArray = explode(',', $strLimitInfo);
				$intOffset = $intArray[0];
				$intItemsPerPage = $intArray[1];
				return array_slice($strArrayToReturn, $intOffset, $intItemsPerPage);
			} else {
				return $strArrayToReturn;
			}
		}

		protected $intColumnIndex;
		protected $blnDescendingFlag;
		public function SortMemberArray($arrMember1, $arrMember2) {
			if (!$this->blnDescendingFlag)
				return strcmp($arrMember1[$this->intColumnIndex], $arrMember2[$this->intColumnIndex]);
			else
				return strcmp($arrMember2[$this->intColumnIndex], $arrMember1[$this->intColumnIndex]);
		}

		/**
		 * Can the Login edit this CommList information (based on Login roles / ministry assignments)
		 * @param Login $objLogin
		 * @return boolean
		 */
		public function IsLoginCanEdit(Login $objLogin) {
			// Administrators can always view
			if ($objLogin->RoleTypeId == RoleType::ChMSAdministrator) return true;

			// Otherwise, only ministry members can edit
			return $objLogin->IsMinistryAssociated($this->Ministry);
		}

		/**
		 * Quick check to see if "Anyone" can send an email through this list.  This
		 * only works of this has a broadcast type of PublicList.
		 * @return boolean
		 */
		public function IsAnyoneCanSendEmail() {
			return $this->intEmailBroadcastTypeId == EmailBroadcastType::PublicList;
		}

		/**
		 * Calculates whether or not a given Login object is allowed to send emails
		 * to this Communication List.  Return true if the Login can.  Returns false
		 * if the Login is not allowed to.
		 * @param Login $objLogin
		 * @return boolean
		 */
		public function IsLoginCanSendEmail(Login $objLogin) {
			switch ($this->intEmailBroadcastTypeId) {
				case EmailBroadcastType::PublicList:
					return true;

				case EmailBroadcastType::PrivateList:
					return $this->IsLoginCanEdit($objLogin);

				case EmailBroadcastType::AnnouncementOnly:
					return $this->IsLoginCanEdit($objLogin);

				default:
					return false;
			}
		}

		/**
		 * Calculates whether or not a given Person object is allowed to send emails
		 * to this CommList.  Return true if the Person can.  Returns false
		 * if the Person is not allowed to.
		 * @param Person $objPerson
		 * @return boolean
		 */
		public function IsPersonCanSendEmail(Person $objPerson) {
			switch ($this->intEmailBroadcastTypeId) {
				case EmailBroadcastType::PublicList:
					return true;

				case EmailBroadcastType::PrivateList:
					return $this->IsPersonAssociated($objPerson);

				case EmailBroadcastType::AnnouncementOnly:
					return false;

				default:
					return false;
			}
		}
		
		/**
		 * Calculates whether or not a given CommListEntry is allowed to send emails
		 * to this CommList.  Return true if the CommListEntry can.  Returns false
		 * if the CommListEntry is not allowed to.
		 * @param CommunicationListEntry $objCommunicationListEntry
		 * @return boolean
		 */
		public function IsCommunicationListEntryCanSendEmail(CommunicationListEntry $objCommunicationListEntry) {
			switch ($this->intEmailBroadcastTypeId) {
				case EmailBroadcastType::PublicList:
					return true;

				case EmailBroadcastType::PrivateList:
					return $this->IsCommunicationListEntryAssociated($objCommunicationListEntry);

				case EmailBroadcastType::AnnouncementOnly:
					return false;

				default:
					return false;
			}
		}

		protected $strSomeNewProperty;
		
		public function __get($strName) {
			switch ($strName) {
				case 'CsvFilename': 
					$strName = $this->strName;
					$strToReturn = null;
					for ($i = 0; $i < strlen($strName); $i++) {
						$intOrd = ord($strName[$i]);
						if ((($intOrd >= ord('a')) && ($intOrd <= ord('z'))) ||
							(($intOrd >= ord('A')) && ($intOrd <= ord('Z'))) ||
							(($intOrd >= ord('0')) && ($intOrd <= ord('9'))))
							$strToReturn .= $strName[$i];
					}
					return $strToReturn . '.csv';
		
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
			// This will return an array of CommunicationList objects
			return CommunicationList::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::CommunicationList()->Param1, $strParam1),
					QQ::GreaterThan(QQN::CommunicationList()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single CommunicationList object
			return CommunicationList::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CommunicationList()->Param1, $strParam1),
					QQ::GreaterThan(QQN::CommunicationList()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of CommunicationList objects
			return CommunicationList::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::CommunicationList()->Param1, $strParam1),
					QQ::Equal(QQN::CommunicationList()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = CommunicationList::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`communication_list`.*
				FROM
					`communication_list` AS `communication_list`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return CommunicationList::InstantiateDbResult($objDbResult);
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