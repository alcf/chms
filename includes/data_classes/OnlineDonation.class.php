<?php
	require(__DATAGEN_CLASSES__ . '/OnlineDonationGen.class.php');

	/**
	 * The OnlineDonation class defined here contains any
	 * customized code for the OnlineDonation class in the
	 * Object Relational Model.  It represents the "online_donation" table 
	 * in the database, and extends from the code generated abstract OnlineDonationGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class OnlineDonation extends OnlineDonationGen {
		/**
		 * Is only used when we are attaching a New Person to this record and need to (eventually) save the household information
		 * @var Address
		 */
		protected $objAddress;

		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objOnlineDonation->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('OnlineDonation Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Hash': return md5(PUBLIC_LOGIN_SALT . $this->intId);
				case 'ConfirmationUrl': return MY_ALCF_URL . '/give/confirmation.php/' . $this->intId . '/' . $this->Hash;
				case 'Address': return $this->objAddress;

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
		 * This will attempt to attach a person given the following information.
		 * It will match only on exact Address (must be current home or current mailing) and First/Last matches.
		 * 
		 * This is typically used when the payment is being submitted without a login.
		 * 
		 * If no match is found, then it will create a new, unsaved person record and link it in.
		 * NOTE: If it's a new person, they will be a standalone individual with OUT a household yet.  Household
		 * should be saved later on after the transaction succeeds.
		 * 
		 * @param string $strFirstName
		 * @param string $strLastName
		 * @param Address $objAddress assumes the Address record has already gone through the validator
		 */
		public function AttachPersonWithInformation($strFirstName, $strLastName, Address $objAddress) {
			// Get possible First/Last matches
			$objPersonArray = Person::LoadArrayByNameMatch($strFirstName, $strLastName);
			$objPerson = null;

			// Go through all the candidates and see if we have an exact match on CURRENT household home or mailing address
			foreach ($objPersonArray as $objPersonCandidate) {
				foreach ($objPersonCandidate->GetHouseholdParticipationArray() as $objHouseholdParticipation) {
					if (!$objPerson &&
						($objHomeAddress = $objHouseholdParticipation->Household->GetCurrentAddress()) &&
						$objHomeAddress->IsEqualTo($objAddress)) {
						// We found an exact match on the current home address
						$objPerson = $objPersonCandidate;
					}
				}

				// Check against mailing address
				if (!$objPerson && $objPersonCandidate->MailingAddress &&
					$objPersonCandidate->MailingAddress->IsEqualTo($objAddress)) {
					// We found an exact match on the current Mailing address
					$objPerson = $objPersonCandidate;
				}
			}

			// Attach a matched person
			if ($objPerson) {
				$this->Person = $objPerson;
			} else {
				// Create as a new person
				$this->Person = Person::CreatePerson($strFirstName, null, $strLastName, null);
				$this->objAddress = $objAddress;
			}
		}

		/**
		 * This will send a confirmation email for the OnlineDonation item
		 * @param string $strToAddress an explicitly set EmailAddress to send, or if null, it will try and deduce it from the attached person record
		 */
		public function SendConfirmationEmail($strToAddress = null) {
			// Template
			$strTemplateName = 'online_donation';

			// Calculate Email Address - THIS WILL RETURN if none is found
			$strFromAddress = 'ALCF Online Donation <do_not_reply@alcf.net>';
			if (!$strToAddress) $strToAddress = $this->CalculateConfirmationEmailAddress();
			if (!$strToAddress) return;
			$strSubject = 'Your Online Donation';

			// Setup the SubstitutionArray
			$strArray = array();

			// Setup Always-Used Fields
			$strArray['PERSON_NAME'] = $this->Person->Name;
			$strArray['ONLINE_DONATION_ID'] = sprintf('%05s', $this->Id);
			
			// Add Payment Info
			$strArray['AMOUNT'] = QApplication::DisplayCurrency($this->Amount);
			$strArray['CREDIT_CARD'] = $this->CreditCardPayment->CreditCardDescription;
			
			$strProductArray = array();
			foreach ($this->GetOnlineDonationLineItemArray() as $objLineItem) {
				$strProductArray[] = sprintf('%s  -  %s',
					($objLineItem->StewardshipFund) ? $objLineItem->StewardshipFund->ExternalName : $objLineItem->Other,
					QApplication::DisplayCurrency($objLineItem->Amount));
			}
			$strArray['PAYMENT_ITEMS'] = implode("\r\n", $strProductArray);

			OutgoingEmailQueue::QueueFromTemplate($strTemplateName, $strArray, $strToAddress, $strFromAddress, $strSubject, null, trim(Registry::GetValue('donation_receipt_bcc')));
		}

		/**
		 * Given various properties of the signup itself, the person who is registered, and the one who is registering "on behalf of",
		 * this will calculate the correct email address to send out to
		 * @return string a string containing the email address to send out to
		 */
		public function CalculateConfirmationEmailAddress() {
			// If we are here, then we need to check against the person
			if ($this->Person->PrimaryEmail) return $this->Person->PrimaryEmail->Address;
			if (count($objArray = $this->Person->GetEmailArray())) return $objArray[0]->Address;

			// If we are here, then we couldn't flat out find any email addresses -- so return null;
			return null;
		}

		public function RefreshDetailsWithCreditCardPayment($blnSave = true) {
			$this->Amount = $this->CreditCardPayment->AmountCharged;
			if ($blnSave) $this->Save();
		}

		/**
		 * This will return an indexed array of amounts, indexed by the stewardship fund id
		 * @return mix[][] an array of arrays, where each item has the 0th index item being the StewardshipFundId and the 1st index being the amount
		 */
		public function GetAmountArray() {
			$mixArrayToReturn = array();
			foreach ($this->GetOnlineDonationLineItemArray() as $objLineItem) {
				$mixArrayToReturn[] = array($objLineItem->StewardshipFundId, $objLineItem->Amount);
			}
			
			return $mixArrayToReturn;
		}
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of OnlineDonation objects
			return OnlineDonation::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::OnlineDonation()->Param1, $strParam1),
					QQ::GreaterThan(QQN::OnlineDonation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single OnlineDonation object
			return OnlineDonation::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OnlineDonation()->Param1, $strParam1),
					QQ::GreaterThan(QQN::OnlineDonation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of OnlineDonation objects
			return OnlineDonation::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::OnlineDonation()->Param1, $strParam1),
					QQ::Equal(QQN::OnlineDonation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = OnlineDonation::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`online_donation`.*
				FROM
					`online_donation` AS `online_donation`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return OnlineDonation::InstantiateDbResult($objDbResult);
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