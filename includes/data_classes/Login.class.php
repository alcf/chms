<?php
	require(__DATAGEN_CLASSES__ . '/LoginGen.class.php');

	/**
	 * The Login class defined here contains any
	 * customized code for the Login class in the
	 * Object Relational Model.  It represents the "login" table 
	 * in the database, and extends from the code generated abstract LoginGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class Login extends LoginGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objLogin->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Login Object %s',  $this->intId);
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Name':
					if ($this->strMiddleInitial)
						return $this->strFirstName . ' ' . $this->strMiddleInitial . '. ' . $this->strLastName;
					else
						return $this->strFirstName . ' ' . $this->strLastName;

				case 'Type':
					return RoleType::$NameArray[$this->intRoleTypeId];

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function RefreshDateLastLogin() {
			$this->dttDateLastLogin = QDateTime::Now();
			$this->Save();
		}

		public function IsPermissionAllowed($intPermissionId) {
			return $this->intPermissionBitmap & $intPermissionId;
		}

		/**
		 * Given a username/email and a password, this will attempt to load the valid Login object.
		 * 
		 * If a valid/cached password is stored locally, it will validate against that.  If the cache is missing or invalid,
		 * it will validate against the LDAP server and if correct, update the local cache accordingly.
		 * @param string $strUsername
		 * @param string $strPassword
		 * @return Login
		 */
		public static function LoadByUsernamePassword($strUsername, $strPassword) {
			$strUsername = trim(strtolower($strUsername));

			// First, let's get the Login object via Username
			$objLogin = Login::LoadByUsername($strUsername);

			// Next, try using Email
			if (!$objLogin) {
				$objLogin = Login::LoadByEmail($strUsername);
			}

			// If it still fails, indicate so by returning null
			if (!$objLogin) return;

			// Check Against the Password Cache
			if ($objLogin->IsPasswordValidAgainstCache($strPassword)) {
				// Update and Return Login Record
				$objLogin->DateLastLogin = QDateTime::Now();
				$objLogin->Save();
				return $objLogin;
			}

			// Check Against LDAP
			try {
				$objLdap = new AlcfLdap(LDAP_PATH, 'ir\\' . $objLogin->Username, $strPassword);

				// If we're here, then we've validated correctly against LDAP
				$objLogin->SetPasswordCache($strPassword);

				// Update and Return Login Record
				$objLogin->DateLastLogin = QDateTime::Now();
				$objLogin->Save();
				return $objLogin;
			} catch (Exception $objExc) {}

			// If we're here, then we've FAILED against LDAP
			return;
		}
		
		/**
		 * Returns whether or not this Login user is currently allowed to use the Chms
		 * based on DomainActiveFlag and LoginActiveFlag settings
		 * @return boolean
		 */
		public function IsAllowedToUseChms() {
			return $this->blnDomainActiveFlag && $this->blnLoginActiveFlag;
		}

		/**
		 * Sets the PasswordCache value, encrypted with salt
		 * @param string $strPassword
		 * @return void
		 */
		public function SetPasswordCache($strPassword) {
			$this->strPasswordCache = md5($strPassword . 'chms-SALT4alcf!');
		}

		/**
		 * Returns whether or not the password checks valid against the cached password in the object
		 * @param string $strPassword
		 * @return boolean
		 */
		public function IsPasswordValidAgainstCache($strPassword) {
			return (md5($strPassword . 'chms-SALT4alcf!') == $this->strPasswordCache);
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Login objects
			return Login::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Login()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Login()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Login object
			return Login::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Login()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Login()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Login objects
			return Login::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Login()->Param1, $strParam1),
					QQ::Equal(QQN::Login()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`login`.*
				FROM
					`login` AS `login`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Login::InstantiateDbResult($objDbResult);
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