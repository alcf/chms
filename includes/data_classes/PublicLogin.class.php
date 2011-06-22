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