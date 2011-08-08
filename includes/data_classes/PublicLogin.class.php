<?php
	require(__DATAGEN_CLASSES__ . '/PublicLoginGen.class.php');

	/**
	 * The PublicLogin class defined here contains any
	 * customized code for the PublicLogin class in the
	 * Object Relational Model.  It represents the "public_login" table 
	 * in the database, and extends from the code generated abstract PublicLoginGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class PublicLogin extends PublicLoginGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPublicLogin->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('PublicLogin Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'FooBar': return $this->strSomeNewProperty;

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
		 * This will email the Username information (or Usernames) for a given Email address,
		 * if any is found.  If none is found, this will do nothing.
		 * @param string $strEmailAddress
		 */
		public static function RetrieveUsernameForEmail($strEmailAddress) {
			// Look for associated accounts
			$objPublicLoginArray = PublicLogin::QueryArray(
				QQ::Equal(QQN::PublicLogin()->Person->PrimaryEmail->Address, $strEmailAddress),
				QQ::Expand(QQN::PublicLogin()->Person)
			);

			// If none found, return
			if (!count($objPublicLoginArray)) {
				// Setup email info
				$strFromAddress = 'ALCF my.alcf Account Support <do_not_reply@alcf.net>';
				$strToAddress = trim(strtolower($strEmailAddress));
				$strSubject = 'Account Support: Retreive Your Username';

				// Setup the SubstitutionArray
				$strArray = array();

				// Setup Always-Used Fields
				$strArray['CONTACT'] = strip_tags(Registry::GetValue('contact_sentence_my_alcf_support'));
				$strArray['EMAIL'] = $strEmailAddress;

				$strTemplateName = 'retrieve_username_none';
				OutgoingEmailQueue::QueueFromTemplate($strTemplateName, $strArray, $strToAddress, $strFromAddress, $strSubject);

				return;
			}

			// Setup email info
			$strFromAddress = 'ALCF my.alcf Account Support <do_not_reply@alcf.net>';
			$strToAddress = trim(strtolower($strEmailAddress));
			$strSubject = 'Account Support: Retreive Your Username';

			// Setup the SubstitutionArray
			$strArray = array();

			// Setup Always-Used Fields
			$strArray['PERSON_NAME'] = $objPublicLoginArray[0]->Person->Name;
			$strArray['CONTACT'] = strip_tags(Registry::GetValue('contact_sentence_my_alcf_support'));

			if (count($objPublicLoginArray) == 1) {
				// Template
				$strTemplateName = 'retrieve_username_single';
				$strArray['USERNAME'] = $objPublicLoginArray[0]->Username;
			} else {
				// Template
				$strTemplateName = 'retrieve_username_multiple';
				$strUsernameList = array();
				foreach ($objPublicLoginArray as $objPublicLogin) {
					$strUsernameList[] = 'Username:  ' . $objPublicLogin->Username;
				}
				$strArray['USERNAMES'] = implode("\r\n", $strUsernameList);
			}

			OutgoingEmailQueue::QueueFromTemplate($strTemplateName, $strArray, $strToAddress, $strFromAddress, $strSubject);
		}

		/**
		 * This will reset this publiclogin's password and will email the new password to the email account on file.
		 * If no primary email address this will throw an exception.
		 */
		public function ResetPassword() {
			if (!$this->Person->PrimaryEmail->Address) throw new QCallerException('ResetPassword for a PublicLogin record with no attached primary email: ' . $this->Id);
			$strTemporaryPassword = str_replace('0', '', str_replace('1', '', md5(microtime())));
			$strTemporaryPassword = substr($strTemporaryPassword, 0, 6);

			$this->SetPassword($strTemporaryPassword);
			$this->TemporaryPasswordFlag = true;
			$this->Save();

			// Setup email info
			$strFromAddress = 'ALCF my.alcf Account Support <do_not_reply@alcf.net>';
			$strToAddress = $this->Person->PrimaryEmail->Address;
			$strSubject = 'Account Support: Your Temporary Password';

			// Setup the SubstitutionArray
			$strArray = array();

			// Setup Always-Used Fields
			$strArray['PERSON_NAME'] = $this->Person->Name;
			$strArray['PASSWORD'] = $strTemporaryPassword;
			$strArray['CONTACT'] = strip_tags(Registry::GetValue('contact_sentence_my_alcf_support'));

			OutgoingEmailQueue::QueueFromTemplate('reset_password', $strArray, $strToAddress, $strFromAddress, $strSubject);
		}

		/**
		 * Sets the password as the password hash for this user.  Does NOT save the object.
		 * @param string $strPassword
		 * @return void
		 */
		public function SetPassword($strPassword) {
			$strPassword = trim(strtolower($strPassword));
			$strHash = md5(PUBLIC_LOGIN_SALT . $strPassword);
			$this->strPassword = $strHash;
		}

		/**
		 * Checks whether the password is correct, returning true/false
		 * @param string $strPassword
		 * @return boolean
		 */
		public function IsPasswordValid($strPassword) {
			$strPassword = trim(strtolower($strPassword));
			$strHash = md5(PUBLIC_LOGIN_SALT . $strPassword);
			return ($this->strPassword == $strHash);
		}

		/**
		 * Given a username and a password, this will attempt to load the valid PublicLogin object.
		 * @param string $strUsername
		 * @param string $strPassword
		 * @return PublicLogin
		 */
		public static function LoadByUsernamePassword($strUsername, $strPassword) {
			$strUsername = trim(strtolower($strUsername));

			// First, let's get the Login object via Username
			$objLogin = PublicLogin::LoadByUsername($strUsername);

			// If it still fails, indicate so by returning null
			if (!$objLogin) return;

			// If password is incorrect, indicate so by returning null
			if (!$objLogin->IsPasswordValid($strPassword)) return;

			// Return the valid Login object
			return $objLogin;
		}
		
		/**
		 * Whether or not this login is "allowed" to use the VMS
		 * @return boolean
		 */
		public function IsAllowedToUseChms() {
			if (!$this->ActiveFlag) return false;
			if (!$this->Person) return false;
			if ($this->ProvisionalPublicLogin) return false;
			return true;
		}

		/**
		 * Refreshes the date of the "Date Last Login" for this record and saves the record.
		 * @return void
		 */
		public function RefreshDateLastLogin() {
			$this->dttDateLastLogin = QDateTime::Now();
			$this->Save();
		}

		/**
		 * This will create a permanent (non-provisional) public login record for a specific person.
		 * If the person already has a public login record, this will likely throw a database error.
		 * If the username is already taken, this will likely throw a database error.
		 * @param Person $objPerson
		 * @param string $strUsername
		 * @param string $strPassword
		 * @param string $strLostPasswordQuestion
		 * @param string $strLostPasswordAnswer
		 * @return PublicLogin
		 */
		public static function CreateForPerson(Person $objPerson, $strUsername, $strPassword, $strLostPasswordQuestion, $strLostPasswordAnswer) {
			$strUsername = QApplication::Tokenize($strUsername, false);
			if (strlen($strUsername) < 4) throw new QCallerException('Username is too short: ' . $strUsername);
			if (!self::IsProvisionalCreatableForUsername($strUsername)) throw new QCallerException('Username is already taken: ' . $strUsername);
			
			$objPublicLogin = new PublicLogin();
			$objPublicLogin->ActiveFlag = true;
			$objPublicLogin->Person = $objPerson;
			$objPublicLogin->Username = $strUsername;
			$objPublicLogin->SetPassword($strPassword);
			$objPublicLogin->LostPasswordQuestion = trim($strLostPasswordQuestion);
			$objPublicLogin->LostPasswordAnswer = trim($strLostPasswordAnswer);
			$objPublicLogin->TemporaryPasswordFlag = false;
			$objPublicLogin->DateRegistered = QDateTime::Now();
			$objPublicLogin->Save();

			return $objPublicLogin;
		}

		/**
		 * This will create a provisional PublicLogin record, including setting up the hash.
		 * NOTE: If the PublicLogin record already exists AND it is a non-provisional one, then this will throw an error
		 * Otherwise, if the PublicLogin exists as a provisional one, it will simply overwrite the provisioned info.
		 * 
		 * @param string $strUsername
		 * @param string $strEmailAddress
		 * @param string $strFirstName
		 * @param string $strLastName
		 * @return ProvisionalPublicLogin
		 */
		public static function CreateProvisional($strUsername, $strEmailAddress, $strFirstName, $strLastName) {
			$strEmailAddress = trim(strtolower($strEmailAddress));
			$strUsername = QApplication::Tokenize($strUsername, false);
			if (strlen($strUsername) < 4) throw new QCallerException('Username is too short: ' . $strUsername);
			if (!self::IsProvisionalCreatableForUsername($strUsername)) throw new QCallerException('Username is already taken: ' . $strUsername);

			// Perform the Creation Tasks within a Single Transaction
			try {
				PublicLogin::GetDatabase()->TransactionBegin();
				
				// Delete any other provisional login using this email address with a different username
				foreach (ProvisionalPublicLogin::QueryArray(QQ::Equal(QQN::ProvisionalPublicLogin()->EmailAddress, $strEmailAddress)) as $objProvisionalPublicLogin) {
					if ($objProvisionalPublicLogin->PublicLogin->Username != $strUsername) {
						$objPublicLogin = $objProvisionalPublicLogin->PublicLogin;
						$objProvisionalPublicLogin->Delete();
						$objPublicLogin->Delete();
					}
				}

				// Be sure to reuse the username record if applicable
				$objPublicLogin = PublicLogin::LoadByUsername($strUsername);
				$blnChangeHash = true;
				if ($objPublicLogin) {
					if ($objPublicLogin->ProvisionalPublicLogin->EmailAddress == $strEmailAddress) $blnChangeHash = false;
					$objProvisionalPublicLogin = $objPublicLogin->ProvisionalPublicLogin;
					$objPublicLogin->DateRegistered = QDateTime::Now();
					$objPublicLogin->Save();
				} else {
					$objPublicLogin = new PublicLogin();
					$objPublicLogin->ActiveFlag = true;
					$objPublicLogin->Username = $strUsername;
					$objPublicLogin->DateRegistered = QDateTime::Now();
					$objPublicLogin->Save();
					
					$objProvisionalPublicLogin = new ProvisionalPublicLogin();
					$objProvisionalPublicLogin->PublicLogin = $objPublicLogin;
				}
	
				// Update Values
				$objProvisionalPublicLogin->FirstName = trim($strFirstName);
				$objProvisionalPublicLogin->LastName = trim($strLastName);
				$objProvisionalPublicLogin->EmailAddress = trim($strEmailAddress);
				if ($blnChangeHash) {
					$objProvisionalPublicLogin->UrlHash = md5(microtime());
					$objProvisionalPublicLogin->ConfirmationCode = md5(microtime());
					$objProvisionalPublicLogin->ConfirmationCode = str_replace('0', '', $objProvisionalPublicLogin->ConfirmationCode);
					$objProvisionalPublicLogin->ConfirmationCode = str_replace('1', '', $objProvisionalPublicLogin->ConfirmationCode);
					$objProvisionalPublicLogin->ConfirmationCode = substr($objProvisionalPublicLogin->ConfirmationCode, 0, 8);
				}
				$objProvisionalPublicLogin->Save();
				PublicLogin::GetDatabase()->TransactionCommit();
				
				$objProvisionalPublicLogin->SendConfirmationEmail();

				return $objProvisionalPublicLogin;
			} catch (Exception $objExc) {
				PublicLogin::GetDatabase()->TransactionRollBack();
				throw $objExc;
			}
		}
		
		/**
		 * Will check to see if a given username is creatable for a provisional account.  If it is already
		 * taken by a non-provisional account, this will return false.  Otherwise, if it doesn't exist
		 * (or the existing one is still provisional), it will return true.
		 * @param $strUsername
		 * @return boolean
		 */
		public static function IsProvisionalCreatableForUsername($strUsername) {
			$strUsername = QApplication::Tokenize($strUsername, false);
			if ($objPublicLogin = PublicLogin::LoadByUsername($strUsername)) {
				if ($objPublicLogin->Person) return false;
			}
			return true;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of PublicLogin objects
			return PublicLogin::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::PublicLogin()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PublicLogin()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single PublicLogin object
			return PublicLogin::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PublicLogin()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PublicLogin()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of PublicLogin objects
			return PublicLogin::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::PublicLogin()->Param1, $strParam1),
					QQ::Equal(QQN::PublicLogin()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = PublicLogin::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`public_login`.*
				FROM
					`public_login` AS `public_login`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return PublicLogin::InstantiateDbResult($objDbResult);
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